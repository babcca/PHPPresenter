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
	{get_message id='book_editor' timeout=5000}
	<p>Vsechny zde vyopbrazene ceny a zadavane ceny jsou v Ceskych Korunach (Kc)</p>
	<form action="" method="post">
	<h2>Nastaveni prepocitavciho kurzu eura</h2>
	<p>Vysledna castka se pocita v korunach, vysledek se posleze vydeli timto cislem a zaokrouhli se na celou horni cast</p>
	<div class="texts"><label>1 &euro;</label>= <input type="text" name="euro" value="{$euro}" class="cell_input" /></div>
	<h2>Nastaveni cen sluzeb</h2>
	<p>Ceny jednotlivych sluzeb v korunach</p>
	<div><label>Parkovani na den</label>= <input type="text" name="parking" value="{$parking}" class="cell_input" /></div>
	<div><label>Snidane na den na osobu</label>= <input type="text" name="breakfast" value="{$breakfast}" class="cell_input" /></div>
	<div><label>Preprava, cena za jedno auto</label>= <input type="text" name="transport" value="{$transport}" class="cell_input" /></div>
	<h2>Nastaveni cen ubytovani</h2>
	<p>Ceny ubytovani jsou rozdeleny na dve kategorie, podle poctu dnu. U kazde kategorie se vypisuje cena jednoho pokoje podle poctu osob za den</p>
	<table>
		<tr>
			<th>den/osob</th><th>1</th><th>2</th><th>3</th><th>4 a vice</th>
		</tr>
		<tr>
			<td>Jeden den</td>
			{foreach from=$day_tax.0 item=price}
			<td><input type="text" value="{$price}" name="day_tax[0][]" class="cell_input"/></td>
			{/foreach}
		</tr>
		<tr>
			<td>Dva a vice</td>
			{foreach from=$day_tax.1 item=price}
			<td><input type="text" value="{$price}" name="day_tax[1][]" class="cell_input"/></td>
			{/foreach}
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