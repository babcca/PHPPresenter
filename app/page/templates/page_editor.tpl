<div class="page_editor">
	<h1>Nastaveni obsahu stranek</h1>
	{get_message id='page_editor'}
	Vyberte stranku k editaci:
	<select name="page_selector">
		{html_options options=$pages}
	</select>
	
	<form action="" method="post" id="editor_send">
		<input type="hidden" name="app" value="page" />
		<input type="hidden" name="method" value="update_content" />
		<input type="hidden" name="text_id" value="" />
		<div class="title_edit">
			<label>Nadpis stranky: </label><br/>
			<input type="text" name="content_title" size="30" value="" />
		</div>
		<div class="content_edit">
			<label>Obsah stranky: </label><br/>
			<textarea name="page_content" class="page_content" rows="40" cols="38"></textarea>
		</div>
	</form>
</div>
<script type="text/javascript">
load_content();
$("[name=page_selector]").change(function () {
	load_content();
} );

$("#editor_send").submit(function(h) {
	alert($("#editor_send").serialize());
} );

function load_content() {
	data = 'app=page&method=page_content&' + $("[name=page_selector]").val();
	$.post('ajax.php', data, function (content) {
		$("[name=content_title]").val(content.title);
		$("[name=page_content]").val(content.text);
		$("[name=text_id]").val(content.id);
	}, 'json');
}
</script>