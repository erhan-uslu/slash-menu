-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 19 Nis 2023, 22:01:48
-- Sunucu sürümü: 10.3.38-MariaDB
-- PHP Sürümü: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `artiposm_brera`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alis_satis`
--

CREATE TABLE `alis_satis` (
  `id` int(11) NOT NULL,
  `islem_turu` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `miktar` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `islem_tarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `tutar` decimal(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alt_kategori`
--

CREATE TABLE `alt_kategori` (
  `id` int(11) NOT NULL,
  `kategori_ad` varchar(300) NOT NULL,
  `kategori_ust` varchar(10) NOT NULL,
  `sira` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bayiler`
--

CREATE TABLE `bayiler` (
  `id` int(11) NOT NULL,
  `bayi_ad` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `fatura_ad` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `firma_turu` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yetkili_ad` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `durum` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adres` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sehir_id` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kod` varchar(50) NOT NULL,
  `bolge_id` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `bayiler`
--

INSERT INTO `bayiler` (`id`, `bayi_ad`, `fatura_ad`, `firma_turu`, `yetkili_ad`, `durum`, `adres`, `mail`, `telefon`, `sehir_id`, `sifre`, `kod`, `bolge_id`) VALUES
(1, 'Cadde Medya ', '12121', 'Limited / A.Ş', 'Burhan Çaçan ', '1', 'Sivas Caddesi, Duygu Apt. Kat 3 No:6 ', 'info@caddemedya.com.tr', '0506 066 52 26 ', '38', '123', '0', '529'),
(25, '', ' ', ' ', 'Deneme', '1', 'ss', 'wesley.contra@gmail.com', '1212', '38', '123', '0', ' '),
(26, '', '2233112', '', 'weq', 'qew', '1', 'info@caddqweemedya.com.tr', 'qweqweqe', '12', '147258qweqwe', '23608757335', '160'),
(27, '', 'asda', '', 'asdads', 'ad', '1', 'info@caddeasdmedya.com.tr', 'asd', '11', '123asd', '43941643798', '149');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firma_bilgileri`
--

CREATE TABLE `firma_bilgileri` (
  `firma_id` int(11) NOT NULL,
  `tema` int(11) NOT NULL,
  `firm_id` int(11) NOT NULL,
  `firma_ad` varchar(100) NOT NULL,
  `firma_adres` varchar(500) NOT NULL,
  `firma_numara` varchar(300) NOT NULL,
  `firma_hakkimizda` text NOT NULL,
  `facebook` varchar(300) NOT NULL,
  `instagram` varchar(300) NOT NULL,
  `twitter` varchar(300) NOT NULL,
  `firma_logo` varchar(800) NOT NULL,
  `firma_mail` text NOT NULL,
  `anahtar_kelime` varchar(200) NOT NULL,
  `meta_aciklama` varchar(350) NOT NULL,
  `firma_whatsapp` varchar(250) NOT NULL,
  `site_yolu` varchar(500) NOT NULL,
  `maps` varchar(700) NOT NULL,
  `analytics` varchar(700) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `firma_bilgileri`
--

INSERT INTO `firma_bilgileri` (`firma_id`, `tema`, `firm_id`, `firma_ad`, `firma_adres`, `firma_numara`, `firma_hakkimizda`, `facebook`, `instagram`, `twitter`, `firma_logo`, `firma_mail`, `anahtar_kelime`, `meta_aciklama`, `firma_whatsapp`, `site_yolu`, `maps`, `analytics`) VALUES
(1, 4, 86, 'Qr Menü', '', '', '', ' ', '', '  ', 'images/logos/logo-index3.png', '', '', '', '', 'https://brera.artiposmenu.com/', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilceler`
--

CREATE TABLE `ilceler` (
  `id` int(11) NOT NULL,
  `sehir_id` int(11) DEFAULT NULL,
  `ilce` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `ilceler`
--

INSERT INTO `ilceler` (`id`, `sehir_id`, `ilce`) VALUES
(1, 1, 'Seyhan'),
(2, 1, 'Ceyhan'),
(3, 1, 'Feke'),
(4, 1, 'Karaisalı'),
(5, 1, 'Karataş'),
(6, 1, 'Kozan'),
(7, 1, 'Pozantı'),
(8, 1, 'Saimbeyli'),
(9, 1, 'Tufanbeyli'),
(10, 1, 'Yumurtalık'),
(11, 1, 'Yüreğir'),
(12, 1, 'Aladağ'),
(13, 1, 'İmamoğlu'),
(14, 1, 'Sarıçam'),
(15, 1, 'Çukurova'),
(16, 2, 'Adıyaman Merkez'),
(17, 2, 'Besni'),
(18, 2, 'Çelikhan'),
(19, 2, 'Gerger'),
(20, 2, 'Gölbaşı / Adıyaman'),
(21, 2, 'Kahta'),
(22, 2, 'Samsat'),
(23, 2, 'Sincik'),
(24, 2, 'Tut'),
(25, 3, 'Afyonkarahisar Merkez'),
(26, 3, 'Bolvadin'),
(27, 3, 'Çay'),
(28, 3, 'Dazkırı'),
(29, 3, 'Dinar'),
(30, 3, 'Emirdağ'),
(31, 3, 'İhsaniye'),
(32, 3, 'Sandıklı'),
(33, 3, 'Sinanpaşa'),
(34, 3, 'Sultandağı'),
(35, 3, 'Şuhut'),
(36, 3, 'Başmakçı'),
(37, 3, 'Bayat / Afyonkarahisar'),
(38, 3, 'İscehisar'),
(39, 3, 'Çobanlar'),
(40, 3, 'Evciler'),
(41, 3, 'Hocalar'),
(42, 3, 'Kızılören'),
(43, 4, 'Ağrı Merkez'),
(44, 4, 'Diyadin'),
(45, 4, 'Doğubayazıt'),
(46, 4, 'Eleşkirt'),
(47, 4, 'Hamur'),
(48, 4, 'Patnos'),
(49, 4, 'Taşlıçay'),
(50, 4, 'Tutak'),
(51, 5, 'Amasya Merkez'),
(52, 5, 'Göynücek'),
(53, 5, 'Gümüşhacıköy'),
(54, 5, 'Merzifon'),
(55, 5, 'Suluova'),
(56, 5, 'Taşova'),
(57, 5, 'Hamamözü'),
(58, 6, 'Altındağ'),
(59, 6, 'Ayaş'),
(60, 6, 'Bala'),
(61, 6, 'Beypazarı'),
(62, 6, 'Çamlıdere'),
(63, 6, 'Çankaya'),
(64, 6, 'Çubuk'),
(65, 6, 'Elmadağ'),
(66, 6, 'Güdül'),
(67, 6, 'Haymana'),
(68, 6, 'Kalecik'),
(69, 6, 'Kızılcahamam'),
(70, 6, 'Nallıhan'),
(71, 6, 'Polatlı'),
(72, 6, 'Şereflikoçhisar'),
(73, 6, 'Yenimahalle'),
(74, 6, 'Gölbaşı / Ankara'),
(75, 6, 'Keçiören'),
(76, 6, 'Mamak'),
(77, 6, 'Sincan'),
(78, 6, 'Kazan'),
(79, 6, 'Akyurt'),
(80, 6, 'Etimesgut'),
(81, 6, 'Evren'),
(82, 6, 'Pursaklar'),
(83, 7, 'Akseki'),
(84, 7, 'Alanya'),
(85, 7, 'Elmalı'),
(86, 7, 'Finike'),
(87, 7, 'Gazipaşa'),
(88, 7, 'Gündoğmuş'),
(89, 7, 'Kaş'),
(90, 7, 'Korkuteli'),
(91, 7, 'Kumluca'),
(92, 7, 'Manavgat'),
(93, 7, 'Serik'),
(94, 7, 'Demre'),
(95, 7, 'İbradı'),
(96, 7, 'Kemer / Antalya'),
(97, 7, 'Aksu / Antalya'),
(98, 7, 'Döşemealtı'),
(99, 7, 'Kepez'),
(100, 7, 'Konyaaltı'),
(101, 7, 'Muratpaşa'),
(102, 8, 'Ardanuç'),
(103, 8, 'Arhavi'),
(104, 8, 'Artvin Merkez'),
(105, 8, 'Borçka'),
(106, 8, 'Hopa'),
(107, 8, 'Şavşat'),
(108, 8, 'Yusufeli'),
(109, 8, 'Murgul'),
(110, 9, 'Bozdoğan'),
(111, 9, 'Çine'),
(112, 9, 'Germencik'),
(113, 9, 'Karacasu'),
(114, 9, 'Koçarlı'),
(115, 9, 'Kuşadası'),
(116, 9, 'Kuyucak'),
(117, 9, 'Nazilli'),
(118, 9, 'Söke'),
(119, 9, 'Sultanhisar'),
(120, 9, 'Yenipazar / Aydın'),
(121, 9, 'Buharkent'),
(122, 9, 'İncirliova'),
(123, 9, 'Karpuzlu'),
(124, 9, 'Köşk'),
(125, 9, 'Didim'),
(126, 9, 'Efeler'),
(127, 10, 'Ayvalık'),
(128, 10, 'Balya'),
(129, 10, 'Bandırma'),
(130, 10, 'Bigadiç'),
(131, 10, 'Burhaniye'),
(132, 10, 'Dursunbey'),
(133, 10, 'Edremit / Balıkesir'),
(134, 10, 'Erdek'),
(135, 10, 'Gönen / Balıkesir'),
(136, 10, 'Havran'),
(137, 10, 'İvrindi'),
(138, 10, 'Kepsut'),
(139, 10, 'Manyas'),
(140, 10, 'Savaştepe'),
(141, 10, 'Sındırgı'),
(142, 10, 'Susurluk'),
(143, 10, 'Marmara'),
(144, 10, 'Gömeç'),
(145, 10, 'Altıeylül'),
(146, 10, 'Karesi'),
(147, 11, 'Bilecik Merkez'),
(148, 11, 'Bozüyük'),
(149, 11, 'Gölpazarı'),
(150, 11, 'Osmaneli'),
(151, 11, 'Pazaryeri'),
(152, 11, 'Söğüt'),
(153, 11, 'Yenipazar / Bilecik'),
(154, 11, 'İnhisar'),
(155, 12, 'Bingöl Merkez'),
(156, 12, 'Genç'),
(157, 12, 'Karlıova'),
(158, 12, 'Kiğı'),
(159, 12, 'Solhan'),
(160, 12, 'Adaklı'),
(161, 12, 'Yayladere'),
(162, 12, 'Yedisu'),
(163, 13, 'Adilcevaz'),
(164, 13, 'Ahlat'),
(165, 13, 'Bitlis Merkez'),
(166, 13, 'Hizan'),
(167, 13, 'Mutki'),
(168, 13, 'Tatvan'),
(169, 13, 'Güroymak'),
(170, 14, 'Bolu Merkez'),
(171, 14, 'Gerede'),
(172, 14, 'Göynük'),
(173, 14, 'Kıbrıscık'),
(174, 14, 'Mengen'),
(175, 14, 'Mudurnu'),
(176, 14, 'Seben'),
(177, 14, 'Dörtdivan'),
(178, 14, 'Yeniçağa'),
(179, 15, 'Ağlasun'),
(180, 15, 'Bucak'),
(181, 15, 'Burdur Merkez'),
(182, 15, 'Gölhisar'),
(183, 15, 'Tefenni'),
(184, 15, 'Yeşilova'),
(185, 15, 'Karamanlı'),
(186, 15, 'Kemer / Burdur'),
(187, 15, 'Altınyayla / Burdur'),
(188, 15, 'Çavdır'),
(189, 15, 'Çeltikçi'),
(190, 16, 'Gemlik'),
(191, 16, 'İnegöl'),
(192, 16, 'İznik'),
(193, 16, 'Karacabey'),
(194, 16, 'Keles'),
(195, 16, 'Mudanya'),
(196, 16, 'Mustafakemalpaşa'),
(197, 16, 'Orhaneli'),
(198, 16, 'Orhangazi'),
(199, 16, 'Yenişehir / Bursa'),
(200, 16, 'Büyükorhan'),
(201, 16, 'Harmancık'),
(202, 16, 'Nilüfer'),
(203, 16, 'Osmangazi'),
(204, 16, 'Yıldırım'),
(205, 16, 'Gürsu'),
(206, 16, 'Kestel'),
(207, 17, 'Ayvacık / Çanakkale'),
(208, 17, 'Bayramiç'),
(209, 17, 'Biga'),
(210, 17, 'Bozcaada'),
(211, 17, 'Çan'),
(212, 17, 'Çanakkale Merkez'),
(213, 17, 'Eceabat'),
(214, 17, 'Ezine'),
(215, 17, 'Gelibolu'),
(216, 17, 'Gökçeada'),
(217, 17, 'Lapseki'),
(218, 17, 'Yenice / Çanakkale'),
(219, 18, 'Çankırı Merkez'),
(220, 18, 'Çerkeş'),
(221, 18, 'Eldivan'),
(222, 18, 'Ilgaz'),
(223, 18, 'Kurşunlu'),
(224, 18, 'Orta'),
(225, 18, 'Şabanözü'),
(226, 18, 'Yapraklı'),
(227, 18, 'Atkaracalar'),
(228, 18, 'Kızılırmak'),
(229, 18, 'Bayramören'),
(230, 18, 'Korgun'),
(231, 19, 'Alaca'),
(232, 19, 'Bayat / Çorum'),
(233, 19, 'Çorum Merkez'),
(234, 19, 'İskilip'),
(235, 19, 'Kargı'),
(236, 19, 'Mecitözü'),
(237, 19, 'Ortaköy / Çorum'),
(238, 19, 'Osmancık'),
(239, 19, 'Sungurlu'),
(240, 19, 'Boğazkale'),
(241, 19, 'Uğurludağ'),
(242, 19, 'Dodurga'),
(243, 19, 'Laçin'),
(244, 19, 'Oğuzlar'),
(245, 20, 'Acıpayam'),
(246, 20, 'Buldan'),
(247, 20, 'Çal'),
(248, 20, 'Çameli'),
(249, 20, 'Çardak'),
(250, 20, 'Çivril'),
(251, 20, 'Güney'),
(252, 20, 'Kale / Denizli'),
(253, 20, 'Sarayköy'),
(254, 20, 'Tavas'),
(255, 20, 'Babadağ'),
(256, 20, 'Bekilli'),
(257, 20, 'Honaz'),
(258, 20, 'Serinhisar'),
(259, 20, 'Pamukkale'),
(260, 20, 'Baklan'),
(261, 20, 'Beyağaç'),
(262, 20, 'Bozkurt / Denizli'),
(263, 20, 'Merkezefendi'),
(264, 21, 'Bismil'),
(265, 21, 'Çermik'),
(266, 21, 'Çınar'),
(267, 21, 'Çüngüş'),
(268, 21, 'Dicle'),
(269, 21, 'Ergani'),
(270, 21, 'Hani'),
(271, 21, 'Hazro'),
(272, 21, 'Kulp'),
(273, 21, 'Lice'),
(274, 21, 'Silvan'),
(275, 21, 'Eğil'),
(276, 21, 'Kocaköy'),
(277, 21, 'Bağlar'),
(278, 21, 'Kayapınar'),
(279, 21, 'Sur'),
(280, 21, 'Yenişehir / Diyarbakır'),
(281, 22, 'Edirne Merkez'),
(282, 22, 'Enez'),
(283, 22, 'Havsa'),
(284, 22, 'İpsala'),
(285, 22, 'Keşan'),
(286, 22, 'Lalapaşa'),
(287, 22, 'Meriç'),
(288, 22, 'Uzunköprü'),
(289, 22, 'Süloğlu'),
(290, 23, 'Ağın'),
(291, 23, 'Baskil'),
(292, 23, 'Elazığ Merkez'),
(293, 23, 'Karakoçan'),
(294, 23, 'Keban'),
(295, 23, 'Maden'),
(296, 23, 'Palu'),
(297, 23, 'Sivrice'),
(298, 23, 'Arıcak'),
(299, 23, 'Kovancılar'),
(300, 23, 'Alacakaya'),
(301, 24, 'Çayırlı'),
(302, 24, 'Erzincan Merkez'),
(303, 24, 'İliç'),
(304, 24, 'Kemah'),
(305, 24, 'Kemaliye'),
(306, 24, 'Refahiye'),
(307, 24, 'Tercan'),
(308, 24, 'Üzümlü'),
(309, 24, 'Otlukbeli'),
(310, 25, 'Aşkale'),
(311, 25, 'Çat'),
(312, 25, 'Hınıs'),
(313, 25, 'Horasan'),
(314, 25, 'İspir'),
(315, 25, 'Karayazı'),
(316, 25, 'Narman'),
(317, 25, 'Oltu'),
(318, 25, 'Olur'),
(319, 25, 'Pasinler'),
(320, 25, 'Şenkaya'),
(321, 25, 'Tekman'),
(322, 25, 'Tortum'),
(323, 25, 'Karaçoban'),
(324, 25, 'Uzundere'),
(325, 25, 'Pazaryolu'),
(326, 25, 'Aziziye'),
(327, 25, 'Köprüköy'),
(328, 25, 'Palandöken'),
(329, 25, 'Yakutiye'),
(330, 26, 'Çifteler'),
(331, 26, 'Mahmudiye'),
(332, 26, 'Mihalıççık'),
(333, 26, 'Sarıcakaya'),
(334, 26, 'Seyitgazi'),
(335, 26, 'Sivrihisar'),
(336, 26, 'Alpu'),
(337, 26, 'Beylikova'),
(338, 26, 'İnönü'),
(339, 26, 'Günyüzü'),
(340, 26, 'Han'),
(341, 26, 'Mihalgazi'),
(342, 26, 'Odunpazarı'),
(343, 26, 'Tepebaşı'),
(344, 27, 'Araban'),
(345, 27, 'İslahiye'),
(346, 27, 'Nizip'),
(347, 27, 'Oğuzeli'),
(348, 27, 'Yavuzeli'),
(349, 27, 'Şahinbey'),
(350, 27, 'Şehitkamil'),
(351, 27, 'Karkamış'),
(352, 27, 'Nurdağı'),
(353, 28, 'Alucra'),
(354, 28, 'Bulancak'),
(355, 28, 'Dereli'),
(356, 28, 'Espiye'),
(357, 28, 'Eynesil'),
(358, 28, 'Giresun Merkez'),
(359, 28, 'Görele'),
(360, 28, 'Keşap'),
(361, 28, 'Şebinkarahisar'),
(362, 28, 'Tirebolu'),
(363, 28, 'Piraziz'),
(364, 28, 'Yağlıdere'),
(365, 28, 'Çamoluk'),
(366, 28, 'Çanakçı'),
(367, 28, 'Doğankent'),
(368, 28, 'Güce'),
(369, 29, 'Gümüşhane Merkez'),
(370, 29, 'Kelkit'),
(371, 29, 'Şiran'),
(372, 29, 'Torul'),
(373, 29, 'Köse'),
(374, 29, 'Kürtün'),
(375, 30, 'Çukurca'),
(376, 30, 'Hakkari Merkez'),
(377, 30, 'Şemdinli'),
(378, 30, 'Yüksekova'),
(379, 31, 'Altınözü'),
(380, 31, 'Dörtyol'),
(381, 31, 'Hassa'),
(382, 31, 'İskenderun'),
(383, 31, 'Kırıkhan'),
(384, 31, 'Reyhanlı'),
(385, 31, 'Samandağ'),
(386, 31, 'Yayladağı'),
(387, 31, 'Erzin'),
(388, 31, 'Belen'),
(389, 31, 'Kumlu'),
(390, 31, 'Antakya'),
(391, 31, 'Arsuz'),
(392, 31, 'Defne'),
(393, 31, 'Payas'),
(394, 32, 'Atabey'),
(395, 32, 'Eğirdir'),
(396, 32, 'Gelendost'),
(397, 32, 'Isparta Merkez'),
(398, 32, 'Keçiborlu'),
(399, 32, 'Senirkent'),
(400, 32, 'Sütçüler'),
(401, 32, 'Şarkikaraağaç'),
(402, 32, 'Uluborlu'),
(403, 32, 'Yalvaç'),
(404, 32, 'Aksu / Isparta'),
(405, 32, 'Gönen / Isparta'),
(406, 32, 'Yenişarbademli'),
(407, 33, 'Anamur'),
(408, 33, 'Erdemli'),
(409, 33, 'Gülnar'),
(410, 33, 'Mut'),
(411, 33, 'Silifke'),
(412, 33, 'Tarsus'),
(413, 33, 'Aydıncık / Mersin'),
(414, 33, 'Bozyazı'),
(415, 33, 'Çamlıyayla'),
(416, 33, 'Akdeniz'),
(417, 33, 'Mezitli'),
(418, 33, 'Toroslar'),
(419, 33, 'Yenişehir / Mersin'),
(420, 34, 'Adalar'),
(421, 34, 'Bakırköy'),
(422, 34, 'Beşiktaş'),
(423, 34, 'Beykoz'),
(424, 34, 'Beyoğlu'),
(425, 34, 'Çatalca'),
(426, 34, 'Eyüp'),
(427, 34, 'Fatih'),
(428, 34, 'Gaziosmanpaşa'),
(429, 34, 'Kadıköy'),
(430, 34, 'Kartal'),
(431, 34, 'Sarıyer'),
(432, 34, 'Silivri'),
(433, 34, 'Şile'),
(434, 34, 'Şişli'),
(435, 34, 'Üsküdar'),
(436, 34, 'Zeytinburnu'),
(437, 34, 'Büyükçekmece'),
(438, 34, 'Kağıthane'),
(439, 34, 'Küçükçekmece'),
(440, 34, 'Pendik'),
(441, 34, 'Ümraniye'),
(442, 34, 'Bayrampaşa'),
(443, 34, 'Avcılar'),
(444, 34, 'Bağcılar'),
(445, 34, 'Bahçelievler'),
(446, 34, 'Güngören'),
(447, 34, 'Maltepe'),
(448, 34, 'Sultanbeyli'),
(449, 34, 'Tuzla'),
(450, 34, 'Esenler'),
(451, 34, 'Arnavutköy'),
(452, 34, 'Ataşehir'),
(453, 34, 'Başakşehir'),
(454, 34, 'Beylikdüzü'),
(455, 34, 'Çekmeköy'),
(456, 34, 'Esenyurt'),
(457, 34, 'Sancaktepe'),
(458, 34, 'Sultangazi'),
(459, 35, 'Aliağa'),
(460, 35, 'Bayındır'),
(461, 35, 'Bergama'),
(462, 35, 'Bornova'),
(463, 35, 'Çeşme'),
(464, 35, 'Dikili'),
(465, 35, 'Foça'),
(466, 35, 'Karaburun'),
(467, 35, 'Karşıyaka'),
(468, 35, 'Kemalpaşa'),
(469, 35, 'Kınık'),
(470, 35, 'Kiraz'),
(471, 35, 'Menemen'),
(472, 35, 'Ödemiş'),
(473, 35, 'Seferihisar'),
(474, 35, 'Selçuk'),
(475, 35, 'Tire'),
(476, 35, 'Torbalı'),
(477, 35, 'Urla'),
(478, 35, 'Beydağ'),
(479, 35, 'Buca'),
(480, 35, 'Konak'),
(481, 35, 'Menderes'),
(482, 35, 'Balçova'),
(483, 35, 'Çiğli'),
(484, 35, 'Gaziemir'),
(485, 35, 'Narlıdere'),
(486, 35, 'Güzelbahçe'),
(487, 35, 'Bayraklı'),
(488, 35, 'Karabağlar'),
(489, 36, 'Arpaçay'),
(490, 36, 'Digor'),
(491, 36, 'Kağızman'),
(492, 36, 'Kars Merkez'),
(493, 36, 'Sarıkamış'),
(494, 36, 'Selim'),
(495, 36, 'Susuz'),
(496, 36, 'Akyaka'),
(497, 37, 'Abana'),
(498, 37, 'Araç'),
(499, 37, 'Azdavay'),
(500, 37, 'Bozkurt / Kastamonu'),
(501, 37, 'Cide'),
(502, 37, 'Çatalzeytin'),
(503, 37, 'Daday'),
(504, 37, 'Devrekani'),
(505, 37, 'İnebolu'),
(506, 37, 'Kastamonu Merkez'),
(507, 37, 'Küre'),
(508, 37, 'Taşköprü'),
(509, 37, 'Tosya'),
(510, 37, 'İhsangazi'),
(511, 37, 'Pınarbaşı / Kastamonu'),
(512, 37, 'Şenpazar'),
(513, 37, 'Ağlı'),
(514, 37, 'Doğanyurt'),
(515, 37, 'Hanönü'),
(516, 37, 'Seydiler'),
(517, 38, 'Bünyan'),
(518, 38, 'Develi'),
(519, 38, 'Felahiye'),
(520, 38, 'İncesu'),
(521, 38, 'Pınarbaşı'),
(522, 38, 'Sarıoğlan'),
(523, 38, 'Sarız'),
(524, 38, 'Tomarza'),
(525, 38, 'Yahyalı'),
(526, 38, 'Yeşilhisar'),
(527, 38, 'Akkışla'),
(528, 38, 'Talas'),
(529, 38, 'Kocasinan'),
(530, 38, 'Melikgazi'),
(531, 38, 'Hacılar'),
(532, 38, 'Özvatan'),
(533, 39, 'Babaeski'),
(534, 39, 'Demirköy'),
(535, 39, 'Kırklareli Merkez'),
(536, 39, 'Kofçaz'),
(537, 39, 'Lüleburgaz'),
(538, 39, 'Pehlivanköy'),
(539, 39, 'Pınarhisar'),
(540, 39, 'Vize'),
(541, 40, 'Çiçekdağı'),
(542, 40, 'Kaman'),
(543, 40, 'Kırşehir Merkez'),
(544, 40, 'Mucur'),
(545, 40, 'Akpınar'),
(546, 40, 'Akçakent'),
(547, 40, 'Boztepe'),
(548, 41, 'Gebze'),
(549, 41, 'Gölcük'),
(550, 41, 'Kandıra'),
(551, 41, 'Karamürsel'),
(552, 41, 'Körfez'),
(553, 41, 'Derince'),
(554, 41, 'Başiskele'),
(555, 41, 'Çayırova'),
(556, 41, 'Darıca'),
(557, 41, 'Dilovası'),
(558, 41, 'İzmit'),
(559, 41, 'Kartepe'),
(560, 42, 'Akşehir'),
(561, 42, 'Beyşehir'),
(562, 42, 'Bozkır'),
(563, 42, 'Cihanbeyli'),
(564, 42, 'Çumra'),
(565, 42, 'Doğanhisar'),
(566, 42, 'Ereğli / Konya'),
(567, 42, 'Hadim'),
(568, 42, 'Ilgın'),
(569, 42, 'Kadınhanı'),
(570, 42, 'Karapınar'),
(571, 42, 'Kulu'),
(572, 42, 'Sarayönü'),
(573, 42, 'Seydişehir'),
(574, 42, 'Yunak'),
(575, 42, 'Akören'),
(576, 42, 'Altınekin'),
(577, 42, 'Derebucak'),
(578, 42, 'Hüyük'),
(579, 42, 'Karatay'),
(580, 42, 'Meram'),
(581, 42, 'Selçuklu'),
(582, 42, 'Taşkent'),
(583, 42, 'Ahırlı'),
(584, 42, 'Çeltik'),
(585, 42, 'Derbent'),
(586, 42, 'Emirgazi'),
(587, 42, 'Güneysınır'),
(588, 42, 'Halkapınar'),
(589, 42, 'Tuzlukçu'),
(590, 42, 'Yalıhüyük'),
(591, 43, 'Altıntaş'),
(592, 43, 'Domaniç'),
(593, 43, 'Emet'),
(594, 43, 'Gediz'),
(595, 43, 'Kütahya Merkez'),
(596, 43, 'Simav'),
(597, 43, 'Tavşanlı'),
(598, 43, 'Aslanapa'),
(599, 43, 'Dumlupınar'),
(600, 43, 'Hisarcık'),
(601, 43, 'Şaphane'),
(602, 43, 'Çavdarhisar'),
(603, 43, 'Pazarlar'),
(604, 44, 'Akçadağ'),
(605, 44, 'Arapgir'),
(606, 44, 'Arguvan'),
(607, 44, 'Darende'),
(608, 44, 'Doğanşehir'),
(609, 44, 'Hekimhan'),
(610, 44, 'Pütürge'),
(611, 44, 'Yeşilyurt / Malatya'),
(612, 44, 'Battalgazi'),
(613, 44, 'Doğanyol'),
(614, 44, 'Kale / Malatya'),
(615, 44, 'Kuluncak'),
(616, 44, 'Yazıhan'),
(617, 45, 'Akhisar'),
(618, 45, 'Alaşehir'),
(619, 45, 'Demirci'),
(620, 45, 'Gördes'),
(621, 45, 'Kırkağaç'),
(622, 45, 'Kula'),
(623, 45, 'Salihli'),
(624, 45, 'Sarıgöl'),
(625, 45, 'Saruhanlı'),
(626, 45, 'Selendi'),
(627, 45, 'Soma'),
(628, 45, 'Turgutlu'),
(629, 45, 'Ahmetli'),
(630, 45, 'Gölmarmara'),
(631, 45, 'Köprübaşı / Manisa'),
(632, 45, 'Şehzadeler'),
(633, 45, 'Yunusemre'),
(634, 46, 'Afşin'),
(635, 46, 'Andırın'),
(636, 46, 'Elbistan'),
(637, 46, 'Göksun'),
(638, 46, 'Pazarcık'),
(639, 46, 'Türkoğlu'),
(640, 46, 'Çağlayancerit'),
(641, 46, 'Ekinözü'),
(642, 46, 'Nurhak'),
(643, 46, 'Dulkadiroğlu'),
(644, 46, 'Onikişubat'),
(645, 47, 'Derik'),
(646, 47, 'Kızıltepe'),
(647, 47, 'Mazıdağı'),
(648, 47, 'Midyat'),
(649, 47, 'Nusaybin'),
(650, 47, 'Ömerli'),
(651, 47, 'Savur'),
(652, 47, 'Dargeçit'),
(653, 47, 'Yeşilli'),
(654, 47, 'Artuklu'),
(655, 48, 'Bodrum'),
(656, 48, 'Datça'),
(657, 48, 'Fethiye'),
(658, 48, 'Köyceğiz'),
(659, 48, 'Marmaris'),
(660, 48, 'Milas'),
(661, 48, 'Ula'),
(662, 48, 'Yatağan'),
(663, 48, 'Dalaman'),
(664, 48, 'Ortaca'),
(665, 48, 'Kavaklıdere'),
(666, 48, 'Menteşe'),
(667, 48, 'Seydikemer'),
(668, 49, 'Bulanık'),
(669, 49, 'Malazgirt'),
(670, 49, 'Muş Merkez'),
(671, 49, 'Varto'),
(672, 49, 'Hasköy'),
(673, 49, 'Korkut'),
(674, 50, 'Avanos'),
(675, 50, 'Derinkuyu'),
(676, 50, 'Gülşehir'),
(677, 50, 'Hacıbektaş'),
(678, 50, 'Kozaklı'),
(679, 50, 'Nevşehir Merkez'),
(680, 50, 'Ürgüp'),
(681, 50, 'Acıgöl'),
(682, 51, 'Bor'),
(683, 51, 'Çamardı'),
(684, 51, 'Niğde Merkez'),
(685, 51, 'Ulukışla'),
(686, 51, 'Altunhisar'),
(687, 51, 'Çiftlik'),
(688, 52, 'Akkuş'),
(689, 52, 'Aybastı'),
(690, 52, 'Fatsa'),
(691, 52, 'Gölköy'),
(692, 52, 'Korgan'),
(693, 52, 'Kumru'),
(694, 52, 'Mesudiye'),
(695, 52, 'Perşembe'),
(696, 52, 'Ulubey / Ordu'),
(697, 52, 'Ünye'),
(698, 52, 'Gülyalı'),
(699, 52, 'Gürgentepe'),
(700, 52, 'Çamaş'),
(701, 52, 'Çatalpınar'),
(702, 52, 'Çaybaşı'),
(703, 52, 'İkizce'),
(704, 52, 'Kabadüz'),
(705, 52, 'Kabataş'),
(706, 52, 'Altınordu'),
(707, 53, 'Ardeşen'),
(708, 53, 'Çamlıhemşin'),
(709, 53, 'Çayeli'),
(710, 53, 'Fındıklı'),
(711, 53, 'İkizdere'),
(712, 53, 'Kalkandere'),
(713, 53, 'Pazar / Rize'),
(714, 53, 'Rize Merkez'),
(715, 53, 'Güneysu'),
(716, 53, 'Derepazarı'),
(717, 53, 'Hemşin'),
(718, 53, 'İyidere'),
(719, 54, 'Akyazı'),
(720, 54, 'Geyve'),
(721, 54, 'Hendek'),
(722, 54, 'Karasu'),
(723, 54, 'Kaynarca'),
(724, 54, 'Sapanca'),
(725, 54, 'Kocaali'),
(726, 54, 'Pamukova'),
(727, 54, 'Taraklı'),
(728, 54, 'Ferizli'),
(729, 54, 'Karapürçek'),
(730, 54, 'Söğütlü'),
(731, 54, 'Adapazarı'),
(732, 54, 'Arifiye'),
(733, 54, 'Erenler'),
(734, 54, 'Serdivan'),
(735, 55, 'Alaçam'),
(736, 55, 'Bafra'),
(737, 55, 'Çarşamba'),
(738, 55, 'Havza'),
(739, 55, 'Kavak'),
(740, 55, 'Ladik'),
(741, 55, 'Terme'),
(742, 55, 'Vezirköprü'),
(743, 55, 'Asarcık'),
(744, 55, '19 Mayıs'),
(745, 55, 'Salıpazarı'),
(746, 55, 'Tekkeköy'),
(747, 55, 'Ayvacık / Samsun'),
(748, 55, 'Yakakent'),
(749, 55, 'Atakum'),
(750, 55, 'Canik'),
(751, 55, 'İlkadım'),
(752, 56, 'Baykan'),
(753, 56, 'Eruh'),
(754, 56, 'Kurtalan'),
(755, 56, 'Pervari'),
(756, 56, 'Siirt Merkez'),
(757, 56, 'Şirvan'),
(758, 56, 'Tillo'),
(759, 57, 'Ayancık'),
(760, 57, 'Boyabat'),
(761, 57, 'Durağan'),
(762, 57, 'Erfelek'),
(763, 57, 'Gerze'),
(764, 57, 'Sinop Merkez'),
(765, 57, 'Türkeli'),
(766, 57, 'Dikmen'),
(767, 57, 'Saraydüzü'),
(768, 58, 'Divriği'),
(769, 58, 'Gemerek'),
(770, 58, 'Gürün'),
(771, 58, 'Hafik'),
(772, 58, 'İmranlı'),
(773, 58, 'Kangal'),
(774, 58, 'Koyulhisar'),
(775, 58, 'Sivas Merkez'),
(776, 58, 'Suşehri'),
(777, 58, 'Şarkışla'),
(778, 58, 'Yıldızeli'),
(779, 58, 'Zara'),
(780, 58, 'Akıncılar'),
(781, 58, 'Altınyayla / Sivas'),
(782, 58, 'Doğanşar'),
(783, 58, 'Gölova'),
(784, 58, 'Ulaş'),
(785, 59, 'Çerkezköy'),
(786, 59, 'Çorlu'),
(787, 59, 'Hayrabolu'),
(788, 59, 'Malkara'),
(789, 59, 'Muratlı'),
(790, 59, 'Saray / Tekirdağ'),
(791, 59, 'Şarköy'),
(792, 59, 'Marmaraereğlisi'),
(793, 59, 'Ergene'),
(794, 59, 'Süleymanpaşa'),
(795, 60, 'Almus'),
(796, 60, 'Artova'),
(797, 60, 'Erbaa'),
(798, 60, 'Niksar'),
(799, 60, 'Reşadiye'),
(800, 60, 'Tokat Merkez'),
(801, 60, 'Turhal'),
(802, 60, 'Zile'),
(803, 60, 'Pazar / Tokat'),
(804, 60, 'Yeşilyurt / Tokat'),
(805, 60, 'Başçiftlik'),
(806, 60, 'Sulusaray'),
(807, 61, 'Akçaabat'),
(808, 61, 'Araklı'),
(809, 61, 'Arsin'),
(810, 61, 'Çaykara'),
(811, 61, 'Maçka'),
(812, 61, 'Of'),
(813, 61, 'Sürmene'),
(814, 61, 'Tonya'),
(815, 61, 'Vakfıkebir'),
(816, 61, 'Yomra'),
(817, 61, 'Beşikdüzü'),
(818, 61, 'Şalpazarı'),
(819, 61, 'Çarşıbaşı'),
(820, 61, 'Dernekpazarı'),
(821, 61, 'Düzköy'),
(822, 61, 'Hayrat'),
(823, 61, 'Köprübaşı / Trabzon'),
(824, 61, 'Ortahisar'),
(825, 62, 'Çemişgezek'),
(826, 62, 'Hozat'),
(827, 62, 'Mazgirt'),
(828, 62, 'Nazımiye'),
(829, 62, 'Ovacık / Tunceli'),
(830, 62, 'Pertek'),
(831, 62, 'Pülümür'),
(832, 62, 'Tunceli Merkez'),
(833, 63, 'Akçakale'),
(834, 63, 'Birecik'),
(835, 63, 'Bozova'),
(836, 63, 'Ceylanpınar'),
(837, 63, 'Halfeti'),
(838, 63, 'Hilvan'),
(839, 63, 'Siverek'),
(840, 63, 'Suruç'),
(841, 63, 'Viranşehir'),
(842, 63, 'Harran'),
(843, 63, 'Eyyübiye'),
(844, 63, 'Haliliye'),
(845, 63, 'Karaköprü'),
(846, 64, 'Banaz'),
(847, 64, 'Eşme'),
(848, 64, 'Karahallı'),
(849, 64, 'Sivaslı'),
(850, 64, 'Ulubey / Uşak'),
(851, 64, 'Uşak Merkez'),
(852, 65, 'Başkale'),
(853, 65, 'Çatak'),
(854, 65, 'Erciş'),
(855, 65, 'Gevaş'),
(856, 65, 'Gürpınar'),
(857, 65, 'Muradiye'),
(858, 65, 'Özalp'),
(859, 65, 'Bahçesaray'),
(860, 65, 'Çaldıran'),
(861, 65, 'Edremit / Van'),
(862, 65, 'Saray / Van'),
(863, 65, 'İpekyolu'),
(864, 65, 'Tuşba'),
(865, 66, 'Akdağmadeni'),
(866, 66, 'Boğazlıyan'),
(867, 66, 'Çayıralan'),
(868, 66, 'Çekerek'),
(869, 66, 'Sarıkaya'),
(870, 66, 'Sorgun'),
(871, 66, 'Şefaatli'),
(872, 66, 'Yerköy'),
(873, 66, 'Yozgat Merkez'),
(874, 66, 'Aydıncık / Yozgat'),
(875, 66, 'Çandır'),
(876, 66, 'Kadışehri'),
(877, 66, 'Saraykent'),
(878, 66, 'Yenifakılı'),
(879, 67, 'Çaycuma'),
(880, 67, 'Devrek'),
(881, 67, 'Ereğli / Zonguldak'),
(882, 67, 'Zonguldak Merkez'),
(883, 67, 'Alaplı'),
(884, 67, 'Gökçebey'),
(885, 68, 'Aksaray Merkez'),
(886, 68, 'Ortaköy / Aksaray'),
(887, 68, 'Ağaçören'),
(888, 68, 'Güzelyurt'),
(889, 68, 'Sarıyahşi'),
(890, 68, 'Eskil'),
(891, 68, 'Gülağaç'),
(892, 69, 'Bayburt Merkez'),
(893, 69, 'Aydıntepe'),
(894, 69, 'Demirözü'),
(895, 70, 'Ermenek'),
(896, 70, 'Karaman Merkez'),
(897, 70, 'Ayrancı'),
(898, 70, 'Kazımkarabekir'),
(899, 70, 'Başyayla'),
(900, 70, 'Sarıveliler'),
(901, 71, 'Delice'),
(902, 71, 'Keskin'),
(903, 71, 'Kırıkkale Merkez'),
(904, 71, 'Sulakyurt'),
(905, 71, 'Bahşili'),
(906, 71, 'Balışeyh'),
(907, 71, 'Çelebi'),
(908, 71, 'Karakeçili'),
(909, 71, 'Yahşihan'),
(910, 72, 'Batman Merkez'),
(911, 72, 'Beşiri'),
(912, 72, 'Gercüş'),
(913, 72, 'Kozluk'),
(914, 72, 'Sason'),
(915, 72, 'Hasankeyf'),
(916, 73, 'Beytüşşebap'),
(917, 73, 'Cizre'),
(918, 73, 'İdil'),
(919, 73, 'Silopi'),
(920, 73, 'Şırnak Merkez'),
(921, 73, 'Uludere'),
(922, 73, 'Güçlükonak'),
(923, 74, 'Bartın Merkez'),
(924, 74, 'Kurucaşile'),
(925, 74, 'Ulus'),
(926, 74, 'Amasra'),
(927, 75, 'Ardahan Merkez'),
(928, 75, 'Çıldır'),
(929, 75, 'Göle'),
(930, 75, 'Hanak'),
(931, 75, 'Posof'),
(932, 75, 'Damal'),
(933, 76, 'Aralık'),
(934, 76, 'Iğdır Merkez'),
(935, 76, 'Tuzluca'),
(936, 76, 'Karakoyunlu'),
(937, 77, 'Yalova Merkez'),
(938, 77, 'Altınova'),
(939, 77, 'Armutlu'),
(940, 77, 'Çınarcık'),
(941, 77, 'Çiftlikköy'),
(942, 77, 'Termal'),
(943, 78, 'Eflani'),
(944, 78, 'Eskipazar'),
(945, 78, 'Karabük Merkez'),
(946, 78, 'Ovacık / Karabük'),
(947, 78, 'Safranbolu'),
(948, 78, 'Yenice / Karabük'),
(949, 79, 'Kilis Merkez'),
(950, 79, 'Elbeyli'),
(951, 79, 'Musabeyli'),
(952, 79, 'Polateli'),
(953, 80, 'Bahçe'),
(954, 80, 'Kadirli'),
(955, 80, 'Osmaniye Merkez'),
(956, 80, 'Düziçi'),
(957, 80, 'Hasanbeyli'),
(958, 80, 'Sumbas'),
(959, 80, 'Toprakkale'),
(960, 81, 'Akçakoca'),
(961, 81, 'Düzce Merkez'),
(962, 81, 'Yığılca'),
(963, 81, 'Cumayeri'),
(964, 81, 'Gölyaka'),
(965, 81, 'Çilimli'),
(966, 81, 'Gümüşova'),
(967, 81, 'Kaynaşlı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim_mailleri`
--

CREATE TABLE `iletisim_mailleri` (
  `id` int(11) NOT NULL,
  `adi` varchar(500) NOT NULL,
  `konu` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `telefon` varchar(500) NOT NULL,
  `mesaj` varchar(500) NOT NULL,
  `zaman` varchar(500) NOT NULL,
  `ip` varchar(500) NOT NULL,
  `okundu` varchar(500) NOT NULL,
  `kat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategori_ad` varchar(300) NOT NULL,
  `ust_kategori_resim` varchar(500) NOT NULL,
  `ust_id` int(11) NOT NULL,
  `onerilenler` int(11) NOT NULL,
  `cok_satanlar` int(11) NOT NULL,
  `sira` int(20) NOT NULL,
  `seo_url` varchar(250) NOT NULL,
  `seo_title` varchar(300) NOT NULL,
  `seo_anahtar_kelime` varchar(350) NOT NULL,
  `seo_aciklama` varchar(500) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategori_ad`, `ust_kategori_resim`, `ust_id`, `onerilenler`, `cok_satanlar`, `sira`, `seo_url`, `seo_title`, `seo_anahtar_kelime`, `seo_aciklama`, `kat_id`, `durum`) VALUES
(199, 'SOĞUK İÇECEKLER', './upload/799039423570923421DBC7A5-FC9B-4C1F-9BA0-8052925B1E96.jpeg', 0, 1, 1, 1, 'soguk-icecekler/', '1', '', ' \r\n                                            ', 15433, 0),
(198, 'DONDURMA', './upload/2701772073851390DD48081A-F4A2-471E-BAAC-70A0D558A810.jpeg', 0, 1, 1, 1, 'dondurma/', '1', '', ' \r\n                                                                                                                                    ', 15433, 1),
(197, 'CHEESECAKE', './upload/3591328538742481536056D56-77C0-4BA1-9DD9-A43646682646.jpeg', 0, 1, 1, 1, 'cheesecake/', '1', '', ' \r\n                                                                  ', 15433, 1),
(196, 'TATLILAR', './upload/361945722134734454837DE14-6645-4C39-B213-05B106143480.jpeg', 0, 1, 1, 1, 'tatlilar/', '1', '', ' \r\n                                            ', 15433, 1),
(194, 'SOĞUK KAHVELER', './upload/34337786911504982F73DC27C-E799-4CC3-8802-BAAAAAA60594.jpeg', 0, 1, 1, 1, 'soguk-kahveler/', '1', '', ' \r\n                                            ', 15433, 1),
(195, 'ÇİKOLATATLAR', './upload/14462930186643498AEE1177F-67E2-4E3F-A36E-C976AB6B72FA.jpeg', 0, 1, 1, 1, 'cikolatatlar/', '1', '', ' \r\n                                            ', 15433, 1),
(193, 'SPECİAL İÇECEKLER', './upload/13137196975295638E6F1D4BF-6593-4862-9DF1-1E530DB96391.jpeg', 0, 1, 1, 1, 'special-icecekler/', '1', '', ' \r\n                                            ', 15433, 1),
(192, 'ESPRESSO BAZLI KAHVELER', './upload/31763398278365851EE99096A-8818-45A2-A81C-C309BBB0F8EE.jpeg', 0, 1, 1, 1, 'espresso-bazli-kahveler/', '1', '', ' \r\n                                            ', 15433, 1),
(191, 'KAHVELER', './upload/38625121649845255DA5DD259-6970-407D-8B21-FC09340CEB0A.jpeg', 0, 1, 1, 1, 'kahveler/', '1', '', ' \r\n                                            ', 15433, 1),
(190, 'SICAK İÇECEKLER', './upload/15936114693187768DC56F221-5949-4F21-9B50-071DE377532B.jpeg', 0, 1, 1, 1, 'sicak-icecekler/', '1', '', ' \r\n                                            ', 15433, 1),
(189, 'DÜNYA KAHVELERİ', './upload/915689839040244972F8A9D9-D1CD-403C-B066-B3E6A919B56C.jpeg', 0, 1, 1, 1, 'dunya-kahveleri/', '1', '', ' \r\n                                            ', 15433, 1),
(188, 'BUBBLE TEA', './upload/722487241195143446943CE1-3913-468B-8A7E-D047BC19C4FF.jpeg', 0, 1, 1, 1, 'bubble-tea/', '1', '', ' \r\n                                            ', 15433, 1),
(200, 'MİLKSHAKE', './upload/654696936875576229855F39-63FE-434B-9177-5F02284F71A2.jpeg', 0, 1, 1, 1, 'milkshake/', '1', '', ' \r\n                                            ', 15433, 1),
(201, 'FROZEN', './upload/277804747216441232398A761-07A0-4683-965E-7904A8857BB5.jpeg', 0, 1, 1, 1, 'frozen/', '1', '', ' \r\n                                            ', 15433, 1),
(202, 'ÇİKOLATA KUTULARI', './upload/18793795880415446741C5936-B1C1-4698-B9F7-26AB866576C4.jpeg', 0, 1, 1, 1, 'cikolata-kutulari/', '1', '', ' \r\n                                            ', 15433, 1),
(203, 'EXTRALAR', './upload/490265499524255635ECC6C-F787-486A-B555-D7D38A8BCC67.jpeg', 0, 1, 1, 1, 'extralar/', '1', '', ' \r\n                                            ', 15433, 1),
(204, 'BİTKİ ÇAYLARI', './upload/394897086400554341F57A62B-E41B-407F-9180-B7A07E8A20B4.jpeg', 0, 1, 1, 1, 'bitki-caylari/', '1', '', ' \r\n                                            ', 15433, 1),
(205, 'ÇEREZLER', './upload/85749615313211551E46695F-558C-4107-86A6-AF4716E10396.jpeg', 0, 1, 1, 1, 'cerezler/', '1', '', ' \r\n                                            ', 15433, 1),
(215, 'RESTORANT', './upload/483798855235278260C487F0E-D91D-476B-9E19-E75A71DDDE59.jpeg', 0, 1, 1, 18, 'restorant/', '1', '', ' \r\n                                            ', 15439, 1),
(216, 'KURU TEMİZLEME & YIKAMA (DRY CLEANER & WASHING)', './upload/31452477731725889E2ABEBF7-EBD8-404B-B8C5-AB1393F1BCEA.jpeg', 0, 1, 1, 19, 'kuru-temizleme-yikama-dry-cleaner-washing/', '1', '', ' \r\n                                            ', 15439, 1),
(217, 'ANA YEMEKLER (MAIN DISHES)', './upload/49626623425299085Dana-Bonfile-1.jpg', 215, 1, 1, 1, 'ana-yemekler/', '1', '', ' \r\n                                                                                        ', 15439, 1),
(218, 'ATIŞTIRMALIKLAR (SNACKS)', './images/default-img.png', 215, 1, 1, 1, 'atistirmaliklar/', '1', '', ' \r\n                                            ', 15439, 1),
(219, 'TOSTLAR & SANDVİÇLER ( TOASTS & SANDWICH)', './images/default-img.png', 215, 1, 1, 1, 'tostlar-sandvicler/', '1', '', ' \r\n                                            ', 15439, 1),
(220, 'MAKARNALAR (PASTAS)', './images/default-img.png', 215, 1, 1, 1, 'makarnalar/', '1', '', ' \r\n                                            ', 15439, 1),
(221, 'SALATALAR (SALADS)', './images/default-img.png', 215, 1, 1, 1, 'salatalar/', '1', '', ' \r\n                                            ', 15439, 1),
(222, 'TATLILAR (DESSERTS)', './images/default-img.png', 215, 1, 1, 1, 'tatlilar/', '1', '', ' \r\n                                            ', 15439, 1),
(223, 'SOĞUK İÇECEKLER', './images/default-img.png', 208, 1, 1, 1, 'soguk-icecekler/', '1', '', ' \r\n                      ', 15439, 1),
(224, 'SOĞUK İÇECEKLER (COLD DRINKS)', './images/default-img.png', 215, 1, 1, 1, 'soguk-icecekler/', '1', '', ' \r\n                                            ', 15439, 1),
(225, 'SICAK İÇECEKLER (HOT DRINKS)', './images/default-img.png', 215, 1, 1, 1, 'sicak-icecekler/', '1', '', ' \r\n                                            ', 15439, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `katlar`
--

CREATE TABLE `katlar` (
  `id` int(11) NOT NULL,
  `kat_adi` varchar(250) NOT NULL,
  `durum` int(11) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `adres` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `konum` text NOT NULL,
  `logo` text NOT NULL,
  `whatsapp` varchar(250) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `katlar`
--

INSERT INTO `katlar` (`id`, `kat_adi`, `durum`, `telefon`, `instagram`, `facebook`, `twitter`, `adres`, `email`, `konum`, `logo`, `whatsapp`, `aciklama`) VALUES
(15440, 'Merkez', 1, '', '', '', '', '', '', '', './upload/merkez-15854857955782329.jpeg', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `koleksiyon`
--

CREATE TABLE `koleksiyon` (
  `id` int(11) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `urunler` varchar(500) NOT NULL,
  `durum` varchar(20) NOT NULL,
  `koleksiyon_slider` varchar(250) NOT NULL,
  `seo_url` varchar(300) NOT NULL,
  `meta_keywords` varchar(300) NOT NULL,
  `meta_aciklama` varchar(350) NOT NULL,
  `meta_title` varchar(150) NOT NULL,
  `kat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `koleksiyon`
--

INSERT INTO `koleksiyon` (`id`, `ad`, `urunler`, `durum`, `koleksiyon_slider`, `seo_url`, `meta_keywords`, `meta_aciklama`, `meta_title`, `kat_id`) VALUES
(13, 'Sevilen Ürünlerimiz', ',1634', '1', './upload/12290709404449444izgara-et-sandvic-17894248523360584.jpg', 'sevilen-urunlerimiz/', '', '', '', 15435),
(18, 'Damak Zevkinize Uygun Lezzetler', '', '1', './upload/43988919490394184ızgara_et_sndviç.jpg', 'damak-zevkinize-uygun-lezzetler/', '', '', '', 15435),
(19, 'Sevilen Ürünlerimiz', ',1634', '1', './upload/12290709404449444izgara-et-sandvic-17894248523360584.jpg', 'sevilen-urunlerimiz/', '', '', '', 15433),
(20, 'Damak Zevkinize Uygun Lezzetler', ',1674,1675,1676', '1', './upload/43988919490394184ızgara_et_sndviç.jpg', 'damak-zevkinize-uygun-lezzetler/', '', '', '', 15433);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurye_yonetimi`
--

CREATE TABLE `kurye_yonetimi` (
  `id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `kurye_adi` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `magazalar`
--

CREATE TABLE `magazalar` (
  `id` int(11) NOT NULL,
  `magaza_adi` varchar(250) NOT NULL,
  `yetkili_ad` varchar(250) NOT NULL,
  `kullanici_adi` varchar(250) NOT NULL,
  `sifre` varchar(250) NOT NULL,
  `eposta` varchar(250) NOT NULL,
  `cep_telefonu` varchar(250) NOT NULL,
  `sabit_telefon` varchar(250) NOT NULL,
  `uyelik_turu` varchar(250) NOT NULL,
  `sahis_adi` varchar(250) NOT NULL,
  `sahis_soyadi` varchar(250) NOT NULL,
  `firma_unvani` varchar(250) NOT NULL,
  `vergi_dairesi` varchar(250) NOT NULL,
  `tc_kimlik_numarasi` varchar(250) NOT NULL,
  `il` int(250) NOT NULL,
  `ilce` varchar(250) NOT NULL,
  `adres` varchar(250) NOT NULL,
  `posta_kodu` varchar(250) NOT NULL,
  `durum` varchar(50) NOT NULL,
  `statu` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `magazalar`
--

INSERT INTO `magazalar` (`id`, `magaza_adi`, `yetkili_ad`, `kullanici_adi`, `sifre`, `eposta`, `cep_telefonu`, `sabit_telefon`, `uyelik_turu`, `sahis_adi`, `sahis_soyadi`, `firma_unvani`, `vergi_dairesi`, `tc_kimlik_numarasi`, `il`, `ilce`, `adres`, `posta_kodu`, `durum`, `statu`) VALUES
(1, 'Raftahazır', 'Burhan Çaçan', 'raftahazir', '147258Ab', 'eticaret@raftahazir.com', '', '', 'Şahıs Şirketi', 'Sibel ', 'Dost', 'Cadde Medya', 'Gevher Nesibe', '', 38, '', '', '', '1', '9');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makaleler`
--

CREATE TABLE `makaleler` (
  `id` int(11) NOT NULL,
  `makale_ad` varchar(250) NOT NULL,
  `tarih` date NOT NULL,
  `resim` varchar(500) NOT NULL,
  `detay` text NOT NULL,
  `etiket` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `makaleler`
--

INSERT INTO `makaleler` (`id`, `makale_ad`, `tarih`, `resim`, `detay`, `etiket`) VALUES
(1, 'Kucağa Almak Bebeği Şımartır mı? - RAFTA BLOG', '2019-03-28', './images/1903/1-1.jpg', '<p style=\"text-align:justify\">\r\nYeni anneler bebeklerini şımartıyor olduklarına dair pek çok uyarı alırlar. Başkaları bunu söylemese bile bir anne kendisi, bebeğini her ağlayışında kucağına aldığı için ya da bebeğini uyutmak için salladığı için acaba bebeğimi şımartıyor muyum diye endişe edebilir.<br>\r\nOysaki ilgi ve sevgi görmesi bir bebeği kesinlikle şımartmaz. Ayrıca oluşmuş olan her davranış biçimi ya da alışkanlık bebek büyüdükçe gerekirse değiştirilebilir.<br>\r\nBebeklerin bağ kurmaya ihtiyacı vardır. Özellikle ilk aylarda ağlamalarına tutarlı ve sevgi dolu bir şekilde cevap almaları gerekir. Konu bebeğinize sevgi göstermek ise asla kendinizi durdurmayın. Bebeğinize her dokunuşunuz, her yatıştırma girişiminiz, her besleyişiniz, her sallamanız, her öpücüğünüz, her ilgi ve dikkat gösterişiniz ona yeni tanıştığı dünyanın sevgi dolu, besleyici, iyi bir yer olduğunu öğretir. Böyle yaparak bebeğinizin insanlarla temas kurmanın rahatlatıcı ve iyilik getiren bir durum olduğunu içselleştirmesine yardımcı olursunuz.<br>\r\nBu söylenenler size mantıklı geliyor olmasına rağmen yine de ‘bebeğin her küçük öksürüğüne ya da ağlamasına cevap vermek bebeği kendimize bağımlı hale getirmek olmuyor mu’ diye düşünebilirsiniz. İşte bu noktada önemli bir soru çıkıyor ortaya. Duyarlı ebeveyn ne demektir? Duyarlı ebeveyn bebeğin her ağlayışına cevap veren ebeveyn midir?<br>\r\nEvet, duyarlı bir ebeveyn bebeğin her ağlayışına cevap vermelidir. Ama bebeğin ağlayışı karşısında yapılacak en doğru hareket pek çok farklı şey olabilir: bebeği kucağa almak ya da beslemek, ağlaması artacak mı yoksa azalacak mı diye birkaç dakika beklemek, ya da her hangi başka bir müdahale…. Duyalı ebeveynlik yapılacak en doğru hareketin ne olduğu konusunda karar vermektir. Bu bebeğin yanına gitmek ya da gitmemek olabilir. Eğer duyarlılığı bu şekilde değerlendirir ve uygularsanız bebeğinizin kapasitesi ve ihtiyaçlarına daha çok uyumlanırsınız.<br>\r\nBebeğin bize bağımlı hale gelmesi ise tamamen farklı bir konudur: bebekler tanım gereği zaten yardıma muhtaç ve bağımlıdır. Ayrıca, bağımlı olmak kötü bir şey değildir. Aslında, bebeğinizin sizinle kurduğu güvenli bağ yaşam boyu tatmin edici ilişkiler kurabilme becerisinin temelini oluşturur. Bağımsızlaşma (otonomi) zaman içinde gelecektir.<br>\r\nBazı bebekler daha çok ten temasına ihtiyaç duyabilir. Bu bebekler, sıkça onu kucağınıza alıp yürümenizi ya da onu sallamanızı isterler. Eğer bebeğiniz bu tip bir bebekse ilk aylarda mümkün olduğunca çok onu kucağınıza alın. Bebeğinizle yakın teması korumanıza yararken ellerinizin serbest kalmasını da sağladığı için bebeğinizi kapalı ortamlarda bile bir askı içinde önünüzde taşımak size yardımcı olabilir. Bebeklerin emme ihtiyacı gibi, tensel temasta kalma ihtiyacı da zamanla azalacak ve bebeğiniz kısa bir zamanda daha bağımsız olmayı başaracaktır. Bu süre içerisinde, daha fazla hareket özgürlüğü istiyorsanız, bebeğinizi bir bebek koltuğuna ya da salıncağına koyabilirsiniz. En başta bebeğinizin bu durumu çok büyük bir değişiklik olarak algılamaması açısından yakınında kalın. Zaman içinde bu tip bir bağımsızlığa toleransı artacaktır.<br>\r\nUzman Psikolog Sinem Olcay<br>\r\n*Bu yazı http://psikoloji-psikiyatri.com sitesinden alınmıştır.\r\n</p>', '#bebekbezi#mars#bez#bebek'),
(2, 'Kucağa Almak Bebeği Şımartır mı? - RAFTA BLOG', '2019-03-28', './images/1903/1-1.jpg', '<p style=\"text-align:justify\">\r\nYeni anneler bebeklerini şımartıyor olduklarına dair pek çok uyarı alırlar. Başkaları bunu söylemese bile bir anne kendisi, bebeğini her ağlayışında kucağına aldığı için ya da bebeğini uyutmak için salladığı için acaba bebeğimi şımartıyor muyum diye endişe edebilir.<br>\r\nOysaki ilgi ve sevgi görmesi bir bebeği kesinlikle şımartmaz. Ayrıca oluşmuş olan her davranış biçimi ya da alışkanlık bebek büyüdükçe gerekirse değiştirilebilir.<br>\r\nBebeklerin bağ kurmaya ihtiyacı vardır. Özellikle ilk aylarda ağlamalarına tutarlı ve sevgi dolu bir şekilde cevap almaları gerekir. Konu bebeğinize sevgi göstermek ise asla kendinizi durdurmayın. Bebeğinize her dokunuşunuz, her yatıştırma girişiminiz, her besleyişiniz, her sallamanız, her öpücüğünüz, her ilgi ve dikkat gösterişiniz ona yeni tanıştığı dünyanın sevgi dolu, besleyici, iyi bir yer olduğunu öğretir. Böyle yaparak bebeğinizin insanlarla temas kurmanın rahatlatıcı ve iyilik getiren bir durum olduğunu içselleştirmesine yardımcı olursunuz.<br>\r\nBu söylenenler size mantıklı geliyor olmasına rağmen yine de ‘bebeğin her küçük öksürüğüne ya da ağlamasına cevap vermek bebeği kendimize bağımlı hale getirmek olmuyor mu’ diye düşünebilirsiniz. İşte bu noktada önemli bir soru çıkıyor ortaya. Duyarlı ebeveyn ne demektir? Duyarlı ebeveyn bebeğin her ağlayışına cevap veren ebeveyn midir?<br>\r\nEvet, duyarlı bir ebeveyn bebeğin her ağlayışına cevap vermelidir. Ama bebeğin ağlayışı karşısında yapılacak en doğru hareket pek çok farklı şey olabilir: bebeği kucağa almak ya da beslemek, ağlaması artacak mı yoksa azalacak mı diye birkaç dakika beklemek, ya da her hangi başka bir müdahale…. Duyalı ebeveynlik yapılacak en doğru hareketin ne olduğu konusunda karar vermektir. Bu bebeğin yanına gitmek ya da gitmemek olabilir. Eğer duyarlılığı bu şekilde değerlendirir ve uygularsanız bebeğinizin kapasitesi ve ihtiyaçlarına daha çok uyumlanırsınız.<br>\r\nBebeğin bize bağımlı hale gelmesi ise tamamen farklı bir konudur: bebekler tanım gereği zaten yardıma muhtaç ve bağımlıdır. Ayrıca, bağımlı olmak kötü bir şey değildir. Aslında, bebeğinizin sizinle kurduğu güvenli bağ yaşam boyu tatmin edici ilişkiler kurabilme becerisinin temelini oluşturur. Bağımsızlaşma (otonomi) zaman içinde gelecektir.<br>\r\nBazı bebekler daha çok ten temasına ihtiyaç duyabilir. Bu bebekler, sıkça onu kucağınıza alıp yürümenizi ya da onu sallamanızı isterler. Eğer bebeğiniz bu tip bir bebekse ilk aylarda mümkün olduğunca çok onu kucağınıza alın. Bebeğinizle yakın teması korumanıza yararken ellerinizin serbest kalmasını da sağladığı için bebeğinizi kapalı ortamlarda bile bir askı içinde önünüzde taşımak size yardımcı olabilir. Bebeklerin emme ihtiyacı gibi, tensel temasta kalma ihtiyacı da zamanla azalacak ve bebeğiniz kısa bir zamanda daha bağımsız olmayı başaracaktır. Bu süre içerisinde, daha fazla hareket özgürlüğü istiyorsanız, bebeğinizi bir bebek koltuğuna ya da salıncağına koyabilirsiniz. En başta bebeğinizin bu durumu çok büyük bir değişiklik olarak algılamaması açısından yakınında kalın. Zaman içinde bu tip bir bağımsızlığa toleransı artacaktır.<br>\r\nUzman Psikolog Sinem Olcay<br>\r\n*Bu yazı http://psikoloji-psikiyatri.com sitesinden alınmıştır.\r\n</p>', '#bebekbezi#mars#bez#bebek'),
(3, 'Kucağa Almak Bebeği Şımartır mı? - RAFTA BLOG', '2019-03-28', './images/1903/1-1.jpg', '<p style=\"text-align:justify\">\r\nYeni anneler bebeklerini şımartıyor olduklarına dair pek çok uyarı alırlar. Başkaları bunu söylemese bile bir anne kendisi, bebeğini her ağlayışında kucağına aldığı için ya da bebeğini uyutmak için salladığı için acaba bebeğimi şımartıyor muyum diye endişe edebilir.<br>\r\nOysaki ilgi ve sevgi görmesi bir bebeği kesinlikle şımartmaz. Ayrıca oluşmuş olan her davranış biçimi ya da alışkanlık bebek büyüdükçe gerekirse değiştirilebilir.<br>\r\nBebeklerin bağ kurmaya ihtiyacı vardır. Özellikle ilk aylarda ağlamalarına tutarlı ve sevgi dolu bir şekilde cevap almaları gerekir. Konu bebeğinize sevgi göstermek ise asla kendinizi durdurmayın. Bebeğinize her dokunuşunuz, her yatıştırma girişiminiz, her besleyişiniz, her sallamanız, her öpücüğünüz, her ilgi ve dikkat gösterişiniz ona yeni tanıştığı dünyanın sevgi dolu, besleyici, iyi bir yer olduğunu öğretir. Böyle yaparak bebeğinizin insanlarla temas kurmanın rahatlatıcı ve iyilik getiren bir durum olduğunu içselleştirmesine yardımcı olursunuz.<br>\r\nBu söylenenler size mantıklı geliyor olmasına rağmen yine de ‘bebeğin her küçük öksürüğüne ya da ağlamasına cevap vermek bebeği kendimize bağımlı hale getirmek olmuyor mu’ diye düşünebilirsiniz. İşte bu noktada önemli bir soru çıkıyor ortaya. Duyarlı ebeveyn ne demektir? Duyarlı ebeveyn bebeğin her ağlayışına cevap veren ebeveyn midir?<br>\r\nEvet, duyarlı bir ebeveyn bebeğin her ağlayışına cevap vermelidir. Ama bebeğin ağlayışı karşısında yapılacak en doğru hareket pek çok farklı şey olabilir: bebeği kucağa almak ya da beslemek, ağlaması artacak mı yoksa azalacak mı diye birkaç dakika beklemek, ya da her hangi başka bir müdahale…. Duyalı ebeveynlik yapılacak en doğru hareketin ne olduğu konusunda karar vermektir. Bu bebeğin yanına gitmek ya da gitmemek olabilir. Eğer duyarlılığı bu şekilde değerlendirir ve uygularsanız bebeğinizin kapasitesi ve ihtiyaçlarına daha çok uyumlanırsınız.<br>\r\nBebeğin bize bağımlı hale gelmesi ise tamamen farklı bir konudur: bebekler tanım gereği zaten yardıma muhtaç ve bağımlıdır. Ayrıca, bağımlı olmak kötü bir şey değildir. Aslında, bebeğinizin sizinle kurduğu güvenli bağ yaşam boyu tatmin edici ilişkiler kurabilme becerisinin temelini oluşturur. Bağımsızlaşma (otonomi) zaman içinde gelecektir.<br>\r\nBazı bebekler daha çok ten temasına ihtiyaç duyabilir. Bu bebekler, sıkça onu kucağınıza alıp yürümenizi ya da onu sallamanızı isterler. Eğer bebeğiniz bu tip bir bebekse ilk aylarda mümkün olduğunca çok onu kucağınıza alın. Bebeğinizle yakın teması korumanıza yararken ellerinizin serbest kalmasını da sağladığı için bebeğinizi kapalı ortamlarda bile bir askı içinde önünüzde taşımak size yardımcı olabilir. Bebeklerin emme ihtiyacı gibi, tensel temasta kalma ihtiyacı da zamanla azalacak ve bebeğiniz kısa bir zamanda daha bağımsız olmayı başaracaktır. Bu süre içerisinde, daha fazla hareket özgürlüğü istiyorsanız, bebeğinizi bir bebek koltuğuna ya da salıncağına koyabilirsiniz. En başta bebeğinizin bu durumu çok büyük bir değişiklik olarak algılamaması açısından yakınında kalın. Zaman içinde bu tip bir bağımsızlığa toleransı artacaktır.<br>\r\nUzman Psikolog Sinem Olcay<br>\r\n*Bu yazı http://psikoloji-psikiyatri.com sitesinden alınmıştır.\r\n</p>', '#bebekbezi#mars#bez#bebek'),
(4, 'Kucağa Almak Bebeği Şımartır mı? - RAFTA BLOG', '2019-03-28', './images/1903/1-1.jpg', '<p style=\"text-align:justify\">\r\nYeni anneler bebeklerini şımartıyor olduklarına dair pek çok uyarı alırlar. Başkaları bunu söylemese bile bir anne kendisi, bebeğini her ağlayışında kucağına aldığı için ya da bebeğini uyutmak için salladığı için acaba bebeğimi şımartıyor muyum diye endişe edebilir.<br>\r\nOysaki ilgi ve sevgi görmesi bir bebeği kesinlikle şımartmaz. Ayrıca oluşmuş olan her davranış biçimi ya da alışkanlık bebek büyüdükçe gerekirse değiştirilebilir.<br>\r\nBebeklerin bağ kurmaya ihtiyacı vardır. Özellikle ilk aylarda ağlamalarına tutarlı ve sevgi dolu bir şekilde cevap almaları gerekir. Konu bebeğinize sevgi göstermek ise asla kendinizi durdurmayın. Bebeğinize her dokunuşunuz, her yatıştırma girişiminiz, her besleyişiniz, her sallamanız, her öpücüğünüz, her ilgi ve dikkat gösterişiniz ona yeni tanıştığı dünyanın sevgi dolu, besleyici, iyi bir yer olduğunu öğretir. Böyle yaparak bebeğinizin insanlarla temas kurmanın rahatlatıcı ve iyilik getiren bir durum olduğunu içselleştirmesine yardımcı olursunuz.<br>\r\nBu söylenenler size mantıklı geliyor olmasına rağmen yine de ‘bebeğin her küçük öksürüğüne ya da ağlamasına cevap vermek bebeği kendimize bağımlı hale getirmek olmuyor mu’ diye düşünebilirsiniz. İşte bu noktada önemli bir soru çıkıyor ortaya. Duyarlı ebeveyn ne demektir? Duyarlı ebeveyn bebeğin her ağlayışına cevap veren ebeveyn midir?<br>\r\nEvet, duyarlı bir ebeveyn bebeğin her ağlayışına cevap vermelidir. Ama bebeğin ağlayışı karşısında yapılacak en doğru hareket pek çok farklı şey olabilir: bebeği kucağa almak ya da beslemek, ağlaması artacak mı yoksa azalacak mı diye birkaç dakika beklemek, ya da her hangi başka bir müdahale…. Duyalı ebeveynlik yapılacak en doğru hareketin ne olduğu konusunda karar vermektir. Bu bebeğin yanına gitmek ya da gitmemek olabilir. Eğer duyarlılığı bu şekilde değerlendirir ve uygularsanız bebeğinizin kapasitesi ve ihtiyaçlarına daha çok uyumlanırsınız.<br>\r\nBebeğin bize bağımlı hale gelmesi ise tamamen farklı bir konudur: bebekler tanım gereği zaten yardıma muhtaç ve bağımlıdır. Ayrıca, bağımlı olmak kötü bir şey değildir. Aslında, bebeğinizin sizinle kurduğu güvenli bağ yaşam boyu tatmin edici ilişkiler kurabilme becerisinin temelini oluşturur. Bağımsızlaşma (otonomi) zaman içinde gelecektir.<br>\r\nBazı bebekler daha çok ten temasına ihtiyaç duyabilir. Bu bebekler, sıkça onu kucağınıza alıp yürümenizi ya da onu sallamanızı isterler. Eğer bebeğiniz bu tip bir bebekse ilk aylarda mümkün olduğunca çok onu kucağınıza alın. Bebeğinizle yakın teması korumanıza yararken ellerinizin serbest kalmasını da sağladığı için bebeğinizi kapalı ortamlarda bile bir askı içinde önünüzde taşımak size yardımcı olabilir. Bebeklerin emme ihtiyacı gibi, tensel temasta kalma ihtiyacı da zamanla azalacak ve bebeğiniz kısa bir zamanda daha bağımsız olmayı başaracaktır. Bu süre içerisinde, daha fazla hareket özgürlüğü istiyorsanız, bebeğinizi bir bebek koltuğuna ya da salıncağına koyabilirsiniz. En başta bebeğinizin bu durumu çok büyük bir değişiklik olarak algılamaması açısından yakınında kalın. Zaman içinde bu tip bir bağımsızlığa toleransı artacaktır.<br>\r\nUzman Psikolog Sinem Olcay<br>\r\n*Bu yazı http://psikoloji-psikiyatri.com sitesinden alınmıştır.\r\n</p>', '#bebekbezi#mars#bez#bebek');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `masalar`
--

CREATE TABLE `masalar` (
  `id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `masa_adi` varchar(250) NOT NULL,
  `durum` int(11) NOT NULL,
  `garson_cagir` int(11) NOT NULL,
  `bildirim` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `id` int(11) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `ust_id` varchar(10) NOT NULL,
  `sira` varchar(50) NOT NULL,
  `durum` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`id`, `ad`, `url`, `ust_id`, `sira`, `durum`) VALUES
(1, 'En Yeniler', 'https://raftahazir.com/koleksiyon-haftanin-firsatlari/', '0', '1', '1'),
(2, 'Haftanın Fırsatı', 'https://raftahazir.com/koleksiyon-haftanin-firsatlari/', '0', '2', '1'),
(3, 'Sanat ve Dekorasyon', 'https://raftahazir.com/koleksiyon-onerilenler/', '0', '3', '1'),
(9, 'Süper Fırsatlar', 'https://raftahazir.com/koleksiyon-onerilenler/', '0', '3', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--

CREATE TABLE `sehirler` (
  `id` int(11) NOT NULL,
  `sehir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `sehirler`
--

INSERT INTO `sehirler` (`id`, `sehir`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyonkarahisar'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `masa_id` varchar(50) NOT NULL,
  `urun_adet` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `varyantlar` varchar(50) NOT NULL,
  `durum` int(11) NOT NULL,
  `tahmini_hazirlama` varchar(250) NOT NULL,
  `bildirim` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int(11) NOT NULL,
  `uye_id` varchar(200) NOT NULL,
  `siparis_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `siparis_tarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `urun_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_adet` varchar(12) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `tutar` double(5,2) NOT NULL,
  `durum` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `varyantlar` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_islemler`
--

CREATE TABLE `siparis_islemler` (
  `id` int(11) NOT NULL,
  `uye_id` varchar(200) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `siparis_toplam` varchar(100) NOT NULL,
  `durum` varchar(300) NOT NULL,
  `ad_soyad` varchar(250) NOT NULL,
  `telefon` varchar(250) NOT NULL,
  `adres` text NOT NULL,
  `siparis_turu` varchar(250) NOT NULL,
  `odeme_turu` varchar(250) NOT NULL,
  `mesaj` text NOT NULL,
  `kurye_id` int(11) NOT NULL,
  `bildirim` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `buyuk_slogan` varchar(50) NOT NULL,
  `durum` varchar(50) NOT NULL,
  `slider_resim` varchar(150) NOT NULL,
  `slider_url` varchar(300) NOT NULL,
  `slide_turu` varchar(50) NOT NULL,
  `kat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `buyuk_slogan`, `durum`, `slider_resim`, `slider_url`, `slide_turu`, `kat_id`) VALUES
(49, 'Damak Zevkinize Uygun Lezzetler	2', '1', './upload/1435265787880707243988919490394184ızgara_et_sndviç.jpg', '', '0', 15435),
(48, 'Damak Zevkinize Uygun Lezzetler	', '1', './upload/1321901960767758443988919490394184ızgara_et_sndviç.jpg', '', '0', 15435),
(65, '', '1', './upload/46496029291305472B37BE589-6C69-4DE6-B2D7-2224400DED5D.jpeg', '', '0', 15438),
(108, '', '1', './upload/1062308515683802113363372-728xauto (1).webp', '', '1', 15439);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `temalar`
--

CREATE TABLE `temalar` (
  `id` int(11) NOT NULL,
  `tema_adi` varchar(250) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 11,
  `img` text NOT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `temalar`
--

INSERT INTO `temalar` (`id`, `tema_adi`, `durum`, `img`, `aciklama`) VALUES
(1, 'artipos-v-1', 1, './theme/artipos-v-1/25540294-1ebd-4740-9e3f-d1dff1671c34.jpg', '<p class=\"text-center\">Sipariş Verme Modülü</p>\n<p class=\"text-center\">İletişim ve Mesaj Modülü</p>\n\n<p class=\"text-center\">Ürün Görsellerini Gösterilme Özelliği</p>\n <p class=\"text-center\">Garson Çağırma Modülü</p>\n <p class=\"text-center\">Ürün Ekstra Özellik Seçenekleri</p> <p class=\"text-center\">Artıpos Restoran Sistemine Otomatik Entegre</p>'),
(2, 'artipos-v-2', 1, './theme/artipos-v-2/theme-v2.jpg', ' <p class=\"text-center\">Garson Çağırma Modülü</p>  \n<p class=\"text-center\">Kategori Modülü\n</p>\n<p class=\"text-center\">İletişim ve Mesaj Modülü</p>\n  \n <p class=\"text-center\">Resim Olarak Menü Ekleyebilme Modülü</p>  '),
(3, 'artipos-v-3', 0, './theme/artipos-v-2/theme-v2.jpg', ''),
(4, 'artipos-v-4', 1, './theme/artipos-v-4/theme-v4.jpg', '<p class=\"text-center\">Kategori Modülü</p>\n <p class=\"text-center\">Garson Çağırma Modülü</p>\n<p class=\"text-center\">Resimsiz Ürün Ekleyebilme</p>\n<p class=\"text-center\">İletişim ve Mesaj Modülü</p>\n\n\n'),
(5, 'artipos-v-pdf', 1, './theme/artipos-v-pdf/theme-pdf.jpg', ' <p class=\"text-center\">Garson Çağırma Modülü</p>  \r\n <p class=\"text-center\">İletişim ve Mesaj Modülü</p>  \r\n   <p class=\"text-center\">Resim Olarak Menü Ekleyebilme Modülü</p>  ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urun_adi` varchar(300) DEFAULT NULL,
  `magaza_id` int(11) DEFAULT NULL,
  `urun_marka` varchar(300) DEFAULT NULL,
  `urun_kategori` varchar(300) DEFAULT NULL,
  `urun_alt_kategori` varchar(20) DEFAULT NULL,
  `urun_fiyat` float(9,2) DEFAULT NULL,
  `seo_url` varchar(300) DEFAULT NULL,
  `seo_aciklama` varchar(800) DEFAULT NULL,
  `seo_anahtarkelime` varchar(300) DEFAULT NULL,
  `durum` varchar(300) DEFAULT NULL,
  `urun_aciklama` text DEFAULT NULL,
  `urun_resim` varchar(500) DEFAULT NULL,
  `stok` int(22) DEFAULT NULL,
  `kdv` int(11) DEFAULT NULL,
  `indirim_yuzde` varchar(10) DEFAULT NULL,
  `sira` int(11) NOT NULL DEFAULT 1,
  `kat_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_resim`
--

CREATE TABLE `urun_resim` (
  `resim_id` int(11) NOT NULL,
  `urun_id` varchar(100) NOT NULL,
  `resim_ad` varchar(300) NOT NULL,
  `resim_yol` varchar(300) NOT NULL,
  `sira` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_sayac`
--

CREATE TABLE `urun_sayac` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_adres` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `urun_sayac`
--

INSERT INTO `urun_sayac` (`id`, `urun_id`, `tarih`, `ip_adres`) VALUES
(1, 153, '2019-05-01 02:36:09', '182.168.1.1'),
(2, 153, '2019-05-01 02:36:09', '182.168.1.1'),
(3, 153, '2019-05-01 02:36:09', '182.168.1.2'),
(4, 153, '2019-04-29 02:36:09', '182.168.1.2'),
(5, 153, '2019-05-01 09:16:04', '93.89.225.254'),
(6, 153, '2019-05-01 09:16:14', '93.89.225.254'),
(7, 153, '2019-05-01 09:16:17', '93.89.225.254'),
(8, 152, '2019-05-01 09:16:30', '93.89.225.254'),
(9, 152, '2019-05-01 09:16:36', '93.89.225.254'),
(10, 154, '2019-05-01 09:16:47', '93.89.225.254'),
(11, 153, '2019-05-01 09:17:46', '93.89.225.254'),
(12, 153, '2019-05-01 09:18:14', '93.89.225.254'),
(13, 153, '2019-05-01 10:04:54', '93.89.225.254'),
(14, 153, '2019-05-01 10:05:29', '93.89.225.254'),
(15, 153, '2019-05-01 10:05:35', '93.89.225.254'),
(16, 153, '2019-05-01 10:05:56', '93.89.225.254'),
(17, 153, '2019-05-01 10:06:17', '93.89.225.254'),
(18, 153, '2019-05-01 10:07:32', '93.89.225.254'),
(19, 153, '2019-05-01 10:07:37', '93.89.225.254'),
(20, 153, '2019-05-01 10:08:13', '93.89.225.254'),
(21, 152, '2019-05-01 10:08:26', '93.89.225.254'),
(22, 152, '2019-05-01 10:08:33', '93.89.225.254'),
(23, 153, '2019-05-01 10:11:26', '93.89.225.254'),
(24, 153, '2019-05-01 10:12:03', '93.89.225.254'),
(25, 153, '2019-05-01 10:12:50', '93.89.225.254'),
(26, 153, '2019-05-01 10:13:03', '93.89.225.254'),
(27, 153, '2019-05-01 10:13:22', '93.89.225.254'),
(28, 153, '2019-05-01 10:13:50', '93.89.225.254'),
(29, 153, '2019-05-01 10:15:30', '93.89.225.254'),
(30, 153, '2019-05-01 10:16:15', '93.89.225.254'),
(31, 153, '2019-05-01 10:16:41', '93.89.225.254'),
(32, 153, '2019-05-01 10:17:08', '93.89.225.254'),
(33, 153, '2019-05-01 10:17:26', '93.89.225.254'),
(34, 153, '2019-05-01 10:17:35', '93.89.225.254'),
(35, 153, '2019-05-01 10:17:43', '93.89.225.254'),
(36, 153, '2019-05-01 10:18:53', '93.89.225.254'),
(37, 153, '2019-05-01 10:19:18', '93.89.225.254'),
(38, 153, '2019-05-01 10:20:32', '93.89.225.254'),
(39, 153, '2019-05-01 10:20:49', '93.89.225.254'),
(40, 153, '2019-05-01 10:29:43', '93.89.225.254'),
(41, 153, '2019-05-01 10:30:15', '93.89.225.254'),
(42, 153, '2019-05-01 10:43:47', '93.89.225.254'),
(43, 153, '2019-05-01 11:05:30', '93.89.225.254'),
(44, 153, '2019-05-01 11:05:57', '93.89.225.254'),
(45, 155, '2019-05-01 11:06:14', '93.89.225.254'),
(46, 154, '2019-05-01 11:09:40', '93.89.225.254'),
(47, 154, '2019-05-01 11:11:08', '88.230.37.155'),
(48, 154, '2019-05-01 11:11:13', '88.230.37.155'),
(49, 153, '2019-05-01 11:11:18', '88.230.37.155'),
(50, 153, '2019-05-01 11:11:50', '178.247.182.106'),
(51, 153, '2019-05-01 11:12:29', '178.247.135.213'),
(52, 153, '2019-05-01 11:12:34', '178.247.135.213'),
(53, 153, '2019-05-01 11:32:29', '88.230.37.155'),
(54, 156, '2019-05-01 11:32:57', '88.230.37.155'),
(55, 153, '2019-05-01 12:34:22', '88.230.37.155'),
(56, 153, '2019-05-01 15:21:41', '178.247.99.250'),
(57, 153, '2019-05-01 15:21:49', '178.247.99.250'),
(58, 152, '2019-05-01 19:02:17', '88.230.28.144'),
(59, 153, '2019-05-01 19:02:39', '88.230.28.144'),
(60, 153, '2019-05-02 05:42:58', '88.230.37.155'),
(61, 153, '2019-05-02 05:43:07', '88.230.37.155'),
(62, 156, '2019-05-02 06:31:21', '88.230.37.155'),
(63, 153, '2019-05-02 06:34:37', '88.230.37.155'),
(64, 152, '2019-05-02 06:46:13', '88.230.37.155'),
(65, 153, '2019-05-02 07:03:41', '88.230.37.155'),
(66, 155, '2019-05-02 07:09:01', '88.230.37.155'),
(67, 152, '2019-05-02 09:32:17', '88.230.37.155'),
(68, 153, '2019-05-02 11:08:10', '88.230.37.155'),
(69, 152, '2019-05-02 11:09:20', '88.230.37.155'),
(70, 153, '2019-05-02 11:09:24', '88.230.37.155'),
(71, 152, '2019-05-02 13:41:42', '88.230.37.155'),
(72, 153, '2019-05-02 13:44:17', '88.230.37.155'),
(73, 153, '2019-05-02 14:29:15', '88.230.37.155'),
(74, 152, '2019-05-02 14:36:59', '88.230.37.155'),
(75, 152, '2019-05-03 04:23:09', '88.230.20.241'),
(76, 154, '2019-05-03 10:31:58', '88.230.37.155'),
(77, 155, '2019-05-05 07:31:16', '88.230.37.155'),
(78, 155, '2019-05-05 07:33:28', '88.230.37.155'),
(79, 155, '2019-05-05 07:33:55', '88.230.37.155'),
(80, 155, '2019-05-05 07:34:10', '88.230.37.155'),
(81, 155, '2019-05-05 07:34:37', '88.230.37.155'),
(82, 155, '2019-05-05 07:34:50', '88.230.37.155'),
(83, 155, '2019-05-05 07:35:10', '88.230.37.155'),
(84, 155, '2019-05-05 07:35:22', '88.230.37.155'),
(85, 155, '2019-05-05 07:35:45', '88.230.37.155'),
(86, 155, '2019-05-05 07:36:04', '88.230.37.155'),
(87, 155, '2019-05-05 07:36:18', '88.230.37.155'),
(88, 155, '2019-05-05 07:41:31', '88.230.37.155'),
(89, 155, '2019-05-05 17:45:18', '88.230.28.167'),
(90, 153, '2019-05-05 18:53:07', '88.230.28.167'),
(91, 156, '2019-05-06 05:57:05', '88.230.37.155'),
(92, 156, '2019-05-06 06:03:04', '88.230.37.155'),
(93, 155, '2019-05-06 09:30:00', '88.230.37.155'),
(94, 153, '2019-05-06 09:32:23', '88.230.37.155'),
(95, 154, '2019-05-06 09:34:06', '88.230.37.155'),
(96, 157, '2019-05-06 09:55:14', '88.230.37.155'),
(97, 153, '2019-05-06 11:49:40', '88.230.37.155'),
(98, 153, '2019-05-06 11:52:10', '88.230.37.155'),
(99, 153, '2019-05-06 11:55:58', '88.230.37.155'),
(100, 153, '2019-05-06 11:56:19', '88.230.37.155'),
(101, 153, '2019-05-06 11:56:38', '88.230.37.155'),
(102, 153, '2019-05-06 11:58:27', '88.230.37.155'),
(103, 153, '2019-05-06 11:58:51', '88.230.37.155'),
(104, 153, '2019-05-06 11:59:15', '88.230.37.155'),
(105, 153, '2019-05-06 12:01:20', '88.230.37.155'),
(106, 153, '2019-05-06 12:01:42', '88.230.37.155'),
(107, 153, '2019-05-06 12:05:26', '88.230.37.155'),
(108, 153, '2019-05-06 12:06:07', '88.230.37.155'),
(109, 153, '2019-05-06 12:31:42', '88.230.37.155'),
(110, 153, '2019-05-06 12:34:25', '88.230.37.155'),
(111, 153, '2019-05-06 12:35:53', '88.230.37.155'),
(112, 155, '2019-05-11 12:46:15', '88.230.37.155'),
(113, 153, '2019-05-18 08:31:24', '88.230.34.198'),
(114, 156, '2019-05-25 08:16:56', '88.230.32.144'),
(115, 153, '2019-05-25 09:03:03', '88.230.32.144'),
(116, 153, '2019-05-25 09:04:00', '88.230.32.144'),
(117, 153, '2019-05-27 09:38:25', '88.230.32.144'),
(118, 153, '2019-06-07 17:18:14', '176.238.6.112'),
(119, 153, '2019-06-07 17:18:24', '176.238.6.112'),
(120, 155, '2019-06-07 17:19:09', '176.238.6.112'),
(121, 157, '2019-06-12 11:16:08', '88.230.32.194'),
(122, 153, '2019-06-12 14:43:27', '88.230.32.194'),
(123, 153, '2019-06-12 20:48:43', '88.230.36.142'),
(124, 154, '2019-06-15 14:25:17', '88.230.32.194'),
(125, 153, '2019-06-15 14:25:22', '88.230.32.194'),
(126, 154, '2019-06-21 13:01:24', '88.230.32.194'),
(127, 153, '2019-06-24 12:35:53', '104.143.209.101'),
(128, 153, '2019-06-24 13:11:38', '88.230.32.194'),
(129, 153, '2019-07-02 11:50:17', '104.143.209.101'),
(130, 153, '2019-07-02 11:54:16', '104.143.209.101'),
(131, 153, '2019-07-06 06:34:06', '88.230.33.163'),
(132, 152, '2019-08-20 13:11:00', '88.230.22.238'),
(133, 153, '2019-08-20 13:12:23', '88.230.22.238'),
(134, 153, '2019-08-20 13:14:32', '88.230.22.238'),
(135, 153, '2019-08-21 13:22:39', '88.230.22.238'),
(136, 153, '2019-08-22 13:09:44', '88.230.22.238'),
(137, 153, '2019-08-23 07:35:01', '88.230.26.250'),
(138, 153, '2019-08-23 07:35:24', '88.230.26.250'),
(139, 153, '2019-08-23 07:35:43', '88.230.26.250'),
(140, 153, '2019-08-23 11:17:21', '88.230.26.250'),
(141, 153, '2019-08-24 15:59:20', '178.247.33.15'),
(142, 153, '2019-08-26 10:41:37', '88.230.26.250'),
(143, 153, '2019-08-26 10:46:55', '88.230.26.250'),
(144, 153, '2019-09-04 12:04:32', '88.230.25.117'),
(145, 153, '2019-09-04 12:13:03', '88.230.25.117'),
(146, 153, '2019-09-04 12:16:05', '88.230.25.117'),
(147, 153, '2019-09-04 12:16:34', '88.230.25.117'),
(148, 152, '2019-09-04 13:40:52', '88.230.25.117'),
(149, 153, '2019-09-04 13:41:03', '88.230.25.117'),
(150, 154, '2019-09-05 09:04:29', '88.230.25.117'),
(151, 153, '2019-09-05 12:36:44', '88.230.25.117'),
(152, 153, '2019-09-05 12:36:54', '88.230.25.117'),
(153, 157, '2019-09-05 12:38:03', '88.230.25.117'),
(154, 153, '2019-09-09 08:13:19', '88.230.16.187'),
(155, 153, '2019-09-09 08:18:21', '88.230.16.187'),
(156, 153, '2019-09-09 08:18:35', '88.230.16.187'),
(157, 153, '2019-09-09 08:18:52', '88.230.16.187'),
(158, 153, '2019-09-09 08:19:15', '88.230.16.187'),
(159, 153, '2019-09-09 08:19:25', '88.230.16.187'),
(160, 153, '2019-09-09 08:20:32', '88.230.16.187'),
(161, 153, '2019-09-09 08:20:39', '88.230.16.187'),
(162, 153, '2019-09-09 08:21:04', '88.230.16.187'),
(163, 153, '2019-09-09 08:21:14', '88.230.16.187'),
(164, 153, '2019-09-09 08:21:15', '88.230.16.187'),
(165, 153, '2019-09-09 08:21:52', '88.230.16.187'),
(166, 153, '2019-09-09 08:22:17', '88.230.16.187'),
(167, 153, '2019-09-09 08:22:22', '88.230.16.187'),
(168, 153, '2019-09-09 08:22:26', '88.230.16.187'),
(169, 153, '2019-09-09 08:22:28', '88.230.16.187'),
(170, 153, '2019-09-09 08:22:31', '88.230.16.187'),
(171, 153, '2019-09-09 08:28:52', '88.230.16.187'),
(172, 153, '2019-09-09 08:29:01', '88.230.16.187'),
(173, 153, '2019-09-09 08:30:33', '88.230.16.187'),
(174, 153, '2019-09-09 08:31:51', '88.230.16.187'),
(175, 153, '2019-09-09 08:32:15', '88.230.16.187'),
(176, 153, '2019-09-09 08:34:07', '88.230.16.187'),
(177, 153, '2019-09-09 08:34:10', '88.230.16.187'),
(178, 153, '2019-09-09 08:34:15', '88.230.16.187'),
(179, 153, '2019-09-09 08:35:45', '88.230.16.187'),
(180, 153, '2019-09-09 08:36:30', '88.230.16.187'),
(181, 153, '2019-09-09 08:36:33', '88.230.16.187'),
(182, 152, '2019-09-09 08:49:27', '88.230.16.187'),
(183, 152, '2019-09-09 08:51:06', '88.230.16.187'),
(184, 152, '2019-09-09 08:51:20', '88.230.16.187'),
(185, 152, '2019-09-09 08:51:38', '88.230.16.187'),
(186, 152, '2019-09-09 08:51:43', '88.230.16.187'),
(187, 152, '2019-09-09 08:58:15', '88.230.16.187'),
(188, 153, '2019-09-09 09:13:29', '88.230.16.187'),
(189, 153, '2019-09-09 09:13:32', '88.230.16.187'),
(190, 153, '2019-09-09 09:36:44', '88.230.16.187'),
(191, 153, '2019-09-09 10:25:30', '88.230.16.187'),
(192, 153, '2019-09-09 10:25:34', '88.230.16.187'),
(193, 153, '2019-09-09 10:25:37', '88.230.16.187'),
(194, 153, '2019-09-09 10:30:27', '88.230.16.187'),
(195, 153, '2019-09-09 10:30:31', '88.230.16.187'),
(196, 153, '2019-09-09 10:32:06', '88.230.16.187'),
(197, 153, '2019-09-09 10:32:09', '88.230.16.187'),
(198, 153, '2019-09-09 10:33:50', '88.230.16.187'),
(199, 153, '2019-09-09 10:33:55', '88.230.16.187'),
(200, 153, '2019-09-09 10:33:59', '88.230.16.187'),
(201, 153, '2019-09-09 10:34:02', '88.230.16.187'),
(202, 153, '2019-09-09 10:34:04', '88.230.16.187'),
(203, 153, '2019-09-09 10:34:47', '88.230.16.187'),
(204, 153, '2019-09-09 10:35:19', '88.230.16.187'),
(205, 153, '2019-09-09 10:35:24', '88.230.16.187'),
(206, 153, '2019-09-09 10:36:03', '88.230.16.187'),
(207, 153, '2019-09-09 10:49:45', '88.230.16.187'),
(208, 153, '2019-09-09 11:44:00', '88.230.16.187'),
(209, 153, '2019-09-09 13:09:43', '88.230.16.187'),
(210, 153, '2019-09-09 13:12:03', '88.230.16.187'),
(211, 153, '2019-09-09 13:38:22', '88.230.16.187'),
(212, 153, '2019-09-09 13:38:27', '88.230.16.187'),
(213, 152, '2019-09-09 13:38:30', '88.230.16.187'),
(214, 152, '2019-09-09 13:38:31', '88.230.16.187'),
(215, 158, '2019-09-09 13:38:37', '88.230.16.187'),
(216, 158, '2019-09-09 13:38:40', '88.230.16.187'),
(217, 153, '2019-09-09 13:38:59', '88.230.16.187'),
(218, 153, '2019-09-09 13:39:01', '88.230.16.187'),
(219, 153, '2019-09-09 14:03:11', '88.230.16.187'),
(220, 153, '2019-09-09 14:03:14', '88.230.16.187'),
(221, 153, '2019-09-09 14:03:32', '88.230.16.187'),
(222, 153, '2019-09-10 08:02:51', '88.230.16.187'),
(223, 153, '2019-09-10 08:02:55', '88.230.16.187'),
(224, 172, '2019-09-10 13:28:38', '88.230.16.187'),
(225, 172, '2019-09-10 13:28:51', '88.230.16.187'),
(226, 172, '2019-09-10 13:35:24', '88.230.16.187'),
(227, 172, '2019-09-10 13:35:38', '88.230.16.187'),
(228, 172, '2019-09-10 13:36:24', '88.230.16.187'),
(229, 172, '2019-09-10 13:55:14', '88.230.16.187'),
(230, 172, '2019-09-10 14:03:00', '88.230.16.187'),
(231, 172, '2019-09-10 14:26:23', '88.230.16.187'),
(232, 173, '2019-09-10 15:08:16', '88.230.16.187'),
(233, 172, '2019-09-10 15:11:13', '88.230.16.187'),
(234, 172, '2019-09-10 15:25:42', '88.230.16.187'),
(235, 181, '2019-09-10 15:26:54', '88.230.16.187'),
(236, 189, '2019-09-10 15:28:30', '88.230.16.187'),
(237, 189, '2019-09-11 06:24:13', '88.230.25.242'),
(238, 172, '2019-09-11 06:26:55', '88.230.25.242'),
(239, 172, '2019-09-11 06:27:17', '88.230.25.242'),
(240, 175, '2019-09-11 08:11:16', '88.230.25.242'),
(241, 180, '2019-09-13 08:37:44', '88.230.18.62'),
(242, 180, '2019-09-13 08:37:48', '88.230.18.62'),
(243, 179, '2019-09-13 08:55:02', '88.230.18.62'),
(244, 179, '2019-09-13 08:55:04', '88.230.18.62'),
(245, 182, '2019-09-13 08:55:06', '88.230.18.62'),
(246, 182, '2019-09-13 08:55:08', '88.230.18.62'),
(247, 175, '2019-09-13 08:55:11', '88.230.18.62'),
(248, 175, '2019-09-13 08:55:13', '88.230.18.62'),
(249, 175, '2019-09-13 08:56:55', '88.230.18.62'),
(250, 189, '2019-09-13 14:48:04', '88.230.18.62'),
(251, 189, '2019-09-13 14:48:07', '88.230.18.62'),
(252, 180, '2019-09-14 21:41:39', '88.230.25.45'),
(253, 179, '2019-09-16 06:50:09', '88.230.18.62'),
(254, 180, '2019-09-16 06:50:52', '88.230.18.62'),
(255, 180, '2019-09-16 06:50:53', '88.230.18.62'),
(256, 180, '2019-09-16 06:50:59', '88.230.18.62'),
(257, 180, '2019-09-16 06:51:34', '88.230.18.62'),
(258, 180, '2019-09-16 06:51:37', '88.230.18.62'),
(259, 179, '2019-09-16 06:51:40', '88.230.18.62'),
(260, 179, '2019-09-16 06:51:42', '88.230.18.62'),
(261, 181, '2019-09-16 12:51:55', '88.230.17.8'),
(262, 181, '2019-09-16 12:51:58', '88.230.17.8'),
(263, 173, '2019-09-17 12:29:39', '88.230.27.193'),
(264, 179, '2019-09-21 08:22:35', '88.230.24.42'),
(265, 172, '2019-09-24 21:06:13', '88.230.24.42'),
(266, 176, '2019-09-26 08:01:59', '88.230.30.20'),
(267, 172, '2019-09-27 13:54:52', '88.230.40.39'),
(268, 172, '2019-09-27 14:12:31', '88.230.40.39'),
(269, 172, '2019-09-27 14:27:40', '95.9.7.99'),
(270, 172, '2019-09-27 14:36:16', '88.230.40.39'),
(271, 175, '2019-09-27 14:47:46', '88.230.40.39'),
(272, 175, '2019-09-27 15:30:59', '88.230.40.39'),
(273, 179, '2019-10-02 11:13:23', '88.230.16.10'),
(274, 172, '2019-10-03 12:32:59', '88.230.47.156'),
(275, 179, '2019-10-03 12:36:08', '88.230.47.156'),
(276, 189, '2019-10-03 13:58:11', '176.218.238.126');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_teknik_ozellikleri`
--

CREATE TABLE `urun_teknik_ozellikleri` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `teknik_ozellik_adi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknik_ozellik_detay` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sira` varchar(10) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `urun_teknik_ozellikleri`
--

INSERT INTO `urun_teknik_ozellikleri` (`id`, `urun_id`, `teknik_ozellik_adi`, `teknik_ozellik_detay`, `sira`) VALUES
(1, 179, 'Boyut', '50*70 cm', '1'),
(14, 200, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(12, 190, 'q', 'e', '1'),
(13, 198, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(15, 218, 'Kumaş Türü', 'örme kumaş', '1'),
(16, 219, 'Kumaş Türü', 'örme kumaş', '1'),
(17, 220, 'Kumaş Türü', 'örme kumaş', '1'),
(18, 221, 'Kumaş Türü', 'örme kumaş', '1'),
(19, 222, 'Kumaş Türü', 'örme kumaş', '1'),
(20, 207, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(21, 205, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(22, 206, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(23, 201, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(24, 202, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(25, 203, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(26, 199, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(27, 200, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(28, 198, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(29, 208, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(30, 209, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(31, 210, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(32, 211, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(33, 212, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(34, 213, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(35, 214, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(36, 215, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(37, 216, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(38, 223, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(39, 224, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(40, 225, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(41, 226, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(42, 227, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(43, 228, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(44, 229, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(45, 230, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(46, 231, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(47, 232, 'Kumaş Türü', 'Sendi Kumaş Şifon Kumaş', '1'),
(48, 233, 'Kumaş Türü', 'örme kumaş', '1'),
(49, 234, 'Kumaş Türü', 'örme kumaş', '1'),
(50, 235, 'Kumaş Türü', 'örme kumaş', '1'),
(51, 236, 'Kumaş Türü', 'örme kumaş  astarsız', '1'),
(52, 237, 'Kumaş Türü', 'örme kumaş  astarsız', '1'),
(53, 238, 'Kumaş Türü', 'örme kumaş  astarsız', '1'),
(54, 1790, 'sdasd', 'asd', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_varyantlar`
--

CREATE TABLE `urun_varyantlar` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `ust_id` varchar(500) NOT NULL,
  `varyant_ad` varchar(150) NOT NULL,
  `stok` varchar(500) NOT NULL,
  `fiyat` varchar(500) NOT NULL,
  `durum` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_yorumlar`
--

CREATE TABLE `urun_yorumlar` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `ust_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `yorum` varchar(1000) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `puan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun_yorumlar`
--

INSERT INTO `urun_yorumlar` (`id`, `urun_id`, `ust_id`, `uye_id`, `yorum`, `tarih`, `puan`) VALUES
(1, 153, 0, 2, 'Bu bir deneme ürünüdür', '2016-02-11 05:00:18', 4),
(2, 153, 0, 1, 'Bu bir deneme ürünüdür 2', '2019-04-01 02:11:12', 5),
(3, 153, 1, 1, 'Bu bir deneme ürünüdür 3', '2019-04-30 05:26:13', 1),
(4, 153, 0, 2, 'Bu bir deneme ürünüdür 2', '2019-04-01 02:11:12', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ust_marka`
--

CREATE TABLE `ust_marka` (
  `id` int(11) NOT NULL,
  `ad` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `sifre` varchar(250) NOT NULL,
  `resim` varchar(500) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `sifre_kod` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `ad_soyad`, `mail`, `sifre`, `resim`, `telefon`, `sifre_kod`) VALUES
(1, 'Ziyaretçi ', 'noreply@raftahazir.com', '51a02e2924ac68e0c7062758dcb23e90', './images/2003/gravatar.jpg', '111 11 11 11', '51a02e2924ac68e0c7062758dcb23e90'),
(2, 'Ziyaretçi  2', 'noreply@raftahazir.com', '51a02e2924ac68e0c7062758dcb23e90', './images/2003/gravatar.jpg', '111 11 11 11', '51a02e2924ac68e0c7062758dcb23e90');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(200) NOT NULL,
  `mail` varchar(300) NOT NULL,
  `telefon` varchar(300) NOT NULL,
  `sifre` varchar(500) NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `ad_soyad`, `mail`, `telefon`, `sifre`, `durum`) VALUES
(7, 'MİTTE PORT HOTEL', 'info@artiposmenu.com', '05496343544', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(9, '', 'ihsanygr@hotmail.com', '', 'b99d193b66a6542917d2b7bee52c2574', 1),
(10, 'Mitte Port Hotel', 'ihsanygr@hotmail.com', '', 'b99d193b66a6542917d2b7bee52c2574', 1),
(11, 'brera', 'info@artiposmenu.com', '123', 'b99d193b66a6542917d2b7bee52c2574', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`id`, `ad_soyad`, `mail`, `telefon`, `sifre`, `yetki`) VALUES
(1, 'Burhan Çaçan', 'info@caddemedya.com.tr', '0506 066 52 26', '202cb962ac59075b964b07152d234b70', 5);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `alis_satis`
--
ALTER TABLE `alis_satis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `alt_kategori`
--
ALTER TABLE `alt_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bayiler`
--
ALTER TABLE `bayiler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Tablo için indeksler `firma_bilgileri`
--
ALTER TABLE `firma_bilgileri`
  ADD PRIMARY KEY (`firma_id`);

--
-- Tablo için indeksler `ilceler`
--
ALTER TABLE `ilceler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DF2497D4BAF0B6B8` (`sehir_id`);

--
-- Tablo için indeksler `iletisim_mailleri`
--
ALTER TABLE `iletisim_mailleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `katlar`
--
ALTER TABLE `katlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `koleksiyon`
--
ALTER TABLE `koleksiyon`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kurye_yonetimi`
--
ALTER TABLE `kurye_yonetimi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `magazalar`
--
ALTER TABLE `magazalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `makaleler`
--
ALTER TABLE `makaleler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `masalar`
--
ALTER TABLE `masalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sehirler`
--
ALTER TABLE `sehirler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparis_islemler`
--
ALTER TABLE `siparis_islemler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `temalar`
--
ALTER TABLE `temalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_resim`
--
ALTER TABLE `urun_resim`
  ADD PRIMARY KEY (`resim_id`);

--
-- Tablo için indeksler `urun_sayac`
--
ALTER TABLE `urun_sayac`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_teknik_ozellikleri`
--
ALTER TABLE `urun_teknik_ozellikleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_varyantlar`
--
ALTER TABLE `urun_varyantlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_yorumlar`
--
ALTER TABLE `urun_yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ust_marka`
--
ALTER TABLE `ust_marka`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `alis_satis`
--
ALTER TABLE `alis_satis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `alt_kategori`
--
ALTER TABLE `alt_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Tablo için AUTO_INCREMENT değeri `bayiler`
--
ALTER TABLE `bayiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `firma_bilgileri`
--
ALTER TABLE `firma_bilgileri`
  MODIFY `firma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `ilceler`
--
ALTER TABLE `ilceler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=968;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim_mailleri`
--
ALTER TABLE `iletisim_mailleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- Tablo için AUTO_INCREMENT değeri `katlar`
--
ALTER TABLE `katlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15441;

--
-- Tablo için AUTO_INCREMENT değeri `koleksiyon`
--
ALTER TABLE `koleksiyon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `kurye_yonetimi`
--
ALTER TABLE `kurye_yonetimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `magazalar`
--
ALTER TABLE `magazalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `makaleler`
--
ALTER TABLE `makaleler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `masalar`
--
ALTER TABLE `masalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2145;

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `sehirler`
--
ALTER TABLE `sehirler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4124457;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_islemler`
--
ALTER TABLE `siparis_islemler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4124452;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Tablo için AUTO_INCREMENT değeri `temalar`
--
ALTER TABLE `temalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1987;

--
-- Tablo için AUTO_INCREMENT değeri `urun_resim`
--
ALTER TABLE `urun_resim`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4680;

--
-- Tablo için AUTO_INCREMENT değeri `urun_sayac`
--
ALTER TABLE `urun_sayac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- Tablo için AUTO_INCREMENT değeri `urun_teknik_ozellikleri`
--
ALTER TABLE `urun_teknik_ozellikleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `urun_varyantlar`
--
ALTER TABLE `urun_varyantlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20796;

--
-- Tablo için AUTO_INCREMENT değeri `urun_yorumlar`
--
ALTER TABLE `urun_yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `ust_marka`
--
ALTER TABLE `ust_marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
