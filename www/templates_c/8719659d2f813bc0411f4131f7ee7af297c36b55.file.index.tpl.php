<?php /* Smarty version Smarty-3.0.7, created on 2011-08-16 00:47:59
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/index/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235074e49a21f754980-16106567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8719659d2f813bc0411f4131f7ee7af297c36b55' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/index/templates\\index.tpl',
      1 => 1313448475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235074e49a21f754980-16106567',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="<?php echo $_smarty_tpl->getVariable('lang')->value;?>
">
	<meta name="description" content="<?php echo $_smarty_tpl->getVariable('description')->value;?>
" />
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
	
	<title>Pension Barbora | <?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
</head>
<body>
<div class="bar1">
	<div class="page-body">
		<div class="head">
			<div class="logo">
				<img src="/img/logo.png" alt="Pension Barbora | <?php echo $_smarty_tpl->getVariable('title')->value;?>
" />
			</div>
			<?php echo smarty_function_call_app(array('app'=>'menu','method'=>'generate_language_menu','param'=>"lang=".($_smarty_tpl->getVariable('lang')->value).",id=".($_smarty_tpl->getVariable('select_id')->value)),$_smarty_tpl);?>

		</div>
	</div>
</div>
<div class="bar2">
	<div class="page-body">
		<?php echo smarty_function_call_app(array('app'=>'menu','method'=>'generate_menu','param'=>"lang=".($_smarty_tpl->getVariable('lang')->value).",id=".($_smarty_tpl->getVariable('select_id')->value)),$_smarty_tpl);?>

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
					<h1><?php echo $_smarty_tpl->getVariable('trans')->value['special_offers'];?>
</h1>
					<img src="/img/banner.png" alt="special offer banner" />
				</div>
				<div class="box">
					<?php echo smarty_function_call_app(array('app'=>'book','method'=>'quick_book_form','param'=>"lang=".($_smarty_tpl->getVariable('lang')->value)),$_smarty_tpl);?>
	
				</div>
			</td>
		</tr>
		<tr>
			<td class="content vtop">
				<?php echo smarty_function_call_app(array('app'=>$_smarty_tpl->getVariable('app')->value,'method'=>$_smarty_tpl->getVariable('method')->value,'param'=>($_smarty_tpl->getVariable('param')->value).",lang=".($_smarty_tpl->getVariable('lang')->value)),$_smarty_tpl);?>

			</td>
			<td class="right-box">
				<?php echo smarty_function_call_app(array('app'=>'contact','method'=>'quick_contact','param'=>"lang=".($_smarty_tpl->getVariable('lang')->value)),$_smarty_tpl);?>

				<div class="box">
					<h1><?php echo $_smarty_tpl->getVariable('trans')->value['weather_info'];?>
</h1>
					<div id="weather" class="weatherFeed"></div>
				</div>
				<div class="box">
					<h1><?php echo $_smarty_tpl->getVariable('trans')->value['exchange_rates'];?>
</h1>
					<div id="exchangeRates"></div>
				</div>
			</td>
		</tr>
	</table>
</div>
<div class="footer">
	<div class="page-body">
		<p><b>Copyright &copy; 2011 Pension Barbora, All rights reserved.</b><br />
		Web Design and Web Development by Petr Babicka & Martin Kolesar | <a href="/project_info.html" target="_blank"><b>more info</b></a></p>
	</div>
</div>
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
<?php echo smarty_function_debug_info(array(),$_smarty_tpl);?>

</div>
</body>
</html>