-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 04:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pin_mentorski`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190703132052', '2019-07-03 13:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `predmeti`
--

CREATE TABLE `predmeti` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kod` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bodovi` int(11) NOT NULL,
  `sem_redovni` int(11) NOT NULL,
  `sem_izvanredni` int(11) NOT NULL,
  `izborni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`id`, `ime`, `kod`, `program`, `bodovi`, `sem_redovni`, `sem_izvanredni`, `izborni`) VALUES
(1, 'Linearna algebra', 'SIT001', 'Program nije unesen', 5, 1, 1, 'ne'),
(2, 'Fizika', 'SIT002', 'Program nije unesen', 6, 1, 3, 'ne'),
(3, 'Osnove elektrotehnike', 'SIT003', 'Program nije unesen', 6, 1, 1, 'ne'),
(4, 'Digitalna i mikroprocesorska tehnika', 'SIT004', 'Program nije unesen', 7, 1, 2, 'ne'),
(5, 'Uporaba računala', 'SIT005', 'Program nije unesen', 4, 1, 1, 'ne'),
(6, 'Engleski jezik 1', 'SIT006', 'Program nije unesen', 2, 1, 1, 'ne'),
(7, 'Analiza 1', 'SIT007', 'Program nije unesen', 7, 2, 2, 'ne'),
(8, 'Osnove elektronike', 'SIT008', 'Program nije unesen', 6, 2, 2, 'ne'),
(9, 'Arhitektura i organizacija digitalnih računala', 'SIT009', 'Program nije unesen', 7, 2, 3, 'ne'),
(10, 'Uvod u programiranje', 'SIT010', 'Program nije unesen', 8, 2, 3, 'ne'),
(11, 'Engleski jezik 2', 'SIT011', 'Program nije unesen', 2, 2, 2, 'ne'),
(12, 'Primijenjena i numerička matematika', 'SIT012', 'Program nije unesen', 6, 3, 4, 'ne'),
(13, 'Programske metode i apstrakcije', 'SIT013', 'Program nije unesen', 8, 3, 4, 'ne'),
(14, 'Baze podataka', 'SIT014', 'Program nije unesen', 6, 3, 5, 'ne'),
(15, 'Informacijski sustavi', 'SIT015', 'Program nije unesen', 6, 3, 4, 'ne'),
(16, 'Tehnički Engleski jezik', 'SIT016', 'Program nije unesen', 4, 3, 5, 'ne'),
(17, 'Računalne mreže', 'SIT017', 'Program nije unesen', 5, 4, 5, 'ne'),
(18, 'Operacijski sustavi', 'SIT018', 'Program nije unesen', 5, 4, 5, 'ne'),
(19, 'Strukture podataka i algoritmi', 'SIT019', 'Program nije unesen', 5, 4, 6, 'da'),
(20, 'Objektno programiranje', 'SIT020', 'Program nije unesen', 5, 4, 6, 'da'),
(21, 'Baze podataka 2', 'SIT021', 'Program nije unesen', 5, 4, 6, 'da'),
(22, 'Mrežne usluge i programiranje', 'SIT022', 'Program nije unesen', 5, 4, 6, 'da'),
(23, 'Arhitektura osobnih računala', 'SIT023', 'Program nije unesen', 5, 4, 6, 'da'),
(24, 'Projektiranje i upravljanje računalnim mrežama', 'SIT024', 'Program nije unesen', 5, 4, 6, 'da'),
(25, 'Projektiranje informacijskih sustava', 'SIT025', 'Program nije unesen', 5, 4, 6, 'da'),
(26, 'Informatizacija poslovanja', 'SIT026', 'Program nije unesen', 5, 4, 6, 'da'),
(27, 'Ekonomika i organizacija poduzeća', 'SIT027', 'Program nije unesen', 2, 5, 7, 'ne'),
(28, 'Analiza 2', 'SIT028', 'Program nije unesen', 6, 5, 7, 'ne'),
(29, 'Industrijska praksa', 'SIT029', 'Program nije unesen', 2, 5, 7, 'ne'),
(30, 'Arhitektura poslužiteljskih računala', 'SIT030', 'Program nije unesen', 5, 5, 7, 'da'),
(31, 'Sigurnost računala i podataka', 'SIT031', 'Program nije unesen', 5, 5, 7, 'da'),
(32, 'Programski alati na UNIX računalima', 'SIT032', 'Program nije unesen', 5, 5, 7, 'da'),
(33, 'Napredno Windows programiranje', 'SIT033', 'Program nije unesen', 5, 5, 7, 'da'),
(34, 'Objektno orijentirano modeliranje', 'SIT034', 'Program nije unesen', 5, 5, 7, 'da'),
(35, 'Programiranje u Javi', 'SIT035', 'Program nije unesen', 5, 5, 7, 'da'),
(36, 'Programiranje na Internetu', 'SIT036', 'Program nije unesen', 5, 5, 7, 'da'),
(37, 'Elektroničko poslovanje', 'SIT037', 'Program nije unesen', 5, 5, 7, 'da'),
(38, 'Diskretna matematika', 'SIT038', 'Program nije unesen', 6, 6, 8, 'ne'),
(39, 'Upravljanje poslužiteljskim računalima', 'SIT039', 'Program nije unesen', 5, 6, 8, 'da'),
(40, 'Programiranje u C#', 'SIT040', 'Program nije unesen', 5, 6, 8, 'da'),
(41, 'Društveni informacijski sustavi', 'SIT041', 'Program nije unesen', 5, 6, 8, 'da'),
(42, 'Oblikovanje Web stranica', 'SIT042', 'Program nije unesen', 5, 6, 8, 'da'),
(43, 'Vođenje projekata i dokumentacija', 'SIT043', 'Program nije unesen', 5, 6, 8, 'da'),
(44, 'Informatizacija proizvodnje', 'SIT044', 'Program nije unesen', 5, 6, 8, 'da'),
(45, 'Analiza i obrada podataka', 'SIT045', 'Program nije unesen', 5, 6, 8, 'da'),
(46, 'Njemački jezik', 'SSZP40', 'Program nije unesen', 4, 6, 8, 'da'),
(47, 'Talijanski jezik', 'SSZP50', 'Program nije unesen', 4, 6, 8, 'da'),
(48, 'Završni rad', 'SIT046', 'Program nije unesen', 8, 6, 8, 'ne');

-- --------------------------------------------------------

--
-- Table structure for table `upisi`
--

CREATE TABLE `upisi` (
  `student_id` int(11) NOT NULL,
  `predmet_id` int(11) NOT NULL,
  `status` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upisi`
--

INSERT INTO `upisi` (`student_id`, `predmet_id`, `status`) VALUES
(2, 1, ''),
(2, 2, 'passed'),
(2, 6, 'passed'),
(2, 10, 'enrolled'),
(2, 17, 'enrolled'),
(2, 19, 'enrolled'),
(2, 38, 'enrolled'),
(2, 45, 'enrolled'),
(7, 7, 'enrolled'),
(8, 5, 'passed'),
(8, 9, ''),
(8, 10, 'enrolled'),
(8, 16, ''),
(8, 17, 'enrolled'),
(8, 18, ''),
(8, 19, ''),
(8, 20, ''),
(8, 24, 'enrolled'),
(8, 38, 'enrolled'),
(8, 40, ''),
(8, 45, 'enrolled'),
(8, 48, 'enrolled'),
(12, 1, 'passed'),
(12, 4, ''),
(14, 1, ''),
(14, 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `status`) VALUES
(1, 'admin@localhost.com', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', '$argon2i$v=19$m=1024,t=2,p=2$d0lqVWk3bmw3WkdnMVlBbg$sYpk7gef7kN2Cy1rRDlfNGp8DkBEmy5WZkKPqv4tS+8', 'mentor'),
(2, 'user@localhost.com', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '$argon2i$v=19$m=1024,t=2,p=2$OVNweVdmbjhGL3RxcG05aQ$Eu9aoA1ne3b2+kOrY86WcAyVkn18QiHhjTvnzf5zL4Q', 'redovni'),
(7, 'testaaa@localhost.com', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '$argon2i$v=19$m=1024,t=2,p=2$bFNqdDFVa0JZcG5WU29VYg$espiNcrkVeiCeAa+8TSiTcjYeOgLo3aeN8lJwdjB6EI', 'redovni'),
(8, 'ante@localhost.com', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '$argon2i$v=19$m=1024,t=2,p=2$dkVLZWFYT2NNZVkvcHVJYQ$eKPYdTbXQXH0FMT+xL4JLikTdq58jR/ZYEO6e9rqY48', 'redovni'),
(10, 'test12@localhost.com', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '$argon2i$v=19$m=1024,t=2,p=2$R3ZyMUwvdmtUeHhqSXp5Uw$aAYUf11gNVsS4/Q24ARMe1urqDeNbYFGLmEBeHBi81k', 'redovni'),
(11, 'ante1@localhost.com', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '$argon2i$v=19$m=1024,t=2,p=2$SEtId1h6N1A4Y3VrbC9ScQ$ROQO5Fn4sUgcVqCU3GP5t1L4GzMorLsabkWyUWBtOjg', 'redovni'),
(12, 'test_van@localhost.com', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '$argon2i$v=19$m=1024,t=2,p=2$YktWTmFqR2tIWnJxdC5TMQ$eUEzjibKwVuXLUbFLkz8PC+gtJ1o9cw9YEDijqH/m+k', 'izvanredni'),
(13, 'test1@localhost.com', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '$argon2i$v=19$m=1024,t=2,p=2$UG1DZkQ2ZlJQTG9QVW83Vg$/ZE/PBCGVZnROU8SsCo1/JCCSvI3Vugm+oS3ka85Xg0', 'redovni'),
(14, 'test2@localhost.com', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '$argon2i$v=19$m=1024,t=2,p=2$R1gudi94MjdRMGhiWTJBRQ$+awkeUT3X3YcmmI2ZummW1FcGk8HEjLLuHvllTUyWc0', 'redovni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upisi`
--
ALTER TABLE `upisi`
  ADD PRIMARY KEY (`student_id`,`predmet_id`),
  ADD KEY `IDX_EB553B58CB944F1A` (`student_id`),
  ADD KEY `IDX_EB553B58B4810FC4` (`predmet_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `predmeti`
--
ALTER TABLE `predmeti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `upisi`
--
ALTER TABLE `upisi`
  ADD CONSTRAINT `FK_EB553B58B4810FC4` FOREIGN KEY (`predmet_id`) REFERENCES `predmeti` (`id`),
  ADD CONSTRAINT `FK_EB553B58CB944F1A` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
