{extends file="admin/wrappers/_main.tpl"}
{block name=header}
  <title>Admins</title>
  {if !empty($dragField)}
    <script type='text/javascript' src="{theme_url path="resources/js/plugins/datatables/dataTables.rowReordering.js"}"></script>
  {/if}
{/block}
{block name=content}
  <div class="span12">
    {include file='admin/widgets/_alerts.tpl' }
    <div class="widget">
      <div class="head dark">
        <div class="icon"><i class="icos-stats-up"></i></div>
        <h2>Admins</h2>
        <ul class="buttons">
          <li><a href="{url path='admin/admins/add'}" title="Add Store" data-toggle="dialog"><span class="icos-plus1"></span></a></li>
        </ul>
      </div>
      <div class="block-fluid">
        {if !empty($dragField)}
          {$sortableTable = 'sortableTable initialized'}
        {/if}
        {html_table
        loop=''
        table_attr='class="'|cat: $sortableTable|cat:' aTable in table-hover" rel="'|cat:{url path='admin/admins/index'}|cat:'"style="width: 100%;"'
        th_attr=$thAttributes
        cols=$columns
        }
      </div>
    </div>
  </div>
{/block}
{block name=footer}
  <script type="text/javascript">
    {if !empty($columnDefs)}
    var _columnDefs = {$columnDefs};
    {/if}
  </script>
  {include file="admin/widgets/crud/widgets/_sortable.tpl"}
{/block}