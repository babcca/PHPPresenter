<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class book extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		
		public function book_form($lang) {
			if (($data = $this->get_message('book/book_form')) != null) {
				$this->debug($data);
				$this->assign('data', $data[1]);
			}
			$this->get_translate($lang);
			return $this->parse("book.tpl");
		}
		public function quick_book_form($lang) {
			$this->get_translate($lang);
			return $this->parse("quick_book.tpl", array('lang'=>$lang));
		}
	}
	
	class book_model extends AObject {	
		public function __construct() {
			parent::__construct('book');
		}	
		
		public function redirect($lang, $from, $to, $rooms, $guests) {
			$args = func_get_args();
			$uri = dibi::fetchSingle('select uri from [presenter] where [lang] = %s and [method] = %s', $lang, 'book_form');
			$this->send_message('book/book_form',  $args, __class__);
			// add url maker
			header("Location: ?app=index&method=clanek&id=$uri&lang=$lang#book_form");
			exit(1);	
		}
		
		public function book_email($date_from, $date_to, $guests, $rooms, $beds_s, $beds_d, $parking, $transfer, $time, $name, $email, $phone, $message) {
			$this->send_message('book', "$date_from, $date_to, $guests, $rooms, $beds_s, $beds_d, $parking, $transfer, $time, $name, $email, $phone, $message", __class__);		
			$to = "kolesar.martin@gmail.com";
			$subject = "NO-REPLY | Apartments Barbora - Reservation request";
			$body = '<html>
						<head> </head>
						<body>
							This email was sent via booking form from website www.apartments-barbora.com. <br />
							<p>Original message:</p>
							<p>Guest informations:</p>
							<p>Name: <b>' . "$name" . '</b><br />
							Email: <b>' . "$email" . '</b><br />
							Phone: <b>' . "$phone" . '</b>
							<p>Reservation informations:</p>
							<p>Check-in date: <b>' . "$date_from" . '</b><br/ >
							Check-out date: <b>' . "$date_to" . '</b><br/ >
							Guests: <b>' . "$guests" . '</b><br/ >
							Rooms: <b>' . "$rooms" . '</b><br/ >
							Single beds: <b>' . "$beds_s" . '</b><br/ >
							Double beds: <b>' . "$beds_d" . '</b><br/ >
							Parking: <b>' . "$parking" . '</b><br/ >
							Transfer from airport: <b>' . "$transfer" . '</b><br/ >
							Check-in time: <b>' . "$time" . '</b><br/ >
							Notes: <b>' . htmlspecialchars($message) . '</b></p>
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