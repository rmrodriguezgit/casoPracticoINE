DROP TABLE IF EXISTS `localidades`;
CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL COMMENT 'Relación con municipios.id',
  `clave` varchar(4) NOT NULL COMMENT 'Cve_Loc – Clave de la localidad',
  `nombre` varchar(100) NOT NULL COMMENT 'Nom_Loc – Nombre de la localidad',
  `mapa` int(10) NOT NULL COMMENT 'Mapa - Identificador del INEGI',
  `ambito` varchar(1) NOT NULL COMMENT 'Ámbito - Clasificación',
  `latitud` varchar(20) NOT NULL COMMENT 'Latitud – Latitud en formato DMS',
  `longitud` varchar(20) NOT NULL COMMENT 'Longitud – Longitud en formato DMS',
  `lat` decimal(10,7) NOT NULL COMMENT 'Lat_Decimal - Latitud en formato DD',
  `lng` decimal(10,7) NOT NULL COMMENT 'Lon_Decimal - Longitud en formato DD',
  `altitud` varchar(15) NOT NULL COMMENT 'Altitud – Altitud',
  `carta` varchar(10) NOT NULL COMMENT 'Cve_Carta - Clave de carta topográfica',
  `poblacion` int(11) NOT NULL COMMENT 'Pob_Total – Población Total',
  `masculino` int(11) NOT NULL COMMENT 'Pob_Masculina – Población Masculina',
  `femenino` int(11) NOT NULL COMMENT 'Pob_Femenina – Población Femenina',
  `viviendas` int(11) NOT NULL COMMENT 'Total De Viviendas Habitadas',
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de Localidades de la Republica Mexicana';
