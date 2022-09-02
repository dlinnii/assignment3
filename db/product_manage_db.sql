-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2019 at 09:51 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_manage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(512) NOT NULL,
  `image_path` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `description`, `image_path`) VALUES
(22, '1uF-22uF SMD Aluminum Electrolytic Cap ', '0.25', 54, 'Radial Can - SMD   Lifetime @ Temperature:  1000 hours @ 105Â°C   Operating Temperature Max:  105Â°C Operating Temperature Min:  -40Â°C', '1uF-22uF SMD Aluminum Electrolytic Cap.jpg'),
(25, '0.0018uF 100V 5% Mylar Film Capacitors ', '0.14', 120, 'Capacitance:   0.0018uF Voltage-Rated: 100V Tolerance: Â±5% Wide Operating Temperature Range: -40Â°C to +85Â°C', '0.0018uF 100V  Mylar Film Capacitors.jpg'),
(26, '1F Super Capacitor, 5.5V', '1.98', 129, 'Super capacitors are perfect for applications where the capacity of a standard electrolytic capacitor is too small and a rechargeable battery is bigger than needed. This 1F capacitor will run an LED for around 10 minutes.  ', '1F Super Capacitor, 5.5V.jpg'),
(27, '1n 2.5mm Ceramic Capacitor', '0.03', 1230, '2.5mm 50V general purpose disc capacitors manufactured from high dielectric contant ceramics with a coating of durez. ', '1n 2.5mm Ceramic Capacitor.jpg'),
(28, '1R TruOhm Metal 0.25 Watt Resistor', '1.10', 289, 'Protected against adverse environmental conditions by multiple epoxy coatings. For use in industrial electronics equipment', '1R TruOhm Metal 0.25 Watt Resistor.jpg'),
(29, '4N35 DIP-6 Optocouplers Phototransistor', '1.30', 39, '4N35 DIP-6 Optocouplers Phototransistor', '4N35 DIP-6 Optocouplers Phototransistor.jpg'),
(31, 'SMD 0805 Resistor 1 Ohm to 130 Ohm', '0.10', 175, '5% SMD 0805 Resistor 1 Ohm to 130 Ohm', 'SMD 0805 Resistor 1 Ohm to 130 Ohm.jpg'),
(32, '6R HS 50W Aluminium Clad Resistor 4.50â‚¬', '4.50', 250, '6R 50W aluminium clad wirewound power resistor. High quality and stability Designed for heatsink mounting using thermal compound to achieve maximum performance  ', '6R HS 50W Aluminium Clad Resistor.jpg'),
(33, '62R TruOhm 0.25 Watt Resistor', '1.09', 500, 'Protected against adverse environmental conditions by multiple epoxy coatings. For use in industrial electronics equipment', '62R TruOhm 0.25 Watt Resistor.jpg'),
(34, '100ÂµF 16V 105Â°C 2000 hours', '0.16', 250, 'Tolerance 20% Wide temperature range Long life Low impedance Operating temperature range â€“40Â°C to +105Â°C Capacitance tolerance Â±20% at 20Â°C 120Hz Leakage current 0.01CV or 3ÂµA Load life 2000hrs @ 105Â°C Shelf life 1000hrs @ 105Â°C', '100ÂµF 16V 105Â°C 2000 hours.jpg'),
(35, '220pf 2.5mm Ceramic Capacitor ', '0.03', 500, '2.5mm 50V general purpose disc capacitors manufactured from high dielectric contant ceramics with a coating of durez. ', '220pf 2.5mm Ceramic Capacitor.jpg'),
(36, 'CD74HCT4511E BCD to 7 Segment Decoder', '3.20', 442, 'This Texas Instruments 74HCT4511 BCD to 7-segment latch/decoder/drivers IC is available in a DIL-16 package. A part of the 74HCT range. A BCD-to-7 segment decoder/driver with four address inputs (D0-D3), an active-low blanking (BL) input, lamp-test (LT) input, and a latch-enable (LE) input that, when high, enables the latches to store the BCD inputs. When LE is low, the latches are disabled, making the outputs transparent to the BCD inputs.', 'CD74HCT4511E BCD to 7 Segment Decoder.jpg'),
(37, 'MOTOR RUN CAPACITOR 15ÂµF  450V', '4.95', 560, 'Round capacitor in fire resistant housing. High moisture resistance and high insulation.  Dual male connectors and M8 screw for easy mounting. Applicable for 50/60Hz heavy duty lamps and motors.  ', 'MOTOR RUN CAPACITOR 15ÂµF  450V.jpg'),
(38, 'PC817 EL817C LTV817 -1 DIP-4 OPTOCOUPLER', '0.30', 546, 'Mounting Type Through Hole Output Device Transistor Maximum Forward Voltage 1.5V Number of Channels 1 Number of Pins 6 Package Type PDIP Input Current Type DC Typical Rise Time 2Âµs Maximum Input Current 60 mA Isolation Voltage 5.3 kVrms Minimum Current Transfer Ratio 40 % Typical Fall Time 2Âµs', 'PC817 EL817C LTV817 -1 DIP-4 OPTOCOUPLER.jpg'),
(39, 'Stp55nf06l Mosfet Logic N 60v 55a', '1.29', 650, ' 60V Drain-source Breakdown Voltage, 14mR Drain-source On-resistance, 55A Drain Current, 16V Gate Source Voltage, 20ns Turn-on Time, 40ns Turn-off Time, 95W Power, TO-220 Case, Exceptional dv/dt Capability, Application Oriented Characterization, Suitable for Switching Applications.', 'Stp55nf06l Mosfet Logic N 60v 55a.jpg'),
(40, 'TANTAL CAPACITOR 0.10ÂµF   35V', '0.60', 849, 'Miniature solid tantalum capacitors for commercial and professional applications.', 'TANTAL CAPACITOR 0.10ÂµF   35V.jpg'),
(41, 'TCRT5000L Reflective infrared sensor', '0.38', 448, 'Compact construction, sense the presence of an object by using the reflective IR beam from the object Consist of a phototransistor Snap-in construction for PCB mounting Plastic polycarbonate housing construction which prevents crosstalk  ', 'TCRT5000L Reflective infrared sensor.JPG'),
(42, 'TRIM CAPACITOR 7 100pF', '2.95', 332, 'The vanes are stacked on a sturdy plastic base. The dielectric product consists of a polypropylene film which ensures good vane stability and prevents microphony. The capacitor can be adjusted at the top with a screwdriver. Flux absorption between the vanes is eliminated. The trimmers resist all standard cleaning solvents with the exception of trichlorethylene and trichloroethane. Climatic category (IEC68 40/070/21). Basic specification (IEC481-1 and 4).  ', 'TRIM CAPACITOR 7 100pF.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `user_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `password`, `user_type`) VALUES
(9, 'admin', 'admin', '$2y$10$Sei6DhxKlqdkFiZg/z0fIu/J/e9pot41mBTXfZwz9/PnoKaBux3au', 'admin'),
(37, 'veaceslav', 'veaceslav', '$2y$10$AnvLAaO6/CMncXL..eZP7.sBX16QWGZBnwqmCgpx6J6gkcBX8bddq', 'admin'),
(38, 'jerry', 'jerry', '$2y$10$rCDoElXiB/fjdL4PmxnQvOChTauXXImlnBwIq/lJzb.dOGZ3RRsc.', 'user'),
(39, 'lola', 'lola', '$2y$10$YvBYlJYpW7BLsq1HrJ4CceMcPwRIYKdaOxsbdAmKUJ9rxeZ40oEQe', 'user'),
(40, 'inga', 'inga', '$2y$10$WntosZjv1aBmV8xYKJhiJ.Styk7jDaWbrz0NWIsg1m7fTfRlP1WUC', 'user'),
(41, 'alex', 'alex', '$2y$10$pbTPDWkrwFKq1qXnQnnIHO.l3IDcOqiFdeDSEwXcwxCDbi3Zfu/Oa', 'user'),
(42, 'tom', 'tom', '$2y$10$67VYxVxWoYuci0g6YA3qL.noIQhJI0cLesAE3F8p8HZkiTx8lSePe', 'user'),
(43, 'bob', 'bob', '$2y$10$erigm/5MQ/zHke2wi8qrquWrOEYbJ5rMaJtHw0XXCHHUUgnOoiv/W', 'user'),
(44, 'nik', 'nik', '$2y$10$0jKlhCONkarn3PxysUM7E.jh/F64ac7eR0vsYcmgN9pw9TBUEkd7K', 'user'),
(45, 'oskar', 'oskar', '$2y$10$I2giGUat79w/Ce.JYv.ekei1tmKiqgzyjT8sjlOjPIgVknkYjqUwq', 'user'),
(46, 'tomas', 'tomas', '$2y$10$wGImwtubS14.5kLyeH8oSu/xRT2UaazlHnTe7I.aiR4vhEcui4TZe', 'user'),
(47, 'aaa', 'aaa', '$2y$10$BLXG6TVBEk0etY95qQzv8.tc/vHghrAC3oTFlb7d0uFmIFSa8H6a.', 'user'),
(48, 'bbb', 'bbb', '$2y$10$obuI7MINMLUB8aNi.HYvCOiX8p2RyLi8UFOdydHqjeTFNWG9Fz506', 'user'),
(54, 'ddd', 'ddd', '$2y$10$r7uejuun2.lBUGnipJ13OuJqD1eJvulnkrN6k.l3gCwElk1phSj2a', 'user'),
(56, 'eee', 'eee', '$2y$10$Xdkdn4Ddi0EQfE77KmbnZOYPhXDECTSna9eFacdzDqnNd6FsJkm6u', 'user'),
(57, 'fff', 'fff', '$2y$10$eKEdJHzMsGIg3ZPe9mtp5OqOOnUAwKsXHvlnBfklbhrHDEShgsFPS', 'user'),
(58, 'ccc ccc', 'ccc ccc', '$2y$10$8eRbTbQkJTYkTDNEe7pTn.HdknnNvnnlug.QIS2do/6m5WoGx3lcq', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_purchase`
--

CREATE TABLE `user_purchase` (
  `id` int(11) NOT NULL,
  `user_name` varchar(512) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_purchase`
--

INSERT INTO `user_purchase` (`id`, `user_name`, `product_id`, `product_quantity`, `total_price`) VALUES
(10, 'inga', 22, 1, '0.20'),
(11, 'inga', 25, 1, '0.14'),
(13, 'inga', 27, 5, '0.15'),
(15, 'lola', 31, 5, '0.50'),
(16, 'lola', 22, 10, '2.00'),
(17, 'lola', 38, 6, '1.80'),
(18, 'alex', 42, 10, '29.50'),
(19, 'alex', 27, 15, '0.45'),
(23, 'alex', 42, 2, '5.90'),
(24, 'jerry', 29, 5, '6.50'),
(26, 'jerry', 22, 1, '0.20'),
(27, 'jerry', 25, 3, '0.42'),
(28, 'veaceslav', 42, 5, '14.75'),
(29, 'veaceslav', 41, 2, '0.76'),
(30, 'veaceslav', 40, 1, '0.60'),
(31, 'tom', 25, 10, '1.40'),
(32, 'tom', 22, 5, '1.00'),
(33, 'nik', 22, 5, '1.00'),
(34, 'oskar', 25, 3, '0.42'),
(71, 'nik', 25, 1, '0.14'),
(72, 'nik', 28, 1, '1.10'),
(73, 'aaa', 22, 1, '0.25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `user_purchase`
--
ALTER TABLE `user_purchase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_purchase`
--
ALTER TABLE `user_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
