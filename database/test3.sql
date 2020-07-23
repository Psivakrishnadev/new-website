-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table test_db.interviews
CREATE TABLE IF NOT EXISTS `interviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `address1` varchar(191) DEFAULT NULL,
  `address2` varchar(191) DEFAULT NULL,
  `landmark` varchar(191) DEFAULT NULL,
  `Pincode` varchar(191) DEFAULT NULL,
  `Applied` varchar(191) DEFAULT NULL,
  `company` varchar(191) DEFAULT NULL,
  `company_address1` varchar(191) DEFAULT NULL,
  `company_address2` varchar(191) DEFAULT NULL,
  `company_landmark` varchar(191) DEFAULT NULL,
  `company_pincode` varchar(191) DEFAULT NULL,
  `interview_by` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `approved` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table test_db.interviews: ~0 rows (approximately)
/*!40000 ALTER TABLE `interviews` DISABLE KEYS */;
INSERT INTO `interviews` (`id`, `name`, `email`, `mobile`, `address1`, `address2`, `landmark`, `Pincode`, `Applied`, `company`, `company_address1`, `company_address2`, `company_landmark`, `company_pincode`, `interview_by`, `date`, `approved`) VALUES
	(1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2020-07-20', '1'),
	(2, 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '0000-00-00', 'ss'),
	(3, 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '0000-00-00', 'ss'),
	(4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', ''),
	(5, 'Xanthus Charles', 'quzicolawu@mailinator.com', '33', '192 First Court', 'Quis in voluptate ni', 'Voluptate provident', 'Vero totam ea enim n', 'Nihil assumenda nihi', 'Townsend Norman Traders', 'Michael and Shaffer Traders', 'Morales and Nelson Trading', 'English Haley LLC', 'Craft Rojas Trading', 'Et duis excepturi qu', '2018-07-09', 'Consequatur Volupta');
/*!40000 ALTER TABLE `interviews` ENABLE KEYS */;

-- Dumping structure for table test_db.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `tags` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `experience` varchar(191) DEFAULT NULL,
  `minimum_salary` varchar(191) DEFAULT NULL,
  `maximum_salary` varchar(191) DEFAULT NULL,
  `region` varchar(191) DEFAULT NULL,
  `location` varchar(191) DEFAULT NULL,
  `upload_file` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table test_db.jobs: ~13 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`id`, `title`, `email`, `tags`, `type`, `experience`, `minimum_salary`, `maximum_salary`, `region`, `location`, `upload_file`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'ss', 'ss', 'ss', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'Fugiat eveniet eiu', 'xyqewozu@mailinator.com', 'Tempora sit distinc', NULL, '1 Years', '62', 'Ipsum repellendus V', 'New York', 'Asperiores omnis est', ''),
	(4, 'Quidem placeat aut ', 'wyhe@mailinator.com', 'Consequatur voluptat', NULL, '1 Years', '59', 'Expedita amet saepe', 'New York', 'Dolore aliqua Non c', ''),
	(5, 'Ea suscipit hic impe', 'wovemi@mailinator.com', 'Ea fugit quo quo cu', NULL, '1 Years', '94', 'Assumenda modi magna', 'New York', 'Omnis tempore dolor', ''),
	(6, 'Sunt eveniet except', 'ditosu@mailinator.com', 'Aliquam iure volupta', NULL, '1 Years', '2', 'Ad placeat sed amet', 'New York', 'Ipsum aut doloremqu', ''),
	(7, 'Nesciunt rerum amet', 'mekiqeguq@mailinator.com', 'Minima voluptates at', NULL, '1 Years', '42', 'Adipisicing nobis la', 'New York', 'Distinctio Velit mo', 'Screenshot (1).png'),
	(8, 'Impedit autem facer', 'qopicuduse@mailinator.com', 'Delectus velit ess', NULL, '1 Years', '2', 'Eveniet officiis et', 'New York', 'Repudiandae aut duis', 'Screenshot (1).png'),
	(9, 'Rem similique nobis ', 'cojiko@mailinator.com', 'Minus sunt aut solut', NULL, '1 Years', '96', 'Molestias totam eius', 'New York', 'Incididunt magna mag', 'Screenshot (2).png'),
	(10, 'Quae fugit consequu', 'gihigul@mailinator.com', 'Est placeat quos co', NULL, '1 Years', '82', 'Cupidatat rem nihil ', 'New York', 'Quis quis sed cum qu', 'Screenshot (1).png'),
	(11, 'Debitis placeat nob', 'jumeziti@mailinator.com', 'Quos debitis et pers', NULL, '1 Years', '32', 'Sint recusandae Qu', 'New York', 'Saepe pariatur Ulla', ''),
	(12, 'Ab maiores nulla qui', 'vecu@mailinator.com', 'Soluta consectetur v', NULL, '1 Years', '10', 'Exercitationem omnis', 'New York', 'Eos sit reprehender', ''),
	(13, 'Ut vero veritatis si', 'wuzotu@mailinator.com', 'Ea voluptatem aliqu', NULL, '1 Years', '14', 'Quia est nobis volu', 'New York', 'Possimus dicta ut i', ''),
	(14, 'Ut sit aute aspernat', 'muqemuzy@mailinator.com', 'Nostrum enim minima ', NULL, '1 Years', '73', 'Magna vitae in elige', 'New York', 'Qui voluptate rerum ', ''),
	(15, 'Quia ratione eu quos', 'guxyhym@mailinator.com', 'Anim voluptates face', NULL, '1 Years', '70', 'Labore minus omnis d', 'New York', 'In ea quia sed quibu', ''),
	(16, 'Quia ratione eu quos', 'guxyhym@mailinator.com', 'Anim voluptates face', NULL, '1 Years', '70', 'Labore minus omnis d', 'New York', 'In ea quia sed quibu', ''),
	(17, 'Unde ipsa provident', 'domilukana@mailinator.com', 'Esse fugit velit e', NULL, '1 Years', '89', 'Nisi quia ipsam offi', 'New York', 'Dolore eius ut velit', ''),
	(18, 'Dolor repudiandae do', 'logiduvemi@mailinator.com', 'Dolorem elit dolore', NULL, '1 Years', '5', 'Error beatae ipsum ', 'New York', 'Quis beatae facere q', ''),
	(19, 'Aliqua Vitae dolor ', 'lifer@mailinator.com', 'Sit autem nisi cons', NULL, '1 Years', '52', 'Id ipsum adipisci d', 'New York', 'Voluptate aute autem', ''),
	(20, 'Officiis autem conse', 'sarecid@mailinator.com', 'Quo esse ut aliquid ', NULL, '1 Years', '37', 'Similique sint sed e', 'New York', 'Aperiam aperiam tota', ''),
	(21, 'Ratione maxime qui o', 'felija@mailinator.com', 'Ad tenetur explicabo', NULL, '1 Years', '57', 'Fugit at magna odit', 'New York', 'Est exercitation ear', ''),
	(22, 'Do totam non eveniet', 'hojesux@mailinator.com', 'Eligendi libero cons', NULL, '1 Years', '27', 'Qui voluptates ullam', 'New York', 'Minim eum incidunt ', ''),
	(23, 'ss', 'ss', 'ss', NULL, 'ss', 'ss', 'ss', 'ss', 'ss', 'ss'),
	(24, 'ss', 'ss', 'ss', NULL, 'ss', 'ss', 'ss', 'ss', 'ss', 'ss'),
	(25, 'ss', 'ss', 'ss', NULL, 'ss', 'ss', 'ss', 'ss', 'ss', 'ss');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table test_db.resumes
CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skills` varchar(191) DEFAULT NULL,
  `social_profile_name` varchar(191) DEFAULT NULL,
  `social_description` varchar(191) DEFAULT NULL,
  `social_url` varchar(191) DEFAULT NULL,
  `work_title` varchar(191) DEFAULT NULL,
  `work_url` varchar(191) DEFAULT NULL,
  `currently_status` varchar(191) DEFAULT NULL,
  `work_description` mediumtext DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `paper_title` varchar(191) DEFAULT NULL,
  `paper_url` varchar(191) DEFAULT NULL,
  `paper_publish_date` varchar(191) DEFAULT NULL,
  `paper_description` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table test_db.resumes: ~6 rows (approximately)
/*!40000 ALTER TABLE `resumes` DISABLE KEYS */;
INSERT INTO `resumes` (`id`, `skills`, `social_profile_name`, `social_description`, `social_url`, `work_title`, `work_url`, `currently_status`, `work_description`, `start_date`, `end_date`, `paper_title`, `paper_url`, `paper_publish_date`, `paper_description`) VALUES
	(1, 'ssssssss', 'Carlos Gay', 'Tempor sed consectet', 'Eos est sequi iust', 'Esse laudantium od', 'Quae rem qui pariatu', 'on', 'Quia dolores assumen', '1974-03-30', '1972-12-09', 'Odit beatae exercita', 'Tempore neque magna', '1977-07-10', 'Ullam velit quia iur'),
	(2, 'ss', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'asdsadasd', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'ssssssss', 'sss', 'sss', 'sss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, NULL, NULL, NULL, NULL, '23', '3', '3', '3', '2020-07-19', '2020-07-22', '1', '1', '1', '1');
/*!40000 ALTER TABLE `resumes` ENABLE KEYS */;

-- Dumping structure for table test_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table test_db.users: ~12 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `user_name`, `password`, `email`, `role`, `name`) VALUES
	(1, 'sagor', '123', '', 'employer', 'Elias'),
	(2, 'john', 'abc', '', '', 'John'),
	(3, 'Azmaiens', '12345678', '', '', 'Mehedi Hasan Sagor'),
	(4, 'Quail Hancock', 'Pa$$w0rd!', '', '', 'Nola Melton'),
	(5, 'Bernard Navarro', 'Pa$$w0rd!', '', '', 'Ciara Gutierrez'),
	(6, 'Xaviera Golden', 'Pa$$w0rd!', '', '', 'Zephania Heath'),
	(7, 'Daria Cochran', 'Pa$$w0rd!', '', '', 'Martin Carpenter'),
	(8, 'Geraldine Mayo', 'Pa$$w0rd!', '', '', 'Pascale Noel'),
	(9, 'Zorita Humphrey', 'Pa$$w0rd!', '', '', 'Maggy Marquez'),
	(10, 'Uma Mcguire', 'Pa$$w0rd!', '', '', 'Mary Henson'),
	(11, 'Chandler Hawkins', 'Pa$$w0rd!', 'juvazo@mailinator.com', 'select', 'Britanney Castillo'),
	(12, 'Dacey Calhoun', 'Pa$$w0rd!', 'ciduzyqa@mailinator.com', 'employer', 'Cecilia Buckley'),
	(13, 'Inga Oneil', 'Pa$$w0rd!', 'lefotag@mailinator.com', 'employer', 'Adele Bishop'),
	(14, 'Zorita Peterson', 'Pa$$w0rd!', 'rygyryfa@mailinator.com', 'employer', 'Judah Cash'),
	(15, 'Paul Moody', 'Pa$$w0rd!', 'kiwuqaf@mailinator.com', 'employer', 'Madison Merrill'),
	(16, 'Ralph Hoffman', 'Pa$$w0rd!', 'qyrilon@mailinator.com', 'candidate', 'Lane Bailey'),
	(17, 'Ferdinand Levine', '123456', 'hyroto@mailinator.com', 'candidate', 'Graiden Turner'),
	(18, 'Naida Rich', '1234', 'musogoha@mailinator.com', 'employer', 'Stephen Haney'),
	(19, 'Bruce Buckley', 'Pa$$w0rd!', 'gehowyzyw@mailinator.com', '', 'Molly Mcdonald'),
	(20, 'Lance Mcmahon', 'Pa$$w0rd!', 'wupaqyp@mailinator.com', '', 'Buckminster Hodge'),
	(21, 'Uta Bean', 'Pa$$w0rd!', 'cywivurija@mailinator.com', '', 'Adrian Herman'),
	(22, 'ss', 'ss', 'ss', 'ss', 'ss'),
	(23, 'ss', 'ss', 'ss', 'ss', 'ss');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
