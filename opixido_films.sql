-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 25 août 2022 à 11:01
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `opixido_films`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `f_id` int(11) NOT NULL,
  `f_titre` varchar(255) DEFAULT NULL,
  `f_annee` int(11) DEFAULT NULL,
  `f_desc` longtext,
  `f_affiche` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`f_id`, `f_titre`, `f_annee`, `f_desc`, `f_affiche`) VALUES
(1, 'Harry Potter à l\'Ecole des Sorciers', 2001, 'Orphelin, Harry Potter a été recueilli à contrecœur par son oncle Vernon et sa tante Pétunia, aussi cruels que mesquins, qui n\'hésitent pas à le faire dormir dans le placard sous l\'escalier. Constamment maltraité, il doit en outre supporter les jérémiades de son cousin Dudley, garçon cupide et archi-gâté par ses parents. De leur côté, Vernon et Pétunia détestent leur neveu dont la présence leur rappelle sans cesse le tempérament \"imprévisible\" des parents du garçon et leur mort mystérieuse.\r\nÀ l\'approche de ses 11 ans, Harry ne s\'attend à rien de particulier – ni carte, ni cadeau, ni même un goûter d\'anniversaire. Et pourtant, c\'est à cette occasion qu\'il découvre qu\'il est le fils de deux puissants magiciens et qu\'il possède lui aussi d\'extraordinaires pouvoirs. Quand on lui propose d\'intégrer Poudlard, la prestigieuse école de sorcellerie, il trouve enfin le foyer et la famille qui lui ont toujours manqué… et s\'engage dans l\'aventure de sa vie.', 'http://emmawatson45170.e-monsite.com/medias/images/4bud3nugd2xnhlkyncxhfjpheh5.jpg'),
(2, 'Les Filles du Docteur March', 2020, 'Une nouvelle adaptation des \"Quatre filles du Docteur March\" qui s’inspire à la fois du grand classique de la littérature et des écrits de Louisa May Alcott. Relecture personnelle du livre, Les filles du Docteur March est un film à la fois atemporel et actuel où Jo March, alter ego fictif de l’auteur, repense à sa vie.', 'https://www.francetvinfo.fr/pictures/Rf4J4tuaUJfGI07XFw92lEHDXIw/fit-in/720x/2019/12/27/phpONoFQR.jpg'),
(3, 'La Forme de l\'Eau', 2018, 'Modeste employée d’un laboratoire gouvernemental ultrasecret, Elisa mène une existence solitaire, d’autant plus isolée qu’elle est muette. Sa vie bascule à jamais lorsqu’elle et sa collègue Zelda découvrent une expérience encore plus secrète que les autres…', 'https://www.digitalcine.fr/wp-content/uploads/2018/02/affiche_la-forme-de-l-eau.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `film_has_personne`
--

CREATE TABLE `film_has_personne` (
  `film_f_id` int(11) NOT NULL,
  `personne_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film_has_personne`
--

INSERT INTO `film_has_personne` (`film_f_id`, `personne_p_id`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 3),
(3, 4),
(3, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `p_id` int(11) NOT NULL,
  `p_nom` varchar(120) DEFAULT NULL,
  `p_role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`p_id`, `p_nom`, `p_role`) VALUES
(1, 'Emma Watson', 'Acteur-ice'),
(2, 'Daniel Radcliff', 'Acteur-ice'),
(3, 'Greta Gerwig', 'Realisateur-ice'),
(4, 'Guillermo del Toro', 'Realisateur-ice'),
(5, 'Sally Hawkins', 'Acteur-ice'),
(6, 'Chris Colombus', 'Realisateur-ice');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`f_id`);

--
-- Index pour la table `film_has_personne`
--
ALTER TABLE `film_has_personne`
  ADD PRIMARY KEY (`film_f_id`,`personne_p_id`),
  ADD KEY `fk_film_has_personne_personne1_idx` (`personne_p_id`),
  ADD KEY `fk_film_has_personne_film_idx` (`film_f_id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film_has_personne`
--
ALTER TABLE `film_has_personne`
  ADD CONSTRAINT `fk_film_has_personne_film` FOREIGN KEY (`film_f_id`) REFERENCES `film` (`f_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film_has_personne_personne1` FOREIGN KEY (`personne_p_id`) REFERENCES `personne` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
