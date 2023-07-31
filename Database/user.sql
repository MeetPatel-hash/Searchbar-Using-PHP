-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 11:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeelkalsariya`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `age` int(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `age`, `hobbies`, `Date_of_birth`, `image`) VALUES
(1, 'Tanya', 'Decker', 'zaceryzu@mailinator.com', '$2y$10$5qzwKyKLF4aB0RURC5Tp8O6pj5FFdZzhzlZCTVGxtwDWDg.nh.q4q', 'female', 13, 'Others', '1976-05-26', 'vhn4xavatar2.png'),
(3, 'Joan', 'Marvell', 'joan@mailinator.com', '$2y$10$D0D40yOuEh/0bPDNHf.qGuDzr6GkRSz8r2LKKTfVMa8G6hcGQSAXW', 'female', 50, 'Playing,Others', '2023-07-20', 'sn9d5man-with-beard-avatar-character-isolated-icon-free-vector.jpg'),
(4, 'Reese', 'Doe', 'xefes@mailinator.com', '$2y$10$IWbZpsMQmB.iy7InX/pL8uD4qtM1UxrEYKLNO7nfxvnhf.vbE.eBG', 'male', 37, 'Playing,Reading,Travelling', '2018-05-04', 'wjea8images.png'),
(5, 'Quintessa', 'Dudley', 'pafegyb@mailinator.com', '$2y$10$uC8lPLC/tCPcHYOwqHInFOPlqGc7BmqxF9kW8L2eNEMh/xHURQmJO', 'female', 59, 'Playing,Travelling', '2014-05-25', 'la57qimages.png'),
(7, 'Kelsie', 'Rose', 'wywaguqeh@mailinator.com', '$2y$10$7aVe9YHrX4PbChRkI.NDxuPZmDVzCzE.49T3gGkMFsWSCFYUus3Ga', 'female', 28, 'Playing,Travelling', '2006-04-27', '4rvh5avatar2.png'),
(8, 'Patrick', 'Reyes', 'gigibahabu@mailinator.com', '$2y$10$2PxhufJa/E8Ej/zLgo3vQ.LPxESJsm9E7qht7vFbWHLACmkmGZCRK', 'female', 82, 'Playing,Reading,Travelling,Others', '1976-09-20', 'uft2ypng-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png'),
(9, 'Nerea', 'Mcdowell', 'govuc@mailinator.com', '$2y$10$lr2qOoI/Y/m6e96Vn8Blde52oPi4ALOmv1CppEaoCxwvk3vWLiDEC', 'female', 90, 'Playing,Reading,Travelling', '2000-10-15', '29o8pmale_boy_person_people_avatar_icon_159358.png'),
(10, 'Brennan', 'Patrick', 'hividimata@mailinator.com', '$2y$10$s5W69V/KrNnfKVLCsxKtguwYzETfrfhuxMG2G.Z3xK7K0c5oyTMs2', 'male', 69, 'Reading,Travelling,Others', '1995-11-11', 'd587eimages.png'),
(11, 'Rashad', 'Clarke', 'horywu@mailinator.com', '$2y$10$r7x6uJmSN8W9cV8rdP2B/OxkNsSR6zmJrF6RHN5Ajq.zOMx1uwRBS', 'female', 50, 'Playing,Reading', '1997-12-28', 'p4q1nmysterious-mafia-man-smoking-cigarette_52683-34828 (1).jpg'),
(12, 'Madeson', 'Morton', 'boxyn@mailinator.com', '$2y$10$I1CsJyHPq4xlqQVUSmdfQOHvIN6YpZxPZXoRjaawbCU4A5cAg3RDO', 'male', 63, 'Reading,Others', '1992-09-21', 'pw6hmhead-man_1308-33466.jpg'),
(13, 'Yoshi', 'Armstrong', 'misewima@mailinator.com', '$2y$10$TuUobxhfBwYj3Ufp6IeJ0.xvG0Ml0MKtfYd6qZkP/unqZlEngy4/C', 'male', 73, 'Playing,Travelling', '2014-03-25', '5mx1uhead-man_1308-33466.jpg'),
(14, 'John', 'smith', 'bharat@pixlogix', '$2y$10$cgfzAhsv9ijCgMW81V39fukQ9Zq5O/TxrxD.oDOdzRnZsng8y4u5i', 'female', 20, 'Travelling', '2023-07-27', '812wamysterious-mafia-man-smoking-cigarette_52683-34828 (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
