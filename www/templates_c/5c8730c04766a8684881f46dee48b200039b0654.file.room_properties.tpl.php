<?php /* Smarty version Smarty-3.0.7, created on 2011-08-15 22:57:03
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/book/templates\room_properties.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42604e49881fb8b858-89859770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c8730c04766a8684881f46dee48b200039b0654' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/book/templates\\room_properties.tpl',
      1 => 1313441601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42604e49881fb8b858-89859770',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table>
	<tr style="text-align: center">
		<td class="book_label"></td><td>-</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
	</tr>
	<tr>
		<td class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['room_guests'];?>
:</td>
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (0) : 0-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
		<td><input name="guests_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->getVariable('checked')->value){?>checked="checked"<?php }?>/></td>
		<?php }} ?>
	</tr>
	<tr>
		<td class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['single_beds_count'];?>
:</td>
		<td><input name="beds_s_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="0" checked="checked"/></td>
		<td><input name="beds_s_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="1" /></td>
		<td><input name="beds_s_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="2" /></td>
		<td><input name="beds_s_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="3" /></td>
		<td><input name="beds_s_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="4" /></td>
		<td><input name="beds_s_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="5" /></td>
	</tr>
	<tr>
		<td class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['double_beds_count'];?>
:</td>
		<td><input name="beds_d_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="0" checked="checked"/></td>
		<td><input name="beds_d_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="1"/></td>
		<td><input name="beds_d_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="2"/></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>	
<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['parking'];?>
:</label>
<span class="tooltip" original-title="One car per night. 10 &euro;"><input type="checkbox" name="parking_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" value="parking" /></span>


