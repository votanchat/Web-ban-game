-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 07:57 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webbangame`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE IF NOT EXISTS `chitietdonhang` (
`id` int(11) NOT NULL,
  `idGame` int(11) NOT NULL,
  `idDonHang` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `idGame`, `idDonHang`, `soLuong`, `donGia`, `created_at`, `updated_at`) VALUES
(54, 5, 1, 1, 250000, '2018-01-14 18:23:13', '2018-01-14 18:23:13'),
(55, 4, 1, 1, 30000, '2018-01-14 18:23:13', '2018-01-14 18:23:13'),
(56, 2, 1, 1, 1000000, '2018-01-14 18:23:13', '2018-01-14 18:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
`id` int(11) NOT NULL,
  `tien` float NOT NULL,
  `trangThai` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mailNhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chiTiet` text COLLATE utf8_unicode_ci,
  `idUser` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `tien`, `trangThai`, `ten`, `mailNhan`, `chiTiet`, `idUser`, `created_at`, `updated_at`) VALUES
(1, 1280000, 0, 'Võ Tấn Chất', 'votanchat@gmail.com', 'Số điện thoại: 123456, Ghi chú: ', 1, '2018-01-14 18:23:13', '2018-01-14 18:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
`id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `imageUrl` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `chiTiet` text COLLATE utf8_unicode_ci,
  `moTa` text COLLATE utf8_unicode_ci,
  `hot` int(1) NOT NULL DEFAULT '0',
  `luotXem` int(11) NOT NULL DEFAULT '0',
  `idTheLoai` int(11) DEFAULT NULL,
  `idKhuyenMai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `ten`, `imageUrl`, `gia`, `chiTiet`, `moTa`, `hot`, `luotXem`, `idTheLoai`, `idKhuyenMai`, `created_at`, `updated_at`) VALUES
(1, 'OverWatch', 'http://cdn.studiofeedusallc.netdna-cdn.com/wp-content/uploads/2016/09/overwatch-game-logo-2048x1152.jpg', 200000, 'System Requirements OS : Windows Vista / Windows 7 / Windows 8 / Windows 10 64-bit (latest Service Pack) CPU : Intel Core i3 or AMD Phenom X3 8650 VGA : NVIDIA GeForce GTX 460, ATI Radeon HD 4850, or Intel HD Graphics 4400 RAM : 4 GB  HDD : 5 GB', 'Overwatch is a highly stylized team-based shooter set on a near-future earth. Every match is an intense multiplayer showdown pitting a diverse cast of heroes, mercenaries, scientists, adventurers, and oddities against each other in an epic, globe-spanning conflict.  In Overwatch, bold characters with extraordinary abilities fight across fantastic yet familiar battlegrounds. Teleport past rockets while an ally dives behind a double-decker hoverbus on the cobblestone streets of London. Shield your team from a shadowy archer’s ambush, then hunt him through a bazaar beneath a high-tech Egyptian pyramid.', 0, 1, 2, NULL, '2018-01-14 17:51:08', '2018-01-14 17:51:08'),
(2, 'Battle Grounds', 'http://logicalincrements.com/assets/img/articles/Pubg/PUBGLogoHeader.jpg', 1000000, NULL, NULL, 0, 0, 2, NULL, '2018-01-14 17:51:08', '2018-01-14 17:51:08'),
(3, 'GTA V', 'https://i.ytimg.com/vi/iPAadjNjXT4/maxresdefault.jpg', 150000, NULL, NULL, 0, 3, 2, NULL, '2018-01-14 18:05:20', '2018-01-14 18:05:20'),
(4, 'Deadpool', 'https://cheapgame.asia/98279-large_default/deadpool-steam-key.jpg', 30000, NULL, NULL, 1, 2, 2, NULL, '2018-01-14 17:49:03', '2018-01-14 17:49:03'),
(5, 'The Elder Scrolls V', 'https://cheapgame.asia/90968-large_default/the-elder-scrolls-v-skyrim-legendary-edition-steam-key.jpg', 250000, 'Game hay', 'Game cực hay', 1, 1, 1, NULL, '2018-01-14 18:12:08', '2018-01-14 18:12:08'),
(6, 'Fallout 3', 'https://cheapgame.asia/91214-large_default/fallout-3-steam-key.jpg', 600000, 'Game hot', 'Game hot', 0, 0, 1, NULL, '2018-01-07 18:28:57', '2018-01-07 18:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `key`
--

CREATE TABLE IF NOT EXISTS `key` (
`id` int(11) NOT NULL,
  `key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idGame` int(11) NOT NULL,
  `idChiTiet` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `key`
--

INSERT INTO `key` (`id`, `key`, `idGame`, `idChiTiet`, `created_at`, `updated_at`) VALUES
(7, 'gkjakjagjaajgajgajha', 1, NULL, '2018-01-09 13:37:46', '0000-00-00 00:00:00'),
(8, 'gkjajawjhawjhaajhajh', 1, NULL, '2018-01-09 13:37:44', '0000-00-00 00:00:00'),
(9, 'gkjajhaajhajhajhaaj', 2, NULL, '2018-01-14 15:29:28', '2018-01-14 15:29:04'),
(10, 'gjkakjaakjawjkaja', 2, NULL, '2018-01-14 15:29:28', '2018-01-14 15:29:04'),
(14, 'gjfkjfkfkjfkjf', 3, NULL, '2018-01-14 15:29:28', '2018-01-14 15:29:04'),
(15, 'gjkgekjfjkfkjf', 3, NULL, '2018-01-14 15:29:28', '2018-01-14 15:29:04'),
(16, 'gkjawjhahjawhjw', 3, NULL, '2018-01-14 15:29:28', '2018-01-14 15:29:04'),
(17, 'gâjhawjhawjhaw', 3, NULL, '2018-01-14 15:29:28', '2018-01-14 15:29:04'),
(18, 'gkauiaahjahjawhj', 2, NULL, '2018-01-14 15:29:28', '2018-01-14 15:29:04'),
(21, 'ggggggsafwffafag', 5, NULL, '2018-01-12 08:48:25', '2018-01-12 08:47:35'),
(22, 'gaaaaaaaaaaaawefwa', 5, NULL, '2018-01-12 08:45:30', '0000-00-00 00:00:00'),
(23, 'akffffffffffffff', 1, NULL, '2018-01-13 17:24:18', '2018-01-13 17:24:18'),
(24, 'gkkkkkkkkkkkkkkk', 1, NULL, '2018-01-13 17:24:18', '2018-01-13 17:24:18'),
(25, 'gkjjjjjjjjjjjkjffffffffff', 1, NULL, '2018-01-13 17:24:18', '2018-01-13 17:24:18'),
(26, 'gggggggggggggggggggg', 6, NULL, '2018-01-14 15:22:44', '2018-01-14 15:22:44'),
(27, 'gkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 6, NULL, '2018-01-14 15:22:44', '2018-01-14 15:22:44'),
(28, 'ghlkkkkkkkkkkkkkkkk', 6, NULL, '2018-01-14 15:22:44', '2018-01-14 15:22:44'),
(29, 'gggggggggggggggggggg', 6, NULL, '2018-01-14 15:22:51', '2018-01-14 15:22:51'),
(30, 'gkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 6, NULL, '2018-01-14 15:22:51', '2018-01-14 15:22:51'),
(31, 'ghlkkkkkkkkkkkkkkkk', 6, NULL, '2018-01-14 15:22:51', '2018-01-14 15:22:51'),
(32, 'gggggggggggggggggggg', 6, NULL, '2018-01-14 15:22:57', '2018-01-14 15:22:57'),
(33, 'gkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 6, NULL, '2018-01-14 15:22:57', '2018-01-14 15:22:57'),
(34, 'ghlkkkkkkkkkkkkkkkk', 6, NULL, '2018-01-14 15:22:57', '2018-01-14 15:22:57'),
(35, 'ccccccccccccccc', 6, NULL, '2018-01-14 15:23:46', '2018-01-14 15:23:46'),
(36, 'ccccccccccccc', 6, NULL, '2018-01-14 15:23:46', '2018-01-14 15:23:46'),
(37, 'ccccccccccc', 6, NULL, '2018-01-14 15:23:46', '2018-01-14 15:23:46'),
(38, 'aaaaaaa', 6, NULL, '2018-01-14 15:23:46', '2018-01-14 15:23:46'),
(39, 'gggggggggggggggg', 5, NULL, '2018-01-14 15:24:30', '2018-01-14 15:24:30'),
(40, 'lslkakjakj', 5, NULL, '2018-01-14 15:24:30', '2018-01-14 15:24:30'),
(41, 'rioroireoier', 5, NULL, '2018-01-14 15:24:30', '2018-01-14 15:24:30'),
(42, 'goieoieoe', 5, NULL, '2018-01-14 15:24:30', '2018-01-14 15:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE IF NOT EXISTS `khuyenmai` (
`id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soPhanTramKm` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
`id` int(11) NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'lien-he', 'http://cdn.edgecast.steamstatic.com/steam/apps/744840/ss_ab808c78960279bfdc9b43d98feec478b89cf963.600x338.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'http://localhost/webbanhang/public/5', 'http://localhost/webbanhang/public/slide1.jpg', '2018-01-14 18:12:45', '2018-01-14 18:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `thanhtoan`
--

CREATE TABLE IF NOT EXISTS `thanhtoan` (
`id` int(11) NOT NULL,
  `soTien` int(11) NOT NULL,
  `chiTiet` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idDonHang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=121 ;

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE IF NOT EXISTS `theloai` (
`id` int(11) NOT NULL,
  `ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Hành động', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, ' Chiến thuật', '2018-01-05 19:24:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `thongke`
--

CREATE TABLE IF NOT EXISTS `thongke` (
`id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `giaTri` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `thongke`
--

INSERT INTO `thongke` (`id`, `ten`, `giaTri`) VALUES
(1, 'thongke', 9),
(2, 'thongkengay', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diaChi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lv` int(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `sdt`, `diaChi`, `password`, `lv`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'votanchat@gmail.com', 'Võ Tấn Chất', '123456', 'TP HCM', '$2y$10$0IC3LvCYzgcBW2TQiScETOdC8cdaA3qCxsa3JycNVbWntlgGbGGGW', 1, 'Hk0OQzpwaxsPgNWfubeoQ1mYvw8nSoODjWhAQlgQ0D7ziWq76ce18zsS7Mn2', '2018-01-13 15:23:20', '2018-01-13 15:23:20'),
(2, 'votanchat1@gmail.com', 'Võ Tấn Chất', '123456', 'Khu phố 6 - Phường Linh Trung - Quận Thủ Đức - TPHCM', '$2y$10$PnOrGzxp9fqqeyuGSly90ehnEKRiK2WKHuBZGvCejfvwZzkt7/bIC', 0, 'ao0wFI4mbV21dALjLZF94HV1J8tfnHhPQvuQxd0n6uNXtLQegVZ5QAuRiDja', '2018-01-12 13:11:04', '2018-01-12 13:11:04'),
(3, 'test@abc.com', 'Test', '11111', 'HCM', '111111111111111', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
 ADD PRIMARY KEY (`id`), ADD KEY `idGame` (`idGame`,`idDonHang`), ADD KEY `idDonHang` (`idDonHang`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
 ADD PRIMARY KEY (`id`), ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`id`), ADD KEY `idTheLoai` (`idTheLoai`), ADD KEY `idKhuyenMai` (`idKhuyenMai`);

--
-- Indexes for table `key`
--
ALTER TABLE `key`
 ADD PRIMARY KEY (`id`), ADD KEY `idGame` (`idGame`), ADD KEY `idChiTiet` (`idChiTiet`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
 ADD PRIMARY KEY (`id`), ADD KEY `idDonHang` (`idDonHang`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thongke`
--
ALTER TABLE `thongke`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `key`
--
ALTER TABLE `key`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `thongke`
--
ALTER TABLE `thongke`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idGame`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game`
--
ALTER TABLE `game`
ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`idTheLoai`) REFERENCES `theloai` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`idKhuyenMai`) REFERENCES `khuyenmai` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `key`
--
ALTER TABLE `key`
ADD CONSTRAINT `key_ibfk_1` FOREIGN KEY (`idGame`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `key_ibfk_2` FOREIGN KEY (`idChiTiet`) REFERENCES `chitietdonhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
ADD CONSTRAINT `thanhtoan_ibfk_1` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
