-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 05:57 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
  `dcount` int(50) NOT NULL DEFAULT 0,
  `stmp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `issues_id`, `fromsub`, `name`, `authors`, `abstract`, `keywords`, `type`, `subdate`, `pubdate`, `file`, `dcount`, `stmp`) VALUES
(1, 1, 0, 'test1a1', 'authors', 'abstract1', 'keywords1', '', '2020-10-11', '2020-10-11', '567b125854da8daafb0242f610bb92c0c14c0e6f.docx', 33, '2021-02-11 16:00:40'),
(2, 1, 1, 'test1a2', 'authors2', 'abstract2', 'keywords2', '', '2020-10-11', '2020-10-11', 'na', 0, '2021-02-11 16:00:40'),
(3, 2, 0, 'test2a1', 'authors3', 'abstract3', 'keywords3', '', '2020-10-11', '2020-10-11', 'na', 21, '2021-02-11 16:00:40'),
(4, 2, 0, 'test2a2', 'authors4', 'abstract4', 'keywords4', '', '2020-10-11', '2020-10-11', 'na', 8, '2021-02-11 16:00:40'),
(5, 3, 1, 'test3a1', 'authors5', 'abstract5', 'keywords5', '', '2020-10-11', '2020-10-11', 'na', 15, '2021-02-11 16:00:40'),
(6, 3, 0, 'test3a2', 'authors6', 'abstract6', 'keywords6', '', '2020-10-11', '2020-10-11', 'na', 2, '2021-02-11 16:00:40'),
(7, 4, 1, 'test4a1', 'authors7', 'abstract7', 'keywords7', 'original research article', '2020-10-11', '2020-10-11', 'na', 3, '2021-02-11 16:00:40'),
(11, 11, 1, 'testst5', 'abcde12', 'abc', 'abcd', 'case report', '2020-10-11', '2020-10-19', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 25, '2021-02-11 16:00:40'),
(12, 11, 1, 'testst5', 'abcde', 'abc', 'abcd', 'original research article', '2020-10-11', '2020-10-19', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(13, 11, 1, 'title', 'abcde', 'abc12', 'abcd', '', '2020-10-17', '2020-10-19', '0491f628bf6c0e975258290375a26fc59802706b.pdf', 0, '2021-02-11 16:00:40'),
(18, 6, 1, 'title', 'test', 'test', 'test', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(19, 1, 1, 'testst1', 'test', 'test', 'test', 'pictorial essay', '2020-10-11', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(20, 1, 1, 'testst1', 'test', 'test', 'test', 'pictorial essay', '2020-10-11', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(21, 1, 1, 'testst1', 'test', 'test', 'test', 'original research article', '2020-10-11', '2020-12-26', '7b724b0c2b9de3a575e0ab8fb5236de6a9e12713.pdf', 0, '2021-02-11 16:00:40'),
(22, 1, 1, 'title', 'test', 'test', 'test', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(23, 1, 1, 'title', 'test', 'test', 'test', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(24, 1, 1, 'title', 'test', 'test', 'test', 'case report', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(25, 1, 1, 'title', 'test', 'test', 'test', 'case report', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(26, 1, 1, 'title', 'test', 'test', 'test', 'case report', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(27, 1, 1, 'title', 'test', 'test', 'test', 'case report', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(28, 1, 1, 'title', 'test', 'test', 'test', 'case report', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(29, 1, 1, 'title', 'test2', 'test2', 'test2', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(30, 1, 1, 'title', 'test2', 'test2', 'test2', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(31, 1, 1, 'title', 'test2', 'test2', 'test2', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(32, 1, 1, 'title', 'test2', 'test2', 'test2', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(33, 1, 1, 'title', 'test2', 'test2', 'test2', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(34, 1, 1, 'title', 'test2', 'test2', 'test2', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(35, 1, 1, 'title', 'test2', 'test2', 'test2', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 2, '2021-02-11 16:00:40'),
(36, 1, 1, 'test', 'test', 'teest', 'test', 'original research article', '2020-12-26', '2020-12-26', '5a99ab3eaff14bd91843eef7cf7bddd2980fd8a0.pdf', 0, '2021-02-11 16:00:40'),
(37, 1, 1, 'testst1', 'test', 'test', 'test', 'case report', '2020-10-11', '2021-02-11', 'b86c1e7c89f7e30600e45a7c73e1c6e166d2a914.pdf', 0, '2021-02-11 16:14:49'),
(38, 1, 1, 'testst1', 'test', 'test', 'test', 'original research article', '2020-10-11', '2021-02-11', 'bd9ebcc0a0e4dd726372606ca70f4e1f4713f658.pdf', 0, '2021-02-11 16:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desg` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `editor` int(1) NOT NULL DEFAULT 1,
  `stmp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `name`, `desg`, `email`, `img`, `editor`, `stmp`) VALUES
(1, 'Dr. Mourya V. S', 'Principal, Government  College of Pharmacy, Aurangabad', 'vkmourya@gmail.com', '', 0, '2021-02-11 00:00:00'),
(2, 'Dr. Khadabadi S. S', 'Principal, Govt. College of Pharmacy, Kathora Naka Amravati', 'khadabadi@yahoo.com', '', 0, '2021-02-11 00:00:00'),
(4, 'Dr. Mahadik K. R.', 'Principal, Bharti Vidyapeeth University, Poona College of Pharmacy, Erandwane, Pune ', 'krmahadik@gmail.com', '', 0, '2021-02-11 00:00:00'),
(23, 'Dr. Mahadik K. R.1', 'Principal, Bharti Vidyapeeth University, Poona College of Pharmacy, Erandwane, Pune ', 'mimohkulkarni17@gmail.com', 'default.png', 1, '2021-02-18 10:12:11'),
(24, 'Dr. Mahadik K. R.11', 'Principal, Bharti Vidyapeeth University, Poona College of Pharmacy, Erandwane, Pune ', 'mimohkulkarni17@gmail.com', 'default.png', 0, '2021-02-18 10:12:53'),
(25, 'Dr. Mahadik K. R.', 'Principal, Bharti Vidyapeeth University, Poona College of Pharmacy, Erandwane, Pune ', 'mimohkulkarni17@gmail.com', '4d498f487236e29f3d8af72dcae4550f4aec0bc2.png', 1, '2021-02-18 10:20:40');

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
  `date` date NOT NULL,
  `stmp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `name`, `guest`, `issue_no`, `vol`, `date`, `stmp`) VALUES
(1, 'testi1', '', 2, '2', '2020-08-01', '2021-02-11 16:00:05'),
(3, 'testi3', '', 4, '2', '2020-10-01', '2021-02-11 16:00:05'),
(4, 'testi4', '', 5, '2', '2020-11-01', '2021-02-11 16:00:05'),
(6, 'mimoh', '', 5, '2', '2020-10-19', '2021-02-11 16:00:05'),
(11, 'testi5', '', 1, '1', '2019-12-01', '2021-02-11 16:00:05'),
(14, 'mayur', '', 7, '2', '2020-10-21', '2021-02-11 16:00:05');

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
  `accept` int(1) NOT NULL DEFAULT 0,
  `stmp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `name`, `email`, `title`, `mobile`, `subdate`, `file`, `accept`, `stmp`) VALUES
(1, 'tests1', 'tests1@example.com', 'testst1', '9876543210', '2020-10-11', 'abc', 1, '2021-02-11 16:01:37'),
(2, 'tests2', 'tests2@example.com', 'testst2', '9876543210', '2020-10-11', 'abc', 0, '2021-02-11 16:01:37'),
(3, 'tests3', 'tests3@example.com', 'testst3', '9876543210', '2020-10-11', 'abc', 0, '2021-02-11 16:01:37'),
(4, 'tests4', 'tests4@example.com', 'testst4', '9876543210', '2020-10-11', 'abc', 0, '2021-02-11 16:01:37'),
(5, 'tests5', 'tests5@example.com', 'testst5', '9876543210', '2020-10-11', 'abc', 0, '2021-02-11 16:01:37'),
(6, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp5BC7.tmp', 0, '2021-02-11 16:01:37'),
(7, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp2CEC.tmp', 0, '2021-02-11 16:01:37'),
(8, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpAB79.tmp', 0, '2021-02-11 16:01:37'),
(9, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp564C.tmp', 0, '2021-02-11 16:01:37'),
(10, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpC61E.tmp', 0, '2021-02-11 16:01:37'),
(11, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp58A4.tmp', 0, '2021-02-11 16:01:37'),
(12, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp78AE.tmp', 0, '2021-02-11 16:01:37'),
(13, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpEF70.tmp', 0, '2021-02-11 16:01:37'),
(14, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpC45D.tmp', 0, '2021-02-11 16:01:37'),
(15, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpFD56.tmp', 0, '2021-02-11 16:01:37'),
(16, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpF8F8.tmp', 0, '2021-02-11 16:01:37'),
(17, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphp7ACC.tmp', 0, '2021-02-11 16:01:37'),
(18, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'C:xampp	mpphpDC2.tmp', 0, '2021-02-11 16:01:37'),
(19, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'd3105ec30b2067724d0e46d926663f865e0018b2', 0, '2021-02-11 16:01:37'),
(20, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'd3105ec30b2067724d0e46d926663f865e0018b2', 0, '2021-02-11 16:01:37'),
(21, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'd3105ec30b2067724d0e46d926663f865e0018b2', 0, '2021-02-11 16:01:37'),
(22, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'ebb0a1faf183e684b8dcba808cf6b66158b20eeb', 0, '2021-02-11 16:01:37'),
(23, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'ee1964ba4f1f1dbb0159f2cd0a53e3c7da552d27', 0, '2021-02-11 16:01:37'),
(24, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-17', 'ee1964ba4f1f1dbb0159f2cd0a53e3c7da552d27', 0, '2021-02-11 16:01:37'),
(25, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '123', '2020-10-18', '567b125854da8daafb0242f610bb92c0c14c0e6f', 0, '2021-02-11 16:01:37'),
(26, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055680143', '2020-10-18', '821594e31868f918b729244018afc98bc5269e9d', 0, '2021-02-11 16:01:37'),
(27, 'swapnil', 'mimohkulkarni17@gmail.com', 'mundhe', '8055680143', '2020-10-20', '0415c3908f166c6a5e37dbaf9a3b9edfad91ff46.docx', 0, '2021-02-11 16:01:37'),
(28, 'audu', 'mimohkulkarni17@gmail.com', 'audu', '8055680143', '2020-10-20', '567b125854da8daafb0242f610bb92c0c14c0e6f.docx', 0, '2021-02-11 16:01:37'),
(29, 'mimoh', 'mimohkulkarni17@gmail.com', 'title', '8055568041', '2020-12-26', 'd3105ec30b2067724d0e46d926663f865e0018b2.docx', 1, '2021-02-11 16:01:37'),
(30, 'mimoh', 'mimohkulkarni17@gmail.com', 'test', '8055680143', '2020-12-26', 'a25b2c33e87e4323ccea8a44849078d621259c7d.docx', 0, '2021-02-11 16:01:37');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
