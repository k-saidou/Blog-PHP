-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 août 2022 à 08:12
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext,
  `date` datetime DEFAULT NULL,
  `statut` enum('Waiting for validation','Accept','Decline') NOT NULL DEFAULT 'Waiting for validation',
  `id_user` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`,`id_post`),
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `date`, `statut`, `id_user`, `id_post`) VALUES
(7, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-08-05 19:16:14', 'Waiting for validation', 1, 12),
(8, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-08-07 19:16:14', 'Waiting for validation', 2, 12),
(9, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-08-08 19:16:14', 'Waiting for validation', 2, 11),
(10, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-08-29 19:16:14', 'Waiting for validation', 3, 9),
(11, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-08-09 19:16:14', 'Waiting for validation', 1, 8),
(12, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-08-16 19:16:14', 'Waiting for validation', 2, 7),
(13, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-07-31 19:16:14', 'Waiting for validation', 3, 6),
(14, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-07-30 19:16:14', 'Waiting for validation', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `contenu` longtext NOT NULL,
  `creationTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `titre`, `chapo`, `contenu`, `creationTime`, `updateTime`, `id_user`) VALUES
(2, 'Adil Rami vers une prolongation à Troyes', 'Businesses grow faster when', 'Arrivé en août dernier à Troyes, où il s\'était engagé pour un an, Adil Rami devrait prolonger l\'aventure avec l\'Estac cette saison. Selon nos informations, un accord est proche entre le club et le défenseur de 36 ans, dont le contrat arrive à terme au 30 juin.\r\n\r\nS\'il a été victime de quelques pépins physiques, Rami a malgré tout pu disputer 18 matches la saison dernière, dont 17 en Championnat, et inscrire trois buts.', '2022-07-02 18:46:20', NULL, 1),
(3, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-27 19:03:59', NULL, 2),
(4, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-12 19:03:59', NULL, 3),
(5, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du CaireLes sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-29 19:03:59', NULL, 1),
(6, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-13 19:03:59', NULL, 1),
(7, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-05 19:03:59', NULL, 1),
(8, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-31 19:03:59', NULL, 1),
(9, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-25 19:03:59', NULL, 3),
(10, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du CaireLes sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-26 19:03:59', NULL, 3),
(11, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-03 19:03:59', NULL, 3),
(12, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-24 19:03:59', NULL, 3),
(13, 'Les sabreuses françaises battues par la Hongrie en finale des Mondiaux du Caire', 'Les Bleus en bronze au fleuret', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-21 19:03:59', NULL, 2),
(19, 'azertyuio', 'azertyuiopmazertyu', 'azertyuiopmlkjhgfdsq', '2022-08-10 11:01:46', NULL, NULL),
(20, 'AZERTY', 'YTREZAQZERTY', 'QZERTY', '2022-08-16 11:07:15', NULL, NULL),
(21, 'poiuyt', 'sdfghjk', 'nbvcxwszertyhjk', '2022-08-17 11:11:23', NULL, NULL),
(22, 'poure', 'zertyu', 'ibpbiipbipbipbpibpibpibpibpibpibpb', NULL, NULL, NULL),
(23, 'poi', 'rty', 'azertyuio', NULL, NULL, NULL),
(24, 'poi', 'rty', 'azertyuio', NULL, NULL, NULL),
(25, 'poire', 'poire', 'poire', NULL, NULL, NULL);

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
  `password` varchar(255) NOT NULL,
  `role` enum('USER','ADMIN') DEFAULT 'USER',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'keita', 'saidou', 'saidou@gmail.com', '123456', 'ADMIN'),
(2, 'test', 'test', 'test@gmail.com', '123456', 'USER'),
(3, 'test2', 'test2', 'test2@gmail.com', '123456', 'USER');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
