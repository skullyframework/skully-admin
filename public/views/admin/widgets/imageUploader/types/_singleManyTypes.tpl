{* update ke admin baru  *}
{nocache}
    <div class="row">
        <div class="text-right p-t-5 p-b-5 p-l-10 pr-10">
            {if $isSettingModel}
                <a href="{url path=$imageDeletePath id={$instances.{$_imageSettingName}.id} setting={$_imageSettingName} field='value'}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="fa fa-trash"></i></a>
            {else}
                <a href="{url path=$imageDeletePath id={${$instanceName}.id} setting={$_imageSettingName} field={$_imageSettingName}}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="fa fa-trash"></i></a>
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