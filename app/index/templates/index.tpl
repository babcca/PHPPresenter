<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/css/default.css" />
	<link rel="stylesheet" type="text/css" href="/css/slider.css" />
	<link rel="stylesheet" href="/css/humanity/jquery-ui-1.8.14.custom.css" />
	<link rel="stylesheet" type="text/css" href="/css/gallery.css" />
	<link rel="stylesheet" type="text/css" href="/css/contact.css" />
	<link rel="stylesheet" type="text/css" href="/css/book.css" />
	<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/jquery.zweatherfeed.css" media="screen" />
    
	<script src="http://code.jquery.com/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="/js/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
	<script src="/js/jquery.zweatherfeed.js" type="text/javascript"></script>
	<script src="/js/cufon.js" type="text/javascript"></script>
	<script src="/js/font.js" type="text/javascript"></script>
	<script src="/js/init.js" type="text/javascript"></script>
	<script src="/js/slider.js" type="text/javascript"></script>
	
	<title>Pension Barbora | {$title}</title>
</head>
<body>
<div class="bar1">
	<div class="page-body">
		<div class="head">
			<div class="logo">
				<img src="/img/logo.png" alt="Pension Barbora | {$title}" />
			</div>
			{call_app app='menu' method='generate_language_menu' param="lang=$lang,id=$select_id"}
		</div>
	</div>
</div>
<div class="bar2">
	<div class="page-body">
		{call_app app='menu' method='generate_menu' param="lang=$lang,id=$select_id"}
	</div>
</div>
<div class="page-body">
	<table class="page-content" border="0">
		<tr>
			<td class="slideshow">
				<div class="slideshow-images">
					<div id="slider">
					   <ol id="sliderContent">
					      <li class="sliderImage">
					         <img src="/img/room_home.jpg" alt="xxx"/>
					      </li>
					      <li class="sliderImage">
					         <img src="/img/logo.png" alt="xxx"/>
					      </li>
					   </ol>
					   <div class="clear sliderImage"></div>
					</div>  
				</div>
			</td>
			<td class="right-box">
				<div class="box">
					<h1>SPECIAL OFFER</h1>
					<p>Rooms from 18 euro per night</p>
				</div>
				<div class="box">
					<h1>BOOK ONLINE</h1>
					<form class="book-form" method="post" action="">
						<table border="0">
						<tr>
							<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_from" name="date_from" value="check in" size="15" /></td>
						</tr>
						<tr>
							<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_to" name="data_to" size="15" value="check out" /></td>
						</tr>
						<tr><td><label>Rooms</label></td><td><label>Guests</label></td><td></td></tr>
						<tr>
							<td>
								<select><option>1</option><option>2</option></select>
							</td>
							<td>
								<select><option>1</option><option>2</option></select>
							</td>
							<td><input class="button-input" type="submit" /></td>
						</tr>
						</table>
					</form>	
				</div>
			</td>
		</tr>
		<tr>
			<td class="content">
				{call_app app=$app method=$method param="$param,lang=$lang"}
			</td>
			<td class="right-box">
				{call_app app='contact' method='quick_contact' param="lang=$lang"}
				<div class="box">
					<h1>{$trans.weather_info}</h1>
					<div id="weather" class="weatherFeed"></div>
				</div>
			</td>
		</tr>
	</table>
</div>
<div class="footer">Footer</div>
<script type="text/javascript"> Cufon.now(); </script>
<div class="debug_panel">
{debug_info}
</div>
</body>
</html>