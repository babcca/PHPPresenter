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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `gallery` (`id`, `small`, `big`, `desc`) VALUES
(3,	'/gallery_images/1.jpg',	'/gallery_images/1.jpg',	'popis obrazku'),
(5,	'/gallery_images/2.jpg',	'/gallery_images/2.jpg',	'popis obrazku'),
(6,	'/gallery_images/3.jpg',	'/gallery_images/3.jpg',	'popis obrazku'),
(7,	'/gallery_images/4.jpg',	'/gallery_images/4.jpg',	'popis obrazku'),
(8,	'/gallery_images/5.jpg',	'/gallery_images/5.jpg',	'popis obrazku');

DROP TABLE IF EXISTS `page_content`;
CREATE TABLE `page_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `page_content` (`id`, `title`, `text`) VALUES
(1,	'About us',	'<p> \nLorem ipsum dolor sit amet, consectetur adipiscing elit. In a ipsum augue. Vivamus cursus vulputate mi. Nulla pharetra lectus id libero vehicula vel venenatis magna dictum. Aenean feugiat ligula magna, sit amet suscipit enim. Duis vestibulum nunc vitae lorem egestas feugiat vel at felis. Suspendisse blandit, est id imperdiet venenatis, turpis metus interdum purus, consequat vehicula orci sapien in neque. Praesent vulputate aliquet velit consequat tempor. Praesent feugiat interdum dui, sit amet ornare dui rutrum quis. Mauris hendrerit cursus risus, quis adipiscing ante tristique sit amet. Duis diam felis, consequat eu ornare nec, rhoncus non massa. Duis dui ligula, ornare a faucibus ac, pulvinar sed sapien. Vivamus rhoncus lacinia eros, in accumsan sapien iaculis in. Maecenas sit amet lorem at ipsum tincidunt fringilla.\n</p> \n<p> \nAenean euismod diam ut tortor scelerisque dapibus. Duis porta porta ligula, eu aliquet erat commodo ac. Donec et tortor tortor, eu tincidunt urna. Sed malesuada rutrum venenatis. Fusce erat erat, posuere in vulputate fermentum, cursus ut tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse malesuada nunc in massa tincidunt interdum. Pellentesque a ligula dui. Etiam nec enim orci, vitae pulvinar dui. Pellentesque laoreet ullamcorper libero nec tincidunt. Proin hendrerit consectetur elit a vestibulum. Proin aliquet, orci eget consectetur adipiscing, sem quam facilisis eros, et pellentesque massa nulla quis urna. Maecenas tempus suscipit leo mollis dapibus. Nulla ut odio vel nunc euismod pharetra sit amet et tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\n</p>'),
(2,	'O nas',	'<p> \nLorem ipsum dolor sit amet, consectetur adipiscing elit. In a ipsum augue. Vivamus cursus vulputate mi. Nulla pharetra lectus id libero vehicula vel venenatis magna dictum. Aenean feugiat ligula magna, sit amet suscipit enim. Duis vestibulum nunc vitae lorem egestas feugiat vel at felis. Suspendisse blandit, est id imperdiet venenatis, turpis metus interdum purus, consequat vehicula orci sapien in neque. Praesent vulputate aliquet velit consequat tempor. Praesent feugiat interdum dui, sit amet ornare dui rutrum quis. Mauris hendrerit cursus risus, quis adipiscing ante tristique sit amet. Duis diam felis, consequat eu ornare nec, rhoncus non massa. Duis dui ligula, ornare a faucibus ac, pulvinar sed sapien. Vivamus rhoncus lacinia eros, in accumsan sapien iaculis in. Maecenas sit amet lorem at ipsum tincidunt fringilla.\n</p> \n<p> \nAenean euismod diam ut tortor scelerisque dapibus. Duis porta porta ligula, eu aliquet erat commodo ac. Donec et tortor tortor, eu tincidunt urna. Sed malesuada rutrum venenatis. Fusce erat erat, posuere in vulputate fermentum, cursus ut tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse malesuada nunc in massa tincidunt interdum. Pellentesque a ligula dui. Etiam nec enim orci, vitae pulvinar dui. Pellentesque laoreet ullamcorper libero nec tincidunt. Proin hendrerit consectetur elit a vestibulum. Proin aliquet, orci eget consectetur adipiscing, sem quam facilisis eros, et pellentesque massa nulla quis urna. Maecenas tempus suscipit leo mollis dapibus. Nulla ut odio vel nunc euismod pharetra sit amet et tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\n</p>'),
(3,	'Home',	'home page'),
(5,	'Gallerie obrazku',	'Uvodni text k galerii obrazku'),
(6,	'Kontakni informace - Misto pro Vas dotaz',	'Pokud máte jakýkoli dotaz ohledně ubytování ve vile Barbora v Praze, prosím neváhejte nám napsat nebo zatelefonovat. Děkujeme a těšíme se na osobní setkání s vámi.'),
(7,	'Galerie obrazku',	'Vitejte v galerii obrazku');

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
(6,	'gallery',	5,	'Gallery',	'en',	'gallery',	'generate',	'text_id=7'),
(2,	'home',	1,	'Homepage',	'en',	'page',	'show',	'text_id=1'),
(3,	'location',	2,	'Pension location',	'en',	'page',	'show',	'text_id=2'),
(4,	'apartments',	3,	'Apartments',	'en',	'page',	'show',	'text_id=3'),
(5,	'booking',	4,	'Booking apartment',	'en',	'book',	'book_form',	''),
(7,	'contact-us',	6,	'Contact us',	'en',	'contact',	'contact_us',	'text_id=6'),
(9,	'gallery',	5,	'Galerie',	'de',	'gallery',	'generate',	'text_id=7'),
(10,	'homen',	1,	'Homepage',	'de',	'page',	'show',	'text_id=1'),
(11,	'lage',	2,	'Pension Lage',	'de',	'page',	'show',	'text_id=2'),
(12,	'zimmer',	3,	'Zimmer',	'de',	'page',	'show',	'text_id=3'),
(13,	'buchung',	4,	'Buchung Wohnung',	'de',	'book',	'book_form',	''),
(14,	'kontaktieren-uns',	6,	'Kontaktieren Sie uns',	'de',	'contact',	'contact_us',	'text_id=6');

-- 2011-07-29 05:17:25
