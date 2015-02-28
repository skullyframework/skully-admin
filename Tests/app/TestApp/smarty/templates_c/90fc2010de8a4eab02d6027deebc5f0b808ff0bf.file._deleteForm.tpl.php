<?php /* Smarty version Smarty-3.1.18, created on 2015-03-01 00:45:56
         compiled from "D:\apache\skully-admin\public\views\admin\widgets\crud\delete\_deleteForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1619554f1fed42a8557-38636113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90fc2010de8a4eab02d6027deebc5f0b808ff0bf' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\widgets\\crud\\delete\\_deleteForm.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1619554f1fed42a8557-38636113',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'destroyPath' => 1,
    'instanceName' => 1,
    '($_smarty_tpl->tpl_vars[\'instanceName\']->value)' => 1,
    'isAjax' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54f1fed4301153_22470296',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1fed4301153_22470296')) {function content_54f1fed4301153_22470296($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_block_form')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\block.form.php';
?>
    <?php ob_start();?><?php echo smarty_function_url(array('path'=>$_smarty_tpl->tpl_vars['destroyPath']->value),$_smarty_tpl);?>
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
