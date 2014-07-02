{foreach from=($instanceImages.{$imageSettingName}) item=image key=imagePos}
    {include file="admin/widgets/imageUploader/multiple/_oneType.tpl" imageSettingName=$imageSettingName imageSetting=$imageSetting image=$image imagePos=$imagePos}
{/foreach}