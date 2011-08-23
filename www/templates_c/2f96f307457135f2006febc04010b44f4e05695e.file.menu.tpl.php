<?php /* Smarty version Smarty-3.0.7, created on 2011-08-19 20:09:08
         compiled from "D:\projects\php\albatros\lib/../app/menu/templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18194e4ea6c4ca2d91-21672594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f96f307457135f2006febc04010b44f4e05695e' => 
    array (
      0 => 'D:\\projects\\php\\albatros\\lib/../app/menu/templates\\menu.tpl',
      1 => 1313446278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18194e4ea6c4ca2d91-21672594',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="menu">
	<ol id="cufon-menu">
		<?php  $_smarty_tpl->tpl_vars['menu_item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['menu_item']->key => $_smarty_tpl->tpl_vars['menu_item']->value){
?>
			<li><a href="/<?php echo $_smarty_tpl->tpl_vars['menu_item']->value['lang'];?>
/<?php echo $_smarty_tpl->tpl_vars['menu_item']->value['uri'];?>
/"><?php echo $_smarty_tpl->tpl_vars['menu_item']->value['menu_title'];?>
</a></li>
		<?php }} ?>
	</ol>
</div>