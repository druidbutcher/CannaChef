-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 30, 2024 at 02:22 PM
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
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `email`, `phone`) VALUES
(9, 'sappy gilmore', 'bhiltonjazz@gmail.com', '222'),
(10, 'Bryan Hilton', 'bryan@dbq.technology', '2145551212');

-- --------------------------------------------------------

--
-- Table structure for table `flower`
--

CREATE TABLE `flower` (
  `id` int(11) NOT NULL,
  `fat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `decarb` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `infusion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `flowerName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thcPercent` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `flowerAmount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fatAmount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `totalThc` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'per cup',
  `totalPerTsp` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `numberServings` decimal(10,0) NOT NULL,
  `directions` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `image`, `numberServings`, `directions`) VALUES
(1, 'Caramel Salted Brownies', 'images/brownies1.jpeg', '12', '\r\nMake the caramel\r\nIn a medium saucepan, cook the sugar with the water over moderate heat, swirling the pan frequently, until a dark amber caramel forms. Slowly drizzle in the cream, then whisk in the butter and sea salt. Transfer the caramel to a small bowl and refrigerate until thickened, about 2 hours.\r\n\r\nMake the brownies\r\nPreheat the oven to 325°. Lightly butter a 9-by-13-inch metal baking pan. Melt all butter  in a heatproof medium bowl set over (not in) a saucepan of simmering water. Add the chopped chocolate, the sugar, cocoa powder, vanilla and salt and stir until smooth. Remove the bowl from the heat and whisk in the eggs. Add the flour and stir until just incorporated. Line baking pan with parchment. Scrape the batter into the prepared pan and bake the brownies for about 40 minutes, until a tester inserted in the center comes out with a few moist crumbs attached. Transfer the pan to a rack and let cool completely.\r\n\r\nInvert the brownies onto a cutting board and cut in half to form 2 rectangles. Spread the chilled caramel over 1 rectangle, then top with the other rectangle. Cut into 12 bars and serve immediately'),
(2, 'Cherry Gummies', 'images/gummies1.jpeg', '30', '\r\nStep 1: Combine Water And Cannabis-Infused Oil\r\nFirst, add ½ cup of cold water, ½ cup of cannabis-infused oil, and ½ teaspoon of sunflower/soy lecithin to a small saucepan and turn it on low heat./n\r\n\r\n\r\nStep 2:  Add Gelatin\r\nOnce you’ve added the above ingredients to the saucepan, you’ll want to continue stirring the mixture until the cannabis-infused oil is completely melted and a consistent texture has formed. Then, you’ll want to add in the package of flavored gelatin and 2 tablespoons of unflavored gelatin to the mixture and continue stirring.\r\n\r\n\r\nStep 3: Heat On Low\r\nContinue stirring this mixture on low heat for at least 10-15 minutes so that the gelatin can completely dissolve. Do not stop mixing and do not let it come to a boil. Boiling can prevent the mixture from setting properly. If you start to notice a white foam form on top, remove it and lower the heat. All the ingredients at this point should be thoroughly combined and it should be a smooth consistency.\r\n\r\n\r\nStep 4: Fill Gummy Molds\r\nOnce all of the ingredients are well combined, then you can start filling up your gummy molds. You can do this with a funnel, a squeeze bottle, or a dropper—whichever you prefer.\r\n\r\nYou’ll want to keep your saucepan on the heat and work quickly so that the mixture doesn’t get a chance to cool down. If the mixture starts to get cool, the oil will separate, which you don’t want to happen. You’ll also need to continue to whisk the mixture to prevent it from binding and hardening. Remember—the quicker you get your mixture into the gummy molds, the better they’ll come out.\r\n\r\n\r\nStep 5: Freeze\r\nOnce your gummy molds are filled, all you have to do is pop them in the freezer for a minimum of 30 minutes. After they have hardened to a firm but slightly tacky texture, remove them from the molds and put them on a piece of parchment paper where they can air dry.'),
(71, 'Chocolate cake', 'images/chocolatecake.jpeg', '12', '\r\nPreheat oven to 350 degrees F (180 degrees C) and place oven rack in the center of the oven. Butter, or spray with a non stick vegetable spray, two - 9 inch (23 cm) cake pans. Then line the bottoms of the pans with parchment paper. \r\n\r\nIn a large bowl whisk together the sugar, flour, cocoa powder, baking powder, baking soda, and salt.\r\n\r\nIn another large bowl, whisk together the eggs, water (or coffee), milk, oil, and vanilla extract. \r\nAdd the wet ingredients to the dry ingredients and stir, or whisk, until combined. (The batter will be quite thin.) \r\nEvenly divide the batter between the two pans and bake for about 27 - 32 minutes or until a toothpick inserted into the center of the cake just comes out clean. \r\n \r\nRemove from oven and let cool on a wire rack for about 10 minutes. Then remove the cakes from their pans and cool completely on a greased wire rack before frosting.\r\n\r\nChocolate Frosting: Melt the chocolate in a heatproof bowl placed over a saucepan of simmering water. Remove from heat and let cool to room temperature.\r\nIn the bowl of your electric mixer, or with a hand mixer, beat the butter until smooth and creamy (about 1 minute). Add the sugar and beat until it is light and fluffy (about 2 minutes). Beat in the vanilla extract. Add the  chocolate and beat on low speed until incorporated. Increase the speed to medium-high and beat until  frosting is smooth and glossy (about 2 -3 minutes).\r\nServes about 12 people.\r\n\r\n \r\n'),
(77, 'Chocolate Chip cookies', 'images/cookies1.jpeg', '24', '\r\nPreheat oven to 350\r\nMicro butter for 40 seconds\r\nmix butter and sugar\r\nstir in vanilla and eggs\r\nadd flour, baking soda and salt\r\nmix until just combined\r\nstir in chips\r\nscoop out 1.5 tbsp and place 2 inches apart on baking sheet\r\nbake 7 to 10 minutes');

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
(4, 1, 'butter', '4.00', 'tbsp', 'unsalted', 0),
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
(72, 77, 'butter', '0.50', 'cup', '', 1),
(73, 77, 'sugar', '0.50', 'cup', 'granulated', 0),
(74, 77, 'brown sugar', '0.25', 'cup', 'packed', 0),
(75, 77, 'eggs', '2.00', 'cup', '', 0),
(76, 77, 'vanilla extract', '2.00', 'tsp', '', 0),
(77, 77, 'flour', '1.75', 'cup', 'all purpose', 0),
(78, 77, 'baking soda', '0.50', 'tsp', '', 0),
(79, 77, 'salt', '0.50', 'tsp', 'kosher', 0),
(80, 77, 'chcolate chips', '1.00', 'cup', 'semisweet', 0),
(82, 80, 'flower', '0.25', 'cup', 'sifted', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userflower`
--

CREATE TABLE `userflower` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `flowerid` int(11) NOT NULL,
  `recipeid` int(11) NOT NULL DEFAULT '0',
  `numberServings` decimal(10,0) NOT NULL DEFAULT '0',
  `thcPerServing` decimal(10,2) NOT NULL DEFAULT '0.00',
  `thcFatAmount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'cups'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `flower`
--
ALTER TABLE `flower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipeItems`
--
ALTER TABLE `recipeItems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userflower`
--
ALTER TABLE `userflower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `flower`
--
ALTER TABLE `flower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `recipeItems`
--
ALTER TABLE `recipeItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `userflower`
--
ALTER TABLE `userflower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
