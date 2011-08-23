<html>
<head>
<style>
	label {
		display:inline-block;
		width: 70px;
	}
	.login-form {
		width: 250px;
		margin-left:auto;
		margin-right:auto;
	}
</style>
</head>
<body>
<div class="login-form">
{get_message id='auth_info' timeout=5000}
<form action="" method="post">
<input type="hidden" name="app" value="auth" />
<input type="hidden" name="method" value="login" />
<label>E-mail</label><input type="text" name="email" /><br />
<label>Heslo</label><input type="password" name="password" /><br />
<div style="text-align: right"><input type="submit" value="Login" /></div>	
</form>
</div>
</body>
</html>