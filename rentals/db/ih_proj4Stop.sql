-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2013 at 11:44 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ct406s13`
--

-- --------------------------------------------------------

--
-- Table structure for table `ih_proj4Stop`
--

CREATE TABLE IF NOT EXISTS `ih_proj4Stop` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ih_proj4Stop`
--

INSERT INTO `ih_proj4Stop` (`id`, `name`, `line`) VALUES
(0, 'Addison Road', 'Blue,Orange'),
(1, 'Anacostia', 'Green'),
(2, 'Archives', 'Green,Yellow'),
(3, 'Arlington Cemetery', 'Blue'),
(4, 'Ballston-MU', 'Orange'),
(5, 'Benning Road', 'Blue,Orange'),
(6, 'Bethesda', 'Red'),
(7, 'Braddock Road', 'Blue,Yellow'),
(8, 'Branch Avenue', 'Green'),
(9, 'Brookland-CUA', 'Red'),
(10, 'Capitol Heights', 'Blue,Orange'),
(11, 'Capitol South', 'Blue,Orange'),
(12, 'Cheverly', 'Orange'),
(13, 'Clarendon', 'Orange'),
(14, 'Cleveland Park', 'Red'),
(15, 'College Park - University of Maryland', 'Green,Yellow'),
(16, 'Columbia Heights', 'Green,Yellow'),
(17, 'Congress Heights', 'Green'),
(18, 'Court House', 'Orange'),
(19, 'Crystal City', 'Blue,Yellow'),
(20, 'Deanwood', 'Orange'),
(21, 'Dunn Loring', 'Orange'),
(22, 'Dupont Circle', 'Red'),
(23, 'East Falls Church', 'Orange'),
(24, 'Easter Market', 'Blue,Orange'),
(25, 'Eisenhower Avenue', 'Yellow'),
(26, 'Farragut North', 'Red'),
(27, 'Farragut West', 'Blue,Orange'),
(28, 'Federal Center SW', 'Blue,Orange'),
(29, 'Federal Triangle', 'Blue,Orange'),
(30, 'Foggy Bottom - GWU', 'Blue,Orange'),
(31, 'Forest Glen', 'Red'),
(32, 'Fort Totten', 'Green,Yellow,Red'),
(34, 'Franconia-Springfield', 'Blue,Yellow'),
(35, 'Friendship Heights', 'Red'),
(36, 'Gallery Place', 'Green,Yellow,Red'),
(38, 'Georgia Avenue - Petworth', 'Green,Yellow'),
(39, 'Glenmont', 'Red'),
(40, 'Greenbelt', 'Green,Yellow'),
(41, 'Grosvenor-Strathmore', 'Red'),
(42, 'Huntington', 'Yellow'),
(43, 'Judiciary Square', 'Red'),
(44, 'King Street - Old Town', 'Blue,Yellow'),
(45, 'L''Enfent Plaza', 'Blue,Orange,Green,Yellow'),
(47, 'Landover', 'Orange'),
(48, 'Largo Town Center', 'Blue,Orange'),
(49, 'McPherson Square', 'Blue,Orange'),
(50, 'Medical Center', 'Red'),
(51, 'Metro Center', 'Blue,Orange,Red'),
(53, 'Minnesota Avenue', 'Orange'),
(54, 'Morgan Boulevard', 'Blue,Orange'),
(55, 'Mount Vernon Square', 'Green,Yellow'),
(56, 'Navy Yard - Ballpark', 'Green'),
(57, 'Naylor Road', 'Green'),
(58, 'New Carrollton', 'Orange'),
(59, 'NoMa - Gallaudet University', 'Red'),
(60, 'Pentagon', 'Blue,Yellow'),
(61, 'Pentagon City', 'Blue,Yellow'),
(62, 'Potomac Avenue', 'Blue,Orange'),
(63, 'Prince George''s Plaza', 'Green,Yellow'),
(64, 'Rhode Island Avenue - Brentwood', 'Red'),
(65, 'Rockville', 'Red'),
(66, 'Ronald Reagan Washington National Airport', 'Blue,Yellow'),
(67, 'Rosslyn', 'Blue,Orange'),
(68, 'Shady Grove', 'Red'),
(69, 'Shaw-Howard University', 'Green,Yellow'),
(70, 'Silver Spring', 'Red'),
(71, 'Smithsonian', 'Blue,Orange'),
(72, 'Southern Avenue', 'Green'),
(73, 'Stadium-Armory', 'Blue,Orange'),
(74, 'Suitland', 'Green'),
(75, 'Takoma', 'Red'),
(76, 'Tenleytown-AU', 'Red'),
(77, 'Twinbrook', 'Red'),
(78, 'U Street', 'Green,Yellow'),
(79, 'Union Station', 'Red'),
(80, 'Van Dorn Street', 'Blue,Yellow'),
(81, 'Van Ness - UDC', 'Red'),
(82, 'Vienna', 'Orange'),
(83, 'Virginia Square - GMU', 'Orange'),
(84, 'Waterfront', 'Green'),
(85, 'West Falls Church', 'Orange'),
(86, 'West Hyattsville', 'Green,Yellow'),
(87, 'Wheaton', 'Red'),
(88, 'White Flint', 'Red'),
(89, 'Woodley Park', 'Red');
