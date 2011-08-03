<h1>{$trans.book_online}</h1>
<form class="book-form" method="post" action="">
	<table border="0">
	<tr>
		<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_from" name="date_from" value="check in" size="15" /></td>
	</tr>
	<tr>
		<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_to" name="data_to" size="15" value="check out" /></td>
	</tr>
	<tr><td><label>{$trans.rooms}</label></td><td><label>{$trans.guests}</label></td><td></td></tr>
	<tr>
		<td>
			<select><option>1</option><option>2</option></select>
		</td>
		<td>
			<select><option>1</option><option>2</option></select>
		</td>
		<td><input class="button-input" type="submit" /></td>
	</tr>
	</table>
</form>