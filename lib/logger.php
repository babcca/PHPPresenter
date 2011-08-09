<?php
class log {
		private static $file = null;
		public static function l($data) {
			if (self::$file == null) {
				self::$file = fopen("logs.html", "a");
			}
			ob_start();
  			var_dump($data);
  			$dump = ob_get_clean();
			fwrite(self::$file, $dump.'<br/>');
		}
		public static function close() {
			fclose(self::$file);
			self::$file = null;
		}
	}
?>