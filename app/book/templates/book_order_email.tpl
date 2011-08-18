<div style="width: 650px;">
<html>
<head>
<style>
body {
	font-family: Arial, Helvetica, sans-serif;
}
#wrapper {
	background-color: #D2C9A4;
}
#wrapper p {
	padding-left: 10px;
}
#header {
	background-color: #8B815F;
	padding: 10px;
	height: 50px;
	font-size: 20px;
	color: #FFF;
	text-align: center;
}
#header b {
	position: relative;
	top: 15px;
}	
#header img {
	height: 50px;
	width: 108px;
	float: left;
}
#price {
	background-color: #8B815F;
	font-size: 20px;
	color: #FFF;
}
</style>
</head>
	<body>
	<div id="wrapper">
		<div id="header"><img src="http://apartments-barbora.com/img/logo.png" alt="logo">
		<b>Pre-booking confirmation</b></div>
		<p>This email was sent via booking form from website <b>www.apartments-barbora.com.</b><br />
		Please wait for us to confirm the reservation, we will contact you on email or phone as soon as possible.</p>
		
		<p>Your order id: <b>{$order_id}</b></p>
		<p><b>Original message:</b></p>
		
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
			 - Rooms: <b>{$rooms|@count}</b></p>
			{foreach from=$rooms item=room key=i}
			<p>Room no. {$i}:<br />
			 - Guests: <b>{$room.guests}</b><br/ >
			 - Single beds: <b>{$room.beds_s}</b><br/ >
			 - Double beds: <b>{$room.beds_d}</b><br/ >
			 - Parking: <b>{$room.parking}</b></p>
			{/foreach}
			<p>Services:<br />
			- Breakfast: <b>{$breakfast}</b><br/ >
			- Transfer from airport: <b>{$transfer}</b></p>
	
			<p>Notes: <br />
			{$message}
			</p>
			
			<div id="price"><p>Total price: <br />
			<b>{$price}</b>
			</p></div>
		</p>
	</div>
	</body>
</html>
<table>
</table>
</div>