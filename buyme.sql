-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2021 lúc 04:26 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thecoffeehouse`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `product_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cart_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_detail_id` varchar(100) COLLATE,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'Cà phê', '2021-10-29 19:31:28', '2021-10-29 19:31:28'),
('18', 'Thưởng thức tại nhà', '2021-10-29 19:31:28', '2021-10-29 19:31:28'),
('2', 'Đá Xay - Choco - Matcha', '2021-10-29 19:31:28', '2021-10-29 19:31:28'),
('20', 'Bộ sưu tập quà tặng', '2021-10-29 19:31:28', '2021-10-29 19:31:28'),
('5', 'Trà Trái Cây - Trà Sữa', '2021-10-29 19:31:28', '2021-10-29 19:31:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `created_at`) VALUES
(1, 'm0001_initial.php', '2021-11-23 08:55:30'),
(2, 'm0002_importData.php', '2021-11-23 08:55:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `delivery_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `delivery_phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `delivery_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `product_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `category_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_url` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(12) NOT NULL,
  `description` varchar(4000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `image_url`, `price`, `description`, `created_at`, `updated_at`) VALUES
('5b03966a1acd4d5bbd672373', '1', 'Americano Nóng', '/images/products/5b03966a1acd4d5bbd672373.png', 40000, 'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.', '2021-10-29 19:31:49', '2021-11-11 08:09:29'),
('5b03966a1acd4d5bbd672374', '1', 'Americano Đá', '/images/products/5b03966a1acd4d5bbd672374.png', 40000, 'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd672375', '2', 'Sinh Tố Việt Quất', '/images/products/5b03966a1acd4d5bbd672375.png', 59000, 'Mứt Việt Quất chua thanh, ngòn ngọt, phối hợp nhịp nhàng với dòng sữa chua bổ dưỡng. Là món sinh tố thơm ngon mà cả đầu lưỡi và làn da đều thích. \r\n        ', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5b03966a1acd4d5bbd672377', '1', 'Cappuccino Nóng', '/images/products/5b03966a1acd4d5bbd672377.png', 50000, 'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd672378', '1', 'Cappuccino Đá', '/images/products/5b03966a1acd4d5bbd672378.png', 50000, 'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd67237a', '1', 'Caramel Macchiato Nóng', '/images/products/5b03966a1acd4d5bbd67237a.png', 50000, 'Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd67237b', '1', 'Caramel Macchiato Đá', '/images/products/5b03966a1acd4d5bbd67237b.png', 50000, 'Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd67237c', '2', 'Chocolate Đá Xay', '/images/products/5b03966a1acd4d5bbd67237c.png', 59000, 'Sữa và kem tươi béo ngọt được “cá tính hoá” bởi vị chocolate/sô-cô-la đăng đắng. Dành cho các tín đồ hảo ngọt. Lựa chọn hàng đầu nếu bạn đang cần chút năng lượng tinh thần.', '2021-10-29 19:54:53', '2021-10-29 19:54:53'),
('5b03966a1acd4d5bbd67237e', '2', 'Cookie Đá Xay', '/images/products/5b03966a1acd4d5bbd67237e.png', 59000, 'Những mẩu bánh cookies giòn rụm kết hợp ăn ý với sữa tươi, kem tươi béo ngọt và đá xay mát lành, đem đến cảm giác lạ miệng gây thích thú và không thể cưỡng lại. Một món uống phá cách dễ thương đầy mê hoặc.', '2021-10-29 19:54:16', '2021-10-29 19:54:16'),
('5b03966a1acd4d5bbd67237f', '1', 'Espresso Đá', '/images/products/5b03966a1acd4d5bbd67237f.png', 45000, 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd672380', '1', 'Espresso Nóng', '/images/products/5b03966a1acd4d5bbd672380.png', 40000, 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd672390', '1', 'Latte Nóng', '/images/products/5b03966a1acd4d5bbd672390.png', 50000, 'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.\r\n\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd672391', '1', 'Latte Đá', '/images/products/5b03966a1acd4d5bbd672391.png', 50000, 'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd672393', '2', 'Matcha Đá Xay', '/images/products/5b03966a1acd4d5bbd672393.png', 59000, 'Matcha thanh, nhẫn, và đắng nhẹ được nhân đôi sảng khoái khi uống lạnh. Nhấn nhá thêm những nét bùi béo của kem và sữa. Gây thương nhớ vô cùng!', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5b03966a1acd4d5bbd672394', '2', 'Trà Matcha Latte Nóng', '/images/products/5b03966a1acd4d5bbd672394.png', 59000, 'Với màu xanh mát mắt của bột trà Matcha, vị ngọt nhẹ nhàng, pha trộn cùng sữa tươi và lớp foam mềm mịn, Matcha Latte sẽ khiến bạn yêu ngay từ lần đầu tiên.', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5b03966a1acd4d5bbd672395', '2', 'Trà Matcha Latte Đá', '/images/products/5b03966a1acd4d5bbd672395.png', 59000, 'Với màu xanh mát mắt của bột trà Matcha, vị ngọt nhẹ nhàng, pha trộn cùng sữa tươi và lớp foam mềm mịn, Matcha Latte sẽ khiến bạn yêu ngay từ lần đầu tiên.', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5b03966a1acd4d5bbd672397', '1', 'Mocha Nóng', '/images/products/5b03966a1acd4d5bbd672397.png', 50000, 'Loại cà phê được tạo nên từ sự kết hợp hoàn hảo của vị đắng đậm đà của Espresso và sốt sô-cô-la ngọt ngào mang tới hương vị đầy lôi cuốn, đánh thức mọi giác quan nên đây chính là thức uống ưa thích của phụ nữ và giới trẻ.\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd672398', '1', 'Mocha Đá', '/images/products/5b03966a1acd4d5bbd672398.png', 50000, 'Loại cà phê được tạo nên từ sự kết hợp hoàn hảo của vị đắng đậm đà của Espresso và sốt sô-cô-la ngọt ngào mang tới hương vị đầy lôi cuốn, đánh thức mọi giác quan nên đây chính là thức uống ưa thích của phụ nữ và giới trẻ.\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd67239c', '5', 'Trà Đào Cam Sả - Đá', '/images/products/5b03966a1acd4d5bbd67239c.png', 45000, 'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd67239d', '2', 'Chocolate Đá', '/images/products/5b03966a1acd4d5bbd67239d.png', 59000, 'Bột chocolate nguyên chất hoà cùng sữa tươi béo ngậy. Vị ngọt tự nhiên, không gắt cổ, để lại một chút đắng nhẹ, cay cay trên đầu lưỡi.', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5b03966a1acd4d5bbd67239e', '5', 'Trà Đen Macchiato', '/images/products/5b03966a1acd4d5bbd67239e.png', 50000, 'Trà đen được ủ mới mỗi ngày, giữ nguyên được vị chát mạnh mẽ đặc trưng của lá trà, phủ bên trên là lớp Macchiato homemade bồng bềnh quyến rũ vị phô mai mặn mặn mà béo béo.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5b03966a1acd4d5bbd6723a0', '1', 'Cà Phê Đen Nóng', '/images/products/5b03966a1acd4d5bbd6723a0.png', 35000, 'Không ngọt ngào như Bạc sỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà trôi tuột xuống vòm họng.', '2021-10-29 19:31:49', '2021-11-11 08:09:29'),
('5b03966a1acd4d5bbd6723a1', '1', 'Cà Phê Đen Đá', '/images/products/5b03966a1acd4d5bbd6723a1.png', 32000, 'Không ngọt ngào như Bạc sỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà trôi tuột xuống vòm họng.', '2021-10-29 19:31:49', '2021-11-11 08:09:29'),
('5b03966a1acd4d5bbd6723a2', '1', 'Cà Phê Sữa Nóng', '/images/products/5b03966a1acd4d5bbd6723a2.png', 35000, 'Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', '2021-10-29 19:31:49', '2021-11-11 08:09:29'),
('5b03966a1acd4d5bbd6723a3', '1', 'Cà Phê Sữa Đá', '/images/products/5b03966a1acd4d5bbd6723a3.png', 32000, 'Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', '2021-10-29 19:31:49', '2021-11-11 08:09:29'),
('5b03966a1acd4d5bbd6723a4', '1', 'Bạc Sỉu', '/images/products/5b03966a1acd4d5bbd6723a4.png', 32000, 'Bạc sỉu chính là Ly sữa trắng kèm một chút cà phê. Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.\r\n        ', '2021-10-29 19:31:49', '2021-11-11 08:09:29'),
('5b4c2f58a9d0590cb37cdade', '2', 'Chocolate Nóng', '/images/products/5b4c2f58a9d0590cb37cdade.png', 59000, 'Bột chocolate nguyên chất hoà cùng sữa tươi béo ngậy. Vị ngọt tự nhiên, không gắt cổ, để lại một chút đắng nhẹ, cay cay trên đầu lưỡi.', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5bfb492bacf0d31fd9646728', '5', 'Trà Đào Cam Sả - Nóng', '/images/products/5bfb492bacf0d31fd9646728.png', 52000, 'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5c3ff3c5acf0d338d22adbaa', '5', 'Trà Hạt Sen - Nóng', '/images/products/5c3ff3c5acf0d338d22adbaa.png', 52000, 'Nền trà oolong hảo hạng kết hợp cùng hạt sen tươi, bùi bùi thơm ngon. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5c3ff3c5acf0d338d22adbae', '5', 'Trà Hạt Sen - Đá', '/images/products/5c3ff3c5acf0d338d22adbae.png', 45000, 'Nền trà oolong hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5ca47f92acf0d3492076b299', '1', 'Cold Brew Sữa Tươi', '/images/products/5ca47f92acf0d3492076b299.png', 45000, 'Thanh mát và cân bằng với hương vị cà phê nguyên bản 100% Arabica Cầu Đất cùng sữa tươi thơm béo cho từng ngụm tròn vị, hấp dẫn.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5ca47f92acf0d3492076b29a', '1', 'Cold Brew Truyền Thống', '/images/products/5ca47f92acf0d3492076b29a.png', 45000, ' Tại Buy me store, Cold Brew được ủ và phục vụ mỗi ngày từ 100% hạt Arabica Cầu Đất với hương gỗ thông, hạt dẻ, nốt sô-cô-la đặc trưng, thoang thoảng hương khói nhẹ giúp Cold Brew giữ nguyên vị tươi mới.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5cdb677aacf0d33b682b4b73', '2', 'Chanh Sả Đá Xay', '/images/products/5cdb677aacf0d33b682b4b73.png', 49000, 'Sự kết hợp hài hoà giữa Chanh & sả - những nguyên liệu mộc mạc rất đỗi quen thuộc cho ra đời một thức uống thanh mát, vị chua chua ngọt ngọt giải nhiệt lại tốt cho sức khỏe.', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5cdbd6e8696fb3792a389754', '1', 'Bạc Sỉu Nóng', '/images/products/5cdbd6e8696fb3792a389754.png', 35000, 'Bạc sỉu chính là Ly sữa trắng kèm một chút cà phê. Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.\r\n        ', '2021-10-29 19:31:49', '2021-11-11 08:09:29'),
('5d2bdfa5acf0d30ba264432b', '2', 'Đào Việt Quất Đá Xay', '/images/products/5d2bdfa5acf0d30ba264432b.png', 59000, 'Vị đào quen thuộc, được khoác lên mình dáng vẻ thanh mát hơn khi kết hợp với mứt berry và lớp kem ngọt béo ngậy, cho hương vị kích thích vị giác đầy lôi cuốn và khoan khoái ngay từ ngụm đầu tiên.\r\n        ', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5d43be2e41d3ac39a44bd7a2', '5', 'Trà Phúc Bồn Tử', '/images/products/5d43be2e41d3ac39a44bd7a2.png', 50000, 'Quả Phúc Bồn Tử hoàn toàn tự nhiên, được các barista Nhà kết hợp một cách đầy tinh tế cùng trà Oolong và cam vàng tạo ra một dư vị hoàn toàn tươi mới. Mát lạnh ngay từ ngụm đầu tiên, đọng lại cuối cùng là hương vị trà thơm lừng và vị ngọt thanh, chua dịu khó quên của trái phúc bồn tử.\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5d43bf5d073b26002948a362', '2', 'Phúc Bồn Tử Cam Đá Xay', '/images/products/5d43bf5d073b26002948a362.png', 59000, 'Tê tái ngay đầu lưỡi bởi sự mát lạnh của đá xay. Hòa quyện thêm hương vị chua chua, ngọt ngọt từ cam tươi và phúc bồn tử 100% tự nhiên, cho ra một hương vị thanh mát, kích thích vị giác đầy thú vị ngay từ lần đầu thưởng thức. \r\n        ', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('5d43bfed073b26003161b693', '1', 'Cold Brew Phúc Bồn Tử', '/images/products/5d43bfed073b26003161b693.png', 50000, 'Vị chua ngọt của trái phúc bồn tử, làm dậy lên hương vị trái cây tự nhiên vốn sẵn có trong hạt cà phê, hòa quyện thêm vị đăng đắng, ngọt dịu nhẹ nhàng của Cold Brew 100% hạt Arabica Cầu Đất để mang đến một cách thưởng thức cà phê hoàn toàn mới, vừa thơm lừng hương cà phê quen thuộc, vừa nhẹ nhàng và thanh mát bởi hương trái cây đầy thú vị.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5e4f9e4316bd0a0018d2e24e', '1', 'Cà Phê Đá Xay-Lạnh', '/images/products/5e4f9e4316bd0a0018d2e24e.png', 59000, 'Một phiên bản upgrade từ ly cà phê sữa quen thuộc, nhưng lại tỉnh táo và tươi mát hơn bởi lớp đá xay đi kèm. Nhấp 1 ngụm cà phê đá xay là thấy đã, ngụm thứ hai thêm tỉnh táo và cứ thế lôi cuốn bạn đến ngụm cuối cùng.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5e92fd7dc788bc0011abaa06', '5', 'Trà Sữa Mắc Ca Trân Châu', '/images/products/5e92fd7dc788bc0011abaa06.png', 50000, 'Mỗi ngày với Buy me store sẽ là điều tươi mới hơn với sữa hạt mắc ca thơm ngon, bổ dưỡng quyện cùng nền trà oolong cho vị cân bằng, ngọt dịu đi kèm cùng Trân châu trắng giòn dai mang lại cảm giác “đã” trong từng ngụm trà sữa.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('5eb92ae0ee4dc00012633b2b', '20', 'Ly inox ống hút đen nhám', '/images/products/5eb92ae0ee4dc00012633b2b.png', 280000, 'Màu đen ngày nào cũng được khen- Chiếc ly inbox kèm ống hút mang sắc đen ngầu này sẽ là người bạn đồng hành may mắn mỗi ngày bên bạn, nước ngon hơn, nhiều cảm hứng hơn. \r\n        Dung tích: 500 ml\r\n        Chất liệu: Inox, nhựa', '2021-10-29 19:35:48', '2021-10-29 19:35:48'),
('5eb92ae1ee4dc00012633b2c', '20', 'Ly Inox Ống Hút Xanh Biển', '/images/products/5eb92ae1ee4dc00012633b2c.png', 280000, 'Màu xanh chốt gì cũng nhanh - Chiếc ly inbox kèm ống hút mang sắc xanh này sẽ là người bạn đồng hành may mắn mỗi ngày bên bạn, nước ngon hơn, nhiều cảm hứng hơn. \r\n        Dung tích: 500 ml\r\n        Chất liệu: Inox, nhựa', '2021-10-29 19:35:48', '2021-10-29 19:35:48'),
('5eb92ae1ee4dc00012633b2d', '20', 'Ly Inox Ống Hút Hồng Xanh', '/images/products/5eb92ae1ee4dc00012633b2d.png', 280000, 'Màu hồng xanh may mắn tới nhanh - Chiếc ly inbox kèm ống hút mang sắc xanh này sẽ là người bạn đồng hành may mắn mỗi ngày bên bạn, nước ngon hơn, nhiều cảm hứng hơn. \r\n        Dung tích: 500 ml \r\n        Chất liệu: Inox, nhựa', '2021-10-29 19:35:48', '2021-10-29 19:35:48'),
('5ee30512e852ce0011e71b07', '20', 'Bình giữ nhiệt Inox Quả Dứa', '/images/products/5ee30512e852ce0011e71b07.png', 300000, 'Xách bình đi khắp thế gian, với thiết kế xịn sò, màu sắc nổi bật, người bạn mới này sẽ nhắc bạn uống nước mỗi ngày ngon hơn, đều đặn hơn nha. \r\n        Dung tích: 500ml \r\n        Chất liệu: Inox ', '2021-10-29 19:35:48', '2021-10-29 19:35:48'),
('5ee30512e852ce0011e71b08', '20', 'Bình giữ nhiệt Inox Con Thuyền', '/images/products/5ee30512e852ce0011e71b08.png', 300000, 'Xách bình đi khắp thế gian, với thiết kế xịn sò, màu sắc nổi bật, người bạn mới này sẽ nhắc bạn uống nước mỗi ngày ngon hơn, đều đặn hơn nha. \r\n        Dung tích: 500ml \r\n        Chất liệu: Inox', '2021-10-29 19:35:48', '2021-10-29 19:35:48'),
('5ef00e2b91ab1a0012840421', '20', 'Ly Farm to Cup (Cao)', '/images/products/5ef00e2b91ab1a0012840421.png', 150000, 'Lấy cảm hứng từ vùng đất cà phê Việt Nam, ly sứ Farm To Cup sẽ cho bạn trải nghiệm đầy cảm hứng với món yêu thích  tại nhà, tại nơi làm việc mỗi ngày. \r\n        Dung tích ly: 400ml \r\n        Thành phần: Cao lanh, đất sét, tráng thạch, men màu.', '2021-10-29 19:35:48', '2021-10-29 19:35:48'),
('5ef00e2b91ab1a0012840422', '20', 'Ly Farm to Cup (Thấp)', '/images/products/5ef00e2b91ab1a0012840422.png', 120000, 'Lấy cảm hứng từ vùng đất cà phê Việt Nam, ly sứ Farm To Cup sẽ cho bạn trải nghiệm đầy cảm hứng với món yêu thích  tại nhà, tại nơi làm việc mỗi ngày. \r\n        Dung tích ly: 300ml \r\n        Thành phần: Cao lanh, đất sét, tráng thạch, men màu. ', '2021-10-29 19:35:48', '2021-10-29 19:35:48'),
('5ffbb2671327f700184f54d4', '2', 'Yogurt Dưa Lưới phát tài', '/images/products/5ffbb2671327f700184f54d4.png', 59000, 'Vị yogurt chua ngọt, mát lạnh tái tê, thêm topping dưa lưới vàng tươi, thơm lừng, vui miệng. Thật khó để không yêu ngay từ ngụm đầu tiên.\r\n        ', '2021-10-29 19:56:12', '2021-10-29 19:56:12'),
('6014df0e540c0c001894d83c', '5', 'Hồng Trà Sữa Trân Châu', '/images/products/6014df0e540c0c001894d83c.png', 55000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('6014df0e540c0c001894d83d', '5', 'Hồng Trà Sữa Nóng', '/images/products/6014df0e540c0c001894d83d.png', 50000, 'Từng ngụm trà chuẩn gu ấm áp, đậm đà beo béo bởi lớp sữa tươi chân ái hoà quyện.\r\n\r\n        Trà đen nguyên lá âm ấm dịu nhẹ, quyện cùng lớp sữa thơm béo khó lẫn - hương vị ấm áp chuẩn gu trà, cho từng ngụm nhẹ nhàng, ngọt dịu lưu luyến mãi nơi cuống họng.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('605da09f717e5d00114a3cdc', '5', 'Hồng Trà Latte Macchiato', '/images/products/605da09f717e5d00114a3cdc.png', 55000, 'Sự kết hợp hoàn hảo bởi hồng trà dịu nhẹ và sữa tươi, nhấn nhá thêm lớp macchiato trứ danh của Buy me store mang đến cho bạn hương vị trà sữa đúng gu tinh tế và healthy.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('60c62c8215234d0011ede49e', '18', 'Cà Phê Sữa Đá Hòa Tan', '/images/products/60c62c8215234d0011ede49e.png', 44000, 'Thật dễ dàng để bắt đầu ngày mới với tách cà phê sữa đá sóng sánh, thơm ngon như cà phê pha phin.\r\n        Vị đắng thanh của cà phê hoà quyện với vị ngọt béo của sữa, giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('60c62c8215234d0011ede49f', '18', 'Cà Phê Peak Flavor Hương Thơm Đỉnh Cao (350G)', '/images/products/60c62c8215234d0011ede49f.png', 90000, 'Được rang dưới nhiệt độ vàng, Cà phê Peak Flavor - Hương thơm đỉnh cao lưu giữ trọn vẹn hương thơm tinh tế đặc trưng của cà phê Robusta Đăk Nông và Arabica Cầu Đất. Với sự hòa trộn nhiều cung bậc giữa hương và vị sẽ mang đến cho bạn một ngày mới tràn đầy cảm hứng.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('60c62c8215234d0011ede4a0', '18', 'Cà Phê Rich Finish Gu Đậm Tinh Tế (350G)', '/images/products/60c62c8215234d0011ede4a0.png', 90000, 'Buy me store  hiểu rằng ly cà phê ngon phải đậm đà, rõ vị từ cái chạm đầu tiên đến hậu vị vương vấn. Cà phê Rich Finish mang đến những ly cà phê đậm, thơm, hương vị tinh tế giúp bạn bắt đầu ngày mới đầy năng lượng.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('60c62c8215234d0011ede4a1', '5', 'Trà sữa Oolong Nướng (Nóng)', '/images/products/60c62c8215234d0011ede4a1.png', 50000, 'Đậm đà chuẩn gu và ấm nóng - bởi lớp trà oolong nướng đậm vị hoà cùng lớp sữa thơm béo. Hương vị chân ái đúng gu đậm đà - trà oolong được sao (nướng) lâu hơn cho vị đậm đà, hoà quyện với sữa thơm ngậy. Cho từng ngụm ấm áp, lưu luyến vị trà sữa đậm đà mãi nơi cuống họng.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('60c62c8215234d0011ede4a2', '5', 'Trà sữa Oolong Nướng Trân Châu', '/images/products/60c62c8215234d0011ede4a2.png', 55000, 'Hương vị chân ái đúng gu đậm đà với trà oolong được “sao” (nướng) lâu hơn cho hương vị đậm đà, hòa quyện với sữa thơm béo mang đến cảm giác mát lạnh, lưu luyến vị trà sữa đậm đà nơi vòm họng.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('60dbe43f5775f50018c71ea8', '18', 'Thùng 24 Lon Cà Phê Sữa Đá ', '/images/products/60dbe43f5775f50018c71ea8.png', 336000, 'Với thiết kế lon cao trẻ trung, hiện đại và tiện lợi, Cà phê sữa đá lon thơm ngon đậm vị của Buy me store sẽ đồng hành cùng nhịp sống sôi nổi của tuổi trẻ và giúp bạn có được một ngày làm việc đầy hứng khởi.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('61224f81ef16be001293cccd', '18', 'Combo 3 Hộp Cà Phê Sữa Đá Hòa Tan', '/images/products/61224f81ef16be001293cccd.png', 119000, 'Thật dễ dàng để bắt đầu ngày mới với tách cà phê sữa đá sóng sánh, thơm ngon như cà phê pha phin. Vị đắng thanh của cà phê hoà quyện với vị ngọt béo của sữa, giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.\r\n        ', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('61534bde26ae260012abe218', '5', 'Trà Đào Cam Sả Chai Fresh 500ML', '/images/products/61534bde26ae260012abe218.png', 109000, 'Với phiên bản chai fresh 500ml, thức uống best seller đỉnh cao mang một diện mạo tươi mới, tiện lợi, phù hợp với bình thường mới và vẫn giữ nguyên vị thanh ngọt của đào, vị chua dịu của cam vàng nguyên vỏ và vị trà đen thơm lừng ly Trà đào cam sả nguyên bản.\r\n        *Sản phẩm dùng ngon nhất trong ngày.\r\n        *Sản phẩm mặc định mức đường và không đá.', '2021-10-29 19:31:49', '2021-10-29 19:31:49'),
('61534bde26ae260012abe219', '1', 'Cà Phê Sữa Đá Chai Fresh 250ML', '/images/products/61534bde26ae260012abe219.png', 79000, 'Vẫn là hương vị cà phê sữa đậm đà quen thuộc của Buy me store nhưng khoác lên mình một chiếc áo mới tiện lợi hơn, tiết kiệm hơn phù hợp với bình thường mới, giúp bạn tận hưởng một ngày dài trọn vẹn.\r\n        *Sản phẩm dùng ngon nhất trong ngày.\r\n        *Sản phẩm mặc định mức đường và không đá.', '2021-10-29 19:31:49', '2021-10-29 19:31:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stores`
--

CREATE TABLE `stores` (
  `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_url` varchar(4000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `open_time` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `stores`
--

INSERT INTO `stores` (`id`, `address`, `status`, `image_url`, `open_time`, `phone`, `created_at`, `updated_at`) VALUES
('117', '114 Đường 9A Khu Dân cư Trung Sơn', 'hoạt động', 'https://minio.thecoffeehouse.com/image/admin/store/5b21f8cb1acd4d02032668ea_trung_20son_201.jpeg', '7:00 - 22:00', '02871087088', '2021-10-29 20:15:23', '2021-10-29 20:15:23'),
('129', '93/5 Nguyễn Ảnh Thủ', 'hoạt động', 'https://minio.thecoffeehouse.com/image/admin/store/5b21f8cb1acd4d02032668eb_nguyen_20anh_20thu_201.jpeg', '7:00 - 22:00', '02871087088', '2021-10-29 20:15:23', '2021-10-29 20:15:23'),
('18', '141 Nguyễn Thái Bình', 'hoạt động', 'https://minio.thecoffeehouse.com/image/admin/store/5b21f8cb1acd4d02032668ee_5b21f8cb1acd4d02032668ee_nguyen_20thai_20binh_201_20.jpeg', '7:00 - 22:00', '02871087088', '2021-10-29 20:15:23', '2021-10-29 20:15:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_url` varchar(4000) COLLATE utf8mb4_vietnamese_ci,
  `address` varchar(100) COLLATE utf8mb4_vietnamese_ci,
  `ward_id` varchar(100) COLLATE utf8mb4_vietnamese_ci,
  `district_id` varchar(100) COLLATE utf8mb4_vietnamese_ci,
  `province_id` varchar(100) COLLATE utf8mb4_vietnamese_ci,
  `role` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `password`, `image_url`, `address`, `ward_id`, `district_id`, `province_id`, `role`, `created_at`, `updated_at`) VALUES
('6191e42fe4e3f', 'admin', 'admin', 'admin@gmail.com', '0924955363', '$2y$10$nneHV8Gl.awaHeCEh61Q4upQjpo7pN9UyTSPQlBO6H9RLnFLPTAEy', '', 'HCM City', '', '', '', 'admin', '2021-11-15 04:38:07', '2021-11-15 04:38:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_fk` (`user_id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD KEY `cart_fk` (`cart_id`),
  ADD KEY `product_fk` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_user_fk` (`user_id`),
  ADD KEY `feedback_product_fk` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_fk` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_product_fk` (`product_id`),
  ADD KEY `order_fk` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_fk` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedback_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `feedback_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
