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
                    $._oTable = table.DataTable({
                        "sDom": "rt<'row'<'col-sm-12'p i>>",
                        "sPaginationType": "bootstrap",
                        "oLanguage": {
                            "sLengthMenu": "_MENU_"
                        },
                        'searching': true,
                        "processing": true,
                        "serverSide": table.hasClass("serverSide"),
                        "ajax": "index",
                        "columnDefs": columnDefs,
                        "drawCallback": function( settings ) {
                            $(document).trigger("changed");
                        }
                    });
                    if(sorting.length > 0)
                        table.fnSort(sorting);

                    if($('#search-table').length > 0){
                        $("#search-table").change(function(){
                            var val = $(this).val();
                            $._oTable
                                .search( val )
                                .draw();
                        });
                    }
                    if($("#dataTable_length").length > 0){
                        $("#dataTable_length").change(function(){
                            $._oTable.page
                                .len( $(this).val() )
                                .draw();
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