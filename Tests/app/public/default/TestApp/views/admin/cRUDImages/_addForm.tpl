{nocache}
    {if empty($action)}
        {$action='create'}
    {/if}
    {form class="validate" method="POST" action="{url path="admin/cRUDImages/"|cat:$action}"}
        <div class="block-fluid">
            <div class="row-form">
                <div class="span12 largerText">
                    {if $action=='create'}
                        {lang value="Create "|cat:$instanceName}
                    {else}
                        <input name="{$instanceName}[id]" type="hidden" value="{${$instanceName}.id}">
                        {lang value="Edit "|cat:$instanceName}
                    {/if}
                </div>
            </div>

            <div class="row-form">
                <div class="span12">
                    <p>Instance needs to be created first before image(s) can be added into it.</p>
                    <p>Click on "Save Changes" button below.</p>
                </div>
            </div>

            {if !$isAjax}
                <div class="toolbar bottom TAR">
                    <div class="btn-group">
                        <button class="btn btn-primary" id="submitForm" type="submit">Save Changes</button>
                    </div>
                </div>
            {/if}

        </div>
    {/form}
{/nocache}