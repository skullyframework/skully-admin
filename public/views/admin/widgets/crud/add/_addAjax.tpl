{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
<h3>Create new {$instanceName}</h3>
{/block}
{block name=dialogContent}
    {nocache}
        {$form}
    {/nocache}
{/block}