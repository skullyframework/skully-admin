<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\types\_multipleManyTypes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1345754eb813c1b2421-37686624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2442681ca423a1341775f4ae0d08537796b859c' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\types\\_multipleManyTypes.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1345754eb813c1b2421-37686624',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_imageSettingName' => 1,
    'instanceImages' => 1,
    '_imageSetting' => 1,
    '_image' => 1,
    '_imagePos' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb813c1c8fd2_71991177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb813c1c8fd2_71991177')) {function content_54eb813c1c8fd2_71991177($_smarty_tpl) {?>
    <?php  $_smarty_tpl->tpl_vars['_image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_image']->_loop = false;
 $_smarty_tpl->tpl_vars['_imagePos'] = new Smarty_Variable;
 $_from = ($_smarty_tpl->tpl_vars['instanceImages']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_image']->key => $_smarty_tpl->tpl_vars['_image']->value) {
$_smarty_tpl->tpl_vars['_image']->_loop = true;
 $_smarty_tpl->tpl_vars['_imagePos']->value = $_smarty_tpl->tpl_vars['_image']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/imageUploader/multiple/_manyTypes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_image'=>$_smarty_tpl->tpl_vars['_image']->value,'_imagePos'=>$_smarty_tpl->tpl_vars['_imagePos']->value), 0);?>

    <?php } ?>

<?php }} ?>
