-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 05:54 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopcartlk`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Username` varchar(20) NOT NULL,
  `IID` varchar(20) NOT NULL,
  `IName` varchar(25) NOT NULL,
  `Category` varchar(25) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `UnitPrice` varchar(20) NOT NULL,
  `SubTotal` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Username`, `IID`, `IName`, `Category`, `Quantity`, `UnitPrice`, `SubTotal`) VALUES
('a', '4', 'HP Printer', 'Printers & Scanners', 1, '15000', 15000),
('kushan', '1', 'Sony DVD', 'DVD Players', 1, '5000', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `IID` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `IName` varchar(25) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Category` varchar(25) NOT NULL,
  `IType` varchar(20) NOT NULL,
  `Description` varchar(3000) NOT NULL,
  `Image` text NOT NULL,
  `Image2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`IID`, `Username`, `IName`, `Price`, `Category`, `IType`, `Description`, `Image`, `Image2`) VALUES
('1', 'admin', 'Sony DVD', '5000', 'DVD Players', 'Electronics', 'Dust proof. USB support', '../Product_Images/dvd.jpg', '../Product_Images/dvd.jpg'),
('10', 'admin', 'Bus', '10000000', 'Bus', 'Vehicles', 'Good Bus. Comfortable ', '../Product_Images/bus.jpg', '../Product_Images/bus.jpg'),
('11', 'admin', 'Bajaj', '500000', 'ThreeWheel', 'Vehicles', '4 stroke ', '../Product_Images/threewheel.jpg', '../Product_Images/threewheel.jpg'),
('12', 'admin', 'Bajaj Platina', '200000', 'Motor Bike', 'Vehicles', 'Good break system', '../Product_Images/bike.jpg', '../Product_Images/bike.jpg'),
('13', 'admin', 'TATA Lorry', '1000000', 'Other', 'Vehicles', 'Good Lorry', '../Product_Images/lorry.jpg', '../Product_Images/lorry.jpg'),
('14', 'admin', 'Sofa', '20000', 'Sofas', 'Furnitures', 'Comfortable set', '../Product_Images/sofa.jpg', '../Product_Images/sofa.jpg'),
('15', 'admin', 'Dining Table', '15000', 'Dining Set', 'Furnitures', 'Teak Set', '../Product_Images/dining.jpg', '../Product_Images/dining.jpg'),
('16', 'admin', 'Bed', '30000', 'Bedroom Suits', 'Furnitures', 'Good Set New Look', '../Product_Images/bed.jpg', '../Product_Images/bed.jpg'),
('17', 'admin', 'Mattress', '40000', 'Mattress', 'Furnitures', 'Spring Mattress', '../Product_Images/mattress.jpg', '../Product_Images/mattress.jpg'),
('18', 'admin', 'Wardrobes', '20000', 'Wardrobes', 'Furnitures', 'New design ', '../Product_Images/wardrobe.jpg', '../Product_Images/wardrobe.jpg'),
('19', 'admin', 'Computer Table', '5000', 'Other Furniture', 'Furnitures', 'Good table', '../Product_Images/table.jpg', '../Product_Images/table.jpg'),
('2', 'admin', 'Sony Setup', '30000', 'Audio Equipments', 'Electronics', 'Hi Fi System', '../Product_Images/audio.jpg', '../Product_Images/audio.jpg'),
('20', 'admin', 'Smart TV', '100000', 'Televisions', 'HomeAppliances', '3D, Full HD, Curved TV', '../Product_Images/tv.jpg', '../Product_Images/tv.jpg'),
('21', 'admin', 'Refrigerator', '26000', 'Refrigerator', 'HomeAppliances', 'Eco Friendly Refrigerator', '../Product_Images/refrigerator.jpg', '../Product_Images/refrigerator.jpg'),
('22', 'admin', 'ShopCartLK Sewing ', '15000', 'Sewing Machines', 'HomeAppliances', 'Good machine ', '../Product_Images/sewing.jpg', '../Product_Images/sewing.jpg'),
('23', 'admin', 'Blender ', '5000', 'Kitchen Appliances', 'HomeAppliances', 'Good Blender ', '../Product_Images/kitchen.jpg', '../Product_Images/kitchen.jpg'),
('24', 'admin', 'Gas Cooker ', '8000', 'Gas burners & Ovens', 'HomeAppliances', 'New Gas cooker', '../Product_Images/gas.jpg', '../Product_Images/gas.jpg'),
('25', 'admin', 'Cutting Board', '2500', 'OtherHome', 'HomeAppliances', 'Cutting board with knife', '../Product_Images/cutting.jpg', '../Product_Images/cutting.jpg'),
('26', 'admin', 'Generator ', '35000', 'Generators', 'Other', 'Good Generator ', '../Product_Images/geni.jpg', '../Product_Images/geni.jpg'),
('27', 'admin', 'Water Pump', '12500', 'Water Pumps', 'Other', 'Good water pump jet pump', '../Product_Images/water.jpg', '../Product_Images/water.jpg'),
('28', 'admin', 'Home Gym', '65000', 'Fitness Equipment', 'Other', 'Home gym all in one', '../Product_Images/fitness.jpg', '../Product_Images/fitness.jpg'),
('29', 'admin', 'Agro Products', '4500', 'Agro Products', 'Other', 'Good Product', '../Product_Images/agro.jpg', '../Product_Images/agro.jpg'),
('3', 'admin', 'IPhone ', '50000', 'Mobile Phones', 'Electronics', 'Apple iphone. Good phone', '../Product_Images/phone.jpg', '../Product_Images/phone.jpg'),
('4', 'admin', 'HP Printer', '15000', 'Printers & Scanners', 'Electronics', 'HP color printer', '../Product_Images/printer.jpg', '../Product_Images/printer.jpg'),
('5', 'admin', 'Nikkon Camera', '50000', 'Digital Camera & Camcorde', 'Electronics', '18MP. Good Camera', '../Product_Images/camera.jpg', '../Product_Images/camera.jpg'),
('6', 'admin', 'Home Theater', '10000', 'Home Theater Systems', 'Electronics', 'Hi Fi System 5.1', '../Product_Images/homeTh.jpg', '../Product_Images/homeTh.jpg'),
('7', 'admin', 'Dell', '60000', 'Computer & Notebook', 'Electronics', 'i7 Desktop ', '../Product_Images/computer.jpg', '../Product_Images/computer.jpg'),
('8', 'admin', 'Benz', '10000000', 'Car', 'Vehicles', 'Good Car. Comfortable ', '../Product_Images/car.jpg', '../Product_Images/car.jpg'),
('9', 'admin', 'Toyota Hiace', '10000000', 'Van', 'Vehicles', 'Good Van. Comfortable ', '../Product_Images/van.jpg', '../Product_Images/van.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `PID` varchar(20) NOT NULL,
  `IID` varchar(20) NOT NULL,
  `IName` varchar(25) NOT NULL,
  `Category` varchar(25) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `UnitPrice` varchar(20) NOT NULL,
  `Total` int(25) NOT NULL,
  `PDate` varchar(50) NOT NULL,
  `CreditNo` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Telephone` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`FName`, `LName`, `NIC`, `Gender`, `Address`, `Telephone`, `Email`, `Username`, `Password`, `Type`) VALUES
('a', 'a', '256525455v', 'Male', 'wd', 2147483647, 'dw@dg.ff', 'a', 'a', 'User'),
('Sunil', 'Perera', '256548566V', 'Male', '50/2B, Kandy', 815425632, 'ashan@gmail.com', 'admin', '123', 'Admin'),
('Kushan', 'Charaka', '365845655V', 'Male', '13/10B, Kandy', 716520256, 'abc@gmail.com', 'Kushan', '123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Username`,`IName`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`IID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PID`,`IID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
