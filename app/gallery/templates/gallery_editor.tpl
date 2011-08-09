<style>
.gallery {
	width: 660px;
	margin: auto;
}
.gallery a {
	text-decoration: none;
	border: 0px none;	
}
.gallery img {
	border: 5px solid #d2c9a4;
	width: 180px;
	height: 100px;
	margin: auto;
}
.gallery img:hover {
	border-color: #b2a984;
}

.gallery .list {
	display: inline-block;
	margin: 5px 5px 5px 5px;
}
</style>
<div class="gallery_info">
	<h1>Editace fotek v galerii</h1>
	{get_message id='gallery_editor'}
	<form  enctype="multipart/form-data" action="" method="post" >
		<input type="hidden" name="app" value="gallery" />
		<input type="hidden" name="method" value="upload_image" />
		<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
		<label>Vyberte fotografii pro nahrani na server:</label>
		<input type="file" name="new_image" /> <br />
		<label>Popisek obrazku: </label>
		<input type="text" name="new_image_desc" />
		<input type="submit" value="upload" />
	</form>
	<div id="gallery" class="gallery" >
	{foreach from=$images item=photo}
		<div class="list">
			<a href="{$photo.big}" title="{$photo.desc}">
			<img src="{$photo.small}" alt="{$photo.desc}" />
			</a>
			<form action="" method="post" name="delete_image_form">
				<input type="hidden" name="app" value="gallery" />
				<input type="hidden" name="method" value="delete_image" />
				<input type="hidden" name="image_id" value="{$photo.id}" />
				<input type="text" value="{$photo.desc}" class="desc_input" photo_id="{$photo.id}" />
				<input type="submit" value="X" class="delete" />
			</form>
		</div>
	{/foreach}
	</div>	
</div>
<script>
	$("[name=delete_image_form]").submit(function(h) {
		return confirm('Opravdu smazat?');
	} );
	
	$(".desc_input").change(function() {
		var data = "app=gallery&method=update_desc&image_id="+$(this).attr("photo_id")+"&desc="+$(this).val();
		send_data_get_message(data);
	} );
</script>
