{nocache}
    <div class="row-form imageManagerRow">
        <div class="span12 imageFormContainer">
            <div>{$_imageSetting.options.description}</div>
            {include file="admin/widgets/imageUploader/_imageForm.tpl" _image=($instanceImages.{$_imageSettingName}) type=$_imageSetting.options _imageSetting=$_imageSetting _imageSettingName=$_imageSettingName}
        </div>
    </div>
{/nocache}