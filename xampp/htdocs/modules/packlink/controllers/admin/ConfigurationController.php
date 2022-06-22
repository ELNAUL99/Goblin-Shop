<?php
/**
 * 2021 Packlink
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache License 2.0
 * that is bundled with this package in the file LICENSE.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0.txt
 *
 * @author    Packlink <support@packlink.com>
 * @copyright 2021 Packlink Shipping S.L
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt  Apache License 2.0
 */

use Logeecom\Infrastructure\Configuration\Configuration;
use Logeecom\Infrastructure\ServiceRegister;
use Packlink\PrestaShop\Classes\Utility\PacklinkPrestaShopUtility;
use Packlink\BusinessLogic\Controllers\ConfigurationController as BaseConfigurationController;

/** @noinspection PhpIncludeInspection */
require_once rtrim(_PS_MODULE_DIR_, '/') . '/packlink/vendor/autoload.php';

/**
 * Class ConfigurationController
 */
class ConfigurationController extends PacklinkBaseController
{
    /**
     * Returns data for the configuration page.
     */
    public function displayAjaxGetData()
    {
        $controller = new BaseConfigurationController();
        $service = ServiceRegister::getService(Configuration::CLASS_NAME);

        $data = array(
            'helpUrl' => $controller->getHelpLink(),
            'version' => $service->getModuleVersion(),
        );

        PacklinkPrestaShopUtility::dieJson($data);
    }
}
