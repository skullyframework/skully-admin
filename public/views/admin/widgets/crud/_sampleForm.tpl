{*sample form, can be used for both update and create:*}
{*{nocache}*}
{*{if empty($action)}*}
	{*{$action='create'}*}
{*{/if}*}
{*{form class="validate" method="POST" action="{url path="admin/CONTROLLER_PATH/"|cat:$action}"}*}
	{*<div class="block-fluid">*}
		{*<div class="row-form">*}
			{*<div class="span12 largerText">*}
			{*{if $action=='create'}*}
				{*{lang value="Create "|cat:$instanceName}*}
			{*{else}*}
				{*<input name="{$instanceName}[id]" type="hidden" value="{${$instanceName}.id}">*}
				{*{lang value="Edit "|cat:$instanceName}*}
			{*{/if}*}
			{*</div>*}
            {*<div class="TAR">*}
                {*<a href="{url path="admin/CONTROLLER_PATH/images" id={${$instanceName}.id}}" class="btn">Image Manager</a>*}
            {*</div>*}
		{*</div>*}
		{*<div class="row-form">*}
			{*<div class="span2">{lang value="Name"}</div>*}
			{*<div class="span10">*}
				{*<input name="{$instanceName}[name]" type="text" class="validate[required,maxSize[255]]" value="{${$instanceName}.name}"/>*}
				{*<span class="bottom">{lang value="Name. Required."}</span>*}
			{*</div>*}
		{*</div>*}

		{*<div class="row-form">*}
			{*<div class="span2">{lang value="Address"}</div>*}
			{*<div class="span10">*}
				{*<input name="{$instanceName}[address]" type="text" class="" value="{${$instanceName}.address}"/>*}
			{*</div>*}
		{*</div>*}

		{*<div class="row-form">*}
			{*<div class="span2">{lang value="city"}</div>*}
			{*<div class="span10">*}
				{*<input name="{$instanceName}[city]" type="text" class="" value="{${$instanceName}.city}"/>*}
			{*</div>*}
		{*</div>*}

		{*<div class="row-form">*}
			{*<div class="span2">{lang value="state"}</div>*}
			{*<div class="span10">*}
				{*<input name="{$instanceName}[state]" type="text" class="" value="{${$instanceName}.state}"/>*}
			{*</div>*}
		{*</div>*}

	{*{if !$isAjax}*}
		{*<div class="toolbar bottom TAR">*}
			{*<div class="btn-group">*}
				{*<button class="btn btn-primary" id="submitForm" type="submit">Save Changes</button>*}
			{*</div>*}
		{*</div>*}
	{*{/if}*}

	{*</div>*}
{*{/form}*}
{*{/nocache}*}
