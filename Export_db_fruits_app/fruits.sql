-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 10, 2023 la 09:19 AM
-- Versiune server: 10.4.27-MariaDB
-- Versiune PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `fruits`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230406205128', '2023-04-06 20:51:38', 84);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `email_queue`
--

CREATE TABLE `email_queue` (
  `id` int(11) NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `email_to` varchar(255) NOT NULL,
  `email_cc` varchar(255) DEFAULT NULL,
  `email_bcc` varchar(255) DEFAULT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_content` varchar(2500) DEFAULT NULL,
  `email_has_attach` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_sent` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `email_queue`
--

INSERT INTO `email_queue` (`id`, `email_from`, `email_to`, `email_cc`, `email_bcc`, `email_subject`, `email_content`, `email_has_attach`, `status`, `date_added`, `date_sent`, `user_id`) VALUES
(1, 'test@localhost.ro', 'alexdoobre93@gmail.com', NULL, NULL, 'tes', 'test', NULL, 1, '0000-00-00 00:00:00', '2023-04-09 12:45:24', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `family`
--

CREATE TABLE `family` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `family`
--

INSERT INTO `family` (`id`, `name`) VALUES
(1, 'Rosaceae'),
(2, 'Lauraceae'),
(3, 'Musaceae'),
(4, 'Ericaceae'),
(5, 'Cactaceae'),
(6, 'Malvaceae'),
(7, 'Myrtaceae'),
(8, 'Moraceae'),
(9, 'Grossulariaceae'),
(10, 'Vitaceae'),
(11, 'Actinidiaceae'),
(12, 'Rutaceae'),
(13, 'Sapindaceae'),
(14, 'Anacardiaceae'),
(15, 'Cucurbitaceae'),
(16, 'Caricaceae'),
(17, 'Passifloraceae'),
(18, 'Ebenaceae'),
(19, 'Bromeliaceae'),
(20, 'Lythraceae'),
(21, 'Solanaceae');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `favorite_fruits`
--

CREATE TABLE `favorite_fruits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fruit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `favorite_fruits`
--

INSERT INTO `favorite_fruits` (`id`, `user_id`, `fruit_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(14, 6, 23),
(17, 6, 9),
(18, 6, 10),
(20, 6, 37),
(21, 6, 65),
(22, 6, 66),
(30, 6, 71),
(36, 6, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `family_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `genus_id` int(11) DEFAULT NULL,
  `fruit_id` int(11) DEFAULT NULL,
  `nutrition_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `fruits`
--

INSERT INTO `fruits` (`id`, `name`, `family_id`, `order_id`, `genus_id`, `fruit_id`, `nutrition_id`) VALUES
(1, 'Apple', 1, 1, 1, 6, 1),
(2, 'Apricot', 1, 1, 2, 35, 2),
(3, 'Avocado', 2, 2, 3, 84, 3),
(4, 'Banana', 3, 3, 4, 1, 4),
(5, 'Blackberry', 1, 1, 5, 64, 5),
(6, 'Blueberry', 1, 1, 6, 33, 6),
(7, 'Cherry', 1, 1, 2, 9, 7),
(8, 'Cranberry', 4, 4, 7, 87, 8),
(9, 'Dragonfruit', 5, 5, 8, 80, 9),
(10, 'Durian', 6, 6, 9, 60, 10),
(11, 'Feijoa', 7, 7, 10, 76, 11),
(12, 'Fig', 8, 1, 11, 68, 12),
(13, 'Gooseberry', 9, 8, 12, 69, 13),
(14, 'Grape', 10, 9, 13, 81, 14),
(15, 'GreenApple', 1, 1, 1, 72, 15),
(16, 'Guava', 7, 10, 14, 37, 16),
(17, 'Kiwi', 11, 11, 15, 66, 17),
(18, 'Kiwifruit', 11, 4, 16, 85, 18),
(19, 'Lemon', 12, 12, 17, 26, 19),
(20, 'Lime', 12, 12, 17, 44, 20),
(21, 'Lingonberry', 4, 4, 7, 65, 21),
(22, 'Lychee', 13, 12, 18, 67, 22),
(23, 'Mango', 14, 12, 19, 27, 23),
(24, 'Melon', 15, 13, 20, 41, 24),
(25, 'Morus', 8, 1, 21, 82, 25),
(26, 'Orange', 12, 12, 17, 2, 26),
(27, 'Papaya', 16, 14, 22, 42, 27),
(28, 'Passionfruit', 17, 15, 23, 70, 28),
(29, 'Peach', 1, 1, 2, 86, 29),
(30, 'Pear', 1, 1, 24, 4, 30),
(31, 'Persimmon', 18, 1, 25, 52, 31),
(32, 'Pineapple', 19, 16, 26, 10, 32),
(33, 'Pitahaya', 5, 5, 27, 78, 33),
(34, 'Plum', 1, 1, 2, 71, 34),
(35, 'Pomegranate', 20, 10, 28, 79, 35),
(36, 'Raspberry', 1, 1, 5, 23, 36),
(37, 'Strawberry', 1, 1, 6, 3, 37),
(38, 'Tangerine', 12, 12, 17, 77, 38),
(39, 'Tomato', 21, 17, 29, 5, 39),
(40, 'Watermelon', 15, 18, 30, 25, 40);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `genus`
--

CREATE TABLE `genus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `genus`
--

INSERT INTO `genus` (`id`, `name`) VALUES
(1, 'Malus'),
(2, 'Prunus'),
(3, 'Persea'),
(4, 'Musa'),
(5, 'Rubus'),
(6, 'Fragaria'),
(7, 'Vaccinium'),
(8, 'Selenicereus'),
(9, 'Durio'),
(10, 'Sellowiana'),
(11, 'Ficus'),
(12, 'Ribes'),
(13, 'Vitis'),
(14, 'Psidium'),
(15, 'Apteryx'),
(16, 'Actinidia'),
(17, 'Citrus'),
(18, 'Litchi'),
(19, 'Mangifera'),
(20, 'Cucumis'),
(21, 'Morus'),
(22, 'Carica'),
(23, 'Passiflora'),
(24, 'Pyrus'),
(25, 'Diospyros'),
(26, 'Ananas'),
(27, 'Cactaceae'),
(28, 'Punica'),
(29, 'Solanum'),
(30, 'Citrullus');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `jobs_app`
--

CREATE TABLE `jobs_app` (
  `id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `jobs_app`
--

INSERT INTO `jobs_app` (`id`, `job_name`, `description`) VALUES
(1, 'app:fetch:fruits', 'Fetch Fruits from https://fruityvice.com/');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `no_fruits_insert` int(11) NOT NULL,
  `no_fruits_updated` int(11) NOT NULL,
  `notification_mail_sent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `no_family_insert` int(11) DEFAULT NULL,
  `no_family_updated` int(11) DEFAULT NULL,
  `no_genus_insert` int(11) DEFAULT NULL,
  `no_genus_updated` int(11) DEFAULT NULL,
  `no_order_insert` int(11) DEFAULT NULL,
  `no_order_updated` int(11) DEFAULT NULL,
  `no_nutrition_insert` int(11) DEFAULT NULL,
  `no_nutrition_update` int(11) DEFAULT NULL,
  `error_message` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `log`
--

INSERT INTO `log` (`id`, `date`, `no_fruits_insert`, `no_fruits_updated`, `notification_mail_sent`, `status`, `no_family_insert`, `no_family_updated`, `no_genus_insert`, `no_genus_updated`, `no_order_insert`, `no_order_updated`, `no_nutrition_insert`, `no_nutrition_update`, `error_message`) VALUES
(1, '2023-04-06 23:48:57', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2023-04-06 23:57:50', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2023-04-06 23:58:11', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2023-04-07 00:06:50', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2023-04-07 00:12:53', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2023-04-07 00:15:04', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2023-04-07 00:31:28', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2023-04-07 00:31:57', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2023-04-07 06:38:22', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2023-04-07 06:49:06', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2023-04-07 06:52:08', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2023-04-07 06:52:41', 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2023-04-07 10:23:21', 0, 40, 0, 1, 0, 40, 0, 40, 0, 40, 0, 40, '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:4:\\\"test\\\";i:1;s:5:\\\"utf-8\\\";i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:17:\\\"test@localhost.ro\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"alexdoobre93@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:3:\\\"tes\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-04-09 12:43:44', '2023-04-09 12:43:44', NULL),
(2, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:4:\\\"test\\\";i:1;s:5:\\\"utf-8\\\";i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:17:\\\"test@localhost.ro\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"alexdoobre93@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:3:\\\"tes\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-04-09 12:45:24', '2023-04-09 12:45:24', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `nutritions`
--

CREATE TABLE `nutritions` (
  `id` int(11) NOT NULL,
  `carbohydrates` decimal(4,0) DEFAULT NULL,
  `protein` decimal(4,0) DEFAULT NULL,
  `fat` decimal(4,0) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `sugar` decimal(4,0) DEFAULT NULL,
  `fruit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `nutritions`
--

INSERT INTO `nutritions` (`id`, `carbohydrates`, `protein`, `fat`, `calories`, `sugar`, `fruit_id`) VALUES
(1, '11', '0', '0', 52, '10', 6),
(2, '4', '1', '0', 15, '3', 35),
(3, '9', '2', '15', 160, '1', 84),
(4, '22', '1', '0', 96, '17', 1),
(5, '9', '1', '0', 40, '5', 64),
(6, '6', '0', '0', 29, '5', 33),
(7, '12', '1', '0', 50, '8', 9),
(8, '12', '0', '0', 46, '4', 87),
(9, '9', '9', '2', 60, '8', 80),
(10, '27', '2', '5', 147, '7', 60),
(11, '8', '1', '0', 44, '3', 76),
(12, '19', '1', '0', 74, '16', 68),
(13, '10', '1', '1', 44, '0', 69),
(14, '18', '1', '0', 69, '16', 81),
(15, '3', '0', '0', 21, '6', 72),
(16, '14', '3', '1', 68, '9', 37),
(17, '15', '1', '1', 61, '9', 66),
(18, '15', '1', '1', 61, '9', 85),
(19, '9', '1', '0', 29, '3', 26),
(20, '8', '0', '0', 25, '2', 44),
(21, '11', '1', '0', 50, '6', 65),
(22, '17', '1', '0', 66, '15', 67),
(23, '15', '1', '0', 60, '14', 27),
(24, '8', '0', '0', 34, '8', 41),
(25, '10', '1', '0', 43, '8', 82),
(26, '8', '1', '0', 43, '8', 2),
(27, '11', '0', '0', 43, '1', 42),
(28, '22', '2', '1', 97, '11', 70),
(29, '10', '1', '0', 39, '8', 86),
(30, '15', '0', '0', 57, '10', 4),
(31, '18', '0', '0', 81, '18', 52),
(32, '13', '1', '0', 50, '10', 10),
(33, '7', '1', '0', 36, '3', 78),
(34, '11', '1', '0', 46, '10', 71),
(35, '19', '2', '1', 83, '14', 79),
(36, '12', '1', '1', 53, '4', 23),
(37, '6', '1', '0', 29, '5', 3),
(38, '8', '0', '0', 45, '9', 77),
(39, '4', '1', '0', 74, '3', 5),
(40, '8', '1', '0', 30, '6', 25);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `orders`
--

INSERT INTO `orders` (`id`, `name`) VALUES
(1, 'Rosales'),
(2, 'Laurales'),
(3, 'Zingiberales'),
(4, 'Ericales'),
(5, 'Caryophyllales'),
(6, 'Malvales'),
(7, 'Myrtoideae'),
(8, 'Saxifragales'),
(9, 'Vitales'),
(10, 'Myrtales'),
(11, 'Struthioniformes'),
(12, 'Sapindales'),
(13, 'Cucurbitaceae'),
(14, 'Caricacea'),
(15, 'Malpighiales'),
(16, 'Poales'),
(17, 'Solanales'),
(18, 'Cucurbitales');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `status`
--

INSERT INTO `status` (`id`, `description`) VALUES
(1, 'SUCCES'),
(2, 'ERROR API'),
(3, 'ERROR FETCH FRUITS');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `notification_alert` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `active`, `notification_alert`, `password`) VALUES
(1, 'tesat', 'teste', 'test', 'alexdoobre93@gmail.com', 1, 0, '$2y$12$vUtxiOUeigFTFdZF5ZLqGeHvV.xW8IOQIm5lp9OotZYziDBMOLBPW'),
(2, 'tesat', 'teste', 'test', 'alexdoobre93@gmail.com', 1, 0, '$2y$12$uloMVzjWwTCDp7nfCPgidOeTsoyqRwvUFqoSHJcyLkaYctv2IPTWi'),
(3, 'tesat', 'teste', 'test', 'alexdoobre93@gmail.com', 1, 0, '$2y$12$zbay0CHmLXKzrv4XT.ok4.ebPzLkzYE4hlOt46c9hysfBwNkHoK5K'),
(4, 'tesat', 'teste', 'test', 'alexdoobre93@gmail.com', 1, 0, '$2y$12$cSNRA3VSxAe4CUtsx.e/NO6599bLhrJadp9zahbD3lLa..9.SdpwS'),
(5, 'Alexandru', 'Dobre', 'test', 'alexdoobre93@gmail.com', 1, 0, '$2y$12$YgXcLr7SObj4sQwbBkWBXeE5pRLbTeqdtmQdqajG5LE0t1FkU7pLO'),
(6, 'testdsads', 'test222', 'test123', 'test@gmfsafdsasdaafaail.com', 1, 1, '$2y$12$Me/bWZN6EcP9yxEfJuc9FepMqpxgPy16Y9m.Xdyu/ckG4wFZREuZC');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexuri pentru tabele `email_queue`
--
ALTER TABLE `email_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `favorite_fruits`
--
ALTER TABLE `favorite_fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75C5C23EC35E566A` (`family_id`),
  ADD KEY `IDX_75C5C23E8D9F6D38` (`order_id`),
  ADD KEY `IDX_75C5C23E85C4074C` (`genus_id`),
  ADD KEY `IDX_75C5C23EB5D724CD` (`nutrition_id`);

--
-- Indexuri pentru tabele `genus`
--
ALTER TABLE `genus`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `jobs_app`
--
ALTER TABLE `jobs_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexuri pentru tabele `nutritions`
--
ALTER TABLE `nutritions`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `email_queue`
--
ALTER TABLE `email_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `family`
--
ALTER TABLE `family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pentru tabele `favorite_fruits`
--
ALTER TABLE `favorite_fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pentru tabele `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pentru tabele `genus`
--
ALTER TABLE `genus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pentru tabele `jobs_app`
--
ALTER TABLE `jobs_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `nutritions`
--
ALTER TABLE `nutritions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pentru tabele `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pentru tabele `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `fruits`
--
ALTER TABLE `fruits`
  ADD CONSTRAINT `FK_75C5C23E85C4074C` FOREIGN KEY (`genus_id`) REFERENCES `genus` (`id`),
  ADD CONSTRAINT `FK_75C5C23E8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_75C5C23EB5D724CD` FOREIGN KEY (`nutrition_id`) REFERENCES `nutritions` (`id`),
  ADD CONSTRAINT `FK_75C5C23EC35E566A` FOREIGN KEY (`family_id`) REFERENCES `family` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
