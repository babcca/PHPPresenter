<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	require_once dirname(__file__).'/../../lib/uploader.php';
	class gallery extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function generate($text_id) {
			$img = dibi::query("select * from [gallery] right join [page_content] pc on [pc.id] = %i where [pc.id] = %i", $text_id, $text_id)->fetchAll();
			return $this->parse('gallery.tpl', array("images" => $img));
		}
		public function gallery_editor() {
			$img = dibi::query("select * from [gallery]")->fetchAll();
			return $this->parse('gallery_editor.tpl', array("images" => $img));
		}
	}
	
	class gallery_model extends AObject {
		public function __construct() {
			parent::__construct('gallery');
		}
		
		public function upload_image($desc) {
			$uploader = new Uploader('gallery_images', array('jpg', 'bmp', 'jpeg', 'png'));
			$new_name = $uploader->upload('new_image', 'b_none');
			if ($new_name === false) {
				$this->set_message($uploader->error_message, 'gallery_editor');
			} else {
				// vytvorit thumbnail :)
				dibi::query('insert into [gallery] ([small], [big], [desc]) VALUES (%s, %s, %s)', $new_name, $new_name, $desc);
				$this->set_message("Image uploaded", 'gallery_editor');
			}
			
		}
		public function update_desc($image_id, $desc) {
			dibi::query('update [gallery] set [desc] = %s where id = %i', $desc, $image_id);
			return '{ "message" : "Data byla aktualizovana" }';
		}
		
		public function delete_image($image_id) {
			$images = dibi::query('select small, big from [gallery] where id = %i', $image_id)->fetch();
			dibi::query('delete from [gallery] where [id] = %i limit 1', $image_id);
			unlink($_SERVER['DOCUMENT_ROOT'].'/'.$images['big']);
			//foreach ($images as $img) {
			//	unlink($_SERVER['DOCUMENT_ROOT'].'/'.$img);
			//}
		}
	}
	
	function image_preprocess($image_file) {
		return true;
	}
?>