-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: doanweb2
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `baohanh`
--

DROP TABLE IF EXISTS `baohanh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `baohanh` (
  `ID_Baohanh` int NOT NULL AUTO_INCREMENT,
  `Tenbaohanh` varchar(45) NOT NULL,
  `Thoigianbaohanh` int(10) unsigned zerofill NOT NULL,
  `Trangthai` varchar(10) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  PRIMARY KEY (`ID_Baohanh`),
  UNIQUE KEY `ID_Baohanh_UNIQUE` (`ID_Baohanh`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baohanh`
--

LOCK TABLES `baohanh` WRITE;
/*!40000 ALTER TABLE `baohanh` DISABLE KEYS */;
INSERT INTO `baohanh` VALUES (1,'12 Tháng',0000000012,'T'),(2,'6 tháng',0000000006,'T'),(3,'1 tháng',0000000001,'T'),(4,'3 tháng',0000000003,'T'),(5,'2 tháng',0000000002,'T');
/*!40000 ALTER TABLE `baohanh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitietchucnang`
--

DROP TABLE IF EXISTS `chitietchucnang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietchucnang` (
  `ID_chitietchucnang` int NOT NULL AUTO_INCREMENT,
  `id_quyen` int NOT NULL,
  `id_chucnang` int NOT NULL,
  `trangthai` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_chitietchucnang`),
  UNIQUE KEY `ID_chitietchucnang_UNIQUE` (`ID_chitietchucnang`),
  KEY `fk_chucnang_idx` (`id_chucnang`),
  KEY `fk_quyen_idx` (`id_quyen`),
  CONSTRAINT `fk_chucnang` FOREIGN KEY (`id_chucnang`) REFERENCES `chucnang` (`id_chucnang`),
  CONSTRAINT `FK_QUYEN123` FOREIGN KEY (`id_quyen`) REFERENCES `quyen` (`id_quyen`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietchucnang`
--

LOCK TABLES `chitietchucnang` WRITE;
/*!40000 ALTER TABLE `chitietchucnang` DISABLE KEYS */;
INSERT INTO `chitietchucnang` VALUES (43,1,1,'T'),(44,1,2,'T'),(45,1,3,'T'),(46,1,4,'T'),(47,1,7,'T'),(48,1,8,'T'),(49,1,9,'T'),(50,2,1,'T'),(51,2,2,'T'),(52,2,3,'T'),(53,2,4,'T');
/*!40000 ALTER TABLE `chitietchucnang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietdonhang` (
  `id_chitietdonhang` int NOT NULL AUTO_INCREMENT,
  `id_donhangnew` int NOT NULL,
  `id_dienthoai` int NOT NULL,
  `soluong` int NOT NULL,
  `gia` double NOT NULL,
  `ID_khuyenmai` int NOT NULL,
  `ID_baohanh` int NOT NULL,
  `Giasaukm` double NOT NULL,
  PRIMARY KEY (`id_chitietdonhang`),
  KEY `fk_dienthoai1_idx` (`id_dienthoai`),
  KEY `FK_chitietdonhang` (`id_donhangnew`),
  KEY `FK_khuyenmai_idx` (`ID_khuyenmai`),
  KEY `fk_baohanh1_idx` (`ID_baohanh`),
  CONSTRAINT `fk_baohanh1` FOREIGN KEY (`ID_baohanh`) REFERENCES `baohanh` (`ID_Baohanh`),
  CONSTRAINT `FK_chitietdonhang` FOREIGN KEY (`id_donhangnew`) REFERENCES `donhang` (`id_donhang`),
  CONSTRAINT `fk_dienthoai1` FOREIGN KEY (`id_dienthoai`) REFERENCES `dienthoai` (`ID_dienthoai`),
  CONSTRAINT `fk_khuyenmai1` FOREIGN KEY (`ID_khuyenmai`) REFERENCES `khuyenmai` (`id_khuyenmai`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietdonhang`
--

LOCK TABLES `chitietdonhang` WRITE;
/*!40000 ALTER TABLE `chitietdonhang` DISABLE KEYS */;
INSERT INTO `chitietdonhang` VALUES (1,1,22,1,11499000,1,1,10349100),(2,1,24,1,13990000,1,1,12591000),(3,1,23,1,12599000,1,1,11339100),(4,1,16,1,5800000,1,1,5220000),(5,1,17,1,6990000,1,1,6291000),(6,1,18,1,7990000,1,1,7191000),(7,2,22,4,11499000,1,1,10349100),(8,3,15,3,4990000,1,1,4491000),(10,5,15,5,4990000,1,1,4491000),(11,6,13,2,2990000,1,1,2691000),(12,6,14,3,3990000,1,1,3591000),(13,7,13,1,2990000,1,1,2691000),(14,8,13,10,2990000,1,1,2691000),(15,13,14,1,3990000,1,1,3591000),(16,13,15,1,4990000,1,1,4491000),(17,13,16,1,5800000,1,1,5220000),(18,14,14,9,3990000,1,1,3591000),(19,15,18,1,7990000,1,1,7191000),(20,15,19,1,8990000,1,1,8091000),(21,16,19,9,8990000,1,1,8091000);
/*!40000 ALTER TABLE `chitietdonhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitietphieunhap`
--

DROP TABLE IF EXISTS `chitietphieunhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietphieunhap` (
  `id_chitietphieunhap` int NOT NULL AUTO_INCREMENT,
  `id_phieunhap` int NOT NULL,
  `id_dienthoai` int NOT NULL,
  `soluong` int NOT NULL,
  `gia` double NOT NULL,
  PRIMARY KEY (`id_chitietphieunhap`),
  UNIQUE KEY `id_chitietphieunhap_UNIQUE` (`id_chitietphieunhap`),
  KEY `fk_phieunhap_idx` (`id_phieunhap`),
  KEY `fk_dienthoai1_idx` (`id_dienthoai`),
  CONSTRAINT `FK_DIENTHOAI` FOREIGN KEY (`id_dienthoai`) REFERENCES `dienthoai` (`ID_dienthoai`),
  CONSTRAINT `fk_phieunhap` FOREIGN KEY (`id_phieunhap`) REFERENCES `phieunhap` (`id_phieunhap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietphieunhap`
--

LOCK TABLES `chitietphieunhap` WRITE;
/*!40000 ALTER TABLE `chitietphieunhap` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitietphieunhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chucnang`
--

DROP TABLE IF EXISTS `chucnang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chucnang` (
  `id_chucnang` int NOT NULL AUTO_INCREMENT,
  `tenchucnang` varchar(45) NOT NULL,
  PRIMARY KEY (`id_chucnang`),
  UNIQUE KEY `id_chucnang_UNIQUE` (`id_chucnang`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chucnang`
--

LOCK TABLES `chucnang` WRITE;
/*!40000 ALTER TABLE `chucnang` DISABLE KEYS */;
INSERT INTO `chucnang` VALUES (1,'Quản lí sản phẩm'),(2,'Quản lí Đơn hàng'),(3,'Quản lí Tài khoản'),(4,'Quản lí phiếu nhập'),(7,'Quản lí phân quyền'),(8,'Quản lí thống kê'),(9,'Quản lí chung');
/*!40000 ALTER TABLE `chucnang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dienthoai`
--

DROP TABLE IF EXISTS `dienthoai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dienthoai` (
  `ID_dienthoai` int NOT NULL AUTO_INCREMENT,
  `ID_thuonghieu` int NOT NULL,
  `ID_Nhacungcap` int NOT NULL,
  `Tendt` varchar(45) NOT NULL,
  `Anhdt` varchar(45) NOT NULL,
  `Motadt` longtext,
  `Giadt` int NOT NULL,
  `Soluong` int(10) unsigned zerofill DEFAULT NULL,
  `Luotxem` int(10) unsigned zerofill DEFAULT NULL,
  `ID_khuyenmai` int NOT NULL,
  `ID_baohanh` int NOT NULL,
  `trangthai` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_dienthoai`),
  UNIQUE KEY `ID_dienthoai_UNIQUE` (`ID_dienthoai`),
  KEY `FK_thuonghieu_idx` (`ID_thuonghieu`),
  KEY `FK_Nhacungcap1_idx` (`ID_Nhacungcap`),
  KEY `FK_Khuyenmai_idx` (`ID_khuyenmai`),
  KEY `FK_baohanh_idx` (`ID_baohanh`),
  CONSTRAINT `FK_baohanh` FOREIGN KEY (`ID_baohanh`) REFERENCES `baohanh` (`ID_Baohanh`),
  CONSTRAINT `FK_khuyenmai` FOREIGN KEY (`ID_khuyenmai`) REFERENCES `khuyenmai` (`id_khuyenmai`),
  CONSTRAINT `FK_Nhacungcap1` FOREIGN KEY (`ID_Nhacungcap`) REFERENCES `nhacungcap` (`id_nhacungcap`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_thuonghieu` FOREIGN KEY (`ID_thuonghieu`) REFERENCES `thuonghieu` (`id_thuonghieu`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dienthoai`
--

LOCK TABLES `dienthoai` WRITE;
/*!40000 ALTER TABLE `dienthoai` DISABLE KEYS */;
INSERT INTO `dienthoai` VALUES (13,5,5,'Xiao Mi Mix Fold 2','XiaomiMixFold2.png','Xiaomi MIX Fold 2 là điện thoại màn hình gập thế hệ thứ 2 của công ty và là sản phẩm cạnh tranh với Samsung Galaxy Z Fold 4, OPPO Find N, Vivo Fold X và một vài điện thoại màn hình gập khác trên thị trường hiện nay.',2990000,0000000000,0000000000,1,1,'Active'),(14,5,5,'Xiao Mi 12 Pro','XiaoMi12Pro.png','Xiaomi 12 Pro được Xiaomi trang bị cho chiếc Flagship này tất cả các công nghệ tối tân nhất: Chip mạnh, bộ nhớ siêu nhanh, Camera cực nét và đặc biệt dung lượng Pin cực khủng. ',3990000,0000000000,0000000000,1,1,'Active'),(15,5,5,'Xiao Mi 11  Pro','XiaoMi11Pro.png','Xiaomi 11 Pro được Xiaomi trang bị cho chiếc Flagship này tất cả các công nghệ tối tân nhất: Chip mạnh, bộ nhớ siêu nhanh, Camera cực nét và đặc biệt dung lượng Pin cực khủng. ',4990000,0000000009,0000000000,1,1,'Active'),(16,2,2,'SamSung Z Flip 4','SamsungZFlip4.png','Nhỏ gọn và tinh tế, Samsung Galaxy Z Flip4 là chiếc smartphone sinh ra dành cho các tín đồ thời trang. Cơ chế gập duyên dáng, bộ màu sắc nhẹ nhàng và loạt chức năng quay chụp sẽ làm say lòng những người yêu cái đẹp.',5800000,0000000007,0000000000,1,1,'Not Active'),(17,2,2,'SamSung Galaxy S22','Samsunggalaxys22.png',' Tận hưởng những công nghệ hàng đầu nhà Samsung, Galaxy S22 Plus 5G sẽ cho bạn trải nghiệm đỉnh cao từ thiết kế thời thượng, hiệu năng mạnh mẽ Snapdragon 8 Gen 1 và hệ thống camera đêm chuyên nghiệp nhất từ trước đến nay.',6990000,0000000008,0000000000,1,1,'Active'),(18,2,2,'SamSung Galaxy S23','Samsungalaxy23.jpg','Tự hào là điện thoại Galaxy đầu tiên sở hữu cảm biến tuyệt đỉnh 200MP, Samsung Galaxy S23 Ultra đưa người dùng vào không gian nhiếp ảnh tân tiến vượt trội. Sức mạnh còn bùng nổ với vi xử lý Snapdragon mạnh nhất cho cách mạng hiệu năng gaming đột phá. Tất cả được gói gọn trong thiết kế cao cấp và bền vững cho hiện tại và tương lai.',7990000,0000000009,0000000000,1,1,'Active'),(19,4,3,'Oppo Reno 8','OppoReno8.jpg','Kế thừa một trong những thương hiệu smartphone được lòng người dùng Việt nhất, OPPO Reno8 Z 5G cho thấy nét cuốn hút riêng với phong cách thiết kế độc đáo, độ hoàn thiện tốt, khả năng hỗ trợ 5G và bộ ba camera sau AI 64MP xứng danh chuyên gia chân dung.',8990000,0000000000,0000000000,1,1,'Active'),(20,4,3,'Oppo Reno 7','OppoReno7.jpg','OPPO Reno7 Z 5G chinh phục người dùng ngay từ ánh nhìn đầu tiên với thiết kế thời thượng bậc nhất. Bên trong điện thoại còn có nội lực mạnh mẽ từ công nghệ cải tiến, hệ thống camera chân dung tuyệt đỉnh, vi xử lý Snapdragon 695 5G và sạc siêu tốc 33W, giúp bạn sẵn sàng khám phá cuộc sống tràn đầy màu sắc.',9490000,0000000010,0000000000,1,1,'Active'),(21,4,3,'Oppo Reno 8Z','Oppo2.jpg','Trọn vẹn từng trải nghiệm trên OPPO Reno8 T 5G với nâng cấp toàn diện từ thế hệ chân dung 108MP, màn hình cong 120Hz tuyệt đẹp đến sạc nhanh Super VOOCTM 67W. Bạn sẽ bất ngờ với những gì OPPO Reno8 T 5G mang đến – một siêu phẩm trong tầm giá.T hiết kế OPPO Reno8 T 5G mãn nhãn trong từng trải nghiệm với màn hình cong tràn cạnh hai bên tuyệt đẹp, ôm trọn từng đường nét khi cầm trên tay, chân thực trong mọi góc độ',10999000,0000000010,0000000000,1,1,'Active'),(22,1,1,'Iphone 11 Pro','Iphone11.jpg','Day la Iphone 11',11499000,0000000004,0000000000,1,1,'Not Active'),(23,1,1,'Iphone 12 Pro','Iphone12.jpg','iPhone 12 ra mắt với vai trò mở ra một kỷ nguyên hoàn toàn mới. Tốc độ mạng 5G siêu tốc, bộ vi xử lý A14 Bionic nhanh nhất thế giới smartphone, màn hình OLED tràn cạnh tuyệt đẹp và camera siêu chụp đêm, tất cả đều có mặt trên iPhone 12.',12599000,0000000008,0000000000,1,1,'Not Active'),(24,1,1,'Iphone 13 Pro Max','Iphone13.jpg','iPhone 13 Pro Max được ưu ái trang bị camera chính 48MP hoàn toàn mới, với cảm biến quad-pixel tân tiến. Việc nâng cấp độ phân giải gấp bốn lần iPhone 13 Pro Max và sử dụng cảm biến ảnh lớn hơn 65% giúp hình ảnh trở nên sắc nét chưa từng thấy.',13990000,0000000006,0000000000,1,1,'Not Active'),(32,1,1,'abc','Screenshot 2023-03-04 121057.png','123',0,0000000000,0000000000,1,1,'Active');
/*!40000 ALTER TABLE `dienthoai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donhang` (
  `id_donhang` int NOT NULL AUTO_INCREMENT,
  `ID_Khachhang` int NOT NULL,
  `ID_nhanvien` int NOT NULL,
  `Ngaydathang` date NOT NULL,
  `Tonggiatien` double NOT NULL,
  `Diachigiaohang` varchar(45) NOT NULL,
  `Trangthaidonhang` varchar(45) NOT NULL,
  `MaDH` varchar(10) DEFAULT NULL,
  `NgayGiaoHang` date NOT NULL,
  `NgayCapNhat` date DEFAULT NULL,
  PRIMARY KEY (`id_donhang`),
  UNIQUE KEY `id_donhang_UNIQUE` (`id_donhang`),
  KEY `fk_nhanvien_idx` (`ID_nhanvien`),
  KEY `FK_KHACHHANG_idx` (`ID_Khachhang`),
  CONSTRAINT `FK_KHACHHANG` FOREIGN KEY (`ID_Khachhang`) REFERENCES `khachhang` (`id_khachhang`),
  CONSTRAINT `FK_NHANVIEN123` FOREIGN KEY (`ID_nhanvien`) REFERENCES `nhanvien` (`id_nhanvien`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donhang`
--

LOCK TABLES `donhang` WRITE;
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
INSERT INTO `donhang` VALUES (1,3,1,'2023-04-04',52981200,'256/27 Lãnh Binh Thăng P13 Q11','Đã hủy','MD001','2023-04-11',NULL),(2,3,3,'2023-04-04',41396400,'256/27 Lãnh Binh Thăng P13 Q11','Đã giao','MD002','2023-04-11','2023-04-18'),(3,3,3,'2023-04-04',13473000,'256/27 Lãnh Binh Thăng P13 Q11','Đã giao','MD003','2023-04-11','2023-04-17'),(5,3,1,'2023-04-04',22455000,'256/27 Lãnh Binh Thăng P13 Q11','Đã giao','MD005','2023-04-11',NULL),(6,3,1,'2023-04-10',16155000,'256/27 Lãnh Binh Thăng P13 Q11','Đã hủy',NULL,'2023-04-17',NULL),(7,3,1,'2023-04-18',2691000,'256/27 Lãnh Binh Thăng P13 Q11','Đã hủy','MD007','2023-04-25',NULL),(8,3,3,'2023-04-25',26910000,'256/27 Lãnh Binh Thăng P13 Q11','Đã hủy','MD008','2023-05-02','2023-05-09'),(10,3,1,'2023-05-09',120000000,'ABC','Đang xử lí','MD009','2023-05-09',NULL),(11,3,1,'2023-05-09',120000000,'ABC','Đang xử lí','MD011','2023-05-09',NULL),(12,3,1,'2023-05-09',120000000,'ABC','Đang xử lí','MD012','2023-05-09',NULL),(13,3,1,'2023-05-09',13302000,'256/27 Lãnh Binh Thăng P13 Q11','Đang xử lí','MD013','2023-05-16',NULL),(14,3,1,'2023-05-09',32319000,'256/27 Lãnh Binh Thăng P13 Q11','Đang xử lí','MD014','2023-05-16',NULL),(15,3,1,'2023-05-09',15282000,'256/27 Lãnh Binh Thăng P13 Q11','Đang xử lí','MD015','2023-05-16',NULL),(16,4,3,'2023-05-09',72819000,'abc','Đã giao','MD016','2023-05-16','2023-05-09');
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khachhang` (
  `id_khachhang` int NOT NULL AUTO_INCREMENT,
  `tentaikhoan` varchar(45) NOT NULL,
  `tenkhachhang` varchar(45) DEFAULT NULL,
  `gioitinh` varchar(5) DEFAULT NULL,
  `diachi` varchar(45) DEFAULT NULL,
  `sdt` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_khachhang`),
  UNIQUE KEY `id_khachhang_UNIQUE` (`id_khachhang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES (2,'luongkieuvy',NULL,NULL,'lanh binh thang','0769962548','luongkieuvy@gmail.com'),(3,'diplamtuan','','','256/27 Lãnh Binh Thăng P13 Q11','0768862538','diplamtuan@gmail.com'),(4,'abc',NULL,NULL,'abc','0768844528','abc@gmail.com');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khuyenmai`
--

DROP TABLE IF EXISTS `khuyenmai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khuyenmai` (
  `id_khuyenmai` int NOT NULL AUTO_INCREMENT,
  `tenkhuyenmai` varchar(45) NOT NULL,
  `motakhuyenmai` varchar(45) DEFAULT NULL,
  `Sogiamgia` int NOT NULL,
  `trangthai` varchar(10) NOT NULL,
  PRIMARY KEY (`id_khuyenmai`),
  UNIQUE KEY `id_khuyenmai_UNIQUE` (`id_khuyenmai`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khuyenmai`
--

LOCK TABLES `khuyenmai` WRITE;
/*!40000 ALTER TABLE `khuyenmai` DISABLE KEYS */;
INSERT INTO `khuyenmai` VALUES (1,'Tết nguyên đán','Không',10,'T'),(2,'Nodel','Không',20,'T'),(3,'30/4','Không',15,'T'),(4,'Tết Trung Thu','Không',25,'T');
/*!40000 ALTER TABLE `khuyenmai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhacungcap` (
  `id_nhacungcap` int NOT NULL AUTO_INCREMENT,
  `tennhacungcap` varchar(45) NOT NULL,
  PRIMARY KEY (`id_nhacungcap`),
  UNIQUE KEY `id_nhacungcap_UNIQUE` (`id_nhacungcap`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhacungcap`
--

LOCK TABLES `nhacungcap` WRITE;
/*!40000 ALTER TABLE `nhacungcap` DISABLE KEYS */;
INSERT INTO `nhacungcap` VALUES (1,'Hãng Iphone'),(2,'Hãng Samsung'),(3,'Hãng OPPO'),(4,'Hãng Huawei'),(5,'Hãng Xiaomi'),(6,'Hãng Google');
/*!40000 ALTER TABLE `nhacungcap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhanvien` (
  `id_nhanvien` int NOT NULL AUTO_INCREMENT,
  `tennhanvien` varchar(45) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(45) DEFAULT NULL,
  `gioitinh` varchar(5) DEFAULT NULL,
  `sdt` varchar(45) DEFAULT NULL,
  `ID_quyen` int NOT NULL,
  PRIMARY KEY (`id_nhanvien`),
  UNIQUE KEY `id_nhanvien_UNIQUE` (`id_nhanvien`),
  KEY `FK_TENdangnhap_idx` (`tennhanvien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhanvien`
--

LOCK TABLES `nhanvien` WRITE;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
INSERT INTO `nhanvien` VALUES (1,'Mặc định',NULL,NULL,NULL,NULL,1),(3,'admin',NULL,NULL,NULL,NULL,1),(4,'admin2',NULL,NULL,NULL,NULL,2),(5,'admin3',NULL,NULL,NULL,NULL,3);
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieunhap`
--

DROP TABLE IF EXISTS `phieunhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phieunhap` (
  `id_phieunhap` int NOT NULL AUTO_INCREMENT,
  `maphieunhap` varchar(45) NOT NULL,
  `id_nhacungcap` int NOT NULL,
  `id_nhanvien` int NOT NULL,
  `tongtien` double NOT NULL,
  `Ngaynhap` date NOT NULL,
  `Tongsoluong` int NOT NULL,
  `trangthai` varchar(45) NOT NULL,
  PRIMARY KEY (`id_phieunhap`),
  UNIQUE KEY `id_phieunhap_UNIQUE` (`id_phieunhap`),
  KEY `fk_nhacungcap_idx` (`id_nhacungcap`),
  KEY `fk_nhanvien_idx` (`id_nhanvien`),
  CONSTRAINT `fk_nhacungcap` FOREIGN KEY (`id_nhacungcap`) REFERENCES `nhacungcap` (`id_nhacungcap`),
  CONSTRAINT `fk_nhanvien` FOREIGN KEY (`id_nhanvien`) REFERENCES `nhanvien` (`id_nhanvien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieunhap`
--

LOCK TABLES `phieunhap` WRITE;
/*!40000 ALTER TABLE `phieunhap` DISABLE KEYS */;
/*!40000 ALTER TABLE `phieunhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quyen`
--

DROP TABLE IF EXISTS `quyen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quyen` (
  `id_quyen` int NOT NULL AUTO_INCREMENT,
  `tenquyen` varchar(45) NOT NULL,
  PRIMARY KEY (`id_quyen`),
  UNIQUE KEY `id_quyen_UNIQUE` (`id_quyen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quyen`
--

LOCK TABLES `quyen` WRITE;
/*!40000 ALTER TABLE `quyen` DISABLE KEYS */;
INSERT INTO `quyen` VALUES (1,'Admin'),(2,'Nhân Viên'),(3,'Quản lí');
/*!40000 ALTER TABLE `quyen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taikhoan` (
  `id_taikhoan` int NOT NULL AUTO_INCREMENT,
  `tendangnhap` varchar(45) NOT NULL,
  `matkhau` varchar(45) NOT NULL,
  `loaitaikhoan` int NOT NULL,
  `trangthai` varchar(20) NOT NULL,
  `ngaytao` date NOT NULL,
  PRIMARY KEY (`id_taikhoan`),
  UNIQUE KEY `id_taikhoan_UNIQUE` (`id_taikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taikhoan`
--

LOCK TABLES `taikhoan` WRITE;
/*!40000 ALTER TABLE `taikhoan` DISABLE KEYS */;
INSERT INTO `taikhoan` VALUES (3,'luongkieuvy','1231231',1,'F','2023-04-04'),(4,'diplamtuan','1231231',1,'T','2023-04-04'),(5,'admin','1231231',2,'T','2023-04-08'),(6,'admin2','1231231',2,'T','2023-05-04'),(7,'admin3','1231231',2,'T','2023-05-04'),(8,'abc','1231231',1,'T','2023-05-09');
/*!40000 ALTER TABLE `taikhoan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuonghieu`
--

DROP TABLE IF EXISTS `thuonghieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thuonghieu` (
  `id_thuonghieu` int NOT NULL AUTO_INCREMENT,
  `tenthuonghieu` varchar(45) NOT NULL,
  `anh` varchar(45) NOT NULL,
  PRIMARY KEY (`id_thuonghieu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuonghieu`
--

LOCK TABLES `thuonghieu` WRITE;
/*!40000 ALTER TABLE `thuonghieu` DISABLE KEYS */;
INSERT INTO `thuonghieu` VALUES (1,'Iphone','iphone.jpg'),(2,'Samsung','samsung.jpg'),(3,'Huawei','huawei.jpg'),(4,'Oppo','oppo.jpg'),(5,'xiaomi','xiaomi.jpg'),(9,'Google','google.png');
/*!40000 ALTER TABLE `thuonghieu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-22 10:34:07
