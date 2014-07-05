<?php /* Smarty version Smarty-3.1.18, created on 2014-07-05 19:11:29
         compiled from "D:\apache\skully-admin\public\views\admin\settings\_editForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1517153b7eb7155de41-81662891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3dbe427fe2fc6b10b78904ceb0b6f46d7956220' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\settings\\_editForm.tpl',
      1 => 1404562065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1517153b7eb7155de41-81662891',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'setting' => 0,
    'isAjax' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b7eb71886a09_02148393',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b7eb71886a09_02148393')) {function content_53b7eb71886a09_02148393($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_block_form')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\block.form.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?><?php ob_start();?><?php echo smarty_function_url(array('path'=>"admin/settings/update"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('class'=>"validate",'method'=>"POST",'action'=>$_tmp1)); $_block_repeat=true; echo smarty_block_form(array('class'=>"validate",'method'=>"POST",'action'=>$_tmp1), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	<div class="block-fluid">

		<div class="row-form">
			<div class="span12 largerText">
				<input name="setting[id]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['setting']->value['id'];?>
">
				<?php echo smarty_function_lang(array('value'=>$_smarty_tpl->tpl_vars['setting']->value['name']),$_smarty_tpl);?>

			</div>
		</div>

		<div class="row-form">
			<div class="span2"><?php echo smarty_function_lang(array('value'=>"value"),$_smarty_tpl);?>
</div>
			<div class="span10">
				<?php echo $_smarty_tpl->getSubTemplate ((("admin/settings/forms/_").($_smarty_tpl->tpl_vars['setting']->value['input_type'])).(".tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</div>
		</div>

	<?php if (!$_smarty_tpl->tpl_vars['isAjax']->value) {?>
		<div class="toolbar bottom TAR">
			<div class="btn-group">
				<button class="btn btn-primary" id="submitForm" type="submit">Submit</button>
			</div>
		</div>
	<?php }?>

	</div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('class'=>"validate",'method'=>"POST",'action'=>$_tmp1), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
