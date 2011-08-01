<?php
	class url {
		public $part = array();
		public function make($url) {
			list($a, $b) = explode('|', $url);
			$this->param = explode('/', $a);
			$this->opt_param = explode('/', $b);
		}
		
		public function cmp($url) {
			$p = explode('/', $url);
			var_dump(array_zip_with($this->part, $p, 'fn'));
		}
	}
	function fn($pattern, $value) {
		echo check_param($value, $pattern);
		
	}
	function check_param($param, $pattern) {
		if (preg_match("&^%\{((\w+)((, ?\w+)*))\}&", $pattern, $enum)) {
			return array_search($param, explode(",", $enum[1])) !== false;
		} else if (preg_match("&^%<(.*)>&", $pattern, $fn)) {
			return $fn[1]($param) == true;
		} else if (preg_match("&^%\((.*)\)&", $pattern, $regexp)) {
			return preg_match("&^{$regexp[1]}$&", $param) == true;
		} else return false;
	}
	function array_zip_with(array $array1, array $array2, $fn) {
		$size = min(count($array1), count($array2));
		$out = array();
		for ($i = 0; $i < $size; ++$i) {
			$out[] = $fn($array1[$i], $array2[$i]);
		}
		return $out;
	}

	function run() {
		$url2 = 'en/home/?offset=12&start=12';
		$url_p = '%{en,de}[en]/%([a-z-.]+)[home]/offset=%([0-9])/start=%([0-9])';
		$url_part = explode("/", $url);
		$pat = explode('/', $url_p);
	}
	$url = 'en/about-us';
	$url_p = '%{en,de}[en]/%([a-z-.]+)[home]|offset=%([0-9])[0]/start=%([0-9])[1]';
	$u = new url();
	$u->make($url_p);
	$u->cmp($url);
	