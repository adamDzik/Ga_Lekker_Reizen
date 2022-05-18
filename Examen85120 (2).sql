-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 11:13 AM
-- Server version: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Examen85120`
--

-- --------------------------------------------------------

--
-- Table structure for table `Docent`
--

CREATE TABLE `Docent` (
  `Docent_ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Docent`
--

INSERT INTO `Docent` (`Docent_ID`, `Email`, `Wachtwoord`) VALUES
(1, 'admin@glr.nl', '$2y$10$jlnKI1oK8Egv33PVU0pOjOQS3bRBC1xDb4q.POK98fGy9uZyw0Trm'),
(2, 'admin2@glr.nl', '$2y$10$UEl8TEQTXjIUg.gA5djsSem7CXe9mZkaqXjgJyUeGU.v9IiUReLpy');

-- --------------------------------------------------------

--
-- Table structure for table `Reis`
--

CREATE TABLE `Reis` (
  `Reis_ID` int(11) NOT NULL,
  `Titel` varchar(255) NOT NULL,
  `Bestemming` varchar(100) NOT NULL,
  `Omschrijving` text NOT NULL,
  `Begindatum` date NOT NULL,
  `Einddatum` date NOT NULL,
  `Aantal_Plekken` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reis`
--

INSERT INTO `Reis` (`Reis_ID`, `Titel`, `Bestemming`, `Omschrijving`, `Begindatum`, `Einddatum`, `Aantal_Plekken`) VALUES
(15, 'Pret in walibi', 'Walibi', 'pretpark', '2022-05-21', '2022-06-04', 50),
(16, 'Efteling', 'Efteling', 'Sprookjes park', '2022-05-20', '2022-05-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Reis_Inschrijf`
--

CREATE TABLE `Reis_Inschrijf` (
  `Inschrijf_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Reis_ID` int(11) NOT NULL,
  `Studentnummer` int(11) NOT NULL,
  `Identiteitsbewijs_nummer` int(11) NOT NULL,
  `Opmerkingen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reis_Inschrijf`
--

INSERT INTO `Reis_Inschrijf` (`Inschrijf_ID`, `Student_ID`, `Reis_ID`, `Studentnummer`, `Identiteitsbewijs_nummer`, `Opmerkingen`) VALUES
(14, 12, 15, 12345, 123123, '123123123'),
(15, 12, 15, 12345, 123456, 'geen'),
(16, 12, 16, 12345, 123123, 'geen');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Student_ID` int(11) NOT NULL,
  `Studentnummer` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Achternaam` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Student_ID`, `Studentnummer`, `Naam`, `Achternaam`, `Email`, `Wachtwoord`) VALUES
(12, 12345, '12345', '12345', '123@123.nl', '$2y$10$RKgLls72teZS2QuI3mbmSeTmFRg5MGW5wUx3R8/GGZIwIVaBkckIq'),
(13, 85120, 'Adam', 'Dzik', '85120@glr.nl', '$2y$10$cc1XWpB8E8tP6wXm4XC7WuYWippSWxTopDxLpCeaBHZu9J1oiV/r6'),
(14, 12345, 'Damian', 'Hollaard', '12345@glr.nl', '$2y$10$0iCJLptmvmzo4cqlEkOh8OHChgMPiHKSh6gGlHs15S97y71EblEA6'),
(15, 54321, 'Ben', 'Rietveld', '54321@glr.nl', '$2y$10$3eRs2FmXSFE04CVXfRvEOuM1dVc/im7dZFJrxfLtAhNgNSkk6HsSq'),
(16, 11111, 'test', 'test', 'test@glr.nl', '$2y$10$O4/gRQinu9M3e3NR/FW5ieUiu5ZEOTAdkrUkK8ZqxzKa3vcvvJQ0m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Docent`
--
ALTER TABLE `Docent`
  ADD PRIMARY KEY (`Docent_ID`);

--
-- Indexes for table `Reis`
--
ALTER TABLE `Reis`
  ADD PRIMARY KEY (`Reis_ID`);

--
-- Indexes for table `Reis_Inschrijf`
--
ALTER TABLE `Reis_Inschrijf`
  ADD PRIMARY KEY (`Inschrijf_ID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Docent`
--
ALTER TABLE `Docent`
  MODIFY `Docent_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Reis`
--
ALTER TABLE `Reis`
  MODIFY `Reis_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Reis_Inschrijf`
--
ALTER TABLE `Reis_Inschrijf`
  MODIFY `Inschrijf_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `Student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
