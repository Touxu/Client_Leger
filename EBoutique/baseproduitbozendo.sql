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
  `DescProd` Text NULL,
  PRIMARY KEY (`NumProd`),
  FOREIGN KEY (`CodeCateg`) REFERENCES categories(NumCategorie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : utilisateurs
-- ============================================================
CREATE TABLE `utilisateurs` (
  `IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `EmailUtilisateur` varchar(40) NOT NULL,
  `MdpUtilisateur` Text NOT NULL,
  `Prénom` varchar(40) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Téléphone` varchar(10) NULL,
  `Admin` boolean NOT NULL DEFAULT 0,
  PRIMARY KEY (`idUtilisateur`),
  `IdAdressePréférée` int(11) NULL,
  FOREIGN KEY (IdAdressePréférée) REFERENCES adresse(IdAdresse)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ============================================================
--   Table : adresse
-- ============================================================
CREATE TABLE `adresse` (
  `IdAdresse` int(11) NOT NULL AUTO_INCREMENT,
  `Pays` varchar(40) NOT NULL,
  `Prénom` varchar(40) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Adresse` varchar(40) NOT NULL,
  `AdresseComplement` varchar(40) NULL,
  `Ville` varchar(40) NOT NULL,
  `CodePostal` varchar(10) NOT NULL,
  `Région` varchar(40) NOT NULL,
  `Téléphone` varchar(10) NOT NULL,
  `Note` Text NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`IdAdresse`),
  FOREIGN KEY (IdUtilisateur) REFERENCES utilisateurs(IdUtilisateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ============================================================
--   Table : ligne_de_commande
-- ============================================================
CREATE TABLE `ligne_de_commande` (
  `NumCommande` int(11) NOT NULL,
  `NumProd` int(11) NOT NULL,
  `Quantitée` int(11) NOT NULL,
  PRIMARY KEY (`NumCommande`,`NumProd`),
  FOREIGN KEY (NumCommande) REFERENCES commandes(NumCommande),
  FOREIGN KEY (NumProd) REFERENCES produits(NumProd)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : commandes
-- ============================================================
CREATE TABLE `commandes` (
  `NumCommande` int(11) NOT NULL AUTO_INCREMENT,
  `DateCommande` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `IdUtilisateur` int(11) NOT NULL,
  `IdAdresse` int(11) NOT NULL,
  `NumCoupon` int(11) NULL,
  PRIMARY KEY (`NumCommande`),
  FOREIGN KEY (NumCoupon) REFERENCES coupon(NumCoupon),
  FOREIGN KEY (IdUtilisateur) REFERENCES utilisateurs(IdUtilisateur),
  FOREIGN KEY (IdAdresse) REFERENCES adresse(IdAdresse)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : coupon
-- ============================================================
CREATE TABLE `coupon` (
  `NumCoupon` int(11) NOT NULL AUTO_INCREMENT,
  `Libellé` varchar(40) NOT NULL,
  `Code` varchar(40) NOT NULL,
  `Taux` int(10) NOT NULL,
  PRIMARY KEY (`NumCoupon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : factures
-- ============================================================
CREATE TABLE `factures` (
  `NumFacture` int(13) NOT NULL AUTO_INCREMENT,
  `DateFacture` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `DateLivraison` TIMESTAMP NOT NULL,
  PRIMARY KEY (`NumFacture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : etape
-- ============================================================
CREATE TABLE `etape` (
  `NumEtape` int(11) NOT NULL AUTO_INCREMENT,
  `Libellé` varchar(80) NOT NULL,
  PRIMARY KEY (`NumEtape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : etat_livraison
-- ============================================================
CREATE TABLE `etat_livraison` (
  `NumFacture` int(13) NOT NULL,
  `Date` TIMESTAMP NOT NULL,
  `NumEtape` int(11) NOT NULL,
  PRIMARY KEY (`NumFacture`,`Date`,`NumEtape`),
  FOREIGN KEY (NumEtape) REFERENCES etape(NumEtape),
  FOREIGN KEY (NumFacture) REFERENCES factures(NumFacture)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================================================
--   Table : facturer
-- ============================================================
CREATE TABLE `facturer` (
  `NumFacture` int(13) NOT NULL,
  `NumCommande` int(11) NOT NULL,
  PRIMARY KEY (`NumFacture`,`NumCommande`),
  FOREIGN KEY (NumFacture) REFERENCES factures(NumFacture),
  FOREIGN KEY (NumCommande) REFERENCES commandes(NumCommande)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ============================================================
--   Contenu de la table categories
-- ============================================================

INSERT INTO `categories` (`NumCategorie`, `NomCategorie`) VALUES
(1, 'Tanto'),
(2, 'Nunchaku'),
(3, 'Shoto'),
(4, 'Kama'),
(5, 'Boken'),
(6, 'Bo'),
(7, 'Katana'),
(8, 'Autre');

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
(8, 'Nunchaku bois dragon à chaînes', 17, 2, 'nunchaku-bois-dragon-a-chaines.jpg', 'Poignées 31cm, Longueur totale de 73cm.'),
(9, 'Bâton long en carbone, 3 parties Noir', 88.8, 6, 'Bo_carbone.jpg',"Classique/bo bâton long, démontable en 3 segments à env. 60 cm. De haute qualité avec noyau en bois et graphite surface. Longueur : env. 182 cm. Pour Bozendo, Karate, kobudo, d'autres styles japonais ou Freestyle de formes. Avec Piano noir laqué brillant"),
(10, 'Tanto noir laqué', 96, 1, 'Tanto-noir-laque.jpg', "Fabriqué d'une seule pièce en acier forgé main. La lame à gorge affûtée en acier à haute teneur en carbone avec ligne de trempe. Longueur de la lame: 21 cm (nagasa) Courbure (sori): 3 mm / torii sori (symétrique) Kassane (épaisseur): 6.5 / 5.3 mm Tsuka (poignée) recouverte de peau de raie blanche Ito: coton noir Saya (fourreau) en bois laqué noir, sageo (cordon) noir Longueur totale: 38 cm Poids du tanto (environ): 370 gr Poids du saya (environ): 75 gr Livré avec une housse de protection."),
(11, 'Katana Practical noir', 119, 7, 'Katana-Practical-noir.jpg', "katana lame forgée, peut être utilisé pour l'entraînement à la coupe.

Fabriqué d'une seule pièce
Lame Maru à gorge de 70 cm tranchante en acier 1045 forgé ( acier dur, 0,45% de carbone)
Courbure (sori) : 20 mm / torii sori (symétrique)
Mune : hikushi
Dureté de 60 Hrc sur le fil et de 40 Hrc sur le dos de la lame
Longueur totale 102 cm
Poignée peau de raie recouverte de coton noir
Tsuba ovale: 7,5 x 7,8 cm
Tsuka : 25 cm
Fourreau en bois laqué noir
Poids du katana 1035 g
Poids du fourreau 245 g
Livré avec une housse coton noire.

Un katana de coupe très bien bien réalisé livré avec un support noir."),
(12, 'Mannequin en bois pivotant', 990, 8, 'Mannequin-en-bois-pivotant.jpg', 'Pour la pratique du Wing Chun
Mannequin de bois
pivotant à fixer au sol
bois exotique de haute qualité
Hauteur : 165cm
Poids : 48kg'),
(13, 'Kit entretien sabre simple', 18.4, 8, 'Kit-entretien-sabre.jpg', "Kit de nettoyage pour katana.

Huile pour lame, , chiffon d'entretien, une boule de poudre pour polir la lame, une alène de cuivre, 2 mekugi de rechange. Emballage coffret bois

L'huile est utilisée pour prévenir de l'oxydation de la lame. L'huile crée un film qui protège la lame de l'air et évite l'oxydation. Avec le temps l'huile sèche. Aussi il est important de renouveler l'application de l'huile au moins une fois pas mois.

Balle en poudre pour le polissage de la lame: (Uchiko). Une poudre blanche apparaît de l'Uchiko quand le lame est tamponnée avec l'Uchiko. Il y a deux buts d'utilisation. L'Uchiko enlève la vieille huile qui colle à la lame. L'Uchiko embellit la surface de lame.");


-- ============================================================
--   Contenu de la table utilisateur
-- ============================================================

INSERT INTO `utilisateurs` (`IdUtilisateur`, `Prénom`,`Nom`, `MdpUtilisateur`, `EmailUtilisateur`, `Téléphone`, `Admin`) VALUES
(1, 'Colin', 'BIHLER', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'cocods19@yahoo.fr', '0611223344', 1);


-- ============================================================
--   Contenu de la table adresse
-- ============================================================
INSERT INTO `adresse` (`IdAdresse`, `Pays`, `Prénom`, `Nom`, `Adresse`, `AdresseComplement`, `Ville`, `CodePostal`, `Région`, `Téléphone`, `Note`, `IdUtilisateur`) VALUES
(NULL, 'France', 'Nathan', 'BIHLER', '36 rue du lion', null, 'Hoenheim', '67897', 'Bas-Rhin', '0142634523', NULL, '1'),
(NULL, 'Japon', 'Pierre', 'Cailloux', '24 rue des chenipan', NULL, 'Bourg-palette', '34567', 'Kanto', '0623343123', "je m'apelle sacha", '1'),
(NULL, 'Espagne', 'Paul', 'Tron', '12 rue des chats', NULL, 'Marseille', '13001', "Provence-Alpes-Côte d'Azur", '0676879606', null, '1');

-- ============================================================
--   Ajout adresse préférée
-- ============================================================
UPDATE `utilisateurs` SET `IdAdressePréférée` = '1' WHERE `utilisateurs`.`IdUtilisateur` = 1 ;

-- ============================================================
--   Contenu de la table etape
-- ============================================================

INSERT INTO `etape` (`NumEtape`, `Libellé`) VALUES
(1, 'Payement accepté'),
(2, 'En cours de traitement'),
(3, 'Colis expédié'),
(4, 'Commande acceptée par la compagnie de transport'),
(5, "Colis avec la compagnie d'expédition locale"),
(6, 'Livraison réussie');

-- ============================================================
--   Contenu de la table commandes
-- ============================================================

INSERT INTO `commandes` (`NumCommande`, `DateCommande`, `IdUtilisateur`, `IdAdresse`, `NumCoupon`) VALUES
(1, '2018-11-03 12:33:39', 1, 1, null),
(2, '2018-11-03 12:37:23', 1, 2, null);

-- ============================================================
--   Contenu de la table ligne_de_commande
-- ============================================================

INSERT INTO `ligne_de_commande` (`NumCommande`, `NumProd`, `Quantitée`) VALUES
(1, 10, 1),
(2, 1, 3),
(2, 3, 4),
(2, 5, 2);

-- ============================================================
--   Contenu de la table factures
-- ============================================================

INSERT INTO `factures` (`NumFacture`, `DateFacture`, `DateLivraison`) VALUES
(1, '2018-11-03 12:33:39', '2018-11-10 00:00:00'),
(2, '2018-11-03 12:37:23', '2018-11-10 00:00:00');

-- ============================================================
--   Contenu de la table facturer
-- ============================================================

INSERT INTO `facturer` (`NumFacture`, `NumCommande`) VALUES
(1, 1),
(2, 2);

-- ============================================================
--   Contenu de la table etat_livraison
-- ============================================================
INSERT INTO `etat_livraison` (`NumFacture`, `Date`, `NumEtape`) VALUES
('1', CURRENT_TIMESTAMP, '1'),
('1', CURRENT_TIMESTAMP, '2'),
('1', CURRENT_TIMESTAMP, '3'),
('1', CURRENT_TIMESTAMP, '4'),
('1', CURRENT_TIMESTAMP, '5'),
('1', CURRENT_TIMESTAMP, '6'),
('2', CURRENT_TIMESTAMP, '1'),
('2', CURRENT_TIMESTAMP, '2'),
('2', CURRENT_TIMESTAMP, '3');