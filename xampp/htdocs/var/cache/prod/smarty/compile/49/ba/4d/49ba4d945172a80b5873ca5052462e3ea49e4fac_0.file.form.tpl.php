<?php
/* Smarty version 3.1.39, created on 2021-12-05 21:15:24
  from 'C:\Users\Joku vaan\PrestaShopAndWoo\xampp\htdocs\modules\socialmedia\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ad0fcc139c17_34980619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49ba4d945172a80b5873ca5052462e3ea49e4fac' => 
    array (
      0 => 'C:\\Users\\Joku vaan\\PrestaShopAndWoo\\xampp\\htdocs\\modules\\socialmedia\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1638713843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ad0fcc139c17_34980619 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_52080708961ad0fcc129bd9_22203503', "label");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_90314571461ad0fcc12dcd4_29005229', "input");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "label"} */
class Block_52080708961ad0fcc129bd9_22203503 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'label' => 
  array (
    0 => 'Block_52080708961ad0fcc129bd9_22203503',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'topform') {?>
        <div id='topform-label' >
             <div class="col-md-3 row" style="background-color: transparent;">
                <div class="top-logo">
                    <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['logoImg'],'html' ));?>
" alt="contentBox" style="float:left;">
                </div>
                <div class="col-md-8 top-module-description">
                    <h1 class="top-module-title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['moduleName'],'html' ));?>
</h1>

                    <div class="top-module-sub-title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['moduleDescription'],'html' ));?>
</div>

                    <div class="top-module-my-name"><a href="http://contentbox.org/?v=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['moduleVersion'],'html' ));?>
">contentBox <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['moduleVersion'],'html' ));?>
</a></div>
                    <div class="">by <a href="http://emotionloop.com/?contentbox">emotionLoop</a></div>
                </div>
            </div>
           
        </div>        
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }
}
}
/* {/block "label"} */
/* {block "input"} */
class Block_90314571461ad0fcc12dcd4_29005229 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input' => 
  array (
    0 => 'Block_90314571461ad0fcc12dcd4_29005229',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'topform') {?>

        <div class="row" style="background-color: transparent;" >
            <div class="col-md-4">
                <span><b>Shop:</b></span>
                <select id="contentbox_shop_select" name="contentbox_shop_select">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['shops'], 'shop');
$_smarty_tpl->tpl_vars['shop']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['shop']->value) {
$_smarty_tpl->tpl_vars['shop']->do_else = false;
?>
                        <option id="id_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shop']->value['id_shop'] ));?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shop']->value['id_shop'] ));?>
"
                            <?php if (($_smarty_tpl->tpl_vars['input']->value['current_shop_id'] == $_smarty_tpl->tpl_vars['shop']->value['id_shop'])) {?>
                            selected
                            <?php }?>
                            >
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shop']->value['name'] ));?>

                        </option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>                
            </div>
            <?php if (!$_smarty_tpl->tpl_vars['input']->value['monolanguage']) {?>
            <div class="col-md-4">
                <span><b>Language:</b></span>
                <select id="contentbox_language_select" name="contentbox_language_select">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['languages'], 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
                        <option id="id_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['id_lang'] ));?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['id_lang'] ));?>
"
                            <?php if (($_smarty_tpl->tpl_vars['input']->value['current_language_id'] == $_smarty_tpl->tpl_vars['language']->value['id_lang'])) {?>
                            selected
                            <?php }?>
                            >
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['name'] ));?>

                        </option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>                
            </div>
            <?php }?>
            <div class="col-md-3">
                <div >&nbsp;</div>
                <input type="submit" value="Select" class="btn btn-primary">
                <input type="hidden" name="ignore_changes" id="ignore_changes" value="">
            </div>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'files_area') {?>
        <div>
            <?php if (!empty($_smarty_tpl->tpl_vars['input']->value['files'])) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['files'], 'file', false, 'pos');
$_smarty_tpl->tpl_vars['file']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pos']->value => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['file']->value['name'] != 'index.php') {?>
                        <div class="fileContainer" style="" rel="content/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['file']->value['name'] ));?>
" data-filename="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['file']->value['name'] ));?>
" data-filepath="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['path'] ));?>
">
                            <div class="fileUrl">
                                <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['path'] ));?>
img/url.png" alt="URL"/>
                            </div>
                            <div class="fileDelete" >
                                <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['path'] ));?>
img/close.png" alt="DELETE"/>
                            </div>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <?php if (in_array(strtolower($_smarty_tpl->tpl_vars['file']->value['extension']),$_smarty_tpl->tpl_vars['input']->value['imagesExtensions'])) {?>
                                    <td style="height:90px;" valign="middle">
                                        <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['path'] ));?>
content/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['file']->value['name'],'url' ));?>
" style="max-width:100px; max-height:100px" />
                                    </td>
                                    <?php } else { ?>
                                    <td style="height:90px;" valign="middle">
                                        *.<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['file']->value['extension'],'url' ));?>

                                    </td>
                                    <?php }?>
                                </tr>
                            </table>
                            <div class="fileName"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['file']->value['name'],'url' ));?>
</div>
                        </div>
                        <?php if ((($_smarty_tpl->tpl_vars['pos']->value%3) === 0) && ($_smarty_tpl->tpl_vars['pos']->value != 0)) {?>
                            <div class="mcClear"></div>
                        <?php }?>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <input type="hidden" name="delete_file" id="delete_file" value="">
                <div style="clear:both;"></div>
            <?php }?>
        </div>

    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }?>

<?php
}
}
/* {/block "input"} */
}
