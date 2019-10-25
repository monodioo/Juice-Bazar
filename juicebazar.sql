-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 07:59 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juicebazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `User` varchar(32) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `Pass` varchar(32) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `User`, `Pass`) VALUES
(1, 'nmhai', 'minhhai123'),
(2, 'nmhieu', 'minhhieu123'),
(3, 'nntuan', 'ngoctuan123'),
(4, 'thtrong', 'huytrong123');

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `CapacityId` tinyint(4) NOT NULL,
  `Capacity` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `capacity`
--

INSERT INTO `capacity` (`CapacityId`, `Capacity`) VALUES
(1, 250),
(2, 330);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberId` int(11) NOT NULL,
  `Email` varchar(100) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `Pass` varchar(32) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `Name` varchar(50) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Gender` tinyint(1) NOT NULL DEFAULT 0,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `Phone` varchar(10) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `Address` varchar(255) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberId`, `Email`, `Pass`, `Name`, `Birthday`, `Gender`, `Status`, `Phone`, `Address`) VALUES
(0, 'none', 'none', 'Guest', NULL, 0, 1, 'none', NULL),
(1, 'mark0514@gmail.com', '12345678', 'Mark AO', '1984-05-14', 1, 1, '0123456789', ''),
(2, 'bill1028@gmail.com', 'bill1028', 'Bill Gates', '1955-10-28', 1, 1, '0987654321', NULL),
(3, 'messi0624@Gmail.com', 'messi0624', 'Lionel Messi', '1987-06-24', 1, 1, '0123789456', NULL),
(4, 'ronaldo0205@gmail.com', 'ronaldo0205', 'Cristiano Ronaldo', '1985-02-05', 1, 1, '0987321654', NULL),
(5, 'tanvlog1961@gmail.com', 'batanvlog', 'Ba Tan', NULL, 2, 1, '0213456789', NULL),
(6, 'ntn1994@gmail.com', 'ntn1994', 'Nguyen Thanh Nam', NULL, 1, 1, '0132456789', NULL),
(7, 'thonguyen1992@gmail.com', 'thonguyen', 'Nguyen Hong Tho', NULL, 2, 1, '0123465789', NULL),
(8, 'johnwick64@gmail.com', 'johnwick64', 'Johnathan Wick', '1964-09-02', 1, 1, '0123546789', NULL),
(9, 'nudetiger@gmail.com', 'nudetiger', 'Tran Dan', NULL, 0, 1, '0987654312', 'California'),
(10, 'laivansam@gmail.com', '123456', 'Lai Van Sam', NULL, 1, 1, '0948561277', NULL),
(11, 'nguyenphongthai@gmail.com', '123456', 'Nguyen Phong Thai', NULL, 1, 1, '0988888888', NULL),
(12, 'nguyendinhan@gmail.com', '123456', 'Nguyen Di Nhan', NULL, 1, 1, '0912345678', NULL),
(13, 'tranvanduong@gmail.com', '123456', 'Tran Van Duong', NULL, 1, 1, '0968456789', NULL),
(14, 'duongvancuong@gmail.com', '56789', 'Duong Van Cuong', NULL, 1, 1, '0986868686', NULL),
(15, 'hoangtrunghieu@gmail.com', '23456', 'Hoang Trung Hieu', NULL, 1, 1, '0977777777', NULL),
(16, 'nguyenthihanh@gmail.com', '3218231', 'Nguyen Thi Hanh', NULL, 1, 1, '0958828394', NULL),
(17, 'nguyentienmanh@gmail.com', '348393', 'Nguyen Tien Manh', NULL, 1, 1, '0338585738', NULL),
(18, 'tranminhhieu@gmail.com', '4852389', 'Tran Minh Hieu', NULL, 1, 1, '0985487510', NULL),
(19, 'nguyenvanquy@gmail.com', '4934912', 'Nguyen Van Quy', NULL, 1, 1, '0384839393', NULL),
(20, 'nguyendangsang@gmail.com', '4329428', 'Nguyen Dang Sang', NULL, 1, 1, '0958375812', NULL),
(21, 'vuducmanh@gmail.com', '1248152', 'Vu Duc Manh', NULL, 1, 1, '0932858492', NULL),
(22, 'duongthiliet@gmail.com', '491912', 'Duong Thi Liet', NULL, 2, 1, '0949389520', NULL),
(23, 'dohoaianh@gmail.com', '123912', 'Do Hoai Anh', NULL, 2, 1, '0394762498', NULL),
(24, 'duonghoaianh@gmail.com', '4230012', 'Duong Hoai Anh', NULL, 2, 1, '0948586939', NULL),
(25, 'tranhlinhchi@gmail.com', '2139093', 'Tran Linh Chi', NULL, 2, 1, '0912436723', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderId` int(11) NOT NULL,
  `ProductDetailId` int(11) NOT NULL,
  `SalePrice` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderId`, `ProductDetailId`, `SalePrice`, `Quantity`) VALUES
(1, 7, 55000, 1),
(1, 8, 65000, 1),
(1, 45, 50000, 1),
(2, 25, 45000, 2),
(3, 21, 35000, 1),
(3, 22, 45000, 1),
(4, 22, 45000, 2),
(5, 43, 45000, 2),
(5, 47, 55000, 2),
(6, 22, 35000, 1),
(6, 26, 55000, 2),
(7, 9, 35000, 2),
(7, 18, 55000, 1),
(7, 22, 45000, 2),
(7, 49, 440000, 2),
(8, 10, 45000, 1),
(8, 11, 55000, 1),
(9, 26, 55000, 1),
(9, 46, 60000, 1),
(10, 26, 55000, 1),
(10, 37, 45000, 1),
(11, 32, 55000, 1),
(11, 46, 60000, 1),
(12, 1, 55000, 2),
(12, 67, 45000, 2),
(13, 2, 65000, 1),
(13, 13, 50000, 2),
(14, 3, 45000, 3),
(14, 14, 60000, 2),
(15, 4, 45000, 2),
(15, 15, 55000, 2),
(16, 5, 60000, 2),
(16, 16, 65000, 2),
(17, 6, 70000, 1),
(17, 17, 45000, 2),
(18, 8, 65000, 2),
(18, 18, 55000, 2),
(19, 7, 55000, 2),
(19, 19, 60000, 2),
(20, 9, 35000, 3),
(20, 20, 70000, 2),
(21, 10, 45000, 2),
(21, 21, 35000, 2),
(22, 12, 65000, 2),
(22, 22, 45000, 2),
(23, 11, 55000, 2),
(23, 23, 45000, 2),
(24, 12, 65000, 2),
(24, 24, 55000, 2),
(25, 13, 50000, 2),
(25, 25, 45000, 2),
(26, 14, 60000, 2),
(26, 26, 55000, 2),
(27, 15, 55000, 2),
(27, 27, 50000, 2),
(28, 18, 55000, 2),
(28, 19, 60000, 2),
(28, 28, 60000, 2),
(29, 19, 60000, 2),
(29, 29, 45000, 2),
(30, 20, 70000, 2),
(30, 30, 55000, 2),
(31, 21, 35000, 4),
(31, 31, 45000, 4),
(32, 22, 45000, 2),
(32, 32, 55000, 2),
(33, 22, 45000, 2),
(33, 33, 50000, 2),
(34, 28, 60000, 1),
(34, 34, 60000, 1),
(35, 23, 45000, 2),
(35, 35, 45000, 2),
(36, 29, 45000, 2),
(36, 36, 55000, 2),
(37, 37, 45000, 2),
(37, 38, 55000, 2),
(38, 38, 55000, 2),
(38, 39, 45000, 2),
(39, 39, 45000, 2),
(39, 69, 45000, 2),
(40, 64, 55000, 1),
(40, 68, 55000, 2),
(41, 41, 45000, 2),
(41, 65, 45000, 2),
(42, 42, 55000, 1),
(42, 66, 55000, 1),
(43, 43, 45000, 2),
(43, 67, 45000, 2),
(44, 44, 55000, 1),
(44, 72, 55000, 1),
(45, 45, 50000, 2),
(45, 73, 45000, 2),
(46, 32, 55000, 1),
(46, 46, 60000, 1),
(47, 33, 50000, 1),
(47, 47, 55000, 1),
(48, 47, 65000, 1),
(48, 77, 50000, 1),
(49, 49, 440000, 2),
(49, 78, 60000, 1),
(50, 50, 540000, 1),
(50, 55, 450000, 1),
(50, 56, 550000, 1),
(51, 43, 45000, 2),
(51, 44, 55000, 1),
(52, 45, 50000, 1),
(52, 46, 60000, 1),
(53, 47, 55000, 1),
(53, 48, 65000, 1),
(54, 57, 45000, 2),
(54, 58, 55000, 1),
(55, 59, 45000, 3),
(55, 60, 55000, 1),
(56, 61, 45000, 2),
(56, 62, 55000, 1),
(57, 63, 45000, 3),
(57, 64, 55000, 2),
(58, 65, 45000, 2),
(58, 66, 55000, 2),
(59, 67, 45000, 1),
(59, 68, 55000, 1),
(60, 69, 45000, 2),
(60, 70, 55000, 1),
(61, 71, 45000, 3),
(61, 72, 55000, 2),
(68, 15, 55000, 7),
(68, 29, 45000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `PurchaseDate` datetime NOT NULL DEFAULT current_timestamp(),
  `DeliveryDate` datetime DEFAULT NULL,
  `PromoId` tinyint(4) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Note` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `MemberId`, `PurchaseDate`, `DeliveryDate`, `PromoId`, `Status`, `Note`) VALUES
(1, 1, '2019-09-27 08:00:00', NULL, NULL, 1, '0123456789'),
(2, 2, '2019-10-03 10:20:00', NULL, NULL, 2, '0987654321'),
(3, 5, '2019-10-04 15:10:00', '2019-10-17 14:43:47', 1, 3, '0213456789'),
(4, 6, '2019-10-04 00:00:00', NULL, NULL, 4, '0132456789'),
(5, 7, '2019-10-05 13:48:00', NULL, 1, 0, '0123465789'),
(6, 8, '2019-10-05 07:00:00', NULL, 2, 1, '0123546789'),
(7, 9, '2019-10-06 09:00:00', NULL, NULL, 2, 'California'),
(8, 8, '2019-10-16 05:34:25', NULL, NULL, 4, ''),
(9, 9, '2019-10-16 05:34:25', NULL, 2, 1, ''),
(10, 8, '2019-10-16 05:34:25', '2019-10-16 11:00:00', 3, 3, ''),
(11, 9, '2019-10-16 05:34:25', NULL, NULL, 4, ''),
(12, 10, '2018-11-03 03:00:40', '2018-11-04 08:00:30', NULL, 3, '0948561277'),
(13, 10, '2018-11-11 02:04:46', '2018-11-12 02:04:46', NULL, 3, '	\r\n0948561277'),
(14, 11, '2018-11-16 03:04:05', '2018-11-17 03:04:05', NULL, 3, '0988888888'),
(15, 11, '2018-11-18 03:04:05', '2018-11-19 03:04:05', NULL, 3, '0988888888'),
(16, 11, '2018-11-18 03:04:05', '2018-11-19 03:04:05', NULL, 3, '	\r\n0988888888'),
(17, 12, '2018-11-23 03:04:05', '2018-11-24 03:04:05', NULL, 3, '0912345678'),
(18, 12, '2018-12-01 03:04:05', '2018-12-02 03:04:05', NULL, 3, '0912345678'),
(19, 12, '2018-12-03 03:04:05', '2018-12-04 03:04:05', NULL, 3, '0912345678'),
(20, 13, '2018-12-04 03:04:05', '2018-12-05 03:04:05', NULL, 3, '0968456789\r\n'),
(21, 13, '2018-12-06 03:04:05', '2018-12-07 03:04:05', NULL, 3, '0968456789\r\n'),
(22, 14, '2018-12-08 03:04:05', '2018-12-09 03:04:05', NULL, 3, '	\r\n0986868686\r\n'),
(23, 14, '2018-12-10 03:04:05', '2018-12-11 03:04:05', NULL, 3, '	\r\n0986868686\r\n'),
(24, 15, '2018-12-15 03:04:05', '2018-12-17 03:04:05', NULL, 3, '0977777777'),
(25, 15, '2018-12-18 03:04:05', '2018-12-19 03:04:05', NULL, 3, '0977777777'),
(26, 16, '2019-01-04 03:04:05', '2019-01-05 03:04:05', 1, 3, '0958828394'),
(27, 16, '2019-01-05 03:04:05', '2019-01-06 03:04:05', 1, 3, '0958828394'),
(28, 17, '2019-01-07 03:04:05', '2019-01-08 03:04:05', NULL, 3, '0338585738'),
(29, 17, '2019-01-10 03:04:05', '2019-01-11 03:04:05', NULL, 3, '0338585738'),
(30, 18, '2019-01-12 03:04:05', '2019-01-13 03:04:05', 2, 3, '0985487510'),
(31, 18, '2019-01-15 03:04:05', '2019-01-16 03:04:05', 2, 3, '0985487510'),
(32, 19, '2019-01-15 03:04:05', '2019-01-16 03:04:05', NULL, 3, '0384839393'),
(33, 19, '2019-01-17 03:04:05', '2019-01-18 03:04:05', NULL, 3, '0384839393'),
(34, 19, '2019-01-19 03:04:05', '2019-01-20 03:04:05', NULL, 3, '0384839393'),
(35, 20, '2019-01-22 03:04:05', '2019-01-23 03:04:05', NULL, 3, '0958375812'),
(36, 21, '2019-02-02 03:04:05', '2019-02-03 03:04:05', NULL, 3, '0932858492'),
(37, 21, '2019-02-05 03:04:05', '2019-02-06 03:04:05', NULL, 3, '0932858492'),
(38, 22, '2019-02-12 03:04:05', '2019-02-13 03:04:05', NULL, 3, '0949389520'),
(39, 22, '2019-03-04 03:04:05', '2019-03-05 03:04:05', NULL, 3, '0949389520'),
(40, 23, '2019-04-10 06:04:05', '2019-04-11 06:04:05', NULL, 3, '0394762498'),
(41, 23, '2019-04-16 06:04:05', '2019-04-17 06:04:05', NULL, 3, '0394762498'),
(42, 24, '2019-05-10 06:04:05', '2019-05-11 06:04:05', NULL, 3, '0948586939'),
(43, 24, '2019-05-20 06:04:05', '2019-05-21 06:04:05', NULL, 3, '0948586939'),
(44, 25, '2019-06-25 06:04:05', '2019-06-26 06:04:05', NULL, 3, '0912436723'),
(45, 25, '2019-07-10 06:04:05', '2019-07-11 06:04:05', NULL, 3, '0912436723'),
(46, 23, '2019-08-10 06:04:05', NULL, NULL, 4, '0394762498'),
(47, 14, '2019-08-17 06:04:05', NULL, NULL, 4, '0986868686'),
(48, 3, '2019-09-06 06:04:05', NULL, NULL, 4, '0123789456'),
(49, 16, '2019-09-08 06:04:05', NULL, NULL, 4, '0958828394'),
(50, 22, '2019-09-16 06:04:05', NULL, NULL, 4, '0949389520'),
(51, 10, '2019-03-06 07:04:05', '2019-03-07 09:04:05', NULL, 3, '0948561277'),
(52, 11, '2019-03-20 07:04:05', '2019-03-21 09:04:05', NULL, 3, '0988888888'),
(53, 12, '2019-03-25 07:04:05', '2019-03-26 09:04:05', NULL, 3, '0912345678'),
(54, 14, '2019-04-20 09:04:05', '2019-04-21 11:04:05', NULL, 3, '0986868686'),
(55, 15, '2019-04-27 09:04:05', '2019-04-28 11:04:05', NULL, 3, '0977777777'),
(56, 16, '2019-05-26 06:04:05', '2019-05-27 06:04:05', NULL, 3, '0958828394'),
(57, 17, '2019-06-05 06:04:05', '2019-06-06 06:04:05', NULL, 3, '0338585738'),
(58, 18, '2019-06-13 06:04:05', '2019-06-14 06:04:05', NULL, 3, '0985487510'),
(59, 19, '2019-07-12 06:04:05', '2019-07-13 06:04:05', NULL, 3, '0384839393'),
(60, 20, '2019-07-23 06:04:05', '2019-07-24 06:04:05', NULL, 3, '0958375812'),
(61, 22, '2019-08-17 06:04:05', '2019-08-18 06:04:05', NULL, 3, '0949389520'),
(68, 1, '2019-10-25 23:58:40', NULL, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `TypeId` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `Image` varchar(255) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `Description` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `Nutrition` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `TypeId`, `Name`, `Image`, `Description`, `Nutrition`, `Status`) VALUES
(1, 1, 'Quýt', 'assets/image/juice bottle/quyt.jpg', 'Tương đương với  7 quả quýt.', '<p>Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, B1, Kali.</p><p><u>CÔNG DỤNG CHUNG:</u>\r\nQuýt là loại quả chứa rất ít chất béo bão hòa, cholesterol và natri nên rất tốt cho tim mạch. Quýt cũng cung cấp cho cơ thể hàm lượng xơ cao và các vitamin như Vitamin A và Vitamin C. Một số công dụng nổi bật của họ nhà quýt: chữa gàu hói, nhức đầu; chữa ho, trị viêm tuyến sữa, trị say xe, và tạo cảm giác ngon miệng.</p>', 1),
(2, 1, 'Táo', 'assets/image/juice bottle/tao.jpg', 'Tương đương với 4 quả táo.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, Vitamin K, Kali\r\n\r\n\r\nCÔNG DỤNG CHUNG\r\nTáo chứa ít chất béo bão hòa, cholesterol, natri và rất tốt cho tim mạch, hệ tiêu hóa.\r\nMột số tác dụng khác của táo: giảm rối loạn đường ruột, viêm túi thừa. Ngoài ra, táo có nhiều kali, đem lại một trái tim khỏe mạnh.', 1),
(3, 1, 'Thanh Long Đỏ', 'assets/image/juice bottle/thanh-long-do.jpg', 'Tương đương với 1.5 quả thanh long đỏ.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, Fe, các loại Vitamin B\r\n\r\nCÔNG DỤNG CHUNG\r\nThanh long có thể giúp cải thiện sức khỏe tim mạch bằng cách giảm mức cholesterol xấu và bổ sung thêm cholesterol tốt. Một số công dụng khác: hỗ trợ tiêu hóa, ngừa tiểu đường và giảm viêm khớp.', 1),
(4, 1, 'Nho', 'assets/image/juice bottle/nho.jpg', 'Tương đương với 1 chùm nho.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, B1, B2.\r\n\r\nCÔNG DỤNG CHUNG\r\nNho chứa ít chất béo bảo hòa, Cholesterol và natri, rất tốt cho tim mạch. Trong nho chứa một hàm lượng Vitamin C và Vvitamin K dồi dào. Một số công dụng khác của nho: chữa bệnh đau nửa đầu, khó tiêu, sỏi thận, mỡ máu, thoái hóa điểm vàng.', 1),
(5, 1, 'Ổi', 'assets/image/juice bottle/oi.jpg', 'Tương đương với 2 quả ổi.', 'Chỉ số dinh dưỡng nổi bật: Vitmain A, C, B1, Folate, Kali\r\n\r\nCÔNG DỤNG CHUNG:\r\nTrái ổi rất tốt cho sức khỏe bởi chứa nhiều vitamin và khoáng chất như vitamin A, folate, kali, đồng và magan; vì thế là một nguồn năng lượng tự nhiên rất tốt cho chế độ ăn nhiều xơ và vitamin C. Ngoài ra, ổi còn rất tốt cho tim mạch, cải thiện chức năng nội tiết, làm đẹp da và chống lão hóa.', 1),
(6, 1, 'Xoài Tượng', 'assets/image/juice bottle/xoai-tuong.jpg', 'Tương đương với 1.5 quả xoài tượng.', '<p>Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, B1, B6, Đồng.</p><p><u>CÔNG DỤNG CHUNG:</u>&nbsp;Xoài là loại trái cây giàu dinh dưỡng, có tác dụng làm sạch da từ bên trong, có ít chất béo bão hòa, cholesterol và natri. Đây là loại hoa quả rất giàu vitamin A,C và B6. Xoài hỗ trợ làm sạch da, rất tốt cho mắt, giảm lượng cholesterol, cải thiện hệ tiêu hóa và tăng cường hệ miễn dịch.</p>', 1),
(7, 1, 'Dưa Vàng', 'assets/image/juice bottle/dua-vang.jpg', 'Tương đương với 1/4 quả dưa vàng.', '<p>Chỉ số dinh dưỡng nổi bật: Vitamn C, Folate, B6, K.</p><p><u>CÔNG DỤNG CHUNG:</u>\r\nDưa vàng có lượng enzyme tiêu hóa lớn nhất trong các nhóm hoa quả. Một số công dụng của dưa vàng: cân bằng lượng đường huyết, giúp da mịn màng tươi trẻ, chống lại viêm khớp và tăng cường hệ miễn dịch.</p>', 1),
(8, 1, 'Cam', 'assets/image/juice bottle/cam.jpg', 'Tương đương với  2.5 quả cam.', '<p>Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali.</p><p><u>CÔNG DỤNG CHUNG:</u>\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.</p>', 1),
(9, 1, 'Dứa', 'assets/image/juice bottle/dua.jpg', 'Tương đương với 1 quả dứa.', '<p>Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan.</p><p><u>CÔNG DỤNG CHUNG:</u> Dứa có rất nhiều vitamin, khoáng chất; cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chứa bromelain. Đây là một hợp chất thực vật rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viêm, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.</p>', 1),
(10, 1, 'Bưởi', 'assets/image/juice bottle/10-buoi.jpg', 'Tương đương với 3/4 quả bưởi.', '<p>Chỉ số dinh dưỡng nổi bật: Vitamin A, C, B6, Kali.</p><p><u>CÔNG DỤNG CHUNG:</u> Bưởi góp phần bổ sung một lượng Vitamin C tuyệt vời và làm tăng sức đề kháng của cơ thể. Bưởi còn là một quả chống oxy hóa, giúp cơ thể chống lại stress và các bệnh liên quan đến hen suyễn và viêm khớp. Ngoài ra, bưởi giúp còn giúp làm đẹp da (trị các vấn đề da khô, mụn trứng cá, nếp nhăn hay vẩy nến), giảm cân, giảm lượng cholesterol trong máu.</p>', 1),
(11, 1, 'Dưa Hấu', 'assets/image/juice bottle/dua-hau.jpg', 'Tương đương với 1/4 quả dưa hấu.', '<p>Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, Protein.</p><p><u>CÔNG DỤNG KHÁC</u>:\r\nDưa hấu chứa rất nhiều Vitamin A và C, với lượng chất béo bão hòa, cholesterol và natri rất thấp. Dưa hấu chính là loại hoa rất tốt để giữ nước cho cơ thể, đặc biệt vào mùa hè; giúp sáng da với lượng đường cao nhưng lại có calo thấp.\r\nMột số tác dụng khác của dưa hấu: bảo vệ da khỏi tia UV, hỗ trợ thị lực, tránh nhiễm trùng và bảo vệ tim mạch.</p>', 1),
(12, 1, 'Dứa Cà Rốt', 'assets/image/juice bottle/dua-ca-rot.jpg', 'Tương đương với 0.5 quả dứa và 3 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả dứa và cà rốt:\r\n\r\nDứa: Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan\r\nCÔNG DỤNG CHUNG\r\nDứa có rất nhiều vitamin khoáng chất, cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chúa bromelain, hợp chất thực vật. Hợp chất này rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viên, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.\r\n\r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\nCÔNG DỤNG CHUNG\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, khó tiêu hoá, phụ nữ da khô. ', 1),
(13, 1, 'Táo Cà Rốt', 'assets/image/juice bottle/tao-ca-rot.jpg', 'Tương đương với 2 quả táo và 3 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả táo và cà rốt:\r\n\r\nTáo: Chỉ số dinh dưỡng nổi bật: Vitamin C, Vitamin K, Kali\r\nCÔNG DỤNG CHUNG\r\nTáo chứa ít chất béo bão hòa, cholesterol, natri và rất tốt cho tim mạch và hệ tiêu hóa.\r\nMột số tác dụng khác của táo: giảm rối loạn đường ruột, viêm túi thừa. Ngoài ra, táo có nhiều kali, đem lại một trái tim khỏe mạnh!\r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\nCÔNG DỤNG CHUNG\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, phụ nữ da khô. ', 1),
(14, 1, 'Nước Ép Mix', 'assets/image/juice bottle/mixed-juice.jpg', 'Bạn có thể chọn tối đa 3 loại rau, quả để ép cùng nhau.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(15, 1, 'Cam Dứa', 'assets/image/juice bottle/cam-dua.jpg', 'Tương đương với 1.5 quả cam và 0.5 quả dứa.', 'Vị thơm ngon tự nhiên với tác dụng của cả cam dứa:\r\n\r\nDứa: Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan\r\nCÔNG DỤNG CHUNG\r\nDứa có rất nhiều vitamin khoáng chất, cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chúa bromelain, hợp chất thực vật. Hợp chất này rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viên, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.\r\n\r\nCam: Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali\r\nCÔNG DỤNG CHUNG\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.', 1),
(16, 1, 'Cam Cà Rốt', 'assets/image/juice bottle/cam-ca-rot.jpg', 'Tương đương với 1.5 quả cam và 1 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả cam và cà rốt:\r\n\r\nCam: Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali\r\nCÔNG DỤNG CHUNG\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.\r\n\r\n \r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\n\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, khó tiêu hoá, phụ nữ da khô. ', 1),
(17, 1, 'Lựu', 'assets/image/juice bottle/luu.jpg', 'Tương đương với 2 quả lựu.', 'Cung cấp nhiều loại vitamin khác nhau đến từ trái lựu. Đặc biệt là có rất nhiều hoạt chất chống oxy hóa.', 1),
(18, 2, 'Popeye\'s Juice', 'assets/image/juice bottle/popeye.jpg', 'Táo, Rau Chân vịt, Cần tây.', 'Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.', 1),
(19, 2, 'Green Glow', 'assets/image/juice bottle/green-glow.jpg', 'Súp lơ xanh, Cần tây, Táo, Lá Bạc hà.', '<p><span style=\"color: rgb(33, 37, 41); font-size: medium; background-color: rgba(0, 0, 0, 0.075);\">Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.</span><br></p>', 1),
(20, 2, 'The Digestive', 'assets/image/juice bottle/the-digestive.jpg', 'Táo, Rau Chân vịt, Dưa chuột.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(21, 1, 'Táo Củ Dền', 'assets/image/juice bottle/21-tao-cu-den.jpg', 'Táo, Củ dền.', '<p>Chỉ số dinh dưỡng nổi bật: Vitamin C, Fe, các loại Vitamin B.</p><p><u> CÔNG DỤNG CHUNG:</u> Củ dền có thể giúp cải thiện sức khỏe tim mạch bằng cách giảm mức cholesterol xấu và bổ sung thêm cholesterol tốt. Một số công dụng khác: hỗ trợ tiêu hóa, ngừa tiểu đường và giảm viêm khớp.</p>', 1),
(22, 1, 'Cam Táo', 'assets/image/juice bottle/cam-tao.jpg', 'Cam, Táo.', '<p>Nhiều vitamin A và C.</p>', 1),
(23, 2, 'Green Power', 'assets/image/juice bottle/green-power.jpg', 'Súp lơ xanh, Rau Chân vịt, Táo, Dưa chuột.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(24, 2, 'The Reset', 'assets/image/juice bottle/the-reset.jpg', 'Súp lơ xanh, Táo, Dứa, Cải xoăn.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(25, 3, 'Combo Detox', 'assets/image/juice bottle/combo-detox.jpg', 'Liệu trình Thải độc / Giảm cân\r\n', 'Combo Detox mới nhất của Juice Bazar với nguồn Vitamin phong phú và chất khoáng dồi dào từ nhiều loại rau, củ, quả tươi sẽ mang đến cho bạn 1 trải nghiệm mới về thanh lọc cơ thể và chăm sóc sức khoẻ hàng ngày!', 1),
(26, 3, 'Combo Skin Care', 'assets/image/juice bottle/combo-dep-da.jpg', 'Liệu trình Đẹp da', '<p><span style=\"color: rgb(33, 37, 41); font-size: medium; background-color: rgba(0, 0, 0, 0.075);\">Combo Đẹp Da mới nhất của Juice Bazar với nguồn Vitamin phong phú và chất khoáng dồi dào từ nhiều loại rau, củ, quả tươi sẽ mang đến cho bạn 1 trải nghiệm mới về thanh lọc cơ thể và chăm sóc sức khoẻ hàng ngày!</span><br></p>', 1),
(27, 3, 'Combo Digestion Helper', 'assets/image/juice bottle/combo-tieu-hoa.jpg', 'Liệu trình Hỗ trợ tiêu hóa', '<p><span style=\"color: rgb(33, 37, 41); font-size: medium; background-color: rgba(0, 0, 0, 0.075);\">Combo </span>Hỗ trợ tiêu hóa <span style=\"color: rgb(33, 37, 41); font-size: medium; background-color: rgba(0, 0, 0, 0.075);\">mới nhất của Juice Bazar với nguồn Vitamin phong phú và chất khoáng dồi dào từ nhiều loại rau, củ, quả tươi sẽ mang đến cho bạn 1 trải nghiệm mới về thanh lọc cơ thể và chăm sóc sức khoẻ hàng ngày!</span><br></p>', 1),
(28, 3, 'Combo Immune System Boost', 'assets/image/juice bottle/combo-de-khang.jpg', 'Liệu trình Tăng cường đề kháng', '<p>Liệu trình Tăng cường đề kháng<br></p>', 1),
(32, 5, 'Vietnamese Black Coffee', NULL, 'Cà phê đen.', NULL, 0),
(33, 5, 'Vietnamese Milk Coffee', NULL, 'Cà phê nâu.', NULL, 0),
(34, 4, 'Super Berries Tea', NULL, 'Trà Dâu, Mâm xôi, Việt quất.', NULL, 0),
(35, 4, 'Green Tea', NULL, 'Trà Xanh.', NULL, 0),
(36, 4, 'Peppermint Tea', NULL, 'Trà Bạc hà.', NULL, 0),
(37, 4, 'Lemongrass,Ginger & Citrus', NULL, 'Trà Sả, Gừng, Cam, Quất.', NULL, 0),
(39, 1, 'Mắc Cọp', NULL, 'Mắc Cọp.', NULL, 0),
(40, 1, 'Lê', NULL, 'Lê.', NULL, 0),
(42, 1, 'Táo Lựu', NULL, 'Táo, Lựu.', NULL, 0),
(43, 1, 'Xoài xanh Ổi', NULL, 'Xoài xanh, Ổi.', NULL, 0),
(44, 2, 'Balance', 'assets/image/juice bottle/44-balance.jpg', 'Táo, Cà Rốt, Rau Chân vịt, Chanh.', '<p>Nhiều chất dinh dưỡng, vitamin A và C từ cả rau củ và hoa quả.</p>', 1),
(45, 2, 'Ring The Bell', 'assets/image/juice bottle/ring-the-bell.jpg', 'Táo, Rau Chân vịt, Ớt chuông xanh.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(46, 2, 'Power Up', 'assets/image/juice bottle/power-up.jpg', 'Táo, Dứa, Dưa Chuột, Rau Chân vịt, Lá Bạc hà, Gừng.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(47, 2, 'Super Veggies', 'assets/image/juice bottle/super-veggies.jpg', 'Cam, Táo, Củ dền, Rau Cần tây, Cà rốt, Dưa chuột.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(48, 2, 'Refresh', 'assets/image/juice bottle/refresh.jpg', 'Táo, Dứa, Dưa chuột, Rau Chân vịt, Chanh, Lá Bạc hà, Mật ong.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(49, 2, 'Happy Greens', 'assets/image/juice bottle/happy-greens.jpg', 'Cam, Táo, Rau Chân vịt, Rau Cần tây.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1),
(51, 2, 'Kale Me Maybe', 'assets/image/juice bottle/kale-me-maybe.jpg', 'Táo, Cam, Rau Chân vịt, Rau Cải xoăn.', '<p>Nhiều chất dinh dưỡng, vitamin và khoáng chất từ cả rau củ và hoa quả.<br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `ProductDetailId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `CapacityId` tinyint(4) NOT NULL,
  `Price` int(11) NOT NULL,
  `EntryPrice` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productdetail`
--

INSERT INTO `productdetail` (`ProductDetailId`, `ProductId`, `CapacityId`, `Price`, `EntryPrice`, `Quantity`) VALUES
(1, 1, 1, 55000, 43000, 15),
(2, 1, 2, 65000, 50000, 15),
(3, 2, 1, 45000, 35000, 20),
(4, 2, 2, 55000, 43000, 20),
(5, 3, 1, 60000, 47000, 15),
(6, 3, 2, 70000, 50000, 15),
(7, 4, 1, 55000, 42000, 25),
(8, 4, 2, 65000, 50000, 25),
(9, 5, 1, 35000, 27000, 31),
(10, 5, 2, 45000, 34000, 30),
(11, 6, 1, 55000, 43000, 20),
(12, 6, 2, 65000, 51000, 20),
(13, 7, 1, 50000, 37000, 25),
(14, 7, 2, 60000, 48000, 25),
(15, 8, 1, 55000, 43000, 20),
(16, 8, 2, 65000, 51000, 20),
(17, 9, 1, 45000, 35000, 30),
(18, 9, 2, 55000, 43000, 31),
(19, 10, 1, 60000, 48000, 15),
(20, 10, 2, 70000, 50000, 15),
(21, 11, 1, 35000, 25000, 29),
(22, 11, 2, 45000, 34000, 35),
(23, 12, 1, 45000, 35000, 20),
(24, 12, 2, 55000, 43000, 20),
(25, 13, 1, 45000, 34000, 25),
(26, 13, 2, 55000, 43000, 25),
(27, 14, 1, 50000, 40000, 10),
(28, 14, 2, 60000, 45000, 10),
(29, 15, 1, 45000, 32000, 20),
(30, 15, 2, 55000, 42000, 20),
(31, 16, 1, 45000, 34000, 20),
(32, 16, 2, 55000, 43000, 20),
(33, 17, 1, 50000, 38000, 15),
(34, 17, 2, 60000, 48000, 15),
(35, 18, 1, 45000, 32000, 20),
(36, 18, 2, 55000, 43000, 20),
(37, 19, 1, 45000, 39000, 30),
(38, 19, 2, 55000, 44000, 30),
(39, 20, 1, 45000, 35000, 30),
(40, 20, 2, 55000, 43000, 30),
(41, 21, 1, 45000, 34000, 25),
(42, 21, 2, 55000, 43000, 24),
(43, 22, 1, 45000, 34000, 17),
(44, 22, 2, 55000, 43000, 20),
(45, 23, 1, 50000, 40000, 15),
(46, 23, 2, 60000, 45000, 15),
(47, 24, 1, 55000, 42000, 15),
(48, 24, 2, 65000, 50000, 15),
(49, 25, 1, 440000, 300000, 12),
(50, 25, 2, 540000, 420000, 10),
(51, 26, 1, 450000, 310000, 10),
(52, 26, 2, 550000, 425000, 10),
(53, 27, 1, 450000, 310000, 10),
(54, 27, 2, 550000, 420000, 10),
(55, 28, 1, 450000, 300000, 10),
(56, 28, 2, 550000, 410000, 10),
(57, 39, 1, 45000, 32000, 15),
(58, 39, 2, 55000, 43000, 20),
(59, 40, 1, 45000, 33000, 10),
(60, 40, 2, 55000, 42000, 15),
(61, 42, 1, 45000, 33000, 12),
(62, 42, 2, 55000, 42000, 15),
(63, 43, 1, 45000, 34000, 15),
(64, 43, 2, 55000, 43000, 15),
(65, 44, 1, 45000, 34000, 16),
(66, 44, 2, 55000, 43000, 15),
(67, 45, 1, 45000, 34000, 20),
(68, 45, 2, 55000, 43000, 25),
(69, 46, 1, 45000, 34000, 25),
(70, 46, 2, 55000, 43000, 30),
(71, 47, 1, 45000, 34000, 40),
(72, 47, 2, 55000, 43000, 50),
(73, 48, 1, 45000, 34000, 30),
(74, 48, 2, 55000, 43000, 40),
(75, 49, 1, 50000, 40000, 45),
(76, 49, 2, 60000, 47000, 40),
(77, 51, 1, 50000, 38000, 30),
(78, 51, 2, 60000, 48000, 40);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `PromoId` tinyint(4) NOT NULL,
  `PromoName` varchar(50) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `PromoValue` float NOT NULL,
  `PromoStatus` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`PromoId`, `PromoName`, `PromoValue`, `PromoStatus`) VALUES
(1, 'JUICEFORWOMEN', 0.05, 1),
(2, 'JUICEBAZAR2019', 0.1, 0),
(3, 'JUICEFORKID', 0.2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeId` int(11) NOT NULL,
  `Type` varchar(50) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `TypeStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeId`, `Type`, `TypeStatus`) VALUES
(1, 'Fruits', 1),
(2, 'Greens', 1),
(3, 'Combo', 1),
(4, 'Hot Teas', 0),
(5, 'Coffees', 0),
(6, 'Other Drinks', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`CapacityId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberId`),
  ADD UNIQUE KEY `EmailClient` (`Email`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderId`,`ProductDetailId`),
  ADD KEY `FK_OrderDetail_ProductDetail` (`ProductDetailId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `FK_Orders_Member` (`MemberId`) USING BTREE,
  ADD KEY `PromoId` (`PromoId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `fk_Product_Type` (`TypeId`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`ProductDetailId`),
  ADD KEY `FK_ProductDetail_Product` (`ProductId`),
  ADD KEY `FK_ProductDetail_Capacity` (`CapacityId`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`PromoId`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `CapacityId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `ProductDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `PromoId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_OrderDetail_Order` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`OrderId`),
  ADD CONSTRAINT `FK_OrderDetail_ProductDetail` FOREIGN KEY (`ProductDetailId`) REFERENCES `productdetail` (`ProductDetailId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_Orders_Member` FOREIGN KEY (`MemberId`) REFERENCES `member` (`MemberId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`PromoId`) REFERENCES `promotion` (`PromoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Type` FOREIGN KEY (`TypeId`) REFERENCES `type` (`TypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `FK_ProductDetail_Capacity` FOREIGN KEY (`CapacityId`) REFERENCES `capacity` (`CapacityId`),
  ADD CONSTRAINT `FK_ProductDetail_Product` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
