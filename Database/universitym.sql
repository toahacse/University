-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 07:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitym`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocateroom`
--

CREATE TABLE `allocateroom` (
  `id` int(111) NOT NULL,
  `dpt` varchar(111) NOT NULL,
  `course` varchar(111) NOT NULL,
  `roomNumber` varchar(111) NOT NULL,
  `day` varchar(111) NOT NULL,
  `startTime` varchar(111) NOT NULL,
  `endTime` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocateroom`
--

INSERT INTO `allocateroom` (`id`, `dpt`, `course`, `roomNumber`, `day`, `startTime`, `endTime`) VALUES
(1, 'Civil', 'Civil', '404', 'Saturday', '9.00 am', '12.00 pm'),
(3, 'computer', 'Civil', '505', 'Select', '9.00 am', '12.00 pm'),
(4, 'computer', 'computer-fundamental', '404', 'Monday', '9.00 am', '12.00 pm'),
(5, 'computer', 'computer-fundamental', '404', 'Monday', '1.00 pm', '4.00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `assigncourse`
--

CREATE TABLE `assigncourse` (
  `id` int(111) NOT NULL,
  `department` varchar(111) NOT NULL,
  `teacher` varchar(111) NOT NULL,
  `token` varchar(111) NOT NULL,
  `remaningCredit` varchar(111) NOT NULL,
  `courseCode` varchar(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `credit` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigncourse`
--

INSERT INTO `assigncourse` (`id`, `department`, `teacher`, `token`, `remaningCredit`, `courseCode`, `name`, `credit`) VALUES
(1, 'mr.y', 'ctg', '5', '0', '102', 'computer', '4'),
(3, 'eee', 'mr.tttt', '15', '11', 'mt-1007', 'basic electronics', '4'),
(6, 'computer', 'mr.x', '20', '16', 'mt-1002', 'data structure', '4'),
(7, 'eee', 'mr.tttt', '11', '7', 'mt-1007', 'basic electronics', '4'),
(8, 'computer', 'mr.x', '16', '12', 'mt-1002', 'data structure', '4'),
(9, 'computer', 'mr.x', '12', '8', 'mt-1001', 'computer-fundamental', '4'),
(10, 'computer', 'mr.x', '20', '16', 'mt-1001', 'computer-fundamental', '4'),
(11, 'computer', 'mr.x', '20', '16', 'mt-1001', 'computer-fundamental', '4'),
(12, 'computer', 'Select', '20', '16', 'ct-1019', 'Programming C', '4');

-- --------------------------------------------------------

--
-- Table structure for table `courseenroll`
--

CREATE TABLE `courseenroll` (
  `id` int(111) NOT NULL,
  `studentRegNo` varchar(111) NOT NULL,
  `studentName` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `department` varchar(111) NOT NULL,
  `selectCourse` varchar(111) NOT NULL,
  `date` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseenroll`
--

INSERT INTO `courseenroll` (`id`, `studentRegNo`, `studentName`, `email`, `department`, `selectCourse`, `date`) VALUES
(1, '879955', 'md.tttt', 'toaha@gmail.com', 'computer', 'diploma', '2017-05-05'),
(2, 'eee-1521452398', 'md.gggg', 'hhh@gmail.com', 'eee', 'basic electronics', '2018-03-19'),
(3, 'computer-1521447708', 'md.tttt', 'toaha@gmail.com', 'computer', 'Select', '2017-05-05'),
(4, 'computer-1521447708', 'md.tttt', 'toaha@gmail.com', 'computer', 'computer-fundamental', '2017-05-05'),
(5, 'computer-1521447708', 'md.tttt', 'toaha@gmail.com', 'computer', 'data structure', '2017-05-05'),
(6, 'computer-1521447708', 'md.tttt', 'toaha@gmail.com', 'computer', 'Programming C', '2017-05-05'),
(7, 'computer-1521605937', 'md.zzz', 'zzz@gmail.com', 'computer', 'data structure', '2017-05-05'),
(8, 'Civil-23', 'md.uuu', 'uuu@gmail.com', 'Civil', 'Civil', '2017-05-05'),
(9, 'computer-1', 'md.jjj', 'jjj@gmail.com', 'computer', 'computer-fundamental', '2017-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `regstudent`
--

CREATE TABLE `regstudent` (
  `id` int(111) NOT NULL,
  `studentName` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `contactNo` varchar(111) NOT NULL,
  `date` varchar(111) NOT NULL,
  `address` varchar(111) NOT NULL,
  `department` varchar(111) NOT NULL,
  `reg` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regstudent`
--

INSERT INTO `regstudent` (`id`, `studentName`, `email`, `contactNo`, `date`, `address`, `department`, `reg`) VALUES
(3, 'md.tttt', 'toaha@gmail.com', '786786786', '19/03/2018', 'ctg', 'computer', 'computer-1521447708'),
(4, 'md.gggg', 'hhh@gmail.com', '786786786', '2017-05-05', 'ctg', 'eee', 'eee-1521452398'),
(5, 'md.zzz', 'zzz@gmail.com', '78678678688', '2017-05-05', 'ctg', 'computer', 'computer-1521605937'),
(6, 'md.kkk', 'kkk@gmail.com', '786786786', '2017-05-05', 'ctg', 'computer', 'computer-22'),
(7, 'md.uuu', 'uuu@gmail.com', '78678678688', '2017-05-05', 'ctg', 'Civil', 'Civil-23'),
(8, 'md.pp', 'pp@gmail.com', '78678678688', '2017-05-05', 'ctg', 'math', 'math-24'),
(9, 'md.mm', 'mm@gmail.com', '78678678688656', '2017-05-05', 'ctg', 'Mechanical', 'Mechanical-25'),
(10, 'md.jjj', 'jjj@gmail.com', '786786786765', '2017-05-05', 'ctg', 'computer', 'computer-1'),
(11, 'md.bappy', 'bapyy@gamil.com', '454546566556', '19/03/2018', 'ctg', 'computer', 'computer-1');

-- --------------------------------------------------------

--
-- Table structure for table `savecourse`
--

CREATE TABLE `savecourse` (
  `id` int(111) NOT NULL,
  `saveCourseCode` varchar(111) NOT NULL,
  `saveDptName` varchar(111) NOT NULL,
  `saveDptcredit` varchar(111) NOT NULL,
  `saveDptDes` varchar(111) NOT NULL,
  `dpt` varchar(111) NOT NULL,
  `semester` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savecourse`
--

INSERT INTO `savecourse` (`id`, `saveCourseCode`, `saveDptName`, `saveDptcredit`, `saveDptDes`, `dpt`, `semester`) VALUES
(1, '102', 'Civil', '14', 'gdfgfdgdfgfgfggd', 'Civil', '4th Semester'),
(2, 'mt-1001', 'computer-fundamental', '4', 'computer basic', 'computer', '1st Semester'),
(3, 'mt-1002', 'data structure', '4', 'computer structure', 'computer', '4th Semester'),
(4, 'mt-1007', 'basic electronics', '4', 'electronics besic', 'eee', '1st Semester'),
(5, 'mt-1009', 'Accounting', '4', 'accounting', 'Accounting', '5th Semester'),
(6, 'ct-1019', 'Programming C', '4', 'Mother Of Programmin lang', 'computer', '4th Semester');

-- --------------------------------------------------------

--
-- Table structure for table `savedepartment`
--

CREATE TABLE `savedepartment` (
  `id` int(111) NOT NULL,
  `saveDptCode` varchar(111) NOT NULL,
  `saveDptName` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savedepartment`
--

INSERT INTO `savedepartment` (`id`, `saveDptCode`, `saveDptName`) VALUES
(1, '101', 'computer'),
(5, '101', 'Civil'),
(6, '109', 'eee'),
(7, '101', 'math'),
(8, '109', 'English'),
(9, '105', 'Physics'),
(10, '111', 'Accounting'),
(11, '99', 'Mechanical'),
(12, '117', 'Chemestry');

-- --------------------------------------------------------

--
-- Table structure for table `saveresult`
--

CREATE TABLE `saveresult` (
  `id` int(111) NOT NULL,
  `studentRegNo` varchar(111) NOT NULL,
  `studentName` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `department` varchar(111) NOT NULL,
  `selectCourse` varchar(111) NOT NULL,
  `grade` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saveresult`
--

INSERT INTO `saveresult` (`id`, `studentRegNo`, `studentName`, `email`, `department`, `selectCourse`, `grade`) VALUES
(1, 'computer-1521447708', 'md.tttt', 'toaha@gmail.com', 'computer', 'computer-fundamental', 'A+'),
(2, 'computer-1521447708', 'md.tttt', 'toaha@gmail.com', 'computer', 'data structure', 'A-'),
(3, 'computer-1521447708', 'md.tttt', 'toaha@gmail.com', 'computer', 'Programming C', 'A+'),
(4, 'eee-1521452398', 'md.gggg', 'hhh@gmail.com', 'eee', 'basic electronics', 'A+'),
(5, 'computer-1521605937', 'md.zzz', 'zzz@gmail.com', 'computer', 'computer-fundamental', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `saveteacher`
--

CREATE TABLE `saveteacher` (
  `id` int(111) NOT NULL,
  `TeacherName` varchar(111) NOT NULL,
  `TeacherAdd` varchar(111) NOT NULL,
  `TeacherEmail` varchar(111) NOT NULL,
  `TeacherPhoneNo` varchar(111) NOT NULL,
  `TeacherDpt` varchar(111) NOT NULL,
  `TeacherDesignation` varchar(111) NOT NULL,
  `Credit` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saveteacher`
--

INSERT INTO `saveteacher` (`id`, `TeacherName`, `TeacherAdd`, `TeacherEmail`, `TeacherPhoneNo`, `TeacherDpt`, `TeacherDesignation`, `Credit`) VALUES
(1, 'mr.y', 'ctg', '', '988878689696', 'cse', 'lacturer', '4'),
(2, 'mr.x', 'England', 'mr.x@gmail.com', '988878689696', 'Computer', 'lacturer', '20'),
(5, 'mr.Haking', 'USA', 'mr.hak@gmail.com', '988878689696', 'Physics', 'Professor', '20'),
(7, 'mr.tom', 'ctg', 'mr.tom@gmail.com', '988878689696', 'Accounting', 'Lacturer', '20'),
(9, 'mr.kamal', 'Chittagong,Bangladesh.', 'mr.kamal@gmail.com', '988878689696', 'math', 'Professor', '30'),
(10, 'mr.tom', '', 'mr.ertftgfrfrds@gmail.com', '988878689696', 'computer', 'Professor', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocateroom`
--
ALTER TABLE `allocateroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigncourse`
--
ALTER TABLE `assigncourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenroll`
--
ALTER TABLE `courseenroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regstudent`
--
ALTER TABLE `regstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savecourse`
--
ALTER TABLE `savecourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savedepartment`
--
ALTER TABLE `savedepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saveresult`
--
ALTER TABLE `saveresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saveteacher`
--
ALTER TABLE `saveteacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocateroom`
--
ALTER TABLE `allocateroom`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `assigncourse`
--
ALTER TABLE `assigncourse`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `courseenroll`
--
ALTER TABLE `courseenroll`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `regstudent`
--
ALTER TABLE `regstudent`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `savecourse`
--
ALTER TABLE `savecourse`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `savedepartment`
--
ALTER TABLE `savedepartment`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `saveresult`
--
ALTER TABLE `saveresult`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `saveteacher`
--
ALTER TABLE `saveteacher`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
