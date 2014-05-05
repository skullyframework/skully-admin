{if !empty($breadcrumbs)}
<div class="breadCrumb clearfix">
	<ul id="breadcrumbs">
		<li><a href="{url path="admin/home/index"}">Home</a></li>
		{section loop=$breadcrumbs name=crumb}
			{if $smarty.section.crumb.last}
				<li>{$breadcrumbs[crumb].name}</li>
			{else}
				<li><a href="{$breadcrumbs[crumb].url}">{$breadcrumbs[crumb].name}</a></li>
			{/if}
		{/section}
	</ul>
</div>
{/if}