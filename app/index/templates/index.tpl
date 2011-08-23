<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Petr Babicka" />
	<link rel="stylesheet" type="text/css" href="/css/humanity/jquery-ui-1.8.14.custom.css" />
	<script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="/js/jquery-ui.js" type="text/javascript"></script>
	<title>{$page_title}</title>
</head>
<style>
  body {
  	padding: 0px;
  	margin: 0px;
  	font-family: Arial, Helvetica, sans-serif;
  }
  .page-body {
    margin: auto;
    width: 930px;
    height: 100%;
  }
  
  .label {
    text-align: right;
    padding-left: 15px;
    font-weight: bold;
  }
  
  .value {
    padding-left: 15px;
  }
  
  .user_panel {
    background: #babcca;
    text-align: right;
    margin-bottom: 15px;
  }
  
  .auth-form {
    display: inline-block;
  }
  
  .checkbox {
    display: inline-block;
    width: 150px;
  }
  
  .text-box {
    margin-bottom: 15px;
  }
  .text-box textarea {
    width: 100%;
  }
  .menu {
  	display: inline-block;
  	width: 200px;
  	float: left;
  }
  .right {
 	 width:700px;
 	 display: inline-block;
  }
  #acordion {
  	font-size: 13px;
  }
</style>
<body>
<div class="page-body">
  <div class="user_panel">
    <label>Petr Babicka</label> (<a href="">02154125</a>)    
    <form class="auth-form" action="" method="post">
    <input type="hidden" name="app" value="auth" />
    <input type="hidden" name="method" value="logout" />
    <input type="submit" value="Odhlasit" />
    </form>
  </div> 
  {*call_app app='user' method='user_panel'*}
  {call_app app='menu' method='generate_menu' param="lang=$lang,id=$select_id"}
  <div class="right">{call_app app=$app method=$method param="$param,lang=$lang"}</div> 
  </div>
<div class="debug_panel">
</div>
</body>
</html>