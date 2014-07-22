{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
    <h3>Delete image</h3>
{/block}
{block name=dialogContent}
    {nocache}
        {form method="POST" action="{url path=$imageDestroyPath}"}
            {include file="admin/widgets/_alerts.tpl"}
            <input type="hidden" name="{$instanceName}[id]" value="{${$instanceName}.id}"/>
            <input type="hidden" name="position" value="{$position}" />
            <input type="hidden" name="setting" value="{$_imageSettingName}" />
            {if $isSettingModel}
                <input type="hidden" name="field" value="value" />
            {else}
                <input type="hidden" name="field" value="{$_imageSettingName}" />
            {/if}
            <div class="block-fluid">
                <div class="row-form">
                    <div class="span12 largerText">
                        Delete this image?
                        <div><img src="{public_url path={$_image}}" /></div>
                    </div>
                </div>
                {if !$isAjax}
                    <div class="toolbar bottom TAR">
                        <button class="btn btn-primary" id="submitForm" type="submit">Submit</button>
                    </div>
                {/if}
            </div>
        {/form}
    {/nocache}
{/block}
{block name=dialogButtons}
    {nocache}
        <a class="btn btn-danger" onclick="return deleteClicked();">Delete</a>
        <a class="btn" data-dismiss="modal">Close</a>
    {/nocache}
{/block}