<?php /* Smarty version Smarty-3.1.18, created on 2014-08-06 14:20:35
         compiled from "/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/widgets/_mainMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80821921753e1d743600811-09064547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73731bd5204d468ab658af16f1038ede0b7dfab1' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/widgets/_mainMenu.tpl',
      1 => 1407309359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80821921753e1d743600811-09064547',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53e1d743638683_38413837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e1d743638683_38413837')) {function content_53e1d743638683_38413837($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/skullyframework/skully/Skully/App/smarty/plugins/function.url.php';
?><ul class="main">
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/home/index'),$_smarty_tpl);?>
"><span class="icom-screen"></span><span class="text">Main</span></a></li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/admins/index'),$_smarty_tpl);?>
"><span class="icom-user3"></span><span class="text">Admins</span></a></li>
    <li>
        <a href="<?php echo smarty_function_url(array('path'=>'admin/cRUDImages/index'),$_smarty_tpl);?>
"><span class="icom-images"></span><span class="text">Images</span></a>
        <ul class="main">
            <li><a href="<?php echo smarty_function_url(array('path'=>'admin/cRUDImages/index'),$_smarty_tpl);?>
"><span class="icom-images"></span><span class="text">Images (CRUD)</span></a></li>
            <li><a href="<?php echo smarty_function_url(array('path'=>'admin/settingImages/index'),$_smarty_tpl);?>
"><span class="icom-images"></span><span class="text">Images (Settings)</span></a></li>
        </ul>
    </li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/settings/index'),$_smarty_tpl);?>
"><span class="icom-cog"></span><span class="text">Settings</span></a></li>
</ul><?php }} ?>
