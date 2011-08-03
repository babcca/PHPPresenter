<a name="book_form"></a>
<div class="book-page">
<div class="booking_info">
	<img src="img/warning_icon.png" alt="warning icon" />
	Pre-Booking Info...	<br />
	New Line...
</div>
<div class="booking_info">
	dopln si tu co potrebujes, zrejme nejaky <span class="calculator"> span </span>, kde vlozis vypocitanu cenu...
</div>
<div id="booking_form">
	<form action="" method="post" enctype="multiple/form-data">
		<input type="hidden" name="app" value="book"> 
		<input type="hidden" name="method" value="book_email"> 
		
		<label class="book_label">Check-in date:</label> 
		<input readonly="readonly" class="text-input" type="text" id="date_from" name="date_from" size="15" {if isset($data)}value="{$data.1}"{/if} /><br />
		
		<label class="book_label">Check-out date:</label> 
		<input readonly="readonly" class="text-input" type="text" id="date_to" name="date_to" size="15"  {if isset($data)}value="{$data.2}"{/if} /><br />
		
		<label class="book_label">Guests:</label>
		<select name="guests"><option>1</option><option>2</option></select><br />
		
		<label class="book_label">Rooms:</label>
		<select name="rooms"><option>1</option><option>2</option></select><br />
		
		<label class="book_label">Single beds (optional):</label>
		<select name="beds_s"><option>0</option><option>1</option></select><br />
		
		<label class="book_label">Double bads (optional):</label>
		<select name="beds_d"><option>0</option><option>1</option></select><br />
		
		<label class="book_label">Parking:</label>
		<input type="checkbox" name="parking" value="parking" /><br />
		
		<label class="book_label">Transfer from airport:</label>
		<input type="checkbox" name="transfer" value="transfer" /><br />
		
		<label class="book_label">Arrival time:</label>
		{html_select_time display_seconds=false use_24_hours=false}
		<br />
		<label class="book_label">{$trans.name}:</label>
		<input type="text" name="name" size="20" /><br />
		
		<label class="book_label">{$trans.email}:</label>
		<input type="text" name="email" size="20" /><br />
		
		<label class="book_label">{$trans.phone}:</label>
		<input type="text" name="phone" size="20" /><br />
		
		<label>{$trans.your_message}</label><br />
		<textarea name="message" cols="38" rows="4"></textarea><br />
		
		<span id="submit_button"> 
			<input type="submit" id="???" name="???" />
		</span><br />
	</form>
</div>
</div>
