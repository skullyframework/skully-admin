<?php /* Smarty version Smarty-3.1.18, created on 2014-05-02 20:05:36
         compiled from "/media/jay/Data/apache/skully-admin/public/admin/widgets/_userInfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1902294917536398202d8f30-34843478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12724029030b9c37ed8a7967bdd24bb185be92dd' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/admin/widgets/_userInfo.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1902294917536398202d8f30-34843478',
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
  'unifunc' => 'content_536398203d4352_34339308',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536398203d4352_34339308')) {function content_536398203d4352_34339308($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/Library/Smarty/libs/plugins/modifier.date_format.php';
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
