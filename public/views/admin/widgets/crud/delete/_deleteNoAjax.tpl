{extends file="admin/wrappers/_main.tpl"}
{block name=header}
    <h3 class="text-primary bold"><i class="pg-trash m-r-15"></i>Delete {$instanceName|ucwords}</h3>
{/block}
{block name=content}
<div class="span12">
    {nocache}
        {include file='admin/widgets/_alerts.tpl' }
        <div class="panel panel-transparent">
            <div class="panel-body">
                {$form}
            </div>
        </div>
    {/nocache}
</div>
{/block}