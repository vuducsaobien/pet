-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 12:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_friendly` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `name_route`, `name_friendly`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'index', 'Hiển thị Dữ liệu', 'active', '2021-03-30 12:41:43', 'admin', '2021-04-19 11:37:20', 'admin'),
(2, 'status', 'Thay đổi Trạng thái', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin'),
(3, 'delete', 'Xóa Dữ liệu', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin'),
(4, 'form', 'Chỉnh sửa Dữ liệu', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin'),
(5, 'ordering', 'Sắp xếp Dữ liệu', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_at` datetime DEFAULT current_timestamp(),
  `category_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `status`, `name`, `slug`, `content`, `thumb`, `type`, `publish_at`, `category_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'active', 'Nguyên nhân khiến chó sủa nhiều không ngừng', 'nguyen-nhan-khien-cho-sua-nhieu-khong-ngung', '<p>Ch&oacute; sủa l&agrave; h&agrave;nh vi rất quen thuộc, nhưng ch&oacute; sủa nhiều v&agrave; dai dẳng l&agrave; những dấu hiệu bất thường. Tiếng sủa ở ch&oacute; l&agrave; một c&aacute;ch để ch&uacute;ng giao tiếp với chủ. Cũng tương tự như tiếng kh&oacute;c ở trẻ nhỏ. Việc t&igrave;m hiểu &yacute; nghĩa của h&agrave;nh vi n&agrave;y sẽ gi&uacute;p ch&uacute;ng ta hiểu hơn về ch&uacute; ch&oacute; của m&igrave;nh.</p>\r\n\r\n<p><em>&gt;&gt;&gt;&nbsp;<strong><a href=\"https://www.petcity.vn/phuong-phap-tri-chung-bieng-an-o-cho-phoc-soc.html\" target=\"_blank\">Phương ph&aacute;p trị chứng biếng ăn ở ch&oacute; Phốc s&oacute;c</a></strong></em></p>\r\n\r\n<p>Nhờ đ&oacute; việc chăm s&oacute;c ch&oacute; sẽ trở n&ecirc;n thuận tiện hơn. H&atilde;y c&ugrave;ng&nbsp;<strong><a href=\"https://www.petcity.vn/\" target=\"_blank\">Petcity</a></strong>&nbsp;t&igrave;m hiểu những nguy&ecirc;n nh&acirc;n phổ biến nhất trong b&agrave;i viết dưới đ&acirc;y nh&eacute;.</p>\r\n\r\n<p><strong>Ch&oacute; sủa để giao tiếp với con người</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"https://www.petcity.vn/media/news/1505_dog-1209066_960_720.jpg\" style=\"width:400px\" /></strong></p>\r\n\r\n<ul>\r\n	<li>Tiếng sủa ở ch&oacute; cũng giống như ng&ocirc;n ngữ của con người. Ch&uacute;ng d&ugrave;ng &acirc;m thanh đ&oacute; để biểu đạt cảm x&uacute;c, mong muốn v&agrave; g&acirc;y sự ch&uacute; &yacute;. Những ch&uacute; ch&oacute; c&oacute; xu hướng sủa to v&agrave; l&acirc;u hơn nếu những th&ocirc;ng điệp ch&uacute;ng gửi đi chưa được chủ nh&acirc;n tiếp nhận.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tiếng sủa dữ dội v&agrave; dai dẳng l&agrave; một lời cảnh b&aacute;o kh&ocirc;ng n&ecirc;n bỏ qua. Bản năng của ch&oacute; l&agrave; cảnh b&aacute;o chủ nh&acirc;n khi ch&uacute;ng cảm thấy kh&ocirc;ng an to&agrave;n v&agrave; bị đe dọa. Khi thấy ch&uacute; ch&oacute; sủa nhiều, h&atilde;y nghĩ đến t&igrave;nh huống xấu nhất v&agrave; t&igrave;m c&aacute;ch đề ph&ograve;ng.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Sủa cũng l&agrave; c&aacute;ch để g&acirc;y sự ch&uacute; &yacute; của chủ nh&acirc;n. Ch&oacute; sủa khi nh&igrave;n bạn, khi bạn đang ăn, hay sủa khi đứng gần cửa. Tất cả những h&agrave;nh động ấy chỉ để khiến bạn ch&uacute; &yacute;, để n&oacute;i với bạn ch&uacute;ng muốn l&agrave;m điều g&igrave; đ&oacute;.</li>\r\n</ul>\r\n\r\n<p>Việc g&acirc;y sự ch&uacute; &yacute; thường bắt đầu bằng việc ch&uacute;ng cố gắng dụi đầu, l&ocirc;i k&eacute;o, đụng chạm v&agrave;o bạn. Sau đ&oacute; l&agrave; r&ecirc;n rỉ v&agrave; cuối c&ugrave;ng l&agrave; sủa dữ dội.</p>\r\n\r\n<p><strong>Ch&oacute; sủa nhiều để thể hiện cảm x&uacute;c</strong></p>\r\n\r\n<ul>\r\n	<li>Đ&ocirc;i khi, ch&oacute; sủa khi ch&uacute;ng cảm thấy sợ h&atilde;i. L&uacute;c n&agrave;y ch&uacute;ng thường sủa to v&agrave; lặp lại kh&ocirc;ng ngừng. &Yacute; nghĩa của tiếng sủa vừa l&agrave; lời cảnh c&aacute;o, vừa để k&ecirc;u gọi sự gi&uacute;p đỡ. Những cử chỉ vuốt ve từ chủ nh&acirc;n c&oacute; thể l&agrave;m ch&uacute; ch&oacute; bớt sợ h&atilde;i hơn. Nhưng h&atilde;y cẩn thận nếu ch&uacute; ch&oacute; tỏ ra hung dữ.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Ngược lại, ch&oacute; cũng sủa nhiều nếu ch&uacute;ng vui mừng. Tiếng sủa được coi như sự ch&agrave;o đ&oacute;n khi chủ nh&acirc;n đi xa trở về nh&agrave;. &Acirc;m thanh kết hợp động t&aacute;c vẫy đu&ocirc;i chứng tỏ ch&uacute; ch&oacute; của bạn đang v&ocirc; c&ugrave;ng phấn kh&iacute;ch.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Sủa cũng l&agrave; một c&aacute;ch thể hiện sự buồn ch&aacute;n ở ch&oacute;. Những ch&uacute; ch&oacute; hiếu động cần được ra ngo&agrave;i chơi đ&ugrave;a để giải ph&oacute;ng năng lượng. Ch&uacute;ng kh&ocirc;ng th&iacute;ch ở trong nh&agrave; cả ng&agrave;y, v&agrave; để phản ứng lại ch&oacute; sẽ sủa li&ecirc;n tục. Một số con sẽ liếm, cắn hoặc c&agrave;o mọi thứ để đỡ buồn ch&aacute;n hơn.</li>\r\n</ul>\r\n\r\n<p>Một nguy&ecirc;n nh&acirc;n kh&aacute;c của việc ch&oacute; sủa nhiều l&agrave; do tiếng ồn qu&aacute; lớn. Đ&acirc;y l&agrave; bản năng tự nhi&ecirc;n của ch&oacute; từ khi c&ograve;n l&agrave; động vật hoang d&atilde;. V&iacute; dụ như ch&oacute; sủa để đ&aacute;p lại những con ch&oacute; kh&aacute;c. Hoặc h&uacute; l&ecirc;n theo tiếng gọi bầy đ&agrave;n của m&igrave;nh.</p>\r\n\r\n<p><strong>Ch&oacute; sủa để bảo vệ những g&igrave; thuộc về ch&uacute;ng</strong></p>\r\n\r\n<ul>\r\n	<li>Tổ ti&ecirc;n của ch&oacute; nh&agrave; l&agrave; động vật sống bầy đ&agrave;n. Do đ&oacute; bản năng của ch&uacute;ng l&agrave; canh giữ tất cả th&agrave;nh vi&ecirc;n trong đ&agrave;n của ch&uacute;ng. Bao gồm những th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh bạn, th&uacute; cưng kh&aacute;c v&agrave; cả chủ nh&acirc;n của ch&uacute;ng.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Ch&oacute; c&oacute; thể sủa để bảo vệ đồ chơi, giường ngủ, đồ đạc hoặc bất k&igrave; thứ g&igrave; ch&uacute;ng cho l&agrave; quan trọng. Nhờ đặc t&iacute;nh n&agrave;y, lo&agrave;i ch&oacute; đ&atilde; được con người sử dụng để canh g&aacute;c t&agrave;i sản v&agrave; bảo vệ chủ nh&acirc;n. Trong đ&oacute; c&oacute; nhiều giống ch&oacute; được chọn lọc để gia tăng khả năng bảo vệ của ch&uacute;ng.</li>\r\n</ul>\r\n\r\n<p>Tiếng sủa cũng thể hiện sự lo lắng, chia ly, kh&ocirc;ng được gần chủ. Một ch&uacute; ch&oacute; khi bị nhốt trong chuồng, hoặc bị bỏ rơi sẽ r&ecirc;n rỉ hoặc ng&aacute;p. Ch&uacute;ng sẽ sủa khi cảm thấy thật sự hoang mang, lo lắng. H&agrave;nh vi n&agrave;y cũng thường thấy ở những ch&uacute; ch&oacute; con mới t&aacute;ch đ&agrave;n.</p>\r\n\r\n<p><strong>Ch&oacute; c&oacute; thể sủa nếu bị bệnh hoặc bị đau</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"https://www.petcity.vn/media/news/1505_tai-sao-cho-lai-sua-nhieu-1.jpg\" style=\"width:400px\" /></strong></p>\r\n\r\n<ul>\r\n	<li>Phản ứng thường thấy l&agrave; r&ecirc;n rỉ, th&uacute;t th&iacute;t hoặc gầm gừ nếu ch&uacute;ng cảm thấy kh&ocirc;ng khỏe. Nặng hơn l&agrave; sủa nếu ch&uacute;ng qu&aacute; đau đớn. Những con ch&oacute; bị thương c&oacute; thể trở n&ecirc;n kh&aacute; nguy hiểm. Ch&uacute;ng cần được điều trị bởi những người c&oacute; kinh nghiệm.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nếu ch&oacute; bắt đầu sủa nhiều v&agrave; k&egrave;m theo một số triệu chứng bất thường, bạn n&ecirc;n ch&uacute; &yacute; theo d&otilde;i. Kh&ocirc;ng n&ecirc;n bỏ qua bởi đ&acirc;y c&oacute; thể l&agrave; dấu hiệu bệnh l&yacute; nguy hiểm.</li>\r\n</ul>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những nguy&ecirc;n nh&acirc;n c&oacute; thể khiến ch&oacute; sủa. Hi vọng c&aacute;c bạn đ&atilde; c&oacute; th&ecirc;m nhiều kinh nghiệm bổ &iacute;ch để chăm s&oacute;c tốt cho ch&uacute; ch&oacute; của m&igrave;nh.</p>', '/images/article/blog-2.jpg', NULL, NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:54:38', 'admin'),
(2, 'active', 'Cho chim Họa Mi ăn gì cho đủ chất trong thời kì thay lông', 'cho-chim-hoa-mi-an-gi-cho-du-chat-trong-thoi-ki-thay-long', '<p>Chim Họa Mi c&oacute; tiếng h&oacute;t l&iacute;u lo l&agrave;m say đắm l&ograve;ng người. Ch&uacute;ng được nu&ocirc;i như th&uacute; cảnh ở trong gia đ&igrave;nh. Hiện nay, phong tr&agrave;o nu&ocirc;i chim Họa Mi đ&atilde; ph&aacute;t triển rộng khắp cả nước. Tuy vậy, kh&ocirc;ng phải người nu&ocirc;i chim n&agrave;o cũng biết c&aacute;ch nu&ocirc;i chim Họa Mi đ&uacute;ng c&aacute;ch. Đặc biệt trong việc lựa chọn thức ăn cho chim. Vậy cho chim Họa Mi ăn g&igrave; mới l&agrave; tốt nhất? H&atilde;y c&ugrave;ng theo d&otilde;i b&agrave;i viết dưới đ&acirc;y của&nbsp;<strong><a href=\"https://www.petcity.vn/\" target=\"_blank\">Petcity.</a></strong></p>\r\n\r\n<p><strong>Cung cấp nước uống cho chim Họa Mi</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"https://www.petcity.vn/media/news/1605_tixung1.jpg\" style=\"width:400px\" /></strong></p>\r\n\r\n<p>Kh&ocirc;ng cần phải n&oacute;i, về cơ bản tất cả c&aacute;c lo&agrave;i sinh vật đều kh&ocirc;ng thể xa rời nước. Nếu như con người kh&ocirc;ng ăn thức ăn chỉ uống nướ th&igrave; gần như c&oacute; thể sống được 15 ng&agrave;y trở l&ecirc;n. Tuy nhi&ecirc;n, nếu kh&ocirc;ng uống nước mấy ng&agrave;y liền th&igrave; sẽ chết. Lo&agrave;i chim cũng giống như vậy. Nếu như kh&ocirc;ng ngừng uống nước, th&igrave; cho d&ugrave; kh&ocirc;ng c&oacute; thức ăn, cũng c&oacute; thể trụ được 5, 6 ng&agrave;y. Nhưng 2 ng&agrave;y kh&ocirc;ng uống nước th&igrave; sẽ chết.</p>\r\n\r\n<p>Loại nước uống tốt nhất cho chim Họa Mi ch&iacute;nh l&agrave; nước suối hoặc nước giếng. Nếu d&ugrave;ng nước m&aacute;y th&igrave; tốt nhất n&ecirc;n phơi nắng to một thời gian để loại bỏ kh&iacute; Clo. Sau đ&oacute; mới lấy cho chim uống. Nếu như trong nước c&oacute; chứa bột tẩy trắng th&igrave; kh&ocirc;ng n&ecirc;n cho chim sử dụng l&agrave;m nước uống. Bắt buộc phải t&igrave;m kiếm một nguồn nước kh&aacute;c cho chim Họa Mi. Khi chim rụng l&ocirc;ng hoặc khi l&ocirc;ng chưa mọc đủ, th&igrave; c&aacute;ch ng&agrave;y cho ch&uacute;ng một &iacute;t nước kho&aacute;ng. Điều n&agrave;y c&oacute; lợi lớn đối với nhu cầu cơ thể của ch&uacute;ng.</p>\r\n\r\n<p><strong>Cho Họa Mi ăn C&ocirc;n tr&ugrave;ng</strong></p>\r\n\r\n<p>Nếu bạn chứ biết cho chim Họa Mi ăn g&igrave; th&igrave; đ&acirc;y ch&iacute;nh l&agrave; 1 gợi &yacute; d&agrave;nh cho bạn. Loại thức ăn m&agrave; Họa Mi th&iacute;ch nhất ch&iacute;nh l&agrave; thức ăn sống. Tất cả những động vật nhỏ thuộc loại c&ocirc;n tr&ugrave;ng ch&uacute;ng đều th&iacute;ch ăn. Mỗi ng&agrave;y mỗi ch&uacute; chim ăn khoảng 25 &ndash; 30 con l&agrave; đủ. Nếu cho nhiều qu&aacute; sẽ l&atilde;ng ph&iacute;.</p>\r\n\r\n<p>Đến m&ugrave;a đ&ocirc;ng, c&ocirc;n tr&ugrave;ng đ&atilde; ngủ đ&ocirc;ng. Việc t&igrave;m kiếm thức ăn sẽ kh&oacute; khăn. L&uacute;c n&agrave;y n&ecirc;n cho chim Họa Mi ăn g&igrave;? Bạn c&oacute; thể thay thế bằng thịt b&ograve; hoặc thịt c&aacute; nước ngọt, thịt cua&hellip; Tốt nhất n&ecirc;n d&ugrave;ng thịt thăn b&ograve;, lược bỏ phần m&agrave;ng mỡ trước. Sau đ&oacute; d&ugrave;ng nước rửa sạch, cắt miếng mỏng, phơi nắng hong gi&oacute; cho kh&ocirc; rồi mới băm nhỏ. Trộn với hạt k&ecirc; v&agrave; l&ograve;ng đỏ trứng đ&atilde; luộc ch&iacute;n cho ch&uacute;ng nhặt ăn</p>\r\n\r\n<p>Th&ecirc;m nữa mỗi khi đến cuối thu, chim Họa Mi đều buộc phải thay l&ocirc;ng một lần. L&uacute;c n&agrave;y t&igrave;nh trạng cơ thể yếu k&eacute;m nhất. N&ecirc;n d&ugrave;ng &oacute;c lợn trộn với gạo lứt rồi cho ăn. C&aacute;ch chế biến rất đơn giản. Gạo lứt rửa sạch để r&aacute;o, sau đ&oacute; cho &oacute;c lợn sống v&agrave;o trộn. Sau khi trộn đều th&igrave; phơi nắng đến khi kh&ocirc; rồi cho ăn. Chim trống v&agrave; chim m&aacute;i qua từng gia đoạn dinh dưỡng cũng c&oacute; ch&uacute;t kh&aacute;c nhau.</p>\r\n\r\n<p><strong>C&oacute; thể cho chim Họa Mi ăn g&igrave; kh&aacute;c kh&ocirc;ng?</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/1605_mon-chim-hoa-mi-nuong-14_1471451202.jpg\" style=\"width:400px\" /></p>\r\n\r\n<p>Ngo&agrave;i c&ocirc;n tr&ugrave;ng, c&oacute; thể cho Họa Mi ăn ngũ cốc. Bất cứ loại ngũ cốc n&agrave;o th&igrave; cũng đều l&agrave; thức ăn kho&aacute;i khẩu của chim Họa Mi. Đặc biệt l&agrave; hạt k&ecirc;. C&oacute; 2 c&aacute;ch chế biến, một l&agrave; phơi kh&ocirc; dưới nắng, hai l&agrave; sấy bằng lửa nhỏ liu riu.</p>\r\n\r\n<p>Bất luận l&agrave; gạo hay k&ecirc; cũng phải d&ugrave;ng nước sạch trong suốt để đ&atilde;i. Sau đ&oacute; phơi kh&ocirc; rồi trộn với l&ograve;ng đỏ trứng. Chủ nu&ocirc;i n&ecirc;n l&agrave;m v&agrave; phơi v&agrave;o m&ugrave;a h&egrave; thu. M&ugrave;a đ&ocirc;ng v&agrave; xu&acirc;n c&oacute; thể d&ugrave;ng c&aacute;ch sấy bằng lửa nhỏ. Bởi hạt k&ecirc; phơi kh&ocirc;ng kh&ocirc; khiến cho t&iacute;nh chim &ocirc;n h&ograve;a, dễ rụng l&ocirc;ng, mất đi vẻ đẹp vốn c&oacute; của n&oacute;.</p>\r\n\r\n<p>M&ugrave;a đ&ocirc;ng xu&acirc;n n&ecirc;n cho ăn bằng hạt k&ecirc; sấy để th&uacute;c đẩy hoạt t&iacute;nh của ch&uacute;ng. Nhưng khi sấy k&ecirc;, phải tr&aacute;nh d&ugrave;ng xoong nồi v&agrave; dụng cụ c&oacute; d&iacute;nh dầu mỡ. Chim Họa Mi kị nhất dầu mỡ. V&igrave; vậy khi sấy n&ecirc;n rửa sạch dụng cụ trước.</p>\r\n\r\n<p>K&ecirc; phơi nắng hoặc l&agrave; sấy kh&ocirc; đều phải d&ugrave;ng hũ để dự trữ. Tr&aacute;nh bị ẩm sinh ra nấm mốc. Thức ăn hỏng rồi th&igrave; sẽ kh&ocirc;ng c&ograve;n chất dinh dưỡng nữa. Nếu như c&oacute; thời gian th&igrave; tốt nhất l&agrave; một tuần l&agrave;m một lần. Mỗi lần d&ugrave;ng 400g k&ecirc;, 2 l&ograve;ng đỏ trứng. Để giữ được sự tươi ngon, chim sẽ ăn được nhiều hơn. Đối với thực phẩm phụ kh&aacute;c cũng c&oacute; thể l&agrave;m như vậy.</p>\r\n\r\n<p>Hiện tại Petcity đang c&oacute; những sản phẩm l&agrave;m cho chim lu&ocirc;n khỏe mạnh, ph&acirc;n xạ nhanh, h&oacute;t nhi&ecirc;u, l&ocirc;ng mượt, ngoại h&igrave;nh đẹp, ph&ograve;ng v&agrave; ngăn ngừa c&aacute;c loại bệnh của chim, tăng cường miễn dịch m&agrave; bạn c&oacute; thể tham khảo:</p>\r\n\r\n<ul>\r\n	<li><strong><a href=\"https://www.petcity.vn/cam-vuong-viet-anh-hop-cao-cap-danh-cho-chim-mi-khuou.html\" target=\"_blank\">C&aacute;m chim Vương Việt Anh hộp cao cấp d&agrave;nh cho Chim Mi + Khướu</a></strong></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong><a href=\"https://www.petcity.vn/cam-vuong-viet-anh-hop-cao-cap-danh-cho-chim-choe-lua-choe-than.html\" target=\"_blank\">C&aacute;m chim Vương Việt Anh hộp cao cấp d&agrave;nh cho Chim Ch&ograve;e lửa, Ch&ograve;e than</a></strong></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong><a href=\"https://www.petcity.vn/cam-vuong-viet-anh-hop-cao-cap-danh-cho-chim-chao-mao.html\" target=\"_blank\">C&aacute;m chim Vương Việt Anh hộp cao cấp d&agrave;nh cho Chim Ch&agrave;o M&agrave;o</a></strong></li>\r\n</ul>', '/images/article/blog-9.jpg', NULL, NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:54:03', 'admin'),
(3, 'active', 'Sợ hãi ảnh hưởng đến tâm lý loài chó như thế nào?', 'so-hai-anh-huong-den-tam-ly-loai-cho-nhu-the-nao', '<p>Theo nhiều nghi&ecirc;n cứu, t&acirc;m l&yacute; lo&agrave;i ch&oacute; cũng rất phức tạp v&agrave; rắc rối. Ch&uacute;ng cũng c&oacute; c&aacute; t&iacute;nh, th&oacute;i quen kh&aacute;c nhau. Ch&oacute; th&iacute;ch ăn uống, chơi đ&ugrave;a, th&iacute;ch đi dạo với chủ nh&acirc;n&hellip; Ngược lại ch&oacute; cũng c&oacute; t&acirc;m trạng sợ h&atilde;i, lo lắng.</p>\r\n\r\n<p><em>&gt;&gt;&gt;<strong><a href=\"https://www.petcity.vn/can-chuan-bi-nhung-gi-khi-mang-thu-cung-len-may-bay.html\" target=\"_blank\">&nbsp;Cần chuẩn bị những g&igrave; khi mang th&uacute; cưng l&ecirc;n m&aacute;y bay?</a></strong></em></p>\r\n\r\n<p>Vậy ch&oacute; sợ g&igrave; nhất? V&agrave; ảnh hưởng đối với t&acirc;m l&iacute; của lo&agrave;i ch&oacute; như thế n&agrave;o? H&atilde;y c&ugrave;ng&nbsp;<strong><a href=\"https://www.petcity.vn/\" target=\"_blank\">Petcity</a></strong>&nbsp;t&igrave;m hiểu qua b&agrave;i viết dưới đ&acirc;y.</p>\r\n\r\n<p><strong>&Acirc;m thanh lớn ảnh hưởng đến t&acirc;m l&yacute; lo&agrave;i ch&oacute;</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"https://www.petcity.vn/media/news/2005_73c05fec700440469d33a2d83f784797.jpg\" style=\"width:350px\" /></strong></p>\r\n\r\n<ul>\r\n	<li>Theo quan s&aacute;t của nhiều b&aacute;c sĩ th&uacute; y, ch&oacute; sợ &acirc;m thanh lớn. Hoặc kh&oacute;i lửa, &aacute;nh s&aacute;ng v&agrave; những chuyển động đột ngột. Biểu hiện r&otilde; nhất ở những con chưa trải qua huấn luyện. Ch&uacute;ng c&oacute; sự sợ h&atilde;i r&otilde; r&agrave;ng với những tiếng động lớn.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nhưng &acirc;m thanh như tiếng m&aacute;y bay, tiếng ph&aacute;o nổ v&agrave; c&aacute;c &acirc;m thanh tương tự đều khiến ch&oacute; sợ h&atilde;i. Đầu ti&ecirc;n ch&uacute;ng sẽ hướng về ph&iacute;a &acirc;m thanh. Sau đ&oacute; chạy đến nơi ch&uacute;ng cho l&agrave; nơi an to&agrave;n. Như gầm giường hoặc trong ph&ograve;ng. Hoặc ở cạnh chủ</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>L&uacute;c n&agrave;y ch&oacute; thường rụt cổ, cụp tai lại. Chỉ khi &acirc;m thanh đ&oacute; dừng lại, ch&uacute;ng mới trở lại như b&igrave;nh thường. H&agrave;nh vi n&agrave;y l&agrave; bản năng tự nhi&ecirc;n, phản &aacute;nh t&acirc;m l&yacute; lo&agrave;i ch&oacute;. Xuất ph&aacute;t từ đời sống hoang d&atilde; của ch&uacute;ng.</li>\r\n</ul>\r\n\r\n<p>Khi ch&oacute; trở th&agrave;nh vật nu&ocirc;i, ch&uacute;ng tiếp x&uacute;c với nhiều thứ mới lạ hơn. Do đ&oacute; nhiều con sẽ sản sinh nỗi sợ h&atilde;i với một v&agrave;i sự vật. Hoặc một v&agrave;i vật dụng của con người trong cuộc sống. V&iacute; dụ như ch&oacute; sợ &ocirc; t&ocirc;, sợ đồ chơi biết chuyển động&hellip;</p>\r\n\r\n<p><strong>Sợ h&atilde;i kết bạn với những con ch&oacute; kh&aacute;c</strong></p>\r\n\r\n<ul>\r\n	<li>Đ&acirc;y cũng l&agrave; một vấn đề t&acirc;m l&yacute; lo&agrave;i ch&oacute; cần lưu t&acirc;m. Rất nhiều bạn thắc mắc với Petciy tại sao ch&oacute; nh&agrave; m&igrave;nh kh&ocirc;ng muốn chơi với đồng loại. Thậm ch&iacute; c&ograve;n căng thẳng, kh&ocirc;ng y&ecirc;n, sợ h&atilde;i run cầm cập, trốn hoặc bỏ chạy. Mỗi khi những con ch&oacute; kh&aacute;c tiếp cận ch&uacute;ng.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nhiều con c&ograve;n c&oacute; h&agrave;nh vi c&oacute; t&iacute;nh c&ocirc;ng k&iacute;ch. Vấn đề n&agrave;y g&acirc;y nhiều phiền phức cho người nu&ocirc;i. G&acirc;y bất h&ograve;a với h&agrave;ng x&oacute;m v&agrave; bạn b&egrave; người quen. Việc tham gia c&aacute;c hội ch&oacute; offline lại c&agrave;ng kh&ocirc;ng thể. Nhất l&agrave; với c&aacute;c giống ch&oacute; cảnh cỡ lớn.</li>\r\n</ul>\r\n\r\n<p>Ngo&agrave;i ra, c&oacute; những con sợ đến bệnh viện, tiệm spa hoặc c&ocirc;ng vi&ecirc;n&hellip; Ch&uacute;ng kh&ocirc;ng hiểu r&otilde; những chỗ n&agrave;y. Thậm ch&iacute; nếu đi qua những nơi kh&ocirc;ng quen thuộc, ch&uacute;ng thường d&ugrave;ng chạy trốn để giải quyết vấn đề n&agrave;y.</p>\r\n\r\n<p><strong>Sợ h&atilde;i gặp người lạ</strong></p>\r\n\r\n<ul>\r\n	<li>Theo c&aacute;c chuy&ecirc;n gia nghi&ecirc;n cứu t&acirc;m l&yacute; lo&agrave;i ch&oacute;, ch&uacute;ng l&agrave; động vật c&oacute; t&iacute;nh x&atilde; hội cao. Những ch&uacute; ch&oacute; cần c&oacute; sự giao lưu với x&atilde; hội ngay từ nhỏ. Đặc biệt l&agrave; khi ch&oacute; được tr&ecirc;n 3 th&aacute;ng tuổi. Chủ nu&ocirc;i cần tiến h&agrave;nh huấn luyện kỹ năng giao lưu với n&oacute;.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Bởi v&igrave; sau 3 th&aacute;ng, ch&oacute; bắt đầu ph&aacute;t triển mạnh. Tr&ecirc;n nhiều phương diện như sinh l&yacute;, t&acirc;m l&yacute;, tr&iacute; lực&hellip; Nếu trong giai đoạn n&agrave;y bạn nhốt ch&uacute;ng trong nh&agrave;, kh&ocirc;ng cho ch&uacute;ng cơ hội tiếp x&uacute;c với thế giới b&ecirc;n ngo&agrave;i, hoặc giảm sự giao lưu tiếp x&uacute;c với con người v&agrave; đồng loại kh&aacute;c.</li>\r\n</ul>\r\n\r\n<p>Vậy th&igrave; khi ch&oacute; trưởng th&agrave;nh, ch&uacute;ng sẽ thiếu đi kỹ năng x&atilde; hội. Trở n&ecirc;n c&ocirc; độc, nh&aacute;t gan v&agrave; kh&ocirc;ng h&ograve;a đồng. Thậm ch&iacute; sợ đến mức ph&aacute;t đi&ecirc;n, k&ecirc;u loạn. Kh&ocirc;ng c&oacute; c&aacute;ch n&agrave;o khống chế. T&igrave;nh trạng n&agrave;y phổ biến ở c&aacute;c giống ch&oacute; nhỏ. Như ch&oacute; Chihuahua, Phốc, Pug&hellip;</p>\r\n\r\n<p><strong>Giải quyết vấn đề t&acirc;m l&yacute; lo&agrave;i ch&oacute;</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"https://www.petcity.vn/media/news/2005_bai-viet-dang-suy-ngam-ve-nhung-dua-tre-khong-he-so-cho.jpg\" style=\"width:400px\" /></strong></p>\r\n\r\n<ul>\r\n	<li>Rất nhiều con ch&oacute; nh&aacute;t gan từ nhỏ. Th&ocirc;ng thường l&agrave; do &iacute;t tiếp x&uacute;c với thế giới b&ecirc;n ngo&agrave;i. N&ecirc;n thường sợ h&atilde;i những sự vật kh&ocirc;ng quen thuộc. Th&ecirc;m v&agrave;o đ&oacute; l&agrave; sự chỉ dẫn sai lầm của chủ nh&acirc;n. Dẫn đến nỗi sự h&atilde;i c&agrave;ng m&atilde;nh liệt hơn. G&acirc;y &aacute;m ảnh với t&acirc;m l&yacute; lo&agrave;i ch&oacute;.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Biện ph&aacute;p tốt nhất l&agrave; cho ch&oacute; tiếp x&uacute;c nhiều hơn với thế giới b&ecirc;n ngo&agrave;i. Khiến ch&uacute;ng biết xung quang kh&ocirc;ng c&oacute; g&igrave; nguy hiểm. N&ecirc;n cho ch&oacute; tiếp x&uacute;c với nhiều ho&agrave;n cảnh. Cho ch&uacute;ng nghe nhiều &acirc;m thanh kh&aacute;c nhau.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Khi chơi đ&ugrave;a, ch&uacute;ng chạy nhảy tự do, vui vẻ, hưởng thụ niềm vui khi kết bạn. Hơn nữa c&oacute; thể r&egrave;n luyện cơ thể. Th&uacute;c đẩy sự ph&aacute;t triển, c&oacute; t&aacute;c dụng bảo vệ sức khỏe. Thời gian học tốt nhất của ch&oacute; l&agrave; từ 3 đến 6 th&aacute;ng tuổi.</li>\r\n</ul>\r\n\r\n<p>Nếu bỏ lỡ mất giai đoạn n&agrave;y, ch&oacute; rất kh&oacute; sống chung với con người v&agrave; đồng loại. T&iacute;nh c&aacute;ch sẽ trở n&ecirc;n nh&aacute;t gan v&agrave; mẫn cảm. Nh&igrave;n thấy ch&oacute; hoặc người lạ sẽ k&ecirc;u kh&ocirc;ng ngừng. Tất dễ bị bệnh trầm cảm, sợ x&atilde; hội.</p>', '/images/article/blog-6.jpg', NULL, NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:53:27', 'admin'),
(4, 'active', 'Chim Vành Khuyên khi nuôi cần quan tâm nhất điều gì?', 'chim-vanh-khuyen-khi-nuoi-can-quan-tam-nhat-dieu-gi', '<p>Chim V&agrave;nh Khuy&ecirc;n l&agrave; một lo&agrave;i chim cảnh ăn c&ocirc;n tr&ugrave;ng nhỏ, rất dễ nu&ocirc;i. Ch&uacute;ng th&iacute;ch sạch sẽ v&agrave; tắm nước&hellip; Ch&uacute;ng được những người chơi chim v&ocirc; c&ugrave;ng y&ecirc;u th&iacute;ch. Th&iacute;ch hợp ngay với cả những người mới tập chơi. Tuy việc chăm s&oacute;c V&agrave;nh Khuy&ecirc;n kh&ocirc;ng qu&aacute; phức tạp nhưng cũng cần đầu tư thời gian tỉ mỉ. B&agrave;i viết dưới đ&acirc;y,&nbsp;<strong><a href=\"https://www.petcity.vn/\" target=\"_blank\">Petcity&nbsp;</a></strong>sẽ cung cấp cho bạn đọc những th&ocirc;ng tin cơ bản nhất để c&oacute; thể chăm s&oacute;c chim V&agrave;nh Khuy&ecirc;n tốt nhất.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/2905_ChimVnhKhuyn.jpg\" style=\"width:400px\" /></p>\r\n\r\n<p><em>&gt;&gt;&gt;&nbsp;<strong><a href=\"https://www.petcity.vn/thu-cung-duoc-di-hoc-mau-giao-ngay-6-tiet-co-so-lien-lac-va-kiem-tra-bai-cu.html\" target=\"_blank\">Th&uacute; cưng được đi học mẫu gi&aacute;o: Ng&agrave;y 6 tiết, c&oacute; sổ li&ecirc;n lạc v&agrave; kiểm tra b&agrave;i cũ</a></strong></em></p>\r\n\r\n<p><strong>Lồng nu&ocirc;i chim</strong></p>\r\n\r\n<p>Chim V&agrave;nh Khuy&ecirc;n l&agrave; một lo&agrave;i chim nhỏ. Lồng của ch&uacute;ng cũng c&oacute; k&iacute;ch thước nhỏ. Người nu&ocirc;i n&ecirc;n chọn loại lồng nan d&agrave;y, đ&aacute;y lồng c&oacute; thể th&aacute;o rời. Lồng cần được trang bị một cầu đậu cho chim c&oacute; bề mặt tương đối th&ocirc;. K&egrave;m theo một c&oacute;ng ăn v&agrave; c&oacute;ng uống. Đ&acirc;y l&agrave; thứ bắt buộc phải c&oacute; trong lồng.</p>\r\n\r\n<p><strong>Thức ăn cho chim V&agrave;nh Khuy&ecirc;n</strong></p>\r\n\r\n<ul>\r\n	<li>Thức ăn cho chim V&agrave;nh Khuy&ecirc;n chủ yếu l&agrave; c&aacute;m chim hỗn hợp. Th&ocirc;ng thường, một con chim ăn 2,5g &ndash; 3,5g c&aacute;m chim hỗn hợp. Cần 5ml- 6ml nước v&agrave; ăn 8g &ndash; 10g tr&aacute;i c&acirc;y mỗi ng&agrave;y. Nhưng h&atilde;y cẩn thận kh&ocirc;ng để n&oacute; ăn dưa hấu v&agrave;o m&ugrave;a h&egrave;. Đồng thời, n&oacute; cũng c&oacute; thể được ăn c&ugrave;ng với một số loại tr&aacute;i c&acirc;y chuối, t&aacute;o, rau xanh, dưa chuột, c&ocirc;n tr&ugrave;ng v&agrave; c&aacute;c thực phẩm bổ sung kh&aacute;c.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>M&ugrave;a h&egrave; c&oacute; thể trộn th&ecirc;m bột đậu xanh rang ch&iacute;n v&agrave;o thức ăn cho chim. Loại thực phẩm n&agrave;y c&oacute; t&aacute;c dụng ph&ograve;ng ngừa cảm nắng. Nếu bạn muốn thay đổi khẩu vị bạn c&oacute; thể cho n&oacute; ăn một số c&ocirc;n tr&ugrave;ng, nhưng c&ocirc;n tr&ugrave;ng phải khỏe mạnh. Đừng để chim ăn c&ocirc;n tr&ugrave;ng c&oacute; thuốc trừ s&acirc;u để tr&aacute;nh ngộ độc thực phẩm. Khi cho ăn s&acirc;u bướm cần nấu rồi mới cho ăn. Loại s&acirc;u bột c&oacute; thể được cho ăn trực tiếp, nhưng kh&ocirc;ng qu&aacute; nhiều. Th&ocirc;ng thường 2 lần/ng&agrave;y. Mỗi lần 1 &ndash; 2 con l&agrave; đủ.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tỷ lệ thức ăn thường l&agrave; bột đậu n&agrave;nh so với l&ograve;ng đỏ trứng l&agrave; 7: 3. Khi chim V&agrave;nh Khuy&ecirc;n thay l&ocirc;ng th&igrave; lượng thức ăn sẽ thay đổi. Bạn cần th&ecirc;m 500g bột đậu n&agrave;nh, 20 l&ograve;ng đỏ trứng v&agrave; một lượng nhỏ t&ocirc;m, thịt nạc, rang hoặc hấp ch&iacute;n. V&agrave;o m&ugrave;a đ&ocirc;ng, bạn c&oacute; thể bổ sung v&agrave;o c&aacute;c bữa ăn những thứ như như đậu phộng, quả &oacute;c ch&oacute; v&agrave; bột ng&ocirc;, bột đậu n&agrave;nh. Ch&uacute;ng th&iacute;ch ăn đồ ngọt. Trong l&uacute;c cho ăn, bạn c&oacute; thể th&ecirc;m một &iacute;t đường v&agrave; mật ong.</li>\r\n</ul>\r\n\r\n<p><strong>Vệ sinh v&agrave; tắm cho chim V&agrave;nh Khuy&ecirc;n</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/2905_vanh_khuyen_cach_chon.jpg\" style=\"width:400px\" /></p>\r\n\r\n<ul>\r\n	<li>Lo&agrave;i chim n&agrave;y rất th&iacute;ch sạch sẽ v&agrave; th&iacute;ch tắm nước, ngay cả ở trời lạnh. C&aacute;ch tắm rất đơn giản, chỉ cần đặt lồng chim v&agrave;o trong bồn nước. Khi ch&uacute;ng kh&ocirc;ng tắm rửa nữa th&igrave; l&uacute;c đ&oacute; đ&atilde; kết th&uacute;c việc tắm của ch&uacute;ng. Sau khi tắm xong, mang ch&uacute;ng ra nắng v&agrave; tắm nắng, l&agrave;m kh&ocirc; l&ocirc;ng c&agrave;ng sớm c&agrave;ng tốt để tr&aacute;nh bị cảm lạnh. Để giữ cho m&ocirc;i trường sống của chim sạch sẽ v&agrave; gọn g&agrave;ng, dụng cụ ăn của chim n&ecirc;n được l&agrave;m sạch mỗi ng&agrave;y một lần. Dọn dẹp đ&aacute;y lồng 1 &ndash; 2 tuần 1 lần.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Ba th&aacute;ng th&aacute;ng 7, th&aacute;ng 8 v&agrave; th&aacute;ng 9 l&agrave; thời kỳ thay đổi l&ocirc;ng của chim V&agrave;nh Khuy&ecirc;n nhỏ. Thay l&ocirc;ng gi&uacute;p ch&uacute;ng đẹp hơn rất nhiều. Trong thời gian n&agrave;y, bạn n&ecirc;n tăng dinh dưỡng v&agrave; giữ ấm cho ch&uacute;ng. Giữ ch&uacute;ng trong một m&ocirc;i trường y&ecirc;n tĩnh v&agrave; ngăn chặn n&oacute; khỏi bị l&agrave;m phiền.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Việc cho chim đi dạo ngo&agrave;i trời cần ch&uacute; &yacute; thời tiết. Ng&agrave;y trời đẹp, c&oacute; nắng, kh&ocirc;ng kh&iacute; m&aacute;t mẻ ch&iacute;nh l&agrave; thời điểm tốt để đi dạo. Nếu trời nhiều m&acirc;y, c&oacute; sương m&ugrave; kh&ocirc;ng n&ecirc;n ra ngo&agrave;i. Việc n&agrave;y cũng gi&uacute;p gắn b&oacute; t&igrave;nh cảm giữa bạn v&agrave; chim.</li>\r\n</ul>\r\n\r\n<p>Nếu bạn đang nu&ocirc;i chim ở khu vực miền Bắc, bạn n&ecirc;n ch&uacute; &yacute; đến vấn đề giữ ấm cho chim v&agrave;o m&ugrave;a lạnh. N&ecirc;n treo lồng ở nơi c&oacute; &aacute;nh nắng, nhiệt độ được giữ ở mức 15&deg;C &ndash; 20&deg;C.</p>\r\n\r\n<p>Một số sản phẩm thức ăn cho chim nổi nật tại Petcity:&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><strong><a href=\"https://www.petcity.vn/cam-vuong-viet-anh-hop-cao-cap-danh-cho-chim-mi-khuou.html\" target=\"_blank\">C&aacute;m chim Vương Việt Anh hộp cao cấp d&agrave;nh cho Chim Mi + Khướu</a></strong></em></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><em><strong><a href=\"https://www.petcity.vn/cam-vuong-viet-anh-hop-cao-cap-danh-cho-chim-choe-lua-choe-than.html\" target=\"_blank\">C&aacute;m chim Vương Việt Anh hộp cao cấp d&agrave;nh cho Chim Ch&ograve;e lửa, Ch&ograve;e than</a></strong></em></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><em><strong><a href=\"https://www.petcity.vn/cam-vuong-viet-anh-hop-cao-cap-danh-cho-chim-chao-mao.html\" target=\"_blank\">C&aacute;m chim Vương Việt Anh hộp cao cấp d&agrave;nh cho Chim Ch&agrave;o M&agrave;o</a></strong></em></li>\r\n</ul>', '/images/article/blog-8.jpg', NULL, NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:52:51', 'admin'),
(5, 'active', 'Cách vắt tuyến hôi ở chó', 'cach-vat-tuyen-hoi-o-cho', '<p>Nếu bạn nu&ocirc;i những giống ch&oacute; X&ugrave; như một số loại ch&oacute; Poodle, ch&oacute; Cocker,Ch&oacute; Bắc Kinh, Ch&oacute; Phốc s&oacute;c th&igrave; chắc chắn l&agrave; đ&atilde; trải qua t&igrave;nh cảnh như thế n&agrave;y. Mặc d&ugrave; đ&atilde; tắm sạch cho ch&oacute; rồi nhưng vẫn thấy m&ugrave;i h&ocirc;i từ ch&oacute;. Bạn c&oacute; biết nguy&ecirc;n nh&acirc;n v&igrave; sao ch&oacute; tắm sạch rồi m&agrave; vẫn c&oacute; m&ugrave;i h&ocirc;i hay kh&ocirc;ng ? v&agrave; c&aacute;ch chữa trị cho ch&oacute; hết m&ugrave;i h&ocirc;i bằng c&aacute;ch n&agrave;o ? H&atilde;y c&ugrave;ng&nbsp;<strong><a href=\"https://www.petcity.vn/\">PetCity</a>&nbsp;</strong>t&igrave;m hiểu nh&eacute;!</p>\r\n\r\n<p><strong>&gt;&gt;&gt;<a href=\"https://www.petcity.vn/cham-soc-thu-cung-dung-cach.html\">Chăm s&oacute;c th&uacute; cưng đúng cách ?</a></strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/1307_Tmch.jpg\" /></p>\r\n\r\n<p><br />\r\n<strong>Vệ sinh cho ch&oacute; chưa được sạch ?</strong></p>\r\n\r\n<p>Bạn c&oacute; chắc l&agrave; bạn đ&atilde; tắm cho ch&oacute; một c&aacute;ch sạch sẽ chưa ? Nhiều người chưa ch&oacute; nhiều những KINH NGHIỆM NU&Ocirc;I CH&Oacute; như việc tắm cho ch&oacute; nhưng v&igrave; sợ ch&oacute; bị lạnh, hay c&oacute; thể l&agrave; do chưa quen tắm cho ch&oacute; n&ecirc;n c&oacute; thể l&agrave; bụi bẩn, c&aacute;u gh&eacute;t hay l&ocirc;ng l&aacute; ở những v&ugrave;ng khe kẽ tr&ecirc;n th&acirc;n ch&oacute; chưa được vệ sinh một c&aacute;ch sạch sẽ, đặc biệt l&agrave; v&ugrave;ng ở 2 b&ecirc;n lỗ tai c&oacute; nhiều l&ocirc;ng bị bết d&iacute;nh bẩn ở trong đ&oacute;. Việc n&agrave;y bạn cần phải nhổ bằng bột nhổ chuy&ecirc;n dụng hoặc cắt tỉa sạch l&ocirc;ng, d&ugrave;ng b&ocirc;ng tăm thấm nước muối rồi lasạch v&ugrave;ng tai của ch&oacute; đi l&agrave; được. Bạn cần thường xuy&ecirc;n vệ sinh v&ugrave;ng tai cho ch&oacute; để ch&oacute; sạch v&agrave; hạn chế m&ugrave;i h&ocirc;i, cũng như d&ugrave;ng những sản phẩm sữa tắm cho ch&oacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/1307_hqdefault.jpg\" style=\"width:300px\" /></p>\r\n\r\n<p><br />\r\n<strong>H&atilde;y&nbsp;<a href=\"https://www.petcity.vn/tim?q=s%E1%BB%AFa+t%E1%BA%AFm+kh%E1%BB%AD+m%C3%B9i&amp;scat_id=0\">vắt tuyến mồ h&ocirc;i cho ch&oacute;</a>&nbsp;thường xuy&ecirc;n</strong></p>\r\n\r\n<ul>\r\n	<li>Bạn đ&atilde; nghe n&oacute;i đến tuyến mồ h&ocirc;i của ch&oacute; ? Vậy tuyến mồ h&ocirc;i của ch&oacute; nằm ở đ&acirc;u ? Đ&acirc;y l&agrave; điều m&agrave; kh&ocirc;ng phải ai cũng biết. Việc ch&oacute; sau khi tắm xong m&agrave; vẫn bị c&oacute; m&ugrave;i h&ocirc;i một phần bị ảnh hưởng rất lớn ch&iacute;nh l&agrave; nguy&ecirc;n nh&acirc;n do tuyến mồ h&ocirc;i của ch&oacute; ph&aacute;t ra.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Vậy ch&uacute;ng ta cần l&agrave;m g&igrave; để hạn chế tối đa m&ugrave;i từ tuyến mồ h&ocirc;i của ch&oacute;? Điều n&agrave;y rất đơn giản th&ocirc;i nhưng hầu hết người nu&ocirc;i ch&oacute; thường kh&ocirc;ng biết xử l&yacute; như thế n&agrave;o. V&agrave; b&acirc;y giờ, bạn cần phải biết ch&iacute;nh x&aacute;c tuyến mồ h&ocirc;i của ch&oacute; nằm ở đ&acirc;u. Tuyến mồ h&ocirc;i của ch&oacute; nằm ngay ở lỗ hậu m&ocirc;n của ch&oacute;, t&uacute;i hậu m&ocirc;n hoặc c&aacute;c tuyến hậu m&ocirc;n , c&oacute; một số chất lỏng c&oacute; m&ugrave;i v&agrave; khi t&uacute;i đầy chất lỏng v&agrave; c&aacute;c bạn cần gi&uacute;p đỡ để giải ph&oacute;ng chất lỏng v&agrave; l&agrave;m sạch m&ugrave;i v&agrave; ch&uacute;ng ta cần phải vắt tuyến mồ h&ocirc;i n&agrave;y ra.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>C&aacute;c thao t&aacute;c vắt tuyến mồ h&ocirc;i cho ch&oacute; rất đơn giản chỉ bằng v&agrave;i động t&aacute;c, bạn cứ h&igrave;nh dung c&aacute;i t&uacute;i tuyến mồ h&ocirc;i nằm ngay ở ph&iacute;a dưới hậu m&ocirc;n, bạn đưa 2 ng&oacute;n rồi b&oacute;p nhẹ phần dưới hậu m&ocirc;n. Động t&aacute;c giống như nặn mụn trứng c&aacute; th&ocirc;i, để cho tuyến nhờn trong t&uacute;i tuyến mồ h&ocirc;i chảy ra ngo&agrave;i theo lỗ hậu m&ocirc;n nh&eacute;.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/1307_happy_dog_names_male_and_female_2986_600.jpg\" style=\"width:300px\" /></p>\r\n\r\n<p><strong>Lưu &yacute;</strong>: khi nặn v&agrave; vắt tuyến mồ h&ocirc;i cho ch&oacute; ở hậu m&ocirc;n, th&igrave; bạn cần phải c&oacute; 1 người giữ chặt con ch&oacute; tr&aacute;nh trường hợp ch&oacute; bị hoảng loạn. Sau khi vắt xong tuyến mồ h&ocirc;i cho ch&oacute;, bạn ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m v&igrave; ch&oacute; kh&ocirc;ng c&oacute; m&ugrave;i nữa. Bạn n&ecirc;n l&agrave;m điều n&agrave;y &iacute;t nhất một đến hai lần trong 1 th&aacute;ng. Nếu bạn kh&ocirc;ng l&agrave;m ch&oacute; của bạn c&oacute; thể bị nhiễm tr&ugrave;ng ở khu vực đ&oacute; v&agrave; điều tồi tệ nhất l&agrave; n&oacute; c&oacute; thể cần phải phẫu thuật. L&uacute;c n&agrave;y tắm cho ch&oacute; xong th&igrave; chắc chắn l&agrave; ch&oacute; sẽ kh&ocirc;ng c&ograve;n những m&ugrave;i h&ocirc;i kh&oacute; chịu nữa đ&acirc;u.</p>', '/images/article/blog-8.jpg', NULL, NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:51:55', 'admin'),
(6, 'active', 'Chó bị nấm có lây sang người không ?', 'cho-bi-nam-co-lay-sang-nguoi-khong', '<p>Lỗi lo sợ của nhiều người nu&ocirc;i ch&oacute; khi ph&aacute;t hiện ch&oacute; nh&agrave; m&igrave;nh bị nấm da thường sẽ l&agrave;&nbsp;<em><strong>ch&oacute; bị nấm c&oacute; l&acirc;y sang người kh&ocirc;ng</strong></em>&nbsp;? Trong b&agrave;i n&agrave;y&nbsp;<a href=\"https://www.petcity.vn/\">Petcity</a>&nbsp;sẽ trả lời bạn.&nbsp;</p>\r\n\r\n<h3>Biểu hiện của bệnh nấm da ở ch&oacute; m&egrave;o&nbsp;</h3>\r\n\r\n<p>Bệnh nấm da ở ch&oacute; bạn c&oacute; thể ph&aacute;t hiện bằng mắt thường th&ocirc;ng qua c&aacute;c biểu hiện triệu chứng b&ecirc;n ngo&agrave;i như:</p>\r\n\r\n<ul>\r\n	<li>Mất l&ocirc;ng (rụng l&ocirc;ng), c&oacute; thể lốm đốm hoặc theo mảng tr&ograve;n</li>\r\n	<li>L&ocirc;ng v&agrave; da l&ocirc;ng yếu</li>\r\n	<li>Da bị đỏ hoặc lo&eacute;t</li>\r\n	<li>G&agrave;u (vảy)</li>\r\n	<li>Da sẫm m&agrave;u</li>\r\n	<li>Da tr&oacute;c vỏ</li>\r\n	<li>Ngứa (bệnh ngứa) c&oacute; thể c&oacute; hoặc kh&ocirc;ng xuất hiện</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/1811_vinm.jpg\" style=\"height:450px; width:600px\" /></p>\r\n\r\n<p>Trong một số &iacute;t trường hợp, ch&oacute; sẽ bị c&aacute;c tổn thương dạng nốt lớn c&oacute; thể được gọi l&agrave; nấm vi&ecirc;m (kerion). M&oacute;ng vuốt v&agrave; nếp m&oacute;ng (phần da gi&aacute;p với m&oacute;ng vuốt) cũng c&oacute; thể bị nhiễm nấm da, khiến m&oacute;ng tay bị gi&ograve;n hoặc bị tổn thương.</p>\r\n\r\n<p>Đ&ocirc;i khi, ch&oacute; được ph&acirc;n loại th&agrave;nh vật mang mầm bệnh kh&ocirc;ng c&oacute; triệu chứng hoặc thầm lặng. N&oacute;i c&aacute;ch kh&aacute;c, ch&uacute;ng chứa c&aacute;c loại nấm g&acirc;y bệnh nhưng kh&ocirc;ng c&oacute; dấu hiệu r&otilde; r&agrave;ng của t&igrave;nh trạng n&agrave;y. Những con ch&oacute; n&agrave;y vẫn c&oacute; thể truyền bệnh cho người v&agrave; c&aacute;c động vật kh&aacute;c.</p>\r\n\r\n<h3>Bệnh nấm da của ch&oacute; c&oacute; thể l&acirc;y sang người ?</h3>\r\n\r\n<p>Đ&acirc;y l&agrave; một trong những căn bệnh thường l&acirc;y từ động vật như ch&oacute; m&egrave;o sang người nhiều nhất hiện nay tr&ecirc;n thế giới</p>\r\n\r\n<p>Hắc l&agrave;o (tinea ciroinata): ch&oacute;, m&egrave;o bị bệnh hắc l&agrave;o tr&ecirc;n da, l&acirc;y sang người do tiếp x&uacute;c trong khi vuốt ve hoặc chải l&ocirc;ng cho ch&oacute; hoặc m&egrave;o. Triệu chứng đầu ti&ecirc;n l&agrave; mẩn đỏ, ngứa, lan rộng dần ra xung quanh v&ugrave;ng trung t&acirc;m l&agrave;nh tạo n&ecirc;n h&igrave;nh v&ograve;ng. Những vết thương gần nhau khi lan rộng sẽ h&ograve;a v&agrave;o nhau th&agrave;nh h&igrave;nh đa v&ograve;ng.</p>\r\n\r\n<p>Nấm m&aacute; (tinea barbae): thường vết thương ở một b&ecirc;n (phải hay tr&aacute;i), đ&ocirc;i khi ở cằm. Bệnh nhiễm do h&ocirc;n h&iacute;t th&uacute; nu&ocirc;i trong nh&agrave; c&oacute; vi nấm tr&ecirc;n l&ocirc;ng (T. mentagrophytes, M.canis ở ch&oacute;, m&egrave;o).</p>\r\n\r\n<h3>C&aacute;ch ph&ograve;ng tr&aacute;nh bệnh k&yacute; sinh tr&ugrave;ng nấm da l&acirc;y nhiễm do nu&ocirc;i th&uacute; cưng</h3>\r\n\r\n<p><strong>Đối với người:</strong></p>\r\n\r\n<p>- Tuy&ecirc;n truyền gi&aacute;o dục n&acirc;ng cao &yacute; thức vệ sinh c&aacute; nh&acirc;n v&agrave; cộng đồng đặc biệt l&agrave; c&aacute;c chủ nu&ocirc;i ch&oacute;, m&egrave;o, bảo vệ m&ocirc;i trường kh&ocirc;ng bị nhiễm ph&acirc;n ch&oacute; m&egrave;o. ( Tham khảo c&aacute;c sản phẩm&nbsp;</p>\r\n\r\n<p>- Vệ sinh ph&ograve;ng dịch: vệ sinh m&ocirc;i trường, đặc biệt l&agrave; khu vực c&oacute; ph&acirc;n ch&oacute;, ph&acirc;n m&egrave;o, khu vực trong nh&agrave; v&agrave; khu vực vui chơi của trẻ em. X&acirc;y dựng nếp sống vệ sinh c&aacute; nh&acirc;n tốt: rửa tay trước khi ăn hoặc chuẩn bị thức ăn, kh&ocirc;ng ăn rau sống khi chưa rửa thật sạch hoặc thịt ch&oacute;, m&egrave;o chưa nấu ch&iacute;n.</p>\r\n\r\n<p><strong>Đối với th&uacute; nu&ocirc;i:</strong></p>\r\n\r\n<p>- Tắm rửa thường xuy&ecirc;n bằng c&aacute;c loại dầu tắm d&agrave;nh ri&ecirc;ng cho th&uacute; nu&ocirc;i để loại k&yacute; sinh ra khỏi da ch&oacute;.</p>\r\n\r\n<h3>C&aacute;c sản phẩm điều trị nấm da ở ch&oacute;</h3>\r\n\r\n<p>Bạn c&oacute; thể chọn c&aacute;c sản phẩm đặc trị nấm da cho ch&oacute; dưới đ&acirc;y tại Petcity hoặc inbox để được tư vấn tốt nhất.</p>\r\n\r\n<ol>\r\n	<li><a href=\"https://www.petcity.vn/Davis---Sua-tam-ngua-do-nhiem-nam-Miconazole-355ml/p3581.html\">Davis - Sữa tắm ngứa do nhiễm nấm Miconazole 355ml</a></li>\r\n	<li><a href=\"https://www.petcity.vn/sua-tam-tri-nam-viem-da-joyce-dolls-clear/p2100.html\">Sữa tắm trị nấm vi&ecirc;m da Joyce &amp; Dolls Clear</a></li>\r\n	<li><a href=\"https://www.petcity.vn/xit-chuyen-tri-nam-vay-gau-fungikr-spray-50ml/p1759.html\">Xịt chuy&ecirc;n trị nấm, vảy g&agrave;u - Fungik&uuml;r Spray 50ml</a></li>\r\n	<li><a href=\"https://www.petcity.vn/thuoc-tri-ghe-nam-alkin-mitecyn-50ml-cho-cho-meo/p1758.html\">Thuốc trị ghẻ nấm - Alkin Mitecyn 50ml cho ch&oacute; m&egrave;o</a></li>\r\n	<li><a href=\"https://www.petcity.vn/bio-sua-tam-bio-derma-tri-ghe-nam-da-cho-cho-meo-200ml.html\">Bio - Sữa tắm Bio Derma trị ghẻ, nấm da cho ch&oacute; m&egrave;o (200ml)</a></li>\r\n	<li><a href=\"https://www.petcity.vn/Sua-tam-Sleeky-cho-cho-meo-da-bi-kho-ngua-do-nam-ghe-350ml/p1716.html\">Sữa tắm Sleeky cho ch&oacute; m&egrave;o da bị kh&ocirc;, ngứa do nấm, ghẻ 350ml</a></li>\r\n</ol>', '/images/article/blog-3.jpg', NULL, NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:33:50', 'admin'),
(7, 'active', 'Ăn nhầm thức ăn cho chó, mèo có nguy hiểm?', 'an-nham-thuc-an-cho-cho-meo-co-nguy-hiem', '<p>Hiện kh&ocirc;ng c&oacute; bất kỳ ghi nhận ch&iacute;nh thức n&agrave;o về việc c&oacute; bao nhi&ecirc;u người đ&atilde; ăn thực phẩm đ&oacute;ng hộp d&agrave;nh cho vật nu&ocirc;i như ch&oacute; hay m&egrave;o. Tuy nhi&ecirc;n, c&acirc;u hỏi đặt ra ở đ&acirc;y l&agrave;: Liệu ăn những loại thực phẩm đ&oacute; c&oacute; nguy hiểm, thậm ch&iacute; khiến con người tử vong?</p>\r\n\r\n<p>Theo c&aacute;c chuy&ecirc;n gia, h&agrave;nh động n&agrave;y gần như v&ocirc; hại như việc bạn ăn những thực phẩm thừa vương v&atilde;i tr&ecirc;n b&agrave;n. Hầu hết thức ăn d&agrave;nh cho vật nu&ocirc;i được chế biến từ những thực phẩm m&agrave; con người kh&ocirc;ng muốn ăn, c&aacute;c thứ c&ograve;n lại ở l&ograve; giết mổ như nội tạng, m&aacute;u hay da - một loại thức ăn l&agrave;m no bụng, kh&oacute; ti&ecirc;u h&oacute;a nhưng v&ocirc; hại. Nhiều thực phẩm kh&ocirc; v&agrave; ướt đ&oacute;ng hộp hoặc g&oacute;i d&agrave;nh cho ch&oacute; v&agrave; m&egrave;o thậm ch&iacute; c&ograve;n chứa gạo, l&uacute;a m&igrave; v&agrave; c&aacute;c loại thực vật kh&aacute;c, chưa kể đến c&aacute;c vitamin v&agrave; kho&aacute;ng chất cho th&ecirc;m v&agrave;o.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, nếu bạn muốn thử thực phẩm chế biến sẵn d&agrave;nh cho vật nu&ocirc;i, h&atilde;y cẩn trọng! Ng&agrave;y 16/3/2007, Cục quản l&yacute; Thực phẩm v&agrave; dược phẩm Mỹ (FDA) đ&atilde; ph&aacute;t đi th&ocirc;ng b&aacute;o thu hồi số lượng lớn đối với một v&agrave;i loại thực phẩm đ&oacute;ng hộp cho vật nu&ocirc;i v&igrave; ch&uacute;ng g&acirc;y suy thận v&agrave; tử vong ở h&agrave;ng trăm, thậm ch&iacute; c&oacute; thể ở h&agrave;ng ng&agrave;n con vật. FDA sau đ&oacute; đ&atilde; ra lệnh thu hồi th&ecirc;m nhiều thức ăn cho vật nu&ocirc;i c&oacute; chứa &quot;thủ phạm g&acirc;y họa&quot; - chất gluten trong l&uacute;a mỳ, th&agrave;nh phần được sử dụng để l&agrave;m đặc thực phẩm cho ch&oacute;, m&egrave;o.</p>\r\n\r\n<p>&nbsp;<img alt=\"\" src=\"https://www.petcity.vn/media/news/2411_20130402152347-tp.jpg\" style=\"height:240px; width:450px\" /></p>\r\n\r\n<p>C&aacute;c nh&agrave; khoa học cũng đ&atilde; kiểm nghiệm những bữa ăn d&agrave;nh cho vật nu&ocirc;i bị nghi ngờ v&agrave; ph&aacute;t hiện một th&agrave;nh phần c&oacute; t&ecirc;n gọi melamine - h&oacute;a chất l&agrave;m chậm ch&aacute;y v&agrave; được d&ugrave;ng phổ biến trong ng&agrave;nh c&ocirc;ng nghiệp sản xuất nhựa l&agrave; căn nguy&ecirc;n g&acirc;y ra c&aacute;i chết của nhiều th&uacute; cưng.</p>\r\n\r\n<p>Mặc d&ugrave; kh&ocirc;ng ai biết đ&iacute;ch x&aacute;c tại sao melamine g&acirc;y ra nhiều rắc rối đến như vậy nhưng c&aacute;c nh&agrave; khoa học thống nhất rằng, h&oacute;a chất n&agrave;y c&oacute; thể g&acirc;y sỏi thận. Theo một t&agrave;i liệu của nh&agrave; chức tr&aacute;ch Mỹ, c&aacute;c th&agrave;nh phần ch&iacute;nh của sỏi thận ở những con chuột đ&atilde; ăn thực phẩm d&agrave;nh cho vật nu&ocirc;i l&agrave; melamine v&agrave; ax&iacute;t uric (hay c&ograve;n gọi l&agrave; ur&ecirc;, th&agrave;nh phần ch&iacute;nh trong nước tiểu của động vật c&oacute; v&uacute;).</p>\r\n\r\n<p>Để l&agrave;m tăng thể t&iacute;ch của sữa , người ta thường th&ecirc;m nước v&agrave;o sữa tươi. Đồng thời, họ cũng cho th&ecirc;m melamine v&agrave;o để l&agrave;m cho nồng độ đạm (nitrogen) của sữa đạt tới ti&ecirc;u chuẩn . X&eacute;t nghiệm kh&ocirc;ng ph&acirc;n biệt được đ&acirc;u l&agrave; đạm tự nhi&ecirc;n trong sữa v&agrave; đ&acirc;u l&agrave; nitrogen của melamine.</p>\r\n\r\n<p>Việc melamine xuất hiện trong thực phẩm d&agrave;nh cho vật nu&ocirc;i b&agrave;y b&aacute;n ở Mỹ bắt nguồn từ một nh&agrave; sản xuất gluten l&uacute;a mỳ Trung Quốc. Khi cho th&ecirc;m melamine v&agrave;o đồ ăn đ&oacute;ng hộp, nh&agrave; sản xuất đ&atilde; đ&aacute;nh lừa người d&ugrave;ng về h&agrave;m lượng đạm cao trong sản phẩm do x&eacute;t nghiệm kh&ocirc;ng thể ph&acirc;n biệt được đ&acirc;u l&agrave; đạm tự nhi&ecirc;n trong thức ăn v&agrave; đ&acirc;u l&agrave; đạm giả tạo của melamine - điểm gi&uacute;p họ thu lời lớn.</p>\r\n\r\n<p>Tổ chức N&ocirc;ng - Lương thế giới (FAO) v&agrave; Tổ chức Y tế thế giới (WHO) đ&atilde; khuyến c&aacute;o kh&ocirc;ng được đưa chất melamine v&agrave;o thực phẩm. Tuy nhi&ecirc;n, h&oacute;a chất n&agrave;y từng l&agrave; trung t&acirc;m của một vụ b&ecirc; bối sữa nhiễm độc đ&igrave;nh đ&aacute;m ở Trung Quốc năm 2008. Sự cố sữa lẫn h&oacute;a chất melamine g&acirc;y sạn thận, khiến 6 trẻ thiệt mạng v&agrave; gần 300.000 trẻ kh&aacute;c bị bệnh, li&ecirc;n quan trực tiếp đến tập đo&agrave;n Tam Lộc - doanh nghiệp từng đứng thứ 3 Trung Quốc về sản xuất v&agrave; kinh doanh sữa. Hiện tượng sữa bị nhiễm độc melamine c&ograve;n được ph&aacute;t hiện ở 21 c&ocirc;ng ty kh&aacute;c của Trung Quốc, g&acirc;y r&uacute;ng động dư luận v&agrave; g&oacute;p phần l&agrave;m giảm s&uacute;t l&ograve;ng tin của người ti&ecirc;u d&ugrave;ng khắp nơi tr&ecirc;n thế giới về sản phẩm &quot;made in China&quot;.</p>\r\n\r\n<p>Rốt cuộc, c&acirc;u trả lời cho việc người chẳng may ăn nhầm hoặc muốn thử thực phẩm d&agrave;nh th&uacute; cưng l&agrave; kh&ocirc;ng nguy hiểm. Tuy nhi&ecirc;n, để an to&agrave;n , việc con người chỉ n&ecirc;n d&ugrave;ng thực phẩm chế biến sẵn d&agrave;nh ri&ecirc;ng cho con người mới l&agrave; một lựa chọn kh&ocirc;n ngoan.</p>\r\n\r\n<p>(Theo Life&#39;s Little Mysteries)</p>', '/images/article/blog-2.jpg', NULL, NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:33:10', 'admin'),
(8, 'active', 'Thủ tục nhập khẩu thức ăn cho chó mèo chính hãng từ nước ngoài', 'thu-tuc-nhap-khau-thuc-an-cho-cho-meo-chinh-hang-tu-nuoc-ngoai', '<p>Bạn đang quan t&acirc;m đến thủ tục nhập khẩu&nbsp;<a href=\"https://www.petcity.vn/\">thức ăn cho ch&oacute; m&egrave;o</a>. Chắc hẳn bạn đ&atilde; biết tr&agrave;o lưu chơi th&uacute; cưng hiện đang l&agrave; một trong những th&uacute; vui của giới trẻ hiện nay. Theo đ&oacute; l&agrave; việc c&aacute;c giống th&uacute; cưng ch&oacute; m&egrave;o từ nước ngo&agrave;i tr&agrave;n v&agrave;o Việt Nam. Việc gia tăng số lượng th&uacute; nu&ocirc;i trong nh&agrave; k&eacute;o theo nhu cầu lớn về thức ăn cho ch&oacute; m&egrave;o nhập khẩu. C&oacute; cầu th&igrave; c&oacute; cung, đ&acirc;y ch&iacute;nh l&agrave; một thị trường lớn mở ra nhiều c&oacute; hội để start up.&nbsp;</p>\r\n\r\n<p><strong>C&aacute;c dạng về thủ tục nhập khẩu thức ăn cho ch&oacute; m&egrave;o</strong></p>\r\n\r\n<p>Thủ tục nhập khẩu được chia l&agrave;m hai dạng: một l&agrave; sản phẩm nhập khẩu đ&atilde; c&oacute; trong danh mục thức ăn chăn nu&ocirc;i được ph&eacute;p nhập khẩu v&agrave;o Việt Nam, hai l&agrave; chưa c&oacute; trong danh mục.</p>\r\n\r\n<p>Đối với thức ăn cho ch&oacute; m&egrave;o nhập khẩu l&agrave; sản phẩm đ&atilde; c&oacute; trong danh mục thức ăn chăn nu&ocirc;i được ph&eacute;p nhập khẩu v&agrave;o Việt Nam, mỗi l&ocirc; h&agrave;ng khi nhập khẩu về Việt Nam thực hiện thủ tục Đăng k&yacute; kiểm tra x&aacute;c nhận chất lượng.</p>\r\n\r\n<p>Đối với thức ăn cho ch&oacute; m&egrave;o nhập khẩu l&agrave; sản phẩm chưa c&oacute; trong danh mục thức ăn chăn nu&ocirc;i được ph&eacute;p nhập khẩu v&agrave;o Việt Nam, phải thực hiện thủ tục C&ocirc;ng nhận chất lượng Thức ăn nhập khẩu.</p>\r\n\r\n<p><strong>Một số thủ tục khi đăng k&iacute; sản phẩm chưa c&oacute; trong danh mục</strong></p>\r\n\r\n<p>Trong trường hợp sản phẩm chưa c&oacute; trong danh mục thức ăn chăn nu&ocirc;i được ph&eacute;p nhập khẩu v&agrave;o trong nước th&igrave; bạn phải l&agrave;m hồ sơ c&ocirc;ng nhận chất lượng thức ăn cho ch&oacute; nhập khẩu. Bạn sẽ phải đem theo những giấy tờ li&ecirc;n quan như: nh&atilde;n m&aacute;c sản phẩm, giấy kiểm định an to&agrave;n thực phẩm, giấy về c&aacute;c nguy&ecirc;n liệu sản phẩm, giấy ủy quyền của nh&agrave; sản xuất cho tổ chức, c&aacute; nh&acirc;n đăng k&yacute;,&hellip;v&agrave; nộp hồ sơ tại Cục chăn nu&ocirc;i &ndash; Bộ NN&amp;PTNN. V&agrave; tất cả những thủ tục ấy khảo nghiệm theo quy định tại Điều 12 Nghị định số 08/2010/NĐ-CP ng&agrave;y 05/02/2010 của Ch&iacute;nh phủ về quản l&yacute; thức ăn chăn nu&ocirc;i v&agrave; Điều 22 Th&ocirc;ng tư số 66/2011/TT-BNNPTNT ng&agrave;y 10/10/2011 của Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n. Nếu bạn chưa r&otilde; th&igrave; li&ecirc;n hệ trực tiếp với Cục Chăn nu&ocirc;i &ndash; Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n để được hướng dẫn.</p>\r\n\r\n<p><strong>Thủ tục hải quan nhập khẩu thức ăn cho ch&oacute; m&egrave;o</strong></p>\r\n\r\n<p>Ngo&agrave;i những giấy kiểm dịch khắt khe như ở tr&ecirc;n, bạn cần l&agrave;m thủ tục như h&agrave;ng th&ocirc;ng thường, với một số bước ch&iacute;nh như sau:</p>\r\n\r\n<p>&ndash; Chuẩn bị hồ sơ hải quan</p>\r\n\r\n<p>&ndash; Khai v&agrave; truyền tờ khai hải quan bằng phần mềm</p>\r\n\r\n<p>&ndash; Nộp hồ sơ tại chi cục hải quan, l&agrave;m thủ tục</p>\r\n\r\n<p>&ndash; Th&ocirc;ng quan h&agrave;ng h&oacute;a.</p>\r\n\r\n<p><strong>Một số điều khoản cần lưu &yacute;</strong></p>\r\n\r\n<p>Kh&ocirc;ng chỉ thế muốn nhập khẩu thức cho ch&oacute; m&egrave;o bạn cần phải lưu &yacute; tới một số điều khoản sau:</p>\r\n\r\n<p>H&igrave;nh thức nhập khẩu thức ăn cho ch&oacute; m&egrave;o</p>\r\n\r\n<p>Thực hiện theo quy định tại Th&ocirc;ng tư số 38/2015/TT-BTC ng&agrave;y 25/3/2015 của Bộ T&agrave;i ch&iacute;nh. Trong đ&oacute;, hồ sơ hải quan thực hiện theo khoản 2 Điều 16.hồ sơ hải quan được quy định tại Điều 71 Th&ocirc;ng tư số 128/2013/TT-BTC ng&agrave;y 10/9/2013 của Bộ T&agrave;i ch&iacute;nh.</p>\r\n\r\n<p><strong>Về quản l&yacute; chuy&ecirc;n ng&agrave;nh nhập khẩu thức ăn cho ch&oacute; m&egrave;o</strong></p>\r\n\r\n<p>Thực hiện việc kiểm dịch thực vật theo quy định tại Th&ocirc;ng tư số 40/2012/TT-BNNPTNT ng&agrave;y 15/8/2012 của Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n nếu thức ăn chăn nu&ocirc;i c&oacute; nguồn gốc từ thực vật;</p>\r\n\r\n<p>Thực hiện việc kiểm dịch động vật theo quy định tại Quyết định số 45/2005/QĐ-BNN ng&agrave;y 25/7/2005 của Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n nếu thức ăn chăn nu&ocirc;i c&oacute; nguồn gốc từ động vật;</p>\r\n\r\n<p>Thực hiện việc kiểm tra chất lượng theo quy định tại Th&ocirc;ng tư số 66/2011/TT-BNNPTNT ng&agrave;y 10/10/2011 của Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n.</p>', '/images/article/blog-5.jpg', NULL, NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:32:36', 'admin');
INSERT INTO `article` (`id`, `status`, `name`, `slug`, `content`, `thumb`, `type`, `publish_at`, `category_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(9, 'active', 'Cách chữa nấm chó, mèo lây sang người', 'cach-chua-nam-cho-meo-lay-sang-nguoi', '<p><strong>Phương ph&aacute;p điều trị v&agrave; thuốc chữa nấm ch&oacute; m&egrave;o l&acirc;y sang người</strong></p>\r\n\r\n<p>Nếu bệnh nấm cơ thể bao gồm một khu vực rộng lớn, nghi&ecirc;m trọng hoặc kh&ocirc;ng đ&aacute;p ứng với thuốc toa, c&oacute; thể cần một toa thuốc tăng cường (lotion, kem hoặc thuốc mỡ) hoặc thuốc uống (thuốc vi&ecirc;n, vi&ecirc;n nang hoặc vi&ecirc;n). Nhiều t&ugrave;y chọn c&oacute; sẵn, bao gồm:</p>\r\n\r\n<p>Butenafine (Mentax).</p>\r\n\r\n<p>Ciclopirox (Loprox).</p>\r\n\r\n<p>Econazole.</p>\r\n\r\n<p>Clotrimazole (Mycelex).</p>\r\n\r\n<p>Terbinafine (Lamisil).</p>\r\n\r\n<p>Griseofulvin (Grifulvin V).</p>\r\n\r\n<p>Itraconazole (Sporanox).</p>\r\n\r\n<p>Fluconazole (Diflucan).</p>\r\n\r\n<p>Terbinafine (Lamisil).</p>\r\n\r\n<p>C&aacute;c t&aacute;c dụng phụ từ thuốc uống bao gồm kh&oacute; chịu đường ti&ecirc;u h&oacute;a, ph&aacute;t ban v&agrave; chức năng gan bất thường. Một số thuốc uống c&oacute; thể thay đổi hiệu quả của warfarin, một loại thuốc chống đ&ocirc;ng m&aacute;u l&agrave;m giảm khả năng đ&ocirc;ng của m&aacute;u.</p>\r\n\r\n<p><strong>Phong c&aacute;ch sống v&agrave; biện ph&aacute;p khắc phục</strong></p>\r\n\r\n<p>Đối với một trường hợp nhẹ, c&oacute; thể &aacute;p dụng lotion toa kh&aacute;ng nấm, kem hoặc thuốc mỡ. Hầu hết c&aacute;c bệnh nhiễm nấm đ&aacute;p ứng tốt tại chỗ, trong đ&oacute; bao gồm:</p>\r\n\r\n<p>Clotrimazole (Lotrimin AF).</p>\r\n\r\n<p>Miconazole (Micatin, Micaderm).</p>\r\n\r\n<p>Terbinafine (Lamisil AT).</p>\r\n\r\n<p>Tolnaftate (Tinactin).</p>\r\n\r\n<p>Rửa v&agrave; lau kh&ocirc; v&ugrave;ng bị ảnh hưởng. Sau đ&oacute;, &aacute;p một lớp mỏng của c&aacute;c đại l&yacute; tại chỗ một lần hoặc hai lần một ng&agrave;y trong &iacute;t nhất hai tuần, hoặc theo hướng g&oacute;i. Mở rộng c&aacute;c ứng dụng một inch ngo&agrave;i r&igrave;a nh&igrave;n thấy được để đảm bảo điều trị tốt nhất. Nếu kh&ocirc;ng thấy sự cải tiến sau bốn tuần, gặp b&aacute;c sĩ.</p>\r\n\r\n<p><strong>Ph&ograve;ng chống nấm ch&oacute; m&egrave;o l&acirc;y sang người</strong></p>\r\n\r\n<p>Bệnh nấm l&agrave; kh&oacute; khăn để ngăn chặn. C&aacute;c loại nấm g&acirc;y ra bệnh nấm l&agrave; phổ biến v&agrave; l&acirc;y nhiễm ngay cả trước khi c&aacute;c triệu chứng xuất hiện. Tuy nhi&ecirc;n, c&oacute; thể gi&uacute;p giảm nguy cơ bệnh nấm bằng c&aacute;ch tham gia c&aacute;c bước sau:</p>\r\n\r\n<p>Gi&aacute;o dục ch&iacute;nh m&igrave;nh v&agrave; những người kh&aacute;c. H&atilde;y nhận biết c&aacute;c nguy cơ bệnh nấm từ người bị nhiễm hoặc vật nu&ocirc;i. H&atilde;y cho trẻ em biết về bệnh nấm, những g&igrave; để xem v&agrave; l&agrave;m thế n&agrave;o để tr&aacute;nh nhiễm tr&ugrave;ng.</p>\r\n\r\n<p>Giữ sạch. Rửa tay thường xuy&ecirc;n để tr&aacute;nh sự l&acirc;y lan của nhiễm tr&ugrave;ng. Giữ hoặc chia sẻ c&aacute;c khu vực chung sạch sẽ, đặc biệt l&agrave; trong c&aacute;c trường học, trung t&acirc;m chăm s&oacute;c trẻ em, ph&ograve;ng tập thể dục v&agrave; ph&ograve;ng thay quần &aacute;o.</p>\r\n\r\n<p>Giữ lạnh v&agrave; kh&ocirc;. Kh&ocirc;ng mặc quần &aacute;o d&agrave;y trong thời gian d&agrave;i, thời tiết ẩm ướt ấm. Tr&aacute;nh ra mồ h&ocirc;i qu&aacute; nhiều.</p>\r\n\r\n<p>Tr&aacute;nh nhiễm bệnh động vật. Nhiễm thường tr&ocirc;ng giống như một bản v&aacute; lỗi của da. Trong một số trường hợp, mặc d&ugrave;, c&oacute; thể kh&ocirc;ng nhận thấy bất kỳ dấu hiệu của bệnh. H&atilde;y hỏi b&aacute;c sĩ th&uacute; y để kiểm tra vật nu&ocirc;i v&agrave; vật nu&ocirc;i cho bệnh nấm.</p>\r\n\r\n<p>Kh&ocirc;ng d&ugrave;ng chung vật dụng c&aacute; nh&acirc;n. Đừng để người kh&aacute;c sử dụng khăn, quần &aacute;o, b&agrave;n chải t&oacute;c hoặc c&aacute;c c&aacute; nh&acirc;n kh&aacute;c. Kh&ocirc;ng được d&ugrave;ng c&aacute;c mặt h&agrave;ng n&agrave;y từ những người kh&aacute;c.</p>', '/images/article/blog-6.jpg', 'normal', NULL, NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:32:01', 'admin'),
(10, 'active', 'Hướng dẫn cách tẩy giun sán cho chó mèo tại nhà an toàn hiệu quả', 'huong-dan-cach-tay-giun-san-cho-cho-meo-tai-nha-an-toan-hieu-qua', '<p>Tẩy giun s&aacute;n cho ch&oacute; m&egrave;o l&agrave; việc rất quan trọng nhằm bảo vệ sức khỏe ch&oacute; ch&oacute; m&egrave;o v&agrave; cả chủ nu&ocirc;i, tuy nhi&ecirc;n kh&ocirc;ng phải ai cũng biết c&aacute;c biểu hiện v&agrave; c&aacute;ch tẩy giun an to&agrave;n hiệu quả cho ch&oacute; m&egrave;o. H&atilde;y c&ugrave;ng Petcity.vn t&igrave;m hiểu nh&eacute;!</p>\r\n\r\n<p><strong>1. Lịch tẩy giun s&aacute;n cho ch&oacute; m&egrave;o:</strong></p>\r\n\r\n<p>- Đối với ch&oacute; m&egrave;o từ sơ sinh đến trưởng th&agrave;nh:</p>\r\n\r\n<p>Lần đầu ti&ecirc;n: Ch&oacute; m&egrave;o con sau sinh 3 tuần (21-23 ng&agrave;y tuổi). L&uacute;c n&agrave;y giun c&oacute; thể đẻ trứng trong ruột ch&oacute; m&egrave;o con do đ&oacute; cần phải tẩy giun, s&aacute;n trước khi trứng của ch&uacute;ng lan ra m&ocirc;i trường b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>Sau lần đầu ti&ecirc;n: Cứ 2 tuần 1 lần tẩy giun cho ch&oacute; m&egrave;o cho tới khi được 3 th&aacute;ng tuổi.</p>\r\n\r\n<p>Sau 3 th&aacute;ng tuổi: Mỗi th&aacute;ng 1 lần từ khi 3 th&aacute;ng cho tới 6 th&aacute;ng tuổi.</p>\r\n\r\n<p>Ch&oacute; m&egrave;o tr&ecirc;n 6 th&aacute;ng tuổi: 2-3 th&aacute;ng tẩy 1 lần.</p>\r\n\r\n<p>Ch&oacute; m&egrave;o tr&ecirc;n 1 năm tuổi, ch&oacute; m&egrave;o trưởng th&agrave;nh: 1 năm tẩy 1-2 lần. T&ugrave;y theo m&ocirc;i trường sống v&agrave; điều kiện vệ sinh c&oacute; thể tẩy 3-4 lần 1 năm.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/1703_benh-san-cho-tri-o-dau-8862.jpg\" style=\"height:400px; width:559px\" /></p>\r\n\r\n<p>- Đối với ch&oacute; m&egrave;o mẹ mang thai:</p>\r\n\r\n<p>Ch&oacute; m&egrave;o mẹ nhiễm giun s&aacute;n sẽ l&acirc;y truyền sang con qua nhau thai v&agrave; sữa v&igrave; vậy đặc biệt lưu &yacute; tiến h&agrave;nh thật cẩn thận cho ch&oacute; m&egrave;o mẹ.</p>\r\n\r\n<p>Tẩy giun cho ch&oacute; m&egrave;o c&aacute;i sinh sản trước khi phối giống 1 th&aacute;ng.</p>\r\n\r\n<p>Tẩy một lần cho ch&oacute; m&egrave;o mẹ trước khi sinh khoảng 1 -2 tuần.</p>\r\n\r\n<p>Ch&oacute; m&egrave;o mẹ đang cho con b&uacute; tẩy c&ugrave;ng với ch&oacute; m&egrave;o con.</p>\r\n\r\n<p>Tẩy giun cho ch&oacute; m&egrave;o mẹ đang mang thai v&agrave; cho con b&uacute; phải hết sức lưu &yacute; chọn c&aacute;c sản phẩm tẩy giun d&agrave;nh ri&ecirc;ng cho ch&oacute; m&egrave;o mang thai.</p>\r\n\r\n<p>- Đối với ch&oacute; m&egrave;o đ&atilde; nhiễm giun s&aacute;n: Tiến h&agrave;nh tẩy giun s&aacute;n ngay lập tức khi ph&aacute;t hiện bị ch&oacute; m&egrave;o bị nhiễm giun v&agrave; tẩy lại sau 2 tuần. Ch&uacute; &yacute; quan s&aacute;t v&agrave; theo d&otilde;i ph&acirc;n của ch&oacute; m&egrave;o để đ&aacute;nh gi&aacute; hiệu quả của việc tẩy giun.</p>\r\n\r\n<p>- Đối với ch&oacute; m&egrave;o mới mua về: Cũng tiến h&agrave;nh tẩy giun như trường hợp ch&oacute; m&egrave;o bị nhiễm giun s&aacute;n. Tẩy ngay lập tức v&agrave; lặp lại sau 2 tuần. Sau đ&oacute; thực hiện tẩy giun theo lịch tr&igrave;nh tẩy giun theo độ tuổi.</p>\r\n\r\n<p><strong><a href=\"https://www.petcity.vn/thuoc-tri-noi-ngoai-ky-sinh-trung-144.html\" target=\"_blank\">2. Một số loại thuốc tẩy giun tốt hiện nay:</a></strong></p>\r\n\r\n<p>Tr&ecirc;n thị trường hiện nay c&oacute; rất nhiều loại thuốc tẩy giun s&aacute;n kh&aacute;c nhau, nhập khẩu c&oacute;, sản xuất trong nước c&oacute;. Nh&igrave;n chung th&igrave; c&aacute;c loại thuốc tẩy giun hầu hết đều c&oacute; th&agrave;nh phần ch&iacute;nh&nbsp;Mebendazol tuy nhi&ecirc;n c&oacute; một số loại tẩy c&aacute;c loại giun s&aacute;n đặc biệt hơn sẽ c&oacute; th&ecirc;m những th&agrave;nh phần v&agrave; c&ocirc;ng dụng cũng kh&aacute;c.</p>\r\n\r\n<p>-&nbsp;Thuốc tẩy giun s&aacute;n Bio Rantel&nbsp;</p>\r\n\r\n<p>-&nbsp;Thuốc tẩy giun Merantel - L / S</p>\r\n\r\n<p>-&nbsp;Thuốc giun tim Heart Cover dạng vi&ecirc;n cho ch&oacute; nhỏ 1-22kg</p>\r\n\r\n<p>- Thuốc tẩy giun cho ch&oacute;&nbsp;Bayer Drontal dạng vi&ecirc;n cho ch&oacute; lớn/ dạng nước cho ch&oacute; con/ dạng vi&ecirc;n cho m&egrave;o</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/1703_7f8f3ce0432dde7fd8d87c1e3aef8312.jpg\" style=\"height:400px; width:400px\" /></p>\r\n\r\n<p>- Thuốc tẩy giun cho ch&oacute;&nbsp;Virbac Endogard 10- an to&agrave;n cho ch&oacute; mang thai.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.petcity.vn/media/news/1703_thuoc_so_giun_cho_cho_virbac_endogard_900x900_1024x1024.jpg\" style=\"height:400px; width:400px\" /></p>\r\n\r\n<p><strong>3. C&aacute;c lưu &yacute; khi tẩy giun s&aacute;n cho ch&oacute; m&egrave;o tại nh&agrave;:</strong></p>\r\n\r\n<p>- Nếu s&aacute;ng ng&agrave;y h&ocirc;m sau định tẩy giun th&igrave; buổi tối h&ocirc;m trước cho ăn &iacute;t hơn so với mọi lần.</p>\r\n\r\n<p>- Khi tẩy chỉ n&ecirc;n cho ăn &iacute;t th&ocirc;i v&agrave; thức ăn ngon hơn mọi ng&agrave;y (nửa khẩu phần ăn như mọi khi).</p>\r\n\r\n<p>- C&aacute;ch tẩy giun ch&oacute; m&egrave;o: C&oacute; thể t&aacute;n thuốc thật nhỏ rồi trộn v&agrave;o thức ăn cho ch&oacute; m&egrave;o nhỏ hoặc kẹp vi&ecirc;n thuốc v&agrave;o giữa miếng thịt, gan v&agrave; cho ăn đối với ch&oacute; m&egrave;o ph&agrave;m ăn. C&aacute;ch kh&aacute;c l&agrave; d&ugrave;ng tay b&oacute;p miệng, cho ch&oacute; ngửa cổ, đặt thuốc v&agrave;o lưỡi, đẩy v&agrave;o b&ecirc;n trong, cho ch&oacute; ngậm miệng lại, vuốt cổ.</p>\r\n\r\n<p>- T&ugrave;y theo m&ocirc;i trường vệ sinh ăn, ở sạch hay bẩn m&agrave; điều chỉnh lịch tẩy cho hợp l&yacute;.&nbsp;</p>\r\n\r\n<p>- Kh&ocirc;ng n&ecirc;n tẩy giun s&aacute;n khi ch&oacute; đang mắc bệnh hoặc thời tiết n&oacute;ng qu&aacute;.</p>\r\n\r\n<p>- Sau khi tẩy n&ecirc;n cho ch&oacute; m&egrave;o uống men ti&ecirc;u h&oacute;a để hỗ trợ hệ ti&ecirc;u h&oacute;a, tốt cho đường ruột hơn.</p>\r\n\r\n<p>- Thực hiện vệ sinh chuồng nu&ocirc;i v&agrave; nơi chăn thả ch&oacute; m&egrave;o ph&ograve;ng ngừa t&aacute;i nhiễm giun s&aacute;n.</p>\r\n\r\n<p>- Hạn chế trẻ em tiếp x&uacute;c với ch&oacute;, sau đ&oacute; phải rửa tay sạch sẽ để hạn chế l&acirc;y nhiễm bệnh giun m&oacute;c.</p>\r\n\r\n<p>- Cho ch&oacute; m&egrave;o d&ugrave;ng thuốc tẩy giun đ&uacute;ng với hướng dẫn của nahf sản xuất, kh&ocirc;ng cho uống qu&aacute; liều sẽ dẫn đến ngộ độc thậm ch&iacute; tử vong.</p>\r\n\r\n<p>- Tẩy giun định k&igrave; cho ch&oacute; m&egrave;o để đảm bảo sức khỏe cho ch&uacute;ng v&agrave; cho ch&iacute;nh bản th&acirc;n người nu&ocirc;i, tr&aacute;nh việc nhiễm c&aacute;c loại giun s&aacute;n từ ch&oacute; m&egrave;o sang người.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y Petcity.vn đ&atilde; chia sẻ c&ugrave;ng bạn c&aacute;c kiến thức cơ bản về tẩy giun s&aacute;n cho ch&oacute; m&egrave;o. Ch&uacute;ng ta c&oacute; thể &aacute;p dụng tại nh&agrave; để c&oacute; thể theo d&otilde;i tốt sức khỏe ch&oacute; m&egrave;o nh&agrave; bạn m&agrave; kh&ocirc;ng cần đưa đến th&uacute; y.</p>', '/images/article/blog-6.jpg', 'featured', '2021-03-30 12:41:43', NULL, '2021-03-30 12:41:43', 'admin', '2021-04-13 08:31:15', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Màu', 'active', '1', '2021/03/30 12:41:43', 'admin', '2021-04-12 15:12:21', 'admin'),
(2, 'Kích cỡ', 'active', '2', '2021-03-27 12:41:43', 'admin', '2021-04-08 15:24:04', 'admin'),
(3, 'Chiều dài', 'active', '3', '2021-03-12 12:41:43', 'admin', '2021-04-08 15:34:35', 'admin'),
(4, 'Thương hiệu', 'active', '6', '2021-03-05 12:41:43', 'admin', '2021-04-13 23:16:23', 'admin'),
(5, 'Modern Shadow', 'inactive', '8', '2021-04-08 15:40:04', 'admin', '2021-04-19 09:52:06', 'admin'),
(6, 'Tags', 'active', '1', '2021-04-10 15:33:08', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `attribute_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `order_code`, `product_id`, `quantity`, `price`, `attribute_id`, `attribute_value`, `created`) VALUES
(1, 'vn6SuWF', 29, 3, 231000, '[1,2]', '[\"vàng\",\"rất lớn\"]', '2021-04-03 12:29:33'),
(2, 'vn6SuWF', 29, 2, 154000, '[1,2]', '[\"xanh\",\"vừa\"]', '2021-04-03 12:29:33'),
(3, 'vn6SuWF', 30, 1, 36000, '[2]', '[\"vừa\"]', '2021-04-03 12:29:33'),
(4, 'vn6SuWF', 28, 4, 0, '[1,2]', '[\"trắng\",\"vừa\"]', '2021-04-03 12:29:33'),
(5, 'lYk8Zxx', 29, 2, 154000, '[1,2]', '[\"vàng\",\"lớn\"]', '2021-04-03 12:32:14'),
(6, 'lYk8Zxx', 29, 4, 308000, '[1,2]', '[\"xanh\",\"rất lớn\"]', '2021-04-03 12:32:14'),
(7, 'lYk8Zxx', 30, 1, 36000, '[2]', '[\"nhỏ\"]', '2021-04-03 12:32:14'),
(8, 'lYk8Zxx', 28, 5, 10000, '[1,2]', '[\"trắng\",\"vừa\"]', '2021-04-03 12:32:14'),
(9, 'UZopy3k', 30, 1, 36000, '[2]', '[\"vừa\"]', '2021-04-03 12:36:45'),
(10, 'UZopy3k', 29, 2, 154000, '[1,2]', '[\"trắng\",\"rất lớn\"]', '2021-04-03 12:36:45'),
(11, 'UZopy3k', 29, 4, 308000, '[1,2]', '[\"xanh\",\"lớn\"]', '2021-04-03 12:36:45'),
(12, 'uJ4rAKC', 30, 1, 36000, '[2]', '[\"nhỏ\"]', '2021-04-03 12:39:05'),
(13, 'uJ4rAKC', 29, 2, 154000, '[1,2]', '[\"trắng\",\"lớn\"]', '2021-04-03 12:39:05'),
(14, 'uJ4rAKC', 29, 3, 231000, '[1,2]', '[\"vàng\",\"rất lớn\"]', '2021-04-03 12:39:05'),
(15, 'kzwn2A8', 28, 4, 8000, '[1,2]', '[\"đỏ\",\"rất lớn\"]', '2021-04-04 23:40:19'),
(16, 'kzwn2A8', 29, 1, 77000, '[1,2]', '[\"trắng\",\"rất lớn\"]', '2021-04-04 23:40:19'),
(17, 'kzwn2A8', 28, 3, 6000, '[1,2]', '[\"trắng\",\"nhỏ\"]', '2021-04-04 23:40:19'),
(18, 'GrEoC9I', 28, 1, 2000, '[1,2]', '[\"đỏ\",\"nhỏ\"]', '2021-04-06 15:04:40'),
(19, 'GrEoC9I', 27, 2, 66000, '[1,2]', '[\"đỏ\",\"vừa\"]', '2021-04-06 15:04:40'),
(20, 'f6ElB9K', 28, 1, 2000, '[1,2]', '[\"đỏ\",\"nhỏ\"]', '2021-04-06 17:14:47'),
(21, 'f6ElB9K', 29, 2, 154000, '[1,2]', '[\"trắng\",\"rất lớn\"]', '2021-04-06 17:14:47'),
(22, 'WW0kf3b', 29, 3, 231000, '[1,2]', '[\"trắng\",\"lớn\"]', '2021-04-06 17:21:16'),
(23, 'BCh1VEn', 16, 5, 10000, '[1,2,3]', '[\"đỏ\",\"vừa\",\"100 cm\"]', '2021-04-15 08:45:41'),
(24, 'BCh1VEn', 25, 1, 2000, '[1,2]', '[\"đỏ\",\"vừa\"]', '2021-04-15 08:45:41'),
(25, 'MAVliI4', 16, 3, 6000, '[1,2,3]', '[\"đỏ\",\"lớn\",\"100 cm\"]', '2021-04-15 09:08:17'),
(26, 'MAVliI4', 29, 4, 340000, '[1,2,3,6]', '[\"trắng\",\"tag 1\",\"lớn\",\"80 cm\"]', '2021-04-15 09:08:17'),
(27, 'BXFUGKq', 16, 3, 6000, '[1,2,3]', '[\"đỏ\",\"lớn\",\"100 cm\"]', '2021-04-15 09:10:33'),
(28, 'BXFUGKq', 29, 4, 340000, '[1,2,3,6]', '[\"trắng\",\"tag 1\",\"lớn\",\"80 cm\"]', '2021-04-15 09:10:33'),
(29, 'OjxPrsH', 16, 2, 4000, '[1,2,3]', '[\"trắng\",\"lớn\",\"80 cm\"]', '2021-04-15 09:35:01'),
(30, '5LilRbS', 16, 5, 10000, '[1,2,3]', '[\"đỏ\",\"lớn\",\"80 cm\"]', '2021-04-15 09:48:20'),
(31, '5LilRbS', 25, 1, 2000, '[1,2]', '[\"xanh\",\"nhỏ\"]', '2021-04-15 09:48:20'),
(32, '5LilRbS', 29, 6, 510000, '[1,2,3,6]', '[\"trắng\",\"tag 1\",\"rất lớn\",\"80 cm\"]', '2021-04-15 09:48:20'),
(33, 'tSU3FHV', 5, 3, 165000, '[1,2]', '[\"xanh\",\"lớn\"]', '2021-04-15 15:20:56'),
(34, 'gWFvTYp', 1, 3, 6000, '[1,2,4]', '[\"xanh\",\"vừa\",\"Brand 2\"]', '2021-04-16 11:53:53'),
(35, 'DhKISDF', 16, 3, 6000, '[1,2,3]', '[\"trắng\",\"vừa\",\"100 cm\"]', '2021-05-06 08:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `status`, `slug`, `name`, `thumb`, `is_home`, `display`, `_lft`, `_rgt`, `parent_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'active', 'root', 'root', '/images/category/cate1.jpg', 'yes', 'grid', 1, 30, 0, '2021-03-29 08:57:11', 'admin', NULL, NULL),
(2, 'active', 'dogs-food', 'dogs food', '/images/category/cate1.jpg', 'yes', 'list', 2, 13, 1, '2021-03-29 08:57:11', 'admin', '2021-04-08 10:55:52', 'admin'),
(3, 'active', 'cats-food', 'cats food', '/images/category/cate2.jpg', 'yes', 'list', 14, 19, 1, '2021-03-29 08:57:11', 'admin', NULL, 'admin'),
(4, 'active', 'eggs', 'Eggs', '/images/category/cate1.jpg', 'yes', 'grid', 9, 12, 2, '2021-03-29 08:57:11', 'admin', NULL, 'admin'),
(5, 'active', 'carrots', 'Carrots', '/images/category/cate1.jpg', 'yes', 'list', 3, 8, 2, '2021-03-29 08:57:11', 'admin', '2021-04-08 10:52:19', 'admin'),
(6, 'active', 'fishs-food', 'fishs food', '/images/category/cate3.jpg', 'no', 'grid', 20, 25, 1, '2021-03-29 08:57:11', 'admin', '2021-04-08 10:33:59', 'admin'),
(7, 'active', 'meat', 'Meat', '/images/category/cate1.jpg', 'yes', 'list', 15, 16, 3, '2021-03-29 08:57:11', 'admin', NULL, NULL),
(8, 'active', 'cheese', 'Cheese', '/images/category/cate1.jpg', 'yes', 'grid', 17, 18, 3, '2021-03-29 08:57:11', 'admin', '2021-04-04 00:37:35', 'vanduc'),
(9, 'active', 'rice', 'Rice', '/images/category/cate1.jpg', 'no', 'grid', 21, 22, 6, '2021-03-29 08:57:11', 'admin', NULL, NULL),
(10, 'active', 'veggies', 'Veggies', '/images/category/cate1.jpg', 'yes', 'grid', 23, 24, 6, '2021-03-29 08:57:11', 'admin', NULL, NULL),
(11, 'active', 'test-form', 'test Form', '/images/category/xc4eh2bi.jpg', NULL, NULL, 10, 11, 4, NULL, NULL, NULL, NULL),
(13, 'active', 'vita-mas', 'vita mask', '/images/avatar/ava1.jpg', 'no', 'list', 4, 7, 5, '2021-04-08 11:13:57', 'admin', '2021-05-14 09:38:44', 'admin'),
(14, 'inactive', 'test-form-d', 'test Form-d', NULL, 'yes', 'list', 26, 29, 1, '2021-04-11 20:45:14', 'admin', '2021-04-13 22:55:56', 'admin'),
(15, 'active', 'vita-mask-2uy', 'vita mask 2uy', NULL, 'yes', 'list', 27, 28, 14, '2021-04-11 20:45:39', 'admin', NULL, NULL),
(16, 'active', 'vita-mask-2', 'vita mask 2', NULL, 'yes', 'list', 5, 6, 13, '2021-05-14 09:48:13', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `star` int(11) NOT NULL DEFAULT 5,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `star`, `message`, `ip`, `name`, `email`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 10, 2, 'Excepturi sunt dolorem ab.', '192.168.1.1', 'Prof. Garnett Bahringer Sr.', 'oturcotte@jaskolski.info', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(2, 4, 2, 'Aperiam quis enim voluptate impedit reprehenderit fuga ex qui.', '192.168.1.1', 'Bart Zulauf II', 'ehuel@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(3, 2, 3, 'Odit at dolorem illum eos error qui.', '192.168.1.1', 'Kristin Douglas', 'frederick.feest@herman.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(4, 19, 2, 'Provident quam ullam eum nihil quidem debitis.', '192.168.1.1', 'Mr. Jettie Boehm Sr.', 'shand@morar.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(5, 3, 1, 'Et error rerum nesciunt animi.', '192.168.1.1', 'Ms. Loraine Hayes', 'huel.eloisa@emmerich.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(6, 11, 4, 'Velit voluptatum blanditiis et dolor quo veritatis.', '192.168.1.1', 'Prof. Luther Wintheiser Sr.', 'klebsack@yahoo.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(7, 11, 2, 'Rem corrupti optio quia expedita consequatur recusandae.', '192.168.1.1', 'Luis Wuckert', 'strosin.janiya@bernier.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(8, 13, 1, 'Id dolorem quasi aperiam vero veniam fugit quisquam.', '192.168.1.1', 'Prof. Kamille Hackett II', 'elouise98@spencer.biz', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(9, 10, 2, 'Eum exercitationem modi accusantium placeat magni.', '192.168.1.1', 'Beaulah Gottlieb', 'wilkinson.lucius@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(10, 18, 5, 'Et alias cumque nobis a expedita.', '192.168.1.1', 'Ms. Raina Franecki', 'brandt78@hotmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(11, 9, 1, 'Eos nemo error corporis earum accusantium quisquam minima excepturi.', '192.168.1.1', 'Bud Connelly III', 'jaskolski.fletcher@lakin.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(12, 13, 1, 'Atque aut magni iure voluptas.', '192.168.1.1', 'Mr. Houston Howe IV', 'dgaylord@hermann.net', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(13, 14, 4, 'Repellat occaecati nobis rem maiores ullam necessitatibus incidunt.', '192.168.1.1', 'Miss Aileen Howe', 'xdonnelly@willms.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(14, 20, 3, 'Sed occaecati sapiente assumenda.', '192.168.1.1', 'Mr. Ford Jast', 'alec69@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(15, 20, 5, 'Ducimus et ut facilis error est at delectus.', '192.168.1.1', 'Dr. Isaias Bayer', 'skyla74@kling.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(16, 3, 4, 'Perferendis qui animi ut explicabo eius ex.', '192.168.1.1', 'Maximillia Vandervort', 'mueller.vickie@ward.net', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(17, 15, 5, 'Facere porro ullam quia in.', '192.168.1.1', 'Ruby Bechtelar', 'gberge@gmail.com', 'inactive', '2021-03-29 08:57:12', NULL, '2021-04-09 10:42:04', 'admin'),
(18, 12, 5, 'Tenetur iste quo eveniet et.', '192.168.1.1', 'Prof. Joaquin Lakin', 'hardy.mills@ebert.com', 'inactive', '2021-03-29 08:57:12', NULL, '2021-04-09 10:42:02', 'admin'),
(19, 19, 4, 'Nihil ratione placeat sed quae officia.', '192.168.1.1', 'Destiney Wiegand', 'schroeder.marina@maggio.info', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(20, 10, 2, 'Hic consectetur laboriosam repudiandae earum iste omnis optio.', '192.168.1.1', 'Prof. Jaeden Bartoletti Jr.', 'katelynn77@erdman.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(21, 13, 4, 'Rerum minima quisquam in odit est.', '192.168.1.1', 'Deondre Hermann', 'jacques20@yahoo.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(22, 15, 1, 'Non et cupiditate reprehenderit optio.', '192.168.1.1', 'Ike Kemmer IV', 'haylee.grant@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(23, 9, 4, 'Nostrum mollitia dolores dignissimos cumque.', '192.168.1.1', 'Prof. Austin Hamill DVM', 'johan33@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(24, 2, 2, 'Ut et eos debitis ut facere.', '192.168.1.1', 'Joy Dietrich', 'torrey.waters@yahoo.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(25, 3, 4, 'Facilis deserunt possimus in.', '192.168.1.1', 'Ronny Koelpin', 'hessel.kane@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(26, 7, 4, 'Et quo deleniti veritatis dolorum.', '192.168.1.1', 'Paolo Jerde', 'jeffery19@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(27, 14, 2, 'Sed rerum non eos non consequuntur quia.', '192.168.1.1', 'Mr. Amos Abshire', 'adele85@yahoo.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(28, 7, 3, 'Enim ducimus laboriosam ullam explicabo qui est non.', '192.168.1.1', 'Dr. Camron Considine', 'raynor.mack@yahoo.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(29, 20, 4, 'Vel molestiae et voluptas.', '192.168.1.1', 'Alyce Lesch', 'deon.grant@dibbert.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(30, 20, 4, 'Non ut distinctio adipisci ducimus earum eum.', '192.168.1.1', 'Marcelino Morar Sr.', 'fkuphal@hotmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(34, 29, 1, 'Non ut distinctio adipisci ducimus earum eum.', '192.168.1.1', 'Marcelino Morar Sr.', 'fkuphal@hotmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(35, 1, 3, 'Sed occaecati sapiente assumenda.', '192.168.1.1', 'Mr. Ford Jast', 'alec69@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(36, 1, 5, 'Ducimus et ut facilis error est at delectus.', '192.168.1.1', 'Dr. Isaias Bayer', 'skyla74@kling.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(37, 1, 4, 'Vel molestiae et voluptas.', '192.168.1.1', 'Alyce Lesch', 'deon.grant@dibbert.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(38, 1, 4, 'Non ut distinctio adipisci ducimus earum eum.', '192.168.1.1', 'Marcelino Morar Sr.', 'fkuphal@hotmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(39, 1, 3, 'Sed occaecati sapiente assumenda.', '192.168.1.1', 'Mr. Ford Jast', 'alec69@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(40, 30, 5, 'Ducimus et ut facilis error est at delectus.', '192.168.1.1', 'Dr. Isaias Bayer', 'skyla74@kling.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(41, 30, 4, 'Vel molestiae et voluptas.', '192.168.1.1', 'Alyce Lesch', 'deon.grant@dibbert.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(42, 30, 4, 'Non ut distinctio adipisci ducimus earum eum.', '192.168.1.1', 'Marcelino Morar Sr.', 'fkuphal@hotmail.com', 'inactive', '2021-03-29 08:57:12', NULL, '2021-04-09 11:02:14', 'admin'),
(43, 28, 3, 'Sed occaecati sapiente assumenda.', '192.168.1.1', 'Mr. Ford Jast', 'alec69@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(44, 28, 5, 'Ducimus et ut facilis error est at delectus.', '192.168.1.1', 'Dr. Isaias Bayer', 'skyla74@kling.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(45, 28, 4, 'Vel molestiae et voluptas.', '192.168.1.1', 'Alyce Lesch', 'deon.grant@dibbert.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(46, 28, 4, 'Non ut distinctio adipisci ducimus earum eum.', '192.168.1.1', 'Marcelino Morar Sr.', 'fkuphal@hotmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(47, 28, 3, 'Sed occaecati sapiente assumenda.', '192.168.1.1', 'Mr. Ford Jast', 'alec69@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(48, 27, 3, 'Sed occaecati sapiente assumenda.', '192.168.1.1', 'Mr. Ford Jast', 'alec69@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(49, 27, 5, 'Ducimus et ut facilis error est at delectus.', '192.168.1.1', 'Dr. Isaias Bayer', 'skyla74@kling.com', 'inactive', '2021-03-29 08:57:12', NULL, '2021-04-09 11:02:12', 'admin'),
(50, 27, 4, 'Vel molestiae et voluptas.', '192.168.1.1', 'Alyce Lesch', 'deon.grant@dibbert.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(51, 27, 4, 'Non ut distinctio adipisci ducimus earum eum.', '192.168.1.1', 'Marcelino Morar Sr.', 'fkuphal@hotmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(52, 27, 3, 'Sed occaecati sapiente assumenda.', '192.168.1.1', 'Mr. Ford Jast', 'alec69@gmail.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(53, 0, 5, '', '', '', '', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(54, 29, 3, 'Ducimus et ut facilis error est at delectus.', '192.168.1.1', 'Dr. Isaias Bayer', 'skyla74@kling.com', 'inactive', '2021-03-29 08:57:12', NULL, '2021-04-09 11:02:11', 'admin'),
(55, 29, 5, 'Vel molestiae et voluptas.', '192.168.1.1', 'Alyce Lesch', 'deon.grant@dibbert.com', 'active', '2021-03-29 08:57:12', NULL, NULL, NULL),
(61, 30, 1, '30  comment', '127.0.0.1', 'admin', 'admin@gmail.com', 'active', '2021-03-30 17:43:49', NULL, NULL, NULL),
(62, 27, 5, '123 alo quá tuyệt vời !!', '127.0.0.1', 'duc', 'vuducsaobien95@gmail.com', 'active', '2021-03-31 01:42:48', NULL, '2021-04-09 12:14:35', 'admin'),
(63, 1, 4, '<p>Sản phẩm rất hay, c&aacute;c mẹ n&ecirc;n sử dụng nh&aacute;.</p>', NULL, 'vita mask', 'vuducsaobien95@gmail.com', 'active', '2021-04-09 15:02:35', 'admin', NULL, NULL),
(64, 1, 5, '<p><em>Mẫu</em>&nbsp;phiếu khảo s&aacute;t lấy &yacute; kiến&nbsp;<em>kh&aacute;ch h&agrave;ng</em>,</p>', NULL, 'vita mask', 'vuducsaobien95@gmail.com', 'active', '2021-04-09 15:29:07', 'admin', NULL, NULL),
(65, 1, 4, '<p><em>Mẫu</em>&nbsp;phiếu khảo s&aacute;t lấy &yacute; kiến&nbsp;<em>kh&aacute;ch h&agrave;ng</em>,</p>', NULL, 'vita mask', 'vuducsaobien95@gmail.com', 'active', '2021/03/28 15:29:39', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment_article`
--

CREATE TABLE `comment_article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_article`
--

INSERT INTO `comment_article` (`id`, `article_id`, `message`, `name`, `status`, `_lft`, `_rgt`, `parent_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 'rt', 'spo', 'active', 0, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `status`, `email`, `subject`, `message`, `ip`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'john', 'active', 'abc@gmail.com', 'chua nghi ra', 'chua nghi ra', '192.168.1.1', '2021-04-14 07:28:52', 'admin', '2021-04-15 13:50:02', 'admin'),
(2, 'vita mask', 'active', 'vuducsaobien95@gmail.com', 'erwrw', 'sdad', '127.0.0.1', '2021-04-02 14:19:59', NULL, NULL, NULL),
(3, 'vita mask', 'active', 'vuducsaobien95@gmail.com', 'erwrw', 'sdad', '127.0.0.1', '2021-04-02 14:21:40', NULL, NULL, NULL),
(4, 'Modern Shadow', 'active', 'vuducsaobien95@gmail.com', 'erwrw', 'trhtyrt', '127.0.0.1', '2021-04-02 14:30:12', NULL, NULL, NULL),
(5, 'Modern Shadow', 'active', 'vuducsaobien95@gmail.com', 'erwrw', 'trhtyrt', '127.0.0.1', '2021-04-02 14:30:58', NULL, NULL, NULL),
(6, 'Modern Shadow', 'active', 'vuducsaobien95@gmail.com', 'erwrw', 'trhtyrt', '127.0.0.1', '2021-04-02 14:32:32', NULL, NULL, NULL),
(7, 'Modern Shadow', 'active', 'vuducsaobien95@gmail.com', 'erwrw', 'trhtyrt', '127.0.0.1', '2021-04-02 14:34:34', NULL, '2021-04-15 14:15:07', 'admin'),
(8, 'Modern Shadow', 'active', 'vuducsaobien95@gmail.com', 'erwrw', 'trhtyrt', '127.0.0.1', '2021-04-02 14:47:54', NULL, '2021-04-15 14:15:03', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `controller`
--

CREATE TABLE `controller` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_friendly` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `controller`
--

INSERT INTO `controller` (`id`, `name_route`, `name_friendly`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'product', 'Sản phẩm', 'active', '2021-03-30 12:41:43', 'admin', '2021-04-19 11:37:20', 'admin'),
(2, 'dashboard', 'Trang Chủ', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin'),
(3, 'contact', 'Liên Hệ', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin'),
(4, 'group', 'Nhóm', 'inactive', '2021-03-30 12:41:43', 'admin', '2021-06-20 20:42:46', 'admin'),
(5, 'user', 'User', 'active', '2021-03-30 12:41:43', 'admin', '2021-06-21 10:06:03', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `ship` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_love` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_watched` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `status`, `order_code`, `payment_id`, `ship`, `quantity`, `amount`, `discount`, `name`, `email`, `phone`, `address`, `ip`, `product_love`, `product_watched`, `created`, `modified`, `modified_by`) VALUES
(1, 'inactive', 'vn6SuWF', 1, NULL, 10, 421000, NULL, 'Vũ Văn Đức', 'vuducsaobien95@gmail.com', '362344174', 'Long Bình Tân, Biên Hòa, Đồng Nai', '127.0.0.1', NULL, NULL, '2021-04-03 12:29:33', NULL, NULL),
(2, 'inactive', 'lYk8Zxx', 1, NULL, 12, 508000, NULL, 'Vũ Văn Đức', 'vuducsaobien95@gmail.com', '362344174', 'Long Bình Tân, Biên Hòa, Đồng Nai', '127.0.0.1', NULL, NULL, '2021-04-03 12:32:14', NULL, NULL),
(3, 'inactive', 'UZopy3k', 1, NULL, 7, 498000, NULL, 'Vũ Văn Đức', 'vuducsaobien95@gmail.com', '362344174', 'Long Bình Tân, Biên Hòa, Đồng Nai', '127.0.0.1', NULL, NULL, '2021-04-03 12:36:45', NULL, NULL),
(4, 'active', 'uJ4rAKC', 1, NULL, 6, 421000, NULL, 'Vũ Văn Đức', 'vuducsaobien95@gmail.com', '362344174', 'Long Bình Tân, Biên Hòa, Đồng Nai', '127.0.0.1', NULL, NULL, '2021-04-03 12:39:05', '2021-04-05 20:35:54', 'admin'),
(5, 'inactive', 'kzwn2A8', 1, NULL, 8, 91000, NULL, 'Vũ Văn Đức', 'vuducsaobien95@gmail.com', '362344174', 'Long Bình Tân, Biên Hòa, Đồng Nai', '127.0.0.1', NULL, NULL, '2021-04-04 23:40:19', '2021-04-05 20:35:50', 'vanduc'),
(6, 'inactive', 'GrEoC9I', 1, NULL, 3, 68000, NULL, 'Nguyễn Văn Admin', 'admin@gmail.com', '989261781', 'Định Quán, Đồng Nai', '127.0.0.1', NULL, NULL, '2021-04-06 15:04:40', NULL, NULL),
(7, 'inactive', 'f6ElB9K', 1, '50000', 3, 156000, NULL, 'Nguyễn Văn Admin', 'admin@gmail.com', '989261781', 'Định Quán, Đồng Nai', '127.0.0.1', NULL, NULL, '2021-04-06 17:14:47', NULL, NULL),
(8, 'inactive', 'WW0kf3b', 1, '10000', 3, 231000, NULL, 'Nguyễn Văn Admin', 'admin@gmail.com', '989261781', 'Định Quán, Đồng Nai', '127.0.0.1', NULL, NULL, '2021-04-06 17:21:16', NULL, NULL),
(9, 'inactive', 'BCh1VEn', 1, '100000', 6, 12000, NULL, 'vita mask', 'vuducsaobien95@gmail.com', '0362344174', '5', '127.0.0.1', NULL, NULL, '2021-04-15 08:45:41', NULL, NULL),
(10, 'inactive', 'MAVliI4', 1, '20000', 7, 346000, NULL, 'Modern Shadow', 'vuducsaobien95@gmail.com', '0362344174', '5', '127.0.0.1', NULL, NULL, '2021-04-15 09:08:17', NULL, NULL),
(11, 'active', 'BXFUGKq', 1, '20000', 7, 346000, NULL, 'Modern Shadow', 'vuducsaobien95@gmail.com', '0362344174', '5', '127.0.0.1', NULL, NULL, '2021-04-15 09:10:33', '2021-04-15 14:11:55', 'admin'),
(12, 'inactive', 'OjxPrsH', 2, '100000', 2, 4000, 1000, 'vita mask', 'vuducsaobien95@gmail.com', '0362344174', '5', '127.0.0.1', NULL, NULL, '2021-04-15 09:35:01', '2021-04-15 14:11:59', 'admin'),
(13, 'active', '5LilRbS', 2, '100000', 12, 522000, 1000, 'vita mask', 'vuducsaobien95@gmail.com', '0362344174', '5', '127.0.0.1', NULL, NULL, '2021-04-15 09:48:20', '2021-04-15 14:20:28', 'admin'),
(14, 'inactive', 'tSU3FHV', 2, '100000', 3, 165000, 1000, 'Modern Shadow', 'vuducsaobien95@gmail.com', '0362344174', '5', '127.0.0.1', NULL, NULL, '2021-04-15 15:20:56', NULL, NULL),
(15, 'active', 'gWFvTYp', 2, '20000', 3, 6000, 1000, 'Modern Shadow', 'huy@gmail.com', '0362344174', 'Rachj Gia Bac lieu', '127.0.0.1', NULL, NULL, '2021-04-16 11:53:53', '2021-04-26 15:21:42', 'admin'),
(16, 'inactive', 'DhKISDF', 2, '100000', 3, 6000, 0, 'vuvanduc', 'vuducsaobien95@gmail.com', '0362344174', '5', '127.0.0.1', NULL, NULL, '2021-05-06 08:47:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_times` int(11) DEFAULT NULL,
  `times_used` int(11) DEFAULT 0,
  `price` int(11) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `min_price` int(11) DEFAULT 0,
  `max_price` int(11) DEFAULT 0,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `status`, `code`, `total_times`, `times_used`, `price`, `percent`, `min_price`, `max_price`, `date_start`, `date_end`, `created_by`, `modified`, `modified_by`, `created`) VALUES
(1, 'active', 'BIRTHDAY-1', 1000, 3, NULL, 10, 50000, 150000, '2021-04-06 05:15:23', '2021-04-16 08:22:09', 'admin', NULL, NULL, '2021-04-07 23:47:40'),
(2, 'active', 'BIRTHDAY-2', 5000, 2, 10000, NULL, 100000, 200000, '2021-04-12 15:32:13', '2021-04-22 07:17:42', 'admin', NULL, NULL, '2021-04-07 23:47:40'),
(3, 'inactive', 'BIRTHDAY-3', 100, 1, NULL, 20, 5000, 50000, '2021-04-17 15:32:13', '2021-05-22 07:17:42', 'admin', NULL, NULL, '2021-04-07 23:47:40'),
(4, 'active', 'new-2', 50, 3, 50000, NULL, 500000, 1000000, '2021-04-12 15:32:13', '2021-04-22 07:17:42', 'admin', NULL, NULL, '2021-04-07 23:47:40'),
(5, 'active', 'NEW-3', 200, 2, 100000, NULL, 1000000, 2000000, '2021-04-17 15:32:13', '2021-05-22 07:17:42', 'admin', NULL, NULL, '2021-04-07 23:47:40'),
(6, 'active', 'TEST-01', 10, 0, NULL, 6, 100000, 300000, '2021-04-07 23:40:40', '2021-04-07 23:40:40', 'admin', NULL, NULL, '2021-04-07 23:47:40'),
(7, 'active', 'TEST-02', 0, 0, 12000, NULL, 100000, 400000, '2021-04-07 23:44:19', '2021-04-07 23:44:19', 'admin', '2021-04-08 15:55:08', 'admin', '2021-04-07 23:47:40'),
(8, 'active', '673', 2, 0, NULL, 10, 2000, 1000000, '2021-04-07 23:45:30', '2021-04-22 23:45:30', 'admin', NULL, NULL, '2021-04-07 23:47:40'),
(9, 'active', 'TEST-04', 3, 1, 12000, NULL, 0, 5000, '2020-04-20 23:48:43', '2020-04-20 23:48:43', 'admin', '2021-04-08', 'admin', '2021-04-07 00:00:00'),
(10, 'active', '67', 50, 5, 12000, NULL, 0, 0, '2008-04-20 00:06:22', '2008-04-20 00:06:22', 'admin', '2021-04-08 21:00:24', 'admin', '2021-04-08 00:00:00'),
(13, 'active', '6', 8, 0, NULL, 6, 1000, 1000000, '2008-04-20 23:49:33', '2021-04-24 23:44:19', 'admin', '2021-04-08 23:57:18', 'admin', '2021-04-08 23:50:06'),
(14, 'active', '672', 80, 37, 1000, NULL, 1000, 2000000, '2021-04-13 00:00:00', '2021-07-23 00:00:00', 'admin', '2021-04-20 14:04:21', 'admin', '2021-04-08 23:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `ordering` int(3) DEFAULT 1,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `name`, `content`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Tôi muốn làm đại lý của Pet Shop Marten có được không?', '<p>-&nbsp;Pet Shop Martenph&aacute;t triển theo hướng b&aacute;n lẻ đến người ti&ecirc;u d&ugrave;ng B2C, kh&ocirc;ng c&oacute; ch&iacute;nh s&aacute;ch b&aacute;n sỉ hay đại l&yacute;.</p>', 'active', 1, NULL, NULL, '2021-04-12 22:29:19', 'admin'),
(2, 'Có cửa hàng / chi nhánh nào khác ngoài TP Hồ Chí Minh không?', '<p>- Kh&ocirc;ng.</p>', 'active', 2, NULL, NULL, NULL, NULL),
(3, 'Có nhận thu mua lại sản phẩm hay ký gửi sản phẩm không?', '<p>- Kh&ocirc;ng.</p>', 'inactive', 3, NULL, NULL, '2021-04-12 22:29:00', 'admin'),
(4, 'Pet Shop Marten có nhận đặt sản phẩm theo yêu cầu (hàng order) không?', '<p>- T&ugrave;y mặt h&agrave;ng, vui l&ograve;ng li&ecirc;n hệ trực tiếp.</p>', 'active', 11, NULL, NULL, '2021-04-12 22:27:30', 'admin'),
(5, 'Kiểm tra đơn hàng trước khi thanh toán là kiểm tra những gì?', '<p>- L&agrave; kiểm tra xem h&agrave;ng h&oacute;a c&oacute; đ&uacute;ng như y&ecirc;u cầu đặt h&agrave;ng kh&ocirc;ng, h&oacute;a đơn c&oacute; ch&iacute;nh x&aacute;c kh&ocirc;ng, sản phẩm c&ograve;n date kh&ocirc;ng, t&igrave;nh trạng sản phẩm c&ograve;n mới nguy&ecirc;n tem nh&atilde;n 100% kh&ocirc;ng.</p>', 'active', 13, NULL, NULL, '2021-04-12 22:27:34', 'admin'),
(6, 'Đơn hàng giao đến không đầy đủ / không đúng với những sản phẩm mà tôi đã đặt', '<p>- Li&ecirc;n hệ khiếu nại với Pet Shop Marten với hotline 0933.103.203 để được xử l&yacute; nhanh trong 2 giờ.</p>', 'active', 12, NULL, NULL, '2021-04-12 22:27:32', 'admin'),
(7, 'Tôi nhận được món hàng đúng rổi, nhưng có thêm món hàng mà tôi không hề đặt, cũng không thấy tính tiền.', '<p>- Marten&nbsp;tặng bạn h&agrave;ng mẫu thử hoặc qu&agrave; tặng th&acirc;n thương.</p>', 'active', 16, NULL, NULL, '2021-04-12 22:27:42', 'admin'),
(8, 'Chừng nào sản phẩm hết mới có hàng lại?', '<p>- H&atilde;y để lại số điện thoại, Marten sẽ chủ động th&ocirc;ng b&aacute;o khi c&oacute; h&agrave;ng.</p>', 'active', 4, NULL, NULL, '2021-04-12 22:27:57', 'admin'),
(9, 'Tôi không thể đăng nhập và tạo đơn hàng trên website của Marten được', '<p>- Li&ecirc;n hệ trực tiếp với Marten để được hỗ trợ nhanh.</p>', 'active', 5, NULL, NULL, '2021-04-12 22:27:59', 'admin'),
(10, 'Tôi có thể xem và mua hàng trực tiếp không?', '<p>- Bạn c&oacute; thể gh&eacute; lấy sản phẩm tại văn ph&ograve;ng kho Marten: ph&ograve;ng trệt 2, 21/11 Tự Lập, P.4, T&acirc;n B&igrave;nh, TP.HCM. Vui l&ograve;ng đặt hẹn trước khi đến.</p>', 'active', 7, NULL, NULL, '2021-04-12 22:28:21', 'admin'),
(11, 'Marten tính phí vận chuyển như thế nào?', '<p>- Vui l&ograve;ng tham khảo&nbsp;<a href=\"http://nanapet.com/tro-giup/dich-vu-van-chuyen.html\">Cước Ph&iacute; Giao H&agrave;ng</a>.</p>', 'active', 8, NULL, NULL, '2021-04-12 22:28:27', 'admin'),
(12, 'Giả sử khi Marten giao hàng đến mà tôi không có nhà, phí vận chuyển sẽ tính như thế nào nếu tôi yêu cầu giao hàng lần 2?', '<p>- Marten sẽ thu ph&iacute; ship lần 1 ( nếu c&oacute; ) v&agrave; lần 2.</p>', 'active', 9, NULL, NULL, '2021-04-12 22:28:32', 'admin'),
(13, 'Tôi mua hàng thường xuyên, có chiết khấu khuyến mãi gì không?', '<p>- Marten c&oacute; chương tr&igrave;nh&nbsp;<a href=\"http://nanapet.com/tro-giup/ct-khach-hang-than-thiet.html\">Kh&aacute;ch H&agrave;ng Th&acirc;n Thiết</a>.</p>', 'active', 6, NULL, NULL, '2021-04-12 22:28:13', 'admin'),
(14, 'Cần khiếu nại về dịch vụ khách hàng', '<p>- Marten rất vui v&agrave; biết ơn nếu bạn sẵn l&ograve;ng g&oacute;p &yacute;.</p>', 'active', 10, NULL, NULL, '2021-04-12 22:27:25', 'admin'),
(15, 'Tôi cần tư vấn sản phẩm', '<p>- H&atilde;y li&ecirc;n hệ với Marten qua (028) 2212.8888 - 0933.103.203 ( zalo, viber ) hoặc inbox fanpage Marten Online.</p>', 'active', 15, NULL, NULL, '2021-04-12 22:27:37', 'admin'),
(16, 'Tôi phát hiện ra một số bài viết / thông tin trên website thiếu xác thực / chưa đầy đủ', '<p>- Marten rất vui v&agrave; biết ơn nếu bạn sẵn l&ograve;ng g&oacute;p &yacute;.</p>', 'active', 14, NULL, NULL, '2021-04-12 22:27:35', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `permission_ids`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'founder', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', 'active', '2021-03-30 12:41:43', 'admin', '2021-04-19 11:37:20', 'admin'),
(2, 'admin', '1,2,3,4,5,6,7,8,9,10', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin'),
(3, 'editor', '1,2,3,4,5,6', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin'),
(4, 'viewer', '1,2,3,4', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin'),
(5, 'user', '2', 'active', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `type_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `ordering`, `type_link`, `type_menu`, `link`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Home', '1', 'current', 'link', '/', 'active', NULL, NULL, NULL, NULL),
(2, 'Food', '2', 'current', 'category_product', '/all-food.html', 'active', NULL, NULL, '2021-04-08 15:36:49', 'admin'),
(3, 'News', '3', 'current', 'category_news', '#', 'active', NULL, NULL, NULL, NULL),
(4, 'About', '6', 'current', 'link', '/gioi-thieu', 'active', NULL, NULL, NULL, NULL),
(5, 'Contact Us', '5', 'current', 'link', '/lien-he', 'active', NULL, NULL, NULL, NULL),
(6, 'Thư viện', '4', 'new_tab', 'category_library', '#', 'active', NULL, NULL, NULL, NULL);

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
(133, '2021_03_23_074734_create_testimonial_table', 1),
(134, '2021_03_23_074951_create_comment_table', 1),
(135, '2021_03_23_075227_create_customer_table', 1),
(136, '2021_03_23_075345_create_user_table', 1),
(137, '2021_03_23_075527_create_menu_table', 1),
(138, '2021_03_23_075719_create_slider_table', 1),
(139, '2021_03_23_075808_create_setting_table', 1),
(140, '2021_03_23_075859_create_category_table', 1),
(141, '2021_03_23_080130_create_product_table', 1),
(142, '2021_03_23_080358_create_order_table', 1),
(143, '2021_03_23_080559_create_order_product_table', 1),
(144, '2021_03_23_080753_create_article_table', 1),
(145, '2021_03_23_080906_create_contact_table', 1),
(146, '2021_03_23_081019_create_product_image_table', 1),
(147, '2021_03_23_081051_create_attribute_table', 1),
(148, '2021_03_23_081139_create_product_attribute_table', 1),
(149, '2021_03_23_081244_create_page_table', 1),
(150, '2021_03_23_081347_create_shipping_table', 1),
(151, '2021_03_23_081435_create_discount_table', 1),
(152, '2021_03_23_081518_create_team_table', 1),
(153, '2021_03_23_081551_create_payment_table', 1),
(154, '2021_03_27_140926_create_recruitment_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `slug`, `content`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Help & Contact Us', 'kathleen-ernser', 'Maxime totam ut aut itaque voluptate eveniet. Sit enim voluptatum optio voluptas aut exercitationem.', 'active', '2021-03-30 12:41:43', 'admin', NULL, NULL),
(2, 'Return & Refunds', 'dr-icie-wehner-ii', 'Autem deleniti nihil et culpa sunt. Dicta ad soluta occaecati modi. Quaerat repudiandae vel distinctio eaque illo et incidunt iure.', 'active', '2021-03-30 12:41:43', 'admin', NULL, NULL),
(3, 'Online Stores', 'gretchen-bartoletti', 'Quam corporis sunt perferendis tempore earum. Qui inventore voluptas blanditiis corrupti ex. Sint repellat nostrum commodi pariatur illo sapiente.', 'active', '2021-03-30 12:41:43', 'admin', NULL, NULL),
(4, 'Terms & Conditions', 'althea-rice-i', 'Iusto pariatur porro sed at. Cum assumenda quis architecto occaecati aspernatur ut. Ducimus consequatur soluta voluptatem nihil rem.', 'active', '2021-03-30 12:41:43', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `type`, `name`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'cash', 'Tiền Mặt', 'active', '2021-03-30 12:41:43', 'admin', NULL, NULL),
(2, 'card', 'Thẻ Tín Dụng', 'active', '2021-03-30 12:41:43', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `controller_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `controller_id`, `action_id`, `name`, `route_name`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, 'Hiển thị Permission', 'permission', 'active', '2021-04-19 22:28:21', 'admin', NULL, NULL),
(2, 2, 2, 'Hiển Thị Bài Viết', 'article', 'active', '2021-03-30 12:41:43', 'admin', '2021-04-19 09:57:10', 'admin'),
(3, 3, 3, 'Xóa Bài Viết', 'article/delete', 'active', '2021-03-30 12:41:43', 'admin', '2021-04-19 09:57:06', 'admin'),
(4, 4, 4, 'Hiển Thị Sản Phẩm', 'product', 'active', '2021-03-30 12:41:43', 'admin', '2021-04-19 09:57:03', 'admin'),
(5, 5, 5, 'Xóa Sản Phẩm', 'product/delete', 'active', '2021-03-30 12:41:43', 'admin', '2021-04-19 09:57:00', 'admin'),
(6, 1, 6, 'Thêm mới / Chỉnh sửa Sản Phẩm', 'product/form', 'active', '2021-04-19 10:13:08', 'admin', '2021-04-19 10:13:39', 'admin'),
(7, 2, 7, 'Thay đổi Trạng thái của Sản Phẩm', 'product/status', 'active', '2021-04-19 10:16:06', 'admin', NULL, NULL),
(8, 3, 8, 'Thay đổi Thứ tự của Sản Phẩm', 'product/ordering', 'active', '2021-04-19 10:17:42', 'admin', NULL, NULL),
(9, 4, 9, 'Thay đổi Danh Mục của Sản Phẩm', 'product/change-category', 'active', '2021-04-19 10:22:55', 'admin', NULL, NULL),
(10, 5, 10, 'Thêm mới / Chỉnh sửa Bài viết', 'article/form', 'active', '2021-04-19 10:25:04', 'admin', NULL, NULL),
(11, 6, 11, 'Thay đổi Trạng thái của Bài viết', 'article/status', 'active', '2021-04-19 10:26:42', 'admin', NULL, NULL),
(12, 7, 12, 'Thay đổi Kiểu của Bài viết', 'article/type', 'active', '2021-04-19 11:10:22', 'admin', NULL, NULL),
(13, 8, 13, 'Gửi Bài viết Cho Subcribe', 'article/sendMailToSubcribe', 'active', '2021-04-19 11:11:11', 'admin', NULL, NULL),
(16, 9, 0, 'Hiển thị Dashboard', 'dashboard', 'active', '2021-04-19 11:11:45', 'admin', NULL, NULL),
(17, 1, 0, 'Hiển thị Group', 'group', 'active', '2021-04-19 22:04:23', 'admin', NULL, NULL),
(18, 1, 0, 'Thêm mới / Chỉnh sửa Group', 'group/form', 'active', '2021-04-19 22:05:20', 'admin', NULL, NULL),
(19, 0, 0, 'Xóa Group', 'group/delete', 'active', '2021-04-19 22:06:14', 'admin', NULL, NULL),
(20, 0, 0, 'Thay đổi Trạng thái của Group', 'group/status', 'active', '2021-04-19 22:06:35', 'admin', NULL, NULL),
(21, 0, 0, 'Thay đổi Quyền của Group', 'group/permission_ids', 'active', '2021-04-19 22:11:50', 'admin', NULL, NULL),
(22, 0, 0, 'Hiển thị User', 'user', 'active', '2021-04-19 22:13:45', 'admin', NULL, NULL),
(23, 0, 0, 'Thêm mới / Chỉnh sửa User', 'user/form', 'active', '2021-04-19 22:14:05', 'admin', NULL, NULL),
(24, 0, 0, 'Xóa User', 'user/delete', 'active', '2021-04-19 22:14:19', 'admin', NULL, NULL),
(25, 0, 0, 'Thay đổi Trạng thái của User', 'user/status', 'inactive', '2021-04-19 22:14:56', 'admin', '2021-04-23 09:54:45', 'admin'),
(26, 0, 0, 'Thay đổi Level của User', 'user/level', 'active', '2021-04-19 22:17:03', 'admin', NULL, NULL),
(27, 0, 0, 'Tự Thay đổi Password của Chính User đó.', 'user/change-logged-password', 'active', '2021-04-19 22:26:35', 'admin', NULL, NULL),
(29, 0, 0, 'Thêm mới / Chỉnh sửa Permission', 'permission/form', 'active', '2021-04-19 22:28:43', 'admin', NULL, NULL),
(30, 0, 0, 'Xóa Permission', 'permission/delete', 'active', '2021-04-19 22:29:43', 'admin', NULL, NULL),
(31, 0, 0, 'Thay đổi Trạng thái của Permission', 'permission/status', 'active', '2021-04-19 22:30:21', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) DEFAULT 0,
  `sale` int(11) DEFAULT NULL,
  `price_until` int(11) DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `status`, `name`, `description`, `short_description`, `ordering`, `slug`, `category_id`, `price`, `price_sale`, `sale`, `price_until`, `thumb`, `product_code`, `seo_title`, `seo_meta`, `seo_description`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'active', 'Thức ăn Veggies cho Fish 1', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_1', 1, 'thuc-an-canxi-cho-cho-1', 10, 15000, NULL, 10, 2000, '/images/product/ZnzyLbgVci.jpg', 'VDWP9', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(2, 'active', 'Thức ăn Carrots cho Chó 2', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_2', 2, 'thuc-an-canxi-cho-cho-2', 5, 6000, NULL, 5, 5000, '/images/product/I4huDHaMzS.jpg', 'OBRB3', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(3, 'active', 'Thức ăn canxi cho chó 3', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_3', 3, 'thuc-an-canxi-cho-cho-3', 6, 15000, 11000, NULL, 4000, '/images/product/QRYH4BDIVD.jpg', '69SI7', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(4, 'active', 'Thức ăn canxi cho chó 4', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_4', 4, 'thuc-an-canxi-cho-cho-4', 3, 64000, 54000, NULL, 10000, '/images/product/QbzlmFV8ff.jpg', 'Z4HI3', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(5, 'active', 'Thức ăn Meat cho Mèo 5', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_5', 5, 'thuc-an-meat-cho-meo-5', 7, 56000, 55000, NULL, 1000, '/images/product/fD5PbiTOls.jpg', 'SI5D3', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(6, 'active', 'Thức ăn canxi cho chó 6', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_6', 6, 'thuc-an-canxi-cho-cho-6', 2, 36000, 27000, NULL, 9000, '/images/product/TgWErUrkrb.jpg', 'BQVQ1', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(7, 'active', 'Thức ăn Cheese cho Mèo 7', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_7', 7, 'thuc-an-canxi-cho-cho-7', 8, 30000, 20000, NULL, 10000, '/images/product/xTy8r4PKyC.jpg', '7FXR7', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(8, 'active', 'Thức ăn Cheese cho Mèo 8', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_8', 8, 'thuc-an-canxi-cho-cho-8', 8, 20000, 12000, NULL, 8000, '/images/product/LXFxxkEApm.jpg', '1TZZ4', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(9, 'active', 'Thức ăn Rice cho Fish 9', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_9', 9, 'thuc-an-canxi-cho-cho-9', 9, 84000, 78000, NULL, 6000, '/images/product/6Xp8kGLfgu.jpg', 'F4YS9', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(10, 'active', 'Thức ăn Cheese cho Mèo 10', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_10', 10, 'thuc-an-canxi-cho-cho-10', 8, 59000, 57000, NULL, 2000, '/images/product/Q4leiLlyCv.jpg', 'J0SX9', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(11, 'active', 'Thức ăn canxi cho chó 11', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_11', 11, 'thuc-an-canxi-cho-cho-11', 6, 20000, 3000, NULL, 17000, '/images/product/xxAnKmoB6M.jpg', 'KTBG3', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(12, 'active', 'Thức ăn canxi cho chó 12', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_12', 12, 'thuc-an-canxi-cho-cho-12', 6, 120000, 10000, NULL, 110000, '/images/product/zMgnuyoIB9.jpg', 'PLB98', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(13, 'active', 'Thức ăn Eggs cho Chó 13', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_13', 13, 'thuc-an-canxi-cho-cho-13', 4, 85000, 79000, NULL, 6000, '/images/product/Che3WVa60Q.jpg', 'EM3S9', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(14, 'active', 'Thức ăn Meat cho Mèo 14', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_14', 14, 'thuc-an-meat-cho-meo-14', 7, 86000, 76000, NULL, 10000, '/images/product/qcJYJy8Bgr.jpg', 'BFCL9', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(15, 'active', 'Thức ăn Cheese cho Mèo 15', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_15', 15, 'thuc-an-canxi-cho-cho-15', 8, 31000, 24000, NULL, 7000, '/images/product/p4eJilrmrr.jpg', 'WYLW6', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(16, 'active', 'Thức ăn Meat cho Mèo 16', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it&#39;s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260&deg;C. It&#39;s also dishwasher safe for easy cleanup.</p>\r\n\r\n<p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n\r\n<ul>\r\n	<li>Key Features:</li>\r\n	<li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n	<li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n	<li>Fat-free frying, metal utensils safe</li>\r\n	<li>Suitable for all stove tops, except induction</li>\r\n	<li>Guaranteed not to warp</li>\r\n	<li>Fast and even heat distribution</li>\r\n	<li>Ovenproof up to 260&deg;C</li>\r\n	<li>Dishwasher safe - but not recommended</li>\r\n	<li>Designed and manufactured in Denmark</li>\r\n</ul>', '<p>short_description product_id_ short_description product_id_ short_description product_id_16</p>', 16, 'thuc-an-meat-cho-meo-16', 7, 88000, 86000, NULL, 2000, '/images/product/wX74bXhIxe.jpg', 'ATUW2', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(17, 'active', 'Thức ăn canxi cho chó 17', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_17', 17, 'thuc-an-canxi-cho-cho-17', 6, 49000, 39000, NULL, 10000, '/images/product/OB0hTWkOoE.jpg', 'LN1A9', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(18, 'active', 'Thức ăn Carrots cho Chó 18', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_18', 18, 'thuc-an-canxi-cho-cho-18', 5, 57000, 51000, NULL, 6000, '/images/product/lvuMmUshBt.jpg', 'NWJR9', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(19, 'active', 'Thức ăn Cheese cho Mèo 19', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_19', 19, 'thuc-an-canxi-cho-cho-19', 8, 64000, 58000, NULL, 6000, '/images/product/KtTgfYz7kD.jpg', '5K6J1', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(20, 'active', 'Thức ăn Cheese cho Mèo 20', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_20', 20, 'thuc-an-canxi-cho-cho-20', 8, 45000, 44000, NULL, 1000, '/images/product/PdvoD4ZgkP.jpg', 'WPT25', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(21, 'active', 'Thức ăn Cheese cho Mèo 21', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_21', 21, 'thuc-an-canxi-cho-cho-21', 8, 47000, 37000, NULL, 10000, '/images/product/gbeqnRD5r3.jpg', '0F014', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(22, 'active', 'Thức ăn Eggs cho Chó 22', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_22', 22, 'thuc-an-canxi-cho-cho-22', 4, 40000, 36000, NULL, 4000, '/images/product/X082TFjuG5.jpg', 'RPXA6', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(23, 'active', 'Thức ăn Carrots cho Chó 23', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_23', 23, 'thuc-an-canxi-cho-cho-23', 5, 15000, 11000, NULL, 4000, '/images/product/pMHrdxU630.jpg', '9KWN7', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(24, 'active', 'Thức ăn Cheese cho Mèo 24', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_24', 24, 'thuc-an-canxi-cho-cho-24', 8, 8000, 2000, NULL, 6000, '/images/product/Levk73D1K1.jpg', 'OQJJ4', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(25, 'active', 'Thức ăn Meat cho Mèo 25', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it&#39;s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260&deg;C. It&#39;s also dishwasher safe for easy cleanup.</p>\r\n\r\n<p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n\r\n<ul>\r\n	<li>Key Features:</li>\r\n	<li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n	<li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n	<li>Fat-free frying, metal utensils safe</li>\r\n	<li>Suitable for all stove tops, except induction</li>\r\n	<li>Guaranteed not to warp</li>\r\n	<li>Fast and even heat distribution</li>\r\n	<li>Ovenproof up to 260&deg;C</li>\r\n	<li>Dishwasher safe - but not recommended</li>\r\n	<li>Designed and manufactured in Denmark</li>\r\n</ul>', '<p>short_description product_id_ short_description product_id_ short_description product_id_25</p>', 25, 'thuc-an-meat-cho-meo-25', 7, 97000, 95000, NULL, 2000, '/images/product/baFNl9zxwe.jpg', 'JXO17', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL);
INSERT INTO `product` (`id`, `status`, `name`, `description`, `short_description`, `ordering`, `slug`, `category_id`, `price`, `price_sale`, `sale`, `price_until`, `thumb`, `product_code`, `seo_title`, `seo_meta`, `seo_description`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(26, 'active', 'Thức ăn Eggs cho Chó 26', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_26', 26, 'thuc-an-canxi-cho-cho-26', 4, 16000, 15000, NULL, 1000, '/images/product/gHR24SKhHo.jpg', 'XFSJ4', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(27, 'active', 'Thức ăn canxi cho chó 27', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_27', 27, 'thuc-an-canxi-cho-cho-27', 3, 36000, 33000, NULL, 3000, '/images/product/YjveonShsM.jpg', 'KECV2', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', '2021-04-09 18:35:26', 'admin'),
(28, 'active', 'Thức ăn Veggies cho Fish 28', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_28', 28, 'thuc-an-canxi-cho-cho-28', 10, 4000, 2000, NULL, 2000, '/images/product/RveBV7O6Wt.jpg', 'YRXU5', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(29, 'active', 'Thức ăn canxi cho chó 29', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_29', 29, 'thuc-an-canxi-cho-cho-29', 3, 85000, 80000, NULL, 85000, '/images/product/w2RyCErOd1.jpg', '0AON1', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(30, 'active', 'Thức ăn id-30 category-id-6 canxi cho chó', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it&#39;s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260&deg;C. It&#39;s also dishwasher safe for easy cleanup.</p>\r\n\r\n<p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n\r\n<ul>\r\n	<li>Key Features:</li>\r\n	<li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n	<li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n	<li>Fat-free frying, metal utensils safe</li>\r\n	<li>Suitable for all stove tops, except induction</li>\r\n	<li>Guaranteed not to warp</li>\r\n	<li>Fast and even heat distribution</li>\r\n	<li>Ovenproof up to 260&deg;C</li>\r\n	<li>Dishwasher safe - but not recommended</li>\r\n	<li>Designed and manufactured in Denmark</li>\r\n</ul>', '<p>short_description product_id_ short_description product_id_ short_description product_id_30</p>', 30, 'thuc-an-id-30-category-id-6-canxi-cho-cho', 6, 50000, 36000, NULL, 14000, '/images/product/ROoyORflU6.jpg', 'TBTI8', NULL, NULL, NULL, '2021-03-29 08:57:12', 'admin', '2021-04-16 09:13:51', 'vanduc');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`id`, `product_id`, `attribute_id`, `value`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, 'xanh', NULL, NULL, NULL, NULL),
(2, 1, 1, 'đỏ', NULL, NULL, NULL, NULL),
(3, 1, 1, 'trắng', NULL, NULL, NULL, NULL),
(4, 1, 1, 'vàng', NULL, NULL, NULL, NULL),
(5, 1, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(6, 1, 2, 'vừa', NULL, NULL, NULL, NULL),
(7, 1, 2, 'lớn', NULL, NULL, NULL, NULL),
(8, 1, 2, 'rất lớn', NULL, NULL, NULL, NULL),
(17, 2, 1, 'xanh', NULL, NULL, NULL, NULL),
(19, 2, 1, 'trắng', NULL, NULL, NULL, NULL),
(21, 2, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(22, 2, 2, 'vừa', NULL, NULL, NULL, NULL),
(25, 3, 1, 'xanh', NULL, NULL, NULL, NULL),
(26, 3, 1, 'đỏ', NULL, NULL, NULL, NULL),
(29, 3, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(30, 3, 2, 'vừa', NULL, NULL, NULL, NULL),
(35, 4, 1, 'trắng', NULL, NULL, NULL, NULL),
(36, 4, 1, 'vàng', NULL, NULL, NULL, NULL),
(41, 5, 1, 'xanh', NULL, NULL, NULL, NULL),
(45, 5, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(47, 5, 2, 'lớn', NULL, NULL, NULL, NULL),
(48, 5, 2, 'rất lớn', NULL, NULL, NULL, NULL),
(53, 2, 3, '80 cm', NULL, NULL, NULL, NULL),
(55, 2, 3, '100 cm', NULL, NULL, NULL, NULL),
(59, 3, 3, '100 cm', NULL, NULL, NULL, NULL),
(60, 3, 3, '110 cm', NULL, NULL, NULL, NULL),
(122, 24, 1, 'đỏ', NULL, NULL, NULL, NULL),
(123, 24, 1, 'trắng', NULL, NULL, NULL, NULL),
(125, 24, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(127, 24, 2, 'lớn', NULL, NULL, NULL, NULL),
(128, 24, 2, 'rất lớn', NULL, NULL, NULL, NULL),
(154, 25, 1, 'xanh', NULL, NULL, NULL, NULL),
(155, 25, 1, 'đỏ', NULL, NULL, NULL, NULL),
(156, 25, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(157, 25, 2, 'vừa', NULL, NULL, NULL, NULL),
(162, 16, 1, 'đỏ', NULL, NULL, NULL, NULL),
(163, 16, 1, 'trắng', NULL, NULL, NULL, NULL),
(164, 16, 2, 'vừa', NULL, NULL, NULL, NULL),
(165, 16, 2, 'lớn', NULL, NULL, NULL, NULL),
(166, 16, 3, '80 cm', NULL, NULL, NULL, NULL),
(167, 16, 3, '100 cm', NULL, NULL, NULL, NULL),
(207, 30, 6, 'tag 2', NULL, NULL, NULL, NULL),
(208, 30, 6, 'tag 3', NULL, NULL, NULL, NULL),
(209, 30, 6, 'tag 4', NULL, NULL, NULL, NULL),
(210, 30, 6, 'tag 1', NULL, NULL, NULL, NULL),
(211, 30, 6, 'giầy xinh', NULL, NULL, NULL, NULL),
(212, 30, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(213, 30, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(214, 30, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(215, 30, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(216, 30, 2, 'vừa', NULL, NULL, NULL, NULL),
(217, 30, 3, '80 cm', NULL, NULL, NULL, NULL),
(218, 30, 3, '110 cm', NULL, NULL, NULL, NULL),
(219, 30, 3, '90 cm', NULL, NULL, NULL, NULL),
(220, 29, 1, 'vàng', NULL, NULL, NULL, NULL),
(221, 29, 1, 'trắng', NULL, NULL, NULL, NULL),
(222, 29, 1, 'xanh', NULL, NULL, NULL, NULL),
(223, 29, 6, 'tag 1', NULL, NULL, NULL, NULL),
(224, 29, 6, 'tag 2', NULL, NULL, NULL, NULL),
(225, 29, 6, 'tag 3', NULL, NULL, NULL, NULL),
(226, 29, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(227, 29, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(228, 29, 2, 'rất lớn', NULL, NULL, NULL, NULL),
(229, 29, 2, 'lớn', NULL, NULL, NULL, NULL),
(230, 29, 2, 'vừa', NULL, NULL, NULL, NULL),
(231, 29, 3, '80 cm', NULL, NULL, NULL, NULL),
(232, 28, 1, 'đỏ', NULL, NULL, NULL, NULL),
(233, 28, 1, 'trắng', NULL, NULL, NULL, NULL),
(234, 28, 6, 'giầy xinh', NULL, NULL, NULL, NULL),
(235, 28, 6, 'tag 1', NULL, NULL, NULL, NULL),
(236, 28, 6, 'giẩy xinh', NULL, NULL, NULL, NULL),
(237, 28, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(238, 28, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(239, 28, 2, 'vừa', NULL, NULL, NULL, NULL),
(240, 28, 2, 'rất lớn', NULL, NULL, NULL, NULL),
(241, 28, 3, '90 cm', NULL, NULL, NULL, NULL),
(242, 28, 3, '110 cm', NULL, NULL, NULL, NULL),
(243, 27, 1, 'đỏ', NULL, NULL, NULL, NULL),
(244, 27, 1, 'trắng', NULL, NULL, NULL, NULL),
(245, 27, 6, 'tag 3', NULL, NULL, NULL, NULL),
(246, 27, 6, 'tag 4', NULL, NULL, NULL, NULL),
(247, 27, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(248, 27, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(249, 27, 2, 'nhỏ', NULL, NULL, NULL, NULL),
(250, 27, 2, 'vừa', NULL, NULL, NULL, NULL),
(251, 27, 2, 'rất lớn', NULL, NULL, NULL, NULL),
(252, 27, 3, '80 cm', NULL, NULL, NULL, NULL),
(253, 27, 3, '90 cm', NULL, NULL, NULL, NULL),
(254, 27, 3, '110 cm', NULL, NULL, NULL, NULL),
(272, 26, 1, 'xanh', NULL, NULL, NULL, NULL),
(273, 26, 1, 'đỏ', NULL, NULL, NULL, NULL),
(274, 26, 1, 'vàng', NULL, NULL, NULL, NULL),
(275, 26, 6, 'tag 2', NULL, NULL, NULL, NULL),
(276, 26, 6, 'tag4', NULL, NULL, NULL, NULL),
(277, 26, 6, 'tag 3', NULL, NULL, NULL, NULL),
(278, 26, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(279, 26, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(280, 26, 6, 'giấy xinh', NULL, NULL, NULL, NULL),
(281, 26, 2, 'vừa', NULL, NULL, NULL, NULL),
(282, 26, 2, 'lớn', NULL, NULL, NULL, NULL),
(283, 26, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(284, 26, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(285, 26, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(286, 26, 4, 'Brand 1', NULL, NULL, NULL, NULL),
(287, 26, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(288, 26, 4, 'Brand 3', NULL, NULL, NULL, NULL),
(289, 26, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(290, 25, 6, 'tag 2', NULL, NULL, NULL, NULL),
(291, 25, 6, 'tag4', NULL, NULL, NULL, NULL),
(292, 25, 6, 'tag 3', NULL, NULL, NULL, NULL),
(293, 25, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(294, 25, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(295, 25, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(296, 25, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(297, 25, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(298, 25, 4, 'Brand 1', NULL, NULL, NULL, NULL),
(299, 25, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(300, 25, 4, 'Brand 3', NULL, NULL, NULL, NULL),
(301, 25, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(302, 30, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(303, 30, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(304, 30, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(305, 30, 4, 'Brand 1', NULL, NULL, NULL, NULL),
(306, 30, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(307, 30, 4, 'Brand 3', NULL, NULL, NULL, NULL),
(309, 24, 6, 'tag 2', NULL, NULL, NULL, NULL),
(310, 24, 6, 'tag 3', NULL, NULL, NULL, NULL),
(311, 24, 6, 'tag 4', NULL, NULL, NULL, NULL),
(312, 24, 6, 'tag 1', NULL, NULL, NULL, NULL),
(313, 24, 6, 'giầy xinh', NULL, NULL, NULL, NULL),
(314, 24, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(315, 24, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(316, 24, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(317, 24, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(318, 24, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(319, 24, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(321, 24, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(322, 24, 4, 'Brand 3', NULL, NULL, NULL, NULL),
(323, 24, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(324, 23, 6, 'tag 2', NULL, NULL, NULL, NULL),
(325, 23, 6, 'tag 3', NULL, NULL, NULL, NULL),
(326, 23, 6, 'tag 4', NULL, NULL, NULL, NULL),
(327, 23, 6, 'tag 1', NULL, NULL, NULL, NULL),
(328, 23, 6, 'giầy xinh', NULL, NULL, NULL, NULL),
(329, 23, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(330, 23, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(331, 23, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(333, 23, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(334, 23, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(335, 23, 4, 'Brand 1', NULL, NULL, NULL, NULL),
(337, 23, 4, 'Brand 3', NULL, NULL, NULL, NULL),
(339, 22, 6, 'tag 2', NULL, NULL, NULL, NULL),
(340, 22, 6, 'tag 3', NULL, NULL, NULL, NULL),
(341, 22, 6, 'tag 4', NULL, NULL, NULL, NULL),
(342, 22, 6, 'tag 1', NULL, NULL, NULL, NULL),
(343, 22, 6, 'giầy xinh', NULL, NULL, NULL, NULL),
(344, 22, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(345, 22, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(346, 22, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(347, 22, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(348, 22, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(350, 22, 4, 'Brand 1', NULL, NULL, NULL, NULL),
(351, 22, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(352, 22, 4, 'Brand 3', NULL, NULL, NULL, NULL),
(354, 21, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(355, 21, 4, 'Brand 3', NULL, NULL, NULL, NULL),
(357, 21, 4, 'Brand 1', NULL, NULL, NULL, NULL),
(358, 21, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(359, 21, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(361, 21, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(362, 21, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(363, 21, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(364, 21, 6, 'giầy xinh', NULL, NULL, NULL, NULL),
(365, 21, 6, 'tag 1', NULL, NULL, NULL, NULL),
(366, 21, 6, 'tag 4', NULL, NULL, NULL, NULL),
(367, 21, 6, 'tag 3', NULL, NULL, NULL, NULL),
(368, 21, 6, 'tag 2', NULL, NULL, NULL, NULL),
(369, 20, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(370, 20, 4, 'Brand 3', NULL, NULL, NULL, NULL),
(372, 20, 4, 'Brand 1', NULL, NULL, NULL, NULL),
(373, 20, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(375, 20, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(376, 20, 6, 'thức ăn tự nhiên cho chó', NULL, NULL, NULL, NULL),
(377, 20, 6, 'thức ăn bổ dưỡng cho chó', NULL, NULL, NULL, NULL),
(378, 20, 6, 'thức ăn ngon cho chó', NULL, NULL, NULL, NULL),
(379, 20, 6, 'giầy xinh', NULL, NULL, NULL, NULL),
(380, 20, 6, 'tag 1', NULL, NULL, NULL, NULL),
(381, 20, 6, 'tag 4', NULL, NULL, NULL, NULL),
(382, 20, 6, 'tag 3', NULL, NULL, NULL, NULL),
(383, 20, 6, 'tag 2', NULL, NULL, NULL, NULL),
(384, 19, 6, 'tag 2', NULL, NULL, NULL, NULL),
(385, 19, 6, 'tag 1', NULL, NULL, NULL, NULL),
(386, 19, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(387, 19, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(388, 19, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(389, 19, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(391, 19, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(393, 19, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(395, 18, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(397, 18, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(399, 18, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(400, 18, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(401, 18, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(402, 18, 6, 'tag 1', NULL, NULL, NULL, NULL),
(403, 18, 6, 'tag 2', NULL, NULL, NULL, NULL),
(404, 1, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(405, 1, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(407, 1, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(409, 1, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(410, 1, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(411, 1, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(412, 1, 6, 'tag 1', NULL, NULL, NULL, NULL),
(413, 1, 6, 'tag 2', NULL, NULL, NULL, NULL),
(415, 2, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(416, 2, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(417, 2, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(419, 2, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(420, 2, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(421, 2, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(422, 2, 6, 'tag 1', NULL, NULL, NULL, NULL),
(423, 2, 6, 'tag 2', NULL, NULL, NULL, NULL),
(424, 3, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(425, 3, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(427, 3, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(428, 3, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(429, 3, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(430, 3, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(431, 3, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(432, 3, 6, 'tag 1', NULL, NULL, NULL, NULL),
(433, 3, 6, 'tag 2', NULL, NULL, NULL, NULL),
(435, 4, 4, 'Brand 2', NULL, NULL, NULL, NULL),
(437, 4, 4, 'Mèo Cưng', NULL, NULL, NULL, NULL),
(438, 4, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(439, 4, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(440, 4, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(441, 4, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(442, 4, 6, 'tag 1', NULL, NULL, NULL, NULL),
(443, 4, 6, 'tag 2', NULL, NULL, NULL, NULL),
(444, 5, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(446, 5, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(448, 5, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(449, 5, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(450, 5, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(451, 5, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(452, 5, 6, 'tag 1', NULL, NULL, NULL, NULL),
(453, 5, 6, 'tag 2', NULL, NULL, NULL, NULL),
(454, 6, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(456, 6, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(458, 6, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(459, 6, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(460, 6, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(461, 6, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(462, 6, 6, 'tag 1', NULL, NULL, NULL, NULL),
(463, 6, 6, 'tag 2', NULL, NULL, NULL, NULL),
(464, 7, 4, 'Gauz Gauz', NULL, NULL, NULL, NULL),
(466, 7, 4, 'Meoz Meoz', NULL, NULL, NULL, NULL),
(468, 7, 4, 'Chó Cưng', NULL, NULL, NULL, NULL),
(469, 7, 6, 'thức ăn tự nhiên cho mèo', NULL, NULL, NULL, NULL),
(470, 7, 6, 'thức ăn cho mèo', NULL, NULL, NULL, NULL),
(471, 7, 6, 'thức ăn ngon cho mèo', NULL, NULL, NULL, NULL),
(472, 7, 6, 'tag 1', NULL, NULL, NULL, NULL),
(473, 7, 6, 'tag 2', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `name`, `alt`, `product_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(19, 'RveBV7O6Wt.jpg', NULL, 28, NULL, NULL, NULL, NULL),
(20, 'ibDZA4IlqK.jpg', NULL, 28, NULL, NULL, NULL, NULL),
(21, 'J6mo8kd7ZW.jpg', NULL, 28, NULL, NULL, NULL, NULL),
(22, 'l4E85sgQjt.jpg', NULL, 28, NULL, NULL, NULL, NULL),
(23, 'YjveonShsM.jpg', NULL, 27, NULL, NULL, NULL, NULL),
(24, 'rNyui96YFS.jpg', NULL, 27, NULL, NULL, NULL, NULL),
(25, 'DRFGkwT6ac.jpg', NULL, 27, NULL, NULL, NULL, NULL),
(26, 'gHR24SKhHo.jpg', NULL, 26, NULL, NULL, NULL, NULL),
(27, 'I7k5h7vjel.jpg', NULL, 26, NULL, NULL, NULL, NULL),
(28, 'eZHlTrgDio.jpg', NULL, 26, NULL, NULL, NULL, NULL),
(29, '2FXf2ncIco.jpg', NULL, 26, NULL, NULL, NULL, NULL),
(30, 'uCCJLmRfLd.jpg', NULL, 26, NULL, NULL, NULL, NULL),
(31, 'baFNl9zxwe.jpg', NULL, 25, NULL, NULL, NULL, NULL),
(32, 'rV6yVoDbJx.jpg', NULL, 25, NULL, NULL, NULL, NULL),
(33, 'ElH1vMy16H.jpg', NULL, 25, NULL, NULL, NULL, NULL),
(49, 'ROoyORflU6.jpg', NULL, 30, NULL, NULL, NULL, NULL),
(50, 'ntZKRGdJs0.jpg', NULL, 30, NULL, NULL, NULL, NULL),
(51, 'Na3LzLaN3e.jpg', 'alt nc1', 30, NULL, NULL, NULL, NULL),
(52, 'Levk73D1K1.jpg', NULL, 24, NULL, NULL, NULL, NULL),
(53, 'j98ui3KPXw.jpg', NULL, 24, NULL, NULL, NULL, NULL),
(54, 'a9ICcYfLje.jpg', NULL, 24, NULL, NULL, NULL, NULL),
(55, 'pMHrdxU630.jpg', NULL, 23, NULL, NULL, NULL, NULL),
(56, 'IDYB2KI7oq.jpg', NULL, 23, NULL, NULL, NULL, NULL),
(57, 'vV5FwkZsuQ.jpg', NULL, 23, NULL, NULL, NULL, NULL),
(58, 'X082TFjuG5.jpg', NULL, 22, NULL, NULL, NULL, NULL),
(59, 'HpdVi4H5B9.jpg', NULL, 22, NULL, NULL, NULL, NULL),
(60, 'xX7fStHHIr.jpg', NULL, 22, NULL, NULL, NULL, NULL),
(61, 'gbeqnRD5r3.jpg', NULL, 21, NULL, NULL, NULL, NULL),
(62, '199ClN9vEP.jpg', NULL, 21, NULL, NULL, NULL, NULL),
(63, '3OCCahPmFi.jpg', NULL, 21, NULL, NULL, NULL, NULL),
(64, 'PdvoD4ZgkP.jpg', NULL, 20, NULL, NULL, NULL, NULL),
(65, 'MnVbaz6rEQ.jpg', NULL, 20, NULL, NULL, NULL, NULL),
(66, 'tnmaHh6Oi4.jpg', NULL, 20, NULL, NULL, NULL, NULL),
(67, 'PNUnqd7K4n.jpg', NULL, 20, NULL, NULL, NULL, NULL),
(68, 'KtTgfYz7kD.jpg', NULL, 19, NULL, NULL, NULL, NULL),
(69, 'lDI6K2LX8W.jpg', NULL, 19, NULL, NULL, NULL, NULL),
(70, 'IQ3tvZxDJ6.jpg', NULL, 19, NULL, NULL, NULL, NULL),
(71, 'lvuMmUshBt.jpg', NULL, 18, NULL, NULL, NULL, NULL),
(72, 'o03xlh4kqN.jpg', NULL, 18, NULL, NULL, NULL, NULL),
(73, 'i94WWQw6Xs.jpg', NULL, 18, NULL, NULL, NULL, NULL),
(74, '7GCsMkzsuG.jpg', NULL, 18, NULL, NULL, NULL, NULL),
(75, 'OB0hTWkOoE.jpg', NULL, 17, NULL, NULL, NULL, NULL),
(76, 'MrdlX52CNj.jpg', NULL, 17, NULL, NULL, NULL, NULL),
(77, 'lnSOxHoC53.jpg', NULL, 17, NULL, NULL, NULL, NULL),
(78, 'wX74bXhIxe.jpg', NULL, 16, NULL, NULL, NULL, NULL),
(79, 'Q4xcpgagXz.jpg', NULL, 16, NULL, NULL, NULL, NULL),
(80, 'iHaqhUzkcU.jpg', NULL, 16, NULL, NULL, NULL, NULL),
(81, 'JZ6qFl1te5.jpg', NULL, 16, NULL, NULL, NULL, NULL),
(82, 'mftPNbC7wB.jpg', NULL, 16, NULL, NULL, NULL, NULL),
(83, 'p4eJilrmrr.jpg', NULL, 15, NULL, NULL, NULL, NULL),
(84, '3TgNGB2yPF.jpg', NULL, 15, NULL, NULL, NULL, NULL),
(85, 'YIQZnFYt7M.jpg', NULL, 15, NULL, NULL, NULL, NULL),
(86, 'vuwnmdj0eb.jpg', NULL, 15, NULL, NULL, NULL, NULL),
(87, 'qcJYJy8Bgr.jpg', NULL, 14, NULL, NULL, NULL, NULL),
(88, 'Che3WVa60Q.jpg', NULL, 13, NULL, NULL, NULL, NULL),
(89, 'kXHlcmN0ms.jpg', NULL, 13, NULL, NULL, NULL, NULL),
(90, 'zMgnuyoIB9.jpg', NULL, 12, NULL, NULL, NULL, NULL),
(91, 'LxYDxOPuUr.jpg', NULL, 12, NULL, NULL, NULL, NULL),
(92, 'DvZ5Ux7hl6.jpg', NULL, 12, NULL, NULL, NULL, NULL),
(93, 'w2RyCErOd1.jpg', 'alt nc1', 29, NULL, NULL, NULL, NULL),
(94, 'o0plrrQbvv.jpg', 'alt nc2', 29, NULL, NULL, NULL, NULL),
(95, 'dwlMkysxgM.jpg', 'alt nc3', 29, NULL, NULL, NULL, NULL),
(96, 'Q4leiLlyCv.jpg', NULL, 10, NULL, NULL, NULL, NULL),
(97, 'aATjQ4QDbR.jpg', NULL, 10, NULL, NULL, NULL, NULL),
(98, 'RL9iwQC370.jpg', NULL, 10, NULL, NULL, NULL, NULL),
(99, '6Xp8kGLfgu.jpg', NULL, 9, NULL, NULL, NULL, NULL),
(100, 'aaiwuezYT2.jpg', NULL, 9, NULL, NULL, NULL, NULL),
(101, '0bMfOrqYup.jpg', NULL, 9, NULL, NULL, NULL, NULL),
(102, 'aEMS2fRUxD.jpg', NULL, 9, NULL, NULL, NULL, NULL),
(103, 'LXFxxkEApm.jpg', NULL, 8, NULL, NULL, NULL, NULL),
(104, 'soYu25gwnZ.jpg', NULL, 8, NULL, NULL, NULL, NULL),
(105, 'xTy8r4PKyC.jpg', NULL, 7, NULL, NULL, NULL, NULL),
(106, '2HcAudGKxM.jpg', NULL, 7, NULL, NULL, NULL, NULL),
(107, 'mPZ0M4ednB.jpg', NULL, 7, NULL, NULL, NULL, NULL),
(108, 'TgWErUrkrb.jpg', NULL, 6, NULL, NULL, NULL, NULL),
(109, 'BxkhKKzQOJ.jpg', NULL, 6, NULL, NULL, NULL, NULL),
(110, 'a1ThO4XgYT.jpg', NULL, 6, NULL, NULL, NULL, NULL),
(111, 'uJXWbXBEMK.jpg', NULL, 6, NULL, NULL, NULL, NULL),
(112, 'fD5PbiTOls.jpg', NULL, 5, NULL, NULL, NULL, NULL),
(113, '5qFofzwluC.jpg', NULL, 5, NULL, NULL, NULL, NULL),
(114, 'QbzlmFV8ff.jpg', NULL, 4, NULL, NULL, NULL, NULL),
(115, 'KDjQN2Kfrp.jpg', NULL, 4, NULL, NULL, NULL, NULL),
(116, 'yFfMVjkEPc.jpg', NULL, 4, NULL, NULL, NULL, NULL),
(117, 'QRYH4BDIVD.jpg', NULL, 3, NULL, NULL, NULL, NULL),
(118, 'O5WhXSZRvT.jpg', NULL, 3, NULL, NULL, NULL, NULL),
(119, 'Ic7VERbSaC.jpg', NULL, 3, NULL, NULL, NULL, NULL),
(120, 'I4huDHaMzS.jpg', NULL, 2, NULL, NULL, NULL, NULL),
(121, 'RMsx2zcYKt.jpg', NULL, 2, NULL, NULL, NULL, NULL),
(122, 'YnHf8cCxbI.jpg', NULL, 2, NULL, NULL, NULL, NULL),
(123, 'ZnzyLbgVci.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(124, 'h8FRUzZK2t.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(125, 'xxAnKmoB6M.jpg', NULL, 11, NULL, NULL, NULL, NULL),
(126, '2H5gYk2k3u.jpg', NULL, 11, NULL, NULL, NULL, NULL),
(127, 'oxkXIrOxrq.jpg', NULL, 11, NULL, NULL, NULL, NULL),
(128, 's0TkIDT6du.jpg', NULL, 11, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int(3) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`id`, `name`, `slug`, `description`, `content`, `status`, `thumb`, `ordering`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Công Ty Cổ Phần Mypet Tuyển Dụng Nhân viên Marketing', 'cong-ty-co-phan-mypet-tuyen-dung-nhan-vien-marketing', '<p>Về vị tr&iacute; Nh&acirc;n vi&ecirc;n Marketing của Mypet C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n...</p>', '<p><img alt=\"MyPet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/07/tuyen-dung-marketing-MyPet.jpg\" style=\"height:638px; width:850px\" /></p>\r\n\r\n<h1>C&ocirc;ng Ty Cổ Phần Mypet Tuyển Dụng Nh&acirc;n vi&ecirc;n Marketing</h1>\r\n\r\n<h2><strong>Về vị tr&iacute; Nh&acirc;n vi&ecirc;n Marketing của Mypet</strong></h2>\r\n\r\n<p>C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện th&uacute; cưng tại Việt Nam, hiện thực h&oacute;a mong muốn mang lại lợi &iacute;ch đồng thời cho cả chủ nu&ocirc;i cũng như c&aacute;c trung t&acirc;m, cửa h&agrave;ng kinh doanh.</p>\r\n\r\n<p>Nh&acirc;n vi&ecirc;n Marketing của Mypet l&agrave; người quản l&yacute; &ldquo;kho t&agrave;i nguy&ecirc;n&rdquo; của c&ocirc;ng ty v&agrave; sử dụng ch&uacute;ng v&agrave;o những chiến thuật kh&ocirc;n ngoan, nhằm quảng b&aacute; sản phẩm/dịch vụ v&agrave; h&igrave;nh ảnh của c&ocirc;ng ty ra b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>Số lượng cần tuyển: 1 người.</p>\r\n\r\n<h2>M&ocirc; tả c&ocirc;ng việc</h2>\r\n\r\n<ul>\r\n	<li>Tạo v&agrave; quản l&yacute; c&aacute;c chiến dịch x&acirc;y dựng li&ecirc;n kết, chiến dịch content marketing, gi&uacute;p tăng sự hiện diện của ứng dụng Mypet tr&ecirc;n c&aacute;c phương tiện truyền th&ocirc;ng x&atilde; hội như: Facebook, zalo, youtube, instagram &hellip;</li>\r\n	<li>Ph&aacute;t triển nội dung trực tuyến hấp dẫn bao gồm clickbait, diễn đ&agrave;n, video, h&igrave;nh ảnh, blog; theo d&otilde;i v&agrave; ph&acirc;n t&iacute;ch sự th&agrave;nh c&ocirc;ng của c&aacute;c nội dung đ&atilde; tạo.</li>\r\n	<li>Quản l&yacute; c&aacute;c chiến dịch marketing qua email v&agrave; phương tiện truyền th&ocirc;ng x&atilde; hội.</li>\r\n	<li>Sử dụng Google Analytics, Google AdWords v&agrave; c&aacute;c site c&oacute; li&ecirc;n quan kh&aacute;c.</li>\r\n	<li>Gi&uacute;p tăng lượng traffic v&agrave;o website, Fanpage của c&ocirc;ng ty.</li>\r\n	<li>Cập nhật c&aacute;c k&ecirc;nh truyền th&ocirc;ng x&atilde; hội, c&ocirc;ng nghệ web v&agrave; xu hướng Digital Marketing mới nhất;</li>\r\n</ul>\r\n\r\n<h2>Y&ecirc;u cầu c&ocirc;ng việc</h2>\r\n\r\n<ul>\r\n	<li>Tốt nghiệp trung cấp, cao đẳng trở l&ecirc;n chuy&ecirc;n ng&agrave;nh Marketing, Quản trị thương hiệu hoặc&nbsp;c&aacute;c ng&agrave;nh li&ecirc;n quan.</li>\r\n	<li>Kinh nghiệm tối thiểu 01 năm l&agrave;m việc&nbsp;trong lĩnh vực Marketing, ưu ti&ecirc;n c&oacute; kinh nghiệm trong lĩnh vực ứng dụng mobile.</li>\r\n	<li>C&oacute; kỹ năng giao tiếp tốt.</li>\r\n	<li>C&oacute; t&iacute;nh mỹ thuật, chụp h&igrave;nh v&agrave; viết nội dung chương tr&igrave;nh quảng c&aacute;o.</li>\r\n	<li>Kỹ năng l&agrave;m việc nh&oacute;m, cẩn thận, tỉ mỉ v&agrave; tập trung v&agrave;o mục ti&ecirc;u.</li>\r\n	<li>Am hiểu c&aacute;c k&ecirc;nh digital marketing, PPC, Google AdWords, hệ thống quản trị nội dung.</li>\r\n	<li>Ưu ti&ecirc;n biết sử dụng Photoshop v&agrave; c&aacute;c phần mềm bi&ecirc;n tập h&igrave;nh ảnh, video.</li>\r\n</ul>\r\n\r\n<h2><strong>Quyền lợi</strong></h2>\r\n\r\n<ul>\r\n	<li>Mức lương: Từ 8-10 triệu (t&ugrave;y năng lực).</li>\r\n	<li>Được đ&agrave;o tạo, ph&aacute;t triển trong c&ocirc;ng việc.</li>\r\n	<li>Được hưởng đầy đủ BHXH, BHYT v&agrave; BHTN theo luật lao động Việt Nam hiện h&agrave;nh.</li>\r\n	<li>M&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp, năng động Thưởng cuối năm, thưởng tết hấp dẫn theo kết quả kinh doanh của C&ocirc;ng ty.</li>\r\n</ul>\r\n\r\n<h2><strong>C&aacute;ch thức ứng tuyển</strong></h2>\r\n\r\n<p>Ứng vi&ecirc;n quan t&acirc;m vui l&ograve;ng nộp hồ sơ ứng tuyển tại: mypet.vn6688@gmail.com</p>\r\n\r\n<p>Số điện thoại li&ecirc;n hệ: 0911.493.158 (Zalo/ Viber/ Skype)</p>\r\n\r\n<p>Địa chỉ: VP &ndash; Tầng 3 &ndash; G4, Five Star Garden Building, 02 Kim Giang, P. Kim Giang, TP. H&agrave; Nội</p>', 'active', '/images/avatar/tuyen-dung.png', 1, NULL, NULL, '2021-04-12 20:56:47', 'admin'),
(2, 'Công ty cổ phần Mypet tuyển dụng nhân viên Account Executive', 'cong-ty-co-phan-mypet-tuyen-dung-nhan-vien-account-executive', '<p>Về vị tr&iacute; Nh&acirc;n vi&ecirc;n Account Executive của Mypet C&ocirc;ng ty Cổ phần Mypet&nbsp;l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s...</p>', '<p><img alt=\"\" src=\"https://mypet.vn/wp-content/uploads/2020/07/tuyen-dung-acc-executive-MyPet.jpg\" style=\"height:634px; width:850px\" /></p>\r\n\r\n<h1>C&ocirc;ng ty cổ phần Mypet tuyển dụng nh&acirc;n vi&ecirc;n Account Executive</h1>\r\n\r\n<h2><strong>Về vị tr&iacute; Nh&acirc;n vi&ecirc;n Account Executive của Mypet</strong></h2>\r\n\r\n<p><a href=\"https://mypet.vn/gioi-thieu/\"><strong>C&ocirc;ng ty Cổ phần Mypet</strong></a>&nbsp;l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện th&uacute; cưng tại Việt Nam, hiện thực h&oacute;a mong muốn mang lại lợi &iacute;ch đồng thời cho cả chủ nu&ocirc;i cũng như c&aacute;c trung t&acirc;m, cửa h&agrave;ng kinh doanh.</p>\r\n\r\n<p>Nh&acirc;n vi&ecirc;n Account Executive của Mypet l&agrave; người chịu tr&aacute;ch nhiệm ch&iacute;nh trong việc quản l&iacute; c&aacute;c vấn đề giao tiếp với kh&aacute;ch h&agrave;ng. Account Executive sẽ tiếp nhận kh&aacute;ch h&agrave;ng từ nh&acirc;n vi&ecirc;n kinh doanh để tiếp tục c&ocirc;ng việc chăm s&oacute;c, theo d&otilde;i, hỗ trợ v&agrave; đảm bảo tiến độ cung cấp sản phẩm/dịch vụ cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p><em><strong>Số lượng cần tuyển:</strong></em>&nbsp;Kh&ocirc;ng giới hạn</p>\r\n\r\n<p><img alt=\"Mypet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/06/Gioi-thieu-ung-dung-mypetvn-1.jpg\" style=\"height:560px; width:750px\" /></p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<ul>\r\n	<li>Chủ động t&igrave;m kiếm v&agrave; theo d&otilde;i kh&aacute;ch h&agrave;ng mới, đ&aacute;nh gi&aacute; nhu cầu kh&aacute;ch h&agrave;ng</li>\r\n	<li>Gặp gỡ v&agrave; tư vấn c&aacute;c sản phẩm/ dịch vụ nhằm mang lại giải ph&aacute;p cho kh&aacute;ch h&agrave;ng</li>\r\n	<li>Chịu tr&aacute;ch nhiệm x&acirc;y dựng, ph&aacute;t triển v&agrave; duy tr&igrave; mối quan hệ với c&aacute;c Kh&aacute;ch h&agrave;ng doanh nghiệp tiềm năng.</li>\r\n	<li>X&acirc;y dựng, ph&aacute;t triển kế hoạch kinh doanh đảm bảo thực hiện c&aacute;c mục ti&ecirc;u, chỉ ti&ecirc;u được giao.</li>\r\n	<li>Đảm bảo tất cả hoạt động kinh doanh tu&acirc;n thủ quy tr&igrave;nh l&agrave;m việc của c&ocirc;ng ty v&agrave; c&aacute;c y&ecirc;u cầu ph&aacute;p l&yacute; theo luật định.</li>\r\n</ul>\r\n\r\n<h2>PH&Uacute;C LỢI NH&Acirc;N VI&Ecirc;N</h2>\r\n\r\n<ul>\r\n	<li>Thu nhập hấp dẫn: Lương cứng + % hoa hồng + Thưởng</li>\r\n	<li>M&ocirc;i trường l&agrave;m việc năng động, th&acirc;n thiện</li>\r\n	<li>Cơ hội ph&aacute;t triển trong lĩnh vực truyền th&ocirc;ng, giải tr&iacute;</li>\r\n	<li>Được đảm bảo đầy đủ chế độ bảo hiểm, nghỉ ph&eacute;p</li>\r\n	<li>Thưởng KPI theo kết quả l&agrave;m việc v&agrave; tăng lương h&agrave;ng năm</li>\r\n	<li>Thưởng lễ, tết v&agrave; du lịch h&agrave;ng năm</li>\r\n	<li>Được trả lại ng&agrave;y ph&eacute;p chưa nghỉ hết v&agrave;o cuối năm.</li>\r\n</ul>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<ul>\r\n	<li>Ưu ti&ecirc;n tốt nghiệp Đại học/ Cao đẳng c&aacute;c chuy&ecirc;n ng&agrave;nh về marketing, thương mại, &hellip;</li>\r\n	<li>Ưu ti&ecirc;n c&oacute; kinh nghiệm sales B2B v&agrave; đặc biệt ưu ti&ecirc;n c&oacute; kinh nghiệm trong mảng quảng c&aacute;o, truyền th&ocirc;ng, lĩnh vực giải tr&iacute;, KOLs,..</li>\r\n	<li>C&oacute; kỹ năng đ&agrave;m ph&aacute;n v&agrave; giao tiếp tốt</li>\r\n	<li>C&oacute; kỹ năng x&acirc;y dựng mối quan hệ với kh&aacute;ch h&agrave;ng doanh nghiệp</li>\r\n	<li>Chăm chỉ v&agrave; c&oacute; tinh thần tr&aacute;ch nhiệm cao</li>\r\n</ul>\r\n\r\n<h2>C&Aacute;CH THỨC ỨNG TUYỂN</h2>\r\n\r\n<p>Ứng vi&ecirc;n vui l&ograve;ng nộp hồ sơ tại: info@mypet.vn</p>\r\n\r\n<p>Số điện thoại li&ecirc;n hệ: 096.239.5775 (Ms Linh)</p>\r\n\r\n<p>Địa chỉ: Tầng 3, T&ograve;a nh&agrave; GIM, 460 Khương Đ&igrave;nh, Thanh Xu&acirc;n, H&agrave; Nội.</p>', 'active', '/images/avatar/tuyen-dung.png', 2, NULL, NULL, NULL, NULL),
(3, 'Công ty cổ phần Mypet tuyển dụng vị trí Account Manager', 'cong-ty-co-phan-mypet-tuyen-dung-vi-tri-account-manager', '<p>Về vị tr&iacute; Account Manager của Mypet C&ocirc;ng ty Cổ phần Mypet&nbsp;l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện...</p>', '<p><img alt=\"MyPet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/07/account-manager-MyPet.jpg\" style=\"height:640px; width:850px\" /></p>\r\n\r\n<h1>C&ocirc;ng ty cổ phần Mypet tuyển dụng vị tr&iacute; Account Manager</h1>\r\n\r\n<h2><strong>Về vị tr&iacute; Account Manager của Mypet</strong></h2>\r\n\r\n<p><strong>C&ocirc;ng ty Cổ phần Mypet</strong>&nbsp;l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện th&uacute; cưng tại Việt Nam, hiện thực h&oacute;a mong muốn mang lại lợi &iacute;ch đồng thời cho cả chủ nu&ocirc;i cũng như c&aacute;c trung t&acirc;m, cửa h&agrave;ng kinh doanh.</p>\r\n\r\n<p>Account Manager của Mypet l&agrave; người chịu tr&aacute;ch nhiệm ch&iacute;nh trong việc quản l&iacute; c&aacute;c vấn đề giao tiếp với kh&aacute;ch h&agrave;ng. Ngo&agrave;i ra, Account Manager vừa phải đảm bảo mối quan hệ với kh&aacute;ch h&agrave;ng, quản trị dự &aacute;n, vừa phải điều phối c&ocirc;ng việc nội bộ.</p>\r\n\r\n<p><strong><em>Số lượng tuyển: 1 người</em></strong></p>\r\n\r\n<p>&nbsp;<img alt=\"Mypet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/07/conference-artwork-revision-grap-1.jpg\" style=\"height:390px; width:604px\" /></p>\r\n\r\n<h2><strong>M&ocirc; tả c&ocirc;ng việc</strong></h2>\r\n\r\n<ul>\r\n	<li>Trưởng ban thị trường chịu tr&aacute;ch nhiệm ph&aacute;t triển kinh doanh cho C&ocirc;ng ty, bao gồm việc t&igrave;m kiếm kh&aacute;ch h&agrave;ng mới, chăm s&oacute;c v&agrave; duy tr&igrave; c&aacute;c kh&aacute;ch h&agrave;ng cũ.</li>\r\n	<li>Quản l&yacute; đội ngũ nh&acirc;n vi&ecirc;n Account Executive.</li>\r\n	<li>Thực hiện c&aacute;c chiến lược tăng trưởng doanh thu, ph&aacute;t triển kinh doanh theo định hướng của c&ocirc;ng ty.</li>\r\n	<li>X&acirc;y dựng mối quan hệ tốt với kh&aacute;ch h&agrave;ng, mở rộng thị trường v&agrave; thị phần để đạt mục ti&ecirc;u doanh số.</li>\r\n	<li>Theo d&otilde;i tiến độ ho&agrave;n th&agrave;nh của c&aacute;c dự &aacute;n sau khi đ&atilde; k&yacute; hợp đồng với kh&aacute;ch h&agrave;ng, đảm bảo thực hiện đ&uacute;ng y&ecirc;u cầu v&agrave; kế hoạch được thực hiện một c&aacute;ch tốt nhất.</li>\r\n	<li>B&aacute;o c&aacute;o kết quả c&ocirc;ng việc thực hiện với cấp tr&ecirc;n.</li>\r\n</ul>\r\n\r\n<h2><strong>Y&ecirc;u cầu c&ocirc;ng việc</strong></h2>\r\n\r\n<ul>\r\n	<li>Nam nữ từ 25 tới 35 tuổi.</li>\r\n	<li>Ứng vi&ecirc;n c&oacute; kinh nghiệm l&agrave;m việc trong ng&agrave;nh truyền th&ocirc;ng quảng c&aacute;o v&agrave; l&agrave;m việc với c&aacute;c nh&atilde;n h&agrave;ng l&agrave; một lợi thế.</li>\r\n	<li>C&oacute; kinh nghiệm viết v&agrave; thuyết tr&igrave;nh c&aacute;c digital proposal, đ&agrave;m ph&aacute;n, giao tiếp tốt</li>\r\n	<li>C&oacute; khả năng giao tiếp tốt, kỹ năng x&acirc;y dựng quan hệ tốt với kh&aacute;ch h&agrave;ng v&agrave; c&aacute;c nh&agrave; cung cấp/c&aacute;c b&ecirc;n thứ 3.</li>\r\n	<li>C&oacute; tố chất kinh doanh, c&oacute; khả năng thuyết phục v&agrave; đ&agrave;m ph&aacute;n</li>\r\n	<li>Chịu được &aacute;p lực c&ocirc;ng việc &ndash; &aacute;p lực doanh số</li>\r\n	<li>Th&iacute;ch t&igrave;m hiểu về lĩnh vực c&ocirc;ng nghệ v&agrave; truyền th&ocirc;ng.</li>\r\n	<li>Sử dụng th&agrave;nh thạo m&aacute;y t&iacute;nh &amp; c&aacute;c phần mềm văn ph&ograve;ng</li>\r\n	<li>C&oacute; khả năng l&agrave;m việc độc lập v&agrave; chịu &aacute;p lực cao</li>\r\n	<li>Ưu ti&ecirc;n người c&oacute; khả năng giao tiếp tiếng Anh</li>\r\n</ul>\r\n\r\n<h2><strong>Quyền lợi</strong></h2>\r\n\r\n<ul>\r\n	<li>Thu nhập: 8.000.000 &ndash; 9.000.000 VNĐ lương cứng + phụ cấp + % doanh thu (Thu nhập trung b&igrave;nh: 10.000.000 &ndash; 30.000.000VNĐ)</li>\r\n	<li>Cơ hội l&agrave;m việc trong m&ocirc;i trường trẻ &ndash; năng động &ndash; th&acirc;n thiện, chuy&ecirc;n nghiệp, cơ hội thăng tiến theo năng lực.</li>\r\n	<li>Ăn Trưa, Lễ tết, Hiếu hỉ, sinh nhật, nghỉ m&aacute;t, ốm đau, thai sản, &hellip;</li>\r\n	<li>Phụ cấp: c&oacute; chế độ c&ocirc;ng t&aacute;c ph&iacute; theo quy định</li>\r\n	<li>Được hưởng đầy đủ quyền lợi BHXH, BHYT, BHTN sau khi l&agrave; nh&acirc;n vi&ecirc;n ch&iacute;nh thức</li>\r\n	<li>Giờ l&agrave;m việc: 8H00-17H00 Từ thứ 2 đến thứ 7</li>\r\n</ul>\r\n\r\n<h2><strong>C&aacute;ch thức ứng tuyển</strong></h2>\r\n\r\n<p><strong><em>Ứng vi&ecirc;n quan t&acirc;m vui l&ograve;ng nộp hồ sơ ứng tuyển tại</em></strong>: mypet.vn6688@gmail.com</p>\r\n\r\n<p><strong><em>Số điện thoại li&ecirc;n hệ</em></strong>: 0911.493.158 (Zalo/ Viber/ Skype)</p>\r\n\r\n<p><strong><em>Địa chỉ</em></strong>: VP &ndash; Tầng 3 &ndash; G4, Five Star Garden Building, 02 Kim Giang, P. Kim Giang, TP. H&agrave; Nội</p>', 'active', '/images/avatar/tuyen-dung.png', 3, NULL, NULL, NULL, NULL),
(4, 'Công Ty Cổ Phần Mypet Tuyển Dụng Business Consultant', 'cong-ty-co-phan-mypet-tuyen-dung-business-consultant', '<p>Về vị tr&iacute; Business Consultant tại Mypet &ndash; Khu vực TP. HCM Kh&aacute;c với c&ocirc;ng việc Sales tại c&aacute;c c&ocirc;ng ty kh&aacute;c, tại Mypet...</p>', '<p><img alt=\"MyPet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/07/Tuyen-dung-bussiness-MyPet.jpg\" style=\"height:579px; width:850px\" /></p>\r\n\r\n<h1>C&ocirc;ng Ty Cổ Phần Mypet Tuyển Dụng Business Consultant</h1>\r\n\r\n<h3><strong>Về vị tr&iacute; Business Consultant tại Mypet &ndash; Khu vực TP. HCM</strong></h3>\r\n\r\n<p>Kh&aacute;c với c&ocirc;ng việc Sales tại c&aacute;c c&ocirc;ng ty kh&aacute;c, tại Mypet.vn, Business Consultant (Hay c&ograve;n gọi l&agrave; Chuy&ecirc;n vi&ecirc;n tư vấn kinh doanh) ch&iacute;nh l&agrave; người chịu tr&aacute;ch nhiệm trong việc tăng trưởng Doanh thu v&agrave; Kh&aacute;ch h&agrave;ng của C&ocirc;ng ty v&agrave; l&agrave; một trong những vị tr&iacute; quan trọng nhất.</p>\r\n\r\n<p>Để th&agrave;nh c&ocirc;ng tại vị tr&iacute; n&agrave;y, bạn kh&ocirc;ng chỉ cần c&oacute; tố chất của một người l&agrave;m Sales để tạo ra sự tăng trưởng m&agrave; b&ecirc;n cạnh đ&oacute; l&agrave; Tư duy, Kiến thức v&agrave; Kĩ năng của một người l&agrave;m tư vấn cho c&aacute;c Doanh Nghiệp.</p>\r\n\r\n<p><img alt=\"MyPet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/05/mypet-02.png\" style=\"height:1000px; width:750px\" /></p>\r\n\r\n<h3><strong>1, C&ocirc;ng việc của Business Consultant tại Mypet</strong></h3>\r\n\r\n<ul>\r\n	<li>Tạo dựng ph&aacute;t triển mạng lưới quan hệ với kh&aacute;ch h&agrave;ng tại khu vực TP.HCM bằng việc chủ động li&ecirc;n lạc qua điện thoại, email</li>\r\n	<li>Giới thiệu, tư vấn, quảng b&aacute; APP cũng như c&aacute;c dịch vụ hiện tại.</li>\r\n	<li>Hướng dẫn kh&aacute;ch h&agrave;ng sử dụng APP/ Dịch vụ</li>\r\n	<li>Ph&acirc;n t&iacute;ch c&aacute;c vấn đề Kh&aacute;ch h&agrave;ng gặp phải trong qu&aacute; tr&igrave;nh quản l&yacute; v&agrave; vận h&agrave;nh</li>\r\n	<li>Đề xuất giải ph&aacute;p c&ocirc;ng nghệ ph&ugrave; hợp qua việc thuyết tr&igrave;nh v&agrave; Demo.</li>\r\n	<li>Thương lượng phương &aacute;n hợp t&aacute;c v&agrave; triển khai c&ocirc;ng nghệ</li>\r\n	<li>Phối hợp c&ugrave;ng bộ phận triển khai nhằm đảm bảo Giải ph&aacute;p c&ocirc;ng nghệ được ứng dụng th&agrave;nh c&ocirc;ng cho Kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Mở rộng mạng lưới quan hệ với c&aacute;c cấp quản l&yacute; v&agrave; gi&aacute;m đốc của c&aacute;c Doanh Nghiệp.</li>\r\n	<li>Hỗ trợ thực hiện c&aacute;c hoạt động li&ecirc;n quan đến tiếp thị, quảng b&aacute;, ph&aacute;t triển sản phẩm, chăm s&oacute;c kh&aacute;ch h&agrave;ng.</li>\r\n</ul>\r\n\r\n<h3><strong>2, Tố chất cần c&oacute; của Business Consultant:</strong></h3>\r\n\r\n<ul>\r\n	<li>Tư duy cởi mở, chủ động v&agrave; ham học hỏi</li>\r\n	<li>Kỹ năng thuyết tr&igrave;nh v&agrave; giao tiếp tốt</li>\r\n	<li>Kỹ năng t&igrave;m hiểu thị trường</li>\r\n	<li>Khả năng tư duy v&agrave; giải quyết vấn đề</li>\r\n	<li>Tinh thần tr&aacute;ch nhiệm, quyết đo&aacute;n trong c&ocirc;ng việc</li>\r\n</ul>\r\n\r\n<p><strong><em>*** Ưu ti&ecirc;n:</em></strong></p>\r\n\r\n<ul>\r\n	<li>Tốt nghiệp Cao đẳng, Đại học. Ưu ti&ecirc;n c&aacute;c trường TOP: FTU, NEU, etc.</li>\r\n	<li>Sinh vi&ecirc;n mới ra trường c&oacute; th&agrave;nh t&iacute;ch hoạt động ngoại kh&oacute;a nổi bật hoặc người đi l&agrave;m tr&ecirc;n 1 năm kinh nghiệm.</li>\r\n</ul>\r\n\r\n<h3><strong>3, Quyền lợi của Business Consultant tại Mypet</strong></h3>\r\n\r\n<ul>\r\n	<li>Thu nhập kh&ocirc;ng giới hạn gồm: Lương cứng + Lương KPI + Thưởng n&oacute;ng, tổng thu nhập từ 10 &ndash; 30 triệu đồng</li>\r\n	<li>X&eacute;t tăng lương v&agrave; n&acirc;ng cấp bậc định kỳ 3-6 th&aacute;ng một lần</li>\r\n</ul>\r\n\r\n<p><strong><em>*** Quyền lợi kh&aacute;c:</em></strong></p>\r\n\r\n<ul>\r\n	<li>Được đ&agrave;o tạo b&agrave;i bản v&agrave; chuy&ecirc;n nghiệp về B2B Sales</li>\r\n	<li>Được ph&aacute;t triển v&agrave; n&acirc;ng cao kiến thức quản trị Doanh Nghiệp trong sự ph&aacute;t triển của c&ocirc;ng nghệ: Quản trị nh&acirc;n sự, Quy tr&igrave;nh v&agrave; hiệu suất l&agrave;m việc, Quản trị mục ti&ecirc;u&hellip;</li>\r\n	<li>Mở rộng quan hệ với c&aacute;c mạng lưới CEO v&agrave; quản l&yacute; Doanh Nghiệp.</li>\r\n	<li>Thoải m&aacute;i chia sẻ kh&oacute; khăn, nguyện vọng với cấp tr&ecirc;n để được hỗ trợ</li>\r\n	<li>Sản phẩm của c&ocirc;ng ty l&agrave; đầu ti&ecirc;n v&agrave; duy nhất tại Việt Nam (chưa c&oacute; đối thủ cạnh tranh trực tiếp) n&ecirc;n rất thuận lợi trong qu&aacute; tr&igrave;nh tư vấn v&agrave; b&aacute;n h&agrave;ng.</li>\r\n	<li>Đặc biệt, nh&acirc;n vi&ecirc;n được sử dụng tất cả c&aacute;c dịch vụ về thẩm mỹ trong hệ thống</li>\r\n</ul>\r\n\r\n<h3><strong>4, C&aacute;ch thức ứng tuyển:</strong></h3>\r\n\r\n<p>Ứng vi&ecirc;n quan t&acirc;m vui l&ograve;ng nộp hồ sơ ứng tuyển tại: info@mypet.vn</p>\r\n\r\n<p><strong><em>Số điện thoại li&ecirc;n hệ</em></strong>: 0911.493.158 (Zalo/ Viber/ Skype)</p>', 'active', '/images/avatar/tuyen-dung.png', 4, NULL, NULL, NULL, NULL),
(5, 'Công ty cổ phần Mypet tuyển dụng vị trí Content Creator', 'cong-ty-co-phan-mypet-tuyen-dung-vi-tri-content-creator', '<p>Về vị tr&iacute; Content Creator của MyPet C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện...</p>', '<p><img alt=\"MyPet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/10/Content-Creator-01-01.jpg\" style=\"height:782px; width:850px\" /></p>\r\n\r\n<h1>C&ocirc;ng ty cổ phần Mypet tuyển dụng vị tr&iacute; Content Creator</h1>\r\n\r\n<h2><strong>Về vị tr&iacute; Content Creator của MyPet</strong></h2>\r\n\r\n<p>C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện th&uacute; cưng tại Việt Nam, hiện thực h&oacute;a mong muốn mang lại lợi &iacute;ch đồng thời cho cả chủ nu&ocirc;i cũng như c&aacute;c trung t&acirc;m, cửa h&agrave;ng kinh doanh.</p>\r\n\r\n<p>Vị tr&iacute; Content Creator của Mypet sẽ s&aacute;ng tạo ra c&aacute;c nội dung hấp dẫn, th&uacute; vị v&agrave; c&oacute; độ lan tỏa cao. Những nội dung n&agrave;y sẽ được sử dụng v&agrave;o c&aacute;c k&ecirc;nh truyền th&ocirc;ng của MyPet để th&uacute;c đẩy thương hiệu v&agrave; tăng hiệu ứng lan tỏa của dịch vụ ứng dụng.</p>\r\n\r\n<p>Số lượng cần tuyển: Kh&ocirc;ng giới hạn</p>\r\n\r\n<p><img alt=\"MyPet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/10/Content-Creator-01-01-1024x942.jpg\" style=\"height:942px; width:1024px\" /></p>\r\n\r\n<h2>M&ocirc; tả c&ocirc;ng việc</h2>\r\n\r\n<ul>\r\n	<li>Phát triển chiến lược nội dung phù hợp với các mục tiêu tiếp thị ngắn hạn và dài hạn</li>\r\n	<li>Tạo và xuất bản nội dung hấp dẫn</li>\r\n	<li>Phối hợp với Brand Manager để đảm bảo tính nhất quán của thương hiệu</li>\r\n	<li>Phối hợp với bộ phận Phát triển và Bán hàng để cập nhật các sản phẩm và tính năng mới</li>\r\n	<li>Tối ưu hóa nội dung theo SEO</li>\r\n	<li>Xây dựng kế hoạch biên tập và đảm bảo hoàn thành deadline</li>\r\n	<li>Luôn cập nhật sự phát triển và đưa ra những ý tưởng mới để thu hút sự chú ý của khán giả</li>\r\n	<li>Luôn cập nhật các xu hướng công nghệ số</li>\r\n</ul>\r\n\r\n<h2>Y&ecirc;u cầu c&ocirc;ng việc</h2>\r\n\r\n<ul>\r\n	<li>Có kinh nghiệm làm việc ở vị trí Biên tập viên nội dung</li>\r\n	<li>Có kinh nghiệm sản xuất nội dung quảng c&aacute;o/Ads</li>\r\n	<li>Kiến thức về SEO và số liệu lưu lượng truy cập web</li>\r\n	<li>Quen thuộc với mạng xã hội</li>\r\n	<li>Kỹ năng viết tốt cả tiếng Việt và tiếng Anh</li>\r\n	<li>Ưu tiên bằng Cử nhân Báo chí, Tiếp thị hoặc lĩnh vực liên quan</li>\r\n</ul>\r\n\r\n<h2>Quyền lợi</h2>\r\n\r\n<ul>\r\n	<li>Lương thưởng: trao đổi khi phỏng vấn</li>\r\n	<li>Môi trường trẻ trung, chuyên nghiệp và mang tính xây dựng</li>\r\n	<li>Đóng BHXH theo luật lao động Việt Nam</li>\r\n	<li>Giờ vui, tiệc sinh nhật, &hellip;</li>\r\n	<li>Các hoạt động team building</li>\r\n</ul>\r\n\r\n<h2><strong>C&aacute;ch thức ứng tuyển</strong></h2>\r\n\r\n<ul>\r\n	<li>Ứng vi&ecirc;n vui l&ograve;ng nộp hồ sơ tại: info@mypet.vn</li>\r\n	<li>Số điện thoại li&ecirc;n hệ: 096.239.5775 (Ms Linh)</li>\r\n	<li>Địa chỉ: Tầng 3, T&ograve;a nh&agrave; GIM, 460 Khương Đ&igrave;nh, Thanh Xu&acirc;n, H&agrave; Nội.</li>\r\n</ul>', 'active', '/images/avatar/tuyen-dung.png', 5, NULL, NULL, NULL, NULL),
(6, 'Công ty cổ phần Mypet tuyển dụng vị trí Biên tập viên Youtube', 'mypet-tuyen-dung-vi-tri-bien-tap-vien-youtube', '<p>Về vị tr&iacute; Bi&ecirc;n tập vi&ecirc;n của MyPet C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện t...</p>', '<p><img alt=\"MyPet tuyển dụng\" src=\"https://mypet.vn/wp-content/uploads/2020/10/BTV-Youtube-01-01-2048x1884-1.jpg\" style=\"height:550px; width:850px\" /></p>\r\n\r\n<h1>C&ocirc;ng ty cổ phần Mypet tuyển dụng vị tr&iacute; Bi&ecirc;n tập vi&ecirc;n Youtube</h1>\r\n\r\n<h2><strong>Về vị tr&iacute; Bi&ecirc;n tập vi&ecirc;n của MyPet</strong></h2>\r\n\r\n<p>C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện th&uacute; cưng tại Việt Nam, hiện thực h&oacute;a mong muốn mang lại lợi &iacute;ch đồng thời cho cả chủ nu&ocirc;i cũng như c&aacute;c trung t&acirc;m, cửa h&agrave;ng kinh doanh.</p>\r\n\r\n<p>Vị tr&iacute; Bi&ecirc;n tập vi&ecirc;n của Mypet sẽ đảm nhận c&ocirc;ng việc thực hiện bi&ecirc;n tập nội dung, kịch bản cho video sản phẩm của c&ocirc;ng ty. Ngo&agrave;i ra, bạn sẽ chịu tr&aacute;ch nhiệm X&acirc;y dựng v&agrave; quản l&yacute; k&ecirc;nh Youtube, gi&uacute;p tăng trưởng v&agrave; th&uacute;c đẩy thương hiệu, tăng hiệu ứng lan tỏa của dịch vụ ứng dụng.</p>\r\n\r\n<p>Số lượng cần tuyển: Kh&ocirc;ng giới hạn</p>\r\n\r\n<p><img alt=\"\" src=\"https://mypet.vn/wp-content/uploads/2020/09/Web_850x550-banner.jpg\" style=\"height:550px; width:850px\" /></p>\r\n\r\n<h2><strong>M&ocirc; tả c&ocirc;ng việc</strong></h2>\r\n\r\n<ul>\r\n	<li>L&ecirc;n &yacute; tưởng v&agrave; viết kịch bản, bi&ecirc;n tập nội dung nhằm thu h&uacute;t v&agrave; tăng lượng viral k&ecirc;nh Youtube c&ocirc;ng ty</li>\r\n	<li>Triển khai kịch bản quay v&agrave; kịch bản chi tiết cho video</li>\r\n	<li>X&acirc;y dựng v&agrave; quản l&yacute; k&ecirc;nh Youtube cho c&ocirc;ng ty</li>\r\n	<li>Ph&acirc;n t&iacute;ch đ&aacute;nh gi&aacute; k&ecirc;nh Youtube, đề xuất c&aacute;c phương &aacute;n cải thiện k&ecirc;nh v&agrave; kết nối v&agrave; tăng tương t&aacute;c giữa c&aacute;c nền tảng Youtube, Facebook v&agrave; Tiktok.</li>\r\n	<li>Hỗ trợ c&aacute;c bộ phận kh&aacute;c khi được y&ecirc;u cầu, c&aacute;c c&ocirc;ng việc li&ecirc;n quan đến chuy&ecirc;n m&ocirc;n hoặc hoạt động quảng b&aacute; cho c&ocirc;ng ty</li>\r\n</ul>\r\n\r\n<h2><strong>Y&ecirc;u cầu c&ocirc;ng việc</strong></h2>\r\n\r\n<ul>\r\n	<li>S&aacute;ng tạo, c&oacute; tư duy tốt về nội dung v&agrave; h&igrave;nh ảnh&nbsp;</li>\r\n	<li>C&oacute; khả năng viết l&aacute;ch tốt&nbsp;</li>\r\n	<li>Biết ph&acirc;n t&iacute;ch v&agrave; đ&aacute;nh gi&aacute; t&igrave;nh trạng một k&ecirc;nh Youtube v&agrave; l&ecirc;n kế hoạch ph&aacute;t triển k&ecirc;nh</li>\r\n	<li>Am hiểu thuật to&aacute;n v&agrave; c&aacute;c cập nhật mới của Youtube</li>\r\n	<li>Kỹ năng teamwork v&agrave; quản l&yacute; team tốt</li>\r\n	<li>Sử dụng th&agrave;nh thạo c&aacute;c c&ocirc;ng cụ hỗ trợ ph&acirc;n t&iacute;ch v&agrave; tối ưu video Youtube l&agrave; một lợi thế&nbsp;</li>\r\n	<li>C&oacute; kinh nghiệm S.E.O Youtube l&agrave; 1 lợi thế</li>\r\n	<li>Biết sử dụng Photoshop, Adobe Premiere cơ bản, cắt dựng clip cơ bản l&agrave; 1 lợi thế</li>\r\n</ul>\r\n\r\n<p><strong>PH&Uacute;C LỢI NH&Acirc;N VI&Ecirc;N</strong></p>\r\n\r\n<ul>\r\n	<li>Thu nhập hấp dẫn: Lương cứng + Thưởng + Phụ cấp</li>\r\n	<li>M&ocirc;i trường l&agrave;m việc trẻ trung, năng động, th&acirc;n thiện</li>\r\n	<li>Thưởng theo kết quả l&agrave;m việc v&agrave; tăng lương h&agrave;ng năm</li>\r\n	<li>Thưởng lễ, tết v&agrave; du lịch h&agrave;ng năm</li>\r\n</ul>\r\n\r\n<p><strong>C&aacute;ch thức ứng tuyển</strong></p>\r\n\r\n<ul>\r\n	<li>Ứng vi&ecirc;n vui l&ograve;ng nộp hồ sơ tại: info@mypet.vn</li>\r\n	<li>Số điện thoại li&ecirc;n hệ: 096.239.5775 (Ms Linh)</li>\r\n	<li>Địa chỉ: Tầng 3, T&ograve;a nh&agrave; GIM, 460 Khương Đ&igrave;nh, Thanh Xu&acirc;n, H&agrave; Nội.</li>\r\n</ul>', 'active', '/images/avatar/tuyen-dung.png', 6, NULL, NULL, NULL, NULL),
(7, 'Công ty cổ phần Mypet tuyển dụng vị trí Senior Content Creator', 'cong-ty-co-phan-mypet-tuyen-dung-vi-tri-senior-content-creator', '<p>MyPet tuyển dụng Senior Content Creator, vị tr&iacute; sẽ s&aacute;ng tạo ra c&aacute;c nội dung hấp dẫn, th&uacute; vị v&agrave; c&oacute; độ lan tỏa cao...</p>', '<p><img alt=\"\" src=\"https://mypet.vn/wp-content/uploads/2020/11/125261248_846266326146216_7558260910088478585_n.jpg\" style=\"height:850px; width:850px\" /></p>\r\n\r\n<h1>C&ocirc;ng ty cổ phần Mypet tuyển dụng vị tr&iacute; Senior Content Creator</h1>\r\n\r\n<p><em>MyPet tuyển dụng Senior Content Creator, vị tr&iacute; sẽ s&aacute;ng tạo ra c&aacute;c nội dung hấp dẫn, th&uacute; vị v&agrave; c&oacute; độ lan tỏa cao.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Về vị tr&iacute; Senior Content Creator</h2>\r\n\r\n<p>C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện th&uacute; cưng tại Việt Nam, hiện thực h&oacute;a mong muốn mang lại lợi &iacute;ch đồng thời cho cả chủ nu&ocirc;i cũng như c&aacute;c trung t&acirc;m, cửa h&agrave;ng kinh doanh.</p>\r\n\r\n<p>Vị tr&iacute; Senior Content Creator của Mypet sẽ s&aacute;ng tạo ra c&aacute;c nội dung hấp dẫn, th&uacute; vị v&agrave; c&oacute; độ lan tỏa cao. Những nội dung n&agrave;y sẽ được sử dụng v&agrave;o c&aacute;c k&ecirc;nh truyền th&ocirc;ng của MyPet để th&uacute;c đẩy thương hiệu v&agrave; tăng hiệu ứng lan tỏa của dịch vụ ứng dụng.</p>\r\n\r\n<p>Số lượng cần tuyển: Kh&ocirc;ng giới hạn</p>\r\n\r\n<p><img alt=\"\" src=\"https://mypet.vn/wp-content/uploads/2020/11/Web_850x550-banner.jpg\" style=\"height:550px; width:850px\" /></p>\r\n\r\n<h2><strong>M&ocirc; tả c&ocirc;ng việc</strong></h2>\r\n\r\n<ul>\r\n	<li>Trực tiếp triển khai xử l&yacute; h&igrave;nh ảnh v&agrave; s&aacute;ng tạo c&aacute;c nội dung duy tr&igrave; hoặc thuộc c&aacute;c chiến dịch truyền th&ocirc;ng cho thương hiệu tr&ecirc;n đa dạng nền tảng: Facebook, Instagram, Website, App, Youtube</li>\r\n	<li>Đề xuất &yacute; tưởng s&aacute;ng tạo cho c&aacute;c chiến dịch truyền th&ocirc;ng đ&aacute;nh tr&uacute;ng insight của kh&aacute;ch h&agrave;ng v&agrave; tạo hiệu ứng lan truyền tốt.</li>\r\n	<li>Phối hợp với Media Production Team l&ecirc;n kịch bản, moodboard quay/ chụp &amp; kiểm so&aacute;t chất lượng sản phẩm</li>\r\n	<li>Quản l&yacute; c&aacute;c k&ecirc;nh truyền th&ocirc;ng, bảo đảm nội dung, h&igrave;nh ảnh lu&ocirc;n được cập nhật, theo đ&uacute;ng brand voice của thương hiệu.</li>\r\n	<li>Quản l&yacute; comment v&agrave; th&ocirc;ng b&aacute;o tới c&aacute;c bộ phận li&ecirc;n quan để giải đ&aacute;p thắc mắc của kh&aacute;ch h&agrave;ng.</li>\r\n	<li>L&agrave;m c&aacute;c b&aacute;o c&aacute;o hiệu quả về c&aacute;c campaign, c&aacute;c k&ecirc;nh truyền th&ocirc;ng&hellip; khi c&oacute; y&ecirc;u cầu.</li>\r\n	<li>Chủ động update c&aacute;c xu hướng văn h&oacute;a v&agrave; đời sống,&hellip;</li>\r\n</ul>\r\n\r\n<h2><strong>Y&ecirc;u cầu c&ocirc;ng việc</strong></h2>\r\n\r\n<ul>\r\n	<li>Y&ecirc;u cầu tối thiểu 1-2 năm kinh nghiệm tại vị tr&iacute; tương đương</li>\r\n	<li>S&aacute;ng tạo, c&oacute; tư duy tốt về nội dung v&agrave; h&igrave;nh ảnh&nbsp;</li>\r\n	<li>C&oacute; khả năng viết l&aacute;ch tốt&nbsp;</li>\r\n	<li>Chăm chỉ, tr&aacute;ch nhiệm, c&oacute; tinh thần chủ động đề xuất giải quyết vấn đề</li>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n biết cơ bản về Digital Marketing&nbsp;</li>\r\n	<li>Biết sử dụng Photoshop, Adobe Premiere cơ bản cơ bản l&agrave; 1 lợi thế</li>\r\n</ul>\r\n\r\n<h2><strong>PH&Uacute;C LỢI NH&Acirc;N VI&Ecirc;N</strong></h2>\r\n\r\n<ul>\r\n	<li>Thu nhập hấp dẫn: Lương cứng + Thưởng + Phụ cấp</li>\r\n	<li>M&ocirc;i trường l&agrave;m việc trẻ trung, năng động, th&acirc;n thiện</li>\r\n	<li>Thưởng theo kết quả l&agrave;m việc v&agrave; tăng lương h&agrave;ng năm</li>\r\n	<li>Thưởng lễ, tết v&agrave; du lịch h&agrave;ng năm</li>\r\n	<li>C&aacute;ch thức ứng tuyển</li>\r\n</ul>\r\n\r\n<h2><strong>C&aacute;ch thức ứng tuyển</strong></h2>\r\n\r\n<p>Ứng vi&ecirc;n vui l&ograve;ng nộp hồ sơ tại: info@mypet.vn</p>\r\n\r\n<p>Số điện thoại li&ecirc;n hệ: 096.239.5775 (Ms Linh)</p>\r\n\r\n<p>Địa chỉ: Tầng 3, T&ograve;a nh&agrave; GIM, 460 Khương Đ&igrave;nh, Thanh Xu&acirc;n, H&agrave; Nội.</p>', 'active', '/images/avatar/tuyen-dung.png', 7, NULL, NULL, NULL, NULL),
(8, 'Công ty cổ phần MyPet tuyển dụng thiết kế UI/UX', 'cong-ty-co-phan-mypet-tuyen-dung-thiet-ke-uiux', '<p>Về vị tr&iacute; thiết kế UI/UX của MyPet C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện...</p>', '<p><img alt=\"\" src=\"https://mypet.vn/wp-content/uploads/2021/01/tuyen-dung.png\" style=\"height:695px; width:850px\" /></p>\r\n\r\n<h1>C&ocirc;ng ty cổ phần MyPet tuyển dụng thiết kế UI/UX</h1>\r\n\r\n<h2><strong>Về vị tr&iacute; thiết kế UI/UX của MyPet</strong></h2>\r\n\r\n<p>C&ocirc;ng ty Cổ phần Mypet l&agrave; c&ocirc;ng ty ti&ecirc;n phong về ứng dụng c&ocirc;ng nghệ chăm s&oacute;c to&agrave;n diện th&uacute; cưng tại Việt Nam, hiện thực h&oacute;a mong muốn mang lại lợi &iacute;ch đồng thời cho cả chủ nu&ocirc;i cũng như c&aacute;c trung t&acirc;m, cửa h&agrave;ng kinh doanh.</p>\r\n\r\n<p>Vị tr&iacute; thiết kế UI/UX của Mypet sẽ phối hợp với Gi&aacute;m đốc sản phẩm để tạo ra những bản thiết kế giao diện người d&ugrave;ng cho c&aacute;c ứng dụng di động, website thuộc hệ thống c&ocirc;ng ty.</p>\r\n\r\n<p>Số lượng cần tuyển: Kh&ocirc;ng giới hạn</p>\r\n\r\n<p><img alt=\"\" src=\"https://mypet.vn/wp-content/uploads/2021/01/tuyen-dung.png\" style=\"height:900px; width:1100px\" /></p>\r\n\r\n<h2><strong>M&ocirc; tả c&ocirc;ng việc</strong></h2>\r\n\r\n<ul>\r\n	<li>Đ&aacute;nh gi&aacute; c&aacute;c y&ecirc;u cầu của người d&ugrave;ng, phối hợp với c&aacute;c bản vẽ Mock-up của gi&aacute;m đốc sản phẩm v&agrave; bộ phận kỹ thuật.</li>\r\n	<li>C&oacute; khả năng vẽ Wireframe theo &yacute; tưởng dự &aacute;n đưa ra.</li>\r\n	<li>Thiết kế c&aacute;c yếu tố giao diện App/Web</li>\r\n</ul>\r\n\r\n<h2><strong>Y&ecirc;u cầu</strong></h2>\r\n\r\n<ul>\r\n	<li>C&oacute; kiến thức vững v&agrave;ng về lĩnh vực Design, UI/UX.</li>\r\n	<li>C&oacute; tr&ecirc;n 1-2 năm kinh nghiệm ở vị tr&iacute; tương tự cho cho App/Web.</li>\r\n	<li>Th&agrave;nh thạo một trong c&aacute;c c&ocirc;ng cụ thiết kế: Figma, Photoshop, Zeplin, Illustrator,&nbsp;</li>\r\n	<li>Hiểu th&agrave;nh phần Front-end của trang web (HTML, CSS cơ bản được ưu ti&ecirc;n).</li>\r\n	<li>C&oacute; khả năng th&iacute;ch nghi trong m&ocirc;i trường khởi nghiệp với nhịp độ l&agrave;m việc nhanh</li>\r\n</ul>\r\n\r\n<h2>Quyền lợi</h2>\r\n\r\n<ul>\r\n	<li>Mức lương: 10-15 triệu (t&ugrave;y năng lực)</li>\r\n	<li>Môi trường trẻ trung, chuyên nghiệp và mang tính xây dựng</li>\r\n	<li>Đóng BHXH theo luật lao động Việt Nam</li>\r\n	<li>Giờ vui, tiệc sinh nhật, &hellip;</li>\r\n	<li>Các hoạt động team building</li>\r\n	<li>Trợ cấp ăn uống, gửi xe,&hellip;.</li>\r\n	<li>M&aacute;y t&iacute;nh x&aacute;ch tay (Macbook / Window) được cung cấp.</li>\r\n</ul>\r\n\r\n<h2><strong>C&aacute;ch thức ứng tuyển</strong></h2>\r\n\r\n<ul>\r\n	<li>Ứng vi&ecirc;n vui l&ograve;ng nộp hồ sơ tại: info@mypet.vn</li>\r\n	<li>Số điện thoại li&ecirc;n hệ: 096.239.5775 (Ms Linh)</li>\r\n	<li>Địa chỉ: Tầng 3, T&ograve;a nh&agrave; GIM, 460 Khương Đ&igrave;nh, Thanh Xu&acirc;n, H&agrave; Nội.</li>\r\n</ul>', 'active', '/images/avatar/tuyen-dung.png', 8, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rss`
--

CREATE TABLE `rss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `source` varchar(45) NOT NULL,
  `article_per_page` int(3) DEFAULT 2,
  `ordering` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rss`
--

INSERT INTO `rss` (`id`, `name`, `status`, `link`, `source`, `article_per_page`, `ordering`) VALUES
(1, 'vnexpress.net Thế Giới', 'active', 'https://vnexpress.net/rss/the-gioi.rss', 'vnexpress', 2, 1),
(2, 'vnexpress Kinh Doanh', 'active', 'https://vnexpress.net/rss/kinh-doanh.rss', 'vnexpress', 1, 3),
(3, 'Cafe Biz Tài Chính', 'inactive', 'https://cafebiz.vn/tai-chinh.rss', 'cafebiz', 2, 2),
(4, 'vnexpress Giải trí', 'active', 'https://vnexpress.net/rss/giai-tri.rss', 'vnexpress', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rss_content`
--

CREATE TABLE `rss_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rss_content`
--

INSERT INTO `rss_content` (`id`, `name`, `description`, `short_description`, `category_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Thức ăn Veggies cho Fish 1', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_1', 10, '2021-03-29 08:57:12', 'admin', NULL, NULL),
(2, 'Thức ăn Carrots cho Chó 2', '<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it\'s safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It\'s also dishwasher safe for easy cleanup. </p>\r\n                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>\r\n                        <ul>\r\n                            <li>Key Features:</li>\r\n                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>\r\n                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>\r\n                            <li>Fat-free frying, metal utensils safe</li>\r\n                            <li>Suitable for all stove tops, except induction</li>\r\n                            <li>Guaranteed not to warp</li>\r\n                            <li>Fast and even heat distribution</li>\r\n                            <li>Ovenproof up to 260°C</li>\r\n                            <li>Dishwasher safe - but not recommended</li>\r\n                            <li>Designed and manufactured in Denmark</li>\r\n                        </ul>', 'short_description product_id_ short_description product_id_ short_description product_id_2', 5, '2021-03-29 08:57:12', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key_value`, `value`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'setting-general', '{\"logo\":\"\\/images\\/logo\\/logo.png\",\"hotline\":\"036.234.4174\",\"working_time\":\"8:00-17:00\",\"copyright\":\"Copyright © Pet Shop. All Right Reserved.\",\"address\":\"Lê Văn Việt, Q9, HCM\",\"introduce\":\"<p>Pet Shop l&agrave; nh&atilde;n hiệu của c&aacute;c sản phẩm Đồ ăn cho Th&uacute; cưng&nbsp;v&agrave; rất nhiều sản phẩm kh&aacute;c,...<\\/p>\\r\\n\\r\\n<p>GPKD: 3500376775 - Ng&agrave;y cấp: 24\\/1\\/2000<\\/p>\\r\\n\\r\\n<p>Nơi cấp: sở kế hoạch v&agrave; đầu tư tỉnh B&agrave; Rịa - Vũng T&agrave;u<\\/p>\",\"contact_column_1\":\"<p>Our Location<\\/p>\\r\\n\\r\\n<p>012 345 678 \\/ 123 456 789<\\/p>\\r\\n\\r\\n<p><a href=\\\"#\\\">info@example.com<\\/a><\\/p>\",\"contact_column_2\":\"<p>Contact us Anytime<\\/p>\\r\\n\\r\\n<p>Mobile: 012 345 678<\\/p>\\r\\n\\r\\n<p>Fax: 123 456 789<\\/p>\",\"contact_column_3\":\"<pre>\\r\\nWrite Some Words<\\/pre>\\r\\n\\r\\n<p><a href=\\\"#\\\">Support24\\/7@example.com <\\/a><\\/p>\\r\\n\\r\\n<p><a href=\\\"#\\\">info@example.com<\\/a><\\/p>\",\"maps\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m14!1m8!1m3!1d15671.051924420948!2d106.8504338!3d10.9056093!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd25922dd76a3040f!2zQmlnIEMgxJDhu5NuZyBOYWk!5e0!3m2!1sen!2s!4v1616783985050!5m2!1sen!2s\\\" width=\\\"1200\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\"><\\/iframe>\"}', NULL, NULL, NULL, NULL),
(2, 'setting-social', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/profile.php?id=100004868670715\",\"youtube\":\"https:\\/\\/www.youtube.com\\/user\\/zendvn123\",\"google\":\"https:\\/\\/www.google.com\\/search?q=zenvn&rlz=1C1CHBF_enVN942VN942&oq=zenvn&aqs=chrome..69i57j46i175i199.2823j0j4&sourceid=chrome&ie=UTF-8\"}', NULL, NULL, NULL, NULL),
(3, 'setting-email', '{\"username\":\"vuducsaobien95@gmail.com\",\"password\":\"mszmgzjxpyawmcsb\"}', NULL, NULL, NULL, NULL),
(4, 'setting-bcc', 'vuducsaobien94@gmail.com', NULL, NULL, NULL, NULL),
(8, 'filter_price_min', '20000', NULL, NULL, NULL, NULL),
(9, 'filter_price_min_plus', '10000', NULL, NULL, NULL, NULL),
(10, 'filter_price_max', '300000', NULL, NULL, NULL, NULL),
(11, 'filter_price_max_minus', '100000', NULL, NULL, NULL, NULL),
(12, 'filter_price_range', '10000', NULL, NULL, NULL, NULL),
(13, 'setting-share', '{\"app\":[\"facebook\",\"twitter\",\"pinterest\"],\"page\":[\"article\",\"product\"],\"placement\":\"before\"}', NULL, NULL, NULL, NULL),
(14, 'setting-youtube', 'https://www.youtube.com/watch?v=3yJeeub-6RY&list=PLv6GftO355AvF4DaKpZAfRkapUTK4vDX8', NULL, NULL, NULL, NULL),
(17, 'youtube-playlist-id', 'https://www.youtube.com/playlist?list=PLFLh04JZg3rPYgE400fEcH8Wd5QQxlE8s', NULL, NULL, NULL, NULL),
(18, 'youtube-playlist-link-ids', '[\"Pi1IwAVx9Qk\",\"mjj-y_X3LX8\",\"yULk4918vE4\",\"QRCmKUVvUBo\",\"iX2vvsXlAdk\",\"1MnLFIUS7rI\",\"icsB-sEc6eY\",\"rq_9L2qDlb8\",\"X2xSgrkUecM\",\"K_f96z_GJYo\"]', NULL, NULL, NULL, NULL),
(19, 'setting-policy-terms-of-use', '<h2>Điều khoản sử dụng</h2>\r\n\r\n<p>Khi qu&yacute; kh&aacute;ch truy cập v&agrave;o trang web của ch&uacute;ng t&ocirc;i c&oacute; nghĩa l&agrave; qu&yacute; kh&aacute;ch đồng &yacute; với c&aacute;c điều khoản n&agrave;y. Trang web c&oacute; quyền thay đổi, chỉnh sửa, th&ecirc;m hoặc lược bỏ bất kỳ phần n&agrave;o trong Quy định v&agrave; Điều kiện sử dụng, v&agrave;o bất cứ l&uacute;c n&agrave;o. C&aacute;c thay đổi c&oacute; hiệu lực ngay khi được đăng tr&ecirc;n trang web m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o trước. V&agrave; khi qu&yacute; kh&aacute;ch tiếp tục sử dụng trang web, sau khi c&aacute;c thay đổi về quy định v&agrave; điều kiện được đăng tải, c&oacute; nghĩa l&agrave; qu&yacute; kh&aacute;ch chấp nhận với những thay đổi đ&oacute;.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch vui l&ograve;ng kiểm tra thường xuy&ecirc;n để cập nhật những thay đổi của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p><strong>1. Hướng dẫn sử dụng web</strong></p>\r\n\r\n<p>- Khi v&agrave;o web của ch&uacute;ng t&ocirc;i, người d&ugrave;ng tối thiểu phải 18 tuổi hoặc truy cập dưới sự gi&aacute;m s&aacute;t của cha mẹ hay người gi&aacute;m hộ hợp ph&aacute;p.</p>\r\n\r\n<p>- Ch&uacute;ng t&ocirc;i cấp giấy ph&eacute;p sử dụng để bạn c&oacute; thể mua sắm tr&ecirc;n web trong khu&ocirc;n khổ điều khoản v&agrave; điều kiện sử dụng đ&atilde; đề ra.</p>\r\n\r\n<p>- Nghi&ecirc;m cấm sử dụng bất kỳ phần n&agrave;o của trang web n&agrave;y với mục đ&iacute;ch thương mại hoặc nh&acirc;n danh bất kỳ đối t&aacute;c thứ ba n&agrave;o nếu kh&ocirc;ng được ch&uacute;ng t&ocirc;i cho ph&eacute;p bằng văn bản. Nếu vi phạm bất cứ điều n&agrave;o trong đ&acirc;y, ch&uacute;ng t&ocirc;i sẽ hủy giấy ph&eacute;p của bạn m&agrave; kh&ocirc;ng cần b&aacute;o trước.</p>\r\n\r\n<p>- Trang web n&agrave;y chỉ d&ugrave;ng để cung cấp th&ocirc;ng tin sản phẩm chứ ch&uacute;ng t&ocirc;i kh&ocirc;ng phải nh&agrave; sản xuất n&ecirc;n những nhận x&eacute;t hiển thị tr&ecirc;n web l&agrave; &yacute; kiến c&aacute; nh&acirc;n của kh&aacute;ch h&agrave;ng, kh&ocirc;ng phải của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch phải đăng k&yacute; t&agrave;i khoản với th&ocirc;ng tin x&aacute;c thực về bản th&acirc;n v&agrave; phải cập nhật nếu c&oacute; bất kỳ thay đổi n&agrave;o. Mỗi người truy cập phải c&oacute; tr&aacute;ch nhiệm với mật khẩu, t&agrave;i khoản v&agrave; hoạt động của m&igrave;nh tr&ecirc;n web. Hơn nữa, qu&yacute; kh&aacute;ch phải th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i biết khi t&agrave;i khoản bị truy cập tr&aacute;i ph&eacute;p. Ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu bất kỳ tr&aacute;ch nhiệm n&agrave;o, d&ugrave; trực tiếp hay gi&aacute;n tiếp, đối với những thiệt hại hoặc mất m&aacute;t g&acirc;y ra do qu&yacute; kh&aacute;ch kh&ocirc;ng tu&acirc;n thủ quy định.</p>\r\n\r\n<p>- Trong suốt qu&aacute; tr&igrave;nh đăng k&yacute;, qu&yacute; kh&aacute;ch đồng &yacute; nhận email quảng c&aacute;o từ website. Sau đ&oacute;, nếu kh&ocirc;ng muốn tiếp tục nhận mail, qu&yacute; kh&aacute;ch c&oacute; thể từ chối bằng c&aacute;ch nhấp v&agrave;o đường link ở dưới c&ugrave;ng trong mọi email quảng c&aacute;o.</p>\r\n\r\n<p><strong>2. Chấp nhận đơn h&agrave;ng v&agrave; gi&aacute; cả</strong></p>\r\n\r\n<p>- Ch&uacute;ng t&ocirc;i c&oacute; quyền từ chối hoặc hủy đơn h&agrave;ng của qu&yacute; kh&aacute;ch v&igrave; bất kỳ l&yacute; do g&igrave; v&agrave;o bất kỳ l&uacute;c n&agrave;o. Ch&uacute;ng t&ocirc;i c&oacute; thể hỏi th&ecirc;m về số điện thoại v&agrave; địa chỉ trước khi nhận đơn h&agrave;ng.</p>\r\n\r\n<p>- Ch&uacute;ng t&ocirc;i cam kết sẽ cung cấp th&ocirc;ng tin gi&aacute; cả ch&iacute;nh x&aacute;c nhất cho người ti&ecirc;u d&ugrave;ng. Tuy nhi&ecirc;n, đ&ocirc;i l&uacute;c vẫn c&oacute; sai s&oacute;t xảy ra, v&iacute; dụ như trường hợp gi&aacute; sản phẩm kh&ocirc;ng hiển thị ch&iacute;nh x&aacute;c tr&ecirc;n trang web hoặc sai gi&aacute;, t&ugrave;y theo từng trường hợp ch&uacute;ng t&ocirc;i sẽ li&ecirc;n hệ hướng dẫn hoặc th&ocirc;ng b&aacute;o hủy đơn h&agrave;ng đ&oacute; cho qu&yacute; kh&aacute;ch. Ch&uacute;ng t&ocirc;i cũng c&oacute; quyền từ chối hoặc hủy bỏ bất kỳ đơn h&agrave;ng n&agrave;o d&ugrave; đơn h&agrave;ng đ&oacute; đ&atilde; hay chưa được x&aacute;c nhận hoặc đ&atilde; bị thanh to&aacute;n.</p>\r\n\r\n<p><strong>3. Thương hiệu v&agrave; bản quyền</strong></p>\r\n\r\n<p>- Mọi quyền sở hữu tr&iacute; tuệ (đ&atilde; đăng k&yacute; hoặc chưa đăng k&yacute;), nội dung th&ocirc;ng tin v&agrave; tất cả c&aacute;c thiết kế, văn bản, đồ họa, phần mềm, h&igrave;nh ảnh, video, &acirc;m nhạc, &acirc;m thanh, bi&ecirc;n dịch phần mềm, m&atilde; nguồn v&agrave; phần mềm cơ bản đều l&agrave; t&agrave;i sản của ch&uacute;ng t&ocirc;i. To&agrave;n bộ nội dung của trang web được bảo vệ bởi luật bản quyền của Việt Nam v&agrave; c&aacute;c c&ocirc;ng ước quốc tế. Bản quyền đ&atilde; được bảo lưu.</p>\r\n\r\n<p><strong>4. Quyền ph&aacute;p l&yacute;</strong></p>\r\n\r\n<p>- C&aacute;c điều kiện, điều khoản v&agrave; nội dung của trang web n&agrave;y được điều chỉnh bởi luật ph&aacute;p Việt Nam v&agrave; T&ograve;a &aacute;n c&oacute; thẩm quyền tại Việt Nam sẽ giải quyết bất kỳ tranh chấp n&agrave;o ph&aacute;t sinh từ việc sử dụng tr&aacute;i ph&eacute;p trang web n&agrave;y.</p>\r\n\r\n<p><strong>5. Quy định về bảo mật</strong></p>\r\n\r\n<p>- Trang web của ch&uacute;ng t&ocirc;i coi trọng việc bảo mật th&ocirc;ng tin v&agrave; sử dụng c&aacute;c biện ph&aacute;p tốt nhất bảo vệ th&ocirc;ng tin v&agrave; việc thanh to&aacute;n của qu&yacute; kh&aacute;ch. Th&ocirc;ng tin của qu&yacute; kh&aacute;ch trong qu&aacute; tr&igrave;nh thanh to&aacute;n sẽ được m&atilde; h&oacute;a để đảm bảo an to&agrave;n. Sau khi qu&yacute; kh&aacute;ch ho&agrave;n th&agrave;nh qu&aacute; tr&igrave;nh đặt h&agrave;ng, qu&yacute; kh&aacute;ch sẽ tho&aacute;t khỏi chế độ an to&agrave;n.</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch kh&ocirc;ng được sử dụng bất kỳ chương tr&igrave;nh, c&ocirc;ng cụ hay h&igrave;nh thức n&agrave;o kh&aacute;c để can thiệp v&agrave;o hệ thống hay l&agrave;m thay đổi cấu tr&uacute;c dữ liệu. Trang web cũng nghi&ecirc;m cấm việc ph&aacute;t t&aacute;n, truyền b&aacute; hay cổ vũ cho bất kỳ hoạt động n&agrave;o nhằm can thiệp, ph&aacute; hoại hay x&acirc;m nhập v&agrave;o dữ liệu của hệ thống. C&aacute; nh&acirc;n hay tổ chức vi phạm sẽ bị tước bỏ mọi quyền lợi cũng như sẽ bị truy tố trước ph&aacute;p luật nếu cần thiết.</p>\r\n\r\n<p>- Mọi th&ocirc;ng tin giao dịch sẽ được bảo mật nhưng trong trường hợp cơ quan ph&aacute;p luật y&ecirc;u cầu, ch&uacute;ng t&ocirc;i sẽ buộc phải cung cấp những th&ocirc;ng tin n&agrave;y cho c&aacute;c cơ quan ph&aacute;p luật.</p>\r\n\r\n<p><strong>6. Thay đổi, hủy bỏ giao dịch tại website</strong></p>\r\n\r\n<p>Trong mọi trường hợp, kh&aacute;ch h&agrave;ng đều c&oacute; quyền chấm dứt giao dịch nếu đ&atilde; thực hiện c&aacute;c biện ph&aacute;p sau đ&acirc;y:</p>\r\n\r\n<p>- Th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i về việc hủy giao dịch qua đường d&acirc;y n&oacute;ng 04.6674.2332</p>\r\n\r\n<p>- Trả lại h&agrave;ng ho&aacute; đ&atilde; nhận nhưng chưa sử dụng hoặc hưởng bất kỳ lợi &iacute;ch n&agrave;o từ h&agrave;ng h&oacute;a đ&oacute; (theo quy định của ch&iacute;nh s&aacute;ch đổi trả h&agrave;ng).</p>', NULL, NULL, NULL, NULL),
(20, 'setting-policy-exchange', '<h2>Ch&iacute;nh S&aacute;ch Đổi H&agrave;ng</h2>\r\n\r\n<p><strong>Qu&yacute; kh&aacute;ch c&oacute; thể đổi h&agrave;ng đ&atilde; mua trong c&aacute;c trường hợp sau:</strong></p>\r\n\r\n<ul>\r\n	<li>H&agrave;ng c&oacute; lỗi kỹ thuật do nh&agrave; sản xuất,</li>\r\n	<li>H&agrave;ng bị giao nhầm, nhầm size.</li>\r\n</ul>\r\n\r\n<p>Thời hạn đổi h&agrave;ng : 05 ng&agrave;y kể từ ng&agrave;y mua/nhận h&agrave;ng</p>\r\n\r\n<p><strong>Điều kiện đổi h&agrave;ng:</strong></p>\r\n\r\n<ul>\r\n	<li>H&agrave;ng chưa qua sử dụng, giặt ủi, phải c&ograve;n nguy&ecirc;n tem m&aacute;c, kh&ocirc;ng d&iacute;nh bẩn,&hellip;</li>\r\n	<li>H&agrave;ng đổi phải c&oacute; gi&aacute; bằng hoặc cao hơn h&agrave;ng đ&atilde; mua</li>\r\n</ul>\r\n\r\n<p><strong>Ph&iacute; đổi h&agrave;ng:</strong></p>\r\n\r\n<ul>\r\n	<li>Nếu h&agrave;ng bị lỗi kỹ thuật do nh&agrave; sản xuất: miễn ph&iacute; to&agrave;n bộ ph&iacute; chuyển h&agrave;ng (gửi trả v&agrave; giao h&agrave;ng)</li>\r\n	<li>Trường hợp kh&aacute;c Qu&yacute; kh&aacute;ch h&agrave;ng sẽ chịu chi ph&iacute;ph&iacute; chuyển h&agrave;ng (gửi trả v&agrave; giao h&agrave;ng).</li>\r\n</ul>\r\n\r\n<p><strong>Địa điểm nhận h&agrave;ng đổi:</strong><br />\r\nC&ocirc;ng ty TNHH May Mặc Thăng Long<br />\r\n62/4 Trần B&igrave;nh Trọng, Phường 8, TP. Vũng T&agrave;u.<br />\r\nĐiện thoại: 02543 583 216<br />\r\nFax: 02543 581 475<br />\r\nHotline: 0937 809 123</p>\r\n\r\n<p><em>Xin Qu&yacute; Kh&aacute;ch H&agrave;ng lưu &yacute;: Ch&uacute;ng t&ocirc;i kh&ocirc;ng hỗ trợ Qu&yacute; kh&aacute;ch trả lại h&agrave;ng.</em></p>\r\n\r\n<p><strong>Ch&acirc;n th&agrave;nh cảm ơn Qu&yacute; Kh&aacute;ch H&agrave;ng đ&atilde; quan t&acirc;m đến c&aacute;c sản phẩm nh&atilde;n hiệu Pet Shop.</strong></p>', NULL, NULL, NULL, NULL),
(21, 'setting-policy-shopping-guide', '<h2>Hướng dẫn mua h&agrave;ng</h2>\r\n\r\n<p>Qu&yacute; kh&aacute;ch xem th&ocirc;ng tin sản phẩm tr&ecirc;n website: www.petshop.vn, lựa chọn sản phẩm y&ecirc;u th&iacute;ch,&nbsp;<strong>nhấn v&agrave;o n&uacute;t &ldquo;Mua H&agrave;ng&rdquo;, sản phẩm sẽ được cho v&agrave;o giỏ h&agrave;ng</strong>. Qu&yacute; kh&aacute;ch c&oacute; thể lựa chọn tiếp sản phẩm cần mua, hoặc nhấn n&uacute;t mua h&agrave;ng để thực hiện mua sản phẩm đ&atilde; chọn.</p>\r\n\r\n<p><img alt=\"Mua Hàng trên website petshop.vn\" src=\"https://bizweb.dktcdn.net/100/147/060/files/mua-hang.png?v=1479790030293\" /></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch vui l&ograve;ng điền đầy đủ th&ocirc;ng tin c&aacute; nh&acirc;n để ch&uacute;ng t&ocirc;i c&oacute; thể li&ecirc;n hệ x&aacute;c nhận đơn h&agrave;ng v&agrave; giao h&agrave;ng cho qu&yacute; kh&aacute;ch trong thời gian sớm nhất.</p>\r\n\r\n<h3>Giao h&agrave;ng</h3>\r\n\r\n<p>Tại Th&agrave;nh phố Vũng T&agrave;u: Miễn ph&iacute; giao h&agrave;ng khu vực trung t&acirc;m TP. Vũng T&agrave;u. Đối với những khu vực xa trung t&acirc;m như Phường 11, Phường 12&hellip; ch&uacute;ng t&ocirc;i sẽ th&ocirc;ng b&aacute;o ph&iacute; giao h&agrave;ng khi gọi điện x&aacute;c nhận đơn h&agrave;ng.</p>\r\n\r\n<p><img alt=\"Ship hàng đến tận nhà tại Vũng Tàu\" src=\"https://bizweb.dktcdn.net/100/147/060/files/shipper.jpg?v=1479790013009\" /></p>\r\n\r\n<p>C&aacute;c tỉnh/th&agrave;nh phố kh&aacute;c:<br />\r\n-&nbsp;<strong>Đơn h&agrave;ng tr&ecirc;n 1.000.000 VNĐ</strong>: miễn ph&iacute; giao h&agrave;ng.<br />\r\n-&nbsp;<strong>Đơn h&agrave;ng dưới 1.000.000 VNĐ</strong>: theo biểu ph&iacute; của c&ocirc;ng ty chuyển ph&aacute;t. Ch&uacute;ng t&ocirc;i sẽ th&ocirc;ng b&aacute;o ph&iacute; giao h&agrave;ng ch&iacute;nh x&aacute;c cho qu&yacute; kh&aacute;ch khi x&aacute;c nhận đơn h&agrave;ng.</p>\r\n\r\n<h3>Thanh to&aacute;n</h3>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i chấp nhận thanh to&aacute;n bằng tiền mặt đối với những đơn h&agrave;ng tại trung t&acirc;m th&agrave;nh phố Vũng T&agrave;u. Với những đơn h&agrave;ng tại tỉnh, th&agrave;nh kh&aacute;c, Qu&yacute; kh&aacute;ch vui l&ograve;ng chuyển khoản gi&aacute; trị đơn h&agrave;ng v&agrave; ph&iacute; giao h&agrave;ng (sau khi ch&uacute;ng t&ocirc;i gọi x&aacute;c nhận) v&agrave;o t&agrave;i khoản sau:</p>\r\n\r\n<p><strong>*Tại VIB (NG&Acirc;N H&Agrave;NG QUỐC TẾ VIỆT NAM)</strong><br />\r\nChủ t&agrave;i khoản: ĐỖ THỊ CH&Aacute;NH<br />\r\nSố t&agrave;i khoản (VND): 622704060056794</p>\r\n\r\n<p><strong>*Tại ACB (NG&Acirc;N H&Agrave;NG TMCP &Aacute; CH&Acirc;U)</strong><br />\r\nChủ t&agrave;i khoản: DƯƠNG C&Ocirc;NG TRƯỜNG<br />\r\nSố t&agrave;i khoản (VND): 159546119</p>\r\n\r\n<p><strong>Ch&acirc;n th&agrave;nh c&aacute;m ơn sự quan t&acirc;m của Qu&yacute; kh&aacute;ch d&agrave;nh cho c&aacute;c sản phẩm thương hiệu Pet Shop.</strong></p>', NULL, NULL, NULL, NULL),
(22, 'setting-policy-business-conception', '<h2>Quan Điểm Kinh Doanh</h2>\r\n\r\n<p>Lấy &ldquo;lợi &iacute;ch kh&aacute;ch h&agrave;ng&rdquo; l&agrave;m kim chỉ nam hoạt động, tất cả th&agrave;nh vi&ecirc;n&nbsp;<strong>C&ocirc;ng ty TNHH May Mặc Thăng Long</strong>&nbsp;lu&ocirc;n t&acirc;m niệm, thấu hiểu v&agrave; tu&acirc;n thủ những triết l&yacute; kinh doanh của c&ocirc;ng ty:</p>\r\n\r\n<ul>\r\n	<li>V&igrave; lợi &iacute;ch kh&aacute;ch h&agrave;ng, ch&uacute;ng t&ocirc;i kh&ocirc;ng ngừng t&igrave;m t&ograve;i v&agrave; s&aacute;ng tạo ra nhiều d&ograve;ng sản phẩm ph&ugrave; hợp với nhu cầu ng&agrave;y c&agrave;ng tăng của kh&aacute;ch h&agrave;ng với mức gi&aacute; cạnh tranh nhất v&agrave; chế độ dịch vụ ho&agrave;n hảo nhất.</li>\r\n	<li>V&igrave; lợi &iacute;ch kh&aacute;ch h&agrave;ng, ch&uacute;ng t&ocirc;i lu&ocirc;n coi trọng chữ &ldquo;T&iacute;n&rdquo; trong từng hoạt động của c&ocirc;ng ty</li>\r\n	<li>V&igrave; lợi &iacute;ch kh&aacute;ch h&agrave;ng, ch&uacute;ng t&ocirc;i lu&ocirc;n đặt m&igrave;nh v&agrave;o vị tr&iacute; kh&aacute;ch h&agrave;ng để c&oacute; những quyết định v&agrave; cư xử đ&uacute;ng mực</li>\r\n	<li>V&igrave; lợi &iacute;ch kh&aacute;ch h&agrave;ng, ch&uacute;ng t&ocirc;i lu&ocirc;n cố gắng, nỗ lực hết m&igrave;nh, thực hiện nhiều điều tốt nhất c&oacute; thể cho kh&aacute;ch h&agrave;ng. Với tất cả th&agrave;nh vi&ecirc;n c&ocirc;ng ty ch&uacute;ng t&ocirc;i: &ldquo;Kh&aacute;ch h&agrave;ng lu&ocirc;n lu&ocirc;n đ&uacute;ng!&rdquo;</li>\r\n</ul>\r\n\r\n<p>L&yacute; do c&ocirc;ng ty ch&uacute;ng t&ocirc;i lấy &ldquo;lợi &iacute;ch kh&aacute;ch h&agrave;ng&rdquo; l&agrave;m gốc l&agrave; v&igrave; ch&uacute;ng t&ocirc;i hiểu r&otilde; rằng ch&iacute;nh kh&aacute;ch h&agrave;ng l&agrave; người quyết định sự tồn tại v&agrave; ph&aacute;t triển của doanh nghiệp v&agrave; nh&atilde;n hiệu của m&igrave;nh trong điều kiện cạnh tranh ng&agrave;y c&agrave;ng gay gắt. V&igrave; vậy, to&agrave;n thể nh&acirc;n vi&ecirc;n, th&agrave;nh vi&ecirc;n&nbsp;<strong>C&ocirc;ng ty TNHH May Mặc Thăng Long</strong>&nbsp;lu&ocirc;n t&acirc;m niệm v&agrave; l&agrave;m việc với suy nghĩ: &ldquo;H&atilde;y phục vụ kh&aacute;ch h&agrave;ng như thể phục vụ cho nhu cầu của ch&iacute;nh c&aacute; nh&acirc;n m&igrave;nh!&rdquo;</p>\r\n\r\n<p><strong>C&ocirc;ng ty TNHH May Mặc Thăng Long</strong>&nbsp;c&aacute;m ơn sự tin y&ecirc;u của Qu&yacute; Kh&aacute;ch H&agrave;ng d&agrave;nh cho c&aacute;c sản phẩm mang nh&atilde;n hiệu Pet Shop trong những năm qua.</p>\r\n\r\n<p>Khi lựa chọn sản phẩm Pet Shop, ch&uacute;ng t&ocirc;i đảm bảo Qu&yacute; Kh&aacute;ch H&agrave;ng sẽ ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m về chất lượng sản phẩm v&agrave; h&agrave;i l&ograve;ng về chất lượng dịch vụ.</p>\r\n\r\n<p>Nếu Qu&yacute; Kh&aacute;ch H&agrave;ng c&oacute; bất kỳ điều g&igrave; chưa h&agrave;i l&ograve;ng về chất lượng sản phẩm hoặc chất lượng dịch vụ, ch&uacute;ng t&ocirc;i lu&ocirc;n mong nhận được những &yacute; kiến đ&oacute;ng g&oacute;p qu&yacute; b&aacute;u của Qu&yacute; Kh&aacute;ch H&agrave;ng bất cứ l&uacute;c n&agrave;o để gi&uacute;p ch&uacute;ng t&ocirc;i nhanh ch&oacute;ng cải tiến c&ocirc;ng việc v&agrave; đ&aacute;p ứng kịp thời mọi y&ecirc;u cầu Qu&yacute; Kh&aacute;ch H&agrave;ng.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i tr&acirc;n trọng từng ph&uacute;t v&agrave; từng việc l&agrave;m của m&igrave;nh để phục vụ Qu&yacute; kh&aacute;ch ng&agrave;y c&agrave;ng tốt hơn.</p>\r\n\r\n<p><strong>Ch&acirc;n th&agrave;nh c&aacute;m ơn sự quan t&acirc;m của Qu&yacute; kh&aacute;ch d&agrave;nh cho c&aacute;c sản phẩm mang (thương ) nh&atilde;n hiệu Pet Shop.</strong></p>', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created` datetime DEFAULT current_timestamp(),
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `price`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'An Giang', 10000, 'active', '2021-04-08 17:46:27', 'admin', NULL, NULL),
(2, 'Bà Rịa-Vũng Tàu', 100000, 'active', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:02:12', 'admin'),
(3, 'Bạc Liêu', 20000, 'active', '2021-04-08 17:46:27', 'admin', NULL, NULL),
(4, 'Bắc Kạn', 30000, 'active', '2021-04-08 17:46:27', 'admin', NULL, NULL),
(5, 'Bắc Giang', 50000, 'active', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:03:18', 'admin'),
(6, 'Bắc Ninh', 10000, 'inactive', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:08:19', 'admin'),
(7, 'Bến Tre', 100000, 'active', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:02:12', 'admin'),
(8, 'Bình Dương', 20000, 'active', '2021-04-08 17:46:27', 'admin', NULL, NULL),
(9, 'Bình Định', 30000, 'inactive', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:08:09', 'admin'),
(10, 'Bình Phước', 50000, 'active', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:03:18', 'admin'),
(11, 'Bình Thuận', 50000, 'active', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:03:18', 'admin'),
(12, 'Cà Mau', 50000, 'inactive', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:08:13', 'admin'),
(13, 'Cao Bằng', 50000, 'active', '2021-04-08 17:46:27', 'admin', '2021-04-08 16:03:18', 'admin'),
(14, 'Cần Thơ', 50000, 'active', '2021-04-08 17:46:27', 'admin', '2021-04-08 19:26:40', 'admin'),
(20, 'vita mask', 12000, 'inactive', '2021-04-08 19:35:11', 'admin', '2021-04-08 19:35:47', 'admin'),
(21, 'vita mask 2', 13000, 'active', '2021-04-09 08:34:35', 'admin', '2021-04-09 08:34:52', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `status`, `name`, `description`, `link`, `thumb`, `sort`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'active', 'We keep pets for pleasure.', 'Food & Vitamins <br /> For all pets', 'http://8.0.test', '/images/slider/slider1.png', '1', '2021-03-30 12:41:43', 'admin', NULL, NULL),
(2, 'active', 'We keep pets for pleasure 2.', 'Food & Vitamins <br /> For all pets', 'http://proj_news.xyz/news69/all-food.html', '/images/slider/slider2.png', '1', '2021-03-30 12:41:43', 'admin', '2021-04-19 09:51:41', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subcribe`
--

CREATE TABLE `subcribe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcribe`
--

INSERT INTO `subcribe` (`id`, `email`, `status`, `created`, `modified`, `modified_by`) VALUES
(1, 'vuducsaobien99@gmail.com', 'inactive', '2021-03-30 05:41:43', '2021-04-16 15:32:40', 'vanduc'),
(2, 'vuducsaobien98@gmail.com', 'active', '2021-03-30 05:41:43', '2021-04-16 14:15:33', 'vanduc'),
(5, 'vuducsaobien95@gmail.com', 'active', '2021-04-16 07:48:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `status`, `name`, `job`, `thumb`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'active', 'Đức', 'Developer', '/images/avatar/ava1.jpg', '2021-03-30 12:41:43', 'admin', NULL, NULL),
(2, 'active', 'Hùng', 'Developer', '/images/avatar/ava2.jpg', '2021-03-30 12:41:43', 'admin', NULL, NULL),
(3, 'active', 'Huy', 'Developer', '/images/avatar/ava3.jpg', '2021-03-30 12:41:43', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `status`, `content`, `thumb`, `job`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(6, 'Chị Minh Hằng (Hà Nội)', 'active', 'Đồ đẹp và shop nhiệt tình. Rất thích đồ của shop. Và mong shop có nhiều đồ đáng yêu hơn nữa cho các bạn diện. Tiếc là shop k có ở HN. K thì e sẽ ghé qua thường xuyên. Sớm mở ở HN shop nhé <3', '/images/testimonial/download.jpg', 'CEO', '2021-03-30 12:41:43', 'admin', '2021-04-13 09:40:33', 'admin'),
(7, 'Bé Khoai Mỡ', 'active', 'Cảm ơn cô chú đã tặng cho Khoai Mỡ một cái nơ thiệt xinh đẹp. Đồ shop đẹp rẻ ; chất lượng lắm lắm!', '/images/testimonial/gai-xinh-fb-16.jpg', 'CEO', '2021-03-30 12:41:43', 'admin', '2021-04-13 09:39:51', 'admin'),
(8, 'Mimi', 'active', 'So ciuuuuuu <3 Vừa sắm đầm mới cho em í... Xinh lung linh luôn!!!', '/images/testimonial/474a32757e5d8a3df1858fbcb67a8164.jpg', 'Customer', '2021-03-30 12:41:43', 'admin', '2021-04-13 09:38:46', 'admin'),
(9, 'Thịnh Thịnh', 'active', 'Tks a chị chủ shop và junie nha. Kiếm quá trời size nhỏ cuối cùng cũng ra cực dễ thương :3 Anh chị chỉ rất nhiệt tình và thân thiện <3', '/images/testimonial/15d27070b4a3faf84c7e14ffdbb84872c1ba71f9.jpg', 'Developer', '2021-03-30 12:41:43', 'admin', '2021-04-13 09:37:01', 'admin'),
(10, 'Sen Lê (HCM)', 'active', 'Dễ thương quá <3', '/images/testimonial/323c60c35d635e1b9f743893d99f0ba4.jpg', 'Customer', '2021-03-30 12:41:43', 'admin', '2021-04-13 09:35:39', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(3) NOT NULL,
  `permission_deny` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_new` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(15) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `group_id`, `permission_deny`, `permission_new`, `level`, `status`, `username`, `password`, `thumb`, `fullname`, `phone`, `address`, `created`, `created_by`, `modified`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'vuducsaobien95@gmail.com', 1, '2,4,3', NULL, 'admin', 'active', 'vanduc', 'c4ca4238a0b923820dcc509a6f75849b', '/images/user/1ctW8mj8vq.png', 'Vũ Văn Đức', 362344174, 'Long Bình Tân, Biên Hòa, Đồng Nai', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin', '2021-03-30 05:41:43', NULL),
(2, 'admin@gmail.com', 2, '9,10', '11,12,13,15,16', 'admin', 'active', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '/images/user/1ctW8mj8vq.png', 'Nguyễn Văn Admin', 989261781, 'Định Quán, Đồng Nai', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin', '2021-03-30 05:41:43', NULL),
(3, 'admin1@gmail.com', 3, NULL, '7,8,11,12', 'admin', 'active', 'xuanhung', 'c4ca4238a0b923820dcc509a6f75849b', '/images/user/1ctW8mj8vq.png', 'admind', 564888154, 'Thanh Xuân, Hà Nội', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin', '2021-03-30 05:41:43', NULL),
(4, 'admin2@gmail.com', 4, '1,2,4,3', '5,6,7,8,9,10,11,12', 'admin', 'active', 'admin12', 'c4ca4238a0b923820dcc509a6f75849b', '/images/user/1ctW8mj8vq.png', 'admin', 1684596063, 'Cầu Giấy, Hà Nội', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin', '2021-03-30 05:41:43', NULL),
(5, 'vuducsaobien94@gmail.com', 5, NULL, NULL, 'admin', 'active', 'vanduc1', 'c4ca4238a0b923820dcc509a6f75849b', '/images/user/1ctW8mj8vq.png', 'Vũ Văn Đức', 362344174, 'Long Bình Tân, Biên Hòa, Đồng Nai', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin', '2021-03-30 05:41:43', NULL),
(6, 'admin3@gmail.com', 1, NULL, NULL, 'admin', 'active', 'admin2', 'c4ca4238a0b923820dcc509a6f75849b', '/images/user/1ctW8mj8vq.png', 'Nguyễn Văn Admin', 989261781, 'Định Quán, Đồng Nai', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin', '2021-03-30 05:41:43', NULL),
(7, 'admin4@gmail.com', 2, NULL, NULL, 'member', 'active', 'xuanhung3', 'c4ca4238a0b923820dcc509a6f75849b', '/images/user/1ctW8mj8vq.png', 'admind', 564888154, 'Thanh Xuân, Hà Nội', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin', '2021-03-30 05:41:43', NULL),
(8, 'admin5@gmail.com', 3, NULL, NULL, 'member', 'active', 'admin124', 'c4ca4238a0b923820dcc509a6f75849b', '/images/user/1ctW8mj8vq.png', 'admin', 1684596063, 'Cầu Giấy, Hà Nội', '2021-03-30 12:41:43', 'admin', '2021-03-30 12:41:43', 'admin', '2021-03-30 05:41:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_article`
--
ALTER TABLE `comment_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_article__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `controller`
--
ALTER TABLE `controller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss`
--
ALTER TABLE `rss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss_content`
--
ALTER TABLE `rss_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcribe`
--
ALTER TABLE `subcribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `comment_article`
--
ALTER TABLE `comment_article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `controller`
--
ALTER TABLE `controller`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rss`
--
ALTER TABLE `rss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rss_content`
--
ALTER TABLE `rss_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcribe`
--
ALTER TABLE `subcribe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
