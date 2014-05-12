<?php /* Smarty version Smarty-3.1.18, created on 2014-05-12 23:57:43
         compiled from "/media/jay/Data/apache/skully-admin/public/views/admin/widgets/crud/edit/_editAjax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16882993045370f5c2d61ba2-13987887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55a32b7be9a36b1c3171fe1a46126c497dc914ce' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/widgets/crud/edit/_editAjax.tpl',
      1 => 1399913292,
      2 => 'file',
    ),
    '7dbb3b46ee1e0bda11c3965bf6f66ec5a750b4e9' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/wrappers/_formDialog.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16882993045370f5c2d61ba2-13987887',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5370f5c2da19e1_52126050',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5370f5c2da19e1_52126050')) {function content_5370f5c2da19e1_52126050($_smarty_tpl) {?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>

<h3>Edit <?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
</h3>

</div>
<div class="modal-body">
	<div class="row-fluid">
	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/_ajaxAlerts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<?php echo $_smarty_tpl->tpl_vars['form']->value;?>


	</div>
</div>
<div class="modal-footer">
	
		<a class="btn btn-primary" onclick="return bootstrapModalSubmit();">Save Changes</a>
		<a class="btn" data-dismiss="modal">Close</a>
	
</div><?php }} ?>
