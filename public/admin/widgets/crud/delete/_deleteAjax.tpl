{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
<h3>Delete {$title}</h3>
{/block}
{block name=dialogContent}
	{if !empty($destroyPath)}
		{include file="admin/widgets/crud/delete/_deleteForm.tpl"}
	{else}
		{include file=$formPath}
	{/if}
{/block}
{block name=dialogButtons}
	<a class="btn btn-danger" onclick="return bootstrapModalSubmit();">Delete</a>
	<a class="btn" data-dismiss="modal">Close</a>
{/block}