<?php /* Smarty version Smarty-3.0.7, created on 2011-08-23 02:12:35
         compiled from "D:\projects\php\albatros\lib/../app/form/templates\js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312464e52f073808fe8-17496007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd635d270ca2fa21e457bfdf581dbadf50d268ae' => 
    array (
      0 => 'D:\\projects\\php\\albatros\\lib/../app/form/templates\\js.tpl',
      1 => 1314058354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312464e52f073808fe8-17496007',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
	$('#client_name').autocomplete( {
					source: '/ajax.php?app=form&method=client_list',
					minLength: 2,
					select: function (e, ui) {
						$('[name=client_id]').val(ui.item.id);
						$('#birth').val(ui.item.rc != '' ? ui.item.rc : ui.item.ico);
						$('#address').val(ui.item.address);
					}
	} );
	
	$('[name=insurence-list],[name=products-list]').change(function() {
		get_product_data();
	} );
	
	$('select[name=product-list]').change(function () {
		$('[name=product_text]').val($('select[name=product-list] option:selected').val());
	} );
	
	$('[name=update-product]').click(function () {
		$('[name=product_text]').val($('select[name=product-list] option:selected').val());
	} );
	
	$('#acordion').accordion( {
		autoHeight: false,
		collapsible: true
	} );

	function get_product_data() {
		var data = { app:'form', method:'get_products_list', i_id:$('select[name=insurence-list] option:selected').val(), t_id:$('select[name=products-list] option:selected').val() };
		$.post('/ajax.php', data, function (result) {
			$('select[name=product-list]').empty();
			$('[name=product_text]').val('');
			$.each(result, function(key, value) {
     			$('select[name=product-list]').append($('<option>', { value : value }).text(key)); 
			} );
		}, 'json' );
	}
</script>