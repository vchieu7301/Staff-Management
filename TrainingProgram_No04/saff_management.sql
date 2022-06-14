-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2022 lúc 09:43 AM
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
-- Cơ sở dữ liệu: `saff_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_department`
--

CREATE TABLE `m_department` (
  `CODE` smallint(6) NOT NULL,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TEL` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MAILADDRESS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPTION` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NOTE` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `USEFLAG` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `m_department`
--

INSERT INTO `m_department` (`CODE`, `NAME`, `TEL`, `MAILADDRESS`, `DESCRIPTION`, `NOTE`, `USEFLAG`) VALUES
(1, 'Nguyễn Văn Chiêu', '9090909', 'chieu@yahoo.com', 'abc', 'NULL', 1),
(2, 'Phạm Thành Tín', '8080808', 'tin@yahoo.com', 'abc', 'NULL', 1),
(3, 'Võ Thành Khang', '7070707', 'khang@yahoo.com', 'abc', 'NULL', 1),
(4, 'Phan Văn Dinh', '6060606', 'dinh@yahoo.com', 'abc', 'NULL', 1),
(5, 'Bùi Văn Thìn', '5050505', 'thin@yahoo.com', 'abc', 'NULL', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_user`
--

CREATE TABLE `m_user` (
  `STAFFCODE` smallint(11) NOT NULL,
  `STAFFNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BIRTHDAY` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TEL1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TEL2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ZIP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TEL3` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NOTE` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `USEFLAG` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `m_user`
--

INSERT INTO `m_user` (`STAFFCODE`, `STAFFNAME`, `BIRTHDAY`, `TEL1`, `TEL2`, `ZIP`, `TEL3`, `ADDRESS1`, `ADDRESS2`, `NOTE`, `USEFLAG`) VALUES
(1, 'Nguyễn Văn Chill', '07-03-2001', '9090909', '8080808', '70000', '7070707', 'HCM', 'LA', 'NULL', 1),
(2, 'Võ Thành Khang', '01-01-1999', '09', '08', '07', '70000', 'Hồ Chí Minh', 'Hà Nội', 'NULL', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `m_department`
--
ALTER TABLE `m_department`
  ADD PRIMARY KEY (`CODE`);

--
-- Chỉ mục cho bảng `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`STAFFCODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
