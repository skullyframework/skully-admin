{if empty($action)}
    {$action='create'}
{/if}
{form class="validate" method="POST" action="{url path="admin/admins/"|cat:$action}"}
    <div class="block-fluid">
        <div class="row-form">
            <div class="span12 largerText">
                {if $action=='create'}
                    {lang value="Create "|cat:$instanceName}
                {else}
                    <input name="admin[id]" type="hidden" value="{$admin.id}">
                    {lang value="Edit "|cat:$instanceName}
                {/if}
            </div>
        </div>
        <div class="row-form">
            <div class="span2">{lang value="Full Name"}</div>
            <div class="span10">
                <input name="admin[name]" type="text" value="{$admin.name}"/>
            </div>
        </div>

        <div class="row-form">
            <div class="span2">{lang value="Email"}</div>
            <div class="span10">
                <input name="admin[email]" type="text" class="validate[required,maxSize[100]]" value="{$admin.email}"/>
                <span class="bottom">{lang value="Used for login. Required."}</span>
            </div>
        </div>

        <div class="row-form">
            <div class="span2">{lang value="Password"}</div>
            <div class="span10">
                <input name="admin[password]" type="password" class="" value="{$admin.password}"/>
            </div>
        </div>

        <div class="row-form">
            <div class="span2">{lang value="Password Confirmation"}</div>
            <div class="span10">
                <input name="admin[password_confirmation]" type="password" class="" value="{$admin.password_confirmation}"/>
            </div>
        </div>

        <div class="row-form">
            <div class="span10"><label for="status">{lang value="Status"}</label></div>
            <div class="span2">
                <select name="admin[status]">
                    <option {if $admin.status=='active'}selected{/if} value="active">{lang value="Active"}</option>
                    <option {if $admin.status=='inactive'}selected{/if} value="inactive">{lang value="Inactive"}</option>
                </select>
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