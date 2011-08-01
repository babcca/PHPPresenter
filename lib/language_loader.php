<?php
	class LanguageLoader {
		private static $translate_table = array();
		public static function load_language($lang, &$table) {
			if (array_key_exists($lang, self::$translate_table)) $table = self::$translate_table[$lang];
			else {
				$lang_file = dirname(__file__).'/../app/index/translate/'.$lang.'.php';
				if (!is_file($lang_file)) return false;
				require_once $lang_file;
				self::$translate_table[$lang] = $ttable;
				$table = self::$translate_table[$lang];
			}
			return true;
		}
	}
?>
