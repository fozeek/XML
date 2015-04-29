-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 29 Avril 2015 à 15:40
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `xml`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE `access` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `access`
--

INSERT INTO `access` (`id`, `name`) VALUES
(1, 'game_put'),
(2, 'game_post'),
(3, 'game_delete'),
(4, 'game_get'),
(5, 'commentaire_put'),
(6, 'commentaire_get'),
(7, 'commentaire_post'),
(8, 'commentaire_delete'),
(9, 'developer_put'),
(10, 'developer_get'),
(11, 'developer_post'),
(12, 'developer_delete'),
(13, 'editor_get'),
(14, 'editor_post'),
(15, 'editor_put'),
(16, 'editor_delete'),
(17, 'genre_put'),
(18, 'genre_get'),
(19, 'genre_post'),
(20, 'genre_delete'),
(21, 'media_post'),
(22, 'media_get'),
(23, 'media_put'),
(24, 'media_delete'),
(25, 'mode_put'),
(26, 'mode_get'),
(27, 'mode_post'),
(28, 'mode_delete'),
(29, 'rate_put'),
(30, 'rate_post'),
(31, 'rate_get'),
(32, 'rate_delete'),
(33, 'support_get'),
(34, 'support_post'),
(35, 'support_put'),
(36, 'support_delete'),
(37, 'theme_get'),
(38, 'theme_put'),
(39, 'theme_post'),
(40, 'theme_delete');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `date`, `user_name`, `text`, `note`) VALUES
(1, '2015-04-23', 'fozeek', 'LOILOL', 32),
(2, '2015-04-02', 'toila', 'COUCOU', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `developer`
--

CREATE TABLE `developer` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `developer`
--

INSERT INTO `developer` (`id`, `text`) VALUES
(1, 'Un DEv kikOu');

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

CREATE TABLE `editor` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `editor`
--

INSERT INTO `editor` (`id`, `text`) VALUES
(1, 'COUCOU'),
(2, 'OTHER');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
`id` int(11) NOT NULL,
  `resume` text NOT NULL,
  `description` text NOT NULL,
  `official_website` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `game`
--

INSERT INTO `game` (`id`, `resume`, `description`, `official_website`, `title`) VALUES
(1, '', '', '', 'coucouLOL2'),
(2, '', '', '', 'Deuzio');

-- --------------------------------------------------------

--
-- Structure de la table `game_commentaire`
--

CREATE TABLE `game_commentaire` (
  `game_id` int(11) NOT NULL,
  `commentaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `game_commentaire`
--

INSERT INTO `game_commentaire` (`game_id`, `commentaire_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `game_editor`
--

CREATE TABLE `game_editor` (
  `game_id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `game_editor`
--

INSERT INTO `game_editor` (`game_id`, `editor_id`) VALUES
(1, 1),
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `game_genre`
--

CREATE TABLE `game_genre` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `game_genre`
--

INSERT INTO `game_genre` (`game_id`, `genre_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `game_mode`
--

CREATE TABLE `game_mode` (
  `game_id` int(11) NOT NULL,
  `mode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `game_mode`
--

INSERT INTO `game_mode` (`game_id`, `mode_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `game_theme`
--

CREATE TABLE `game_theme` (
  `game_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `game_theme`
--

INSERT INTO `game_theme` (`game_id`, `theme_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `text`) VALUES
(1, '32genre');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
`id` int(11) NOT NULL,
  `type` text NOT NULL,
  `src` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `support_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id`, `type`, `src`, `title`, `description`, `game_id`, `support_id`) VALUES
(1, 'video', 'path/to/video.mp4', 'un title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, NULL),
(2, 'image', 'path/to/img.jpg', 'Second title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 1),
(3, 'video', 'source/vers/video.mp4', 'Ouune vidéo', 'descccccc', 2, NULL),
(4, 'gif', 'vers/gif.gif', 'Une GIF', 'Ceci décrit.', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `media_commentaire`
--

CREATE TABLE `media_commentaire` (
  `media_id` int(11) NOT NULL,
  `commentaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mode`
--

CREATE TABLE `mode` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `mode`
--

INSERT INTO `mode` (`id`, `text`) VALUES
(2, 'LOOOOOL'),
(3, ''),
(4, 'COUCOU'),
(5, 'LOOOOOL'),
(6, 'COUCOU'),
(7, 'COUCOU'),
(8, 'LOOOOOLI'),
(9, 'LOOOOOL'),
(10, 'LOOOOOL'),
(11, 'COUCOU'),
(12, 'COUCOU'),
(13, 'COUCOU'),
(14, 'COUCOU');

-- --------------------------------------------------------

--
-- Structure de la table `rate`
--

CREATE TABLE `rate` (
`id` int(11) NOT NULL,
  `type` text NOT NULL,
  `text` text NOT NULL,
  `support_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
`id` int(11) NOT NULL,
  `group_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `group_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Structure de la table `role_access`
--

CREATE TABLE `role_access` (
  `role_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role_access`
--

INSERT INTO `role_access` (`role_id`, `access_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE `support` (
`id` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `business_model` text NOT NULL,
  `test` text NOT NULL,
  `game_id` int(11) NOT NULL,
  `console_year` year(4) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `support`
--

INSERT INTO `support` (`id`, `release_date`, `price`, `business_model`, `test`, `game_id`, `console_year`, `owner`, `name`) VALUES
(1, '2015-04-07', 32, 'PayToWin', 'Ceci est un test', 1, 2014, 'Sony', 'PS4'),
(2, '2015-04-22', 32, 'PayToLose', 'un tst dec,d,z', 2, 2025, 'lui', 'NameSupport');

-- --------------------------------------------------------

--
-- Structure de la table `support_commentaire`
--

CREATE TABLE `support_commentaire` (
  `support_id` int(11) NOT NULL,
  `commentaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `support_commentaire`
--

INSERT INTO `support_commentaire` (`support_id`, `commentaire_id`) VALUES
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `support_developer`
--

CREATE TABLE `support_developer` (
  `support_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `support_developer`
--

INSERT INTO `support_developer` (`support_id`, `developer_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id`, `text`) VALUES
(1, 'Ceci est un theme');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `app_id` varchar(200) NOT NULL,
  `app_secret` varchar(200) NOT NULL,
  `host` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `app_id`, `app_secret`, `host`, `role_id`) VALUES
(1, 'musha', 'bicheuxj@gmail.com', 'f02368945726d5fc2a14eb576f7276c0', '721a9b52bfceacc503c056e3b9b93cfa', 'xml.dev', 1),
(2, 'quentin', 'jesuis@un.boloss', 'f02368945726d5fc2a14eb576f7276c0', '092197a9b514fe4991015fb3a39c95d1', 'xml.dev', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `access`
--
ALTER TABLE `access`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `developer`
--
ALTER TABLE `developer`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `editor`
--
ALTER TABLE `editor`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game_commentaire`
--
ALTER TABLE `game_commentaire`
 ADD PRIMARY KEY (`game_id`,`commentaire_id`), ADD KEY `rcommentgame` (`commentaire_id`);

--
-- Index pour la table `game_editor`
--
ALTER TABLE `game_editor`
 ADD UNIQUE KEY `game_id` (`game_id`,`editor_id`), ADD KEY `reditorgame` (`editor_id`);

--
-- Index pour la table `game_genre`
--
ALTER TABLE `game_genre`
 ADD UNIQUE KEY `game_id` (`game_id`,`genre_id`), ADD KEY `rgenregame` (`genre_id`);

--
-- Index pour la table `game_mode`
--
ALTER TABLE `game_mode`
 ADD UNIQUE KEY `game_id` (`game_id`,`mode_id`), ADD KEY `rgamemode` (`mode_id`);

--
-- Index pour la table `game_theme`
--
ALTER TABLE `game_theme`
 ADD UNIQUE KEY `game_id` (`game_id`,`theme_id`), ADD KEY `rthemegame` (`theme_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media_commentaire`
--
ALTER TABLE `media_commentaire`
 ADD PRIMARY KEY (`media_id`,`commentaire_id`), ADD KEY `rcommentairemedia` (`commentaire_id`);

--
-- Index pour la table `mode`
--
ALTER TABLE `mode`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rate`
--
ALTER TABLE `rate`
 ADD PRIMARY KEY (`id`,`support_id`), ADD KEY `r_ratesupport` (`support_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `support`
--
ALTER TABLE `support`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `support_commentaire`
--
ALTER TABLE `support_commentaire`
 ADD PRIMARY KEY (`support_id`,`commentaire_id`), ADD KEY `rcommentairesupport` (`commentaire_id`);

--
-- Index pour la table `support_developer`
--
ALTER TABLE `support_developer`
 ADD UNIQUE KEY `support_id` (`support_id`,`developer_id`), ADD KEY `rdevelopersupport` (`developer_id`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `access`
--
ALTER TABLE `access`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `developer`
--
ALTER TABLE `developer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `editor`
--
ALTER TABLE `editor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `mode`
--
ALTER TABLE `mode`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `rate`
--
ALTER TABLE `rate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `support`
--
ALTER TABLE `support`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `game_commentaire`
--
ALTER TABLE `game_commentaire`
ADD CONSTRAINT `rcommentgame` FOREIGN KEY (`commentaire_id`) REFERENCES `commentaire` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `rgamecomment` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `game_editor`
--
ALTER TABLE `game_editor`
ADD CONSTRAINT `reditorgame` FOREIGN KEY (`editor_id`) REFERENCES `editor` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `rgameeditor` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `game_genre`
--
ALTER TABLE `game_genre`
ADD CONSTRAINT `rgenregame` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `rgamegenre` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `game_mode`
--
ALTER TABLE `game_mode`
ADD CONSTRAINT `rmodegame` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `rgamemode` FOREIGN KEY (`mode_id`) REFERENCES `mode` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `game_theme`
--
ALTER TABLE `game_theme`
ADD CONSTRAINT `rthemegame` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `rgametheme` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `media_commentaire`
--
ALTER TABLE `media_commentaire`
ADD CONSTRAINT `rcommentairemedia` FOREIGN KEY (`commentaire_id`) REFERENCES `commentaire` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `rmediacommentaire` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `rate`
--
ALTER TABLE `rate`
ADD CONSTRAINT `r_ratesupport` FOREIGN KEY (`support_id`) REFERENCES `support` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `support_commentaire`
--
ALTER TABLE `support_commentaire`
ADD CONSTRAINT `rcommentairesupport` FOREIGN KEY (`commentaire_id`) REFERENCES `commentaire` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `rsupportcommentaire` FOREIGN KEY (`support_id`) REFERENCES `support` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `support_developer`
--
ALTER TABLE `support_developer`
ADD CONSTRAINT `rdevelopersupport` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `rsupportdeveloper` FOREIGN KEY (`support_id`) REFERENCES `support` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
