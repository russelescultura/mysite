-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 05:52 PM
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
-- Database: `u734514591_kenruss`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `headline`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Hi, I\'m Russel Escultura!', 'A passionate web developer freshly graduated with a BS in Information Technology. I\'m eager to collaborate with amazing minds in the web development industry to sharpen my coding skills and create innovative websites that drive success. With a deep love for coding, I\'m ready to turn creative ideas into impactful digital solutions. Let\'s build something extraordinary together!', '2024-07-21 07:10:53', '2024-08-18 15:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `operation_type` varchar(255) DEFAULT NULL,
  `change_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `change_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `table_name`, `operation_type`, `change_time`, `change_details`) VALUES
(1, 'experience', 'UPDATE', '2024-07-29 05:10:07', 'Record updated. Old: id=1, user_id=0, company_name=Tech Solutionsewfhhrohjr01, location=New Yorkesfhhrohjr01, job_title=Software Engineerfsehhrohjr01, date_started=2020-06-06, date_ended=2023-06-07 New: id=1, user_id=0, company_name=Tech Solutionsewfhhrohjr01, location=New Yorkesfhhrohjr01d, job_title=Software Engineerfsehhrohjr01, date_started=2020-06-06, date_ended=2023-06-07'),
(2, 'contact', 'INSERT', '2024-08-15 05:17:36', 'New record added: id=12, name=Russel, email=kenruss@gmail.com, phone=90787867'),
(3, 'seminars', 'DELETE', '2024-08-16 06:29:00', 'Record deleted: id=2, seminar_title=Advanced Data Structures, conductor=Prof. John Doe, seminar_year=2024, seminar_month=6, description=Deep dive into complex data structures and their implementations in various programming languages.'),
(4, 'seminars', 'DELETE', '2024-08-16 06:29:04', 'Record deleted: id=3, seminar_title=Cybersecurity Essentials, conductor=Sarah Johnson, CISSP, seminar_year=2024, seminar_month=9, description=Learn the fundamentals of cybersecurity and best practices for protecting digital assets.'),
(5, 'seminars', 'DELETE', '2024-08-16 06:29:07', 'Record deleted: id=4, seminar_title=Web Development with React, conductor=Mike Chen, seminar_year=2024, seminar_month=11, description=Hands-on workshop covering React fundamentals and building modern, responsive web applications.'),
(6, 'seminars', 'DELETE', '2024-08-16 06:29:11', 'Record deleted: id=5, seminar_title=Artificial Intelligence Ethics, conductor=Dr. Emily Brown, seminar_year=2025, seminar_month=1, description=Exploring the ethical implications of AI and machine learning in society and industry.'),
(7, 'seminars', 'DELETE', '2024-08-16 06:29:14', 'Record deleted: id=6, seminar_title=dad, conductor=dawd, seminar_year=2001, seminar_month=1, description=sefasfasefasdf'),
(8, 'seminars', 'DELETE', '2024-08-16 06:29:18', 'Record deleted: id=7, seminar_title=3rwrr, conductor=erwrew, seminar_year=2002, seminar_month=11, description=0dawdaw'),
(9, 'seminars', 'DELETE', '2024-08-16 06:29:21', 'Record deleted: id=8, seminar_title=dad, conductor=dawd, seminar_year=2001, seminar_month=1, description=0dawdawd'),
(10, 'experience', 'DELETE', '2024-08-16 06:29:28', 'Record deleted: id=1, user_id=0, company_name=Tech Solutionsewfhhrohjr01, location=New Yorkesfhhrohjr01d, job_title=Software Engineerfsehhrohjr01, date_started=2020-06-06, date_ended=2023-06-07'),
(11, 'experience', 'DELETE', '2024-08-16 06:29:32', 'Record deleted: id=5, user_id=0, company_name=daw, location=dawd, job_title=daw, date_started=2024-07-26, date_ended=2024-07-30'),
(12, 'experience', 'DELETE', '2024-08-16 06:29:35', 'Record deleted: id=6, user_id=0, company_name=egye, location=gergrg, job_title=rggdg, date_started=2024-07-26, date_ended=2024-07-27'),
(13, 'education', 'DELETE', '2024-08-16 06:29:42', 'Record deleted: id=1, year_started=2015, year_ended=2019, school_name=computersd, location=awdwwaedsd, level=High School, grade_or_year=segrsdgsd, course_or_track=efsfsefsd'),
(14, 'skills', 'DELETE', '2024-08-16 06:29:53', 'Record deleted: id=3, skill_name=fsefsde, skill_level=Advanced, description=fsefsde'),
(15, 'experience', 'INSERT', '2024-08-16 08:32:03', 'New record added: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(16, 'experience', 'UPDATE', '2024-08-16 08:32:31', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(17, 'experience', 'UPDATE', '2024-08-16 08:34:51', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(18, 'experience', 'UPDATE', '2024-08-16 08:35:34', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(19, 'experience', 'UPDATE', '2024-08-16 08:42:43', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(20, 'experience', 'UPDATE', '2024-08-16 08:42:53', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(21, 'experience', 'UPDATE', '2024-08-16 08:49:58', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=Internship CCDI PRISAA Bicol, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(22, 'experience', 'UPDATE', '2024-08-16 08:52:36', 'Record updated. Old: id=8, user_id=0, company_name=Internship CCDI PRISAA Bicol, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(23, 'experience', 'UPDATE', '2024-08-16 08:53:19', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(24, 'experience', 'UPDATE', '2024-08-16 08:53:59', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(25, 'experience', 'INSERT', '2024-08-16 09:16:41', 'New record added: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31'),
(26, 'experience', 'UPDATE', '2024-08-16 09:18:13', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(27, 'experience', 'UPDATE', '2024-08-16 09:18:34', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(28, 'experience', 'UPDATE', '2024-08-16 09:18:48', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20'),
(29, 'experience', 'UPDATE', '2024-08-16 09:19:10', 'Record updated. Old: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31 New: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31'),
(30, 'education', 'INSERT', '2024-08-16 09:23:24', 'New record added: id=3, year_started=2006, year_ended=2012, school_name=Casiguran Central School , location=El. De Jesus St. Tulay Casiguran Sorsogon, level=Elementary, grade_or_year=, course_or_track='),
(31, 'education', 'INSERT', '2024-08-16 09:24:25', 'New record added: id=4, year_started=2006, year_ended=2012, school_name=Casiguran Central School , location=El. De Jesus St. Tulay Casiguran Sorsogon, level=Elementary, grade_or_year=, course_or_track='),
(32, 'education', 'DELETE', '2024-08-16 09:25:26', 'Record deleted: id=3, year_started=2006, year_ended=2012, school_name=Casiguran Central School , location=El. De Jesus St. Tulay Casiguran Sorsogon, level=Elementary, grade_or_year=, course_or_track='),
(33, 'education', 'INSERT', '2024-08-16 09:27:58', 'New record added: id=5, year_started=2012, year_ended=2016, school_name=Casiguran Technical Vocational School, location=Adovis Casiguran Sorsogon, level=High School, grade_or_year=, course_or_track='),
(34, 'education', 'INSERT', '2024-08-16 09:30:40', 'New record added: id=6, year_started=2016, year_ended=2017, school_name=Sorsogon College of Criminology, location=3928 Rizal St Piot Sorsogon City, level=Senior High School, grade_or_year=, course_or_track='),
(35, 'education', 'INSERT', '2024-08-16 09:33:28', 'New record added: id=7, year_started=2017, year_ended=2018, school_name=Sorsogon Our Lady of Salvation College Incorporated, location=Bologo Sorsogon City, level=Senior High School, grade_or_year=, course_or_track='),
(36, 'education', 'INSERT', '2024-08-16 09:34:59', 'New record added: id=8, year_started=2018, year_ended=2019, school_name=Bicol Merchant Marine College Incorporated, location=3928 Rizal St Piot Sorsogon City, level=College, grade_or_year=, course_or_track='),
(37, 'education', 'INSERT', '2024-08-16 09:39:03', 'New record added: id=9, year_started=2020, year_ended=2024, school_name=Computer Communication Development Institute, location=Bitan-o, Rizal St., Sorsogon, level=College, grade_or_year=, course_or_track='),
(38, 'skills', 'INSERT', '2024-08-16 09:40:12', 'New record added: id=4, skill_name=Php, skill_level=Beginner, description='),
(39, 'skills', 'INSERT', '2024-08-16 09:40:32', 'New record added: id=5, skill_name=HTML, skill_level=Beginner, description='),
(40, 'skills', 'INSERT', '2024-08-16 09:40:44', 'New record added: id=6, skill_name=Javascipt, skill_level=Beginner, description='),
(41, 'skills', 'INSERT', '2024-08-16 09:41:08', 'New record added: id=7, skill_name=CSS, skill_level=Beginner, description='),
(42, 'skills', 'INSERT', '2024-08-16 09:41:45', 'New record added: id=8, skill_name=Mysql, skill_level=Beginner, description='),
(43, 'skills', 'INSERT', '2024-08-16 09:41:59', 'New record added: id=9, skill_name=C#, skill_level=Beginner, description='),
(44, 'skills', 'INSERT', '2024-08-16 09:43:49', 'New record added: id=10, skill_name=Photoshop, skill_level=Beginner, description='),
(45, 'skills', 'INSERT', '2024-08-16 09:43:59', 'New record added: id=11, skill_name=Video Editing, skill_level=Beginner, description='),
(46, 'experience', 'UPDATE', '2024-08-16 10:00:15', 'Record updated. Old: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos, job_title=Web Developer, date_started=2024-01-20, date_ended=2024-04-20 New: id=8, user_id=0, company_name=CCDI, location=Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos. January 20 to April 20, 2024, job_title=Web Developer , date_started=2024-01-20, date_ended=2024-04-20'),
(47, 'experience', 'UPDATE', '2024-08-16 10:03:35', 'Record updated. Old: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31 New: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University May 1 to July 31, 2024, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31'),
(48, 'experience', 'UPDATE', '2024-08-16 10:03:52', 'Record updated. Old: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University May 1 to July 31, 2024, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31 New: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University May 1 to July 31, 2024, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31'),
(49, 'experience', 'UPDATE', '2024-08-16 10:03:57', 'Record updated. Old: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University May 1 to July 31, 2024, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31 New: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University                May 1 to July 31, 2024, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31'),
(50, 'experience', 'UPDATE', '2024-08-16 10:04:39', 'Record updated. Old: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University                May 1 to July 31, 2024, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31 New: id=9, user_id=0, company_name=Private School Athletic Association, location=Bicol University May 1 to July 31, 2024, job_title=Web Developer (Delegation Officials), date_started=2024-05-01, date_ended=2024-07-31'),
(51, 'seminars', 'INSERT', '2024-08-16 10:31:44', 'New record added: id=9, seminar_title=tyyr, conductor=, seminar_year=0, seminar_month=0, description=0'),
(52, 'seminars', 'INSERT', '2024-08-16 10:32:10', 'New record added: id=10, seminar_title=tyyr, conductor=, seminar_year=0, seminar_month=0, description=0'),
(53, 'seminars', 'DELETE', '2024-08-16 10:32:28', 'Record deleted: id=9, seminar_title=tyyr, conductor=, seminar_year=0, seminar_month=0, description=0'),
(54, 'seminars', 'INSERT', '2024-08-16 10:32:47', 'New record added: id=11, seminar_title=retgrg54, conductor=, seminar_year=0, seminar_month=0, description=6'),
(55, 'seminars', 'INSERT', '2024-08-16 10:33:29', 'New record added: id=12, seminar_title=escultura name, conductor=, seminar_year=0, seminar_month=0, description=0'),
(56, 'seminars', 'INSERT', '2024-08-16 10:35:05', 'New record added: id=13, seminar_title=retgrg54, conductor=marimar, seminar_year=2015, seminar_month=10, description=0'),
(57, 'seminars', 'INSERT', '2024-08-16 10:39:34', 'New record added: id=14, seminar_title=tyyrewr, conductor=marimar, seminar_year=2023, seminar_month=9, description=0'),
(58, 'seminars', 'DELETE', '2024-08-16 10:39:48', 'Record deleted: id=10, seminar_title=tyyr, conductor=, seminar_year=0, seminar_month=0, description=0'),
(59, 'seminars', 'DELETE', '2024-08-16 10:39:52', 'Record deleted: id=11, seminar_title=retgrg54, conductor=, seminar_year=0, seminar_month=0, description=6'),
(60, 'seminars', 'DELETE', '2024-08-16 10:39:55', 'Record deleted: id=12, seminar_title=escultura name, conductor=, seminar_year=0, seminar_month=0, description=0'),
(61, 'seminars', 'DELETE', '2024-08-16 10:39:59', 'Record deleted: id=13, seminar_title=retgrg54, conductor=marimar, seminar_year=2015, seminar_month=10, description=0'),
(62, 'seminars', 'DELETE', '2024-08-16 10:40:02', 'Record deleted: id=14, seminar_title=tyyrewr, conductor=marimar, seminar_year=2023, seminar_month=9, description=0'),
(63, 'seminars', 'INSERT', '2024-08-16 10:40:48', 'New record added: id=15, seminar_title=russel, conductor=bruno, seminar_year=2012, seminar_month=3, description=0'),
(64, 'seminars', 'INSERT', '2024-08-16 10:42:09', 'New record added: id=16, seminar_title=russel, conductor=bruno, seminar_year=2012, seminar_month=3, description=why is that the description is always zero '),
(65, 'seminars', 'INSERT', '2024-08-16 10:42:20', 'New record added: id=17, seminar_title=russel, conductor=bruno, seminar_year=2012, seminar_month=3, description=why is that the description is always zero '),
(66, 'seminars', 'DELETE', '2024-08-16 11:57:01', 'Record deleted: id=15, seminar_title=russel, conductor=bruno, seminar_year=2012, seminar_month=3, description=0'),
(67, 'seminars', 'DELETE', '2024-08-16 11:57:05', 'Record deleted: id=16, seminar_title=russel, conductor=bruno, seminar_year=2012, seminar_month=3, description=why is that the description is always zero '),
(68, 'seminars', 'UPDATE', '2024-08-16 12:03:45', 'Record updated. Old: id=17, seminar_title from \"russel\" to \"russel\", conductor from \"bruno\" to \"bruno\", seminar_year from \"2012\" to \"2012\", seminar_month from \"3\" to \"3\", description from \"why is that the description is always zero \" to \"why is that the description is always zero https://www.facebook.com/karen.hagupit\"'),
(69, 'seminars', 'INSERT', '2024-08-16 12:48:16', 'New record added: id=18, seminar_title=wefefwe, conductor=ewe, seminar_year=2018, seminar_month=5, description=eygerhgr'),
(70, 'seminars', 'INSERT', '2024-08-16 13:01:45', 'New record added: id=19, seminar_title=Event Management System, conductor=Russel, seminar_year=2024, seminar_month=4, description=The event management system is developed using C# in Visual Studio Code, featuring a procedural approach. The system includes essential functionalities such as user login, CRUD (Create, Read, Update, Delete) operations for managing events, and the capability to export data to Excel using ClosedXML. For database management, the system utilizes MySQL.Data to interact with the MySQL database, ensuring efficient data handling and storage.'),
(71, 'seminars', 'DELETE', '2024-08-16 13:08:02', 'Record deleted: id=17, seminar_title=russel, conductor=bruno, seminar_year=2012, seminar_month=3, description=why is that the description is always zero https://www.facebook.com/karen.hagupit'),
(72, 'seminars', 'DELETE', '2024-08-16 13:08:07', 'Record deleted: id=18, seminar_title=wefefwe, conductor=ewe, seminar_year=2018, seminar_month=5, description=eygerhgr'),
(73, 'seminars', 'UPDATE', '2024-08-16 13:08:16', 'Record updated. Old: id=19, seminar_title from \"Event Management System\" to \"Event Management System\", conductor from \"Russel\" to \"Russel\", seminar_year from \"2024\" to \"2024\", seminar_month from \"4\" to \"4\", description from \"The event management system is developed using C# in Visual Studio Code, featuring a procedural approach. The system includes essential functionalities such as user login, CRUD (Create, Read, Update, Delete) operations for managing events, and the capability to export data to Excel using ClosedXML. For database management, the system utilizes MySQL.Data to interact with the MySQL database, ensuring efficient data handling and storage.\" to \"The event management system is developed using C# in Visual Studio Code, featuring a procedural approach. The system includes essential functionalities such as user login, CRUD (Create, Read, Update, Delete) operations for managing events, and the capability to export data to Excel using ClosedXML. For database management, the system utilizes MySQL.Data to interact with the MySQL database, ensuring efficient data handling and storage.\"'),
(74, 'seminars', 'UPDATE', '2024-08-16 13:49:09', 'Record updated. Old: id=19, seminar_title from \"Event Management System\" to \"Event Management System\", conductor from \"Russel\" to \"Russel\", seminar_year from \"2024\" to \"2024\", seminar_month from \"4\" to \"4\", description from \"The event management system is developed using C# in Visual Studio Code, featuring a procedural approach. The system includes essential functionalities such as user login, CRUD (Create, Read, Update, Delete) operations for managing events, and the capability to export data to Excel using ClosedXML. For database management, the system utilizes MySQL.Data to interact with the MySQL database, ensuring efficient data handling and storage.\" to \"The event management system is developed using C# in Visual Studio 2022, featuring a procedural approach. The system includes essential functionalities such as user login, CRUD (Create, Read, Update, Delete) operations for managing events, and the capability to export data to Excel using ClosedXML. For database management, the system utilizes MySQL.Data to interact with the MySQL database, ensuring efficient data handling and storage.\"'),
(75, 'seminars', 'UPDATE', '2024-08-16 13:49:27', 'Record updated. Old: id=19, seminar_title from \"Event Management System\" to \"Event Management System\", conductor from \"Russel\" to \"Russel\", seminar_year from \"2024\" to \"2024\", seminar_month from \"4\" to \"4\", description from \"The event management system is developed using C# in Visual Studio 2022, featuring a procedural approach. The system includes essential functionalities such as user login, CRUD (Create, Read, Update, Delete) operations for managing events, and the capability to export data to Excel using ClosedXML. For database management, the system utilizes MySQL.Data to interact with the MySQL database, ensuring efficient data handling and storage.\" to \"The event management system is developed using C# in Visual Studio 2022, featuring a procedural approach. The system includes essential functionalities such as user login, CRUD (Create, Read, Update, Delete) operations for managing events, and the capability to export data to Excel using ClosedXML. For database management, the system utilizes MySQL.Data to interact with the MySQL database, ensuring efficient data handling and storage.\"'),
(76, 'seminars', 'INSERT', '2024-08-16 14:00:04', 'New record added: id=20, seminar_title=Project Management System, conductor=Russel, seminar_year=2022, seminar_month=7, description=This system, developed using Visual Studio Code with HTML, CSS, JavaScript, PHP, and MySQL (via XAMPP), offers a comprehensive project management solution. It includes secure login functionality and full CRUD (Create, Read, Update, Delete) operations.\r\n\r\nThe system also features SweetAlert modals for validation and user interaction, as well as advanced search and filter options for efficient data management. The design ensures a straightforward and effective user experience.'),
(77, 'seminars', 'UPDATE', '2024-08-16 14:00:32', 'Record updated. Old: id=20, seminar_title from \"Project Management System\" to \"Project Management System\", conductor from \"Russel\" to \"Russel\", seminar_year from \"2022\" to \"2022\", seminar_month from \"7\" to \"7\", description from \"This system, developed using Visual Studio Code with HTML, CSS, JavaScript, PHP, and MySQL (via XAMPP), offers a comprehensive project management solution. It includes secure login functionality and full CRUD (Create, Read, Update, Delete) operations.\r\n\r\nThe system also features SweetAlert modals for validation and user interaction, as well as advanced search and filter options for efficient data management. The design ensures a straightforward and effective user experience.\" to \"This system, developed using Visual Studio Code with HTML, CSS, JavaScript, PHP, and MySQL (via XAMPP), offers a comprehensive project management solution. It includes secure login functionality and full CRUD (Create, Read, Update, Delete) operations.\r\n\r\nThe system also features SweetAlert modals for validation and user interaction, as well as advanced search and filter options for efficient data management. The design ensures a straightforward and effective user experience.\"'),
(78, 'seminars', 'UPDATE', '2024-08-16 14:07:39', 'Record updated. Old: id=20, seminar_title from \"Project Management System\" to \"Project Management System\", conductor from \"Russel\" to \"Russel\", seminar_year from \"2022\" to \"2022\", seminar_month from \"7\" to \"7\", description from \"This system, developed using Visual Studio Code with HTML, CSS, JavaScript, PHP, and MySQL (via XAMPP), offers a comprehensive project management solution. It includes secure login functionality and full CRUD (Create, Read, Update, Delete) operations.\r\n\r\nThe system also features SweetAlert modals for validation and user interaction, as well as advanced search and filter options for efficient data management. The design ensures a straightforward and effective user experience.\" to \"This system, developed using Visual Studio Code with HTML, CSS, JavaScript, PHP, and MySQL (via XAMPP), offers a comprehensive project management solution. It includes secure login functionality and full CRUD (Create, Read, Update, Delete) operations.\r\n\r\nThe system also features SweetAlert modals for validation and user interaction, as well as advanced search and filter options for efficient data management. The design ensures a straightforward and effective user experience.\"'),
(79, 'seminars', 'INSERT', '2024-08-16 14:28:18', 'New record added: id=21, seminar_title=PRISAA Sports Foundation Website, conductor=Russel, seminar_year=2024, seminar_month=1, description=The PRISAA Sports Foundation\'s national website, accessible at prisaasportsfoundation.org, is built using WordPress as its content management system (CMS). The site’s design is primarily based on HTML and CSS, with a focus on custom widgets and CSS without relying on pre-made templates. The design utilizes the default WordPress theme and the Gutenberg block editor, avoiding page builders like Elementor.\r\n\r\nAdditional functionality is implemented through PHP and various plugins to enhance the site\'s dynamic features and user-friendliness. This approach ensures a tailored and efficient web presence.'),
(80, 'seminars', 'UPDATE', '2024-08-16 14:28:50', 'Record updated. Old: id=21, seminar_title from \"PRISAA Sports Foundation Website\" to \"PRISAA Sports Foundation Website\", conductor from \"Russel\" to \"Russel\", seminar_year from \"2024\" to \"2024\", seminar_month from \"1\" to \"1\", description from \"The PRISAA Sports Foundation\'s national website, accessible at prisaasportsfoundation.org, is built using WordPress as its content management system (CMS). The site’s design is primarily based on HTML and CSS, with a focus on custom widgets and CSS without relying on pre-made templates. The design utilizes the default WordPress theme and the Gutenberg block editor, avoiding page builders like Elementor.\r\n\r\nAdditional functionality is implemented through PHP and various plugins to enhance the site\'s dynamic features and user-friendliness. This approach ensures a tailored and efficient web presence.\" to \"The PRISAA Sports Foundation\'s national website, accessible at prisaasportsfoundation.org, is built using WordPress as its content management system (CMS). The site’s design is primarily based on HTML and CSS, with a focus on custom widgets and CSS without relying on pre-made templates. The design utilizes the default WordPress theme and the Gutenberg block editor, avoiding page builders like Elementor.\r\n\r\nAdditional functionality is implemented through PHP and various plugins to enhance the site\'s dynamic features and user-friendliness. This approach ensures a tailored and efficient web presence.\"'),
(81, 'seminars', 'INSERT', '2024-08-16 14:33:06', 'New record added: id=22, seminar_title=PRISAA Sports Foundation Website, conductor=Russel, seminar_year=2024, seminar_month=1, description=The PRISAA Sports Foundation\'s national website, accessible at prisaasportsfoundation.org, is built using WordPress as its content management system (CMS). The site’s design is primarily based on HTML and CSS, with a focus on custom widgets and CSS without relying on pre-made templates. The design utilizes the default WordPress theme and the Gutenberg block editor, avoiding page builders like Elementor.\r\n\r\nAdditional functionality is implemented through PHP and various plugins to enhance the site\'s dynamic features and user-friendliness. This approach ensures a tailored and efficient web presence.'),
(82, 'seminars', 'DELETE', '2024-08-16 14:33:33', 'Record deleted: id=22, seminar_title=PRISAA Sports Foundation Website, conductor=Russel, seminar_year=2024, seminar_month=1, description=The PRISAA Sports Foundation\'s national website, accessible at prisaasportsfoundation.org, is built using WordPress as its content management system (CMS). The site’s design is primarily based on HTML and CSS, with a focus on custom widgets and CSS without relying on pre-made templates. The design utilizes the default WordPress theme and the Gutenberg block editor, avoiding page builders like Elementor.\r\n\r\nAdditional functionality is implemented through PHP and various plugins to enhance the site\'s dynamic features and user-friendliness. This approach ensures a tailored and efficient web presence.'),
(83, 'seminars', 'INSERT', '2024-08-16 14:52:01', 'New record added: id=23, seminar_title=My Personal Website Portfolio, conductor=Russel, seminar_year=2024, seminar_month=5, description=My personal website portfolio is a comprehensive showcase of my skills and projects. It includes several essential pages: the Home page serves as the main introduction, while the Resume page outlines my skills, experience, and education. The Projects page highlights various projects I\'ve created, each with accompanying GitHub links for further exploration. The Contact page provides a way for visitors to get in touch, and the Login page redirects users to a dashboard where they can upload and customize site details.\r\n\r\nThe website is developed using a combination of HTML, Bootstrap, CSS, PHP, XAMPP, MySQL, and JavaScript. The use of these technologies ensures a dynamic, interactive experience and allows for seamless customization and management of content. The integration of PHP and MySQL supports advanced functionalities, while Bootstrap and custom CSS contribute to a modern and responsive design.'),
(84, 'seminars', 'UPDATE', '2024-08-16 14:52:21', 'Record updated. Old: id=23, seminar_title from \"My Personal Website Portfolio\" to \"My Personal Website Portfolio\", conductor from \"Russel\" to \"Russel\", seminar_year from \"2024\" to \"2024\", seminar_month from \"5\" to \"5\", description from \"My personal website portfolio is a comprehensive showcase of my skills and projects. It includes several essential pages: the Home page serves as the main introduction, while the Resume page outlines my skills, experience, and education. The Projects page highlights various projects I\'ve created, each with accompanying GitHub links for further exploration. The Contact page provides a way for visitors to get in touch, and the Login page redirects users to a dashboard where they can upload and customize site details.\r\n\r\nThe website is developed using a combination of HTML, Bootstrap, CSS, PHP, XAMPP, MySQL, and JavaScript. The use of these technologies ensures a dynamic, interactive experience and allows for seamless customization and management of content. The integration of PHP and MySQL supports advanced functionalities, while Bootstrap and custom CSS contribute to a modern and responsive design.\" to \"My personal website portfolio is a comprehensive showcase of my skills and projects. It includes several essential pages: the Home page serves as the main introduction, while the Resume page outlines my skills, experience, and education. The Projects page highlights various projects I\'ve created, each with accompanying GitHub links for further exploration. The Contact page provides a way for visitors to get in touch, and the Login page redirects users to a dashboard where they can upload and customize site details.\r\n\r\nThe website is developed using a combination of HTML, Bootstrap, CSS, PHP, XAMPP, MySQL, and JavaScript. The use of these technologies ensures a dynamic, interactive experience and allows for seamless customization and management of content. The integration of PHP and MySQL supports advanced functionalities, while Bootstrap and custom CSS contribute to a modern and responsive design.\"');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `email_address`, `phone_number`, `message`) VALUES
(11, 'Jessica Martinez', 'jmartinez@techcorp.com', '(555) 234-5678', 'We were impressed by your resume and would like to schedule an interview for the Senior Developer position. Are you available next week?'),
(12, 'Russel', 'kenruss@gmail.com', '90787867', 'sdfdfdsvxd');

--
-- Triggers `contact`
--
DELIMITER $$
CREATE TRIGGER `after_contact_delete` AFTER DELETE ON `contact` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('contact', 'DELETE', CONCAT('Record deleted: id=', OLD.id, ', name=', OLD.full_name, ', email=', OLD.email_address, ', phone=', OLD.phone_number));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_contact_insert` AFTER INSERT ON `contact` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('contact', 'INSERT', CONCAT('New record added: id=', NEW.id, ', name=', NEW.full_name, ', email=', NEW.email_address, ', phone=', NEW.phone_number));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_contact_update` AFTER UPDATE ON `contact` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('contact', 'UPDATE', CONCAT('Record updated. Old: id=', OLD.id, ', name=', OLD.full_name, ', email=', OLD.email_address, ', phone=', OLD.phone_number, ' New: id=', NEW.id, ', name=', NEW.full_name, ', email=', NEW.email_address, ', phone=', NEW.phone_number));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `year_started` int(11) NOT NULL,
  `year_ended` int(11) DEFAULT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_location` varchar(255) NOT NULL,
  `school_level` enum('Elementary','High School','Senior High School','College') NOT NULL,
  `grade_or_year` varchar(50) DEFAULT NULL,
  `course_or_track` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `year_started`, `year_ended`, `school_name`, `school_location`, `school_level`, `grade_or_year`, `course_or_track`, `description`) VALUES
(4, 2006, 2012, 'Casiguran Central School ', 'El. De Jesus St. Tulay Casiguran Sorsogon', 'Elementary', '', '', 'From Kinder to Grade 6.'),
(5, 2012, 2016, 'Casiguran Technical Vocational School', 'Adovis Casiguran Sorsogon', 'High School', '', '', 'From Grade 7 to Grade 10'),
(6, 2016, 2017, 'Sorsogon College of Criminology', '3928 Rizal St Piot Sorsogon City', 'Senior High School', '', '', 'Grade 11'),
(7, 2017, 2018, 'Sorsogon Our Lady of Salvation College Incorporated', 'Bologo Sorsogon City', 'Senior High School', '', '', 'Grade 12'),
(8, 2018, 2019, 'Bicol Merchant Marine College Incorporated', '3928 Rizal St Piot Sorsogon City', 'College', '', '', 'First Year College'),
(9, 2020, 2024, 'Computer Communication Development Institute', 'Bitan-o, Rizal St., Sorsogon', 'College', '', '', 'From First year to Fourth year College');

--
-- Triggers `education`
--
DELIMITER $$
CREATE TRIGGER `after_education_delete` AFTER DELETE ON `education` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('education', 'DELETE', CONCAT('Record deleted: id=', OLD.id, ', year_started=', OLD.year_started, ', year_ended=', OLD.year_ended, ', school_name=', OLD.school_name, ', location=', OLD.school_location, ', level=', OLD.school_level, ', grade_or_year=', OLD.grade_or_year, ', course_or_track=', OLD.course_or_track));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_education_insert` AFTER INSERT ON `education` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('education', 'INSERT', CONCAT('New record added: id=', NEW.id, ', year_started=', NEW.year_started, ', year_ended=', NEW.year_ended, ', school_name=', NEW.school_name, ', location=', NEW.school_location, ', level=', NEW.school_level, ', grade_or_year=', NEW.grade_or_year, ', course_or_track=', NEW.course_or_track));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_education_update` AFTER UPDATE ON `education` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('education', 'UPDATE', CONCAT('Record updated. Old: id=', OLD.id, ', year_started=', OLD.year_started, ', year_ended=', OLD.year_ended, ', school_name=', OLD.school_name, ', location=', OLD.school_location, ', level=', OLD.school_level, ', grade_or_year=', OLD.grade_or_year, ', course_or_track=', OLD.course_or_track, ' New: id=', NEW.id, ', year_started=', NEW.year_started, ', year_ended=', NEW.year_ended, ', school_name=', NEW.school_name, ', location=', NEW.school_location, ', level=', NEW.school_level, ', grade_or_year=', NEW.grade_or_year, ', course_or_track=', NEW.course_or_track));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `date_started` date NOT NULL,
  `date_ended` date DEFAULT NULL,
  `job_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `user_id`, `company_name`, `company_location`, `job_title`, `date_started`, `date_ended`, `job_description`) VALUES
(8, 0, 'CCDI', 'Bitan-o, Rizal St., Sorsogon; CCDI ANNEX , Executive Village, Tugos. January 20 to April 20, 2024', 'Web Developer ', '2024-01-20', '2024-04-20', 'During my internship with PRISAA Region 5, I was involved in both the development and ongoing maintenance of the PRISAA national website. I regularly updated the site with news from regional and provincial levels, created user accounts for regional officers, and handled the uploading of files from the national office. I also tackled and fixed various bugs and errors on the site.\r\n\r\nI used tools like Photoshop, Illustrator, and WordPress for designing and adding features, such as commenting systems and live streaming. Instead of using Elementor, I chose a more user-friendly approach by integrating widgets. I built the site from scratch using HTML, CSS and Javascript, making sure it was responsive and matched the clients needs.\r\n\r\nAdditionally, I assisted with regional events from April 12 to 14 and provincial events from March 14 to 17. My tasks included supporting athletes, preparing food packs, and designing materials like posters and invitations.\r\n'),
(9, 0, 'Private School Athletic Association', 'Bicol University May 1 to July 31, 2024', 'Web Developer (Delegation Officials)', '2024-05-01', '2024-07-31', 'At the national competition in Legazpi, I was responsible for implementing and maintaining the PRISAA national website. My role involved providing real-time updates on national news, integrating a polling system for the \"Mutya ng PRISAA\" event, and compiling and posting results on the website.\r\n\r\nI collaborated with national officers, managed the compilation and uploading of files from PRISAA National, including gallery content, and resolved bugs and errors to ensure the site’s smooth operation.');

--
-- Triggers `experience`
--
DELIMITER $$
CREATE TRIGGER `after_experience_delete` AFTER DELETE ON `experience` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('experience', 'DELETE', CONCAT('Record deleted: id=', OLD.id, ', user_id=', OLD.user_id, ', company_name=', OLD.company_name, ', location=', OLD.company_location, ', job_title=', OLD.job_title, ', date_started=', OLD.date_started, ', date_ended=', OLD.date_ended));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_experience_insert` AFTER INSERT ON `experience` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('experience', 'INSERT', CONCAT('New record added: id=', NEW.id, ', user_id=', NEW.user_id, ', company_name=', NEW.company_name, ', location=', NEW.company_location, ', job_title=', NEW.job_title, ', date_started=', NEW.date_started, ', date_ended=', NEW.date_ended));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_experience_update` AFTER UPDATE ON `experience` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('experience', 'UPDATE', CONCAT('Record updated. Old: id=', OLD.id, ', user_id=', OLD.user_id, ', company_name=', OLD.company_name, ', location=', OLD.company_location, ', job_title=', OLD.job_title, ', date_started=', OLD.date_started, ', date_ended=', OLD.date_ended, ' New: id=', NEW.id, ', user_id=', NEW.user_id, ', company_name=', NEW.company_name, ', location=', NEW.company_location, ', job_title=', NEW.job_title, ', date_started=', NEW.date_started, ', date_ended=', NEW.date_ended));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `id` int(11) NOT NULL,
  `seminar_name` varchar(255) NOT NULL,
  `conductor` varchar(100) NOT NULL,
  `seminar_year` int(11) NOT NULL,
  `seminar_month` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `github_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminars`
--

INSERT INTO `seminars` (`id`, `seminar_name`, `conductor`, `seminar_year`, `seminar_month`, `description`, `picture_path`, `github_link`) VALUES
(19, 'Event Management System', 'Russel', 2024, 4, 'The event management system is developed using C# in Visual Studio 2022, featuring a procedural approach. The system includes essential functionalities such as user login, CRUD (Create, Read, Update, Delete) operations for managing events, and the capability to export data to Excel using ClosedXML. For database management, the system utilizes MySQL.Data to interact with the MySQL database, ensuring efficient data handling and storage.', 'uploads/1723816167_event.jpg', 'https://github.com/russelescultura/Event-Mangemanet-Sytem'),
(20, 'Project Management System', 'Russel', 2022, 7, 'This system, developed using Visual Studio Code with HTML, CSS, JavaScript, PHP, and MySQL (via XAMPP), offers a comprehensive project management solution. It includes secure login functionality and full CRUD (Create, Read, Update, Delete) operations.\r\n\r\nThe system also features SweetAlert modals for validation and user interaction, as well as advanced search and filter options for efficient data management. The design ensures a straightforward and effective user experience.', 'uploads/1723817259_event1.jpg', 'https://github.com/russelescultura/Project-Management-System'),
(21, 'PRISAA Sports Foundation Website', 'Russel', 2024, 1, 'The PRISAA Sports Foundation\'s national website, accessible at prisaasportsfoundation.org, is built using WordPress as its content management system (CMS). The site’s design is primarily based on HTML and CSS, with a focus on custom widgets and CSS without relying on pre-made templates. The design utilizes the default WordPress theme and the Gutenberg block editor, avoiding page builders like Elementor.\r\n\r\nAdditional functionality is implemented through PHP and various plugins to enhance the site\'s dynamic features and user-friendliness. This approach ensures a tailored and efficient web presence.', 'uploads/1723818530_event2.jpg', 'https://www.prisaasportsfoundation.org/'),
(23, 'My Personal Website Portfolio', 'Russel', 2024, 5, 'My personal website portfolio is a comprehensive showcase of my skills and projects. It includes several essential pages: the Home page serves as the main introduction, while the Resume page outlines my skills, experience, and education. The Projects page highlights various projects I\'ve created, each with accompanying GitHub links for further exploration. The Contact page provides a way for visitors to get in touch, and the Login page redirects users to a dashboard where they can upload and customize site details.\r\n\r\nThe website is developed using a combination of HTML, Bootstrap, CSS, PHP, XAMPP, MySQL, and JavaScript. The use of these technologies ensures a dynamic, interactive experience and allows for seamless customization and management of content. The integration of PHP and MySQL supports advanced functionalities, while Bootstrap and custom CSS contribute to a modern and responsive design.', 'uploads/1723819941_event.jpg', 'https://github.com/russelescultura/My-Personal-Portfolio');

--
-- Triggers `seminars`
--
DELIMITER $$
CREATE TRIGGER `after_seminars_delete` AFTER DELETE ON `seminars` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES (
        'seminars',
        'DELETE',
        CONCAT(
            'Record deleted: id=', OLD.id, 
            ', seminar_title=', OLD.seminar_name, 
            ', conductor=', OLD.conductor, 
            ', seminar_year=', OLD.seminar_year, 
            ', seminar_month=', OLD.seminar_month, 
            ', description=', OLD.description
        )
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_seminars_insert` AFTER INSERT ON `seminars` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES (
        'seminars',
        'INSERT',
        CONCAT(
            'New record added: id=', NEW.id, 
            ', seminar_title=', NEW.seminar_name, 
            ', conductor=', NEW.conductor, 
            ', seminar_year=', NEW.seminar_year, 
            ', seminar_month=', NEW.seminar_month, 
            ', description=', NEW.description
        )
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_seminars_update` AFTER UPDATE ON `seminars` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES (
        'seminars',
        'UPDATE',
        CONCAT(
            'Record updated. Old: id=', OLD.id, 
            ', seminar_title from "', OLD.seminar_name, '" to "', NEW.seminar_name, '"',
            ', conductor from "', OLD.conductor, '" to "', NEW.conductor, '"',
            ', seminar_year from "', OLD.seminar_year, '" to "', NEW.seminar_year, '"',
            ', seminar_month from "', OLD.seminar_month, '" to "', NEW.seminar_month, '"',
            ', description from "', OLD.description, '" to "', NEW.description, '"'
        )
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `skill_level` enum('Beginner','Intermediate','Advanced','Expert') NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `skill_level`, `description`) VALUES
(4, 'Php', 'Beginner', ''),
(5, 'HTML', 'Beginner', ''),
(6, 'Javascipt', 'Beginner', ''),
(7, 'CSS', 'Beginner', ''),
(8, 'Mysql', 'Beginner', ''),
(9, 'C#', 'Beginner', ''),
(10, 'Photoshop', 'Beginner', ''),
(11, 'Video Editing', 'Beginner', '');

--
-- Triggers `skills`
--
DELIMITER $$
CREATE TRIGGER `after_skills_delete` AFTER DELETE ON `skills` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('skills', 'DELETE', CONCAT('Record deleted: id=', OLD.id, ', skill_name=', OLD.skill_name, ', skill_level=', OLD.skill_level, ', description=', OLD.description));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_skills_insert` AFTER INSERT ON `skills` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('skills', 'INSERT', CONCAT('New record added: id=', NEW.id, ', skill_name=', NEW.skill_name, ', skill_level=', NEW.skill_level, ', description=', NEW.description));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_skills_update` AFTER UPDATE ON `skills` FOR EACH ROW BEGIN
    INSERT INTO audit_trail (table_name, operation_type, change_details)
    VALUES ('skills', 'UPDATE', CONCAT('Record updated. Old: id=', OLD.id, ', skill_name=', OLD.skill_name, ', skill_level=', OLD.skill_level, ', description=', OLD.description, ' New: id=', NEW.id, ', skill_name=', NEW.skill_name, ', skill_level=', NEW.skill_level, ', description=', NEW.description));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'karenhagupit', '$2y$10$.iB1748jYVpe7zNAH8LMQ.kY04WgyL07ieOa5EzZXh7z3MkYDzFBK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
