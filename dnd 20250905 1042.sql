-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.27-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dnd
--

CREATE DATABASE IF NOT EXISTS dnd;
USE dnd;

--
-- Definition of table `bag`
--

DROP TABLE IF EXISTS `bag`;
CREATE TABLE `bag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idFicha` varchar(45) DEFAULT NULL,
  `aparencia` varchar(45) DEFAULT NULL,
  `pc` tinyint(4) unsigned DEFAULT '0',
  `pp` tinyint(4) unsigned DEFAULT '0',
  `pe` tinyint(4) unsigned DEFAULT '0',
  `po` tinyint(4) unsigned DEFAULT '0',
  `pl` tinyint(4) unsigned DEFAULT '0',
  `equip1nome` varchar(20) DEFAULT NULL,
  `equip1bonus` varchar(20) DEFAULT NULL,
  `equip1dano` varchar(20) DEFAULT NULL,
  `equip1tipo` varchar(20) DEFAULT NULL,
  `equip2nome` varchar(20) DEFAULT NULL,
  `equip2bonus` varchar(20) DEFAULT NULL,
  `equip2dano` varchar(20) DEFAULT NULL,
  `equip2tipo` varchar(20) DEFAULT NULL,
  `equip3nome` varchar(20) DEFAULT NULL,
  `equip3bonus` varchar(20) DEFAULT NULL,
  `equip3dano` varchar(20) DEFAULT NULL,
  `equip3tipo` varchar(20) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bag`
--

/*!40000 ALTER TABLE `bag` DISABLE KEYS */;
INSERT INTO `bag` (`id`,`idFicha`,`aparencia`,`pc`,`pp`,`pe`,`po`,`pl`,`equip1nome`,`equip1bonus`,`equip1dano`,`equip1tipo`,`equip2nome`,`equip2bonus`,`equip2dano`,`equip2tipo`,`equip3nome`,`equip3bonus`,`equip3dano`,`equip3tipo`,`comentario`) VALUES 
 (1,'1','aparencia/1.png',0,0,0,146,0,'Espada Longa','','1d8','Cortante','','','','','','','','','Raça: Elfo\r\n        Espada Longa\r\nClasse: Mago\r\n        Bordão\r\n        Orbe\r\n        Pacote de explorador\r\n        Grimório\r\nAntecedente Sábio:\r\n        Um vidro de tinta escura\r\n        Uma pena\r\n        Uma faca pequena\r\n        Roupas comuns'),
 (2,'2',NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (3,'3',NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (4,'4','',0,0,0,25,0,'','','','','','','','','','','','',NULL);
/*!40000 ALTER TABLE `bag` ENABLE KEYS */;


--
-- Definition of table `batalha`
--

DROP TABLE IF EXISTS `batalha`;
CREATE TABLE `batalha` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idFicha` varchar(45) DEFAULT NULL,
  `classeArmadura` tinyint(2) unsigned DEFAULT '0',
  `iniciativa` tinyint(2) unsigned DEFAULT '0',
  `deslocamento` tinyint(2) unsigned DEFAULT '0',
  `vidaTotal` tinyint(3) unsigned DEFAULT '0',
  `vidaAtual` tinyint(3) unsigned DEFAULT '0',
  `vidaTemporario` tinyint(3) unsigned DEFAULT '0',
  `ca` tinyint(3) unsigned DEFAULT '0',
  `classeConjurador` varchar(45) DEFAULT '0',
  `habChave` varchar(45) DEFAULT '0',
  `cddotr` tinyint(3) unsigned DEFAULT '0',
  `bonusAtaque` varchar(45) DEFAULT '0',
  `tMorteSucesso1` tinyint(1) unsigned DEFAULT NULL,
  `tMorteSucesso2` tinyint(1) unsigned DEFAULT NULL,
  `tMorteSucesso3` tinyint(1) unsigned DEFAULT NULL,
  `tMorteFracasso1` tinyint(1) unsigned DEFAULT NULL,
  `tMorteFracasso2` tinyint(1) unsigned DEFAULT NULL,
  `tMorteFracasso3` tinyint(1) unsigned DEFAULT NULL,
  `danoTotal` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batalha`
--

/*!40000 ALTER TABLE `batalha` DISABLE KEYS */;
INSERT INTO `batalha` (`id`,`idFicha`,`classeArmadura`,`iniciativa`,`deslocamento`,`vidaTotal`,`vidaAtual`,`vidaTemporario`,`ca`,`classeConjurador`,`habChave`,`cddotr`,`bonusAtaque`,`tMorteSucesso1`,`tMorteSucesso2`,`tMorteSucesso3`,`tMorteFracasso1`,`tMorteFracasso2`,`tMorteFracasso3`,`danoTotal`) VALUES 
 (1,'1',0,0,9,17,17,0,12,'mago','INT',13,'5',0,0,0,0,0,0,0),
 (2,'2',0,0,0,0,0,0,0,'0','0',0,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (3,'3',0,0,0,0,0,0,0,'0','0',0,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (4,'4',0,1,9,14,14,0,13,'Mago','INT',14,'6',0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `batalha` ENABLE KEYS */;


--
-- Definition of table `ficha`
--

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE `ficha` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomePersonagem` varchar(45) DEFAULT NULL,
  `classe` varchar(45) DEFAULT NULL,
  `nivel` int(2) unsigned DEFAULT '0',
  `antecedente` varchar(45) DEFAULT NULL,
  `nomeJogador` varchar(45) DEFAULT NULL,
  `raca` varchar(45) DEFAULT NULL,
  `tendenciaEticaMoral` varchar(45) DEFAULT NULL,
  `tendenciaMoral` varchar(45) DEFAULT NULL,
  `exp` double DEFAULT '0',
  `forca` double DEFAULT '0',
  `destreza` double DEFAULT '0',
  `constituicao` double DEFAULT '0',
  `inteligencia` double DEFAULT '0',
  `sabedoria` double DEFAULT '0',
  `carisma` double DEFAULT '0',
  `resForca` double DEFAULT NULL,
  `resDestreza` double DEFAULT NULL,
  `resConstituicao` double DEFAULT NULL,
  `resInteligencia` double DEFAULT NULL,
  `resSabedoria` double DEFAULT NULL,
  `resCarisma` double DEFAULT NULL,
  `acrobacia` double DEFAULT NULL,
  `arcanismo` double DEFAULT NULL,
  `atletismo` double DEFAULT NULL,
  `atuacao` double DEFAULT NULL,
  `blefar` double DEFAULT NULL,
  `furtividade` double DEFAULT NULL,
  `historia` double DEFAULT NULL,
  `intimidacao` double DEFAULT NULL,
  `intuicao` double DEFAULT NULL,
  `investigacao` double DEFAULT NULL,
  `lidarAnimais` double DEFAULT NULL,
  `medicina` double DEFAULT NULL,
  `natureza` double DEFAULT NULL,
  `percepcao` double DEFAULT NULL,
  `persuacao` double DEFAULT NULL,
  `prestigitacao` double DEFAULT NULL,
  `religiao` double DEFAULT NULL,
  `sobrevivencia` double DEFAULT NULL,
  `bonusProeficiencia` int(1) unsigned DEFAULT NULL,
  `vidaTotal` int(3) unsigned DEFAULT '0',
  `classeArmadura` int(2) unsigned DEFAULT '0',
  `iniciativa` int(2) unsigned DEFAULT '0',
  `deslocamento` int(2) unsigned DEFAULT '0',
  `vidaAtual` int(3) unsigned DEFAULT '0',
  `proeAcrobacia` tinyint(1) unsigned DEFAULT '0',
  `proeArcanismo` tinyint(1) unsigned DEFAULT '0',
  `proeAtletismo` tinyint(1) unsigned DEFAULT '0',
  `proeAtuacao` tinyint(1) unsigned DEFAULT '0',
  `proeBlefar` tinyint(1) unsigned DEFAULT '0',
  `proeFurtividade` tinyint(1) unsigned DEFAULT '0',
  `proeHistoria` tinyint(1) unsigned DEFAULT '0',
  `proeIntimidacao` tinyint(1) unsigned DEFAULT '0',
  `proeIntuicao` tinyint(1) unsigned DEFAULT '0',
  `proeInvestigacao` tinyint(1) unsigned DEFAULT '0',
  `proeLidarAnimais` tinyint(1) unsigned DEFAULT '0',
  `proeMedicina` tinyint(1) unsigned DEFAULT '0',
  `proeNatureza` tinyint(1) unsigned DEFAULT '0',
  `proePercepcao` tinyint(1) unsigned DEFAULT '0',
  `proePrestigitacao` tinyint(1) unsigned DEFAULT '0',
  `proeReligiao` tinyint(1) unsigned DEFAULT '0',
  `proeSobrevivencia` tinyint(1) unsigned DEFAULT '0',
  `proePersuacao` tinyint(1) unsigned DEFAULT '0',
  `idade` tinyint(2) unsigned DEFAULT '0',
  `altura` varchar(20) DEFAULT NULL,
  `peso` varchar(20) DEFAULT '0',
  `olhos` varchar(20) DEFAULT NULL,
  `pele` varchar(20) DEFAULT NULL,
  `cabelos` varchar(20) DEFAULT NULL,
  `proeForca` tinyint(1) unsigned DEFAULT '0',
  `proeDestreza` tinyint(1) unsigned DEFAULT '0',
  `proeConstituicao` tinyint(1) unsigned DEFAULT '0',
  `proeInteligencia` tinyint(1) unsigned DEFAULT '0',
  `proeSabedoria` tinyint(1) unsigned DEFAULT '0',
  `proeCarisma` tinyint(1) unsigned DEFAULT '0',
  `comentario` varchar(999) DEFAULT NULL,
  `ideais` varchar(99) DEFAULT NULL,
  `ligacoes` varchar(99) DEFAULT NULL,
  `defeitos` varchar(99) DEFAULT NULL,
  `personalidade` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ficha`
--

/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
INSERT INTO `ficha` (`id`,`nomePersonagem`,`classe`,`nivel`,`antecedente`,`nomeJogador`,`raca`,`tendenciaEticaMoral`,`tendenciaMoral`,`exp`,`forca`,`destreza`,`constituicao`,`inteligencia`,`sabedoria`,`carisma`,`resForca`,`resDestreza`,`resConstituicao`,`resInteligencia`,`resSabedoria`,`resCarisma`,`acrobacia`,`arcanismo`,`atletismo`,`atuacao`,`blefar`,`furtividade`,`historia`,`intimidacao`,`intuicao`,`investigacao`,`lidarAnimais`,`medicina`,`natureza`,`percepcao`,`persuacao`,`prestigitacao`,`religiao`,`sobrevivencia`,`bonusProeficiencia`,`vidaTotal`,`classeArmadura`,`iniciativa`,`deslocamento`,`vidaAtual`,`proeAcrobacia`,`proeArcanismo`,`proeAtletismo`,`proeAtuacao`,`proeBlefar`,`proeFurtividade`,`proeHistoria`,`proeIntimidacao`,`proeIntuicao`,`proeInvestigacao`,`proeLidarAnimais`,`proeMedicina`,`proeNatureza`,`proePercepcao`,`proePrestigitacao`,`proeReligiao`,`proeSobrevivencia`,`proePersuacao`,`idade`,`altura`,`peso`,`olhos`,`pele`,`cabelos`,`proeForca`,`proeDestreza`,`proeConstituicao`,`proeInteligencia`,`proeSabedoria`,`proeCarisma`,`comentario`,`ideais`,`ligacoes`,`defeitos`,`personalidade`) VALUES 
 (1,'Zarothiel','Mago',3,'Sabio','Icaro','Alto elfo','Neutro Leal','Leal',0,10,10,15,17,13,8,0,0,2,3,1,-1,0,3,0,-1,-1,0,3,-1,1,3,1,1,3,1,-1,0,3,1,2,17,11,0,9,17,0,1,0,0,0,0,1,0,1,1,0,0,0,1,0,0,0,0,20,'1,80','50kg','Castanhos','Branca','Prateados',0,0,0,0,0,0,'Formado em 65535 formas de encher o cu dos outros de magia\r\n\r\nElfo: \r\n        +2 em destreza\r\n        Alto Elfo: \r\n                +1 em Inteligência\r\n        Sentidos Aguçados:\r\n                Proficiência na perícia Percepção.\r\n\r\n        Visão no Escuro \r\n                (18m) (não diferencia cor)\r\n        Ancestral Feérico\r\n                Resistir a ser enfeitiçado (rolar 2x)\r\n                Magia não me coloca para dormir\r\n        Sentidos Aguçados\r\n                Melhor percepção\r\n\r\nSábio:\r\n    Proficiente em Arcanismo e História','Auto Aperfeiçoamento. \r\nO objetivo de uma vida de estudos e a melhoria de si mesmo','É meu dever proteger meus estudantes.','Eu não consigo guardar um segredo para salvar minha vida ou a vida de qualquer outra pessoa.','Sou horrível e estranho em situações sociais.'),
 (3,'Cleition Rasta','5',1,'acólito','joão','anão',NULL,NULL,0,12,15,13,8,10,18,1,2,1,-1,0,4,2,-1,1,4,4,2,-1,4,0,-1,0,0,-1,0,4,2,-1,0,3,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'0',NULL,NULL,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL),
 (4,'Zief','MAGO',2,'Sábio','Daniel','Humano','',NULL,0,12,13,15,18,14,18,1,1,2,4,2,4,1,4,1,4,4,1,4,4,2,4,2,2,4,2,4,1,4,2,2,0,0,0,0,0,0,1,0,0,0,0,1,0,0,1,0,1,0,0,0,0,0,0,24,'1,83','83','Castanhos E.','Branco','Preto',0,0,0,0,0,0,'',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;


--
-- Definition of table `listamagias`
--

DROP TABLE IF EXISTS `listamagias`;
CREATE TABLE `listamagias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `escola` varchar(45) DEFAULT NULL,
  `tempo` varchar(45) DEFAULT NULL,
  `alcance` varchar(45) DEFAULT NULL,
  `componente_v` tinyint(1) unsigned DEFAULT '0',
  `componente_s` tinyint(1) unsigned DEFAULT '0',
  `componente_m` varchar(45) DEFAULT NULL,
  `duracao` varchar(20) DEFAULT NULL,
  `efeito` varchar(255) DEFAULT NULL,
  `lv1` varchar(5) DEFAULT '-',
  `lv5` varchar(5) DEFAULT '-',
  `lv11` varchar(5) DEFAULT '-',
  `lv17` varchar(5) DEFAULT '-',
  `nivelMagia` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listamagias`
--

/*!40000 ALTER TABLE `listamagias` DISABLE KEYS */;
INSERT INTO `listamagias` (`id`,`nome`,`escola`,`tempo`,`alcance`,`componente_v`,`componente_s`,`componente_m`,`duracao`,`efeito`,`lv1`,`lv5`,`lv11`,`lv17`,`nivelMagia`) VALUES 
 (1,'Amizade','Encantamento','1 ação','Pessoal',0,0,'Maquiagem no rosto','1h','Vantagem em testes de Carisma contra 1 criatura não hostil. Ao terminar, ela sabe que foi enfeitiçada','-','-','-','-',0),
 (2,'Ataque Certeiro',NULL,'1 acão','9m',0,1,NULL,'Conc, té 1 rodada',NULL,'-','-','-','-',0),
 (3,'Consertar',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (4,'Espirro Ácido',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (5,'Globos de luz',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (6,'Ilusão Menor',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (7,'Luz',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (8,'Mãos Mágicas',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (9,'Mensagem',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (10,'Prestidigitação',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (11,'Proteção contra lâminas',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (12,'Raio de fogo',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (13,'Raio de gelo',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (14,'Rajada de Veneno',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (15,'Toque arrepiante',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0),
 (16,'Toque chocante',NULL,NULL,NULL,0,0,NULL,NULL,NULL,'-','-','-','-',0);
/*!40000 ALTER TABLE `listamagias` ENABLE KEYS */;


--
-- Definition of table `magias`
--

DROP TABLE IF EXISTS `magias`;
CREATE TABLE `magias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idFicha` int(10) unsigned DEFAULT NULL,
  `id1Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia0` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia1` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia2` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia3` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia4` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia5` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia6` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia7` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia8` tinyint(3) unsigned DEFAULT NULL,
  `id1Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id2Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id3Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id4Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id5Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id6Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id7Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id8Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id9Magia9` tinyint(3) unsigned DEFAULT NULL,
  `id10Magia9` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magias`
--

/*!40000 ALTER TABLE `magias` DISABLE KEYS */;
INSERT INTO `magias` (`id`,`idFicha`,`id1Magia0`,`id2Magia0`,`id3Magia0`,`id4Magia0`,`id5Magia0`,`id6Magia0`,`id7Magia0`,`id8Magia0`,`id9Magia0`,`id10Magia0`,`id1Magia1`,`id2Magia1`,`id3Magia1`,`id4Magia1`,`id5Magia1`,`id6Magia1`,`id7Magia1`,`id8Magia1`,`id9Magia1`,`id10Magia1`,`id1Magia2`,`id2Magia2`,`id3Magia2`,`id4Magia2`,`id5Magia2`,`id6Magia2`,`id7Magia2`,`id8Magia2`,`id9Magia2`,`id10Magia2`,`id1Magia3`,`id2Magia3`,`id3Magia3`,`id4Magia3`,`id5Magia3`,`id6Magia3`,`id7Magia3`,`id8Magia3`,`id9Magia3`,`id10Magia3`,`id1Magia4`,`id2Magia4`,`id3Magia4`,`id4Magia4`,`id5Magia4`,`id6Magia4`,`id7Magia4`,`id8Magia4`,`id9Magia4`,`id10Magia4`,`id1Magia5`,`id2Magia5`,`id3Magia5`,`id4Magia5`,`id5Magia5`,`id6Magia5`,`id7Magia5`,`id8Magia5`,`id9Magia5`,`id10Magia5`,`id1Magia6`,`id2Magia6`,`id3Magia6`,`id4Magia6`,`id5Magia6`,`id6Magia6`,`id7Magia6`,`id8Magia6`,`id9Magia6`,`id10Magia6`,`id1Magia7`,`id2Magia7`,`id3Magia7`,`id4Magia7`,`id5Magia7`,`id6Magia7`,`id7Magia7`,`id8Magia7`,`id9Magia7`,`id10Magia7`,`id1Magia8`,`id2Magia8`,`id3Magia8`,`id4Magia8`,`id5Magia8`,`id6Magia8`,`id7Magia8`,`id8Magia8`,`id9Magia8`,`id10Magia8`,`id1Magia9`,`id2Magia9`,`id3Magia9`,`id4Magia9`,`id5Magia9`,`id6Magia9`,`id7Magia9`,`id8Magia9`,`id9Magia9`,`id10Magia9`) VALUES 
 (1,1,1,2,3,4,5,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,NULL);
/*!40000 ALTER TABLE `magias` ENABLE KEYS */;


--
-- Definition of table `texto`
--

DROP TABLE IF EXISTS `texto`;
CREATE TABLE `texto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idFicha` int(10) unsigned DEFAULT NULL,
  `historia` blob,
  `outros` varchar(999) DEFAULT NULL,
  `amigos` varchar(999) DEFAULT NULL,
  `inimigos` varchar(999) DEFAULT NULL,
  `tesouro` varchar(999) DEFAULT NULL,
  `organizacoes` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `texto`
--

/*!40000 ALTER TABLE `texto` DISABLE KEYS */;
INSERT INTO `texto` (`id`,`idFicha`,`historia`,`outros`,`amigos`,`inimigos`,`tesouro`,`organizacoes`) VALUES 
 (1,1,0x5261656C20287261656C2F7261656C697329203D20446575732C20646976696E6F20202020204E61696C6F203D204272697361206461204E6F69746520202020205261656C204E61696C6F203D2044657573206461206272697361206461206E6F697465202F20446976696E6F206461206272697361206461206E6F6974650D0A0D0A5261656C204E61696C6F206E617363657520656E747265206F7320416C746F7320456C666F732C206365726361646F20706F72207472616469C3A7C3B565732C206D616769612065206469736369706C696E612E0D0A4465736465206365646F2064656D6F6E7374726F7520756D61206D656E7465206272696C68616E74652065206D7569746F20736520657370657261766120646520736575206372657363696D656E746F2C206D617320696E66656C697A6D656E7465206E756E636120666F6920756D20656C666F20736F6369C3A176656C2E0D0A53657520C3BA6E69636F20636F6D70616E686569726F20666F69205369662C20756D206C6F626F206272616E636F2071756520656C6520656E636F6E74726F752061696E64612066696C686F74652C2066616D696E746F206520C3A0206265697261206461206D6F7274652E204F6E6465205261656C2069612C206F206C6F626F206F2061636F6D70616E686176612C20636F6D6F20756D6120736F6D627261206669656C2E2053696620657261206F20C3BA6E69636F20636F6D70616E686569726F206465205261656C20656D2073657573206C6F6E676F7320646961732064652065737475646F2065207072C3A174696361206465206D616769612E205261656C2065726120756D20626F6D20616C756E6F206520706172612073652073656E746972206D656C686F7220656D2073756120736F6C6964C3A36F2C206F732070726F666573736F72657320646176616D2061636573736F20C3A120746F64617320617320616C6173206461206269626C696F7465636120286174C3A92061732070726F6962C3AD646173290D0A456D20756D6120646520737561732063616D696E68616461732070656C6120666C6F72657374612C20756D2062616E646F206465206F72637320617461636F752E205261656C20736F6272657669766575206170656E617320706F7271756520536966207365206C616EC3A76F7520636F6E74726120656C65732E204F7320656C666F7320636865676172616D206520616361626172616D20636F6D206F73206F7263732C205261656C20656E636F6E74726F75206F20636F72706F2064652073657520636F6D70616E686569726F2064696C6163657261646F2E0D0A456C6520696D706C6F726F7520616F732064657573657320C3A96C6669636F7320717565206465766F6C76657373656D205369662C206D61732064697A69616D20717565206973736F2065726120636F6E7472612061206C6569206461206E61747572657A612E0D0A4E6F2064657365737065726F2C205261656C207365207472616E636F75207061726120656E636F6E7472617220756D6120736F6C75C3A7C3A36F2065206C6575206F73206C6976726F73206465206E6563726F6D616E6369612C206E61206573706572616EC3A7612064652072657665722073657520C3BA6E69636F20616D69676F2E20506F72C3A96D2C207175616E746F206D61697320617072656E6469612C206D6169732070657263656269613A2061206D6F727465206EC3A36F20657261206170656E617320756D612062617272656972612C206D617320756D2063616D696E686F20706172612061206F62656469C3AA6E636961206520657465726E69646164652E0D0A4D7564616E646F20736575206E6F6D652070617261205A61726F746869656C20287A61722F7A61726168202D206C757A206361C3AD6461202F206F7468203D206D61726361202F2069656C203D20446976696E6F29202020202041204D6172636120646F2044657573204361C3AD646F,'dd','Livana\r\nZief','tem não, grazaDeus','cc','ee'),
 (2,2,NULL,NULL,NULL,NULL,NULL,NULL),
 (3,3,NULL,NULL,NULL,NULL,NULL,NULL),
 (4,4,'','','','','','');
/*!40000 ALTER TABLE `texto` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
