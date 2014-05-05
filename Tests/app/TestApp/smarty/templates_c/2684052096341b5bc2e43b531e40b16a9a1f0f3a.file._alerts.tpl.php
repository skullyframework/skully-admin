<?php /* Smarty version Smarty-3.1.18, created on 2014-05-02 05:05:07
         compiled from "/media/jay/Data/apache/skully-admin/public/admin/widgets/_alerts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3880569175362c513450618-05944679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2684052096341b5bc2e43b531e40b16a9a1f0f3a' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/admin/widgets/_alerts.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3880569175362c513450618-05944679',
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
  'unifunc' => 'content_5362c513497210_66589802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5362c513497210_66589802')) {function content_5362c513497210_66589802($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/alerts/_error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/alerts/_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
