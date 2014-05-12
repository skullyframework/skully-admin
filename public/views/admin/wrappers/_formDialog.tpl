{* Name prefixed with 'dialog' to avoid trouble when including this template with main.tpl. *}
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
{block name=dialogHeader}{/block}
</div>
<div class="modal-body">
	<div class="row-fluid">
	{include file="admin/widgets/_ajaxAlerts.tpl"}
	{block name=dialogContent}{/block}
	</div>
</div>
<div class="modal-footer">
	{block name=dialogButtons}
		<a class="btn btn-primary" onclick="return bootstrapModalSubmit();">Save Changes</a>
		<a class="btn" data-dismiss="modal">Close</a>
	{/block}
</div>