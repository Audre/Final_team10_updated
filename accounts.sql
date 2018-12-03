-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 09:22 PM
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderDetailID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderDetailID`, `orderID`, `userID`, `productID`, `quantity`, `price`, `date`) VALUES
(1, 1, 1, 6, 2, 8, 2003),
(2, 1, 1, 8, 2, 6, 2003),
(3, 2, 1, 6, 2, 8, 2003),
(4, 2, 1, 8, 2, 6, 2003),
(5, 3, 10, 10, 3, 18, 2003),
(6, 3, 10, 12, 2, 8, 2003);

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
  `category` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `price`, `weight`, `unitsInStorage`, `dimension`, `description`, `imagePath`, `thumbnail`, `category`, `rating`) VALUES
(1, 'Canon - EOS R Mirrorless Camera with RF 24-105 mm f/4L IS USM Lens', 5, 2, 3, '20', 'A full-frame 30.3 Megapixel sensor with impressive detail, ISO performance and Dual Pixel CMOS AF. Alongside the RF lenses, EOS R offers the ultimate shooting experience to take your storytelling further.\r\n', 'canon_camera.jpg', 'canon_camera_thumbnail.jpg', 'camera', 3),
(2, 'Targus - 67\" Monopod - Black\r\n', 2, 1, 3, '3', 'Steady your camera, GoPro or smartphone as you move around with this Targus monopod. It extends up to 67 inches and quickly folds to a compact 21 inches thanks to its quick-release leg locks. This Targus monopod has a rubber foot pad and ground spike for easier stabilization on a variety of surfaces.', 'targus_tripod.jpg', 'targus_tripod_thumbnail.jpg', 'tripod', 4),
(3, 'Canon - EF 24-70 mm f/2.8L III USM Standard Zoom Lens - Black', 3, 1, 3, '5 x 10', 'Built to handle the demands of professional use, this lens is durable as well as dust- and water-resistant. Fluorine coatings on the front and rear surfaces keep smudges and fingerprints to a minimum.', 'canon_lens.jpg', 'canon_lens_thumbnail.jpg', 'lens', 2),
(4, 'Hoya - EVO 82 mm Antistatic UV Lens Filter\r\n', 2, 1, 2, '10 x 2', 'With 16 layers of multicoating, including an antistatic top layer, this Hoya EVO XEVA-82UV 82mm lens filter delivers a durable design that resists dust, water, stains, scratches and smudges. The UV properties help you capture clear, haze-free images.', 'hoya_filter.jpg', 'hoya_filter_thumbnail.jpg', 'filter', 4),
(5, 'SanDisk - Extreme Pro 64 GB SDXC UHS-I Memory Card', 1, 1, 0, '5 x 10', 'This SanDisk Extreme Pro SDSDXP-064G-A46 64GB SDXC UHS-I memory card features Power Core technology to support real-time, full high-definition 3D video and continuous burst mode with more shots saved.', 'sandisk_memory_card.jpg', 'sandisk_memory_card_thumbnail.jpg', 'memory card', 3),
(6, 'Canon - EF 75-300mm f/4-5.6 III Telephoto Zoom Lens - Multi', 4, 1, 2, '5x10', 'Canon - EF 75-300mm f/4-5.6 III Telephoto Zoom Lens - Multi', 'lens3.jpg', 'lens3_thumbnail.pgj', 'lens', 4),
(7, 'Sunpak - 5555DLX 55\" Tripod - Black', 4, 1, 5, '3', 'Take professional-quality still photos with this Sunpak tripod. Its 55-inch height supports smartphones, cameras and GoPros, so you can take stable pictures in the field.', 'tripod3.jpg', 'tripod3_thumbnail.jpg', 'tripod', 4),
(8, 'Platinum - 58mm Circular Polarizer Lens Filter', 3, 1, 6, '4', 'Take stunning landscape shots with this Platinum PT-MCCP58 circular polarizer filter that features quality glass material to ensure efficient performance. The multicoated design minimizes internal lens flare and reflections, delivering enhanced contrast.\r\n\r\n', 'filter2.jpg', 'filter2_thumbnail.jpg', 'filter', 3),
(9, 'Samsung - EVO Plus 128GB microSDXC UHS-I Memory Card', 5, 1, 3, '1', 'Expand your device’s storage capacity with this Samsung 128GB Evo Plus MicroSDXC memory card. This efficient storage device writes data at up to 90MB/S, making it ideal for HD cameras and other demanding gadgets. Use the adapter included with this Samsung 128GB Evo Plus MicroSDXC memory card to sync data via a regular SD card slot.', 'memorycard2.jpg', 'memorycard2_thumbnail.jpg', 'memory card', 5),
(10, 'Sony - Alpha a6000 Mirrorless Camera with 16-50mm and 55-210mm Lenses - Black', 6, 1, 7, '15', 'With its 24.3-megapixel Exmor CMOS sensor and interchangeable lenses, this mirrorless camera allows you to capture sharp, realistic pictures for yourself or your clients. If you want to share stored photos, simply connect wireless devices to the camera\'s built-in Wi-Fi.', 'camera2.jpg', 'camera2_thumbnail.jpg', 'camera', 4),
(11, 'Canon - PowerShot SX730 HS 20.3-Megapixel Digital Camera - Black', 7, 1, 10, '3', 'Capture compelling images with this adaptable Canon PowerShot SX730 camera. Compact and powerful, this unit takes stellar macro shots and comes with a 40x zoom with integrated image stabilization technology for crisp long-distance photographs. Transfer images to your computer in seconds via WiFi or Bluetooth with this Canon PowerShot SX730 camera.\r\n\r\n', 'camera4.jpg', 'camera4_thumbnail.jpg', 'camera', 5),
(12, 'Targus - Grypton Pro XL Tripod - Black with gray trim', 4, 1, 4, '2x4', 'Shoot blur-free images with this Targus flexible tripod. Its fully bendable legs and lock ring let you use it for a variety of conditions, while its quick-release system provides an easy way to attach any camera or lens. This Targus flexible tripod comes with a GoPro Hero attachment that fixes directly to a compatible GoPro housing or frame.', 'tripod4.jpg', 'tripod4_thumbnail.jpg', 'tripod', 5),
(13, 'Platinum - 67mm Circular Polarizer Lens Filter', 5, 1, 5, '4', 'Shoot rich high-contrast photos with help from this Platinum PT-MCCP67 screw-on filter, which attaches to most digital camera lenses with a 67mm thread and improves color saturation with reduced reflection and glare.\r\n', 'filter3.jpg', 'filter3_thumbnail.jpg', 'filter', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `giftcard_balance` int(11) DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `first_name`, `last_name`, `email`, `password`, `giftcard_balance`) VALUES
(1, 'Audre', 'Staffen', 'audre', '$2y$10$tR20FAwluDeFWBePNSJ6TeuznRD2l9Lg.pbxbsgk8zjVh8B7K86uS', 472),
(2, 'admin', 'admin', 'admin', '$2y$10$tv8steohMoNKgv.9hAIuoe3CsGPgkJMWWxfIcCbN6sJ5X.Fz0CUo6', 496),
(9, 'aaa', 'aaa', 'aaa', '$2y$10$nyTF6O0jE3lLkJ9Id8MtQ.mbQ4Xs0p4BgnZWMwyTlQVwi4Mb1xHl.', 487),
(10, 'bbb', 'bbb', 'bbb', '$2y$10$2JgXKyVy3ViEV6JpH3O5R.mmTpYRRuAe/9970MrpT8qCVNfvhjPOW', 469);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderDetailID`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
