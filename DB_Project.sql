--
-- Create schema DB_Project
--

CREATE DATABASE IF NOT EXISTS DB_Project;
USE DB_Project;


--
-- Definition of table `ADMIN`
--

DROP TABLE IF EXISTS `ADMIN`;
CREATE TABLE `ADMIN` (
  `ID` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) DEFAULT CHARSET=utf8;



--
-- Definition of table `CLIENT`
--

DROP TABLE IF EXISTS `CLIENT`;
CREATE TABLE `CLIENT` (
  `ID` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` int(12),
  `Rating` float(5),
  `C_request_list` text,
  PRIMARY KEY (`ID`)
) DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CLIENT`
--

/*!40000 ALTER TABLE `CLIENT` DISABLE KEYS */;
/*!40000 ALTER TABLE `CLIENT` ENABLE KEYS */;

--
-- Definition of table `FREELANCER`
--

DROP TABLE IF EXISTS `FREELANCER`;
CREATE TABLE `FREELANCER` (
  `ID` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` int(12),
  `Rating` float(5),
  `Age` int(3),
  `Major` text,
  `Career` int(3),
  `F_request_list` text,
  `exp` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `PROFICIENCY`;
CREATE TABLE `PROFICIENCY` (
  `ID` varchar(30) NOT NULL,
  `Pro_c` int(10),
  `Pro_j` int(10),
  `Pro_js` int(10),
  `Pro_p` int(10),
  `Pro_e` int(10),

  CONSTRAINT freelancerid
  FOREIGN KEY (`ID`) REFERENCES `FREELANCER`(`ID`)
    ON DELETE CASCADE  ON UPDATE CASCADE

) DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FREELANCER`
--

/*!40000 ALTER TABLE `FREELANCER` DISABLE KEYS */;
/*!40000 ALTER TABLE `FREELANCER` ENABLE KEYS */;



--
-- Definition of table `TEAM`
--

DROP TABLE IF EXISTS `TEAM`;
CREATE TABLE `TEAM` (
  `Name` varchar(30) NOT NULL,
  `Leader` varchar(30) NOT NULL,
  PRIMARY KEY (`Name`),

  CONSTRAINT t_leader
  FOREIGN KEY (`Leader`) REFERENCES `FREELANCER`(`ID`)
    ON DELETE CASCADE

) DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TEAMMATE`;
CREATE TABLE `TEAMMATE` (
  `Teamname` varchar(30) NOT NULL,
  `Teammate` varchar(50) NOT NULL,

  CONSTRAINT teamname
  FOREIGN KEY (`Teamname`) REFERENCES `TEAM`(`Name`)
    ON DELETE CASCADE  ON UPDATE CASCADE

) DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TEAM`
--

/*!40000 ALTER TABLE `TEAM` DISABLE KEYS */;
/*!40000 ALTER TABLE `TEAM` ENABLE KEYS */;


--
-- Definition of table `REQUEST`
--

DROP TABLE IF EXISTS `REQUEST`;
CREATE TABLE `REQUEST` (
  `NUM` int(30) NOT NULL AUTO_INCREMENT,
  `Upload_time` timestamp NOT NULL,
  `C_id` varchar(30) NOT NULL,
  `Budget` int(10),
  `Start_date`timestamp,
  `End_date`timestamp,
  `Pro_c` int(3),
  `Pro_j` int(3),
  `Pro_js` int(3),
  `Pro_p` int(3),
  `Pro_e` int(3),
  `Minimum_career` int(3),
  `Min_num_person` int(5),
  `Max_num_person` int(5),
  `Accepted` int(3) NOT NULL DEFAULT '0',
  `Accept_f` varchar(30),
  `Accept_t` varchar(30),
  `Complete` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NUM`),

  CONSTRAINT client_id
  FOREIGN KEY (`C_id`) REFERENCES `CLIENT`(`ID`)
    ON DELETE CASCADE  ON UPDATE CASCADE,
  CONSTRAINT accept_f
  FOREIGN KEY (`Accept_f`) REFERENCES `FREELANCER`(`ID`)
    ON DELETE CASCADE  ON UPDATE CASCADE,
  CONSTRAINT team_name
  FOREIGN KEY (`Accept_t`) REFERENCES `TEAM`(`Name`)
    ON DELETE CASCADE ON UPDATE CASCADE


) DEFAULT CHARSET=utf8;


--
-- Dumping data for table `REQUEST`
--

/*!40000 ALTER TABLE `REQUEST` DISABLE KEYS */;
/*!40000 ALTER TABLE `REQUEST` ENABLE KEYS */;



--
-- Definition of table `PORTFOLIO`
--

DROP TABLE IF EXISTS `PORTFOLIO`;
CREATE TABLE `PORTFOLIO` (
  `P_fid` varchar(30) NOT NULL,
  `num` int(3) NOT NULL,
  `Out` tinyint(1) NOT NULL,
  `P_Num` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`P_Num`),

  CONSTRAINT pfid
  FOREIGN KEY (`P_fid`) REFERENCES `FREELANCER`(`ID`)
    ON DELETE CASCADE  ON UPDATE CASCADE

) DEFAULT CHARSET=utf8;


--
-- Dumping data for table `PORTFOLIO`
--

/*!40000 ALTER TABLE `PORTFOLIO` DISABLE KEYS */;
/*!40000 ALTER TABLE `PORTFOLIO` ENABLE KEYS */;

--
-- Definition of table `MESSAGE`
--

DROP TABLE IF EXISTS `MESSAGE`;
CREATE TABLE `MESSAGE` (
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `C_id` varchar(30) NOT NULL,
  `F_id` varchar(30) NOT NULL,
  `Text` text,
  `Mnum` int(30) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Mnum`),

  CONSTRAINT mcid
  FOREIGN KEY (`C_id`) REFERENCES `CLIENT`(`ID`)
    ON DELETE CASCADE  ON UPDATE CASCADE,
  CONSTRAINT mfid
  FOREIGN KEY (`F_id`) REFERENCES `FREELANCER`(`ID`)
    ON DELETE CASCADE  ON UPDATE CASCADE

) DEFAULT CHARSET=utf8;


--
-- Dumping data for table `MESSAGE`
--

/*!40000 ALTER TABLE `MESSAGE` DISABLE KEYS */;
/*!40000 ALTER TABLE `MESSAGE` ENABLE KEYS */;



--
-- Definition of table `PROFICIENCY`
--


--
-- Dumping data for table `PROFICIENCY`
--

/*!40000 ALTER TABLE `PROFICIENCY` DISABLE KEYS */;
/*!40000 ALTER TABLE `PROFICIENCY` ENABLE KEYS */;
