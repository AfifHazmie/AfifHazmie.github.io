-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 10:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `b_id` int(10) NOT NULL,
  `b_customer` varchar(15) NOT NULL,
  `b_vehicle` int(11) NOT NULL,
  `b_bdate` date NOT NULL,
  `b_rdate` date NOT NULL,
  `b_total` float NOT NULL,
  `b_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `s_id` int(2) NOT NULL,
  `s_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`s_id`, `s_desc`) VALUES
(1, 'received'),
(2, 'approved'),
(3, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `u_ic` varchar(15) NOT NULL,
  `u_pwd` varchar(255) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_phone` varchar(15) NOT NULL,
  `u_address` varchar(100) DEFAULT NULL,
  `u_type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`u_ic`, `u_pwd`, `u_name`, `u_phone`, `u_address`, `u_type`) VALUES
('0123456789', '$2y$10$CWTQqlcqVp7hgMKcxgT95OBf1kGZjsvSLFk.0O3pW9xOvUazkWjUm', 'AFIF HAZMIE ARSYAD BIN AGUS', '+60197910545', 'NO 22 , JALAN PE 2/7 TAMAN PULAI EMAS', 1),
('0987654321', '$2y$10$AnJvg2wsJS0XcKUmFhk5eOedhr8n3Z/r/ZfnWfgEbJDpUkkiKe10e', 'Ahmad Ali Abu', '+60112345678', ' Jalan Tangkak', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_vehicle`
--

CREATE TABLE `tb_vehicle` (
  `v_id` int(11) NOT NULL,
  `v_reg` varchar(15) NOT NULL,
  `v_type` varchar(20) NOT NULL,
  `v_model` varchar(100) NOT NULL,
  `v_seat` int(5) DEFAULT NULL,
  `v_price` float NOT NULL,
  `v_image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vehicle`
--

INSERT INTO `tb_vehicle` (`v_id`, `v_reg`, `v_type`, `v_model`, `v_seat`, `v_price`, `v_image`) VALUES
(12, 'KAS 4902', 'MPV', 'Toyota Vellfire', 7, 590, 'vellfire.webp'),
(13, 'KLA 4563', 'Sedan', 'Proton Saga', 4, 340, 'saga.jpg'),
(14, 'JJM 9009', 'SUV', 'Toyota WIsh', 6, 450, 'wish.jpg'),
(18, 'AS 90', 'Sports', 'Mercedez Benz', 3, 780, 'mercedez.jpg'),
(19, 'JDT 4011', 'Compact', 'Myvi 2019', 4, 340, 'myvi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `b_vehicle` (`b_vehicle`),
  ADD KEY `b_customer` (`b_customer`),
  ADD KEY `b_status` (`b_status`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`u_ic`);

--
-- Indexes for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`b_customer`) REFERENCES `tb_users` (`u_ic`),
  ADD CONSTRAINT `tb_booking_ibfk_3` FOREIGN KEY (`b_status`) REFERENCES `tb_status` (`s_id`),
  ADD CONSTRAINT `tb_booking_ibfk_4` FOREIGN KEY (`b_vehicle`) REFERENCES `tb_vehicle` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
