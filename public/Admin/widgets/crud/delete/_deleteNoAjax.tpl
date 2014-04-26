{extends file="admin/wrappers/_main.tpl"}
{block name=header}
<h3>Delete {$title}</h3>
{/block}
{block name=content}
<div class="span12">
{include file='admin/widgets/_alerts.tpl' }
	{if !empty($destroyPath)}
		{include file="admin/widgets/crud/delete/_deleteForm.tpl"}
	{else}
		{include file=$formPath}
	{/if}
</div>
{/block}