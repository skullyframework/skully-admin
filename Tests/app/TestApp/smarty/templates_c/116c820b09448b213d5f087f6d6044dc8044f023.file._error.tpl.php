<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:33:49
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\alerts\_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:517754eb809d2bec26-77033843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '116c820b09448b213d5f087f6d6044dc8044f023' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\alerts\\_error.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '517754eb809d2bec26-77033843',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb809d2f8193_10393233',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb809d2f8193_10393233')) {function content_54eb809d2f8193_10393233($_smarty_tpl) {?><div class="alert alert-error">
	<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }} ?>
