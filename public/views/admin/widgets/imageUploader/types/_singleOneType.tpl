{nocache}
    <div class="row-form imageManagerRow">
        <div class="span12 imageFormContainer">
            <div class="clearfix">
                <div class="FL">{$_imageSetting.options.description}</div>
                <div class="FR TAR" style="padding: 5px 10px;">
                    {if $isSettingModel}
                        <a href="{url path=$imageDeletePath id={$instances.{$_imageSettingName}.id} setting={$_imageSettingName} field='value'}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="icos-remove"></i></a>
                    {else}
                        <a href="{url path=$imageDeletePath id={${$instanceName}.id} setting={$_imageSettingName} field={$_imageSettingName}}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="icos-remove"></i></a>
                    {/if}
                </div>
            </div>
            {include file="admin/widgets/imageUploader/_imageForm.tpl" _image=($instanceImages.{$_imageSettingName}) type=$_imageSetting.options _imageSetting=$_imageSetting _imageSettingName=$_imageSettingName}
        </div>
    </div>
{/nocache}