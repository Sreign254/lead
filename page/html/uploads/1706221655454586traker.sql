-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 09:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traker`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_project`
--

CREATE TABLE `add_project` (
  `id` int(11) NOT NULL,
  `siteid` varchar(100) DEFAULT NULL,
  `sitename` varchar(100) DEFAULT NULL,
  `sitegps` varchar(100) DEFAULT NULL,
  `typeofscoop` varchar(50) DEFAULT NULL,
  `selectteamleader` varchar(100) DEFAULT NULL,
  `dateofscoop` varchar(50) DEFAULT NULL,
  `additionalscoop` varchar(255) DEFAULT NULL,
  `teammembers` varchar(500) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_project`
--

INSERT INTO `add_project` (`id`, `siteid`, `sitename`, `sitegps`, `typeofscoop`, `selectteamleader`, `dateofscoop`, `additionalscoop`, `teammembers`, `status`) VALUES
(1, 'y', 'rr', 'rr', 'installation  ', 'mike ', '\r\n     2022-06-14 ', 'on', 'rguuew\r\nidhep;', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `profileimg` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` int(11) NOT NULL,
  `siteid` varchar(100) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `sitename` varchar(150) DEFAULT NULL,
  `sitegps` varchar(255) DEFAULT NULL,
  `carriername` varchar(255) DEFAULT NULL,
  `towerheight` varchar(50) DEFAULT NULL,
  `sector` varchar(25) DEFAULT NULL,
  `typeofscope` varchar(255) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `jha` varchar(255) DEFAULT NULL,
  `barricading` varchar(255) DEFAULT NULL,
  `firstaidbox` varchar(255) DEFAULT NULL,
  `fireextinguisher` varchar(255) DEFAULT NULL,
  `toolbox` varchar(255) DEFAULT NULL,
  `rubbishpoint` varchar(255) DEFAULT NULL,
  `energizer` varchar(255) DEFAULT NULL,
  `electricfence` varchar(255) DEFAULT NULL,
  `groundingtower` varchar(255) DEFAULT NULL,
  `centralsite` varchar(255) DEFAULT NULL,
  `teammembers` varchar(255) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `siteid`, `date`, `sitename`, `sitegps`, `carriername`, `towerheight`, `sector`, `typeofscope`, `message`, `jha`, `barricading`, `firstaidbox`, `fireextinguisher`, `toolbox`, `rubbishpoint`, `energizer`, `electricfence`, `groundingtower`, `centralsite`, `teammembers`, `userid`) VALUES
(1, 'y', '2022-06-18', 'sac', 'rr', '', '', '', '', 'f', 'download.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'y', '2022-06-02', 'sac', 'sa', '', '', '', '3', 'j', 'images_(1).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'd', '2022-06-07', 'sac', 'sa', '', '', '', '4', 'csdcv', 'images_(1).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'g', '2022-06-13', 'g', 'g', 'g', 'g', 'g', '3', 'g', 'images_(1).jpg', 'download.jpg', 'images_(1).jpg', 'images.jpg', 'download.jpg', 'images.jpg', 'images_(1).jpg', 'download.jpg', 'images_(1).jpg', 'images.jpg', 'download.jpg', NULL),
(5, 'e', '2022-06-16', 'e', 'e', 'e', 'e', 'e', '3', 'ee', '', '', '', '', '', '', '', '', '', '', 'images_(1).jpg', 10),
(6, 'ereg', '2022-07-01', 'eeffe', 'effe', 'ff', 'eff', 'effe', '4', '&lt;p&gt;fddfdf&lt;/p&gt;', '', '', '', '', '', '', '', '', '', '', '', 10),
(7, 'dd', '2022-06-22', 'dd', 'dd', 'ddd', 'dd', 'd', '2', '&lt;p&gt;dddd&lt;/p&gt;', '', '', '', '', '', '', '', '', '', '', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `new_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `profileimg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`, `profileimg`) VALUES
(9, 'hrhr', 'red@gmail.com', '$2y$10$//O/7bRJ0sUGRezIdYHbAePm2mYRTUZlqaeDzz7q0BKTR8CWBUU/C', '2022-06-12 10:17:02', NULL),
(10, 'please', 'go@gmail.com', '$2y$10$AxYSeWHeWpuclClw9DrN2eezeVbyEh.FNoc.o6r6x7ef5GZt7apHy', '2022-06-12 10:27:46', 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp`
--

CREATE TABLE `whatsapp` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `phonenumber` varchar(12) NOT NULL,
  `views` int(11) NOT NULL,
  `earnings` int(11) NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `Dtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `whatsapp`
--

INSERT INTO `whatsapp` (`id`, `uid`, `phonenumber`, `views`, `earnings`, `screenshot`, `status`, `Dtime`) VALUES
(1, 11, '789456230', 10, 1000, 'BM3-small-logo-solo.jpg', 1, '2022-06-01 06:45:10'),
(2, 11, '147852369', 15, 1500, 'BM-min.jpg', 1, '2022-06-01 08:19:28'),
(3, 18, '4445552221', 55, 5500, 'BM3-small-logo-solo.png', 1, '2022-06-01 08:58:35'),
(4, 13, '0722100200', 20, 2000, 'WhatsApp_Image_2022-05-22_at_11.09.18_AM.jpeg', 1, '2022-06-01 08:59:24'),
(5, 19, '1', 2, 200, 'images_(1).jpg', NULL, '2022-06-05 13:22:44'),
(6, 19, '1', 0, 0, 'download.jpg', NULL, '2022-06-05 13:51:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_project`
--
ALTER TABLE `add_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_project`
--
ALTER TABLE `add_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
