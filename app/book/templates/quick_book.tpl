<h1>{$trans.book_online}</h1>
<div style="">
<form class="quick-book-form" method="post" action="">
	<table border="0">
	<tr>
		<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_from_quick" name="date_from_quick" value="check in" size="15" /></td>
	</tr>
	<tr>
		<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_to_quick" name="date_to_quick" size="15" value="check out" /></td>
	</tr>
	<tr>
		<td><label>{$trans.guests}</label></td>
		<td>
			{html_options values=[1,2,3,4,5,0] output=[1,2,3,4,5, 'more'] name='guests_quick'}
		</td>
		<td>
			<input type="submit" class="book-button" value=""/>
		</td>
	</tr>
	</table>
	<input type="hidden" name="app" value="book" />
	<input type="hidden" name="method" value="redirect" />
	<input type="hidden" name="lang" value="{$lang}" />
</form>
</div>