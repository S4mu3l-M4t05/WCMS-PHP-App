-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2023 at 04:52 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_title` varchar(100) NOT NULL,
  `section_subheader` text NOT NULL,
  `article_header` text NOT NULL,
  `article_subheader` text NOT NULL,
  `paragraph` text NOT NULL,
  `listitem1_title` text NOT NULL,
  `listitem1_text` text NOT NULL,
  `listitem2_title` text NOT NULL,
  `listitem2_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `section_title`, `section_subheader`, `article_header`, `article_subheader`, `paragraph`, `listitem1_title`, `listitem1_text`, `listitem2_title`, `listitem2_text`) VALUES
(1, 'FefsdvcsdzcasdcMore <span>About Us</span>', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', 'Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate\r\n              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in\r\n              culpa qui officia deserunt mollit anim id est laborum', 'Ullamco laboris nisi ut aliquip consequat', 'Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade', 'Magnam soluta odio exercitationem reprehenderi', 'Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi');

-- --------------------------------------------------------

--
-- Table structure for table `contact_cards`
--

DROP TABLE IF EXISTS `contact_cards`;
CREATE TABLE IF NOT EXISTS `contact_cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `text` text,
  `size` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_cards`
--

INSERT INTO `contact_cards` (`id`, `icon`, `title`, `text`, `size`) VALUES
(1, 'bx bx-map', 'Our Address sdfasdfdasd', 'A108 Adam Street, New York, NY 535022  fdwefdasfdascsfc', '6'),
(2, 'bx bx-envelope', 'Email Ussdfsdfsdfdsf', 'contact@example.com', '6'),
(3, 'bx bx-phone-call', 'Call Us ', '+1 5589 55488 55', '3');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) NOT NULL,
  `subheading` varchar(100) NOT NULL,
  `map` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `heading`, `subheading`, `map`) VALUES
(1, '<span>Contact Us</span>czcdscsdcascec', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

DROP TABLE IF EXISTS `home`;
CREATE TABLE IF NOT EXISTS `home` (
  `id` int NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subheading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bgd_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `btnText` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `btnLink` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `videoText` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `footer` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `heading`, `subheading`, `bgd_image`, `btnText`, `btnLink`, `video`, `videoText`, `footer`) VALUES
(1, 'Welcome to <span>BizscascascsacsLand</span>', 'sacascsdfsdvdsv', 'assets/upload/hero-bg.jpg', 'Get Started', '#about', 'https://youtu.be/dQw4w9WgXcQ?si=3bnbbIZCJU_BMGf_', 'ascascascsac', 'Bizland llc');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `header` varchar(255) DEFAULT NULL,
  `subheader` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `images` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `header`, `subheader`, `images`) VALUES
(1, 'Our <span>Portfolio</span>', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', '[\"assets\\/img\\/portfolio\\/portfolio-1.jpg\",\"assets\\/img\\/portfolio\\/portfolio-2.jpg\",\"assets\\/img\\/portfolio\\/portfolio-3.jpg\",\"assets\\/img\\/portfolio\\/portfolio-4.jpg\",\"assets\\/img\\/portfolio\\/portfolio-5.jpg\",\"assets\\/img\\/portfolio\\/portfolio-6.jpg\",\"assets\\/img\\/portfolio\\/portfolio-7.jpg\",\"assets\\/img\\/portfolio\\/portfolio-8.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `author` int NOT NULL,
  `date` date NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `section_title` text NOT NULL,
  `section_subheader` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `section_title`, `section_subheader`) VALUES
(1, 'Our Hardworking <span>Team</span>', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.');

-- --------------------------------------------------------

--
-- Table structure for table `services_cards`
--

DROP TABLE IF EXISTS `services_cards`;
CREATE TABLE IF NOT EXISTS `services_cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services_cards`
--

INSERT INTO `services_cards` (`id`, `icon`, `title`, `text`) VALUES
(1, 'bx bxl-dribbble', 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi'),
(2, 'bx bx-file', 'Sed ut perspiciatis', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore'),
(3, 'bx bx-tachometer', 'Magni Dolores', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_title` varchar(100) DEFAULT NULL,
  `section_subheader` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `section_title`, `section_subheader`) VALUES
(1, 'Our Hardworking <span>Team</span>', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.');

-- --------------------------------------------------------

--
-- Table structure for table `teammember`
--

DROP TABLE IF EXISTS `teammember`;
CREATE TABLE IF NOT EXISTS `teammember` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team_id` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `bio` text,
  `picture` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teammember`
--

INSERT INTO `teammember` (`id`, `team_id`, `name`, `title`, `bio`, `picture`) VALUES
(1, 1, 'White Walter', 'Chief Executive Officer', 'vdvdvasdzvcasdfcsefefeswfewf', 'assets/img/team/team-1.jpg'),
(2, 1, 'Sarah Jhonson', 'Product Manager', 'vsdvsdvsdevrvrfdbgtfjtbrdsfgredg', 'assets/img/team/team-2.jpg'),
(3, 1, 'William Anderson', 'CTO', 'v fcvdfvbgfdbgsdvsadefcaewfefv', 'assets/img/team/team-3.jpg'),
(4, 1, 'Amanda Jepson', 'Accountant', 'vzdxcvasdcsdvsdvsdvsdevevev', 'assets/img/team/team-4.jpg'),
(6, 1, 'Sarah Jhonson', 'Product Manager fafdaw dasdsdadasfdasdf', 'vsdvsdvsdevrvrfdbgtfjtbrdsfgredg', 'assets/img/team/team-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` tinyint NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `level`, `active`, `added`) VALUES
(1, 'Samuel', 'Matos', 'Samuel_Matos', '5333693@mtl.herzing.ca', '$2y$10$kbempJV208QvSeKJHYZxn.0YTYlamPOQ4CZLGDLFvAGQqJdA2hEny', 1, 0, '2023-08-15 03:02:40'),
(4, 'Rebekah', 'Matos', 'Leumas_sotam', 'h5333693@5333693.herzingmontreal.ca', '$2y$10$q1pEIIcrSSJYl6kLVvSz1.D3..ocjnBGk5YNFxmaWKoqGoa2XSHma', 2, 0, '2023-08-30 12:38:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
