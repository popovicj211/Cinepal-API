-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 03:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinepal2`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Will Smith', '2020-04-23 12:47:12', NULL),
(2, 'Martin Lawrence', '2020-04-23 12:47:12', NULL),
(3, 'Tom Cruise', '2020-04-23 12:47:12', NULL),
(4, 'Miles Teller', '2020-04-24 22:16:12', NULL),
(5, 'Scarlet Johansson', '2020-04-25 04:06:04', NULL),
(6, 'David Harbour', '2020-05-13 22:41:25', NULL),
(7, 'Willem Dafoe', '2020-04-25 08:22:04', NULL),
(8, 'Robert Pattinson', '2020-04-25 11:00:00', NULL),
(9, 'Maisie Williams', '2020-04-25 11:00:00', NULL),
(10, 'Charlie Heaton', '2020-04-25 11:00:00', NULL),
(11, 'Ana de Armas', '2020-04-25 11:00:00', NULL),
(12, 'Penelope Cruz', '2020-04-25 11:00:00', NULL),
(39, 'Floy Effertz V', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(40, 'Prof. Burnice Davis', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(41, 'Shany Koelpin Sr.', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(42, 'Shaun Greenholt', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(43, 'Angelica Powlowski', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(44, 'Bobbie Considine', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(45, 'Aiyana Will', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(46, 'Ms. Autumn Shanahan', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(47, 'Mr. Gayle Hudson', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(48, 'Keenan Stracke Jr.', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(49, 'Dr. Floyd Kessler', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(50, 'Dr. Orlando O\'Keefe', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(51, 'Dr. Lorenza Senger', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(52, 'Dr. Gwendolyn Quitzon DDS', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(53, 'Mr. Theron Marvin', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(54, 'Dr. Eleanora Leffler', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(55, 'Miss Hanna Pfeffer V', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(56, 'Dr. Sebastian Waters', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(57, 'Dr. Claudia Dare', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(58, 'Terrance Nitzsche', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(59, 'Dr. Burnice Champlin I', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(60, 'Dr. Alanis Marquardt Sr.', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(61, 'Mrs. Aditya Armstrong', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(62, 'Nicola Legros I', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(63, 'Rylee Larkin', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(64, 'Mona Stanton', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(65, 'Erin Bartoletti', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(66, 'Rogelio Medhurst', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(67, 'Prof. Jalyn Bauch IV', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(68, 'Annabel Hartmann', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(69, 'Reagan Wintheiser', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(70, 'Evangeline Greenfelder', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(71, 'Minnie Schumm', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(72, 'Prof. Lionel Lang I', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(73, 'Pink McClure', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(74, 'Werner Rosenbaum', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(75, 'Jairo Hand', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(76, 'Kiel Dietrich', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(77, 'Mr. Chaz Kuvalis', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(78, 'Miss Birdie Ruecker Jr.', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(79, 'Norbert Hintz DDS', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(80, 'Darby Stoltenberg', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(81, 'Vivianne O\'Conner III', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(82, 'Giovanny Mills', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(83, 'Ms. Opal Herman', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(84, 'Emmie McLaughlin', '2020-10-02 19:02:39', '2020-10-02 19:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'Genre', NULL, '2020-04-23 12:47:12', NULL),
(2, 'Tehnologies', NULL, '2020-04-25 02:09:12', NULL),
(3, 'Action', 1, '2020-04-23 12:47:12', NULL),
(4, 'Comedy', 1, '2020-04-25 02:09:12', NULL),
(5, 'Drama', 1, '2020-04-25 06:13:11', NULL),
(6, 'Adventure', 1, '2020-04-24 22:16:12', NULL),
(7, 'Sci-Fi', 1, '2020-04-25 04:06:04', NULL),
(8, 'Fantasy', 1, '2020-05-13 22:41:25', NULL),
(9, 'Thriler', 1, '2020-05-13 22:41:25', NULL),
(10, 'Digital 2D', 2, '2020-04-23 12:47:12', NULL),
(11, 'Digital 3D', 2, '2020-04-25 02:09:12', NULL),
(12, 'MX4D 2D', 2, '2020-04-25 06:13:11', NULL),
(13, 'MX4D 3D', 2, '2020-04-24 22:16:12', NULL),
(14, 'Genre', NULL, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(15, 'Tehnologies', NULL, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(16, 'Action', 1, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(17, 'Comedy', 1, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(18, 'Drama', 1, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(19, 'Adventure', 1, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(20, 'Sci-Fi', 1, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(21, 'Fantasy', 1, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(22, 'Thriler', 1, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(23, 'Digital 2D', 2, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(24, 'Digital 3D', 2, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(25, 'MX4D 2D', 2, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(26, 'MX4D 3D', 2, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(27, 'Genre', NULL, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(28, 'Tehnologies', NULL, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(29, 'Action', 1, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(30, 'Comedy', 1, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(31, 'Drama', 1, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(32, 'Adventure', 1, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(33, 'Sci-Fi', 1, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(34, 'Fantasy', 1, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(35, 'Thriler', 1, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(36, 'Digital 2D', 2, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(37, 'Digital 3D', 2, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(38, 'MX4D 2D', 2, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(39, 'MX4D 3D', 2, '2020-10-02 19:02:41', '2020-10-02 19:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Pera Peric', 'Pera@gmail.com', 'Movie', 'when will the movie be fast end furious?', '2020-04-23 12:47:12', NULL),
(2, 'Otis Windler', 'ari17@yahoo.com', 'Dr.', 'Veritatis omnis explicabo tempora neque. Ab aliquid quod repudiandae voluptatibus rerum. Assumenda assumenda iusto expedita non mollitia ipsa rerum. Rerum ipsa nemo magnam similique temporibus. Aut et ea laboriosam omnis repellat sequi.', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(3, 'Hellen Schumm', 'erodriguez@jenkins.org', 'Mr.', 'Aut quos aspernatur voluptatum. Aperiam ab rerum vero eos consequatur tempora. Voluptatem dolorum nam omnis placeat.', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(4, 'Mia Barrows', 'rippin.kristina@corwin.com', 'Mr.', 'Alias reiciendis ipsa voluptatem autem aut sapiente labore. Itaque minus nobis qui quo omnis iusto aliquid. Ut et consectetur harum et ut.', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(5, 'Myrtle Marvin', 'hubert03@hotmail.com', 'Miss', 'Deserunt officiis nobis deserunt sint sequi quae. Commodi voluptatem ut dolorem doloribus iure eveniet. Est omnis est sint. Nemo consequatur dolores officia quae est rem qui delectus.', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(6, 'Mr. Eloy Quigley IV', 'davis.tracey@yahoo.com', 'Prof.', 'Nostrum esse animi asperiores delectus quod sapiente. Itaque corporis fugiat at qui. Sed soluta optio veniam ipsa exercitationem itaque voluptatibus. Neque vel culpa vero vitae.', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(7, 'Prof. Claude Ziemann', 'richie47@kilback.com', 'Prof.', 'Ut nam maiores autem molestias. Doloremque qui error pariatur inventore. Expedita in sapiente ratione non qui ea.', '2020-05-17 14:38:43', '2020-05-17 14:38:43'),
(8, 'Giles Hand', 'pwisoky@schneider.net', 'Prof.', 'Commodi aut corrupti aut doloremque. Saepe quod rem numquam quisquam expedita nihil. Eius ab et cupiditate voluptate quam sunt molestias. Est eum ut quis porro voluptatem aut ducimus. Deleniti beatae eaque vel alias dolore corporis.', '2020-05-17 14:38:43', '2020-05-17 14:38:43'),
(9, 'Prof. Micah Moen', 'vena23@gmail.com', 'Prof.', 'Totam odit animi tenetur at ullam omnis eveniet. Tempore ab eius veniam ut. Dolor accusantium omnis corporis voluptatem optio.', '2020-05-17 14:38:43', '2020-05-17 14:38:43'),
(10, 'Dr. Jarrett Conroy PhD', 'khagenes@kohler.com', 'Dr.', 'Dolore quos numquam libero error dolores non. Facilis necessitatibus tempore quibusdam corrupti natus pariatur asperiores eos. Vitae ullam hic et quis et quos. Nostrum laudantium cumque dolor debitis quis quia.', '2020-05-17 14:38:43', '2020-05-17 14:38:43'),
(11, 'Aurore Crooks', 'myles.shields@yahoo.com', 'Miss', 'Voluptatem est nostrum et ad. Provident explicabo occaecati sed labore veniam est. Rerum ab est quas tempora ipsum. Laboriosam incidunt provident impedit quasi culpa rerum dignissimos.', '2020-05-17 14:38:43', '2020-05-17 14:38:43'),
(12, 'Mrs. Gertrude O\'Keefe Sr.', 'murray.austen@gmail.com', 'Prof.', 'Soluta animi ut quaerat labore. Et blanditiis ut provident expedita iste non. Vel aut omnis odit sed illo. Tenetur nulla ad aut vitae. Quisquam ratione at aut qui et quibusdam temporibus.', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(13, 'Edison Gibson', 'ogoldner@gmail.com', 'Miss', 'Facere quis veritatis voluptas dolores tempore. Debitis amet et cum accusamus sint excepturi. Expedita inventore esse asperiores reprehenderit veniam consequuntur consequuntur.', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(14, 'Hans Ruecker', 'uledner@gmail.com', 'Mr.', 'Et iusto doloribus molestias maxime. Autem libero repellendus sit vel illo. Sint quis ad voluptates perferendis aut natus. Nobis sit consectetur eum aliquam omnis numquam. Nostrum vitae unde et incidunt soluta.', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(15, 'Rasheed Rice', 'leannon.lavinia@yahoo.com', 'Ms.', 'Qui vel inventore et est. Dolor minus voluptatem delectus rerum. Aut aut nobis ea neque ut officia ex.', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(16, 'Dr. Chaz Rodriguez', 'swunsch@hermann.com', 'Prof.', 'Dolor omnis sit laboriosam voluptatibus quia qui consequatur voluptatum. Aut corrupti qui et aut necessitatibus asperiores. Vel quo voluptas atque dolores. Officia nihil voluptatem dolor numquam magni impedit necessitatibus.', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(17, 'Dr. Don Smith I', 'raegan.eichmann@rath.com', 'Miss', 'Sit blanditiis eligendi maiores ut laudantium. Repellat quos cumque et illum. Aliquam et veritatis optio. Rerum dolores reprehenderit impedit quia.', '2020-05-17 14:51:08', '2020-05-17 14:51:08'),
(18, 'Pinkie McClure', 'hudson66@bartoletti.net', 'Dr.', 'Asperiores natus enim voluptas ipsam. Eos neque vero repellendus aut ut. Nulla soluta non nostrum.', '2020-05-17 14:51:08', '2020-05-17 14:51:08'),
(19, 'Rose Lebsack', 'sidney.bernhard@prohaska.biz', 'Mr.', 'Sunt dolores quaerat similique fuga quis suscipit laboriosam fuga. Minima et earum magni occaecati. Blanditiis quasi aliquid dicta nobis.', '2020-05-17 14:51:08', '2020-05-17 14:51:09'),
(20, 'Melyssa Pagac', 'watsica.guillermo@kassulke.com', 'Ms.', 'Similique id aut ipsa nostrum ea consequatur. Debitis id rerum quam similique. Et ad consequatur necessitatibus.', '2020-05-17 14:51:08', '2020-05-17 14:51:09'),
(21, 'Chanel Bashirian', 'clifton.brown@mcdermott.biz', 'Dr.', 'Ipsa assumenda earum perferendis. Ratione minima quas dignissimos explicabo.', '2020-05-17 14:51:08', '2020-05-17 14:51:09'),
(23, 'Stefan Perovic', 'stefan@gmail.com', 'aaaa', 'aaaaaaaaaa', '2020-07-17 12:20:13', '2020-07-17 12:20:13'),
(24, 'Adela Willms', 'katharina.beatty@hand.com', 'Miss', 'Ea molestiae in vitae provident aut debitis delectus. Optio autem magnam quibusdam sequi aut atque dolorem. Est ut esse molestiae nemo dolorem nam omnis. Et sequi tempore quo neque facilis ratione facilis.', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(25, 'Ericka Sauer', 'robbie48@bernier.net', 'Miss', 'Est asperiores delectus aut illum et. Aperiam incidunt corrupti dolorem et quia et. Nobis rerum laborum eos magni iste dolore adipisci. Praesentium maiores ullam delectus.', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(26, 'Reyna Dickens', 'skozey@schamberger.com', 'Prof.', 'Fugiat maxime aperiam occaecati architecto accusamus quod. Omnis fugiat qui nisi autem ipsa qui. Nam aut molestiae autem ab aut voluptatem omnis non. Velit amet doloribus in eaque voluptatem dignissimos aut.', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(27, 'Dr. Lavinia Ullrich I', 'eankunding@yahoo.com', 'Ms.', 'Rerum ut in rerum architecto. Adipisci voluptatem aspernatur id dignissimos aut et occaecati. Blanditiis magni vitae maxime similique qui sunt. Et odit quia dolor aut omnis recusandae veniam.', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(28, 'Frederick Gutmann', 'isabell01@hotmail.com', 'Mrs.', 'Adipisci eum dolore et vel. Voluptas distinctio ipsum et debitis incidunt. Aperiam consequatur repellat et quidem. Omnis quos et mollitia odio. Laboriosam sunt debitis illum accusantium ut fugit ad.', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(29, 'Miss Cassandre Stehr', 'yyundt@adams.com', 'Ms.', 'Deserunt aspernatur deleniti et amet tenetur culpa. Ea quod dolor pariatur vel voluptatem. Quia temporibus omnis sit earum culpa quia assumenda. Voluptas beatae fugit quo mollitia et.', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(30, 'Mr. Shawn Pollich DDS', 'emilia.krajcik@casper.com', 'Dr.', 'Nihil tempora praesentium fuga vel est. Eveniet ea repudiandae deleniti quis sit neque provident. Itaque aut culpa error mollitia pariatur. Alias placeat quia molestiae porro eligendi.', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(31, 'Miss Princess Douglas PhD', 'roselyn.gleichner@wiegand.com', 'Dr.', 'Quidem rem perspiciatis aut et doloremque molestiae. Ullam ad doloremque quia ut quasi sunt et. Nulla cumque voluptatem et veritatis. Corrupti modi et dolor autem. Hic labore a architecto iusto repudiandae.', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(32, 'Carli Watsica', 'nikolaus.ruthe@gmail.com', 'Prof.', 'Rerum consequatur ut qui aut veniam nisi. Sunt expedita commodi sed reprehenderit. In suscipit adipisci eum nostrum et impedit harum.', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(33, 'Hiram Beier IV', 'cloyd77@bailey.net', 'Ms.', 'Atque non deleniti earum asperiores similique qui. Blanditiis unde voluptates architecto cum. Quo debitis vel et officiis. Odit dolorem debitis veniam.', '2020-10-02 19:00:33', '2020-10-02 19:00:33'),
(34, 'Edmund Crona', 'sylvia.legros@zulauf.biz', 'Mr.', 'Quis tenetur corporis sed. Qui voluptatem iste architecto sequi incidunt. Quia illo corrupti quaerat. Soluta cum provident accusamus sit a velit natus.', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(35, 'Maxwell Howe', 'qdurgan@doyle.biz', 'Prof.', 'Voluptates vero esse vel eum repellendus et odio. Rerum optio omnis quia rerum ut autem expedita. Recusandae iure rerum architecto nihil porro.', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(36, 'Efrain Kozey PhD', 'ibednar@kirlin.com', 'Prof.', 'Est similique autem aperiam ipsa optio itaque. Beatae dolore deserunt architecto earum vero quas eos. Libero reprehenderit minima quia quisquam vero.', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(37, 'Andreanne Gislason', 'wreynolds@okuneva.info', 'Miss', 'Iusto delectus perspiciatis quis quo omnis. Voluptate ea dolor nulla ipsa quis. Molestiae provident id reprehenderit dolore et. Ad id autem rem optio ut deserunt numquam consequatur. Libero nisi ipsum rerum id.', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(38, 'Cory Hartmann II', 'terry01@yahoo.com', 'Miss', 'Cum aliquid quia dolorem culpa similique quod. Maiores mollitia provident in amet aut architecto quibusdam sapiente. Officia eveniet tenetur aut.', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(39, 'Micah Ondricka', 'waters.brando@hotmail.com', 'Dr.', 'Perferendis et harum provident blanditiis enim a. Nobis modi laborum non repudiandae eum molestiae. At non et perferendis id.', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(40, 'Dr. Adalberto Macejkovic', 'harris.laverna@hotmail.com', 'Dr.', 'Molestias sed molestiae aliquam omnis quaerat voluptatum quisquam. Architecto fuga commodi aut reprehenderit. Ipsam explicabo rerum nihil assumenda et rem exercitationem.', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(41, 'Palma Graham DDS', 'lindsey.rau@yahoo.com', 'Prof.', 'Voluptatem molestiae tempora illum est. Omnis et alias earum ratione minus. Quidem fuga quas consequatur maxime aut. Cupiditate voluptatibus officia iste facere sed quasi.', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(42, 'Ms. Freda Hickle II', 'fhermann@nitzsche.com', 'Ms.', 'Repudiandae facilis porro non quaerat similique corrupti. Voluptatum placeat saepe explicabo eos et accusamus. Dolorum velit qui odio nihil. Velit natus cumque voluptates ab repudiandae eligendi sapiente ut.', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(43, 'Summer Predovic III', 'keara.yundt@gmail.com', 'Mrs.', 'Ea aut placeat inventore ex. Et ut ut magnam consequatur eaque aut. Laudantium fugit omnis est harum facilis tempore rerum. Repellat in sit quibusdam aliquam totam illo fuga.', '2020-10-02 19:02:39', '2020-10-02 19:02:39'),
(44, 'Laurine Abshire V', 'lea.strosin@predovic.com', 'Ms.', 'Excepturi velit accusantium sunt animi occaecati consequatur. Recusandae vel numquam iure et tempora illo reiciendis. Quia enim vero qui omnis tempora doloremque placeat. Sequi impedit magni minima.', '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(45, 'Maye Pfannerstill', 'blanda.meda@gmail.com', 'Prof.', 'Earum ut sed error quia in deserunt reiciendis minus. Eligendi vel praesentium totam officiis consequatur quia consequatur. Et dolorum dolores vel ex temporibus praesentium incidunt.', '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(46, 'Kamren Frami DDS', 'ydouglas@ferry.com', 'Prof.', 'Voluptate qui eius recusandae reprehenderit voluptas. Iure minima dolor accusantium voluptas debitis quo fuga pariatur. Et voluptatum nesciunt rerum animi est aut non. Dolores illo quaerat aut dolore voluptas dolores voluptatibus.', '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(47, 'Keanu Sipes', 'damore.cicero@rempel.com', 'Prof.', 'Exercitationem autem aliquam accusantium illo et rerum reiciendis illum. Quis sint sint et occaecati. Modi porro recusandae quaerat ratione corporis quo.', '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(48, 'Bianka Kertzmann', 'mharris@hotmail.com', 'Ms.', 'Et iure vitae iusto quod sint suscipit iusto ipsam. Delectus ab aperiam ipsam vel mollitia aut. Animi provident qui ut mollitia voluptatum. Eos aliquid omnis quo dolores.', '2020-10-02 19:02:41', '2020-10-02 19:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `link`, `created_at`, `updated_at`) VALUES
(1, 'slider.jpg', '2020-04-23 12:47:12', NULL),
(2, 'slider2.jpg', '2020-04-25 02:09:12', NULL),
(3, 'badboysforlife.jpg', '2020-04-23 12:47:12', NULL),
(4, 'blackwidow.jpg', '2020-04-25 02:09:12', NULL),
(5, 'lighthouse.jpg', '2020-04-25 06:13:11', NULL),
(6, 'thenewmutants.jpg', '2020-04-24 22:16:12', NULL),
(7, 'waspnetwork.jpg', '2020-04-25 04:06:04', NULL),
(8, 'topgun.jpg', '2020-04-25 19:23:32', NULL),
(9, 'assets/images/movies/badboysforlife.jpg', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(10, 'assets/images/movies/blackwidow.jpg', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(11, 'assets/images/movies/lighthouse.jpg', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(12, 'assets/images/movies/thenewmutants.jpg', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(13, 'assets/images/movies/topgun.jpg', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(14, 'assets/images/movies/waspnetwork.jpg', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(22, 'lighthouse_1601672433.jpg', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(23, 'thenewmutants_1601672433.jpg', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(24, 'topgun_1601672433.jpg', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(25, 'waspnetwork_1601672433.jpg', '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(26, 'slider_1601672560.jpg', '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(27, 'slider2_1601672560.jpg', '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(28, 'badboysforlife_1601672560.jpg', '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(29, 'blackwidow_1601672560.jpg', '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(30, 'lighthouse_1601672560.jpg', '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(31, 'thenewmutants_1601672560.jpg', '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(32, 'topgun_1601672560.jpg', '2020-10-02 19:02:40', '2020-10-02 19:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/home', NULL, '2020-04-23 12:47:12', NULL),
(2, 'Movies', '/movies', NULL, '2020-04-25 02:09:12', NULL),
(3, 'Contact', '/contact', NULL, '2020-04-25 06:13:11', NULL),
(4, 'Admin', '/admin', NULL, '2020-04-24 22:16:12', NULL);

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
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2020_04_16_090055_create_images_table', 1),
(7, '2020_04_16_090120_create_roles_table', 1),
(8, '2020_04_16_090185_create_users_table', 1),
(9, '2020_04_16_104835_create_years_table', 1),
(10, '2020_04_16_104937_create_movies_table', 1),
(11, '2020_04_16_115552_create_categories_table', 1),
(12, '2020_04_16_121227_create_movies_categories_table', 1),
(13, '2020_04_16_124547_create_actors_table', 1),
(14, '2020_04_16_125045_create_movies_actors_table', 1),
(15, '2020_04_21_070814_create_subscribe_table', 1),
(16, '2020_04_21_173234_create_contact_table', 1),
(17, '2020_04_21_180920_create_pricelist_table', 1),
(18, '2020_04_22_120001_create_reservation_table', 1),
(19, '2020_04_22_120854_create_seat_table', 1),
(20, '2020_04_22_123307_create_seatchecker_table', 1),
(21, '2020_04_25_100649_create_slides_table', 1),
(22, '2020_04_25_100742_create_menu_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` datetime NOT NULL,
  `running_time` int(11) NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `img_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `release_date`, `running_time`, `year_id`, `img_id`, `created_at`, `updated_at`) VALUES
(2, 'Bad boys for life', 'Bad boys Mike Laurie (Will Smith) and Marcus Barnett (Martin Lawrence) are together again in another crazy ride, in the long-awaited below, \"Bad guys forever\". This time our bad boys are a little older, but they are equally crazy and wicked. Although Marcus announced the recent retirement of his longtime partner Mike (he thinks it was time), Mike persuaded him to go on another crazy mission.', '2020-10-29 11:30:00', 135, 2, 3, '2020-04-23 12:47:12', NULL),
(3, 'Top gun', 'The elusive Captain Maverick takes us to the heights again, and in the ride he will leave us breathless and boost the adrenaline! In one of the most anticipated sequels ever, Tom Cruise is joined by Val Kilmer and Ed Harris, who reprized the roles from the first part, and are now with them', '2020-11-03 15:00:00', 123, 1, 8, '2020-04-25 02:09:12', NULL),
(4, 'Black widow', 'Scarlett Johansson reprises the role of Natasha / Black Widow in the Marvel action spectacle, the spy thriller \"BLACK WIDOW\" - the first film of the fourth stage of the Marvel movie universe. Florence Pew plays Jelena in the film, David Harbor is Alexei, better known as the Red Guard, and Rachel Weiss is Melina. The director of the film is Kate Shortland and the producer is Kevin Feigy.', '2020-11-06 15:00:00', 109, 2, 4, '2020-04-25 06:13:11', NULL),
(5, 'Lighthouse', 'Two lighthouse keepers try to maintain common sense by living on a remote and mysterious island of New England before the end of the 19th century.', '2020-10-05 15:00:00', 125, 1, 5, '2020-04-25 02:09:12', NULL),
(6, 'The new mutants', '20th Century Studio in collaboration with Marvel Entertainment presents the film New Mutants, an original horror thriller set in an isolated hospital, where a group of young mutants are under psychiatric surveillance. When strange things start happening, both their mutant abilities and their friendship will be put to the test as they fight for their lives.', '2020-10-08 18:30:00', 105, 3, 6, '2020-04-25 06:13:11', NULL),
(7, 'Wasp network', 'In the late 1980s and early 1990s, Cuban groups from Florida, made up of opponents of Fidel Castro\'s regime, carried out fierce attacks in Cuba, dropping bombs on hotels and killing innocent people on the beach. In retaliation, the Cuban government inserts an elite group of spies into these terrorist groups in order to break them from within. Five of them eventually fall into the hands of the American authorities and face life imprisonment on charges of murder and espionage', '2020-10-15 16:00:00', 120, 2, 7, '2020-04-25 06:13:11', NULL),
(21, 'maiores', 'Est doloribus dolores enim aut. Quo in non qui velit ex. Quia quidem ipsa consectetur unde. Blanditiis modi voluptatibus occaecati.', '2020-05-03 09:29:51', 159, 2, 4, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(22, 'molestiae', 'Amet optio rerum tenetur dolores quaerat. Quia ipsam qui ut excepturi. Eos ad incidunt amet placeat tempora non sit.', '2019-10-19 06:32:14', 144, 14, 4, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(23, 'odio', 'Illo minima eius aut enim eos exercitationem. Consequuntur quis dolor sapiente quaerat. Libero magnam non non facere. Voluptas odio qui est aut.', '2019-10-26 10:15:55', 132, 4, 14, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(24, 'aut', 'Aliquam dolorum sit sed in occaecati aperiam nobis labore. Laboriosam qui odit fugit eum. Officiis voluptatem ratione adipisci aliquam quos debitis odio impedit.', '2019-12-30 11:16:02', 137, 2, 23, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(25, 'illum', 'Consequatur est aut id. Qui inventore illum aut provident occaecati. Animi omnis explicabo eligendi vel. Atque sint voluptas sit rerum rerum id temporibus.', '2020-07-29 06:56:59', 112, 12, 10, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(26, 'officiis', 'At quod hic qui architecto. Perspiciatis officiis enim quisquam et.', '2020-01-22 01:57:50', 104, 15, 13, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(27, 'laboriosam', 'Velit et fugiat autem. Iste sint debitis corrupti. Illo eum saepe aut corporis dolorem.', '2020-01-28 19:02:43', 145, 12, 22, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(28, 'est', 'Assumenda illo eligendi necessitatibus quo est corporis. Quisquam quas impedit placeat voluptatum.', '2019-10-27 22:25:36', 142, 2, 13, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(29, 'inventore', 'Voluptatem reiciendis rerum doloremque quaerat qui. Reprehenderit itaque iusto reiciendis occaecati sit. Sint reiciendis similique architecto dolorem harum aperiam expedita.', '2020-05-26 05:41:00', 142, 10, 23, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(30, 'ipsa', 'Nostrum et in incidunt voluptas in reiciendis. Enim qui sapiente ratione numquam adipisci magni. Debitis in neque culpa.', '2020-06-22 11:00:43', 151, 19, 7, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(31, 'neque', 'Tenetur atque eum nihil possimus voluptatem fugit eligendi. Laborum eum at fugit. Modi consequatur temporibus id ducimus possimus est.', '2020-05-25 02:54:30', 113, 10, 13, '2020-10-02 19:02:40', '2020-10-02 19:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `movies_actors`
--

CREATE TABLE `movies_actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `actor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies_actors`
--

INSERT INTO `movies_actors` (`id`, `movie_id`, `actor_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-04-23 12:47:12', NULL),
(2, 2, 2, '2020-04-25 02:09:12', NULL),
(3, 3, 3, '2020-04-25 06:13:11', NULL),
(4, 3, 4, '2020-04-24 22:16:12', NULL),
(5, 4, 5, '2020-04-25 04:06:04', NULL),
(6, 4, 6, '2020-05-13 22:41:25', NULL),
(7, 5, 7, '2020-05-13 22:41:25', NULL),
(8, 5, 8, '2020-04-25 11:00:00', NULL),
(9, 6, 9, '2020-04-25 11:00:00', NULL),
(10, 6, 10, '2020-04-25 11:00:00', NULL),
(11, 7, 11, '2020-04-25 11:00:00', NULL),
(12, 7, 12, '2020-04-25 11:00:00', NULL),
(13, 3, 42, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(14, 3, 10, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(18, 24, 57, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(19, 2, 53, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(24, 5, 45, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(25, 5, 72, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(27, 7, 63, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(30, 3, 10, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(32, 23, 3, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(34, 4, 8, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(35, 22, 1, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(36, 22, 41, '2020-10-02 19:00:35', '2020-10-02 19:00:36'),
(37, 22, 60, '2020-10-02 19:02:42', '2020-10-02 19:02:42'),
(39, 29, 64, '2020-10-02 19:02:42', '2020-10-02 19:02:42'),
(40, 3, 45, '2020-10-02 19:02:42', '2020-10-02 19:02:42'),
(42, 3, 79, '2020-10-02 19:02:42', '2020-10-02 19:02:42'),
(43, 28, 12, '2020-10-02 19:02:42', '2020-10-02 19:02:42'),
(44, 2, 72, '2020-10-02 19:02:42', '2020-10-02 19:02:42'),
(46, 28, 7, '2020-10-02 19:02:42', '2020-10-02 19:02:42'),
(47, 23, 42, '2020-10-02 19:02:42', '2020-10-02 19:02:43'),
(48, 23, 42, '2020-10-02 19:02:42', '2020-10-02 19:02:43'),
(51, 2, 7, '2020-10-02 19:02:42', '2020-10-02 19:02:43'),
(52, 30, 5, '2020-10-02 19:02:42', '2020-10-02 19:02:43'),
(55, 29, 76, '2020-10-02 19:02:42', '2020-10-02 19:02:43'),
(56, 26, 56, '2020-10-02 19:02:42', '2020-10-02 19:02:43'),
(57, 29, 5, '2020-10-02 19:02:42', '2020-10-02 19:02:43'),
(58, 27, 50, '2020-10-02 19:02:42', '2020-10-02 19:02:43'),
(59, 3, 8, '2020-10-02 19:02:42', '2020-10-02 19:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `movies_categories`
--

CREATE TABLE `movies_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies_categories`
--

INSERT INTO `movies_categories` (`id`, `movie_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2020-04-25 19:23:32', NULL),
(2, 2, 4, '2020-04-25 02:09:12', NULL),
(3, 3, 3, '2020-04-25 06:13:11', NULL),
(4, 3, 5, '2020-04-24 22:16:12', NULL),
(5, 4, 3, '2020-04-25 04:06:04', NULL),
(6, 4, 6, '2020-05-13 22:41:25', NULL),
(7, 4, 7, '2020-05-13 22:41:25', NULL),
(8, 5, 5, '2020-04-25 11:00:00', NULL),
(9, 5, 8, '2020-04-25 11:00:00', NULL),
(10, 6, 3, '2020-04-25 11:00:00', NULL),
(11, 6, 6, '2020-04-25 11:00:00', NULL),
(12, 7, 9, '2020-04-25 11:00:00', NULL),
(13, 2, 10, '2020-04-23 12:47:12', NULL),
(14, 2, 12, '2020-04-25 02:09:12', NULL),
(23, 3, 10, '2020-04-25 03:07:03', NULL),
(24, 4, 10, '2020-04-25 03:07:03', NULL),
(25, 4, 11, '2020-04-25 02:09:12', NULL),
(26, 4, 13, '2020-04-25 05:11:06', NULL),
(27, 5, 10, '2020-04-25 03:07:03', NULL),
(28, 6, 10, '2020-04-25 03:07:03', NULL),
(29, 6, 12, '2020-04-25 05:00:55', NULL),
(30, 7, 10, '2020-04-25 03:07:03', NULL),
(31, 23, 14, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(32, 22, 26, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(33, 23, 18, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(34, 21, 3, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(35, 21, 15, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(36, 7, 3, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(37, 6, 8, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(39, 22, 19, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(40, 3, 26, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(41, 3, 13, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(42, 23, 2, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(43, 24, 20, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(44, 3, 16, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(45, 4, 1, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(46, 23, 19, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(47, 6, 14, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(48, 23, 22, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(49, 4, 19, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(50, 7, 2, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(51, 7, 2, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(52, 24, 25, '2020-10-02 19:00:35', '2020-10-02 19:00:35'),
(53, 27, 5, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(54, 28, 38, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(55, 21, 30, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(56, 4, 29, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(57, 27, 2, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(58, 29, 23, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(59, 21, 21, '2020-10-02 19:02:41', '2020-10-02 19:02:41'),
(62, 28, 2, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(63, 22, 35, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(64, 31, 23, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(65, 31, 2, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(66, 29, 36, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(67, 30, 26, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(68, 26, 8, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(69, 30, 25, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(71, 25, 3, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(72, 30, 18, '2020-10-02 19:02:41', '2020-10-02 19:02:42'),
(74, 4, 13, '2020-10-02 19:02:41', '2020-10-02 19:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`id`, `movie_id`, `cat_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 10, '4.50', '2020-04-23 12:47:12', NULL),
(2, 2, 12, '13.00', '2020-04-25 02:09:12', NULL),
(3, 3, 10, '4.20', '2020-04-25 06:13:11', NULL),
(4, 4, 10, '4.50', '2020-04-24 22:16:12', NULL),
(5, 4, 11, '8.50', '2020-04-23 12:47:12', NULL),
(6, 4, 13, '18.00', '2020-04-25 02:09:12', NULL),
(7, 5, 10, '3.30', '2020-04-25 05:11:06', NULL),
(8, 6, 10, '4.00', '2020-04-24 22:16:12', NULL),
(9, 6, 12, '12.50', '2020-04-25 04:06:04', NULL),
(10, 7, 10, '3.50', '2020-05-13 22:41:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `qtypersons` int(10) UNSIGNED NOT NULL,
  `totalprice` decimal(8,2) UNSIGNED NOT NULL,
  `datefrom` datetime NOT NULL,
  `dateto` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `movie_id`, `qtypersons`, `totalprice`, `datefrom`, `dateto`, `created_at`, `updated_at`) VALUES
(5, 1, 4, 2, '9.00', '2020-08-16 17:15:49', '2020-11-06 15:00:00', '2020-08-16 15:15:49', '2020-08-16 15:15:49'),
(6, 2, 3, 1, '4.20', '2020-09-25 14:21:10', '2020-11-03 15:00:00', '2020-09-25 12:21:11', '2020-09-25 12:21:11'),
(7, 2, 3, 1, '4.20', '2020-09-25 14:32:08', '2020-11-03 15:00:00', '2020-09-25 12:32:08', '2020-09-25 12:32:08'),
(11, 1, 2, 2, '20.25', '2020-10-12 16:40:00', '2020-12-28 18:00:00', '2020-10-04 12:38:16', '2020-10-04 12:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-04-23 12:47:12', NULL),
(2, 'User', '2020-04-25 02:09:12', NULL),
(17, 'TestingUser', '2020-10-02 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `re_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `number`, `re_id`, `created_at`, `updated_at`) VALUES
(7, 5, 5, '2020-08-16 15:15:49', NULL),
(10, 13, 7, '2020-09-25 12:32:08', NULL),
(11, 14, 7, '2020-09-25 12:32:08', NULL),
(17, 40, 11, '2020-10-04 12:38:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seatchecker`
--

CREATE TABLE `seatchecker` (
  `id` int(10) UNSIGNED NOT NULL,
  `seat` int(10) UNSIGNED NOT NULL,
  `free` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seatchecker`
--

INSERT INTO `seatchecker` (`id`, `seat`, `free`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2020-06-08 19:27:53', '2020-07-31 21:03:00'),
(2, 2, 0, '2020-06-08 19:53:56', '2020-07-31 21:03:00'),
(3, 3, 0, '2020-06-08 19:54:04', '2020-07-31 20:12:32'),
(5, 4, 0, '2020-06-08 19:54:30', '2020-07-31 20:12:32'),
(6, 5, 1, '2020-06-08 19:56:25', '2020-07-31 20:12:32'),
(7, 6, 1, '2020-06-08 19:56:31', '2020-07-31 20:12:32'),
(8, 7, 1, '2020-06-08 19:56:35', '2020-07-31 20:12:32'),
(9, 8, 1, '2020-06-08 19:56:38', '2020-07-31 20:12:32'),
(10, 9, 0, '2020-06-08 19:56:41', '2020-09-25 13:02:50'),
(11, 10, 0, '2020-06-08 19:56:44', '2020-09-25 13:02:50'),
(12, 11, 1, '2020-06-08 19:56:51', '2020-07-31 20:12:32'),
(13, 12, 1, '2020-06-08 19:56:55', '2020-07-31 20:12:32'),
(14, 13, 0, '2020-06-08 19:56:58', '2020-09-25 12:57:38'),
(15, 14, 0, '2020-06-08 19:57:02', '2020-09-25 12:57:38'),
(17, 194250, 1, '2020-10-02 19:00:36', '2020-10-02 19:00:36'),
(18, 830772, 0, '2020-10-02 19:00:36', '2020-10-02 19:00:36'),
(19, 1763, 0, '2020-10-02 19:00:36', '2020-10-02 19:00:36'),
(20, 63, 1, '2020-10-02 19:00:36', '2020-10-02 19:00:36'),
(22, 596967, 0, '2020-10-02 19:02:43', '2020-10-02 19:02:43'),
(23, 18707, 1, '2020-10-02 19:02:43', '2020-10-02 19:02:43'),
(24, 85434076, 1, '2020-10-02 19:02:43', '2020-10-02 19:02:43'),
(25, 306, 0, '2020-10-02 19:02:43', '2020-10-02 19:02:43'),
(26, 677, 1, '2020-10-02 19:02:43', '2020-10-02 19:02:43'),
(27, 633367, 0, '2020-10-02 19:02:43', '2020-10-02 19:02:43'),
(28, 73243, 1, '2020-10-02 19:02:43', '2020-10-02 19:02:43'),
(29, 9864, 0, '2020-10-02 19:02:43', '2020-10-02 19:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_id` int(10) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `img_id`, `header`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 'Watch the new movies', '', '2020-04-23 12:47:12', NULL),
(2, 2, '', '', '2020-04-25 02:09:12', NULL),
(3, 2, 'Mr.', 'Quas placeat est amet minus nostrum dolorem. Laudantium quidem laudantium fugiat a. Porro asperiores saepe qui eos est. Facilis enim et reiciendis et quidem recusandae dicta.', '2020-10-02 19:00:36', '2020-10-02 19:00:36'),
(4, 1, 'Miss', 'Aperiam aut deserunt ab deleniti. Quo est eos eligendi.', '2020-10-02 19:00:36', '2020-10-02 19:00:36'),
(5, 1, 'Ms.', 'Quae voluptatem sunt veritatis eum non dolores. Asperiores inventore cupiditate fugit odio sit enim. Voluptatem veniam qui perspiciatis unde sint praesentium.', '2020-10-02 19:02:43', '2020-10-02 19:02:43'),
(6, 2, 'Dr.', 'Pariatur sapiente nam et quos. Possimus nesciunt aut cum est et maiores. Et autem est quia est aut. Est accusamus et reiciendis aut dolorum neque. Ut magni maxime nam animi rerum.', '2020-10-02 19:02:43', '2020-10-02 19:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `email_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role_id`, `email_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jovan Popovic', 'jovan', 'jovan@gmail.com', '2020-04-23 12:47:12', '$2y$10$KML3gRsE6o3W2KlUHojQO.LRBvoyuzp3vqUAbbj35WWuU0iCIEaLa', 1, NULL, NULL, '2020-04-23 12:47:12', NULL),
(2, 'Aleksandar Genic', 'geni', 'geni@gmail.com', '2020-04-23 12:47:12', '$2y$10$Ou8TL7LlyOOJduAj/nNrK.N4rDA4/08t8g4Q4aPMsf.Sf8LDBBT4S', 2, NULL, NULL, '2020-04-25 03:07:03', NULL),
(18, 'Moralna Pobeda', 'moralna', 'moralnapobeda71@gmail.com', NULL, '$2y$10$DJoH9z7yy8B2SPYwvsF.Je59omUyDrVFEkPaXvk8MjTTunyi0RTOC', 2, '08729526ec4d40968494bc26d4894fef', NULL, '2020-05-15 19:56:45', '2020-05-15 19:56:45'),
(24, 'Moralna Pobedabaa', 'moralnabacaa', 'moralnapobedabacaa71@gmail.com', '2020-05-15 22:16:45', '$2y$10$oPL5lPqFVDum3WRr2hnele9KM.37BiaKTxIvzTVjfkuN0C3jGCVAG', 2, '453367593cc51d95e1d3acb6343f028a', NULL, '2020-05-15 22:16:28', '2020-05-15 22:16:45'),
(25, 'Jamar Schuppe', 'precious.beahan', 'vicente.tillman@example.org', '2020-05-17 14:30:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, 'b96a87f416bc9cfc56ffea11bebc89b4', '6F0m7ppCmH', '2020-05-17 14:30:37', '2020-05-17 14:30:37'),
(26, 'Ronaldo Kertzmann', 'lilian74', 'twaters@example.com', '2020-05-17 14:30:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '5c09abe1aa05639b02af16fc02422d2d', 'Q9MuCPPZfE', '2020-05-17 14:30:37', '2020-05-17 14:30:37'),
(27, 'Oda Halvorson IV', 'jedediah65', 'maggio.corbin@example.org', '2020-05-17 14:30:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, 'f521e62ef54f84f2c19841252dc43e5b', 'gBTnzKrqjf', '2020-05-17 14:30:37', '2020-05-17 14:30:37'),
(50, 'Carmela Conroy', 'julien41', 'maud.keebler@example.com', '2020-10-02 18:56:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '4c46b3b652d92cff266ff1b3627e7a58', 'NOPVgaLtSg', '2020-10-02 18:56:04', '2020-10-02 18:56:04'),
(58, 'Giles Dach I', 'mitchell.pierre', 'callie75@example.org', '2020-10-02 19:00:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'ade61ec159de41012491afe2de790bb9', 'FMbWBqvpMn', '2020-10-02 19:00:33', '2020-10-02 19:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, 2020, '2020-04-23 12:47:12', NULL),
(2, 2019, '2020-04-25 02:09:12', NULL),
(3, 2018, '2020-04-25 06:13:11', NULL),
(4, 2017, '2020-04-24 22:16:12', NULL),
(5, 2016, '2020-04-25 04:06:04', NULL),
(6, 2020, '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(7, 2019, '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(8, 2018, '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(9, 2017, '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(10, 2016, '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(11, 2020, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(12, 2019, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(13, 2018, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(14, 2017, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(15, 2016, '2020-10-02 19:00:34', '2020-10-02 19:00:34'),
(16, 2020, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(17, 2019, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(18, 2018, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(19, 2017, '2020-10-02 19:02:40', '2020-10-02 19:02:40'),
(20, 2016, '2020-10-02 19:02:40', '2020-10-02 19:02:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_email_unique` (`email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `images_link_unique` (`link`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_year_id_foreign` (`year_id`),
  ADD KEY `movies_img_id_foreign` (`img_id`);

--
-- Indexes for table `movies_actors`
--
ALTER TABLE `movies_actors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_actors_movie_id_foreign` (`movie_id`),
  ADD KEY `movies_actors_actor_id_foreign` (`actor_id`);

--
-- Indexes for table `movies_categories`
--
ALTER TABLE `movies_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_categories_movie_id_foreign` (`movie_id`),
  ADD KEY `movies_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pricelist_cat_id_foreign` (`cat_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_user_id_foreign` (`user_id`),
  ADD KEY `reservation_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seat_number_unique` (`number`),
  ADD KEY `re_id` (`re_id`);

--
-- Indexes for table `seatchecker`
--
ALTER TABLE `seatchecker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seatchecker_seat_unique` (`seat`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slides_img_id_foreign` (`img_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribe_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `movies_actors`
--
ALTER TABLE `movies_actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `movies_categories`
--
ALTER TABLE `movies_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `seatchecker`
--
ALTER TABLE `seatchecker`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_img_id_foreign` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `movies_actors`
--
ALTER TABLE `movies_actors`
  ADD CONSTRAINT `movies_actors_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_actors_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movies_categories`
--
ALTER TABLE `movies_categories`
  ADD CONSTRAINT `movies_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_categories_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD CONSTRAINT `pricelist_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pricelist_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`re_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_img_id_foreign` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
