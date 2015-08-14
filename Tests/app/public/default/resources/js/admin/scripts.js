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
//                        notify(data.message);
                        _openedModal.modal('hide');
                        $(".table.table-hover").DataTable().draw();
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

function notify(message, type){
    if(!type) type = "info";
    $('body').pgNotification({
        style: 'flip',
        message: message,
        position: "top-right",
        timeout: 5000,
        type: type
    }).show();
}

//return string of formatted number
Number.prototype.numberFormat = function(dec, decimalSeparator, thousandSeparator ) {
    var number = this;
    if(!dec) dec = 0;
    if(!decimalSeparator) decimalSeparator = ".";
    if(!thousandSeparator) thousandSeparator = ",";
    if(typeof(number) == "string") number = parseFloat(number);
    var front = Math.floor(number);
    var back = number - front;
    //to avoid javascript miss calculation, round the back
    var pow = Math.pow(10,2);
    back = Math.round(back * pow) / pow;

    //change front and back into string
    front += "";
    back += "";

    var temp = "",
        tempBack = "",
        counter = 0;

    //iterate front segment, and add
    for(var i = front.length-1; i>=0; i--) {
        temp = front.charAt(i) + temp;
        counter++;
        if(counter == 3){
            counter = 0;
            if(i > 0) temp = thousandSeparator + temp;
        }
    }

    if(dec > 0){
        //back segment, start from position 2 because back segment looks like 0.123
        tempBack = decimalSeparator + back.substr(2, dec);
        if(tempBack.length < dec+1) {
            for(var i=tempBack.length; i<dec+1; i++) tempBack += "0";
        }
    }
    return temp + tempBack;
}
String.prototype.numberFormat = Number.prototype.numberFormat; //enable number format for string number;

(function($) {

    'use strict';

    $(document).ready(function() {
        // Initializes search overlay plugin.
        // Replace onSearchSubmit() and onKeyEnter() with 
        // your logic to perform a search and display results
        $(".list-view-wrapper").scrollbar();

//        $('[data-pages="search"]').search({
//            searchField: '#overlay-search',
//            closeButton: '.overlay-close',
//            suggestions: '#overlay-suggestions',
//            brand: '.brand',
//            onSearchSubmit: function(searchString) {
//                console.log("Search for: " + searchString);
//            },
//            onKeyEnter: function(searchString) {
//                console.log("Live search for: " + searchString);
//                var searchField = $('#overlay-search');
//                var searchResults = $('.search-results');
//
//                clearTimeout($.data(this, 'timer'));
//                searchResults.fadeOut("fast");
//                var wait = setTimeout(function() {
//
//                    searchResults.find('.result-name').each(function() {
//                        if (searchField.val().length != 0) {
//                            $(this).html(searchField.val());
//                            searchResults.fadeIn("fast");
//                        }
//                    });
//                }, 500);
//                $(this).data('timer', wait);
//
//            }
//        })

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

                        _openedModal = $('<div class="modal fade slide-up" style="'+style+'">' + data + '</div>')
                        .on('hidden.bs.modal', function(){
                            $(this).data('modal', null);
                            $(this).remove();
                        })
                        .on('shown.bs.modal', function(){
                            $(document).trigger('changed');
                        })
                        .modal('show');
                    }).success(function() { $('input:text:visible:first').focus(); });
                }
            });
        })
        // eof bootstrap dialogs

        // Validation
        $(document).bind('changed', function() {
            var forms = $(".validate");
            if(forms.length > 0)
                forms.not('.validationInitialized').addClass('validationInitialized').validationEngine('attach',{promptPosition : "topLeft"});

            // Datepicker

            if($("input.datepicker").length > 0){

                $( "input.datepicker" ).not('.dateInitialized').addClass('dateInitialized').datepicker({
                    format: _config.formDateFormat,
                    todayBtn: "linked",
                    todayHighlight: true
                });
            }

            if($("input.birthdatepicker").length > 0){
                $( "input.birthdatepicker" ).not('.birthdateInitialized').addClass('birthdateInitialized').datepicker({
                    format: _config.formDateFormat,
                    startView: 2
                });
            }

//            // Datetimepicker
//
//            if($(".datetimepicker").length > 0){
//
//                $( ".datetimepicker").not('.datetimeInitialized').addClass('datetimeInitialized').datetimepicker({dateFormat: _config.formDateFormat, timeFormat: _config.formTimeFormat,
//                    gotoCurrent: true,
//                    changeMonth: true,
//                    changeYear: true,
//                    onSelect: function(date){
//                    }});
//            }

            if($(".timepicker").length > 0){
                $('.timepicker').not(".timepickerInitialized").addClass("timepickerInitialized").timepicker().on('show.timepicker', function(e) {
                    var widget = $('.bootstrap-timepicker-widget');
                    widget.find('.glyphicon-chevron-up').removeClass().addClass('pg-arrow_maximize');
                    widget.find('.glyphicon-chevron-down').removeClass().addClass('pg-arrow_minimize');
                });
            }


//            $('#daterangepicker').daterangepicker({
//                timePicker: false,
//                format: 'MM/DD/YYYY h:mm A'
//            }, function(start, end, label) {
//                console.log(start.toISOString(), end.toISOString(), label);
//            });

            //Input mask - Input helper
            $("[data-mask=date]").mask("99/99/9999");
            $("[data-mask=phone]").mask("(999) 999-9999");
            $("[data-mask=tin]").mask("99-9999999");
            $("[data-mask=ssn]").mask("999-99-9999");
            //Autonumeric plug-in - automatic addition of dollar signs,etc controlled by tag attributes
            $('.autonumeric').autoNumeric('init');

            //Single instance of tag inputs - can be initiated with simply using data-role="tagsinput" attribute in any input field
            $('.custom-tag-input').tagsinput({

            });

            var myCustomTemplates = {
                "font-styles": function(locale) {
                    return '<li class="dropdown">' + '<a data-toggle="dropdown" class="btn btn-default dropdown-toggle ">' + '<span class="editor-icon editor-icon-headline"></span>' + '<span class="current-font">Normal</span>' + '<b class="caret"></b>' + '</a>' + '<ul class="dropdown-menu">' + '<li><a tabindex="-1" data-wysihtml5-command-value="p" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Normal</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">1</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">2</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h3" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">3</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h4" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">4</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h5" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">5</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h6" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">6</a></li>' + '</ul>' + '</li>';
                },
                emphasis: function(locale) {
                    return '<li>' + '<div class="btn-group">' + '<a tabindex="-1" title="CTRL+B" data-wysihtml5-command="bold" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-bold"></i></a>' + '<a tabindex="-1" title="CTRL+I" data-wysihtml5-command="italic" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-italic"></i></a>' + '<a tabindex="-1" title="CTRL+U" data-wysihtml5-command="underline" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-underline"></i></a>' + '</div>' + '</li>';
                },
                blockquote: function(locale) {
                    return '<li>' + '<a tabindex="-1" data-wysihtml5-display-format-name="false" data-wysihtml5-command-value="blockquote" data-wysihtml5-command="formatBlock" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-quote"></i>' + '</a>' + '</li>'
                },
                lists: function(locale) {
                    return '<li>' + '<div class="btn-group">' + '<a tabindex="-1" title="Unordered list" data-wysihtml5-command="insertUnorderedList" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-ul"></i></a>' + '<a tabindex="-1" title="Ordered list" data-wysihtml5-command="insertOrderedList" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-ol"></i></a>' + '<a tabindex="-1" title="Outdent" data-wysihtml5-command="Outdent" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-outdent"></i></a>' + '<a tabindex="-1" title="Indent" data-wysihtml5-command="Indent" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-indent"></i></a>' + '</div>' + '</li>'
                },
                image: function(locale) {
                    return '<li>' + '<div class="bootstrap-wysihtml5-insert-image-modal modal fade">' + '<div class="modal-dialog ">' + '<div class="modal-content">' + '<div class="modal-header">' + '<a data-dismiss="modal" class="close">×</a>' + '<h3>Insert image</h3>' + '</div>' + '<div class="modal-body">' + '<input class="bootstrap-wysihtml5-insert-image-url form-control" value="http://">' + '</div>' + '<div class="modal-footer">' + '<a data-dismiss="modal" class="btn btn-default">Cancel</a>' + '<a data-dismiss="modal" class="btn btn-primary">Insert image</a>' + '</div>' + '</div>' + '</div>' + '</div>' + '<a tabindex="-1" title="Insert image" data-wysihtml5-command="insertImage" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-image"></i>' + '</a>' + '</li>'
                },
                link: function(locale) {
                    return '<li>' + '<div class="bootstrap-wysihtml5-insert-link-modal modal fade">' + '<div class="modal-dialog ">' + '<div class="modal-content">' + '<div class="modal-header">' + '<a data-dismiss="modal" class="close">×</a>' + '<h3>Insert link</h3>' + '</div>' + '<div class="modal-body">' + '<input class="bootstrap-wysihtml5-insert-link-url form-control" value="http://">' + '<label class="checkbox"> <input type="checkbox" checked="" class="bootstrap-wysihtml5-insert-link-target">Open link in new window</label>' + '</div>' + '<div class="modal-footer">' + '<a data-dismiss="modal" class="btn btn-default">Cancel</a>' + '<a data-dismiss="modal" class="btn btn-primary" href="#">Insert link</a>' + '</div>' + '</div>' + '</div>' + '</div>' + '<a tabindex="-1" title="Insert link" data-wysihtml5-command="createLink" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-link"></i>' + '</a>' + '</li>'
                },
                html: function(locale) {
                    return '<li>' + '<div class="btn-group">' + '<a tabindex="-1" title="Edit HTML" data-wysihtml5-action="change_view" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-html"></i>' + '</a>' + '</div>' + '</li>'
                }
            }
            //TODO: chrome doesn't apply the plugin on load
            setTimeout(function() {
                $('.wysihtml5').not('.wysihtml5Initialized').addClass("wysihtml5Initialized").wysihtml5({
                    html: true,
                    stylesheets: [_config.baseUrl + _config.publicDir + _config.theme + "/resources/css/admin/editor.css"],
                    customTemplates: myCustomTemplates
                });
            }, 500);

            $('.summernote').not(".summernoteInitialized").addClass("summernoteInitialized").summernote({
                height: 200,
                onfocus: function(e) {
                    $('body').addClass('overlay-disabled');
                },
                onblur: function(e) {
                    $('body').removeClass('overlay-disabled');
                }
            });

            //affix
            if($("form nav.affix-top").length > 0) {
                $("form nav.affix-top").each(function(){
                    if($(this).closest(".affix-wrapper").length > 0){
                        $(this).closest(".affix-wrapper").css("height", $(this).outerHeight());
                    }

                    $(this).affix({
                        offset: {
                            top: $(this).offset().top - 60
                        }
                    });
                });
            }

//            // accordion
//            if($(".accordion").length > 0) {
//                $(".accordion").not('.accordionInitialized').addClass('accordionInitialized').each(function(index, el) {
//                    var inPos = $(el).index('.in');
//                    $(el).accordion({
//                        heightStyle: "content",
//                        collapsible: true,
//                        active: inPos
//                    });
//                })
//            }
//            // eof accordion
//            // tabs
//            if($(".tabs").length > 0) $(".tabs").not('.initialized').addClass('initialized').tabs();
//            // eof tabs
//
//            // sortable
//            if($(".sortable").length > 0){
//                $(".sortable").not('.sortableInitialized').addClass('sortableInitialized').sortable();
////			$("#sort_1").disableSelection();
//            }
//            // eof sortable
//
//            // selectable
//            if($(".selectable").length > 0){
//                $(".selectable").not('.selectableInitialized').addClass('selectableInitialized').selectable();
//            }
//            //eof selectable
            $.Pages.init();
        });

        $("#notification-center").click(function(){
            //load notif
            if(!$(this).closest(".dropdown").hasClass("open")){
                $("#notificationList").load($(this).data("href"));
            }
        });

        $(document).trigger('changed');
    });

    
    $('.panel-collapse label').on('click', function(e){
        e.stopPropagation();
    })
    
})(window.jQuery);