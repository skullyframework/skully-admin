<!DOCTYPE html>
<html lang="en">
<head>
    {include file="admin/wrappers/_header.tpl"}
    <title>Administrator Area Login</title>
</head>
<body class="fixed-header">
{if empty($email)}
    {$email = ''}
{/if}
<!-- START PAGE-CONTAINER -->
<div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="{theme_url path="resources/images/admin/login.jpg"}" data-src="{theme_url path="resources/images/admin/login.jpg"}" data-src-retina="{theme_url path="resources/images/admin/login.jpg"}" alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        {*<div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">*}
            {*<h2 class="semi-bold text-white">*}
                {*Pages make it easy to enjoy what matters the most in the life</h2>*}
            {*<p class="small">*}
                {*images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © 2013-2014 REVOX.*}
            {*</p>*}
        {*</div>*}
        <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <div class="p-b-15">
                <img src="{theme_url path="resources/images/admin/pages_logo.png"}" alt="logo" data-src="{theme_url path="resources/images/admin/pages_logo.png"}" data-src-retina="{theme_url path="resources/images/admin/pages_logo_2x.png"}" width="78" height="22">
            </div>
            {include file='admin/widgets/_alerts.tpl' }
            <p>Sign into your administrator account</p>
            <!-- START Login Form -->
            {form id="form-login" class="p-t-15 validate" role="form" method="POST" action="{url path="admin/admins/loginProcess"}"}
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label>Login</label>
                    <div class="controls">
                        <input type="text" name="email" placeholder="Email" class="form-control validate[required,maxSize[255]]" value="{$email}">
                    </div>
                </div>
                <!-- END Form Control-->
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label>Password</label>
                    <div class="controls">
                        <input type="password" class="form-control validate[required,maxSize[255]]" name="password" placeholder="Password">
                    </div>
                </div>
                <!-- START Form Control-->
                <div class="row">
                    <div class="col-md-6 no-padding">&nbsp;</div>
                    <div class="col-md-6 text-right">
                        <a class="btnForgetPassword text-info small" href="#" data-target="#modalForgotPassword" data-toggle="modal">Forgot your password?</a>
                    </div>
                </div>
                <!-- END Form Control-->
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
            {/form}
            <!--END Login Form-->
            {*<div class="pull-bottom sm-pull-bottom">*}
                {*<div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">*}
                    {*<div class="col-sm-3 col-md-2 no-padding">*}
                        {*<img alt="" class="m-t-5" data-src="assets/img/demo/pages_icon.png" data-src-retina="assets/img/demo/pages_icon_2x.png" height="60" src="assets/img/demo/pages_icon.png" width="60">*}
                    {*</div>*}
                    {*<div class="col-sm-9 no-padding m-t-10">*}
                        {*<p><small>*}
                                {*Create a pages account. If you have a facebook account, log into it for this process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a></small>*}
                        {*</p>*}
                    {*</div>*}
                {*</div>*}
            {*</div>*}
        </div>
    </div>
    <!-- END Login Right Container-->
</div>
<!-- END PAGE CONTAINER -->

<div class="modal fade slide-right" id="modalForgotPassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                <div class="container-xs-height full-height">
                    <div class="row-xs-height">
                        <div class="modal-body col-xs-height col-middle text-center">
                            {form class="validate" id="formForgetPassword"}
                            <h5 class="text-primary ">Forgot your password?</h5>
                            <br>
                            <p class="text-info">Please enter your email address to recover your password</p>
                            <br/>
                            <div class="tips"></div>
                            <div class="form-group form-group-default text-left">
                                <label>Login</label>
                                <div class="controls">
                                    <input type="text" name="email" placeholder="Email" class="form-control validate[required,maxSize[255]]" value="{$email}">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-block btnRecover" data-dismiss="modal">Recover</button>
                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                            {/form}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{include file="admin/widgets/_mainScript.tpl"}
<script type="text/javascript">
    $(function(){
        $('#form-login').validationEngine();
        $("#formForgetPassword").submit(function(){
            $(".btnRecover").click();
            return false;
        });
        $(".btnRecover").click(function(){
            var tips = $("#modalForgotPassword .tips");
            tips.html( '<div class="alert alert-warning">Loading... Please wait...</div>' );

            $.ajax({
                url  : '{url path="admin/admins/forgetPassword"}',
                type : 'POST',
                data : {
                    email : $("#modalForgotPassword [name=email]").val()
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
