{form class="validate" method="POST" action="{url path="admin/settings/update"}"}
	<div class="block-fluid">

        <div class="row">
            <div class="col-sm-12">
				<input name="setting[id]" type="hidden" value="{$setting.id}">
				<h4 class="text-primary">{lang value=$setting.name}</h4>
			</div>
		</div>

        <div class="row">
            <div class="col-sm-12">
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