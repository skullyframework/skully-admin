{form class="validate" method="POST" action="{url path="admin/settings/update"}"}
	<div class="block-fluid">

		<div class="row-form">
			<div class="span12 largerText">
				<input name="setting[id]" type="hidden" value="{$setting.id}">
				{lang value=$setting.name}
			</div>
		</div>

		<div class="row-form">
			<div class="span2">{lang value="value"}</div>
			<div class="span10">
				{include file="admin/settings/forms/_"|cat:$setting.input_type|cat:".tpl"}
			</div>
		</div>

	{if !$isAjax}
		<div class="toolbar bottom TAR">
			<div class="btn-group">
				<button class="btn btn-primary" id="submitForm" type="submit">Submit</button>
			</div>
		</div>
	{/if}

	</div>
{/form}