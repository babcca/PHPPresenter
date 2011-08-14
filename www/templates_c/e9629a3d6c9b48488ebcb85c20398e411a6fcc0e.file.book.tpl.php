<?php /* Smarty version Smarty-3.0.7, created on 2011-08-11 11:15:30
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/book/templates\book.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196044e439db2e8d826-25006703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9629a3d6c9b48488ebcb85c20398e411a6fcc0e' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/book/templates\\book.tpl',
      1 => 1313054016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196044e439db2e8d826-25006703',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_select_time')) include 'H:\Mago\WebPages\Pension_Barbora\web\lib\smarty\plugins\function.html_select_time.php';
?><a name="book_form"></a>
<div class="book-page">
<h1><?php echo $_smarty_tpl->getVariable('title')->value;?>
</h1>
<div class="booking_info">
	<img src="/img/warning_icon.png" alt="warning icon" />
	<?php echo $_smarty_tpl->getVariable('text')->value;?>

</div>
<div id="message_container">
<?php echo smarty_function_get_message(array('id'=>"book_order"),$_smarty_tpl);?>

</div>
<div class="booking_info"><?php echo $_smarty_tpl->getVariable('trans')->value['approx_price'];?>
</div>
	<input type="hidden" name="app" value="book"> 
	<input type="hidden" name="method" value="book_email"> 
	<table class="book_table">
	<tr>
		<th class="book_panel"><?php echo $_smarty_tpl->getVariable('trans')->value['booking_detail'];?>
</th><th>Personal information</th>
	</tr>
	<tr>
		<td class="vtop">
			<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['check_in_date'];?>
:</label> 
			<input readonly="readonly" class="text-input" type="text" id="date_from" name="date_from" size="15" value="<?php echo $_smarty_tpl->getVariable('default')->value[1];?>
" /><br />
	
			<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['check_out_date'];?>
:</label> 
			<input readonly="readonly" class="text-input" type="text" id="date_to" name="date_to" size="15"  value="<?php echo $_smarty_tpl->getVariable('default')->value[2];?>
" /><br />
			<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['transfer_from_airport'];?>
:</label>
			<span class="tooltip" original-title="From 1 to 4 persons in car.">
				<input type="checkbox" name="transfer" id="transfer" value="transfer" />
			</span><br />
			<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['breakfast'];?>
:</label>
			<span class="tooltip" original-title="Only for 4 persons or more. 5 &euro; per person a day.">
				<input type="checkbox" name="breakfast" id="breakfast" value="breakfast" />
			</span><br />
			<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['arrival_time'];?>
:</label>
			<?php echo smarty_function_html_select_time(array('display_seconds'=>false,'use_24_hours'=>false,'minute_interval'=>15),$_smarty_tpl);?>

			
			<div class="accordion" id="room_1">
				<h3><?php echo $_smarty_tpl->getVariable('trans')->value['first_room_properties'];?>
:</h3>
				<div id="guests_r0">			
					<?php $_template = new Smarty_Internal_Template('room_properties.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('index',0); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
				</div>
			</div>
			<div class="accordion" id="room_2">
				<h3><a href="#"><?php echo $_smarty_tpl->getVariable('trans')->value['second_room_properties'];?>
:</a></h3>
				<div id="guests_r1">
					<?php $_template = new Smarty_Internal_Template('room_properties.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('index',1); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
				</div>
			</div>
			<div class="accordion" id="room_3">
				<h3><a href="#"><?php echo $_smarty_tpl->getVariable('trans')->value['third_room_properties'];?>
:</a></h3>
				<div id="guests_r2">
					<?php $_template = new Smarty_Internal_Template('room_properties.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('index',2); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
				</div>	
			</div>
		</td>
		<td class="vtop">
			<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['name'];?>
:</label>
			<input class="input" type="text" name="name" size="20" /><br />
	
			<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['mail'];?>
:</label>
			<input class="input" type="text" name="email" size="20" /><br />
	
			<label class="book_label"><?php echo $_smarty_tpl->getVariable('trans')->value['phone'];?>
:</label>
			<input class="input" type="text" name="phone" size="20" /><br />
	
			<label><?php echo $_smarty_tpl->getVariable('trans')->value['your_message'];?>
</label><br />
			<textarea class="message" name="message" cols="35" rows="4" style="height:200px"></textarea><br />
		</td>
	</tr>
	<tr>
		<td colspan="2" class="right">
			<input name="show_price" type="button" value="Calculate" />
			<input name="send_book_order" type="button" value="Book" />
		</td>
	</tr>
</table>
<script>
	function get_checkbox(id) {
		return ($(id).attr("checked") == undefined) ? 'false' : 'true';
	};
	function get_data() {
		data = { app:'book',method:'calculate_price',date_from:$('#date_from').val(),date_to:$('#date_to').val(),transfer:get_checkbox('#transfer'),breakfast:get_checkbox('#breakfast'),rooms: { } };
		for (var i = 0; i < 3; ++i) { data['rooms'][i] = { guests:$('[name=guests_'+i+']:checked').val(),beds_s : $('[name=beds_s_'+i+']:checked').val(),beds_d : $('[name=beds_d_'+i+']:checked').val(),parking : get_checkbox('[name=parking_'+i+']') }; }
		return data;
	}
	function get_order_data(names) {
		var data = get_data(); for (e in names) { data[names[e]] = $('[name='+names[e]+']').val(); } return data;
	}
		
	$("[name=send_book_order]").click(function () {
		var btn = $(this);
		btn.attr("disabled", "true");
		var data = get_order_data(['name', 'email', 'phone', 'message']);
		data.method = 'book_order';
		if (not_empty(data, [['name', 'name not be empty'], ['email', 'email not be empty'], ['phone', 'phone not be empty']])) {
			$.post('/ajax.php', data, function (result) {
				javascript:location.reload(true);
			} );
		} else {
			btn.removeAttr('disabled');
		}
		
	} );
	$("[name=show_price]").click(function() {
		var btn = $(this);
		btn.attr("disabled", "true");
		var data = get_data();
		if ((data.date_from == '') || (data.date_to == '')) {
			btn.removeAttr('disabled');
		};	
		$.post('/ajax.php', data, function (result) {
			$("#message_container").html(result.messages);
			$(".calculator").html(result.result_price + ' &euro;');
			btn.removeAttr('disabled');
		}, 'json' );	
	});
	
	function trim(stringToTrim) {
		return stringToTrim.replace(/^\s+|\s+$/g,"");
	}
	function not_empty(data, keys) {
		var ret = true;
		for (k in keys) {
			if (trim(data[keys[k][0]]) == '') {
				alert(keys[k][1]);
				ret = false;
			}
		}
		return ret;
	}
</script>
</div>
