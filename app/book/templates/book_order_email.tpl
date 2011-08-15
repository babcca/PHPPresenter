<div style="width: 600px;">
<html>
	<head> </head>
	<body>
		This email was sent via booking form from website www.apartments-barbora.com. <br />
		For confirm, please <b>contact us</b> on email or phone.</b>
		<p>Your order id: {$order_id}</p>
		<p>Original message:</p>
		<p>Guest informations:</p>
		<p>
		 - Name: <b>{$name}</b><br />
		 - Email: <b>{$email}</b><br />
		 - Phone: <b>{$phone}</b>
		<p>Reservation informations:</p>
		 <p>
			 - Check-in date: <b>{$date_from}</b><br/ >
			 - Check-out date: <b>{$date_to}</b><br/ >
			 - Check-in time: <b>{*$arrival_time*}</b><br/ >
			 - Rooms: <b>{$rooms|@count}</b><br/ >
			{foreach from=$rooms item=room key=i}
			Room {$i}:<br />
			 - Guests: <b>{$room.guests}</b><br/ >
			 - Single beds: <b>{$room.beds_s}</b><br/ >
			 - Double beds: <b>{$room.beds_d}</b><br/ >
			 - Parking: <b>{$room.parking}</b><br/ >
			{/foreach}
			Accommodation:<br />
			- Breakfast: <b>{$breakfast}</b><br/ >
			- Transfer from airport: <b>{$transfer}</b><br/ >
	
			Notes: <br />
			{$message}
			</p>
		</p>
	</body>
</html>
<table>
</table>
</div>