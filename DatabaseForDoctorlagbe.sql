-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 11:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorlagbe`
--
CREATE DATABASE IF NOT EXISTS `doctorlagbe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `doctorlagbe`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` int(3) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `fname`, `lname`, `contact`, `gender`, `address`, `age`, `bloodgroup`) VALUES
(23, 'Md. Shafaet', 'Hoosain', '01521105269', 'Male', '102/3 BARONTEK FORID VILLA', 24, 'O+'),
(29, 'Md.', 'Saifullah', '01949451121', 'Male', '250, Kawlar dakhil Madrasa road, dakkshinkhan, DHaka-1229', 24, 'B-');

-- --------------------------------------------------------

--
-- Table structure for table `alluser`
--

CREATE TABLE `alluser` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alluser`
--

INSERT INTO `alluser` (`id`, `email`, `password`, `type`) VALUES
(18, '2018100000028@seu.edu.bd', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(19, 'a@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(20, '2018100000030@seu.edu.bd', '01cfcd4f6b8770febfb40cb906715822', 'user'),
(23, '2018100000042@seu.edu.bd', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(24, 'waliul@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor'),
(25, 'safiuddin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(26, 'ishrat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(27, 'saif@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(29, 'saif921921@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'admin'),
(30, 'as@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(32, 'poka77777@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(33, 'dilruba@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(34, 'salam@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(35, 'mojahid@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(36, 'sh.islamkhan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(37, 'mukabirchowdhury@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(38, 'lubnakhondker@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(39, 'sayedur@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(40, 'tasruba@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(41, 'sfaruk@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(42, 'tachowdhury@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(43, 'rarabegum@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(44, 'kohinoor@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(45, 'hafizur@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(46, 'indrajit@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(47, 'swapnil@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(48, 'mahmud@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(49, 'selim@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(50, 'nizam@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(51, 'awara@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor'),
(52, 'mullik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appid` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pname` varchar(25) DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  `pgender` varchar(10) DEFAULT NULL,
  `pbg` varchar(12) DEFAULT NULL,
  `status` varchar(16) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appid`, `docid`, `uid`, `pname`, `page`, `pgender`, `pbg`, `status`, `date`) VALUES
(3, 24, 18, 'Shafaet', 24, 'Male', 'O+', 'To be Served', '2022-02-03'),
(4, 27, 30, 'Shafaet', 24, 'Male', 'O+', 'Served', '2022-02-07'),
(5, 25, 30, 'Shafaet', 23, 'Male', 'O+', 'Served', '2022-02-02'),
(6, 27, 30, 'Shafaet', 25, 'Male', 'O+', 'Served', '2022-02-12'),
(7, 27, 20, 'Md. Shafaet Hossain', 30, 'Male', 'O+', 'Served', '2022-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `docid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `dfname` varchar(50) NOT NULL,
  `dlname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dbloodgroup` varchar(10) NOT NULL,
  `dage` int(3) NOT NULL,
  `qualification` varchar(70) DEFAULT NULL,
  `designation` varchar(70) DEFAULT NULL,
  `expertise` varchar(25) DEFAULT NULL,
  `organization` varchar(70) DEFAULT NULL,
  `chamber` varchar(200) DEFAULT NULL,
  `schedule` varchar(50) DEFAULT NULL,
  `daddress` varchar(200) NOT NULL,
  `dcontact` varchar(15) DEFAULT NULL,
  `dgender` varchar(10) NOT NULL,
  `fees` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `title`, `dfname`, `dlname`, `email`, `dbloodgroup`, `dage`, `qualification`, `designation`, `expertise`, `organization`, `chamber`, `schedule`, `daddress`, `dcontact`, `dgender`, `fees`) VALUES
(24, 'Prof.', 'A.H.M.', 'Waliul Islam', 'waliul@gmail.com', 'A+', 40, 'MBBS, PhD', 'Dr.', 'cardiologists', 'Apollo Hospitals Dhaka', 'Lab-in diagnostic', '05:00PM - 08:00PM', 'Ploat#81, Block#E, Basundhara R/A, Dhaka - 1229', '01841276556', 'Male', 1500),
(25, 'Prof.', 'Mohammad', 'Safiuddin', 'safiuddin@gmail.com', 'A+', 42, 'MBBS, MD', 'Dr.', 'cardiologists', 'Popular Diagnostic Centre Ltd', 'Lab-in diagnostic', '05:00PM-09:00PM', 'House#16, Road#2, Dhanmondi R/A, Dhaka-1205', '01534321123', 'Male', 1200),
(26, 'Prof.', 'Syeda Ishrat', 'Jahan', 'ishrat@gmail.com', 'B+', 39, 'MBBS,DDV', 'Dr.', 'allergists', 'Square Hospital', 'Arafah diagnostic', '12:00PM-05:00PM', 'West Panthapath', '01444555666', 'Female', 1000),
(27, 'Dr.', 'Sharmin', 'Rimi', 'saif@gmail.com', 'B+', 45, 'MBBS, FCPS, MD(Neurology)', 'Professor and Director', 'neurologists', 'National Institute of Neuroscience', 'S.P.R.C and General Hospital', '4pm-8pm, Saturday-Wednesday', '41st street, California', '01721117385', 'Female', 1200),
(32, 'Dr', 'Md.', 'Shafaet Hossain', 'poka77777@gmail.com', 'O+', 57, 'MBBS, FCPS(Medicine), MD(Neurology)', 'Professor and Head of Department of Neuromedicine', 'neurologists', 'Holyfamily Redcresent Medical College Hospital', 'Ibn Sina Diagonostic Center and Imaging center', '4pm-8pm, Saturday-Wednesday', 'Chittagong Urea Fertilizer Housing Colony, Rangadia, Anwara, Chittagong', '01521105269', 'Male', 1200),
(33, 'Dr. ', 'Dilruba', 'Aktar', 'dilruba@gmail.com', 'A+', 45, 'MBBS, MCPS, FCPS', 'Skin, Allergy, Sexual Health Specialist & Cosmetic Dermato-Surgeon', 'allergists', 'Mainamoti Medical College & Hospital', 'Arvia Skin Care Center, Comilla', '4pm to 8pm ', '3rd Floor, Opposite Brac Bank, Jhawtola, Cumilla - 3500', '+8801612147039', 'Female', 1500),
(34, 'Dr.', ' Md. Abdus ', 'Salam', 'salam@gmail.com', 'B+', 63, 'MBBS, D-CARD (BSMMU), CCD (BIRDEM)', 'Cardiology & Diabetes Specialist', 'cardiologists', 'Bangabandhu Sheikh Mujib Medical University Hospital', 'Medinova Medical Services, Narayanganj', '4pm to 8pm', '145, Bangabandhu Road, Chashara, Narayanganj – 1400', '+8801913119989', 'Male', 1800),
(35, 'Dr. ', 'M. M. ', 'Mojahid', 'mojahid@gmail.com', 'A+', 55, 'MBBS, BCS (Health), MD (Cardiology)', 'Cardiology Specialist', 'allergists', 'Bangabandhu Sheikh Mujib Medical University Hospital', 'Medinova Medical Services, Narayanganj', '4pm to 9pm', ' 145, Bangabandhu Road, Chashara, Narayanganj – 1400', '+8801913119989', 'Male', 1200),
(36, 'Prof. Col. Dr. Md.', 'Shirajul', 'Islam Khan', 'sh.islamkhan@gmail.com', 'B+', 55, 'MBBS, DDV, MCPS, FCPS, Grading Course in Dermatology (AFMI)', 'Professor and Head of the Department', 'dermatologists', 'Combined Military Hospital (CMH)', 'LabAid Specialized Hospital Ltd, (Diagnostic), Pallabi, Dhaka', '08pm to 09pm', 'House – 21, Road No – 3, Section – 7, Pallabi, Mirpur, Dhaka', '01915448491', 'Male', 1200),
(37, 'Pro. Dr.', 'M U Kabir', 'Chowdhury', 'mukabirchowdhury@gmail.com', 'O+', 58, 'MBBS, DDV (Vienna), FRCP (UK)', 'Professor & Principal', 'dermatologists', ' MH Samorita Hospital & Medical College', 'Kabir National Skin Center', '08pm to 09pm', '57/E, 3rd floor, Brank Bank Limited, Gulshan-2, Dhaka-1205', '01712184335', 'Male', 1000),
(38, 'Pro. Dr.', 'Lubna ', 'Khondker', 'lubnakhondker@gmail.com', 'B+', 53, ' MBBS, MPH, DDV (BSMMU), MCPS, FCPS (Dermatology and Venereology)', 'Associate Professor', 'dermatologists', ' Bangabandhu Sheikh Mujib Medical University (BSMMU)', 'LabAid Ltd (Diagnostic), Mirpur', '07 pm to 09 pm', 'House No – 9, Section – 1, Block – B, Mirpur – 1, Dhaka', '01766662888', 'Female', 1300),
(39, 'Prof. Brig. Gen. Dr. ', 'Sayedur', 'Rahman', 'sayedur@gmail.com', 'AB+', 48, 'MBBS, DO, FCPS, MCPS, FICO (UK)', 'Professor', 'ophthalmologists', 'Evercare Hospital, Dhaka', 'Evercare Hospital, Dhaka', '9am to 5pm', 'Plot # 81, Block # E, Bashundhara R/A, Dhaka', '01962133334', 'Male', 1000),
(40, 'Dr. ', 'Tasruba ', 'Shahnaz', 'tasruba@gmail.com', 'B+', 40, 'MBBS, MS (EYE)', 'Doctor', 'ophthalmologists', 'Bashundhara Eye Hospital & Research Institute', 'Bashundhara Eye Hospital & Research Institute', '9am to 3pm ', ' 474, Road # 5, Block # D, Beside Mededi Mart, Bashundhara R/A, Dhaka', '+8809643200700', 'Female', 800),
(41, 'Prof. Dr.', 'S. Islam', 'Faruk', 'sfaruk@gmail.com', 'B-', 50, 'MBBS, D.O, F.C.P.S, F.I.C.S', 'Associate Professor', 'ophthalmologists', 'Holy Family Red Crescent Medical College', 'Green Optics', ' 5.30 PM – 8.00 PM ', 'Green Super Market, Room # 17 (1st floor) Green Road, Dhaka – 1205.', '01711-566789', 'Male', 800),
(42, 'Prof. Dr.', 'T A ', 'Chowdhury', 'tachowdhury@gmail.com', 'AB-', 49, 'MBBS, FRCS, FRCOG, FRCP, FCPS (Ban), FCPS (Pak)', 'Professor and Senior Consultant, Department of Obstetrics and Gynecolo', 'gynecologists', 'BIRDEM', 'Farida Clinic', '07 pm to 09 pm', 'Farida Clinic, 165/A, Shantinagar, Dhaka, Bangladesh', '+88028321960', 'Female', 1000),
(43, 'Prof. Dr.', 'Rowshan Ara', 'Begum', 'rarabegum@gmail.com', 'AB-', 50, ' MBBS, FCPS', 'Professor of Gynaecology & Obstetrics', 'gynecologists', 'Holy Family Red Crescent Medical College & Hospital', 'Snehaloy (Dr Rowshon Ara’s Clinic)', 'pm-7pm', ' 41/2 Shiddeshwari Kalimondir Road, Dhaka 1217', '01717 059310', 'Female', 900),
(44, 'Pro. Dr.', ' Kohinoor', 'Begum', 'kohinoor@gmail.com', 'O+', 50, 'MBBS, FCPS (Gynae & Obs)', 'Professor and Head of Gynaecology & Obstetrics', 'gynecologists', 'Institute of Child and Mother Health (ICMH)', 'Nirupam Hospital', '07 pm to 09 pm', ' H-69, Rd-11/A, Dhanmondi, Dhaka, Bangladesh', '01713044017', 'Female', 1000),
(45, 'Prof. Dr. Md.', 'Hafizur', 'Rahman', 'hafizur@gmail.com', 'O-', 53, 'MBBS (DMC), DEM (BIRDEM), MD (Endocrinology), MACE (USA)', 'Professor in the Department of Endocrinology', 'endocrinologists', 'Dhaka Medical College & Hospital', 'Popular Diagnostic Center, Uttara', '6pm to 9pm', ' House # 25, Road # 7, Sector # 4, Uttara, Dhaka (Unit 02)', '+8809613787805', 'Male', 1000),
(46, 'Prof. Dr.', ' Indrajit ', 'Prasad', 'indrajit@gmail.com', 'B-', 56, 'MBBS (DMC), FCPS (Medicine) MD (Endocrinology), FACE (USA)', 'Professor', 'endocrinologists', 'Dhaka Medical College & Hospital', 'Labaid Specialized Hospital, Dhanmondi', '5pm to 10pm ', 'House # 06, Road # 04, Dhanmondi, Dhaka - 1205', '+8809666700100', 'Male', 1500),
(47, 'Prof. Dr.', 'Mamun Al Mahtab', 'Shwapnil', 'swapnil@gmail.com', 'B+', 49, 'MBBS, MSc (Gastro), MD (Hepatology), FACG (USA), FICP (India), FRCP (I', 'Professor', 'gastroenterologists', 'Bangabandhu Sheikh Mujib Medical University Hospital', 'Labaid Specialized Hospital, Dhanmondi', '6pm to 11pm', ' House # 06, Road # 04, Dhanmondi, Dhaka - 1205', '+8801914265331', 'Male', 1000),
(48, 'Prof. Dr.', 'Mahmud', 'Hasan', 'mahmud@gmail.com', 'AB-', 50, 'MBBS, PhD (Edin), FCPS, FCPS (Pak), FRCP (Edin), FRCP (Glasgow)', 'Professor', 'gastroenterologists', 'Bangabandhu Sheikh Mujib Medical University Hospital', 'Labaid Specialized Hospital, Dhanmondi', '4pm to 8pm ', ' House # 06, Road # 04, Dhanmondi, Dhaka - 1205', '01745671967', 'Male', 1000),
(49, 'Prof. Dr. Md.', 'Shahidul Islam', 'Selim', 'selim@gmail.com', 'B-', 56, 'MBBS, MCPS (Medicine), MD (Nephrology), FACP, FASN (USA), FRCP (UK)', 'Professor', 'nephrologists', 'Bangabandhu Sheikh Mujib Medical University Hospital', 'Medinova Medical Services, Dhanmondi', '7pm to 9pm', 'House # 71/A, Road # 5/A, Dhanmondi R/A, Dhaka', '01521369782', 'Male', 1000),
(50, 'Prof. Dr. Md.', 'Nizamuddin ', 'Chowdhury', 'nizam@gmail.com', 'O+', 50, 'MBBS, MD (Nephrology), MCPS (Medicine), FRCP (Glasgow), FASN, FISN (Ca', 'Professor', 'nephrologists', 'Dhaka Medical College & Hospital', 'Popular Diagnostic Center, Dhanmondi', '6pm to 9pm', 'House # 16, Road # 2, Dhanmondi, Dhaka - 1205', '01771962133', 'Male', 1000),
(51, 'Prof. Dr.', 'Anwara', 'Begum', 'awara@gmail.com', 'B+', 54, 'MBBS, FCPS, MRCPsych (London)', 'Professor of Psychiatry and Chief Consultant', 'psychiatrists', 'BIRDEM General Hospital and Ibrahim Medical College, Dhaka, Bangladesh', 'BIRDEM General Hospital', '3pm to 7pm', '122, Kazi Nazrul Islam Avenue, Dhaka 1000, Bangladesh.', '01916948490', 'Female', 1200),
(52, 'Prof. Dr.', 'M S I', 'Mullick', 'mullik@gmail.com', 'AB-', 51, ' MBBS, Phd, FCPS, MRC Psyc ( London ) , DCAP', 'Professor & Chairman, Department of Pshychiatric', 'psychiatrists', 'Bangabandhu Sheikh Mujib Medical University (BSMMU), Shahbagh, Dhaka', 'Labaid Hospital Ltd.', '08pm to 10pm', ' House # 1, Road # 4, Dhanmondi, Dhaka – 1205', '01521659875', 'Male', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewid` int(11) NOT NULL,
  `appid` int(11) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `details` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewid`, `appid`, `dateandtime`, `details`) VALUES
(1, 4, '2022-02-12 08:17:58', 'appp Rimiiiiii id4'),
(3, 6, '2022-02-12 06:56:35', 'app Rimi id6');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `ufname` varchar(30) DEFAULT NULL,
  `ulname` varchar(30) DEFAULT NULL,
  `ucontact` varchar(30) NOT NULL,
  `ugender` varchar(10) DEFAULT NULL,
  `uaddress` varchar(200) NOT NULL,
  `uage` int(3) NOT NULL,
  `ubloodgroup` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `ufname`, `ulname`, `ucontact`, `ugender`, `uaddress`, `uage`, `ubloodgroup`) VALUES
(18, 'Ferdowsi', 'Marufa', '01521451381', 'Female', 'Amtola, Barisal', 23, 'O+'),
(20, 'Helena Aktherrr', 'Motkaaaaaaa', '01745671968', 'Others', 'Kochukhet, Dhaka', 25, 'B+'),
(30, 'SA', 'Sinthia', '01521105269', 'Female', '41st street, California', 22, 'B+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aid` (`aid`);

--
-- Indexes for table `alluser`
--
ALTER TABLE `alluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appid`),
  ADD KEY `did` (`docid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `docid` (`docid`),
  ADD KEY `docid_idx` (`docid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewid`),
  ADD UNIQUE KEY `appid_UNIQUE` (`appid`),
  ADD KEY `appid_idx` (`appid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alluser`
--
ALTER TABLE `alluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `alluser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `did` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `docid` FOREIGN KEY (`docid`) REFERENCES `alluser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `appid` FOREIGN KEY (`appid`) REFERENCES `appointment` (`appid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `alluser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
