-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 05:01 AM
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
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE `assignment` (
  `pk_id` int(11) NOT NULL,
  `fk_event_id` int(11) NOT NULL,
  `assignment_name` varchar(100) NOT NULL,
  `volunteer_number` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentvolunteers`
--

DROP TABLE IF EXISTS `assignmentvolunteers`;
CREATE TABLE `assignmentvolunteers` (
  `fk_assignment_id` int(11) NOT NULL,
  `fk_volunteer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
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
(28, 15, 'Food Drive', '2021-01-28 08:30:00', '2020-12-14 21:51:04', '12');

-- --------------------------------------------------------

--
-- Table structure for table `eventvolunteers`
--

DROP TABLE IF EXISTS `eventvolunteers`;
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
(28, 8);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
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
(15, 'Test Organization', 'test@test.com', '4025404447', '$2y$10$1UN.AGv7PO.R.HU9X3BV9.2ODx6WFCaEnEf9PZwvcEafO9hVxrbZ.', '2020-12-13 01:38:57', 'New Name'),
(18, 'Food Bank', 'foodbank@foodbank.com', '4025404447', '$2y$10$A1H2/yWnjf9UBWIRPmNXzO5hwxnP9KAAcBwa4pLasKLWMEXu/Xix2', '2020-12-14 21:28:00', 'Brett');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
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
(18, 18, 'Babe', 'Ruth', 'baberuth@gmail.com', '4024506089', '2020-12-14 21:42:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`pk_id`),
  ADD KEY `fk_eventId_assignmentTable` (`fk_event_id`);

--
-- Indexes for table `assignmentvolunteers`
--
ALTER TABLE `assignmentvolunteers`
  ADD KEY `fk_assignmentId_assignmentvolunteersTable` (`fk_assignment_id`),
  ADD KEY `fk_volunteerId_assignmentvolunteersTable` (`fk_volunteer_id`);

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
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `fk_eventId_assignmentTable` FOREIGN KEY (`fk_event_id`) REFERENCES `event` (`pk_id`);

--
-- Constraints for table `assignmentvolunteers`
--
ALTER TABLE `assignmentvolunteers`
  ADD CONSTRAINT `fk_assignmentId_assignmentvolunteersTable` FOREIGN KEY (`fk_assignment_id`) REFERENCES `assignment` (`pk_id`),
  ADD CONSTRAINT `fk_volunteerId_assignmentvolunteersTable` FOREIGN KEY (`fk_volunteer_id`) REFERENCES `volunteer` (`pk_id`);

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
