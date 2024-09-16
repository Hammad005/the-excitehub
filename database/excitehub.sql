-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 08:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excitehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `joindate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `email`, `password`, `joindate`) VALUES
(1, 'Hammad Khatri', 'Khatrihammad911@gmail.com', '1234567890', '2024-06-25 20:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `cricket`
--

CREATE TABLE `cricket` (
  `id` int(11) NOT NULL,
  `poster` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `match_name` varchar(250) NOT NULL,
  `team_one` varchar(250) NOT NULL,
  `team_two` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cricket`
--

INSERT INTO `cricket` (`id`, `poster`, `logo`, `match_name`, `team_one`, `team_two`, `location`, `date`, `time`, `address`, `price`, `add_time`) VALUES
(4, 'PSL.jpg', 'PSL_LOGO.png', 'PSL 2024', 'Quetta Gladiators', 'Multan Sultan', 'National Stadium Karachi', '2024-08-29', '7:00 PM', 'V3WJ+CHG, National Stadium Colony Gulshan-e-Iqbal, Karachi, Karachi City, Sindh', '750', '2024-07-12 17:37:49'),
(17, 'PSL_2.jpg', 'PSL_LOGO.png', 'PSL 2024', 'Karachi Kings', 'Islamabad United', 'National Stadium Karachi', '2024-08-30', '7:00 PM', 'V3WJ+CHG, National Stadium Colony Gulshan-e-Iqbal, Karachi, Karachi City, Sindh', '900', '2024-07-13 18:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `cricket_order`
--

CREATE TABLE `cricket_order` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `match_name` varchar(250) NOT NULL,
  `team_one` varchar(250) NOT NULL,
  `team_two` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `tickets` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `card_number` varchar(250) NOT NULL,
  `card_pin` varchar(250) NOT NULL,
  `booking_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cricket_order`
--

INSERT INTO `cricket_order` (`id`, `username`, `email`, `match_name`, `team_one`, `team_two`, `price`, `tickets`, `total`, `card_number`, `card_pin`, `booking_time`) VALUES
(1, 'Wasam', 'wasam88@gmail.com', 'PSL 2024', 'Quetta Gladiators', 'Multan Sultan', '637.5', '5', '3187.5', '$2y$10$9zSrqhr9eB3b/Qltb6./RuhQWmz6wlc4rB/1spHuFJHFsU6dErhyy', '$2y$10$3jHMTRdvejpCskbiC2JQl.5dqHH/Ml8E5EsVEki.9SBXIP7twD.uO', '2024-07-19 16:07:35'),
(4, 'ali', 'ali@gmail.coma', 'PSL 2024', 'Karachi Kings', 'Islamabad United', '810', '2', '1620', '$2y$10$93Wee5Enj0kR1IcxxLB.3eMZ.3VPpA2KOmrpoUWWSgxxD.YrYP.Xm', '$2y$10$T5oRJ5yIfeK/iXOQh9yrzuUa3W6ZwQGNi8FOn4iDicpI/yOWc7ntq', '2024-08-16 12:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `poster` varchar(256) NOT NULL,
  `logo` varchar(256) NOT NULL,
  `event` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `genre` varchar(256) NOT NULL,
  `date` varchar(256) NOT NULL,
  `timing` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `poster`, `logo`, `event`, `location`, `genre`, `date`, `timing`, `address`, `price`, `add_time`) VALUES
(13, 'young_stunners.jpg', 'portgrand.png', 'Young Stunners Concert', 'Port Grand', 'Singers/HipHop/Rap Duo', '2024-08-08', '10pm', 'Road،, Port Grand Food St, opposite PNSC Building, West Wharf, Karachi, Pakistan', '2500', '2024-07-12 18:29:52'),
(17, 'qawali_night.png', 'PIA.png', 'Saqib Ali Taji Qawali Night', 'PIA Planetarium Karachi', 'Qawali Night', '2024-08-14', '8pm till midnight', 'W33G+4WP, Plot B 144, Block 15 Gulshan-e-Iqbal, Karachi, Pakistan', '1000', '2024-07-13 18:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `event_order`
--

CREATE TABLE `event_order` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `event` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `ticket_price` varchar(250) NOT NULL,
  `tickets` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `card_number` varchar(250) NOT NULL,
  `card_pin` varchar(250) NOT NULL,
  `booking_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_order`
--

INSERT INTO `event_order` (`id`, `username`, `email`, `event`, `location`, `ticket_price`, `tickets`, `total`, `card_number`, `card_pin`, `booking_time`) VALUES
(6, 'Anas Khan Lodhi', 'lodhikhan998@gmail.com', 'Saqib Ali Taji Qawali Night', 'PIA Planetarium Karachi', '1000', '4', '4000', '$2y$10$TV4xLN6GXWFXK/j4QqEY0eqzi7ZgH7VEc89bb1RwByKbYeH66qVC.', '$2y$10$D3Ega9DLjdHu7AU.zi0Rq.w7T4Tfr1Q/XaONwhs79YHHcIwiTlVY2', '2024-07-16 17:33:09'),
(7, 'Wasam', 'wasam88@gmail.com', 'Saqib Ali Taji Qawali Night', 'PIA Planetarium Karachi', '1000', '2', '2000', '$2y$10$NxGfHAPJdGT8.31pA9xOq.sctip8yiD9OLrSdrLmHieVLoj.5lznG', '$2y$10$bcwfzpuW7BumESwR9JloB.mWlkXsJgL8LMmBzBNCosK6seE6mZ0lq', '2024-07-24 14:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `feedback` varchar(256) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `subject`, `feedback`, `time`) VALUES
(18, 'khan', 'lodhikhan998@gmail.com', 'hi', 'hi\r\n', '2024-07-05 19:20:51'),
(20, 'abrar ahmed', 'ahmedabrar09@hotmail.com', 'hi', 'hi', '2024-07-05 19:21:09'),
(21, 'abeer ahmed', 'abeerahmed33@yahoo.com', 'hi', 'hi', '2024-07-05 19:21:19'),
(22, 'moiz', 'moiz66@gmail.com', 'hi', 'hi', '2024-07-05 19:21:26'),
(23, 'yaseen', 'yaseenkhan666@gmail.com', 'hi', 'hi\r\n', '2024-07-05 19:21:34'),
(24, 'abeer ahmed', 'ahmedabeer09@hotmail.com', 'lorem', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, cont', '2024-08-15 23:15:33'),
(25, 'ali', 'ali@gmail.coma', 'hi', 'hsihddhdj', '2024-08-16 12:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `movie_order`
--

CREATE TABLE `movie_order` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `theater_name` varchar(250) NOT NULL,
  `movie_name` varchar(250) NOT NULL,
  `selected_show_time` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `tickets` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `card_number` varchar(250) NOT NULL,
  `card_pin` varchar(250) NOT NULL,
  `booking_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_order`
--

INSERT INTO `movie_order` (`id`, `name`, `email`, `theater_name`, `movie_name`, `selected_show_time`, `price`, `tickets`, `total`, `card_number`, `card_pin`, `booking_time`) VALUES
(1, 'Wasam', 'wasam88@gmail.com', 'Atrium Cinema', 'Creation of the Gods I: KOS (2D)', '2024-07-29 \' 03:45pm', '850', '8', '6800', '$2y$10$OvVIuTGGJbHu3H9JsYmtiuS0vcr/aAfP.TJFGC3ULd36HCoUt37Yi', '$2y$10$4XCVjLz2esARrIEM/eELaes53VxrQzRbLwbYa4E02yE/.wyWg8nty', '2024-07-23 15:59:51'),
(9, 'Aryan', 'aryan676@gmail.com', 'Nueplex Cinema', 'Dolphin Boy (2D)', '2024-08-01 \' 06:00pm', '1200', '4', '4800', '$2y$10$KFQif9Fp2miJy2vk3xAG2uBuQv520Gd9vhtFh.ic9iZtGPHS4Bh1i', '$2y$10$.fi1jgCxyBXTC0uqxQS5feiyrz2ScwI9G9.KztC/i7RQe0AJFBWHO', '2024-07-24 15:22:10'),
(12, 'Wasam', 'wasam88@gmail.com', 'Atrium Cinema', 'Dolphin Boy (2D)', '2024-08-02 \' 11:30pm', '850', '2', '1700', '$2y$10$yzrY8gNUYrHgik3xLET4ZO1yrZFJ3s0DrYqFWjPP0PXbxjid0WBwS', '$2y$10$tQnv.KF8ZjiuEPBLrRbtgOOz5EkIbnlMhePLM29Motn3JJJM6Rdqm', '2024-07-27 17:21:24'),
(15, 'ali', 'ali@gmail.coma', 'Mega Multiplex', 'Deadpool & Wolverine (2D)', '2024-08-16 \' 11:15pm', '1350', '2', '2700', '$2y$10$8qnlNUajtZJxIHRvM39nFumoEqQgDqqCukw6EzY/.1l5e3Id08GoS', '$2y$10$J7ot/W6EIeZHFkZ7lctZQe4FHk9JrwcZ5yYl3EPLg1ihZ6b7uB2Q.', '2024-08-16 12:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `dis_movie` varchar(30) NOT NULL,
  `dis_amusement` varchar(30) NOT NULL,
  `dis_cricket` varchar(30) NOT NULL,
  `plaunch_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `pname`, `price`, `dis_movie`, `dis_amusement`, `dis_cricket`, `plaunch_time`) VALUES
(1, 'Gold Package', '1,499 ', '10', '10', '10', '2024-07-03 14:54:06'),
(4, 'Diamond Package', '1,999', '15', '15', '15', '2024-07-03 16:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `parks`
--

CREATE TABLE `parks` (
  `id` int(11) NOT NULL,
  `poster` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `logo_2` varchar(250) NOT NULL,
  `park_name` varchar(250) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `ticket_price` varchar(250) NOT NULL,
  `timing` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parks`
--

INSERT INTO `parks` (`id`, `poster`, `logo`, `logo_2`, `park_name`, `file_name`, `ticket_price`, `timing`, `address`, `add_time`) VALUES
(1, 'atlantis_poster.png', 'atlantis.png', 'park-1.png', 'Atlantis indoor theme park', 'atlantis', '1000', '12pm-11pm', 'R2FP+G8G, Block 9 Clifton, Karachi, Karachi City, Sindh 75600', '2024-07-15 21:35:58'),
(4, 'portgrand_poster.png', 'portgrand.png', 'park-3.png', 'Port Grand Karachi', 'port_grand', '600', '04pm-02am', 'Road،, Port Grand Food St, opposite PNSC Building, West Wharf, Karachi, Karachi City, Sindh, Pakistan', '2024-07-15 21:52:09'),
(5, 'chunkymonkey_poster.png', 'chunkymonkey.png', 'park-2.png', 'Chunky Monkey Amusement Park', 'chunky_monkey', '1500', '04pm-12am', 'B-1, Khayaban e Sahil, Main, Sea View Rd, Defence V Defence Housing Authority, Karachi, Pakistan', '2024-07-16 17:55:55'),
(8, 'sindbads_poster.png', 'sindbads.png', 'park-4.png', 'Sindbads Wonderland', 'sindbad', '500', '04pm-12am', 'ST/G 29, Block 10 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', '2024-07-16 18:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `park_order`
--

CREATE TABLE `park_order` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `park_name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `tickets` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `card_number` varchar(250) NOT NULL,
  `card_pin` varchar(250) NOT NULL,
  `booking_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `park_order`
--

INSERT INTO `park_order` (`id`, `name`, `email`, `park_name`, `price`, `tickets`, `total`, `date`, `card_number`, `card_pin`, `booking_time`) VALUES
(1, 'Wasam', 'wasam88@gmail.com', 'Atlantis indoor theme park', '850', '4', '3400', '2024-07-16', '$2y$10$ToYHIrm0hROnV3E5qKaPwOz/LtCCE3lLz2AZw4IPnpZyGRJFdjsCq', '$2y$10$B9uJzV6UC3yX4KoJQfj1sOHTmanjYyXueGXAYXj7qTa8FJBJDw9CS', '2024-07-16 17:43:10'),
(10, 'ali', 'ali@gmail.coma', 'Port Grand Karachi', '540', '2', '1080', '2024-08-16', '$2y$10$5srbO8FGS5ec2TsPiW/7Vu0FlCKFGxFeO6VS1/jdh2VvARCqGsL46', '$2y$10$AzUnOvczFOt4IFEfgpHV.ung9w7MDh.gXaQ35SESesZXOmTZIu3PW', '2024-08-16 12:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `card_pin` varchar(50) NOT NULL,
  `subscription_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `sname`, `email`, `package`, `price`, `card_no`, `card_pin`, `subscription_time`) VALUES
(8, 'ali', 'ali@gmail.coma', 'Gold Package', 'Rs. 1,499  ', '$2y$10$Bp2VyYYL0sLE/gf5c1MFjOFzyyTLLAsD8WuikbslgXc', '$2y$10$fRrj25QfSdmKq1.NIPsTWulRh6/OmJwm.FOWP0HemZA', '2024-08-16 12:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

CREATE TABLE `theaters` (
  `id` int(11) NOT NULL,
  `logo` varchar(240) NOT NULL,
  `theater_name` varchar(240) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `movie_ticket` varchar(240) NOT NULL,
  `3d_glasses` varchar(240) NOT NULL,
  `theater_addtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`id`, `logo`, `theater_name`, `file_name`, `movie_ticket`, `3d_glasses`, `theater_addtime`) VALUES
(9, 'atrium.png', 'Atrium Cinema', 'atrium', '1000', '300', '2024-07-18 16:48:47'),
(11, 'nueplex.png', 'Nueplex Cinema', 'nueplex', '1200', '550', '2024-07-18 17:08:15'),
(17, 'mega.png', 'Mega Multiplex', 'megamultiplex', '1500', '550', '2024-08-16 12:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `theater_movies`
--

CREATE TABLE `theater_movies` (
  `id` int(11) NOT NULL,
  `theater_name` varchar(250) NOT NULL,
  `movie_banner` varchar(250) NOT NULL,
  `movie_poster` varchar(250) NOT NULL,
  `movie_name` varchar(250) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `run_time` varchar(250) NOT NULL,
  `language` varchar(250) NOT NULL,
  `cast` varchar(250) NOT NULL,
  `date_of_show_1` varchar(250) NOT NULL,
  `first_show_time_of_show_1` varchar(250) NOT NULL,
  `secound_show_time_of_show_1` varchar(250) NOT NULL,
  `date_of_show_2` varchar(250) NOT NULL,
  `first_show_time_of_show_2` varchar(250) NOT NULL,
  `secound_show_time_of_show_2` varchar(250) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theater_movies`
--

INSERT INTO `theater_movies` (`id`, `theater_name`, `movie_banner`, `movie_poster`, `movie_name`, `genre`, `run_time`, `language`, `cast`, `date_of_show_1`, `first_show_time_of_show_1`, `secound_show_time_of_show_1`, `date_of_show_2`, `first_show_time_of_show_2`, `secound_show_time_of_show_2`, `add_time`) VALUES
(7, 'Atrium Cinema', 'Atrium_Deadpool&Wolverine_banner.png', 'Deadpool&Wolverine.jpg', 'Deadpool & Wolverine (2D)', 'Action', '02 hr 07 min', 'English', 'Hugh Jackman, Morena Baccarin, Ryan Reynolds', '2024-07-26', '06:30pm', '11:30pm', '2024-07-27', '07:15pm', '10:45pm', '2024-07-18 16:58:33'),
(10, 'Atrium Cinema', 'Atrium_CreationftGIKoSURDU_banner.png', 'CreationftGIKoSURDU.jpg', 'Creation of the Gods I: KOS (2D)', 'Adventure ', '02 hr 28 min', 'Urdu Dubbed', 'Huang Bo, Kris Phillips, Xuejian Li', '2024-07-28', '01:00pm', '03:15pm', '2024-07-29', '01:15pm', '03:45pm', '2024-07-18 19:16:03'),
(11, 'Nueplex Cinema', 'nueplex_CreationftGIKoSURDU_banner.png', 'CreationftGIKoSURDU.jpg', 'Creation of the Gods I: KOS (2D)', 'Adventure ', '02 hr 28 min', 'Urdu Dubbed', 'Huang Bo, Kris Phillips, Xuejian Li', '2024-07-28', '01:00pm', '03:15pm', '2024-07-29', '01:15pm', '03:45pm', '2024-07-18 19:19:32'),
(13, 'Atrium Cinema', 'Atrium_DolphinBoy_banner.png', 'DolphinBoy.jpg', 'Dolphin Boy (2D)', 'Animation ', '01 hr 25 min', 'English', 'Polina Avdeyenko, Aleksandr Fenin, Vasilisa Ruchimskaya', '2024-08-01', '06:00pm', '11:15pm', '2024-08-02', '05:15pm', '11:30pm', '2024-07-18 20:14:40'),
(14, 'Nueplex Cinema', 'nueplex_DolphinBoy_banner.png', 'DolphinBoy.jpg', 'Dolphin Boy (2D)', 'Animation ', '01 hr 25 min', 'English', 'Polina Avdeyenko, Aleksandr Fenin, Vasilisa Ruchimskaya', '2024-08-01', '06:00pm', '11:15pm', '2024-08-02', '05:15pm', '11:30pm', '2024-07-18 20:18:11'),
(16, 'Atrium Cinema', 'atrium_HaroldATPC_banner.png', 'HaroldATPC.jpg', 'Harold and the Purple Crayon (2D)', 'Adventure ', '01 hr 32 min', 'English', 'Zachary Levi, Lil Rel Howery, Benjamin Bottani', '2024-08-03', '06:00pm', '11:15pm', '2024-08-04', '05:15pm', '11:30pm', '2024-07-19 14:02:22'),
(17, 'Atrium Cinema', 'atrium_TheGlassworker_banner.png', 'TheGlassworker.jpg', 'The Glassworker (2D)', 'Animation ', '01 hr 38 min', 'Urdu', 'Art Malik, Sacha Dhawan, Anjli Mohindra', '2024-08-05', '06:00pm', '11:15pm', '2024-08-06', '05:15pm', '11:30pm', '2024-07-19 15:03:54'),
(18, 'Atrium Cinema', 'atrium_Twisters_banner.png', 'Twisters.jpg', 'Twister', 'Action, Adventure, Thriller', '01hr 57m', 'English', 'Daisy Edgar-Jones · Kate Carter ; Glen Powell · Tyler Owens ; Anthony Ramos · Javi ;', '2024-08-08', '06:00pm', '11:15pm', '2024-08-09', '05:15pm', '11:30pm', '2024-07-19 15:11:51'),
(19, 'Nueplex Cinema', 'nueplex_Twisters_banner.png', 'Twisters.jpg', 'Twister', 'Action, Adventure, Thriller', '01hr 57m', 'English', 'Daisy Edgar-Jones · Kate Carter ; Glen Powell · Tyler Owens ; Anthony Ramos · Javi ;', '2024-08-06', '06:00pm', '11:15pm', '2024-08-07', '05:15pm', '11:30pm', '2024-07-19 15:13:21'),
(25, 'Mega Multiplex', 'MegaMultiplex_Deadpool&Wolverine_banner.png', 'Deadpool&Wolverine.jpg', 'Deadpool & Wolverine (2D)', 'Action', '02 hr 07 min', 'English', 'Hugh Jackman, Morena Baccarin, Ryan Reynolds', '2024-08-16', '06:00pm', '11:15pm', '2024-08-17', '05:15pm', '11:30pm', '2024-08-16 12:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `joindate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `joindate`) VALUES
(2, 'nabeel ahmed', 'nabeel098@gmail.com', 'nabeel', '2024-07-08 16:47:50'),
(3, 'moiz', 'moiz66@gmail.com', 'moizraza', '2024-07-08 16:48:04'),
(5, 'ashhad gujjar', 'ashhad88@gmail.com', '54321', '2024-07-08 16:48:40'),
(6, 'arham', 'arhamgujjar@gmail.com', '09876', '2024-07-08 16:48:56'),
(7, 'yaseen', 'yaseenkhan666@gmail.com', 'yaseen', '2024-07-08 16:49:09'),
(8, 'zeeshan khan', 'zeeshankhan99@gmail.com', '9988', '2024-07-08 16:49:19'),
(9, 'abrar ahmed', 'ahmedabrar09@hotmail.com', 'abrar897', '2024-07-08 16:49:33'),
(10, 'abeer ahmed', 'abeerahmed33@yahoo.com', 'ahmed', '2024-07-08 16:49:47'),
(11, 'Anas Khan Lodhi', 'lodhikhan998@gmail.com', 'anaskhan', '2024-07-08 16:50:02'),
(12, 'Wasam', 'wasam88@gmail.com', '123', '2024-07-08 16:54:12'),
(14, 'Aryan', 'aryan676@gmail.com', '321', '2024-07-24 15:07:50'),
(15, 'ali', 'ali@gmail.coma', 'ali', '2024-08-16 12:46:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cricket`
--
ALTER TABLE `cricket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cricket_order`
--
ALTER TABLE `cricket_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_order`
--
ALTER TABLE `event_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_order`
--
ALTER TABLE `movie_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parks`
--
ALTER TABLE `parks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `park_order`
--
ALTER TABLE `park_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater_movies`
--
ALTER TABLE `theater_movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cricket`
--
ALTER TABLE `cricket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cricket_order`
--
ALTER TABLE `cricket_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `event_order`
--
ALTER TABLE `event_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `movie_order`
--
ALTER TABLE `movie_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parks`
--
ALTER TABLE `parks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `park_order`
--
ALTER TABLE `park_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `theater_movies`
--
ALTER TABLE `theater_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
