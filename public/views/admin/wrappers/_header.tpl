<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description" />
<meta content="" name="author" />

<link rel="icon" type="image/ico" href="{public_url path="favicon.ico"}"/>

<script style="text/javascsript">
	var _config = {$clientConfig|@json_encode};
  {if !empty($numDisplayedRows)}
  	var _numDisplayedRows = {$numDisplayedRows};
  {/if}
</script>

<!-- BEGIN Vendor CSS-->
<link href="{theme_url path="resources/plugins/pace/pace-theme-flash.css"}" rel="stylesheet" type="text/css" />
<link href="{theme_url path="resources/plugins/boostrapv3/css/bootstrap.min.css"}" rel="stylesheet" type="text/css" />
<link href="{theme_url path="resources/plugins/font-awesome/css/font-awesome.css"}" rel="stylesheet" type="text/css" />
<link href="{theme_url path="resources/plugins/jquery-scrollbar/jquery.scrollbar.css"}" rel="stylesheet" type="text/css" media="screen" />
<link href="{theme_url path="resources/plugins/bootstrap-select2/select2.css"}" rel="stylesheet" type="text/css" media="screen" />
<link href="{theme_url path="resources/plugins/switchery/css/switchery.min.css"}" rel="stylesheet" type="text/css" media="screen" />
<link href="{theme_url path="resources/plugins/validationEngine/validationEngine.jquery.min.css"}" rel="stylesheet" type="text/css" media="screen" />
<link href="{theme_url path="resources/plugins/colorpicker/jquery.colorpicker.min.css"}" rel="stylesheet" type="text/css" media="screen" />
<link href="{theme_url path="resources/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css"}" rel="stylesheet" type="text/css" />
<link href="{theme_url path="resources/plugins/bootstrap-tag/bootstrap-tagsinput.css"}" rel="stylesheet" type="text/css" />
<link href="{theme_url path="resources/plugins/dropzone/css/dropzone.css"}" rel="stylesheet" type="text/css" />
<link href="{theme_url path="resources/plugins/bootstrap-datepicker/css/datepicker3.css"}" rel="stylesheet" type="text/css" media="screen">
<link href="{theme_url path="resources/plugins/summernote/css/summernote.css"}" rel="stylesheet" type="text/css" media="screen">
<link href="{theme_url path="resources/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"}" rel="stylesheet" type="text/css" media="screen">
<link href="{theme_url path="resources/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css"}" rel="stylesheet" type="text/css" media="screen">
<link href="{theme_url path="resources/plugins/jquery-datatable/media/css/jquery.dataTables.min.css"}" rel="stylesheet" type="text/css" media="screen">
<link href="{theme_url path="resources/plugins/dropzone/css/dropzone.css"}" rel="stylesheet" type="text/css" media="screen">
<!-- BEGIN Pages CSS-->
<link href="{theme_url path="resources/css/admin/pages-icons.css"}" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="{theme_url path="resources/css/admin/pages.css"}" rel="stylesheet" type="text/css" />
<link class="main-stylesheet" href="{theme_url path="resources/css/admin/stylesheet.css"}" rel="stylesheet" type="text/css" />
<!--[if lte IE 9]>
<link href="{theme_url path="resources/css/admin/ie9.css"}" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript">
    window.onload = function()
    {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{theme_url path="resources/css/admin/windows.chrome.fix.css"}" />'
    }
</script>