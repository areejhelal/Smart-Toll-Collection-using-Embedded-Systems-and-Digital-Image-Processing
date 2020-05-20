-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 08:43 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--
CREATE DATABASE IF NOT EXISTS `project_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--
-- Creation: Apr 20, 2019 at 04:23 PM
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `admins`:
--

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'manar', 'manar19@hotmail.com', '463eac4220a4388b6b60ed100d2430d8'),
(2, 'may', 'may@yahoo.com', '9a4b6f884971dcb4a5172876b335baab'),
(3, 'rana', 'rana21@hotmail.com', '90a1e95dba0d3d9c11e3f220cc4f7879'),
(4, 'areej', 'areej@hotmail.com', '0c0c48aaf0d7497059428dbe2b488862');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--
-- Creation: Apr 10, 2019 at 11:08 AM
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `alert_location` varchar(200) NOT NULL,
  `alert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alert_duration_mins` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `alerts`:
--

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `alert_location`, `alert_time`, `alert_duration_mins`) VALUES
(1, 'kilo 200', '2019-06-01 23:44:22', 10),
(2, 'kilo 30', '2019-06-01 23:45:34', 5),
(3, 'kilo 70', '2019-06-01 23:47:50', 2),
(4, 'kilo 100', '2019-06-01 23:47:54', 30),
(5, 'kilo 130', '2019-06-01 23:48:03', 7);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--
-- Creation: Apr 04, 2019 at 12:14 AM
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `car_id` int(10) NOT NULL,
  `car_number` varchar(9) NOT NULL,
  `car_barcode` varchar(20) NOT NULL,
  `car_status` varchar(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `car_logs` int(10) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `cars`:
--   `user_id`
--       `users` -> `user_id`
--

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_number`, `car_barcode`, `car_status`, `user_id`, `car_logs`, `last_updated`) VALUES
(1, 'NTB395', '89472164841', 'Pays', 3, 11, '2019-06-01 12:59:11'),
(2, 'SON9432', '56317994133', 'Exempted', 1, 7, '2019-06-01 12:59:21'),
(3, 'DQT3742', '91412287456', 'Exempted', 2, 0, '2019-06-01 12:59:33'),
(4, 'DSR5821', '42368123365', 'Pays', 3, 5, '2019-06-01 12:59:39'),
(5, 'HEP213', '28479328941', 'Pays', 4, 0, '2019-06-01 12:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--
-- Creation: Apr 30, 2019 at 11:18 AM
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(20) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `car_barcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `images`:
--

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_path`, `image_name`, `image_time`, `car_barcode`) VALUES
(1, 'images/1556884065.jpg', '1556884065', '2019-05-03 11:47:45', '2345678');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: May 03, 2019 at 07:35 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_phone_no` varchar(40) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_national_id` bigint(30) NOT NULL,
  `user_bank_account` bigint(30) NOT NULL,
  `account_username` varchar(100) NOT NULL,
  `account_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone_no`, `user_email`, `user_national_id`, `user_bank_account`, `account_username`, `account_password`) VALUES
(1, 'Manar Ahmed', '01020045617', 'manarhesham19@hotmail.com', 29603161203381, 5264024201627551, 'manar', 'e8692ea1e0ceb010756edac08f2bf3ac'),
(2, 'Mohamed Hesham', '01008556369', 'moh_hesham@hotmail.com', 29603456154489, 1589236498754562, 'mohamed', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'May Abdelsalam', '01287855119', 'mayabdelsalam22@gmail.com', 29605489600158, 8949236498754562, 'mayy', 'add613bd4b44838c6925462a49550810'),
(4, 'Esraa Shaban', '01097704142', 'esraa@yahoo.com', 29603456154485, 1545697789456992, 'esraa', '6ff43cd5821bc591bfa8dd7e17a037ac'),
(5, 'yara ayman', '01020045617', 'yara7@gmail.com', 29603456154489, 154541698412, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `car_number` (`car_number`),
  ADD UNIQUE KEY `car_barcode` (`car_barcode`),
  ADD KEY `FOREIGN KEY` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table admins
--

--
-- Metadata for table alerts
--

--
-- Metadata for table cars
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'project_db', 'cars', '{\"sorted_col\":\"`cars`.`car_id` ASC\"}', '2019-05-27 12:12:14');

--
-- Metadata for table images
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'project_db', 'images', '[]', '2019-05-01 09:28:38');

--
-- Metadata for table users
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'project_db', 'users', '{\"sorted_col\":\"`users`.`user_id` ASC\"}', '2019-05-12 20:56:51');

--
-- Metadata for database project_db
--

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_descr`) VALUES
('project_db', 'new');

SET @LAST_PAGE = LAST_INSERT_ID();

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('project_db', 'cars', @LAST_PAGE, 345, 108),
('project_db', 'users', @LAST_PAGE, 472, 310);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
