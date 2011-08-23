<?php /* Smarty version Smarty-3.0.7, created on 2011-08-22 17:53:33
         compiled from "D:\projects\php\albatros\lib/../app/page/templates\page_editor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50884e527b7d099131-22530102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e20456ebcc6b84a8f0732e149860a1a1b7b9c941' => 
    array (
      0 => 'D:\\projects\\php\\albatros\\lib/../app/page/templates\\page_editor.tpl',
      1 => 1313447924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50884e527b7d099131-22530102',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include 'D:\projects\php\albatros\lib\smarty\plugins\function.html_options.php';
?><div class="page_editor">
	<h1>Nastaveni obsahu stranek</h1>
	<?php echo smarty_function_get_message(array('id'=>'page_editor'),$_smarty_tpl);?>

	Vyberte stranku k editaci:
	<select name="page_selector">
		<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->getVariable('pages')->value),$_smarty_tpl);?>

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