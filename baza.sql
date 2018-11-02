-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 19 Aug 2018 la 14:31
-- Versiune server: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2844890_baza`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'a@yahoo.ro', 'a');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `articol`
--

CREATE TABLE `articol` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `articol`
--

INSERT INTO `articol` (`id`, `image`, `name`, `price`, `description`, `category`) VALUES
(1666, '1', 'Guppy', 7, 'Habitat\r\n \r\nO specie incredibil de adaptabila care apare in aproape toate biotopurile imaginabile, de la fluvii de mare altitudine pana la mlastini tulburi si santuri.\r\nUnele populatii exista, de asemenea, in conditii de apa salmastra.\r\n\r\nCu toate acestea, acestia tind sa se dezvolte cel mai bine in habitate cu cresteri luxuriante de alge, vegetatie marginala si/sau plante acvatice.\r\n \r\nIntretinere\r\n \r\nNepretentiosi, desi un acvariu cu plante plutitoare este apreciat.Curentii puternici ar trebui evitati.\r\nAcesta este un peste de apa dura si in timp ce poate trai in apa moale si/sau acida, intretinerea lui pe termen lung trebuie sa fie in apa moderata ca duritate sau dura.\r\n \r\nDieta\r\n \r\nPestii salbatici sunt in esenta insectivori, insa pestii inmultiti in acvarii din ziua de astazi sunt departe de stramosii lor si vor accepta majoritatea tipurilor de hrana oferite.\r\n \r\nComportament si compatibilitate\r\n \r\nUn peste foarte liniștit. Nu trebuie tinuti cu specii de Barbus tigru, Serpae Tetra etc. Se simte bine intr-un acvariu comunitar linistit, cu alti vivipari, Rasbora, Corydoras si Tetra mici.', 'Pești'),
(1667, '2', 'Xiphophorus helleri', 9, 'Habitat\r\n\r\nIn natura se gasesc in diferite tipuri de habitat de la nivelul marii pana la o altitudine de aproximativ 1500 m, inclusiv in paraurile care curg rapid, pietroase, izvoare, santuri, iazuri si rauri care contin apa clara pana la cea tulbure. In cele mai multe cazuri, apa este mai mica de 1.5 m adancime si nu exista vegetatie acvatica.\r\nIn apele curgatoare, adultii au tendinta de a se aduna in zone cu un curent mai mare, in timp ce juvenilii manifesta o preferinta pentru zonele marginale linistite.\r\n\r\nIntretinere\r\n\r\nAlegerea decorului nu este atat de importanta, desi tinde sa prezinte o mai buna colorare atunci cand este tinut intr-un bine plantat si un substrat inchis la culoare.\r\nPentru varietatile salbatice ar trebui sa se amenajeze, de asemenea, unui acvariu care sa semene cu un flux curgator cu roci purtate de apa si bolovani mici.\r\n\r\nAdaugarea unor plante plutitoare si radacini sau crengi pentru difuzarea luminii este de asemenea, apreciata si da o senzatie mai naturala.\r\nFiltrarea nu trebuie sa fie deosebit de puternica, desi pare sa aprecieze un grad mai mare de miscare al apei.\r\n\r\nDieta\r\n\r\nAnalizele stomacale ale specimenelor salbatice au aratat ca sunt omnivori, se hranesc cu o gama larga de nevertebrate acvatice si terestre, detritus, alge si alte materiale vegetale.\r\n\r\nIn acvariu nu este pretentios si va accepta aproape orice i se ofera. Incercati totusi sa-i oferiti o dieta echilibrata cuprinzand produse uscate de buna calitate impreuna cu hrana vie si congelata de mici dimensiuni, cum ar fi larvele Daphnia, Artemia si chironomus (viermii de sange).\r\n\r\nComportament si compatibilitate\r\n\r\nIn spatiile mici, grupurile de masculi tind sa formeze ierarhii de dominare si pot investi o proportie semnificativa de timp mentinand pozitiile respective.', 'Pești'),
(1668, '3', 'Molly Negru', 7, 'Molly apartine pestilor vivipari (pesti care nasc pui vii) si este o specie foarte usor de intretinut in acvariu. Este foarte rezistent putand trai in apa cu parametrii foarte diferiti (de la acida la alcalina), intr-o plaja foarte larga de temperaturi (ideal 24° C). Poate fi gasit intr-o varietate foarte mare de culori.', 'Pești'),
(1670, '5', 'Barbus Tetrazona', 7, 'Acesti pesti deosebiti sunt cunoscuti in tara noastra sub diverse nume (Tetrazone, Sumatrani, Sumi etc). Ei traiesc in salbaticie in Sumatra, Borneo Cambogia, precum si in alte parti ale Asiei, in rauri cu viteza moderata. La maturitate, acest peste atinge 7 cm lungime si 3 cm latime. Marimea acestora depinde si de volumul bazinului in care sunt crescuti (cei din bazine mici nu vor atinge aceasta marime). Se gasesc sub 4 variante de colorit: Tiger, Green, Pearl si Albino.', 'Pești'),
(1671, '6', 'Neon', 4, 'Habitat\r\n\r\nProvin din rauri care curg prin paduri sau afluentii acestora, din ape incet curgatoare. \r\n\r\nIntretinere\r\n\r\nIntretinerea este in general usoara, desi pot aparea cateva probleme care sa implice un grad de ingrijore, mai ales cu specimenele salbatice, care sunt mai putin tolerante la conditiile de apa proaste decat pestii produsi comercial. Acesti pesti arata cel mai bine in acvarii plantate masiv sau in aranjamente in stil natiural, compuse dintr-un substrat nisipos plus cateva radacini si ramuri.\r\n\r\nAditia de frunze uscate accentueaza aspectul natural si ofera o ascunzatoare suplimentara pestilor, precum si colonii de bacterii pe masura ce se vor descompune, care ofera pestilor o sursa valoroasa de hrana suplimentara. Acizii humici eliberati de aceste frunze sunt, de asemenea, considerati benefici, la fel ca si conurile de arin.\r\n\r\nAceasta specie se simte cel mai bine intr-o lumina mai degraba difuza, dar se pot adauga plante care sa ii umbreasca sau plante plutitoare.\r\n\r\nDieta\r\n\r\nPesti omnivori, se hranesc inclusiv cu mici crustacee, alge filamentoase, fructe si altele, la fel ca in natura. In acvariu pot supravietui cu fructe uscate, dar se vor dezvolta cel mai bine avand la dispozitie un meniu variat, care poate contine si larve de chironomide vii sau congelate, larve de tantari, daphnia etc.\r\n\r\nComportament si compatibilitate\r\n\r\nIn general sunt pasnici, fiind rezidenti ideali ai acvariilor comunitare. Cel mai bine se inteleg cu alti pesti de talie mica, dar si cu cichlide de talie mare care nu sunt pradatori. Se vor tine intr-un acvariu un banc de minimum 8-10 indivizi, doar aceasta specie sau impreuna cu altele pentru ca se vor simti mai in largul loc in bancuri iar tu vei fi rasplatit printr-un spectacol asemeni celui din natura.', 'Pești'),
(1672, '7', 'Pterophyllum scalare', 9, 'Forma de prezentare: 3 - 3,5 cm\r\nSemi-agresiv, este indicat ca in acvariu sa fie pastrati in grupuri de 6-8 indivizi.\r\nEste recomandat sa fie asociat cu alte specii non-agresive si de dimensiuni mici.\r\nHabitat: acvariul trebuie sa contina substrat cu nisip, plante si roci.\r\nSpecii compatibile: alte cichlide sau specii non-agresive\r\nHrana: în acvariu se hrănesc cu orice: alge, fulgi, hranÄƒ vie (melci, larve, microorganisme, crustacee, tubifex), mixtură creveÅ£i - mazăre, spirulină, fulgii bogați în proteine vegetale.', 'Pești'),
(1673, '8', 'Ancistrus Sp.', 62, 'Ancistrus Sp. sunt pesti algivori, cu grad mediu de dificultate al reproducerii. Ei sunt usor de intretinut, fiind hraniti in principal cu alge, avand astfel un rol de peste sanitar. Ancistrus Sp. sunt pesti teritoriali si devin agresivi in perioada de reproducere, cand masculii ataca alti masculi. Uneori, ei pot rani si femela daca aceasta are dimensiuni mici. Cresterea lui se poate face in acvarii mici, de minimum 80 de litri. Este recomandat un mascul de Ancistrus la doua sau mai multe femele.&nbsp;<p>&nbsp;<b>Caracteristici:</b>&nbsp;</p><p><ul><li>&nbsp;Familie: Loricariidae&nbsp;<br></li><li>Subfamilia: Ancistrinae&nbsp;<br></li><li>Origine: America de Sud, bazinul amazonian, Rio Negro, Brazilia, Guiana&nbsp;<br></li><li>Marime: 14-15cm, in acvarii 8-13cm&nbsp;<br></li><li>Hrana: Omnivor si vegetarian&nbsp;<br></li><li>Intretinete: usoara&nbsp;<br></li><li>Reproducere: dificultate medie&nbsp;<br></li><li>Tip Bazin: lung, min. 80cm&nbsp;<br></li><li>Nivel inot: pesti de fundTemperatura: 24-28 C Duritate: 2 - 10 dGH PH: 5 - 7&nbsp;<br></li><li>Temperatura de reproducere: 23, maximum 24 C&nbsp;<br></li><li>Volum minim de apa: 80l<br></li></ul></p>', 'Pești'),
(1674, '9', 'Kryptopterus bicirrhis', 20, 'Sunt pesti pasnici, gregari, care traiesc in grupuri de 6-8 indivizi. Sunt ideali pentru acvariile comunitare cu pesti pasnici de dimensiuni mici, amenajat cu zone dens plantate cu substrat din nisip in care pestii sa poata sapa. Corydoras nannus prefera apa bine oxigenata. Corydoras nannus sunt pesti omnivori, care pot fi hraniti cu fulgi, granule, tablete si hrana vie, cum ar fi larve de tantari si Tubifex. Hranirea se face cu hrana pe fundul acvariului', 'Pești'),
(1675, '10', 'Corydoras elegans', 16, 'Corydoras elegans sunt pesti pasnici, care pot fi crescuti cu usurinta in acvarii comunitare, alaturi de characide mici, cyprinide, anabantoide si cichlide pitice. Au nevoie de un acvariu cu apa curata, care necesita schimbari dese si partiale de apa, cu un substrat nisipos sau din pietris fin. Ei pot fi hraniti cu alimente care se scufunda, intrucat obisnuiesc sa manance la baza acvariului. In dieta lor pot intra Artemia, larve de Chironomidae, Tubifex, Daphnia sau rame tocate.\r\n\r\nCaracteristici:\r\n\r\nHabitat: America de Sud\r\nFamilie: Callichthyidae\r\nDurata de viata: 3-5 ani\r\nDificultate:Moderata\r\nCapacitate acvariu: minimum 57 Litri\r\nDimensiunea speciei: 5 - 6 cm\r\nApa: dulce\r\npH-ul apei: 6.0 - 7.4\r\nTemperatura apei: 22.2-25°C\r\nDuritatea apei:1-15 °d\r\nRaspandire: neobisnuita\r\nDieta: omnivor, hrana vie, granule, fulgi', 'Pești'),
(1676, '11', 'Betta Splendens Halfmoon M', 72, 'Betta Splendens este fara indoiala cel mai frumos si spectaculos reprezentant al familiei Anabantidae. Este un peste cu cerinte medii, putand fi crescut si in bazine de dimensiuni relativ mici. El are o varietate de forme si de culori, multe obtinute datorita acvaristilor pasionati, care au incercat diferite incrucisari. Este recomandat ca masculul sa fie insotit de 2-3 femele.&nbsp;<p><b>Caracteristici:</b>&nbsp;</p><p><ul><li>Habitat:Asia&nbsp;<br></li><li>Familie:Osphronemidae&nbsp;<br></li><li>Dificultate: foarte usoara&nbsp;<br></li><li>Dimensiune specie: 5.1-7.6cm&nbsp;<br></li><li>Capacitate acvariu: minimum 18.9 Litri&nbsp;<br></li><li>Apa: dulce&nbsp;<br></li><li>pH-ul apei: 6.0 - 7.8&nbsp;<br></li><li>Temperatura apei: 23.9-27.8°C&nbsp;<br></li><li>Duritatea apei: 4-10 °d&nbsp;<br></li><li>Dieta: carnivor, fulgi, granule, hrana vie&nbsp;<br></li><li>Durata de viata: 2-7 ani<br></li></ul></p>', 'Pești'),
(1678, '12', 'Colisa lalia', 20, 'Colisa Lalia este un peste deloc pretentios, care poate fi crescut in acvarii bine plantat si cu schimburi de apa regulate, recomandate o data pe saptamana. Ell poate fi hranit cu o varietate foarte mare de alimente, preferând însa hrana de origine animala, precum purici de balta (Daphnia Pulex), tubi (Tubifex Rivularum), artemia (Artemia Salina), larve de chironomus sau  cu hrana uscata, precum fulgi, pelete, mixturi. I se poate da si carne de vita, dar rasa bine, sau tocatura din ficat si inima de vita/pasare.&nbsp;<p><b>Caracteristici:</b>&nbsp;</p><p><ul><li>Habitat: AsiaFamilie: Osphronemidae&nbsp;<br></li><li>Dificultate: usoara&nbsp;<br></li><li>Capacitate acvariu: minimum 57 Litri&nbsp;<br></li><li>Dimensiunea speciei: 5.1-6.4 cm&nbsp;<br></li><li>Apa: dulcepH-ul apei: 6.5 - 7.5&nbsp;<br></li><li>Temperatura apei: 22-27 °C&nbsp;<br></li><li>Duritatea apei: 4-13 °d&nbsp;<br></li><li>Dieta: fulgi, granule, hrana vie&nbsp;<br></li><li>Durata de viata: 2-4 ani<br></li></ul></p>', 'Pești'),
(1679, '13', 'Trichogaster leeri', 10, 'Trichogaster leeri este unul din cei mai populari pesti din familia Anabantidae, pasnic si cu un colorit deosebit, fiind intalnit in multe acvarii. Aceasta specie traieste in ape putin adanci, calde si foarte bine plantate si are nevoie de apa cu temperaturi intre 24 - 30° C. Mananca orice, chiar si hrana uscatauscata, dar trebuie sa i se dea in bucati mici. Desi raspandit in acvarii datorita frumusetii, pestele Trichogaster leeri este sensibil la raniri si destul de dificil de crescut.\r\n\r\nTrichogaster leeri are nevoie de un acvariu mare, bine plantat, cu multe ascunzatori. Mananca purici de balta (Daphnia Pulex), tubi (Tubifex Rivularum), artemia (Artemia Salina), larve de chironomus (Chironomus), hrana uscata (fulgi, pelete, mixturi, etc.). De asemenea, i se poate da si carne de vita rasa sau tocatura din ficat si inima de vita sau pasare.\r\n\r\nCaracteristici:\r\n\r\nHabitat: Asia\r\nFamilie: Anabantidae\r\nAcvariu: minimum 60 Litri\r\nDimensiune:10-12 cm\r\nApa: dulce\r\npH-ul apei: 6.0 - 8.0\r\nTemperatura apei: 24 -28 °C\r\nDuritatea apei: 5-19 °d\r\nDieta: carnivor, fulgi, granule, hrana vie\r\nDurata de viata: 5-6 ani', 'Pești'),
(1680, '14', 'Pseudotropheus demasoni', 39, 'Forma de prezentare: 3,5 - 4 cm\r\nFoarte gresiv, este indicat ca in acvariu sa fie pastrati in raport de 1 mascul si cel putin 3 femele.\r\nEste recomandat sa fie asociat cu alte specii non-agresive si de dimensiuni mici.\r\nHabitat: acvariul trebuie sa contina substrat cu nisip, plante si roci.\r\nSpecii compatibile: alte cichlide sau specii non-agresive\r\nHrana: crustacee si nevertebrate mici, melci, larve de insecte, fulgi, granule.', 'Pești'),
(1681, '15', 'Aulonocara sp. Rubin Red', 34, 'Aulonocara Rubin Red este un favorit datorita culorilor sale deosebite. Pestele afiseaza o nuanta portocalie luminoasa si un rosu puternic, ce intra in constrast ci marcajele albastre luminoase de pe fata, coada si aripioare. Atat pentru aspectul sau natural si formele de culoare dezvoltate, cat si pentru reproducerea in captivitate, acestia sunt unii dintre cei mai cautati pesti dupa ciclidele provenite din Lacul Malawi, Africa. Rubin Red Peacock este un peste care creste, se dezvolta si se reproduce cu lejeritate in captivitate. Ea are o coloratie rosiatica mai puternica decat in forma sa naturala pura.Acest soi a fost crescut si dezvoltat in mod intentionat pentru a i se intensifica nuanta rosiatica. Sunt ciclide mai pasnice si nu este recomandat sa le puneti in acelasi acvariu cu Mbunas, o specie extrem de activa si agresiva. Dimensiunea acestor pesti poate atinge 13 cm in lungime, iar acest lucru il ajuta sa se integreze usor intr-un acvariu de minimum 300 litri. Este recomandat sa-i oferiti un spatiu deschis pentru inot, dar si pesteri in care sa se poata ascunde sau odihni. Pentru o dezvoltare armonioasa, schimbati frecvent apa din acvariu, asa cum se procedeaza la toate ciclidele (50%).&nbsp;<p><b>Caracteristici</b>:&nbsp;</p><p></p><ul><li>Familie: ciclidele&nbsp;<br></li><li>Nume comune: Aulonocara sp. \"Ruby Red\", Aulonocara Red Ruben&nbsp;<br></li><li>Dimensiuni: masculi 18 cm, femele 14 cm&nbsp;<br></li><li>Origine: Lacul Malawi. Aceasta specie a fost inventata in ultimii ani de germani sau cehia</li><li>Temperatura apei: de 25 °C - 26 °C sau 28 °C pentru reproducere&nbsp;<br></li><li>pH-ul apei: 7.5-8.5 sau 8.0 pentru reproducere &nbsp;<br></li><li>Duritatea apei: 10 °GH - 15 °GH. 10 °GH&nbsp;<br></li><li>Descrierea: masculii au culoarea predominanta albastru, restul culorilor variind de la portocaliu la rosu, uneori cu urme de albastruComportament: pesti teritoriali si pasnici. Exista lupta de concurenta intraspecifica. Este recomandat un mascul si 2-4 femele). Ei vor sapa un pic, mai ales in perioadele de reproduceriReproducerea: femela depune aproximativ 60 de oua pe un subtrat de stanca sau piatra. Femela va pazi ouale in gura aproximativ 21 de zile si apoi va scoate puieti intre 1 - 2 cm, destul de independenti<br></li></ul><p></p>', 'Pești'),
(1682, '16', 'Aulonocara nyassae', 31, 'Forma de prezentare: 5 - 9 cm\r\nNu sunt agresivi, dar daca sunt tinuti in acvarii mici impreuna cu alte specii devin teritoriali.\r\nPot trai pana la 12 ani.\r\nPrefera un habitat nisipos cu pietre.\r\nFemelele se deosebesc foarte usor fiind de culoare maro-cenusiu.\r\nSunt recomandate 3-4 femele pentru un mascul.\r\nHrana: toate tipurile (creveti, fulgi)', 'Pești'),
(1683, '17', 'Apistogramma cacatuoides', 19, 'Apistogramma cacatuoides este un peste frumos colorat, originar din Sudul Americii, mai exact din raul Yavari, la granita cu Brazilia si Peru. El obisnuieste sa traiasca in apele mici, limpezi si lent curgatoare, in care substratul este alcatuit din resturi de frunze. Mascultii ating 9 centimetri lungime, iar femelele 5 centimetri lungime. Are un temperament teritorial si prefera o apa nu foarte acida, cu un ph intre 6.2-7.7, gH 3-5 si o temperatura cuprinsa intre 24-27 grade C.Este recomandat un acvariu cu lungimea 80 de centimetri cu o capacitate de 115 litri. Este recomandata hrana vie, pentru un colorit intens, formata din: Artemia salina, Daphnia, Cyclops, Gammarus si Chironomide. Apistogramma cacatuoides se impaca bine si cu fulgii, granulele si tabletele si obisnuiesc sa se hraneasca pe fundul acvariului.&nbsp;<p>&nbsp;<b>Caracteristici:&nbsp;</b></p><p></p><ul><li>Familie:Cichlidae&nbsp;<br></li><li>Habitat: America de sud&nbsp;<br></li><li>Dificultate: moderataAcvariu minim: 80 litri&nbsp;<br></li><li>Dimensiune: 5-9 cm&nbsp;<br></li><li>Apa: dulce</li><li>pH-ul apei: 6.0 - 7.0&nbsp;<br></li><li>Temperatura apei: 23.9 - 26.7 °C&nbsp;<br></li><li>Duritatea apei: 6-10 °d&nbsp;<br></li><li>Raspandire: rar&nbsp;<br></li><li>Dieta: omnivor, hrana vie, fulgi, granule&nbsp;<br></li><li>Durata de viata: 5-6 ani<br></li></ul><p></p>', 'Pești'),
(1684, '18', 'Microgeophagus Ramirezi', 10, 'Microgeophagus Ramirezi este un peste puternic colorat, al carui lungime se afla in jurul valorii de 5-5.5 cm, dar poate ajunge si la 7 cm. Corpul este albastru, cu dungi groase, negre in partea anterioara si albastru inchis in partea posterioara. Zona branhiilor si a gurii este galbena cu reflexii albastre. Toate inotatoarele prezinta reflexii albastre sub forma unor pete rotunde. Microgeophagus Ramirezi provine din Columbia și Venezuela, din bazinul Orinoco. Prefera apele încet curgatoare, lacurile si zonele inundate din savana.\r\n\r\nCaracteristici:\r\n\r\nHabitat: America de Sud\r\nFamilie: Cichlidae\r\nRaspandire: Comun\r\nDificultate: Moderata\r\nDieta: Omnivor, hrana vie, granule, fulgi\r\nAcvariu minim: 56.8 Litri\r\nDimensiune: 3.8-5.1cm\r\nApa: Dulce\r\npH: 5.5 - 7.5\r\nTemperatura: 23.9-27.8°C\r\nDuritate: 5-12 °d\r\nRaport sexe: 1:1 M:F\r\nDurata de viata: 3-4 ani', 'Pești'),
(1685, '19', 'Papiliochromis ramirezi red-gold', 16, 'Forma de prezentare: 3-3,5 cm\r\nOmnivor pasnic, este indicat ca in acvariu sa fie pastrati in raport de 1 mascul si cel putin 3 femele.\r\nEste recomandat sa fie asociat cu alte specii non-agresive si de dimensiuni mici.\r\nHabitat: acvariul trebuie sa contina substrat cu nisip, plante si roci.\r\nSpecii compatibile: alte cichlide sau specii non-agresive\r\nHrana: crustacee si nevertebrate mici, melci, larve de insecte, fulgi, granule.', 'Pești'),
(1686, '20', 'Tilapia buttikoferi', 29, 'Tilapia buttikoferi este o specie de pesti de apa dulce, raspandita in apele raurilor si a lacurilor din zona vestica a continentului african, intre Guineea si Liberia. Stiintific, acest peste mai este cunoscut si sub numele de Chromis buttikoferi. Pestii Tilapia buttikoferi au nevoie de un acvariu amenajat cu un substrat de pietris, al carui culoare se va reflecta in nuanta pestilor. Cu cat substratul este mai inchis, cu atat mai inchisa va fi culoarea pestelui. Cat despre hrana, Tilapia buttikoferi mananca orice planta din acvariu, granule si hrana vie sau congelata, rame, Artemia si larve de tantari.\r\n\r\nCaracteristici:\r\n\r\nHabitat: Africa\r\nFamilie: Cichlidae\r\nDificultate:Moderata\r\nCapacitate acvariu: minimum 470 Litri\r\nDimensiune: 25-40 cm\r\nApa: dulce\r\npH-ul apei: 6.8 - 7.0\r\nTemperatura apei: 24 -28 °C\r\nDuritatea apei: 8-10 °d\r\nRaspandire: neobisnuita\r\nDieta: omnivor, hrana vie, granule\r\nDurata de viata: 10-15 ani', 'Pești'),
(1687, '21', 'Microrasbora Galaxy', 29, 'Temperatura °C: 22-24\r\npH: 5.6-7.4\r\nLungime maxima: 2,5cm\r\nDurata vietii: 3-5 ani\r\nComportament: pasnic\r\nClasa : Cyprinidae\r\nMicrorasbora galaxy (Danio margaritatus) este cel mai apreciat, dorit, folosit peste pentru acvariile nano.\r\n\r\nDimensiunea redusa, culorile atractive(buline albe pe fond verde inchis, cu inotatoare rosii) asemanatoare cu pastravii, temperamentul pasnic si comportamentul de peste de card, sunt doar cateva dintre caracteristicile care il recomanda in hobby. Nu este deloc un peste agresiv si poate cohabita fara problem cu melci, creveti sau racusori de asemenea pasnici. Nu se recomanda sa fie asociat cu ciclide mari sau alte specii agresive deoarece datorita dimensiunilor reduse este foarte fragil. Dimorfism sexual: masculii prezinta un colorit mai intens, mai ales in cazul inotatoarelor(acestea au un rosu mai aprins iar desenul se intinde pe o suprafata mai mare), femelele au abdomenul mai alb, inotatoarele aproape transparente(culorile mai fade, desenul mai restrans). De asemenea masculii au forma mai supla decat femelele, care au o forma usor robusta.\r\n\r\nSe poate reproduce in acvarii insa reproducerea acestuia este putin mai dificila decat in cazul viviparilor. Este o specie care depune aproximativ 30 de icre, care mai apoi sunt fecundate de catre mascul. Nu sunt parinti buni, motiv pentru care icrele/puii sunt consummati dupa depunere/eclozare. Se recomanda sa fie asociati in raport egal masculi/female, iar datorita faptului ca sunt o specie mai timida, se recomanda plantarea masiva a acvariului pentru a avea destule locuri in care sa se ascunda. Fiind peste de card, este necasara achizitionarea a cel putin sase indivizi.\r\n\r\nCu cat sunt in numar mai mare, cu atat vor iesi mai mult din ascunzatori si vor oferi un spectacol mai deosebit prin miscarile lor energice. Hranirea se realizeaza cel mai simplu cu mancare din comert(fulgi sau granule), insa se va tine seama ca este unul dintre cei mai mici pesti, iar hrana va trebui astfel adaptata dimensiunilor lor.', 'Pești'),
(1688, '22', 'Rasbora maculata', 8, 'Se mai regaseste sub denumirile de Boraras Maculatus/Dwarf rasbora. Este un peste pasnic, potrivit pentru acvarii mici si foarte mici, nano-acvarii. Originar din Malaezia, traieste in rauri si zone mlastinoase cu apa mai acida, datorata descompunerii materiilor organice: frunze, crengi etc. Se simt cel mai bine in acvarii cu vegetatie deasa, eventual cu plante plutitoare. Nu este necesar sa aibna un curent puternic de apa.\r\n\r\nDieta este compusa in general din insecte mici si alta hrana vie, dar va accepta si hrana uscata. Pentru cea mai buna colorare este indicat sa fie hranit odata la cateva zile cu hrana vie sau congelata, de exemplu artemia sau daphnia.\r\n\r\nEste o specie gregara si se va simti cel mai bine in grupuri de 8-10 indivizi. Bancurile cu cel putin acest numar de pesti nu le va afecta comportamentul, ii vor face mai putini timizi, mai colorati si vor avea un aspect mai natural. \r\n\r\nVor depune icre chiar si zilnic printre plante, dar grija fata de acestea sau puiet este inexistenta. Dimpotriva, isi va consuma icrele. Totusi. este posibil sa apara puii fara nicio interventie umana. Pentru cele mai bune rezultate in inmultire este indicat sa li se puna la dispozitie moss si sa se scada pH-ul la 5.0 - 6.5 si o temperatura mai inalta, de 26-28 grade C.', 'Pești'),
(1689, '23', 'Microrasbora Erythromicon', 10, 'Habitat\r\n\r\nSe intalnesc in mare parte pe sectiunile raurilor usor curgatoare si afluenntilor din padure unde plantele acvatice cresc dens, cum ar fi speciile Cryptocoryne.Apa este uneori de un maroniu slab / galben datorita prezentei de taninuri si alte substante chimice eliberate prin descompunerea materiei organice si a substratului acoperit cu frunze, crengi si ramuri cazute. Astfel de medii contin, in mod caracteristic, apa moale, slab acida pana la neutra si sunt adesea slab luminate datorita vegetatiei marginale si a zonei de padure de deasupra raului.\r\n\r\nIntretinere\r\n\r\nAlegerea decorului nu este atat de esentiala, desi pestii tind sa afiseze o colorare mai intensa atunci cand acvariul este amenajat cu un substrat inchis la culoare.\r\nUn aranjament mai natural ar putea consta dintr-un substrat moale, nisipos, cu radacini sau ramuri de lemn asezate astfel încat sa se formeze o multime de zone umbroase si pesteri. Adaugarea de frunze uscate (fag, stejar sau frunze de migdale de Ketapang) ar accentua mai mult simturile naturale si odată cu acestea, se vor dezvolta colonii benefice de microbi. Acestea pot oferi o sursa secundara de hrana, in timp ce taninurile si alte substante chimice eliberate de frunzele descompuse vor ajuta la simularea unui mediu de apa negra. Frunzele pot fi lasate in acvariu pentru a se descompune complet, fie indepÄƒrtate si inlocuite la fiecare cateva saptamani.\r\nAceasta specie pare sa o duca cel mai bine in conditii de lumina destul de slaba, iar speciile de plante precum Microsorum, Taxiphyllum, Cryptocoryne si Anubias sunt recomandate, deoarece vor creste in astfel de conditii. De asemena se pot folosi cateva plante plutitoare care ar difuza si mai mult lumina.\r\n\r\nDieta\r\n\r\nIn natura se hraneste cu insecte mici, viermi si crustacee. Hranirea lor in acvariu se face cu usurinta , dar pentru cea mai buna stare de sanatate si culori se ofera mese regulate de hrana vie si/sau congelata, cum ar fi Daphnia si Artemia, alaturi de fulgi si granule uscate de buna calitate.', 'Pești'),
(1690, '24', 'Barbus titteya', 5, 'Barb cires (Puntius titteya) este un peste tropical, ce apartine genului Barb reperat din familia Cyprinidae. Este originar din Sri Lanka si a fost numit Puntius titteya de Paules Edward Pieris Deraniyagala, in 1929. Sinonime includ Barbus titteya si Capoeta titteya. Specia este extrem de cautat pe piata acvarristilor si este in pericol de a fi supraexploatate pentru aceastÄƒ industrie. Este o specie cu corpul fusiform alungit, de maximum 5 cm lungime.Masculii sunt mai puternic colorati decat femelele, dar sunt si mai slabi decat acestea. Pentru a le asigura un mediu prielnic, aveti nevoie de un acvariu lung, cu mediu intunecat, pentru a-i evidentia. Ei prefera o apa statuta, la o temperatura de 23-25 grade Celsius si locuri bine plantate, cu substrat din pietris marunt si nisip.<b>Caracteristici:</b>&nbsp;<p><ul><li>Regnul: Animalia&nbsp;<br></li><li>Increngătura: Chordata&nbsp;<br></li><li>Familie: Cyprinidae&nbsp;<br></li><li>Genul: PuntiusSpecii: P. titteya&nbsp;<br></li><li>Lungime: 4 cm - 5 cm&nbsp;<br></li><li>Temperatura apei: 23 ºC - 25 ºC&nbsp;<br></li><li>pH-ul apei: 6 - 8<br></li></ul></p>', 'Pești'),
(1691, '25', 'Barbus oligolepsis', 4, 'Barbus oligolepsis sunt pesti pasnici, originari din India si dinarhipelagul malaezian, care obisnuiesc sa traiasca in lacuri, rauri mici si chiar in bazine din gradini si parcuri publice. Are solzii relativ mari, cu marginile negre care lucesc in culorile curcubeului. Culoarea de baza a pestilor Barbus oligolepsis este verzuie - maro, avand inotatoarele de nuanta rosu - inchis. Barbus oligolepsis este un peste omnivor, hranindu-se cu crustacee si larve de chironomide.Acest peste poate fi crescut cu usurinta atat de acvaristii cu experienta, cat si de acvaristii incepatori. Ei pot convietui in acvariu alaturi de specii ca Puntius tetrazona, Betta splendens, Hemmigramus caudovittatus, Calisa lalia, Trichogaster leeri si Hyphessobrycon flammeus.&nbsp;<p><b>&nbsp;Caracteristici:&nbsp;</b></p><p><ul><li>Originar: India&nbsp;<br></li><li>Duritatea apei: medie&nbsp;<br></li><li>Temperatura apei: 20-24°C&nbsp;<br></li><li>Hrana: omnivor<br></li></ul></p>', 'Pești'),
(1692, '26', 'Symphysodon axelrodi', 51, 'Forma de prezentare: 3 cm\r\nCarnivor semi-agresiv, este indicat ca in acvariu sa fie pastrati in grupuri de 6-8 indivizi.\r\nEste recomandat sa fie asociat cu alte specii non-agresive si de dimensiuni mici.\r\nHabitat: acvariul trebuie sa contina substrat cu nisip, plante si roci.\r\nSpecii compatibile: alte cichlide sau specii non-agresive\r\nHrana: în acvariu se hrănesc cu orice: alge, fulgi, hranÄƒ vie (melci, larve de țânțari, microorganisme, crustacee, tubifex), mixtură creveți - mazăre, spirulină, fulgii bogați în proteine vegetale.', 'Pești'),
(1693, '27', 'Symphysodon blue turquoise', 149, 'Semi-agresiv, este indicat ca in acvariu sa fie pastrati in grupuri de 6-8 indivizi.\r\nEste recomandat sa fie asociat cu alte specii non-agresive si de dimensiuni mici.\r\nHabitat: acvariul trebuie sa contina substrat cu nisip, plante si roci.\r\nSpecii compatibile: alte cichlide sau specii non-agresive\r\nHrana: ÃŽn acvariu se hrÄƒnesc cu orice: alge, fulgi, hranÄƒ vie (melci, larve de Å£Ã¢nÅ£ari, microorganisme, crustacee, tubifex), mixturÄƒ creveÅ£i - mazÄƒre, spirulinÄƒ, fulgii bogaÅ£i Ã®n proteine vegetale.', 'Pești'),
(1694, '28', 'Discus royal blue', 53, 'Discus royal blue - Symphysodon aequifasciatus haraldi este un peste pasnic, ce poate fi crescut usor intr-un acvariu destinat acestei specii. Cu toate acestea, poate convietui alaturi de alte specii, fiind compatibil cu Tetra Cardinal, Corydoras, Tetra Neon si Ottos. Inaltimea acvariului trebuie sa fie de cel putin 50 de centimetri, iar in amenajarea lui trebuie luate in considerare plasarea unor radacini, lemne si a unei vegetatii dense, pestele avand nevoie de multe zone de ascunzis. De asemenea, trebuie sa existe si spatiile deschise pentru inot. Pestii Discus royal blue sunt foarte sensibili la nitrati. Ca hrana, sunt recomandate alimentele uscate.', 'Pești'),
(1695, '29', 'Nothobranchius guentheri', 13, 'Nothobranchius guentheri sunt pesti care au nevoie de acvarii specifice, cu suficient spatiu de inot, intrucat masculii pot deveni destul de agresivi. Ei pot fi hraniti cu Artemia, Daphnia si larve de Chironomidae, dar vor accepta ocazional si granule sau fulgi. La amenajarea acvariului trebuie sa se tina cont de nevoile acestuia, fiind recomandate substrat inchis la culore, preferabil turba, zone dens plantate si decoruri din crengi si radacini, plante plutitoare pentru a diminua cantitatea de lumina si capac intrucat Nothobranchius guentheri sunt obisnuiti sa sara din apa.\r\n\r\nCaracteristici:\r\n\r\nHabitat: Africa\r\nFamilie: Nothobranchiidae\r\nDieta: carnivor, hrana vie, granule, fulgi\r\nDurata de viata: 1-2 ani\r\nDificultate: medie\r\nCapacitate acvariu: minimum 38 Litri\r\nDimensiunea speciei: 4-5 cm\r\nApa: dulce\r\npH-ul apei: 6.5 - 8.0\r\nTemperatura apei: 22.2 - 25°C\r\nDuritatea apei:10 - 25 °d', 'Pești'),
(1696, '30', 'Nothobranchius patrizii', 21, 'Nothobranchius patrizii sau Blue notho sunt pesti care pot fi tinuti alaturi de alti killifish robusti, dar este recomandat sa se pastreze mai multe femele decat masculi. Acestia mananca doar alimente vii de mici dimensiuni, cum ar fi tubifex, muste de fructe, larve de tantari si artemia. Sunt lacomi si hranirea trebuie sa se faca in doze mici, de mai multe ori pe zi.\r\n\r\nSubstratul acvariului ar trebui sa contina praf de turba, pe care sa fie amenanata o varietate de refugii, sub forma unei vegetatii dense si bucati spiralate din lemn pietrificat. Ei nu apreciaza o lumina stralucitoare, fiind astfel recomandat un capac gros si plante plutitoare, care sa filtreze lumina naturala. De asemenea, nu le place curent.\r\n\r\nCaracteristici:\r\n\r\nHabitat: mlastini de apa dulce din Kenya, Somalia si Africa de Est\r\nFamilie: Aplocheilidae\r\nDificultate: medie\r\nCapacitate acvariu: minimum 38 Litri\r\nDimensiunea speciei: 4 - 5.5 cm\r\nApa: dulce\r\npH-ul apei: 6.5 - 8.0\r\nTemperatura apei: 22 -25 °C\r\nDuritatea apei: 10 - 25 °d\r\nDieta: carnivor, hrana vie, granule, fulgi\r\nDurata de viata: 1-2 ani', 'Pești'),
(1697, '31', 'Pseudomugil Furcatus', 14, 'Sunt pesti omnivori, care apreciaza hrana vie precum Artemia si larve de Chironomidae. Cu toate acestea, vor manca hrana uscata precum granule sau fulgi, dar au nevoie si de hrana de origine vegetala. Masculii Melanotaenia Praecox au inotatoarele rosii, iar femelele galben, pana la portocaliu deschis. Ei se inmultesc in captivitate. Icrele sunt lipicioase si vor fi plantate la radacinile plantelor de suprafata si pe frunzele plantelor din apropierea suprafetei apei. Acvariul cu Melanotaenia Praecox trebuie sa aiba multa verdeata si suficient spatiu de inot. Acesti pesti au nevoie de apa curata si este recomandat sa schimbati 25-50% din apa in fiecare saptamana.', 'Pești'),
(1698, '32', 'Hrana vivipari Dennerle Guppy&Co', 25, 'Hrana de baza pentru pestii vivipari\r\n\r\nDaca nu stiati, 1 din 3 pesti vanduti este un vivipar. Aceasta hrana a fost creata special pentru popularii guppy, xipho, platy si molly, in concordanta cu dieta lor naturala. Proportia mare de ingrediente naturale, care va aplifica culoarea pestilor va duce la niste nuante deosebite la acesti pesti foarte pigmentati. Substanta beta-glucan este adaugata pentru a intari sistemul imunitar al viviparilor, impreuna cu substante prebiotice si probiotice care vor asigura ca pestii sunt bine protejati impotriva infectiilor bacteriiene non-specifice.\r\n\r\nRecomandare de hranire: de 2-3 ori cat pot sa manance intr-un minut, zilnic.', 'Hrană'),
(1699, '33', 'Delicatese pesti Sera Tubifex', 14, 'Sera Tubifex sunt delicatese speciale pentru pestii de fund. Tubifex stau in special in sol namoloasa si, prin urmare, sunt o delicatesa adevarata pentru pestii acestor regiuni. Datorita procesului special de fabricatie marca Sera, Tubifex sunt - spre deosebire de alimentele congelate - fara paraziti si agenti patogeni. Ingredientele lor valoroase sunt pastrate datorita prelucrarii blande. Sera Tubifex este un produs uscat prin congelare in vid si totodata un furaj hranitor pentru toti pestii carnivori, precum ciclidele sud-americane, characidele si sanitarii cu armura. Sera Tubifex se administreaza de 2-3 ori pe saptamana.', 'Hrană'),
(1700, '34', 'Fulgi pesti Sera GVG-mix', 11, 'Sera GVG-mix este o hrana pentru pestii de apa dulce, ce consta in fulgi cu delicatese aditionale. Acesti fulgi special contin o cantitate mare de creveti Gammarus si Spirulina din alge, plus organisme atent congelare precum krill, dafnia si lipitori. Datorita acestui amestec, hrana este extrem de atractiva pentru pestii de acvariu. Pe langa un gust atractiv, nivelul natural echilibrat de minerale si oligoelemente (iod si calciu, printre altele), ofera protectie naturala impotriva multor sindroame de deficit. Fulgii Sera GVG-mix contin 80% alge marine, krill si plancton, restul de 20% fiinf format din larve de insecte chironomid, dafnia si creveti.', 'Hrană'),
(1701, '35', 'Delicatese pesti Sera O-nip', 29, 'Sera O-nip este o tableta atasabila, ce constituie o hrana concentrata pentru pesti de apa dulce si pesti marini. Serurile O- nip constă in tablete comprimate si organisme intregi inghetate, cum ar fi de krill, lipitori, Tubifex sau Gammarus. Ea se lipeste de sticla interioara a acvariului printr-o simpla apsare, lasandu-va sa urmariti modul de hranire al pestilor. Aceste tablete alimentare sunt usor acceptate ca o delicatesă specială de aproape toti pestii. De asemenea, ele sunt potrivite pentru somn si pesti din familia loaches.', 'Hrană'),
(1702, '36', 'Hranitor automat Sera Feed A plus', 119, 'Sera Feed A plus este un dispozitiv de hranire automata a pestilor, care se poate seta sa ofere pana la 6 hraniri pe zi. In functie de programare, Sera Feed A plus elibereaza in acvariu o cantitate prestabilita de hrana - cantitate reglabila de la 1 la 6 ori pe zi. Sera Feed A Plus este destitant hranirii continue, exacte si fiabile a tuturor pestilor de acvariu. Compartimentul alimentar al hranitorului automat este rotund si are o capacitate de aproximativ 80 ml de hrana. In timpul eliberarii, mancarea aluneca incet si uniform in acvariu. Hranitorul include o carcasa de protectie contra stropirii cu apa, pentru acoperirea optima a elementelor operationale, si un conector special cu furtun de aer cu care Sera Feed A plus poate fi conectat la pompa de aer pentru pastrarea mancarii uscate.', 'Accesorii');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `familyName` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` text NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `customers`
--

INSERT INTO `customers` (`id`, `familyName`, `firstName`, `email`, `tel`, `pass`) VALUES
(33, 'Leonte', 'Alexandru', 'alex.leo06@yahoo.ro', '0741111111', 'a');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `offers`
--

CREATE TABLE `offers` (
  `imageOrig` int(11) NOT NULL,
  `image` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `offers`
--

INSERT INTO `offers` (`imageOrig`, `image`) VALUES
(36, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `artName` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `orders`
--

INSERT INTO `orders` (`id`, `email`, `artName`, `quantity`) VALUES
(62, 'alex.leo06@yahoo.ro', 'Aulonocara_nyassae', '58'),
(63, 'alex.leo06@yahoo.ro', 'Fulgi_pesti_Sera_GVG-mix', '76'),
(65, 'alex.leo06@yahoo.ro', 'Apistogramma_cacatuoides', '21'),
(66, 'alex.leo06@yahoo.ro', 'Barbus_oligolepsis', '55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articol`
--
ALTER TABLE `articol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`image`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articol`
--
ALTER TABLE `articol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1703;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
