-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 22, 2024 at 01:42 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelagency`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `trip_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_title`) VALUES
(1, 'Romantyczna wycieczka'),
(2, 'Rodzinny wypad'),
(5, 'Wyjazd na weekend'),
(6, 'Relaksujący tydzień');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trip`
--

CREATE TABLE `trip` (
  `trip_id` int(11) NOT NULL,
  `trip_title` varchar(100) NOT NULL,
  `trip_description` varchar(255) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `trip_continent` varchar(100) NOT NULL,
  `trip_picture` varchar(255) NOT NULL,
  `trip_price` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(100) NOT NULL,
  `trip_tags` varchar(255) NOT NULL,
  `trip_start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trip_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`trip_id`, `trip_title`, `trip_description`, `topic_id`, `trip_continent`, `trip_picture`, `trip_price`, `Date`, `Status`, `trip_tags`, `trip_start_date`, `trip_end_date`) VALUES
(6, 'Wieczory w Paryżu', 'Spędź niezapomniane chwile w Mieście Miłości, delektując się francuską kuchnią i spacerując po Polach Elizejskich.', 1, 'Europa', '1 paryz.jpg', '4500', '2024-09-21 19:59:40', 'true', 'romantyczna, Paryż, Francja, miłość', '2024-04-30 22:00:00', '2024-05-06 22:00:00'),
(7, 'Magiczne Santorini', 'Zobacz najpiękniejsze zachody słońca w Grecji. Idealna wycieczka dla par, które pragną spędzić czas w malowniczym otoczeniu.', 1, 'Europa', '2 santorini.jpg', '5200', '2024-09-21 20:00:15', 'true', 'Santorini, Grecja, romantyczna, słońce', '2024-06-09 22:00:00', '2024-06-16 22:00:00'),
(8, 'Noc pod gwiazdami w Toskanii', 'Romantyczna ucieczka do włoskiej Toskanii. Spędź wieczory przy lampce wina pod gwiazdami.', 1, 'Europa', '3 toskania.jpg', '4700', '2024-09-21 20:00:51', 'true', 'Toskania, Włochy, romantyczna, natura', '2024-09-04 22:00:00', '2024-09-11 22:00:00'),
(9, 'Bajkowy Paryż i Disneyland', 'Połącz romantyczne chwile w Paryżu z odrobiną magii w Disneylandzie. Idealny wybór dla zakochanych i marzycieli.', 1, 'Europa', '4 disneyland.png', '5600', '2024-09-21 20:02:44', 'true', 'Paryż, Disneyland, romantyczna, Francja', '2024-07-14 22:00:00', '2024-07-21 22:00:00'),
(10, 'Lazurowe wybrzeże', 'Romantyczna podróż wzdłuż Lazurowego Wybrzeża, z odwiedzinami w Cannes, Nicei i Monte Carlo.', 1, 'Europa', '5 lazurowe.jpg', '4800', '2024-09-21 20:03:17', 'true', 'Francja, Lazurowe Wybrzeże, romantyczna', '2024-07-31 22:00:00', '2024-08-07 22:00:00'),
(11, 'Bali dla dwojga', 'Ekskluzywna podróż po rajskim Bali, idealna na romantyczny wypoczynek.', 1, 'Azja', '6 bali.jpg', '7300', '2024-09-21 20:03:52', 'true', 'Bali, Indonezja, tropiki, romantyczna', '2024-10-31 23:00:00', '2024-11-09 23:00:00'),
(12, 'Wesołe miasteczka w Orlando', 'Zwiedź najlepsze parki rozrywki na świecie: Disney World, Universal Studios i SeaWorld!', 2, 'Ameryka Północna', '1 orlando.jfif', '8200', '2024-09-21 20:04:30', 'true', 'Orlando, parki rozrywki, USA, rodzinna', '2024-06-14 22:00:00', '2024-06-21 22:00:00'),
(13, 'Safari w Kenii', 'Niezapomniana przygoda na safari, podczas której zobaczysz dzikie zwierzęta w ich naturalnym środowisku. Idealna dla całej rodziny!', 2, 'Afryka', '2 kenia.jpg', '9500', '2024-09-21 20:05:23', 'true', 'Kenia, safari, Afryka, rodzinna', '2024-07-04 22:00:00', '2024-07-11 22:00:00'),
(14, 'Zimowe ferie w Alpach', 'Aktywny wypoczynek w Alpach, gdzie cała rodzina może cieszyć się nartami i zimową zabawą.', 2, 'Europa', '3 alpy.jpg', '6200', '2024-09-21 20:14:43', 'true', 'Alpy, narty, zimowe ferie, rodzinna', '2024-12-19 23:00:00', '2024-12-26 23:00:00'),
(15, 'Rodzinne wakacje w Chorwacji', 'Relaksujące wakacje w Chorwacji nad Adriatykiem. Idealne dla rodzin z dziećmi.', 2, 'Europa', '4 chorwacja.jpg', '4500', '2024-09-21 20:15:18', 'true', 'Chorwacja, wakacje, Adriatyk, rodzinna', '2024-07-09 22:00:00', '2024-07-16 22:00:00'),
(16, 'Parki narodowe USA', 'Podróż przez najsłynniejsze parki narodowe Ameryki: Yellowstone, Yosemite i Grand Canyon.', 2, 'Ameryka Północna', '4 usa.jfif', '7800', '2024-09-21 20:17:19', 'true', 'parki narodowe, USA, przygoda, rodzinna', '2024-08-04 22:00:00', '2024-08-14 22:00:00'),
(17, 'Wyspy Kanaryjskie', 'Odkryj słońce, plaże i wulkaniczne krajobrazy Wysp Kanaryjskich, idealne na rodzinne wakacje.', 2, 'Europa', '6 Wyspy Kanaryjskie.jpeg', '5500', '2024-09-21 20:18:03', 'true', 'Wyspy Kanaryjskie, Hiszpania, rodzinne wakacje', '2024-04-14 22:00:00', '2024-04-21 22:00:00'),
(18, 'Weekend w Pradze', 'Zwiedź urokliwe uliczki i mosty Pragi. Idealny weekend dla miłośników historii i kultury.', 5, 'Europa', '1 praga.jpg', '1200 ', '2024-09-21 20:19:55', 'true', 'Praga, Czechy, weekend, kultura', '2024-05-02 22:00:00', '2024-05-04 22:00:00'),
(19, 'Kraków i Zakopane w 48 godzin', 'Odkryj piękno Krakowa i malowniczych Tatr podczas intensywnego, pełnego przygód weekendu.', 5, 'Europa', '1 krakow.jpg', '700', '2024-09-21 20:20:38', 'true', 'Kraków, Zakopane, góry, historia, przygoda', '2024-05-02 22:00:00', '2024-05-04 22:00:00'),
(20, 'Weekend w Rzymie', 'Szybki wypad do Rzymu - zwiedzanie Koloseum, Watykanu i degustacja włoskiej kuchni.', 5, 'Europa', '2 rzym.jpg', '1200', '2024-09-21 20:21:22', 'true', 'Rzym, Watykan, Włochy, historia, kultura', '2024-06-06 22:00:00', '2024-06-08 22:00:00'),
(21, 'Praga - Miasto Złotych Wież', 'Romantyczne spacery po Mostu Karola, wizyta w Zamku Praskim i relaks nad Wełtawą.', 5, 'Europa', '1 praga.jpg', '800 ', '2024-09-21 20:22:07', 'true', 'Praga, Czechy, zabytki, romantyzm', '2024-07-11 22:00:00', '2024-07-13 22:00:00'),
(22, 'Weekend w Barcelonie', 'Szybki wypad do słonecznej Barcelony - Gaudi, plaże i nocne życie.', 5, 'Europa', '4 barcelona.jpg', '1500', '2024-09-21 20:22:48', 'true', 'Barcelona, Hiszpania, architektura, morze', '2024-08-15 22:00:00', '2024-08-17 22:00:00'),
(23, 'Londyn w jeden weekend', 'Zwiedzanie Big Bena, Tower of London i spacer po Hyde Parku.', 5, 'Europa', '5 londyn.jpg', '1400', '2024-09-21 20:23:22', 'true', 'Londyn, Anglia, zabytki, historia', '2024-09-12 22:00:00', '2024-09-14 22:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_picture` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_picture`, `user_ip`, `user_address`, `user_mobile`, `role`) VALUES
(3, 'admin', 'admin', '$2y$10$ZctF3FVIGGrkNUbJ.734Y.hfmgRCWsq/oPxKglZ/eOKBzGxmRk5oG', 'admin_pic.png', '::1', 'admin', '987654123', 1),
(4, 'user', 'user@user.com', '$2y$10$pBVa6OfYxcQIsVaQrXCLAeoHCB.yOGKcHdPR9b0ROV3Qw0v4mkXAm', 'user_pic.jpeg', '::1', 'user', '123456789', 0),
(6, 'user1', 'user1', '$2y$10$DRBS4lPhpdwaUZdFs4vgL.RUP/mWwiVNKfztt6AM7UvffOSCfwaMa', 'user1.jfif', '::1', 'user1', '987654321', 0),
(7, 'user3', 'user3@gmail.com', '$2y$10$28KUo13eXFlpEc5Fwwcvh.eDPmQoXvfNStxKJ1aOdpHxOreotwpsa', 'user2.jpeg', '::1', 'Katowice, Korfantego 2/8', '678543267', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_trips` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `amount`, `invoice_number`, `total_trips`, `order_date`, `order_status`, `quantity`, `trip_id`) VALUES
(5, 5, 28000, 690012398, 5, '2024-09-21 20:13:16', 'w trakcie realizacji', 5, 9),
(6, 4, 47500, 2007595245, 5, '2024-09-21 20:27:08', 'przyjety do realizacji', 5, 13),
(7, 4, 5600, 1988467857, 1, '2024-09-21 20:37:23', 'przyjety do realizacji', 1, 9),
(8, 7, 13500, 392478960, 3, '2024-09-21 22:41:46', 'przyjety do realizacji', 3, 6),
(9, 7, 14700, 392478960, 4, '2024-09-21 22:41:46', 'przyjety do realizacji', 1, 20),
(10, 4, 9500, 595488792, 1, '2024-09-21 23:25:45', 'przyjety do realizacji', 1, 13);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indeksy dla tabeli `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeksy dla tabeli `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indeksy dla tabeli `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksy dla tabeli `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
