{* update ke admin baru  *}
{nocache}
    <div class="row-form imageManagerRow">
        <div class="col-sm-3 imageFormContainer">
            <div>{$_imageSetting.options.description}</div>
            {include file="admin/widgets/imageUploader/_imageForm.tpl" _image=($instanceImages.{$_imageSettingName}) type=$_imageSetting.options _imageSetting=$_imageSetting _imageSettingName=$_imageSettingName}
        </div>

        <div class="col-sm-9 text-right">
            {if $isSettingModel}
                <a href="{url path=$imageDeletePath id={$instances.{$_imageSettingName}.id} setting={$_imageSettingName} field='value'}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="fa fa-trash"></i> {lang value="Delete Image"}</a>
            {else}
                <a href="{url path=$imageDeletePath id={${$instanceName}.id} setting={$_imageSettingName} field={$_imageSettingName}}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="fa fa-trash"></i> {lang value="Delete Image"}</a>
            {/if}
        </div>
    </div>
{/nocache}