<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class contact extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function quick_contact($lang) {
			$contact = dibi::query("select * from [contact_contacts] where [id]=1")->fetch();
			$this->get_translate($lang);
			return $this->parse("quick_contact.tpl", $contact);
		}
		
		public function contact_us($text_id, $lang) {
			$contact = dibi::query("select * from [contact_contacts] cc inner join [page_content] pc on [pc.id] = %i where [cc.id]=1", $text_id)->fetch();
			$this->get_translate($lang);
			$msgs = $this->get_message('contact'); // get global message (only once)!!
			$this->debug($msgs["contact_model"]); // shit :(
			return $this->parse("contact.tpl", $contact);
		}
	}
	
	class contact_model extends AObject {
		public function __construct() {
			parent::__construct('contact');
		}
		
		public function contact_email($name, $email, $message, $phone) {
			$this->send_message('contact', "$name, $email, $message, $phone", __class__);
			$to = "kolesar.martin@gmail.com";
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
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			//if (mail("$to", "$subject", "$body", "$headers")) {
			//	echo("<p>Message successfully sent!</p>");
			//} else {
			//	echo("<p>Message delivery failed...</p>");
			//}
		}
	}
?>