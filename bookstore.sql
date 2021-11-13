-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2021 lúc 09:06 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` varchar(30) COLLATE utf8_bin NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
('1', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` varchar(30) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price2` int(255) NOT NULL,
  `image_link` varchar(50) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `transaction_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `id` varchar(30) COLLATE utf8_bin NOT NULL,
  `product_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `data` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`transaction_id`, `id`, `product_id`, `qty`, `amount`, `data`, `status`) VALUES
('2', '2', 'Rezero07', 2, '2.0000', '', 0),
('1', '3', 'VCG', 1, '2.0000', '', 0),
('1', '1', 'Aleph', 2, '1.0000', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price1` int(255) NOT NULL,
  `price2` int(255) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `view` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `id_category`, `price1`, `price2`, `content`, `author`, `image_link`, `created`, `view`, `quantity`) VALUES
('Rezero07', 'Re:zero - Bắt Đầu Lại Ở Thế Giới Khác 7 (Tái Bản 2021)', 'LNovel', 110000, 100000, '', 'Tappei Nagatsuki', 're-zero-7.jpg', '2021-10-30 23:20:05', 0, 1),
('NGK', 'Nhà Giả Kim (Tái Bản 2020)', 'TThuyet', 70000, 67000, '', 'Paulo Coelho', 'image_195509_1_36793.jpg', '2021-10-30 23:21:15', 0, 1),
('Aleph', 'Aleph - Một Chuyến Hành Hương Của Chàng Santiago Trong Đời Thực', 'TThuyet', 120000, 114000, '', 'Paulo Coelho', 'image_224905.jpg', '2021-10-30 23:22:33', 0, 1),
('TLHTP', 'Bộ Sách Tâm Lý Học Tội Phạm (Bộ 2 Tập)', 'TLy', 270000, 250000, '', 'Stanton E Samenow', '93-6066-690-126.jpg', '2021-10-30 23:23:50', 0, 1),
('KNTCTTN', 'Kiếp Nào Ta Cũng Tìm Thấy Nhau - Câu Chuyện Về Những Linh Hồn Tri Kỷ Vĩnh Viễn Không Chia Lìa', 'TLy', 85900, 75000, '', 'Brian L Weiss', 'image_180561.jpg', '2021-10-30 23:25:12', 0, 1),
('SGPWALL', 'Sói Già Phố Wall (Phần 2) - Tái Bản 2021', 'KTe', 170000, 146000, '', 'Jordan Belfort', 'image_222089.jpg', '2021-10-30 23:26:27', 0, 1),
('TTBCC', 'Những Ông Trùm Tư Bản Cuối Cùng Ở Thượng Hải - Hai Đế Chế Kinh Tế Do Thái Cạnh Tranh Giúp Tạo Nên Tr', 'KTe', 180000, 150000, '', 'Jonathan Kaufman', 'image_244718_1_2506.jpg', '2021-10-30 23:27:40', 0, 1),
('VCG', 'Vì Con Gái Tôi Có Thể Đánh Bại Cả Ma Vương (Bản Thường) - Tái Bản 2020', 'LNovel', 100000, 85000, '', 'CHIROLU', 'image_195509_1_32560.jpg', '2021-10-30 23:20:05', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` varchar(11) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `status`, `user_id`, `amount`, `payment`, `payment_info`, `message`, `created`) VALUES
('1', 0, '11', '2.0000', '1', '', '', 0),
('2', 1, '4', '4.0000', '1', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typebook`
--

CREATE TABLE `typebook` (
  `id_category` varchar(30) CHARACTER SET utf8 NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `typebook`
--

INSERT INTO `typebook` (`id_category`, `name_category`) VALUES
('CTri', 'Chính Trị'),
('DSong', 'Đời sống'),
('KTe', 'Kinh Tế'),
('LNovel', 'Light Novel'),
('NTinh', 'Ngôn Tình'),
('TLy', 'Tâm lý'),
('TThuyet', 'Tiểu thuyết'),
('TTranh', 'Truyện Tranh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(225) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'https://giffiles.alphacoders.com/398/3987.gif',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `avatar`, `email`, `phone`, `address`, `password`) VALUES
(1, 'Nguyễn Văn Hải Long', 'admin', '', 'xxure@uniromax.com', '0563011231', 'Hải Dương', 'admin'),
(4, 'Nguyễn Văn Hải Long', 'long', 'https://giffiles.alphacoders.com/398/3987.gif', 'r3e@uniromax.com', '0563011231', '20', '1234'),
(13, 'Ngô Minh Thư', 'minhthu', 'https://giffiles.alphacoders.com/398/3987.gif', 'thu@gmail.com', '0354326789', 'Phú Yên', 'minthu'),
(14, 'Minh Thư', 'minhthu123', 'https://giffiles.alphacoders.com/398/3987.gif', 'thu123@gmail.com', '0351346890', 'ffrhdxd', 'minhthu123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id_magg` varchar(30) NOT NULL,
  `type_magg` int(11) NOT NULL,
  `DKG` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `NAD` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `typebook`
--
ALTER TABLE `typebook`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_magg`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
