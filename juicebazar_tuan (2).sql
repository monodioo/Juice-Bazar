-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 08:32 AM
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
  `User` varchar(32) COLLATE utf32_vietnamese_ci NOT NULL,
  `Pass` varchar(32) COLLATE utf32_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

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
  `Email` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `Pass` varchar(32) COLLATE utf32_vietnamese_ci NOT NULL,
  `Name` varchar(50) COLLATE utf32_vietnamese_ci NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Gender` tinyint(1) NOT NULL DEFAULT 0,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `Phone` varchar(10) COLLATE utf32_vietnamese_ci NOT NULL,
  `Address` varchar(255) COLLATE utf32_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberId`, `Email`, `Pass`, `Name`, `Birthday`, `Gender`, `Status`, `Phone`, `Address`) VALUES
(1, 'mark0514@gmail.com', 'mark0514', 'Mark Zuckerberg', '1984-05-14', 1, 1, '0123456789', NULL),
(2, 'bill1028@gmail.com', 'bill1028', 'Bill Gates', '1955-10-28', 1, 1, '0987654321', NULL),
(3, 'messi0624@Gmail.com', 'messi0624', 'Lionel Messi', '1987-06-24', 1, 1, '0123789456', NULL),
(4, 'ronaldo0205@gmail.com', 'ronaldo0205', 'Cristiano Ronaldo', '1985-02-05', 1, 1, '0987321654', NULL),
(5, 'tanvlog1961@gmail.com', 'batanvlog', 'Ba Tan', NULL, 2, 1, '0213456789', NULL),
(6, 'ntn1994@gmail.com', 'ntn1994', 'Nguyen Thanh Nam', NULL, 1, 1, '0132456789', NULL),
(7, 'thonguyen1992@gmail.com', 'thonguyen', 'Nguyen Hong Tho', NULL, 2, 1, '0123465789', NULL),
(8, 'johnwick64@gmail.com', 'johnwick64', 'Johnathan Wick', '1964-09-02', 1, 1, '0123546789', NULL),
(9, 'nudetiger@gmail.com', 'nudetiger', 'Tran Dan', NULL, 0, 1, '0987654312', 'California');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CapacityId` tinyint(4) NOT NULL
) ;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderId`, `ProductId`, `Quantity`, `CapacityId`) VALUES
(1, 8, 2, 1),
(1, 10, 1, 1),
(1, 45, 1, 1),
(2, 25, 10, 2),
(3, 22, 1, 1),
(3, 42, 1, 1),
(4, 22, 2, 1),
(5, 43, 1, 2),
(5, 47, 1, 2),
(6, 22, 2, 1),
(6, 26, 2, 2),
(7, 9, 1, 1),
(7, 18, 2, 1),
(7, 22, 5, 2),
(7, 49, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `PurchaseDate` datetime NOT NULL DEFAULT current_timestamp(),
  `DeliveryDate` datetime DEFAULT NULL,
  `PromoId` tinyint(4),
  `TotalPrice` double NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Note` text COLLATE utf32_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `MemberId`, `PurchaseDate`, `DeliveryDate`, `PromoId`, `TotalPrice`, `Status`, `Note`) VALUES
(1, 1, '2019-10-02 20:35:00', NULL, NULL, 0, 2, '0123456789'),
(2, 2, '2019-10-03 10:20:00', NULL, NULL, 0, 2, '0987654321'),
(3, 5, '2019-10-04 15:10:00', NULL, NULL, 0, 2, '0213456789'),
(4, 6, '2019-10-04 00:00:00', NULL, NULL, 0, 0, '0132456789'),
(5, 7, '2019-10-05 00:00:00', NULL, NULL, 0, 1, '0123465789'),
(6, 8, '2019-10-05 07:00:00', NULL, NULL, 0, 1, '0123546789'),
(7, 9, '2019-10-06 09:00:00', NULL, NULL, 0, 2, 'California');

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `ProductId` int(11) NOT NULL,
  `CapacityId` tinyint(4) NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`ProductId`, `CapacityId`, `Price`, `Quantity`) VALUES
(1, 1, 55000, 15),
(1, 2, 65000, 15),
(2, 1, 45000, 20),
(2, 2, 55000, 20),
(3, 1, 60000, 15),
(3, 2, 70000, 15),
(4, 1, 55000, 25),
(4, 2, 65000, 25),
(5, 1, 35000, 30),
(5, 2, 45000, 30),
(6, 1, 55000, 20),
(6, 2, 65000, 20),
(7, 1, 50000, 25),
(7, 2, 60000, 25),
(8, 1, 55000, 20),
(8, 2, 65000, 20),
(9, 1, 45000, 30),
(9, 2, 55000, 30),
(10, 1, 60000, 15),
(10, 2, 70000, 15),
(11, 1, 35000, 30),
(11, 2, 45000, 30),
(12, 1, 45000, 20),
(12, 2, 55000, 20),
(13, 1, 45000, 25),
(13, 2, 55000, 25),
(14, 1, 50000, 10),
(14, 2, 60000, 10),
(15, 1, 45000, 20),
(15, 2, 55000, 20),
(16, 1, 45000, 20),
(16, 2, 55000, 20),
(17, 1, 50000, 15),
(17, 2, 60000, 15),
(18, 1, 45000, 20),
(18, 2, 55000, 20),
(19, 1, 45000, 30),
(19, 2, 55000, 30),
(20, 1, 45000, 30),
(20, 2, 55000, 30),
(21, 1, 45000, 25),
(21, 2, 55000, 25),
(22, 1, 45000, 20),
(22, 2, 55000, 20),
(23, 1, 50000, 15),
(23, 2, 60000, 15),
(24, 1, 55000, 15),
(24, 2, 65000, 15),
(25, 1, 440000, 10),
(25, 2, 540000, 10),
(26, 1, 450000, 10),
(26, 2, 550000, 10),
(27, 1, 450000, 10),
(27, 2, 550000, 10),
(28, 1, 450000, 10),
(28, 2, 550000, 10),
(39, 1, 45000, 15),
(39, 2, 55000, 20),
(40, 1, 45000, 10),
(40, 2, 55000, 15),
(42, 1, 45000, 15),
(42, 2, 55000, 15),
(43, 1, 45000, 15),
(43, 2, 55000, 15),
(44, 1, 45000, 15),
(44, 2, 55000, 15),
(45, 1, 45000, 20),
(45, 2, 55000, 25),
(46, 1, 45000, 25),
(46, 2, 55000, 30),
(47, 1, 45000, 40),
(47, 2, 55000, 50),
(48, 1, 45000, 30),
(48, 2, 55000, 40),
(49, 1, 50000, 45),
(49, 2, 60000, 40),
(51, 1, 50000, 30),
(51, 2, 60000, 40);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `TypeId` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf32_vietnamese_ci NOT NULL,
  `Image` varchar(255) COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `Description` text COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `Nutrition` text COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `TypeId`, `Name`, `Image`, `Description`, `Nutrition`, `Status`) VALUES
(1, 1, 'Quýt', 'assets/image/juice bottle/quyt.png', 'Tương đương với  7 quả quýt.', 'Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, B1, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\nQuýt là loại quả chứa rất ít chất béo bão hòa, cholesterol và natri nên rất tốt cho tim mạch. Quýt cũng cung cấp cho cơ thể hàm lượng xơ cao và các vitamin như Vitamin A và Vitamin C. Một số công dụng nổi bật của họ nhà quýt: chữa gàu hói, nhức đầu; chữa ho, trị viêm tuyến sữa, trị say xe, và tạo cảm giác ngon miệng.', 1),
(2, 1, 'Táo', 'assets/image/juice bottle/tao.png', 'Tương đương với 4 quả táo.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, Vitamin K, Kali\r\n\r\n\r\nCÔNG DỤNG CHUNG\r\nTáo chứa ít chất béo bão hòa, cholesterol, natri và rất tốt cho tim mạch, hệ tiêu hóa.\r\nMột số tác dụng khác của táo: giảm rối loạn đường ruột, viêm túi thừa. Ngoài ra, táo có nhiều kali, đem lại một trái tim khỏe mạnh.', 1),
(3, 1, 'Thanh Long Đỏ', 'assets/image/juice bottle/thanh long do.png', 'Tương đương với 1.5 quả thanh long đỏ.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, Fe, các loại Vitamin B\r\n\r\nCÔNG DỤNG CHUNG\r\nThanh long có thể giúp cải thiện sức khỏe tim mạch bằng cách giảm mức cholesterol xấu và bổ sung thêm cholesterol tốt. Một số công dụng khác: hỗ trợ tiêu hóa, ngừa tiểu đường và giảm viêm khớp.', 1),
(4, 1, 'Nho', 'assets/image/juice bottle/nho.png', 'Tương đương với 1 chùm nho.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, B1, B2.\r\n\r\nCÔNG DỤNG CHUNG\r\nNho chứa ít chất béo bảo hòa, Cholesterol và natri, rất tốt cho tim mạch. Trong nho chứa một hàm lượng Vitamin C và vitamin K dồi dào. Một số công dụng khác của nho: chữa bệnh đau nửa đầu, khó tiêu, sỏi thận, mỡ máu, thoái hóa điểm vàng .', 1),
(5, 1, 'Ổi', 'assets/image/juice bottle/oi.png', 'Tương đương với 2 quả ổi.', 'Chỉ số dinh dưỡng nổi bật: Vitmain A, C, B1, Folate, Kali\r\n\r\nCÔNG DỤNG CHUNG:\r\nTrái ổi rất tốt cho sức khỏe bởi chứa nhiều vitamin và khoáng chất như vitamin A, folate, kali, đồng và magan; vì thế là một nguồn năng lượng tự nhiên rất tốt cho chế độ ăn nhiều xơ và vitamin C. Ngoài ra, ổi còn rất tốt cho tim mạch, cải thiện chức năng nội tiết, làm đẹp da và chống lão hóa.', 1),
(6, 1, 'Xoài Tượng', 'assets/image/juice bottle/xoai tuong.png', 'Tương đương với 1.5 quả xoài tượng.', 'Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, B1, B6, Đồng\r\n\r\nCÔNG DỤNG CHUNG\r\nXoài là loại trái cây giàu dinh dưỡng, có tác dụng làm sạch da từ bên trong, có ít chất béo bão hòa, cholesterol và natri. Đây là loại hoa quả rất giàu vitamin A,C và B6. Công dụng chung: làm sạch da, rất tốt cho mắt, giảm lượng cholesterol, cải thiện hệ tiêu hóa và tăng cường hệ miễn dịch.', 1),
(7, 1, 'Dưa Vàng', 'assets/image/juice bottle/dua vang.png', 'Tương đương với 1/4 quả dưa vàng.', 'Chỉ số dinh dưỡng nổi bật: Vitamn C, Folate, B6, K\r\n\r\nCÔNG DỤNG CHUNG\r\nDưa vàng có lượng enzyme tiêu hóa lớn nhất trong các nhóm hoa quả. Một số công dụng của dưa vàng: cân bằng lượng đường huyết, giúp da mịn màng tươi trẻ, chống lại viêm khớp và tăng cường hệ miễn dịch.', 1),
(8, 1, 'Cam', 'assets/image/juice bottle/cam.png', 'Tương đương với  2.5 quả cam.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.', 1),
(9, 1, 'Dứa', 'assets/image/juice bottle/dua.png', 'Tương đương với 1 quả dứa.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan\r\n\r\nCÔNG DỤNG CHUNG\r\nDứa có rất nhiều vitamin khoáng chất, cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chứa bromelain, hợp chất thực vật. Hợp chất này rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viêm, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.', 1),
(10, 1, 'Bưởi', 'assets/image/juice bottle/buoi.png', 'Tương đương với 3/4 quả bưởi.', 'Chỉ số dinh dưỡng nổi bật: Vitamin A, C, B6, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\nBưởi góp phần bổ sung một lượng Vitamin C tuyệt vời và làm tăng sức đề kháng của cơ thể. Bưởi còn là một quả chống oxy hóa, giúp cơ thể chống lại stress và các bệnh liên quan đến hen suyễn và viêm khớp. Ngoài ra, bưởi giúp còn giúp làm đẹp da (trị các vấn đề da khô, mụn trứng cá, nếp nhăn hay vẩy nến), giảm cân, giảm lượng cholesterol trong máu.', 1),
(11, 1, 'Dưa Hấu', 'assets/image/juice bottle/dua hau.png', 'Tương đương với 1/4 quả dưa hấu.', 'Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, Protein\r\n\r\nCÔNG DỤNG KHÁC:\r\nDưa hấu chứa rất nhiều Vitamin A và C, với lượng chất béo bão hòa, cholesterol và natri rất thấp. Dưa hấu chính là loại hoa rất tốt để giữ nước cho cơ thể, đặc biệt vào mùa hè; giúp sáng da với lượng đường cao nhưng lại có calo thấp.\r\nMột số tác dụng khác của dưa hấu: bảo vệ da khỏi tia UV, hỗ trợ thị lực, tránh nhiễm trùng và bảo vệ tim mạch.', 1),
(12, 1, 'Dứa Cà Rốt', 'assets/image/juice bottle/dua ca rot.png', 'Tương đương với 0.5 quả dứa và 3 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả dứa và cà rốt:\r\n\r\nDứa: Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan\r\nCÔNG DỤNG CHUNG\r\nDứa có rất nhiều vitamin khoáng chất, cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chúa bromelain, hợp chất thực vật. Hợp chất này rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viên, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.\r\n\r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\nCÔNG DỤNG CHUNG\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, khó tiêu hoá, phụ nữ da khô. ', 1),
(13, 1, 'Táo Cà Rốt', 'assets/image/juice bottle/tao ca rot.PNG', 'Tương đương với 2 quả táo và 3 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả táo và cà rốt:\r\n\r\nTáo: Chỉ số dinh dưỡng nổi bật: Vitamin C, Vitamin K, Kali\r\nCÔNG DỤNG CHUNG\r\nTáo chứa ít chất béo bão hòa, cholesterol, natri và rất tốt cho tim mạch và hệ tiêu hóa.\r\nMột số tác dụng khác của táo: giảm rối loạn đường ruột, viêm túi thừa. Ngoài ra, táo có nhiều kali, đem lại một trái tim khỏe mạnh!\r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\nCÔNG DỤNG CHUNG\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, phụ nữ da khô. ', 1),
(14, 1, 'Nước Ép Mix', 'assets/image/juice bottle/nuoc ep mix.PNG', 'Bạn có thể chọn tối đa 3 loại rau, quả để ép cùng nhau.', NULL, 1),
(15, 1, 'Cam Dứa', 'assets/image/juice bottle/cam dua.jpg', 'Tương đương với 1.5 quả cam và 0.5 quả dứa.', 'Vị thơm ngon tự nhiên với tác dụng của cả cam dứa:\r\n\r\nDứa: Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan\r\nCÔNG DỤNG CHUNG\r\nDứa có rất nhiều vitamin khoáng chất, cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chúa bromelain, hợp chất thực vật. Hợp chất này rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viên, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.\r\n\r\nCam: Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali\r\nCÔNG DỤNG CHUNG\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.', 1),
(16, 1, 'Cam Cà Rốt', 'assets/image/juice bottle/cam ca rot.png', 'Tương đương với 1.5 quả cam và 1 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả cam và cà rốt:\r\n\r\nCam: Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali\r\nCÔNG DỤNG CHUNG\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.\r\n\r\n \r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\n\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, khó tiêu hoá, phụ nữ da khô. ', 1),
(17, 1, 'Lựu', 'assets/image/juice bottle/luu.png', 'Tương đương với 2 quả lựu.', NULL, 1),
(18, 2, 'Popeye\'s Juice', 'assets/image/juice bottle/Popeye Juice.png', 'Táo, Rau Chân vịt, Cần tây.', NULL, 1),
(19, 2, 'Green Glow', 'assets/image/juice bottle/green glow.jpg', 'Súp lơ xanh, Cần tây, Táo, Lá Bạc hà.', NULL, 1),
(20, 2, 'The Digestive', 'assets/image/juice bottle/the digestive.jpg', 'Táo, Rau Chân vịt, Dưa chuột.', NULL, 1),
(21, 1, 'Táo Củ Dền', 'assets/image/juice bottle/tao cu den.png', 'Táo, Củ dền.', NULL, 1),
(22, 1, 'Cam Táo', 'assets/image/juice bottle/cam tao.jpg', 'Cam, Táo.', NULL, 1),
(23, 2, 'Green Power', 'assets/image/juice bottle/Green Power.jpg', 'Súp lơ xanh, Rau Chân vịt, Táo, Dưa chuột.', NULL, 1),
(24, 2, 'The Reset', 'assets/image/juice bottle/The Reset.jpg', 'Súp lơ xanh, Táo, Dứa, Cải xoăn.', NULL, 1),
(25, 3, 'Combo Detox', 'assets/image/juice bottle/combo detox.jpg', 'Liệu trình Thải độc / Giảm cân\r\n', 'Combo Detox mới nhất của Juice Bazar với nguồn Vitamin phong phú và chất khoáng dồi dào từ nhiều loại rau, củ, quả tươi sẽ mang đến cho bạn 1 trải nghiệm mới về thanh lọc cơ thể và chăm sóc sức khoẻ hàng ngày!', 1),
(26, 3, 'Combo Đẹp Da', 'assets/image/juice bottle/combo dep da.jpg', 'Liệu trình Đẹp da', NULL, 1),
(27, 3, 'Digestion Helper', 'assets/image/juice bottle/combo detox.jpg', 'Liệu trình Hỗ trợ tiêu hóa', NULL, 1),
(28, 3, 'Immune System Boost', 'assets/image/juice bottle/combo detox.jpg', 'Liệu trình Tăng cường đề kháng', NULL, 1),
(29, 6, 'Cold Ginger & Lime', NULL, 'Trà Gừng, Chanh.', NULL, 0),
(30, 6, 'Earl Grey Honey & Lime Iced Tea', NULL, 'Trà Chanh Mật Ong.', NULL, 0),
(31, 6, 'Watermelon & Lychee Iced Tea', NULL, 'Trà Dưa hấu Vải.', NULL, 0),
(32, 5, 'Vietnamese Black Coffee', NULL, 'Cà phê đen.', NULL, 0),
(33, 5, 'Vietnamese Milk Coffee', NULL, 'Cà phê nâu.', NULL, 0),
(34, 4, 'Super Berries Tea', NULL, 'Trà Dâu, Mâm xôi, Việt quất.', NULL, 0),
(35, 4, 'Green Tea', NULL, 'Trà Xanh.', NULL, 0),
(36, 4, 'Peppermint Tea', NULL, 'Trà Bạc hà.', NULL, 0),
(37, 4, 'Lemongrass,Ginger & Citrus', NULL, 'Trà Sả, Gừng, Cam, Quất.', NULL, 0),
(39, 1, 'Mắc Cọp', NULL, NULL, NULL, 0),
(40, 1, 'Lê', NULL, NULL, NULL, 0),
(42, 1, 'Táo Lựu', NULL, 'Táo, Lựu.', NULL, 0),
(43, 1, 'Xoài xanh Ổi', NULL, 'Xoài xanh, Ổi.', NULL, 0),
(44, 2, 'Balance', 'assets/image/juice bottle/Balance.jpg', 'Táo, Cà Rốt, Rau Chân vịt, Chanh.', NULL, 1),
(45, 2, 'Ring The Bell', 'assets/image/juice bottle/Ring The Bell.jpg', 'Táo, Rau Chân vịt, Ớt chuông xanh.', NULL, 1),
(46, 2, 'Power Up', 'assets/image/juice bottle/Power Up.jpg', 'Táo, Dứa, Dưa Chuột, Rau Chân vịt, Lá Bạc hà, Gừng.', NULL, 1),
(47, 2, 'Super Veggies', 'assets/image/juice bottle/Super Veggies.jpg', 'Cam, Táo, Củ dền, Rau Cần tây, Cà rốt, Dưa chuột.', NULL, 1),
(48, 2, 'Refresh', 'assets/image/juice bottle/Refresh.jpg', 'Táo, Dứa, Dưa chuột, Rau Chân vịt, Chanh, Lá Bạc hà, Mật ong.', NULL, 1),
(49, 2, 'Happy Greens', 'assets/image/juice bottle/Happy Greens.jpg', 'Cam, Táo, Rau Chân vịt, Rau Cần tây.', NULL, 1),
(51, 2, 'Kale Me Maybe', 'assets/image/juice bottle/Kale Me Maybe.jpg', 'Táo, Cam, Rau Chân vịt, Rau Cải xoăn.', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promomember`
--

CREATE TABLE `promomember` (
  `MemberId` int(11) NOT NULL,
  `PromoId` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Dumping data for table `promomember`
--

INSERT INTO `promomember` (`MemberId`, `PromoId`) VALUES
(1, 2),
(2, 2),
(3, 2),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `PromoId` tinyint(4) NOT NULL,
  `PromoName` varchar(50) COLLATE utf32_vietnamese_ci NOT NULL,
  `PromoValue` float NOT NULL,
  `PromoStatus` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`PromoId`, `PromoName`, `PromoValue`, `PromoStatus`) VALUES
(1, 'JUICEFORWOMEN', 0.05, 1),
(2, 'JUICEBAZAR2019', 0.1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeId` int(11) NOT NULL,
  `Type` varchar(50) COLLATE utf32_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeId`, `Type`) VALUES
(1, 'Fruit Juices'),
(2, 'Green Juices'),
(3, 'Combos'),
(4, 'Hot Teas'),
(5, 'Coffees'),
(6, 'Other Drinks');

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
  ADD PRIMARY KEY (`OrderId`,`ProductId`,`CapacityId`),
  ADD KEY `FK_OrderDetail_Product` (`ProductId`),
  ADD KEY `FK_OrderDetail_Capacity` (`CapacityId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `FK_Orders_Member` (`MemberId`) USING BTREE,
  ADD KEY `PromoId` (`PromoId`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`ProductId`,`CapacityId`),
  ADD KEY `fk_Inventory_Capacity` (`CapacityId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `fk_Product_Type` (`TypeId`);

--
-- Indexes for table `promomember`
--
ALTER TABLE `promomember`
  ADD PRIMARY KEY (`MemberId`,`PromoId`),
  ADD KEY `FK_PromoMember_Promotion` (`PromoId`);

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
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `PromoId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_OrderDetail_Capacity` FOREIGN KEY (`CapacityId`) REFERENCES `capacity` (`CapacityId`),
  ADD CONSTRAINT `FK_OrderDetail_Order` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`OrderId`),
  ADD CONSTRAINT `FK_OrderDetail_Product` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_Orders_Member` FOREIGN KEY (`MemberId`) REFERENCES `member` (`MemberId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`PromoId`) REFERENCES `promotion` (`PromoId`);

--
-- Constraints for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `fk_Inventory_Capacity` FOREIGN KEY (`CapacityId`) REFERENCES `capacity` (`CapacityId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Inventory_Product` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Type` FOREIGN KEY (`TypeId`) REFERENCES `type` (`TypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promomember`
--
ALTER TABLE `promomember`
  ADD CONSTRAINT `FK_PromoMember_Member` FOREIGN KEY (`MemberId`) REFERENCES `member` (`MemberId`),
  ADD CONSTRAINT `FK_PromoMember_Promotion` FOREIGN KEY (`PromoId`) REFERENCES `promotion` (`PromoId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
