-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 01:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bongsen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-11-28 04:40:29', '2022-11-28 04:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_number` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `sent` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `birthday`, `gender`, `phone`, `email`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn A', '2011-01-02', 1, '0123456789', 'A@gmail.com', '3/2, Ninh kiều', 3, '2022-11-28 04:40:29', '2022-11-28 06:34:58'),
(2, 'Nguyễn Văn C', NULL, NULL, NULL, NULL, NULL, 4, '2022-11-28 04:40:29', '2022-11-28 04:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `evaluationfeedbacks`
--

CREATE TABLE `evaluationfeedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quality` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `color_evaluation` varchar(255) DEFAULT NULL,
  `dimension_evaluation` varchar(255) DEFAULT NULL,
  `style_evaluation` varchar(255) DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `quality`, `content`, `color_evaluation`, `dimension_evaluation`, `style_evaluation`, `customers_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'Giao hàng nhanh', 'ĐÚng mô tả', 'ĐÚng mô tả', 'ĐÚng mô tả', 1, 3, '2022-11-28 06:55:36', '2022-11-28 06:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` date NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sinh nhật', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(2, 'Kỷ niệm ngày cưới', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(3, 'Kỷ niệm ngày mới quen', '2022-11-28 04:40:30', '2022-11-28 04:40:30');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `problem_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `content`, `problem_id`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn H', '02132434323', 'ABC@gmail.com', 'Shop giao hàng quá chậm', 1, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(2, 'Nguyễn Văn G', '02837458473', 'BCDEF@gmail.com', 'Shop giao hàng quá nhanh', 1, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(3, 'Nguyễn Văn R', '0132454322', 'CDEFSK@gmail.com', 'Đóng gói sản phẩm sơ sài', 4, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(4, 'Nguyễn Văn J', '0938574738', 'ABC@gmail.com', 'Chăm sóc khách hàng chưa tốt', 3, '2022-11-28 04:40:30', '2022-11-28 04:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `imageofevaluations`
--

CREATE TABLE `imageofevaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `evaluation_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imageofevaluations`
--

INSERT INTO `imageofevaluations` (`id`, `url`, `evaluation_id`, `created_at`, `updated_at`) VALUES
(1, 'imageofevaluation1.png', 1, '2022-11-28 06:55:36', '2022-11-28 06:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `import_coupons`
--

CREATE TABLE `import_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `import_coupons`
--

INSERT INTO `import_coupons` (`id`, `time`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, '2022-09-10', 1, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(2, '2022-10-10', 1, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(3, '2022-11-11', 4, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(4, '2022-11-12', 3, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(5, '2022-11-15', 2, '2022-11-28 04:40:30', '2022-11-28 04:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `import_details`
--

CREATE TABLE `import_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `import_coupon_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `import_details`
--

INSERT INTO `import_details` (`id`, `quantity`, `price`, `ingredient_id`, `import_coupon_id`, `created_at`, `updated_at`) VALUES
(1, 1000, 6000, 2, 1, NULL, NULL),
(2, 2000, 5000, 6, 1, NULL, NULL),
(3, 1300, 7000, 4, 4, NULL, NULL),
(4, 1100, 8000, 10, 2, NULL, NULL),
(5, 1100, 9000, 1, 1, NULL, NULL),
(6, 1200, 10000, 12, 4, NULL, NULL),
(7, 300, 3000, 9, 1, NULL, NULL),
(8, 200, 4000, 4, 2, NULL, NULL),
(9, 400, 2000, 4, 5, NULL, NULL),
(10, 1400, 6000, 8, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ingredientofproducts`
--

CREATE TABLE `ingredientofproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredientofproducts`
--

INSERT INTO `ingredientofproducts` (`id`, `quantity`, `product_id`, `ingredient_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 5, NULL, NULL),
(2, 6, 2, 7, NULL, NULL),
(3, 2, 2, 1, NULL, NULL),
(4, 2, 2, 12, NULL, NULL),
(5, 5, 3, 13, NULL, NULL),
(6, 6, 4, 14, NULL, NULL),
(7, 4, 4, 1, NULL, NULL),
(8, 18, 5, 5, NULL, NULL),
(9, 5, 5, 4, NULL, NULL),
(10, 5, 6, 15, NULL, NULL),
(11, 6, 6, 6, NULL, NULL),
(12, 10, 6, 5, NULL, NULL),
(13, 10, 7, 3, NULL, NULL),
(14, 2, 7, 11, NULL, NULL),
(15, 5, 8, 9, NULL, NULL),
(16, 5, 9, 9, NULL, NULL),
(17, 4, 9, 11, NULL, NULL),
(18, 2, 9, 7, NULL, NULL),
(19, 3, 9, 1, NULL, NULL),
(20, 5, 10, 13, NULL, NULL),
(21, 10, 10, 3, NULL, NULL),
(22, 5, 11, 4, NULL, NULL),
(23, 4, 11, 9, NULL, NULL),
(24, 5, 12, 11, NULL, NULL),
(25, 6, 12, 10, NULL, NULL),
(26, 6, 13, 13, NULL, NULL),
(27, 7, 13, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `instock_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `image`, `instock_id`, `created_at`, `updated_at`) VALUES
(1, 'Hoa cẩm chướng', 'ingredient1.png', 1, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(2, 'Hoa bách hợp', 'ingredient2.png', 2, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(3, 'Hoa đồng tiền', 'ingredient3.png', 3, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(4, 'Hoa cát tường', 'ingredient4.png', 4, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(5, 'Hoa hồng', 'ingredient5.png', 5, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(6, 'Hoa bi', 'ingredient6.png', 6, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(7, 'Hoa bất tử', 'ingredient7.png', 7, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(8, 'Hoa cẩm tú cầu', 'ingredient8.png', 8, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(9, 'Mẫu đơn', 'ingredient9.png', 9, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(10, 'Lan hồ điệp', 'ingredient10.png', 10, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(11, 'Hoa cúc', 'ingredient11.png', 11, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(12, 'Hoa sen', 'ingredient12.png', 12, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(13, 'Hướng dương', 'ingredient13.png', 13, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(14, 'Hoa thạch thảo', 'ingredient14.png', 14, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(15, 'Hoa ly', 'ingredient15.png', 15, '2022-11-28 04:40:29', '2022-11-28 04:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `instocks`
--

CREATE TABLE `instocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instocks`
--

INSERT INTO `instocks` (`id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2332, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(2, 3423, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(3, 4566, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(4, 3466, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(5, 2873, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(6, 4859, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(7, 2233, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(8, 2344, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(9, 112, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(10, 123, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(11, 3335, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(12, 66, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(13, 345, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(14, 233, '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(15, 455, '2022-11-28 04:40:30', '2022-11-28 04:40:30');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_07_101234_create_admins_table', 1),
(6, '2022_11_07_114006_create_workplaces_table', 1),
(7, '2022_11_07_114233_create_problems_table', 1),
(8, '2022_11_07_114520_create_eventtypes_table', 1),
(9, '2022_11_07_114746_create_styles_table', 1),
(10, '2022_11_07_114854_create_suppliers_table', 1),
(11, '2022_11_07_155426_create_statuses_table', 1),
(12, '2022_11_07_160430_create_customers_table', 1),
(13, '2022_11_07_160820_create_staff_table', 1),
(14, '2022_11_07_171118_create_feedback_table', 1),
(15, '2022_11_07_171422_create_receivers_table', 1),
(16, '2022_11_07_171640_create_importcoupons_table', 1),
(17, '2022_11_07_171925_create_events_table', 1),
(18, '2022_11_07_172230_create_orders_table', 1),
(19, '2022_11_07_174255_create_bills_table', 1),
(20, '2022_11_07_174703_create_orderdetails_table', 1),
(21, '2022_11_07_175202_create_ingredients_table', 1),
(22, '2022_11_07_180348_create_instocks_table', 1),
(23, '2022_11_07_180547_create_producttypes_table', 1),
(24, '2022_11_07_180643_create_products_table', 1),
(25, '2022_11_07_181442_create_productclassifications_table', 1),
(26, '2022_11_07_181609_create_ingredientofproducts_table', 1),
(27, '2022_11_07_181717_create_evaluations_table', 1),
(28, '2022_11_07_182020_create_imageofevaluations_table', 1),
(29, '2022_11_07_182112_create_evaluationfeedbacks_table', 1),
(30, '2022_11_22_110622_create_relations_table', 1),
(31, '2022_11_22_113008_create_import_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `quantity`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, NULL, NULL),
(2, 4, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deliverytime` date DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_phone` varchar(255) DEFAULT NULL,
  `receiver_address` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `deliverytime`, `message`, `receiver_name`, `receiver_phone`, `receiver_address`, `note`, `customer_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '2022-11-08', NULL, 'Nguyễn Văn F', '0827436473', '3/2, Ninh kiều', NULL, 1, 3, '2022-11-28 06:36:25', '2022-12-02 10:55:37'),
(2, NULL, 'snvv', 'Nguyễn Văn A', '0123456789', '3/2, Ninh kiều', NULL, 1, 1, '2022-11-28 06:56:17', '2022-11-28 06:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Giao hàng', '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(2, 'Sản phẩm', '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(3, 'Chăm sóc khách hàng', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(4, 'Đóng gói', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(5, 'Giá', '2022-11-28 04:40:30', '2022-11-28 04:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `productclassifications`
--

CREATE TABLE `productclassifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `expiry` int(11) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `meaning` varchar(255) DEFAULT NULL,
  `taking_care_guide` varchar(255) DEFAULT NULL,
  `designed_by_customer` tinyint(1) DEFAULT NULL,
  `sub_image1` varchar(255) DEFAULT NULL,
  `sub_image2` varchar(255) DEFAULT NULL,
  `sub_image3` varchar(255) DEFAULT NULL,
  `producttype_id` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `quality` int(11) NOT NULL DEFAULT 5,
  `sold` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale`, `height`, `width`, `color`, `expiry`, `main_image`, `meaning`, `taking_care_guide`, `designed_by_customer`, `sub_image1`, `sub_image2`, `sub_image3`, `producttype_id`, `style_id`, `quality`, `sold`, `created_at`, `updated_at`) VALUES
(1, 'Sắc màu', 3000000, 20, 32, 23, 'Vàng', 5, 'ingredient1.png', 'Giỏ hoa được thiết kế với một màu gam khá sang trọng, ấn tượng, sử dụng hoa hồng và cẩm chướng... thích hợp tặng chúc mừng năm mới, khai trương hoặc chúc mừng sinh nhật...', 'Hàng ngày bạn nên tươi nước vào buổi sáng và chiều tối. Đối với hoa hồng được trồng tại nơi có khí hậu nóng bạn nên tưới nước nhiều hơn so với nơi có khí hậu lạnh. Có thể dùng bình tưới trực tiếp vào gốc hoa hồng và tránh làm ướt lá', 0, NULL, NULL, NULL, 1, 1, 5, 0, '2022-11-28 04:52:11', '2022-11-28 04:52:11'),
(2, 'Tím thương nhớ', 200000, 10, 32, 40, 'Trắng', 5, 'ingredient2.png', 'Hồng hồng, tím tím, chúm chím, xinh xinh... Bó hoa với màu sắc trang nhã, nhẹ nhàng thích hợp gởi tặng người thân trong các dịp lễ, sinh nhật...', NULL, 0, NULL, NULL, NULL, 1, 1, 5, 3, '2022-11-28 04:55:06', '2022-11-28 06:36:25'),
(3, 'Congrast', 250000, 10, 40, 30, 'Vàng, trắng', 3, 'ingredient3.png', 'Giỏ hoa gồm hoa hồng da và thanh liễu. Kết hợp 1 cách đơn giản nhưng không kém phần sang trọng.', NULL, 0, NULL, NULL, NULL, 1, 1, 5, 4, '2022-11-28 05:04:04', '2022-11-28 06:56:17'),
(4, 'Chuyện của nắng', 120000, 10, 30, 30, 'Vàng', 5, 'ingredient4.png', 'Giỏ hoa kết hợp nhiều loại hoa, với màu sắc rực rỡ và kết hợp hài hòa.', NULL, 0, NULL, NULL, NULL, 3, 2, 5, 0, '2022-11-28 05:07:24', '2022-11-28 05:07:24'),
(5, 'Sắc hoa hồng', 500000, 20, 20, 50, 'Đỏ hồng', 3, 'ingredient5.png', 'Sắc hoa hồng đỏ là một trong những bó hoa  cổ điển và bán chạy nhất trong thời gian gần đây. Với 18 bông hồng đỏ thắm, rực rỡ và nồng nàn, kết hợp cùng hoa baby trắng tinh khôi cùng với giấy gói mang phong cách thời trang.', NULL, 0, NULL, NULL, NULL, 7, 2, 5, 0, '2022-11-28 05:13:00', '2022-11-28 05:13:00'),
(6, 'Tình yêu ngọt ngào', 600000, 20, 32, 23, 'Hồng', 4, 'ingredient6.png', 'Một trong những Combo tuyệt vời nhất được thiết kế cho tình yêu và bán chạy nhất trong mùa Valentine đến Ngày Phụ nữ năm nay. Bó hoa Hồng được thiết kế với kiểu dáng tròn cổ điển, kết hợp hoa Baby Breath và hoa Lily Peru.', NULL, 0, NULL, NULL, NULL, 7, 1, 5, 0, '2022-11-28 05:15:34', '2022-11-28 05:15:34'),
(8, 'Sắc hồng', 400000, 10, 32, 40, 'Hồng, trắng', 4, 'ingredient8.png', 'Đây có thể nói là một giỏ hoa ấn tượng sử dụng hoa Hồng đỏ tuyệt đẹp và Lan Hồ Điệp mini sang trọng. Tuy là sản phẩm mới nhưng đây là một trong những giỏ hoa được chọn đặt nhiều nhất cho các dip sinh nhật, chúc mừng.', NULL, 0, NULL, NULL, NULL, 7, 1, 5, 0, '2022-11-28 05:23:22', '2022-11-28 05:23:22'),
(9, 'Sắc hồng 2', 400000, 10, 32, 40, 'Hồng, trắng', 4, 'ingredient9.png', 'Hoa hồng luôn là loại hoa truyền tải thông điệp tuyệt vời về tình yêu. Có một điều tuyệt vời ở hoa Hồng là dù được chọn cho tình yêu từ hàng trăm năm nay, nhưng mỗi khi xuất hiện là luôn một vẻ khác và vẫn đẹp bất tận.', NULL, 0, NULL, NULL, NULL, 5, 4, 5, 0, '2022-11-28 05:24:47', '2022-11-28 05:24:47'),
(10, 'Tươi sáng', 400000, 20, 30, 40, 'Vàng, cam', 5, 'ingredient10.png', 'Giỏ hoa kết hợp nhiều loại hoa, với màu sắc rực rỡ và kết hợp hài hòa.', NULL, 0, NULL, NULL, NULL, 2, 1, 5, 0, '2022-11-28 05:28:53', '2022-11-28 05:28:53'),
(11, 'HP ngọt ngào', 230000, 20, 20, 20, 'Trắng, hồng', 5, 'ingredient11.png', 'Hộp hoa hồng khoe sắc, chan chứa sự ấm áp của yêu thương! Đây là sự tỏ bày chân thành nhất, mãi yêu!', NULL, 0, NULL, NULL, NULL, 7, 1, 5, 0, '2022-11-28 05:33:26', '2022-11-28 05:33:26'),
(12, 'Tin yêu', 500000, 20, 10, 40, '23', 4, 'ingredient12.png', 'Giỏ hoa sử dụng kết hợp nhiều loại hoa, gam màu sáng và trang nhã, thích hợp dành tặng hầu hết các dịp, tặng khách hàng, đối tác cũng như khai trương các cửa hàng...', NULL, 0, NULL, NULL, NULL, 4, 1, 5, 0, '2022-11-28 05:36:26', '2022-11-28 05:36:26'),
(13, 'Ánh dương', 230000, 12, 30, 30, 'Vàng, trắng', 5, 'ingredient13.png', 'Đừng ngại ngùng, đừng chần chừ. Hãy trao tặng yêu thương đến người mà mình thương yêu, bàng một giỏ hoa xinh xắn với cả hoa Hồng và Hướng dương, sẽ là một lựa chọn hoàn hảo của bạn.', NULL, 0, NULL, NULL, NULL, 6, 2, 5, 0, '2022-11-28 05:39:07', '2022-11-28 05:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `producttypes`
--

CREATE TABLE `producttypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producttypes`
--

INSERT INTO `producttypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hoa sinh nhật', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(2, 'Hoa khai trương', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(3, 'Hoa chúc mừng', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(4, 'Hoa xin lỗi', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(5, 'Hoa cưới', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(6, 'Hoa tốt nghiệp', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(7, 'Hoa tình yêu', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(8, 'Hoa chia buồn', '2022-11-28 04:40:30', '2022-11-28 04:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `birthday`, `hometown`, `address`, `gender`, `phone`, `email`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn B', '1999-12-30', 'Cần Thơ', '3/2, Ninh Kiều, Cần Thơ', 1, '0283385747', 'B@gmail.com', 'staff1.png', 2, '2022-11-28 04:40:29', '2022-11-28 04:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Đã nhận', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(2, 'Đang giao', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(3, 'Đã giao', '2022-11-28 04:40:30', '2022-11-28 04:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Giỏ hoa', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(2, 'Bó hoa', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(3, 'Bình hoa', '2022-11-28 04:40:30', '2022-11-28 04:40:30'),
(4, 'Hộp hoa', '2022-11-28 04:40:30', '2022-11-28 04:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Dalat Hasfarm ', '450 Nguyên Tử Lực, P.8, Đà Lạt, Lâm Đồng', '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(2, 'DalatFlower ', 'Ngã Ba Dốc Trời, Làng hoa Vạn Thành, Thành phố Đà Lạt', '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(3, 'Winsyfarm ', '73/35 Nguyễn Hữu Cầu - Thái Phiên - Phường 12 Đà Lạt, Lâm Đồng', '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(4, 'Đà Lạt xanh ', '33B Trần Khánh Dư, Phường 8, TP Đà Lạt', '2022-11-28 04:40:29', '2022-11-28 04:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `staffs_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `staffs_id`, `created_at`, `updated_at`) VALUES
(1, 'adminaccount', '$2y$10$E6szQDLV16KDUI/FsU1x1eYddkFPlbgpuEpnyXUKII6Hldt8z0bjG', NULL, NULL, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(2, 'staffaccount1', '$2y$10$.Dj/mRAf/50tgzL77gvFZ.PAqO8dd8AOOvYYejqC1KYpIxYFZRj4O', NULL, NULL, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(3, 'customeraccount1', '$2y$10$6sK54z4GfYCDs.wXTL4TmOwCPYe8SeM2B46TZPF2I0C11PslzbhUa', NULL, NULL, '2022-11-28 04:40:29', '2022-11-28 04:40:29'),
(4, 'customeraccount2', '$2y$10$d4YSZpn9pRG9bmgEXLEwsuLt7jqHDa5j.oDUkGyC89xJguM0hfHFi', NULL, NULL, '2022-11-28 04:40:29', '2022-11-28 04:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `workplaces`
--

CREATE TABLE `workplaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluationfeedbacks`
--
ALTER TABLE `evaluationfeedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imageofevaluations`
--
ALTER TABLE `imageofevaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_coupons`
--
ALTER TABLE `import_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_details`
--
ALTER TABLE `import_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredientofproducts`
--
ALTER TABLE `ingredientofproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instocks`
--
ALTER TABLE `instocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productclassifications`
--
ALTER TABLE `productclassifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttypes`
--
ALTER TABLE `producttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workplaces`
--
ALTER TABLE `workplaces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluationfeedbacks`
--
ALTER TABLE `evaluationfeedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imageofevaluations`
--
ALTER TABLE `imageofevaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `import_coupons`
--
ALTER TABLE `import_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `import_details`
--
ALTER TABLE `import_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ingredientofproducts`
--
ALTER TABLE `ingredientofproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `instocks`
--
ALTER TABLE `instocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productclassifications`
--
ALTER TABLE `productclassifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `producttypes`
--
ALTER TABLE `producttypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workplaces`
--
ALTER TABLE `workplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
