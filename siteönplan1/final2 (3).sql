-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Haz 2024, 11:39:51
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `final2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilan`
--

CREATE TABLE `ilan` (
  `id` int(11) NOT NULL,
  `kalkis_yeri` varchar(255) NOT NULL,
  `kalkis_ilçesi` varchar(100) NOT NULL,
  `varis_yeri` varchar(255) NOT NULL,
  `varis_ilçesi` varchar(100) NOT NULL,
  `kilo` int(11) NOT NULL,
  `tarih` date DEFAULT NULL,
  `fiyat` int(100) NOT NULL,
  `acıklama` varchar(100) NOT NULL,
  `eposta` varchar(100) DEFAULT NULL,
  `durum` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `ilan`
--

INSERT INTO `ilan` (`id`, `kalkis_yeri`, `kalkis_ilçesi`, `varis_yeri`, `varis_ilçesi`, `kilo`, `tarih`, `fiyat`, `acıklama`, `eposta`, `durum`) VALUES
(33, 'İstanbul', 'Adalar', 'Ankara', 'Altındağ', 5, '2024-04-14', 200, 'asdf', NULL, NULL),
(34, 'İstanbul', 'Adalar', 'Ankara', 'Altındağ', 5, '2024-04-07', 200, 'hgj', NULL, NULL),
(35, 'Ankara', 'Altındağ', 'İstanbul', 'Adalar', 5, '2024-04-14', 200, 'jhg', NULL, NULL),
(36, 'İstanbul', 'Arnavutköy', 'Ankara', 'Beypazarı', 5, '2024-04-28', 200, 'ewrdrtg', NULL, NULL),
(37, 'İstanbul', 'Adalar', 'Ankara', 'Altındağ', 5, '2024-04-19', 200, '886KLBH', NULL, NULL),
(38, 'Ankara', 'Ayaş', 'İstanbul', 'Ataşehir', 9, '2024-04-27', 555, 'BIJK', NULL, NULL),
(39, 'İstanbul', 'Bağcılar', 'İstanbul', 'Beyoğlu', 25, '2024-05-24', 67, 'hjk', NULL, NULL),
(40, 'İstanbul', 'Adalar', 'Ankara', 'Altındağ', 12, '2024-05-18', 32, 'rf3uı', NULL, NULL),
(41, 'İstanbul', 'Beyoğlu', 'Ankara', 'Polatlı', 76, '2024-05-21', 76, 'jhjhghg', NULL, NULL),
(42, 'İstanbul', 'Beyoğlu', 'Ankara', 'Polatlı', 76, '2024-05-21', 76, 'jhjhghg', NULL, NULL),
(43, 'İstanbul', 'Adalar', 'Ankara', 'Altındağ', 45, '2024-05-25', 43, 'see', NULL, NULL),
(44, 'İstanbul', 'Gaziosmanpaşa', 'Ankara', 'Elmadağ', 5, '2024-06-27', 852, '7777', NULL, NULL),
(45, 'İstanbul', 'Adalar', 'Ankara', 'Beypazarı', 56, '2024-06-20', 2, 'odfjş', 'hacokizilkaya664@gmail.com', NULL),
(46, 'İstanbul', 'Adalar', 'Ankara', 'Ayaş', 34, '2024-06-11', 21, 'err', 'hacokizilkaya664@gmail.com', 'Onaylandı'),
(47, 'İstanbul', 'Bakırköy', 'Ankara', 'Çankaya', 4, '2024-06-13', 200, 'JKLJ', 'hacokizilkaya664@gmail.com', 'Onaylandı'),
(48, 'Ardahan', 'Göle', 'Adıyaman', 'Gerger', 5, '2024-07-06', 6, 'wds', 'eekinci871@gmail.com', NULL),
(49, 'Adana', 'Ceyhan', 'Afyonkarahisar', 'Bayat', 9, '2024-06-23', 200, 'ee', 'narsuat5@gmail.com', NULL),
(50, 'Adana', 'Ceyhan', 'Adıyaman', 'Besni', 5, '2024-06-22', 200, 'gfd', 'eekinci871@gmail.com', NULL),
(51, 'Adana', 'Ceyhan', 'Afyonkarahisar', 'Dinar', 5, '2024-06-20', 200, 'hgfdz', 'eekinci871@gmail.com', NULL),
(52, 'Adıyaman', 'Gerger', 'Ağrı', 'Diyadin', 9, '2024-06-30', 200, 'rewq', 'eekinci871@gmail.com', NULL),
(53, 'Adıyaman', 'Sincik', 'Bilecik', 'Osmaneli', 9, '2024-06-30', 200, 'rewq', 'eekinci871@gmail.com', NULL),
(54, 'Adıyaman', 'Sincik', 'Bilecik', 'Osmaneli', 9, '2024-06-30', 200, 'rewq', 'eekinci871@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_bilgileri`
--

CREATE TABLE `kullanici_bilgileri` (
  `id` int(10) UNSIGNED NOT NULL,
  `sifirlamakodu` varchar(100) NOT NULL,
  `kullaniciadi` varchar(50) NOT NULL,
  `eposta` varchar(100) NOT NULL,
  `sifre` varchar(100) NOT NULL,
  `adi` varchar(100) DEFAULT NULL,
  `soyadi` varchar(100) DEFAULT NULL,
  `adres` varchar(100) NOT NULL,
  `ilce` varchar(20) NOT NULL,
  `il` varchar(20) NOT NULL,
  `kayittarihi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kullanici_bilgileri`
--

INSERT INTO `kullanici_bilgileri` (`id`, `sifirlamakodu`, `kullaniciadi`, `eposta`, `sifre`, `adi`, `soyadi`, `adres`, `ilce`, `il`, `kayittarihi`) VALUES
(34, '79ca7c85d882ea8e8d4f3973758a7342434b232c', 'enes789', 'eekinci871@gmail.com', '$2y$10$OrdJiJ42JDcXmnD1B9xxOOT6xKBqtCIE.3TdkViU.wJChC3lg6lN2', '', 'enver', 'ordu fatsa', 'fatsa', 'ordu', '2024-06-05 22:35:22'),
(35, 'a54708362c4207ff28aa2f12e066b3e47a82a89b', 'enes741', 'hacokizilkaya664@gmail.com', '$2y$10$FIhKo/m7mEPEhgo5vbR69exH8xO.5ZaYnnSiZ3.INLOpngbeoNuIu', NULL, NULL, '', '', '', '2024-06-06 00:03:19'),
(36, '5e64d265ac91abb1187f491b3ca2508099d151c3', 'suatnar65', 'narsuat5@gmail.com', '$2y$10$r5AiBuva8B3Cs62a5AUIm.cKvaRbdMAzU.BtZafLUgfayF7pKr6tC', NULL, NULL, '', '', '', '2024-06-09 00:07:17'),
(37, '', 'enes777', 'enesee@gmail.com', '$2y$10$IxLSr6i51WgJeVmGyRWuQehA98Y774wejKC.aNj8i1lC0jUwIBH/u', NULL, NULL, '', '', '', '2024-06-09 23:58:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon`
--

CREATE TABLE `rezervasyon` (
  `id` int(11) NOT NULL,
  `isim` varchar(100) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `eposta` varchar(100) NOT NULL,
  `urun` varchar(100) NOT NULL,
  `agirlik` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `rezervasyon`
--

INSERT INTO `rezervasyon` (`id`, `isim`, `telefon`, `eposta`, `urun`, `agirlik`) VALUES
(1, 'enes enver ekinci', '05541581235', 'narsuat5@gmail.com', 'haco', 10.00),
(2, 'enes enver ekinci', '05541581235', 'narsuat5@gmail.com', 'haco', 10.00),
(3, 'enes enver ekinci', '05541581235', 'narsuat5@gmail.com', 'haco', 10.00),
(4, 'enes enver ekinci', '05541581235', 'narsuat5@gmail.com', 'haco', 10.00),
(5, 'enes enver ekinci', '05541581235', 'narsuat5@gmail.com', 'haco', 10.00),
(6, 'enes enver ekinci', '05541581235', 'narsuat5@gmail.com', 'haco', 13.00),
(7, 'enes enver ekinci', '05541581235', 'narsuat5@gmail.com', 'haco', 12.00),
(8, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 7.00),
(9, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 7.00),
(10, 'enes enver ekinci', '05416456541', 'narsuat5@gmail.com', 'haco', 32.00),
(11, 'enes enver ekinci', '05416456541', 'narsuat5@gmail.com', 'haco', 32.00),
(12, 'enes enver ekinci', '05416456541', 'narsuat5@gmail.com', 'haco', 32.00),
(13, 'enes enver ekinci', '05416456541', 'narsuat5@gmail.com', 'haco', 32.00),
(14, 'enes enver ekinci', '05416456541', 'narsuat5@gmail.com', 'haco', 7.00),
(15, 'enes enver ekinci', '05416456541', 'narsuat5@gmail.com', 'haco', 7.00),
(16, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 9.00),
(17, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 5.00),
(18, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 5.00),
(19, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 5.00),
(20, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 6.00),
(21, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 6.00),
(22, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 6.00),
(23, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 6.00),
(24, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(25, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(26, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(27, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(28, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(29, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(30, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(31, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(32, 'suat nar', '05541581235', 'narsuat5@gmail.com', 'haco', 5.00),
(33, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 4.00),
(34, 're', '05416456541', 'narsuat5@gmail.com', 'haco', 2.00),
(35, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', -15.00),
(36, 'suat nar', '05416456541', 'narsuat5@gmail.com', 'haco', 5.00),
(37, 'enes enver ekinci', '05416456541', 'narsuat5@gmail.com', 'koli', 2.00);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ilan`
--
ALTER TABLE `ilan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici_bilgileri`
--
ALTER TABLE `kullanici_bilgileri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`kullaniciadi`),
  ADD UNIQUE KEY `eposta` (`eposta`);

--
-- Tablo için indeksler `rezervasyon`
--
ALTER TABLE `rezervasyon`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ilan`
--
ALTER TABLE `ilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_bilgileri`
--
ALTER TABLE `kullanici_bilgileri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon`
--
ALTER TABLE `rezervasyon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
