<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\types\_singleOneType.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117154eb813c701354-31904783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03ff1883ba4b4be0f6b88840e1e793696a7f1c16' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\types\\_singleOneType.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117154eb813c701354-31904783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_imageSetting' => 1,
    '_imageSettingName' => 1,
    'instanceImages' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb813c7188a9_22567450',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb813c7188a9_22567450')) {function content_54eb813c7188a9_22567450($_smarty_tpl) {?>
    <div class="row-form imageManagerRow">
        <div class="span12 imageFormContainer">
            <div><?php echo $_smarty_tpl->tpl_vars['_imageSetting']->value['options']['description'];?>
</div>
            <?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/imageUploader/_imageForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_image'=>($_smarty_tpl->tpl_vars['instanceImages']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]),'type'=>$_smarty_tpl->tpl_vars['_imageSetting']->value['options'],'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value), 0);?>

        </div>
    </div>
<?php }} ?>
