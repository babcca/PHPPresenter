<table>
	<tr style="text-align: center">
		<td class="book_label"></td><td>-</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
	</tr>
	<tr>
		<td class="book_label">{$trans.room_guests}:</td>
		{for $i=0 to 5}
		<td><input name="guests_{$index}" type="radio" value="{$i}" {if $i == $checked}checked="checked"{/if}/></td>
		{/for}
	</tr>
	<tr>
		<td class="book_label">{$trans.single_beds_count}:</td>
		<td><input name="beds_s_{$index}" type="radio" value="0" checked="checked"/></td>
		<td><input name="beds_s_{$index}" type="radio" value="1" /></td>
		<td><input name="beds_s_{$index}" type="radio" value="2" /></td>
		<td><input name="beds_s_{$index}" type="radio" value="3" /></td>
		<td><input name="beds_s_{$index}" type="radio" value="4" /></td>
		<td><input name="beds_s_{$index}" type="radio" value="5" /></td>
	</tr>
	<tr>
		<td class="book_label">{$trans.double_beds_count}:</td>
		<td><input name="beds_d_{$index}" type="radio" value="0" checked="checked"/></td>
		<td><input name="beds_d_{$index}" type="radio" value="1"/></td>
		<td><input name="beds_d_{$index}" type="radio" value="2"/></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>	
<label class="book_label">{$trans.parking}:</label>
<span class="tooltip" original-title="One car per night. 10 &euro;"><input type="checkbox" name="parking_{$index}" value="parking" /></span>


