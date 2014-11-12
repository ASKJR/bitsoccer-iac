CREATE DATABASE  IF NOT EXISTS `iac` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `iac`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: iac
-- ------------------------------------------------------
-- Server version	5.5.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comprador`
--

DROP TABLE IF EXISTS `comprador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprador` (
  `idComprador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  PRIMARY KEY (`idComprador`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprador`
--

LOCK TABLES `comprador` WRITE;
/*!40000 ALTER TABLE `comprador` DISABLE KEYS */;
INSERT INTO `comprador` (`idComprador`, `nome`, `cpf`, `rg`, `nascimento`) VALUES (1,'Alberto Sussumu Kato Junior','086.135.959-36','13.336.928-7','1993-04-28'),(2,'Maria da Silva','313.123.213-21','13212313213','1985-01-01'),(3,'Jose','342.423.423-42','2313213','2014-11-08'),(4,'Fernanda','676.767.766-76','678868','2014-11-15'),(5,'sueli','231.321.312-32','32424','2014-11-08'),(6,'Josue','323.132.131-23','312313','2014-11-08'),(7,'galvao','13.123.131-31','2313213','2014-11-27'),(8,'madalena','213.123.131-31','13213','2014-11-15'),(9,'machadoAssis','233.123.133-12','3123','2014-11-08'),(10,'neves','231.321.313-13','31231232131','2014-11-13'),(12,'Giovannaaa','894.742.389-42','31312313','2014-11-23');
/*!40000 ALTER TABLE `comprador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprador_jogo`
--

DROP TABLE IF EXISTS `comprador_jogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprador_jogo` (
  `idCompradorJogo` int(11) NOT NULL AUTO_INCREMENT,
  `idComprador` int(11) NOT NULL,
  `idJogo` int(11) NOT NULL,
  PRIMARY KEY (`idCompradorJogo`),
  KEY `idComprador_idx` (`idComprador`),
  KEY `idJogo_idx` (`idJogo`),
  CONSTRAINT `FK_COMPRADOR_COMPRADOR_JOGO` FOREIGN KEY (`idComprador`) REFERENCES `comprador` (`idComprador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_JOGO_COMPRADOR_JOGO` FOREIGN KEY (`idJogo`) REFERENCES `jogo` (`idJogo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprador_jogo`
--

LOCK TABLES `comprador_jogo` WRITE;
/*!40000 ALTER TABLE `comprador_jogo` DISABLE KEYS */;
INSERT INTO `comprador_jogo` (`idCompradorJogo`, `idComprador`, `idJogo`) VALUES (1,2,4),(4,2,3),(5,2,2),(7,1,3),(9,1,1),(10,1,2),(11,3,2),(15,5,2),(21,9,2),(22,8,2),(23,10,2),(24,8,3),(25,4,5),(28,6,5),(29,6,4),(30,6,3),(38,12,3),(39,12,4);
/*!40000 ALTER TABLE `comprador_jogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `idComprador` int(11) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `numero` int(11) NOT NULL,
  KEY `idComprador_idx` (`idComprador`),
  CONSTRAINT `FK_COMPRADOR_ENDERECO` FOREIGN KEY (`idComprador`) REFERENCES `comprador` (`idComprador`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`idComprador`, `cep`, `logradouro`, `bairro`, `cidade`, `estado`, `numero`) VALUES (1,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',890),(2,'40080-004','Avenida Sete de Setembro','Vitória','Salvador','BA',789),(3,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',677),(4,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',21313),(5,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',12345),(6,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',234),(7,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',23),(8,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',1313),(9,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',22132),(10,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',2131),(12,'82810-464','Rua Rosi Lopes Collere','Capão da Imbuia','Curitiba','PR',666);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogo`
--

DROP TABLE IF EXISTS `jogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogo` (
  `idJogo` int(11) NOT NULL AUTO_INCREMENT,
  `idTime1` int(11) NOT NULL,
  `idTime2` int(11) NOT NULL,
  `local` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `maxIngresso` int(11) NOT NULL,
  `is_sorteado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idJogo`,`idTime1`,`idTime2`),
  KEY `idTime1_idx` (`idTime1`),
  KEY `idTime2_idx` (`idTime2`),
  CONSTRAINT `idTime1` FOREIGN KEY (`idTime1`) REFERENCES `time` (`idTime`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idTime2` FOREIGN KEY (`idTime2`) REFERENCES `time` (`idTime`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogo`
--

LOCK TABLES `jogo` WRITE;
/*!40000 ALTER TABLE `jogo` DISABLE KEYS */;
INSERT INTO `jogo` (`idJogo`, `idTime1`, `idTime2`, `local`, `data`, `horario`, `maxIngresso`, `is_sorteado`) VALUES (1,1,7,'Rio de Janeiro','2014-10-27','19:00:00',20000,1),(2,1,10,'Rio de Janeiro','2014-10-30','01:00:00',9999,1),(3,1,5,'Rio de Janeiro','2014-10-30','03:02:00',8786,0),(4,6,2,'Rio de Janeiro','2014-10-30','09:09:00',778,0),(5,4,3,'Curitiba','2014-10-30','13:45:00',8977,1);
/*!40000 ALTER TABLE `jogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sorteio`
--

DROP TABLE IF EXISTS `sorteio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sorteio` (
  `idSorteio` int(11) NOT NULL AUTO_INCREMENT,
  `idJogo` int(11) NOT NULL,
  `idComprador` int(11) NOT NULL,
  PRIMARY KEY (`idSorteio`),
  UNIQUE KEY `idComprador_UNIQUE` (`idComprador`),
  KEY `FK_JOGO_SORTEIO_idx` (`idJogo`),
  CONSTRAINT `FK_COMPRADOR_SORTEIO` FOREIGN KEY (`idComprador`) REFERENCES `comprador` (`idComprador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_JOGO_SORTEIO` FOREIGN KEY (`idJogo`) REFERENCES `jogo` (`idJogo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sorteio`
--

LOCK TABLES `sorteio` WRITE;
/*!40000 ALTER TABLE `sorteio` DISABLE KEYS */;
INSERT INTO `sorteio` (`idSorteio`, `idJogo`, `idComprador`) VALUES (2,2,2),(3,2,3),(5,2,8),(33,1,1),(36,5,6),(37,5,4);
/*!40000 ALTER TABLE `sorteio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time` (
  `idTime` int(11) NOT NULL,
  `selecao` varchar(255) NOT NULL,
  `bandeira` varchar(255) NOT NULL,
  PRIMARY KEY (`idTime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time`
--

LOCK TABLES `time` WRITE;
/*!40000 ALTER TABLE `time` DISABLE KEYS */;
INSERT INTO `time` (`idTime`, `selecao`, `bandeira`) VALUES (1,'Brasil','../bandeiras/brasil.png'),(2,'Japão','../bandeiras/japao.png'),(3,'França','../bandeiras/franca.png'),(4,'Itália','../bandeiras/italia.png'),(5,'Estados Unidos da América','../bandeiras/estados_unidos_da_america.png'),(6,'Alemanha','../bandeiras/alemanha.png'),(7,'Argentina','../bandeiras/argentina.png'),(8,'Portugal','../bandeiras/portugal.png'),(9,'Africa do Sul','../bandeiras/africa_do_sul.png'),(10,'Chile','../bandeiras/chile.png');
/*!40000 ALTER TABLE `time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idComprador` int(11) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idComprador_idx` (`idComprador`),
  CONSTRAINT `FK_COMPRADOR_USUARIO` FOREIGN KEY (`idComprador`) REFERENCES `comprador` (`idComprador`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`, `idComprador`, `login`, `senha`) VALUES (2,NULL,'albertokatojr@gmail.com','e10adc3949ba59abbe56e057f20f883e'),(3,1,'kato_askjr@hotmail.com','e10adc3949ba59abbe56e057f20f883e'),(4,2,'maria@hotmail.com','e10adc3949ba59abbe56e057f20f883e'),(5,3,'jose@hotmail.com','e10adc3949ba59abbe56e057f20f883e'),(6,4,'fernanda@hotmail.com','e10adc3949ba59abbe56e057f20f883e'),(7,5,'sueli@hotmail.com','e10adc3949ba59abbe56e057f20f883e'),(8,6,'josue@gmail.com','e10adc3949ba59abbe56e057f20f883e'),(9,7,'galvao@gmail.com','e10adc3949ba59abbe56e057f20f883e'),(10,8,'madalena@gmail.com','e10adc3949ba59abbe56e057f20f883e'),(11,9,'assia@machado.com','e10adc3949ba59abbe56e057f20f883e'),(12,10,'neves@ufpr.br','e10adc3949ba59abbe56e057f20f883e'),(14,12,'giovanna@italia.com','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'iac'
--

--
-- Dumping routines for database 'iac'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-12 16:20:53
