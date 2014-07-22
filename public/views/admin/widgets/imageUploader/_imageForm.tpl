{nocache}
    {form class="imageForm" method="POST" enctype="multipart/form-data" action="{url path=$imageUploadPath}"}
        {if !empty($instanceName)}
            <input type="hidden" name="{$instanceName}_id" value="{if !empty(${$instanceName}.id)}{${$instanceName}.id}{/if}" />
        {/if}
        <input type="hidden" name="settingName" value="{$_imageSettingName}" />
        {if !empty($typeName)}
            <input type="hidden" name="type" value="{$typeName}" />
        {/if}
        {if isset($position)}
            <input type="hidden" name="position" value="{$position}"/>
        {/if}
        <div class="fileupload {if !empty($_image)}fileupload-exists{else}fileupload-new{/if}" data-provides="fileupload">
            <div class="fileupload-preview thumbnail">
                {if !empty($_image)}
                    <input type="hidden" name="imageUrl" value="{public_url path=$_image}" />
                    <a href="{public_url path=$_image}" class="fb" rel="{$group}"><img src="{public_url path=$_image}" /></a>
                {else}
                    <div class="emptyInfo">{lang value="No Image"}</div>
                {/if}
            </div>
            <div>
                <span class="btn btn-file btn-primary">
                    <span class="fileupload-new">Upload</span>
                    <span class="fileupload-exists">Change</span>
                    <input type="file" name="image" />
                </span>
                <span class="btn btn-primary fileupload-upload" style="display: none;">Upload</span>
            </div>
        </div>
    {/form}
{/nocache}