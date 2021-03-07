-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 04:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inursing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(18) NOT NULL,
  `type` varchar(500) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `type`, `title`, `created_at`, `updated_at`, `modified_at`, `status`) VALUES
(1, 1, 'Original Research', 'Sample Title 2', '2021-03-01 19:30:42', '2021-03-01 13:17:58', '2021-03-01 19:30:42', 0),
(2, 1, 'Original Research', 'Sample', '2021-03-01 23:10:18', '2021-03-01 15:11:44', '2021-03-01 23:10:18', 0),
(3, 1, 'Original Research', 'Sample', '2021-03-01 23:17:27', '2021-03-01 15:19:03', '2021-03-01 23:17:27', 0),
(4, 1, 'Original Research', 'Sample', '2021-03-01 23:23:09', '2021-03-01 15:23:57', '2021-03-01 23:23:09', 0),
(5, 1, 'Original Research', 'Sample', '2021-03-01 23:26:40', '2021-03-01 15:37:28', '2021-03-01 23:26:40', 0),
(6, 1, 'Original Research', 'sample', '2021-03-02 00:05:55', '2021-03-01 16:11:06', '2021-03-02 00:05:55', 0),
(7, 1, 'Original Research', NULL, '2021-03-04 14:54:01', '2021-03-04 14:54:01', '2021-03-04 14:54:01', 0),
(8, 1, 'Original Research', NULL, '2021-03-04 15:34:41', '2021-03-04 15:34:41', '2021-03-04 15:34:41', 0),
(9, 1, 'Original Research', NULL, '2021-03-04 23:18:10', '2021-03-04 23:18:10', '2021-03-04 23:18:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `article_details`
--

CREATE TABLE `article_details` (
  `id` int(11) NOT NULL,
  `article_id` int(18) NOT NULL,
  `title` varchar(500) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `item_page` varchar(250) NOT NULL,
  `article_desc` varchar(500) NOT NULL,
  `file` longtext NOT NULL,
  `file_size` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_details`
--

INSERT INTO `article_details` (`id`, `article_id`, `title`, `file_name`, `item_page`, `article_desc`, `file`, `file_size`, `created_at`, `updated_at`) VALUES
(8, 1, 'Sample', 'Settlement of a Light Pier', 'Sample', 'Sample', '/storage/docs\\Settlement of a Light Pier.PDF', '331628', '2021-03-01 20:42:42', '2021-03-01 20:42:42'),
(9, 1, 'SampleSample', 'Manila', 'Sample', 'Sample', '/storage/docs\\Manila.pdf', '595338', '2021-03-01 20:43:20', '2021-03-01 20:43:20'),
(10, 2, 'Sample', 'Significance of the Ratio of Tensile Strength to Yield Stress', 'Sample', 'Sample', '/storage/docs\\Significance of the Ratio of Tensile Strength to Yield Stress.PDF', '87231', '2021-03-01 23:11:07', '2021-03-01 23:11:07'),
(11, 3, 'Sample', 'Soil Mechanics', 'Sample', 'Sample', '/storage/docs\\Soil Mechanics.pdf', '1932313', '2021-03-01 23:18:36', '2021-03-01 23:18:36'),
(12, 4, 'Sample', 'Soil Mechanics', 'Sample', 'Sample', '/storage/docs\\Soil Mechanics.pdf', '1932313', '2021-03-01 23:23:36', '2021-03-01 23:23:36'),
(13, 5, 'Sample', 'Slope Stability2 CAR PRESENTATION', 'Sample', 'Sample', '/storage/docs\\Slope Stability2 CAR PRESENTATION.pdf', '12917347', '2021-03-01 23:27:02', '2021-03-01 23:27:02'),
(14, 6, 'Sample', 'Significance of Tests on Fresh & Hardened Concrete', 'Sample', 'Sample', '/storage/docs\\Significance of Tests on Fresh & Hardened Concrete.pdf', '1067528', '2021-03-02 00:08:14', '2021-03-02 00:08:14'),
(15, 6, 'Sample 2', 'Significance of the Ratio of Tensile Strength to Yield Stress', 'Sample 2', 'Sample 2', '/storage/docs\\Significance of the Ratio of Tensile Strength to Yield Stress.PDF', '87231', '2021-03-02 00:09:05', '2021-03-02 00:09:05'),
(16, 8, 'Sample', 'SPACE2014-EMILIO M. MORALES', 'Lorem Ipsum', 'sample', '/storage/docs\\SPACE2014-EMILIO M. MORALES.pdf', '1126420', '2021-03-04 15:46:37', '2021-03-04 15:46:37'),
(17, 9, 'Sample', 'State of Practice in Soil Liquefaction Mitigation', 'Lorem Ipsum', 'Sample', '/storage/docs\\State of Practice in Soil Liquefaction Mitigation.pdf', '975211', '2021-03-04 23:20:05', '2021-03-04 23:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `article_submissions`
--

CREATE TABLE `article_submissions` (
  `id` int(18) NOT NULL,
  `ref_id` varchar(500) NOT NULL,
  `user_id` int(18) NOT NULL,
  `article_id` int(18) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_submissions`
--

INSERT INTO `article_submissions` (`id`, `ref_id`, `user_id`, `article_id`, `status`) VALUES
(1, 'REF-20210301R0001', 1, 1, 0),
(2, 'REF-20210301R0002', 1, 2, 0),
(3, 'REF-20210301R0003', 1, 3, 0),
(4, 'REF-20210301R0004', 1, 4, 0),
(5, 'REF-20210301R0004', 1, 4, 0),
(6, 'REF-20210301R0005', 1, 5, 0),
(7, 'REF-20210302R0006', 1, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(18) NOT NULL,
  `article_id` int(18) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `pnumber` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `academic_qualification` varchar(500) NOT NULL,
  `bachelor_degree` varchar(500) NOT NULL DEFAULT 'NO',
  `cv` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `article_id`, `fname`, `lname`, `email`, `pnumber`, `address`, `country`, `academic_qualification`, `bachelor_degree`, `cv`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aeron', 'Isog', 'aisog.javier@gmail.com', '09666742052', 'Phase 4 Pkg 4 Blk 29 Lot 11 Bagong Silang Caloocan City', 'Philippines', 'Lorem ipsum', 'BSCS', '/storage/docs\\Resume.pdf', '2021-03-01 19:33:59', '2021-03-01 19:33:59'),
(2, 2, 'Sample', 'Sample', 'Sample@gmail.com', '09999999999', 'Sample Address', 'Philippines', 'Lorem ipsum', 'Sample', '/storage/docs\\Post Landslide Investigation.PDF', '2021-03-01 23:10:54', '2021-03-01 23:10:54'),
(3, 3, 'Sample', 'Sample', 'Sample@gmail.com', '09999999999', 'Sample Address', 'Afghanistan', 'Lorem ipsum', 'Sample', '/storage/docs\\Soil Mechanics Principles Applied to Earthworks.pdf', '2021-03-01 23:18:22', '2021-03-01 23:18:22'),
(4, 4, 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Algeria', 'Lorem ipsum', 'Sample', '/storage/docs\\Post Landslide Investigation.PDF', '2021-03-01 23:23:25', '2021-03-01 23:23:25'),
(5, 5, 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Bangladesh', 'Lorem ipsum', 'Sample', '/storage/docs\\Slope Stability2 CAR PRESENTATION.pdf', '2021-03-01 23:26:52', '2021-03-01 23:26:52'),
(6, 6, 'Sample', 'Sample', 'sample', 'sample', 'sample', 'Philippines', 'Lorem ipsum', 'sample', '/storage/docs\\Slope Stability2 CAR PRESENTATION.pdf', '2021-03-02 00:07:21', '2021-03-02 00:07:21'),
(7, 8, 'Sample', 'Sample', 'Sample', '09999999999', 'Sample', 'Aruba', 'Lorem ipsum', 'N/A', '/storage/docs\\Rehabilitation of a Fire Damaged Building.PDF', '2021-03-04 15:36:38', '2021-03-04 15:36:38'),
(8, 9, 'Sample', 'Sample', 'Sample', '09999999999', 'Sample', 'Philippines', 'Bachelor\'s Degree', 'BSCS', '/storage/docs\\Slope Stability2 CAR PRESENTATION.pdf', '2021-03-04 23:19:40', '2021-03-04 23:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `copyrights`
--

CREATE TABLE `copyrights` (
  `id` int(18) NOT NULL,
  `article_id` int(18) NOT NULL,
  `question1` varchar(500) NOT NULL DEFAULT 'N/A',
  `question2` int(11) DEFAULT 0,
  `question3` varchar(500) NOT NULL DEFAULT 'N/A',
  `question3_1` varchar(500) NOT NULL DEFAULT 'N/A',
  `question4` varchar(500) NOT NULL DEFAULT 'N/A',
  `question4_1` varchar(500) NOT NULL DEFAULT 'N/A',
  `question5` varchar(500) NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `copyrights`
--

INSERT INTO `copyrights` (`id`, `article_id`, `question1`, `question2`, `question3`, `question3_1`, `question4`, `question4_1`, `question5`, `created_at`, `updated_at`) VALUES
(1, 1, 'YES', 4000, 'NO', 'Sample', 'YES', 'Sample', 'NO', '2021-03-01 19:40:45', '2021-03-01 12:43:48'),
(2, 2, 'YES', 400, 'YES', 'Sample', 'YES', 'Sample', 'YES', '2021-03-01 23:11:27', '2021-03-01 23:11:27'),
(3, 3, 'YES', 400, 'YES', 'Sample', 'YES', 'Sample', 'YES', '2021-03-01 23:18:53', '2021-03-01 23:18:53'),
(4, 4, 'YES', 400, 'YES', 'Sample', 'YES', 'Sample', 'YES', '2021-03-01 23:23:50', '2021-03-01 23:23:50'),
(5, 5, 'YES', 4000, 'NO', 'Sample', 'YES', 'Sample', 'NO', '2021-03-01 23:37:19', '2021-03-01 23:37:19'),
(6, 6, 'YES', 400, 'YES', 'sample', 'YES', 'sample', 'NO', '2021-03-02 00:10:26', '2021-03-02 00:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `co_authors`
--

CREATE TABLE `co_authors` (
  `id` int(18) NOT NULL,
  `ca_id` int(18) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `pnumber` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `academic_qualification` varchar(500) NOT NULL,
  `bachelor_degree` varchar(500) DEFAULT 'NO',
  `cv` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_authors`
--

INSERT INTO `co_authors` (`id`, `ca_id`, `fname`, `lname`, `email`, `pnumber`, `address`, `country`, `academic_qualification`, `bachelor_degree`, `cv`, `created_at`, `updated_at`) VALUES
(1, 3, 'Sample2', 'Sample2', 'Sample2@gmail.com', '09999999999', 'Sample2 Address', 'Austria', 'Lorem ipsum', 'Sample2', '/storage/docs\\State of Practice in Soil Liquefaction Mitigation.pdf', '2021-03-01 23:18:22', '2021-03-01 23:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aeron@gmail.com', '$2y$10$r.LE5.gUrYxneFsXBNfwjORPVfEc.iYxigqiZL/gpE6Ff918YO4Eu', '2021-02-28 16:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aeron', 'Isog', 0, 'aeron@gmail.com', NULL, '$2y$10$2J4eKZ.PKUJckojjIaNcpOclc1JROdaPlaZ27JaUqDshq/t0kczqe', NULL, '2021-02-28 16:50:13', '2021-02-28 16:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_details`
--
ALTER TABLE `article_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_submissions`
--
ALTER TABLE `article_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copyrights`
--
ALTER TABLE `copyrights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_authors`
--
ALTER TABLE `co_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `article_details`
--
ALTER TABLE `article_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `article_submissions`
--
ALTER TABLE `article_submissions`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `copyrights`
--
ALTER TABLE `copyrights`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `co_authors`
--
ALTER TABLE `co_authors`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
