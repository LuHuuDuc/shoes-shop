-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2023 lúc 01:48 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID_ACCOUNT` int(10) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `USER` varchar(20) NOT NULL,
  `PASSWORD` varchar(999) NOT NULL,
  `PHONE` int(10) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `ROLE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ID_ACCOUNT`, `NAME`, `USER`, `PASSWORD`, `PHONE`, `EMAIL`, `ADDRESS`, `ROLE`) VALUES
(7, 'Lư Hữu Đức', 'admin', '8470a3779c5dc746052e4be7b1f23173', 332340187, 'lhd.vie@gmail.com', 'TP.Hồ Chí Minh', 'Admin'),
(25, 'test12345', 'test12345', 'fcea920f7412b5da7be0cf42b8c93759', 907252424, 'lk.lk@lk.lk', 'TP.Hồ Chí Minh', 'User'),
(26, 'Lư Hữu Đức', 'test123456', 'fcea920f7412b5da7be0cf42b8c93759', 2147483647, '4231482384@47328.com', 'TP.Hồ Chí Minh', 'User'),
(27, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `ID_CART` int(10) NOT NULL,
  `ID_ACCOUNT` int(10) NOT NULL,
  `ID_PRODUCT` int(11) NOT NULL,
  `NAME_PRODUCT` varchar(255) DEFAULT NULL,
  `PRICE` int(10) DEFAULT NULL,
  `IMG` varchar(255) DEFAULT NULL,
  `QUANTITY` int(10) DEFAULT NULL,
  `COLOR` varchar(255) DEFAULT NULL,
  `SIZE` varchar(10) DEFAULT NULL,
  `TOTAL` int(10) DEFAULT NULL,
  `DATE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`ID_CART`, `ID_ACCOUNT`, `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE`, `IMG`, `QUANTITY`, `COLOR`, `SIZE`, `TOTAL`, `DATE`) VALUES
(336, 572144, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '9/1/2023 at 08:14:20'),
(337, 547143, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '9/1/2023 at 08:15:45'),
(338, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, 'WHITE', '12.5 UK', 2600000, '9/1/2023 at 08:37:18'),
(339, 7, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '11/1/2023 at 04:49:2'),
(340, 7, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '11/1/2023 at 04:49:5'),
(341, 7, 1004, 'GIÀY X9000L2', 1995000, '4_1.PNG', 1, 'WHITE', '11.5 UK', 1995000, '11/1/2023 at 08:56:0'),
(342, 7, 1004, 'GIÀY X9000L2', 1995000, '4_1.PNG', 1, 'WHITE', '11.5 UK', 1995000, '11/1/2023 at 08:56:5'),
(343, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '11/1/2023 at 09:53:5'),
(344, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '11/1/2023 at 09:55:1'),
(345, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '11/1/2023 at 09:55:4'),
(346, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '11/1/2023 at 09:56:2'),
(347, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '11/1/2023 at 09:58:0'),
(348, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '11/1/2023 at 10:00:4'),
(349, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '11/1/2023 at 10:05:0'),
(350, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, 'WHITE', '12.5 UK', 2600000, '12/1/2023 at 04:57:1'),
(351, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '12/1/2023 at 05:38:3'),
(352, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 05:40:0'),
(353, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 05:44:2'),
(354, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 05:45:2'),
(355, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '12/1/2023 at 05:46:2'),
(356, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 05:47:0'),
(357, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '8 UK', 'CREAM', 2800000, '12/1/2023 at 05:48:4'),
(358, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 05:48:4'),
(359, 7, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 06:00:3'),
(360, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '12/1/2023 at 07:18:4'),
(361, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 4, '9 UK', 'WHITE', 4760000, '12/1/2023 at 07:18:4'),
(362, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, '9 UK', 'WHITE', 1190000, '12/1/2023 at 07:19:5'),
(363, 0, 1001, 'GIÀY OZWEEGO CELOX', 1650000, '1_1.PNG', 1, '8.5 UK', 'WHITE', 1650000, '12/1/2023 at 07:33:1'),
(364, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '12/1/2023 at 08:31:0'),
(365, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 08:31:3'),
(366, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 2, 'CREAM', '6 UK', 5600000, '12/1/2023 at 08:32:0'),
(367, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 08:32:1'),
(368, 7, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 08:32:3'),
(369, 7, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '12/1/2023 at 08:32:4'),
(370, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, '9 UK', 'WHITE', 1190000, '12/1/2023 at 13:04:1'),
(371, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '12/1/2023 at 13:04:4'),
(372, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '12/1/2023 at 13:05:2'),
(373, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, '12.5 UK', 'WHITE', 2600000, '12/1/2023 at 13:34:5'),
(374, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, '9 UK', 'WHITE', 1190000, '12/1/2023 at 13:35:1'),
(375, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, '9 UK', 'WHITE', 1190000, '12/1/2023 at 13:35:5'),
(376, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 2, 'CREAM', '6 UK', 5600000, '12/1/2023 at 14:45:2'),
(377, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 3, 'CREAM', '6 UK', 8400000, '12/1/2023 at 14:46:0'),
(378, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '12/1/2023 at 14:48:0'),
(379, 0, 1015, 'GIÀY TENNIS RICH MNISI HER', 1400000, '15_1.PNG', 1, 'BLACK', '7 UK', 1400000, '12/1/2023 at 14:48:0'),
(380, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 15:09:0'),
(381, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '12/1/2023 at 15:23:3'),
(382, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '12/1/2023 at 15:48:3'),
(383, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, '6 UK', 'CREAM', 2800000, '12/1/2023 at 15:49:2'),
(384, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 950, '6 UK', 'CREAM', 2147483647, '12/1/2023 at 15:59:4'),
(385, 0, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '13/1/2023 at 02:21:0'),
(386, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 03:27:4'),
(387, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '7.5 UK', 2800000, '13/1/2023 at 03:27:4'),
(388, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '8 UK', 2800000, '13/1/2023 at 03:27:4'),
(389, 0, 1014, 'GIÀY DISNEY FORUM 84 LOW', 1400000, '14_1.PNG', 1, 'WHITE', '5.5 UK', 1400000, '13/1/2023 at 03:27:4'),
(390, 0, 1014, 'GIÀY DISNEY FORUM 84 LOW', 1400000, '14_1.PNG', 1, 'WHITE', '6.5 UK', 1400000, '13/1/2023 at 03:27:4'),
(391, 0, 1014, 'GIÀY DISNEY FORUM 84 LOW', 1400000, '14_1.PNG', 1, 'WHITE', '8 UK', 1400000, '13/1/2023 at 03:27:4'),
(392, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, 'WHITE', '12.5 UK', 2600000, '13/1/2023 at 04:03:2'),
(393, 0, 1022, 'GIÀY SUPERSTAR', 2600000, '22_1.PNG', 1, 'WHITE', '11 UK', 2600000, '13/1/2023 at 04:05:5'),
(394, 0, 1022, 'GIÀY SUPERSTAR', 2600000, '22_1.PNG', 1, 'WHITE', '11 UK', 2600000, '13/1/2023 at 04:06:2'),
(395, 0, 1001, 'GIÀY OZWEEGO CELOX', 1650000, '1_1.PNG', 2, 'WHITE', '8.5 UK', 3300000, '13/1/2023 at 04:13:0'),
(396, 0, 1001, 'GIÀY OZWEEGO CELOX', 1650000, '1_1.PNG', 1, 'WHITE', '8.5 UK', 1650000, '13/1/2023 at 04:15:5'),
(397, 0, 1001, 'GIÀY OZWEEGO CELOX', 1650000, '1_1.PNG', 1, 'WHITE', '8.5 UK', 1650000, '13/1/2023 at 04:33:2'),
(398, 0, 1001, 'GIÀY OZWEEGO CELOX', 1650000, '1_1.PNG', 2, 'WHITE', '8.5 UK', 3300000, '13/1/2023 at 04:35:4'),
(399, 7, 1002, 'GIÀY ZX 2K BOOST 2.0', 1850000, '2_1.PNG', 1, 'BLUE', '8 UK', 1850000, '13/1/2023 at 04:40:2'),
(400, 0, 1002, 'GIÀY ZX 2K BOOST 2.0', 1850000, '2_1.PNG', 1, 'BLUE', '8 UK', 1850000, '13/1/2023 at 04:45:3'),
(401, 7, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '13/1/2023 at 04:48:4'),
(402, 7, 1024, 'GIÀY COURT PLATFORM', 1190000, '24_1.PNG', 1, 'WHITE', '9 UK', 1190000, '13/1/2023 at 10:22:5'),
(403, 7, 1001, 'GIÀY OZWEEGO CELOX', 1650000, '1_1.PNG', 1, 'WHITE', '8.5 UK', 1650000, '13/1/2023 at 10:29:2'),
(404, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:30:4'),
(405, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:33:2'),
(406, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:34:3'),
(407, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:35:4'),
(408, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:36:1'),
(409, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:38:0'),
(410, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:38:4'),
(411, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:40:3'),
(412, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:43:0'),
(413, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:44:4'),
(414, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:47:4'),
(415, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:52:3'),
(416, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:53:2'),
(417, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:54:2'),
(418, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '6 UK', 2800000, '13/1/2023 at 10:57:2'),
(419, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, 'WHITE', '12.5 UK', 2600000, '13/1/2023 at 13:59:2'),
(420, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, 'WHITE', '12.5 UK', 2600000, '13/1/2023 at 14:03:4'),
(421, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 2, 'CREAM', '6 UK', 5600000, '14/1/2023 at 03:10:3'),
(422, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '7.5 UK', 2800000, '14/1/2023 at 03:10:3'),
(423, 0, 1025, 'GIÀY FORUM 84 LOW', 2800000, '25_1.PNG', 1, 'CREAM', '8 UK', 2800000, '14/1/2023 at 03:10:3'),
(424, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 2, 'WHITE', '12.5 UK', 5200000, '14/1/2023 at 03:10:3'),
(425, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, 'WHITE', '13 UK', 2600000, '14/1/2023 at 03:10:3'),
(426, 0, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, 'WHITE', '13.5 UK', 2600000, '14/1/2023 at 03:10:3'),
(427, 7, 1023, 'GIÀY STAN SMITH', 2600000, '23_1.PNG', 1, 'WHITE', '12.5 UK', 2600000, '14/1/2023 at 16:47:4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `ID_ACCOUNT` int(10) NOT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `CONTENT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID_PRODUCT` int(10) NOT NULL,
  `NAME_PRODUCT` varchar(255) DEFAULT NULL,
  `PRICE_PRODUCT` int(10) DEFAULT NULL,
  `SIZE_1` varchar(10) DEFAULT NULL,
  `SIZE_2` varchar(10) DEFAULT NULL,
  `SIZE_3` varchar(10) DEFAULT NULL,
  `COLOR_1` varchar(10) DEFAULT NULL,
  `COLOR_2` varchar(10) DEFAULT NULL,
  `IMG_1` varchar(10) DEFAULT NULL,
  `IMG_2` varchar(10) DEFAULT NULL,
  `DESC_SHORT` varchar(255) DEFAULT NULL,
  `SELL_NUMBER` int(10) DEFAULT NULL,
  `INVENTORY` int(10) DEFAULT NULL,
  `PRICE_SALE` int(10) DEFAULT NULL,
  `BRAND` varchar(255) DEFAULT NULL,
  `RATE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID_PRODUCT`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `SIZE_1`, `SIZE_2`, `SIZE_3`, `COLOR_1`, `COLOR_2`, `IMG_1`, `IMG_2`, `DESC_SHORT`, `SELL_NUMBER`, `INVENTORY`, `PRICE_SALE`, `BRAND`, `RATE`) VALUES
(1001, 'GIÀY OZWEEGO CELOX', 3300000, '8.5 UK', '9 UK', '10 UK', 'WHITE', NULL, '1_1.PNG', NULL, 'Nam • Originals', 7, 752, 1650000, 'Adidas', 4.71429),
(1002, 'GIÀY ZX 2K BOOST 2.0', 3700000, '8 UK', '8.5 UK', '9.5 UK', 'BLUE', NULL, '2_1.PNG', NULL, 'Nam • Originals', 2, 536, 1850000, 'Adidas', 5),
(1003, 'GIÀY ZX 22 BOOST', 3200000, '7.5 UK', '8 UK', '11 UK', 'BLUE', NULL, '3_1.PNG', NULL, 'Nam • Originals', 0, 573, 1600000, 'Adidas', 0),
(1004, 'GIÀY X9000L2', 2850000, '11.5 UK', '12 UK', '12.5 UK', 'WHITE', NULL, '4_1.PNG', NULL, 'Sportswear', 0, 432, 1995000, 'Adidas', 0),
(1005, 'GIÀY RETROPY F90', 2500000, '9 UK', '10 UK', '10.5 UK', 'GRAY', 'CREAM', '5_1.PNG', '5_2.PNG', 'Nam • Originals', 0, 987, 1750000, 'Adidas', 0),
(1006, 'GIÀY RETROPY E5', 3300000, '9 UK', '9.5 UK', '12.5 UK', 'GRAY', 'BLACK', '6_1.PNG', '6_2.PNG', 'Nam • Originals', 0, 895, 2310000, 'Adidas', 0),
(1007, 'GIÀY ADIZERO ADIOS 7', 3500000, '7 UK', '7.5 UK', '8 UK', 'BLACK', NULL, '7_1.PNG', NULL, 'Nam • Chạy', 0, 472, 2450000, 'Adidas', 0),
(1008, 'GIÀY JOKER 2', 3600000, '8 UK ', '8.5 UK', '9 UK', 'BLACK', NULL, '8_1.PNG', NULL, 'Sportswear', 0, 982, 2520000, 'Adidas', 0),
(1009, 'GIÀY QUESTAR', 2200000, '11 UK', '11.5 UK', '12 UK', 'BLACK', 'WHITE', '9_1.PNG', '9_2.PNG', 'Nam • Chạy', 0, 876, 1540000, 'Adidas', 0),
(1010, 'GIÀY OZRAH', 3600000, '9 UK', '9.5 UK', '10 UK', 'WHITE', NULL, '10_1.PNG', NULL, 'Nam • Originals', 0, 789, 2520000, 'Adidas', 0),
(1011, 'GIÀY RETROPY F2', 2600000, '11.5 UK', '12.5 UK', '13 UK', 'GRAY', NULL, '11_1.PNG', NULL, 'Nam • Originals', 0, 893, 1200000, 'Adidas', 0),
(1012, 'GIÀY ADIZERO UBERSONIC 4', 3800000, '7.5 UK', '9 UK', '9.5 UK', 'WHITE', NULL, '12_1.PNG', NULL, 'Nam • Quần vợt', 0, 975, 2660000, 'Adidas', 0),
(1013, 'GIÀY NMD_R1', 3900000, '4.5 UK', '5 UK', '5.5 UK', 'BLACK', NULL, '13_1.PNG', NULL, 'Nữ • Originals', 0, 142, 1950000, 'Adidas', 0),
(1014, 'GIÀY DISNEY FORUM 84 LOW', 2800000, '5.5 UK', '6.5 UK', '8 UK', 'WHITE', NULL, '14_1.PNG', NULL, 'Nữ • Originals', 1, 141, 1400000, 'Adidas', 5),
(1015, 'GIÀY TENNIS RICH MNISI HER', 2800000, '7 UK', '7.5 UK', '8 UK', 'BLACK', NULL, '15_1.PNG', NULL, 'Nữ • Originals', 0, 64, 1400000, 'Adidas', 0),
(1016, 'GIÀY NMD_R1', 3600000, '7 UK', '7.5 UK', '8 UK', 'GREEN', 'BROWN', '16_1.PNG', '16_2.PNG', 'Nữ • Originals', 0, 983, 3060000, 'Adidas', 0),
(1017, 'GIÀY X9000L2', 2850000, '11.5 UK', '12 UK', '12.5 UK', 'WHITE', NULL, '17_1.PNG', NULL, 'Sportswear', 0, 432, 1995000, 'Adidas', 0),
(1018, 'GIÀY ADIFOM SLTN', 2500000, '7 UK', '7.5 UK', '8 UK', 'BROWN', NULL, '18_1.PNG', NULL, 'Nữ • Originals', 0, 829, 1750000, 'Adidas', 0),
(1019, 'GIÀY CHẠY BỘ SUPERNOVA 2', 3000000, '4.5 UK', '5 UK', '5.5 UK', 'PINK', 'WHITE', '19_1.PNG', '19_2.PNG', 'Nữ • Chạy', 0, 532, 2100000, 'Adidas', 0),
(1020, 'GIÀY ULTRABOOST 22', 5200000, '7 UK', '8 UK', NULL, 'GRAY', 'GREEN', '20_1.PNG', '20_2.PNG', 'Nữ • Chạy', 0, 873, 2600000, 'Adidas', 0),
(1021, 'GIÀY FORUM LOW CLASSIC', 2500000, '7 UK', '7.5 UK', '8 UK', 'WHITE', '', '21_1.PNG', NULL, 'Nữ • Originals', 0, 542, 0, 'Adidas', 0),
(1022, 'GIÀY SUPERSTAR', 2600000, '11 UK', '11.5 UK', '12 UK', 'WHITE', 'BLACK', '22_1.PNG', '22_2.PNG', 'Originals', 2, 830, 0, 'Adidas', 5),
(1023, 'GIÀY STAN SMITH', 2600000, '12.5 UK', '13 UK', '13.5 UK', 'WHITE', NULL, '23_1.PNG', NULL, 'Originals', 4, 857, 0, 'Adidas', 5),
(1024, 'GIÀY COURT PLATFORM', 1700000, '9 UK', '10 UK', '10.5 UK', 'WHITE', NULL, '24_1.PNG', NULL, 'Nữ • Sportswear', 3, 84, 1190000, 'Adidas', 5),
(1025, 'GIÀY FORUM 84 LOW', 2800000, '6 UK', '7.5 UK', '8 UK', 'CREAM', NULL, '25_1.PNG', NULL, 'Nữ • Originals', 16, 937, 0, 'Adidas', 4.9375);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchase_history`
--

CREATE TABLE `purchase_history` (
  `ID_HISORY` int(10) NOT NULL,
  `ID_CART` varchar(255) NOT NULL,
  `ID_ACCOUNT` int(10) NOT NULL,
  `NAME_PURCHASE` varchar(255) NOT NULL,
  `PHONE_PURCHASE` int(12) NOT NULL,
  `ADDRESS_PURCHASE` varchar(255) NOT NULL,
  `TOTAL` int(10) NOT NULL,
  `DATE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `purchase_history`
--

INSERT INTO `purchase_history` (`ID_HISORY`, `ID_CART`, `ID_ACCOUNT`, `NAME_PURCHASE`, `PHONE_PURCHASE`, `ADDRESS_PURCHASE`, `TOTAL`, `DATE`) VALUES
(32, '336 ', 572144, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1190000, '9/1/2023 at 08:14:20'),
(33, '337 ', 547143, 'luhuuduc', 332340187, '8/5 vườn lài', 1190000, '9/1/2023 at 08:15:45'),
(34, '338 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2600000, '9/1/2023 at 08:37:18'),
(35, '339 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1190000, '11/1/2023 at 04:49:22'),
(36, '340 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1190000, '11/1/2023 at 04:49:58'),
(37, 'Array ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1995000, '11/1/2023 at 08:56:02'),
(38, '342 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1995000, '11/1/2023 at 08:56:56'),
(39, '343 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '11/1/2023 at 09:53:53'),
(40, '', 0, '', 0, '', 0, '11/1/2023 at 09:53:59'),
(41, '344 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '11/1/2023 at 09:55:13'),
(42, '', 0, '', 0, '', 0, '11/1/2023 at 09:55:22'),
(43, '345 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '11/1/2023 at 09:55:45'),
(44, '346 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '11/1/2023 at 09:56:21'),
(45, '', 0, '', 0, '', 0, '11/1/2023 at 09:56:37'),
(46, '347 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '11/1/2023 at 09:58:02'),
(47, '348 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '11/1/2023 at 10:00:48'),
(48, '349 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '11/1/2023 at 10:05:04'),
(49, '350 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2600000, '12/1/2023 at 04:57:15'),
(50, '351 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 05:38:31'),
(51, '352 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 05:40:00'),
(52, '353 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 05:44:26'),
(53, '354 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 05:45:26'),
(54, '355 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 05:46:27'),
(55, '356 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 05:47:06'),
(56, '357 358 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 5600000, '12/1/2023 at 05:48:48'),
(57, '359 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 2800000, '12/1/2023 at 06:00:34'),
(58, '360 361 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 5950000, '12/1/2023 at 07:18:47'),
(59, '362 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1190000, '12/1/2023 at 07:19:50'),
(60, '363 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1650000, '12/1/2023 at 07:33:10'),
(61, '364 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 08:31:02'),
(62, '365 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 08:31:31'),
(63, '366 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 5600000, '12/1/2023 at 08:32:04'),
(64, '367 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 08:32:13'),
(65, '368 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 2800000, '12/1/2023 at 08:32:35'),
(66, '369 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 2800000, '12/1/2023 at 08:32:44'),
(67, '370 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1190000, '12/1/2023 at 13:04:13'),
(68, '371 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1190000, '12/1/2023 at 13:04:42'),
(69, '372 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1190000, '12/1/2023 at 13:05:22'),
(70, '373 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2600000, '12/1/2023 at 13:34:57'),
(71, '374 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1190000, '12/1/2023 at 13:35:15'),
(72, '375 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1190000, '12/1/2023 at 13:35:50'),
(73, '376 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 5600000, '12/1/2023 at 14:45:24'),
(74, '377 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 8400000, '12/1/2023 at 14:46:06'),
(75, '378 379 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2590000, '12/1/2023 at 14:48:08'),
(76, '380 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 15:09:01'),
(77, '381 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 15:23:38'),
(78, '382 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 15:48:30'),
(79, '383 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2800000, '12/1/2023 at 15:49:20'),
(80, '384 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2147483647, '12/1/2023 at 15:59:46'),
(81, '385 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1190000, '13/1/2023 at 02:21:07'),
(82, '386 387 388 389 390 391 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 12600000, '13/1/2023 at 03:27:43'),
(83, '392 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2600000, '13/1/2023 at 04:03:24'),
(84, '393 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2600000, '13/1/2023 at 04:05:56'),
(85, '394 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2600000, '13/1/2023 at 04:06:25'),
(86, '395 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3300000, '13/1/2023 at 04:13:06'),
(87, '396 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1650000, '13/1/2023 at 04:15:56'),
(88, '397 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1650000, '13/1/2023 at 04:33:25'),
(89, '398 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3300000, '13/1/2023 at 04:35:47'),
(90, '399 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1850000, '13/1/2023 at 04:40:26'),
(91, '400 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 1850000, '13/1/2023 at 04:45:39'),
(92, '401 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1190000, '13/1/2023 at 04:48:43'),
(93, '402 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1324000, '13/1/2023 at 10:22:59'),
(94, '403 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 1830000, '13/1/2023 at 10:29:29'),
(95, '404 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:30:46'),
(96, '405 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:33:21'),
(97, '406 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:34:30'),
(98, '407 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:35:45'),
(99, '408 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:36:10'),
(100, '409 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2785500, '13/1/2023 at 10:38:01'),
(101, '410 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:38:46'),
(102, '411 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:40:36'),
(103, '412 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:43:05'),
(104, '413 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:44:45'),
(105, '414 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 0, '13/1/2023 at 10:47:40'),
(106, '415 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:52:30'),
(107, '416 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:53:24'),
(108, '417 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:54:29'),
(109, '418 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 3095000, '13/1/2023 at 10:57:22'),
(110, '419 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2875000, '13/1/2023 at 13:59:23'),
(111, '420 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 2587500, '13/1/2023 at 14:03:48'),
(112, '421 422 423 424 425 426 ', 0, 'luhuuduc', 332340187, '8/5 vườn lài', 23775000, '14/1/2023 at 03:10:33'),
(113, '427 ', 7, 'Lư Hữu Đức', 332340187, 'TP.Hồ Chí Minh', 2875000, '14/1/2023 at 16:47:47');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID_ACCOUNT`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID_CART`),
  ADD KEY `ID_PRODUCT` (`ID_PRODUCT`),
  ADD KEY `ID_ACCOUNT` (`ID_ACCOUNT`),
  ADD KEY `ID_PRODUCT_2` (`ID_PRODUCT`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_ACCOUNT`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_PRODUCT`);

--
-- Chỉ mục cho bảng `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`ID_HISORY`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `ID_ACCOUNT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `ID_CART` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_ACCOUNT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID_PRODUCT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1026;

--
-- AUTO_INCREMENT cho bảng `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `ID_HISORY` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
