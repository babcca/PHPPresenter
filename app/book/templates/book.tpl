<a name="book_form"></a>
<div class="book-page">
<div class="booking_info">
	<img src="/img/warning_icon.png" alt="warning icon" />
	Pre-Booking Info...	<br />
	New Line...
</div>
<div class="booking_info">
	dopln si tu co potrebujes, zrejme nejaky <span class="calculator"> span </span>, kde vlozis vypocitanu cenu...
</div>
<form action="" method="post" id="main_book_form" enctype="multiple/form-data">
	<input type="hidden" name="app" value="book"> 
	<input type="hidden" name="method" value="book_email"> 
	<table class="book_table">
	<tr>
		<th class="book_panel">Booking detail</th><th class="book_panel">Personal information</th>
	</tr>
	<tr>
		<td>
			<label class="book_label">Check-in date:</label> 
			<input readonly="readonly" class="text-input" type="text" id="date_from" name="date_from" size="15" value="{$default.1}" /><br />
	
			<label class="book_label">Check-out date:</label> 
			<input readonly="readonly" class="text-input" type="text" id="date_to" name="date_to" size="15"  value="{$default.2}" /><br />
			<label class="book_label">Transfer from airport:</label>
			<input type="checkbox" name="transfer" id="transfer" value="transfer" /><br />
			<label class="book_label">Arrival time:</label>
			{html_select_time display_seconds=false use_24_hours=false minute_interval=15}
			
			<label class="book_label">Rooms count:</label>
			<select id="rooms" name="rooms">
			{html_options values=[1,2,3] output=[1,2,3] selected=$default.4}
			</select><br />
			<div id="guests_r0">			
				<h2>First room properties</h2>
				{include file='room_properties.tpl' index=0}
			</div>			
		</td>
		<td class="vtop">
			<label class="book_label">{$trans.name}:</label>
			<input type="text" name="name" size="20" /><br />
	
			<label class="book_label">{$trans.email}:</label>
			<input type="text" name="email" size="20" /><br />
	
			<label class="book_label">{$trans.phone}:</label>
			<input type="text" name="phone" size="20" /><br />
	
			<label>{$trans.your_message}</label><br />
			<textarea class="message" name="message" cols="35" rows="4" style="height:200px"></textarea><br />
		</td>
	</tr>
	<tr>
		<td>
			<div id="guests_r1" style="{if $default.4 < 2}display: none{/if}">
				<h2>Second room properties</h2>
				{include file='room_properties.tpl' index=1}
			</div>
		</td>
		<td>	
			<div id="guests_r2" style="{if $default.4 < 3}display: none{/if}">
				<h2>Third room properties</h2>
				{include file='room_properties.tpl' index=2}
			</div>			
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
	$("#rooms").change(function(event) {
		var rooms = $("#rooms").val();
		var i = 0;
		for (; i < rooms; ++i) {
			$("#guests_r"+i).show();
		}
		for (; i < 3; ++i) {
			$("#guests_r"+i).hide();
			$("#guests_r"+i +" [checked=checked]").attr("checked", true);
		}
	} );
	function show_price(dest) {
		var prices = get_prices();
		var price = 0;
		// mozno i pridat neco jako vyuctovani (kolik za ktary pokoj atp.
		for (var i = 0; i < prices.length; ++i) {
			price += prices[i].price;
		}
		price = price + ' &euro;';
		if (prices[0].sale) price = price + ' (-10% sale)';
		$(dest).html(price);
	}
	function get_prices() {
		var rooms = $("#rooms").val();
		var price = [];
		var xhr = [];
		for (var i = 0; i < rooms; ++i) {
			var data = {
					app: 'book',
					method: 'calculate_price',
					date_from : $('#date_from').val(),
					date_to : $('#date_to').val(),
					guests : $('[name=guests_'+i+']:checked').val(),
					//beds_s : $('[name=beds_s_'+i+']:checked').val(),
					//beds_d : $('[name=beds_d_'+i+']:checked').val(),
					parking : $('[name=parking_'+i+']').attr("checked"),
					transfer : $('#transfer').attr("checked")
			}
			$.ajax({
				  type: 'POST',
				  url: '/ajax.php',
				  data: data,
				  async: false, // need synchronou waiting :(, but i hope that be quick
				  success: function(result) { 
						price[i] = result;
				  },
				  dataType: 'json'
			});
		}
		return price;	
	}
</script>
</div>
