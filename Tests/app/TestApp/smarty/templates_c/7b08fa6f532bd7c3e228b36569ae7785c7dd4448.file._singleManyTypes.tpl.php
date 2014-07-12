<?php /* Smarty version Smarty-3.1.18, created on 2014-07-06 02:39:04
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\types\_singleManyTypes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1701553b84c15297a12-84692437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b08fa6f532bd7c3e228b36569ae7785c7dd4448' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\types\\_singleManyTypes.tpl',
      1 => 1404589096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1701553b84c15297a12-84692437',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b84c152c8089_17169148',
  'variables' => 
  array (
    '_imageSetting' => 0,
    'i' => 0,
    'typeName' => 0,
    'type' => 0,
    '_imageSettingName' => 0,
    'instanceImages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b84c152c8089_17169148')) {function content_53b84c152c8089_17169148($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_smarty_tpl->tpl_vars['typeName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_imageSetting']->value['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['typeName']->value = $_smarty_tpl->tpl_vars['type']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value%4==0) {?>
        <div class="row-form imageManagerRow">
    <?php }?>
    <div class="span3 imageFormContainer">
        <label><?php echo $_smarty_tpl->tpl_vars['typeName']->value;?>
</label>
        <div><?php echo $_smarty_tpl->tpl_vars['type']->value['description'];?>
</div>
        <?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/imageUploader/_imageForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_image'=>($_smarty_tpl->tpl_vars['instanceImages']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value][$_smarty_tpl->tpl_vars['typeName']->value]),'type'=>$_smarty_tpl->tpl_vars['type']->value,'typeName'=>$_smarty_tpl->tpl_vars['typeName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value), 0);?>

    </div>
    <?php if ($_smarty_tpl->tpl_vars['i']->value%4==3||count($_smarty_tpl->tpl_vars['_imageSetting']->value['types'])==$_smarty_tpl->tpl_vars['i']->value+1) {?>
        </div>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
<?php } ?><?php }} ?>
