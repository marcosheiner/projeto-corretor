-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jun-2021 às 20:46
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_corretor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `criar_anuncio`
--

CREATE TABLE `criar_anuncio` (
  `id` int(11) NOT NULL,
  `nome_funcionario` text NOT NULL,
  `tipo_anuncio` text NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero_casa` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `visibilidade` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `wpp` varchar(255) NOT NULL,
  `foto_fachada` varchar(255) NOT NULL,
  `fotos_comodos` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `valor_neg` varchar(10) NOT NULL,
  `qtd_comodos` varchar(50) NOT NULL,
  `id_user_anun` int(255) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `nome_funcionario` varchar(250) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `telefone_user` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `funcao` enum('funcionário','admin') NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome_usuario`, `nome_funcionario`, `email_user`, `telefone_user`, `senha`, `funcao`, `data_cadastro`) VALUES
(1, 'marcos', 'marcos heiner lopes brito', 'contato.marcosheiner@gmail.com', '(88) 98853-1646', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2021-05-25 17:49:40'),
(3, 'marcosheiner', 'Marcos Heiner Lopes Brito', 'marcosheiner2000@gmail.com', '(22) 22222-2222', 'e10adc3949ba59abbe56e057f20f883e', 'funcionário', '2021-05-26 14:05:19');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `criar_anuncio`
--
ALTER TABLE `criar_anuncio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `criar_anuncio`
--
ALTER TABLE `criar_anuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
