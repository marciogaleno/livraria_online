-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.37-0ubuntu0.13.10.1 - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para livraria
DROP DATABASE IF EXISTS `livraria`;
CREATE DATABASE IF NOT EXISTS `livraria` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `livraria`;


-- Copiando estrutura para tabela livraria.Aluga
DROP TABLE IF EXISTS `Aluga`;
CREATE TABLE IF NOT EXISTS `Aluga` (
  `idAluga` int(11) NOT NULL AUTO_INCREMENT,
  `DataAluguel` date NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `ValorAluguel` decimal(4,2) NOT NULL,
  `ValorMulta` decimal(4,2) DEFAULT NULL,
  `DataDevolucao` date NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  PRIMARY KEY (`idAluga`),
  KEY `fk_Aluga_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Aluga_Livro1_idx` (`Livro_idLivro`),
  KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `fk_Aluga_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluga_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `Livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Aluga: ~1 rows (aproximadamente)
DELETE FROM `Aluga`;
/*!40000 ALTER TABLE `Aluga` DISABLE KEYS */;
INSERT INTO `Aluga` (`idAluga`, `DataAluguel`, `pedido_id`, `ValorAluguel`, `ValorMulta`, `DataDevolucao`, `Cliente_idCliente`, `Livro_idLivro`) VALUES
	(1, '2014-11-21', 17, 10.00, 2.00, '2014-12-04', 12, 5);
/*!40000 ALTER TABLE `Aluga` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.categoria
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT '0',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.categoria: ~3 rows (aproximadamente)
DELETE FROM `categoria`;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`idCategoria`, `nome`) VALUES
	(1, 'InformÃ¡tica'),
	(2, 'Direito'),
	(3, 'Engenharia');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.Cliente
DROP TABLE IF EXISTS `Cliente`;
CREATE TABLE IF NOT EXISTS `Cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `EnderecoCli` varchar(45) NOT NULL,
  `TelefoneCli` varchar(45) NOT NULL,
  `EmailCli` varchar(45) NOT NULL,
  `HomePageCli` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Cliente: ~3 rows (aproximadamente)
DELETE FROM `Cliente`;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
INSERT INTO `Cliente` (`idCliente`, `EnderecoCli`, `TelefoneCli`, `EmailCli`, `HomePageCli`) VALUES
	(10, 'Av. C', '9888457167', 'marciovennan@gmail.com', NULL),
	(11, 'Av. C', '9888457167', 'marciovennan@gmail.com', NULL),
	(12, 'Av. C', '9888457167', 'marcio@gmail.com', NULL);
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.Compra
DROP TABLE IF EXISTS `Compra`;
CREATE TABLE IF NOT EXISTS `Compra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `DataCompra` datetime NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `ValordaCompra` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_Compra_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Compra_Livro1_idx` (`Livro_idLivro`),
  KEY `FK_Compra_pedidos` (`pedido_id`),
  CONSTRAINT `fk_Compra_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `Livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Compra_pedidos` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Compra: ~1 rows (aproximadamente)
DELETE FROM `Compra`;
/*!40000 ALTER TABLE `Compra` DISABLE KEYS */;
INSERT INTO `Compra` (`idCompra`, `DataCompra`, `pedido_id`, `Cliente_idCliente`, `Livro_idLivro`, `Quantidade`, `ValordaCompra`) VALUES
	(1, '2014-11-21 18:07:14', 17, 12, 2, 1, 99.00);
/*!40000 ALTER TABLE `Compra` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.Livro
DROP TABLE IF EXISTS `Livro`;
CREATE TABLE IF NOT EXISTS `Livro` (
  `idLivro` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Autor` varchar(45) NOT NULL,
  `AnoPublicacao` int(11) NOT NULL,
  `PrecoVenda` decimal(4,2) NOT NULL,
  `PrecoAluguel` decimal(4,2) NOT NULL,
  `PrecoReserva` decimal(4,2) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `Quant_venda` int(11) NOT NULL,
  `Quant_aluguel` int(11) NOT NULL,
  PRIMARY KEY (`idLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Livro: ~16 rows (aproximadamente)
DELETE FROM `Livro`;
/*!40000 ALTER TABLE `Livro` DISABLE KEYS */;
INSERT INTO `Livro` (`idLivro`, `Nome`, `Autor`, `AnoPublicacao`, `PrecoVenda`, `PrecoAluguel`, `PrecoReserva`, `descricao`, `Quant_venda`, `Quant_aluguel`) VALUES
	(1, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(2, 'Padroes de projeto 3', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(3, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(4, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(5, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(6, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(7, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(8, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(9, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(10, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(11, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(12, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(13, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(14, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(15, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0),
	(16, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9, 0);
/*!40000 ALTER TABLE `Livro` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.pedidos
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.pedidos: ~1 rows (aproximadamente)
DELETE FROM `pedidos`;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`idPedido`, `valor_total`) VALUES
	(17, 0);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.PessoaFisica
DROP TABLE IF EXISTS `PessoaFisica`;
CREATE TABLE IF NOT EXISTS `PessoaFisica` (
  `Nome` int(11) NOT NULL,
  `CPF` varchar(45) NOT NULL,
  `RG` varchar(45) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`Cliente_idCliente`),
  CONSTRAINT `fk_PessoaFisica_Cliente` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.PessoaFisica: ~3 rows (aproximadamente)
DELETE FROM `PessoaFisica`;
/*!40000 ALTER TABLE `PessoaFisica` DISABLE KEYS */;
INSERT INTO `PessoaFisica` (`Nome`, `CPF`, `RG`, `DataNascimento`, `Cliente_idCliente`) VALUES
	(0, '04186823308', '2141412008', '1990-12-07', 10),
	(0, '04186823308', '2141412008', '1990-12-07', 11),
	(0, '04186823308', '2141412008', '1990-12-07', 12);
/*!40000 ALTER TABLE `PessoaFisica` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.PessoJurídica
DROP TABLE IF EXISTS `PessoJurídica`;
CREATE TABLE IF NOT EXISTS `PessoJurídica` (
  `CNPJ` int(11) NOT NULL,
  `RazaoSocial` varchar(45) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`CNPJ`,`Cliente_idCliente`),
  KEY `fk_PessoJurídica_Cliente1_idx` (`Cliente_idCliente`),
  CONSTRAINT `fk_PessoJurídica_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.PessoJurídica: ~0 rows (aproximadamente)
DELETE FROM `PessoJurídica`;
/*!40000 ALTER TABLE `PessoJurídica` DISABLE KEYS */;
/*!40000 ALTER TABLE `PessoJurídica` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.Reserva
DROP TABLE IF EXISTS `Reserva`;
CREATE TABLE IF NOT EXISTS `Reserva` (
  `idReserva` int(11) NOT NULL,
  `DataReserva` varchar(45) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `fk_Reserva_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Reserva_Livro1_idx` (`Livro_idLivro`),
  CONSTRAINT `fk_Reserva_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `Livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Reserva: ~0 rows (aproximadamente)
DELETE FROM `Reserva`;
/*!40000 ALTER TABLE `Reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `Reserva` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `senha` varchar(250) NOT NULL,
  `tipo_user` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `tipo_user`) VALUES
	(2, 'Galeno', 'marciovennan@gmail.com', '$2y$10$.K.j6W.7iMr4VzexGUq33ur2zwOlVJl1hsgws6HIMyNeW/jXqOtDS', 'admin'),
	(4, 'MÃ¡rcio Vennan', 'marcio@gmail.com', '$2y$10$/tOKUMLxfRapxVc1qDpPPexVgJ1cuPSpQAdt7ffLmEFIzURIbrfYq', 'cliente');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
