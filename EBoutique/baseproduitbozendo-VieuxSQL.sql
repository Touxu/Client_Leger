-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 06 nov. 2018 à 05:19
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `baseproduitbozendo`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `IdAdresse` int(11) NOT NULL,
  `Pays` varchar(40) NOT NULL,
  `Prénom` varchar(40) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Adresse` varchar(40) NOT NULL,
  `AdresseComplement` varchar(40) DEFAULT NULL,
  `Ville` varchar(40) NOT NULL,
  `CodePostal` varchar(10) NOT NULL,
  `Région` varchar(40) NOT NULL,
  `Téléphone` varchar(10) NOT NULL,
  `Note` text,
  `IdUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`IdAdresse`, `Pays`, `Prénom`, `Nom`, `Adresse`, `AdresseComplement`, `Ville`, `CodePostal`, `Région`, `Téléphone`, `Note`, `IdUtilisateur`) VALUES
(1, 'France', 'Nathan', 'BIHLER', '36 rue du lion', NULL, 'Hoenheim', '67897', 'Bas-Rhin', '0142634523', NULL, 1),
(2, 'Japon', 'Pierre', 'Cailloux', '24 rue des chenipan', NULL, 'Bourg-palette', '34567', 'Kanto', '0623343123', 'je m\'apelle sacha', 1),
(3, 'Espagne', 'Paul', 'Tron', '12 rue des chats', NULL, 'Marseille', '13001', 'Provence-Alpes-Côte d\'Azur', '0676879606', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `NumCategorie` int(11) NOT NULL,
  `NomCategorie` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`NumCategorie`, `NomCategorie`) VALUES
(1, 'Tanto'),
(2, 'Nunchaku'),
(3, 'Shoto'),
(4, 'Kama'),
(5, 'Boken'),
(6, 'Bo'),
(7, 'Katana'),
(8, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `NumCommande` int(11) NOT NULL,
  `DateCommande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUtilisateur` int(11) NOT NULL,
  `IdAdresse` int(11) NOT NULL,
  `NumCoupon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`NumCommande`, `DateCommande`, `IdUtilisateur`, `IdAdresse`, `NumCoupon`) VALUES
(1, '2018-11-03 11:33:39', 1, 1, NULL),
(2, '2018-11-03 11:37:23', 1, 2, NULL),
(3, '2018-11-03 18:52:59', 1, 1, 1),
(4, '2018-11-03 19:28:23', 1, 1, NULL),
(5, '2018-11-04 14:37:23', 1, 1, 1),
(6, '2018-11-06 04:08:29', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `coupon`
--

CREATE TABLE `coupon` (
  `NumCoupon` int(11) NOT NULL,
  `Libellé` varchar(40) NOT NULL,
  `Code` varchar(40) NOT NULL,
  `Taux` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coupon`
--

INSERT INTO `coupon` (`NumCoupon`, `Libellé`, `Code`, `Taux`) VALUES
(1, 'promo de haloween', 'HALO66', '0.80');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `NumEtape` int(11) NOT NULL,
  `Libellé` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`NumEtape`, `Libellé`) VALUES
(1, 'Payement accepté'),
(2, 'En cours de traitement'),
(3, 'Colis expédié'),
(4, 'Commande acceptée par la compagnie de transport'),
(5, 'Colis avec la compagnie d\'expédition locale'),
(6, 'Livraison réussie');

-- --------------------------------------------------------

--
-- Structure de la table `etat_livraison`
--

CREATE TABLE `etat_livraison` (
  `NumFacture` int(13) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NumEtape` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat_livraison`
--

INSERT INTO `etat_livraison` (`NumFacture`, `Date`, `NumEtape`) VALUES
(1, '2018-11-03 18:52:27', 1),
(2, '2018-11-03 18:52:27', 1),
(1, '2018-11-03 18:52:27', 2),
(2, '2018-11-03 18:52:27', 2),
(1, '2018-11-03 18:52:27', 3),
(2, '2018-11-03 18:52:27', 3),
(1, '2018-11-03 18:52:27', 4),
(1, '2018-11-03 18:52:27', 5),
(1, '2018-11-03 18:52:27', 6);

-- --------------------------------------------------------

--
-- Structure de la table `facturer`
--

CREATE TABLE `facturer` (
  `NumFacture` int(13) NOT NULL,
  `NumCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facturer`
--

INSERT INTO `facturer` (`NumFacture`, `NumCommande`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `NumFacture` int(13) NOT NULL,
  `DateFacture` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateLivraison` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`NumFacture`, `DateFacture`, `DateLivraison`) VALUES
(1, '2018-11-03 11:33:39', '2018-11-09 23:00:00'),
(2, '2018-11-03 11:37:23', '2018-11-09 23:00:00'),
(3, '2018-11-03 18:52:59', '2018-11-09 23:00:00'),
(4, '2018-11-03 19:28:23', '2018-11-09 23:00:00'),
(5, '2018-11-04 14:37:23', '2018-11-10 23:00:00'),
(6, '2018-11-06 04:08:29', '2018-11-12 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_de_commande`
--

CREATE TABLE `ligne_de_commande` (
  `NumCommande` int(11) NOT NULL,
  `NumProd` int(11) NOT NULL,
  `Quantitée` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligne_de_commande`
--

INSERT INTO `ligne_de_commande` (`NumCommande`, `NumProd`, `Quantitée`) VALUES
(1, 10, 1),
(2, 1, 3),
(2, 3, 4),
(2, 5, 2),
(3, 12, 1),
(4, 11, 1),
(5, 8, 2),
(6, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `NumProd` int(11) NOT NULL,
  `NomProd` varchar(80) NOT NULL,
  `PrixProd` decimal(8,2) NOT NULL,
  `CodeCateg` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `DescProd` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`NumProd`, `NomProd`, `PrixProd`, `CodeCateg`, `Image`, `DescProd`) VALUES
(1, 'Tanto bois rouge', '15.00', 1, 'tanto-bois-rouge-noris.jpg', 'Travailler avec ce tanto bois vous permettra de vous perfectionner au maniement des armes bois. Il résistera à des heures de pratiques.'),
(2, 'Nunchaku bois corde hexagonal', '20.00', 2, 'nunchaku-bois-corde-hexagonal.jpg', 'Nunchaku idéal pour débuter et apprendre le maniement de celui ci.'),
(3, 'Tanto chêne blanc', '25.00', 1, 'tanto-chene-blanc.jpg', 'Travailler avec ce tanto bois vous permettra de vous perfectionner au maniement des armes bois. Il résistera à des heures de pratiques.'),
(4, 'Shoto bois', '13.00', 3, 'shoto-bois.jpg', 'En chene rouge, poids environ 220g.'),
(5, 'Kama lame bois', '8.00', 4, 'kama.jpg', 'Kama bois longueur 46cm, La paire.'),
(6, 'Boken bois rouge', '23.00', 5, 'boken-bois-rouge.jpg', 'Boken en chêne rouge, longueur 102cm.'),
(7, 'Boken bois enfant', '6.00', 5, 'boken-bois-enfant.jpg', 'Boken adapté pour les enfants.'),
(8, 'Nunchaku bois dragon à chaînes', '17.00', 2, 'nunchaku-bois-dragon-a-chaines.jpg', 'Poignées 31cm, Longueur totale de 73cm.'),
(9, 'Bâton long en carbone, 3 parties Noir', '88.80', 6, 'Bo_carbone.jpg', 'Classique/bo bâton long, démontable en 3 segments à env. 60 cm. De haute qualité avec noyau en bois et graphite surface. Longueur : env. 182 cm. Pour Bozendo, Karate, kobudo, d\'autres styles japonais ou Freestyle de formes. Avec Piano noir laqué brillant'),
(10, 'Tanto noir laqué', '96.00', 1, 'Tanto-noir-laque.jpg', 'Fabriqué d\'une seule pièce en acier forgé main. La lame à gorge affûtée en acier à haute teneur en carbone avec ligne de trempe. Longueur de la lame: 21 cm (nagasa) Courbure (sori): 3 mm / torii sori (symétrique) Kassane (épaisseur): 6.5 / 5.3 mm Tsuka (poignée) recouverte de peau de raie blanche Ito: coton noir Saya (fourreau) en bois laqué noir, sageo (cordon) noir Longueur totale: 38 cm Poids du tanto (environ): 370 gr Poids du saya (environ): 75 gr Livré avec une housse de protection.'),
(11, 'Katana Practical noir', '119.00', 7, 'Katana-Practical-noir.jpg', 'katana lame forgée, peut être utilisé pour l\'entraînement à la coupe.\n\nFabriqué d\'une seule pièce\nLame Maru à gorge de 70 cm tranchante en acier 1045 forgé ( acier dur, 0,45% de carbone)\nCourbure (sori) : 20 mm / torii sori (symétrique)\nMune : hikushi\nDureté de 60 Hrc sur le fil et de 40 Hrc sur le dos de la lame\nLongueur totale 102 cm\nPoignée peau de raie recouverte de coton noir\nTsuba ovale: 7,5 x 7,8 cm\nTsuka : 25 cm\nFourreau en bois laqué noir\nPoids du katana 1035 g\nPoids du fourreau 245 g\nLivré avec une housse coton noire.\n\nUn katana de coupe très bien bien réalisé livré avec un support noir.'),
(12, 'Mannequin en bois pivotant', '990.00', 8, 'Mannequin-en-bois-pivotant.jpg', 'Pour la pratique du Wing Chun\nMannequin de bois\npivotant à fixer au sol\nbois exotique de haute qualité\nHauteur : 165cm\nPoids : 48kg'),
(13, 'Kit entretien sabre simple', '18.40', 8, 'Kit-entretien-sabre.jpg', 'Kit de nettoyage pour katana.\n\nHuile pour lame, , chiffon d\'entretien, une boule de poudre pour polir la lame, une alène de cuivre, 2 mekugi de rechange. Emballage coffret bois\n\nL\'huile est utilisée pour prévenir de l\'oxydation de la lame. L\'huile crée un film qui protège la lame de l\'air et évite l\'oxydation. Avec le temps l\'huile sèche. Aussi il est important de renouveler l\'application de l\'huile au moins une fois pas mois.\n\nBalle en poudre pour le polissage de la lame: (Uchiko). Une poudre blanche apparaît de l\'Uchiko quand le lame est tamponnée avec l\'Uchiko. Il y a deux buts d\'utilisation. L\'Uchiko enlève la vieille huile qui colle à la lame. L\'Uchiko embellit la surface de lame.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `IdUtilisateur` int(11) NOT NULL,
  `EmailUtilisateur` varchar(40) NOT NULL,
  `MdpUtilisateur` text NOT NULL,
  `Prénom` varchar(40) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Téléphone` varchar(10) DEFAULT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `IdAdressePréférée` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IdUtilisateur`, `EmailUtilisateur`, `MdpUtilisateur`, `Prénom`, `Nom`, `Téléphone`, `Admin`, `IdAdressePréférée`) VALUES
(1, 'cocods19@yahoo.fr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Colin', 'BIHLER', '0611223344', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`IdAdresse`),
  ADD KEY `IdUtilisateur` (`IdUtilisateur`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`NumCategorie`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`NumCommande`),
  ADD KEY `NumCoupon` (`NumCoupon`),
  ADD KEY `IdUtilisateur` (`IdUtilisateur`),
  ADD KEY `IdAdresse` (`IdAdresse`);

--
-- Index pour la table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`NumCoupon`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`NumEtape`);

--
-- Index pour la table `etat_livraison`
--
ALTER TABLE `etat_livraison`
  ADD PRIMARY KEY (`NumFacture`,`Date`,`NumEtape`),
  ADD KEY `NumEtape` (`NumEtape`);

--
-- Index pour la table `facturer`
--
ALTER TABLE `facturer`
  ADD PRIMARY KEY (`NumFacture`,`NumCommande`),
  ADD KEY `NumCommande` (`NumCommande`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`NumFacture`);

--
-- Index pour la table `ligne_de_commande`
--
ALTER TABLE `ligne_de_commande`
  ADD PRIMARY KEY (`NumCommande`,`NumProd`),
  ADD KEY `NumProd` (`NumProd`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`NumProd`),
  ADD KEY `CodeCateg` (`CodeCateg`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`IdUtilisateur`),
  ADD KEY `IdAdressePréférée` (`IdAdressePréférée`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `IdAdresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `NumCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `NumCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `NumCoupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `etape`
--
ALTER TABLE `etape`
  MODIFY `NumEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `NumFacture` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `NumProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`NumCoupon`) REFERENCES `coupon` (`NumCoupon`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`),
  ADD CONSTRAINT `commandes_ibfk_3` FOREIGN KEY (`IdAdresse`) REFERENCES `adresse` (`IdAdresse`);

--
-- Contraintes pour la table `etat_livraison`
--
ALTER TABLE `etat_livraison`
  ADD CONSTRAINT `etat_livraison_ibfk_1` FOREIGN KEY (`NumEtape`) REFERENCES `etape` (`NumEtape`),
  ADD CONSTRAINT `etat_livraison_ibfk_2` FOREIGN KEY (`NumFacture`) REFERENCES `factures` (`NumFacture`);

--
-- Contraintes pour la table `facturer`
--
ALTER TABLE `facturer`
  ADD CONSTRAINT `facturer_ibfk_1` FOREIGN KEY (`NumFacture`) REFERENCES `factures` (`NumFacture`),
  ADD CONSTRAINT `facturer_ibfk_2` FOREIGN KEY (`NumCommande`) REFERENCES `commandes` (`NumCommande`);

--
-- Contraintes pour la table `ligne_de_commande`
--
ALTER TABLE `ligne_de_commande`
  ADD CONSTRAINT `ligne_de_commande_ibfk_1` FOREIGN KEY (`NumCommande`) REFERENCES `commandes` (`NumCommande`),
  ADD CONSTRAINT `ligne_de_commande_ibfk_2` FOREIGN KEY (`NumProd`) REFERENCES `produits` (`NumProd`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`CodeCateg`) REFERENCES `categories` (`NumCategorie`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`IdAdressePréférée`) REFERENCES `adresse` (`IdAdresse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
