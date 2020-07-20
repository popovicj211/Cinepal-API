-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 06:53 PM
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
(13, 'Mrs. Myrna Crooks', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(14, 'Dameon Gulgowski', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(15, 'Lewis Becker', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(16, 'Mr. August Feeney', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(17, 'Dr. Miles Veum', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(18, 'Brooke Kulas', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(19, 'Milford Abshire', '2020-05-17 14:38:41', '2020-05-17 14:38:42'),
(20, 'Rene Kassulke', '2020-05-17 14:38:41', '2020-05-17 14:38:42'),
(21, 'Wava Langosh Jr.', '2020-05-17 14:38:41', '2020-05-17 14:38:42'),
(22, 'Eduardo Gleason', '2020-05-17 14:38:41', '2020-05-17 14:38:42'),
(23, 'Theodore Lebsack', '2020-05-17 14:38:41', '2020-05-17 14:38:42'),
(24, 'Mrs. Isabell Shanahan PhD', '2020-05-17 14:38:41', '2020-05-17 14:38:42'),
(25, 'Russel Streich', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(26, 'Prof. Jeramy Johnston MD', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(27, 'Thelma Kuvalis', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(28, 'Jo Friesen', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(29, 'Landen Corkery', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(30, 'Berenice Hoeger', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(31, 'Kelvin Stracke', '2020-05-17 14:47:13', '2020-05-17 14:47:14'),
(32, 'Jacklyn Hauck II', '2020-05-17 14:47:13', '2020-05-17 14:47:14'),
(33, 'Clemens O\'Kon', '2020-05-17 14:47:13', '2020-05-17 14:47:14'),
(34, 'Kacey Von III', '2020-05-17 14:47:13', '2020-05-17 14:47:14'),
(35, 'Mariana Dare', '2020-05-17 14:47:13', '2020-05-17 14:47:14'),
(36, 'Alfonzo Nitzsche', '2020-05-17 14:47:13', '2020-05-17 14:47:14'),
(37, 'Roger Steuber I', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(38, 'Raina Hayes', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(39, 'Floy Effertz V', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(40, 'Prof. Burnice Davis', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(41, 'Shany Koelpin Sr.', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(42, 'Shaun Greenholt', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(43, 'Angelica Powlowski', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(44, 'Bobbie Considine', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(45, 'Aiyana Will', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(46, 'Ms. Autumn Shanahan', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(47, 'Mr. Gayle Hudson', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(48, 'Keenan Stracke Jr.', '2020-05-17 14:51:09', '2020-05-17 14:51:09');

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
(13, 'MX4D 3D', 2, '2020-04-24 22:16:12', NULL);

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
(23, 'Stefan Perovic', 'stefan@gmail.com', 'aaaa', 'aaaaaaaaaa', '2020-07-17 12:20:13', '2020-07-17 12:20:13');

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
(14, 'assets/images/movies/waspnetwork.jpg', '2020-05-17 14:38:42', '2020-05-17 14:38:42');

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
(2, 'Bad boys for life', 'Bad boys Mike Laurie (Will Smith) and Marcus Barnett (Martin Lawrence) are together again in another crazy ride, in the long-awaited below, \"Bad guys forever\". This time our bad boys are a little older, but they are equally crazy and wicked. Although Marcus announced the recent retirement of his longtime partner Mike (he thinks it was time), Mike persuaded him to go on another crazy mission.', '2020-06-10 11:30:00', 135, 2, 3, '2020-04-23 12:47:12', NULL),
(3, 'Top gun', 'The elusive Captain Maverick takes us to the heights again, and in the ride he will leave us breathless and boost the adrenaline! In one of the most anticipated sequels ever, Tom Cruise is joined by Val Kilmer and Ed Harris, who reprized the roles from the first part, and are now with them', '2020-06-18 15:00:00', 123, 1, 8, '2020-04-24 16:38:40', NULL),
(4, 'Black widow', 'Scarlett Johansson reprises the role of Natasha / Black Widow in the Marvel action spectacle, the spy thriller \"BLACK WIDOW\" - the first film of the fourth stage of the Marvel movie universe. Florence Pew plays Jelena in the film, David Harbor is Alexei, better known as the Red Guard, and Rachel Weiss is Melina. The director of the film is Kate Shortland and the producer is Kevin Feigy.', '2020-06-19 15:00:00', 109, 2, 4, '2020-04-23 12:47:12', NULL),
(5, 'Lighthouse', 'Two lighthouse keepers try to maintain common sense by living on a remote and mysterious island of New England before the end of the 19th century.', '2020-10-05 15:00:00', 125, 1, 5, '2020-04-25 02:09:12', NULL),
(6, 'The new mutants', '20th Century Studio in collaboration with Marvel Entertainment presents the film New Mutants, an original horror thriller set in an isolated hospital, where a group of young mutants are under psychiatric surveillance. When strange things start happening, both their mutant abilities and their friendship will be put to the test as they fight for their lives.', '2020-10-08 18:30:00', 105, 3, 6, '2020-04-25 06:13:11', NULL),
(7, 'Wasp network', 'In the late 1980s and early 1990s, Cuban groups from Florida, made up of opponents of Fidel Castro\'s regime, carried out fierce attacks in Cuba, dropping bombs on hotels and killing innocent people on the beach. In retaliation, the Cuban government inserts an elite group of spies into these terrorist groups in order to break them from within. Five of them eventually fall into the hands of the American authorities and face life imprisonment on charges of murder and espionage', '2020-10-15 16:00:00', 120, 2, 7, '2020-04-25 06:13:11', NULL);

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
(12, 7, 12, '2020-04-25 11:00:00', NULL);

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
(30, 7, 10, '2020-04-25 03:07:03', NULL);

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
(3, 'Admin', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(4, 'User', '2020-05-17 14:38:41', '2020-05-17 14:38:41'),
(5, 'Admin', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(6, 'User', '2020-05-17 14:47:13', '2020-05-17 14:47:13'),
(7, 'Admin', '2020-05-17 14:51:08', '2020-05-17 14:51:08'),
(8, 'User', '2020-05-17 14:51:08', '2020-05-17 14:51:08');

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
(1, 1, 1, '2020-06-08 19:27:53', '2020-06-08 20:02:15'),
(2, 2, 1, '2020-06-08 19:53:56', '2020-06-08 19:53:56'),
(3, 3, 1, '2020-06-08 19:54:04', '2020-06-08 19:54:04'),
(5, 4, 1, '2020-06-08 19:54:30', '2020-06-08 20:03:20'),
(6, 5, 1, '2020-06-08 19:56:25', '2020-06-08 20:03:32'),
(7, 6, 1, '2020-06-08 19:56:31', '2020-06-08 19:56:31'),
(8, 7, 1, '2020-06-08 19:56:35', '2020-06-08 19:56:35'),
(9, 8, 1, '2020-06-08 19:56:38', '2020-06-08 19:56:38'),
(10, 9, 1, '2020-06-08 19:56:41', '2020-06-08 19:56:41'),
(11, 10, 1, '2020-06-08 19:56:44', '2020-06-08 19:56:44'),
(12, 11, 1, '2020-06-08 19:56:51', '2020-06-08 19:56:51'),
(13, 12, 1, '2020-06-08 19:56:55', '2020-06-08 19:56:55'),
(14, 13, 1, '2020-06-08 19:56:58', '2020-06-08 19:56:58'),
(15, 14, 1, '2020-06-08 19:57:02', '2020-06-08 19:57:02');

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
(2, 2, '', '', '2020-04-25 02:09:12', NULL);

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
(28, 'Mateo Pouros', 'wcruickshank', 'metz.annamae@example.com', '2020-05-17 14:30:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '1ef636aab7d44e28e07b27635881078d', 'mpdoXjS1xc', '2020-05-17 14:30:37', '2020-05-17 14:30:37'),
(29, 'Nicolas Ferry', 'heidenreich.bella', 'theresia52@example.com', '2020-05-17 14:30:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '54def1765e5e9b9b12b48b4c97882cc5', 'daWwBxwjbS', '2020-05-17 14:30:37', '2020-05-17 14:30:37'),
(30, 'Kaela Hermann', 'jakubowski.jessika', 'sylvia94@example.net', '2020-05-17 14:38:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, 'd9efb8e6f0f59250821608899732d78a', 'sgcDSBhTOQ', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(31, 'Orlo Dietrich', 'sasha06', 'pablo.lesch@example.org', '2020-05-17 14:38:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'e264a47fa10bbc37278164a49fdf5af5', 'awnDuwHeqP', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(32, 'Mr. Leonel Sipes III', 'carroll.krista', 'witting.grayce@example.com', '2020-05-17 14:38:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, 'd492501dfe2fac7b8255a824f5b0f7ca', '67j1q9849E', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(33, 'Abel Luettgen', 'schuster.lempi', 'federico94@example.net', '2020-05-17 14:38:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, 'c6ca9bdf9b485167761355cfdaed55c7', 'F2mbucJlQa', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(34, 'Ms. Mina Mertz DDS', 'santos.rolfson', 'chance45@example.com', '2020-05-17 14:38:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, '1716d74dbb0327f0f36c63e46b51bd08', 'JDMET60oHs', '2020-05-17 14:38:42', '2020-05-17 14:38:42'),
(35, 'Abagail Gorczany', 'fondricka', 'sipes.isidro@example.net', '2020-05-17 14:47:14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 5, '64055ec09a53c646de065302260dca31', '6igmxYrRVd', '2020-05-17 14:47:14', '2020-05-17 14:47:14'),
(36, 'Abdullah Heathcote V', 'zthompson', 'ystanton@example.org', '2020-05-17 14:47:14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 5, '7d3ab5bba09ebf7e176938fd0b6340e9', '0iInI764T4', '2020-05-17 14:47:14', '2020-05-17 14:47:14'),
(37, 'Rosamond Doyle DDS', 'srosenbaum', 'rosalind.oreilly@example.net', '2020-05-17 14:47:14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 6, 'bb2bca1815a31311681dd5c9b69140ba', 'ZmbETpinhF', '2020-05-17 14:47:14', '2020-05-17 14:47:14'),
(38, 'Alisa Schowalter', 'uernser', 'madaline53@example.net', '2020-05-17 14:47:14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '272991e536bed10b3a8c9bb0b864b985', 'WegZeD7CMz', '2020-05-17 14:47:14', '2020-05-17 14:47:14'),
(39, 'Mr. Freeman Goyette DVM', 'thompson.rupert', 'hassie.beier@example.net', '2020-05-17 14:47:14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 6, '3e408d060b89382c3ea7afe7f72bde49', 'SbHeyljrtH', '2020-05-17 14:47:14', '2020-05-17 14:47:14'),
(40, 'Hildegard Waters Sr.', 'luisa.block', 'cconnelly@example.net', '2020-05-17 14:51:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'c55c3b1163d123067754f9ac8c454138', 'xoCEXRHNGB', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(41, 'Elyssa Yundt', 'corrine47', 'luna98@example.net', '2020-05-17 14:51:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 7, 'd424ff3fad94b3eda08a5e2c5a098534', '9wyXc4EhuY', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(42, 'Carter Oberbrunner', 'arden97', 'marvin.itzel@example.net', '2020-05-17 14:51:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 7, '22cea4d8123084aace3cd2e12cb15452', 'KDkXzio4B2', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(43, 'Ms. Anabelle Block', 'pearline05', 'oferry@example.com', '2020-05-17 14:51:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, '33605e3d13fe2566bf1f055a18d1f551', 'a4mn5rySN7', '2020-05-17 14:51:09', '2020-05-17 14:51:09'),
(44, 'Kylee Marks', 'qlowe', 'ikuhlman@example.net', '2020-05-17 14:51:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, 'd019a9f49b8d7e24616fc0d2084d69ed', 'SKkiaGFxUN', '2020-05-17 14:51:09', '2020-05-17 14:51:10'),
(46, 'Nenad Lalatovic', 'lalat', 'lalat@gmail.com', NULL, '$2y$10$kcwJMz8SKgJSP80zfObEse4ecHn4.0Z3H2HauUdKEIkrZc8/dARMW', 2, '398640a9a57f1ef0e7e5a63b8e494710', NULL, '2020-06-24 23:28:06', '2020-06-24 23:28:06'),
(47, 'Nikola Jovanovic', '@nikola', 'nikola@gmail.com', NULL, '$2y$10$sDQuH9VYAeaq7f//xXHQwOyZaJCMSX9oXfouAAz6mlzG/zFzzPMcG', 2, '38ca4375517b90e1f6c1dcaf263a3cbb', NULL, '2020-06-24 23:34:47', '2020-06-24 23:34:47');

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
(10, 2016, '2020-05-17 14:38:42', '2020-05-17 14:38:42');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movies_actors`
--
ALTER TABLE `movies_actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `movies_categories`
--
ALTER TABLE `movies_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seatchecker`
--
ALTER TABLE `seatchecker`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
