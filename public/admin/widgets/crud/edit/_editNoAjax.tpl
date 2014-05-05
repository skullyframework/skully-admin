{extends file="admin/wrappers/_main.tpl"}
{block name=header}
<title>Edit {$title}</title>
{/block}
{block name=content}
<div class="span12">
	{include file='admin/widgets/_alerts.tpl' }
	{include file=$formPath}
</div>
{/block}