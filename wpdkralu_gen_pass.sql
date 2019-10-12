-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2019 at 01:37 PM
-- Server version: 5.7.27
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpdkralu_gen_pass`
--

-- --------------------------------------------------------

--
-- Table structure for table `pass_gen`
--

CREATE TABLE `pass_gen` (
  `id` int(11) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `e_post` varchar(255) NOT NULL,
  `uses` int(11) NOT NULL,
  `current_uses` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass_gen`
--

INSERT INTO `pass_gen` (`id`, `uid`, `password`, `e_post`, `uses`, `current_uses`) VALUES
(45, 'X26diZLM4asOUd9fvi', 'HW0ycMWe08BavzdBMv', 'marcus@jmb.nu', 2, 0),
(46, 'cfxBVvl2nmaJYRVmTB', 'UCjhwpzVt2530hiyTe', 'marcus@jmb.nu', 2, 0),
(47, 'zEt3pkGLrBAS2AVFwf', 'HhjiuIWw75hUCQy6TY', 'marcus@jmb.nu', 2, 0),
(48, 'Aw6YL9RyiNfD57jaDN', 'nBlQXTB78RQdTqKZpv', 'marcus@jmb.nu', 2, 0),
(49, 'FW82e1pnyqQyKMJFEf', 'Xl9emkrN2ZXpNCmVEA', 'marcus@jmb.nu', 2, 0),
(50, 'oZ8jxA8UHpTaoMcdM9', 'lCHupjcFpHHAr5zAo6', 'marcus@jmb.nu', 2, 0),
(51, '1g20TpztpHYXXJgAjj', 'lc4CPSDCDP9WTacWa6', 'marcus@jmb.nu', 2, 0),
(52, 'VIAcicP3jNXCEzS9Wa', 'YgHgJO57NQvoZq7zDp', 'marcus@jmb.nu', 2, 0),
(53, 'N695dnFJrReAUuHm27', 'eiJgqsK96VeKb1Ql74', 'marcus@jmb.nu', 2, 0),
(54, 'iTlJr8MJ9N6BWd22ay', 'HeP9wxfR8IfFxxzTh0', 'marcus@jmb.nu', 2, 0),
(55, 'xTuP2en16YbIA8Rg2b', '0vmjkRd27ZsOq0IVQK', 'marcus@jmb.nu', 2, 0),
(56, 'Y0tPA5rsPjL07gbrd3', 'QyckPiMMTYuuDtu6i4', 'marcus@jmb.nu', 2, 0),
(57, '5l9Y1xIjUlRljzgCwy', '2iRwYvITaV517bmg9o', 'marcus@jmb.nu', 2, 0),
(58, 'zFbjYgIc0VGbGKE49R', 'JxDSqejWARIXpiCACB', 'marcus@jmb.nu', 2, 0),
(59, 'k6mZfXpb8kECirq5Sn', 'ud3czR0T5YtoINu5NK', 'marcus@jmb.nu', 2, 0),
(60, 'wJKnaLx6m6SDjMg9WC', 'A8Gco8JRFTzjX63Itd', 'marcus@jmb.nu', 2, 0),
(61, 'NGLh4V3RW7Tp0TLPx1', 'pD9gllcUJEGbmtS8LW', 'marcus@jmb.nu', 2, 0),
(62, 'lffKliH9aMab8GvNFP', '5WyE0iGGM9NGI8VXTg', 'marcus@jmb.nu', 2, 0),
(63, 'szFrW8SNjl7IzgGbAF', 'sxuDZAY7JITC8mbNN8', 'marcus@jmb.nu', 2, 0),
(64, 'aO5TK6onh2gcHJvHsW', '6PGwzURoRd8Imixrci', 'marcus@jmb.nu', 2, 0),
(65, 'edpQZHI39eM0yQLqKq', 'dHJrL4nCB8nHaBUArU', 'marcus@jmb.nu', 2, 0),
(66, '4i1n5LlpK6tZGrRo57', 'xaYKxbFtgXVwn0OpnU', 'marcus@jmb.nu', 2, 0),
(67, 'jjgYdL4KPsaXYibwQ2', 'K35O9hZrJJL7o4rF3F', 'marcus@jmb.nu', 2, 0),
(68, 'NjW2xsP6dK0iLXdOJI', 'tIP8oQZ9srEMqr6muD', 'marcus@jmb.nu', 2, 0),
(69, 'zr1DcifBEY5d95aEzL', 'y17ElXWsYftvn3XpH9', 'marcus@jmb.nu', 2, 0),
(70, 'MwVVgGtoNomqA8NJO1', 'IqeLfjWVLEJWvvtrrK', 'marcus@jmb.nu', 2, 0),
(71, 'yIYEZnT46hwnoGGWCl', 'qUSirbBuRqRevqXu5W', 'marcus@jmb.nu', 2, 0),
(72, 'FKxyNKEtymEyQpwuIF', 'MavUk7GzvSIdVoXsWK', 'marcus@jmb.nu', 2, 0),
(73, '6z2QcN0YzRYYfxuAY7', 'QzSGfouUQ3PGWWgYNs', 'marcus@jmb.nu', 2, 0),
(74, 'u9oBy2xIr2WYfQspvs', 'pTmGxLE7yNO2Ijb7UK', 'marcus@jmb.nu', 2, 2),
(75, 'RKb0cLcgXmvwMvNmgF', 'NqBEogxglSTvLKgXLs', 'marcus@jmb.nu', 2, 0),
(76, 'mM2ycrRup4BJR0htrS', '6dyHMukebCaQMxDP6P', 'marcus@jmb.nu', 2, 0),
(77, 'nHOySK91DsRtlcRBZW', 'Xn2iMaSnIgquoNbdm3', 'marcus@jmb.nu', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pass_gen`
--
ALTER TABLE `pass_gen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pass_gen`
--
ALTER TABLE `pass_gen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
