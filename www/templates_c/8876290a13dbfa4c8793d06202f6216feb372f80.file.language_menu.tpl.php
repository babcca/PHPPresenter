<?php /* Smarty version Smarty-3.0.7, created on 2011-08-11 07:42:36
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/menu/templates\language_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140914e436bcc030fb2-86089233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8876290a13dbfa4c8793d06202f6216feb372f80' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/menu/templates\\language_menu.tpl',
      1 => 1313041271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140914e436bcc030fb2-86089233',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="language-bar">
	<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('lang_link')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
?>
	<a href="/<?php echo $_smarty_tpl->tpl_vars['link']->value['lang'];?>
/<?php echo $_smarty_tpl->tpl_vars['link']->value['uri'];?>
"><img src="/img/<?php echo $_smarty_tpl->tpl_vars['link']->value['lang'];?>
.png" /></a>	
	<?php }} ?>
</div>