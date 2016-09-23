-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: livraria
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

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
-- Current Database: `livraria`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `livraria_teste` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `livraria_teste`;

--
-- Table structure for table `Aluga`
--

DROP TABLE IF EXISTS `Aluga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aluga` (
  `idAluga` int(11) NOT NULL AUTO_INCREMENT,
  `DataAluguel` date NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `ValorAluguel` decimal(15,2) NOT NULL,
  `ValorMulta` decimal(15,2) DEFAULT NULL,
  `DataPrevistaEntrega` date DEFAULT NULL,
  `DataDevolucao` date DEFAULT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  PRIMARY KEY (`idAluga`),
  KEY `fk_Aluga_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Aluga_Livro1_idx` (`Livro_idLivro`),
  KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `fk_Aluga_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluga_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aluga`
--

LOCK TABLES `Aluga` WRITE;
/*!40000 ALTER TABLE `Aluga` DISABLE KEYS */;
INSERT INTO `Aluga` VALUES (1,'2014-11-21',17,10.00,618.00,'2016-10-06','2016-08-07',12,5);
/*!40000 ALTER TABLE `Aluga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT '0',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'InformÃ¡tica'),(2,'Direito'),(3,'Engenharia');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `EnderecoCli` varchar(45) NOT NULL,
  `TelefoneCli` varchar(45) NOT NULL,
  `EmailCli` varchar(45) NOT NULL,
  `HomePageCli` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (10,'Av. C','9888457167','marciovennan@gmail.com',NULL),(11,'Av. C','9888457167','marciovennan@gmail.com',NULL),(12,'Av. C','9888457167','marcio@gmail.com',NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `DataCompra` datetime NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `ValordaCompra` decimal(15,2) NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_Compra_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Compra_Livro1_idx` (`Livro_idLivro`),
  KEY `FK_Compra_pedidos` (`pedido_id`),
  CONSTRAINT `FK_Compra_pedidos` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`idPedido`),
  CONSTRAINT `fk_Compra_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,'2014-11-21 18:07:14',17,12,2,1,99.00),(2,'2016-09-07 12:59:21',21,10,17,1,130.00);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `idLivro` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Autor` varchar(45) NOT NULL,
  `AnoPublicacao` int(11) NOT NULL,
  `PrecoVenda` decimal(15,2) NOT NULL,
  `PrecoAluguel` decimal(15,2) NOT NULL,
  `PrecoReserva` decimal(15,2) NOT NULL DEFAULT '0.00',
  `descricao` varchar(100) NOT NULL,
  `Quant_venda` int(11) NOT NULL,
  `Quant_aluguel` int(11) unsigned NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagem` varchar(100) NOT NULL,
  `Rest_venda` int(11) NOT NULL,
  `Rest_aluguel` int(11) NOT NULL,
  PRIMARY KEY (`idLivro`),
  KEY `FK1_categoria` (`categoria_id`),
  CONSTRAINT `FK1_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (1,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(2,'Padroes de projeto 3','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(3,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(4,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(5,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(6,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(7,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(8,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(9,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(10,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(11,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(12,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(13,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(14,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(15,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(16,'Padroes de projeto','joao',2013,99.00,10.00,10.00,'padores',9,0,NULL,'',0,0),(17,'IntegraÃ§Ã£o contÃ­nua','Hambly e Farley',2014,130.00,10.00,0.00,'Aprenda a desenvolver aplicaÃ§Ã£o de alta qualidade',12,2,1,'engenharia_de_software.jpg',12,2);
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (17,0),(21,0),(29,0),(33,0),(34,0),(35,0);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoafisica`
--

DROP TABLE IF EXISTS `pessoafisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoafisica` (
  `Nome` int(11) NOT NULL,
  `CPF` varchar(45) NOT NULL,
  `RG` varchar(45) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`Cliente_idCliente`),
  CONSTRAINT `fk_PessoaFisica_Cliente` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoafisica`
--

LOCK TABLES `pessoafisica` WRITE;
/*!40000 ALTER TABLE `pessoafisica` DISABLE KEYS */;
INSERT INTO `pessoafisica` VALUES (0,'04186823308','2141412008','1990-12-07',10),(0,'04186823308','2141412008','1990-12-07',11),(0,'04186823308','2141412008','1990-12-07',12);
/*!40000 ALTER TABLE `pessoafisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoajuridica`
--

DROP TABLE IF EXISTS `pessoajuridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoajuridica` (
  `CNPJ` int(11) NOT NULL,
  `RazaoSocial` varchar(45) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`CNPJ`,`Cliente_idCliente`),
  KEY `fk_PessoJurídica_Cliente1_idx` (`Cliente_idCliente`),
  CONSTRAINT `fk_PessoJurídica_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoajuridica`
--

LOCK TABLES `pessoajuridica` WRITE;
/*!40000 ALTER TABLE `pessoajuridica` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoajuridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `DataReserva` varchar(45) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `fk_Reserva_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Reserva_Livro1_idx` (`Livro_idLivro`),
  CONSTRAINT `fk_Reserva_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `senha` varchar(250) NOT NULL,
  `tipo_user` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'Galeno','marciovennan@gmail.com','$2y$10$.K.j6W.7iMr4VzexGUq33ur2zwOlVJl1hsgws6HIMyNeW/jXqOtDS','admin'),(4,'MÃ¡rcio Vennan','marcio@gmail.com','$2y$10$/tOKUMLxfRapxVc1qDpPPexVgJ1cuPSpQAdt7ffLmEFIzURIbrfYq','cliente');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-22 21:19:13
