-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/06/2025 às 18:18
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `shows`
--

CREATE TABLE `shows` (
  `ID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `lotação` int(11) NOT NULL,
  `chave` varchar(255) NOT NULL,
  `disponiveis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `shows`
--

INSERT INTO `shows` (`ID`, `nome`, `preco`, `data`, `local`, `banner`, `lotação`, `chave`, `disponiveis`) VALUES
(7, 'AC/DC', 150, '18/08', 'bar clube', 'https://rollingstone.com.br/media/uploads/acdc.jpg', 700, 'AC', 0),
(8, 'Raimundos', 30, '17/05', 'PRAÇA MATRIZ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReOoDHRAbUm-e98z81bexs-mOlHLNf_um32Q&s', 700, 'Rai', 7),
(9, 'Sepultura', 25, '08/12', 'Bar Clube', 'https://veja.abril.com.br/wp-content/uploads/2023/12/BW-20230712-Sepultura_02_0125-CK3.jpg?quality=70&strip=info&w=720&crop=1', 500, 'SEPt', 6),
(10, 'Queen ', 60, '08/06', 'Estação ', 'https://universalmusic.vteximg.com.br/arquivos/ids/175413-1000-1000/cd-queen-queen-ii-2011-remaster-cd-queen-queen-ii-2011-remaster-00602527638881-262763888.jpg?v=637944452428000000', 700, 'QueenHaven', 10),
(11, 'Nirvana', 20, '08/05', 'Estágio Paulo Klinger', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1ScfsV0gIoyd6IuKVTdjjitMhqmWCpBPhNA&s', 1500, 'NirVa', 9),
(12, 'Ghost', 25, '06/06/06', 'quinto dos infernos', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhlObBQqjYhZJ92UmhJU1Io4O2MtrkRhVNfg&s', 666, 'Capetta', 9),
(13, 'The Doors', 50, '08/12', 'estagio ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ28Ri8SOtN30A-gR8pIPOt6sflivhR07jQ0A&s', 900, 'porta', 9),
(14, 'Foo Fighters', 75, '01/09', 'Bar Clube', 'https://acltv.com/wp-content/uploads/2023/10/FF-Logo-With-Circle.jpg', 300, 'FOODEU', 9),
(17, 'Metallica', 200, '08/10', 'meu quarto (do ygor)', 'https://universalmusic.vtexassets.com/arquivos/ids/185314/cd%20metallica-ride-the-lightning-importado-cd%20metallica-ride-the-lightning-impo-00042283814028-00004228381402.jpg?v=638482831030130000', 50, 'Metalix', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ingressos` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nome`, `email`, `senha`, `foto`, `ingressos`) VALUES
(1, 'Jão', 'Mlvz', '68053af2923e00204c3ca7c6a3150cf7', '../../ft_user/img_68366159949c36.93929726.png', '2f2185c6c102fbfebb2525a880df372f;45c48cce2e2d7fbdea1afc51c7c6ad26;5deeb9a2af76d2e5d0a0b9b2d688698a;45c48cce2e2d7fbdea1afc51c7c6ad26;0751a507a8556292e65b8bba0cb0fc37;1679091c5a880faf6fb5e6087eb1b2dc;6cd553a21bea0706a1204d20f9d5ad25;8f14e45fceea167a5a36dedd4bea2543;6cd553a21bea0706a1204d20f9d5ad25;c9f0f895fb98ab9159f51fd0'),
(4, '', 'ADM', '202cb962ac59075b964b07152d234b70', 'https://p2.trrsf.com/image/fget/cf/1200/1200/middle/images.terra.com/2018/07/17/1531863463846.jpg', 'AC;NirVa;Rai;'),
(28, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'NirVa;NirVa;'),
(29, '//&lt;', '&lt;&lt;/', '2bd13ee0d6bb69e2f1cad3c49e8c903a', '../../ft_user/defaultprfl.jpg', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `shows`
--
ALTER TABLE `shows`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
