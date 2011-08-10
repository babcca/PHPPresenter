<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class book extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		
		public function book_form($lang, $text_id) {
			// datat struct = array(LANG, OD, DO, HOSTU)
			if (($data = $this->get_message('book/book_form')) != null) {
				$this->assign('default', $data[1]);
			} else {
				$this->assign('default', array("$lang", '', '', '1'));
			}
			$text = dibi::query('select * from [page_content] where [id] = %i', $text_id)->fetch();
			$this->get_translate($lang);
			return $this->parse("book.tpl", $text);
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
		
		public function redirect($lang, $from, $to, $guests) {
			$args = func_get_args();
			$uri = dibi::fetchSingle('select uri from [presenter] where [lang] = %s and [method] = %s', $lang, 'book_form');
			$this->send_message('book/book_form',  $args, __class__);
			// add url maker
			header("Location: ?app=index&method=clanek&id=$uri&lang=$lang#book_form");
			exit(1);	
		}
		
		public function calculate_price($form_data) {
			include "price_list.php";
			$guests_count = 0; 
			$services_price = 0; // celkova cena za sluzby (parkovani, snidane, ...)
			$accomm_price = 0; // celkova cena jenom za ubytovani, bez priplatkovych sluzeb
			$days = strtotime($form_data["date_to"]) - strtotime($form_data["date_from"]);
			$days = $days / 86400; //24*60*60
			foreach ($form_data['rooms'] as $room) {
				if ($room['guests'] == 0) continue;
				$guests_count += $room['guests'];
				// get right table index
				$day_index = min($days, 2) - 1;
				$guest_index = min($room["guests"], 4) - 1; // >= 4 stejan cena
				// person_per_day * person_count * spending_nights
				$accomm_price += $day_tax[$day_index][$guest_index]*$room["guests"]*$days;
				if ($room['parking'] != 'false') $services_price += $parking*$days; // price for parking
			}
			if ($form_data['breakfast'] != 'false') {
				if ($guests_count >= 4) { $services_price += $guests_count*$breakfast*$days; } // price for breakfast
				else { $this->set_message('Breakfast not calculated, less then 4 persons', 'book_price_calculator'); }
			}
			
			if ($form_data['transfer'] != 'false') {
				if ($guests_count >= 4) { $services_price+= ceil($guests_count / 4) * $transport; }// price for transport 
				else { $this->set_message('Transfer not calculated, less then 4 persons', 'book_price_calculator'); }
			}
			
			$return['messages'] = $this->parse('book_price_calculator.tpl');
			$return['accomm_price'] = ceil($accomm_price / $euro);
			$return['services_price'] = ceil($services_price/ $euro);
			$return['result_price'] = ceil(($services_price + $accomm_price) / $euro);
			$this->push(json_encode($return));
		}
		
		
		
		public function calculate2_price($form_data) {
			$return_data = array('sale'=>false, 'price'=>0, 'days'=>0);
			if ((5 - $form_data["guests"]) >= 5) {
				$this->push(json_encode($return_data));
				return;
			}
			
			$price = 0;
			// days count
			
	
			
			// > 7 days => 10% down
			if ($days > 7) {
				$price = 0.9 * $price;
				$return_data['sale'] = true;
			}
			
			
			$return_data['days'] = $days;
			$return_data['guests'] = $form_data['guests'];
			$return_data["price"] = ceil($price / $euro);
			$this->push(json_encode($return_data));
		}
		
		// prepsat hlavicku
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