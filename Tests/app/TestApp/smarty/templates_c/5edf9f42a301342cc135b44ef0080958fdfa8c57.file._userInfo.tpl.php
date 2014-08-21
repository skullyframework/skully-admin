<?php /* Smarty version Smarty-3.1.18, created on 2014-08-06 14:20:35
         compiled from "/media/jay/Data/apache/skully-admin/public/views/admin/widgets/_userInfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152082385153e1d743644025-07170808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5edf9f42a301342cc135b44ef0080958fdfa8c57' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/widgets/_userInfo.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152082385153e1d743644025-07170808',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adminUsername' => 1,
    'clientConfig' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53e1d74365ced3_36624953',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e1d74365ced3_36624953')) {function content_53e1d74365ced3_36624953($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/skullyframework/skully/Skully/App/smarty/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/media/jay/Data/apache/skully-admin/vendor/skullyframework/skully/Skully/Library/Smarty/libs/plugins/modifier.date_format.php';
?>
<div class="widget-fluid userInfo clearfix">
	<div class="name">Welcome, <?php echo $_smarty_tpl->tpl_vars['adminUsername']->value;?>
</div>
	<ul class="menuList">
		
		
		<li><a href="<?php echo smarty_function_url(array('path'=>'admin/admins/logout'),$_smarty_tpl);?>
"><span class="icon-share-alt"></span> Logoff</a></li>
	</ul>
	<div class="text"><b><?php echo smarty_modifier_date_format(time(),$_smarty_tpl->tpl_vars['clientConfig']->value['serverFormDateTimeFormat']);?>
</b>
	</div>
</div>
<?php }} ?>
