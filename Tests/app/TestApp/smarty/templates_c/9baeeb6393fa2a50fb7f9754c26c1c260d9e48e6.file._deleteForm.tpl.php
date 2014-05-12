<?php /* Smarty version Smarty-3.1.18, created on 2014-05-12 23:59:51
         compiled from "/media/jay/Data/apache/skully-admin/public/views/admin/widgets/crud/delete/_deleteForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4101707255370fa803569e3-56529402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9baeeb6393fa2a50fb7f9754c26c1c260d9e48e6' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/widgets/crud/delete/_deleteForm.tpl',
      1 => 1399913934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4101707255370fa803569e3-56529402',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5370fa8038eae0_59266490',
  'variables' => 
  array (
    'destroyPath' => 0,
    'instanceName' => 0,
    '($_smarty_tpl->tpl_vars[\'instanceName\']->value)' => 0,
    'isAjax' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5370fa8038eae0_59266490')) {function content_5370fa8038eae0_59266490($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/function.url.php';
if (!is_callable('smarty_block_form')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/block.form.php';
?><?php ob_start();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['destroyPath']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('method'=>"POST",'action'=>$_tmp1)); $_block_repeat=true; echo smarty_block_form(array('method'=>"POST",'action'=>$_tmp1), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
[id]" value="<?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['instanceName']->value)]->value['id'];?>
"/>
    <div class="block-fluid">
        <div class="row-form">
            <div class="span12 largerText">Delete this <?php echo $_smarty_tpl->tpl_vars['instanceName']->value;?>
?</div>
        </div>
        <?php if (!$_smarty_tpl->tpl_vars['isAjax']->value) {?>
            <div class="toolbar bottom TAR">
                <button class="btn btn-primary" id="submitForm" type="submit">Submit</button>
            </div>
        <?php }?>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('method'=>"POST",'action'=>$_tmp1), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
