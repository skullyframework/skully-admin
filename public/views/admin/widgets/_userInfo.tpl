{nocache}
<div class="widget-fluid userInfo clearfix">
	<div class="name">Welcome, {$adminUsername}</div>
	<ul class="menuList">
		{*<li><a href="{url path='admin/users'}"><span class="icon-cog"></span> Settings</a></li>*}
		{*<li><a href="{url path='admin/userMessages' }"><span class="icon-comment"></span> Messages</a> <b>(5)</b></li>*}
		<li><a href="{url path='admin/admins/logout'}"><span class="icon-share-alt"></span> Logoff</a></li>
	</ul>
	<div class="text"><b>{$smarty.now|date_format:$clientConfig.serverFormDateTimeFormat}</b>
	</div>
</div>
{/nocache}