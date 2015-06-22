{extends file="admin/wrappers/_main.tpl"}
{block name=header}
<title>Edit {$instanceName}</title>
{/block}
{block name=content}
    {nocache}
        {include file='admin/widgets/_alerts.tpl' }
        <div class="panel panel-transparent">
            <div class="panel-heading">
                <h2 class="text-primary bold"><i class="fa fa-bookmark m-r-15"></i>Edit {$instanceName|ucwords}</h2>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                {$form}
            </div>
        </div>
    {/nocache}
{/block}
{block name=footer}
    {* Below code is used to attach attribute errors to input elements. *}
    {* To use this, input elements must be named "instance[attribute]" *}
    {if !empty($errorAttributes) }
        <script type="text/javascript">
            var errors = {$errorAttributes|@json_encode};
            attachErrors(errors, '{$instance}');
        </script>
    {/if}
{/block}