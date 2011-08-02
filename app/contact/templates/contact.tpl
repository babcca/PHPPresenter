<div class="contact-page">
<h1>{$title}</h1>
<p>{$text}</p>
<table>
	<tr>
		<td id="contact_info" class="vtop">
			<div><b>Penzion Barbora</b></div>
			<div><i>Adresa nekde 1023/34, 140 11 Praha 11</i></div>
			<br />
			<img src="/img/mobile_phone.png" title="{$trans.mobile_phone}" alt="{$trans.mobile_phone}"/> {$mobile_phone}<br/>
			<img src="/img/phone.png" title="{$trans.phone}" alt="{$trans.phone}" /> {$telephone}<br/>
			<img src="/img/mail.png" title="{$trans.email}" alt="{$trans.email}" /> {mailto address=$email encode="hex"}<br/>
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
