{if empty($action)}
    {$action='create'}
{/if}
{form class="validate" method="POST" action="{url path="admin/admins/"|cat:$action}"}
    {if $action!='create'}
        <input name="admin[id]" type="hidden" value="{$admin.id}">
    {/if}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default">
                <label for="admin_name">{lang value="Full Name"}</label>
                <input name="admin[name]" id="admin_name" type="text" class="form-control" value="{$admin.name|escape}"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default required">
                <label for="admin_email">{lang value="Email"}</label>
                <input name="admin[email]" id="admin_email" type="text" class="form-control validate[required,maxSize[100]]" value="{$admin.email|escape}"/>
                <p class="text-hint small">{lang value="Used for login. Required."}</p>
            </div>
        </div>
    </div>

    {if $_user.type != "staff" && $admin.id != $_user.id}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default">
                <label for="admin_type">{lang value="Type"}</label>
                <select name="admin[type]" id="admin_type" class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                    {foreach $availableTypes as $type => $typeName}
                    <option {if $admin.type==$type}selected{/if} value="{$type}">{$typeName}</option>
                    {/foreach}
                </select>
            </div>
        </div>
    </div>
    {else}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default">
                <label for="admin_type">{lang value="Type"}</label>
                {foreach $types as $type => $typeName}
                    {if $admin.type==$type}<span>{$typeName}</span>{/if}
                {/foreach}
            </div>
        </div>
    </div>
    {/if}

    {if ($_user.type != "staff" && $admin.id != $_user.id) || $_user.type == "admin"}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default">
                <label for="admin_branch_id">{lang value="Branch"}</label>
                <select name="admin[branch_id]" id="admin_branch_id" class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                    {foreach $branches as $branch}
                        {if $_user.type == "admin"}
                            <option {if $admin.branch_id==$branch.id}selected{/if} value="{$branch.id}">{$branch.name}</option>
                        {elseif $_user.type == "manager" && $branch.id == $_user.branch_id}
                            <option selected value="{$branch.id}">{$branch.name}</option>
                        {/if}
                    {/foreach}
                </select>
            </div>
        </div>
    </div>
    {else}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default">
                <label for="admin_branch_id">{lang value="Branch"}</label>
                {foreach $branches as $branch}
                    {if $admin.branch_id==$branch.id}<span>{$branch.name}</span>{/if}
                {/foreach}
            </div>
        </div>
    </div>
    {/if}

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default">
                <label for="admin_password">{lang value="Password"}</label>
                <input name="admin[password]" id="admin_password" type="password" class="form-control" value="{$admin.password|escape}"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default">
                <label for="admin_password_confirmation">{lang value="Password Confirmation"}</label>
                <input name="admin[password_confirmation]" id="admin_password_confirmation" type="password" class="form-control" value="{$admin.password_confirmation|escape}"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group form-group-default">
                <label for="admin_status">{lang value="Status"}</label>
                <select name="admin[status]" id="admin_status" class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                    <option {if $admin.status=='active'}selected{/if} value="active">{lang value="Active"}</option>
                    <option {if $admin.status=='inactive'}selected{/if} value="inactive">{lang value="Inactive"}</option>
                </select>
            </div>
        </div>
    </div>

    {if !$isAjax}
        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-primary" id="submitForm" type="submit"><i class="pg-save m-r-10"></i>Submit</button>
            </div>
        </div>
    {/if}
{/form}