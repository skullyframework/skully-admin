<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:20
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\crud\edit\_editNoAjax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1354454eb81344258d7-08035802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d17a5880842f5fbc001782fe41ac0d6e411e9d9' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\crud\\edit\\_editNoAjax.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
    'b1765b7a67f328792523a89a3d39f715b26c2d7f' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\wrappers\\_main.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
    '116c820b09448b213d5f087f6d6044dc8044f023' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\alerts\\_error.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
    '435c35bcda915081a225c269b5874a943019fa2a' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\alerts\\_message.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
    'bb4d987039c2ff2774c5f5d8c59d0213d48ddeb9' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\_alerts.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1354454eb81344258d7-08035802',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'route' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb81345391c7_52786034',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb81345391c7_52786034')) {function content_54eb81345391c7_52786034($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\Library\\Smarty\\libs\\plugins\\modifier.replace.php';
if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
if (!is_callable('smarty_function_theme_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.theme_url.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/wrappers/_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
<title>Edit <?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
</title>

</head>
<body class="page-<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['route']->value,'/','-');?>
">

<div class="header">
	<a href="<?php echo smarty_function_url(array('path'=>"home/index"),$_smarty_tpl);?>
" class="logo"></a>

	<div class="buttons">
		<div class="popup" id="subNavControll">
			<div class="label"><span class="icos-list"></span></div>
		</div>
		<div class="dropdown">
			<div class="label"><span class="icos-user2"></span></div>
			<div class="body" style="width: 160px;">
				
					
				
				
					
				
				<div class="itemLink">
					<a href="<?php echo smarty_function_url(array('path'=>"admin/admins/edit",'id'=>$_smarty_tpl->tpl_vars['user']->value['id']),$_smarty_tpl);?>
" title="<?php echo smarty_function_lang(array('value'=>"My Settings"),$_smarty_tpl);?>
" data-toggle="dialog"><span class="icon-cog icon-white"></span> <?php echo smarty_function_lang(array('value'=>"My Settings"),$_smarty_tpl);?>
</a>
				</div>
				<div class="itemLink">
					<a href="<?php echo smarty_function_url(array('path'=>"admin/admins/logout"),$_smarty_tpl);?>
"><span class="icon-off icon-white"></span> Logoff</a>
				</div>
			</div>
		</div>
		
			
			
				
				
					
						
							
								
								
								
							
						
					
				
			
		
		<div class="popup">
			<div class="label"><span class="icos-cog"></span></div>
			<div class="body">
				<div class="arrow"></div>
				<div class="row-fluid">
					<div class="row-form">
						<div class="span12">
							<span class="top">Themes:</span>
							<div class="themes">
								<a href="#" data-theme="" class="tip" title="Default"><img src="<?php echo smarty_function_theme_url(array('path'=>"resources/images/admin/themes/default.jpg"),$_smarty_tpl);?>
"/></a>
								<a href="#" data-theme="ssDaB" class="tip" title="DaB"><img src="<?php echo smarty_function_theme_url(array('path'=>"resources/images/admin/themes/dab.jpg"),$_smarty_tpl);?>
"/></a>
								<a href="#" data-theme="ssTq" class="tip" title="Tq"><img src="<?php echo smarty_function_theme_url(array('path'=>"resources/images/admin/themes/tq.jpg"),$_smarty_tpl);?>
"/></a>
								<a href="#" data-theme="ssGy" class="tip" title="Gy"><img src="<?php echo smarty_function_theme_url(array('path'=>"resources/images/admin/themes/gy.jpg"),$_smarty_tpl);?>
"/></a>
								<a href="#" data-theme="ssLight" class="tip" title="Light"><img src="<?php echo smarty_function_theme_url(array('path'=>"resources/images/admin/themes/light.jpg"),$_smarty_tpl);?>
"/></a>
								<a href="#" data-theme="ssDark" class="tip" title="Dark"><img src="<?php echo smarty_function_theme_url(array('path'=>"resources/images/admin/themes/dark.jpg"),$_smarty_tpl);?>
"/></a>
								<a href="#" data-theme="ssGreen" class="tip" title="Green"><img src="<?php echo smarty_function_theme_url(array('path'=>"resources/images/admin/themes/green.jpg"),$_smarty_tpl);?>
"/></a>
								<a href="#" data-theme="ssRed" class="tip" title="Red"><img src="<?php echo smarty_function_theme_url(array('path'=>"resources/images/admin/themes/red.jpg"),$_smarty_tpl);?>
"/></a>
							</div>
						</div>
					</div>
					<div class="row-form">
						<div class="span12">
							<span class="top">Backgrounds:</span>
							<div class="backgrounds">
								<a href="#" data-background="bg_default" class="bg_default"></a>
								<a href="#" data-background="bg_mgrid" class="bg_mgrid"></a>
								<a href="#" data-background="bg_crosshatch" class="bg_crosshatch"></a>
								<a href="#" data-background="bg_hatch" class="bg_hatch"></a>
								<a href="#" data-background="bg_light_gray" class="bg_light_gray"></a>
								<a href="#" data-background="bg_dark_gray" class="bg_dark_gray"></a>
								<a href="#" data-background="bg_texture" class="bg_texture"></a>
								<a href="#" data-background="bg_light_orange" class="bg_light_orange"></a>
								<a href="#" data-background="bg_yellow_hatch" class="bg_yellow_hatch"></a>
								<a href="#" data-background="bg_green_hatch" class="bg_green_hatch"></a>
							</div>
						</div>
					</div>
					<div class="row-form">
						<div class="span12">
							<span class="top">Navigation:</span>
							<input type="radio" name="navigation" id="fixedNav"/> Fixed
							<input type="radio" name="navigation" id="collapsedNav"/> Collapsible
							<input type="radio" name="navigation" id="hiddenNav"/> Hidden
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>

<div class="navigation">

<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/_mainMenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<div class="control"></div>

<div class="submain">

<div id="default">

	<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/_userInfo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class="dr"><span></span></div>
	
</div>

</div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/_breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="content">

	<div class="row-fluid">

		
<div class="span12">
    
        <?php /*  Call merged included template "admin/widgets/_alerts.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/widgets/_alerts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1354454eb81344258d7-08035802');
content_54eb81344fa173_56758815($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/_alerts.tpl" */?>
        <div class="widget">
            <div class="head">
                <div class="icon"><i class="icosg-bookmark1"></i></div>
                <h2>Edit <?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
</h2>
            </div>
            <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

        </div>
    
</div>


	</div>
	

</div>

    
    
    <?php if (!empty($_smarty_tpl->tpl_vars['errorAttributes']->value)) {?>
        <script type="text/javascript">
            var errors = <?php echo json_encode($_smarty_tpl->tpl_vars['errorAttributes']->value);?>
;
            attachErrors(errors, '<?php echo $_smarty_tpl->tpl_vars['instance']->value;?>
');
        </script>
    <?php }?>

<div class="loadingframe"></div>

</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:20
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\_alerts.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb81344fa173_56758815')) {function content_54eb81344fa173_56758815($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
	<?php /*  Call merged included template "admin/widgets/alerts/_error.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/alerts/_error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1354454eb81344258d7-08035802');
content_54eb81345052f0_80606545($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/alerts/_error.tpl" */?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)) {?>
	<?php /*  Call merged included template "admin/widgets/alerts/_message.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/alerts/_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1354454eb81344258d7-08035802');
content_54eb8134515b43_16317082($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/alerts/_message.tpl" */?>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:20
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\alerts\_error.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb81345052f0_80606545')) {function content_54eb81345052f0_80606545($_smarty_tpl) {?><div class="alert alert-error">
	<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:20
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\alerts\_message.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb8134515b43_16317082')) {function content_54eb8134515b43_16317082($_smarty_tpl) {?><div class="alert alert-success">
	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }} ?>
