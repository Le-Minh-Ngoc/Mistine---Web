CREATE DATABASE product_management;
USE product_management;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Kem nền','Sản phẩm giúp tạo lớp nền mịn màng, đều màu, che khuyết điểm hiệu quả','2025-05-28 16:18:54'),(2,'Son','Các loại son môi đa dạng màu sắc và chất son giúp tôn lên vẻ đẹp tự nhiên.','2025-05-28 16:18:57'),(3,'Kem chống nắng','Bảo vệ da khỏi tác hại của tia UV, ngăn ngừa lão hóa và sạm da.','2025-05-28 16:19:00'),(4,'Trang điểm','Tổng hợp các sản phẩm trang điểm như phấn, má hồng, kẻ mắt, v.v.','2025-05-28 16:37:50');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `status` enum('active','pending','out_of_stock') DEFAULT 'active',
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sold` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'N01','Kem nền dưỡng ẩm',1,199000.00,23,'active','Thoải mái tự tin','cn-11134207-7qukw-ljmz9yzmk73o6f.jpg','2025-05-28 16:19:19',10),(2,'N02','Kem nền lâu trôi',1,199000.00,0,'active','Bền lì, lâu trôi tới 24h','393b5db4d841454e824b6267da7aa81d_ffb511b81a0d4721a2a2e56aace063a1_grande.webp','2025-05-28 16:23:37',50),(3,'N03','Kem nền kiềm dầu',1,199000.00,30,'active','Kiềm dầu tới 24h','vn-11134207-7r98o-lwi9y0qs0cex16.jpg','2025-05-28 16:24:18',10),(4,'N10','Cushion',1,359000.00,4,'active','Mỏng nhẹ tự nhiên','cn-11134207-7r98o-lwi27j0youo54b.jpg','2025-05-28 16:25:02',36),(5,'S01','Son bóng',2,159000.00,35,'active','Màu sắc thời thượng, dễ phối','cn-11134207-7ras8-m9tu80qpvu6q1c_tn.jpg','2025-05-28 16:30:25',15),(6,'S02','Son lì',2,159000.00,21,'active','Giữ màu lâu, tự tin ăn uống','lSw6MLkksKux05mp7K7r_simg_de2fe0_500x500_maxb.jpg','2025-05-28 16:37:39',4),(7,'K01','Kem chống nắng',3,259000.00,15,'active','Vui chơi cả ngày','61Tas0ux53L.jpg','2025-05-28 16:39:43',8),(8,'T01','Bút kẻ mắt',4,99000.00,2,'active','Giúp mắt có hồn hơn','342686143395.png','2025-05-28 16:40:51',18),(9,'T02','Che khuyết điểm',4,99000.00,9,'active','Tự tin rạng rỡ, không lo khuyết điểm','cn-11134208-7r98o-luk42wu33di69e.jpg','2025-05-28 16:42:01',5),(10,'T03','Xịt khóa nền',4,129000.00,5,'active','Thoải mái đi chơi ngày dài','cn-11134207-7qukw-lir27bqneoae30.jpg','2025-05-28 16:42:55',30),(11,'T04','Mascara',4,129000.00,8,'active','Chống nước, chống nhòe, lâu trôi','sg-11134201-7rd5m-lvpj61y9s3wy3e.jpg','2025-05-29 08:09:57',32),(12,'T05','Phấn phủ',4,299000.00,14,'active','Kiềm dầu lâu trôi, làm sáng da','sg-11134201-7rd4p-lwwjxqnor3xbb5.jpg','2025-05-29 08:12:58',16);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','87468b27b5a411eb8e34a119a44e71d9','Hà Nội','2004-07-29',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

