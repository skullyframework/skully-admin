{*sample usage: *}
{*{include file="admin/widgets/crud/_edit.tpl"*}
{*path="stores"*}
{*title="Store"*}
{*formPath="admin/stores/add/_addForm.tpl"*}
{*action='update'*}
{*}*}

{if $isAjax}
	{if !empty($ajaxPath)}
		{include file=$ajaxPath}
	{else}
		{include file="admin/widgets/crud/edit/_editAjax.tpl"}
	{/if}
{else}
	{if !empty($noAjaxPath)}
		{include file=$noAjaxPath}
	{else}
		{include file="admin/widgets/crud/edit/_editNoAjax.tpl"}
	{/if}
{/if}