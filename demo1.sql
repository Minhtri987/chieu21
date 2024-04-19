-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 19, 2024 lúc 03:48 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `name`, `role`) VALUES
(4, 'minhtri987', '$2y$12$pc279hbgVfDBGbIUP96OQu/8DNtmRpeSRnw6XG4Tl7vS2e0RxHmdq', 'minhtri', 'user'),
(8, 'minhtri9876', '$2y$12$NlS1Oprxi7vQPa5XdFwS7edRcsL0SVvoGI8RGjYEyDYa3xDfBaLIW', 'Truong Minh Tri', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Tay cầm Bluetooth Wireless chơi game Liên quân, COD, PUBG cho IOS, Android và PC, TV', 'Trang bị joystick,nút trigger, con quay hồi chuyển,micro switch/dpad,Flydigi 3.0 cực phát triển', 2299000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/flydigi-apex-4.png?v=1711438542467'),
(2, 'Rawm Shadow S30 | Nút bắn chơi game hỗ trợ macro ảo / ghìm tâm AI', 'Hỗ trợ phím macro ảo\r\nTrang bị tính năng nhận dạng ghìm tâm AI,Pin sử dụng liên tục 8h, chỉ cần sạc 45 phút,Độ nhạy cao, liên kết sáu ngón tay và cụm một phím để nâng cao trải nghiệm,Thao tác mượt mà, không delay sử dụng bluetooth 5.2 Kích thước gọn nhẹ dễ sử dụng', 259000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/190a757c-47f1-44f2-8772-bb87a3b125a4-1702530950565.jpg?v=1702530956740'),
(3, 'Flydigi Direwolf 2 ', 'Tay cầm chơi game Wireless hỗ trợ đa nền tảng PC/Switch/Mobile', 799000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/1-1711681444529.png?v=1711681452977'),
(4, 'Rawm M20', 'Tay cầm chơi game một bên hỗ trợ macro combo ảo, ghìm tâm AI dành cho điện thoại và máy tính bảng', 299000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/ff674b8b-c8cd-4a07-9f6e-4803f1f8422c-1702531427735.jpg?v=1702531432780'),
(5, 'Quạt tản nhiệt điện thoại X76A', 'sò lạnh từ tính (tặng kèm ngàm kẹp) Led RGB Gaming màn hình hiển thị nhiệt độ', 199000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/8994f910-d202-4191-a794-6ee576665068-1709729875253-9336603e-934a-4f04-b6bf-b0f7d457336a.jpg?v=1710101846290'),
(6, 'RED Spider PRO', 'Nút bắn chơi game hỗ trợ ghìm tâm, Autotap RED Spider PRO dành cho IOS và Android', 279000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/48faccbc-d5a5-4b15-ae38-7c6163b17505-1699756388598.jpg?v=1700901151127'),
(7, 'Tay cầm JK01', 'Tay cầm chơi game auto tap / macro / quạt tản nhiệt sò lạnh', 340000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/tay-cam-jk01-1697167489658.jpg?v=1700901167743'),
(8, 'sò lạnh X65', 'Công nghệ quạt tản nhiệt sò lạnh siêu mát, kéo dài tuổi thọ điện thoại, giữ mát cho máy khi chơi game, livetream', 300000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/sg-11134201-7qvfe-lgoxd786iv0gb4.jpg?v=1701678444150'),
(9, ' MEMO MB02', 'Tương thích Android và iOS (Kể cả iOS 14, 15, 16) - ĐÃ HỖ TRỢ IOS 17', 200000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/vn-11134207-7r98o-lmhu4l4i159b8f.jpg?v=1701331827880'),
(10, 'Gamwing Mini Pro', 'Gamwing Mini Pro | Tay cầm chơi game dành cho điện thoại và máy tính bảng', 240000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/mini-pro-1-jpeg-1700926508911.jpg?v=1700926512540'),
(11, 'Memo DL05', 'Nếu nhiệt độ điện thoại quá cao sẽ khiến pin nhanh bị hao mòn, giảm tuổi thọ vì thế việc giảm nhiệt độ của điện thoại rất quan trọng, ngăn ngừa hiệu quả mạch pin bị lão hóa và kéo dài tuổi thọ. Quạt tản nhiệt điện thoại Memo DL05 sẽ giúp bạn giải quyết những vấn đề này.', 280000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/download-2023-11-27t132307-593-jpeg-1701066210867.jpg?v=1701066214703'),
(12, 'Plextone RX3 PRO ', 'Tai nghe chơi game mic rời, chống ồn, jack 3.5mm sử dụng điện thoại, laptop, PC', 159000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/503/563/products/5cfe3a06-a6fd-4aca-ad7f-762e54321d82-1703044030579.png?v=1703044053007');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;