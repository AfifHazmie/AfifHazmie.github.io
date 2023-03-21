-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2022 at 12:33 AM
-- Server version: 5.7.36-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qms`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_customerid` int(11) NOT NULL,
  `f_qno` int(11) NOT NULL,
  `f_rating` varchar(5) NOT NULL,
  `f_comment` text,
  `f_topic` int(11) NOT NULL,
  `f_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_customerid`, `f_qno`, `f_rating`, `f_comment`, `f_topic`, `f_created_at`) VALUES
(1, 12, 3, '5', 'Harga berpatutan. Mantap.', 2, '2022-02-07 13:37:37'),
(2, 25, 4, '2', 'Website kurang sedap', 3, '2022-02-07 14:25:18'),
(3, 24, 1, '4.5', 'Reasonably priced.', 2, '2022-02-08 14:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_topic`
--

CREATE TABLE `feedback_topic` (
  `ft_id` int(11) NOT NULL,
  `ft_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_topic`
--

INSERT INTO `feedback_topic` (`ft_id`, `ft_name`) VALUES
(1, 'Service'),
(2, 'Quotation'),
(3, 'Website UI/Design');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `i_no` int(11) NOT NULL,
  `i_qno` int(11) NOT NULL,
  `i_desc` text NOT NULL,
  `i_unitPrice` float NOT NULL,
  `i_qty` int(11) NOT NULL,
  `i_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_no`, `i_qno`, `i_desc`, `i_unitPrice`, `i_qty`, `i_total`) VALUES
(1, 1, 'Pewangi 20l', 7, 12, 84),
(2, 1, 'kayu 2l ', 4, 6, 24),
(3, 2, 'aircond 200hs', 1223, 1, 1223),
(4, 3, 'Daikin 1HP Inverter', 1299, 1, 1299),
(5, 3, 'Hose', 20, 1, 20),
(7, 4, 'paip', 30, 3, 90),
(8, 6, 'KHIND Air Conditioner', 1299, 2, 2598),
(9, 7, 'Tali ', 100, 2, 200),
(10, 9, 'sudu', 1.2, 1, 1.2),
(11, 9, '', 1.2, 1, 1.2),
(12, 10, 'asd', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(11) NOT NULL,
  `note_qid` int(11) NOT NULL,
  `note_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `note_qid`, `note_desc`) VALUES
(1, 1, 'Need immediately '),
(2, 2, 'Need modern one'),
(3, 3, 'Installation 9/2/2022'),
(4, 4, 'Siap bulan 3 nanti'),
(5, 6, 'Will be completed in due time'),
(6, 7, 'Tali panjang\r\n'),
(7, 10, 'takda');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `q_no` int(11) NOT NULL,
  `q_cid` int(11) NOT NULL,
  `q_service` int(11) NOT NULL,
  `q_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `q_total` double NOT NULL,
  `q_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`q_no`, `q_cid`, `q_service`, `q_date`, `q_total`, `q_status`) VALUES
(1, 24, 5, '2022-02-07 13:06:45', 108, 'Completed'),
(2, 24, 4, '2022-02-07 13:13:51', 1223, 'Pending'),
(3, 12, 2, '2022-02-07 13:34:23', 1319, 'Completed'),
(4, 25, 5, '2022-02-07 14:17:26', 90, 'Completed'),
(5, 24, 2, '2022-02-07 14:32:04', 0, 'Completed'),
(6, 12, 2, '2022-02-08 14:18:25', 2598, 'Completed'),
(7, 25, 2, '2022-02-09 13:19:04', 200, 'Pending'),
(8, 12, 3, '2022-02-09 13:48:50', 0, 'Discarded'),
(9, 12, 3, '2022-02-09 13:49:14', 2.4, 'Pending'),
(10, 12, 3, '2022-02-10 04:39:35', 2, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `r_customerid` int(11) NOT NULL,
  `r_serviceid` int(11) NOT NULL,
  `r_servicestatus` varchar(11) NOT NULL,
  `r_comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `r_customerid`, `r_serviceid`, `r_servicestatus`, `r_comment`) VALUES
(1, 24, 2, 'Completed', ''),
(2, 24, 5, 'Completed', ''),
(3, 24, 2, 'Completed', ''),
(4, 25, 7, 'Accepted', ''),
(5, 26, 2, 'Rejected', ''),
(6, 12, 2, 'Accepted', ''),
(7, 12, 7, 'Pending', NULL),
(8, 12, 9, 'Pending', NULL),
(9, 12, 4, 'Accepted', ''),
(10, 12, 14, 'Pending', NULL),
(11, 12, 3, 'Accepted', ''),
(12, 12, 1, 'Rejected', ''),
(13, 13, 1, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `sv_id` int(11) NOT NULL,
  `sv_name` varchar(100) NOT NULL,
  `sv_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`sv_id`, `sv_name`, `sv_desc`) VALUES
(1, 'Cleaning', 'Cuci sampai bersih!'),
(2, 'Air Conditioning', 'air'),
(3, 'Fire Fighter', 'fire'),
(4, 'Pest Control', 'pest control'),
(5, 'Plumbing', 'plumbing'),
(6, 'Electrical & Electronic', 'electrical & electronic'),
(7, 'Pump', 'pump'),
(8, 'Civil', 'civil'),
(9, 'Others', 'others'),
(10, 'Basuh Kasut', 'cuci kasut sampai licin '),
(12, 'Kilat Kereta', 'guna bahan paling laris dalam malaysia untuk mengilatkan kereta anda '),
(14, 'Tinted Glass', 'Kat kereta sahaja ');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_desc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_desc`) VALUES
('Accepted'),
('Completed'),
('Discarded'),
('Pending'),
('Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `useraddress` varchar(200) NOT NULL,
  `userphone` varchar(14) NOT NULL,
  `u_type` int(2) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `useremail`, `username`, `password`, `useraddress`, `userphone`, `u_type`, `token`, `created_at`) VALUES
(11, 'employee@gmail.com', 'Henry Employee', '$2y$10$s1H7Xycfr58715aUPSCd4epWQqxgBo/uPc7.pBqwY0nx4vMNyOyAO', 'Kuala Lumpur', '0197065542', 1, '46edfa51e10ec67356498803b86017e473cb2eac9ed1e934d0ed471bb1d269abf11bf8c983adc1fc93d5810fbdc05724a0b2', '2021-02-01 16:46:21'),
(12, 'customer@gmail.com', 'Muhammad Imran Hakimi bin Mohd Shukri', '$2y$10$f4VGJKtz0BbIKKLJONYu7ecq/STtBIg.SZXc2ntbBTrqaCJbtmh7S', 'No. 38, Taman Suasana DamaiJalan Kelab Golf Darulaman', '01136584107', 2, '77762674f2e9363b160c14c5f1f0da666ea0c7a309cb19c4f7b5b5f583909e4df1de690f0c860fa395c0f5bd30d0343aff39', '2022-01-15 20:01:46'),
(13, 'employer@gmail.com', 'Hafizi Employer', '$2y$10$ejj/yQNrlyRBpLE47Fwun.0UWD/4vp8jKeWpu1QNtlxEL02LgF.rO', 'Marang, Terengganu.', '01234567890', 0, '11468c4aa73dd35555c89d0dd408765cb4c08c095afd4a8f98d6b2054a417975236a8b753927a0e62d6bce05d2a93714366c', '2022-01-15 20:19:54'),
(19, 'muhdimran190@gmail.com', 'Muhammad Imran Hakimi', '$2y$10$on3d8uK.gWmAY0dj24Benuj8xwYFvRWUmWi2wXgVJr2yqnajQ9n5q', 'Bangsar', '0112222222', 2, '3dfc9fcde13de1da7b0a20ec0dc5f5e884284a990c27bd61d8c3f4b0f53a8156b18d88094fe1d9044d68e4b91361a8ebc8ef', '2022-02-06 00:20:05'),
(20, 'adamydee@gmail.com', 'adam', '$2y$10$N7nFO8wKj0CdSMcBEdMTpuuGJ3VCN6h1vYbKdgH12v6eo.HcZ2NaS', 'Hollywood', '1245653543', 2, '31ae749c30e37266c5518da96a0d547db4db2c0ad5e5b7988b163ab3c408b7c5b9f8c978933ca444d8c95a1def957a6bf971', '2022-02-06 10:20:41'),
(24, 'imranhakimi24@gmail.com', 'Imran Hakimi', '$2y$10$NPjZzvjGCIKcH.gRFSRPc.tv9d1gz6kS3UDCFWM3JgJFrjfGjrt8u', 'Jitra, Kedah.', '01653684673', 2, '8d6c5b3d21a9ae6e783cc070373318588e911bfd70a38b3e6a6b1949e6d3d792665b9ac75dd347fe229a439186210bd40af2', '2022-02-07 05:22:07'),
(25, 'hafizi@gmail.com', 'Aiman Hafizi', '$2y$10$s59/phYskTzactTg61kA1um0BpmDsBHWEK4TjsZql0Nv1GtVA6FvS', 'Kampung Atas Tol, Marang, Terengganu', '0135657753', 2, '49811c3e029a4d8034f00f298bad049cd28f6dfcd0352aa976974b2028054b4e1e60d7fd4d9887fd9b2f1be59e61bee68f5b', '2022-02-07 05:25:44'),
(26, 'sonya@gmail.com', 'Sonya Casade', '$2y$10$uCwshnQaSiTBVPWRJctygePzEnBAkMBQ.b/LWGAQ893nbQiRA335a', 'Kampung Batu 29, Terengganu', '0137768825', 2, 'b833675cd2e43d88524f4623321f7a33eeaefa473b2af2442ee9414906bef18e5e8630193d4916a95a3476ac03c2fafadb03', '2022-02-07 06:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `u_type_desc`
--

CREATE TABLE `u_type_desc` (
  `u_type_desc_id` int(3) NOT NULL,
  `u_type_desc_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_type_desc`
--

INSERT INTO `u_type_desc` (`u_type_desc_id`, `u_type_desc_name`) VALUES
(0, 'Admin - Employer'),
(1, 'Admin - Employee'),
(2, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_customerid` (`f_customerid`),
  ADD KEY `f_topic` (`f_topic`),
  ADD KEY `f_qno` (`f_qno`);

--
-- Indexes for table `feedback_topic`
--
ALTER TABLE `feedback_topic`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_no`),
  ADD KEY `i_qno` (`i_qno`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`),
  ADD UNIQUE KEY `note_qid` (`note_qid`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`q_no`),
  ADD KEY `q_service` (`q_service`),
  ADD KEY `q_status` (`q_status`),
  ADD KEY `q_cid` (`q_cid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `r_serviceid` (`r_serviceid`),
  ADD KEY `r_customerid` (`r_customerid`),
  ADD KEY `r_servicestatus` (`r_servicestatus`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`sv_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useremail` (`useremail`),
  ADD KEY `u_type` (`u_type`);

--
-- Indexes for table `u_type_desc`
--
ALTER TABLE `u_type_desc`
  ADD PRIMARY KEY (`u_type_desc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `q_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`f_customerid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`f_topic`) REFERENCES `feedback_topic` (`ft_id`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`f_qno`) REFERENCES `quotation` (`q_no`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`i_qno`) REFERENCES `quotation` (`q_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`note_qid`) REFERENCES `quotation` (`q_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`q_service`) REFERENCES `service` (`sv_id`),
  ADD CONSTRAINT `quotation_ibfk_2` FOREIGN KEY (`q_status`) REFERENCES `status` (`status_desc`),
  ADD CONSTRAINT `quotation_ibfk_3` FOREIGN KEY (`q_cid`) REFERENCES `users` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`r_customerid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`r_serviceid`) REFERENCES `service` (`sv_id`),
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`r_servicestatus`) REFERENCES `status` (`status_desc`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`u_type`) REFERENCES `u_type_desc` (`u_type_desc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
