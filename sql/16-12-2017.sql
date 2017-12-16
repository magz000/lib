-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 12:28 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE IF NOT EXISTS `avatars` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Bear', 'bear.png', '2017-12-15 16:00:00', '2017-12-15 16:00:00'),
(2, 'Carrot', 'carrot.png', '2017-12-15 16:00:00', '2017-12-15 16:00:00'),
(3, 'Cherry', 'cherry.png', '2017-12-15 16:00:00', '2017-12-15 16:00:00'),
(4, 'Chick', 'chick.png', '2017-12-15 16:00:00', '2017-12-15 16:00:00'),
(5, 'Lemon', 'lemon.png', '2017-12-15 16:00:00', '2017-12-15 16:00:00'),
(6, 'Orange', 'orange.png', '2017-12-15 16:00:00', '2017-12-15 16:00:00'),
(7, 'Panda', 'panda.png', '2017-12-15 16:00:00', '2017-12-15 16:00:00'),
(8, 'Piggy', 'piggy.png', '2017-12-15 16:00:00', '2017-12-15 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groupchats`
--

CREATE TABLE IF NOT EXISTS `groupchats` (
`id` int(10) unsigned NOT NULL,
  `store_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groupchats`
--

INSERT INTO `groupchats` (`id`, `store_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 15, 3, '2017-12-15 17:51:11', '2017-12-15 22:02:11'),
(2, 17, 18, 1, '2017-12-15 18:01:36', '2017-12-15 21:40:00'),
(3, 17, 15, 3, '2017-12-15 22:02:15', '2017-12-16 03:20:43'),
(4, 17, 15, 1, '2017-12-16 03:22:37', '2017-12-16 03:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_12_12_064106_create_stores_table', 2),
('2017_12_16_015006_create_groupchats_table', 3),
('2017_12_16_084140_create_avatars_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(4, 'Art In Island', '405 15th Ave, Cubao, Quezon City, 1109 Metro Manila, Philippines', 14.622786802672326, 121.0580062866211, '2017-12-12 20:37:07', '2017-12-12 20:37:07'),
(5, 'Circle', '10 Matalino St, Diliman, Quezon City, 1100 Metro Manila, Philippines', 14.644378879258161, 121.04856491088867, '2017-12-12 20:51:13', '2017-12-12 20:51:13'),
(6, 'Daang Bakal', '380 Daang Bakal, Marikina, 1800 Metro Manila, Philippines', 14.639396280953365, 121.09800338745117, '2017-12-12 21:57:54', '2017-12-12 21:57:54'),
(7, 'San Jose', '9 San Jose, Quezon City, Metro Manila, Philippines', 14.648032712724655, 121.01320266723633, '2017-12-12 21:58:05', '2017-12-12 21:58:05'),
(8, 'Aquamarine', '48 Aquamarine St, Marikina, 1800 Metro Manila, Philippines', 14.638731925960037, 121.1158561706543, '2017-12-12 21:58:21', '2017-12-12 21:58:21'),
(9, 'Aurora', '704 Aurora Blvd, Quezon City, 1112 Metro Manila, Philippines', 14.614813806767637, 121.0360336303711, '2017-12-12 21:59:01', '2017-12-12 21:59:01'),
(10, 'Soliven', 'Hon. B. Soliven Ave, Antipolo, 1800 Rizal, Philippines', 14.63441356946147, 121.1213493347168, '2017-12-13 01:02:00', '2017-12-13 01:02:00'),
(11, 'Frost', '16-22 Frost, Cainta, Rizal, Philippines', 14.615146020707584, 121.11894607543945, '2017-12-13 01:02:22', '2017-12-13 01:02:22'),
(12, 'Aguinaldo', 'Aguinaldo St, Cainta, Rizal, Philippines', 14.615146020707584, 121.12443923950195, '2017-12-13 01:02:58', '2017-12-13 01:02:58'),
(13, 'Fordham', '43 Fordham, Quezon City, 1110 Metro Manila, Philippines', 14.609830537400116, 121.07122421264648, '2017-12-13 01:03:39', '2017-12-13 01:03:39'),
(14, 'Queensville', '142 A. Bonifacio Ave, Marikina, 1803 Metro Manila, Philippines', 14.632420453180197, 121.08409881591797, '2017-12-13 01:06:11', '2017-12-13 19:22:08'),
(15, 'Emilio Jacinto', 'Emilio Jacinto Street, Diliman, Quezon City, Metro Manila, Philippines', 14.652350801029055, 121.06161117553711, '2017-12-13 01:07:53', '2017-12-13 01:07:53'),
(16, 'Katipunan', '1040 Katipunan Ave, Quezon City, 1108 Metro Manila, Philippines', 14.631839124188218, 121.07409954071045, '2017-12-14 22:27:58', '2017-12-14 22:27:58'),
(17, 'San Juan', '8 Aurora Blvd, San Juan, 1500 Metro Manila, Philippines', 14.609093419213655, 121.02237716317177, '2017-12-15 16:51:31', '2017-12-15 16:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) DEFAULT NULL,
  `store_id` int(10) DEFAULT NULL,
  `avatar_id` int(10) DEFAULT NULL,
  `skills` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `looking_for` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `store_id`, `avatar_id`, `skills`, `looking_for`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sherwin', 'sherwin.lorico@gmail.com', '$2y$10$MUhHLyxAZrXwDkdK.RQiy.HHYLIc0dPG4pQHvcD3L1IMzpmzjq8eu', 1, NULL, NULL, NULL, NULL, 'SmsyLIFu6U8MM4mGMxH5RcXKEJvIXLAsmnI2R1yBOiqJxDfnYt3A7LARMJvw', '2017-12-06 18:19:08', '2017-12-14 19:37:35'),
(2, 'Francis', 'asdasd@gmail.com', '$2y$10$6dXOJvYyerN3DZ5f0WmWN.y.sJZpvzKZtcD2Dk4GvJvmMEEuDidQy', 2, 5, NULL, NULL, NULL, 'LHDl1zaazA8P4wtOeQUDkkEzqEYzBNNZmVFP6lblcz88iFDSSH1p5rRnOgkO', '2017-12-06 22:45:56', '2017-12-14 18:37:38'),
(3, 'Lorico', 'asd@gmail.com', '$2y$10$M5V4VSjxhVJJ4OZUMScYy.2Xw2Ew.1PCFj1fEujvJLJfuAFfisDfW', 2, 4, NULL, NULL, NULL, 'ovQLkXzAu6jlovO3P3Zsb9dYVFvVInzWfbktwruzQE9XaCdwL2vsAx4Wv1Au', '2017-12-06 23:19:24', '2017-12-06 23:38:48'),
(4, 'test', 'test@test.com', '$2y$10$iaCZTThLC3bA5OkYtAIZG.xWjNboT/G6K4pgwmxFrKhoe8V6ZYlzy', 3, NULL, NULL, NULL, NULL, 'FqQYekXYnqLDLhfe6mSB5YMh1NMSe7RLQGrBFgZ2AY5t7gBuYI04ORUyBmZV', '2017-12-07 01:36:52', '2017-12-14 18:53:32'),
(6, 'Poncio Pilato', 'poncio@gmail.com', '$2y$10$aY8IhhVHntm9fxRyN5aZDO54mBO1lw04dCAdxqJZx8DCUYo/WeVoW', 2, 4, NULL, NULL, NULL, 'ukeSJEtbm7o4P6IFwh0d9AM2GwM9K2AVg9Aor4gNMeid7dWaa9FjW7lcoUS3', '2017-12-14 01:01:21', '2017-12-14 19:42:10'),
(15, 'Juan Dela Cruz', 'client@gmail.com', '$2y$10$DlD3EM2VlOgY0Ra7VI.Ai.i8jTF4jG5NvziEckwZQ/LSZgl/AEuDO', 3, NULL, 6, 'aasdasd', 'Test 2', 'mL4EzSwvqOjCeNBUz29aJYsACiNWJC1vZiBE8h9kX6Q6rJwFplrlBQJnHsOH', '2017-12-14 19:43:36', '2017-12-16 03:20:25'),
(16, 'Admin', 'admin@gmail.com', '$2y$10$k0bnRQ1qeupqUSHd4edRKOytjsnm/oMQUzvOMoQDWdW7z4SioQf26', 1, NULL, NULL, NULL, NULL, 'kPgAIF0YBsJeEV8cjepVXQsNUjP0qPNVR1mbxge8b0Ua45FHTiMa90oE1uFZ', '2017-12-14 22:26:29', '2017-12-16 01:23:17'),
(17, 'Maria Clara', 'sanjuan@gmail.com', '$2y$10$kKImNk0NTouhYEX/dxrqy.pcUmzfBI3YMrzF56tgbHcSA941YUmqy', 2, 17, NULL, NULL, NULL, '95aKiJu8qqBs3gIJ5GF4jl5QRhWm60kzQoLrdsJtHynA31DZTbhjpisrOonY', '2017-12-15 16:58:14', '2017-12-15 16:59:39'),
(18, 'Crisostomo Ibarra', 'client2@gmail.com', '$2y$10$mbjVWiX2hAo55YB6qXBTj.jqqF0bsc5fzeqmOZiT8pFSiLrP2sDFi', 3, NULL, 7, NULL, NULL, NULL, '2017-12-15 18:01:10', '2017-12-15 18:01:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupchats`
--
ALTER TABLE `groupchats`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `groupchats`
--
ALTER TABLE `groupchats`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
