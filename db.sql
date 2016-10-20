-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2016 at 11:57 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `oc_product`
--

CREATE TABLE IF NOT EXISTS `oc_product` (
`id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1642 ;

-- --------------------------------------------------------

--
-- Table structure for table `oc_product_description`
--

CREATE TABLE IF NOT EXISTS `oc_product_description` (
`id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `language_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=983 ;

-- --------------------------------------------------------

--
-- Table structure for table `oc_product_to_store`
--

CREATE TABLE IF NOT EXISTS `oc_product_to_store` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=938 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oc_product`
--
ALTER TABLE `oc_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oc_product_description`
--
ALTER TABLE `oc_product_description`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oc_product_to_store`
--
ALTER TABLE `oc_product_to_store`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oc_product`
--
ALTER TABLE `oc_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1642;
--
-- AUTO_INCREMENT for table `oc_product_description`
--
ALTER TABLE `oc_product_description`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=983;
--
-- AUTO_INCREMENT for table `oc_product_to_store`
--
ALTER TABLE `oc_product_to_store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=938;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
