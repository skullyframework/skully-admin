{extends file="admin/wrappers/_main.tpl"}
{block name=header}
<h3>Delete {$instanceName}</h3>
{/block}
{block name=content}
<div class="span12">
    {include file='admin/widgets/_alerts.tpl' }
	{$form}
</div>
{/block}