-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 11:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotelii`
--

-- --------------------------------------------------------

--
-- Table structure for table `dhoma`
--

CREATE TABLE IF NOT EXISTS `dhoma` (
`DhomaId` int(10) NOT NULL,
  `TipiDhomesId` int(10) NOT NULL,
  `NrDhomes` int(3) NOT NULL,
  `Gjendje` tinyint(1) NOT NULL DEFAULT '1',
  `Notes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhoma`
--

INSERT INTO `dhoma` (`DhomaId`, `TipiDhomesId`, `NrDhomes`, `Gjendje`, `Notes`) VALUES
(1, 1, 1, 0, 'Dhome Standarte 1'),
(2, 1, 2, 1, 'Dhome Standarte 2'),
(3, 1, 3, 1, 'Dhome Standarte 3'),
(4, 1, 4, 1, 'Dhome Standarte 4'),
(5, 1, 5, 1, 'Dhome Standarte 5'),
(6, 1, 6, 1, 'Dhome Standarte 6'),
(7, 1, 7, 1, 'Dhome Standarte 7'),
(8, 1, 8, 1, 'Dhome Standarte 8'),
(9, 1, 9, 1, 'Dhome Standarte 9'),
(10, 1, 10, 1, 'Dhome Standarte 10'),
(11, 2, 11, 0, 'Dhome Luksoze 1'),
(12, 2, 12, 0, 'Dhome Luksoze 2'),
(13, 2, 13, 1, 'Dhome Luksoze 3'),
(14, 2, 14, 1, 'Dhome Luksoze 4'),
(15, 2, 15, 1, 'Dhome Luksoze 5'),
(16, 3, 16, 1, 'Dhome Suite 1'),
(17, 3, 17, 1, 'Dhome Suite 2'),
(18, 3, 18, 1, 'Dhome Suite 3'),
(19, 3, 19, 1, 'Dhome Suite 4'),
(20, 3, 20, 1, 'Dhome Suite 5');

-- --------------------------------------------------------

--
-- Table structure for table `pagesa`
--

CREATE TABLE IF NOT EXISTS `pagesa` (
`PagesaId` int(10) NOT NULL,
  `Cmimi` float NOT NULL,
  `PerdoruesId` int(10) NOT NULL,
  `MetodaPageses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perdorues`
--

CREATE TABLE IF NOT EXISTS `perdorues` (
`PerdoruesId` int(10) NOT NULL,
  `RoletId` int(10) NOT NULL DEFAULT '1',
  `Emer` varchar(30) NOT NULL,
  `Mbiemer` varchar(30) NOT NULL,
  `NrTel` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Mosha` int(3) DEFAULT NULL,
  `Gjinia` tinyint(1) NOT NULL DEFAULT '0',
  `ResetPassword` varchar(64) NOT NULL,
  `Inaktiv` tinyint(1) NOT NULL DEFAULT '1',
  `Adresa` varchar(100) DEFAULT NULL,
  `Shteti` varchar(30) DEFAULT NULL,
  `Qyteti` varchar(30) DEFAULT NULL,
  `lat` text,
  `lng` text
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perdorues`
--

INSERT INTO `perdorues` (`PerdoruesId`, `RoletId`, `Emer`, `Mbiemer`, `NrTel`, `Email`, `Username`, `Password`, `Mosha`, `Gjinia`, `ResetPassword`, `Inaktiv`, `Adresa`, `Shteti`, `Qyteti`, `lat`, `lng`) VALUES
(1, 2, 'Migel', 'Hoxha', '0693944239', 'migel.hoxha@fshnstudent.info', 'admin', '123456', 20, 0, '123456', 1, 'Rruga 21 Dhjetori', 'Albania', 'TIrana', NULL, NULL),
(2, 2, 'Migel', 'Hoxha', '0693944239', 'migel.hoxha@live.com', 'root', '$2y$10$xWfJyQKr41SoxO2ETa9GguvUNAyhTsk7Tjh0hd5GcAGU4zOWv6ouy', 20, 0, 'ornela', 1, 'Rruga 21 Dhjetori', 'Albania', 'TIrana', NULL, NULL),
(16, 2, 'Refi', 'Hysaj', '0692536559', 'refije.hysaj@gmail.com', 'refi', '$2y$10$7BscOc3qogKm7ndW4UA0L.U4FXxdceIhHfzSpfT8qxtOMc3evHFj6', 21, 1, '123456', 1, 'Rruga Siri Kodra, Tirana, Albania', 'Albania', 'Tirana', '41.3431858', '19.815822600000047'),
(17, 1, 'Migel', 'Hoxha', '0692536559', 'test.test@gmail.com', 'migel', '$2y$10$kvwSRlzSPcM2GfHg3oymAuZpu9dgY5unZfw9W/956PR1e98AgC0Ti', 21, 0, '123456', 1, 'Fier, Albania', 'Albania', 'Fier', '40.727504', '19.562759599999936'),
(18, 1, 'Ornela', 'Cerenishti', '0692536559', 'test.test@gmail.com', 'orni', '$2y$10$9/3dEcoM8bmmtF00mBtcY.7.zCGatu97w7ZByoIBbkca8n0FsTxrC', 21, 1, '123456', 1, 'LushnjÃ«, Albania', 'Albania', 'LushnjÃ«', '40.941983', '19.699642799999992'),
(19, 1, 'Olger', 'Mile', '0692536559', 'test.test@gmail.com', 'geri', '$2y$10$aK0DA7b.zqd0s6AZj2GkqOfLKfXsvznQ8XH7GylenUC2qAoyTB2TW', 22, 1, '123456', 1, 'Rruga e Elbasanit, Tirana, Albania', 'Albania', 'Tirana', '41.3114444', '19.836005900000032'),
(20, 1, 'Paula', 'Demiraj', '25635666', 'test.test@gmail.com', 'paula', '$2y$10$5opMWG2PCv.ITtknISYUMe./m0BOE2d9DMV2jGiwAC865KHXcvv3.', 25, 1, '123456', 1, 'Rruga 5 Maji, Tirana, Albania', 'Albania', 'Tirana', '41.3432783', '19.825654399999962'),
(21, 1, 'Migel', 'Hoxha', '23523532', 'adasd@livecom.com', 'migmig', '$2y$10$70moYlaW0aRu4P15HQd0POerB6Jae/q5/fBnxr8TacNNuSDGjWK6C', 18, 0, '123456', 0, 'Rruga Teodor Keko, Tirana, Albania', 'Albania', 'Tirana', '41.3300847', '19.784779699999945'),
(22, 1, 'REFI', 'hysaj', '34534534', 'asdass@live.om', 'refijeee', '$2y$10$w9r9SPCkccNkMdkLE/BIieaSDj1jA9EmCE4Hf5HWQ6P/mkf1LMN7y', 21, 0, '123456', 1, 'Xhamlliku, Tirana, Albania', 'Albania', 'Tirana', '41.335943', '19.835814400000004'),
(23, 1, 'Talis', 'Papa', '355684808865', 'lololol@live.com', 'talias', '$2y$10$gCMf33v.JQVfrAE8mZtscesr9v0186.0QQFZqA5iB3A1wDu1efQTW', 18, 0, '123456', 1, 'DurrÃ«s, Albania', 'Albania', 'DurrÃ«s', '41.3245904', '19.456468599999994'),
(24, 1, 'Tali', 'Asz', '6888383828', 'talitali@live.com', 'taliass', '$2y$10$8kHC5.hc5oqj617YcWlDm.at2qgMIFQrbUh5vfSL8yjPb.fhF4Czi', 20, 0, '123456', 1, 'Rruga e Barrikadave, Tirana, Albania', 'Albania', 'Tirana', '41.3323518', '19.819799800000055'),
(25, 1, 'Migel', 'Hoxha', '456456456', 'asdas@lv.com', 'Testim', '$2y$10$FOiCmm9e7uXy2JkFDUaIqeaVjb.cfVGjTeBdurmicGN05uWU7BVbe', 18, 0, '123456', 1, 'Rruga Siri Kodra, Tirana, Albania', 'Albania', 'Tirana', '41.3431858', '19.815822600000047'),
(26, 1, 'Migel', 'Hoxha', '456456456', 'asdas@lv.com', 'Testimm', '$2y$10$V/rh4cGgE9K30lFRTAdG0Oxrp2F2rei8FIIadF1QE1zHew3dtQPCy', 18, 0, '123456', 1, 'Tirana, Albania', 'Albania', 'Tirana', '41.3275459', '19.81869819999997'),
(27, 1, 'Migel', 'Hoxha', '456456456', 'asdas@lvasd.com', 'Testimmsss', '$2y$10$OXPHe11nYoBtJ.tutmmJE.VSQwT4yyOlvsW4KH3deseXzuLzXSVwS', 18, 0, '1234567', 0, 'asdasd', 'asdas', 'asdasd', NULL, NULL),
(28, 1, 'asdasd', 'asdasd', '342343', 'asdasdas@live.coms', 'asdasd', '$2y$10$lFDQ/3oR5Uq5hZcjxqO4vOrmQ0whZfelJ3bx/o4QrPqCbdidbx6RW', 20, 0, '123456', 0, 'asdasd', 'asdasd', 'asdasd', NULL, NULL),
(29, 1, 'migel', 'migel', '6837393', 'migel.hoxha@fshnstudent.info', 'geris', '$2y$10$fXVmMua7mBLjvO82513lz.gLL1Q1MVdoNaRLWYa4cVMMVLL1wtkDO', 20, 0, '123456', 0, 'sadasd', 'asdasd', 'asdasd', NULL, NULL),
(30, 1, 'Migel', 'asdas', '34324234', 'asdasd@live.com', 'Boll', '$2y$10$Rfz8alnUOBPHsFGBZNislOEU4893l66iKnf4Xnapsbhcv6o.qYBO2', 23, 0, '123456', 1, 'Rruga e DibrÃ«s, Tirana, Albania', 'Albania', 'Tirana', '41.34290599999999', '19.83479030000001'),
(31, 1, 'work', 'pls', '324234234', 'sdasdasd@live.com', 'pls', '$2y$10$VgMEhdf7ckvZI6EQd76K.ehFR8IgpYK9YlzhMYTK7.7QeKK11n.e.', 23, 0, '123456', 0, 'Rruga e Elbasanit, Tirana, Albania', 'Albania', 'Tirana', '41.3114444', '19.836005900000032'),
(32, 1, 'test', 'test', '1234548787', 'test.test@test.com', 'test', '$2y$10$0uqRejhiV9HQiU7FRREOauMLOi2I36Xm9buZPOqAu.BqcKCnN.gKK', 20, 0, '123456', 1, 'Rruga Teodor Keko, Tirana, Albania', 'Albania', 'Tirana', '41.3300847', '19.784779699999945'),
(33, 1, 'Migel', 'Hoxha', '0692536559', 'test.test@gmail.com', 'mig', '$2y$10$wXTSqzqmTqre2IQmwyn9weYcxddaL306wAEyXNjms1/VNGiz6LZQS', 21, 0, '123456', 1, 'Rruga Jordan Misja, Tirana, Albania', 'Albania', 'Tirana', '41.3411459', '19.810127899999998'),
(34, 1, 'Tali', 'Hoxha', '0692536559', 'test.test@gmail.com', 'testimi', '$2y$10$shd9HmI2E.kOu/E7dZH/reFb2ZdraNDxFvOiRjO9QKMRByOmtERqu', 25, 0, '123456', 1, 'Berat, Albania', 'Albania', 'Berat', '40.70863769999999', '19.943731399999933'),
(35, 1, 'Refi', 'Cerenishti', '23523532', 'adasd@livecom.com', 'sara', '$2y$10$M6g9pJhEUyqtTSJwwiHt4ubA87gQMRCOB4iPFnvGOzGV.EWNYOEeK', 25, 1, '123456', 1, 'PÃ«rmet, Albania', 'Albania', 'PÃ«rmet', '40.2361837', '20.351733400000057'),
(36, 1, 'sdasdsa', 'asdasd', '54354353', 'testsss.test@gmail.com', 'migelll', '$2y$10$5OoIqy0ouDftZRcy3D0D5.3qJYFCsxzXm5UjjrFxb9L0ePUQvBGRi', 20, 0, '123456', 1, 'Elbasan, Albania', 'Albania', 'Elbasan', '41.11023', '20.08665540000004');

-- --------------------------------------------------------

--
-- Table structure for table `rezervimi`
--

CREATE TABLE IF NOT EXISTS `rezervimi` (
`RezervimId` int(10) NOT NULL,
  `PerdoruesId` int(10) NOT NULL,
  `DateRezervimi` date DEFAULT NULL,
  `DhomaId` int(10) NOT NULL,
  `DateFillimi` date NOT NULL,
  `DateMbarimi` date NOT NULL,
  `DataPagesaTotale` date DEFAULT NULL,
  `SasiaPagesaTotale` int(10) NOT NULL,
  `Sherbime` text NOT NULL,
  `AnulloRezervim` tinyint(1) NOT NULL DEFAULT '1',
  `NrPersonave` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervimi`
--

INSERT INTO `rezervimi` (`RezervimId`, `PerdoruesId`, `DateRezervimi`, `DhomaId`, `DateFillimi`, `DateMbarimi`, `DataPagesaTotale`, `SasiaPagesaTotale`, `Sherbime`, `AnulloRezervim`, `NrPersonave`) VALUES
(49, 2, '2018-02-07', 2, '2018-02-07', '2018-02-15', NULL, 540, 'lol', 0, 2),
(63, 2, '2018-02-06', 2, '2018-02-08', '2018-02-24', NULL, 850, 'Dhoma e paster', 0, 1),
(64, 2, '2018-02-06', 11, '2018-02-06', '2018-02-06', NULL, 90, 'Hello', 0, 1),
(65, 2, '2018-02-06', 11, '2018-02-24', '2018-02-06', NULL, 40, '', 0, 1),
(66, 2, '0000-00-00', 1, '2018-02-02', '2018-02-15', NULL, 700, '', 0, 1),
(67, 2, '0000-00-00', 17, '2018-02-06', '2018-02-15', NULL, 1800, 'sdas', 0, 6),
(68, 2, '2018-02-06', 16, '2018-02-06', '2018-02-06', NULL, 130, '', 0, 1),
(69, 2, '0000-00-00', 1, '2018-02-07', '2018-02-15', NULL, 900, 'TESTO', 0, 6),
(70, 2, '2018-02-07', 1, '2018-02-07', '2018-02-07', NULL, 70, 'TEST', 0, 3),
(71, 2, '2018-02-07', 1, '2018-02-07', '2018-02-07', NULL, 50, '', 0, 1),
(72, 2, '2018-02-07', 1, '2018-02-07', '2018-02-07', NULL, 50, 'Dhome 1', 0, 1),
(73, 29, '2018-02-07', 11, '2018-02-07', '2018-02-22', NULL, 1440, 'looo', 0, 1),
(74, 17, '2018-06-05', 1, '2018-06-04', '2018-06-07', NULL, 240, '', 1, 2),
(75, 19, '2018-06-05', 11, '2018-06-02', '2018-06-07', NULL, 600, '', 1, 2),
(76, 17, '2018-06-05', 12, '2018-06-05', '2018-06-14', NULL, 1000, '', 1, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rezervimi_dhoma`
--
CREATE TABLE IF NOT EXISTS `rezervimi_dhoma` (
`DateFillimi` date
,`DateMbarimi` date
,`NrDhomes` int(3)
,`Notes` text
,`Gjendje` tinyint(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `rolet`
--

CREATE TABLE IF NOT EXISTS `rolet` (
`RoletId` int(10) NOT NULL,
  `Rolet` varchar(20) NOT NULL,
  `Pershkimi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolet`
--

INSERT INTO `rolet` (`RoletId`, `Rolet`, `Pershkimi`) VALUES
(1, 'user', 'User Guest'),
(2, 'admin', 'administratot i sistemit');

-- --------------------------------------------------------

--
-- Table structure for table `tipidhomes`
--

CREATE TABLE IF NOT EXISTS `tipidhomes` (
`TipiDhomesId` int(10) NOT NULL,
  `Pershkrimi` text NOT NULL,
  `Lloji` text NOT NULL,
  `Cmimi` float NOT NULL,
  `Kati` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipidhomes`
--

INSERT INTO `tipidhomes` (`TipiDhomesId`, `Pershkrimi`, `Lloji`, `Cmimi`, `Kati`) VALUES
(1, 'I dizajnuar për të frymëzuar pushimin dhe relaksin, dhomat tona të buta dhe moderne krijojnë një ndjenjë të shtëpisë me tonet paqësore të ngjyrave dhe dekor malor elegant. Çdo dhomë përmban një krevat king size ose dy shtretër me madhësi mbretëresha, ajër të kondicionuar dhe banjo me madhësi të plotë me kundërvihet granit dhe dysheme mermeri. Dhomat luksoze janë të pajisura plotësisht me pajisje moderne, duke përfshirë një televizor Samsung Smart, stacion docking iHome, porte USB, Keurig Coffee Brewer, mini frigorifer, humidifier, kasafortë në dhomë, rroba prej pelushi dhe pantofla dhe Wi- Fi. Të gjitha dhomat janë jo-pirja e duhanit dhe pamjet ndryshojnë nga peizazhi i bukur malor në fshatin portik Vail dhe pishina jonë e vetme.', 'Dhome Standarte', 40, 1),
(2, 'Dhomat luksoze, të vendosura në krahun ndërkombëtar të shtëpizës, kanë ose një mbret apo dy shtretër me madhësi mbretëreshë dhe pamje nga ose në malin Vail ose në oborrin Kuzhina. Secili përmban një banjo të tepërt me një kotësi të dyfishtë dhe dysheme mermeri.', 'Dhome Luksoze', 80, 2),
(3, 'Suites luksoze një dhomë gjumi me krevat king size, një banjo të tepërt me kotësi të dyfishtë dhe dysheme mermeri; dhe një zonë të veçantë ulur me fireplace gazi, dhe një bar i lagësht. Çdo suitë gjithashtu ofron pamje spektakolare të malit Vail.', 'Dhome Suite', 120, 3);

-- --------------------------------------------------------

--
-- Structure for view `rezervimi_dhoma`
--
DROP TABLE IF EXISTS `rezervimi_dhoma`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rezervimi_dhoma` AS select `r`.`DateFillimi` AS `DateFillimi`,`r`.`DateMbarimi` AS `DateMbarimi`,`dh`.`NrDhomes` AS `NrDhomes`,`dh`.`Notes` AS `Notes`,`dh`.`Gjendje` AS `Gjendje` from (`rezervimi` `r` join `dhoma` `dh` on((`dh`.`DhomaId` = `r`.`DhomaId`))) where (`r`.`AnulloRezervim` = 1) order by `dh`.`NrDhomes`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dhoma`
--
ALTER TABLE `dhoma`
 ADD PRIMARY KEY (`DhomaId`), ADD KEY `TipiDhomesId` (`TipiDhomesId`);

--
-- Indexes for table `pagesa`
--
ALTER TABLE `pagesa`
 ADD PRIMARY KEY (`PagesaId`), ADD KEY `PerdoruesId` (`PerdoruesId`);

--
-- Indexes for table `perdorues`
--
ALTER TABLE `perdorues`
 ADD PRIMARY KEY (`PerdoruesId`), ADD UNIQUE KEY `Username` (`Username`), ADD KEY `RoletId` (`RoletId`);

--
-- Indexes for table `rezervimi`
--
ALTER TABLE `rezervimi`
 ADD PRIMARY KEY (`RezervimId`), ADD KEY `DhomaId` (`DhomaId`), ADD KEY `PerdoruesId` (`PerdoruesId`);

--
-- Indexes for table `rolet`
--
ALTER TABLE `rolet`
 ADD PRIMARY KEY (`RoletId`);

--
-- Indexes for table `tipidhomes`
--
ALTER TABLE `tipidhomes`
 ADD PRIMARY KEY (`TipiDhomesId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dhoma`
--
ALTER TABLE `dhoma`
MODIFY `DhomaId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pagesa`
--
ALTER TABLE `pagesa`
MODIFY `PagesaId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perdorues`
--
ALTER TABLE `perdorues`
MODIFY `PerdoruesId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `rezervimi`
--
ALTER TABLE `rezervimi`
MODIFY `RezervimId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `rolet`
--
ALTER TABLE `rolet`
MODIFY `RoletId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipidhomes`
--
ALTER TABLE `tipidhomes`
MODIFY `TipiDhomesId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dhoma`
--
ALTER TABLE `dhoma`
ADD CONSTRAINT `dhoma_ibfk_1` FOREIGN KEY (`TipiDhomesId`) REFERENCES `tipidhomes` (`TipiDhomesId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pagesa`
--
ALTER TABLE `pagesa`
ADD CONSTRAINT `pagesa_ibfk_1` FOREIGN KEY (`PerdoruesId`) REFERENCES `perdorues` (`PerdoruesId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perdorues`
--
ALTER TABLE `perdorues`
ADD CONSTRAINT `perdorues_ibfk_1` FOREIGN KEY (`RoletId`) REFERENCES `rolet` (`RoletId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervimi`
--
ALTER TABLE `rezervimi`
ADD CONSTRAINT `rezervimi_ibfk_1` FOREIGN KEY (`PerdoruesId`) REFERENCES `perdorues` (`PerdoruesId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `rezervimi_ibfk_2` FOREIGN KEY (`DhomaId`) REFERENCES `dhoma` (`DhomaId`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `AutoDelete` ON SCHEDULE EVERY 1 DAY STARTS '2018-02-01 00:00:00' ENDS '2020-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE rezervimi r
		JOIN  dhoma  dh ON r.DhomaId = dh.DhomaId
		SET r.AnulloRezervim=0,
		  dh.Gjendje=1
		where r.DateMbarimi <= CURRENT_DATE$$

CREATE DEFINER=`root`@`localhost` EVENT `AutoReservation` ON SCHEDULE EVERY 1 DAY STARTS '2017-12-06 00:00:00' ENDS '2019-11-07 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE dhoma
        SET Gjendje = 0
        WHERE Gjendje = 1
        AND DhomaId in ( SELECT DhomaId FROM rezervimi WHERE CURRENT_DATE BETWEEN DateFillimi  AND DateMbarimi  )$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
