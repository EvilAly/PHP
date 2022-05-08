-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 09:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itp225mod6`
--
CREATE DATABASE IF NOT EXISTS `itp225mod6` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `itp225mod6`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custID` int(11) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(75) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `employee` varchar(5) NOT NULL DEFAULT 'No',
  `memCode` smallint(6) NOT NULL DEFAULT 0,
  `volunteer` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custID`, `lastName`, `firstName`, `email`, `address`, `city`, `state`, `zip`, `phone`, `employee`, `memCode`, `volunteer`) VALUES
(1, 'Doe', 'John', 'johndoe@gmail.com', '101 Nomans Land', 'Roanoke', 'Alabama', '24018', '123456789', 'No', 1, 'ehelper-curators'),
(7, 'Mouse', 'Mickey', '', 'Disney Land', 'Orlando', 'Florida', '32830', '111-111-1111', 'Yes', 0, NULL),
(8, 'Jones', 'Jennifer', '', '24 Main Street', 'Birmingham', 'Alabama', '61234', '5403972000', 'Yes', 0, NULL),
(9, 'Windrunner', 'Sylvanas', 'banshee@azeroth.com', '123 Banshee Way', 'Lordaeron', 'Louisiana', '84102', '789456123', 'No', 5, 'contributors-curators-sphelper'),
(13, 'Adrienne', 'Clifford', 'cadrienne3@unc.edu', '23 Oxford Trail', 'Portland', 'Oregon', '97203', '503-614-3520', 'No', 2, 'tours-contributors-ghelper'),
(20, 'Deme', 'Lola', 'ldemea@earthlink.net', '057 Spaight Hill', 'Orlando', 'Florida', '32804', '407-444-3821', 'Yes', 0, NULL),
(23, 'Diviney', 'Germana', 'gdivineyd@taobao.com', '1722 Buhler Drive', 'Decatur', 'Georgia', '30034', '678-832-3557', 'No', 5, 'speaker-curators-sphelper'),
(27, 'Chippin', 'Noemi', 'nchippinh@artisteer.com', '85125 Brentwood Road', 'Wilmington', 'Delaware', '19804', '302-112-8592', 'No', 3, NULL),
(30, 'Cazin', 'Wright', 'wcazink@hexun.com', '80 Washington Terrace', 'Los Angeles', 'California', '90004', '323-179-2417', 'No', 4, 'tours-ehelper-curators-sphelper'),
(34, 'Cowpland', 'Anthea', 'acowplando@tumblr.com', '052 Basil Place', 'Wichita', 'Kansas', '67204', '316-806-8437', 'No', 2, 'tours-speaker-ehelper-contributors-curators-ghelper-sphelper');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `code` smallint(6) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`code`, `type`) VALUES
(0, 'Not a donor'),
(1, 'Individual ($25)'),
(2, 'Family/Dual ($45)'),
(3, 'Sponsor ($75)'),
(4, 'Patron ($150)'),
(5, 'Benefactor ($500)');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` smallint(6) NOT NULL,
  `eventName` varchar(75) NOT NULL,
  `dateOfEvent` date NOT NULL,
  `timeOfEvent` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `workers` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `dateOfEvent`, `timeOfEvent`, `location`, `description`, `workers`) VALUES
(1, 'Perennial Sale', '2022-05-14', '3PM - 6PM', 'VWCC Parking Lot', 'This is a test event to test the inclusion of employees and volunteers.', 'Lola Deme-John Doe-Sylvanas Windrunner'),
(2, 'Spring Fling', '2022-05-21', '12PM - 3PM', 'Hidden Valley High School', 'Sales event to attract new customers and donors.', 'Clifford Adrienne-Lola Deme-Mickey Mouse-Sylvanas Windrunner');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `plantID` int(11) NOT NULL,
  `numInStock` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`plantID`, `numInStock`, `price`, `size`) VALUES
(1, 11, '2.00', 2),
(2, 7, '4.00', 4),
(3, 17, '5.00', 3),
(5, 15, '2.50', 2),
(6, 13, '3.00', 1),
(7, 14, '4.50', 3),
(8, 14, '6.00', 2),
(9, 18, '5.00', 1),
(10, 21, '5.25', 4),
(11, 32, '3.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `custID` int(11) NOT NULL,
  `orderTotal` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `custID`, `orderTotal`) VALUES
(3, '2019-04-26', 1, '13.50'),
(4, '2019-04-26', 1, '22.25'),
(5, '2019-04-26', 1, '10.50'),
(6, '2019-04-26', 1, '4.00'),
(7, '2019-04-26', 1, '25.75'),
(8, '2019-04-26', 1, '75.00'),
(9, '2019-05-05', 1, '15.65'),
(12, '2022-05-06', 7, '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `plantID` int(11) NOT NULL,
  `botanicalName` varchar(30) NOT NULL,
  `commonName` varchar(30) NOT NULL,
  `heightMinInches` decimal(4,2) DEFAULT NULL,
  `heightMaxInches` decimal(4,2) DEFAULT NULL,
  `spreadInches` decimal(4,2) DEFAULT NULL,
  `zones` varchar(20) DEFAULT NULL,
  `seasonalInterest` varchar(255) DEFAULT NULL,
  `pestProblems` varchar(255) DEFAULT NULL,
  `culture` varchar(100) DEFAULT NULL,
  `propagation` varchar(100) DEFAULT NULL,
  `uses` varchar(100) DEFAULT NULL,
  `pronunciation` varchar(100) DEFAULT NULL,
  `origin` varchar(100) DEFAULT NULL,
  `family` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `vendor` varchar(100) DEFAULT NULL,
  `edible` varchar(20) DEFAULT NULL,
  `container` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`plantID`, `botanicalName`, `commonName`, `heightMinInches`, `heightMaxInches`, `spreadInches`, `zones`, `seasonalInterest`, `pestProblems`, `culture`, `propagation`, `uses`, `pronunciation`, `origin`, `family`, `type`, `image`, `color`, `source`, `vendor`, `edible`, `container`) VALUES
(1, 'Achillea Summer Pastel Mix', 'Yarrow', NULL, NULL, NULL, '5-7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Perennial', NULL, 'pink, rose, orange-red, purple, gray, salmon', 'In-House', NULL, 'No', 'No'),
(2, 'Alcea sp.', 'Hollyhock', '10.00', '12.00', '20.00', '6-8', 'Summer', 'None', 'Wet soil', 'Cuttings', 'Hedges', 'HolleeHock', 'Europe', 'Hollecus', 'Perennial', '', 'yellow, copper, pink, red, white', 'In-House', NULL, 'No', 'No'),
(3, 'Dianthus  x Sweet Memory', 'Grass Pink', '9.00', '18.00', '12.00', '4-6', 'Summer - White Flower with pink eye', 'Leaf spot in humid weather', 'Well-drained (some lime) sun prune after flowering Winter mulch eergreen branches', 'Cuttings in summer  Seed', 'Rock gardens Borders Edging', 'dye-AN-thus', 'Eastern Asia', 'Carynophyllacea', '', NULL, '', 'In-House', NULL, 'No', 'No'),
(5, 'Festuca ovina glauca  Elijah B', 'Blue Fescue', '6.00', '8.00', '1.00', '6-8', 'Spring - blue foliage best  Summer - straw colored flower  Cool season', 'None serious', 'Well-drained  moist soil  cut back in fall  Divide every 2 to 3 years  Full sun to part shade', 'Division  Seed', 'Edging  mass Groundcover Pots  tubs Specimen Salt Tolerant', 'fess-TOO-kah', 'Europe', 'Gramineae', '', NULL, '', 'In-House', NULL, 'No', 'No'),
(6, 'Festuca valesiaca  Glaucantha ', 'Wallis Fescue', '4.00', '6.00', '6.00', '5-7', 'Weeping  powdery blue foliage  evergreen Bluish-white to wheat colored flowers', 'None serious', 'Well-drained  rocky soil  Full sun  not in hot  inland climates', 'Division', 'Accent  Rock garden  Borders  Edging', 'fess-TOO-kah', 'Central Europe', 'Gramineae', 'Perennial', NULL, 'white', 'In-House', NULL, 'No', 'No'),
(7, 'Geranium x  Johnson s Blue ', 'Cranesbill', '16.00', '18.00', '18.00', '6-8', 'Summer to early fall-blue flower', 'None serious', 'Well-drained  moist  humus-rich soil  Full sun to part shade', 'Division every 2 to 3 years', 'Front or middle of border', 'jer-ANE-ee-um', 'Hybrid', 'Geraniaceae', '', NULL, '', 'In-House', NULL, 'No', 'No'),
(8, 'Geranium endressii', 'Pyrenean Cranesbill', '12.00', '18.00', '24.00', '5-7', 'Summer-white Flower', 'Japanese Beetle', 'Well-drained soil  Sun to part shade  Intolerant of extreme heat', 'Cuttings  Division  Seed', 'Borders  Rock gardens', 'jer-ANE-ee-um', 'Pyrenees', 'Geraniaceae', 'Perennial', '', 'white', 'In-House', '', 'No', 'Yes'),
(9, 'Geranium macrorrhizum  Ingwers', 'Bigroot CranesbillEdit', '15.00', '18.00', '24.00', '5-7', 'Late sprint to early summer rose-pink flowers  Glossy foliage', 'None serious', 'Well-drained  moist  humus-rich soil Sun to part shade  Drought-tolerant', 'Division  Seed', 'Rock Gardens  Beds  Borders', 'jer-ANE-ee-um', 'Southern Europe', 'Geraniaceae', '', '', 'Red', 'Purchased', 'Flowers r Us', 'No', 'Yes'),
(10, 'newPlantEdit', 'NewPlantCommon Edit', '7.00', '12.00', '20.00', '6-8', 'SummerEdit', 'NoneEdit', 'WetEdit', 'SeedsEdit', 'Rock GardensEdit', 'new_plantEdit', 'EuropeEdit', 'newPlanteiusEdit', 'AnnualEdit', 'noneEdit', 'BlueEdit', 'In-House', NULL, 'No', 'No'),
(11, 'Solanum lycopersicum var. cera', 'Cherry Tomato', '10.00', '15.00', '15.00', '3-4', 'Summer', 'None', 'Indoor Sow', 'Seed', 'Salad', 'CherryTomatoe', 'South America', 'cerasiforme', 'Annual', '', 'Red', 'Purchased', 'Burpee', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleID` int(11) NOT NULL,
  `saleName` varchar(30) NOT NULL,
  `memberStartDate` datetime NOT NULL,
  `memberEndDate` datetime NOT NULL,
  `publicStartDate` datetime NOT NULL,
  `publicEndDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `saleName`, `memberStartDate`, `memberEndDate`, `publicStartDate`, `publicEndDate`) VALUES
(1, 'sale1', '2019-04-01 00:00:00', '2019-04-02 00:00:00', '2019-04-02 00:00:00', '2019-04-03 00:00:00'),
(3, 'Summer Sale', '2019-07-05 00:00:00', '2019-07-06 00:00:00', '2019-07-07 00:00:00', '2019-07-08 00:00:00'),
(5, 'Tomato Sale', '2019-04-26 00:00:00', '2019-04-27 00:00:00', '2019-04-28 00:00:00', '2019-04-29 00:00:00'),
(6, 'Fall Sale', '2019-10-15 00:00:00', '2019-10-16 00:00:00', '2019-10-17 00:00:00', '2019-10-18 00:00:00'),
(7, 'Mid-Summer Sale', '2019-06-13 00:00:00', '2019-06-14 00:00:00', '2019-06-15 00:00:00', '2019-06-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `stateID` int(11) NOT NULL,
  `stateName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`stateID`, `stateName`) VALUES
(1, 'Alabama'),
(2, 'Alaska'),
(3, 'Arizona'),
(4, 'Arkansas'),
(5, 'California'),
(6, 'Colorado'),
(7, 'Connecticut'),
(8, 'Delaware'),
(9, 'Florida'),
(10, 'Georgia'),
(11, 'Hawaii'),
(12, 'Idaho'),
(13, 'Illinois'),
(14, 'Indiana'),
(15, 'Iowa'),
(16, 'Kansas'),
(17, 'Kentucky'),
(18, 'Louisiana'),
(19, 'Maine'),
(20, 'Maryland'),
(21, 'Massachusetts'),
(22, 'Michigan'),
(23, 'Minnesoda'),
(24, 'Mississippi'),
(25, 'Missouri'),
(26, 'Montana'),
(27, 'Nebraska'),
(28, 'Nevada'),
(29, 'New Hampshire'),
(30, 'New Jersey'),
(31, 'New Mexico'),
(32, 'New York'),
(33, 'North Carolina'),
(34, 'North Dakota'),
(35, 'Ohio'),
(36, 'Oklahoma'),
(37, 'Oregon'),
(38, 'Pennsylvania'),
(39, 'Rhode Island'),
(40, 'South Carolina'),
(41, 'South Dakota'),
(42, 'Tennessee'),
(43, 'Texas'),
(44, 'Utah'),
(45, 'Vermont'),
(46, 'Virginia'),
(47, 'Washington'),
(48, 'West Virginia'),
(49, 'Wisconsin'),
(50, 'Wyoming');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custID`),
  ADD KEY `memCode` (`memCode`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`plantID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plantID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`memCode`) REFERENCES `donors` (`code`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`plantID`) REFERENCES `plants` (`plantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customers` (`custID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
