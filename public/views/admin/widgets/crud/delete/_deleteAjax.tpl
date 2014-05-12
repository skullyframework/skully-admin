{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
<h3>Delete {$instanceName}</h3>
{/block}
{block name=dialogContent}
    {$form}
{/block}
{block name=dialogButtons}
	<a class="btn btn-danger" onclick="return bootstrapModalSubmit();">Delete</a>
	<a class="btn" data-dismiss="modal">Close</a>
{/block}