{nocache}
    {form method="POST" action="{url path=$destroyPath}"}
        <input type="hidden" name="{$instanceName}[id]" value="{${$instanceName}.id}"/>
        <div class="block-fluid">
            <div class="row">
                <div class="col-sm-12 largerText">
                    <h4 class="bold">Delete this {$instanceName}?</h4>
                </div>
            </div>
            {if !$isAjax}
                <div class="row m-t-30">
                    <div class="col-sm-12">
                        <div class="toolbar bottom TAR">
                            <button class="btn btn-danger" id="submitForm" type="submit">Delete</button>
                        </div>
                    </div>
                </div>
            {/if}
        </div>
    {/form}
{/nocache}