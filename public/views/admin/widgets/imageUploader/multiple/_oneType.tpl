<div class="row-form imageManagerRow">
    <input type="hidden" name="position" value="{$imagePos}" />
    <div class="FR">
        {if $isSettingModel}
            <a href="{url path=$imageMovePath id={$instances.{$imageSettingName}.id} direction="up" position={$imagePos} setting={$imageSettingName} field='value'}" class="btn btn-primary btn-small btnMoveUp hasPosition" title="{lang value="Move Up"}"><i class="icos-arrow-up"></i></a>
            <a href="{url path=$imageMovePath id={$instances.{$imageSettingName}.id} direction="down" position={$imagePos} setting={$imageSettingName} field='value'}" class="btn btn-primary btn-small btnMoveDown hasPosition" title="{lang value="Move Down"}"><i class="icos-arrow-down"></i></a>
            <a href="{url path=$imageDeletePath id={$instances.{$imageSettingName}.id} position={$imagePos} setting={$imageSettingName} field='value'}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="icos-remove"></i></a>
        {else}
            <a href="{url path=$imageMovePath id={${$instanceName}.id} direction="up" position={$imagePos} setting={$imageSettingName} field={$imageSettingName}}" class="btn btn-primary btn-small btnMoveUp hasPosition" title="{lang value="Move Up"}"><i class="icos-arrow-up"></i></a>
            <a href="{url path=$imageMovePath id={${$instanceName}.id} direction="down" position={$imagePos} setting={$imageSettingName} field={$imageSettingName}}" class="btn btn-primary btn-small btnMoveDown hasPosition" title="{lang value="Move Down"}"><i class="icos-arrow-down"></i></a>
            <a href="{url path=$imageDeletePath id={${$instanceName}.id} position={$imagePos} setting={$imageSettingName} field={$imageSettingName}}" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="{lang value="Delete"}"><i class="icos-remove"></i></a>
        {/if}
    </div>
    <div class="strong positionTitle">{$imageSetting._config.adminName} Position: <span class="position">{$imagePos}</span></div>
    <div class="span3 imageFormContainer" {if $i%4==0}style="margin-left: 0;"{/if}>
        <div>{$imageSetting.options.description}</div>
        {include file="admin/widgets/imageUploader/_imageForm.tpl" group=($imageSettingName|cat:'_'|cat:{$imagePos}) image=($image) imageSetting=$imageSetting imageSettingName=$imageSettingName position=$imagePos}
    </div>
</div>