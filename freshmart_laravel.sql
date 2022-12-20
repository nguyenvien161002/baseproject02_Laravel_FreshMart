-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 11:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshmart_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_11_17_134657_tbl_users', 2),
(4, '2022_11_17_185424_tbl_products', 3),
(5, '2022_11_20_111652_tbl_category_product', 4),
(7, '2022_11_21_171804_tbl_news', 5),
(8, '2022_11_21_193634_tbl_products', 6),
(10, '2022_11_22_181031_tbl_authorization', 8),
(11, '2022_11_22_182507_tbl_authorization', 9),
(12, '2022_11_22_183203_tbl_authorization', 10),
(13, '2022_11_22_183249_tbl_users', 11),
(15, '2022_11_22_154407_tbl_banner', 12),
(16, '2022_11_22_184744_tbl_authorization', 12),
(17, '2022_11_22_185708_tbl_users', 13),
(18, '2022_11_22_190226_tbl_products', 14),
(19, '2022_11_22_190538_tbl_authorization', 15),
(26, '2022_11_22_190632_tbl_users', 16),
(27, '2022_11_25_131200_tbl_orders', 16),
(29, '2022_11_25_154323_tbl_orders', 17),
(30, '2022_11_25_154333_tbl_details_order', 17),
(39, '2022_11_27_160214_tbl_users', 21),
(40, '2022_11_28_225651_tbl_users', 22),
(41, '2022_11_28_230924_tbl_users', 23),
(42, '2022_11_28_232152_tbl_users', 24),
(77, '2022_12_01_220221_tbl_authorization', 25),
(78, '2022_12_01_220244_tbl_admin', 25),
(79, '2022_12_01_220301_tbl_staffs', 25),
(80, '2022_12_01_220321_tbl_users', 25),
(81, '2022_12_01_220434_tbl_category_product', 25),
(91, '2022_12_01_220459_tbl_products', 26),
(92, '2022_12_01_220518_tbl_news', 26),
(93, '2022_12_01_220534_tbl_banner', 26),
(98, '2022_12_01_220552_tbl_orders', 27),
(99, '2022_12_01_220651_tbl_details_order', 27),
(100, '2022_12_08_204307_create_jobs_table', 27),
(101, '2022_12_08_213445_create_failed_jobs_table', 27),
(107, '2022_12_20_085222_tbl_address_user', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_user`
--

CREATE TABLE `tbl_address_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_default` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_address_user`
--

INSERT INTO `tbl_address_user` (`id`, `id_user`, `fullname`, `address_default`, `number_phone`, `state`, `created_at`, `updated_at`) VALUES
(6, 69488595, 'Nhật Đặng', '450, đường Trần Đại Nghĩa|Phường Hàng Đào|Quận Hoàn Kiếm|Thành phố Hà Nội', '0694235822', 0, '2022-12-20 18:06:43', '2022-12-20 19:16:13'),
(8, 69488595, 'Tùng Trương', '30, Đường Lưu Quan Vũ|Xã Thượng Phùng|Huyện Mèo Vạc|Tỉnh Hà Giang', '0368736172', 1, '2022-12-20 19:21:22', '2022-12-20 19:21:22'),
(9, 407854273, 'Nguyễn Viên', '450, đường Trần Đại Nghĩa|Xã Cư Pơng|Huyện Krông Búk|Tỉnh Đắk Lắk', '0372695578', 1, '2022-12-20 22:08:41', '2022-12-20 22:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_authorization` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_name`, `password`, `id_authorization`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-12-01 15:19:03', '2022-12-01 15:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authorization`
--

CREATE TABLE `tbl_authorization` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_authorization`
--

INSERT INTO `tbl_authorization` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Quản trị hệ thống'),
(2, 'Nhân Viên', 'Nhân viên cửa hàng'),
(3, 'Khách hàng', 'Người dùng đăng kí tài khoản và đăng nhập'),
(4, 'K.hàng FB', 'Người dùng đăng kí/đăng nhập tài khoản bằng fb'),
(5, 'K.hàng GG', 'Người dùng đăng kí/đăng nhập tài khoản bằng gg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `name`, `image`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Khám pha hương vị hưu cơ', 'banner_1.webp', 1, '2022-12-01 11:17:04', '2022-12-01 11:18:39'),
(2, 'Nước trái cây từ thiên nhiên', 'banner_2.webp', 1, '2022-12-01 11:19:14', '2022-12-01 11:19:14'),
(3, 'Thực phẩm sạch nhập khẩu 100%', 'banner_3.webp', 0, '2022-12-01 11:22:07', '2022-12-01 11:32:08'),
(4, 'Thực phẩm hưu cơ giàu dinh dưỡng', 'banner_4.webp', 0, '2022-12-01 11:23:08', '2022-12-09 10:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id`, `name`, `description`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Trái cây', '<p>Trái cây được biết đến như nguồn chất xơ dồi dào, chứa nhiều dinh dưỡng và vitamin nên việc bổ sung trái cây hàng ngày đem lại nhiều lợi ích tuyệt vời cho cơ thể.Việt Nam ta với nguồn trái cây đa dạng, phong phú, mỗi loại mang đặc điểm khác nhau nên công dụng cũng khác nhau.</p>', 1, '2022-12-01 15:26:24', '2022-12-01 15:26:24'),
(2, 'Rau củ quả', '<p>Lựa chọn rau củ sạch khi đi chợ luôn là nỗi băn khoăn của chị em. Nếu không biết cách chọn rau, củ, quả tươi ngon thì có thể sẽ mang bệnh...</p>', 1, '2022-12-01 15:27:06', '2022-12-01 15:27:06'),
(3, 'Hải sản tươi', '<p>Trong một số loại hải sản có chứa hàm lượng DHA và vitamin A dồi dào, rất tốt cho việc tăng cường thị lực. Ngoài ra, vitamin B và vitamin B12 trong hải sản có tác dụng hỗ trợ kiểm soát quá trình nhận thức, tăng cường khả năng não bộ.</p>', 1, '2022-12-01 15:27:17', '2022-12-01 15:27:17'),
(4, 'Thịt tươi', '<p>Thịt tươi hay thịt tươi sống hay thịt tươi ngon là tên gọi chỉ chung cho các loại thịt được sử dụng khi vừa qua giết mổ, thông dụng đó là các loại thịt gia súc (thịt đỏ) và thịt gia cầm (thịt trắng). Thịt tươi là nguyên liệu cho món thịt tái. Một số loại thịt phổ biến vẫn thường được sử dụng để chế biến các món ăn thường ngày là thịt bò, thịt heo, thịt gà, thịt cừu, trên thị trường, nhìn màu sắc và sờ là hai cách chính giúp người nội trợ tránh mua nhầm thịt cũ hay thịt ôi.[1]</p>', 1, '2022-12-01 15:27:27', '2022-12-01 15:27:27'),
(5, 'Thực phẩm khô', '<p>Xem nhanh Thực phẩm khô là thành phẩm của các loại trái cây, thịt đã được sấy hoặc phơi cho thoát thành phần nước bên trong. Thực phẩm khô gồm thường xuyên loại trong đó có loại truyền thống như tôm khô, các loại hạt.</p>', 1, '2022-12-01 15:27:38', '2022-12-01 15:27:38'),
(6, 'Đồ uống', '<p>Thức uống hay đồ uống là một loại chất lỏng được đặc biệt chế biến để con người có thể tiêu thụ, có tác dụng giải nhiệt và giải khát. Thức uống đóng vai trò quan trọng trong văn hóa của con người.</p>', 1, '2022-12-01 15:27:49', '2022-12-01 15:27:49'),
(7, 'Bơ sữa', '<p>Bơ (trong tiếng Pháp được gọi là Beurre, tiếng Anh là Butter) là một chế phẩm làm từ sữa, được tạo ra trong quá trình đánh và khuấy trộn để tách các chất béo ra khỏi sữa đã lên men (của những động vật có vú).</p>', 1, '2022-12-01 15:28:06', '2022-12-01 15:28:06'),
(8, 'Thực phẩm tết', '<p>Thịt bò, thịt lợn có lẽ là món ăn không thể thiếu trong dịp Tết của mọi gia đình Việt. Tuy nhiên, hiện nay, trên thị trường xuất hiện nhiều cơ sở sản xuất thịt lợn nhiễm bệnh, thịt bò làm giả. Chính vì vậy, khi bạn lựa chọn thịt thì chú ý đến màu thịt sao cho còn độ tươi, màng ngoài khô, vết cắt có màu sắc bình thường, không có mùi lạ, mùi hôi. Thị...</p>', 1, '2022-12-01 15:28:18', '2022-12-01 15:28:18'),
(9, 'Hạt giống', '<p>Hạt Giống là thức ăn thường bỏ lại trên mặt đất vào Mùa Hè bởi Chim. Mặc dù có thể ăn nhưng chúng thường trồng để lấy quả. Khi trồng, có cơ hội khác nhau để cây phát triển thành Bắp (32%), Cà Rốt (32%), Bí Ngô (11%), Cà Tím (11%), Lựu (5%), Sầu Riêng (5%) hoặc Thanh Long (5%) ( xem Trồng Trọt để hiểu rõ hơn ).</p>', 1, '2022-12-01 15:28:30', '2022-12-09 17:09:39'),
(10, 'Đồ ăn đóng hộp', '<p>Đồ hộp bổ sung hàm lượng chất dinh dưỡng đầy đủ cho bữa ăn của bạn. Với thực phẩm đóng hộp, bạn không cần mất quá nhiều thời gian để nấu ăn. Đồ hộp có kích thước nhỏ gọn, bạn có thể mang theo đi du lịch, đi công tác xa dễ dàng. Giá cả hợp lý thậm chí làm thấp hơn những thực phẩm tươi sống. Tuy nhiên, bạn không nên làm dụng quá nhiều thực phẩm đóng ...</p>', 1, '2022-12-01 15:28:41', '2022-12-09 17:10:05'),
(11, 'Sản phẩm bán chạy', '<p>Top Bán Chạy Sản Phẩm Thực phẩm tươi sống và thực phẩm đông lạnh ... Đóng gói sản phẩm: Đây cũng là một trong những cách giúp bạn nhận biết mình loại thực phẩm bạn chọn có đảm bảo chất lượng hay không. Các loại thực phẩm được đóng khuôn bằng máy công ...</p>', 1, '2022-12-01 15:29:01', '2022-12-09 17:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_details_order`
--

CREATE TABLE `tbl_details_order` (
  `order_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_of_measure` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `into_money` int(11) NOT NULL,
  `id_category_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_details_order`
--

INSERT INTO `tbl_details_order` (`order_code`, `id_product`, `name`, `quantity`, `unit_of_measure`, `price`, `discount`, `into_money`, `id_category_product`, `created_at`, `updated_at`) VALUES
('OKZWYYXSIY', 1, 'Ổi lê ruột đỏ', 1, 'kg', 50000, 60, 20000, 1, '2022-12-20 02:03:09', '2022-12-20 02:03:09'),
('OKZWYYXSIY', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 02:03:09', '2022-12-20 02:03:09'),
('CB7AIH0QNS', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 02:04:37', '2022-12-20 02:04:37'),
('CB7AIH0QNS', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 02:04:37', '2022-12-20 02:04:37'),
('CB7AIH0QNS', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 02:04:38', '2022-12-20 02:04:38'),
('HZJ2BUATTD', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 02:08:35', '2022-12-20 02:08:35'),
('HZJ2BUATTD', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 02:08:35', '2022-12-20 02:08:35'),
('HZJ2BUATTD', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 02:08:35', '2022-12-20 02:08:35'),
('GK5RFSOKUO', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 02:09:12', '2022-12-20 02:09:12'),
('GK5RFSOKUO', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 02:09:12', '2022-12-20 02:09:12'),
('GK5RFSOKUO', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 02:09:12', '2022-12-20 02:09:12'),
('J6ABFUUWV4', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 02:09:51', '2022-12-20 02:09:51'),
('J6ABFUUWV4', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 02:09:51', '2022-12-20 02:09:51'),
('J6ABFUUWV4', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 02:09:51', '2022-12-20 02:09:51'),
('O671CVHCBV', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 02:16:39', '2022-12-20 02:16:39'),
('O671CVHCBV', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 02:16:39', '2022-12-20 02:16:39'),
('O671CVHCBV', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 02:16:39', '2022-12-20 02:16:39'),
('OWBLFS5HPS', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 02:23:47', '2022-12-20 02:23:47'),
('OWBLFS5HPS', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 02:23:47', '2022-12-20 02:23:47'),
('OWBLFS5HPS', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 02:23:47', '2022-12-20 02:23:47'),
('4B7EWMGQW2', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 02:24:39', '2022-12-20 02:24:39'),
('4B7EWMGQW2', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 02:24:39', '2022-12-20 02:24:39'),
('4B7EWMGQW2', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 02:24:39', '2022-12-20 02:24:39'),
('Q4EE5OJLS6', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 08:30:27', '2022-12-20 08:30:27'),
('Q4EE5OJLS6', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 08:30:27', '2022-12-20 08:30:27'),
('Q4EE5OJLS6', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 08:30:27', '2022-12-20 08:30:27'),
('NMUJE5V56R', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 08:53:56', '2022-12-20 08:53:56'),
('NMUJE5V56R', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 08:53:56', '2022-12-20 08:53:56'),
('NMUJE5V56R', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 08:53:56', '2022-12-20 08:53:56'),
('YWUE0435I8', 4, 'Chanh tươi vỏ xanh', 1, 'kg', 38000, 21, 30000, 1, '2022-12-20 08:54:35', '2022-12-20 08:54:35'),
('YWUE0435I8', 3, 'Dâu tây', 1, 'kg', 238000, 42, 138000, 1, '2022-12-20 08:54:35', '2022-12-20 08:54:35'),
('YWUE0435I8', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 08:54:35', '2022-12-20 08:54:35'),
('JGYQV3G01S', 2, 'Đào đỏ Mỹ', 1, 'kg', 68000, 41, 40000, 1, '2022-12-20 22:08:50', '2022-12-20 22:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `content`, `image`, `author`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Đi chợ online: Xu hướng lên ngôi mùa dịch Covid-19', '<p>“Mua hàng online thì cũng chủ yếu mua ở những nơi quen, tin tưởng. Book online rồi nhận vào những giờ cố định như sau giờ đi làm. Hoặc như tuần này làm việc ở nhà thì mình cũng sẽ lựa chọn là book hàng online sau đó nhận ở tại sảnh”, chị Bùi Thanh Vân chia sẻ.</p><p>Từ khi tình hình dịch Covid 19 diễn biến phức tạp, doanh thu của hệ thống cửa hàng Thực phẩm nông sản sạch Thanh Long (ở phố Vạn Bảo, quận Ba Đình, Hà Nội) giảm mạnh so với trước. Nắm bắt được tâm lý của khách hàng không muốn ra ngoài tiếp xúc với nhiều người, đơn vị đã đẩy mạnh bán hàng online qua Facebook và Zalo. Việc bán hàng trực tuyến hiện đang chiếm hơn 50% tổng doanh thu của cửa hàng. Theo anh Nguyễn Minh Long, chủ cửa hàng Thực phẩm nông sản sạch Thanh Long, hướng đi này đã giúp cho đơn vị đảm bảo doanh thu, nhờ đó tạo nên sự an tâm hơn cho khách hàng cũng như đội ngũ nhân viên.</p><p>“Trước đây, khách hàng chưa có thói quen tiêu dùng online cho lắm nhưng thời gian gần đây, dịch gia tăng thì khách hàng có thói quen tiêu dùng online rất nhiều và chúng tôi đang cố gắng đẩy mạnh hơn chương trình bán online nhiều hơn và chăm sóc khách hàng thường xuyên hơn để khách hàng biết đến và mua nhiều mặt hàng sản phẩm hơn”, anh Nguyễn Minh Long nói.</p><p>Không chỉ các cửa hàng lớn, hiện nay, việc kinh doanh online của các hộ kinh doanh nhỏ cũng được dịp nở rộ, nhất là với một số loại thực phẩm sạch được chế biến sẵn. Từ khi tình hình dịch bệnh căng thẳng, nhu cầu đặt hàng các mặt hàng chế biến sẵn như: giò chả, lạc rang muối vừng, nem cuốn của cửa hàng Đặc sản truyền thống (ở phố Thụy Khuê, quận Tây Hồ, Hà Nội) đều tăng gấp đôi so với trước.</p><p>“Những món mình làm rất dễ bảo quản, tiện cho người dùng, rút ngắn thời gian của khách trong việc chuẩn bị cơm cho cả gia đình, đồng thời tránh khách phải ra ngoài tiếp xúc với nguy cơ lây lan Covid-19 rất cao. Để khách luôn theo mình và quan tâm đến món mình làm ra thì nguyên liệu phải chuẩn, có truy xuất nguồn gốc. Cùng với đó là kỹ thuật nấu ra món phải kiên trì, có tâm mới hút được khách hàng”, chị Lê Ánh Nguyệt, chủ cửa hàng Đặc sản truyền thống cho hay.</p><p>Theo một số công ty phân phối thực phẩm qua sàn thương mại điện tử, các khâu trung gian đang khiến giá thành sản phẩm bị đẩy lên cao hơn khi đến tay người tiêu dùng. Hơn nữa, chất lượng sản phẩm cũng bị ảnh hưởng do trải qua nhiều khâu vận chuyển và bảo quản.</p><p>“Thông qua việc kết nối trực tiếp từ nhà sản xuất đến người tiêu dùng thì chúng tôi có thể cân đối được lượng hàng hóa, khả năng sản xuất, khả năng cung ứng để tập trung vào những thực phẩm, sản phẩm thiết yếu với người tiêu dùng cũng như là những nhu cầu đặc biệt. Với nền tảng sử dụng công nghệ, chúng tôi cố gắng giảm bớt tối đa các khâu trung gian, bảo toàn về chất lượng và tối ưu về giá đến tay người tiêu dùng”, ông Hà Mạnh Hùng, Phó Giám đốc Công ty Cổ phần Ubofood Việt Nam cho biết.</p><p>Bên cạnh việc triển khai phòng hộ 3 lớp, vừa kiểm tra thân nhiệt, vệ sinh sát khuẩn cho khách hàng đi siêu thị, tránh làm lây lan dịch bệnh khi tiếp xúc với hàng hóa, nhiều siêu thị có đội ngũ nhân viên shipper còn kiểm tra thân nhiệt, theo dõi sức khỏe của người giao hàng, nhằm đảm bảo an toàn trong mùa dịch bệnh.</p><p>“Chúng tôi đều thực hiện những bước hướng dẫn của Bộ Y tế một cách nghiêm ngặt như đo thân nhiệt, ghi nhận nhiệt độ, sát khuẩn tay, khử trùng môi trường làm việc. Khi giao hàng tại nhà cho khách mua hàng, chúng tôi cũng tuân thủ qui định về tiếp xúc khách hàng, khử trùng sát khuẩn để mỗi khách hàng có thể an tâm nhận hàng hóa”, ông Nguyễn Ngô Anh Tuấn, Giám đốc Chiến lược sản phẩm Lotte Mart thông tin thêm.</p><p>Không chỉ trong mùa dịch bệnh, hình thức mua sắm trực tuyến đang và sẽ trở thành xu hướng tiêu dùng tất yếu phổ biến hiện nay. Khi tình hình dịch Covid 19 vẫn còn nhiều diễn biến phức tạp. Trong những khó khăn chung, thì đây chính là cơ hội cho các doanh nghiệp, cơ sở kinh doanh phát triển mạnh hình thức bán hàng trực tuyến. Tuy nhiên, để có thể phát triển bền vững và chiếm được lòng tin của khách hàng, vấn đề chất lượng sản phẩm luôn cần được các đơn vị kinh doanh đặt lên hàng đầu.</p>', 'n1.webp', 'Nguyễn Văn Viên', 1, '2022-12-01 11:56:41', '2022-12-06 04:40:35'),
(2, 'Cách chọn rau củ quả sạch tươi ngon, không \'ngậm độc\'', '<p>Lựa chọn rau củ sạch khi đi chợ luôn là nỗi băn khoăn của chị em. Nếu không biết cách chọn rau, củ, quả tươi ngon thì có thể sẽ mang bệnh vào người vì chọn nhầm những loại chuyên \'ngậm độc\'.</p><p>Bên cạnh chuyện ăn ngon, việc đảm bảo an toàn sức khỏe cho các thành viên trong gia đình cũng rất quan trọng. Một món ăn ngon trước hết cần nguồn thực phẩm tươi ngon, sau đó mới đến cách chế biến.</p><p>Để mua được thực phẩm sạch tươi ngon, ngoài việc nên mua ở những nơi đáng tin cậy, có dấu kiểm dịch thì mỗi người cũng phải có kiến thức, kinh nghiệm. Bạn hãy bỏ túi những mẹo lựa chọn rau củ, quả tươi ngon sau đây.</p><p>1. Chọn rau củ tươi dựa vào hình dáng bên ngoài</p><p>Rau quả tươi thường còn lành lặn, nguyên vẹn, không bị trầy xước hay nát, phần cuống không bị thâm nhũn. Các loại rau, củ quả phải gọt vỏ như bí, bầu, mướp... thường an toàn hơn các loại rau ăn lá.</p><p>Rau bị phun thuốc kích thích thường có lá xanh tốt bất thường, cọng rất non, to mập, những bó rau đó chỉ cần để từ sáng đến chiều là có thể bị nẫu, héo rũ.</p><p>Nên tránh những quả có vẻ ngoài phổng phao, mập mạp. Vì đó có thể là đã bị tiêm thuốc. Đồng thời, không nên chọn những trái hoặc củ quá lớn, da căng và có vết nứt dọc theo thân. Chỉ nên chọn những trái có kích thước vừa phải hoặc hơi nhỏ.</p><p>2. Dựa vào màu sắc để chọn rau củ quả tươi</p><p>Rau củ và quả tươi có màu sắc tự nhiên, không bị héo úa. Không có bất kì màu sắc bất thường nào. Bạn nên chú ý các loại củ quả màu xanh hoặc có màu sắc khá thất thường.</p><p>Với rau ăn lá: không nên chọn những loại rau có màu xanh quá đậm, quá mướt, lá bóng mà nên chọn rau có màu xanh nhạt, cây rau nhìn bình thường.</p><p>Với trái và củ: không nên chọn củ quá xanh bóng hoặc màu sắc nhìn quá mướt.</p><p>3. Rau củ quả không dính chất lạ</p><p>Hiện nay, rất nhiều thương lái vì lợi ích mà sử dụng hóa chất vào các loại rau, củ quả. Vì lí do đó mà rất nhiều rau củ thường dính các chất bảo quản thực vật trên lá, cuống lá, cuống quả hoặc núm quả… Đồng thời, xuất hiện các vết lấm tấm hoặc vết trắng, vết lạ ở rau hoặc củ. Nếu gặp những loại này bạn không nên chọn mua chúng.</p><p>4. Dùng tay sờ nắm để cảm nhận rau củ quả tươi</p><p>Lấy tay cầm và sờ vào rau củ quả, nếu có cảm giác nặng tay, giòn chắc thì đó chính là thực phẩm tươi sạch.</p><p>Còn nếu cầm lên mà thấy nhẹ tay thì những thực phẩm đó đã có phun thuốc trừ sâu hoặc hóa chất ở trong đó.</p><p>5. Chọn rau củ quả tươi bằng mùi hương</p><p>Thông thường, rau củ quả tươi sẽ có mùi đặc trưng của từng loại. Còn khi ngửi mà nhận thấy chúng có mùi lạ, mùi hắc hắc, mùi thuốc sâu hay hóa chất thì đó là rau củ quả không tươi ngon, cũng có thể là đã cũ và được người bán nhúng qua hóa chất để nhìn được tươi ngon hơn.</p><p>Cách chọn rau củ quả sạch tươi ngon, không \'ngậm độc\'</p><p>Để chọn rau củ quả tươi cần lưu ý 4 \'không\':</p><p>- Không nên mua rau củ quả trái mùa vụ. Vì nếu mua trái mùa, rau củ sẽ không phát triển tốt, dễ bị sâu và người trồng sẽ dùng thuốc trừ sâu, hóa chất bảo vệ thực vật, thuốc kích thích để rau củ quả được chín nhanh và đẹp mắt.</p><p>- Không nên chọn mua rau củ quả đã được gọt, thái sẵn và ngâm nước ngoài chợ. Vì rất có thể đó những loại rau củ đã hư hoặc đã lâu, người bán muốn tận dụng những phần còn dùng được để bán.</p><p>- Không lựa chọn rau củ quả quá bất thường về mùi vị, màu sắc và những nơi đã có người bị ngộ độc.</p><p>- Không nên quá tin tưởng vào vẻ bề ngoài của rau củ quả. Vì đôi khi người bán dùng nó để đánh lừa chúng ta.</p><p>Bí quyết chọn một số loại rau củ quả cụ thể:</p><p>1. Giá đỗ: Bạn nên chọn những cọng giá cao khoảng 6cm, không quá to và thô, không xuất hiện mùi lạ, có màu trắng ngà ngà, có nhiều rễ.</p><p>2. Rau muống: Tránh chọn những bó rau có ngọn non, vươn dài mơn mỡn, có thân hình to hơn bình thường, lá có màu xanh đen. Vì chúng thường đã bị phun thuốc kích thích tăng trưởng. Nên chọn những bó rau có ngọn nhỏ, nhìn hơi cứng, khi ngắt sẽ có mủ của rau muống chảy ra.</p><p>3. Khoai môn: Chọn khoai môn có kích thước vừa, khoai còn mới, bên trong trắng đục, vân tím thì khoai sẽ ngon, nhiều bột.</p><p>4. Đu đủ: Nên chọn quả già mới chuyển màu vàng hườm, có độ cứng.</p><p>5. Xà lách, rau diếp tươi: lá xanh non và còn cứng; khi trộn salad sẽ giữ được độ giòn.</p><p>6. Mướp đắng: Bên chọn quả to, gai nở thì quả sẽ giòn, ít bị đắng.</p><p>7. Su hào: Cọn su hào \'bánh xe\' tức là phần cuống lá hơi lõm xuống, củ còn xanh tươi là su hào ngon.</p>', 'n2.webp', 'Nguyễn Văn Viên', 1, '2022-12-01 11:58:09', '2022-12-06 04:40:23'),
(3, 'Các loại ngũ cốc tốt cho sức khỏe', '<p>1. Yến mạch</p><p>Yến mạch là một loại ngũ cốc nguyên hạt, giàu chất xơ và các chất dinh dưỡng thiết yếu khác như vitamin B, sắt và magie. Trong một chén yến mạch (117 gram) sẽ cung cấp 4 gram chất xơ, 18% photpho và selen, 16% kẽm và 68% mangan.</p><p>Yến mạch thường được nghiền nát để chế biến thành thực phẩm dưới dạng bột hoặc cháo. Hiện nay, ngũ cốc yến mạch đã có mặt tại khắp các hệ thống bán hàng trên toàn cầu, tuy nhiên người tiêu dùng vẫn nên tự làm loại ngũ cốc này tại nhà bởi yến mạch chế biến sẵn thường chứa nhiều đường và các chất không có lợi cho sức khỏe.</p><p>Bột yến mạch rất đa năng và có thể chế biến theo nhiều cách khác nhau. Nó thường được pha với nước sôi hoặc sữa, sau đó phủ một lớp trái cây tươi, quế hoặc các loại hạt để thưởng thức. Ngoài ra, bạn cũng có thể sử dụng chúng làm bữa ăn sáng bằng cách trộn yến mạch cùng với sữa chua và để qua đêm.</p><p>2. Ngũ cốc Muesli</p><p>Muesli là một loại ngũ cốc thô, được tạo thành từ sự kết hợp của các loại ngũ cốc, các loại hạt và trái cây khô. Loại ngũ cốc này không chứa bất kỳ loại dầu hay chất tạo ngọt nào, hơn nữa đây còn là một nguồn thực phẩm cung cấp rất nhiều dưỡng chất quan trọng cho cơ thể, bao gồm protein, chất xơ, vitamin và khoáng chất.</p><p>Việc bổ sung muesli vào chế độ ăn uống hàng ngày sẽ giúp bảo vệ sức khỏe khỏi các loại bệnh tật, chẳng hạn như cao huyết áp, ung thư vú, ung thư buồng trứng, bệnh tim,…</p><p>Ngoài ra, bạn cũng có thể làm giảm lượng carb có trong muesli bằng cách tạo ra một phiên bản không có hạt, được làm từ các mảnh dừa, các loại hạt và nho khô.</p><p>3. Ngũ cốc Granola</p><p>Granola cũng là một lựa chọn tuyệt vời khác dành cho sức khỏe. Thành phần chính của loại ngũ cốc này bao gồm yến mạch, các loại hạt và trái cây được sấy khô trong lò cho tới khi trở nên giòn tan.</p><p>Ngũ cốc Granola có chứa một lượng lớn protein và các chất béo lành mạnh. Ngoài ra, nó còn là một nguồn nguyên liệu cung cấp dồi dào các loại vitamin và khoáng chất, chẳng hạn như vitamin B, magie, phốt pho và mangan.</p><p>Mặc dù có hàm lượng chất dinh dưỡng cao, nhưng hầu hết các sản phẩm ngũ cốc Granola có tại các cửa hàng đều có xu hướng nạp theo đường, đó là lý do vì sao tốt nhất bạn nên tự làm nó.</p><p>Một điểm hạn chế của Granola là tương đối nhiều calo. Thông thường, trong 122 gram Granola sẽ cung cấp khoảng 600 calo. Do đó, bạn nên ăn với một lượng vừa phải, kích cỡ khẩu phần ăn hợp lý là khoảng 1⁄4 cốc, tương đương với 85 gram Granola.</p>', 'n3.webp', 'Nguyễn Văn Viên', 1, '2022-12-01 11:58:44', '2022-12-06 04:40:08'),
(4, 'Các cách chế biến món ăn từ rau xanh', '<p>Để có thêm nhiều món ngon từ rau xanh và thay đổi khẩu vị cho những món rau thông thường, bạn hãy tham khảo các cách chế biến món rau dưới đây nhé!</p><p>1. Luộc</p><p>Luộc là phương pháp phổ biến nhất. Phương pháp này nhanh và dễ thực hiện. Nếu bạn thích ăn rau mềm thì luộc sẽ là phương pháp thích hợp nhất. Hầu hết các loại rau đều có thể luộc được. Tuy nhiên, cũng có những loại không thích hợp với cách chế biến này như cà chua, ớt chuông hay cà tím… Chúng sẽ ngon hơn khi được xào hoặc nướng.</p><p>Khi luộc các loại rau có lá màu xanh đậm, nên cho vào chút muối (1,5 lít nước luộc cho vào 1 muỗng cafe muối) để giữ màu xanh cho rau. Lượng nước luộc rau trong nồi phải đảm bảo đủ để rau được ngập hoàn toàn trong nước. Tuy nhiên cũng không nên dùng quá nhiều nước vì sẽ kéo dài thời gian đun nấu, vừa làm rau mất nhiều dưỡng chất hơn mức cần thiết. Để rau không bị mất nhiều chất dinh dưỡng, bạn không nên cho rau vào sớm mà cần chờ nước thật sôi. Thời gian luộc các loại rau có lá màu xanh đậm sẽ ít hơn so với các loại rau củ.</p><p>Nếu luộc rau củ, bạn nên đậy kín nắp nồi trong quá trình luộc. Sau khi luộc xong, cần vớt rau củ ra ngay và cho vào tô nước lạnh. Đối với những loại rau có màu trắng như bông cải trắng hoặc khoai tây, hãy cho thêm một ít nước chanh vào nước luộc rau để chúng không bị thay đổi màu sắc.</p><p>2. Hấp</p><p>Phương pháp này được sử dụng trong trường hợp bạn muốn món rau có độ giòn và chắc. Hấp cũng là cách chế biến giúp giữ được nhiều chất dinh dưỡng trong rau. Đây là lựa chọn tốt dành cho những người quan tâm đến những phương pháp chế biến thực phẩm có ích cho sức khỏe.</p><p>Sử dụng nồi hấp sẽ giúp rau có được hương vị tươi ngon hơn. Măng tây, bông cải trắng, bông cải xanh và đậu ve là những loại rau thích hợp với phương pháp hấp.</p><p>3. Nướng trong lò</p><p>Nướng trong lò sẽ mang đến cho các món rau hương vị khá thơm ngon, đặc biệt là trong những bữa tối giá lạnh của mùa đông. Phương pháp này cũng giúp bảo quản được nhiều chất dinh dưỡng trong rau. Trước khi nướng, bạn có thể ướp thêm gia vị cho rau theo ý thích. Cà rốt, củ cải trắng, khoai tây, khoai lang, bí đỏ và hành tây là những loại rau củ đặc biệt thích hợp với phương pháp này. Bạn trộn chúng trong chiếc thố to cùng với các loại rau khác với ít dầu ô-liu, muối và mật ong. Điều tuyệt vời nhất mà món nướng với rau củ mang lại cho sức khỏe là chúng có hương vị khá thơm ngon nhưng lại không chứa quá nhiều calo.</p><p>4. Hầm</p><p>Đây là phương pháp chế biến rau thích hợp cho những tháng mùa đông. Nếu dùng rau để hầm chung với những nguyên liệu khác, cần nhớ rằng thời gian nấu chín rau sẽ nhanh hơn thịt. Do đó, phải dự kiến thời gian thật “chuẩn” để cho rau vào đúng lúc nhằm tránh trường hợp rau quá nhừ. Phương pháp hầm giúp giữ được hương vị tự nhiên của rau. Hành, nấm rơm và các loại rau có củ chính là những lựa chọn phù hợp nhất dành cho món hầm.</p><p>5. Xào</p><p>Nếu thích món rau có độ giòn thì xào sẽ là lựa chọn tốt nhất. Tuy nhiên, cách chế biến này lại làm cho rau mất đi nhiều chất dinh dưỡng hơn so với những phương pháp khác. Ưu điểm của món xào là nhanh, đơn giản và mang đến hương vị thơm ngon cho rau. Để xào những loại rau có độ cứng như su hào, cà rốt, bông cải xanh..., bạn nên chần sơ trước. Điều này giúp rút ngắn thời gian xào cho món rau</p><p>6. Nướng vỉ</p><p>Những loại rau có chứa nhiều nước phù hợp với phương pháp nướng vỉ. Nếu muốn món rau nướng được thực hiện dễ dàng hơn, bạn nên cắt tất cả nguyên liệu có kích thước như nhau để chúng chín đều hơn. Phương pháp nướng vỉ giúp món rau có hương vị đậm đà và thơm ngon hơn, đặc biệt là với nấm rơm hay măng tây…</p>', 'n4.webp', 'Nguyễn Văn Viên', 1, '2022-12-01 11:59:27', '2022-12-06 04:39:58'),
(5, 'Bật mí 6 bí kíp khi làm vườn rau sạch tại nhà', '<p>Vườn rau sạch tại nhà đang là xu hướng thời thượng đối với khu vực thành thị. Nhiều gia đình còn coi vườn rau là điều không thể thiếu để cung cấp rau sạch mỗi ngày.</p><p>Việc trồng rau không quá phức tạp, nhưng với những người lần đầu tiên làm vườn thì cũng cần nắm bắt thêm thông tin về kỹ thuật không phải chỉ đơn giản là “trồng và thu hoạch” là bạn sẽ có nguồn rau tươi tốt.</p><p>Trong quá trình trồng và chăm sóc sẽ có nhiều điều phát sinh thêm như hạt giống không lên cây, rau bị ngập úng, sâu bọ… Cùng Ăn Sạch Uống Sạch tìm hiểu những kinh nghiệm quý báu để chăm cho vườn rau sạch tại nhà thật tươi tốt nào!</p><p>1. Chọn đất trồng phù hợp và an toàn</p><p>Nhiều gia đình sẽ tận dụng đất sẵn có ở nhà để trồng cho vườn rau sạch tại nhà. Tuy nhiên, loại đất này thường không phù hợp để trồng rau vì đã bị chai cứng, nghèo dưỡng chất, khó giữ ẩm… cây rau sẽ bị giảm chất lượng.</p><p>Lựa chọn đất trồng rau kỹ càng để rau có đủ chất dinh dưỡng</p><p>Bạn nên mua đất sạch trồng rau để có được nguồn đất an toàn, giàu dinh dưỡng, giúp cho vườn rau phát triển tốt.</p><p>2. Ngâm ủ hạt trước khi gieo</p><p>Để đảm bảo tỷ lệ nảy mầm cao cho hạt giống, bạn cần thực hiện bước ngâm ủ trước khi gieo. Cách làm thông thường là ngâm hạt giống trong khoảng 6 – 10 tiếng đồng hồ sau đó đem ủ trong lớp khăn ướt trong 1 – 2 ngày. Khi thấy hạt giống vừa nức vỏ thì bắt đầu gieo, trồng vào chậu.</p><p>3. Lưu ý khi dùng phân bón hóa học cho rau</p><p>Bạn có thể kiểm soát liều lượng phân bón hóa học và chủ động về thời gian cách lý để đảm bảo rau được thu hoạch đảm bảo sạch sẽ và an toàn. Những loại phân hóa học như lân, ure… vừa dễ sử dụng lại không mất nhiều chi phí, bạn có thể sử dụng bằng cách pha loãng với nước và tưới cho rau, đảm bảo vườn rau sạch tại nhà của bạn sẽ xanh tốt mơn mởn.</p><p>4. Tưới rau đúng lưu lượng cần thiết</p><p>Rau trồng tại nhà cần được tưới nhiều nước hơn, nếu là vào mùa nắng thì phải tưới 2 lần trong 1 ngày. Nếu cây nhỏ, bạn cần che bớt ánh nắng gay gắt lúc trưa để tranh làm cây bị héo lá. Vào mùa mưa kéo dài, bạn cần che cho rau để tránh nước mưa rới trực tiếp xuống rau gây dập lá, hư, thối rễ.</p><p>Tưới nước đều độ mỗi ngày để vườn rau phát triển tốt</p><p>Thêm 1 lưu ý là bạn không nên tưới nước vào buổi trưa, nhất là lúc nắng gắt, sẽ khiến vườn rau sạch tại nhà của bạn bị hư hại. Mỗi lần thu hoạch rau, bạn nên chú ý bổ sung phân bón vào để rau phát triển, mọc thêm nhánh lá mới.</p><p>5. Lưu ý khi thu hoạch rau trồng</p><p>Với những loại rau thu hoạch bằng cách nhổ cả cây (cải, xà lách…) bạn nên nhổ thưa xen kẽ để ăn dần, những cây còn lại sẽ nhanh lớn hơn vì không cạnh tranh chất dinh dưỡng nhiều. Còn với những loại rau thu hoạch bằng cách cắt thân, bạn nên dùng kéo hoặc dao để không làm dập hay làm hư hại thân cây, giúp cây rau dễ dàng thêm nhánh mới.</p><p>6. Tái sử dụng lại đất trồng rau sau khi thu hoạch</p><p>Đất trồng rau có thể tái sử dụng nhiều lần. Tuy nhiên, bạn cần lưu ý là nên nhặt hết lá, rễ thừa tồn đọng của lứa rau đã thu hoạch, đồng thời phơi nắng 4 – 5 ngày để triệt tiêu mầm bệnh rồi mới nên tiếp tục sử dụng. Để đất đảm bảo chất lượng đất cho vườn rau sạch tại nhà, bạn nên trộn thêm với đất dinh dưỡng hoặc phân bón (trùn quế) trước khi trồng lại rau mới.</p><p>Làm lại đất là cách tiết kiệm và giúp rau tránh được sâu bệnh</p><p>Hy vọng những kinh nghiệm của Ăn Sạch Uống Sạch sẽ giúp bạn có 1 vườn rau sạch tại nhà xanh tốt, an toàn và có năng suất cao.</p><p>Cần được tư vấn về cách làm vườn rau sạch tại nhà hay các sản phẩm để làm vườn, hãy “bình luận” phía dưới hoặc gọi vào hotline của Ăn Sạch Uống Sạch để được giải đáp ngay nhé!</p>', 'n5.webp', 'Nguyễn Văn Viên', 1, '2022-12-01 12:00:07', '2022-12-06 04:39:42'),
(6, 'Đậu xanh có tác dụng gì? Những món ăn dinh dưỡng từ đậu xanh', '<p>Đậu xanh hay có tên gọi khác đỗ xanh có nguồn gốc từ khu vực Trung Á và Ấn Độ. Chúng thường phân bố chủ yếu tại vùng nhiệt đới và phát triển thuận lợi ở châu Á.</p><p>Loại đậu này có khả năng thích nghi cực tốt với các điều kiện khí hậu. Do vậy, tại Việt Nam chúng được lựa chọn và canh tác khá nhiều</p><p>Đặc điểm của đậu xanh</p><p>Đậu xanh là loại cây thân thảo, tùy thuộc vào giống đậu mà thân sẽ có màu xanh hay chuyển sang tím đỏ. Thân cây có khá nhiều lông tơ và ít dần về phía gốc. Mỗi cây trưởng thành có chiều cao trung bình từ 30 - 60cm.</p><p>Lá kép và cũng có lông tơ ở cả 2 mặt của lá. Hoa đậu xanh mọc ở nách lá, có màu trắng và chuyển dần sang màu vàng nhạt khi nở rộ. Quả đậu xanh có hình thuôn dài khoảng 6 - 10cm, mỗi quả có nhiều hạt bên trong. Phần hạt có nhiều ứng dụng hơn phần vỏ bên ngoài.</p><p>Đặc điểm của đậu xanh</p><p>2. Giá trị dinh dưỡng của đậu xanh</p><p>Trung bình 220gr đậu xanh có chứa các chất dinh dưỡng sau:</p><p>Năng lượng: 212 kcal</p><p>Chất béo: 0.8 gr</p><p>Chất đạm: 14.2 gr</p><p>Chất xơ: 15.4 gr</p><p>Vitamin B1: 24% RDI</p><p>Ngoài ra, đậu xanh còn là nguồn cung cấp dồi dào các chất dinh dưỡng khác như Folate, phốt pho, sắt,…</p><p>Giá trị dinh dưỡng của đậu xanh</p><p>3.Tác dụng của đậu xanh</p><p>Chứa chất chống oxy hóa, ngăn ngừa các bệnh mãn tính</p><p>Đậu xanh là nguồn cung cấp dồi dào các chất chống oxy hóa như: phenolic, flavonoid, axit caffeic và nhiều chất khác nữa. Những chất này có khả năng hạn chế sự hình thành của các gốc tự do bằng cách tiêu diệt các phân tử có hại.</p><p>Một cuộc nghiên cứu trong ống nghiệm đã chứng minh rằng, chất chống oxy hóa bên trong đậu xanh có khả năng vô hiệu hóa các hoạt động của gốc tự do. Điều này giúp cho cơ thể bạn có thể chống lại các căn bệnh mãn tính như ung thư phổi hay ung thư dạ dày.</p><p>Dậu xanh chứa chất chống oxy hóa</p><p>Ngăn ngừa độ quỵ</p><p>Hai hoạt chất vitexin và isovitexin dồi dào trong đậu xanh cũng là 2 chất chống oxy hóa. Chúng giúp chống lại tổn thương các gốc tự do hình thành nên các cơn say nắng, đột quỵ khi nhiệt độ cơ thể tăng cao đột ngột.</p><p>Việc tiêu thụ đậu xanh với hàm lượng vừa phải có thể giúp cơ thể bạn chống lại chứng đột quỵ một cách hiệu quả nhờ vào đặc tính chống viêm của 2 hoạt chất trên.</p><p>Đậu xanh ngăn ngừa nguy cơ bị đột quỵ</p><p>Giảm nguy cơ mắc bệnh tim</p><p>Hàm lượng cholesterol trong máu tỷ lệ thuận với nguy cơ mắc các bệnh về tim mạch và đậu xanh là một trong những loại thực phẩm rất có lợi cho sức khỏe của tim mạch, vì chúng có thể làm giảm hàm lượng cholesterol xấu.</p><p>Một ví dụ trên động vật đã chỉ ra rằng, các hoạt chất trong đậu xanh có khả năng bảo vệ các phần tử LDL tương tác với các gốc tự do không ổn định.</p><p>Đậu xanh giảm nguy cơ mắc bệnh tim</p><p>Giúp làm giảm huyết áp</p><p>Huyết áp cao cũng là một nguyên nhân dẫn đến các bệnh tim mạch và có thể dẫn đến tử vong. Đậu xanh có thể làm giảm huyết áp nhờ vào các chất kali, magie và chất xơ.</p><p>Khi thí nghiệm trên động vật, một số protein trong đậu xanh có thể ngăn chặn các enzym làm tăng huyết áp. Không những vậy, tiêu thụ hạt đậu xanh còn được chứng minh là giảm huyết áp ở người lớn và người không bị cao huyết áp.</p><p>Đậu xanh giúp làm giảm huyết áp</p><p>Hỗ trợ tiêu hóa</p><p>Đậu xanh là nguồn cung cấp chất xơ và tinh bột kháng cực kỳ dồi dào, chính những chất này sẽ là trợ thủ đắc lực cho đường ruột của bạn.</p><p>Tinh bột kháng và chất xơ giúp nuôi dưỡng và hỗ trợ sự phát triển của các lợi khuẩn trong đường ruột. Các lợi khuẩn này có thể sẽ tiêu hóa chất xơ và tinh bột kháng thành các chuỗi axit béo ngắn.</p><p>Không những vậy, carbohydrat trong đậu xanh dễ tiêu hóa hơn so với các thực phẩm khác. Việc tiêu thụ đậu xanh có thể giúp cho hệ tiêu hóa hoạt động \"dễ dàng\" hơn.</p><p>Đậu xanh hỗ trợ hệ tiêu hóa</p><p>Giảm lượng đường trong máu</p><p>Lượng đường trong máu tăng có thể ảnh hưởng nghiêm trọng đến sức khỏe của bạn. Chúng cũng là một trong những yếu tố liên quan đến các bệnh khác như tim mạch hay huyết áp.</p><p>Các nghiên cứu trên động vật cũng cho thấy, đậu xanh rất giàu protein và chất xơ, các chất này có thể duy trì lượng đường trong máu ở mức ổn định thông qua việc làm chậm quá trình giải phóng đường vào máu.</p><p>Đậu xanh giúp làm giảm lượng đường trong máu</p><p>Giúp giảm cân</p><p>Đậu xanh cũng là một trong những thực phẩm hỗ trợ giảm cân cực tốt nhờ vào khả năng làm kéo dài cảm giác no và ngăn chặn hormone gây đói phát triển.</p><p>Một đánh giá của 9 cuộc nghiên cứu đã chỉ ra rằng, khi ăn đậu xanh thì khoảng 39% người tham gia nghiên cứu cảm thấy no và lâu đói hơn.</p><p>đậu xanh hỗ trợ giảm cân</p><p>Hỗ trợ sức khỏe thai kỳ</p><p>Hoạt chất Folate có trong đậu xanh giúp cho thai phụ và thai nhi phát triển ổn định và tối ưu nhất. Trong đậu xanh chứa đến 80% RDI folate, chất này giúp ngăn chặn dị tật bẩm sinh ở thai nhi.</p><p>Không những vậy, việc thêm đậu xanh (nấu chín) vào thực đơn của thai phụ có thể cung cấp hàm lượng sắt và protein đáng kể. Tuy nhiên, mẹ bầu nên tránh ăn giá đỗ vì chúng có thể mang vi khuẩn gây ảnh hưởng không tốt đến sức khỏe.</p>', 'n6.webp', 'Nguyễn Văn Viên', 1, '2022-12-01 12:01:43', '2022-12-09 10:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_phone` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_product_fee` int(11) NOT NULL,
  `transport_fee` int(11) NOT NULL,
  `total_money` int(11) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_code`, `id_user`, `fullname`, `number_phone`, `address`, `payment_method`, `total_product_fee`, `transport_fee`, `total_money`, `state`, `created_at`, `updated_at`) VALUES
('4B7EWMGQW2', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 02:24:38', '2022-12-20 02:24:38'),
('CB7AIH0QNS', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 02:04:37', '2022-12-20 02:04:37'),
('GK5RFSOKUO', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 02:09:12', '2022-12-20 02:09:12'),
('HZJ2BUATTD', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 02:08:35', '2022-12-20 02:08:35'),
('J6ABFUUWV4', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 02:09:51', '2022-12-20 02:09:51'),
('JGYQV3G01S', 407854273, 'Nguyễn Viên', '0372695578', '450, đường Trần Đại Nghĩa, Xã Cư Pơng, Huyện Krông Búk, Tỉnh Đắk Lắk', 'Thanh toán tiền mặt khi nhận hàng', 40000, 20000, 60000, 'Chờ xử lý', '2022-12-20 22:08:50', '2022-12-20 22:08:50'),
('NMUJE5V56R', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 08:53:56', '2022-12-20 08:53:56'),
('O671CVHCBV', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 02:16:39', '2022-12-20 02:16:39'),
('OKZWYYXSIY', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 60000, 20000, 80000, 'Chờ xử lý', '2022-12-20 02:03:09', '2022-12-20 02:03:09'),
('OWBLFS5HPS', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 02:23:47', '2022-12-20 02:23:47'),
('Q4EE5OJLS6', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Quang Trung, Thành phố Hà Giang, Tỉnh Hà Giang', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 08:30:26', '2022-12-20 08:30:26'),
('YWUE0435I8', 69488595, 'NGUYỄN VĂN VIÊN', '0372695578', '450, đường Trần Đại Nghĩa, Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 'Thanh toán tiền mặt khi nhận hàng', 208000, 20000, 228000, 'Chờ xử lý', '2022-12-20 08:54:35', '2022-12-20 08:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `image_main` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_sub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `price`, `discount`, `description`, `details`, `state`, `image_main`, `images_sub`, `id_category_product`, `created_at`, `updated_at`) VALUES
(1, 'Ổi lê ruột đỏ', 50000, 60, '<p>Quả hình tròn, hình trứng hay hình quả lê, dài 3-10 cm tùy theo giống. Vỏ quả còn non màu xanh, khi chín chuyển sang màu vàng, thịt vỏ quả màu trắng, vàng hay ửng đỏ. Ruột trắng, vàng hay đỏ.</p>', '<p>Cây ổi là loài gỗ nhỏ, cây cao từ 3 đến 6 m cây có thể cao đến 10m, đường kính thân tối đa đến 30 cm. Những giống mới còn nhỏ và lùn hơn nữa. Thân cây chắc, khỏe, ngắn vì phân cành sớm.</p><p>Thân cây nhẵn nhụi rất ít bị sâu đục, vỏ già ở thân có thể tróc ra từng mảng phía dưới lại rồi sẽ có một lượt vỏ mới cũng nhẵn, màu xám, hơi xanh.</p><p>Cành non có 4 cạnh, khi già sẽ tròn dần, lá thuộc dạng lá đơn mọc đối xứng nhau, không có lá kèm. Phiến lá có hình bầu dục, gốc thuôn tròn, đầu có lông gai hoặc lõm, dài khoảng 11-16 cm, rộng khoảng 5-7 m, mặt trên màu xanh đậm hơn mặt dưới.</p><p>Hoa lưỡng tính, bầu hạ, mọc từng chùm từ 2, 3 chiếc, ít khi ra ở đầu cành mà thường ra ở nách lá, có 5 cánh, hoa màu trắng, nhiều nhị vàng, hạt phấn rất nhỏ và rất nhiều, phôi cũng nhiều.</p><p>Ngoại hoa thụ phấn dễ dàng nhưng cũng có thể tự thụ phấn. Quả to từ 4 – 5g đến 500 – 700 g gần tròn, dài thuôn hoặc hình quả lê. Rất nhiều hạt, trộn ở giữa một khối thịt quả màu trắng, hồng hoặc đỏ vàng. Từ khi thụ phấn đến khi quả chín khoảng 100 ngày.</p><p>Cây ổi được trồng chủ yếu làm cây ăn quả. Hầu hết các bộ phận của cây từ lá, hoa, quả đến vỏ, rễ đều có công dụng riêng. Ngoài ra, cây ổi cũng có thể được trồng chậu làm cây cảnh đẹp trang trí vườn nhà, sân thượng…</p><p>Đất trồng, khí hậu</p><p>Điều kiện quan trọng ảnh hưởng đến việc trồng ổi là đất trồng và khí hậu. Độ PH của đất không được vượt quá 6 và không thấp hơn 5. Nhiệt độ trồng cây nằm trong khoảng 30 độ C.</p><p>-Đất trồng nên ẩm nhiểu sẽ tốt cho sự phát triển của cây. Chú ý đất trồng cần phải tơi xốp, thoáng và giữ nước tốt.</p><p>-Với loại đất trồng khô bạn chú ý cần thường xuyên tưới nước, thời gian chăm sóc cây rất nhiều.</p><p>&nbsp;Kỹ thuật trồng Ổi:</p><p>-Thời vụ trồng cây</p><p>Nên trồng cây vào dịp mỗi mùa mưa đến (từ khoảng tháng năm đến tháng sáu hàng năm).</p><p>– Mật độ và khoảng cách trồng cây.</p><p>Để tiết kiệm chi phí cho cây trồng cây ổi và tăng năng suất kinh tế nên thực hiện trồng kép hai cây vào một gốc ổi.</p><p>Mật độ trồng cây cần đạt là 100 gốc ổi trong một vườn diện tích 1000m2. Khoảng cách trồng thích hợp giữa các cây là 3,5m x 4m.</p><p>-Làm đất trồng Ổi</p><p>– Làm sạch diện tích đất trồng, xới đất tơi xốp.</p><p>– Đào hố trồng</p><p>Cần đào hố trồng có đường kính khoảng 20cm, chiều sau của hố khoảng 20cm, hố nọ cách hố kia 3,5m x 4m. Cần chú ý trong quá trình đào hố, phải để riêng lớp đất mặt khi đào, lớp đất bên dưới hố bạn cần trộn với hốn hợp phân chuồng hoai mục + vôi bột + phân lân rồi lấp hố cao hơn so với mặt bằng đất khoảng 25cm.</p><p>Trồng cây</p><p>-Đào giữa mô trồng cây -&gt; Đăt bầu cây giống đã xé túi nilon vào hố -&gt; lấp đất mặt bầu -&gt; ấn chặt đất vào mặt bầu -&gt; cắm cọc cố định -&gt; tưới nước cho cây.</p><p>&nbsp;Kỹ thuật chăm sóc cây ổi.</p><p>-Tưới nước</p><p>Tưới nước cần thường xuyên cho cây để đảm bảo đủ độ ẩm trong đất. Liều lượng tưới khoảng 5 lít nước một gốc cây. Cứ định kì tưới 2 ngày 1 lần. Tưới nước quan trọng nhất là khi cây ra hoa và khi quả đang lớn</p><p>-Tỉa lá, tỉa cành, tạo tán.</p><p>– Khi thấy cây ổi có lá và cành quá nhiều, cần loại bỏ bớt những cành, lá xung quanh gốc cây, những cành đang bị che kín. Khi thấy lá, cành bị sâu bệnh hại cần loại bỏ ngay.</p><p>-Thực hiện các công việc này giúp cho cây hạn chế được sâu bệnh và hạn chế tối đa sự phân tán các chất dinh dưỡng dành cho cây không cần thiết.</p><p>-Tạo tán, bấm đọt là công việc mà mỗi người muốn cây Ổi của mình có năng suất và chất lượng cao đều phải làm công việc này tạo điều kiện thuận lợi cho cành ra nhiều quả, diệt trừ sâu bệnh hại dễ dàng, thu hoạch quả nhanh chóng. Tạo tán cho Ổi còn giúp bộ rễ phát triển giúp cây phát triển tốt nhất.</p>', 1, 'fruits/sp1.webp', 'fruits/sp1.2.webp|fruits/sp1.3.webp|fruits/sp1.4.webp', 1, '2022-12-11 16:22:46', '2022-12-11 16:22:46'),
(2, 'Đào đỏ Mỹ', 68000, 41, '<p>Quả đào, miền Nam gọi là trái đào, cùng với quả của anh đào, mận, mơ là các loại quả hạch. Quả đào có một hạt giống to được bao bọc trong một lớp vỏ gỗ cứng, cùi thịt màu vàng hay ánh trắng, có mùi vị thơm ngon và lớp vỏ có lông tơ mềm, khi non có màu xanh, khi chín chuyển sang màu hồng hoặc vàng.</p>', '<p>Cây đào thuộc loại cây nhỡ, cao khoảng 3 – 4m. Lá đơn, lá mọc so le, hẹp, dài, có cuống ngắn, mép có răng cưa nhỏ, khi vò lá ngửi bạn sẽ thấy mùi hạnh nhân. Hoa đào xuất hiện trước lá, mọc riêng lẻ, cuống hoa ngắn. Đài hình chuông. Tràng năm cánh màu hồng nhạt, khoảng 35 – 40 nhị.</p><p>Hoa rất đẹp, miền Bắc dùng cây đào trang trí trong dịp tết. Quả hạch, mặt ngoài có một rãnh dọc và có rất nhiều lông nhung. Quả chín có đốm đỏ. Cây mọc hoang và được trồng nhiều ở các tỉnh miền Bắc nước ta như Lào Cai, Cao Bằng, Lạng Sơn, Hà Bắc. Quả ăn đuợc.</p><p>Thân cây thuộc loại thân gỗ nhỏ, thân có 2 màu : màu xanh hoặc màu đỏ tía. Thân chính của cây đào ghép được tính từ chỗ giới hạn giữa gốc ghép và thân ghép đến chỗ phân cành đầu tiên, còn cây con mọc từ hạt thân chính được tính từ cổ rễ tới chỗ phân cành đầu tiên.</p><p>Cành đào: Cành cây là xương cốt để hình thành khung hình dáng cây từ đấy người ta sẽ tạo nhiều dáng cho cây đào.</p><p>Lá: Lá đào là cơ quan quang hợp chính của cây. Quá trình quang hợp của lá có ý nghĩa rất lớn đến màu sắc, chất lượng hoa, mỗi lá nằm ở cạnh hoa sẽ ảnh hưởng trực tiếp đến hoa đó.</p><p>Hoa có các màu sắc: Trắng, hồng nhạt, hồng đậm, đỏ.</p><p>+ Số lượng cánh hoa khoảng 5 đến 25 cánh tuỳ từng loại.</p><p>+ Hoa thường có nhiều hình dạng như hoa cánh đơn, hoa cánh mai, hoa cánh hồng, hoa cánh cúc, hoa cánh mẫu đơn.</p><p>+ Nụ hoa có hình trứng, hình elip, hình cầu, bầu dục, tròn…</p><p>– Quả đào: Quả đào là loại quả hạch, cùi thịt có màu vàng hay màu trắng, có vị thơm ngon, lớp vỏ có lông mềm như nhung</p><p>Hạt: Hạt đào được bọc một lớp gỗ cứng. Vì vậy muốn hạt nảy mầm cần bạn phải xử lý trước khi gieo trồng.</p><p>Cây đào gồm có 6 loài, 5000 giống</p><p>Cây có giá trị kinh tế lớn nhất là để làm cây trang trí, với miền bắc mỗi ngày tết nếu chưa thấy cành đào là chưa có tết, nó mang một ý nghĩa tâm linh vô cùng to lớn, tượng trưng cho những điều may mắn, suôn sẻ, hạnh phúc, đoàn viên.</p><p>Quả đào chín được dùng để ăn tươi, ngoài ra có thể chế biến thành mứt, đồ hộp, nước quả và sấy khô..</p><p>Đối với, cây hoa đào còn được sử dụng như một cây thuốc trị nhuận tràng, giúp điều hoà chức năng cơ quan hô hấp, đồng thời giảm ho, chữa bế kinh, đau bụng kinh, cao huyết áp, viêm ruột thừa, tụ huyết sưng đau do chấn thương, điều trị chứng tắc nghẽn mạch máu.</p><p>Rễ đào dùng để chữa sưng đau hay dùng để sắc làm nước uống chữa viêm gan vàng da, còn nhựa thân cây giúp chữa kiết lỵ, đái tháo đường, cành cây thì sắc lên chữa được bệnh sốt rét, lá cây chữa viêm âm đạo, đun nước tắm để chữa ngứa, ghẻ. Hoa đào có tác dụng hạ khí, lợi tiểu</p><p>Nhiệt độ: Nhiệt độ là yếu tố quyết định đến sự sinh trưởng và phát triển, nở hoa và chất lượng hoa. Cây có thể sinh trưởng và phát triển tốt ở nhiệt độ từ 20 – 30oC. Nhiệt độ thấp là yếu tố quan trọng để cây đào phát triển, cây đào cần có nhiệt độ thấp để phân hoá mầm hoa và ra hoa. Nhưng nếu nhiệt độ thấp quá khoảng nhiệt độ – 5oC – 10oC chồi hoa thường bị chết đi ở &nbsp;hoặc chồi hoa nở chậm hoặc không nở.</p><p>– Lượng mưa: Để cây có thể phát triển bình thuờng, hàng ngày cây cần được cấp từ 1.250mm – 1.500mm, độ ẩm không khí khoảng 80 – 85%, độ ẩm đất khoảng 60 -70%.</p><p>– Ánh sáng: Ánh sáng là yếu tố giúp cung cấp năng lượng cho phản ứng quang hợp tạo ra chất hữu cơ nuôi cây. Ánh sáng đầy đủ sẽ làm tăng bề dày của mô, tăng hàm lượng chất diệp lục thúc đẩy quá trình quang hợp, ngược lại nếu trong điều kiện ánh sáng yếu, cây sẽ sinh trưởng kém, và ra hoa chậm, hay bị rụng nụ, rụng hoa, màu sắc nhợt nhạt. Đào là loại cây ưa sáng, thời gian chiếu sáng từ 6 đến 8hngày.</p><p>– Yêu cầu về đất đai: Cây đào có thể sống được đất xấu, đất dốc, có độ cao từ 700 đến 900 mm, mọc tốt ở đất đỏ vàng, hơi chua, đất cát, sỏi nhiều, đất tơi xốp nhiều mùn, đất có độ pH 5,5 – 6 là thích hợp nhất.</p>', 1, 'fruits/sp2.webp', 'fruits/sp2.2.webp|fruits/sp2.3.webp', 1, '2022-12-01 08:38:59', '2022-12-11 18:37:32'),
(3, 'Dâu tây', 238000, 42, '<p>Dâu tây là một loại trái cây ăn được có hình trái tim, màu đỏ tươi, ngọt, mọng nước với các hạt cứng như hạt nằm rải rác ở vỏ ngoài của quả. Mỗi quả mọng có khoảng 200 quả. Dâu tây chín có màu đỏ đậm, căng mọng và chắc tay khi sờ vào.</p>', '<p>Dâu tây vườn hay gọi đơn giản là dâu tây (danh pháp khoa học: Fragaria × ananassa)[1] là một chi thực vật hạt kín và loài thực vật có hoa thuộc họ Hoa hồng (Rosaceae). Dâu tây xuất xứ từ châu Mỹ và được các nhà làm vườn châu Âu cho lai tạo vào thế kỷ 18 để tạo nên giống dâu tây được trồng rộng rãi hiện nay. Loài này được (Weston) Duchesne miêu tả khoa học đầu tiên năm 1788. Loại quả này được nhiều người đánh giá cao nhờ hương thơm đặc trưng, màu đỏ tươi, mọng nước và vị ngọt. Nó được tiêu thụ với số lượng lớn, hoặc được tiêu thụ dưới dạng dâu tươi hoặc được chế biến thành mứt, nước trái cây, bánh nướng, kem, sữa lắc và sôcôla. Nguyên liệu và hương liệu dâu nhân tạo cũng được sử dụng rộng rãi trong các sản phẩm như kẹo, xà phòng, son bóng, nước hoa, và nhiều loại khác.</p><p>Dâu vườn lần đầu tiên được trồng ở Brittany, Pháp, vào năm 1750 thông qua một cây giống Fragaria virginiana từ Đông Bắc Mỹ và một cây Fragaria chiloensis thuộc giống được mang đến từ Chile bởi Amédée-François Frézier vào năm 1714.[2] Giống cây lai Fragaria × ananassa thay thế giống dâu rừng (Fragaria vesca) trong sản xuất thương mại, là loài dâu đầu tiên được trồng vào đầu thế kỷ 17.[3]</p><p>Theo quan điểm thực vật học, dù có tên tiếng Anh là \"strawberry\", dâu tây không phải là một \"berry\" (quả mọng). Về mặt kỹ thuật, nó là một loại hoa quả giả tụ, có nghĩa là phần cái để ăn có nguồn gốc không phải từ quả tụ mà từ đế hoa.[4] Mỗi \"hạt\" (quả bế) rõ ràng ở bên ngoài của quả thực sự là một trong các bầu nhụy của hoa, với một hạt bên trong.[4]</p><p>Năm 2017, sản lượng dâu tây trên thế giới là 9,22 triệu tấn, dẫn đầu là Trung Quốc chiếm 40% tổng sản lượng.[5]</p><p>Dâu tây thường được trồng lấy trái ở vùng ôn đới. Ở Việt Nam, khí hậu mát mẻ của miền núi Đà Lạt là môi trường thích hợp với việc canh tác dâu, nên loại trái cây này được xem là đặc sản của vùng cao nguyên nơi đây.</p><p>Các giống dâu tây rất đa dạng về kích thước, màu sắc, hương vị, hình dạng, mức độ sinh sản, mùa chín quả, khả năng mắc bệnh và cấu tạo của cây.[8] Một quả dâu tây có trung bình 200 hạt trên vỏ ngoài của nó.[12] Một số khác nhau về tán lá, và một số khác nhau quá trình phát triển các cơ quan sinh sản. Hầu hết hoa của các giống trồng có cấu trúc lưỡng tính nhưng có chức năng như hoa đực hoặc hoa cái.[13]</p><p>Đối với mục đích trồng để sản xuất thương mại, cây được nhân giống từ kết nối ngang, được trồng dưới dạng cây rễ trần hoặc cây cắm. Việc canh tác tuân theo một trong hai mô hình chung - canh tác nhựa hóa (phủ kín nhựa bọc lên líp trồng),[14] hoặc hệ thống hàng hoặc gò trồng lâu năm theo hàng (líp trồng) hoặc ụ đất.[15] Các vườn dâu nhà kính sản xuất một lượng nhỏ dâu tây trong thời kỳ trái vụ.[16]</p><p>Phần lớn sản xuất dâu tây thương mại hiện đại sử dụng hệ thống trồng nhựa hóa. Theo phương pháp này, luống trồng được tái tạo lại hàng năm, tẩy trùng và phủ nhựa bọc để ngăn cỏ dại phát triển và xói mòn mô đất. Cây trồng thường lấy từ các vườn ươm, được trồng tại vị trí lỗ đục xuyên qua lớp nhựa phủ đất bọc kín hàng trồng, và ống tưới được đặt sát bề mặt bên dưới. Cây trồng trổ đọt non được loại bỏ hết phần đọt khỏi cây khi chúng xuất hiện, để giúp cây trồng tập trung phần lớn dinh dưỡng vào sự phát triển của quả. Vào cuối mùa thu hoạch, tiến hành loại bỏ nhựa bọc mô trồng và cây được bứng lên.[14][17] Vì cây dâu tây hơn một hoặc hai năm tuổi bắt đầu giảm năng suất và chất lượng quả, việc nhổ và trồng lại cây mới mỗi năm cho phép cải thiện năng suất và dày đặc quả hơn.[14][17] Tuy nhiên do việc này đòi hỏi một mùa sinh trưởng dài hơn để tạo điều kiện cho cây trồng mỗi năm, và do chi phí nhựa bọc và cây giống để trồng mới hàng năm tăng lên, nên không phải lúc nào cũng có thể dễ dàng thực hiện ở mọi khu vực trồng dâu.[17]</p><p>Phương pháp chính khác là sử dụng cùng một loại cây dâu để trồng từ năm này qua năm khác, trồng chúng thành hàng hoặc trên gò, phổ biến nhất ở những vùng khí hậu lạnh hơn.[14][15] Nó có chi phí đầu tư thấp hơn và yêu cầu chăm sóc cây tổng thể thấp hơn.[15] Năng suất thường thấp hơn so với trồng dâu phủ nhựa bọc.[15]</p><p>Một phương pháp khác sử dụng chậu trồng phân hữu cơ. Cây trồng kiểu này đã được chứng minh là sản xuất flavonoid, anthocyanin, fructose, glucose, sucrose, malic acid, và citric acid nhiều hơn so với các cách khác.[18] Kết quả tương tự trong một nghiên cứu trước đó do Bộ Nông nghiệp Hoa Kỳ thực hiện cũng đã xác nhận cách canh tác này, và việc nó đóng vai trò như thế nào đối với các phẩm chất hoạt tính sinh học của hai giống dâu tây.[19]</p><p>Dâu tây cũng có thể được nhân giống bằng hạt, mặc dù chỉ là thói quen của một số người trồng và không được phổ biến trong việc canh tác dâu tây. Một số giống cây trồng nhân giống bằng hạt đã được phát triển để sử dụng cho các hộ gia đình trồng dâu, và việc nghiên cứu trồng thương mại từ hạt giống đang được tiến hành.[20] Hạt giống (achenes) được mua thông qua các nhà cung cấp hạt giống thương mại, hoặc bằng cách tự thu thập và lưu trữ hạt của chúng từ quả.</p><p>Dâu tây cũng có thể được trồng trong nhà trong chậu dâu tây.[21] Mặc dù cây có thể sẽ không phát triển tự nhiên khi ở trong nhà vào mùa đông, nhưng sử dụng đèn LED kết hợp ánh sáng xanh và đỏ có thể cho phép cây phát triển trong suốt mùa đông.[22] Ngoài ra, ở một số khu vực nhất định như tiểu bang Florida, mùa đông là mùa sinh trưởng tự nhiên và thu hoạch quả bắt đầu vào giữa tháng 11.[10]</p>', 1, 'fruits/sp3.webp', 'fruits/sp3.2.webp|fruits/sp3.3.webp|fruits/sp3.4.webp', 1, '2022-12-01 08:41:46', '2022-12-11 18:40:28'),
(4, 'Chanh tươi vỏ xanh', 38000, 21, '<p>Chanh thường mọc trên thân nhỏ. Nó là cây sống lâu năm. Quả chanh tròn, mọng nước, vỏ màu xanh, chuyển vàng khi chín. Chanh có múi, vị chua, nó được dùng để chế biến thực phẩm, làm các bài thuốc đông y và làm đẹp.</p>', '<p>Chanh là một số loài thực vật cho quả nhỏ, thuộc chi Cam chanh (Citrus), khi chín có màu xanh hoặc vàng, thịt quả có vị chua. Quả chanh được sử dụng làm thực phẩm trên khắp thế giới - chủ yếu dùng nước ép của nó, thế nhưng phần cơm (các múi của chanh) và vỏ (zest) cũng được sử dụng, chủ yếu là trong nấu ăn và nướng bánh. Nước ép chanh chứa khoảng 5% (khoảng 0,3 mol &nbsp;lít) axit citric, điều này giúp chanh có vị chua, và độ pH của chanh từ 2-3. Điều này làm cho nước ép chanh không đắt, có thể sử dụng thay axít cho các thí nghiệm khoa học trong giáo dục. Bởi vì có vị chua, nhiều thức uống và kẹo có mùi vị đã xuất hiện, bao gồm cả nước chanh.</p><p>Nguồn chất chống oxy hóa</p><p>Chất chống oxy hóa là các hợp chất quan trọng trong việc bảo vệ các tế bào chống lại các phân tử gốc tự do. Khi tồn tại ở số lượng lớn, các gốc tự do có thể làm hỏng các tế bào trong cơ thể, gây ra nguy cơ mắc các bệnh mãn tính như bệnh tim, tiểu đường và nhiều loại ung thư.</p><p>Chanh có nhiều hợp chất hoạt động có chức năng như chất chống oxy hóa trong cơ thể, bao gồm flavonoid, limonoid, kaempferol, quercetin và axit ascorbic.</p><p>Tăng cường hệ miễn dịch</p><p>Chanh có nhiều vitamin C, một chất dinh dưỡng có thể giúp tăng cường hệ thống miễn dịch của bạn. Trong các nghiên cứu ống nghiệm, vitamin C đã cho thấy khả năng tăng cường sản xuất các tế bào bạch cầu, giúp bảo vệ cơ thể chống lại nhiễm trùng và bệnh tật. Hơn nữa, trong một số các nghiên cứu ở người, việc uống vitamin C giúp rút ngắn thời gian và mức độ nghiêm trọng của bệnh cảm cúm thông thường.</p><p>Ngoài ra, vitamin C có thể giúp vết thương phục hồi nhanh hơn bằng cách giảm viêm và kích thích sản xuất collagen- một loại protein thiết yếu hỗ trợ sửa chữa vết thương. Bên cạnh vitamin C, chanh cũng là một nguồn chất chống oxy hóa giúp tăng cường hệ thống miễn dịch bằng cách bảo vệ các tế bào, chống lại tổn thương do gốc tự do.</p><p>Cải thiện sức khỏe làn da</p><p>Chanh có một số tính chất có thể thúc đẩy làn da khỏe mạnh.</p><p>Loại quả này có hàm lượng vitamin C cao, loại vitamin cần thiết để tái tạo collagen trong cơ thể. Collagen là một loại protein giữ cho làn da săn chắc và khỏe mạnh. Một quả chanh cỡ trung bình nặng khoảng 67 grams cung cấp hơn 20% RDI cho chất dinh dưỡng này.</p><p>Một nghiên cứu trên 4.000 phụ nữ cho thấy những người ăn nhiều vitamin C có nguy cơ xuất hiện nếp nhăn ít hơn và tránh được tình trạng da khô trong quá trình lão hóa.</p>', 1, 'fruits/sp4.webp', 'fruits/sp4.2.webp|fruits/sp4.3.webp', 1, '2022-12-01 08:42:48', '2022-12-11 18:40:45'),
(5, 'Trái cam mật', 238000, 41, '<p>Cam mật không hạt thịt quả vàng cam, ngọt đậm. Dạng quả tròn, vỏ dày 3 – 4mm, màu xanh đến xanh vàng, khá nhiều nước, quả nhiều hạt (13 – 20 hạt/quả), trọng lượng trung bình 20g/quả.</p>', '<p>Cam là quả của nhiều loài cây có múi khác nhau thuộc họ Cửu lý hương (Rutaceae) (xem danh sách các loài thực vật được gọi là cam); nó chủ yếu đề cập đến Citrus × sinensis,[1] mà còn được gọi là cam ngọt, để phân biệt với Citrus × aurantium có liên quan, được gọi là cam chua. Cam ngọt sinh sản vô tính (apomixis thông qua phôi nucellar); giống cam ngọt phát sinh do đột biến.</p><p>Cam là giống lai giữa bưởi (Citrus maxima) và quýt (Citrus reticulata).[2][6] Bộ gen lục lạp, và do đó là dòng ngoại, là bộ gen của bưởi.[7] Quả cam ngọt đã có trình tự bộ gen đầy đủ.</p><p>Cam có nguồn gốc ở một khu vực bao gồm Nam Trung Quốc, Đông Bắc Ấn Độ và Myanmar,[8][9] và người ta nhắc đến cam ngọt sớm nhất trong văn học Trung Quốc vào năm 314 trước Công nguyên.[2] Tính đến năm 1987, cây cam được coi là cây ăn quả được trồng nhiều nhất trên thế giới.[10] Cây cam được trồng rộng rãi ở các vùng khí hậu nhiệt đới và cận nhiệt đới để cho quả ngọt. Quả của cây cam có thể ăn tươi hoặc chế biến lấy nước cốt hoặc vỏ thơm.[11] Tính đến năm 2012, cam ngọt chiếm khoảng 70% sản lượng cam quýt.</p><p>Năm 2019, 79 triệu tấn cam đã được trồng trên toàn thế giới, trong đó Brasil sản xuất 22% tổng số, tiếp theo là Trung Quốc và Ấn Độ.</p><p>Trồng cam là một hình thức thương mại quan trọng và là một phần đáng kể trong nền kinh tế Hoa Kỳ (tiểu bang Florida và California), hầu hết các nước Địa Trung Hải, Brasil, México, Pakistan, Trung Quốc, Ấn Độ, Iran, Ai Cập, và Thổ Nhĩ Kỳ và đóng góp một phần nhỏ hơn trong nền kinh tế của Tây Ban Nha, Cộng hòa Nam Phi và Hy Lạp.</p><p>Nước cam và các sản phẩm khác từ cam</p><p>Cam được trồng rộng rãi ở những nơi có khí hậu ấm áp, và vị cam có thể biến đổi từ ngọt đến chua. Cam thường lột vỏ và ăn lúc còn tươi, hay vắt lấy nước. Vỏ cam dày, có vị đắng, thường bị vứt đi nhưng có thể chế biến thành thức ăn cho súc vật bằng cách rút nước bằng sức ép và hơi nóng. Nó cũng được dùng làm gia vị hay đồ trang trí trong một số món ăn. Lớp ngoài cùng của vỏ có thể được dùng làm \"zest\" để thêm hương vị cam vào thức ăn. Phần trắng của vỏ cam là một nguồn pectin.</p><p>Sản phẩm làm từ cam gồm có:</p><p>Nước cam, Brazil là nước sản xuất nước cam nhiều nhất thế giới, sau đó là Florida, Hoa Kỳ.</p><p>Dầu cam, được chế biến bằng cách ép vỏ. Nó được dùng làm gia vị trong thực phẩm và làm hương vị trong nước hoa. Dầu cam có khoảng 90% d-Limonene, một dung môi dùng trong nhiều hóa chất dùng trong gia đình, cùng với dầu chanh dùng để làm chất tẩy dầu mỡ và tẩy rửa nói chung. Chất tẩy rửa từ tinh chất cam hiệu quả, thân thiện với môi trường, và ít độc hại hơn sản phẩm cất từ dầu mỏ, đồng thời có mùi dễ chịu hơn.</p>', 1, 'fruits/sp5.webp', 'fruits/sp5.2.webp|fruits/sp5.3.webp', 1, '2022-12-01 08:44:02', '2022-12-11 18:41:12'),
(6, 'Hành tây', 10000, 0, '<p>Hành tây là một loại rau thân củ, có tên khoa học là Allium cepa L, thuộc họ hành tỏi. Loại cây thân thảo này thường được trồng quanh năm, có rễ chùm và sợi dài.</p>', '<p>Phần lớn cây thuộc chi Hành (Allium) đều được gọi chung là hành tây (tiếng Anh là onion). Tuy nhiên, trong thực tế thì nói chung từ hành tây được dùng để chỉ một loài cây có danh pháp hai phần là Allium cepa.</p><p>Hành tây là loại rau, khác với hành ta là loại gia vị. Nếu như hành ta có thể dùng cả phần lá và phần củ mà thực ra củ hành ta rất nhỏ thì hành tây chủ yếu dùng củ. Củ hành tây là phần thân hành của cây hành tây. Hành tây có họ hàng với hành tím thường phơi hay sấy khô làm hành khô. Hành tây có nguồn gốc từ Trung Á được truyền qua bên châu Âu rồi tới Việt Nam. Loài này hợp với khí hậu ôn đới.</p><p>Hành tây vừa được xem là một loại gia vị vừa như một loại rau rất giàu Kali, Selen, Vitamin C và Quercetin. Trong củ hành đỏ rất giàu các hợp chất và nhóm lưu huỳnh như DMS, DDS, DTS &amp; DTTS gây mùi cay nồng.</p><p>Tác dụng chữa bệnh</p><p>Star of life2.svg Wikipedia tiếng Việt không bảo đảm và không chịu trách nhiệm về tính pháp lý và độ chính xác của các thông tin có liên quan đến y học và sức khỏe. Độc giả cần liên hệ và nhận tư vấn từ các bác sĩ hay các chuyên gia. Khuyến cáo cẩn thận khi sử dụng các thông tin này. Xem chi tiết tại Wikipedia:Phủ nhận y khoa và Wikipedia:Phủ nhận về nội dung.</p><p>Kháng khuẩn</p><p>Hành có tác dụng tiêu diệt các vi khuẩn lây nhiễm, bao gồm cả vi khuẩn E. coli và Salmonella. Ngoài ra, nó còn có hiệu quả chống lại bệnh lao và nhiễm trùng đường tiểu, chẳng hạn như viêm bàng quang. Vị hăng của hành làm tăng lưu thông máu và sự tiết mồ hôi. Đặc biệt trong thời tiết lạnh, hành có tác dụng tránh nhiễm trùng, giảm sốt và đổ mồ hôi ra cảm lạnh và cúm rất tốt.</p><p>Chống viêm</p><p>Nhóm rau allium có chứa những chất chống viêm quan trọng. Lượng lưu huỳnh được tìm thấy trong hành tây giúp cản trở hoạt động của các đại thực bào - là những tế bào bạch cầu đặc hiệu đóng vai trò chính trong hệ miễn dịch, và một trong những hoạt động bảo vệ của nó là có thể gây ra các phản ứng viêm nghiêm trọng.</p><p>Chất chống oxy hóa của hành tây giúp ngăn ngừa quá trình oxy hóa axit béo trong cơ thể. Khi cơ thể có ít axit béo bị oxy hóa thì sẽ sản sinh ít các phân tử truyền thông tin gây viêm hơn. Nhờ đó mà mức độ viêm nhiễm trong cơ thể được kiểm soát tốt.</p><p>Lão hóa</p><p>Chất Quercetin trong hành tây có tác dụng chống oxy hóa rất mạnh, kết hợp với Selen có nhiều trong hành tây giúp khử các gốc tự do, nguyên nhân gây ra nếp nhăn và sự chai cứng da nên rất tốt cho da, móng và tóc.</p><p>Loãng xương</p><p>Nghiên cứu đã chỉ ra rằng hành tây có thể giúp tăng mật độ xương. Nó đặc biệt tốt cho phụ nữ trong độ tuổi mãn kinh thường bị các vấn đề về xương.</p><p>Ngoài ra, có bằng chứng cho thấy những phụ nữ đã qua tuổi mãn kinh có thể giảm nguy cơ gãy xương nhờ ăn hành tây hằng ngày. Trong nghiên cứu này các nhà khoa học lưu ý đối với phụ nữ lớn tuổi ăn hành tây ít như một tháng một lần hoặc ít hơn thì không có tác dụng nhiều mà phải ăn hành tây hàng ngày mới giúp tăng mật độ xương. Không những thế, hàm lượng cao lưu huỳnh trong hành tây có thể cung cấp những lợi ích trực tiếp cho các mô liên kết trong cơ thể.</p><p>Cao huyết áp</p><p>Dù bạn ăn sống hoặc nấu chín, hành tây cũng giúp bạn hạ huyết áp một cách tự nhiên. Nó cũng làm loãng máu, hòa tan cục máu đông và lọc máu khỏi các chất béo không lành mạnh. Sắc tố chứa xenton ở vỏ ngoài hành tây có tác dụng điều trị huyết áp.</p><p>Tim mạch</p><p>Ung thư</p><p>Hành được chứng minh làm giảm nguy cơ bị ung thư, ngay cả khi bạn tiêu thụ chỉ một lượng vừa phải. Ung thư đại trực tràng, thanh quản và buồng trứng có thể ngăn chặn nếu bạn ăn hành tây với lượng vừa phải. Do đó hãy cố gắng thêm một củ hành tây vào trong công thức nấu ăn. Đối với khẩu phần cá nhân, nên dùng khoảng nửa củ hành tây.</p><p>Phòng chống ung thư ruột kết: Fructo-oligosaccharides trong hành kích thích sự tăng trưởng của vi khuẩn có lợi trong ruột kết và giúp giảm nguy cơ phát triển khối u ở ruột kết.</p><p>Nhiều nghiên cứu cho thấy: mỗi tuần ăn hành từ 4- 7 lần (mỗi lần 2- 3 củ) sẽ giúp làm giảm đáng kể nguy cơ ung thư buồng trứng, thực quản, miệng, thanh quản, trực tràng.</p><p>Tiểu đường</p><p>Thành phần Chromium trong củ hành đỏ giúp làm giảm nồng độ đường trong máu, giảm mức độ insulin và cải thiện lượng đường glucose hấp thụ vào cơ thể. Người ta ước tính có khoảng 50% dân số Mỹ bị thiếu thành phần Chromium, nhiều hơn bất cứ quốc gia phát triển nào khác, và rất có thể đó là lý do khiến cho đa phần người dân Mỹ bị bệnh tiểu đường và tim mạch.</p>', 1, 'vegetables/sp7.webp', '', 2, '2022-12-01 08:47:22', '2022-12-01 08:48:36'),
(7, 'Cà chua', 15000, 0, '<p>Cà chua (danh pháp hai phần: Solanum lycopersicum), thuộc họ Cà (Solanaceae), là một loại rau quả làm thực phẩm.</p>', '<p>Cà chua (danh pháp hai phần: Solanum lycopersicum), thuộc họ Cà (Solanaceae), là một loại rau quả làm thực phẩm. Quả ban đầu có màu xanh, chín ngả màu từ vàng đến đỏ. Cà chua có vị hơi chua và là một loại thực phẩm bổ dưỡng, tốt cho cơ thể, giàu vitamin C và A, đặc biệt là giàu lycopeme tốt cho sức khỏe.</p><p>Cà chua thuộc họ Cà, các loại cây trong họ này thường phát triển từ 1 đến 3 mét chiều cao, có những cây thân mềm bò trên mặt đất hoặc dây leo trên thân cây khác, ví dụ nho. Họ cây này là một loại cây lâu năm trong môi trường sống bản địa của nó, nhưng nay nó được trồng như một loại cây hàng năm ở các vùng khí hậu ôn đới và nhiệt đới.</p><p>Cà chua được phát triển trên toàn thế giới do sự tăng trưởng tối ưu của nó trong nhiều điều kiện phát triển khác nhau. Các loại cà chua được trồng trọt phổ biến nhất là loại quả đường kính khoảng 5–6 cm. Hầu hết các giống được trồng đề cho ra trái cây màu đỏ, nhưng một số giống cho quả vàng, cam, hồng, tím, xanh lá cây, đen hoặc màu trắng. Đặc biệt có loại cà chua nhiều màu và có sọc.</p><p>Cây giống cà chua trồng trong nhà</p><p>Cà chua là một trong các loại trái cây vườn phồ biến nhất tại Hoa Kỳ, cùng với quả bí xanh được người trồng ưa thích.</p><p>Một vài thương gia tạo ra ngân hàng cung cấp hạt giống thuần chủng. Định nghĩa về cà chua thuần chủng là mơ hồ, nhưng không giống với các giống thương mại, chúng được côn trùng thụ phấn vào được lai tạo trong 40 năm hoặc lâu hơn.</p><p>Khoảng 182 triệu tấn cà chua đã được sản xuất ra trên toàn thế giới trong năm 2018. Trung Quốc là nước sản xuất cà chua lớn nhất, chiếm khoảng một phần tư sản lượng toàn cầu, tiếp theo là Ấn Độ và Hoa Kỳ. Các khu vực chế biến tại California chiếm 90% lượng sản xuất ở Mỹ và 35% lượng sản xuất thế giới.[8]</p><p>Cà chua (danh pháp hai phần: Solanum lycopersicum), thuộc họ Cà (Solanaceae), là một loại rau quả làm thực phẩm. Quả ban đầu có màu xanh, chín ngả màu từ vàng đến đỏ. Cà chua có vị hơi chua và là một loại thực phẩm bổ dưỡng, tốt cho cơ thể, giàu vitamin C và A, đặc biệt là giàu lycopeme tốt cho sức khỏe.</p><p>Cà chua thuộc họ Cà, các loại cây trong họ này thường phát triển từ 1 đến 3 mét chiều cao, có những cây thân mềm bò trên mặt đất hoặc dây leo trên thân cây khác, ví dụ nho. Họ cây này là một loại cây lâu năm trong môi trường sống bản địa của nó, nhưng nay nó được trồng như một loại cây hàng năm ở các vùng khí hậu ôn đới và nhiệt đới.</p><p>Lịch sử</p><p>Cà chua có nguồn gốc từ Nam Mỹ. Bằng chứng di truyền cho thấy cà chua được tiến hóa từ loài cây nhỏ quả màu xanh phổ biến ở vùng cao nguyên Peru [4]. Một loài có tên Solanum lycopersicum được vận chuyển đến México, nơi nó được trồng và tiêu thụ bởi dân cư Trung Mỹ. Loại cà chua được thuần hóa đầu tiên có thể là trái cây màu vàng, tương tự như cà chua anh đào, được trồng bởi người Aztec miền Trung México[5]. Từ cà chua bắt nguồn từ tomatl trong tiếng Nahuatl, có nghĩa trái cây sưng.[6]</p><p>Nhà thám hiểm người Tây Ban Nha Cortés có thể là người đầu tiên chuyển loại cà chua nhỏ màu vàng tới Châu Âu sau khi ông chiếm được thành phố Aztec của người Tenochtitlan, tại México vào năm 1521. Christopher Columbus có thể đưa chúng đến châu Âu sớm hơn nhưng ông không làm được. Cuộc thảo luận đầu tiên của các nhà khoa học về cà chua vào năm 1544. Pietro Andrea Mattioli, một bác sĩ và là nhà thực vật học người Italia đã đặt tên cho loại quả mới này là pomo d\'oro hay táo vàng [7].</p><p>Người Aztec và các dân tộc khác trong khu vực sử dụng cà chua trong việc nấu ăn của mình, nó đã được trồng ở miền nam México và có thể ở nhiều vùng khác vào khoảng 500 năm trước Công Nguyên. Người ta cho rằng đột biến từ một loại trái cây nhỏ nguồn gốc Trung Mỹ là tổ tiên trực tiếp của loài cà chua canh tác hiện tại.</p><p>Người Tây Ban Nha phổ biến</p><p>Sau khi thực dân Tây Ban Nha thuộc địa hóa châu Mỹ, Người Tây Ban Nha đã đem giống cà chua đi phân phối ở khắp các thuộc địa của họ trong vùng biển Caribbean. Họ cũng mang đến Philippines, từ đó lây lan sang Đông Nam Á và toàn bộ lục địa Á châu. Người Tây Ban Nha đem cà chua đến châu Âu, nó sinh trưởng một cách dễ dàng ở vùng khí hậu Địa Trung Hải, việc trồng trọt ở đây bắt đầu trong năm 1540. Cà chua được sử dụng làm thực phẩm ngay sau khi nó được giới thiệu. Sách dạy nấu ăn đầu tiên với công thức có cà chua xuất bản ở Naples vào năm 1692.[7]:17 Một số vùng ở Ý chỉ dùng cà chua vào mục đích trang trí trong bàn ăn trước khi nó được kết hợp với các món ăn địa phương vào cuối thế kỷ XVII hoặc đầu thế kỷ XVIII.</p><p>Trồng trọt</p><p>Sản lượng cà chua năm 2005</p><p>Cà chua được phát triển trên toàn thế giới do sự tăng trưởng tối ưu của nó trong nhiều điều kiện phát triển khác nhau. Các loại cà chua được trồng trọt phổ biến nhất là loại quả đường kính khoảng 5–6 cm. Hầu hết các giống được trồng đề cho ra trái cây màu đỏ, nhưng một số giống cho quả vàng, cam, hồng, tím, xanh lá cây, đen hoặc màu trắng. Đặc biệt có loại cà chua nhiều màu và có sọc.</p><p>Cây giống cà chua trồng trong nhà</p><p>Cà chua là một trong các loại trái cây vườn phồ biến nhất tại Hoa Kỳ, cùng với quả bí xanh được người trồng ưa thích.</p><p>Một vài thương gia tạo ra ngân hàng cung cấp hạt giống thuần chủng. Định nghĩa về cà chua thuần chủng là mơ hồ, nhưng không giống với các giống thương mại, chúng được côn trùng thụ phấn vào được lai tạo trong 40 năm hoặc lâu hơn.</p><p>Khoảng 182 triệu tấn cà chua đã được sản xuất ra trên toàn thế giới trong năm 2018. Trung Quốc là nước sản xuất cà chua lớn nhất, chiếm khoảng một phần tư sản lượng toàn cầu, tiếp theo là Ấn Độ và Hoa Kỳ. Các khu vực chế biến tại California chiếm 90% lượng sản xuất ở Mỹ và 35% lượng sản xuất thế giới.[8]</p><p>Theo FAO, Những quốc gia sản xuất cà chua nhiều nhất thế giới năm 2018 là:[9]</p><p>Màu sắc cà chua anh đào khác nhau sau khi chín</p><p>Hiện có khoảng 7.500 giống cà chua trồng cho các mục đích khác nhau. Cà chua thuần chủng đang ngày càng trở lên phổ biến, đặc biệt giữa các người vườn và nhà sản xuất khi học có xu hướng sản xuất các loại cây trồng có hương vị thú vị hơn, tăng khả năng kháng bệnh và năng suất.</p><p>Cây lai vẫn còn phổ biến, kể từ khi có mục đích sản xuất lớn, người ta kết hợp các đặc điểm tốt của các loại cà chua thuần chủng với độ ổn định của các loại cà chua thương mại thông thường.</p><p>Các giống cà chua thuần chủng khác nhau</p><p>Giống cà chua được chia thành nhiều loại, chủ yếu dựa vào hình dạng và kích thước.</p><p>Loại cà chua Slicing hay globe là cà chua thương mại thông thường, dùng được cho nhiều cách chế biến và ăn tươi.</p><p>Loại cà chua Beefsteak là cà chua lớn thường dùng cho bánh mì. Thời gian bảo quản ngắn khiến ít được sử dụng trong thương mại.</p><p>Loại cà chua Oxheart có hình dạng giống như loại dâu tây lớn.</p><p>Cà chua mận được lai tạo để sử dụng trong sản xuất nước sốt cà chua.</p><p>Cà chua lê hình quả lê.</p><p>Cà chua anh đào nhỏ và tròn, vị ngọt ăn trong món salad.</p><p>Cà chua nho được giới thiệu gần đây, một biến thể của cà chua mận nhưng nhỏ hơn, được dùng trong món salad</p><p>Cà chua Campari ngọt, lớn hơn cà chua anh đào nhưng nhỏ hơn cà chua mận.</p><p>Hầu hết các giống cà chua hiện đại đều mịn bề mặt, nhưng một số giống cà chua hiện đại như beefsteak thường có khía rõ rệt. Hầu hết các giống trái cây thương mại màu đỏ, nhưng nhiều giống cà chua thuần chủng có màu sắc đa dạng. Có một sự khác biệt giữa cà chua trồng cho thương mại so với cà chua do những người làm vườn sản xuất tại gia. Giống sản xuất do người làm vườn thường được chú trọng đến hương vị, còn giống do các cơ sở sản xuất thương mại hướng đến hình dạng, kích thước, kháng sâu bệnh, phù hợp cho việc cơ giới hóa thu hái và vận chuyển.</p><p>Cà chua phát triển tốt với 7 giờ chiếu sáng mỗi ngày từ ánh sáng mặt trời. Một phân bón NPK với tỷ lệ 5-10-10 thường được bán làm phân bón cà chua hoặc phân bón rau, cả phân hữu cơ cũng được sử dụng.</p><p>Sâu bệnh</p><p>Sâu cà chua ăn quả cà chua chưa chín</p><p>Các giống cà chua khác nhau có khả năng kháng bệnh khác nhau. Các phương pháp lai hiện đại tập trung vào việc cải thiện khả năng kháng bệnh của thực vật thuần chủng. Một bệnh cà chua thông thường là bệnh do virus khảm thuốc lá gây ra.[10] Nhiều hình thức của nấm mốc và bệnh bạc lá cũng ảnh hưởng đến cà chua, đó là lý do các giống cà chua thường được đánh dấu với khả năng kháng bệnh cụ thể. Bằng cách sử dụng các chữ cái, phổ biến nhất là: V - héo Verticillium, F - Fusarium héo chủng I, FF - Fusarium héo chủng I và II, N - tuyến trùng, T - virut khảm thuốc lá, và A - Alternaria.</p><p>Một bệnh đặc biệt nguy hiểm với cà chua là bệnh curly top, làm gián đoạn vòng đời. Như tên gọi của nó, nó có những triệu chứng làm cho ngọn lá của cây xuất hiện nếp nhăn và phát triển bất thường. Một số loài gây hại phổ biến là sâu cà chua, bọ cánh cứng, nhện đỏ, sên và loại bọ khoai tây Colorado.</p><p>Khi bị côn trùng tấn công, cây cà chua sản xuất hormone peptide và systemin kích hoạt cơ chế phòng thủ, chẳng hạn như sản xuất các chất ức chế protease để làm chậm sự phát triển của côn trùng. Loại hormon này lần đầu tiên được xác định trong cà chua, nhưng những protein tương tự cũng đã được xác định có trong các loài khác.[11]</p><p>Biến đổi gen</p><p>Cà chua đã được biến đổi bằng cách sử dụng kỹ thuật di truyền. Việc biến đổi gen cà chua cho mục đích thương mại tạo ra loại cà chua Flavr Savr, được thiết kế để có tuổi thọ dài hơn.[12] Các nhà khoa học đang tiếp tục phát triển cà chua với những đặc điểm mới không tìm thấy trong các giống trồng tự nhiên, như tăng khả năng kháng sâu hại và thích nghi môi trường. Các dự án khác nhằm mục đích làm phong phú thêm các chất có lợi trong cà chua tốt cho sức khỏe hoặc cung cấp dinh dưỡng cao.</p><p>Tiêu thụ</p><p>Cà chua được trồng và ăn trên khắp thế giới. Nó được sử dụng bằng nhiều cách khác nhau, bao gồm cả nguyên liệu trong món salad, và chế biến thành nước sốt cà chua hoặc súp cà chua. Cà chua chưa chín màu xanh lá cây cũng có thể được tẩm bột và chiên, được sử dụng để làm cho salsa, hoặc ngâm. Nước ép cà chua được bán như là một thức uống, và được sử dụng trong cocktail như Bloody Mary.</p><p>Cà chua có nhiều axit, giúp cho nó dễ dàng bảo quản và đóng hộp. Cà chua cũng được bảo quản bằng cách phơi dưới ánh nắng mặt trời.</p><p>Thành phần dinh dưỡng</p><p>Trong cà chua có chứa rất nhiều chất dinh dưỡng có lợi cho cơ thể như carotene, lycopene, vitamin và kali. Tất cả những chất này đều rất có lợi cho sức khoẻ con người. Đặc biệt cái loại vitamin B, vitamin C và beta carotene giúp cơ thể chống lại quá trình oxy hóa của cơ thể, giảm thiểu nguy cơ tử vong do bệnh tim mạch và ung thư.</p><p>Theo nghiên cứu, cứ khoảng 150g cà chua (tương đương với một khẩu phần ăn) có thể đáp ứng 32% nhu cầu vitamin C trong một ngày của người trưởng thành.[13]</p><p>Chất chống oxy hóa tự nhiên này có khả năng ngăn các gốc tự do gây ung thư và lão hóa tế bào. Ngoài ra đối với các tín đồ làm đẹp, cà chua chính là thực phẩm \"vàng\" trong công cuộc làm đẹp dáng và sáng da. Chúng được sử dụng nhiều trong những công thức giảm cân giữ dáng và làm đẹp da vô cùng hiệu quả.</p>', 1, 'vegetables/sp8.webp', 'vegetables/sp8.2.webp|vegetables/sp8.3.webp|vegetables/sp8.4.webp', 2, '2022-12-01 08:50:15', '2022-12-11 18:38:30'),
(8, 'Ớt chuông vàng', 12000, 0, '<p>Ớt chuông, hay còn gọi là ớt ngọt (gọi là pepper ở Vương quốc Liên hiệp Anh và Bắc Ireland, Canada, Ireland hay capsicum ở Ấn Độ, Bangladesh, Úc, Singapore và New Zealand), là quả của một nhóm cây trồng, loài \"Capsicum annuum 9\".</p>', '<p>Ớt chuông hay còn gọi là ớt ngọt, không cay, thịt dày, mùi hơi hăng. Loại ớt này có thể ăn sống, làm salad hoặc chế biến thành nhiều món khác nhau. Ớt chuông khá được yêu thích bởi chúng dễ ăn, dễ chế biến mà còn chứa nhiều dưỡng chất thiết yếu. Hiện nay, ớt chuông có các màu sắc phổ biến như đỏ, vàng, xanh, cam. Với mỗi sắc màu đặc trưng, ớt sẽ nổi trội về thành phần dinh dưỡng, mang đến các giá trị hữu ích cho sức khỏe người dùng.</p><p>1. Thành phần dinh dưỡng của ớt chuông vàng</p><p>Ớt chuông thuộc nhóm thực phẩm giàu giá trị dinh dưỡng. Theo nghiên cứu, cứ dùng 100g ớt chuông tươi thì chúng ta sẽ cung cấp cho cơ thể các chỉ số sau:</p><p>31 calo</p><p>92% là nước</p><p>1g chất đạm</p><p>6g carb</p><p>2.1g chất xơ</p><p>190mg vitamic C</p><p>Cùng nhiều khoáng chất và chất chống oxy hóa khác.</p><p>Với ớt chuông vàng, thành phần sẽ giàu vitamin A, C, kali và chất xơ hơn hẳn.</p><p>2. Những tác dụng nổi bật của ớt chuông vàng</p><p>Về cơ bản, thành phần của các loại ớt chuông không quá khác nhau, chỉ là ở mỗi màu sắc đặc trưng sẽ có nhóm chất trội hơn. Ớt chuông vàng cũng là loại ớt giá trị dinh dưỡng cao, mang đến nhiều tác dụng hữu ích cho sức khỏe người dùng.</p><p>Thường xuyên bổ sung ớt chuông vàng vào thực đơn hàng ngày, chúng ta sẽ nhận được những tác dụng như sau:</p><p>- Ớt chuông vàng giúp tăng cường thị lực</p><p>Chất Lutein và zeaxanthin có trong ớt chuông sẽ giúp điểm vàng của mắt khỏe hơn, chống lại các tác hại do ánh sáng xanh gây ra. Bên cạnh đó còn giúp cải thiện thị lực, hạn chế các phản ứng oxy hóa gây tổn thương lên vùng võng mạc của mắt.</p><p>- Ớt chuông vàng giúp bổ máu</p><p>Sắt là loại khoáng chất nổi bật có trong ớt chuông nói chung và ớt chuông vàng nói riêng. Không chỉ cung cấp thêm cho cơ thể lượng sắt cần thiết mà ớt chuông vàng còn tăng cường bổ sung vitamin C, giúp thành ruột hấp thụ sắt tốt hơn, từ đó tăng chất lượng máu nuôi cơ thể, tránh được các nguy cơ thiếu hụt máu.</p><p>- Ớt chuông vàng giúp tốt cho sức khỏe tim mạch</p><p>Ngoài vitamin C, trong ớt chuông vàng còn chứa nhiều gốc phenol và flavonoid, có khả năng chống lại các gốc tự do xấu, tăng cường tuần hoàn máu, bảo vệ tim mạch hiệu quả.</p><p>- Ớt chuông vàng cải thiện hệ tiêu hóa, giúp giảm cân</p><p>Ớt chuông vàng rất ít calo lại nhiều chất xơ sẽ kích thích hệ tiêu hóa hoạt động tốt hơn, tăng trao đổi chất, bài tiết độc tố ra ngoài. Việc dùng ớt chuông vàng trong thực đơn ăn kiêng sẽ giúp bạn no lâu hơn, giảm cảm giác thèm ăn, detox cơ thể và đốt cháy mỡ thừa nhanh chóng. Kết hợp ăn uống khoa học với vận động hợp lý, bạn sẽ sở hữu vóc dáng thon gọn và cải thiện sức khỏe lên rất nhiều.</p><p>- Ớt chuông vàng giúp đẹp da, làm chậm tiến trình lão hóa</p><p>Vitamin C có trong ớt chuông vàng là yếu tố giúp tăng sản sinh collagen, giúp da săn chắc, đàn hồi hơn. Đồng thời, hoạt chất Phytonutrients trong ớt còn hỗ trợ hiệu quả trong việc chống viêm do mụn trứng cá gây ra, giúp tổn thương trên da nhanh lành.</p>', 1, 'vegetables/sp9.webp', 'vegetables/sp9.2.webp|vegetables/sp9.3.webp', 2, '2022-12-01 08:51:22', '2022-12-11 18:39:37'),
(9, 'Ớt chuông xanh', 12000, 0, '<p>Ớt chuông, hay còn gọi là ớt ngọt (gọi là pepper ở Vương quốc Liên hiệp Anh và Bắc Ireland, Canada, Ireland hay capsicum ở Ấn Độ, Bangladesh, Úc, Singapore và New Zealand), là quả của một nhóm cây trồng, loài Capsicum annuum.</p>', '<p>Ớt chuông, hay còn gọi là ớt ngọt (gọi là pepper ở Vương quốc Liên hiệp Anh và Bắc Ireland, Canada, Ireland hay capsicum[1] ở Ấn Độ, Bangladesh, Úc, Singapore và New Zealand), là quả của một nhóm cây trồng, loài Capsicum annuum.[2] Cây trồng của loài này cho ra trái với màu sắc khác nhau, bao gồm màu đỏ, vàng, cam, xanh lục, sô-cô-la &nbsp;nâu, vanilla &nbsp;trắng, và màu tím. Ớt chuông đôi khi được xếp vào nhóm ớt ít cay nhất mà cùng loại với ớt ngọt. Ớt chuông có thịt, rất nhiều thịt. Ớt chuông có nguồn gốc ở Mexico, Trung Mỹ, và phía Bắc Nam Mỹ. Phần khung và hạt bên trong ớt chuông có thể ăn được, nhưng một số người sẽ cảm nhận được vị đắng.[3] Hạt ớt chuông được mang đến Tây Ban Nha vào năm 1493 và từ đó lan rộng khắp các nước Châu Âu, Châu Phi, và Châu Á. Ngày nay, Trung Quốc là nước xuất khẩu ớt chuông lớn nhất thế giới, theo sau là Mexico và Indonesia.</p><p>Điều kiện trồng ớt chuông lý tưởng bao gồm đất ấm, khoảng từ 21 đến 29 độ C (70 đến 84 độ F), và luôn giữ ẩm nhưng không để úng nước.[4] Ớt chuông rất nhạy cảm với độ ẩm và nhiệt độ cao vượt mức.</p><p>Tên gọi \"ớt\" là một sự nhầm lẫn của Christopher Columbus khi ông mang loài cây này trở về Châu Âu. Vào lúc đó thì \"hồ tiêu\", quả của một loài cây không liên quan gì đến ớt chuông có xuất xứ từ Ấn Độ, Piper nigrum, là một loại gia vị đắt giá; tên gọi \"ớt\" vào lúc đó được sử dụng tại châu Âu cho bất gì loại gia vị nào mà nóng và hăng, và cũng tự nhiên được đặt cho chi thực vật vừa mới được phát hiện là Capsicum. Tên thay thế thông thường nhất của họ cây này, \"chile\"(ớt), có nguồn gốc từ tiếng Mexico, từ ngôn ngữ Nahuatl là chilli hay xilli. Ớt chuông về mặt thực vật học là trái cây, nhưng lại thường được xem là rau quả trong lĩnh vực nấu nướng.</p><p>Trong khi ớt chuông là một thành viên của chi ớt, nó là quả duy nhất mà không tạo ra capsaicin[5], một hợp chất ưa chất béo có thể gây ra cảm giác cay nóng mạnh khi tiếp xúc với các màng nhầy. (Một ngoại lệ của trường hợp này là ớt lai Mexibelle, loài có chứa một lượng capsaicin trung bình, và do đó cũng hơi cay). Việc thiếu chất capsaicin trong ớt chuông là do tính lặn của một gen mà qua đó làm mất đi capsaicin. Kết quả là vị \"cay\" chỉ đi cùng với các loài còn lại của chi ớt.[6]</p><p>Từ \"bell pepper\", \"pepper\" hay ở Ấn Độ, Úc và New Zealand là \"capsicum\", thường được sử dụng cho bất kỳ quả nào có hình chiếc chuông, không kể màu sắc. Trong tiếng Anh hay tiếng Anh Canada, quả chỉ đơn giản là nói đến \"pepper\", hay kèm theo màu sắc (như trong từ \"green pepper\"), trong khi ở Hoa Kỳ và Malaysia, người ta thường nói đến \"bell pepper\". Trong tiếng Anh Canada thì sử dụng cả hai chữ \"bell pepper\" và \"pepper\" thay thế cho nhau.</p><p>Hầu hết ớt chuông có màu xanh, vàng, cam, và đỏ. Hiếm hơn thì có thể là màu nâu, trắng, cầu vồng, Oải hương (màu), và tím sẫm, tùy thuộc vào giống ớt chuông. Thường nhất là, các quả chưa chín thì có màu xanh lục, hay ít gặp hơn là vàng xám hay màu tím. Ớt chuông đỏ chỉ đơn giản là ớt chuông xanh đã chín,[7] dù rằng giống Permagreen vẫn duy trì màu xanh lục ngay cả khi đã chín hoàn toàn. Ớt chuông xanh thì ít ngọt và hơi đắng hơn so với ớt chuông vàng và cam, và ớt chuông đỏ có vị ngọt nhất. Vị của ớt chuông chín cũng có thể rất đa dạng tùy theo điều kiện trồng và điều kiện bảo quản sau khi thu hoạch. Quả ngọt nhất được để chín hẳn trêncây ngoài nắng, còn quả thu hoạch khi còn xanh hay để tự chín khi bảo quản thì ít ngọt hơn.</p><p>Tỷ lệ phần trăm xấp xỉ gần đúng sử dụng lượng hấp thụ thực phẩm tham chiếu (Khuyến cáo của Hoa Kỳ) cho người trưởng thành.</p><p>Nguồn: CSDL Dinh dưỡng của USDA</p><p>Ớt chuông rất giàu các chất chống oxy hóa và vitamin C. So với ớt chuông xanh, ớt chuông đỏ có nhiều vitamin và dưỡng chất hơn.[8] Lượng carotene, giống như lycopene, trong ớt chuông đỏ cao gấp 9 lần. Ớt chuông đỏ còn chứa gấp đôi lượng vitamin C so với ớt chuông xanh.[8]</p><p>Cả ớt chuông đỏ và xanh đều có chứa nhiều axit para coumaric</p><p>Đặc tính thơm của ớt chuông xanh là do hợp chất 3-iso Butyl-2-methoxypyrazine (IBMP). Ngưỡng phát hiện trong nước của nó là khoảng 2 ngL.[9]</p>', 1, 'vegetables/sp10.webp', 'vegetables/sp10.2.webp|vegetables/sp10.3.webp', 2, '2022-12-01 08:52:24', '2022-12-11 18:39:50');
INSERT INTO `tbl_products` (`id`, `name`, `price`, `discount`, `description`, `details`, `state`, `image_main`, `images_sub`, `id_category_product`, `created_at`, `updated_at`) VALUES
(10, 'Thịt bò', 160000, 0, '<p>Thịt bò là thịt của con bò (thông dụng là loại bò thịt). Đây là thực phẩm gia súc phổ biến trên thế giới, cùng với thịt lợn, được chế biến và sử dụng theo nhiều cách, trong nhiều nền văn hoá và tôn giáo khác nhau, cùng với thịt lợn và thịt gà, thịt bò là một trong những loại thịt được con người sử dụng ...</p>', '<p>Thị trường bò hay thị trường con bò tót (Bull market) là thuật ngữ trong thị trường chứng khoán về hình tượng của một con bò mộng hay bò tót dùng để ẩn dụ về xu hướng thị trường theo diễn biến đi lên khi nhà đầu cơ thị trường chứng khoán mua cổ phiếu đang nắm giữ với kỳ vọng rằng trong thời gian ngắn nó sẽ tăng giá trị (mệnh giá), sau đó họ sẽ bán số cổ phiếu đó để kiếm lời nhanh chóng từ giao dịch như một món hời.</p><p>Hình tượng con bò biểu tượng cho thị trường \"bò\" (bull) trong giao dịch chứng khoán nổi tiếng hơn cả là đó là tượng con bò to lớn dựng ở ven lề đường dẫn vào công viên Bowling Green gần Phố Wall nên còn được gọi là Con bò Phố Wall (Charging Bull). Thị trường con bò tót hiện nay thông dụng dùng để chỉ một thị trường đang trên đà đi lên với đặc trưng bởi sự gia tăng đều đặn thị giá của các cổ phiếu và trong thời gian thị trường là \"con bò tót\", giới đầu tư tài chính có niềm tin rằng một xu hướng thị trường đi lên sẽ còn tiếp tục và khởi sắc.</p><p>Nguồn gốc chính xác của cụm từ \"thị trường bò\" thì hiện nay không ai biết tới một cách rõ ràng. Chỉ biết rằng, trong cuốn Từ điển tiếng Anh Oxford trích dẫn một sử dụng từ năm 1891 của thuật ngữ \"thị trường bò\" mà liên hệ đến trong tiếng Pháp thì có cụm từ \"bulle spéculative\" chỉ một bong bóng thị trường đầu cơ, như vậy là từ điển từ nguyên trực tuyến liên quan từ \"bull\" liên quan tới \"thổi phồng, sưng lên\", và định ngày cho ý nghĩa thị trường chứng khoán của nó vào năm 1714[1] Một nguồn gốc chính đáng khác là từ chữ \"Bulla\" có nghĩa là hóa đơn (bill), hoặc hợp đồng. Khi một thị trường đang tăng lên, những người nắm giữ của các hợp đồng giao hàng trong tương lai của một hàng hóa thấy được giá trị gia tăng hợp đồng của họ.</p><p>Người ta còn nhìn vào tự nhiên về phong cách chiến đấu của con bò mộng có thể có một tác động lớn đến cái tên thị trường Bò đấu[2] thị trường con bò được đặt tên theo cách mà các con vật này tấn công các nạn nhân của chúng với cách tấn công đặc trưng của một con bò tót, khi một con bò đực chiến đấu nó sẽ hất sừng của nó lên giương sừng lên cao tấn công về phía trước và húc lên liên tưởng sự đặc trưng của hình thái thị trường (ẩn dụ cho giá cổ phiếu đang tăng). Một số giả thuyết tương tự đã được sử dụng như phương tiện giúp trí nhớ như Bull là viết tắt của bully, bây giờ mang ý nghĩa của xuất sắc và nó liên quan đến tốc độ của động vật này vì con bò đực thường lao đến phi với tốc độ rất cao khi phi đến húc[3] Từ bò mộng (bull) ban đầu được dùng để chỉ gia đình hoạt động ngân hàng giao thương cũ là ngân hàng Bulstrodes. Từ \"bò\" còn thể hiện các hoàn vốn của thị trường là \"đầy đủ\", mặt khác, \"Bò\" tượng trưng cho tích trữ trước với sự tự tin quá mức. Nhóm tác phẩm điêu khắc quốc tế Mark và Diane Weisbeck đã được chọn để thiết kế lại Thị trường Bò của phố Wall và bức điêu khắc chiến thắng của họ, \"Bull Market Rocket\" đã được chọn làm biểu tượng thế kỷ 21, hiện đại của Thị trường Bò xu hướng lên.</p><p>Tượng gấu đấu bò trước Sở Giao dịch Chứng khoán Thành phố Hồ Chí Minh, nếu các bức tượng khác thường khắc họa cảnh hai con vật đang chuẩn bị chiến đấu thì bức tượng này lại diễn tả con bò có phần thắng thế khi húc trúng con gấu, biểu thị sự ủng hộ cho xu hướng thị trường đang lên để kỳ vọng nền kinh tế tăng trưởng</p><p>Thị trường bò hay thị trường con bò tót (Bull market) là thuật ngữ trong thị trường chứng khoán về hình tượng của một con bò mộng hay bò tót dùng để ẩn dụ về xu hướng thị trường theo diễn biến đi lên khi nhà đầu cơ thị trường chứng khoán mua cổ phiếu đang nắm giữ với kỳ vọng rằng trong thời gian ngắn nó sẽ tăng giá trị (mệnh giá), sau đó họ sẽ bán số cổ phiếu đó để kiếm lời nhanh chóng từ giao dịch như một món hời.</p><p>Hình tượng con bò biểu tượng cho thị trường \"bò\" (bull) trong giao dịch chứng khoán nổi tiếng hơn cả là đó là tượng con bò to lớn dựng ở ven lề đường dẫn vào công viên Bowling Green gần Phố Wall nên còn được gọi là Con bò Phố Wall (Charging Bull). Thị trường con bò tót hiện nay thông dụng dùng để chỉ một thị trường đang trên đà đi lên với đặc trưng bởi sự gia tăng đều đặn thị giá của các cổ phiếu và trong thời gian thị trường là \"con bò tót\", giới đầu tư tài chính có niềm tin rằng một xu hướng thị trường đi lên sẽ còn tiếp tục và khởi sắc.</p><p>Từ nguyên</p><p>Nguồn gốc chính xác của cụm từ \"thị trường bò\" thì hiện nay không ai biết tới một cách rõ ràng. Chỉ biết rằng, trong cuốn Từ điển tiếng Anh Oxford trích dẫn một sử dụng từ năm 1891 của thuật ngữ \"thị trường bò\" mà liên hệ đến trong tiếng Pháp thì có cụm từ \"bulle spéculative\" chỉ một bong bóng thị trường đầu cơ, như vậy là từ điển từ nguyên trực tuyến liên quan từ \"bull\" liên quan tới \"thổi phồng, sưng lên\", và định ngày cho ý nghĩa thị trường chứng khoán của nó vào năm 1714[1] Một nguồn gốc chính đáng khác là từ chữ \"Bulla\" có nghĩa là hóa đơn (bill), hoặc hợp đồng. Khi một thị trường đang tăng lên, những người nắm giữ của các hợp đồng giao hàng trong tương lai của một hàng hóa thấy được giá trị gia tăng hợp đồng của họ.</p><p>Người ta còn nhìn vào tự nhiên về phong cách chiến đấu của con bò mộng có thể có một tác động lớn đến cái tên thị trường Bò đấu[2] thị trường con bò được đặt tên theo cách mà các con vật này tấn công các nạn nhân của chúng với cách tấn công đặc trưng của một con bò tót, khi một con bò đực chiến đấu nó sẽ hất sừng của nó lên giương sừng lên cao tấn công về phía trước và húc lên liên tưởng sự đặc trưng của hình thái thị trường (ẩn dụ cho giá cổ phiếu đang tăng). Một số giả thuyết tương tự đã được sử dụng như phương tiện giúp trí nhớ như Bull là viết tắt của bully, bây giờ mang ý nghĩa của xuất sắc và nó liên quan đến tốc độ của động vật này vì con bò đực thường lao đến phi với tốc độ rất cao khi phi đến húc[3] Từ bò mộng (bull) ban đầu được dùng để chỉ gia đình hoạt động ngân hàng giao thương cũ là ngân hàng Bulstrodes. Từ \"bò\" còn thể hiện các hoàn vốn của thị trường là \"đầy đủ\", mặt khác, \"Bò\" tượng trưng cho tích trữ trước với sự tự tin quá mức. Nhóm tác phẩm điêu khắc quốc tế Mark và Diane Weisbeck đã được chọn để thiết kế lại Thị trường Bò của phố Wall và bức điêu khắc chiến thắng của họ, \"Bull Market Rocket\" đã được chọn làm biểu tượng thế kỷ 21, hiện đại của Thị trường Bò xu hướng lên.</p><p>Đặc điểm</p><p>Về đặc điểm cung và cầu chứng khoán trong một thị trường con bò tót thì cầu chứng khoán cao hơn cung vì nhiều nhà đầu tư muốn mua, trong khi rất ít người muốn bán dẫn đến giá cổ phiếu tăng. Trong thời gian thị trường là \"bò tót\", giới đầu tư có niềm tin rằng, một xu hướng đi lên sẽ còn tiếp tục vì lực cầu mạnh và nguồn cung yếu, nhà đầu tư sẵn sàng tham gia với kỳ vọng thu được lợi nhuận và về tổng thể thì nền kinh tế tăng trưởng mạnh do nguồn lợi nhuận cao, ổn định. Trong thị trường con bò tót, hầu hết nhà đầu tư cảm thấy hứng thú với thị trường, họ sẵn sàng tham gia vào thị trường với hy vọng sẽ thu được lợi nhuận cao.</p><p>Sự thay đổi trong hoạt động kinh tế trong một thị trường con bò tót là sự khởi sắc về kinh tế. Trong thị trường con bò tót, điều nhà đầu tư thường làm là tận dụng việc giá tăng lên để mua vào ngay từ đầu thời kỳ và bán ra khi giá các cổ phiếu nắm giữ đang lên đến đỉnh vì nhìn chung, nhiều nhà đầu tư có xu hướng tin tưởng rằng thị trường đang tăng, họ sẽ có nhiều khả năng thu được lợi nhuận hơn và khi giá đang tăng, bất kỳ một khoản thua lỗ nào cũng trở thành nhỏ bé và mang tính tạm thời. Yếu tố cốt lõi quyết định một thị trường con bò tót là xu hướng trong dài hạn mà không phải những phản ứng tức thời của thị trường trước một sự kiện cụ thể.</p><p>Một tranh vui năm 1901 mô tả nhà tài chính J. P. Morgan như một con bò đực với các nhà đầu tư háo hức</p><p>Một thị trường Bò có liên quan với tăng niềm tin nhà đầu tư, và tăng đầu tư vào các dự đoán tăng giá trong tương lai (các tăng vốn). Một xu hướng Bò trong thị trường chứng khoán thường bắt đầu trước khi nền kinh tế nói chung có dấu hiệu phục hồi rõ nét. Ví dụ như chỉ số Sàn giao dịch chứng khoán Bombay của Ấn Độ, Sensex, đã trong một xu hướng thị trường Bò trong khoảng năm năm, từ tháng 4 năm 2003 đến tháng 1 năm 2008 vì nó tăng từ 2.900 điểm lên 21.000 điểm. Các thị trường bò đáng chú ý được đánh dấu 1925-1929, 1953-1957 và giai đoạn 1993-1997 khi thị trường chứng khoán Mỹ và nhiều nơi khác tăng; trong khi giai đoạn đầu tiên kết thúc đột ngột với sự bắt đầu của Đại khủng hoảng sự kết thúc của các khoảng thời gian sau chủ yếu là các giai đoạn của hạ cánh mềm, mà đã trở thành các thị trường gấu lớn. (<i>xem</i>: Suy thoái kinh tế 1960-1961 và bong bóng dot-com trong 2000-01).</p><p>Mức đáy của thị trường là một sự đảo ngược xu hướng, kết thúc của sự suy thoái thị trường và trước sự khởi đầu của một xu hướng di chuyển lên phía trên (<i>thị</i> <i>trường</i> <i>bò</i>). Khi một bộ phận các nhà đầu tư biểu hiện một cảm tính có tính Bò (<i>tiêu</i> <i>cực</i>), một số nhà phân tích xem nó là một tín hiệu mạnh rằng một đáy thị trường có thể đã cận kề. Khả năng dự đoán của một tín hiệu như vậy (<i>cảm</i> <i>tính</i> <i>thị</i> <i>trường</i>) được chuyển thành cao nhất khi cảm tính nhà đầu tư đạt tới các giá trị cực đoan[4]. Các chỉ báo đo lường cảm tính nhà đầu tư có thể bao gồm cả dhỉ số cảm tính trí tuệ nhà đầu tư: Nếu lây lan Bò-Gấu (% <i>của</i> <i>Bò</i>-% <i>của</i> <i>Gấu</i>) đóng ở một thấp lịch sử, nó có thể là tín hiệu của đáy. Thông thường, số gấu được khảo sát sẽ vượt quá số bò. Tuy nhiên, nếu số bò ở tại một cực cao và số gấu ở tại một cực thấp, một cách lịch sử, một đỉnh thị trường có thể vừa xuất hiện hoặc gần xảy ra. Đo lường trái ngược này là đáng tin cậy hơn cho phối hợp ngẫu nhiên của nó tại các đáy thị trường hơn là các đỉnh.</p>', 1, 'meat/sp11.webp', '', 4, '2022-12-01 08:53:50', '2022-12-01 08:53:50'),
(11, 'Cá hồi', 300000, 33, '<p>Cá hồi là tên chung cho nhiều loài cá thuộc họ Salmonidae. Nhiều loại cá khác cùng họ được gọi là trout (cá hồi); sự khác biệt thường được cho là cá hồi salmon di cư còn cá hồi trout không di cư, nhưng sự phân biệt này không hoàn toàn chính xác. Cá hồi sống dọc các bờ biển tại cả Bắc Đại Tây ...</p>', '<p>Cá hồi là tên chung cho nhiều loài cá thuộc họ Salmonidae. Nhiều loại cá khác cùng họ được gọi là trout (cá hồi); sự khác biệt thường được cho là cá hồi salmon di cư còn cá hồi trout không di cư, nhưng sự phân biệt này không hoàn toàn chính xác. Cá hồi sống dọc các bờ biển tại cả Bắc Đại Tây Dương (các họ di cư Salmo salar) và Thái Bình Dương (khoảng sáu họ của giống Oncorhynchus), và cũng đã từng được đưa tới Hồ lớn ở Bắc Mỹ. Cá hồi được sản xuất nhiều trong ngành nuôi trồng thủy sản ở nhiều nơi trên thế giới.</p><p>Về đặc trưng, cá hồi là cá ngược sông để sinh sản: chúng sinh ra tại khu vực nước ngọt, di cư ra biển, sau đó quay trở lại vùng nước ngọt để sinh sản. Tuy nhiên, có nhiều con thuộc nhiều loài sống cả đời tại vùng nước ngọt. Truyền thống dân gian cho rằng loài cá này trở về đúng nơi chúng được sinh ra để đẻ trứng; những cuộc nghiên cứu đã cho thấy điều này là chính xác, và hành động quay lại nơi ra đời này đã được thể hiện phụ thuộc vào ký ức khứu giác.[2][3]</p><p>Trứng cá hồi được đẻ tại những dòng suối nước ngọt thông thường ở nơi có độ cao lớn. Trứng phát triển thành cá bột hay bọc trứng (sac fry). Cá mới nở nhanh chóng phát triển thành cá con với những dải ngụy trang dọc. Cá con ở lại dòng suối quê hương trong sáu tháng tới ba năm trước khi trở thành cá non, được phân biện bởi màu sáng bạc với các vảy có thể dễ dàng bóc. Ước tính chỉ 10% trứng cá hồi sống sót tới giai đoạn này.[49] Tính chất hóa học cơ thể của cá con thay đổi, cho phép chúng sống trong nước mặn. Cá hồi con dành một phần thời gian di cư để sống ở vùng nước lợ, tính chất hóa học cơ thể của chúng trở nên quen thuộc với điều kiện thẩm thấu tại đại dương.</p><p>Cá hồi xây dựng tổ (redd) tại khu nước chảy nhanh và nông của sông</p><p>Các bọc trứng (sac fry) vẫn còn trong môi trường sống với sỏi của các hố redd (tổ) cho đến khi noãn hoàng của chúng (còn gọi là \"hộp cơm trưa\") cạn kiệt</p><p>Cá hồi con, parr, lớn lên tại dòng sông quê hương được bảo vệ khá tốt</p><p>Cá con mất các sọc ngụy trang và trở thành cá non khi chúng sẵn sàng di ra biển</p><p>Cá Sockey đực trưởng thành ở biển</p><p>Cá Sockeye đực trưởng thành ở nước ngọt</p><p>Cá hồi dành khoảng một tới năm năm (tùy theo loài) ở biển khơi nơi chúng dần trưởng thành về giới tính. Cá hồi trưởng thành sau đó đa số quay lại dòng suối quê hương để đẻ trứng. Tại Alaska, sự trao đổi chéo với dòng suối khác cho phép cá hồi tới sinh sống tại những dòng suối mới, như những con cá xuất hiện khi một sông băng rút lui. Phương pháp chính xác cá hồi dùng để định hướng vẫn chưa được xác định, dù khứu giác tốt của chúng có liên quan. Cá hồi Đại Tây Dương dành từ một tới bốn năm ở biển. (Khi một con cá quay về sau chỉ một năm sống ở biển được gọi là grilse ở Canada, Anh và Ireland.) Trước khi đẻ trứng, tùy thuộc theo loài, cá hồi trải qua sự thay đổi. Chúng có thể phát triển một cái bướu, mọc răng nanh, phát triển một bướu gù (một sự uốn cong của hàm ở cá hồi đực). Tất cả sẽ chuyển từ màu xanh bạc của cá nước ngọt ra sống ở biển sang một màu tối hơn. Cá hồi có thể thực hiện những chuyến đi đáng kinh ngạc, thỉnh thoảng di chuyển hàng trăm dặm ngược dòng nước chảy nhanh và mạnh để đẻ trứng. Ví dụ, cá hồi Chinook và sockeye từ miền trung Idaho di chuyển 900 dặm (1.400 km) và lên cao xấp xỉ 7.000 foot (2.100 m) từ Thái Bình Dương khi chúng quay về để đẻ trứng. Sức khỏe của chúng kém đi khi chúng càng sống lâu trong nước ngọt, và càng kém nữa saiu khi chúng đẻ trứng, khi chúng được gọi là kelt. Ở mọi loài cá hồi Thái Bình Dương, các cá nhân trưởng thành chết trong vòng vài ngày hay vài tuần sau khi đẻ trứng, một đặc điểm được gọi là semelparity. Khoảng 2% tới 4% cá hồi Đại Tây Dương cái sống sót để đẻ trứng lần nữa. Tuy nhiên, ở những loài cá hồi có thể đẻ trứng hơn một lần này (iteroparity), tỷ lệ chết sau khi đẻ khá cao (có lẽ lên tới 40 tới 50%.)</p><p>Để đẻ bọc trứng, cá hồi cái dùng đuôi (vây đuôi), để tạo một vùng áp suất thấp, khiến sỏi trôi xuôi dòng, tạo một hố lõm nông, được gọi là một redd (tổ cá hồi). Hố redd có thể thỉnh thoảng chứa 5.000 trứng rộng 30 foot vuông (2,8 m2).[50] Trứng thường có màu cam tới đỏ. Một hay nhiều con đực bơi cạnh con cái, phun tinh trùng, hay tinh dịch (milt), lên trứng.[48] Sau đó con cái đẩy sỏi phía đầu dòng phủ trứng trước khi bơi đi tạo một tổ redd khác. Con cái sẽ làm thậm chí tới bảy redd trước khi hết trứng.[48]</p><p>Mỗi năm, con cá trải qua một giai đoạn phát triển nhanh, thường vào mùa hè, và một giai đoạn phát triển chậm, thường vào mùa đông. Việc này tạo ra các hình vòng tròn quanh xương tai được gọi là otolith, (annuli) tương tự với các vòng tăng trưởng ở thân cây. Giai đoạn tăng trưởng ở nước ngọt là những vòng dày đặc, giai đoạn tăng trưởng ở biển là những vòng rộng; việc đẻ trứng được đánh dấu bằng sự ăn mòn đáng kể khi khối lượng cơ thể được chuyển thành trứng và tinh dịch.</p><p>Các dòng suối nước ngọt và các cửa sông cung cấp môi trường sống quan trọng cho nhiều loài cá hồi. Chúng ăn cả côn trùng sống trên cạn, côn trùng sống dưới nước và côn trùng lưỡng cư, và các loại giáp xác khi còn nhỏ, và chủ yếu ăn các loại cá khác khi lớn. Trứng được đẻ ở những vùng nước sâu hơn với những viên sỏi lớn hơn, và cần nước mạt và dòng chảy mạnh (để cung cấp ôxi) để phôi phát triển. Tỷ lệ chết ở cá hồi trong những giai đoạn sống đầu tiên thường cao vì bị ăn thịt tự nhiên và những thay đổi do con người tác động tới môi trường sống của chúng, như sự lắng bùn, nhiệt độ nước cao, tập trung ôxi thấp, mất các lùm cây tại suối, và giảm tốc độ dòng chảy của sông. Các cửa sông và các vùng đất ướt gần chúng cung cấp môi trường phát triển sống còn cho cá hồi trước khi di cư ra biển khơi. Các vùng đất ướt không chỉ là nơi đệm cho cửa sông khỏi phù sa và các chất ô nhiễm, mà còn là những khu vực sinh sống và ẩn nấp quan trọng.</p><p>Cá hồi không bị chết bởi các phương tiện khác đối mặt với tình trạng giảm sút sức khỏe tăng tốc rất nhanh (phenoptosis, hay \"tình trạng già hóa đã được lập trình\") ở cuối đời. Thân thể chúng nhanh chóng bị phân rã ngay sau khi đẻ trứng, là hậu quả của việc giải phóng những lượng lớn corticosteroid.</p>', 1, 'meat/sp12.webp', '', 4, '2022-12-01 08:54:49', '2022-12-09 10:01:36'),
(12, 'Thịt gà', 100000, 0, '<p>Thịt gà là thực phẩm gia cầm phổ biến nhất trên thế giới. Do có chi phí thấp và dễ chăn nuôi hơn so với các động vật khác như trâu bò hoặc lợn, nên gà đã trở thành loại thực phẩm không thể thiếu trong ẩm thực của nhiều nền văn hóa trên thế giới, và thịt của chúng đã được biến tấu để phù hợp với khẩu vị của từng …</p>', '<p>Thịt gà là thực phẩm gia cầm phổ biến nhất trên thế giới. Do có chi phí thấp và dễ chăn nuôi hơn so với các động vật khác như trâu bò hoặc lợn, nên gà đã trở thành loại thực phẩm không thể thiếu trong ẩm thực của nhiều nền văn hóa trên thế giới, và thịt của chúng đã được biến tấu để phù hợp với khẩu vị của từng …Thịt gà là thực phẩm gia cầm phổ biến nhất trên thế giới.[1] Do có chi phí thấp và dễ chăn nuôi hơn so với các động vật khác như trâu bò hoặc lợn, nên gà đã trở thành loại thực phẩm không thể thiếu trong ẩm thực của nhiều nền văn hóa trên thế giới, và thịt của chúng đã được biến tấu để phù hợp với khẩu vị của từng khu vực.</p><p>Thịt gà có thể được chế biến theo nhiều cách khác nhau tùy theo mục đích của chúng, bao gồm bỏ lò, nướng, quay, chiên hoặc luộc, cùng nhiều phương pháp khác. Kể từ nửa sau của thế kỷ 20, thịt gà chế biến sẵn đã trở thành một mặt hàng chủ yếu của dòng thực phẩm thức ăn nhanh. Loại thịt này đôi khi được coi là tốt cho sức khỏe hơn thịt đỏ, trong đó nồng độ cholesterol và chất béo bão hòa thấp hơn hẳn.[2]</p><p>Ngành công nghiệp chăn nuôi gà tồn tại dưới nhiều hình thức khác nhau trên khắp thế giới. Ở các nước phát triển, gà thường được nuôi theo phương pháp thâm canh, trong khi các khu vực kém phát triển hơn thì nuôi gà bằng các kỹ thuật chăn nuôi truyền thống. Liên hợp quốc ước tính rằng có đến 19 tỷ con gà trên Trái đất, nhiều gấp hơn hai lần so với dân số loài người.[3]</p><p>Thịt gà có nhiều phần nạc và tương đối ít mỡ, nên chứa một hàm lượng protein cao và đa dạng. Chính vì vậy, bổ sung các món ăn từ gà vào thực đơn hàng ngày sẽ mang lại cho người tiêu dùng nhiều lợi ích về sức khỏe, từ phát triển cơ bắp cho đến giảm cân hiệu quả. Ăn thịt gà có thể giúp mang tới một hàm răng và xương chắc khỏe. Bởi trong thịt gà có rất nhiều Phosphor – chất có lợi cho răng và xương. Ngoài ra, chất này còn góp phần đảm bảo các chức năng của các bộ phận như thận, gan, thần kinh trung ương,… giúp chúng hoạt động tốt hơn. Đây là một trong những thành phần chính có trong thịt gà. Khoáng chất này rất cần thiết trong việc trao đổi chất trong cơ thể. Nhờ đó, tuyến giáp được cải thiện tốt và hoạt động tốt hơn, giúp tăng cường hệ miễn dịch trong cơ thể. Ngoài ra, trong thịt gà còn chứa một hàm lượng amino acid được gọi là tryptophan. Chất này có tác dụng làm dịu hệ thần kinh căng thẳng sau một ngày làm việc vất vả, cũng như mang lại giấc ngủ ngon.</p><p>Các giống gà hiện đại như Cornish Cross được lai tạo đặc biệt để sản xuất thịt, chú trọng vào tỷ lệ cho thịt của con vật. Những giống gà phổ biến nhất được tiêu thụ ở Hoa Kỳ là Cornish và White Rock.</p><p>Gà được nuôi đặc biệt để làm thực phẩm được gọi là gà thịt. Ở Mỹ, loại gà này thường bị giết thịt khi còn nhỏ. Ví dụ, các giống lai Cornish Cross hiện đại được làm thịt sớm nhất là 8 tuần để chiên và 12 tuần để quay.</p><p>Capon (gà trống thiến) cho nhiều thịt hơn và béo hơn. Vì lý do này, chúng được coi là một món ăn ngon và đặc biệt phổ biến vào thời Trung Cổ.</p><p>Thịt gà chứa lượng chất béo không bão hòa nhiều gấp hai đến ba lần so với hầu hết các loại thịt đỏ khi tính theo phần trăm trọng lượng.[17]</p><p>Thịt gà thường chứa ít chất béo (ngoại trừ gà trống thiến). Lượng mỡ thường tập trung nhiều trên da. Một khẩu phần 100g ức gà bỏ lò chứa 4 gam chất béo và 31 gam protein, so với 10 gam chất béo và 27 gam protein đối với cùng một khẩu phần bít tết nhỏ.[18][19]</p>', 1, 'meat/sp13.webp', '', 4, '2022-12-01 08:56:23', '2022-12-09 10:01:37'),
(13, 'Thịt lợn', 150000, 0, '<p>Tiết lợn còn chứa hàm lượng lecithin, sắt và một số nguyên tố khác cần thiết cho cơ thể. Ngoài ra tiết lợn còn có tác dụng phòng chống ung thư, hỗ trợ giảm béo, chống lão hóa...</p>', '<p>Thịt lợn hay thịt heo là thịt từ heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...)[1], điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác[2]. Ngoài ra, còn dùng thịt heo để chế biến 1 số món độc lạ, hấp dẫn và còn là 1 món ăn ưa thích của 1 số du khách nước ngoài. Thịt heo rẻ mà ngon,thơm của thịt luộc, bùi, đậm của thịt kho, thịt heo còn dùng để cúng trong các dịp lễ( heo quay). Heo quay là lễ vật cúng tượng trưng cho sự căng tròn, thịnh vượng và ấm no vì thế trong các buổi cúng lớn, những dịp khai trương, lễ tết.. họ thường chọn thịt heo quay.</p><p>Thịt lợn chứa hàm lượng protein cao cùng nhiều vitamin và khoáng chất. Thịt lợn nạc là một thực phẩm tuyệt vời cho chế độ ăn uống lành mạnh. Nó chứa tất cả các amino acid thiết yếu cho sự tăng trưởng và duy trì cơ thể khỏe mạnh. Mỡ lợn đôi khi được sử dụng như là một chất béo trong nấu ăn. Giống như các loại thịt đỏ, thịt lợn chủ yếu gồm các chất béo bão hòa và chất béo không bão hòa với hàm lượng tương đương nhau.Vitamin B12 trong thịt lợn rất quan trọng cho sự hình thành máu và chức năng của não. Thiếu hụt vitamin B12 có thể gây thiếu máu và tổn hại đến tế bào thần kinh. Vitamin B6 quan trọng đối với sự hình thành của các tế bào máu đỏ.</p><p>Thịt lợn đặc biệt giàu thiamin, một trong những vitamin nhóm B đóng một vai trò thiết yếu trong các chức năng của cơ thể. Thịt lợn cũng chứa nhiều selenium, kẽm là chất cần thiết cho một bộ não và hệ thống miễn dịch khỏe mạnh.Creatine trong thịt là một nguồn năng lượng cho cơ bắp. Nhiều nghiên cứu chỉ ra rằng nó có thể cải thiện sự tăng trưởng và duy trì cơ bắp.Vitamin B3 rất quan trọng cho sự tăng trưởng và chuyển hóa. Phosphor cần thiết cho sự tăng trưởng và duy trì cơ thể khỏe mạnh.</p><p>Thịt lợn cũng được xem là một nguồn cung cấp sắt dồi dàoTaurine được tìm thấy trong cá và thịt, taurine là một amino acid chống oxy hóa, có vai trò quan trọng đối với tim và các chức năng cơ bắp.Carnosine là một chất rất quan trọng cho chức năng cơ bắp. Mức độ arnosine trong cơ bắp của con người liên quan tới việc giảm mệt mỏi và cải thiện hiệu suất lao động.Thịt lợn có chứa nhiều chất dinh dưỡng lành mạnh có lợi cho cơ bắp bao gồm ưtaurie, creatine, và beta-alanine. Beta-alanine là một amino acid, được sử dụng để sản xuất carnosine trong cơ thể.</p><p>Ở Việt Nam có thể nhìn là phân biệt được đâu là thịt thủ (phần đầu), nạc vai, xương sườn, sườn non, thịt mông, thịt đùi, thịt ba rọi, thịt thăn, nạc thăn, chân giò, móng giò. Còn ở các nước hiện đại nơi mà heo được mổ trong lò sát sinh và đóng thành từng gói bán ở siêu thị thì các gói phải đề tên loại thịt để người tiêu thụ biết mà mua.</p><p>Thịt ngon nhất là phần giữa cổ và vai tức là ở gáy và phần chân giò vì nơi đó nạc và mỡ hòa vào nhau nên ăn không bị khô mà cũng không bị ngấy. Thịt bụng (tức thịt ba chỉ) thì nhiều mỡ ăn dễ ngấy. Thịt thăn là thịt nạc nên dễ khô nếu không nấu khéo. Ngoài ra thì thịt ba chỉ (còn được gọi là ba rọi) cũng là khúc thịt được ưa chuộng.</p>', 1, 'meat/sp14.webp', '', 4, '2022-12-01 08:57:32', '2022-12-09 10:04:24'),
(14, 'Chuối Nam Mỹ', 150000, 20, '<p>Chuối Nam Mỹ</p>', '<p>Chuối Nam Mỹ</p>', 1, 'fruits/sp35.webp', '', 1, '2022-12-09 11:28:16', '2022-12-10 05:39:54'),
(15, 'Buởi da xanh', 300000, 10, '<p>Buởi da xanh</p>', '<p>Buởi da xanh</p>', 1, 'fruits/sp32.webp', '', 1, '2022-12-09 16:56:45', '2022-12-11 18:29:33'),
(16, 'Chanh tươi vỏ vàng', 25000, 10, '<p>Chanh tươi vỏ vàng</p>', '<p>Chanh tươi vỏ vàng</p>', 1, 'fruits/sp30.webp', '', 1, '2022-12-09 17:02:47', '2022-12-10 05:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

CREATE TABLE `tbl_staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_authorization` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`id`, `staff_name`, `password`, `confirm_password`, `id_authorization`, `created_at`, `updated_at`) VALUES
(1, 'staffone', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2022-12-01 18:35:45', '2022-12-01 18:35:45'),
(2, 'stafftwo', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2022-12-01 18:35:59', '2022-12-01 18:35:59'),
(3, 'staffthree', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2022-12-01 18:40:05', '2022-12-01 18:40:19'),
(4, 'stafffour', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2022-12-01 18:43:12', '2022-12-01 18:43:12'),
(5, 'stafffive', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2022-12-01 18:43:17', '2022-12-01 18:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_authorization` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fullname`, `email`, `avatar`, `password`, `confirm_password`, `state`, `token`, `id_authorization`, `created_at`, `updated_at`) VALUES
(69488595, 'NGUYỄN VĂN VIÊN', 'viennv.21it@vku.udn.vn', 'https://lh3.googleusercontent.com/a/AEdFTp7YsDsLkwkfQr5UcRc2_7tsknu2-VVIsMjRMJgW=s96-c', NULL, NULL, 1, 'UB5hfgl3uZeBW89vkFnUHL1WJEtcsOmQlx2NqP35', 5, '2022-12-13 17:14:14', '2022-12-13 17:14:14'),
(103530288, 'Nguyễn Viên', 'nguyenvien161002@gmail.com', 'https://lh3.googleusercontent.com/a/AEdFTp6qW7wCdXud9no8CO6WrNlwYGzuRrMEid8jNM-COw=s96-c', NULL, NULL, 1, 'H8N1BRR6nyxV2ss8aDvIOMiKZ3zNjyrqW8oIL5HS', 5, '2022-12-15 01:50:17', '2022-12-15 01:50:17'),
(220771154, 'Nguyễn Văn Viên', 'viennv.developer@gmail.com', 'https://lh3.googleusercontent.com/a/AEdFTp67ZTfpO65zAEh1at9k5nkr3DawNbSaI9kl_teB=s96-c', NULL, NULL, 1, 'JP7y9DvRaTXgxUl1pBmFbFqyiuUF9rnyn64ijbsD', 5, '2022-12-14 20:15:31', '2022-12-14 20:15:31'),
(407854273, 'Nguyễn Viên', 'viennv.developer@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 1, 'yZ1YK0lMNNowdcOUZdIYGYwRImkPO80rP5a57qsr', 3, '2022-12-13 17:13:18', '2022-12-13 17:13:18');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_address_user`
--
ALTER TABLE `tbl_address_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_address_user_id_user_foreign` (`id_user`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_admin_id_authorization_foreign` (`id_authorization`);

--
-- Indexes for table `tbl_authorization`
--
ALTER TABLE `tbl_authorization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_details_order`
--
ALTER TABLE `tbl_details_order`
  ADD KEY `tbl_details_order_order_code_foreign` (`order_code`),
  ADD KEY `tbl_details_order_id_product_foreign` (`id_product`),
  ADD KEY `tbl_details_order_id_category_product_foreign` (`id_category_product`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_code`),
  ADD KEY `tbl_orders_id_user_foreign` (`id_user`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_products_id_category_product_foreign` (`id_category_product`);

--
-- Indexes for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_staffs_id_authorization_foreign` (`id_authorization`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_users_id_authorization_foreign` (`id_authorization`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_address_user`
--
ALTER TABLE `tbl_address_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_authorization`
--
ALTER TABLE `tbl_authorization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_address_user`
--
ALTER TABLE `tbl_address_user`
  ADD CONSTRAINT `tbl_address_user_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_id_authorization_foreign` FOREIGN KEY (`id_authorization`) REFERENCES `tbl_authorization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_details_order`
--
ALTER TABLE `tbl_details_order`
  ADD CONSTRAINT `tbl_details_order_id_category_product_foreign` FOREIGN KEY (`id_category_product`) REFERENCES `tbl_category_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_details_order_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_details_order_order_code_foreign` FOREIGN KEY (`order_code`) REFERENCES `tbl_orders` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_id_category_product_foreign` FOREIGN KEY (`id_category_product`) REFERENCES `tbl_category_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD CONSTRAINT `tbl_staffs_id_authorization_foreign` FOREIGN KEY (`id_authorization`) REFERENCES `tbl_authorization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_id_authorization_foreign` FOREIGN KEY (`id_authorization`) REFERENCES `tbl_authorization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
