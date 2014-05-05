<?php /* Smarty version Smarty-3.1.18, created on 2014-05-03 17:51:01
         compiled from "/media/jay/Data/apache/skully-admin/public/admin/widgets/alerts/_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8590956085364ca15650cc7-85241461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e51f1ca04bcb150051cfea3a33c70ddbfaa4e718' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/admin/widgets/alerts/_error.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8590956085364ca15650cc7-85241461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5364ca1567b306_76467414',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5364ca1567b306_76467414')) {function content_5364ca1567b306_76467414($_smarty_tpl) {?><div class="alert alert-error">
	<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }} ?>
