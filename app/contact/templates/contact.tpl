<div class="contact-page">
<h1>{$title}</h1>
<p>{$text}</p>
<table>
	<tr>
		<td id="contact_info">
			Jmeno Firmy, adresa a kontakt
		</td>
		<td id="contact_form">
		<form action="" method="post" enctype="multiple/form-data">
			<input type="hidden" name="app" value="contact">
			<input type="hidden" name="method" value="contact_email">
			<label>Name:</label> <input	type="text" name="name" size="31" /><br />
			<label>Email:</label> <input type="text" name="email" size="31" /><br />
			<label>Phone:</label> <input type="text" name="phone" size="31" /><br />
			<span id="textarea_label">Your message:</span><br />
			<textarea name="message" cols="34" rows="5"></textarea> <br />
			<span id="submit_button"><input type="submit" name="submit_contact" /></span><br />
		</form>
		</td>
	</tr>
</table>
</div>
