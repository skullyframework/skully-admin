{*sample*}
{*{include file="admin/widgets/crud/_add.tpl"*}
{*path="stores"*}
{*title="Store"*}
{*formPath="admin/stores/add/_addForm.tpl"*}
{*action='create'*}
{*}*}

{if $isAjax}
	{if !empty($ajaxPath)}
		{include file=$ajaxPath}
	{else}
		{include file="admin/widgets/crud/add/_addAjax.tpl"}
	{/if}
{else}
	{if !empty($noAjaxPath)}
		{include file=$noAjaxPath}
	{else}
		{include file="admin/widgets/crud/add/_addNoAjax.tpl"}
	{/if}
{/if}