-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2022 lúc 09:19 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `staffmanagement`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_user`
--

CREATE TABLE `m_user` (
  `CODE` smallint(6) NOT NULL,
  `NAME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BIRTHDAY` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TEL1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TEL2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TEL3` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ZIPNO` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NOTE` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `USEFLAG` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `m_user`
--

INSERT INTO `m_user` (`CODE`, `NAME`, `BIRTHDAY`, `TEL1`, `TEL2`, `TEL3`, `ZIPNO`, `ADDRESS1`, `ADDRESS2`, `NOTE`, `USEFLAG`) VALUES
(1, 'Phạm Thành Khang 1', '12/01/2001', '19003280', '0', '0', '0', '390 Hoàng Văn Thụ, P.4, Tân Bình', 'NULL', 'NULL', 1),
(2, 'Phạm Thành Khang 2', '12/01/2001', '0', '0', '0', '0', '390 Hoàng Văn Thụ', 'NULL', 'NULL', 1),
(4, 'Khang Phạm Thành', '12/01/2001', '0', '0', '0', '0', '390 Hoàng Văn Thụ', 'NULL', 'NULL', 1),
(9, 'Phạm Khang', '12/02/02', '233', '453', '0', '43', 'hgh ', 'dsdsd', 'note', 1),
(10, 'Khang Khang', '12/01/2001', '3434', '434343', '', '232432', 'sdfd', 'dfdf', 'fđ', 1),
(15, 'DFDF DFDSF', '11/11/11', '232323', '3232', '0', '3232', 'dsdsd', 'sds', 'ádsad', 1),
(23, 'gfgfgfg', '12/01/2001', '2121', '32323', '0', '1232', 'sd ssdsd', 'gfg fdf', 'ư', 1),
(34, '3434', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(43, 'rêre', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(44, 'bbbbbbb', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(45, 'Khang Khang', '12/01/2001', '343432', '223', '', '3', 're', 'd', 'd', 1),
(55, '55555', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(223, 'èdfdv', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(323, 'ewewe', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(345, 'ewrerevd', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(434, 'ẻerer', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(456, 'ereer', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(487, '3434', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(564, 'ukuyk fdf', 'NULL', '0', '0', '', '0', 'NULL', 'NULL', 'NULL', 1),
(999, 'Phạm Thành Tín', '07-03-2001', '12123', '123123', '00000', '7000', 'abd', 'abc', 'null', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`CODE`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `m_user`
--
ALTER TABLE `m_user`
  MODIFY `CODE` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
