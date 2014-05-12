<?php /* Smarty version Smarty-3.1.18, created on 2014-05-13 00:23:31
         compiled from "/media/jay/Data/apache/skully-admin/public/views/admin/widgets/alerts/_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:507958665371039399dab6-13526148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '773721103fb704bbcd3b94dcc397b20d2e9c2e7d' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/widgets/alerts/_error.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '507958665371039399dab6-13526148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537103939cafc2_66317387',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537103939cafc2_66317387')) {function content_537103939cafc2_66317387($_smarty_tpl) {?><div class="alert alert-error">
	<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }} ?>
