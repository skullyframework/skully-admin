<?php /* Smarty version Smarty-3.1.18, created on 2014-05-12 23:59:51
         compiled from "/media/jay/Data/apache/skully-admin/public/views/admin/widgets/crud/delete/_deleteAjax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12825080445370fa803a28d7-41708126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fec824aca405d58cbf7ca4f6a9a22b62de30aaa' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/widgets/crud/delete/_deleteAjax.tpl',
      1 => 1399913256,
      2 => 'file',
    ),
    '7dbb3b46ee1e0bda11c3965bf6f66ec5a750b4e9' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/wrappers/_formDialog.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12825080445370fa803a28d7-41708126',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5370fa8043e168_32661334',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5370fa8043e168_32661334')) {function content_5370fa8043e168_32661334($_smarty_tpl) {?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>

<h3>Delete <?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
</h3>

</div>
<div class="modal-body">
	<div class="row-fluid">
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/_ajaxAlerts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
    <?php echo $_smarty_tpl->tpl_vars['form']->value;?>


	</div>
</div>
<div class="modal-footer">
	
	<a class="btn btn-danger" onclick="return bootstrapModalSubmit();">Delete</a>
	<a class="btn" data-dismiss="modal">Close</a>

</div><?php }} ?>
