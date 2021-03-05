-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `long_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_url` varbinary(6) NOT NULL,
  `counter` int(10) unsigned NOT NULL DEFAULT 0,
  `exp_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`short_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `links` (`long_url`, `short_url`, `counter`, `exp_at`, `created_at`) VALUES
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('306533663666'),	14,	'2021-03-02 17:00:00',	'2021-03-05 18:45:37'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('313038363730'),	1,	'2021-03-12 17:00:00',	'2021-03-05 18:45:40'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('333761343336'),	1,	'2021-03-12 17:00:00',	'2021-03-05 19:09:04'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('336638363630'),	0,	'2021-03-12 17:00:00',	'2021-03-05 18:44:46'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('343265646563'),	0,	'2021-03-12 17:00:00',	'2021-03-05 18:45:41'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('376265633262'),	0,	'2021-03-12 17:00:00',	'2021-03-05 18:44:04'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('623730363635'),	0,	'2021-03-12 17:00:00',	'2021-03-05 18:44:48'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('636631383038'),	0,	'2021-03-12 17:00:00',	'2021-03-05 18:44:43'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('653261383736'),	0,	'2021-03-12 17:00:00',	'2021-03-05 18:44:49'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('653961323336'),	0,	'2021-03-12 17:00:00',	'2021-03-05 18:45:25'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('663465303163'),	0,	'2021-03-12 17:00:00',	'2021-03-05 18:45:44'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('663631373966'),	3,	'2021-03-12 17:00:00',	'2021-03-05 18:45:39'),
('https://xdsoft.net/jqplugins/datetimepicker/',	UNHEX('663961623337'),	2,	'2021-03-12 17:00:00',	'2021-03-05 18:44:45');

-- 2021-03-05 20:02:27
