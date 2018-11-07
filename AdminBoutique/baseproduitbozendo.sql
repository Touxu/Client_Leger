-- ============================================================
--   Nom de la base   :  baseproduitbozendo
--   Nom de SGBD      :  MYSQL
--   Date de création :  17/05/2018  19:58
--   Copyright       :  Colin BIHLER
-- ============================================================

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

create database baseproduitbozendo;
use baseproduitbozendo;
-- --------------------------------------------------------

-- ============================================================
--   Table : categories
-- ============================================================
CREATE TABLE `categories` (
  `NumCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `NomCategorie` varchar(80) NOT NULL,
  PRIMARY KEY (`NumCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : produits
-- ============================================================
CREATE TABLE `produits` (
  `NumProd` int(11) NOT NULL AUTO_INCREMENT,
  `NomProd` varchar(80) NOT NULL,
  `PrixProd` decimal(8,2) NOT NULL,
  `CodeCateg` int(11) NOT NULL,
  `Image` varchar(255) NULL,
  `DescProd` varchar(255) NULL,

  PRIMARY KEY (`NumProd`),
  FOREIGN KEY (`CodeCateg`) REFERENCES categories(NumCategorie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : utilisateurs
-- ============================================================
CREATE TABLE `utilisateurs` (
  `IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `LoginUtilisateur` varchar(40) NOT NULL,
  `MdpUtilisateur` Text NOT NULL,
  `EmailUtilisateur` varchar(80) NOT NULL,
  `Admin` boolean NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ============================================================
--   Contenu de la table categories
-- ============================================================

INSERT INTO `categories` (`NumCategorie`, `NomCategorie`) VALUES
(1, 'Tanto'),
(2, 'Nunchaku'),
(3, 'Shoto'),
(4, 'Kama'),
(5, 'Boken');


-- ============================================================
--   Contenu de la table produits
-- ============================================================

INSERT INTO `produits` (`NumProd`, `NomProd`, `PrixProd`, `CodeCateg`, `Image`, `DescProd`) VALUES
(1, 'Tanto bois rouge', 15, 1, 'tanto-bois-rouge-noris.jpg', 'Travailler avec ce tanto bois vous permettra de vous perfectionner au maniement des armes bois. Il résistera à des heures de pratiques.'),
(2, 'Nunchaku bois corde hexagonal', 20, 2, 'nunchaku-bois-corde-hexagonal.jpg', 'Nunchaku idéal pour débuter et apprendre le maniement de celui ci.'),
(3, 'Tanto chêne blanc', 25, 1, 'tanto-chene-blanc.jpg', 'Travailler avec ce tanto bois vous permettra de vous perfectionner au maniement des armes bois. Il résistera à des heures de pratiques.'),
(4, 'Shoto bois', 13, 3, 'shoto-bois.jpg', 'En chene rouge, poids environ 220g.'),
(5, 'Kama lame bois', 8, 4, 'kama.jpg', 'Kama bois longueur 46cm, La paire.'),
(6, 'Boken bois rouge', 23, 5, 'boken-bois-rouge.jpg', 'Boken en chêne rouge, longueur 102cm.'),
(7, 'Boken bois enfant', 6, 5, 'boken-bois-enfant.jpg', 'Boken adapté pour les enfants.'),
(8, 'Nunchaku bois dragon à chaînes', 17, 2, 'nunchaku-bois-dragon-a-chaines.jpg', 'Poignées 31cm, Longueur totale de 73cm.');

-- ============================================================
--   Contenu de la table utilisateurs
-- ============================================================

INSERT INTO `utilisateurs` (`idUtilisateur`, `LoginUtilisateur`, `MdpUtilisateur`, `EmailUtilisateur`, `Admin`) VALUES
(1, 'Colin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'cocods19@yahoo.fr', 1),
(2, 'Nathan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'cocods18@yahoo.fr', 0);