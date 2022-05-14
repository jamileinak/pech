-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 03:32 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pechhulp`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `area_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area_name`) VALUES
(1, 'breda'),
(2, 'tilburg'),
(3, 'rotterdam'),
(4, 'amsterdam'),
(5, 'oosterhout'),
(6, 'gilze'),
(7, 'rijen'),
(8, 'eindhoven');

-- --------------------------------------------------------

--
-- Table structure for table `contactform_submissions`
--

CREATE TABLE `contactform_submissions` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `message` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactform_submissions`
--

INSERT INTO `contactform_submissions` (`id`, `email`, `contact_number`, `message`) VALUES
(1, 'sasa@gmail.com', 57567575, 'fgngngfngng\r\ngfhdfgfg\r\ngfdhhhhhhhhh\r\n\r\nfdhfdfdg'),
(2, 'eli@gmail.nl', 565656565, 'hfghfdghdfgj\r\nkghkhgkggk\r\nfghkf\r\ngkjhkgh');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `number_plate` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `vervangend_vervoer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `user_id`, `type_id`, `number_plate`, `start_date`, `end_date`, `vervangend_vervoer`) VALUES
(1, 1, 3, 'jk-25-lo', '2022-03-01', '2023-03-01', 0),
(2, 3, 1, '44-op-ux', '2022-01-03', '2023-01-01', 0),
(3, 5, 3, 'dd-fg-4f', '2022-03-09', '2023-03-09', 1),
(4, 16, 3, 'dgdfgfdg', '2022-03-15', '2023-03-15', 0),
(5, 20, 2, 'bgfngfngn', '2022-03-15', '2022-10-20', 1),
(6, 23, 2, 'nbvnbnbv', '2022-03-15', '2022-08-18', 0),
(7, 25, 1, 'mjmjhmj', '2022-03-15', '2022-09-22', 0),
(8, 22, 1, 'kmhjhg', '2022-03-15', '2022-07-14', 0),
(9, 24, 1, 'jhgjg', '2022-01-17', '2022-08-24', 0),
(10, 17, 1, 'ghhjh', '2021-11-08', '2022-08-19', 0),
(11, 36, 2, '28-48-01', '2022-03-24', '2023-03-24', 1),
(13, 40, 1, 'sfsfsf', '2022-03-24', '2023-03-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` int(11) NOT NULL,
  `contract_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `contract_type`) VALUES
(1, 'Basispakket'),
(2, 'Middelpakket'),
(3, 'Luxepakket');

-- --------------------------------------------------------

--
-- Table structure for table `garages`
--

CREATE TABLE `garages` (
  `id` int(11) NOT NULL,
  `garage_name` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garages`
--

INSERT INTO `garages` (`id`, `garage_name`, `user_id`, `area_id`) VALUES
(5, 'supercars breda', 37, 1),
(6, 'tilburg monteurs', 5, 2),
(7, 'amsterdam_garage', 41, 4),
(8, 'rotterdam-garage', 39, 3),
(9, 'eindhoven-garage', 8, 8),
(10, 'oosterhout-garage', 9, 5),
(11, 'gilze-garage', 14, 6),
(12, 'rijen-garage', 15, 7);

-- --------------------------------------------------------

--
-- Table structure for table `loan_cars`
--

CREATE TABLE `loan_cars` (
  `id` int(11) NOT NULL,
  `car_name` varchar(250) NOT NULL,
  `garage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_cars`
--

INSERT INTO `loan_cars` (`id`, `car_name`, `garage_id`) VALUES
(1, 'ford', 5),
(2, 'audi', 6),
(3, 'mercedes benz', 5),
(4, 'toyota', 6),
(5, 'honda', 11),
(6, 'fiat', 11);

-- --------------------------------------------------------

--
-- Table structure for table `loan_cars_contracts`
--

CREATE TABLE `loan_cars_contracts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loan_car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_cars_contracts`
--

INSERT INTO `loan_cars_contracts` (`id`, `user_id`, `loan_car_id`) VALUES
(1, 16, 2),
(2, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `rating`, `review_content`) VALUES
(1, 1, 8, 'word snel geholpen!'),
(2, 3, 4, 'vervangend vervoer was ook kapot!'),
(3, 5, 2, 'moest ik 3 uur wachten!');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'garage'),
(3, 'klant');

-- --------------------------------------------------------

--
-- Table structure for table `support_call`
--

CREATE TABLE `support_call` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `breakdown_details` varchar(500) NOT NULL,
  `breakdown_location` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_call`
--

INSERT INTO `support_call` (`id`, `user_id`, `garage_id`, `breakdown_details`, `breakdown_location`, `status`) VALUES
(1, 37, 5, 'car does not start', 'breda', 'afgehandeld'),
(2, 3, 6, 'flat tyre', 'tilburg', 'onderweg'),
(3, 25, 6, 'hfghgfhg', 'tilburg', 'afgehandeld'),
(4, 21, 5, 'ukuyjghfjfgjfg', 'breda', 'afgehandeld'),
(6, 21, 8, 'ncvhfcbfd', 'rotterdam', 'onderweg'),
(7, 36, 6, 'rook uit motor', 'snelweg A52, tilbur naar breda', 'afgehandeld'),
(8, 36, 5, 'lekke band', 'breda snelweg', 'afgehandeld'),
(9, 35, 8, 'olie lekkage', 'rotterdam', 'afgehandeld'),
(10, 36, 8, 'test', 'test', 'afgehandeld'),
(11, 35, 8, 'sdfsdf', 'dsfs', 'onderweg'),
(12, 36, 8, 'sssssssssssss', 'sssssssssss', 'onderweg'),
(13, 40, 8, 'dddd', 'dddd', 'afgehandeld'),
(14, 5, 8, 'bbvbv', 'vbvb', 'niet in behandeling'),
(15, 40, 8, 'xcx', 'xcc', 'onderweg'),
(16, 40, 7, 'sfdsfds', 'dsfd', 'niet in behandeling');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`) VALUES
(1, 1, 'jamil', 'jamil@jamil.nl', 'test'),
(2, 2, 'breda-garage', 'garagebreda@garage.nl', 'test'),
(3, 3, 'john', 'john@gmail.nl', 'test'),
(4, 2, 'tilburg_garage', 'tilburggarage@garage.nl', 'test'),
(5, 3, 'Mike', 'mike@gmail.nl', 'test'),
(6, 2, 'abc-garage', 'abc-garage@gmail.nl', 'test'),
(7, 2, 'snel-garage', 'snel-garage@yahoo.nl', 'test'),
(8, 2, 'eindhoven-garage', 'eindhoven-garage@garage.nl', 'test'),
(9, 2, 'oosterhout-garage', 'oosterhout-garage@gmail.nl', 'test'),
(14, 2, 'gilze-garage', 'gilze-garage@gmail.nl', 'test'),
(15, 2, 'rijen-garage', 'rijen-garage@gmail.nl', 'test'),
(16, 3, 'abdul', 'abdul@gmail.nl', 'test'),
(17, 3, 'wisli', 'wisli@gmail.nl', 'test'),
(20, 3, 'ahmad', 'ahmad@gmail.nl', 'test'),
(21, 3, 'zara', 'zara@gmail.nl', 'test'),
(22, 3, 'jaidi', 'jaidi@gmail.nl', 'test'),
(23, 3, 'brae', 'brae@gmail.nl', 'test'),
(24, 3, 'sara', 'sara@gmail.nl', 'test'),
(25, 3, 'diego', 'diego@gmail.nl', 'test'),
(35, 3, 'asad', 'asad@asad.nl', '$2y$10$Uo.BTVcq968bBtuMH29nr..g.toC9COxNXPMBckQaEiSbTPC2izpe'),
(36, 3, 'klant', 'klant@klant.nl', '$2y$10$ywo5J54SWOcmIEF1Yz/MveL60AnCqn0FJP/eCLIQyjaV6OURcmiRO'),
(37, 2, 'garage', 'garage@garage.nl', '$2y$10$vn2pTz/4uAMSLTh7pYes2e7Doq0Nqjy/NMiU17X7vZbplMabTmwRG'),
(38, 1, 'admin', 'admin@admin.nl', '$2y$10$7vsR2dG2/2vIEsPSkKb2gur4IkQ18Q6X182l1VkwQWW/5jcE1MNSC'),
(39, 2, 'rotterdam', 'rotterdam@gmail.nl', '$2y$10$3pGyLmS5VxiAgCJRgH3FtOa.hcdoi6kub0AFWiPDO1TMI17ZXZR1.'),
(40, 3, 'klant2', 'klant2@gmail.nl', '$2y$10$cFAnhOiLFZKojjzZWZfNZuZbEdCKlzcTA74tqe7eu7aMpsLnQMY7a'),
(41, 2, 'amsterdam', 'amsterdam@dd.nl', '$2y$10$EhMd6U6H8TJVFteW9pO6aeZyIl6O2B5bcSxLvRWgImFgT3EcFgL9m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactform_submissions`
--
ALTER TABLE `contactform_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garages`
--
ALTER TABLE `garages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `loan_cars`
--
ALTER TABLE `loan_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garage_id` (`garage_id`);

--
-- Indexes for table `loan_cars_contracts`
--
ALTER TABLE `loan_cars_contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `loan_car_id` (`loan_car_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_call`
--
ALTER TABLE `support_call`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `garage_id` (`garage_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contactform_submissions`
--
ALTER TABLE `contactform_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `garages`
--
ALTER TABLE `garages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loan_cars`
--
ALTER TABLE `loan_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loan_cars_contracts`
--
ALTER TABLE `loan_cars_contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `support_call`
--
ALTER TABLE `support_call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `contract_types` (`id`),
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `garages`
--
ALTER TABLE `garages`
  ADD CONSTRAINT `garages_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `garages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `loan_cars`
--
ALTER TABLE `loan_cars`
  ADD CONSTRAINT `loan_cars_ibfk_1` FOREIGN KEY (`garage_id`) REFERENCES `garages` (`id`);

--
-- Constraints for table `loan_cars_contracts`
--
ALTER TABLE `loan_cars_contracts`
  ADD CONSTRAINT `loan_cars_contracts_ibfk_1` FOREIGN KEY (`loan_car_id`) REFERENCES `loan_cars` (`id`),
  ADD CONSTRAINT `loan_cars_contracts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `support_call`
--
ALTER TABLE `support_call`
  ADD CONSTRAINT `support_call_ibfk_1` FOREIGN KEY (`garage_id`) REFERENCES `garages` (`id`),
  ADD CONSTRAINT `support_call_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
