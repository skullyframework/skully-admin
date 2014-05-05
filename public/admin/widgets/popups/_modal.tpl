<div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Modal</h3>
	</div>
	<div class="modal-body">
		{block name="modalMessage"}{/block}
	</div>
	<div class="modal-footer">
		<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">{block name="modalButtonValue"}Ok{/block}</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>