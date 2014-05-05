var _openedModal = null;
function bootstrapModalSubmit(formEl) {
	var form = '';
	if (formEl == null) {
		form = _openedModal.find('form');
	}
	else {
		form = formEl;
	}
	if (form.filter('.validationInitialized').validationEngine('validate')) {
		showLoading();
		if (typeof(CKEDITOR) != 'undefined') {
			for(name in CKEDITOR.instances)
			{
				CKEDITOR.instances[name].updateElement()
			}
		}

		$.post(form.attr('action'), form.serialize(),
			function(jsonData, status) {
				hideLoading();
				if (jsonData) {
					data = JSON.parse(jsonData);
					if (data.message) {
						notify(data.message);
						_openedModal.modal('hide');
						$(".aTable").dataTable().fnReloadAjax();
					}
					if (data.error) {
						_openedModal.find('.modal-body').stop().animate({
							scrollTop: 0,
							scrollLeft: 0
						}, 1100, function() {
							displayError(data);
						});
					}
					if (data.redirect) {
						window.location.href = data.redirect;
					}
				}
			}
		);
	}
	return false;
}

// Override this in forms if you need different behavior (for example to set border on displayed birth date inputs when birthdate is invalid).
var attachErrors = function(errors, instance) {
	for($i=0;$i<errors.length;$i++) {
		var error = errors[$i];
		var input = $('[name="'+instance+'['+error.attribute+']"]');
		input.css('border-color', 'red').validationEngine('showPrompt', error.message, 'error', 'topLeft', true);
	}
}

function displayError(data) {
	if (data.error != null) {
		$('#ajaxErrorAlert').html(data.error).fadeIn();
	}
	if (data.errorAttributes != null) {
		attachErrors(data.errorAttributes, data.instance);
	}
}

function displayMessage(message) {
	$('#ajaxErrorMessage').html(message).fadeIn();
}

function showLoading() {
	$('body').addClass("loading");
}

function hideLoading() {
	$('body').removeClass("loading");
}

$(document).ready(function(){
    // Bootstrap tooltip
    $(".tip").tooltip({placement: 'top', trigger: 'hover'});
    $(".tipb").tooltip({placement: 'bottom', trigger: 'hover'});
    $(".tipl").tooltip({placement: 'left', trigger: 'hover'});
    $(".tipr").tooltip({placement: 'right', trigger: 'hover'});
    
    if($('#main_calendar').length > 0){
    
        // fullcalendar
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#main_calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: ''
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                $('#fcAddEvent').modal('show');

	            $("#fcAddEventButton").unbind('click');
                $("#fcAddEventButton").bind('click', function(){

                    var title = $("#fcAddEventTitle").val();

                    if(title){
                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end
                            },true
                        );
//                        notify('Fullcalendar','New Event: '+title+';<br/>start: '+start+';<br/>end: '+end+';');
                    }

                    $('#fcAddEvent').modal('hide');
                    $("#fcAddEventTitle").val('');
                    calendar.fullCalendar('unselect');
                });
            },
            editable: true,
            eventDrop: function(event, delta) {
//                notify('Fullcalendar','Event: '+event.title+' = '+delta);
            },
            events: _config.baseUrl+'admin/calendar/home'
        });    

    }

    // Pnotify notifier
        $.pnotify.defaults.history = false;
        $.pnotify.defaults.delay = 3000;                                      
               
    // Fancybox
    if($("a.fb").length > 0){
        $("a.fb").fancybox({padding: 10,
                            'transitionIn'  : 'elastic',
                            'transitionOut' : 'elastic',
                            'speedIn'       : 600, 
                            'speedOut'      : 200
                        });
    }

    // Select2
    if($(".select").length > 0){
        $(".select").select2();
        $(".select").on("change", function(e) {             
            notify('Select','Value changed: '+e.val);
        });
    }
        
    // Masked input        
    if($("input[class^=mask_]").length > 0){
        $("input.mask_tin").mask('99-9999999',{completed:function(){
                                                notify('Masked input','mask_tin completed');                                                
                                              }});
        $("input.mask_ssn").mask('999-99-9999',{completed:function(){
                                                notify('Masked input','mask_ssn completed');                                                
                                              }});        
        $("input.mask_date").mask('9999-99-99',{completed:function(){
                                                notify('Masked input','mask_date completed');
                                              }});
        $("input.mask_product").mask('a*-999-a999',{completed:function(){
                                                notify('Masked input','mask_product completed');
                                              }});
        $("input.mask_phone").mask('99 (999) 999-99-99',{completed:function(){
                                                notify('Masked input','mask_phone completed');
                                              }});
        $("input.mask_phone_ext").mask('99 (999) 999-9999? x99999',{completed:function(){
                                                notify('Masked input','mask_phone_ext completed');
                                              }});
        $("input.mask_credit").mask('9999-9999-9999-9999',{completed:function(){
                                                notify('Masked input','mask_credit completed');
                                              }});        
        $("input.mask_percent").mask('99%',{completed:function(){
                                                notify('Masked input','mask_percent completed');
                                              }});                                          
    }
    // Multiselect
	function setupMultiselects() {
		var msc = $(".msc");
		if(msc.length > 0){
			msc.each(function(index, item) {
				if (!$(item).data('multiselect')) {
					$(item).multiSelect({
						selectableHeader: "<div class='multipleselect-header'>Selectable item</div>",
						selectionHeader: "<div class='multipleselect-header'>Selected items</div>",
						afterSelect: function(value, text){
						},
						afterDeselect: function(value, text){
						},
						afterInit: function(container) {
							var group = $('<div class="btn-group"></div>');
							var buttonSelectAll = $('<button class="btn btn-mini btn-primary">Select all</button>');
							var buttonDeselectAll = $('<button class="btn btn-mini btn-primary">Deselect all</button>');
							group.append(buttonSelectAll);
							group.append(buttonDeselectAll);
							container.after(group);
							buttonSelectAll.bind('click', function() {
								container.prev().multiSelect('select_all');
								return false;
							});
							buttonDeselectAll.bind('click', function() {
								container.prev().multiSelect('deselect_all');
								return false;
							});
						}
					});
				}
			})
		}
	}


	$(document).bind('changed', function() {
		setupMultiselects();

		// Uniform
		$("input:checkbox, input:radio").not('input.ibtn').not('.initialized').addClass('initialized').uniform();

		// Tagsinput
		$(".tags").not('.initialized').addClass('initialized').tagsInput({'width':'100%',
			'height':'auto',
			'onAddTag': function(text){
			},
			'onRemoveTag': function(text){
			}});
	});

    
    // Breadcrumb
    if($(".breadCrumb").length > 0) $(".breadCrumb").jBreadCrumb({easing:'swing'});
    
    // Validation
	$(document).bind('changed', function() {
		var forms = $(".validate");
		if(forms.length > 0)
			forms.not('.validationInitialized').addClass('validationInitialized').validationEngine('attach',{promptPosition : "topLeft"});

		// Datepicker

		if($(".datepicker").length > 0){

			$( ".datepicker" ).not('.dateInitialized').addClass('dateInitialized').datepicker({dateFormat: _config.dateFormat,
				gotoCurrent: true,
				changeMonth: true,
				changeYear: true,
				onSelect: function(date){
				}});
		}

		if($(".birthdatepicker").length > 0){

			$( ".birthdatepicker" ).not('.birthdateInitialized').addClass('birthdateInitialized').datepicker({
				dateFormat: _config.formDateFormat,
				gotoCurrent: true,
				changeMonth: true,
				changeYear: true,
				yearRange: '-100:+0',
				onSelect: function(date){
				}});
		}

		// Datetimepicker

		if($(".datetimepicker").length > 0){

			$( ".datetimepicker").not('.datetimeInitialized').addClass('datetimeInitialized').datetimepicker({dateFormat: _config.formDateFormat, timeFormat: _config.formTimeFormat,
				gotoCurrent: true,
				changeMonth: true,
				changeYear: true,
				onSelect: function(date){
				}});
		}

		// accordion
		if($(".accordion").length > 0) {
			$(".accordion").not('.accordionInitialized').addClass('accordionInitialized').each(function(index, el) {
				var inPos = $(el).index('.in');
				$(el).accordion({
					heightStyle: "content",
					collapsible: true,
					active: inPos
				});
			})
		}
		// eof accordion

		// tabs
		if($(".tabs").length > 0) $(".tabs").not('.initialized').addClass('initialized').tabs();
		// eof tabs

		// sortable
		if($(".sortable").length > 0){
			$(".sortable").not('.sortableInitialized').addClass('sortableInitialized').sortable();
//			$("#sort_1").disableSelection();
		}
		// eof sortable

		// selectable
		if($(".selectable").length > 0){
			$(".selectable").not('.selectableInitialized').addClass('selectableInitialized').selectable();
		}
		//eof selectable
	});

    // spinner
        $( "#spinner" ).spinner();
        $( "#spinner1" ).spinner({culture: "en-US", min: 5, max: 1000, step: 10, start: 10, numberFormat: "C"});
    // eof spinner
    
    // sliders
        $("#slider_1").slider({
            value: 60,
            orientation: "horizontal",
            range: "min",
            animate: true,
            slide: function( event, ui ) {
                $( "#slider_1_amount" ).html( "$" + ui.value );
            },
            stop: function( event, ui ) {
                notify('Slider','#slider_1: '+ui.value);
            }
        });
        
        $("#slider_2").slider({
            values: [ 17, 67 ],
            orientation: "horizontal",
            range: true,
            animate: true,
            slide: function( event, ui ) {
                $( "#slider_2_amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            },
            stop: function( event, ui ) {
                notify('Slider','#slider_2: '+ui.values[0]+' - '+ui.values[ 1 ]);
            }            
        });    
            
        $("#slider_3").slider({
            orientation: "vertical",
            range: "min",
            min: 0,
            max: 100,
            value: 10,            
            stop: function( event, ui ) {
                notify('Slider','#slider_3: '+ui.value);
            }            
        }); 

        $("#slider_4").slider({
            orientation: "vertical",
            range: true,
            values: [ 17, 67 ],
            stop: function( event, ui ) {
                notify('Slider','#slider_4: '+ui.values[0]+' - '+ui.values[1]);
            }
        }); 

        $("#slider_5").slider({
            orientation: "vertical",            
            range: "max",
            min: 1,
            max: 10,
            value: 2,
            stop: function( event, ui ) {
                notify('Slider','#slider_5: '+ui.value);
            }            
        });     
    // eof sliders
    
    // popovers
    
    $("#popover_top").popover({placement: 'top', title: 'Popover title', content: 'Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit.'});
    $("#popover_right").popover({placement: 'right', title: 'Popover title', content: 'Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit.'});
    $("#popover_bottom").popover({placement: 'bottom', title: 'Popover title', content: 'Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit.'});
    $("#popover_left").popover({placement: 'left', title: 'Popover title', content: 'Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit.'});
    
    // eof popovers

	// bootstrap dialogs
	$(document).bind('changed', function() {
		// Not using "modal" to avoid issue with bootstrap.js where href tried to be translated.
		$('[data-toggle="dialog"]').not('.initialized').addClass('initialized').click(function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			var style = '';
			var classes_r = $(this).attr('class');
			if (classes_r != null) {
				var classes = classes_r.split(' ');
				for (var i = 0; i < classes.length; i++) {
					var matches = /^mWidth\_(.+)/.exec(classes[i]);
					if (matches != null) {
						width = parseInt(matches[1].replace('mWidth_', ''));
						style = 'width: '+width+'px; margin-left: -'+(width/2)+'px;';

					}
				}
			}
			if (url.indexOf('#') == 0) {
				_openedModal = $(url).modal();
			} else {
				showLoading();
				$.get(url, function(data) {
					hideLoading();

					_openedModal = $('<div class="modal hide fade" style="'+style+'">' + data + '</div>').modal();
					_openedModal.on('hidden', function(){
						$(this).data('modal', null);
						$(this).remove();
					});
					_openedModal.on('shown', function(){
						$(document).trigger('changed');
					});
				}).success(function() { $('input:text:visible:first').focus(); });
			}
		});
	})
	// eof bootstrap dialogs

    // dataTable
	$(document).bind('changed', function() {
		if($(".aTable").length > 0) {
			$(".aTable").not('.initialized').each(function(index, argTable) {
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
          "bAutoWidth": true,
          "bLengthChange": true,
          "iDisplayLength": 10,
          "aLengthMenu": [10,25,50,100],
          "sPaginationType": "full_numbers",
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
        table.fnSort(sorting);
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
//	        $(".aTable").dataTable({bSort: true,
//		        "sPaginationType": "full_numbers",
//		        "bProcessing": true,
//		        "sAjaxSource": _config.basePath+'campaigns/source'});

    // eif dataTable
    
    // media         
    if($("#video").length > 0){        
        var video = new MediaElementPlayer('#video',{
            success: function(media, node, player){                   
                var events = ['loadstart', 'play','pause', 'ended'];
                
                for (var i=0, il=events.length; i<il; i++) {
                    media.addEventListener(events[i], function(e) {
                            notify('Video','#video: '+ e.type);
                    });                    
                }      
                
            }
        });                        
        
        $("#videoPlay").click(function(){            
            video.play();
        });
        $("#videoPause").click(function(){            
            video.pause();
        });
    }
    if($('audio').length > 0 || $('video').length > 0) $('audio,video').mediaelementplayer();
    // eof media
    
    //wysiwyg editor
    if($("#wysiwyg").length > 0){
        wEditor = $("#wysiwyg").cleditor({width:"100%", height:"300px"});
    }          
    if($("#mail_wysiwyg").length > 0)
        m_editor = $("#mail_wysiwyg").cleditor({width:"100%", height:"100%",controls:"bold italic underline strikethrough | font size style | color highlight removeformat | bullets numbering | outdent alignleft center alignright justify"})[0].focus();    
    
    // eof wysiwyg editor
    
    //syntax highlight
    if($("pre[class^=brush]").length > 0){
        SyntaxHighlighter.defaults['toolbar'] = false;
        SyntaxHighlighter.all();   
    }
    //eof syntax highlight
    
    // easy pie chart
    if($(".epc-green").length > 0)
        $('.epc .epc-green').easyPieChart({animate: 100,barColor: '#468847',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square'});
    if($(".epc-orange").length > 0)
        $('.epc .epc-orange').easyPieChart({animate: 100, barColor: '#F89406',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square'});
    if($(".epc-red").length > 0)
        $('.epc .epc-red').easyPieChart({animate: 100,barColor: '#B94A48',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square'});    
    if($(".epcm-green").length > 0)
        $('.epc .epcm-green').easyPieChart({animate: 100,barColor: '#468847',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square',size: 90});
    if($(".epcm-orange").length > 0)
        $('.epc .epcm-orange').easyPieChart({animate: 100, barColor: '#F89406',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square',size: 90});
    if($(".epcm-red").length > 0)
        $('.epc .epcm-red').easyPieChart({animate: 100,barColor: '#B94A48',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square',size: 90});        
    
    // eof easy pie chart

    
    // sparklines 

        $(".mChartBar").sparkline('html',{ enableTagOptions: true, disableHiddenCheck: true});
        
    // eof sparklines
    
    // slidernav
    if($(".slidernav").length > 0)
        $(".slidernav").sliderNav();
    
    // eof slidernav
    
    // isotope gallery
    if($('#isotope').length > 0)
        $('#isotope').isotope({    
            itemSelector : '.item',
            layoutMode : 'fitRows'
        });
    
    
    $("#removeFilter").click(function(){
        $('#isotope').isotope({ filter: '' });
    });    
    $("#filterByCity").click(function(){
        $('#isotope').isotope({ filter: '.city' });
    });
    $("#filterByNature").click(function(){
        $('#isotope').isotope({ filter: '.nature' });
    });
    $("#filterByCats").click(function(){
        $('#isotope').isotope({ filter: '.cat' });
    });    
    // eof isotope gallery
    

    
    //ibuttons
	$(document).bind('changed', function() {
		if($('.ibtn').length > 0)
			$('.ibtn').not('.initialized').addClass('initialized').iButton();
	});
    // eof ibuttons

   // new selector case insensivity        
        $.expr[':'].containsi = function(a, i, m) {
            return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };        
   //
//	$(document).trigger('changed');
});

$(window).load(function(){
    
    // Gallery Grid    
    if($(".gGallery").length>0){        
      
      $('.gGallery li').wookmark({autoResize: true,        
                                  offset: 5,
                                  container: $('.gGallery'),
                                  itemWidth: 110});
    }    
    
    // custom scrollbar        
    if($(".scroll").length > 0)
        $(".scroll").mCustomScrollbar();
    // eof custom scrollbar    
    
});

$('.wrapper').resize(function(){

    if($("#wysiwyg").length > 0) editor.refresh();
    if($("#mail_wysiwyg").length > 0) m_editor.refresh();
    
});

function notify(title, text){
    
    $.pnotify({
        title: title,
        text: text,
        addclass: 'custom',
        hide: true,
        opacity: .8,
        nonblock: true,
        nonblock_opacity: .5
    });            
}


