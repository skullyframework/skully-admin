{extends file="admin/wrappers/_main.tpl"}
{block name=header}
<title>{$instanceName}</title>
  {if !empty($dragField)}
    <script type='text/javascript' src="{theme_url path="resources/js/plugins/datatables/dataTables.rowReordering.js"}"></script>
  {/if}
{/block}
{block name=content}
<div class="span12">
{include file='admin/widgets/_alerts.tpl' }
    {nocache}
	<div class="widget">
		<div class="head dark">
			<div class="icon"><i class="icos-stats-up"></i></div>
			<h2>{$instanceName}</h2>
			<ul class="buttons">
				<li><a href="{url path=$addPath}" title="Add {$instanceName}" data-toggle="dialog"><span class="icos-plus1"></span></a></li>
			</ul>
		</div>
        <div class="block-fluid">
                {if !empty($dragField)}
                    {$sortableTable = 'sortableTable initialized'}
                {/if}
                {html_table
                loop=''
                table_attr='class="'|cat: $sortableTable|cat:' aTable in table-hover" rel="'|cat:{url path=$indexPath}|cat:'"style="width: 100%;"'
                th_attr=$thAttributes
                cols=$columns
                }
        </div>
	</div>
    {/nocache}
</div>
{/block}
{block name=footer}
    {nocache}
        <script type="text/javascript">
            {if !empty($columnDefs)}
            var _columnDefs = {$columnDefs};
            {/if}
        </script>
    {/nocache}
{include file="admin/widgets/crud/widgets/_sortable.tpl"}
{/block}
