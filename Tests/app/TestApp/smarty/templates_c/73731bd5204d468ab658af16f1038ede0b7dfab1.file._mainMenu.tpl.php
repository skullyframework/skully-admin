<?php /* Smarty version Smarty-3.1.18, created on 2014-05-02 20:08:00
         compiled from "/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/widgets/_mainMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82976017253639896e2b1c3-49617620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73731bd5204d468ab658af16f1038ede0b7dfab1' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/widgets/_mainMenu.tpl',
      1 => 1399036076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82976017253639896e2b1c3-49617620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53639896e488c7_26707305',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53639896e488c7_26707305')) {function content_53639896e488c7_26707305($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/function.url.php';
?><ul class="main">
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/home/index'),$_smarty_tpl);?>
"><span class="icom-screen"></span><span class="text">Main</span></a></li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/admins/index'),$_smarty_tpl);?>
"><span class="icom-user3"></span><span class="text">Admins</span></a></li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/settings/index'),$_smarty_tpl);?>
"><span class="icom-cog"></span><span class="text">Settings</span></a></li>
</ul><?php }} ?>
