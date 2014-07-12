<?php /* Smarty version Smarty-3.1.18, created on 2014-07-06 16:23:02
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\types\_multipleManyTypes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1833153b84c14ee2f55-09756005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2442681ca423a1341775f4ae0d08537796b859c' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\types\\_multipleManyTypes.tpl',
      1 => 1404638579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1833153b84c14ee2f55-09756005',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b84c14ef4070_88290010',
  'variables' => 
  array (
    '_imageSettingName' => 0,
    'instanceImages' => 0,
    '_imageSetting' => 0,
    '_image' => 0,
    '_imagePos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b84c14ef4070_88290010')) {function content_53b84c14ef4070_88290010($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['_image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_image']->_loop = false;
 $_smarty_tpl->tpl_vars['_imagePos'] = new Smarty_Variable;
 $_from = ($_smarty_tpl->tpl_vars['instanceImages']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_image']->key => $_smarty_tpl->tpl_vars['_image']->value) {
$_smarty_tpl->tpl_vars['_image']->_loop = true;
 $_smarty_tpl->tpl_vars['_imagePos']->value = $_smarty_tpl->tpl_vars['_image']->key;
?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/imageUploader/multiple/_manyTypes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_image'=>$_smarty_tpl->tpl_vars['_image']->value,'_imagePos'=>$_smarty_tpl->tpl_vars['_imagePos']->value), 0);?>

<?php } ?><?php }} ?>
