<!DOCTYPE html>
<html lang="en">
<head>
	{include file="admin/wrappers/_header.tpl"}
	{block name=header}
		<title>Administrator Area</title>
	{/block}
    {block name=headerAfter}{/block}
    {include file="admin/widgets/_mainScript.tpl"}
</head>
<body class="page-{$route|replace:'/':'-'} fixed-header">

<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" data-pages="sidebar">
    <div id="appMenu" class="sidebar-overlay-slide from-top">
    </div>
    <!-- BEGIN SIDEBAR HEADER -->
    <div class="sidebar-header">
        <img src="{theme_url path="resources/images/admin/pages_logo_white.png"}" alt="logo" class="brand" data-src="{theme_url path="resources/images/admin/pages_logo_white.png"}" data-src-retina="{theme_url path="resources/images/admin/pages_logo_white_2x.png"}" width="78" height="22">
        <div class="sidebar-header-controls">
            <button data-pages-toggle="#appMenu" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" type="button"><i class="fa fa-angle-down fs-16"></i>
            </button>
            <button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline" type="button"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR HEADER -->
    <!-- BEGIN SIDEBAR MENU -->
    <div class="sidebar-menu">
        {include file="admin/widgets/_mainMenu.tpl"}
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->

<!-- START PAGE-CONTAINER -->
<div class="page-container">
    <!-- START PAGE HEADER WRAPPER -->
    <!-- START HEADER -->
    <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <!-- LEFT SIDE -->
        <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="sm-action-bar">
                <a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
                    <span class="icon-set menu-hambuger"></span>
                </a>
            </div>
            <!-- END ACTION BAR -->
        </div>
        <!-- RIGHT SIDE -->
        <div class="pull-right full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="sm-action-bar">
                <a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
                    <span class="icon-set menu-hambuger-plus"></span>
                </a>
            </div>
            <!-- END ACTION BAR -->
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table">
            <div class="header-inner">
                <div class="brand inline">
                    <img src="{theme_url path="resources/images/admin/pages_logo.png"}" alt="logo" class="brand" data-src="{theme_url path="resources/images/admin/pages_logo.png"}" data-src-retina="{theme_url path="resources/images/admin/pages_logo_2x.png"}" width="78" height="22">
                </div>
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
                    <li class="p-r-15 inline">
                        <div class="dropdown">
                            <a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown" data-href="{url path="admin/home/notification"}">
                                {if $unreadNotificationCount > 0}<span class="bubble">{$unreadNotificationCount}</span>{/if}
                            </a>
                            <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                                <div class="notification-panel">
                                    <!-- START Notification Body-->
                                    <div class="notification-body scrollable" id="notificationList">

                                    </div>
                                    <!-- END Notification Body-->
                                    {*<!-- START Notification Footer-->*}
                                    {*<div class="notification-footer text-center">*}
                                        {*<a href="#" class="">Read all notifications</a>*}
                                        {*<a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">*}
                                            {*<i class="pg-refresh_new"></i>*}
                                        {*</a>*}
                                    {*</div>*}
                                    {*<!-- END Notification Footer-->*}
                                </div>
                            </div>
                        </div>
                    </li>
                    {*<li class="p-r-15 inline">*}
                        {*<a href="#" class="icon-set clip "></a>*}
                    {*</li>*}
                    {*<li class="p-r-15 inline">*}
                        {*<a href="#" class="icon-set grid-box"></a>*}
                    {*</li>*}
                </ul>
                <!-- END NOTIFICATION DROPDOWN -->
                {*<a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a>*}
            </div>
        </div>
        <div class=" pull-right">
            <div class="header-inner">
                <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a>
            </div>
        </div>
        <div class=" pull-right">
            <!-- START User Info-->
            {include file="admin/widgets/_userInfo.tpl"}
            <!-- END User Info-->
        </div>
    </div>
    <!-- END HEADER -->
    <!-- END PAGE HEADER WRAPPER -->
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
            {include file="admin/widgets/_breadcrumbs.tpl"}
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                {block name="content"}{/block}
                <!-- END PLACE PAGE CONTENT HERE -->
            </div>
            {block name=mid}{/block}
            <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->

        <!-- START FOOTER -->
        <div class="container-fluid container-fixed-lg footer">
            <div class="copyright sm-text-center">
                <p class="small no-margin pull-left sm-pull-reset">
                    <span class="hint-text">Copyright © {$smarty.now|date_format:"%Y"}</span>
                    <a href="http://tgitriodesign.com" target="_blank" class="font-montserrat">Trio Digital Agency</a>.
                    <span class="hint-text">All rights reserved.</span>
                    {*<span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a>*}
                    {*</span>*}
                </p>
                {*<p class="small no-margin pull-right sm-pull-reset">*}
                {*<a href="#">Hand-crafted</a>*}
                {*<span class="hint-text">&amp; Made with Love ®</span>*}
                {*</p>*}
                <div class="clearfix"></div>
            </div>
            {block name=footer}
            {/block}
        </div>
        <!-- END FOOTER -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

<div class="loadingframe"></div>
<script src="{theme_url path="resources/plugins/pace/pace.min.js"}" type="text/javascript"></script>
{block name="script"}{/block}
</body>
</html>