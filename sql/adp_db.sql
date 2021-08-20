-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 12:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `admin_auth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `full_name`, `admin_auth`) VALUES
(1, 'AlorDishariAdmin', 'c182761508f443d4303ea49b7dd23266', 'Admin', 'cbe1e4cacffeeb28aa5d4f51a0e01e3e');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_writer` varchar(255) NOT NULL,
  `book_img` text NOT NULL,
  `book_price` int(11) NOT NULL,
  `book_sale_price` int(11) NOT NULL DEFAULT 0,
  `book_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_writer`, `book_img`, `book_price`, `book_sale_price`, `book_type`) VALUES
(1, 'হাতের লেখার অনুশীলন', 'মো: রুহুল আমিন রানা', 'hater%20likhajpg.jpg', 200, 0, 'subject'),
(2, 'শ্রেষ্ঠ মানুষ গড়ার বানী 1', 'ড. মো. নুরুল্লাহ', 'shresto%20manus%20gorar%20bani%201.jpg', 175, 150, 'subject'),
(3, 'শ্রেষ্ঠ মানুষ গড়ার বানী 2', 'ড. মো. নুরুল্লাহ', 'shresto%20manus%20gorar%20bani%202.jpg', 175, 150, 'subject');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL DEFAULT '1',
  `price` varchar(50) NOT NULL,
  `total_taka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_img` text NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_discription` text NOT NULL,
  `news_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_img`, `news_title`, `news_discription`, `news_date`) VALUES
(1, 'post1.jpg', '৩ টি বইয়ের মোড়ক উন্মোচন…', '৩ টি বইয়ের মোড়ক উন্মোচন…..\r\n                            · শ্রেষ্ঠ মানুষ গড়ার বাণী-১ ( ড. নূরুল্লাহ আল মাদানী )\r\n                            · শ্রেষ্ঠ মানুষ গড়ার বাণী-২ ( ড. নূরুল্লাহ আল মাদানী )\r\n                            · সুন্দর ও দ্রুত হাতের লেখার অনুশীলন\r\n                            [ বাংলা, ইংরেজি, আরবি ও গণিত একত্রে]\r\n                            (সম্পাদনায় : ড.নূরুল্লাহ আল মাদানী)\r\n                            আলোর দিশারী পাবলিকেশন্স হতে সদ্য প্রকাশিত........\r\n                            আলহামদুলিল্লাহ।। বইগুলির মোড়ক উন্মোচন করলেন হাজারো আলেমের শ্রদ্ধাভাজন ওস্তাজ তা‘মীরুল মিল্লাত ট্রাস্ট সেক্টেটারি, ফাজিলাতুজ শায়েখ অধ্যক্ষ মাওলানা যাইনুল আবেদীন হুজুরসহ তা\'মীরুল মিল্লাত মাদরাসার উপস্থিত শ্রদ্ধেয় ওস্তাজ মহোদয়বৃন্দ…..\r\n                            আপনার নিকট বইগুলো পৌছানোর দায়িত্ব আমাদের।\r\n                            +৮৮০১৯৭৪ ০৫ ৭৩ ৮৩', 'January 8, 2021'),
(2, 'post2.jpg', 'মোড়ক উন্মোচন হয়ে গেল…', 'মোড়ক উন্মোচন হয়ে গেল….. আলহামদুলিল্লাহ\r\n                            · সুন্দর ও দ্রুত হাতের লেখার অনুশীলন\r\n                            [ বাংলা, ইংরেজি, আরবি ও গণিত একত্রে]\r\n                            লেখক : রুহুল আমিন রানা\r\n                            সম্পাদনায় : ড.নূরুল্লাহ আল মাদানী\r\n                            প্রকাশনায় : আলোর দিশারী পাবলিকেশন্স।\r\n                            সদ্য প্রকাশিত........ বইটির মোড়ক উন্মোচন করলেন\r\n                            তা\'মীরুল মিল্লাত কামিল মাদরাসা টংগী ক্যাম্পাসের কেন্দ্রীয় ছাত্র সংসদ (টাকসু) র সন্মানিত ভিপি খায়রুল আনাম সহ ছাত্র সংসদের বিভিন্ন পর্যায়ের দায়িত্বশীল বৃন্দ …..\r\n                            আপনার নিকট বইটি পৌছানোর দায়িত্ব আমাদের।\r\n                            +৮৮০১৯৭৪ ০৫ ৭৩ ৮৩', 'January 8, 2021'),
(3, 'post3.jpg', 'মুহতারাম অধ্যক্ষ মুহাম্মদ মু\'তাছিম বিল্লাহ মাক্', '৩ টি বইয়ের মোড়ক উন্মোচন…..\r\n\r\n· শ্রেষ্ঠ মানুষ গড়ার বাণী-১ ( ড. নূরুল্লাহ আল মাদানী )\r\n\r\n· শ্রেষ্ঠ মানুষ গড়ার বাণী-২ ( ড. নূরুল্লাহ আল মাদানী )\r\n\r\n· সুন্দর ও দ্রুত হাতের লেখার অনুশীলন [ বাংলা, ইংরেজি, আরবি ও গণিত একত্রে] (সম্পাদনায় : ড.নূরুল্লাহ আল মাদানী)\r\n\r\nআলোর দিশারী পাবলিকেশন্স হতে সদ্য প্রকাশিত........ আলহামদুলিল্লাহ।।\r\n\r\nবইগুলির মোড়ক উন্মোচন করলেন হাজারো আলেমের শ্রদ্ধাভাজন ওস্তাজ তা‘মীরুল মিল্লাত ট্রাস্ট সেক্টেটারি, ফাজিলাতুজ শায়েখ অধ্যক্ষ মাওলানা যাইনুল আবেদীন হুজুরসহ তা\'মীরুল মিল্লাত মাদরাসার উপস্থিত শ্রদ্ধেয় ওস্তাজ মহোদয়বৃন্দ…..\r\n\r\n\r\n\r\nআপনার নিকট বইগুলো পৌছানোর দায়িত্ব আমাদের। +৮৮০১৯৭৪ ০৫ ৭৩ ৮৩', 'January 8, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `bkashNumber` varchar(12) NOT NULL,
  `trx` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `order_status` varchar(10) NOT NULL DEFAULT 'pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `book_id`, `book_img`, `book_name`, `quantity`, `total_price`, `bkashNumber`, `trx`, `transport`, `order_status`, `date`) VALUES
('700466111189', 1, 1, '', 'হাতের লেখার অনুশীলন', 4, 800, '01849945080', 'eeeeeeeeeescsd', 'Sundarban Express Transportation System Ltd.', 'pending', '2021-01-27 23:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `usrauthToken` varchar(255) NOT NULL,
  `otp` int(8) NOT NULL,
  `usr_img` varchar(255) NOT NULL,
  `email_addr` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `usr_pwd` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `addr1` text NOT NULL,
  `Region` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Area` varchar(255) NOT NULL,
  `transport` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(11) NOT NULL DEFAULT 'Male'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `usrauthToken`, `otp`, `usr_img`, `email_addr`, `full_name`, `usr_pwd`, `mobile`, `addr1`, `Region`, `City`, `Area`, `transport`, `birthday`, `gender`) VALUES
(1, 'd1b7cb396d11138ba7769e94a7964894', 0, '', 'ahasanraihan1998@gmail.com', 'ERS Studio', '', 1849945080, 'Baladil Amin Abason,Uttar Auchpara,Tamirul Millat Road,Tongi, Gazipur City.', 'Dhaka', 'Gazipur', 'Tongi', 'Sundarban Express Transportation System Ltd.', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
