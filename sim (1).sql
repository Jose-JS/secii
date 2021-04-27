-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2020 a las 22:34:23
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sim`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-12-30 23:44:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(8, 'recepcionista', 'recep', '2', '2020-01-16 19:22:09'),
(9, 'instructores', 'inst', '3', '2020-01-16 19:22:29'),
(10, 'tecnicos', 'tsi', '4', '2020-01-16 19:23:05'),
(11, 'TSI', 'tesi', '5', '2020-01-16 19:23:40'),
(12, 'jefe de turno', 'jt', '6', '2020-01-16 19:23:56'),
(13, 'jefe de servicio', 'js', '7', '2020-01-16 19:24:19'),
(14, 'supervisores', 'sup', '8', '2020-01-16 19:24:33'),
(15, 'coordinador', 'coord', '9', '2020-01-16 19:24:50'),
(16, 'capacitador', 'cap', '10', '2020-01-16 19:25:09'),
(18, 'asistente', 'asis', '12', '2020-01-16 19:25:48'),
(19, 'Director de finanzas', 'dri. fin.', '13', '2020-01-16 19:26:12'),
(20, 'auxiliar administrativo', 'aux adm', '15', '2020-01-16 19:26:37'),
(21, 'director administrativo', 'dir. admon.', '16', '2020-01-16 19:26:57'),
(22, 'director general', 'dir. gnral', '17', '2020-01-16 19:27:16'),
(23, 'sistemas', 'sis', '18', '2020-01-16 19:27:36'),
(24, 'recursos materiales', 'rm', '19', '2020-01-16 19:27:51'),
(25, 'mensajeros', 'msj', '20', '2020-01-16 19:28:08'),
(26, 'guaruda', 'gd', '21', '2020-01-16 19:28:42'),
(27, 'reclutadores', 'rec', '22', '2020-01-16 19:28:56'),
(28, 'dirección de reclutamiento', 'dir. rec', '23', '2020-01-16 19:29:17'),
(29, 'dirección de recursos humanos', 'dir. rh', '24', '2020-01-16 19:29:37'),
(30, 'mantenimiento', 'manto.', '25', '2020-01-16 19:29:50'),
(31, 'limpieza', 'limp', '1', '2020-01-16 19:31:05'),
(35, 'ejemplo', 'ejemplo', '22030', '2020-03-05 18:15:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldocument`
--

CREATE TABLE `tbldocument` (
  `id` int(11) NOT NULL,
  `idemp` int(11) NOT NULL,
  `namedoc` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldocument`
--

INSERT INTO `tbldocument` (`id`, `idemp`, `namedoc`, `date`) VALUES
(1, 5, '../Documentos/0304202576consulta.php', '2020-04-02 23:57:18'),
(2, 5, '../Documentos/0304201200logo.jpg', '2020-04-02 23:16:32'),
(3, 5, '../Documentos/0304201494ipconfig.png', '2020-04-02 22:20:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldocuments`
--

CREATE TABLE `tbldocuments` (
  `id` int(11) NOT NULL,
  `idemp` int(11) NOT NULL,
  `birthcertificate` varchar(150) NOT NULL,
  `docadress` varchar(150) NOT NULL,
  `docstudies` varchar(150) NOT NULL,
  `docmilitary` varchar(150) NOT NULL,
  `docine` varchar(150) NOT NULL,
  `docimss` varchar(150) NOT NULL,
  `docrfc` varchar(150) NOT NULL,
  `doccurp` varchar(150) NOT NULL,
  `docnocriminal` varchar(150) NOT NULL,
  `docdebtinfona` varchar(150) NOT NULL,
  `sheet1` varchar(150) NOT NULL,
  `sheet2` varchar(150) NOT NULL,
  `sheet3` varchar(150) NOT NULL,
  `sheet4` varchar(150) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldocuments`
--

INSERT INTO `tbldocuments` (`id`, `idemp`, `birthcertificate`, `docadress`, `docstudies`, `docmilitary`, `docine`, `docimss`, `docrfc`, `doccurp`, `docnocriminal`, `docdebtinfona`, `sheet1`, `sheet2`, `sheet3`, `sheet4`, `createdate`) VALUES
(1, 5, '../Documentos/0104207482bower.json', '../Documentos/0104207268gulpfile.js', '../Documentos/01042080bower.json', '../Documentos/0104207310.gitignore', '../Documentos/0104204508README.md', '../Documentos/0104206497README_CN.md', '../Documentos/010420779.bowerrc', '../Documentos/0104206256', '../Documentos/0104205976bower.json', '../Documentos/01042078gulpfile.js', '../Documentos/0104201575README.md', '../Documentos/010420590changelog.md', '../Documentos/010420750.bowerrc', '../Documentos/010420304LICENSE.txt', '2020-04-01 16:14:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldoublets`
--

CREATE TABLE `tbldoublets` (
  `id` int(11) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `empid` varchar(6) NOT NULL,
  `technical` varchar(150) NOT NULL,
  `service` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `turn` varchar(20) NOT NULL,
  `namesup` varchar(100) NOT NULL,
  `isread` int(1) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldoublets`
--

INSERT INTO `tbldoublets` (`id`, `datetime`, `empid`, `technical`, `service`, `cover`, `reason`, `turn`, `namesup`, `isread`, `createdate`) VALUES
(4, '2019-09-19T02:14', '890114', ' FELIPE DE JESUS ALCALA TORRES', 'salisbury', 'dfregreger', 'ergregteg', '12X12', 'regegerg', 1, '2020-03-12 23:14:48'),
(5, '2020-02-28T00:04', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'munich', 'qdewdwf', 'wefewfew', '24X24', 'ewfewfwefwe', 1, '2020-03-12 23:14:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` int(6) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailId` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Dob` varchar(15) NOT NULL,
  `Department` varchar(60) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(60) NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `placebirth` varchar(50) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `marital` varchar(30) NOT NULL,
  `ife` varchar(13) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `imss` varchar(11) NOT NULL,
  `typelicence` varchar(50) NOT NULL,
  `military` varchar(50) NOT NULL,
  `phonelocal` bigint(10) NOT NULL,
  `phonerecado` bigint(10) NOT NULL,
  `dependent` varchar(50) NOT NULL,
  `dependentname` varchar(75) DEFAULT NULL,
  `dependentrelation` varchar(50) DEFAULT NULL,
  `dependentage` varchar(10) DEFAULT NULL,
  `dependentname2` varchar(75) DEFAULT NULL,
  `dependentrelation2` varchar(50) DEFAULT NULL,
  `dependentage2` varchar(10) DEFAULT NULL,
  `dependentname3` varchar(75) DEFAULT NULL,
  `dependentrelation3` varchar(50) DEFAULT NULL,
  `dependentage3` varchar(10) DEFAULT NULL,
  `dependentname4` varchar(75) DEFAULT NULL,
  `dependentrelation4` varchar(50) DEFAULT NULL,
  `dependentage4` varchar(10) DEFAULT NULL,
  `dependentname5` varchar(75) DEFAULT NULL,
  `dependentrelation5` varchar(50) DEFAULT NULL,
  `dependentage5` varchar(10) DEFAULT NULL,
  `cp` int(11) NOT NULL,
  `assignedservice` varchar(100) NOT NULL,
  `fechini` varchar(50) NOT NULL,
  `primaryname` varchar(100) DEFAULT NULL,
  `primaryadress` varchar(100) DEFAULT NULL,
  `primarydocument` varchar(50) DEFAULT NULL,
  `highschoolname` varchar(100) DEFAULT NULL,
  `highschooladress` varchar(100) DEFAULT NULL,
  `highschooldocument` varchar(50) DEFAULT NULL,
  `schoolname` varchar(100) DEFAULT NULL,
  `schooladress` varchar(100) DEFAULT NULL,
  `schooldocument` varchar(50) DEFAULT NULL,
  `universityname` varchar(100) DEFAULT NULL,
  `universityadress` varchar(100) DEFAULT NULL,
  `universitydocument` varchar(50) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `companyadress` varchar(100) DEFAULT NULL,
  `companyphone` bigint(11) DEFAULT NULL,
  `companyjob` varchar(100) DEFAULT NULL,
  `timework` varchar(12) DEFAULT NULL,
  `reasonexit` varchar(100) DEFAULT NULL,
  `companyname2` varchar(100) DEFAULT NULL,
  `companyadress2` varchar(100) DEFAULT NULL,
  `companyphone2` bigint(11) DEFAULT NULL,
  `companyjob2` varchar(100) DEFAULT NULL,
  `timework2` varchar(12) DEFAULT NULL,
  `reasonexit2` varchar(100) DEFAULT NULL,
  `companyname3` varchar(100) DEFAULT NULL,
  `companyadress3` varchar(100) DEFAULT NULL,
  `companyphone3` bigint(11) DEFAULT NULL,
  `companyjob3` varchar(100) DEFAULT NULL,
  `timework3` varchar(12) DEFAULT NULL,
  `reasonexit3` varchar(100) DEFAULT NULL,
  `familyname` varchar(100) DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `yearshim` varchar(12) DEFAULT NULL,
  `familyphone` bigint(11) DEFAULT NULL,
  `familyname2` varchar(100) DEFAULT NULL,
  `relationship2` varchar(100) DEFAULT NULL,
  `yearshim2` varchar(12) DEFAULT NULL,
  `familyphone2` bigint(11) DEFAULT NULL,
  `personalname` varchar(100) DEFAULT NULL,
  `personalyears` varchar(12) DEFAULT NULL,
  `personalphone` bigint(11) DEFAULT NULL,
  `personaladress` varchar(100) DEFAULT NULL,
  `personalname2` varchar(100) DEFAULT NULL,
  `personalyears2` varchar(12) DEFAULT NULL,
  `personalphone2` bigint(11) DEFAULT NULL,
  `personaladress2` varchar(100) DEFAULT NULL,
  `previous` varchar(50) DEFAULT NULL,
  `required` varchar(50) DEFAULT NULL,
  `offered` varchar(50) DEFAULT NULL,
  `homex1` varchar(20) DEFAULT NULL,
  `homex2` varchar(20) DEFAULT NULL,
  `incomeextra` varchar(50) DEFAULT NULL,
  `incomedesc` varchar(100) DEFAULT NULL,
  `yearsliving` varchar(10) DEFAULT NULL,
  `debts` int(11) DEFAULT NULL,
  `debtscell` int(11) DEFAULT NULL,
  `pantry` int(11) DEFAULT NULL,
  `transport` int(11) DEFAULT NULL,
  `maintenance` int(11) DEFAULT NULL,
  `paymentschool` int(11) DEFAULT NULL,
  `medicalservices` int(11) DEFAULT NULL,
  `clothes` int(11) DEFAULT NULL,
  `otherexpenses` int(11) DEFAULT NULL,
  `overall` int(11) DEFAULT NULL,
  `articulo` varchar(150) DEFAULT NULL,
  `glasses` varchar(2) DEFAULT NULL,
  `glasses2` varchar(70) DEFAULT NULL,
  `glasses3` varchar(20) DEFAULT NULL,
  `chronic` varchar(2) DEFAULT NULL,
  `chronic2` varchar(20) DEFAULT NULL,
  `operation` varchar(2) DEFAULT NULL,
  `operation2` varchar(20) DEFAULT NULL,
  `enervants` varchar(2) DEFAULT NULL,
  `enervants2` varchar(20) DEFAULT NULL,
  `activities` varchar(50) DEFAULT NULL,
  `people` varchar(100) DEFAULT NULL,
  `valueperson` varchar(100) DEFAULT NULL,
  `defect` varchar(100) DEFAULT NULL,
  `sport` varchar(2) DEFAULT NULL,
  `sport2` varchar(50) DEFAULT NULL,
  `politic` varchar(2) DEFAULT NULL,
  `politic2` varchar(50) DEFAULT NULL,
  `syndicate` varchar(2) DEFAULT NULL,
  `syndicate2` varchar(50) DEFAULT NULL,
  `conciliation` varchar(2) DEFAULT NULL,
  `conciliation2` varchar(50) DEFAULT NULL,
  `face` varchar(50) DEFAULT NULL,
  `skincolor` varchar(50) DEFAULT NULL,
  `eyecolor` varchar(50) DEFAULT NULL,
  `kindeyes` varchar(50) DEFAULT NULL,
  `haircolor` varchar(50) DEFAULT NULL,
  `complexion` varchar(50) DEFAULT NULL,
  `tattoo` varchar(2) DEFAULT NULL,
  `tattoo2` varchar(50) DEFAULT NULL,
  `tattoo3` varchar(50) DEFAULT NULL,
  `piercing` varchar(2) DEFAULT NULL,
  `piercing2` varchar(50) DEFAULT NULL,
  `piercing3` varchar(50) DEFAULT NULL,
  `observations` varchar(200) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `stature` varchar(15) DEFAULT NULL,
  `typeblood` varchar(10) DEFAULT NULL,
  `birthcertificate` varchar(100) DEFAULT NULL,
  `docadress` varchar(100) DEFAULT NULL,
  `docstudies` varchar(100) DEFAULT NULL,
  `docmilitary` varchar(100) DEFAULT NULL,
  `docine` varchar(100) DEFAULT NULL,
  `docimss` varchar(100) DEFAULT NULL,
  `docrfc` varchar(100) DEFAULT NULL,
  `doccurp` varchar(100) DEFAULT NULL,
  `docnocriminal` varchar(100) DEFAULT NULL,
  `docdebtinfona` varchar(100) DEFAULT NULL,
  `imagebody` varchar(100) DEFAULT NULL,
  `imagehalfbody` varchar(100) DEFAULT NULL,
  `imageleft` varchar(100) DEFAULT NULL,
  `imageright` varchar(100) DEFAULT NULL,
  `imagetoxi` varchar(100) DEFAULT NULL,
  `sheet1` varchar(100) DEFAULT NULL,
  `sheet2` varchar(100) DEFAULT NULL,
  `sheet3` varchar(100) DEFAULT NULL,
  `sheet4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `name`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `City`, `Country`, `suburb`, `Phonenumber`, `Status`, `RegDate`, `placebirth`, `nationality`, `age`, `marital`, `ife`, `curp`, `rfc`, `imss`, `typelicence`, `military`, `phonelocal`, `phonerecado`, `dependent`, `dependentname`, `dependentrelation`, `dependentage`, `dependentname2`, `dependentrelation2`, `dependentage2`, `dependentname3`, `dependentrelation3`, `dependentage3`, `dependentname4`, `dependentrelation4`, `dependentage4`, `dependentname5`, `dependentrelation5`, `dependentage5`, `cp`, `assignedservice`, `fechini`, `primaryname`, `primaryadress`, `primarydocument`, `highschoolname`, `highschooladress`, `highschooldocument`, `schoolname`, `schooladress`, `schooldocument`, `universityname`, `universityadress`, `universitydocument`, `companyname`, `companyadress`, `companyphone`, `companyjob`, `timework`, `reasonexit`, `companyname2`, `companyadress2`, `companyphone2`, `companyjob2`, `timework2`, `reasonexit2`, `companyname3`, `companyadress3`, `companyphone3`, `companyjob3`, `timework3`, `reasonexit3`, `familyname`, `relationship`, `yearshim`, `familyphone`, `familyname2`, `relationship2`, `yearshim2`, `familyphone2`, `personalname`, `personalyears`, `personalphone`, `personaladress`, `personalname2`, `personalyears2`, `personalphone2`, `personaladress2`, `previous`, `required`, `offered`, `homex1`, `homex2`, `incomeextra`, `incomedesc`, `yearsliving`, `debts`, `debtscell`, `pantry`, `transport`, `maintenance`, `paymentschool`, `medicalservices`, `clothes`, `otherexpenses`, `overall`, `articulo`, `glasses`, `glasses2`, `glasses3`, `chronic`, `chronic2`, `operation`, `operation2`, `enervants`, `enervants2`, `activities`, `people`, `valueperson`, `defect`, `sport`, `sport2`, `politic`, `politic2`, `syndicate`, `syndicate2`, `conciliation`, `conciliation2`, `face`, `skincolor`, `eyecolor`, `kindeyes`, `haircolor`, `complexion`, `tattoo`, `tattoo2`, `tattoo3`, `piercing`, `piercing2`, `piercing3`, `observations`, `weight`, `stature`, `typeblood`, `birthcertificate`, `docadress`, `docstudies`, `docmilitary`, `docine`, `docimss`, `docrfc`, `doccurp`, `docnocriminal`, `docdebtinfona`, `imagebody`, `imagehalfbody`, `imageleft`, `imageright`, `imagetoxi`, `sheet1`, `sheet2`, `sheet3`, `sheet4`) VALUES
(1, 890114, 'FELIPE DE JESUS', 'ALCALA', 'TORRES', 'ealcala1478@gmail.com', 'c2f808d66c35793dffe1df5741e5d31e', 'Masculino', '1989-02-14', 'TSI', 'TRUENO No. Exterior  MZ 64 LT 3 No. Interior CS 8', 'CHICOLOAPAN', 'ESTADO DE MEXICO', 'U HAB CD GALAXIA LOS REYES', '5576623968', 1, '2020-02-25 23:54:11', 'TLATELOLCO, D.F.', 'MEXICANO', 30, 'union libre', '6366078646397', 'AATF890214HDFLRL01', 'AATF890214TE9', '78088901299', 'VENCIDA', 'D-1522507', 5588451488, 5584732824, '2', 'KHALID SEBASTIAN ALCALA HERNANDEZ', 'HIJO', '10', 'FELIPE EDUARDO ALCALA HERNANDEZ', 'HIJO', '5', '', '', '0', '', '', '0', '', '', '0', 56383, 'bremen', '2020-10-03', 'MARGARIA MAZA DE JUAREZ', 'OAXACA', 'CERTIFICADO', 'NICOLAS BRAVO', 'CHICOLOAPAN', 'CERTIFICADO', '', '', '', '', '', '', 'COMPRISA', 'COLEGIO-LOMAS DE CHAPULTEPEC', 0, 'JEFE DE TURNO', '4 MESES ', 'VOLUNTARIO (FALTA DE PAGO)', 'PRESIDENCIA MUNICIPAL', 'JALISCO', 0, 'ESCOLTA', '1 año', 'CAMBIO DE ADMINISTRACION', 'MOSEG', 'IZTAPALAPA', 0, 'CUSTODIO ARMADO ', '8 MESES', 'MEJOR OFERTA', 'LUIS FELIPE ALCALA TORRES ', 'HERMANO', '24 años', 5571216299, 'ANA KAREN ALCALA TORRES ', 'HERMANA', '25 años', 1561359207, 'CRISTIAN JOSUE CAMPOS DE LA TORRE ', '7 años', 5548819962, '', 'JONNATHAN CAMPOS DE LA TORRE ', '5 Años', 3314659816, '', '$6,000.00', '$7,500.00', '$6,500.00 ', 'rentada', 'departamento', '', '', '6 años', 0, 100, 1000, 1000, 2900, 1500, 0, 300, 0, 6800, 'estufa, luz, internet, refrigerador, lavadora, televisor, T.v de paga, agua, telefono, ', 'no', '', NULL, 'no', '', 'no', '', 'no', '', 'SALIR, VER TELE, DESCANZAR', 'HIJOS', 'HONESTIDAD, LEALTAD, TOLERANCIA', 'DESHONESTIDAD', 'no', '', 'no', '', 'no', '', 'si', 'FALTA DE PAGO', 'cuadrada', 'trigueña', 'cafe obscuro', 'grandes', 'castaño obscuro', 'mediana', 'no', '', '', 'no', '', '', 'PANTALON: 34 CAMISA: MED BOTAS: #26', '76KG', '1.64MTS', 'O+', '../Documentos/270220220ACTA NACIMIENTO.png', '../Documentos/2702205073COM DOMICILIO.png', '../Documentos/270220781COM ESTUDIOS.png', '../Documentos/2702202277CARTILLA.png', '../Documentos/2702205624INE.png', '../Documentos/2702203465NSS.png', '../Documentos/2702201909RFC.pdf', '../Documentos/2702201848CURP.png', '../Documentos/270220902toxi.png', '../Documentos/270220530toxi.png', '\r\n\r\n../Imagenes/2502204648cuerpocompleto.png', '../Imagenes/2502201764frontal.png', '../Imagenes/2502206440perfilizquierdo.png', '../Imagenes/2502204960perfilderecho.png', '../Imagenes/250220196toxi.png', '../Documentos/2702203840toxi.png', '../Documentos/270220210toxi.png', '../Documentos/270220136toxi.png', '../Documentos/2702205624toxi.png'),
(2, 780627, 'MAURICIO', 'CAMPUZANO', 'ELIZALDE', 'mcechino@gmail.com', '2f6d033d04221936ff65bededa3375e1', 'Masculino', '1978-06-27', 'TSI', 'PROLONGACION 16 DE SEPTIEMBRE No. Exterior  MZA 15  No. Interior DPTO 401', 'XOCHIMILCO ', 'D.F.', 'TABLAS DE SAN LORENZO ', '5547828415', 1, '2020-02-27 20:26:28', 'D.F.', 'MEXICANO', 41, 'separado/a', '4242049668284', 'CAEM780627HDFMLR04', 'CAEM780627SN6', '07997807222', '', 'C-2738711', 0, 63651724, '1', 'MARIA DEL ROSARIO CAMPUZANO', 'MAMÁ', '71 años', '', '', '0', '', '', '0', '', '', '0', '', '', '0', 16090, 'hannover', '2019-09-30', 'SOMALIA', 'VILLACOAPA', 'CERTIFICADO', 'TEC. N°40', 'VILLACOAPA', 'CERTIFICADO', 'BACHILLERES N°3', 'TEPEPAN', 'CERTIFICADO', '', '', '', 'XABAL', 'SAN PEDRO DE LOS PINOS ', 0, 'JT- 8 ELEMENTOS A CARGO', '1 AÑO ', 'TERMINO DE SERVICIO', 'DISEÑO Y TENDENCIA EUROPEA', 'BALDERAS', 0, 'INTRAMURO-CHOFER ESCOLTA ARMADO', '3 AÑOS', 'CIERRE DE LA FABRICA', 'GUARDIA DE SEGURIDAD ', 'COYOACAN', 0, 'GUARDIA DE SEGURIDAD ', '8 MESES ', 'VOLUNTARIO (CAMBIO DE SEDE)', 'VANESA CAMPUZANO ELIZALDE', 'HERMANA', '31 AÑOS', 5564101425, 'MARCO SAID CAMPUZANO ', 'PRIMO', '28 AÑOS ', 5510979624, 'NOHEMI IBAÑEZ ', '15 AÑOS', 5548657833, '', 'LORENA HERNANDEZ ', '10 AÑOS', 5511936446, '', '$6,000.00', '$6,500.00', '$6,500 + BONO $500 = $7,000.00', 'rentada', 'otra', '', '', '5 años', 0, 200, 4000, 500, 600, 0, 0, 1000, 0, 6300, 'estufa, microondas, computadora, estereo, luz, internet, refrigerador, lavadora, televisor, T.v de paga, agua, ', 'si', 'miopía y astigmatismo', NULL, 'no', '', 'no', '', 'no', '', 'CAMINAR, ESCUCHAR MUSICA', 'MAMÁ, PRIMOS ', 'HONESTIDAD, UNION, HONRRADEZ', 'ABUSO DE CONFIANZA, DESHONESTIDAD', 'no', '', 'no', '', 'no', '', 'no', '', 'redonda', 'trigueña', 'cafe obscuro', 'rasgados', 'castaño obscuro', 'gruesa', 'si', 'HOMBRO DERECHO', 'MEDIANO', 'no', '', '', 'CTA: BBVA 012180015252870949 PANTALON: 36-38 CAMISA: GDE BOTAS: #28 ', '89 KG', '1.76MTS', 'O+', '../Documentos/2802204590ACTA DE NACIMIENTO.png', '../Documentos/280220135COM DOMICILIO.png', '../Documentos/2802203402COM ESTUDIOS.png', '../Documentos/2802203312', '../Documentos/2802201027IFE.png', '../Documentos/280220228NSS.png', '../Documentos/2802201711RFC.png', '../Documentos/28022011CURP.png', '../Documentos/2802201457COM DOMICILIO.png', '../Documentos/2802201633', '../Imagenes/02032028CUERPOCOMPLETO.png', '../Imagenes/2702202765mediocuerpo.png', '../Imagenes/2702204480perfilizquierdo.png', '../Imagenes/2702204324perfilderecho.png', '../Imagenes/2702202244toxicologico.png', '../Documentos/2802203922CARTA COMPROMISO_CAPACITACIÓN 2018.docx', '../Documentos/2802201848CARTA COMPROMISO_CAPACITACIÓN 2018.docx', '../Documentos/2802202756CARTA COMPROMISO_CAPACITACIÓN 2018.docx', '../Documentos/280220704CARTA COMPROMISO_CAPACITACIÓN 2018.docx'),
(3, 800426, 'MARCELINO', 'GRANDE', 'FELIX', 'grande@hotmail.com', '7a3e1c7c45a215a4cbd11d441e63ec4f', 'Masculino', '1980-04-26', 'TSI', 'CIMATL INT 4  No. Exterior MZ 57 No. Interior LT 14 ', 'ECATEPEC', 'ESTADO DE MEXICO', 'CUAHUTEMOC', '5548375192', 1, '2020-03-02 15:53:03', 'HIDALGO', 'MEXICANO', 39, 'casado/a', '0225060808052', 'GAFM800426HHGRLR03', 'GAFM800426NF4', '01978012829', '', '', 0, 7712143044, '3', 'DIANA KAREN GRANDE LOPEZ', 'HIJA', '13 AÑOS', 'LUIS FERNANDO GRANDE LOPEZ', 'HIJO', '8 AÑOS', 'JUAN ANTONIO GRANDE LOPEZ', 'HIJO', '20 AÑOS', '', '', '', '', '', '', 55067, 'san francisco', '2019-09-09', 'CRISTOBAL CONTRERAS', 'CALNALI', 'CERTIFICADO', 'TECNICA N. 9', 'CALNALI', 'CERTIFICADO', '', '', '', '', '', '', 'MONTE VERDE', 'CALNALI HGO.', 7711035396, 'VENDEDOR AGUA', '4 AÑOS ', 'PERSONAL', 'ALBAÑILERIA', 'CANALI, HGO.', 0, 'ALBAÑIL MANO DE OBRA', '10 AÑOS ', 'SALUD', 'AUTOTANQUES', 'VENTA DE CARPIO, ECATEPEC', 0, 'GUARDIA DE SEGURIDAD', '2 AÑOS', 'FAMILIAR ', 'RUBEN GRANDE FELIX ', 'HERMANO', '34 AÑOS', 7712039192, 'VERONICA LOPEZ FLORES ', 'ESPOSA', '21 AÑOS ', 7712143044, 'ANDRES FRANCO ', '4 AÑOS', 4428381666, '', '', '', 0, '', '$3,200.00', '$7,000.00', '$6,000.00 + BONO', 'rentada', 'otra', '', '', '20 DIAS ', 0, 100, 3000, 1100, 500, 200, 0, 500, 0, 5400, 'estufa, luz, internet, refrigerador, ', 'no', '', NULL, 'no', '', 'si', 'YUGULAR DERECHA (3 A', 'no', '', 'DEPORTE', 'HIJOS', 'RESPETO, HONESTIDAD, FAMILIA', 'HUMILLAR', 'no', '', 'no', '', 'no', '', 'no', '', 'redonda', 'mulata', 'cafe obscuro', 'pequeños', 'castaño obscuro', 'mediana', 'no', '', '', 'no', '', '', 'CTA: PARA CREAR BBVA PANTALON: 32 CAMISA: MED BOTAS: #26', '74 KG', '1.62 MTS', '', '../Documentos/0203201680ACTA NAC.jpg', '../Documentos/0203204704COMP DE DOM.jpg', '../Documentos/020320320RFC.jpg', '../Documentos/0203209409', '../Documentos/0203201365INE.jpg', '../Documentos/0203202726NSS.jpg', '../Documentos/0203203268RFC.jpg', '../Documentos/0203203420CURP.jpg', '../Documentos/020320781RFC.jpg', '../Documentos/0203203888', '../Imagenes/02032028CUERPOCOMPLETO.png', '../Imagenes/020320803FRONTAL.png', '../Imagenes/020320155PERFILIZQUIERDO.png', '../Imagenes/0203203813PERFILDERECHO.png', '../Imagenes/0203201608TOXI.png', '../Documentos/02032038NSS.jpg', '../Documentos/020320710NSS.jpg', '../Documentos/0203202494NSS.jpg', '../Documentos/0203201164NSS.jpg'),
(4, 910610, 'JORGE ALONSO', 'LUNA', 'MONTAÑEZ', 'alonsomontanes123@hotmail.com', 'ba8a48b0e34226a2992d871c65600a7c', 'Masculino', '1991-06-10', 'TSI', 'PRIV 21 DE MARZO No. Exterior  MZ 23 No. Interior LT 38', 'NICOLAS ROMERO ', 'ESTADO DE MEXICO ', 'EL TRAFICO', '5571188266', 1, '2020-03-02 21:08:13', 'EDO DE MEXICO', 'MEXICANO', 27, 'union libre', '3735119834735', 'LUMJ910610HMCNNR00', 'LUMJ9106102K1', '14089128889', '', 'D-1200903', 0, 58211764, '2', 'MARIBEL PALPICA SANTES', 'ESPOSA', '29 años', 'JORGE ALFREDO LUNA MALPICA', 'HIJO', '4 años', '', '', '', '', '', '', '', '', '', 54435, 'los angeles', '2019-10-02', 'FRANCISCO I. MADERO ', 'POLOTITLAN EDO.MEX', 'CERTIFICADO', 'SECRETARIA DE EDUCACION', 'NICOLAS ROMERO', 'CERTIFICADO EN PROCESO', '', '', '', '', '', '', 'SIOS', 'NICOLAS ROMERO TOWN CENTER', 0, 'GUARDIA DE SEGURIDAD', '1 ½ MESES', 'FALTA DE PAGO', 'BOMBEROS ATIZAPAN', 'ATIZAPAN', 0, 'SANGENTO 2°', '9 AÑOS', 'CAMBIO DE ADMINISTRACIÓN', '', '', 0, '', '', '', 'JUANA BAUTISTA NAVARRETE', 'TÍA', '28 AÑOS', 58215345, 'MARIBEL MALPICA SANTES ', 'ESPOSA', '7 AÑOS', 5612991667, 'GUSTAVO MALVAEZ HERNANDEZ', '28 AÑOS', 16600700, '', 'RAUL MALPICA GARCIA', '5 AÑOS', 4434233466, '', '$6,200.00', '$8,000.00', '$6,500.00 + BONO', 'propio', 'casa', '', '', '1 año', 0, 100, 3000, 600, 700, 0, 0, 2000, 0, 6400, 'estufa, microondas, estereo, luz, internet, refrigerador, lavadora, televisor, agua, ', 'si', 'Miopía', NULL, 'no', '', 'no', '', 'no', '', 'CONVIVIR CON SU FAMILIA', 'ESPOSA E HIJO', 'RESPONSABILIDAD, AMABILIDAD, TRANQUILIDAD', 'ABUSO DE AUTORIDAD', 'si', 'FUTBOL', 'no', '', 'no', '', 'no', '', 'redonda', 'mulata', 'cafe obscuro', 'grandes', 'castaño obscuro', 'mediana', 'no', '', '', 'no', '', '', 'PANTALON: 34 CAMISA: MED BOTAS: #26', '77KG', '1.63MTS', '', '../Documentos/020320238ACTA NACIMIENTO.png', '../Documentos/0203207347COM DOMICILIO.png', '../Documentos/0203208170COM ESTUDIOS.png', '../Documentos/0203203300CARTILLA.png', '../Documentos/0203203784IFE.png', '../Documentos/0203204056NSS.png', '../Documentos/0203204263RFC.png', '../Documentos/0203203135CURP.png', '../Documentos/0203201222ANT NO PENALES EST.png', '../Documentos/020320320', '../Imagenes/0203201386CUERPOCOMPLETO.png', '../Imagenes/02032084FRONTAL.png', '../Imagenes/0203204371PERFILIZQUIERDO.png', '../Imagenes/0203202870PERFILIDERECHO.png', '../Imagenes/0203201376TOXI.png', '../Documentos/020320525TOXI.png', '../Documentos/0203201656TOXI.png', '../Documentos/0203204366TOXI.png', '../Documentos/0203200TOXI.png'),
(5, 776445, 'tryhyujyu', 'jyuj', 'yujty', 'eewr@dddd.com', '0cc175b9c0f1b6a831c399e269772661', 'Femenino', '1990-06-19', 'tecnicos', 'iopuipo', 'lkl', 'lkll', 'lkjlkj', '6786806907', 1, '2020-03-09 15:24:54', 'tyujujuty', 'tyujtyu', 28, 'divorciado/a', 'ytujtyuj', 'tyujtyujtyujtyuj', 'ulkjñkjñkñ', 'yujyujty', 'hjllk', 'kll', 5465667856, 6789678978, '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 65437, 'chicago', '2020-03-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', NULL, NULL, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '', NULL, NULL, '', NULL, '', NULL, '', '', '', '', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', '', '', '', '', '', '../Documentos/130320436818707.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../Imagenes/09032013201.jpg', '../Imagenes/0903207626jessy.jpg', '../Imagenes/09032011761.jpg', '../Imagenes/09032012881.jpg', '../Imagenes/09032032661.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblincidents`
--

CREATE TABLE `tblincidents` (
  `id` int(11) NOT NULL,
  `datetime` varchar(70) NOT NULL,
  `service` varchar(50) NOT NULL,
  `empid` varchar(6) NOT NULL,
  `technical` varchar(50) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `art` varchar(50) NOT NULL,
  `issue` int(2) NOT NULL,
  `productivity` varchar(150) NOT NULL,
  `isread` int(1) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblincidents`
--

INSERT INTO `tblincidents` (`id`, `datetime`, `service`, `empid`, `technical`, `reason`, `art`, `issue`, `productivity`, `isread`, `createdate`) VALUES
(15, '2020-02-26T03:02', 'plomo', '890114', ' FELIPE DE JESUS ALCALA TORRES', 'thpiñpo90uloiyl', 'retardo', 1, 'r6y5jiy7uu', 1, '2020-03-13 00:08:49'),
(16, '2018-02-08T14:13', 'canterbury', '890114', ' FELIPE DE JESUS ALCALA TORRES', 'ddd', 'bono', 3, 'dswfreff', 1, '2020-03-12 23:14:33'),
(17, '2020-02-28T18:02', 'san francisco', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'wefwefewfew', 'retardo', 3, 'wefwef', 1, '2020-03-12 23:14:37'),
(18, '2020-02-28T06:42', 'valladolid', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'acdssdcvs', 'falta', 1, 'vfrewgrthtyr', 1, '2020-03-12 23:14:45'),
(19, '2020-03-04T03:02', 'derby', '910610', ' JORGE ALONSO LUNA MONTAÑEZ', 'dfasggjjglh', 'falta', 1, '10', 1, '2020-03-12 23:14:41'),
(20, '2020-03-12T18:12', 'hamburgo', '910610', ' JORGE ALONSO LUNA MONTAÑEZ', 'falta de respeto a su compañera', 'bono', 1, 'mala', 1, '2020-03-13 00:13:14'),
(21, '2020-02-03T02:00', 'las vegas', '776445', ' tryhyujyu jyuj yujty', '434', 'bono', 3, '34', 1, '2020-03-23 21:52:12'),
(23, '2020-03-30T04:04', 'los angeles', '776445', ' tryhyujyu jyuj yujty', '2354', 'bono', 1, 'eerwggrew', 1, '2020-03-30 19:29:25'),
(24, '2019-04-11T03:01', 'oxford', '800426', ' MARCELINO GRANDE FELIX', 'xasfsdaf', 'retardo', 1, 'as', 1, '2020-03-30 19:29:34'),
(25, '2019-12-24T01:01', 'munich', '776445', ' tryhyujyu jyuj yujty', 'fdsfsd', 'bono', 2, 'sdfs', 1, '2020-03-30 19:29:31'),
(26, '2019-12-11T18:00', 'zaragoza', '776445', ' tryhyujyu jyuj yujty', 'dasasdf', 'bono', 1, 'dsf', 1, '2020-03-30 19:29:40'),
(27, '2019-06-05T17:00', 'hannover', '776445', ' tryhyujyu jyuj yujty', 'daswfds', 'retardo', 1, 'sfsdafas', 1, '2020-03-30 19:29:37'),
(28, '2019-07-19T19:00', 'diamante', '776445', ' tryhyujyu jyuj yujty', 'dsfsda', 'bono', 1, 'dsaf', 1, '2020-03-30 22:48:38'),
(29, '2020-03-10T14:00', 'nueva york', '776445', ' tryhyujyu jyuj yujty', 'dfdggfdgfs', 'falta', 1, 'sqsdfdas', 1, '2020-03-30 22:48:44'),
(30, '2021-01-03T02:00', 'nueva york', '776445', ' tryhyujyu jyuj yujty', 'dasfdasf', 'retardo', 1, 'sdfdsaf', 1, '2020-03-30 22:50:00'),
(31, '2020-01-03T02:01', 'munich', '776445', ' tryhyujyu jyuj yujty', 'dfdfasfgas', 'falta', 1, 'asfasdf', 1, '2020-03-30 22:48:48'),
(32, '2020-03-30T03:00', 'londres', '776445', ' tryhyujyu jyuj yujty', 'dffe', 'bono', 1, 'gdbg', 1, '2020-03-30 22:48:57'),
(33, '2020-01-05T02:00', 'hamburgo', '776445', ' tryhyujyu jyuj yujty', 'kñ{kl{', 'retardo', 2, 'kl{jk{ñlj', 1, '2020-03-30 22:48:53'),
(34, '2019-08-06T14:02', 'bremen', '910610', ' JORGE ALONSO LUNA MONTAÑEZ', 'gjkg', 'retardo', 2, 'gkghkj', 1, '2020-03-30 22:49:44'),
(35, '2019-10-10T04:00', 'oxford', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'hnh', 'retardo', 2, 'gfhngfh', 1, '2020-03-30 22:49:47'),
(36, '2019-10-10T04:00', 'oxford', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'hnh', 'retardo', 2, 'gfhngfh', 1, '2020-03-30 22:49:51'),
(37, '2019-10-10T04:00', 'oxford', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'hnh', 'retardo', 2, 'gfhngfh', 1, '2020-03-30 22:49:29'),
(38, '2019-10-10T04:00', 'oxford', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'hnh', 'retardo', 2, 'gfhngfh', 1, '2020-03-30 22:50:04'),
(39, '2019-10-10T04:00', 'oxford', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'hnh', 'retardo', 2, 'gfhngfh', 1, '2020-03-30 22:49:55'),
(40, '2020-03-14T04:00', 'san francisco', '776445', ' tryhyujyu jyuj yujty', 'dwfew', 'falta', 2, 'gretge', 1, '2020-03-30 22:49:40'),
(41, '2019-12-18T02:00', 'stuttgart', '910610', ' JORGE ALONSO LUNA MONTAÑEZ', 'swsd', 'bono', 1, 'wss', 1, '2020-03-30 22:50:11'),
(42, '2020-03-30T15:00', 'chester', '910610', ' JORGE ALONSO LUNA MONTAÑEZ', 'gnn', 'retardo', 2, '5uj', 1, '2020-03-30 22:49:24'),
(43, '2020-03-18T01:01', 'cordoba', '780627', ' MAURICIO CAMPUZANO ELIZALDE', 'eff', 'bono', 1, 'rff', 1, '2020-03-30 22:49:15'),
(44, '2020-02-01T02:01', 'san francisco', '800426', ' MARCELINO GRANDE FELIX', '44323', 'bono', 3, '342', 1, '2020-03-30 22:49:06'),
(45, '2020-03-14T02:00', 'chicago', '800426', ' MARCELINO GRANDE FELIX', '2kmkljnm', 'bono', 2, 'hjtyukyuk', 1, '2020-03-30 19:29:20'),
(46, '2020-03-18T13:00', 'los angeles', '910610', ' JORGE ALONSO LUNA MONTAÑEZ', 'dwqdqd', 'retardo', 1, 'dqwdqew', 1, '2020-03-30 19:29:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `empid`) VALUES
(7, 'Casual Leave', '30/11/2017', '29/10/2017', 'test description test descriptiontest descriptiontest descriptiontest descriptiontest descriptiontest descriptiontest description', '2017-11-19 13:11:21', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.\r\n', '2017-12-02 23:26:27 ', 2, 1, 1),
(8, 'Medical Leave test', '21/10/2017', '25/10/2017', 'test description test descriptiontest descriptiontest descriptiontest descriptiontest descriptiontest descriptiontest description', '2017-11-20 11:14:14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-12-02 23:24:39 ', 1, 1, 1),
(9, 'Medical Leave test', '08/12/2017', '12/12/2017', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.\r\n', '2017-12-02 18:26:01', 'esta aprobada esta solcitud del empleado', '2018-06-26 22:47:13 ', 1, 1, 2),
(10, 'Restricted Holiday(RH)', '25/12/2017', '25/12/2017', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', '2017-12-03 08:29:07', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', '2017-12-03 14:06:12 ', 1, 1, 1),
(11, 'vacaciones empleados', '01/06/2018', '28/06/2018', 'permiso vaciones', '2018-06-26 17:19:43', 'aprobada por vacaciones', '2018-06-26 22:50:35 ', 1, 1, 4),
(12, 'Medical Leave test', '02/10/2020', '01/10/2020', 'algo', '2019-12-30 23:12:59', 'has faltado mucho', '2019-12-31 4:46:19 ', 2, 1, 7),
(13, 'Medical Leave test', '02/10/2020', '10/10/2020', 'añgo', '2019-12-30 23:13:22', 'tienes el tiempo indicado, pero siempre y cuando pagues tiempo extra', '2019-12-31 5:16:11 ', 1, 1, 7),
(14, '', '01/02/2020', '02/05/2019', 'asaasa', '2020-01-02 15:36:05', 'ya no cuentas con vacaciones, en caso que se algo muy urgente por favor de comentarlo personalmente.\r\nPara platicar sobre el tema \r\nGracias', '2020-01-02 21:58:45 ', 2, 1, 6),
(15, '', '02/02/2020', '02/02/2019', 'aaa', '2020-01-02 15:36:28', 'ascas', '2020-01-02 21:59:40 ', 1, 1, 6),
(16, 'vacaciones empleados', '05/06/2019', '05/07/2019', 'incapacidad', '2020-01-02 22:01:36', 'por favor', '2020-01-16 5:36:29 ', 2, 1, 6),
(17, 'Vacaciones restringidas(RH)', '01/03/2020', '02/03/2020', 'Pido por favor vaciones en esos días por cuestiones personales.', '2020-02-28 17:13:23', NULL, NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `CreationDate`) VALUES
(1, 'Permiso Ocasional', 'Permiso Ocasional', '2017-11-01 12:07:56'),
(2, 'Permiso médico', 'Permiso médico', '2017-11-06 13:16:09'),
(3, 'Vacaciones restringidas(RH)', 'Vacaciones restringidas(RH)', '2017-11-06 13:16:38'),
(4, 'permiso salud', 'salud', '2018-06-26 17:03:29'),
(5, 'vacaciones empleados', 'vacaciones empleados', '2018-06-26 17:18:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblserviceassigned`
--

CREATE TABLE `tblserviceassigned` (
  `id` int(11) NOT NULL,
  `servicename` varchar(150) NOT NULL,
  `servicecode` varchar(50) NOT NULL,
  `serviceaddress` varchar(200) NOT NULL,
  `coordinates` varchar(200) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblserviceassigned`
--

INSERT INTO `tblserviceassigned` (`id`, `servicename`, `servicecode`, `serviceaddress`, `coordinates`, `creationdate`) VALUES
(1, 'washington', '1', '', '', '2020-02-25 23:19:20'),
(2, 'nueva york', '2', '', '', '2020-02-25 23:19:28'),
(3, 'chicago', '3', '', '', '2020-02-25 23:19:39'),
(4, 'los angeles', '4', '', '', '2020-02-26 15:18:42'),
(5, 'san francisco', '5', '', '', '2020-02-25 23:20:14'),
(6, 'munich', '6', '', '', '2020-02-25 23:20:35'),
(7, 'hamburgo', '7', '', '', '2020-02-25 23:20:48'),
(8, 'bremen', '8', '', '', '2020-02-25 23:20:58'),
(9, 'hannover', '9', '', '', '2020-02-25 23:21:14'),
(10, 'las vegas', '10', '', '', '2020-02-25 23:21:25'),
(11, 'stuttgart', '11', '', '', '2020-02-25 23:21:45'),
(12, 'rostock', '12', '', '', '2020-02-25 23:21:58'),
(13, 'dresde', '13', '', '', '2020-02-25 23:22:11'),
(14, 'bonn', '14', '', '', '2020-02-25 23:22:54'),
(15, 'nuremberg', '15', '', '', '2020-02-25 23:23:08'),
(16, 'neuss', '16', '', '', '2020-02-25 23:23:21'),
(17, 'francfort', '17', '', '', '2020-02-25 23:23:42'),
(18, 'arizona', '18', '', '', '2020-02-25 23:23:52'),
(19, 'san diego', '19', '', '', '2020-02-25 23:24:02'),
(20, 'londres', '20', '', '', '2020-02-25 23:24:10'),
(21, 'liverpool', '21', '', '', '2020-02-25 23:24:29'),
(22, 'edimburgo', '22', '', '', '2020-02-25 23:24:40'),
(23, 'manchester', '23', '', '', '2020-02-25 23:24:48'),
(24, 'chester', '24', '', '', '2020-02-25 23:25:02'),
(25, 'derby', '25', '', '', '2020-02-25 23:25:13'),
(26, 'nottingham', '26', '', '', '2020-02-25 23:25:34'),
(27, 'brandford', '27', '', '', '2020-02-25 23:26:00'),
(28, 'canterbury', '28', '', '', '2020-02-25 23:26:22'),
(29, 'sunderland', '29', '', '', '2020-02-25 23:26:36'),
(30, 'salisbury', '30', '', '', '2020-02-25 23:26:49'),
(31, 'cambridge', '31', '', '', '2020-02-25 23:27:03'),
(32, 'stirling', '32', '', '', '2020-02-25 23:27:22'),
(33, 'dover', '33', '', '', '2020-02-25 23:27:30'),
(34, 'lincoln', '34', '', '', '2020-02-25 23:27:46'),
(35, 'madrid', '35', '', '', '2020-02-25 23:27:58'),
(36, 'barcelona', '36', '', '', '2020-02-25 23:28:43'),
(37, 'valencia', '37', '', '', '2020-02-25 23:28:52'),
(38, 'sevilla', '38', '', '', '2020-02-25 23:29:02'),
(39, 'pamplona', '39', '', '', '2020-02-25 23:29:13'),
(40, 'cordoba', '40', '', '', '2020-02-25 23:29:25'),
(41, 'girona', '41', '', '', '2020-02-25 23:29:42'),
(42, 'salamanca', '42', '', '', '2020-02-25 23:29:56'),
(43, 'malaga', '43', '', '', '2020-02-25 23:30:08'),
(44, 'palencia', '44', '', '', '2020-02-25 23:30:25'),
(45, 'bilbao', '45', '', '', '2020-02-25 23:30:35'),
(46, 'zaragoza', '46', '', '', '2020-02-25 23:30:49'),
(47, 'valladolid', '47', '', '', '2020-02-25 23:31:03'),
(48, 'santander', '48', '', '', '2020-02-25 23:31:13'),
(49, 'mallorca', '49', '', '', '2020-02-25 23:31:21'),
(50, 'briston', '50', '', '', '2020-02-25 23:31:33'),
(51, 'country', '51', '', '', '2020-02-25 23:31:44'),
(52, 'leeds', '52', '', '', '2020-02-25 23:31:54'),
(53, 'york', '53', '', '', '2020-02-25 23:32:03'),
(54, 'oxford', '54', '', '', '2020-02-25 23:32:10'),
(55, 'oro', '55', '', '', '2020-02-25 23:32:17'),
(56, 'plata', '56', '', '', '2020-02-25 23:32:27'),
(57, 'niquel', '57', '', '', '2020-02-25 23:32:38'),
(58, 'plomo', '58', '', '', '2020-02-25 23:32:46'),
(59, 'aluminio', '59', '', '', '2020-02-25 23:32:54'),
(60, 'hierro', '60', '', '', '2020-02-25 23:33:02'),
(61, 'mercurio', '61', '', '', '2020-02-25 23:33:10'),
(62, 'diamante', '62', '', '', '2020-02-25 23:33:23'),
(63, 'ejemplo', '23332', 'nose donde ', '22.39832726730525,-100.40435143481444', '2020-03-19 16:58:55'),
(64, 'rgfgbhgfhjgj', '425253', 'ghjgfjfhgjfghjgfhjghfghjghfjghfjghjgf', '19.752481749060212,-99.16461297045898', '2020-03-13 22:42:23'),
(65, 'wefqe', 'ew23', 'frefqew', 'fqrfqrewrgv', '2020-03-13 22:42:41'),
(66, 'dfgdgfhghfjghf', '5465467', '', '19.725014006282077,-99.21714135180663', '2020-03-19 16:52:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `empid` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `user` varchar(25) NOT NULL,
  `password` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblusers`
--

INSERT INTO `tblusers` (`id`, `empid`, `name`, `firstname`, `lastname`, `user`, `password`, `image`, `kind`, `status`, `regdate`) VALUES
(15, 894562, 'rtbhre', 'hrertg', 'rehreh', 'ejemplo', 'sup', '../Perfil/250220989weather.jpg', 'supervisor', 1, '2020-02-28 19:16:20'),
(16, 235646, 'ejemplo', 'jnj', 'njiniju', 'ejemplo', 'ejemplo', '../Perfil/2802205481jessy.jpg', 'rhrbhte', 0, '2020-02-28 15:41:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbldocument`
--
ALTER TABLE `tbldocument`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbldocuments`
--
ALTER TABLE `tbldocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbldoublets`
--
ALTER TABLE `tbldoublets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblincidents`
--
ALTER TABLE `tblincidents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indices de la tabla `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblserviceassigned`
--
ALTER TABLE `tblserviceassigned`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tbldocument`
--
ALTER TABLE `tbldocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbldocuments`
--
ALTER TABLE `tbldocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbldoublets`
--
ALTER TABLE `tbldoublets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblincidents`
--
ALTER TABLE `tblincidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblserviceassigned`
--
ALTER TABLE `tblserviceassigned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
