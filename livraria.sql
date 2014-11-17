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
CREATE DATABASE IF NOT EXISTS `livraria` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `livraria`;


-- Copiando estrutura para tabela livraria.Aluga
CREATE TABLE IF NOT EXISTS `Aluga` (
  `idAluga` int(11) NOT NULL,
  `DataAluguel` date NOT NULL,
  `ValorAluguel` decimal(4,2) NOT NULL,
  `ValorMulta` decimal(4,2) DEFAULT NULL,
  `DataDevolucao` date NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  PRIMARY KEY (`idAluga`),
  KEY `fk_Aluga_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Aluga_Livro1_idx` (`Livro_idLivro`),
  CONSTRAINT `fk_Aluga_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluga_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `Livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Aluga: ~0 rows (aproximadamente)
DELETE FROM `Aluga`;
/*!40000 ALTER TABLE `Aluga` DISABLE KEYS */;
/*!40000 ALTER TABLE `Aluga` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.categoria
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
CREATE TABLE IF NOT EXISTS `Cliente` (
  `idCliente` int(11) NOT NULL,
  `EnderecoCli` varchar(45) NOT NULL,
  `TelefoneCli` varchar(45) NOT NULL,
  `EmailCli` varchar(45) NOT NULL,
  `HomePageCli` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Cliente: ~0 rows (aproximadamente)
DELETE FROM `Cliente`;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.Compra
CREATE TABLE IF NOT EXISTS `Compra` (
  `idCompra` int(11) NOT NULL,
  `DataCompra` varchar(45) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  `Quantidade` varchar(45) NOT NULL,
  `ValordaCompra` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_Compra_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Compra_Livro1_idx` (`Livro_idLivro`),
  CONSTRAINT `fk_Compra_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `Livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Compra: ~0 rows (aproximadamente)
DELETE FROM `Compra`;
/*!40000 ALTER TABLE `Compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `Compra` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.Livro
CREATE TABLE IF NOT EXISTS `Livro` (
  `idLivro` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Autor` varchar(45) NOT NULL,
  `AnoPublicacao` int(11) NOT NULL,
  `PrecoVenda` decimal(4,2) NOT NULL,
  `PrecoAluguel` decimal(4,2) NOT NULL,
  `PrecoReserva` decimal(4,2) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  PRIMARY KEY (`idLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.Livro: ~16 rows (aproximadamente)
DELETE FROM `Livro`;
/*!40000 ALTER TABLE `Livro` DISABLE KEYS */;
INSERT INTO `Livro` (`idLivro`, `Nome`, `Autor`, `AnoPublicacao`, `PrecoVenda`, `PrecoAluguel`, `PrecoReserva`, `descricao`, `Quantidade`) VALUES
	(1, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(2, 'Padroes de projeto 3', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(3, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(4, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(5, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(6, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(7, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(8, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(9, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(10, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(11, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(12, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(13, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(14, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(15, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9),
	(16, 'Padroes de projeto', 'joao', 2013, 99.00, 10.00, 10.00, 'padores', 9);
/*!40000 ALTER TABLE `Livro` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.PessoaFisica
CREATE TABLE IF NOT EXISTS `PessoaFisica` (
  `Nome` int(11) NOT NULL,
  `CPF` varchar(45) NOT NULL,
  `RG` varchar(45) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`Cliente_idCliente`),
  CONSTRAINT `fk_PessoaFisica_Cliente` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.PessoaFisica: ~0 rows (aproximadamente)
DELETE FROM `PessoaFisica`;
/*!40000 ALTER TABLE `PessoaFisica` DISABLE KEYS */;
/*!40000 ALTER TABLE `PessoaFisica` ENABLE KEYS */;


-- Copiando estrutura para tabela livraria.PessoJurídica
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
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `tipo_user` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela livraria.usuario: ~1 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `tipo_user`) VALUES
	(1, 'MÃ¡rcio Vennan', 'marciovennan@gmail.com', '$2y$10$9roeRNISWyBG3zBTBW3k4OB3V2Ddi7axxlvqPL5h4uq/ODpjrSDR2', 'admin');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
