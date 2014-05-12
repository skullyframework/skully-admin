<div class="row-form imageManagerRow">
    <div class="span12 imageFormContainer">
        <div>{$imageSetting.options.description}</div>
        {include file="admin/widgets/imageUploader/_imageForm.tpl" image=($instanceImages.{$imageSettingName}) type=$imageSetting.options imageSetting=$imageSetting imageSettingName=$imageSettingName}
    </div>
</div>