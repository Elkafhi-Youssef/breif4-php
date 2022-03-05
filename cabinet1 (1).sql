-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 fév. 2022 à 11:14
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cabinet1`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `fn_admin` varchar(100) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `fn_admin`, `email_admin`, `password`) VALUES
(1, 'youssef elkafhi', 'youssef@gmail.com', '98765');

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int(30) NOT NULL,
  `fn_doctor` varchar(100) NOT NULL,
  `email_doctor` varchar(255) NOT NULL,
  `passwod` varchar(100) NOT NULL,
  `date_birth` date NOT NULL,
  `type_Compence` enum('sickness1','sickness2','sickness3','sickness4') NOT NULL,
  `img_doctor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `fn_doctor`, `email_doctor`, `passwod`, `date_birth`, `type_Compence`, `img_doctor`) VALUES
(18, 'zaynab elkafhi', 'zaynab@gmail.com', '12345', '2022-01-17', 'sickness1', 'rtyu'),
(23, 'William Elizabeth', 'William@gmail.com', '12345', '2022-01-12', 'sickness2', 'img'),
(27, 'recardo', 'zaynab@gmail.cim', '12jjj', '2022-01-06', 'sickness2', 'img'),
(28, 'salma', 'salma@gmail.com', '12345', '2022-02-05', 'sickness1', 'img');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(30) NOT NULL,
  `fn_patient` varchar(100) NOT NULL,
  `email_patient` varchar(255) NOT NULL,
  `passwod` varchar(100) NOT NULL,
  `date_birth` date NOT NULL,
  `type_sickness` enum('sickness1','sickness2','sickness3','sickness4') NOT NULL,
  `img_patient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `fn_patient`, `email_patient`, `passwod`, `date_birth`, `type_sickness`, `img_patient`) VALUES
(12, 'hamza gassai', 'hamza@mail.com', '12345', '2022-01-17', 'sickness1', 'tyuiuytty'),
(14, 'robert robert', 'robert@gmail.com', '12345', '2022-01-05', 'sickness1', 'img'),
(16, 'robin birnard', 'robin@gmail.com', '12345', '2022-01-13', 'sickness1', 'img'),
(17, 'David Barbara', 'David@gmail.com', '12345', '2022-01-13', 'sickness2', 'img');

-- --------------------------------------------------------

--
-- Structure de la table `raport`
--

CREATE TABLE `raport` (
  `id_raport` int(30) NOT NULL,
  `desc_raport` date NOT NULL,
  `date_raport` date NOT NULL,
  `id_patient` int(30) NOT NULL,
  `id_doctor` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id_rendezvous` int(30) NOT NULL,
  `date_rendezvous` date NOT NULL,
  `id_patient` int(30) NOT NULL,
  `time_rdv` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `visit`
--

CREATE TABLE `visit` (
  `id_visit` int(30) NOT NULL,
  `date_visit` date NOT NULL,
  `id_patient` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id_raport`),
  ADD KEY `id_patient` (`id_patient`,`id_doctor`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id_rendezvous`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id_visit`),
  ADD KEY `id_patient` (`id_patient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `raport`
--
ALTER TABLE `raport`
  MODIFY `id_raport` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id_rendezvous` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visit`
--
ALTER TABLE `visit`
  MODIFY `id_visit` int(30) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `raport`
--
ALTER TABLE `raport`
  ADD CONSTRAINT `fk_id_doctor_raport` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_patient_raport` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `fk_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `fk_id_patient_visit` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
