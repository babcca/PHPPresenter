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