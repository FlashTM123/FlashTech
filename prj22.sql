-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 03:38 AM
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
-- Database: `prj22`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `original_price` decimal(8,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `promotional_price` decimal(8,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `brand_id`, `color_id`, `type`, `original_price`, `discount`, `promotional_price`, `quantity`, `status`, `image`, `product_id`) VALUES
(4, 'Lót chuột Logitech Studio Series 20 x 23 cm', 28, 2, 'Lót chuột', 299000, 10, 269100, 1, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tam-lot-chuot-logitech-studio-series-20-23-cm-6.png', 4),
(5, 'Chuột không dây Logitech MX Master 3S', 28, 2, 'Chuột không dây', 2990000, 32, 2250000, 1, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/f/sfeftet466554.jpg', 6);

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
(12, 'Admin123', 'Admin@gmail.com', '$2y$12$r09Qz.9Xf1E/bDfWxF6NfuU1ZQdQV.4mz1hmD12Yth1UT.fcMaA42', '0234432232', '2025-03-26 14:03:44', '2025-03-26 14:04:23'),
(14, 'Admin1234', 'Admin23@gmail.com', '$2y$12$qEwtxTWjeW/40ojS3kyoBeXBwlCPiy0W.iJo87U.IfsZcfbQZ7cUy', '0777777777', '2025-03-26 14:03:44', '2025-03-26 14:04:23'),
(15, 'Admin3', 'Admin3@gmail.com', '$2y$12$elmi/LnjofVp5ETrGv3mL.kVgfE.KAte/Y9uEjwyWTm4w9uN6zcxG', '0123456789', '2025-04-03 12:38:35', '2025-04-03 12:38:35');

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
(14, 'Macbook', 'Laptop'),
(28, 'Logitech', 'Accessories'),
(29, 'Gigabyte', 'Laptop');

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
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'Gray'),
(2, 'Black'),
(4, 'No color'),
(5, 'White'),
(6, 'Silver');

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
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `name`, `brand_id`, `type`, `capacity`, `original_price`, `discount`, `promotional_price`, `quantity`, `status`, `image`, `product_id`) VALUES
(10, 'RAM Laptop Kingston 1.2V 8GB 3200MHz', 11, 'RAM', '8GB', 990000, 40, 420000, 1, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/_/d_p.png', 3);

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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('sales','customer_service','Inventory_staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `email`, `password`, `phone`, `role`) VALUES
(1, 'Nguyễn Văn A', 'Hà Nội', 'a@gmail.com', '123456', '0123456789', 'Inventory_staff');

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
  `color_id` int(11) DEFAULT NULL,
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
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `name`, `brand_id`, `color_id`, `cpu`, `ram`, `vga`, `storage`, `original_price`, `discount`, `promotional_price`, `quantity`, `status`, `image`, `product_id`) VALUES
(34, 'Laptop Lenovo Legion 5 Pro 16ACH6H 82JQ001VVN', 1, 1, 'AMD Ryzen 7 5800H', '16GB DDR4', 'NVIDIA GeForce RTX 3060 6GB', '512GB SSD M.2', 43690000, 20, 41190000, 0, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-lenovo-legion-5-pro-16ach6h-82jq001vvn-1.jpg', 1),
(36, 'MacBook Air M4 13 inch 2025', 14, 6, 'Apple M4 10 lõi', '16GB', 'GPU 8 lõi', '256GB', 26990000, NULL, NULL, 0, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_2__9_14.png', 5),
(37, 'Laptop Dell Inspiron 15 3520 6HD73', 2, 2, 'Intel Core i7-1255U', '16GB DDR4', 'Intel Iris Xe Graphics', '512 GB - 1 khe tối đa 1TB', 19990000, 10, 17990000, 3, NULL, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_88__1_3.png', 7),
(38, 'Laptop Gigabyte G5 KF-E3PH333SH', 29, 2, 'Intel Core i5-12500H', '8GB DDR4', 'NVidia Geforce RTX 4060 8GB GDDR6 + Intel Iris Xe Graphics', '512GB SSD M.2 PCIE', 25990000, 19, 20990000, 3, NULL, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/t/e/text_ng_n_12__5_17.png', 8);

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
(14, '2025_03_20_115542_create_products_table', 5),
(18, '2025_03_20_124619_create_orderdetails_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_type` enum('laptop','component','accessories') NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `product_id`, `product_type`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(8, 1, 'laptop', 1, 41190000.00, '2025-03-30 07:11:23', '2025-03-30 07:11:23'),
(9, 3, 'laptop', 1, 420000.00, '2025-03-30 07:18:25', '2025-03-30 07:18:25'),
(10, 1, 'laptop', 1, 41190000.00, '2025-03-30 07:43:59', '2025-03-30 07:43:59'),
(11, 4, 'laptop', 1, 269100.00, '2025-03-30 18:19:05', '2025-03-30 18:19:05'),
(12, 1, 'laptop', 1, 41190000.00, '2025-03-30 21:35:03', '2025-03-30 21:35:03'),
(13, 5, 'laptop', 2, 26990000.00, '2025-03-31 04:44:52', '2025-03-31 04:44:52'),
(14, 5, 'laptop', 1, 26990000.00, '2025-03-31 05:20:14', '2025-03-31 05:20:14'),
(15, 3, 'laptop', 2, 420000.00, '2025-03-31 06:55:02', '2025-03-31 06:55:02'),
(16, 4, 'laptop', 1, 269100.00, '2025-04-01 07:09:48', '2025-04-01 07:09:48'),
(17, 5, 'laptop', 1, 26990000.00, '2025-04-01 20:48:33', '2025-04-01 20:48:33'),
(18, 3, 'laptop', 4, 420000.00, '2025-04-02 06:50:02', '2025-04-02 06:50:02'),
(19, 1, 'laptop', 1, 41190000.00, '2025-04-03 05:27:21', '2025-04-03 05:27:21'),
(19, 6, 'laptop', 1, 2250000.00, '2025-04-03 05:27:21', '2025-04-03 05:27:21'),
(20, 1, 'laptop', 1, 41190000.00, '2025-04-06 07:25:35', '2025-04-06 07:25:35'),
(21, 5, 'laptop', 1, 26990000.00, '2025-04-06 07:28:09', '2025-04-06 07:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Processing','Completed','Cancel','On delivery') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `payment_method`, `address`, `status`, `total_price`, `updated_at`, `created_at`) VALUES
(8, 3, 'cod', 'Hà nội', 'Completed', 41220000.00, '2025-04-01 07:02:34', '2025-03-30 07:11:23'),
(9, 3, 'cod', 'Hà nội', 'On delivery', 450000.00, '2025-04-03 05:34:15', '2025-03-30 07:18:25'),
(10, 3, 'cod', 'dfdxf', 'Cancel', 41220000.00, '2025-04-01 07:07:28', '2025-03-30 07:43:59'),
(11, 3, 'cod', 'Hanoi', 'Processing', 299100.00, '2025-03-31 04:10:40', '2025-03-30 18:19:05'),
(12, 3, 'cod', 'ffff', 'Cancel', 41220000.00, '2025-04-01 07:24:30', '2025-03-30 21:35:03'),
(13, 3, 'cod', 'Ha noi', 'Processing', 54010000.00, '2025-03-31 05:20:58', '2025-03-31 04:44:52'),
(14, 3, 'cod', 'Hanoi', 'Processing', 27020000.00, '2025-03-31 05:20:29', '2025-03-31 05:20:14'),
(15, 3, 'cod', 'Hà Nội', 'Processing', 870000.00, '2025-04-01 18:54:35', '2025-03-31 06:55:02'),
(16, 3, 'cod', 'Hà Đông', 'Pending', 299100.00, '2025-04-01 07:09:48', '2025-04-01 07:09:48'),
(17, 4, 'cod', 'Hà Nội', 'On delivery', 27020000.00, '2025-04-03 05:34:47', '2025-04-01 20:48:33'),
(18, 4, 'cod', 'Hà Nội', 'Pending', 1710000.00, '2025-04-02 06:50:02', '2025-04-02 06:50:02'),
(19, 4, 'cod', 'Hà Nội', 'Processing', 43470000.00, '2025-04-03 05:28:20', '2025-04-03 05:27:21'),
(20, 4, 'bank_transfer', 'Hanoi', 'Pending', 41220000.00, '2025-04-06 07:25:35', '2025-04-06 07:25:35'),
(21, 4, 'cod', 'Hanoi', 'On delivery', 27020000.00, '2025-04-06 07:29:00', '2025-04-06 07:28:09');

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
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('laptop','component','accessories') NOT NULL,
  `type_id` int(11) NOT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`, `type_id`, `description`) VALUES
(1, 'laptop', 34, 'Laptop Lenovo Legion 5 Pro dòng laptop gaming mạnh mẽ\r\n\r\nLaptop gaming là dòng laptop được các nhà sản xuất dành riêng cho các game thủ. Các dòng laptop gaming thường sở hữu những ưu điểm như hiệu năng vượt trội, tản nhiệt tốt, pin trâu. Nhưng với Lenovo Legion 5 Pro 16ACH6H 82JQ001VVN, laptop không chỉ kế thừa những điểm mạnh vốn có của dòng laptop gaming mà còn có thêm những ưu điểm khác như thiết kế nhỏ gọn, sang trọng.\r\n\r\nMàn hình 16 inch độc đáo, tần số quét lớn\r\n\r\nLenovo Legion 5 Pro 16ACH6H 82JQ001VVN sở hữu màn hình kích thước khá lạ, 16 inch. Với kích thước màn hình này máy đem lại không gian hiển thị lớn mà vẫn giữ được tính linh động.\r\n\r\nMàn hình 16 inch độc đáo, tần số quét lớn\r\n\r\nMàn hình laptop 16 inch được hoàn thiện từ tấm nền IPS chất lượng cùng độ sáng cao, tần số quét lên tới 165Hz, mang lại trải nghiệm game vượt trội.\r\nHiệu năng mạnh mẽ, con chip đồ họa chất lượng\r\n\r\nLenovo Legion 5 Pro 16ACH6H 82JQ001VVN mang lại khả năng hoạt động ổn định với con chip H AMD Ryzen 7-5800H cùng với đó là dung lượng RAM lên đến 16GB. Máy còn sở hữu card đồ họa NVIDIA GeForce RTX 3060 nhờ đó những trận chiến game diễn ra mượt mà.\r\n\r\nHiệu năng mạnh mẽ, con chip đồ họa chất lượng\r\n\r\nNgoài ra, để nâng cao trải nghiệm game máy còn được trang bị hệ thống hai loa cùng viên pin 4 cell cho thời gian sử dụng ấn tượng.'),
(3, 'component', 10, 'RAM Kingston Sodimm 1.2V 8GB 3200MHz CL22 – dung lượng 8GB và tốc độ xử lí tốt và tiết kiệm năng lượng\r\n\r\nVấn đề về bộ nhớ luôn là điều được rất nhiều người laptop quan tâm và đôi khi phải đau đầu do máy không đủ dung lượng cho nhu cầu sử dụng. Khi đó, rất nhiều người nghĩ đến biện pháp trang bị thêm bộ nhớ RAM cho laptop của mình và thanh RAM Kingston Sodimm 1.2V 8GB 3200MHz CL22 là một linh kiện laptop tuyệt vời nhờ vào dung lượng cao và khả năng xử lí tốt.\r\nĐến từ thương hiệu Kingston nổi tiếng cùng dung lượng lên đến 8GB\r\n\r\nThanh RAM Kingston Sodimm 1.2V 8GB 3200MHz là sản phẩm của tập đoàn Kingston Technology đến từ Mỹ. Đây là tập đoàn được thành lập từ năm 1987 là thương hiệu sản xuất bộ nhớ hàng đầu thế giới, chiếm hơn 50% thị phần và là thương hiệu được yêu thích và tin dùng tại Châu Á – Thái Bình Dương.\r\n\r\nĐến từ thương hiệu Kingston nổi tiếng cùng dung lượng lên đến 8GB\r\n\r\nThanh RAM Kingston Sodimm 1.2V 8GB 3200MHz có dung lượng lên đến 8GB, đây là con số phù hợp cho những ai có nhu cầu nâng cấp dung lượng cho laptop của mình, hoàn toàn đủ khả năng để bạn có thể tải thêm nhiều phần mềm “nặng đô” để sử dụng và lưu trữ được nhiều dữ liệu hơn.\r\nChuẩn Ram DDR4 cho tốc độ xử lí tốt hơn cùng khả năng nâng cấp dễ dàng\r\n\r\nThanh RAM Kingston Sodimm 1.2V 8GB 3200MHz có chuẩn RAM 8GB DDR4 nhanh gấp nhiều lần so với DDR3 giúp máy bạn khi xử lí đa nhiệm được mượt mà hơn, khả năng xử lí ổn định và khi lướt web sẽ không còn gặp tình trạng thiếu RAM.\r\n\r\nChuẩn Ram DDR4 cho tốc độ xử lí tốt hơn cùng khả năng nâng cấp dễ dàng\r\n\r\nKhông chỉ thế, thanh Kingston Sodimm 1.2V 8GB 3200MHz rất dễ dàng để trang bị cho máy mà không cần phải điều chỉnh cấu hình gì của máy giúp bạn tiết kiệm nhiều thời gian hơn.\r\nXung bus cực cao lên đến 3200 MHz cùng khả năng tiết kiệm năng lượng\r\n\r\nThanh RAM Kingston Sodimm 1.2V 8GB 3200MHz có xung bus lên đến 3200 MHz, với mức xung bus này máy bạn sẽ xử lí được lưu lượng dữ liệu lơn hơn với thời gian nhanh hơn. Xung bus của ram Kingston càng cao thì máy tính của bạn sẽ càng xử lí được mức lưu lượng dữ liệu cao hơn.\r\n\r\nXung bus cực cao lên đến 3200 MHz cùng khả năng tiết kiệm năng lượng\r\n\r\nNgoài ra, thanh RAM DDR4 đến từ thương hiệu Kingston Sodimm sử dụng hiệu điện thế 1.2V giúp tiết kiệm 20% năng lượng so với DDR3 và tiết kiệm lên đến 40% tổng năng lượng tiêu thụ giúp pin máy tính bạn sẽ giũ được tuổi thọ tốt hơn rất nhiều.'),
(4, 'accessories', 4, 'ấm lót chuột Logitech Studio Series 20 x 23 cm - Mịn màng và chống trượt\r\n\r\nKhu vực làm việc với máy tính của bạn giờ đây sẽ được nâng tầm với tấm lót chuột Logitech Studio Series 20 x 23 cm - được thiết kế tinh tế và tối ưu cho trải nghiệm lướt chuột đầy thoải mái dành cho bạn.\r\nTinh tế tuyệt mỹ, bề mặt mịn mềm cùng đế chống trượt\r\n\r\nTấm lót chuột Logitech Studio Series 20 x 23 cm được thiết kế theo dòng sản phẩm Studio đặc trưng do Logitech sáng tạo nên. Nhờ đó mà sản phẩm có kiểu dáng tinh tế, màu sắc đa dạng, phù hợp với cách bố trí bàn làm việc của riêng bạn. Tấm lót chuột Logitech Studio Series 20 x 23 cm được chế tác tỉ mỉ và tinh xảo từ polyester tái chế, giúp cho tấm lót chuột không bị nhăn nhúm, cũng như không bị sờn theo thời gian.\r\n\r\nChống trơn trượt\r\n\r\nTấm lót chuột Logitech Studio Series 20 x 23 cm có bề mặt mịn màng giúp cho chuột di chuyển linh hoạt và suôn mượt. Đặc biệt, đế của tấm lót chuột Logitech Studio Series 20 x 23 cm còn được chế tạo từ cao su tự nhiên nhằm ngăn chặn tình trạng vô tình trượt, giúp giữ cố định tấm lót trong lúc lướt chuột.\r\nĐặc tính chống thấm nước ấn tượng\r\n\r\nTấm lót chuột Logitech Studio Series 20 x 23 cm được Logitech chế tạo chuyên biệt nhằm có được đặc tính chống thấm nước ấn tượng. Qua đó, tấm lót chuột sẽ luôn an toàn khỏi những tình huống xấu như làm đổ nước hay bất kỳ chất lỏng nào khác, cũng như dễ dàng lau sạch và duy trì vẻ ngoài mới mẻ của sản phẩm.\r\n\r\nĐặc tính chống thấm nước ấn tượng\r\n\r\nVẻ đẹp tinh tế của tấm lót chuột Logitech Studio Series 20 x 23 cm còn được nâng tầm nhờ logo Logitech in trên bề mặt. Nhờ đó, sản phẩm này sẽ trở nên phù hợp không chỉ với các game thủ, mà còn với rất nhiều khu vực làm việc máy tính hiện nay.'),
(5, 'laptop', 36, 'MacBook Air 13 M4 2025 sở hữu thiết kế siêu mỏng nhẹ với màu sắc sang trọng, độ dày chỉ 1.13 cm và trọng lượng 1.24 kg.\r\n    Máy được trang bị chip M4 thế hệ mới nhất của Apple với 10 CPU và 8 GPU, mang lại hiệu năng xử lý mạnh mẽ và khả năng đồ họa ấn tượng.\r\n    RAM 16GB và ổ cứng SSD 256GB giúp đa nhiệm mượt mà, khởi động nhanh chóng và lưu trữ đủ dùng cho công việc hàng ngày.\r\n    Màn hình Liquid Retina 13.6 inch với độ phân giải 2560x1664 pixels cho hình ảnh sắc nét, màu sắc chân thực và độ sáng cao lên đến 500 nits.'),
(6, 'accessories', 5, 'Chuột Logitech MX Master 3S - Nhỏ gọn, cuộn siêu nhanh\r\n\r\nChuột không dây Logitech MX Master 3S mang đến kiểu dáng công thái học, giúp sử dụng thoải mái khi được nâng đỡ cả bàn tay. Phụ kiện chuột Logitech có khả năng sử dụng mượt mà trên nhiều bề mặt, đem lại phản hồi trực quan và vô cùng yên tĩnh khi nhấp chuột.\r\nKiểu dáng MX Master 3S độc đáo, mượt mà trên mọi bề mặt\r\n\r\nMX Master 3S sở hữu thiết kế được làm khá đẹp mắt với những đường nét tỉ mỉ và gọn gàng. Đồng thời, kiểu dáng công thái học cũng giúp tay bạn được nâng đỡ và dùng thêm thoải mái để trải nghiệm lâu dài với góc nghiêng độc đáo của chuột.\r\n\r\nChuột không dây Logitech MX Master 3S\r\n\r\nLogitech MX Master 3S có kích thước nhỏ gọn và trọng lượng nhẹ với nút cuộn chuyển động theo ngón tay người dùng. Với độ phân giải cảm biến quang học lên đến 8000 DPI, chuột hoàn toàn có thể sử dụng mượt mà trên mọi bề mặt.\r\nTích hợp chức năng cuộn siêu nhanh, sạc nhanh dùng lâu\r\n\r\nChuột không dây MX Master 3S Logitech có khả năng cuộn được 1000 dòng trên giây do được tích hợp tính năng cuộn điện từ MagSpeed. Nút cuộn còn được làm từ vật liệu cứng cáp với độ nhám nhẹ nên khi dùng không hề gây ra tiếng ồn. \r\n\r\nChuột không dây Logitech MX Master 3S\r\n\r\nBên cạnh đó, sau khi được sạc đầy, chuột MX Master 3S có khả năng sử dụng lên tới 70 ngày. Đồng thời, với kết nối Bluetooth, thiết bị có thể tương thích với tất cả các hệ điều hành chính ngay sau khi lấy ra khỏi hộp.'),
(7, 'laptop', 37, 'Laptop Dell Inspiron 15 3520 6HD73 - Hiệu năng mạnh mẽ, màn hình Full HD sống động\r\nLaptop Dell Inspiron 15 3520 6HD73 sở hữu sức mạnh xử lý đa nhiệm vượt trội. Với bộ vi xử lý Intel Core i7 thế hệ 12 mạnh mẽ, RAM 16GB và ổ cứng SSD 512GB PCIe, Dell Inspiron 15 3520 6HD73 hứa hẹn sẽ mang đến hiệu tốc độ làm việc một cách nhanh chóng và mượt mà. \r\n\r\nĐa nhiệm cùng RAM 16GB với ổ cứng SSD 512GB PCIe\r\nLaptop Dell Inspiron 15 3520 6HD73 được trang bị cấu hình mạnh mẽ với RAM chuẩn DDR4 dung lượng 16GB. Điều này cho phép người dùng chạy đa nhiệm mượt mà trên nhiều ứng dụng cùng lúc mà không lo giật lag. Với dung lượng RAM này, người dùng sẽ có thể thoải mái mở nhiều tab trình duyệt, chỉnh sửa ảnh/video hoặc chơi được một số tựa game nhẹ nhàng.\r\n\r\nRAM và ổ cứng laptop Dell Inspiron 15 3520 6HD73\r\n\r\nBên cạnh RAM là ổ cứng SSD 512GB PCIe. Ổ này mang đến tốc độ đọc ghi dữ liệu cực nhanh. Nhờ đó, thời gian khởi động máy, mở ứng dụng của máy được rút ngắn đáng kể. Đặc biệt, với ổ SSD, máy cũng có độ bền cao và ít tiêu tốn điện năng hơn.\r\n\r\nKiểu dáng mỏng nhẹ, sắc đen lịch lãm\r\nLaptop Dell Inspiron 15 3520 6HD73 sở hữu thiết kế hiện đại, tinh tế với tổng kích thước đạt 16.96 x 358.50 x 235.56 mm. Vỏ máy được Dell làm nên từ chất liệu cao cấp, vừa đảm bảo độ bền vừa mang đến cảm giác thoải mái khi sử dụng với trọng lượng chỉ 1.66 kg. Phần bản lề cũng đã được hãng cải tiến, để người dùng mở/gập máy một cách êm ái và ổn định.\r\n\r\nThiết kế laptop Dell Inspiron 15 3520 6HD73\r\n\r\nVề màu sắc, Dell đã lựa chọn tông đen cho Inspiron 15 3520 6HD73. Màu đen không chỉ tạo nên vẻ ngoài sang trọng, lịch lãm mà còn giúp máy trông gọn gàng hơn. Hơn nữa, lớp vỏ đen bền màu còn hạn chế bám vân tay và trầy xước, giúp chiếc laptop của mọi người giữ được vẻ ngoài như mới lâu dài.\r\n\r\nĐảm nhiệm mọi tác vụ với Core i7-1255U và Intel Iris Xe Graphics\r\nIntel Core i7-1255U chính là “trái tim” của Dell Inspiron 15 3520 6HD73. Chip Intel thế hệ 12 này thuộc dòng U-series, được thiết kế để tối ưu hóa hiệu năng và tiết kiệm năng lượng. Với kiến trúc 10 nhân 12 luồng, máy sẽ có được tốc độ xử lý nhanh chóng trên nhiều tác vụ nặng nhẹ khác nhau.\r\n\r\nCPU và card đồ hoạ của laptop Dell Inspiron 15 3520 6HD73\r\n\r\nĐi kèm với CPU, laptop Dell Inspiron 15 3520 6HD73 còn được trang bị card đồ Intel Graphics. Card đồ họa tích hợp này đủ sức mạnh để xử lý các tác vụ đồ họa cơ bản như chỉnh sửa ảnh đơn giản, xem phim HD, chơi một số game nhẹ. \r\n\r\nPin 41Wh 3 Cell, đầy đủ các cổng thông dụng\r\nLaptop Dell Inspiron 15 3520 6HD73 được trang bị viên 41Wh, 3 cell. Dung lượng pin này cho phép mọi người sử dụng máy để làm việc, học tập hoặc giải trí trong nhiều giờ liền. Đặc biệt, nếu người dùng biết cách điều chỉnh các yếu tố như độ sáng màn hình, các ứng dụng đang chạy,... thời lượng dùng được của máy còn tăng lên đáng kể.\r\n\r\nPin và cổng kết nối của laptop Dell Inspiron 15 3520 6HD73\r\n\r\nVề các cổng kết nối, Dell Inspiron 15 3520 6HD73 được trang bị khá đầy đủ các cổng thông dụng. Điều đó đủ đáp ứng nhu cầu kết nối với nhiều thiết bị ngoại vi khác nhau của một chiếc laptop văn phòng. Ở đây, máy có HDMI 1.4, USB 3.2 Gen 1, khe cắm thẻ SD, USB 2.0, cổng tai nghe.'),
(8, 'laptop', 38, 'Laptop Gigabyte G5 KF-E3PH333SH - Bức phá hiệu năng với RTX 4060\r\nLà sản phẩm thuộc phân khúc gaming giá rẻ laptop Gigabyte với cấu hình vượt trội nhận được sự quan tâm bởi đông đảo người dùng khi không ít người dùng ưa chuộng hiệu năng mạnh mẽ, khả năng đa nhiệm tốt.\r\n\r\nHiệu năng hàng đầu với Intel core i5 thế hệ 12\r\nIntel Core I5-12500H được đánh giá là sự kết hợp hoàn hảo nhất với RTX 4060 với 12 nhân và 16 luồng. Cùng với đó xung nhịp tối đa lên đến 4.5 Ghz cũng đảm bảo hiệu năng của Gigabyte G5 KF-E3PH333SH luôn được ổn định khi sử dụng những phần mềm đòi hỏi CPU phải xử lý, tính toán liên tục. Số nhân, luồng lớn trên Core i5-12500H mang đến khả năng xử lý tốt trong lúc chơi game mà không gặp phải tình trạng nghẽn cổ chai.\r\n\r\nHiệu năng laptop Gigabyte G5 KF-E3PH333SH\r\n\r\nĐa nhiệm tốt, khả năng nâng cấp mở rộng thoải mái\r\nBộ nhớ 8GB RAM có thể xem là mức dung lượng vừa đủ để chơi một số tựa game nhẹ hay phục vụ các nhu cầu giải trí cơ bản như xem phim, xem video,... Tuy nhiên nếu bạn là một game thủ muốn trải nghiệm các game AAA thì laptop Gigabyte G5 KF-E3PH333SH cũng có thể đáp ứng với khả năng nâng cấp mở rộng, tối đa đến 64GB RAM trên với 1 khe ram trống.\r\n\r\nCấu hình laptop Gigabyte G5 KF-E3PH333SH\r\n\r\nTốc độ khởi động cũng như thời gian load ứng dụng sẽ mang lại trải nghiệm tốt nhất cho người dùng, hiểu được điều này Gigabyte G5 KF-E3PH333SH đã trang bị ổ cứng 512GB SSD M.2. \r\n\r\nXử lý đồ họa tốt trên RTX 4060, màn hình 15.6 inch\r\nLaptop Gigabyte G5 KF-E3PH333SH được ưa chuộng bởi đông đảo người dùng, phần lớn đều đánh giá cao card đồ họa RTX 4060 được tích hợp trên dòng laptop này. Với nhiều công nghệ hiện đại đi kèm như Ray Tracing, DLSS thì RTX 4060 không chỉ mang đến khả năng chiến game FPS cao mà còn tạo ra hình ảnh vô cùng chân thật cùng hiệu ứng ánh sáng sống động.\r\n\r\nCấu hình laptop Gigabyte G5 KF-E3PH333SH\r\n\r\nNgoài trải nghiệm game, các tác vụ như xem phim hay làm việc hằng ngày cũng sẽ không làm bạn thất vọng. Được trang bị màn hình 15.6 inch độ phân giải Full HD cùng tấm nền IPS góc nhìn rộng cùng tần số quét lên đến 144Hz, mọi hình ảnh hiển thị đều trở nên mượt mà và rõ nét hơn.\r\n\r\nTrải nghiệm gõ tốt trên bàn phím full size, hiệu ứng âm thanh sống động\r\nĐể góc gaming của bạn thêm phần rực rỡ trong mỗi trận đấu, Gigabyte G5 KF-E3PH333SH hỗ trợ bàn phím full size với hành trình phím sâu cùng đèn led lên đến 15 màu. Hiệu ứng âm thanh cũng được Gigabyte rất chăm chút khi tung dòng laptop gaming mới nhất ra thị trường với cặp loa kép 2W cùng công nghệ DTS Ultra Audio Technology.\r\n\r\nThiết kế laptop Gigabyte G5 KF-E3PH333SH\r\n\r\nNgoài ra, việc kết nối với các thiết bị ngoại vi như chuột, bàn phím hay màn hình cũng trở nên dễ dàng hơn với các cổng kết nối như Type-C, Type-A, HDMI, Audio… Điều này giúp laptop Gigabyte G5 KF-E3PH333SH được đánh giá là sản phẩm có khả năng kết nối linh hoạt.');

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
('hBa65rhA5znDdAcSpQw5hW9FRpc6txpBPcj08w41', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '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dXRlcyI7YTo4OntzOjI6ImlkIjtpOjE0O3M6NDoibmFtZSI7czo5OiJBZG1pbjEyMzQiO3M6NToiZW1haWwiO3M6MTc6IkFkbWluMjNAZ21haWwuY29tIjtzOjEzOiJwcm9maWxlX2ltYWdlIjtzOjU5OiJwcm9maWxlX2ltYWdlcy8yYmdXc280ZlpTOHRKb2Fic0xHQnhLVFlmeG5TRjgzRDBZQ1VPS0FSLmpwZyI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEyJHFFd3R4VFdqZVcvNDBvalMza3lvQmVYQndsQ1BpeTBXLmlKbzg3VS5JZnNaY2ZiUVo3Y1V5IjtzOjU6InBob25lIjtzOjEwOiIwNzc3Nzc3Nzc3IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI1LTAzLTI2IDIxOjAzOjQ0IjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI1LTAzLTI2IDIxOjA0OjIzIjt9czoxMToiACoAb3JpZ2luYWwiO2E6ODp7czoyOiJpZCI7aToxNDtzOjQ6Im5hbWUiO3M6OToiQWRtaW4xMjM0IjtzOjU6ImVtYWlsIjtzOjE3OiJBZG1pbjIzQGdtYWlsLmNvbSI7czoxMzoicHJvZmlsZV9pbWFnZSI7czo1OToicHJvZmlsZV9pbWFnZXMvMmJnV3NvNGZaUzh0Sm9hYnNMR0J4S1RZZnhuU0Y4M0QwWUNVT0tBUi5qcGciO3M6ODoicGFzc3dvcmQiO3M6NjA6IiQyeSQxMiRxRXd0eFRXamVXLzQwb2pTM2t5b0JlWEJ3bENQaXkwVy5pSm84N1UuSWZzWmNmYlFaN2NVeSI7czo1OiJwaG9uZSI7czoxMDoiMDc3Nzc3Nzc3NyI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNS0wMy0yNiAyMTowMzo0NCI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNS0wMy0yNiAyMTowNDoyMyI7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjowO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YToxOntpOjA7czo4OiJwYXNzd29yZCI7fXM6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTE6IgAqAGZpbGxhYmxlIjthOjc6e2k6MDtzOjQ6Im5hbWUiO2k6MTtzOjU6ImVtYWlsIjtpOjI7czoxMzoicHJvZmlsZV9pbWFnZSI7aTozO3M6ODoicGFzc3dvcmQiO2k6NDtzOjU6InBob25lIjtpOjU7czoxMDoiY3JlYXRlZF9hdCI7aTo2O3M6MTA6InVwZGF0ZWRfYXQiO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE5OiIAKgBhdXRoUGFzc3dvcmROYW1lIjtzOjg6InBhc3N3b3JkIjtzOjIwOiIAKgByZW1lbWJlclRva2VuTmFtZSI7czoxNDoicmVtZW1iZXJfdG9rZW4iO319', 1744027342);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `product_id` (`product_id`);

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
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `fk_components` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
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
  ADD KEY `color_id` (`color_id`),
  ADD KEY `fk_laptops_brand_id` (`brand_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessories`
--
ALTER TABLE `accessories`
  ADD CONSTRAINT `accessories_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `accessories_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);

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
  ADD CONSTRAINT `laptops_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `laptops_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);

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
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
