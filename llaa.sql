-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 mars 2023 à 17:22
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `llaa`
--

-- --------------------------------------------------------

--
-- Structure de la table `borrowings`
--

CREATE TABLE `borrowings` (
  `Borrowing_Code` int(11) NOT NULL,
  `Borrowing_Date` datetime DEFAULT NULL,
  `Borrowing_Return_Date` datetime DEFAULT NULL,
  `Item_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `Reservation_Code` int(11) NOT NULL,
  `valiid_return` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `borrowings`
--

INSERT INTO `borrowings` (`Borrowing_Code`, `Borrowing_Date`, `Borrowing_Return_Date`, `Item_Code`, `Nickname`, `Reservation_Code`, `valiid_return`) VALUES
(38, '2023-03-11 14:19:16', '2023-03-26 14:19:16', 1, 'zayd099', 2917, b'1'),
(39, '2023-03-11 14:19:18', '2023-03-26 14:19:18', 36, 'zayd099', 2915, b'1'),
(40, '2023-03-11 14:19:20', '2023-03-26 14:19:20', 45, 'zayd099', 2914, b'1');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `Category_Code` int(11) NOT NULL,
  `Category_Name` varchar(50) DEFAULT NULL,
  `Category_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`Category_Code`, `Category_Name`, `Category_Type`) VALUES
(1, 'Book', 'Number of pages'),
(2, 'Music', 'Duration'),
(3, 'Audio book', 'Duration'),
(4, 'Movie', 'Duration'),
(5, 'Comic', 'Number of pages'),
(8, 'cd', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE `collection` (
  `Collection_Code` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author_Name` varchar(100) DEFAULT NULL,
  `Cover_Image` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Edition_Date` date DEFAULT NULL,
  `Buy_Date` date DEFAULT NULL,
  `Status` varchar(150) DEFAULT NULL,
  `Type_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `Item_Code` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author_Name` varchar(100) DEFAULT NULL,
  `Cover_Image` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Edition_Date` date DEFAULT NULL,
  `Purchase_Date` date DEFAULT NULL,
  `Status` varchar(150) DEFAULT NULL,
  `Category_Code` int(11) NOT NULL,
  `pageNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`Item_Code`, `Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Purchase_Date`, `Status`, `Category_Code`, `pageNumber`) VALUES
(1, 'LA FEMME MOUSTIQUE : TEXTE INTEGRAL', 'Ghislaine Herbera', 'Item_Images/wsgetimg (3).jpeg', 'New', '2022-01-10', '2022-01-10', 'Reserved', 3, '120min'),
(2, 'PANIQUE DANS LA FORET', 'Clotilde Perrin', 'Item_Images/1297509.jpg', 'Used', '2013-03-27', '2019-07-10', 'Borrowed', 3, '220min'),
(3, 'PAX ET LE PETIT SOLDAT', 'Sara Pennypacker', 'Item_Images/1297513.jpg', 'New', '2020-10-14', '2021-08-19', 'Reserved', 3, '150min'),
(4, 'SOURICETTE VEUT UN AMOUREUX', 'François Vincent', 'Item_Images/1296908.jpg', 'Old', '2016-09-15', '2021-09-10', 'Available', 3, '200min'),
(5, 'SAUTE-LA-PUCE', 'Benoit Debecker', 'Item_Images/wsgetimg.jpeg', 'Broken', '2015-09-09', '2021-03-18', 'Unavailable', 3, '90min'),
(6, 'PREMIERES NEIGES', 'Nelson', 'Item_Images/wsgetimg (1).jpeg', 'New', '2022-05-06', '2022-03-30', 'Borrowed', 3, '150min'),
(7, 'LA PYRAMIDE DES BESOINS HUMAINS', 'mohamed rida', 'Item_Images/A001765230.jpg', 'New', '2020-12-18', '2022-03-11', 'Available', 3, '120min'),
(8, 'LA PETITE DANSEUSE - EDGAR DEGAS', 'Geraldine Elschner', 'Item_Images/1102896.jpg', 'Used', '2017-10-19', '2022-07-07', 'Reserved', 3, '110min'),
(9, 'SALSA !', 'Edouard Manceau', 'Item_Images/9782375150788_thumb.jpg', 'Old', '2021-10-06', '2022-06-10', 'Borrowed', 3, '115min'),
(10, 'LE BRUIT DES NOMBRES', 'Jeanne Boyer', 'Item_Images/wsgetimg (2).jpeg', 'Broken', '2020-05-29', '2022-01-31', 'Unavailable', 3, '90min'),
(11, 'LES MITCHELL CONTRE LES MACHINES', 'Mike Rianda', 'Item_Images/V99999006506.jpg', 'New', '2020-03-04', '2021-07-09', 'Available', 4, '150min'),
(12, 'HAM ON RYE', 'Taormina Tyler', 'Item_Images/laptop-actuator-drive-wallpaper-preview.jpg', 'New', '2022-08-11', '2022-09-11', 'Reserved', 4, '200min'),
(13, 'JERK', 'Vienne Gisele', 'Item_Images/wsgetimg.jpeg', 'Used', '2022-05-19', '2022-07-21', 'Borrowed', 4, '95min'),
(14, 'GREAT FREEDOM', 'Meise Sebastian', 'Item_Images/download.jfif', 'Old', '2018-07-27', '2019-04-10', 'Reserved', 4, '75min'),
(15, 'THE INNOCENTS', 'Vogt Eskil', 'Item_Images/0000000274442.jpg', 'Broken', '2017-03-02', '2017-08-11', 'Unavailable', 4, '100min'),
(16, 'imrane', 'Alvarez Mesen', 'Item_Images/wsgetimg (2).jpeg', 'New', '2022-02-07', '2022-02-09', 'Unavailable', 3, '120min'),
(17, 'LE PEUPLE LOUP', 'Moore Tomm', 'Item_Images/0000000271977.jpg', 'New', '2021-01-13', '2022-01-14', 'Reserved', 4, '100min'),
(18, 'SOUL', 'Docter Pete', 'Item_Images/V99999006516.jpg', 'Used', '2019-07-25', '2020-01-21', 'Borrowed', 4, '120min'),
(19, 'SOUS LE CIEL DE KOUTAISSI', 'Koberidze Aleksandre', 'Item_Images/V99999008299.jpg', 'Old', '2016-07-10', '2017-05-27', 'Reserved', 4, '130min'),
(20, 'MEME LES SOURIS VONT AU PARADIS', 'Bubenicek Jan', 'Item_Images/0000000273262.jpg', 'Broken', '2014-09-04', '2015-08-29', 'Unavailable', 4, '140min'),
(21, 'APRES LA CHUTE', 'Pierre-Henry Gomont', 'Item_Images/079bd8ff61271504db3d7dbfbe7fc46f2f4c08a87ab4fb7da7a36f02c4135780.jpg', 'New', '2022-01-25', '2022-01-26', 'Borrowed', 5, '1300'),
(22, 'LA REPUBLIQUE DU CRANE', 'Vincent Brugeas', 'Item_Images/302d3ce65d4399b4abf8251d36fa0661d7623f60f8fa928a00ea7ab6d6ea538c.jpg', 'New', '2022-08-11', '2022-12-06', 'Reserved', 5, '1110'),
(23, 'UN CONCOURS PLEIN D\'OBSTACLES !', 'Kristin Varner', 'Item_Images/794e63537953ef1486c97b8a60560ff7dc9d72e17e9d03ab83c9e587960b761c.jpg', 'Used', '2021-01-01', '2021-02-23', 'Reserved', 5, '1200'),
(24, 'HARRY MAKITO, MAGICIEN & SAUVEUR DE SORCIERES. 1', 'Shizumu Watanabe', 'Item_Images/e3eea37ac3f238ffe109a101fe198b0b6cb2605e31f1eae9ef3185e2cd933d07.jpg', 'Broken', '2018-01-11', '2018-07-19', 'Reserved', 3, '1000'),
(26, 'HORIMIYA. 1', 'Hero', 'Item_Images/5fe82a6ebaaf82b781bbba1e191ee401c058da8f7c2b73301abdbfabe78075ce.jpg', 'New\n', '2021-12-31', '2022-03-01', 'Reserved', 5, '1500'),
(28, 'JE SUIS TOUJOURS VIVANT', 'Roberto Saviano', 'Item_Images/4718f52129741fc999c051f1020d99502e12af471028007b47c75573df21d2cc.jpg', 'Used', '2020-08-28', '2021-09-02', 'Borrowed', 5, '3000'),
(29, 'LA LOUVE BOREALE', 'Nuria Tamarit', 'Item_Images/387c9f96d3ae60a8cf1bf2d7d66e8c50423b72eb1b333c30e071d0ad849a4aa7.jpg', 'Old', '2018-07-23', '2019-03-28', 'Reserved', 5, '1500'),
(30, 'LE PETIT FRERE', 'Jean-Louis Tripp', 'Item_Images/142e727314018b9d6fa322ffe2d49cb86db6c9dcdf6835f668b60780e5aade9a.jpg', 'Broken', '2017-03-01', '2017-06-15', 'Unavailable', 5, '900'),
(31, 'LOVE EXCHANGE FAILURE', 'White Ward. Musicien', 'Item_Images/0634438580973_thumb.jpg', 'New', '2022-09-30', '2022-10-23', 'Available', 2, '120min'),
(33, 'THE GLEAM', 'Park Jiha', 'Item_Images/1228680.jpg', 'Used', '2018-07-25', '2019-01-24', 'Borrowed', 2, '131min'),
(34, 'SHOALS', 'Palace', 'Item_Images/0602438712960_thumb.jpg', 'Old', '2017-06-23', '2017-09-16', 'Borrowed', 2, '144min'),
(36, 'POMPEII', 'Cate Le Bon', 'Item_Images/0184923131529_thumb.jpg', 'New', '2022-03-25', '2022-06-15', 'Reserved', 2, '80min'),
(38, 'MANNUS', 'Casse Gueule', 'Item_Images/1234467.jpg', 'Used', '2019-07-07', '2020-08-29', 'Borrowed', 2, '50min'),
(39, 'SONIC POEMS', 'Lewis OfMan', 'Item_Images/0602445293896_thumb.jpg', 'Old', '2014-03-12', '2016-07-12', 'Borrowed', 2, '70min'),
(41, 'LE LIVRE SANS IMAGES', 'B. J. Novak', 'Item_Images/2bef76287385920bb9770bb454d9cceef5571f9d8e6d45cf6c28bedcae8711f7.jpg', 'New', '2022-03-25', '2022-03-26', 'Borrowed', 1, '100'),
(42, 'MAYDALA EXPRESS', 'Davide Morosinotto', 'Item_Images/45f52e20447a3b81516de547e69bd91d025928f9b695f353b9b7c482075001db.jpg', 'New', '2020-09-15', '2021-02-03', 'Reserved', 1, '1000'),
(43, 'L\'ETE OU TOUT A FONDU : ROMAN', 'Tiffany McDaniel', 'Item_Images/c45078e0f10b727bf5360f5fa86673f3f88333fc71106104fd903f8b310a6a68.jpg', 'Used', '2018-06-07', '2019-03-20', 'Available', 1, '4000'),
(44, 'LA TREIZIEME HEURE : ROMAN', 'Emmanuelle Bayamack-Tam', 'Item_Images/b96af83e9db11509917c704f4064eb0d35f8d65c1fd0a88c8567593df3a95ebd.jpg', 'Used', '2019-03-09', '2019-05-30', 'Reserved', 1, '3000'),
(45, 'LA LIGNE DE NAGE : ROMAN', 'Julie Otsuka', 'Item_Images/f2f22494fb52e831e8be71dc2c5969dc761c789ec17af4c96edd08629f0a7d10.jpg', 'Old', '2017-06-13', '2018-01-15', 'Reserved', 1, '5000'),
(46, 'LES COEURS ENDURCIS', 'Martyna Bunda', 'Item_Images/4f380300adf3afe2f56aec9a3cebaf2ba143eba512050d83e699fa21f479063d.jpg', 'Broken', '2015-08-28', '2015-09-02', 'Unavailable', 1, '5500'),
(47, 'UNE SURPRISE POUR AMOS MCGEE', 'Philip Christian', 'Item_Images/079bd8ff61271504db3d7dbfbe7fc46f2f4c08a87ab4fb7da7a36f02c4135780.jpg', 'New', '2022-01-11', '2022-02-09', 'Reserved', 1, '6500'),
(48, 'LEUR SANG COULE DANS TES VEINES', 'Rachel Burge', 'Item_Images/64ab4232595d9e4d20a4bb76d2508100290b8006af7cdd138e91d7a38f2a330a.jpg', 'New', '2019-06-10', '2020-02-04', 'Available', 1, '1200'),
(50, 'L\'ECOLE N\'EST PAS FAITE POUR LES PAUVRES ', 'Jean-Paul Delahaye', 'Item_Images/21711074dc6316af8f3428a1e0e5348da54f8f86c708e0f3af8279a20ed0f121.jpg', 'Old', '2019-03-01', '2019-04-01', 'Borrowed', 1, '3000'),
(79, 'ktab chmns we', 'mrwana frhata', 'Item_Images/avatar-the-way-of-water-poster-960x1200.jpg', 'New', '2023-03-19', '2023-03-03', 'Unavailable', 2, '100min'),
(80, 'aaaaaaaaaa', 'aaaaaaaaaaaa', 'Item_Images/imgheader.jpg', 'Old', '2211-12-12', '2121-02-12', 'Reserved', 1, '120'),
(81, 'ahmad ', 'ahmad ahmad', 'Item_Images/4f380300adf3afe2f56aec9a3cebaf2ba143eba512050d83e699fa21f479063d.jpg', 'Used', '2020-03-12', '2023-03-02', 'Unavailable', 8, '60'),
(82, 'cd ', 'the bist cd', 'Item_Images/cd.png', 'Used', '2023-03-01', '2023-02-28', 'Reserved', 8, '10');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `Nickname` varchar(150) NOT NULL,
  `Full_Name` varchar(150) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT 0,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `CIN` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Penalty_Count` int(11) DEFAULT 0,
  `Birth_Date` date DEFAULT NULL,
  `Creation_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`Nickname`, `Full_Name`, `Password`, `Admin`, `Address`, `Email`, `Phone`, `CIN`, `Occupation`, `Penalty_Count`, `Birth_Date`, `Creation_Date`) VALUES
('alilousaad1975', 'Alilou Saad', '8755418a587841fe5ea7b3cd305eb1fc', 1, '27, av. Hassan II', 'alilou.saad@gmail.com', '+212695621537', 'K143659', 'Responsable', 0, '1975-04-22', '2015-06-09'),
('aymane12', 'ayman', '62a223c338b09848dc622e2b92ba910b', 0, 'hay alad sidi kasm', 'ayman@gmail.com', '0717171771', 'k129219', 'Etudiant ', 3, '2011-09-07', '2023-03-11'),
('bkhitamine2000', 'Bkhit Amine', '018bf5b92964a965c186d3169dc48d12', 0, '20, rue Bani Marine', 'bkhit.amine@gmail.com', '+212684021838', 'CE456918', 'Etudiant', 1, '2000-01-04', '2022-07-09'),
('daifaneyasmine2002', 'Daifane Yasmine', 'fff78b1cc652372b6695b06311049f8c', 0, '63, Place Rahba Lakdima', 'dafaine.yasmine@gmail.com', '+212696395569', 'BR54712', 'Salariee', 0, '2002-05-15', '2021-08-23'),
('elghaliikram2001', 'Elghali Ikram', '25da82168123e978a1ae0dff02f65028', 0, '6, rue Moulay Slimane', 'elghali.ikram@gmail.com', '+212676225556', 'BL87123', 'Etudiante', 0, '2001-08-25', '2021-09-09'),
('ettamriilyasse1997', 'Ettamri Ilyasse', '5133661b7a0be48e2510f945ead87cf4', 0, '1, av Hassan II, hay ElFarah Karia', 'ettamri.ilyasse@gmail.com', '+212672322387', 'BE345019', 'Salarié', 0, '1997-01-31', '2022-01-20'),
('farah', 'frah ', '56c290226ce17b8e7304f858eb424035', 0, 'tanger morocoo', 'farah@gmail.com', '0719191919', 'k12345', 'Etudiant ', 0, '2010-12-12', '2023-03-10'),
('imrane112233imrane', 'imrane sarsri', '84227209050e3d6797236dcd2846845a', 1, 'hay bir gdidi gznaya', 'sarsri.imrane.solicode@gmail.com', '0626156115', 'k405860', 'Etudiant ', 0, '2004-04-01', '2023-03-06'),
('lamchattabamine2003', 'Lamchattab Amine', 'd20703fa5e07b347d3df89cdd57a4858', 0, 'bd. Mohamed V, Imm. Al Ouafa', 'lamchattab.amine@gmail.com', '+212698129013', 'FG341203', 'Entrepreneur', 2, '2003-07-07', '2022-06-02'),
('mohamed01', 'mohamed reda', '1e8b865deca82befe285270f99c5b664', 0, 'hay bir jdid gznaya', 'mohamed.reda@gmail.com', '0771177111', 'k121212', 'Etudiant ', 0, '2018-05-16', '2023-03-09'),
('salikbassam2001', 'Bassam Salik', 'ff6c13a527533e7fe4d06d308d2e392c', 0, '365, bd Mohammed V', 'bassam.salik@gmail.com', '+212675975761', 'KB345712', 'Etudiant', 0, '2001-06-27', '2022-03-08'),
('sarsriimran2004', 'Sarsri Imran', '8b1bf0833ad39f8e683b31cf97b33263', 0, '13, av. de la liberté, v.n.', 'sarsri.imran@gmail.com', '+212674586990', 'KB33456', 'Etudiant', 0, '2004-04-01', '2022-02-26'),
('tamimsoufian2003', 'Tamim Soufian', '830027a3167662727e072ed060a0a49e', 0, '24, rue Ali Abderrazak ', 'tamim.Soufian@gmail.com', '+212683842321', 'KB89645', 'Etudiant', 0, '2003-10-27', '2022-08-24'),
('tebbasaad2003', 'Tebba Saad', '36554aee94dcd773f70fda74d36e0bdb', 0, 'Av. Mohamed V, 83350', 'tebba.saad@gmail.com', '+212674065353', 'KB345716', 'Stagiaire', 0, '2003-02-06', '2022-06-07'),
('yahya', 'saswweoi', '25d55ad283aa400af464c76d713c07ad', 0, 'qtiwitwqw@qwq.com', 'yahya@gmail.com', '0626262621', 'k121211', 'Etudiant ', 0, '1212-12-12', '2023-03-10'),
('zayd099', 'zayd lmchtab', '6c647c074d5a99edc4bbff85782264bf', 0, 'hay wlad flga ', 'zayd99@gmail.com', '0727272727', 'k92111', 'Etudiant ', 2, '2023-02-28', '2023-03-11'),
('zayd99', 'zayd hamadan', '9c6f5d080395687244a24ed8fd25b8b6', 0, 'hay chok tanger', 'zayd@gmail.com', '0727272727', 'k89898', 'Entrepreneur', 0, '2019-03-12', '2023-03-11');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_Code` int(11) NOT NULL,
  `Reservation_Date` datetime DEFAULT NULL,
  `Reservation_Expiration_Date` datetime DEFAULT NULL,
  `Item_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `valid_admin` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Reservation_Code`, `Reservation_Date`, `Reservation_Expiration_Date`, `Item_Code`, `Nickname`, `valid_admin`) VALUES
(2901, '2023-03-10 20:54:01', '2023-03-11 20:54:01', 26, 'farah', b'1'),
(2902, '2023-03-10 21:02:40', '2023-03-11 21:02:40', 19, 'farah', b'1'),
(2911, '2023-03-11 13:01:08', '2023-03-12 13:01:08', 22, 'zayd099', b'1'),
(2914, '2023-03-11 14:15:05', '2023-03-12 14:15:05', 45, 'zayd099', b'1'),
(2915, '2023-03-11 14:15:12', '2023-03-12 14:15:12', 36, 'zayd099', b'1'),
(2917, '2023-03-11 14:15:47', '2023-03-12 14:15:47', 1, 'zayd099', b'1');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `Type_Code` int(11) NOT NULL,
  `Type_Name` varchar(50) DEFAULT NULL,
  `Type_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`Borrowing_Code`),
  ADD UNIQUE KEY `Reservation_Code` (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Code`);

--
-- Index pour la table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`Collection_Code`),
  ADD KEY `Type_Code` (`Type_Code`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_Code`),
  ADD KEY `Category_Code` (`Category_Code`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Nickname`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`Type_Code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `Borrowing_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `Item_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2918;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`),
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`),
  ADD CONSTRAINT `borrowings_ibfk_3` FOREIGN KEY (`Reservation_Code`) REFERENCES `reservation` (`Reservation_Code`);

--
-- Contraintes pour la table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`Type_Code`) REFERENCES `types` (`Type_Code`);

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Category_Code`) REFERENCES `category` (`Category_Code`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
