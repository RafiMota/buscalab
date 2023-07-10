-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09-Jul-2023 às 21:33
-- Versão do servidor: 8.0.33-0ubuntu0.22.04.2
-- versão do PHP: 8.1.2-1ubuntu2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inventario_labs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `problemas`
--

CREATE TABLE `problemas` (
  `id` int NOT NULL,
  `laboratorio` int NOT NULL,
  `categoria` text COLLATE utf8mb4_general_ci NOT NULL,
  `software` text COLLATE utf8mb4_general_ci NOT NULL,
  `equipamento` text COLLATE utf8mb4_general_ci NOT NULL,
  `problema` text COLLATE utf8mb4_general_ci NOT NULL,
  `outro_problema` text COLLATE utf8mb4_general_ci NOT NULL,
  `mesa` int NOT NULL,
  `situação` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `problemas`
--

INSERT INTO `problemas` (`id`, `laboratorio`, `categoria`, `software`, `equipamento`, `problema`, `outro_problema`, `mesa`, `situação`) VALUES
(1, 2, 'Computador', '', '', 'Não liga', '', 131, 1),
(2, 6, 'Software', 'vs code', '', 'Não abre', '', 611, 1),
(37, 3, 'Computador', '', '', 'Periféricos não funcionam', '', 342, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_softwares`
--

CREATE TABLE `tabela_softwares` (
  `id` int NOT NULL,
  `software` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lab1` bit(1) NOT NULL,
  `lab2` bit(1) NOT NULL,
  `lab3` bit(1) NOT NULL,
  `lab4` bit(1) NOT NULL,
  `lab5` bit(1) NOT NULL,
  `lab6` bit(1) NOT NULL,
  `imagem` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tabela_softwares`
--

INSERT INTO `tabela_softwares` (`id`, `software`, `lab1`, `lab2`, `lab3`, `lab4`, `lab5`, `lab6`, `imagem`) VALUES
(1, 'Altium', b'0', b'0', b'1', b'1', b'1', b'1', 'img_software/logo-altium.png'),
(2, 'Android Studio', b'1', b'1', b'0', b'0', b'0', b'1', 'img_software/logo-android-studio.svg'),
(3, 'Arduino', b'0', b'0', b'1', b'0', b'0', b'1', 'img_software/logo-arduino.png'),
(4, 'Blender', b'0', b'1', b'1', b'0', b'0', b'1', 'img_software/logo-blender.svg'),
(6, 'Processing', b'1', b'1', b'1', b'1', b'0', b'1', 'img_software/logo-processing.svg'),
(17, 'vs code', b'1', b'1', b'1', b'1', b'1', b'0', 'img_software/logo-vscode.png'),
(24, 'teste20', b'1', b'1', b'1', b'1', b'0', b'1', 'img_software/Captura de tela de 2023-07-08 15-38-50.png'),
(27, 'Draw.io', b'0', b'1', b'0', b'0', b'0', b'0', 'img_software/draw.io-logo.png'),
(28, 'Helflo', b'0', b'1', b'0', b'0', b'0', b'1', 'img_software/logo-helflo.png'),
(29, 'Inkscape', b'0', b'1', b'0', b'1', b'0', b'0', 'img_software/loog-inkscape.png'),
(30, 'Wick editor', b'0', b'0', b'1', b'0', b'0', b'0', 'img_software/logo-wick-editor.png'),
(32, 'Eclipse C++', b'0', b'0', b'0', b'0', b'1', b'0', 'img_software/cdt_logo_icon_0-removebg-preview.png'),
(33, 'Natron', b'0', b'0', b'0', b'0', b'1', b'1', 'img_software/Natron_icon.svg-removebg-preview.png'),
(34, 'PyCharm', b'1', b'0', b'0', b'1', b'1', b'1', 'img_software/PyCharm_Icon.svg-removebg-preview.png'),
(35, 'PostgreSQL', b'1', b'0', b'0', b'1', b'1', b'0', 'img_software/download-removebg-preview.png'),
(37, 'gimp 2', b'1', b'0', b'0', b'0', b'0', b'0', 'img_software/'),
(38, 'gimp 22', b'0', b'0', b'0', b'0', b'0', b'0', 'img_software/'),
(39, 'teste 444', b'1', b'1', b'1', b'0', b'0', b'1', 'img_software/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id` int NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id`, `email`, `senha`) VALUES
(1, 'teste', '1234'),
(2, 'suporte02@teste.com', 'senhatestesuporte2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comp`
--

CREATE TABLE `tb_comp` (
  `id_comp` int NOT NULL,
  `posicao` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fila` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `patrimonio` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mesa_patrimonio` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lab` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_comp`
--

INSERT INTO `tb_comp` (`id_comp`, `posicao`, `fila`, `patrimonio`, `modelo`, `ip`, `mesa_patrimonio`, `lab`) VALUES
(1, '212', '1', '12324', 'dell', '227.12', '12223', 1),
(2, '212', '0', '12323', 'imac', '227.12', '12223', 1),
(3, '312', '1', '12323', 'imac', '227.12', '12223', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_equipamentos`
--

CREATE TABLE `tb_equipamentos` (
  `id` int NOT NULL,
  `modelo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `patrimonio` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fabricante` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lab1` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_equipamentos`
--

INSERT INTO `tb_equipamentos` (`id`, `modelo`, `patrimonio`, `fabricante`, `lab1`) VALUES
(1, 'projetor', '2885677', 'Epson', 2),
(2, 'Ar-condicionar', '2345677', 'Philco', 1),
(6, 'projetor', '2885677', 'Epson', 1),
(7, 'dell alienware', '1221', 'epson', 1),
(8, 'qwqww', '1212', 'epson', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_info_modelos`
--

CREATE TABLE `tb_info_modelos` (
  `fabricante` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `modelo` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `processador` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `cpu_mark` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `mem_capacidade` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `mem_tipo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `disco1_capacidade` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `disco1_tipo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `disco1_modelo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `disco2_capacidade` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `disco2_tipo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `disco2_modelo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `so_nome` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `so_compilacao` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_info_modelos`
--

INSERT INTO `tb_info_modelos` (`fabricante`, `modelo`, `processador`, `cpu_mark`, `mem_capacidade`, `mem_tipo`, `disco1_capacidade`, `disco1_tipo`, `disco1_modelo`, `disco2_capacidade`, `disco2_tipo`, `disco2_modelo`, `so_nome`, `so_compilacao`, `id`) VALUES
('Dell', 'OPtiplex 780', 'Intel(R) Core(TM)2 Quad CPU Q9550 @ 2.83GHz', '2290', '4GB', 'DDR3-10600', '240GB', '', 'ADATA SU630', '', '', '', 'Microsoft Windows 10 Pro', '19044', 7),
('Dell', 'Inspiron 5400 AIO', '', '10548', '8 GB', 'DDR4 2666MHz', '256GB', '', 'SSD', '', '', '', 'Microsoft Windows 11 Home Single Language', '22000', 8),
('Lenovo', 'Lenovo 32091M5', 'Intel(R) Core(TM) i5-3470 CPU @ 3.20GHz', '4664', '8GB', 'DDR3-12800', '240 GB', 'SSD', 'ADATA SU630', '', '', '', 'Microsoft Windows 10 Pro', '19044', 14),
('Dell', 'OPtiplex 7010', 'Intel(R) Core(TM) i5-3470 CPU @ 3.20GHz', '4664', '8GB', 'DDR3-12800', '240 GB', 'SSD', 'ADATA SU630', '500 GB', 'HDD', 'ST500DM002', 'Microsoft Windows 10 Pro', '19044', 15),
('Positivo', 'Positivo D610', 'Intel(R) Pentium(R) CPU G4560 @ 3.50GHz', '3515', '8 GB', 'DDR3-10600', '1 TB', 'indefinido', '', '', '', '', 'Microsoft Windows 10 Pro', '19044', 16),
('Apple', 'iMac16,2', 'Intel(R) Core(TM) i5-5575R CPU @ 2.80GHz', '5095', '8 GB', 'LPDDR3 1867MHz', '512 GB', 'SSD', 'indefinido', '', '', '', 'macOS Monterey', '12.3', 17),
('HP', 'HP Compaq 6005 Pro SFF PC', 'AMD Phenom(tm) II X4 B95 Processor', '2329', '4GB', 'DDR3-10600', '1 TB', 'HDD', 'ST31000528AS', '', '', '', 'Microsoft Windows 10 Pro', '19044', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_info_softwares`
--

CREATE TABLE `tb_info_softwares` (
  `id` int NOT NULL,
  `software` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `licenca` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `versao` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_info_softwares`
--

INSERT INTO `tb_info_softwares` (`id`, `software`, `categoria`, `licenca`, `versao`) VALUES
(1, 'Altium', 'Design', 'gratuita', '2.2.1.6'),
(2, 'Android Studio', 'IDE', 'gratuita', '2021.2.1'),
(3, 'Arduino', 'DEV', 'gratuita', '1.8.19'),
(4, 'Blender', 'Animação', 'gratuita', '3.3'),
(6, 'Processing', 'IDE', 'gratuita', '3.5.4'),
(7, 'Visual Studio Code', 'Editor', 'gratuita', ''),
(11, 'teste20', 'design', '', ''),
(14, 'Draw.io', 'Design', '', ''),
(15, 'Helflo', 'Sistemas', '', ''),
(16, 'Inkscape', 'Design', '', ''),
(17, 'Wick editor', 'Animação', '', ''),
(19, 'Eclipse C++', 'Sistemas', '', ''),
(20, 'Natron', 'Animação', '', ''),
(21, 'PyCharm', 'Sistemas', '', ''),
(22, 'PostgreSQL', 'Sistemas', '', ''),
(23, 'teste', '', '', ''),
(24, 'gimp 2', '', '', ''),
(25, 'gimp 22', '', '', ''),
(26, 'teste 444', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modelos`
--

CREATE TABLE `tb_modelos` (
  `modelo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lab1` int NOT NULL,
  `lab2` int NOT NULL,
  `lab3` int NOT NULL,
  `lab4` int NOT NULL,
  `lab5` int NOT NULL,
  `lab6` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_modelos`
--

INSERT INTO `tb_modelos` (`modelo`, `lab1`, `lab2`, `lab3`, `lab4`, `lab5`, `lab6`, `id`) VALUES
('OPtiplex 780', 0, 16, 0, 0, 3, 2, 22),
('Inspiron 5400 AIO', 16, 10, 0, 0, 0, 0, 23),
('Lenovo 32091M5', 12, 0, 0, 0, 15, 26, 29),
('OPtiplex 7010', 0, 0, 0, 26, 0, 0, 30),
('Positivo D610', 0, 0, 0, 0, 0, 10, 31),
('iMac16,2', 0, 0, 24, 0, 0, 0, 32),
('HP Compaq 6005 Pro SFF PC', 0, 10, 0, 0, 0, 0, 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modelos-bkp`
--

CREATE TABLE `tb_modelos-bkp` (
  `modelo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lab1` int NOT NULL,
  `lab2` int NOT NULL,
  `lab3` int NOT NULL,
  `lab4` int NOT NULL,
  `lab5` int NOT NULL,
  `lab6` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_modelos-bkp`
--

INSERT INTO `tb_modelos-bkp` (`modelo`, `lab1`, `lab2`, `lab3`, `lab4`, `lab5`, `lab6`, `id`) VALUES
('imac', 21, 20, 0, 0, 17, 87, 1),
('lenovo', 0, 25, 0, 34, 0, 0, 2),
('dell', 14, 91, 0, 23, 0, 0, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `problemas`
--
ALTER TABLE `problemas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabela_softwares`
--
ALTER TABLE `tabela_softwares`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_comp`
--
ALTER TABLE `tb_comp`
  ADD PRIMARY KEY (`id_comp`);

--
-- Índices para tabela `tb_equipamentos`
--
ALTER TABLE `tb_equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_info_modelos`
--
ALTER TABLE `tb_info_modelos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_info_softwares`
--
ALTER TABLE `tb_info_softwares`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_modelos`
--
ALTER TABLE `tb_modelos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_modelos-bkp`
--
ALTER TABLE `tb_modelos-bkp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `problemas`
--
ALTER TABLE `problemas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tabela_softwares`
--
ALTER TABLE `tabela_softwares`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_comp`
--
ALTER TABLE `tb_comp`
  MODIFY `id_comp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_equipamentos`
--
ALTER TABLE `tb_equipamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_info_modelos`
--
ALTER TABLE `tb_info_modelos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_info_softwares`
--
ALTER TABLE `tb_info_softwares`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_modelos`
--
ALTER TABLE `tb_modelos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tb_modelos-bkp`
--
ALTER TABLE `tb_modelos-bkp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
