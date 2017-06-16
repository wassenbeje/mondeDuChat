-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 16 Juin 2017 à 14:49
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_mondeduchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_cours`
--

CREATE TABLE `t_cours` (
  `idCour` int(11) NOT NULL,
  `couType` tinyint(5) DEFAULT NULL,
  `couTitre` varchar(50) DEFAULT NULL,
  `couAnnee` int(4) DEFAULT NULL,
  `couNombreSessions` int(2) DEFAULT NULL,
  `couMinEleves` int(11) DEFAULT NULL,
  `couMaxEleves` int(11) DEFAULT NULL,
  `couImage` varchar(260) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_cours`
--

INSERT INTO `t_cours` (`idCour`, `couType`, `couTitre`, `couAnnee`, `couNombreSessions`, `couMinEleves`, `couMaxEleves`, `couImage`) VALUES
(1, 0, 'Comment nourrir son chat', 2017, 17, 5, 20, 'test.jpg'),
(2, 1, 'Comment empêcher son chat d\'uriner partout', 2017, 32, 5, 25, 'test.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_eleves`
--

CREATE TABLE `t_eleves` (
  `idEleve` int(11) NOT NULL,
  `eleNom` varchar(50) DEFAULT NULL,
  `elePrenom` varchar(25) DEFAULT NULL,
  `eleDateNaissance` varchar(10) DEFAULT NULL,
  `eleRue` varchar(50) DEFAULT NULL,
  `eleNPA` int(8) DEFAULT NULL,
  `eleLocalite` varchar(30) DEFAULT NULL,
  `elePays` varchar(40) DEFAULT NULL,
  `eleTelephone` varchar(12) DEFAULT NULL,
  `eleMail` varchar(50) DEFAULT NULL,
  `eleProfession` varchar(50) DEFAULT NULL,
  `eleCommentaire` varchar(300) DEFAULT NULL,
  `elePhoto` varchar(260) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_eleves`
--

INSERT INTO `t_eleves` (`idEleve`, `eleNom`, `elePrenom`, `eleDateNaissance`, `eleRue`, `eleNPA`, `eleLocalite`, `elePays`, `eleTelephone`, `eleMail`, `eleProfession`, `eleCommentaire`, `elePhoto`) VALUES
(3, 'Gafner', 'Caroline', '1969-01-16', 'chemin de la Mairie 3', 1223, 'Cologny', 'Suisse', '+41766162198', 'caroline.gafner@bluewin.ch', NULL, 'Célibataire', 'carolinegafner.jpg'),
(4, 'Morel', 'Vanessa', '1989-03-09', 'rue du Vieux-Moulin 11', 1950, 'Sion', 'Suisse', '+41786523416', 'vanessa.morel@prontomail.com', NULL, 'nationalité française, permis B', 'vanessamorel.jpg'),
(5, 'Jérôme', 'Wassenberg', '16.08.1998', 'rue du chaffard 56', 1170, 'Aubonne', 'Suisse', '+41797983429', 'fowantlgdm@gmail.com', 'Etudiant', '', 'jeromewassenberg.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_factures`
--

CREATE TABLE `t_factures` (
  `idFinancement` int(11) NOT NULL,
  `finMontant` int(11) DEFAULT NULL,
  `finRabais` int(11) DEFAULT NULL,
  `finMethode` varchar(25) DEFAULT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `idCour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_formateurs`
--

CREATE TABLE `t_formateurs` (
  `idFormateur` int(11) NOT NULL,
  `forNom` varchar(40) DEFAULT NULL,
  `forPrenom` varchar(25) DEFAULT NULL,
  `forDateNaissance` varchar(10) DEFAULT NULL,
  `forRue` varchar(50) DEFAULT NULL,
  `forNPA` int(5) DEFAULT NULL,
  `forLocalite` varchar(50) DEFAULT NULL,
  `forPays` varchar(40) DEFAULT NULL,
  `forTelephone` varchar(12) DEFAULT NULL,
  `forMail` varchar(50) DEFAULT NULL,
  `forProfession` varchar(50) DEFAULT NULL,
  `forRetributionMontant` int(11) DEFAULT NULL,
  `forRetributionMethode` varchar(30) DEFAULT NULL,
  `forCommentaire` varchar(300) DEFAULT NULL,
  `forPhoto` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_formateurs`
--

INSERT INTO `t_formateurs` (`idFormateur`, `forNom`, `forPrenom`, `forDateNaissance`, `forRue`, `forNPA`, `forLocalite`, `forPays`, `forTelephone`, `forMail`, `forProfession`, `forRetributionMontant`, `forRetributionMethode`, `forCommentaire`, `forPhoto`) VALUES
(1, 'Wassenberg', 'Marylène', '1964-05-01', 'Rue du chaffard 56', 1170, 'Aubonne', 'Suisse', '0706717940', 'wassenberg@bluewin.ch', 'Comportementaliste chat', 0, 'cash', 'Directrice du centre de formation', 'marylenewassenberg.jpg'),
(2, 'Repond', 'Gloria', '2017-05-17', 'Rue martin 44', 1034, 'Genève', 'Suisse', '0796723948', 'gloria.repond@bluewin.ch', 'etudiante', 300, 'Carte bancaire', 'Etudiante à l\'université de Lausanne', 'gloriarepond.jpg'),
(3, 'Wassenberg', 'Amélie', '1995-10-16', 'Rue du chaffard 56', 1170, 'Aubonne', 'Suisse', '0797984445', 'amelie.wassenberg@bluewin.ch', 'etudiante', 200, 'Cash', 'Etudiante en psychologie à l\'Université de Lausanne', 'ameliewassenberg.jpg'),
(4, 'Felirath', 'Michel', '2017-05-02', 'Rue du biologiste 3', 1734, 'Crissier', 'Suisse', '7989798787', 'michel.felirath@gmail.com', 'Biologiste', 500, 'Cash', 'Biologiste, vétérinaire et homéopathe ', 'michelfelirath.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_inscrire`
--

CREATE TABLE `t_inscrire` (
  `insDate` date DEFAULT NULL,
  `idEleve` int(11) NOT NULL,
  `idCour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_inscrire`
--

INSERT INTO `t_inscrire` (`insDate`, `idEleve`, `idCour`) VALUES
('2016-06-17', 3, 1),
('2016-06-17', 4, 1),
('2016-06-17', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_intervenir`
--

CREATE TABLE `t_intervenir` (
  `idFormateur` int(11) NOT NULL,
  `idSession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_notes`
--

CREATE TABLE `t_notes` (
  `idNote` int(11) NOT NULL,
  `notDevoirEcrit` tinyint(4) DEFAULT NULL,
  `notExamenEcrit` tinyint(4) DEFAULT NULL,
  `notExamenOral` tinyint(4) DEFAULT NULL,
  `notRapport1` tinyint(4) DEFAULT NULL,
  `notRapport2` tinyint(4) DEFAULT NULL,
  `notRapport3` tinyint(4) DEFAULT NULL,
  `notRapportFinal` tinyint(4) DEFAULT NULL,
  `notConsultationPratique` tinyint(4) DEFAULT NULL,
  `notConsultationRapport` tinyint(4) DEFAULT NULL,
  `notConsultationFinal` tinyint(4) DEFAULT NULL,
  `notRenduMemoir` tinyint(1) DEFAULT NULL,
  `notPromotion` tinyint(1) DEFAULT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `idCour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_participer`
--

CREATE TABLE `t_participer` (
  `parPresent` tinyint(1) DEFAULT NULL,
  `idEleve` int(11) NOT NULL,
  `idSession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_sessions`
--

CREATE TABLE `t_sessions` (
  `idSession` int(11) NOT NULL,
  `sesDate` date DEFAULT NULL,
  `idCour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_cours`
--
ALTER TABLE `t_cours`
  ADD PRIMARY KEY (`idCour`);

--
-- Index pour la table `t_eleves`
--
ALTER TABLE `t_eleves`
  ADD PRIMARY KEY (`idEleve`);

--
-- Index pour la table `t_factures`
--
ALTER TABLE `t_factures`
  ADD PRIMARY KEY (`idFinancement`),
  ADD KEY `FK_t_factures_idEleve` (`idEleve`),
  ADD KEY `FK_t_factures_idCour` (`idCour`);

--
-- Index pour la table `t_formateurs`
--
ALTER TABLE `t_formateurs`
  ADD PRIMARY KEY (`idFormateur`);

--
-- Index pour la table `t_inscrire`
--
ALTER TABLE `t_inscrire`
  ADD PRIMARY KEY (`idEleve`,`idCour`),
  ADD KEY `FK_t_inscrire_idCour` (`idCour`);

--
-- Index pour la table `t_intervenir`
--
ALTER TABLE `t_intervenir`
  ADD PRIMARY KEY (`idFormateur`,`idSession`),
  ADD KEY `FK_t_intervenir_idSession` (`idSession`);

--
-- Index pour la table `t_notes`
--
ALTER TABLE `t_notes`
  ADD PRIMARY KEY (`idNote`),
  ADD KEY `FK_t_notes_idEleve` (`idEleve`),
  ADD KEY `FK_t_notes_idCour` (`idCour`);

--
-- Index pour la table `t_participer`
--
ALTER TABLE `t_participer`
  ADD PRIMARY KEY (`idEleve`,`idSession`),
  ADD KEY `FK_t_participer_idSession` (`idSession`);

--
-- Index pour la table `t_sessions`
--
ALTER TABLE `t_sessions`
  ADD PRIMARY KEY (`idSession`),
  ADD UNIQUE KEY `sesDate` (`sesDate`,`idCour`),
  ADD KEY `FK_t_sessions_idCour` (`idCour`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_cours`
--
ALTER TABLE `t_cours`
  MODIFY `idCour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_eleves`
--
ALTER TABLE `t_eleves`
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_factures`
--
ALTER TABLE `t_factures`
  MODIFY `idFinancement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_formateurs`
--
ALTER TABLE `t_formateurs`
  MODIFY `idFormateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_notes`
--
ALTER TABLE `t_notes`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_sessions`
--
ALTER TABLE `t_sessions`
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_factures`
--
ALTER TABLE `t_factures`
  ADD CONSTRAINT `FK_t_factures_idCour` FOREIGN KEY (`idCour`) REFERENCES `t_cours` (`idCour`),
  ADD CONSTRAINT `FK_t_factures_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `t_eleves` (`idEleve`);

--
-- Contraintes pour la table `t_inscrire`
--
ALTER TABLE `t_inscrire`
  ADD CONSTRAINT `FK_t_inscrire_idCour` FOREIGN KEY (`idCour`) REFERENCES `t_cours` (`idCour`),
  ADD CONSTRAINT `FK_t_inscrire_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `t_eleves` (`idEleve`);

--
-- Contraintes pour la table `t_intervenir`
--
ALTER TABLE `t_intervenir`
  ADD CONSTRAINT `FK_t_intervenir_idFormateur` FOREIGN KEY (`idFormateur`) REFERENCES `t_formateurs` (`idFormateur`),
  ADD CONSTRAINT `FK_t_intervenir_idSession` FOREIGN KEY (`idSession`) REFERENCES `t_sessions` (`idSession`);

--
-- Contraintes pour la table `t_notes`
--
ALTER TABLE `t_notes`
  ADD CONSTRAINT `FK_t_notes_idCour` FOREIGN KEY (`idCour`) REFERENCES `t_cours` (`idCour`),
  ADD CONSTRAINT `FK_t_notes_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `t_eleves` (`idEleve`);

--
-- Contraintes pour la table `t_participer`
--
ALTER TABLE `t_participer`
  ADD CONSTRAINT `FK_t_participer_idEleve` FOREIGN KEY (`idEleve`) REFERENCES `t_eleves` (`idEleve`),
  ADD CONSTRAINT `FK_t_participer_idSession` FOREIGN KEY (`idSession`) REFERENCES `t_sessions` (`idSession`);

--
-- Contraintes pour la table `t_sessions`
--
ALTER TABLE `t_sessions`
  ADD CONSTRAINT `FK_t_sessions_idCour` FOREIGN KEY (`idCour`) REFERENCES `t_cours` (`idCour`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
