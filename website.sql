-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2022 lúc 02:32 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `id_taikhoan`, `id_sanpham`, `noidung`) VALUES
(13, 1, 10, 'Thấy shop chạy quảng cáo trên fb đúng lúc mình hết sữa rửa mặt. Tiện tay đặt k hy vọng gì lắm nma lúc nhận sản phẩm ưng cái bụng. Y hệt bản mình nhờ người mua bên hàn. Chất gel trong suốt mùi thơm. Nói chung là 10đ. Nhận hàng xong phải quay lại tìm page để đánh giá ngay'),
(15, 7, 10, 'phí ship bao nhiêu vậy ak');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `danhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `danhmuc`) VALUES
(1, 'Trang điểm - Makeup'),
(3, 'Chăm sóc da - Skincare'),
(4, 'Chăm sóc cơ thể - Bodycare'),
(5, 'Chăm sóc tóc - Haircare'),
(6, 'Dụng cụ - Tools - Brushes'),
(7, 'Nước hoa - Perfume'),
(8, 'Mỹ phẩm High-End'),
(9, 'Thực Phẩm Chức Năng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `anh1` text NOT NULL,
  `status` int(11) NOT NULL,
  `diachi` text DEFAULT NULL,
  `thoigian` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `id_sanpham`, `id_taikhoan`, `gia`, `soluong`, `tongtien`, `anh1`, `status`, `diachi`, `thoigian`) VALUES
(9, 5, 1, 190000, 2, 380000, '1635563498695-combo-tay-te-bao-chet-cocoon-queen-chat-4-600x600.jpeg', 2, 'ok', '09-04-2022 21:26:19'),
(14, 20, 1, 396000, 1, 396000, 'nuoc-tay-trang-bioderma 1.jpeg', 1, 'Nam Tu Liem - Ha Noi', '24-04-2022 02:16:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsx`
--

CREATE TABLE `hangsx` (
  `masx` int(11) NOT NULL,
  `tensx` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hangsx`
--

INSERT INTO `hangsx` (`masx`, `tensx`) VALUES
(1, 'Neutrogena '),
(8, 'COSRX'),
(9, 'LIME'),
(10, 'MAYBELLINE'),
(11, 'INNISFREE'),
(12, 'BIODERMA'),
(13, 'BLACK ROUGE'),
(14, 'CARYOPHY'),
(15, 'OBAGI'),
(16, 'SENKA'),
(17, 'LA ROCHE-POSAY'),
(18, 'CALVIN KLEIN'),
(19, 'DHC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `masx` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL,
  `giakm` int(11) NOT NULL,
  `anh1` text NOT NULL,
  `anh2` text NOT NULL,
  `anh3` text NOT NULL,
  `chitiet` text NOT NULL,
  `luotxem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `id_danhmuc`, `masx`, `ten`, `gia`, `giakm`, `anh1`, `anh2`, `anh3`, `chitiet`, `luotxem`) VALUES
(3, 7, 1, 'Nước Hoa Nữ Marc Jacobs Decadence - Eau De Parfum 50ML', 2900000, 30, '1612489677590-nuoc-hoa-nu-marc-jacobs-decadence-50ml-1-600x600.jpeg', '1612489679149-nuoc-hoa-nu-marc-jacobs-decadence-50ml-3-600x600.jpeg', '1642123850528-2-600x600.png', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Giới thiệu sản phẩm Nước hoa nữ Marc Jacobs Divine Decadence EDP 50ml</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Thương hiệu Marc Jacobs&nbsp;được thành lập năm 2001 với mục tiêu mang đến cho người tiêu dùng những mặt hàng chất lượng với giá cả hợp lý. Sản phẩm của Marc Jacobs bao gồm quần áo, giày da, túi xách, mắt kính, nước hoa dành cho cả nam, nữ và quần áo trẻ em. Hiện tại những sản phẩm của Marc Jacobs hiện diện trong hơn 200 cửa hàng bán lẻ ở 80 quốc gia trên toàn thế giới.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image-style-align-center image_resized\" style=\"margin: 1em auto; display: table; clear: both; text-align: center; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 600.737px;\"><img src=\"https://cdn.cocolux.com/2021/02/products/1612489623064-nuoc-hoa-nu-marc-jacobs-decadence-50ml-2.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Nước hoa nữ Marc Jacobs Divine Decadence EDP&nbsp;mang đến hương thơm gợi cảm, quyến rũ, nhấn mạnh phong cách nữ tính sang trọng và đẳng cấp của cô gái hiện đại. Divine Decadence là một phiên bản mới kế thừa chiếc túi xách da trăn quyền năng, đầy sang trọng. Hương đầu mở ra với hương thơm rượu sâm banh lấp lánh, cam bergamot và hoa cam kem. Hương giữa phong phú bao gồm cây sơn, hoa tú cầu và hoa kim ngân mang lại sự sang trọng, nữ tính. Hương cuối là sự kết hợp hài hòa giữa hổ phách, nghệ tây và lan nhiệt đới.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image-style-align-center image_resized\" style=\"margin: 1em auto; display: table; clear: both; text-align: center; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 651.888px;\"><img src=\"https://cdn.cocolux.com/2021/02/products/1612489630177-nuoc-hoa-nu-marc-jacobs-decadence-50ml-3.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br>&nbsp; &nbsp;+ Hương đầu: Hoa cam, Rượu sâm panh, Cam Bergamot</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp; &nbsp;+ Hương giữa: Hoa kim ngân, Hoa sơn chi, Hoa tú cầu</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp; &nbsp;+ Hương cuối: Hổ phách, Nghệ tây, Hương Va ni</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image-style-align-center image_resized\" style=\"margin: 1em auto; display: table; clear: both; text-align: center; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 608.463px;\"><img src=\"https://cdn.cocolux.com/2021/02/products/1612489639324-nuoc-hoa-nu-marc-jacobs-decadence-50ml-1.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Thương hiệu:</strong>&nbsp;Marc Jacobs<br><strong>Xuất xứ:&nbsp;</strong>Mỹ<br><strong>Dung tích:&nbsp;</strong>50ml<br><strong>CocoLux</strong></p>', 891),
(4, 1, 1, 'Kem Lót Maybelline Fit Me Kiềm Dầu', 1980000, 10, '1635562656093-kem-lot-maybelline-fit-me-kiem-dau-4-600x600.jpeg', '1635562639227-kem-lot-maybelline-fit-me-kiem-dau-600x600.jpeg', '1612489679149-nuoc-hoa-nu-marc-jacobs-decadence-50ml-3-600x600.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÔNG TIN SẢN PHẨM</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><a href=\"https://cocolux.com/danh-muc/kem-lot-makeup-primer-i.9\"><i><strong>Kem Lót Trang Điểm</strong></i></a>&nbsp;Maybelline Fit Me Matte+Poreless Kiềm Dầu Che Phủ Lỗ Chân Lông SPF20 30ml<br><br>Fit Me Matte + Poreless Primer SPF 20 với thành phần tích hợp đất sét khoáng giúp kiềm dầu, ngăn nền xuống tông trong suốt 16H. Chất kem dạng sữa dễ tán, đem lại hiệu ứng làm mềm da, làm mờ lỗ chân lông ngay khi sử dụng. Ngoài ra, sản phẩm có thêm SPF 20 giúp bảo vệ da khỏi tác hại của ánh nắng mặt trời. Sản phẩm được khuyên dùng trước bước đánh kem nền để đem lại lớp nền mịn lì, không bóng dầu, không xuống tông suốt ngày dài.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 628.912px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635562930286-kem-lot-maybelline-fit-me-kiem-dau-1.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><div><br></div>', 186),
(5, 3, 1, 'Combo Tẩy Tế Bào Chết Cocoon ', 200000, 0, '1635563498695-combo-tay-te-bao-chet-cocoon-queen-chat-4-600x600.jpeg', '1635563494069-combo-tay-te-bao-chet-cocoon-queen-chat-2-600x600.jpeg', '1635563487004-combo-tay-te-bao-chet-cocoon-queen-chat-5-600x600.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÔNG TIN SẢN PHẨM</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Nhịp sống đã thật sự trở lại, khi giờ đây chúng ta có thể cùng bạn bè ăn uống và ngồi cà phê tán gẫu ở những quán quen hay một góc đường nào đó mà mình yêu thích. Và làn da cơ thể cùng đôi môi của bạn cũng có một cuộc hẹn cà phê với&nbsp;<a href=\"https://cocolux.com/thuong-hieu/cocoon-i.125\"><i><strong>Cocoon</strong></i></a>&nbsp;và Suboi đó.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 631.45px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635563800747-combo-tay-te-bao-chet-cocoon-queen-chat.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Chúng tôi đã chuẩn bị sẵn những “tách” cà phê thơm lựng cho buổi hẹn đặc biệt ấy. Nhờ sự kết hợp hoàn hảo của những hạt cà phê Đắk Lắk nguyên chất xay nhuyễn cùng bơ ca cao Tiền Giang, các sản phẩm làm sạch da chết trong bộ sưu tập giới hạn “Queen” Chất sẽ giúp bạn loại bỏ nhanh chóng những lớp tế bào da chết già cỗi để đánh thức một làn da tươi mới, tràn đầy năng lượng ngay trong lần sử dụng đầu tiên.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 628.912px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635563811465-combo-tay-te-bao-chet-cocoon-queen-chat-2.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">“Queen” Chất bởi Cocoon x Suboi là combo giới hạn gồm hai sản phẩm:</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Cà phê Đắk Lắk làm sạch da chết cơ thể</strong></p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Làm sạch da chết toàn thân</li><li>Mang lại làn da mịn màng ngay sau lần đầu sử dụng</li><li>Giúp da sáng mịn, đều màu</li></ul><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 598.188px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635563822558-combo-tay-te-bao-chet-cocoon-queen-chat-4.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Cà phê Đắk Lắk làm sạch da chết môi</strong></p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Làm bong những tế bào chết ở môi</li><li>Mang lại làn môi ẩm mềm và mịn màng</li></ul><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 580.3px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635563836664-combo-tay-te-bao-chet-cocoon-queen-chat-3.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Thương hiệu:&nbsp;</strong>Cocoon</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Xuất xứ:</strong>&nbsp;Việt Nam</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><a href=\"https://cocolux.com/\"><strong>Cocolux</strong></a></p>', 58),
(8, 6, 1, 'Bông Tẩy Trang COTONEVE Maxi Tẩy Tế Bào Chết 50 miếng', 89000, 0, '1637547894452-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi-50-mieng-600x600.jpeg', '1637548290205-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi-600x600.jpeg', '1637547894452-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi-50-mieng-600x600.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÔNG TIN SẢN PHẨM</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\"><a href=\"https://cocolux.com/danh-muc/bong-tay-trang-i.54\"><i><strong>Bông tẩy trang</strong></i></a>&nbsp;COTONEVE maxi tẩy tế bào chết (Hạt 3D nổi thông minh) (50 miếng)&nbsp;được chế biến, sản xuất và đóng gói tại Ý. Nguyên liệu bông của Cotoneve được lựa chọn kỹ càng từ các nhà cung cấp đủ điều kiện và được phê duyệt trong hệ thống quản lý chất lượng cũng như tuân thủ các quy định nghiêm ngặt nhất.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 600.737px;\"><img src=\"https://cdn.cocolux.com/2021/11/images/products/1637548148341-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi-50-mieng.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\"><strong>CÔNG DỤNG</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">-&nbsp;Với bề mặt được xử lý đặc biệt cùng các hạt 3D thông minh, Bông Maxi tẩy da chết giúp loại bỏ lớp&nbsp;<a href=\"https://cocolux.com/danh-muc/trang-diem-makeup-i.1\"><i><strong>trang điểm</strong></i></a>&nbsp;sâu bằng cách lấy đi các tế bào chết nhẹ nhàng, giúp đẩy nhanh quá trình tái tạo da&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">-&nbsp;Nhờ một mặt bông được xử lý đặc biệt với các hạt 3D thông minh, không bị bông xù, mặt bông tẩy tế bào chết giúp loại bỏ lớp trang điểm sâu bằng cách tẩy tế bào chết nhẹ nhàng, cho làn da rạng rỡ, tươi trẻ hơn.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">-&nbsp;Mặt bông còn lại có khả năng thấm hút cao, giúp thẩm thấu tốt các loại kem và dung dịch dưỡng lên da.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 557.213px;\"><img src=\"https://cdn.cocolux.com/2021/11/images/products/1637548282518-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>TRỌNG LƯỢNG:</strong>&nbsp;100 MIẾNG</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>XUẤT XỨ:</strong>&nbsp;ITALIA</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THƯƠNG HIỆU:&nbsp;</strong>Cotoneve</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><a href=\"https://cocolux.com/\"><i><strong>MỸ PHẨM COCOLUX</strong></i></a></p>', 85),
(9, 3, 1, 'Kem Dưỡng Ẩm Neutrogena Hydro Boost Water Gel 50ml', 295000, 23, 'anh7.jpeg', 'anh8.jpeg', 'anh9.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><a href=\"https://cocolux.com/danh-muc/kem-duong-facial-cream-i.29\"><i><strong>Kem Dưỡng Ẩm</strong></i></a>&nbsp;Neutrogena Hydro Boost Water Gel là dạng gel, không đặc như kem nhưng cũng không lỏng như lotion, có mùi thơm đặc trưng của mỹ phẩm drugstore, rất dễ chịu, chất gel có màu xanh nhìn mát mắt lắm cơ hihi. Vì là dạng gel có chứa nhiều nước nên thấm rất nhanh, không gây nhờn rít. Sẽ là 1 điểm cộng cho các cô nàng bận rộn, cần kem dưỡng ẩm thấm nhanh để còn make up.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 577.141px;\"><img src=\"https://cdn.cocolux.com/2021/12/images/products/1641979167036-kem-duong-am-neutrogena-hydro-boost-water-gel-50ml.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li><a href=\"https://cocolux.com/thuong-hieu/neutrogena-i.286\"><i><strong>Neutrogena</strong></i></a>&nbsp;Hydro Boost Water Gel có khá nhiều chất đều là silicone (Dimethicone, Cyclohexasiloxane…). Do đó khi apply cảm giác trên da sẽ là rất mướt mát, trơn mượt, bề mặt da phẳng hơn hẳn, giống như lúc mình dùng dầu xả cho tóc vậy đó.</li></ul>', 8),
(10, 3, 8, 'Sữa Rửa Mặt Cosrx Low pH Good Morning Gel Cleanser 150ml', 195000, 31, 'srmcosrx1.jpeg', 'srmcosrx2.jpeg', 'srmcosrx3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>CÔNG DỤNG</strong></p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Làm sạch da hiệu quả.</li><li>Cân bằng độ pH trên da, giúp da không bị khô căng.</li><li>Cung cấp độ ẩm vừa phải cho da luôn mềm mịn.</li><li>Lấy đi lượng dầu thừa trên mặt vào mỗi buổi sáng.</li><li>Giúp da sáng khỏe lên từng ngày.</li><li>Không paraben, không gây kích ứng, sử dụng cho da nhạy cảm an toàn.</li></ul><div><div class=\"title-content\" style=\"font-size: 14px; line-height: 25px; margin-bottom: 10px; padding-bottom: 5px; position: relative; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><b>Hướng dẫn sử dụng</b></div><div class=\"content-guide ck-content\" style=\"line-height: 1.6; color: rgb(0, 0, 0); margin-bottom: 20px; font-family: Roboto, sans-serif;\"><p style=\"margin-block: 0px;\">Lấy một lượng vừa phải Low pH Good Morning Gel Cleanser và massage nhẹ nhàng trên da ướt. Sau đó rửa lại với nước</p></div></div>', 22),
(11, 1, 9, 'Phấn nước Lime V Collagen Ample SPF 50+ - 10', 295000, 0, '1.jpeg', '2.jpeg', '3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÀNH PHẦN</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">-&nbsp;Được chiết xuất từ hoa sen trắng giúp tăng độ đàn hồi cho da, dưỡng da trắng sáng hơn.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">-&nbsp;Phức hợp xanh bao gồm có Hương phong thảo- Bergamot, Lan Nam Phi- Freesia, hoa Cúc – Chamomile, bạc hà, Hương thảo giúp da trong suố, tinh khiết, làm mềm da và tăng khả năng phục hồi sức đề kháng cho da được khỏe mạnh.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Tinh chất dưỡng cao cấp Bifida fermented solution giúp nuôi dưỡng da từ sâu bên trong, hỗ trợ làm mờ các vết thâm do mụn và làm mụn mau lặn.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 574.031px;\"><img src=\"https://cdn.cocolux.com/2021/03/products/1617942714579-phan-nuoc-lime-v-collagen.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">-&nbsp;Với thành phần chứa collagen là chất giàu protein có khả năng hấp thụ độ ẩm từ các tế bào của da và kết nối chúng với nhau, tạo ra sự liên kết chặt chẽ giữa những tế bào, nhờ đó tăng cường độ ẩm, độ đàn hồi cân bằng cho da.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">-&nbsp;Niacinamide là chất dưỡng trắng da an toàn, hiệu quả, giúp da trắng sáng, đều màu hơn.</p>', 5),
(12, 6, 9, 'Cọ trang điểm Lime 101 Cọ trang điểm má - hồng tạo khối', 165000, 0, 'CoHongLime1.jpeg', 'CoHongLime2.jpeg', 'CoHongLime3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Chất liệu:&nbsp;</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Sợi nhân tạo / Đầu bọc nhôm / Tay cầm gỗ</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Công dụng:</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;Sử dụng khi trang điểm cơ bản cho mắt vùng khóe mắt.</p>', 0),
(13, 9, 19, 'Nước Uống DHC Bổ Sung Collagen 50ml x 10 lọ', 1200000, 20, 'nuocuongdhc1.jpeg', 'nuocuongdhc2.jpeg', 'nuocuongdhc3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>CÔNG DỤNG</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Chứa 7000mg collagen chất lượng cao có cấu tạo dạng peptide với kích thước phân tử siêu nhỏ, giúp cơ thể dễ dàng hấp thụ được tốt nhất:</p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Giúp làn da nhanh chóng lấy lại vẻ trẻ trung, tươi mới.</li><li>Duy trì độ ẩm cho làn da mềm mại, tránh bị khô ráp.</li><li>Nuôi dưỡng làn da luôn căng mịn, tránh tình trạng lão hóa da.</li></ul><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">Tăng cường bổ sung thêm hơn 1000mg các siêu dưỡng chất hỗ trợ nâng cao hiệu quả làm đẹp là: 500mg vitamin C, 400mg citrulline, 200mg tiền chất HA.</p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Vitamin C: thúc đẩy quá trình sản xuất collagen tự nhiên dưới da, đồng thời hỗ trợ quá trình chống oxy hóa cho làn da khỏe mạnh.</li><li>Citrulline: hỗ trợ kích thích quá trình sản sinh collagen tự nhiên, giúp gia tăng sự tuần hoàn của cơ thể và nâng cao hiệu suất hấp thụ collagen nước.</li><li>Tiền chất HA: có khối lượng phân tử siêu nhỏ giúp cấp nước, dưỡng ẩm để duy trì sự mềm mịn cho làn da. 1gam tiền chất HA tương đương hấp thu 6 lít nước.</li></ul><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Hương vị hấp dẫn từ chiết xuất nho muscat và mật ong tạo cảm giác ngon miệng mỗi khi sử dụng.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÀNH PHẦN</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Collagen peptide chiết xuất từ da và vảy cá: 7000mg.</li><li>Vitamin C: 500mg.</li><li>Citrulline: 400mg.</li><li>Tiền HA: 200mg.</li></ul><div><div class=\"title-content\" style=\"font-weight: 700; font-size: 14px; line-height: 25px; margin-bottom: 10px; padding-bottom: 5px; position: relative; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng</div><div class=\"content-guide ck-content\" style=\"line-height: 1.6; color: rgb(0, 0, 0); margin-bottom: 20px; font-family: Roboto, sans-serif;\"><ul><li style=\"margin-left: 0px;\">Mỗi ngày uống 1 chai và nên uống vào buổi tối trước khi đi ngủ.</li><li style=\"margin-left: 0px;\">Lắc đều trước khi uống và uống ngay sau khi mở nắp.</li><li style=\"margin-left: 0px;\">Có thể để vào ngăn mát tủ lạnh trước khi uống để tăng hương vị thưởng thức.</li></ul><p style=\"margin-block: 0px; margin-left: 0px;\"><strong>Lưu ý:</strong></p><ul><li style=\"margin-left: 0px;\">Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.</li><li style=\"margin-left: 0px;\">Sản phẩm không dùng cho người mẫn cảm với các thành phần của sản phẩm.&nbsp;</li><li style=\"margin-left: 0px;\">Dừng uống khi phát hiện bất thường.</li><li style=\"margin-left: 0px;\">Không nên làm nóng hoặc đông lạnh chai uống vì nó có thể bị vỡ.</li><li style=\"margin-left: 0px;\">Không sử dụng sản phẩm nếu dị ứng với bất cứ thành phần nào của sản phẩm.</li><li style=\"margin-left: 0px;\">Nếu bạn đang dùng sản phẩm khác, đang điều trị tại bệnh viện hoặc đang mang thai, hãy tham khảo ý kiến bác sĩ trước khi dùng.</li><li style=\"margin-left: 0px;\">Để xa tầm tay trẻ em.</li><li style=\"margin-left: 0px;\">Sử dụng ngay sau khi mở nắp.</li><li style=\"margin-left: 0px;\">Đóng nắp chai ngay sau khi sử dụng.</li><li style=\"margin-left: 0px;\">Vì sản phẩm sử dụng nguyên liệu thiên nhiên không sử dụng chất điều chỉnh màu nên có thể có một chút khác nhau về màu sắc nhưng không ảnh hưởng tới chất lượng sản phẩm.</li></ul></div></div><div><font color=\"#000000\" face=\"Roboto, sans-serif\"><span style=\"font-size: 14px;\"><br></span></font></div>', 3),
(14, 9, 19, 'Viên uống DHC Vitamin C 30 ngày', 95000, 21, 'VitaminC1.jpeg', 'VitaminC2.jpeg', 'VitaminC3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÀNH PHẦN&nbsp;</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Vitamin C, Gelatin, chất tạo màu : caramen, titanium oxi hóa, vitamin B2.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>CÔNG DỤNG</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Vitamin C DHC&nbsp;giúp cho cơ thể khỏe khoắn và làn da trắng sáng, bổ sung vitamin C đầy đủ thường xuyên giúp đánh bay nám tàn nhang, đốm nâu, đồi mồi.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">-&nbsp;Làm giảm quầng thâm trên mắt, xóa mờ vết thâm, tái tạo làn da mới khỏe mạnh và mượt mà hơn. Vitamin c còn giúp thanh lọc cơ thể, làm mát gan đẹp da và sạch mụn đồng thời giúp bạn có một thân hình quyến rũ, gợi cảm.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">-&nbsp;Viên vitamin C của DHC Nhật Bản kích thích sự hình thành của các sợi collagen, tăng tính đàn hồi cho da, nuôi làn da căng bóng săn chắc, trẻ đẹp mãi với thời gian. Ngược lại khi thiếu vitamin c quá trình tổng hợp vitamin gặp nhiều trở ngại, vết thương lâu lành, nám và tàng nhang hoạt động mạnh hơn.<br></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><div class=\"title-content\" style=\"font-weight: 700; font-size: 14px; line-height: 25px; margin-bottom: 10px; padding-bottom: 5px; position: relative; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng</div><div class=\"content-guide ck-content\" style=\"line-height: 1.6; color: rgb(0, 0, 0); margin-bottom: 20px; font-family: Roboto, sans-serif;\"><p style=\"margin-block: 0px;\">- Mỗi ngày 2 viên, sáng 1 viên, trưa hoặc chiều uống 1 viên sau khi ăn, liều dùng hoàn toàn an toàn cho sức khỏe.</p><p style=\"margin-block: 0px;\">- Uống với nước hơi ấm sẽ tốt hơn.</p></div><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p>', 0),
(15, 3, 12, 'Gel Rửa Mặt Cho Da Dầu Hỗn Hợp Bioderma Sébium Gel Moussant 200ml', 340000, 0, 'gelruamatbio1.png', 'gelruamatbio2.png', 'gelruamatbio3.png', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÀNH PHẦN</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br>Aqua/Water/Eau, Sodium Cocoamphoacetate, Sodium Laureth Sulfate (Tạo Bọt/Làm Sạch), Methylpropanediol (Cấp Ẩm/Tăng Khả Năng Thẩm Thấu), Disodium Edta (Chất Ổn Định, Làm Sạch, Tăng Cường Khả Năng Tạo Bọt, Hỗ Trợ Hấp Thu), Mannitol (Giúp Thẩm Thấu)</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>CÔNG DỤNG&nbsp;</strong>&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 692.156px;\"><img src=\"https://cdn.cocolux.com/2021/08/images/products/1629776663381-gel-rua-mat-cho-da-dau-hon-hop-bioderma-sebium-gel-moussant-100ml.png\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Sébium Gel Moussant làm sạch nhẹ nhàng và ngăn chặn hình thành mụn và tình trạng bít lỗ chân lông nhờ hợp chất điều chỉnh lượng bã nhờn Fluidactiv™</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Phức hợp D.A.F (Dermatological Advanced Formulation - Công thức Chăm sóc da Cao cấp) giúp tăng ngưỡng dung nạp của da.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Công thức không chứa xà phòng nhẹ nhàng làm sạch và duy trì rào chắn hydrolipid trên da.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Kẽm gluconate và đồng sulphate giúp điều chỉnh bài tiết bả nhờn và làm sạch lớp biểu bì.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Methylpropandediol giúp cấp ẩm sâu, tăng cường khả năng hấp thu các dưỡng chất khác</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Chiết xuất lá bạch quả (Ginkgo Biloba Leaf) có tác dụng chống oxy hóa và gốc tự do, ngăn ngừa lão hóa hiệu quả.</p>', 0),
(16, 1, 12, 'Son dưỡng môi Bioderma Stick Levres 4g', 130000, 0, 'sonduongbio1.jpeg', 'sonduongbio2.jpeg', 'sonduongbio3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>CÔNG DỤNG&nbsp;</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Với thành phần 100% từ tự nhiên, được làm dưới nền sáp màu trắng tự nhiên, không màu, son dưỡng môi Bioderma phù hợp cho cả nam giới và nữ giới, giúp đôi môi trở nên mềm mại và gợi cảm.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Giúp giữ ẩm thường xuyên, điều trị khô môi do môi trường, khí hậu đặc biệt thích hợp với khí hậu nhiệt đới hanh khô ở nước ta.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Giữ cho da môi luôn mềm mại, bạn sẽ cảm nhận sự mềm mượt ngay sau lần đầu sử dụng son.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><div class=\"title-content\" style=\"font-weight: 700; font-size: 14px; line-height: 25px; margin-bottom: 10px; padding-bottom: 5px; position: relative; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng</div><div class=\"content-guide ck-content\" style=\"line-height: 1.6; color: rgb(0, 0, 0); margin-bottom: 20px; font-family: Roboto, sans-serif;\"><p style=\"margin-block: 0px;\">- Thoa lượng vừa đủ lên môi , dùng ngón tay massage nhẹ nhàng</p><p style=\"margin-block: 0px;\">- Thoa trước khi tô son màu</p><p style=\"margin-block: 0px;\">- Sử dụng thường xuyên cho môi nứt nẻ nhưn không nên sử dụng quá 3 lần / ngày.</p></div>', 2),
(17, 7, 18, 'Nước Hoa Calvin Klein Eternity Air For Women EDP 100ml', 2690000, 0, 'nuochoa_calvin1.jpeg', 'nuochoa_calvin2.jpeg', 'nuochoa_calvin3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÔNG TIN SẢN PHẨM</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br><br><a href=\"https://cocolux.com/thuong-hieu/calvin-klein-i.300\"><i><strong>Calvin Klein</strong></i></a>&nbsp;tiếp tục cho ra mắt dòng nước hoa dành cho phái đẹp mới với tên gọi Eternity Air for Women và được giới thiệu vào năm 2018. Đây là phiên bản mới trong bộ sưu tập nước hoa Eternity<br>&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 486.469px;\"><img src=\"https://cocoshop.vn/uploads/shops/2020_08/nuoc-hoa-ck-eternity-air-for-women-4.jpg\" alt=\"nuoc hoa ck eternity air for women 4\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Nước hoa Eternity Air for Women mang đến một hương thơm tươi mát, là sự kết hợp uyển chuyển, mềm mại giữa hương thơm của hoa oải hương và táo xanh.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Các note hương hoa quả, rong biển tạo nên sự tươi mới, thoáng mát thuần khiết tràn đầy sức sống. Eternity Air for Women này cũng phù hợp cho tất cả mọi hoạt động trong cuộc sống hàng ngày của các cô gái.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Hương đầu: Bưởi, nho đen</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Hương giữa: Hoa mẫu đơn, bạch hoa và quả lê</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Hương cuối: Cây bách hương, long diên hương và xạ hương</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Cocolux có hai dung tích 30ml &amp; 100ml</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 486.469px;\"><img src=\"https://cdn.cocolux.com/2021/09/images/products/1631518687420-nuoc-hoa-calvin-klein-eternity-air-for-women-edp-30ml.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 486.469px;\"><img src=\"https://cdn.cocolux.com/2021/09/images/products/1631518687558-nuoc-hoa-calvin-klein-eternity-air-for-women-edp-100ml.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Nồng độ:&nbsp;&nbsp; &nbsp;Eau de parfum&nbsp;&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Nhóm hương:&nbsp;&nbsp; &nbsp;Hương Hoa cỏ Phương đông - Oriental Floral</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Phong cách:&nbsp;&nbsp; &nbsp;Bí ẩn, quyến rũ, tinh tế</p>', 4),
(18, 1, 10, 'Mascara Maybelline The Magnum Big Shot Waterproof', 188000, 30, 'mascara_maybelline1.jpeg', 'mascara_maybelline2.jpeg', 'mascara_maybelline3.jpeg', '<div class=\"title-content\" style=\"font-weight: 700; font-size: 14px; line-height: 25px; margin-bottom: 10px; padding-bottom: 5px; position: relative; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng</div><div class=\"content-guide ck-content\" style=\"line-height: 1.6; color: rgb(0, 0, 0); margin-bottom: 20px; font-family: Roboto, sans-serif;\"><p style=\"margin-block: 0px;\">Bấm cong mi trước, sau đó dùng đầu chải mi theo hình ziczac từ gốc đến ngọn mi. Sợi mi dày lên được gấp 10 lần.</p></div>', 0),
(19, 9, 19, 'Viên uống hỗ trợ giảm cân bổ sung dầu dừa DHC 30 ngày', 650000, 30, 'dauduadhc1.png', 'dauduadhc2.png', 'dauduadhc3.png', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÀNH PHẦN</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Cứ 2 viên uống giảm cân DHC có chứa: dầu dừa: 200mg; bột húng chanh Ấn Độ (Coleus forskohlii extract): 170mg; L-valin: 10mg; L-leucin: 10mg; L-isoleucin: 10mg; vitamin B1: 1mg; vitamin B2: 1mg;&nbsp;<a href=\"https://cocolux.com/danh-muc/vitamin-vien-cap-nuoc-trang-da-i.60\"><i><strong>vitamin</strong></i></a>&nbsp;B6: 1mg.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Phụ liệu: ester glycerin acid béo, gelatin, glycerol vừa đủ 2 viên</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 574.031px;\"><img src=\"https://cdn.cocolux.com/2021/01/products/1611631007699-vien-uong-ho-tro-giam-can-bo-sung-dau-dua-dhc-ct-2.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>CÔNG DỤNG</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Thúc đẩy cơ thể thực hiện quá trình đốt cháy mỡ thừa mạnh mẽ, giảm tích trữ mỡ thừa trên cơ thể.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Viên uống giảm cân DHC Forskohlii Soft Capsule làm giảm cảm giác thèm ăn của cơ thể, giảm hấp thu chất béo.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Ngăn chặn quá trình chảy xệ trên bề mặt da, duy trì làn da mềm mại, mịn màng.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 574.031px;\"><img src=\"https://cdn.cocolux.com/2021/04/products/1618278458361-vien-uongt-giam-can-dhc.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><div><br></div><div><div class=\"title-content\" style=\"font-weight: 700; font-size: 14px; line-height: 25px; margin-bottom: 10px; padding-bottom: 5px; position: relative; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng</div><div class=\"content-guide ck-content\" style=\"line-height: 1.6; color: rgb(0, 0, 0); margin-bottom: 20px; font-family: Roboto, sans-serif;\"><p style=\"margin-block: 0px;\">Uống 1-2v/ngày (uống với nước hoặc nước ấm). Không nhai viên</p></div></div>', 0);
INSERT INTO `sanpham` (`id`, `id_danhmuc`, `masx`, `ten`, `gia`, `giakm`, `anh1`, `anh2`, `anh3`, `chitiet`, `luotxem`) VALUES
(20, 3, 12, 'Nước tẩy trang Bioderma Sébium H2O cho da dầu da hỗn hợp 500ml', 495000, 20, 'nuoc-tay-trang-bioderma 1.jpeg', 'nuoc-tay-trang-bioderma-2.jpeg', 'nuoc-tay-trang-bioderma 3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Công dụng</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Phù hợp với mọi loại da và dung nạp tốt.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Làm sạch, loại bỏ lớp trang điểm cho mặt và mắt.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Làm dịu và xua tan cảm giác khó chịu đối với da đang kích ứng.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Duy trì độ cân bằng của làn da, cung cấp đủ độ ẩm cho da.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Mang lại cảm giác sảng khoái &amp; tươi mới tức thì.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Không cần rửa lại với nước.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><div class=\"title-content\" style=\"font-weight: 700; font-size: 14px; line-height: 25px; margin-bottom: 10px; padding-bottom: 5px; position: relative; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng</div><div class=\"content-guide ck-content\" style=\"line-height: 1.6; color: rgb(0, 0, 0); margin-bottom: 20px; font-family: Roboto, sans-serif;\"><p style=\"margin-block: 0px;\">Bước 1: Thấm 1 lượng sản phẩm&nbsp;ra bông tẩy trang</p><p style=\"margin-block: 0px;\">Bước 2: Lau bông&nbsp;tẩy trang&nbsp;lên mặt để loại bỏ bụi bẩn, dầu nhờn.</p><p style=\"margin-block: 0px;\">Bước 3: Rửa mặt với&nbsp;sữa rửa mặt&nbsp;(áp dụng cho chu trình dưỡng da vào cuối ngày).</p><p style=\"margin-block: 0px;\">Bước 4: Thực hiện các bước dưỡng da còn lại trong chu trình chăm sóc da của bạn.</p></div>', 4),
(21, 1, 13, 'Son bóng Black Rouge', 150000, 15, 'sonbong_blackrouge1.jpeg', 'sonbong_blackrouge2.jpeg', 'sonbong_blackrouge3.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Đúng như tinh thần mùa lễ hội, lấp lánh hơn, là những gì&nbsp;<a href=\"https://cocolux.com/thuong-hieu/black-rouge-i.290\"><i><strong>Black Rouge</strong></i></a>&nbsp;muốn đem đến cho các nàng Roubae với BST phiên bản giới hạn siêu đặc biệt ???????????????????? ???????????????????? ???????????? ???????????????????????? ????????????????????????????</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 577.141px;\"><img src=\"https://cdn.cocolux.com/2021/12/images/products/1639445557182-set-son-black-rouge-red-fiesta-edition.png\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 574.719px;\"><img src=\"https://cdn.cocolux.com/2021/12/images/products/1639445882681-set-son-black-rouge-red-fiesta-edition-3.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 569.844px;\"><img src=\"https://cdn.cocolux.com/2021/12/images/products/1639445882687-set-son-black-rouge-red-fiesta-edition-2.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 567.422px;\"><img src=\"https://cdn.cocolux.com/2021/12/images/products/1639445882692-set-son-black-rouge-red-fiesta-edition-1.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Bộ kit mang đến cho bạn sự quyến rũ tuyệt đối:</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">– FI01 Hiflex: Velvet Mini</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">– FI02 Step By Tension: Glossy Mini</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">– FI03 Maximum Twinkle: Jelly Glitter</p>', 6),
(22, 7, 18, 'Nước hoa Calvin Klein Eternity Flame for women EDP 50ml', 2070000, 50, 'Nước hoa Calvin Klein 1.jpeg', 'Nước hoa Calvin Klein 2.jpeg', 'Nước hoa Calvin Klein 3.jpeg', '<div class=\"title-content\" style=\"font-weight: 700; font-size: 14px; line-height: 25px; margin-bottom: 10px; padding-bottom: 5px; position: relative; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng</div><div class=\"content-guide ck-content\" style=\"line-height: 1.6; color: rgb(0, 0, 0); margin-bottom: 20px; font-family: Roboto, sans-serif;\"><p style=\"margin-block: 0px;\">- Xịt&nbsp;nước hoa&nbsp;sau khi tắm xong khi đó làn da sạch và giàu độ ẩm giúp các phân tử mùi hương quyện chặt lên da<br>- Nên xịt nước hoa bên trong khuỷu tay, gáy, sau tai, cổ tay, sau đầu gối<br>- Xịt lên những vị trí có mạch đập giúp tỏa hương mỗi cử động&nbsp;<br>- Có thể xịt lên lòng bàn tay và vuốt lên tóc và sau lưng</p><p style=\"margin-block: 0px;\">Lưu ý dùng nước hoa đúng cách:</p><p style=\"margin-block: 0px;\">- Chỉ xịt vào vùng da ở điểm mạch như cổ, cổ tay trong, …<br>- Nên xịt nước hoa sau khi tắm và đã lau khô người.<br>- Không chà nước hoa trên da sau khi xịt xong.<br>- Không xịt nước hoa vào không khí phía trước mặt rồi bước vào vì rất lãng phí.</p></div>', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `anh`) VALUES
(1, 'la-roche posay', 'la-roche-posay.jpg'),
(2, 'nuochoa', 'nuoc-hoa-nu-huong-hoa-hong.jpeg'),
(5, 'anhbia', 'anh-bia-my-pham-dep.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(55) NOT NULL,
  `matkhau` varchar(55) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sdt` text NOT NULL,
  `anh` text NOT NULL,
  `phanquyen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `taikhoan`, `matkhau`, `hoten`, `sdt`, `anh`, `phanquyen`) VALUES
(1, 'yenphung123123123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Yến Phùng', '092222233', '1635563498695-combo-tay-te-bao-chet-cocoon-queen-chat-4-600x600.jpeg', 0),
(5, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Yến', '0922888888', '', 1),
(7, 'haiyenvtk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Phùng Thị Hải Yến', '0123456789', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tlbinhluan`
--

CREATE TABLE `tlbinhluan` (
  `id` int(11) NOT NULL,
  `id_binhluan` int(11) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tlbinhluan`
--

INSERT INTO `tlbinhluan` (`id`, `id_binhluan`, `noidung`) VALUES
(10, 13, 'Shop cảm ơn bạn đã quan tâm đến sản phẩm của shop ạ'),
(11, 15, 'Dạ bạn muốn nhận hàng ở đâu ạ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `diachi` text NOT NULL,
  `slogan` text NOT NULL,
  `sdt` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `website`
--

INSERT INTO `website` (`id`, `logo`, `diachi`, `slogan`, `sdt`, `email`) VALUES
(1, 'cosmetic-logo.jpg', 'Trường Đại Học Công Nghiệp Hà Nội', 'Yêu cái đẹp là thưởng thức. Tạo ra cái đẹp là nghệ thuật.', '0345042114', 'yenphungvtk2000@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id sản phẩm` (`id_sanpham`),
  ADD KEY `id tài khoản` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_takhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`masx`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id danh mục` (`id_danhmuc`),
  ADD KEY `mã sản xuất` (`masx`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tlbinhluan`
--
ALTER TABLE `tlbinhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id bình luận` (`id_binhluan`);

--
-- Chỉ mục cho bảng `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  MODIFY `masx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tlbinhluan`
--
ALTER TABLE `tlbinhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `id sản phẩm` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `id tài khoản` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `id danh mục` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `mã sản xuất` FOREIGN KEY (`masx`) REFERENCES `hangsx` (`masx`);

--
-- Các ràng buộc cho bảng `tlbinhluan`
--
ALTER TABLE `tlbinhluan`
  ADD CONSTRAINT `id bình luận` FOREIGN KEY (`id_binhluan`) REFERENCES `binhluan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
