<?php

use Stripe_officialClasslib\Actions\ActionsHandler;
use Stripe_officialClasslib\Extensions\ProcessLogger\ProcessLoggerHandler;

/**
 * 2007-2019 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright Copyright (c) Stripe
 * @license   Commercial license
 */

class stripe_officialOrderSuccessModuleFrontController extends ModuleFrontController
{
    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $payment_intent = Tools::getValue('payment_intent');
        $payment_method = Tools::getValue('payment_method');

        try {
            $intent = \Stripe\PaymentIntent::retrieve($payment_intent);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $intent = null;
            ProcessLoggerHandler::logInfo(
                'Retrieve payment intent : ' . $e->getMessage(),
                null,
                null,
                'orderSuccess - registerStripeEvent'
            );
        }

        ProcessLoggerHandler::logInfo(
            'Retrieve payment intent : '.$intent,
            null,
            null,
            'orderSuccess - registerStripeEvent'
        );

        if ($this->registerStripeEvent($intent)) {

            $conveyorData = [
                'module' => $this->module,
                'context' => $this->context,
                'paymentIntent' => $payment_intent,
            ];

            if ($payment_method == 'oxxo') {
                $conveyorData['voucher_url'] = $intent->next_action->oxxo_display_details->hosted_voucher_url;
                $conveyorData['voucher_expire'] = $intent->next_action->oxxo_display_details->expires_after;
            }

            $handler = new ActionsHandler();
            $handler->setConveyor($conveyorData);

            if ($payment_method == 'card'
                || $payment_method == 'sepa_debit'
                || $payment_method == 'oxxo') {
                ProcessLoggerHandler::logInfo(
                    'Payment method flow without redirection',
                    null,
                    null,
                    'orderSuccess - initContent'
                );
                $handler->addActions(
                    'prepareFlowNone',
                    'updatePaymentIntent',
                    'createOrder',
                    'sendMail',
                    'saveCard',
                    'addTentative'
                );
            } elseif ($payment_method == 'sofort'
                || $payment_method == 'fpx'
                || $payment_method == 'giropay') {
                ProcessLoggerHandler::logInfo(
                    'Payment method flow with redirection',
                    null,
                    null,
                    'orderSuccess - initContent'
                );
                $handler->addActions(
                    'prepareFlowRedirectPaymentIntent',
                    'updatePaymentIntent',
                    'createOrder',
                    'sendMail',
                    'saveCard',
                    'addTentative'
                );
            }

            if (!$handler->process('ValidationOrder')) {
                // Handle error
                ProcessLoggerHandler::logError(
                    'Order creation process disrupted.',
                    null,
                    null,
                    'orderSuccess - initContent'
                );
            }
        }

        $this->displayOrderConfirmation($intent->id);
    }

    private function registerStripeEvent($paymentIntent)
    {
        $eventCharge = isset($paymentIntent->charges->data[0]) ? $paymentIntent->charges->data[0] : $paymentIntent;

        $stripeEventStatus = StripeEvent::getStatusAssociatedToChargeType($eventCharge->status);

        if (!$stripeEventStatus) {
            ProcessLoggerHandler::logInfo(
                'Charge event does not need to be processed : '.$eventCharge->status,
                null,
                null,
                'webhook - checkEventStatus'
            );
            ProcessLoggerHandler::closeLogger();
            return false;
        }

        $lastRegisteredEvent = new StripeEvent();
        $lastRegisteredEvent = $lastRegisteredEvent->getLastRegisteredEventByPaymentIntent($paymentIntent->id);

        ProcessLoggerHandler::logInfo(
            'Last registered event => ID : ' . $lastRegisteredEvent->id,
            null,
            null,
            'orderSuccess - registerStripeEvent'
        );

        if ($lastRegisteredEvent->date_add != null) {
            $lastRegisteredEventDate = new DateTime($lastRegisteredEvent->date_add);
            $currentEventDate = new DateTime();
            $currentEventDate = $currentEventDate->setTimestamp($eventCharge->created);
            if ($lastRegisteredEventDate > $currentEventDate) {
                ProcessLoggerHandler::logInfo(
                    'This charge event come too late to be processed [Last event : ' . $lastRegisteredEventDate->format('Y-m-d H:m:s') . ' | Current event : ' . $currentEventDate->format('Y-m-d H:m:s') . '].',
                    null,
                    null,
                    'orderSuccess - registerStripeEvent'
                );
                ProcessLoggerHandler::closeLogger();
                return false;
            }
        }

        if (!StripeEvent::validateTransitionStatus($lastRegisteredEvent->status, $stripeEventStatus)) {
            ProcessLoggerHandler::logInfo(
                'This Stripe module event "' . $stripeEventStatus . '" cannot be processed because [Last event status: ' . $lastRegisteredEvent->status . ' | Processed : ' . ($lastRegisteredEvent->isProcessed() ? 'Yes' : 'No') . '].',
                'StripeEvent',
                $lastRegisteredEvent->id,
                'orderSuccess - registerStripeEvent'
            );
            ProcessLoggerHandler::closeLogger();
            return false;
        }

        $stripeEventDate = new DateTime();
        $stripeEventDate = $stripeEventDate->setTimestamp($eventCharge->created);

        $stripeEvent = new StripeEvent();
        $stripeEvent->setIdPaymentIntent($paymentIntent->id);
        $stripeEvent->setStatus($stripeEventStatus);
        $stripeEvent->setDateAdd($stripeEventDate->format('Y-m-d H:i:s'));
        $stripeEvent->setIsProcessed(true);
        $stripeEvent->setFlowType('direct');

        try {
            return $stripeEvent->save();
        } catch (PrestaShopException $e) {
            ProcessLoggerHandler::logInfo(
                'An issue appears during saving Stripe module event in database : ' . $e->getMessage(),
                null,
                null,
                'orderSuccess - registerStripeEvent'
            );
            ProcessLoggerHandler::closeLogger();
            return false;
        }
    }

    private function displayOrderConfirmation($id_intent)
    {
        ProcessLoggerHandler::logInfo(
            'Display order confirmation',
            null,
            null,
            'orderSuccess - displayOrderConfirmation'
        );

        $id_order = 0;
        for($i = 1; $i <= 15; $i++) {
            $stripePayment = new StripePayment();
            $stripePayment->getStripePaymentByPaymentIntent($id_intent);
            if ($stripePayment->id_cart !== null) {
                $id_order = (int) Order::getOrderByCartId($stripePayment->id_cart);

                if ($id_order) {
                    ProcessLoggerHandler::logInfo(
                        'Waiting proccess order OK',
                        null,
                        null,
                        'orderSuccess - displayOrderConfirmation'
                    );
                    break;
                }
            }
            sleep(2);
            ProcessLoggerHandler::logInfo(
                'Waiting proccess time => '.$i,
                null,
                null,
                'orderSuccess - displayOrderConfirmation'
            );
        }

        if (isset($this->context->customer->secure_key)) {
            $secure_key = $this->context->customer->secure_key;
        } else {
            $secure_key = false;
        }

        $url = Context::getContext()->link->getPageLink(
            'order-confirmation',
            true,
            null,
            array(
                'id_cart' => $stripePayment->id_cart,
                'id_module' => (int)$this->module->id,
                'id_order' => $id_order,
                'key' => $secure_key
            )
        );

        ProcessLoggerHandler::logInfo(
            'Confirmation order url => '.$url,
            null,
            null,
            'orderSuccess - displayOrderConfirmation'
        );
        ProcessLoggerHandler::closeLogger();

        Tools::redirect($url);
        exit;
    }
}
