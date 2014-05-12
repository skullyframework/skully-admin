<script type="text/javascript">
  {if !empty($dragField)}
    var dragField = '{$dragField}';

    var sorting = [];
    var table = $('.sortableTable');
    table.find('th').each(function (index, el) {
      // Get sorting classes in table's th elements:
      // If class contains 'sort_asc', sort ascending.
      // If class contains 'sort_desc', sort descending.
      if ($(el).hasClass('sort_asc')) {
        sorting[sorting.length] = [index, 'asc'];
      }
      else if ($(el).hasClass('sort_desc')) {
        sorting[sorting.length] = [index, 'desc'];
      }

    });

    $(document).bind('changed', function(e) {
      if (!table.hasClass('tableInitialized')) {
        table.addClass('tableInitialized');
        $._oTable = table.dataTable({
          "bAutoWidth": true,
          "bLengthChange": true,
          "iDisplayLength": 10,
          "aLengthMenu": [10,25,50,100],
          "sPaginationType": "full_numbers",
          "bProcessing": true,
          "sAjaxSource": table.attr('rel'),
          "aoColumnDefs": {$columnDefs},
          "fnDrawCallback": function() {
            $(document).trigger('changed');
          },
          "fnServerData": function ( sSource, aoData, fnCallback ) {
            /* Add some extra data to the sender */
  //						aoData.push( { "name": "more_data", "value": "my_value" } );
            $.getJSON( sSource, aoData, function (json) {
              /* Do whatever additional processing you want on the callback, then tell DataTables */
              fnCallback(json);
              $(document).trigger('changed');
            } );
          },
          "fnInitComplete": function() {
            $(document).trigger("datatableLoaded");
          },
          "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            // Add styling on each td:
            // Get hidden columns, then iterate each column, if column is hidden, move to next index
            var columns = this.dataTableSettings[0].aoColumns;

            var i = 0;
            for(var i2=0;i2<columns.length;i2++) {
              var column = columns[i2];
              if (column.bVisible) {
                var td = $('td',nRow).slice(i,(i+1));
                if (typeof aData[i2]=='object' && aData[i2]!=null){
                  if (typeof aData[i2].style!='undefined'){
                    td.attr('style',aData[i2].style);
                  }
                  if (typeof aData[i2].class!='undefined'){
                    td.removeClass(aData[i2].class);
                    td.addClass(aData[i2].class);
                  }
                  td.html('');
                  if (typeof aData[i2].data!='undefined'){
                    td.html(aData[i2].data);
                  }
                }
                i++;
              }
            }

            /* set tr id. */
            var id = aData[{$sortableIdColumnIndex}];
            $(nRow).attr("id",id);
            return nRow;
          }
        }).rowReordering({
              sURL: '{url path="$reorderPath"}',
              iIndexColumn: 0,
              sRequestType: "POST"
            });
        table.fnSort(sorting);
      }
    });
  {/if}
</script>