<?php
class log {
		private static $file = null;
		public static function l($data) {
			if (self::$file == null) {
				self::$file = fopen("logs.html", "a");
			}
			ob_start();
			echo "Log ".date('U');
  			var_dump($data);
  			echo "-----------------";
  			$dump = ob_get_clean();
			fwrite(self::$file, $dump.'<br/>');
		}
		public static function close() {
			fclose(self::$file);
			self::$file = null;
		}
	}
?>