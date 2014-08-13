{nocache}
<div class="row-form" id="newRow-{$_imageSettingName}">
    <div class="span6">
        {form enctype="multipart/form-data" method="POST" action="{url path=$imageUploadPath}"}
            {if $isSettingModel}
                <input name="setting_id" value="{if !empty($instances.{$_imageSettingName}.id)}{$instances.{$_imageSettingName}.id}{/if}" type="hidden" />
                <input name="data" value='{ "id": "{if !empty($instances.{$_imageSettingName}.id)}{$instances.{$_imageSettingName}.id}{/if}", "type": "uploadOnce", "settingName": "{$_imageSettingName}" }' type="hidden" />
            {else}
                <input name="{$instanceName}_id" value="{if !empty(${$instanceName}.id)}{${$instanceName}.id}{/if}" type="hidden" />
                <input name="data" value='{ "id": "{if !empty(${$instanceName}.id)}{${$instanceName}.id}{/if}", "type": "uploadOnce", "settingName": "{$_imageSettingName}" }' type="hidden" />
            {/if}
            <input name="settingName" value="{$_imageSettingName}" type="hidden" />
            <input name="uploadOnce" value="1" type="hidden" />

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div>
                    <span class="btn btn-file btn-large">
                        <span class="fileupload-new largeText uploadOnc fileupload-upload">Upload one image, resize to all types (can change later)</span>
                        <span class="fileupload-exists largeText uploadOnc">Upload one image, resize to all types (can change later)</span>
                        <input type="file" name="image" />
                    </span>
                </div>
            </div>
        {/form}
    </div>
    <div class="span6">
        <a href="#" class="btn btn-large largeText uploadSeparately">Upload separate image for each type</a>
    </div>
</div>
{/nocache}
