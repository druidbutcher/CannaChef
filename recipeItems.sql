-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 18, 2024 at 10:26 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipeItems`
--

CREATE TABLE `recipeItems` (
  `id` int(11) NOT NULL,
  `recipeid` int(11) NOT NULL,
  `ingredient` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `measure` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `isFat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipeItems`
--

INSERT INTO `recipeItems` (`id`, `recipeid`, `ingredient`, `amount`, `measure`, `description`, `isFat`) VALUES
(1, 1, 'sugar', '1.25', 'cup', '', 0),
(2, 1, 'water', '3.00', 'tbsp', '', 0),
(3, 1, 'heavy cream', '0.75', 'cup', '', 0),
(5, 1, 'salt', '1.50', 'tsp', 'flaky sea', 0),
(6, 1, 'butter', '1.60', 'cup', 'unsalted', 1),
(7, 1, 'bittersweet chocolate', '10.00', 'ounces', 'finely chopped', 0),
(8, 1, 'sugar', '1.50', 'cup', '', 0),
(9, 1, 'cocoa powder', '0.25', 'cup', 'unsweetened ', 0),
(10, 1, 'vanilla extract', '2.00', 'tsp', '', 0),
(11, 1, 'salt', '0.50', 'tsp', 'kosher', 0),
(12, 1, 'eggs', '3.00', 'large', 'chilled', 0),
(13, 1, 'flour', '1.00', 'cup', 'all purpose', 0),
(14, 2, 'flavored jello', '1.00', 'package', '', 0),
(15, 2, 'gelatin powder', '2.00', 'tbsp', 'unflavored', 0),
(16, 2, 'sunflower/soy lecithin', '0.50', 'tsp', '', 0),
(17, 2, 'water', '0.50', 'cup', 'cold', 0),
(18, 2, 'oil', '0.50', 'cup', '', 1),
(58, 71, 'flour', '1.75', 'cup', 'all purpose', 0),
(59, 71, 'cocoa powder', '0.75', 'cup', 'unsweetened', 0),
(60, 71, 'baking powder', '1.50', 'tsp', '', 0),
(61, 71, 'baking soda', '1.50', 'tsp', '', 0),
(62, 71, 'salt', '0.50', 'tsp', '', 0),
(63, 71, 'eggs', '2.00', 'large', '', 0),
(64, 71, 'coffee', '1.00', 'cup', 'warm', 0),
(65, 71, 'milk', '1.00', 'cup', '', 0),
(66, 71, 'oil', '0.50', 'cup', '', 1),
(67, 71, 'vanilla extract', '1.50', 'tsp', '', 0),
(70, 71, 'sugar', '2.00', 'cup', 'granulated', 0),
(71, 76, 'flower', '2.00', 'tsp', 'asdfa', 0),
(72, 77, 'butter', '0.50', 'cup', 'unsalted', 1),
(73, 77, 'sugar', '0.50', 'cup', 'granulated', 0),
(74, 77, 'brown sugar', '0.25', 'cup', 'packed', 0),
(75, 77, 'eggs', '2.00', 'cup', '', 0),
(76, 77, 'vanilla extract', '2.00', 'tsp', '', 0),
(77, 77, 'flour', '1.75', 'cup', 'all purpose', 0),
(78, 77, 'baking soda', '0.50', 'tsp', '', 0),
(79, 77, 'salt', '0.50', 'tsp', 'kosher', 0),
(80, 77, 'chcolate chips', '1.00', 'cup', 'semisweet', 0),
(82, 80, 'flower', '0.25', 'cup', 'sifted', 0),
(83, 81, 'Water', '0.88', 'cups', 'Cold', 0),
(84, 81, 'MBM Gummy mix', '1.00', 'package', '', 0),
(85, 81, 'tincture', '0.25', 'cup', '', 1),
(86, 83, 'butter', '1.00', 'cup', 'unsalted', 1),
(87, 83, 'Sugar', '1.00', 'cup', 'Grnulated white', 0),
(88, 83, 'Egg', '1.00', 'large', '', 0),
(89, 83, 'Vanilla Extract', '2.00', 'tsp', '', 0),
(90, 83, 'Flour', '2.75', 'cup', 'All putpose', 0),
(91, 83, 'Salt', '0.25', 'tsp', '', 0),
(92, 84, 'butter', '2.00', 'cup', 'Softened', 1),
(93, 84, 'Confectioners Sugar', '2.50', 'cup', '', 0),
(94, 84, 'Almond Extract', '1.00', 'tsp', '', 0),
(95, 84, 'Marshmallow Creme', '13.00', 'ounces', '1 jar', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipeItems`
--
ALTER TABLE `recipeItems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipeItems`
--
ALTER TABLE `recipeItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
