-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 05:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eternal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `Id` int(11) NOT NULL,
  `PageLocation` varchar(64) NOT NULL COMMENT 'The page location where the ads apearse',
  `Interval` int(11) NOT NULL,
  `AdsImagePath` varchar(255) NOT NULL,
  `AdsPositionNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `authentification`
--

CREATE TABLE `authentification` (
  `Id` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `AdminPrivilege` tinyint(1) NOT NULL DEFAULT '0',
  `Blocked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authentification`
--

INSERT INTO `authentification` (`Id`, `Email`, `Password`, `AdminPrivilege`, `Blocked`) VALUES
(69, 'admin@eternal.com', 'administrator', 1, 0),
(87, 'nabizakariatlemcen@gmail.com', '201820182018', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `Id` int(11) NOT NULL,
  `Message` varchar(512) NOT NULL,
  `AdminOrClient` tinyint(1) NOT NULL COMMENT 'if true then the message is from the admin if false then the message is from the client',
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_has_user`
--

CREATE TABLE `conversation_has_user` (
  `conversation_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Id` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `AddDate` date NOT NULL COMMENT 'the date which this item has been added to the database',
  `Gender` varchar(10) NOT NULL,
  `ImageFileName` varchar(256) NOT NULL,
  `Brand` varchar(64) NOT NULL DEFAULT 'N/A',
  `Promotion_%` int(2) NOT NULL DEFAULT '0',
  `ranking` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Id`, `Name`, `UnitPrice`, `AddDate`, `Gender`, `ImageFileName`, `Brand`, `Promotion_%`, `ranking`) VALUES
(240, 'bonnet - brique ', '1.00', '2018-04-16', 'men', '1914966ae83e1c7bb6664594d093b973.jpg', 'CELIO', 1, 0),
(241, 'b-wildd - ceinture en cuir - marron ', '1.00', '2018-04-16', 'men', '64bfdbd2903f7ea8a582602e4e82a5b4.jpg', 'DIESEL', 20, 0),
(242, 'casquette - bicolore ', '1.00', '2018-04-16', 'men', 'e413760825115144ce423ac96ba73d7e.jpg', 'TOMMY JEANS', 0, 0),
(243, 'casquette - bleu ciel ', '1.00', '2018-04-16', 'men', '7a4d069230c7e0614bff0a1283ec6008.jpg', 'TOMMY JEANS', 5, 0),
(244, 'casquette - noir ', '1.00', '2018-04-16', 'men', '1ccf80d3d91fc61345630cb7e796a61d.jpg', 'LACOSTE', 100, 0),
(245, 'ceinture - bleu classique ', '1.00', '2018-04-16', 'men', '420a38b164c17236686ef65010ec0b98.jpg', 'LACOSTE', 1, 0),
(246, 'ceinture - brun ', '1.00', '2018-04-16', 'men', '86e6b132cc0718c43b212735862cceb1.jpg', 'CELIO', 0, 0),
(247, 'cravate - bleu ', '1.00', '2018-04-16', 'men', 'a774002e1b9b2701e5042890c07a15b7.jpg', 'CELIO', 0, 0),
(248, 'fitiecroiz - cravate - noir ', '444.00', '2018-04-16', 'men', '88d29c1d73e3dd53f988e49a643370ff.jpg', 'CELIO', 0, 0),
(249, 'ra1163 - lot de 3 paires de chaussettes - noi', '1.00', '2018-04-16', 'men', 'fd442e0b76e0dd15f5bd6c5eda3de962.jpg', 'LACOSTE', 12, 0),
(250, 'rk9811 - casquette - bleu marine ', '1.00', '2018-04-16', 'men', 'd9c8a56866117fd22668ccdb36a5234a.jpg', 'LACOSTE', 0, 0),
(251, 'sac Ã  dos - noir ', '1.00', '2018-04-16', 'men', 'c5bdf718832079ed0d1465d0f791a1e0.jpg', 'ADIDAS', 0, 0),
(252, 'sac Ã  dos - noir1 ', '1.00', '2018-04-16', 'men', '68b8615be790f9c4f66867b30515552e.jpg', 'ADIDAS', 0, 0),
(253, 'weave - casquette - orange ', '1.00', '2018-04-16', 'men', 'b3d6e427b4575757b8305847f9acf420.jpg', 'VOLCOM', 0, 0),
(254, '7000s 003rt - lunettes de soleil homme - noir', '1.00', '2018-04-16', 'men', 'c15e9ca04d871e2f95d50465fcbecdc4.jpg', 'CARRERA', 20, 0),
(255, 'bipreppy - lunettes de soleil - noir ', '1.00', '2018-04-16', 'men', '55ebf72f2289d7833e43a20140b714fd.jpg', 'CELIO', 0, 0),
(256, 'estagnol - lunettes de soleil - marron ', '1.00', '2018-04-16', 'men', '5ca8d695b789e50722e38ef7f24b92d4.jpg', 'FAGUO', 0, 0),
(257, 'lunettes - noir ', '2.00', '2018-04-16', 'men', 'f0088276e9e3ce96a6bf7370538bb337.jpg', 'NIKE', 0, 0),
(258, 'lunettes de soleil - bicolore ', '1.00', '2018-04-16', 'men', 'a0edf2756ad96be5fb9c90e44c6ceedb.jpg', 'HOGAN', 0, 0),
(259, 'lunettes de soleil - gris ', '1.00', '2018-04-16', 'men', 'f39baee8d102ed75eaff89def120a655.jpg', 'DSQUARED', 0, 0),
(260, 'lunettes de soleil - gris ', '1.00', '2018-04-16', 'men', '63cf3e8c9ec951bd88cae2fc3316f434.jpg', 'GUESS', 0, 0),
(261, 'lunettes de soleil - marron ', '1.00', '2018-04-16', 'men', 'a02cc3468170ff143ded770879a64d4c.jpg', 'GUESS', 0, 0),
(262, 'lunettes de soleil - marron ', '1.00', '2018-04-16', 'men', '6a8f6311e370c50822fbe200b3825e48.jpg', 'LACOSTE', 0, 0),
(263, 'lunettes de soleil - noir ', '1.00', '2018-04-16', 'men', 'c9069092c08728eeeda0a2694baa5bfa.jpg', 'DIESEL', 0, 0),
(264, 'lunettes de soleil - noir ', '1.00', '2018-04-16', 'men', 'f9299942e7b81e859ef660a766ecf416.jpg', 'GUESS', 0, 0),
(265, 'lunettes de soleil - rouge ', '1.00', '2018-04-16', 'men', 'c2d71ce311bd871c6eb4354163860081.jpg', 'LACOSTE', 0, 0),
(266, 'lunettes de soleil homme - or ', '1.00', '2018-04-16', 'men', '6c91945ffea8b66050604cdfab84fad8.jpg', 'CALVIN KLEIN', 0, 0),
(267, 'lunettes de soleil rondes double pont - ecail', '1.00', '2018-04-16', 'men', 'b970e1b3cb80974ceb4d29da343412cb.jpg', 'GUESS', 0, 0),
(269, 'milton - lunettes de soleil - beige ', '1.00', '2018-04-16', 'men', '97eb1a43ead735bb7eb1d6e8aaf5622b.jpg', 'REZIN', 0, 0),
(270, 'pilot - lunettes ', '1.00', '2018-04-16', 'men', '78fd119b38452df8daa1455bfa2b8bc1.jpg', 'KUMA', 0, 0),
(271, 'pride - lunettes de soleil mixte - noir ', '1.00', '2018-04-16', 'men', '76403df6052a384e4fe5c0e90d03b2b4.jpg', 'KUMA', 0, 0),
(272, 'timeless - lunettes de soleil mixte - bleu ', '1.00', '2018-04-16', 'men', '718541746b2f78749bd4d0e8b9d856ce.jpg', 'KUMA', 0, 0),
(273, 'timeless - lunettes de soleil mixte - marron ', '1.00', '2018-04-16', 'men', '9f5e54c47fe793dd8cfb6b9cdba3cf55.jpg', 'KUMA', 0, 0),
(274, 'visual - lunettes de soleil mixte - beige KUM', '1.00', '2018-04-16', 'men', '32e6ac14210d4a345a4776451a6de191.jpg', 'N/A', 0, 0),
(275, 'visual - lunettes de soleil mixte - marron ', '1.00', '2018-04-16', 'men', '6d0d44db50df5882edcc3f59ae86b19c.jpg', 'KUMA', 0, 0),
(276, 'wildly - lunettes de soleil - marron ', '1.00', '2018-04-16', 'men', '49f381fa0befb41b563c05a4b961d0c3.png', 'DIOR', 0, 0),
(277, 'chrono sport - montre analogique - argentÃ© F', '1.00', '2018-04-16', 'men', '7144d02efb6a3558594cbe15355924ed.jpg', 'N/A', 0, 0),
(278, 'intrepid 2 - montre analogique - bleu GUESS', '1.00', '2018-04-16', 'men', '840f5a26599046b2ba0b1aa7327b0870.jpg', 'N/A', 0, 0),
(279, 'montre analogique - argentÃ© GUESS', '1.00', '2018-04-16', 'men', 'adb7688158631dde96ed2a46f3439b36.jpg', 'N/A', 0, 0),
(280, 'montre analogique - argentÃ© HUGO BOSS', '1.00', '2018-04-16', 'men', '3bdb45dfe09ea2ec11b9035397e78bf3.jpg', 'N/A', 0, 0),
(281, 'montre analogique - argentÃ©2 HUGO BOSS', '1.00', '2018-04-16', 'men', 'f1bba7002a00a202d70cf79d1fdc8fb0.jpg', 'N/A', 0, 0),
(282, 'montre analogique - bleu GUESS', '1.00', '2018-04-16', 'men', '920407ebc0e25d56d0082ba2abb124b1.jpg', 'N/A', 0, 0),
(283, 'montre analogique - gris SMILEY', '1.00', '2018-04-16', 'men', 'c1dfe7f231badc801831f91ffede04de.jpg', 'N/A', 0, 0),
(284, 'montre analogique - noir GUESS', '1.00', '2018-04-16', 'men', '3d7443ab0bf2052027c82a297ae6ba17.jpg', 'N/A', 0, 0),
(285, 'montre analogique - noir LACOSTE', '1.00', '2018-04-16', 'men', '2c53061700ae6a3af2017f03438a61b2.jpg', 'N/A', 0, 0),
(286, 'montre analogique - noir2  GUESS', '1.00', '2018-04-16', 'men', '592bee2656e65709d06ba6b002434aa3.jpg', 'N/A', 0, 0),
(287, 'montre analogique - rouge SMILEY', '1.00', '2018-04-16', 'men', '58b9d1a44b60b7acdf771e4f903f25cc.jpg', 'N/A', 0, 0),
(288, 'montre analogique - turquoise SMILEY', '1.00', '2018-04-16', 'men', 'e94ac7ac10572d3731ce741f423d0505.jpg', 'N/A', 0, 0),
(289, 'montre analogique en cuir - noir HUGO BOSS', '1.00', '2018-04-16', 'men', '7953b11e902c6747a0ae622f52ce56d0.jpg', 'N/A', 0, 0),
(290, 'montre avec bracelet en acier - argentÃ© GUES', '1.00', '2018-04-16', 'men', '1e6111d1b8eebcc522073bc3ac55e077.jpg', 'N/A', 0, 0),
(291, 'montre avec bracelet en silicone - bleu SUPER', '1.00', '2018-04-16', 'men', 'eac5275583aae1345dbdd1b016e45563.jpg', 'N/A', 0, 0),
(292, 'montre avec bracelet en silicone - rouge SUPE', '1.00', '2018-04-16', 'men', '55d5c829dce2e7c5a685a69c7eef0c5a.jpg', 'N/A', 0, 0),
(293, 'montre avec bracelet en silicone1 - bleu SUPE', '1.00', '2018-04-16', 'men', '189b1e63947580088cd6354888496e31.jpg', 'N/A', 0, 0),
(294, 'montre digitale - noir CASIO', '1.00', '2018-04-16', 'men', '776739b0f3f5366d8e07caabefa62dbd.jpg', 'N/A', 0, 0),
(295, 'montre en cuir - bicolore GUESS', '1.00', '2018-04-16', 'men', '8132c39c18267ea04b4654e5c1dd19de.jpg', 'N/A', 0, 0),
(296, 'montre en cuir - marron HUGO BOSS', '1.00', '2018-04-16', 'men', 'c1d3e5d2dda125445faa99c2d5ad71fd.jpg', 'N/A', 0, 0),
(297, 'montre en cuir - noir HUGO BOSS', '1.00', '2018-04-16', 'men', '147b7bbcd4cf82848191924ab375dbfe.jpg', 'N/A', 0, 0),
(298, 'originals - montre analogique - noir FESTINA', '1.00', '2018-04-16', 'men', 'f306a5939d5a8b85e1e326850f07ec7f.jpg', 'N/A', 0, 0),
(299, 'originals - montre en cuir - beige FESTINA', '1.00', '2018-04-16', 'men', 'f92c6e41d2e808668ed2c493a13c6293.jpg', 'N/A', 0, 0),
(303, 'chuck taylor all star hi - baskets mode - blanc (Baskets, Sneakers)', '1.00', '2018-04-23', 'men', '527806da8e86b94ec6d9d6425a9550dd.jpg', 'CONVERSE', 0, 0),
(304, 'chuck taylor all star ox - baskets mode - blanc (Baskets, Sneakers)', '0.00', '2018-04-23', 'men', 'e39c8506baebe83dbf414298770e243d.jpg', 'CONVERSE', 0, 0),
(305, 'galaxy 4 m - chaussures de sport - noir (Baskets, Sneakers)', '0.00', '2018-04-23', 'men', 'f81ac6646060c4bc78b546c4955ba0f0.jpg', 'ADIDAS', 0, 0),
(306, 'mega nrgy - chaussures de sport - noir (Baskets, Sneakers)', '0.00', '2018-04-23', 'men', 'c3b8a9e504ee81f4a1c408c61a9f837c.jpg', 'PUMA', 0, 0),
(307, 'stan smith - baskets en cuir - blanc (Baskets, Sneakers)', '0.00', '2018-04-23', 'men', '5bda07a25092aa95646a2ee80da303b0.jpg', 'ADIDAS', 0, 0),
(308, 'tinker 1973 - baskets - bleu (Baskets, Sneakers)', '0.00', '2018-04-23', 'men', '7d5da52f3cee78f07f0bc6ac007118ae.jpg', 'PEPE JEANS', 0, 0),
(309, 'adventure 2.0 cupsole chukka - boots, bottines - marron (Boots)', '0.00', '2018-04-23', 'men', '33ea36d8e6d011d9e51713015b41e6f7.jpg', 'TIMBERLAND', 0, 0),
(310, 'bradstreet leather chukka - boots en cuir - blÃ© (Boots)', '0.00', '2018-04-23', 'men', 'ee5808a5eef62715582772a48b3687a1.jpg', 'TIMBERLAND', 0, 0),
(312, 'emerson - boots, bottines - brun (Boots)', '0.00', '2018-04-23', 'men', '48c9b4ae4f64b3d7b8cf757b9e712d41.jpg', 'LEVIS', 0, 0),
(313, 'huntington chukka - boots en cuir - gris (Boots)', '0.00', '2018-04-23', 'men', '9a98de3bbf576979ca95bd3e9d997f81.jpg', 'LEVIS', 0, 0),
(314, 'icon 6-inch premium boot bt wheat - jaune (Boots)', '0.00', '2018-04-23', 'men', 'a50436ccdf816f3d94e7e7fca6b94459.jpg', 'TIMBERLAND', 0, 0),
(315, 'chaussures bateau en cuir - brun  noir (Chaussures bateau )', '0.00', '2018-04-23', 'men', '5aef1ffb34bdac6ccae0f64e137a8c0b.jpg', 'TIMBERLAND ', 0, 0),
(316, 'chaussures bateau en cuir - brun (Chaussures bateau )', '0.00', '2018-04-23', 'men', 'd4b39b9688226b9d7ec1892fd9290d33.jpg', 'TIMBERLAND', 0, 0),
(317, 'chaussures bateau en cuir - cafÃ© (Chaussures bateau )', '0.00', '2018-04-23', 'men', '85ea6cc3a068f8a64883b1dc3eaa89a2.jpg', 'TIMBERLAND', 0, 0),
(318, 'chaussures bateau en cuir - noir (Chaussures bateau )', '0.00', '2018-04-23', 'men', '4725c678eb2aa3834c1e315a6d17a89b.jpg', 'TIMBERLAND', 0, 0),
(319, 'chaussures bateau en cuir suÃ©dÃ© - beige (Chaussures bateau )', '0.00', '2018-04-23', 'men', 'b877ebcdd25695e84d8175391b364e2e.jpg', 'TIMBERLAND', 0, 0),
(320, 'selbyville - bateaux en cuir - blÃ© (Chaussures bateau)', '0.00', '2018-04-23', 'men', 'fe5da4609a1f1abd14806f188cebfae4.jpg', 'TIMBERLAND', 0, 0),
(321, 'alphabounce rc m - chaussures de sport - noir (Chaussures de sport)', '0.00', '2018-04-23', 'men', '3ecad10fee27510b353ec6e9bf461f2b.jpg', 'ADIDAS', 0, 0),
(322, 'barricade 2017 boost - chaussures de tennis (Chaussures de sport)', '0.00', '2018-04-23', 'men', '77f23f7e9bb4210cce3e0d8a6812749c.jpg', 'ADIDAS', 0, 0),
(323, 'descendant v4 - chaussures de sport - bleu (Chaussures de sport)', '0.00', '2018-04-23', 'men', '1a16078e700e47f7883b2d83a0bd3830.jpg', 'PUMA', 0, 0),
(324, 'galaxy 4 m - chaussures de sport - noir (Chaussures de sport)', '0.00', '2018-04-23', 'men', '589cb28b053bc881327bed7158752e90.jpg', 'ADIDAS', 0, 0),
(325, 'galaxy 4 m - chaussures de sport - noir (Chaussures de sport)', '0.00', '2018-04-23', 'men', '484f24f49ff14143691600be76876db9.jpg', 'PUMA', 0, 0),
(326, 'tsugi sunshei - chaussures de sport - noir (Chaussures de sport)', '0.00', '2018-04-23', 'men', 'bca343cd534d5ea46e83a88ac1965156.jpg', 'PUMA', 0, 0),
(327, 'chaussures de ville en cuir - brun (Derbies)', '0.00', '2018-04-23', 'men', '0347a19c285555bd20bacadb85ee5190.jpg', 'TIMBERLAND', 0, 0),
(328, 'chaussures de ville en cuir - noir (Derbies)', '0.00', '2018-04-23', 'men', '4cfb08d6934dc5b24cc56721b5bd2e18.jpg', 'TIMBERLAND', 0, 0),
(329, 'damon - derbies en cuir - beige (Derbies)', '0.00', '2018-04-23', 'men', '113e15ada19522f0cea25d2b42b07727.jpg', 'JACK & JONES', 0, 0),
(330, 'derbies - camel (Derbies)', '0.00', '2018-04-23', 'men', '42358547fe6e1f03f6710d464cc1f293.jpg', 'CELIO', 0, 0),
(331, 'derbies - noir (Derbies)', '0.00', '2018-04-23', 'men', 'a687ce59cf7be1eb69e56b9a7d123b30.jpg', 'CELIO', 0, 0),
(332, 'damocle - mocassins en cuir - taupe (Mocassins)', '0.00', '2018-04-23', 'men', 'c24d25c8aae301657dfdb4a7ccc781dc.jpg', 'GEOX', 0, 0),
(333, 'melbourne - mocassins en cuir - denim bleu (Mocassins)', '0.00', '2018-04-23', 'men', 'a83eda509707a2b105398075a574bfe4.jpg', 'GEOX', 0, 0),
(334, 'moner - mocassins en cuir - ocÃ©an (Mocassins)', '0.00', '2018-04-23', 'men', '94fa458c7993508da70f8f4e324cd923.jpg', 'GEOX', 0, 0),
(335, 'snake moc - mocassins en cuir - taupe (Mocassins)', '0.00', '2018-04-23', 'men', 'faae673c4f30f1d3f486955f43b92d1d.jpg', 'GEOX', 0, 0),
(336, 'worker - mocassins en cuir - whisky (Mocassins)', '0.00', '2018-04-23', 'men', '91de218fd30320cea0e8907e60442078.jpg', 'GEOX', 0, 0),
(337, 'adilette - sandales - bleu marine (Sandales, Tongs)', '0.00', '2018-04-23', 'men', 'c6d5a74bf05079d38e98813127ea4150.jpg', 'ADIDAS', 0, 0),
(338, 'l.30 slide 118 2 cam - sandales - blanc (Sandales, Tongs)', '0.00', '2018-04-23', 'men', 'f7de5917e424ee8df1e1547e446bbf66.jpg', 'LACOSTE', 0, 0),
(339, 'popcat - sandales - blanc (Sandales, Tongs)', '0.00', '2018-04-23', 'men', '9d8ded663dac628bf7d649aa13f9c435.jpg', 'PUMA', 0, 0),
(340, 'tongs - blanc (Sandales, Tongs)', '0.00', '2018-04-23', 'men', '0dea6bb35c4fbee6d8f42c12ce5a1b9e.jpg', 'LEVIS', 0, 0),
(341, 'tongs - blanc (Sandales, Tongs)', '0.00', '2018-04-23', 'men', 'cf4b0e227cfc71df9e74776360e4f2ec.jpg', 'LEVIS', 0, 0),
(342, 'cavantal - chemise - rayÃ© (Chemises)', '0.00', '2018-04-23', 'men', '06fa6f43ae358a502fce832a0dba6b77.jpg', 'CELIO', 0, 0),
(343, 'cavantal - chemise - rayÃ© (Chemises)', '0.00', '2018-04-23', 'men', '623fb0f1c2a40b90e9e01a92a2de86ea.jpg', 'CELIO', 0, 0),
(344, 'chemise col mao - noir (Chemises)', '0.00', '2018-04-23', 'men', 'fc831d4454214131fddcfbe242d92b96.jpg', 'GUESS', 0, 0),
(345, 'chemise manches longues - anthracite (Chemises)', '0.00', '2018-04-23', 'men', 'd687311fd66a2427c38ff13e1b1dbc10.jpg', 'CELIO', 0, 0),
(346, 'chemise manches longues - bleu marine (Chemises)', '0.00', '2018-04-23', 'men', '8312cf77f9406c7cad94e7a32ca36739.jpg', 'CELIO', 0, 0),
(347, 'chemise manches longues - kaki (Chemises)', '0.00', '2018-04-23', 'men', '1569073cd03168f5d01f300f2e5dc63f.jpg', 'CELIO', 0, 0),
(349, 'kinship - chemise en jean - pierre (Chemises)', '0.00', '2018-04-23', 'men', '9824314fcdc8410d1127dfe9cddc7fff.jpg', 'CELIO', 0, 0),
(350, 'new - chemise en jean - denim bleu (Chemises)', '0.00', '2018-04-23', 'men', 'dc137000e1f9a9c1d1185faef4df672d.jpg', 'JACK & JONES', 0, 0),
(351, 'vip - chemise manches longues - blanc (Chemises)', '0.00', '2018-04-23', 'men', '274bda07caad1d5e0d7f191a8cc07f22.jpg', 'KAPORAL', 0, 0),
(352, 'costume 2 piÃ¨ces en laine - gris foncÃ© (Costumes)', '0.00', '2018-04-23', 'men', 'a8295f9a276e98e0f284d2c567e078bd.jpg', 'ROMANO BOTTA', 0, 0),
(353, 'costume 2 piÃ¨ces en laine - gris (Costumes)', '0.00', '2018-04-23', 'men', 'fe70c40b496c38f5b1718f13e0a807b7.jpg', 'ROMANO BOTTA', 0, 0),
(354, 'costume 2 piÃ¨ces en laine et soie - beige (Costumes)', '0.00', '2018-04-23', 'men', '64263223ab18dd43a7a3a394eea741f0.jpg', 'ROMANO BOTTA', 0, 0),
(355, 'costume en laine - noir (Costumes)', '0.00', '2018-04-23', 'men', '424116f72966a230cb9e07dfccb9c218.jpg', 'EMPORIO', 0, 0),
(356, 'costumes en laine - marron (Costumes)', '0.00', '2018-04-23', 'men', '2b381a685639f376df1893d371d5292d.jpg', 'EMPORIO', 0, 0),
(357, 'smoking 96% laine - gris foncÃ© (Costumes)', '0.00', '2018-04-23', 'men', '2223d283fe4b314632f5f287b9c39d34.jpg', 'EMPORIO', 0, 0),
(358, 'vendÃ´me - costume complet 3 piÃ¨ces - bleu (Costumes)', '0.00', '2018-04-23', 'men', 'd7d4902d29bc77956930f844d9e1d1d7.jpg', 'MAJESTE', 0, 0),
(359, '501 - jean slim - denim bleu (Jeans)', '0.00', '2018-04-23', 'men', '6e25df5b65c30f119693e5012b5da4d5.jpg', 'LEVIS', 0, 0),
(360, '502 - jean regular - bleu (Jeans)', '0.00', '2018-04-23', 'men', 'b6e1b7116981afae5114d17e0e3ed117.jpg', 'LEVIS', 0, 0),
(361, '511 - jean slim - denim bleu (Jeans)', '0.00', '2018-04-23', 'men', 'fc44491b788d5b3f3b5b0e7677d44e04.jpg', 'LEVIS', 0, 0),
(362, 'ezzy - jean slim - denim bleu (Jeans)', '0.00', '2018-04-23', 'men', '67434743d97a007814d9677cbe0e89d6.jpg', 'KAPORAL', 0, 0),
(363, 'jean droit - bleu brut  (Jeans)', '0.00', '2018-04-23', 'men', '6173f092a0e4192d74436aed30c66d6f.jpg', 'CELIO', 0, 0),
(364, 'jean skinny - denim bleu (Jeans)', '0.00', '2018-04-23', 'men', '52c03baf1973ee3e5abc720fd7f968ef.jpg', 'GUESS', 0, 0),
(365, 'jean slim - bleu (Jeans)', '0.00', '2018-04-23', 'men', '8f91f7adeb14dc119a9019790fdb4877.jpg', 'GUESS', 0, 0),
(366, 'jean slim - gris (Jeans)', '0.00', '2018-04-23', 'men', '4d76aa7c9090f6c21d4025068c4f1bb7.jpg', 'CELIO', 0, 0),
(367, 'jean slim - pierre (Jeans)', '0.00', '2018-04-23', 'men', '34308d5acc86f1fefe4ad27fe9397cbd.jpg', 'CELIO', 0, 0),
(368, 'jiglenn - jean slim - denim bleu (Jeans)', '0.00', '2018-04-23', 'men', '2c63d4d1b80df069787fc92b0bbafd3b.jpg', 'JACK & JONES', 0, 0),
(369, 'lord - jean regular - denim bleu (Jeans)', '0.00', '2018-04-23', 'men', '64c62878cbc725b269636cd5f4aad8ac.jpg', 'KAPORAL', 0, 0),
(370, 'loskrey45 - jean slim - denim noir (Jeans)', '0.00', '2018-04-23', 'men', 'fb3ca489e1a00c0d1fc047e4b24be033.jpg', 'CELIO', 0, 0),
(371, 'bas de maillot - denim noir (Maillots de Bain)', '0.00', '2018-04-23', 'men', 'a606fc95eb9744445950800cbb085375.jpg', 'ADIDAS', 0, 0),
(372, 'bas de maillot - multicolore (Maillots de Bain)', '0.00', '2018-04-23', 'men', '94e192482e46edb799985be6d1950c2b.jpg', 'GUESS', 0, 0),
(373, 'boxer de bain imprimÃ© - bleu (Maillots de Bain)', '0.00', '2018-04-23', 'men', '31500a60d15f4c4db8db47ea82d6e1bd.jpg', 'GUESS', 0, 0),
(374, 'short de bain - orange  (Maillots de Bain)', '0.00', '2018-04-23', 'men', '29153f5cbe40e09304879e2a73e3a706.jpg', 'GUESS', 0, 0),
(375, 'babe baseball - teddy 55% laine - noir (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', '91ea6bea0ceb7aa8785eebdaa44bf791.jpg', 'WRANGLER', 0, 0),
(376, 'blouson - marron (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', '3286005a86631891bf900d2ee893b0bc.jpg', 'LACOSTE', 0, 0),
(377, 'bombers - noir (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', 'f30b3d690f9306e1d6e30ad7db2a782e.jpg', 'SCHOTT', 0, 0),
(378, 'bombers en velours - bleu marine (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', '2a0c42b19070d8f649c03305eccc6324.jpg', 'SCHOTT ', 0, 0),
(379, 'coupe-vent - blanc (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', '34bd7f366d68dedd603cacadc0eaef8f.jpg', 'LACOSTE ', 0, 0),
(380, 'doudoune - gris (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', '36a1011f3babf454e48c0d651e01c921.jpg', 'LACOSTE ', 0, 0),
(381, 'jjvvartic - parka - bleu marine (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', 'f100b933732f7d46c2abe14b0d974c71.jpg', 'JACK & JONES', 0, 0),
(382, 'light parka - parka - vert (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', 'c387839ff3ad38eb6d2fbc4d4bc37896.jpg', 'JACK & JONES', 0, 0),
(383, 'new landing - doudoune sans manches - bleu marine (Manteaux, Blousons, Doudounes)', '0.00', '2018-04-23', 'men', '257346da5fce7acb43e96a93778a4765.jpg', 'JACK & JONES', 0, 0),
(384, 'doprinty - pantalon - gris (pantalons)', '0.00', '2018-04-23', 'men', 'b3ee06a9934d6f0575ff8d5a542c5ca2.jpg', 'CELIO', 0, 0),
(385, 'dotalia 3 - pantalon chino - bleu clair (pantalons)', '0.00', '2018-04-23', 'men', 'd86ab4b73d126eef62e685167bb20d78.jpg', 'CELIO', 0, 0),
(386, 'focord - pantalon - bleu brut (pantalons)', '0.00', '2018-04-23', 'men', '1179fb24cd1e26555d2f7ac9f9f21510.jpg', 'CELIO', 0, 0),
(387, 'pantalon - bleu clair (pantalons)', '0.00', '2018-04-23', 'men', 'e978c89c1fa0597188020a42c09e038d.jpg', 'CELIO', 0, 0),
(388, 'pantalon - kaki (pantalons)', '0.00', '2018-04-23', 'men', 'f47dcc14685bef749d8399d57eb28286.jpg', 'SCHOTT', 0, 0),
(389, 'pantalon cargo - beige (pantalons)', '0.00', '2018-04-23', 'men', '6bec10a94bb42c4e75e912ee0a4d5d48.jpg', 'SCHOTT', 0, 0),
(390, 'pantalon cargo - marron clair (pantalons)', '0.00', '2018-04-23', 'men', '77dade479dec479ea9773a047d6ced89.jpg', 'CELIO', 0, 0),
(391, 'pantalon chino - noir (pantalons)', '0.00', '2018-04-23', 'men', '666483cb95fa0e1a0392413b3b3e9564.jpg', 'GUESS', 0, 0),
(392, 'pantalon chino 52% lin - bleu marine (pantalons)', '0.00', '2018-04-23', 'men', '6dbae8656c115d83b0f9876498399a3c.jpg', 'CELIO', 0, 0),
(393, 'pantalon jogging - bleu (pantalons)', '0.00', '2018-04-23', 'men', 'ef6092e86e0897d8f7a4a1004d49c3ad.jpg', 'GUESS', 0, 0),
(394, 'tr cargoslim w - pantalon cargo - bleu marine (pantalons)', '0.00', '2018-04-23', 'men', 'b0c442d34426b15f7eb14efc6fa07d00.jpg', 'SCHOTT', 0, 0),
(396, 'ah2988 - pull en pure laine vierge - gris (Pulls, Gilets)', '0.00', '2018-04-23', 'men', 'dfe11cd3b8ad3392588d6d61092bdf6d.jpg', 'LACOSTE', 0, 0),
(397, 'cardigan - blanc (Pulls, Gilets)', '0.00', '2018-04-23', 'men', '69bcdb2ad6eedfa1544861051cef53e8.jpg', 'GUESS', 0, 0),
(398, 'detwistnew - pull - bleu marine (Pulls, Gilets)', '0.00', '2018-04-23', 'men', 'f27f63e260336f8e690c6f232549829b.jpg', 'CELIO', 0, 0),
(399, 'gilet - rouge (Pulls, Gilets)', '0.00', '2018-04-23', 'men', '940fe5f302347b8f19ed18a56bd946a6.jpg', 'CELIO', 0, 0),
(400, 'pull - bleu (Pulls, Gilets)', '0.00', '2018-04-23', 'men', 'd56372f3ffb7fc45ab2cbbe70997f8e2.jpg', 'LACOSTE', 0, 0),
(401, 'pull - gris (Pulls, Gilets)', '0.00', '2018-04-23', 'men', '638bbac3f20d77ad83fa00a1b0debdbd.jpg', 'CELIO', 0, 0),
(402, 'pull - gris (Pulls, Gilets)', '0.00', '2018-04-23', 'men', '899808d43f64395a4da695e06a246fd3.jpg', 'GUESS', 0, 0),
(403, 'pull - orange (Pulls, Gilets)', '0.00', '2018-04-23', 'men', 'd781f68f19e97d8368d70071895ad0b2.jpg', 'CELIO', 0, 0),
(404, 'pull Ã  logo frontal - bleu marine (Pulls, Gilets)', '0.00', '2018-04-23', 'men', '0d62a821f860c504fdf75d268dd8716d.jpg', 'GUESS', 0, 0),
(405, 'pull couleurs contrastantes Ã  logo - bicolore  (Pulls, Gilets)', '0.00', '2018-04-23', 'men', '37fbef7ffc07ce77cf8d666bc4fd9177.jpg', 'GUESS', 0, 0),
(406, 'pull en lin - blanc (Pulls, Gilets)', '0.00', '2018-04-23', 'men', 'd8299434690e18d519c0ee67f42861f8.jpg', 'CELIO', 0, 0),
(407, 'pull en pure laine vierge - gris (Pulls, Gilets)', '0.00', '2018-04-23', 'men', '2dfd3c3bc5272f1771d16eb63db81099.jpg', 'LACOSTE', 0, 0),
(409, 'afojog - bermuda - camel (Shorts, Bermudas)', '0.00', '2018-04-23', 'men', '5fafc1887dd9722d76f81965aadecb1d.jpg', 'CELIO', 0, 0),
(410, 'afojog - bermuda - gris clair (Shorts, Bermudas)', '0.00', '2018-04-23', 'men', 'fbfd0f97e244ecf203f872f7dbbf682f.jpg', 'CELIO', 0, 0),
(411, 'bermuda - bleu marine (Shorts, Bermudas)', '0.00', '2018-04-23', 'men', 'c7f2b0fdf1e7caeb8fe0f279f392735b.jpg', 'EA7', 0, 0),
(412, 'bermuda - denim bleu (Shorts, Bermudas)', '0.00', '2018-04-23', 'men', '19fccf4a0524bc732b06d8bc5fbfb78b.jpg', 'CELIO', 0, 0),
(413, 'doleger - bermuda - bleu brut (Shorts, Bermudas)', '0.00', '2018-04-23', 'men', 'e0d1b098944025a0a965423efac72982.jpg', 'CELIO', 0, 0),
(414, 'rick - short en jean - denim bleu (Shorts, Bermudas)', '0.00', '2018-04-23', 'men', 'c631c748748a9ee6e903550bc18bda50.jpg', 'JACK & JONES', 0, 0),
(415, 'rick - short en jean - denim bleu (Shorts, Bermudas)', '0.00', '2018-04-23', 'men', 'dda8b33084efc0b07c18ff6c40a3509f.jpg', 'JACK & JONES', 0, 0),
(416, 'short - bicolore (Shorts, Bermudas)', '0.00', '2018-04-23', 'men', 'd6077325538e9d8408e4840c0fa586ed.jpg', 'JACK & JONES', 0, 0),
(417, 'arch t7 track - sweat-shirt - kaki (Sweats)', '0.00', '2018-04-23', 'men', '7e1efed5cded1291163d69e580a677cb.jpg', 'PUMA', 0, 0),
(418, 'bvb - sweat-shirt - jaune (Sweats)', '0.00', '2018-04-23', 'men', '6908a0a0f18e4df2184155341e5e0e49.jpg', 'N/A', 0, 0),
(419, 'olympique de marseille - sweat-shirt - bleu marine (Sweats)', '0.00', '2018-04-23', 'men', 'e33ca5adeebdc3e80e521d9c285a4be0.jpg', 'ADDIDAS', 0, 0),
(420, 'stadium - sweat Ã  capuche - noir (Sweats)', '0.00', '2018-04-23', 'men', '0178f3253a6fda45a5425d5fd7ec38ea.jpg', 'ADIDAS', 0, 0),
(421, 'sweat Ã  capuche - gris (Sweats)', '0.00', '2018-04-23', 'men', '01d80bf60201e340ec3304693345e8a1.jpg', 'SCHOTT', 0, 0),
(422, 'sweat Ã  capuche - noir (Sweats)', '0.00', '2018-04-23', 'men', '42819030037f97d93e9b1df184daec7f.jpg', 'CELIO', 0, 0),
(423, 'sweat Ã  capuche - rouge (Sweats)', '0.00', '2018-04-23', 'men', '8988c1b53c924ccfe0b3ede5fae5a212.jpg', 'ADIDAS', 0, 0),
(424, 'sweat-shirt - bleu marine (Sweats)', '0.00', '2018-04-23', 'men', '36e1ff9e737bdbc42bf463cc54217fc0.jpg', 'ADIDAS', 0, 0),
(425, 'sweat-shirt - gris (Sweats)', '0.00', '2018-04-23', 'men', 'e94190929c15450dff603924e09557b9.jpg', 'N/A', 0, 0),
(426, 'sweat-shirt - rouge (Sweats)', '0.00', '2018-04-23', 'men', '95841d4194df6e7798d1803d151dde36.jpg', 'LACOSTE', 0, 0),
(427, 'sweat-shirt - vert (Sweats)', '0.00', '2018-04-23', 'men', '13ba24a00a1ddf0796091314a7916e9f.jpg', 'CELIO', 0, 0),
(428, 't7 track - sweat-shirt - rouge (Sweats)', '0.00', '2018-04-23', 'men', '748c754f22f72b8db0c622878ec9efe5.jpg', 'PUMA', 0, 0),
(429, 't7 track - sweat-shirt - violet (Sweats)', '0.00', '2018-04-23', 'men', 'c90fa17accc7cd426a54a04ae5288845.jpg', 'PUMA', 0, 0),
(430, 'l1212 - polo - blanc (T-Shirts)', '0.00', '2018-04-23', 'men', '4c01eb41a23eb3ffe9ddfe8bdaa03142.jpg', 'LACOSTE', 0, 0),
(431, 'levis housemark - polo manches courtes - bleu (T-Shirts)', '0.00', '2018-04-23', 'men', '356031847b510de3a00da3c7fab258e6.jpg', 'LEVIS', 0, 0),
(432, 'polo manches courtes - blanc (T-Shirts)', '0.00', '2018-04-23', 'men', '62afb66ab31aaa3fe266f956a3e10e2f.jpg', 'CELIO', 0, 0),
(433, 'polo manches courtes - bleu classique (T-Shirts)', '0.00', '2018-04-23', 'men', 'd04ca21a142843d678e48b30040067a1.jpg', 'CELIO', 0, 0),
(434, 'polo manches courtes - pÃªche (T-Shirts)', '0.00', '2018-04-23', 'men', '136edee889b459490d53a1e05e2bb6bb.jpg', 'LACOSTE', 0, 0),
(435, 'polo manches longues - blanc (T-Shirts)', '0.00', '2018-04-23', 'men', '78f228fb679e443a7950add69bd29019.jpg', 'CELIO', 0, 0),
(436, 'poshu - t-shirt manches courtes - gris clair (T-Shirts)', '0.00', '2018-04-23', 'men', '0966983f2818329fcfecbb620a12bbfe.jpg', 'N/A', 0, 0),
(437, 't-shirt manches courtes - blanc (T-Shirts)', '0.00', '2018-04-23', 'men', '7c634a88c6e1ea3ffd7f48b186970753.jpg', 'LACOSTE', 0, 0),
(438, 't-shirt manches courtes - bordeaux (T-Shirts)', '0.00', '2018-04-23', 'men', '2dd77eaeae7ebc321322438ed147e920.jpg', 'GUESS', 0, 0),
(439, 'vebasic - t-shirt manches courtes - kaki (T-Shirts)', '0.00', '2018-04-23', 'men', 'bfaf8c8af6d3e9ed441b95a3236379e4.jpg', 'CELIO', 0, 0),
(440, 'blazer - gris (Vestes)', '0.00', '2018-04-23', 'men', 'eba227e6e1d47057c4e4a1230abd2bcc.jpg', 'CELIO', 0, 0),
(441, 'fukaro - veste en maille - gris (Vestes)', '0.00', '2018-04-23', 'men', '7da6410cda93f3b423c8d1bfe73b717f.jpg', 'CELIO', 0, 0),
(442, 'guhit - veste de costume - bleu (Vestes)', '0.00', '2018-04-23', 'men', '32dfc7aebc4874fa61a0823db4a813d2.jpg', 'CELIO', 0, 0),
(443, 'veste coupe-vent - bordeaux (Vestes)', '0.00', '2018-04-23', 'men', '24c585e51f6d47f4e793689dae4825d2.jpg', 'JACK & JONES', 0, 0),
(444, 'veste coupe-vent - noir (Vestes)', '0.00', '2018-04-23', 'men', '2c3a7175441d49dfe8ab5304cbd669d9.jpg', 'JACK & JONES', 0, 0),
(445, 'veste de combat - kaki (Vestes)', '0.00', '2018-04-23', 'men', '515d1874b23dea5a1e862d75c716bddc.jpg', 'SCHOTT', 0, 0),
(446, 'veste de costume - bleu marine (Vestes)', '0.00', '2018-04-23', 'men', '33557702e19e0ce2ce21c2cdaf42f8ff.jpg', 'CELIO', 0, 0),
(447, 'veste en jean - denim bleu (Vestes)', '0.00', '2018-04-23', 'men', '5de0b186031aef1158a56579a0389138.jpg', 'GUESS', 0, 0),
(448, 'Ceinture brodÃ©e (Ceintures)', '0.00', '2018-04-23', 'women', '1a7aa129890d926cf24201420d029df8.jpg', 'N/A', 0, 0),
(449, 'Ceinture brodÃ©e fleure (Ceintures)', '0.00', '2018-04-23', 'women', '9bf9949528811e160ead3fca54e7d9f7.jpg', 'N/A', 0, 0),
(450, 'Ceinture large en suÃ©dine (Ceintures)', '0.00', '2018-04-23', 'women', 'eba1577a459a349fcee5ac426767cd07.jpg', 'N/A', 0, 0),
(451, 'Fine ceinture (Ceintures)', '0.00', '2018-04-23', 'women', 'a13c64fe09b96e07ce97f4758fa343f6.jpg', 'N/A', 0, 0),
(452, 'Fine ceinture rose (Ceintures)', '0.00', '2018-04-23', 'women', 'fe8c0f9681c225bd742572c7abb2d681.jpg', 'N/A', 0, 0),
(453, 'Fine ceinture tressÃ©e (Ceintures)', '0.00', '2018-04-23', 'women', '7d03108a0c5391e932761768f56b0e0f.jpg', 'N/A', 0, 0),
(454, 'Capeline bicolore avec ruban (Chapeau, casquette)', '0.00', '2018-04-23', 'women', '39e5590e04e10a33d32da7948fee9956.jpg', 'N/A', 0, 0),
(455, 'Capeline tissÃ©e bicolore (Chapeau, casquette)', '0.00', '2018-04-23', 'women', '08f5fa7f15c8b3bb8d7f7833b4adb3f2.jpg', 'N/A', 0, 0),
(456, 'Chapeau en paille et broderies (Chapeau, casquette)', '0.00', '2018-04-23', 'women', '7a538eeac13213253e4104b0f24c6937.jpg', 'N/A', 0, 0),
(457, 'Bonnet Ã  pompon (Echarpe, gants, bonnet)', '0.00', '2018-04-23', 'women', 'e4866a1534d415de18930c29ab48bd6d.jpg', 'N/A', 0, 0),
(458, 'Bonnet en maille cÃ´telÃ©e (Echarpe, gants, bonnet)', '0.00', '2018-04-23', 'women', '1e713b5569b2744fbbe9c8a7e3cb752c.jpg', 'N/A', 0, 0),
(459, 'Ã‰charpe en tricot extensible toucher doux (Echarpe, gants, bonnet)', '0.00', '2018-04-23', 'women', '8f671a2750e6a0ff7d7689ec7789cefa.jpg', 'N/A', 0, 0),
(460, 'Ã‰charpe gris (Echarpe, gants, bonnet)', '0.00', '2018-04-23', 'women', '6a1dc2ab6fcbc233dc9ced4028b3334e.jpg', 'N/A', 0, 0),
(461, 'Paire de gants en maille poilue (Echarpe, gants, bonnet)', '0.00', '2018-04-23', 'women', '1636cd989f814cfa397ee4669e79ae8f.jpg', 'N/A', 0, 0),
(462, 'Paire de mitaines en tricot (Echarpe, gants, bonnet)', '0.00', '2018-04-23', 'women', 'b9bd48718b45375368a16c6cf2ec6788.jpg', 'N/A', 0, 0),
(463, 'Foulard carrÃ© fleuri et Ã  pompons (Foulard)', '0.00', '2018-04-23', 'women', '2936fd4f1fa7f005798ad028a7a3aa02.jpg', 'N/A', 0, 0),
(464, 'Foulard fluide Ã  franges uni (Foulard)', '0.00', '2018-04-23', 'women', '7ea18917fc9d6ece5089fb53ffc7c61a.jpg', 'N/A', 0, 0),
(465, 'Lunette de soleil beige (Lunette de soleil)', '0.00', '2018-04-23', 'women', '91e76060655240a3e8f5c98ebed87fe7.jpg', 'N/A', 0, 0),
(466, 'Lunettes aviateurs fluo rose (Lunette de soleil)', '0.00', '2018-04-23', 'women', 'dc78d8ce84948f703c3047f1e0afcacc.jpg', 'N/A', 0, 0),
(467, 'Lunettes de soleil fleure (Lunette de soleil)', '0.00', '2018-04-23', 'women', '04f0066983640db55d113ae16808bb2a.jpg', 'N/A', 0, 0),
(468, 'Lunettes de soleil noires (Lunette de soleil)', '0.00', '2018-04-23', 'women', 'b54392d147bece7787cc21bf79b0c9de.jpg', 'N/A', 0, 0),
(469, 'Lunettes de soleil rondes bleu (Lunette de soleil)', '0.00', '2018-04-23', 'women', '250cddf363c6e32a49b878ac74ed4676.jpg', 'N/A', 0, 0),
(470, 'Parapluie pliant imprimÃ© vichy (Parapluies)', '0.00', '2018-04-23', 'women', 'a94ecb98040908ee591b23ed794b571f.jpg', 'N/A', 0, 0),
(471, 'parapluie-pliant-imprime-rayures-bleublancrouge-rayures-femme-vo167_9_frf1 (Parapluies)', '0.00', '2018-04-23', 'women', 'e54f5a4145a1c3400c3040ea5ab6aa99.jpg', 'N/A', 0, 0),
(472, 'Babies unies en cuir (Ballerines,babies)', '0.00', '2018-04-23', 'women', 'a173328b75a966baeaa6750626809945.jpg', ' IXOO', 0, 0),
(473, 'Ballerines effet peau de serpent (Ballerines,babies)', '0.00', '2018-04-23', 'women', '96ba511b52a5b5554a12c986e84b77bf.jpg', 'LH', 0, 0),
(474, 'Ballerines en toile bout gomme (Ballerines,babies)', '0.00', '2018-04-23', 'women', '7516ea922e007f8ef436cbefd8d214f1.jpg', 'LH', 0, 0),
(475, 'Ballerines ouvertes brides croisÃ©es (Ballerines,babies)', '0.00', '2018-04-23', 'women', '6942b78d2d2287c2f4e54aee396fae88.jpg', 'LH', 0, 0),
(476, 'Ballerines rose brodÃ©e (Ballerines,babies)', '0.00', '2018-04-23', 'women', '3504a760f9215d2644ac1100320c1a86.jpg', 'MOSQUITOS', 0, 0),
(477, 'Baskets montantes Ã  lacets  (Baskets tennis montantes)', '0.00', '2018-04-23', 'women', '8cd1cc3d2ddd0b3e7df55700b733852d.jpg', 'MISS LEBERTO', 0, 0),
(478, 'Tennis en denim Ã  lacets (Baskets tennis montantes)', '0.00', '2018-04-23', 'women', '301173bdf005368f30a3ac28e19663ed.jpg', 'CREEKS', 0, 0),
(479, 'Tennis montantes esprit godillots (Baskets tennis montantes)', '0.00', '2018-04-23', 'women', '5e9fc8887588fb6ec8e3bc0f2f304da0.jpg', 'CREEKS', 0, 0),
(480, 'Tennis cuir noire (Baskets,tennis basses)', '0.00', '2018-04-23', 'women', 'df6ec7672fe946aa7ab8912bdfb65c4e.jpg', 'PUMA', 0, 0),
(481, 'Tennis cuir (Baskets,tennis basses)', '0.00', '2018-04-23', 'women', 'caf253afe659217f07d02fddfbc64aff.jpg', 'PUMA', 0, 0),
(482, 'Tennis Nike COURT ROYALE (Baskets,tennis basses)', '0.00', '2018-04-23', 'women', 'f01eb867f13d9acb1ea806604799dac7.jpg', 'NIKE', 0, 0),
(483, 'Boots zippÃ©es laniÃ¨res feuilles (Boots_bottines)', '0.00', '2018-04-23', 'women', 'bc5835dcc1031f937b8f475ed5ab400b.jpg', 'LH', 0, 0),
(484, 'Boots zippÃ©es laniÃ¨res feuilles noire (Boots_bottines)', '0.00', '2018-04-23', 'women', '5fbf0a20fc73ad5a8b25fd97e6123377.jpg', 'LH', 0, 0),
(485, 'Bottines unies Ã  talon (Boots_bottines)', '0.00', '2018-04-23', 'women', 'c8e94f3a7218c80c63a3b82eed05a5c6.jpg', 'LH', 0, 0),
(486, 'Bottines vernies unies Ã  lacets (Boots_bottines)', '0.00', '2018-04-23', 'women', '537caf8b5b83201f9d1988ad87f45140.jpg', 'N/A', 0, 0),
(487, 'Bottes cavaliÃ¨res unies Ã  laÃ§age (Bottes)', '0.00', '2018-04-23', 'women', '2d640fd1c99b9ab51fb4b096f710c9fc.jpg', 'MISS LEBERTO', 0, 0),
(488, 'Bottes cuissardes unies (Bottes)', '0.00', '2018-04-23', 'women', '4c1c179bbe1436198f9368051fad0406.jpg', 'LH', 0, 0),
(489, 'bottes (Bottes)', '0.00', '2018-04-23', 'women', 'a5b627fb0b2b9dfdd648e9df261f9579.jpg', 'DI FONTANA', 0, 0),
(490, 'Baskets basses en toile (Chaussures Ã  lacets)', '0.00', '2018-04-23', 'women', '3fe88ae7dbd3b9e4d6a465b1982173c6.jpg', 'LH', 0, 0),
(491, 'Derbies en suÃ©dine unie (Chaussures Ã  lacets)', '0.00', '2018-04-23', 'women', '556219d60a70e885407bbe6714f998b8.jpg', 'LH', 0, 0),
(492, 'Derbies vernis Ã  lacet (Chaussures Ã  lacets)', '0.00', '2018-04-23', 'women', 'e202d4974be54fbee7c03c6711f138bf.jpg', 'LH', 0, 0),
(493, 'Baskets running LITE RACER (Chaussures de sport)', '0.00', '2018-04-23', 'women', '3a96b3a5ba0f40e5a9026835271c44e0.jpg', 'ADIDAS', 0, 0),
(494, 'Running Adidas QT RACER (Chaussures de sport)', '0.00', '2018-04-23', 'women', 'be0c9ba6840bd82929fbfbb9ab6bf846.jpg', 'ADIDAS', 0, 0),
(495, 'Running Nike TANJUN (Chaussures de sport)', '0.00', '2018-04-23', 'women', '1e6fcadd1ed2d6dceda524e9a402a445.jpg', 'NIKE', 0, 0),
(496, 'Runnings Puma PACER NEXT CAGE (Chaussures de sport)', '0.00', '2018-04-23', 'women', '3707ee5cf5843846364548b0a179d337.jpg', 'PUMA', 0, 0),
(497, 'Tennis imprimÃ© cavaleras multicolores (Chaussures en toile)', '0.00', '2018-04-23', 'women', '80f51dc68ca0f9ff9a636326d6bf29d1.jpg', 'CREEKS', 0, 0),
(498, 'Tennis pailletÃ©es arc-en-ciel (Chaussures en toile)', '0.00', '2018-04-23', 'women', 'a4ef9cd0cf16476473f919fc1fca16f9.jpg', 'CREEKS', 0, 0),
(499, 'Tennis unies en toile (Chaussures en toile)', '0.00', '2018-04-23', 'women', '925527e62962d4876ce526f90fb2d0b4.jpg', 'LH', 0, 0),
(500, 'Ballerines Sans-gÃ¨nes ajourÃ©s (Chaussures sans lacet)', '0.00', '2018-04-23', 'women', 'ab32bc096c7355a600e5b327159aaf7e.jpg', 'CONFORTISSIMO', 0, 0),
(501, 'Chaussures emboitantes en cuir (Chaussures sans lacet)', '0.00', '2018-04-23', 'women', '1021f6caef25e7b5ba8559972835408a.jpg', 'CONFORTISSIMO', 0, 0),
(502, 'Escarpins emboitants finition plissÃ©e (Chaussures sans lacet)', '0.00', '2018-04-23', 'women', '6f6e6ad72822f4bf49a7f0e018a27f7c.jpg', 'DI FONTANA', 0, 0),
(503, 'Mocassins compensÃ©s (Chaussures sans lacet)', '0.00', '2018-04-23', 'women', '0084cbb081e3ccac59cb84704b8fcbf3.jpg', 'CONFORTISSIMO', 0, 0),
(504, 'sabots noire (Sabots)', '0.00', '2018-04-23', 'women', '39d4848f966f73e7d96b2376f89fbee9.jpg', 'SOFTAISE', 0, 0),
(505, 'Sabots pointillÃ©s emboutis (Sabots)', '0.00', '2018-04-23', 'women', '6277c0714cc1d42aa7d6fe2d23491cee.jpg', 'SOFTAISE', 0, 0),
(506, 'sabots rouge SOFTAISE (Sabots)', '0.00', '2018-04-23', 'women', 'cd6ed4b4d61a3cde6efb96695f101032.jpg', 'SOFTAISE', 0, 0),
(507, 'Chemise ample base resserrÃ©e (Chemisier, tunique)', '0.00', '2018-04-23', 'women', '4cf32cee2592f24f7fcfeb3964939b52.jpg', 'MISS LEBERTO', 0, 0),
(508, 'Chemise grand-pÃ¨re 100% coton volantÃ©e (Chemisier, tunique)', '0.00', '2018-04-23', 'women', '4da5ba1ba1edf0589fb2730d28c297be.jpg', 'CREEKS', 0, 0),
(509, 'Chemise imprimÃ©e droite nouÃ©e (Chemisier, tunique)', '0.00', '2018-04-23', 'women', '62abdd588f1d93d6db4125a46aee48d0.jpg', 'MISS LEBERTO', 0, 0),
(510, 'Chemise unie zippÃ©e manches (Chemisier, tunique)', '0.00', '2018-04-23', 'women', '1dd18e4208ea9f4f78f92f6add25023c.jpg', 'MOSQUITOS', 0, 0),
(511, 'Chemisier jean stone (Chemisier, tunique)', '0.00', '2018-04-23', 'women', '4ae10046c1570b3e2bd4bd64ed8519f6.jpg', 'CREEKS', 0, 0),
(512, 'Gilet maternitÃ© uni (Grossesse)', '0.00', '2018-04-23', 'women', '721eae6d75fdca5e40f03df1d9c975b0.jpg', 'MATERNITE', 0, 0),
(513, 'Pull long maternitÃ© imprimÃ© (Grossesse)', '0.00', '2018-04-23', 'women', '977c9fc5202d762c246b5ec7a00dbdb2.jpg', 'MATERNITE', 0, 0),
(514, 'Pull maternitÃ© imprimÃ© avec dentelle (Grossesse)', '0.00', '2018-04-23', 'women', '45f222aa6eac574dbff369cf4ead9fdb.jpg', 'MATERNITE', 0, 0),
(515, 'Tee-shirt grossesse imprimÃ© manches volantÃ©es (Grossesse)', '0.00', '2018-04-23', 'women', '8795d8792d983f464bc6a1ed15450378.jpg', 'MATERNITE ', 0, 0),
(516, 'T-shirt grossesse manches courtes uni (Grossesse)', '0.00', '2018-04-23', 'women', '6c10016b2eaed68f96c89c11775628b1.jpg', 'MATERNITE', 0, 0),
(517, 'Jean coupe slim (jean)', '0.00', '2018-04-23', 'women', '0b17b1a886af4a7c1a4b0ca1e61645ff.jpg', 'LH', 0, 0),
(518, 'Jean (jean)', '0.00', '2018-04-23', 'women', 'a17f363215c3b7fc0e21fc7a6ead817b.jpg', 'MISS LEBERTO', 0, 0),
(519, 'Jean skinny dÃ©lavÃ© (jean)', '0.00', '2018-04-23', 'women', '5fabe99e68420c303d287a0f31b601f8.jpg', 'LH', 0, 0),
(520, 'Jean skinny taille haute  (jean)', '0.00', '2018-04-23', 'women', 'ab857c13a9c530ffdfdafbe8245f546a.jpg', 'LH', 0, 0),
(521, 'Jean skinny used (jean)', '0.00', '2018-04-23', 'women', 'e9ee289d7321e393f4d2e89062c3097b.jpg', 'CREEKS', 0, 0),
(522, 'Jean slim 5 poches (jean)', '0.00', '2018-04-23', 'women', 'c1ba3277e69b5b99edfb90f4b70dc881.jpg', 'CREEKS', 0, 0),
(523, 'Jean slim 5 poches (jean)', '0.00', '2018-04-23', 'women', '8e43a7b0b5244b0ab51b000163c0795c.jpg', 'MISS LEBERTO', 0, 0),
(524, 'Jean slim colorÃ© rivetÃ© (jean)', '0.00', '2018-04-23', 'women', '6eb9b68f4d87c388d1424853da107094.jpg', 'LADY BLUSH', 0, 0),
(525, 'Jean slim imprimÃ© coton stretch (jean)', '0.00', '2018-04-23', 'women', '1fe78cff1d45dacdea3ba92e1e406e4a.jpg', 'MOSQUITOS', 0, 0),
(526, 'Jean slim poches perles (jean)', '0.00', '2018-04-23', 'women', 'dcfc48a9e706b33f7c06fcd97f4a989f.jpg', 'MOSQUITOS', 0, 0),
(527, 'Jean slim sequins destroy (jean)', '0.00', '2018-04-23', 'women', '44aafef23521ffadb5fa71a93bd68886.jpg', 'MOSQUITOS', 0, 0),
(528, 'Jean stone bootcut (jean)', '0.00', '2018-04-23', 'women', 'e845b061380120a6f869b5148e2a73c3.jpg', 'LH', 0, 0),
(529, 'Jegging denim uni (jean)', '0.00', '2018-04-23', 'women', 'bd998cd653b14f05c913f4784c2bcc0d.jpg', 'PUR ET SIMPLE', 0, 0),
(530, 'Jupe beige (jupe,short)', '0.00', '2018-04-23', 'women', '045375b3e83c395bbc67c7ed5c0bfc02.jpg', 'LH', 0, 0),
(531, 'Jupe (jupe,short)', '0.00', '2018-04-23', 'women', '3a6eba9d16ff6276d44658ce1e201234.jpg', 'MISS LEBERTO', 0, 0),
(532, 'Jupe noir (jupe,short)', '0.00', '2018-04-23', 'women', '731a2341f29857340eb7d73559882cde.jpg', 'LH', 0, 0),
(533, 'Jupe paper bag fluide (jupe,short)', '0.00', '2018-04-23', 'women', 'd904d01c31e3a19b70c7edbe42abc99c.jpg', 'LADY BLUSH', 0, 0),
(534, 'Jupe patineuse fleurie (jupe,short)', '0.00', '2018-04-23', 'women', 'ae838267830de729f4c219ce34121813.jpg', 'LH', 0, 0),
(535, 'Blouson court esprit motard (Manteau, doudoune, veste)', '0.00', '2018-04-23', 'women', 'd597ccd27e5065cd292a536ada070514.jpg', 'LH', 0, 0),
(536, 'Blouson uni effet suÃ©dÃ© (Manteau, doudoune, veste)', '0.00', '2018-04-23', 'women', '23aec3f2050de83d022b475ad3c31cca.jpg', 'CREEKS', 0, 0),
(537, 'veste noire cuir (Manteau, doudoune, veste)', '0.00', '2018-04-23', 'women', '357b6a2c2b93b604bc525cecb2253460.jpg', 'MISS LEBERTO', 0, 0),
(538, 'Trench coton mi-long en jean (Manteau, doudoune, veste)', '0.00', '2018-04-23', 'women', '118b6fb3bb32c16b8da175fb8e3751f6.jpg', 'LADY BLUSH', 0, 0),
(539, 'Trench court uni fermeture croisÃ©e (Manteau, doudoune, veste)', '0.00', '2018-04-23', 'women', '3422b10a7765af8d90b79eeba5d3b5a9.jpg', 'LH', 0, 0),
(540, 'Veste de tailleur imprimÃ©e (Manteau, doudoune, veste)', '0.00', '2018-04-23', 'women', 'a7f2a96d05c503665103467c937568a5.jpg', 'MOSQUITOS', 0, 0),
(541, 'Veste imprimÃ©e Ã  franges (Manteau, doudoune, veste)', '0.00', '2018-04-23', 'women', '7c51df3f7603d586eeed56616a49fabb.jpg', 'MISS LEBERTO', 0, 0),
(542, 'Veste maille cintrÃ©e col crantÃ© (Manteau, doudoune, veste)', '0.00', '2018-04-23', 'women', 'b66d80ec52350d6d2f93fbe155a3ed25.jpg', 'MISS LEBERTO', 0, 0),
(543, 'Pantalon chinÃ© coupe carotte (Pantalon, legging)', '0.00', '2018-04-23', 'women', 'df1e5131b1fc5663cdae5d76cd7b4388.jpg', 'PUR ET SIMPLE', 0, 0),
(544, 'Pantalon fluide Ã  pinces (Pantalon, legging)', '0.00', '2018-04-23', 'women', 'b32050f5a84a589507813c649e3605b8.jpg', 'LH', 0, 0),
(545, 'Pantalon maille ajustÃ© (Pantalon, legging)', '0.00', '2018-04-23', 'women', '464524f0e16ca54ec80256e3e1848306.jpg', 'LH', 0, 0),
(546, 'Pantalon paper bag Ã  pinces (Pantalon, legging)', '0.00', '2018-04-23', 'women', 'fd25eae301ce8894774b072cf8a58364.jpg', 'LH', 0, 0),
(547, 'Pantalon skinny Ã  poches zippÃ©es (Pantalon, legging)', '0.00', '2018-04-23', 'women', '30e348c7d97d15e90ed11417ecd6b9b9.jpg', 'CREEKS', 0, 0),
(548, 'Pantalon slim prince de Galles (Pantalon, legging)', '0.00', '2018-04-23', 'women', '70956f922defef36a82f0ecd886d30ba.jpg', 'LADY BLUSH', 0, 0),
(549, 'Pantalon slim uni  (2) (Pantalon, legging)', '0.00', '2018-04-23', 'women', 'c2e531a18787723e041ecbd92aea38e7.jpg', 'LH', 0, 0),
(550, 'Pantalon slim uni  (Pantalon, legging)', '0.00', '2018-04-23', 'women', '69a04816cf9fef011ac047808477579e.jpg', 'N/A', 0, 0),
(551, 'Pantalon slim uni red (Pantalon, legging)', '0.00', '2018-04-23', 'women', '87cd2134c70324fae3849455a0479eed.jpg', 'LH', 0, 0),
(552, 'DÃ©shabillÃ© imprimÃ© longues manches peignoir (Peignoir, robe de chambre)', '0.00', '2018-04-23', 'women', '2a207682b4228e9e01bbc3bc29a20237.jpg', 'MOSQUITOS', 0, 0),
(553, 'Peignoir Ã  capuche uni (Peignoir, robe de chambre)', '0.00', '2018-04-23', 'women', '54b66088dd7291ab44e62b2d9c61852d.jpg', 'LH', 0, 0),
(554, 'Peignoir Ã  manches longues Constance (Peignoir, robe de chambre)', '0.00', '2018-04-23', 'women', '25e4c291cff2bd9ba327a6c827f6e4c3.jpg', 'LH', 0, 0),
(555, 'Peignoir Ã  pois Western (Peignoir, robe de chambre)', '0.00', '2018-04-23', 'women', '07f75d15bb156b8b27aa1b59a3bd0e9a.jpg', 'LH', 0, 0),
(556, 'peignoir leopard avec poches 2 (Peignoir, robe de chambre)', '0.00', '2018-04-23', 'women', '0be56ba83d1fd18e6035e461a6944c70.jpg', 'LH', 0, 0),
(557, 'Cardigan maille gaufrÃ©e (pull,gillet,sweat)', '0.00', '2018-04-23', 'women', 'a3a1360d9e757ede1875e913bf81ce7c.jpg', 'LH', 0, 0),
(558, 'Cardigan mi-long poches plaquÃ©es (pull,gillet,sweat)', '0.00', '2018-04-23', 'women', 'ca3dc149b990c44ea2613a5413e76581.jpg', 'LH', 0, 0),
(559, 'Gilet uni en coton (pull,gillet,sweat)', '0.00', '2018-04-23', 'women', '87ead23e0d8c2053cd1fcf20a6b53a6a.jpg', 'CREEKS', 0, 0),
(560, 'Pull fluide asymÃ©trique laine mÃ©langÃ©e (pull,gillet,sweat)', '0.00', '2018-04-23', 'women', '4e51fe011a086c2bc080a44235b88b64.jpg', 'LH', 0, 0),
(561, 'Sweat Ã  capuche zippÃ© vintage (pull,gillet,sweat)', '0.00', '2018-04-23', 'women', '7d381ed8879cd68714c47fa33bb8d871.jpg', 'LH', 0, 0),
(562, 'Sweat imprimÃ© Ã  capuche (pull,gillet,sweat)', '0.00', '2018-04-23', 'women', 'e499193ce0f7271272dcd5c9bf8e8f20.jpg', 'CREEKS', 0, 0),
(563, 'Pyjama 2 piÃ¨ces avec imprimÃ© (Pyjama)', '0.00', '2018-04-23', 'women', 'd33de683112b6a4cb05ddfad5567901f.jpg', 'LH', 0, 0),
(564, 'Pyjama en coton (Pyjama)', '0.00', '2018-04-23', 'women', 'c8ee36e0a3fe119980e8cd56220e704f.jpg', 'LH', 0, 0),
(565, 'Pyjama long motif gÃ©omÃ©trique (Pyjama)', '0.00', '2018-04-23', 'women', '391d2d2c160975968a292024a863db38.jpg', 'LH', 0, 0),
(566, 'Pyjama t-shirt legging rayÃ© (Pyjama)', '0.00', '2018-04-23', 'women', '3ae72ea74870f51f80271e4e1a56ccad.jpg', 'LH', 0, 0),
(567, 'Pyjashort dentelle et motifs pyjama (Pyjama)', '0.00', '2018-04-23', 'women', '0b207a1a743f91cca16efe9af5fc77c5.jpg', 'LH', 0, 0),
(568, 'T-shirt de nuit avec imprimÃ©s (Pyjama)', '0.00', '2018-04-23', 'women', '7d0c25e7be734f5894a30e1da10fb387.jpg', 'MISS LEBERTO', 0, 0),
(569, 'Robe boutonnÃ©e Ã©vasÃ©e (Robe)', '0.00', '2018-04-23', 'women', 'e9e50b0f9ee78786255e6fe5292c8031.jpg', 'CREEKS', 0, 0),
(570, 'Robe ceinturÃ©e avec poches (Robe)', '0.00', '2018-04-23', 'women', '4d81e3ca4ad3f491e45a15bfe9ffbafc.jpg', 'LADY BLUSH', 0, 0),
(571, 'Robe imprimÃ©e touches transparentes (Robe)', '0.00', '2018-04-23', 'women', '94121fb8a290dfd432aebf5d8d1f2346.jpg', 'LADY BLUSH', 0, 0),
(572, 'Robe maille Ã  bretelles (Robe)', '0.00', '2018-04-23', 'women', '05c9fa8097cab2d6249ba4d02aa7d5fc.jpg', 'LH', 0, 0),
(573, 'Robe motif gÃ©omÃ©trique bicolore (Robe)', '0.00', '2018-04-23', 'women', 'afd095fe6e572c6cb5600e1855d48b93.jpg', 'CREEKS', 0, 0),
(574, 'Blouse fluide imprimÃ©e touches dentelle (T-shirt, dÃ©bardeur)', '0.00', '2018-04-23', 'women', '09f0f7e2f0fa10afcf7b468a997db363.jpg', 'LH', 0, 0),
(575, 'Robe fleurie esprit chemise (T-shirt, dÃ©bardeur)', '0.00', '2018-04-23', 'women', '68e5b4867874f53a5697a8b30dd11da3.jpg', 'MISS LIBERTO', 0, 0),
(576, 'Tee-shirt uni avec dentelle (T-shirt, dÃ©bardeur)', '0.00', '2018-04-23', 'women', '15bce4074918054e0f2d8fb595f538c9.jpg', 'LADY BLUSH', 0, 0),
(577, 'T-shirt mariniÃ¨re Ã  manches longues (T-shirt, dÃ©bardeur)', '0.00', '2018-04-23', 'women', '1dd963c0e83a9f4f54d2d7a3e4e3a540.jpg', 'LH', 0, 0),
(578, 'T-shirt uni avec imprimÃ© devant (T-shirt, dÃ©bardeur)', '0.00', '2018-04-23', 'women', '4b069cfbd85060126d67dd82cac230cb.jpg', 'CREEKS', 0, 0),
(579, 'T-shirt uni grand volant (T-shirt, dÃ©bardeur)', '0.00', '2018-04-23', 'women', '7db5cda8f9cc95a864a13536c6d744e8.jpg', 'CREEKS', 0, 0),
(580, 'T-shirt zippÃ© dos dentelle 2 (T-shirt, dÃ©bardeur)', '0.00', '2018-04-23', 'women', '6b312fd33e5e87004c0fa98cbceed488.jpg', 'LH', 0, 0),
(581, 'T-shirt zippÃ© dos dentelle (T-shirt, dÃ©bardeur)', '0.00', '2018-04-23', 'women', '6712acac569e035361eb21ac96567ff9.jpg', 'LH', 0, 0),
(582, 'CaleÃ§on maille avec imprimÃ© sport (VÃªtements sport)', '0.00', '2018-04-23', 'women', 'a8f09aeb741aed7e7051e0e53beeb81e.jpg', 'TROIS25', 0, 0),
(583, 'DÃ©bardeur sport 2-en-1 (VÃªtements sport)', '0.00', '2018-04-23', 'women', '2d1d5cd7665518d953b70a4327a8bdfa.jpg', 'LH', 0, 0),
(584, 'DÃ©bardeur sport bicolore (VÃªtements sport)', '0.00', '2018-04-23', 'women', 'bb8f793e4968df66b5f6c5fe2b80381f.jpg', 'LH', 0, 0),
(585, 'Pantalon de jogging chinÃ© sport (VÃªtements sport)', '0.00', '2018-04-23', 'women', 'a653628abe29260b5d24c740f50fcb8f.jpg', 'TROIS25', 0, 0),
(586, 'Sweat chinÃ© col boule sport (VÃªtements sport)', '0.00', '2018-04-23', 'women', '693a801d4f0480820c20cc36c05b8343.jpg', 'TROIS25', 0, 0),
(587, 'Sweat court sport (VÃªtements sport)', '0.00', '2018-04-23', 'women', '8da2b9143544a0234350d178b706f19a.jpg', 'TROIS25', 0, 0),
(588, 'T-shirt dÃ©colletÃ© dans le dos sport (VÃªtements sport)', '0.00', '2018-04-23', 'women', 'faea66a1c9f3b8c02e685f877a2cf69e.jpg', 'TROIS25', 0, 0),
(589, 'Veste Ã  capuche sans manches sport (VÃªtements sport)', '0.00', '2018-04-23', 'women', '28c7a3d1d56e5adeedf4bc3ca8c7b1b4.jpg', 'TROIS25', 0, 0),
(590, 'Base de teint Anti-rougeurs HypoallergÃ©nique', '0.00', '2018-04-23', 'women', '83ce37c53315dc42f7e23233a1eaa614.jpg', 'BELL', 0, 0),
(591, 'BB CrÃ¨me Effet Peau Nue', '0.00', '2018-04-23', 'women', '604527a9800b60fb45c680585eaf4a9d.jpg', 'BYS', 0, 0),
(592, 'BB CrÃ¨me Peau Sensible HypoallergÃ©nique', '0.00', '2018-04-23', 'women', '013f71642a7c14ec9770f67fad58d9ec.jpg', 'BELL', 0, 0),
(593, 'Crayon Essentiel', '0.00', '2018-04-23', 'women', '4856e30cc5f272f43b0e2bbef37326da.jpg', 'LOL', 0, 0),
(594, 'Duo de Limes Ã  Ongles en MÃ©tal', '0.00', '2018-04-23', 'women', 'a7de14db942f9d5ab3e33248d9955137.jpg', 'N/A', 0, 0),
(595, 'Eau de Parfum Change Woman 50ml', '0.00', '2018-04-23', 'women', '9576f8c937f7ca853b4c8d4650c3c1ad.jpg', 'N/A', 0, 0),
(596, 'EAU DE PARFUM INTENSE VAPORISATEUR channel', '0.00', '2018-04-23', 'women', 'ef64f0426d584a968a13db5d82cbea2f.jpg', 'N/A', 0, 0),
(597, 'Eau de Parfum Vivo Glam 50ml', '0.00', '2018-04-23', 'women', '528a1f61281e01a83120b177fdcff697.jpg', 'N/A', 0, 0),
(598, 'Flower By Kenzo Eau de Toilette', '0.00', '2018-04-23', 'women', 'ef8e47ce7a0f876c2f185b6c9d51913a.jpg', 'N/A', 0, 0),
(599, 'Fond de Teint Essentiel', '0.00', '2018-04-23', 'women', 'eb6b4ba5e6cbe633b833630d29330a96.jpg', 'N/A', 0, 0),
(600, 'Gucci parfum bloom', '0.00', '2018-04-23', 'women', '1a81f07dcd339743046d0b370bd712e9.jpg', 'N/A', 0, 0),
(601, 'Hugo Boss parfum', '0.00', '2018-04-23', 'women', '33bf65a8499828dfccb263a6df334dc4.jpg', 'N/A', 0, 0),
(602, 'Lime PÃ©dicure Anti-CallositÃ©s', '0.00', '2018-04-23', 'women', 'b34926a47a76082a33bd37d51e0b2c04.jpg', 'N/A', 0, 0),
(603, 'my-sweet-lips-04_2', '0.00', '2018-04-23', 'women', 'beae475e4d787019659ac4e51c5cb5af.jpg', 'N/A', 0, 0),
(604, 'Palette 20 Fards Ã  paupiÃ¨res Festival', '0.00', '2018-04-23', 'women', 'f740e04107ce1fec9ee474460e0c6cc6.jpg', 'N/A', 0, 0),
(605, 'Parfum Paradiso 15ml', '0.00', '2018-04-23', 'women', '559650d3a817d619430acacf07ba72a1.jpg', 'N/A', 0, 0),
(606, 'Polissoir', '0.00', '2018-04-23', 'women', '243dafa7e248c6e90cc13b450f092d55.jpg', 'N/A', 0, 0),
(607, 'Poudre Libre Transparente', '0.00', '2018-04-23', 'women', 'e9b126f1a0574665d2c3b4d444e0dab5.jpg', 'N/A', 0, 0),
(608, 'Rouge Ã  LÃ¨vres & Gloss Duo', '0.00', '2018-04-23', 'women', 'e8f341b1f2f95cae3e135c77528a86dc.jpg', 'N/A', 0, 0),
(609, 'Rouge Ã  LÃ¨vres Essentiel Mat', '0.00', '2018-04-23', 'women', 'be5b3c192a8a8c82cb7ec984e8987e29.jpg', 'N/A', 0, 0),
(610, 'Rouge Ã  LÃ¨vres Liquide Mat Ã‰dition LimitÃ©e', '0.00', '2018-04-23', 'women', 'bfcf24ef0e54db252ba90902942bf658.jpg', 'N/A', 0, 0),
(611, 'Stick Ombre Ã  PaupiÃ¨res MÃ©tallique', '0.00', '2018-04-23', 'women', '676c7211605ef48a8c8acd71232f31a8.jpg', 'N/A', 0, 0),
(612, 'Vernis Ã  Ongles LaquÃ©s', '0.00', '2018-04-23', 'women', '3acf2eef84e5c82612288e6cdbc05b3d.jpg', 'N/A', 0, 0),
(613, 'Vernis Gel', '0.00', '2018-04-23', 'women', 'c131141064f3a4c50091f8ae0ff32c0a.jpg', 'N/A', 0, 0),
(614, 'Cabas motifs dÃ©co ajourÃ©s (Cabas)', '0.00', '2018-04-23', 'women', 'c6730c5448d6a50130f8068cfc1c1080.jpg', 'LH', 0, 0);
INSERT INTO `item` (`Id`, `Name`, `UnitPrice`, `AddDate`, `Gender`, `ImageFileName`, `Brand`, `Promotion_%`, `ranking`) VALUES
(615, 'cabas noire (Cabas)', '0.00', '2018-04-23', 'women', '7158d56a5ef19558e3fff802f6769b12.jpg', 'LH', 0, 0),
(616, 'Sac cabas motifs pop (Cabas)', '0.00', '2018-04-23', 'women', 'dcff725d4e5b86471783cbd2e3080f7c.jpg', 'LH', 0, 0),
(617, 'Sac cabas triangles hypnotiques (Cabas)', '0.00', '2018-04-23', 'women', 'c6b37f89af3c5cd54f107869f4725bfd.jpg', 'LH', 0, 0),
(618, 'sac Ã  dos argent (Sac Ã  dos)', '0.00', '2018-04-23', 'women', 'f4adc4b5226c9bf9085a7e921d6a36ed.jpg', 'LH', 0, 0),
(619, 'Sac Ã  dos uni (Sac Ã  dos)', '0.00', '2018-04-23', 'women', '4f1e548d0fd0a37b1f40e451c537fde6.jpg', 'LH', 0, 0),
(620, 'Cabas 2 anses bicolore (Sac Ã  main)', '0.00', '2018-04-23', 'women', '163595af7eb4f1a8dae48d28ec0fca91.jpg', 'A BY ANDRE ', 0, 0),
(621, 'Sac Ã  main 3 compartiments (Sac Ã  main)', '0.00', '2018-04-23', 'women', '78d4492e1dff3fb7474654dc969dd4f7.jpg', 'LH', 0, 0),
(622, 'Sac Ã  main fantaisie (Sac Ã  main)', '0.00', '2018-04-23', 'women', '2ff595c52618020d496b3a1c6e1f2a65.jpg', 'LH', 0, 0),
(623, 'sac Ã  main gold (Sac Ã  main)', '0.00', '2018-04-23', 'women', '17f28be517ff4d1d0a2198285b0fe669.jpg', 'LH', 0, 0),
(624, 'Sac besace avec floches (Sac Ã  main)', '0.00', '2018-04-23', 'women', 'f6117cf24f931e0acf814cb53a27904e.jpg', 'LH', 0, 0),
(625, 'Sac cabas imprimÃ© fleuri (Sac Ã  main)', '0.00', '2018-04-23', 'women', 'dc71f7fb8c487bda939d7a1d7ccc12f5.jpg', 'LH', 0, 0),
(626, 'Sac imprimÃ© avec 2 anses (Sac Ã  main)', '0.00', '2018-04-23', 'women', '6dbadaaa85726d55460bbd7a6f2a1a3b.jpg', 'LH ', 0, 0),
(627, 'Sac petit format multicolore (Sac Ã  main)', '0.00', '2018-04-23', 'women', 'a1c40978cd8c34d19cffed16b7be2d4a.jpg', 'LH', 0, 0),
(628, 'Sac seau triangle bicolore (Sac Ã  main)', '0.00', '2018-04-23', 'women', '87594c09efe256a52cbe584097105957.jpg', 'LH', 0, 0),
(629, 'Sac polochon uni (sac de sport)', '0.00', '2018-04-23', 'women', '85fece9871241adc6012f5dc693e0c84.jpg', 'LH', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemcategorybysize`
--

CREATE TABLE `itemcategorybysize` (
  `Id` int(11) NOT NULL,
  `Item_Id` int(11) NOT NULL,
  `Caterogy` varchar(20) NOT NULL,
  `SubCategory` varchar(20) NOT NULL,
  `Qte_NOSIZE` int(5) NOT NULL DEFAULT '0',
  `Qte_xs` int(5) NOT NULL DEFAULT '0',
  `Qte_s` int(5) NOT NULL DEFAULT '0',
  `Qte_m` int(5) NOT NULL DEFAULT '0',
  `Qte_l` int(5) NOT NULL DEFAULT '0',
  `Qte_xl` int(5) NOT NULL DEFAULT '0',
  `Qte_xxl` int(5) NOT NULL DEFAULT '0',
  `Qte_xxxl` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itemcategorybysize`
--

INSERT INTO `itemcategorybysize` (`Id`, `Item_Id`, `Caterogy`, `SubCategory`, `Qte_NOSIZE`, `Qte_xs`, `Qte_s`, `Qte_m`, `Qte_l`, `Qte_xl`, `Qte_xxl`, `Qte_xxxl`) VALUES
(234, 240, 'Accessories', '', 104, 0, 1, 2, 3, 4, 5, 6),
(235, 241, 'Accessories', '', 12, 0, 1, 2, 3, 4, 5, 6),
(236, 242, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(237, 243, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(238, 244, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(239, 245, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(240, 246, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(241, 247, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(242, 248, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(243, 249, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(244, 250, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(245, 251, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(246, 252, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(247, 253, 'Accessories', '', 10, 0, 1, 2, 3, 4, 5, 6),
(248, 254, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(249, 255, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(250, 256, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(251, 257, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(252, 258, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(253, 259, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(254, 260, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(255, 261, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(256, 262, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(257, 263, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(258, 264, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(259, 265, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(260, 266, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(261, 267, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(263, 269, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(264, 270, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(265, 271, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(266, 272, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(267, 273, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(268, 274, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(269, 275, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(270, 276, 'Sunglasses', '', 10, 0, 1, 2, 3, 4, 5, 6),
(271, 277, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(272, 278, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(273, 279, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(274, 280, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(275, 281, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(276, 282, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(277, 283, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(278, 284, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(279, 285, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(280, 286, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(281, 287, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(282, 288, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(283, 289, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(284, 290, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(285, 291, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(286, 292, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(287, 293, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(288, 294, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(289, 295, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(290, 296, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(291, 297, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(292, 298, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(293, 299, 'Watches', '', 10, 0, 1, 2, 3, 4, 5, 6),
(297, 303, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(298, 304, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(299, 305, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(300, 306, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(301, 307, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(302, 308, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(303, 309, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(304, 310, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(306, 312, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(307, 313, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(308, 314, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(309, 315, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(310, 316, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(311, 317, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(312, 318, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(313, 319, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(314, 320, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(315, 321, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(316, 322, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(317, 323, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(318, 324, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(319, 325, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(320, 326, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(321, 327, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(322, 328, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(323, 329, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(324, 330, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(325, 331, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(326, 332, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(327, 333, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(328, 334, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(329, 335, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(330, 336, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(331, 337, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(332, 338, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(333, 339, 'Footware', '', 10, 0, 1, 2, 3, 4, 5, 6),
(334, 340, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(335, 341, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(336, 343, 'Clothing', '', 0, 2, 3, 4, 3, 5, 5, 4),
(337, 344, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(338, 345, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(339, 346, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(340, 347, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(342, 349, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(343, 350, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(344, 351, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(345, 352, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(346, 353, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(347, 354, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(348, 355, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(349, 356, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(350, 357, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(351, 358, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(352, 359, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(353, 360, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(354, 361, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(355, 362, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(356, 363, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(357, 364, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(358, 365, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(359, 366, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(360, 367, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(361, 368, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(362, 369, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(363, 370, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(364, 371, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(365, 372, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(366, 373, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(367, 374, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(368, 375, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(369, 376, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(370, 377, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(371, 378, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(372, 379, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(373, 380, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(374, 381, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(375, 382, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(376, 383, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(377, 384, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(378, 385, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(379, 386, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(380, 387, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(381, 388, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(382, 389, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(383, 390, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(384, 391, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(385, 392, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(386, 393, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(387, 394, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(389, 396, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(390, 397, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(391, 398, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(392, 399, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(393, 400, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(394, 401, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(395, 402, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(396, 403, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(397, 404, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(398, 405, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(399, 406, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(400, 407, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(402, 409, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(403, 410, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(404, 411, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(405, 412, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(406, 413, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(407, 414, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(408, 415, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(409, 416, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(410, 417, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(411, 418, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(412, 419, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(413, 420, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(414, 421, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(415, 422, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(416, 423, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(417, 424, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(418, 425, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(419, 426, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(420, 427, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(421, 428, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(422, 429, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(423, 430, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(424, 431, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(425, 432, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(426, 433, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(427, 434, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(428, 435, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(429, 436, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(430, 437, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(431, 438, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(432, 439, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(433, 440, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(434, 441, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(435, 442, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(436, 443, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(437, 444, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(438, 445, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(439, 446, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(440, 447, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(441, 448, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(442, 449, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(443, 450, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(444, 451, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(445, 452, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(446, 453, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(447, 454, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(448, 455, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(449, 456, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(450, 457, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(451, 458, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(452, 459, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(453, 460, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(454, 461, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(455, 462, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(456, 463, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(457, 464, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(458, 465, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(459, 466, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(460, 467, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(461, 468, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(462, 469, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(463, 470, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(464, 471, 'Accessories', '', 0, 0, 1, 2, 3, 4, 5, 6),
(465, 472, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(466, 473, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(467, 474, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(468, 475, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(469, 476, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(470, 477, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(471, 478, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(472, 479, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(473, 480, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(474, 481, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(475, 482, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(476, 483, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(477, 484, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(478, 485, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(479, 486, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(480, 487, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(481, 488, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(482, 489, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(483, 490, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(484, 491, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(485, 492, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(486, 493, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(487, 494, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(488, 495, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(489, 496, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(490, 497, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(491, 498, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(492, 499, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(493, 500, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(494, 501, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(495, 502, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(496, 503, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(497, 504, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(498, 505, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(499, 506, 'Footware', '', 0, 0, 1, 2, 3, 4, 5, 6),
(500, 507, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(501, 508, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(502, 509, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(503, 510, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(504, 511, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(505, 512, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(506, 513, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(507, 514, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(508, 515, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(509, 516, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(510, 517, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(511, 518, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(512, 519, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(513, 520, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(514, 521, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(515, 522, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(516, 523, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(517, 524, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(518, 525, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(519, 526, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(520, 527, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(521, 528, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(522, 529, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(523, 530, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(524, 531, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(525, 532, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(526, 533, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(527, 534, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(528, 535, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(529, 536, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(530, 537, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(531, 538, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(532, 539, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(533, 540, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(534, 541, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(535, 542, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(536, 543, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(537, 544, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(538, 545, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(539, 546, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(540, 547, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(541, 548, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(542, 549, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(543, 550, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(544, 551, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(545, 552, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(546, 553, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(547, 554, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(548, 555, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(549, 556, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(550, 557, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(551, 558, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(552, 559, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(553, 560, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(554, 561, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(555, 562, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(556, 563, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(557, 564, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(558, 565, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(559, 566, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(560, 567, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(561, 568, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(562, 569, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(563, 570, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(564, 571, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(565, 572, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(566, 573, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(567, 574, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(568, 575, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(569, 576, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(570, 577, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(571, 578, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(572, 579, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(573, 580, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(574, 581, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(575, 582, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(576, 583, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(577, 584, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(578, 585, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(579, 586, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(580, 587, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(581, 588, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(582, 589, 'Clothing', '', 0, 0, 1, 2, 3, 4, 5, 6),
(583, 590, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(584, 591, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(585, 592, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(586, 593, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(587, 594, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(588, 595, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(589, 596, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(590, 597, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(591, 598, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(592, 599, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(593, 600, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(594, 601, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(595, 602, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(596, 603, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(597, 604, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(598, 605, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(599, 606, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(600, 607, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(601, 608, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(602, 609, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(603, 610, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(604, 611, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(605, 612, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(606, 613, 'Beauty', '', 0, 0, 1, 2, 3, 4, 5, 6),
(607, 614, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(608, 615, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(609, 616, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(610, 617, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(611, 618, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(612, 619, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(613, 620, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(614, 621, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(615, 622, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(616, 623, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(617, 624, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(618, 625, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(619, 626, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(620, 627, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(621, 628, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6),
(622, 629, 'Bags', '', 0, 0, 1, 2, 3, 4, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `passwordrecovery`
--

CREATE TABLE `passwordrecovery` (
  `Id` int(11) NOT NULL,
  `RecoveryToken` varchar(64) NOT NULL,
  `authentification_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passwordrecovery`
--

INSERT INTO `passwordrecovery` (`Id`, `RecoveryToken`, `authentification_Id`) VALUES
(10, '04e1f78eca4dd23dbff01c58418f6b37', 69),
(14, '17ee9f484669ee04c1f866f357e6fa99', 69),
(13, '24afb3e73311ff7e82a73be4672c0916', 69),
(12, '28f4da51edff51e50c0904ff05f4cd3f', 69),
(7, '5d998fdd2abe4d37222277c68c8134a5', 69),
(17, '5dbda2769d5ea27da6088673a7f41882', 69),
(19, '6020298169ccfbb3e7ffe1226de76761', 69),
(16, '63c3cac0196e8a682e897d3d4854c9a2', 69),
(11, '8e46d1b2207505ff72f8f15af0f38f28', 69),
(20, '8ebd805aa4012f3b334c3b642cfd2246', 87),
(18, 'b5dc62d4290d2d5dc7b75462fa4fae0f', 69),
(15, 'd630ce9dd363a72266be2b79ed97e154', 69),
(9, 'd87b1901f0b3e09c523b64b904a781d2', 69);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `Id` int(11) NOT NULL,
  `authentification_Id` int(11) NOT NULL,
  `Purchased_Items` mediumtext NOT NULL,
  `Purchase_Date` date NOT NULL,
  `Payment_confirmation` tinyint(1) NOT NULL DEFAULT '0',
  `Payment_confirmation_date` date NOT NULL,
  `Purchase_QrCode_content` varchar(64) NOT NULL COMMENT 'this code is generated and it is unique for each purchase'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`Id`, `authentification_Id`, `Purchased_Items`, `Purchase_Date`, `Payment_confirmation`, `Payment_confirmation_date`, `Purchase_QrCode_content`) VALUES
(52, 87, '{\"0\" : { \"item_name\" : \"bonnet - brique \", \"item_id\" : \"240\", \"item_qte_nosize\" : \"1\", \"item_qte_xs\" : \"0\", \"item_qte_s\" : \"0\", \"item_qte_m\" : \"0\", \"item_qte_l\" : \"0\", \"item_qte_xl\" : \"0\", \"item_qte_xxl\" : \"0\", \"item_qte_xxxl\" : \"0\", \"item_price\" : \"1.00\"},\"1\" : { \"item_name\" : \"b-wildd - ceinture en cuir - marron \", \"item_id\" : \"241\", \"item_qte_nosize\" : \"1\", \"item_qte_xs\" : \"0\", \"item_qte_s\" : \"0\", \"item_qte_m\" : \"0\", \"item_qte_l\" : \"0\", \"item_qte_xl\" : \"0\", \"item_qte_xxl\" : \"0\", \"item_qte_xxxl\" : \"0\", \"item_price\" : \"1.00\"}}', '2018-04-24', 0, '0000-00-00', 'OTEyZGQ1ZWZiOWNmNzIyNTQzOTA2N2MyNTBlZWU3Yzk=');

-- --------------------------------------------------------

--
-- Table structure for table `refreshwhenchange`
--

CREATE TABLE `refreshwhenchange` (
  `Id` int(11) NOT NULL,
  `Authentification_Id` int(11) NOT NULL,
  `Refresh` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refreshwhenchange`
--

INSERT INTO `refreshwhenchange` (`Id`, `Authentification_Id`, `Refresh`) VALUES
(3, 69, 0),
(19, 87, 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `Id_` int(11) NOT NULL,
  `Authentification_Id` int(11) NOT NULL,
  `Content` varchar(64) NOT NULL,
  `StartDate` date NOT NULL,
  `ExpiryDate` date NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'if true (1) then the session is open in the browser if false (0) then otherwise .',
  `Expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`Id_`, `Authentification_Id`, `Content`, `StartDate`, `ExpiryDate`, `Status`, `Expired`) VALUES
(18, 69, 'a260708d3c7bfa50cff88a6c570baecd', '2018-04-24', '2018-06-23', 0, 0),
(62, 87, 'f27a0b19831a60fa7baa3cc27fad226a', '2018-04-24', '2018-06-23', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmpcart`
--

CREATE TABLE `tmpcart` (
  `Id` int(11) NOT NULL,
  `UserID` varchar(45) NOT NULL,
  `JsonContent` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tmpcart`
--

INSERT INTO `tmpcart` (`Id`, `UserID`, `JsonContent`) VALUES
(32, '1524512177', ''),
(33, '1524518846', ''),
(34, '1524583931', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Authentification_Id` int(11) NOT NULL,
  `ClientFullName` varchar(45) NOT NULL,
  `ResidenceCity` varchar(45) NOT NULL,
  `Phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Authentification_Id`, `ClientFullName`, `ResidenceCity`, `Phone`) VALUES
(14, 69, 'nabi zakaria ', 'Tlemcen Tlemcen city abc', '0555655100'),
(30, 87, 'Nabi Zakaria', 'Tlemcen Bensekrane city ', '0555655100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `conversation_has_user`
--
ALTER TABLE `conversation_has_user`
  ADD PRIMARY KEY (`conversation_Id`,`user_Id`),
  ADD KEY `fk_conversation_has_user_user1_idx` (`user_Id`),
  ADD KEY `fk_conversation_has_user_conversation1_idx` (`conversation_Id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `itemcategorybysize`
--
ALTER TABLE `itemcategorybysize`
  ADD PRIMARY KEY (`Id`,`Item_Id`),
  ADD KEY `fk_ItemCategoryBySize_Item1_idx` (`Item_Id`);

--
-- Indexes for table `passwordrecovery`
--
ALTER TABLE `passwordrecovery`
  ADD PRIMARY KEY (`Id`,`authentification_Id`),
  ADD UNIQUE KEY `RecoveryToken_UNIQUE` (`RecoveryToken`),
  ADD KEY `fk_PasswordRecovery_authentification1_idx` (`authentification_Id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`Id`,`authentification_Id`),
  ADD UNIQUE KEY `Purchase_QrCode_content_UNIQUE` (`Purchase_QrCode_content`),
  ADD KEY `fk_purchases_authentification1_idx` (`authentification_Id`);

--
-- Indexes for table `refreshwhenchange`
--
ALTER TABLE `refreshwhenchange`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_PersonOrder` (`Authentification_Id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Id_`,`Authentification_Id`),
  ADD UNIQUE KEY `Content_UNIQUE` (`Content`),
  ADD UNIQUE KEY `Authentification_Id` (`Authentification_Id`),
  ADD KEY `fk_Session_Authentification1_idx` (`Authentification_Id`);

--
-- Indexes for table `tmpcart`
--
ALTER TABLE `tmpcart`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UserID_UNIQUE` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`,`Authentification_Id`),
  ADD KEY `fk_User_Authentification_idx` (`Authentification_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=630;
--
-- AUTO_INCREMENT for table `itemcategorybysize`
--
ALTER TABLE `itemcategorybysize`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623;
--
-- AUTO_INCREMENT for table `passwordrecovery`
--
ALTER TABLE `passwordrecovery`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `refreshwhenchange`
--
ALTER TABLE `refreshwhenchange`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `Id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tmpcart`
--
ALTER TABLE `tmpcart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation_has_user`
--
ALTER TABLE `conversation_has_user`
  ADD CONSTRAINT `fk_conversation_has_user_conversation1` FOREIGN KEY (`conversation_Id`) REFERENCES `conversation` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conversation_has_user_user1` FOREIGN KEY (`user_Id`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `itemcategorybysize`
--
ALTER TABLE `itemcategorybysize`
  ADD CONSTRAINT `fk_ItemCategoryBySize_Item1` FOREIGN KEY (`Item_Id`) REFERENCES `item` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passwordrecovery`
--
ALTER TABLE `passwordrecovery`
  ADD CONSTRAINT `fk_PasswordRecovery_authentification1` FOREIGN KEY (`authentification_Id`) REFERENCES `authentification` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_purchases_authentification1` FOREIGN KEY (`authentification_Id`) REFERENCES `authentification` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `refreshwhenchange`
--
ALTER TABLE `refreshwhenchange`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`Authentification_Id`) REFERENCES `authentification` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `fk_Session_Authentification1` FOREIGN KEY (`Authentification_Id`) REFERENCES `authentification` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Authentification` FOREIGN KEY (`Authentification_Id`) REFERENCES `authentification` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
