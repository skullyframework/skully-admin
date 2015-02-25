<?php /* Smarty version Smarty-3.1.18, created on 2015-02-25 23:53:43
         compiled from "D:\apache\skully-admin\public\views\admin\Admins\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2454154edfe176f1106-54929629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bafb450ddcbaef0b63fc686f2ac4fd7279240a0' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\Admins\\login.tpl',
      1 => 1424720148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2454154edfe176f1106-54929629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54edfe17753ed9_94012745',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54edfe17753ed9_94012745')) {function content_54edfe17753ed9_94012745($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
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
                    <a class="btnForgetPassword" href="#" onClick="loginBlock('#forgot'); return false;">Forgot your password?</a>
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
        <div class="row-fluid tips"></div>
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
                <button class="btn btn-block btn-primary btnRecover">Recover</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(".btnRecover").click(function(){
            var tips = $("#forgot .tips");
            tips.html( '<div class="alert alert-warning">Loading... Please wait...</div>' );

            $.ajax({
                url  : '<?php echo smarty_function_url(array('path'=>"admin/admins/forgetPassword"),$_smarty_tpl);?>
',
                type : 'POST',
                data : {
                    email : $("#forgot [name=email]").val()
                },
                success: function(response){
                    var data = JSON.parse(response);
                    if(data.success){
                        tips.html( '<div class="alert alert-success">An email has been sent to your email address. Please follow the instructions to recover your password.</div>' );
                    }
                    else if(data.errors){
                        tips.html( '<div class="alert alert-error">' + data.errors + '</div>' );
                    }
                    else{
                        tips.html( '<div class="alert alert-error">An error occurred while processing your request. Please try again later.</div>' );
                    }
                }
            });
            return false;
        });
    });
</script>

</body>
</html>
<?php }} ?>
