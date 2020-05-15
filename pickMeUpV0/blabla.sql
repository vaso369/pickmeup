-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 02:07 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickmeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(1) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skola` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grad` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `ime`, `prezime`, `datum`, `skola`, `grad`) VALUES
(1, 'Vasilije', 'Vasilijevic', '1998-24-09', 'Visoka ICT Skola', 'Beograd');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(5) NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'Belgrade'),
(2, 'Moscow'),
(3, 'Barcelona');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(3) NOT NULL,
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fafa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item`, `class`, `fafa`, `page`) VALUES
(1, 'FIND TRANSPORT', 'fLink', '<i class=\'fa fa-search\'></i>', 'find'),
(2, 'OFFER TRANSPORT', 'sLink', '<i class=\'fa fa-plus-circle\'></i>', 'offer'),
(3, 'ABOUT US', 'tLink', '<i class=\'fa fa-address-card\'></i>', 'about');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(3) NOT NULL,
  `part` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `part`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` int(100) NOT NULL,
  `departure` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dateDept` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timeDept` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `seatNumbers` int(3) NOT NULL,
  `idDriver` int(10) NOT NULL,
  `idUni` int(3) NOT NULL,
  `additional` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `departure`, `dateDept`, `timeDept`, `seatNumbers`, `idDriver`, `idUni`, `additional`) VALUES
(3, 'Trg Republike', '2019-06-05', '16:30', 4, 22, 1, 'Blue car you will recognize me im sure'),
(4, 'Vukov Spomenik', '2019-06-07', '12:30', 2, 24, 3, 'I will be there with black audi'),
(5, 'Olimp', '2019-06-08', '10:20', 3, 17, 2, 'I can pick up 4 people because I\'m alone'),
(13, 'Sibir', '2019-06-12', '03:03', -18, 25, 6, 'I will park on place where bus stops'),
(14, 'Dusanovac posta', '2019-06-10', '15:50', 0, 26, 3, 'I wll be at cafe near, you will see black bmw'),
(15, 'Karaburma', '2019-06-28', '14:25', 4, 27, 2, 'bmw e36 black'),
(16, 'Lion', '2019-06-29', '14:30', 5, 29, 9, 'I can also pick up someone after college'),
(19, 'Konjarnik', '2019-06-29', '14:30', 3, 22, 1, 'I will be with metalic jeep'),
(20, 'Olimp', '2019-06-30', '16:20', 2, 17, 2, 'Please be there on time'),
(21, 'Kalenic pijaca', '2019-06-29', '11:45', -9, 30, 3, 'I will drive fiat bravo '),
(23, 'Visokog Stevana 35', '2019-07-03', '10:30', -16, 28, 6, 'I m driving ford focus :)   '),
(26, 'Savamala', '2019-07-18', '14:30', 2, 22, 1, 'Please be there on time');

-- --------------------------------------------------------

--
-- Table structure for table `transport_passenger`
--

CREATE TABLE `transport_passenger` (
  `idTransport` int(100) NOT NULL,
  `idPassenger` int(100) NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transport_passenger`
--

INSERT INTO `transport_passenger` (`idTransport`, `idPassenger`, `address`) VALUES
(4, 22, 'fghfgh'),
(4, 22, 'gdfgdf'),
(4, 22, 'Pijaca '),
(4, 22, 'Vracar'),
(4, 22, 'poroepwr'),
(5, 22, 'Vjekoslava Kovaca 12'),
(5, 22, 'blaasd'),
(4, 26, ''),
(4, 26, ''),
(4, 26, ''),
(4, 26, ''),
(5, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(4, 26, ''),
(4, 26, ''),
(4, 26, ''),
(5, 26, ''),
(5, 26, ''),
(5, 26, ''),
(5, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(5, 26, ''),
(4, 26, ''),
(5, 26, ''),
(5, 26, ''),
(5, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(5, 26, ''),
(5, 26, ''),
(5, 26, ''),
(5, 26, ''),
(5, 26, ''),
(5, 26, ''),
(13, 26, ''),
(13, 26, ''),
(5, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(13, 26, ''),
(4, 26, ''),
(5, 26, ''),
(13, 26, ''),
(13, 26, 'ddddddddddddddd'),
(15, 25, 'Centar'),
(14, 25, 'Novi beograd'),
(16, 29, ''),
(16, 29, ''),
(16, 29, ''),
(16, 29, ''),
(16, 29, ''),
(16, 17, ''),
(16, 17, ''),
(16, 17, ''),
(16, 17, ''),
(16, 17, ''),
(15, 17, ''),
(15, 17, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(15, 22, ''),
(15, 22, ''),
(15, 22, ''),
(13, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(15, 22, ''),
(15, 22, ''),
(15, 22, ''),
(15, 22, ''),
(5, 22, ''),
(5, 22, ''),
(4, 22, ''),
(4, 22, ''),
(15, 22, ''),
(15, 22, ''),
(15, 22, ''),
(15, 22, ''),
(15, 22, ''),
(15, 22, ''),
(15, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(16, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, 'Mirijevo'),
(5, 22, 'Mirijevo'),
(5, 22, 'Mirijevo'),
(5, 22, 'Mirijevo'),
(5, 22, 'Mirijevo'),
(5, 22, 'Mirijevo'),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(5, 22, ''),
(14, 22, 'Vracar'),
(14, 22, 'Vracar'),
(14, 22, 'Vracar'),
(14, 22, 'Vracar'),
(14, 22, 'Vracar'),
(21, 22, 'Kalenic pijaca'),
(13, 22, 'aaaaaasdsadsad'),
(13, 22, 'aaaaaasdsadsad'),
(13, 22, 'aaaaaasdsadsad'),
(13, 22, 'aaaaaasdsadsad'),
(13, 22, 'aaaaaasdsadsad'),
(13, 22, 'aaaaaasdsadsad'),
(21, 27, ''),
(21, 27, ''),
(21, 27, ''),
(21, 27, ''),
(21, 27, ''),
(21, 27, ''),
(21, 28, ''),
(21, 28, ''),
(21, 28, ''),
(21, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 28, ''),
(23, 22, ''),
(23, 22, ''),
(23, 22, ''),
(23, 22, ''),
(23, 22, ''),
(23, 22, ''),
(23, 22, ''),
(23, 22, ''),
(14, 22, 'sdfsdf'),
(14, 22, 'sdfsdf'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp'),
(13, 22, 'Olimp');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(3) NOT NULL,
  `university` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idCity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `university`, `idCity`) VALUES
(1, 'Visoka ICT Škola', 1),
(2, 'Elektrotehnički fakultet', 1),
(3, 'Mašinski fakultet', 1),
(4, '	Bauman Moscow State Technical University', 2),
(5, 'National Research Nuclear University MEPI', 2),
(6, '	Moscow Medical Academy', 2),
(7, 'National Institute of Physical Education', 3),
(8, 'Faculty of Mathematics and Computer Sciences', 3),
(9, 'Barcelona Institute of International Studies', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pictureOriginal` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `idPart` int(3) NOT NULL,
  `idCity` int(3) NOT NULL,
  `idUni` int(3) NOT NULL,
  `active` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `pass`, `email`, `picture`, `pictureOriginal`, `idPart`, `idCity`, `idUni`, `active`) VALUES
(17, 'Djordje', 'Novkovic', 'djota420', '867828277d8660bbb44ebbd860d2f020', 'djota420@gmail.com', 'assets/images/nova_1561294480djota123.jpg', 'assets/images/1561294480djota123.jpg', 2, 1, 2, 1),
(19, 'Nikola', 'Nikolic', 'cinon321', '867828277d8660bbb44ebbd860d2f020', 'cinon@gmail.com', 'assets/images/nova_1561226102proba.jpeg', 'assets/images/1561226102proba.jpeg', 2, 1, 2, 0),
(21, 'Miomir', 'Vukovic', 'ckomi420', '867828277d8660bbb44ebbd860d2f020', 'micko@gmail.com', 'assets/images/nova_1562590045proba2.jpg', 'assets/images/1562590045proba2.jpg', 2, 2, 4, 0),
(22, 'Vasilije', 'Vasilijevic', 'vaso420', '970d0d6139f485cdc6143172590c9323', 'vaso420@gmail.com', 'assets/images/nova_1562587604sova.jpg', 'assets/images/1562587604sova.jpg', 2, 1, 1, 0),
(24, 'Ivana', 'Ivanovic', 'ivana556', '867828277d8660bbb44ebbd860d2f020', 'ivana@gmail.com', 'assets/images/nova_1561294839proba.jpeg', 'assets/images/1561294839proba.jpeg', 2, 1, 1, 0),
(25, 'Lazar', 'Jeremic', 'svezi666', '867828277d8660bbb44ebbd860d2f020', 'svezi123@gmail.com', 'assets/images/nova_1561561327svezaslika.jpg', 'assets/images/1561561327svezaslika.jpg', 2, 2, 6, 1),
(26, 'Filip', 'Milosevic', 'bljuz123', '867828277d8660bbb44ebbd860d2f020', 'toblerona157@gmail.com', 'assets/images/nova_1561560539zilaBljuzzzzzzz.jpg', 'assets/images/1561560539zilaBljuzzzzzzz.jpg', 2, 1, 3, 0),
(27, 'Marko', 'Tenjovic', 'tenjo123', '867828277d8660bbb44ebbd860d2f020', 'tenjo@gmail.com', 'assets/images/nova_1561560842tenjooo.jpg', 'assets/images/1561560842tenjooo.jpg', 2, 1, 2, 0),
(28, 'Stefan', 'Vasilijevic', 'leste032', '867828277d8660bbb44ebbd860d2f020', 'leste@gmail.com', 'assets/images/nova_1562000998stesa.jpg', 'assets/images/1562000998stesa.jpg', 2, 2, 6, 1),
(29, 'Ivana', 'Lukic', 'iwana123', '867828277d8660bbb44ebbd860d2f020', 'iwana@gmail.com', 'assets/images/nova_1561561717iwana.jpg', 'assets/images/1561561717iwana.jpg', 2, 3, 9, 1),
(30, 'Miomir', 'Vukovic', 'miomir123', '867828277d8660bbb44ebbd860d2f020', 'miomir@gmail.com', 'assets/images/default.png', 'assets/images/default.png', 2, 1, 3, 0),
(32, 'Filip', 'Tomasevic', 'tomas123', '867828277d8660bbb44ebbd860d2f020', 'tomas@gmail.com', 'assets/images/default.png', 'assets/images/default.png', 2, 1, 3, 0),
(34, 'Nikola', 'Riorovic', 'riki123', '867828277d8660bbb44ebbd860d2f020', 'riki@gmail.com', 'assets/images/default.png', 'assets/images/default.png', 2, 1, 1, 0),
(38, 'Admin', 'Admin', 'admin321', '867828277d8660bbb44ebbd860d2f020', 'admin@gmail.com', 'assets/images/default.png', 'picture', 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDriver` (`idDriver`),
  ADD KEY `idUni` (`idUni`);

--
-- Indexes for table `transport_passenger`
--
ALTER TABLE `transport_passenger`
  ADD KEY `idTransport` (`idTransport`),
  ADD KEY `idPassenger` (`idPassenger`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCity` (`idCity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPart` (`idPart`),
  ADD KEY `idCity` (`idCity`),
  ADD KEY `idUni` (`idUni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transports`
--
ALTER TABLE `transports`
  ADD CONSTRAINT `transports_ibfk_1` FOREIGN KEY (`idDriver`) REFERENCES `users` (`id`);

--
-- Constraints for table `transport_passenger`
--
ALTER TABLE `transport_passenger`
  ADD CONSTRAINT `transport_passenger_ibfk_1` FOREIGN KEY (`idTransport`) REFERENCES `transports` (`id`),
  ADD CONSTRAINT `transport_passenger_ibfk_2` FOREIGN KEY (`idPassenger`) REFERENCES `users` (`id`);

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idPart`) REFERENCES `parts` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`idUni`) REFERENCES `universities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
