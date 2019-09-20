-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2019 at 11:44 AM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `details` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `submission_date` date NOT NULL,
  `sections_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `activity`, `details`, `date`, `submission_date`, `sections_id`, `class_id`, `school_id`) VALUES
(1, 'Activity 1', 'Activity', '2019-07-11', '2019-07-27', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) NOT NULL,
  `sections_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `teachers_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` int(11) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `page-name` varchar(250) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `bus_number` varchar(110) NOT NULL,
  `route_id` int(11) NOT NULL,
  `student_strength` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `bus_number`, `route_id`, `student_strength`, `school_id`) VALUES
(1, '123245', 1, 50, 3),
(2, '54321', 2, 50, 3),
(4, 'mh12313', 1, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `school_id`, `class`) VALUES
(1, 3, 1),
(2, 3, 2),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `drivers_name` varchar(50) NOT NULL,
  `drivers_address` varchar(250) NOT NULL,
  `drivers_mobile` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `users_id`, `drivers_name`, `drivers_address`, `drivers_mobile`, `bus_id`, `join_date`) VALUES
(1, 37, 'Ashutosh verma', 'Higna', 2147483647, 1, '2019-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sections_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `subject` varchar(50) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `class_id`, `sections_id`, `date`, `time`, `subject`, `exam_type_id`, `school_id`) VALUES
(1, 1, 1, '2019-07-01', '01:07:00', 'Math', 1, 3),
(2, 1, 1, '2019-07-30', '03:15:00', 'English', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`id`, `type`, `school_id`) VALUES
(1, 'unit 1', 3),
(2, 'unit 2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `questions` varchar(250) NOT NULL,
  `answers` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `school_id`, `questions`, `answers`, `date`) VALUES
(1, 3, 'How future ready is the school?', ' It is more important to know how the school is prepared for the future than its past pedigree.  Most schools also talk about their credentials to prepare children for high stakes competitive examinations like the IIT-JEE and medicine or position themselves as \'focussed on holistic development\'.   But the truth is, no one knows what the future holds.     Your child will be in this school possibly for fourteen years.  The world will be a totally different place by the time s/he is ready to go to college.  It is important to equip children with skills in this context -- skills that can help them navigate the uncertain future and succeed in the jobs and workplaces of that era.  Ask the school how they will teach your child to adapt to uncertainty and change. Crucially, are children learning how to learn? Are they being taught to work successfully in groups and think critically to solve problems? Are they being taught to tolerate ambiguities? Can they learn, unlearn and then relearn?', '2019-07-20'),
(2, 3, 'Does learning happen outside the classroom? ', 'What percentage of the school week is typically spent in the classroom and what percentage in labs and sports?  Do children go on field trips or visits to local museums?  Do they meet achievers in various fields?  Making real world connections to what children learn inside the classrooms are becoming very important.  Classrooms are the most artificial of places in the real world.  Many schools have started designing programs to ensure children see the purpose of their learning, by being exposed to the real world.', '2019-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sections_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `fees_paid` int(11) NOT NULL,
  `date` date NOT NULL,
  `annual_fees` int(11) NOT NULL,
  `total_fees` int(11) NOT NULL,
  `type_payment` varchar(200) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `class_id`, `sections_id`, `students_id`, `fees_paid`, `date`, `annual_fees`, `total_fees`, `type_payment`, `school_id`) VALUES
(1, 1, 2, 2, 100, '2019-07-04', 1100, 0, 'Cash', 3);

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sections_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(50) NOT NULL,
  `details` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `class_id`, `sections_id`, `students_id`, `date`, `subject`, `details`, `image`, `teacher_id`, `submission_date`, `school_id`) VALUES
(3, 1, 1, 39, '2019-07-30', 'math', '', 'images.jpeg', 1, '2019-07-12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `home_page_menu`
--

CREATE TABLE `home_page_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(250) NOT NULL,
  `page_name` varchar(250) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `marks` int(11) NOT NULL,
  `out_of` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `competence` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `teacher_id`, `students_id`, `date`, `marks`, `out_of`, `subject`, `competence`, `school_id`, `exam_type_id`) VALUES
(1, 1, 2, '2019-07-01', 80, 100, 'math', '', 3, 1),
(2, 1, 4, '2019-08-09', 100, 342, 'math', '2314', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `roles_id` varchar(110) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `sections_id` int(11) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `roles_id`, `class_id`, `sections_id`, `school_id`, `message`, `datetime`) VALUES
(1, 'Student', 0, 0, 3, 'Test', '2019-07-05'),
(2, 'Section', 1, 1, 3, 'Section test', '2019-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `practice`
--

CREATE TABLE `practice` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(200) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice`
--

INSERT INTO `practice` (`id`, `class_id`, `students_id`, `image`, `subject`, `date`, `time`, `school_id`) VALUES
(1, 1, 1, 'download_(1).jpeg', 'math', '2019-07-02', '04:25', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(55) NOT NULL,
  `menu_allowed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `menu_allowed`) VALUES
(1, 'admin', ''),
(2, 'School Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pickup_point` varchar(255) NOT NULL,
  `longitude` varchar(110) NOT NULL,
  `lattitude` varchar(110) NOT NULL,
  `school_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `name`, `pickup_point`, `longitude`, `lattitude`, `school_id`) VALUES
(1, 'Khamla', 'Khamla Sq', '', '', '3'),
(2, 'Manewada', 'Manaewada Sq', '', '', '3'),
(3, 'werw', 'erwr', '', '', '3');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `school_address` varchar(250) NOT NULL,
  `school_mobile` int(11) NOT NULL,
  `school_mobile2` int(11) NOT NULL,
  `school_logo` varchar(255) NOT NULL,
  `school_mail` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `school_name`, `school_address`, `school_mobile`, `school_mobile2`, `school_logo`, `school_mail`, `date`) VALUES
(3, 'Disha', 'aa a a a,aaa', 2147483647, 2147483641, 'Screenshot_from_2019-06-12_11-46-404.png', 'aa@a.com', '2019-06-21'),
(4, 'NK', 'NK', 23123, 2131232111, 'download1.jpeg', 'nk@nk.com', '2019-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sections` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `class_id`, `sections`, `school_id`) VALUES
(1, 2, 'A', 3),
(2, 1, 'A', 3),
(3, 2, 'B', 3),
(4, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sections_id` int(11) DEFAULT NULL,
  `student_name` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `adhar` varchar(110) NOT NULL,
  `profile` varchar(110) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `parent_mob` int(11) NOT NULL,
  `mother_name` varchar(110) NOT NULL,
  `mother_mail` varchar(110) DEFAULT NULL,
  `mother_mob` int(11) NOT NULL,
  `parent_scan_id` varchar(11) NOT NULL,
  `roll_number` int(11) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `teachers_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(110) NOT NULL,
  `school_id` int(11) NOT NULL,
  `bus_id` varchar(200) NOT NULL,
  `transportation_id` varchar(200) DEFAULT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `users_id`, `class_id`, `sections_id`, `student_name`, `dob`, `adhar`, `profile`, `parent_name`, `parent_mob`, `mother_name`, `mother_mail`, `mother_mob`, `parent_scan_id`, `roll_number`, `batch`, `teachers_id`, `username`, `password`, `school_id`, `bus_id`, `transportation_id`, `join_date`) VALUES
(1, 38, 1, 1, 'Sharayu Faye', NULL, '', 'download4.jpeg', 'sunil faye', 0, '', '', 0, '8798', 11, '1', 1, 'sunil@gmail.com', 'sunil', 3, '1', '1', '2019-07-19'),
(2, 39, 1, 1, 'Sharayu Bonde', NULL, '', '', 'Ramesh Bonde', 0, '', '', 0, '12123', 12, '1231', 1, 'sharayu@gmail.com', 'sharayu', 3, '1', '1', '2019-07-12'),
(4, 39, 1, 1, 'aa bbb', '2019-08-16', 'q2313', 'download6.jpeg', '11', 3123123, '23131', '', 0, '1', 11, '11', 1, 'sharayu@gmail.com', 'sharayu', 3, '1', '1', '2019-08-08'),
(5, 39, 1, 1, 'fds fd f', '2003-08-16', '3212312312', 'download_(1)2.jpeg', 'Ramesh Bonde', 213213, '32123', 'aaa', 123123213, '12123', 321, '21321', 1, 'sharayu1@gmail.com', 'sharayu', 3, '1', '1', '2019-08-23'),
(6, 39, 1, 1, 'Sharayu Faye22', '2003-08-03', '222', 'download11.jpeg', 'Ramesh Bonde', 213213, '32123', 'aaa', 123123213, '12123', 22, '22', 1, 'sharayu1@gmail.com', 'sharayu', 3, '1', '1', '2019-08-30'),
(7, 41, 1, 1, 'Sneha Maske', '2006-08-08', '34234234234', 'download13.jpeg', 'abc maske', 2147483647, 'aaa maske', 'mmm@gmail.com', 2147483647, '3242344', 3, '33', 0, 'sneha@gmail.com', 'sneha', 3, '1', '1', '2019-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_address` varchar(250) NOT NULL,
  `teacher_mobile` int(11) NOT NULL,
  `teacher_mail` varchar(50) NOT NULL,
  `salary_details` int(11) NOT NULL,
  `education_details` varchar(250) NOT NULL,
  `class` varchar(50) NOT NULL,
  `sections_id` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `school_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `users_id`, `teacher_name`, `teacher_address`, `teacher_mobile`, `teacher_mail`, `salary_details`, `education_details`, `class`, `sections_id`, `join_date`, `school_id`) VALUES
(1, 36, 'Ananya Karmarkar', 'karad,Pune', 2147483647, 'ananya@gmail.com', 0, 'bsc mcm', '', 0, '2019-07-01', '3');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `timetable` int(11) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `sections_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `pickup_point` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `bus_id`, `pickup_point`) VALUES
(1, 1, 'Khamla Sq');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `role` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `gcm_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`, `role`, `school_id`, `token`, `gcm_id`) VALUES
(1, 'admin', 'admin', '2019-06-20', 'admin', 0, '36903_2019/08/02-10:08:53 ', ''),
(34, 'disha', 'disha', '0000-00-00', 'school_admin', 3, '', ''),
(35, 'nk', 'nk', '0000-00-00', 'school_admin', 4, '', ''),
(36, 'ananya', 'ananya', '0000-00-00', 'teacher', 3, '', ''),
(37, 'ashutosh', 'ashutosh', '0000-00-00', 'driver', 3, '', ''),
(38, 'sunil@gmail.com', 'sunil', '0000-00-00', 'student', 3, '21182_2019/07/30-15:07:44 ', ''),
(39, 'sharayu@gmail.com', 'sharayu', '0000-00-00', 'student', 3, '77190_2019/08/05-18:08:27 ', ''),
(40, '1@1.com', '11', '0000-00-00', 'student', 3, '53410_2019/08/05-11:08:54 ', ''),
(41, 'sneha@gmail.com', 'sneha', '0000-00-00', 'student', 3, '', ''),
(42, 'zxczx@d.ds', 'wqeqw', '0000-00-00', 'student', 3, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_id` (`sections_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`,`sections_id`),
  ADD KEY `sections_id` (`sections_id`),
  ADD KEY `students_id` (`students_id`),
  ADD KEY `teachers_id` (`teachers_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_details_id` (`students_id`),
  ADD KEY `students_id` (`students_id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`,`students_id`,`teacher_id`),
  ADD KEY `students_id` (`students_id`),
  ADD KEY `teacher_details_id` (`teacher_id`);

--
-- Indexes for table `home_page_menu`
--
ALTER TABLE `home_page_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_details_id` (`teacher_id`,`students_id`),
  ADD KEY `students_id` (`students_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`,`school_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `practice`
--
ALTER TABLE `practice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`,`students_id`),
  ADD KEY `students_id` (`students_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`,`sections_id`,`teachers_id`,`school_id`),
  ADD KEY `sections_id` (`sections_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `teacher_details_id` (`teachers_id`),
  ADD KEY `transportation_id` (`transportation_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_id` (`sections_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_id` (`bus_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `bus_id_2` (`bus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `home_page_menu`
--
ALTER TABLE `home_page_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `practice`
--
ALTER TABLE `practice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`sections_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`sections_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `attendance_ibfk_4` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `attendance_ibfk_5` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD CONSTRAINT `backgrounds_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD CONSTRAINT `exam_type_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `homework`
--
ALTER TABLE `homework`
  ADD CONSTRAINT `homework_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `homework_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `home_page_menu`
--
ALTER TABLE `home_page_menu`
  ADD CONSTRAINT `home_page_menu_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `practice`
--
ALTER TABLE `practice`
  ADD CONSTRAINT `practice_ibfk_1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `practice_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `transportation`
--
ALTER TABLE `transportation`
  ADD CONSTRAINT `transportation_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
