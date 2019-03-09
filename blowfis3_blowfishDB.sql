-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2017 at 07:55 AM
-- Server version: 5.6.32-78.1-log
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blowfis3_blowfishDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `MenuItemName` varchar(30) NOT NULL,
  `menuItemID` int(8) NOT NULL,
  `price` double(8,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `salePrice` double(8,2) NOT NULL,
  `saleActive` tinyint(1) NOT NULL,
  `Category` enum('Snack','Food','Soda','Beer') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`MenuItemName`, `menuItemID`, `price`, `active`, `salePrice`, `saleActive`, `Category`) VALUES
('Cheese Burger', 4, 3.50, 1, 3.25, 0, 'Food'),
('Coke', 5, 1.99, 1, 0.00, 0, 'Soda'),
('Pepsi', 6, 2.00, 1, 0.00, 0, 'Soda'),
('Mtn Dew', 8, 1.99, 1, 0.00, 0, 'Soda'),
('Dr.Pepper', 12, 1.99, 1, 0.00, 0, 'Soda'),
('Hamburger', 21, 3.99, 1, 1.50, 0, 'Food'),
('Hot Dog', 33, 2.99, 1, 1.00, 0, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_to_products`
--

CREATE TABLE IF NOT EXISTS `menu_item_to_products` (
  `menuItemID` int(8) NOT NULL,
  `productID` int(8) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item_to_products`
--

INSERT INTO `menu_item_to_products` (`menuItemID`, `productID`, `quantity`) VALUES
(4, 2, 1),
(4, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderItems` int(8) NOT NULL,
  `total` double(8,2) NOT NULL,
  `user` int(8) NOT NULL,
  `orderID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `menuItemID` int(8) NOT NULL,
  `orderItemID` int(8) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_to_order_items`
--

CREATE TABLE IF NOT EXISTS `order_to_order_items` (
  `orderID` int(8) NOT NULL,
  `orderItemID` int(8) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `name` char(30) NOT NULL,
  `productID` int(8) NOT NULL,
  `caseCost` double(8,2) DEFAULT NULL,
  `caseSize` double(8,2) NOT NULL,
  `caseUnit` char(30) NOT NULL,
  `unitCost` double(8,2) DEFAULT NULL,
  `unitSizeNum` double(8,2) DEFAULT NULL,
  `unit` char(30) NOT NULL,
  `minStock` int(5) NOT NULL,
  `amount` int(5) NOT NULL,
  `location` enum('Concessions','Storage','Fridge','Freeze') NOT NULL,
  `venderID` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `productID`, `caseCost`, `caseSize`, `caseUnit`, `unitCost`, `unitSizeNum`, `unit`, `minStock`, `amount`, `location`, `venderID`) VALUES
('Sliced Cheese', 2, 10.00, 10.00, 'pounds', 3.50, 1.00, 'slice', 39, 50, 'Concessions', 2),
('Burger', 3, 40.00, 40.00, 'pounds', 4.50, 12.00, 'pounds', 34, 50, 'Concessions', 2),
('bun', 4, 1.00, 12.00, 'item', 0.12, 3.00, 'oz', 35, 50, 'Concessions', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(30) NOT NULL,
  `userID` int(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `privilege` enum('Cashier','Admin','Owner') NOT NULL DEFAULT 'Cashier'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `userID`, `email`, `password`, `privilege`) VALUES
('Paul The Man Cuenin', 1, 'PCuenin@gmail.com', 'BearCat2017', 'Cashier'),
('Devin Leon', 2, 'Devinleon123@gmail.com', 'PizzaIsGood', 'Admin'),
('easy', 3, '2@2.com', 'test', 'Admin'),
('medium', 9, '3@3.com', 'test', 'Cashier'),
('Kamren Mangrum', 10, 'kamrenvm@gmail.com ', 'Bearcat2017', 'Owner'),
('bob', 11, 'bob@b.com', 'test', 'Owner'),
('bob2', 12, 'bob2@b.com', 'test', 'Owner'),
('Austin', 14, 'a@tin.com ', 'test', 'Admin'),
('JoJo', 19, 'j@j.com ', 'test', 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `nameVendor` varchar(30) NOT NULL,
  `venderID` int(8) NOT NULL,
  `address` varchar(144) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `salesRep` varchar(30) NOT NULL,
  `customerID` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`nameVendor`, `venderID`, `address`, `phone`, `email`, `fax`, `salesRep`, `customerID`) VALUES
('Cheddar Cheese Vender', 2, '530 Willson St', '8643231234', 'PCuenin@gmail.com', '', 'Paul the Vender Cuenin', '334455'),
('Devin Meat Man Leon', 3, '123 Beef Ave', '12345678911', 'beefme@meatmail.com', '12345678911', 'Devin', '99887733'),
('Oscar Myer', 5, '202 hotdog lane, porkville, pa', '6783452', 'oscar@hotdog.com', '8789912', 'Oliver', '2345819G'),
('Budwieser', 6, '232 beer rd, drinky town, ga', '8789792', 'bud@beer.com', '989867676', 'Buddy', '292827FG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`menuItemID`);

--
-- Indexes for table `menu_item_to_products`
--
ALTER TABLE `menu_item_to_products`
  ADD PRIMARY KEY (`menuItemID`,`productID`), ADD KEY `menu Item to products_ibfk_1` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`), ADD KEY `user` (`user`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`orderItemID`), ADD KEY `menuItemID` (`menuItemID`);

--
-- Indexes for table `order_to_order_items`
--
ALTER TABLE `order_to_order_items`
  ADD PRIMARY KEY (`orderID`,`orderItemID`), ADD KEY `order Items to order_ibfk_2` (`orderItemID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`), ADD KEY `venderID` (`venderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`venderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `menuItemID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `orderItemID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `venderID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_item_to_products`
--
ALTER TABLE `menu_item_to_products`
ADD CONSTRAINT `menu_item_to_products_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `menu_item_to_products_ibfk_2` FOREIGN KEY (`menuItemID`) REFERENCES `menu_items` (`menuItemID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`menuItemID`) REFERENCES `menu_items` (`menuItemID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_to_order_items`
--
ALTER TABLE `order_to_order_items`
ADD CONSTRAINT `order_to_order_items_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_to_order_items_ibfk_2` FOREIGN KEY (`orderItemID`) REFERENCES `order_items` (`orderItemID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`venderID`) REFERENCES `vendors` (`venderID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
