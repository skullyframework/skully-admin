<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 03:08:01
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\multiple\_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1354354eb88a1bfc6c7-75272533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '947e5830dc2a5d7c95b1906a5c44bc427afcd227' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\multiple\\_delete.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
    'da624061b39d7b10b33721c343ba6183499a1235' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\wrappers\\_formDialog.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
    '116c820b09448b213d5f087f6d6044dc8044f023' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\alerts\\_error.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
    '435c35bcda915081a225c269b5874a943019fa2a' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\alerts\\_message.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
    'bb4d987039c2ff2774c5f5d8c59d0213d48ddeb9' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\_alerts.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1354354eb88a1bfc6c7-75272533',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb88a1d27624_52749959',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb88a1d27624_52749959')) {function content_54eb88a1d27624_52749959($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_block_form')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\block.form.php';
if (!is_callable('smarty_function_public_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.public_url.php';
?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>

    <h3>Delete image</h3>

</div>
<div class="modal-body">
	<div class="row-fluid">
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/_ajaxAlerts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
    
        <?php ob_start();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDestroyPath']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('method'=>"POST",'action'=>$_tmp1)); $_block_repeat=true; echo smarty_block_form(array('method'=>"POST",'action'=>$_tmp1), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php /*  Call merged included template "admin/widgets/_alerts.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/_alerts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1354354eb88a1bfc6c7-75272533');
content_54eb88a1ccd745_77511693($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/_alerts.tpl" */?>
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
[id]" value="<?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
"/>
            <input type="hidden" name="position" value="<?php echo $_smarty_tpl->tpl_vars['position']->value;?>
" />
            <input type="hidden" name="setting" value="<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" />
            <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
                <input type="hidden" name="field" value="value" />
            <?php } else { ?>
                <input type="hidden" name="field" value="<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" />
            <?php }?>
            <div class="block-fluid">
                <div class="row-form">
                    <div class="span12 largerText">
                        Delete this image?
                        <div><img src="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_image']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_public_url(array('path'=>$_tmp2),$_smarty_tpl);?>
" /></div>
                    </div>
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['isAjax']->value) {?>
                    <div class="toolbar bottom TAR">
                        <button class="btn btn-primary" id="submitForm" type="submit">Submit</button>
                    </div>
                <?php }?>
            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('method'=>"POST",'action'=>$_tmp1), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    

	</div>
</div>
<div class="modal-footer">
	
    
        <a class="btn btn-danger" onclick="return deleteClicked();">Delete</a>
        <a class="btn" data-dismiss="modal">Close</a>
    

</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 03:08:01
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\_alerts.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb88a1ccd745_77511693')) {function content_54eb88a1ccd745_77511693($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
	<?php /*  Call merged included template "admin/widgets/alerts/_error.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/alerts/_error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1354354eb88a1bfc6c7-75272533');
content_54eb88a1cd8bd7_21455128($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/alerts/_error.tpl" */?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)) {?>
	<?php /*  Call merged included template "admin/widgets/alerts/_message.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/alerts/_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1354354eb88a1bfc6c7-75272533');
content_54eb88a1ce6c86_08357727($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/alerts/_message.tpl" */?>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 03:08:01
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\alerts\_error.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb88a1cd8bd7_21455128')) {function content_54eb88a1cd8bd7_21455128($_smarty_tpl) {?><div class="alert alert-error">
	<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 03:08:01
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\alerts\_message.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb88a1ce6c86_08357727')) {function content_54eb88a1ce6c86_08357727($_smarty_tpl) {?><div class="alert alert-success">
	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }} ?>
