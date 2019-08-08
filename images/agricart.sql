-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 10:05 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agricart`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `price` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `type`, `category`, `brand`, `title`, `price`, `quantity`, `description`, `shop_id`, `image_path`) VALUES
(1, 'Seeds', 'Flower Seeds', 'I &  B Seeds', 'Marigold', '$20', 20, NULL, 1, 'C:\\xampp\\htdocs\\seeds_img\\1.jpg'),
(2, 'Seeds', 'Flower Seeds', 'Indo-American', 'Ageratum', '$10', 15, NULL, 1, 'C:\\xampp\\htdocs\\seeds_img\\2.jpg'),
(3, 'Seeds', 'Flower Seeds', 'Indo-American', 'Alyssum Ornamental', '$10', 20, NULL, 5, 'C:\\xampp\\htdocs\\seeds_img\\3.jpg'),
(4, 'Seeds', 'Flower Seeds', 'East West', 'Apsara Yellow 324 F1 Marigold', '$20', 30, NULL, 3, 'C:\\xampp\\htdocs\\seeds_img\\4.jpg'),
(5, 'Seeds', 'Flower Seeds', 'East West', 'Arrow Gold Marigold', '$12', 20, NULL, 4, 'C:\\xampp\\htdocs\\seeds_img\\5.jpg'),
(6, 'Seeds', 'Vegetable Seeds', 'Mahyco', 'Aadesh Mhcp 320(Chilli)', '$10', 20, NULL, 7, 'C:\\xampp\\htdocs\\seeds_img\\6.jpg'),
(7, 'Seeds', 'Vegetable Seeds', 'Seminis', 'Abhilash Tomato', '$2', 40, NULL, 7, 'C:\\xampp\\htdocs\\seeds_img\\7.jpg'),
(8, 'Seeds', 'Vegetable Seeds', 'Syngenta', 'Abhinav Tomato', '$5', 30, NULL, 2, 'C:\\xampp\\htdocs\\seeds_img\\8.jpg'),
(9, 'Seeds', 'Vegetable Seeds', 'Seminis', 'Abhishek Bitter Gourd', '$10', 20, NULL, 8, 'C:\\xampp\\htdocs\\seeds_img\\9.jpg'),
(10, 'Seeds', 'Vegetable Seeds', 'Seminis', 'Amphion Cabbage', '$12', 25, NULL, 10, 'C:\\xampp\\htdocs\\seeds_img\\10.jpg'),
(11, 'Plant Protection', 'Insecticides', 'Rallis India', 'Anant Insecticide', '$5', 20, NULL, 6, 'C:\\xampp\\htdocs\\seeds_img\\11.jpg'),
(12, 'Plant Protection', 'Insecticides', 'Rallis India', 'Asataf Insecticide', '$4', 50, NULL, 6, 'C:\\xampp\\htdocs\\seeds_img\\12.jpg'),
(13, 'Plant Protection', 'Insecticides', 'Dhanuka', 'Caldan 50Sp Insecticide', '$10', 35, NULL, 5, 'C:\\xampp\\htdocs\\seeds_img\\13.jpg'),
(14, 'Plant Protection', 'Insecticides', 'Cheminova', 'Caper Insecticide', '$20', 30, NULL, 3, 'C:\\xampp\\htdocs\\seeds_img\\14.jpg'),
(15, 'Plant Protection', 'Insecticides', 'Hyderabadi Chemical', 'Carbogran Insecticide', '$12', 10, NULL, 1, 'C:\\xampp\\htdocs\\seeds_img\\15.jpg'),
(16, 'Plant Protection', 'Fungicides', 'Hyderabadi Chemical', 'Flock Fungicide ', '$13', 10, NULL, 9, 'C:\\xampp\\htdocs\\seeds_img\\16.jpg'),
(17, 'Plant Protection', 'Fungicides', 'Rallis India', 'Contaf Fungicide', '$5', 16, NULL, 2, 'C:\\xampp\\htdocs\\seeds_img\\17.jpg'),
(18, 'Plant Protection', 'Fungicides', 'Upl', 'Upl Saaf Fungicide', '$10', 20, NULL, 9, 'C:\\xampp\\htdocs\\seeds_img\\18.jpg'),
(19, 'Plant Protection', 'Fungicides', 'Rallis India', 'Contaf Plus Fungicide', '$13', 30, NULL, 5, 'C:\\xampp\\htdocs\\seeds_img\\19.jpg'),
(20, 'Plant Protection', 'Fungicides', 'Rallis India', 'Blitox Fungicide', '$12', 20, NULL, 3, 'C:\\xampp\\htdocs\\seeds_img\\20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `district` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `license_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`, `landmark`, `district`, `state`, `mobile`, `email`, `license_no`) VALUES
(1, 'Bombay Bazaar', 'Gaurav Tower', 'Jaipur', 'Rajasthan', 9521877374, 'bombay@gmail.com', '10000000'),
(2, 'Raj Store', 'MI Road', 'Jaipur', 'Rajasthan', 9852693886, 'Raj@gmail.com', '10000001'),
(3, 'Agtap', 'White House', 'Gaya', 'Bihar', 9521877376, 'agtap@gmail.com', '10000002'),
(4, 'Agroya', 'GT Road', 'Gaya', 'Bihar', 9521877375, 'agroya@gmail.com', '10000003'),
(5, 'Agricas', 'MI Road', 'Jaipur', 'Rajasthan', 9521877377, 'agricas@gmail.com', '10000004'),
(6, 'Agsprout', 'Okhla', 'New Delhi', 'Delhi', 9852693887, 'agsprout', '10000005'),
(7, 'Agsly', 'Jasola', 'New Delhi', 'Delhi', 9852693888, 'agsly@gmail.com', '10000006'),
(8, 'Agify', 'Malaviya Nagar', 'Jaipur', 'Rajasthan', 9852693889, 'agify@gmail.com', '10000007'),
(9, 'Agricultive', 'Jamia Nagar', 'New Delhi', 'Delhi', 9521877363, 'agricultive@gmail.com', '10000008'),
(10, 'Agriculta', 'Mahavir Nagar', 'Kota', 'Rajasthan', 9852693880, 'agriculta@gmail.com', '10000009');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`),
  ADD UNIQUE KEY `license_no` (`license_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
