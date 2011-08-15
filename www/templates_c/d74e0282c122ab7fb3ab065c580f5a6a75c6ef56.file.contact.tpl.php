<?php /* Smarty version Smarty-3.0.7, created on 2011-08-15 23:51:43
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/contact/templates\contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52334e4994efa7c729-93156353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd74e0282c122ab7fb3ab065c580f5a6a75c6ef56' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/contact/templates\\contact.tpl',
      1 => 1313445023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52334e4994efa7c729-93156353',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_mailto')) include 'H:\Mago\WebPages\Pension_Barbora\web\lib\smarty\plugins\function.mailto.php';
?><div class="contact-page">
<h1><?php echo $_smarty_tpl->getVariable('text')->value['title'];?>
</h1>
<p><?php echo $_smarty_tpl->getVariable('text')->value['text'];?>
</p>
<table>
	<tr>
		<td id="contact_info" class="vtop">
			<address>
			<b><?php echo $_smarty_tpl->getVariable('contact')->value['address']['name'];?>
</b><br />
			<i><?php echo $_smarty_tpl->getVariable('contact')->value['address']['address'];?>
</i><br />
			<br />
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contact')->value['contact']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
				<img src="/img/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_i.png" title="<?php echo $_smarty_tpl->getVariable('trans')->value[$_smarty_tpl->getVariable('key')->value];?>
" alt="<?php echo $_smarty_tpl->getVariable('trans')->value[$_smarty_tpl->getVariable('key')->value];?>
"/> 
				<?php if ($_smarty_tpl->tpl_vars['key']->value=='mail'){?><?php echo smarty_function_mailto(array('address'=>$_smarty_tpl->tpl_vars['val']->value,'encode'=>"hex"),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<?php }?><br/>
			<?php }} ?>
			</address>
		</td>
		<td id="contact_form">
		<?php echo smarty_function_get_message(array('id'=>'contact'),$_smarty_tpl);?>

		<form action="" method="post" enctype="multiple/form-data" id="ContactForm">
			<input type="hidden" name="app" value="contact" />
			<input type="hidden" name="method" value="contact_email" />
			<label class="contact_label"><?php echo $_smarty_tpl->getVariable('trans')->value['name'];?>
:<span style="color: red">*</span></label> <input type="text" name="name" id="Name" size="31" /><br />
			<label class="contact_label"><?php echo $_smarty_tpl->getVariable('trans')->value['mail'];?>
:<span style="color: red">*</span></label> <input type="text" name="email" id="Email" size="31" /><br />
			<label class="contact_label"><?php echo $_smarty_tpl->getVariable('trans')->value['phone'];?>
:</label> <input type="text" name="phone" id="Phone" size="31" /><br />
			<label><?php echo $_smarty_tpl->getVariable('trans')->value['your_message'];?>
:</label><br />
			<textarea name="message" id="Message" cols="34" rows="5"></textarea> <br />
			<span id="submit_button"><input type="submit" name="submit_contact" id="Submit" class="submit-button" value="" /></span><br />
		</form>
		</td>
	</tr>
</table>
</div>
