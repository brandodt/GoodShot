-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2024 at 06:51 PM
-- Server version: 8.0.37-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodshot`
--
CREATE DATABASE IF NOT EXISTS `goodshot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `goodshot`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `category`
--

TRUNCATE TABLE `category`;
--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'BEVERAGES'),
(2, 'SNACKS'),
(3, 'SUPPLEMENT'),
(4, 'MEAT'),
(5, 'CANNED GOODS'),
(6, 'CONDIMENTS'),
(7, 'SHAMPOO');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `supplier_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `date` date DEFAULT NULL,
  `img_path` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `products`
--

TRUNCATE TABLE `products`;
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `supplier_id`, `category_id`, `name`, `price`, `cost`, `quantity`, `date`, `img_path`) VALUES
(100002, 5, 1, 'POCARI SWEAT ION SUPPLY DRINK 2L', 176.90, 88.45, 0, '2024-05-23', '../../assets/img/products/pocari-sweat-ion-drink-2l_2.JPG'),
(100003, 2, 3, 'ACTIVE Creatine Monohydrate 300g', 699.00, 349.50, 184, '2024-06-22', '../../assets/img/products/active-creatine-300-g.JPG'),
(100004, 5, 1, 'Cobra Energy Drink 350ml', 25.00, 12.50, 476, '2024-05-23', '../../assets/img/products/cobra-350-ml.JPG'),
(100005, 5, 1, 'Gatorade Blue Bolt 500ml', 35.00, 17.50, 382, '2024-05-23', '../../assets/img/products/gatorade-blue-bolt-500ml_2.JPG'),
(100006, 2, 2, 'Lays Classic Potato Chips 184g', 150.00, 75.00, 146, '2024-07-01', '../../assets/img/products/lays-classic-184-g.JPG'),
(100007, 2, 2, 'Oishi Prawn Crackers 90g', 35.00, 17.50, 299, '2024-07-01', '../../assets/img/products/oishi-prawn-crax-90g.JPG'),
(100008, 4, 4, 'Fresh Pork Belly 1kg', 300.00, 150.00, 48, '2024-07-23', '../../assets/img/products/fresh-pork-belly-1kg.JPG'),
(100009, 4, 4, 'Fresh Chicken Breast 1kg', 220.00, 110.00, 53, '2024-07-23', '../../assets/img/products/fresh-chix-breast-1kg.JPG'),
(100010, 3, 2, 'Gardenia Classic White Bread 600g', 65.00, 32.50, 117, '2024-07-01', '../../assets/img/products/gardenia-classic-white-bread-600-g.JPG'),
(100011, 1, 1, 'Nestle Fresh Milk 1L', 75.00, 37.50, 193, '2024-05-23', '../../assets/img/products/nestle-fresh-milk-1L.JPG'),
(100012, 1, 1, 'Yakult Probiotic Drink 80ml', 10.00, 5.00, 589, '2024-05-23', '../../assets/img/products/yakult-probiotic-80-ml.JPG'),
(100013, 2, 3, 'Whey Protein Chocolate 2kg', 2500.00, 1250.00, 98, '2024-06-22', '../../assets/img/products/whey-protein-choc-2-kg.JPG'),
(100014, 2, 3, 'One a Day Multivitamin 100 Tablets', 850.00, 425.00, 79, '2024-06-22', '../../assets/img/products/one-a-day-multivitamin.JPG'),
(100015, 3, 2, 'Chips Ahoy! Cookies 368g', 180.00, 90.00, 135, '2024-07-01', '../../assets/img/products/chips-ahoy-cookies-368-g.JPG'),
(100016, 1, 1, 'Nescafe Classic 100g', 95.00, 47.50, 242, '2024-05-23', '../../assets/img/products/nescafe-classic-100-g.JPG'),
(100017, 5, 1, 'San Miguel Pale Pilsen 330ml', 32.00, 16.00, 294, '2024-05-23', '../../assets/img/products/san-miguel-pale-pilsen-330-ml.JPG'),
(100018, 3, 5, 'Century Tuna Flakes in Oil 180g', 35.00, 17.50, 398, '2024-07-01', '../../assets/img/products/century-tuna-flakes-in-oil-180-g.JPG'),
(100019, 5, 1, 'C2 Green Tea Apple 500ml', 25.00, 12.50, 498, '2024-05-23', '../../assets/img/products/c2-green-tea-apple-500-ml.JPG'),
(100020, 4, 4, 'Fresh Beef Sirloin 1kg', 400.00, 200.00, 19, '2024-07-23', '../../assets/img/products/fresh-beef-sirloin-1kg.JPG'),
(100021, 5, 1, 'Ribena Blackcurrant Juice Drink 1L', 85.00, 42.50, 96, '2024-05-23', '../../assets/img/products/ribena-blackcurrant-juice-1L.JPG'),
(100022, 5, 1, 'Red Bull Energy Drink 250ml', 50.00, 25.00, 184, '2024-05-23', '../../assets/img/products/red-bull-energy-drink-250-ml.JPG'),
(100023, 1, 6, 'Maggi Magic Sarap All-in-One Seasoning 8g', 2.00, 1.00, 989, '2024-07-01', '../../assets/img/products/maggi-magic-sarap-all-in-one-seasoning-8g.JPG'),
(100024, 1, 1, 'Del Monte Pineapple Juice 240ml', 25.00, 12.50, 294, '2024-05-23', '../../assets/img/products/del-monte-pineapplejuice-240-ml.JPG'),
(100025, 4, 4, 'Farm Fresh Eggs 1 Dozen', 90.00, 45.00, 146, '2024-07-23', '../../assets/img/products/farm-fresh-eggs-1-dozen.JPG'),
(100026, 2, 2, 'Oishi Pillows Ube 85g', 18.00, 9.00, 248, '2024-07-01', '../../assets/img/products/oishi-pillows-ube-85g.JPG'),
(100027, 3, 2, 'Fita Crackers 10x30g', 55.00, 27.50, 493, '2024-07-01', '../../assets/img/products/fita-crackers-10x30g.JPG'),
(100028, 2, 3, 'Enervon-C Multivitamins 30 Tablets', 150.00, 75.00, 83, '2024-06-22', '../../assets/img/products/enervon-c-multivitamins-30-tablets.JPG'),
(100029, 2, 2, 'Pringles Original 107g', 100.00, 50.00, 114, '2024-07-01', '../../assets/img/products/pringles-original-107g.JPG'),
(100030, 1, 1, 'Milo Powdered Drink 1kg', 185.00, 92.50, 177, '2024-05-23', '../../assets/img/products/milo-powdered-drink-1kg.JPG'),
(100031, 3, 2, 'Purefoods Tender Juicy Hotdog 1kg', 180.00, 90.00, 75, '2024-06-17', '../../assets/img/products/purefoods-tender-juicy-hotdog-1kg.JPG'),
(100032, 3, 5, 'San Marino Corned Tuna 180g', 40.00, 20.00, 199, '2024-07-01', '../../assets/img/products/san-marino-corned-tuna-180g.JPG'),
(100033, 5, 1, 'Gatorade Orange 500ml', 35.00, 17.50, 393, '2024-05-23', '../../assets/img/products/gatorade-orange-500ml.JPG'),
(100034, 1, 2, 'Quaker Oats 1kg', 180.00, 90.00, 149, '2024-07-01', '../../assets/img/products/quaker-oats-1kg.JPG'),
(100035, 2, 2, 'Lucky Me Pancit Canton 80g', 12.00, 6.00, 600, '2024-07-01', '../../assets/img/products/lucky-me-pancit-canton-80g.JPG'),
(100036, 1, 6, 'Datu Puti Vinegar 1L', 30.00, 15.00, 191, '2024-06-14', '../../assets/img/products/datu-puti-vinegar-1L.JPG'),
(100037, 3, 4, 'Purefoods Corned Beef 150g', 45.00, 22.50, 339, '2024-06-12', '../../assets/img/products/pure-foods-corned-beef-150g.JPG'),
(100038, 3, 4, 'Argentina Beef Loaf 150g', 35.00, 17.50, 291, '2024-06-12', '../../assets/img/products/argentina-beef-loaf-150g.JPG'),
(100039, 3, 2, 'Maya Hotcake Mix 200g', 50.00, 25.00, 99, '2024-07-01', '../../assets/img/products/maya-hotcake-mix-200g.JPG'),
(100040, 3, 4, 'Magnolia Chicken Nuggets 450g', 150.00, 75.00, 79, '2024-06-17', '../../assets/img/products/cobra-350-ml.JPG'),
(100041, 2, 2, 'Clover Chips Cheese 85g', 20.00, 10.00, 249, '2024-07-01', '../../assets/img/products/clover-chips-cheese-85g.JPG'),
(100042, 5, 1, 'Sarsi Root Beer 330ml', 25.00, 12.50, 200, '2024-05-23', '../../assets/img/products/sarsi-root-beer-330ml.JPG'),
(100043, 5, 1, 'Lipton Iced Tea Lemon 500ml', 30.00, 15.00, 295, '2024-05-23', '../../assets/img/products/lipton-iced-tea-lemon-500ml.JPG'),
(100050, 3, 5, 'Century Tuna Hot Spicy', 100.00, 50.00, 245, '2024-07-01', '../../assets/img/products/century-tuna-hot-spicy-180g.png');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `cashier_id` int DEFAULT NULL,
  `transactNo` bigint NOT NULL,
  `quantity_sold` int DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `sale_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `sales`
--

TRUNCATE TABLE `sales`;
--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `product_id`, `cashier_id`, `transactNo`, `quantity_sold`, `total_amount`, `sale_date`) VALUES
(70, 100003, 2, 20240701121116, 1, 699.00, '2024-06-30 12:11:22'),
(71, 100004, 2, 20240701121116, 1, 25.00, '2024-07-01 12:11:22'),
(72, 100005, 2, 20240701121116, 1, 35.00, '2024-06-30 12:11:22'),
(73, 100017, 2, 20240701121331, 1, 32.00, '2024-06-30 12:14:16'),
(75, 100004, 2, 20240701121331, 1, 25.00, '2024-06-30 12:14:16'),
(77, 100007, 2, 20240701121331, 1, 35.00, '2024-06-30 12:14:16'),
(78, 100008, 2, 20240701121331, 1, 300.00, '2024-07-01 12:14:16'),
(79, 100005, 2, 20240701121331, 1, 35.00, '2024-06-30 12:25:12'),
(80, 100006, 2, 20240701121331, 1, 150.00, '2024-07-01 12:25:12'),
(81, 100014, 2, 20240701121331, 1, 850.00, '2024-07-02 12:26:36'),
(82, 100015, 2, 20240701121331, 1, 180.00, '2024-07-02 12:26:36'),
(83, 100016, 2, 20240701121331, 1, 95.00, '2024-07-02 12:26:36'),
(84, 100018, 2, 20240701121331, 1, 35.00, '2024-07-02 12:26:36'),
(85, 100019, 2, 20240701121331, 1, 25.00, '2024-07-01 12:26:36'),
(86, 100004, 2, 20240701121331, 1, 25.00, '2024-07-02 12:26:36'),
(87, 100012, 2, 20240701121331, 2, 20.00, '2024-07-03 12:30:23'),
(88, 100013, 2, 20240701121331, 1, 2500.00, '2024-07-03 12:30:23'),
(89, 100017, 2, 20240701121331, 2, 64.00, '2024-07-03 12:30:23'),
(90, 100020, 2, 20240701121331, 3, 1200.00, '2024-07-05 12:33:43'),
(91, 100021, 2, 20240701121331, 1, 85.00, '2024-07-03 12:33:43'),
(92, 100022, 2, 20240701121331, 1, 50.00, '2024-07-01 12:33:43'),
(93, 100024, 2, 20240701121331, 1, 25.00, '2024-07-02 12:33:43'),
(94, 100027, 2, 20240701121331, 1, 55.00, '2024-07-01 12:33:43'),
(95, 100028, 2, 20240701121331, 1, 150.00, '2024-07-02 12:33:43'),
(96, 100026, 2, 20240701121331, 2, 36.00, '2024-07-04 12:33:43'),
(97, 100009, 2, 20240701121331, 2, 440.00, '2024-07-02 12:33:43'),
(98, 100010, 2, 20240701121331, 3, 195.00, '2024-07-04 12:35:06'),
(99, 100022, 2, 20240701121331, 2, 100.00, '2024-07-01 12:35:06'),
(100, 100025, 2, 20240701121331, 2, 180.00, '2024-07-05 12:35:06'),
(101, 100028, 2, 20240701121331, 2, 300.00, '2024-07-01 12:35:06'),
(102, 100043, 2, 20240701121331, 5, 150.00, '2024-07-06 12:35:06'),
(103, 100011, 2, 20240701121331, 2, 150.00, '2024-07-06 12:36:31'),
(104, 100015, 2, 20240701121331, 3, 540.00, '2024-07-05 12:36:31'),
(105, 100021, 2, 20240701121331, 3, 255.00, '2024-07-06 12:36:31'),
(106, 100024, 2, 20240701121331, 4, 100.00, '2024-07-05 12:36:31'),
(107, 100029, 2, 20240701121331, 5, 500.00, '2024-06-30 12:36:31'),
(108, 100031, 2, 20240701121331, 3, 540.00, '2024-07-05 12:36:31'),
(109, 100031, 2, 20240701121331, 2, 360.00, '2024-07-01 12:40:57'),
(110, 100037, 2, 20240701121331, 7, 315.00, '2024-07-01 12:40:57'),
(111, 100038, 2, 20240701121331, 5, 175.00, '2024-07-03 12:40:57'),
(112, 100050, 2, 20240701121331, 5, 500.00, '2024-07-06 12:42:11'),
(113, 100036, 2, 20240701121331, 5, 150.00, '2024-07-04 12:42:11'),
(114, 100033, 2, 20240701121331, 6, 210.00, '2024-07-03 12:42:11'),
(115, 100027, 2, 20240701121331, 6, 330.00, '2024-07-04 12:43:53'),
(116, 100028, 2, 20240701121331, 3, 450.00, '2024-07-04 12:43:53'),
(117, 100030, 2, 20240701121331, 3, 555.00, '2024-07-01 12:43:53'),
(119, 100003, 2, 20240701182609, 3, 2097.00, '2024-07-01 18:26:24'),
(120, 100003, 2, 20240701182829, 4, 2796.00, '2024-07-01 18:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int NOT NULL,
  `supplier_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `suppliers`
--

TRUNCATE TABLE `suppliers`;
--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`) VALUES
(1, 'Best Supplier Inc.'),
(2, 'Quality Goods PH'),
(3, 'Local Supplier PH'),
(4, 'Fresh Produce Co.'),
(5, 'Beverage Distributors PH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `password`, `role`) VALUES
(1, 'ADMIN', 'ADMIN', 'admin', '12345', 'admin'),
(2, 'Brando', 'Dela Torre', 'cashier', '54321', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `fk_products_category_id` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100055;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
