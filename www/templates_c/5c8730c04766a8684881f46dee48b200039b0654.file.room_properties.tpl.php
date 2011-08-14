<?php /* Smarty version Smarty-3.0.7, created on 2011-08-11 07:47:03
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/book/templates\room_properties.tpl" */ ?>
<?php /*%%SmartyHeaderCode:279584e436cd7ac0c99-17691978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c8730c04766a8684881f46dee48b200039b0654' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/book/templates\\room_properties.tpl',
      1 => 1313041271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '279584e436cd7ac0c99-17691978',
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
		<td><input name="guests_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="0" checked="checked"/></td>
		<td><input name="guests_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="1" /></td>
		<td><input name="guests_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="2" /></td>
		<td><input name="guests_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="3" /></td>
		<td><input name="guests_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="4" /></td>
		<td><input name="guests_<?php echo $_smarty_tpl->getVariable('index')->value;?>
" type="radio" value="5" /></td>
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


