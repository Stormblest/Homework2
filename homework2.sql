-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2018 at 05:32 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework2`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ProductID`, `Quantity`, `Description`, `Date`) VALUES
(1, 2, '1', '2018-02-12'),
(2, 5, 'Good Desk', '2018-02-05'),
(3, 1, '55\"', '2018-02-01'),
(4, 9, 'Extra Wide', '2018-02-12'),
(4, 9, 'Extra Wide', '2018-02-12'),
(5, 200, 'price per square foot', '2018-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

DROP TABLE IF EXISTS `order_line`;
CREATE TABLE IF NOT EXISTS `order_line` (
  `OrderID` text NOT NULL,
  `Part` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentID` int(11) NOT NULL,
  `CreditCard` int(11) NOT NULL,
  `Payment Type` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `CreditCard`, `Payment Type`, `Date`) VALUES
(1, 123123123, 'credit', '2018-02-11'),
(2, 123123123, 'debit', '2018-02-01'),
(1, 123123123, 'credit', '2018-02-11'),
(2, 123123123, 'debit', '2018-02-01'),
(4, 123123123, 'credit', '2018-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` text NOT NULL,
  `product-image-title` text NOT NULL,
  `product-image-price` text NOT NULL,
  `product-image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product-image-title`, `product-image-price`, `product-image`) VALUES
('1', 'Toilet', '250', '../IMG/toilet.jpg'),
('2', 'Desk', '500', '../IMG/desk.jpg'),
('3', 'Coffee Maker', '50', '../IMG/coffee.jpg'),
('4', 'Pressure Cooker', '150', '../IMG/cooker.jpg'),
('5', 'Stander Fan', '35', '../IMG/fan.jpg'),
('6', 'Humidifier', '45', '../IMG/humid.jpg'),
('7', 'Iron', '10', '../IMG/iron.jpg'),
('8', 'Kitchenaid', '300', '../IMG/kitchenaid.jpg'),
('9', 'Stovetop', '175', '../IMG/stove.jpg'),
('10', 'Toaster', '50', '../IMG/toaster.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
