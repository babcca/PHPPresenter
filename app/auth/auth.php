<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class auth extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function login($uri) {
			if (!isset($_SESSION['__bab_login']) || ($_SESSION['__bab_login'] === false)) return $this->parse("login.tpl");
			else {
				header('location: http://'.$_SERVER['SERVER_NAME'].$uri);
				exit;
			}
		}
	}
	
	class auth_model extends AObject {
		private $timeout = 60;
		public function __construct() {
			parent::__construct('auth');
			if (!isset($_SESSION['__bab_login'])) { $_SESSION['__bab_login'] = false; $_SESSION['__bab_login_timeout'] = 0; }
		}
		
		public function login($email, $passw) {
			$pass = dibi::query('select passw from users where [email] = %s limit 1', $email)->fetch();
			if (($pass == false) || ($pass['passw'] != md5($passw))) {
				$this->set_message('Spatne prihlasovaci udaje', 'auth_info');
			} else {
				session_regenerate_id(true);
				$_SESSION['__bab_login'] = true;
				$_SESSION['__bab_login_timeout'] = time() + $this->timeout;
				$this->set_message('Byly jste prihlaseni', 'auth_info');
			}
		}
		
		public function is_logged() {
			if ($_SESSION['__bab_login'] === true) {
				if ($_SESSION['__bab_login_timeout'] > time()) $_SESSION['__bab_login_timeout'] = time() + $this->timeout;
				else {
					$this->set_message('Vyprsel timeout pro prihlaseni', 'auth_info');
					$this->logout();
				}
			}
			return $_SESSION['__bab_login'];
		}
		public function logout() {
			$_SESSION['__bab_login'] = false;
			$this->set_message('Byly jste odhlaseni', 'auth_info');
		}
	}
?>