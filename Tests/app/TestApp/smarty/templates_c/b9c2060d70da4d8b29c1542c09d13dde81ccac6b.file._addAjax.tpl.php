<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:06
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\crud\add\_addAjax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1278354eb8126c91310-91825328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9c2060d70da4d8b29c1542c09d13dde81ccac6b' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\crud\\add\\_addAjax.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
    'da624061b39d7b10b33721c343ba6183499a1235' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\wrappers\\_formDialog.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1278354eb8126c91310-91825328',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb8126cdc717_72634660',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb8126cdc717_72634660')) {function content_54eb8126cdc717_72634660($_smarty_tpl) {?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>

<h3>Create new <?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
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
