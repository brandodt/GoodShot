-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2024 at 04:30 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `category` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img_path` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `products`
--

TRUNCATE TABLE `products`;
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `quantity`, `category`, `img_path`) VALUES
(100001, 'ZEST-O CHOC-O CHOCOLATE DRINK 250ML', 31.45, 5, 'BEVERAGES', '../../assets/img/products/choc-o-250-ml.JPG'),
(100002, 'POCARI SWEAT ION SUPPLY DRINK 2L', 176.90, 4, 'BEVERAGES', '../../assets/img/products/pocari-sweat-ion-drink-2l_2.JPG'),
(100003, 'ACTIVE Creatine Monohydrate 300g', 699.00, 203, 'SUPPLEMENT', '../../assets/img/products/active-creatine-300-g.JPG'),
(100004, 'Cobra Energy Drink 350ml', 25.00, 486, 'BEVERAGES', '../../assets/img/products/cobra-350-ml.JPG'),
(100005, 'Gatorade Blue Bolt 500ml', 35.00, 398, 'BEVERAGES', '../../assets/img/products/gatorade-blue-bolt-500ml_2.JPG'),
(100006, 'Lays Classic Potato Chips 184g', 150.00, 150, 'SNACKS', '../../assets/img/products/lays-classic-184-g.JPG'),
(100007, 'Oishi Prawn Crackers 90g', 35.00, 300, 'SNACKS', '../../assets/img/products/oishi-prawn-crax-90g.JPG'),
(100008, 'Fresh Pork Belly 1kg', 300.00, 50, 'MEAT', '../../assets/img/products/fresh-pork-belly-1kg.JPG'),
(100009, 'Fresh Chicken Breast 1kg', 220.00, 56, 'MEAT', '../../assets/img/products/fresh-chix-breast-1kg.JPG'),
(100010, 'Gardenia Classic White Bread 600g', 65.00, 120, 'SNACKS', '../../assets/img/products/gardenia-classic-white-bread-600-g.JPG'),
(100011, 'Nestle Fresh Milk 1L', 75.00, 200, 'BEVERAGES', '../../assets/img/products/nestle-fresh-milk-1L.JPG'),
(100012, 'Yakult Probiotic Drink 80ml', 10.00, 600, 'BEVERAGES', '../../assets/img/products/yakult-probiotic-80-ml.JPG'),
(100013, 'Whey Protein Chocolate 2kg', 2500.00, 100, 'SUPPLEMENT', '../../assets/img/products/whey-protein-choc-2-kg.JPG'),
(100014, 'One a Day Multivitamin 100 Tablets', 850.00, 80, 'SUPPLEMENT', '../../assets/img/products/one-a-day-multivitamin.JPG'),
(100015, 'Chips Ahoy! Cookies 368g', 180.00, 140, 'SNACKS', '../../assets/img/products/chips-ahoy-cookies-368-g.JPG'),
(100016, 'Nescafe Classic 100g', 95.00, 247, 'BEVERAGES', '../../assets/img/products/nescafe-classic-100-g.JPG'),
(100017, 'San Miguel Pale Pilsen 330ml', 32.00, 298, 'BEVERAGES', '../../assets/img/products/san-miguel-pale-pilsen-330-ml.JPG'),
(100018, 'Century Tuna Flakes in Oil 180g', 35.00, 400, 'SNACKS', '../../assets/img/products/century-tuna-flakes-in-oil-180-g.JPG'),
(100019, 'C2 Green Tea Apple 500ml', 25.00, 500, 'BEVERAGES', '../../assets/img/products/c2-green-tea-apple-500-ml.JPG'),
(100020, 'Fresh Beef Sirloin 1kg', 400.00, 40, 'MEAT', '../../assets/img/products/fresh-beef-sirloin-1kg.JPG'),
(100021, 'Ribena Blackcurrant Juice Drink 1L', 85.00, 100, 'BEVERAGES', '../../assets/img/products/ribena-blackcurrant-juice-1L.JPG'),
(100022, 'Red Bull Energy Drink 250ml', 50.00, 195, 'BEVERAGES', '../../assets/img/products/red-bull-energy-drink-250-ml.JPG'),
(100023, 'Maggi Magic Sarap All-in-One Seasoning 8g', 2.00, 996, 'SNACKS', '../../assets/img/products/maggi-magic-sarap-all-in-one-seasoning-8g.JPG'),
(100024, 'Del Monte Pineapple Juice 240ml', 25.00, 300, 'BEVERAGES', '../../assets/img/products/del-monte-pineapplejuice-240-ml.JPG'),
(100025, 'Farm Fresh Eggs 1 Dozen', 90.00, 150, 'MEAT', '../../assets/img/products/farm-fresh-eggs-1-dozen.JPG'),
(100026, 'Oishi Pillows Ube 85g', 18.00, 250, 'SNACKS', '../../assets/img/products/oishi-pillows-ube-85g.JPG'),
(100027, 'Fita Crackers 10x30g', 55.00, 500, 'SNACKS', '../../assets/img/products/fita-crackers-10x30g.JPG'),
(100028, 'Enervon-C Multivitamins 30 Tablets', 150.00, 90, 'SUPPLEMENT', '../../assets/img/products/enervon-c-multivitamins-30-tablets.JPG'),
(100029, 'Pringles Original 107g', 100.00, 120, 'SNACKS', '../../assets/img/products/pringles-original-107g.JPG'),
(100030, 'Milo Powdered Drink 1kg', 185.00, 180, 'BEVERAGES', '../../assets/img/products/milo-powdered-drink-1kg.JPG'),
(100031, 'Purefoods Tender Juicy Hotdog 1kg', 180.00, 80, 'FROZEN FOOD', '../../assets/img/products/purefoods-tender-juicy-hotdog-1kg.JPG'),
(100032, 'San Marino Corned Tuna 180g', 40.00, 200, 'SNACKS', '../../assets/img/products/san-marino-corned-tuna-180g.JPG'),
(100033, 'Gatorade Orange 500ml', 35.00, 400, 'BEVERAGES', '../../assets/img/products/gatorade-orange-500ml.JPG'),
(100034, 'Quaker Oats 1kg', 180.00, 150, 'SNACKS', '../../assets/img/products/quaker-oats-1kg.JPG'),
(100035, 'Lucky Me Pancit Canton 80g', 12.00, 600, 'SNACKS', '../../assets/img/products/lucky-me-pancit-canton-80g.JPG'),
(100036, 'Datu Puti Vinegar 1L', 30.00, 200, 'CONDIMENTS', '../../assets/img/products/datu-puti-vinegar-1L.JPG'),
(100037, 'Purefoods Corned Beef 150g', 45.00, 350, 'CANNED GOODS', '../../assets/img/products/pure-foods-corned-beef-150g.JPG'),
(100038, 'Argentina Beef Loaf 150g', 35.00, 300, 'CANNED GOODS', '../../assets/img/products/argentina-beef-loaf-150g.JPG'),
(100039, 'Maya Hotcake Mix 200g', 50.00, 100, 'SNACKS', '../../assets/img/products/maya-hotcake-mix-200g.JPG'),
(100040, 'Magnolia Chicken Nuggets 450g', 150.00, 80, 'FROZEN FOOD', '../../assets/img/products/cobra-350-ml.JPG'),
(100041, 'Clover Chips Cheese 85g', 20.00, 250, 'SNACKS', '../../assets/img/products/clover-chips-cheese-85g.JPG'),
(100042, 'Sarsi Root Beer 330ml', 25.00, 200, 'BEVERAGES', '../../assets/img/products/sarsi-root-beer-330ml.JPG'),
(100043, 'Lipton Iced Tea Lemon 500ml', 30.00, 300, 'BEVERAGES', '../../assets/img/products/lipton-iced-tea-lemon-500ml.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `transactNo` bigint NOT NULL,
  `quantity_sold` int DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `sale_date` datetime DEFAULT NULL,
  `cashier_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `sales`
--

TRUNCATE TABLE `sales`;
--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `product_id`, `transactNo`, `quantity_sold`, `total_amount`, `sale_date`, `cashier_id`) VALUES
(1, 100001, 20240630235149, 3, 100.00, '2024-06-30 23:56:37', 2),
(2, 100005, 20240630235644, 2, 70.00, '2024-06-30 23:56:51', 2),
(3, 100004, 20240630235644, 1, 25.00, '2024-06-30 23:56:51', 2),
(4, 100003, 20240630235644, 1, 699.00, '2024-06-30 23:56:51', 2),
(5, 100002, 20240630235644, 1, 176.90, '2024-06-30 23:56:51', 2),
(6, 100003, 20240701001908, 2, 1398.00, '2024-07-01 00:19:17', 2),
(7, 100003, 20240701002238, 2, 1398.00, '2024-07-01 00:22:44', 2),
(8, 100003, 20240701002814, 1, 699.00, '2024-07-01 00:28:21', 2),
(9, 100001, 20240701002814, 1, 31.45, '2024-07-01 00:28:21', 2),
(10, 100002, 20240701002814, 1, 176.90, '2024-07-01 00:28:21', 2);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100044;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
