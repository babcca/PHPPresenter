<h1>{$trans.book_online}</h1>
<form class="quick-book-form" method="post" action="">
	<input type="hidden" name="app" value="book" />
	<input type="hidden" name="method" value="redirect" />
	<input type="hidden" name="lang" value="{$lang}" />
	<table border="0">
	<tr>
		<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_from_quick" name="date_from_quick" value="check in" size="15" /></td>
	</tr>
	<tr>
		<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_to_quick" name="date_to_quick" size="15" value="check out" /></td>
	</tr>
	<tr>
		<td><label>{$trans.rooms}</label></td>
		<td><label>{$trans.guests}</label></td><td></td>
	</tr>
	<tr>
		<td>
			<select name="rooms_quick""><option>1</option><option>2</option></select>
		</td>
		<td>
			<select name="guests_quick"><option>1</option><option>2</option></select>
		</td>
		<td><input class="button-input" type="submit" /></td>
	</tr>
	</table>
</form>