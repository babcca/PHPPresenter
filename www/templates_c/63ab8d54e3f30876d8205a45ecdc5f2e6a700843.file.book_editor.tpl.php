<?php /* Smarty version Smarty-3.0.7, created on 2011-08-15 22:53:47
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/book/templates\book_editor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144994e49875b506f24-31711715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ab8d54e3f30876d8205a45ecdc5f2e6a700843' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/book/templates\\book_editor.tpl',
      1 => 1313441601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144994e49875b506f24-31711715',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
	label {
		width: 200px;
		display: inline-block;
	}
	.cell_input {
		text-align: right;
		width: 40px;
	}
</style>
<div>
	<h1>Nastaveni cen sluzeb a ubytovani</h1>
	<?php echo smarty_function_get_message(array('id'=>'book_editor','timeout'=>5000),$_smarty_tpl);?>

	<p>Vsechny zde vyopbrazene ceny a zadavane ceny jsou v Ceskych Korunach (Kc)</p>
	<form action="" method="post">
	<h2>Nastaveni prepocitavciho kurzu eura</h2>
	<p>Vysledna castka se pocita v korunach, vysledek se posleze vydeli timto cislem a zaokrouhli se na celou horni cast</p>
	<div class="texts"><label>1 &euro;</label>= <input type="text" name="euro" value="<?php echo $_smarty_tpl->getVariable('euro')->value;?>
" class="cell_input" /></div>
	<h2>Nastaveni cen sluzeb</h2>
	<p>Ceny jednotlivych sluzeb v korunach</p>
	<div><label>Parkovani na den</label>= <input type="text" name="parking" value="<?php echo $_smarty_tpl->getVariable('parking')->value;?>
" class="cell_input" /></div>
	<div><label>Snidane na den na osobu</label>= <input type="text" name="breakfast" value="<?php echo $_smarty_tpl->getVariable('breakfast')->value;?>
" class="cell_input" /></div>
	<div><label>Preprava, cena za jedno auto</label>= <input type="text" name="transport" value="<?php echo $_smarty_tpl->getVariable('transport')->value;?>
" class="cell_input" /></div>
	<h2>Nastaveni cen ubytovani</h2>
	<p>Ceny ubytovani jsou rozdeleny na dve kategorie, podle poctu dnu. U kazde kategorie se vypisuje cena jednoho pokoje podle poctu osob za den</p>
	<table>
		<tr>
			<th>den/osob</th><th>1</th><th>2</th><th>3</th><th>4 a vice</th>
		</tr>
		<tr>
			<td>Jeden den</td>
			<?php  $_smarty_tpl->tpl_vars['price'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('day_tax')->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['price']->key => $_smarty_tpl->tpl_vars['price']->value){
?>
			<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['price']->value;?>
" name="day_tax[0][]" class="cell_input"/></td>
			<?php }} ?>
		</tr>
		<tr>
			<td>Dva a vice</td>
			<?php  $_smarty_tpl->tpl_vars['price'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('day_tax')->value[1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['price']->key => $_smarty_tpl->tpl_vars['price']->value){
?>
			<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['price']->value;?>
" name="day_tax[1][]" class="cell_input"/></td>
			<?php }} ?>
		</tr>
	</table>
	<div style="text-align: right">
		<input type="hidden" name="app" value="book" />
		<input type="hidden" name="method" value="price_update" /> 
		<input type="reset" value="Zrus zmeny" />
		<input type="submit" value="Aktualizuj data" />
	</div>
	</form>
</div>