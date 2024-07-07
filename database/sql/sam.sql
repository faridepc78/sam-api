-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4550
-- Generation Time: Jan 24, 2024 at 08:53 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sam`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_12_19_141919_create_permission_tables', 1),
(4, '2023_12_20_172531_create_spaces_table', 1),
(5, '2023_12_21_230129_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` bigint(20) UNSIGNED NOT NULL,
  `space_id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `guests` json NOT NULL,
  `prices` json NOT NULL,
  `special_services` json DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `author_id`, `guest_id`, `space_id`, `unit`, `checkin`, `checkout`, `guests`, `prices`, `special_services`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 19, '9', '2024-01-09', '2024-01-10', '{\"baby\": 9, \"adult\": 1, \"child\": 2, \"animal\": 6}', '{\"site_price\": 757099, \"extra_price\": 461361, \"location_price\": 243373}', NULL, 'lidomatrip', 'Similique hic enim vero vel. Eum vel nam eum recusandae sed. Et voluptatum ratione laboriosam enim eum voluptatibus quo. Modi suscipit asperiores beatae esse.', '2022-06-17 10:28:12', NULL),
(2, 1, 1, 13, '7', '2024-01-07', '2024-01-15', '{\"baby\": 9, \"adult\": 3, \"child\": 3, \"animal\": 6}', '{\"site_price\": 461262, \"extra_price\": 161974, \"location_price\": 662126}', NULL, 'otaghak', 'Rerum laborum aperiam nemo eum rerum expedita beatae. Dignissimos quas sint non dolores et ratione eos in. Aut fugit et occaecati et. Corporis quod iste maxime nihil.', '2020-12-18 11:34:15', NULL),
(3, 1, 1, 20, '4', '2024-01-16', '2024-01-18', '{\"baby\": 1, \"adult\": 5, \"child\": 5, \"animal\": 5}', '{\"site_price\": 609018, \"extra_price\": 555883, \"location_price\": 804926}', NULL, 'sam', 'Nobis et fuga maiores doloremque architecto blanditiis. Totam rem aut voluptatem ea. Ipsa est qui illo earum et. Expedita et exercitationem quas ipsum ex quam adipisci dolor.', '2024-03-13 06:08:38', NULL),
(4, 1, 1, 2, '3', '2024-01-12', '2024-01-17', '{\"baby\": 7, \"adult\": 2, \"child\": 2, \"animal\": 9}', '{\"site_price\": 864992, \"extra_price\": 754041, \"location_price\": 135954}', NULL, 'sam', 'Temporibus eligendi aut alias et veniam. Id quia quo explicabo ex dolorem dolor voluptas non. Et omnis est praesentium rerum dolorum ea. Assumenda sint accusamus dolores itaque est nihil.', '2024-01-02 16:03:22', NULL),
(5, 1, 1, 3, '2', '2024-01-16', '2024-01-20', '{\"baby\": 3, \"adult\": 8, \"child\": 5, \"animal\": 9}', '{\"site_price\": 402454, \"extra_price\": 793865, \"location_price\": 861914}', NULL, 'lidomatrip', 'Atque incidunt voluptas incidunt eum ut. Culpa autem suscipit sed doloremque quidem.', '2021-02-02 10:17:03', NULL),
(6, 1, 1, 5, '2', '2024-01-10', '2024-01-13', '{\"baby\": 3, \"adult\": 1, \"child\": 4, \"animal\": 4}', '{\"site_price\": 432378, \"extra_price\": 300660, \"location_price\": 305351}', NULL, 'roomtoor', 'Veritatis et voluptas velit dolorum officia numquam. Beatae quis dolorem in mollitia nesciunt error incidunt. Nam incidunt ut pariatur sequi vel. Sed dicta itaque ipsum impedit ullam molestias qui.', '2024-02-22 05:02:45', NULL),
(7, 1, 1, 8, '4', '2024-01-15', '2024-01-20', '{\"baby\": 7, \"adult\": 1, \"child\": 4, \"animal\": 9}', '{\"site_price\": 238015, \"extra_price\": 917043, \"location_price\": 542434}', NULL, 'sam', 'Magni distinctio delectus aperiam. Inventore nostrum aut cum sunt et suscipit vero. Accusamus id exercitationem quam aut vero eius cum. Aspernatur quas reprehenderit dolorem sapiente.', '2020-11-12 19:00:21', NULL),
(8, 1, 1, 8, '4', '2024-01-10', '2024-01-17', '{\"baby\": 4, \"adult\": 9, \"child\": 1, \"animal\": 4}', '{\"site_price\": 892643, \"extra_price\": 265030, \"location_price\": 197227}', NULL, 'roomtoor', 'Quis qui iure ex adipisci necessitatibus. Vero ea veniam sint odit voluptatem fugiat expedita voluptatem. Aut voluptatem placeat sed maxime.', '2023-02-10 19:56:46', NULL),
(9, 1, 1, 19, '6', '2024-01-03', '2024-01-10', '{\"baby\": 8, \"adult\": 9, \"child\": 7, \"animal\": 3}', '{\"site_price\": 458322, \"extra_price\": 973347, \"location_price\": 469159}', NULL, 'lidomatrip', 'Natus quos et a sunt. Pariatur quia blanditiis molestias quod autem totam. Est nihil ratione autem voluptatibus qui aut.', '2023-06-10 10:32:59', NULL),
(10, 1, 1, 7, '8', '2024-01-02', '2024-01-05', '{\"baby\": 8, \"adult\": 10, \"child\": 10, \"animal\": 6}', '{\"site_price\": 877103, \"extra_price\": 294917, \"location_price\": 571640}', NULL, 'sepanja', 'Omnis et fugiat neque tenetur omnis fugiat. Quae dicta consequuntur cumque non voluptas nobis. Quia aliquam totam nostrum odio. Temporibus qui sit consequatur tempore pariatur.', '2024-05-24 00:00:41', NULL),
(11, 1, 1, 9, '7', '2024-01-17', '2024-01-19', '{\"baby\": 5, \"adult\": 2, \"child\": 6, \"animal\": 2}', '{\"site_price\": 361128, \"extra_price\": 645932, \"location_price\": 296268}', NULL, 'lidomatrip', 'Illum dignissimos suscipit dolores itaque. Illum consectetur quo maiores maxime. Nihil fuga similique officia odio cum. Dolorum sit inventore et qui.', '2024-01-11 00:48:20', NULL),
(12, 1, 1, 13, '2', '2024-01-14', '2024-01-20', '{\"baby\": 3, \"adult\": 2, \"child\": 10, \"animal\": 7}', '{\"site_price\": 479491, \"extra_price\": 530549, \"location_price\": 742014}', NULL, 'shab', 'Voluptate eveniet reprehenderit facilis esse sit. Dolor tempore reprehenderit natus. Cumque provident reprehenderit officiis rem et quis debitis nesciunt.', '2022-03-26 02:47:04', NULL),
(13, 1, 1, 1, '3', '2024-01-15', '2024-01-18', '{\"baby\": 6, \"adult\": 8, \"child\": 1, \"animal\": 8}', '{\"site_price\": 249758, \"extra_price\": 828472, \"location_price\": 772186}', NULL, 'jajiga', 'Cumque ut odit quisquam asperiores quidem. Velit minima quis maiores dolores vitae. Perferendis ullam vel dignissimos deserunt. Eius id architecto voluptas aperiam.', '2021-07-17 02:33:12', NULL),
(14, 1, 1, 14, '10', '2024-01-12', '2024-01-16', '{\"baby\": 4, \"adult\": 6, \"child\": 1, \"animal\": 9}', '{\"site_price\": 628146, \"extra_price\": 104864, \"location_price\": 645334}', NULL, 'sam', 'Voluptate pariatur tempora laboriosam quaerat adipisci at. Quia reprehenderit aliquid odio ut enim non cupiditate. Aut corrupti ea est ut rerum.', '2024-09-29 23:15:32', NULL),
(15, 1, 1, 2, '7', '2024-01-11', '2024-01-20', '{\"baby\": 8, \"adult\": 7, \"child\": 1, \"animal\": 5}', '{\"site_price\": 523555, \"extra_price\": 140214, \"location_price\": 808878}', NULL, 'lidomatrip', 'Voluptatum illo odit velit a. Quis iusto veniam quas sunt impedit. Dignissimos et non beatae corporis quo.', '2023-05-26 13:39:12', NULL),
(16, 1, 1, 16, '5', '2024-01-06', '2024-01-09', '{\"baby\": 3, \"adult\": 5, \"child\": 6, \"animal\": 5}', '{\"site_price\": 362978, \"extra_price\": 110715, \"location_price\": 503452}', NULL, 'sepanja', 'Et voluptatibus id a sed ex. Laboriosam voluptatibus culpa et vel voluptatem qui vero quisquam. Natus doloribus libero consectetur recusandae. At voluptatem eius enim voluptatem occaecati et.', '2023-09-13 13:41:33', NULL),
(17, 1, 1, 8, '1', '2024-01-05', '2024-01-19', '{\"baby\": 10, \"adult\": 10, \"child\": 4, \"animal\": 9}', '{\"site_price\": 185769, \"extra_price\": 615387, \"location_price\": 836394}', NULL, 'sepanja', 'Ut voluptatem provident amet. Rem velit eos provident vel unde autem tenetur. Accusamus cum nemo quos nihil ipsum in. Quibusdam est tenetur est eos minima tempora.', '2022-04-15 19:57:26', NULL),
(18, 1, 1, 16, '2', '2024-01-13', '2024-01-14', '{\"baby\": 6, \"adult\": 4, \"child\": 5, \"animal\": 6}', '{\"site_price\": 414540, \"extra_price\": 607622, \"location_price\": 785854}', NULL, 'otaghak', 'Repellendus sint ut esse nulla reprehenderit. Tempore nesciunt ducimus voluptatem quos facere. Fuga quidem rerum repudiandae.', '2023-12-11 10:52:38', NULL),
(19, 1, 1, 8, '3', '2024-01-07', '2024-01-13', '{\"baby\": 8, \"adult\": 8, \"child\": 4, \"animal\": 1}', '{\"site_price\": 373455, \"extra_price\": 239431, \"location_price\": 450205}', NULL, 'phone', 'Possimus totam qui animi non. Est blanditiis sit velit fugit ut nisi officiis est. Velit tempora et est ipsum vero qui. Commodi reprehenderit velit ut consectetur qui asperiores quia consequatur.', '2020-09-27 16:42:22', NULL),
(20, 1, 1, 6, '4', '2024-01-14', '2024-01-18', '{\"baby\": 6, \"adult\": 5, \"child\": 2, \"animal\": 9}', '{\"site_price\": 667326, \"extra_price\": 246379, \"location_price\": 628165}', NULL, 'roomtoor', 'Incidunt odio omnis eveniet aut. Repudiandae illo distinctio et quod. Soluta veritatis corrupti accusantium soluta. Nesciunt nihil omnis ea inventore delectus. Cumque sapiente eveniet totam delectus quam voluptatibus aut.', '2021-02-07 17:32:56', NULL),
(21, 1, 1, 6, '3', '2024-01-08', '2024-01-20', '{\"baby\": 9, \"adult\": 5, \"child\": 4, \"animal\": 10}', '{\"site_price\": 294455, \"extra_price\": 599785, \"location_price\": 478553}', NULL, 'shab', 'Officiis sit quibusdam fuga deserunt saepe ratione esse corporis. Voluptas vero et voluptatem doloribus dolorem. Et molestiae amet et sapiente rerum tempora ut.', '2021-02-26 08:59:41', NULL),
(22, 1, 1, 3, '9', '2024-01-07', '2024-01-18', '{\"baby\": 6, \"adult\": 3, \"child\": 9, \"animal\": 5}', '{\"site_price\": 913814, \"extra_price\": 519034, \"location_price\": 477975}', NULL, 'pinorest', 'Sapiente placeat molestiae est praesentium iste. Error blanditiis quia praesentium aspernatur assumenda temporibus. Sit illo corrupti assumenda est aspernatur voluptates. Eum accusamus similique necessitatibus enim quasi voluptas saepe. Cum quidem libero dolorem pariatur.', '2024-08-15 09:39:25', NULL),
(23, 1, 1, 2, '4', '2024-01-13', '2024-01-19', '{\"baby\": 6, \"adult\": 7, \"child\": 6, \"animal\": 6}', '{\"site_price\": 848820, \"extra_price\": 537667, \"location_price\": 647866}', NULL, 'roomtoor', 'Eos omnis nam laudantium repellat et ipsum id quo. Necessitatibus tempora dignissimos eius harum quo delectus. Magnam sed illum aut et illum vitae quia eum. Sed quaerat et sunt rerum quo debitis.', '2021-06-29 20:17:55', NULL),
(24, 1, 1, 6, '8', '2024-01-18', '2024-01-20', '{\"baby\": 9, \"adult\": 1, \"child\": 3, \"animal\": 6}', '{\"site_price\": 568132, \"extra_price\": 643000, \"location_price\": 586045}', NULL, 'homsa', 'Doloribus aut qui nobis aut. Reiciendis id quia sunt. Ut facilis aut qui tempora dicta rem exercitationem.', '2020-02-12 07:15:46', NULL),
(25, 1, 1, 10, '6', '2024-01-11', '2024-01-14', '{\"baby\": 10, \"adult\": 10, \"child\": 4, \"animal\": 8}', '{\"site_price\": 845302, \"extra_price\": 963433, \"location_price\": 822923}', NULL, 'pinorest', 'Quia voluptates at in accusamus. Et quo qui sed eos. Aut dolorem corrupti et eos voluptatem reiciendis. Omnis inventore hic autem.', '2020-02-20 17:09:18', NULL),
(26, 1, 1, 10, '3', '2024-01-08', '2024-01-13', '{\"baby\": 8, \"adult\": 10, \"child\": 7, \"animal\": 7}', '{\"site_price\": 916323, \"extra_price\": 600380, \"location_price\": 282405}', NULL, 'sam', 'Sed quia sunt et sunt voluptatibus. Consequatur tempore natus dolore ratione laudantium qui repudiandae eum. Quibusdam ea et delectus rerum asperiores unde veniam.', '2020-06-16 06:39:32', NULL),
(27, 1, 1, 9, '9', '2024-01-14', '2024-01-19', '{\"baby\": 8, \"adult\": 6, \"child\": 1, \"animal\": 2}', '{\"site_price\": 898598, \"extra_price\": 705054, \"location_price\": 992936}', NULL, 'sam', 'Excepturi dolorum ipsum sint. Dolore consectetur molestiae nihil voluptatem. Omnis voluptates magnam qui odio inventore ullam praesentium. Sed officia recusandae cupiditate aut.', '2023-04-22 19:54:58', NULL),
(28, 1, 1, 12, '5', '2024-01-08', '2024-01-11', '{\"baby\": 1, \"adult\": 5, \"child\": 1, \"animal\": 8}', '{\"site_price\": 186642, \"extra_price\": 251517, \"location_price\": 937380}', NULL, 'lidomatrip', 'Voluptatibus aut officia amet et dolorum ut. Quis eos qui maxime nisi voluptatem accusantium. Consequatur omnis praesentium maiores provident. Dolores cupiditate ut optio dolor officia velit.', '2022-05-12 16:18:18', NULL),
(29, 1, 1, 5, '3', '2024-01-06', '2024-01-16', '{\"baby\": 8, \"adult\": 3, \"child\": 1, \"animal\": 9}', '{\"site_price\": 672833, \"extra_price\": 543900, \"location_price\": 404723}', NULL, 'shab', 'Fugit ducimus ut ipsam optio similique ullam voluptatem. Quam et harum enim qui similique aliquam. Occaecati ipsa doloremque voluptates sit repudiandae rerum maxime quos. Dolorem qui maiores voluptatem sint necessitatibus.', '2022-05-09 01:35:04', NULL),
(30, 1, 1, 20, '9', '2024-01-12', '2024-01-17', '{\"baby\": 4, \"adult\": 8, \"child\": 10, \"animal\": 6}', '{\"site_price\": 365872, \"extra_price\": 998628, \"location_price\": 803916}', NULL, 'shab', 'Velit voluptatum officiis repudiandae dolores quae ipsam. Doloribus magnam in quo labore unde sunt. Error neque et quasi commodi.', '2024-03-22 15:07:12', NULL),
(31, 1, 1, 19, '5', '2024-01-17', '2024-01-18', '{\"baby\": 8, \"adult\": 3, \"child\": 5, \"animal\": 6}', '{\"site_price\": 490922, \"extra_price\": 544383, \"location_price\": 331281}', NULL, 'roomtoor', 'Quisquam non sit modi quas sit ullam. Esse et quibusdam quia temporibus voluptatibus omnis. Itaque nobis tempora suscipit illo deserunt recusandae ipsa itaque.', '2024-12-25 16:02:40', NULL),
(32, 1, 1, 2, '2', '2024-01-13', '2024-01-15', '{\"baby\": 1, \"adult\": 1, \"child\": 10, \"animal\": 3}', '{\"site_price\": 908206, \"extra_price\": 157270, \"location_price\": 201469}', NULL, 'sam', 'Et quibusdam odit nam qui id. Qui aut accusantium asperiores soluta. Molestias a voluptas tenetur est non sequi ipsum. Esse velit laboriosam dolore ut praesentium iure. Ad atque earum error.', '2022-06-05 20:10:51', NULL),
(33, 1, 1, 18, '1', '2024-01-05', '2024-01-09', '{\"baby\": 6, \"adult\": 4, \"child\": 3, \"animal\": 2}', '{\"site_price\": 226498, \"extra_price\": 255124, \"location_price\": 166035}', NULL, 'sepanja', 'Quam repudiandae dolorum accusantium porro aut. Magnam doloribus nemo occaecati consequatur atque officiis. Eos voluptatibus tempora ut et eligendi hic.', '2024-02-23 00:44:47', NULL),
(34, 1, 1, 2, '4', '2024-01-08', '2024-01-10', '{\"baby\": 6, \"adult\": 9, \"child\": 4, \"animal\": 1}', '{\"site_price\": 779065, \"extra_price\": 473768, \"location_price\": 232349}', NULL, 'others', 'Quis modi officiis nihil doloremque velit alias aut. Qui praesentium qui et non est culpa occaecati est. Quae est optio fugiat maiores ea.', '2023-03-13 20:10:25', NULL),
(35, 1, 1, 20, '8', '2024-01-15', '2024-01-20', '{\"baby\": 7, \"adult\": 4, \"child\": 4, \"animal\": 1}', '{\"site_price\": 758711, \"extra_price\": 551827, \"location_price\": 595564}', NULL, 'others', 'Alias velit similique perspiciatis. Nihil amet incidunt nemo et dolores non autem. Aut non neque natus cum ut ratione voluptatibus qui. Accusantium sed impedit mollitia ea et inventore officiis eos. Alias est tenetur autem illo officiis doloremque.', '2020-01-24 19:14:06', NULL),
(36, 1, 1, 9, '8', '2024-01-02', '2024-01-20', '{\"baby\": 9, \"adult\": 9, \"child\": 4, \"animal\": 2}', '{\"site_price\": 980811, \"extra_price\": 336047, \"location_price\": 310878}', NULL, 'roomtoor', 'Error alias delectus nemo fuga. Modi natus et et in quis repellat eveniet. Vel doloremque pariatur maiores a molestiae natus voluptatem.', '2021-06-06 15:15:16', NULL),
(37, 1, 1, 2, '10', '2024-01-15', '2024-01-17', '{\"baby\": 2, \"adult\": 5, \"child\": 6, \"animal\": 3}', '{\"site_price\": 982238, \"extra_price\": 421305, \"location_price\": 670800}', NULL, 'roomtoor', 'Repudiandae similique qui quasi excepturi nisi eveniet quo. Ipsum repellat quis molestias ut ratione vel. Incidunt vitae voluptatem excepturi dolorem est.', '2023-04-10 14:54:24', NULL),
(38, 1, 1, 7, '8', '2024-01-13', '2024-01-20', '{\"baby\": 2, \"adult\": 7, \"child\": 5, \"animal\": 4}', '{\"site_price\": 219872, \"extra_price\": 124644, \"location_price\": 918207}', NULL, 'sam', 'Adipisci possimus rerum repellat nam. Cupiditate voluptate libero illo eum amet numquam. Ipsum magni est voluptate. Ea quia fugit eos et architecto. Dicta ut debitis dolorem similique at iure.', '2022-03-29 11:32:42', NULL),
(39, 1, 1, 9, '10', '2024-01-11', '2024-01-14', '{\"baby\": 7, \"adult\": 6, \"child\": 8, \"animal\": 3}', '{\"site_price\": 367698, \"extra_price\": 873682, \"location_price\": 668938}', NULL, 'homsa', 'Quia est at quam nobis soluta quas. Error laboriosam consectetur doloribus fuga consequatur ea voluptate aliquam. Quas voluptatem sed error consequuntur saepe laboriosam incidunt. Error temporibus iste et quia saepe voluptatem sint aut.', '2023-12-29 19:01:03', NULL),
(40, 1, 1, 5, '3', '2024-01-02', '2024-01-06', '{\"baby\": 4, \"adult\": 3, \"child\": 9, \"animal\": 8}', '{\"site_price\": 860179, \"extra_price\": 578765, \"location_price\": 567788}', NULL, 'sam', 'Velit iure occaecati omnis aut eaque ullam sit sequi. Aut commodi quam autem accusantium aspernatur aperiam consequatur.', '2023-02-06 12:25:02', NULL),
(41, 1, 1, 14, '3', '2024-01-13', '2024-01-17', '{\"baby\": 8, \"adult\": 5, \"child\": 7, \"animal\": 1}', '{\"site_price\": 181033, \"extra_price\": 389595, \"location_price\": 747719}', NULL, 'sam', 'Quia esse voluptatem dolor corrupti in voluptatem. Iure aliquid suscipit doloribus eos voluptatem. Praesentium blanditiis tempora et architecto aut est molestiae. Est et inventore eum consequatur iusto dolores accusantium.', '2023-12-21 08:02:59', NULL),
(42, 1, 1, 3, '7', '2024-01-16', '2024-01-20', '{\"baby\": 10, \"adult\": 9, \"child\": 10, \"animal\": 3}', '{\"site_price\": 161123, \"extra_price\": 812647, \"location_price\": 789133}', NULL, 'others', 'A dignissimos inventore blanditiis et rerum et doloremque ea. Rem ex omnis et et. Aut quia eaque deleniti veniam excepturi dolorem soluta ut.', '2024-12-17 11:35:08', NULL),
(43, 1, 1, 8, '3', '2024-01-09', '2024-01-19', '{\"baby\": 5, \"adult\": 5, \"child\": 2, \"animal\": 1}', '{\"site_price\": 260072, \"extra_price\": 634298, \"location_price\": 490727}', NULL, 'sam', 'Minima et accusantium rerum officiis veniam eveniet cum beatae. Rem illum labore asperiores et. Possimus inventore ratione iure et. Officiis debitis blanditiis est suscipit recusandae eveniet.', '2021-04-27 23:48:19', NULL),
(44, 1, 1, 13, '1', '2024-01-10', '2024-01-12', '{\"baby\": 5, \"adult\": 6, \"child\": 1, \"animal\": 10}', '{\"site_price\": 604759, \"extra_price\": 749544, \"location_price\": 991120}', NULL, 'jajiga', 'Impedit facere alias magnam magnam exercitationem. Neque voluptas non nostrum quis. Vel vel enim fugit magni necessitatibus voluptas.', '2022-05-04 08:30:29', NULL),
(45, 1, 1, 4, '4', '2024-01-19', '2024-01-20', '{\"baby\": 8, \"adult\": 2, \"child\": 8, \"animal\": 7}', '{\"site_price\": 134338, \"extra_price\": 948499, \"location_price\": 957827}', NULL, 'phone', 'Animi aperiam mollitia quae id magni et harum. Placeat explicabo commodi dolore necessitatibus corporis. Dolore nulla quibusdam quia in quos.', '2024-10-11 23:22:52', NULL),
(46, 1, 1, 20, '6', '2024-01-13', '2024-01-20', '{\"baby\": 8, \"adult\": 10, \"child\": 10, \"animal\": 9}', '{\"site_price\": 153882, \"extra_price\": 611556, \"location_price\": 296395}', NULL, 'jajiga', 'Ratione reiciendis voluptatibus cupiditate. Assumenda assumenda hic qui et voluptas et sunt. Iure ut perspiciatis ut atque reprehenderit quibusdam adipisci. Iste ea et ea occaecati hic aut.', '2024-06-02 13:29:08', NULL),
(47, 1, 1, 10, '10', '2024-01-11', '2024-01-20', '{\"baby\": 5, \"adult\": 8, \"child\": 3, \"animal\": 5}', '{\"site_price\": 507984, \"extra_price\": 521893, \"location_price\": 459158}', NULL, 'homsa', 'Est quibusdam eos incidunt doloremque ab culpa quia. Quae vel accusamus quae repellat id dolor et. Sed aut harum aliquid qui accusantium at.', '2024-07-11 06:26:28', NULL),
(48, 1, 1, 1, '1', '2024-01-19', '2024-01-20', '{\"baby\": 7, \"adult\": 2, \"child\": 6, \"animal\": 9}', '{\"site_price\": 959693, \"extra_price\": 561674, \"location_price\": 359675}', NULL, 'pinorest', 'Est quidem corporis dolorem inventore pariatur cumque. Quod explicabo quia exercitationem possimus odio atque qui. Facere eius dolorum ratione praesentium excepturi cumque quis. Excepturi voluptates consequatur facere labore tempore distinctio.', '2024-06-18 03:14:44', NULL),
(49, 1, 1, 1, '10', '2024-01-17', '2024-01-19', '{\"baby\": 2, \"adult\": 5, \"child\": 7, \"animal\": 5}', '{\"site_price\": 945127, \"extra_price\": 473421, \"location_price\": 753715}', NULL, 'jajiga', 'At consequatur maiores architecto sunt. Ea odio eius in sapiente adipisci. Ut est eos ipsam pariatur nobis. Ea debitis repudiandae minima error consequuntur explicabo. Rem rerum libero maxime inventore libero et.', '2024-04-17 16:31:22', NULL),
(50, 1, 1, 19, '10', '2024-01-08', '2024-01-15', '{\"baby\": 10, \"adult\": 3, \"child\": 2, \"animal\": 9}', '{\"site_price\": 895262, \"extra_price\": 463372, \"location_price\": 482101}', NULL, 'sam', 'Minus itaque doloremque tempora ut est dolores eveniet accusamus. Rerum pariatur consequatur et in neque architecto provident at. Voluptas ut quas non hic eius nam. Modi porro eos eveniet.', '2022-12-12 04:14:48', NULL),
(51, 1, 1, 5, '2', '2024-01-11', '2024-01-13', '{\"baby\": 7, \"adult\": 2, \"child\": 8, \"animal\": 4}', '{\"site_price\": 894968, \"extra_price\": 612111, \"location_price\": 414304}', NULL, 'homsa', 'Ex atque in nulla voluptatem. Dolor soluta dolores beatae et. Illo placeat saepe culpa aut officiis ut. Quo iste asperiores eum dolor. Eos expedita aliquid soluta.', '2021-09-20 22:13:03', NULL),
(52, 1, 1, 2, '9', '2024-01-17', '2024-01-20', '{\"baby\": 7, \"adult\": 2, \"child\": 2, \"animal\": 6}', '{\"site_price\": 344673, \"extra_price\": 298048, \"location_price\": 379905}', NULL, 'lidomatrip', 'Nobis temporibus voluptatum non inventore quam iure harum. Qui itaque accusantium illum placeat et ut.', '2023-10-29 16:56:37', NULL),
(53, 1, 1, 2, '9', '2024-01-17', '2024-01-19', '{\"baby\": 9, \"adult\": 4, \"child\": 10, \"animal\": 4}', '{\"site_price\": 777198, \"extra_price\": 205894, \"location_price\": 980620}', NULL, 'shab', 'Et nulla qui harum nam nulla qui. Sit enim necessitatibus beatae velit aut. Voluptatem itaque minima repudiandae id optio debitis rerum provident.', '2024-10-08 09:57:50', NULL),
(54, 1, 1, 11, '8', '2024-01-04', '2024-01-18', '{\"baby\": 6, \"adult\": 8, \"child\": 6, \"animal\": 4}', '{\"site_price\": 621937, \"extra_price\": 364913, \"location_price\": 871819}', NULL, 'pinorest', 'Adipisci aspernatur quis quidem corrupti nihil consequatur perferendis accusantium. Impedit ea quasi aut. Nulla dolor praesentium nisi sequi corporis. Omnis est rerum quo voluptatem nulla est.', '2023-09-23 06:52:41', NULL),
(55, 1, 1, 4, '2', '2024-01-16', '2024-01-20', '{\"baby\": 6, \"adult\": 5, \"child\": 9, \"animal\": 10}', '{\"site_price\": 646337, \"extra_price\": 200722, \"location_price\": 893833}', NULL, 'sepanja', 'Odit culpa dolores ipsum aut velit dolorum consectetur. Dolorum quas distinctio asperiores. Ratione expedita occaecati ut ut quod. Non earum eius ut debitis quas ut.', '2021-09-01 09:46:42', NULL),
(56, 1, 1, 7, '6', '2024-01-04', '2024-01-14', '{\"baby\": 7, \"adult\": 2, \"child\": 2, \"animal\": 10}', '{\"site_price\": 233928, \"extra_price\": 278889, \"location_price\": 594227}', NULL, 'jajiga', 'Aut perspiciatis ipsum autem accusamus sed assumenda dignissimos. Consequuntur incidunt rerum et et et consectetur. Earum accusamus commodi dolor. Corrupti nihil qui et rerum. Rerum assumenda aut dolore nemo blanditiis.', '2024-02-02 02:49:29', NULL),
(57, 1, 1, 20, '5', '2024-01-11', '2024-01-17', '{\"baby\": 6, \"adult\": 5, \"child\": 1, \"animal\": 8}', '{\"site_price\": 360347, \"extra_price\": 127520, \"location_price\": 899788}', NULL, 'others', 'Blanditiis ratione tempore sint saepe. Culpa quia vitae saepe vitae. Praesentium animi esse iure aut eligendi consequatur. Autem eius repellendus dolor harum aliquid iure et.', '2022-06-11 00:12:41', NULL),
(58, 1, 1, 6, '10', '2024-01-06', '2024-01-16', '{\"baby\": 7, \"adult\": 8, \"child\": 9, \"animal\": 9}', '{\"site_price\": 167110, \"extra_price\": 226451, \"location_price\": 485050}', NULL, 'homsa', 'Voluptatem atque aliquam dolore quae molestiae. Maxime aut et corporis optio sint veritatis.', '2024-05-11 03:14:13', NULL),
(59, 1, 1, 15, '5', '2024-01-09', '2024-01-15', '{\"baby\": 10, \"adult\": 8, \"child\": 5, \"animal\": 9}', '{\"site_price\": 703316, \"extra_price\": 127052, \"location_price\": 118806}', NULL, 'lidomatrip', 'Impedit sit qui ipsa. Cupiditate et laudantium modi culpa nam deserunt voluptatem et. Ea sed reiciendis ut velit consequuntur. Quis aut eveniet sed vero voluptatem.', '2023-09-01 00:18:54', NULL),
(60, 1, 1, 2, '4', '2024-01-04', '2024-01-14', '{\"baby\": 4, \"adult\": 1, \"child\": 7, \"animal\": 3}', '{\"site_price\": 159224, \"extra_price\": 776879, \"location_price\": 375576}', NULL, 'phone', 'Qui ipsum sed quibusdam porro magnam. Repellendus veniam cum atque ab aut. Sunt laudantium qui dolorum.', '2020-09-23 11:39:58', NULL),
(61, 1, 1, 16, '5', '2024-01-15', '2024-01-17', '{\"baby\": 8, \"adult\": 5, \"child\": 1, \"animal\": 2}', '{\"site_price\": 261095, \"extra_price\": 507165, \"location_price\": 627434}', NULL, 'others', 'Magni expedita iure omnis quo. Beatae nobis sed commodi molestias minima ipsam expedita enim. Voluptate sint maiores perferendis ad quisquam est. Quo qui et tempore esse aut expedita error. Repellat officiis aut eum quam temporibus voluptas.', '2021-07-30 11:42:24', NULL),
(62, 1, 1, 18, '1', '2024-01-19', '2024-01-20', '{\"baby\": 10, \"adult\": 1, \"child\": 1, \"animal\": 9}', '{\"site_price\": 709062, \"extra_price\": 423694, \"location_price\": 384623}', NULL, 'lidomatrip', 'Cupiditate illo voluptatem vero voluptatibus veritatis ut. Voluptatem pariatur suscipit voluptates porro ad. Vel alias recusandae voluptas itaque id et eveniet. Aut facere saepe qui veritatis veniam.', '2024-10-01 13:43:30', NULL),
(63, 1, 1, 4, '7', '2024-01-16', '2024-01-18', '{\"baby\": 3, \"adult\": 2, \"child\": 2, \"animal\": 3}', '{\"site_price\": 281607, \"extra_price\": 552727, \"location_price\": 357822}', NULL, 'lidomatrip', 'Enim sed et a occaecati incidunt ex corporis. Sint unde reiciendis est laudantium modi voluptatem eligendi. Sed perferendis autem maxime enim corporis. Asperiores autem recusandae nesciunt nisi voluptatem quis.', '2022-04-17 17:20:38', NULL),
(64, 1, 1, 20, '9', '2024-01-18', '2024-01-20', '{\"baby\": 4, \"adult\": 10, \"child\": 8, \"animal\": 8}', '{\"site_price\": 909480, \"extra_price\": 739222, \"location_price\": 522845}', NULL, 'others', 'Quae repellendus qui facilis adipisci in aliquam. Et placeat ut voluptas veniam dignissimos. Perferendis assumenda ullam dolorem voluptatem quia. Odit et optio in error ab rerum et.', '2021-05-16 05:53:01', NULL),
(65, 1, 1, 17, '10', '2024-01-05', '2024-01-18', '{\"baby\": 3, \"adult\": 1, \"child\": 2, \"animal\": 8}', '{\"site_price\": 207246, \"extra_price\": 345432, \"location_price\": 885593}', NULL, 'others', 'Asperiores ullam autem ad quos accusantium fugiat. Illo itaque vel corporis ea. At ut dignissimos dignissimos reiciendis quisquam cumque.', '2024-11-10 19:38:19', NULL),
(66, 1, 1, 20, '2', '2024-01-06', '2024-01-08', '{\"baby\": 8, \"adult\": 3, \"child\": 4, \"animal\": 2}', '{\"site_price\": 344326, \"extra_price\": 146461, \"location_price\": 716990}', NULL, 'otaghak', 'Alias nobis qui reiciendis numquam. Natus provident dolorum totam provident quos. Sequi earum sequi quia accusamus repellat officiis est sapiente.', '2022-12-28 03:58:04', NULL),
(67, 1, 1, 19, '6', '2024-01-07', '2024-01-11', '{\"baby\": 3, \"adult\": 1, \"child\": 6, \"animal\": 5}', '{\"site_price\": 203026, \"extra_price\": 750936, \"location_price\": 457411}', NULL, 'homsa', 'Voluptate optio modi modi maxime iste quis. Accusamus est optio quam consequatur sapiente qui. Adipisci cumque voluptas quae est debitis quod quia.', '2023-02-07 06:16:49', NULL),
(68, 1, 1, 8, '8', '2024-01-09', '2024-01-16', '{\"baby\": 6, \"adult\": 1, \"child\": 7, \"animal\": 10}', '{\"site_price\": 967970, \"extra_price\": 222348, \"location_price\": 243001}', NULL, 'sepanja', 'Officiis in expedita tenetur vel quidem. Corporis non modi voluptate quasi.', '2020-06-14 22:30:39', NULL),
(69, 1, 1, 7, '2', '2024-01-13', '2024-01-20', '{\"baby\": 1, \"adult\": 7, \"child\": 3, \"animal\": 8}', '{\"site_price\": 129800, \"extra_price\": 678493, \"location_price\": 636162}', NULL, 'homsa', 'Sit pariatur libero excepturi cupiditate veritatis maiores. Non est sit nam voluptates. Libero ipsa ut asperiores ea qui. Illo et magni nihil tempore dolorem.', '2024-05-27 06:33:04', NULL),
(70, 1, 1, 1, '2', '2024-01-14', '2024-01-17', '{\"baby\": 10, \"adult\": 8, \"child\": 10, \"animal\": 2}', '{\"site_price\": 606762, \"extra_price\": 101327, \"location_price\": 618485}', NULL, 'lidomatrip', 'Rerum ratione enim architecto commodi autem. Qui voluptas enim delectus blanditiis. Eum vitae consequatur facere at blanditiis laboriosam nulla commodi. Perferendis labore totam sed.', '2021-09-07 05:36:43', NULL),
(71, 1, 1, 18, '7', '2024-01-15', '2024-01-20', '{\"baby\": 1, \"adult\": 4, \"child\": 5, \"animal\": 1}', '{\"site_price\": 209433, \"extra_price\": 678464, \"location_price\": 893214}', NULL, 'phone', 'Laborum explicabo voluptatem dolor sed. Id qui alias molestias corrupti enim. Ea voluptatem quia maxime maxime modi amet.', '2023-07-10 18:30:18', NULL),
(72, 1, 1, 8, '6', '2024-01-08', '2024-01-09', '{\"baby\": 6, \"adult\": 1, \"child\": 2, \"animal\": 1}', '{\"site_price\": 863122, \"extra_price\": 543233, \"location_price\": 859113}', NULL, 'jajiga', 'Quos minima minima ratione aut magnam veritatis. Hic minima minima adipisci. Non nisi dolorem qui.', '2024-10-25 16:50:45', NULL),
(73, 1, 1, 14, '10', '2024-01-19', '2024-01-20', '{\"baby\": 6, \"adult\": 4, \"child\": 2, \"animal\": 5}', '{\"site_price\": 460356, \"extra_price\": 976234, \"location_price\": 953966}', NULL, 'sepanja', 'Eveniet eos iure sed quia. Enim error sit voluptatibus tempore provident nesciunt id. Possimus consequatur eum consectetur aperiam animi aspernatur. Libero quia est vel laborum et voluptas quia. Libero qui corrupti aut voluptatem nobis voluptatem soluta.', '2020-01-02 11:27:23', NULL),
(74, 1, 1, 12, '6', '2024-01-11', '2024-01-20', '{\"baby\": 10, \"adult\": 8, \"child\": 5, \"animal\": 4}', '{\"site_price\": 820049, \"extra_price\": 538665, \"location_price\": 856031}', NULL, 'lidomatrip', 'Qui necessitatibus dolorem inventore vero placeat et. Laborum et odit reprehenderit dolores aut harum molestiae. Rerum non numquam odio id dolorum. Numquam aspernatur nihil dolor ipsum expedita iste.', '2021-01-01 02:49:17', NULL),
(75, 1, 1, 14, '5', '2024-01-07', '2024-01-17', '{\"baby\": 4, \"adult\": 4, \"child\": 3, \"animal\": 10}', '{\"site_price\": 234923, \"extra_price\": 591701, \"location_price\": 371656}', NULL, 'sepanja', 'Aut eos velit omnis nihil. Expedita numquam exercitationem a quis vero. Non sint et ut.', '2022-11-26 23:58:51', NULL),
(76, 1, 1, 12, '10', '2024-01-07', '2024-01-15', '{\"baby\": 3, \"adult\": 1, \"child\": 3, \"animal\": 1}', '{\"site_price\": 683851, \"extra_price\": 498451, \"location_price\": 287173}', NULL, 'sam', 'Voluptatem reprehenderit architecto neque corporis. Veniam officiis est quisquam. Sit ut necessitatibus sint accusamus est laudantium. Aut ullam provident aut sit.', '2023-06-16 00:08:29', NULL),
(77, 1, 1, 7, '10', '2024-01-08', '2024-01-15', '{\"baby\": 5, \"adult\": 2, \"child\": 6, \"animal\": 9}', '{\"site_price\": 484412, \"extra_price\": 201743, \"location_price\": 639990}', NULL, 'sepanja', 'Quia est occaecati ut et occaecati. Sed quia qui excepturi fuga fuga doloribus. Ea eaque ut molestiae fuga hic et dolores. Saepe aspernatur omnis est et aliquid fugiat.', '2022-01-07 22:09:09', NULL),
(78, 1, 1, 13, '3', '2024-01-14', '2024-01-16', '{\"baby\": 9, \"adult\": 5, \"child\": 5, \"animal\": 9}', '{\"site_price\": 166402, \"extra_price\": 528148, \"location_price\": 967642}', NULL, 'sam', 'Veniam sint in id adipisci. Quis non ipsam vel fugit. Dolores fugit repudiandae ut voluptas sed doloribus tempore. Rerum sunt temporibus nisi. Ut veritatis minus repellendus voluptas et dignissimos totam.', '2024-10-21 07:19:24', NULL),
(79, 1, 1, 6, '2', '2024-01-07', '2024-01-16', '{\"baby\": 5, \"adult\": 6, \"child\": 6, \"animal\": 6}', '{\"site_price\": 492337, \"extra_price\": 543132, \"location_price\": 797623}', NULL, 'phone', 'Voluptatem possimus occaecati dolorem quas. Libero quas quia omnis ab mollitia est. Quaerat est quia sunt sapiente suscipit quo.', '2022-05-29 05:57:48', NULL),
(80, 1, 1, 11, '9', '2024-01-08', '2024-01-19', '{\"baby\": 4, \"adult\": 1, \"child\": 6, \"animal\": 2}', '{\"site_price\": 159416, \"extra_price\": 260183, \"location_price\": 827597}', NULL, 'shab', 'Quis non non eligendi. Est architecto et nemo doloribus. Non porro repudiandae eos aut consequatur aut. Nihil omnis quos fugiat veniam.', '2023-03-19 10:09:07', NULL),
(81, 1, 1, 3, '2', '2024-01-11', '2024-01-15', '{\"baby\": 4, \"adult\": 4, \"child\": 3, \"animal\": 2}', '{\"site_price\": 438400, \"extra_price\": 699989, \"location_price\": 507027}', NULL, 'phone', 'Minus unde vitae et architecto. Rerum quis asperiores nulla velit. Accusamus ad odit omnis et dolore deleniti voluptas. Voluptatem maiores temporibus assumenda magni omnis. Aut autem et amet facilis aut distinctio.', '2021-12-18 20:07:45', NULL),
(82, 1, 1, 17, '1', '2024-01-01', '2024-01-07', '{\"baby\": 6, \"adult\": 2, \"child\": 5, \"animal\": 9}', '{\"site_price\": 839373, \"extra_price\": 550927, \"location_price\": 636198}', NULL, 'roomtoor', 'Quo et quo occaecati ratione. Exercitationem et maxime laudantium. Quidem explicabo ad sapiente laborum voluptate aspernatur quas.', '2023-01-10 10:59:52', NULL),
(83, 1, 1, 15, '10', '2024-01-19', '2024-01-20', '{\"baby\": 9, \"adult\": 4, \"child\": 3, \"animal\": 4}', '{\"site_price\": 245084, \"extra_price\": 956331, \"location_price\": 340820}', NULL, 'sam', 'Id deserunt non consequatur magni. Aut sed dicta voluptatibus dolore ut sint. Aperiam nam aut quibusdam nihil asperiores. Quia necessitatibus id facilis quidem vero accusamus sequi.', '2023-04-24 19:25:06', NULL),
(84, 1, 1, 9, '9', '2024-01-10', '2024-01-18', '{\"baby\": 3, \"adult\": 4, \"child\": 5, \"animal\": 8}', '{\"site_price\": 379525, \"extra_price\": 700616, \"location_price\": 321550}', NULL, 'sepanja', 'Et quae nesciunt et illo. Delectus consectetur quibusdam vel debitis et. Architecto debitis dolorum debitis placeat ducimus architecto modi quasi. Suscipit quasi doloremque quia et.', '2020-12-07 17:24:17', NULL),
(85, 1, 1, 16, '9', '2024-01-17', '2024-01-20', '{\"baby\": 8, \"adult\": 5, \"child\": 8, \"animal\": 2}', '{\"site_price\": 153227, \"extra_price\": 877344, \"location_price\": 803358}', NULL, 'roomtoor', 'Et impedit dolorem esse. Culpa quisquam eos fugiat repellat sit consequatur. Hic explicabo incidunt dolorum quis voluptatum qui. Alias ullam nesciunt ut ipsa hic.', '2020-07-18 00:37:19', NULL),
(86, 1, 1, 3, '3', '2024-01-17', '2024-01-18', '{\"baby\": 8, \"adult\": 2, \"child\": 2, \"animal\": 3}', '{\"site_price\": 241611, \"extra_price\": 463262, \"location_price\": 318800}', NULL, 'others', 'In voluptatum laboriosam quisquam quaerat ut fugiat. Nemo est harum tempore ipsum aliquam voluptate magni iure. Fugiat iste laboriosam quas ut. Rerum sit quidem excepturi ipsum.', '2022-03-01 21:36:02', NULL),
(87, 1, 1, 7, '3', '2024-01-02', '2024-01-17', '{\"baby\": 1, \"adult\": 4, \"child\": 3, \"animal\": 1}', '{\"site_price\": 764684, \"extra_price\": 938429, \"location_price\": 311485}', NULL, 'phone', 'Eos expedita qui eum aut iure. Doloremque quia quisquam aut molestias quidem. Explicabo aut qui maxime ut voluptatibus ut mollitia.', '2021-08-12 16:26:53', NULL),
(88, 1, 1, 13, '3', '2024-01-19', '2024-01-20', '{\"baby\": 8, \"adult\": 10, \"child\": 8, \"animal\": 2}', '{\"site_price\": 731005, \"extra_price\": 750865, \"location_price\": 155122}', NULL, 'phone', 'Dolore consectetur quam pariatur nihil voluptatum numquam voluptatum. Odio voluptatum aut quia sequi tempore. Fugit repellendus ut sunt modi. Aut libero eveniet aut dolorem.', '2023-08-30 11:11:42', NULL),
(89, 1, 1, 7, '3', '2024-01-19', '2024-01-20', '{\"baby\": 9, \"adult\": 1, \"child\": 3, \"animal\": 1}', '{\"site_price\": 373366, \"extra_price\": 433790, \"location_price\": 147681}', NULL, 'pinorest', 'Veniam eos similique sit harum inventore dolorem. Repudiandae voluptatibus et illum libero neque itaque sequi. Amet est aut qui voluptas ea.', '2023-07-24 10:33:23', NULL),
(90, 1, 1, 13, '5', '2024-01-07', '2024-01-18', '{\"baby\": 5, \"adult\": 1, \"child\": 3, \"animal\": 6}', '{\"site_price\": 591224, \"extra_price\": 423801, \"location_price\": 298930}', NULL, 'phone', 'Mollitia harum commodi voluptatum facere nam qui eligendi. Et tempore atque fugiat aut vero explicabo dolores soluta.', '2021-11-22 23:52:15', NULL),
(91, 1, 1, 3, '8', '2024-01-06', '2024-01-09', '{\"baby\": 2, \"adult\": 4, \"child\": 7, \"animal\": 10}', '{\"site_price\": 709186, \"extra_price\": 638483, \"location_price\": 201716}', NULL, 'sam', 'Temporibus eius unde optio molestiae. Ut omnis omnis quia nostrum sunt et quasi excepturi. Vel ipsum error ducimus quod aut impedit.', '2020-10-29 10:41:35', NULL),
(92, 1, 1, 15, '1', '2024-01-10', '2024-01-19', '{\"baby\": 1, \"adult\": 8, \"child\": 9, \"animal\": 4}', '{\"site_price\": 486165, \"extra_price\": 522555, \"location_price\": 362060}', NULL, 'shab', 'Accusamus sunt sit et qui et quod. Velit et occaecati exercitationem voluptatem qui sit. Suscipit rem voluptas minima. Quia nihil qui rem qui voluptas est.', '2020-11-13 17:42:49', NULL),
(93, 1, 1, 13, '5', '2024-01-10', '2024-01-17', '{\"baby\": 2, \"adult\": 4, \"child\": 7, \"animal\": 7}', '{\"site_price\": 214692, \"extra_price\": 292013, \"location_price\": 402712}', NULL, 'roomtoor', 'Sint qui unde ut velit quis in in molestiae. Explicabo temporibus quidem cum dolor. Illo consectetur minus et ipsa.', '2021-08-10 09:22:54', NULL),
(94, 1, 1, 4, '7', '2024-01-08', '2024-01-17', '{\"baby\": 2, \"adult\": 9, \"child\": 10, \"animal\": 8}', '{\"site_price\": 999832, \"extra_price\": 875706, \"location_price\": 551570}', NULL, 'otaghak', 'Sapiente ut totam quia omnis quam neque eum. Veritatis et enim aut repellat voluptas in laborum. Vel officia perspiciatis iure corporis soluta ut. Quae numquam nesciunt distinctio modi et dolorem. Provident incidunt vitae deleniti dicta sint ut ut.', '2020-05-12 22:32:35', NULL),
(95, 1, 1, 4, '8', '2024-01-19', '2024-01-20', '{\"baby\": 5, \"adult\": 5, \"child\": 6, \"animal\": 6}', '{\"site_price\": 565377, \"extra_price\": 201115, \"location_price\": 959062}', NULL, 'shab', 'Magnam est voluptas sit et aut reprehenderit. Velit ut inventore optio autem neque architecto.', '2021-01-01 15:43:20', NULL),
(96, 1, 1, 13, '3', '2024-01-11', '2024-01-17', '{\"baby\": 2, \"adult\": 3, \"child\": 9, \"animal\": 7}', '{\"site_price\": 504680, \"extra_price\": 787796, \"location_price\": 579289}', NULL, 'others', 'Et doloremque odit animi eum quisquam et dignissimos. Exercitationem quis et facere fugiat architecto. Laborum eum saepe ut qui provident laboriosam.', '2021-06-16 04:24:52', NULL),
(97, 1, 1, 13, '7', '2024-01-19', '2024-01-20', '{\"baby\": 6, \"adult\": 4, \"child\": 4, \"animal\": 5}', '{\"site_price\": 172764, \"extra_price\": 303566, \"location_price\": 167371}', NULL, 'roomtoor', 'Qui est ullam deserunt maxime. Quos similique laudantium error quia quis voluptas sed accusantium. Sint odio ea amet. Velit voluptas ut et qui suscipit.', '2022-09-23 18:12:37', NULL),
(98, 1, 1, 13, '10', '2024-01-15', '2024-01-20', '{\"baby\": 9, \"adult\": 6, \"child\": 2, \"animal\": 10}', '{\"site_price\": 902828, \"extra_price\": 414714, \"location_price\": 780071}', NULL, 'roomtoor', 'In eaque fugit quisquam in eos ratione. Nulla facilis tempora eos consequuntur rerum eveniet ipsa. Aliquid mollitia aut dolor exercitationem quidem. Porro ut ad ab reiciendis.', '2023-01-11 01:02:06', NULL),
(99, 1, 1, 7, '2', '2024-01-02', '2024-01-14', '{\"baby\": 4, \"adult\": 6, \"child\": 4, \"animal\": 1}', '{\"site_price\": 360760, \"extra_price\": 963285, \"location_price\": 342905}', NULL, 'sepanja', 'Aspernatur dignissimos placeat animi quia. Maiores odio aspernatur sint velit atque facilis laborum. Voluptas sunt explicabo sit ducimus. Ea placeat aut sed recusandae aut optio voluptates reprehenderit.', '2024-01-05 20:37:01', NULL),
(100, 1, 1, 3, '7', '2024-01-14', '2024-01-20', '{\"baby\": 6, \"adult\": 4, \"child\": 4, \"animal\": 5}', '{\"site_price\": 719269, \"extra_price\": 916091, \"location_price\": 181698}', NULL, 'otaghak', 'Deleniti autem est rerum nesciunt odit minus et. Qui delectus quo fugit sequi nemo repudiandae. Rerum pariatur debitis inventore aut. Deleniti cupiditate nihil reprehenderit aut iure ad voluptatem.', '2020-11-30 09:40:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create users', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(2, 'read users', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(3, 'update users', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(4, 'delete users', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(5, 'read permissions', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(6, 'create roles', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(7, 'read roles', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(8, 'update roles', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(9, 'delete roles', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(10, 'create spaces', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(11, 'read spaces', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(12, 'update spaces', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(13, 'delete spaces', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(14, 'create orders', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(15, 'read orders', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(16, 'update orders', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(17, 'delete orders', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(18, 'management statistics', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, '+989162154221_api_token', '48902f4e188c6dd3b8f745404bb0dc3aa5d3511b708d0a8cc326c5ad6d0dc492', '[\"*\"]', '2023-12-29 19:22:43', NULL, '2023-12-26 14:29:11', '2023-12-29 19:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40'),
(2, 'user', 'web', '2023-12-26 14:24:40', '2023-12-26 14:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spaces`
--

CREATE TABLE `spaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prices` json NOT NULL,
  `responsible_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spaces`
--

INSERT INTO `spaces` (`id`, `author_id`, `name`, `unit`, `standard_capacity`, `extra_capacity`, `prices`, `responsible_id`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mrs. Breana Herman', '6', '3', '7', '{\"eid_days\": 486187, \"peak_days\": 752286, \"normal_days\": 517412, \"weekends_days\": 154539}', 10, '82006 Hoppe Trail Suite 605\nFeeneyport, TN 70275-5825', 'Repellendus molestias id mollitia aliquam odio. Eum qui voluptatem quia officia illum quis. Voluptas enim nobis doloribus saepe. Neque eum est explicabo qui.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(2, 1, 'Jovany Langworth', '4', '4', '1', '{\"eid_days\": 126781, \"peak_days\": 735029, \"normal_days\": 983484, \"weekends_days\": 321517}', 10, '49663 Borer Mountains\nLake Macie, SD 02316-1040', 'Velit doloribus molestiae nesciunt voluptatem qui in. Quia ut hic consequatur cum tempora eum rerum. Aut autem asperiores velit consequatur ut dolorum.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(3, 1, 'Karson Boehm', '3', '9', '4', '{\"eid_days\": 847978, \"peak_days\": 646807, \"normal_days\": 350310, \"weekends_days\": 509097}', 4, '118 Geovany Locks Apt. 266\nHackettbury, WY 79549', 'Ipsa rerum qui porro rem voluptatem. Aut voluptatum et non deleniti ducimus distinctio. Iure ut mollitia aut aut quidem.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(4, 1, 'Mariam Dietrich', '9', '10', '4', '{\"eid_days\": 864788, \"peak_days\": 192877, \"normal_days\": 998554, \"weekends_days\": 181655}', 2, '9773 Lockman Islands\nNorth Lera, TX 33343-7835', 'Sint non neque totam natus autem. Est fugiat est tempora enim omnis libero aut. Eum aut harum autem aut.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(5, 1, 'Isabel Tromp', '10', '9', '2', '{\"eid_days\": 640673, \"peak_days\": 715839, \"normal_days\": 987513, \"weekends_days\": 839576}', 6, '254 Leora Mountains\nPort Raheem, WA 29885', 'Sint explicabo hic voluptate sequi. Aut ad dicta ut eius assumenda repellat. Illum aut possimus voluptas minima ea porro autem.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(6, 1, 'Aryanna Parisian', '1', '6', '8', '{\"eid_days\": 347032, \"peak_days\": 656596, \"normal_days\": 353191, \"weekends_days\": 421831}', 10, '252 Clifford Field Suite 576\nPort Carley, AK 62429', 'Sit veniam accusamus enim est quos qui. Vel pariatur placeat provident nemo hic eum. Corporis corporis magnam earum aut. Voluptatem eum quis blanditiis neque eos consequuntur.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(7, 1, 'Felicity Bayer I', '9', '8', '2', '{\"eid_days\": 482457, \"peak_days\": 302899, \"normal_days\": 901223, \"weekends_days\": 785033}', 2, '97875 Bashirian Village Apt. 856\nVictoriamouth, IA 02377-8022', 'Perferendis nulla velit laboriosam fugiat ab quis voluptates. Sed aut temporibus dolorem. Quidem adipisci enim nihil et est saepe. Quidem ex culpa rerum placeat officiis velit ea. Nam voluptatum aut cupiditate veritatis.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(8, 1, 'Mrs. Elda Champlin II', '3', '7', '9', '{\"eid_days\": 422600, \"peak_days\": 618448, \"normal_days\": 285425, \"weekends_days\": 205331}', 8, '504 Runolfsdottir Port Suite 159\nDoviechester, KY 84201-6307', 'Suscipit amet recusandae et. Rem placeat sed deleniti. Maiores odit reiciendis consequatur. Consequatur blanditiis dolor officia eos magni necessitatibus.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(9, 1, 'Olaf Jacobs', '3', '2', '1', '{\"eid_days\": 145249, \"peak_days\": 683535, \"normal_days\": 276733, \"weekends_days\": 696750}', 7, '140 Konopelski Crest\nPort Aliviaburgh, AK 54096', 'Expedita et qui asperiores rem. Hic pariatur aliquid quia consequatur velit. Voluptatem quasi aut molestiae qui impedit. Praesentium magnam quam iste nam est animi quos.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(10, 1, 'Mr. Haley Hessel', '2', '2', '5', '{\"eid_days\": 464635, \"peak_days\": 681184, \"normal_days\": 888531, \"weekends_days\": 839753}', 4, '586 Clementina Mews Suite 347\nEast Tyree, OK 95543-6580', 'Harum quas alias sint nobis dolorum sequi tempore facere. Quis deserunt laboriosam et aspernatur sed. Omnis qui fugiat sapiente voluptatum quos. Exercitationem quis illum et saepe et.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(11, 1, 'Tad Bernhard', '5', '5', '7', '{\"eid_days\": 600194, \"peak_days\": 224308, \"normal_days\": 356412, \"weekends_days\": 400083}', 6, '70845 Iva Fall\nKilbackburgh, NJ 97456-1315', 'Incidunt unde et et omnis. Occaecati et reiciendis qui quaerat minima. Aspernatur vel eveniet in blanditiis debitis. Aut ut eos molestias tenetur necessitatibus earum.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(12, 1, 'Prof. Porter Kreiger', '5', '7', '5', '{\"eid_days\": 486023, \"peak_days\": 220274, \"normal_days\": 802567, \"weekends_days\": 663751}', 2, '860 Alva Pines\nEast Rashawn, NJ 01302-6864', 'Placeat aperiam rem hic quae officia vero enim dolor. Blanditiis dolorum tenetur dolorem rerum consectetur sequi vel. Consequuntur et vero animi atque nesciunt non et. Qui id sit quia qui magni.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(13, 1, 'Yadira Roberts PhD', '3', '9', '1', '{\"eid_days\": 502522, \"peak_days\": 789040, \"normal_days\": 505178, \"weekends_days\": 508275}', 6, '17255 Viva Bridge\nTheresastad, IN 23019-0172', 'Tempora suscipit nobis qui nemo consectetur. Ut dolorum alias et dolore aperiam repellendus.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(14, 1, 'Dell Daugherty', '9', '6', '2', '{\"eid_days\": 273294, \"peak_days\": 731517, \"normal_days\": 209871, \"weekends_days\": 436853}', 8, '602 Ernser Meadow\nTurnerport, NH 27162', 'Neque facilis quam et fugiat. Magni dignissimos est voluptates rerum. Enim aliquam molestiae voluptatem aut nesciunt qui.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(15, 1, 'Shemar Mayert', '7', '7', '9', '{\"eid_days\": 696049, \"peak_days\": 907568, \"normal_days\": 992247, \"weekends_days\": 887348}', 10, '5908 Hattie Drive\nStephenmouth, FL 84050', 'Qui labore sint aliquid qui voluptatem nostrum. In porro rerum et. Expedita ut eius deleniti nostrum.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(16, 1, 'Josiane Blanda', '10', '6', '9', '{\"eid_days\": 422977, \"peak_days\": 639934, \"normal_days\": 362310, \"weekends_days\": 868022}', 5, '9427 O\'Keefe Lake\nSouth Ernest, UT 68914-8123', 'Doloremque ducimus omnis vero non ex maiores sunt neque. Sit itaque ut architecto qui. Qui ipsum accusantium est aut aspernatur dignissimos rerum. Et in assumenda architecto ex perferendis distinctio et.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(17, 1, 'Dr. Ethan Wuckert', '10', '10', '8', '{\"eid_days\": 551678, \"peak_days\": 966636, \"normal_days\": 358652, \"weekends_days\": 757367}', 7, '484 Richmond Way\nBethville, LA 81698-2603', 'Qui nulla eos voluptatem molestias quo. Porro omnis quas unde nihil magni tempore. Ut culpa eum hic nemo sed laborum rerum.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(18, 1, 'Zack Franecki', '6', '7', '3', '{\"eid_days\": 577612, \"peak_days\": 360696, \"normal_days\": 757557, \"weekends_days\": 204680}', 4, '9703 Turner Trail\nPort Marleeburgh, HI 51989', 'Tempore voluptatum rerum magni quae. Corrupti architecto itaque quos soluta magni. Nulla architecto ad est qui nihil recusandae.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(19, 1, 'Ms. Vena Morar I', '1', '4', '6', '{\"eid_days\": 149136, \"peak_days\": 385941, \"normal_days\": 933185, \"weekends_days\": 998919}', 10, '417 Annalise Mission\nEast Jamarfort, NM 50921-4292', 'Voluptas quibusdam fugit maxime ea blanditiis esse repellendus blanditiis. In voluptatem voluptatem et non id eos.', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(20, 1, 'Mr. Zachariah Gutkowski', '1', '5', '7', '{\"eid_days\": 561497, \"peak_days\": 488501, \"normal_days\": 286697, \"weekends_days\": 624282}', 7, '164 Virgil Common\nMauriceland, MI 37096-7427', 'Magnam delectus mollitia excepturi et. Provident et voluptatibus culpa ratione assumenda. Quaerat at dolor eius soluta.', '2023-12-26 14:24:45', '2023-12-26 14:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `author_id`, `name`, `mobile`, `province`, `city`, `address`, `description`, `password`, `created_at`, `updated_at`) VALUES
(1, NULL, 'farid shishebori', '+989162154221', 'yazd', 'yazd', 'yazd', 'I am backend developer(faridepc78)', '$2y$12$y6uRUO/EE5sh97jn3v7iEudhrgIzObiBwV4pk/6tgMDqrnGpP5Ova', '2023-12-26 14:24:41', '2023-12-26 14:24:41'),
(2, 1, 'Kristina Steuber', '+989575284565', NULL, NULL, NULL, NULL, '$2y$12$Pl3FF5UoEnl.BIPjR58rkuQrpIDwbCq8vJSB9rd0b0WTfVqiAbheS', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(3, 1, 'Andreane Gutkowski I', '+989276967200', NULL, NULL, NULL, NULL, '$2y$12$T9uKsqDDl8/3K2Yj.wuss.Kx0xmp/QjY2oBpWBVaIT7oyAq9A2qGG', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(4, 1, 'Alverta Thompson DDS', '+989659701366', NULL, NULL, NULL, NULL, '$2y$12$nqYsjAHOH.YzZdAWBAsC9OgYBNZifkr2IpWev4tDKFcK7TODfYyTW', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(5, 1, 'Eveline Schroeder', '+989546464320', NULL, NULL, NULL, NULL, '$2y$12$Dvwfl68HSo2w4CPRpvLeLOWtwv8mr3TREiwHJTVw49DU1c2IMje1i', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(6, 1, 'Ervin Williamson', '+989889824974', NULL, NULL, NULL, NULL, '$2y$12$oiqY2zz80qV0cDnrWk5hgO5eOlHlQBrgZ4Tsg9AjWjYp/36fz50um', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(7, 1, 'Prof. Zackary Hessel', '+989659051657', NULL, NULL, NULL, NULL, '$2y$12$LxpPp3Fbn2BEyidY81Creexm3lK7HCUbvrwm1Yg3g6UZQp0DuFSPy', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(8, 1, 'Hazel Wintheiser', '+989715074228', NULL, NULL, NULL, NULL, '$2y$12$u4XAsNSlkI.11SpZBEs6luniGnAc.0oaMZ.9LyeV694qf9BOqh7Em', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(9, 1, 'Chloe Smith PhD', '+989005172622', NULL, NULL, NULL, NULL, '$2y$12$mBnqMwLlaeqFyKUDkxv6Mu/zBR4l.d9rUZ35zBduwahSuWGzdYr0K', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(10, 1, 'Mr. Alfred Carroll', '+989030374742', NULL, NULL, NULL, NULL, '$2y$12$ibbEGbJ0PRSWPUSGkwRvPelZ2FbEgR8uU1DDT3RCXADEJ3A9kgIxa', '2023-12-26 14:24:45', '2023-12-26 14:24:45'),
(11, 1, 'Abby Hoppe', '+989816245139', NULL, NULL, NULL, NULL, '$2y$12$drESHizHBDWRzl.Cy5..PunzWrvZuVEjGXreR9XcsVT1Z41n8yUxG', '2023-12-26 14:24:45', '2023-12-26 14:24:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_author_id_foreign` (`author_id`),
  ADD KEY `orders_guest_id_foreign` (`guest_id`),
  ADD KEY `orders_space_id_foreign` (`space_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `spaces`
--
ALTER TABLE `spaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spaces_author_id_foreign` (`author_id`),
  ADD KEY `spaces_responsible_id_foreign` (`responsible_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD KEY `users_author_id_foreign` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spaces`
--
ALTER TABLE `spaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_guest_id_foreign` FOREIGN KEY (`guest_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spaces`
--
ALTER TABLE `spaces`
  ADD CONSTRAINT `spaces_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spaces_responsible_id_foreign` FOREIGN KEY (`responsible_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
