<style>
	label {
		width: 200px;
		display: inline-block;
	}
</style>
<div>
	<h1>Nastaveni optimalizace SEO</h1>
	<p>Vetsina prohlizecu ignuruje keywords v hlavicce dokumentu,
	ale nastesti se obcas dava duraz na text v description u
	jednotlivych stranek (vetsinou se zobrazuje pri odkazu), 
	na titulek u jednotlivych stranek a na adresu jednotlivych stranek.
	A vsechny tyto udaje si muzete menit.</p>
	<label>Vyberte prosim stranku:</label>
	<select id="page_selector">
	{html_options options=$pages}
	</select>
	<hr />
	{get_message id="index_editor" timeout=5000}
	<form action="" method="post">
	<label>Titulek stranky (v liste): </label> <input type="text" name="page_title" value="" /><br />
	<label>Adresa uri stranky: </label> <input type="text" name="uri" value="" /><br />
	<label>Popis stranky (max 150 znaku)</label><br />
	<textarea name="description" cols="37" rows="8"></textarea>
	<div style="text-align: right">
		<input type="hidden" name="app" value="index" />
		<input type="hidden" name="method" value="index_update_data" />
		<input type="hidden" name="id" value="" />
		<input type="submit" value="Aktualizuj data" />
	</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		get_data();
	} );
	
	$("#page_selector").change(function () {
		get_data();
	} );
	function get_data() {
		var data = { app:'index', method:'get_data', 'page_id': $("#page_selector :selected").val() } ;
		$.post('/ajax.php', data, function (result) {
			for (var name in result) {
				$("[name="+name+"]").val(result[name]);
			}
		} ,'json');
	}
</script>