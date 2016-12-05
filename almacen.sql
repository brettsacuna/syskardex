-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 03:57 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almacen`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceso`
--

CREATE TABLE `acceso` (
  `id_acc` int(11) NOT NULL,
  `id_mod` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acceso`
--

INSERT INTO `acceso` (`id_acc`, `id_mod`, `id_per`, `estado`) VALUES
(1, 1, 1, 'A'),
(2, 2, 1, 'A'),
(3, 9, 1, 'A'),
(4, 10, 1, 'A'),
(5, 11, 1, 'A'),
(9, 15, 1, 'A'),
(10, 16, 1, 'A'),
(11, 17, 1, 'A'),
(12, 18, 1, 'A'),
(15, 21, 1, 'A'),
(16, 22, 1, 'A'),
(17, 23, 1, 'A'),
(18, 24, 1, 'A'),
(19, 25, 1, 'A'),
(20, 26, 1, 'A'),
(21, 27, 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `concepto_general`
--

CREATE TABLE `concepto_general` (
  `id_con` int(11) NOT NULL,
  `desc_con` text NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concepto_general`
--

INSERT INTO `concepto_general` (`id_con`, `desc_con`, `estado`) VALUES
(1, 'MATERIALES DE ESCRITORIO Y MATERIALES DE IMPRESIÓN', 'A'),
(2, 'MATERIALES DE CONSTRUCCIÓN, HERRAMIENTAS Y OTROS BIENES', 'A'),
(3, 'Gasolina, Petroleo Gaby', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `det_movimiento`
--

CREATE TABLE `det_movimiento` (
  `id_dmov` int(11) NOT NULL,
  `id_mov` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `id_uni` int(11) DEFAULT NULL,
  `pre_uni` decimal(8,2) DEFAULT NULL,
  `cant_pro` int(11) NOT NULL,
  `stock_fis_ant` decimal(10,2) DEFAULT NULL,
  `stock_val_ant` decimal(10,2) DEFAULT NULL,
  `stock_fis_act` decimal(10,2) DEFAULT NULL,
  `stock_val_act` decimal(10,2) DEFAULT NULL,
  `stock_act` decimal(8,2) NOT NULL,
  `cant_ent` decimal(8,2) NOT NULL,
  `stock_res` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_movimiento`
--

INSERT INTO `det_movimiento` (`id_dmov`, `id_mov`, `id_pro`, `id_uni`, `pre_uni`, `cant_pro`, `stock_fis_ant`, `stock_val_ant`, `stock_fis_act`, `stock_val_act`, `stock_act`, `cant_ent`, `stock_res`) VALUES
(4, 2, 1, 1, '10.00', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(5, 3, 1, 2, '12.00', 20, NULL, NULL, NULL, NULL, '0.00', '20.00', '20.00'),
(6, 3, 2, 2, '5.00', 12, NULL, NULL, NULL, NULL, '0.00', '12.00', '12.00'),
(7, 4, 2, 2, '0.00', 10, NULL, NULL, NULL, NULL, '12.00', '10.00', '2.00'),
(8, 4, 1, 2, '0.00', 20, NULL, NULL, NULL, NULL, '20.00', '20.00', '0.00'),
(9, 5, 3, 2, '12.00', 15, NULL, NULL, NULL, NULL, '0.00', '15.00', '15.00'),
(17, 7, 2, 1, '1.00', 1, NULL, NULL, NULL, NULL, '2.00', '1.00', '1.00'),
(18, 8, 4, 2, '13.00', 10, NULL, NULL, NULL, NULL, '0.00', '10.00', '10.00'),
(19, 9, 4, 3, '0.00', 2, NULL, NULL, NULL, NULL, '10.00', '2.00', '8.00'),
(20, 10, 5, 2, '13.00', 24, NULL, NULL, NULL, NULL, '0.00', '24.00', '24.00'),
(21, 11, 7, 2, '0.52', 100, NULL, NULL, NULL, NULL, '0.00', '100.00', '100.00'),
(22, 11, 15, 2, '1.00', 20, NULL, NULL, NULL, NULL, '0.00', '20.00', '20.00'),
(23, 11, 12, 2, '2.50', 50, NULL, NULL, NULL, NULL, '0.00', '50.00', '50.00'),
(24, 12, 4, 4, '13.00', 2, NULL, NULL, NULL, NULL, '8.00', '2.00', '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `entidad`
--

CREATE TABLE `entidad` (
  `id_ent` int(11) NOT NULL,
  `desc_ent` varchar(100) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entidad`
--

INSERT INTO `entidad` (`id_ent`, `desc_ent`, `estado`) VALUES
(1, 'Gerencia', 'A'),
(2, 'Sub Gerencia Infraestructura', 'A'),
(3, 'Administracion', 'A'),
(4, 'Recursos Humanos (RR.HH)', 'A'),
(5, 'Almacen', 'A'),
(6, 'Logistica', 'A'),
(7, 'Contabilidad', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_mat` int(11) NOT NULL,
  `desc_mat` text NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modulo`
--

CREATE TABLE `modulo` (
  `id_mod` int(11) NOT NULL,
  `name_mod` varchar(60) NOT NULL,
  `alone` int(11) DEFAULT NULL,
  `id_padre` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modulo`
--

INSERT INTO `modulo` (`id_mod`, `name_mod`, `alone`, `id_padre`, `url`, `orden`, `icon`, `estado`) VALUES
(1, 'Mantenimiento', NULL, 0, 'javascript:void(0)', 9, 'fa fa-gears', 'A'),
(2, 'Modulos', 0, 23, 'modulo', 1, '', 'A'),
(9, 'Personas', 0, 1, 'persona', 2, '', 'A'),
(10, 'Perfiles', 0, 23, 'perfil', 3, '', 'A'),
(11, 'Permisos', 0, 23, 'permiso', 4, '', 'A'),
(15, 'Sub-Areá', 0, 12, 'subarea', 3, '', 'A'),
(16, 'Almacen', 0, 0, '', 1, 'fa fa-archive', 'A'),
(17, 'Concepto General', 0, 1, 'concepto_general', 1, '', 'A'),
(18, 'Productos', 0, 16, 'producto', 2, '', 'A'),
(21, 'Unidad de Medida', 0, 1, 'unidad_medida', 3, '', 'A'),
(22, 'Proveedor', 0, 16, 'proveedor', 4, '', 'A'),
(23, 'Seguridad', 0, 0, '', 3, 'fa fa-lock', 'A'),
(24, 'Movimientos', 0, 16, 'movimiento', 1, '', 'A'),
(25, 'Procedencia', 0, 1, 'procedencia', 3, '', 'A'),
(26, 'Reporte', 1, 0, 'reporte', 2, 'fa fa-sliders', 'A'),
(27, 'Entidades', 0, 1, 'entidad', 4, '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `movimiento`
--

CREATE TABLE `movimiento` (
  `id_mov` int(11) NOT NULL,
  `id_tmov` int(11) NOT NULL,
  `id_pers` int(11) DEFAULT NULL,
  `id_proc` int(11) NOT NULL,
  `id_ent` int(11) DEFAULT NULL,
  `fecha_mov` date NOT NULL,
  `fac_mov` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL,
  `fecha_hora_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `solicitante` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movimiento`
--

INSERT INTO `movimiento` (`id_mov`, `id_tmov`, `id_pers`, `id_proc`, `id_ent`, `fecha_mov`, `fac_mov`, `estado`, `fecha_hora_reg`, `solicitante`) VALUES
(2, 1, NULL, 1, 0, '2016-09-26', '3452', 'I', '2016-11-09 15:29:13', NULL),
(3, 1, NULL, 1, 0, '2016-11-15', '123457', 'I', '2016-11-30 23:48:35', NULL),
(4, 2, NULL, 1, 0, '2016-11-16', '12548', 'I', '2016-11-30 23:48:42', NULL),
(5, 1, NULL, 1, 0, '2016-11-16', '34521', 'I', '2016-11-29 23:12:24', NULL),
(7, 2, NULL, 1, 0, '2016-11-07', 'asasas', 'I', '2016-11-30 23:48:40', 'asasasas'),
(8, 1, NULL, 2, 6, '2016-10-04', 'F/.0001-024856', 'A', '2016-11-30 23:37:11', 'JUAN CARLOS'),
(9, 2, NULL, 2, 5, '2016-11-06', 'F_0001-024555', 'A', '2016-11-30 23:51:23', 'LUIS OLIVARES'),
(10, 1, NULL, 2, 6, '2016-11-08', 'F/.0001-335565', 'A', '2016-11-30 23:54:05', 'JUAN CARLOS'),
(11, 1, NULL, 2, 6, '2016-11-15', 'F/.0001-54955', 'A', '2016-12-01 00:17:59', 'JUAN CARLOS'),
(12, 2, NULL, 2, 0, '2016-11-28', 'f/.0002-5545', 'A', '2016-12-05 02:52:20', 'Brett');

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `id_per` int(11) NOT NULL,
  `name_per` varchar(40) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id_per`, `name_per`, `estado`) VALUES
(1, 'Administrador', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `id_pers` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  `nombre_pers` varchar(40) NOT NULL,
  `apaterno_pers` varchar(40) NOT NULL,
  `amaterno_pers` varchar(40) NOT NULL,
  `sexo_pers` char(1) NOT NULL,
  `direccion_pers` varchar(60) NOT NULL,
  `fnacimiento_pers` date NOT NULL,
  `telefono_pers` varchar(20) NOT NULL,
  `dni_pers` char(8) NOT NULL,
  `name_usu` varchar(20) NOT NULL,
  `pass_usu` varchar(80) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id_pers`, `id_per`, `nombre_pers`, `apaterno_pers`, `amaterno_pers`, `sexo_pers`, `direccion_pers`, `fnacimiento_pers`, `telefono_pers`, `dni_pers`, `name_usu`, `pass_usu`, `estado`) VALUES
(1, 1, 'Israel', 'Flores1', 'García', 'M', 'Jr. Manuel Arevalo Orbe 648', '1995-01-03', '998791816', '73473897', 'admin', '7363a0d0604902af7b70b271a0b96480', 'I'),
(3, 1, 'asas', 'asas', 'asas', 'M', 'asas', '2016-10-04', 'asasas', '12345678', 'andres', '7363a0d0604902af7b70b271a0b96480', 'I'),
(4, 1, 'Israel', 'Flores', 'García', 'M', 'Jr. Manuel Arevalo Orbe 648', '1994-01-03', '998791816', '73473897', 'admin', '7363a0d0604902af7b70b271a0b96480', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `procedencia`
--

CREATE TABLE `procedencia` (
  `id_proc` int(11) NOT NULL,
  `desc_proc` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedencia`
--

INSERT INTO `procedencia` (`id_proc`, `desc_proc`, `estado`) VALUES
(1, 'Chazuta', 'A'),
(2, 'GTBM-T', 'A'),
(3, 'Aldea Infatil', 'A'),
(4, 'Bellavista', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_pro` int(11) NOT NULL,
  `id_con` int(11) NOT NULL,
  `desc_pro` text NOT NULL,
  `cuenta_contable` text NOT NULL,
  `clasificador` text,
  `stock_pro` decimal(10,2) DEFAULT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_pro`, `id_con`, `desc_pro`, `cuenta_contable`, `clasificador`, `stock_pro`, `estado`) VALUES
(1, 1, 'ABRAZADERAS', '1301.1101', '2.3.1.11.1.1', '0.00', 'I'),
(2, 1, 'ABRAZADERAS DE 4"', '1301.1101', '2.3.1.11.1.1', '1.00', 'I'),
(3, 2, 'Tubos para flujo de corriente', '12548', '12541', '15.00', 'A'),
(4, 1, 'PAPEL BOND A4', '0', '2.3.1.5.1.2', '6.00', 'A'),
(5, 1, 'ARCHIVADOR TAMAÑO OFICIO', '0', '2.3.1.5.1.2', '24.00', 'A'),
(6, 1, 'BINDER CLIP METALICO', '0', '2.3.1.5.1.2', NULL, 'A'),
(7, 1, 'BOLIGRAFO TINTA AZUL', '0', '2.3.1.5.1.2', '100.00', 'A'),
(8, 1, 'BOLIGRAFO TINTA NEGRO', '0', '2.3.1.5.1.2', NULL, 'A'),
(9, 1, 'BOLIGRAFO TINTA ROJO', '0', '2.3.1.5.1.2', NULL, 'A'),
(10, 1, 'CLIP METALICO STANDAR', '0', '2.3.1.5.1.2', NULL, 'A'),
(11, 1, 'COLA SINTETICA', '0', '2.3.1.5.1.2', NULL, 'A'),
(12, 1, 'CORRECTOR LIQUIDO', '0', '2.3.1.5.1.2', '50.00', 'A'),
(13, 1, 'GOMA EN BARRA', '0', '2.3.1.5.1.2', NULL, 'A'),
(14, 1, 'GOMA LIQUIDA FRASCO', '0', '2.3.1.5.1.2', NULL, 'A'),
(15, 1, 'GRAPA 26/6', '0', '2.3.1.5.1.2', '20.00', 'A'),
(16, 1, 'FASTENER METALICO', '0', '2.3.1.5.1.2', NULL, 'A'),
(17, 1, 'FOLDER MANILLA TAMAÑO A4', '0', '2.3.1.5.1.2', NULL, 'A'),
(18, 1, 'FOLDER MANILLA TAMAÑO OFICIO', '0', '2.3.1.5.1.2', NULL, 'A'),
(19, 1, 'LAPIZ DE MADERA', '0', '2.3.1.5.1.2', NULL, 'A'),
(20, 1, 'NOTA ADHENSIVA COLORES 3X3 BLOCK X100', '0', '2.3.1.5.1.2', NULL, 'A'),
(21, 1, 'PAPEL LUSTRE', '0', '2.3.1.5.1.2', NULL, 'A'),
(22, 1, 'SACAGRAPA DE METAL', '0', '2.3.1.5.1.2', NULL, 'A'),
(23, 1, 'SOBRE MANILLA TAMAÑO A4', '0', '2.3.1.5.1.2', NULL, 'A'),
(24, 1, 'SOBRE MANILLA TAMAÑO MEDIO OFICIO', '0', '2.3.1.5.1.2', NULL, 'A'),
(25, 1, 'SOBRE MANILLA TAMAÑO OFICIO', '0', '2.3.1.5.1.2', NULL, 'A'),
(26, 1, 'TAJADOR DE METAL', '0', '2.3.1.5.1.2', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL,
  `desc_prov` varchar(100) NOT NULL,
  `dir_prov` varchar(80) NOT NULL,
  `tel_prov` varchar(20) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `desc_prov`, `dir_prov`, `tel_prov`, `estado`) VALUES
(1, 'Proveedor', 'Jr. Hallame si puedes 671', '111-01', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `id_tmov` int(11) NOT NULL,
  `desc_tmov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`id_tmov`, `desc_tmov`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Table structure for table `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_uni` int(11) NOT NULL,
  `desc_uni` varchar(20) NOT NULL,
  `cant_uni` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_uni`, `desc_uni`, `cant_uni`, `estado`) VALUES
(1, 'KG', 1, 'A'),
(2, 'UND', 1, 'A'),
(3, 'MILLAR', 1, 'A'),
(4, 'PQUT.', 1, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id_acc`),
  ADD KEY `modulo_acceso_fk` (`id_mod`),
  ADD KEY `perfil_acceso_fk` (`id_per`);

--
-- Indexes for table `concepto_general`
--
ALTER TABLE `concepto_general`
  ADD PRIMARY KEY (`id_con`);

--
-- Indexes for table `det_movimiento`
--
ALTER TABLE `det_movimiento`
  ADD PRIMARY KEY (`id_dmov`);

--
-- Indexes for table `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id_ent`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_mod`);

--
-- Indexes for table `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id_mov`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_per`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_pers`),
  ADD KEY `fk_perfil_persona` (`id_per`);

--
-- Indexes for table `procedencia`
--
ALTER TABLE `procedencia`
  ADD PRIMARY KEY (`id_proc`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`id_tmov`);

--
-- Indexes for table `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_uni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `concepto_general`
--
ALTER TABLE `concepto_general`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `det_movimiento`
--
ALTER TABLE `det_movimiento`
  MODIFY `id_dmov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_ent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `id_pers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `procedencia`
--
ALTER TABLE `procedencia`
  MODIFY `id_proc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `id_tmov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_uni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_modulo_acceso` FOREIGN KEY (`id_mod`) REFERENCES `modulo` (`id_mod`),
  ADD CONSTRAINT `fk_perfil_acceso` FOREIGN KEY (`id_per`) REFERENCES `perfil` (`id_per`);

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_perfil_persona` FOREIGN KEY (`id_per`) REFERENCES `perfil` (`id_per`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
