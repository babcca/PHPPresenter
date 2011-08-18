<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class contact extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function quick_contact($lang) {
			//$contact = dibi::query("select * from [contact_contacts] where [id]=1")->fetch();
			include 'contact_table.php';
			$this->get_translate($lang);
			return $this->parse("quick_contact.tpl", $contact_table);
		}
		
		public function contact_us($text_id, $lang) {
			$data['text'] = dibi::query("select * from [page_content] where [id]=%i", $text_id)->fetch();
			include 'contact_table.php';
			$data['contact'] = $contact_table;
			$this->get_translate($lang);
			return $this->parse("contact.tpl", $data);
		}
		
		public function contact_editor() {
			$data['contact_table'] = file_get_contents(dirname(__file__).'/contact_table.php');
			return $this->parse("contact_editor.tpl", $data);
		}
	}
	
	class contact_model extends AObject {
		public function __construct() {
			parent::__construct('contact');
		}
		
		public function contact_update($new_table) {
			if (file_put_contents(dirname(__file__).'/contact_table.php', $new_table) === false)
				$this->set_message('Data nebyla aktualizovana', 'contact_editor');
			else 
				$this->set_message('Data byla aktualizovana', 'contact_editor');
		}
		
		public function contact_email($name, $email, $message, $phone) {
			$to = "info@apartments-barbora.com";
			$subject = "NO-REPLY | Apartments Barbora - Quick Contact Message";
			$body = '<html>
						<head> </head>
						<body>
							This email was sent via quick contact form from website www.apartments-barbora.com. <br />
							<p>Original message:</p>
							<p>Name: <b>' . "$name" . '</b><br />
							Email: <b>' . "$email" . '</b><br />
							Phone: <b>' . "$phone" . '</b><br />
							Message: <b>' . htmlspecialchars($message) . '</b></p>
						</body>
					</html>';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			
			if (mail("$to", "$subject", "$body", "$headers")) {
				$this->set_message("Message successfully sent!", 'contact');
			} else {
				$this->set_message("Message delivery failed...", 'contact');
			}
		}
	}
?>