{* update ke admin baru  *}
{nocache}
    {foreach from=$_imageSettings item=_imageSetting key=_imageSettingName}
        <div class="panel panel-default image_row-{$_imageSettingName}">
            <div class="panel-heading image_row-title">
                <h3 class="text-info">{$instanceInfo}{$_imageSetting._config.adminName}</h3>
            </div>
            <div class="panel-body">
                <div class="row m-b-15">
                    <div class="col-sm-12 text-right">
                        {if $_imageSetting._config.multiple}
                            {* If coming from ImageUploaderSetting, $isSettingModel is true *}
                            {if $isSettingModel}
                                <a href="#" data-setting_id="{$instances.{$_imageSettingName}.id}" data-setting_name="{$_imageSettingName}" class="add_image btn btn-primary btn-small{if $_imageSetting.types} many{else} one{/if}" title="Add New"><i class="fa fa-plus"></i></a>
                            {else}
                                <a href="#" data-setting_id="{${$instanceName}.id}" data-setting_name="{$_imageSettingName}" class="add_image btn btn-primary btn-small{if $_imageSetting.types} many{else} one{/if}" title="Add New"><i class="fa fa-plus"></i></a>
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
        </div>
    {/foreach}
{/nocache}