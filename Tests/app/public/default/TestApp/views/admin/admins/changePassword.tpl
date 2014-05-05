{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
<h3>{lang value="Change Password"}</h3>
{/block}
{block name=dialogContent}
<form class="validate" method="POST" action="{url path="admin/admins/updatePassword"}">
	<div class="block-fluid">
		<div class="row-form">
			<div class="span12 largerText">
				<input name="admin[id]" type="hidden" value="{$admin.id}">
				<input name="admin[email]" type="hidden" value="{$admin.email}">
				{lang value="Change Password"}
			</div>
		</div>

		<div class="row-form">
			<div class="span4">{lang value="Old Password"}</div>
			<div class="span8">
				<input name="admin[oldPassword]" type="password" class="validate[required]" value="{$admin.password}"/>
			</div>
		</div>

		<div class="row-form">
			<div class="span4">{lang value="New Password"}</div>
			<div class="span8">
				<input name="admin[password]" type="password" class="validate[required]" value="{$admin.password}"/>
			</div>
		</div>

		<div class="row-form">
			<div class="span4">{lang value="New Password Confirmation"}</div>
			<div class="span8">
				<input name="admin[passwordConfirmation]" type="password" class="validate[required]" value="{$admin.passwordConfirmation}"/>
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
</form>
{/block}