<?php
/* Smarty version 3.1.39, created on 2021-12-05 21:10:11
  from 'module:pscustomeraccountlinkspsc' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ad0e932760d2_04905303',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42f9461127ce7396a601c2484841253ea5ba658f' => 
    array (
      0 => 'module:pscustomeraccountlinkspsc',
      1 => 1631528417,
      2 => 'module',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_61ad0e932760d2_04905303 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
));
?>
<div id="block_myaccount_infos" class="col-md-3 links wrapper">
  <p class="h3 myaccount-title hidden-sm-down">
    <a class="text-uppercase" href="http://127.0.0.1:8080/fi/asiakastilini" rel="nofollow">
      Asiakastili
    </a>
  </p>
  <div class="title clearfix hidden-md-up" data-target="#footer_account_list" data-toggle="collapse">
    <span class="h3">Asiakastili</span>
    <span class="float-xs-right">
      <span class="navbar-toggler collapse-icons">
        <i class="material-icons add">&#xE313;</i>
        <i class="material-icons remove">&#xE316;</i>
      </span>
    </span>
  </div>
  <ul class="account-list collapse" id="footer_account_list">
            <li>
          <a href="http://127.0.0.1:8080/fi/tilitieto" title="Henkilötiedot" rel="nofollow">
            Henkilötiedot
          </a>
        </li>
            <li>
          <a href="http://127.0.0.1:8080/fi/tilaushistoria" title="Tilaukset" rel="nofollow">
            Tilaukset
          </a>
        </li>
            <li>
          <a href="http://127.0.0.1:8080/fi/hyvityslaskut" title="Hyvityslaskut" rel="nofollow">
            Hyvityslaskut
          </a>
        </li>
            <li>
          <a href="http://127.0.0.1:8080/fi/osoitteet" title="Osoitteet" rel="nofollow">
            Osoitteet
          </a>
        </li>
        
	</ul>
</div>
<?php }
}
