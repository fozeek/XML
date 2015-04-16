-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 16 Avril 2015 à 16:20
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `xml`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `note` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `support_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `developer`
--

CREATE TABLE `developer` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, '', '', '', 'coucou'),
(2, '', '', '', 'Deuzio');

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
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `game_genre`
--

CREATE TABLE `game_genre` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `game_theme`
--

CREATE TABLE `game_theme` (
  `game_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
`id` int(11) NOT NULL,
  `type` text NOT NULL,
  `source` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `support_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mode`
--

CREATE TABLE `mode` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `mode`
--

INSERT INTO `mode` (`id`, `text`) VALUES
(1, 'mode1'),
(2, 'mode2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `support`
--

INSERT INTO `support` (`id`, `release_date`, `price`, `business_model`, `test`, `game_id`, `console_year`, `owner`, `name`) VALUES
(1, '2015-04-07', 32, 'PayToWin', 'Ceci est un test', 1, 2014, 'Sony', 'PS4');

-- --------------------------------------------------------

--
-- Structure de la table `support_developer`
--

CREATE TABLE `support_developer` (
  `support_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `host` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `app_id`, `app_secret`, `host`) VALUES
(1, 'musha', 'bicheuxj@gmail.com', 'f02368945726d5fc2a14eb576f7276c0', '721a9b52bfceacc503c056e3b9b93cfa', 'xml.dev');

--
-- Index pour les tables exportées
--

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
-- Index pour la table `mode`
--
ALTER TABLE `mode`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rate`
--
ALTER TABLE `rate`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `support`
--
ALTER TABLE `support`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `developer`
--
ALTER TABLE `developer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mode`
--
ALTER TABLE `mode`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `rate`
--
ALTER TABLE `rate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `support`
--
ALTER TABLE `support`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;