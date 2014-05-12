<div class="row-form" id="newRow-{$imageSettingName}">
    <div class="span6">
        <form enctype="multipart/form-data" method="POST" action="{url path=$imageUploadPath}">
            <input name="{$instanceName}_id" value="{if !empty(${$instanceName}.id)}{${$instanceName}.id}{/if}" type="hidden" />
            <input name="settingName" value="{$imageSettingName}" type="hidden" />
            <input name="uploadOnce" value="1" type="hidden" />
            <input name="data" value='{ "type": "uploadOnce", "settingName": "{$imageSettingName}" }' type="hidden" />

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div>
                    <span class="btn btn-file btn-large">
                        <span class="fileupload-new largeText uploadOnc fileupload-upload">Upload one image, resize to all types (can change later)</span>
                        <input type="file" name="image" />
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="span6">
        <a href="#" class="btn btn-large largeText uploadSeparately">Upload separate image for each type</a>
    </div>
</div>