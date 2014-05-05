<?php /* Smarty version Smarty-3.1.18, created on 2014-05-05 15:25:13
         compiled from "/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/admins/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8240643825364cad7265b17-45294512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd6a35013fff1f0db934c0738b1f4ec3f527caca' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/admins/add.tpl',
      1 => 1399275748,
      2 => 'file',
    ),
    '6cb7945eabbe14c52f42fd9165c7b8213153c504' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/admin/wrappers/_formDialog.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8240643825364cad7265b17-45294512',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5364cad72a61e1_96532725',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5364cad72a61e1_96532725')) {function content_5364cad72a61e1_96532725($_smarty_tpl) {?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>

    <h3>Create new admin</h3>

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
