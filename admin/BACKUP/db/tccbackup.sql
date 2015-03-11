-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2012 at 09:08 PM
-- Server version: 5.5.19
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome`) VALUES
(1, 'Camisa'),
(2, 'Prancha'),
(3, 'Jaqueta'),
(4, 'Moleton'),
(5, 'Calça'),
(6, 'Sunga'),
(7, 'Bermuda'),
(8, 'Tenis'),
(9, 'Sapato'),
(10, 'Chinelo');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(80) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `receberemail` tinyint(1) DEFAULT NULL,
  `recebersms` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `sobrenome`, `data_nasc`, `rg`, `cpf`, `sexo`, `receberemail`, `recebersms`) VALUES
(1, 'Vinicius', 'Ferraz', '2011-05-11', '234', '23423434234', 'm', 1, 1),
(2, 'hjkjbkj', NULL, '1988-06-06', '675765', '765765', 'm', NULL, NULL),
(5, '99898', NULL, '1990-09-09', '90898', '98098', 'm', NULL, NULL),
(7, 'sdfsd', NULL, '1988-08-08', '8897', '789789', 'm', NULL, NULL),
(10, 'nome', 'sobrenome', '2000-02-02', 'rg', 'cpf', 'm', NULL, NULL),
(11, '77777', '7777', '7777-07-07', '7777', '7777', 'm', NULL, NULL),
(17, 'Vinicius', 'Ferraz', '1986-03-02', '235333335', '36757157870', 'M', 1, 1),
(18, '3333333', '33333333333', NULL, '333333333333', '33333333333', 'F', 1, 1),
(19, 'aaaa', 'bbbb', NULL, '111111111111', '22222222222', 'M', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clientecontatos`
--

CREATE TABLE IF NOT EXISTS `clientecontatos` (
  `id_contato` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_contato`,`id_cliente`),
  KEY `fk_ClienteContatos_Cliente1` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientecontatos`
--

INSERT INTO `clientecontatos` (`id_contato`, `id_cliente`) VALUES
(1, 1),
(2, 1),
(3, 1),
(15, 1),
(9, 17),
(10, 17),
(11, 18),
(12, 18),
(13, 19),
(14, 19);

-- --------------------------------------------------------

--
-- Table structure for table `clienteenderecos`
--

CREATE TABLE IF NOT EXISTS `clienteenderecos` (
  `id_cliente` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`,`id_endereco`),
  KEY `fk_ClienteEnderecos_Endereco1` (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienteenderecos`
--

INSERT INTO `clienteenderecos` (`id_cliente`, `id_endereco`) VALUES
(2, 3),
(17, 5),
(1, 11),
(19, 15),
(18, 18),
(18, 23),
(1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(11) NOT NULL,
  `id_operadora` int(11) NOT NULL,
  PRIMARY KEY (`id_contato`),
  KEY `fk_Contato_Operadora1` (`id_operadora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `contato`
--

INSERT INTO `contato` (`id_contato`, `numero`, `id_operadora`) VALUES
(1, '01535212066', 1),
(2, '01591189197', 2),
(3, '0158918919', 4),
(8, '01535212966', 1),
(9, '01535212066', 1),
(10, '01591181896', 2),
(11, '33333333333', 1),
(12, '33333333333', 2),
(13, '33333333333', 1),
(14, '44444444444', 2),
(15, '015911919', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cor`
--

CREATE TABLE IF NOT EXISTS `cor` (
  `id_cor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cor`
--

INSERT INTO `cor` (`id_cor`, `nome`) VALUES
(1, 'Preto'),
(2, 'Branc'),
(3, 'Cinza');

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(60) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` char(2) DEFAULT NULL,
  `cep` varchar(8) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `uf` (`uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `descricao`) VALUES
(3, '7777', '0', '7777', '77777', '7777', 'BA', '7777', 'Principal'),
(5, 'r prof', '156', 'casa', 'pq longa vida', 'itapeva', '1', '18404000', 'Principal'),
(8, 'rua alguma', '200', 'ap', 'são colombo', 'cidd', 'MG', '18400000', 'Casa'),
(9, 'end''', '12', '', 'bairro', 'cidade', '1', '10000', 'Casa'),
(10, 'e', '0', NULL, 'b', 'c', '2', '0', 'd'),
(11, 'rua professor João soares', '146', 'casa', 'pq longa vida', 'Itapeva', 'SP', '18404000', 'Principal'),
(12, 'ealdg', '0', NULL, 'b', 'c', 'SP', '33333', 'd'),
(15, '66666666666666', '666666', '6666666666666', 'bbbb', '666666666666666', 'SP', '66666665', 'Principal'),
(16, 'uyui', '11', 'uyuyu', 'bb', 'uyu', 'PR', '11111', NULL),
(17, 'rua alguma', 'kj', '', 'bairro', 'cidade', 'PE', '18888888', NULL),
(18, 'rua alguma', '125', '', 'são caetano do sul', 'ceará', 'PI', '11111111', NULL),
(22, 'endereço', '12', '', 'bairro', 'cidade', 'PE', '11111111', NULL),
(23, 'endereço', '12', '', 'bairro', 'cidade', 'PE', '11111111', NULL),
(24, 'rua alaumga', '123', '', 'centrp', 'itapeva', 'PE', '18404000', NULL),
(25, 'r alguma', '177', '', 'centro', 'itapeva', 'PE', '18404000', NULL),
(26, 'r alguma', '177', '', 'centro', 'itapeva', 'PE', '18404000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `formapagamento`
--

CREATE TABLE IF NOT EXISTS `formapagamento` (
  `id_forma_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `forma` varchar(45) NOT NULL,
  `parcelas` int(11) DEFAULT NULL,
  `juros` float DEFAULT NULL,
  PRIMARY KEY (`id_forma_pagamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `formapagamento`
--

INSERT INTO `formapagamento` (`id_forma_pagamento`, `forma`, `parcelas`, `juros`) VALUES
(1, 'Cartão de Crédito 5x Sem Juros', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fotosproduto`
--

CREATE TABLE IF NOT EXISTS `fotosproduto` (
  `id` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `Produto_cod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_FotosProduto_Produto1` (`Produto_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itensvenda`
--

CREATE TABLE IF NOT EXISTS `itensvenda` (
  `id_itens_venda` int(11) NOT NULL AUTO_INCREMENT,
  `id_venda` int(11) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `Produto_cod` int(11) NOT NULL,
  PRIMARY KEY (`id_itens_venda`,`id_venda`,`Produto_cod`),
  KEY `fk_ItensVenda_Venda1` (`id_venda`),
  KEY `fk_ItensVenda_Produto1` (`Produto_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `itensvenda`
--

INSERT INTO `itensvenda` (`id_itens_venda`, `id_venda`, `preco`, `quantidade`, `Produto_cod`) VALUES
(1, 1, 200, 10, 2),
(2, 1, 34, 10, 2),
(3, 2, 100, 10, 1),
(4, 1, 200.5, 10, 2),
(5, 1, 20.5, 1, 2),
(6, 2, 253, 3, 2),
(7, 8, 40, 2, 2),
(8, 8, 45, 2, 3),
(9, 9, 40, 1, 2),
(10, 9, 45, 1, 3),
(11, 10, 87, 1, 7),
(12, 10, 98, 1, 9),
(13, 10, 102, 1, 11),
(14, 10, 777, 1, 20),
(15, 10, 777, 1, 21),
(16, 11, 75.5, 1, 1),
(17, 11, 40, 1, 2),
(18, 11, 45, 1, 3),
(19, 12, 75.5, 1, 1),
(20, 12, 40, 1, 2),
(21, 12, 45, 1, 3),
(22, 12, 98, 1, 14),
(23, 13, 40, 2, 2),
(24, 13, 45, 1, 3),
(25, 13, 777, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_cliente` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `resposta` varchar(45) NOT NULL,
  `id_pergunta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_login_pergunta` (`id_pergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_cliente`, `email`, `senha`, `resposta`, `id_pergunta`) VALUES
(1, 'vmf', 'vmf', 'buda', 2),
(2, 'dfgfdgdf', 'dfsdf', 'dfgdgfdgdf', 3),
(5, 'jkjhjjk', 'khkjh', 'jkhjkhjkh', 5),
(7, 'klkkkljkkjkljkljkljkklklj', 'kljkjlj', 'kljkljkjkljkljljkljjkljljkljljklj', 4),
(17, 'vmf@algo.co', '1234', 'buda', 1),
(18, 'vmf@.', '1234', 'buda', 1),
(19, '123@.', '1234', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `desconto` float DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id_marca`, `nome`, `desconto`) VALUES
(1, 'Onbong', 0),
(2, 'MadSheep', 0),
(3, 'Marca', 0),
(4, 'Nike', 0),
(5, 'Olympikus', 0),
(6, 'Adidas', 0),
(7, 'Blue Steel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `operadora`
--

CREATE TABLE IF NOT EXISTS `operadora` (
  `id_operadora` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_operadora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `operadora`
--

INSERT INTO `operadora` (`id_operadora`, `nome`) VALUES
(1, 'fixo'),
(2, 'Claro'),
(3, 'Vivo'),
(4, 'Tim'),
(5, 'Oi'),
(6, 'Outra');

-- --------------------------------------------------------

--
-- Table structure for table `perguntasecreta`
--

CREATE TABLE IF NOT EXISTS `perguntasecreta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `perguntasecreta`
--

INSERT INTO `perguntasecreta` (`id`, `pergunta`) VALUES
(1, 'Melhor amigo de infância?'),
(2, 'Qual super-herói favorito?'),
(3, 'Primeira professora?'),
(4, 'Comida preferida?'),
(5, 'Filme/Livro preferido?');

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_cor` int(11) NOT NULL,
  `id_tamanho` int(11) NOT NULL,
  `estoque` int(11) DEFAULT NULL,
  `preco_compra` float DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `infantil` tinyint(1) DEFAULT NULL,
  `preco_venda` float DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_Produto_Marca` (`id_marca`),
  KEY `fk_Produto_ListaCategorias1` (`id_categoria`),
  KEY `fk_Produto_Cor1` (`id_cor`),
  KEY `fk_Produto_Tamanho1` (`id_tamanho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`cod`, `id_marca`, `id_categoria`, `id_cor`, `id_tamanho`, `estoque`, `preco_compra`, `genero`, `infantil`, `preco_venda`, `desconto`, `imagem`, `descricao`) VALUES
(1, 2, 1, 2, 1, 10, 50.5, 'm', 0, 75.5, NULL, 'calca3.jpg', 'coisa 1'),
(2, 1, 2, 2, 1, 10, 20, 'm', NULL, 40, NULL, 'calca2.jpg', NULL),
(3, 4, 3, 1, 2, 2, 23, 'm', NULL, 45, 0, 'chinelo.jpg', 'desc'),
(4, 1, 1, 2, 3, 2, 23, 'm', 0, 23, 0, 'coisa.jpg', 'asd'),
(5, 1, 2, 2, 3, 1, 23, 'M', 0, 12, 0, 'prancha3b.jpg', 'dsf'),
(6, 1, 1, 1, 1, 5, 27.4, 'M', 0, 40, 0, 'camisa1.jpg', 'bermuda vermelha'),
(7, 7, 9, 1, 1, 7, 78, 'M', 1, 87, 0, 'camisa2.jpg', 'llkkhn'),
(8, 1, 1, 1, 1, 9, 89, 'M', 1, 98, 0, 'camisa.jpg', 'lkj'),
(9, 1, 6, 1, 1, 6, 67, 'M', 1, 98, 0, 'moletom1.jpg', 'iuhu'),
(10, 1, 2, 1, 1, 7, 87, 'M', 1, 98, 0, 'moletom2.jpg', 'ojkl'),
(11, 4, 7, 1, 1, 7, 98, 'M', 1, 102, 0, 'fmoletom1.jpg', 'lkj'),
(12, 1, 1, 1, 1, 8, 90, 'M', 1, 99, 0, 'prancha1.jpg', 'lkjkl'),
(13, 1, 3, 1, 1, 7, 67, 'M', 1, 98, 0, 'prancha1a.jpg', 'lkj'),
(14, 3, 1, 1, 1, 7, 76, 'M', 1, 98, 0, 'prancha1b.jpg', 'uh'),
(15, 1, 1, 1, 1, 9, 9, 'M', 1, 21, 0, 'd1aeafbef418fa01d49a6818a16f4541.jpg', 'lioin'),
(16, 7, 4, 1, 1, 6, 98, 'M', 1, 122, 7, '867122762724474d586d9596c9edf8ad.jpg', 'kjgjkg'),
(17, 4, 1, 1, 1, 2, 12, 'M', 1, 23, 2, '2a90e00649b3099d116dbc26a22e6476.jpg', 'ghjgj'),
(18, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, 'itenis', '777'),
(19, 7, 6, 3, 3, 7, 77, 'm', NULL, 777, 600, 'jaqueta3.jpg', '777'),
(20, 7, 4, 3, 3, 7, 77, 'm', NULL, 777, 600, 'jaqueta2.jpg', '777'),
(21, 7, 3, 3, 3, 7, 77, 'm', NULL, 777, 600, 'jaqueta1.jpg', '777'),
(22, 7, 9, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(23, 7, 8, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(24, 7, 4, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(25, 7, 2, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(26, 7, 2, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(27, 7, 1, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(28, 7, 9, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(29, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(30, 7, 6, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(31, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(32, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(33, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(34, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(35, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(36, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(37, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(38, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(39, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(40, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(41, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(42, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(43, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(44, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(45, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(46, 7, 1, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(47, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(48, 7, 4, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(49, 7, 8, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(50, 7, 7, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(51, 7, 4, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(52, 7, 3, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(53, 7, 2, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(54, 7, 1, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(55, 7, 5, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(56, 7, 10, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777'),
(57, 7, 8, 3, 3, 7, 77, 'm', NULL, 777, 600, NULL, '777');

-- --------------------------------------------------------

--
-- Table structure for table `promocao`
--

CREATE TABLE IF NOT EXISTS `promocao` (
  `id_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_promocao`),
  KEY `fk_marca_promocao` (`id_marca`),
  KEY `fk_categoria_promocao` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statusvenda`
--

CREATE TABLE IF NOT EXISTS `statusvenda` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `statusvenda`
--

INSERT INTO `statusvenda` (`id_status`, `nome`) VALUES
(1, 'Separando Produtos');

-- --------------------------------------------------------

--
-- Table structure for table `tamanho`
--

CREATE TABLE IF NOT EXISTS `tamanho` (
  `id_tamanho` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_tamanho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tamanho`
--

INSERT INTO `tamanho` (`id_tamanho`, `tamanho`) VALUES
(1, 'M'),
(2, 'G'),
(3, '38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'vmf', 'vmf', 'vmf');

-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE IF NOT EXISTS `venda` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` datetime DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_forma_pagamento` int(11) NOT NULL,
  `id_end_entrega` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `fk_Venda_Cliente1` (`id_cliente`),
  KEY `fk_Venda_FormaPagamento1` (`id_forma_pagamento`),
  KEY `id_end_entrega` (`id_end_entrega`),
  KEY `fk_status_venda` (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `venda`
--

INSERT INTO `venda` (`id_venda`, `data_hora`, `id_cliente`, `id_forma_pagamento`, `id_end_entrega`, `id_status`) VALUES
(1, '2012-06-01 00:00:00', 1, 1, 3, 1),
(2, '2012-06-25 00:00:00', 1, 1, 3, 1),
(3, '2012-06-09 19:50:32', 1, 1, 11, 1),
(4, '2012-06-09 19:54:18', 1, 1, 11, 1),
(5, '2012-06-09 19:55:54', 1, 1, 11, 1),
(6, '2012-06-09 19:56:57', 1, 1, 11, 1),
(7, '2012-06-09 20:00:11', 1, 1, 11, 1),
(8, '2012-06-09 22:07:58', 1, 1, 11, 1),
(9, '2012-06-09 22:14:10', 1, 1, 11, 1),
(10, '2012-06-09 22:19:29', 18, 1, 23, 1),
(11, '2012-06-09 22:28:15', 1, 1, 11, 1),
(12, '2012-06-09 22:35:59', 1, 1, 11, 1),
(13, '2012-06-10 20:39:45', 1, 1, 26, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_compras_cliente`
--
CREATE TABLE IF NOT EXISTS `view_compras_cliente` (
`preco` float
,`quantidade` int(11)
,`categoria` varchar(45)
,`data_hora` datetime
,`descricao` varchar(45)
,`cor` varchar(45)
,`tamanho` varchar(10)
,`id_cliente` int(11)
,`id_venda` int(11)
,`id_itens_venda` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_contato_operadora`
--
CREATE TABLE IF NOT EXISTS `view_contato_operadora` (
`id_contato` int(11)
,`numero` varchar(11)
,`id_operadora` int(11)
,`nome` varchar(45)
,`id_cliente` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `view_enderecos_cliente`
--
-- in use(#1356 - View 'tcc.view_enderecos_cliente' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)
-- Error reading data: (#1356 - View 'tcc.view_enderecos_cliente' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_produto_detalhes`
--
CREATE TABLE IF NOT EXISTS `view_produto_detalhes` (
`cod` int(11)
,`id_marca` int(11)
,`id_categoria` int(11)
,`id_cor` int(11)
,`id_tamanho` int(11)
,`estoque` int(11)
,`preco_compra` float
,`genero` char(1)
,`infantil` tinyint(1)
,`preco_venda` float
,`desconto` float
,`imagem` varchar(45)
,`descricao` varchar(45)
,`marca` varchar(45)
,`marca desconto` float
,`categoria` varchar(45)
,`tamanho` varchar(10)
,`cor` varchar(45)
);
-- --------------------------------------------------------

--
-- Structure for view `view_compras_cliente`
--
DROP TABLE IF EXISTS `view_compras_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_compras_cliente` AS select `i`.`preco` AS `preco`,`i`.`quantidade` AS `quantidade`,`cat`.`nome` AS `categoria`,`v`.`data_hora` AS `data_hora`,`p`.`descricao` AS `descricao`,`cr`.`nome` AS `cor`,`t`.`tamanho` AS `tamanho`,`cli`.`id_cliente` AS `id_cliente`,`v`.`id_venda` AS `id_venda`,`i`.`id_itens_venda` AS `id_itens_venda` from ((((((`itensvenda` `i` join `venda` `v` on((`i`.`id_venda` = `v`.`id_venda`))) join `produto` `p` on((`p`.`cod` = `i`.`Produto_cod`))) join `tamanho` `t` on((`t`.`id_tamanho` = `p`.`id_tamanho`))) join `cor` `cr` on((`cr`.`id_cor` = `p`.`id_cor`))) join `cliente` `cli` on((`cli`.`id_cliente` = `v`.`id_cliente`))) join `categorias` `cat` on((`cat`.`id_categoria` = `p`.`id_categoria`)));

-- --------------------------------------------------------

--
-- Structure for view `view_contato_operadora`
--
DROP TABLE IF EXISTS `view_contato_operadora`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_contato_operadora` AS select `c`.`id_contato` AS `id_contato`,`c`.`numero` AS `numero`,`c`.`id_operadora` AS `id_operadora`,`o`.`nome` AS `nome`,`cc`.`id_cliente` AS `id_cliente` from ((`contato` `c` join `operadora` `o` on((`c`.`id_operadora` = `o`.`id_operadora`))) join `clientecontatos` `cc` on((`cc`.`id_contato` = `c`.`id_contato`)));

-- --------------------------------------------------------

--
-- Structure for view `view_produto_detalhes`
--
DROP TABLE IF EXISTS `view_produto_detalhes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produto_detalhes` AS select `p`.`cod` AS `cod`,`p`.`id_marca` AS `id_marca`,`p`.`id_categoria` AS `id_categoria`,`p`.`id_cor` AS `id_cor`,`p`.`id_tamanho` AS `id_tamanho`,`p`.`estoque` AS `estoque`,`p`.`preco_compra` AS `preco_compra`,`p`.`genero` AS `genero`,`p`.`infantil` AS `infantil`,`p`.`preco_venda` AS `preco_venda`,`p`.`desconto` AS `desconto`,`p`.`imagem` AS `imagem`,`p`.`descricao` AS `descricao`,`m`.`nome` AS `marca`,`m`.`desconto` AS `marca desconto`,`cat`.`nome` AS `categoria`,`t`.`tamanho` AS `tamanho`,`c`.`nome` AS `cor` from ((((`produto` `p` join `marca` `m` on((`m`.`id_marca` = `p`.`id_marca`))) join `categorias` `cat` on((`cat`.`id_categoria` = `p`.`id_categoria`))) join `tamanho` `t` on((`t`.`id_tamanho` = `p`.`id_tamanho`))) join `cor` `c` on((`c`.`id_cor` = `p`.`id_cor`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientecontatos`
--
ALTER TABLE `clientecontatos`
  ADD CONSTRAINT `fk_ClienteContatos_Cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ClienteContatos_Contato1` FOREIGN KEY (`id_contato`) REFERENCES `contato` (`id_contato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `clienteenderecos`
--
ALTER TABLE `clienteenderecos`
  ADD CONSTRAINT `clienteenderecos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `clienteenderecos_ibfk_2` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_Contato_Operadora1` FOREIGN KEY (`id_operadora`) REFERENCES `operadora` (`id_operadora`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fotosproduto`
--
ALTER TABLE `fotosproduto`
  ADD CONSTRAINT `fk_FotosProduto_Produto1` FOREIGN KEY (`Produto_cod`) REFERENCES `produto` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `itensvenda`
--
ALTER TABLE `itensvenda`
  ADD CONSTRAINT `fk_ItensVenda_Produto1` FOREIGN KEY (`Produto_cod`) REFERENCES `produto` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ItensVenda_Venda1` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_Login_Cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_login_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntasecreta` (`id`);

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_Produto_Cor1` FOREIGN KEY (`id_cor`) REFERENCES `cor` (`id_cor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produto_ListaCategorias1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produto_Marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produto_Tamanho1` FOREIGN KEY (`id_tamanho`) REFERENCES `tamanho` (`id_tamanho`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `promocao`
--
ALTER TABLE `promocao`
  ADD CONSTRAINT `fk_marca_promocao` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `fk_categoria_promocao` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Constraints for table `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_status_venda` FOREIGN KEY (`id_status`) REFERENCES `statusvenda` (`id_status`),
  ADD CONSTRAINT `fk_Venda_Cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venda_FormaPagamento1` FOREIGN KEY (`id_forma_pagamento`) REFERENCES `formapagamento` (`id_forma_pagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_end_entrega`) REFERENCES `endereco` (`id_endereco`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
