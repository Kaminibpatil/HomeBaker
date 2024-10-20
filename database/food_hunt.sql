-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 07:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`customer_id`, `product_id`, `product_name`, `product_image`, `product_price`) VALUES
(8483500, 1818212321, 'Lemon Cheesecake', 'brownies2.png', 67.00);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `admin_name`, `admin_pwd`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `customer_id` int(50) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_mobile` text NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `email_status` int(11) NOT NULL DEFAULT 0,
  `mail_otp` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `forgototp` int(11) NOT NULL,
  `created_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`customer_id`, `customer_name`, `customer_mobile`, `customer_password`, `email_status`, `mail_otp`, `customer_email`, `forgototp`, `created_dt`) VALUES
(8483500, 'nikita', '9898989898', '$2y$10$A98qT7IZg7vlpMZZZ9mgce7Xdi/H4ZrhG/1XRlDyPbQ0sut1zjOXa', 1, 0, 'niki@gmil.in', 0, '2024-06-04 19:12:07'),
(298270080, 'Kamini', '8830158664', '$2y$10$sO.raQis.b.bm7O7Bd6BIOnflTGy2tkoEfi6n/yvkR7zC0.4TA9x2', 1, 0, 'Patilkb1910@gmail.com', 375394, '2024-06-04 19:12:07'),
(333599337, 'akash Patil', '9637668658', '$2y$10$mLhXIIgcSfvJEETyRoE1/.HqzjiMbZPlBFn/BP1IeEc0Gbq2acCrK', 1, 0, 'akash@gmail.in', 0, '2024-06-13 21:58:39'),
(405725445, 'Sanjana Kailas Mali', '9833291030', '$2y$10$BP9DESJjsOJCyLeLqxpQ2.RECz4RDKHRSGY1gV4lXCcRSyW4jthaC', 0, 155346, 'sanjanamali460@gmail.com', 0, '2024-06-04 19:12:07'),
(570142900, 'Sonali Kumari', '7897417544', '$2y$10$50F4.uppJo3rC2ienkgayuz4jWXrk/nJwnBFAGHZOIulf0HIzywSi', 1, 0, 'sonali@gmail.in', 0, '2024-06-13 22:38:17'),
(582460851, 'Travel  Tourism Website', '7474747474', '$2y$10$WRi6R/.eRPS3UMkTfxIVCO35..mkYxyJ0lvcCR4WcFvizoOBFJf9y', 0, 605584, 'travel@gmial.in', 0, '2024-06-05 07:06:03'),
(730382088, 'anuradha', '7897897415', '$2y$10$OVIhlZkrZEDYBwc7y9IZEuD2yaO2Y9VcUwL3R60M771M4R5HOzAzS', 1, 0, 'anu@gmai.in', 0, '2024-06-04 19:12:07'),
(983348907, 'sangita patil', '7706109537', '$2y$10$lxjWONV05WeNgM.kIsprEev0pATFy9YCm6QWnVzamjbqPFr7F3Ufu', 0, 971419, 'sangita@gmil.in', 0, '2024-06-05 07:10:09'),
(1485505497, 'aakash', '9637666458', '$2y$10$RdhG7NIhd6hDqqSa.f58V.bPRJx8ZE09ltGzI07dYqBdravdhZ/s2', 1, 0, 'akash@gmil.in', 0, '2024-06-05 07:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `customer_name` text NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `subject` text DEFAULT NULL,
  `message` text NOT NULL,
  `c_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`customer_name`, `customer_email`, `subject`, `message`, `c_id`, `customer_id`, `dt`) VALUES
('Kamini', 'Patilkb1910@gmail.com', '', 'wsefuiougf', 1, 103949102, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', '', 'goood', 2, 0, '2024-06-04 20:53:25'),
('Sanjana Kailas Mali', 'sanjanamali460@gmail.com', 'Suggestion', 'ABCD', 4, 511100284, '2024-06-04 20:53:25'),
('Kamini', 'smali@gmail.in', 'trial', 'Its first message by customer', 5, 0, '2024-06-04 20:53:25'),
('Kamini', 'smali@gmail.in', 'trial', '1st message not sent.', 6, 0, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', 'trial 3', 'message ', 7, 511100284, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', 'trial', 'qwerty6uiokjhnc', 8, 511100284, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', 'marathi', 'marathiiii', 9, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@mail.com', 'trial', 'asdfghj', 10, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@mail.com', 'trial', 'aaaaa', 11, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilk@gmail.com', '11111111111111111', 'qqqqqqqqqqqqqqqqq', 12, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilk@gmail.com', '11111111111111111', 'qqqqqqqqqqqqqqqqqqq', 13, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', '11111111111111111', 'qqqqqqqqqqqqqqqqqqqqqq', 14, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', '1234567uh', 'qqASDFFXSARTY', 15, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', '1234567uh', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 16, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', '11111111111111111', 'qqqqqqqqqqqqqqqqqqqqqqqqqq', 17, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', '', 'qwsedferfdcg ', 18, 298270080, '2024-06-04 20:53:25'),
('Patil', 'bpatil@gmail.com', 'trial', '456666666666666666', 19, 298270080, '2024-06-04 20:53:25'),
('Kamini', 'Patilkb1910@gmail.com', '', 'oiudsfxcgh', 20, 298270080, '2024-06-04 20:53:34'),
('Kamini Bansilal patil', 'akashi@gmail.in', 'mornining', 'morning mail by aakash', 21, 1485505497, '2024-06-05 07:19:11'),
('Kamini Bansilal patil', 'kbp@gmail.com', 'wqw', 'qasz', 22, 1485505497, '2024-06-05 07:25:40'),
('Kamini Bansilal patil', 'kbp@gmail.com', 'mornining', 'qwery7io', 23, 1485505497, '2024-06-05 07:30:09'),
('Kamini Bansilal patil', 'kbp@gmail.com', 'mornining', 'qwery7io', 24, 1485505497, '2024-06-05 07:30:59'),
('Kamini Bansilal patil', 'kbp@gmail.com', 'mornining', 'qwery7io', 25, 1485505497, '2024-06-05 07:32:16'),
('sanjana mali', 'kbp@gmail.com', 'mornining', 'aaaaaaaaaaa', 26, 1485505497, '2024-06-05 07:37:53'),
('Kamini', 'Patilkb1910@gmail.com', '11111111111111111', '1111111111111111111', 27, 0, '2024-06-05 19:00:39'),
('Kamini', 'Patilkb1910@gmail.com', 'trial', 'aaaaaaaaaaaaa', 28, 298270080, '2024-06-08 14:38:20'),
('Sonali Kumari', 'sonali@gmail.in', 'final exam', 'tomorrow is your final exam, be prepared!', 29, 570142900, '2024-06-13 22:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(30) NOT NULL,
  `menu_category` text NOT NULL,
  `menu_name` text NOT NULL,
  `menu_image` text NOT NULL,
  `menu_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_category`, `menu_name`, `menu_image`, `menu_price`) VALUES
(75649999, 'dinner', 'Cookies and Cream Cupcake', 'whisk.png', 130),
(345146023, 'lunch', 'Cherry On The Top', 'delight.png', 90),
(418931856, 'break-fast', 'Sweet Cupcakes', 'crumb.png', 50),
(954527545, 'dinner', 'Chocolate Donuts', 'whisk1.png', 120),
(1105409653, 'break-fast', 'Blueberry Cake', 'crumb1.png', 80),
(1180703811, 'break-fast', 'Three Tier Cake', 'crumb2.png', 60),
(1239705948, 'break-fast', 'Mix Fruit Cake', 'crumb3.png', 70),
(1252253626, 'dinner', 'Strawberry Cake', 'whisk2.png', 160),
(1311719353, 'dinner', 'Mix Fruit Cake', 'whisk3.png', 100),
(1535064878, 'lunch', 'Caramel Vanilla', 'delight1.png', 130),
(1583924565, 'lunch', 'Chocolate Angel', 'delight2.png', 120),
(1685670754, 'lunch', 'Vanilla Cake', 'delight3.png', 140),
(1837613520, 'break-fast', 'Chocolate Cupcake', 'crumb4.png', 70),
(1878502763, 'lunch', 'Mix Fruit Cake', 'delight4.png', 150),
(1963481407, 'dinner', 'pastry combos', 'whisk4.png', 200);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `customer_id` int(20) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`customer_id`, `product_id`, `product_name`, `product_image`, `product_price`, `Qty`, `address`, `date`) VALUES
(8483500, '55493728', 'Salted+Caramel', 'image/cheese2.png', 125, 1, '', '2024-06-13 11:33:59'),
(8483500, '1239705948', 'Mix+Fruit+Cake', 'image/crumb3.png', 70, 1, '', '2024-06-13 11:38:30'),
(570142900, '305287423', 'Classic+New+York+Che', 'image/brownies3.png', 76, 1, 'Jalgaon, Maharashtra', '2024-06-13 23:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(30) NOT NULL,
  `product_category` text DEFAULT NULL,
  `product_name` text NOT NULL,
  `product_image` varchar(1000) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_ratting` decimal(10,1) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `product_category`, `product_name`, `product_image`, `product_price`, `product_ratting`, `product_description`, `product_city`) VALUES
(55493728, 'cheesecakes', 'Salted Caramel', 'cheese2.png', 129, 3.9, 'Sweet and salty, often topped with caramel buttercream and a drizzle of caramel sauce.', ''),
(65860584, 'pastries', 'Strawberry', 'p1.png', 109, 4.8, 'Sweet and fruity, great for jam-filled pastries and fresh fruit tarts.', ''),
(86386585, 'cupcakes', 'Cherry Cupcakes ', 'cup3.png', 99, 3.5, 'Luscious cherry cupcakes infused with juicy cherries and topped with sweet cherry frosting.\r\n', ''),
(91448773, 'cheesecakes', 'Carrot ', 'cheese1.png', 99, 4.2, 'Moist and spiced, usually with a cream cheese frosting.', ''),
(123945106, 'donut', 'Cinnamon Sugar', 'D5.png', 79, 5.0, 'A cinnamon sugar donut is a soft, fried or baked donut generously coated in a mixture of cinnamon and granulated sugar, offering a sweet and spicy flavor.\r\n', ''),
(143953780, 'cupcakes', 'Mix fruit Cupcakes ', 'cu2.png', 99, 4.2, 'Delightful mixed fruit cupcakes featuring a medley of fresh fruit chunks and a light, fruity frosting.\r\n', ''),
(263044380, 'cheesecakes', 'Cookies and Cream', 'cheese4.png', 99, 5.0, 'Vanilla or chocolate base with crushed cookies, topped with cookies and cream frosting.', ''),
(268443829, 'cheesecakes', 'Red Velvet', 'cheese3.png', 89, 4.0, 'Mild chocolate flavor with a distinctive red color, typically topped with cream cheese frosting.', ''),
(380316616, 'cheesecakes', 'Blueberry Cupcakes', 'profile8.jpeg', 49, 4.1, 'If you do, you will be signed out', ''),
(514658255, 'cupcakes', 'Strawberry Cupcake', 'cupcake.png', 90, 4.1, 'A moist cupcake infused with fresh strawberry flavor and topped with strawberry frosting.', 'jalgaon'),
(521344706, 'donut', 'Apple fritter ', 'D2.png', 209, 3.1, 'An apple fritter is a deep-fried pastry made with dough mixed with chunks of apples and cinnamon, often glazed with a sweet icing.\r\n', ''),
(529857443, 'pastries', 'Vanilla Pastry', 'pastries.png', 90, 5.0, 'A classic treat with layers of fluffy vanilla sponge cake and velvety vanilla frosting.\n', 'pune'),
(605767379, 'cupcakes', 'Chocolate Cupcake', 'cupcake2.png', 90, 4.4, 'These flavourful burgers are jam-packed with nutritious goodies like flax and oats. ', 'indira nagar, nashik'),
(637917900, 'cupcakes', 'Strawberry Cupcakes ', 'cup5.png', 159, 4.1, 'Fresh strawberry cupcakes bursting with real strawberries and topped with a sweet strawberry frosting.\r\n', ''),
(811189695, 'pastries', 'Rasmalai Pastry', 'pastries1.png', 70, 5.0, 'Rich and decadent, a chocolate lover\'s delight with a creamy chocolate frosting.\nAn exotic fusion of soft cake and creamy rasmalai, infused with cardamom and saffron.\n', 'pathardi phata, nashik'),
(896425900, 'pastries', 'Raspberry', 'p2.png', 89, 4.0, 'Tart and sweet, popular in jams and as a filling.', ''),
(904482164, 'cupcakes', 'Vanilla Cupcake', 'cupcake3.png', 55, 4.2, 'Classic and light, a vanilla-flavored cupcake topped with smooth vanilla buttercream.\n', 'panchavati, nashik'),
(953017977, 'donut', 'Caramel donut', 'D1.png', 99, 4.2, 'A caramel donut is a sweet, fluffy pastry coated or filled with rich, creamy caramel for a decadent treat.', ''),
(1028143799, 'pastries', 'Pumpkin spice', 'p3.png', 200, 5.0, 'A blend of spices like cinnamon, nutmeg, and cloves, perfect for autumn pastries.', ''),
(1099553793, 'pastries', 'Almond', 'p4.png', 100, 4.8, 'Nutty and aromatic, often used in frangipane and almond croissants.', ''),
(1143819252, 'cheesecakes', 'Chocolate Cheesecake', 'brownies1.png', 50, 4.3, 'Extra-virgin olive oil, garlic, mozzarella\n                                            cheese, onions, mushrooms, green olives, black olivesA decadent cheesecake infused with rich chocolate, featuring a chocolate cookie crust and a velvety, chocolate ganache topping.\n', 'Mumbai'),
(1223633695, 'donut', 'Stack Of Donuts', 'donuts1.png', 99, 5.1, 'A delightful tower of multiple doughnuts, stacked for sharing or indulgence.', 'AmruthDham, panchavati, nashik'),
(1280710984, 'cupcakes', 'Cherry Malt Milkshake', 'cupcake1.png', 120, 4.4, 'A creamy milkshake blended with cherry flavor and a hint of malt, perfect for a nostalgic treat.', 'Dhule'),
(1334663211, 'donut', 'Mini Donuts', 'donuts.png', 70, 4.0, 'Bite-sized, sweet, and fluffy doughnuts perfect for snacking.\n', 'College road, nashik'),
(1480265586, 'pastries', 'Strawberry Pastry', 'pastries2.png', 80, 5.0, 'Light sponge cake filled with luscious strawberry cream and fresh strawberry slices.', 'gangapur road, nashik'),
(1524549450, 'donut', 'Coconut donut ', 'D4.png', 85, 5.0, 'A coconut donut is a soft, cake or yeast donut coated in sweet, shredded coconut, often with a glaze or icing base.\r\n', ''),
(1748666230, 'cupcakes', 'Sample Pastry', 'profile18.jpeg', 89, 3.5, 'You can also search for the product on Google Search.', ''),
(1818212321, 'cheesecakes', 'Lemon Cheesecake', 'brownies2.png', 67, 4.3, 'A tangy and refreshing cheesecake with a zesty lemon flavor, topped with a light lemon glaze on a crunchy graham cracker crust.', 'Nashik road, nashik'),
(1856490331, 'cheesecakes', 'Strawberry Cheesecake', 'brownies.png', 89, 3.9, 'tempting trio of doughnuts, offering a variety of flavors in one serving.A luscious cheesecake topped with a sweet strawberry compote and fresh strawberries, all on a crisp graham cracker base.', 'Nashik'),
(1904870669, 'donut', 'Duo Donut', 'donuts2.png', 120, 5.0, 'A pair of deliciously crafted doughnuts, often complementary in flavors.\n', 'Malegon'),
(1987519404, 'donut', 'Boston cream ', 'D3.png', 99, 3.7, 'A Boston cream donut is a round, yeast-raised donut filled with creamy vanilla custard and topped with a rich chocolate glaze.\r\n', ''),
(2039601561, 'donut', 'Trio Donuts', 'donuts3.png', 140, 4.2, 'A delightful tower of multiple doughnuts, stacked for sharing or indulgence.\nA tempting trio of doughnuts, offering a variety of flavors in one serving.', 'Pune'),
(2124393466, 'pastries', 'Mix Fruit Pastry', 'pastries3.png', 80, 4.1, 'best ice cream in summer to cool your body and mind ...Tender sponge cake layered with creamy custard and a medley of fresh seasonal fruits.', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `r_id` int(11) NOT NULL,
  `review_name` varchar(255) NOT NULL,
  `review_desc` varchar(255) NOT NULL,
  `review_pic` varchar(255) NOT NULL,
  `review_rating` int(11) NOT NULL,
  `reviewmob` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`r_id`, `review_name`, `review_desc`, `review_pic`, `review_rating`, `reviewmob`) VALUES
(10, 'Mukesh patil', '\"The cake is consistently moist and flavorful, with great customer service.\"', 'mukesh.jpg', 5, '2147483647'),
(11, 'Vaibhav jadhav', '\"Highly recommended for custom cakes and friendly service.\"', 'vaibhav.jpg', 4, '2147483647'),
(12, 'prajkta Koli', '\"Beautifully decorated cakes and fantastic customer service, perfect for special occasions.\"', 'review.jpg', 5, '2147483647'),
(13, 'Prachi Jadhav ', '\"Charming decor and excellent service, with the London Fog being a standout!\"', 'review2..jpg', 4, '789654785'),
(14, 'sangita', 'We loved almost all the items, it was quite difficult to choose out the best of all that we tasted!', 'rating1.jpeg', 5, '2147483647'),
(16, 'Aditya Mote', 'Its was a sample review which will be displayed on admin as well user side.\r\n', 'profile6.jpeg', 5, '7897897897');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `customer_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `product_name` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`customer_id`, `product_id`, `product_name`, `product_image`, `product_price`) VALUES
(2147483647, 2028185243, 'BBQ chicken breast', 'BBQ chicken breast.png', 140),
(2147483647, 1280710984, 'Cherry Malt Milkshake Cupcakes', 'pastries1.png', 120),
(600903670, 1105409653, 'Blueberry Cake', 'crumb1.png', 80),
(600903670, 811189695, 'Rasmalai Pastry', 'pastries1.png', 70),
(103949102, 1583924565, 'Chocolate Angel', 'delight2.png', 120),
(103949102, 1105409653, 'Blueberry Cake', 'crumb1.png', 80),
(103949102, 1105409653, 'Blueberry Cake', 'crumb1.png', 80),
(103949102, 1105409653, 'Blueberry Cake', 'crumb1.png', 80),
(103949102, 1105409653, 'Blueberry Cake', 'crumb1.png', 80),
(511100284, 418931856, 'Sweet Cupcakes', 'crumb.png', 50),
(511100284, 1105409653, 'Blueberry Cake', 'crumb1.png', 80),
(1485505497, 514658255, 'Strawberry Cupcake', 'cupcake.png', 90),
(1485505497, 904482164, 'Vanilla Cupcake', 'cupcake3.png', 55),
(298270080, 268443829, 'Red Velvet', 'cheese3.png', 89),
(298270080, 1143819252, 'Chocolate Cheesecake', 'brownies1.png', 50),
(570142900, 1583924565, 'Chocolate Angel', 'delight2.png', 120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `admin_name` (`admin_name`),
  ADD UNIQUE KEY `admin_pwd` (`admin_pwd`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_mobile` (`customer_mobile`) USING HASH;

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
