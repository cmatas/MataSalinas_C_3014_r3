-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2018 at 03:32 PM
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
-- Database: `db_movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` varchar(70) DEFAULT NULL,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_attempts` tinyint(4) NOT NULL,
  `user_lvl` varchar(50) DEFAULT NULL,
  `user_log` smallint(6) NOT NULL,
  `user_newt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_attempts`, `user_lvl`, `user_log`, `user_newt`) VALUES
(1, 'Camila', 'kmi', 'lol', 'kmi@lol', '2018-02-23 04:58:08', '::1', 3, '1', 0, NULL),
(4, 'hola', 'qtal', 'comowas', 'yolo@kavida', '2018-02-22 01:07:13', '::1', 0, '0', 0, NULL),
(6, 'hola', 'user', 'yes', 'yelel@lek', NULL, 'no', 0, '2', 0, NULL),
(18, 'gyh', 'hli', 'LsDBfw#6', 'hl', NULL, 'no', 0, '1', 0, NULL),
(20, 'lol', 'wow', '', 'gol@gmail', '2018-02-23 17:15:28', '::1', 0, '2', 0, NULL),
(22, 'gh', 'hil', 'aU8j9w==::9bc9c9ce2e5f771fd548329755da0974', 'jkl', NULL, 'no', 1, '2', 0, NULL),
(23, 'lol', 'wow', 'vmiIsQ==::8c3e977a9f37201ff95e8557e7733580', 'kol', NULL, 'no', 0, '1', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
