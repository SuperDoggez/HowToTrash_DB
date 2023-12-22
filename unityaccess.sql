-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2023 at 04:39 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unityaccess`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `UID` int(10) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `hasCharacter` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`UID`, `Username`, `hash`, `salt`, `hasCharacter`) VALUES
(18, 'Username7', '$5$rounds=5000$steamedhamsUsern$z/Gzb89EBjQdhqfosFKBJKzWMrzhA9Uj37JEKRSyfB8', '$5$rounds=5000$steamedhamsUsername7$', 1),
(19, 'Username8', '$5$rounds=5000$steamedhamsUsern$E3HrAtK84bX7.tofOEG0LuP86cpBoWSmw74zDHApIkB', '$5$rounds=5000$steamedhamsUsername8$', 1),
(22, 'UsernameEIEI', '$5$rounds=5000$steamedhamsUsern$LlCt1jZaePP/bPUy4ejhBoi0qaJmNj4CQppzTz7GEd.', '$5$rounds=5000$steamedhamsUsernameEIEI$', 0),
(23, 'UsernameTestTest', '$5$rounds=5000$steamedhamsUsern$uoScjLUJ26oyfK88.bJHjToVttN6WKGxLTedxYlUye.', '$5$rounds=5000$steamedhamsUsernameTestTest$', 0),
(24, 'Username_Test', '$5$rounds=5000$steamedhamsUsern$i.mN3B6T2oL5GVx6vbDy6VVlZwcfQ9n44.AWidXsWl8', '$5$rounds=5000$steamedhamsUsername_Test$', 0),
(25, 'SUPSUPSUP', '$5$rounds=5000$steamedhamsSUPSU$yPQcu/lrpeEGRyueTG3j.8hbrrLXHMQw6dTaGI7J1e/', '$5$rounds=5000$steamedhamsSUPSUPSUP$', 1),
(26, 'SUPSUPSUPSUP', '$5$rounds=5000$steamedhamsSUPSU$1SpV3ONYtct17ggk0l6GmQAPIt9VTkENhnDs90zAWc6', '$5$rounds=5000$steamedhamsSUPSUPSUPSUP$', 1),
(27, 'USERUSER', '$5$rounds=5000$steamedhamsUSERU$fx/fzn7H0xW1Uzpqky/vvFA5w/FUM3y1cibmxhMFHK6', '$5$rounds=5000$steamedhamsUSERUSER$', 1),
(29, 'HELLOHELLO', '$5$rounds=5000$steamedhamsHELLO$6kKx8Pawucnd.CZERL1TBPyJuuZ/YP4s0R67bg1hdz5', '$5$rounds=5000$steamedhamsHELLOHELLO$', 1),
(30, 'TESTSUPP', '$5$rounds=5000$steamedhamsTESTS$kdzOTM9kZktXRv3q8p71qxpqYwj5wn0zrFo074WZil8', '$5$rounds=5000$steamedhamsTESTSUPP$', 1),
(31, 'SuperDoggez', '$5$rounds=5000$steamedhamsSuper$n8YwlLh6WnYkNOpvGUHaglQeaqhVtRtyWz1ZjQqmIm7', '$5$rounds=5000$steamedhamsSuperDoggez$', 1),
(32, 'TestUser1', '$5$rounds=5000$steamedhamsTestU$chYdBDroa1eNGNig.pR09czWem1LH4Ryj8tAmniPFA0', '$5$rounds=5000$steamedhamsTestUser1$', 1),
(33, '12345678', '$5$rounds=5000$steamedhams12345$o/upYKrm/pVzKtLu9n9o8s.5q1EqoYG.SYAoQZ54GC3', '$5$rounds=5000$steamedhams12345678$', 1);

-- --------------------------------------------------------

--
-- Table structure for table `character`
--

CREATE TABLE `character` (
  `UID` int(20) NOT NULL,
  `C_name` varchar(20) NOT NULL,
  `CharacterID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `character`
--

INSERT INTO `character` (`UID`, `C_name`, `CharacterID`) VALUES
(18, 'TAHOO', 0),
(19, 'Testttttttt', 2),
(25, 'TESTTEST', 3),
(26, 'YO', 3),
(27, 'USERUSER', 1),
(29, 'HELLOHELLO', 4),
(30, 'dfasfdas', 3),
(31, 'Test', 5),
(32, 'Sup', 4),
(33, '423423', 0);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `UID` int(3) NOT NULL,
  `PlayerProgress` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`UID`, `PlayerProgress`) VALUES
(18, 3),
(19, 6),
(25, 5),
(26, 3),
(27, 3),
(29, 3),
(30, 1),
(31, 18),
(32, 7),
(33, 5);

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `MapID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`MapID`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `ScoreID` int(10) NOT NULL,
  `UID` int(3) NOT NULL,
  `MapID` int(2) NOT NULL,
  `Score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`ScoreID`, `UID`, `MapID`, `Score`) VALUES
(1, 18, 1, 0),
(4, 19, 2, 0),
(5, 18, 1, 0),
(7, 18, 1, 0),
(8, 19, 1, 1),
(10, 18, 1, 0),
(13, 18, 1, 0),
(14, 18, 1, 0),
(15, 18, 1, 0),
(16, 18, 2, 0),
(19, 25, 1, 0),
(20, 25, 2, 0),
(21, 25, 1, 6),
(22, 25, 1, 8),
(23, 26, 1, 0),
(25, 19, 2, 0),
(26, 19, 1, 0),
(27, 19, 1, 0),
(28, 19, 2, 0),
(29, 27, 1, 0),
(30, 27, 2, 0),
(31, 26, 2, 0),
(32, 29, 1, 1),
(33, 29, 2, 0),
(34, 19, 1, 9),
(35, 19, 2, 0),
(36, 31, 1, 14),
(37, 31, 1, 16),
(38, 19, 1, 1),
(39, 31, 1, 1),
(40, 31, 1, 1),
(41, 31, 1, 1),
(42, 31, 1, 11),
(43, 31, 1, 1),
(44, 31, 1, 2),
(45, 32, 1, 25),
(46, 32, 1, 10),
(47, 32, 1, 5),
(48, 32, 1, 15),
(49, 32, 1, 45),
(50, 32, 1, 65),
(51, 31, 1, 25),
(52, 31, 1, 75),
(53, 31, 2, 0),
(56, 31, 2, 0),
(58, 31, 2, 0),
(60, 33, 1, 0),
(62, 33, 1, 0),
(63, 33, 1, 95);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `character`
--
ALTER TABLE `character`
  ADD KEY `FK_AccountCharacter` (`UID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD KEY `level_UID` (`UID`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`MapID`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`ScoreID`),
  ADD KEY `MapID_SCORE` (`MapID`),
  ADD KEY `UID_SCORE` (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `UID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `ScoreID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `character`
--
ALTER TABLE `character`
  ADD CONSTRAINT `FK_AccountCharacter` FOREIGN KEY (`UID`) REFERENCES `account` (`UID`) ON DELETE CASCADE;

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_UID` FOREIGN KEY (`UID`) REFERENCES `account` (`UID`) ON DELETE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `MapID_SCORE` FOREIGN KEY (`MapID`) REFERENCES `map` (`MapID`) ON DELETE CASCADE,
  ADD CONSTRAINT `UID_SCORE` FOREIGN KEY (`UID`) REFERENCES `character` (`UID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
