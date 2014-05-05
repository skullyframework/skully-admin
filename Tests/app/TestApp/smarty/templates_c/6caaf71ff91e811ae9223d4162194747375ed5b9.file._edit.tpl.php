<?php /* Smarty version Smarty-3.1.18, created on 2014-05-05 14:24:25
         compiled from "/media/jay/Data/apache/skully-admin/public/admin/widgets/crud/_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155740465253673ca9c2a113-79765967%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6caaf71ff91e811ae9223d4162194747375ed5b9' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/admin/widgets/crud/_edit.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155740465253673ca9c2a113-79765967',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isAjax' => 0,
    'ajaxPath' => 0,
    'noAjaxPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53673ca9c5dc81_35403132',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53673ca9c5dc81_35403132')) {function content_53673ca9c5dc81_35403132($_smarty_tpl) {?>







<?php if ($_smarty_tpl->tpl_vars['isAjax']->value) {?>
	<?php if (!empty($_smarty_tpl->tpl_vars['ajaxPath']->value)) {?>
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['ajaxPath']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/crud/edit/_editAjax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
<?php } else { ?>
	<?php if (!empty($_smarty_tpl->tpl_vars['noAjaxPath']->value)) {?>
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['noAjaxPath']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/crud/edit/_editNoAjax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
<?php }?><?php }} ?>
