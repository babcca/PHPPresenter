<?php /* Smarty version Smarty-3.0.7, created on 2011-08-11 07:50:00
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/gallery/templates\gallery_editor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94514e436d88dea212-16010449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88a4b946aa8b2f6d99200cc219736e8f35ea1648' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/gallery/templates\\gallery_editor.tpl',
      1 => 1313041271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94514e436d88dea212-16010449',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
	<?php echo smarty_function_get_message(array('id'=>'gallery_editor'),$_smarty_tpl);?>

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
	<?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
?>
		<div class="list">
			<a href="<?php echo $_smarty_tpl->tpl_vars['photo']->value['big'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['photo']->value['desc'];?>
">
			<img src="<?php echo $_smarty_tpl->tpl_vars['photo']->value['small'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['photo']->value['desc'];?>
" />
			</a>
			<form action="" method="post" name="delete_image_form">
				<input type="hidden" name="app" value="gallery" />
				<input type="hidden" name="method" value="delete_image" />
				<input type="hidden" name="image_id" value="<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
" />
				<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['photo']->value['desc'];?>
" class="desc_input" photo_id="<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
" />
				<input type="submit" value="X" class="delete" />
			</form>
		</div>
	<?php }} ?>
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
