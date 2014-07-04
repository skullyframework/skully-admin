<?php /* Smarty version Smarty-3.1.18, created on 2014-07-04 10:08:09
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\alerts\_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2627253b61a99cea628-81316238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '2627253b61a99cea628-81316238',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b61a99da6877_79243331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b61a99da6877_79243331')) {function content_53b61a99da6877_79243331($_smarty_tpl) {?><div class="alert alert-error">
	<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }} ?>
