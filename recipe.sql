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
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `numberServings` decimal(10,0) NOT NULL,
  `directions` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `image`, `numberServings`, `directions`) VALUES
(1, 'Caramel Salted Brownies', 'images/brownies1.jpeg', '12', '\r\nMake the caramel\r\nIn a medium saucepan, cook the sugar with the water over moderate heat, swirling the pan frequently, until a dark amber caramel forms. Slowly drizzle in the cream, then whisk in the butter and sea salt. Transfer the caramel to a small bowl and refrigerate until thickened, about 2 hours.\r\n\r\nMake the brownies\r\nPreheat the oven to 325°. \r\nLightly butter a 9-by-13-inch metal baking pan. \r\nMelt all butter  in a heatproof medium bowl set over (not in) a saucepan of simmering water. \r\nAdd the chopped chocolate, the sugar, cocoa powder, vanilla and salt and stir until smooth. \r\nRemove the bowl from the heat and whisk in the eggs. \r\nAdd the flour and stir until just incorporated. \r\nLine baking pan with parchment. Scrape the batter into the prepared pan and bake the brownies for about 40 minutes, until a tester inserted in the center comes out with a few moist crumbs attached. Transfer the pan to a rack and let cool completely.\r\n\r\nInvert the brownies onto a cutting board and cut in half to form 2 rectangles. Spread the chilled caramel over 1 rectangle, then top with the other rectangle. Cut into 12 bars and serve immediately'),
(2, 'Cherry Gummies', 'images/gummies1.jpeg', '30', '\r\nStep 1: Combine Water And Cannabis-Infused Oil\r\nFirst, add ½ cup of cold water, ½ cup of cannabis-infused oil, and ½ teaspoon of sunflower/soy lecithin to a small saucepan and turn it on low heat./n\r\n\r\n\r\nStep 2:  Add Gelatin\r\nOnce you’ve added the above ingredients to the saucepan, you’ll want to continue stirring the mixture until the cannabis-infused oil is completely melted and a consistent texture has formed. Then, you’ll want to add in the package of flavored gelatin and 2 tablespoons of unflavored gelatin to the mixture and continue stirring.\r\n\r\n\r\nStep 3: Heat On Low\r\nContinue stirring this mixture on low heat for at least 10-15 minutes so that the gelatin can completely dissolve. Do not stop mixing and do not let it come to a boil. Boiling can prevent the mixture from setting properly. If you start to notice a white foam form on top, remove it and lower the heat. All the ingredients at this point should be thoroughly combined and it should be a smooth consistency.\r\n\r\n\r\nStep 4: Fill Gummy Molds\r\nOnce all of the ingredients are well combined, then you can start filling up your gummy molds. You can do this with a funnel, a squeeze bottle, or a dropper—whichever you prefer.\r\n\r\nYou’ll want to keep your saucepan on the heat and work quickly so that the mixture doesn’t get a chance to cool down. If the mixture starts to get cool, the oil will separate, which you don’t want to happen. You’ll also need to continue to whisk the mixture to prevent it from binding and hardening. Remember—the quicker you get your mixture into the gummy molds, the better they’ll come out.\r\n\r\n\r\nStep 5: Freeze\r\nOnce your gummy molds are filled, all you have to do is pop them in the freezer for a minimum of 30 minutes. After they have hardened to a firm but slightly tacky texture, remove them from the molds and put them on a piece of parchment paper where they can air dry.'),
(71, 'Chocolate cake', 'images/chocolatecake.jpeg', '12', '\r\nPreheat oven to 350 degrees F (180 degrees C) and place oven rack in the center of the oven. Butter, or spray with a non stick vegetable spray, two - 9 inch (23 cm) cake pans. Then line the bottoms of the pans with parchment paper. \r\n\r\nIn a large bowl whisk together the sugar, flour, cocoa powder, baking powder, baking soda, and salt.\r\n\r\nIn another large bowl, whisk together the eggs, water (or coffee), milk, oil, and vanilla extract. \r\nAdd the wet ingredients to the dry ingredients and stir, or whisk, until combined. (The batter will be quite thin.) \r\nEvenly divide the batter between the two pans and bake for about 27 - 32 minutes or until a toothpick inserted into the center of the cake just comes out clean. \r\n \r\nRemove from oven and let cool on a wire rack for about 10 minutes. Then remove the cakes from their pans and cool completely on a greased wire rack before frosting.\r\n\r\nChocolate Frosting: Melt the chocolate in a heatproof bowl placed over a saucepan of simmering water. Remove from heat and let cool to room temperature.\r\nIn the bowl of your electric mixer, or with a hand mixer, beat the butter until smooth and creamy (about 1 minute). Add the sugar and beat until it is light and fluffy (about 2 minutes). Beat in the vanilla extract. Add the  chocolate and beat on low speed until incorporated. Increase the speed to medium-high and beat until  frosting is smooth and glossy (about 2 -3 minutes).\r\nServes about 12 people.\r\n\r\n \r\n'),
(77, 'Chocolate Chip cookies', 'images/cookies1.jpeg', '24', '\r\nPreheat oven to 350\r\nMicro butter for 40 seconds\r\nmix butter and sugar\r\nstir in vanilla and eggs\r\nadd flour, baking soda and salt\r\nmix until just combined\r\nstir in chips\r\nscoop out 1.5 tbsp and place 2 inches apart on baking sheet\r\nbake 7 to 10 minutes'),
(81, 'MBM Gummie Mix', 'images/mbmgummy1.jpg', '30', '1. Add cold water into a large glass bowl\r\n2.Sprinkle your gummy mix over the top and gently fold the mix into yourliquid using a silicone spatula. Keep folding gently until the powder fullyabsorbs the liquid.\r\n3. Let the bowl rest 10 minutes. Be patient its blooming.\r\n4. Once the mixture is bloomed, and the liquid is absorbed, place the glass bowl onto a pot of boiling water. Use your spatula to gently mix as it melts. Keep mixing until itsfully disloved. 1 - 3 minutes.\r\n5.Add your tincture or oil into the mixture and fold gently to mix thoroughly.\r\n6. Transfer the mix to a silicone measuring cupand carefully pour yourmixture into your gummy trays.Let the gummies set at room temperature for 1 hour , or in the fridge for 30 minutes!\r\nOnce they are set pop them out and emjoy!'),
(83, 'Butter Cookies', 'images/buttercookies.jpg', '36', 'Beat butter and sugar together in a large bowl with an electric mixer until light and fluffy. \r\n\r\nBeat in egg, then stir in the vanilla. Combine flour and salt in a separate bowl; add to butter mixture and mix to form a dough. \r\nCover dough with plastic wrap and chill for at least one hour.\r\n\r\nPreheat the oven to 400 degrees F (200 degrees C). Chill two cookie sheets.\r\n\r\nTransfer chilled dough to a cookie press; press out onto chilled cookie sheets.\r\n\r\nBake in the preheated oven until lightly golden at the edges, about 8 to 10 minutes. Transfer cookies to wire racks to cool.'),
(84, 'Marshmallow Buttercream', 'images/buttercream.jpg', '8', 'Cream butter in a mixing bowl with an electric mixer on medium until butter is soft and fluffy. \r\nGradually beat in confectioners\' sugar, about 1/2 cup at a time; beat in almond extract.\r\n Gently fold the marshmallow creme into the frosting until thoroughly incorporated.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
