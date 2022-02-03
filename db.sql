-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 05 Janvier 2022 à 13:35
-- Version du serveur :  10.3.31-MariaDB-0+deb10u1
-- Version de PHP :  7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Pseudo` varchar(20) NOT NULL,
  `Mdp` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`ID`, `Pseudo`, `Mdp`) VALUES
(1, 'admin', '$2y$10$xipjVuboAyqUlAHp75C9tuifxLinnEbRaiPvNXeNEIY1pxgRABiJy');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `ID` int(11) NOT NULL,
  `NewsID` int(11) NOT NULL,
  `Auteur` varchar(100) NOT NULL,
  `ContenuCom` longtext NOT NULL,
  `DateCom` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`ID`, `NewsID`, `Auteur`, `ContenuCom`, `DateCom`) VALUES
(1, 2, 'Jean Jacques', 'Trop bien l\'article', '2021-11-28 20:16:31'),
(2, 2, 'Fabrice', 'Jean Jacques a raison', '2021-11-28 20:16:31'),
(48, 2, 'admin', 'pas mal celui là', '2022-01-04 21:35:03'),
(8, 7, 'Jean Jacques', 'Le commentaire test', '2021-11-29 18:56:06'),
(12, 7, 'Bertrand', 'Trop bien cet article', '2021-11-29 20:37:27'),
(27, 7, ' Freud', 'Excellent', '2022-01-04 13:40:20'),
(51, 4, 'Didier', 'incroyable', '2022-01-05 11:58:13');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `Titre` varchar(255) DEFAULT NULL,
  `Contenu` longtext DEFAULT NULL,
  `DateNews` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`ID`, `Titre`, `Contenu`, `DateNews`) VALUES
(1, 'COVID-19: L\'ESPAGNE RÉDUIT L\'ISOLEMENT POUR LES CAS POSITIFS AFIN DE NE PAS RALENTIR L\'ÉCONOMIE', 'Le gouvernement espagnol a annoncé mercredi réduire la durée de la quarantaine des personnes positives au Covid-19 à sept jours contre dix auparavant. Une décision qui survient alors que le nombre record de contaminations suscite, comme ailleurs, des craintes de déstabilisation de l\'économie.\r\n\r\nCette mesure est destinée à trouver un équilibre entre \"santé publique\" et \"croissance économique\", a déclaré le Premier ministre espagnol Pedro Sanchez devant la presse, avant que la décision ne soit officialisée par le ministère de la Santé dans un communiqué.\r\n\r\nL\'Espagne, confrontée comme le monde entier à la déferlante du variant Omicron, rejoint ainsi la liste grandissante des pays à réduire la durée de la quarantaine des personnes contaminées, comme l\'Argentine mercredi et après les États-Unis lundi et l\'Angleterre peu avant Noël.\r\n\r\nLes autorités espagnoles avaient déjà recommandé le 21 décembre de ne plus imposer de quarantaine aux personnes totalement vaccinées ayant été en contact étroit avec des personnes infectées par le variant Omicron, mais de simplement limiter leurs contacts. Les cas contacts non vaccinés devront en revanche toujours observer une quarantaine, réduite elle aussi mercredi de dix à sept jours.\r\n\r\nToujours en vue de limiter les arrêts de travail, la mairie de Madrid a décidé que certains de ses fonctionnaires pourraient travailler malgré un test positif si leur charge virale, et donc leur contagiosité, est assez faible. L\'Espagne a pulvérisé mercredi son record avec 100.760 cas recensés en 24h. La précédente vague de records quotidiens datait de mi-janvier et était de près de 40.000 cas en 24h. Le pays a recensé mercredi une incidence de 1508 cas pour 100.000 habitants en 14 jours, et de 915 sur 7 sept jours.\r\n\r\n', '2021-12-29 18:50:58'),
(2, 'L\'AMD Ryzen 6000 se dévoile au CES 2022', 'Le processeur Ryzen 6000 (Rembrandt) d\'AMD pour PC portable est le premier à prendre en charge la mémoire DDR5 et à supporter la fonction de sécurité Pluton de Microsoft.\r\n\r\nCette année, le CES 2022 a attribué le prix de l’innovation au processeur AMD Ryzen 6000 (Rembrandt). Officiellement présentée ce matin lors d’un évènement en ligne, cette puce, qui repose sur l’architecture Zen3+, se destine au marché des PC portables et revendique un gain de performances de 30% par rapport à la précédente génération Ryzen 5000 (basée sur Zen3). La fréquence maximale devrait atteindre la barre des 5 GHz en mode turbo. Gravé en 6 nm chez TSMC, le processeur Ryzen 6000 bénéficie également d’un circuit graphique maison RDNA2, de la mémoire DDR5, d’un traitement du signal audio basé sur l’IA et supporte la puce de sécurité Pluton de Microsoft. Le circuit graphique supporte le ray-tracing, ce qui est une première chez AMD.\r\n\r\n\r\nLe PCIe 4 arrive sur les PC nomades AMD\r\n\r\nLes précédentes séries de processeurs Ryzen 4000 et Ryzen 5000 d\'AMD ont largement surclassé les anciens processeurs 14nm de 9e et 10e génération d\'Intel, mais présentaient certaines lacunes comme une interface PCIe limitée. Bien qu\'AMD ait été le premier à utiliser PCIe 4.0 sur les ordinateurs de bureau, il n\'a pas déployé cette interface sur ses puces pour ordinateurs portables et a limité le processeur à seulement huit voies PCIe 3.0. Avec le Ryzen 6000, AMD double la connexion GPU du Ryzen 5000 avec le support de huit voies PCIe 4.0. Le fournisseur a également câblé 12 voies supplémentaires qui seront utilisées pour le stockage et d’autres connexions.', '2022-01-04 18:50:58'),
(3, 'Le projet Valhalla apporte des améliorations au modèle objet de Java', 'Les propositions d\'OpenJDK au sein du projet Valhalla introduiraient des objets de valeur, des objets primitifs, et unifieraient les primitives de base avec les objets, de sorte que toutes les valeurs Java seront des objets.\r\n\r\n\r\nLe Projet Valhalla d\'OpenJDK, qui explore les possibilités de fonctionnalités futures pour le langage Java et la JVM, continue sa progression avec une livraison par étapes des objets de valeur (Value Objects), des objets primitifs (Primitive Objects) et de l\'unification des primitives de base.\r\n\r\nL\'objectif général et ambitieux du Projet Valhalla est de combler le fossé entre les primitives et les objets. Dans un billet de blog publié en décembre 2021 et intitulé « The State of Valhalla », Brian Goetz, architecte du langage Java chez Oracle, mentionne trois capacités clés figurant dans les propositions d\'amélioration du JDK (JEP) attendues par la communauté OpenJDK :\r\n\r\n- Les objets de valeur : ils amélioreraient le modèle objet de Java avec des instances de classe n’ayant que des champs d\'instance finaux et pas d\'identité d\'objet.\r\n\r\n- Les objets primitifs : ils amélioreraient le modèle objet de Java avec des objets primitifs déclarés par l\'utilisateur.\r\n\r\n- L’unification des primitives et des objets de base.\r\n\r\n\r\nUn travail de longue haleine\r\n\r\nLancé en 2014, l’objectif du projet Valhalla est d\'apporter des types de données plus flexibles et plus plats aux langages basés sur la JVM afin de rétablir une coïncidence entre le modèle de programmation et les caractéristiques de performance des hardwares modernes. Les objectifs suivants ont été décrits dans une série de billets de blog publiés récemment, intitulés « The Road to Valhalla », « The Language Model » et « The State of Valhalla » :\r\n\r\n- Un plan générique impliquant des génériques universels et des génériques spécialisés.\r\n\r\n- L’unification des primitives et des objets de façon à pouvoir déclarer les types de genre primitif avec des classes tout en conservant les caractéristiques d\'exécution des primitives.\r\n\r\n- La migration de nombreuses classes basées sur des valeurs dans le JDK vers des classes de valeurs.\r\n\r\n- Des dispositions de données mieux adaptées aux performances du hardware actuel en fournissant aux développeurs Java un accès plus facile à des dispositions de mémoire dense et efficace en termes de cache sans compromettre l\'abstraction ou la sécurité des types.\r\n\r\nValhalla est parrainé par le HotSpot Group, un collectif composé de développeurs impliqués dans la conception, la mise en œuvre et la maintenance de la machine virtuelle HotSpot de Java. Le projet Valhalla a déjà livré ses mises en garde pour les classes basées sur la valeur, introduites dans Java 16 en mars 2021.', '2021-11-29 15:45:20'),
(4, 'Top Singles : Ninho toujours numéro un, Mariah Carey et Wham! boostés par Noël', 'Ninho finit l\'année au sommet du Top Singles avec sa chanson \"Jefe\". Mais les tubes de Noël envahissent le classement, dont ceux de Mariah Carey, Michael Bublé, Ariana Grande, Wham! ou encore Dean Martin. Tous les chiffres !\r\n\r\n\r\nMême à Noël, Ninho ne cède pas sa place ! Le rappeur cartonne toujours autant avec \"Jefe\", morceau-titre de son troisième album qui continue d\'affoler les compteurs en streaming. Numéro un du Top Singles pour la quatrième semaine consécutive, le morceau compte 4,8 millions de streams recensés entre le 24 et le 30 décembre. Une baisse de 22%. Un chiffre trop haut à atteindre pour la reine de Noël, alias Mariah Carey. La diva américaine se hisse tout de même sur la deuxième marche du classement cette semaine avec son tube absolu \"All I Want For Christmas Is You\". S\'il a battu de nouveaux records d\'écoutes dans le monde entier, il a été écouté plus de 3,2 millions de fois en sept jours en France pour rythmer la fin d\'année, soit une augmentation du volume d\'écoutes de 41% et 7 places de gagnées. Forcément, l\'autre titre phare de Ninho, \"VVS\", chute d\'un rang et clôt le podium avec 3,1 millions de streams (-15%).\r\n\r\n\r\nTop Singles de Noël\r\n\r\nPlus bas, Orelsan et une nouvelle fois Ninho comptent chacun 2,3 millions d\'écoutes. \"Jour meilleur\" (-6%) est quatrième, suivi de \"Vérité\" (-20%) sur la cinquième marche du classement. CKay remonte dans les classements avec son tube \"Love Nwantiti\", grimpant de deux places grâce à 2,2 millions de clics au compteur (-6%). Wham! gagne carrément 35 places d\'un coup et se retrouve donc septième cette semaine avec l\'autre grand tube de Noël, \"Last Christmas\", fredonné 2,1 millions de fois (+61%). Soit quelques dizaines de milliers d\'écoutes de plus que \"Bruxelles je t\'aime\" d\'Angèle (-4%), huitième soit son meilleur classement depuis sa sortie. Enfin, Naps ferme le top 10 avec ses deux tubes \"La kiffance\" et \"Best Life\" en duo avec Gims, chacun comptant 2 millions d\'écoutes supplémentaires. Dans le reste du Top Singles, la chanteuse phénomène GAYLE confirme son succès puisque le tube \"abcdefu\" est 21ème avec 1,7 million de streams (-3%), tandis que Tiakola signe la meilleure entrée de la semaine avec \"La clé\", 64ème et frôlant le million d\'écoutes.\r\n\r\nMais ce sont les chansons de Noël qui font la loi en ce dernier classement de l\'année 2021. Outre Mariah Carey et Wham!, ce sont Ed Sheeran et Elton John qui s\'en sortent le mieux puisque leur duo \"Merry Christmas\" est 26ème avec 1,5 million de streams (+51%), juste une place devant \"It\'s Beginning To Look A Lot Like Christmas\" de Michael Bublé (+100 places et 129%). Si Sia est 35ème avec \"Snowman\" (1,35 million de streams), Ariana Grande fait des étincelles avec \"Santa Tell Me\", 41ème avec 1,2 million d\'écoutes. Plus bas, de nombreux classiques hivernaux explosent dans les charts : \"Jingle Bell Rock\" de Bobby Helms (55ème), \"Sleigh Ride\" des Ronettes, \"Rockin\' Around The Christmas Tree\" de Brenda Lee, \"Let It Snow! Let It Snow! Let It Snow!\" de Dean Martin ou encore \"Mistletoe\" de Justin Bieber, tous classés entre la 59eme et la 62ème place avec 1 million d\'écoutes chacun.', '2022-01-03 15:45:47'),
(5, 'Bordeaux va demander le report de son match de Ligue 1 contre l\'OM', 'Les Girondins déplorent toujours 17 joueurs indisponibles pour la réception de Marseille, vendredi. Le club bordelais va officiellement demander un report à la Ligue.\r\n\r\n\r\nBordeaux va officiellement demander le report de son match contre Marseille, vendredi. Les Girondins déplorent toujours 17 joueurs indisponibles après la nouvelle série de tests effectuée ce mardi. Ce chiffre comprend les joueurs positifs mais aussi ceux qui doivent observer une période de sept jours de reprise individuelle post-isolement. Parmi les joueurs contaminés, un présente des symptômes.', '2022-01-04 15:45:57'),
(6, 'Mick Schumacher sera pilote de réserve de Ferrari en 2022', 'L\'Allemand Mick Schumacher, qui disputera la prochaine saison avec l\'écurie Haas, sera également l\'un des pilotes de réserve de Ferrari.\r\n\r\n\r\nMick Schumacher, le fils de Michael Schumacher, sera l\'un des pilotes de réserve de Ferrari, l\'année prochaine, en plus de disputer la saison au sein de l\'écurie Haas.\r\n\r\n« Il ne faut pas oublier qu\'il est déjà un pilote Ferrari : il fait partie de la Ferrari Driver Academy et, comme on le répète, cette académie existe pour identifier les futurs pilotes Ferrari », a expliqué Mattia Binotto, le Team Principal de la Scuderia.\r\n\r\nBinotto estime que Mick Schumacher, qui vient, à 22 ans, de disputer sa première saison de Formule 1, avec Haas, (19e et avant-dernier au classement des pilotes, sans aucun point inscrit) « s\'est bien débrouillé et a progressé, pas seulement en termes de régularité mais aussi de vitesse ».\r\n\r\nAlternance avec Antonio Giovinazzi\r\nLe jeune Allemand assumera le rôle de pilote de réserve (qui consiste à remplacer les titulaires s\'ils sont malades ou blessés) lors de 11 des 23 Grands Prix programmés l\'an prochain, en alternance avec l\'Italien Antonio Giovinazzi.\r\n\r\nLes baquets chez Ferrari ne devraient toutefois pas se libérer tout de suite. Le pilote monégasque Charles Leclerc est engagé jusqu\'à fin 2024. L\'Espagnol Carlos Sainz Jr, lui, a signé jusqu\'à fin 2022 mais « nous allons discuter pendant l\'hiver d\'une extension de contrat », a précisé Mattia Binotto.\r\n\r\n', '2021-12-22 15:46:29'),
(7, 'ONE PIECE : EIICHIRO ODA BRISE LES THÉORIES DES FANS AVEC CE NOUVEL INDICE SUR LE TRÉSOR FINAL', 'Il y a peu, nous vous proposions justement de vous intéresser aux 5 meilleures théories du moments sur One Piece. Aujourd\'hui, nous allons nous intéresser de plus près à une déclaration de Eiichiro Oda, qui nous donne un indice sur le trésor final qu\'est le One Piece. \r\n\r\n\r\nLES THÉORIES SUR LE ONE PIECE\r\nL\'un des plus grands mystères du manga One Piece concerne la nature même du trésor qu\'est le One Piece, qui attend sur l\'île de Laugh Tale, la destination finale de tout équipage de pirates. Les fans spéculent sur ce qu\'est le One Piece depuis la première publication du manga il y a 25 ans, et récemment, Eiichiro Oda a démenti une théorie majeure sur la nature de ce trésor.\r\n\r\nJusqu\'à aujourd\'hui, les seuls indices que nous avions en notre possession sur le sujet provenaient du chapitre 967 (dans lequel on voyait un flashback du voyage de Roger). Or, dans One Piece, des valeurs fortes telles que l\'amitié et le respect sont très importantes, ce qui a conduit de nombreux fans à penser que le trésor qu\'est le One Piece n\'a pas de valeur matérielle, mais qu\'il s\'agit d\'un message laissé par Joy Boy, puis par Roger, et qui correspond plus ou moins au cliché du \"trésor sans valeur\", dans lequel l\'expérience acquise est plus importante que la récompense elle-même. Mais il s\'agit d\'une théorie complètement débunkée par Eiichiro Oda lui-même.\r\n\r\n\r\nEIICHIRO ODA DONNE UN INDICE SUR LE TRÉSOR FINAL\r\n\r\nAu cours d\'une récente interview partagée et traduite par OROJAPAN sur Twitter, un compte qui cherche à mettre en lumière toutes les news concernant One Piece, Mayumi Tanaka (la doubleuse de Luffy dans l\'anime) a révélé des détails sur une conversation qu\'elle a eue récemment avec Eiichiro Oda.\r\n\r\nTanaka a précisé qu\'elle ne sait pas, pour le moment, comment l\'histoire se termine et a même exprimé l\'espoir de vivre jusqu\'au dernier épisode. Elle a aussi révélé qu\'elle pensait que le trésor qu\'est le One Piece était quelque chose lié à l\'amitié ou à des liens affectifs, mais Oda a démenti cela, et a établi une bonne fois pour toute que le trésor est bel et bien réel, et qu\'il est une chose physique.', '2022-01-03 15:47:18');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_foreign_key_newsid` (`NewsID`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
