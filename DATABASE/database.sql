CREATE DATABASE IF NOT EXISTS smartbook;

USE smartbook;


-- =====================================================
-- 1. PROFILES TABLE
-- =====================================================

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `interests` text DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);

-- =====================================================
-- 2. POSTS TABLE
-- =====================================================

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(40) NOT NULL,
  `view` int(11) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `approval` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- =====================================================
-- 3. COMMENTS TABLE
-- =====================================================

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unread` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


-- =====================================================
-- 4. NOTIFICATIONS TABLE
-- =====================================================

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unread` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


-- =====================================================
-- 5. SUPPORT / HELP CENTER TABLE
-- =====================================================

CREATE TABLE `support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);


-- =====================================================
-- 6. WITHDRAWAL REQUEST TABLE
-- =====================================================

CREATE TABLE `withdrawal_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `method` varchar(10) NOT NULL,
  `upi_id` varchar(50) DEFAULT NULL,
  `account_holder` varchar(100) DEFAULT NULL,
  `bank_name` varchar(30) DEFAULT NULL,
  `account_number` varchar(30) DEFAULT NULL,
  `ifsc` varchar(20) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);