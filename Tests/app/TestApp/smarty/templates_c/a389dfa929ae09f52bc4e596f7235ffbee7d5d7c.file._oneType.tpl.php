<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\multiple\_oneType.tpl" */ ?>
<?php /*%%SmartyHeaderCode:225354eb813c4d37c0-10509157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a389dfa929ae09f52bc4e596f7235ffbee7d5d7c' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\multiple\\_oneType.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '225354eb813c4d37c0-10509157',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_imagePos' => 1,
    'isSettingModel' => 1,
    'imageMovePath' => 1,
    '_imageSettingName' => 1,
    'instances' => 1,
    'imageDeletePath' => 1,
    'instanceName' => 1,
    '($_smarty_tpl->tpl_vars[\'instanceName\']->value)' => 1,
    '_imageSetting' => 1,
    'i' => 1,
    '_image' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb813c579720_70263011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb813c579720_70263011')) {function content_54eb813c579720_70263011($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?>
<div class="row-form imageManagerRow">
    <input type="hidden" name="position" value="<?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
" />
    <div class="FR">
        <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp24=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp25=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp26=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp24,'direction'=>"up",'position'=>$_tmp25,'setting'=>$_tmp26,'field'=>'value'),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveUp hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Up"),$_smarty_tpl);?>
"><i class="icos-arrow-up"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp27=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp28=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp29=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp27,'direction'=>"down",'position'=>$_tmp28,'setting'=>$_tmp29,'field'=>'value'),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveDown hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Down"),$_smarty_tpl);?>
"><i class="icos-arrow-down"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp30=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp31=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp32=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp30,'position'=>$_tmp31,'setting'=>$_tmp32,'field'=>'value'),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php } else { ?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp33=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp34=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp35=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp36=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp33,'direction'=>"up",'position'=>$_tmp34,'setting'=>$_tmp35,'field'=>$_tmp36),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveUp hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Up"),$_smarty_tpl);?>
"><i class="icos-arrow-up"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp37=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp38=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp39=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp40=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp37,'direction'=>"down",'position'=>$_tmp38,'setting'=>$_tmp39,'field'=>$_tmp40),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveDown hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Down"),$_smarty_tpl);?>
"><i class="icos-arrow-down"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp41=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp42=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp43=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp44=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp41,'position'=>$_tmp42,'setting'=>$_tmp43,'field'=>$_tmp44),$_smarty_tpl);?>
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
<?php $_tmp45=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/imageUploader/_imageForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('group'=>((($_smarty_tpl->tpl_vars['_imageSettingName']->value).('_')).($_tmp45)),'_image'=>($_smarty_tpl->tpl_vars['_image']->value),'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'position'=>$_smarty_tpl->tpl_vars['_imagePos']->value), 0);?>

    </div>
</div>
<?php }} ?>
