{nocache}
    {foreach from=$_imageSettings item=_imageSetting key=_imageSettingName}
        {if $_imageSetting._config.multiple}
            {if $_imageSetting.types}
                <script id="template-{$_imageSettingName}" type="html/template">
    {include file="admin/widgets/imageUploader/multiple/_manyTypes.tpl" _imageSettingName=$_imageSettingName _imageSetting=$_imageSetting}
                    </script>
            {else}
                <script id="template-{$_imageSettingName}" type="html/template">
    {include file="admin/widgets/imageUploader/multiple/_oneType.tpl" _imageSettingName=$_imageSettingName _imageSetting=$_imageSetting}
                    </script>
            {/if}
            <script id="template-{$_imageSettingName}-new" type="html/template">
    {include file="admin/widgets/imageUploader/multiple/_new.tpl" _imageSettingName=$_imageSettingName _imageSetting=$_imageSetting}
                </script>
        {/if}
    {/foreach}
    <script type="text/javascript">
    $('.add_image').click(function(e) {
        if (!$(this).attr('disabled')) {
            var $new = $($('#template-'+$(this).data('setting_name')+'-new').html());
            $new.insertAfter($('.image_row-'+$(this).data('setting_name')+' .image_row-title'));
            if ($(this).hasClass('many')) {
                $new.css('display', 'none').slideDown();
                {if $isSettingModel}
                $('#newRow-'+$(this).data('setting_name')).data('setting_id', $(this).data('setting_id'));
                {/if}
                $(this).attr('disabled', 'disabled');
            }
            else {
                $new.css('display', 'none');
                {if $isSettingModel}
                $('#newRow-'+$(this).data('setting_name')).data('setting_id', $(this).data('setting_id'));
                {/if}
                $(this).attr('disabled', 'disabled');
                uploadSeparately($(this).closest('.image_row-'+$(this).data('setting_name')).find('.uploadSeparately'));
            }
        }
        return false;
    });

    function uploadSeparately(el)
    {
        var settingName = $(el).closest('.row-form').attr('id').replace('newRow-', '');
        {if $isSettingModel}
        insertNewRow(settingName, $(el).closest('.row-form').data('setting_id'));
        {else}
        insertNewRow(settingName, {${$instanceName}.id});
        {/if}
        $(el).closest('.row-form').remove();
    }
    $(document).on('click', '.uploadSeparately', function(e) {
        uploadSeparately(this);
        return false;
    });

    $(document).on('click', '.btnMoveDown, .btnMoveUp', function(e) {
        move(this);
        return false
    });

    var _currentForm = null;
    var _uploadQueue = []; // Queue of upload intervals

    function replaceQueryParam(param, newval, search) {
        var regex = new RegExp("([?;&])" + param + "[^&;]*[;&]?")
        var query = search.replace(regex, "$1").replace(/&$/, '')
        return (query.length > 2 ? query + "&" : "?") + param + "=" + newval
    }

    function deleteClicked(formEl) {
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
                                var settingName = data.setting;
                                if(data.position){
                                    var position = parseInt(data.position, 10);
                                    var $rowForms = $('.image_row-'+settingName + ' .row-form:not(.image_row-title):not(#newRow-'+settingName+')');
                                    $rowForms.eq(position).slideUp('medium', function() {
                                        $(this).remove();
                                        for (var i=position+1;i<$rowForms.length;i++) {
                                            $rowForms.eq(i).find('.position').text(i-1);
                                            $rowForms.eq(i).find('[name=position]').each(function(id, el) {
                                                $(el).val(i-1);
                                            });
                                            $rowForms.eq(i).find('a.hasPosition').each(function(id,el) {
                                                $(el).attr('href', replaceQueryParam('position', i-1, $(el).attr('href')));
                                            })
                                        }
                                    });
                                }
                                else{
                                    var $rowForms = $('.image_row-'+settingName + ' .row-form:not(.image_row-title):not(#newRow-'+settingName+')');
                                    $rowForms.find(".fileupload .thumbnail").html('<div class="emptyInfo">{lang value="No Image"}</div>');
                                }
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

    function getUrlVars(url)
    {
        var vars = [], hash;
        var hashes = url.slice(url.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

    function changePositionsOf($el, pos) {
        $el.find('.position').text(pos);
        $el.find('[name=position]').each(function(id,el) {
            $(el).val(pos);
        });
        $el.find('a.hasPosition').each(function(id,el) {
            $(el).attr('href', replaceQueryParam('position', pos, $(el).attr('href')));
        });
    }
    function move(el) {
        url = $(el).attr('href');
        vars = getUrlVars(url);
        var pos = vars.position;
        var settingName = vars.field;
        var $rowForms = $(el).closest('.block-fluid').find('.row-form:not(.image_row-title):not(#newRow-'+settingName+')');
        if (url.indexOf('direction=up') !== -1 && url.indexOf('position=0') !== -1) {
            return false;
        }
        else if (url.indexOf('direction=down') !== -1 && url.indexOf('position='+($rowForms.length-1)) !== -1) {
            return false;
        }
        else {
            $.ajax({
                url: url,
                success: function(response) {
                    var data = JSON.parse(response);
                    var from = data.from;
                    var to = data.to;
                    var $rowForms = $('.image_row-'+data.settingName+' .row-form:not(.image_row-title):not(#newRow-'+data.settingName+')');
                    var $from = $rowForms.eq(from);
                    var $to = $rowForms.eq(to);
                    if (from > to) {
                        $from.slideUp('medium', function() { $(this).insertBefore($to).slideDown() });
                    }
                    else if (from < to) {
                        $from.slideUp('medium', function() { $(this).insertAfter($to).slideDown() });
                    }
                    changePositionsOf($from, to);
                    changePositionsOf($to,from);
                }
            });
        }
    }

    // Insert new row to multiple rows.
    function insertNewRow(settingName, instanceId, existingRow, position) {
        var $rowForms = $('.image_row-'+settingName+' .row-form:not(.image_row-title):not(#newRow-'+settingName+')');
        if (typeof(position) == 'undefined') {
            if (existingRow == true) {
                position = $rowForms.length;
            }
            else {
                position = 0;
            }
        }

        {if $isSettingModel}
        var fieldName = 'value';
        {else}
        var fieldName = settingName;
        {/if}

        if (typeof(existingRow) == 'undefined' || existingRow == false) {
            url = '{url path={$imageNewRowPath}}?id='+instanceId+'&setting='+settingName+'&field='+fieldName+'&pos='+position+'&new=1';
        }
        else {
            url = '{url path={$imageNewRowPath}}?id='+instanceId+'&setting='+settingName+'&field='+fieldName+'&pos='+position;
        }

        if (position >= $rowForms.length) {
            $.ajax({
                url: url,
                success: function(response) {
                    $('.image_row-'+settingName+' .add_image').removeAttr('disabled');
                    var $response = $(response);
                    $response.css('display', 'none');
                    if ($rowForms.length) {
                        $rowForms.eq($rowForms.length-1).after($response);
                    }
                    else {
                        $('.image_row-'+settingName).append($response);
                    }
                    $response.slideDown();
                    $(document).trigger('changed');
                }
            });
        }
        else {
            $.ajax({
                url: url,
                success: function(response) {
                    $('.image_row-'+settingName+' .add_image').removeAttr('disabled');
                    for (var i=position; i < $rowForms.length; i++) {
                        $rowForms.eq(i).find('.position').text(i+1);
                        $rowForms.eq(i).find('[name=position]').each(function(id,el) {
                            $(el).val(i+1)
                        });
                        $rowForms.eq(i).find('a.hasPosition').each(function(id,el) {
                            $(el).attr('href', replaceQueryParam('position', i+1, $(el).attr('href')));
                        });
                    }
                    var $response = $(response);
                    $response.css('display', 'none');
                    if ($rowForms.length) {
                        $rowForms.eq(position).before($response);
                    }
                    else {
                        $('.image_row-'+settingName).append($response);
                    }
                    $response.slideDown();
                    $(document).trigger('changed');
                }
            });
        }
    }

    function doUpload(me)
    {
        /** This part of code shows progress bar to form. **/
        var form = $(me).closest('form');
        var width = form.outerWidth();
        var height = form.outerHeight();
        var progress = $('<div class="inlineLoadingFrame" style="width: '+width+'px; height: '+height+'px;">' +
                '<div style="width: '+width+'px;margin: auto;margin-top: '+(height/2 + 20)+'px;">'+
                '<div class="uploadingText">Uploading...</div>'+
                '<div class="progress progress-striped">'+
                '<div class="bar tip" style="width: 0%;" title=""></div>'+
                '</div>'+
                '</div>'+
                '</div>');
        progress.appendTo(form);

        /** Checking every second if the last file has successfully uploaded, then upload. **/
        _uploadQueue[_uploadQueue.length] = setInterval(function() {
            if (_currentForm == null) {
                _currentForm = $(me).closest('form');
                var data = new FormData();
                var files = _currentForm.find('[name=image]')[0].files;
                if (files.length == 0) {
                    clearInterval(_uploadQueue[0]);
                    _uploadQueue.splice(0,1);
                }
                else {
                    $.each(files, function(i, file) {
                        data.append('file-'+i, file);
                    });
                    var formValues = _currentForm.serializeArray();
                    for (var i=0; i<formValues.length; i++) {
                        data.append(formValues[i]['name'],formValues[i]['value']);
                    }

                    $.ajax({
                        url: _currentForm.attr('action'),
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        xhr: function()
                        {
                            var xhr = new window.XMLHttpRequest();
                            //Upload progress
                            xhr.upload.addEventListener("progress", function(evt){
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total * 100;
                                    //Do something with upload progress
                                    _currentForm.find('.bar').css('width', percentComplete+'%').attr('title', percentComplete+'%');
                                }
                            }, false);
                            //Download progress
                            xhr.addEventListener("progress", function(evt){
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    //Do something with download progress
                                }
                            }, false);
                            return xhr;
                        },
                        success: function(responseJson){
                            clearInterval(_uploadQueue[0]);
                            _uploadQueue.splice(0,1);

                            /** each upload form may have different implementation here **/
                            var responses = JSON.parse(responseJson);
                            if (responses.error !=null && responses.error != '') {
                                bootbox.alert(responses.error);
                            }
                            else {
                                var uploadedLi = "";
                                var errorLi = "";
                                for (var i = 0; i < responses.length; i++) {
                                    /** This code finds the actual file input and run upload "click" after file changed. **/
                                    var fileInput = $(this).find('.fileupload [type="file"]');
                                    fileInput.unbind('change');
                                    fileInput.change(function(e) {
                                        $(this).closest('.fileupload').find('.fileupload-upload').click();
                                    });
                                    if (responses[i].error) {
                                        errorLi += "<li>"+responses[i].path+" - " + responses[i].message + "</li>\n";
                                    }
                                    else {
                                        uploadedLi += "<li>"+responses[i].path+"</li>\n";
                                    }
                                }

                                // Displaying the alert box
                                var uploaded = '';
                                var error = '';
                                if (errorLi != '') {
                                    error = "<h5>Failed:</h5>\n<ul>"+
                                            errorLi+"</ul>";
                                }
                                if (uploadedLi != '') {
                                    uploaded = "<h5>Server has created following images:</h5>\n<ul>"+
                                            uploadedLi+"</ul>";
                                }
                                bootbox.alert(uploaded+error);

                                if (responses.length && responses[0].data) {
                                    var data = JSON.parse(responses[0].data);
                                    if (data.type  == 'uploadOnce') {
                                        $('#newRow-'+data.settingName).slideUp();
                                        $('.add_image[data-setting_name="'+data.settingName+'"]').removeAttr('disabled');
                                        insertNewRow(data.settingName, data.id, true);
                                    }
                                }
                            }
                            _currentForm.find('.inlineLoadingFrame').remove();
                            _currentForm.find('.fileupload-upload').css('display', 'none');
                            _currentForm = null;
                            $(document).trigger('changed');
                        }
                    });
                }
            }
        }, 1000);
    }

    $(document).on('click', '.fileupload-upload', function(e) {
        doUpload(this);
    });

    /** This code finds the actual file input and run upload "click" after file changed. **/
    //        var fileInput = $('.fileupload [type="file"]');
    //        fileInput.unbind('change');
    //        fileInput.change(function(e) {
    //            $(this).closest('.fileupload').find('.fileupload-upload').click();
    //        });
    $(document).on('change', '.fileupload [type="file"]', function(e) {
        $(this).closest('.fileupload').find('.fileupload-upload').click();
    });
    </script>
{/nocache}