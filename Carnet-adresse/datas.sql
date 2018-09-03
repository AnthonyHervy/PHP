-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 30 août 2018 à 16:55
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `adressbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `adress`
--

CREATE TABLE `adress`
(
  `id` int
(11) NOT NULL,
  `prefix` varchar
(10) NOT NULL,
  `lastname` varchar
(70) NOT NULL,
  `firstname` varchar
(70) NOT NULL,
  `adress` varchar
(255) NOT NULL,
  `adress2` varchar
(255) NOT NULL,
  `postalCode` varchar
(15) NOT NULL,
  `city` varchar
(100) NOT NULL,
  `country` varchar
(50) NOT NULL,
  `phoneNumber` int
(25) NOT NULL,
  `id_user` int
(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adress`
--

INSERT INTO `adress` (`
id`,
`prefix
`, `lastname`, `firstname`, `adress`, `adress2`, `postalCode`, `city`, `country`, `phoneNumber`, `id_user`) VALUES
(7, 'M', 'Dupont', 'François', '4 rue des oiseaux', 'batiment C', '33000', 'Bordeaux', 'France', 612345678, 13),
(8, 'F', 'Martin', 'Elisa', '21 Rue des oliviers', '', '33000', 'Bordeaux', 'France', 718294759, 13);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adress`
--
ALTER TABLE `adress`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adress`
--
ALTER TABLE `adress`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
