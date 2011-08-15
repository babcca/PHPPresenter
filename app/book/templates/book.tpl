<a name="book_form"></a>
<div class="book-page">
<h1>{$title}</h1>
<div class="booking_info">
	<img src="/img/warning_icon.png" alt="warning icon" />
	{$text}
</div>
<div id="message_container">
{get_message id="book_order"}
</div>
<div class="booking_info">{$trans.approx_price}</div>
{*<form action="" method="post" id="main_book_form" enctype="multiple/form-data">*}
	<input type="hidden" name="app" value="book" /> 
	<input type="hidden" name="method" value="book_email" /> 
	<table class="book_table">
	<tr>
		<th class="book_panel">{$trans.booking_detail}</th><th>Personal information</th>
	</tr>
	<tr>
		<td class="vtop">
			<label class="book_label">{$trans.check_in_date}:</label> 
			<input readonly="readonly" class="text-input" type="text" id="date_from" name="date_from" size="15" value="{$default.1}" /><br />
	
			<label class="book_label">{$trans.check_out_date}:</label> 
			<input readonly="readonly" class="text-input" type="text" id="date_to" name="date_to" size="15"  value="{$default.2}" /><br />
			<label class="book_label">{$trans.transfer_from_airport}:</label>
			<span class="tooltip" original-title="From 1 to 4 persons in car.">
				<input type="checkbox" name="transfer" id="transfer" value="transfer" />
			</span><br />
			<label class="book_label">{$trans.breakfast}:</label>
			<span class="tooltip" original-title="Only for 4 persons or more. 5 &euro; per person a day.">
				<input type="checkbox" name="breakfast" id="breakfast" value="breakfast" />
			</span><br />
			<label class="book_label">{$trans.arrival_time}:</label>
			{html_select_time display_seconds=false use_24_hours=false minute_interval=15}
			
			<div class="accordion" id="room_1">
				<h3>{$trans.first_room_properties}:</h3>
				<div id="guests_r0">			
					{include file='room_properties.tpl' index=0 checked=$default.3}
				</div>
			</div>
			<div class="accordion" id="room_2">
				<h3><a href="#">{$trans.second_room_properties}:</a></h3>
				<div id="guests_r1">
					{include file='room_properties.tpl' index=1 checked=0}
				</div>
			</div>
			<div class="accordion" id="room_3">
				<h3><a href="#">{$trans.third_room_properties}:</a></h3>
				<div id="guests_r2">
					{include file='room_properties.tpl' index=2 checked=0}
				</div>	
			</div>
		</td>
		<td class="vtop">
			<label class="book_label">{$trans.name}:<span style="color: red">*</span></label>
			<input class="input" type="text" name="name" size="20" /><br />
	
			<label class="book_label">{$trans.mail}:<span style="color: red">*</span></label>
			<input class="input" type="text" name="email" size="20" /><br />
	
			<label class="book_label">{$trans.phone}:<span style="color: red">*</span></label>
			<input class="input" type="text" name="phone" size="20" /><br />
	
			<label>{$trans.your_message}</label><br />
			<textarea class="message" name="message" cols="35" rows="4" style="height:200px"></textarea><br />
		</td>
	</tr>
	<tr>
		<td colspan="2" class="right">
			<input name="show_price" type="button" class="calculate-button" value="" />
			<input name="send_book_order" type="button" class="book-button" value="" />
		</td>
	</tr>
</table>
{*</form>*}
<script type="text/javascript">
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
		for (k in keys) {
			if (trim(data[keys[k][0]]) == '') {
				$("#message_container").html('<b>'+keys[k][1]+'</b>');
				return false;
			}
		}
		return true;
	}
</script>
</div>
