-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2023 lúc 08:44 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ma_ctdh` int(10) NOT NULL,
  `so_luong` int(50) NOT NULL,
  `thanh_tien` double NOT NULL,
  `trang_thai` int(10) NOT NULL,
  `ma_cthh` int(10) NOT NULL,
  `ma_dh` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ma_ctdh`, `so_luong`, `thanh_tien`, `trang_thai`, `ma_cthh`, `ma_dh`) VALUES
(119, 3, 1175000, 2, 321, 128),
(128, 1, 2400000, 2, 323, 138),
(129, 2, 800000, 2, 321, 138),
(135, 2, 575000, 0, 319, 143),
(136, 1, 455000, 0, 325, 143),
(137, 1, 22950000, 2, 337, 144);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hang_hoa`
--

CREATE TABLE `chi_tiet_hang_hoa` (
  `ma_cthh` int(11) NOT NULL,
  `don_gia` double(10,2) NOT NULL,
  `giam_gia` double(10,2) DEFAULT NULL,
  `so_luot_ban` int(50) NOT NULL,
  `so_luong` int(50) NOT NULL,
  `ma_kc` int(10) DEFAULT NULL,
  `ma_ms` int(10) DEFAULT NULL,
  `ma_hh` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hang_hoa`
--

INSERT INTO `chi_tiet_hang_hoa` (`ma_cthh`, `don_gia`, `giam_gia`, `so_luot_ban`, `so_luong`, `ma_kc`, `ma_ms`, `ma_hh`) VALUES
(315, 300000.00, 2000.00, 0, 0, 0, 0, 236),
(317, 300000.00, 20000.00, 0, 3, 0, 0, 237),
(319, 300000.00, 0.00, 1, 10, 0, 0, 240),
(320, 500000.00, 0.00, 0, 12, 0, 0, 239),
(321, 400000.00, 0.00, 2, 121, 0, 0, 241),
(322, 5000000.00, 200000.00, 0, 20, 0, 34, 242),
(323, 2500000.00, 100000.00, 1, 19, 0, 35, 243),
(324, 500000.00, 20000.00, 0, 10, 0, 34, 243),
(325, 500000.00, 20000.00, 1, 1, 0, 35, 242),
(327, 20000000.00, 200000.00, 0, 10, 0, 37, 245),
(328, 22000000.00, 2000000.00, 0, 5, 45, 0, 246),
(329, 15000000.00, 120000.00, 0, 56, 0, 37, 247),
(330, 18000000.00, 200000.00, 0, 12, 0, 37, 248),
(331, 11000000.00, 0.00, 0, 23, 0, 36, 249),
(332, 20000000.00, 500000.00, 0, 34, 0, 36, 250),
(333, 16000000.00, 250000.00, 0, 20, 0, 37, 251),
(334, 14000000.00, 500000.00, 0, 12, 0, 36, 252),
(335, 25000000.00, 2000000.00, 0, 20, 0, 37, 253),
(336, 16000000.00, 2000000.00, 0, 25, 0, 37, 254),
(337, 25000000.00, 2000000.00, 1, 20, 0, 37, 255),
(338, 25000000.00, 2000000.00, 0, 20, 0, 36, 256),
(339, 25000000.00, 2000000.00, 0, 12, 0, 36, 257),
(340, 20000000.00, 2500000.00, 0, 13, 0, 37, 257),
(341, 22000000.00, 2000000.00, 0, 20, 0, 37, 258),
(342, 500000.00, 20000.00, 0, 12, 48, 39, 259),
(343, 480000.00, 0.00, 0, 121, 49, 39, 259),
(344, 500000.00, 20000.00, 0, 5, 49, 40, 260),
(345, 500000.00, 20000.00, 0, 3, 50, 40, 260),
(346, 400000.00, 20000.00, 0, 10, 51, 40, 260),
(347, 400000.00, 0.00, 0, 0, 48, 39, 261),
(348, 300000.00, 0.00, 0, 123, 48, 39, 262),
(349, 300000.00, 0.00, 0, 12, 51, 39, 262),
(350, 600000.00, 0.00, 0, 500, 48, 0, 263),
(351, 500000.00, 0.00, 0, 122, 49, 0, 263),
(352, 500000.00, 20000.00, 0, 5, 48, 0, 264);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `ma_dg` int(10) NOT NULL,
  `noi_dung` text NOT NULL,
  `hinh_anh_dg` varchar(255) DEFAULT NULL,
  `ngay_dg` date NOT NULL,
  `trang_thai` bit(1) NOT NULL,
  `ma_ctdh` int(10) NOT NULL,
  `ma_kh` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`ma_dg`, `noi_dung`, `hinh_anh_dg`, `ngay_dg`, `trang_thai`, `ma_ctdh`, `ma_kh`) VALUES
(51, 'Giày đẹp nhé ', '', '2023-12-10', b'1', 119, 33),
(52, 'Áo xấu', '', '2023-12-10', b'1', 119, 33),
(53, 'adasdasdasd', '', '2023-12-13', b'1', 129, 33),
(54, 'Máy tính này đẹp đấy', '', '2023-12-13', b'1', 137, 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_dh` int(10) NOT NULL,
  `tong_tien` double(10,2) NOT NULL,
  `ngay_dat` date NOT NULL,
  `ma_kh` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_dh`, `tong_tien`, `ngay_dat`, `ma_kh`) VALUES
(130, 455000.00, '2023-12-10', 33),
(131, 4775000.00, '2023-12-10', 33),
(132, 480000.00, '2023-12-10', 33),
(133, 300000.00, '2023-12-10', 33),
(134, 2400000.00, '2023-12-10', 33),
(135, 4800000.00, '2023-12-10', 33),
(136, 300000.00, '2023-12-10', 33),
(137, 2400000.00, '2023-12-10', 33),
(138, 3200000.00, '2023-12-13', 33),
(139, 935000.00, '2023-12-13', 33),
(140, 1700000.00, '2023-12-13', 33),
(141, 935000.00, '2023-12-13', 33),
(142, 14400000.00, '2023-12-13', 33),
(143, 1055000.00, '2023-12-13', 33),
(144, 22950000.00, '2023-12-13', 38),
(145, 2830000.00, '2023-12-13', 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(10) NOT NULL,
  `ten_hh` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
  `so_luot_xem` int(50) DEFAULT NULL,
  `trang_thai` bit(1) NOT NULL,
  `ma_loai` int(10) NOT NULL,
  `ma_shop` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `mo_ta`, `so_luot_xem`, `trang_thai`, `ma_loai`, `ma_shop`) VALUES
(239, 'Áo Polo Nam ', 'Áo Nam ', 1, b'0', 7, 35),
(240, 'Áo Polo Nam ', 'Áo Cho Nam ', 92, b'1', 10, 35),
(241, 'Giày Nam Nữ Giá Rẻ  ', 'Giày Nam Nữ Giá Rẻ ', 66, b'1', 10, 35),
(242, 'Đồng hồ nam ', 'Đồng hồ dành cho nam ', 67, b'1', 9, 35),
(243, 'Đồng hồ nam màu vàng ', 'Đồng hồ dành cho nam ', 123, b'1', 9, 35),
(245, 'Laptop Dell Inspiron 16 Plus 7620 - Intel Core i7 12700H ', 'Đến từ dòng Dell Inspiron của hãng laptop Dell, chiếc laptop/máy tính xách tay Dell Inspiron 16 Plus 7620 không chỉ có hiệu năng vô cùng vượt trội với chip i7 đuôi H siêu mạnh mẽ, màn hình QHD+ sắc nét kết hợp thiết kế sang trọng, bắt mắt. Cùng đánh giá giá kỹ hơn chiếc laptop Dell core i7 / laptop văn phòng này thông qua nội dung bài viết dưới đây nhé!   ', 3, b'1', 11, 36),
(246, ' Laptop Acer Nitro 5 AN515-58-525P - Intel Core i5-12500H | Nvidia RTX 3050', 'Sau những thành công của những phiên bản laptop Acer Nitro 5 tiền nhiệm, gần đây laptop gaming Acer Nitro 5 đã được ra mắt cùng nhiều cải tiến vượt trội, với diện mạo mới và trang bị cấu hình cực khủng. Chiếc máy tính xách tay Acer Nitro 5 RTX 3050 này chắc chắn là siêu phẩm laptop gaming Acer chiến game đáng sở hữu nhất hiện nay. Bạn hãy cùng chúng tôi đánh giá mẫu laptop Acer, cụ thể là mẫu laptop Acer Core i5 Tiger ngay dưới đây nhé!', 0, b'1', 11, 36),
(247, 'Laptop HP Envy X360 2 in 1 14-es0013dx 7H9Y4UA  ', 'HP Envy X360 14 nằm trong phân khúc laptop mỏng nhẹ hiện đại, cao cấp xoay gập 360 độ đến từ thương hiệu laptop HP. Là chiếc laptop được trang bị chip đời 13 mới nhất nhà Intel, nên cấu hình khỏe xử lý mọi tác vụ văn phòng trong nháy mắt kèm card đồ họa Iris Xe thiết kế đồ họa cơ bản thích hợp với người muốn dùng đa nhiệm. Vỏ chiếc máy tính xách tay này được làm full kim loại, vuông vắn, màu bạc nhìn rất tinh tế và sang trọng. Chất lượng hiển thị hình ảnh vô cùng sắc nét, màu sắc sống động nhờ màn hình FHD cùng tấm nền IPS, ngoài ra màn hình cảm ứng chạm, lướt vô cùng mượt mà. Cùng Laptop88 tìm hiểu về chiếc laptop HP Envy này nhé:', 1, b'1', 11, 36),
(248, ' Microsoft Surface Laptop 4 1953 | AMD R7-4980U | 15 inch 2K', 'Surface laptop 4 15 inch là chiếc laptop/ máy tính xách tay cực đáng sở hữu đến từ Microsoft. Với thiết kế sang chảnh và gọn nhẹ và chiếc laptop văn phòng này cũng ẩn chứa nhiều ưu điểm tuyệt vời khiến người dùng không khỏi bất ngờ. Chiếc laptop Microsoft Surface sở hữu một màn hình tuyệt đẹp cùng sức mạnh vượt trội đáp ứng mọi phần mềm văn phòng và đồ họa cơ bản. Không chỉ dừng lại ở đó chiếc laptop mỏng nhẹ này còn khiến bạn phải &quot;trầm trồ&quot; với những điểm nổi bật dưới đây:', 2, b'1', 11, 36),
(249, 'Microsoft Surface Laptop 4 1958 | AMD R5-4680U | 13.5 inch 2K', 'Surface Laptop 4 Ryzen 5 là chiếc laptop/ máy tính xách tay cực đáng sở hữu đến từ &quot;ông vua công nghệ&quot; Microsoft. Với thiết kế siêu sang chảnh và gọn nhẹ nhưng chiếc laptop văn phòng này lại ẩn chứa nhiều ưu điểm tuyệt vời khiến người dùng không khỏi bất ngờ. Chiếc laptop Microsoft Surface sở hữu một màn hình tuyệt đẹp cùng sức mạnh vượt trội đáp ứng mọi phần mềm văn phòng và đồ họa cơ bản. Không chỉ dừng lại ở đó chiếc laptop mỏng nhẹ này còn khiến bạn phải &quot;trầm trồ&quot; với những điểm nổi bật dưới đây:', 2, b'1', 11, 36),
(250, 'Laptop Microsoft Surface Pro 7 Plus | Intel Core i5-1135G7', 'Surface Pro 7 Plus là chiếc laptop/ máy tính xách tay đến từ &quot;ông vua công nghệ&quot; Microsoft sở hữu thiết kế 2 in 1 siêu sang chảnh và tiện lợi. Và mặc dù siêu mỏng nhưng chiếc laptop văn phòng này lại ẩn chứa hiệu năng mạnh mẽ đến từ con chip core i5 thế hệ 11 giúp bạn thao tác dễ dàng với mội phần mềm văn phòng và đồ họa cơ bản. Không chỉ dừng lại ở đó chiếc laptop mỏng nhẹ này còn khiến bạn phải &quot;trầm trồ&quot; với những điểm nổi bật dưới đây:', 5, b'1', 11, 36),
(251, 'Microsoft Surface Book 3 | Intel Core i5-1035G7 | 13.5 inch 3K Touch', 'Microsoft đã tạo ra dòng Surface Book, với hy vọng biến nó thành &quot;laptop/ máy tính xách tay tối ưu&quot; của người sáng tạo. Surface book 3 là một trong những chiếc laptop Microsoft Surface đến từ hãng công nghệ Microsoft sở hữu thiết kế siêu sang và gọn nhẹ. Và mặc dù siêu mỏng nhưng chiếc laptop văn phòng này lại ẩn chứa hiệu năng mạnh mẽ đến từ con chip core i5 gen 10 giúp bạn thao tác dễ dàng với mội phần mềm văn phòng và đồ họa cơ bản. Không chỉ dừng lại ở đó chiếc laptop mỏng nhẹ này còn khiến bạn phải &quot;trầm trồ&quot; với những điểm nổi bật dưới đây:', 2, b'1', 11, 36),
(252, 'Microsoft Surface Book 3 | Intel Core i5-1035G7 | 13.5 inch 3K Touch', 'Microsoft đã tạo ra dòng Surface Book, với hy vọng biến nó thành &quot;laptop/ máy tính xách tay tối ưu&quot; của người sáng tạo. Surface book 3 là một trong những chiếc laptop Microsoft Surface đến từ hãng công nghệ Microsoft sở hữu thiết kế siêu sang và gọn nhẹ. Và mặc dù siêu mỏng nhưng chiếc laptop văn phòng này lại ẩn chứa hiệu năng mạnh mẽ đến từ con chip core i5 gen 10 giúp bạn thao tác dễ dàng với mội phần mềm văn phòng và đồ họa cơ bản. Không chỉ dừng lại ở đó chiếc laptop mỏng nhẹ này còn khiến bạn phải &quot;trầm trồ&quot; với những điểm nổi bật dưới đây:', 1, b'1', 11, 36),
(253, 'Microsoft Surface Book 3 | Intel Core i5-1035G7 | 13.5 inch 3K Touch', '   Microsoft đã tạo ra dòng Surface Book, với hy vọng biến nó thành &quot;laptop/ máy tính xách tay tối ưu&quot; của người sáng tạo. Surface book 3 là một trong những chiếc laptop Microsoft Surface đến từ hãng công nghệ Microsoft sở hữu thiết kế siêu sang và gọn nhẹ. Và mặc dù siêu mỏng nhưng chiếc laptop văn phòng này lại ẩn chứa hiệu năng mạnh mẽ đến từ con chip core i5 gen 10 giúp bạn thao tác dễ dàng với mội phần mềm văn phòng và đồ họa cơ bản. Không chỉ dừng lại ở đó chiếc laptop mỏng nhẹ này còn khiến bạn phải &quot;trầm trồ&quot; với những điểm nổi bật dưới đây:', 0, b'1', 11, 36),
(254, 'Microsoft Surface Book 3 | Intel Core i5-1035G7 | 13.5 inch 3K Touch', '   Microsoft đã tạo ra dòng Surface Book, với hy vọng biến nó thành &quot;laptop/ máy tính xách tay tối ưu&quot; của người sáng tạo. Surface book 3 là một trong những chiếc laptop Microsoft Surface đến từ hãng công nghệ Microsoft sở hữu thiết kế siêu sang và gọn nhẹ. Và mặc dù siêu mỏng nhưng chiếc laptop văn phòng này lại ẩn chứa hiệu năng mạnh mẽ đến từ con chip core i5 gen 10 giúp bạn thao tác dễ dàng với mội phần mềm văn phòng và đồ họa cơ bản. Không chỉ dừng lại ở đó chiếc laptop mỏng nhẹ này còn khiến bạn phải &quot;trầm trồ&quot; với những điểm nổi bật dưới đây:', 0, b'1', 11, 36),
(255, ' Microsoft Surface Laptop 4 1953 | AMD R7-4980U | 15 inch 2K', 'Surface laptop 4 15 inch là chiếc laptop/ máy tính xách tay cực đáng sở hữu đến từ Microsoft. Với thiết kế sang chảnh và gọn nhẹ và chiếc laptop văn phòng này cũng ẩn chứa nhiều ưu điểm tuyệt vời khiến người dùng không khỏi bất ngờ. Chiếc laptop Microsoft Surface sở hữu một màn hình tuyệt đẹp cùng sức mạnh vượt trội đáp ứng mọi phần mềm văn phòng và đồ họa cơ bản. Không chỉ dừng lại ở đó chiếc laptop mỏng nhẹ này còn khiến bạn phải &quot;trầm trồ&quot; với những điểm nổi bật dưới đây:', 10, b'1', 11, 36),
(256, ' Laptop Gaming MSI Bravo 15 B7ED-010VN', 'MSI Bravo 15 B7ED mẫu laptop gaming sở hữu thiết kế siêu hầm hố cực ngầu, đậm chất gaming đến từ thương hiệu laptop MSI. Chiếc MSI Bravo này được trang bị cấu hình mới nhất 2023 làm cực tốt mọi tác vụ, chiến game cực đã. Trang bị card đồ họa RX 6550M có sức mạnh ngang ngửa RTX 3050, giúp con máy này trở thành chiếc laptop gaming có cấu hình khỏe nhất tầm giá 17 triệu hiện nay. Tản siêu mát, build máy cực kỳ cứng cáp, chắc chắn. Cùng Laptop88 tìm hiểu kỹ hơn về chiếc laptop/máy tính xách tay này nhé.', 1, b'1', 11, 36),
(257, 'Microsoft Surface Book 3 | Intel Core i5-1035G7 | 13.5 inch 3K Touch', 'MSI Bravo 15 B7ED mẫu laptop gaming sở hữu thiết kế siêu hầm hố cực ngầu, đậm chất gaming đến từ thương hiệu laptop MSI. Chiếc MSI Bravo này được trang bị cấu hình mới nhất 2023 làm cực tốt mọi tác vụ, chiến game cực đã. Trang bị card đồ họa RX 6550M có sức mạnh ngang ngửa RTX 3050, giúp con máy này trở thành chiếc laptop gaming có cấu hình khỏe nhất tầm giá 17 triệu hiện nay. Tản siêu mát, build máy cực kỳ cứng cáp, chắc chắn. Cùng Laptop88 tìm hiểu kỹ hơn về chiếc laptop/máy tính xách tay này nhé.', 0, b'1', 11, 36),
(258, 'Laptop Gaming MSI Bravo 15 B7ED-010VN | Ryzen 5 7535HS', 'MSI Bravo 15 B7ED mẫu laptop gaming sở hữu thiết kế siêu hầm hố cực ngầu, đậm chất gaming đến từ thương hiệu laptop MSI. Chiếc MSI Bravo này được trang bị cấu hình mới nhất 2023 làm cực tốt mọi tác vụ, chiến game cực đã. Trang bị card đồ họa RX 6550M có sức mạnh ngang ngửa RTX 3050, giúp con máy này trở thành chiếc laptop gaming có cấu hình khỏe nhất tầm giá 17 triệu hiện nay. Tản siêu mát, build máy cực kỳ cứng cáp, chắc chắn. Cùng Laptop88 tìm hiểu kỹ hơn về chiếc laptop/máy tính xách tay này nhé.', 0, b'1', 11, 36),
(259, 'Giày Thể Thao Adidas Duramo SL 2.0 10  ', 'Giày Nam Đẹp Giá Rẻ ', 3, b'1', 10, 38),
(260, 'Giày Thể Thao Adidas Grand Court F36392/F36483/  ', 'Shop luôn cập nhật những xu hướng mẫu GIÀY SNEAKER NAM mới nhất, độc nhất trên thị trường. Các đôi giày nam thể thao cá tính và mang đậm phong cách HIGH SCHOOL SNEAKER ạ! Cảm ơn các bạn mua hàng rất nhiều, nhớ đánh giá 5 sao giúp shop nha. 🚛 Ship toàn quốc - Giao hàng tận nơi - Thanh toán tại nhà Xuất xứ: Nhà máy Hồng Châu, Quảng Châu, Trung Quố', 5, b'1', 10, 38),
(261, 'Giày Thể Thao Adidas Duramo SL 2.0 10 ', 'Shop luôn cập nhật những xu hướng mẫu GIÀY SNEAKER NAM mới nhất, độc nhất trên thị trường. Các đôi giày nam thể thao cá tính và mang đậm phong cách HIGH SCHOOL SNEAKER ạ! Cảm ơn các bạn mua hàng rất nhiều, nhớ đánh giá 5 sao giúp shop nha. 🚛 Ship toàn quốc - Giao hàng tận nơi - Thanh toán tại nhà Xuất xứ: Nhà máy Hồng Châu, Quảng Châu, Trung Quố', 3, b'1', 10, 38),
(262, 'Giày Thể Thao Adidas Ultraboost ', 'Shop luôn cập nhật những xu hướng mẫu GIÀY SNEAKER NAM mới nhất, độc nhất trên thị trường. Các đôi giày nam thể thao cá tính và mang đậm phong cách HIGH SCHOOL SNEAKER ạ! Cảm ơn các bạn mua hàng rất nhiều, nhớ đánh giá 5 sao giúp shop nha. 🚛 Ship toàn quốc - Giao hàng tận nơi - Thanh toán tại nhà Xuất xứ: Nhà máy Hồng Châu, Quảng Châu, Trung Quố', 0, b'1', 10, 38),
(263, 'Giày Thể Thao Adidas Ultraboost 5.0', 'Shop luôn cập nhật những xu hướng mẫu GIÀY SNEAKER NAM mới nhất, độc nhất trên thị trường. Các đôi giày nam thể thao cá tính và mang đậm phong cách HIGH SCHOOL SNEAKER ạ! Cảm ơn các bạn mua hàng rất nhiều, nhớ đánh giá 5 sao giúp shop nha. 🚛 Ship toàn quốc - Giao hàng tận nơi - Thanh toán tại nhà Xuất xứ: Nhà máy Hồng Châu, Quảng Châu, Trung Quố', 0, b'1', 10, 38),
(264, 'Giày Thể Thao Adidas Ultraboost 5.0', 'Shop luôn cập nhật những xu hướng mẫu GIÀY SNEAKER NAM mới nhất, độc nhất trên thị trường. Các đôi giày nam thể thao cá tính và mang đậm phong cách HIGH SCHOOL SNEAKER ạ! Cảm ơn các bạn mua hàng rất nhiều, nhớ đánh giá 5 sao giúp shop nha. 🚛 Ship toàn quốc - Giao hàng tận nơi - Thanh toán tại nhà Xuất xứ: Nhà máy Hồng Châu, Quảng Châu, Trung Quố', 0, b'1', 10, 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `ma_hinh` int(10) NOT NULL,
  `duong_dan` varchar(255) NOT NULL,
  `ma_hh` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh`
--

INSERT INTO `hinh_anh` (`ma_hinh`, `duong_dan`, `ma_hh`) VALUES
(198, './assets/imgs/ao-polo-kenzo-fitted-tiger-polo-shirt-mau-xanh-navy-620e1f2cbb987-17022022171052.jpg', 215),
(199, './assets/imgs/giay-sneaker-nam-prada-downtown-leather-2ee364_3lkg_f098z-mau-xanh-trang-656d98350bc71-04122023161325.jpg', 216),
(214, './assets/imgs/', 225),
(215, './assets/imgs/', 226),
(216, './assets/imgs/', 227),
(217, './assets/imgs/', 228),
(244, './assets/imgs/ao-polo-adidas-pique-hai-mau-mau-xam-size-s-62a839c8933a6-14062022143328.jpg', 239),
(245, './assets/imgs/ao-polo-kenzo-fitted-tiger-polo-shirt-mau-xanh-navy-620e1f2cbb987-17022022171052.jpg', 239),
(246, './assets/imgs/ao-polo-nam-versace-men-s-polo-shirt-mau-trang-65110ad8cdc94-25092023112144.jpg', 239),
(247, './assets/imgs/ao-polo-nu-lacoste-women-s-regular-fit-soft-cotton-petit-pique-shirt-pf7839-00-mau-xanh-la-dam-size-34-6544bcc514b56-03112023162629.jpg', 239),
(248, './assets/imgs/giay-sneaker-nam-prada-downtown-leather-2ee364_3lkg_f098z-mau-xanh-trang-656d98350bc71-04122023161325.jpg', 240),
(249, './assets/imgs/giay-sneaker-nam-puma-gen-g-rs-x-esports-307930-mau-den-vang-656d9c2a6ce7c-04122023163018.jpg', 240),
(250, './assets/imgs/giay-the-thao-tommy-hilfiger-logo-cayman-th100841-shoes-mau-trang-xanh-size-39-6541d6ada2bee-01112023114013.jpg', 240),
(252, './assets/imgs/giay-sneaker-nam-puma-gen-g-rs-x-esports-307930-mau-den-vang-656d9c2a6ce7c-04122023163018.jpg', 241),
(253, './assets/imgs/giay-the-thao-tommy-hilfiger-logo-cayman-th100841-shoes-mau-trang-xanh-size-39-6541d6ada2bee-01112023114013.jpg', 241),
(254, './assets/imgs/Bentley-BL1784-252KBB-S2-1000x100-3.jpg', 242),
(255, './assets/imgs/RA-AS0007S10B.jpg', 243),
(257, './assets/imgs/8070_flash_deal_dell_inspiron_16_plus_7620__3_.jpg', 245),
(258, './assets/imgs/120_6713_acer_nitro_5_led_______900x900.jpg', 246),
(259, './assets/imgs/120_6713_laptop_gaming_acer_nitro_5_an517_55_5354____anb_bo_khung.jpg', 246),
(260, './assets/imgs/6713_laptop_gaming_acer_nitro_5_an517_55_5354____anb_bo_khung.jpg', 246),
(263, './assets/imgs/120_5117_hp_envy_x360_2023__900x900___1.jpg', 247),
(264, './assets/imgs/120_5117_hp_envy_x360_2023_900x900_12.jpg', 247),
(265, './assets/imgs/8448_rrrr.jpg', 248),
(266, './assets/imgs/8442_flash_deal_microsoft_surface_laptop_4_1958.jpg', 249),
(267, './assets/imgs/7984_7984_ac___laptop_microsoft_surface_pro_7_plus____nh_tr__n.jpg', 250),
(268, './assets/imgs/8453_surface_book_3_ct_t11.png', 251),
(269, './assets/imgs/120_6713_laptop_gaming_acer_nitro_5_an517_55_5354____anb_bo_khung.jpg', 252),
(270, './assets/imgs/5117_laptop_hp_envy_x360_2_in_1_14_es0013dx_7h9y4ua.jpg', 253),
(271, './assets/imgs/8070_flash_deal_dell_inspiron_16_plus_7620__3_.jpg', 253),
(272, './assets/imgs/120_5117_hp_envy_x360_2023__900x900___1.jpg', 254),
(273, './assets/imgs/120_5117_hp_envy_x360_2023_900x900_12.jpg', 254),
(274, './assets/imgs/5117_laptop_hp_envy_x360_2_in_1_14_es0013dx_7h9y4ua.jpg', 255),
(275, './assets/imgs/8442_flash_deal_microsoft_surface_laptop_4_1958.jpg', 255),
(276, './assets/imgs/120_8317_msi_bravo_15_b7e_900x900.jpg', 256),
(277, './assets/imgs/8442_flash_deal_microsoft_surface_laptop_4_1958.jpg', 257),
(278, './assets/imgs/8448_rrrr.jpg', 257),
(279, './assets/imgs/8453_surface_book_3_ct_t11.png', 257),
(280, './assets/imgs/8448_rrrr.jpg', 258),
(281, './assets/imgs/8453_surface_book_3_ct_t11.png', 258),
(284, './assets/imgs/giay-the-thao-adidas-duramo-sl-2-0-10-wide-gy3855-mau-den-size-40-650aba80d6aab-20092023162520.jpg', 259),
(285, './assets/imgs/giay-the-thao-adidas-duramo-sl-2-0-10-wide-gy3855-mau-den-size-40-650aba80d563a-20092023162520.jpg', 259),
(287, './assets/imgs/giay-the-thao-adidas-grand-court-f36392-f36483-mau-trang-size-39-62a414e6bf05b-11062022110702.jpg', 260),
(288, './assets/imgs/giay-the-thao-adidas-duramo-sl-2-0-10-wide-gy3855-mau-den-size-40-650aba80d6aab-20092023162520.jpg', 261),
(289, './assets/imgs/giay-the-thao-adidas-duramo-sl-2-0-10-wide-gy3855-mau-den-size-40-650aba80d563a-20092023162520.jpg', 261),
(290, './assets/imgs/giay-the-thao-adidas-ultraboost-light-23-hp6443-mau-den-phoi-xanh-size-39-65792f3c1a1b9-13122023111244.jpg', 262),
(291, './assets/imgs/giay-the-thao-adidas-ultraboost-light-23-hp6443-mau-den-phoi-xanh-size-39-65792f3c191aa-13122023111244.jpg', 262),
(292, './assets/imgs/giay-the-thao-adidas-ultraboost-5-0-dna-gw5125-phoi-mau-size-43-652f3ae63f213-18102023085446.jpg', 263),
(293, './assets/imgs/giay-the-thao-adidas-duramo-sl-2-0-10-wide-gy3855-mau-den-size-40-650aba80d6aab-20092023162520.jpg', 264),
(294, './assets/imgs/giay-the-thao-adidas-duramo-sl-2-0-10-wide-gy3855-mau-den-size-40-650aba80d563a-20092023162520 (1).jpg', 264),
(295, './assets/imgs/giay-the-thao-adidas-duramo-sl-2-0-10-wide-gy3855-mau-den-size-40-650aba80d563a-20092023162520.jpg', 264);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(10) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `tai_khoan` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(11) DEFAULT NULL,
  `dia_chi` text NOT NULL,
  `vai_tro` int(10) NOT NULL,
  `ten_shop` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ho_ten`, `tai_khoan`, `mat_khau`, `hinh_anh`, `email`, `so_dien_thoai`, `dia_chi`, `vai_tro`, `ten_shop`) VALUES
(25, 'admin', 'admin', 'admin', NULL, '', NULL, '', 2, NULL),
(33, 'Nguyễn Văn Linh', 'linhnvph36809', '1234567', './assets/imgs/anhthe.jpg', 'linhnvph36809@fpt.edu.vn', '0377893303', 'Thôn Thọ Xã Hợp Thanh Huyện Mỹ Đức Hà Nội ', 0, ''),
(35, 'Nguyễn Văn Linh ', 'nam123456', '1234567', './assets/imgs/bao-hanh-1.png', 'linhkimochi1@gmail.com', NULL, 'Thôn Thọ Xã Hợp Thanh Mỹ Đức Hà Nội ', 1, 'Thời Trang Nam Nữ Cao Cấp '),
(36, 'Nguyễn Văn Tuấn', 'tuan1234', '88888888', './assets/imgs/5117_laptop_hp_envy_x360_2_in_1_14_es0013dx_7h9y4ua.jpg', 'tuan@gmail.com', '0377893303', 'thôn thọ xã hợp thanh ', 1, 'Laptop 88 '),
(38, 'Hoàng Công Giáp ', 'giaynam247', '1234567', './assets/imgs/giay-sneaker-nam-puma-gen-g-rs-x-esports-307930-mau-den-vang-656d9c2a6ce7c-04122023163018.jpg', 'giaynam@gmail.com', '0377893303', 'Thôn Thọ Xã Hợp Thanh Huyện Mỹ Đức Hà Nội ', 1, 'Giày Nam Giá Rẻ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kich_co`
--

CREATE TABLE `kich_co` (
  `ma_kc` int(10) NOT NULL,
  `gia_tri` varchar(50) NOT NULL,
  `ma_shop` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kich_co`
--

INSERT INTO `kich_co` (`ma_kc`, `gia_tri`, `ma_shop`) VALUES
(42, 'L', 35),
(43, 'M', 35),
(44, 'XXL', 35),
(48, '36', 38),
(49, '37', 38),
(50, '38', 38),
(51, '39', 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hang`
--

CREATE TABLE `loai_hang` (
  `ma_loai` int(10) NOT NULL,
  `ten_loai` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `ma_nganh` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_hang`
--

INSERT INTO `loai_hang` (`ma_loai`, `ten_loai`, `hinh_anh`, `ma_nganh`) VALUES
(7, 'Áo Polo ', './assets/imgs/product-1.jpg', 4),
(9, 'Đồng hồ ', './assets/imgs/ORIENT-RA-AS0102S10B-1.jpg', 4),
(10, 'Giày Nam ', './assets/imgs/giay-the-thao-tommy-hilfiger-logo-cayman-th100841-shoes-mau-trang-xanh-size-39-6541d6ada2bee-01112023114013.jpg', 4),
(11, 'Máy Tính ', './assets/imgs/8070_flash_deal_dell_inspiron_16_plus_7620__3_.jpg', 7),
(12, 'Quần Bò ', './assets/imgs/chan-vay-nu-misbhv-denim-logo-monogram-3022w866-mau-xanh-650e44b749d63-23092023085151.jpg', 4),
(13, 'Mũ Nam ', './assets/imgs/mu-mlb-shadow-adjustable-cap-new-york-yankees-mau-den-5eead26152ab4-18062020093305.jpg', 4),
(14, 'Đồ Da Dụng ', './assets/imgs/do-gia-dung-thong-minh3.jpg', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_sac`
--

CREATE TABLE `mau_sac` (
  `ma_ms` int(10) NOT NULL,
  `gia_tri` varchar(50) NOT NULL,
  `ma_shop` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mau_sac`
--

INSERT INTO `mau_sac` (`ma_ms`, `gia_tri`, `ma_shop`) VALUES
(34, 'Màu đen ', 35),
(35, 'Màu đỏ ', 35),
(36, 'Màu Đen ', 36),
(37, 'Màu Trắng ', 36),
(38, 'Màu Đỏ ', 36),
(39, 'Màu Đen ', 38),
(40, 'Màu Trắng ', 38),
(41, 'Màu Đỏ ', 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_hang`
--

CREATE TABLE `nganh_hang` (
  `ma_nganh` int(10) NOT NULL,
  `ten_nganh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nganh_hang`
--

INSERT INTO `nganh_hang` (`ma_nganh`, `ten_nganh`) VALUES
(4, 'Nam '),
(5, 'Nữ '),
(6, 'Mùa đông '),
(7, 'Điện tử ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `ma_voucher` int(10) NOT NULL,
  `ten_voucher` varchar(255) NOT NULL,
  `gia_tri` double(10,2) NOT NULL,
  `ngay_ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`ma_voucher`, `ten_voucher`, `gia_tri`, `ngay_ket_thuc`) VALUES
(9, 'Miễn phí vận chuyển ', 25000.00, '2023-12-20'),
(10, 'Black Friday ', 50000.00, '2023-12-20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_ctdh`);

--
-- Chỉ mục cho bảng `chi_tiet_hang_hoa`
--
ALTER TABLE `chi_tiet_hang_hoa`
  ADD PRIMARY KEY (`ma_cthh`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`ma_dg`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`);

--
-- Chỉ mục cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD PRIMARY KEY (`ma_hinh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `kich_co`
--
ALTER TABLE `kich_co`
  ADD PRIMARY KEY (`ma_kc`);

--
-- Chỉ mục cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `mau_sac`
--
ALTER TABLE `mau_sac`
  ADD PRIMARY KEY (`ma_ms`);

--
-- Chỉ mục cho bảng `nganh_hang`
--
ALTER TABLE `nganh_hang`
  ADD PRIMARY KEY (`ma_nganh`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`ma_voucher`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ma_ctdh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_hang_hoa`
--
ALTER TABLE `chi_tiet_hang_hoa`
  MODIFY `ma_cthh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `ma_dg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  MODIFY `ma_hinh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `kich_co`
--
ALTER TABLE `kich_co`
  MODIFY `ma_kc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `ma_loai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `mau_sac`
--
ALTER TABLE `mau_sac`
  MODIFY `ma_ms` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `nganh_hang`
--
ALTER TABLE `nganh_hang`
  MODIFY `ma_nganh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `ma_voucher` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
