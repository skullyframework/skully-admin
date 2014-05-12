<!DOCTYPE html>
<html lang="en">
<head>
	{include file="admin/wrappers/_header.tpl"}
	{block name=header}
		<title>Administrator Area</title>
	{/block}
</head>
<body>

<div class="header">
	<a href="{url path="home/index"}" class="logo"></a>

	<div class="buttons">
		<div class="popup" id="subNavControll">
			<div class="label"><span class="icos-list"></span></div>
		</div>
		<div class="dropdown">
			<div class="label"><span class="icos-user2"></span></div>
			<div class="body" style="width: 160px;">
				{*<div class="itemLink">*}
					{*<a href="#"><span class="icon-cog icon-white"></span> Settings</a>*}
				{*</div>*}
				{*<div class="itemLink">*}
					{*<a href="#"><span class="icon-comment icon-white"></span> Messages</a>*}
				{*</div>*}
				<div class="itemLink">
					<a href="{url path="admin/admins/edit" id=$user.id}" title="{lang value="My Settings"}" data-toggle="dialog"><span class="icon-cog icon-white"></span> {lang value="My Settings"}</a>
				</div>
				<div class="itemLink">
					<a href="{url path="admin/admins/logout"}"><span class="icon-off icon-white"></span> Logoff</a>
				</div>
			</div>
		</div>
		{*<div class="popup">*}
			{*<div class="label"><span class="icos-search1"></span></div>*}
			{*<div class="body">*}
				{*<div class="arrow"></div>*}
				{*<div class="row-fluid">*}
					{*<div class="row-form">*}
						{*<div class="span12">*}
							{*<div class="input-append input-prepend">*}
								{*<span class="add-on"><i class="icon-search"></i></span>*}
								{*<input type="text" name="search" placeholder="Keyword..."/>*}
								{*<button class="btn" type="button">Search</button>*}
							{*</div>*}
						{*</div>*}
					{*</div>*}
				{*</div>*}
			{*</div>*}
		{*</div>*}
		<div class="popup">
			<div class="label"><span class="icos-cog"></span></div>
			<div class="body">
				<div class="arrow"></div>
				<div class="row-fluid">
					<div class="row-form">
						<div class="span12">
							<span class="top">Themes:</span>
							<div class="themes">
								<a href="#" data-theme="" class="tip" title="Default"><img src="{theme_url path="resources/images/admin/themes/default.jpg"}"/></a>
								<a href="#" data-theme="ssDaB" class="tip" title="DaB"><img src="{theme_url path="resources/images/admin/themes/dab.jpg"}"/></a>
								<a href="#" data-theme="ssTq" class="tip" title="Tq"><img src="{theme_url path="resources/images/admin/themes/tq.jpg"}"/></a>
								<a href="#" data-theme="ssGy" class="tip" title="Gy"><img src="{theme_url path="resources/images/admin/themes/gy.jpg"}"/></a>
								<a href="#" data-theme="ssLight" class="tip" title="Light"><img src="{theme_url path="resources/images/admin/themes/light.jpg"}"/></a>
								<a href="#" data-theme="ssDark" class="tip" title="Dark"><img src="{theme_url path="resources/images/admin/themes/dark.jpg"}"/></a>
								<a href="#" data-theme="ssGreen" class="tip" title="Green"><img src="{theme_url path="resources/images/admin/themes/green.jpg"}"/></a>
								<a href="#" data-theme="ssRed" class="tip" title="Red"><img src="{theme_url path="resources/images/admin/themes/red.jpg"}"/></a>
							</div>
						</div>
					</div>
					<div class="row-form">
						<div class="span12">
							<span class="top">Backgrounds:</span>
							<div class="backgrounds">
								<a href="#" data-background="bg_default" class="bg_default"></a>
								<a href="#" data-background="bg_mgrid" class="bg_mgrid"></a>
								<a href="#" data-background="bg_crosshatch" class="bg_crosshatch"></a>
								<a href="#" data-background="bg_hatch" class="bg_hatch"></a>
								<a href="#" data-background="bg_light_gray" class="bg_light_gray"></a>
								<a href="#" data-background="bg_dark_gray" class="bg_dark_gray"></a>
								<a href="#" data-background="bg_texture" class="bg_texture"></a>
								<a href="#" data-background="bg_light_orange" class="bg_light_orange"></a>
								<a href="#" data-background="bg_yellow_hatch" class="bg_yellow_hatch"></a>
								<a href="#" data-background="bg_green_hatch" class="bg_green_hatch"></a>
							</div>
						</div>
					</div>
					<div class="row-form">
						<div class="span12">
							<span class="top">Navigation:</span>
							<input type="radio" name="navigation" id="fixedNav"/> Fixed
							<input type="radio" name="navigation" id="collapsedNav"/> Collapsible
							<input type="radio" name="navigation" id="hiddenNav"/> Hidden
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>

<div class="navigation">

{include file="admin/widgets/_mainMenu.tpl"}

{* Show & hide of submain navigation area *}
<div class="control"></div>

<div class="submain">

<div id="default">

	{include file="admin/widgets/_userInfo.tpl"}
	<div class="dr"><span></span></div>
	{block name=leftBar}{/block}
</div>

</div>

</div>

{include file="admin/widgets/_breadcrumbs.tpl"}

<div class="content">

	<div class="row-fluid">

		{block name=content}Content here{/block}

	</div>
	{block name=mid}{/block}

</div>
{block name=footer}{/block}
<div class="loadingframe"></div>
</body>
</html>