<?php /* Smarty version Smarty-3.0.7, created on 2011-08-11 07:42:36
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/contact/templates\quick_contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184334e436bcc4519f1-92360746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a3986307b5c6ce0b0cdaceb99c705c185bdb642' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/contact/templates\\quick_contact.tpl',
      1 => 1313041271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184334e436bcc4519f1-92360746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_mailto')) include 'H:\Mago\WebPages\Pension_Barbora\web\lib\smarty\plugins\function.mailto.php';
?><div class="box">
	<h1><?php echo $_smarty_tpl->getVariable('trans')->value['more_information'];?>
</h1>
	<br />
	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contact')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
		<img src="/img/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
.png" title="<?php echo $_smarty_tpl->getVariable('trans')->value[$_smarty_tpl->getVariable('key')->value];?>
" alt="<?php echo $_smarty_tpl->getVariable('trans')->value[$_smarty_tpl->getVariable('key')->value];?>
"/> 
		<?php if ($_smarty_tpl->tpl_vars['key']->value=='mail'){?><?php echo smarty_function_mailto(array('address'=>$_smarty_tpl->tpl_vars['val']->value,'encode'=>"hex"),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<?php }?><br/>
	<?php }} ?>
</div>