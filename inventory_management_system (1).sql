-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 04:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Is_Deleted` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `department_id`, `created_at`, `updated_at`, `Is_Deleted`) VALUES
(1, 'Electronics', 'Electronic devices and accessories.', 6, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(2, 'Beauty Products', 'Cosmetics and beauty accessories.', 7, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(3, 'Video Games', 'Games for various gaming platforms.', 3, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(4, 'Medical Supplies', 'Supplies for medical purposes.', 7, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(5, 'Sports Equipment', 'Equipment for various sports.', 5, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(6, 'Eyewear', 'Glasses and other eyewear products.', 4, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(7, 'Computer Hardware', 'Hardware components for computers.', 3, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(8, 'Health and Wellness', 'Products related to health and wellness.', 6, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(9, 'Automotive', 'Car parts and accessories.', 4, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(10, 'Eyewear', 'Glasses and other eyewear products.', 1, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(11, 'Swimwear', 'Swimsuits and related accessories.', 5, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(12, 'Home Decor', 'Decorative items for homes.', 5, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(13, 'Home Appliances', 'Appliances for various household needs.', 4, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(14, 'Outdoor Gear', 'Equipment for outdoor activities.', 1, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(15, 'Hobbies and Collectibles', 'Items related to hobbies and collectibles.', 4, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(16, 'Hobbies and Collectibles', 'Items related to hobbies and collectibles.', 1, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(17, 'Musical Instruments', 'Instruments for playing music.', 6, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(18, 'Toys', 'Toys and games.', 7, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(19, 'Video Games', 'Games for various gaming platforms.', 6, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(20, 'Office Furniture', 'Furniture for office spaces.', 2, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(21, 'Automotive', 'Car parts and accessories.', 7, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(22, 'Musical Equipment', 'Equipment for musical performances.', 4, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(23, 'Luggage and Travel Accessories', 'Bags and accessories for travel.', 4, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(24, 'Toys', 'Toys and games.', 2, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(25, 'DIY and Home Improvement', 'Supplies for do-it-yourself projects and home improvement.', 5, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(26, 'Clothing', 'Apparel and fashion accessories.', 1, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(27, 'Office Furniture', 'Furniture for office spaces.', 2, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(28, 'Jewelry', 'Various types of jewelry.', 6, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(29, 'Electronics', 'Electronic devices and accessories.', 3, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(30, 'Hobbies and Collectibles', 'Items related to hobbies and collectibles.', 3, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(31, 'Party Supplies', 'Supplies for parties and events.', 3, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(32, 'Eyewear', 'Glasses and other eyewear products.', 4, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(33, 'Toys', 'Toys and games.', 6, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(34, 'Stationery', 'Office and school supplies.', 2, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0),
(35, 'Tools', 'Tools and hardware.', 6, '2023-11-15 18:47:51', '2023-11-15 18:47:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `consumptions`
--

CREATE TABLE `consumptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `DataModifier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Is_Deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`, `Is_Deleted`) VALUES
(1, 'NOC', 'Network Operation Center', NULL, NULL, 0),
(2, 'BOD', 'Business Operations Department', NULL, NULL, 0),
(3, 'PRPD', 'Planning, Research and Program Development Department', NULL, NULL, 0),
(4, 'FD', 'Finance Department', NULL, NULL, 0),
(5, 'Galley', 'Galley Department', NULL, NULL, 0),
(6, 'DOD', 'Dormitory Department', NULL, NULL, 0),
(7, 'Admin', 'Admin Department', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_09_060057_create_sessions_table', 1),
(7, '2023_11_09_061644_create_departments_table', 2),
(8, '2023_11_09_061311_create_categories_table', 3),
(9, '2023_11_09_061950_create_suppliers_table', 3),
(10, '2023_11_09_062217_create_products_table', 3),
(11, '2023_11_09_084826_update_categories', 4),
(12, '2023_11_09_121503_update_department', 5),
(13, '2023_11_10_040423_update_suppliers', 6),
(14, '2023_11_10_103202_create_units_table', 7),
(15, '2023_11_10_103654_update_products', 8),
(16, '2023_11_11_021147_update_product', 9),
(17, '2023_11_11_032137_create_consumptions_table', 10),
(18, '2023_11_13_002733_create_replenishments_table', 11),
(19, '2023_11_13_002910_update_replenishments', 12),
(20, '2023_11_13_015607_create_stock_levels_table', 13),
(21, '2023_11_13_015722_update_products', 14),
(22, '2023_11_13_022844_create_user_types_table', 15),
(23, '2023_11_13_023644_update_users', 16),
(24, '2023_11_14_053120_create_roles_table', 17),
(25, '2023_11_14_053204_create_user_roles_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `LastModifiedBy` varchar(255) NOT NULL,
  `low_stock_level` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `unit_id`, `manufacturer`, `department_id`, `category_id`, `supplier_id`, `created_at`, `updated_at`, `LastModifiedBy`, `low_stock_level`) VALUES
(1, 'Item iste', 'Quas ut ea beatae velit necessitatibus quis.', 4349, 283, 14, 'Skiles, Schaden and King', 2, 15, 26, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Maybelle Olson', 11),
(2, 'Item cupiditate', 'Omnis dolor nihil culpa aut.', 3531, 78, 1, 'Beatty-Murphy', 6, 32, 29, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Jon Ondricka IV', 6),
(3, 'Item qui', 'Consequuntur ex numquam qui at ipsa eveniet et.', 3048, 108, 6, 'Hermann-Schmitt', 5, 12, 2, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Brenna Johns', 5),
(4, 'Item suscipit', 'Velit magnam voluptatibus minima beatae.', 1111, 249, 4, 'Armstrong and Sons', 3, 16, 14, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Annabell Rippin PhD', 16),
(5, 'Item nemo', 'Enim sed tenetur ad nulla aliquam at non.', 2968, 135, 13, 'Botsford-Bogisich', 1, 27, 20, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Stefanie Nicolas', 14),
(6, 'Item dicta', 'Sunt recusandae laudantium deleniti numquam.', 3743, 245, 10, 'Kovacek-Daniel', 2, 4, 13, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Miss Kiana Wilkinson', 8),
(7, 'Item illum', 'Sunt voluptas qui et ut at culpa.', 4781, 259, 7, 'Kohler Inc', 2, 35, 10, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Mrs. Tanya Farrell II', 12),
(8, 'Item neque', 'Ratione rerum architecto sunt veniam blanditiis dolor.', 4187, 33, 6, 'Krajcik LLC', 4, 31, 28, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Miss Gabriella Keeling', 5),
(9, 'Item explicabo', 'Quidem possimus molestiae soluta maiores pariatur fugit qui.', 3011, 198, 8, 'Gottlieb Inc', 2, 17, 24, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Camilla Hamill', 2),
(10, 'Item illo', 'Modi expedita aut dolores eveniet.', 1220, 80, 11, 'Hoppe Group', 2, 17, 30, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Adolphus Zboncak V', 4),
(11, 'Item excepturi', 'Et ipsa voluptas quia aut.', 1170, 153, 16, 'Jerde-Kertzmann', 2, 21, 9, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Arielle Cole', 13),
(12, 'Item repellendus', 'Ut a ad deleniti autem id.', 4083, 149, 14, 'Thompson-Kohler', 4, 29, 13, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Ms. Verlie Collier', 17),
(13, 'Item omnis', 'Nihil quidem ut adipisci consequatur et aut temporibus.', 3466, 196, 11, 'Kunze, Kassulke and Denesik', 6, 5, 19, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Lorenza Lang I', 12),
(14, 'Item voluptas', 'Ratione accusantium incidunt sequi labore eum saepe sequi.', 3388, 132, 7, 'Cruickshank-Eichmann', 7, 1, 2, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Wava Witting', 5),
(15, 'Item vero', 'Ullam mollitia voluptatem enim.', 1869, 82, 12, 'Veum-Homenick', 5, 9, 12, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Ms. Antoinette Prohaska', 5),
(16, 'Item et', 'Dolorem minus placeat ut soluta qui assumenda numquam dolorem.', 2607, 35, 6, 'Mills-Torphy', 3, 23, 5, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Mrs. Autumn Bode', 2),
(17, 'Item nihil', 'Ex eum sit et sed quos voluptatum.', 3634, 221, 3, 'Stiedemann, Turner and Schaefer', 4, 1, 21, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Khalid Mante', 14),
(18, 'Item assumenda', 'Id dolores quam ab odio.', 3335, 237, 9, 'Halvorson-Brown', 7, 18, 32, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Ms. Corene Cormier DDS', 16),
(19, 'Item exercitationem', 'Aut rerum dolores consequuntur et magni veniam et.', 447, 66, 16, 'Lindgren-Corwin', 2, 21, 14, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Nestor Denesik MD', 10),
(20, 'Item modi', 'Aut odio sed voluptates voluptate nesciunt.', 3589, 78, 10, 'Padberg Ltd', 5, 5, 11, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Keara Turner', 15),
(21, 'Item aut', 'Rerum cum sunt cum omnis.', 1367, 92, 2, 'Powlowski, Kozey and Leannon', 1, 24, 32, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Mr. Titus Kuvalis II', 12),
(22, 'Item tenetur', 'Distinctio est aut et impedit qui ducimus.', 4007, 160, 9, 'Franecki Group', 1, 20, 12, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Dr. Trycia Heller', 12),
(23, 'Item quaerat', 'Nihil est ea rerum vitae.', 815, 6, 5, 'Cummings-Herzog', 2, 33, 5, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Romaine Bode', 15),
(24, 'Item nisi', 'Ipsum et est qui quibusdam saepe illum et.', 2920, 268, 7, 'Rempel Inc', 4, 10, 12, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Columbus Skiles', 3),
(25, 'Item autem', 'Et quo dolores blanditiis ut maiores quia fuga.', 479, 297, 4, 'Boehm, Vandervort and Pacocha', 6, 9, 23, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Georgianna Johnston IV', 15),
(26, 'Item eum', 'Dolores in omnis sint dolorem voluptatum.', 2028, 32, 5, 'Jacobson, Weber and Shields', 2, 26, 14, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Mr. Reed Kunze IV', 6),
(27, 'Item quidem', 'Sequi quia veritatis sint qui ea.', 4095, 290, 7, 'Keeling-Raynor', 3, 7, 8, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Lenna Dach Sr.', 13),
(28, 'Item velit', 'Repudiandae et repudiandae assumenda.', 1675, 55, 14, 'Corwin, Howe and Haag', 2, 9, 32, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Declan O\'Reilly', 14),
(29, 'Item molestiae', 'Animi magni nam sed.', 2650, 180, 15, 'Littel, Waelchi and Ebert', 2, 10, 5, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Brandon Murazik', 11),
(30, 'Item tempora', 'Ipsa facere et autem qui ex ipsam.', 4093, 206, 9, 'Lind, Miller and Kunde', 5, 31, 23, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Miss Velva Stark', 7),
(31, 'Item necessitatibus', 'Tempore qui corrupti molestiae qui commodi consectetur saepe.', 4147, 170, 7, 'Jaskolski PLC', 3, 31, 32, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Modesta Barrows', 3),
(32, 'Item explicabo', 'Autem reprehenderit et quia.', 2996, 200, 15, 'Cummings, Gutkowski and Rutherford', 5, 25, 27, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Dan Crist', 13),
(33, 'Item cupiditate', 'Aut voluptas saepe vel consequuntur sunt illo vel porro.', 3790, 83, 12, 'Kautzer and Sons', 2, 32, 24, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Breanna Lakin', 8),
(34, 'Item ratione', 'Maiores odit natus neque laboriosam quia suscipit enim ut.', 4657, 140, 3, 'Williamson-Morar', 7, 29, 11, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Mr. Olin Heller PhD', 9),
(35, 'Item autem', 'Ut facere et sint nulla alias quis est.', 3655, 43, 14, 'Marquardt PLC', 3, 22, 31, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Miss Gwen Koelpin', 10),
(36, 'Item nihil', 'Eveniet ducimus libero sit deleniti optio est.', 2015, 254, 8, 'Bins and Sons', 3, 8, 6, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Evelyn Brakus V', 13),
(37, 'Item autem', 'Perspiciatis aut totam ea reiciendis culpa iusto.', 2424, 129, 1, 'West, Leffler and Lowe', 3, 7, 32, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Brandt Oberbrunner', 12),
(38, 'Item laborum', 'Occaecati magnam quam ut nam architecto minima repellat.', 2265, 108, 11, 'Stiedemann-Renner', 2, 2, 27, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Noelia Kohler', 4),
(39, 'Item incidunt', 'Ratione pariatur unde at quas atque officia.', 2553, 93, 13, 'Mante PLC', 1, 8, 27, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Dorcas Crooks', 11),
(40, 'Item nostrum', 'Ab possimus porro odio.', 1477, 223, 5, 'Brown, Nitzsche and Pfeffer', 2, 35, 22, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Marion Paucek III', 12),
(41, 'Item voluptas', 'Commodi aspernatur unde ut harum nam sit et.', 1932, 269, 1, 'Robel and Sons', 2, 34, 26, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Andrew Wintheiser III', 10),
(42, 'Item molestiae', 'Impedit consequatur exercitationem nobis eos sit.', 1251, 300, 2, 'Yundt, Kohler and Collins', 2, 27, 9, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Mr. Muhammad Hill Jr.', 12),
(43, 'Item dolor', 'At cupiditate esse sunt voluptatem.', 1395, 238, 8, 'Graham and Sons', 7, 34, 21, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Elza Balistreri', 17),
(44, 'Item et', 'Voluptas est ut error doloremque et id.', 2224, 2, 1, 'Hermiston-Schuppe', 1, 34, 8, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Leonardo Ortiz', 4),
(45, 'Item id', 'Sed fugit dolore qui quibusdam nostrum.', 2157, 17, 16, 'Rutherford, Ruecker and Kreiger', 4, 22, 16, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Ms. Valerie Dach Sr.', 20),
(46, 'Item excepturi', 'Temporibus ratione ipsam assumenda ullam aliquid dolorum consequatur.', 573, 246, 2, 'Brown PLC', 2, 16, 8, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Linnea Hodkiewicz', 17),
(47, 'Item ut', 'Fugiat officiis voluptas esse error.', 4224, 133, 4, 'Keeling, Gutmann and Hettinger', 5, 10, 20, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Trinity Fisher', 6),
(48, 'Item molestiae', 'Similique harum inventore est consequatur et nostrum libero.', 548, 10, 1, 'Walker-McClure', 2, 2, 6, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Brandi Rosenbaum MD', 4),
(49, 'Item quo', 'Voluptas ab possimus est consequatur deleniti possimus maxime assumenda.', 3754, 90, 11, 'D\'Amore, Dicki and Klein', 5, 3, 24, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Izaiah Mills II', 11),
(50, 'Item laudantium', 'Sunt ut porro ut quia optio.', 3648, 259, 4, 'Lindgren Group', 2, 34, 1, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Viviane Kiehn', 2),
(51, 'Item voluptatem', 'Esse quia velit tenetur eos.', 2122, 114, 16, 'Lockman and Sons', 3, 17, 24, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Frida Sawayn', 19),
(52, 'Item illum', 'Eligendi nemo deleniti delectus qui omnis.', 4496, 141, 14, 'Flatley Ltd', 7, 20, 34, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Josue Dooley II', 17),
(53, 'Item suscipit', 'Tempore quos quasi doloremque temporibus reiciendis.', 1682, 233, 12, 'Gutmann PLC', 6, 16, 12, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Maximillian Kertzmann', 15),
(54, 'Item incidunt', 'Aliquam fugiat magni sunt similique et libero.', 415, 211, 14, 'Nikolaus PLC', 1, 12, 16, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Ms. Willa Orn Sr.', 3),
(55, 'Item est', 'Autem consequatur quia dolor rerum explicabo qui magnam.', 3724, 292, 11, 'Johns-Altenwerth', 7, 33, 28, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Ford Corkery', 1),
(56, 'Item dolor', 'Aut exercitationem quia iusto numquam sed odio corporis sint.', 1256, 295, 2, 'Jacobi-Sporer', 5, 4, 13, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Pierce Rosenbaum', 8),
(57, 'Item et', 'Possimus autem veniam quos ut.', 3365, 276, 5, 'Kshlerin LLC', 7, 1, 21, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Rowland Cole', 9),
(58, 'Item aspernatur', 'Eius ipsum tempora omnis vel et id.', 3446, 208, 3, 'Medhurst, Bahringer and Lockman', 6, 20, 22, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Dr. Jimmy Bahringer Jr.', 15),
(59, 'Item impedit', 'Eaque nemo enim id inventore esse.', 3539, 296, 1, 'Weimann, Gislason and Hessel', 6, 9, 23, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Sigrid Keebler', 4),
(60, 'Item cum', 'Nostrum id ratione pariatur.', 407, 135, 16, 'Hoppe-Schaefer', 5, 3, 1, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Karley Hirthe', 13),
(61, 'Item totam', 'Et ducimus quis voluptatum et hic rerum sint.', 1357, 201, 8, 'Howell and Sons', 4, 24, 17, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Sylvester West IV', 7),
(62, 'Item perferendis', 'Accusantium eaque cum dicta est assumenda officia ea.', 2148, 37, 12, 'Carroll, Effertz and Hamill', 4, 30, 6, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Benny Grady', 20),
(63, 'Item tempore', 'Vero incidunt cumque est et autem voluptatem.', 3371, 277, 3, 'Stehr LLC', 3, 30, 14, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Dr. Precious Kunze MD', 20),
(64, 'Item deleniti', 'Aut excepturi labore esse nulla doloremque.', 4677, 179, 14, 'Littel-Gerhold', 1, 10, 20, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Gerardo Tromp Sr.', 16),
(65, 'Item cum', 'Consectetur nihil mollitia facilis dolorem porro repellat enim.', 702, 62, 12, 'Volkman, Durgan and Goyette', 7, 34, 32, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Dylan Goyette I', 3),
(66, 'Item explicabo', 'Et quo harum sit consequuntur nihil qui cum similique.', 252, 232, 10, 'Kling, Watsica and Yundt', 7, 31, 1, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Corene Parker', 20),
(67, 'Item voluptatem', 'Nihil eos sapiente fugiat et blanditiis dolores.', 4462, 273, 7, 'Rau-Heller', 2, 32, 15, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Maxine Hansen', 16),
(68, 'Item error', 'Non adipisci sunt ut.', 1857, 44, 1, 'Marvin-Cole', 5, 5, 16, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Chadd Thiel I', 8),
(69, 'Item itaque', 'Mollitia tempora libero vero.', 1347, 231, 10, 'Lueilwitz, Bechtelar and Schinner', 1, 9, 19, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Cayla Schamberger', 4),
(70, 'Item et', 'Libero maiores magni eveniet est numquam doloribus.', 1383, 279, 10, 'Williamson, Zemlak and Kertzmann', 2, 34, 27, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Maia Ortiz', 17),
(71, 'Item ut', 'Deleniti quia aspernatur voluptatum deserunt quia vero velit qui.', 4761, 4, 16, 'Jacobson-Yost', 7, 25, 9, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Dr. Ford Kutch I', 3),
(72, 'Item pariatur', 'Qui ea iste fugiat eum.', 1878, 62, 13, 'Beier-Cole', 3, 31, 10, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Bill Rogahn', 18),
(73, 'Item tempore', 'Dolorem eligendi dolorem consequatur aut quidem quia officia nesciunt.', 399, 60, 15, 'Pouros-Crona', 6, 24, 21, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Jany Bashirian', 9),
(74, 'Item praesentium', 'Vel ut ipsam qui dolor laudantium illo tempore earum.', 4755, 36, 14, 'Dare-Hagenes', 4, 32, 3, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Doyle Mayer MD', 13),
(75, 'Item culpa', 'Quaerat adipisci beatae asperiores.', 412, 271, 10, 'Shields Inc', 2, 14, 8, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Derick Blanda', 17),
(76, 'Item porro', 'Illo exercitationem nesciunt harum consequatur cum quia.', 2225, 136, 7, 'Cole-Howe', 2, 13, 28, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Agnes Wunsch', 3),
(77, 'Item incidunt', 'Aut officia itaque nihil at qui consectetur.', 2106, 159, 6, 'Schiller-Hoeger', 5, 1, 1, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Vincenzo Daniel I', 7),
(78, 'Item laudantium', 'Corporis hic exercitationem quo et.', 3014, 7, 10, 'Considine LLC', 1, 32, 23, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Scarlett Homenick', 8),
(79, 'Item quia', 'Molestias et et a amet voluptatum nihil.', 985, 238, 8, 'Bradtke LLC', 6, 20, 14, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Murray Yundt', 2),
(80, 'Item error', 'Laborum magni vitae id quis porro.', 1341, 41, 9, 'Ebert, Veum and Towne', 3, 18, 5, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Della Pollich', 17),
(81, 'Item delectus', 'Est reiciendis officiis provident ut dolorem quia inventore.', 2039, 214, 1, 'Wisoky-Langosh', 4, 35, 31, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Helmer Heathcote DDS', 7),
(82, 'Item consequatur', 'Enim sunt voluptas ut officiis.', 2659, 69, 10, 'Pfannerstill, Renner and Hand', 1, 33, 26, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Chasity Kuhic', 11),
(83, 'Item in', 'Fugiat facilis est fugit animi et.', 1558, 219, 1, 'Mitchell-Trantow', 7, 2, 33, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Tina Quigley IV', 7),
(84, 'Item ab', 'Qui nam non ut similique possimus.', 3081, 86, 7, 'Monahan PLC', 6, 19, 27, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Cullen Ernser DDS', 13),
(85, 'Item impedit', 'Quasi tempora velit consequatur omnis.', 3136, 114, 16, 'Eichmann, Welch and Kutch', 7, 19, 2, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Dr. Ebony Bogisich', 13),
(86, 'Item pariatur', 'Id optio ea et aspernatur omnis dolorem.', 239, 297, 15, 'Pouros LLC', 6, 3, 28, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Pink Hickle', 9),
(87, 'Item vitae', 'Neque quo quo illo et.', 104, 88, 6, 'Reinger LLC', 1, 18, 2, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Edmond Ankunding', 15),
(88, 'Item nisi', 'Consectetur nihil consequatur placeat tenetur.', 906, 43, 16, 'Kihn, Trantow and Veum', 4, 12, 18, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Prof. Virginie Lemke', 8),
(89, 'Item qui', 'Architecto pariatur vel molestiae pariatur dicta ipsam reiciendis.', 4351, 281, 1, 'Dach, Waters and Homenick', 3, 21, 9, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Kyla Lebsack', 12),
(90, 'Item quia', 'Commodi error vero et culpa aut voluptatibus.', 4313, 205, 4, 'Shanahan-Zboncak', 7, 18, 26, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Krista Kunze', 6),
(91, 'Item minus', 'Dolorem assumenda provident magnam repellendus molestiae iure.', 1960, 14, 6, 'Bergstrom-Kiehn', 6, 14, 21, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Alana Wisoky', 13),
(92, 'Item ut', 'Voluptas debitis aut voluptates est.', 4439, 233, 3, 'Wintheiser, Cole and Ritchie', 1, 19, 22, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Aurore Gerlach', 4),
(93, 'Item laborum', 'Odit magni rerum aut magnam voluptas eos.', 3544, 293, 14, 'Runolfsson-Block', 4, 3, 20, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Frankie Ankunding', 10),
(94, 'Item laborum', 'Natus at ducimus aut minus sequi fuga ex.', 1347, 293, 15, 'Collier-Reilly', 6, 4, 2, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Godfrey Brakus', 3),
(95, 'Item delectus', 'Voluptas sequi consequatur ut qui perferendis animi.', 1022, 195, 14, 'Sauer-O\'Reilly', 7, 13, 13, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Albina Wilkinson DVM', 12),
(96, 'Item explicabo', 'Facilis et sit temporibus laborum consequatur consequatur.', 1852, 216, 3, 'Emmerich Ltd', 6, 6, 20, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Enola Schuppe V', 15),
(97, 'Item ut', 'Vero odit et voluptatem ea ratione vero.', 516, 24, 12, 'Crona Ltd', 6, 33, 25, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Domingo Kuhic', 13),
(98, 'Item provident', 'Quidem iusto quam quidem magnam quis in ab.', 2423, 209, 13, 'Reynolds-Beahan', 7, 20, 14, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Jude Wunsch', 13),
(99, 'Item voluptas', 'Ut ut repudiandae natus impedit eum nemo voluptatem.', 3066, 182, 11, 'Marquardt, Farrell and Sanford', 6, 3, 24, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Clara White', 9),
(100, 'Item dolores', 'Molestiae magnam sunt voluptas ut.', 3677, 145, 5, 'Heaney Ltd', 7, 35, 6, '2023-11-15 19:01:18', '2023-11-15 19:01:18', 'Wilfredo Haley', 17);

-- --------------------------------------------------------

--
-- Table structure for table `replenishments`
--

CREATE TABLE `replenishments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `DataModifier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Inventory Module', NULL, NULL),
(2, 'Logs Module', NULL, NULL),
(3, 'Replenishment Logs (Logs Module)', NULL, NULL),
(4, 'Consumption Logs (Logs Module)', NULL, NULL),
(5, 'Settings Module', NULL, NULL),
(6, 'Categories (Settings Module)', NULL, NULL),
(7, 'Department (Settings Module)', NULL, NULL),
(8, 'Supplier (Settings Module)', NULL, NULL),
(9, 'Unit (Settings Module)', NULL, NULL),
(10, 'User Management Module', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4eF0xXDpKANKSJO9TidqDny6YAbRrVDx3iCuXC0n', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieHVzUzJpckw3ZGNMb1U3czJyWVRxdUpPZzMyNW12MkNCMGk0TDVSTCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVjdHMvaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJFdPR3hJMXQ3MjhkTTdGcFUwaVdnNi5ZdkpWUFYyMy9XazJFVWtnL3hqU1IyMENXdW9GV2ZTIjt9', 1700103694);

-- --------------------------------------------------------

--
-- Table structure for table `stock_levels`
--

CREATE TABLE `stock_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_levels`
--

INSERT INTO `stock_levels` (`id`, `stock_level`, `created_at`, `updated_at`) VALUES
(1, 'Low Stock', NULL, NULL),
(2, 'On Stock', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Is_Deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact_person`, `email`, `phone`, `address`, `department_id`, `created_at`, `updated_at`, `Is_Deleted`) VALUES
(1, 'Macejkovic-Carter', 'Lera Huels Sr.', 'jovanny69@example.org', '319-952-8397', '6002 Samson Drive Apt. 503\nMayerport, FL 70941', 3, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(2, 'Ondricka-Doyle', 'Melissa McClure', 'armani22@example.org', '762-498-6248', '9890 Dibbert Terrace\nRathbury, LA 86480', 2, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(3, 'Ebert LLC', 'Cristobal Jacobs', 'pouros.fiona@example.org', '+1.240.952.0117', '94667 Jacobs Terrace\nHudsonshire, MT 20086-1873', 7, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(4, 'Dickinson-Marvin', 'Prof. Pearline Hansen', 'evelyn.sawayn@example.net', '+1-341-953-9791', '9357 Metz Ports Apt. 951\nDanielport, IA 89130', 6, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(5, 'Moore, Abbott and Metz', 'Grayce Kuphal', 'lrussel@example.net', '339.932.5837', '216 Isidro Gardens Apt. 756\nSouth Melvina, CT 96628-5387', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(6, 'Bode PLC', 'Miss Lesly Gulgowski', 'eturner@example.com', '+1-574-333-1802', '991 Gulgowski Fall Apt. 415\nQuigleymouth, HI 11260', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(7, 'Yundt, Reinger and Beier', 'Orpha Fay', 'schuppe.daphnee@example.com', '1-458-794-9941', '6587 Bulah Turnpike Apt. 623\nEast Elliotberg, WI 75567-2203', 7, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(8, 'Erdman LLC', 'Dr. Alta West', 'alvis31@example.org', '+1.832.546.9898', '73064 Halvorson Loop Apt. 831\nMatteoborough, UT 59914', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(9, 'Tillman Group', 'Arnaldo Grady', 'rstehr@example.net', '+1 (574) 804-6646', '2745 Dena Overpass\nNew Charles, WA 69458', 1, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(10, 'Cassin Group', 'Carmel Wintheiser', 'regan95@example.net', '445.687.5194', '627 Deanna Burg\nWest Jaidenhaven, OK 65124', 1, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(11, 'Hills-Lynch', 'Pedro Purdy', 'lkuvalis@example.org', '231.485.7323', '7692 Leannon Tunnel Suite 808\nWest Geraldineburgh, AK 40462-9904', 1, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(12, 'Skiles-DuBuque', 'Alysa Paucek', 'mbergnaum@example.org', '813.841.0587', '98529 Preston Square Apt. 972\nRoweton, AK 33918-7088', 3, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(13, 'Ortiz, Nitzsche and Renner', 'Damian Jerde', 'andy.lowe@example.com', '1-301-573-3461', '738 Gavin Plaza Suite 388\nSouth Monica, IA 85004-3275', 2, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(14, 'Collier-Haag', 'Dexter Paucek I', 'terrance.olson@example.com', '913-462-8382', '8287 Aurore Knolls\nHermistonton, AL 64780-3039', 2, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(15, 'Kessler PLC', 'Prof. Serenity Bayer', 'qgusikowski@example.org', '+12108502270', '9233 Heaney Causeway Suite 348\nPrincemouth, MO 71431-4305', 5, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(16, 'Ratke Inc', 'Darryl Langworth', 'ogottlieb@example.org', '(845) 383-6299', '76092 Kertzmann Mountain Suite 635\nJordonmouth, NH 09327-6690', 1, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(17, 'Collins-Jones', 'Jody Wolf', 'boyle.jakayla@example.com', '(754) 707-6298', '75995 Eulah Stravenue Suite 226\nPort Burdette, NE 68473', 2, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(18, 'Kihn-Wiza', 'Mr. Hassan Okuneva', 'celestine.johns@example.com', '317.347.6841', '71387 Chaya Brooks\nNorth Madonnaborough, NE 28270-3587', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(19, 'Osinski-Toy', 'Jayda Bergstrom', 'dwunsch@example.com', '+1.347.208.5744', '330 Caitlyn Center\nSheaport, MT 67054', 7, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(20, 'Goldner, O\'Connell and Jaskolski', 'Matilda Mosciski PhD', 'xwolff@example.com', '+12837551665', '54460 Cierra Divide Apt. 811\nPort Birdie, DC 13605-9122', 7, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(21, 'Strosin Group', 'Prof. General Wiegand Jr.', 'lluettgen@example.net', '(386) 828-0628', '870 Louvenia Mountain Suite 442\nJeanieton, VT 78450-1852', 6, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(22, 'Weimann Group', 'Armando Ritchie', 'hsporer@example.com', '+1 (618) 900-4284', '871 Hills Greens\nReedport, OH 99521', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(23, 'Smith, Block and Corwin', 'Berry Pagac DVM', 'katarina.herzog@example.com', '+1.640.624.7199', '8972 Zemlak Causeway\nSouth Leonchester, ME 69577', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(24, 'Marvin-Murray', 'Drake Johns', 'georgiana.lemke@example.org', '+1-574-978-8331', '97616 Deon River\nFadelport, NE 65326-6137', 3, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(25, 'West PLC', 'Miss Amalia Sawayn I', 'fhand@example.net', '+1.276.374.7363', '9498 Bessie Walk Suite 095\nNew Desmond, NV 61811-7178', 1, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(26, 'Schamberger Group', 'Dr. Russ Schaefer II', 'gerhold.benjamin@example.net', '+1 (463) 781-3655', '468 McCullough Cliff Suite 794\nNolanside, MD 70961-9702', 7, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(27, 'Goodwin, Abernathy and Gorczany', 'Mrs. Mafalda Rodriguez Jr.', 'hjacobi@example.net', '+1-564-675-1941', '82919 Ernser Union\nPort Jonatanport, SC 61560', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(28, 'Brakus Inc', 'Frieda Hickle', 'hamill.emelie@example.com', '+1-657-883-4891', '41475 Paige Square Suite 879\nEast Kristinland, ID 15431-3885', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(29, 'Klein, Lind and Roob', 'Clifford Walker', 'irobel@example.net', '779.572.8954', '73161 Leffler Overpass\nHackettland, MN 90838', 5, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(30, 'Auer PLC', 'Ross Rempel', 'buddy49@example.com', '954-409-8632', '23277 Scot Street\nGerlachborough, GA 02580-1993', 5, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(31, 'Hackett-McClure', 'Dr. Abdiel Haley III', 'rocky.walter@example.net', '(480) 455-8026', '2135 Kara Brook Apt. 437\nStokesburgh, VT 24369-3562', 1, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(32, 'Gibson-Reichel', 'Jennie Kihn', 'arnulfo70@example.net', '+1.445.218.4899', '96047 Gideon Circle\nNorth Shayneton, MA 29432-8899', 7, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(33, 'Block, Ortiz and Daugherty', 'Broderick McGlynn', 'gudrun.herzog@example.com', '+1-254-672-5362', '477 Lacy Wall Apt. 593\nEast Burley, NE 07148-1590', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(34, 'Swaniawski, Kutch and Mayert', 'Ms. Erika Miller DDS', 'omorar@example.com', '1-865-907-0112', '45615 Lemke Path\nWest Lukas, MI 49514', 4, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0),
(35, 'Moen LLC', 'Miss Elenora Stroman', 'estefania.champlin@example.org', '559-740-4363', '86262 Mosciski Freeway\nEarnestview, ND 98166-4572', 1, '2023-11-15 18:52:34', '2023-11-15 18:52:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'pc', 'piece', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(2, 'dz', 'dozen', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(3, 'cs', 'case', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(4, 'bx', 'box', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(5, 'lb', 'pound', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(6, 'kg', 'kilogram', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(7, 'oz', 'ounce', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(8, 'g', 'gram', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(9, 'l', 'liter', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(10, 'gal', 'gallon', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(11, 'sf', 'square foot', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(12, 'sqm', 'square meter', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(13, 'roll', 'roll', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(14, 'cf', 'cubic foot', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(15, 'cm', 'cubic meter', '2023-11-10 10:36:17', '2023-11-10 10:36:17'),
(16, 'pr', 'pair', '2023-11-10 10:36:17', '2023-11-10 10:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `tip` text NOT NULL DEFAULT ' ',
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `usertype_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `tip`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `department_id`, `usertype_id`, `created_at`, `updated_at`) VALUES
(1, 'Mollee Roxas', 'cosmicsher96@gmail.com', NULL, 'OC5tIsnWVdAa1@', '$2y$12$WOGxI1t728dM7FpU0iWg6.YvJVPV23/Wk2EUkg/xjSR20CWuoFWfS', NULL, NULL, NULL, '45gXMQkH4yOPXXcxE12hdAiU4wqmT8ChoYjIU0SEXL9oFssp9Mj8VsIrfoRm', NULL, NULL, 1, 1, '2023-11-08 22:05:08', '2023-11-13 21:12:24'),
(2, 'Grace Borromeo', 'grace.borromeo@neti.com.ph', NULL, 'xmtORArDKnAa1@', '$2y$12$5.tf7DktQ86.o21.nnT2F.LGWSU17vG/puiDUJV4pm5y5CWB/7L3O', NULL, NULL, NULL, NULL, NULL, NULL, 7, 2, '2023-11-13 17:33:41', '2023-11-13 21:12:55'),
(3, 'Kaith Perea', 'kaith.perea@neti.com.ph', NULL, 'GUHvpun1ZaAa1@', '$2y$12$g48PsoBws2qyiIp8r07o7.26x9fDluBSl8ocKVVHeFBKg3dCLkT5O', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, '2023-11-13 20:51:49', '2023-11-13 20:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2023-11-13 23:47:32', '2023-11-13 23:47:32'),
(2, 2, 2, '2023-11-13 23:47:32', '2023-11-13 23:47:32'),
(3, 2, 3, '2023-11-13 23:47:32', '2023-11-13 23:47:32'),
(4, 2, 4, '2023-11-13 23:47:32', '2023-11-13 23:47:32'),
(5, 2, 5, '2023-11-13 23:47:32', '2023-11-13 23:47:32'),
(6, 2, 6, '2023-11-13 23:47:32', '2023-11-13 23:47:32'),
(7, 2, 8, '2023-11-13 23:47:32', '2023-11-13 23:47:32'),
(18, 1, 1, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(19, 1, 2, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(20, 1, 3, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(21, 1, 4, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(22, 1, 5, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(23, 1, 6, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(24, 1, 7, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(25, 1, 8, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(26, 1, 9, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(27, 1, 10, '2023-11-13 23:53:52', '2023-11-13 23:53:52'),
(28, 3, 1, '2023-11-14 00:11:51', '2023-11-14 00:11:51'),
(29, 3, 2, '2023-11-14 00:11:51', '2023-11-14 00:11:51'),
(30, 3, 3, '2023-11-14 00:11:51', '2023-11-14 00:11:51'),
(31, 3, 4, '2023-11-14 00:11:51', '2023-11-14 00:11:51'),
(32, 3, 5, '2023-11-14 00:11:51', '2023-11-14 00:11:51'),
(33, 3, 6, '2023-11-14 00:11:51', '2023-11-14 00:11:51'),
(34, 3, 8, '2023-11-14 00:11:51', '2023-11-14 00:11:51'),
(35, 3, 9, '2023-11-14 00:11:51', '2023-11-14 00:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'System Administrator', NULL, NULL),
(2, 'Employee', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_department_id_foreign` (`department_id`);

--
-- Indexes for table `consumptions`
--
ALTER TABLE `consumptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumptions_product_id_foreign` (`product_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_department_id_foreign` (`department_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `replenishments`
--
ALTER TABLE `replenishments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replenishments_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stock_levels`
--
ALTER TABLE `stock_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_department_id_foreign` (`department_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_department_id_foreign` (`department_id`),
  ADD KEY `users_usertype_id_foreign` (`usertype_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `consumptions`
--
ALTER TABLE `consumptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `replenishments`
--
ALTER TABLE `replenishments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stock_levels`
--
ALTER TABLE `stock_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `consumptions`
--
ALTER TABLE `consumptions`
  ADD CONSTRAINT `consumptions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `replenishments`
--
ALTER TABLE `replenishments`
  ADD CONSTRAINT `replenishments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_usertype_id_foreign` FOREIGN KEY (`usertype_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
