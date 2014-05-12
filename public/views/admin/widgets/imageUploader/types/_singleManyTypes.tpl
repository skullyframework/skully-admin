{$i = 0}
{foreach from=$imageSetting.types item=type key=typeName}
    {if $i%4==0}
        <div class="row-form imageManagerRow">
    {/if}
    <div class="span3 imageFormContainer">
        <label>{$typeName}</label>
        <div>{$type.description}</div>
        {include file="admin/widgets/imageUploader/_imageForm.tpl" image=($instanceImages.{$imageSettingName}.{$typeName}) type=$type typeName=$typeName imageSetting=$imageSetting imageSettingName=$imageSettingName}
    </div>
    {if $i%4==3 || count($imageSetting.types)==$i+1}
        </div>
    {/if}
    {$i = $i+1}
{/foreach}