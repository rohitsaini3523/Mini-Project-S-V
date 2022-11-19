-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 02:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_service_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin` varchar(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `admin_pass`) VALUES
('Admin@scm.in', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(20) DEFAULT NULL,
  `cust_address` varchar(20) DEFAULT NULL,
  `cust_phone` varchar(20) DEFAULT NULL,
  `cust_vehicle_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_address`, `cust_phone`, `cust_vehicle_no`) VALUES
(1, 'Rohit Saini', 'Pune', '9568000766', 'GJ06LA6989'),
(2, 'Vatsal', 'Pune', '1234567890', 'UK09U9128'),
(3, 'Sunio', 'Doremon', '1234567899', '12324567'),
(6, 'qwrt', 'wqrt', '25612376', '123653621'),
(7, 'Rohit', 'Pune', '956000766', 'UK06Y9694'),
(8, 'Dhruv', 'Pune', '1234567890', 'MH09IL1289'),
(9, 'qwooo', 'qwoo', 'qwoo', 'qwooo');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `newcustomer` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO cust_log VALUES(null,NEW.cust_id,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatedcust` AFTER UPDATE ON `customer` FOR EACH ROW INSERT INTO cust_log VALUES (null, NEW.cust_id,'Updated',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cust_log`
--

CREATE TABLE `cust_log` (
  `log_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_log`
--

INSERT INTO `cust_log` (`log_id`, `cust_id`, `action`, `cdate`) VALUES
(1, 8, 'Inserted', '2022-11-08 14:41:08'),
(2, 9, 'Inserted', '2022-11-08 14:41:43'),
(3, 6, 'Inserted', '2022-11-08 14:42:31'),
(4, 9, 'Updated', '2022-11-08 14:47:21'),
(5, 7, 'Inserted', '2022-11-19 17:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(20) DEFAULT NULL,
  `emp_address` varchar(50) DEFAULT NULL,
  `emp_phone` varchar(20) DEFAULT NULL,
  `emp_salary` int(11) DEFAULT NULL,
  `emp_emailid` varchar(50) DEFAULT NULL,
  `emp_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_address`, `emp_phone`, `emp_salary`, `emp_emailid`, `emp_password`) VALUES
(1, 'Rohit Saini', 'Pune', '9568000766', 140000, 'rohitsaini@gmail.com', 'Rhit866*');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `createemployee` AFTER INSERT ON `employee` FOR EACH ROW INSERT into emp_log VALUES(NULL,NEW.emp_id,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateemployee` AFTER UPDATE ON `employee` FOR EACH ROW INSERT into emp_log VALUES(NULL,NEW.emp_id,'Updated',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_log`
--

CREATE TABLE `emp_log` (
  `log_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `edate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_log`
--

INSERT INTO `emp_log` (`log_id`, `cust_id`, `action`, `edate`) VALUES
(2, 7, 'Inserted', '2022-11-19 01:52:34'),
(3, 2, 'Inserted', '2022-11-19 01:56:46'),
(4, 3, 'Inserted', '2022-11-19 15:07:08'),
(5, 1, 'Inserted', '2022-11-19 15:08:33'),
(6, 2, 'Inserted', '2022-11-19 15:18:01'),
(7, 1, 'Inserted', '2022-11-19 15:19:30'),
(8, 1, 'Inserted', '2022-11-19 15:22:34'),
(9, 1, 'Inserted', '2022-11-19 15:23:52'),
(10, 2, 'Inserted', '2022-11-19 15:24:55'),
(11, 3, 'Inserted', '2022-11-19 15:25:47'),
(12, 2, 'Updated', '2022-11-19 17:27:20'),
(13, 1, 'Inserted', '2022-11-19 17:39:41'),
(14, 1, 'Inserted', '2022-11-19 17:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_number` int(11) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_amount` int(11) DEFAULT NULL,
  `vehicle_no` varchar(10) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_number`, `invoice_date`, `invoice_amount`, `vehicle_no`, `emp_id`) VALUES
(100, '2022-11-11', 1800, 'GJ06LA6989', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `part_no` int(11) NOT NULL,
  `part_name` varchar(20) DEFAULT NULL,
  `part_cost` int(11) DEFAULT NULL,
  `part_manufacturedate` date DEFAULT NULL,
  `part_warrantyperiod` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`part_no`, `part_name`, `part_cost`, `part_manufacturedate`, `part_warrantyperiod`) VALUES
(1, 'Buzzer', 150, '2022-09-13', '2023-09-13'),
(2, 'starter', 230, '2021-11-02', '2022-11-02'),
(3, 'Tyre', 1200, '2022-11-09', '2025-11-09'),
(4, 'qwr', 2, '2022-11-09', '2025-11-09'),
(5, 'Tyre', 1299, '2022-11-09', '2025-11-09'),
(6, 'Jinga', 1600, '2022-11-08', '2022-11-23');

--
-- Triggers `parts`
--
DELIMITER $$
CREATE TRIGGER `createpart` AFTER INSERT ON `parts` FOR EACH ROW INSERT into part_log VALUES(NULL,NEW.part_no,'created',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `parts_reorder` AFTER INSERT ON `parts` FOR EACH ROW INSERT INTO parts_quantity VALUES(NEW.part_no,'10')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatepart` AFTER UPDATE ON `parts` FOR EACH ROW INSERT into part_log VALUES(NULL,NEW.part_no,'Updated',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `parts_quantity`
--

CREATE TABLE `parts_quantity` (
  `part_id` int(11) NOT NULL,
  `parts_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parts_quantity`
--

INSERT INTO `parts_quantity` (`part_id`, `parts_quantity`) VALUES
(4, 10),
(5, 10),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `part_log`
--

CREATE TABLE `part_log` (
  `log_id` int(11) NOT NULL,
  `part_no` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `pdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_log`
--

INSERT INTO `part_log` (`log_id`, `part_no`, `action`, `pdate`) VALUES
(1, 4, 'created', '2022-11-15 00:43:52'),
(2, 5, 'created', '2022-11-15 00:44:08'),
(3, 6, 'created', '2022-11-19 17:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `today_pending_service`
--

CREATE TABLE `today_pending_service` (
  `pend_no` int(11) NOT NULL,
  `vehicle_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `today_pending_service`
--

INSERT INTO `today_pending_service` (`pend_no`, `vehicle_no`) VALUES
(1, 'GJ06LA6989');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_number` varchar(10) NOT NULL,
  `vehicle_type` varchar(20) DEFAULT NULL,
  `RCbook` varchar(20) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_number`, `vehicle_type`, `RCbook`, `customer_id`) VALUES
('GJ06LA1000', '4', '123456789', 2),
('GJ06LA1001', '2 Wheeler', '123456789', 2),
('GJ06LA6989', 'Activa 125', '123741h474', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `cust_vehicle_no` (`cust_vehicle_no`);

--
-- Indexes for table `cust_log`
--
ALTER TABLE `cust_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_log`
--
ALTER TABLE `emp_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `vehicle_no` (`vehicle_no`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`part_no`);

--
-- Indexes for table `part_log`
--
ALTER TABLE `part_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_number`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cust_log`
--
ALTER TABLE `cust_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_log`
--
ALTER TABLE `emp_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `part_log`
--
ALTER TABLE `part_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
