<?php
	require_once(dirname(__file__).'/smarty/Smarty.class.php'); 
	
	/**
	 * Interface pro nastavovani hlavicek html dokumentu.
	 * @author Petr Babicka
	 */
	class BHead {
			private $header;
			public function __construct($header) {
				$this->header = $header;
			}	
			public function __set($head, $val) {
			}
	};
	
	/**
	 * Fronta se statickym ulozistem. 
	 * Pouziti pro uchovani vsech dat v ruznych instancich renderu.
	 * @author Petr Babicka
	 *
	 */
	class BQueue {
		private static $queue = array(); /**< Staticke uloziste fronty */
		/**
		 * Ulozeni dat do fronty
		 * 
		 * @param string $str Data
		 */
		public static function push($str) {
			self::$queue[] = $str;
		}
		public static function pop() {
			return array_pop(self::$queue);
		}
		/**
		 * Vypis vsech dat ve fronte, kodovani nastaveno za pomoci hlavicky
		 * 
		 * @param string $charset Kodovani stranky
		 */
		public static function dump($charset) {
			header("Content-type: text/html; charset=$charset"); 
			foreach (self::$queue as $data) { echo $data; }
		}
	};
	
	/**
	 * Potomek Smarty, uklada data do staticke fronty, ktere posleze 
	 * najednou vykresli (vypise). Ruzne instance zdili stejnou frontu.
	 * @author Petr Babicka
	 *
	 */
	class BRender extends Smarty {
		protected static $head;
		public static $debug_data = array();
		private $queue;
		/**
		 * Kontruktor tridy
		 * @param string $app NAzev apliakce
		 */
		public function __construct($app) {
			parent::__construct();
			self::$head = new BHead(array(
				'title' => 'default',
				'encoding' => 'utf-8'				
			));
			
			/** TODO: Inicializace smarty */ 
			$this->template_dir = dirname(__file__).'/../app/'.$app.'/templates';
		}
		public function debug($data) {
			switch (DEBUG_MODE) {
				case 1:
					self::$debug_data[] = $data;
					break;
			}
		}
		public function header($head) {
		
		}
		/**
		 * Zapise template data do fronty.
		 * @param $template Smarty template jako retezec<br>Smarty template soubor
		 * @param $args_array Argumenty pro Smarty templaty
		 */		
		public function write($template, $args_array = array()) {
			BQueue::push($this->parse($template, $args_array));
		}
		/**
		 * Ulozeni dat primo do fronty.
		 * @param string $str
		 */
		public function push($str) {
			BQueue::push($str);
		}
		
		/**
		 * Spusti prasovani templatu a vrati vysledek.
		 * @param string $template Smarty template | Smarty template string
		 * @param array $args_array Smarty template argumenty
		 */
		public function parse($template, $args_array = array()) {
			foreach ($args_array as $k=>$v) {
				$this->assign($k, $v);
			}
			$prefix = preg_match('/.tpl$/', $template) ? 'file:' : 'string:';
			return $this->fetch($prefix.$template);
		}
		
		/**
		 * Prida do templatu translacni tabulku trans, podle zvoleneho jazyka.
		 * @param string $lang
		 */
		public function get_translate($lang) {
			if (LanguageLoader::load_language($lang, $table)) 
				$this->assign('trans', $table);
		}
		
		public function dump() {
			BQueue::dump();
		}
	};
	
	function smarty_function_debug_info() {
		foreach (BRender::$debug_data as $debug_msg) {
			var_dump($debug_msg);
		}
	}
	
	/**
	 * Smarty plugin pro prime volani plikaci a method z templatu
	 * @param array $param('param'=>parametry pro aplikaci oddelene carkou
	 * @param Smarty_template $template
	 * @return Vystup z vybrane aplikace
	 */
	function smarty_function_call_app($param, $template) {
		$params = array();
		if (isset($param['param'])) { 
			$queryParts = explode(',', $param['param']); 
	    	foreach ($queryParts as $p) { 
	    		if ($p == '') continue;
	        	$item = explode('=', $p); 
	        	$params[$item[0]] = $item[1]; 
	    	} 
		}
		return Presenter::$controller->call($param['app'], $param['method'], $params);
	}
	
	function edit_url($url) {
		$url = $_SERVER['REQUEST_URI'];
		$pattern = array('id=%([a-z-.]+)[home]'=>$table[$id[1]][0], 'lang=%{en, de}[en]');
	}
	
	function smarty_function_edit_url($params, $template) {
		if (LanguageLoader::load_language($params['lang'], $table)) {
			$uri = $_SERVER['REQUEST_URI'];
			if (preg_match('#id=(a-z-])+#', $uri, $id)) {
				$uri = preg_replace('#(.+id=)[a-z-]+(.*)#', "$1{$table[$id[1]][0]}$2", $uri);
			} 
			
			if (preg_match('#lang=[a-z]{2}#', $uri)) {
				$uri = preg_replace('#(.+lang=)[a-z]{2}(.*)#', "$1{$params['lang']}$2", $uri);
			} else { $uri .= "&lang={$params['lang']}"; }
			
			return $uri;
		}
	}
	/**
	 * Vypise iformacni zpravy do templatu
	 * @param array $p('id'=>id zpravy, 'timeout'=> pokud nastaven za pomoci JQuery se po uplynuti schova)
	 * @param Smarty_template $t
	 * @return string 
	 */
	function smarty_function_get_message($p, $t) {
		if (isset($_SESSION['__bab_messages'][$p['id']])) {
			$ret = '<div id="info_message">';
			foreach ($_SESSION['__bab_messages'][$p['id']] as $message) {
				$ret .= '<div><img src="/img/warning_icon.png" height="20" width="20" style="float: left; padding-right: 10px;" /><p><b>'.$message.'</b></p></div>';
			}
			$ret .= '</div>';
			if (isset($p['timeout'])) $ret .= '<script>$("#info_message").show("fast").delay('.$p['timeout'].').hide("slow");</script>';	
			unset($_SESSION['__bab_messages'][$p['id']]);
			return $ret;
		}
	}
?>