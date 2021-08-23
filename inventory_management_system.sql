-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 01:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `availability` varchar(50) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `supplier_id`, `company_name`, `product_brand`, `product_name`, `category`, `qty`, `price`, `availability`) VALUES
(1, 1, 'Hoyt Archery', 'Hoyt ', ' Formula Prodigy 25', 'Recurve', 18, 165000, 'Available'),
(2, 1, 'Hoyt Archery', 'Hoyt ', 'Formula Integra 68 Limbs ', 'Recurve', 0, 98500, 'Unavailable'),
(3, 1, 'Hoyt Archery', 'Hoyt ', 'Carbon Pro Stack 8 inch Black Stabilizer', 'Compound', 12, 38500, 'Available'),
(4, 2, 'Win & Win', 'win & win', 'Wiawis Carbon Riser', 'Recurve', 10, 128000, 'Available'),
(10, 6, 'Fivics Archery', 'Fivics', 'Argon x 15 Anodized Riser', 'Recurve', 5, 165000, 'Available'),
(11, 7, 'Cartel Archery', 'Cartel', 'Cartel Sirius Bow 68', 'Recurve', 0, 58000, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `quotation_no` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `quotation_no`, `description`, `qty`, `unit_price`, `amount`) VALUES
(2, 1111, 'Carbon One Arrow Set', 1, '27000', '27000'),
(3, 1112, 'Carbon One Arrow Set', 5, '27000.00', '135000.00'),
(4, 1112, ' Formula Prodigy 25', 2, '165000.00', '330000.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_tel` int(11) NOT NULL,
  `total_bill_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `invoice_no`, `date`, `customer_name`, `customer_address`, `customer_tel`, `total_bill_value`) VALUES
(3, 10001, '2021-07-02', 'Mr. Samantha', 'Ambepussa Army Camp', 773627189, '112000.00'),
(35, 10002, '2021-08-02', 'Mr Amal Rathnayaka', 'SL Army Abepussa', 117828221, '263500.00'),
(47, 10003, '2021-08-08', 'Mr Nimal Disanayaka', 'SL Army Katunayaka', 112929838, '330,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE `sales_invoices` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`id`, `invoice_no`, `product_name`, `product_brand`, `qty`, `unit_price`, `amount`) VALUES
(1, 10001, 'Easton', 'X10 arrow set', 1, '85000.00', '85000.00'),
(2, 10001, 'Easton', 'Carbon One arrow set', 1, '27000.00', '27000.00'),
(28, 10002, '  Formula Prodigy 25', ' Hoyt ', 1, ' 165,000.00', ' 165,000.00'),
(29, 10002, ' Formula Integra 68 Limbs ', ' Hoyt ', 1, ' 98,500.00', ' 98,500.00'),
(46, 10003, '  Formula Prodigy 25', ' Hoyt ', 2, ' 165,000.00', ' 330,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `company_name`, `company_address`, `email`, `contact_no`) VALUES
(1, 'Hoyt Archery', '593 North Wright Brothers Drive Salt Lake City, UT 84116', 'csteam@hoyt.com', '8013632990'),
(2, 'Win & Win', 'Anseong, South Korea', 'win@wiawis.com', '82316710895'),
(6, 'Fivics Archery', '42,Gwonseon-ro 668beon-gil, Gwonseon-gu, Suwon-si, Gyeonggi, Korea 16566', 'info@fivics.com', '82312456388'),
(7, 'Cartel Archery', '928 Song Ma-Ri, Kimpo-city, Korea', 'cartel@unitel.co.kr', '82319879165');

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `tender_id` int(11) NOT NULL,
  `quotation_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(50) NOT NULL,
  `company_tel_no` int(11) NOT NULL,
  `quotation_value` varchar(50) NOT NULL,
  `warranty_period` varchar(50) NOT NULL,
  `validity_period` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`tender_id`, `quotation_no`, `date`, `company_name`, `company_address`, `company_tel_no`, `quotation_value`, `warranty_period`, `validity_period`) VALUES
(1, 1111, '2021-08-10', 'SL Navy', 'Welisara', 116374832, '27000', '1 year', '6 months'),
(2, 1112, '2021-08-15', 'SL Army', 'Abepussa', 116253622, '465000.00', '1 year', '3 months');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'Admin', 'NDU=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_supplier_id` (`supplier_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quotation_no` (`quotation_no`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_no` (`invoice_no`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`tender_id`),
  ADD UNIQUE KEY `quotation_no` (`quotation_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `tender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `fk_quotation_no` FOREIGN KEY (`quotation_no`) REFERENCES `tender` (`quotation_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
