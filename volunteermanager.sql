-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 05:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volunteermanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `pk_id` int(11) NOT NULL,
  `fk_organization_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `volunteers_needed` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`pk_id`, `fk_organization_id`, `event_name`, `event_date`, `created_date`, `volunteers_needed`) VALUES
(10, 15, 'County Fair', '2020-12-13 02:20:29', '2020-12-13 02:20:29', '123'),
(11, 15, 'Lincoln Marathon', '2020-12-13 02:22:43', '2020-12-13 02:22:43', '105'),
(12, 15, 'Dog Races', '2020-01-01 08:30:00', '2020-12-13 02:23:07', '21'),
(26, 18, 'Saturday Food Drive', '2020-01-01 08:30:00', '2020-12-14 21:28:57', '10'),
(27, 18, 'Sunday Food Drive', '2020-01-01 08:30:00', '2020-12-14 21:43:22', '123'),
(28, 15, 'Food Drive', '2021-01-28 08:30:00', '2020-12-14 21:51:04', '12'),
(29, 21, 'County Fair', '2020-01-01 08:30:00', '2021-03-13 19:39:59', '123'),
(30, 24, 'County Fair', '2020-01-01 08:30:00', '2021-04-19 19:53:58', '123'),
(31, 25, 'County Fair', '2020-01-01 08:30:00', '2021-04-24 11:13:48', '123'),
(32, 26, 'County Fair', '2020-01-01 08:30:00', '2021-04-25 22:32:27', '123'),
(33, 15, 'Birthday Party', '2020-01-01 08:30:00', '2021-04-27 15:57:53', '123');

-- --------------------------------------------------------

--
-- Table structure for table `eventvolunteers`
--

CREATE TABLE `eventvolunteers` (
  `fk_event_id` int(11) NOT NULL,
  `fk_volunteer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventvolunteers`
--

INSERT INTO `eventvolunteers` (`fk_event_id`, `fk_volunteer_id`) VALUES
(10, 5),
(10, 8),
(10, 6),
(10, 9),
(12, 10),
(10, 8),
(23, 15),
(27, 18),
(26, 16),
(28, 8),
(30, 21),
(30, 21),
(33, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jobinstance`
--

CREATE TABLE `jobinstance` (
  `pk_id` int(11) NOT NULL,
  `startTime` varchar(15) NOT NULL,
  `endTime` varchar(15) NOT NULL,
  `jobTypeID` int(11) NOT NULL,
  `volunteerName` varchar(50) NOT NULL,
  `eventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobinstance`
--

INSERT INTO `jobinstance` (`pk_id`, `startTime`, `endTime`, `jobTypeID`, `volunteerName`, `eventID`) VALUES
(1, '12', '12', 0, 'TEST NAME', 32),
(2, '12', '12', 0, 'TEST NAME', 32),
(3, '12', '12', 1, 'TEST NAME', 32),
(4, '12', '12', 1, 'TEST NAME', 32),
(5, '12', '12', 1, 'TEST NAME', 32),
(6, '12', '12', 1, 'TEST NAME', 32),
(7, '1234', '1234', 2, '1234', 32),
(8, '12', '12', 3, '1234', 32),
(9, '12', '12', 3, '1234', 32),
(10, '12', '12', 3, '1234', 32),
(11, '12', '12', 3, '1234', 32),
(12, '12', '12', 3, '1234', 32),
(13, '12', '12', 3, '1234', 32),
(14, '12', '12', 3, '1234', 32),
(15, '12', '12', 3, '1234', 32),
(16, '12', '12', 3, '1234', 32),
(17, '12', '12', 3, '1234', 32),
(18, '12', '12', 3, '1234', 32),
(19, '12', '12', 3, '1234', 32),
(20, '12', '12', 3, '1234', 32),
(21, '12', '12', 3, '1234', 32),
(22, '12', '12', 3, '1234', 32),
(23, '12', '12', 3, '1234', 32),
(24, '12', '12', 3, '1234', 32),
(25, '12', '12', 3, '1234', 32),
(26, '12', '12', 3, '1234', 32),
(27, '12', '12', 3, '1234', 32),
(28, '12', '12', 3, '1234', 32),
(29, '8am', '3pm', 4, 'Quinn', 33),
(30, '3pm', '8pm', 5, 'Tyler', 33),
(31, '9pj', '999', 5, 'Quinn', 33),
(32, 'asdf', 'asdf', 5, 'asdf', 33);

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `pk_id` int(11) NOT NULL,
  `jobName` varchar(50) NOT NULL,
  `eventID` int(11) NOT NULL,
  `organizationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`pk_id`, `jobName`, `eventID`, `organizationID`) VALUES
(1, 'TEST JOB', 32, 26),
(2, 'NEXT JOB', 32, 26),
(3, 'NEST ONE', 32, 26),
(4, 'Clown', 33, 15),
(5, 'Sword Swallower', 33, 15);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `pk_id` int(11) NOT NULL,
  `organization_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `contact_person_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`pk_id`, `organization_name`, `email`, `phone`, `password`, `created_date`, `contact_person_name`) VALUES
(15, 'Test Organization', 'test@test.com', '4025404447', '$2y$10$XweFeddw2ri9shE1WE0iiukJnzXAnWkucxuXtURPfZKrCVkzompny', '2020-12-13 01:38:57', 'New Name'),
(18, 'Food Bank', 'foodbank@foodbank.com', '4025404447', '$2y$10$A1H2/yWnjf9UBWIRPmNXzO5hwxnP9KAAcBwa4pLasKLWMEXu/Xix2', '2020-12-14 21:28:00', 'Brett'),
(19, 'Test Organization Updated', 'tylerhattan@yahoo.com', '4025404447', '$2y$10$SC8wAQokWUHBEwot5lR/AugHTHSYqtioSR.dP/21PujQzbw3YPbdO', '2020-12-15 09:40:06', 'Test'),
(20, 'Test Organization Updated', 'tt@me.com', '4025404447', '$2y$10$Z1YJPOCKv/5bcANkqDUnru70BNunF4azjYtrcplCJzBIHqeJ7YUQK', '2020-12-15 09:41:35', 'Test'),
(21, 'qwer', 'we@me.com', '0000000000', '$2y$10$vY3Eif3.oK7dA3xZ786HJeUNFQsM2aHU8KVPTdSrHSSksq.JPH38a', '2021-03-13 19:39:42', 'asdf'),
(22, 'Test Organization Updated', 'tya@me.com', '4025404447', '$2y$10$DHcpsHVqzvSHvHETz3t..OdUkf6SwNDj/Su.DXZ9DLlM4AB5zfT/G', '2021-04-04 17:53:41', 'Tyler David Hattan'),
(23, 'Test', 'wer@me.com', '3213213211', '$2y$10$dSu2nclr3e13fPscdkHK6.J9hzo5a9QqtKRPA3dprC25SUUGvDvae', '2021-04-07 23:50:54', 'test'),
(24, 'Test', 'test@me.com', '4025404447', '$2y$10$ltRlKqM2Vl8l2ZS6Nr1krOKroXsC.hTPjpOdQTU9xvFmAnIlUJiDC', '2021-04-19 19:53:41', 'Tyler David Hattan'),
(25, 'asdf', 'asdf@me.com', '4025404447', '$2y$10$Ix9KiIsV/Xi/tp7lD/ID7Of9NkBOmOUhKkGw4/J8OXPM9y//mlCEK', '2021-04-24 11:13:32', 'Tyler David Hattan'),
(26, 'Test Account', 'testaccount@me.com', '4025404447', '$2y$10$XweFeddw2ri9shE1WE0iiukJnzXAnWkucxuXtURPfZKrCVkzompny', '2021-04-25 22:32:10', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `pk_id` int(11) NOT NULL,
  `fk_organization_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`pk_id`, `fk_organization_id`, `first_name`, `last_name`, `email`, `phone`, `created_date`) VALUES
(4, 15, 'Quinn', 'Grealish', 'quinngrealish@gmail.com', '2147483647', '2020-12-13 02:21:24'),
(5, 15, 'Tyler', 'Hattan', 'tylerhattan@yahoo.com', '4025404447', '2020-12-13 02:21:38'),
(6, 15, 'Nathan', 'Mares', 'natemares@gmail.com', '2147483647', '2020-12-13 02:22:01'),
(7, 15, 'Avery', 'Stricker', 'nomansland@yahoo.com', '1112223333', '2020-12-13 11:21:31'),
(8, 15, 'Babe', 'Ruth', 'baberuth@gmail.com', '1112223333', '2020-12-13 15:17:19'),
(9, 15, 'Mickey', 'Mantle', 'mm@me.com', '2147483647', '2020-12-13 15:17:35'),
(10, 15, 'Herb', 'Husker', 'HH@me.com', '1234567890', '2020-12-13 17:33:06'),
(11, 15, 'Test', 'Test', 'newtest@me.com', 'test', '2020-12-13 21:08:28'),
(16, 18, 'Tyler', 'Hattan', 'tylerhattan@yahoo.com', '4025404447', '2020-12-14 21:39:41'),
(17, 18, 'John', 'Johnson', 'jsmith@me.com', '4024722310', '2020-12-14 21:42:20'),
(18, 18, 'Babe', 'Ruth', 'baberuth@gmail.com', '4024506089', '2020-12-14 21:42:43'),
(19, 23, 'Tyler', 'Hattan', 'tylerhattan@yahoo.com', '4025404447', '2021-04-07 23:52:19'),
(21, 24, 'Tyler', 'Hattan', 'tylerhattan@yahoo.com', '4025404447', '2021-04-19 19:54:10'),
(22, 24, 'Kevin', 'Wesley', 'test@test.com', '4024722310', '2021-04-19 19:54:18'),
(23, 25, 'Michelle', 'Bish', 'mb@me.com', '4025404447', '2021-04-24 11:14:22'),
(24, 25, 'tanner', 'bish', 'tb@me.com', '4025404447', '2021-04-24 11:14:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`pk_id`),
  ADD KEY `fk_orgId_eventTable` (`fk_organization_id`);

--
-- Indexes for table `eventvolunteers`
--
ALTER TABLE `eventvolunteers`
  ADD KEY `fk_eventId_eventvolunteersTable` (`fk_event_id`),
  ADD KEY `fk_volunteerId_eventvolunteersTable` (`fk_volunteer_id`);

--
-- Indexes for table `jobinstance`
--
ALTER TABLE `jobinstance`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`pk_id`),
  ADD KEY `fk_orgId_volunteerTable` (`fk_organization_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jobinstance`
--
ALTER TABLE `jobinstance`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_orgId_eventTable` FOREIGN KEY (`fk_organization_id`) REFERENCES `organization` (`pk_id`);

--
-- Constraints for table `eventvolunteers`
--
ALTER TABLE `eventvolunteers`
  ADD CONSTRAINT `fk_eventId_eventvolunteersTable` FOREIGN KEY (`fk_event_id`) REFERENCES `event` (`pk_id`),
  ADD CONSTRAINT `fk_volunteerId_eventvolunteersTable` FOREIGN KEY (`fk_volunteer_id`) REFERENCES `volunteer` (`pk_id`);

--
-- Constraints for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD CONSTRAINT `fk_orgId_volunteerTable` FOREIGN KEY (`fk_organization_id`) REFERENCES `organization` (`pk_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
