-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 nov. 2024 à 15:27
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `make`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `idModule` int(11) NOT NULL,
  `idEvaluation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `avancer`
--

CREATE TABLE `avancer` (
  `idModule` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `avancement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `idClasse` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `nom`) VALUES
(1, 'slam1'),
(2, 'slam2'),
(3, 'sisr1'),
(4, 'sisr2'),
(5, 'sio1');

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `idEvaluation` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idNote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`idEvaluation`, `idUtilisateur`, `idNote`) VALUES
(1, 6, 1),
(1, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `coef` int(11) NOT NULL,
  `idDiscipline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`id`, `type`, `nom`, `coef`, `idDiscipline`) VALUES
(1, 1, 'injection sql', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `idLog` int(11) NOT NULL,
  `MessageLog` varchar(200) NOT NULL,
  `dateLog` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`idLog`, `MessageLog`, `dateLog`) VALUES
(4, 'Inscription Réussie : nom :test prenom : testpseudo : test email : test@gmail.com', '2024-11-20'),
(5, 'Inscription Réussie : nom : test , prenom : test , pseudo : test , email : test@gmail.com', '2024-11-20'),
(7, 'Connexion Réussie : pseudo : destru14 , id : 6', '2024-11-20'),
(8, 'Connexion Échouée : pseudo : tyty', '2024-11-20'),
(9, 'Inscription Échouée : Pseudo déjà utilisé : destru14', '2024-11-20'),
(10, 'Connexion Échouée : pseudo : test', '2024-11-25'),
(11, 'Connexion Réussie : pseudo : test , id : 12', '2024-11-25'),
(12, 'Connexion Échouée : pseudo : test', '2024-11-25'),
(13, 'Connexion Réussie : pseudo : test , id : 12', '2024-11-25'),
(14, 'Connexion Réussie : pseudo : test , id : 12', '2024-11-25'),
(15, 'Connexion Réussie : pseudo : test , id : 12', '2024-11-25'),
(16, 'Connexion Réussie : pseudo : test , id : 12', '2024-11-25'),
(17, 'Connexion Réussie : pseudo : test , id : 12', '2024-11-27'),
(18, 'un document à bien etait upload par', '2024-11-27'),
(19, 'un document à bien etait upload partest', '2024-11-27'),
(20, 'Array à bien etait upload par test', '2024-11-27'),
(21, ' à bien etait upload par test', '2024-11-27'),
(22, 'fichier à bien etait upload par test', '2024-11-27'),
(23, 'TP6 - Procédures stockées - Stagiaire - Corrigé.pdf à bien etait upload par test', '2024-11-27'),
(24, 'TP6 - Procédures stockées - Stagiaire - Corrigé.pdf à bien etait upload par test', '2024-11-27');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `nom`, `idUtilisateur`, `classe`) VALUES
(1, 'CyberSécurité', 12, 5);

-- --------------------------------------------------------

--
-- Structure de la table `moyenne`
--

CREATE TABLE `moyenne` (
  `idModule` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `moyenne` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `note`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE `possede` (
  `idQuestion` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `resultat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `idQuestion` int(11) NOT NULL,
  `intitule` varchar(500) NOT NULL,
  `idEvaluation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idReponse` int(11) NOT NULL,
  `intitule` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typeevaluation`
--

CREATE TABLE `typeevaluation` (
  `idEvaluation` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typeevaluation`
--

INSERT INTO `typeevaluation` (`idEvaluation`, `nom`) VALUES
(1, 'qcm');

-- --------------------------------------------------------

--
-- Structure de la table `typeutilisateur`
--

CREATE TABLE `typeutilisateur` (
  `idTypeUtilisateur` tinyint(1) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typeutilisateur`
--

INSERT INTO `typeutilisateur` (`idTypeUtilisateur`, `nom`) VALUES
(1, 'Etudiant'),
(2, 'Enseignant');

-- --------------------------------------------------------

--
-- Structure de la table `upload`
--

CREATE TABLE `upload` (
  `idUpload` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `classe` int(11) NOT NULL,
  `Date_Inscription` date NOT NULL,
  `typeUtilisateur` tinyint(1) DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `mdp`, `classe`, `Date_Inscription`, `typeUtilisateur`, `pseudo`) VALUES
(6, 'lagache', 'kylian', 'kylian.lagache@gmail.com', '$2y$10$p6BGY010I7t8GNM310WdZuRD5fN9GZA2LFLwAgUN0N.oRMABEygcC', 5, '2024-11-20', 1, 'destru14'),
(12, 'test', 'test', 'test@gmail.com', '$2y$10$LATTy60M05rmWg3YZt5t6ewcPDADbyzvX718UYaChPBHraBAe7Erm', 5, '2024-11-20', 2, 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`idModule`,`idEvaluation`),
  ADD KEY `idModule` (`idModule`,`idEvaluation`),
  ADD KEY `idEvaluation` (`idEvaluation`);

--
-- Index pour la table `avancer`
--
ALTER TABLE `avancer`
  ADD PRIMARY KEY (`idModule`,`idUtilisateur`),
  ADD KEY `idModule` (`idModule`,`idUtilisateur`),
  ADD KEY `idEtudiant` (`idUtilisateur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`idClasse`);

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD KEY `idNote` (`idNote`),
  ADD KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idEvaluation` (`idEvaluation`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idLog`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classe` (`classe`),
  ADD KEY `idProfesseur` (`idUtilisateur`);

--
-- Index pour la table `moyenne`
--
ALTER TABLE `moyenne`
  ADD PRIMARY KEY (`idModule`,`idUtilisateur`),
  ADD KEY `idEtudiant` (`idUtilisateur`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `possede`
--
ALTER TABLE `possede`
  ADD PRIMARY KEY (`idQuestion`,`idReponse`),
  ADD KEY `idQuestion` (`idQuestion`,`idReponse`),
  ADD KEY `idReponse` (`idReponse`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idQuestion`),
  ADD KEY `idEvaluation` (`idEvaluation`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idReponse`);

--
-- Index pour la table `typeevaluation`
--
ALTER TABLE `typeevaluation`
  ADD PRIMARY KEY (`idEvaluation`);

--
-- Index pour la table `typeutilisateur`
--
ALTER TABLE `typeutilisateur`
  ADD PRIMARY KEY (`idTypeUtilisateur`);

--
-- Index pour la table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`idUpload`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classe` (`classe`),
  ADD KEY `typeUtilisateur` (`typeUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `idClasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typeutilisateur`
--
ALTER TABLE `typeutilisateur`
  MODIFY `idTypeUtilisateur` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `upload`
--
ALTER TABLE `upload`
  MODIFY `idUpload` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `appartient_ibfk_1` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `appartient_ibfk_2` FOREIGN KEY (`idEvaluation`) REFERENCES `evaluation` (`id`);

--
-- Contraintes pour la table `avancer`
--
ALTER TABLE `avancer`
  ADD CONSTRAINT `avancer_ibfk_1` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `avancer_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`idNote`) REFERENCES `note` (`id`),
  ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`idEvaluation`) REFERENCES `evaluation` (`id`),
  ADD CONSTRAINT `contient_ibfk_3` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`type`) REFERENCES `typeevaluation` (`idEvaluation`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_3` FOREIGN KEY (`classe`) REFERENCES `classe` (`idClasse`),
  ADD CONSTRAINT `module_ibfk_4` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `moyenne`
--
ALTER TABLE `moyenne`
  ADD CONSTRAINT `moyenne_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `moyenne_ibfk_2` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`),
  ADD CONSTRAINT `possede_ibfk_2` FOREIGN KEY (`idReponse`) REFERENCES `reponse` (`idReponse`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`idEvaluation`) REFERENCES `evaluation` (`id`);

--
-- Contraintes pour la table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`classe`) REFERENCES `classe` (`idClasse`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`typeUtilisateur`) REFERENCES `typeutilisateur` (`idTypeUtilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
