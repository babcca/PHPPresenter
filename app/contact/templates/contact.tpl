<div class="contact-page">
<h1>{$text.title}</h1>
<p>{$text.text}</p>
<table>
	<tr>
		<td id="contact_info" class="vtop">
			<address>
			<b>{$contact.address.name}</b><br />
			<i>{$contact.address.address}</i><br />
			<br />
			{foreach from=$contact.contact item=val key=key}
				<img src="/img/{$key}_i.png" title="{$trans.$key}" alt="{$trans.$key}"/> 
				{if $key == 'mail'}{mailto address=$val encode="hex"}{else}{$val}{/if}<br/>
			{/foreach}
			</address>
		</td>
		<td id="contact_form">
		{get_message id='contact'}
		<form action="" method="post" enctype="multiple/form-data" id="ContactForm">
			<input type="hidden" name="app" value="contact" />
			<input type="hidden" name="method" value="contact_email" />
			<label class="contact_label">{$trans.name}:<span style="color: red">*</span></label> <input type="text" name="name" id="Name" size="31" /><br />
			<label class="contact_label">{$trans.mail}:<span style="color: red">*</span></label> <input type="text" name="email" id="Email" size="31" /><br />
			<label class="contact_label">{$trans.phone}:</label> <input type="text" name="phone" id="Phone" size="31" /><br />
			<label>{$trans.your_message}:<span style="color: red">*</span></label><br />
			<textarea name="message" id="Message" cols="34" rows="5"></textarea> <br />
			<span id="submit_button"><input type="submit" name="submit_contact" id="Submit" class="submit-button" value="" /></span><br />
		</form>
		</td>
	</tr>
</table>
</div>
