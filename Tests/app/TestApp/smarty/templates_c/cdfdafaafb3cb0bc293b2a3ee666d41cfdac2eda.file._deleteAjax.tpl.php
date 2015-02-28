<?php /* Smarty version Smarty-3.1.18, created on 2015-03-01 00:45:56
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\crud\delete\_deleteAjax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:249654f1fed433eac6-00013773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdfdafaafb3cb0bc293b2a3ee666d41cfdac2eda' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\crud\\delete\\_deleteAjax.tpl',
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
  'nocache_hash' => '249654f1fed433eac6-00013773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54f1fed438b166_14103420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1fed438b166_14103420')) {function content_54f1fed438b166_14103420($_smarty_tpl) {?>
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
