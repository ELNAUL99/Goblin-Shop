<?php
/* Smarty version 3.1.39, created on 2021-12-05 21:09:51
  from 'C:\Users\Joku vaan\PrestaShopAndWoo\xampp\htdocs\themes\classic\templates\catalog\listing\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ad0e7fe30f39_03745657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f529d8a03d9641975814f05eda0d2254077f9a5' => 
    array (
      0 => 'C:\\Users\\Joku vaan\\PrestaShopAndWoo\\xampp\\htdocs\\themes\\classic\\templates\\catalog\\listing\\category.tpl',
      1 => 1631528421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/category-header.tpl' => 1,
  ),
),false)) {
function content_61ad0e7fe30f39_03745657 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_39587180961ad0e7fe2ea95_75116410', 'product_list_header');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'catalog/listing/product-list.tpl');
}
/* {block 'product_list_header'} */
class Block_39587180961ad0e7fe2ea95_75116410 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_list_header' => 
  array (
    0 => 'Block_39587180961ad0e7fe2ea95_75116410',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/category-header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value,'category'=>$_smarty_tpl->tpl_vars['category']->value), 0, false);
}
}
/* {/block 'product_list_header'} */
}
