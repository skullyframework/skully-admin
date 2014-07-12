<?php /* Smarty version Smarty-3.1.18, created on 2014-07-07 12:47:40
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\multiple\_manyTypes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2642453b84c14f1deb5-05868718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c01e12cbc113d6dbae5af38f6488bb5fa20f2b9' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\multiple\\_manyTypes.tpl',
      1 => 1404712058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2642453b84c14f1deb5-05868718',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b84c1508daa4_98718410',
  'variables' => 
  array (
    '_imagePos' => 0,
    'isSettingModel' => 0,
    'imageMovePath' => 0,
    '_imageSettingName' => 0,
    'instances' => 0,
    'imageDeletePath' => 0,
    'instanceName' => 0,
    '($_smarty_tpl->tpl_vars[\'instanceName\']->value)' => 0,
    '_imageSetting' => 0,
    'i' => 0,
    'typeName' => 0,
    'type' => 0,
    '_image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b84c1508daa4_98718410')) {function content_53b84c1508daa4_98718410($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?><div class="row-form imageManagerRow">
    <input type="hidden" name="position" value="<?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
" />
    <div class="FR">
        <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp1,'direction'=>"up",'position'=>$_tmp2,'setting'=>$_tmp3,'field'=>'value'),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveUp hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Up"),$_smarty_tpl);?>
"><i class="icos-arrow-up"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp4,'direction'=>"down",'position'=>$_tmp5,'setting'=>$_tmp6,'field'=>'value'),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveDown hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Down"),$_smarty_tpl);?>
"><i class="icos-arrow-down"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp9=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp7,'position'=>$_tmp8,'setting'=>$_tmp9,'field'=>'value'),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php } else { ?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp11=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp12=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp13=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp10,'direction'=>"up",'position'=>$_tmp11,'setting'=>$_tmp12,'field'=>$_tmp13),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveUp hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Up"),$_smarty_tpl);?>
"><i class="icos-arrow-up"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp14=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp15=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp16=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp17=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageMovePath']->value,'id'=>$_tmp14,'direction'=>"down",'position'=>$_tmp15,'setting'=>$_tmp16,'field'=>$_tmp17),$_smarty_tpl);?>
" class="btn btn-primary btn-small btnMoveDown hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Move Down"),$_smarty_tpl);?>
"><i class="icos-arrow-down"></i></a>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp18=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
<?php $_tmp19=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp20=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp21=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp18,'position'=>$_tmp19,'setting'=>$_tmp20,'field'=>$_tmp21),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php }?>
    </div>
    <div class="strong positionTitle"><?php echo $_smarty_tpl->tpl_vars['_imageSetting']->value['_config']['adminName'];?>
 Position: <span class="position"><?php echo $_smarty_tpl->tpl_vars['_imagePos']->value;?>
</span></div>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
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
<?php $_tmp22=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/imageUploader/_imageForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('group'=>((($_smarty_tpl->tpl_vars['_imageSettingName']->value).('_')).($_tmp22)),'_image'=>($_smarty_tpl->tpl_vars['_image']->value[$_smarty_tpl->tpl_vars['typeName']->value]),'type'=>$_smarty_tpl->tpl_vars['type']->value,'typeName'=>$_smarty_tpl->tpl_vars['typeName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'position'=>$_smarty_tpl->tpl_vars['_imagePos']->value), 0);?>

        </div>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
    <?php } ?>
</div><?php }} ?>
