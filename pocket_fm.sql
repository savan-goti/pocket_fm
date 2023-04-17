-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 08:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pocket_fm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

CREATE TABLE `tblbanner` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `type` tinyint(10) DEFAULT NULL COMMENT '1=>slider,2=>Advertisement,3=>Offer',
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbanner`
--

INSERT INTO `tblbanner` (`id`, `title`, `description`, `url`, `type`, `image`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 'Here the proof that momentum strategies work', '', 'https://www.instagram.com/', 1, '43240111.jpg', 1, 0, NULL, NULL),
(2, 'Innovations that Bring Pleasure to All Peoples', '', 'https://www.instagram.com/', 1, '92575823.jpg', 1, 0, NULL, NULL),
(3, 'First prototype flight using kinetic launch system', '', 'https://www.instagram.com/', 1, '26840632.jpg', 1, 0, NULL, NULL),
(4, 'How Maps Reshape American Politics In World', '', 'https://www.instagram.com/', 1, '7231544.jpg', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `name`, `picture`, `description`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 'Audio Series', '6450981podcastevents.png', NULL, 1, 0, NULL, NULL),
(2, 'Podcasts', '7188632download.jpeg', NULL, 1, 0, NULL, NULL),
(3, 'Music', '85797music.jpg', NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsetting`
--

CREATE TABLE `tblsetting` (
  `setting_id` int(11) NOT NULL,
  `webicon` varchar(250) DEFAULT NULL,
  `owned_by` varchar(255) DEFAULT NULL,
  `footer` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `map_link2` text DEFAULT NULL,
  `from_email` text DEFAULT NULL,
  `inquiry_email` text DEFAULT NULL,
  `sales_email` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `privacy` text DEFAULT NULL,
  `refund_policy` text DEFAULT NULL,
  `return_policy` text DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tblsetting`
--

INSERT INTO `tblsetting` (`setting_id`, `webicon`, `owned_by`, `footer`, `header`, `email`, `email2`, `fb_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `youtube_link`, `company_name`, `company_logo`, `phone`, `phone2`, `address`, `address2`, `map_link`, `map_link2`, `from_email`, `inquiry_email`, `sales_email`, `terms`, `privacy`, `refund_policy`, `return_policy`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 'tray_img3465565361671101441.', 'Mr. Wahid Badami', 'Footer', 'Mo Daaktar', 'info@smg.ind.in', 'info@smg.ind.in', 'https://facebook.com/', 'https://twitter.com/', '#', '#', '#', '#', 'tray_img8471947241667899069.png', '022 - 33928008, 33928182', '022 - 33928008, 33928182', 'C-14-15-16, Sagar Industrial Estate, Vasta Devdi Rd,\r\n<br>Surat, Gujarat 395004', 'DW - 1355(01), Bharat Diamond Bourse, BKC, Bandra(East),\r\n<br>Mumbai - 400051, India', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d929.8532267573329!2d72.83432632922798!3d21.215469049331613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04eee918917ed%3A0xa36145d5bc2771a2!2sSagar%20Industrial%20Estate!5e0!3m2!1sen!2sin!4v1654498557385!5m2!1sen!2sin', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d385.08889401518286!2d72.86310668506091!3d19.065699516804386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8e61d6586f5%3A0xb18150b233839e34!2sBharat%20Diamond%20Bourse%2C%20Bharat%20Diamond%20Bourse%20Internal%20Rd%2C%20G%20Block%20BKC%2C%20Bandra%20Kurla%20Complex%2C%20Bandra%20East%2C%20Mumbai%2C%20Maharashtra%20400051!5e0!3m2!1sen!2sin!4v1654498487808!5m2!1sen!2sin', 'info@smg.ind.in', 'info@smg.ind.in', 'info@smg.ind.in', '<br>- All Return/Cancel orders will take 14-21 Days to process.\r\n<br>&nbsp;<br>- All service and support provided by Authorised Apple store.<br><br>- All devices come with a 15 day limited Marvans warranty which does not cover water and physical damage.', '<br>- Marvans mobile doesn’t collect or store your credit card/ debit card/ other banking details.\r\n<br><br>- Marvans mobile collects and stores your personal credentials, and doesn’t share it with any 3rd party, for any purposes.\r\n<br><br>- Marvans Mobile is obliged to share relevant details to government bodies as per indian penal law.', '<br>- The refund policy of marvans mobile let’s a customer return the mobile in case of a genuine issue of product &amp; our technical team will do inspection weather its companies fault or customer, and can apply for a refund.<br><br>- Processed refunds will take 14-21 days to be processed.', '<br>- All Return/Cancel orders will take 14-21 Days to process.\r\n<br><br>- All service and support provided by Authorised Apple store.', 1, 0, '2019-07-12 00:30:28', '2019-07-12 00:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblstorys`
--

CREATE TABLE `tblstorys` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `story_type_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstorys`
--

INSERT INTO `tblstorys` (`id`, `category_id`, `story_type_id`, `name`, `description`, `image`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 1, 2, 'Secret Fauji', 'test', '93936615626d0122eb8277a1130d4a145591ed77de78811.jpg', 1, 0, '2023-04-01 00:00:00', '2023-04-15 00:00:00'),
(2, 1, 2, 'Contract Marriage - I Melt With You', 'Contract Marriage - I Melt With You', '414540cb9d95a64057fe7783fb344edbb98a06aadda5f7.jpg', 1, 0, '2023-03-23 00:00:00', '2023-04-13 00:00:00'),
(3, 1, 1, 'Secret Ameerzaada', 'Secret Ameerzaada', '485036Secret_Ameerzaada.jpg', 1, 0, '2023-03-24 00:00:00', NULL),
(6, 2, 5, 'Super Son-In-Law', 'Super Son-In-Law', '1482181ee3f6b10057f3b6f2205a5277595d72e65dd859.jpg', 1, 0, '1900-03-24 00:00:00', '2023-04-14 00:00:00'),
(7, 1, 9, 'test', 'sdfdfsdfdfsfd', '75932940.jpg', 1, 0, '2023-03-25 00:00:00', NULL),
(8, 1, 6, 'test2', 'Traveling can be one of the most exciting and enriching experiences of our lives', '40240433.jpg', 1, 0, '2023-03-25 00:00:00', NULL),
(9, 2, 8, 'podcast1', 'By following some simple tips and tricks.', '42203631.jpg', 1, 0, '2023-03-25 00:00:00', NULL),
(10, 2, 9, 'podcast2', 'errewerer', '408861024.jpg', 1, 0, '2023-03-26 00:00:00', NULL),
(11, 2, 9, 'podcast3', 'sdfdfsdfsfdsdfsfdghjkkjjluiouyg', '19440257.jpg', 1, 0, '2023-03-26 00:00:00', NULL),
(12, 2, 7, 'Podcast4', 'podcast Data', '41491939.jpg', 1, 0, '2023-03-26 00:00:00', NULL),
(13, 3, 12, 'OOPS', 'OOPS', '26661413images (3).jpeg', 1, 0, '2023-04-01 00:00:00', '2023-04-15 00:00:00'),
(15, 3, 12, 'halamithi Habibo', 'halamithi Habibo', '77340815images (4).jpeg', 1, 0, '2023-04-15 00:00:00', '2023-04-15 00:00:00'),
(16, 3, 12, 'Airangi re', 'Airangi re', '854624images (5).jpeg', 1, 0, '2023-04-15 00:00:00', NULL),
(17, 3, 12, 'dilde', 'dilde', '422543images (2).jpeg', 1, 0, '2023-04-15 00:00:00', NULL),
(18, 3, 12, 'Sanak', 'Sanak', '862454images (1).jpeg', 1, 0, '2023-04-15 00:00:00', NULL),
(19, 3, 11, 'Motivational Epic Music', 'Motivational Epic Music / Inspiring Cinematic Background Music', '24945313-40-40-910_200x200.webp', 1, 0, '2023-04-15 00:00:00', NULL),
(20, 3, 11, 'Epicaly', 'Epicaly', '3140214-55-33-454_200x200.webp', 1, 0, '2023-04-15 00:00:00', NULL),
(21, 3, 11, 'Superhero Trailer', 'Superhero Trailer', '60140209-15-35-277_200x200.webp', 1, 0, '2023-04-15 00:00:00', NULL),
(22, 3, 11, 'Fight', 'Fight', '6649012-47-31-476_200x200.jpg', 1, 0, '2023-04-15 00:00:00', NULL),
(23, 3, 11, 'Trailer', 'Trailer', '17199109-21-49-418_200x200.webp', 1, 0, '2023-04-15 00:00:00', NULL),
(24, 3, 11, 'Cinematic Inspiring Irish Pipe (Main)', 'Cinematic Inspiring Irish Pipe (Main)', '34699509-02-11-911_200x200.webp', 1, 0, '2023-04-15 00:00:00', NULL),
(25, 3, 13, 'Ae Nargise Mastana', 'Rajendra Kumar, Sadhana, Feroz Khan, Mehmood, Nazima, Nazir Hussain, Achala Sachdev, Dhumal', '193720Ae-Nargise-Mastana-Arzoo-500-500.jpg', 1, 0, '2023-04-15 00:00:00', NULL),
(26, 3, 13, 'Guide Mp3 Songs', 'Guide Mp3 Songs', '520960guide-500-500.jpg', 1, 0, '2023-04-15 00:00:00', NULL),
(27, 3, 13, 'Aashiana', 'Aashiana', '149742aashiana-1974-500-500.jpg', 1, 0, '2023-04-15 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstory_ep`
--

CREATE TABLE `tblstory_ep` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `audio` text DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstory_ep`
--

INSERT INTO `tblstory_ep` (`id`, `category_id`, `story_id`, `name`, `picture`, `audio`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 1, 1, 'Ep 1-कुछ तो है', '3541051episode 1051.mp3', '3054681episode 1051.mp3', 1, 0, NULL, NULL),
(2, 1, 1, '1048 :- Date ya mission ?', NULL, '202133episode 1053.mp3', 1, 0, NULL, NULL),
(3, 1, 1, '1049 :- Jwalapuri ka Jwalamukhi', NULL, '46538episode 1054.mp3', 1, 0, NULL, NULL),
(4, 1, 1, '1040 :- Maan Na Maan Main Tera Mehmaan ! ', NULL, '380150episode 1052.mp3', 1, 0, NULL, NULL),
(5, 1, 1, '1041 :- Aneko Main Ek', NULL, '380169episode 1051.mp3', 1, 0, NULL, NULL),
(6, 1, 1, '1042 :- Gender ka Maslaa', NULL, '134888episode 1053.mp3', 1, 0, NULL, NULL),
(7, 1, 1, '1043 :- Transfer', NULL, '165095episode 1054.mp3', 1, 0, NULL, NULL),
(8, 1, 2, '1479 => Violent Father and Daughter!!', NULL, '925743S RJ Ep 1484.mp3', 1, 0, NULL, NULL),
(9, 1, 2, '1480 => Trapped!!', NULL, '875753S RJ Ep 1482.mp3', 1, 0, NULL, NULL),
(10, 1, 2, '1481 => Big Black 🐍 Sneak!!', NULL, '279046S RJ Ep 1483.mp3', 1, 0, NULL, NULL),
(11, 1, 2, '1482 => Ghost 👻 Toxic Sneak Egg!!', NULL, '572096S RJ Ep 1481.mp3', 1, 0, NULL, NULL),
(12, 1, 3, 'Episode 1', NULL, '5590155_6111543934549231593.mp3', 1, 0, NULL, NULL),
(13, 1, 3, 'Episode 2', NULL, '7577425_6111543934549231592.mp3', 1, 0, NULL, NULL),
(14, 1, 3, 'Episode 3', NULL, '4116755_6111543934549231591.mp3', 1, 0, NULL, NULL),
(15, 1, 3, 'Episode 4', NULL, '323825_6111543934549231589.mp3', 1, 0, NULL, NULL),
(16, 1, 3, 'Episode 5', NULL, '9707735_6111543934549231590.mp3', 1, 0, NULL, NULL),
(17, 1, 3, 'Episode 6', NULL, '4627185_6111543934549231586.mp3', 1, 0, NULL, NULL),
(18, 3, 13, 'OOPS', NULL, '252944Short Film Bgm.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(19, 3, 15, 'halamithi Habibo', NULL, '163579Short Film - Comedy ! BGM.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(20, 3, 16, 'Airangi re', NULL, '', 1, 0, '2023-04-15 00:00:00', NULL),
(21, 3, 17, 'dilde', NULL, '369528Short Film Songs.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(22, 3, 18, 'Sanak', NULL, '516559Special Bgm ! Hindi ! Theme ! Bgm ! Instrumental ! Short bgm.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(23, 3, 19, 'Motivational Epic Music', NULL, '673103motivational-epic-music-inspiring-cinematic-background-music-124265.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(24, 3, 20, 'Epicaly', NULL, '158652epicaly-113907.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(25, 3, 21, 'Superhero Trailer', NULL, '206270superhero-trailer-110450.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(26, 3, 22, 'Fight', NULL, '74481fight-142564.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(27, 3, 23, 'Trailer', NULL, '66566trailer-15322.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(28, 3, 24, 'Cinematic Inspiring Irish Pipe (Main)', NULL, '367258cinematic-inspiring-irish-pipe-main-9668.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(29, 3, 25, 'Ae Nargise Mastana', NULL, '198200Ae Nargise Mastana Arzoo 128 Kbps.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(30, 3, 26, 'Guide Mp3 Songs', NULL, '583141Allah Megh De Paani De Re Guide 128 Kbps.mp3', 1, 0, '2023-04-15 00:00:00', NULL),
(31, 3, 27, 'Aashiana', NULL, '291513Kaisi Mehfil Hai Yeh Aashiana 128 Kbps.mp3', 1, 0, '2023-04-15 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstory_type`
--

CREATE TABLE `tblstory_type` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstory_type`
--

INSERT INTO `tblstory_type` (`id`, `category_id`, `name`, `picture`, `description`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 1, 'Trending This Week', NULL, NULL, 1, 0, NULL, NULL),
(2, 1, 'Ambitious Girl', NULL, NULL, 1, 0, NULL, NULL),
(3, 1, 'One-sided Love', NULL, NULL, 1, 0, NULL, NULL),
(4, 1, 'Betrayal', NULL, NULL, 1, 0, NULL, NULL),
(5, 2, 'Trending Podcasts', NULL, NULL, 1, 0, NULL, NULL),
(6, 2, 'Top Picks', NULL, NULL, 1, 0, NULL, NULL),
(7, 2, 'Entertainment Podcasts', NULL, NULL, 1, 0, NULL, NULL),
(8, 2, 'Spiritual Podcasts', NULL, NULL, 1, 0, NULL, NULL),
(9, 2, 'Lifestyle & Health Podcasts', NULL, NULL, 1, 0, NULL, NULL),
(10, 2, 'Motivational Podcasts', NULL, NULL, 1, 0, NULL, NULL),
(11, 3, 'hollywood', NULL, NULL, 1, 0, '2023-04-15 00:00:00', NULL),
(12, 3, 'Bollywood', NULL, NULL, 1, 0, '2023-04-15 00:00:00', NULL),
(13, 3, '90\'s', NULL, NULL, 1, 0, '2023-04-15 00:00:00', '2023-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT 0,
  `dob` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `visible_pass` varchar(255) DEFAULT NULL,
  `user_role` int(11) NOT NULL DEFAULT 1 COMMENT '1=>Normal User, 2=>Admin',
  `otp` int(11) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `username`, `email`, `mobile`, `gender`, `dob`, `address`, `picture`, `password`, `visible_pass`, `user_role`, `otp`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 'admin', 'admin@admin.com', '1234567895', 1, '0', 'I-301 sundaram resistance, Maharaja Farm Mota Varachha', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '1234', 2, NULL, 1, 0, NULL, '2023-04-08 00:00:00'),
(2, 'savan goti', 'savan@gmail.com', '4356789235', 1, '0', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', '1234', 1, NULL, 1, 0, '2023-03-24 14:03:53', '2023-03-24 00:00:00'),
(4, 'niral', 'niral123@gmail.com', '03216549875', 0, NULL, NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', '1234', 1, 1111, 1, 0, NULL, NULL),
(10, 'venshi', 'venshi@gmail.com', '65498773215', 0, NULL, 'test', '67855910OIP.jpeg', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 1, NULL, 1, 0, NULL, '2023-04-17 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbanner`
--
ALTER TABLE `tblbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsetting`
--
ALTER TABLE `tblsetting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tblstorys`
--
ALTER TABLE `tblstorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstory_ep`
--
ALTER TABLE `tblstory_ep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstory_type`
--
ALTER TABLE `tblstory_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbanner`
--
ALTER TABLE `tblbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsetting`
--
ALTER TABLE `tblsetting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblstorys`
--
ALTER TABLE `tblstorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblstory_ep`
--
ALTER TABLE `tblstory_ep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblstory_type`
--
ALTER TABLE `tblstory_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
