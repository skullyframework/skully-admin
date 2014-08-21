{nocache}
    {foreach from=$_imageSettings item=_imageSetting key=_imageSettingName}
        <div class="block-fluid image_row-{$_imageSettingName}">
            <div class="row-form image_row-title">
                <div class="span3 largerText">
                    {$instanceInfo}{$_imageSetting._config.adminName}
                </div>
                <div class="TAR">
                    {if $_imageSetting._config.multiple}
                        {* If coming from ImageUploaderSetting, $isSettingModel is true *}
                        {if $isSettingModel}
                            <a href="#" data-setting_id="{$instances.{$_imageSettingName}.id}" data-setting_name="{$_imageSettingName}" class="add_image btn btn-primary btn-small{if $_imageSetting.types} many{else} one{/if}" title="Add New"><i class="icos-plus1"></i></a>
                        {else}
                            <a href="#" data-setting_id="{${$instanceName}.id}" data-setting_name="{$_imageSettingName}" class="add_image btn btn-primary btn-small{if $_imageSetting.types} many{else} one{/if}" title="Add New"><i class="icos-plus1"></i></a>
                        {/if}
                    {/if}
                </div>
            </div>
            {if $_imageSetting._config.multiple}
                {if $_imageSetting.types}
                    {include file=$multipleManyTypesForm imageSettingName=$_imageSettingName imageSetting=$_imageSetting}
                {else}
                    {include file=$multipleOneTypeForm imageSettingName=$_imageSettingName imageSetting=$_imageSetting}
                {/if}
            {elseif !$_imageSetting._config.multiple}
                {if $_imageSetting.types}
                    {include file=$singleManyTypesForm imageSettingName=$_imageSettingName imageSetting=$_imageSetting}
                {else}
                    {include file=$singleOneTypeForm imageSettingName=$_imageSettingName imageSetting=$_imageSetting}
                {/if}
            {/if}
        </div>
    {/foreach}
{/nocache}