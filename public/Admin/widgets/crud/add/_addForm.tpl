{*sample addForm:*}
{*{if empty($action)}*}
	{*{$action='create'}*}
{*{/if}*}
{*<form class="validate" method="POST" action="{url path="admin/stores/"|cat:$action}">*}
	{*<div class="block-fluid">*}
		{*<div class="row-form">*}
			{*<div class="span12 largerText">*}
			{*{if $action=='create'}*}
				{*{lang value="Create "|cat:$title}*}
			{*{else}*}
				{*<input name="store[id]" type="hidden" value="{$store.id}">*}
				{*{lang value="Edit "|cat:$title}*}
			{*{/if}*}
			{*</div>*}
		{*</div>*}
		{*<div class="row-form">*}
			{*<div class="span2">{lang value="Name"}</div>*}
			{*<div class="span10">*}
				{*<input name="store[name]" type="text" class="validate[required,maxSize[255]]" value="{$store.name}"/>*}
				{*<span class="bottom">{lang value="Store Name. Required."}</span>*}
			{*</div>*}
		{*</div>*}

		{*<div class="row-form">*}
			{*<div class="span2">{lang value="Address"}</div>*}
			{*<div class="span10">*}
				{*<input name="store[address]" type="text" class="" value="{$store.address}"/>*}
			{*</div>*}
		{*</div>*}

		{*<div class="row-form">*}
			{*<div class="span2">{lang value="city"}</div>*}
			{*<div class="span10">*}
				{*<input name="store[city]" type="text" class="" value="{$store.city}"/>*}
			{*</div>*}
		{*</div>*}

		{*<div class="row-form">*}
			{*<div class="span2">{lang value="state"}</div>*}
			{*<div class="span10">*}
				{*<input name="store[state]" type="text" class="" value="{$store.state}"/>*}
			{*</div>*}
		{*</div>*}

	{*{if !$isAjax}*}
		{*<div class="toolbar bottom TAR">*}
			{*<div class="btn-group">*}
				{*<button class="btn btn-primary" id="submitForm" type="submit">Submit</button>*}
			{*</div>*}
		{*</div>*}
	{*{/if}*}

	{*</div>*}
{*</form>*}