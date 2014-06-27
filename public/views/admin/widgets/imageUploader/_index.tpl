{foreach from=$imageSettings item=imageSetting key=imageSettingName}
    <div class="block-fluid image_row-{$imageSettingName}">
        <div class="row-form image_row-title">
            <div class="span3 largerText">
                {$instanceInfo}{$imageSetting._config.adminName}
            </div>
            <div class="TAR">
                {if $imageSetting._config.multiple}
                    {if $isSettingModel}
                        <a href="#" data-setting_id="{$instances.{$imageSettingName}.id}" data-setting_name="{$imageSettingName}" class="add_image btn btn-primary btn-small" title="Add New"><i class="icos-plus1"></i></a>
                    {else}
                        <a href="#" data-setting_id="{${$instanceName}.id}" data-setting_name="{$imageSettingName}" class="add_image btn btn-primary btn-small" title="Add New"><i class="icos-plus1"></i></a>
                    {/if}
                {/if}
            </div>
        </div>
        {if $imageSetting._config.multiple}
            {if $imageSetting.types}
                {include file=$multipleManyTypesForm imageSettingName=$imageSettingName imageSetting=$imageSetting}
            {else}
                {include file=$multipleOneTypeForm imageSettingName=$imageSettingName imageSetting=$imageSetting}
            {/if}
        {elseif !$imageSetting._config.multiple}
            {if $imageSetting.types}
                {include file=$singleManyTypesForm imageSettingName=$imageSettingName imageSetting=$imageSetting}
            {else}
                {include file=$singleOneTypeForm imageSettingName=$imageSettingName imageSetting=$imageSetting}
            {/if}
        {/if}
    </div>
{/foreach}