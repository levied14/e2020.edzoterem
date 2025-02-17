
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `edzok` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `leiras` text NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kor` int(11) NOT NULL,
  `eredmeny` varchar(255) NOT NULL,
  `kep_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `edzok` (`id`, `nev`, `leiras`, `telefon`, `email`, `kor`, `eredmeny`, `kep_url`) VALUES
(1, 'Vajda László', 'Több mint 10 éve vagyok személyi edző...', '+36 30 123 4567', 'laszlo@energym.hu', 35, 'Magyar bajnok 2019', 'edzo1.jpg'),
(2, 'Vancsik Róbert', '20 év testépítői tapasztalattal...', '+36 70 987 6543', 'robert@energym.hu', 42, '3x országos bajnok', 'edzo2.jpg'),
(3, 'Jónás Anna', 'Az emberek átalakulása nekem mindennél fontosabb...', '+36 20 555 4321', 'anna@energym.hu', 29, 'Nemzetközi verseny 2. hely', 'edzo3.jpg');


ALTER TABLE `edzok`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `edzok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;


