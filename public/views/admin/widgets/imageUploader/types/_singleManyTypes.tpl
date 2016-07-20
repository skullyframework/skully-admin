{* update ke admin baru  *}
{nocache}
    <div class="row m-b-10">
        <div class="col-sm-6">
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
                    <span class="btn btn-file btn-large btn-primary">
                        <span class="fileupload-new largeText uploadOnc fileupload-upload">Upload one image, resize to all types (can change later)</span>
                        <span class="fileupload-exists largeText uploadOnc">Upload one image, resize to all types (can change later)</span>
                        <input type="file" name="image" />
                    </span>
                    </div>
                </div>
            {/form}
        </div>

        <div class="col-sm-6 text-right">
            {if $isSettingModel}
                <a href="{url path=$imageDeletePath id={$instances.{$_imageSettingName}.id} setting={$_imageSettingName} field='value'}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="fa fa-trash"></i> {lang value="Delete All Images"}</a>
            {else}
                <a href="{url path=$imageDeletePath id={${$instanceName}.id} setting={$_imageSettingName} field={$_imageSettingName}}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="fa fa-trash"></i> {lang value="Delete All Images"}</a>
            {/if}
        </div>
    </div>
    {$i = 0}
    {foreach from=$_imageSetting.types item=type key=typeName}
        {if $i%4==0}
            <div class="row imageManagerRow">
        {/if}
        <div class="col-sm-3 imageFormContainer">
            <label class="text-primary bold text-uppercase m-b-5">{$typeName}</label>
            <div class="text-info m-b-10">{$type.description}</div>
            {include file="admin/widgets/imageUploader/_imageForm.tpl" _image=($instanceImages.{$_imageSettingName}.{$typeName}) type=$type typeName=$typeName _imageSetting=$_imageSetting _imageSettingName=$_imageSettingName}
        </div>
        {if $i%4==3 || count($_imageSetting.types)==$i+1}
            </div>
        {/if}
        {$i = $i+1}
    {/foreach}
{/nocache}