<?php /* Smarty version Smarty-3.1.18, created on 2015-02-24 02:36:28
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\imageUploader\_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3244054eb813c027dc9-20957205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2d6f6210a03f0d040b00e9590e1beb4c568d065' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\imageUploader\\_index.tpl',
      1 => 1407903836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3244054eb813c027dc9-20957205',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_imageSettings' => 1,
    '_imageSettingName' => 1,
    'instanceInfo' => 1,
    '_imageSetting' => 1,
    'isSettingModel' => 1,
    'instances' => 1,
    'instanceName' => 1,
    '($_smarty_tpl->tpl_vars[\'instanceName\']->value)' => 1,
    'multipleManyTypesForm' => 1,
    'multipleOneTypeForm' => 1,
    'singleManyTypesForm' => 1,
    'singleOneTypeForm' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54eb813c153453_69792211',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eb813c153453_69792211')) {function content_54eb813c153453_69792211($_smarty_tpl) {?>
    <?php  $_smarty_tpl->tpl_vars['_imageSetting'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_imageSetting']->_loop = false;
 $_smarty_tpl->tpl_vars['_imageSettingName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_imageSettings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_imageSetting']->key => $_smarty_tpl->tpl_vars['_imageSetting']->value) {
$_smarty_tpl->tpl_vars['_imageSetting']->_loop = true;
 $_smarty_tpl->tpl_vars['_imageSettingName']->value = $_smarty_tpl->tpl_vars['_imageSetting']->key;
?>
        <div class="block-fluid image_row-<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
">
            <div class="row-form image_row-title">
                <div class="span3 largerText">
                    <?php echo $_smarty_tpl->tpl_vars['instanceInfo']->value;?>
<?php echo $_smarty_tpl->tpl_vars['_imageSetting']->value['_config']['adminName'];?>

                </div>
                <div class="TAR">
                    <?php if ($_smarty_tpl->tpl_vars['_imageSetting']->value['_config']['multiple']) {?>
                        
                        <?php if ($_smarty_tpl->tpl_vars['isSettingModel']->value) {?>
                            <a href="#" data-setting_id="<?php echo $_smarty_tpl->tpl_vars['instances']->value[$_smarty_tpl->tpl_vars['_imageSettingName']->value]['id'];?>
" data-setting_name="<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" class="add_image btn btn-primary btn-small<?php if ($_smarty_tpl->tpl_vars['_imageSetting']->value['types']) {?> many<?php } else { ?> one<?php }?>" title="Add New"><i class="icos-plus1"></i></a>
                        <?php } else { ?>
                            <a href="#" data-setting_id="<?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
" data-setting_name="<?php echo $_smarty_tpl->tpl_vars['_imageSettingName']->value;?>
" class="add_image btn btn-primary btn-small<?php if ($_smarty_tpl->tpl_vars['_imageSetting']->value['types']) {?> many<?php } else { ?> one<?php }?>" title="Add New"><i class="icos-plus1"></i></a>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['_imageSetting']->value['_config']['multiple']) {?>
                <?php if ($_smarty_tpl->tpl_vars['_imageSetting']->value['types']) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['multipleManyTypesForm']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['multipleOneTypeForm']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value), 0);?>

                <?php }?>
            <?php } elseif (!$_smarty_tpl->tpl_vars['_imageSetting']->value['_config']['multiple']) {?>
                <?php if ($_smarty_tpl->tpl_vars['_imageSetting']->value['types']) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['singleManyTypesForm']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['singleOneTypeForm']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('imageSettingName'=>$_smarty_tpl->tpl_vars['_imageSettingName']->value,'imageSetting'=>$_smarty_tpl->tpl_vars['_imageSetting']->value), 0);?>

                <?php }?>
            <?php }?>
        </div>
    <?php } ?>
<?php }} ?>
