{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
    <h3>Delete image</h3>
{/block}
{block name=dialogContent}
    <form method="POST" action="{url path=$imageDestroyPath}">
        <input type="hidden" name="{$instanceName}[id]" value="{${$instanceName}.id}"/>
        <input type="hidden" name="position" value="{$position}" />
        <input type="hidden" name="field" value="{$imageSettingName}" />
        <div class="block-fluid">
            <div class="row-form">
                <div class="span12 largerText">
                    Delete this image?
                    <div><img src="{public_url path={$image}}" /></div>
                </div>
            </div>
            {if !$isAjax}
                <div class="toolbar bottom TAR">
                    <button class="btn btn-primary" id="submitForm" type="submit">Submit</button>
                </div>
            {/if}
        </div>
    </form>
{/block}
{block name=dialogButtons}
    <a class="btn btn-danger" onclick="return deleteClicked();">Delete</a>
    <a class="btn" data-dismiss="modal">Close</a>
{/block}