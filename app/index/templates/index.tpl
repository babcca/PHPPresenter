<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="{$lang}">
	<meta name="description" content="{$description}" />
	<meta name="author" content="Petr Babicka,Martin Kolesar" />
	<link rel="shortcut icon" href="/img/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="/css/default.css" />
	<link rel="stylesheet" type="text/css" href="/css/slider.css" />
	<link rel="stylesheet" type="text/css" href="/css/humanity/jquery-ui-1.8.14.custom.css" />
	<link rel="stylesheet" type="text/css" href="/css/gallery.css" />
	<link rel="stylesheet" type="text/css" href="/css/contact.css" />
	<link rel="stylesheet" type="text/css" href="/css/book.css" />
	<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/jquery.zweatherfeed.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/tipsy.css" media="screen" />
	
	<script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/js/jquery.lightbox-0.5.js" type="text/javascript"></script>
	<script src="/js/jquery.zweatherfeed.js" type="text/javascript"></script>
	<script src="/js/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>	
	<script src="/js/cufon.js" type="text/javascript"></script>
	<script src="/js/font.js" type="text/javascript"></script>
	<script src="/js/init.js" type="text/javascript"></script>
	<script src="/js/slider.js" type="text/javascript"></script>
	<script src="/js/jquery.tipsy.js" type="text/javascript"></script>
	
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
			<!-- EXACT dimensions of the image -> W:660px, H:296px. -->
			<td class="slideshow">
				<div class="slideshow-images">
					<div id="slider">
					   <ol id="sliderContent">
					      <li class="sliderImage">
					         <img src="/img/slider/01.jpg" alt="xxx"/>
					      </li>
					      <li class="sliderImage">
					         <img src="/img/slider/02.jpg" alt="xxx"/>
					      </li>
						  <li class="sliderImage">
					         <img src="/img/slider/03.jpg" alt="xxx"/>
					      </li>
						  <li class="sliderImage">
					         <img src="/img/slider/04.jpg" alt="xxx"/>
					      </li>
						  <li class="sliderImage">
					         <img src="/img/slider/05.jpg" alt="xxx"/>
					      </li>
					   </ol>
					</div>  
				</div>
			</td>
			<td class="right-box">
				<div class="box">
					<h1>{$trans.special_offers}</h1>
					<img src="/img/banner.png" alt="special offer banner" />
				</div>
				<div class="box">
					{call_app app='book' method='quick_book_form' param="lang=$lang"}	
				</div>
			</td>
		</tr>
		<tr>
			<td class="content vtop">
				{call_app app=$app method=$method param="$param,lang=$lang"}
			</td>
			<td class="right-box">
				{call_app app='contact' method='quick_contact' param="lang=$lang"}
				<div class="box">
					<h1>{$trans.weather_info}</h1>
					<div id="weather" class="weatherFeed"></div>
				</div>
				<div class="box">
					<h1>{$trans.exchange_rates}</h1>
					<div id="exchangeRates"></div>
				</div>
			</td>
		</tr>
	</table>
</div>
<div class="footer">Footer</div>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9724354-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<div class="debug_panel">
{debug_info}
</div>
</body>
</html>