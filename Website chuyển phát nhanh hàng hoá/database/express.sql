-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 17, 2024 lúc 09:21 AM
-- Phiên bản máy phục vụ: 5.7.25
-- Phiên bản PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `express`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buucuc`
--

CREATE TABLE `buucuc` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `tenbuucuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `macdinh` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `buucuc`
--

INSERT INTO `buucuc` (`id`, `nguoidung_id`, `tenbuucuc`, `macdinh`) VALUES
(1, 2, 'An giang', 1),
(2, 3, 'Đồng tháp', 1),
(3, 4, 'Long An', 1),
(4, 5, 'Sài gòn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(11) NOT NULL,
  `tendichvu` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id`, `tendichvu`) VALUES
(1, 'Nội thành'),
(2, 'Trên 300km'),
(3, 'Dưới 300km');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvan`
--

CREATE TABLE `donvan` (
  `id` int(11) NOT NULL,
  `dichvu_id` int(11) NOT NULL,
  `hanghoa_id` int(11) NOT NULL,
  `hotennguoigui` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachinguoigui` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdtnguoigui` int(11) NOT NULL,
  `hotennguoinhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachinguoinhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdtnguoinhan` int(11) NOT NULL,
  `khoiluong` float NOT NULL DEFAULT '0',
  `giatrihanghoa` int(11) NOT NULL,
  `ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phithuho` int(11) NOT NULL,
  `yeucau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhthucthanhtoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buucuc_id` int(11) NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvan`
--

INSERT INTO `donvan` (`id`, `dichvu_id`, `hanghoa_id`, `hotennguoigui`, `diachinguoigui`, `sdtnguoigui`, `hotennguoinhan`, `diachinguoinhan`, `sdtnguoinhan`, `khoiluong`, `giatrihanghoa`, `ngay`, `phithuho`, `yeucau`, `hinhthucthanhtoan`, `buucuc_id`, `ghichu`) VALUES
(1, 1, 1, 'Demo1', 'An giang', 11111111, 'Demo2', 'Sài Gòn', 2222222, 15, 300000, '2024-03-28 00:00:00', 300000, 'Được kiểm tra hàng', 'Thanh toán khi nhận hàng', 1, 'Hàng dễ vỡ'),
(2, 2, 3, 'Demo3', 'Sài Gòn', 12321312, 'Demo4', 'An Giang', 32313141, 5, 150000, '2024-03-30 00:00:00', 150000, 'Không được kiểm tra hàng', 'Chuyển khoản', 4, ''),
(3, 1, 1, 'Demo9', 'An Giang', 13121241, 'Demo8', 'Long An', 35242132, 11, 150000, '2024-04-24 00:00:00', 150000, 'Được kiểm tra hàng', 'Thanh toán khi nhận hàng', 1, 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvanupdate`
--

CREATE TABLE `donvanupdate` (
  `id` int(11) NOT NULL,
  `donvan_id` int(11) NOT NULL,
  `tinhtrang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvanupdate`
--

INSERT INTO `donvanupdate` (`id`, `donvan_id`, `tinhtrang`) VALUES
(1, 1, 'An Giang<p>Đồng tháp</p><p>Long an</p><p>Sài gòn</p>'),
(2, 2, '<p>Sài gòn</p><p>Long An</p><p>Đồng Tháp</p><p>An Giang</p>'),
(3, 3, '<p>Đơn hàng đang ở bưu cục an giang</p><p>Đơn hàng đang ở bưu cục Đồng tháp</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(11) NOT NULL,
  `tenhanghoa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`id`, `tenhanghoa`) VALUES
(1, 'Hàng cồng kềnh > 10kg'),
(2, 'Hàng cồng kềnh dạng chất lỏng'),
(3, 'Hàng cồng kềnh < 10kg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loai` tinyint(5) NOT NULL DEFAULT '4',
  `trangthai` tinyint(4) NOT NULL DEFAULT '1',
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, 'diamond@express.com', '0941441129', '900150983cd24fb0d6963f7d28e17f72', 'Admin', 1, 1, 'user.png'),
(2, 'bcag@diamond.com', '11111111', '900150983cd24fb0d6963f7d28e17f72', 'Nhân viên 1', 1, 1, 'doraemon.jpg'),
(3, 'bcdt@diamond.com', '0988994685', '900150983cd24fb0d6963f7d28e17f72', 'Nhân viên 2', 2, 1, NULL),
(4, 'bcla@diamond.com', '0988994685', '900150983cd24fb0d6963f7d28e17f72', 'Nhân viên 3', 2, 1, NULL),
(5, 'bcsg@diamond.com', '0988994685', '900150983cd24fb0d6963f7d28e17f72', 'Nhân viên 4', 2, 1, NULL),
(6, 'shipper1@gmail.com', '0988994686', '900150983cd24fb0d6963f7d28e17f72', 'Shipper1', 3, 1, NULL),
(7, 'shipper2@gmail.com', '0988994686', '900150983cd24fb0d6963f7d28e17f72', 'Shipper2', 3, 1, NULL),
(8, 'kh1@gmail.com', '0988994687', '900150983cd24fb0d6963f7d28e17f72', 'Nguyễn Thanh Toàn', 4, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `tieude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `noidung`, `hinhanh`) VALUES
(1, 'Huấn luyện lái xe, tiết kiệm nhiên liệu cho các bác tài J&T Express', 'Ngày 23/7 vừa qua, Diamond Express Việt Nam (chi nhánh Hà Nội) đã phối hợp với ISUZU Việt Nam & Đại lý Isuzu Thăng Long tổ chức thành công Buổi đào tạo và hướng dẫn “Huấn luyện lái xe - Tiết kiệm nhiên liệu” kết hợp hoạt động bảo dưỡng và kiểm tra xe cho các Bác tài Diamond Express.\r\n\r\n \r\n\r\nTrong suốt chương trình, các bác tài nhà Đỏ đã có dịp được đào tạo và thực hành:\r\n\r\n \r\n\r\n- Nâng cao kỹ năng lái xe, bảo dưỡng, kiểm tra xe tải từ các chuyên gia ISUZU Thăng Long\r\n\r\n- Được tiếp cận với những phương pháp và kinh nghiệm lái xe an toàn, tiết kiệm nhiên liệu \r\n\r\n- Đặc biệt, một thử thách được thực hiện tại chỗ: Các bác tài thi lái xe an toàn và tiết kiệm nhiên liệu trên đường, vận dụng những kiến thức vừa học vào thực tiễn. \r\n\r\n \r\n\r\nBên cạnh đảm bảo an toàn, hoạt động huấn luyện trên là một trong những nỗ lực từ phía J&T Express phối hợp cùng các đối tác trong việc tăng cường thực hiện “xu hướng xanh” trong lĩnh vực logistics. \r\n\r\n \r\n\r\nThông qua việc lái xe an toàn, tiết kiệm nhiên liệu, mỗi bác tài nhà Đỏ “tích tiểu thành đại”, giảm thiểu khí thải có hại ra môi trường, góp phần xây dựng lối sống xanh, môi trường xanh.\r\n\r\n \r\n\r\nCùng xem lại những hình ảnh của Buổi đào tạo dưới đây các bạn nhé!', 'images/blog1.jpg'),
(2, 'Diamond Express “Kiến tạo tương lai xanh” cùng chiến dịch thu gom rác tái chế thành quà tặng cho trường học', 'Là doanh nghiệp hoạt động tích cực trong công tác bảo vệ môi trường, Diamond Express đã sớm đặt mục tiêu phát triển bền vững thông qua chiến lược logistics xanh. Tiếp nối các hoạt động hiện tại, chiến dịch \"Kiến tạo tương lai xanh\" được Diamond Express phát động, bắt đầu diễn ra từ ngày 1/11/2023, thể hiện nỗ lực chung tay cùng cộng đồng bảo vệ môi trường. Chiến dịch có sự tham gia đồng hành của Trung tâm truyền thông Bộ Tài Nguyên và Môi trường và Lagom – đơn vị phụ trách vận chuyển và tái chế rác thải.\r\nThông qua chiến dịch, Diamond Express đặt ra mục tiêu khuyến khích người dân toàn quốc ủng hộ các sản phẩm tái chế, giảm thiểu số lượng rác thải nhựa thải ra môi trường. Trong giai đoạn 1 của chiến dịch, Diamond Express vận động cộng đồng thương nhân và các nhà bán hàng online, mang rác tái chế như cốc nhựa, chai nhựa, ống hút nhựa… đến các địa điểm thu gom và xử lý rác. Sau quá trình phân loại và xử lý, Diamond Express sẽ tổ chức trao tặng thành phẩm là những bộ bàn ghế tái chế cho 5 trường học tại địa bàn TP. Hà Nội, TP. Hồ Chí Minh và tỉnh Bắc Ninh trong giai đoạn 2 của chiến dịch.\r\n\r\n \r\n\r\nĐiểm đến cuối cùng của những bộ bàn ghế tái chế là các trường học ở vùng ven, đa số các phụ huynh làm công nhân, lao động. Việc Diamond Express lựa chọn các trường học này làm địa điểm thụ hưởng của chiến dịch “Kiến tạo tương lai xanh” cho thấy nỗ lực đóng góp giá trị trong việc mang tới cơ sở vật chất học tập bằng sản phẩm giàu ý nghĩa cho các em học sinh. Chiến dịch cũng thúc đẩy công tác tuyên truyền, giáo dục những “mầm non\" đất nước về trách nhiệm cấp thiết của việc giảm thiểu rác thải, đồng thời khẳng định tinh thần đóng góp của Diamond Express trong các hoạt động vì lợi ích cộng đồng tại Việt Nam.\r\n\r\n \r\n\r\nÔng Phan Bình - Giám đốc Thương hiệu Diamond Express Việt Nam chia sẻ kỳ vọng về kết quả đạt được của chiến dịch: “Kiến tạo tương lai xanh là một thông điệp mạnh mẽ về trách nhiệm xã hội và bảo vệ môi trường của Diamond Express. Chúng tôi hi vọng rằng chiến dịch này sẽ lan tỏa thông điệp sâu rộng, tạo động lực cho cộng đồng và các doanh nghiệp khác cùng tham gia xây dựng một tương lai xanh, sạch hơn và bền vững hơn. Diamond Express cũng cam kết sẽ triển khai nhiều hoạt động bảo vệ môi trường trong tương lai nhằm duy trì mục tiêu xanh hóa doanh nghiệp và cộng đồng.”\r\n\r\n \r\n\r\nKể từ khi ra nhập thị trường Việt Nam vào năm 2018, Diamond Express cũng đã triển khai nhiều giải pháp khác nhau nhằm hướng tới mục tiêu “xanh hoá” hoạt động kinh doanh. Đơn cử như sử dụng hệ thống AI để quản lý, xử lý dữ liệu; xây dựng hệ thống quản lý thông tin vận hành JMS giúp toàn bộ quá trình vận hành trơn tru, từ đó tiết kiệm chi phí vận chuyển, đóng góp vào việc tiết kiệm nhiên liệu và giảm thải ô nhiễm đối với môi trường. ', 'images/blog2.jpg'),
(3, 'Tổ chức cuộc thi dành riêng cho shipper Diamond Express', 'Với thông điệp “Không cần phải hơn người khác, chỉ cần vượt qua chính bản thân mình”, cuộc thi “Giao hiệu quả - Nhận niềm vui” tập trung vào sự cải thiện và tiến bộ của mỗi nhân viên giao nhận dựa trên 3 tiêu chí: \r\n\r\n \r\n\r\n- Tác phong: Đồng phục gọn gàng, vệ sinh bưu cục sạch sẽ\r\n\r\n- Hiệu suất: Giao hàng hiệu quả, tốt lên từng ngày\r\n\r\n- Thái độ: Tích cực và vui vẻ với tất cả khách hàng\r\n\r\n \r\n\r\nCơ cấu giải thưởng: Mỗi tháng, nhân viên nào có được sự tiến bộ lớn nhất sẽ được điểm càng cao và xếp hạng theo thứ tự:\r\n\r\n- Nhân viên top 1: 10 triệu đồng mỗi giải/tháng\r\n\r\n- Nhân viên top 2: 7 triệu đồng mỗi giải/tháng\r\n\r\n- Nhân viên top 3: 5 triệu đồng mỗi giải/tháng\r\n\r\n- Nhân viên top 4 - top 10: 2 triệu đồng mỗi giải/tháng\r\n\r\n \r\n\r\nĐặc biệt: \r\n\r\n- Mỗi tháng có 80 giải thưởng, chia đều cho 8 khu vực, tương ứng với việc sẽ có 8 “Nhân viên top 1” của mỗi khu vực khác nhau.\r\n\r\n- Một nhân viên có thể nhận thưởng 2 tháng liên tiếp nếu có sự tiến bộ cao trong công việc.\r\n\r\n \r\n\r\nThời gian áp dụng: Tháng 6 và Tháng 7, bắt đầu tính từ 1/6/2023\r\n\r\n \r\n\r\nĐể biết thêm thông tin về thể lệ, cách thức, giải thưởng, các bạn shipper nhà mình liên hệ TRƯỞNG BƯU CỤC tại nơi làm việc để được hướng dẫn và hỗ trợ', 'images/blog3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `buucuc`
--
ALTER TABLE `buucuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donvan`
--
ALTER TABLE `donvan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dichvu_id` (`dichvu_id`),
  ADD KEY `hanghoa_id` (`hanghoa_id`),
  ADD KEY `buucuc_id` (`buucuc_id`);

--
-- Chỉ mục cho bảng `donvanupdate`
--
ALTER TABLE `donvanupdate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donvan_id` (`donvan_id`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `buucuc`
--
ALTER TABLE `buucuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `donvan`
--
ALTER TABLE `donvan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `donvanupdate`
--
ALTER TABLE `donvanupdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `buucuc`
--
ALTER TABLE `buucuc`
  ADD CONSTRAINT `buucuc_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donvan`
--
ALTER TABLE `donvan`
  ADD CONSTRAINT `donvan_ibfk_2` FOREIGN KEY (`hanghoa_id`) REFERENCES `hanghoa` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donvan_ibfk_3` FOREIGN KEY (`buucuc_id`) REFERENCES `buucuc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donvan_ibfk_4` FOREIGN KEY (`dichvu_id`) REFERENCES `dichvu` (`id`);

--
-- Các ràng buộc cho bảng `donvanupdate`
--
ALTER TABLE `donvanupdate`
  ADD CONSTRAINT `donvanupdate_ibfk_1` FOREIGN KEY (`donvan_id`) REFERENCES `donvan` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
