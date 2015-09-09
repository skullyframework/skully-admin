{* update ke admin baru *}
{extends file="admin/wrappers/_formDialog.tpl"}
{block name=dialogHeader}
    <h3 class="text-primary bold"><i class="pg-trash m-r-15"></i>Delete Image</h3>
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


            <input type="hidden" name="{$instanceName}[id]" value="{${$instanceName}.id}"/>
            <div class="block-fluid">
                <div class="row">
                    <div class="col-sm-12 largerText">
                        <h4 class="bold">Delete this image?</h4>
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
{/block}
{block name=dialogButtons}
    {nocache}
        <a class="btn btn-danger" onclick="return deleteClicked();"><i class="pg-trash m-r-10"></i>Delete</a>
        <a class="btn" data-dismiss="modal"><i class="pg-close m-r-10"></i>Close</a>
    {/nocache}
{/block}