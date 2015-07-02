-- phpMyAdmin SQL Dump
-- version 4.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 06:36 PM
-- Server version: 5.6.24
-- PHP Version: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpbquiro`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT '0',
  `telefoneResidencial` varchar(15) DEFAULT NULL,
  `telefoneCelular` varchar(15) DEFAULT NULL,
  `paciente` int(11) DEFAULT '0',
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `lembrete` varchar(255) DEFAULT NULL,
  `dataC` datetime DEFAULT NULL,
  `timestampC` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `tipo`, `telefoneResidencial`, `telefoneCelular`, `paciente`, `data`, `hora`, `lembrete`, `dataC`, `timestampC`) VALUES
(1, 1, '(83)8801-1450', NULL, 164, '2015-01-13', '15:00:00', '', NULL, 0),
(2, 1, '(83)3245-2887', NULL, 436, '2015-01-14', '09:00:00', '', NULL, 0),
(3, 1, '', NULL, 238, '2015-01-13', '11:00:00', '', NULL, 0),
(4, 1, '', NULL, 89, '2015-01-13', '10:00:00', '', NULL, 0),
(5, 1, '(83)3235-5649', NULL, 437, '2015-01-13', '14:00:00', '', NULL, 0),
(6, 1, '', NULL, 438, '2015-01-13', '14:30:00', '', NULL, 0),
(7, 1, '', NULL, 439, '2015-01-13', '16:00:00', '', NULL, 0),
(8, 1, '', NULL, 408, '2015-01-16', '14:00:00', 'FAZENDO BUSQUET', NULL, 0),
(10, 1, '', NULL, 72, '2015-01-13', '09:00:00', '', NULL, 0),
(11, 1, '(83)8862-2209', NULL, 441, '2015-01-13', '17:00:00', '', NULL, 0),
(12, 1, '', NULL, 160, '2015-01-14', '09:30:00', '', NULL, 0),
(13, 1, '(83)8886-0110', NULL, 442, '2015-01-14', '10:00:00', '', NULL, 0),
(14, 1, '(83)8650-8999', NULL, 193, '2015-01-14', '14:00:00', '', NULL, 0),
(15, 1, '', NULL, 113, '2015-01-06', '16:00:00', '', NULL, 0),
(17, 1, '', NULL, 448, '2015-01-14', '10:30:00', '', NULL, 0),
(18, 1, '', NULL, 450, '2015-01-20', '09:30:00', 'crian&ccedil;a especial', NULL, 0),
(19, 1, '', NULL, 89, '2015-01-20', '10:00:00', 'paciente faz pilates as 09:00', NULL, 0),
(20, 1, '', NULL, 451, '2015-01-20', '11:00:00', '', NULL, 0),
(21, 1, '', NULL, 443, '2015-01-20', '11:30:00', 'PACIENTE MORA EM GUARABIRA', NULL, 0),
(22, 1, '', NULL, 195, '2015-01-20', '14:00:00', '', NULL, 0),
(23, 1, '', NULL, 208, '2015-01-20', '14:30:00', '', NULL, 0),
(24, 1, '', NULL, 78, '2015-01-20', '15:00:00', '', NULL, 0),
(25, 1, '', NULL, 238, '2015-01-27', '09:00:00', '', NULL, 0),
(26, 1, '', NULL, 452, '2015-01-27', '09:30:00', '', NULL, 0),
(27, 1, '', NULL, 89, '2015-01-27', '10:00:00', '', NULL, 0),
(28, 1, '', NULL, 450, '2015-01-27', '11:00:00', '', NULL, 0),
(29, 1, '', NULL, 489, '2015-01-27', '11:30:00', '', NULL, 0),
(30, 1, '', NULL, 282, '2015-01-27', '14:00:00', '', NULL, 0),
(31, 1, '', NULL, 273, '2015-01-27', '14:30:00', '', NULL, 0),
(32, 1, '', NULL, 492, '2015-01-27', '15:00:00', '', NULL, 0),
(33, 1, '', NULL, 46, '2015-01-27', '15:30:00', '', NULL, 0),
(34, 1, '', NULL, 441, '2015-01-27', '16:00:00', '', NULL, 0),
(35, 1, '', NULL, 493, '2015-01-27', '16:30:00', '', NULL, 0),
(36, 1, '', NULL, 494, '2015-01-27', '17:30:00', '', NULL, 0),
(37, 1, '', NULL, 243, '2015-01-28', '07:00:00', '', NULL, 0),
(38, 1, '', NULL, 83, '2015-01-28', '07:30:00', '', NULL, 0),
(39, 1, '', NULL, 395, '2015-01-28', '08:00:00', '', NULL, 0),
(40, 1, '', NULL, 448, '2015-01-28', '09:00:00', '', NULL, 0),
(41, 1, '', NULL, 469, '2015-01-28', '09:30:00', '', NULL, 0),
(42, 1, '', NULL, 160, '2015-01-28', '10:00:00', '', NULL, 0),
(43, 1, '', NULL, 113, '2015-01-28', '14:00:00', '', NULL, 0),
(44, 1, '', NULL, 437, '2015-01-28', '14:30:00', '', NULL, 0),
(45, 1, '', NULL, 28, '2015-01-28', '15:00:00', '', NULL, 0),
(46, 1, '', NULL, 232, '2015-01-28', '15:30:00', 'CEI&Ccedil;A', NULL, 0),
(47, 1, '', NULL, 496, '2015-01-28', '16:00:00', '', NULL, 0),
(48, 1, '', NULL, 445, '2015-01-28', '16:30:00', '', NULL, 0),
(49, 1, '', NULL, 470, '2015-01-28', '17:00:00', '', NULL, 0),
(50, 1, '', NULL, 345, '2015-01-28', '17:30:00', '', NULL, 0),
(51, 1, '', NULL, 362, '2015-01-28', '18:00:00', '', NULL, 0),
(52, 1, '', NULL, 122, '2015-01-29', '07:30:00', '', NULL, 0),
(53, 1, '', NULL, 57, '2015-01-29', '10:00:00', '', NULL, 0),
(54, 1, '', NULL, 460, '2015-01-29', '11:00:00', '', NULL, 0),
(55, 1, '', NULL, 489, '2015-01-29', '11:30:00', '', NULL, 0),
(56, 1, '', NULL, 492, '2015-01-29', '15:00:00', '', NULL, 0),
(57, 1, '', NULL, 46, '2015-01-29', '15:30:00', '', NULL, 0),
(58, 1, '', NULL, 494, '2015-01-29', '16:00:00', '', NULL, 0),
(59, 1, '', NULL, 468, '2015-01-29', '17:00:00', '', NULL, 0),
(60, 1, '', NULL, 460, '2015-01-30', '09:00:00', '', NULL, 0),
(61, 1, '', NULL, 496, '2015-01-30', '14:00:00', '', NULL, 0),
(62, 1, '', NULL, 243, '2015-02-04', '07:00:00', '', NULL, 0),
(63, 1, '', NULL, 151, '2015-02-04', '08:00:00', '', NULL, 0),
(64, 1, '', NULL, 442, '2015-02-04', '00:00:08', '', NULL, 0),
(65, 1, '', NULL, 448, '2015-02-04', '09:00:00', '', NULL, 0),
(66, 1, '', NULL, 476, '2015-02-04', '10:00:00', '', NULL, 0),
(67, 1, '', NULL, 113, '2015-02-04', '14:00:00', '', NULL, 0),
(68, 1, '', NULL, 437, '2015-02-04', '14:30:00', '', NULL, 0),
(69, 1, '', NULL, 519, '2015-02-24', '09:00:00', '', NULL, 0),
(70, 1, '', NULL, 518, '2015-02-24', '09:30:00', '', NULL, 0),
(71, 1, '', NULL, 89, '2015-02-24', '10:00:00', '', NULL, 0),
(72, 1, '', NULL, 489, '2015-02-24', '11:00:00', '', NULL, 0),
(73, 1, '', NULL, 443, '2015-02-24', '14:00:00', '', NULL, 0),
(74, 1, '', NULL, 476, '2015-02-24', '15:00:00', '', NULL, 0),
(75, 1, '', NULL, 525, '2015-02-24', '17:00:00', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `agenda_fisioterapeutas`
--

CREATE TABLE IF NOT EXISTS `agenda_fisioterapeutas` (
  `id` int(11) NOT NULL,
  `fisioterapeuta` int(11) DEFAULT '0',
  `compromisso` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agenda_fisioterapeutas`
--

INSERT INTO `agenda_fisioterapeutas` (`id`, `fisioterapeuta`, `compromisso`) VALUES
(1, 2, '1'),
(2, 2, '2'),
(3, 2, '3'),
(5, 2, '5'),
(6, 2, '6'),
(7, 2, '7'),
(8, 2, '8'),
(9, 2, '10'),
(10, 2, '11'),
(11, 2, '12'),
(12, 2, '13'),
(13, 2, '14'),
(14, 4, '15'),
(15, 2, '16'),
(16, 2, '17'),
(17, 2, '18'),
(18, 2, '19'),
(19, 2, '20'),
(20, 2, '21'),
(21, 2, '22'),
(22, 2, '23'),
(23, 2, '24'),
(24, 2, '25'),
(25, 2, '26'),
(26, 2, '27'),
(27, 2, '28'),
(28, 2, '29'),
(29, 2, '30'),
(30, 2, '31'),
(31, 2, '32'),
(32, 2, '33'),
(33, 2, '34'),
(34, 2, '35'),
(35, 2, '36'),
(36, 2, '37'),
(37, 2, '38'),
(38, 2, '39'),
(39, 2, '40'),
(40, 2, '41'),
(41, 2, '42'),
(42, 2, '43'),
(43, 2, '44'),
(44, 2, '45'),
(45, 2, '46'),
(46, 2, '47'),
(47, 2, '48'),
(48, 2, '49'),
(49, 2, '50'),
(50, 2, '51'),
(51, 2, '52'),
(52, 2, '53'),
(53, 2, '54'),
(54, 2, '55'),
(55, 2, '56'),
(56, 2, '57'),
(57, 2, '58'),
(58, 2, '59'),
(59, 2, '60'),
(60, 2, '61'),
(61, 2, '62'),
(62, 2, '63'),
(63, 2, '64'),
(64, 2, '65'),
(65, 2, '66'),
(66, 2, '67'),
(67, 2, '68'),
(68, 2, '69'),
(69, 2, '70'),
(70, 2, '71'),
(71, 2, '72'),
(72, 2, '73'),
(73, 2, '74'),
(74, 2, '75'),
(81, 4, '92'),
(84, 2, '93'),
(88, 4, '81'),
(89, 4, '82'),
(90, 2, '82'),
(91, 2, '83'),
(92, 4, '83'),
(94, 2, '84');

-- --------------------------------------------------------

--
-- Table structure for table `atendimentos`
--

CREATE TABLE IF NOT EXISTS `atendimentos` (
  `id` int(11) NOT NULL,
  `paciente` int(11) DEFAULT '0',
  `altura` decimal(14,2) DEFAULT NULL,
  `peso` decimal(14,2) DEFAULT NULL,
  `imc` decimal(14,2) DEFAULT NULL,
  `hda` longtext,
  `avaliacaoPostural` longtext,
  `evolucao` longtext,
  `data` datetime DEFAULT NULL,
  `timestamp` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atendimentos`
--

INSERT INTO `atendimentos` (`id`, `paciente`, `altura`, `peso`, `imc`, `hda`, `avaliacaoPostural`, `evolucao`, `data`, `timestamp`) VALUES
(12, 1, '1.70', '63.00', '21.80', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n', '2015-06-10 19:26:12', 1433975172),
(15, 607, '1.70', '65.00', '22.49', '', '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `atendimentos_dores`
--

CREATE TABLE IF NOT EXISTS `atendimentos_dores` (
  `id` int(11) NOT NULL,
  `atendimento` int(11) DEFAULT '0',
  `local` int(11) DEFAULT '0',
  `caracteristica` varchar(255) DEFAULT NULL,
  `grau` int(11) DEFAULT '0',
  `intensidade` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atendimentos_dores`
--

INSERT INTO `atendimentos_dores` (`id`, `atendimento`, `local`, `caracteristica`, `grau`, `intensidade`) VALUES
(32, 12, 8, 'inc&ocirc;modo na lombar', 6, '2,3'),
(33, 12, 6, 'inc&ocirc;modo na m&atilde;o', 5, '1,2'),
(34, 12, 6, 'inc&ocirc;modo na m&atilde;o', 5, '1,2');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `idade` int(11) DEFAULT '0',
  `estadoCivil` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `mesNascimento` int(11) DEFAULT '0',
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cep` varchar(30) DEFAULT NULL,
  `telefoneResidencial` varchar(15) DEFAULT NULL,
  `telefoneCelular` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `profissao` varchar(255) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `timestamp` int(11) DEFAULT '0',
  `observacoes` text,
  `status` int(11) DEFAULT '0',
  `tratamentos` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=608 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `foto`, `nome`, `sexo`, `idade`, `estadoCivil`, `cpf`, `dataNascimento`, `mesNascimento`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `telefoneResidencial`, `telefoneCelular`, `email`, `profissao`, `data`, `timestamp`, `observacoes`, `status`, `tratamentos`) VALUES
(1, '19092014011620.jpg', 'Saulo Ranieri de Oliveira', 'M', 29, '', '053.751.834-71', '1984-11-17', 11, 'Rua Goi&aacute;s', '700', 'Complemento', 'Estados', 'Jo&atilde;o Pessoa', 'PB', '58030-061', '(83)3244-4692', '(83)99107-8047', 'sauloroliveira@gmail.com', 'Analista de Sistemas', '2014-08-15 01:13:26', 1408058006, '', 1, '1,2'),
(3, NULL, 'MÃ´nica Alves Barros Ribeiro ', 'F', 0, NULL, '441.662.574-04', '0000-00-00', 0, 'Rua Jaime Carvalho Tavares de Melo', '1663', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-260', '', '(83)9985-6907', 'monicabarros@hotmail.com', NULL, '2014-08-20 17:14:55', 1408547695, '', 1, '0'),
(5, NULL, 'CÃ­ntia MÃ¡rcia de MagalhÃ£es', 'F', 0, NULL, '', '0000-00-00', 0, 'Rua: JosÃ© GonÃ§alves Junior ', '79', 'Ap: 401', 'Castelo Brabco', 'JoÃ£o Pessoa', 'PB', '58038-010', '(83)8880-2456', '(83)3533-3906', 'cintiamarcia2008@gmail.com', NULL, '2014-08-20 17:23:33', 1408548213, '', 1, '0'),
(8, NULL, 'Ana Maria Lins Martins', 'F', 0, NULL, '', '0000-00-00', 0, 'R. Genivaldo Correia Lima', '83', '', 'bancarios', 'JoÃ£o Pessoa', 'PB', '', '(83)3235-2208', '(83)8835-6548', 'anamlm65@hotmail.com', NULL, '2014-08-20 21:05:01', 1408561501, '', 1, '0'),
(9, NULL, 'Alaide da Silva Lima', 'F', 0, NULL, '', '0000-00-00', 0, 'Rua Carteiro OlÃ­vio Pontes', '455', 'casa 01', 'Jardim SÃ£o Paulo', 'JoÃ£o Pessoa', 'PB', '58053-020', '(83)8747-2937', '(83)9604-1574', 'alaideslima@hotmail.com', NULL, '2014-08-20 21:32:31', 1408563151, '', 1, '0'),
(10, NULL, 'Ana Flavia Cordeiro Nobrega', 'F', 0, NULL, '788.349.104-00', '0000-00-00', 0, 'Av. Monteiro Lobato', '340', '', '', '', '0', '', '(83)3228-6376', '(83)9981-3658', 'anaflavia_nobrega@hotmail.com', NULL, '2014-08-20 21:38:43', 1408563523, '', 1, '0'),
(11, NULL, 'Antonio Alves de Lima Neto', 'M', 16, NULL, '', '0000-00-00', 0, 'R.Jose Maria Tavares de Melo', '301', '', '', '', '0', '', '(83)9983-2589', '(83)8852-8999', '', NULL, '2014-08-20 21:51:42', 1408564302, '', 1, '0'),
(12, NULL, 'Avany Toscano Baptista', 'F', 84, NULL, '', '1930-09-19', 9, 'R. Mario Botellho', '207', '', '', '', '', '', '', '(83)8752-7794', '', '', '2014-08-21 12:14:01', 1408616041, '', 1, '0'),
(13, NULL, 'Ana Carolina Silva Costa', 'F', 0, NULL, '', '1983-06-01', 6, '', '', '', '', '', '0', '58045-270', '', '(83)8690-3295', 'anacarolinacosta@aut/look.com', NULL, '2014-08-21 12:17:42', 1408616262, '', 1, '0'),
(14, NULL, 'adriana Maria da Nobrega Carvalho', '0', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)9969-7744', '(83)8737-1551', '', NULL, '2014-08-21 12:20:32', 1408616432, '', 1, '0'),
(15, NULL, 'Adriana Cerqueira Louro', 'F', 0, NULL, '', '1979-02-06', 2, 'R.Eutiquiano Barreto', '789', '', 'manaira', 'JoÃ£o Pessoa', 'PB', '', '(83)3021-8952', '(83)8628-9307', 'drikalouro@hotmail.com', NULL, '2014-08-21 12:22:53', 1408616573, '', 1, '0'),
(16, NULL, 'Acacia Maria Costa Garcia', 'F', 0, NULL, '', '1947-04-27', 4, 'Rua Edvaldo Bezerra Cavalcanti Pinho', '1029', 'Apto.301', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-270', '(83)3247-2709', '(83)8863-2709', 'acacia.garcia@uol.com.br', NULL, '2014-08-21 12:29:58', 1408616998, '', 1, '0'),
(17, NULL, 'Almir Nobrega da Silva', '0', 0, NULL, '058.088.474-00', '1952-03-02', 3, 'Avenida Cabo Branco', '3106', '', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-010', '(83)8804-1301', '(83)9633-3553', 'almirnobrega@yahoo.com.br', NULL, '2014-08-21 12:32:04', 1408617124, '', 1, '0'),
(18, NULL, 'Aretuza de Gusmao Malheiros', 'F', 0, NULL, '', '1956-04-27', 4, 'R.Jose Clementino de Oliveira', '', '', '', '', '0', '', '', '(83)8826-2756', 'aretuzagusmao@hotmail.com', NULL, '2014-08-21 12:41:18', 1408617678, '', 1, '0'),
(19, NULL, 'Angemira Lins de Medeiros', '0', 0, NULL, '323.575.244-72', '1945-04-27', 4, 'Av.Oceano Pacifico', '134', 'Apto.201', 'intermares', 'JoÃ£o Pessoa', '0', '58310-000', '(83)3248-1608', '(83)8812-2708', '', NULL, '2014-08-21 12:42:49', 1408617769, '', 1, '0'),
(20, NULL, 'Alvaro Guilherme Custodio de Azevedo', 'M', 0, NULL, '108.483.764-12', '2000-05-06', 5, 'Av. Presidente Whashington Luiz', '268', 'Apto 103', '', '', '0', '', '', '(83)8874-3657', 'alvaro_98123@GMAIL.COM', NULL, '2014-08-21 12:50:54', 1408618254, '', 1, '0'),
(21, NULL, 'Adenilson da Silva Santos', 'M', 0, NULL, '', '1975-04-21', 4, 'Rua AntÃ´nio Ferreira', '345', '', 'Centro', 'Bayeux', 'PB', '58307-070', '', '(83)8889-9510', '', NULL, '2014-08-21 13:06:11', 1408619171, '', 1, '0'),
(22, NULL, 'Ana Richelma F. Leao ', '0', 0, NULL, '038.944.866-43', '1980-02-09', 2, 'R.Presintende E pitacio Pessoa', '753', 'Apto. 402', '', '', '0', '', '(83)3566-0330', '(82)9618-1557', 'michema@bol.com', NULL, '2014-08-21 14:21:37', 1408623697, '', 1, '0'),
(23, NULL, 'Bruno Rodrigues ', 'M', 0, NULL, '', '1977-03-25', 3, 'Av. Edson Ramalho', '656', '', 'manaira', '', '0', '', '', '(83)8888-3207', '', NULL, '2014-08-21 14:26:44', 1408624004, '', 1, '0'),
(24, NULL, 'Cintia Marcia de Margalhaes', 'F', 0, NULL, '061.048.186-09', '0000-00-00', 0, 'Rua Jose GonÃ§alves Junior', '79', '', 'Castelo Branco', 'JoÃ£o Pessoa', 'PB', '', '(83)3533-3906', '(83)8880-2456', 'cintiamarcia2008@gmail.com', NULL, '2014-08-21 14:58:44', 1408625924, '', 1, '0'),
(25, NULL, 'Carmen Lucia Rocha Rodrigues', 'F', 0, NULL, '570.570.360-00', '1965-04-19', 4, 'Rua Professora EudÃ©sia Vieira', '', '', 'Estados', 'JoÃ£o Pessoa', '0', '58030-390', '(83)3224-0776', '(83)9691-1344', 'carmenrodrigues2014@gmail.com', NULL, '2014-08-21 15:21:34', 1408627294, '', 1, '0'),
(26, NULL, 'Carlos Davidson Pinheiro', '0', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(08)9990-0933', '', NULL, '2014-08-21 15:27:24', 1408627644, '', 1, '0'),
(27, NULL, 'Cristina Maria Tele Firmino ', '0', 0, NULL, '160.895.024-72', '0000-00-00', 0, 'R.Dr Arnaldo Escorel', '100', '', '', '', '0', '', '(83)3225-7582', '(83)9362-1406', 'cristinatelesfirmino', NULL, '2014-08-21 15:35:46', 1408628146, '', 1, '0'),
(28, NULL, 'Carlos Roberto Rondon Pereira Saigali', '0', 0, NULL, '', '1986-07-05', 7, 'R.Padre Meira', '19', '', 'centro', '', '0', '', '', '(83)9965-1770', 'carropis@yahoo.com', NULL, '2014-08-21 15:47:37', 1408628857, '', 1, '0'),
(29, NULL, 'Christiane Ferreira de Souza', 'F', 0, NULL, '058.853.794-24', '1985-03-28', 3, 'Rua Coronel Miguel Satyro', '280', 'Apto.1101', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-110', '(83)3247-0854', '(83)8850-3999', 'christiane.ferreira@gmail.com', NULL, '2014-08-21 15:50:27', 1408629027, '', 1, '0'),
(30, NULL, 'Claudio Pessanha da Rocha', '0', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)3031-4833', '(83)9860-4286', '', NULL, '2014-08-21 15:53:13', 1408629193, '', 1, '0'),
(31, NULL, 'Camila Tamara Maia de Oliveira', '0', 0, NULL, '058.477.094-47', '0000-00-00', 0, 'Rua ClÃ³vis de Holanda Calado', '', '', 'Intermares', 'Cabedelo', 'PB', '58102-335', '', '', 'camilamaia_@hootmail.com', NULL, '2014-08-21 16:01:27', 1408629687, '', 1, '0'),
(32, NULL, 'Cleber de Jesus de Oliveira', '0', 0, NULL, '808.847.767-00', '0000-00-00', 0, 'Avenida Senador Ruy Carneiro', '853', 'Apt.1301', 'Miramar', 'JoÃ£o Pessoa', 'PB', '58032-101', '(83)3243-0585', '(83)8845-0400', 'cleber.jol@gmail.com', NULL, '2014-08-21 16:03:52', 1408629832, '', 1, '0'),
(33, NULL, 'Carlinda Souza Soares', '0', 0, NULL, '393.607.411-91', '1965-01-01', 1, 'Av.Goias', '401', 'ed. Cartona', 'Bairro dos Estados', 'JoÃ£o Pessoa', '0', '', '', '(83)9946-8533', 'pra.carlinda@hotmail.com', NULL, '2014-08-21 16:15:03', 1408630503, '', 1, '0'),
(34, '27082014135545.jpg', 'claudete Soares Tavares', '0', 0, '', '', '0000-00-00', 0, 'Rua JoÃ£o Soares Padilha', '28', 'Apto.202', 'Aeroclube', 'JoÃ£o Pessoa', '0', '58036-835', '(83)8858-9548', '(83)9966-8425', '', '', '2014-08-21 19:40:03', 1408642803, '', 1, '0'),
(35, NULL, 'Cristina de Fatima Bezerra Torres', '0', 0, NULL, '142.053.274-04', '0000-00-00', 0, 'Rua Juracy de Carvalho Luna', '31', 'Apto.801', 'Brisamar', 'JoÃ£o Pessoa', 'PB', '58034-240', '', '(83)8640-8402', 'cristina.defatima@gmail.com.br', NULL, '2014-08-21 19:48:26', 1408643306, '', 1, '0'),
(36, NULL, 'Deusimar Wanderley Guedes', 'M', 0, NULL, '219.541.274-72', '1959-04-06', 4, 'Rua Nevinha Gondim de Oliveira', '66', 'Apto.1001', 'Brisamar', 'JoÃ£o Pessoa', 'PB', '58033-070', '', '(83)9982-3913', '', NULL, '2014-08-21 19:52:43', 1408643563, '', 1, '0'),
(37, NULL, 'Dilma Soares de Lima', '', 55, NULL, '753.288.954-87', '1960-04-07', 4, 'Rua Adalgisa de Luna Sobreira', '38', '', 'Mangabeira', 'Jo&atilde;o Pessoa', 'PB', '58057-150', '(83)8700-8426', '(83)8805-3765', 'JAILTOFILHO@GMAIL.COM', '', '2014-08-21 20:09:33', 1408644573, '', 1, ''),
(38, NULL, 'Dalva Aparecida Guimares de Quadro', '0', 0, NULL, '624.155.902-82', '1962-08-27', 8, 'Rua Dom Bosco', '1178', '', 'Cristo Redentor', 'JoÃ£o Pessoa', 'PB', '58070-470', '', '(83)9695-2820', '', NULL, '2014-08-21 20:13:23', 1408644803, '', 1, '0'),
(39, NULL, 'Divonne de Silgueira Miranda', '0', 0, NULL, '', '1933-06-12', 6, 'Avenida Cabo Branco', '', '', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-010', '(83)8870-2066', '(83)8757-9988', '', NULL, '2014-08-21 20:22:57', 1408645377, '', 1, '0'),
(40, NULL, 'Dulciane de MendonÃ§a Costa', '0', 0, NULL, '603.951.844-87', '1967-02-11', 2, 'Rua Golfo San Fernando', '97', '', 'Intermares', 'Cabedelo', 'PB', '58102-138', '(83)3248-2993', '(83)8825-0315', 'dulciane.costa@gmail.com', NULL, '2014-08-21 20:27:44', 1408645664, '', 1, '0'),
(41, '22082014012614.jpg', 'Diana Costa Dias Pinto', 'F', 34, '', '011.909.154-21', '1981-03-12', 3, 'Av. Fca. Moura', '662', '', 'Jardim 13 de maio', 'Jo&atilde;o Pessoa', 'PB', '', '(83)8871-3552', '', 'dianacost@gmail.com', '', '2014-08-21 22:46:06', 1408653966, '', 1, ''),
(42, '14052015155939.jpg', 'Dilma Targino Moreira Quirino', '', 82, '', '023.301.304-06', '1932-08-14', 8, 'R.De.Francisco S. Moreira Bessa', '162', '', 'Bessa', 'Jo&atilde;o Pessoa', '0', '', '(83)3245-4445', '(83)8797-4445', '', '', '2014-08-22 12:35:08', 1408703708, '', 1, ''),
(43, NULL, 'Denise Maria da Cruz Neto Schuler', NULL, 0, NULL, '020.052.174-84', '1940-02-24', 2, 'Avenida Amazonas', '89', 'Apto.402', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-140', '', '(83)8720-3420', 'deniseschule@gmail.com', NULL, '2014-08-22 12:38:15', 1408703895, '', 1, '0'),
(44, NULL, 'David Nicolau Lima Alves', NULL, 0, NULL, '046.211.164-99', '1985-05-14', 5, 'Rua Celina da Costa Machado Chaves', '16', '', 'Altiplano Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58046-230', '', '(83)8113-9407', 'danves@live.com', NULL, '2014-08-22 12:45:33', 1408704333, '', 1, '0'),
(45, '28042015165826.jpg', 'Eudes Sousa Magalhaes', '', 0, '', '119.934.133-91', '1958-05-14', 5, 'Av. Rio Grande do Sul', '1600', '', '', '', '0', '', '(83)3042-0385', '(83)8831-4700', 'eudesmagalhaes@ig.com.br', '', '2014-08-22 12:48:15', 1408704495, '', 1, ''),
(46, '22082014200905.jpg', 'Elisete Moura Souza do Nascimento', '', 0, '', '199.836.893-91', '1963-02-16', 2, 'Rua Edvaldo Toscano de Brito', '246', '', 'JosÃ© AmÃ©rico de Almeida', 'JoÃ£o Pessoa', 'PB', '58073-390', '(83)3231-3635', '(83)8811-4546', 'elise_moura@hotmail.com', '', '2014-08-22 13:06:19', 1408705579, '', 1, '0'),
(47, NULL, 'Elias A. Neto ', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)8833-5895', '(83)8700-7324', '', NULL, '2014-08-22 13:07:14', 1408705634, '', 1, '0'),
(48, NULL, 'Eugenia Celia Victor Barbosa', NULL, 0, NULL, '', '1975-01-24', 1, 'Avenida Presidente EpitÃ¡cio Pessoa', '5102', '', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-000', '', '(83)8763-0900', 'eugeniavictal.@bol.com', NULL, '2014-08-22 13:11:28', 1408705888, '', 1, '0'),
(49, NULL, 'Elisete Dantas', NULL, 0, NULL, '161.691.154-91', '1945-12-20', 12, 'R.Poetisa Violeta Formiga', '80', 'Apto.101-A', '', '', '0', '', '', '', '', NULL, '2014-08-22 13:15:59', 1408706159, '', 1, '0'),
(50, '26082014185930.jpg', 'Eloisa Lorenzo de Azevedo Gheisel', '', 0, '', '389.946.821-04', '1962-08-01', 8, 'Av.Oceano Indio', '601', '', 'cabedelo-intermares', 'JoÃ£o Pessoa', '0', '58102-222', '(83)8730-8350', '(83)9673-8446', 'eloisaghesel@hotmail.com', '', '2014-08-22 13:31:24', 1408707084, '', 1, '0'),
(51, NULL, 'Elisangela Leite de Lacerda', NULL, 0, NULL, '026.782.804-70', '1978-03-19', 3, 'R. Joao Vicente da Cruz', '434', '', 'Rio Tinto', '', '0', '', '(83)9372-9100', '(83)8885-4122', 'dinhasjpa@hotmail.com', NULL, '2014-08-22 13:41:26', 1408707686, '', 1, '0'),
(52, NULL, 'Emilia Maria da T. Prestes', NULL, 0, NULL, '057.313.214-34', '1949-12-24', 12, 'Rua Hildebrando Tourinho', '430', '', 'Miramar', 'JoÃ£o Pessoa', 'PB', '58032-080', '', '(83)8805-8321', 'prestesemilia@yahoo.com.br', NULL, '2014-08-22 13:46:19', 1408707979, '', 1, '0'),
(54, NULL, 'Eduardo de Andrade Silva', NULL, 0, NULL, '168.628.498-59', '7972-07-24', 7, 'av. Umbuzeiro, ', '850', 'Apto.', '', 'JoÃ£o Pessoa', '0', '', '', '(83)9924-9522', 'edu.andrade@.com.br', NULL, '2014-08-22 14:22:57', 1408710177, '', 1, '0'),
(55, NULL, 'Edson Jorge Batista Junior', '', 0, NULL, '051.155.644-67', '1986-11-04', 11, 'Rua Oneida Agra da NÃ³brega', '', '', 'Altiplano Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58046-200', '', '', 'edsonjorgeadv@live.com', '', '2014-08-22 14:59:38', 1408712378, '', 1, '0'),
(56, '26082014162645.jpg', 'Evandro Farias', '', 53, '', '', '1961-06-11', 6, 'Rua JosÃ© Alfredo NÃ³brega', '601', 'Apto.601', 'Bessa', 'JoÃ£o Pessoa', '0', '58035-100', '', '(83)8827-8382', '', '', '2014-08-22 15:24:18', 1408713858, '', 1, '0'),
(57, '26082014165327.jpg', 'Eudes Rocha', '', 0, '', '', '2012-02-24', 2, 'R .Antonio R.Junior', '225', '', '', '', '0', '', '(83)9981-0605', '(83)8660-5662', 'eudes1@gamail.com', '', '2014-08-22 16:35:38', 1408718138, '', 1, '0'),
(58, NULL, 'Erik Francisco Silva de Oliveira ', NULL, 0, NULL, '009.514.454-48', '1981-07-28', 7, 'Rua Aposentado ClÃ¡udio de Santana', '108', '', 'Ãgua Fria', 'JoÃ£o Pessoa', 'PB', '58073-493', '', '', 'eriksalvamento@ig.com.br', NULL, '2014-08-22 16:39:58', 1408718398, '', 1, '0'),
(59, NULL, 'Elder Plinio Martiws', NULL, 0, NULL, '401.743.794-04', '1960-10-04', 10, 'R.comerceiante Jose Florentino', '', '', '', '', '0', '', '', '', 'elderacingkart@bol.com', NULL, '2014-08-22 16:46:40', 1408718800, '', 1, '0'),
(62, NULL, 'Erika Cristina Vargas de Oliveira', NULL, 0, NULL, '046.943.464-31', '1981-12-22', 12, 'Rua Desembargador Rivaldo Pereira', '191', '', 'Altiplano Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58046-000', '(83)3252-2459', '', '', NULL, '2014-08-22 19:26:08', 1408728368, '', 1, '0'),
(63, NULL, 'Eduarda Muniz de Macedo ', NULL, 0, NULL, '011.934.794-60', '2002-04-16', 4, 'Rua Engenheiro SÃ©rgio Rubens de Albuquerque', '180', '', 'Cristo Redentor', 'JoÃ£o Pessoa', 'PB', '58071-440', '', '(83)8871-4194', '', NULL, '2014-08-22 19:33:02', 1408728782, '', 1, '0'),
(64, NULL, 'Felipe Fernande Clarindo de Almeida', NULL, 0, NULL, '090.431.614-97', '1991-08-12', 8, 'Av. Hilton Souto Maior', '6701', 'cond. Cabo Branco PrivÃª', 'Cabo Branco', 'JoÃ£o Pessoa', '0', '', '', '', 'felipelca45@hotmail.com', NULL, '2014-08-22 20:07:21', 1408730841, '', 1, '0'),
(65, NULL, 'Franklin de Araujo Neto', NULL, 0, NULL, '146.511.654-00', '1954-01-26', 1, 'Avenida SapÃ©', '1393', 'Apto.901', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-382', '', '(83)8811-0100', 'faneto@superri@.com.br', NULL, '2014-08-22 20:22:30', 1408731750, '', 1, '0'),
(66, NULL, 'Fernando Barbosa de Lima', NULL, 0, NULL, '112.048.344-15', '1955-11-20', 11, 'R. Praia  de Ponta Negra', '91', '', '', '', '0', '', '(83)3231-7469', '(83)8610-2754', '', NULL, '2014-08-22 20:30:37', 1408732237, '', 1, '0'),
(68, NULL, 'fernando Almeida', NULL, 0, NULL, '', '1964-03-22', 3, 'R.Yoly Heloy de Medeiros Valentina', '524', '', '', '', '0', '', '(83)8876-1674', '(83)8876-1674', '', NULL, '2014-08-22 20:51:46', 1408733506, '', 1, '0'),
(69, NULL, 'Flavio Roberto Xavier de Oliveira', NULL, 0, NULL, '011.756.444-39', '1981-09-24', 9, 'Rua Lindolfo GonÃ§alves Chaves', '225', 'Apto 701', 'Jardim SÃ£o Paulo', 'JoÃ£o Pessoa', 'PB', '58051-200', '', '(83)9697-0990', 'flavioroberto@frprojetos.com.br', NULL, '2014-08-22 20:54:32', 1408733672, '', 1, '0'),
(70, NULL, 'Flavio Augusto Almeida Valones Xavier', NULL, 0, NULL, '033.808.494-05', '1979-10-29', 10, 'Rua Vereador JosÃ© Francisco de Figueiredo', '54', '', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-408', '', '(83)8105-2315', 'flavioaugusto@gmail.com', NULL, '2014-08-22 20:56:40', 1408733800, '', 1, '0'),
(71, NULL, 'Francisco Edurardo Dias da Silva', NULL, 0, NULL, '059.833.494-73', '1985-07-12', 7, 'R. Alaide Gomes da Silva', '108', '', 'Jose Americo', 'JoÃ£o Pessoa', '0', '', '', '', 'fr_eduardosilva@hotmail.com', NULL, '2014-08-22 20:58:44', 1408733924, '', 1, '0'),
(72, NULL, 'Fabiano Queiroz de Souza', NULL, 0, NULL, '007.637.744-05', '1979-08-08', 8, 'Avenida Sergipe', '202', '', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-190', '', '(83)9629-7374', 'queirozero@yahoo.com.br', NULL, '2014-08-22 21:06:00', 1408734360, '', 1, '0'),
(73, NULL, 'Franklin Williams O. de Souza', NULL, 0, NULL, '885.956.414-04', '1973-03-12', 3, 'R.Jose Aurelio de Oliveira', '105', 'Apto.105', '', '', '0', '', '', '(83)8810-7809', 'franklinwilliams.sousa@gmail.com', NULL, '2014-08-22 21:09:02', 1408734542, '', 1, '0'),
(74, '29082014135356.jpg', 'Fernando Trevas Falcone', '', 0, '', '569.481.154-20', '1965-02-16', 2, 'R.Geraldo Costa', '573', '', '', '', '0', '', '', '(83)9342-2819', '', '', '2014-08-22 21:10:34', 1408734634, '', 1, '0'),
(75, NULL, 'Fatima Almeida Wanderley', NULL, 0, NULL, '140.963.744-15', '1954-01-01', 1, 'Rua Nevinha Gondim de Oliveira', '66', 'Apto.1001', 'Brisamar', 'JoÃ£o Pessoa', 'PB', '58033-070', '', '', '', NULL, '2014-08-22 21:12:15', 1408734735, '', 1, '0'),
(76, NULL, 'Fabio de Freitas Pereira', NULL, 0, NULL, '160.090.454-87', '1955-08-21', 8, 'R.Teotonio Villela', '205', '', 'jardim oasis', 'Cajazeiras', '0', '', '(83)9133-5496', '(83)9136-8253', 'fabiofpereira@hol.com', NULL, '2014-08-22 21:17:47', 1408735067, '', 1, '0'),
(77, NULL, 'Fabio Geovanni Chavier', NULL, 0, NULL, '027.417.774-97', '1978-07-31', 7, 'Rua Severino AtaÃ­de CÃ¢ndido', '55', '', 'BancÃ¡rios', 'JoÃ£o Pessoa', 'PB', '58051-127', '(83)4141-1575', '(83)9921-9318', 'fabio_civil@yahoo.com.br', NULL, '2014-08-22 21:23:38', 1408735418, '', 1, '0'),
(78, NULL, 'Fabiana Maria Monteiro Regis', NULL, 0, NULL, '826.858.004-68', '1972-10-18', 10, '', '', '', '', '', '0', '', '', '', 'fabianaregis@cabedelo.pb.gov.br', NULL, '2014-08-22 21:25:20', 1408735520, '', 1, '0'),
(79, NULL, 'Guilherme Hobi Martins', NULL, 0, NULL, '030.361.454-43', '1978-12-27', 12, 'Rua Leonor Viana de Souza Carvalho', '174', 'casa 118', 'PoÃ§o', 'Cabedelo', 'PB', '58101-462', '', '(83)9921-3336', 'guihobi@gmail.com', NULL, '2014-08-22 21:28:00', 1408735680, '', 1, '0'),
(80, NULL, 'Gisely Gomes de Morais', NULL, 0, NULL, '073.391.934-05', '1989-02-04', 2, 'Rua Rio Grande do Sul', '273', '', 'Popular', 'Santa Rita', 'PB', '58301-355', '', '(83)8610-4240', 'gisely_morais@autlook.com', NULL, '2014-08-22 21:29:44', 1408735784, '', 1, '0'),
(81, NULL, 'Giovanni Cavalcante de p. Marques', NULL, 0, NULL, '110.493.164-87', '1952-04-14', 4, 'R.Agenor Lacet', '100', 'Apto 601-A', '', '', '0', '', '(83)3225-2828', '(83)9983-5844', 'giovannimarques7@hotmail.com', NULL, '2014-08-22 21:41:09', 1408736469, '', 1, '0'),
(82, '25082014125404.jpg', 'Evandro Mendes Braga', '', 70, '', '044.744.864-49', '1943-11-29', 11, 'Rua Presidente Roosevelt', '128', 'Apto.102', 'ExpedicionÃ¡rios', 'JoÃ£o Pessoa', 'PB', '58040-730', '(83)3225-1990', '(83)9342-9060', '', '', '2014-08-25 12:53:08', 1408963988, '', 1, '0'),
(83, '27082014135913.jpg', 'Geci Camargo Vargas', '', 0, '', '', '1950-03-03', 3, 'R.Desportista Aurelio Rocha', '485', '', '', '', '0', '', '(83)3243-7032', '(83)8881-2118', 'gecicamargo@gmail.com', '', '2014-08-25 13:20:18', 1408965618, '', 1, '0'),
(84, NULL, 'Gustavo Leal Coutinho', NULL, 0, NULL, '087.987.154-70', '1990-03-22', 3, 'Avenida EsperanÃ§a', '90', 'Apto. 1701', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-280', '', '(83)8878-2030', '', NULL, '2014-08-25 13:28:51', 1408966131, '', 1, '0'),
(85, NULL, 'Gianni Petrucce Lacerda e Silva', NULL, 0, NULL, '047.907.844-01', '1983-10-03', 10, 'R. Francisco Brandao', '746', '', '', '', '0', '', '', '(83)9136-0534', 'giannipetrucce@gmail.com', NULL, '2014-08-25 13:30:49', 1408966249, '', 1, '0'),
(86, NULL, 'Giovanna Xavier de Araujo', NULL, 0, NULL, '', '1999-05-03', 5, 'R.Joao Augusto Braga', '73', '', 'Jardim Oasis', 'Cajazeiras', '0', '', '', '', '', NULL, '2014-08-25 13:37:23', 1408966643, '', 1, '0'),
(87, NULL, 'Gilvan da Silva Leite Filho', NULL, 0, NULL, '854.495.474-04', '1972-02-19', 2, 'R.Oceano Ãndico', '57', '', '', 'JoÃ£o Pessoa', '0', '', '', '(83)8890-7726', 'gilban19ml@gmail.com', NULL, '2014-08-25 13:39:40', 1408966780, '', 1, '0'),
(88, NULL, 'Hermani Felinto de Brito', NULL, 0, NULL, '112.512.804-63', '1955-03-13', 3, 'R.Jose Simoes de Araujo', '967', 'Apto.503', 'Bessa', 'JoÃ£o Pessoa', '0', '', '', '', 'hfblinto@terra.com.pb', NULL, '2014-08-25 13:42:24', 1408966944, '', 1, '0'),
(89, '26082014160201.jpg', 'Iara Nobrega Ribeiro', '', 0, '', '291.694.374-91', '0000-00-00', 0, 'Avenida Pombal', '', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '58038-242', '', '(83)9983-6881', 'iaranobrega@hotmail.com', '', '2014-08-25 13:43:52', 1408967032, '', 1, '0'),
(90, NULL, 'Iryna Maria Oliveira', NULL, 0, NULL, '', '1999-08-07', 8, 'R.Randal C.Pimentel', '53', '', 'Bessa', 'JoÃ£o Pessoa', '0', '', '', '(83)8866-6979', 'iryna_oliveira@hotmail.com', NULL, '2014-08-25 13:45:28', 1408967128, '', 1, '0'),
(91, NULL, 'Illyana Marques Machado', NULL, 0, NULL, '077.385.354-58', '1990-09-04', 9, 'Rua Comerciante FÃ©lix Cahino (Lot Paratibe)', '260', 'casa 131', 'Valentina de Figueiredo', 'JoÃ£o Pessoa', 'PB', '58064-727', '', '', '', NULL, '2014-08-25 13:49:37', 1408967377, '', 1, '0'),
(92, NULL, 'Igor GuimarÃ£es', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8849-2009', '', NULL, '2014-08-25 14:00:07', 1408968007, '', 1, '0'),
(93, NULL, 'Iria R.Lima Freitas', NULL, 0, NULL, '', '0000-00-00', 0, 'R.Rio Grande do Sul', '', '', '', '', '0', '', '(83)3045-0287', '', '', NULL, '2014-08-25 14:01:39', 1408968099, '', 1, '0'),
(94, '27082014211521.jpg', 'Joquim Agapito Rodrigues (mÃ£e Shirley)', '', 0, '', '', '2014-04-18', 4, 'R. Francisca Dantas Souza', '129', 'Apto.102', 'Mangabeira', 'JoÃ£o Pessoa', '0', '58055-000', '(83)8667-4563', '', '', '', '2014-08-25 14:16:15', 1408968975, '', 1, '0'),
(95, NULL, 'Jamerson Oliveira das Neves', NULL, 0, NULL, '', '1972-11-23', 11, 'R. Flavio de Melo Uchoa,', '50', 'Apto.102', 'Aeroclube', 'JoÃ£o Pessoa', '0', '', '', '(83)8806-8297', 'jamerson@networkservice.net', NULL, '2014-08-25 14:35:34', 1408970134, '', 1, '0'),
(96, NULL, 'Janete Santos Galdino ', NULL, 0, NULL, '690.055.324-91', '1969-12-02', 12, 'Av.Mar da Siberia', '160', 'Apto.102', 'Intermares', 'JoÃ£o Pessoa', '0', '', '', '(83)8807-2116', '', NULL, '2014-08-25 14:38:34', 1408970314, '', 1, '0'),
(97, NULL, 'Jackeliny Martins N.Kalkmann', NULL, 0, NULL, '', '0000-00-00', 0, 'R. Cleonice de Oliveira Pinto ', '68', '', 'Agua Fria', 'JoÃ£o Pessoa', '0', '', '(83)9817-2014', '(83)8842-0554', 'tenentejack@gmail.com', NULL, '2014-08-25 14:41:45', 1408970505, '', 1, '0'),
(98, '26082014144054.jpg', 'Jacinta Marta Farias MendonÃ§a', '', 0, '', '110.705.104-59', '1952-03-04', 3, 'Rua EscrivÃ£o SebastiÃ£o de Azevedo Bastos', '190', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '58038-490', '(83)3246-1802', '(83)8898-9420', 'jmf.mendonÃ§a@hotmail.com', '', '2014-08-25 14:45:11', 1408970711, '', 1, '0'),
(99, NULL, 'Jordan Costa', NULL, 0, NULL, '888.378.154-68', '1976-12-26', 12, 'Rua JosuÃ© Guedes Pereira', '202', 'Apto.202', 'Bessa', 'JoÃ£o Pessoa', '0', '58035-040', '(83)3224-7633', '(83)8610-4225', 'jordanjpb@hotmial.', NULL, '2014-08-25 14:47:42', 1408970862, '', 1, '0'),
(100, NULL, 'Jessica Maria Rolim Viera', NULL, 0, NULL, '082.284.824-03', '1990-04-27', 4, 'Av.Amazonas ', '89', '', 'a', 'Apto. 204', '0', '', '(83)9905-5080', '(83)9127-0475', 'jessica.vieira2704@hotmail.com', NULL, '2014-08-25 14:56:38', 1408971398, '', 1, '0'),
(101, NULL, 'Jeanine Silva de Oliveira', NULL, 0, NULL, '018.943.244-63', '1975-10-01', 10, 'Rua Professora Alice Azevedo', '153', '', 'Centro', 'JoÃ£o Pessoa', 'PB', '58013-480', '(83)3222-6942', '(83)9926-1193', '', NULL, '2014-08-25 14:59:40', 1408971580, '', 1, '0'),
(102, NULL, 'Jose Gerardo Maia Aguiar', NULL, 0, NULL, '181.560.864-53', '1959-08-25', 8, 'Avenida Presidente EpitÃ¡cio Pessoa', '1405', '', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-001', '(83)3244-7392', '(83)8607-7777', '6k.aguias@hotmail.com', NULL, '2014-08-25 15:02:17', 1408971737, '', 1, '0'),
(103, NULL, 'Janaina de Freitas', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8818-2906', '', NULL, '2014-08-25 15:02:51', 1408971771, '', 1, '0'),
(104, NULL, 'Jean Clarindo de Almeida', NULL, 0, NULL, '676.828.474-68', '1969-08-19', 8, 'Av.Desem.Hilton Souto Maior', '6701', '', '', '', '0', '', '(83)3251-1124', '(83)8889-3480', 'jean.clarindo@uol.com.br', NULL, '2014-08-25 15:05:44', 1408971944, '', 1, '0'),
(105, NULL, 'Jose Kehrle', NULL, 0, NULL, '003.281.034-20', '1941-11-10', 11, 'Rua Fernando Luiz Henrique dos Santos', '1988', '', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-051', '(83)3246-3113', '(83)8749-1636', 'inoveconstrucoes@homi.br', NULL, '2014-08-25 15:07:46', 1408972066, '', 1, '0'),
(106, NULL, 'Joao Alves Feitosa ', NULL, 0, NULL, '971.612.847-91', '1964-12-03', 12, 'Rua Bacharel Wilson FlÃ¡vio Moreira Coutinho', '194', '', 'Jardim Cidade UniversitÃ¡ria', 'JoÃ£o Pessoa', 'PB', '58052-510', '', '', 'picesfeitosa@yahoo', NULL, '2014-08-25 15:14:01', 1408972441, '', 1, '0'),
(107, NULL, 'Jose Tadeu Filgueiras de Souza', NULL, 0, NULL, '059.421.014-34', '0000-00-00', 40, 'R.Profor Batista Leite', '276', '', 'Roger', '', '0', '', '', '(83)9988-1706', '', NULL, '2014-08-25 15:16:23', 1408972583, '', 1, '0'),
(108, NULL, 'Jose T. Marques Neves', NULL, 0, NULL, '039.994.594-68', '1948-10-12', 10, 'R.Jose Guedes de Sa de Filho', '136', '', '', '', '0', '', '(83)8833-2287', '', 'zenildneves@bol.com', NULL, '2014-08-25 15:25:38', 1408973138, '', 1, '0'),
(109, NULL, 'Jose Leonardo de Brito', NULL, 0, NULL, '018.945.184-03', '1977-04-09', 4, '', '', '', '', '', '0', '', '(83)8780-3680', '(83)9905-5870', 'jpaleonardo@hotmail.com', NULL, '2014-08-25 15:28:36', 1408973316, '', 1, '0'),
(110, NULL, 'JossÃ©lly Albuquerque de Medeiros', NULL, 0, NULL, '', '1984-04-28', 4, '', '', '', '', '', '0', '', '(83)8720-7120', '(83)9950-0021', 'josselly_4@hotmail.com', NULL, '2014-08-25 16:16:44', 1408976204, '', 1, '0'),
(111, NULL, 'Johan Carlos Diniz GonÃ§alves', NULL, 0, NULL, '768.743.974-00', '1971-02-11', 2, 'Rua Joaquim Borba Filho', '344', '', 'Jardim SÃ£o Paulo', 'JoÃ£o Pessoa', 'PB', '58053-110', '', '(83)9913-0238', 'jigdiniz@ig.com', NULL, '2014-08-25 16:18:52', 1408976332, '', 1, '0'),
(112, NULL, 'Jose Armando de Macedo', NULL, 0, NULL, '874.399.137-87', '1964-08-12', 8, 'R.Vandick Pinto', '610', 'Apto. 405', 'tambauzinho', 'JoÃ£o Pessoa', '0', '', '(83)3225-3693', '(83)8825-3396', '', NULL, '2014-08-25 16:20:59', 1408976459, '', 1, '0'),
(113, NULL, 'Karllene Rachel C. Belchior', NULL, 0, NULL, '038.883.564-82', '1982-02-13', 2, 'R. Est.Thiago Ozanan', '60', '', '', 'JoÃ£o Pessoa', '0', '', '', '(83)9622-5161', 'kalcho@gmail.com', NULL, '2014-08-25 16:26:35', 1408976795, '', 1, '0'),
(114, NULL, 'Karine Ximenes Monteiro', NULL, 0, NULL, '068.708.874-70', '1986-11-20', 11, 'Rua Eutiquiano Barreto', '251', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-310', '', '(83)8889-2011', 'ka_ximenes@hotmail.com', NULL, '2014-08-25 16:39:22', 1408977562, '', 1, '0'),
(115, NULL, 'Keli Cristina A.Oliveira', NULL, 0, NULL, '010.353.154-83', '1981-07-07', 7, 'Rua AntÃ´nio Vieira da Silva', '', '', 'Jardim SÃ£o Paulo', 'JoÃ£o Pessoa', 'PB', '58053-175', '', '(83)8817-5156', 'kelicris2@hotmail.com', NULL, '2014-08-25 16:41:19', 1408977679, '', 1, '0'),
(116, NULL, 'Karoline de Medeiros LoureÃ§o', '', 0, NULL, '467.893.754-49', '1997-11-25', 11, 'R.Eng.Franklin P. da Silva', '181', '', 'CuiÃ¡', '', '0', '', '(83)3237-4023', '(83)8727-2669', 'romildo.jp@gmail.com', '', '2014-08-25 16:45:18', 1408977918, '', 1, '0'),
(117, NULL, 'Kleber da Silva Barros', NULL, 0, NULL, '030.586.674-50', '1980-11-13', 11, 'R. Mar Gaspio', '348', 'Apto 104', 'Intermares-Cabedelo', '', '0', '', '(83)8751-4943', '', 'klerios@hotmail.com', NULL, '2014-08-25 16:47:53', 1408978073, '', 1, '0'),
(118, NULL, 'Katia Regina', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)9838-5353', '', NULL, '2014-08-25 16:48:47', 1408978127, '', 1, '0'),
(119, NULL, 'Lucas Fernandes C. de Almeida', NULL, 0, NULL, '', '1994-07-18', 7, 'Av.Hilton Souto Maior', '6701', '', '', '', '0', '', '(83)3251-1124', '(83)8790-9695', 'lucas_jp@hotmail.com', NULL, '2014-08-25 19:04:26', 1408986266, '', 1, '0'),
(120, NULL, 'Luiza Helena Freire Martins', NULL, 0, NULL, '587.667.744-20', '1968-09-28', 9, 'R.Com.Jose E. de Andrade', '190', '', '', '', '0', '', '', '(83)8798-3400', '', NULL, '2014-08-25 19:06:33', 1408986393, '', 1, '0'),
(121, NULL, 'Lucia de Fatima Freire de Araujo', NULL, 0, NULL, '437.078.234-15', '1965-12-24', 12, 'Rua Sargento Adahylton Pontes de Lima', 'bloco p5', 'Apto.302', 'Mangabeira', 'JoÃ£o Pessoa', 'PB', '58058-260', '(83)8816-4155', '(83)9652-1928', 'lucia.chunha@hotmail.com', NULL, '2014-08-25 19:08:46', 1408986526, '', 1, '0'),
(122, NULL, 'Liege Cordeiro de Morais', NULL, 0, NULL, '872.372.374-20', '1974-02-23', 2, 'R.Severino Pereira de Araujo', '151', 'Apto.702', 'manaira', 'JoÃ£o Pessoa', '0', '', '', '(83)8749-1437', 'liege.cordeiro09.@gmail.com', NULL, '2014-08-25 19:16:55', 1408987015, '', 1, '0'),
(123, NULL, 'Laudenice de Lucena Pereira', NULL, 0, NULL, '953.832.044-15', '1978-02-28', 2, 'R. Prof. Alvaro de Carvalho', '111', 'Apto.301', 'tambauzinho', 'JoÃ£o Pessoa', '0', '', '', '(83)8828-8160', 'nicelucena@hotmail.com', NULL, '2014-08-25 19:19:38', 1408987178, '', 1, '0'),
(124, '29082014135155.jpg', 'Luiza Helena JapiassÃº Marinho', '', 0, '', '650.960.024-20', '1961-08-10', 8, 'Rua Geraldo Costa', '973', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '58038-130', '', '(83)9979-6710', 'luizal+1mrinho@gmail.com', '', '2014-08-25 19:22:22', 1408987342, '', 1, '0'),
(125, NULL, 'Lucas Barbosa Magalhaes', NULL, 0, NULL, '075.698.484-03', '1996-12-17', 12, 'Av.Rio Grande do Sul', '1600', '', 'Bairro dos Estados', 'JoÃ£o Pessoa', '0', '', '(83)3042-0385', '', '', NULL, '2014-08-25 19:24:11', 1408987451, '', 1, '0'),
(126, NULL, 'Lohanna Leticia S. Oliveira                                 (FUSEX)', NULL, 0, NULL, '', '1997-03-29', 3, 'Av.Jose Tavares Benevides', '108', '', '', '', '0', '', '(83)3246-0010', '(83)9968-4129', 'silviabusatoo@gmail.com', NULL, '2014-08-25 19:26:37', 1408987597, '', 1, '0'),
(127, NULL, 'Luiz Firmo Ferraz Filho', '', 59, NULL, '105.224.844-68', '1955-12-25', 12, 'Rua D&eacute;bora da Silva Braga', '375', 'Apto 705', 'Aeroclube', 'Jo&atilde;o Pessoa', 'PB', '58036-843', '(83)3245-7318', '(83)9987-2717', 'firmo.ferraz@uol.com.br', '', '2014-08-25 19:29:06', 1408987746, '', 1, ''),
(128, NULL, 'Lorena Oliveira', NULL, 0, NULL, '057.506.824-80', '1984-03-21', 3, 'R.Randal C.Pimentel', '53', '', 'Bessa', 'JoÃ£o Pessoa', '0', '', '', '(83)8892-4836', 'lorena_oliv@hotmail.com', NULL, '2014-08-25 19:31:48', 1408987908, '', 1, '0'),
(129, '26082014185838.jpg', 'Lorena Azevedo Ghersel', '', 0, '', '010.160.891-80', '1990-09-01', 9, 'Avenida Oceano Ãndico', '26', 'Apto.601', 'Intermares', 'Cabedelo', '0', '58102-222', '(83)8806-2010', '(83)9693-8513', 'lorena_ghersel@hotmail.com', '', '2014-08-25 19:33:28', 1408988008, '', 1, '0'),
(130, NULL, 'Leila de Cassia Tavares da Fonseca', NULL, 0, NULL, '840.960.474-49', '1975-04-07', 4, 'Rua CecÃ­lia Rodrigues Siqueira', '1535', '', 'Jardim Cidade UniversitÃ¡ria', 'JoÃ£o Pessoa', 'PB', '58051-830', '', '(83)8899-5105', 'leilafonsecarr@hotmail.com', NULL, '2014-08-25 19:36:02', 1408988162, '', 1, '0'),
(131, NULL, 'Luis Gomes Frade', NULL, 0, NULL, '', '1957-09-13', 9, '', '', '', '', '', '0', '', '', '(83)8722-2122', '', NULL, '2014-08-25 19:36:36', 1408988196, '', 1, '0'),
(132, NULL, 'Luciana Maria da Silva', NULL, 0, NULL, '039.296.254-31', '1981-01-23', 1, 'R.Com.Joao R.de Lima', '415', '', '', 'JoÃ£o Pessoa', '0', '', '', '(83)8826-3161', 'lucianamsa@hotmail.com', NULL, '2014-08-25 19:40:04', 1408988404, '', 1, '0'),
(133, NULL, 'luis Andre Ferreira Quaresma', NULL, 0, NULL, '503.948.864-53', '1966-10-13', 10, '', '', '', '', '', '0', '', '(83)8742-1708', '(83)9943-8352', 'luisandre.quaresma@hotmail.com', NULL, '2014-08-25 19:41:40', 1408988500, '', 1, '0'),
(134, NULL, 'Leonardo Moreira Dantas', NULL, 0, NULL, '024.413.914-88', '1976-07-11', 7, 'Rua Luiz Edir Queiroz Marinho', '168', '', 'Aeroclube', 'JoÃ£o Pessoa', 'PB', '58036-435', '', '(83)9332-0139', 'leomeira.aulas@gmail.com', NULL, '2014-08-25 19:43:48', 1408988628, '', 1, '0'),
(135, NULL, 'Lucinea Albuquerque de Silva', NULL, 0, NULL, '558.698.312-53', '1948-02-04', 2, 'Rua Huerta Ferreira de Melo', '95', '', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-245', '(83)8721-2058', '(83)9979-2058', '', NULL, '2014-08-25 19:46:42', 1408988802, '', 1, '0'),
(136, NULL, 'Laura de Liziuex Lira', NULL, 0, NULL, '086.948.934-87', '1949-09-26', 9, 'R.Dsemb.Toledo', '73', '', 'Bairro dos Estados', 'JoÃ£o Pessoa', '0', '', '(83)3224-7390', '', 'lauralira85@hotmail.com', NULL, '2014-08-25 19:57:19', 1408989439, '', 1, '0'),
(137, NULL, 'Lara Helena GuimarÃ£es Veras (mae Rosa)', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8897-8902', '', NULL, '2014-08-25 19:58:39', 1408989519, '', 1, '0'),
(138, NULL, 'Luciano Joaquim da Silva', NULL, 0, NULL, '009.891.334-43', '1980-11-10', 11, 'R.professor Agolo MendonÃ§a', '110', '', '', '', '0', '', '(83)8831-4778', '(83)9676-2602', 'luvmec@gmail.com', NULL, '2014-08-25 20:02:29', 1408989749, '', 1, '0'),
(139, NULL, 'Luzivalda Guedes Damasco', '', 0, NULL, '059.989.004-56', '1986-09-06', 9, 'Rua Padre JosÃ© Coutinho', '161', '', 'MunicÃ­pios', 'Santa Rita', 'PB', '58303-230', '', '(83)9623-1064', 'luzivaldaguedes@gmail.com', '', '2014-08-25 20:15:32', 1408990532, '', 1, '0'),
(140, NULL, 'Luiz Aluizio de Oliveira', NULL, 0, NULL, '', '1961-09-14', 9, 'R.Francisco Tavares de Oliveira', '58', '', '', '', '0', '', '', '(83)8761-2571', '', NULL, '2014-08-25 20:19:18', 1408990758, '', 1, '0'),
(141, NULL, 'Luis Filipe Leros', NULL, 0, NULL, '704.149.311-30', '1975-07-04', 7, 'R.Maria Helena Rocha', '113', '', '', '', '0', '', '', '(83)9964-4635', 'luis.traimne75@gmail.com', NULL, '2014-08-25 20:22:24', 1408990944, '', 1, '0'),
(142, NULL, 'Matilde Goncalves de Lacerda', NULL, 0, NULL, '', '1950-11-27', 11, 'R.Francisca Brandao ', '105', 'Apto.746', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '', '(83)9127-9728', '(83)9136-0534', '', NULL, '2014-08-25 20:30:09', 1408991409, '', 1, '0'),
(143, NULL, 'Miguel Alberto Solla                                                             (FUSEX)', NULL, 0, NULL, '702.905.034-77', '0000-00-00', 0, 'Rua Desembargador Joaquim da Silva Carvalho', '173', '', 'Jardim Oceania', 'JoÃ£o Pessoa', '0', '58037-135', '', '(83)9952-7663', '', NULL, '2014-08-25 20:33:48', 1408991628, '', 1, '0'),
(144, NULL, 'Maria Elisa S.Oliveira', NULL, 0, NULL, '528.769.181-53', '1965-12-16', 12, 'Rua Enfermeira Ana Maria Barbosa de Almeida', '1240', 'bloco b. apto.403', 'Jardim Cidade UniversitÃ¡ria', 'JoÃ£o Pessoa', '0', '58052-270', '(83)3507-3892', '(83)8650-8474', 'marelisa_40@hotmail.com', NULL, '2014-08-25 20:54:34', 1408992874, '', 1, '0'),
(145, NULL, 'Michael Pieper', NULL, 0, NULL, '015.195.774-60', '1970-05-18', 5, 'Rua Huerta Ferreira de Melo', '95', '', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-245', '', '(83)8897-8810', 'mpiper@ibait.de', NULL, '2014-08-25 20:57:14', 1408993034, '', 1, '0'),
(146, NULL, 'Marcus Vinicius Bellini                                (FUSEX)', NULL, 0, NULL, '721.989.906-87', '1967-12-13', 12, 'Rua Laurimar Rafael Santos', '', '', 'Bessa', 'JoÃ£o Pessoa', 'PB', '58035-240', '(83)3576-5348', '(83)9172-7950', 'marcusvbellini@yahoo.com.br', NULL, '2014-08-25 21:00:33', 1408993233, '', 1, '0'),
(147, NULL, 'Maria Marta Falcao                                             FUSEX', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8862-2006', '', '', '2014-08-25 21:01:20', 1408993280, '', 1, ''),
(148, NULL, 'Maria Dantas de Souza', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)3232-2907', '', '', NULL, '2014-08-25 21:02:10', 1408993330, '', 1, '0'),
(149, NULL, 'Maria do Socorro Cartaxo Trigueiro', NULL, 0, NULL, '087.097.344-49', '1976-12-08', 12, 'R.Major Ciraulo', '745', '', 'ManaÃ­ra', '', '0', '', '(83)3247-3595', '(83)8743-3036', '', NULL, '2014-08-25 21:07:58', 1408993678, '', 1, '0'),
(150, NULL, 'Marcos Otavio Correia', NULL, 0, NULL, '407.802.364-91', '1964-03-18', 3, 'Avenida Ãndio Arabutan', '161', '', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-040', '(83)3226-5568', '(83)8866-2541', 'marcosocorreia@yahoo.com', NULL, '2014-08-25 21:10:13', 1408993813, '', 1, '0'),
(151, NULL, 'Maria Aparecida Torres Diniz de Almeida', NULL, 0, NULL, '109.843.994-53', '1953-06-02', 6, 'Rua Manoel Madruga', '163', '', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-214', '(83)8802-6091', '(83)8802-6172', 'aparecidadiniz@provide-neorg.br', NULL, '2014-08-25 21:16:10', 1408994170, '', 1, '0'),
(152, NULL, 'Maria Rosa Dantas', NULL, 0, NULL, '', '1959-05-05', 5, 'Rua Osvaldo Cruz', '', '', 'Imaculada', 'Bayeux', 'PB', '58309-490', '(83)3232-2907', '', '', NULL, '2014-08-25 21:17:20', 1408994240, '', 1, '0'),
(153, NULL, 'Maria Jose Conceicao V.', NULL, 0, NULL, '202.869.294-49', '1957-02-08', 2, 'Av. EsperanÃ§a', '1023', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '', '(83)3226-3491', '(83)8821-8222', '', NULL, '2014-08-25 21:20:06', 1408994406, '', 1, '0'),
(154, NULL, 'Maria de Lourdes Batista Vale', NULL, 0, NULL, '542.290.495-87', '1969-06-28', 6, 'Rua JoÃ£o CÃ¢ncio', '1831', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-342', '(83)8764-2320', '(83)9986-7286', 'llubatistavale@hotmail', NULL, '2014-08-25 21:22:02', 1408994522, '', 1, '0'),
(155, '26082014142145.jpg', 'Camila Macedo                      (FUSEX)', '', 0, '', '', '1985-09-08', 9, 'Rua Nossa Senhora dos Navegantes', '426', 'Apto.501', 'TambaÃº', 'JoÃ£o Pessoa', '0', '58039-111', '', '(83)9990-2000', 'cacamerces@hotmail.com', '', '2014-08-25 21:31:21', 1408995081, '', 1, '0'),
(156, '26082014163254.jpg', 'Vitor Hugo Peixoto Castelliano', '', 0, '', '839.733.544-72', '1973-12-29', 12, 'R.Golfo de amundsen', '51', 'Apto303', '', 'JoÃ£o Pessoa', '0', '', '(83)8800-0975', '', 'voucomuitor@hotmail.com', '', '2014-08-25 21:32:54', 1408995174, '', 1, '0'),
(157, NULL, 'Maria Jose Lins Silva', NULL, 0, NULL, '707.645.224-34', '1967-05-15', 5, 'R.Tabeliao E.Nunes de Oliveira', '170', '', '', '', '0', '', '(83)3255-6113', '(83)8719-2565', 'marialins08@bol.com', NULL, '2014-08-25 21:48:54', 1408996134, '', 1, '0'),
(158, NULL, 'Maria Sonia de Carvalho Rodrigues', NULL, 0, NULL, '727.322.704-82', '1933-07-14', 7, 'Rua Deputado Barreto Sobrinho', '300', '', 'TambiÃ¡', 'JoÃ£o Pessoa', 'PB', '58020-680', '(83)3221-3619', '(83)9113-8581', '', NULL, '2014-08-25 21:50:41', 1408996241, '', 1, '0'),
(159, NULL, 'Marcelo Antonio Pontes de Araujo', '', 48, NULL, '467.726.264-00', '1966-07-25', 7, 'R.Av.Sao Paulo', '1162', '', 'Estados', 'joao pessoa', '0', '', '', '(83)8861-1233', 'marcelopontes@araujopontes.com', '', '2014-08-25 22:01:51', 1408996911, '', 1, '0'),
(160, NULL, 'Maria Aurileide R.Lobo', NULL, 0, NULL, '245.972.103-00', '1965-11-08', 11, 'Rua Vigolvino Florentino Costa', '549', 'Apto.1501', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-580', '', '(83)8885-0811', 'naya80@ig.com.br', NULL, '2014-08-25 22:16:06', 1408997766, '', 1, '0'),
(161, NULL, 'Maria Violeta Silveira', NULL, 0, NULL, '038.795.184-91', '1938-01-24', 1, 'Avenida Presidente GetÃºlio Vargas', '109', 'Apto.908', 'Centro', 'JoÃ£o Pessoa', 'PB', '58013-240', '(83)3221-3458', '(83)9979-1268', 'violetasilveirafs@hotmail.com', NULL, '2014-08-25 22:17:58', 1408997878, '', 1, '0'),
(162, NULL, 'Maria Leticia de S. Lucena Costa', NULL, 0, NULL, '', '1957-06-03', 6, 'Rua Deputado NapoleÃ£o Abdon da NÃ³brega', '212', '', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-225', '(83)3566-1873', '(83)8735-5297', '', NULL, '2014-08-25 22:20:07', 1408998007, '', 1, '0'),
(163, NULL, 'Maria Auxiliadora M. de Oliveira      (FUSEX)', NULL, 0, NULL, '885.205.364-68', '1954-08-21', 8, 'Rua Francisco TimÃ³teo de Souza', '945', '', 'AnatÃ³lia', 'JoÃ£o Pessoa', '0', '58052-130', '(83)8853-6936', '(83)8812-1503', '', NULL, '2014-08-25 22:21:44', 1408998104, '', 1, '0'),
(164, NULL, 'Maria Veronica', NULL, 0, NULL, '', '1963-02-23', 2, 'Rua JoÃ£o CÃ¢ncio', '1581', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-342', '', '(83)8801-1450', 'mariaveronica2004@yahoo.com.', NULL, '2014-08-25 22:23:29', 1408998209, '', 1, '0'),
(165, NULL, 'Maria Marter Soares Pereira', NULL, 0, NULL, '250.315.624-04', '1954-09-27', 9, 'R.Teotonio Villela', '205', '', 'jd Oasis', 'Cajazeiras', '0', '', '(83)8605-1545', '', '', NULL, '2014-08-25 22:25:18', 1408998318, '', 1, '0'),
(166, NULL, 'Marcia Helena Bolzan            (FUSEX)', NULL, 0, NULL, '071.347.647-88', '1977-01-14', 1, 'Rua GoiÃ¡s', '401', 'Apto.709', 'Estados', 'JoÃ£o Pessoa', '0', '58030-060', '', '(83)8180-0064', 'marciabolzan2008@hotmail.com', NULL, '2014-08-25 22:28:08', 1408998488, '', 1, '0'),
(167, NULL, 'Monica Alves Barros Ribeiro', NULL, 0, NULL, '441.662.574-04', '2002-10-18', 10, 'R. Jaime Carvalho Tavares de Melo', '1663', '', '', '', '0', '', '', '(83)9985-6907', 'monicabarros@hotmail.com', NULL, '2014-08-25 22:30:14', 1408998614, '', 1, '0'),
(168, NULL, 'Marcondes Alberto de Aquino Camelo', NULL, 0, NULL, '109.347.824-15', '1956-12-05', 12, 'Rua OzÃ³rio Queiroga de Assis', '541', 'Apto602', 'Bessa', 'JoÃ£o Pessoa', 'PB', '58035-050', '', '(83)9111-5983', '', NULL, '2014-08-25 22:39:50', 1408999190, '', 1, '0'),
(169, NULL, 'Maria Josenilda Vilar Ferreira', NULL, 0, NULL, '569.215.864-72', '1968-12-27', 12, 'R.Renato Teixeira Bastos', '120', '', '', '', '0', '', '(83)3239-6293', '(83)8827-4160', 'jo-vilar@hotmail.com', NULL, '2014-08-25 22:41:42', 1408999302, '', 1, '0'),
(170, NULL, 'Maria das Gracas F. Almeida', NULL, 0, NULL, '691.961.764-15', '1972-01-04', 1, 'Av.Hilton S. Maior', '6701', '', '', '', '0', '', '', '(83)8827-3480', 'madrecitagraca@hotmail.com', NULL, '2014-08-25 22:44:14', 1408999454, '', 1, '0'),
(171, NULL, 'Michelle Bezerra Gomes Pires', NULL, 0, NULL, '011.125.144-30', '1981-01-09', 1, 'Av.Pombal', '189', 'Apto.801', '', '', '0', '', '(83)9628-0350', '(83)9971-7190', 'mbgomes1@hotmail.com', NULL, '2014-08-25 22:46:02', 1408999562, '', 1, '0'),
(172, NULL, 'Maria Elizabeth Serrano Moreno Matias ', NULL, 0, NULL, '010.940.244-81', '1980-12-18', 12, 'Avenida da Fraternidade', '465', 'Apto.102', 'Cristo Redentor', 'JoÃ£o Pessoa', 'PB', '58070-310', '', '(83)8818-8536', 'bethmoreno25@yahoo.com', NULL, '2014-08-25 22:50:12', 1408999812, '', 1, '0'),
(173, NULL, 'Maryland Cabral T.Pereira', NULL, 0, NULL, '008.181.324-42', '1982-02-13', 2, 'BR-230 Km10', '11-B', 'Cond.Villas do Atlantico', 'Intermares', '', '0', '', '', '(83)8848-1010', 'marycabrallt@hotmail.com', NULL, '2014-08-25 22:53:36', 1409000016, '', 1, '0'),
(174, NULL, 'Marinalva Dantas de Souza', NULL, 0, NULL, '020.481.094-97', '1973-06-04', 6, 'R.Osvaldo Cruz', '299', '', 'Imaculada', 'bayeux', '0', '', '(83)3232-2907', '', '', NULL, '2014-08-26 13:09:14', 1409051354, '', 1, '0'),
(175, NULL, 'Maria Martha Ferreira Pires', NULL, 0, NULL, '357.778.427-04', '1948-01-17', 1, 'Av.N.S. dos Navegantes', '588', 'Apto.304', 'tambau', 'JoÃ£o Pessoa', '0', '', '', '(83)8660-1611', 'martha@yahoo.com.bh', NULL, '2014-08-26 13:46:37', 1409053597, '', 1, '0'),
(176, NULL, 'Marcos Antonio Cordeiro Meira', NULL, 0, NULL, '218.149.104-68', '1961-06-12', 6, 'Av.Mar Baltico', '489', 'Apto.402', '', '', '0', '', '', '(83)8809-1206', 'mcsportcas@hotmail.com', NULL, '2014-08-26 13:49:33', 1409053773, '', 1, '0'),
(177, NULL, 'Marcelo Henrique M.Labanca', NULL, 0, NULL, '097.007.914-16', '1990-04-11', 4, 'R.Bel Irenaldo ', '322', 'bloco D', '', '', '0', '', '', '(83)9945-2313', 'marcelo-labanca@hotmail.com', NULL, '2014-08-26 13:52:10', 1409053930, '', 1, '0'),
(178, NULL, 'Maria Jose Macedo da Silva', NULL, 0, NULL, '010.322.184-01', '1947-08-28', 8, 'R. Travessa General Vitorino', '27', '', '', '', '0', '', '(83)9345-3172', '(83)9984-0599', 'marciokaka@hotmail.com', NULL, '2014-08-26 13:56:17', 1409054177, '', 1, '0'),
(179, NULL, 'Maristela Barreto da Silva', NULL, 0, NULL, '429.268.144-15', '1962-10-22', 10, 'Rua Pedro Alves de Andrade', '500', '', 'Jardim SÃ£o Paulo', 'JoÃ£o Pessoa', 'PB', '58053-024', '(83)8608-8137', '(83)9129-5432', 'mateladasilva22@yahoo.com', NULL, '2014-08-26 13:59:41', 1409054381, '', 1, '0'),
(180, NULL, 'Marcia Scarselli Zago', NULL, 0, NULL, '293.878.761-87', '0000-00-00', 0, 'R.Mar CÃ¡spio', '37', 'Apto.201 ed.TibÃ©riades', '', '', '0', '', '(11)3337-6218', '(11)9954-6601', '', NULL, '2014-08-26 14:10:22', 1409055022, '', 1, '0'),
(181, NULL, 'Maria Luci Assis Dias', NULL, 0, NULL, '', '1940-11-30', 11, 'Rua AntÃ´nio Lustosa Cabral', '15', 'Apto.601', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-020', '(83)3227-0119', '(83)8765-2001', '', NULL, '2014-08-26 14:38:23', 1409056703, '', 1, '0'),
(182, NULL, 'Silvio de Azevedo Souza', NULL, 0, NULL, '219.884.124-04', '1959-05-04', 5, 'Rua Comerciante JosÃ© Miguel Neto (Cj Delegados)', '112', '', 'Jardim Cidade UniversitÃ¡ria', 'JoÃ£o Pessoa', 'PB', '58052-215', '', '(83)8811-9016', '', NULL, '2014-08-26 14:45:45', 1409057145, '', 1, '0'),
(183, '22052015074118.jpg', 'Maria Thereza da Cruz Netto Shuler', '', 0, '', '567.652.584-34', '1961-11-10', 11, 'Rua Presidente Roosevelt', '904', '', 'Expedicion&aacute;rios', 'Jo&atilde;o Pessoa', 'PB', '58040-730', '(83)9920-6680', '(83)8730-9961', 'mariatherezaschuler@gmail.com', '', '2014-08-26 14:49:24', 1409057364, '', 1, ''),
(184, '24042015110947.jpg', 'Maria de Fatima Xavier Araujo', '', 0, '', '176.227.194-04', '1954-09-29', 9, 'R.Joao Augusto Braga', '73', '', 'jd Oasis', 'Cajazeiras', '0', '', '(83)9109-3282', '(83)8670-0608', 'czfatimax@hotmail.com', '', '2014-08-26 14:51:47', 1409057507, '', 1, ''),
(185, NULL, 'Maria de Fatima de Moura', NULL, 0, NULL, '112.217.044-00', '1954-03-29', 3, 'Av.Rui Carneiro', '853', 'Apto.902', '', 'JoÃ£o Pessoa', '0', '', '', '(83)9924-9256', 'mouraf2006@eg.com', NULL, '2014-08-26 14:53:46', 1409057626, '', 1, '0'),
(186, NULL, 'Maria das Gracas de O.R.Taboso', NULL, 0, NULL, '323.638.774-20', '1960-10-01', 10, 'Rua Coronel Miguel Satyro', '280', '', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-110', '(83)3246-8568', '(83)9997-1313', 'frmtoterra.com.br', NULL, '2014-08-26 14:55:32', 1409057732, '', 1, '0'),
(187, NULL, 'Milena Leal Maximo', NULL, 0, NULL, '033.264.934-28', '0000-00-00', 0, 'BR-230 Km10', '14', 'Cond.Vilas do Atlantico', '', 'Cabedelo', '0', '', '', '(83)9162-6909', '', NULL, '2014-08-26 14:58:55', 1409057935, '', 1, '0'),
(188, NULL, 'Maria JaidÃ© Costa da Nobrega', NULL, 0, NULL, '094.901.404-49', '1947-07-16', 7, 'R.Cristovao Colombo', '90', '', '', '', '0', '', '', '', '', NULL, '2014-08-26 15:00:23', 1409058023, '', 1, '0'),
(189, '26082014195540.jpg', 'Nobu Adachi', '', 0, '', '', '1932-12-20', 12, 'R. Sao Sebastiao', '53', '', '', '', '0', '', '(83)3222-1760', '(83)8829-1142', 'cristinadachi@gmail.com', '', '2014-08-26 15:04:24', 1409058264, '', 1, '0'),
(190, NULL, 'NinÃ¡ Marques de Araujo', NULL, 0, NULL, '396.556.874-49', '1945-09-22', 9, 'Avenida Acre', '691', 'Apto.401', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-230', '', '(83)8801-0366', 'marques.nina@gmail.com', NULL, '2014-08-26 15:07:36', 1409058456, '', 1, '0'),
(191, NULL, 'NoÃ© Lima Cavalcante', NULL, 0, NULL, '089.066.024-72', '2012-07-10', 7, 'R.Adolfo Loureiro FranÃ§a', '300', '', '', '', '0', '', '', '(83)8846-3333', '', NULL, '2014-08-26 15:09:42', 1409058582, '', 1, '0'),
(192, NULL, 'Niccoly de Macedo Costa', NULL, 0, NULL, '089.247.684-25', '1991-04-02', 4, 'Av. Bahia', '763', '', 'Estados', 'JoÃ£o Pessoa', '0', '', '(83)3225-1370', '(83)9670-1209', 'niccolydemacedocosta@hotmail.com', NULL, '2014-08-26 15:48:47', 1409060927, '', 1, '0'),
(193, NULL, 'Omar Hugo Martinez', 'M', 0, NULL, '008.472.204-51', '1949-10-02', 10, 'R.Golfo de San Fernades', '97', 'intermares', '', '', '0', '', '(83)8650-8999', '', 'omarrh10@gmail.com', 'Representante', '2014-08-26 15:51:38', 1409061098, '', 1, '1'),
(194, NULL, 'Orlando Vilar Maia', NULL, 0, NULL, '518.785.424-00', '1960-12-24', 12, 'R.Cristovao Colombo', '149', '', 'Jd 13 de maio', 'JoÃ£o Pessoa', '0', '', '(83)3227-0795', '(83)8872-0747', 'vilarmaia29@gmail.com', NULL, '2014-08-26 15:53:35', 1409061215, '', 1, '0'),
(195, NULL, 'Paulo Marinari Rodrigues', NULL, 0, NULL, '263.863.217-15', '1951-09-16', 9, 'R.Golfo Tunis', '35', 'Apto.501', '', '', '0', '', '', '(83)9983-1787', 'pmarinari@gmail.com', NULL, '2014-08-26 15:56:06', 1409061366, '', 1, '0'),
(196, NULL, 'Pedro Augusto Ramos', NULL, 0, NULL, '092.517.662-15', '1956-08-12', 8, 'R.Prof.Batista Leite', '53', '', '', '', '0', '', '(83)3228-1139', '(83)9908-5390', 'pedroeliene@yahoo.com', NULL, '2014-08-26 16:04:34', 1409061874, '', 1, '0'),
(197, NULL, 'Rosimeire dos Santos Viana', NULL, 0, NULL, '340.084.975-87', '1966-06-15', 6, 'R.Antonio Gama', '197', 'Apto.102 ed.Raquel', '', '', '0', '', '(83)3021-7655', '', 'meirinhaviana2007@hotmail.com', NULL, '2014-08-26 16:08:30', 1409062110, '', 1, '0');
INSERT INTO `pacientes` (`id`, `foto`, `nome`, `sexo`, `idade`, `estadoCivil`, `cpf`, `dataNascimento`, `mesNascimento`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `telefoneResidencial`, `telefoneCelular`, `email`, `profissao`, `data`, `timestamp`, `observacoes`, `status`, `tratamentos`) VALUES
(198, NULL, 'Rovanilde Garcia', NULL, 0, NULL, '', '1954-11-18', 11, 'R.Herberto Pereira Lucena', '267', '', '', 'JoÃ£o Pessoa', '0', '', '(83)3246-3010', '(83)9382-8737', '', NULL, '2014-08-26 16:09:52', 1409062192, '', 1, '0'),
(199, NULL, 'Rita de Cassia da Silveira e SÃ¡', NULL, 0, NULL, '', '1962-11-19', 11, 'Av.Antonio Lira', '950', '', '', '', '0', '', '(83)3247-1810', '(83)9108-6330', 'ritacassia.sa@bol.com.br', NULL, '2014-08-26 16:18:19', 1409062699, '', 1, '0'),
(200, NULL, 'Rosita Tavares Leite Rolin', NULL, 0, NULL, '035.836.744-13', '1981-11-19', 11, 'Rua Infante Dom Henrique', '252', 'ed.Joaquim Galvao', 'TambaÃº', 'JoÃ£o Pessoa', 'PB', '58039-151', '', '(83)9907-7637', 'rositarolim@hotmail.com', NULL, '2014-08-26 16:20:02', 1409062802, '', 1, '0'),
(201, NULL, 'Rayssa Isabelle C. Bernardes Coelho', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8769-4058', '', NULL, '2014-08-26 16:20:42', 1409062842, '', 1, '0'),
(202, NULL, 'Ryan Henrique Araujo da Silva', NULL, 0, NULL, '', '2002-12-18', 12, 'R.Capitao Emanuel (sousa de alencar?)', '29', '', '', '', '0', '', '', '(83)8810-6879', '', NULL, '2014-08-26 16:29:46', 1409063386, '', 1, '0'),
(203, NULL, 'Renata Alves Monteiro de Almeida', NULL, 0, NULL, '026.767.014-10', '1979-09-27', 9, 'R.Juracy Luna', '31', '', 'Brisamar', 'JoÃ£o Pessoa', '0', '', '(83)3576-6708', '(81)9952-4455', 'necoeuropa@hotmail.com', NULL, '2014-08-26 16:31:08', 1409063468, '', 1, '0'),
(204, NULL, 'Rachel Feitosa da Cruz', NULL, 0, NULL, '826.449.934-15', '1971-04-01', 4, 'Rua Santos Coelho Neto', '495', 'Apto.1501', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-451', '(83)3533-6352', '(83)8898-0132', 'racheler@ig.com', NULL, '2014-08-26 16:37:40', 1409063860, '', 1, '0'),
(205, '27082014130352.jpg', 'Roberto Alves de Sena', '', 0, '', '132.259.444-91', '1952-07-30', 7, 'R.Venancio Jose Neto', '67', '', '', '', '0', '', '(83)8780-6934', '(83)9845-1488', 'betosena@hotmail.com', '', '2014-08-26 16:45:38', 1409064338, '', 1, ''),
(206, NULL, 'Raimunda Neves de A.Couras', NULL, 0, NULL, '120.236.711-91', '1956-08-05', 8, 'R.Antonio Gama', '80', 'Apto.501', '', '', '0', '', '(83)3042-4801', '(83)8690-1999', 'nevescouras@gmail.com', NULL, '2014-08-26 16:47:44', 1409064464, '', 1, '0'),
(207, NULL, 'Rita Maria  de Lucena', NULL, 0, NULL, '', '1930-02-06', 2, 'Rua Presidente Venceslau Braz', '397', '', 'Bessa', 'JoÃ£o Pessoa', 'PB', '58035-220', '(83)8886-7915', '(83)8805-3616', '', NULL, '2014-08-26 16:48:50', 1409064530, '', 1, '0'),
(208, NULL, 'Ricardo Marcelo', NULL, 0, NULL, '098.298.494-49', '1951-11-06', 11, 'R.Dr.Arnaldo Gomes da Silva', '180', '', '', '', '0', '', '', '(83)8848-5818', '', NULL, '2014-08-26 16:50:53', 1409064653, 'confirmar E-MAIL', 1, '0'),
(209, NULL, 'Regina Maria Dalri', NULL, 0, NULL, '074.521.602-15', '1943-03-30', 3, 'Rua Beatriz Maria de Oliveira', '', '', 'Mangabeira', 'JoÃ£o Pessoa', 'PB', '58058-320', '(83)3045-0000', '', 'dalri.regina@gmail.com', NULL, '2014-08-26 16:52:03', 1409064723, '', 1, '0'),
(210, NULL, 'Rafael Cavalcanti Branco', NULL, 0, NULL, '', '1997-05-03', 5, 'Rua Manoel Bezerra Cavalcanti', '65', 'Apto1701', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-500', '', '(83)8838-4682', 'rafael-b-c@hotmail.com', NULL, '2014-08-26 16:52:46', 1409064766, '', 1, '0'),
(211, '26082014200357.jpg', 'Severina Ribreiro Barra Nova     (BIA)', '', 0, '', '826.718.854-15', '1946-11-22', 11, 'R.Jose Severino Massa Spinelli', '477', '', 'torre', '', '0', '', '', '(83)8711-6485', '', '', '2014-08-26 19:33:37', 1409074417, '', 1, '0'),
(212, '26082014200245.jpg', 'Maria Goreth Venancio de Melo', '', 0, '', '188.782.024-87', '1956-11-11', 11, 'R.Minervino Biore', '328', '', 'torre', '', '0', '', '(83)3506-0342', '', '', '', '2014-08-26 19:36:28', 1409074588, '', 1, '0'),
(213, NULL, 'Rodrigo Silveira Falcone', NULL, 0, NULL, '', '1966-11-04', 11, 'Rua Maria Helena Rocha', '113', 'Apto.1602-A', 'Aeroclube', 'JoÃ£o Pessoa', 'PB', '58036-823', '', '(83)8898-0531', 'rodrigofalcone@terra.com.br', NULL, '2014-08-26 19:40:10', 1409074810, '', 1, '0'),
(214, NULL, 'Rebeca Tabosa', '', 0, NULL, '052.265.314-60', '1991-07-28', 7, 'Rua Coronel Miguel Satyro', '280', '', 'Cabo Branco', 'Jo&atilde;o Pessoa', 'PB', '58045-110', '(83)9997-1313', '(83)9979-6262', 'frmgt@terra.com.br', '', '2014-08-26 19:42:22', 1409074942, '', 1, ''),
(215, NULL, 'Renault Vidal de Souza Silva', NULL, 0, NULL, '057.690.084-23', '1985-09-12', 9, 'Rua do Prado', '1281', '', '', '', '0', '', '(83)9600-2254', '(83)8670-8669', '', NULL, '2014-08-26 19:43:46', 1409075026, '', 1, '0'),
(216, NULL, 'Ronniere Pereira Miranda do Amaral', NULL, 0, NULL, '031.131.444-93', '1980-07-09', 7, 'Rua Dom Bosco', '1073', '', 'Cristo Redentor', 'JoÃ£o Pessoa', 'PB', '58070-470', '', '(83)9944-9823', '', NULL, '2014-08-26 19:45:01', 1409075101, '', 1, '0'),
(217, '14052015110949.jpg', 'Rayane Leticia Lucena Costa Xavier', '', 33, '', '039.593.774-44', '1981-06-04', 6, 'R.Lindolfo Gon&ccedil;alves Chaves', '225', '', '', '', '0', '', '(83)8884-6118', '(83)9967-0236', 'rayane@frprojetos.com', '', '2014-08-26 19:46:40', 1409075200, '', 1, ''),
(218, NULL, 'Rodrigo Montenegro', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8836-3253', '', NULL, '2014-08-26 19:47:07', 1409075227, '', 1, '0'),
(219, NULL, 'Rui Freire Duarte', NULL, 0, NULL, '295.089.594-87', '1959-11-16', 11, '', '', '', '', '', '0', '', '', '(83)9302-3333', 'duarte_freire@hotmail.com.br', NULL, '2014-08-26 19:48:43', 1409075323, '', 1, '0'),
(220, '26082014204320.jpg', 'Francisco Romero de Aragao', '', 0, '', '076.588.504-20', '1955-03-15', 3, 'Rua VenÃ¢ncio JosÃ© Neto', '54', '', 'BancÃ¡rios', 'JoÃ£o Pessoa', '0', '58051-140', '(83)3235-2141', '(83)8743-5766', 'romeroaragao@yahoo.com.br', '', '2014-08-26 20:01:28', 1409076088, '', 1, '0'),
(221, '30092014215619.jpg', 'Emilly Braga de Oliveira', '', 0, '', '', '1999-12-18', 12, 'B. das Industrias', '196', '', '', '', '0', '', '(83)8886-5313', '(83)8884-0856', 'transporte.marcas@hotmail.com', '', '2014-08-26 20:42:35', 1409078555, '', 1, '0'),
(222, '27082014130427.jpg', 'Fernanda de Oliveira Alves', '', 0, '', '010.860.834-40', '1981-06-05', 6, 'Rua VenÃ¢ncio JosÃ© Neto', '67', '', 'BancÃ¡rios', 'JoÃ£o Pessoa', '0', '58051-140', '(83)3235-1872', '(83)8864-5661', '', '', '2014-08-27 13:02:04', 1409137324, '', 1, '0'),
(224, '27082014135947.jpg', 'Neverto Rodrigues Vargas', '', 0, '', '032.156.522-34', '1950-04-22', 4, 'Rua Desportista AurÃ©lio Rocha', '485', 'Apto 204', 'Estados', 'JoÃ£o Pessoa', '0', '58031-000', '(83)3243-7032', '(83)8818-2118', 'neventon@gamil.com', '', '2014-08-27 13:08:02', 1409137682, '', 1, '0'),
(225, '25032015162928.jpg', 'Maria Rosinete Santos das Neves (funcionaria)', 'F', 40, '', '', '1974-08-27', 8, 'Avenida Osvaldo Cruz', '232', '', 'Tambi&aacute;', 'Jo&atilde;o Pessoa', 'PB', '58020-700', '(83)8813-6836', '(83)8670-1883', 'rosinetedayckru@hotmail.com', 'RECEPCIONISTA', '2014-08-27 13:23:54', 1409138634, '', 1, ''),
(227, NULL, 'Fernando Antonio Pontes de Araujo', NULL, 0, NULL, '', '1966-07-25', 7, 'Avenida Presidente EpitÃ¡cio Pessoa', '1162', '', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-000', '', '(83)8861-1233', 'marcelopontes@araujopontes.com', NULL, '2014-08-27 13:30:57', 1409139057, '', 1, '0'),
(228, NULL, 'Ricardo Paiva Varandas', NULL, 0, NULL, '874.463.674-15', '1973-10-30', 10, 'BR-230 Km10', 's/n', 'qd07,lt07', '', '', '0', '', '(83)9616-5334', '(83)8839-1112', 'ricardovarandas.adv@gmail.com', NULL, '2014-08-27 13:48:46', 1409140126, '', 1, '0'),
(230, NULL, 'maria da paz', '', 0, NULL, '', '1975-12-19', 12, 'Avenida Presidente Epit&aacute;cio Pessoa', '4595', 'Apto 306 ed. Passargada', '', 'Jo&atilde;o Pessoa', 'PB', '58039-000', '(83)8894-3832', '(83)9626-4449', 'susel&gt;oliveira@gmail.com', '', '2014-08-27 14:19:27', 1409141967, '', 1, ''),
(231, '27082014183327.jpg', 'FlÃ¡via Tarsiana Albuquerque Cunha Lago', '', 40, '', '765.134.834-68', '1973-12-12', 12, 'Rua Josemar Rodrigues de Carvalho', '591', 'Pa:101', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-415', '(83)9689-7211', '', 'tacycunha@hotmail.com', '', '2014-08-27 18:32:44', 1409157164, '', 1, '0'),
(232, NULL, 'Maria Jose Rodrigues Silva', '', 0, NULL, '', '1945-10-26', 10, 'R.Prof.Maria Lianza', '478', 'Apto. 202', '', '', '0', '', '(83)3235-4067', '(83)8894-4067', 'mceicasl@gmail.com', '', '2014-08-27 19:46:00', 1409161560, '', 1, '1,2'),
(234, NULL, 'Aderbal Pinto Junior', NULL, 0, NULL, '059.102.964-26', '1985-05-28', 5, 'Rua Lindolfo GonÃ§alves Chaves', '225', 'Apto.401', 'Jardim SÃ£o Paulo', 'JoÃ£o Pessoa', 'PB', '58051-200', '(83)8108-4648', '', 'aderbalpj@gamil.com', NULL, '2014-08-28 19:14:40', 1409246080, '', 1, '0'),
(235, '27052015095304.jpg', 'Analia Eugenia Moraes', '', 0, '', '961.056.584-00', '1974-06-21', 6, 'Rua Jos&eacute; Cavalcanti Chaves', '243', 'Apto.902', 'Expedicion&aacute;rios', 'Jo&atilde;o Pessoa', 'PB', '58041-090', '(83)9605-8345', '', '', '', '2014-08-28 19:16:19', 1409246179, '', 1, ''),
(236, NULL, 'Silvestre F. Vasquez', NULL, 0, NULL, '', '1945-01-07', 1, 'R.Marechal Esperidiao Rosas', '762', '', 'expedicionario', '', '0', '', '', '(83)9961-0331', 'shislvevasquez@hotmai.com', NULL, '2014-08-28 19:19:15', 1409246355, '', 1, '0'),
(237, NULL, 'Sandra Helena Moreno', NULL, 0, NULL, '', '1957-01-25', 1, '', '', '', '', '', '0', '', '(83)8829-5156', '', '', NULL, '2014-08-28 19:20:29', 1409246429, '', 1, '0'),
(238, '14052015094245.jpg', 'Solange de Freitas', '', 63, '', '036.456.814-34', '1951-09-23', 9, 'Rua Deputado Jos&eacute; Mariz', '1043', '', 'Tambauzinho', 'Jo&atilde;o Pessoa', 'PB', '58042-020', '(83)8777-8883', '', '', '', '2014-08-28 19:37:25', 1409247445, '', 1, ''),
(239, NULL, 'Simone Tejo Salgado Beato', NULL, 0, NULL, '752.167.284-49', '1975-09-24', 9, 'Rua Abelardo da Silva GuimarÃ£es Barreto', '', '', 'Altiplano Cabo Branco', 'JoÃ£o Pessoa', '0', '58046-110', '(83)8737-1369', '', '', NULL, '2014-08-28 19:38:33', 1409247513, '', 1, '0'),
(240, NULL, 'Simone de Lucena Lira', NULL, 0, NULL, '314.794.994-04', '1964-12-28', 12, 'R.Jose Gomes de Sa Filho', ' 85', 'Apto.104-A', '', '', '0', '', '(83)8851-3122', '', 'simone.lira@inss.gove.br', NULL, '2014-08-28 19:40:36', 1409247636, '', 1, '0'),
(241, NULL, 'Solange Franco', NULL, 0, NULL, '028.695.184-39', '1967-02-22', 2, 'Avenida Cabo Branco', '3524', '', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-010', '(83)9834-1221', '', 'solange.guedes.franco@hotmail.com', NULL, '2014-08-28 19:42:35', 1409247755, '', 1, '0'),
(242, NULL, 'Shirley Alencar de Melo', NULL, 0, NULL, '028.202.564-22', '1977-08-20', 8, 'Rua JoÃ£o Soares Padilha', '21', 'Apto.11101 ed.Mason Manaira', 'Aeroclube', 'JoÃ£o Pessoa', 'PB', '58036-835', '(83)8880-7997', '(83)9961-7414', 'shirleyalencarmelo@gmail.com', NULL, '2014-08-28 19:47:39', 1409248059, '', 1, '0'),
(243, '28082014215850.jpg', 'Maria do Carmo Labama (Carminha)', '', 0, '', '', '1940-07-15', 7, 'R.Joaquim Shullen', '40', 'Apto.601 ed.Oasis Plaza', 'Jardim Oceania', '', '0', '', '(83)9922-4222', '', '', '', '2014-08-28 20:46:01', 1409251561, '', 1, '0'),
(244, NULL, 'Silvia Severina Carvalho da Silva', NULL, 0, NULL, '507.575.127-04', '1956-05-09', 5, 'Avenida SÃ£o Paulo', '', 'vila carvalho, casa 03', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-040', '', '(83)8817-9164', 's.silviacarvalho@gmail.com', NULL, '2014-08-28 20:58:59', 1409252339, '', 1, '0'),
(245, NULL, 'Joao Brito de Gois', NULL, 0, NULL, '012.347.573-20', '1945-08-31', 8, 'Av. Joao Machado', '849', '', 'centro', 'JoÃ£o Pessoa', '0', '', '', '(83)9603-8010', 'sercongois@yahoo.com', NULL, '2014-08-28 21:37:33', 1409254653, '', 1, '0'),
(246, NULL, 'Salete Patricio de SÃ¡', NULL, 0, NULL, '133.243.574-20', '1940-05-11', 5, 'av. Sape', '1393', '', '', '', '0', '', '(83)3245-6514', '(83)9982-5190', 'salete.psic@uol.com.br', NULL, '2014-08-28 22:15:42', 1409256942, '', 1, '0'),
(247, NULL, 'Samuel Rodrigues Dantas', NULL, 0, NULL, '', '1997-08-06', 8, 'R.Adauto de Carvalho', '118', '', '', '', '0', '', '(83)8640-5781', '', 'samuel22rodrigues@hotmail.com', NULL, '2014-08-28 22:19:03', 1409257143, '', 1, '0'),
(248, '29082014131823.jpg', 'Vinicius Ferreira Miranda', '', 0, '', '054.608.206-85', '1981-06-16', 6, 'Rua Edvaldo Bezerra Cavalcanti Pinho', '1029', 'Apto.504', 'Cabo Branco', 'JoÃ£o Pessoa', '0', '58045-270', '', '(83)8885-8188', 'vemiranda@hotmail.com', '', '2014-08-29 12:21:56', 1409307716, '', 1, '0'),
(249, '29082014130429.jpg', 'Iara Maribondo Albuquerque', '', 0, '', '010.364.904-24', '1990-10-06', 10, 'Rua Francisco BrandÃ£o', '1145', 'Apto202', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '58038-521', '(83)3247-1097', '(83)8832-1097', 'iaramaribondo@gmail.com', '', '2014-08-29 12:23:26', 1409307806, '', 1, '0'),
(250, NULL, 'Tatiana Christina Brandao Pereira', '', 0, NULL, '', '1975-03-05', 3, 'Rua Artur Enedino dos Anjos', '149', '', 'Altiplano Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58046-180', '(83)9968-7131', '(83)8882-6736', 'taticbp@ig.com.br', '', '2014-08-29 12:24:58', 1409307898, '', 1, '0'),
(251, NULL, 'Tatiana Clicia da Silva Oliveira', NULL, 0, NULL, '025.222.974-65', '1976-04-08', 4, 'Avenida Mar Negro', '68', '', 'Intermares', 'Cabedelo', 'PB', '58102-051', '(83)8742-1082', '', 'tatiaclicia@hotmail.com', NULL, '2014-08-29 12:28:54', 1409308134, '', 1, '0'),
(252, NULL, 'Tereza Cristina de Oliveira Moura', NULL, 0, NULL, '338.182.904-15', '1963-03-11', 3, 'Rua Joaquim Hardman', '57', '', 'Jaguaribe', 'JoÃ£o Pessoa', 'PB', '58015-750', '(83)3222-9656', '(83)8772-9656', '', NULL, '2014-08-29 12:33:51', 1409308431, '', 1, '0'),
(253, NULL, 'Thais Teles Firmino', NULL, 0, NULL, '084.272.124-02', '1993-07-09', 7, 'Rua Doutor Arnaldo Escorel', '', '', 'Tambauzinho', 'JoÃ£o Pessoa', 'PB', '58042-080', '(83)3225-7582', '(83)9329-5205', 'thaistfirmino@gmail.com', NULL, '2014-08-29 12:54:34', 1409309674, '', 1, '0'),
(254, NULL, 'Tereza Mercia Japiassu Diniz', NULL, 0, NULL, '918.039.004-82', '1948-06-05', 6, 'Avi.Agemiro de Figueredo ', '', 'Apto 301 jd Oceania', 'Bessa', 'Uberaba', 'MG', '', '(83)3246-7749', '(83)8881-0136', '', NULL, '2014-08-29 15:55:35', 1409320535, '', 1, '0'),
(255, NULL, 'Thimothy Ireeland', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)3226-1935', '(83)9954-0444', '', NULL, '2014-08-29 16:11:34', 1409321494, '', 1, '0'),
(256, NULL, 'Thays Fernandes de Almeida', NULL, 0, NULL, '', '1993-06-08', 6, '', '6701', '', '', '', '0', '', '', '(83)8758-3880', '', NULL, '2014-08-29 16:33:06', 1409322786, '', 1, '0'),
(257, NULL, 'Thyago Bustorff Fodrippe de Oliveira Martins', NULL, 0, NULL, '854.723.874-34', '1987-11-12', 11, 'Rua Esmeraldo Gomes Vieira', '350', 'Apto.301', 'BancÃ¡rios', 'JoÃ£o Pessoa', 'PB', '58051-650', '(83)8808-8178', '(83)9862-2198', 'tbfom.adv@hotmail.com', NULL, '2014-08-29 18:50:34', 1409331034, '', 1, '0'),
(258, '14052015095455.jpg', 'Uleide de Araujo Lucena Filho', 'M', 0, '', '023.779.634-12', '1977-10-03', 10, '', '', '', '', '', '0', '', '(83)8812-9909', '', '', '', '2014-08-29 18:52:33', 1409331153, '', 1, ''),
(259, NULL, 'Urania Catao Maribondo da Trindade', NULL, 0, NULL, '109.449.034-72', '1954-12-19', 12, 'Rua Francisco BrandÃ£o', '1145', 'Apto.202 ', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-521', '(83)8770-6373', '(83)9979-0461', 'uraniacacas@gmail.com', NULL, '2014-08-29 19:00:32', 1409331632, '', 1, '0'),
(260, NULL, 'Ulisses Teixeira de Araujo', NULL, 0, NULL, '717.342.957-91', '1960-08-05', 8, '', '', '', '', '', '0', '', '(83)9983-0614', '(83)8885-1877', 'ulisses.eletric@gmail.com', NULL, '2014-08-29 19:09:47', 1409332187, '', 1, '0'),
(261, NULL, 'Waldson Sousa', '', 0, NULL, '469.767.527-49', '1919-01-05', 1, '', '', '', '', '', '0', '', '(83)3045-0306', '', 'wsaousa2004@hotmail.com', '', '2014-08-29 19:11:53', 1409332313, '', 1, '0'),
(262, NULL, 'Valdeny Anttas Diniz', NULL, 0, NULL, '114.296.154-00', '1955-06-07', 6, 'Rua JÃºlia Freire', '2104', '501', 'Torre', 'JoÃ£o Pessoa', 'PB', '58040-040', '(83)9601-9189', '', '', NULL, '2014-08-29 19:18:37', 1409332717, '', 1, '0'),
(263, NULL, 'Vilanir Maia de Macedo Costa', NULL, 0, NULL, '081.603.843-00', '1952-05-20', 5, 'R.Mar do Norte', '', '', '', '', '0', '', '', '(83)9106-7707', '', NULL, '2014-08-29 19:22:00', 1409332920, '', 1, '0'),
(264, NULL, 'Veras Esther Ireland', NULL, 0, NULL, '070.261.881-00', '1951-01-16', 1, 'Av.Sao GonÃ§alo', '1021', '', 'Torre', 'JoÃ£o Pessoa', '0', '', '(83)3247-1235', '(83)8857-0704', 'verasireland@yahoo.com.br', NULL, '2014-08-29 19:25:33', 1409333133, '', 1, '0'),
(265, NULL, 'Vilmaria Fernandes Sales ', NULL, 0, NULL, '251.976.064-87', '1957-02-19', 2, 'R.Abdias Gomes de Almeida', '855', '', '', '', '0', '', '', '(83)8772-5829', 'vilmari@yahoo.com', NULL, '2014-08-29 19:28:14', 1409333294, '', 1, '0'),
(266, NULL, 'Washington Franca da Silva', '', 0, NULL, '364.913.814-04', '1964-01-14', 1, 'Rua Infante Dom Henrique', '406', 'Apto.601', 'TambaÃº', 'JoÃ£o Pessoa', 'PB', '58039-150', '(83)8881-2464', '', '', '', '2014-08-29 19:30:32', 1409333432, 'liguei dia dia/ 04/09  as 14:16 p ver o horario p o mesmo, atenderam e desligaram, depois nao consegui-Rose', 1, '0'),
(267, NULL, 'Wagner Jose Massoni', NULL, 0, NULL, '220.962.488-68', '1946-04-13', 4, 'Rua AntÃ´nio PÃ¡dua de Vasconcelos', '108', '', 'Cristo Redentor', 'JoÃ£o Pessoa', 'PB', '58071-400', '', '', 'wagner.nassoni@gamail.com', NULL, '2014-08-29 19:33:52', 1409333632, '', 1, '0'),
(268, NULL, 'Valdelania Maria A.Goncalves (Lana)', NULL, 0, NULL, '', '1969-05-27', 5, 'Rua Joaquim Borba Filho', '344', '', 'Jardim SÃ£o Paulo', 'JoÃ£o Pessoa', 'PB', '58053-110', '(83)9951-0279', '', '', NULL, '2014-08-29 19:52:18', 1409334738, '', 1, '0'),
(269, NULL, 'Vinicius Jose B.F.Filgueirs', NULL, 0, NULL, '026.346.754-61', '1979-05-01', 5, '', '', '', '', '', '0', '', '', '', '', NULL, '2014-08-29 19:53:47', 1409334827, '', 1, '0'),
(270, NULL, 'Yuri Excalibur de Araujo Pereira', NULL, 0, NULL, '072.167.444-54', '1987-05-05', 5, 'Av. Salgado Filho,', '1236', '', 'Sta Rita', 'MacapÃ¡/ AP', '0', '', '(96)8401-7337', '', 'yuri.excalibur@gmail.com', NULL, '2014-09-01 20:37:57', 1409596677, '', 1, '0'),
(271, NULL, 'Adson Gomes da Silva', NULL, 0, NULL, '037.199.107-25', '1948-03-30', 3, 'Rua Huerta Ferreira de Melo', '95', '', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-245', '(83)3226-4219', '(83)8721-2058', 'adsonsilvajp@yahoo.com.br', NULL, '2014-09-01 20:40:21', 1409596821, '', 1, '0'),
(272, NULL, 'Antonio Carlos Artuzo de Quadro', NULL, 0, NULL, '234.034.899-49', '1957-06-01', 6, 'Rua Dom Bosco', '1178', '', 'Cristo Redentor', 'JoÃ£o Pessoa', 'PB', '58070-470', '(83)9668-5388', '', 'caioedalva@hotmail.com', NULL, '2014-09-01 20:42:17', 1409596937, '', 1, '0'),
(273, NULL, 'Antonio Mario dos Santos Bezerra      (FUSEX)', NULL, 0, NULL, '636.980.487-87', '1959-02-07', 2, 'Avenida Mar de Behring', '', '', 'Intermares', 'Cabedelo', 'PB', '58102-141', '', '(83)8886-2596', 'amario.bezerra@gmail.com', NULL, '2014-09-01 20:44:09', 1409597049, '', 1, '0'),
(274, NULL, 'Adis Josefina Rotta Endres  (FUSEX)', NULL, 0, NULL, '446.235.002-25', '0000-00-00', 0, 'R.Telegrafista Cicero Caldas', '104', '', 'Estados', 'JoÃ£o Pessoa', '0', '', '(83)3021-2314', '(83)9657-0752', '', NULL, '2014-09-01 20:46:21', 1409597181, '', 1, '0'),
(275, NULL, 'Andre Oliveira de Sousa Rosa  (FUSEX)', NULL, 0, NULL, '609.453.971-00', '1973-06-22', 6, 'Rua Vanja Viana Sales', '', 'ed.Bessa ll', 'Aeroclube', 'JoÃ£o Pessoa', 'PB', '58036-355', '', '(83)9826-8883', 'aosrosa@hotamil.com', NULL, '2014-09-01 20:48:29', 1409597309, '', 1, '0'),
(276, NULL, 'Alcira Viana Cavalcante', NULL, 0, NULL, '141.153.954-00', '1956-01-25', 1, 'Avenida Presidente Washington Luiz', '268', 'Apto 103', 'Bessa', 'JoÃ£o Pessoa', 'PB', '58035-340', '', '(83)8874-3657', '', NULL, '2014-09-01 20:49:52', 1409597392, '', 1, '0'),
(277, NULL, 'Carolina Barbosa Ferraz Gominho Martins', NULL, 0, NULL, '029.415.434-57', '1978-02-09', 2, 'Rua Deputado Tertuliano de Brito', '230', 'Apto 101', 'Treze de Maio', 'JoÃ£o Pessoa', 'PB', '58025-000', '', '(83)9951-9501', 'carolinamartins@gmail.com', NULL, '2014-09-01 20:54:54', 1409597694, '', 1, '0'),
(278, NULL, 'Claudio Pessanha da Rocha', NULL, 0, NULL, '', '1964-06-22', 6, 'R.Francisca Moura', '659', '', '', '', '0', '', '', '(83)9860-4286', 'claudio40rocha@ig.com.br', NULL, '2014-09-01 21:00:32', 1409598032, '', 1, '0'),
(279, NULL, 'Claudio Mario Labanca (FUSEX)', NULL, 0, NULL, '769.492.224-34', '1962-05-21', 5, 'Av.Oceano Atlantico', '258', '', 'Intermares', 'JoÃ£o Pessoa', '0', '', '', '(83)9924-3883', 'jpcmares@yahoo.com.br', NULL, '2014-09-01 21:12:03', 1409598723, '', 1, '0'),
(280, NULL, 'Clara Stella Pereira Araujo de Albuquerque', NULL, 0, NULL, '251.611.134-72', '1961-04-05', 4, 'Av.Joao Cancaio', '1207', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '', '', '(83)8706-2535', 'clarastella@ibest.combr', NULL, '2014-09-01 21:19:02', 1409599142, '', 1, '0'),
(281, NULL, 'Douglas Rabelo (FUSEX)', NULL, 0, NULL, '000.621.993-44', '1984-09-16', 9, 'Avenida Marechal Rondon', '05', '', 'Jardim Aeroporto', 'Bayeux', 'PB', '58308-332', '', '(83)8866-3993', 'drabelo2000@hotmail.com', NULL, '2014-09-01 21:20:36', 1409599236, '', 1, '0'),
(282, NULL, 'EVA DE FATIMA TELES BEZERRA (FUSEX)', NULL, 0, NULL, '648.343.107-44', '1960-01-16', 1, 'Avenida Mar de Behring', '86', '', 'Intermares', 'Cabedelo', '0', '58102-141', '(83)9927-9547', '', 'EVABEZ10@GMAIL.COM', NULL, '2014-09-01 21:29:54', 1409599794, '', 1, '0'),
(283, NULL, 'ELIANE DE FATIMA CUNHA RIBEIRO ALENCAR)FUSEX)', '', 0, NULL, '151.158.874-87', '0000-00-00', 0, 'AV.SAPE', '953', 'apto 901', '', 'JOAO PESSOA', '0', '', '(83)3566-7314', '(83)9928-7314', 'ELIANEALENCARJP@HOTMAIL.COM', '', '2014-09-01 21:45:56', 1409600756, '', 1, '0'),
(284, NULL, 'ILLYANA MARQUES MACHADO (FUSEX)', NULL, 0, NULL, '077.385.354-58', '1990-09-04', 9, 'Rua Comerciante FÃ©lix Cahino (Lot Paratibe)', '260', 'CASA 131', 'Valentina de Figueiredo', 'JoÃ£o Pessoa', '0', '58064-727', '', '(83)9831-3559', 'ILLYANA_M@HOTMAIL.COM', NULL, '2014-09-01 21:47:25', 1409600845, '', 1, '0'),
(285, NULL, 'FRANCISCO LUCIO CANDIDO DA SILVA (FUSEX)', NULL, 0, NULL, '888.982.967-20', '1967-04-07', 4, 'Rua Eutiquiano Barreto', '645', 'APTO.101', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '58038-311', '(83)3507-1664', '', 'LUCIOCANDIDO@OL.COM.BR', NULL, '2014-09-01 21:50:06', 1409601006, '', 1, '0'),
(286, NULL, 'FLAVIO LUIZ MENDONÃ‡A LABANCA (FUSEX)', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '', '', NULL, '2014-09-01 21:51:41', 1409601101, '', 1, '0'),
(287, NULL, 'GUILHERME TULIO DOS SANTOS', NULL, 0, NULL, '565.687.629-20', '2000-01-28', 1, 'R.ANTONIO GAMA', '80', '1502', '', '', '0', '', '(83)3235-8183', '(83)8719-8183', 'GISELE_TULIOSANTOS@HOTMAIL.COM', NULL, '2014-09-01 21:53:29', 1409601209, '', 1, '0'),
(288, NULL, 'HOMERO DE SOUSA ROSA (FUSEX)', NULL, 0, NULL, '206.165.707-91', '1947-01-28', 1, 'Rua Doutor CÃ¢ndido da NÃ³brega Ferreira', '85', 'APTO 202', 'Aeroclube', 'JoÃ£o Pessoa', 'PB', '58036-440', '', '(83)9971-2801', 'HSROSA@OI.COM.BR', NULL, '2014-09-01 21:56:15', 1409601375, '', 1, '0'),
(289, NULL, 'IVAN CARLOS SOARES DE OLIVEIRA', NULL, 0, NULL, '899.797.967-15', '1968-01-28', 1, 'Avenida Senador HelvÃ­dio Nunes', '', '', 'Jardim Natal', 'Picos', 'PI', '64606-000', '(89)3415-1609', '(83)8771-6572', '', NULL, '2014-09-01 21:57:54', 1409601474, '', 1, '0'),
(290, '14052015102521.jpg', 'JOSE AUGUSTO MARQUES CERQUEIRA', '', 0, '', '292.467.335-68', '1962-03-04', 3, 'Rua Bar&atilde;o da Passagem', '60', '', 'Torre', 'Jo&atilde;o Pessoa', 'PB', '58040-520', '', '(83)9970-2309', 'mARQUESBMUSICA@HOTMAIL.COM', '', '2014-09-01 22:01:54', 1409601714, '', 1, ''),
(291, NULL, 'JAILSON GOMES DA SILVA (FUSEX)', NULL, 0, NULL, '120.689.168-86', '1971-09-15', 9, 'R.JOSE CLEMENTINO DE OLIVEIRA ', '2116', '', '', '', '0', '', '(83)2106-1735', '(83)8113-3077', 'JALINF94@HOTMAIL.COM', NULL, '2014-09-01 22:06:24', 1409601984, '', 1, '0'),
(292, NULL, 'LUIZ ANTONIO DALRI (FUSEX)', NULL, 0, NULL, '032.256.152-34', '1936-02-09', 2, 'R.JOSE FIRMINO FERREIRA', '767', '101B', '', '', '0', '', '(83)3235-8195', '(83)8718-0118', 'DALRI.LUIZ@GMAIL.COM', NULL, '2014-09-01 22:20:04', 1409602804, '', 1, '0'),
(293, NULL, 'MARY MACHADO CERQUEIRA (FUSEX)', NULL, 0, NULL, '236.934.875-53', '1961-12-24', 12, 'R.BARAO DA PASSAGEM', '600', 'APTO 402', 'TORRE', 'JoÃ£o Pessoa', '0', '', '(83)3578-7553', '(83)9817-7554', 'ROSECERQUEIRA.LS@HOTMAIL.COM', NULL, '2014-09-01 22:22:24', 1409602944, '', 1, '0'),
(294, NULL, 'MARTA ROSANA MENDONÃ‡A (FUSEX)', NULL, 0, NULL, '', '1964-01-10', 1, 'R.BEL HIRERALDO CHAVES', '322', 'BLOCO D', '', '', '0', '', '', '(83)9632-1539', '', NULL, '2014-09-01 22:23:56', 1409603036, '', 1, '0'),
(295, '22052015142854.jpg', 'MATILDE ARAUJO GUEDES (FUSEX)', '', 0, '', '025.080.090-23', '1949-10-16', 10, 'R.JOSE GOMES DA SILVEIRA', '124', '', 'CRISTO', 'Jo&atilde;o Pessoa', '0', '', '(83)3223-3153', '(83)8602-2581', 'MAGTIDA@YAHOO.COM', '', '2014-09-01 22:29:14', 1409603354, '', 1, ''),
(296, NULL, 'ROSIMERE DOS SANTOS VIANA (FUSEX)', NULL, 0, NULL, '340.084.975-87', '1966-05-16', 5, 'R.ANTONIO GAMA', '197', '', '', '', '0', '', '(83)3021-7955', '', 'MEIRINHAVIANA2007@HOTMAIL.COM', NULL, '2014-09-02 12:46:11', 1409654771, '', 1, '0'),
(297, NULL, 'ROSIMEIRE MACHADO CERQUEIRA', NULL, 0, NULL, '', '1988-04-19', 4, 'R.BARAO DA PASSAGEM', '600', '', 'TORRE', '', '0', '', '', '(83)9817-4871', 'ROSECERQUERA.LS@HOTMAIL.COM', NULL, '2014-09-02 12:50:08', 1409655008, '', 1, '0'),
(298, NULL, 'RITA DE CASSIA DIAS FONSECA (FUSEX)', NULL, 0, NULL, '028.077.077-72', '1972-11-16', 11, 'Rua Coronel Miguel Satyro', '401/1203', '', 'Cabo Branco', 'JoÃ£o Pessoa', '0', '58045-110', '(83)3031-7850', '(83)8166-1385', 'RCDFONSECA@HOTMAIL.COM', NULL, '2014-09-02 12:51:37', 1409655097, '', 1, '0'),
(299, NULL, 'Remelly Correia Ranawski (FUSEX)', '', 0, NULL, '122.964.677-92', '1986-02-23', 2, 'R.JOSE AUGUSTO TRINDADE', '376', 'APTO.208', 'TAMBAU', '', '0', '', '(83)8898-6898', '(83)9672-0322', 'RENIELLYNOW@YAHOO.COM', '', '2014-09-02 12:53:50', 1409655230, '', 1, '0'),
(300, NULL, 'TELMA OLIVEIRA DE SOUSA ROSA (FUSEX)', NULL, 0, NULL, '562.751.881-20', '1949-08-11', 8, 'Rua Doutor CÃ¢ndido da NÃ³brega Ferreira', '85', 'APTO.202', 'Aeroclube', 'JoÃ£o Pessoa', '0', '58036-440', '', '(83)9942-1647', 'TELMAOSROSA@HOTMAIL.COM', NULL, '2014-09-02 13:00:48', 1409655648, '', 1, '0'),
(301, NULL, 'MARIA DAS GRACAS M. CERQUEIRA (FUSEX)', NULL, 0, NULL, '006.814.991-33', '1984-05-24', 5, 'Rua BarÃ£o da Passagem', '600', '', 'Torre', 'JoÃ£o Pessoa', '0', '58040-520', '', '(83)9987-0441', 'mDGCERQUEIRA@YAHOO.COM.BR', NULL, '2014-09-02 13:07:52', 1409656072, '', 1, '0'),
(302, '01042015105656.jpg', 'MARIA PAULA SILVA TURRUBIA RIBEIRO (FUSEX)', '', 19, '', '071.509.485-05', '1995-01-14', 1, 'AV.EPITACIO PESSOA', '2205', 'VILA MILITAR CASA 29', '', '', '0', '', '(83)2106-1692', '(83)8800-0632', 'PAULINHA_BEBE1000@HOTMAIL.COM', '', '2014-09-02 13:10:23', 1409656223, '', 1, ''),
(303, NULL, 'NARJARA RIBEIRO ALENCAR (FUSEX)', NULL, 0, NULL, '013.467.554-18', '1983-08-16', 8, 'Avenida SapÃ©', '953', 'APTO.301', 'ManaÃ­ra', 'JoÃ£o Pessoa', '0', '58038-381', '', '(83)9828-9800', 'NARJARALENCAR@GMAIL.COM', NULL, '2014-09-02 13:12:38', 1409656358, '', 1, '0'),
(304, NULL, 'NATACHA MENDONÃ‡A LABANCA (FUSEX)', NULL, 0, NULL, '532.053.322-53', '0000-00-00', 0, 'Rua Bacharel Irenaldo de Albuquerque Chaves', '201', 'BL D APTO 322', 'Aeroclube', 'JoÃ£o Pessoa', '0', '58036-460', '', '(83)9668-4431', 'NATACHA_LABANCA@HOTMAIL.COM', NULL, '2014-09-02 13:15:06', 1409656506, '', 1, '0'),
(305, NULL, 'VALTER ROMULO BARBOSA PEREIRA', NULL, 0, NULL, '602.599.574-53', '1967-02-12', 2, 'Avenida Acre', '601', '', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-230', '', '(83)8690-2320', 'VALTERROMULO@YAHOO.COM', NULL, '2014-09-02 13:17:07', 1409656627, '', 1, '0'),
(306, NULL, 'VERONICA DE LURDES BRITO A. RAMOS (FUSEX)', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)3507-3766', '(83)8102-1970', '', NULL, '2014-09-02 13:18:12', 1409656692, '', 1, '0'),
(307, NULL, 'ANTONIO COURAS', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '', '', NULL, '2014-09-02 13:26:57', 1409657217, '', 1, '0'),
(308, NULL, 'ADELAIDE PATRICIO COSTA PINTO', NULL, 0, NULL, '395.898.704-49', '1947-08-18', 8, 'AV.FRANCISCO MOURA', '662', '', 'JD 13 DE MAIO', 'JoÃ£o Pessoa', '0', '', '(83)3224-4052', '', 'DIANACOSTA@GMAIL.COM', NULL, '2014-09-02 13:28:46', 1409657326, '', 1, '0'),
(309, NULL, 'ADELE COSTA DIAS PINTO PESSOA', NULL, 0, NULL, '010.121.134-18', '1978-05-21', 5, 'Rua Lionildo Francisco de Oliveira', '550', 'APTO.302', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-216', '', '(83)8640-7462', 'ADELE.NUT@HOTMAIL.COM', NULL, '2014-09-02 13:30:58', 1409657458, '', 1, '0'),
(310, NULL, 'ANTONIO ALFREDO MELO GUIMARAES', NULL, 0, NULL, '069.875.084-53', '1951-05-21', 5, 'Avenida Jacinto Dantas', '214', 'APTO.102 ED. ROMA DE FIORI', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-270', '(83)3247-6325', '(83)9981-0368', 'ALFREDO1951@BUL.COM.', NULL, '2014-09-02 13:32:34', 1409657554, '', 1, '0'),
(311, NULL, 'EDISIO FRANCISCO FIALHO DA SILVEIRA', '', 0, NULL, '', '1957-01-25', 1, 'AV. JUAREZ TAVARO', '1750', '', '', '', '0', '', '(83)3244-7922', '(83)8845-6870', 'DIDAFIALHO1F@HOTMAIL.COM', '', '2014-09-02 13:41:10', 1409658070, '', 1, ''),
(312, NULL, 'FRANCISCA HELENA NOGUEIRA GUIMARAES', NULL, 0, NULL, '112.429.224-15', '1954-05-18', 5, 'R. JACINTO DANTAS', '214', 'APTO 102', 'ManaÃ­ra', '', '0', '', '(83)3247-6325', '(83)8874-0389', 'FHNG@BOL.COM.BR', NULL, '2014-09-02 13:45:21', 1409658321, '', 1, '0'),
(313, NULL, 'FRANCISCA LUCINEIDE RAMOS DINIZ          ( LÃš DINIZ)', NULL, 0, NULL, '', '1961-06-06', 6, 'Rua JÃºlia Freire', '1414', 'APTO.203', 'ExpedicionÃ¡rios', 'JoÃ£o Pessoa', 'PB', '58041-000', '', '(83)9975-1084', 'LUDINIZ100@GMAIL.COM', NULL, '2014-09-02 13:46:55', 1409658415, '', 1, '0'),
(314, NULL, 'JOAO BENJAMIM DELGADO NETO', NULL, 0, NULL, '007.595.064-26', '1973-03-08', 3, 'Rua Maria Eunice GuimarÃ£es Fernandes', '17', 'APTO.1202', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-480', '(83)3246-5855', '(83)9972-1874', 'JBDNETO@HOTMAIL.COM', NULL, '2014-09-02 13:51:12', 1409658672, '', 1, '0'),
(315, NULL, 'NEVES COURAS', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)3574-5435', '(83)8690-1999', '', NULL, '2014-09-02 14:02:40', 1409659360, '', 1, '0'),
(316, NULL, 'PEDRO HENRIQUE M. DE LUCENA', NULL, 0, NULL, '061.920.364-11', '1986-09-02', 9, 'Rua Marechal Hermes da Fonseca', '1952', '', 'Bessa', 'JoÃ£o Pessoa', 'PB', '58035-190', '(83)3245-1347', '(83)8610-9570', 'profpedrolucena@gmail.com', NULL, '2014-09-02 14:13:08', 1409659988, '', 1, '0'),
(317, '02092014145446.jpg', 'SILVIO DE AZEVEDO SOUZA', '', 0, '', '219.884.124-04', '1959-05-04', 5, '', '', '', '', '', '0', '58052-214', '', '(83)8811-9016', '', '', '2014-09-02 14:53:40', 1409662420, '', 1, '0'),
(318, NULL, 'RITA DE CASSIA DA SILVEIRA E SÃ', NULL, 0, NULL, '', '1962-11-19', 11, 'AV. ANTONIO LIRA', '950', '', '', '', '0', '', '(83)3247-1810', '(83)9108-6330', 'RITACASSIA.SA@BOL.COM.BR', NULL, '2014-09-02 15:22:51', 1409664171, '', 1, '0'),
(319, NULL, 'ADNELSON MEDEIROS DE SOUZA', NULL, 0, NULL, '676.544.523-49', '1976-05-25', 5, 'Rua Iolanda Eloy de Medeiros', '101', 'APTO 1104-B', 'Ãgua Fria', 'JoÃ£o Pessoa', 'PB', '58053-028', '', '(83)9131-8368', 'ADNELSON_M@HOTAMIL.COM', NULL, '2014-09-02 15:30:58', 1409664658, '', 1, '0'),
(320, NULL, 'CLAUDIO LINS QUINTANS', NULL, 0, NULL, '110.675.944-34', '1949-12-03', 12, 'R.MAX ZAGEL', '50', '', 'CAMBOINHA', '', '0', '', '', '(83)8701-1978', 'VIRA_L_MEXE@YAHOO.COM.BR', NULL, '2014-09-02 15:33:16', 1409664796, '', 1, '0'),
(321, NULL, 'CESAR ALEXANDRE CARLI', NULL, 0, NULL, '981.075.507-49', '1969-11-04', 11, 'Rua Desportista AurÃ©lio Rocha', '129', '', 'Estados', 'JoÃ£o Pessoa', 'PB', '58031-000', '', '(83)8662-0120', 'CESARCARLI@GMAIL.COM', NULL, '2014-09-02 15:34:44', 1409664884, '', 1, '0'),
(322, NULL, 'DOUGLAS BRAZ LEITE', NULL, 0, NULL, '343.505.004-72', '1962-09-01', 9, 'Avenida Santa Catarina', '34', '', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-070', '', '(83)8737-9510', 'VIRAPURU.CANTA@HOTMAIL.COM', NULL, '2014-09-02 15:36:08', 1409664968, '', 1, '0'),
(323, NULL, 'DOUGLAS TEIXEIRA DE ARAUJO    (FUSEX)', NULL, 0, NULL, '070.635.414-12', '1987-06-20', 6, 'Rua JosÃ© Florentino JÃºnior', '89', 'APTO.403', 'Tambauzinho', 'JoÃ£o Pessoa', 'PB', '58042-040', '', '(83)9635-8520', 'GOUGTARAUJO@GMAIL.COM', NULL, '2014-09-02 15:37:35', 1409665055, '', 1, '0'),
(324, NULL, 'ELIENE BARBOSA DE MENEZES', NULL, 0, NULL, '351.449.801-63', '1967-10-10', 10, 'R. EURIPEDES TAVARES', '362', '', '', '', '0', '', '(61)2107-9854', '(61)9656-7172', 'HJP2_DIRETORIA@HOTMAIL.COM', NULL, '2014-09-02 15:39:25', 1409665165, '', 1, '0'),
(325, NULL, 'ELIENE ALVES DE OLIVEIRA', NULL, 0, NULL, '', '1965-08-10', 8, 'Rua Professor Batista Leite', '53', '', 'Roger', 'JoÃ£o Pessoa', 'PB', '58020-245', '(83)3021-1489', '(83)9908-5390', 'PEDROELIANE@YAHOO.COM', NULL, '2014-09-02 15:40:59', 1409665259, '', 1, '0'),
(326, NULL, 'FRANCISCO ROMERO DE ARAGAO', NULL, 0, NULL, '076.588.504-20', '1955-03-15', 3, 'Rua VenÃ¢ncio JosÃ© Neto', '54', '', 'BancÃ¡rios', 'JoÃ£o Pessoa', 'PB', '58051-140', '(83)9332-7059', '(83)8743-5766', 'ROMEROARAGAO@YAHOO.COM', NULL, '2014-09-02 15:44:06', 1409665446, '', 1, '0'),
(327, NULL, 'FATIMA TARCIANA ALBUQUERQUE CUNHA LAGO', NULL, 0, NULL, '765.134.834-68', '1973-12-12', 12, 'RUA JOSEMAR RODRIGUES DE CARVALHO', '591', 'APTO 101', '', '', '0', '', '', '(83)9689-7211', 'TACYCUNHA@HOTMAIL.COM', NULL, '2014-09-02 15:46:15', 1409665575, '', 1, '0'),
(328, NULL, 'FLAVIA RODRIGUES DE SIQUEIRA   (FUSEX)', NULL, 0, NULL, '058.244.127-74', '1987-03-25', 3, 'R.MARECHAL RONDON', '11', 'VILA MILITAR', 'BAYEUX', 'JoÃ£o Pessoa', '0', '', '', '(83)8122-2422', 'FLAVIA_R_SIQUEIRA@HOTMAIL.COM', NULL, '2014-09-02 15:49:24', 1409665764, '', 1, '0'),
(329, '01042015105845.jpg', 'FERNANDA DE OLIVEIRA ALVES', '', 0, '', '', '1981-06-05', 6, 'Rua Ven&acirc;ncio Jos&eacute; Neto', '67', '', 'Banc&aacute;rios', 'Jo&atilde;o Pessoa', 'PB', '58051-140', '(83)3235-1872', '(83)8780-6934', 'NANDA_OALVES@HOTMAIL.COM', '', '2014-09-02 15:59:44', 1409666384, '', 1, ''),
(330, NULL, 'FERNANDO COMIN', NULL, 0, NULL, '221.467.170-68', '1955-09-14', 9, 'R.PROJETADA', '92', '', 'PONTA DE CAMPIA', 'CABEDELO', '0', '', '', '(83)8747-1067', 'FERCOM2509@GMAIL.COM', NULL, '2014-09-02 16:09:25', 1409666965, '', 1, '0'),
(331, NULL, 'GLORIA MARTIN', NULL, 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '58004-527', '(83)3512-1100', '', 'JMARTIN@HYCITE.COM', NULL, '2014-09-02 16:14:06', 1409667246, '', 1, '0'),
(332, NULL, 'ISAURA BENDO HENRIQUE', NULL, 0, NULL, '527.037.540-00', '1971-05-19', 5, 'Rua Infante Dom Henrique', '100', '', 'TambaÃº', 'JoÃ£o Pessoa', 'PB', '58039-150', '', '(83)9138-0136', 'ISABENDO71@GMAIL.COM', NULL, '2014-09-02 16:15:26', 1409667326, '', 1, '0'),
(333, NULL, 'JORGE EDUARDO LUCENA', NULL, 0, NULL, '491.006.534-20', '1965-09-16', 9, 'Rua Abdias dos Santos Passos', '166', '', 'VarjÃ£o', 'JoÃ£o Pessoa', 'PB', '58070-340', '', '(83)8838-7483', 'EDLUCENAJO@HOTMAIL.COM', NULL, '2014-09-02 16:17:35', 1409667455, '', 1, '0'),
(334, NULL, 'JAINE FERREIRA DE ARAUJO', NULL, 0, NULL, '', '1959-01-31', 1, 'Avenida Juarez TÃ¡vora', '300', '', 'Torre', 'JoÃ£o Pessoa', 'PB', '58040-022', '', '(83)8896-7457', 'JAINEARAUJO@YAHOO.COM', NULL, '2014-09-02 16:18:41', 1409667521, '', 1, '0'),
(335, NULL, 'LUCIA DE FATIMA SILVA OLIVEIRA', NULL, 0, NULL, '042.456.787-39', '1967-05-12', 5, 'Avenida Senador Ruy Carneiro', '853', 'APTO.1301', 'Miramar', 'JoÃ£o Pessoa', 'PB', '58032-101', '(83)3243-0585', '', '', NULL, '2014-09-02 16:20:12', 1409667612, '', 1, '0'),
(336, NULL, 'LUCAS DANTAS MACHADO       (FUSEX)', NULL, 0, NULL, '102.556.914-83', '1994-01-28', 1, 'Avenida Juarez TÃ¡vora', '1573', 'APTO 404 ED. SAN REMO', 'Torre', 'JoÃ£o Pessoa', 'PB', '58040-020', '', '(83)9919-3693', 'LUCASDANTAS007@HOTMAIL.COM', NULL, '2014-09-02 16:23:40', 1409667820, '', 1, '0'),
(337, NULL, 'LUCAS FILGUEIRA SILVA', NULL, 0, NULL, '137.350.553-20', '1959-10-18', 10, 'Rua Oceano Ãndico', '77', 'APTO 703 ED. MONTE TABOR', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-665', '(83)9609-1110', '', 'lUCASIMOVEISPB@HOTMAIL.COM', NULL, '2014-09-02 16:30:03', 1409668203, '', 1, '0'),
(338, NULL, 'MAGDA SUELY FERNANDES DE ALBUQUERQUE', NULL, 0, NULL, '379.914.424-20', '1961-03-16', 3, 'Avenida Rio Grande do Sul', '1600', 'APTO 402', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-021', '(83)9909-0039', '(83)8819-0099', 'MAGDA_ALBUQUERQUE@YAHOO.COM', NULL, '2014-09-02 16:32:11', 1409668331, '', 1, '0'),
(339, NULL, 'PEDRO MANOEL CAMELO DE SOUSA ', NULL, 0, NULL, '027.928.674-00', '1980-10-15', 10, 'Rua Oceano AtlÃ¢ntico', '754', 'APTO. 104', 'Intermares', 'Cabedelo', 'PB', '58102-252', '(83)9687-1010', '(83)8617-0119', 'PEDRO2316224@HOTMAIL.COM', NULL, '2014-09-02 16:40:34', 1409668834, '', 1, '0'),
(340, NULL, 'TANIA REJINA CASTELLIANO', NULL, 0, NULL, '914.785.537-15', '1950-11-23', 11, 'Rua Lionildo Francisco de Oliveira', '550', 'APTO 104', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-216', '(83)8751-4923', '(83)8899-0437', 'TANIACASTELLIANO@HOTMAIL.COM', NULL, '2014-09-02 16:42:27', 1409668947, '', 1, '0'),
(341, NULL, 'RACHEL MARIA SILVA GOMES DE A. MENDES', NULL, 0, NULL, '033.623.814-21', '1979-08-13', 8, 'Rua Professor Francisco Oliveira Porto', '723', '', 'Brisamar', 'JoÃ£o Pessoa', 'PB', '58033-390', '(83)9988-4459', '(83)8714-5288', 'GOMES.RACHEL@HOTMAIL.COM', NULL, '2014-09-02 16:45:35', 1409669135, '', 1, '0'),
(342, NULL, 'ROSANGELA MARIA OLIVEIRA ROCHE', NULL, 0, NULL, '343.125.014-91', '1958-07-13', 7, '', '', '', '', '', '0', '', '', '(83)9902-6644', '', NULL, '2014-09-02 16:46:44', 1409669204, '', 1, '0'),
(343, NULL, 'VICTOR HUGO PRESTES ROCHA', NULL, 0, NULL, '394.943.574-03', '1969-12-31', 12, '', '', '', '', '', '0', '58310-000', '', '(83)9301-5869', '', NULL, '2014-09-02 16:53:20', 1409669600, '', 1, '0'),
(344, NULL, 'ROBSANDRA CARDOSO ABINTES', NULL, 0, NULL, '768.155.794-68', '1970-04-02', 4, 'Avenida Mar Vermelho', '293', 'APTO 301', 'Intermares', 'Cabedelo', 'PB', '58102-120', '(83)8760-0788', '(83)8146-2942', 'ROBABINTES@HOTMAIL.COM', NULL, '2014-09-02 20:35:02', 1409682902, '', 1, '0'),
(345, NULL, 'JOSE MARCONI MEDEIROS DE SOUZA', 'M', 65, NULL, '020.459.664-53', '1948-09-05', 9, 'Rua SÃ£o GonÃ§alo', '', '', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-330', '(83)3247-3732', '(83)9921-9890', '', '', '2014-09-03 12:18:51', 1409739531, '', 1, '0'),
(346, NULL, 'Jesse James Martin', 'M', 25, NULL, '', '1989-08-11', 8, 'R.HILTON SOUTO MAIOR', '6505', '', '', 'Jo&atilde;o Pessoa', '0', '', '(83)3506-4286', '', 'ROYALDYNASTYMC@HOTMAIL.COM', '', '2014-09-03 12:20:42', 1409739642, '', 1, '0'),
(347, NULL, 'DIVANE GEISE MAIA', 'F', 46, NULL, '690.837.974-49', '1968-01-21', 1, 'Rua Professora Maria Ester Bezerra Mesquita', '', '', 'IpÃªs', 'JoÃ£o Pessoa', 'PB', '58028-700', '(83)8851-7418', '(83)9984-3022', '', '', '2014-09-03 14:24:28', 1409747068, '', 1, '0'),
(348, NULL, 'Zenilda Maria Oliveira Ferreira da Silva', 'F', 78, NULL, '062.197.055-72', '1935-09-08', 9, 'av.Pombal', '719', 'apto.702', 'manaira', 'JoÃ£o Pessoa', '0', '', '(83)3247-0146', '(83)9921-8841', 'genildamafs@hotmail.com', '', '2014-09-03 20:29:28', 1409768968, '', 1, '0'),
(349, NULL, 'AMANDA NUNES PEREIRA', 'F', 34, NULL, '684.821.322-53', '1980-08-28', 8, 'AV.ALAGOAS', '248', '', '', 'JoÃ£o Pessoa', '0', '', '', '(83)8859-5486', 'AMANDADITANP2@HOTMAIL.COM', '', '2014-09-03 20:36:41', 1409769401, '', 1, '0'),
(350, NULL, 'CARLINDA SOUZA SOARES', 'F', 49, NULL, '', '1965-01-01', 1, 'AV.GOIAS', '401/1203', '', 'Estados', '', '0', '', '(83)9946-8533', '(83)9946-8533', 'PRA.CARLINDA@HOTMAIL.COM', '', '2014-09-03 20:52:26', 1409770346, '', 1, '0'),
(351, NULL, 'EUDES SOUSA MAGALHAES', 'M', 56, NULL, '119.934.133-91', '1958-05-14', 5, 'AV.RIO GRANDE DO SUL', '1600', '', '', '', '0', '', '(83)3042-0385', '(83)8831-4700', 'EUDESMAGALHAES@UG.COM.BR', '', '2014-09-03 20:56:32', 1409770592, '', 1, '0'),
(352, NULL, 'MARLY FRANCISCA DOS SANTOS SOUSA', '', 56, NULL, '466.933.517-00', '1958-01-19', 1, 'Rua Manoel Ferreira Machado', '', '', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-203', '(83)3045-0306', '(83)8837-4240', 'LILLY_SOUSA@HOTMAIL.COM', '', '2014-09-04 13:54:11', 1409831651, '', 1, '0'),
(353, NULL, 'NEWENTON RODRIGUES VARGAS', 'M', 64, NULL, '032.156.522-34', '1950-04-22', 4, 'Rua Desportista AurÃ©lio Rocha', '485', 'APTO.204', 'Estados', 'JoÃ£o Pessoa', 'PB', '58031-000', '(83)3243-7032', '(83)8818-2118', 'NEVENTON@GMAIL.COM', '', '2014-09-04 13:56:06', 1409831766, '', 1, '0'),
(354, NULL, 'Antonio Fernando Preira', '', 64, NULL, '215.085.269-15', '1950-07-06', 7, 'Rua Fernando Luiz Henrique dos Santos', '177', 'apto.304', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-050', '', '(83)8828-9717', 'fernando11pereira@hotmail.com', '', '2014-09-04 15:06:19', 1409835979, '', 1, '0'),
(357, NULL, 'DENISE MARIA DA CRUZ NETTO SCHULER (FUSEX)', '', 74, NULL, '020.052.174-84', '1940-02-24', 2, 'AV.JULIA FREIRE', '', 'APTO2001 ED.SANTORINI', 'TORRE', 'JOAO PESSOA', 'PB', '', '(83)8603-5539', '(83)8680-1919', 'DENISESCHULE@GMAIL.COM', '', '2014-09-05 13:33:26', 1409916806, '', 1, '0'),
(360, NULL, 'MARIA DA PAZ VIEIRA ARAUJO PINHEIRO', '', 55, NULL, '279.120.274-91', '1959-07-11', 7, 'R.JUIZ JOAO NAVARRO FILHO', '127', '', '', '', '0', '', '', '(83)8853-2900', '', '', '2014-09-09 19:26:50', 1410283610, '', 1, '0'),
(361, NULL, 'JOAO VICTOR FIRMO NOVAES FERRAZ', 'M', 8, NULL, '105.224.844-68', '2006-04-03', 4, 'Rua DÃ©bora da Silva Braga', '375', 'APto. 705 ', 'Aeroclube', 'JoÃ£o Pessoa', 'PB', '58036-843', '(83)3245-7318', '(83)9975-1544', 'ROSAURA_FERRAZ@UOL.COM', 'ESTUDANTE', '2014-09-09 21:59:02', 1410292742, '', 1, '0'),
(362, NULL, 'ALEXSANDRA ARAUJO DE MELO NUNES', 'F', 36, NULL, '031.929.264-90', '1978-04-16', 4, 'Rua Professor Francisco Maia Wanderley', '68', '', 'Mangabeira', 'JoÃ£o Pessoa', 'PB', '58056-670', '', '(83)8886-2304', 'ALECKSANDRA27@YAHOO.COM.BR', '', '2014-09-18 12:47:04', 1411037224, '', 1, '0'),
(363, NULL, 'APARECIDA MARIA CARVALHO ALMEIDA', '', 40, NULL, '884.479.284-20', '1974-04-10', 4, 'Avenida Rio Grande do Sul', '1600', 'Apto.501', 'Estados', 'JoÃ£o Pessoa', 'PB', '58030-020', '', '(83)8710-1753', '', '', '2014-09-19 13:49:07', 1411127347, '', 1, '0'),
(364, NULL, 'ANTONIO ALVES DE LIMA NETO', '', 15, NULL, '', '1999-06-16', 6, 'Antonio Alves de Lima', '301', '', '', '', '0', '', '(83)9983-2589', '(83)8852-8999', '', '', '2014-09-19 13:52:14', 1411127534, '', 1, '0'),
(365, NULL, 'ANGELA DE CORBARA MOURA KEHRTE', '', 67, NULL, '058.894.804-72', '1947-06-23', 6, 'Rua Fernando Luiz Henrique dos Santos', '1988', '', 'Jardim Oceania', 'JoÃ£o Pessoa', 'PB', '58037-051', '', '(83)9100-9119', 'jAKEHRLE@GMAIL.COM', '', '2014-09-22 13:53:20', 1411386800, '', 1, '0'),
(366, NULL, 'ALTAMAR OLIVEIRA DA ROSA (irmao de Susel)', '', 46, NULL, '542.383.900-91', '1967-11-16', 11, 'epitacio pessoa ', '4595', '', '', '', '0', '', '', '', '', '', '2014-09-22 14:03:06', 1411387386, '', 1, '0'),
(367, NULL, 'Adalice Lucena Camboim', '', 79, NULL, '299.222.834-68', '1934-12-16', 12, 'R.Peregrino Filho ', '502', '', '', '', '0', '', '(83)3421-3012', '(83)9967-8434', '', '', '2014-09-25 20:11:31', 1411668691, '', 1, '0'),
(368, '11122014212901.jpg', 'ROSE TESTE', '', 0, '', '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '', '', '', '2014-10-01 19:22:27', 1412184147, '', 1, ''),
(369, '01102014200521.jpg', 'Thiago Andres', '', 14, '', '', '1999-10-29', 10, 'R. ANTONIO CARLOS ARAUJO', '100', 'APTO 407', 'CABO BRANCO', '', '0', '58045-250', '(83)9920-9959', '', '', '', '2014-10-01 20:04:52', 1412186692, '', 1, '0'),
(370, NULL, 'ANDREA FERREIRA DE PAIVA', 'F', 36, NULL, '', '1977-11-21', 11, 'Rua AntÃ´nio Carlos AraÃºjo', '100', 'APTO 407', 'Cabo Branco', 'JoÃ£o Pessoa', 'PB', '58045-250', '', '(83)9920-9959', 'ANDREAPPALARIOS@YAHOO.COM.BR', 'PSICÃ“LOGA', '2014-10-01 20:06:07', 1412186767, '', 1, '0'),
(371, NULL, 'ROSSANA SOUTO LIMA KOFFMANN', '', 48, NULL, '509.763.464-00', '1966-09-29', 9, 'Rua Doutor Francisco Sarmento Meira', '52', '', 'Bessa', 'JoÃ£o Pessoa', 'PB', '58035-420', '', '(83)8709-2260', '', '', '2014-10-02 15:32:49', 1412256769, '', 1, '0'),
(372, NULL, 'MARCOS ANTONIO DA SILVA LAVOGADE', '', 58, NULL, '412.874.877-34', '1956-01-21', 1, 'Rua Vereador Gumercindo Barbosa Dunda', '', '', 'Aeroclube', 'JoÃ£o Pessoa', 'PB', '58036-850', '(83)9110-3458', '', '', '', '2014-10-02 15:39:09', 1412257149, '', 1, '0'),
(373, NULL, 'MARIA JOSE NUNES PADILHA', '', 68, NULL, '058.925.114-72', '1946-05-20', 5, 'AV.INGÃ', '425', 'APTO 501', 'MANAÃRA', '', '0', '', '(83)3031-2809', '(83)8623-9733', 'mariajosenunes26@hotmail.com', '', '2014-10-02 15:41:39', 1412257299, '', 1, '0'),
(374, NULL, 'MARIA MAMEDE COSTA', '', 73, NULL, '', '1941-08-05', 8, 'AV. MONTEIRO DA FRANCA', '1107', '', 'MANIARA', '', '0', '', '(83)3246-4086', '(83)8828-7324', 'OUTRO FONE 91784910', '', '2014-10-02 15:43:28', 1412257408, 'OUTRO FONE 91784910', 1, '0'),
(375, NULL, 'aparecida', '', 45, NULL, '552.744.714-04', '1969-01-20', 1, 'AV.MARECHAL RONDON', 'CASA 37', 'VILA MILITAR', 'ALTO DA BOA VISTA', 'BAYEUX', '0', '', '', '(83)8833-2882', 'SGTVILLAR@GMAIL.COM', '', '2014-10-02 15:45:42', 1412257542, '', 1, '0'),
(376, NULL, 'FABIO SHNEIDER', '', 40, NULL, '595.229.761-72', '1974-07-29', 7, 'R.JOSE FERREIRA RAMOS', '58', 'JARDIM OCEANIA', 'BESSA', 'JOAO PESSOA', '0', '', '', '(83)8606-4018', 'SGTIRHOTMAIL.COM', '', '2014-10-02 15:54:33', 1412258073, '', 1, '0'),
(377, NULL, 'GRACINDA SOARES DE FREITAS', '', 58, NULL, '252.183.794-68', '1956-09-17', 9, 'Rua Bananeiras', '601', 'apto 1102', 'tambau', 'JoÃ£o Pessoa', 'PB', '58038-170', '', '(83)9980-0028', 'gracindafreitas@hotmail.com', '', '2014-10-02 15:56:24', 1412258184, '', 1, '0'),
(378, NULL, 'ELIANE DE FATIMA C. R. ALENCAR', '', 61, NULL, '151.158.874-87', '1953-02-15', 2, 'Avenida SapÃ©', '953', 'APTO 901', 'ManaÃ­ra', 'JoÃ£o Pessoa', 'PB', '58038-381', '(83)9928-7314', '', '', '', '2014-10-02 15:58:49', 1412258329, '', 1, '0'),
(379, NULL, 'EVALDO MIRANDA DE ARAUJO', '', 40, NULL, '798.131.354-68', '1974-08-06', 8, 'Rua Professora Francisca Romana', '62', '', 'Castelo Branco', 'JoÃ£o Pessoa', 'PB', '58050-510', '(83)8733-6456', '', '', '', '2014-10-02 16:01:38', 1412258498, '', 1, '0'),
(380, NULL, 'CURTTIS LEE HALL', '', 31, NULL, '', '1983-04-15', 4, 'Rua Aderbal Maia Paiva', 's/n', '', 'Portal do Sol', 'JoÃ£o Pessoa', 'PB', '58046-527', '', '(83)9908-1563', '', 'madtownrep@yahoo.com', '2014-10-02 16:34:19', 1412260459, '', 1, '0'),
(381, NULL, 'Alda Fran Lucena Camboin Lavor''', '', 55, NULL, '237.803.394-04', '1959-01-21', 1, 'Rua MaurÃ­cio de Oliveira', '715', '', 'Treze de Maio', 'JoÃ£o Pessoa', 'PB', '58025-030', '', '(83)9967-8634', 'aldacamboin@gmail.com', '', '2014-10-07 12:52:18', 1412679138, '', 1, '0'),
(382, NULL, 'Adne Abintes Beltrao', '', 5, NULL, '', '2009-05-12', 5, 'Avenida Mar Vermelho', '', '', 'Intermares', 'Cabedelo', 'PB', '58102-120', '(83)9921-2575', '(83)9969-8714', '', '', '2014-10-07 13:07:30', 1412680050, '', 1, '0'),
(383, NULL, 'Adaluza Barbosa de Lima', '', 54, NULL, '', '1960-01-10', 1, 'Rua Praia de Ponta Negra', '91', '', 'CuiÃ¡', 'JoÃ£o Pessoa', 'PB', '58077-017', '(83)3231-7469', '(83)8610-2754', 'adaluza10@yahoo.com', '', '2014-10-07 13:09:47', 1412680187, '', 1, '0'),
(384, NULL, 'FABIO FERNANDES C. DE ALMEIDA', '', 23, NULL, '', '1991-08-12', 8, 'av. Hilton Souto Maior ', '6701', '', 'Altiplano', 'Joao Pessoa', '0', '', '(83)8879-0811', '', 'felipelca45@hotmail.com', '', '2014-10-07 14:31:37', 1412685097, '', 1, '0'),
(385, NULL, 'FABIO EMANUEL DIAS VILLAR', '', 45, NULL, '552.744.714-04', '1969-01-20', 1, '', '', '', '', '', '0', '', '(83)8833-2882', '', 'sgtvillar@', '', '2014-10-07 15:11:47', 1412687507, '', 1, '0'),
(386, NULL, 'ALDA FRAN LUCENA CAMBOIM LAVOR', '', 55, NULL, '237.803.394-04', '1959-01-21', 1, 'Rua MaurÃ­cio de Oliveira', '715', '', 'Treze de Maio', 'JoÃ£o Pessoa', 'PB', '58025-030', '', '(83)9967-8434', 'aldacamboim@gmail.com', '', '2014-10-09 15:02:29', 1412859749, '', 1, '0'),
(387, '10102014151759.jpg', 'Soraya Laureano dos Santos', '', 53, '', '', '1961-03-01', 3, '', '', '', '', '', '0', '', '', '', '', '', '2014-10-10 15:17:40', 1412947060, '', 1, '0'),
(388, NULL, 'GERALDO ANTONIO CAVALCENTE DE MORAIS', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)9944-0066', '', '', '2014-10-13 15:16:49', 1413206209, '', 1, '0'),
(389, NULL, 'Alda Fran Lucena Camboim Lavor', '', 55, NULL, '237.803.394-04', '1959-01-21', 1, 'R.Mauricio de Oliveira', '715', '', '', '', '0', '', '', '(83)9967-8434', 'aldacamboim@gmail.com', '', '2014-10-17 15:14:29', 1413551669, '', 1, '0'),
(390, NULL, 'Andrea Ferreira de Paiva', '', 36, NULL, '', '1977-11-21', 11, 'Rua Ant&ocirc;nio Carlos Ara&uacute;jo', '100', 'apto 407', 'Cabo Branco', 'Jo&atilde;o Pessoa', 'PB', '58045-250', '', '(83)9920-9959', 'andreapplacios@yahoo.com', '', '2014-10-17 15:21:25', 1413552085, '', 1, '0'),
(391, NULL, 'Adalice Lucena Camboim', '', 79, NULL, '299.222.834-68', '1934-12-16', 12, 'R.Peregrino Filho', '502', '', '', '', '0', '', '(83)3421-3012', '', '', '', '2014-10-17 15:23:25', 1413552205, '', 1, '0'),
(392, NULL, 'Bianca Suassuna Lira de Farias', '', 21, NULL, '096.705.424-99', '1993-07-01', 7, 'R.Rejane Freire', '226', 'ed.Atlanta l, apto. 303', 'Bancarios', '', '0', '', '', '(83)9969-2954', 'biancasuassuna@hotmail.com', '', '2014-10-17 15:25:57', 1413552357, '', 1, '0');
INSERT INTO `pacientes` (`id`, `foto`, `nome`, `sexo`, `idade`, `estadoCivil`, `cpf`, `dataNascimento`, `mesNascimento`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `telefoneResidencial`, `telefoneCelular`, `email`, `profissao`, `data`, `timestamp`, `observacoes`, `status`, `tratamentos`) VALUES
(393, NULL, 'danielle Ferraz Veloso', '', 28, NULL, '061.554.184-46', '1985-11-13', 11, 'Rua Josias Lopes Braga', '514', 'Res.Floren&ccedil;a,apto 204', 'Banc&aacute;rios', 'Jo&atilde;o Pessoa', 'PB', '58051-800', '', '(83)8842-0021', 'danielleferraz_jp@hotmail.com', '', '2014-10-17 15:27:39', 1413552459, '', 1, '0'),
(394, NULL, 'Edno de Medeiros Garcia', '', 53, NULL, '333.194.304-59', '1961-04-04', 4, 'Maria Batista Junior', '55', 'ed Opera', '', '', '0', '', '', '(83)9332-9455', '', '', '2014-10-17 15:29:48', 1413552588, '', 1, '0'),
(395, NULL, 'Henrique Kinlanskas', '', 36, NULL, '269.845.618-33', '1978-02-28', 2, 'Rua Monsenhor Walfredo Leal', '77', 'tv tambau', 'Tambi&aacute;', 'Jo&atilde;o Pessoa', 'PB', '58020-540', '', '(83)3015-3702', 'henrique@tvtambau.com.br', '', '2014-10-17 15:32:00', 1413552720, 'superintendente da TV TAMBAU', 1, '0'),
(396, NULL, 'John Anderson Guimaraes da Silva', '', 33, NULL, '007.991.464-04', '1980-11-17', 11, 'Rua Severino Pereira da Silva', '109', '', 'Funcion&aacute;rios', 'Jo&atilde;o Pessoa', 'PB', '58079-232', '', '(83)8727-5423', 'johnanderson@hotmail.com', '', '2014-10-17 15:42:24', 1413553344, '', 1, '0'),
(397, NULL, 'Jose Maria Maia de Freitas', '', 62, NULL, '057.683.144-15', '1952-03-26', 3, 'Rua Monteiro Lobato', '601', 'apto. 1102', 'Tamba&uacute;', 'Jo&atilde;o Pessoa', 'PB', '58039-170', '', '(83)9980-0025', '', '', '2014-10-17 15:54:48', 1413554088, '', 1, '0'),
(398, NULL, 'Juliana Carmen Brito Rodrigues', '', 36, NULL, '021.014.774-16', '1978-02-27', 2, 'Rua Escriv&atilde;o Sebasti&atilde;o de Azevedo Bastos', '889', '', 'Mana&iacute;ra', 'Jo&atilde;o Pessoa', 'PB', '58038-490', '', '(83)9639-9753', 'brito.ju@gmail.com', '', '2014-10-17 16:00:55', 1413554455, '', 1, '0'),
(399, NULL, 'Jose Luiz Filho', '', 53, NULL, '251.239.204-04', '1961-09-07', 9, 'Rua Professora Maria Sales', '820', 'apto 101', 'Tamba&uacute;', 'Jo&atilde;o Pessoa', 'PB', '58039-130', '(83)8858-9780', '', '', '', '2014-10-17 16:02:08', 1413554528, '', 1, '0'),
(400, NULL, 'Jair Ribeiro Amaral', '', 60, NULL, '166.897.989-68', '1953-11-16', 11, 'Rua Paranagu&aacute;', '', '', 'Centro', 'Londrina', 'PR', '86020-030', '', '', '', '', '2014-10-17 16:03:32', 1413554612, '', 1, '0'),
(401, NULL, 'Kiara Danielle R. Duarte', '', 31, NULL, '007.775.584-75', '1983-03-25', 3, 'Rua Presidente Venceslau Braz', '', '', 'Bessa', 'Jo&atilde;o Pessoa', 'PB', '58035-220', '', '(83)8718-2068', 'mariaclara915@hotmail.com', '', '2014-10-17 16:06:04', 1413554764, '', 1, '0'),
(402, NULL, 'Mateus da Costa Cavalcanti', '', 28, NULL, '012.081.024-78', '1986-04-28', 4, 'Avenida Hilton Souto Maior', '', '', 'Portal do Sol', 'Jo&atilde;o Pessoa', 'PB', '58046-600', '', '(83)8894-3906', 'info.mateuscosta@gmail.com', '', '2014-10-17 16:09:37', 1413554977, '', 1, '0'),
(403, NULL, 'Maria Helena Rodrigues Formiga', '', 26, NULL, '077.769.204-01', '1988-09-07', 9, 'Rua Elias Cavalcanti de Albuquerque', '107', '', 'Cristo Redentor', 'Jo&atilde;o Pessoa', 'PB', '58070-400', '', '(83)8857-3105', '', '', '2014-10-17 16:10:55', 1413555055, '', 1, '0'),
(404, NULL, 'Magda Suely Fernades de Albuquerque', '', 53, NULL, '379.914.424-20', '1961-03-16', 3, 'Avenida Rio Grande do Sul', '1600', 'apto 402', 'Estados', 'Jo&atilde;o Pessoa', 'PB', '58030-021', '(83)9909-0039', '(83)8819-0099', 'magda_albuquerque@yahoo.com', '', '2014-10-17 16:13:22', 1413555202, '', 1, '0'),
(405, NULL, 'Maria de Fatima Costa Cavalcanti', '', 58, NULL, '176.756.854-15', '1956-07-22', 7, 'Av. Hilton Souto Maior', '6701', '', '', '', '0', '', '(83)8881-1956', '(83)9981-9959', 'mfcc22@yahoo.com', '', '2014-10-17 16:27:16', 1413556036, '', 1, '0'),
(406, NULL, 'Maria Carmen de Mendon&ccedil;a Brito', '', 67, NULL, '284.865.104-06', '1946-11-10', 11, 'Rua Escriv&atilde;o Sebasti&atilde;o de Azevedo Bastos', '889', 'apto 1204', 'Mana&iacute;ra', 'Jo&atilde;o Pessoa', 'PB', '58038-490', '', '(83)8815-3145', '', '', '2014-10-17 16:29:00', 1413556140, '', 1, '0'),
(407, NULL, 'Elidiane de Souza Santos', '', 29, NULL, '069.945.094-27', '1984-12-24', 12, '', '', '', '', '', '0', '58300-970', '', '(83)8737-5215', '', '', '2014-10-17 19:24:29', 1413566669, '', 1, '0'),
(408, NULL, 'Otavio Augusto de Oliveira', '', 20, NULL, '', '1994-01-23', 1, 'av. Senador Rui Carneiro', '853', 'apto 1301', '', '', '0', '', '(83)3243-0585', '', '', '', '2014-10-17 20:08:05', 1413569285, '', 1, '0'),
(409, NULL, 'VITOR HUGO CASTELLIANO', '', 40, NULL, '832.733.544-72', '1973-12-29', 12, '', '', '', '', '', '0', '', '', '(83)8800-0975', '', '', '2014-10-29 18:19:12', 1414603152, '', 1, ''),
(410, NULL, 'SAVIO ROMERO MEDEIROS FONSECA DE OLIVEIRA', '', 43, NULL, '619.277.594-04', '1971-05-11', 5, 'R. Joaquim Mesquita Filho', '390', 'apto 703', '', '', '0', '58037-105', '', '(83)8832-3337', 'savioromero@hotmail.com', '', '2014-10-29 19:55:03', 1414608903, '', 1, '1'),
(411, NULL, 'Soraya Laureano dos Santos', '', 53, NULL, '343.047.624-00', '1961-03-01', 3, 'Av. Sap&eacute;', '701', 'apto 302', 'mana&iacute;ra', 'joao pessoa', 'PB', '', '', '(83)8844-0093', '', '', '2014-10-29 20:07:29', 1414609649, '', 1, '3'),
(412, NULL, 'GIL Carvalho Almeida', '', 78, NULL, '', '1936-10-27', 10, 'AV. OCEANO PACIFICO', '1094', '', '', '', '0', '', '', '(83)8814-5005', '', '', '2014-10-29 20:23:03', 1414610583, '', 1, '3'),
(413, NULL, 'ALBA LUCIA E. RAPOSO', '', 61, NULL, '181.550.654-72', '1953-04-18', 4, 'R. Joao Teixeira de Carvalho', '253', '', 'Pedro Gondim', '', '0', '', '(83)3225-6790', '(83)8812-1885', '', 'MEDICA', '2014-10-29 20:30:46', 1414611046, '', 1, '1'),
(414, NULL, 'THIAGO GURGEL DE OLIVEIRA LEVY', '', 34, NULL, '', '1979-12-18', 12, 'R. Firmino Rocha Aguiar', '1033', 'apto803', 'Guararapes', 'Forteleza', '0', '60810-165', '', '(85)8761-4930', 'thiagolevy@marquise.com', '', '2014-11-04 12:39:57', 1415101197, '', 1, '1'),
(415, NULL, 'TELMA TEREZA COSTA MAGALH&Atilde;ES', '', 64, NULL, '', '1950-04-04', 4, 'Wolgran Robson V. Correia', '', '', '', '', '0', '58102-343', '', '(83)8640-1343', 'telma0404@gmail.com', '', '2014-11-04 12:44:02', 1415101442, '', 1, ''),
(416, NULL, 'Josefa Dantas Pinheiro', '', 75, NULL, '', '1939-02-28', 2, 'R.Juiz Navarro Filho', '127', '', '', '', '0', '', '', '(83)9626-4142', '', '', '2014-11-04 12:50:34', 1415101834, '', 1, ''),
(417, NULL, 'Josefa Jean R. Andrade', '', 40, NULL, '', '1973-12-23', 12, 'Agostinho Fonseca Neto', '170', '', '', 'Jo&atilde;o Pessoa', '0', '58073-470', '', '(83)8710-1683', '', '', '2014-11-04 12:56:14', 1415102174, '', 1, ''),
(418, NULL, 'Italo  M. R. Gonzaga', '', 29, NULL, '', '1985-07-19', 7, 'Pinheiro Machado', '283', '', '', '', '0', '', '', '', '', '', '2014-11-04 12:59:11', 1415102351, '', 1, ''),
(419, NULL, 'Izac Jose da Silva', '', 52, NULL, '', '1962-08-07', 8, 'Av. Marechal Deodoro  da Fonseca', '356', '', 'Torre', '', '0', '', '', '(81)9813-3131', '', '', '2014-11-04 13:01:09', 1415102469, '', 1, ''),
(420, NULL, 'Fabio Barbosa Rodrigues', '', 32, NULL, '010.844.864-90', '1982-06-24', 6, 'Praca Vnancio Neiva', '54', '', 'centro', 'Jo&atilde;o Pessoa', '0', '58011-020', '', '(83)8801-6321', 'fbrodrigues1982@yahoo.com', '', '2014-11-05 14:01:27', 1415192487, '', 1, '1'),
(421, NULL, 'AKIRA ISHIHARA JUNIOR', '', 38, NULL, '', '1976-09-18', 9, 'R. Golfo de Filandia', '110', 'apto 801', 'intermares', '', '0', '', '(83)9997-1539', '(83)8703-8727', 'akirajunior@hotmail.com', 'ENG. DE PESCA', '2014-11-07 14:36:00', 1415367360, 'indicacao de Dr. Luiz Ricardo', 1, '3'),
(422, NULL, 'AL&Ocirc;MIA ABRANTES DA SILVA', '', 44, NULL, '726.722.424-53', '1970-06-30', 6, 'Huerta F. de Melo', '214', 'apto 204', '', '', '0', '', '', '(83)9988-5913', 'alomiaabrantes@gmail.com', 'PROF. HISTORIADORA', '2014-11-07 14:47:47', 1415368067, '', 1, ''),
(423, NULL, 'ALEXANDRE OLIVEIRA DOS SANTOS', '', 37, NULL, '929.138.814-91', '1977-06-13', 6, 'Av,. MAR NEGRO', '', '', '', '', '0', '58102-051', '', '(83)8857-1669', '', 'EMPRES&Aacute;RIO', '2014-11-11 11:54:40', 1415703280, '', 1, ''),
(424, NULL, 'IRIS BEZERRA DE ALBUQUERQUE CHAVES', '', 65, NULL, '023.935.144-49', '1949-03-21', 3, 'R.Alice de Almeida', '94', 'apto 403b', '', '', '0', '58045-320', '(83)8700-3878', '(83)9375-9963', 'irisbchaves@gmail.com', 'PEDAGOGA', '2014-11-11 13:03:13', 1415707393, '', 1, ''),
(425, NULL, 'Lucila Lima de Oliveira', '', 22, NULL, '090.190.844-45', '1992-11-10', 11, 'R. Francisco Tavares de Oliveira', '58', '', '', '', '0', '58056-590', '', '(83)9600-0549', 'lucilalimao@hotmail.com', 'universit&aacute;ria', '2014-11-11 13:04:59', 1415707499, '', 1, ''),
(426, NULL, 'Jose Messias Ribeiro de Almeida', '', 62, NULL, '032.827.753-34', '1952-09-02', 9, '', '', '', '', 'FORTALEZA CEAR&Aacute;', '0', '60110-300', '', '(85)8402-0246', 'zemess@yahoo.com', 'Engenheiro civil', '2014-11-11 13:07:23', 1415707643, '', 1, '1'),
(427, NULL, 'Julio Cessar Peixoto Castelliano', '', 42, NULL, '609.433.515-53', '1972-04-12', 4, 'R.Lionildo F. Oliveira', '550', 'apto 104', '', '', '0', '', '', '(83)8854-7227', '', '', '2014-11-11 13:09:29', 1415707769, '', 1, ''),
(430, NULL, 'Ros&acirc;ngela Melo de Almeida', 'F', 46, NULL, '587.715.494-04', '1968-01-13', 1, 'Rua DR Manuel Pequeno da Nobrega', '30', '', 'Altiplano', 'Jo&atilde;o Pessoa', 'PB', '58046-270', '(83)8801-0014', '(83)3131-2084', 'rosamelo@oi.net.br', 'Tec. Telecomunica&ccedil;&otilde;s', '2014-11-12 22:33:13', 1415827993, 'A PACIENTE RELATA DOR NO OMBRO DIREITO.', 1, '1'),
(431, NULL, 'ALINE ROCHA PORDEUS GON&Ccedil;ALVES', '', 47, NULL, '', '1967-02-09', 2, 'DR. THOMAZ PIRES', '115', '', '', '', '0', '', '', '(83)9906-9396', '', 'COMERCIANTE', '2014-11-19 18:29:21', 1416418161, '', 1, ''),
(432, NULL, 'MARIA JOSE FERREIRA DE LIMA', '', 54, NULL, '', '1960-09-14', 9, 'R.CAETANO G. ALMEIDA', '106', '', 'MANG Vll', '', '0', '', '', '(83)8895-8124', '', '', '2014-11-19 18:36:57', 1416418617, '', 1, '1'),
(433, NULL, 'MARIA ALECINA CARDOSO DE SALES', '', 44, NULL, '020.925.874-80', '1970-02-10', 2, 'ADOLFO FERREIRA SOARES FILHO', '87', '', 'BANCARIOS', '', '0', '58052-170', '', '(83)8701-7534', '', '', '2014-11-19 18:38:50', 1416418730, '', 1, '1'),
(434, NULL, 'ELIANE OLIVIA MAIA', '', 55, NULL, '354.895.104-04', '1959-10-24', 10, 'MANOEL C. DE SOUZA', '95', 'APTO 802', '', '', '0', '', '', '(83)9302-6939', '', '', '2014-11-19 18:40:14', 1416418814, '', 1, '1'),
(435, '02122014195750.jpg', 'ANTONIO NETO HERMINIO NASCIMENTO', '', 20, '', '701.387.944-48', '1994-11-22', 11, '', '', '', '', '', '0', '', '', '(83)8887-1188', '', 'VENDEDOR', '2014-12-02 19:56:48', 1417546608, '', 1, ''),
(436, NULL, 'ALMIRO VIEIRA CARNEIRO', '', 69, NULL, '072.400.824-15', '1945-06-08', 6, 'R. MIGUEL S&Aacute;TIRO', '280', 'APTO 601', 'CABO BRANCO', 'Jo&atilde;o Pessoa', '0', '58045-110', '(83)3245-2887', '', '', 'ADVOGADO PUBLICO', '2014-12-16 17:59:45', 1418759985, '', 1, '1'),
(437, NULL, 'MARIA JOSE CACHO', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)3235-5649', '', '', '', '2014-12-16 18:04:44', 1418760284, '', 1, ''),
(438, NULL, 'KARLLENE RACHEL CACHO BELCHIOR', '', 32, NULL, '038.883.564-82', '1982-02-19', 2, '', '', '', '', '', '0', '', '', '(83)9622-5161', '', 'SERV.P&Uacute;BLICA', '2014-12-16 18:07:25', 1418760445, '', 1, ''),
(439, NULL, 'ALOMIA ABRANTES DA SILVA', '', 44, NULL, '726.722.424-53', '1970-06-30', 6, '', '', '', '', '', '0', '', '(83)9988-5913', '', '', 'PROF. HISTORIADORA', '2014-12-16 18:14:29', 1418760869, '', 1, ''),
(440, NULL, 'MARCOS FRANCISCO DE OLIVEIRA', '', 40, NULL, '953.307.804-97', '1974-05-06', 5, 'AV.FRANCISCO MOURA', '992', '13 DE MAIO', '', '', '0', '58025-650', '(83)8846-1974', '', '', 'ENGENHEIRO', '2014-12-16 18:35:48', 1418762148, '', 1, '1'),
(441, NULL, 'ANA CLAUDIA MAGALHAES JACOB', '', 45, NULL, '676.071.364-87', '1969-09-22', 9, 'R.ARMANDO VASCONCELOS', '163', '', '', 'Jo&atilde;o Pessoa', '0', '58043-080', '(83)8862-2209', '', 'ANAJACOB@OI.COM.BR', 'SERVIDORA PUBLICA', '2014-12-17 10:38:14', 1418819894, '', 1, '1'),
(442, NULL, 'ELINALDO BARBOSA COSTA (NALDO BARBOSA)', '', 45, NULL, '', '1969-04-18', 4, 'av.ACRE', '281', '', '', '', '0', '58030-230', '(83)8886-0110', '', 'nbmodels@gmail.com', 'AUTONOMO/APRESENTADOR', '2014-12-17 10:47:56', 1418820476, '', 1, ''),
(443, NULL, 'ANA CAROLINA MONTEIRO RABELO DA NOBREGA', '', 50, NULL, '334.149.711-00', '1964-04-22', 4, 'R. NEVINHA GONDIM DE OLIVEIRA', '66', 'APTO 1401', '', '', '0', '', '(83)8888-4948', '', '', 'EMPRESARIA', '2014-12-17 11:11:43', 1418821903, '', 1, '1'),
(444, '24042015114517.jpg', 'VALERIA MARIA GOMES GUIMAR&Atilde;ES', '', 61, '', '735.801.204-68', '1953-08-03', 8, 'R.Rita Carneiro Diniz', '40', 'casa 10', 'giesel', '', '0', '', '(83)3231-2729', '(83)9133-8230', 'VALERRYGG@YAHOO.COM.BR', '', '2014-12-18 09:51:23', 1418903483, '', 1, ''),
(445, NULL, 'ARIELA NOBREGA', '', 32, NULL, '012.539.964-23', '1982-02-07', 2, 'R. Silvio Lopes', '425', '', 'tambau', '', '0', '58039-190', '(83)8115-7724', '', '', 'ENFERMEIRA', '2014-12-18 16:35:23', 1418927723, '', 1, ''),
(446, NULL, 'NUBIA MARIA COSTA DE LUCENA', '', 33, NULL, '062.463.194-08', '1981-04-14', 4, 'R.MANOEL GONGO', '277', 'CASA 04', 'PONTA NEGRA', 'NATAL', '0', '', '(84)9992-4106', '', '', 'AUTONOMA', '2014-12-18 18:09:35', 1418933375, '', 1, ''),
(447, NULL, 'Ligia Maria tavares da silva', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8837-7303', '', '', '2015-01-12 10:29:30', 1421065770, '', 1, ''),
(448, NULL, 'BRIGIDA MARIA DE ARAUJO', '', 71, NULL, '095.564.004-00', '1943-11-15', 11, 'R. MARIA ESTHER B. C MESQUITA', '313', '', 'BAIRRO DOS IPES', 'JOAO PESSOA', '0', '', '(83)3224-8736', '(83)9905-1324', 'brigidaraujo@gmail.com', 'FUNCIONARIA PUBLICA', '2015-01-13 12:03:48', 1421157828, '', 1, '1'),
(449, NULL, 'ALEXANDRE OLIVEIRA DOS SANTOS', 'M', 37, NULL, '929.138.814-91', '1977-06-13', 6, 'AV.MAR NEGRO', '', '', '', '', '0', '58102-051', '(83)8857-1669', '', '', 'EMPRES&Aacute;RIO', '2015-01-20 09:04:34', 1421751874, '', 1, '1'),
(450, NULL, 'Vytor Gabriel C. T. Praxedes', '', 6, NULL, '', '2008-03-18', 3, '', '', '', '', '', '0', '', '(83)8630-0809', '', '', '', '2015-01-20 10:31:40', 1421757100, '', 1, '1'),
(451, NULL, 'DORALICE LUCENA CAMBOIM', '', 49, NULL, '752.832.044-72', '1965-08-14', 8, '', '', '', '', '', '0', '', '(83)8719-2316', '', '', 'ARQUITETA', '2015-01-20 10:35:50', 1421757350, '', 1, '1'),
(452, NULL, 'GEIZA HELENA NOGUEIRA PAIVA', '', 53, NULL, '395.417.204-63', '1961-08-15', 8, 'AV. SAPE', '1651', '', '', 'MANAIRA', '0', '', '(83)8848-5784', '', '', 'FUNC.PUBLICA', '2015-01-20 10:41:08', 1421757668, '', 1, '1'),
(453, NULL, 'GIUSEPPI MARCONI COUTINHO DE SOUZA FILHO', '', 20, NULL, '', '1994-12-27', 12, '', '', '', '', '', '0', '', '', '', '', '', '2015-01-20 10:42:01', 1421757721, '', 1, ''),
(454, NULL, 'GERMANA DALIA DE OLIVEIRA LIMA', '', 30, NULL, '052.495.994-35', '1984-02-19', 2, '', '', '', '', '', '0', '', '', '', '', '', '2015-01-20 10:43:21', 1421757801, '', 1, '1'),
(455, NULL, 'GUSTAVO PABLO O SARAIVA', '', 36, NULL, '', '1978-05-13', 5, '', '', '', '', '', '0', '', '', '', '', '', '2015-01-20 10:45:48', 1421757948, '', 1, '1'),
(456, NULL, 'HUMBERTO TROCOLLI JUNIOR', '', 47, NULL, '', '1967-02-02', 2, '', '', '', '', '', '0', '', '(83)8848-5829', '', '', '', '2015-01-20 10:46:42', 1421758002, '', 1, ''),
(457, NULL, 'JOANA COELI DELMIRO', '', 31, NULL, '056.454.394-22', '1983-07-15', 7, '', '', '', '', '', '0', '', '(83)8881-4566', '', '', 'FONOAUDIOLOGA', '2015-01-20 10:47:46', 1421758066, '', 1, ''),
(458, NULL, 'KATIA ADRIANO MATIAS DA SILVA', '', 28, NULL, '014.443.333-80', '1986-08-22', 8, '', '', '', '', '', '0', '', '', '', '', 'PROFESSORA', '2015-01-20 10:50:46', 1421758246, '', 1, '1'),
(459, NULL, 'KLLARA YUANNA ANDRADE FRAN&Ccedil;A', '', 0, NULL, '', '2014-10-25', 10, '', '', '', '', '', '0', '', '(83)8797-6817', '', '', '', '2015-01-20 11:01:26', 1421758886, '', 1, ''),
(460, '31032015095907.jpg', 'AYNAR OLIVEIRA DE ROSA- mae de Susel)', '', 76, '', '', '1938-04-09', 4, 'AV. EPITACIO PESSOA,4595', '', 'APTO 306-A', '', '', '0', '', '(83)3031-3810', '', '', 'APOSENTADA', '2015-01-20 15:22:04', 1421774524, '', 1, '1,3'),
(461, NULL, 'LUZIA LUCIANA COELHO CORREA SOARES', '', 41, NULL, '', '1973-03-20', 3, '', '', '', '', '', '0', '', '', '(83)9322-9201', '', 'PROF DE ED. F&Iacute;SICA', '2015-01-20 16:23:02', 1421778182, '', 1, ''),
(462, NULL, 'NORMA DE ANDRADE LIMA', '', 76, NULL, '804.866.304-04', '1938-05-25', 5, 'AV.MINAS GERAIS', '768', '', 'B. DOS ESTADOS', '', '0', '', '(83)3226-5331', '(83)8754-2999', '', 'PROFESSORA APOSENTADA', '2015-01-20 18:30:25', 1421785825, '', 1, '1'),
(463, '22052015080441.jpg', 'ISABELLA GOMES BELMIRO DE LIMA', '', 28, '', '063.072.814-30', '1986-03-27', 3, '', '', '', '', '', '0', '', '', '(83)9637-2345', '', 'GERENTE/EMPREENDEDORA', '2015-01-20 18:33:06', 1421785986, '', 1, '1'),
(464, NULL, 'Antonio Taesch', '', 12, NULL, '', '2002-12-31', 12, '', '', '', '', '', '0', '', '', '(83)8807-1120', '', 'estudante', '2015-01-21 10:03:57', 1421841837, '', 1, ''),
(465, NULL, 'BRUNO FALCAO', '', 28, NULL, '012.558.064-94', '1986-06-11', 6, 'AV. CABO BRANCO', '', '', '', '', '0', '', '', '(83)8787-1025', 'brunominiz@hotmail.com', 'ADMINISTRADOR', '2015-01-21 10:06:15', 1421841975, '', 1, '1'),
(466, NULL, 'DISCH FIEGFRED', '', 58, NULL, '', '1956-12-02', 12, '', '', '', '', '', '0', '', '', '', '', 'APOSENTADO', '2015-01-21 10:07:49', 1421842069, '', 1, '1'),
(467, NULL, 'DALILA CASDELLIANO DE VASCONCELO', '', 30, NULL, '054.812.798-05', '1984-02-07', 2, '', '', '', '', '', '0', '', '', '(83)8703-0706', '', 'PSICOLOGA', '2015-01-21 10:09:48', 1421842188, '', 1, ''),
(468, NULL, 'FLAVIO DUTRA DE MELO', '', 25, NULL, '067.918.464-37', '1989-06-21', 6, '', '', '', '', '', '0', '', '', '(83)9830-0137', '', 'ADVOGADO', '2015-01-21 10:11:10', 1421842270, '', 1, '1'),
(469, NULL, 'MARIA FILOMENA VARGAS DE OLIVEIRA', '', 59, NULL, '', '1955-07-13', 7, '', '', '', '', '', '0', '', '(83)3252-2459', '(83)9982-2832', '', 'PSICOLOGA', '2015-01-21 10:12:36', 1421842356, '', 1, ''),
(470, NULL, 'MARENICE MARANHAO COUTINHO DE SOUZA', '', 67, NULL, '237.840.914-15', '1947-02-21', 2, '', '', '', '', '', '0', '', '(83)3247-3732', '', '', '', '2015-01-21 10:13:24', 1421842404, '', 1, ''),
(471, NULL, 'JOSE MARCONI MEDEIROS DE SOUZA', '', 66, NULL, '020.459.664-53', '1948-09-05', 9, '', '', '', '', '', '0', '', '(83)3247-3732', '(83)9921-9890', '', '', '2015-01-21 10:14:51', 1421842491, '', 1, ''),
(472, NULL, 'JOSE ERIVALDO VIEIRA', '', 58, NULL, '203.055.594-00', '1956-09-02', 9, 'R. DOM ZACARIAS ROLIM DE MOURA', '26', '', '', '', '0', '', '', '(83)9954-5019', 'joseerivaldovieira@hotmail.com', 'PROFESSOR', '2015-01-21 10:17:37', 1421842657, '', 1, ''),
(473, NULL, 'JOSE JOAQUIM DE OLIVEIRA GOMES NETO(neto carminha)', '', 20, NULL, '103.425.527-14', '1994-12-01', 12, '', '', '', '', '', '0', '', '(21)3410-0344', '', 'joaquim_neto1@hotmail.com', 'ESTUDANTE', '2015-01-21 10:19:27', 1421842767, '', 1, ''),
(474, '01042015105307.jpg', 'LUCAS PINHEIRO CORREA', '', 20, '', '095.551.264-61', '1994-09-14', 9, '', '', '', '', '', '0', '58053-000', '', '(83)9956-5792', 'lup.correa@gmail.com', 'ESTUDANTE', '2015-01-21 10:21:04', 1421842864, '', 1, ''),
(475, NULL, 'PRISCILA L. C. DE CASTRO', '', 51, NULL, '', '1963-06-13', 6, '', '', '', '', '', '0', '', '', '(83)9922-4222', '', 'BANCARIA', '2015-01-21 10:22:50', 1421842970, '', 1, ''),
(476, NULL, 'OMAR HUGO MARGINEZ', '', 65, NULL, '008.472.204-51', '1949-10-02', 10, '', '', '', '', '', '0', '', '', '(83)8650-8999', '', '', '2015-01-21 10:23:49', 1421843029, '', 1, ''),
(477, NULL, 'OZELIA LIMA SILVA', '', 55, NULL, '424.058.747-68', '1959-06-03', 6, '', '', '', '', '', '0', '', '(83)3245-8841', '(83)8841-8130', '', 'APOSENTADA', '2015-01-21 10:24:52', 1421843092, '', 1, ''),
(478, NULL, 'VILMARIA FERNANDES SALES', '', 57, NULL, '251.976.064-87', '1957-02-19', 2, '', '', '', '', '', '0', '', '', '(83)8772-5829', 'vilmaria1@yahoo.com', 'PROFESSORA', '2015-01-21 10:30:53', 1421843453, '', 1, ''),
(479, NULL, 'ALESSANDRO MACEDO SOARES', '', 44, NULL, '568.851.994-00', '1970-02-13', 2, 'R.JOAO ROBERTO BORGES', '99', '', '', '', '0', '', '(83)9103-6757', '(83)3228-1273', '', 'EMPRES&Aacute;RIO', '2015-01-22 09:11:39', 1421925099, '', 1, '1,3'),
(480, NULL, 'ANA KARENINA KUMAMOTO AQUINO', '', 35, NULL, '032.623.424-16', '1979-09-20', 9, 'R.BANCARIO ELIAS FELICIANO MADRUGA', '300', '', '', '', '0', '', '', '(83)9106-1567', '', 'M&Eacute;DICA', '2015-01-22 09:13:07', 1421925187, '', 1, ''),
(481, NULL, 'ANTONIO NETO HENRIQUE NASCIMENTO', '', 20, NULL, '701.387.944-48', '1994-11-22', 11, '', '', '', '', '', '0', '', '', '', '', 'VENDEDOR', '2015-01-22 09:14:28', 1421925268, '', 1, ''),
(482, NULL, 'ADRIANA SILVA GAMA', '', 49, NULL, '', '1965-09-29', 9, '', '', '', '', '', '0', '', '', '(83)8887-4727', '', '', '2015-01-22 09:24:08', 1421925848, '', 1, ''),
(483, NULL, 'ADERALDO BEZERRA DOS SANTOS', '', 26, NULL, '', '1988-02-23', 2, '', '', '', '', '', '0', '', '', '', '', '', '2015-01-22 09:34:48', 1421926488, '', 1, ''),
(484, NULL, 'DANIELA CARVALHO M. WANDERLEY', '', 33, NULL, '008.362.844-45', '1981-08-02', 8, 'R. PAULO FRAN&Ccedil;A MARINHO', '101', '', '', '', '0', '', '', '(83)8802-1281', '', 'ADVOGADA', '2015-01-22 10:44:46', 1421930686, '', 1, ''),
(485, NULL, 'DOUGLAS DE LUCENA NOBREGA', '', 42, NULL, '874.454.844-34', '1972-11-13', 11, '', '', '', '', '', '0', '', '', '(83)8610-4808', '', 'PROFESSOR', '2015-01-22 10:46:08', 1421930768, '', 1, '1,3'),
(486, NULL, 'FRANCISCO T. DE SOUZA', '', 58, NULL, '', '1956-05-31', 5, '', '', '', '', '', '0', '', '', '', '', '', '2015-01-22 10:47:04', 1421930824, '', 1, ''),
(487, NULL, 'GIL CARVALHO ALMEIDA', '', 78, NULL, '', '1936-10-23', 10, '', '', '', '', '', '0', '', '', '', '', '', '2015-01-22 10:48:06', 1421930886, '', 1, ''),
(488, NULL, 'MARCOS FRANCISCO DE OLIVEIRA', '', 40, NULL, '953.307.804-97', '1974-05-06', 5, '', '', '', '', '', '0', '', '', '(83)8846-1974', '', 'ENFERMEIRO', '2015-01-22 10:49:56', 1421930996, '', 1, ''),
(489, NULL, 'MARCILIO CARNEIRO DIAS', '', 40, NULL, '021.089.864-05', '1974-11-20', 11, 'R.JOAO GALIZA DE ANDRADE', '204', '', '', '', '0', '', '(83)9689-6445', '(83)8849-1024', '', 'PROFESSOR', '2015-01-23 11:43:21', 1422020601, '', 1, ''),
(490, NULL, 'JOAO BOSCO GERMANO', '', 80, NULL, '004.935.204-06', '1934-10-06', 10, '', '', '', '', '', '0', '', '(83)3224-1772', '(83)9305-6996', '', 'PSICOTERAPEUTA', '2015-01-23 16:59:36', 1422039576, '', 1, ''),
(491, NULL, 'JADER APARECIDO VASCONCELOS DA ROCHA', '', 47, NULL, '400.080.214-53', '1967-03-09', 3, '', '', '', '', '', '0', '', '(83)8838-9131', '(83)9982-2540', '', 'EMPRES&Aacute;RIO', '2015-01-23 17:01:41', 1422039701, '', 1, '1'),
(492, NULL, 'ELEN LISIANE MOURA SOUSA DO NASCIMENTO -fusex', '', 23, NULL, '', '1991-09-16', 9, '', '', '', '', '', '0', '', '(83)9802-4003', '', '', '', '2015-01-26 15:58:56', 1422295136, '', 1, ''),
(493, NULL, 'MAYARA RIBEIRO ALENCAR-FUSEX', '', 32, NULL, '013.012.164-96', '1982-06-03', 6, '', '', '', '', '', '0', '', '', '', '', 'FISIOTERAPEUTA', '2015-01-26 16:02:29', 1422295349, '', 1, ''),
(494, '31032015091348.jpg', 'ELIZAMA ARAUJO SILVA', '', 48, '', '021.123.384-63', '1967-01-26', 1, '', '', '', '', '', '0', '', '(83)8734-2142', '', '', 'EMPRES&Aacute;RIA', '2015-01-26 16:04:38', 1422295478, '', 1, '1,3'),
(495, NULL, 'BRIGIDA MARIA DE ARAUJO', '', 71, NULL, '095.564.004-00', '1943-11-15', 11, '', '', '', '', '', '0', '', '(83)3224-8736', '', '', '', '2015-01-26 16:20:13', 1422296413, '', 1, ''),
(496, NULL, 'JOANA DARC. DA SILVA - Pr&oacute; vida', '', 50, NULL, '', '1964-02-18', 2, '', '', '', '', '', '0', '', '(83)8836-1473', '', '', '', '2015-01-26 16:30:19', 1422297019, '', 1, ''),
(497, NULL, 'MERCIA MARIA DE FREITAS HOLANDA', '', 57, NULL, '141.241.064-91', '1957-06-11', 6, '', '', '', '', '', '0', '', '(83)3031-1139', '(83)8772-5172', '', 'APOSENTADA', '2015-01-26 16:54:18', 1422298458, '', 1, '1'),
(498, NULL, 'MONICA MARQUES GOMES', '', 46, NULL, '', '1968-02-27', 2, '', '', '', '', '', '0', '', '', '', '', 'TEC. ENFERMAGEM', '2015-01-26 17:01:49', 1422298909, '', 1, '1'),
(499, NULL, 'PAULO HENRIQUE ROCHA COSTA', '', 36, NULL, '031.130.754-08', '1979-01-15', 1, '', '', '', '', '', '0', '', '', '(83)9922-5943', '', 'BANCARIO', '2015-01-26 17:03:03', 1422298983, '', 1, '1,3'),
(500, NULL, 'PAULO FERREIRA HERCULANO', '', 39, NULL, '028.867.764-16', '1975-04-26', 4, '', '', '', '', '', '0', '', '', '(83)8808-1134', '', 'TEC DE ENFERMAGEM', '2015-01-26 17:04:13', 1422299053, '', 1, ''),
(501, NULL, 'ROSANE MARIA P GARCIA', '', 51, NULL, '424.279.324-34', '1963-10-13', 10, '', '', '', '', '', '0', '', '', '(83)9982-0155', '', '', '2015-01-26 17:05:52', 1422299152, '', 1, ''),
(502, NULL, 'ROMUALDO DA SILVA ARAUJO', '', 63, NULL, '086.712.221-87', '1951-09-27', 9, 'R.Dep.LUIZ CLEMENTINO', '69', '', 'jaguaribe', '', '0', '', '', '(83)8766-0927', '', '', '2015-01-26 17:09:38', 1422299378, '', 1, ''),
(503, NULL, 'REBECA GARCIA TAVARES', '', 20, NULL, '009.471.034-14', '1994-05-14', 5, '', '', '', '', '', '0', '', '', '(83)9958-5640', '', '', '2015-01-26 17:11:17', 1422299477, '', 1, ''),
(504, NULL, 'SEVERINA CARVALHO DA SILVA', '', 58, NULL, '507.575.127-04', '1956-05-09', 5, '', '', '', '', '', '0', '', '(83)8817-9164', '(83)9916-7467', '', '', '2015-01-26 17:14:18', 1422299658, '', 1, ''),
(505, NULL, 'SUDERLANDIA GOMES DE OLIVEIRA', '', 25, NULL, '076.933.984-06', '1989-06-16', 6, '', '', '', '', '', '0', '', '(83)8883-3056', '(83)8612-0865', '', '', '2015-01-26 17:17:50', 1422299870, '', 1, ''),
(506, NULL, 'SASKYA THEREZA GURGEL', '', 24, NULL, '', '1991-01-15', 1, '', '', '', '', '', '0', '', '', '', '', '', '2015-01-26 17:20:10', 1422300010, '', 1, ''),
(507, NULL, 'VALTER MEDEIROS MACIEIRA', '', 51, NULL, '', '1963-07-20', 7, '', '', '', '', '', '0', '', '', '', '', '', '2015-01-26 17:21:02', 1422300062, '', 1, ''),
(508, NULL, 'ISABEL CRISTINA DE OLIVEIRA', '', 45, NULL, '', '1969-12-18', 12, '', '', '', '', '', '0', '', '', '(83)9946-5410', '', '', '2015-01-27 08:50:03', 1422355803, '', 1, '1,3'),
(509, NULL, 'JANAINA DOLIVEIRA', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8824-0005', '', '', '2015-01-27 08:51:06', 1422355866, '', 1, ''),
(510, NULL, 'JOSEMIR BARBOSA', '', 41, NULL, '789.773.204-53', '1973-12-17', 12, '', '', '', '', '', '0', '', '', '(83)8710-7095', '', 'ENG.ELETRICISTA', '2015-01-27 08:54:41', 1422356081, '', 1, '1,3'),
(511, NULL, 'LIVIA RAQUEL DE SOUSA CARVALHO- fusex', '', 41, NULL, '617.475.993-87', '1974-01-06', 1, '', '', 'R.IOLANDA ELOY DE MEDEIROS', '101', '', '0', '', '', '(83)8811-6415', '', '', '2015-01-27 08:56:43', 1422356203, '', 1, '1,3'),
(512, NULL, 'JADER APARECIDO VASCONCELOS DA ROCHA', '', 47, NULL, '400.680.214-53', '1967-03-09', 3, 'AV. GIL FURTADO', '45', '', '', '', '0', '', '(83)8838-9131', '(83)9982-2540', '', 'EMPRES&Aacute;RIO', '2015-01-27 16:45:40', 1422384340, '', 1, ''),
(513, NULL, 'MARIA DA PAZ SANTOS', '', 82, NULL, '', '1932-03-08', 3, 'R. RAUL HENRIQUE DE S&Aacute;', '84', 'BLOCO B APTO 108', 'TAMBIA', '', '0', '58020-671', '', '(83)8812-8087', '', '', '2015-01-29 08:21:03', 1422526863, '', 1, ''),
(514, NULL, 'HENRIQUE JOSE AMAZONAS RODRIGUES', '', 33, NULL, '093.983.537-17', '1981-05-15', 5, '', '', '', '', '', '0', '', '(83)3506-1744', '(83)8765-4623', '', 'MILITAR/EXERCITO', '2015-01-29 14:59:21', 1422550761, '', 1, ''),
(515, NULL, 'Cassio Cunha Lima', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)9362-0709', '', '', 'Senador da Republica', '2015-01-30 07:44:50', 1422611090, '', 1, ''),
(516, NULL, 'CARMEM LUCIA DE OLIVEIRA LIMA', 'F', 58, NULL, '204.287.234-20', '1956-04-01', 4, 'AV. ALM. TAMANDAR&Eacute;', '844', '', '', '', '0', '58059-010', '(83)3226-6590', '(83)9980-8114', '', 'ADMINISTRADORA (APOSENTADA)', '2015-01-30 15:22:14', 1422638534, '', 1, ''),
(517, NULL, 'LORENA EMILIA ARAUJO TUPINANBA DAR&Oacute;S', '', 38, NULL, '779.881.165-68', '1976-09-29', 9, 'RUA IRM&Atilde;O ANTONIO REGINALDO', '478', '', 'BESSA', 'JO&Atilde;O PESSOA', '0', '', '(83)3248-4640', '(83)8708-6970', '', '', '2015-02-04 08:43:55', 1423046635, '', 1, ''),
(518, '01042015105050.jpg', 'LICIA VILAR PRUDENTE', '', 73, '', '021.844.527-00', '1941-06-21', 6, 'R DA CANDELARIA', '93', '', '', '', '0', '58038-620', '(83)3508-4122', '(83)8804-1624', '', 'DO LAR', '2015-02-04 08:54:25', 1423047265, '', 1, ''),
(519, '01042015105116.jpg', 'LUZIANO PRUDENTE OLIVEIRA', '', 78, '', '093.404.597-68', '1936-10-11', 10, 'RUA DA CANDEL&Aacute;RIA', '93', 'APTO 1703', 'MANAIRA', '', '0', '', '', '(83)8886-1325', '', 'ADVOGADO DE EMPRESA (APOSENTADO)', '2015-02-04 09:31:37', 1423049497, '', 1, '1,3'),
(520, NULL, 'KALINA DE O. LIMA MARQUES', '', 39, NULL, '021.806.454-30', '1975-12-17', 12, 'R. DAS ACACIAS', '100', '', 'MIRAMAR', 'JOAO PESSOA', '0', '', '(83)9988-7440', '(83)8804-4549', '', 'JUIZA', '2015-02-04 17:23:47', 1423077827, '', 1, '1,3'),
(521, NULL, 'DEUSDETE QUEIROGA FILHO', '', 51, NULL, '343.068.204-59', '1963-10-27', 10, 'AV. UMBUZEIRO', '630', 'APTO 602', 'MANAIRA', 'JOAO PESSOA', '0', '', '', '(83)8654-3045', '', 'ENG.CIVIL', '2015-02-05 10:08:15', 1423138095, '', 1, '1,3'),
(522, NULL, 'VICENTE CARLOS DE ALMEIDA PACHECO JR.', '', 47, NULL, '136.537.588-90', '1967-09-14', 9, 'AV. EDSON RAMALHO', '190', '', 'MANAIRA', 'JOAO PESSOA', '0', '', '', '(83)9921-7967', '', 'DENTISTA', '2015-02-06 12:48:30', 1423234110, '', 1, '1,3'),
(523, NULL, 'MARJORI TIMOTEO', '', 37, NULL, '938.571.010-91', '1978-01-23', 1, 'R. FRANCISCO DIOMEDE CANTALICE', '21', '', 'CABO BRANCO', '', '0', '', '(83)8784-4929', '', '', 'MILITAR', '2015-02-10 16:50:06', 1423594206, '', 1, ''),
(524, NULL, 'ROMERO VELOROSO DA SILVEIRA', '', 53, NULL, '', '1961-05-04', 5, '', '', '', '', '', '0', '58038-161', '(83)9362-6975', '(83)9983-5041', '', 'ADVOGADO', '2015-02-19 10:02:43', 1424347363, '', 1, ''),
(525, NULL, 'Sonia Maria de Lima Souza', '', 48, NULL, '', '1966-07-07', 7, '', '', '', '', '', '0', '58306-372', '', '(83)8703-9728', '', 'assistente administrativo', '2015-02-23 15:44:58', 1424717098, '', 1, '1,3'),
(526, '31032015112848.jpg', 'Edmilson Furtado Lacerda', '', 50, '', '486.190.434-04', '1964-05-09', 5, 'R. GOLFO SAN FERNANDO', '45', '', 'INTERMARES', 'CABEDELO', '0', '', '(83)9355-1515', '(83)8680-6764', '', 'F. P&Uacute;BLICO', '2015-03-18 07:33:24', 1426674804, '', 1, '1,3'),
(527, NULL, 'NAPOLEAO TARGINO PORTO ALBUQUERQUE', '', 33, NULL, '036.819.754-93', '1981-11-22', 11, 'R. PADRE AYRES', '392', '', 'MIRAMAR', '', '0', '58043-260', '(83)8866-0000', '', '', 'CONSTRUTOR', '2015-03-18 07:35:39', 1426674939, '', 1, '1,3'),
(528, NULL, 'NEUZA MARTINS DA SILVA', '', 64, NULL, '062.107.414-44', '1950-10-04', 10, 'R. NOSSA SENHORA DA LUZ', '176', '', 'MANGABEIRA ll', '', '0', '', '(83)8808-3553', '', '', 'DONA DE CASA', '2015-03-18 07:37:08', 1426675028, '', 1, ''),
(529, NULL, 'NILTON CESAR DOVETTS SARMENTO', '', 40, NULL, '', '1974-06-06', 6, 'AV. 13 DE MAIO', '518', '', 'JAGUARIBE', '', '0', '', '(83)9996-0501', '(83)8858-1775', '', 'CORRETOR DE SEGUROS', '2015-03-18 07:39:21', 1426675161, '', 1, ''),
(530, NULL, 'NO&Eacute; LIMA CAVALCANTE', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)3512-9002', '(83)9620-2821', '', '', '2015-03-18 07:40:47', 1426675247, '', 1, ''),
(531, '24042015111833.jpg', 'ANTONIO VIEIRA DE OLIVEIRA', '', 61, '', '062.264.003-82', '1953-07-14', 7, '', '', '', '', '', '0', '', '(83)9983-9763', '', '', '', '2015-03-18 07:46:23', 1426675583, '', 1, ''),
(532, NULL, 'ADRIANA LORENZET', '', 33, NULL, '035.649.509-40', '1981-07-15', 7, 'R. SEVERINO PEREIRA DE ARAUJO', '151', 'APTO 1302', 'MANAIRA', '', '0', '', '', '', '', 'MEDICA', '2015-03-18 07:47:36', 1426675656, '', 1, '1,3'),
(533, NULL, 'ALECSSANDRO MONTEIRO KRAMER', '', 0, NULL, '674.663.974-68', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '', '', '', '2015-03-18 07:49:01', 1426675741, '', 1, '1,3'),
(534, NULL, 'ADELAIDE PEREIRA REGIS', '', 26, NULL, '083.652.624-44', '1988-06-05', 6, '', '', '', '', '', '0', '', '', '(83)8765-6610', '', '', '2015-03-18 07:50:08', 1426675808, '', 1, '1,3'),
(535, NULL, 'RICARDO F. MAIA', '', 50, NULL, '395.591.814-91', '1964-04-12', 4, '', '', '', '', '', '0', '', '', '', '', '', '2015-03-18 07:52:02', 1426675922, '', 1, ''),
(536, NULL, 'RENATO CASIMIRO DE ASSIS', '', 30, NULL, '045.984.384-28', '1985-01-29', 1, 'R. DEPUTADO GERALDO MARIZ', '850', '', '', '', '0', '', '(83)8126-0669', '(83)8759-5029', '', 'EMPRESARIO', '2015-03-18 07:55:08', 1426676108, '', 1, ''),
(537, '31032015163917.jpg', 'RUBEN CARLOS RODRIGUES ANDRADE MITREF', '', 0, '', '472.812.517-34', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '(83)8609-2080', '', 'INDUSTRI&Aacute;RIO', '2015-03-18 08:02:48', 1426676568, '', 1, ''),
(538, NULL, 'RAIMUNDO MARTINS DE ANDRADE', '', 52, NULL, '166.701.913-31', '1962-04-27', 4, '', '', '', '', '', '0', '', '', '', '', 'EMPRES&Aacute;RIO', '2015-03-18 08:07:37', 1426676857, '', 1, ''),
(539, NULL, 'MARIA JOSE PAIVA  -FUSEX', '', 69, NULL, '', '1945-06-04', 6, '', '', '', '', '', '0', '', '', '(83)8804-8833', '', 'DO LA', '2015-03-19 14:37:17', 1426786637, '', 1, ''),
(540, NULL, 'ANTONIO SILVEIRA NETO', '', 43, NULL, '602.245.504-97', '1971-08-11', 8, 'R. JOSE AURELIO DE OLIVEIRA', '74', '', 'CABEDELO', '', '0', '58102-312', '', '(83)8866-0433', '', 'JUIZ', '2015-03-25 14:49:32', 1427305772, '', 1, ''),
(541, '01042015092632.jpg', 'ANTONIO DE SOUZA CASTRO', '', 73, '', '072.475.914-04', '1941-07-09', 7, '', '', '', '', '', '0', '', '', '(83)3223-4696', '', 'CONTADOR-AUDITOR DE CONTAS P&Uacute;BLICA', '2015-03-25 15:00:07', 1427306407, '', 1, ''),
(542, NULL, 'ANA BEATRIZ BRAZ CHAVES', '', 13, NULL, '', '2001-11-15', 11, 'AV. JULIA FREIRE', '1414', 'APTO 103', 'EXPEDICIONARIOS', '', '0', '58041-000', '', '(83)8804-1564', '', 'ESTUDANTE', '2015-03-25 15:01:49', 1427306509, '', 1, ''),
(543, NULL, 'ANA FLAVIA MONTEIRO DA NOBREGA TORRES', '', 33, NULL, '089.965.674-93', '1981-07-02', 7, 'NEVINHA GONDIM DE OLIVEIRA', '66', '', 'BRISAMAR', '', '0', '', '', '', '', 'ADVOGADA', '2015-03-25 15:03:45', 1427306625, '', 1, '1'),
(544, NULL, 'ANTONIO LUIZ XIMENES', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '(83)9372-4722', '', '', '', '2015-03-25 15:05:46', 1427306746, '', 1, ''),
(545, NULL, 'CLAUDETE DE MEDEIROS SALES', '', 81, NULL, '', '1933-11-14', 11, 'AV. SAO PAULO', '1463', '', '', '', '0', '', '', '', '', '', '2015-03-26 15:26:59', 1427394419, '', 1, ''),
(546, NULL, 'INES BARBOSA BESERRA', '', 85, NULL, '', '1930-01-27', 1, '', '', '', '', '', '0', '58033-090', '(83)3283-2484', '(83)8800-9782', '', 'APOSENTADA', '2015-03-26 15:40:26', 1427395226, '', 1, ''),
(547, NULL, 'JULLYANE BALTAR DIOGO POMPEU', '', 25, NULL, '025.555.271-84', '1990-03-09', 3, 'R. PRESIDENTE KENNEDY', '571', '', 'TAMBAUZINHO', '', '0', '', '(83)8836-8660', '(83)9960-8475', '', 'ESTUDANTE DE JORNALISMO', '2015-03-27 07:15:41', 1427451341, '', 1, '1'),
(548, NULL, 'MARIA LUCIA DO NASCIMENTO CASTRO', '', 63, NULL, '', '1951-12-21', 12, 'R. COMPOSITOR AGUSTINHO LARA', '1740', '', 'CRISTO', '', '0', '58071-141', '', '', '', 'PROFESSORA APOSENTADA', '2015-03-27 07:17:20', 1427451440, '', 1, '1,3'),
(549, NULL, 'SHEYLA CLARA MONTEIRO AUGUSTO DE QUEIROZ', '', 64, NULL, '', '1950-12-24', 12, 'R. GERALDO COSTA', '350', 'APTO 202 ED. POLIEDRO ll', '', '', '0', '', '', '(83)9922-2133', '', 'ADVOGADA', '2015-03-27 07:19:45', 1427451585, '', 1, '1,3'),
(550, NULL, 'TARCISIO DE ARAUJO GUEDES DE S. L MAIA', '', 28, NULL, '064.941.264-80', '1986-09-17', 9, '', '', '', '', '', '0', '58020-600', '(83)8844-6346', '', '', 'F.P&Uacute;BLICO', '2015-03-27 07:21:48', 1427451708, '', 1, ''),
(551, NULL, 'ALEXANDRE CESAR DE MELLO MAROJA LIMEIRA', '', 30, NULL, '054.497.784-06', '1984-04-11', 4, '', '', '', '', '', '0', '58042-005', '(83)9322-2222', '', 'alexandremaroja@hotmail.com', 'SERV.P&Uacute;BLICO', '2015-03-31 07:08:38', 1427796518, '', 1, '1,3'),
(552, NULL, 'DANILA DE ARAUJO BARBOSA', '', 31, NULL, '052.591.474-99', '1983-12-10', 12, '', '', '', '', '', '0', '', '', '(83)8866-3894', '', 'BIOL&Oacute;GA', '2015-03-31 07:24:02', 1427797442, '', 1, '1,3'),
(553, NULL, 'DENIEIRES P NASCIMENTO', '', 47, NULL, '526.690.174-87', '1967-08-04', 8, 'R. DAS MACIEIRAS', '131', '', 'CABEDELO', '', '0', '', '(83)3221-3467', '(83)8859-1182', '', 'CABELEIREIRO', '2015-03-31 07:25:54', 1427797554, '', 1, ''),
(554, NULL, 'ELZA DA COSTA BANDEIRA', '', 68, NULL, '690.860.954-53', '1946-08-10', 8, '', '', '', '', '', '0', '58038-070', '', '(83)8867-8229', '', 'ADVOGADA', '2015-03-31 07:27:18', 1427797638, '', 1, '1,3'),
(555, NULL, 'GUILHERME FONTES QUEIROGA', '', 25, NULL, '070.205.234-55', '1989-09-28', 9, '', '', '', '', '', '0', '58032-000', '', '(83)8809-0007', '', 'ENGENHEIRO CIVIL', '2015-03-31 07:29:00', 1427797740, '', 1, '1,3'),
(556, NULL, 'GENILDA TARGINO DA SILVA', '', 43, NULL, '789.711.524-00', '1971-10-05', 10, '', '', '', '', '', '0', '', '', '', '', 'ADMINISTRADORA', '2015-03-31 07:30:20', 1427797820, '', 1, ''),
(557, NULL, 'KARINA CAMILO DE ARAUJO', '', 39, NULL, '021.087.154-79', '1976-03-11', 3, '', '', '', '', '', '0', '', '', '', '', 'EMPRES&Aacute;RIA', '2015-03-31 07:31:30', 1427797890, '', 1, ''),
(558, '02042015090818.jpg', 'EDNA SOARES DE LIMA', '', 23, '', '097.241.024-40', '1991-04-18', 4, '', '', '', '', '', '0', '', '', '(83)9100-6004', '', 'EMPRES&Aacute;RIA', '2015-03-31 08:27:11', 1427801231, '', 1, ''),
(559, NULL, 'ELIZAMA ARAUJO SILVA', '', 48, NULL, '021.123.384-63', '1967-01-26', 1, 'LUZIA SIMOES SERTOLINO', '78', '', 'BESSA', '', '0', '', '(83)8734-2142', '', '', '', '2015-03-31 08:36:20', 1427801780, '', 1, ''),
(560, '31032015095947.jpg', 'SUSEL OLIVEIRA DA ROSA', '', 39, '', '', '1975-12-19', 12, '', '', '', '', '', '0', '58039-000', '(83)8894-3832', '(83)9626-4449', '', 'PROFESSORA', '2015-03-31 09:59:37', 1427806777, '', 1, '1,2,3'),
(561, '31032015113840.jpg', 'FRANCIANA SERRANO QUEIROZ', '', 46, '', '676.595.354-04', '1969-01-30', 1, '', '', '', '', '', '0', '58030-230', '(83)8856-7365', '', '', 'psicologa', '2015-03-31 11:38:15', 1427812695, '', 1, '1,2'),
(562, '08042015114836.jpg', 'MARIA DAS GRACAS DE LIRA CAVALCANTE', '', 65, '', '690.865.914-34', '1950-02-21', 2, '', '', '', '', '', '0', '', '(83)3248-4573', '(83)8888-5859', '', 'APOSENTADA', '2015-03-31 16:48:34', 1427831314, '', 1, ''),
(563, NULL, 'JOANA DARC. DA SILVA (PRO VIDA)', '', 51, NULL, '', '1964-02-18', 2, '', '', '', '', '', '0', '', '', '', '', 'DESEMPREGADA', '2015-03-31 16:50:01', 1427831401, '', 1, ''),
(564, '31032015180022.jpg', 'ALECSANDRO MONTEIRO KRAMER', '', 0, '', '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '', '', '', '2015-03-31 18:00:06', 1427835606, '', 1, ''),
(565, '01042015105504.jpg', 'MARIA CLARA R. DUARTE FUSEX', '', 0, '', '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '', '', '', '2015-04-01 10:54:48', 1427896488, '', 1, ''),
(566, '02042015090224.jpg', 'JOSE ELZO ARAUJO SILVA', '', 24, '', '', '1990-07-19', 7, '', '', '', '', '', '0', '', '', '', '', 'COMERCIANTE', '2015-04-02 08:58:17', 1427975897, '', 1, ''),
(567, NULL, 'ALEXANDRE CESAR DE MELO M LIMEIRA', '', 30, NULL, '054.497.784-06', '1984-04-11', 4, '', '', '', '', '', '0', '58042-005', '', '(83)9322-2222', '', 'SERV. PUBLICO', '2015-04-02 09:01:26', 1427976086, '', 1, ''),
(568, '02042015091007.jpg', 'MARLENE DA SILVA - FUSEX', '', 69, '', '', '1945-05-06', 5, '', '', '', '', '', '0', '', '(83)8873-2601', '', '', 'DO LAR', '2015-04-02 09:09:52', 1427976592, '', 1, ''),
(569, NULL, 'PAULA ANGELA M. TORRES OLIVEIRA', '', 64, NULL, '044.437.994-00', '1950-11-08', 11, 'AV. MATO GROSSSO', '417', '', '', '', '0', '', '(83)3506-4595', '', '', 'APOSENTADA', '2015-04-07 10:45:00', 1428414300, '', 1, ''),
(570, '07042015110009.jpg', 'LUANA KELLY NOBREGA PEREIRA', '', 26, '', '072.623.804-00', '1988-05-21', 5, '', '', '', '', '', '0', '', '', '(83)9128-2159', '', '', '2015-04-07 10:59:38', 1428415178, '', 1, '2'),
(571, '09042015093148.jpg', 'Suely Bento da Silva-funcionaria', '', 25, '', '', '1989-08-09', 8, '', '', '', '', '', '0', '', '(83)8601-6371', '', '', 'aux. de servi&ccedil;os gerais', '2015-04-09 09:31:28', 1428582688, '', 1, ''),
(572, '07052015100018.jpg', 'JOSE AUGUSTO MEIRELLES NETO', '', 43, '', '301.065.752-87', '1971-07-14', 7, '', '', '', '', '', '0', '58015-040', '(83)8818-1111', '', '', 'ADVOGADO', '2015-04-09 09:54:44', 1428584084, '', 1, ''),
(573, NULL, 'CARMEM LUCIA C. COUTINHO', '', 63, NULL, '113.731.304-82', '1952-02-17', 2, 'AV. AMAZONAS', '89', '', '', '', '0', '58030-140', '(83)9984-1341', '', '', 'MEDICA/GINECOLOGISTA', '2015-04-14 08:20:11', 1429010411, '', 1, '2'),
(574, NULL, 'CRISTINA LIE ADACHI', '', 51, NULL, '352.274.194-34', '1963-10-21', 10, '', '', '', '', '', '0', '58040-250', '(83)3222-1760', '(83)8829-1142', '', 'ENFERMEIRA', '2015-04-14 08:22:25', 1429010545, '', 1, ''),
(575, NULL, 'ANA LUIZA CELINO COUTINHO', '', 43, NULL, '789.195.924-20', '1971-04-23', 4, 'R. OUVIDIO MENDON&Ccedil;A', '50', '', 'MIRAMAR', 'JOAO PESSOA', '0', '', '(83)3247-5474', '', '', 'PROF. UNIVERSIT&Aacute;RIA', '2015-04-14 08:56:36', 1429012596, '', 1, '1'),
(577, '15042015163829.jpg', 'BENILTON LUIZ N. DE OLIVEIRA', '', 32, '', '041.839.554-32', '1982-05-24', 5, '', '', '', '', '', '0', '58040-102', '(83)8851-3102', '', 'AV. ARAGAO E MELO', 'PROFESSOR', '2015-04-15 16:10:50', 1429125050, '', 1, ''),
(578, '28042015083144.jpg', 'rose rose', '', 0, '', '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '', '', '', '2015-04-28 08:22:55', 1430220175, '', 1, ''),
(579, '05052015151124.jpg', 'giovanna dutra Aciole', '', 41, '', '610.948.381-87', '1973-07-28', 7, '', '', '', '', '', '0', '', '(83)8802-4077', '', '', 'SERVIDORA P&Uacute;BLICA', '2015-05-05 15:11:05', 1430849465, '', 1, ''),
(580, '05052015154119.jpg', 'Jannaynna de Freitas Silva', '', 39, '', '', '1975-10-17', 10, '', '', '', '', '', '0', '', '(83)3246-7663', '(83)8818-2906', '', 'turism&oacute;loga', '2015-05-05 15:41:04', 1430851264, '', 1, ''),
(581, NULL, 'Valdo Arruda', '', 58, NULL, '006.287.738-03', '1957-04-04', 4, '', '', '', '', '', '0', '', '', '', '', 'engenheiro', '2015-05-05 16:56:16', 1430855776, '', 1, ''),
(582, NULL, 'Juliana Slveira M. Palitot', '', 39, NULL, '', '1975-12-15', 12, '', '', '', '', '', '0', '', '(83)3246-3013', '', '', 'fonoaudiologa pedagoga', '2015-05-06 11:41:10', 1430923270, '', 1, ''),
(583, NULL, 'ALBANI AZEVEDO', '', 48, NULL, '481.554.034-91', '1966-11-18', 11, 'R. Jose Paulo da Silva Lira', '27', '', 'bancarios', '', '0', '', '(83)9931-1700', '', '', 'ADVOGADO', '2015-05-06 15:53:45', 1430938425, '', 1, ''),
(584, '19052015112451.jpg', 'NEILOR CESAR DOS SANTOS', '', 47, '', '471.688.544-53', '1968-05-05', 5, '', '', '', '', '', '0', '', '(83)8708-4639', '', '', 'PROFESSOR', '2015-05-06 16:19:29', 1430939969, '', 1, ''),
(585, NULL, 'ANTONIO DE CASTRO TORRES FILHO', '', 46, NULL, '981.070.207-82', '1968-06-30', 6, 'AV. PRESIDENTE AFONSO PENA', '202', '', 'BESSA', '', '0', '', '(83)3508-0115', '(83)8204-9337', '', 'MILITAR', '2015-05-07 07:57:44', 1430996264, '', 1, '1,3'),
(586, '08052015082037.jpg', 'ELIVALDO SILVA DE SOUZA', '', 41, '', '873.177.534-91', '1973-11-13', 11, 'R. COMPOSITOR AGOSTINHO LARA', '1810', '', 'CRISTO', '', '0', '', '', '(83)8825-9632', '', 'ADMINISTRADOR', '2015-05-08 07:41:18', 1431081678, '', 1, '1,3'),
(587, '22052015091039.jpg', 'PETRONIO PIRES XAVIER', '', 48, '', '646.396.304-68', '1966-09-07', 9, '', '', '', '', '', '0', '', '(83)8813-7792', '', '', 'DENTISTA', '2015-05-08 08:58:25', 1431086305, '', 1, ''),
(588, NULL, 'JOSE ROBERTO DE OLIVEIRA LINS', '', 60, NULL, '181.332.234-55', '1955-01-10', 1, 'MAXIMILIANO CHAVES', '45', '', 'JAGUARIBE', '', '0', '', '(83)8824-1121', '', '', 'PROFESSOR', '2015-05-08 14:10:17', 1431105017, '', 1, '1,2'),
(589, NULL, 'ADRIANA NOBREGA PEREIRA DA SILVA', '', 48, NULL, '458.769.024-15', '1966-11-25', 11, 'AV. MONTEIRO DA FRANCA', '554', 'APTO 701', '', '', '0', '', '(83)8825-2553', '', '', '', '2015-05-12 10:29:34', 1431437374, '', 1, '1,3'),
(590, NULL, 'JOAO VIRIATO RIBEIRO NETO', '', 64, NULL, '040.094.014-00', '1951-01-01', 1, 'AV. MONTEIRO DA FRANCA', '554', 'APTO 701', 'MANAIRA', '', '0', '', '', '(83)8804-8754', '', 'EMPRES&Aacute;RIO', '2015-05-12 10:31:35', 1431437495, '', 1, ''),
(591, '12052015144306.jpg', 'CRISTOVAO RIBEIRO FRANCO', '', 69, '', '023.983.034-20', '1945-11-20', 11, '', '', '', '', '', '0', '', '(83)8892-6583', '', '', 'CABELEIREIRO', '2015-05-12 14:42:07', 1431452527, '', 1, ''),
(592, NULL, 'MARLENE DA SILVA', '', 0, NULL, '', '0000-00-00', 0, '', '', '', '', '', '0', '', '', '', '', '', '2015-05-12 14:46:15', 1431452775, '', 1, ''),
(593, NULL, 'SILVESTRE FERNANDEZ VASQUEZ', '', 70, NULL, '218.380.544-72', '1945-01-05', 1, '', '', '', '', '', '0', '', '(83)9961-0331', '', 'shivevosgrez@hotmail.com', 'PROFESSOR', '2015-05-13 15:29:46', 1431541786, '', 1, ''),
(594, '14052015101553.jpg', 'CRISTIANE FERREIRA', '', 30, '', '058.853.794-24', '1985-03-28', 3, '', '', '', '', '', '0', '', '(83)3247-0854', '(83)8850-3999', '', 'ADVOGADA', '2015-05-14 10:15:26', 1431609326, '', 1, ''),
(595, NULL, 'ISAURA BENTO HENRIQUE', '', 43, NULL, '', '1971-05-19', 5, 'AV.INFANTO DOM HENRIQUE', '100', '', 'TAMBIA', '', '0', '', '', '(83)9889-9034', '', 'ADMINISTRADORA', '2015-05-14 15:43:46', 1431629026, '', 1, '1,3'),
(596, '14052015160101.jpg', 'JOAO RICARDO DE ARAUJO MOREIRA', '', 43, '', '723.147.614-72', '1971-09-11', 9, 'AV.OLEANO PACIFICO', '500', '', '', '', '0', '', '', '(83)9985-9244', '', 'SERVIDOR PUBLICO FEDERAL', '2015-05-14 16:00:39', 1431630039, '', 1, ''),
(597, '14052015165505.jpg', 'EMILIO GILMAR FARIAS SALVADO DE LIMA', '', 31, '', '008.118.044-61', '1984-01-01', 1, '', '', '', '', '', '0', '', '', '(83)8858-8880', '', 'SERVIDOR PUBLICO', '2015-05-14 16:54:35', 1431633275, '', 1, ''),
(598, NULL, 'ANA JACIRA FERNANDES DE SENA  (filha de Roberto Sena)', '', 34, NULL, '009.964.854-73', '1981-02-25', 2, 'R. WILSON FLAVIO M. COUTINHO', '850', '', '', '', '0', '', '(83)8710-4795', '', '', 'TEC ENFERMAGEM', '2015-05-18 15:44:00', 1431974640, '', 1, ''),
(599, NULL, 'BRUNO RAMOS MUNIZ FALCAO', '', 28, NULL, '012.558.064-94', '1986-06-11', 6, 'AV. CABO BRANCO', '3722', 'APTO 1001', '', 'JOAO PESSOA', 'PB', '58045-010', '', '(83)8787-1025', '', 'ADMINISTRADOR', '2015-05-20 14:40:52', 1432143652, '', 1, '1,3'),
(600, NULL, 'DIANA MORENO NOBRE', '', 42, NULL, '394.555.562-00', '1972-10-27', 10, 'R. Lauro Soares', '218', 'apto 1402', 'tambauzinho', 'JOAO PESSOA', '0', '58042-030', '(83)8601-5497', '', '', 'ENGENHARIA ELETRICISTA', '2015-05-20 14:42:58', 1432143778, '', 1, '1,3'),
(601, '27052015100201.jpg', 'EVELYN RUBIA DE ALBUQUERQUE SARAIVA', '', 63, '', '089.370.954-91', '1952-04-13', 4, '', '', '', '', '', '0', '58038-640', '(83)3246-3820', '', '', 'APOSENTADA', '2015-05-20 14:45:19', 1432143919, '', 1, '1,3'),
(602, NULL, 'RAUL GALVAO CAVALCANTE', '', 61, NULL, '415.414.707-15', '1953-06-01', 6, '', '', '', '', '', '0', '', '', '(83)8894-1724', '', 'APOSENTADO', '2015-05-22 07:16:29', 1432289789, '', 1, ''),
(603, '26052015095436.jpg', 'SERGIO T&Uacute;LIO BELERNA R. DE LIMA', '', 54, '', '396.268.494-87', '1960-07-05', 7, '', '', '', '', '', '0', '', '(83)8105-8972', '', '', 'ANALISTA DE SISTEMA', '2015-05-26 09:04:42', 1432641882, '', 1, '1,4'),
(604, '26052015092004.jpg', 'MARIA DE FATIMA  DE MOURA', '', 61, '', '012.217.044-00', '1954-03-29', 3, 'AV. RUI CARNEIRO', '853', '', '', '', '0', '', '', '', '', 'FUNCION&Aacute;RIA PUBLICA', '2015-05-26 09:19:40', 1432642780, '', 1, ''),
(605, NULL, 'CRISTIANE MOURA DUARTE', '', 42, NULL, '885.180.944-53', '1973-03-07', 3, '', '', '', '', '', '0', '', '', '(83)9980-7171', '', 'FUNC. P&Uacute;BLICO', '2015-05-26 11:12:53', 1432649573, '', 1, '1,3'),
(606, NULL, 'RITA VIEIRA DA SILVA', '', 57, NULL, '205.095.964-87', '1957-10-22', 10, 'AV. SERGIPE', '491', 'RESIDENCIAL VENEZA', 'B DOS ESTADOS', '', '0', '', '(83)3224-5677', '', '', 'APOSENTADA', '2015-05-26 15:56:33', 1432666593, '', 1, '1,3'),
(607, NULL, 'RUI REGIS DE BRITO', 'M', 0, NULL, '264.457.607-59', '0000-00-00', 0, 'Rua Giacomo Porto', '', '', 'Miramar', 'Jo&atilde;o Pessoa', 'PB', '58032-110', '(83)8869-2040', '', '', 'ANALISTA DE SISTEMA DE INFORMACAO', '2015-05-27 09:12:20', 1432728740, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `permissoes`
--

CREATE TABLE IF NOT EXISTS `permissoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `codigo` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissoes`
--

INSERT INTO `permissoes` (`id`, `nome`, `codigo`) VALUES
(1, 'Administrador', 1),
(2, 'Fisioterapeuta', 2),
(3, 'Recepcionista', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `permissao` int(11) DEFAULT '0',
  `data` datetime DEFAULT NULL,
  `timestamp` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`, `email`, `permissao`, `data`, `timestamp`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Usu&aacute;rio Administrador', 'administrador@gmail.com', 1, '2014-08-15 01:11:53', 1408057913),
(2, 'jonas.guimaraes', '202cb962ac59075b964b07152d234b70', 'Jonas Guimar&atilde;es', 'jolivg@yahoo.com.br', 2, '2014-08-15 01:11:54', 1408057914),
(3, 'recepcao', '202cb962ac59075b964b07152d234b70', 'Recep&ccedil;&atilde;o', 'recepcao@gmail.com', 3, '2014-08-15 01:11:54', 1408057914),
(4, 'karla.ayres', '202cb962ac59075b964b07152d234b70', 'Karla Ayres', '', 2, '2014-12-12 00:12:20', 1418339540),
(5, 'recepcao', '202cb962ac59075b964b07152d234b70', 'R&uacute;bia', '', 2, '2015-01-21 08:55:55', 1421837755),
(6, 'recepcao', '202cb962ac59075b964b07152d234b70', 'Sylvia Anaiza', '', 2, '2015-01-21 08:56:44', 1421837804);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_agenda`
--
CREATE TABLE IF NOT EXISTS `vw_agenda` (
`id` int(11)
,`tipo` int(11)
,`telefoneResidencial` varchar(15)
,`telefoneCelular` varchar(15)
,`lembrete` varchar(255)
,`data` date
,`hora` time
,`diaCompromisso` int(2)
,`mesCompromisso` int(2)
,`anoCompromisso` int(4)
,`dataFormatada` varchar(10)
,`horaFormatada` varchar(5)
,`dataC` datetime
,`timestampC` int(11)
,`dataCFormatada` varchar(10)
,`idPaciente` int(11)
,`nomePaciente` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pacientes_atendimentos`
--
CREATE TABLE IF NOT EXISTS `vw_pacientes_atendimentos` (
`id` int(11)
,`nome` varchar(255)
,`sexo` varchar(1)
,`idade` int(11)
,`estadoCivil` varchar(15)
,`cpf` varchar(14)
,`dataNascimento` date
,`mesNascimento` int(11)
,`endereco` varchar(255)
,`numero` varchar(20)
,`complemento` varchar(255)
,`bairro` varchar(255)
,`cidade` varchar(255)
,`uf` varchar(2)
,`cep` varchar(30)
,`telefoneResidencial` varchar(15)
,`telefoneCelular` varchar(15)
,`email` varchar(100)
,`profissao` varchar(255)
,`dataFormatada` varchar(10)
,`observacoes` text
,`status` int(11)
,`tratamentos` varchar(30)
,`altura` decimal(14,2)
,`peso` decimal(14,2)
,`imc` decimal(14,2)
,`hda` longtext
,`avaliacaoPostural` longtext
,`evolucao` longtext
,`dataAtendimentoFormatada` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_usuarios`
--
CREATE TABLE IF NOT EXISTS `vw_usuarios` (
`id` int(11)
,`nome` varchar(255)
,`email` varchar(100)
,`data` datetime
,`dataFormatada` varchar(10)
,`permissao` int(11)
,`nomePermissao` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_agenda`
--
DROP TABLE IF EXISTS `vw_agenda`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_agenda` AS select `agenda`.`id` AS `id`,`agenda`.`tipo` AS `tipo`,`agenda`.`telefoneResidencial` AS `telefoneResidencial`,`agenda`.`telefoneCelular` AS `telefoneCelular`,`agenda`.`lembrete` AS `lembrete`,`agenda`.`data` AS `data`,`agenda`.`hora` AS `hora`,dayofmonth(`agenda`.`data`) AS `diaCompromisso`,month(`agenda`.`data`) AS `mesCompromisso`,year(`agenda`.`data`) AS `anoCompromisso`,date_format(`agenda`.`data`,'%d/%m/%Y') AS `dataFormatada`,substr(`agenda`.`hora`,1,5) AS `horaFormatada`,`agenda`.`dataC` AS `dataC`,`agenda`.`timestampC` AS `timestampC`,date_format(`agenda`.`dataC`,'%d/%m/%Y') AS `dataCFormatada`,`pacientes`.`id` AS `idPaciente`,`pacientes`.`nome` AS `nomePaciente` from (`agenda` left join `pacientes` on((`pacientes`.`id` = `agenda`.`paciente`)));

-- --------------------------------------------------------

--
-- Structure for view `vw_pacientes_atendimentos`
--
DROP TABLE IF EXISTS `vw_pacientes_atendimentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pacientes_atendimentos` AS select `pacientes`.`id` AS `id`,`pacientes`.`nome` AS `nome`,`pacientes`.`sexo` AS `sexo`,`pacientes`.`idade` AS `idade`,`pacientes`.`estadoCivil` AS `estadoCivil`,`pacientes`.`cpf` AS `cpf`,`pacientes`.`dataNascimento` AS `dataNascimento`,`pacientes`.`mesNascimento` AS `mesNascimento`,`pacientes`.`endereco` AS `endereco`,`pacientes`.`numero` AS `numero`,`pacientes`.`complemento` AS `complemento`,`pacientes`.`bairro` AS `bairro`,`pacientes`.`cidade` AS `cidade`,`pacientes`.`uf` AS `uf`,`pacientes`.`cep` AS `cep`,`pacientes`.`telefoneResidencial` AS `telefoneResidencial`,`pacientes`.`telefoneCelular` AS `telefoneCelular`,`pacientes`.`email` AS `email`,`pacientes`.`profissao` AS `profissao`,date_format(`pacientes`.`data`,'%d/%m/%Y') AS `dataFormatada`,`pacientes`.`observacoes` AS `observacoes`,`pacientes`.`status` AS `status`,`pacientes`.`tratamentos` AS `tratamentos`,`atendimentos`.`altura` AS `altura`,`atendimentos`.`peso` AS `peso`,`atendimentos`.`imc` AS `imc`,`atendimentos`.`hda` AS `hda`,`atendimentos`.`avaliacaoPostural` AS `avaliacaoPostural`,`atendimentos`.`evolucao` AS `evolucao`,date_format(`atendimentos`.`data`,'%d/%m/%Y') AS `dataAtendimentoFormatada` from (`pacientes` join `atendimentos` on((`pacientes`.`id` = `atendimentos`.`paciente`)));

-- --------------------------------------------------------

--
-- Structure for view `vw_usuarios`
--
DROP TABLE IF EXISTS `vw_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usuarios` AS select `usuarios`.`id` AS `id`,`usuarios`.`nome` AS `nome`,`usuarios`.`email` AS `email`,`usuarios`.`data` AS `data`,date_format(`usuarios`.`data`,'%d/%m/%Y') AS `dataFormatada`,`usuarios`.`permissao` AS `permissao`,`permissoes`.`nome` AS `nomePermissao` from (`usuarios` join `permissoes` on((`permissoes`.`id` = `usuarios`.`permissao`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda_fisioterapeutas`
--
ALTER TABLE `agenda_fisioterapeutas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fisioterapeuta` (`fisioterapeuta`);

--
-- Indexes for table `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente` (`paciente`);

--
-- Indexes for table `atendimentos_dores`
--
ALTER TABLE `atendimentos_dores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atendimento` (`atendimento`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `agenda_fisioterapeutas`
--
ALTER TABLE `agenda_fisioterapeutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `atendimentos_dores`
--
ALTER TABLE `atendimentos_dores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=608;
--
-- AUTO_INCREMENT for table `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda_fisioterapeutas`
--
ALTER TABLE `agenda_fisioterapeutas`
  ADD CONSTRAINT `agenda_fisioterapeutas_ibfk_1` FOREIGN KEY (`fisioterapeuta`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD CONSTRAINT `atendimentos_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `atendimentos_dores`
--
ALTER TABLE `atendimentos_dores`
  ADD CONSTRAINT `atendimentos_dores_ibfk_1` FOREIGN KEY (`atendimento`) REFERENCES `atendimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
