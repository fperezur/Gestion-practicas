-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2022 a las 08:37:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(200) NOT NULL,
  `email_empresa` varchar(25) NOT NULL,
  `telefono_empresa` int(11) NOT NULL,
  `url_empresa` varchar(100) NOT NULL,
  `responsable_empresa` varchar(200) NOT NULL,
  `tutor_empresa` varchar(200) NOT NULL,
  `convenio_estado` enum('Por enviar','Enviado','Firmado','') NOT NULL,
  `anexo_1_estado` enum('Por enviar','Enviado','Firmado','') NOT NULL,
  `anexo_8_estado` enum('Por enviar','Enviado','Firmado','') NOT NULL,
  `rlt_estado` enum('Por enviar','Enviado','Firmado','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `direccion_empresa`, `email_empresa`, `telefono_empresa`, `url_empresa`, `responsable_empresa`, `tutor_empresa`, `convenio_estado`, `anexo_1_estado`, `anexo_8_estado`, `rlt_estado`) VALUES
(1, 'Euroformac', 'Avenida Ortega y Gasset, nº 54', 'info@euroformac.com', 666666666, 'https://euroformac.com', 'Fco Palacios', '', '', '', '', ''),
(2, 'Youopia', '076 Colorado Lane', 'nholberry0@si.edu', 884, 'http://utexas.edu/lacus/curabitur.json?posuere=mi&metus=nulla&vitae=ac&ipsum=enim&aliquam=in&non=tem', 'Nicola Holberry', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(3, 'Reallinks', '56 Westend Street', 'lbelcham1@wiley.com', 210, 'https://un.org/dui/luctus/rutrum/nulla/tellus/in.jpg?id=ultrices&lobortis=aliquet&convallis=maecenas', 'Lelah Belcham', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(4, 'Gabtype', '696 Maple Wood Terrace', 'cshackesby2@parallels.com', 339, 'http://netvibes.com/at/nibh.html?vel=porttitor&ipsum=lacus&praesent=at&blandit=turpis&lacinia=donec&', 'Curran Shackesby', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(5, 'Oozz', '365 David Road', 'bbrandli3@spiegel.de', 369, 'http://nasa.gov/fermentum/justo/nec.png?risus=dapibus&praesent=duis&lectus=at&vestibulum=velit&quam=', 'Bab Brandli', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(6, 'Jaloo', '87935 Meadow Valley Park', 'gconkay4@tuttocitta.it', 172, 'http://squarespace.com/neque/sapien/placerat/ante.jpg?commodo=interdum&vulputate=mauris&justo=non&in', 'Gal Conkay', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(7, 'Trilia', '079 Stuart Lane', 'abigrigg5@joomla.org', 300, 'http://cyberchimps.com/morbi/a/ipsum/integer/a/nibh/in.xml?facilisi=aenean&cras=auctor&non=gravida&v', 'Adriaens Bigrigg', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(8, 'Eare', '154 Summer Ridge Avenue', 'ltoulch6@narod.ru', 487, 'http://opera.com/justo/aliquam/quis/turpis/eget.json?convallis=diam&nulla=erat&neque=fermentum&liber', 'Lynnette Toulch', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(9, 'Rhycero', '35014 Crest Line Trail', 'gclough7@shinystat.com', 922, 'https://dot.gov/euismod/scelerisque/quam/turpis/adipiscing/lorem.jpg?eget=donec&tincidunt=pharetra&e', 'Gertrudis Clough', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(10, 'Jatri', '45 Corben Park', 'ccodner8@tripod.com', 407, 'https://wired.com/sapien/placerat/ante/nulla.jsp?ut=quam&erat=pede&id=lobortis&mauris=ligula&vulputa', 'Cleveland Codner', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(11, 'Kare', '436 Dottie Plaza', 'tkeitley9@cloudflare.com', 210, 'http://gmpg.org/luctus/cum/sociis/natoque/penatibus/et.png?nulla=nulla&nunc=justo&purus=aliquam&phas', 'Tabitha Keitley', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(12, 'Kare', '789 Shasta Way', 'ccutilla@slideshare.net', 827, 'http://tinypic.com/porta/volutpat/quam/pede/lobortis/ligula.html?congue=erat&risus=volutpat', 'Candie Cutill', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(13, 'Zoomlounge', '6 Bellgrove Trail', 'reringtonb@oakley.com', 644, 'http://skyrock.com/leo/maecenas.html?fusce=orci&lacus=luctus&purus=et&aliquet=ultrices&at=posuere&fe', 'Rocky Erington', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(14, 'Aimbo', '85 Mcguire Junction', 'nbaulcombec@constantconta', 936, 'https://sbwire.com/ipsum/ac/tellus/semper/interdum/mauris/ullamcorper.json?donec=pellentesque&ut=ult', 'Nicole Baulcombe', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(15, 'Eidel', '635 Ruskin Road', 'xpatifieldd@ox.ac.uk', 685, 'https://netscape.com/justo/in/blandit.aspx?nulla=facilisi&tellus=cras&in=non&sagittis=velit&dui=nec&', 'Xenia Patifield', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(16, 'Meembee', '543 Goodland Parkway', 'tgilbertsone@ucoz.ru', 833, 'http://cnet.com/luctus/et.json?metus=nascetur&vitae=ridiculus&ipsum=mus&aliquam=etiam&non=vel&mauris', 'Tait Gilbertson', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(17, 'Trudeo', '6526 Petterle Hill', 'rmarzelef@t.co', 386, 'https://networksolutions.com/integer.xml?tortor=nulla&id=facilisi&nulla=cras&ultrices=non&aliquet=ve', 'Rozina Marzele', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(18, 'Rhynyx', '3834 Sachs Hill', 'aelyg@printfriendly.com', 298, 'http://usda.gov/erat/tortor.json?vitae=feugiat&quam=et&suspendisse=eros&potenti=vestibulum&nullam=ac', 'Anny Ely', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(19, 'Browsecat', '77080 Calypso Crossing', 'pkilbornh@aboutads.info', 440, 'https://zdnet.com/in/hac/habitasse/platea/dictumst/etiam/faucibus.js?nulla=odio&sed=cras&accumsan=mi', 'Perkin Kilborn', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(20, 'Ozu', '80154 Dayton Alley', 'vmacpeicei@uiuc.edu', 252, 'https://cargocollective.com/urna/ut/tellus.jpg?sed=metus&justo=arcu&pellentesque=adipiscing&viverra=', 'Vivyan MacPeice', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar'),
(21, 'Topiclounge', '45 Starling Place', 'adowsj@reuters.com', 795, 'https://networksolutions.com/turpis/adipiscing/lorem.html?nisi=varius&vulputate=nulla&nonummy=facili', 'Antonino Dows', '', 'Por enviar', 'Por enviar', 'Por enviar', 'Por enviar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `fecha_incidencia` date NOT NULL,
  `texto_incidencia` text NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre_completo`) VALUES
(1, 'fpalacioschaves', 'grespelen601', 'Fco Palacios Chaves');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
