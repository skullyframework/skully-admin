{extends file="admin/wrappers/_main.tpl"}
{block name=header}
<title>Edit {$instanceName}</title>
{/block}
{block name=content}
<div class="span12">
    {nocache}
        {include file='admin/widgets/_alerts.tpl' }
        <div class="widget">
            <div class="head">
                <div class="icon"><i class="icosg-bookmark1"></i></div>
                <h2>Edit {$instanceName}</h2>
            </div>
            {$form}
        </div>
    {/nocache}
</div>
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