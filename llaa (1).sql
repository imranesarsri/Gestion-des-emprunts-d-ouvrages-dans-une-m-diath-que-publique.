-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 08:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `llaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
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
-- Dumping data for table `borrowings`
--

INSERT INTO `borrowings` (`Borrowing_Code`, `Borrowing_Date`, `Borrowing_Return_Date`, `Item_Code`, `Nickname`, `Reservation_Code`, `valiid_return`) VALUES
(38, '2023-03-11 14:19:16', '2023-03-26 14:19:16', 1, 'zayd099', 2917, b'0'),
(39, '2023-03-11 14:19:18', '2023-03-26 14:19:18', 36, 'zayd099', 2915, b'1'),
(40, '2023-03-11 14:19:20', '2023-03-26 14:19:20', 45, 'zayd099', 2914, b'1'),
(41, '2023-03-20 00:27:24', '2023-04-04 00:27:24', 82, 'abdmawla', 2924, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_Code` int(11) NOT NULL,
  `Category_Name` varchar(50) DEFAULT NULL,
  `Category_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_Code`, `Category_Name`, `Category_Type`) VALUES
(1, 'Book', 'Number of pages'),
(2, 'Music', 'Duration'),
(3, 'Audio book', 'Duration'),
(4, 'Movie', 'Duration'),
(5, 'Comic', 'Number of pages'),
(8, 'cd', 'Duration');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
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
-- Table structure for table `item`
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
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_Code`, `Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Purchase_Date`, `Status`, `Category_Code`, `pageNumber`) VALUES
(1, 'LA FEMME MOUSTIQUE : TEXTE INTEGRAL', 'Ghislaine Herbera', 'Item_Images/wsgetimg (3).jpeg', 'New', '2022-01-10', '2022-01-10', 'Available', 3, '120min'),
(2, 'PANIQUE DANS LA FORET', 'Clotilde Perrin', 'Item_Images/1297509.jpg', 'Old', '2013-03-27', '2019-07-10', 'Available', 3, '220min'),
(3, 'PAX ET LE PETIT SOLDAT', 'Sara Pennypacker', 'Item_Images/1297513.jpg', 'New', '2020-10-14', '2021-08-19', 'Available', 3, '150min'),
(4, 'SOURICETTE VEUT UN AMOUREUX', 'François Vincent', 'Item_Images/1296908.jpg', 'New', '2016-09-15', '2021-09-10', 'Available', 3, '200min'),
(5, 'SAUTE-LA-PUCE', 'Benoit Debecker', 'Item_Images/wsgetimg.jpeg', 'New', '2015-09-09', '2021-03-18', 'Available', 3, '90min'),
(6, 'PREMIERES NEIGES', 'Nelson', 'Item_Images/wsgetimg (1).jpeg', 'New', '2022-05-06', '2022-03-30', 'Available', 3, '150min'),
(7, 'LA PYRAMIDE DES BESOINS HUMAINS', 'mohamed rida', 'Item_Images/A001765230.jpg', 'New', '2020-12-18', '2022-03-11', 'Available', 3, '120min'),
(8, 'LA PETITE DANSEUSE - EDGAR DEGAS', 'Geraldine Elschner', 'Item_Images/1102896.jpg', 'Old', '2017-10-19', '2022-07-07', 'Available', 3, '110min'),
(9, 'SALSA !', 'Edouard Manceau', 'Item_Images/9782375150788_thumb.jpg', 'New', '2021-10-06', '2022-06-10', 'Available', 3, '115min'),
(10, 'LE BRUIT DES NOMBRES', 'Jeanne Boyer', 'Item_Images/wsgetimg (2).jpeg', 'Broken', '2020-05-29', '2022-01-31', 'Unavailable', 3, '90min'),
(11, 'LES MITCHELL CONTRE LES MACHINES', 'Mike Rianda', 'Item_Images/V99999006506.jpg', 'New', '2020-03-04', '2021-07-09', 'Available', 4, '150min'),
(12, 'HAM ON RYE', 'Taormina Tyler', 'Item_Images/laptop-actuator-drive-wallpaper-preview.jpg', 'New', '2022-08-11', '2022-09-11', 'Available', 4, '200min'),
(13, 'JERK', 'Vienne Gisele', 'Item_Images/wsgetimg.jpeg', 'New', '2022-05-19', '2022-07-21', 'Available', 4, '95min'),
(14, 'GREAT FREEDOM', 'Meise Sebastian', 'Item_Images/download.jfif', 'Old', '2018-07-27', '2019-04-10', 'Available', 4, '75min'),
(15, 'THE INNOCENTS', 'Vogt Eskil', 'Item_Images/0000000274442.jpg', 'Broken', '2017-03-02', '2017-08-11', 'Unavailable', 4, '100min'),
(16, 'imrane', 'Alvarez Mesen', 'Item_Images/wsgetimg (2).jpeg', 'New', '2022-02-07', '2022-02-09', 'Available', 3, '120min'),
(17, 'LE PEUPLE LOUP', 'Moore Tomm', 'Item_Images/0000000271977.jpg', 'New', '2021-01-13', '2022-01-14', 'Available', 4, '100min'),
(18, 'SOUL', 'Docter Pete', 'Item_Images/V99999006516.jpg', 'New', '2019-07-25', '2020-01-21', 'Available', 4, '120min'),
(19, 'SOUS LE CIEL DE KOUTAISSI', 'Koberidze Aleksandre', 'Item_Images/V99999008299.jpg', 'Old', '2016-07-10', '2017-05-27', 'Available', 4, '130min'),
(20, 'MEME LES SOURIS VONT AU PARADIS', 'Bubenicek Jan', 'Item_Images/0000000273262.jpg', 'Used', '2014-09-04', '2015-08-29', 'Available', 4, '140min'),
(21, 'APRES LA CHUTE', 'Pierre-Henry Gomont', 'Item_Images/079bd8ff61271504db3d7dbfbe7fc46f2f4c08a87ab4fb7da7a36f02c4135780.jpg', 'New', '2022-01-25', '2022-01-26', 'Available', 5, '1300'),
(22, 'LA REPUBLIQUE DU CRANE', 'Vincent Brugeas', 'Item_Images/302d3ce65d4399b4abf8251d36fa0661d7623f60f8fa928a00ea7ab6d6ea538c.jpg', 'Old', '2022-08-11', '2022-12-06', 'Available', 5, '1110'),
(23, 'UN CONCOURS PLEIN D\'OBSTACLES !', 'Kristin Varner', 'Item_Images/794e63537953ef1486c97b8a60560ff7dc9d72e17e9d03ab83c9e587960b761c.jpg', 'Used', '2021-01-01', '2021-02-23', 'Available', 5, '1200'),
(24, 'HARRY MAKITO, MAGICIEN & SAUVEUR DE SORCIERES. 1', 'Shizumu Watanabe', 'Item_Images/e3eea37ac3f238ffe109a101fe198b0b6cb2605e31f1eae9ef3185e2cd933d07.jpg', 'Used', '2018-01-11', '2018-07-19', 'Available', 3, '1000'),
(26, 'HORIMIYA. 1', 'Hero', 'Item_Images/5fe82a6ebaaf82b781bbba1e191ee401c058da8f7c2b73301abdbfabe78075ce.jpg', 'Used', '2021-12-31', '2022-03-01', 'Available', 5, '1500'),
(28, 'JE SUIS TOUJOURS VIVANT', 'Roberto Saviano', 'Item_Images/4718f52129741fc999c051f1020d99502e12af471028007b47c75573df21d2cc.jpg', 'New', '2020-08-28', '2021-09-02', 'Available', 5, '3000'),
(29, 'LA LOUVE BOREALE', 'Nuria Tamarit', 'Item_Images/387c9f96d3ae60a8cf1bf2d7d66e8c50423b72eb1b333c30e071d0ad849a4aa7.jpg', 'Old', '2018-07-23', '2019-03-28', 'Available', 5, '1500'),
(30, 'LE PETIT FRERE', 'Jean-Louis Tripp', 'Item_Images/142e727314018b9d6fa322ffe2d49cb86db6c9dcdf6835f668b60780e5aade9a.jpg', 'New', '2017-03-01', '2017-06-15', 'Available', 5, '900'),
(31, 'LOVE EXCHANGE FAILURE', 'White Ward. Musicien', 'Item_Images/0634438580973_thumb.jpg', 'New', '2022-09-30', '2022-10-23', 'Available', 2, '120min'),
(33, 'THE GLEAM', 'Park Jiha', 'Item_Images/1228680.jpg', 'Old', '2018-07-25', '2019-01-24', 'Available', 2, '131min'),
(34, 'SHOALS', 'Palace', 'Item_Images/0602438712960_thumb.jpg', 'Old', '2017-06-23', '2017-09-16', 'Available', 2, '144min'),
(36, 'POMPEII', 'Cate Le Bon', 'Item_Images/0184923131529_thumb.jpg', 'New', '2022-03-25', '2022-06-15', 'Available', 2, '80min'),
(38, 'MANNUS', 'Casse Gueule', 'Item_Images/1234467.jpg', 'UsedUsed', '2019-07-07', '2020-08-29', 'Available', 2, '50min'),
(39, 'SONIC POEMS', 'Lewis OfMan', 'Item_Images/0602445293896_thumb.jpg', 'New', '2014-03-12', '2016-07-12', 'Available', 2, '70min'),
(41, 'LE LIVRE SANS IMAGES', 'B. J. Novak', 'Item_Images/2bef76287385920bb9770bb454d9cceef5571f9d8e6d45cf6c28bedcae8711f7.jpg', 'Old', '2022-03-25', '2022-03-26', 'Available', 1, '100'),
(42, 'MAYDALA EXPRESS', 'Davide Morosinotto', 'Item_Images/45f52e20447a3b81516de547e69bd91d025928f9b695f353b9b7c482075001db.jpg', 'New', '2020-09-15', '2021-02-03', 'Available', 1, '1000'),
(43, 'L\'ETE OU TOUT A FONDU : ROMAN', 'Tiffany McDaniel', 'Item_Images/c45078e0f10b727bf5360f5fa86673f3f88333fc71106104fd903f8b310a6a68.jpg', 'Old', '2018-06-07', '2019-03-20', 'Available', 1, '4000'),
(44, 'LA TREIZIEME HEURE : ROMAN', 'Emmanuelle Bayamack-Tam', 'Item_Images/b96af83e9db11509917c704f4064eb0d35f8d65c1fd0a88c8567593df3a95ebd.jpg', 'Used', '2019-03-09', '2019-05-30', 'Available', 1, '3000'),
(45, 'LA LIGNE DE NAGE : ROMAN', 'Julie Otsuka', 'Item_Images/f2f22494fb52e831e8be71dc2c5969dc761c789ec17af4c96edd08629f0a7d10.jpg', 'Broken', '2017-06-13', '2018-01-15', 'Unavailable', 1, '5000'),
(46, 'LES COEURS ENDURCIS', 'Martyna Bunda', 'Item_Images/4f380300adf3afe2f56aec9a3cebaf2ba143eba512050d83e699fa21f479063d.jpg', 'Old', '2015-08-28', '2015-09-02', 'Available', 1, '5500'),
(47, 'UNE SURPRISE POUR AMOS MCGEE', 'Philip Christian', 'Item_Images/079bd8ff61271504db3d7dbfbe7fc46f2f4c08a87ab4fb7da7a36f02c4135780.jpg', 'Old', '2022-01-11', '2022-02-09', 'Available', 1, '6500'),
(48, 'LEUR SANG COULE DANS TES VEINES', 'Rachel Burge', 'Item_Images/64ab4232595d9e4d20a4bb76d2508100290b8006af7cdd138e91d7a38f2a330a.jpg', 'Broken', '2019-06-10', '2020-02-04', 'Unavailable', 1, '1200'),
(50, 'L\'ECOLE N\'EST PAS FAITE POUR LES PAUVRES ', 'Jean-Paul Delahaye', 'Item_Images/21711074dc6316af8f3428a1e0e5348da54f8f86c708e0f3af8279a20ed0f121.jpg', 'Used', '2019-03-01', '2019-04-01', 'Reserved', 1, '3000'),
(79, 'ktab chmns we', 'mrwana frhata', 'Item_Images/avatar-the-way-of-water-poster-960x1200.jpg', 'Broken', '2023-03-19', '2023-03-03', 'Unavailable', 2, '100min'),
(80, 'aaaaaaaaaa', 'aaaaaaaaaaaa', 'Item_Images/imgheader.jpg', 'New', '2211-12-12', '2121-02-12', 'Available', 1, '120'),
(81, 'ab jdid', 'ahmad ahmad', 'Item_Images/download.jfif', 'Old', '2020-03-12', '2023-03-02', 'Reserved', 8, '60'),
(82, 'cd ', 'the bist cd', 'Item_Images/cd.png', 'Used', '2023-03-01', '2023-02-28', 'Reserved', 8, '10'),
(83, '', '', 'Item_Images/gift.png', NULL, '0000-00-00', '0000-00-00', 'Available', 3, ''),
(84, 'sd', 'dw', 'Item_Images/user1.jpg', 'Used', '2023-03-15', '2023-03-27', 'Available', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
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
  `Creation_Date` date DEFAULT NULL,
  `image_profil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Nickname`, `Full_Name`, `Password`, `Admin`, `Address`, `Email`, `Phone`, `CIN`, `Occupation`, `Penalty_Count`, `Birth_Date`, `Creation_Date`, `image_profil`) VALUES
('abdmawla', 'rabd mawla', 'd15e61ef5c5e1c78a75980590188a275', 0, 'hay badriwn', 'abdmawla@gmail.com', '0716151111', 'k82240', 'Etudiant ', 0, '1997-12-12', '2023-03-19', 'Item_Images/user3.jpg'),
('alilousaad1975', 'Alilou Saad', '8755418a587841fe5ea7b3cd305eb1fc', 1, '27, av. Hassan II', 'alilou.saad@gmail.com', '+212695621537', 'K143659', 'Employee', 0, '1975-04-22', '2015-06-09', 'Item_Images/img_profil.png'),
('AMM22', 'ieiwgi', '9addf3117bb76a319f788d6d3db9d6d8', 0, 'iggigwurgig', 'FFF@gmail.com', '0532323232', 'K1214', 'Employee', 0, '2023-03-09', '2023-03-14', 'Item_Images/img_profil.png'),
('aymane12', 'ayman', '62a223c338b09848dc622e2b92ba910b', 0, 'hay alad sidi kasm', 'ayman@gmail.com', '0717171771', 'k129219', 'Etudiant', 3, '2011-09-07', '2023-03-11', 'Item_Images/img_profil.png'),
('battol', 'batol', '70bce2a2f28fc0275039faa186f5a59d', 0, 'casablonca ', 'batolbatol@gmail.com', '0777777777', 'k129199', 'Etudiant', 0, '2000-03-12', '2023-03-17', 'Item_Images/img_profil.png'),
('bkhitamine2000', 'Bkhit Amine', '018bf5b92964a965c186d3169dc48d12', 0, '20, rue Bani Marine', 'bkhit.amine@gmail.com', '+212684021838', 'CE456918', 'Etudiant', 1, '2000-01-04', '2022-07-09', 'Item_Images/img_profil.png'),
('daifaneyasmine2002', 'Daifane Yasmine', 'fff78b1cc652372b6695b06311049f8c', 0, '63, Place Rahba Lakdima', 'dafaine.yasmine@gmail.com', '+212696395569', 'R54712', 'Housewife', 0, '2002-05-15', '2021-08-23', 'Item_Images/img_profil.png'),
('elghaliikram2001', 'Elghali Ikram', '25da82168123e978a1ae0dff02f65028', 0, '6, rue Moulay Slimane', 'elghali.ikram@gmail.com', '+212676225556', 'L87123', 'Etudiant', 0, '2001-08-25', '2021-09-09', 'Item_Images/img_profil.png'),
('ettamriilyasse1997', 'Ettamri Ilyasse', '5133661b7a0be48e2510f945ead87cf4', 0, '1, av Hassan II, hay ElFarah Karia', 'ettamri.ilyasse@gmail.com', '+212672322387', 'B345019', 'Another', 0, '1997-01-31', '2022-01-20', 'Item_Images/img_profil.png'),
('farah', 'frah ', '56c290226ce17b8e7304f858eb424035', 0, 'tanger morocoo', 'farah@gmail.com', '0719191919', 'k12345', 'Housewife', 0, '2010-12-12', '2023-03-10', 'Item_Images/img_profil.png'),
('fatima01', 'fatima', '21403600114d0338bf8f6f2a31f3d33d', 0, 'hay wkla dwsaas', 'fatima@gmsil.com', '0712712712', 'k223322', 'Employee', 0, '1211-12-12', '2023-03-13', 'Item_Images/img_profil.png'),
('hamid99', 'hamid ', '4d58ecc88af57dbe966b1ffc92839348', 0, 'rsriniwewe', 'hamid@gmail.com', '0711221211', 'k12212', 'Etudiant', 0, '1221-02-12', '2023-03-17', 'Item_Images/img_profil.png'),
('imrane112233imrane', 'imrane sarsri', '84227209050e3d6797236dcd2846845a', 1, 'hay bir gdidi gznaya', 'sarsri.imrane.solicode@gmail.com', '0626156115', 'k405860', 'Etudiant', 0, '2004-04-01', '2023-03-06', 'Item_Images/img_profil.png'),
('imranee', 'imrane imrane', 'a666074c034683653abfcb2f9a0d20c2', 0, 'hay bir imrane', 'khald@gmail.com', '0727272723', 'k129123', 'Housewife', 0, '2023-03-05', '2023-03-17', 'Item_Images/user4.jpg'),
('jalil777', 'imran sa', '25675c9b77534cb32961128516fe9d7f', 0, 'tanger marocan', 'lralami1@gmail.com', '0616161611', 'k37373', 'Etudiant', 0, '1999-03-12', '2023-03-18', 'Item_Images/user1.jpg'),
('kawtar', 'kawtar ', '358ca4be4a1b998e7eb907679de3eea0', 0, 'mojamar firdaws', 'lralami1@gmail.com', '0516171816', 'k121291', 'Housewife', 0, '1993-03-12', '2023-03-18', 'Item_Images/user3.jpg'),
('lamchattabamine2003', 'Lamchattab Amine', 'd20703fa5e07b347d3df89cdd57a4858', 0, 'bd. Mohamed V, Imm. Al Ouafa', 'lamchattab.amine@gmail.com', '+212698129013', 'G341203', 'Another', 2, '2003-07-07', '2022-06-02', 'Item_Images/img_profil.png'),
('latifa', 'latifa', 'f37cba4701496097435bc4842f62002a', 0, 'hay chok', 'latifa@gmail.com', '0717171711', 'k12122', 'Housewife', 0, '2000-03-10', '2023-03-18', 'Item_Images/user2.jpg'),
('mohamed01', 'mohamed reda', '1e8b865deca82befe285270f99c5b664', 0, 'hay bir jdid gznaya', 'mohamed.reda@gmail.com', '0771177111', 'k121212', 'Etudiant', 0, '2018-05-16', '2023-03-09', 'Item_Images/img_profil.png'),
('saad', 'saad alilo', 'c3d8ee32450d82e926ce9409674a6744', 0, 'hay bir chifa', 'saad123@gmail.ma', '0525525255', 'k12121', 'Etudiant', 0, '2023-03-02', '2023-03-14', 'Item_Images/img_profil.png'),
('salikbassam2001', 'Bassam Salik', 'ff6c13a527533e7fe4d06d308d2e392c', 0, '365, bd Mohammed V', 'bassam.salik@gmail.com', '+212675975761', 'K345712', 'Another', 0, '2001-06-27', '2022-03-08', 'Item_Images/img_profil.png'),
('sarsriimran2004', 'Sarsri Imran', '8b1bf0833ad39f8e683b31cf97b33263', 0, '13, av. de la liberté, v.n.', 'sarsri.imran@gmail.com', '+212674586990', 'K33456', 'Etudiant', 0, '2004-04-01', '2022-02-26', 'Item_Images/img_profil.png'),
('tamimsoufian2003', 'Tamim Soufian', '830027a3167662727e072ed060a0a49e', 0, '24, rue Ali Abderrazak ', 'tamim.Soufian@gmail.com', '+212683842321', 'KB89645', 'Etudiant', 0, '2003-10-27', '2022-08-24', 'Item_Images/img_profil.png'),
('tebbasaad2003', 'Tebba Saad', '36554aee94dcd773f70fda74d36e0bdb', 0, 'Av. Mohamed V, 83350', 'tebba.saad@gmail.com', '+212674065353', 'K345716', 'Another', 0, '2003-02-06', '2022-06-07', 'Item_Images/img_profil.png'),
('yahya', 'saswweoi', '25d55ad283aa400af464c76d713c07ad', 0, 'qtiwitwqw@qwq.com', 'yahya@gmail.com', '0626262621', 'k121211', 'Etudiant', 0, '1212-12-12', '2023-03-10', 'Item_Images/img_profil.png'),
('zayd099', 'zayd lmchtab', '6c647c074d5a99edc4bbff85782264bf', 0, 'hay wlad flga ', 'zayd99@gmail.com', '0727272727', 'k92111', 'Etudiant', 2, '2023-02-28', '2023-03-11', 'Item_Images/img_profil.png'),
('zayd99', 'zayd hamadan', '9c6f5d080395687244a24ed8fd25b8b6', 0, 'hay chok tanger', 'zayd@gmail.com', '0727272727', 'k89898', 'Another', 0, '2019-03-12', '2023-03-11', 'Item_Images/img_profil.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
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
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Reservation_Code`, `Reservation_Date`, `Reservation_Expiration_Date`, `Item_Code`, `Nickname`, `valid_admin`) VALUES
(2901, '2023-03-10 20:54:01', '2023-03-11 20:54:01', 26, 'farah', b'1'),
(2902, '2023-03-10 21:02:40', '2023-03-11 21:02:40', 19, 'farah', b'1'),
(2911, '2023-03-11 13:01:08', '2023-03-12 13:01:08', 22, 'zayd099', b'1'),
(2914, '2023-03-11 14:15:05', '2023-03-12 14:15:05', 45, 'zayd099', b'1'),
(2915, '2023-03-11 14:15:12', '2023-03-12 14:15:12', 36, 'zayd099', b'1'),
(2917, '2023-03-11 14:15:47', '2023-03-12 14:15:47', 1, 'zayd099', b'1'),
(2921, '2023-03-19 22:47:37', '2023-03-20 22:47:37', 50, 'abdmawla', b'0'),
(2922, '2023-03-19 22:51:16', '2023-03-20 22:51:16', 81, 'abdmawla', b'0'),
(2924, '2023-03-19 23:56:27', '2023-03-20 23:56:27', 82, 'abdmawla', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `Type_Code` int(11) NOT NULL,
  `Type_Name` varchar(50) DEFAULT NULL,
  `Type_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`Borrowing_Code`),
  ADD UNIQUE KEY `Reservation_Code` (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Code`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`Collection_Code`),
  ADD KEY `Type_Code` (`Type_Code`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_Code`),
  ADD KEY `Category_Code` (`Category_Code`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Nickname`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`Type_Code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `Borrowing_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2925;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`),
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`),
  ADD CONSTRAINT `borrowings_ibfk_3` FOREIGN KEY (`Reservation_Code`) REFERENCES `reservation` (`Reservation_Code`);

--
-- Constraints for table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`Type_Code`) REFERENCES `types` (`Type_Code`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Category_Code`) REFERENCES `category` (`Category_Code`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
