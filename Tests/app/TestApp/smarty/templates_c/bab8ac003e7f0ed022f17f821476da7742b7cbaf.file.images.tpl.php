<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\Tests\app\public\default\TestApp\views\admin\cRUDImages\images.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2785654eb813c7390e7-70120317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bab8ac003e7f0ed022f17f821476da7742b7cbaf' => 
    array (
      0 => 'D:\\apache\\skully-admin\\Tests\\app\\public\\default\\TestApp\\views\\admin\\cRUDImages\\images.tpl',
      1 => 1407984706,
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
    '313bd61c14ec6e1e9ddcf858c513b6998992c6cd' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\_imageForm.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
    '6c01e12cbc113d6dbae5af38f6488bb5fa20f2b9' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\multiple\\_manyTypes.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
    'a389dfa929ae09f52bc4e596f7235ffbee7d5d7c' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\multiple\\_oneType.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
    'ca3c08202e2216e45a6fbcc736ec4f5edee6b3ae' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\multiple\\_new.tpl',
      1 => 1407903944,
      2 => 'file',
    ),
    '03fec53c07860cc3a875cf57bc32a04e6b2c5767' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\_uploadScript.tpl',
      1 => 1408678015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2785654eb813c7390e7-70120317',
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
  'unifunc' => 'content_54eb813ca4cf72_16434774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb813ca4cf72_16434774')) {function content_54eb813ca4cf72_16434774($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\Library\\Smarty\\libs\\plugins\\modifier.replace.php';
if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
if (!is_callable('smarty_function_theme_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.theme_url.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/wrappers/_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
    <title>Images - Image Manager</title>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('admin/widgets/_alerts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '2785654eb813c7390e7-70120317');
content_54eb813c7bdab6_49516096($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/_alerts.tpl" */?>
        <div class="widget">
            <div class="head dark">
                <div class="icon"><i class="icos-images"></i></div>
                <h2><?php echo smarty_function_lang(array('value'=>"Images - Image Manager"),$_smarty_tpl);?>
</h2>
                <a href="<?php echo smarty_function_url(array('path'=>"admin/cRUDImages/index"),$_smarty_tpl);?>
" class="backlink">Back to list</a>
            </div>
            
                <?php echo $_smarty_tpl->tpl_vars['indexContent']->value;?>

                
                    <?php /*  Call merged included template "admin/widgets/imageUploader/_uploadScript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/imageUploader/_uploadScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '2785654eb813c7390e7-70120317');
content_54eb813c7e64a3_15661879($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/imageUploader/_uploadScript.tpl" */?>
                
            
        </div>
    </div>


	</div>
	

</div>

<div class="loadingframe"></div>

</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\_alerts.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb813c7bdab6_49516096')) {function content_54eb813c7bdab6_49516096($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
	<?php /*  Call merged included template "admin/widgets/alerts/_error.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/alerts/_error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '2785654eb813c7390e7-70120317');
content_54eb813c7c53f5_11246693($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/alerts/_error.tpl" */?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)) {?>
	<?php /*  Call merged included template "admin/widgets/alerts/_message.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/alerts/_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '2785654eb813c7390e7-70120317');
content_54eb813c7d02e1_27713389($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/alerts/_message.tpl" */?>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\alerts\_error.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb813c7c53f5_11246693')) {function content_54eb813c7c53f5_11246693($_smarty_tpl) {?><div class="alert alert-error">
	<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\alerts\_message.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb813c7d02e1_27713389')) {function content_54eb813c7d02e1_27713389($_smarty_tpl) {?><div class="alert alert-success">
	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\_uploadScript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb813c7e64a3_15661879')) {function content_54eb813c7e64a3_15661879($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
?>
    <?php  $_smarty_tpl->tpl_vars['_imageSetting'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_imageSetting']->_loop = false;
 $_smarty_tpl->tpl_vars['_imageSettingName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_imageSettings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_imageSetting']->key => $_smarty_tpl->tpl_vars['_imageSetting']->value) {
$_smarty_tpl->tpl_vars['_imageSetting']->_loop = true;
 $_smarty_tpl->tpl_vars['_imageSettingName']->value = $_smarty_tpl->tpl_vars['_imageSetting']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['_imageSetting']->value['_config']['multiple']) {?>
            <?php if ($_smarty_tpl->tpl_vars['_imageSetting']->value['types']) {?>
                <script id="template-<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" type="html/template">
    <?php /*  Call merged included template "admin/widgets/imageUploader/multiple/_manyTypes.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/imageUploader/multiple/_manyTypes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value), 0, '2785654eb813c7390e7-70120317');
content_54eb813c84faf0_29550337($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/imageUploader/multiple/_manyTypes.tpl" */?>
                    </script>
            <?php } else { ?>
                <script id="template-<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" type="html/template">
    <?php /*  Call merged included template "admin/widgets/imageUploader/multiple/_oneType.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/imageUploader/multiple/_oneType.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value), 0, '2785654eb813c7390e7-70120317');
content_54eb813c9193f9_12417425($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/imageUploader/multiple/_oneType.tpl" */?>
                    </script>
            <?php }?>
            <script id="template-<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
-new" type="html/template">
    <?php /*  Call merged included template "admin/widgets/imageUploader/multiple/_new.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/imageUploader/multiple/_new.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value), 0, '2785654eb813c7390e7-70120317');
content_54eb813c991438_05377198($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/imageUploader/multiple/_new.tpl" */?>
                </script>
        <?php }?>
    <?php } ?>
    <script type="text/javascript">
    $('.add_image').click(function(e) {
        if (!$(this).attr('disabled')) {
            var $new = $($('#template-'+$(this).data('setting_name')+'-new').html());
            $new.insertAfter($('.image_row-'+$(this).data('setting_name')+' .image_row-title'));
            if ($(this).hasClass('many')) {
                $new.css('display', 'none').slideDown();
                <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
                $('#newRow-'+$(this).data('setting_name')).data('setting_id', $(this).data('setting_id'));
                <?php }?>
                $(this).attr('disabled', 'disabled');
            }
            else {
                $new.css('display', 'none');
                <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
                $('#newRow-'+$(this).data('setting_name')).data('setting_id', $(this).data('setting_id'));
                <?php }?>
                $(this).attr('disabled', 'disabled');
                uploadSeparately($(this).closest('.image_row-'+$(this).data('setting_name')).find('.uploadSeparately'));
            }
        }
        return false;
    });

    function uploadSeparately(el)
    {
        var settingName = $(el).closest('.row-form').attr('id').replace('newRow-', '');
        <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
        insertNewRow(settingName, $(el).closest('.row-form').data('setting_id'));
        <?php } else { ?>
        insertNewRow(settingName, <?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
);
        <?php }?>
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
                                    $rowForms.find(".fileupload .thumbnail").html('<div class="emptyInfo"><?php echo smarty_function_lang(array('value'=>"No Image"),$_smarty_tpl);?>
</div>');
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

        <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
        var fieldName = 'value';
        <?php } else { ?>
        var fieldName = settingName;
        <?php }?>

        if (typeof(existingRow) == 'undefined' || existingRow == false) {
            url = '<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['imageNewRowPath']->value;?>
<?php $_tmp97=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_tmp97),$_smarty_tpl);?>
?id='+instanceId+'&setting='+settingName+'&field='+fieldName+'&pos='+position+'&new=1';
        }
        else {
            url = '<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['imageNewRowPath']->value;?>
<?php $_tmp98=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_tmp98),$_smarty_tpl);?>
?id='+instanceId+'&setting='+settingName+'&field='+fieldName+'&pos='+position;
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
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\multiple\_manyTypes.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb813c84faf0_29550337')) {function content_54eb813c84faf0_29550337($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?>
<div class="row-form imageManagerRow">
    <input type="hidden" name="position" value="<?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
" />
    <div class="FR">
        <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp51=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp52=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp53=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp51,'direction'=>"up",'position'=>$_tmp52,'setting'=>$_tmp53,'field'=>'value'),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveUp hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Up"),$_smarty_tpl);?>
"><i class="icos-arrow-up"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp54=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp55=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp56=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp54,'direction'=>"down",'position'=>$_tmp55,'setting'=>$_tmp56,'field'=>'value'),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveDown hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Down"),$_smarty_tpl);?>
"><i class="icos-arrow-down"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp57=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp58=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp59=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp57,'position'=>$_tmp58,'setting'=>$_tmp59,'field'=>'value'),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php } else { ?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp60=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp61=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp62=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp63=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp60,'direction'=>"up",'position'=>$_tmp61,'setting'=>$_tmp62,'field'=>$_tmp63),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveUp hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Up"),$_smarty_tpl);?>
"><i class="icos-arrow-up"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp64=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp65=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp66=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp67=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp64,'direction'=>"down",'position'=>$_tmp65,'setting'=>$_tmp66,'field'=>$_tmp67),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveDown hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Down"),$_smarty_tpl);?>
"><i class="icos-arrow-down"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp68=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp69=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp70=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp71=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp68,'position'=>$_tmp69,'setting'=>$_tmp70,'field'=>$_tmp71),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php }?>
    </div>
    <div class="strong positionTitle"><?php echo $_smarty_tpl->tpl_vars['_imageSetting']->value['_config']['adminName'];?>
 Position: <span class="position"><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
</span></div>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, true, 0);?>
    <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_smarty_tpl->tpl_vars['typeName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_imageSetting']->value['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['typeName']->value = $_smarty_tpl->tpl_vars['type']->key;
?>
        <div class="span3 imageFormContainer" <?php if ($_smarty_tpl->tpl_vars['i']->value%4==0) {?>style="margin-left: 0;"<?php }?>>
            <label><?php echo $_smarty_tpl->tpl_vars['typeName']->value;?>
</label>
            <div><?php echo $_smarty_tpl->tpl_vars['type']->value['description'];?>
</div>
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp72=ob_get_clean();?><?php /*  Call merged included template "admin/widgets/imageUploader/_imageForm.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/imageUploader/_imageForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('group'=>((($_smarty_tpl->tpl_vars['_imageSettingName']->value).('_')).($_tmp72)),'_image'=>($_smarty_tpl->tpl_vars['_image']->value[$_smarty_tpl->tpl_vars['typeName']->value]),'type'=>$_smarty_tpl->tpl_vars['type']->value,'typeName'=>$_smarty_tpl->tpl_vars['typeName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'position'=>$_smarty_tpl->tpl_vars['_imagePos']->value), 0, '2785654eb813c7390e7-70120317');
content_54eb813c8cd2f2_35618380($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/imageUploader/_imageForm.tpl" */?>
        </div>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, true, 0);?>
    <?php } ?>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\_imageForm.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb813c8cd2f2_35618380')) {function content_54eb813c8cd2f2_35618380($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_block_form')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\block.form.php';
if (!is_callable('smarty_function_public_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.public_url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?>
    <?php ob_start();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageUploadPath']->value),$_smarty_tpl);?>
<?php $_tmp73=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('class'=>"imageForm",'method'=>"POST",'enctype'=>"multipart/form-data",'action'=>$_tmp73)); $_block_repeat=true; echo smarty_block_form(array('class'=>"imageForm",'method'=>"POST",'enctype'=>"multipart/form-data",'action'=>$_tmp73), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php if (!empty($_smarty_tpl->tpl_vars['instanceName']->value)) {?>
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
_id" value="<?php if (!empty($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'])) {?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php }?>" />
        <?php }?>
        <input type="hidden" name="settingName" value="<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" />
        <?php if (!empty($_smarty_tpl->tpl_vars['typeName']->value)) {?>
            <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['typeName']->value;?>
" />
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['position']->value)) {?>
            <input type="hidden" name="position" value="<?php echo $_smarty_tpl->tpl_vars['position']->value;?>
"/>
        <?php }?>
        <div class="fileupload <?php if (!empty($_smarty_tpl->tpl_vars['_image']->value)) {?>fileupload-exists<?php } else { ?>fileupload-new<?php }?>" data-provides="fileupload">
            <div class="fileupload-preview thumbnail">
                <?php if (!empty($_smarty_tpl->tpl_vars['_image']->value)) {?>
                    <input type="hidden" name="imageUrl" value="<?php echo smarty_function_public_url(array('path'=>$_smarty_tpl->tpl_vars['_image']->value),$_smarty_tpl);?>
" />
                    <a href="<?php echo smarty_function_public_url(array('path'=>$_smarty_tpl->tpl_vars['_image']->value),$_smarty_tpl);?>
" class="fb" rel="<?php echo $_smarty_tpl->tpl_vars['group']->value;?>
"><img src="<?php echo smarty_function_public_url(array('path'=>$_smarty_tpl->tpl_vars['_image']->value),$_smarty_tpl);?>
" /></a>
                <?php } else { ?>
                    <div class="emptyInfo"><?php echo smarty_function_lang(array('value'=>"No Image"),$_smarty_tpl);?>
</div>
                <?php }?>
            </div>
            <div>
                <span class="btn btn-file btn-primary">
                    <span class="fileupload-new">Upload</span>
                    <span class="fileupload-exists">Change</span>
                    <input type="file" name="image" />
                </span>
                <span class="btn btn-primary fileupload-upload" style="display: none;">Upload</span>
            </div>
        </div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('class'=>"imageForm",'method'=>"POST",'enctype'=>"multipart/form-data",'action'=>$_tmp73), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\multiple\_oneType.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb813c9193f9_12417425')) {function content_54eb813c9193f9_12417425($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?>
<div class="row-form imageManagerRow">
    <input type="hidden" name="position" value="<?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
" />
    <div class="FR">
        <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp74=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp75=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp76=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp74,'direction'=>"up",'position'=>$_tmp75,'setting'=>$_tmp76,'field'=>'value'),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveUp hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Up"),$_smarty_tpl);?>
"><i class="icos-arrow-up"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp77=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp78=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp79=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp77,'direction'=>"down",'position'=>$_tmp78,'setting'=>$_tmp79,'field'=>'value'),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveDown hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Down"),$_smarty_tpl);?>
"><i class="icos-arrow-down"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp80=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp81=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp82=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp80,'position'=>$_tmp81,'setting'=>$_tmp82,'field'=>'value'),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php } else { ?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp83=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp84=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp85=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp86=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp83,'direction'=>"up",'position'=>$_tmp84,'setting'=>$_tmp85,'field'=>$_tmp86),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveUp hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Up"),$_smarty_tpl);?>
"><i class="icos-arrow-up"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp87=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp88=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp89=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp90=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp87,'direction'=>"down",'position'=>$_tmp88,'setting'=>$_tmp89,'field'=>$_tmp90),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveDown hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Down"),$_smarty_tpl);?>
"><i class="icos-arrow-down"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp91=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp92=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp93=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp94=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp91,'position'=>$_tmp92,'setting'=>$_tmp93,'field'=>$_tmp94),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php }?>
    </div>
    <div class="strong positionTitle"><?php echo $_smarty_tpl->tpl_vars['_imageSetting']->value['_config']['adminName'];?>
 Position: <span class="position"><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
</span></div>
    <div class="span3 imageFormContainer" <?php if ($_smarty_tpl->tpl_vars['i']->value%4==0) {?>style="margin-left: 0;"<?php }?>>
        <div><?php echo $_smarty_tpl->tpl_vars['_imageSetting']->value['options']['description'];?>
</div>
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp95=ob_get_clean();?><?php /*  Call merged included template "admin/widgets/imageUploader/_imageForm.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("admin/widgets/imageUploader/_imageForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('group'=>((($_smarty_tpl->tpl_vars['_imageSettingName']->value).('_')).($_tmp95)),'_image'=>($_smarty_tpl->tpl_vars['_image']->value),'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'position'=>$_smarty_tpl->tpl_vars['_imagePos']->value), 0, '2785654eb813c7390e7-70120317');
content_54eb813c8cd2f2_35618380($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "admin/widgets/imageUploader/_imageForm.tpl" */?>
    </div>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\multiple\_new.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54eb813c991438_05377198')) {function content_54eb813c991438_05377198($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_block_form')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\block.form.php';
?>
<div class="row-form" id="newRow-<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
">
    <div class="span6">
        <?php ob_start();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageUploadPath']->value),$_smarty_tpl);?>
<?php $_tmp96=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('enctype'=>"multipart/form-data",'method'=>"POST",'action'=>$_tmp96)); $_block_repeat=true; echo smarty_block_form(array('enctype'=>"multipart/form-data",'method'=>"POST",'action'=>$_tmp96), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
                <input name="setting_id" value="<?php if (!empty($_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'])) {?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php }?>" type="hidden" />
                <input name="data" value='{ "id": "<?php if (!empty($_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'])) {?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php }?>", "type": "uploadOnce", "settingName": "<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" }' type="hidden" />
            <?php } else { ?>
                <input name="<?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
_id" value="<?php if (!empty($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'])) {?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php }?>" type="hidden" />
                <input name="data" value='{ "id": "<?php if (!empty($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'])) {?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php }?>", "type": "uploadOnce", "settingName": "<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" }' type="hidden" />
            <?php }?>
            <input name="settingName" value="<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" type="hidden" />
            <input name="uploadOnce" value="1" type="hidden" />

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div>
                    <span class="btn btn-file btn-large">
                        <span class="fileupload-new largeText uploadOnc fileupload-upload">Upload one image, resize to all types (can change later)</span>
                        <span class="fileupload-exists largeText uploadOnc">Upload one image, resize to all types (can change later)</span>
                        <input type="file" name="image" />
                    </span>
                </div>
            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('enctype'=>"multipart/form-data",'method'=>"POST",'action'=>$_tmp96), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
    <div class="span6">
        <a href="#" class="btn btn-large largeText uploadSeparately">Upload separate image for each type</a>
    </div>
</div>

<?php }} ?>
