<table>
	<tr style="text-align: center">
		<td class="book_label"></td><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
	</tr>
	<tr>
		<td class="book_label">Room guests:</td><td></td>
		<td><input name="guests_{$index}" type="radio" value="1" /></td>
		<td><input name="guests_{$index}" type="radio" value="2" checked="checked"/></td>
		<td><input name="guests_{$index}" type="radio" value="3" /></td>
		<td><input name="guests_{$index}" type="radio" value="4" /></td>
		<td><input name="guests_{$index}" type="radio" value="5" /></td>
	</tr>
	<tr>
		<td class="book_label">Single beds count:</td>
		<td><input name="beds_s_{$index}" type="radio" value="0" /></td>
		<td><input name="beds_s_{$index}" type="radio" value="1" checked="checked"/></td>
		<td><input name="beds_s_{$index}" type="radio" value="2" /></td>
		<td><input name="beds_s_{$index}" type="radio" value="3" /></td>
		<td><input name="beds_s_{$index}" type="radio" value="4" /></td>
		<td><input name="beds_s_{$index}" type="radio" value="5" /></td>
	</tr>
	<tr>
		<td class="book_label">Double beds count:</td>
		<td><input name="beds_d_{$index}" type="radio" value="0" checked="checked"/></td>
		<td><input name="beds_d_{$index}" type="radio" value="1"/></td>
		<td><input name="beds_d_{$index}" type="radio" value="2"/></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>	
<label class="book_label">Parking:</label>
<input type="checkbox" name="parking_{$index}" value="parking" />