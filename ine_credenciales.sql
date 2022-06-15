USE ine;

DROP TABLE IF EXISTS `credenciales`;
CREATE TABLE `credenciales` (
  `id` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `nombres` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `cp` int NOT NULL,
  `clave_elector` varchar(20) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `id_localidad` int NOT NULL,
  `aRegistro` year NOT NULL,
  `vigencia` int NOT NULL,
  `seccion` varchar(4) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
   FOREIGN KEY (id_localidad) REFERENCES Localidades(id)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de Credenciales INE';

INSERT INTO `credenciales` (`nombres`,`apellidoP`,`apellidoM`,`calle`,`colonia`,`cp`,`clave_elector`,`curp`,`id_localidad`,`aRegistro`,
`vigencia`,`seccion`)
VALUES ('Rubén Miguel','Rodríguez','Rangel','Lago de Chapala 403','Col. industrial',37320,'RDRNRB691029H500','RORR691029HGTDNB01',98896,'2020','2025','1519');

use ine;
select * from credenciales;
