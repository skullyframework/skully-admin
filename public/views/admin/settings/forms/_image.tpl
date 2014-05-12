</form>
<div class="largerText">Image</div>
<div class="allImages">
	<form class="uploadImageForm" style="margin-right: 10px; float:left; position:relative;" method="POST" enctype="multipart/form-data" action="{url path="admin/settings/upload"}">
		<input type="hidden" name="field" value="value" />
	{* Id needed for uploads *}
		<input type="hidden" name="id" value="{if !empty($setting.id)}{$setting.id}{/if}" />
		<input type="hidden" name="imageUrl" value="{$setting.value}" />
    <input type="hidden" name="name" value="{$setting.name}" />

		<div class="fileupload fileupload-new" data-provides="fileupload">
			<div class="fileupload-preview thumbnail" style="width: {$clientConfig[$setting.name|cat:"ImageThumbW"]}px; height: {$clientConfig[$setting.name|cat:"ImageThumbH"]}px;">
			{if !empty($setting.value)}
				<img src="{$baseUrl}{$setting.value}"/>
				{else}
				<div class="emptyInfo">Image<br />{$clientConfig[$setting.name|cat:"ImageW"]} x {$clientConfig[$setting.name|cat:"ImageH"]}</div>
			{/if}

			</div>
			<div>
								<span class="btn btn-file btn-primary">
									<span class="fileupload-new">Upload</span>
									<span class="fileupload-exists">Change</span>
									<input type="file" name="image"/>
								</span>
			{*<a href="#" class="btn fileupload-exists fileupload-remove" data-dismiss="fileupload">Remove</a>*}
				<span class="btn btn-primary fileupload-upload" style="display: none;">Upload</span>
			</div>
		</div>
	{if !empty($setting.value)}
		<a class="btnRemove" href="javascript:;" style="position:absolute; top:-5px; float:left; right: 0px;"><i class="icon-remove"></i></a>
	{/if}
	</form>
</div>

<script>
	//UPLOAD
	$('.allImages').not('.imageInitialized').addClass('imageInitialized').each(function(index, el) {
		var row = $(el);

		$(el).on('change', '.fileupload [type="file"]', function(e) {
			$(this).closest('.fileupload').find('.fileupload-upload').click();
		});
		var _currentForm = null;
		var _uploadQueue = []; // Queue of upload intervals

		$(el).on('click', '.fileupload-upload', function(e) {
			var me = this;
			var form = $(me).closest('form');
			var width = form.outerWidth();
			var height = form.outerHeight();
			var progress = $('<div class="inlineLoadingFrame" style="width: '+width+'px; height: 100%;">' +
					'<div style="width: '+width+'px;margin: auto;margin-top: '+(height/2 + 20)+'px;">'+
					'<div class="uploadingText">Uploading...</div>'+
					'<div class="progress progress-striped">'+
					'<div class="bar tip" style="width: 0%;" title=""></div>'+
					'</div>'+
					'</div>'+
					'</div>');
			progress.appendTo(form);
			$('#submitForm').attr('disabled', 'disabled');
//			form.css('position', 'relative');

		{*if (!$.browser.msie) { *}
			// Checking every second if the last file has successfully uploaded, then upload.
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
							success: function(jsonData){
								var data = JSON.parse(jsonData);
//									$('[name="campaign['+data.field+'Temp]"]').val(data.fileUrl);
								if (data.error) {
									alert(data.error);
								}
								if (data.message) {
									displayMessage(data.message);
								}

								if (data.length > 0 && data[0].fileUrl) {
									// add index later.
									_currentForm.append('<a class="btnRemove" href="javascript:;" style="position:absolute; top:-5px; float:left; right: 0px;"><i class="icon-remove"></i></a>');

									var img = _currentForm.find('.thumbnail img');
									if (img.length == 0) {
										_currentForm.find('.thumbnail').empty();
										img = $('<img />').appendTo(_currentForm.find('.thumbnail'));
									}
									img.attr('src', data[0].fileUrl);
									_currentForm.find('[name="imageUrl"]').val(data[0].fileUrl.replace(_config.baseUrl, ''));
									_currentForm.find('.fileupload').removeClass('fileupload-new');
									_currentForm.find('.fileupload').addClass('fileupload-exists');
								}
								_currentForm.find('.inlineLoadingFrame').remove();
								$('#submitForm').removeAttr('disabled');
								_currentForm.find('.fileupload-upload').css('display', 'none');
								_currentForm = null;
								clearInterval(_uploadQueue[0]);
								_uploadQueue.splice(0,1);


								$(el).find("form.uploadImageForm input[name=id], form.uploadThumbnailForm input[name=id]").val(data[0].instance);
								$('input[name="article[id]"]').val(data[0].instance);
							}
						});
					}
				}
			}, 1000);
		{*}*}
		{*else {*}
		{*var uploader=window.open('{url path="admin/campaigns/upload"}', '_blank','width=200,height=30,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=100,top=100');*}
		{*// show a frame and upload there*}
		{*}*}
			e.stopPropagation();
			e.preventDefault();
		});

		$(el).on("click", ".btnRemove", function(){
			var parent = $(this).parent();
			var data = parent.serialize();

			$.ajax({
				url : '{url path="admin/settings/destroyImage"}',
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(res){
					if(res.success == 1){
						var thumbnail = parent.find('.thumbnail').empty();
						$('<div class="emptyInfo">Image<br />width x height</div>').appendTo(thumbnail).css('line-height', '20px');
					}
					else{
						displayMessage(res.message);
					}
				},
				error: function(){
					displayMessage("There's an error occurred while deleting image.");
				}
			});
		});
	});
</script>

<form class="validate" method="POST" action="{url path="admin/settings/update"}">
