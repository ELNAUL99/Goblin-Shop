<?php
/* Smarty version 3.1.39, created on 2021-12-05 21:10:20
  from 'C:\Users\Joku vaan\PrestaShopAndWoo\xampp\htdocs\themes\classic\templates\catalog\_partials\product-flags.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ad0e9c0a81b2_47289973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6341bab76ef8f997838b702b5efa34f75916c64a' => 
    array (
      0 => 'C:\\Users\\Joku vaan\\PrestaShopAndWoo\\xampp\\htdocs\\themes\\classic\\templates\\catalog\\_partials\\product-flags.tpl',
      1 => 1631528421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ad0e9c0a81b2_47289973 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '153436930161ad0e9c0a6031_07211216';
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_59000661161ad0e9c0a6b08_61879021', 'product_flags');
?>

<?php }
/* {block 'product_flags'} */
class Block_59000661161ad0e9c0a6b08_61879021 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_flags' => 
  array (
    0 => 'Block_59000661161ad0e9c0a6b08_61879021',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <ul class="product-flags">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
$_smarty_tpl->tpl_vars['flag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->do_else = false;
?>
            <li class="product-flag <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
<?php
}
}
/* {/block 'product_flags'} */
}
