{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
    <h3 class="text-primary bold"><i class="pg-trash m-r-15"></i>Delete {$instanceName|ucwords}</h3>
{/block}
{block name=dialogContent}
    {nocache}
        {$form}
    {/nocache}
{/block}
{block name=dialogButtons}
	<a class="btn btn-danger" onclick="return bootstrapModalSubmit();"><i class="pg-trash m-r-10"></i>Delete</a>
	<a class="btn" data-dismiss="modal"><i class="pg-close m-r-10"></i>Close</a>
{/block}