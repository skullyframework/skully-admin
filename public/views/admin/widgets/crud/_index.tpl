{extends file="admin/wrappers/_main.tpl"}
{block name=header}
    <title>{$instanceName}</title>
    {if !empty($dragField) && !$clientConfig.dataTableServerSide}
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
                    {if !$clientConfig.dataTableServerSide}
                        {if !empty($dragField)}
                            {$sortableTable = 'sortableTable initialized'}
                        {/if}
                        {html_table
                        loop=''
                        table_attr='class="'|cat: $sortableTable|cat:' aTable in table-hover" rel="'|cat:{url path=$indexPath}|cat:'"style="width: 100%;"'
                        th_attr=$thAttributes
                        cols=$columns
                        }
                    {else}
                        {html_table
                        loop=''
                        table_attr='id="datatable-media" class="display" cellspacing="0" style="width:100%;"'
                        th_attr=$thAttributes
                        cols=$columns
                        }

                        <script type="text/javascript">
                            $(function(){
                                $('#datatable-media').dataTable({
                                    "processing": true,
                                    "serverSide": true,
                                    "ajax": "index",
                                    "columnDefs": {$columnDefs}
                                });

                                {if $isSortable}
                                $( "#datatable-media tbody" ).sortable({
                                    start: function(event, ui) {
                                        ui.item.oldId = ui.item.attr('data-id')
                                        ui.item.startPos = ui.item.index();
                                        ui.item.oldPos = ui.item.attr('data-position');
                                    },
                                    stop: function(event, ui) {
                                        $.ajax({
                                            type: "POST",
                                            url: "reorderServerSide",
                                            data: { oldPosition: ui.item.oldPos, newPosition: $('#datatable-media').DataTable().row(ui.item.index()).nodes().to$().attr('data-position'), id: ui.item.oldId }
                                        });
                                        $('#datatable-media').DataTable().draw(false);
                                    }
                                });
                                $( "#datatable-media tbody" ).disableSelection();
                                {/if}
                            });
                        </script>
                    {/if}
                </div>
            </div>
        {/nocache}
    </div>
{/block}

{if !$clientConfig.dataTableServerSide}
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
{/if}
