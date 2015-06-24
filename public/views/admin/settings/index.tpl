{extends file="admin/wrappers/_main.tpl"}
{block name=header}
    <title>{$instanceName}</title>
    {if !empty($dragField)}
        <script type='text/javascript' src="{theme_url path="resources/js/plugins/datatables/dataTables.rowReordering.js"}"></script>
    {/if}
{/block}
{block name=content}
    {include file='admin/widgets/_alerts.tpl' }

    <div class="panel panel-transparent">
        <div class="panel-heading bg-master">
            <h2 class="text-primary bold"><i class="fa fa-line-chart m-r-15"></i>{$instanceName|ucwords}</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" id="search-table" class="form-control" placeholder="search keywords"/>
                </div>
            </div>

            {if !empty($dragField)}
                {$sortableTable = 'sortableTable initialized'}
            {/if}
            {html_table
            loop=''
            table_attr='class="'|cat: $sortableTable|cat:' table aTable in table-hover" rel="'|cat:{url path=$indexPath}|cat:'"style="width: 100%;"'
            th_attr=$thAttributes
            cols=$columns
            }
        </div>
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
