<?php /* Smarty version Smarty-3.1.18, created on 2014-05-05 15:25:13
         compiled from "/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/admins/_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38848381253674ae91a5955-89253650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74d782a8326e45336f8013e7100691181fd40c93' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/Tests/app/public/default/TestApp/views/admin/admins/_form.tpl',
      1 => 1399275786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38848381253674ae91a5955-89253650',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'title' => 0,
    'admin' => 0,
    'isAjax' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53674ae9220337_76093558',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53674ae9220337_76093558')) {function content_53674ae9220337_76093558($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/function.url.php';
if (!is_callable('smarty_function_lang')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/function.lang.php';
?><?php if (empty($_smarty_tpl->tpl_vars['action']->value)) {?>
    <?php $_smarty_tpl->tpl_vars['action'] = new Smarty_variable('create', null, 0);?>
<?php }?>
<form class="validate" method="POST" action="<?php echo smarty_function_url(array('path'=>("admin/admins/").($_smarty_tpl->tpl_vars['action']->value)),$_smarty_tpl);?>
">
    <div class="block-fluid">
        <div class="row-form">
            <div class="span12 largerText">
                <?php if ($_smarty_tpl->tpl_vars['action']->value=='create') {?>
                    <?php echo smarty_function_lang(array('value'=>("Create ").($_smarty_tpl->tpl_vars['title']->value)),$_smarty_tpl);?>

                <?php } else { ?>
                    <input name="admin[id]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
">
                    <?php echo smarty_function_lang(array('value'=>("Edit ").($_smarty_tpl->tpl_vars['title']->value)),$_smarty_tpl);?>

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
</form><?php }} ?>
