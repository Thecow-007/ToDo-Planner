-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:5505
-- Generation Time: Apr 09, 2024 at 07:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo-item`
--

CREATE TABLE `todo-item` (
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'Foreign key to user table',
  `item-JSON` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`item-JSON`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table for all of the ToDo items';

--
-- Dumping data for table `todo-item`
--

INSERT INTO `todo-item` (`itemID`, `userID`, `item-JSON`) VALUES
(48, 1, '[{\"isChecked\":false,\"title\":\"Create Search bar function.\",\"tags\":[\"search\",\"button\",\"JavaScript\"]},{\"isChecked\":false,\"title\":\"Create Filters button\",\"tags\":[\"filters\",\"button\",\"JavaScript\"]},{\"isChecked\":false,\"title\":\"Connect users id + ToDo items to backend\",\"tags\":[\"backend\",\"php\",\"database\"]}]'),
(49, 4, '[{\"isChecked\":true,\"title\":\"Exist\",\"tags\":[\"Important\",\"Existential\"]},{\"isChecked\":false,\"title\":\"Figure out how to stop Existing\",\"tags\":[\"Even more Important\",\"budhism?\"]}]'),
(53, 5, '[{\"isChecked\":true,\"title\":\"This is where I store my secret, non Daniel things\",\"tags\":[\"secret\"]},{\"isChecked\":false,\"title\":\"ToDo: Buy Shoes\",\"tags\":[\"shoes\",\"store\"]}]');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `userPassword` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='User password will be a hash value';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userPassword`) VALUES
(1, 'DanielUser', '629f577d8cd90d9ece1ea672264a3ac8904b9b03dfe0b3fc170609c526341789'),
(2, 'ColeUser', '9c385495f911a751fd9b52716adf2ff24aa6930fe427aadd9615e24e9c9f6749'),
(3, 'TestUser', '7bcf9d89298f1bfae16fa02ed6b61908fd2fa8de45dd8e2153a3c47300765328'),
(4, 'ExistingUser', 'a16f3cde644dfe9fd52b914648b4b0a13127217c1a7b3ebd736c98d8f62957c1'),
(5, 'NotDaniel', '629f577d8cd90d9ece1ea672264a3ac8904b9b03dfe0b3fc170609c526341789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo-item`
--
ALTER TABLE `todo-item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `ToDo-userId-index` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo-item`
--
ALTER TABLE `todo-item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo-item`
--
ALTER TABLE `todo-item`
  ADD CONSTRAINT `ToDo_User` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
