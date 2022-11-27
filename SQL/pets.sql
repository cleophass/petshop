-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 25 nov. 2022 à 09:53
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `DATAPET`
--

-- --------------------------------------------------------

--
-- Structure de la table `pets`
--

CREATE TABLE `pets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `species` varchar(50) DEFAULT NULL,
  `race` varchar(50) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `age` int(50) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
