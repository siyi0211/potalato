-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2021 at 08:09 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `potalato`
--

-- --------------------------------------------------------

--
-- Table structure for table `my favourite`
--

DROP TABLE IF EXISTS `my favourite`;
CREATE TABLE IF NOT EXISTS `my favourite` (
  `recipe_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(99) NOT NULL,
  `recipe_img` varchar(999) NOT NULL,
  `recipe_description` text NOT NULL,
  `recipe_ingredients` text NOT NULL,
  `recipe_category` varchar(50) NOT NULL,
  `recipe_cooking_style` varchar(50) NOT NULL,
  `recipe_directions` text NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_name`, `recipe_img`, `recipe_description`, `recipe_ingredients`, `recipe_category`, `recipe_cooking_style`, `recipe_directions`, `create_user`, `time_created`) VALUES
(1, 'Mashed Potato', 'img/webimg/Creamy-Mashed-Potato_8-copy.jpg', 'This Crispy Garlic Roasted Potatoes recipe is a simple way to roast potatoes. It looks impressive, tastes great and is always a hit! This recipe will ensure even first-timers get crispy tops and fluffy insides.', '3 tablespoons unsalted butter (melted)\r\n\r\n3 tablespoons extra-virgin olive oil\r\n\r\n4 pounds russet potatoes(peeled and thinly sliced)\r\n\r\n4 cloves garlic (thinly sliced lengthwise)\r\n\r\ncoarse salt and fresh ground pepper\r\n\r\nA handful of fresh parsley (chopped)', 'Side Dish', 'Western style', '1.\r\nPreheat oven to 375 f/190c.\r\n2.\r\nStart with Slicing the potatoes about a 1/8 inch thick.\r\n3.\r\nIn a small bowl, combine butter and oil. Brush the bottom of a round large baking dish with some of the butter/oil mixture. Coat the potatoes with the mixture.\r\n4.\r\nArrange potato slices around the dish slightly overlapping. Wedge the thin-sliced garlic throughout and season well with salt and pepper. Bake until golden brown and the potatoes are cooked through.\r\n5.\r\nBake until golden brown and the potatoes are cooked through.', 'France C', '2021-04-20 05:33:18'),
(2, 'Baked Potatoes', 'img/webimg/Creamy-Twice-Baked-Potatoes_EXPS_CF2BZ20_13043_B12_10_3b-1.jpg', 'This Crispy Garlic Roasted Potatoes recipe is a simple way to roast potatoes. It looks impressive, tastes great and is always a hit! This recipe will ensure even first-timers get crispy tops and fluffy insides.', '3 tablespoons unsalted butter (melted)\r\n\r\n3 tablespoons extra-virgin olive oil\r\n\r\n4 pounds russet potatoes(peeled and thinly sliced)\r\n\r\n4 cloves garlic (thinly sliced lengthwise)\r\n\r\ncoarse salt and fresh ground pepper\r\n\r\nA handful of fresh parsley (chopped)', 'Main Dish', 'Western style', '1.\r\nPreheat oven to 375 f/190c.\r\n2.\r\nStart with Slicing the potatoes about a 1/8 inch thick.\r\n3.\r\nIn a small bowl, combine butter and oil. Brush the bottom of a round large baking dish with some of the butter/oil mixture. Coat the potatoes with the mixture.\r\n4.\r\nArrange potato slices around the dish slightly overlapping. Wedge the thin-sliced garlic throughout and season well with salt and pepper. Bake until golden brown and the potatoes are cooked through.\r\n5.\r\nBake until golden brown and the potatoes are cooked through.', 'connie ccc', '2021-04-20 05:38:59'),
(3, 'Potato Pies', 'img/webimg/Sweet-Potato-Pie_EXPS_GHBZ18_1203_B08_15_3b.jpg', 'This Crispy Garlic Roasted Potatoes recipe is a simple way to roast potatoes. It looks impressive, tastes great and is always a hit! This recipe will ensure even first-timers get crispy tops and fluffy insides.', '3 tablespoons unsalted butter (melted)\r\n\r\n3 tablespoons extra-virgin olive oil\r\n\r\n4 pounds russet potatoes(peeled and thinly sliced)\r\n\r\n4 cloves garlic (thinly sliced lengthwise)\r\n\r\ncoarse salt and fresh ground pepper\r\n\r\nA handful of fresh parsley (chopped)', 'Appetizer and Snacks', 'Western style', '1.\r\nPreheat oven to 375 f/190c.\r\n2.\r\nStart with Slicing the potatoes about a 1/8 inch thick.\r\n3.\r\nIn a small bowl, combine butter and oil. Brush the bottom of a round large baking dish with some of the butter/oil mixture. Coat the potatoes with the mixture.\r\n4.\r\nArrange potato slices around the dish slightly overlapping. Wedge the thin-sliced garlic throughout and season well with salt and pepper. Bake until golden brown and the potatoes are cooked through.\r\n5.\r\nBake until golden brown and the potatoes are cooked through.', 'Cougarr', '2021-04-20 05:38:59'),
(4, 'Potato Salad', 'img/webimg/Easy-Potato-Salad-Recipe-2-1200.jpg', 'This Crispy Garlic Roasted Potatoes recipe is a simple way to roast potatoes. It looks impressive, tastes great and is always a hit! This recipe will ensure even first-timers get crispy tops and fluffy insides.', '3 tablespoons unsalted butter (melted)\r\n\r\n3 tablespoons extra-virgin olive oil\r\n\r\n4 pounds russet potatoes(peeled and thinly sliced)\r\n\r\n4 cloves garlic (thinly sliced lengthwise)\r\n\r\ncoarse salt and fresh ground pepper\r\n\r\nA handful of fresh parsley (chopped)', 'Salad', 'Vegetarian', '1.\r\nPreheat oven to 375 f/190c.\r\n2.\r\nStart with Slicing the potatoes about a 1/8 inch thick.\r\n3.\r\nIn a small bowl, combine butter and oil. Brush the bottom of a round large baking dish with some of the butter/oil mixture. Coat the potatoes with the mixture.\r\n4.\r\nArrange potato slices around the dish slightly overlapping. Wedge the thin-sliced garlic throughout and season well with salt and pepper. Bake until golden brown and the potatoes are cooked through.\r\n5.\r\nBake until golden brown and the potatoes are cooked through.', 'Doona', '2021-04-20 05:44:14'),
(5, 'Garlic Potatoes', 'img/webimg/garlic-potatoes3.jpg', 'This Crispy Garlic Roasted Potatoes recipe is a simple way to roast potatoes. It looks impressive, tastes great and is always a hit! This recipe will ensure even first-timers get crispy tops and fluffy insides.', '3 tablespoons unsalted butter (melted)\r\n\r\n3 tablespoons extra-virgin olive oil\r\n\r\n4 pounds russet potatoes(peeled and thinly sliced)\r\n\r\n4 cloves garlic (thinly sliced lengthwise)\r\n\r\ncoarse salt and fresh ground pepper\r\n\r\nA handful of fresh parsley (chopped)', 'Appetizer and Snacks', 'Western style', '1.\r\nPreheat oven to 375 f/190c.\r\n2.\r\nStart with Slicing the potatoes about a 1/8 inch thick.\r\n3.\r\nIn a small bowl, combine butter and oil. Brush the bottom of a round large baking dish with some of the butter/oil mixture. Coat the potatoes with the mixture.\r\n4.\r\nArrange potato slices around the dish slightly overlapping. Wedge the thin-sliced garlic throughout and season well with salt and pepper. Bake until golden brown and the potatoes are cooked through.\r\n5.\r\nBake until golden brown and the potatoes are cooked through.', 'Ben Lee', '2021-04-20 05:44:14'),
(6, 'Sliced Potatoes', 'img/webimg/53a9eb48e41df1bdd92e0979623c7a7b.jpg', 'This Crispy Garlic Roasted Potatoes recipe is a simple way to roast potatoes. It looks impressive, tastes great and is always a hit! This recipe will ensure even first-timers get crispy tops and fluffy insides.', '3 tablespoons unsalted butter (melted)\r\n\r\n3 tablespoons extra-virgin olive oil\r\n\r\n4 pounds russet potatoes(peeled and thinly sliced)\r\n\r\n4 cloves garlic (thinly sliced lengthwise)\r\n\r\ncoarse salt and fresh ground pepper\r\n\r\nA handful of fresh parsley (chopped)', 'Main Dish', 'Western style', '1.\r\nPreheat oven to 375 f/190c.\r\n2.\r\nStart with Slicing the potatoes about a 1/8 inch thick.\r\n3.\r\nIn a small bowl, combine butter and oil. Brush the bottom of a round large baking dish with some of the butter/oil mixture. Coat the potatoes with the mixture.\r\n4.\r\nArrange potato slices around the dish slightly overlapping. Wedge the thin-sliced garlic throughout and season well with salt and pepper. Bake until golden brown and the potatoes are cooked through.\r\n5.\r\nBake until golden brown and the potatoes are cooked through.', 'Hazel', '2021-04-20 05:47:31'),
(7, 'Cheezy Potatoes', 'img/webimg/Crockpot-Cheesy-Potatoes124.jpg', 'This Crispy Garlic Roasted Potatoes recipe is a simple way to roast potatoes. It looks impressive, tastes great and is always a hit! This recipe will ensure even first-timers get crispy tops and fluffy insides.', '3 tablespoons unsalted butter (melted)\r\n\r\n3 tablespoons extra-virgin olive oil\r\n\r\n4 pounds russet potatoes(peeled and thinly sliced)\r\n\r\n4 cloves garlic (thinly sliced lengthwise)\r\n\r\ncoarse salt and fresh ground pepper\r\n\r\nA handful of fresh parsley (chopped)', 'Side Dish', 'Western style', '1.\r\nPreheat oven to 375 f/190c.\r\n2.\r\nStart with Slicing the potatoes about a 1/8 inch thick.\r\n3.\r\nIn a small bowl, combine butter and oil. Brush the bottom of a round large baking dish with some of the butter/oil mixture. Coat the potatoes with the mixture.\r\n4.\r\nArrange potato slices around the dish slightly overlapping. Wedge the thin-sliced garlic throughout and season well with salt and pepper. Bake until golden brown and the potatoes are cooked through.\r\n5.\r\nBake until golden brown and the potatoes are cooked through.', 'Patty', '2021-04-20 05:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `is_admin`, `time_created`) VALUES
(7, 'howjuemin', 'iloveacg@hotmail.com', '$2y$10$6pX5aKY2KrWXx2wvHB3EW.yZgDetL2xwO0nazR8nW4/sSWOHzO4TO', 0, '2021-04-17 16:47:39'),
(8, 'Beijing_duck', 'hahahaha@gmail.com', '$2y$10$7YErLzegapyqaKeIiD3fwO7iv80W/Oe84P6.pEHh3s9OPnOYs697i', 0, '2021-04-17 16:52:21'),
(13, 'admin', 'admin@gmail.com', '$2y$10$l.Z7MOOEJzdIAay/GqGJeOGDJKFgr1cBp74sTd3Cu.KdvzoMMEuVm', 1, '2021-04-21 08:08:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
