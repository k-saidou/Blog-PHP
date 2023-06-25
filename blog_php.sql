-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 25 juin 2023 à 22:03
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
  `content` longtext NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('Waiting for validation','Accept','Decline') NOT NULL DEFAULT 'Waiting for validation',
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`,`id_post`),
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `date`, `statut`, `id_user`, `id_post`) VALUES
(7, '                modifier         \r\n         \r\n         \r\n         \r\n         \r\n        ', '2022-08-05 19:16:14', 'Accept', 1, 12),
(8, ' modifier  ok     \r\n         \r\n         \r\n        ', '2022-08-07 19:16:14', 'Accept', 2, 12),
(9, '        essaie modification\r\n         \r\n         \r\n        ', '2022-08-08 19:16:14', 'Accept', 2, 11),
(10, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi. \r\n                ', '2022-08-29 19:16:14', 'Accept', 3, 9),
(11, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi. \r\n        ', '2022-08-09 19:16:14', 'Accept', 1, 8),
(12, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-08-16 19:16:14', 'Accept', 2, 7),
(13, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-07-31 19:16:14', 'Accept', 3, 6),
(14, 'Les essais libres et les qualifs, ce n\'est pas la même chose. C\'était plus compliqué que je l\'espérais mais je pense qu\'on a une voiture décente pour la course. On est très rapide dans les lignes droites, il faudra capitaliser là-dessus. Les Ferrari sont de nouveau très rapides aussi.', '2022-07-30 19:16:14', 'Accept', 1, 4),
(15, 'COMMENTAIRE\r\n', '2022-09-18 15:34:17', 'Accept', 1, 6),
(18, '        azer', '2022-09-25 22:31:02', 'Accept', 2, 7),
(19, 'azerty', '2022-09-25 22:31:12', 'Accept', 3, 8),
(20, 'test commentaire', '2022-09-25 22:32:12', 'Accept', 1, 9),
(21, 'test commentaire', '2022-09-25 23:01:10', 'Accept', 2, 10),
(22, 'test commentaire', '2022-09-25 23:04:28', 'Accept', 1, 11),
(23, 'nouveau', '2022-09-25 23:07:03', 'Accept', 2, 12),
(24, 'Array', '2022-09-24 23:08:14', 'Accept', 3, 13),
(25, 'test commentaire', '2022-09-25 09:04:18', 'Accept', 2, 10),
(29, 'nouveau', '2023-04-16 10:45:02', 'Accept', 1, 12),
(31, 'commentaire', '2023-05-07 13:06:12', 'Accept', 3, 10),
(33, 'un commentaire', '2023-05-30 11:53:46', 'Accept', 4, 4),
(34, 'azerttyu', '2023-05-30 12:17:31', 'Accept', 4, 4),
(35, 'test', '2023-05-30 12:22:02', 'Accept', 4, 4),
(36, 'test', '2023-05-30 12:23:49', 'Accept', 4, 4),
(37, 'trez', '2023-05-30 12:34:36', 'Accept', 4, 4),
(38, 'trez', '2023-05-30 12:35:27', 'Accept', 4, 4),
(39, 'test-22\r\n                 \r\n                ', '2023-05-30 12:38:49', 'Accept', 4, 5),
(40, 'test', '2023-05-30 12:39:55', 'Accept', 4, 5),
(41, '        poiuy', '2023-05-30 12:44:08', 'Accept', 4, 4),
(44, '                        poiuy \r\n                ', '2023-05-30 12:52:35', 'Accept', 4, 4),
(45, '        poiuy', '2023-05-30 13:03:07', 'Waiting for validation', 4, 4),
(47, '        azer', '2023-05-30 13:15:43', 'Waiting for validation', 4, 4),
(48, '        azer', '2023-05-30 13:17:08', 'Waiting for validation', 4, 4),
(49, '        azer', '2023-05-30 13:18:20', 'Waiting for validation', 4, 4),
(50, '        azer', '2023-05-30 13:20:37', 'Waiting for validation', 4, 4),
(51, '        azer', '2023-05-30 13:22:55', 'Waiting for validation', 4, 4),
(52, '        azer', '2023-05-30 13:23:13', 'Waiting for validation', 4, 4),
(53, 'treza', '2023-05-30 13:26:05', 'Waiting for validation', 4, 4),
(56, 'encore\r\n', '2023-05-30 13:37:57', 'Waiting for validation', 4, 4),
(57, 'commentaire test', '2023-05-30 13:42:06', 'Waiting for validation', 4, 4),
(58, 'commentaire test', '2023-05-30 13:44:12', 'Waiting for validation', 4, 4),
(67, 'test', '2023-06-01 14:19:30', 'Waiting for validation', 1, 7),
(68, 'ok', '2023-06-01 14:21:37', 'Waiting for validation', 1, 7),
(70, '                            ok', '2023-06-13 11:14:42', 'Waiting for validation', 4, 4),
(71, 'test', '2023-06-13 11:29:55', 'Waiting for validation', 4, 4),
(72, 'test', '2023-06-13 11:31:56', 'Waiting for validation', 4, 4),
(73, 'test', '2023-06-13 11:37:43', 'Waiting for validation', 4, 4),
(74, '                            ', '2023-06-13 11:37:54', 'Waiting for validation', 4, 4),
(80, 'test', '2023-06-13 12:04:17', 'Waiting for validation', 4, 5),
(82, '                            ', '2023-06-19 12:20:30', 'Waiting for validation', 4, 58),
(84, 'commentaire test 2', '2023-06-19 12:24:13', 'Waiting for validation', 4, 59),
(85, 'commentaire test 2', '2023-06-19 12:24:51', 'Waiting for validation', 4, 59),
(86, 'commentaire 3', '2023-06-19 12:25:29', 'Waiting for validation', 4, 36),
(87, 'commentaire test 4', '2023-06-19 12:34:13', 'Waiting for validation', 4, 4),
(88, 'commentaire test 4', '2023-06-19 12:34:35', 'Waiting for validation', 4, 4),
(89, 'commentaire', '2023-06-20 21:05:57', 'Waiting for validation', 4, 4),
(90, 'commentaire', '2023-06-20 21:05:57', 'Waiting for validation', 4, 4),
(91, 'ok', '2023-06-20 21:07:03', 'Waiting for validation', 4, 4),
(92, 'ok', '2023-06-20 21:07:11', 'Waiting for validation', 4, 4),
(93, 'ok', '2023-06-20 21:08:29', 'Waiting for validation', 4, 5),
(94, 'ok', '2023-06-20 21:08:29', 'Waiting for validation', 4, 5),
(95, 'ok', '2023-06-20 21:10:26', 'Waiting for validation', 4, 37),
(96, 'ok', '2023-06-20 21:10:50', 'Waiting for validation', 4, 37),
(97, 'ok', '2023-06-20 21:11:00', 'Waiting for validation', 4, 37),
(98, 'ok', '2023-06-20 21:12:56', 'Waiting for validation', 4, 37),
(99, 'ok', '2023-06-20 21:13:01', 'Waiting for validation', 4, 37);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phoneNumber`, `message`) VALUES
(1, 'saidou', 'saidou@saidou.fr', '609606120', 'message test'),
(2, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(4, 'test', 'test@gmail.com', '609606120', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(6, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(9, 'test2', 'test@test.fr', '608515010', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(10, 'test2', 'test@test.fr', '608515010', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(11, 'test2', 'test@test.fr', '608515010', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(15, 'test2', 'test@test.fr', '608515010', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(16, 'test2', 'test@test.fr', '608515010', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(18, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'These 302 free stories are ordered by most time reading created on HackerNoon. Visit the [/Learn Repo to find the most read stories about any technology. Use the same old HTML, CSS, and Javascript to learn about Front End Development.'),
(19, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'Navigation available in Bootstrap share general markup and styles, from the base .nav class to the active and disabled states. Swap modifier classes to switch between each style.'),
(45, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'sqdfg'),
(47, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'vgfce'),
(48, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'dfvbn,'),
(49, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'dfghjk;l'),
(50, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', '1234569'),
(51, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', '1234569'),
(52, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', '1234569'),
(53, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', '1234569'),
(54, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', '1234569'),
(55, 'Keita saidou', 'saidoukeita12@gmail.com', '609606120', 'ok'),
(56, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'test'),
(57, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'test'),
(58, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'test'),
(59, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'ok'),
(60, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'ok'),
(61, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'ok'),
(62, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'test'),
(63, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'ok\r\n'),
(64, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'ok\r\n'),
(65, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', 'ok\r\n'),
(66, 'saidou keita', 'dou-c@hotmail.fr', '609606120', '123'),
(67, 'saidou keita', 'dou-c@hotmail.fr', '609606120', '123'),
(68, 'saidou keita', 'dou-c@hotmail.fr', '609606120', '123'),
(70, 'saidou keita', 'dou-c@hotmail.fr', '609606120', '123'),
(71, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', '123456'),
(72, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', '123456'),
(73, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', '1456'),
(74, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', '1456'),
(75, 'saidou keita', 'dou-c@hotmail.fr', '609606120', '123'),
(76, 'saidou keita', 'dou-c@hotmail.fr', '609606120', '123\r\n'),
(77, 'saidou keita', 'dou-c@hotmail.fr', '609606120', '123\r\n'),
(78, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', '789'),
(79, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', '123'),
(80, 'saidou Keita', 'saidoukeita12@gmail.com', '33609606120', '123'),
(81, 'saidou keita', 'dou-c@hotmail.fr', '609606120', 'message'),
(82, 'saidou keita', 'dou-c@hotmail.fr', '609606120', 'message'),
(83, 'saidou keita', 'dou-c@hotmail.fr', '609606120', 'ok'),
(84, 'saidou keita', 'dou-c@hotmail.fr', '609606120', 'ok'),
(85, 'saidou keita', 'dou-c@hotmail.fr', '609606120', 'ok 1'),
(86, 'saidou Keita', 'saidoukeita12@gmail.com', '609606120', 'ok 2'),
(87, 'saidou Keita', 'saidoukeita12@gmail.com', '609606120', 'ok 2'),
(88, 'saidou Keita', 'saidoukeita12@gmail.com', '609606120', '123');

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
  `creationTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `titre`, `chapo`, `contenu`, `creationTime`, `updateTime`, `id_user`) VALUES
(4, 'Titre', 'Test', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie). \r\n         \r\n         \r\n         \r\n         \r\n        ', '2022-07-12 19:03:59', '2023-06-05 15:44:24', 3),
(5, 'Titre1', 'Chapo-1', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-29 19:03:59', NULL, 1),
(6, 'Titre2', 'Chapo-2', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-13 19:03:59', NULL, 1),
(7, 'Titre3', 'Chapo-3', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-05 19:03:59', NULL, 1),
(8, 'Titre4', 'Chapo-4', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-31 19:03:59', NULL, 1),
(9, 'Titre5', 'Chapo-5', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-25 19:03:59', NULL, 3),
(10, 'Titre6', 'Chapo-6', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-26 19:03:59', NULL, 3),
(11, 'Titre7', 'Chapo-7', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-03 19:03:59', NULL, 3),
(12, 'Titre8', 'Chapo-8', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-24 19:03:59', NULL, 3),
(13, 'Titre9', 'Chapo-9', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-07-21 19:03:59', NULL, 2),
(19, 'Titre10', 'Chapo-10', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-08-10 11:01:46', NULL, 1),
(20, 'Titre11', 'Chapo-11', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-08-16 11:07:15', NULL, 2),
(21, 'Titre12', 'Chapo-12', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-08-17 11:11:23', NULL, 3),
(28, 'Titre13', 'Chapo-13', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-08-29 00:02:25', NULL, 1),
(29, 'Titre14', 'Chapo-14', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-09-04 01:13:50', NULL, 2),
(30, 'Titre15', 'Chapo-15', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2022-09-04 11:16:38', NULL, 3),
(32, 'Titre16', 'Chapo-16', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-04-20 11:56:22', NULL, 1),
(33, 'Titre17', 'Chapo-17', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-04-25 12:37:26', NULL, 2),
(34, 'Titre18', 'Chapo-18', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-04-26 12:46:30', NULL, 3),
(35, 'Titre19', 'Chapo-19', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-04-26 12:46:30', NULL, 1),
(36, 'Titre20', 'Chapo-20', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-05-30 15:25:52', NULL, 4),
(37, 'Titre21', 'Chapo-21', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-05-30 15:26:33', NULL, 4),
(38, 'Titre22', 'Chapo-22', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-05-30 15:26:33', NULL, 4),
(40, 'Titre23', 'Chapo-23', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-05-30 15:30:37', NULL, 4),
(41, 'Titre24', 'Chapo-24', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-05-30 15:33:00', NULL, 4),
(44, 'Chapo-25', ' Businesses grow faster wh', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-05-30 17:44:00', NULL, 4),
(46, 'Titre26', 'Chapo-26', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-05-30 17:45:45', '2023-06-19 11:09:19', 4),
(54, 'Titre27', 'Chapo-27', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-06-05 19:12:35', '2023-06-07 11:43:22', 4),
(55, 'Titre28', 'Chapo-28', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-06-05 19:13:36', '2023-06-20 21:13:47', 4),
(57, 'Titre29', 'Chapo-29', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-06-05 19:15:28', '2023-06-19 12:16:57', 4),
(58, 'Titre30', 'Chapo-30', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-06-19 12:13:36', NULL, 4),
(59, 'Titre31', 'Chapo-31', 'L\'équipe de France conclut les Mondiaux du Caire ce samedi avec la médaille d\'argent décrochée par les sabreuses, battues par la Hongrie en finale (45-40). Le clan français repart du Caire en tant que première nation au classement des médailles, avec huit podiums dont quatre titres.\r\n\r\nQuelques minutes après la troisième place décrochée par les fleurettistes, Sara Balzer, Sarah Noutcha, Anne Poupinet et Caroline Queroli offrent à l\'équipe de France sa huitième et dernière médaille. Avec quatre titres, les Bleus terminent à la première place au classement des nations et confirme leur très bonne forme après les 11 médailles ramenées des Championnats d\'Europe d\'Antalya (Turquie).', '2023-06-19 12:16:32', NULL, 4);

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
  `role` enum('USER','ADMIN') NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'keita', 'saidou', 'saidou@saidou.fr', '$2y$12$.w7BdscNxGGsrlcPlvB/mOKSg612ATbqq0lqvnv/JT2nAYqV.RsN6', 'ADMIN'),
(2, 'nom modifié', 'prénom modifié', 'test@modif.fr', '$2y$12$.w7BdscNxGGsrlcPlvB/mOKSg612ATbqq0lqvnv/JT2nAYqV.RsN6', 'USER'),
(3, 'test2', 'test2', 'test2@gmail.com', '$2y$12$.w7BdscNxGGsrlcPlvB/mOKSg612ATbqq0lqvnv/JT2nAYqV.RsN6', 'USER'),
(4, 'testtest', 'testtest', 'test@test.fr', '$2y$12$cziROZ3ZjTkOHfsI5svbPOkhVifDcEp.AQF8P4TmFaBnVRwIL0v2y', 'USER'),
(7, 'saidou', 'keita', 'saidoukeita12@gmail.com', '$2y$12$.w7BdscNxGGsrlcPlvB/mOKSg612ATbqq0lqvnv/JT2nAYqV.RsN6', 'USER'),
(10, 'password', 'hash', 'password@hash.fr', '$2y$12$.w7BdscNxGGsrlcPlvB/mOKSg612ATbqq0lqvnv/JT2nAYqV.RsN6', 'USER');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
