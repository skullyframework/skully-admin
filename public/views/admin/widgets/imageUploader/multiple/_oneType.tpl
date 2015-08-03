{* TODO: update ke admin baru  *}
{nocache}
<div class="row-form imageManagerRow">
    <input type="hidden" name="position" value="{$_imagePos}" />
    <div class="FR">
        {if $isSettingModel}
            <a href="{url path=$imageMovePath id={$instances.{$_imageSettingName}.id} direction="up" position={$_imagePos} setting={$_imageSettingName} field='value'}" class="btn btn-primary btn-small btnMoveUp hasPosition" title="{lang value="Move Up"}"><i class="fa fa-arrow-up"></i></a>
            <a href="{url path=$imageMovePath id={$instances.{$_imageSettingName}.id} direction="down" position={$_imagePos} setting={$_imageSettingName} field='value'}" class="btn btn-primary btn-small btnMoveDown hasPosition" title="{lang value="Move Down"}"><i class="fa fa-arrow-down"></i></a>
            <a href="{url path=$imageDeletePath id={$instances.{$_imageSettingName}.id} position={$_imagePos} setting={$_imageSettingName} field='value'}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="fa fa-remove"></i></a>
        {else}
            <a href="{url path=$imageMovePath id={${$instanceName}.id} direction="up" position={$_imagePos} setting={$_imageSettingName} field={$_imageSettingName}}" class="btn btn-primary btn-small btnMoveUp hasPosition" title="{lang value="Move Up"}"><i class="fa fa-arrow-up"></i></a>
            <a href="{url path=$imageMovePath id={${$instanceName}.id} direction="down" position={$_imagePos} setting={$_imageSettingName} field={$_imageSettingName}}" class="btn btn-primary btn-small btnMoveDown hasPosition" title="{lang value="Move Down"}"><i class="fa fa-arrow-down"></i></a>
            <a href="{url path=$imageDeletePath id={${$instanceName}.id} position={$_imagePos} setting={$_imageSettingName} field={$_imageSettingName}}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="fa fa-remove"></i></a>
        {/if}
    </div>
    <div class="strong positionTitle">{$_imageSetting._config.adminName} Position: <span class="position">{$_imagePos}</span></div>
    <div class="span3 imageFormContainer" {if $i%4==0}style="margin-left: 0;"{/if}>
        <div>{$_imageSetting.options.description}</div>
        {include file="admin/widgets/imageUploader/_imageForm.tpl" group=($_imageSettingName|cat:'_'|cat:{$_imagePos}) _image=($_image) _imageSetting=$_imageSetting _imageSettingName=$_imageSettingName position=$_imagePos}
    </div>
</div>
{/nocache}