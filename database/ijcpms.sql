-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 09:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ijcpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `issues_id` int(11) NOT NULL,
  `fromsub` int(1) NOT NULL DEFAULT 0,
  `name` varchar(150) NOT NULL,
  `authors` varchar(1000) NOT NULL,
  `abstract` mediumtext NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL,
  `subdate` date NOT NULL,
  `pubdate` date NOT NULL,
  `file` varchar(200) NOT NULL,
  `dcount` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `issues_id`, `fromsub`, `name`, `authors`, `abstract`, `keywords`, `type`, `subdate`, `pubdate`, `file`, `dcount`) VALUES
(1, 1, 0, 'test1a1', 'authors1', 'abstract1', 'keywords1', '', '2020-10-11', '2020-10-11', '567b125854da8daafb0242f610bb92c0c14c0e6f.docx', 33),
(2, 1, 1, 'test1a2', 'authors2', 'abstract2', 'keywords2', '', '2020-10-11', '2020-10-11', 'na', 0),
(3, 2, 0, 'test2a1', 'authors3', 'abstract3', 'keywords3', '', '2020-10-11', '2020-10-11', 'na', 21),
(4, 2, 0, 'test2a2', 'authors4', 'abstract4', 'keywords4', '', '2020-10-11', '2020-10-11', 'na', 8),
(5, 3, 1, 'test3a1', 'authors5', 'abstract5', 'keywords5', '', '2020-10-11', '2020-10-11', 'na', 14),
(6, 3, 0, 'test3a2', 'authors6', 'abstract6', 'keywords6', '', '2020-10-11', '2020-10-11', 'na', 2),
(7, 4, 1, 'test4a1', 'authors7', 'abstract7', 'keywords7', 'original research article', '2020-10-11', '2020-10-11', 'na', 3),
(11, 11, 1, 'testst5', 'abcde12', 'abc', 'abcd', 'case report', '2020-10-11', '2020-10-19', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 25),
(12, 11, 1, 'testst5', 'abcde', 'abc', 'abcd', 'original research article', '2020-10-11', '2020-10-19', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0),
(13, 11, 1, 'title', 'abcde', 'abc12', 'abcd', '', '2020-10-17', '2020-10-19', '0491f628bf6c0e975258290375a26fc59802706b.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desg` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `name`, `desg`, `email`) VALUES
(1, 'Dr. Mourya V. S', 'Principal, Government  College of Pharmacy, Aurangabad', 'vkmourya@gmail.com'),
(2, 'Dr. Khadabadi S. S', 'Principal, Govt. College of Pharmacy, Kathora Naka Amravati', 'khadabadi@yahoo.com'),
(4, 'Dr. Mahadik K. R.', 'Principal, Bharti Vidyapeeth University, Poona College of Pharmacy, Erandwane, Pune ', 'krmahadik@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `guest` varchar(500) DEFAULT NULL,
  `issue_no` int(13) DEFAULT NULL,
  `vol` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `name`, `guest`, `issue_no`, `vol`, `date`) VALUES
(1, 'testi1', '', 2, '2', '2020-08-01'),
(3, 'testi3', '', 4, '2', '2020-10-01'),
(4, 'testi4', '', 5, '2', '2020-11-01'),
(6, 'mimoh', '', 5, '2', '2020-10-19'),
(11, 'testi5', '', 1, '1', '2019-12-01'),
(14, 'mayur', '', 7, '2', '2020-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(500) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `subdate` date NOT NULL,
  `file` varchar(200) NOT NULL,
  `accept` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `name`, `email`, `title`, `mobile`, `subdate`, `file`, `accept`) VALUES
(1, 'tests1', 'tests1@example.com', 'testst1', '9876543210', '2020-10-11', 'abc', 0),
(2, 'tests2', 'tests2@example.com', 'testst2', '9876543210', '2020-10-11', 'abc', 0),
(3, 'tests3', 'tests3@example.com', 'testst3', '9876543210', '2020-10-11', 'abc', 0),
(4, 'tests4', 'tests4@example.com', 'testst4', '9876543210', '2020-10-11', 'abc', 0),
(5, 'tests5', 'tests5@example.com', 'testst5', '9876543210', '2020-10-11', 'abc', 0),
(6, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp5BC7.tmp', 0),
(7, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp2CEC.tmp', 0),
(8, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpAB79.tmp', 0),
(9, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp564C.tmp', 0),
(10, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpC61E.tmp', 0),
(11, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp58A4.tmp', 0),
(12, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp78AE.tmp', 0),
(13, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpEF70.tmp', 0),
(14, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpC45D.tmp', 0),
(15, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpFD56.tmp', 0),
(16, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpF8F8.tmp', 0),
(17, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp7ACC.tmp', 0),
(18, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpDC2.tmp', 0),
(19, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'd3105ec30b2067724d0e46d926663f865e0018b2', 0),
(20, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'd3105ec30b2067724d0e46d926663f865e0018b2', 0),
(21, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'd3105ec30b2067724d0e46d926663f865e0018b2', 0),
(22, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'ebb0a1faf183e684b8dcba808cf6b66158b20eeb', 0),
(23, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'ee1964ba4f1f1dbb0159f2cd0a53e3c7da552d27', 0),
(24, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'ee1964ba4f1f1dbb0159f2cd0a53e3c7da552d27', 0),
(25, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '123', '2020-10-18', '567b125854da8daafb0242f610bb92c0c14c0e6f', 0),
(26, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-18', '821594e31868f918b729244018afc98bc5269e9d', 0),
(27, 'swapnil', 'mimohkulkarni17@gmail.com', 'mundhe', '8055680143', '2020-10-20', '0415c3908f166c6a5e37dbaf9a3b9edfad91ff46.docx', 0),
(28, 'audu', 'mimohkulkarni17@gmail.com', 'audu', '8055680143', '2020-10-20', '567b125854da8daafb0242f610bb92c0c14c0e6f.docx', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
