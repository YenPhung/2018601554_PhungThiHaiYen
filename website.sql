-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 17, 2022 lúc 12:44 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

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
(4, 1, 3, 'a');

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
(2, 4, 1, 178200, 7, 712800, '1635562656093-kem-lot-maybelline-fit-me-kiem-dau-4-600x600.jpeg', 2, 'khu 2 hoang cuong thanh ba phu tho', '02-04-2022 12:35:52'),
(3, 3, 1, 2030000, 6, 2030000, '1612489677590-nuoc-hoa-nu-marc-jacobs-decadence-50ml-1-600x600.jpeg', 2, 'ok', '02-04-2022 12:50:39'),
(9, 5, 1, 190000, 2, 380000, '1635563498695-combo-tay-te-bao-chet-cocoon-queen-chat-4-600x600.jpeg', 2, 'ok', '09-04-2022 21:26:19'),
(10, 6, 1, 608000, 1, 608000, '1642647638246-xit-khoa-lop-trang-diem-mac-co-nhu-pinklite-100ml-600x600.jpeg', 2, 'ok en', '09-04-2022 21:13:44'),
(11, 3, 1, 2030000, 4, 4060000, '1612489677590-nuoc-hoa-nu-marc-jacobs-decadence-50ml-1-600x600.jpeg', 1, 'ok', '13-04-2022 19:44:38'),
(12, 4, 1, 1782000, 5, 8910000, '1635562656093-kem-lot-maybelline-fit-me-kiem-dau-4-600x600.jpeg', 1, 'ok', '13-04-2022 19:44:38'),
(13, 3, 1, 2030000, 1, 2030000, '1612489677590-nuoc-hoa-nu-marc-jacobs-decadence-50ml-1-600x600.jpeg', 0, NULL, NULL);

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
(1, 'Neutrogena ');

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
(3, 7, 1, 'Nước Hoa Nữ Marc Jacobs Decadence - Eau De Parfum 50ML', 2900000, 30, '1612489677590-nuoc-hoa-nu-marc-jacobs-decadence-50ml-1-600x600.jpeg', '1612489679149-nuoc-hoa-nu-marc-jacobs-decadence-50ml-3-600x600.jpeg', '1642123850528-2-600x600.png', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Giới thiệu sản phẩm Nước hoa nữ Marc Jacobs Divine Decadence EDP 50ml</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Thương hiệu Marc Jacobs&nbsp;được thành lập năm 2001 với mục tiêu mang đến cho người tiêu dùng những mặt hàng chất lượng với giá cả hợp lý. Sản phẩm của Marc Jacobs bao gồm quần áo, giày da, túi xách, mắt kính, nước hoa dành cho cả nam, nữ và quần áo trẻ em. Hiện tại những sản phẩm của Marc Jacobs hiện diện trong hơn 200 cửa hàng bán lẻ ở 80 quốc gia trên toàn thế giới.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image-style-align-center image_resized\" style=\"margin: 1em auto; display: table; clear: both; text-align: center; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 600.737px;\"><img src=\"https://cdn.cocolux.com/2021/02/products/1612489623064-nuoc-hoa-nu-marc-jacobs-decadence-50ml-2.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Nước hoa nữ Marc Jacobs Divine Decadence EDP&nbsp;mang đến hương thơm gợi cảm, quyến rũ, nhấn mạnh phong cách nữ tính sang trọng và đẳng cấp của cô gái hiện đại. Divine Decadence là một phiên bản mới kế thừa chiếc túi xách da trăn quyền năng, đầy sang trọng. Hương đầu mở ra với hương thơm rượu sâm banh lấp lánh, cam bergamot và hoa cam kem. Hương giữa phong phú bao gồm cây sơn, hoa tú cầu và hoa kim ngân mang lại sự sang trọng, nữ tính. Hương cuối là sự kết hợp hài hòa giữa hổ phách, nghệ tây và lan nhiệt đới.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image-style-align-center image_resized\" style=\"margin: 1em auto; display: table; clear: both; text-align: center; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 651.888px;\"><img src=\"https://cdn.cocolux.com/2021/02/products/1612489630177-nuoc-hoa-nu-marc-jacobs-decadence-50ml-3.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br>&nbsp; &nbsp;+ Hương đầu: Hoa cam, Rượu sâm panh, Cam Bergamot</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp; &nbsp;+ Hương giữa: Hoa kim ngân, Hoa sơn chi, Hoa tú cầu</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp; &nbsp;+ Hương cuối: Hổ phách, Nghệ tây, Hương Va ni</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image-style-align-center image_resized\" style=\"margin: 1em auto; display: table; clear: both; text-align: center; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 608.463px;\"><img src=\"https://cdn.cocolux.com/2021/02/products/1612489639324-nuoc-hoa-nu-marc-jacobs-decadence-50ml-1.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Thương hiệu:</strong>&nbsp;Marc Jacobs<br><strong>Xuất xứ:&nbsp;</strong>Mỹ<br><strong>Dung tích:&nbsp;</strong>50ml<br><strong>CocoLux</strong></p>', 859),
(4, 1, 1, 'Kem Lót Maybelline Fit Me Kiềm Dầu', 1980000, 10, '1635562656093-kem-lot-maybelline-fit-me-kiem-dau-4-600x600.jpeg', '1635562639227-kem-lot-maybelline-fit-me-kiem-dau-600x600.jpeg', '1612489679149-nuoc-hoa-nu-marc-jacobs-decadence-50ml-3-600x600.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÔNG TIN SẢN PHẨM</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><a href=\"https://cocolux.com/danh-muc/kem-lot-makeup-primer-i.9\"><i><strong>Kem Lót Trang Điểm</strong></i></a>&nbsp;Maybelline Fit Me Matte+Poreless Kiềm Dầu Che Phủ Lỗ Chân Lông SPF20 30ml<br><br>Fit Me Matte + Poreless Primer SPF 20 với thành phần tích hợp đất sét khoáng giúp kiềm dầu, ngăn nền xuống tông trong suốt 16H. Chất kem dạng sữa dễ tán, đem lại hiệu ứng làm mềm da, làm mờ lỗ chân lông ngay khi sử dụng. Ngoài ra, sản phẩm có thêm SPF 20 giúp bảo vệ da khỏi tác hại của ánh nắng mặt trời. Sản phẩm được khuyên dùng trước bước đánh kem nền để đem lại lớp nền mịn lì, không bóng dầu, không xuống tông suốt ngày dài.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 628.912px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635562930286-kem-lot-maybelline-fit-me-kiem-dau-1.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><div><br></div>', 175),
(5, 3, 1, 'Combo Tẩy Tế Bào Chết Cocoon \"Queen Chất\"', 190000, 0, '1635563498695-combo-tay-te-bao-chet-cocoon-queen-chat-4-600x600.jpeg', '1635563494069-combo-tay-te-bao-chet-cocoon-queen-chat-2-600x600.jpeg', '1635563487004-combo-tay-te-bao-chet-cocoon-queen-chat-5-600x600.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÔNG TIN SẢN PHẨM</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Nhịp sống đã thật sự trở lại, khi giờ đây chúng ta có thể cùng bạn bè ăn uống và ngồi cà phê tán gẫu ở những quán quen hay một góc đường nào đó mà mình yêu thích. Và làn da cơ thể cùng đôi môi của bạn cũng có một cuộc hẹn cà phê với&nbsp;<a href=\"https://cocolux.com/thuong-hieu/cocoon-i.125\"><i><strong>Cocoon</strong></i></a>&nbsp;và Suboi đó.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 631.45px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635563800747-combo-tay-te-bao-chet-cocoon-queen-chat.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Chúng tôi đã chuẩn bị sẵn những “tách” cà phê thơm lựng cho buổi hẹn đặc biệt ấy. Nhờ sự kết hợp hoàn hảo của những hạt cà phê Đắk Lắk nguyên chất xay nhuyễn cùng bơ ca cao Tiền Giang, các sản phẩm làm sạch da chết trong bộ sưu tập giới hạn “Queen” Chất sẽ giúp bạn loại bỏ nhanh chóng những lớp tế bào da chết già cỗi để đánh thức một làn da tươi mới, tràn đầy năng lượng ngay trong lần sử dụng đầu tiên.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 628.912px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635563811465-combo-tay-te-bao-chet-cocoon-queen-chat-2.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">“Queen” Chất bởi Cocoon x Suboi là combo giới hạn gồm hai sản phẩm:</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Cà phê Đắk Lắk làm sạch da chết cơ thể</strong></p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Làm sạch da chết toàn thân</li><li>Mang lại làn da mịn màng ngay sau lần đầu sử dụng</li><li>Giúp da sáng mịn, đều màu</li></ul><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 598.188px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635563822558-combo-tay-te-bao-chet-cocoon-queen-chat-4.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Cà phê Đắk Lắk làm sạch da chết môi</strong></p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Làm bong những tế bào chết ở môi</li><li>Mang lại làn môi ẩm mềm và mịn màng</li></ul><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 580.3px;\"><img src=\"https://cdn.cocolux.com/2021/10/images/products/1635563836664-combo-tay-te-bao-chet-cocoon-queen-chat-3.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Thương hiệu:&nbsp;</strong>Cocoon</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Xuất xứ:</strong>&nbsp;Việt Nam</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><a href=\"https://cocolux.com/\"><strong>Cocolux</strong></a></p>', 21),
(6, 1, 1, 'Xịt Khóa Lớp Trang Điểm MAC Có Nhũ Pinklite 100ml', 760000, 20, '1642647638246-xit-khoa-lop-trang-diem-mac-co-nhu-pinklite-100ml-600x600.jpeg', '1642647642771-xit-khoa-lop-trang-diem-mac-co-nhu-pinklite-100ml-1-600x600.jpeg', '1642647642771-xit-khoa-lop-trang-diem-mac-co-nhu-pinklite-100ml-1-600x600.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÔNG TIN SẢN PHẨM</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Xịt Khoáng Khóa Lớp Trang Điểm Có Nhũ MAC Prep + Prime Face Fix + (Shimmer) 100ml là sản phẩm của thương hiệu MAC của Mỹ được ưa chuộng cực kì bởi khả năng cấp ẩm và giữ lớp trang điểm bền màu, mướt mát. Nay fan hâm mộ yêu thích của xịt khoáng Fix + giờ đây đã có thêm một sự lựa chọn mới với Fix + (Shimmer) có kết cấu thêm ánh nhũ ngọc trai cho làn da tỏa sáng. Công thức này vẫn có tất cả những công dụng của phiên bản gốc như dưỡng ẩm, làm dịu da và định hình lớp trang điểm, nhưng với phiên bản này, Xịt khoáng khoá lớp trang điểm MAC Prep + Prime Face Fix + (Shimmer) 100ml có thêm tính năng cải thiện thời gian trang điểm lâu trôi và bền màu đến 12h đồng thời bổ sung thêm tinh chất ngọc trai cho hiệu ứng làn da trông sáng khỏe, căng bóng và rạng rỡ hơn.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 604.088px;\"><img src=\"https://cdn.cocolux.com/2022/01/images/products/1642647675429-xit-khoa-lop-trang-diem-mac-co-nhu-pinklite-100ml.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Loại da phù hợp:&nbsp;</strong>Phù hợp cho mọi loại da</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Xịt Khoáng Khóa Lớp Trang Điểm Có Nhũ MAC Prep + Prime Face Fix + (Shimmer) 100ml giúp tăng độ bóng khỏe và độ sáng cho làn da luôn rạng rỡ và tươi mới.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Tăng thời gian trang điểm, giúp lớp trang điểm lâu xuống màu và bền màu lên đến 12h.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Có 2 màu sắc ánh vàng hoặc ánh hồng cho bạn lựa chọn tùy theo sở thích và tông màu da.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Kết cấu mỏng nhẹ như phủ sương thẩm thấu nhanh vào da với tinh chất ngọc trai thêm độ nhũ và bắt sáng cho làn da luôn rạng rỡ, căng bóng.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Cung cấp độ ẩm tức thời cho da bởi thành phần chứa nhiều vitamin và khoáng chất.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Làm dịu và làm tươi mới làn da với hỗn hợp trà xanh, hoa cúc và dưa leo.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Định hình lớp trang điểm và giữ lớp trang điểm như mới, lâu trôi, lâu xuống màu.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Đa công dụng, dùng để cố định lớp trang điểm hoặc dùng như xịt khoáng cấp ẩm tức thì cho da khô hay làm dịu làn da mệt mỏi.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Đã được bác sĩ da liễu và bác sỹ nhãn khoa thử nghiệm, không gây mụn.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">- Phù hợp với mọi loại da và tông da.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 606.737px;\"><img src=\"https://cdn.cocolux.com/2022/01/images/products/1642647968885-xit-khoa-lop-trang-diem-mac-co-nhu-pinklite-100ml-1.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br><strong>CÔNG DỤNG</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li>Giúp cấp ẩm cho da</li><li>Giữ lớp trang điểm bền màu tới 12 giờ</li><li>Cố định lớp tranh điểm không trôi hay xuống màu</li><li>Giúp da bóng khoẻ với thành phần ngọc trai</li><li>Giúp làm dịu và tươi mới làn da</li><li>Kết cấu mỏng nhẹ như sương, thấm nhanh vào da</li></ul><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÀNH PHẦN</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Water, Glycerin, Butylene Glycol, Tocopheryl Acetate, Caffeine, Camellia Sinensis (Green Tea) Leaf Extract, Chamomilla Recutita (Matricaria) Extract, Cucumis Sativus (Cucumber) Fruit Extract, Arginine, Ppg-26-Buteth-26, Peg-40 Hydrogenated Castor Oil, Silica, Panthenol, Fragrance, Disodium EDTA, Phenoxyethanol, Sodium Dehydroacetate. May Contain (+/-): Mica, Titanium Dioxide (Ci 77891), Iron Oxides (Ci 77491, Ci 77492, Ci 77499).</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Dung tích:&nbsp;</strong>100ml</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Xuất xứ:&nbsp;</strong>Mỹ</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Thương hiệu:&nbsp;</strong>MAC</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>Cocolux</strong></p>', 40),
(8, 6, 1, 'Bông Tẩy Trang COTONEVE Maxi Tẩy Tế Bào Chết 50 miếng', 89000, 0, '1637547894452-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi-50-mieng-600x600.jpeg', '1637548290205-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi-600x600.jpeg', '1637547894452-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi-50-mieng-600x600.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THÔNG TIN SẢN PHẨM</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\"><a href=\"https://cocolux.com/danh-muc/bong-tay-trang-i.54\"><i><strong>Bông tẩy trang</strong></i></a>&nbsp;COTONEVE maxi tẩy tế bào chết (Hạt 3D nổi thông minh) (50 miếng)&nbsp;được chế biến, sản xuất và đóng gói tại Ý. Nguyên liệu bông của Cotoneve được lựa chọn kỹ càng từ các nhà cung cấp đủ điều kiện và được phê duyệt trong hệ thống quản lý chất lượng cũng như tuân thủ các quy định nghiêm ngặt nhất.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 600.737px;\"><img src=\"https://cdn.cocolux.com/2021/11/images/products/1637548148341-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi-50-mieng.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\"><strong>CÔNG DỤNG</strong></p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">-&nbsp;Với bề mặt được xử lý đặc biệt cùng các hạt 3D thông minh, Bông Maxi tẩy da chết giúp loại bỏ lớp&nbsp;<a href=\"https://cocolux.com/danh-muc/trang-diem-makeup-i.1\"><i><strong>trang điểm</strong></i></a>&nbsp;sâu bằng cách lấy đi các tế bào chết nhẹ nhàng, giúp đẩy nhanh quá trình tái tạo da&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">-&nbsp;Nhờ một mặt bông được xử lý đặc biệt với các hạt 3D thông minh, không bị bông xù, mặt bông tẩy tế bào chết giúp loại bỏ lớp trang điểm sâu bằng cách tẩy tế bào chết nhẹ nhàng, cho làn da rạng rỡ, tươi trẻ hơn.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">-&nbsp;Mặt bông còn lại có khả năng thấm hút cao, giúp thẩm thấu tốt các loại kem và dung dịch dưỡng lên da.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 557.213px;\"><img src=\"https://cdn.cocolux.com/2021/11/images/products/1637548282518-bong-tay-trang-tay-te-bao-chet-cotoneve-maxi.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); margin-left: 0px;\">&nbsp;</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>TRỌNG LƯỢNG:</strong>&nbsp;100 MIẾNG</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>XUẤT XỨ:</strong>&nbsp;ITALIA</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><strong>THƯƠNG HIỆU:&nbsp;</strong>Cotoneve</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><a href=\"https://cocolux.com/\"><i><strong>MỸ PHẨM COCOLUX</strong></i></a></p>', 84),
(9, 3, 1, 'Kem Dưỡng Ẩm Neutrogena Hydro Boost Water Gel 50ml', 295000, 23, 'anh7.jpeg', 'anh8.jpeg', 'anh9.jpeg', '<p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><a href=\"https://cocolux.com/danh-muc/kem-duong-facial-cream-i.29\"><i><strong>Kem Dưỡng Ẩm</strong></i></a>&nbsp;Neutrogena Hydro Boost Water Gel là dạng gel, không đặc như kem nhưng cũng không lỏng như lotion, có mùi thơm đặc trưng của mỹ phẩm drugstore, rất dễ chịu, chất gel có màu xanh nhìn mát mắt lắm cơ hihi. Vì là dạng gel có chứa nhiều nước nên thấm rất nhanh, không gây nhờn rít. Sẽ là 1 điểm cộng cho các cô nàng bận rộn, cần kem dưỡng ẩm thấm nhanh để còn make up.</p><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><figure class=\"image image_resized\" style=\"display: table; clear: both; text-align: center; margin: 1em auto; box-sizing: border-box; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); width: 577.141px;\"><img src=\"https://cdn.cocolux.com/2021/12/images/products/1641979167036-kem-duong-am-neutrogena-hydro-boost-water-gel-50ml.jpeg\" style=\"display: block; margin: 0px auto; width: 800px; max-width: 100%; min-width: 50px;\"></figure><p style=\"margin-block: 0px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;</p><ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><li><a href=\"https://cocolux.com/thuong-hieu/neutrogena-i.286\"><i><strong>Neutrogena</strong></i></a>&nbsp;Hydro Boost Water Gel có khá nhiều chất đều là silicone (Dimethicone, Cyclohexasiloxane…). Do đó khi apply cảm giác trên da sẽ là rất mướt mát, trơn mượt, bề mặt da phẳng hơn hẳn, giống như lúc mình dùng dầu xả cho tóc vậy đó.</li></ul>', 5);

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
(1, 'abc.php', '1647570567496-ảnh-slider-web.jpeg'),
(2, 'asdasd', '1644287220046-1644203042235-banner-cocolux-7.jpeg');

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
(1, 'yenphung123123123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Yến Phùng 23', '092222233', '1635563498695-combo-tay-te-bao-chet-cocoon-queen-chat-4-600x600.jpeg', 0),
(5, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Yến', '0922888888', '', 1);

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
(1, 4, 'cảm ơn bạn ');

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
(1, 'logo2.jpg', 'Sông Công Thái Nguyên', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam perspiciatis sapiente reiciendis quas. Alias dolorem ut saepe dolorum amet error dolor nam, corrupti at molestiae eum delectus veritatis unde esse!', '0966.22.4444', 'nguyenvana@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  MODIFY `masx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tlbinhluan`
--
ALTER TABLE `tlbinhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
