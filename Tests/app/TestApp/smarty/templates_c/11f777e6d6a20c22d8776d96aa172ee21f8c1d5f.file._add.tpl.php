<?php /* Smarty version Smarty-3.1.18, created on 2014-05-03 17:54:15
         compiled from "/media/jay/Data/apache/skully-admin/public/admin/widgets/crud/_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7723577785364cad72ba0a4-51257122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11f777e6d6a20c22d8776d96aa172ee21f8c1d5f' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/admin/widgets/crud/_add.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7723577785364cad72ba0a4-51257122',
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
  'unifunc' => 'content_5364cad730b353_95589062',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5364cad730b353_95589062')) {function content_5364cad730b353_95589062($_smarty_tpl) {?>







<?php if ($_smarty_tpl->tpl_vars['isAjax']->value) {?>
	<?php if (!empty($_smarty_tpl->tpl_vars['ajaxPath']->value)) {?>
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['ajaxPath']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/crud/add/_addAjax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
<?php } else { ?>
	<?php if (!empty($_smarty_tpl->tpl_vars['noAjaxPath']->value)) {?>
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['noAjaxPath']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/crud/add/_addNoAjax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
<?php }?><?php }} ?>
