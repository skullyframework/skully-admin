<!DOCTYPE html>
<html lang="en">
<head>
    {include file="admin/wrappers/_header.tpl"}
    <title>Administrator Area Login</title>
</head>
<body>
<div class="header">
    <a href="{url path="admin/home/index"}" class="logo centralize"></a>
</div>
{if empty($email)}
    {$email = ''}
{/if}

<div class="login" id="login">
    <div class="wrap" id="main">
        {include file='admin/widgets/_alerts.tpl' }
        <h1>Welcome. Please Log In</h1>
        <form action="{url path="admin/admins/loginProcess"}" method="post" id="validate">
            <div class="row-fluid">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" name="email" value="{$email}" placeholder="Email" class="validate[required]"/>
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
                url  : '{url path="admin/admins/forgetPassword"}',
                type : 'POST',
                data : {
                    email : $("[name=email]").val()
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
