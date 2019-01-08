-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Janvier 2019 à 13:36
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sqyland`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL,
  `nom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `date_connexion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `artiste_id` int(11) DEFAULT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  `projet_id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `famille` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `id` int(11) NOT NULL,
  `image_pano_head` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_pano_presentation` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_pano_contact` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_pano_inscription` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_pano_connexion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_pano_resultat` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_text1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_lien1` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_bouton1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_text2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_lien2` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_bouton2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation_image` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mentions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `presse` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `presse_doc` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `artiste_id` int(11) DEFAULT NULL,
  `projet_id` int(11) DEFAULT NULL,
  `nom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_profil` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_facebook` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_twitter` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_youtube` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_soundcloud` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_linkedin` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_perso` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `expediteur` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `liste` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fichier` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nouveau` tinyint(1) DEFAULT NULL,
  `en_cours` tinyint(1) DEFAULT NULL,
  `termine` tinyint(1) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20190108122233'),
('20190108131854');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `artiste_id` int(11) DEFAULT NULL,
  `nom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `valider` tinyint(1) NOT NULL,
  `image_logo1` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_logo2` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_logo3` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_facebook` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_twitter` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_youtube` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_soundcloud` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_linkedin` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_perso` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_son1` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_son2` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_son3` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_video1` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_video2` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_video3` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sudo`
--

CREATE TABLE `sudo` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `sudo`
--

INSERT INTO `sudo` (`id`, `nom`, `mdp`) VALUES
(1, 'root', 'MyNewPass');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9C07354FC18272` (`projet_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_497DD63421D25844` (`artiste_id`),
  ADD KEY `IDX_497DD6347A45358C` (`groupe_id`),
  ADD KEY `IDX_497DD634C18272` (`projet_id`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4B98C2121D25844` (`artiste_id`),
  ADD KEY `IDX_4B98C21C18272` (`projet_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_50159CA921D25844` (`artiste_id`);

--
-- Index pour la table `sudo`
--
ALTER TABLE `sudo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sudo`
--
ALTER TABLE `sudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD CONSTRAINT `FK_9C07354FC18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_497DD63421D25844` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`),
  ADD CONSTRAINT `FK_497DD6347A45358C` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `FK_497DD634C18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `FK_4B98C2121D25844` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`),
  ADD CONSTRAINT `FK_4B98C21C18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `FK_50159CA921D25844` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
