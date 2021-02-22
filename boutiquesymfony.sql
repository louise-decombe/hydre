-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 22 fév. 2021 à 18:12
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutiquesymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `user_id`, `name`, `firstname`, `lastname`, `company`, `address`, `postal`, `city`, `country`, `phone`) VALUES
(3, 10, 'deuxième addresse', 'Louise', 'Décombe', 'abc', '94 rue du camas', '13005', 'marseille', 'france', '0771554199'),
(4, 11, 'super adresse', 'Louise', 'Décombe', 'abc', '6 rue de saint malo', '35000', 'Rennes', '', '0750059079'),
(5, 12, 'adresse 1', 'chantal', 'dumont', NULL, '1 rue marie curie', '13001', 'Marseille', '', '010239845773'),
(6, 14, 'adresse 1', 'loulou', 'deco', NULL, '41 rue des fleurs', '33000', 'Bordeaux', '', '010239845773'),
(7, 13, '94 rue du camas', 'Louise', 'Décombe', NULL, '94 rue du camas', '13005', 'marseille', '', '0771554199'),
(8, 15, 'adresse 3', 'louise', 'décombe', 'la plateforme', '1 rue de quelque chose', '13001', 'HelloWorld', 'DZ', '0123239348'),
(9, 15, 'adresse entreprise', 'michel', 'franck', 'google', '1 rue du lapin blanc', '33000', 'Montmorency', 'AT', '12345678910');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Littérature'),
(3, 'Autres littérature'),
(4, 'Jeunesse'),
(5, 'Bandes dessinées'),
(6, 'Arts'),
(7, 'Sciences humaines'),
(8, 'Vie pratique'),
(9, 'Revues'),
(10, 'Scolaire parascolaire'),
(11, 'Papeterie'),
(12, 'DVD');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210112093343', '2021-01-12 10:41:09', 63),
('DoctrineMigrations\\Version20210112114552', '2021-01-12 12:46:29', 35),
('DoctrineMigrations\\Version20210113085119', '2021-01-13 09:52:01', 73),
('DoctrineMigrations\\Version20210113091107', '2021-01-13 10:11:25', 181),
('DoctrineMigrations\\Version20210114115752', '2021-01-14 12:58:12', 43),
('DoctrineMigrations\\Version20210114115920', '2021-01-20 11:41:23', 33),
('DoctrineMigrations\\Version20210120104112', '2021-01-20 11:41:24', 25),
('DoctrineMigrations\\Version20210120143244', '2021-01-20 15:32:53', 147),
('DoctrineMigrations\\Version20210121093041', '2021-01-21 10:31:11', 165),
('DoctrineMigrations\\Version20210129141827', '2021-01-29 15:19:02', 42),
('DoctrineMigrations\\Version20210129145342', '2021-01-29 15:54:13', 58),
('DoctrineMigrations\\Version20210129150117', '2021-01-29 16:01:29', 124),
('DoctrineMigrations\\Version20210129155549', '2021-01-29 16:56:02', 66),
('DoctrineMigrations\\Version20210129160450', '2021-01-29 17:04:57', 47),
('DoctrineMigrations\\Version20210129160553', '2021-01-29 17:05:59', 143),
('DoctrineMigrations\\Version20210201130741', '2021-02-01 14:08:04', 60),
('DoctrineMigrations\\Version20210202100059', '2021-02-02 11:04:14', 150),
('DoctrineMigrations\\Version20210202101813', '2021-02-02 11:21:01', 142),
('DoctrineMigrations\\Version20210202134928', '2021-02-02 14:49:38', 154),
('DoctrineMigrations\\Version20210202155117', '2021-02-02 16:51:29', 32),
('DoctrineMigrations\\Version20210204123111', '2021-02-04 13:31:27', 31),
('DoctrineMigrations\\Version20210204143454', '2021-02-04 15:35:13', 42),
('DoctrineMigrations\\Version20210209083539', '2021-02-09 09:35:49', 39),
('DoctrineMigrations\\Version20210209085407', '2021-02-09 09:54:18', 37);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `user_id`, `created_at`, `delivery`, `reference`, `stripe_session_id`, `state`) VALUES
(22, 12, '2021-02-04 15:29:08', 'chantal dumont<br>1 rue marie curie<br>13001<br>Marseille<br>FR<br>010239845773', '04022021-601c04b42d332', NULL, 2),
(23, 12, '2021-02-04 16:16:34', 'chantal dumont<br>1 rue marie curie<br>13001<br>Marseille<br>FR<br>010239845773', '04022021-601c0fd28cbb6', 'cs_test_a1aibV4mTxF9kBWx3VEAfBO9pNApvfV2cot1wd9gmq7cGMGKAoNUxWahBC', 2),
(24, 12, '2021-02-05 18:38:07', 'chantal dumont<br>1 rue marie curie<br>13001<br>Marseille<br>FR<br>010239845773', '05022021-601d827f053a1', 'cs_test_a1mnO6wNtoKpVWs5nlmqEwOLf07exSL51nQZlf488XD5BmPMPBTL850eON', 2),
(25, 12, '2021-02-05 18:44:13', 'chantal dumont<br>1 rue marie curie<br>13001<br>Marseille<br>FR<br>010239845773', '05022021-601d83ed84d4d', 'cs_test_a1dBIO6NpuwNlWPgHKoH8Di6EdzaNWSZdunvkexW1vAalZQEcd1JqlPYVi', 0),
(26, 14, '2021-02-09 16:12:50', 'loulou deco<br>41 rue des fleurs<br>33000<br>Bordeaux<br>AR<br>010239845773', '09022021-6022a6724a544', 'cs_test_a1PBHmNb9yWt0SrX5ctqQjTkhxWxIKYP5nuI5hzpX5fCOTbxhCdwzrZRiX', 0),
(27, 14, '2021-02-09 16:14:19', 'loulou deco<br>41 rue des fleurs<br>33000<br>Bordeaux<br>AR<br>010239845773', '09022021-6022a6cbab02e', 'cs_test_a1AeotZrJ2ljKflkQNgVl7XpZ0CLB7dhgHri4urEIRrL5ZHzlqBOIC4B3M', 0),
(28, 14, '2021-02-10 10:04:02', 'loulou deco<br>41 rue des fleurs<br>33000<br>Bordeaux<br>AR<br>010239845773', '10022021-6023a182a0ea1', 'cs_test_a1JbWtjTjlvOUQ3M1ljiTuo0CFISqaD7qZt4qJufwpcTxTI9BoVo85f5wf', 2),
(29, 11, '2021-02-12 09:16:33', 'Louise Décombe<br>abc<br>6 rue de saint malo<br>35000<br>Rennes<br>FR<br>0750059079', '12022021-60263961b3d7a', 'cs_test_b1PyS3F8lGItXs0iV7IxuY3sVG1EPhZfBziu0sfpBnpgRsYf7PVoAeDWqv', 2),
(30, 12, '2021-02-12 09:20:43', 'chantal dumont<br>1 rue marie curie<br>13001<br>Marseille<br>FR<br>010239845773', '12022021-60263a5b3c223', 'cs_test_a1h40muk79JaSfZZTjYgdYMaTMMHrgZHorLoFFF6tULjxdsDPtR4QuRGJa', 0),
(31, 13, '2021-02-16 15:46:01', 'Louise Décombe<br>94 rue du camas<br>13005<br>marseille<br>FR<br>0771554199', '16022021-602bdaa968a61', 'cs_test_a1SIfAlHXPbfHjoNIayuodEZqVd3sUiI6wTxrwUilhGqEcglOpyeOjbVJ1', 0),
(32, 13, '2021-02-16 15:47:09', 'Louise Décombe<br>94 rue du camas<br>13005<br>marseille<br>FR<br>0771554199', '16022021-602bdaeda9d54', 'cs_test_a1HyEk8nLX9CqQ9pFfFhB5xW6Vnbid1od26IcKYTrqkn2sWRirBUPJ1i4S', 0),
(33, 13, '2021-02-17 09:53:28', 'Louise Décombe<br>94 rue du camas<br>13005<br>marseille<br>FR<br>0771554199', '17022021-602cd988aa386', 'cs_test_a1i2gTvWssICOb6QjjVD1l0P2H5CHEkQKXWxa9bBExtODBv0x6Mw7uXnvC', 0),
(34, 15, '2021-02-18 14:11:33', 'louise décombe<br>la plateforme<br>1 rue de quelque chose<br>13001<br>HelloWorld<br>DZ<br>0123239348', '18022021-602e6785e1a6f', NULL, 0),
(35, 15, '2021-02-18 14:11:48', 'louise décombe<br>la plateforme<br>1 rue de quelque chose<br>13001<br>HelloWorld<br>DZ<br>0123239348', '18022021-602e6794d3a79', NULL, 0),
(36, 15, '2021-02-22 10:05:17', 'louise décombe<br>la plateforme<br>1 rue de quelque chose<br>13001<br>HelloWorld<br>DZ<br>0123239348', '22022021-603373cda646e', 'cs_test_a12zDnVGhZLDeYfxEUDzC5wgjJyanP7jQlid7A4xgJRxa34sVbcsLsFgH4', 2);

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `my_order_id` int(11) NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`id`, `my_order_id`, `product`, `quantity`, `price`, `total`) VALUES
(27, 22, 'Beauté fatale', 1, 1800, 1800),
(28, 22, 'Se défendre', 1, 1800, 1800),
(29, 23, 'Entrez rêveurs, sortez manageurs', 1, 2000, 2000),
(30, 24, 'Le syndrome de l\'imposteur', 2, 1700, 3400),
(31, 25, 'Le syndrome de l\'imposteur', 1, 1700, 1700),
(32, 26, 'Se défendre', 2, 1800, 3600),
(33, 27, 'Se défendre', 1, 1800, 1800),
(34, 28, 'Beauté fatale', 1, 1800, 1800),
(35, 29, 'Beauté fatale', 2, 1800, 3600),
(36, 29, 'Avis de Tempête', 1, 1200, 1200),
(37, 30, 'Se défendre', 1, 1800, 1800),
(38, 31, 'Le syndrome de l\'imposteur', 1, 1700, 1700),
(39, 32, 'Entrez rêveurs, sortez manageurs', 1, 2000, 2000),
(40, 33, 'Se défendre', 1, 1800, 1800),
(41, 34, 'Beauté fatale', 1, 1800, 1800),
(42, 34, 'Se défendre', 2, 1800, 3600),
(43, 35, 'Beauté fatale', 1, 1800, 1800),
(44, 35, 'Se défendre', 2, 1800, 3600),
(45, 36, 'Se défendre', 2, 1800, 3600);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `nbe_pages` int(11) NOT NULL,
  `year_of_publication` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `illustration`, `subtitle`, `description`, `price`, `author`, `publisher`, `stock`, `nbe_pages`, `year_of_publication`, `subcategory_id`) VALUES
(7, 'Se défendre', 'se-defendre', 'c5535fff7c8b3b40e22fcbebe1f43d3adef08390.jpg', 'Une philosophie de la violence', 'En 1685, le Code noir défendait « aux esclaves de porter aucune arme offensive ni de gros bâtons » sous peine de fouet. Au XIXe siècle, en Algérie, l’État colonial interdisait les armes aux indigènes, tout en accordant aux colons le droit de s’armer. Aujourd’hui, certaines vies comptent si peu que l’on peut tirer dans le dos d’un adolescent noir au prétexte qu’il était « menaçant ».\r\nUne ligne de partage oppose historiquement les corps « dignes d’être défendus » à ceux qui, désarmés ou rendus indéfendables, sont laissés sans défense. Ce « désarmement » organisé des subalternes pose directement, pour tout élan de libération, la question du recours à la violence pour sa propre défense.\r\nDes résistances esclaves au ju-jitsu des suffragistes, de l’insurrection du ghetto de Varsovie aux Black Panthers ou aux patrouilles queer, Elsa Dorlin retrace une généalogie de l’autodéfense politique. Sous l’histoire officielle de la légitime défense affleurent des « éthiques martiales de soi », pratiques ensevelies où le fait de se défendre en attaquant apparaît comme la condition de possibilité de sa survie comme de son devenir politique. Cette histoire de la violence éclaire la définition même de la subjectivité moderne, telle qu’elle est pensée dans et par les politiques de sécurité contemporaines, et implique une relecture critique de la philosophie politique, où Hobbes et Locke côtoient Frantz Fanon, Michel Foucault, Malcolm X, June Jordan ou Judith Butler.', 1800, 'Elsa Dorlin', 'editions', 20, 150, 2019, 61),
(8, 'Beauté fatale', 'beaute-fatale', '99cd5876512a3272736d1755881dea87108e702d.jpg', 'Les nouveaux visages d\'une aliénation féminine', 'Soutiens-gorge rembourrés pour fillettes, obsession de la minceur, banalisation de la chirurgie esthétique, prescription insistante du port de la jupe comme symbole de libération : la « tyrannie du look » affirme aujourd’hui son emprise pour imposer la féminité la plus stéréotypée. Décortiquant presse féminine, discours publicitaires, blogs, séries télévisées, témoignages de mannequins et enquêtes sociologiques, Mona Chollet montre dans ce livre comment les industries du « complexe mode-beauté » travaillent à maintenir, sur un mode insidieux et séduisant, la logique sexiste au cœur de la sphère culturelle.\r\nSous le prétendu culte de la beauté prospère une haine de soi et de son corps, entretenue par le matraquage de normes inatteignables. Un processus d’autodévalorisation qui alimente une anxiété constante au sujet du physique en même temps qu’il condamne les femmes à ne pas savoir exister autrement que par la séduction, les enfermant dans un état de subordination permanente. En ce sens, la question du corps pourrait bien constituer la clé d’une avancée des droits des femmes sur tous les autres plans, de la lutte contre les violences à celle contre les inégalités au travail.', 1800, 'Mona Cholet', 'La découverte', 12, 150, 2018, 61),
(9, 'Entrez rêveurs, sortez manageurs', 'entrez-reveurs-sortez-manageurs', '1c80868e80f10e0bf21d2b76c517f43546e6c969.jpg', 'Formation et formatage en école de commerce', '« Entrez rêveurs, sortez manageurs » : telle était la promesse de l’Inseec en 2018, dans une campagne de publicité recouvrant les murs du métro parisien. Ce slogan, dont le cynisme a été raillé sur les réseaux sociaux, dit beaucoup du processus de formation des étudiants passés par ces grandes écoles de commerce : la conversion de bons élèves, consacrés par le système scolaire, aux impératifs de l’entreprise. D’une formation académique en classe préparatoire ou à l’université, ils glissent, le plus souvent sans mise en garde, dans un monde où rentabilité et efficacité sont les maîtres-mots. Confrontés à l’indigence intellectuelle du contenu de leurs cours, ils se livrent bientôt aux plaisirs faciles de la vie étudiante, entre soirées d’excès, engagements associatifs et échanges dans des universités à l’étranger. Cette immersion au coeur d’une expérience dense et intense joue le rôle de catalyseur dans leur adhésion à un projet de formation – et de vie – qui pourtant répugne au premier abord à nombre d’entre eux. Car loin de n’être que des « loups de la finance » en puissance, ces futurs cadres sont souvent taraudés par de profondes questions existentielles.\r\nDe HEC à l’Essec, en passant par Skema et Neoma, l’auteur a rencontré plus d’une centaine d’étudiants dont il restitue les propos, les doutes, et leurs évolutions. Entrez rêveurs, sortez manageurs rend ainsi compte de toutes les étapes de cette transformation de bons élèves en manageurs efficaces. Et ce sans manquer de donner à penser les dérives (bizutage, sexisme, traditions…) si souvent décriées mais mal appréhendées, pour mieux comprendre le système de formation voire de formatage de ces futures élites, qui sont l’incarnation de l’esprit du capitalisme néolibéral.', 2000, 'Maurice Midena', 'La découverte', 12, 150, 2005, 53),
(10, 'Le syndrome de l\'imposteur', 'le-syndrome-de-limposteur', '16d574a38d18e8e4f6a073b557c1d6da7b718bb7.jpg', 'Parcours d\'une interne en psychiatrie', 'Lucile Lapierre, jeune interne en médecine en proie à un sentiment maladif d’illégitimité, est affectée un peu par hasard à une unité pour malades difficiles d’un hôpital psychiatrique. Dans ce récit initiatique inspiré de son expérience personnelle, Claire Le Men dresse un portrait juste et drôle de l’institution psychiatrique et des personnages qui la peuplent. Ce faisant, elle fait voler en éclat nos présupposés sur la folie.', 1700, 'Claire Le Min', 'La découverte', 2, 150, 2020, 29),
(11, 'Avis de Tempête', 'avis-de-tempete', 'e5504867c1e4c95204e78b2e181226fd8aa17e5c.png', 'Avis de tempête est un essai', 'Écrit dans le feu des événements de la pandémie et du renouveau du mouvement Black Lives Matter, ce recueil propose une analyse disséquant la crise économique, ses causes, ses conséquences et la manière dont elle s’inscrit historiquement dans notre civilisation.\r\nPour l’auteur de Changer le monde sans prendre le pouvoir (Lux) et Crack Capitalism (Libertalia), il nous faut partir de nos insubordinations, créer des brèches, inverser le cours des choses.', 1200, 'John Holloway', 'Libertalia', 2, 80, 2020, 58),
(12, 'Les Grands Discours du XXe siècle', 'les-grands-discours-du-xxe-siecle', '223d0e494d94122f7d567354f8729a7a5877e4b1.jpg', '«Je vous ai compris !», «Ich bin ein Berliner», «I have a dream»...', '«Je vous ai compris !», «Ich bin ein Berliner», «I have a dream»... Nous connaissons tous ces citations fameuses, qui à elles seules racontent un moment crucial de l\'Histoire. Mais savons-nous dans quel contexte elles ont été prononcées ; quelle argumentation, quelle rhétorique les ont portées ; en quoi elles symbolisent cette ultime magie du politique qu\'est la rencontre d\'un homme et d\'une foule ? De Jaurès à Obama, en passant par Lénine, Hitler, de Gaulle, Mao Zedong, Martin Luther King, Simone Veil ou Jean-Paul II, ce recueil rassemble les grands discours qui ont marqué le XXe et le début du XXIe siècle. Les voix de ces orateurs, hommes et femmes providentiels, chefs charismatiques ou despotes tristement célèbres, nous font revivre «en direct» les événements de l\'histoire contemporaine (la Résistance, la guerre froide, la création de l\'État d\'Israël...) ; elles nous renvoient l\'écho des débats et des combats qui, au fil du siècle, n\'ont cessé d\'agiter les consciences : pour la paix et l\'égalité entre les hommes ; contre la pauvreté, la discrimination ou la peine de mort... Lire ou relire ces discours, c\'est parcourir notre histoire, mais aussi redécouvrir la puissance de la parole et le sens profond de l\'engagement.', 800, 'Christophe Boutin', 'Champs Classique', 34, 100, 2021, 56);

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category_id`) VALUES
(1, 'Littérature française', 2),
(2, 'Littérature UK', 2),
(3, 'Littérature scandinave', 2),
(4, 'Littérature allemande', 2),
(5, 'Littérature espagnole', 2),
(6, 'Littérature portugal', 2),
(7, 'Littérature italie', 2),
(8, 'Littérature grèce', 2),
(9, 'Littérature russie', 2),
(10, 'Littérature maghreb', 2),
(11, 'Littérature afrique', 2),
(12, 'Littérature moyen-orient', 2),
(13, 'Littérature asie', 2),
(14, 'Littérature océanie', 2),
(15, 'Littérature amérique du nord', 2),
(16, 'Littérature amérique du sud', 2),
(17, 'Littérature caraïbes', 2),
(18, 'voyage', 3),
(19, 'poésie', 3),
(20, 'Théâtre', 3),
(21, 'Polar', 3),
(22, 'Science-fiction', 3),
(23, 'Humour', 3),
(24, 'Contes', 3),
(25, 'Critique littéraire', 3),
(26, 'Commandes client', 3),
(27, 'Albums 1er âge', 4),
(28, 'Albums fiction', 4),
(29, 'Albums documentaire', 4),
(30, 'BD jeunesse', 4),
(31, 'BD ado', 4),
(32, 'Documentaires jeunes', 4),
(33, 'Premières lectures', 4),
(34, 'Romans jeunesse', 4),
(35, 'Contes jeunesse', 4),
(36, 'Musique jeunesse', 4),
(37, 'Art jeunesse', 4),
(38, 'Activités jeunesse', 4),
(39, 'Albums', 5),
(40, 'Séries', 5),
(41, 'Mangas', 5),
(42, 'Musique', 6),
(43, 'Cinéma', 6),
(44, 'Photographie', 6),
(45, 'Arts plastiques', 6),
(46, 'Écrits sur l\'art', 6),
(47, 'Commandes client', 6),
(48, 'Philo', 7),
(49, 'Pyschologie / psychanalyze', 7),
(50, 'Anthropoligie / Etnologie', 7),
(51, 'Sciences', 7),
(52, 'Géographie', 7),
(53, 'Economie', 7),
(54, 'Ecologie', 7),
(55, 'Histoire de France', 7),
(56, 'Histoire des pays', 7),
(57, 'Théories historique', 7),
(58, 'Politique critique', 7),
(59, 'Sociologie', 7),
(60, 'Pédagogie / éducation', 7),
(61, 'Féminisme / genre', 7),
(62, 'Travail', 7),
(63, 'Commandes client', 7),
(64, 'Cuisine', 8),
(65, 'Jardinage', 8),
(66, 'Construction', 8),
(67, 'Loisirs créatifs', 8),
(68, 'DIY', 8),
(69, 'Naturopathie, santé', 8),
(70, 'Nature et botanique', 8),
(71, 'Guides de voyage', 8),
(72, 'Cartes et plans', 8),
(73, 'Marche et randonnée', 8),
(74, 'Revues arts et littératures', 9),
(75, 'Revues BD', 9),
(76, 'Revues voyage', 9),
(77, 'Revues jeunesse', 9),
(78, 'Primaire', 10),
(79, 'Secondaire - collège', 10),
(80, 'Universitaire', 9),
(81, 'Langue, dictionnaire', 10),
(82, 'Cartes', 11),
(83, 'Agendas', 11),
(84, 'Calendriers', 11),
(85, 'Affiches', 11),
(86, 'DVD SH', 12),
(87, 'Documentaire', 12),
(88, 'Fiction', 12),
(89, 'Jeunesse', 12);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`) VALUES
(7, 'doe@mail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$rpNdn+rlLgeRBCUxTI6Wyg$GL73tWR5Q9bejuwtShlp/uPugZhRpVhEGO1zKFz9Gns', 'joanna', 'doe'),
(8, 'lea@mail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$jKS39g4tP7uJb+d/NG5iWA$wMYB4OMbAujEsPUo44WYTCMGqbFNAHwRIoLG656MrmQ', 'léa', 'dupont'),
(9, 'louise@mail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$5OASFtJgxtL0dZgo6ueeHA$kuhheCcHV2QEFcwR0NZrrEdW+CG74itGXHdotZJGwkw', 'louise', 'durand'),
(10, 'marie@mail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$8YLMVPj8VCy0ruc1RSQd+Q$4hR1C8cs0nAZE5hwRtGMnA7pFeQhtqZjDqh1w9izNdw', 'marie', 'durand'),
(11, 'joanna@mail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Va6q/ZTDvRov2xvs7xr7yw$72oqUcjsc4BFGFoW16SuNWEUnVkbkPRkZjPLcUsW9r4', 'jojo', 'dupont'),
(12, 'chantal@mail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$azhWVr4sxqH8pCpx6bsVjg$ZILKBx3ZjH+d2nx2TQ98WwCw7sNl9OjfQVTtanDOY04', 'chantal', 'dumont'),
(13, 'louise.decombe@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$fzyVjyyRCk43FRxrM0No1Q$STl60C2dW+uZ6npIDnaVMO4j50u+0gbDgJdnmRP7wMQ', 'loulou', 'deco'),
(14, 'louise.decombe@laplateforme.io', '[]', '$argon2id$v=19$m=65536,t=4,p=1$ASM/8JY2X1/sKh+YHEs1VQ$WqkgCU/FA6rtKnQ1KdasVYjD1tNSbjoK9pPuwdtfkeI', 'loulou', 'deco'),
(15, 'michel@mail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$rz4+IhRql49n8ttY74iK3w$yr1ZxvG0x271Qf/MtACXJOo25O9ftVKgw/gdE1ELRNI', 'michel', 'barnier'),
(16, 'abc@mail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$JrdL+9Hk5Z/ETPnbN5TxcA$XdMl6X2ATSmjCfe/EUYx9c7l66BvcImuUV6BnRQpyA4', 'abc', 'abc');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D4E6F81A76ED395` (`user_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F5299398A76ED395` (`user_id`);

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_845CA2C1BFCDF877` (`my_order_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD5DC6FE57` (`subcategory_id`);

--
-- Index pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DDCA44812469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_D4E6F81A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F5299398A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_845CA2C1BFCDF877` FOREIGN KEY (`my_order_id`) REFERENCES `order` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD5DC6FE57` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`);

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `FK_DDCA44812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
