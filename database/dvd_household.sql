-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dvd_household
CREATE DATABASE IF NOT EXISTS `dvd_household` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dvd_household`;

-- Dumping structure for table dvd_household.chucnang
CREATE TABLE IF NOT EXISTS `chucnang` (
  `ma_cn` int(11) NOT NULL AUTO_INCREMENT,
  `noi_dung` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`ma_cn`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.chucnang: ~9 rows (approximately)
REPLACE INTO `chucnang` (`ma_cn`, `noi_dung`) VALUES
	(1, 'Sản phẩm'),
	(2, 'Đơn hàng'),
	(3, 'Người dùng'),
	(5, 'Nhập hàng'),
	(6, 'Nhà cung cấp'),
	(7, 'Slide'),
	(8, 'Tài khoản'),
	(9, 'Phân quyền'),
	(10, 'Thống kê'),
	(11, 'Danh mục');

-- Dumping structure for table dvd_household.ct_donhang
CREATE TABLE IF NOT EXISTS `ct_donhang` (
  `ma_don` int(11) DEFAULT NULL,
  `ma_sp` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.ct_donhang: ~2 rows (approximately)
REPLACE INTO `ct_donhang` (`ma_don`, `ma_sp`, `so_luong`) VALUES
	(1, 1, 3),
	(1, 2, 2),
	(3, 3, 10),
	(4, 4, 1);

-- Dumping structure for table dvd_household.ct_khuyenmai
CREATE TABLE IF NOT EXISTS `ct_khuyenmai` (
  `ma_khuyen_mai` int(11) DEFAULT NULL,
  `ma_sp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.ct_khuyenmai: ~0 rows (approximately)

-- Dumping structure for table dvd_household.ct_phan_quyen
CREATE TABLE IF NOT EXISTS `ct_phan_quyen` (
  `ma_cn` int(11) DEFAULT NULL,
  `ma_quyen` int(11) DEFAULT NULL,
  `them` int(11) DEFAULT NULL,
  `sua` int(11) DEFAULT NULL,
  `xoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.ct_phan_quyen: ~69 rows (approximately)
REPLACE INTO `ct_phan_quyen` (`ma_cn`, `ma_quyen`, `them`, `sua`, `xoa`) VALUES
	(1, 3, 1, 1, 0),
	(2, 3, 0, 0, 0),
	(3, 3, 0, 0, 0),
	(5, 3, 0, 0, 0),
	(6, 3, 1, 1, 1),
	(7, 3, 0, 0, 0),
	(8, 3, 0, 0, 0),
	(9, 3, 0, 0, 0),
	(10, 3, 0, 0, 0),
	(1, 4, 1, 1, 0),
	(2, 4, 0, 1, 0),
	(3, 4, 0, 0, 0),
	(5, 4, 0, 0, 0),
	(6, 4, 0, 0, 0),
	(7, 4, 0, 0, 0),
	(8, 4, 0, 0, 0),
	(9, 4, 0, 0, 0),
	(10, 4, 1, 0, 0),
	(1, 5, 0, 0, 0),
	(2, 5, 0, 0, 0),
	(3, 5, 0, 0, 0),
	(5, 5, 0, 0, 0),
	(6, 5, 0, 0, 0),
	(7, 5, 1, 1, 1),
	(8, 5, 0, 0, 0),
	(9, 5, 0, 0, 0),
	(10, 5, 1, 1, 1),
	(1, 6, 0, 0, 0),
	(2, 6, 0, 0, 0),
	(3, 6, 0, 0, 0),
	(5, 6, 0, 0, 0),
	(6, 6, 0, 0, 0),
	(7, 6, 0, 0, 0),
	(8, 6, 0, 0, 0),
	(9, 6, 0, 0, 0),
	(10, 6, 0, 0, 0),
	(1, 9, 0, 0, 0),
	(2, 9, 0, 0, 0),
	(3, 9, 0, 0, 0),
	(5, 9, 0, 0, 0),
	(6, 9, 0, 0, 0),
	(7, 9, 0, 0, 0),
	(8, 9, 0, 0, 0),
	(9, 9, 0, 0, 0),
	(10, 9, 0, 0, 0),
	(11, 3, 0, 0, 0),
	(11, 4, 1, 1, 1),
	(11, 5, 0, 0, 0),
	(11, 6, 0, 0, 0),
	(11, 9, 0, 0, 0),
	(1, 12, 0, 0, 0),
	(2, 12, 0, 0, 0),
	(3, 12, 0, 0, 0),
	(5, 12, 0, 0, 0),
	(6, 12, 0, 0, 0),
	(7, 12, 0, 0, 0),
	(8, 12, 0, 0, 0),
	(9, 12, 0, 0, 0),
	(10, 12, 0, 0, 0),
	(1, 1, 1, 1, 1),
	(2, 1, 1, 1, 1),
	(3, 1, 1, 1, 1),
	(5, 1, 1, 1, 1),
	(6, 1, 1, 1, 1),
	(7, 1, 1, 1, 1),
	(8, 1, 1, 1, 1),
	(9, 1, 1, 1, 1),
	(10, 1, 1, 1, 1),
	(11, 1, 1, 1, 1);

-- Dumping structure for table dvd_household.ct_phieunhap
CREATE TABLE IF NOT EXISTS `ct_phieunhap` (
  `ma_phieu` int(11) DEFAULT NULL,
  `ma_sp` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `don_gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.ct_phieunhap: ~0 rows (approximately)
REPLACE INTO `ct_phieunhap` (`ma_phieu`, `ma_sp`, `so_luong`, `don_gia`) VALUES
	(1, 14, 20, 100000);

-- Dumping structure for table dvd_household.donhang
CREATE TABLE IF NOT EXISTS `donhang` (
  `ma_don` int(11) NOT NULL AUTO_INCREMENT,
  `ma_kh` varchar(50) DEFAULT NULL,
  `trang_thai` varchar(50) DEFAULT NULL,
  `ngay_dat` date DEFAULT NULL,
  `tong_tien` int(11) DEFAULT NULL,
  `diaChi` varchar(100) DEFAULT NULL,
  `hovaTen` varchar(100) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ma_don`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.donhang: ~2 rows (approximately)
REPLACE INTO `donhang` (`ma_don`, `ma_kh`, `trang_thai`, `ngay_dat`, `tong_tien`, `diaChi`, `hovaTen`, `sdt`) VALUES
	(1, 'KH00009', '2', '2024-03-16', 950000, 'Bến tre, Mỏ cày nam, mỏ cày bắc, mỏ cày tây', 'Nguyễn Minh Hữu', '0987654321'),
	(3, 'KH00009', '2', '2024-05-09', 480000, 'Bến tre, Mỏ cày nam, mỏ cày bắc, mỏ cày tây', 'Đặng Tuấn Kiệt', '0987654321');

-- Dumping structure for table dvd_household.khuyenmai
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `ma_khuyen_mai` varchar(50) NOT NULL DEFAULT '',
  `ngay_bat_dau` date NOT NULL,
  `phan_tram_giam` int(11) NOT NULL DEFAULT 0,
  `ngay_ket_thuc` date NOT NULL,
  `ghi_chu` varchar(50) NOT NULL DEFAULT '0',
  `da_xoa` int(11) DEFAULT 0,
  PRIMARY KEY (`ma_khuyen_mai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.khuyenmai: ~7 rows (approximately)
REPLACE INTO `khuyenmai` (`ma_khuyen_mai`, `ngay_bat_dau`, `phan_tram_giam`, `ngay_ket_thuc`, `ghi_chu`, `da_xoa`) VALUES
	('APPLIANCEDEAL', '2024-03-24', 30, '2024-04-04', 'Ưu đãi đặc biệt, giảm giá 30%\r\n', 0),
	('ELECTRODEAL	', '2024-03-19', 25, '2024-03-29', 'Giảm giá 25% cho tất cả các sản phẩm điện\r\n', 0),
	('GADGETGIFT', '2024-03-22', 40, '2024-04-20', 'Mua hàng tặng quà, giảm giá 40%\r\n', 0),
	('HOMEPROMO', '2024-03-20', 15, '2024-04-10', 'Giảm giá 15% cho sản phẩm gia dụng nhà cửa\r\n', 0),
	('HOMEWARESALE', '2024-03-23', 20, '2024-04-02', 'Giảm giá 20% cho các sản phẩm gia dụng\r\n', 0),
	('KITCHENSAVINGS', '2024-03-21', 35, '2024-04-15', 'Tiết kiệm tới 35% cho các sản phẩm nhà bếp\r\n', 0),
	('MUAHE', '2024-04-06', 20, '2024-04-07', 'Giảm giá 20% cho mùa hè', 1),
	('PROMO123', '2024-03-17', 10, '2024-03-31', 'Giảm giá 10% cho tất cả các sản phẩm\r\n', 0),
	('SPRINGSALE', '2024-03-18', 30, '2024-04-05', 'Khuyến mãi mùa xuân, giảm giá 30%\r\n', 0);

-- Dumping structure for table dvd_household.loai
CREATE TABLE IF NOT EXISTS `loai` (
  `ma_loai` int(11) NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(50) NOT NULL DEFAULT '',
  `da_xoa` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ma_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.loai: ~10 rows (approximately)
REPLACE INTO `loai` (`ma_loai`, `ten_loai`, `da_xoa`) VALUES
	(1, 'Bình nước', 1),
	(2, 'Bếp điện', 0),
	(3, 'Dao bếp', 0),
	(4, 'Thớt', 0),
	(5, 'Máy xay sinh tố\r\n', 0),
	(6, 'Nồi cơm điện', 0),
	(7, 'Bát đĩa\r\n', 0),
	(8, 'Kệ đựng đồ\r\n', 0),
	(9, 'Chảo chống dính\r\n', 0),
	(10, 'Muỗng nĩa đũa\r\n', 0),
	(11, 'Bình nước', 0);

-- Dumping structure for table dvd_household.loaind
CREATE TABLE IF NOT EXISTS `loaind` (
  `maloai` varchar(50) DEFAULT NULL,
  `tenloai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.loaind: ~2 rows (approximately)
REPLACE INTO `loaind` (`maloai`, `tenloai`) VALUES
	('KH', 'Khách hàng'),
	('NV', 'Nhân viên');

-- Dumping structure for table dvd_household.nguoidung
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `ma_nd` varchar(10) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `loai_nd` varchar(50) DEFAULT 'KH'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.nguoidung: ~10 rows (approximately)
REPLACE INTO `nguoidung` (`ma_nd`, `ten`, `sdt`, `diachi`, `email`, `loai_nd`) VALUES
	('accbikhoa', 'Nguyễn Văn An	', '0987654321', '123 Lê Lợi, Quận 1, ', 'user1@example.com\r\n', 'NV'),
	('KH00009', 'Trần Thị Bảo	', '0901234567', '456 Nguyễn Chí Thanh, Quận 5	', 'admin2@example.com\r\n', 'KH'),
	('admin', 'Lê Thị Cẩm Tú	', '0978123456', '789 Đường 30/4, Quận 10	', 'test_user3@example.com\r\n', 'KH'),
	('alice_99', 'Hoàng Thị Lan	', '0965432109', '246 Điện Biên Phủ, Quận 3	', 'alice_99@example.com\r\n', 'KH'),
	('poweruser4', 'Vũ Văn Tài	', '0987654321', '357 Lê Duẩn, Quận 1	', 'poweruser4@example.com\r\n', 'KH'),
	('user6', 'Vũ Văn Tài', '0987654321', '357 Lê Duẩn, Quận 1', 'user6@example.com', 'NV'),
	('sysadmin', 'Nguyễn Thị Thu', '0901234567', '753 Nguyễn Văn Linh, Quận 7', 'sysadmin@example.com', 'NV'),
	('coolguy', 'Đặng Quang Lợi', '0912345678', '159 Đào Duy Từ, Quận 5', 'coolguy@example.com', 'NV'),
	('user2024', 'Lê Anh Tuấn', '0978123456', '963 Hoàng Hoa Thám, Quận Tân Bình', 'user2024@example.com', 'NV'),
	('techwizard', 'Trần Minh Khoa', '0965432109', '852 Tôn Thất Thuyết, Quận 4', 'techwizard@example.com', 'NV');

-- Dumping structure for table dvd_household.nhacungcap
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `ma_ncc` int(11) NOT NULL AUTO_INCREMENT,
  `ten_ncc` varchar(50) NOT NULL DEFAULT '',
  `dia_chi` varchar(50) NOT NULL DEFAULT '',
  `sdt` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `trang_thai` varchar(50) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`ma_ncc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.nhacungcap: ~5 rows (approximately)
REPLACE INTO `nhacungcap` (`ma_ncc`, `ten_ncc`, `dia_chi`, `sdt`, `email`, `trang_thai`) VALUES
	(1, 'Công ty TNHH Panasonic Việt Nam	', 'Lô CN2, KCN Sóng Thần, Dĩ An, Bình Dương	', '02743790888', 'customer_support@vn.panasonic.com\r\n', 'on'),
	(2, 'Công ty TNHH Electrolux Việt Nam	', '55 Trần Quang Khải, Quận 1, TP.HCM	', '02838232233', 'info@electrolux.com.vn\r\n', 'on'),
	(3, 'Công ty TNHH Philips Việt Nam	', 'Lô E, Đường CN6, KCN Biên Hòa 2, Long Bình, Biên H', '02513840515', 'contact@philips.com.vn\r\n', 'on'),
	(4, 'Công ty TNHH Samsung Electronics Việt Nam	', 'Khu công nghiệp Yên Phong, Bắc Ninh	', '02223621111', 'contact@samsung.com.vn\r\n', 'on'),
	(5, 'Công ty TNHH LG Electronics Việt Nam	', 'Lô C1 - C2, Đường C2, KCN Tân Bình, Phường Sơn Kỳ,', '02838119999	', 'lg-vietnam@lge.com\r\n', 'on'),
	(6, 'BíchHữu', 'awdawf', '0987654321', 'minhHuu@gmail.com', 'on');

-- Dumping structure for table dvd_household.phieunhap
CREATE TABLE IF NOT EXISTS `phieunhap` (
  `ma_phieu` int(11) NOT NULL AUTO_INCREMENT,
  `ma_ncc` int(11) DEFAULT NULL,
  `ngayNhap` date DEFAULT NULL,
  `nguoiNhap` varchar(50) DEFAULT NULL,
  `tong_tien` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma_phieu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.phieunhap: ~0 rows (approximately)
REPLACE INTO `phieunhap` (`ma_phieu`, `ma_ncc`, `ngayNhap`, `nguoiNhap`, `tong_tien`) VALUES
	(1, 1, '2024-05-09', 'Nguyễn Minh Hữu', 2000000);

-- Dumping structure for table dvd_household.quyen
CREATE TABLE IF NOT EXISTS `quyen` (
  `ma_quyen` int(11) NOT NULL AUTO_INCREMENT,
  `ten_quyen` varchar(50) NOT NULL,
  PRIMARY KEY (`ma_quyen`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.quyen: ~8 rows (approximately)
REPLACE INTO `quyen` (`ma_quyen`, `ten_quyen`) VALUES
	(1, 'Admin'),
	(2, 'Khách hàng'),
	(3, 'Quản lý kho'),
	(4, 'Nhân viên'),
	(5, 'Thiết kế'),
	(6, 'Marketing'),
	(9, 'Lmao'),
	(12, 'Lmao công');

-- Dumping structure for table dvd_household.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `ma_sp` int(11) NOT NULL AUTO_INCREMENT,
  `ma_loai` int(10) DEFAULT NULL,
  `ten_sp` varchar(200) DEFAULT NULL,
  `don_gia` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT 0,
  `mo_ta` varchar(255) DEFAULT NULL,
  `mau_sac` varchar(50) DEFAULT NULL,
  `xuat_xu` varchar(50) DEFAULT NULL,
  `thuong_hieu` varchar(50) DEFAULT NULL,
  `hinh` varchar(100) DEFAULT NULL,
  `trang_thai` varchar(50) DEFAULT 'on',
  PRIMARY KEY (`ma_sp`),
  KEY `fk_ma_loai` (`ma_loai`),
  CONSTRAINT `fk_ma_loai` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.sanpham: ~54 rows (approximately)
REPLACE INTO `sanpham` (`ma_sp`, `ma_loai`, `ten_sp`, `don_gia`, `so_luong`, `mo_ta`, `mau_sac`, `xuat_xu`, `thuong_hieu`, `hinh`, `trang_thai`) VALUES
	(1, 11, 'Bình nước thể thao Tritan 750ml	', 150000, 197, 'Bình nước thể thao Tritan với dung tích 750ml, chất liệu an toàn cho sức khỏe, thiết kế tiện lợi, dễ dàng mang theo khi tập thể dục hoặc đi du lịch.	', 'Xanh lá cây	', 'Trung Quốc	', 'Tritan', 'binhnuoctt.jpg', 'on'),
	(2, 11, 'Bình nước thép không gỉ 500ml	', 250000, 148, 'Bình nước thép không gỉ chất lượng cao, giữ nhiệt tốt, dung tích 500ml, phù hợp mang theo khi đi làm hoặc đi picnic.	', 'Bạc', 'Việt Nam	', 'InoxPro', 'download.jpg', 'on'),
	(3, 11, 'Bình nước silicon gấp gọn 350ml	', 120000, 286, 'Bình nước silicon gấp gọn, tiện lợi mang theo bên mình, dung tích 350ml, an toàn cho sức khỏe và dễ dàng vệ sinh.	', 'Hồng', 'Hàn Quốc	', 'FlexiFold', 'download (1).jpg', 'on'),
	(4, 11, 'Bình nước nhựa trong suốt 1000ml	', 50000, 250, 'Bình nước nhựa trong suốt, dung tích lớn 1000ml, thiết kế đơn giản, dễ dàng vệ sinh và sử dụng.	', 'Trong suốt	', 'Việt Nam	', 'MyPlastic', 'binh-nuoc-nhua-locklock-jug-hap810-1-lit-7-2.jpg', 'on'),
	(5, 11, 'Bình nước thể thao chống rò rỉ 500ml	', 80000, 180, 'Bình nước thể thao chống rò rỉ, dung tích 500ml, thiết kế nắp vặn an toàn, phù hợp mang theo khi vận động ngoài trời.	', 'Xanh dương	', 'Trung Quốc	', 'AquaGuard', 'download (2).jpg', 'on'),
	(6, 11, 'Bình nước thép không gỉ 750ml	', 180000, 120, 'Bình nước thép không gỉ cao cấp, dung tích 750ml, giữ nhiệt tốt, phù hợp mang theo khi đi làm hoặc đi picnic.	', 'Đen', 'Hàn Quốc	', 'SteelPro', 'e7f7d24edd3d0ce97f515f320c13fd8a.jpg', 'on'),
	(7, 2, 'Bình nước giữ nhiệt đa năng 500ml	', 220000, 100, 'Bình nước giữ nhiệt đa năng, dung tích 500ml, có thể sử dụng để giữ nhiệt hoặc giữ lạnh, thiết kế nhỏ gọn và tiện lợi.	', 'Vàng', 'Trung Quốc', 'ThermiBottle', 'DSC01618-scaled.jpg', 'on'),
	(8, 2, 'Bình nước silicon chống tràn 350ml	', 90000, 300, 'Bình nước silicon chống tràn, dung tích 350ml, thiết kế nắp kín an toàn, dễ dàng vệ sinh và sử dụng.	', 'Đỏ', 'Việt Nam	', 'LeakGuard', '2ed817e2a0ef353a5e3f63e95dfbc5cc.jpg', 'on'),
	(9, 2, 'Bình nước nhựa trẻ em hình động vật	', 60000, 200, 'Bình nước nhựa trẻ em với hình động vật dễ thương, dung tích 350ml, chất liệu an toàn cho trẻ nhỏ, màu sắc tươi sáng và hấp dẫn.	', 'Vàng ', 'Trung Quốc	', 'KiddieSafe', '579804c6eadb1fa53c70ac882998e51c.jpg_550x550.jpg', 'on'),
	(10, 2, 'Bình nước thể thao cách nhiệt 750ml	', 300000, 150, 'Bình nước thể thao cách nhiệt, giữ nhiệt tốt hoặc giữ lạnh, dung tích 750ml, thiết kế sang trọng và hiện đại.	', 'Bạc', 'Hàn Quốc	', 'Thermos', 'binhthuytinhthethaoxanhden750ml.jpg', 'on'),
	(11, 3, 'Dao bếp chữ A 8 inch	', 150000, 200, 'Dao bếp chữ A 8 inch với lưỡi dao sắc bén, thích hợp cho việc thái, băm và chặt các loại thực phẩm.	', 'Đen', 'Trung Quốc	', 'KitchenAid', 'download (3).jpg', 'on'),
	(12, 3, 'Dao bếp chef Santoku 7 inch	', 180000, 150, 'Dao bếp chef Santoku 7 inch với lưỡi dao đa dụng, có thể sử dụng cho nhiều công việc trong nhà bếp.	', 'Xám', 'Nhật Bản	', 'Global', '811Q9SapM1L._AC_SL1500_.jpg', 'on'),
	(13, 3, 'Dao bếp cán gỗ Damascus 6 inch	', 300000, 100, 'Dao bếp cán gỗ Damascus 6 inch với lớp lưỡi dao làm từ thép Damascus cao cấp, thiết kế sang trọng.	', 'Nâu', 'Thổ Nhĩ Kỳ	', 'Shun', '9183134884-1385292845.jpg', 'on'),
	(14, 3, 'Dao chém đánh ghen', 12345678, 20, 'sxdcfgbhj', 'hồng', 'China', 'DatDanhGhen', 'tonhua.jfif', 'off'),
	(15, 4, 'Thớt gỗ sồi', 250000, 0, 'Thớt gỗ', 'Màu gỗ tự nhiên', 'Việt Nam', 'Vinhomes Kitchenware', 'thot-go-soi-gct90-1.jpg', 'on'),
	(16, 4, 'Thớt nhựa cao cấp', 300000, 0, 'Thớt gỗ', 'Trắng', 'Đức', 'Tupperware', '3a66456a305cdff15a2985daaec36447.jpg', 'on'),
	(17, 4, 'Thớt nhựa đa năng', 150000, 0, 'Thớt gỗ', 'Đa màu sắc', 'Trung Quốc', 'IKEA', '20240131_ZnQqkjuffT.jpg', 'on'),
	(18, 4, 'Thớt gỗ thông cao cấp', 400000, 0, 'Thớt gỗ', 'Màu gỗ đen', 'Ý', 'Boos Blocks', 'ab-01-42.jpg', 'on'),
	(19, 4, 'Thớt nhựa linh hoạt', 180000, 0, 'Thớt gỗ', 'Xanh lá cây', 'Mỹ', 'OXO', 'sg-11134201-7qvg1-lhs98sk5fvcd27.jpg', 'on'),
	(20, 4, 'Thớt gỗ thông', 220000, 0, 'Thớt gỗ', 'Màu gỗ tự nhiên', 'Việt Nam', 'Phúc Long Wood', 'o1cn012pofyp2lyaczraxn7-633659761-sao-chep.jpg', 'on'),
	(21, 4, 'Thớt nhựa đơn giản', 120000, 0, 'Thớt gỗ', 'Màu trắng', 'Trung Quốc', 'Yoyoso', 'Thớt nhựa trắng(1).jpg', 'on'),
	(22, 4, 'Thớt gỗ sồi cao cấp', 350000, 0, 'Thớt gỗ', 'Màu gỗ tự nhiên', 'Hàn Quốc', 'CJ Home', 'thot-go-soi-gct90-1.jpg', 'on'),
	(23, 4, 'Thớt nhựa mini', 80000, 0, 'Thớt gỗ', 'Màu trắng', 'Trung Quốc', 'Santec', '5eccb46f6bc69e973d3f9162e2339119.jpg_720x720q80.jpg', 'on'),
	(24, 4, 'Thớt gỗ thông nhỏ', 180000, 0, 'Thớt gỗ', 'Màu gỗ tự nhiên', 'Việt Nam', 'Villa Living', 'thớt-tròn-nhỏ-c003.jpg', 'on'),
	(25, 2, 'Bếp hồng ngoại 1 bếp', 1500000, 0, 'Bếp hồng ngoại 1 bếp chất lượng cao, tiết kiệm điện năng', 'Đen', 'Trung Quốc', 'Electrolux', '227506-600x600-1.jpg', 'on'),
	(26, 2, 'Bếp hồng ngoại 2 bếp', 2200000, 0, 'Bếp hồng ngoại 2 bếp thông minh, dễ sử dụng', 'Trắng', 'Đức', 'Siemens', '227506-600x600-1.jpg', 'on'),
	(27, 2, 'Bếp hồng ngoại 3 bếp', 3200000, 0, 'Bếp hồng ngoại 3 bếp có nhiều chức năng nấu ấm khác nhau', 'Đa màu sắc', 'Hàn Quốc', 'LG', '227506-600x600-1.jpg', 'on'),
	(28, 2, 'Bếp hồng ngoại 4 bếp', 4000000, 0, 'Bếp hồng ngoại 4 bếp cao cấp, điều khiển cảm ứng', 'Màu inox', 'Nhật Bản', 'Panasonic', '227506-600x600-1.jpg', 'on'),
	(29, 2, 'Bếp hồng ngoại 1 bếp đơn', 1000000, 0, 'Bếp hồng ngoại 1 bếp đơn nhỏ gọn, tiện lợi cho gia đình nhỏ', 'Đen', 'Trung Quốc', 'Philips', '227506-600x600-1.jpg', 'on'),
	(30, 2, 'Bếp hồng ngoại 2 bếp đơn', 1800000, 0, 'Bếp hồng ngoại 2 bếp đơn có kiểu dáng hiện đại', 'Trắng', 'Đức', 'Bosch', '227506-600x600-1.jpg', 'on'),
	(31, 2, 'Bếp hồng ngoại 3 bếp đơn', 2800000, 0, 'Bếp hồng ngoại 3 bếp đơn tiết kiệm không gian, phù hợp cho căn bếp nhỏ', 'Màu inox', 'Hàn Quốc', 'Samsung', '227506-600x600-1.jpg', 'on'),
	(32, 2, 'Bếp hồng ngoại 4 bếp đơn', 3800000, 0, 'Bếp hồng ngoại 4 bếp đơn với thiết kế đẹp mắt và chức năng nấu ấm mạnh mẽ', 'Đen', 'Đức', 'Miele', '227506-600x600-1.jpg', 'on'),
	(33, 2, 'Bếp hồng ngoại 1 bếp đôi', 1800000, 0, 'Bếp hồng ngoại 1 bếp đôi có đèn báo nhiệt và nhiều tính năng an toàn', 'Trắng', 'Trung Quốc', 'Haier', '227506-600x600-1.jpg', 'on'),
	(34, 2, 'Bếp hồng ngoại 2 bếp đôi', 2800000, 0, 'Bếp hồng ngoại 2 bếp đôi có nhiều chế độ nấu ấm và dễ dàng vệ sinh', 'Đa màu sắc', 'Nhật Bản', 'Toshiba', '227506-600x600-1.jpg', 'on'),
	(35, 7, 'Bát gốm sứ', 300000, 0, 'Bát gốm sứ, bền đẹp', 'Trắng', 'Việt Nam', 'Bát Gốm Sứ Hương', 'bat_sau_vua13x7.jpg', 'on'),
	(36, 7, 'Đĩa gốm sứ', 500000, 0, 'Đĩa gốm sứ, dùng cho bữa ăn gia đình', 'Xanh', 'Trung Quốc', 'Long Phượng Ceramics', '014.jpg', 'on'),
	(37, 7, 'Bát sứ', 800000, 0, 'Bộ bát sứ cao cấp, phục vụ cho các dịp lớn', 'Trắng', 'Hàn Quốc', 'Ceramica Jeju', '014.jpg', 'on'),
	(38, 7, 'Đĩa sứ', 1200000, 0, 'Bộ đĩa sứ đa năng, phù hợp cho mọi gia đình', 'Màu gỗ', 'Nhật Bản', 'Yamato Pottery', '014.jpg', 'on'),
	(39, 7, 'Bát nhựa', 350000, 0, 'Bát nhựa đa năng, dễ vệ sinh và sử dụng', 'Đa màu sắc', 'Trung Quốc', 'Yoyoso', '014.jpg', 'on'),
	(40, 7, 'Đĩa nhựa', 600000, 0, 'Bộ đĩa nhựa đa dạng màu sắc, phù hợp cho mọi không gian bếp', 'Đỏ', 'Đức', 'IKEA', '014.jpg', 'on'),
	(41, 7, 'Bát nhựa', 900000, 0, 'Bát nhựa tiện lợi, dễ sử dụng và bảo quản', 'Màu trắng', 'Trung Quốc', 'Tupperware', '014.jpg', 'on'),
	(42, 7, 'Đĩa nhựa', 1400000, 0, 'Bộ đĩa nhựa cao cấp, màu sắc sang trọng', 'Đen', 'Hàn Quốc', 'LG', '014.jpg', 'on'),
	(43, 7, 'Bát nhựa', 250000, 0, 'Bát nhựa đơn giản, giá thành phải chăng', 'Trắng', 'Trung Quốc', 'Philips', '014.jpg', 'on'),
	(44, 7, 'Đĩa nhựa', 450000, 0, 'Bộ đĩa nhựa hiện đại, phù hợp cho phong cách thiết kế nội thất hiện đại', 'Xanh lá cây', 'Nhật Bản', 'Panasonic', '014.jpg', 'on'),
	(45, 8, 'Kệ đựng đồ gỗ', 1500000, 0, 'Kệ đựng đồ gỗ, chất lượng cao, bền bỉ và đẹp mắt', 'Nâu', 'Việt Nam', 'WoodenCraft', 'tu-de-do-mini-ghc-1112-1.jpg', 'on'),
	(46, 8, 'Kệ đựng đồ nhựa', 800000, 0, 'Kệ đựng đồ nhựa, nhẹ nhàng, dễ di chuyển và vệ sinh', 'Trắng', 'Trung Quốc', 'PlasticWorld', 'images.jpg', 'on'),
	(47, 8, 'Kệ đựng đồ kim loại', 2000000, 0, 'Kệ đựng đồ kim loại, mạnh mẽ và chịu lực tốt', 'Đen', 'Đức', 'MetalMaster', 'Sb612eebad64645dc89d771118764ed59Z.jpg_720x720q80.jpg', 'on'),
	(48, 8, 'Kệ đựng đồ gỗ thông', 1800000, 0, 'Kệ đựng đồ gỗ thông, thiết kế hiện đại và tiết kiệm không gian', 'Màu gỗ tự nhiên', 'Hàn Quốc', 'ModernWood', 'ke-go-thong-minh-co-tu-thuan-tien.jpg', 'on'),
	(49, 8, 'Kệ đựng đồ nhựa đa năng', 1200000, 0, 'Kệ đựng đồ nhựa đa năng, có thể sử dụng ở nhiều không gian khác nhau', 'Đa màu sắc', 'Nhật Bản', 'VersatilePlastic', 'chuyen-6741-9465-3396-1522-8837.jpg', 'on'),
	(50, 8, 'Kệ đựng đồ tre', 2500000, 0, 'Kệ đựng đồ tre, thiết kế tự nhiên và eco-friendly', 'Nâu', 'Việt Nam', 'EcoBamboo', 'ke-tre.jpg', 'on'),
	(51, 8, 'Kệ đựng đồ sắt', 2200000, 0, 'Kệ đựng đồ sắt, chắc chắn và độ bền cao', 'Màu sắt tự nhiên', 'Trung Quốc', 'IronCraft', 'ff6fcaf30876c651e7be92ce69b095b0.jpg_720x720q80.jpg', 'on'),
	(52, 8, 'Kệ đựng đồ gỗ cao cấp', 3000000, 0, 'Kệ đựng đồ gỗ cao cấp, phong cách và sang trọng', 'Màu gỗ tự nhiên', 'Đức', 'PremiumWood', 'ke-go-thong-minh-co-tu-thuan-tien.jpg', 'on'),
	(53, 8, 'Kệ đựng đồ nhựa tiện lợi', 1500000, 0, 'Kệ đựng đồ nhựa tiện lợi, dễ di chuyển và lắp đặt', 'Trắng', 'Trung Quốc', 'ConvenientPlastic', 'ke-go-thong-minh-co-tu-thuan-tien.jpg', 'on'),
	(54, 8, 'Kệ đựng đồ gỗ hiện đại', 2800000, 0, 'Kệ đựng đồ gỗ hiện đại, phù hợp với nhiều phong cách thiết kế nội thất', 'Màu gỗ tự nhiên', 'Nhật Bản', 'ModernLiving', 'ke-go-thong-minh-co-tu-thuan-tien.jpg', 'on');

-- Dumping structure for table dvd_household.slide
CREATE TABLE IF NOT EXISTS `slide` (
  `slideid` int(11) NOT NULL AUTO_INCREMENT,
  `slidename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`slideid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.slide: ~6 rows (approximately)
REPLACE INTO `slide` (`slideid`, `slidename`) VALUES
	(1, 'Hàng thương mại'),
	(2, 'Hàng sản xuất'),
	(3, 'Hàng mùa hè'),
	(5, 'Hàng XYZ'),
	(6, 'Hàng abc'),
	(7, 'Hàng hot');

-- Dumping structure for table dvd_household.slidedetail
CREATE TABLE IF NOT EXISTS `slidedetail` (
  `slide_id` int(11) DEFAULT NULL,
  `ma_sp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.slidedetail: ~16 rows (approximately)
REPLACE INTO `slidedetail` (`slide_id`, `ma_sp`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(2, 5),
	(2, 6),
	(3, 3),
	(3, 4),
	(3, 5),
	(3, 1),
	(3, 2),
	(5, 1),
	(5, 5),
	(7, 5),
	(7, 6),
	(7, 7),
	(7, 8);

-- Dumping structure for table dvd_household.taikhoan
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `username` varchar(10) NOT NULL,
  `ma_quyen` int(11) NOT NULL DEFAULT 1,
  `password` varchar(50) NOT NULL,
  `trang_thai` varchar(20) NOT NULL DEFAULT 'on',
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dvd_household.taikhoan: ~10 rows (approximately)
REPLACE INTO `taikhoan` (`username`, `ma_quyen`, `password`, `trang_thai`, `ngay_tao`) VALUES
	('accbikhoa', 1, '21232f297a57a5a743894a0e4a801fc3 ', 'on', '2024-03-17'),
	('KH00009', 2, 'e99a18c428cb38d5f260853678922e03', 'on', '2024-03-16'),
	('admin', 1, '21232f297a57a5a743894a0e4a801fc3 ', 'on', '2024-03-15'),
	('JohnDoe', 3, 'e99a18c428cb38d5f260853678922e03', 'on', '2024-03-14'),
	('alice_99', 3, 'e99a18c428cb38d5f260853678922e03', 'on', '2024-03-13'),
	('poweruser4', 2, 'e99a18c428cb38d5f260853678922e03', 'on', '2024-03-12'),
	('coolguy', 2, 'e99a18c428cb38d5f260853678922e03', 'on', '2024-03-11'),
	('sysadmin', 2, 'e99a18c428cb38d5f260853678922e03', 'on', '2024-03-10'),
	('user2024	', 2, 'e99a18c428cb38d5f260853678922e03', 'on', '2024-03-09'),
	('techwizard', 5, 'e99a18c428cb38d5f260853678922e03', 'on', '2024-03-08');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
