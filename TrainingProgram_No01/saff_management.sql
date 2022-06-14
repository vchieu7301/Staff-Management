-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2022 lúc 09:40 AM
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
-- Cấu trúc bảng cho bảng `m_user`
--

CREATE TABLE `m_user` (
  `STAFFCODE` smallint(11) NOT NULL,
  `STAFFNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BIRTHDAY` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TEL1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TEL2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ZIP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NOTE` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `USEFLAG` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `m_user`
--

INSERT INTO `m_user` (`STAFFCODE`, `STAFFNAME`, `BIRTHDAY`, `TEL1`, `TEL2`, `ZIP`, `ADDRESS1`, `ADDRESS2`, `NOTE`, `USEFLAG`) VALUES
(1, 'Nguyễn Văn Chiêu', '07-03-2001', '9090909', '8080808', '70000', 'HCM', 'LA', 'abc', 1),
(2, 'Phạm Thành Khang', '20-05-2001', '9090909', '8080808', '70000', 'HCM', 'BT', 'NULL', 1),
(3, 'Phan Quang Vinh', '10-10-2001', '9090909', '8080808', '70000', 'HCM', 'TN', 'NULL', 1),
(4, 'Võ Thành Tín', '07-09-2001', '9090909', '8080808', '70000', 'HCM', 'TG', 'NULL', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`STAFFCODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
