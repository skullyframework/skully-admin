{nocache}
    {form method="POST" action="{url path=$destroyPath}"}
        <input type="hidden" name="{$instanceName}[id]" value="{${$instanceName}.id}"/>
        <div class="block-fluid">
            <div class="row-form">
                <div class="span12 largerText">Delete this {$instanceName}?</div>
            </div>
            {if !$isAjax}
                <div class="toolbar bottom TAR">
                    <button class="btn btn-danger" id="submitForm" type="submit">Delete</button>
                </div>
            {/if}
        </div>
    {/form}
{/nocache}