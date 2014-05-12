<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<!--[if gt IE 8]>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<![endif]-->

<link href="{theme_url path="resources/css/admin/stylesheets.css"}" rel="stylesheet" type="text/css" />
{*<!--[if lt IE 10]>*}
{*<!--*}{*&lt;!&ndash;<link href="{$themeUrl}resources/css/admin/ie.css" rel="stylesheet" type="text/css" />&ndash;&gt;*}{*-->*}
{*<![endif]-->*}
<link rel="icon" type="image/ico" href="{public_url path="adminFavicon.ico"}"/>

<script style="text/javascsript">
	var _config = {$clientConfig|@json_encode};
  {if !empty($numDisplayedRows)}
  	var _numDisplayedRows = {$numDisplayedRows};
  {/if}
</script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/jquery/jquery-2.1.0.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/jquery/jquery-migrate-1.1.1.min.js"}"></script>

{*<script type='text/javascript' src="{theme_url path="resources/js/plugins/birthdaypicker/bday-picker.min.js"}"></script>*}

<script type='text/javascript' src="{theme_url path="resources/js/plugins/jquery/globalize.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/other/excanvas.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/other/jquery.mousewheel.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/bootstrap/bootstrap.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/bootbox/bootbox.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/cookies/jquery.cookies.2.2.0.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/fancybox/jquery.fancybox.pack.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/jflot/jquery.flot.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/jflot/jquery.flot.stack.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/jflot/jquery.flot.pie.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/jflot/jquery.flot.resize.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/epiechart/jquery.easy-pie-chart.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/knob/jquery.knob.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/sparklines/jquery.sparkline.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/pnotify/jquery.pnotify.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/fullcalendar/fullcalendar.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/datatables/jquery.dataTables.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/datatables/dataTables.reloadAjax.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/datatables/dataTables.dateSorting.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/wookmark/jquery.wookmark.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/jbreadcrumb/jquery.jBreadCrumb.1.1.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/uniform/jquery.uniform.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/select/select2.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/tagsinput/jquery.tagsinput.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/multiselect/jquery.multi-select.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/validationEngine/languages/jquery.validationEngine-en.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/validationEngine/jquery.validationEngine.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/stepywizard/jquery.stepy.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/animatedprogressbar/animated_progressbar.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/hoverintent/jquery.hoverIntent.minified.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/media/mediaelement-and-player.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/cleditor/jquery.cleditor.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/shbrush/XRegExp.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/shbrush/shCore.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/shbrush/shBrushXml.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/shbrush/shBrushJScript.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/shbrush/shBrushCss.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/filetree/jqueryFileTree.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/slidernav/slidernav-min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/isotope/jquery.isotope.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/jnotes/jquery-notes_1.0.8_min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/jcrop/jquery.Jcrop.min.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/ibutton/jquery.ibutton.min.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/timepicker/jquery.timepicker.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/ckeditor/ckeditor.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/bootstrap/bootstrap-fileupload.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/ckeditor/ckeditor.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/admin/plugins.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/admin/charts.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/admin/actions.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/admin/md5_crypt.js"}"></script>

<script type='text/javascript' src="{theme_url path="resources/js/plugins/colorpicker/jquery.colorpicker.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/colorpicker/swatches/jquery.ui.colorpicker-pantone.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/colorpicker/parts/jquery.ui.colorpicker-rgbslider.js"}"></script>
<script type='text/javascript' src="{theme_url path="resources/js/plugins/colorpicker/parts/jquery.ui.colorpicker-memory.js"}"></script>