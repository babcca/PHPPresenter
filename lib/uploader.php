<?php

function b_none() { return true; }

class Uploader {
	private $maxSize = 512000; /* maximum file size in bytes */
	private $dest_dir;
	private $alow_ext = array();
	public $error_message = '';
	public function __construct($dest_dir, $alow_ext) {
		$this->dest_dir = $dest_dir;
		$this->alow_ext = $alow_ext;
	}
	
	public function upload($inputName, $upload_preprocess) {
		$file = $_FILES[$inputName];
		if (($this->file_test($file))) {
			if (($ret = $upload_preprocess($file['tmp_name'])) !== true) {
				$this->error_message = $ret;
				return false;
			}
			return $this->file_save($file);
		} else {
			return false;
		}
	}
	
	public function file_test($file) {
		if ($file['error'] != UPLOAD_ERR_OK) {
			$this->error_message = 'File not uploaded to server - errno. '.$file['error'];
			return false;
		}
		
		if (!preg_match('/.+\.([a-z]+)$/', $file['name'], $match)) {
			$this->error_message = 'File have not extension';
			return false;
		}
		$ret = false;
		$this->error_message = 'Bad file extension';
		foreach ($this->alow_ext as $ext) {
			if ($ext == $match[1]) {
				$this->error_message = '';
				$ret = true;
				break;
			} 
		}
		return $ret;
	}
	
	public function file_save($file) {	
		if (!file_exists($this->dest_dir)) {
			$this->error_message = $this->dest_dir.' not found';
			return false;
		}
		$fileName = $this->dest_dir."/".$this->generate_name($file["name"]);
		move_uploaded_file($file["tmp_name"], $fileName);
		return $fileName;
	}
	                  
	public function generate_name($fileName) {
		$ext = strrchr($fileName, '.');
		$prefix = substr($fileName, 0, -strlen($ext));
		$fileName = md5(time().$prefix) . $ext;
		return $fileName;
	}
}
?>