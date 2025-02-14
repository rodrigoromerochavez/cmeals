-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2025 at 05:45 PM
-- Server version: 10.0.27-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CompanyMeals`
--

-- --------------------------------------------------------

--
-- Table structure for table `BusinessUnits`
--

CREATE TABLE IF NOT EXISTS `BusinessUnits` (
  `business_unit_id` int(11) NOT NULL COMMENT 'ID de la unidad de negocio',
  `business_name` varchar(100) DEFAULT NULL COMMENT 'Nombre de la unidad de negocio',
  `created_at` date DEFAULT NULL COMMENT 'Fecha de creación del registro',
  `status` smallint(6) DEFAULT NULL COMMENT 'Estado del registro',
  `active` smallint(6) DEFAULT NULL COMMENT 'Registro activo o inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Unidades de negocio';

-- --------------------------------------------------------

--
-- Table structure for table `MealRecords`
--

CREATE TABLE IF NOT EXISTS `MealRecords` (
  `record_id` int(11) NOT NULL COMMENT 'ID del registro de comida',
  `person_id` int(11) DEFAULT NULL COMMENT 'ID de la persona',
  `first_name` varchar(100) DEFAULT NULL COMMENT 'Nombre de la persona',
  `last_name` varchar(100) DEFAULT NULL COMMENT 'Apellido de la persona',
  `id_card` varchar(20) DEFAULT NULL COMMENT 'Carnet de identidad de la persona',
  `position_name` varchar(100) DEFAULT NULL COMMENT 'Nombre del cargo o posición',
  `business_unit_name` varchar(100) DEFAULT NULL COMMENT 'Nombre de la unidad de negocio',
  `shift_id` int(11) DEFAULT NULL COMMENT 'ID del turno',
  `shift_name` varchar(100) DEFAULT NULL COMMENT 'Nombre del turno',
  `shift_start_time` time DEFAULT NULL COMMENT 'Hora de inicio del turno',
  `shift_end_time` time DEFAULT NULL COMMENT 'Hora de finalización del turno',
  `meal_id` int(11) DEFAULT NULL COMMENT 'ID de la comida',
  `meal_name` varchar(100) DEFAULT NULL COMMENT 'Nombre de la comida',
  `date` date DEFAULT NULL COMMENT 'Fecha del consumo de la comida',
  `time` time DEFAULT NULL COMMENT 'Hora del consumo de la comida',
  `created_at` date DEFAULT NULL COMMENT 'Fecha de creación del registro',
  `status` smallint(6) DEFAULT NULL COMMENT 'Estado del registro',
  `active` smallint(6) DEFAULT NULL COMMENT 'Registro activo o inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Registros de comidas desnormalizados';

-- --------------------------------------------------------

--
-- Table structure for table `Meals`
--

CREATE TABLE IF NOT EXISTS `Meals` (
  `meal_id` int(11) NOT NULL COMMENT 'ID de la comida',
  `meal_name` varchar(100) DEFAULT NULL COMMENT 'Nombre de la comida (desayuno, almuerzo, etc.)',
  `created_at` date DEFAULT NULL COMMENT 'Fecha de creación del registro',
  `status` smallint(6) DEFAULT NULL COMMENT 'Estado del registro',
  `active` smallint(6) DEFAULT NULL COMMENT 'Registro activo o inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Comidas';

-- --------------------------------------------------------

--
-- Table structure for table `People`
--

CREATE TABLE IF NOT EXISTS `People` (
  `person_id` int(11) NOT NULL COMMENT 'ID de la persona',
  `first_name` varchar(100) DEFAULT NULL COMMENT 'Nombre',
  `last_name` varchar(100) DEFAULT NULL COMMENT 'Apellido',
  `id_card` varchar(20) DEFAULT NULL COMMENT 'Carnet de identidad',
  `position_id` int(11) DEFAULT NULL COMMENT 'ID del cargo o posición',
  `created_at` date DEFAULT NULL COMMENT 'Fecha de creación del registro',
  `status` smallint(6) DEFAULT NULL COMMENT 'Estado del registro',
  `active` smallint(6) DEFAULT NULL COMMENT 'Registro activo o inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Personas';

-- --------------------------------------------------------

--
-- Table structure for table `Positions`
--

CREATE TABLE IF NOT EXISTS `Positions` (
  `position_id` int(11) NOT NULL COMMENT 'ID del cargo o posición',
  `position_name` varchar(100) DEFAULT NULL COMMENT 'Nombre del cargo o posición',
  `business_unit_id` int(11) DEFAULT NULL COMMENT 'ID de la unidad de negocio',
  `created_at` date DEFAULT NULL COMMENT 'Fecha de creación del registro',
  `status` smallint(6) DEFAULT NULL COMMENT 'Estado del registro',
  `active` smallint(6) DEFAULT NULL COMMENT 'Registro activo o inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cargos';

-- --------------------------------------------------------

--
-- Table structure for table `ShiftMeal`
--

CREATE TABLE IF NOT EXISTS `ShiftMeal` (
  `shift_meal_id` int(11) NOT NULL COMMENT 'ID de la relación entre turno y comida',
  `shift_id` int(11) DEFAULT NULL COMMENT 'ID del turno',
  `meal_id` int(11) DEFAULT NULL COMMENT 'ID de la comida',
  `created_at` date DEFAULT NULL COMMENT 'Fecha de creación del registro',
  `status` smallint(6) DEFAULT NULL COMMENT 'Estado del registro',
  `active` smallint(6) DEFAULT NULL COMMENT 'Registro activo o inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relación Turno-Comida';

-- --------------------------------------------------------

--
-- Table structure for table `Shifts`
--

CREATE TABLE IF NOT EXISTS `Shifts` (
  `shift_id` int(11) NOT NULL COMMENT 'ID del turno',
  `shift_name` varchar(100) DEFAULT NULL COMMENT 'Nombre del turno',
  `start_time` time DEFAULT NULL COMMENT 'Hora de inicio del turno',
  `end_time` time DEFAULT NULL COMMENT 'Hora de finalización del turno',
  `created_at` date DEFAULT NULL COMMENT 'Fecha de creación del registro',
  `status` smallint(6) DEFAULT NULL COMMENT 'Estado del registro',
  `active` smallint(6) DEFAULT NULL COMMENT 'Registro activo o inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Turnos';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BusinessUnits`
--
ALTER TABLE `BusinessUnits`
  ADD PRIMARY KEY (`business_unit_id`);

--
-- Indexes for table `MealRecords`
--
ALTER TABLE `MealRecords`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `shift_id` (`shift_id`),
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `id_card` (`id_card`);

--
-- Indexes for table `Meals`
--
ALTER TABLE `Meals`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`person_id`),
  ADD UNIQUE KEY `id_card` (`id_card`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `Positions`
--
ALTER TABLE `Positions`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `business_unit_id` (`business_unit_id`);

--
-- Indexes for table `ShiftMeal`
--
ALTER TABLE `ShiftMeal`
  ADD PRIMARY KEY (`shift_meal_id`),
  ADD KEY `shift_id` (`shift_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `Shifts`
--
ALTER TABLE `Shifts`
  ADD PRIMARY KEY (`shift_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BusinessUnits`
--
ALTER TABLE `BusinessUnits`
  MODIFY `business_unit_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la unidad de negocio';
--
-- AUTO_INCREMENT for table `MealRecords`
--
ALTER TABLE `MealRecords`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del registro de comida';
--
-- AUTO_INCREMENT for table `Meals`
--
ALTER TABLE `Meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la comida';
--
-- AUTO_INCREMENT for table `People`
--
ALTER TABLE `People`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la persona';
--
-- AUTO_INCREMENT for table `Positions`
--
ALTER TABLE `Positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del cargo o posición';
--
-- AUTO_INCREMENT for table `ShiftMeal`
--
ALTER TABLE `ShiftMeal`
  MODIFY `shift_meal_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la relación entre turno y comida';
--
-- AUTO_INCREMENT for table `Shifts`
--
ALTER TABLE `Shifts`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del turno';
--
-- Constraints for dumped tables
--

--
-- Constraints for table `People`
--
ALTER TABLE `People`
  ADD CONSTRAINT `People_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `Positions` (`position_id`);

--
-- Constraints for table `Positions`
--
ALTER TABLE `Positions`
  ADD CONSTRAINT `Positions_ibfk_1` FOREIGN KEY (`business_unit_id`) REFERENCES `BusinessUnits` (`business_unit_id`);

--
-- Constraints for table `ShiftMeal`
--
ALTER TABLE `ShiftMeal`
  ADD CONSTRAINT `ShiftMeal_ibfk_1` FOREIGN KEY (`shift_id`) REFERENCES `Shifts` (`shift_id`),
  ADD CONSTRAINT `ShiftMeal_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `Meals` (`meal_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE  BusinessUnits ADD internal_code VARCHAR(10);