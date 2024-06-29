-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for goodshot
CREATE DATABASE IF NOT EXISTS `goodshot` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `goodshot`;

-- Dumping structure for table goodshot.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `category` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img_path` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100044 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table goodshot.products: ~43 rows (approximately)
REPLACE INTO `products` (`product_id`, `name`, `price`, `quantity`, `category`, `img_path`) VALUES
	(100001, 'ZEST-O CHOC-O CHOCOLATE DRINK 250ML', 31.45, 3, 'BEVERAGES', '../../assets/img/products/choc-o-250-ml.JPG'),
	(100002, 'POCARI SWEAT ION SUPPLY DRINK 2L', 176.90, 8, 'BEVERAGES', '../../assets/img/products/pocari-sweat-ion-drink-2l_2.JPG'),
	(100003, 'ACTIVE Creatine Monohydrate 300g', 699.00, 224, 'SUPPLEMENT', '../../assets/img/products/active-creatine-300-g.JPG'),
	(100004, 'Cobra Energy Drink 350ml', 25.00, 500, 'BEVERAGES', '../../assets/img/products/cobra-350-ml.JPG'),
	(100005, 'Gatorade Blue Bolt 500ml', 35.00, 400, 'BEVERAGES', '../../assets/img/products/gatorade-blue-bolt-500ml_2.JPG'),
	(100006, 'Lays Classic Potato Chips 184g', 150.00, 150, 'SNACKS', '../../assets/img/products/lays-classic-184-g.JPG'),
	(100007, 'Oishi Prawn Crackers 90g', 35.00, 300, 'SNACKS', '../../assets/img/products/oishi-prawn-crax-90g.JPG'),
	(100008, 'Fresh Pork Belly 1kg', 300.00, 50, 'FRESH MEAT', '../../assets/img/products/fresh-pork-belly-1kg.JPG'),
	(100009, 'Fresh Chicken Breast 1kg', 220.00, 60, 'FRESH MEAT', '../../assets/img/products/fresh-chix-breast-1kg.JPG'),
	(100010, 'Gardenia Classic White Bread 600g', 65.00, 120, 'SNACKS', '../../assets/img/products/gardenia-classic-white-bread-600-g.JPG'),
	(100011, 'Nestle Fresh Milk 1L', 75.00, 200, 'BEVERAGES', '../../assets/img/products/nestle-fresh-milk-1L.JPG'),
	(100012, 'Yakult Probiotic Drink 80ml', 10.00, 600, 'BEVERAGES', '../../assets/img/products/yakult-probiotic-80-ml.JPG'),
	(100013, 'Whey Protein Chocolate 2kg', 2500.00, 100, 'SUPPLEMENT', '../../assets/img/products/whey-protein-choc-2-kg.JPG'),
	(100014, 'One a Day Multivitamin 100 Tablets', 850.00, 80, 'SUPPLEMENT', '../../assets/img/products/one-a-day-multivitamin.JPG'),
	(100015, 'Chips Ahoy! Cookies 368g', 180.00, 140, 'SNACKS', '../../assets/img/products/chips-ahoy-cookies-368-g.JPG'),
	(100016, 'Nescafe Classic 100g', 95.00, 250, 'BEVERAGES', '../../assets/img/products/nescafe-classic-100-g.JPG'),
	(100017, 'San Miguel Pale Pilsen 330ml', 32.00, 300, 'BEVERAGES', '../../assets/img/products/san-miguel-pale-pilsen-330-ml.JPG'),
	(100018, 'Century Tuna Flakes in Oil 180g', 35.00, 400, 'SNACKS', '../../assets/img/products/century-tuna-flakes-in-oil-180-g.JPG'),
	(100019, 'C2 Green Tea Apple 500ml', 25.00, 500, 'BEVERAGES', '../../assets/img/products/c2-green-tea-apple-500-ml.JPG'),
	(100020, 'Fresh Beef Sirloin 1kg', 400.00, 40, 'FRESH MEAT', '../../assets/img/products/fresh-beef-sirloin-1kg.JPG'),
	(100021, 'Ribena Blackcurrant Juice Drink 1L', 85.00, 100, 'BEVERAGES', '../../assets/img/products/ribena-blackcurrant-juice-1L.JPG'),
	(100022, 'Red Bull Energy Drink 250ml', 50.00, 200, 'BEVERAGES', '../../assets/img/products/red-bull-energy-drink-250-ml.JPG'),
	(100023, 'Maggi Magic Sarap All-in-One Seasoning 8g', 2.00, 1000, 'SNACKS', '../../assets/img/products/maggi-magic-sarap-all-in-one-seasoning-8g.JPG'),
	(100024, 'Del Monte Pineapple Juice 240ml', 25.00, 300, 'BEVERAGES', '../../assets/img/products/del-monte-pineapplejuice-240-ml.JPG'),
	(100025, 'Farm Fresh Eggs 1 Dozen', 90.00, 150, 'FRESH MEAT', '../../assets/img/products/farm-fresh-eggs-1-dozen.JPG'),
	(100026, 'Oishi Pillows Ube 85g', 18.00, 250, 'SNACKS', '../../assets/img/products/oishi-pillows-ube-85g.JPG'),
	(100027, 'Fita Crackers 10x30g', 55.00, 500, 'SNACKS', '../../assets/img/products/fita-crackers-10x30g.JPG'),
	(100028, 'Enervon-C Multivitamins 30 Tablets', 150.00, 90, 'SUPPLEMENT', '../../assets/img/products/enervon-c-multivitamins-30-tablets.JPG'),
	(100029, 'Pringles Original 107g', 100.00, 120, 'SNACKS', '../../assets/img/products/pringles-original-107g.JPG'),
	(100030, 'Milo Powdered Drink 1kg', 185.00, 180, 'BEVERAGES', '../../assets/img/products/milo-powdered-drink-1kg.JPG'),
	(100031, 'Purefoods Tender Juicy Hotdog 1kg', 180.00, 80, 'PROCESSED FOOD', '../../assets/img/products/purefoods-tender-juicy-hotdog-1kg.JPG'),
	(100032, 'San Marino Corned Tuna 180g', 40.00, 200, 'SNACKS', '../../assets/img/products/san-marino-corned-tuna-180g.JPG'),
	(100033, 'Gatorade Orange 500ml', 35.00, 400, 'BEVERAGES', '../../assets/img/products/gatorade-orange-500ml.JPG'),
	(100034, 'Quaker Oats 1kg', 180.00, 150, 'SNACKS', '../../assets/img/products/quaker-oats-1kg.JPG'),
	(100035, 'Lucky Me Pancit Canton 80g', 12.00, 600, 'SNACKS', '../../assets/img/products/lucky-me-pancit-canton-80g.JPG'),
	(100036, 'Datu Puti Vinegar 1L', 30.00, 200, 'SNACKS', '../../assets/img/products/datu-puti-vinegar-1L.JPG'),
	(100037, 'Purefoods Corned Beef 150g', 45.00, 350, 'PROCESSED FOOD', '../../assets/img/products/pure-foods-corned-beef-150g.JPG'),
	(100038, 'Argentina Beef Loaf 150g', 35.00, 300, 'PROCESSED FOOD', '../../assets/img/products/argentina-beef-loaf-150g.JPG'),
	(100039, 'Maya Hotcake Mix 200g', 50.00, 100, 'SNACKS', '../../assets/img/products/maya-hotcake-mix-200g.JPG'),
	(100040, 'Magnolia Chicken Nuggets 450g', 150.00, 80, 'PROCESSED FOOD', '../../assets/img/products/cobra-350-ml.JPG'),
	(100041, 'Clover Chips Cheese 85g', 20.00, 250, 'SNACKS', '../../assets/img/products/clover-chips-cheese-85g.JPG'),
	(100042, 'Sarsi Root Beer 330ml', 25.00, 200, 'BEVERAGES', '../../assets/img/products/sarsi-root-beer-330ml.JPG'),
	(100043, 'Lipton Iced Tea Lemon 500ml', 30.00, 300, 'BEVERAGES', '../../assets/img/products/lipton-iced-tea-lemon-500ml.JPG');

-- Dumping structure for table goodshot.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transactionID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `cashierName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `pdfFilePath` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table goodshot.sales: ~5 rows (approximately)
REPLACE INTO `sales` (`id`, `transactionID`, `date`, `cashierName`, `totalAmount`, `pdfFilePath`, `created_at`) VALUES
	(1, 'trans_6677a2c84e9f0', '2024-06-23 04:21:28', 'John Doe', 100.00, '/path/to/invoice.pdf', '2024-06-23 04:21:28'),
	(2, 'trans_6677a2f3eef61', '2024-06-23 04:22:11', 'John Doe', 100.00, '/path/to/invoice.pdf', '2024-06-23 04:22:11'),
	(3, 'trans_6677a3cab7470', '2024-06-23 04:25:46', 'John Doe', 100.00, '/var/www/goodshots.xyz/includes/receipts/invoice.pdf', '2024-06-23 04:25:46'),
	(4, 'trans_6677a48f7bc76', '2024-06-23 04:29:03', 'John Doe', 100.00, '/var/www/goodshots.xyz/public_html/includes/receipts/invoice.pdf', '2024-06-23 04:29:03'),
	(5, 'trans_6677a49d295b4', '2024-06-23 04:29:17', 'John Doe', 100.00, '/var/www/goodshots.xyz/public_html/includes/receipts/invoice.pdf', '2024-06-23 04:29:17');

-- Dumping structure for table goodshot.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table goodshot.users: ~2 rows (approximately)
REPLACE INTO `users` (`id`, `firstName`, `lastName`, `username`, `password`, `role`) VALUES
	(1, 'ADMIN', 'ADMIN', 'admin', '12345', 'admin'),
	(2, 'Brando', 'Dela Torre', 'cashier', '54321', 'cashier');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
