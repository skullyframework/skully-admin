<?php /* Smarty version Smarty-3.1.18, created on 2014-07-04 10:09:12
         compiled from "D:\apache\skully-admin\public\views\admin\admins\_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:356353b61ad8d406a2-44216377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31124213de27262fb192d7f5360ab9a4a42b0e28' => 
    array (
      0 => 'D:\\apache\\skully-admin\\public\\views\\admin\\admins\\_form.tpl',
      1 => 1402120786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '356353b61ad8d406a2-44216377',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'instanceName' => 0,
    'admin' => 0,
    'isAjax' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b61ad8ea7c96_47175132',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b61ad8ea7c96_47175132')) {function content_53b61ad8ea7c96_47175132($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.url.php';
if (!is_callable('smarty_block_form')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\block.form.php';
if (!is_callable('smarty_function_lang')) include 'D:\\apache\\skully-admin\\vendor\\skullyframework\\skully\\Skully\\App\\smarty\\plugins\\function.lang.php';
?><?php if (empty($_smarty_tpl->tpl_vars['action']->value)) {?>
    <?php $_smarty_tpl->tpl_vars['action'] = new Smarty_variable('create', null, 0);?>
<?php }?>
<?php ob_start();?><?php echo smarty_function_url(array('path'=>("admin/admins/").($_smarty_tpl->tpl_vars['action']->value)),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('class'=>"validate",'method'=>"POST",'action'=>$_tmp1)); $_block_repeat=true; echo smarty_block_form(array('class'=>"validate",'method'=>"POST",'action'=>$_tmp1), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="block-fluid">
        <div class="row-form">
            <div class="span12 largerText">
                <?php if ($_smarty_tpl->tpl_vars['action']->value=='create') {?>
                    <?php echo smarty_function_lang(array('value'=>("Create ").($_smarty_tpl->tpl_vars['instanceName']->value)),$_smarty_tpl);?>

                <?php } else { ?>
                    <input name="admin[id]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
">
                    <?php echo smarty_function_lang(array('value'=>("Edit ").($_smarty_tpl->tpl_vars['instanceName']->value)),$_smarty_tpl);?>

                <?php }?>
            </div>
        </div>
        <div class="row-form">
            <div class="span2"><?php echo smarty_function_lang(array('value'=>"Full Name"),$_smarty_tpl);?>
</div>
            <div class="span10">
                <input name="admin[name]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['name'];?>
"/>
            </div>
        </div>

        <div class="row-form">
            <div class="span2"><?php echo smarty_function_lang(array('value'=>"Email"),$_smarty_tpl);?>
</div>
            <div class="span10">
                <input name="admin[email]" type="text" class="validate[required,maxSize[100]]" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['email'];?>
"/>
                <span class="bottom"><?php echo smarty_function_lang(array('value'=>"Used for login. Required."),$_smarty_tpl);?>
</span>
            </div>
        </div>

        <div class="row-form">
            <div class="span2"><?php echo smarty_function_lang(array('value'=>"Password"),$_smarty_tpl);?>
</div>
            <div class="span10">
                <input name="admin[password]" type="password" class="" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['password'];?>
"/>
            </div>
        </div>

        <div class="row-form">
            <div class="span2"><?php echo smarty_function_lang(array('value'=>"Password Confirmation"),$_smarty_tpl);?>
</div>
            <div class="span10">
                <input name="admin[password_confirmation]" type="password" class="" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['password_confirmation'];?>
"/>
            </div>
        </div>

        <div class="row-form">
            <div class="span10"><label for="status"><?php echo smarty_function_lang(array('value'=>"Status"),$_smarty_tpl);?>
</label></div>
            <div class="span2">
                <select name="admin[status]">
                    <option <?php if ($_smarty_tpl->tpl_vars['admin']->value['status']=='active') {?>selected<?php }?> value="active"><?php echo smarty_function_lang(array('value'=>"Active"),$_smarty_tpl);?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['admin']->value['status']=='inactive') {?>selected<?php }?> value="inactive"><?php echo smarty_function_lang(array('value'=>"Inactive"),$_smarty_tpl);?>
</option>
                </select>
            </div>
        </div>

        <?php if (!$_smarty_tpl->tpl_vars['isAjax']->value) {?>
            <div class="toolbar bottom TAR">
                <div class="btn-group">
                    <button class="btn btn-primary" id="submitForm" type="submit">Submit</button>
                </div>
            </div>
        <?php }?>

    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('class'=>"validate",'method'=>"POST",'action'=>$_tmp1), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
