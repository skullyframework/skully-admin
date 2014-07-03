<?php /* Smarty version Smarty-3.1.18, created on 2014-07-03 14:44:20
         compiled from "D:\apache\skully-admin\public\views\admin\admins\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1101453b509d4f0aaa7-40795134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98426dcb3c63a6d3f43d264479434b4b8de56706' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\admins\\login.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1101453b509d4f0aaa7-40795134',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b509d5012321_04308987',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b509d5012321_04308987')) {function content_53b509d5012321_04308987($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
?><!DOCTYPE html>
<html lang="en">
<head>
<?php echo $_smarty_tpl->getSubTemplate ("admin/wrappers/_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<title>Administrator Area Login</title>
</head>
<body>
<div class="header">
	<a href="<?php echo smarty_function_url(array('path'=>"admin/home/index"),$_smarty_tpl);?>
" class="logo centralize"></a>
</div>
<?php if (empty($_smarty_tpl->tpl_vars['email']->value)) {?>
	<?php $_smarty_tpl->tpl_vars['email'] = new Smarty_variable('', null, 0);?>
<?php }?>

<div class="login" id="login">
	<div class="wrap" id="main">
		<?php echo $_smarty_tpl->getSubTemplate ('admin/widgets/_alerts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<h1>Welcome. Please Log In</h1>
		<form action="<?php echo smarty_function_url(array('path'=>"admin/admins/loginProcess"),$_smarty_tpl);?>
" method="post" id="validate">
			<div class="row-fluid">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" placeholder="Email" class="validate[required]"/>
				</div>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-exclamation-sign"></i></span>
					<input type="password" name="password" value="" placeholder="Password" class="validate[required]"/>
				</div>
				<div class="dr"><span></span></div>
			</div>
			<div class="row-fluid">
				<div class="span8">
				</div>
				<div class="span4 TAR">
					<input type="submit" class="btn btn-block btn-primary" value="Log In"/>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="login" id="forgot">
	<div class="wrap">
		<h1>Forgot your password?</h1>
		<div class="row-fluid">
			<p>Please enter your email address to recover your password</p>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" placeholder="E-mail"/>
			</div>
			<div class="dr"><span></span></div>
		</div>
		<div class="row-fluid">
			<div class="span4">
				<button class="btn btn-block" onClick="loginBlock('#login');">Back</button>
			</div>
			<div class="span4"></div>
			<div class="span4 TAR">
				<button class="btn btn-block btn-primary">Recover</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>
<?php }} ?>
