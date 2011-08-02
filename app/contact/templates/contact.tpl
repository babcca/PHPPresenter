<div class="contact-page">
<h1>{$title}</h1>
<p>{$text}</p>
<table>
	<tr>
		<td id="contact_info">
			Jmeno Firmy, adresa a kontakt
		</td>
		<td id="contact_form">
		<form action="" method="post" enctype="multiple/form-data" id="ContactForm">
			<input type="hidden" name="app" value="contact">
			<input type="hidden" name="method" value="contact_email">
			<label class="contact_label">{$trans.name}:</label> <input type="text" name="name" id="Name" size="31" /><br />
			<label class="contact_label">{$trans.email}:</label> <input type="text" name="email" id="Email" size="31" /><br />
			<label class="contact_label">{$trans.phone}:</label> <input type="text" name="phone" id="Phone" size="31" /><br />
			<label>{$trans.your_message}:</label><br />
			<textarea name="message" id="Message" cols="34" rows="5"></textarea> <br />
			<span id="submit_button"><input type="submit" name="submit_contact" id="Submit" /></span><br />
		</form>
		</td>
	</tr>
</table>
</div>
