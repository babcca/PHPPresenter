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
			<input readonly="readonly" class="text-input" type="text" id="date_from" name="date_from" size="15" {if isset($data)}value="{$data.1}"{/if} /><br />
	
			<label class="book_label">Check-out date:</label> 
			<input readonly="readonly" class="text-input" type="text" id="date_to" name="date_to" size="15"  {if isset($data)}value="{$data.2}"{/if} /><br />
			<label class="book_label">Transfer from airport:</label>
			<input type="checkbox" name="transfer" id="transfer" value="transfer" /><br />
			<label class="book_label">Arrival time:</label>
			{html_select_time display_seconds=false use_24_hours=false}
			
			<label class="book_label">Rooms count:</label>
			<select id="rooms" name="rooms"><option>1</option><option>2</option><option>3</option></select><br />
			<hr />
			<div id="guests_r0">			
				<h2>First room properties</h2>
				{include file='room_properties.tpl' index=0}
			</div>
			
			<div id="guests_r1" style="display: none">
				<h2>Second room properties</h2>
				{include file='room_properties.tpl' index=1}
			</div>
			
			<div id="guests_r2" style="display: none">
				<h2>Third room properties</h2>
				{include file='room_properties.tpl' index=2}
			</div>			
			<hr />	
		</td>
		<td class="vtop">
			<label class="book_label">{$trans.name}:</label>
			<input type="text" name="name" size="20" /><br />
	
			<label class="book_label">{$trans.email}:</label>
			<input type="text" name="email" size="20" /><br />
	
			<label class="book_label">{$trans.phone}:</label>
			<input type="text" name="phone" size="20" /><br />
	
			<label>{$trans.your_message}</label><br />
			<textarea name="message" cols="35" rows="4"></textarea><br />
		</td>
	</tr>
	<tr>
		<td colspan="2" class="right">
				<input type="submit" id="???" name="???" />
		</td>
	</tr>
</table>
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
			//$("[name=guests_"+i+"]:checked").val()
			$("[checked=checked]").attr("checked", true);
		}
		
	} );
</script>
</div>
