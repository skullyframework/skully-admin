(function($) {

    'use strict';

    $(function(){

        // dataTable
//        console.log("add bind changed");
        $(document).bind('changed', function() {
//            console.log("document changed");
            if($(".aTable").length > 0) {
//                console.log("aTable found");
                $(".aTable").not('.initialized').each(function(index, argTable) {
//                    console.log("init table");
                    var table = $(argTable);

                    var columnDefs = [];
                    if (typeof(_columnDefs) != 'undefined' && _columnDefs != null) {
                        columnDefs = _columnDefs;
                    }
                    var sorting = [];
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

                    var length = _numDisplayedRows;
    //				var classes_r = table.attr('class');
    //				if (classes_r != null) {
    //					var classes = classes_r.split(' ');
    //					for (var i = 0; i < classes.length; i++) {
    //						var matches = /^rows\_(.+)/.exec(classes[i]);
    //						if (matches != null) {
    //							length = parseInt(matches[1].replace('rows_', ''));
    //						}
    //					}
    //				}

                    // todo: Make searching better. Maybe make the whole data interaction ajax so we can search data from server.
                    table.addClass('initialized');
                    $._oTable = table.dataTable({
                        "sDom": "<'table-responsive't><'row'<p i>>",
                        "sPaginationType": "bootstrap",
                        "destroy": true,
                        "scrollCollapse": true,
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ ",
                            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                        },
                        "bAutoWidth": true,
                        "bLengthChange": true,
                        "iDisplayLength": 10,
                        "aLengthMenu": [10,25,50,100],

                        "bProcessing": true,
                        "sAjaxSource": table.attr('rel'),
                        "aoColumnDefs": columnDefs,
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

                        }
                    });
                    if(sorting.length > 0)
                        table.fnSort(sorting);

                    if($('#search-table').length > 0){
                        $('#search-table').keyup(function() {
                            table.fnFilter($(this).val());
                        });
                    }
                });

                $(document).on("change", ".dataTables_wrapper .dataTables_length select", function(){
                    var val = $(this).val();
                    $.ajax({
                        url : _config.baseUrl + 'admin/home/updateNumDisplayedRows',
                        type : 'POST',
                        data : { numRows : val}
                    });
                });
            }
        });

    });

})(window.jQuery);