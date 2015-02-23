<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\types\_singleManyTypes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2598654eb813c61c261-03501835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b08fa6f532bd7c3e228b36569ae7785c7dd4448' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\types\\_singleManyTypes.tpl',
      1 => 1408678015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2598654eb813c61c261-03501835',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isSettingModel' => 1,
    'imageDeletePath' => 1,
    '_imageSettingName' => 1,
    'instances' => 1,
    'instanceName' => 1,
    '($_smarty_tpl->tpl_vars[\'instanceName\']->value)' => 1,
    '_imageSetting' => 1,
    'i' => 1,
    'typeName' => 1,
    'type' => 1,
    'instanceImages' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb813c6a0766_18721371',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb813c6a0766_18721371')) {function content_54eb813c6a0766_18721371($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?>
    <div class="FR TAR" style="width: 100%; padding: 5px 10px;">
        <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
<?php $_tmp46=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp47=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp46,'setting'=>$_tmp47,'field'=>'value'),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php } else { ?>
            <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
<?php $_tmp48=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp49=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
<?php $_tmp50=ob_get_clean();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['imageDeletePath']->value,'id'=>$_tmp48,'setting'=>$_tmp49,'field'=>$_tmp50),$_smarty_tpl);?>
" data-toggle="dialog" class="btn btn-danger btn-small btnRemove hasPosition" title="<?php echo smarty_function_lang(array('value'=>"Delete"),$_smarty_tpl);?>
"><i class="icos-remove"></i></a>
        <?php }?>
    </div>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, true, 0);?>
    <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_smarty_tpl->tpl_vars['typeName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_imageSetting']->value['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['typeName']->value = $_smarty_tpl->tpl_vars['type']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['i']->value%4==0) {?>
            <div class="row-form imageManagerRow">
        <?php }?>
        <div class="span3 imageFormContainer">
            <label><?php echo $_smarty_tpl->tpl_vars['typeName']->value;?>
</label>
            <div><?php echo $_smarty_tpl->tpl_vars['type']->value['description'];?>
</div>
            <?php echo $_smarty_tpl->getSubTemplate ("admin/widgets/imageUploader/_imageForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('_image'=>($_smarty_tpl->tpl_vars['instanceImages']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value][$_smarty_tpl->tpl_vars['typeName']->value]),'type'=>$_smarty_tpl->tpl_vars['type']->value,'typeName'=>$_smarty_tpl->tpl_vars['typeName']->value,'_imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value,'_imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value), 0);?>

        </div>
        <?php if ($_smarty_tpl->tpl_vars['i']->value%4==3||count($_smarty_tpl->tpl_vars['_imageSetting']->value['types'])==$_smarty_tpl->tpl_vars['i']->value+1) {?>
            </div>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, true, 0);?>
    <?php } ?>
<?php }} ?>
