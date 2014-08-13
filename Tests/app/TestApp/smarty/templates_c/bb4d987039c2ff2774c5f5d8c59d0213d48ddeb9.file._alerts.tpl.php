<?php /* Smarty version Smarty-3.1.18, created on 2014-07-08 12:29:00
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\_alerts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:998453bb819c7a6911-99593691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb4d987039c2ff2774c5f5d8c59d0213d48ddeb9' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\_alerts.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '998453bb819c7a6911-99593691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53bb819c7b9b95_60877873',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53bb819c7b9b95_60877873')) {function content_53bb819c7b9b95_60877873($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/alerts/_error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/alerts/_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
