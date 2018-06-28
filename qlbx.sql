-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 03:00 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbx`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdoanhthu`
--

CREATE TABLE `chitietdoanhthu` (
  `MACTDT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MADT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MANX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TONGDT` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdoanhthu`
--

INSERT INTO `chitietdoanhthu` (`MACTDT`, `MADT`, `MANX`, `TONGDT`) VALUES
('DC0001', 'DT0001', 'NX0001', 12040000),
('DC0002', 'DT0001', 'NX0002', 1628000),
('DC0003', 'DT0001', 'NX0003', 4335000),
('DC0004', 'DT0001', 'NX0004', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MAVE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MAHD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MACHITIETKM` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MAVE`, `MAHD`, `MACHITIETKM`) VALUES
('VE0001', 'HD0002', NULL),
('VE0002', 'HD0002', NULL),
('VE0003', 'HD0002', NULL),
('VE0004', 'HD0002', NULL),
('VE0005', 'HD0002', NULL),
('VE0006', 'HD0003', NULL),
('VE0007', 'HD0003', NULL),
('VE0008', 'HD0003', NULL),
('VE0009', 'HD0004', NULL),
('VE0010', 'HD0004', NULL),
('VE0011', 'HD0004', NULL),
('VE0013', 'HD0005', NULL),
('VE0024', 'HD0010', NULL),
('VE0029', 'HD0012', NULL),
('VE0030', 'HD0012', NULL),
('VE0014', 'HD0006', 'CK0001'),
('VE0015', 'HD0006', 'CK0001'),
('VE0016', 'HD0007', 'CK0001'),
('VE0017', 'HD0007', 'CK0001'),
('VE0018', 'HD0007', 'CK0001'),
('VE0019', 'HD0007', 'CK0001'),
('VE0020', 'HD0008', 'CK0002'),
('VE0021', 'HD0008', 'CK0002'),
('VE0031', 'HD0013', 'CK0002'),
('VE0034', 'HD0013', 'CK0002'),
('VE0042', 'HD0017', 'CK0002'),
('VE0043', 'HD0017', 'CK0002'),
('VE0022', 'HD0009', 'CK0003'),
('VE0023', 'HD0009', 'CK0003'),
('VE0035', 'HD0014', 'CK0003'),
('VE0036', 'HD0014', 'CK0003'),
('VE0037', 'HD0015', 'CK0003'),
('VE0038', 'HD0016', 'CK0003'),
('VE0041', 'HD0016', 'CK0003'),
('VE0044', 'HD0018', 'CK0003'),
('VE0025', 'HD0010', 'CK0004'),
('VE0026', 'HD0010', 'CK0004'),
('VE0027', 'HD0011', 'CK0004'),
('VE0028', 'HD0011', 'CK0004'),
('VE0045', 'HD0019', 'CK0004'),
('VE0046', 'HD0019', 'CK0004');

-- --------------------------------------------------------

--
-- Table structure for table `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `MACHITIETKM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MAKM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MATUYEN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIAMGIA` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietkhuyenmai`
--

INSERT INTO `chitietkhuyenmai` (`MACHITIETKM`, `MAKM`, `MATUYEN`, `GIAMGIA`) VALUES
('CK0001', 'KM0001', 'TU0001', 0.05),
('CK0002', 'KM0001', 'TU0003', 0.1),
('CK0003', 'KM0002', 'TU0005', 0.15),
('CK0004', 'KM0002', 'TU0002', 0.08);

-- --------------------------------------------------------

--
-- Table structure for table `doanhthu`
--

CREATE TABLE `doanhthu` (
  `MADT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MANV` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `THOIGIAN` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TONGCONG` bigint(50) NOT NULL DEFAULT '0',
  `NGAYLAP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doanhthu`
--

INSERT INTO `doanhthu` (`MADT`, `MANV`, `THOIGIAN`, `TONGCONG`, `NGAYLAP`) VALUES
('DT0001', 'NV0001', '06/2018', 18003000, '2018-06-20 12:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `doitra`
--

CREATE TABLE `doitra` (
  `MADT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYLAPTK` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gopy`
--

CREATE TABLE `gopy` (
  `MAGOPY` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TIEUDE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOIDUNG` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYGUI` date DEFAULT NULL,
  `TENNGUOIGUI` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_NG` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT_NG` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gopy`
--

INSERT INTO `gopy` (`MAGOPY`, `TIEUDE`, `NOIDUNG`, `NGAYGUI`, `TENNGUOIGUI`, `EMAIL_NG`, `SDT_NG`) VALUES
('GY0001', 'Chất lượng xe khách', 'Chất lượng xe khách cần cải thiện', '2018-04-23', 'Nguyễn Văn G', 'nvg@gmail.com', '025168615351');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MAKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYLAPHD` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `THANHTIEN` double DEFAULT NULL,
  `HINHTHUC` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MAKH`, `NGAYLAPHD`, `THANHTIEN`, `HINHTHUC`) VALUES
('HD0002', 'KH0003', '2018-06-14 13:12:17', 1600000, 'Thanh toán bằng thẻ quốc tế Visa, Master, JCB'),
('HD0003', 'KH0003', '2018-06-14 13:29:25', 2700000, 'Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)'),
('HD0004', 'KH0003', '2018-06-14 14:59:57', 2700000, 'Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)'),
('HD0005', 'KH0003', '2018-06-15 02:01:33', 320000, 'Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)'),
('HD0006', 'KH0003', '2018-06-15 02:14:05', 608000, 'Thanh toán bằng thẻ quốc tế Visa, Master, JCB'),
('HD0007', 'KH0003', '2018-06-15 02:49:18', 1216000, 'Thanh toán khi lên xe (Ngày khởi hành)'),
('HD0008', 'KH0003', '2018-06-16 03:06:18', 450000, 'Thanh toán khi lên xe (Ngày khởi hành)'),
('HD0009', 'KH0003', '2018-06-19 18:42:39', 340000, 'Thanh toán khi lên xe (Ngày khởi hành)'),
('HD0010', 'KH0004', '2018-06-20 00:10:53', 944000, 'Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)'),
('HD0011', 'KH0004', '2018-06-20 01:15:35', 644000, 'Thanh toán khi lên xe (Ngày khởi hành)'),
('HD0012', 'KH0005', '2018-06-20 07:41:13', 600000, 'Thanh toán khi lên xe (Ngày khởi hành)'),
('HD0013', 'KH0006', '2018-06-20 08:19:26', 630000, 'Thanh toán khi lên xe (Ngày khởi hành)'),
('HD0014', 'KH0003', '2018-06-20 08:31:24', 1445000, 'Thanh toán bằng thẻ quốc tế Visa, Master, JCB'),
('HD0015', 'KH0003', '2018-06-20 08:54:43', 722500, 'Thanh toán bằng thẻ quốc tế Visa, Master, JCB'),
('HD0016', 'KH0003', '2018-06-20 10:54:46', 1445000, 'Thanh toán khi lên xe (Ngày khởi hành)'),
('HD0017', 'KH0003', '2018-06-20 12:48:01', 598500, 'Thanh toán khi lên xe (Ngày khởi hành)'),
('HD0018', 'KH0004', '2018-06-20 12:53:42', 686375, 'Thanh toán bằng thẻ quốc tế Visa, Master, JCB'),
('HD0019', 'KH0003', '2018-06-20 12:55:58', 349600, 'Thanh toán khi lên xe (Ngày khởi hành)');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TENKH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYSINH_KH` date DEFAULT NULL,
  `DIACHI_KH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_KH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT_KH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `NGAYSINH_KH`, `DIACHI_KH`, `EMAIL_KH`, `SDT_KH`) VALUES
('KH0001', 'Đỗ Thị E', '1990-05-21', '295-273 Nguyễn Tri Phương, thị xã Dĩ An, tỉnh Bình Dương', 'dte@gmail.com', '05465135158'),
('KH0002', 'Lê Hoàng B', '1994-02-08', '23-151 Đường Lê Thị Hoa, Bình Chiểu, Thủ Đức, Hồ Chí Minh', 'lhb@gmail.com', '05846846557'),
('KH0003', 'Trần Hưng Quang', '1997-04-23', 'Thừa Thiên Huế', 'mblamblabla@gmail.com', '01227577736'),
('KH0004', 'Văn Xuân Phong', '2000-03-18', 'Tây Nguyên', 'mblamblabla@gmail.com', '0167241168'),
('KH0005', 'Nguyễn Thị Ngọc Hải', '1998-05-15', 'Cần Thơ', 'ngochainguyenthi@gmail.com', '01635551574'),
('KH0006', 'Lê Trung Quân', '1994-02-20', 'Vũng Tàu', 'trungquanle@gmail.com', '0965711842');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MAKM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYBD` date DEFAULT NULL,
  `NGAYKT` date DEFAULT NULL,
  `TENKM` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`MAKM`, `NGAYBD`, `NGAYKT`, `TENKM`) VALUES
('KM0001', '2018-04-09', '2018-08-22', 'Bắt đầu kỳ nghỉ hè - giảm giá một số tuyến du lịch'),
('KM0002', '2018-06-06', '2018-06-30', 'Chương trình giảm giá vé một số tuyến ngày hè- áp dụng đến hết tháng');

-- --------------------------------------------------------

--
-- Table structure for table `lichtrinh`
--

CREATE TABLE `lichtrinh` (
  `MALT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MATUYEN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MAXE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIANDI` datetime DEFAULT NULL,
  `THOIGIANDEN` datetime DEFAULT NULL,
  `GIAVE` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichtrinh`
--

INSERT INTO `lichtrinh` (`MALT`, `MATUYEN`, `MAXE`, `THOIGIANDI`, `THOIGIANDEN`, `GIAVE`) VALUES
('LT0001', 'TU0001', 'XE0001', '2018-06-16 07:55:00', '2018-06-16 15:30:00', 320000),
('LT0002', 'TU0005', 'XE0001', '2018-06-14 06:00:00', '2018-06-15 05:30:00', 1000000),
('LT0003', 'TU0005', 'XE0001', '2018-06-15 06:00:00', '2018-06-16 05:30:00', 900000),
('LT0004', 'TU0003', 'XE0002', '2018-06-18 07:30:00', '2018-06-18 15:30:00', 250000),
('LT0005', 'TU0004', 'XE0002', '2018-06-28 08:00:00', '2018-06-28 19:35:00', 300000),
('LT0006', 'TU0002', 'XE0005', '2018-07-10 05:50:00', '2018-07-10 10:50:00', 350000),
('LT0007', 'TU0005', 'XE0003', '2018-06-20 09:25:00', '2018-06-20 14:25:00', 200000),
('LT0008', 'TU0004', 'XE0002', '2018-06-29 12:30:00', '2018-06-29 19:05:00', 345000),
('LT0009', 'TU0005', 'XE0008', '2018-07-12 07:00:00', '2018-07-14 07:00:00', 850000),
('LT0010', 'TU0005', 'XE0008', '2018-07-20 08:30:00', '2018-07-22 08:30:00', 800000),
('LT0011', 'TU0005', 'XE0008', '2018-08-01 15:00:00', '2018-08-03 15:00:00', 900000),
('LT0012', 'TU0002', 'XE0005', '2018-07-07 14:45:00', '2018-07-08 06:00:00', 200000),
('LT0013', 'TU0004', 'XE0009', '2018-06-28 05:50:00', '2018-06-28 12:35:00', 250000),
('LT0014', 'TU0004', 'XE0003', '2018-06-22 04:50:00', '2018-06-22 10:30:00', 400000),
('LT0015', 'TU0003', 'XE0001', '2018-06-26 06:45:00', '2018-06-26 14:10:00', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TENNV` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYSINH_NV` date DEFAULT NULL,
  `DIACHI_NV` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_NV` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT_NV` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CHUCVU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TENNV`, `NGAYSINH_NV`, `DIACHI_NV`, `EMAIL_NV`, `SDT_NV`, `CHUCVU`) VALUES
('NV0000', 'admin', '1983-04-23', 'admin', 'admin', 'admin', 'Giám đốc'),
('NV0001', 'Trần Văn A', '1985-11-01', 'Hẻm 195 Trần Văn Đang, phường 11, Quận 3, TP.Hồ Chí Minh', 'tva@gmail.com', '0123456789', 'Quản lý'),
('NV0002', 'Nguyễn Thị C', '1994-05-22', '25 Đội Cung, phường 11, Quận 11, TP.Hồ Chí Minh', 'ntc@gmail.com', '046815513', 'Trưởng phòng');

-- --------------------------------------------------------

--
-- Table structure for table `nhaxe`
--

CREATE TABLE `nhaxe` (
  `MANX` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TEN_NX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACHI_NX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT_NX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_NX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SOXE` int(11) DEFAULT NULL,
  `TOMTAT` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DANHGIA` int(11) NOT NULL DEFAULT '0',
  `GIOITHIEU` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ANH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VIDEO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhaxe`
--

INSERT INTO `nhaxe` (`MANX`, `TEN_NX`, `DIACHI_NX`, `SDT_NX`, `EMAIL_NX`, `SOXE`, `TOMTAT`, `DANHGIA`, `GIOITHIEU`, `ANH`, `VIDEO`) VALUES
('NX0001', 'Phương Trang', 'đường CMT8, Quận Tân Bình, Thành phố Hồ Chí Minh', '0123456789', 'phuongtrang_xkcl@gmail.com', 3, '<p>Công ty Phương Trang được thành lập vào ngày 15 tháng 11 năm 2002 với hoạt động kinh doanh chính trong lĩnh vực mua bán xe ô tô, vận tải hành khách, bất động sản và kinh doanh dịch vụ.</p>', 4, '<h1>&Ocirc;ng chủ của xe kh&aacute;ch Phương Trang l&agrave; ai?</h1>\r\n\r\n<p><img src=\"http://cafebiz.cafebizcdn.vn/zoom/650_413/2015/xe-phuong-trang-1441881912979.jpg\" /></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p><em>Người viết b&agrave;i l&agrave; kh&aacute;ch h&agrave;ng của h&atilde;ng xe kh&aacute;ch Phương Trang (Futabus) trong nhiều chuyến du lịch, c&ocirc;ng t&aacute;c từ TPHCM đi miền T&acirc;y, miền Đ&ocirc;ng Nam Bộ v&agrave; xa hơn l&agrave; T&acirc;y Nguy&ecirc;n, miền Trung&hellip; Những h&agrave;nh kh&aacute;ch thường đi xe Phương Trang chắc hẳn sẽ nhớ đến d&ograve;ng khẩu hiệu ph&iacute;a tr&ecirc;n chỗ ngồi t&agrave;i xế &quot;V&igrave; l&yacute; do an to&agrave;n, t&agrave;i xế xe Phương Trang lu&ocirc;n chạy đ&uacute;ng tốc độ&quot;.</em></p>\r\n\r\n<hr />\r\n<p>C&ocirc;ng ty Cổ phần Đầu tư Phương Trang (c&ocirc;ng ty mẹ trong hệ thống Phương Trang) tiền th&acirc;n l&agrave; một doanh nghiệp vận tải th&agrave;nh lập năm 2002 với số lượng đầu xe chưa đến 10 chiếc chạy tuyến TP.HCM - Đ&agrave; Lạt. &nbsp;</p>\r\n\r\n<p>C&ocirc;ng ty n&agrave;y c&oacute; trụ sở nằm trong khu phố T&acirc;y TPHCM tại đường Đề Th&aacute;m, quận 1, với vốn điều lệ theo giấy đăng k&iacute; kinh doanh tại Sở Kế hoạch v&agrave; Đầu tư TPHCM l&agrave; 770 tỉ đồng. Người đại diện theo ph&aacute;p luật của c&ocirc;ng ty n&agrave;y l&agrave; b&agrave; Nguyễn Thị Như Mai cũng đồng thời cũng l&agrave; đại diện theo ph&aacute;p luật của C&ocirc;ng ty Cổ phần đầu tư Thanh Ni&ecirc;n S&agrave;i G&ograve;n (đường H&agrave;m Nghi quận 1) với vốn điều lệ 100 tỉ đồng.</p>\r\n\r\n<p>Ba cổ đ&ocirc;ng s&aacute;ng lập C&ocirc;ng ty Cổ phần Đầu tư Phương Trang l&agrave; c&aacute;c &ocirc;ng Nguyễn Đ&ocirc;ng H&ograve;a (nắm 0,13% vốn), Nguyễn Hữu Lu&acirc;n (0,13% vốn) v&agrave; Chủ tịch Hội đồng quản trị l&agrave; &ocirc;ng Nguyễn Hữu Luận (19,22% vốn). &Ocirc;ng Luận đồng thời l&agrave; người đại diện theo ph&aacute;p luật c&aacute;c c&ocirc;ng ty: C&ocirc;ng ty CP Thương mại dịch vụ Th&agrave;nh Hiếu, C&ocirc;ng ty TNHH Nam &ocirc; t&ocirc;, C&ocirc;ng ty TNHH Thương mại dịch vụ bất động sản Ph&uacute; Mỹ v&agrave; C&ocirc;ng ty CP bất động sản Phương Trang Long An.</p>\r\n\r\n<p>Theo th&ocirc;ng tin giới thiệu tr&ecirc;n website, sau 13 năm ph&aacute;t triển, đến nay hệ thống xe kh&aacute;ch Phương Trang&nbsp;(Futabus) đ&atilde; c&oacute; tr&ecirc;n 1.000 xe, trong đ&oacute; c&oacute; khoảng 300 xe giường nằm v&agrave; trở th&agrave;nh h&atilde;ng vận tải h&agrave;nh kh&aacute;ch tuyến cố định đường d&agrave;i lớn nhất Việt Nam.</p>\r\n\r\n<p>Về kế hoạch ph&aacute;t triển, Futabus cho biết sẽ tập trung đầu tư mới xe kh&aacute;ch chất lượng cao, n&acirc;ng tổng số xe kh&aacute;ch từ tr&ecirc;n 1.000 xe hiện nay l&ecirc;n đến 5.000 xe trong v&ograve;ng 3 đến 6 năm tới. Đồng thời đa dạng h&oacute;a c&aacute;c k&ecirc;nh b&aacute;n v&eacute; phục vụ kh&aacute;ch h&agrave;ng, ngo&agrave;i hệ thống ph&ograve;ng v&eacute; trải d&agrave;i tr&ecirc;n to&agrave;n quốc hiện nay.&nbsp;Hiện Futabus đ&atilde; cho đặt v&eacute; qua email v&agrave;o c&aacute;c dịp lễ, Tết, b&aacute;n v&eacute; điện tử online v&agrave; ph&aacute;t triển th&ecirc;m dịch vụ giao v&eacute; tận nh&agrave;.</p>\r\n\r\n<p>Ngo&agrave;i ra, Phương Trang c&ograve;n tham gia v&agrave;o hoạt động vận tải c&ocirc;ng cộng tại c&aacute;c th&agrave;nh phố lớn như xe bu&yacute;t tuyến Nha Trang &ndash; Cam Ranh, xe bu&yacute;t tại Đ&agrave; Lạt, taxi tại TPHCM. Th&aacute;ng 6/2015, UBND TPHCM cũng đ&atilde; đồng &yacute; chủ trương cho ph&eacute;p Phương Trang đầu tư bổ sung, n&acirc;ng tổng số đầu xe taxi của doanh nghiệp đăng k&yacute; hoạt động tr&ecirc;n địa b&agrave;n &nbsp;đạt tối đa 2.000 chiếc. &nbsp;Đồng thời giao Sở Giao th&ocirc;ng Vận tải hướng dẫn, hỗ trợ &nbsp;Phương Trang thực hiện c&aacute;c thủ tục để đầu tư, đưa xe v&agrave;o hoạt động trong v&ograve;ng một năm kể từ ng&agrave;y UBND TP chấp thuận cho tăng.</p>\r\n\r\n<p>B&ecirc;n cạnh vận chuyển h&agrave;nh kh&aacute;ch, những năm gần đ&acirc;y Phương Trang cũng đang đẩy mạnh dịch vụ vận chuyển h&agrave;ng h&oacute;a th&ocirc;ng qua dịch vụ chuyển h&agrave;ng h&oacute;a, bưu phẩm, bưu kiện đi c&aacute;c địa phương v&agrave; hợp đồng vận chuyển l&acirc;u d&agrave;i với c&aacute;c c&ocirc;ng ty, doanh nghiệp c&oacute; số lượng h&agrave;ng lớn v&agrave; nhu cầu vận chuyển li&ecirc;n tục.</p>\r\n\r\n<p>C&ocirc;ng ty CP đầu tư Phương Trang cũng mua 36,93% cổ phần c&ocirc;ng ty quản l&yacute; trạm dừng ch&acirc;n Satra Phương Trang (c&ocirc;ng ty con của Tổng c&ocirc;ng ty Thương mại S&agrave;i G&ograve;n Satra) tại huyện C&aacute;i B&egrave;, tỉnh Tiền Giang.</p>\r\n\r\n<p>Ngo&agrave;i kinh doanh vận tải th&igrave; kinh doanh bất động sản l&agrave; lĩnh vực kinh doanh non trẻ của c&ocirc;ng ty n&agrave;y. Một số dự &aacute;n đ&aacute;ng ch&uacute; &yacute; như khu căn hộ Đ&agrave; Nẵng Plaza, khu căn hộ cao cấp New Pearl, dự &aacute;n khu đ&ocirc; thị sinh th&aacute;i biển Phương Trang vịnh Đ&agrave; Nẵng&hellip;</p>\r\n', 'view/img/images/detail/phuong_trang.jpg', 'https://www.youtube.com/watch?v=3I5ZCMqLpdw'),
('NX0002', 'Xe nhà', '143 Lê Hồng Phong, Phường 3, Quận 5, TP. Hồ Chí Minh', '0123456789', 'nhaxe_abc@gmail.com', 2, '<p>Sài Gòn - Nha Trang là tuyến đường tấp nập, nối liền trung tâm du lịch lớn nhất cả nước Hồ Chí Minh với thành phố biển Nha Trang thơ mộng, vì thế tuyến này được không ít nhà xe tập trung khai thác,', 2, '<p><img alt=\"Image result for nhÃ  xe xe nhÃ \" src=\"https://www.vedayroi.vn/upload/product/large/3266225295-080620161636491-xe-nha-nha-trang-cam-ranh-sai-gon-da-lat.jpg\" /></p>\r\n\r\n<p>Xe Nh&agrave; ra đời từ những mong muốn ch&acirc;n t&igrave;nh của h&agrave;nh kh&aacute;ch về những chuyến đi đường d&agrave;i thoải m&aacute;i v&agrave; th&acirc;n thiện. Đến với Xe Nh&agrave;, bạn sẽ được tận hưởng cảm gi&aacute;c như ngồi tr&ecirc;n ch&iacute;nh chiếc xe ri&ecirc;ng của m&igrave;nh.</p>\r\n\r\n<p>Xe giường nằm Thaco Mobihome đời mới nhất với 40 giường được thiết kế tiện lợi v&agrave; an to&agrave;n để bạn c&oacute; được c&oacute; những gi&acirc;y ph&uacute;t nghỉ ngơi, thư gi&atilde;n ho&agrave;n hảo. B&ecirc;n cạnh đ&oacute; hệ thống điều chỉnh m&aacute;y lạnh v&agrave; đ&egrave;n th&ocirc;ng minh, bạn c&oacute; thể t&ugrave;y chỉnh nhiệt độ v&agrave; &aacute;nh s&aacute;ng ph&ugrave; hợp với nhu cầu v&agrave; sở th&iacute;ch của m&igrave;nh.</p>\r\n\r\n<p>Bạn sẽ được phục vụ nước uống, khăn lạnh, thức ăn nhẹ miễn ph&iacute; v&agrave; nhận được sự quan t&acirc;m tận t&igrave;nh từ nh&acirc;n vi&ecirc;n xe. Đặc biệt, Xe nh&agrave; cũng hỗ trợ nơi nghỉ ngơi cho kh&aacute;ch ở TP. Hồ Ch&iacute; Minh v&agrave; hướng dẫn kh&aacute;ch v&agrave;o TP. Hồ Ch&iacute; Minh kh&aacute;m chữa bệnh. Ngo&agrave;i ra, Xe Nh&agrave; c&ograve;n nhận vận chuyển h&agrave;ng h&oacute;a v&agrave; bưu phẩm nếu kh&aacute;ch c&oacute; nhu cầu. Với những dịch vụ tuyệt vời v&agrave; gi&aacute; ưu đ&atilde;i. Xe Nh&agrave; sẽ gi&uacute;p bạn vượt qua khoảng c&aacute;ch TP. Hồ Ch&iacute; Minh &ndash; Nha Trang nhẹ nh&agrave;ng như một giấc mơ đẹp.</p>', 'view/img/images/detail/xe_nha.jpg', NULL),
('NX0003', 'Quốc Phú', 'Phường 11, Thành phố Vũng Tàu, Ba Ria - Vung Tau', '013684864', 'quocphu_brvt@gmai.com', 3, '<p>Với mục tiêu không ngừng đáp ứng nhu cầu của hành khách, hãng xe Quốc Phú luôn nỗ lực hết sưc mình để nâng cấp những chuyến đi của hãng...</p>', 3, '', 'view/img/images/detail/quoc_phu.jpg', NULL),
('NX0004', 'Phương Nam', '275E Phạm Ngũ Lão, Phạm Ngũ Lão, Q.1, \r\nThành Phố Hồ Chí Minh', '028 38389292', 'phuongnam@hcm.fpt.vn', 2, '<p>Công ty TNHH Thương Mại – Dịch Vụ - Du lịch PHƯƠNG NAM ra đời nhằm đáp ứng nhu cầu về du lịch lữ hành, vận chuyển khách du lịch, đặc biệt tour –tuyến hướng về thành phố biển Nha Trang...</p>', 3, '<p>C&ocirc;ng ty TNHH Thương Mại &ndash; Dịch Vụ - Du lịch PHƯƠNG NAM (PHƯƠNG NAM EXPRESS) ra đời nhằm đ&aacute;p ứng nhu cầu về du lịch lữ h&agrave;nh, vận chuyển kh&aacute;ch du lịch, đặc biệt tour &ndash; tuyến hướng về th&agrave;nh phố biển Nha Trang v&agrave; c&aacute;c tỉnh miền Trung. Với xe giường nằm chất lượng cao được nhập từ H&agrave;n Quốc, PHƯƠNG NAM EXPRESS mong muốn được phục vụ h&agrave;nh kh&aacute;ch một c&aacute;ch chu đ&aacute;o nhất, chuy&ecirc;n nghiệp v&agrave; tận t&igrave;nh nhất. Tất cả c&aacute;c xe của PHƯƠNG NAM EXPRESS đều được trang bị tivi m&agrave;n h&igrave;nh phẳng để h&agrave;nh kh&aacute;ch c&oacute; những ph&uacute;t gi&acirc;y thư gi&atilde;n trong qu&aacute; tr&igrave;nh di chuyển, toilet được dọn dẹp thường xuy&ecirc;n để đảm bảo lu&ocirc;n sạch sẽ. Đội ngũ l&aacute;i xe v&agrave; nh&acirc;n vi&ecirc;n phục vụ được huấn luyện kỹ c&agrave;ng, v&igrave; PHƯƠNG NAM EXPRESS quan niệm rằng:&nbsp;<br />\r\n<strong>&lsquo;AN TO&Agrave;N L&Agrave; TR&Ecirc;N HẾT&rsquo;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"pic\" src=\"http://www.phuongnamtravel.vn/images/thumbs/0000394.jpeg\" /><img alt=\"pic\" src=\"http://www.phuongnamtravel.vn/images/thumbs/0000397.jpeg\" /><img alt=\"pic\" src=\"http://www.phuongnamtravel.vn/images/thumbs/0000395.jpeg\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PHƯƠNG NAM EXPRESS c&ograve;n cung cấp c&aacute;c loại h&igrave;nh tour du lịch về th&agrave;nh phố biển Nha Trang v&agrave; c&aacute;c điểm đến du lịch c&aacute;c tỉnh miền Trung như: Huế, Hội An, Đ&agrave; Nẵng. Ch&uacute;ng t&ocirc;i sẽ gi&uacute;p Qu&yacute; Kh&aacute;ch đặt ph&ograve;ng kh&aacute;ch sạn, resort với gi&aacute; tốt nhất, t&igrave;m kiếm những tour du lịch hấp dẫn v&agrave; ph&ugrave; hợp với Qu&yacute; kh&aacute;ch. Ngo&agrave;i ra, PHƯƠNG NAM EXPRESS cung cấp dịch vụ cho thu&ecirc; xe giường nằm cho những C&ocirc;ng ty du lịch, c&aacute;c C&ocirc;ng ty c&oacute; nhu cầu đi du lịch tự t&uacute;c với gi&aacute; ưu đ&atilde;i. Ch&uacute;ng t&ocirc;i rất mong được phục vụ Qu&yacute; kh&aacute;ch tr&ecirc;n những chuyến xe giường nằm chất lượng cao của PHƯƠNG NAM EXPRESS , với chất lượng xe tốt nhất, phục vụ chuy&ecirc;n nghiệp nhất, v&agrave; những ưu đ&atilde;i hấp dẫn nhất &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', 'view/img/images/detail/phuong_nam.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quydinhloaitk`
--

CREATE TABLE `quydinhloaitk` (
  `MALOAITK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TENLOAITK` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DKTONGTIEN` bigint(20) DEFAULT '0',
  `CHIETKHAU` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quydinhloaitk`
--

INSERT INTO `quydinhloaitk` (`MALOAITK`, `TENLOAITK`, `DKTONGTIEN`, `CHIETKHAU`) VALUES
('LK0001', 'Thường', 0, 0),
('LK0002', 'VIP', 5000000, 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `ID` int(50) NOT NULL,
  `LINK` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`ID`, `LINK`) VALUES
(1, 'view/img/slide/1.png'),
(2, 'view/img/slide/2.png'),
(3, 'view/img/slide/3.png'),
(4, 'view/img/slide/4.png'),
(5, 'view/img/slide/5.png');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MATK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MAKH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MANV` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TAIKHOAN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATKHAU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYLAP` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LOAI` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TONGTIEN` bigint(20) UNSIGNED DEFAULT '0',
  `ANHDD` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MATK`, `MAKH`, `MANV`, `TAIKHOAN`, `MATKHAU`, `NGAYLAP`, `LOAI`, `TONGTIEN`, `ANHDD`) VALUES
('TK0000', NULL, 'NV0000', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-06-15 03:19:15', 'ADMIN', 0, NULL),
('TK0001', 'KH0001', NULL, 'abc', '900150983cd24fb0d6963f7d28e17f72', '2018-06-09 09:35:08', 'VIP', 0, 'view/img/avatar/AV1.jpg'),
('TK0002', 'KH0002', NULL, '123', '202cb962ac59075b964b07152d234b70', '2018-06-09 09:35:08', 'Thường', 0, NULL),
('TK0003', 'KH0003', NULL, 'quang94dangdung', '28ee894f87429732455555432e35da4d', '2018-06-10 16:29:15', 'VIP', 15779600, 'view/img/avatar/AV3.jpg'),
('TK0004', NULL, 'NV0001', 'nhanvien_tranvana', 'e10adc3949ba59abbe56e057f20f883e', '2018-06-15 03:27:52', 'Nhân viên quản lý', 0, 'view/img/avatar/tranvana.jpg'),
('TK0005', 'KH0004', NULL, 'mblamblabla', '202cb962ac59075b964b07152d234b70', '2018-06-20 00:08:54', 'VIP', 2274375, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tuyen`
--

CREATE TABLE `tuyen` (
  `MATUYEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TENTUYEN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIEMDAU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIEMCUOI` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KHOANGCACH` double DEFAULT NULL,
  `ANH` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuyen`
--

INSERT INTO `tuyen` (`MATUYEN`, `TENTUYEN`, `DIEMDAU`, `DIEMCUOI`, `KHOANGCACH`, `ANH`) VALUES
('TU0001', 'Hồ Chí Minh - Đà Lạt', 'TP.Hồ Chí Minh', 'Tp.Đà Lạt, tỉnh Lâm Đồng', 293, 'view/img/routes/route_HCM_DL.png'),
('TU0002', 'Hồ Chí Minh - Đà Nẵng', 'TP.Hồ Chí Minh', 'TP.Đà Nẵng', 951, 'view/img/routes/route_HCM_DN.png'),
('TU0003', 'Hồ Chí Minh - Vũng Tàu', 'TP.Hồ Chí Minh', 'TP.Vũng Tàu, tỉnh Bà Rịa - Vũng Tàu', 90.4, 'view/img/routes/route_HCM_VT.png'),
('TU0004', 'Hồ Chí Minh - Cần Thơ', 'Tp.Hồ Chí Minh', 'Tp.Cần Thơ', 184.2, 'view/img/routes/route_HCM_CT.png'),
('TU0005', 'Hồ Chí Minh - Hà Nội', 'TP.Hồ Chí Minh', 'TP.Hà Nội', 1610.5, 'view/img/routes/route_HCM_HN.png');

-- --------------------------------------------------------

--
-- Table structure for table `vexe`
--

CREATE TABLE `vexe` (
  `MAVE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MALT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VITRI` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SOGHE` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TINHTRANG` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vexe`
--

INSERT INTO `vexe` (`MAVE`, `MALT`, `VITRI`, `SOGHE`, `GHICHU`, `TINHTRANG`) VALUES
('VE0001', 'LT0001', 'Khu CN Sóng Thần', 'A8', '', 1),
('VE0002', 'LT0001', 'Khu CN Sóng Thần', 'A14', '', 1),
('VE0003', 'LT0001', 'Khu CN Sóng Thần', 'A13', '', 1),
('VE0004', 'LT0001', 'Khu CN Sóng Thần', 'B8', '', 1),
('VE0005', 'LT0001', 'Khu CN Sóng Thần', 'B14', '', 1),
('VE0006', 'LT0003', 'Bến xe Miền Đông', 'B21', 'Chờ tại bến', 1),
('VE0007', 'LT0003', 'Bến xe Miền Đông', 'B16', 'Chờ tại bến', 1),
('VE0008', 'LT0003', 'Bến xe Miền Đông', 'B7', 'Chờ tại bến', 1),
('VE0009', 'LT0003', 'Khu CN Sóng Thần', 'A5', '', 1),
('VE0010', 'LT0003', 'Khu CN Sóng Thần', 'B11', '', 1),
('VE0011', 'LT0003', 'Khu CN Sóng Thần', 'B5', '', 1),
('VE0013', 'LT0001', 'Khu CN Sóng Thần', 'A10', '', 1),
('VE0014', 'LT0001', 'Khu CN Sóng Thần', 'B9', '', 1),
('VE0015', 'LT0001', 'Khu CN Sóng Thần', 'B15', '', 1),
('VE0016', 'LT0001', 'Bến xe Miền Đông', 'B6', '', 1),
('VE0017', 'LT0001', 'Bến xe Miền Đông', 'B7', '', 1),
('VE0018', 'LT0001', 'Bến xe Miền Đông', 'B12', '', 1),
('VE0019', 'LT0001', 'Bến xe Miền Đông', 'B13', '', 1),
('VE0020', 'LT0004', 'Khu CN Sóng Thần', 'A14', '', 1),
('VE0021', 'LT0004', 'Khu CN Sóng Thần', 'A7', '', 1),
('VE0022', 'LT0007', 'Bến xe Miền Đông', 'A12', '', 1),
('VE0023', 'LT0007', 'Bến xe Miền Đông', 'A14', '', 1),
('VE0024', 'LT0006', 'An Xương', 'A11', '', 1),
('VE0025', 'LT0006', 'An Xương', 'A7', '', 1),
('VE0026', 'LT0005', 'An Xương', 'A12', '', 1),
('VE0027', 'LT0006', 'Cách Mạng tháng 8, Quận Tân Bình', 'B4', '', 1),
('VE0028', 'LT0006', 'Cách Mạng tháng 8, Quận Tân Bình', 'B11', '', 1),
('VE0029', 'LT0005', 'Cầu Thị Nghè, Quận 1', 'A10', '', 1),
('VE0030', 'LT0005', 'Cầu Thị Nghè, Quận 1', 'B11', '', 1),
('VE0031', 'LT0015', 'Ngã Ba Vũng Tàu', 'A1', '', 1),
('VE0034', 'LT0015', 'Ngã Ba Vũng Tàu', 'B15', '', 1),
('VE0035', 'LT0009', 'Suối Tiên, Quận Thủ Đức', 'B5', '', 1),
('VE0036', 'LT0009', 'Suối Tiên, Quận Thủ Đức', 'B11', '', 1),
('VE0037', 'LT0009', 'Khu CN Sóng Thần', 'A12', '', 1),
('VE0038', 'LT0009', 'Bến xe Miền Đông', 'A14', '', 1),
('VE0041', 'LT0009', 'Bến xe Miền Đông', 'B16', '', 1),
('VE0042', 'LT0015', 'Ngã Ba Vũng Tàu', 'A13', '', 1),
('VE0043', 'LT0015', 'Ngã Ba Vũng Tàu', 'A14', '', 1),
('VE0044', 'LT0009', 'Khu CN Amata, Biên Hòa, Đồng Nai', 'B4', '', 1),
('VE0045', 'LT0012', 'Khu CN Sóng Thần', 'A9', '', 1),
('VE0046', 'LT0012', 'Khu CN Sóng Thần', 'A12', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `MAXE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MANX` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `BIENSO` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENTAIXE1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENTAIXE2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`MAXE`, `MANX`, `BIENSO`, `TENTAIXE1`, `TENTAIXE2`) VALUES
('XE0001', 'NX0001', '50F3158', 'Nguyễn Hoàng Anh', 'Đỗ Văn Hùng'),
('XE0002', 'NX0001', '30F65484', 'Văn Chung', 'Đào Duy Tín'),
('XE0003', 'NX0002', '75A13518', 'Trần Huy', 'Nguyễn Đạo'),
('XE0004', 'NX0002', '50J21654', 'Nguyễn Văn Tài', 'Bùi Thanh Dương'),
('XE0005', 'NX0002', '75F35158', 'Đỗ Mỹ Linh', 'Dương Cao Cường'),
('XE0006', 'NX0003', '50G12345', 'Lê Anh Quân', 'Nguyễn Thị Tú Hằng'),
('XE0008', 'NX0003', '60J13588', 'Nguyễn Kim Long', 'Lê Hồ Thanh'),
('XE0009', 'NX0004', '60K55124', 'Đặng Xuân Trường', 'Đỗ Thị Thanh Xuân'),
('XE0010', 'NX0002', '75B21547', 'Trần Thị Thanh Trúc', 'Lý Thanh Như'),
('XE007', 'NX0004', '35A15475', 'Đinh Tiến Dũng', 'Võ Quang Đại');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdoanhthu`
--
ALTER TABLE `chitietdoanhthu`
  ADD PRIMARY KEY (`MACTDT`),
  ADD KEY `FK_CTDT_DT` (`MADT`),
  ADD KEY `FK_CTDT_NX` (`MANX`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MAVE`,`MAHD`),
  ADD KEY `FK_CHITIETH_CHITIETHO_HOADON` (`MAHD`),
  ADD KEY `FK_CHITIETHD_CHITIETKM` (`MACHITIETKM`);

--
-- Indexes for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`MACHITIETKM`),
  ADD KEY `FK_CTKM_KM` (`MAKM`),
  ADD KEY `FK_CTKM_TUYEN` (`MATUYEN`);

--
-- Indexes for table `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD PRIMARY KEY (`MADT`),
  ADD KEY `FK_DT_NV` (`MANV`);

--
-- Indexes for table `doitra`
--
ALTER TABLE `doitra`
  ADD PRIMARY KEY (`MADT`);

--
-- Indexes for table `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`MAGOPY`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `FK_HD_KH` (`MAKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MAKM`);

--
-- Indexes for table `lichtrinh`
--
ALTER TABLE `lichtrinh`
  ADD PRIMARY KEY (`MALT`),
  ADD KEY `FK_LT_TUYEN` (`MATUYEN`),
  ADD KEY `FK_LT_XE` (`MAXE`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`);

--
-- Indexes for table `nhaxe`
--
ALTER TABLE `nhaxe`
  ADD PRIMARY KEY (`MANX`);

--
-- Indexes for table `quydinhloaitk`
--
ALTER TABLE `quydinhloaitk`
  ADD PRIMARY KEY (`MALOAITK`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MATK`),
  ADD KEY `FK_TK_KH` (`MAKH`),
  ADD KEY `FK_TK_NV` (`MANV`);

--
-- Indexes for table `tuyen`
--
ALTER TABLE `tuyen`
  ADD PRIMARY KEY (`MATUYEN`);

--
-- Indexes for table `vexe`
--
ALTER TABLE `vexe`
  ADD PRIMARY KEY (`MAVE`),
  ADD KEY `FK_VEXE_LT` (`MALT`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`MAXE`),
  ADD KEY `FK_XE_NX` (`MANX`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdoanhthu`
--
ALTER TABLE `chitietdoanhthu`
  ADD CONSTRAINT `FK_CTDT_DT` FOREIGN KEY (`MADT`) REFERENCES `doanhthu` (`MADT`),
  ADD CONSTRAINT `FK_CTDT_NX` FOREIGN KEY (`MANX`) REFERENCES `nhaxe` (`MANX`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK_CHITIETHD_CHITIETKM` FOREIGN KEY (`MACHITIETKM`) REFERENCES `chitietkhuyenmai` (`MACHITIETKM`),
  ADD CONSTRAINT `FK_CHITIETH_CHITIETHO_HOADON` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `FK_CHITIETH_CHITIETHO_VEXE` FOREIGN KEY (`MAVE`) REFERENCES `vexe` (`MAVE`);

--
-- Constraints for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD CONSTRAINT `FK_CTKM_KM` FOREIGN KEY (`MAKM`) REFERENCES `khuyenmai` (`MAKM`),
  ADD CONSTRAINT `FK_CTKM_TUYEN` FOREIGN KEY (`MATUYEN`) REFERENCES `tuyen` (`MATUYEN`);

--
-- Constraints for table `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD CONSTRAINT `FK_DT_NV` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HD_KH` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);

--
-- Constraints for table `lichtrinh`
--
ALTER TABLE `lichtrinh`
  ADD CONSTRAINT `FK_LT_TUYEN` FOREIGN KEY (`MATUYEN`) REFERENCES `tuyen` (`MATUYEN`),
  ADD CONSTRAINT `FK_LT_XE` FOREIGN KEY (`MAXE`) REFERENCES `xe` (`MAXE`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_TK_KH` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `FK_TK_NV` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `vexe`
--
ALTER TABLE `vexe`
  ADD CONSTRAINT `FK_VEXE_LT` FOREIGN KEY (`MALT`) REFERENCES `lichtrinh` (`MALT`);

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `FK_XE_NX` FOREIGN KEY (`MANX`) REFERENCES `nhaxe` (`MANX`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
