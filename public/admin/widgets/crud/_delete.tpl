{*sample usage:*}
{*{include file="admin/widgets/crud/_delete.tpl"*}
{*path="stores"*}
{*title="Store"*}
{*}*}

{if $isAjax}
	{if !empty($ajaxPath)}
		{include file=$ajaxPath}
	{else}
		{include file="admin/widgets/crud/delete/_deleteAjax.tpl"}
	{/if}
{else}
	{if !empty($noAjaxPath)}
		{include file=$noAjaxPath}
	{else}
		{include file="admin/widgets/crud/delete/_deleteNoAjax.tpl"}
	{/if}
{/if}