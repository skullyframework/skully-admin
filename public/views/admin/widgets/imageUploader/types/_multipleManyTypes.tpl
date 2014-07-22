{nocache}
    {foreach from=($instanceImages.{$_imageSettingName}) item=_image key=_imagePos}
        {include file="admin/widgets/imageUploader/multiple/_manyTypes.tpl" _imageSettingName=$_imageSettingName _imageSetting=$_imageSetting _image=$_image _imagePos=$_imagePos}
    {/foreach}
{/nocache}
