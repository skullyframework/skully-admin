{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
    <h3 class="text-primary bold"><i class="fa fa-bookmark m-r-15"></i>Edit {$instanceName|ucwords}</h3>
{/block}
{block name=dialogContent}
    {nocache}
        {$form}
    {/nocache}
{/block}