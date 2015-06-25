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
            <div class="row m-b-10">
                <div class="col-sm-12 text-right">
                    <a href="{url path=$addPath}" title="Add {$instanceName}" data-toggle="dialog" class="btn btn-primary"><span class="fa fa-plus m-r-10"></span> Add {$instanceName|ucwords}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <div class="form-group form-group-default">
                        <label>{lang value="Filter by Keyword"}</label>
                        <input type="text" id="search-table" class="form-control" placeholder="keywords"/>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6 col-lg-8">
                    <div class="form-group form-group-default" style="max-width: 100px;">
                        <label>{lang value="Show"}</label>
                        <select id="dataTable_length" class="cs-select cs-skin-slide full-width-force" data-init-plugin="cs-select">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
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
