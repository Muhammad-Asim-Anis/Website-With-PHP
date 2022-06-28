-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 04:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jewelry`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `Admin_email` varchar(250) NOT NULL,
  `Admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`Admin_email`, `Admin_password`) VALUES
('Admin@gmail.com', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `Id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `quentity` int(11) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactusdetail`
--

CREATE TABLE `contactusdetail` (
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactusdetail`
--

INSERT INTO `contactusdetail` (`Name`, `Phone`, `Address`, `Email`, `Message`) VALUES
('Asim', '03129211293', 'Hussainabad', 'Asim@gmail.com', 'hello'),
('Asim', '03129211293', 'Hussainabad', 'fa19bsse0032@maju.edu.pk', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderId` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderId`, `email`, `Date`) VALUES
(1, 'fa19bsse0032@maju.edu.pk', '2022-06-19 14:26:36'),
(2, 'fa19bsse0032@maju.edu.pk', '2022-06-19 14:30:03'),
(3, 'asimanis223@gmail.com', '2022-06-20 11:18:26'),
(4, 'fa19bsse0032@maju.edu.pk', '2022-06-20 15:06:48'),
(5, 'fa19bsse0032@maju.edu.pk', '2022-06-21 13:38:18'),
(6, 'fa19bsse0032@maju.edu.pk', '2022-06-21 13:42:49'),
(7, 'asimanis223@gmail.com', '2022-06-21 13:46:40'),
(8, 'asimanis223@gmail.com', '2022-06-21 13:49:36'),
(9, 'asimanis223@gmail.com', '2022-06-21 13:57:58'),
(10, 'fa19bsse0032@maju.edu.pk', '2022-06-21 14:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdeatils`
--

CREATE TABLE `paymentdeatils` (
  `Id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentdeatils`
--

INSERT INTO `paymentdeatils` (`Id`, `OrderId`, `Email`, `Name`, `Total`) VALUES
(1, 1, 'fa19bsse0032@maju.edu.pk', 'Asim Anis', 3913),
(2, 2, 'fa19bsse0032@maju.edu.pk', 'Asim Anis', 475),
(3, 3, 'asimanis223@gmail.com', 'Asim Anis', 225),
(4, 4, 'fa19bsse0032@maju.edu.pk', 'Asim', 200),
(5, 5, 'fa19bsse0032@maju.edu.pk', 'Asim', 300),
(6, 6, 'fa19bsse0032@maju.edu.pk', 'Asim Anis', 430),
(7, 7, 'asimanis223@gmail.com', 'Asim Anis', 250),
(8, 8, 'asimanis223@gmail.com', 'Asim Anis', 300),
(9, 9, 'asimanis223@gmail.com', 'Asim Anis', 690),
(10, 10, 'fa19bsse0032@maju.edu.pk', 'Asim', 300);

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `Id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdetail`
--

INSERT INTO `productdetail` (`Id`, `name`, `image`, `Category`, `price`, `Rating`, `Description`) VALUES
(1, 'Chain1', 'upload/jewellerychain1.png', 'Chains', 50, 0, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium reprehenderit voluptatibus. Sint, explicabo!'),
(3, 'chain3', 'upload/jewellerychain3.png', 'Chains', 45, 0, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium reprehenderit voluptatibus. Sint, explicabo!'),
(4, 'chain4', 'upload/jewellerychain4.png', 'Chains', 34, 0, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium reprehenderit voluptatibus. Sint, explicabo!'),
(5, 'Ring1', 'upload/ring1.png', 'Rings', 26, 0, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium reprehenderit voluptatibus. Sint, explicabo!'),
(6, 'Ring2', 'upload/ring2.png', 'Rings', 45, 1, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium reprehenderit voluptatibus. Sint, explicabo!'),
(7, 'Ring3', 'upload/ring3.png', 'Rings', 39, 1, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium reprehenderit voluptatibus. Sint, explicabo!'),
(8, 'Ring4', 'upload/ring4.png', 'Rings', 250, 1, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium reprehenderit voluptatibus. Sint, explicabo!'),
(10, 'chain2', 'upload/jewellerychain2.png', 'Chains', 50, 4, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium reprehenderit voluptatibus. Sint, explicabo!');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitems`
--

CREATE TABLE `purchaseitems` (
  `Id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(250) NOT NULL,
  `ProductQuentity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchaseitems`
--

INSERT INTO `purchaseitems` (`Id`, `orderId`, `ProductId`, `ProductName`, `ProductQuentity`) VALUES
(1, 1, 1, 'Chain1', '14'),
(2, 1, 3, 'chain3', '6'),
(3, 1, 4, 'chain4', '7'),
(4, 1, 5, 'Ring1', '6'),
(5, 1, 6, 'Ring2', '7'),
(6, 1, 7, 'Ring3', '6'),
(7, 1, 8, 'Ring4', '8'),
(8, 2, 1, 'Chain1', '5'),
(9, 2, 3, 'chain3', '5'),
(10, 3, 3, 'chain3', '5'),
(11, 4, 1, 'Chain1', '4'),
(12, 5, 1, 'Chain1', '6'),
(13, 6, 1, 'Chain1', '5'),
(14, 6, 3, 'chain3', '4'),
(15, 7, 1, 'Chain1', '5'),
(16, 8, 1, 'Chain1', '6'),
(17, 9, 1, 'Chain1', '5'),
(18, 9, 3, 'chain3', '6'),
(19, 9, 4, 'chain4', '5'),
(20, 10, 1, 'Chain1', '6');

-- --------------------------------------------------------

--
-- Table structure for table `sign_signout_history`
--

CREATE TABLE `sign_signout_history` (
  `AccountType` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_signout_history`
--

INSERT INTO `sign_signout_history` (`AccountType`, `Email`, `Status`, `Name`, `Time`) VALUES
('audi', 'Asim@gmail.com', 'SIGN IN', 'Asim Anis', '05:02:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '09:23:00'),
('audi', 'Asim@gmail.com', 'SIGN IN', 'Asim Anis', '05:08:00'),
('audi', 'Asim@gmail.com', 'SIGN OUT', 'Asim Anis', '05:08:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '06:21:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '03:21:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '06:36:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '03:43:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '03:34:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '12:34:00'),
('opel', 'asimanis223@gmail.com', 'SIGN IN', 'Asim Anis', '07:09:00'),
('opel', 'asimanis223@gmail.com', 'SIGN OUT', 'Asim Anis', '04:14:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '06:17:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '04:36:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '03:59:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '12:59:00'),
('opel', 'asimanis223@gmail.com', 'SIGN IN', 'Asim Anis', '04:17:00'),
('opel', 'asimanis223@gmail.com', 'SIGN OUT', 'Asim Anis', '01:23:00'),
('opel', 'asimanis223@gmail.com', 'SIGN IN', 'Asim Anis', '04:23:00'),
('opel', 'asimanis223@gmail.com', 'SIGN OUT', 'Asim Anis', '01:23:00'),
('opel', 'asimanis223@gmail.com', 'SIGN IN', 'Asim Anis', '04:29:00'),
('opel', 'asimanis223@gmail.com', 'SIGN OUT', 'Asim Anis', '01:29:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '04:33:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '04:33:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '04:37:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '04:37:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '04:38:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '04:38:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '04:40:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '04:42:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '08:14:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN IN', 'Asim Anis', '06:42:00'),
('opel', 'fa19bsse0032@maju.edu.pk', 'SIGN OUT', 'Asim Anis', '06:43:00'),
('opel', 'asimanis223@gmail.com', 'SIGN IN', 'Asim Anis', '06:46:00'),
('opel', 'asimanis223@gmail.com', 'SIGN OUT', 'Asim Anis', '06:48:00'),
('opel', 'asimanis223@gmail.com', 'SIGN IN', 'Asim Anis', '06:49:00'),
('opel', 'asimanis223@gmail.com', 'SIGN OUT', 'Asim Anis', '06:50:00'),
('opel', 'asimanis223@gmail.com', 'SIGN IN', 'Asim Anis', '06:55:00'),
('opel', 'asimanis223@gmail.com', 'SIGN OUT', 'Asim Anis', '07:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `AccountType` varchar(50) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`AccountType`, `email`, `password`, `firstname`, `lastname`) VALUES
('opel', 'asimanis223@gmail.com', 'asim3456', 'Asim', 'Anis'),
('audi', 'asimanis864@gmail.com', 'Asim123', 'Asim', 'Anis'),
('opel', 'fa19bsse0032@maju.edu.pk', 'Asim123', 'Asim', 'Anis'),
('audi', 'fa19bsse0050@maju.edu.pk', 'Asad1234', 'Asad', 'Abbasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`Admin_email`);

--
-- Indexes for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contactusdetail`
--
ALTER TABLE `contactusdetail`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `paymentdeatils`
--
ALTER TABLE `paymentdeatils`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `purcahseid` (`OrderId`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `orderid` (`orderId`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paymentdeatils`
--
ALTER TABLE `paymentdeatils`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `id` FOREIGN KEY (`Id`) REFERENCES `productdetail` (`Id`);

--
-- Constraints for table `paymentdeatils`
--
ALTER TABLE `paymentdeatils`
  ADD CONSTRAINT `purcahseid` FOREIGN KEY (`OrderId`) REFERENCES `orderdetails` (`OrderId`);

--
-- Constraints for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderId`) REFERENCES `orderdetails` (`OrderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
