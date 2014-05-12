<div class="row-form imageManagerRow">
    <input type="hidden" name="position" value="{$imagePos}" />
    <div class="FR">
        <a href="{url path=$imageMovePath id={${$instanceName}.id} direction="up" position={$imagePos} field={$imageSettingName}}" class="btn btn-primary btn-small btnMoveUp hasPosition" title="{lang value="Move Up"}"><i class="icos-arrow-up"></i></a>
        <a href="{url path=$imageMovePath id={${$instanceName}.id} direction="down" position={$imagePos} field={$imageSettingName}}" class="btn btn-primary btn-small btnMoveDown hasPosition" title="{lang value="Move Down"}"><i class="icos-arrow-down"></i></a>
        {*<a href="#" class="btn btn-primary btn-small btnDrag" title="{lang value="Move"}"><i class="icon-move icon-white"></i></a>*}
        <a href="{url path=$imageDeletePath id={${$instanceName}.id} position={$imagePos} field={$imageSettingName}}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="icos-remove"></i></a>
    </div>
    <div class="strong positionTitle">{$imageSetting._config.adminName} Position: <span class="position">{$imagePos}</span></div>
    {$i = 0}
    {foreach from=$imageSetting.types item=type key=typeName}
        <div class="span3 imageFormContainer" {if $i%4==0}style="margin-left: 0;"{/if}>
            <label>{$typeName}</label>
            <div>{$type.description}</div>
            {include file="admin/widgets/imageUploader/_imageForm.tpl" group=($imageSettingName|cat:'_'|cat:{$imagePos}) image=($image.{$typeName}) type=$type typeName=$typeName imageSetting=$imageSetting imageSettingName=$imageSettingName position=$imagePos}
        </div>
        {$i = $i+1}
    {/foreach}
</div>