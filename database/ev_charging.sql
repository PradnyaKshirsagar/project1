-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2023 at 07:38 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ev_charging`
--
CREATE DATABASE IF NOT EXISTS `ev_charging` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ev_charging`;

-- --------------------------------------------------------

--
-- Table structure for table `add-charging-points`
--

CREATE TABLE IF NOT EXISTS `add-charging-points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `station_name` text COLLATE utf8_unicode_ci NOT NULL,
  `person_name` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `state` text COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `pin_code` text COLLATE utf8_unicode_ci NOT NULL,
  `latitude` text COLLATE utf8_unicode_ci NOT NULL,
  `longitude` text COLLATE utf8_unicode_ci NOT NULL,
  `open_time` text COLLATE utf8_unicode_ci NOT NULL,
  `close_time` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `add-charging-points`
--

INSERT INTO `add-charging-points` (`id`, `station_name`, `person_name`, `mobile_no`, `email`, `city`, `state`, `country`, `pin_code`, `latitude`, `longitude`, `open_time`, `close_time`, `user_id`, `password`, `date`, `time`) VALUES
(5, 'pune', 'rohit', '8605965201', 'abc@gmail.com', 'solapur', 'maharshtra', 'india', '413006', 'latitide', 'longitude', 'open time', 'close time', 'admin', '159', '2023-04-11', '10:24:47'),
(6, 'dfgdfgfdg', 'dfgdfg', '1020301020', 'fdgdfg@fff', 'dfgfdg', 'dfg', 'dfgdfg', 'dfgfdg', 'dfgdfg', 'dfgdfg', 'fdg', 'dfgfd', 'dfg', 'dfg', '2023-05-02', '10:39:14'),
(7, 'AAAAAAA', '54', '1234567892', '54@ddd', '54', '54', '5', '45', '45', '45', '45', '45', '45', '45', '2023-05-02', '11:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `office_name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `primary_contact_no` text NOT NULL,
  `other_contact_no` text NOT NULL,
  `logo` text NOT NULL,
  `password` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `office_name`, `email`, `address`, `primary_contact_no`, `other_contact_no`, `logo`, `password`, `date`, `time`) VALUES
(7, 'SHREE', 'fdgdfgfg', '', '', '1234567890', '', '', '', '2020-10-18', '14-55-31 PM'),
(8, 'YYY', 'FGFG', 'SSS@GMAIL.COM', 'SOLAPUR', '1122334455', '4455667777', 'AUDRaaEuSY.png', '5454', '2022-12-23', '14-01-19 PM');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` text COLLATE utf8_unicode_ci NOT NULL,
  `mo_no` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`, `full_name`, `mo_no`, `address`, `email`, `password`, `date`, `time`) VALUES
(52, 'yogiraj', '8605965201', 'solapur', 'abc@gmail.com', '789', '2023-04-13', '10:55:32 am'),
(53, 'chaitanya', '8421034699', 'shelgi', 'abc@gmail.com', '123', '2023-04-13', '11:48:31 am'),
(48, 'Rohit', '9730104829', 'pune', 'rohit@gmail.com', '789', '2023-04-12', '12:45:03 pm'),
(49, 'abhishek', '7796794971', 'solapur', 'abhi@gmail.com', '123', '2023-04-12', '09:36:41 pm'),
(44, 'shivani', '9730104829', 'shelgi', 'abc@gmail.com', '12345', '2023-04-12', '12:23:48 pm'),
(54, 'yogiraj54545', '8605965201', 'solapur', 'abc@gmail.com', '789', '2023-05-02', '10:28:03 am'),
(55, 'yogiraj 9898', '8605965201', 'solapur', 'abc@gmail.com', '789', '2023-05-02', '10:28:11 am'),
(56, 'aaa', '4548796523', 'aaa5', '444@ddd.com', '0', '2023-05-02', '05:26:55 pm'),
(57, 'aaa', '4548796523', 'aaa5', '444@ddd.com', '0', '2023-05-02', '07:05:16 pm'),
(58, 'aaa', '4548796523', 'aaa5', 'sdfsdf', '0', '2023-05-02', '07:05:21 pm'),
(59, 'aaa', '4548796523', 'aaa5', 'fhfgdhgh', '0', '2023-05-02', '07:05:56 pm'),
(60, 'aaa', '4548796523', 'aaa5', 'fhfgdhgh', ' fghdfgh', '2023-05-02', '07:06:21 pm'),
(61, 'aaahttp://localhost/ev/logo.png', '4548796523http://localhost/ev/logo.png', 'aaa5http://localhost/ev/logo.png', 'http://localhost/ev/logo.png', 'http://localhost/ev/logo.png', '2023-05-02', '07:06:55 pm'),
(62, 'aaahttp://localhost/ev/logo.png', '4548796523http://localhost/ev/logo.png', 'aaa5http://localhost/ev/logo.png', 'http://localhost/ev/logo.png', 'http://localhost/ev/logo.png', '2023-05-02', '07:07:43 pm'),
(63, 'aaahttp://localhost/ev/logo.png', '4548796523http://localhost/ev/logo.png', 'aaa5http://localhost/ev/logo.png', 'http://localhost/ev/logo.png', 'http://localhost/ev/logo.png', '2023-05-02', '07:07:52 pm'),
(64, 'dfgdgdfg', '8787415241', 'dfgdg', 'fd', 'dfdfdf', '2023-05-02', '09:30:24 pm'),
(65, 'aaaaaaaaaaaaaaaa', '55555', 'dddd', 'fddfd@df', '157', '2023-05-02', '09:32:04 pm'),
(66, 'aaa 7777777777777777777', '4548796523', 'aaa5', 'fhfgdhgh', ' fghdfgh', '2023-05-03', '12:21:01 am');

-- --------------------------------------------------------

--
-- Table structure for table `ev_booking`
--

CREATE TABLE IF NOT EXISTS `ev_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `charging_point` text COLLATE utf8_unicode_ci NOT NULL,
  `booking_date` date NOT NULL,
  `booking_type` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `ev_booking`
--

INSERT INTO `ev_booking` (`id`, `user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time`) VALUES
(1, '1', 'dsdf', '0000-00-00', '22:00:12', 'sdcdc', '2023-05-01', '12:53:57'),
(4, '331', 'uuuuuuu', '2023-05-27', '23:12:00', 'sd', '2023-05-01', '01:52:51 pm'),
(5, '54545454', '6', '2023-05-12', '11:59', '64454', '2023-05-02', '11:17:25'),
(6, 'admin', '5', '2023-05-01', '11:21', '11111', '2023-05-02', '11:21:35'),
(7, 'admin', '6', '2023-05-01', '11:21', 'pending', '2023-05-02', '11:22:53'),
(8, '888', '5', '2023-05-07', '21:37', 'pending', '2023-05-02', '10:19:50 pm'),
(9, '5658', '6', '2023-05-10', '21:35', 'pending', '2023-05-02', '21:34:03'),
(10, '55555', '6', '2023-05-04', '21:38', 'completed', '2023-05-02', '21:35:29'),
(11, '5', '5', '2023-05-03', '', 'completed', '2023-05-02', '21:37:51'),
(12, '55555', '5', '2023-05-12', '12:59', 'pending', '2023-05-02', '21:38:09'),
(13, '7485', '5', '2023-05-12', '12:59', 'pending', '2023-05-02', '21:38:45'),
(14, '55555', '7', '2023-05-26', '21:53', 'pending', '2023-05-02', '21:50:08'),
(15, '55555', '5', '2023-05-19', 'CNG', 'pending', '2023-05-02', '23:32:31'),
(16, '55555', '5', '2023-05-19', 'CNG', 'pending', '2023-05-02', '23:36:31'),
(17, '55555', '666', '2023-05-19', 'CNG', 'pending', '2023-05-02', '23:36:39'),
(18, '55555', '5', '2023-05-19', 'CNG', 'completed', '2023-05-02', '23:37:40'),
(19, '55555', '5', '2023-05-19', 'CNG', 'completed', '2023-05-02', '23:38:00'),
(20, '55555', '5', '2023-05-19', 'CNG', 'pending', '2023-05-02', '23:38:34'),
(21, '55555', '5', '2023-05-19', 'CNG', 'pending', '2023-05-02', '23:38:44'),
(24, '55555', '7', '2023-05-03', 'EV Charging', 'pending', '2023-05-02', '23:46:22'),
(23, '55555', '5', '2023-05-02', 'CNG', 'pending', '2023-05-02', '23:45:23'),
(25, '55555', '6', '2023-05-17', 'EV Charging', 'pending', '2023-05-02', '23:46:42'),
(26, '8605965201', '5', '2023-05-01', 'EV Charging', 'pending', '2023-05-03', '01:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `services` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services`) VALUES
(26, 'Stone'),
(27, 'Crusher'),
(28, 'dsfdfsdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
