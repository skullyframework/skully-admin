<?php /* Smarty version Smarty-3.1.18, created on 2014-07-06 02:03:49
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\_userInfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:387853b84c15cc4935-54687253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11038a8d647c81616da95d3528ea5e6f2f641f4e' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\_userInfo.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '387853b84c15cc4935-54687253',
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
  'unifunc' => 'content_53b84c15d98a74_56439260',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b84c15d98a74_56439260')) {function content_53b84c15d98a74_56439260($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\Library\\Smarty\\libs\\plugins\\modifier.date_format.php';
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