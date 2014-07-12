<?php /* Smarty version Smarty-3.1.18, created on 2014-07-06 02:45:41
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\_imageForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1307353b84c1516ecb8-71483758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '313bd61c14ec6e1e9ddcf858c513b6998992c6cd' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\_imageForm.tpl',
      1 => 1404589538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1307353b84c1516ecb8-71483758',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b84c151c3f46_34082540',
  'variables' => 
  array (
    'imageUploadPath' => 0,
    'instanceName' => 0,
    '($_smarty_tpl->tpl_vars[\'instanceName\']->value)' => 0,
    '_imageSettingName' => 0,
    'typeName' => 0,
    'position' => 0,
    '_image' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b84c151c3f46_34082540')) {function content_53b84c151c3f46_34082540($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_block_form')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\block.form.php';
if (!is_callable('smarty_function_public_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.public_url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?><?php ob_start();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageUploadPath']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('class'=>"imageForm",'method'=>"POST",'enctype'=>"multipart/form-data",'action'=>$_tmp1)); $_block_repeat=true; echo smarty_block_form(array('class'=>"imageForm",'method'=>"POST",'enctype'=>"multipart/form-data",'action'=>$_tmp1), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php if (!empty($_smarty_tpl->tpl_vars['instanceName']->value)) {?>
        <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
_id" value="<?php if (!empty($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'])) {?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php }?>" />
    <?php }?>
    <input type="hidden" name="settingName" value="<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" />
    <?php if (!empty($_smarty_tpl->tpl_vars['typeName']->value)) {?>
        <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['typeName']->value;?>
" />
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['position']->value)) {?>
        <input type="hidden" name="position" value="<?php echo $_smarty_tpl->tpl_vars['position']->value;?>
"/>
    <?php }?>
    <div class="fileupload <?php if (!empty($_smarty_tpl->tpl_vars['_image']->value)) {?>fileupload-exists<?php } else { ?>fileupload-new<?php }?>" data-provides="fileupload">
        <div class="fileupload-preview thumbnail">
            <?php if (!empty($_smarty_tpl->tpl_vars['_image']->value)) {?>
                <input type="hidden" name="imageUrl" value="<?php echo smarty_function_public_url(array('path'=>$_smarty_tpl->tpl_vars['_image']->value),$_smarty_tpl);?>
" />
                <a href="<?php echo smarty_function_public_url(array('path'=>$_smarty_tpl->tpl_vars['_image']->value),$_smarty_tpl);?>
" class="fb" rel="<?php echo $_smarty_tpl->tpl_vars['group']->value;?>
"><img src="<?php echo smarty_function_public_url(array('path'=>$_smarty_tpl->tpl_vars['_image']->value),$_smarty_tpl);?>
" /></a>
            <?php } else { ?>
                <div class="emptyInfo"><?php echo smarty_function_lang(array('value'=>"No Image"),$_smarty_tpl);?>
</div>
            <?php }?>
        </div>
        <div>
            <span class="btn btn-file btn-primary">
                <span class="fileupload-new">Upload</span>
                <span class="fileupload-exists">Change</span>
                <input type="file" name="image" />
            </span>
            <span class="btn btn-primary fileupload-upload" style="display: none;">Upload</span>
        </div>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('class'=>"imageForm",'method'=>"POST",'enctype'=>"multipart/form-data",'action'=>$_tmp1), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
