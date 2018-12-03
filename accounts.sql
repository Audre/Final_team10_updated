-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 10:45 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `weight` double NOT NULL,
  `unitsInStorage` int(11) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `price`, `weight`, `unitsInStorage`, `dimension`, `description`, `imagePath`, `thumbnail`, `category`) VALUES
(1, 'Canon - EOS R Mirrorless Camera with RF 24-105 mm f/4L IS USM Lens', 5, 2, 20, '20', 'A full-frame 30.3 Megapixel sensor with impressive detail, ISO performance and Dual Pixel CMOS AF. Alongside the RF lenses, EOS R offers the ultimate shooting experience to take your storytelling further.\r\n', 'canon_camera.jpg', 'canon_camera_thumbnail.jpg', 'camera'),
(2, 'Targus - 67\" Monopod - Black\r\n', 2, 1, 10, '3', 'Steady your camera, GoPro or smartphone as you move around with this Targus monopod. It extends up to 67 inches and quickly folds to a compact 21 inches thanks to its quick-release leg locks. This Targus monopod has a rubber foot pad and ground spike for easier stabilization on a variety of surfaces.', 'targus_tripod.jpg', 'targus_tripod_thumbnail.jpg', 'tripod'),
(3, 'Canon - EF 24-70 mm f/2.8L III USM Standard Zoom Lens - Black', 3, 1, 10, '5 x 10', 'Built to handle the demands of professional use, this lens is durable as well as dust- and water-resistant. Fluorine coatings on the front and rear surfaces keep smudges and fingerprints to a minimum.', 'canon_lens.jpg', 'canon_lens_thumbnail.jpg', 'lens'),
(4, 'Hoya - EVO 82 mm Antistatic UV Lens Filter\r\n', 2, 1, 10, '10 x 2', 'With 16 layers of multicoating, including an antistatic top layer, this Hoya EVO XEVA-82UV 82mm lens filter delivers a durable design that resists dust, water, stains, scratches and smudges. The UV properties help you capture clear, haze-free images.', 'hoya_filter.jpg', 'hoya_filter_thumbnail.jpg', 'filter'),
(5, 'SanDisk - Extreme Pro 64 GB SDXC UHS-I Memory Card', 1, 1, 20, '5 x 10', 'This SanDisk Extreme Pro SDSDXP-064G-A46 64GB SDXC UHS-I memory card features Power Core technology to support real-time, full high-definition 3D video and continuous burst mode with more shots saved.', 'sandisk_memory_card.jpg', 'sandisk_memory_card_thumbnail.jpg', 'memory card');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giftcard_balance` int(11) NOT NULL DEFAULT '500',
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
