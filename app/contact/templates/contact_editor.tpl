<div>
	<h1>Nastaveni kontaktnich informaci</h1>
	{get_message id='contact_editor' timeout=5000}
	<form action="" method="post">
		<input type="hidden" name="app" value="contact" />
		<input type="hidden" name="method" value="contact_update" />
		<textarea name="contact_table" cols="30" rows="20" style="width: 100%; height: 350px;">{$contact_table}</textarea>
		<div style="text-align: right"><input type="submit" class="submit-button" value="Ulozit"/></div>
	</form>
</div>