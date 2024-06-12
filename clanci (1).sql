-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 12, 2024 at 04:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clanci`
--
CREATE DATABASE IF NOT EXISTS `clanci` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clanci`;

-- --------------------------------------------------------

--
-- Table structure for table `clanak`
--

CREATE TABLE `clanak` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clanak`
--

INSERT INTO `clanak` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(21, '17.05.2024', 'Izbori 2024 ', 'Novi kandidati za predsjedničke izbore 2024.', 'U nadolazećim predsjedničkim izborima 2024. pojavili su se novi kandidati koji obećavaju promjene i reforme. Njihove platforme uključuju ekonomske reforme, zdravstvenu zaštitu i obrazovanje. Glavni kandidati dolaze iz različitih političkih pozadina, čime se osigurava raznovrsnost u političkoj ponudi za birače. Među najzapaženijim kandidatima su bivši guverner koji zagovara fiskalnu odgovornost, mlada senatorica poznata po svojoj borbi za ljudska prava i bivši poslovni čovjek koji želi unijeti poslovne principe u vođenje države. Kampanje su već u punom jeku, a predizborne ankete pokazuju tijesnu utrku. Kandidati su usmjereni na osvajanje ključnih država koje bi mogle odlučiti ishod izbora.', 'zoki.jpeg', 'politika', 0),
(55, '28.05.2024', 'Rast Napetosti u Parlamentu', 'Političke tenzije rastu u parlamentu.', 'U posljednje vrijeme, političke tenzije u parlamentu rastu zbog neslaganja oko ključnih reformi. Oporba kritizira vladu zbog nedostatka transparentnosti i korupcije. S druge strane, vlada optužuje oporbu za opstrukciju važnih zakona koji bi mogli poboljšati ekonomsku situaciju u zemlji. Glavna tema spora su reforme u pravosuđu i poreznom sustavu, koje bi, prema vladinim tvrdnjama, trebale donijeti značajne uštede i povećati učinkovitost. Međutim, oporba tvrdi da su te reforme loše osmišljene i da će pogoditi najranjivije skupine u društvu. Rasprave su često burne, a situacija se dodatno zakomplicirala kada su neki zastupnici napustili sjednicu u znak protesta.', '1_aktualis_kihivasok_a_francia_kulpolitikaban_2022-2.jpg', 'politika', 0),
(56, '28.05.2024', 'Međunarodni Sporazum: Reakcije', 'Reakcije na novi međunarodni sporazum', 'Nedavno potpisani međunarodni sporazum izazvao je različite reakcije unutar političkog spektra. Dok vlada tvrdi da će sporazum donijeti ekonomske koristi i poboljšati međunarodne odnose, oporba upozorava na moguće negativne posljedice za domaću industriju i radna mjesta. Sporazum obuhvaća liberalizaciju trgovine i smanjenje carinskih barijera s nekoliko velikih svjetskih ekonomija. Vlada naglašava kako će to otvoriti nova tržišta za domaće proizvođače i potaknuti investicije. S druge strane, sindikati i neki industrijski lideri strahuju da će konkurencija iz inozemstva dovesti do gašenja domaćih poduzeća i gubitka radnih mjesta. Analitičari su podijeljeni oko dugoročnih efekata sporazuma, ali je jasno da će njegova implementacija imati dalekosežne posljedice.', 'plenki.jpeg', 'politika', 0),
(58, '28.05.2024', 'Prosvjedi Protiv Korupcije', 'Prosvjedi Protiv Korupcije', 'Tisuće građana izašle su na ulice u znak prosvjeda protiv korupcije u vladi. Demonstracije su organizirane nakon niza skandala koji su uključivali visoke dužnosnike. Prosvjednici zahtijevaju transparentnost, odgovornost i oštrije zakone protiv korupcije. Okupljanje je započelo mirno, ali je ubrzo došlo do sukoba s policijom kada su neki prosvjednici pokušali probiti policijske barikade ispred vladinih zgrada. Vođe prosvjeda, uključujući nekoliko poznatih aktivista i političara, održali su govore u kojima su osudili korupciju i pozvali na ostavke odgovornih dužnosnika. Vlada je odgovorila obećanjem da će istražiti optužbe i provesti reforme, ali mnogi prosvjednici smatraju da su takva obećanja već previše puta bila prekršena. Situacija ostaje napeta, a prosvjedi se nastavljaju s planovima za daljnje akcije.', 'prosvjed.jpg', 'politika', 0),
(62, '2024-06-09', 'Rast Cijena Stanova u 2024', 'Cijene stanova rastu u većini gradova.', 'Cijene stanova nastavljaju rasti u većini većih gradova, što uzrokuje zabrinutost među potencijalnim kupcima i stručnjacima za nekretnine. Glavni uzroci ovog trenda su povećana potražnja, nedostatak novih stambenih projekata i porast troškova izgradnje. U nekim gradovima, cijene su porasle i do 20% u posljednjih godinu dana, što čini kupovinu nekretnine sve težim ciljem za mlade obitelji. Investitori, s druge strane, profitiraju od ovog trenda, dok vlasti pokušavaju pronaći rješenja za smanjenje pritiska na tržište.', 'nek.jpg', 'nekretnine', 0),
(63, '2024-06-09', 'Novi Zakon o Zakupninama', 'Vlada uvodi novi zakon o kontroliranju zakupnina.', 'Vlada je nedavno usvojila novi zakon koji ima za cilj kontrolirati rast zakupnina i zaštititi najmoprimce od iznenadnih povećanja troškova stanovanja. Novi zakon predviđa ograničenje povećanja zakupnina na godišnjoj razini i obaveznu registraciju svih ugovora o najmu. Kritičari zakona tvrde da bi takva regulacija mogla smanjiti interes investitora za izgradnju novih stambenih jedinica, dok pobornici ističu da je ovo korak u pravom smjeru za zaštitu prava najmoprimaca. Implementacija zakona će biti praćena i dodatnim mjerama kako bi se osiguralo njegovo poštivanje.', 'nek1.jpg', 'nekretnine', 0),
(64, '2024-06-09', 'Investicije u Zelene Stanove', 'Rast ulaganja u ekološki održive stambene projekte', 'Sve više investitora ulaže u ekološki održive stambene projekte, što uključuje gradnju zelenih zgrada s niskom emisijom ugljika i korištenje obnovljivih izvora energije. Ova vrsta investicija postaje sve popularnija, ne samo zbog ekološke osviještenosti, već i zbog dugoročnih financijskih ušteda koje nude ovakvi projekti. Zelene zgrade često imaju niže troškove održavanja i energije, što ih čini atraktivnim opcijama za kupce i najmoprimce. Graditelji također uživaju podršku vlade u obliku poreznih olakšica i subvencija za ekološki prihvatljive projekte.', 'kuca.jpg', 'nekretnine', 0),
(65, '2024-06-09', 'Urbana Obnova: Novi Trendovi', 'Urbanizacija i obnova starih četvrti.', 'Urbana obnova postaje sve popularnija u mnogim gradovima, gdje se stari i zapušteni dijelovi preobražavaju u moderne stambene i komercijalne zone. Ovaj proces uključuje revitalizaciju stare infrastrukture, izgradnju novih zgrada i poboljšanje javnih prostora. Cilj je stvoriti vibrantne zajednice koje privlače nove stanovnike i poslovne subjekte. Ova praksa također pomaže u očuvanju kulturne baštine i povijesnih građevina, dok istovremeno zadovoljava potrebe za modernim životnim i radnim prostorima. Gradovi koji ulažu u urbanu obnovu bilježe porast kvalitete života i ekonomskog rasta, što ih čini atraktivnijima za investicije i razvoj.', 'homeguide-new-apartment-building.jpg', 'nekretnine', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Dominik', 'Katavić', 'dkatavic', '$2y$10$ul45btiEtVt.C6SocMrBDuw4zUQ/of2N3jEbYZUbLwB1wwdGqisMe', 1),
(2, 'test', 'test', 'test', '$2y$10$lijZrtw0te8sJ/SdojiIc.ou5AjR10.ds6QfRlRtumVUAUCeZhNu2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanak`
--
ALTER TABLE `clanak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanak`
--
ALTER TABLE `clanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
