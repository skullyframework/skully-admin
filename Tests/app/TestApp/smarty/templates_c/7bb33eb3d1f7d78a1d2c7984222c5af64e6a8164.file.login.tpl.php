<?php /* Smarty version Smarty-3.1.18, created on 2014-05-02 04:33:12
         compiled from "/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/admins/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4813895195362bd98326410-17331637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bb33eb3d1f7d78a1d2c7984222c5af64e6a8164' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/admins/login.tpl',
      1 => 1393294998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4813895195362bd98326410-17331637',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5362bd98c30a59_56475648',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5362bd98c30a59_56475648')) {function content_5362bd98c30a59_56475648($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/function.url.php';
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
