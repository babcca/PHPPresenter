<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/js/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>	
	<link rel="stylesheet" type="text/css" href="/css/humanity/jquery-ui-1.8.14.custom.css" />
<style>
	.left {
		width: 200px;
		display: inline-block;
		float: left;
	}
	.right {
		display: inline-block;
		width: 650px;
	}
	.page_editor input, textarea {
		width: 100%;
		height: auto;
	}
	#info_message {
		background-color: #babcca;
		height: 30px;
	}
</style>
</head>
<body>
<script>
function send_data_get_message(data) {
	$.post("ajax.php", data, function (info) { 
		$("#info-message").html("<p>"+info.message+"</p>").show('fast').delay(5000).hide('slow');
	}, 'json' );
}


$(document).ready(function () {
	$("#info-message").hide();
	$('textarea.page_content').tinymce({
	    // Location of TinyMCE script
	    script_url : '/js/tiny_mce/tiny_mce.js',
	    language: 'cs',

	    // General options
	    theme : "advanced",
	    plugins : "autolink,lists,style,layer,save,advhr,advimage,advlink,inlinepopups,preview,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking",
	    
	    // Theme options
	    theme_advanced_buttons1 : "save,|,bold,italic,underline,|,|,bullist,numlist,|,paste,pastetext,pasteword,|,styleselect,formatselect,fontselect,fontsizeselect",
	    theme_advanced_buttons2 : "link,unlink,|,image,preview,|,search,replace,|,forecolor,backcolor,|,fullscreen,code",
	    theme_advanced_buttons3 : "",
	    theme_advanced_toolbar_location : "top",
	    theme_advanced_toolbar_align : "left",
	    content_css : "/css/tinymce.css",
	    theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
	    font_size_style_values : "10px,12px,13px,14px,16px,18px,20px",
	    theme_advanced_blockformats : "p,div,h1,h2,h3",
	    convert_urls : false
	 });
} );
</script>
<div class="left menu">
	{get_message id='auth_info' timeout=5000}
	<form action="" method="post">
		<input type="hidden" name="app" value="auth" />
		<input type="hidden" name="method" value="logout" />
		<input type="submit" value="logout" />
	</form> 
	<h1>Menu</h1>
	<ol>
		<li><a href="?app=index&method=admin">Obsah stranek</a></li>
		<li><a href="?app=index&method=admin&p1=gallery&p2=gallery_editor">Galerie</a></li>
		<li><a href="?app=index&method=admin&p1=contact&p2=contact_editor">Kontaktni informace</a></li>
		<li><a href="?app=index&method=admin&p1=book&p2=book_editor">Rezervacni system</a></li>
		<li><a href="?app=index&method=admin&p1=index&p2=index_editor">SEO optimalizace</a></li>
	</ol>
</div>
<div class="right content">
	<div id="info-message"></div>
	{call_app app=$p1 method=$p2}
</div>
</body>
</html>