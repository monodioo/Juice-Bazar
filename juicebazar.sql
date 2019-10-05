-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 10:54 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

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
create database `juicebazar`;
use `juicebazar`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `User` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `CapacityId` tinyint(4) NOT NULL,
  `Capacity` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberId` int(11) NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Gender` tinyint(1) NOT NULL DEFAULT 0,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `PurchaseDate` datetime NOT NULL,
  `DeliveryDate` datetime DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Note` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricebycapacity`
--

CREATE TABLE `pricebycapacity` (
  `ProductId` int(11) NOT NULL,
  `CapacityId` tinyint(4) NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `TypeId` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nutrition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `TypeId`, `Name`, `Image`, `Description`, `Nutrition`, `Status`) VALUES
(1, 1, 'Quýt', '../assets/image/juice bottle/quyt.png', 'Tương đương với  7 quả quýt.', 'Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, B1, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\nQuýt là loại quả chứa rất ít chất béo bão hòa, cholesterol và natri nên rất tốt cho tim mạch. Quýt cũng cung cấp cho cơ thể hàm lượng xơ cao và các vitamin như Vitamin A và Vitamin C. Một số công dụng nổi bật của họ nhà quýt: chữa gàu hói, nhức đầu; chữa ho, trị viêm tuyến sữa, trị say xe, và tạo cảm giác ngon miệng.', 1),
(2, 1, 'Táo', '../assets/image/juice bottle/tao.png', 'Tương đương với 4 quả táo.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, Vitamin K, Kali\r\n\r\n\r\nCÔNG DỤNG CHUNG\r\nTáo chứa ít chất béo bão hòa, cholesterol, natri và rất tốt cho tim mạch, hệ tiêu hóa.\r\nMột số tác dụng khác của táo: giảm rối loạn đường ruột, viêm túi thừa. Ngoài ra, táo có nhiều kali, đem lại một trái tim khỏe mạnh.', 1),
(3, 1, 'Thanh Long Đỏ', '../assets/image/juice bottle/thanh long do.png', 'Tương đương với  1.5 quả thanh long đỏ.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, Fe, các loại Vitamin B\r\n\r\nCÔNG DỤNG CHUNG\r\nThanh long có thể giúp cải thiện sức khỏe tim mạch bằng cách giảm mức cholesterol xấu và bổ sung thêm cholesterol tốt. Một số công dụng khác: hỗ trợ tiêu hóa, ngừa tiểu đường và giảm viêm khớp.', 1),
(4, 1, 'Nho', '../assets/image/juice bottle/nho.png', 'Tương đương với  1 chùm nho.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, B1, B2.\r\n\r\nCÔNG DỤNG CHUNG\r\nNho chứa ít chất béo bảo hòa, Cholesterol và natri, rất tốt cho tim mạch. Trong nho chứa một hàm lượng Vitamin C và vitamin K dồi dào. Một số công dụng khác của nho: chữa bệnh đau nửa đầu, khó tiêu, sỏi thận, mỡ máu, thoái hóa điểm vàng .', 1),
(5, 1, 'Ổi', '../assets/image/juice bottle/oi.png', 'Tương đương với 2 quả ổi.', 'Chỉ số dinh dưỡng nổi bật: Vitmain A, C, B1, Folate, Kali\r\n\r\nCÔNG DỤNG CHUNG:\r\nTrái ổi rất tốt cho sức khỏe bởi chứa nhiều vitamin và khoáng chất như vitamin A, folate, kali, đồng và magan; vì thế là một nguồn năng lượng tự nhiên rất tốt cho chế độ ăn nhiều xơ và vitamin C. Ngoài ra, ổi còn rất tốt cho tim mạch, cải thiện chức năng nội tiết, làm đẹp da và chống lão hóa.', 1),
(6, 1, 'Xoài Tượng', '../assets/image/juice bottle/xoai tuong.png', 'Tương đương với 1.5 quả xoài tượng.', 'Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, B1, B6, Đồng\r\n\r\nCÔNG DỤNG CHUNG\r\nXoài là loại trái cây giàu dinh dưỡng, có tác dụng làm sạch da từ bên trong, có ít chất béo bão hòa, cholesterol và natri. Đây là loại hoa quả rất giàu vitamin A,C và B6. Công dụng chung: làm sạch da, rất tốt cho mắt, giảm lượng cholesterol, cải thiện hệ tiêu hóa và tăng cường hệ miễn dịch.', 1),
(7, 1, 'Dưa Vàng', '../assets/image/juice bottle/dua vang.png', 'Tương đương với  1/4 quả dưa vàng.', 'Chỉ số dinh dưỡng nổi bật: Vitamn C, Folate, B6, K\r\n\r\nCÔNG DỤNG CHUNG\r\nDưa vàng có lượng enzyme tiêu hóa lớn nhất trong các nhóm hoa quả. Một số công dụng của dưa vàng: cân bằng lượng đường huyết, giúp da mịn màng tươi trẻ, chống lại viêm khớp và tăng cường hệ miễn dịch.', 1),
(8, 1, 'Cam', '../assets/image/juice bottle/cam.png', 'Tương đương với  2.5 quả cam.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.', 1),
(9, 1, 'Dứa', '../assets/image/juice bottle/dua.png', 'Tương đương với 1 quả dứa.', 'Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan\r\n\r\nCÔNG DỤNG CHUNG\r\nDứa có rất nhiều vitamin khoáng chất, cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chứa bromelain, hợp chất thực vật. Hợp chất này rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viêm, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.', 1),
(10, 1, 'Bưởi', '../assets/image/juice bottle/buoi.png', 'Tương đương với  3/4 quả bưởi.', 'Chỉ số dinh dưỡng nổi bật: Vitamin A, C, B6, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\nBưởi góp phần bổ sung một lượng Vitamin C tuyệt vời và làm tăng sức đề kháng của cơ thể. Bưởi còn là một quả chống oxy hóa, giúp cơ thể chống lại stress và các bệnh liên quan đến hen suyễn và viêm khớp. Ngoài ra, bưởi giúp còn giúp làm đẹp da (trị các vấn đề da khô, mụn trứng cá, nếp nhăn hay vẩy nến), giảm cân, giảm lượng cholesterol trong máu.', 1),
(11, 1, 'Dưa Hấu', '../assets/image/juice bottle/dua hau.png', 'Tương đương với 1/4 quả dưa hấu.', 'Chỉ số dinh dưỡng nổi bật: Vitamin A, Vitamin C, Protein\r\n\r\nCÔNG DỤNG KHÁC:\r\nDưa hấu chứa rất nhiều Vitamin A và C, với lượng chất béo bão hòa, cholesterol và natri rất thấp. Dưa hấu chính là loại hoa rất tốt để giữ nước cho cơ thể, đặc biệt vào mùa hè; giúp sáng da với lượng đường cao nhưng lại có calo thấp.\r\nMột số tác dụng khác của dưa hấu: bảo vệ da khỏi tia UV, hỗ trợ thị lực, tránh nhiễm trùng và bảo vệ tim mạch.', 1),
(12, 2, 'Dứa Cà Rốt', '../assets/image/juice bottle/dua ca rot.png', 'Tương đương với 1/2 quả dứa và 3 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả dứa và cà rốt:\r\n\r\nDứa: Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan\r\nCÔNG DỤNG CHUNG\r\nDứa có rất nhiều vitamin khoáng chất, cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chúa bromelain, hợp chất thực vật. Hợp chất này rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viên, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.\r\n\r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\nCÔNG DỤNG CHUNG\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, khó tiêu hoá, phụ nữ da khô. ', 1),
(13, 2, 'Táo Cà Rốt', '../assets/image/juice bottle/', 'Tương đương với 2 quả táo và 3 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả táo và cà rốt:\r\n\r\nTáo: Chỉ số dinh dưỡng nổi bật: Vitamin C, Vitamin K, Kali\r\nCÔNG DỤNG CHUNG\r\nTáo chứa ít chất béo bão hòa, cholesterol, natri và rất tốt cho tim mạch và hệ tiêu hóa.\r\nMột số tác dụng khác của táo: giảm rối loạn đường ruột, viêm túi thừa. Ngoài ra, táo có nhiều kali, đem lại một trái tim khỏe mạnh!\r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\nCÔNG DỤNG CHUNG\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, phụ nữ da khô. ', 1),
(14, 2, 'Nước Ép Mix', '../assets/image/juice bottle/nuoc ep mix', 'Bạn có thể chọn tối đa 3 loại hoa quả để ép cùng nhau.', NULL, 1),
(15, 2, 'Cam Dứa', '../assets/image/juice bottle/cam dua.png', 'Tương đương với 1.5 quả cam và 0.5 quả dứa.', 'Vị thơm ngon tự nhiên với tác dụng của cả cam dứa:\r\n\r\nDứa: Chỉ số dinh dưỡng nổi bật: Vitamin C, B6, Mangan\r\nCÔNG DỤNG CHUNG\r\nDứa có rất nhiều vitamin khoáng chất, cần được sử dụng thường xuyên để duy trì cơ thể khỏe mạnh, bởi đây là trái cây duy nhất chúa bromelain, hợp chất thực vật. Hợp chất này rất tốt để cải thiện chức năng miễn dịch, thúc đẩy vết thương mau liền và tăng cường tiêu hóa. Một số tác dụng khác: phá vỡ protein trong máu, qua đó giảm viên, đau, cũng như bảo vệ xương khỏi các tác hại bên ngoài.\r\n\r\nCam: Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali\r\nCÔNG DỤNG CHUNG\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.', 1),
(16, 2, 'Cam Cà Rốt', '../assets/image/juice bottle/cam ca rot.png', 'Tương đương với 1.5 quả cam và 1 củ cà rốt.', 'Vị thơm ngon tự nhiên với tác dụng của cả cam và cà rốt:\r\n\r\nCam: Chỉ số dinh dưỡng nổi bật: Vitamin C, Folate, B1, Kali\r\nCÔNG DỤNG CHUNG\r\nCam là loại quả giàu các chất dinh dưỡng như: vitamin C, chất xơ, folate, chất chống oxy hóa nhưng rất ít calo và đường. Vì vậy, cam chính là nguồn dinh dưỡng nuôi dưỡng tóc và da rất tốt; có thể cải thiện thị lực, tăng hàm lượng chất xơ cho cơ thể. Một số công dụng khác của Cam: chữa táo bón, tăng cường chức năng não bộ, cải thiện các bệnh về thận, tim mạch.\r\n\r\n \r\n\r\nCà rốt: Chỉ số dinh dưỡng nổi bật: Vitamin A, vitamin K, Folate, Kali\r\n\r\nCÔNG DỤNG CHUNG\r\n\r\nCà rốt rất tốt cho tim mạch, với tỉ lệ chất xơ cao, đặc biệt dành cho những người bị cao huyết áp, viêm thận, tiểu đường, khó tiêu hoá, phụ nữ da khô. ', 1),
(17, 1, 'Lựu', '../assets/image/juice bottle/luu.png', 'Tương đương với  7 quả quýt.', NULL, 1),
(18, 3, 'Popeye\'s Juice', '../assets/image/juice bottle/Peoeye Juice', 'Táo, rau chân vịt, cần tây', NULL, 1),
(19, 3, 'Green Glow', '../assets/image/juice bottle/green glow.jpg', 'Broccoli, Celery, Apple Mint', NULL, 1),
(20, 3, 'The Digestive', '../assets/image/juice bottle/the digestive.jpg', 'Apple, Cucumber. Spinach', NULL, 1),
(21, 3, 'Táo Củ Dền', '../assets/image/juice bottle/tao cu den.png', 'Táo, củ dền', NULL, 1),
(22, 2, 'Cam Táo', '../assets/image/juice bottle/', 'Cam Táo', NULL, 1),
(23, 3, 'Green Power', '../assets/image/juice bottle/Green Power.jpg', 'Broccoli, Spinach, Apple, Cucumber', NULL, 1),
(24, 3, 'The Reset', '../assets/image/juice bottle/The Reset.jpg', 'Broccoli, Spinach, Apple, Cucumber', NULL, 1),
(25, 8, 'COMBO DETOX', '../assets/image/juice bottle/COMBO DETOX.JPG', 'Combo Detox mới nhất của Juice Bazar với nguồn Vitamin phong phú và chất khoáng dồi dào từ nhiều loại rau, củ, quả tươi sẽ mang đến cho bạn 1 trải nghiệm mới về thanh lọc cơ thể và chăm sóc sức khoẻ hàng ngày', NULL, 1),
(26, 8, 'COMBO ĐẸP DA', '../assets/image/juice bottle/combo dep da.jpg', 'Liệu trình 10 chai cho 5 ngày', NULL, 1),
(27, 8, 'DIGESTION HELPER', NULL, NULL, NULL, 0),
(28, 8, 'IMMUNE SYSTEM BOOST', NULL, NULL, NULL, 0),
(29, 7, 'COLD GINGER & LIME', NULL, NULL, NULL, 0),
(30, 7, 'EARL GREY HONEY & LIME ICED TEA', NULL, NULL, NULL, 0),
(31, 7, 'WATERMELON & LYCHEE ICED TEA', NULL, NULL, NULL, 0),
(32, 6, 'VIETNAMESE BLACK COFFEE', NULL, NULL, NULL, 0),
(33, 6, 'VIETNAMESE MILK COFFEE', NULL, NULL, NULL, 0),
(34, 5, 'SUPER BERRIES TEA', NULL, NULL, NULL, 0),
(35, 5, 'GREEN TEA', NULL, NULL, NULL, 0),
(36, 5, 'PEPPERMINT TEA', NULL, NULL, NULL, 0),
(37, 5, 'LEMONGRASS,GINGER & CITRUS', NULL, NULL, NULL, 0),
(38, 4, 'PICK 3 FRUITS AND VEGGIES TO MIX', NULL, NULL, NULL, 0),
(39, 1, 'MAC COP', NULL, NULL, NULL, 0),
(40, 1, 'PEAR', NULL, NULL, NULL, 0),
(41, 1, 'POMELO', NULL, NULL, NULL, 0),
(42, 2, 'APPLE POMEGRANATE', NULL, NULL, NULL, 0),
(43, 2, 'GREEN MANGO GUAVA', NULL, NULL, NULL, 0),
(44, 3, 'BALANCE', NULL, NULL, NULL, 0),
(45, 3, 'RING THE BELL', NULL, NULL, NULL, 0),
(46, 3, 'POWER UP', NULL, NULL, NULL, 0),
(47, 3, 'SUPER VEGGIES', NULL, NULL, NULL, 0),
(48, 3, 'REFRESH', NULL, NULL, NULL, 0),
(49, 3, 'HAPPY GREENS', NULL, NULL, NULL, 0),
(50, 3, 'KALE ME MAYBE', NULL, NULL, NULL, 0),
(51, 3, 'GREEN POWER', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeId` int(11) NOT NULL,
  `Type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeId`, `Type`) VALUES
(1, 'Single Juices'),
(2, 'Mixed Juices'),
(3, 'Green Juices'),
(4, 'Pick & Mix Juices'),
(5, 'Hot Teas'),
(6, 'Coffees'),
(7, 'Other Drinks'),
(8, 'Juice Plans');

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
  ADD UNIQUE KEY `EmailClient` (`Email`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderId`,`ProductId`),
  ADD KEY `fk_OrderDetail_Product` (`ProductId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `fk_Orders_Member` (`MemberId`);

--
-- Indexes for table `pricebycapacity`
--
ALTER TABLE `pricebycapacity`
  ADD PRIMARY KEY (`ProductId`,`CapacityId`),
  ADD KEY `fk_PriceByCapacity_Capacity` (`CapacityId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `fk_Product_Type` (`TypeId`);

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
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `CapacityId` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  ADD CONSTRAINT `fk_OrderDetail_Orders` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`OrderId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_OrderDetail_Product` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_Orders_Member` FOREIGN KEY (`MemberId`) REFERENCES `member` (`MemberId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pricebycapacity`
--
ALTER TABLE `pricebycapacity`
  ADD CONSTRAINT `fk_PriceByCapacity_Capacity` FOREIGN KEY (`CapacityId`) REFERENCES `capacity` (`CapacityId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PriceByCapacity_Product` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Type` FOREIGN KEY (`TypeId`) REFERENCES `type` (`TypeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
