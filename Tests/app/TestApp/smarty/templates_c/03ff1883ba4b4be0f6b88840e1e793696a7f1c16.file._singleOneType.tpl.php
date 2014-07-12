<?php /* Smarty version Smarty-3.1.18, created on 2014-07-06 02:39:05
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\types\_singleOneType.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1610053b84c1531e368-01283013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03ff1883ba4b4be0f6b88840e1e793696a7f1c16' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\types\\_singleOneType.tpl',
      1 => 1404589114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1610053b84c1531e368-01283013',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b84c1532e6f6_35693421',
  'variables' => 
  array (
    '_imageSetting' => 0,
    '_imageSettingName' => 0,
    'instanceImages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b84c1532e6f6_35693421')) {function content_53b84c1532e6f6_35693421($_smarty_tpl) {?><div class="row-form imageManagerRow">
    <div class="span12 imageFormContainer">
        <div><?php echo $_smarty_tpl->tpl_vars['_imageSetting']->value['options']['description'];?>
</div>
        <?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/imageUploader/_imageForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_image'=>($_smarty_tpl->tpl_vars['instanceImages']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]),'type'=>$_smarty_tpl->tpl_vars['_imageSetting']->value['options'],'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value), 0);?>

    </div>
</div><?php }} ?>
