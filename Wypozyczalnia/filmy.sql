-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Gru 2022, 16:28
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `filmy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `Ratings` float DEFAULT NULL,
  `Director` varchar(45) DEFAULT NULL,
  `Confirmed` varchar(45) DEFAULT NULL,
  `Borrowed_By` varchar(45) DEFAULT NULL,
  `Generes_id` int(11) NOT NULL,
  `Users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `films`
--

INSERT INTO `films` (`id`, `Title`, `Description`, `Ratings`, `Director`, `Confirmed`, `Borrowed_By`, `Generes_id`, `Users_id`) VALUES
(1, 'Dupa Konia', 'Ale essa', NULL, 'Ja', '1', NULL, 2, 2),
(2, 'RemekSprzedajeOpla', 'Ale beka lol', NULL, 'Remek', '1', NULL, 5, 2),
(3, 'Fabian mi pomaga', 'Przepraszam cie Fabis', NULL, 'Fabis', NULL, NULL, 1, 1),
(4, 'Nizer jest z mielzyna', 'Beka z niego', NULL, 'Nizer', NULL, NULL, 2, 1),
(5, 'Fabis jest wporzo', 'Naprawde przysiegam pomocy', NULL, 'Ja tez i fabian rowniez', NULL, NULL, 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `generes`
--

CREATE TABLE `generes` (
  `id` int(11) NOT NULL,
  `Genere` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `generes`
--

INSERT INTO `generes` (`id`, `Genere`) VALUES
(1, 'Horror'),
(2, 'Comedy'),
(3, 'Drama'),
(4, 'Fantasy'),
(5, 'Suicide Jokes');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Surname` varchar(45) DEFAULT NULL,
  `Films_Borrowed` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Login` varchar(45) DEFAULT NULL,
  `Admin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `Name`, `Surname`, `Films_Borrowed`, `Password`, `Login`, `Admin`) VALUES
(1, 'Cezary', 'Stranc', 'Cokolwiek', 'Haslo', 'Login', '1'),
(2, 'Fabian', 'Sucholas', 'Jakikolwiek', 'Haslo12', 'Login12', NULL),
(3, 'Remigiusz', 'Pawlowski', '', 'Essa', 'Opel', '1'),
(4, 'Remigiusz', 'Pawlowski', '', '', 'Opel', '1'),
(5, 'Nizer ', 'Rolnik', '', 'OramPole', 'NaTroktore', '1');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`,`Generes_id`,`Users_id`),
  ADD KEY `fk_Films_Generes` (`Generes_id`),
  ADD KEY `fk_Films_Users1` (`Users_id`);

--
-- Indeksy dla tabeli `generes`
--
ALTER TABLE `generes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `generes`
--
ALTER TABLE `generes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `fk_Films_Generes` FOREIGN KEY (`Generes_id`) REFERENCES `generes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Films_Users1` FOREIGN KEY (`Users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
