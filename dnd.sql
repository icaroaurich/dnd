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
 (1,'1','aparencia/1.png',0,0,0,136,0,'Espada Longa','','1d8','Cortante','','','','','','','','','Mestre em 65535 formas de meter porrada!'),
 (2,'2',NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (3,'3',NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (4,'4','',0,0,0,25,0,'','','','','','','','','','','','',NULL);
/*!40000 ALTER TABLE `bag` ENABLE KEYS */;


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
  `tendenciaEtica` varchar(45) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ficha`
--

/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
INSERT INTO `ficha` (`id`,`nomePersonagem`,`classe`,`nivel`,`antecedente`,`nomeJogador`,`raca`,`tendenciaEtica`,`tendenciaMoral`,`exp`,`forca`,`destreza`,`constituicao`,`inteligencia`,`sabedoria`,`carisma`,`resForca`,`resDestreza`,`resConstituicao`,`resInteligencia`,`resSabedoria`,`resCarisma`,`acrobacia`,`arcanismo`,`atletismo`,`atuacao`,`blefar`,`furtividade`,`historia`,`intimidacao`,`intuicao`,`investigacao`,`lidarAnimais`,`medicina`,`natureza`,`percepcao`,`persuacao`,`prestigitacao`,`religiao`,`sobrevivencia`,`bonusProeficiencia`,`vidaTotal`,`classeArmadura`,`iniciativa`,`deslocamento`,`vidaAtual`,`proeAcrobacia`,`proeArcanismo`,`proeAtletismo`,`proeAtuacao`,`proeBlefar`,`proeFurtividade`,`proeHistoria`,`proeIntimidacao`,`proeIntuicao`,`proeInvestigacao`,`proeLidarAnimais`,`proeMedicina`,`proeNatureza`,`proePercepcao`,`proePrestigitacao`,`proeReligiao`,`proeSobrevivencia`,`proePersuacao`,`idade`,`altura`,`peso`,`olhos`,`pele`,`cabelos`,`proeForca`,`proeDestreza`,`proeConstituicao`,`proeInteligencia`,`proeSabedoria`,`proeCarisma`) VALUES 
 (1,'Zarothiel','Mago',3,'Sabio','Icaro','Alto elfo','Neutro','Leal',0,10,10,15,17,13,8,0,0,2,3,1,-1,0,3,0,-1,-1,0,3,-1,1,3,1,1,3,1,-1,0,3,1,2,17,11,0,9,17,0,1,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0,0,20,'1,80','10kg','Castanhos','Branca','Prateados',0,0,0,0,0,0),
 (3,'Cleition Rasta','5',1,'acólito','joão','anão',NULL,NULL,0,12,15,13,8,10,18,1,2,1,-1,0,4,2,-1,1,4,4,2,-1,4,0,-1,0,0,-1,0,4,2,-1,0,3,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'0',NULL,NULL,NULL,0,0,0,0,0,0),
 (4,'Zief','MAGO',2,'Sábio','Daniel','Humano',NULL,NULL,0,12,13,14,18,14,18,1,1,2,4,2,4,1,4,1,4,4,1,4,4,2,4,2,2,4,2,4,1,4,2,2,0,0,0,0,0,0,1,0,0,0,0,1,0,0,1,0,1,0,0,0,0,0,0,24,'1,83','83','Castanhos E.','Branco','Preto',0,0,0,0,0,0);
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
