{nocache}
    <div class="FR TAR" style="width: 100%; padding: 5px 10px;">
        {if $isSettingModel}
            <a href="{url path=$imageDeletePath id={$instances.{$_imageSettingName}.id} setting={$_imageSettingName} field='value'}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="icos-remove"></i></a>
        {else}
            <a href="{url path=$imageDeletePath id={${$instanceName}.id} setting={$_imageSettingName} field={$_imageSettingName}}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="icos-remove"></i></a>
        {/if}
    </div>
    {$i = 0}
    {foreach from=$_imageSetting.types item=type key=typeName}
        {if $i%4==0}
            <div class="row-form imageManagerRow">
        {/if}
        <div class="span3 imageFormContainer">
            <label>{$typeName}</label>
            <div>{$type.description}</div>
            {include file="admin/widgets/imageUploader/_imageForm.tpl" _image=($instanceImages.{$_imageSettingName}.{$typeName}) type=$type typeName=$typeName _imageSetting=$_imageSetting _imageSettingName=$_imageSettingName}
        </div>
        {if $i%4==3 || count($_imageSetting.types)==$i+1}
            </div>
        {/if}
        {$i = $i+1}
    {/foreach}
{/nocache}