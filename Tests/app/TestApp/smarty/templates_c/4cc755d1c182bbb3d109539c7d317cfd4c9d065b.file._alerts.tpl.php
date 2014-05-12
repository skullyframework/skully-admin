<?php /* Smarty version Smarty-3.1.18, created on 2014-05-13 00:22:47
         compiled from "/media/jay/Data/apache/skully-admin/public/views/admin/widgets/_alerts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1132442660537103679f0372-98820647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cc755d1c182bbb3d109539c7d317cfd4c9d065b' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/widgets/_alerts.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1132442660537103679f0372-98820647',
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
  'unifunc' => 'content_53710367a322b1_02355422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53710367a322b1_02355422')) {function content_53710367a322b1_02355422($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/alerts/_error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/alerts/_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
