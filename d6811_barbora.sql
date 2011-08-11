-- Adminer 3.2.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `book_customer`;
CREATE TABLE `book_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `book_order`;
CREATE TABLE `book_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `date_from` char(10) COLLATE utf8_bin NOT NULL,
  `date_to` char(10) COLLATE utf8_bin NOT NULL,
  `transfer` char(5) COLLATE utf8_bin NOT NULL,
  `breakfast` char(5) COLLATE utf8_bin NOT NULL,
  `arrival_time` int(11) NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `book_rooms`;
CREATE TABLE `book_rooms` (
  `room_id` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `guests` int(11) NOT NULL,
  `beds_s` int(11) NOT NULL,
  `beds_d` int(11) NOT NULL,
  `parking` char(5) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `contact_contacts`;
CREATE TABLE `contact_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_phone` varchar(16) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(16) COLLATE utf8_bin NOT NULL,
  `fax` varchar(16) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `contact_contacts` (`id`, `mobile_phone`, `telephone`, `fax`, `email`) VALUES
(1,	'+420 777 188 188',	'+420 261 227 635',	'',	'ubytovani@omikron.cz ');

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `small` varchar(100) COLLATE utf8_bin NOT NULL,
  `big` varchar(100) COLLATE utf8_bin NOT NULL,
  `desc` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `gallery` (`id`, `small`, `big`, `desc`) VALUES
(36,	'gallery_images/a3171a2d098f14ceb1f64a65a34e2eef.jpg',	'gallery_images/a3171a2d098f14ceb1f64a65a34e2eef.jpg',	'Popis 9'),
(27,	'gallery_images//759e2caf6fc3bf58d906a3d8538c69fe.jpg',	'gallery_images//759e2caf6fc3bf58d906a3d8538c69fe.jpg',	'Popiska'),
(35,	'gallery_images/70a3bddc8002543a9b77ad12e1f99cf3.jpg',	'gallery_images/70a3bddc8002543a9b77ad12e1f99cf3.jpg',	'popisek 6'),
(34,	'gallery_images/f1f99c0aaf5b3f4c6a9e3a1dcbd2569d.jpg',	'gallery_images/f1f99c0aaf5b3f4c6a9e3a1dcbd2569d.jpg',	'popis 11'),
(32,	'gallery_images/ef5be9d5860f5305a97430d799498ad9.jpg',	'gallery_images/ef5be9d5860f5305a97430d799498ad9.jpg',	'popisek'),
(31,	'gallery_images//6b9d6b441a0e1b7e9de0044433d66c65.jpg',	'gallery_images//6b9d6b441a0e1b7e9de0044433d66c65.jpg',	'popis 13');

DROP TABLE IF EXISTS `page_content`;
CREATE TABLE `page_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `page_content` (`id`, `title`, `text`) VALUES
(1,	'About us',	'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a ipsum augue. Vivamus cursus vulputate mi. Nulla pharetra lectus id libero vehicula vel venenatis magna dictum. Aenean feugiat ligula magna, sit amet suscipit enim. Duis vestibulum nunc vitae lorem egestas feugiat vel at felis. Suspendisse blandit, est id imperdiet venenatis, turpis metus interdum purus, consequat vehicula orci sapien in neque. Praesent vulputate aliquet velit consequat tempor. Praesent feugiat interdum dui, sit amet ornare dui rutrum quis. Mauris hendrerit cursus risus, quis adipiscing ante tristique sit amet. Duis diam felis, consequat eu ornare nec, rhoncus non massa. Duis dui ligula, ornare a faucibus ac, pulvinar sed sapien. Vivamus rhoncus lacinia eros, in accumsan sapien iaculis in. Maecenas sit amet lorem at ipsum tincidunt fringilla.</p>'),
(2,	'Pension location',	'<p>Our Apartments are located in very quiet and natural part of Prague, just 15 minutes from town centre! Very near (about 6 minutes) is Metro station &bdquo;Pražsk&eacute;ho povst&aacute;n&iacute;&ldquo; which is on red line C. Our apartments are also close to other mean of public transport &ndash; Tram. You can use tram to get directly to Charles Bridge (about 12 minutes with Tram) from station Podolsk&aacute; Vod&aacute;rna. So you can choose between two means of public Transport to get into prague centre.</p>\r\n<p>Address: Doudova 22, Prague 4 (6 minutes from Metro station Pražsk&eacute;ho Povst&aacute;n&iacute;)</p>\r\n<p>Some of our guests even wonder if they are really in Prague, but when they see the beautiful view from windows and balcony which is in most of our apartments, they quickly realise how close to the heart of town they are. Directly from most of apartments you can see one of Prague landmarks &ndash; Vy&scaron;ehrad.</p>\r\n<div class=\"page_accordion accordion\">\r\n<h3><a href=\"#\">How to reach us from the Metro station Pražsk&eacute;ho Povst&aacute;n&iacute;?</a></h3>\r\n<div>\r\n<p>zde by měla b&yacute;t mapa cesty na metro (map) + popisek: The way from Metro is very simple. When you arrive at Pražsk&eacute;ho povst&aacute;n&iacute;, come out to the left direction &bdquo;Lomnick&eacute;ho&ldquo; exit. You will see huge CSOB bank in front of you and slightly on the left side, theres a main street tilted down a bit. Follow this street and turn the 3rd street left. Then go stright and you will see our Vila in front of you. Its really simple as you can see on the map. You can also view the map of prague Metro. (odkaz na mapu metra se zakroužkovanou stan&iacute;c&iacute; metra &bdquo;pražsk&eacute;ho povst&aacute;n&iacute;&ldquo;</p>\r\n</div>\r\n<h3><a href=\"#\">How to reach us from the Prague Airport - Ruzyně?</a></h3>\r\n<div>\r\n<p>If you dont use taxi or our transport(hyperlink na str&aacute;nku Apartments, kde budou rozeps&aacute;ny i služby včetně transportu z leti&scaron;tě), you can also use public transport, first you will need to use Bus, and then Metro. The whole way takes about 35 minutes. So first, get on bus 119 which starts in the airport area. Get to station Dejvick&aacute;, there is Metro station on green line &bdquo;A&ldquo;. Then you will need to change for the red line &bdquo;C&ldquo; in station Muzeum. From there just go in direction H&aacute;je to station Pražsk&eacute;ho Povst&aacute;n&iacute; and within few minutes you will reach our Vila. If you use taxi, it should cost about 30&euro; from airport to our Apartments, dont forget to give them our address &ndash; Doudova 22, Praha 4</p>\r\n</div>\r\n<h3><a href=\"#\">How to reach us if you travel by a train?</a></h3>\r\n<div>\r\n<p>Thats really simple, because Prague Main Railway Station (Praha-Hlavn&iacute; N&aacute;draž&iacute;) has its own Metro station which is on the same line (&bdquo;C&ldquo; - red line) as station Pražsk&eacute;ho Povst&aacute;n&iacute;. So only thing that you need to know is that you have to go in the direction H&aacute;je and in about 8 minutes you will be in our Metro station Pražsk&eacute;ho Povst&aacute;n&iacute;. From there its only 6 minutes to our Vila.</p>\r\n</div>\r\n<h3><a href=\"#\">How to reach us if you arrive by a car?</a></h3>\r\n<div>\r\n<p>Well, if you use GPS navigation, its simple &ndash; type in adress &bdquo;Doudova 22, Prague&ldquo;. If you dont, its not simple less. Our Apartments are located just 3 minutes (by car) from Highway 5. Května (D1 Praha &ndash; Brno). The best thing is, that the highway is close, but not close enought to make disturbing noise, also there is a speed limit of 50 km/h. You can see the Highway in</p>\r\n<p>this map (odkaz na malou mapku s metrem + d&aacute;lnic&iacute;)</p>\r\n</div>\r\n<h3><a href=\"#\">How to get into centre?</a></h3>\r\n<div>\r\n<p>There are two very good way how to get into town centre which are fast and comfortable. First one is Metro (station Pražsk&eacute;ho &ndash; 6 minutes from apartments), from there just go to station Museum and you will come out in Venceslav Square in front of National Museum. The second one is Tram (station Podolsk&aacute; Vod&aacute;rna &ndash; 7 minutes form apartments), from there you will have beautiful way next to river Moldau, you will see Prague Castle. The 4th station is called &bdquo;N&aacute;rodn&iacute; divadlo&ldquo;, which in Czech means National Theater, and thats exactly where you will appear. And its just few steps away from Charles Bridge. When you arrive, we will show you the best ways by ourself, so dont worry that you will have any problems getting into centre. Its really easy. During your stay if you get lost, you can simply call our phone number and we will try to help you.</p>\r\n</div>\r\n</div>'),
(3,	'Home',	'home page'),
(5,	'Booking apartments',	'<p>This only <strong>preliminary apartments&nbsp;book</strong>, for complete booking we will contact you by your contact email.&nbsp;In this computed price maybe small different.</p>'),
(6,	'Kontakni informace - Misto pro Vas dotaz',	'Pokud máte jakýkoli dotaz ohledně ubytování ve vile Barbora v Praze, prosím neváhejte nám napsat nebo zatelefonovat. Děkujeme a těšíme se na osobní setkání s vámi.'),
(7,	'Galerie obrazku',	'Vitejte v galerii obrazku'),
(8,	'Home',	'<p>home page :)</p>'),
(9,	'title',	'<p>content</p>'),
(10,	'title',	'<p>content</p>'),
(11,	'title',	'content'),
(12,	'title',	'content2'),
(4,	'Our Apartments',	'<p>apartments description and more more</p>');

DROP TABLE IF EXISTS `presenter`;
CREATE TABLE `presenter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(50) COLLATE utf8_bin NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `lang` varchar(2) COLLATE utf8_bin NOT NULL,
  `app` varchar(50) COLLATE utf8_bin NOT NULL,
  `method` varchar(50) COLLATE utf8_bin NOT NULL,
  `param` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `presenter` (`id`, `uri`, `position`, `title`, `lang`, `app`, `method`, `param`) VALUES
(6,	'gallery',	5,	'Gallery',	'en',	'gallery',	'generate',	'text_id=1'),
(2,	'home',	1,	'Homepage',	'en',	'page',	'show',	'text_id=2'),
(3,	'location',	2,	'Pension location',	'en',	'page',	'show',	'text_id=3'),
(4,	'apartments',	3,	'Apartments',	'en',	'page',	'show',	'text_id=4'),
(5,	'booking',	4,	'Booking apartment',	'en',	'book',	'book_form',	'text_id=5'),
(7,	'contact-us',	6,	'Contact us',	'en',	'contact',	'contact_us',	'text_id=6'),
(9,	'gallery',	5,	'Galerie',	'de',	'gallery',	'generate',	'text_id=7'),
(10,	'homen',	1,	'Homepage',	'de',	'page',	'show',	'text_id=8'),
(11,	'lage',	2,	'Pension Lage',	'de',	'page',	'show',	'text_id=9'),
(12,	'zimmer',	3,	'Zimmer',	'de',	'page',	'show',	'text_id=10'),
(13,	'buchung',	4,	'Buchung Wohnung',	'de',	'book',	'book_form',	'text_id=11'),
(14,	'kontaktieren-uns',	6,	'Kontaktieren Sie uns',	'de',	'contact',	'contact_us',	'text_id=12');

-- 2011-08-11 07:46:48
