-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 05:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(4) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `categoryName`) VALUES
(100, 'Electric'),
(200, 'Mountain'),
(300, 'Road Bike');

-- --------------------------------------------------------

--
-- Table structure for table `idpass`
--

CREATE TABLE `idpass` (
  `customerId` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `idpass`
--

INSERT INTO `idpass` (`customerId`, `Password`, `Name`, `Email`) VALUES
('admin', 'admin', 'Admin', 'Admin@gmail.com'),
('kam', 'saini', 'kamal', 'kamal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `customerId` varchar(20) NOT NULL,
  `product` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(3) NOT NULL,
  `subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`customerId`, `product`, `price`, `quantity`, `subtotal`) VALUES
('kam', 'bajha', 677, 6, 778);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(3) NOT NULL,
  `categoryId` int(4) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productPrice` int(20) NOT NULL,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `categoryId`, `productName`, `productPrice`, `stock`) VALUES
(1, 100, 'Cannondale Carbon 4', 3499, 0),
(2, 300, 'Cannondale Topstone 4', 1500, 0),
(3, 200, 'MEC Provincial Trail', 2100, 0),
(4, 200, 'Ridley Fenix', 2600, 0),
(5, 300, 'Ridley Rival 1', 2300, 0),
(6, 100, 'Polygon Siskiu T7E', 5900, 0),
(7, 300, 'MEC Dash', 600, 0),
(8, 100, 'Cannondale Treadwell Neo', 4200, 0),
(9, 200, 'Polygon Siskiu T8', 3100, 0),
(10, 300, 'MEC Ace', 900, 0),
(11, 200, 'cannondale Treadwell Neo2', 4900, 0),
(12, 300, 'Cannondale Tiagra', 3900, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `idpass`
--
ALTER TABLE `idpass`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `CustIDconnect` (`customerId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CidConnect` (`categoryId`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `CustIDconnect` FOREIGN KEY (`customerId`) REFERENCES `idpass` (`customerId`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `CidConnect` FOREIGN KEY (`categoryId`) REFERENCES `category` (`catID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
