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
  `tedenciaEtica` varchar(45) DEFAULT NULL,
  `tendenciaMoral` varchar(45) DEFAULT NULL,
  `exp` int(3) unsigned DEFAULT '0',
  `forca` int(2) unsigned DEFAULT '0',
  `destreza` int(2) unsigned DEFAULT '0',
  `constituicao` int(2) unsigned DEFAULT '0',
  `inteligencia` int(2) unsigned DEFAULT '0',
  `sabedoria` int(2) unsigned DEFAULT '0',
  `carisma` int(2) unsigned DEFAULT '0',
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
  `altura` varchar(10) DEFAULT NULL,
  `peso` varchar(10) DEFAULT '0',
  `olhos` varchar(10) DEFAULT NULL,
  `pele` varchar(10) DEFAULT NULL,
  `cabelos` varchar(10) DEFAULT NULL,
  `proeForca` tinyint(1) unsigned DEFAULT '0',
  `proeDestreza` tinyint(1) unsigned DEFAULT '0',
  `proeConstituicao` tinyint(1) unsigned DEFAULT '0',
  `proeInteligencia` tinyint(1) unsigned DEFAULT '0',
  `proeSabedoria` tinyint(1) unsigned DEFAULT '0',
  `proeCarisma` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ficha`
--

/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
INSERT INTO `ficha` (`id`,`nomePersonagem`,`classe`,`nivel`,`antecedente`,`nomeJogador`,`raca`,`tedenciaEtica`,`tendenciaMoral`,`exp`,`forca`,`destreza`,`constituicao`,`inteligencia`,`sabedoria`,`carisma`,`resForca`,`resDestreza`,`resConstituicao`,`resInteligencia`,`resSabedoria`,`resCarisma`,`acrobacia`,`arcanismo`,`atletismo`,`atuacao`,`blefar`,`furtividade`,`historia`,`intimidacao`,`intuicao`,`investigacao`,`lidarAnimais`,`medicina`,`natureza`,`percepcao`,`persuacao`,`prestigitacao`,`religiao`,`sobrevivencia`,`bonusProeficiencia`,`vidaTotal`,`classeArmadura`,`iniciativa`,`deslocamento`,`vidaAtual`,`proeAcrobacia`,`proeArcanismo`,`proeAtletismo`,`proeAtuacao`,`proeBlefar`,`proeFurtividade`,`proeHistoria`,`proeIntimidacao`,`proeIntuicao`,`proeInvestigacao`,`proeLidarAnimais`,`proeMedicina`,`proeNatureza`,`proePercepcao`,`proePrestigitacao`,`proeReligiao`,`proeSobrevivencia`,`proePersuacao`,`idade`,`altura`,`peso`,`olhos`,`pele`,`cabelos`,`proeForca`,`proeDestreza`,`proeConstituicao`,`proeInteligencia`,`proeSabedoria`,`proeCarisma`) VALUES 
 (1,'Zarothel','Mago',3,'Sabio','Icaro','Alto elfo','Neutro','Leal',0,10,10,15,17,13,8,0,0,2,3,1,-1,0,3,0,-1,-1,0,3,-1,1,3,1,1,3,1,-1,0,3,1,2,17,11,0,9,17,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,20,'1,80','10kg','Castanhos','Branca','Prateados',0,0,0,0,0,0),
 (3,'Cleition Rasta','5',1,'acólito','joão','anão',NULL,NULL,0,12,15,13,8,10,18,1,2,1,-1,0,4,2,-1,1,4,4,2,-1,4,0,-1,0,0,-1,0,4,2,-1,0,3,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'0',NULL,NULL,NULL,0,0,0,0,0,0),
 (4,'Zief','MAGO',2,'Sábio','Daniel','Humano',NULL,NULL,0,12,14,15,18,15,18,1,2,2,4,2,4,2,4,1,4,4,2,4,4,2,4,2,2,4,2,4,2,4,2,2,0,0,0,0,0,0,1,0,0,0,0,1,0,0,1,0,1,0,0,0,0,0,0,0,NULL,'0',NULL,NULL,NULL,0,0,0,0,0,0);
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;


--
-- Definition of table `magias`
--

DROP TABLE IF EXISTS `magias`;
CREATE TABLE `magias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `selecionar` tinyint(1) unsigned DEFAULT '0',
  `excluir` tinyint(1) unsigned DEFAULT '0',
  `nome` varchar(45) DEFAULT NULL,
  `escola` varchar(45) DEFAULT NULL,
  `tempo` varchar(45) DEFAULT NULL,
  `alcance` varchar(45) DEFAULT NULL,
  `componente_v` tinyint(1) unsigned DEFAULT '0',
  `componente_s` tinyint(1) unsigned DEFAULT '0',
  `componente_m` varchar(45) DEFAULT NULL,
  `duracao` varchar(10) DEFAULT NULL,
  `efeito` varchar(255) DEFAULT NULL,
  `lv1` varchar(5) DEFAULT '-',
  `lv5` varchar(5) DEFAULT '-',
  `lv11` varchar(5) DEFAULT '-',
  `lv17` varchar(5) DEFAULT '-',
  `nivelMagia` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magias`
--

/*!40000 ALTER TABLE `magias` DISABLE KEYS */;
INSERT INTO `magias` (`id`,`selecionar`,`excluir`,`nome`,`escola`,`tempo`,`alcance`,`componente_v`,`componente_s`,`componente_m`,`duracao`,`efeito`,`lv1`,`lv5`,`lv11`,`lv17`,`nivelMagia`) VALUES 
 (1,0,0,'Amizade','Encantamento','1 ação','Pessoal',0,0,'Maquiagem no rosto','1h','Vantagem em testes de Carisma contra 1 criatura não hostil. Ao terminar, ela sabe que foi enfeitiçada','-','-','-','-',0);
/*!40000 ALTER TABLE `magias` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
