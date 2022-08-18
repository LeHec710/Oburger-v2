-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 17 août 2022 à 17:34
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `oburger-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `burgers`
--

DROP TABLE IF EXISTS `burgers`;
CREATE TABLE IF NOT EXISTS `burgers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `burgers`
--

INSERT INTO `burgers` (`id`, `name`, `price`, `description`, `image`) VALUES
(15, 'Bacon bulma', '12.00', 'Je suis le super bacon bulma, 2 steaks, 2 cheddars, 2 étages de bacon !', 'assets/currentBurgers/bacon_bulma.png'),
(16, 'La morsure du soleil', '21.00', 'Le burger le plus éblouissant (et bien équilibré) ! ', 'assets/currentBurgers/morsure_du_soleil.png'),
(17, 'Le Sate sate', '17.50', 'O\'burger vous présente le Sate sate avec son \"cripsy chicken\" comme on l\'aime :)', 'assets/currentBurgers/sate_sate.png'),
(18, 'Special sunday', '14.00', 'Le bon burger du dimanche, spécialement conçu pour les carnivores !', 'assets/currentBurgers/special_sunday.png'),
(19, 'Zge Zge', '4.00', 'Le zge zge, du chèvre, des cornichons, de la salade et des tomates, car il en faut pour tous les goûts.', 'assets/currentBurgers/zge_zge.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `date`, `role`) VALUES
(2, 'hector', 'Bidan', 'login@Oburger.fr', '$2y$10$NkJ1Z/CS91fv9sqHH3Pa3eDwe4aSAd79vml3i2Zkt3CZX/Z53gcjm', '2020-12-06 22:03:53', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
