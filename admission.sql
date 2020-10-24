-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2020 at 05:35 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `faculty_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `faculty_id`) VALUES
(1, 'Agriculture Production Technology', 1),
(2, 'Food Technology', 1),
(3, 'Animal Production Technology', 1),
(4, 'Crop Production Technology', 1),
(5, 'Agribusiness', 1),
(6, 'Accountancy', 2),
(7, 'Banking and Finance', 2),
(8, 'Managing Assistant', 2),
(9, 'Insurance', 2),
(10, 'Marketing, Trade and Sales', 2),
(11, 'Law (LLB)', 2),
(12, 'Human Resource Management', 2),
(13, 'Curriculum Devlp and Teaching', 3),
(14, 'Educational Admin and Planning', 3),
(15, 'Guidance and Counselling', 3),
(16, 'Wood Work Technology', 3),
(17, 'Air Conditioning and Refrigeration', 3),
(18, 'Tourism and T.A Management', 5),
(19, 'Fashion, Clothing and Textile', 5),
(20, 'Hotel and Catering Management', 5),
(21, 'Bakery and Food Processing', 5),
(22, 'Food Technology', 5),
(23, 'journalism', 6),
(24, 'Civil Engineering', 4),
(25, 'Telecommunication', 4),
(26, 'Electrical Power System', 4),
(27, 'Software Engineering', 4),
(28, 'Urban Planning', 4),
(29, 'Computer Science Engineering', 4),
(30, 'Mechanical Manufacturing', 4),
(31, 'Chemical Processing Technology', 4),
(32, 'Quarry Operations (Mining)', 4),
(33, 'Wood Work Technology', 4),
(34, 'Air Conditioning and Refrigeration', 4),
(35, 'Shipping Management', 8),
(36, 'Transport and Logistics Management', 8),
(37, 'Nursing', 9),
(38, 'Medical Laboratory Technology', 9),
(39, 'Midwifery', 9);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'Agriculture and Veterinary Sciences'),
(2, 'Business Finance and Management'),
(3, 'Educational Sciences'),
(4, 'Engineering and Technology'),
(5, 'Home Economics and Hospitality Management '),
(6, 'Journalism and Mass Communication'),
(7, 'Law'),
(8, 'Maritime Studies'),
(9, 'Medical and Bio-medical Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` char(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `department_id` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `place_of_birth`, `phone_number`, `email`, `address`, `department_id`) VALUES
(1, 'John', 'Peter', 'M', '2019-05-08', 'Muea', '786654322', 'peter@tmail.com', 'Malingo, Molyko', 9),
(2, 'Collins', 'Tatang', 'M', '2019-07-16', 'Bamenda', '7676787878', 'collins@gmail.com', 'Metta Quarters', 14),
(3, 'MAKUNGONG', 'TATANG', 'M', '1994-01-01', 'Bamenda', '672925180', 'mazoho@gmail.com', 'Metta Quarters', 14),
(17, 'Samba Wilson ', 'Mbah', 'Male', '1990-07-25', 'BAMENDA', '675092345', 'mbahwilson@gmail.com', 'Bambui', 13),
(5, 'Neba', 'Valery', 'M', '1993-02-14', 'Buea', '653469778', 'kottiwatt23@gmail.com', 'Dirty South Molyko ', 13),
(6, 'NDUMBE', 'TABI', 'M', '1970-11-01', 'kUMBA', '654023620', 'kellybrice2@gmail.com', 'Malingo, Molyko', 13),
(18, 'Nkemchop', 'Giselle', 'Female', '1998-06-16', 'Buae', '675346290', 'giselle23@gmail.com', 'Molyko, Buea', 18),
(8, 'MAKUNGONG', 'TATANG', 'M', '1994-01-01', 'Bamenda', '672925180', 'mazoho2000@gmail.com', 'Metta Quarters', 14),
(13, 'Mark', 'Seraphine', 'F', '2007-03-23', 'Mankon', '672925280', 'collins@yahoo.com', 'Bambui', 5),
(15, 'Michael ', 'Cazorla', 'M', '2003-02-04', 'Limbe Town', '67676767', 'foubie.michelle@gmail.com', 'Bamenda', 15),
(16, 'Mankaa', 'Nange', 'Male', '1994-01-01', 'BAMENDA', '672925180', 'mankaa@gmail.com', 'Bambui', 9),
(19, 'Neba Mbah', 'Charles', 'Male', '1998-11-27', 'Bamuck', '673298143', 'neba687@gmail.com', 'Bambui', 23),
(20, 'Florence', 'Nji', 'Female', '1984-07-20', 'Mankon', '694827351', 'florence66@gmail.com', 'Bamenda', 15),
(21, 'Amabo', 'Clinton', 'Male', '1979-03-12', 'Bamuck', '691738254', 'clinton6689@gmail.com', 'Douala', 35),
(22, 'Muhamaduh', 'Issa', 'Male', '1985-04-08', 'Adamawa', '691738528', 'muhamaduh@gmail.com', 'Douala', 31),
(23, 'Nkemchop', 'Brice', 'Male', '1992-02-11', 'Far North', '692483750', 'brice6708@gmail.com', 'Bambui', 37),
(24, 'Tabi', 'Adora Atabe', 'Female', '1998-05-24', 'BAMENDA', '692731852', 'atabetabi@gmail.com', 'Bamenda', 10),
(25, 'Nkamala Hope', 'Nji', 'Female', '1996-06-30', 'Bali', '682957488', 'njihope@gmail.com', 'Bambui', 7),
(26, 'Mankaa', 'Juliet Muluh', 'Female', '1990-03-05', 'Santa', '619534825', 'mankaa58@gmail.com', 'Bambui', 4),
(27, 'Nkemchop', 'mark', 'Male', '2020-08-22', 'BAMENDA', '628565285', 'nkemchop@gmail.com', 'Bambui', 15),
(28, 'Mankaa', 'Nange', 'Female', '2020-08-12', 'Buae', '672819530', 'mankaa2@gmail.com', 'molyko', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(23) NOT NULL,
  `last_name` varchar(23) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(35) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `date`) VALUES
(1, 'Paul', 'Achu', 'paul', 'paul2000', '2019-08-23'),
(2, 'Collins', 'Mukong', 'collins', 'collins', '2019-08-23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
