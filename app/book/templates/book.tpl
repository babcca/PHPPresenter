<a name="book_form"></a>
<div class="book-page">
<h1>{$title}</h1>
<div class="booking_info">
	<img src="/img/warning_icon.png" alt="warning icon" />
	{$text}
</div>
<div class="booking_info">{$trans.preliminary_price}</div>
<form action="" method="post" id="main_book_form" enctype="multiple/form-data">
	<input type="hidden" name="app" value="book"> 
	<input type="hidden" name="method" value="book_email"> 
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
			<span class="tooltip" original-title="From 1 to 4 person in car.">
				<input type="checkbox" name="transfer" id="transfer" value="transfer" />
			</span>
			<label>Count:</label>
			<input type="text" name="transfer_count" id="transfer_count" size="3" value="0"/>
			<br />
			<label class="book_label">{$trans.breakfast}:</label>
			<span class="tooltip" original-title="Only for 4 persons or more. 5 &euro; per person a day.">
				<input type="checkbox" name="breakfast" id="breakfast" value="breakfast" />
			</span>
			<label>Count:</label>
			<input type="text" name="breakfast_count" id="breakfast_count" size="3" value="0"/>
			<br />
			<label class="book_label">{$trans.arrival_time}:</label>
			{html_select_time display_seconds=false use_24_hours=false minute_interval=15}
			
			<div class="accordion" id="room_1">
				<h3>{$trans.first_room_properties}:</h3>
				<div id="guests_r0">			
					{include file='room_properties.tpl' index=0}
				</div>
			</div>
			<div class="accordion" id="room_2">
				<h3><a href="#">{$trans.second_room_properties}:</a></h3>
				<div id="guests_r1">
					{include file='room_properties.tpl' index=1}
				</div>
			</div>
			<div class="accordion" id="room_3">
				<h3><a href="#">{$trans.third_room_properties}:</a></h3>
				<div id="guests_r2">
					{include file='room_properties.tpl' index=2}
				</div>	
			</div>
		</td>
		<td class="vtop">
			<label class="book_label">{$trans.name}:</label>
			<input class="input" type="text" name="name" size="20" /><br />
	
			<label class="book_label">{$trans.mail}:</label>
			<input class="input" type="text" name="email" size="20" /><br />
	
			<label class="book_label">{$trans.phone}:</label>
			<input class="input" type="text" name="phone" size="20" /><br />
	
			<label>{$trans.your_message}</label><br />
			<textarea class="message" name="message" cols="35" rows="4" style="height:200px"></textarea><br />
		</td>
	</tr>
	<tr>
		<td colspan="2" class="right">
			<input onclick="show_price('.calculator')" type="button" value="claculate" />
		</td>
	</tr>
</table>
<div id="debugger"></div>
</form>
<script>
	function show_price(dest) {
		var prices = get_prices();
		var price = 0;
		// mozno i pridat neco jako vyuctovani (kolik za ktary pokoj atp.
		for (var i = 0; i < prices.length; ++i) {
			price += prices[i].price;
		}
		price = price + ' &euro;';
		//if (prices[0].sale) price = price + ' (-10% sale)';
		$(dest).html(price);
	}
	function get_prices() {
		var rooms = 3;
		var price = [];
		var xhr = [];
		var data = []
		for (var i = 0; i < rooms; ++i) {
			data[i] = {
					app: 'book',
					method: 'calculate_price',
					date_from : $('#date_from').val(),
					date_to : $('#date_to').val(),
					guests : $('[name=guests_'+i+']:checked').val(),
					//beds_s : $('[name=beds_s_'+i+']:checked').val(),
					//beds_d : $('[name=beds_d_'+i+']:checked').val(),
					parking : $('[name=parking_'+i+']').attr("checked"),
					transfer : $('#transfer').attr("checked"),
					breakfast : $('#breakfast').attr("checked"),
					transfer_c : i == 0 ? $('#transfer_count').val() : 0,
					breakfast_c : i == 0 ? $('#breakfast_count').val() : 0
			};
		}
		
		if (!((data[0].date_from == '') || (data[0].date_to) == '')) {
			for (var i = 0; i < 3; ++i) {
				$.ajax({
					type: 'POST',
					url: '/ajax.php',
					data: data[i],
					async: false, // need synchronou waiting :(, but i hope that be quick
					success: function(result) { 
						price[i] = result;
					},
					dataType: 'json'
				});
			}
		}
		return price;	
	}
</script>
</div>
