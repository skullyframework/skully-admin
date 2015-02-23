<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:33:32
         compiled from "D:\apache\skully-admin\public\views\admin\wrappers\_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2096154eb808c71f583-65377249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '143ce65d8274d3b532b2a50107fa6dc28cb0a468' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\wrappers\\_header.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2096154eb808c71f583-65377249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'clientConfig' => 0,
    'numDisplayedRows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb808c9bac66_43415591',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb808c9bac66_43415591')) {function content_54eb808c9bac66_43415591($_smarty_tpl) {?><?php if (!is_callable('smarty_function_theme_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.theme_url.php';
if (!is_callable('smarty_function_public_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.public_url.php';
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<!--[if gt IE 8]>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<![endif]-->

<link href="<?php echo smarty_function_theme_url(array('path'=>"resources/css/admin/stylesheets.css"),$_smarty_tpl);?>
" rel="stylesheet" type="text/css" />



<link rel="icon" type="image/ico" href="<?php echo smarty_function_public_url(array('path'=>"adminFavicon.ico"),$_smarty_tpl);?>
"/>

<script style="text/javascsript">
	var _config = <?php echo json_encode($_smarty_tpl->tpl_vars['clientConfig']->value);?>
;
  <?php if (!empty($_smarty_tpl->tpl_vars['numDisplayedRows']->value)) {?>
  	var _numDisplayedRows = <?php echo $_smarty_tpl->tpl_vars['numDisplayedRows']->value;?>
;
  <?php }?>
</script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jquery/jquery-2.1.0.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jquery/jquery-migrate-1.1.1.min.js"),$_smarty_tpl);?>
"></script>



<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jquery/globalize.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/other/excanvas.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/other/jquery.mousewheel.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/bootstrap/bootstrap.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/bootbox/bootbox.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/cookies/jquery.cookies.2.2.0.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/fancybox/jquery.fancybox.pack.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jflot/jquery.flot.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jflot/jquery.flot.stack.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jflot/jquery.flot.pie.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jflot/jquery.flot.resize.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/epiechart/jquery.easy-pie-chart.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/knob/jquery.knob.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/sparklines/jquery.sparkline.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/pnotify/jquery.pnotify.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/fullcalendar/fullcalendar.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/datatables/jquery.dataTables.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/datatables/dataTables.reloadAjax.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/datatables/dataTables.dateSorting.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/wookmark/jquery.wookmark.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jbreadcrumb/jquery.jBreadCrumb.1.1.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/uniform/jquery.uniform.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/select/select2.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/tagsinput/jquery.tagsinput.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/multiselect/jquery.multi-select.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/validationEngine/languages/jquery.validationEngine-en.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/validationEngine/jquery.validationEngine.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/stepywizard/jquery.stepy.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/animatedprogressbar/animated_progressbar.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/hoverintent/jquery.hoverIntent.minified.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/media/mediaelement-and-player.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/shbrush/XRegExp.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/shbrush/shCore.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/shbrush/shBrushXml.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/shbrush/shBrushJScript.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/shbrush/shBrushCss.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/filetree/jqueryFileTree.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/slidernav/slidernav-min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/isotope/jquery.isotope.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jnotes/jquery-notes_1.0.8_min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/jcrop/jquery.Jcrop.min.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/ibutton/jquery.ibutton.min.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/timepicker/jquery.timepicker.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/ckeditor/ckeditor.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/bootstrap/bootstrap-fileupload.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/ckeditor/ckeditor.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/admin/plugins.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/admin/charts.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/admin/actions.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/admin/md5_crypt.js"),$_smarty_tpl);?>
"></script>

<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/colorpicker/jquery.colorpicker.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/colorpicker/swatches/jquery.ui.colorpicker-pantone.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/colorpicker/parts/jquery.ui.colorpicker-rgbslider.js"),$_smarty_tpl);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_theme_url(array('path'=>"resources/js/plugins/colorpicker/parts/jquery.ui.colorpicker-memory.js"),$_smarty_tpl);?>
"></script><?php }} ?>
