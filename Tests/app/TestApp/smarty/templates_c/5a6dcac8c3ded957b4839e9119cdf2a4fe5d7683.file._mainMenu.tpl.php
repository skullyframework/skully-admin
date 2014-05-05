<?php /* Smarty version Smarty-3.1.18, created on 2014-05-02 20:05:36
         compiled from "/media/jay/Data/apache/skully-admin/public/admin/widgets/_mainMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11440780225363982026cc59-67402032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a6dcac8c3ded957b4839e9119cdf2a4fe5d7683' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/admin/widgets/_mainMenu.tpl',
      1 => 1397283763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11440780225363982026cc59-67402032',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536398202d3b48_20525100',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536398202d3b48_20525100')) {function content_536398202d3b48_20525100($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/function.url.php';
?><ul class="main">
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/home/index'),$_smarty_tpl);?>
"><span class="icom-screen"></span><span class="text">Main</span></a></li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/aboutUs/index'),$_smarty_tpl);?>
"><span class="icom-info"></span><span class="text">About<br />Page</span></a></li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/admins/index'),$_smarty_tpl);?>
"><span class="icom-user3"></span><span class="text">Admins</span></a></li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/facilities/index'),$_smarty_tpl);?>
"><span class="icom-cube1"></span><span class="text">Facilities</span></a></li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/contactUs/index'),$_smarty_tpl);?>
"><span class="icom-location"></span><span class="text">Contact Us<br />Page</span></a></li>
    <li>
        <a href="#"><span class="icom-home1"></span><span class="text">Rooms</span></a>
        <ul class="main">
            <li><a href="<?php echo smarty_function_url(array('path'=>"admin/roomSettings/index"),$_smarty_tpl);?>
"><span class="icom-home"></span><span class="text">Main Page</span></a></li>
            <li><a href="<?php echo smarty_function_url(array('path'=>"admin/rooms/index"),$_smarty_tpl);?>
"><span class="icom-cube"></span><span class="text">Rooms</span></a></li>
        </ul>
    </li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/news/index'),$_smarty_tpl);?>
"><span class="icom-article"></span><span class="text">News</span></a></li>
    <li><a href="<?php echo smarty_function_url(array('path'=>'admin/settings/index'),$_smarty_tpl);?>
"><span class="icom-cog"></span><span class="text">Settings</span></a></li>
</ul><?php }} ?>
