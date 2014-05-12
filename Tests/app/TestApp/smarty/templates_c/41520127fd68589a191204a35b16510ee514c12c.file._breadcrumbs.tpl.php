<?php /* Smarty version Smarty-3.1.18, created on 2014-05-12 01:27:17
         compiled from "/media/jay/Data/apache/skully-admin/public/views/admin/widgets/_breadcrumbs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:416133938536fc1052ff8f2-11919229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41520127fd68589a191204a35b16510ee514c12c' => 
    array (
      0 => '/media/jay/Data/apache/skully-admin/public/views/admin/widgets/_breadcrumbs.tpl',
      1 => 1393295000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '416133938536fc1052ff8f2-11919229',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumbs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536fc10535d792_80421016',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536fc10535d792_80421016')) {function content_536fc10535d792_80421016($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/media/jay/Data/apache/skully-admin/vendor/triodigital/skully/Skully/App/smarty/plugins/function.url.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['breadcrumbs']->value)) {?>
<div class="breadCrumb clearfix">
	<ul id="breadcrumbs">
		<li><a href="<?php echo smarty_function_url(array('path'=>"admin/home/index"),$_smarty_tpl);?>
">Home</a></li>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['crumb'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['breadcrumbs']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['name'] = 'crumb';
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['crumb']['total']);
?>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['crumb']['last']) {?>
				<li><?php echo $_smarty_tpl->tpl_vars['breadcrumbs']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crumb']['index']]['name'];?>
</li>
			<?php } else { ?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['breadcrumbs']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crumb']['index']]['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['breadcrumbs']->value[$_smarty_tpl->getVariable('smarty')->value['section']['crumb']['index']]['name'];?>
</a></li>
			<?php }?>
		<?php endfor; endif; ?>
	</ul>
</div>
<?php }?><?php }} ?>
