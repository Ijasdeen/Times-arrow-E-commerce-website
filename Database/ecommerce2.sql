-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 06:37 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'backpacks'),
(2, 'crossbody'),
(3, 'satchels'),
(4, 'totes'),
(5, 'clutches');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ip_add` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupans`
--

CREATE TABLE `coupans` (
  `coupan_id` int(11) NOT NULL,
  `coupan_title` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(1000) NOT NULL,
  `companyName` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `apartment` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `country` varchar(10) NOT NULL,
  `postal` varchar(500) NOT NULL,
  `email` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_price` double NOT NULL,
  `preOrder` varchar(10) NOT NULL,
  `newArrivals` varchar(10) NOT NULL,
  `product_desc` text NOT NULL,
  `InsertedDate` date NOT NULL,
  `H` double NOT NULL,
  `L` double NOT NULL,
  `D` double NOT NULL,
  `Handle_Drop` double NOT NULL,
  `created_by` varchar(700) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `interior_image` varchar(250) NOT NULL,
  `side_image` varchar(250) NOT NULL,
  `back_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_brand`, `product_title`, `product_price`, `preOrder`, `newArrivals`, `product_desc`, `InsertedDate`, `H`, `L`, `D`, `Handle_Drop`, `created_by`, `product_image`, `interior_image`, `side_image`, `back_image`) VALUES
(1, 1, 'CARINA BUCKET IVORY', 325, '', '', 'Lightweight and airy as a cloud, the Carina Bucket bag is youthful and fun. But timelessly chic. Made from a base of rich ivory leather and worn on the shoulder. the style features multi-colored chevron patterns atop playful, multi-colored embroidered stars. A drawstring close provides effortless access. \r\n', '2018-01-02', 9, 8.5, 10.25, 9.5, '100% cowhide leather, polyester lining\r\nGoldtone hardware & drawstring closure\r\n1 inner zip & slip pocket', 'carina-front.jpg', 'carina-interior.jpg', 'carina-side.jpg', 'carina-back.jpg'),
(2, 2, 'VELA HOOK SHOPPING BAG SHELL/BLACK', 425, '', '', 'A modern interpretation of a classic style, the 2 in 1 Vela Hook Shopping Bag features a softly-contrasted leather shell with contemporary graphic detailing and effortless closure. Hook the clasps together on the bottom to create the bag\'s distinctive trapezoid design.', '2018-05-20', 14, 18.5, 0.5, 9, '100% cowhide leather, polyester lining.\r\nGoldtone hardware & hidden magnet closure.\r\n1 inner zip & slip pocket', 'Hook-front.png', 'Hook-interior.jpg', 'Hook-side.jpg', 'Hook-back.png'),
(3, 3, 'VELA HOOK SHOPPING BAG IVORY/QUARTZ', 425, '', 'Yes', 'A modern interpretation of a classic style, the 2 in 1 Vela Hook Shopping Bag features a softly-contrasted leather shell with contemporary graphic detailing and effortless closure. Hook the clasps together on the bottom to create the bag\'s distinctive trapezoid design.', '2018-06-08', 14, 18.5, 0.5, 9, '100% cowhide leather, polyester lining\r\nGoldtone hardware & hidden magnet closure\r\n1 inner zip & slip pocket', 'VelaHook-front.png', 'VelaHook-inside.jpg', 'VelaHook-side.jpg', 'VelaHook-back.png'),
(4, 4, '\r\nURSA MINOR EAST WEST TOTE PORCELAIN/IVORY/BLACK', 400, '', '', 'Stand out from the crowd with the Ursa Major E/W Tote, whose upright shape and tricolor blocking offer unmatchable appeal. A smooth leather shell allows for maximum movement while seemingly endless and endlessly discreet inside and outside pockets keep your must haves always close at hand. \r\n\r\n ', '2018-06-10', 13.5, 16.5, 2, 9, '\r\n100% cowhide leather, polyester lining.\r\nGoldtone hardware & pushlock closure\r\n1 inner zip & slip pocket', 'Minoreast-front.jpg', 'Minoreast-interior.jpg', '', ''),
(5, 5, 'URSA MAJOR N/S TOTE GINGER/SHELL/BLACK', 350, 'Yes', '', 'Stand out from the crowd with the Ursa Major N/S Tote, whose upright shape and tri-color blocking offer unmatchable appeal. A smooth leather shell allows for maximum movement while seemingly endless and endlessly discreet inside and outside pockets keep your must-haves always close at hand.', '2018-06-10', 16, 12, 4, 9, '100% cowhide leather, polyester lining.\r\nGoldtone hardware & hidden magnet closure.\r\n1 inner zip & slip pocket', 'ursaMajor.jpg', 'UrsaMajor-interior.jpg', '', ''),
(6, 3, 'Ava Satchel With Fur Bowery Black', 328, 'Yes', '', 'Structured Satchel in saffiano leather with faux fur top handle and custom signature hardware; wear as crossbody with removable, adjustable shoulder strap. Custom hanging logo', '2018-05-22', 6, 12, 7.5, 4, '', 'HandleBowery-front.jpg', 'HandleBowery-interrior.jpg', 'HandleBowery-side.jpg', 'HandleBowery-back.jpg'),
(7, 3, 'satchelBowery-front', 418, 'Yes', '', '', '2018-06-18', 8, 10, 6.5, 5, '', 'satchelBowery-front.jpg', 'satchel-interrior.jpg', 'satchel-side.jpg', 'satchel-back.jpg'),
(8, 3, 'ORION ZIP TOP SATCHEL WHITE CROC', 425, 'Yes', '', 'Ladylike and classically cool, the Orion Zip Top Satchel has an angular shape and supple leather shell. Given added drama and dimension from chic embossed crocodile leather. this makes it ideal for everyday use, while still easily transitioning into evening. Delicate and modestly designed subtle black contrasting, angular side detailing and couture-quality metallic accents elevate this style to extraordinary levels.', '2018-06-12', 6, 11, 15, 4.5, '100% cowhide leather, polyester lining\r\nRemovable. adjustable shoulder strap\r\nGoldtone hardware & zipper closure\r\n1 inner zip & slip pocket', 'Orion-front.jpg', 'Orion-interrior.jpg', 'Orion-side.jpg', 'Orion-back.jpg'),
(9, 0, 'TOTE BAGS', 450, '', '', 'Roomy Enough For All Your Essentials', '2018-06-01', 0, 0, 0, 0, '', 'ToteBage.png', '', '', ''),
(10, 0, 'CROSSBODY BAGS', 400, '', '', 'Where Fashion Meets Functionality', '2018-05-31', 0, 0, 0, 0, '', 'corssbody.png', '', '', ''),
(11, 0, 'SATCHELS', 400, '', '', 'For Those Nights Out on The Town', '2018-06-25', 0, 0, 0, 0, '', 'satchels.png', '', '', ''),
(12, 0, 'CLUTCHES', 420, '', '', 'Small, practical and fashionable', '2018-01-26', 0, 0, 0, 0, '', 'clutches.png', '', '', ''),
(13, 1, 'CARINA BACKPACK BLACK', 525, '', '', 'No design better pairs fine details with ever-lasting durability like the Carina Backpack. A smooth leather black shell is studded with a brilliant stars-and-stripes applique that elevates and refines its design. A top handle makes for effortless carrying while sleek drawstrings and a golden-hued lock help keep everything inside.\r\n', '2018-05-23', 11.5, 12, 8, 4, '100% cowhide leather, polyester lining\r\nRemovable, adjustable shoulder strap\r\nGoldtone hardware & pushlock closure\r\n1 inner zip & slip pocket', 'carinaBackpack-front.jpg', 'carinaBackPack-interior.jpg', 'carinaBackPack-side.jpg', 'carinaBackpack-back.jpg'),
(17, 1, 'HANDLE BACKPACK BLACK', 395, 'No', '', 'The Handle Backpack pairs the ease of a traditional backpack with delicate, purse-like beauty. Capped by an easy-to-carry handle and anchored by easy-to-maneuver straps, this roomy leather bag is generously sized and effortlessly timeless. ', '2018-05-24', 12, 11, 2.5, 3.5, '100% cowhide leather, polyester lining.\r\nRemovable, adjustable shoulder strap\r\nGoldtone hardware & pushlock closure.\r\n1 inner zip & slip pocket, 1 pouch pocket', 'HandleBackPack-front.jpg', 'HandleBackPack-interior.jpg', 'HandleBackPack-side.jpg', 'HandleBackPack-back.jpg'),
(18, 1, 'Harper Mini Backpack Bowery Black', 238, 'Yes', '', '', '2018-04-24', 0, 0, 0, 0, '', 'Harper.jpg', '', '', ''),
(19, 2, 'ORION CROSSBODY ICY', 295, 'No', '', 'Smooth, supple icy colored leather sets the tone for the Orion Crossbody w/ Handle, which features the simplicity of a top handble bag and the ease of shoulder bag. Anchored by a can not miss polished metallic lock and accented a pair of roomy, inside pockets for serious storage.', '2018-06-22', 7, 5.5, 3, 3.5, '100% cowhide leather, polyester lining\r\nRemovable, adjustable shoulder strap\r\nGoldtone hardware & pushlock closure\r\n1 inner zip & slip pocket', 'OrionIcy-front.jpg', 'OrionIcy-interior.jpg', 'OrionIcy-side.jpg', 'OrionIcy-back.jpg'),
(20, 2, 'ORION CROSSBODY DK SILVER PYTHON', 295, 'No', 'Yes', 'Rich, dark silver python patterning sets dazzling tone for the Orion Crossbody, which features the simplicity of a clutch and the ease of shoulder bag. Anchored by a can not miss polished metallic lock and accented a pair of roomy, inside pockets for serious storage.', '2018-05-19', 5.5, 7, 3, 2.2, '100% cowhide leather, polyester lining\r\nRemovable, adjustable shoulder strap\r\nGoldtone hardware & pushlock closure\r\n1 inner zip & slip pocket\r\n\r\n', 'OrionSilver-front.jpg', 'OrionSilver-interior.jpg', 'OrionSilver-side.jpg', 'OrionSilver-back.jpg'),
(21, 2, 'HANDLE TOP HANDLE CROSSBODY IVORY', 295, 'NO', '', 'An instant icon, the Handle Top Handle Crossbody features an all-white aesthetic giving a sleek and sophisitcaed look. Delicate and modestly designed, this bag includes a polished metal pushlock, sturdy top handle and a removeable adjustable crossbody strap.', '2018-05-27', 9, 9, 1.25, 4, '100% cowhide leather, polyester lining\r\nRemovable, adjustable shoulder strap\r\nGoldtone hardware & pushlock closure.\r\n1 inner zip & slip pocket', 'HandleTopWhite-front.jpg', 'HandleTopWhite-interior.jpg', 'HandleTopWhite-side.jpg', 'HandleTopWhite-back.jpg'),
(22, 2, 'ORION CROSSBODY FLOAT', 275, 'No', '', 'Smooth, supple pink leather sets the tone for the Orion Crossbody, which features the simplicity of a clutch and the ease of shoulder bag. Anchored by a can not-miss polished metallic lock and accented a pair of roomy, inside pockets for serious storage. ', '2018-06-18', 5.5, 7, 3, 3.5, '100% cowhide leather, polyester lining\r\nRemovable, adjustable shouder strap\r\nGoldtone hardware & pushlock closure\r\n1 inner zip & slip pocket', 'OrionFloat-front.jpg', 'OrionFloat-interior.jpg', 'OrionFloat-side.jpg', 'OrionFloat-back.jpg'),
(23, 2, 'HANDLE TOP HANDLE CROSSBODY WHITE CROC', 395, 'No', 'Yes', 'An instant icon, the Handle Top Handle Crossbody features an all-white aesthetic given added drama and dimension from chic embossed crocodile leather. Delicate and modestly designed with subtle black contrasting, the bag includes a polished metal pushlock, sturdy top handle and a removeable adjustable crossbody strap.', '2018-06-02', 9, 9, 1.25, 4, '100% cowhide leather, polyester lining\r\nRemovable, adjustable shoulder strap\r\nGoldtone hardware & pushlock closure\r\n1 inner zip & slip pocket\r\n\r\n', 'HandleTopCroc-front.jpg', 'HandleTopCroc-interior.jpg', 'HandleTopCroc-side.jpg', 'HandleTopCroc-back.jpg'),
(24, 2, 'ORION CROSSBODY OPAL PYTHON', 250, 'No', 'Yes', 'Embossed, opal python patterning sets dazzling tone for the Orion Crossbody, which features the simplicity of a clutch and the ease of shoulder bag. Anchored by a can not miss polished metallic lock and accented a pair of roomy, inside pockets for serious storage.', '2018-06-10', 7, 5.5, 3, 2.2, '100% cowhide leather, polyester lining\r\nRemovable, adjustable shoulder strap\r\nGoldtone hardware & pushlock closure\r\n1 inner zip & slip pocket.', 'OrionPython-front.jpg', 'OrionPython-interior.jpg', 'OrionPython-side.jpg', 'OrionPython-back.jpg\r\n'),
(25, 2, 'HANDLE CROSSBODY GINGER', 380, 'No', '', ' A ginger leather shell embellished with subtly-sparking spheres give the Handle Crossbody an inimitable sense of distinction. The compact cross-body design makes for effortless mixing-and-matching with every pattern and every palette.', '2018-06-01', 9, 9, 1.25, 3.5, '100% cowhide leather, polyester lining.\r\nGoldtone hardware & pushlock closure.\r\n1 inner zip & slip pocket\r\n\r\n', 'HandleGinger-front.jpg', 'HandleGinger-interior.jpg', 'HandleGinger-side.jpg', 'HandleGinger-back.jpg'),
(26, 2, 'Mia Crossbody Bowery Black', 198, 'Yes', '', '', '2018-01-01', 6, 6, 2.5, 2.2, '', 'BoweryMia-front.jpg', 'BoweryMia-interior.jpg', 'BoweryMia-side.jpg', 'BoweryMia-back.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subId` int(11) NOT NULL,
  `subscribeEmail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `userFirstName` varchar(500) NOT NULL,
  `userLastName` varchar(500) NOT NULL,
  `userEmail` varchar(400) NOT NULL,
  `userPassword` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `coupans`
--
ALTER TABLE `coupans`
  ADD PRIMARY KEY (`coupan_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `indEmail` (`email`(767));

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Idindex` (`product_id`),
  ADD KEY `brIndex` (`product_brand`),
  ADD KEY `nameIndex` (`product_title`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subId`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupans`
--
ALTER TABLE `coupans`
  MODIFY `coupan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
