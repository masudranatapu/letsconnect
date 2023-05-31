-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2022 at 05:06 AM
-- Server version: 5.7.32-35-log
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db8prntbbcbrbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_slug`, `title`, `slug`, `image`, `author`, `tag`, `date`, `details`, `created_at`, `updated_at`) VALUES
(1, 'vcards-sharing', 'Lorem Ipsum is simply dummy text', 'lorem-ipsum-is-simply-dummy-text', 'frontend/assets/blog/1652260579.png', 'Admin', 'aa', '11-05-2022', 'd', '2022-05-11 03:16:19', '2022-05-11 11:13:13'),
(3, 'whats-app-store', 'Lorem ipsum dolor sit amet', 'lorem-ipsum-dolor-sit-amet', 'frontend/assets/blog/1652261864.jpg', 'Admin', 'html,css,ja', '11-05-2022', 'Lorem ipsum dolor sit amet consectetur adipisicing, elit. Blanditiis facere, laboriosam cupiditate nihil voluptatem tempore ipsam vero neque consequatur magni dicta officiis recusandae totam quia aut eaque quisquam. Commodi, ea.', '2022-05-11 03:26:40', '2022-05-11 04:23:06'),
(9, 'lets-connect', 'Lorem ipsum dolor sit', 'lorem-ipsum-dolor-sit', 'frontend/assets/blog/1652266129.jpg', 'Admin', 'html,css', '12-05-2022', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown JAVA printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-05-11 04:48:49', '2022-05-11 23:17:28'),
(10, 'auto-subscription', 'Where can I get some?', 'where-can-i-get-some', 'frontend/assets/blog/1652276565.jpg', 'Admin', NULL, '21-05-2022', 'Contrary to popular belief, Lorem Ipsum is not simply PHP random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2022-05-11 07:42:45', '2022-05-21 20:49:54'),
(11, 'qr-code', 'Where does it come from?', 'where-does-it-come-from', 'frontend/assets/blog/1652276578.jpg', 'Admin', NULL, '21-05-2022', 'Contrary to popular belief, Lorem Ipsum is not simply HTML random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2022-05-11 07:42:58', '2022-05-21 20:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `business_cards`
--

CREATE TABLE `business_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EN',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `card_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activated',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_cards`
--

INSERT INTO `business_cards` (`id`, `card_id`, `user_id`, `theme_id`, `theme_color`, `card_lang`, `cover`, `profile`, `card_url`, `card_type`, `title`, `sub_title`, `description`, `card_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '622dbeaf0ed42', '622dbd5274716', '7ccc432a06caa', '#000000', 'en', '/backend/img/vCards/IMG-622dc21a75c03-04.jpg.jpg', '/backend/img/vCards/IMG-622dc21a7422c-02.jpg.jpg', '622dbeaf0ed42', 'vcard', 'Modern Vcard', 'Vcard create', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'inactive', '1', '2022-03-13 03:51:43', '2022-06-01 18:05:44'),
(2, '62335e56c6451', '622dbd5274716', '7ccc432a06caa', 'blue', 'en', '/backend/img/vCards/IMG-62335e56c6ea9-4.jpg.jpg', '/backend/img/vCards/IMG-62335e56c6c69-2.jpg.jpg', 'ddd', 'vcard', 'd', 'd', 'ddd', 'inactive', '1', '2022-03-17 10:14:14', '2022-06-01 18:05:44'),
(20, '624358f58a2ea', '622dbd5274716', '624368c863f26', 'blue', 'en', '/backend/img/vCards/IMG-624497304fba5-photo-1612151855475-877969f4a6cc.jpeg', '/backend/img/vCards/IMG-624358f58b59c-flat-business-man-user-profile-avatar-icon-vector-4333097.jpg.jpg', 'desc', 'vcard', 'Smart 2', 'Smart 2', 'Description', 'inactive', '1', '2022-03-29 13:07:33', '2022-06-01 18:05:44'),
(19, '624330853b4f9', '622dbd5274716', '624368c863f26', 'blue', 'en', '/backend/img/vCards/IMG-624330853bf07-photo-1612151855475-877969f4a6cc.jpeg.jpg', '/backend/img/vCards/IMG-624330853bda2-flat-business-man-user-profile-avatar-icon-vector-4333097.jpg.jpg', 'card', 'vcard', 'Smart Card', 'Smart', 'Card Info', 'inactive', '1', '2022-03-29 10:15:01', '2022-06-01 18:05:44'),
(18, '624330379c10f', '622dbd5274716', '624368c863f26', 'blue', 'en', '/backend/img/vCards/IMG-624330379cf27-photo-1612151855475-877969f4a6cc.jpeg.jpg', '/backend/img/vCards/IMG-624330379cc23-flat-business-man-user-profile-avatar-icon-vector-4333097.jpg.jpg', 'smart', 'vcard', 'sMART', 'CARD SM', 'Smart Card', 'inactive', '1', '2022-03-29 10:13:43', '2022-06-01 18:05:44'),
(7, '6234c4e6726c4', '622dbd5274716', '7ccc432a06caa', 'blue', 'en', '/backend/img/vCards/IMG-6234c4e6730e2-6.jpg.jpg', '/backend/img/vCards/IMG-6234c4e672ef5-7.jpg.jpg', 'ddsdfs', 'vcard', 'd', 'd', 'd', 'inactive', '1', '2022-03-18 11:44:06', '2022-06-01 18:05:44'),
(8, '6236ed6b6fa4c', '622dbd5274716', '7ccc432a06caa', 'blue', 'en', '/backend/img/vCards/IMG-6236ed6b704c5-4.jpg.jpg', '/backend/img/vCards/IMG-6236ed6b70325-6.jpg.jpg', 'dddafd', 'vcard', 'd', '1d', 'd', 'inactive', '1', '2022-03-20 03:01:31', '2022-06-01 18:05:44'),
(9, '62375028b9111', '622dbd5274716', '7ccc432a06caa', 'blue', 'en', '/backend/img/vCards/IMG-62375028b9a5c-product-9.jpg.jpg', '/backend/img/vCards/IMG-62375028b9835-product-10.jpg.jpg', 'fdsawe', 'vcard', 'ddfsa', 'fdsaf', 'dfsa', 'inactive', '1', '2022-03-20 10:02:48', '2022-06-01 18:05:44'),
(10, '623a16f9eeaa6', '622dbd5274716', '7ccc432a06caa', 'blue', 'en', '/backend/img/vCards/IMG-623a16f9ef720-62092f46d4998.png.png', '/backend/img/vCards/IMG-623a16f9ef59b-621260a99319e.png.png', 'ddfsafsadd', 'vcard', 'd', 'd', 'd', 'inactive', '1', '2022-03-22 12:35:37', '2022-06-01 18:05:44'),
(22, '6245d2e91a181', '622dbd5274716', '624368c863f26', '#a52727', 'en', '/backend/img/vCards/IMG-6245d2e91af77-photo-1612151855475-877969f4a6cc.jpeg.jpg', '/backend/img/vCards/IMG-6245d2e91ae40-flat-business-man-user-profile-avatar-icon-vector-4333097.jpg.jpg', 'check', 'vcard', 'Monowar Hossain Khan', 'sub title', NULL, 'inactive', '1', '2022-03-31 10:12:25', '2022-06-01 18:05:44'),
(21, '6244aea61864f', '622dbd5274716', '624368c863f26', 'blue', 'en', '/backend/img/vCards/IMG-6244aea618eb6-photo-1612151855475-877969f4a6cc.jpeg.jpg', '/backend/img/vCards/IMG-6244aea618da7-flat-business-man-user-profile-avatar-icon-vector-4333097.jpg.jpg', 'arekta', 'vcard', 'Monowar Hossain Khan', 'sub title', 'Arekta', 'inactive', '1', '2022-03-30 13:25:26', '2022-06-01 18:05:44'),
(15, '6242d2a2568cf', '622dbd5274716', '7ccc432a06caa', 'blue', 'en', '/backend/img/vCards/IMG-6242d2a25728e-1629616270computer.jpg.jpg', '/backend/img/vCards/IMG-6242d2a25716f-rony.jpg.jpg', 'asif', 'vcard', 'Asif', 'Akbar', 'dhaka', 'inactive', '1', '2022-03-29 03:34:26', '2022-06-01 18:05:44'),
(16, '6242d2c32cbf4', '622dbd5274716', '624368c863f26', 'blue', 'en', '/backend/img/vCards/IMG-6242d2c32d5d0-1629616270computer.jpg.jpg', '/backend/img/vCards/IMG-6242d2c32d4b1-rony.jpg.jpg', 'razu', 'vcard', 'Razu', 'Developer', 'Dhaka, Banani', 'inactive', '1', '2022-03-29 03:34:59', '2022-06-01 18:05:44'),
(17, '62431e9f37f86', '622dbd5274716', '624368c863f26', '#ffbb00', 'en', '/backend/img/vCards/IMG-62431e9f38af5-pexels-photo-1509582.jpeg.jpg', '/backend/img/vCards/IMG-624f43c98235b-rony.jpg', 'monowar', 'vcard', 'Monowar Hossain Khan', 'Developer', NULL, 'inactive', '1', '2022-03-29 08:58:39', '2022-06-01 18:05:44'),
(23, '6249dc7a18cb0', '622dbd5274716', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-6249dc7a197eb-8.jpg.jpg', '/backend/img/vCards/IMG-6249dc7a196c9-4.jpg.jpg', 'sdfdsfds', 'vcard', 'title', 'sub title', 'sdfsdfds', 'inactive', '1', '2022-04-03 11:42:18', '2022-06-01 18:05:44'),
(24, '6249dde99dba6', '622dbd5274716', '624368c863f26', '#e42301', 'en', '/backend/img/vCards/IMG-6249dde99e839-1.jpg.jpg', '/backend/img/vCards/IMG-6249dde99e460-pexels-photo-2866796.jpeg.jpg', 'barber', 'vcard', 'Arif', 'sub title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'inactive', '1', '2022-04-03 11:48:25', '2022-06-01 18:05:44'),
(25, '6249e84b8e5fc', '622dbd5274716', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-6249e84b8f28f-pexels-photo-1005638.jpeg.jpg', '/backend/img/vCards/IMG-6249e84b8f01f-pexels-photo-279480.jpeg.jpg', 'dfdfsd', 'vcard', 'title', 'sub title', 'dfds', 'inactive', '1', '2022-04-03 12:32:43', '2022-06-01 18:05:44'),
(26, '624a9106eb5ba', '622dbd5274716', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-624a9106ec248-avatar.jpg.jpg', '/backend/img/vCards/IMG-624a9106ebffd-pexels-photo-1402850.jpeg.jpg', 'sdfs', 'vcard', 'title', 'sub title', 'fsw', 'inactive', '1', '2022-04-04 00:32:38', '2022-06-01 18:05:44'),
(27, '624abaccd1a54', '622dbd5274716', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-624abaccd26c8-pexels-photo-248412.jpeg.jpg', '/backend/img/vCards/IMG-624abaccd256d-df77f0e60d8f15c24ffc57e8fe83373c.png.png', 'ewedfe', 'vcard', 'title', 'sub title', '2qfdasf', 'inactive', '1', '2022-04-04 03:30:52', '2022-06-01 18:05:44'),
(28, '624b1f384f655', '622dbd5274716', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-624b1f38501b3-2.jpg.jpg', '/backend/img/vCards/IMG-624b1f3850088-7.jpg.jpg', 'akbar', 'vcard', 'title', 'sub title', NULL, 'inactive', '1', '2022-04-04 10:39:20', '2022-06-01 18:05:44'),
(29, '6250613f68a18', '6250608223495', '624368c863f26', '#d8360e', 'en', '/backend/img/vCards/IMG-6250613f694dc-concept-open-magic-book-pages-water-land-small-child-fantasy-nature-learning-copy-space-166401875-(1).jpg.jpg', '/backend/img/vCards/IMG-6250613f6933f-pexels-photo-2533266.jpeg.jpg', 'armankhan', 'vcard', 'Arman Hasan', 'sub title', NULL, 'inactive', '1', '2022-04-08 17:22:23', '2022-04-25 18:41:23'),
(30, '62526bcac225b', '622dbd5274716', '624368c863f26', '#5aa3f2', 'en', '/backend/img/vCards/IMG-62534bbbcb9f8-demo.letsconnect.jpg', '/backend/img/vCards/IMG-62534bbbcbc21-demo.letsconnectlogo.jpg', 'Helix-SpencerBradleySuggs', 'vcard', 'Spencer Bradley Suggs', 'sub title', NULL, 'activated', '1', '2022-04-10 06:31:54', '2022-06-01 18:06:36'),
(31, '625495fbd23fa', '622dbd5274716', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-625495fbd3175-24gX1111.jpg.jpg', '/backend/img/vCards/IMG-625495fbd2fc9-1646847789Slide1.jpg.jpg', 'test', 'vcard', 'title', 'sub title', NULL, 'inactive', '1', '2022-04-11 21:56:27', '2022-06-01 18:05:44'),
(32, '625f1b6db9933', '625357e8bda33', '624368c863f26', '#1e2247', 'en', '/backend/img/vCards/IMG-625f260463358-tempprofile.barber1.jpg', '/backend/img/vCards/IMG-625f2f620ca23-Untitled(1).jpg', 'johnbarber1', 'vcard', 'John Phillips', 'sub title', NULL, 'activated', '1', '2022-04-19 20:28:29', '2022-05-24 03:01:20'),
(33, '625f1c4a6c572', '625357e8bda33', '624368c863f26', '#ac7638', 'en', '/backend/img/vCards/IMG-625f1c4a6ced6-temp.headshot.jpg.jpg', '/backend/img/vCards/IMG-625f1c4a6cdc0-templogo.baker.jpg.jpg', 'janetbaker1', 'vcard', 'Janet Baker', 'sub title', NULL, 'activated', '1', '2022-04-19 20:32:10', '2022-05-24 03:00:53'),
(34, '6266ee1773a69', '6250608223495', '624368c863f26', '#00baff', 'en', '/backend/img/vCards/IMG-6266ee1774347-temp.headshot.jpg.jpg', '/backend/img/vCards/IMG-6266ee1774243-blox-demo.jpg.jpg', 'betablox-maddie', 'vcard', 'Maddie', 'sub title', NULL, 'activated', '1', '2022-04-25 18:53:11', '2022-05-16 04:02:45'),
(35, '6282ad0463c95', '625357e8bda33', '624368c863f26', '#1cb9a1', 'en', '/backend/img/vCards/IMG-6282b4a00df1c-Ricky-LetsConnect3.jpg', '/backend/img/vCards/IMG-6282b2f98c131-Simply-LetsConnect2.jpg', 'simplyrugcleaning-rickrankin', 'vcard', 'Rick Rankin', 'sub title', 'Connect with Rick Rankin', 'activated', '1', '2022-05-16 19:59:00', '2022-05-24 03:00:39'),
(36, '6282b96dc0b50', '625357e8bda33', '624368c863f26', '#f96b4d', 'en', '/backend/img/vCards/IMG-6282b96dc1519-Spencer-LetsConnect.jpg.jpg', '/backend/img/vCards/IMG-6282b96dc13f2-Simply-LetsConnect2.jpg.jpg', 'simplyrugcleaning-spencersuggs', 'vcard', 'Spencer Bradley Suggs', 'sub title', NULL, 'activated', '1', '2022-05-16 20:51:57', '2022-05-24 03:03:34'),
(37, '6286fa26af3c2', '6286f9a7de36d', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-6286fa26afc31-temp.headshot2.jpg.jpg', '/backend/img/vCards/IMG-6286fa26afaf6-templogo.baker.jpg.jpg', 'temp-baker', 'vcard', 'title', 'sub title', NULL, 'activated', '1', '2022-05-20 02:17:10', '2022-05-20 02:17:11'),
(38, '628c009b6b20b', '628bfea88e542', '624368c863f26', '#1047ea', 'en', '/backend/img/vCards/IMG-628c009b6b9c4-temp.head.jpg.jpg', '/backend/img/vCards/IMG-628c009b6b926-templogo..jpg.jpg', 'dfwsteam', 'vcard', 'tim lucas', 'sub title', 'Connect with tim lucas', 'activated', '1', '2022-05-23 21:46:03', '2022-05-23 21:47:06'),
(39, '6297ab048d9b8', '622dbd5274716', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-6297ab048e28f-shop_gallery-627ca49535543.jpg.jpg', '/backend/img/vCards/IMG-6297ab048e1f3-1653325480footer-logo.png.png', 'rony', 'vcard', 'title', 'sub title', NULL, 'activated', '1', '2022-06-01 18:08:04', '2022-06-05 15:41:51'),
(40, '629cceea77a6b', '622dbd5274716', '624368c863f26', '#000000', 'en', '/backend/img/vCards/IMG-629cceea786cc-business-dashboard.png.png', '/backend/img/vCards/IMG-629cceea78362-carebah.png.png', 'adsf', 'vcard', 'title', 'sub title', NULL, 'activated', '1', '2022-06-05 15:42:34', '2022-06-05 15:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `business_fields`
--

CREATE TABLE `business_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_fields`
--

INSERT INTO `business_fields` (`id`, `card_id`, `type`, `icon`, `label`, `content`, `position`, `status`, `created_at`, `updated_at`) VALUES
(13, '622dbeaf0ed42', 'tel', 'fas fa-phone-volume', 'Phone Number', '+9192584785447', '3', '1', '2022-03-17 11:13:09', '2022-03-17 11:13:09'),
(14, '622dbeaf0ed42', 'email', 'fas fa-envelope', 'Email Address', 'support@gmail.com', '4', '1', '2022-03-17 11:13:09', '2022-03-17 11:13:09'),
(11, '622dbeaf0ed42', 'youtube', 'fab fa-youtube-square', 'Youtube', 'https://www.facebook.com/sorifahmedrobin.khan', '1', '1', '2022-03-17 11:13:09', '2022-03-17 11:13:09'),
(12, '622dbeaf0ed42', 'wa', 'fab fa-whatsapp-square', 'Whatsapp', '+9192584785447', '2', '1', '2022-03-17 11:13:09', '2022-03-17 11:13:09'),
(9, '62335e56c6451', 'email', 'fas fa-adjust', 'Address', '+9192584785447', '1', '1', '2022-03-17 10:42:08', '2022-03-17 10:42:08'),
(10, '623368ecbd7cc', 'address', 'fas fa-address-book', 'UPI or Bank', '+9192584785447', '1', '1', '2022-03-17 11:09:43', '2022-03-17 11:09:43'),
(15, '623372d47470e', 'address', 'far fa-address-card', 'Address', 'dd', '1', '1', '2022-03-17 12:30:30', '2022-03-17 12:30:30'),
(16, '62431e9f37f86', 'json', 'json', 'json', '{\"name\":\"Monowar Hossain Khan\",\"designation\":\"Software Engineer\",\"email\":\"mhkha2022@gmail.com\",\"connect\":null,\"ccode1\":\"84\",\"phone\":\"01990572321\",\"comment\":null,\"linkedin\":\"www.facebook.com\",\"facebook\":\"www.facebook.com\",\"instagram\":\"www.facebook.com\",\"contacts\":\"01990572321\",\"website\":\"www.facebook.com\",\"youtube\":\"www.facebook.com\",\"map\":\"www.facebook.com\",\"snapchat\":null,\"spotify\":\"Spotify\",\"twitch\":\"Twitch\",\"messenger\":\"Messenger\",\"skype\":\"Skypewww.facebook.com\",\"soundcloud\":\"Soundcloud\",\"paypal\":\"www.facebook.com\",\"vimeo\":null,\"telegram\":null,\"flickr\":\"Flickr\",\"about_title\":\"About US\",\"about_details\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"videos\":[{\"title\":\"Company Introduction\",\"description\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages\",\"url\":\"https:\\/\\/youtube.com\\/embed\\/bMknfKXIFA8\"}],\"testimonials\":[{\"name\":\"Rony\",\"detail\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\"},{\"name\":\"Razu\",\"detail\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\"}]}', '1', '1', '2022-03-29 10:07:40', '2022-04-08 01:03:29'),
(17, '624358f58a2ea', 'json', 'json', 'json', '{\"name\":\"Monowar Hossain Khan\",\"designation\":\"Software Engineer\",\"email\":\"mhkha2022@gmail.com\",\"connect\":\"Coonect\",\"ccode1\":\"USA (+1)\",\"phone\":\"1232323\",\"comment\":\"Hello Everyone\",\"linkedin\":null,\"facebook\":\"Facebook\",\"instagram\":null,\"contacts\":\"Contact\",\"website\":\"ttt\",\"youtube\":null,\"map\":\"locaton\",\"snapchat\":null,\"spotify\":\"spotify\",\"twitch\":\"Twtich\",\"messenger\":null,\"skype\":null,\"soundcloud\":\"sound\",\"paypal\":null,\"vimeo\":null,\"telegram\":\"telegram\",\"flickr\":null,\"about_title\":null,\"about_details\":null,\"videos\":[],\"testimonials\":[{\"name\":\"Sazol\",\"detail\":\"Hello World\"}]}', '1', '1', '2022-03-29 16:40:24', '2022-03-30 12:02:03'),
(18, '624330379c10f', 'json', 'json', 'json', '{\"name\":\"Monowar Hossain Khan\",\"designation\":\"Web Developer\",\"email\":\"mhkha2022@gmail.com\",\"connect\":null,\"ccode1\":\"USA (+1)\",\"phone\":null,\"comment\":\"Hello\",\"linkedin\":null,\"facebook\":null,\"instagram\":null,\"contacts\":null,\"website\":null,\"youtube\":null,\"map\":null,\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":\"Design paren?\",\"about_details\":\"Na\",\"videos\":[],\"testimonials\":[{\"name\":\"Sazol\",\"detail\":\"Kemon achen?\"}]}', '1', '1', '2022-03-30 09:05:27', '2022-03-30 12:29:59'),
(19, '624330853b4f9', 'json', 'json', 'json', '{\"name\":\"Monowar Hossain Khan\",\"designation\":null,\"email\":\"mhkha2022@gmail.com\",\"connect\":null,\"ccode1\":\"USA (+1)\",\"phone\":\"393939\",\"comment\":\"comment\",\"linkedin\":null,\"facebook\":null,\"instagram\":null,\"contacts\":null,\"website\":null,\"youtube\":\"youtube\",\"map\":null,\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":\"About Myself\",\"about_details\":\"Ami ki?\",\"videos\":[{\"title\":\"Title\",\"description\":\"Video\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/XlBDE2OIeTo\"},{\"title\":\"Title\",\"description\":\"Arek video\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/XlBDE2OIeTo\"}],\"testimonials\":[{\"name\":\"Are vai\",\"detail\":\"Ki khobro\"},{\"name\":\"Nai\",\"detail\":\"Nai vai\"}]}', '1', '1', '2022-03-30 12:31:03', '2022-03-30 13:14:18'),
(20, '6244aea61864f', 'json', 'json', 'json', '{\"name\":\"Monowar Hossain Khan\",\"designation\":\"Software Developer\",\"email\":\"mhkha2022@gmail.com\",\"connect\":null,\"ccode1\":\"USA (+1)\",\"phone\":null,\"comment\":null,\"linkedin\":null,\"facebook\":null,\"instagram\":null,\"contacts\":null,\"website\":null,\"youtube\":null,\"map\":null,\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":null,\"about_details\":null,\"videos\":[],\"testimonials\":[]}', '1', '1', '2022-03-30 13:25:44', '2022-03-30 13:25:44'),
(21, '6245d2e91a181', 'json', 'json', 'json', '{\"name\":\"Monowar Hossain Khan\",\"designation\":\"Software Engineer\",\"email\":\"mhkha2022@gmail.com\",\"connect\":null,\"ccode1\":\"USA (+1)\",\"phone\":null,\"comment\":null,\"linkedin\":null,\"facebook\":null,\"instagram\":null,\"contacts\":null,\"website\":null,\"youtube\":null,\"map\":null,\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":null,\"about_details\":null,\"videos\":[],\"testimonials\":[]}', '1', '1', '2022-03-31 10:12:56', '2022-03-31 10:12:56'),
(22, '6249dde99dba6', 'json', 'json', 'json', '{\"name\":\"Arif\",\"designation\":\"Barber\",\"email\":\"arif@gmail.com\",\"connect\":\"www.facebook.com\",\"ccode1\":\"USA (+1)\",\"phone\":\"01990572321\",\"comment\":\"www.facebook.com\",\"linkedin\":\"www.facebook.com\",\"facebook\":\"www.facebook.com\",\"instagram\":\"www.facebook.com\",\"contacts\":\"01990572321\",\"website\":\"www.facebook.com\",\"youtube\":\"www.facebook.com\",\"map\":\"www.facebook.com\",\"snapchat\":\"www.facebook.com\",\"spotify\":\"www.facebook.com\",\"twitch\":\"www.facebook.com\",\"messenger\":\"www.facebook.com\",\"skype\":\"www.facebook.com\",\"soundcloud\":\"www.facebook.com\",\"paypal\":\"www.facebook.com\",\"vimeo\":\"www.facebook.com\",\"telegram\":\"www.facebook.com\",\"flickr\":\"www.facebook.com\",\"about_title\":\"Rony\",\"about_details\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates officiis error impedit quis voluptatibus, iste ducimus tempore quisquam praesentium veniam dolore molestiae architecto voluptatum totam necessitatibus, reiciendis cupiditate. Minus!\",\"videos\":[{\"title\":\"Hello World\",\"description\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/dZ4V-LOwZSo\"}],\"testimonials\":[{\"name\":\"Rony\",\"detail\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries\"},{\"name\":\"Razu\",\"detail\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries\"}]}', '1', '1', '2022-04-03 12:12:31', '2022-04-03 12:12:31'),
(23, '6250613f68a18', 'json', 'json', 'json', '{\"name\":\"Arman Hasan\",\"designation\":\"Developer\",\"email\":\"armankhan@gmail.com\",\"connect\":\"01767671133\",\"ccode1\":\"USA (+1)\",\"phone\":\"01990572321\",\"comment\":null,\"linkedin\":\"www.facebook.com\",\"facebook\":\"www.facebook.com\",\"instagram\":\"www.facebook.com\",\"contacts\":\"+8801990572321\",\"website\":\"www.facebook.com\",\"youtube\":null,\"map\":\"www.facebook.com\",\"snapchat\":\"www.facebook.com\",\"spotify\":\"www.facebook.com\",\"twitch\":\"www.facebook.com\",\"messenger\":\"www.facebook.com\",\"skype\":\"www.facebook.com\",\"soundcloud\":\"www.facebook.com\",\"paypal\":\"www.facebook.com\",\"vimeo\":\"www.facebook.com\",\"telegram\":\"www.facebook.com\",\"flickr\":\"www.facebook.com\",\"about_title\":\"About Me\",\"about_details\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"videos\":[{\"title\":\"My Video\",\"description\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/gO6n3JYIZ4U\"}],\"testimonials\":[{\"name\":\"Arman Khan\",\"detail\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\"},{\"name\":\"Arif Joy\",\"detail\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\"}]}', '1', '1', '2022-04-08 17:25:11', '2022-04-08 18:35:08'),
(24, '62526bcac225b', 'json', 'json', 'json', '{\"name\":\"Spencer Bradley Suggs\",\"designation\":\"Founder | Innovator | Visionary\",\"email\":\"spencer@letsconnect.site\",\"connect\":\"972-742-0702\",\"ccode1\":\"USA (+1)\",\"phone\":\"972-742-0702\",\"comment\":\"972-742-0702\",\"linkedin\":\"https:\\/\\/www.linkedin.com\\/in\\/spencersuggs\\/\",\"facebook\":\"https:\\/\\/www.facebook.com\\/choosehelix\",\"instagram\":\"instagram.com\\/choosehelix\",\"contacts\":\"Add Contacts\",\"website\":null,\"youtube\":null,\"map\":null,\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":\"Spencer\'s Professional Career\",\"about_details\":\"My entrepreneurial spirit stems from a strong desire to affect positive change in the service industry as a whole. In fact, it\\u2019s never been more at the forefront of our focus than in this brave new post-pandemic realm. While I love to innovate, I\\u2019m an even bigger fan of systems, processes, and procedures to essentially guarantee outcomes with very little variance. My biggest strength comes from my team of winners from the lowest man on the totem pole to my brother and Operations counter-part. We all have many ideas an lots of creative input on a daily basis, but our overarching unity to achieve our commitment to excellence in all metrics is what has earned us a 5-star rating both online with our residential and offline amongst our B2B clients.\",\"videos\":[{\"title\":\"Helix Cleaning & Restoration\",\"description\":\"When you are facing a home or business catastrophe whether large or small, you need a professional catastrophic damage reconstruction contractor you can count on for top-quality work.\\r\\nOur systems and procedures are designed to deliver you with an experience that relieves you from the worries and stress of these types of events and assures a satisfactory outcome. For building and contents restoration you may need a combination of specialists in fire damage restoration, mold remediation, sewage damage restoration, smoke and odor removal, trauma scene cleanup, water damage restoration, roofing repairs or replacement and other general contracting needs.\\r\\n\\r\\nOur 24\\/7 emergency services are always ready with an exceptionally experienced management team, skilled craftspeople, and certified technicians who will be there fast and do the job right. With years of experience working with insurance companies and their local adjusters, we\\u2019re fully prepared to deliver every requirement for a successful and smooth claim process. We can handle it all, including complete reconstruction.\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/G4r3F47rWWg\"}],\"testimonials\":[{\"name\":\"-Charlene Howell\",\"detail\":\"I was able to get an appointment within a few days. I was notified of the time they were coming as well as getting reminders. The owner and technician came together and explained what they would be doing. Both very friendly and polite. The tech was here several hours. We are very impressed with how great our carpet looks!\"},{\"name\":\"-Nathan Schnefke\",\"detail\":\"I have worked with Helix on numerous water restoration projects. Spencer and the boys over at Helix are sharp as a tack! They are knowledgeable, professional, friendly and communicate so well. Time is of the essence with restoration and Helix moves quickly! I\'d highly recommend Helix for your restoration needs!\"},{\"name\":\"-Al Lacier\",\"detail\":\"Excellent customer service. Communication and coordination of estimate and cleaning were top-notch. Carpet repair and cleaning were 5 stars. Strongly recommend this company.\"}]}', '1', '1', '2022-04-10 06:42:51', '2022-05-09 18:03:00'),
(25, '625f1c4a6c572', 'json', 'json', 'json', '{\"name\":\"Janet Baker\",\"designation\":\"Owner & Operator\",\"email\":\"janet.the.baker@gmail.com\",\"connect\":\"469-555-1234\",\"ccode1\":\"USA (+1)\",\"phone\":\"469-555-1234\",\"comment\":\"469-555-1234\",\"linkedin\":\"Janet\",\"facebook\":\"Janet\",\"instagram\":\"Janet\",\"contacts\":null,\"website\":null,\"youtube\":null,\"map\":null,\"snapchat\":\"Janet\",\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":\"About Me\",\"about_details\":\"Hi, I\'m Janet and I\'m amazing! Let\'s Connect!!\",\"videos\":[{\"title\":\"Janet\'s Corner Bakery\",\"description\":\"Here\'s some demo text about our lovely bakery! Please come join us on Tuesday\'s for a live musician.\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/uYAlFoMHfcc\"}],\"testimonials\":[{\"name\":\"Mom Baker\",\"detail\":\"My Mom LOVES my bakery.\"},{\"name\":\"Janet\'s Cousin\",\"detail\":\"As Janet\'s cousin, I can say these are amazing!!\"},{\"name\":\"John Measure\",\"detail\":\"Here\'s one more review for good measure!\"}]}', '1', '1', '2022-04-19 20:38:31', '2022-04-19 21:12:00'),
(26, '625f1b6db9933', 'json', 'json', 'json', '{\"name\":\"John Phillips\",\"designation\":\"Licensed Master Barber\",\"email\":\"john.the.barber@gmail.com\",\"connect\":\"469-555-1234\",\"ccode1\":\"USA (+1)\",\"phone\":\"469-555-1234\",\"comment\":\"469-555-1234\",\"linkedin\":\"John\",\"facebook\":\"John\",\"instagram\":\"John\",\"contacts\":null,\"website\":null,\"youtube\":null,\"map\":null,\"snapchat\":\"John\",\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":\"About Me\",\"about_details\":\"The requirements for the Master Barber title vary by state, and not every state has this job title. In some states being a master barber means you\\u2019ve held your license for more than 15 to 20 years, and that you are a veteran barber who can charge more for your services. Other states just require you to have your license for 15 to 24 months, and take a master barber exam to get the title. In yet other states, being a master barber simply means you\\u2019ve taken more training hours or advanced training courses to meet a set minimum. Then some states require a lengthy apprenticeship under another master barber.\",\"videos\":[{\"title\":\"John the Barber\",\"description\":\"What makes a Master Barber License different from a Standard or Restricted Barber License?  In most cases, you\\u2019ll find that experience, expertise and quality of service set the regular barbers apart from the master barbers. They have mastered most men\\u2019s hairstyles and hair services, and have a more proficient level of skill in the barbering arts and sciences. Also, standard barber technicians may not be trained, licensed and permitted to perform certain services, whereas a Master Barber is.\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/tJpyQ-zVe9s\"}],\"testimonials\":[{\"name\":\"John\'s Dad\",\"detail\":\"John is an amazing barber and really knows his stuff!\"},{\"name\":\"John\'s Mom\",\"detail\":\"John is always great to have around!\"},{\"name\":\"Joe Measure\",\"detail\":\"One more testimonial for good measure.\"}]}', '1', '1', '2022-04-19 21:52:39', '2022-04-19 21:52:39'),
(27, '6266ee1773a69', 'json', 'json', 'json', '{\"name\":\"Maddie\",\"designation\":\"Chief Awesomeness Officer\",\"email\":\"maddie@betablox.com\",\"connect\":\"816-555-1234\",\"ccode1\":\"USA (+1)\",\"phone\":\"816-555-1234\",\"comment\":\"816-555-1234\",\"linkedin\":\"linkedin.com\",\"facebook\":\"facebook.com\",\"instagram\":\"instagram.com\",\"contacts\":null,\"website\":null,\"youtube\":null,\"map\":null,\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":\"skype.com\",\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":\"About Maddie\",\"about_details\":\"My role as The Blox casting director\'s starts well before meeting any of our potential talent. I typically start by meeting with the producers, director, and the writer, and any other executive level key personnel to learn more about the project and the roles involved. We closely read the script, making notes on the various characters and dialing in our target casting profiles. My mission is to find and recruit the characters who not only shine out in their business pursuits, but in their day-to-day lives as well. If you\'re one of the select entrepreneurs that makes it through the entirety of the process, then mark yourself down as someone very special, but we still have a ways to go on your Blox journey. Thanks for checking us out and we\'ll see you down the road!\",\"videos\":[{\"title\":\"Welcome to The Blox\",\"description\":\"\\u201cThe Blox\\u201d was filmed in Kansas City, Missouri, during the summer of 2021.  \\r\\n\\r\\nConsidered the \\u201clargest live-in startup competition on the planet\\u201d, leaders of 20 start-up companies from all over the country train and test during the day then battle it out to be Leaders of the Blox at night.  \\r\\n\\r\\nAt the end of each season, a winning company walks away as the Best Startup on The Blox. Season One of The Blox premieres February 10 on BetaBlox\\u2019s custom mobile app of the same name.  \\r\\n\\r\\nThe Blox app also contains other tools and assets to help entrepreneurs hit their own goals, including hundreds of hours of video and audio-based consultations with world-class mentors and a series of guided meditations to help them harness the power of their brain space. \\r\\n\\r\\nBetaBlox is one of the longest standing and largest entrepreneurship incubators worldwide, rocketing start-ups to success for more than a decade. The company boasts an impressive 88 percent startup survival rate, defined by the Small Business Association as making it to year three.\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/ZZYNudJ9Hf8\"}],\"testimonials\":[{\"name\":\"-Entrepreneur\",\"detail\":\"Maddie was great to work with and we loved how attentive to detail she was!\"},{\"name\":\"-Maddie\'s Mom\",\"detail\":\"I\'ve spent my whole life with Maddie and it\'s been a blast of a ride.\"},{\"name\":\"-Joe Measure\",\"detail\":\"Here\'s another review just for good measure so you get an idea of how it function.\"}]}', '1', '1', '2022-04-25 19:35:23', '2022-04-25 19:41:55'),
(28, '6282ad0463c95', 'json', 'json', 'json', '{\"name\":\"Rick Rankin\",\"designation\":\"Operations Supervisor\",\"email\":\"rick@trustsimply.com\",\"connect\":\"214-384-6828\",\"ccode1\":\"USA (+1)\",\"phone\":\"214-384-6828\",\"comment\":\"214-384-6828\",\"linkedin\":null,\"facebook\":\"www.facebook.com\\/simplyrugcleaning\",\"instagram\":\"www.instagram.com\\/simplyrugcleaning\\/\",\"contacts\":null,\"website\":\"www.SimplyRugCleaning.com\",\"youtube\":null,\"map\":\"g.page\\/simplyrugcleaning?share\",\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":\"Why Choose Simply\",\"about_details\":\"There may be hundreds of local carpet cleaners that offer \\u201crug cleaning\\u201d as an add-on service, but using a carpet cleaner is never a good idea. After all, you wouldn\\u2019t bring your beautiful formal dress or suit to a \\u201cwash n\\u2019 dry\\u201d laundry mat, so why have your delicate rug cleaned by a wall-to-wall carpet cleaner? We feature a 5,500 Sq. Ft. state of the art rug cleaning facility equipped with Harmonic Vibration Dusting equipment and Centrifuge Rinsing & Drying equipment. All of our equipment is operated by WoolSafe certified rug cleaning technicians. Rug cleaning is what we do, and we do it best!\",\"videos\":[{\"title\":\"Simply Rug Cleaning\",\"description\":\"Simply Rug Cleaning handles the cleaning and care of Persian, Oriental, Designer, Shag, and other production area rugs. Our state-of-the-art cleaning facility features harmonic vibration dusting, full immersion washing using WoolSafe certified cleaning solutions, a centrifuge rinse system, and a soft water final rinse for safe handling of your delicate rugs.\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/hFWa8TUMIxk\"}],\"testimonials\":[{\"name\":\"-Richard Morris | Rockwall\",\"detail\":\"Simply Rug made a great repair to our favorite Persian carpet after our new puppy decided to chew off part of the edging. The repair and rug pick up\\/delivery was very reasonably priced for the quality of work they provided. We have used Simply Rug in the past for rug cleaning and have always been delighted by the quality of their work and excellent service. In our opinion, the best in the Metroplex!\"},{\"name\":\"-Mary Hewlett | Frisco\",\"detail\":\"The Simply Rug Cleaning team is wonderful. Their customer service is top notch and they are very accommodating.  I wasn\\u2019t able to drop my rugs off during normal hours and Rick was more than willing to be available at a more convenient time for me. He gave me several options for cleaning and repairing my rugs. Two of the rugs were over 40 years old and very sentimental to me. They did a great job cleaning them and packing them up for storage. Spencer was kind enough to deliver my clean rugs since I had recently had surgery and was not able to drive yet. I highly recommend their company.\"},{\"name\":\"-Michelle Ball | Dallas\",\"detail\":\"We have used Simply Rug Cleaning a couple of times now and always have experienced great customer service. This time around I communicated with Rick - He was friendly, efficient, helpful, and accessible. The pickup crew (which included Rick) were friendly and professional, as well as quick. The rug is so clean and soft, and after being lived on by 4 people and 4 dogs, it is definitely worth the investment to have it cleaned!\"}]}', '1', '1', '2022-05-16 20:17:52', '2022-05-24 03:00:39'),
(29, '6282b96dc0b50', 'json', 'json', 'json', '{\"name\":\"Spencer Bradley Suggs\",\"designation\":\"Owner\\/Operator\",\"email\":\"spencer@trustsimply.com\",\"connect\":\"972-742-0702\",\"ccode1\":\"USA (+1)\",\"phone\":\"9727420702\",\"comment\":\"972-742-0702\",\"linkedin\":null,\"facebook\":\"www.facebook.com\\/simplyrugcleaning\",\"instagram\":\"www.instagram.com\\/simplyrugcleaning\\/\",\"contacts\":null,\"website\":\"www.SimplyRugCleaning.com\",\"youtube\":null,\"map\":\"www.google.com\\/maps\\/place\\/Simply+Rug+Cleaning\\/@32.8882375,-96.6847086,17z\\/data=!4m5!3m4!1s0x864ea0847f113cab:0x671a498b66f2c581!8m2!3d32.888233!4d-96.6825199\",\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":\"Why Choose Simply\",\"about_details\":\"There may be hundreds of local carpet cleaners that offer \\u201crug cleaning\\u201d as an add-on service, but using a carpet cleaner is never a good idea. After all, you wouldn\\u2019t bring your beautiful formal dress or suit to a \\u201cwash n\\u2019 dry\\u201d laundry mat, so why have your delicate rug cleaned by a wall-to-wall carpet cleaner? We feature a 5,500 Sq. Ft. state of the art rug cleaning facility equipped with Harmonic Vibration Dusting equipment and Centrifuge Rinsing & Drying equipment. All of our equipment is operated by WoolSafe certified rug cleaning technicians. Rug cleaning is what we do, and we do it best!\",\"videos\":[{\"title\":\"Simply Rug Cleaning\",\"description\":\"Simply Rug Cleaning handles the cleaning and care of Persian, Oriental, Designer, Shag, and other production area rugs. Our state-of-the-art cleaning facility features harmonic vibration dusting, full immersion washing using WoolSafe certified cleaning solutions, a centrifuge rinse system, and a soft water final rinse for safe handling of your delicate rugs.\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/hFWa8TUMIxk\"}],\"testimonials\":[{\"name\":\"Richard Morris | Rockwall\",\"detail\":\"Simply Rug made a great repair to our favorite Persian carpet after our new puppy decided to chew off part of the edging. The repair and rug pick up\\/delivery was very reasonably priced for the quality of work they provided.We have used Simply Rug in the past for rug cleaning and have always been delighted by the quality of their work and excellent service. In our opinion, the best in the Metroplex!\"},{\"name\":\"Mary Hewlett | Frisco\",\"detail\":\"The Simply Rug Cleaning team is wonderful. Their customer service is top notch and they are very accommodating.  They gave me several options for cleaning and repairing my rugs. Two of the rugs were over 40 years old and very sentimental to me. They did a great job cleaning them and packing them up for storage. Spencer was kind enough to deliver my clean rugs since I had recently had surgery and was not able to drive yet. I highly recommend their company.\"},{\"name\":\"Michelle Ball | Dallas\",\"detail\":\"We have used Simply Rug Cleaning a couple of times now and always have experienced great customer service. This time around I communicated with Rick - she was friendly, efficient, helpful, and accessible. The pickup crew (which included Rick) were friendly and professional, as well as quick. The rug is so clean and soft, and after being lived on by 4 people and 4 dogs, it is definitely worth the investment to have it cleaned!\"}]}', '1', '1', '2022-05-16 21:50:47', '2022-05-24 03:02:31'),
(30, '628c009b6b20b', 'json', 'json', 'json', '{\"name\":\"tim lucas\",\"designation\":null,\"email\":\"dfwsteamcleaning@gmail.com\",\"connect\":null,\"ccode1\":\"USA (+1)\",\"phone\":\"4697590551\",\"comment\":null,\"linkedin\":null,\"facebook\":null,\"instagram\":null,\"contacts\":null,\"website\":\"dfwsteamcleaning.com\",\"youtube\":null,\"map\":null,\"snapchat\":null,\"spotify\":null,\"twitch\":null,\"messenger\":null,\"skype\":null,\"soundcloud\":null,\"paypal\":null,\"vimeo\":null,\"telegram\":null,\"flickr\":null,\"about_title\":null,\"about_details\":null,\"videos\":[],\"testimonials\":[]}', '1', '1', '2022-05-23 21:47:06', '2022-05-23 21:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE `business_hours` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Monday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tuesday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wednesday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Thursday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Friday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Saturday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sunday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_always_open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_display` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `card_id`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`, `is_always_open`, `is_display`, `status`, `created_at`, `updated_at`) VALUES
(3, '622dbeaf0ed42', '08:51-12:10', '08:52-12:52', '08:52-12:52', '20:52-12:52', '08:52-12:52', 'Closed', 'Closed', 'Closed', '1', '1', '2022-03-13 06:52:31', '2022-03-13 06:52:31'),
(4, '62335e56c6451', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', 'Closed', '1', '1', '2022-03-17 10:42:59', '2022-03-17 10:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Vcards Sharing', 'vcards-sharing', '2022-05-11 09:27:22', '2022-05-21 21:01:52'),
(4, 'Whats  App Store', 'whats-app-store', '2022-05-11 09:30:11', '2022-05-21 21:01:30'),
(5, 'Lets Connect', 'lets-connect', '2022-05-11 09:30:23', '2022-05-21 21:01:16'),
(6, 'Auto Subscription', 'auto-subscription', '2022-05-11 09:30:37', '2022-05-21 21:01:03'),
(9, 'QR Code', 'qr-code', '2022-05-11 23:26:25', '2022-05-21 21:00:30'),
(15, 'vcards', 'vcards', '2022-05-12 23:07:24', '2022-05-21 21:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'LetsConnect', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(2, 'currency', 'USD', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(3, 'timezone', 'America/Chicago', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(4, 'paypal_mode', 'sandbox', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(5, 'paypal_client_id', 'sdfsdf', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(6, 'paypal_secret', 'fdsfdsfd', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(7, 'razorpay_key', 'YOUR_RAZORPAY_KEY', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(8, 'razorpay_secret', 'YOUR_RAZORPAY_SECRET', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(9, 'term', 'monthly', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(10, 'stripe_publishable_key', 'YOUR_STRIPE_PUB_KEY', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(11, 'stripe_secret', 'sasdfaswdas', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(12, 'app_theme', 'blue', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(13, 'primary_image', '/frontend/assets/elements/home.gif', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(14, 'secondary_image', '/frontend/assets/elements/home.svg', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(15, 'tax_type', 'exclusive', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(16, 'invoice_prefix', 'INV-', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(17, 'invoice_name', 'LetsConnect', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(18, 'invoice_email', 'sales@letsconnect.com', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(19, 'invoice_phone', '+88 01767671133', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(20, 'invoice_address', '123, lorem ipsum', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(21, 'invoice_city', 'dhaka', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(22, 'invoice_state', 'dhaka', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(23, 'invoice_zipcode', '1212', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(24, 'invoice_country', 'Bangaldesh', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(25, 'tax_name', 'Goods and Service Tax', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(26, 'tax_value', '18', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(27, 'tax_number', 'SPN125553322', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(28, 'email_heading', 'Thanks for using LetsConnect. This is an invoice for your recent purchase.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(29, 'email_footer', 'If you’re having trouble with the button above, please login into your web browser.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(30, 'invoice_footer', 'Thank you very much for doing business with us. We look forward to working with you again!', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(31, 'share_content', 'Welcome to { business_name }, Here is my digital vCard, { business_url } \r\nPowered by: { appName }', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(32, 'bank_transfer', 'Bank: FARM CREDIT BANK DN P&I\r\nBank Account Number: 18539734757                     \r\nRouting Number: 21054734\r\nIBAN: IN94769888520201207044719366\r\n\r\nBank: FARM CREDIT BANK DN P&I\r\nBank Account Number: 18539734757                     \r\nRouting Number: 21054734\r\nIBAN: IN94769888520201207044719366', '2022-03-12 14:54:38', '2022-03-12 14:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fcolor` varchar(255) DEFAULT NULL,
  `how_meet` varchar(255) DEFAULT NULL,
  `is_replied` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `reply_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `company`, `title`, `fcolor`, `how_meet`, `is_replied`, `created_at`, `reply_at`) VALUES
(1, 'Razu', 'Khan', 'Ridepodu', NULL, 'sdfds', 'offline', '0', '2022-03-29 09:32:30', '2022-03-29 09:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority` int(11) NOT NULL,
  `iso_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit_to_unit` int(11) NOT NULL,
  `symbol_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_entity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thousands_separator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_numeric` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `priority`, `iso_code`, `name`, `symbol`, `subunit`, `subunit_to_unit`, `symbol_first`, `html_entity`, `decimal_mark`, `thousands_separator`, `iso_numeric`) VALUES
(1, 100, 'AED', 'United Arab Emirates Dirham', 'د.إ', 'Fils', 100, 'true', '', '.', ',', 784),
(2, 100, 'AFN', 'Afghan Afghani', '؋', 'Pul', 100, 'false', '', '.', ',', 971),
(3, 100, 'ALL', 'Albanian Lek', 'L', 'Qintar', 100, 'false', '', '.', ',', 8),
(4, 100, 'AMD', 'Armenian Dram', 'դր.', 'Luma', 100, 'false', '', '.', ',', 51),
(5, 100, 'ANG', 'Netherlands Antillean Gulden', 'ƒ', 'Cent', 100, 'true', '&#x0192;', ',', '.', 532),
(6, 100, 'AOA', 'Angolan Kwanza', 'Kz', 'Cêntimo', 100, 'false', '', '.', ',', 973),
(7, 100, 'ARS', 'Argentine Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', ',', '.', 32),
(8, 4, 'AUD', 'Australian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 36),
(9, 100, 'AWG', 'Aruban Florin', 'ƒ', 'Cent', 100, 'false', '&#x0192;', '.', ',', 533),
(10, 100, 'AZN', 'Azerbaijani Manat', 'null', 'Qəpik', 100, 'true', '', '.', ',', 944),
(11, 100, 'BAM', 'Bosnia and Herzegovina Convertible Mark', 'КМ', 'Fening', 100, 'true', '', '.', ',', 977),
(12, 100, 'BBD', 'Barbadian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 52),
(13, 100, 'BDT', 'Bangladeshi Taka', '৳', 'Paisa', 100, 'true', '', '.', ',', 50),
(14, 100, 'BGN', 'Bulgarian Lev', 'лв', 'Stotinka', 100, 'false', '', '.', ',', 975),
(15, 100, 'BHD', 'Bahraini Dinar', 'ب.د', 'Fils', 1000, 'true', '', '.', ',', 48),
(16, 100, 'BIF', 'Burundian Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 108),
(17, 100, 'BMD', 'Bermudian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 60),
(18, 100, 'BND', 'Brunei Dollar', '$', 'Sen', 100, 'true', '$', '.', ',', 96),
(19, 100, 'BOB', 'Bolivian Boliviano', 'Bs.', 'Centavo', 100, 'true', '', '.', ',', 68),
(20, 100, 'BRL', 'Brazilian Real', 'R$', 'Centavo', 100, 'true', 'R$', ',', '.', 986),
(21, 100, 'BSD', 'Bahamian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 44),
(22, 100, 'BTN', 'Bhutanese Ngultrum', 'Nu.', 'Chertrum', 100, 'false', '', '.', ',', 64),
(23, 100, 'BWP', 'Botswana Pula', 'P', 'Thebe', 100, 'true', '', '.', ',', 72),
(24, 100, 'BYR', 'Belarusian Ruble', 'Br', 'Kapyeyka', 100, 'false', '', '.', ',', 974),
(25, 100, 'BZD', 'Belize Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 84),
(26, 5, 'CAD', 'Canadian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 124),
(27, 100, 'CDF', 'Congolese Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 976),
(28, 100, 'CHF', 'Swiss Franc', 'Fr', 'Rappen', 100, 'true', '', '.', ',', 756),
(29, 100, 'CLF', 'Unidad de Fomento', 'UF', 'Peso', 1, 'true', '&#x20B1;', ',', '.', 990),
(30, 100, 'CLP', 'Chilean Peso', '$', 'Peso', 1, 'true', '&#36;', ',', '.', 152),
(31, 100, 'CNY', 'Chinese Renminbi Yuan', '¥', 'Fen', 100, 'true', '&#20803;', '.', ',', 156),
(32, 100, 'COP', 'Colombian Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', ',', '.', 170),
(33, 100, 'CRC', 'Costa Rican Colón', '₡', 'Céntimo', 100, 'true', '&#x20A1;', ',', '.', 188),
(34, 100, 'CUC', 'Cuban Convertible Peso', '$', 'Centavo', 100, 'false', '', '.', ',', 931),
(35, 100, 'CUP', 'Cuban Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 192),
(36, 100, 'CVE', 'Cape Verdean Escudo', '$', 'Centavo', 100, 'false', '', '.', ',', 132),
(37, 100, 'CZK', 'Czech Koruna', 'Kč', 'Haléř', 100, 'true', '', ',', '.', 203),
(38, 100, 'DJF', 'Djiboutian Franc', 'Fdj', 'Centime', 100, 'false', '', '.', ',', 262),
(39, 100, 'DKK', 'Danish Krone', 'kr', 'Øre', 100, 'false', '', ',', '.', 208),
(40, 100, 'DOP', 'Dominican Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 214),
(41, 100, 'DZD', 'Algerian Dinar', 'د.ج', 'Centime', 100, 'false', '', '.', ',', 12),
(42, 100, 'EGP', 'Egyptian Pound', 'ج.م', 'Piastre', 100, 'true', '&#x00A3;', '.', ',', 818),
(43, 100, 'ERN', 'Eritrean Nakfa', 'Nfk', 'Cent', 100, 'false', '', '.', ',', 232),
(44, 100, 'ETB', 'Ethiopian Birr', 'Br', 'Santim', 100, 'false', '', '.', ',', 230),
(45, 2, 'EUR', 'Euro', '€', 'Cent', 100, 'true', '&#x20AC;', ',', '.', 978),
(46, 100, 'FJD', 'Fijian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 242),
(47, 100, 'FKP', 'Falkland Pound', '£', 'Penny', 100, 'false', '&#x00A3;', '.', ',', 238),
(48, 3, 'GBP', 'British Pound', '£', 'Penny', 100, 'true', '&#x00A3;', '.', ',', 826),
(49, 100, 'GEL', 'Georgian Lari', 'ლ', 'Tetri', 100, 'false', '', '.', ',', 981),
(50, 100, 'GHS', 'Ghanaian Cedi', '₵', 'Pesewa', 100, 'true', '&#x20B5;', '.', ',', 936),
(51, 100, 'GIP', 'Gibraltar Pound', '£', 'Penny', 100, 'true', '&#x00A3;', '.', ',', 292),
(52, 100, 'GMD', 'Gambian Dalasi', 'D', 'Butut', 100, 'false', '', '.', ',', 270),
(53, 100, 'GNF', 'Guinean Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 324),
(54, 100, 'GTQ', 'Guatemalan Quetzal', 'Q', 'Centavo', 100, 'true', '', '.', ',', 320),
(55, 100, 'GYD', 'Guyanese Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 328),
(56, 100, 'HKD', 'Hong Kong Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 344),
(57, 100, 'HNL', 'Honduran Lempira', 'L', 'Centavo', 100, 'true', '', '.', ',', 340),
(58, 100, 'HRK', 'Croatian Kuna', 'kn', 'Lipa', 100, 'true', '', ',', '.', 191),
(59, 100, 'HTG', 'Haitian Gourde', 'G', 'Centime', 100, 'false', '', '.', ',', 332),
(60, 100, 'HUF', 'Hungarian Forint', 'Ft', 'Fillér', 100, 'false', '', ',', '.', 348),
(61, 100, 'IDR', 'Indonesian Rupiah', 'Rp', 'Sen', 100, 'true', '', ',', '.', 360),
(62, 100, 'ILS', 'Israeli New Sheqel', '₪', 'Agora', 100, 'true', '&#x20AA;', '.', ',', 376),
(63, 100, 'INR', 'Indian Rupee', '₹', 'Paisa', 100, 'true', '&#x20b9;', '.', ',', 356),
(64, 100, 'IQD', 'Iraqi Dinar', 'ع.د', 'Fils', 1000, 'false', '', '.', ',', 368),
(65, 100, 'IRR', 'Iranian Rial', '﷼', 'Dinar', 100, 'true', '&#xFDFC;', '.', ',', 364),
(66, 100, 'ISK', 'Icelandic Króna', 'kr', 'Eyrir', 100, 'true', '', ',', '.', 352),
(67, 100, 'JMD', 'Jamaican Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 388),
(68, 100, 'JOD', 'Jordanian Dinar', 'د.ا', 'Piastre', 100, 'true', '', '.', ',', 400),
(69, 6, 'JPY', 'Japanese Yen', '¥', 'null', 1, 'true', '&#x00A5;', '.', ',', 392),
(70, 100, 'KES', 'Kenyan Shilling', 'KSh', 'Cent', 100, 'true', '', '.', ',', 404),
(71, 100, 'KGS', 'Kyrgyzstani Som', 'som', 'Tyiyn', 100, 'false', '', '.', ',', 417),
(72, 100, 'KHR', 'Cambodian Riel', '៛', 'Sen', 100, 'false', '&#x17DB;', '.', ',', 116),
(73, 100, 'KMF', 'Comorian Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 174),
(74, 100, 'KPW', 'North Korean Won', '₩', 'Chŏn', 100, 'false', '&#x20A9;', '.', ',', 408),
(75, 100, 'KRW', 'South Korean Won', '₩', 'null', 1, 'true', '&#x20A9;', '.', ',', 410),
(76, 100, 'KWD', 'Kuwaiti Dinar', 'د.ك', 'Fils', 1000, 'true', '', '.', ',', 414),
(77, 100, 'KYD', 'Cayman Islands Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 136),
(78, 100, 'KZT', 'Kazakhstani Tenge', '〒', 'Tiyn', 100, 'false', '', '.', ',', 398),
(79, 100, 'LAK', 'Lao Kip', '₭', 'Att', 100, 'false', '&#x20AD;', '.', ',', 418),
(80, 100, 'LBP', 'Lebanese Pound', 'ل.ل', 'Piastre', 100, 'true', '&#x00A3;', '.', ',', 422),
(81, 100, 'LKR', 'Sri Lankan Rupee', '₨', 'Cent', 100, 'false', '&#x0BF9;', '.', ',', 144),
(82, 100, 'LRD', 'Liberian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 430),
(83, 100, 'LSL', 'Lesotho Loti', 'L', 'Sente', 100, 'false', '', '.', ',', 426),
(84, 100, 'LTL', 'Lithuanian Litas', 'Lt', 'Centas', 100, 'false', '', '.', ',', 440),
(85, 100, 'LVL', 'Latvian Lats', 'Ls', 'Santīms', 100, 'true', '', '.', ',', 428),
(86, 100, 'LYD', 'Libyan Dinar', 'ل.د', 'Dirham', 1000, 'false', '', '.', ',', 434),
(87, 100, 'MAD', 'Moroccan Dirham', 'د.م.', 'Centime', 100, 'false', '', '.', ',', 504),
(88, 100, 'MDL', 'Moldovan Leu', 'L', 'Ban', 100, 'false', '', '.', ',', 498),
(89, 100, 'MGA', 'Malagasy Ariary', 'Ar', 'Iraimbilanja', 5, 'true', '', '.', ',', 969),
(90, 100, 'MKD', 'Macedonian Denar', 'ден', 'Deni', 100, 'false', '', '.', ',', 807),
(91, 100, 'MMK', 'Myanmar Kyat', 'K', 'Pya', 100, 'false', '', '.', ',', 104),
(92, 100, 'MNT', 'Mongolian Tögrög', '₮', 'Möngö', 100, 'false', '&#x20AE;', '.', ',', 496),
(93, 100, 'MOP', 'Macanese Pataca', 'P', 'Avo', 100, 'false', '', '.', ',', 446),
(94, 100, 'MRO', 'Mauritanian Ouguiya', 'UM', 'Khoums', 5, 'false', '', '.', ',', 478),
(95, 100, 'MUR', 'Mauritian Rupee', '₨', 'Cent', 100, 'true', '&#x20A8;', '.', ',', 480),
(96, 100, 'MVR', 'Maldivian Rufiyaa', 'MVR', 'Laari', 100, 'false', '', '.', ',', 462),
(97, 100, 'MWK', 'Malawian Kwacha', 'MK', 'Tambala', 100, 'false', '', '.', ',', 454),
(98, 100, 'MXN', 'Mexican Peso', '$', 'Centavo', 100, 'true', '$', '.', ',', 484),
(99, 100, 'MYR', 'Malaysian Ringgit', 'RM', 'Sen', 100, 'true', '', '.', ',', 458),
(100, 100, 'MZN', 'Mozambican Metical', 'MTn', 'Centavo', 100, 'true', '', ',', '.', 943),
(101, 100, 'NAD', 'Namibian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 516),
(102, 100, 'NGN', 'Nigerian Naira', '₦', 'Kobo', 100, 'false', '&#x20A6;', '.', ',', 566),
(103, 100, 'NIO', 'Nicaraguan Córdoba', 'C$', 'Centavo', 100, 'false', '', '.', ',', 558),
(104, 100, 'NOK', 'Norwegian Krone', 'kr', 'Øre', 100, 'true', 'kr', ',', '.', 578),
(105, 100, 'NPR', 'Nepalese Rupee', '₨', 'Paisa', 100, 'true', '&#x20A8;', '.', ',', 524),
(106, 100, 'NZD', 'New Zealand Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 554),
(107, 100, 'OMR', 'Omani Rial', 'ر.ع.', 'Baisa', 1000, 'true', '&#xFDFC;', '.', ',', 512),
(108, 100, 'PAB', 'Panamanian Balboa', 'B/.', 'Centésimo', 100, 'false', '', '.', ',', 590),
(109, 100, 'PEN', 'Peruvian Nuevo Sol', 'S/.', 'Céntimo', 100, 'true', 'S/.', '.', ',', 604),
(110, 100, 'PGK', 'Papua New Guinean Kina', 'K', 'Toea', 100, 'false', '', '.', ',', 598),
(111, 100, 'PHP', 'Philippine Peso', '₱', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 608),
(112, 100, 'PKR', 'Pakistani Rupee', '₨', 'Paisa', 100, 'true', '&#x20A8;', '.', ',', 586),
(113, 100, 'PLN', 'Polish Złoty', 'zł', 'Grosz', 100, 'false', 'z&#322;', ',', '', 985),
(114, 100, 'PYG', 'Paraguayan Guaraní', '₲', 'Céntimo', 100, 'true', '&#x20B2;', '.', ',', 600),
(115, 100, 'QAR', 'Qatari Riyal', 'ر.ق', 'Dirham', 100, 'false', '&#xFDFC;', '.', ',', 634),
(116, 100, 'RON', 'Romanian Leu', 'Lei', 'Bani', 100, 'true', '', ',', '.', 946),
(117, 100, 'RSD', 'Serbian Dinar', 'РСД', 'Para', 100, 'true', '', '.', ',', 941),
(118, 100, 'RUB', 'Russian Ruble', 'р.', 'Kopek', 100, 'false', '&#x0440;&#x0443;&#x0431;', ',', '.', 643),
(119, 100, 'RWF', 'Rwandan Franc', 'FRw', 'Centime', 100, 'false', '', '.', ',', 646),
(120, 100, 'SAR', 'Saudi Riyal', 'ر.س', 'Hallallah', 100, 'true', '&#xFDFC;', '.', ',', 682),
(121, 100, 'SBD', 'Solomon Islands Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 90),
(122, 100, 'SCR', 'Seychellois Rupee', '₨', 'Cent', 100, 'false', '&#x20A8;', '.', ',', 690),
(123, 100, 'SDG', 'Sudanese Pound', '£', 'Piastre', 100, 'true', '', '.', ',', 938),
(124, 100, 'SEK', 'Swedish Krona', 'kr', 'Öre', 100, 'false', '', ',', '', 752),
(125, 100, 'SGD', 'Singapore Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 702),
(126, 100, 'SHP', 'Saint Helenian Pound', '£', 'Penny', 100, 'false', '&#x00A3;', '.', ',', 654),
(127, 100, 'SKK', 'Slovak Koruna', 'Sk', 'Halier', 100, 'true', '', '.', ',', 703),
(128, 100, 'SLL', 'Sierra Leonean Leone', 'Le', 'Cent', 100, 'false', '', '.', ',', 694),
(129, 100, 'SOS', 'Somali Shilling', 'Sh', 'Cent', 100, 'false', '', '.', ',', 706),
(130, 100, 'SRD', 'Surinamese Dollar', '$', 'Cent', 100, 'false', '', '.', ',', 968),
(131, 100, 'SSP', 'South Sudanese Pound', '£', 'piaster', 100, 'false', '&#x00A3;', '.', ',', 728),
(132, 100, 'STD', 'São Tomé and Príncipe Dobra', 'Db', 'Cêntimo', 100, 'false', '', '.', ',', 678),
(133, 100, 'SVC', 'Salvadoran Colón', '₡', 'Centavo', 100, 'true', '&#x20A1;', '.', ',', 222),
(134, 100, 'SYP', 'Syrian Pound', '£S', 'Piastre', 100, 'false', '&#x00A3;', '.', ',', 760),
(135, 100, 'SZL', 'Swazi Lilangeni', 'L', 'Cent', 100, 'true', '', '.', ',', 748),
(136, 100, 'THB', 'Thai Baht', '฿', 'Satang', 100, 'true', '&#x0E3F;', '.', ',', 764),
(137, 100, 'TJS', 'Tajikistani Somoni', 'ЅМ', 'Diram', 100, 'false', '', '.', ',', 972),
(138, 100, 'TMT', 'Turkmenistani Manat', 'T', 'Tenge', 100, 'false', '', '.', ',', 934),
(139, 100, 'TND', 'Tunisian Dinar', 'د.ت', 'Millime', 1000, 'false', '', '.', ',', 788),
(140, 100, 'TOP', 'Tongan Paʻanga', 'T$', 'Seniti', 100, 'true', '', '.', ',', 776),
(141, 100, 'TRY', 'Turkish Lira', 'TL', 'kuruş', 100, 'false', '', ',', '.', 949),
(142, 100, 'TTD', 'Trinidad and Tobago Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 780),
(143, 100, 'TWD', 'New Taiwan Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 901),
(144, 100, 'TZS', 'Tanzanian Shilling', 'Sh', 'Cent', 100, 'true', '', '.', ',', 834),
(145, 100, 'UAH', 'Ukrainian Hryvnia', '₴', 'Kopiyka', 100, 'false', '&#x20B4;', '.', ',', 980),
(146, 100, 'UGX', 'Ugandan Shilling', 'USh', 'Cent', 100, 'false', '', '.', ',', 800),
(147, 1, 'USD', 'United States Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 840),
(148, 100, 'UYU', 'Uruguayan Peso', '$', 'Centésimo', 100, 'true', '&#x20B1;', ',', '.', 858),
(149, 100, 'UZS', 'Uzbekistani Som', 'null', 'Tiyin', 100, 'false', '', '.', ',', 860),
(150, 100, 'VEF', 'Venezuelan Bolívar', 'Bs F', 'Céntimo', 100, 'true', '', ',', '.', 937),
(151, 100, 'VND', 'Vietnamese Đồng', '₫', 'Hào', 10, 'true', '&#x20AB;', ',', '.', 704),
(152, 100, 'VUV', 'Vanuatu Vatu', 'Vt', 'null', 1, 'true', '', '.', ',', 548),
(153, 100, 'WST', 'Samoan Tala', 'T', 'Sene', 100, 'false', '', '.', ',', 882),
(154, 100, 'XAF', 'Central African Cfa Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 950),
(155, 100, 'XAG', 'Silver (Troy Ounce)', 'oz t', 'oz', 1, 'false', '', '.', ',', 961),
(156, 100, 'XAU', 'Gold (Troy Ounce)', 'oz t', 'oz', 1, 'false', '', '.', ',', 959),
(157, 100, 'XCD', 'East Caribbean Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 951),
(158, 100, 'XDR', 'Special Drawing Rights', 'SDR', '', 1, 'false', '$', '.', ',', 960),
(159, 100, 'XOF', 'West African Cfa Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 952),
(160, 100, 'XPF', 'Cfp Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 953),
(161, 100, 'YER', 'Yemeni Rial', '﷼', 'Fils', 100, 'false', '&#xFDFC;', '.', ',', 886),
(162, 100, 'ZAR', 'South African Rand', 'R', 'Cent', 100, 'true', '&#x0052;', '.', ',', 710),
(163, 100, 'ZMK', 'Zambian Kwacha', 'ZK', 'Ngwee', 100, 'false', '', '.', ',', 894),
(164, 100, 'ZMW', 'Zambian Kwacha', 'ZK', 'Ngwee', 100, 'false', '', '.', ',', 967);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `card_id`, `caption`, `gallery_image`, `status`, `created_at`, `updated_at`) VALUES
(8, '622dbeaf0ed42', 'Gallery', '/images/622dbd5274716-622dc0b8a7870.jpg', '1', '2022-03-13 06:51:21', '2022-03-13 06:51:21'),
(7, '622dbeaf0ed42', 'Gallery', '/images/622dbd5274716-622dc0b916b99.jpg', '1', '2022-03-13 06:51:21', '2022-03-13 06:51:21'),
(6, '622dbeaf0ed42', 'Gallery', '/images/622dbd5274716-622dc0b9f0397.jpg', '1', '2022-03-13 06:51:21', '2022-03-13 06:51:21'),
(5, '622dbeaf0ed42', 'Gallery', '/images/622dbd5274716-622dc0b8a7870.jpg', '1', '2022-03-13 06:51:21', '2022-03-13 06:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_gateway_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enabled',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `payment_gateway_id`, `payment_gateway_logo`, `payment_gateway_name`, `display_name`, `client_id`, `secret_key`, `is_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '60964401751ab', '/backend/img/payment-method/IMG-1620460545.png', 'Paypal', 'Paypal', '5', '6', 'enabled', '1', '2022-03-12 14:54:38', '2022-03-29 07:20:36'),
(3, '60964410732t9', '/backend/img/payment-method/IMG-1617618450.png', 'Stripe', 'Stripe', '10', '11', 'enabled', '1', '2022-03-12 14:54:38', '2022-03-12 14:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `media_id`, `user_id`, `media_name`, `media_url`, `created_at`, `updated_at`) VALUES
(1, '622dc0b78d88f', '622dbd5274716', '01.jpg', '/images/622dbd5274716-622dc0b78d88f.jpg', '2022-03-13 04:00:24', '2022-03-13 04:00:24'),
(2, '622dc0b8a7870', '622dbd5274716', '02.jpg', '/images/622dbd5274716-622dc0b8a7870.jpg', '2022-03-13 04:00:24', '2022-03-13 04:00:24'),
(3, '622dc0b8d883d', '622dbd5274716', '03.jpg', '/images/622dbd5274716-622dc0b8d883d.jpg', '2022-03-13 04:00:24', '2022-03-13 04:00:24'),
(4, '622dc0b916b99', '622dbd5274716', '04.jpg', '/images/622dbd5274716-622dc0b916b99.jpg', '2022-03-13 04:00:25', '2022-03-13 04:00:25'),
(5, '622dc0b949bbb', '622dbd5274716', '05.jpg', '/images/622dbd5274716-622dc0b949bbb.jpg', '2022-03-13 04:00:25', '2022-03-13 04:00:25'),
(6, '622dc0b97d080', '622dbd5274716', '06.jpg', '/images/622dbd5274716-622dc0b97d080.jpg', '2022-03-13 04:00:25', '2022-03-13 04:00:25'),
(7, '622dc0b9be3a9', '622dbd5274716', '07.jpg', '/images/622dbd5274716-622dc0b9be3a9.jpg', '2022-03-13 04:00:25', '2022-03-13 04:00:25'),
(8, '622dc0b9f0397', '622dbd5274716', '08.jpg', '/images/622dbd5274716-622dc0b9f0397.jpg', '2022-03-13 04:00:25', '2022-03-13 04:00:25'),
(9, '622dc0ba2c130', '622dbd5274716', '09.jpg', '/images/622dbd5274716-622dc0ba2c130.jpg', '2022-03-13 04:00:26', '2022-03-13 04:00:26'),
(10, '622dc0ba61ed0', '622dbd5274716', '10.jpg', '/images/622dbd5274716-622dc0ba61ed0.jpg', '2022-03-13 04:00:26', '2022-03-13 04:00:26'),
(11, '622dc0ba95506', '622dbd5274716', '12.jpg', '/images/622dbd5274716-622dc0ba95506.jpg', '2022-03-13 04:00:26', '2022-03-13 04:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_31_131010_create_roles_table', 1),
(5, '2021_04_01_151204_create_themes_table', 1),
(6, '2021_04_01_151457_create_plans_table', 1),
(7, '2021_04_01_151522_create_business_cards_table', 1),
(8, '2021_04_01_151647_create_services_table', 1),
(9, '2021_04_01_151712_create_galleries_table', 1),
(10, '2021_04_01_151730_create_payments_table', 1),
(11, '2021_04_01_151755_create_business_hours_table', 1),
(12, '2021_04_01_151814_create_settings_table', 1),
(13, '2021_04_01_151835_create_gateways_table', 1),
(14, '2021_04_01_151858_create_transactions_table', 1),
(15, '2021_05_10_140547_create_currencies_table', 1),
(16, '2021_07_27_190247_create_config_table', 1),
(17, '2021_07_29_140453_create_pages_table', 1),
(18, '2021_08_03_171614_create_business_fields_table', 1),
(19, '2021_08_23_184731_create_store_products_table', 1),
(20, '2021_09_21_132016_create_medias_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `section_name`, `section_title`, `section_content`, `created_at`, `updated_at`) VALUES
(1, 'home', 'banner', 'banner_title', 'Your personal brand, reimagined.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(2, 'home', 'banner', 'banner_description', 'LetsConnect is the digital business card system that\'s designed to align your digital presence one connection at a time.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(3, 'home', 'banner', 'banner_button_1', 'Sign Up', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(4, 'home', 'banner', 'banner_button_1_link', '/Login', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(5, 'home', 'banner', 'banner_button_2', 'Learn More', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(6, 'home', 'banner', 'banner_button_2_link', '#how-it-works', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(7, 'home', 'works', 'work_mini_title', 'What is LetsConnect?', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(8, 'home', 'works', 'work_title', 'First impressions really do matter.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(9, 'home', 'works', 'work_description', 'Pick your level, personalize your digital business card, share your card, create more relationships, close more deals.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(10, 'home', 'works', 'work_li_title_1', 'Create Your LetsConnect Card', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(11, 'home', 'works', 'work_li_title_2', 'Share Your LetsConnect Card', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(12, 'home', 'works', 'work_li_title_3', 'Connect With More Prospects', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(13, 'home', 'works', 'work_card_title_1', 'Here\'s A Few Examples', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(14, 'home', 'works', 'work_card_description_1', 'You can show case your product images on your business card.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(15, 'home', 'works', 'work_card_title_2', 'Testimonial', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(16, 'home', 'works', 'work_card_description_2', 'You can list your testimonials with name and messages.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(17, 'home', 'works', 'work_card_title_3', 'Save vCard', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(18, 'home', 'works', 'work_card_description_3', 'Visitor can save your phone number as vCard file format.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(19, 'home', 'works', 'work_card_title_4', 'Best for Businesses', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(20, 'home', 'works', 'work_card_description_4', 'LetsConnect Digital Business cards will help you to transform your card visitors into customers.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(21, 'home', 'features', 'feature_mini_title', 'Why Digital Business Card?', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(22, 'home', 'features', 'feature_title', 'vCard Features', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(23, 'home', 'features', 'feature_card_title_1', 'QR Code Scan', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(24, 'home', 'features', 'feature_card_description_1', 'Visitor are able to scan your card unique link', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(25, 'home', 'features', 'feature_card_description_2', 'Thumbnail and Cover', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(26, 'home', 'features', 'feature_card_description_2', 'You can upload your thumbnail and cover photo on your vcard.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(27, 'home', 'features', 'feature_card_description_3', 'Testimonial', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(28, 'home', 'features', 'feature_card_description_3', 'You can list your testimonials with name and messages.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(29, 'home', 'features', 'feature_card_description_4', 'About Section', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(30, 'home', 'features', 'feature_card_description_4', 'You can show about your business or yourself.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(31, 'home', 'features', 'feature_card_description_5', 'Share vCard Direct', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(32, 'home', 'features', 'feature_card_description_5', 'You can share your vCard direct to your contacts with one-click download capability.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(33, 'home', 'features', 'feature_card_description_6', 'Social Media Shareable', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(34, 'home', 'features', 'feature_card_description_6', 'You can share your vCard to various social platforms with one click.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(35, 'home', 'features', 'feature_card_description_7', 'Save Info', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(36, 'home', 'features', 'feature_card_description_7', 'Direct digital download into your prospect or clients phone.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(37, 'home', 'features', 'feature_card_description_8', 'Social Media Links', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(38, 'home', 'features', 'feature_card_description_8', 'Allow your prospects and customers to get a peak behind the curtain and stay connected with your brand.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(39, 'home', 'features', 'feature_card_description_9', 'Practical Application', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(40, 'home', 'features', 'feature_card_description_9', 'Our modernized design makes the sales process simple and practical.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(41, 'home', 'features', 'feature_card_description_10', 'Beautiful UI Design', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(42, 'home', 'features', 'feature_card_description_10', 'We curated our digital business card design from hundreds of A/B tested profile layouts.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(43, 'home', 'features', 'feature_card_description_11', 'Rapid Loading', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(44, 'home', 'features', 'feature_card_description_11', 'Rapid download time means your digital business card is always ready on-demand.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(45, 'home', 'features', 'feature_card_description_12', 'Unique URL Link', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(46, 'home', 'features', 'feature_card_description_12', 'Pick your customized URL link.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(47, 'home', 'pricing', 'pricing_mini_title', 'LetsConnect Plans', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(48, 'home', 'pricing', 'pricing_title', 'Pick Your Plan', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(49, 'home', 'pricing', 'pricing_subtitle', 'Good investments will gives you 10x more revenue.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(50, 'faq', 'faq', 'faq_title', 'Frequently Asked Question', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(51, 'faq', 'faq', 'faq_description', 'The most common questions about how our business works and what can do for you.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(52, 'faq', 'faq', 'faq_question_1', 'How Long is this site live?', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(53, 'faq', 'faq', 'faq_answer_1', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(54, 'faq', 'faq', 'faq_question_2', 'Can I install/upload anything I want on there?', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(55, 'faq', 'faq', 'faq_answer_2', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(56, 'faq', 'faq', 'faq_question_3', 'How can I migrate to another site?', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(57, 'faq', 'faq', 'faq_answer_3', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(58, 'faq', 'faq', 'faq_question_4', 'Can I change the domain you give me?', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(59, 'faq', 'faq', 'faq_answer_4', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(60, 'faq', 'faq', 'faq_question_5', 'How many sites I can create at once?', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(61, 'faq', 'faq', 'faq_answer_5', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(62, 'faq', 'faq', 'faq_question_6', 'How can I communicate with you?', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(63, 'faq', 'faq', 'faq_answer_6', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(64, 'footer support email', 'support', 'support_email', 'support@letsconnect.com', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(65, 'privacy', 'privacy', 'privacy_title', 'Privacy Policy for LetsConnect', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(66, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(67, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(68, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(69, 'privacy', 'privacy', 'privacy_content_title', 'Consent', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(70, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(71, 'privacy', 'privacy', 'privacy_content_title', 'Information we collect', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(72, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(73, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(74, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(75, 'privacy', 'privacy', 'privacy_content_title', 'How we use your information', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(76, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(77, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(78, 'privacy', 'privacy', 'privacy_content_title', 'Log Files', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(79, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(80, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(81, 'privacy', 'privacy', 'privacy_content_title', 'Cookies and Web Beacons', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(82, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(83, 'privacy', 'privacy', 'privacy_content_description', 'For more general information on cookies, please read \"What Are Cookies\".', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(84, 'privacy', 'privacy', 'privacy_content_title', 'Advertising Partners Privacy Policies', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(85, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(86, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(87, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(88, 'privacy', 'privacy', 'privacy_content_title', 'Third Party Privacy Policies', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(89, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(90, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(91, 'privacy', 'privacy', 'privacy_content_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(92, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(93, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(94, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(95, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(96, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(97, 'privacy', 'privacy', 'privacy_content_title', 'GDPR Data Protection Rights', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(98, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(99, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(100, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(101, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(102, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(103, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(104, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(105, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(106, 'privacy', 'privacy', 'privacy_content_title', 'Childrens Information', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(107, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(108, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(109, 'terms', 'terms', 'term_content_title', 'Terms and Conditions', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(110, 'terms', 'terms', 'term_content_description', 'Updated as of 04/09/2022', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(111, 'terms', 'terms', 'term_content_description', 'LetsConnect, Inc. (“LetsConnect,” “we,” “us,” “our”) provides its services to you through its website located at https://www.LetsConnect.site (the “Site”) and through its mobile applications and related services (collectively, such services, including any new features and applications, and the Site, the “Services”), subject to the following Terms of Service (as amended from time to time, the “Terms of Service”).', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(112, 'terms', 'terms', 'term_content_description', 'We reserve the right, at our sole discretion, to change or modify portions of these Terms of Service at any time. If we do this, we will post the changes on this page and will indicate at the top of this page the date these terms were last revised. We will also notify you, either through the Services user interface, in an email notification or through other reasonable means. For existing users of the Services, any such changes will become effective no earlier than fourteen days after they are posted, except that changes addressing new functions of the Services or changes made for legal reasons will be effective immediately, and for new users signing up for the Services, any changes will be effective immediately. Your continued use of the Service after the date any such changes become effective constitutes your acceptance of the new Terms of Service.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(113, 'terms', 'terms', 'term_content_description', 'In addition, when using certain services, you will be subject to any additional terms applicable to such services that may be posted on the Service from time to time, including, without limitation, the Privacy Policy located at https://letsconnect.site/privacy-policy. All such terms are hereby incorporated by reference into these Terms of Service.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(114, 'terms', 'terms', 'term_content_title', '1. Access and Use of the Service\r\nDescription of Services:  The Services are software accessed over the internet and via mobile devices for the purpose of sharing, updating, storing, accessing and otherwise using your own contact information and the contact information of other people in your network.  \r\n\r\nYour Registration Obligations: You are required to register with LetsConnect in order to access and use the Service. If you choose to register for the Service, you agree to provide and maintain true, accurate, current and complete information about yourself as prompted by the Service\'s registration form. Registration data and certain other information about you are governed by our Privacy Policy. If you are under 13 years of age, you are not authorized to use the Service. In addition, if you are under 18 years old, you may use the Service only with the approval of your parent or guardian.\r\n\r\nSecurity of your account: You agree to be responsible for any act or omission of any users that access the Services under your account. You agree to immediately notify LetsConnect of any breach of security of which you become aware.\r\n\r\nAccess to the Service: You are responsible for obtaining and maintaining any equipment and ancillary services needed to connect to, access or otherwise use the Service. You are responsible for ensuring that such equipment and services are compatible with the Service, and, to the extent applicable, the Software (as defined below), and complies with all configurations and specifications set forth in LetsConnect\'s published policies then in effect.\r\n\r\nModifications to the Service: LetsConnect reserves the right to modify or discontinue, temporarily or permanently, the Service (or any part thereof) with or without notice. You agree that LetsConnect will not be liable to you or to any third party for any modification, suspension or discontinuance of the Service.\r\n\r\nGeneral Practices Regarding Use and Storage: You acknowledge that LetsConnect may establish general practices and limits concerning use of the Service, including without limitation the maximum period of time that data or other content will be retained by the Service and the maximum storage space that will be allotted on LetsConnect\'s servers on your behalf. You agree that LetsConnect has no responsibility or liability for the deletion or failure to store any data or other content maintained or uploaded by the Service. You acknowledge that LetsConnect reserves the right to terminate accounts that are inactive for an extended period of time. You further acknowledge that LetsConnect reserves the right to change these general practices and limits at any time, in its sole discretion, with or without notice.\r\n\r\nMobile Services: The Service includes certain services that are available via a mobile device, including (i) the ability to upload content to the Service via a mobile device, (ii) the ability to browse the Service and the Site from a mobile device and (iii) the ability to access certain features through an application downloaded and installed on a mobile device (collectively, the “Mobile Services”). To the extent you access the Service through a mobile device, your wireless service carrier\'s standard charges, data rates and other fees may apply. In addition, downloading, installing, or using certain Mobile Services may be prohibited or restricted by your carrier, and not all Mobile Services may work with all carriers or devices.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(115, 'terms', 'terms', 'term_content_description', '2. Conditions of Use\r\nUser Conduct: You are solely responsible for all information, data, text, images, video or other materials (“Content”) that you upload, post, publish, display, transmit or send (collectively, “Transmit”) or otherwise use via the Service. You agree to use the Service in compliance with the LetsConnect Acceptable Use Policy available at www.LetsConnect.site/legal. LetsConnect reserves the right to investigate and take appropriate legal action against anyone who, in LetsConnect\'s sole discretion, violates this provision, including without limitation, suspending or terminating the account of such violators and reporting you to the law enforcement authorities.\r\n\r\nFees: To the extent the Service or any portion thereof is made available for any fee, you will be required to select a payment plan and billing frequency (annual or monthly) as described on https://letsconnect.site/#pricing and provide LetsConnect information regarding your credit card or other payment instrument. You represent and warrant to LetsConnect that such information is true and that you are authorized to use the payment instrument. You will promptly update your account information with any changes (for example, a change in your billing address or credit card expiration date) that may occur. You agree to pay LetsConnect the amount that is specified in the payment plan in accordance with the terms of such plan and this Terms of Service. You hereby authorize LetsConnect to bill your payment instrument in advance on a periodic basis in accordance with the terms of the applicable payment plan until you terminate your account, and you further agree to pay any charges so incurred. YOU ACKNOWLEDGE AND AGREE THAT (A) LETSCONNECT (OR OUR PAYMENT PROCESSOR) IS AUTHORIZED TO CHARGE YOU ON A RECURRING BASIS (E.G., MONTHLY OR YEARLY) FOR AS LONG AS YOUR SUBSCRIPTION TO THE SERVICE CONTINUES AND (B) YOUR SUBSCRIPTION WILL CONTINUE UNTIL YOU CANCEL IT OR WE SUSPEND OR STOP PROVIDING ACCESS TO THE SERVICES. YOU MAY CANCEL YOUR SUBSCRIPTION AT ANY TIME BY EMAILING US AT [SUPPORT@LETSCONNECT.SITE] OR VIA THE INTERFACE OF THE SERVICES; PROVIDED, THAT, ANY SUCH CANCELATION WILL BE EFFECTIVE AT THE END OF YOUR CURRENT ANNUAL OR MONTHLY BILLING PERIOD, AND THAT CANCELATION WILL NOT RESULT IN ANY REFUND OF PREPAID FEES. If you dispute any charges you must notify LetsConnect in writing within sixty (60) days after the date that LetsConnect charges you. We reserve the right to change LetsConnect\'s prices. If LetsConnect does change prices, LetsConnect will provide notice of the change through the Service or in email to you, at LetsConnect\'s option, at least 30 days before the change is to take effect. Your continued use of the Service after the price change becomes effective constitutes your agreement to pay the changed amount. LetsConnect may choose to bill through an invoice, in which case, full payment for invoices issued in any given month must be received by LetsConnect thirty (30) days after the mailing date of the invoice, or the Services may be terminated. Unpaid invoices are subject to a finance charge of 1.5% per month on any outstanding balance, or the maximum permitted by law, whichever is lower, plus all expenses of collection. You shall be responsible for all taxes associated with the Services other than U.S. taxes based on LetsConnect\'s net income.\r\n\r\nBusiness Accounts:  If you have been provided access to the service as part of your employer’s business account with LetsConnect, then you acknowledge that your right to access and use the Service is subject to the terms of a separate agreement between LetsConnect and your employer.  Your access to the Service may be revoked by your employer at any time.\r\n\r\nSpecial Notice for International Use; Export Controls: Software available in connection with the Service and the transmission of applicable data, if any, is subject to United States export controls. No Software may be downloaded from the Service or otherwise exported or re-exported in violation of U.S. export laws. Downloading or using the Software is at your sole risk. Recognizing the global nature of the Internet, you agree to comply with all local rules and laws regarding your use of the Service, including as it concerns online conduct and acceptable content.\r\n\r\nCommercial Use: Unless otherwise expressly authorized herein or in the Service, you agree not to display, distribute, license, perform, publish, reproduce, duplicate, copy, create derivative works from, modify, sell, resell, exploit, transfer or transmit for any commercial purposes, any portion of the Service, use of the Service, or access to the Service.\r\n\r\nData Processing Addendum: To the extent we process any Customer Personal Data (as defined in the Addendum) that is subject to the GDPR (as defined in the Addendum) on your behalf, the terms of the data processing addendum at https://www.LetsConnect.me/legal (“Addendum”), which are hereby incorporated by reference, shall apply and the parties agree to comply with such terms.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(116, 'terms', 'terms', 'term_content_description', '3. Third Party Distribution Channels\r\nLetsConnect offers Software applications that may be made available through the Apple App Store, Android Marketplace or other distribution channels (“Distribution Channels”). If you obtain such Software through a Distribution Channel, you may be subject to additional terms of the Distribution Channel. These Terms of Service are between you and us only, and not with the Distribution Channel. To the extent that you utilize any other third party products and services in connection with your use of our Services, you agree to comply with all applicable terms of any agreement for such third party products and services.\r\n\r\nWith respect to Software that is made available for your use in connection with an Apple-branded product (such Software, “Apple-Enabled Software”), in addition to the other terms and conditions set forth in these Terms of Service, the following terms and conditions apply:\r\n\r\nLetsConnect and you acknowledge that these Terms of Service are concluded between LetsConnect and you only, and not with Apple Inc. (“Apple”), and that as between LetsConnect and Apple, LetsConnect, not Apple, is solely responsible for the Apple-Enabled Software and the content thereof.\r\n\r\nYou may not use the Apple-Enabled Software in any manner that is in violation of or inconsistent with the Usage Rules set forth for Apple-Enabled Software in, or otherwise be in conflict with, the App Store Terms of Service.\r\n\r\nYour license to use the Apple-Enabled Software is limited to a non-transferable license to use the Apple-Enabled Software on an iOS Product that you own or control, as permitted by the Usage Rules set forth in the App Store Terms of Service.\r\n\r\nApple has no obligation whatsoever to provide any maintenance or support services with respect to the Apple-Enabled Software.\r\n\r\nApple is not responsible for any product warranties, whether express or implied by law. In the event of any failure of the Apple-Enabled Software to conform to any applicable warranty, you may notify Apple, and Apple will refund the purchase price for the Apple-Enabled Software to you, if any; and, to the maximum extent permitted by applicable law, Apple will have no other warranty obligation whatsoever with respect to the Apple-Enabled Software, or any other claims, losses, liabilities, damages, costs or expenses attributable to any failure to conform to any warranty, which will be LetsConnect\'s sole responsibility, to the extent it cannot be disclaimed under applicable law.\r\n\r\nLetsConnect and you acknowledge that LetsConnect, not Apple, is responsible for addressing any claims of you or any third party relating to the Apple-Enabled Software or your possession and/or use of that Apple-Enabled Software, including, but not limited to: (i) product liability claims; (ii) any claim that the Apple-Enabled Software fails to conform to any applicable legal or regulatory requirement; and (iii) claims arising under consumer protection or similar legislation.\r\n\r\nIn the event of any third party claim that the Apple-Enabled Software or the end-user\'s possession and use of that Apple-Enabled Software infringes that third party\'s intellectual property rights, as between LetsConnect and Apple, LetsConnect, not Apple, will be solely responsible for the investigation, defense, settlement and discharge of any such intellectual property infringement claim.\r\n\r\nYou represent and warrant that (i) you are not located in a country that is subject to a U.S. Government embargo, or that has been designated by the U.S. Government as a \"terrorist supporting\" country; and (ii) you are not listed on any U.S. Government list of prohibited or restricted parties.\r\n\r\nIf you have any questions, complaints or claims with respect to the Apple-Enabled Software, they should be directed to LetsConnect as follows:\r\n\r\nsupport@letsconnect.site\r\n\r\n2406 S. Jupiter Rd. STE 3 Garland, TX 75041\r\n\r\nLetsConnect and you acknowledge and agree that Apple, and Apple\'s subsidiaries, are third party beneficiaries of these Terms of Service with respect to the Apple-Enabled Software, and that, upon your acceptance of the terms and conditions of these Terms of Service, Apple will have the right (and will be deemed to have accepted the right) to enforce these Terms of Service against you with respect to the Apple-Enabled Software as a third party beneficiary thereof.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(117, 'terms', 'terms', 'term_content_title', '4. Intellectual Property Rights\r\nService Content, Software and Trademarks: You acknowledge and agree that the Service may contain content or features (“Service Content”) that are protected by copyright, patent, trademark, trade secret or other proprietary rights and laws. Except as expressly authorized by LetsConnect, you agree not to modify, copy, frame, scrape, rent, lease, loan, sell, distribute or create derivative works based on the Service or the Service Content, in whole or in part, except that the foregoing does not apply to your own User Content (as defined below) that you legally upload to the Service. In connection with your use of the Service you will not engage in or use any data mining, robots, scraping or similar data gathering or extraction methods. If you are blocked by LetsConnect from accessing the Service (including by blocking your IP address), you agree not to implement any measures to circumvent such blocking (e.g., by masking your IP address or using a proxy IP address). Any use of the Service or the Service Content other than as specifically authorized herein is strictly prohibited. The technology and software underlying the Service or distributed in connection therewith are the property of LetsConnect, our affiliates and our partners (the “Software”). You agree not to copy, modify, create a derivative work of, reverse engineer, reverse assemble or otherwise attempt to discover any source code, sell, assign, sublicense, or otherwise transfer any right in the Software. Any rights not expressly granted herein are reserved by LetsConnect.\r\n\r\nThe LetsConnect name and logos are trademarks and service marks of LetsConnect (collectively the “LetsConnect Trademarks”). Other LetsConnect, product, and service names and logos used and displayed via the Service may be trademarks or service marks of their respective owners who may or may not endorse or be affiliated with or connected to LetsConnect. Nothing in this Terms of Service or the Service should be construed as granting, by implication, estoppel, or otherwise, any license or right to use any of LetsConnect Trademarks displayed on the Service, without our prior written permission in each instance. All goodwill generated from the use of LetsConnect Trademarks will inure to our exclusive benefit.\r\n\r\nThird Party Material: Under no circumstances will LetsConnect be liable in any way for any content or materials of any third parties (including users), including, but not limited to, for any errors or omissions in any Content, or for any loss or damage of any kind incurred as a result of the use of any such content. You acknowledge that LetsConnect does not pre-screen content, but that LetsConnect and its designees will have the right (but not the obligation) in their sole discretion to refuse or remove any Content that is available via the Service. You agree that you must evaluate, and bear all risks associated with, the use of any content, including any reliance on the accuracy, completeness, or usefulness of such content.\r\n\r\nUser Content Transmitted Through the Service: With respect to the Content or other materials you transmit through the Service or share with other users or recipients (collectively, “User Content”), you represent and warrant that you own all right, title and interest in and to such User Content, including, without limitation, all copyrights and rights of publicity contained therein. By transmitting any User Content through the Service, you hereby grant and will grant LetsConnect and its affiliated companies a license to perform the actions necessary to deliver User Content to the intended recipients. You also acknowledge and agree that User Content does not include any System Data. System Data is owned by LetsConnect. “System Data” means aggregated and anonymous user and other data regarding the Services that may be used to generate logs, statistics and reports regarding performance, availability, integrity and security of the Services. System Data does not include the contact information or Personal Data of your contacts that you upload or receive through the Service.\r\n\r\nYou acknowledge and agree that any questions, comments, suggestions, ideas, feedback or other information about the Service provided by you to LetsConnect (“Submissions”), and any User Content that you make available through the Service in a manner that allows other users of the Service and/or members of the general public not specified or identified by you to access your User Content (“Public User Content”) are non-confidential and LetsConnect will be entitled to the unrestricted use and dissemination of these Submissions and Public User Content for any purpose, commercial or otherwise, without acknowledgment or compensation to you.\r\n\r\nYou acknowledge and agree that LetsConnect may preserve content and may also disclose content if required to do so by law or in the good faith belief that such preservation or disclosure is reasonably necessary to: (a) comply with legal process, applicable laws or government requests; (b) enforce these Terms of Service; (c) respond to claims that any content violates the rights of third parties; or (d) protect the rights, property, or personal safety of LetsConnect, its users and the public. You understand that the technical processing and transmission of the Service, including your content, may involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(118, 'terms', 'terms', 'term_content_description', '5. Third Party Services\r\nThe Service may provide, or third parties may provide, links or other access to other sites, services, products, and resources on the Internet (“Third Party Services”). LetsConnect has no control over such Third Party Services and LetsConnect is not responsible for and does not endorse such Third Party Services. You further acknowledge and agree that LetsConnect will not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any content, events, goods or services available on or through any such Third Party Service. Any dealings you have with third parties found while using the Service are between you and the third party, and you agree that LetsConnect is not liable for any loss or claim that you may have against any such third party.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(119, 'terms', 'terms', 'term_content_description', '6. Indemnity and Release\r\nYou agree to release, indemnify and hold LetsConnect and its affiliates and their officers, employees, directors and agents (collectively, “Indemnitees”) harmless from any from any and all losses, damages, expenses, including reasonable attorneys\' fees, rights, claims, actions of any kind and injury (including death) arising out of or relating to your use of the Service, any User Content, your connection to the Service, your violation of these Terms of Service or your violation of any rights of another. Notwithstanding the foregoing, you will have no obligation to indemnify or hold harmless any Indemnitee from or against any liability, losses, damages or expenses incurred as a result of any action or inaction of such Indemnitee. If you are a California resident, you waive California Civil Code Section 1542, which says: “A general release does not extend to claims which the creditor does not know or suspect to exist in his favor at the time of executing the release, which if known by him must have materially affected his settlement with the debtor.” If you are a resident of another jurisdiction, you waive any comparable statute or doctrine.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(120, 'terms', 'terms', 'term_content_description', '7. Disclaimer of Warranties\r\nYOUR USE OF THE SERVICE IS AT YOUR SOLE RISK. THE SERVICE IS PROVIDED ON AN “AS IS” AND “AS AVAILABLE” BASIS. LETSCONNECT EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS, IMPLIED OR STATUTORY, INCLUDING, BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT.\r\n\r\nLETSCONNECT MAKES NO WARRANTY THAT (I) THE SERVICE WILL MEET YOUR REQUIREMENTS, (II) THE SERVICE WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR-FREE, (III) THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE SERVICE WILL BE ACCURATE OR RELIABLE, OR (IV) THE QUALITY OF ANY PRODUCTS, SERVICES, INFORMATION, OR OTHER MATERIAL PURCHASED OR OBTAINED BY YOU THROUGH THE SERVICE WILL MEET YOUR EXPECTATIONS.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(121, 'terms', 'terms', 'term_content_description', '8. Limitation of Liability\r\nYOU EXPRESSLY UNDERSTAND AND AGREE THAT LETSCONNECT WILL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, EXEMPLARY DAMAGES, OR DAMAGES FOR LOSS OF PROFITS INCLUDING BUT NOT LIMITED TO, DAMAGES FOR LOSS OF GOODWILL, USE, DATA OR OTHER INTANGIBLE LOSSES (EVEN IF LETSCONNECT HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES), WHETHER BASED ON CONTRACT, TORT, NEGLIGENCE, STRICT LIABILITY OR OTHERWISE, RESULTING FROM: (I) THE USE OR THE INABILITY TO USE THE SERVICE; (II) THE COST OF PROCUREMENT OF SUBSTITUTE GOODS AND SERVICES RESULTING FROM ANY GOODS, DATA, INFORMATION OR SERVICES PURCHASED OR OBTAINED OR MESSAGES RECEIVED OR TRANSACTIONS ENTERED INTO THROUGH OR FROM THE SERVICE; (III) UNAUTHORIZED ACCESS TO OR ALTERATION OF YOUR TRANSMISSIONS OR DATA; (IV) STATEMENTS OR CONDUCT OF ANY THIRD PARTY ON THE SERVICE; OR (V) ANY OTHER MATTER RELATING TO THE SERVICE. IN NO EVENT WILL LETSCONNECT\'S TOTAL LIABILITY TO YOU FOR ALL DAMAGES, LOSSES OR CAUSES OF ACTION EXCEED THE AMOUNT YOU HAVE PAID LETSCONNECT IN THE LAST SIX (6) MONTHS, OR, IF GREATER, ONE HUNDRED DOLLARS ($100).\r\n\r\nSOME JURISDICTIONS DO NOT ALLOW THE DISCLAIMER OR EXCLUSION OF CERTAIN WARRANTIES OR THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES. ACCORDINGLY, SOME OF THE ABOVE LIMITATIONS SET FORTH ABOVE MAY NOT APPLY TO YOU OR BE ENFORCEABLE WITH RESPECT TO YOU AND ARE INTENDED TO BE ONLY AS BROAD AS IS PERMITTED UNDER THE LAWS OF THE APPLICABLE STATE.  IF ANY PORTION OF THESE SECTIONS IS HELD TO BE INVALID UNDER APPLICABLE LAWS, THE INVALIDITY OF SUCH PORTION SHALL NOT AFFECT THE VALIDITY OF THE REMAINING PORTIONS OF THE APPLICABLE SECTIONS. IF YOU ARE DISSATISFIED WITH ANY PORTION OF THE SERVICE OR WITH THESE TERMS OF SERVICE, YOUR SOLE AND EXCLUSIVE REMEDY IS TO DISCONTINUE USE OF THE SERVICE.', '2022-03-12 14:54:38', '2022-03-12 14:54:38');
INSERT INTO `pages` (`id`, `page_name`, `section_name`, `section_title`, `section_content`, `created_at`, `updated_at`) VALUES
(122, 'terms', 'terms', 'term_content_description', '9. Dispute Resolution By Binding Arbitration\r\nPLEASE READ THIS SECTION CAREFULLY AS IT AFFECTS YOUR RIGHTS.\r\n\r\na. Agreement to Arbitrate\r\n\r\nThis Dispute Resolution by Binding Arbitration section is referred to in this Terms of Service as the “Arbitration Agreement.” You agree that any and all disputes or claims that have arisen or may arise between you and LetsConnect, whether arising out of or relating to this Terms of Service (including any alleged breach thereof), the Services, any advertising, any aspect of the relationship or transactions between us, shall be resolved exclusively through final and binding arbitration, rather than a court, in accordance with the terms of this Arbitration Agreement, except that you may assert individual claims in small claims court, if your claims qualify. Further, this Arbitration Agreement does not preclude you from bringing issues to the attention of federal, state, or local agencies, and such agencies can, if the law allows, seek relief against us on your behalf. You agree that, by entering into this Terms of Service, you and LetsConnect are each waiving the right to a trial by jury or to participate in a class action. Your rights will be determined by a neutral arbitrator, not a judge or jury. The Federal Arbitration Act governs the interpretation and enforcement of this Arbitration Agreement.\r\n\r\nb. Prohibition of Class and Representative Actions and Non-Individualized Relief\r\n\r\nYOU AND LETSCONNECT AGREE THAT EACH OF US MAY BRING CLAIMS AGAINST THE OTHER ONLY ON AN INDIVIDUAL BASIS AND NOT AS A PLAINTIFF OR CLASS MEMBER IN ANY PURPORTED CLASS OR REPRESENTATIVE ACTION OR PROCEEDING. UNLESS BOTH YOU AND LETSCONNECT AGREE OTHERWISE, THE ARBITRATOR MAY NOT CONSOLIDATE OR JOIN MORE THAN ONE PERSON\'S OR PARTY\'S CLAIMS AND MAY NOT OTHERWISE PRESIDE OVER ANY FORM OF A CONSOLIDATED, REPRESENTATIVE, OR CLASS PROCEEDING. ALSO, THE ARBITRATOR MAY AWARD RELIEF (INCLUDING MONETARY, INJUNCTIVE, AND DECLARATORY RELIEF) ONLY IN FAVOR OF THE INDIVIDUAL PARTY SEEKING RELIEF AND ONLY TO THE EXTENT NECESSARY TO PROVIDE RELIEF NECESSITATED BY THAT PARTY\'S INDIVIDUAL CLAIM(S), EXCEPT THAT YOU MAY PURSUE A CLAIM FOR AND THE ARBITRATOR MAY AWARD PUBLIC INJUNCTIVE RELIEF UNDER APPLICABLE LAW TO THE EXTENT REQUIRED FOR THE ENFORCEABILITY OF THIS PROVISION.\r\n\r\nc. Pre-Arbitration Dispute Resolution\r\n\r\nLetsConnect is always interested in resolving disputes amicably and efficiently, and most customer concerns can be resolved quickly and to the customer\'s satisfaction by emailing customer support at support@LetsConnect.site. If such efforts prove unsuccessful, a party who intends to seek arbitration must first send to the other, by certified mail, a written Notice of Dispute (“Notice”). The Notice to LetsConnect should be sent to 2406 S. Jupiter Rd. STE 3 Garland, TX 75041 (“Notice Address”). The Notice must (i) describe the nature and basis of the claim or dispute and (ii) set forth the specific relief sought. If LetsConnect and you do not resolve the claim within sixty (60) calendar days after the Notice is received, you or LetsConnect may commence an arbitration proceeding. During the arbitration, the amount of any settlement offer made by LetsConnect or you shall not be disclosed to the arbitrator until after the arbitrator determines the amount, if any, to which you or LetsConnect is entitled.\r\n\r\nd. Arbitration Procedures\r\n\r\nArbitration will be conducted by a neutral arbitrator in accordance with the American Arbitration Association’s (“AAA”) rules and procedures, including the AAA\'s Consumer Arbitration Rules (collectively, the “AAA Rules”), as modified by this Arbitration Agreement. For information on the AAA, please visit its website, https://www.adr.org. Information about the AAA Rules and fees for consumer disputes can be found at the AAA\'s consumer arbitration page, https://www.adr.org/consumer_arbitration . If there is any inconsistency between any term of the AAA Rules and any term of this Arbitration Agreement, the applicable terms of this Arbitration Agreement will control unless the arbitrator determines that the application of the inconsistent Arbitration Agreement terms would not result in a fundamentally fair arbitration. The arbitrator must also follow the provisions of these Terms of Service as a court would. All issues are for the arbitrator to decide, including, but not limited to, issues relating to the scope, enforceability, and arbitrability of this Arbitration Agreement. Although arbitration proceedings are usually simpler and more streamlined than trials and other judicial proceedings, the arbitrator can award the same damages and relief on an individual basis that a court can award to an individual under the Terms of Service and applicable law. Decisions by the arbitrator are enforceable in court and may be overturned by a court only for very limited reasons.\r\n\r\nUnless LetsConnect and you agree otherwise, any arbitration hearings will take place in a reasonably convenient location for both parties with due consideration of their ability to travel and other pertinent circumstances. If the parties are unable to agree on a location, the determination shall be made by AAA.  If your claim exceeds $10,000, the right to a hearing will be determined by the AAA Rules. Regardless of the manner in which the arbitration is conducted, the arbitrator shall issue a reasoned written decision sufficient to explain the essential findings and conclusions on which the award is based.\r\n\r\n\r\n\r\ne. Costs of Arbitration\r\n\r\nPayment of all filing, administration, and arbitrator fees (collectively, the “Arbitration Fees”) will be governed by the AAA Rules, unless otherwise provided in this Arbitration Agreement. If you are able to demonstrate to the arbitrator that you are economically unable to pay your portion of the Arbitration Fees or if the arbitrator otherwise determines for any reason that you should not be required to pay your portion of the Arbitration Fees, LetsConnect will pay your portion of such fees. In addition, if you demonstrate to the arbitrator that the costs of arbitration will be prohibitive as compared to the costs of litigation, LetsConnect will pay as much of the Arbitration Fees as the arbitrator deems necessary to prevent the arbitration from being cost-prohibitive. Any payment of attorneys\' fees will be governed by the AAA Rules.\r\n\r\nf. Confidentiality\r\n\r\nAll aspects of the arbitration proceeding, and any ruling, decision, or award by the arbitrator, will be strictly confidential for the benefit of all parties.\r\n\r\ng. Severability\r\n\r\nIf a court or the arbitrator decides that any term or provision of this Arbitration Agreement (other than the subsection (b) titled “Prohibition of Class and Representative Actions and Non-Individualized Relief” above) is invalid or unenforceable, the parties agree to replace such term or provision with a term or provision that is valid and enforceable and that comes closest to expressing the intention of the invalid or unenforceable term or provision, and this Arbitration Agreement shall be enforceable as so modified. If a court or the arbitrator decides that any of the provisions of subsection (b) above titled “Prohibition of Class and Representative Actions and Non-Individualized Relief” are invalid or unenforceable, then the entirety of this Arbitration Agreement shall be null and void, unless such provisions are deemed to be invalid or unenforceable solely with respect to claims for public injunctive relief. The remainder of the Terms of Service will continue to apply.\r\n\r\nh. Future Changes to Arbitration Agreement\r\n\r\nNotwithstanding any provision in this Terms of Service to the contrary, LetsConnect agrees that if it makes any future change to this Arbitration Agreement (other than a change to the Notice Address) while you are a user of the Services, you may reject any such change by sending LetsConnect written notice within thirty (30) calendar days of the change to the Notice Address provided above. By rejecting any future change, you are agreeing that you will arbitrate any dispute between us in accordance with the language of this Arbitration Agreement as of the date you first accepted these Terms of Service (or accepted any subsequent changes to these Terms of Service).', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(123, 'terms', 'terms', 'term_content_description', '10. Termination\r\nYou agree that LetsConnect, in its sole discretion, may suspend or terminate your account (or any part thereof) or use of the Service and remove and discard any content within the Service, for any reason, including, without limitation, for lack of use or if LetsConnect believes that you have violated or acted inconsistently with the letter or spirit of these Terms of Service. Any suspected fraudulent, abusive or illegal activity that may be grounds for termination of your use of Service, may be referred to appropriate law enforcement authorities. LetsConnect may also in its sole discretion and at any time discontinue providing the Service, or any part thereof, with or without notice. You agree that any termination of your access to the Service under any provision of this Terms of Service may be effected without prior notice, and acknowledge and agree that LetsConnect may immediately deactivate or delete your account and all related information and files in your account and/or bar any further access to such files or the Service. Further, you agree that LetsConnect will not be liable to you or any third party for any termination of your access to the Service.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(124, 'terms', 'terms', 'term_content_description', '11. User Disputes\r\nYou agree that you are solely responsible for your interactions with any other user in connection with the Service and LetsConnect will have no liability or responsibility with respect thereto. LetsConnect reserves the right, but has no obligation, to become involved in any way with disputes between you and any other user of the Service.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(125, 'terms', 'terms', 'term_content_description', '12. General\r\nThese Terms of Service constitute the entire agreement between you and LetsConnect and govern your use of the Service, superseding any prior agreements between you and LetsConnect with respect to the Service. You also may be subject to additional terms and conditions that may apply when you use affiliate or third party services, third party content or third party software. These Terms of Service will be governed by the laws of the State of California without regard to its conflict of law provisions. With respect to any disputes or claims not subject to arbitration, as set forth above, you and LetsConnect agree to submit to the personal and exclusive jurisdiction of the state and federal courts located within Santa Clara County, California. The failure of LetsConnect to exercise or enforce any right or provision of these Terms of Service will not constitute a waiver of such right or provision. If any provision of these Terms of Service is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties\' intentions as reflected in the provision, and the other provisions of these Terms of Service remain in full force and effect. You agree that regardless of any statute or law to the contrary, any claim or cause of action arising out of or related to use of the Service or these Terms of Service must be filed within one (1) year after such claim or cause of action arose or be forever barred. A printed version of this agreement and of any notice given in electronic form will be admissible in judicial or administrative proceedings based upon or relating to this agreement to the same extent and subject to the same conditions as other business documents and records originally generated and maintained in printed form. You may not assign this Terms of Service without the prior written consent of LetsConnect, but LetsConnect may assign, sublicense, or transfer any or all of its rights and obligations under this Terms of Service without restriction. The section titles in these Terms of Service are for convenience only and have no legal or contractual effect. Notices to you may be made via either email or regular mail. The Service may also provide notices to you of changes to these Terms of Service or other matters by displaying notices or links to notices generally on the Service.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(126, 'terms', 'terms', 'term_content_description', '13. Your Privacy\r\nAt LetsConnect, we respect the privacy of our users. For details please see our Privacy Policy at https://www.LetsConnect.site/legal. By using the Service, you consent to our collection and use of personal data as outlined therein.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(127, 'terms', 'terms', 'term_content_title', '14. Notice for California Users\r\nUnder California Civil Code Section 1789.3, users of the Service from California are entitled to the following specific consumer rights notice: The Complaint Assistance Unit of the Division of Consumer Services of the California Department of Consumer Affairs may be contacted in writing at 1625 North Market Blvd., Suite N 112, Sacramento, CA 95834, or by telephone at (916) 445-1254 or (800) 952-5210. You may contact us at LetsConnect, LLC., 2406 S. Jupiter RD. STE 3 Garland, TX 75041', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(128, 'terms', 'terms', 'term_content_description', 'Questions? Concerns? Suggestions? Please contact us at support@LetsConnect.site to report any violations of these Terms of Service or to pose any questions regarding this Terms of Service or the Service.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(129, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(130, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(131, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(132, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(133, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(134, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(135, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(136, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(137, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(138, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(139, 'terms', 'terms', 'term_content_title', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(140, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(141, 'terms', 'terms', 'term_content_title', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(142, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(143, 'terms', 'terms', 'term_content_title', 'All Rights Reserved 2022 LetsConnect, LLC.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(144, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(145, 'terms', 'terms', 'term_content_title', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(146, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(147, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(148, 'terms', 'terms', 'term_content_title', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(149, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(150, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(151, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(152, 'terms', 'terms', 'term_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(153, 'footer', 'footer', 'social-facebook', 'https://www.facebook.com/LetsConnect.site', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(154, 'footer', 'footer', 'social-twitter', 'https://twitter.com/Mr_LetsConnect', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(155, 'footer', 'footer', 'social-instagram', 'https://www.instagram.com/letsconnect.site/', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(156, 'footer', 'footer', 'social-linkedIn', 'https://www.linkedin.com/in/mr-letsconnect/', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(157, 'refund', 'refund', 'refund-title', 'Refund Policy', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(158, 'refund', 'refund', 'refund-desc', 'LetsConnect is available for free. If you want access to features like custom colors, different card designs, a personalized URL, removing LetsConnect branding, and more, you’ll need to upgrade to one of our premium plans. We offer subscriptions for individuals and businesses, with prices starting as low as $4.00/month.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(159, 'refund', 'refund', 'desc', 'However, if you’re unsatisfied with LetsConnect and feel that our upcoming innovations won\'t suit your needs, we will gladly refund up to 3-months billing. Of course we\'ll ask some questions to see what it is we can do better, but we won\'t tie you down and pry them out! You\'re welcome to keep your \"free\" level LetsConnect for life.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(160, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(161, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(162, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(163, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(164, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(165, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(166, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(167, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(168, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(169, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(170, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(171, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(172, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(173, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(174, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(175, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(176, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(221, 'legal-gdpr', 'Legal-&-GDPR', 'Page name\r\n', 'Legal & GDPR', '2022-04-20 21:21:45', '2022-04-20 21:21:45'),
(177, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(178, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(179, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(180, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(181, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(182, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(183, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(184, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(185, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(186, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(187, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(188, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(189, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(190, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(220, 'legal-gdpr', 'Legal-&-GDPR', 'Legal & GDPR content description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-24 19:33:48', '2022-04-24 19:33:48'),
(191, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(192, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(193, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(194, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(195, 'refund', 'refund', 'desc', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(196, 'contact', 'contact', 'page_name', 'LetsConnect', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(197, 'contact', 'contact', 'page_subtitle', 'Literally, let\'s connect.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(198, 'contact', 'contact', 'page_section_1', 'Office', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(199, 'contact', 'contact', 'page_section_1_content_1', 'Dallas, TX', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(200, 'contact', 'contact', 'page_section_1_content_2', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(201, 'contact', 'contact', 'page_section_2', 'Contacts', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(202, 'contact', 'contact', 'page_section_2_content_1', 'sales@letsconnect.com', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(203, 'contact', 'contact', 'page_section_2_content_1', '(325) 999-5387', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(204, 'contact', 'contact', 'page_section_3', 'Socials', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(205, 'about', 'about', 'about_content_title', 'About Us:', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(206, 'about', 'about', 'about_content_description', 'What\'s Different:', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(207, 'about', 'about', 'about_content_description', 'Sales and networking events are exhausting. LetsConnect bridges the gap between meeting your target prospects and the actual workflow of bringing them into your network. While there are some exceptionally talents networking individuals out there, the majority of us find ourselves lacking the focus and discipline it takes to pursue more than 10 relationships at a time. This is where LetsConnect takes over by combining automation systems with CRM funnels to simultaneously warm up your prospects while also positioning you as an authority in your niche. Further, LetsConnect has pre-made templates ready to customize for your automations to ensure a quick and painless integration to your systems.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(208, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(209, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(210, 'about', 'about', 'about_content_title', 'Mission:', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(211, 'about', 'about', 'about_content_description', 'LetsConnect uses reciprocal compliance to gain the trust of the users prospects leading to higher conversion rates, lifecycles, and referral percentages for the users products and services. By harvesting data throughout the process, LetsConnect harmoniously warms and recycles leads as they move throughout the sales process.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(212, 'about', 'about', 'about_content_description', 'Whereas most marketplace offerings for similar products position themselves as digital business cards, LetsConnect has been developed as an elite-level lead generator. A sales tool rather than an exchange of contact information. LetsConnect accomplishes this through the simplicity of a digital business card while interfaced with an automation system that directs prospects into a self-guided sales funnel. By utilizing suggestive prompts the LetsConnect automation system builds trust for a prospect through reciprocal compliance.', '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(213, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(214, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(215, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(216, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(217, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(218, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(219, 'about', 'about', 'about_content_description', NULL, '2022-03-12 14:54:38', '2022-03-12 14:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `card_id`, `type`, `icon`, `label`, `content`, `position`, `status`, `created_at`, `updated_at`) VALUES
(3, '622dbeaf0ed42', 'text', 'fas fa-address-card', 'UPI or Bank', '+9192584785447', '1', '1', '2022-03-17 11:13:11', '2022-03-17 11:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_description` longtext COLLATE utf8mb4_unicode_ci,
  `plan_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_vcards` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_services` int(11) DEFAULT NULL,
  `no_of_galleries` int(11) DEFAULT NULL,
  `no_of_features` int(11) DEFAULT NULL,
  `no_of_payments` int(11) DEFAULT NULL,
  `personalized_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hide_branding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_setup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_support` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_watermark_enabled` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `plans_type` int(11) DEFAULT NULL,
  `stripe_data` longtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT '''default''',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `plan_name`, `plan_description`, `plan_price`, `validity`, `no_of_vcards`, `no_of_services`, `no_of_galleries`, `no_of_features`, `no_of_payments`, `personalized_link`, `hide_branding`, `free_setup`, `free_support`, `recommended`, `is_watermark_enabled`, `features`, `plans_type`, `stripe_data`, `name`, `slug`, `stripe_plan`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, '60673288f0d35', 'Beta Tester', 'LetsConnect Card', '0', '9999', '100', 5, 5, 5, 5, '1', '0', '0', '1', '0', '0', '[\"Digital Card\",\"Profile Video\",\"Shareable QR Code\",\"Custom Color Selection\"]', 0, NULL, '', NULL, NULL, NULL, '1', '2022-03-12 14:54:38', '2022-05-20 02:05:26'),
(2, '606732aa4fb58', 'Professional', 'Professionals Use Professional Tools.', '8.95', '31', '5', 10, 10, 10, 10, '1', '1', '0', '1', '1', '1', '[\"FREE Plan +\",\"Professional Email Signature\",\"Sales Guide Builder\",\"Pro Networking Group\"]', 0, NULL, '', NULL, NULL, NULL, '0', '2022-03-12 14:54:38', '2022-05-20 02:00:53'),
(3, '606732cb4ec9b', 'Influencer', 'Executive-Level Professionals.', '49.95', '31', '5', 999, 999, 999, 999, '1', '1', '1', '1', '0', '1', '[\"Professional +\",\"Customized Setup\",\"Social Media Branding\",\"Prospecting Funnel Templates\"]', 0, NULL, '', NULL, NULL, NULL, '0', '2022-03-12 14:54:38', '2022-05-20 02:00:58'),
(5, '625268c0087e7', 'Small Business', 'Expand & Grow Big', '29.95', '31', '15', NULL, NULL, NULL, NULL, '1', '1', '0', '1', '0', '1', '[\"FREE Plan +\",\"Feature 2\",\"Feature 3\",\"Feature 1\"]', 0, NULL, '', NULL, NULL, NULL, '1', '2022-04-10 06:18:56', '2022-05-20 02:01:09'),
(6, '625354adc5361', 'Sales Teams', 'Buy in Bulk', '309.95', '31', '75', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '0', '1', '[\"FREE Plan +\",\"Feature 1\",\"Feature 1\",\"Feature 1\"]', 0, NULL, '', NULL, NULL, NULL, '0', '2022-04-10 23:05:33', '2022-05-20 02:01:14'),
(7, '6253552c665fa', 'Enterprise', 'The Big Leagues.', '695.00', '31', '250', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '[\"FREE Plan +\",\"Feature 1\",\"Feature 1\",\"Feature 1\"]', 0, NULL, '', NULL, NULL, NULL, '0', '2022-04-10 23:07:40', '2022-05-20 02:01:17'),
(8, '626c09278dfa6', 'Basic Yearly', 'LetsConnect Card', '500', '366', '1', NULL, NULL, NULL, NULL, '1', '0', '0', '0', '0', '0', '[\"Associate +\"]', 0, NULL, '', NULL, NULL, NULL, '0', '2022-04-29 15:49:59', '2022-05-20 02:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'User', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_description` longtext COLLATE utf8mb4_unicode_ci,
  `enable_enquiry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `card_id`, `service_name`, `service_image`, `service_description`, `enable_enquiry`, `status`, `created_at`, `updated_at`) VALUES
(12, '622dbeaf0ed42', 'New Recipe', '/images/622dbd5274716-622dc0ba95506.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet perspiciatis mollitia ex suscipit iste illo nulla, saepe eos at? Quasi tempore provident delectus? Earum, consequatur tempora repellat repudiandae voluptates, totam.', 'Enabled', '1', '2022-03-17 11:40:40', '2022-03-17 11:40:40'),
(9, '622dbeaf0ed42', 'Service', '/images/622dbd5274716-622dc0b8d883d.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet perspiciatis mollitia ex suscipit iste illo nulla, saepe eos at? Quasi tempore provident delectus? Earum, consequatur tempora repellat repudiandae voluptates, totam.', 'Enabled', '1', '2022-03-17 11:40:40', '2022-03-17 11:40:40'),
(10, '622dbeaf0ed42', 'Service', '/images/622dbd5274716-622dc0b97d080.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet perspiciatis mollitia ex suscipit iste illo nulla, saepe eos at? Quasi tempore provident delectus? Earum, consequatur tempora repellat repudiandae voluptates, totam.', 'Enabled', '1', '2022-03-17 11:40:40', '2022-03-17 11:40:40'),
(11, '622dbeaf0ed42', 'Service', '/images/622dbd5274716-622dc0ba61ed0.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet perspiciatis mollitia ex suscipit iste illo nulla, saepe eos at? Quasi tempore provident delectus? Earum, consequatur tempora repellat repudiandae voluptates, totam.', 'Enabled', '1', '2022-03-17 11:40:40', '2022-03-17 11:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `google_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` longtext COLLATE utf8mb4_unicode_ci,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `seo_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `seo_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawk_chat_bot_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `encryption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `google_key`, `google_analytics_id`, `site_name`, `site_logo`, `favicon`, `seo_meta_description`, `seo_keywords`, `seo_image`, `tawk_chat_bot_key`, `name`, `address`, `driver`, `host`, `port`, `encryption`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'G-12SD09FF03', 'LetsConnect', '/backend/img/IMG-1647101921.png', '/backend/img/IMG-1647102045.png', 'Welcome to LetsConnect. It’s more than a digital business card, it’s a networking sales generator.', 'keyword 1, keyword 2', '/backend/img/logo.png', NULL, 'LetsConnect', 'noreply@letsconnect.com', 'smtp', 'smtp.mailtrap.io', 2525, 'tls', '', '', '1', '2022-03-12 14:54:38', '2022-04-10 00:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `store_products`
--

CREATE TABLE `store_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `badge` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `regular_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'rabinmia@gmail.com', '2022-04-25 18:00:00', NULL),
(2, 'rana@mail.com', '2022-04-25 18:00:00', '2022-04-25 18:00:00'),
(3, 'admin@gmail.com', '2022-04-25 18:00:00', '2022-04-25 18:00:00'),
(4, 'rabain@gmail.com', '2022-04-26 12:51:48', '2022-04-26 12:51:48'),
(5, 'rabin@gmail.com', '2022-04-26 13:15:01', '2022-04-26 13:15:01'),
(6, 'Khan@gmail.com', '2022-04-29 04:49:39', '2022-04-29 04:49:39'),
(7, 'kamrul11@gmail.com', '2022-04-29 04:50:40', '2022-04-29 04:50:40'),
(8, 'user@gmail.om', '2022-04-29 11:37:40', '2022-04-29 11:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `theme_type` int(11) DEFAULT '0' COMMENT '1=Smart, 0=Other',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme_id`, `theme_name`, `theme_description`, `theme_thumbnail`, `theme_price`, `status`, `theme_type`, `created_at`, `updated_at`) VALUES
(1, '7ccc432a06caa', 'Modern vCard', 'vCard', 'modern-light.png', 'Free', '0', 0, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(2, '7ccc432a06vta', 'Modern vCard Dark', 'vCard', 'modern-dark.png', 'Free', '0', 0, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(3, '7ccc432a06cth', 'Classic vCard Light', 'vCard', 'classic-light.png', 'Free', '0', 0, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(4, '7ccc432a06vyw', 'Classic vCard Dark', 'vCard', 'classic-dark.png', 'Free', '0', 0, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(5, '7ccc432a06ctw', 'Metro vCard Light', 'vCard', 'metro-light.png', 'Free', '0', 0, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(6, '7ccc432a06vhd', 'Metro vCard Dark', 'vCard', 'metro-dark.png', 'Free', '0', 0, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(7, '7ccc432a06hty', 'Modern Store Light', 'WhatsApp Store', 'modern-store-light.png', 'Free', '0', 0, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(8, '7ccc432a06hju', 'Modern Store Dark', 'WhatsApp Store', 'modern-store-dark.png', 'Free', '0', 0, '2022-03-12 14:54:38', '2022-03-12 14:54:38'),
(9, '624368c863f26', 'Smart Vcard', 'vCard', 'vcard.webp', 'Free', '1', 1, '2022-03-12 14:54:38', '2022-03-12 14:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `gobiz_transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desciption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `gobiz_transaction_id`, `transaction_date`, `transaction_id`, `user_id`, `plan_id`, `desciption`, `payment_gateway_name`, `transaction_currency`, `transaction_amount`, `invoice_number`, `invoice_prefix`, `invoice_details`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '622dbda39d294', '2022-03-13 09:47:15', '622dbda39d2d0', '2', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"Chennai\",\"from_billing_state\":\"Tamilnadu\",\"from_billing_zipcode\":\"600001\",\"from_billing_country\":\"India\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+919876543210\",\"from_billing_email\":\"sales@letsconnect.goapps.online\",\"to_billing_name\":null,\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":null,\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'PENDING', '1', '2022-03-13 03:47:15', '2022-04-08 17:06:31'),
(2, '62335de7c72d5', '2022-03-17 16:12:23', '', '2', '606732cb4ec9b', 'Professional Plan', 'Offline', 'USD', '56.64', '1', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"Chennai\",\"from_billing_state\":\"Tamilnadu\",\"from_billing_zipcode\":\"600001\",\"from_billing_country\":\"India\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+919876543210\",\"from_billing_email\":\"sales@letsconnect.goapps.online\",\"to_billing_name\":\"user\",\"to_billing_address\":\"House #2, Road #2, Block-K\\r\\nDhaka-1212, Bangladesh\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"Dhaka\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0124578457\",\"to_billing_email\":\"user@gamil.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":56.64,\"subtotal\":\"48\",\"tax_amount\":8.64}', 'SUCCESS', '1', '2022-03-17 10:12:23', '2022-03-17 10:12:23'),
(3, '625060adc968d', '2022-04-08 12:19:57', '625060adc96eb', '3', '60673288f0d35', 'Associate Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"dhaka\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01990572321\",\"to_billing_email\":\"arman@gmail.com\",\"to_vat_number\":\"58\",\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2022-04-08 17:19:57', '2022-04-11 01:20:01'),
(4, '625f0387d2ab4', '2022-04-19 13:46:31', '', '4', '606732cb4ec9b', 'Influencer Plan', 'Offline', 'USD', '57.82', '2', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Joe Testco\",\"to_billing_address\":\"1234 Main Street\",\"to_billing_city\":\"Dallas\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75201\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"9722031111\",\"to_billing_email\":\"joe@joetestco.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":57.82000000000000028421709430404007434844970703125,\"subtotal\":\"49.95\",\"tax_amount\":8.82000000000000028421709430404007434844970703125}', 'SUCCESS', '1', '2022-04-19 18:46:31', '2022-04-19 18:46:31'),
(5, '626c14442abc8', '2022-04-29 11:37:24', '', '2', '606732aa4fb58', 'Professional Plan', 'Offline', 'USD', '9.44', '3', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"user\",\"to_billing_address\":\"House #2, Road #2, Block-K\\r\\nDhaka-1212, Bangladesh\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"Dhaka\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0124578457\",\"to_billing_email\":\"user@gamil.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":9.4399999999999995026200849679298698902130126953125,\"subtotal\":\"8.95\",\"tax_amount\":1.439999999999999946709294817992486059665679931640625}', 'SUCCESS', '1', '2022-04-29 16:37:24', '2022-04-29 16:37:24'),
(6, '6286f9f48717d', '2022-05-19 21:16:20', '6286f9f4871b8', '8', '60673288f0d35', 'Beta Tester Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Joseph Testco\",\"to_billing_address\":\"1234 Main St.\",\"to_billing_city\":\"Dallas\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75201\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"9720001234\",\"to_billing_email\":\"spencer.bradley9@gmail.com\",\"to_vat_number\":\"123456\",\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2022-05-20 02:16:20', '2022-05-20 02:16:20'),
(7, '62878d52dca2d', '2022-05-20 07:45:06', '62878d52dca75', '9', '60673288f0d35', 'Beta Tester Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Jordan Felix\",\"to_billing_address\":\"3094 Maverick Dr\",\"to_billing_city\":\"Heath\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75126\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"4698666191\",\"to_billing_email\":\"stevenjordanfelix@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2022-05-20 12:45:06', '2022-05-20 12:45:06'),
(8, '628bdbb4a26fb', '2022-05-23 14:08:36', '', '4', '60673288f0d35', 'Beta Tester Plan', 'Offline', 'USD', '0', '4', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Joe Testco\",\"to_billing_address\":\"1234 Main Street\",\"to_billing_city\":\"Dallas\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75201\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"9722031111\",\"to_billing_email\":\"joe@joetestco.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2022-05-23 19:08:36', '2022-05-23 19:08:36'),
(9, '628bfeb98e28a', '2022-05-23 16:38:01', '628bfeb98e2cc', '10', '60673288f0d35', 'Beta Tester Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"tim lucas\",\"to_billing_address\":\"4447 N Central Expy, Suite 110-125\\r\\nSuite 110-125\",\"to_billing_city\":\"Dallas\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75205\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"4687590551\",\"to_billing_email\":\"dfwsteamcleaning@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2022-05-23 21:38:01', '2022-05-23 21:38:01'),
(10, '628bff5b2abc2', '2022-05-23 16:40:43', '', '4', '60673288f0d35', 'Beta Tester Plan', 'Offline', 'USD', '0', '5', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Joe Testco\",\"to_billing_address\":\"1234 Main Street\",\"to_billing_city\":\"Dallas\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75201\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"9722031111\",\"to_billing_email\":\"joe@joetestco.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2022-05-23 21:40:43', '2022-05-23 21:40:43'),
(11, '628bff680e843', '2022-05-23 16:40:56', '', '4', '625268c0087e7', 'Small Business Plan', 'Offline', 'USD', '34.22', '6', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Joe Testco\",\"to_billing_address\":\"1234 Main Street\",\"to_billing_city\":\"Dallas\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75201\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"9722031111\",\"to_billing_email\":\"joe@joetestco.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":34.219999999999998863131622783839702606201171875,\"subtotal\":\"29.95\",\"tax_amount\":5.21999999999999975131004248396493494510650634765625}', 'SUCCESS', '1', '2022-05-23 21:40:56', '2022-05-23 21:40:56'),
(12, '628bff7930e5e', '2022-05-23 16:41:13', '', '4', '60673288f0d35', 'Beta Tester Plan', 'Offline', 'USD', '0', '7', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Joe Testco\",\"to_billing_address\":\"1234 Main Street\",\"to_billing_city\":\"Dallas\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75201\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"9722031111\",\"to_billing_email\":\"joe@joetestco.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2022-05-23 21:41:13', '2022-05-23 21:41:13'),
(13, '628bffc8d1ccc', '2022-05-23 16:42:32', '', '4', '60673288f0d35', 'Beta Tester Plan', 'Offline', 'USD', '0', '8', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"Joe Testco\",\"to_billing_address\":\"1234 Main Street\",\"to_billing_city\":\"Dallas\",\"to_billing_state\":\"TX\",\"to_billing_zipcode\":\"75201\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"9722031111\",\"to_billing_email\":\"joe@joetestco.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2022-05-23 21:42:32', '2022-05-23 21:42:32'),
(14, '6297aa78710c9', '2022-06-01 13:05:44', '', '2', '60673288f0d35', 'Beta Tester Plan', 'Offline', 'USD', '0', '9', 'INV-', '{\"from_billing_name\":\"LetsConnect\",\"from_billing_address\":\"123, lorem ipsum\",\"from_billing_city\":\"dhaka\",\"from_billing_state\":\"dhaka\",\"from_billing_zipcode\":\"1212\",\"from_billing_country\":\"Bangaldesh\",\"from_vat_number\":\"SPN125553322\",\"from_billing_phone\":\"+88 01767671133\",\"from_billing_email\":\"sales@letsconnect.com\",\"to_billing_name\":\"user\",\"to_billing_address\":\"House #2, Road #2, Block-K\\r\\nDhaka-1212, Bangladesh\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"Dhaka\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0124578457\",\"to_billing_email\":\"user@gamil.com\",\"to_vat_number\":null,\"tax_name\":\"Goods and Service Tax\",\"tax_type\":\"exclusive\",\"tax_value\":\"18\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2022-06-01 18:05:44', '2022-06-01 18:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `video`, `created_at`, `updated_at`) VALUES
(1, 'how to create a card.', 'https://www.youtube.com/embed/hFWa8TUMIxk', '2022-04-26 19:59:21', '2022-04-26 19:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT '2',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` longtext COLLATE utf8mb4_unicode_ci,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_details` longtext COLLATE utf8mb4_unicode_ci,
  `plan_validity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_activation_date` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` longtext COLLATE utf8mb4_unicode_ci,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_data` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `auth_type`, `profile_image`, `plan_id`, `term`, `plan_details`, `plan_validity`, `plan_activation_date`, `billing_name`, `type`, `vat_number`, `billing_address`, `billing_city`, `billing_state`, `billing_zipcode`, `billing_country`, `billing_phone`, `billing_email`, `status`, `remember_token`, `stripe_data`, `created_at`, `updated_at`) VALUES
(1, '609c03880ee47', 'LetsConnect', 'admin@gmail.com', 1, NULL, '$2y$10$g6GacdNZ6Pqoz6VOCav9kep7E.2u3o.TqxP5/0ZtlzMju18z9HjoS', 'Email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-03-12 14:54:38', '2022-04-11 01:12:56'),
(2, '622dbd5274716', 'user', 'user@gmail.com', 2, NULL, '$2y$10$VFm643nOKw7wq.0N9mUKyeUA4wfq0igfJE0QXP5Q0qZhcUO7Nn0Ty', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beta Tester\",\"plan_description\":\"LetsConnect Card\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"100\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"1\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"1\",\"recommended\":\"0\",\"is_watermark_enabled\":\"0\",\"features\":\"[\\\"Digital Card\\\",\\\"Profile Video\\\",\\\"Shareable QR Code\\\",\\\"Custom Color Selection\\\"]\",\"plans_type\":0,\"stripe_data\":null,\"name\":\"\",\"slug\":null,\"stripe_plan\":null,\"cost\":null,\"status\":\"1\",\"created_at\":\"2022-03-12T14:54:38.000000Z\",\"updated_at\":\"2022-05-20T02:05:26.000000Z\"}', '2049-10-16 13:05:44', '2022-06-01 18:05:44', 'user', 'personal', NULL, 'House #2, Road #2, Block-K\r\nDhaka-1212, Bangladesh', 'dhaka', 'Dhaka', '1213', 'Bangladesh', '0124578457', 'user@gamil.com', 1, NULL, NULL, '2022-03-13 03:45:54', '2022-06-01 18:05:44'),
(3, '6250608223495', 'Maddie', 'maddie@betablox.com', 2, NULL, '$2y$10$pZ56vPJ1Znt3BhVVQiEOjOya6c4TtEUGg1P2Kmx33/VOy5L1C4DAq', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Associate\",\"plan_description\":\"your description\",\"plan_price\":\"0\",\"validity\":\"100\",\"no_of_vcards\":\"10\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"1\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"1\",\"recommended\":\"1\",\"is_watermark_enabled\":\"0\",\"features\":\"[\\\"Digital Card\\\",\\\"Sales Script\\\",\\\"Demo Funnel Builder\\\",\\\"Molnthly tips\\\\\\/tricks subscription\\\"]\",\"status\":\"1\",\"created_at\":\"2022-03-12T13:54:38.000000Z\",\"updated_at\":\"2022-04-08T16:18:26.000000Z\"}', '2022-07-17 12:19:57', '2022-04-08 17:19:57', 'Rony', 'personal', '58', 'dhaka', 'dhaka', 'dhaka', '1213', 'Bangladesh', '01990572321', 'arman@gmail.com', 1, NULL, NULL, '2022-04-08 17:19:14', '2022-04-25 18:26:11'),
(5, '62572b8fd0290', 'rabin', 'rabin@gmail.com', 2, NULL, '$2y$10$gTqMICuCBz6SURwgzH8o9.ghW9cn8w1M18j43uGpQu7UbcvHJFwm6', 'Email', NULL, NULL, NULL, NULL, NULL, NULL, 'rabin mia', 'personal', '586757', 'mohakhali\r\nDhaka-1212, Bangladesh', 'dhaka', 'Dhaka', '9100', 'Bangladesh', '01990572321', 'rony@gmail.com', 1, NULL, NULL, '2022-04-13 19:59:11', '2022-04-13 20:00:16'),
(4, '625357e8bda33', 'Joe Testco', 'joe@joetestco.com', 2, NULL, '$2y$10$op73o3aTXGfTJGbAgrd2DOzQnSpURIWg6nEuCJnkA53lZxZzAJm5O', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beta Tester\",\"plan_description\":\"LetsConnect Card\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"100\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"1\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"1\",\"recommended\":\"0\",\"is_watermark_enabled\":\"0\",\"features\":\"[\\\"Digital Card\\\",\\\"Profile Video\\\",\\\"Shareable QR Code\\\",\\\"Custom Color Selection\\\"]\",\"plans_type\":0,\"stripe_data\":null,\"name\":\"\",\"slug\":null,\"stripe_plan\":null,\"cost\":null,\"status\":\"1\",\"created_at\":\"2022-03-12T14:54:38.000000Z\",\"updated_at\":\"2022-05-20T02:05:26.000000Z\"}', '2077-02-21 16:41:13', '2022-05-23 21:42:32', 'Joe Testco', 'business', NULL, '1234 Main Street', 'Dallas', 'TX', '75201', 'United States', '9722031111', 'joe@joetestco.com', 1, NULL, NULL, '2022-04-10 23:19:20', '2022-05-23 21:42:32'),
(6, '6273bc7b2053a', 'zayed', 'zayed@hotmail.co.in', 2, NULL, '$2y$10$V.UBhmh4nzTyfCNa8EJx..htTz1OpxId5nxa95Si6.BXyhCnW5Mvm', 'Email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-05 12:00:59', '2022-05-05 12:00:59'),
(7, '6275ebfe65ad3', 'Test', 'test11@gmail.com', 2, NULL, '$2y$10$0EAc/sdoqtogC0rc2p9DH.E3NZEQGTZqGtMqkyQhF4Hjd0tlA6XYu', 'Email', NULL, NULL, NULL, NULL, NULL, NULL, 'Rony', 'personal', '5464', 'dhaka\r\nbanani', 'Select city', 'ANDHRA PRADESH', '1213', 'Bangladesh', '+880199057232', 'ronymia.tech@gmail.com', 1, NULL, NULL, '2022-05-07 03:48:14', '2022-05-07 03:49:04'),
(8, '6286f9a7de36d', 'Joseph Testco', 'spencer.bradley9@gmail.com', 2, NULL, '$2y$10$z.lsoDMovVhXekeaUQ7UhO068thvC3ZuNauPdR7eeMg9KqcedIQVy', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beta Tester\",\"plan_description\":\"LetsConnect Card\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"100\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"1\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"1\",\"recommended\":\"0\",\"is_watermark_enabled\":\"0\",\"features\":\"[\\\"Digital Card\\\",\\\"Profile Video\\\",\\\"Shareable QR Code\\\",\\\"Custom Color Selection\\\"]\",\"plans_type\":0,\"stripe_data\":null,\"name\":\"\",\"slug\":null,\"stripe_plan\":null,\"cost\":null,\"status\":\"1\",\"created_at\":\"2022-03-12T14:54:38.000000Z\",\"updated_at\":\"2022-05-20T02:05:26.000000Z\"}', '2049-10-03 21:16:20', '2022-05-20 02:16:20', 'Joseph Testco', 'business', '123456', '1234 Main St.', 'Dallas', 'TX', '75201', 'United States', '9720001234', 'spencer.bradley9@gmail.com', 1, NULL, NULL, '2022-05-20 02:15:03', '2022-05-20 02:16:20'),
(9, '62878d3be6381', 'Jordan Felix', 'stevenjordanfelix@gmail.com', 2, NULL, '$2y$10$dwiMAfaqBXwiPOCLdPwrz.kB7pDkDaxC2Hnxst3aWgEU0P3T9LTrS', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beta Tester\",\"plan_description\":\"LetsConnect Card\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"100\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"1\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"1\",\"recommended\":\"0\",\"is_watermark_enabled\":\"0\",\"features\":\"[\\\"Digital Card\\\",\\\"Profile Video\\\",\\\"Shareable QR Code\\\",\\\"Custom Color Selection\\\"]\",\"plans_type\":0,\"stripe_data\":null,\"name\":\"\",\"slug\":null,\"stripe_plan\":null,\"cost\":null,\"status\":\"1\",\"created_at\":\"2022-03-12T14:54:38.000000Z\",\"updated_at\":\"2022-05-20T02:05:26.000000Z\"}', '2049-10-04 07:45:06', '2022-05-20 12:45:06', 'Jordan Felix', 'personal', NULL, '3094 Maverick Dr', 'Heath', 'TX', '75126', 'United States', '4698666191', 'stevenjordanfelix@gmail.com', 1, NULL, NULL, '2022-05-20 12:44:44', '2022-05-20 12:45:06'),
(10, '628bfea88e542', 'tim lucas', 'dfwsteamcleaning@gmail.com', 2, NULL, '$2y$10$kwqCh0AOW0JnMhKmQpWq4uvq98J98oHoFA6C7IY9LEr61L743xe1S', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beta Tester\",\"plan_description\":\"LetsConnect Card\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"100\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"1\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"1\",\"recommended\":\"0\",\"is_watermark_enabled\":\"0\",\"features\":\"[\\\"Digital Card\\\",\\\"Profile Video\\\",\\\"Shareable QR Code\\\",\\\"Custom Color Selection\\\"]\",\"plans_type\":0,\"stripe_data\":null,\"name\":\"\",\"slug\":null,\"stripe_plan\":null,\"cost\":null,\"status\":\"1\",\"created_at\":\"2022-03-12T14:54:38.000000Z\",\"updated_at\":\"2022-05-20T02:05:26.000000Z\"}', '2049-10-07 16:38:01', '2022-05-23 21:38:01', 'tim lucas', 'personal', NULL, '4447 N Central Expy, Suite 110-125\r\nSuite 110-125', 'Dallas', 'TX', '75205', 'United States', '4687590551', 'dfwsteamcleaning@gmail.com', 1, NULL, NULL, '2022-05-23 21:37:44', '2022-05-23 21:38:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_cards`
--
ALTER TABLE `business_cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_cards_card_url_unique` (`card_url`);

--
-- Indexes for table `business_fields`
--
ALTER TABLE `business_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `business_cards`
--
ALTER TABLE `business_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `business_fields`
--
ALTER TABLE `business_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
