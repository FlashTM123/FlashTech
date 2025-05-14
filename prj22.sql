-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 11:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prj2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `original_price` decimal(8,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `promotional_price` decimal(8,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `brand_id`, `type`, `color`, `original_price`, `discount`, `promotional_price`, `quantity`, `status`, `image`, `description`) VALUES
(4, 'Lót chuột Logitech Studio Series 20 x 23 cm', 28, 'Lót chuột', NULL, 299000, 10, 269100, 1, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tam-lot-chuot-logitech-studio-series-20-23-cm-6.png', NULL),
(5, 'Chuột không dây Logitech MX Master 3S', 28, 'Chuột không dây', NULL, 2990000, 32, 2250000, 1, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/f/sfeftet466554.jpg', NULL),
(6, 'Razer BlackWidow V3', 56, 'Bàn phím cơ', NULL, 2990000, 15, 2541500, 15, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/7/_/7_15_63.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `updated_at`, `created_at`) VALUES
(20, 'Admin123', 'Admin@gmail.com', '$2y$12$9mUKqssa2cpHXa8uhtUGxeOI/gVQVU47QbaMgrNyHtJh6PskDTQpm', '0123456789', '2025-04-21 13:16:42', '2025-04-21 13:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `category`) VALUES
(1, 'Lenovo', 'Laptop'),
(2, 'Dell', 'Laptop'),
(4, 'Asus', 'Laptop'),
(11, 'Kingston', 'Component'),
(14, 'Apple', 'Laptop'),
(28, 'Logitech', 'Accessories'),
(29, 'Gigabyte', 'Laptop'),
(30, 'Hp', 'Laptop'),
(31, 'Samsung', 'Component'),
(32, 'Western Digital', 'Component'),
(33, 'Seagate', 'Component'),
(34, 'Crucial', 'Component'),
(35, 'Toshiba', 'Component'),
(36, 'ADATA', 'Component'),
(37, 'Intel', 'Component'),
(38, 'SanDisk', 'Component'),
(39, 'HGST', 'Component'),
(40, 'TeamGroup', 'Component'),
(41, 'Corsair', 'Component'),
(42, 'G.Skill', 'Component'),
(43, 'Acer', 'Laptop'),
(44, 'MSI', 'Laptop'),
(45, 'Razer', 'Laptop'),
(46, 'Microsoft', 'Laptop'),
(47, 'LG', 'Laptop'),
(48, 'Samsung', 'Laptop'),
(49, 'Huawei', 'Laptop'),
(51, 'Xiaomi', 'Laptop'),
(53, 'Blala', 'Laptop'),
(54, 'AMD', 'Component'),
(55, 'Gigabyte', 'Component'),
(56, 'Razer', 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `original_price` decimal(8,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `promotional_price` decimal(8,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `name`, `brand_id`, `type`, `capacity`, `original_price`, `discount`, `promotional_price`, `quantity`, `status`, `image`, `description`) VALUES
(10, 'RAM Laptop Kingston 1.2V 8GB 3200MHz', 11, 'RAM', '8GB', 990000, 40, 420000, 1, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/_/d_p.png', NULL),
(11, 'Ổ cứng SSD Kingston NV3 PCIe 4.0 NVMe 1TB', 11, 'SSD NVMe', '1 TB', 2490000, 32, 1690000, 10, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/t/e/text_ng_n_6__2_129.png', NULL),
(12, 'Samsung SSD 980', 31, 'SSD', '1 TB', 2800000, 10, 2520000, 50, NULL, 'https://bizweb.dktcdn.net/thumb/grande/100/329/122/products/mz-v8v500-01.jpg?v=1717779630357', NULL),
(13, 'Kingston A400', 11, 'SSD', '480GB', 1200000, 5, 1140000, 75, NULL, 'https://anphat.com.vn/media/product/22502_kingston_a400_240gb_sa400s37240g_an_phat_1.jpg', NULL),
(14, 'Crucial MX500', 34, 'SSD', '500GB', 1950000, 8, 1794000, 40, NULL, 'https://bizweb.dktcdn.net/100/329/122/products/mx500-01-c320794a-f7f4-4502-b037-396d3cc9414e.jpg?v=1638368135987', NULL),
(15, 'ADATA SU800', 36, 'SSD', '512GB', 1700000, 7, 1581000, 55, NULL, 'https://webapi3.adata.com/storage/product/23_p_su800_01.png', NULL),
(16, 'Corsair Vengeance LPX', 41, 'RAM DDR4', '16GB', 1600000, 10, 1440000, 70, NULL, 'https://bizweb.dktcdn.net/thumb/grande/100/329/122/products/ram-pc-corsair-vengeance-lpx-8gb-3200mhz-ddr4-cmk16gx4m2e3200c16-8-26cb337e-4122-4bb7-bc55-54f38f4f086a-3b650c5f-51f8-4890-8951-95206ff25145.jpg?v=1741142438093', NULL),
(17, 'G.Skill Ripjaws V', 42, 'RAM DDR4', '8GB', 850000, 5, 807500, 85, NULL, 'https://product.hstatic.net/200000722513/product/8g-ddr4-1x8g-2800-g-skill-ripjaws-v-1_a20db78250bf48b58c859aa352a414d3_ce6d20390fbd4df0a905f3ecb37b3944_1024x1024.jpg', NULL),
(18, 'Kingston Fury Beas', 11, 'RAM DDR4', '16GB', 1650000, 8, 1518000, 60, NULL, 'https://anphat.com.vn/media/product/35571_ktc_product_memory_beast_ddr4_single_1_lg.jpg', NULL),
(19, 'Team T-Force Vulcan Z', 40, 'RAM DDR4', '16GB', 1500000, 9, 1365000, 45, NULL, 'https://anphat.com.vn/media/product/40611_ram_team_vulcan_z_16gb_ddr4_bus_3200_tlzrd416g3200hc16f01_ud_d4__m__u_________1_.jpg', NULL),
(20, 'Samsung 970 EVO Plus', 48, 'SSD', '1TB', 3290000, 5, 3125500, 20, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/8/_/8_12_82.jpg', NULL),
(21, 'Western Digital Blue 1TB', 32, 'HDD', '1TB', 1190000, 10, 1071000, 50, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/t/_/t_i_xu_ng_-_2023-01-28t224216.608.png', NULL),
(22, 'Corsair Vengeance LPX 32GB', 41, 'RAM DDR4', '32GB', 2990000, 7, 2781700, 15, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/r/a/ram-corsair-vengeance-rgb-rs-ddr4-3200mhz-32gb_2_.png', NULL),
(23, 'Intel Core i5-13400F', 37, 'CPU', '10 Cores / 16 Threads', 4290000, 5, 4075500, 10, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_-_2023-02-08t210655.677_1.png', NULL),
(24, 'AMD Ryzen 5 5600X', 54, 'CPU', '6 Cores / 12 Threads', 7890000, 6, 6690000, 12, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_-_2023-01-02t221507.270_2.png', NULL),
(25, 'Intel Core i7-12700K', 37, 'CPU', '12 cores / 20 threads', 9190000, 7, 8546700, 25, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/p/cpu-intel-core-i7-12700k_.jpg', NULL),
(26, 'Seagate Barracuda 2TB HDD 7200RPM', 33, 'HDD', '2TB', 1390000, 10, 1251000, 35, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0002_screenshot_3.jpg', NULL),
(27, 'GIGABYTE B660M DS3H DDR4', 4, 'Mainboard', 'LGA 1700 / mATX', 2990000, 6, 2810600, 20, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/3/_/3_202.jpg', NULL),
(29, 'Corsair CV550 550W 80 Plus Bronze', 41, 'PSU', '550W', 1150000, 4, 1104000, 30, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_-_2023-01-04t235815.408.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `image`, `date_of_birth`, `gender`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(3, 'A hứ', '1742960322.jpg', '1991-11-11', 'male', 'hu@gmail.com', '$2y$12$QX3QW5X.tAq9igLXioObfut2ZEFqwPKHdM5TkuINpzGkxNuWp8rRG', '0112345678', 'Hanoi', '2025-03-25 20:38:43', '2025-03-25 20:38:43'),
(4, 'Chào Văn Nghé', '1743601890.jpg', '1999-11-11', 'female', 'ngao1@gmail.com', '$2y$12$VTphnQshbLDoM81FSHs42e.9Bbgxi.06J2RefmTz8IT5Ko3WeU/IC', '0323456543', 'Hạ Long', '2025-04-01 19:21:07', '2025-04-02 06:51:30');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `vga` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `original_price` decimal(8,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `promotional_price` decimal(8,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `name`, `brand_id`, `color`, `cpu`, `ram`, `vga`, `storage`, `original_price`, `discount`, `promotional_price`, `quantity`, `status`, `image`, `description`) VALUES
(38, 'Laptop Gigabyte G5 KF-E3PH333SH', 29, NULL, 'Intel Core i5-12500H', '8GB DDR4', 'NVidia Geforce RTX 4060 8GB GDDR6 + Intel Iris Xe Graphics', '512GB SSD M.2 PCIE', 25990000, 19, 20990000, 11, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/t/e/text_ng_n_12__5_17.png', NULL),
(39, 'Laptop HP Gaming Victus 15-FA0031DX 6503849', 30, NULL, 'Intel Core i5-12450H', '8GB DDR4', 'NVIDIA GeForce GTX 1650', '512GB SSD NVMe', 18500000, 20, 16790000, 0, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-hp-gaming-victus-15-fa0031dx-6503849-0.jpg', NULL),
(40, 'Asus ROG Strix G15', 4, NULL, 'AMD Ryzen 7 6800H', '16GB DDR5', 'NVIDIA RTX 3060', '512GB SSD NVMe', 35990000, 10, 32391000, 25, NULL, 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6466/6466550ld.jpg', NULL),
(41, 'MacBook Pro 14', 14, NULL, 'Apple M1 Pro', '16GB LPDDR5', 'Apple GPU', '1TB SSD', 48990000, 5, 46540500, 12, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_1__6_138.png', NULL),
(42, 'HP Pavilion x360', 30, NULL, 'Intel i5-1135G7', '8GB DDR4', 'Intel Iris Xe Graphic', '256GB SSD', 18990000, 15, 16141500, 40, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-hp-pavilion-x360-14-1_2_1.jpg', NULL),
(43, 'Dell XPS 13 Plus', 2, NULL, 'Intel Core i7-1360P', '16GB LPDDR5', 'Intel Iris Xe Graphic', '1TB SSD', 49990000, 12, 43991200, 15, NULL, 'https://imagor.owtg.one/unsafe/fit-in/https://d28jzcg6y4v9j1.cloudfront.net/media/core/products/2023/5/8/dell-xps-13-plus-9320-thinkpro.jpg', NULL),
(44, 'Lenovo IdeaPad Slim 5', 1, NULL, 'AMD Ryzen 5 7530U', '16GB DDR4', 'AMD Radeon Graphics', '512GB SSD NVMe', 18990000, 10, 17091000, 30, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/t/e/text_ng_n_5__3_21.png', NULL),
(45, 'Acer Nitro 5 AN515', 43, NULL, 'Intel Core i7-12700H', '16GB DDR4', 'NVIDIA GeForce RTX 3050', '512GB SSD', 27990000, 8, 25750800, 0, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/8/28_1_17.jpg', NULL),
(48, 'Acer Aspire 5 A515', 43, NULL, 'Intel Core i5-1235U', '8GB DDR4', 'Intel Iris Xe Graphics', '512GB SSD', 18999000, 10, 17099100, 0, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0002_56294_a515_56__5.jpg', NULL),
(49, 'Asus ROG Zephyrus G14', 4, NULL, 'AMD Ryzen 9 6900HS', '32GB DDR5', 'NVIDIA GeForce RTX 3060', '1TB SSD', 30400000, 21, 23990000, 0, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0006_g14-2021-4_compressed.jpg', NULL),
(50, 'Dell Inspiron 15 3525', 2, NULL, 'AMD Ryzen 5 7535U', '8GB DDR4', 'AMD Radeon Graphics', '512GB SSD', 17990000, 10, 16999000, 3, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_5_63.png', NULL),
(51, 'HP Pavilion Gaming 15', 30, NULL, 'Intel Core i5-12450H', '16GB DDR4', 'NVIDIA GeForce GTX 1650', '512GB SSD', 23990000, 5, 22790800, 3, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/l/a/laptop_hp_pavilion_gaming_15_ec1054ax_1n1h6pa_0003_layer_2.jpg', NULL),
(52, 'Lenovo IdeaPad Gaming 3', 1, NULL, 'AMD Ryzen 5 5600H', '8GB DDR4', 'NVIDIA GeForce GTX 1650', '512GB SSD', 22490000, 24, 17990000, 3, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/0/10_9_13.jpg', NULL),
(53, 'MSI GF63 Thin', 44, NULL, 'Intel Core i5-12450H', '8GB DDR4', 'NVIDIA GeForce GTX 3050', '512GB SSD', 18990000, 31, 15490000, 10, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop_msi.png', NULL),
(54, 'Razer Blade 15', 45, NULL, 'Intel Core i7-12800H', '16GB DDR5', 'NVIDIA GeForce RTX 3070', '1TB SSD', 26990000, NULL, NULL, 34, NULL, 'https://imagor.owtg.one/unsafe/fit-in/880x495/https://d28jzcg6y4v9j1.cloudfront.net/backend/uploads/product/color_images/2020/7/30/razer-blade-15-advanced-Blade15A01NS-B7l.jpg', NULL),
(55, 'Apple MacBook Air M2', 14, NULL, 'Apple M2', '8GB Unified Memory', 'Apple GPU', '256GB SSD', 24990000, 45, 19990000, 0, NULL, 'https://cdn2.cellphones.com.vn/358x/media/catalog/product/m/a/macbook_air_m2_2_3.jpg', NULL),
(56, 'Microsoft Surface Laptop 4', 46, NULL, 'AMD Ryzen 5 4680U', '8GB LPDDR4x', 'AMD Radeon Graphics', '256GB SSD', 29990000, 50, 24990000, 5, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/l/a/laptop-surface-4-01.jpg', NULL),
(57, 'LG Gram 17', 47, NULL, 'Intel Core i7-1165G7', '16GB LPDDR4x', 'Intel Iris Xe Graphics', '1TB SSD', 54900000, 50, 31990000, 2, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-lg-gram-17-2021-7.jpg', NULL),
(58, 'Asus TUF Gaming A15 FA506', 4, NULL, 'AMD Ryzen 5 5600H', '8GB DDR4', 'NVIDIA GeForce GTX 1650', '512GB SSD', 26990000, 4, 25990000, 0, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-asus-tuf-gaming-a15-ryzen-7_5_.jpg', NULL),
(59, 'Acer Swift 3 SF314', 43, NULL, 'Intel Core i5-1240P', '16GB LPDDR4X', 'Intel Iris Xe Graphics', '512GB SSD', 18990000, 10, 17091000, 18, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_5__3_16.png', NULL),
(60, 'ASUS Vivobook 14X OLED', 4, NULL, 'AMD Ryzen 7 5800H', '16GB DDR4', 'AMD Radeon Graphics', '512GB SSD', 20990000, 8, 19310800, 14, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_10__3_23.png', NULL),
(61, 'HP 240 G9', 30, NULL, 'Intel Core i5-1215U', '8GB DDR4', 'Intel UHD Graphics', '256GB SSD', 10990000, 5, 10440500, 25, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_10__4_155.png', NULL),
(65, 'Laptop Lenovo Legion 5 Pro 16ACH6H 82JQ001VVN', 1, NULL, 'AMD Ryzen 7 5800H', '16 GB DDR4', 'NVIDIA GeForce RTX 3060 6GB GDDR6', '512GB SSD M.2', 43690000, 10, 41119000, 2, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/l/a/laptop-lenovo-legion-5-pro-16ach6h-82jq001vvn-1.jpg', NULL);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_19_042859_create_admins_table', 1),
(5, '2025_02_21_114617_create_admins_table', 2),
(10, '2025_03_19_020716_create_orders_table', 4),
(19, '2025_04_09_014255_add_google_id_to_users_table', 7),
(22, '2025_04_25_115952_add_relationship_columns_to_products_table', 8),
(24, '2025_03_20_115542_create_products_table', 9),
(26, '2025_03_20_124619_create_orderdetails_table', 10),
(27, '2025_05_06_035044_add_description_to_laptops_table', 11),
(28, '2025_05_06_114437_add_description_to_components_table', 12),
(29, '2025_05_06_120507_add_description_to_accessories_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(51, 2, 1, 20990000, '2025-04-26 20:09:15', '2025-04-26 20:09:15'),
(52, 8, 1, 17091000, '2025-04-27 04:15:53', '2025-04-27 04:15:53'),
(53, 2, 1, 20990000, '2025-04-27 19:42:40', '2025-04-27 19:42:40'),
(54, 2, 10, 20990000, '2025-04-27 19:55:13', '2025-04-27 19:55:13'),
(55, 2, 1, 20990000, '2025-04-27 23:50:10', '2025-04-27 23:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Processing','Completed','Cancel','On delivery') NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `admin_id`, `payment_method`, `address`, `status`, `total_price`, `updated_at`, `created_at`) VALUES
(41, 4, NULL, 'cod', 'Hanoi', 'Pending', 41220000.00, '2025-04-25 06:26:03', '2025-04-25 06:26:03'),
(42, 4, NULL, 'cod', 'Hanoi', 'Pending', 41220000.00, '2025-04-25 06:30:39', '2025-04-25 06:30:39'),
(43, 4, 20, 'cod', 'Hanoi', 'On delivery', 41220000.00, '2025-04-25 06:38:40', '2025-04-25 06:38:25'),
(44, 4, 20, 'cod', 'Hanoi', 'On delivery', 18020000.00, '2025-04-25 19:50:35', '2025-04-25 19:50:23'),
(45, 4, 20, 'cod', 'Hanoi', 'On delivery', 18020000.00, '2025-04-26 19:04:29', '2025-04-26 19:00:56'),
(49, 4, 20, 'cod', 'Hanoi', 'On delivery', 27020000.00, '2025-04-26 19:59:31', '2025-04-26 19:57:27'),
(50, 4, 20, 'cod', 'Hanoi', 'On delivery', 27020000.00, '2025-04-26 19:59:42', '2025-04-26 19:59:06'),
(51, 4, NULL, 'cod', 'Hanoi', 'Pending', 48010000.00, '2025-04-26 20:09:15', '2025-04-26 20:09:15'),
(52, 4, 20, 'cod', 'Hanoi', 'On delivery', 17121000.00, '2025-04-27 04:16:09', '2025-04-27 04:15:53'),
(53, 4, 20, 'cod', 'Hanoi', 'On delivery', 21020000.00, '2025-04-27 19:43:02', '2025-04-27 19:42:40'),
(54, 4, NULL, 'cod', 'Hanoi', 'Pending', 209930000.00, '2025-04-27 19:55:13', '2025-04-27 19:55:13'),
(55, 4, 20, 'cod', 'Hanoi', 'On delivery', 21020000.00, '2025-04-27 23:50:24', '2025-04-27 23:50:10');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `laptop_id` int(11) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `accessories_id` int(11) DEFAULT NULL,
  `description` varchar(5000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `laptop_id`, `component_id`, `accessories_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 38, NULL, NULL, '​Laptop Gigabyte G5 KF-E3PH333SH là một mẫu máy tính xách tay gaming tầm trung, được thiết kế để đáp ứng nhu cầu chơi game và làm việc đồ họa với hiệu năng mạnh mẽ và thiết kế hiện đại.​\n\n🎮 Hiệu năng mạnh mẽ cho trải nghiệm gaming mượt mà\nMáy được trang bị bộ vi xử lý Intel Core i5-12500H thế hệ thứ 12, kết hợp với card đồ họa NVIDIA GeForce RTX 4060 8GB GDDR6, mang lại khả năng xử lý đồ họa ấn tượng và hiệu suất chơi game cao. Với RAM 8GB DDR4 (có thể nâng cấp tối đa 64GB) và ổ cứng SSD Gen4 512GB, máy đảm bảo tốc độ khởi động nhanh và khả năng lưu trữ đủ cho các tựa game và ứng dụng nặng. ​\nDataBlitz\n\n🖥️ Màn hình sắc nét, tần số quét cao\nGigabyte G5 KF-E3PH333SH sở hữu màn hình 15.6 inch Full HD (1920 x 1080) với tần số quét 144Hz, mang đến hình ảnh mượt mà và sắc nét, đặc biệt hữu ích trong các trò chơi yêu cầu phản ứng nhanh. ​\n\n🌬️ Hệ thống tản nhiệt hiệu quả\nMáy được trang bị hệ thống tản nhiệt WINDFORCE Cooling System, giúp duy trì nhiệt độ ổn định trong quá trình sử dụng, đảm bảo hiệu suất hoạt động tối ưu ngay cả khi chơi game hay làm việc nặng. ​\nGIGABYTE Global\n\n🔌 Kết nối đa dạng và hiện đại\nGigabyte G5 KF-E3PH333SH hỗ trợ các cổng kết nối hiện đại như Thunderbolt 4, HDMI, USB 3.2, cùng với kết nối không dây Wi-Fi 6 và Bluetooth 5.2, đáp ứng đầy đủ nhu cầu kết nối ngoại vi và mạng không dây. ​\n\n🎧 Âm thanh sống động\nMáy tích hợp công nghệ âm thanh DTS:X Ultra, mang đến trải nghiệm âm thanh vòm sống động, giúp người dùng đắm chìm trong thế giới game và giải trí. ​\n\n', NULL, NULL),
(3, 39, NULL, NULL, '​Laptop HP Gaming Victus 15-FA0031DX (6503849) là một lựa chọn hấp dẫn trong phân khúc laptop gaming tầm trung, phù hợp cho người dùng mới bắt đầu chơi game hoặc cần một thiết bị đa năng cho học tập và làm việc.​\n\n🎮 Hiệu năng ổn định cho nhu cầu cơ bản\nMáy được trang bị vi xử lý Intel Core i5-12450H thế hệ thứ 12 (8 nhân, 12 luồng), kết hợp với card đồ họa NVIDIA GeForce GTX 1650 4GB GDDR5. Cấu hình này đủ mạnh để xử lý các tựa game phổ biến như CS:GO, Valorant, Liên Minh Huyền Thoại ở mức thiết lập trung bình đến cao, cũng như đáp ứng tốt các tác vụ đồ họa nhẹ và công việc văn phòng.​\n\n🖥️ Màn hình mượt mà, trải nghiệm hình ảnh tốt\nHP Victus 15-FA0031DX sở hữu màn hình 15.6 inch Full HD (1920 x 1080) với tần số quét 144Hz, mang đến trải nghiệm hình ảnh mượt mà và sắc nét, đặc biệt hữu ích trong các trò chơi yêu cầu phản ứng nhanh. Tấm nền IPS giúp góc nhìn rộng và màu sắc trung thực, hỗ trợ tốt cho cả giải trí và làm việc.​\n\n💾 Bộ nhớ và lưu trữ đáp ứng nhu cầu sử dụng\nMáy đi kèm với 8GB RAM DDR4-3200MHz và ổ cứng SSD 512GB PCIe NVMe, đảm bảo khả năng đa nhiệm mượt mà và thời gian khởi động nhanh chóng. Người dùng có thể nâng cấp RAM và lưu trữ nếu cần thiết để đáp ứng nhu cầu sử dụng cao hơn trong tương lai.​\n\n🔈 Âm thanh sống động, kết nối đa dạng\nHệ thống âm thanh được tinh chỉnh bởi B&O với loa kép, mang đến trải nghiệm âm thanh rõ ràng và sống động. Máy hỗ trợ các cổng kết nối phổ biến như USB Type-A, HDMI, jack tai nghe 3.5mm và Wi-Fi 6, đảm bảo khả năng kết nối linh hoạt với các thiết bị ngoại vi và mạng không dây.​\n\n🧊 Thiết kế hiện đại, tản nhiệt hiệu quả\nThiết kế của HP Victus 15-FA0031DX mang phong cách hiện đại với tông màu đen Mica Silver, phù hợp với nhiều đối tượng người dùng. Hệ thống tản nhiệt được cải tiến giúp máy hoạt động ổn định trong thời gian dài mà không gặp hiện tượng quá nhiệt.​\n\n', NULL, NULL),
(4, 40, NULL, NULL, '​ASUS ROG Strix G15 là dòng laptop gaming cao cấp của ASUS, nổi bật với thiết kế mạnh mẽ, hiệu năng ấn tượng và hệ thống tản nhiệt tiên tiến, đáp ứng tốt nhu cầu chơi game và làm việc đồ họa chuyên sâu.​\n\n🎮 Hiệu năng mạnh mẽ\nROG Strix G15 được trang bị bộ vi xử lý AMD Ryzen™ 9 6900HX, kết hợp với card đồ họa NVIDIA® GeForce RTX™ 3080 Ti Laptop GPU, mang lại hiệu suất vượt trội cho các tựa game AAA và công việc đòi hỏi xử lý đồ họa cao. ​\n@ROG\n+2\n@ROG\n+2\n@ROG\n+2\n\n🖥️ Màn hình chất lượng cao\nMáy sở hữu màn hình 15.6 inch với các tùy chọn độ phân giải FHD 300Hz/3ms hoặc QHD 165Hz/3ms, sử dụng tấm nền IPS-level chống chói, hỗ trợ Adaptive-Sync, mang đến trải nghiệm hình ảnh mượt mà và sắc nét. ​\n@ROG\n+2\n@ROG\n+2\n@ROG\n+2\n\n❄️ Hệ thống tản nhiệt tiên tiến\nROG Strix G15 được trang bị hệ thống tản nhiệt ROG Intelligent Cooling™ với keo tản nhiệt kim loại lỏng và quạt Arc Flow 84 cánh, giúp duy trì hiệu suất ổn định và giảm thiểu tiếng ồn trong quá trình sử dụng. ​\n@ROG\n\n🔌 Kết nối đa dạng\nMáy hỗ trợ các cổng kết nối hiện đại như USB Type-C, HDMI, Wi-Fi 6E và Bluetooth 5.2, đảm bảo khả năng kết nối linh hoạt với các thiết bị ngoại vi và mạng không dây.​\n\n💡 Thiết kế đậm chất gaming\nROG Strix G15 có thiết kế mạnh mẽ với các đường nét sắc sảo, hệ thống đèn LED RGB tùy chỉnh và bàn phím được tối ưu cho game thủ, mang lại trải nghiệm sử dụng đầy cảm hứng.​\n\n', NULL, NULL),
(5, 41, NULL, NULL, '✨ Thiết kế cao cấp, hiện đại\nMacBook Pro 14 sở hữu thiết kế nhôm nguyên khối cực kỳ cao cấp, các cạnh bo tròn mềm mại và mỏng nhẹ nhưng vẫn rất chắc chắn. Dù chỉ nặng khoảng 1.6kg, máy vẫn mang lại cảm giác \"đầm tay\" và vô cùng bền bỉ, đúng phong cách Apple. Các viền màn hình được làm mỏng tối đa, giúp tổng thể gọn gàng hơn nhiều so với các thế hệ trước.\n\n🖥️ Màn hình Liquid Retina XDR tuyệt đẹp\nMacBook Pro 14 sử dụng màn hình Liquid Retina XDR 14.2 inch, độ phân giải 3024 x 1964 pixel, hỗ trợ ProMotion (tần số quét 120Hz) và độ sáng lên tới 1600 nits. Công nghệ mini-LED cho màu đen sâu hơn, độ tương phản cao hơn, rất lý tưởng cho công việc chỉnh sửa ảnh, video chuyên nghiệp hoặc trải nghiệm giải trí đỉnh cao.\n\n⚡ Hiệu năng cực khủng\nMáy được trang bị dòng chip Apple Silicon (M1 Pro, M1 Max, hoặc thế hệ mới như M3 Pro, M3 Max tùy phiên bản năm bạn hỏi), mang lại hiệu năng CPU và GPU vượt trội. Với khả năng xử lý đồ họa mạnh, chạy ứng dụng nặng và đa nhiệm mượt mà, MacBook Pro 14 dễ dàng đáp ứng các công việc chuyên sâu như dựng phim 8K, render 3D, lập trình, AI machine learning, v.v.\n\n🔋 Thời lượng pin ấn tượng\nDù hiệu năng rất mạnh, MacBook Pro 14 vẫn duy trì thời lượng pin lên đến 17 tiếng khi lướt web hoặc 11 tiếng xem video liên tục. Đây là điểm cực kỳ mạnh so với laptop Windows cùng phân khúc hiệu năng.\n\n🔊 Âm thanh và camera tuyệt vời\nHệ thống 6 loa, hỗ trợ Spatial Audio, mang đến âm thanh vòm sống động.\n\nWebcam 1080p, chất lượng hình ảnh sắc nét hơn nhiều so với thế hệ cũ.\n\n3 micro chất lượng phòng thu, hỗ trợ thu âm và gọi video cực kỳ rõ ràng.\n\n🛠️ Kết nối đầy đủ và tiện dụng\nMacBook Pro 14 được trang bị:\n\n3 cổng Thunderbolt 4 (USB-C)\n\n1 cổng HDMI\n\n1 khe cắm thẻ nhớ SDXC\n\n1 cổng sạc MagSafe 3\n\nJack tai nghe 3.5mm hỗ trợ tai nghe trở kháng cao\n\nKhông còn thiếu hụt cổng kết nối như MacBook Pro trước kia!', NULL, NULL),
(6, 42, NULL, NULL, '​HP Pavilion x360 là dòng laptop 2-trong-1 linh hoạt của HP, nổi bật với thiết kế xoay gập 360 độ, màn hình cảm ứng nhạy bén và hiệu năng đáp ứng tốt nhu cầu học tập, làm việc và giải trí.​\n\n\n💻 Thiết kế linh hoạt, hiện đại\nHP Pavilion x360 sở hữu bản lề xoay gập 360 độ, cho phép người dùng dễ dàng chuyển đổi giữa các chế độ sử dụng như laptop, lều, trình chiếu hoặc máy tính bảng. Thiết kế này mang đến sự tiện lợi tối đa trong nhiều tình huống sử dụng khác nhau. Với trọng lượng nhẹ khoảng 1.51 kg và kích thước nhỏ gọn, máy dễ dàng mang theo bên mình. ​\n\n\n🖥️ Màn hình cảm ứng sắc nét\nMáy được trang bị màn hình 14 inch Full HD (1920 x 1080) với công nghệ IPS, mang lại góc nhìn rộng và màu sắc chân thực. Màn hình cảm ứng đa điểm nhạy bén, hỗ trợ thao tác chạm mượt mà và chính xác, phù hợp cho cả công việc và giải trí. ​\n\n\n⚙️ Hiệu năng ổn định\nHP Pavilion x360 sử dụng bộ vi xử lý Intel Core i3-1215U thế hệ thứ 12, kết hợp với RAM 8GB DDR4 và ổ cứng SSD 256GB PCIe NVMe, đảm bảo khả năng xử lý mượt mà các tác vụ văn phòng, học tập và giải trí hàng ngày. ​\n\n🔌 Cổng kết nối đa dạng\nMáy được trang bị đầy đủ các cổng kết nối cần thiết, bao gồm:​\n\n1 cổng USB Type-C® SuperSpeed 10Gbps (hỗ trợ Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\n\n2 cổng USB Type-A SuperSpeed 5Gbps\n\n1 cổng HDMI 2.1\n\n1 jack tai nghe/microphone combo\n\n1 khe đọc thẻ nhớ microSD​', NULL, NULL),
(7, 43, NULL, NULL, '​Dell XPS 13 Plus 9320 là mẫu laptop cao cấp của Dell, nổi bật với thiết kế tối giản, màn hình sắc nét và hiệu năng mạnh mẽ, phù hợp cho người dùng yêu cầu cao về thẩm mỹ và hiệu suất.​\n\n✨ Thiết kế hiện đại, tối giản\nXPS 13 Plus sở hữu thiết kế nhôm nguyên khối cao cấp với các đường nét tinh tế. Bàn phím tràn viền, phím cảm ứng chức năng và touchpad ẩn dưới mặt kính tạo nên vẻ ngoài liền mạch và hiện đại. Trọng lượng nhẹ khoảng 1.26 kg, thuận tiện cho việc di chuyển. ​\n\n\n🖥️ Màn hình OLED 3.5K sống động\nMáy được trang bị màn hình 13.4 inch OLED độ phân giải 3.5K (3456 x 2160), hỗ trợ cảm ứng, độ sáng cao và dải màu rộng 100% sRGB, mang đến hình ảnh sắc nét và màu sắc chân thực, lý tưởng cho công việc đồ họa và giải trí. ​\n\n\n⚙️ Hiệu năng mạnh mẽ\nĐược trang bị vi xử lý Intel Core i7-1360P, RAM 32GB LPDDR5 và ổ cứng SSD 1TB PCIe NVMe, XPS 13 Plus đáp ứng tốt các tác vụ nặng như chỉnh sửa video, lập trình và đa nhiệm. Card đồ họa tích hợp Intel Iris Xe Graphics hỗ trợ xử lý đồ họa mượt mà. ​\n\n\n🔋 Thời lượng pin và kết nối\nPin 3-cell 55 Whr cho thời lượng sử dụng trung bình, phù hợp cho công việc hàng ngày. Máy hỗ trợ 2 cổng Thunderbolt 4 (USB-C), tuy nhiên không có cổng USB-A hoặc jack tai nghe 3.5mm, người dùng có thể cần sử dụng bộ chuyển đổi khi cần thiết. ​\n\n                               ', NULL, NULL),
(8, 44, NULL, NULL, '​Lenovo IdeaPad Slim 5 là dòng laptop tầm trung của Lenovo, nổi bật với thiết kế hiện đại, hiệu năng ổn định và giá cả hợp lý, phù hợp cho sinh viên, nhân viên văn phòng và người dùng phổ thông.​\n\n💻 Thiết kế thanh lịch, bền bỉ\nIdeaPad Slim 5 sở hữu thiết kế mỏng nhẹ với vỏ nhôm chắc chắn, mang đến vẻ ngoài sang trọng và độ bền cao. Trọng lượng khoảng 1.4 kg giúp người dùng dễ dàng mang theo khi di chuyển. Bàn phím có hành trình phím tốt, hỗ trợ đèn nền, tạo cảm giác thoải mái khi gõ. ​\n\n\n🖥️ Màn hình sắc nét, đa dạng tùy chọn\nMáy được trang bị màn hình 14 hoặc 16 inch với độ phân giải từ Full HD (1920 x 1200) đến 2K, sử dụng tấm nền IPS cho góc nhìn rộng và màu sắc trung thực. Một số phiên bản còn hỗ trợ cảm ứng, thuận tiện cho các thao tác trực tiếp trên màn hình. ​\n\n\n⚙️ Hiệu năng ổn định\nIdeaPad Slim 5 sử dụng các bộ vi xử lý Intel Core i5/i7 hoặc AMD Ryzen 5/7 thế hệ mới, kết hợp với RAM từ 8GB đến 16GB và ổ cứng SSD dung lượng lớn, đáp ứng tốt các nhu cầu học tập, làm việc văn phòng và giải trí nhẹ nhàng. ​\n\n🔋 Thời lượng pin ấn tượng\nVới viên pin dung lượng lớn và công nghệ sạc nhanh, máy có thể hoạt động liên tục trong nhiều giờ và sạc nhanh trong thời gian ngắn, giúp người dùng yên tâm sử dụng trong cả ngày dài. ​\n\n🔌 Cổng kết nối đầy đủ\nIdeaPad Slim 5 được trang bị đa dạng cổng kết nối như USB-A, USB-C, HDMI, jack tai nghe 3.5mm và khe đọc thẻ nhớ, đáp ứng tốt nhu cầu kết nối với các thiết bị ngoại vi. ​\n\n', NULL, NULL),
(9, 45, NULL, NULL, '​Acer Nitro 5 AN515 là dòng laptop gaming tầm trung nổi bật của Acer, được thiết kế để đáp ứng nhu cầu chơi game và làm việc hiệu quả với mức giá hợp lý. Dưới đây là mô tả chi tiết về hai phiên bản phổ biến: AN515-56 và AN515-57.​\n\n🔹 Thiết kế và hoàn thiện\nCả hai phiên bản đều sở hữu thiết kế mạnh mẽ với các đường nét góc cạnh, vỏ ngoài màu đen kết hợp với các chi tiết đỏ tạo nên vẻ ngoài đậm chất gaming. Bàn phím có đèn nền đỏ giúp người dùng dễ dàng thao tác trong điều kiện ánh sáng yếu. Trọng lượng khoảng 2.2 kg, phù hợp cho việc di chuyển hàng ngày.​\n\n🖥️ Màn hình\nAN515-56: Trang bị màn hình 15.6 inch Full HD IPS với tần số quét 144Hz, mang lại hình ảnh mượt mà và sắc nét, phù hợp cho các tựa game hành động nhanh.​\n\nAN515-57: Cũng sử dụng màn hình 15.6 inch Full HD IPS, nhưng một số phiên bản có thể được nâng cấp lên độ phân giải QHD (2560x1440) với tần số quét 165Hz, cung cấp trải nghiệm hình ảnh vượt trội. ​\nLaptop Screen\n\n⚙️ Hiệu năng\nAN515-56: Sử dụng vi xử lý Intel Core i5-11300H, RAM 8GB DDR4 (có thể nâng cấp lên 32GB), ổ cứng SSD 512GB và card đồ họa NVIDIA GeForce GTX 1650 4GB GDDR6. ​\n\nAN515-57: Trang bị vi xử lý Intel Core i5-11400H, RAM 8GB DDR4, ổ cứng SSD 512GB và card đồ họa NVIDIA GeForce RTX 3050 4GB GDDR6, mang lại hiệu năng mạnh mẽ hơn, đặc biệt trong các tác vụ đồ họa và chơi game nặng. ​\n\n🔌 Cổng kết nối và tính năng khác\nCả hai phiên bản đều được trang bị đầy đủ các cổng kết nối cần thiết như USB 3.2, USB-C, HDMI, cổng mạng RJ45 và jack tai nghe 3.5mm. Máy hỗ trợ Wi-Fi 6 và Bluetooth 5.1, đảm bảo kết nối nhanh chóng và ổn định.​\n\n🔋 Thời lượng pin\nVới viên pin 4-cell, cả hai phiên bản cung cấp thời lượng sử dụng khoảng 5-6 giờ tùy theo mức độ sử dụng, đủ đáp ứng nhu cầu làm việc và giải trí cơ bản trong ngày.​\n\n', NULL, NULL),
(10, 48, NULL, NULL, '​Acer Aspire 5 A515 là dòng laptop tầm trung được thiết kế để đáp ứng nhu cầu học tập, làm việc văn phòng và giải trí nhẹ nhàng. Với thiết kế hiện đại, hiệu năng ổn định và mức giá hợp lý, đây là lựa chọn phổ biến cho nhiều đối tượng người dùng.​\n\n💻 Thiết kế hiện đại, chắc chắn\nAcer Aspire 5 A515 sở hữu thiết kế thanh lịch với vỏ ngoài bằng nhôm hoặc nhựa cao cấp, mang lại cảm giác chắc chắn và bền bỉ. Máy có trọng lượng khoảng 1.7 kg, thuận tiện cho việc di chuyển hàng ngày. Bàn phím được thiết kế thoải mái, hỗ trợ đèn nền trên một số phiên bản, giúp làm việc hiệu quả trong môi trường thiếu sáng.​\n\n🖥️ Màn hình sắc nét\nMáy được trang bị màn hình 15.6 inch độ phân giải Full HD (1920 x 1080) với tấm nền IPS, mang lại góc nhìn rộng và màu sắc trung thực. Một số phiên bản có độ sáng khoảng 248 cd/m², phù hợp cho công việc văn phòng và giải trí cơ bản. ​\n\n⚙️ Hiệu năng ổn định\nAcer Aspire 5 A515 hỗ trợ nhiều tùy chọn cấu hình, bao gồm:​\n\nVi xử lý: Intel Core i5/i7 thế hệ 11 hoặc 12, hoặc AMD Ryzen 5/7 dòng 5000 hoặc 7000.​\n\n\nRAM: Từ 8GB đến 16GB DDR4 hoặc LPDDR5, đáp ứng tốt nhu cầu đa nhiệm.​\n\nỔ cứng: SSD PCIe dung lượng từ 256GB đến 1TB, cho tốc độ truy xuất dữ liệu nhanh.​\n\nMột số phiên bản còn được trang bị card đồ họa rời như NVIDIA GeForce RTX 2050, hỗ trợ tốt cho các tác vụ đồ họa và chơi game nhẹ. ​\n\n\n🔌 Cổng kết nối đa dạng\nMáy được trang bị đầy đủ các cổng kết nối cần thiết, bao gồm:​\n\nUSB Type-C​\n\nUSB 3.2 Gen 1​\n\nHDMI​\n\nJack tai nghe 3.5mm​\n\nNgoài ra, máy hỗ trợ Wi-Fi 6 và Bluetooth 5.1, đảm bảo kết nối không dây ổn định và nhanh chóng.​\n\n🔋 Thời lượng pin hợp lý\nAcer Aspire 5 A515 được trang bị pin 4-cell với dung lượng khoảng 53Wh, cho thời gian sử dụng từ 6 đến 8 giờ tùy theo mức độ sử dụng, đáp ứng tốt nhu cầu làm việc và giải trí trong ngày. ​\n\n\n', NULL, NULL),
(11, NULL, 10, NULL, 'RAM Laptop Kingston 1.2V 8GB 3200MHz là một thanh nhớ DDR4 chất lượng cao, được thiết kế dành riêng cho các dòng laptop cần nâng cấp hiệu năng. Với dung lượng 8GB và tốc độ bus 3200MHz, sản phẩm giúp cải thiện đáng kể khả năng đa nhiệm, tăng tốc độ xử lý và tối ưu hóa trải nghiệm sử dụng cho các tác vụ từ cơ bản đến phức tạp.\n\nThanh RAM hoạt động ở điện áp thấp 1.2V, giúp tiết kiệm điện năng và giảm tỏa nhiệt, từ đó kéo dài tuổi thọ pin cho laptop. Bộ nhớ này còn hỗ trợ khả năng tương thích rộng rãi với nhiều dòng máy khác nhau, đặc biệt phù hợp cho cả nhu cầu học tập, làm việc văn phòng lẫn giải trí.\n\nThiết kế của RAM Kingston 8GB 3200MHz đơn giản nhưng bền bỉ, đảm bảo độ ổn định cao trong suốt quá trình sử dụng. Đây là lựa chọn lý tưởng cho người dùng muốn nâng cấp laptop để đạt hiệu năng mượt mà hơn mà không cần đầu tư quá nhiều chi phí.', NULL, NULL),
(12, NULL, 11, NULL, '​Ổ cứng SSD Kingston NV3 PCIe 4.0 NVMe 1TB là một giải pháp lưu trữ hiện đại, kết hợp giữa hiệu năng cao và giá thành hợp lý, phù hợp cho cả người dùng phổ thông lẫn game thủ và người làm việc sáng tạo.​\n\n⚙️ Hiệu năng và công nghệ\nChuẩn giao tiếp: PCIe 4.0 x4 NVMe 1.4, mang lại tốc độ truyền dữ liệu vượt trội so với các chuẩn cũ.​\n\nTốc độ đọc/ghi tuần tự: lên đến 6.000 MB/s (đọc) và 4.000 MB/s (ghi), đảm bảo thời gian khởi động hệ thống và ứng dụng nhanh chóng.​\n\nBộ nhớ NAND: 3D NAND, giúp tăng mật độ lưu trữ và độ bền của ổ cứng.​\n\nThiết kế không DRAM: sử dụng công nghệ HMB (Host Memory Buffer), tận dụng bộ nhớ hệ thống để cải thiện hiệu năng mà không cần DRAM riêng biệt.​\n\n\n🧩 Thiết kế và tính tương thích\nKích thước: M.2 2280 (22mm x 80mm), phù hợp với nhiều loại laptop và PC hiện đại.​\n\n\nThiết kế một mặt: giúp dễ dàng lắp đặt trong các hệ thống có không gian hạn chế.​\n\nTiêu thụ điện năng thấp: giúp giảm nhiệt lượng và tiết kiệm năng lượng, đặc biệt hữu ích cho laptop.', NULL, NULL),
(13, NULL, 12, NULL, 'Samsung SSD 980 là dòng ổ cứng SSD M.2 NVMe phổ thông của Samsung, hướng tới người dùng cần hiệu năng cao và độ tin cậy ổn định cho cả laptop lẫn PC.\n\nSử dụng chuẩn giao tiếp PCIe 3.0 x4 NVMe 1.4, Samsung 980 mang lại tốc độ đọc tối đa lên đến 3.500 MB/s và ghi tối đa khoảng 3.000 MB/s, nhanh gấp nhiều lần so với ổ SSD SATA truyền thống. Dù không được trang bị bộ nhớ đệm DRAM riêng, ổ vẫn tối ưu hiệu năng nhờ công nghệ HMB (Host Memory Buffer), giúp tận dụng bộ nhớ hệ thống để tăng tốc độ truy cập dữ liệu.\n\nThiết kế nhỏ gọn theo chuẩn M.2 2280 giúp Samsung 980 dễ dàng lắp đặt trong hầu hết các dòng laptop và desktop hiện đại. Đồng thời, ổ cứng này cũng nổi tiếng với độ bền cao nhờ sử dụng chip bộ nhớ V-NAND chất lượng của Samsung, với độ bền TBW lớn (tùy theo từng dung lượng).\n\nNgoài ra, Samsung trang bị cho SSD 980 các công nghệ như Dynamic Thermal Guard để kiểm soát nhiệt độ hoạt động, đảm bảo hiệu năng ổn định lâu dài ngay cả khi vận hành liên tục.\n\nTóm lại, Samsung SSD 980 là lựa chọn rất đáng giá cho những ai tìm kiếm ổ SSD tốc độ cao, bền bỉ, giá thành hợp lý, phù hợp cho cả nhu cầu nâng cấp laptop, PC cá nhân hoặc workstation nhẹ.', NULL, NULL),
(14, NULL, 13, NULL, '​Kingston A400 là dòng ổ cứng SSD phổ thông sử dụng giao tiếp SATA III, được thiết kế để nâng cấp hiệu năng cho máy tính để bàn và laptop với chi phí hợp lý.​\n\n⚙️ Hiệu năng và công nghệ\nTốc độ đọc/ghi tuần tự:\n\n240GB: lên đến 500MB/s (đọc) và 350MB/s (ghi)\n\n480GB và 960GB: lên đến 500MB/s (đọc) và 450MB/s (ghi)​\n\nTốc độ truy xuất ngẫu nhiên:\n\nLên đến 90.000 IOPS (đọc) và 26.000–35.000 IOPS (ghi), tùy theo dung lượng​\n\n\nBộ nhớ NAND: Sử dụng 3D NAND TLC, mang lại độ bền và hiệu suất ổn định​\n\nBộ điều khiển: Phison PS3111-S11-13, không có bộ nhớ đệm DRAM, nhưng sử dụng bộ nhớ đệm SLC giả lập để cải thiện hiệu suất ghi​\n\n🧩 Thiết kế và tính tương thích\nKích thước: 2.5 inch, độ dày 7mm, phù hợp với hầu hết các loại laptop và PC hiện đại​\n\nGiao tiếp: SATA Rev. 3.0 (6Gb/s), tương thích ngược với SATA Rev. 2.0 (3Gb/s)​\n\nTiêu thụ điện năng:\n\n0.195W khi không hoạt động\n\n0.279W trung bình\n\n0.642W (đọc tối đa)\n\n1.535W (ghi tối đa)​\n', NULL, NULL),
(15, NULL, 14, NULL, 'Crucial MX500 là một trong những ổ cứng SSD SATA 2.5 inch được đánh giá cao nhất trong phân khúc tầm trung, nổi bật nhờ hiệu năng ổn định, độ tin cậy cao và mức giá hợp lý.​\n\n⚙️ Hiệu năng và công nghệ\nTốc độ đọc/ghi tuần tự: lên đến 560 MB/s (đọc) và 510 MB/s (ghi), đạt gần giới hạn tối đa của giao tiếp SATA III.​\n\n\nTốc độ đọc/ghi ngẫu nhiên: lên đến 95.000 IOPS (đọc) và 90.000 IOPS (ghi), đảm bảo khả năng xử lý đa nhiệm mượt mà.​\n\nBộ điều khiển: Silicon Motion SM2258, kết hợp với bộ nhớ đệm DRAM và công nghệ SLC cache giúp tăng tốc độ ghi dữ liệu.​\n\n\nBộ nhớ NAND: Micron 3D TLC NAND, mang lại độ bền cao và hiệu suất ổn định.​\nB&H Photo Video\n\n🧩 Thiết kế và tính tương thích\nKích thước: 2.5 inch, độ dày 7mm, phù hợp với hầu hết các loại laptop và PC hiện đại.​\n\nGiao tiếp: SATA III 6Gb/s, tương thích ngược với SATA II 3Gb/s.​\n\nTiêu thụ điện năng thấp: giúp giảm nhiệt lượng và tiết kiệm năng lượng, đặc biệt hữu ích cho laptop.​\n\n\n', NULL, NULL),
(16, NULL, NULL, 4, 'Lót chuột Logitech Studio Series 20 x 23 cm là một phụ kiện được thiết kế tối ưu cho trải nghiệm sử dụng chuột mượt mà, chính xác, phù hợp cho cả công việc văn phòng lẫn sử dụng cá nhân tại nhà.\n\nMiếng lót có kích thước nhỏ gọn 20 x 23 cm, lý tưởng cho không gian bàn làm việc hạn chế hoặc người dùng thích sự gọn gàng. Bề mặt vải dệt mịn giúp chuột di chuyển nhẹ nhàng và chính xác, đồng thời tối ưu cho cả chuột quang lẫn chuột laser.\n\nMặt dưới của lót chuột được làm từ chất liệu cao su chống trượt, đảm bảo độ bám chắc trên mặt bàn, không bị xê dịch trong quá trình sử dụng. Ngoài ra, Logitech còn trang bị cho sản phẩm này khả năng chống thấm nước nhẹ, giúp bảo vệ miếng lót khỏi những sự cố đổ nước bất ngờ. Các mép viền được may tỉ mỉ để chống bong tróc và tăng độ bền qua thời gian.\n\nPhong cách thiết kế đơn giản, tinh tế, nhiều màu sắc trang nhã, phù hợp với nhiều phong cách setup bàn làm việc hiện đại.', NULL, NULL),
(17, NULL, NULL, 5, '​Logitech MX Master 3S là mẫu chuột không dây cao cấp, được thiết kế tối ưu cho công việc văn phòng, sáng tạo nội dung và lập trình viên, mang lại trải nghiệm sử dụng mượt mà, chính xác và tiện lợi.​\n\n🎯 Tính năng nổi bật\nCảm biến Darkfield 8.000 DPI: Cho phép chuột hoạt động chính xác trên nhiều bề mặt, kể cả kính, với độ nhạy cao và khả năng tùy chỉnh theo nhu cầu sử dụng.​\n\nCông nghệ Quiet Clicks: Giảm tiếng ồn khi nhấn nút lên đến 90%, giúp môi trường làm việc yên tĩnh hơn mà vẫn giữ được cảm giác nhấn rõ ràng.​\n\nCuộn siêu tốc MagSpeed: Bánh xe cuộn điện từ cho phép cuộn nhanh đến 1.000 dòng mỗi giây, đồng thời chuyển đổi mượt mà giữa chế độ cuộn từng dòng và cuộn tự do.​\n\nKết nối đa thiết bị: Hỗ trợ kết nối lên đến 3 thiết bị cùng lúc qua Bluetooth hoặc đầu thu Logi Bolt, dễ dàng chuyển đổi giữa các thiết bị chỉ với một nút bấm.​\n\nTùy chỉnh linh hoạt: Với phần mềm Logi Options+, người dùng có thể tùy chỉnh các nút chức năng và thiết lập các thao tác thông minh để tăng hiệu suất làm việc.​\n\n\n🧩 Thiết kế và thông số kỹ thuật\nThiết kế công thái học: Phù hợp với người thuận tay phải, hỗ trợ cổ tay và ngón cái, giúp giảm mỏi khi sử dụng lâu dài.​\n\nKích thước: 124.9 x 84.3 x 51 mm​\n\nTrọng lượng: Khoảng 141g​\n\n\nPin sạc USB-C: Thời lượng pin lên đến 70 ngày sau mỗi lần sạc đầy.​\n\n\nTương thích: Windows, macOS, Linux, iPadOS, ChromeOS.​\n\n', NULL, NULL),
(18, NULL, NULL, 6, '​Razer BlackWidow V3 là bàn phím cơ chơi game cao cấp, nổi bật với thiết kế chắc chắn, hiệu năng mạnh mẽ và khả năng tùy biến cao, phù hợp cho cả game thủ và người dùng chuyên nghiệp.​\n\n🔧 Thông số kỹ thuật chính\nLoại bàn phím: Full-size (100%)\n\nKích thước: Dài 45.2 cm x Rộng 15.5 cm x Cao 4.3 cm\n\nTrọng lượng: Khoảng 1 kg\n\nKết nối: USB 2.0 Type-A\n\nChất liệu: Khung nhôm trên, đế nhựa\n\nKeycap: ABS Doubleshot\n\nĐèn nền: RGB từng phím, hỗ trợ Razer Chroma\n\nLưu trữ cấu hình: Tối đa 5 cấu hình trên bộ nhớ trong\n\nPhần mềm hỗ trợ: Razer Synapse​\n\n\n🎮 Tính năng nổi bật\nSwitch cơ Razer: Lựa chọn giữa hai loại switch:\n\nRazer Green: Cảm giác gõ rõ ràng, âm thanh \"clicky\" đặc trưng, phù hợp cho người thích phản hồi xúc giác mạnh.\n\nRazer Yellow: Hành trình tuyến tính, yên tĩnh, thích hợp cho môi trường cần sự yên lặng hoặc chơi game tốc độ cao.​\n\n\nĐèn nền Chroma RGB: Hỗ trợ tùy chỉnh màu sắc từng phím, đồng bộ với các thiết bị Razer khác và tương thích với hơn 150 trò chơi có tích hợp Chroma.​\n\nPhím media chuyên dụng: Bao gồm bánh xe cuộn âm lượng và các nút điều khiển media riêng biệt, tiện lợi cho việc điều chỉnh nhanh chóng.​\n\nTuổi thọ phím: Lên đến 80 triệu lần nhấn, đảm bảo độ bền cao cho người dùng chuyên nghiệp.​\n\n🧩 Thiết kế và trải nghiệm sử dụng\nVới khung nhôm chắc chắn và thiết kế hiện đại, Razer BlackWidow V3 mang lại cảm giác cao cấp và bền bỉ. Các phím được thiết kế để giảm thiểu hiện tượng mờ chữ theo thời gian. Bàn phím cũng hỗ trợ tính năng ghi macro nhanh chóng và chế độ chơi game để vô hiệu hóa các phím không mong muốn trong khi chơi.​\n\n', NULL, NULL),
(19, 49, NULL, NULL, 'Acer', NULL, NULL),
(20, 65, NULL, NULL, 'Lenovo Legion 5 Pro 16ACH6H là một chiếc laptop gaming cao cấp với thiết kế mạnh mẽ, hiện đại và hầm hố. Máy sở hữu khung vỏ chắc chắn, tông màu xám sang trọng, logo Legion nổi bật và các đường nét tinh tế. Màn hình viền mỏng cho trải nghiệm thị giác rộng rãi, cùng với bàn phím RGB nổi bật giúp tôn lên phong cách game thủ chuyên nghiệp. Hệ thống tản nhiệt được bố trí khoa học, đảm bảo hiệu suất ổn định khi chơi game hoặc làm việc nặng.', NULL, NULL);

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
('FdjFXbxjZAk0mvrBStcuw8jEVoWk9wy3W24X727b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', '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', 1746802773),
('KmbTYTt4zAAQWD5xMihbfHaXgHKj5GWEbhoEBqHF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1JISFdva0x4NzB4bnZVT0RkWGxxTTVCbkwwdHlVTk55VG9UcjE3ZSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745822910),
('v2hsKgtewC50VsWEXqmRa70mdsejgwGBI7UcLxEu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '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', 1745827592),
('X5MaIVkbvTiDJmU1dqrcD6aBsH5mj3dgXDFgnIF0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', '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', 1746877207);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`) VALUES
(1, 'Test User', 'test@example.com', '2025-04-11 05:08:55', '$2y$12$PXfg/2RcF1Cu/RxdWzWvl.c2wWdGEdML9XCitjLeHz4Wl58tVrMcS', 'SRTWvJOzml', '2025-04-11 05:08:56', '2025-04-11 05:08:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_laptops_brand_id` (`brand_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `orderdetails_product_id_foreign` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_laptop_id_foreign` (`laptop_id`),
  ADD KEY `products_component_id_foreign` (`component_id`),
  ADD KEY `products_accessories_id_foreign` (`accessories_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessories`
--
ALTER TABLE `accessories`
  ADD CONSTRAINT `accessories_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `laptops`
--
ALTER TABLE `laptops`
  ADD CONSTRAINT `fk_laptops_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laptops_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_accessories_id_foreign` FOREIGN KEY (`accessories_id`) REFERENCES `accessories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_laptop_id_foreign` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
