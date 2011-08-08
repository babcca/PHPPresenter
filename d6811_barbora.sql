-- Adminer 3.2.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `clanek`;
CREATE TABLE `clanek` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `str_id` char(100) COLLATE utf8_czech_ci NOT NULL,
  `lang` char(2) COLLATE utf8_czech_ci NOT NULL,
  `template` char(100) COLLATE utf8_czech_ci NOT NULL,
  `content_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1006 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `clanek` (`id`, `str_id`, `lang`, `template`, `content_id`) VALUES
(1000,	'lage',	'de',	'content.tpl',	1),
(1001,	'location',	'en',	'content.tpl',	2),
(1002,	'home',	'en',	'content.tpl',	3),
(1003,	'home',	'de',	'content.tpl',	1),
(1004,	'contact-us',	'en',	'contact.tpl',	1),
(1005,	'gallery',	'en',	'gallery.tpl',	1);

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

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `small` varchar(100) COLLATE utf8_bin NOT NULL,
  `big` varchar(100) COLLATE utf8_bin NOT NULL,
  `desc` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `gallery` (`id`, `small`, `big`, `desc`) VALUES
(26,	'gallery_images//0db31d632f84b5cc330487dae134192b.jpg',	'gallery_images//0db31d632f84b5cc330487dae134192b.jpg',	'popis 7'),
(25,	'gallery_images//adc8091c1ccde17da076c53142c14501.jpg',	'gallery_images//adc8091c1ccde17da076c53142c14501.jpg',	'Popis 5'),
(22,	'gallery_images//e5b2072caf6f08aa9d026bb224a1d2f8.jpg',	'gallery_images//e5b2072caf6f08aa9d026bb224a1d2f8.jpg',	'Popis 2'),
(23,	'gallery_images//74b1dd58af8d8908c791aa4cf3d808db.jpg',	'gallery_images//74b1dd58af8d8908c791aa4cf3d808db.jpg',	'Popis 3'),
(24,	'gallery_images//9e8bafd522d3de5fef857a0be6971c23.jpg',	'gallery_images//9e8bafd522d3de5fef857a0be6971c23.jpg',	'Popis 4'),
(21,	'gallery_images//f3b5a8d9bd09dd1ec693ddddfd1f21b5.jpg',	'gallery_images//f3b5a8d9bd09dd1ec693ddddfd1f21b5.jpg',	'Popis 1'),
(27,	'gallery_images//759e2caf6fc3bf58d906a3d8538c69fe.jpg',	'gallery_images//759e2caf6fc3bf58d906a3d8538c69fe.jpg',	'Popis 8'),
(28,	'gallery_images//9d28cb20ed4ae0e31ab7411ecdd53c36.jpg',	'gallery_images//9d28cb20ed4ae0e31ab7411ecdd53c36.jpg',	'popis 9'),
(29,	'gallery_images//4b9c89babbbf164e99528c2019cefe47.jpg',	'gallery_images//4b9c89babbbf164e99528c2019cefe47.jpg',	'popis 10'),
(30,	'gallery_images//61d952211151f92070cbbcc546b6000b.jpg',	'gallery_images//61d952211151f92070cbbcc546b6000b.jpg',	'popis 12'),
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
(2,	'O nas',	'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a ipsum augue. Vivamus cursus vulputate mi. Nulla pharetra lectus id libero vehicula vel venenatis magna dictum. Aenean feugiat ligula magna, sit amet suscipit enim. Duis vestibulum nunc vitae lorem egestas feugiat vel at felis. Suspendisse blandit, est id imperdiet venenatis, turpis metus interdum purus, consequat vehicula orci sapien in neque. Praesent vulputate aliquet velit consequat tempor. Praesent feugiat interdum dui, sit amet ornare dui rutrum quis. Mauris hendrerit cursus risus, quis adipiscing ante tristique sit amet. Duis diam felis, consequat eu ornare nec, rhoncus non massa. Duis dui ligula, ornare a faucibus ac, pulvinar sed sapien. Vivamus rhoncus lacinia eros, in accumsan sapien iaculis in. Maecenas sit amet lorem at ipsum tincidunt fringilla.</p>\r\n<p>Aenean euismod diam ut tortor scelerisque dapibus. Duis porta porta ligula, eu aliquet erat commodo ac. Donec et tortor tortor, eu tincidunt urna. Sed malesuada rutrum venenatis. Fusce erat erat, posuere in vulputate fermentum, cursus ut tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse malesuada nunc in massa tincidunt interdum. Pellentesque a ligula dui. Etiam nec enim orci, vitae pulvinar dui. Pellentesque laoreet ullamcorper libero nec tincidunt. Proin hendrerit consectetur elit a vestibulum. Proin aliquet, orci eget consectetur adipiscing, sem quam facilisis eros, et pellentesque massa nulla quis urna. Maecenas tempus suscipit leo mollis dapibus. Nulla ut odio vel nunc euismod pharetra sit amet et tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'),
(3,	'Home',	'home page'),
(5,	'Gallerie obrazku',	'Uvodni text k galerii obrazku'),
(6,	'Kontakni informace - Misto pro Vas dotaz',	'Pokud máte jakýkoli dotaz ohledně ubytování ve vile Barbora v Praze, prosím neváhejte nám napsat nebo zatelefonovat. Děkujeme a těšíme se na osobní setkání s vámi.'),
(7,	'Galerie obrazku',	'Vitejte v galerii obrazku'),
(8,	'Home',	'home page'),
(9,	'title',	'<p>content2222</p>'),
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

-- 2011-08-08 04:07:59
