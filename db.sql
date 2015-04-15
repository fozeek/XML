-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 15 Avril 2015 à 12:00
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `xml`
--

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `game`
--

INSERT INTO `game` (`id`, `name`, `date`) VALUES
(1, 'coucou', '2015-04-02 00:00:00'),
(2, 'Deuzio', '2015-04-08 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;