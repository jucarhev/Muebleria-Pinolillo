/*
Navicat MySQL Data Transfer

Source Server         : zeus
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : pinolillo

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-08-18 10:40:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `apellidos` text,
  `telefono` text,
  `email` text,
  `direccion` text,
  `cp` text,
  `municipio` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `empresa` text,
  `cliente` text,
  `descuento` varchar(10) DEFAULT NULL,
  `fecharegistro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('4', 'fresvindo ', 'lucas', '7711408929', 'pachuca_lori.tuzo@hotmail.com', 'colonia 10 de mayo', '43200', 'zacualtipan', 'hidalgo', 'lori', null, null, null, null);
INSERT INTO `cliente` VALUES ('5', 'juan', 'h', '7777777777', 'juancarlos@gmail.com', 'k', '12345', 'as', 'sas', '123', null, null, null, null);

-- ----------------------------
-- Table structure for comprobante
-- ----------------------------
DROP TABLE IF EXISTS `comprobante`;
CREATE TABLE `comprobante` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_foto` varchar(250) DEFAULT NULL,
  `user` varchar(200) DEFAULT NULL,
  `idpedido` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comprobante
-- ----------------------------

-- ----------------------------
-- Table structure for cuestion
-- ----------------------------
DROP TABLE IF EXISTS `cuestion`;
CREATE TABLE `cuestion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idencuesta` int(10) DEFAULT NULL,
  `idpregunta` int(10) DEFAULT NULL,
  `opcion` varchar(100) DEFAULT NULL,
  `user` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cuestion
-- ----------------------------

-- ----------------------------
-- Table structure for encuesta
-- ----------------------------
DROP TABLE IF EXISTS `encuesta`;
CREATE TABLE `encuesta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of encuesta
-- ----------------------------

-- ----------------------------
-- Table structure for factura
-- ----------------------------
DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idpedido` int(10) DEFAULT NULL,
  `idproducto` int(10) DEFAULT NULL,
  `mueble` varchar(50) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of factura
-- ----------------------------

-- ----------------------------
-- Table structure for fotos
-- ----------------------------
DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_foto` varchar(71) DEFAULT NULL,
  `serie` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fotos
-- ----------------------------
INSERT INTO `fotos` VALUES ('1', 'recamara2.jpg', '17546387');
INSERT INTO `fotos` VALUES ('2', 'recamara1.jpg', '11544189');
INSERT INTO `fotos` VALUES ('3', 'recamara3.jpg', '19565430');
INSERT INTO `fotos` VALUES ('4', 'recamara4.jpg', '18899231');
INSERT INTO `fotos` VALUES ('5', 'recamara5.jpg', '13627319');
INSERT INTO `fotos` VALUES ('6', 'recamara6.jpg', '19457703');
INSERT INTO `fotos` VALUES ('7', 'recamara8.jpg', '16063233');
INSERT INTO `fotos` VALUES ('8', 'recamara7.jpg', '15284729');
INSERT INTO `fotos` VALUES ('9', 'recamara9.jpg', '15271606');
INSERT INTO `fotos` VALUES ('10', 'recamara10.jpg', '16437683');
INSERT INTO `fotos` VALUES ('11', 'banio.jpg', '13131103');
INSERT INTO `fotos` VALUES ('12', 'sala1.jpg', '16932678');
INSERT INTO `fotos` VALUES ('13', 'sala2.jpg', '11809997');
INSERT INTO `fotos` VALUES ('14', 'oficina1.jpg', '11148071');
INSERT INTO `fotos` VALUES ('15', 'oficina2.jpg', '13594665');
INSERT INTO `fotos` VALUES ('16', 'oficina3.jpg', '13088379');
INSERT INTO `fotos` VALUES ('17', 'oficina4.jpg', '13867187');
INSERT INTO `fotos` VALUES ('18', 'oficina10.jpg', '19150696');
INSERT INTO `fotos` VALUES ('19', 'oficina9.jpg', '15290833');
INSERT INTO `fotos` VALUES ('20', 'mascota2.jpg', '12286987');
INSERT INTO `fotos` VALUES ('21', 'mascota1.jpg', '17811890');
INSERT INTO `fotos` VALUES ('22', 'comedor1.jpg', '12573547');

-- ----------------------------
-- Table structure for muebles
-- ----------------------------
DROP TABLE IF EXISTS `muebles`;
CREATE TABLE `muebles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mueble` varchar(100) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of muebles
-- ----------------------------
INSERT INTO `muebles` VALUES ('1', 'Recamara matrimonial', '5', '2000', 'Recamara para dos personas, muy cÃ³moda.', 'recamara2.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('2', 'Recamara individual', '10', '1000', 'Recamara individual para la privacidad personal.', 'recamara1.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('3', 'Recamara El', '5', '2000', 'Una recamara muy elegante para usted y su pareja.', 'recamara3.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('4', 'Recamara matrimonial', '4', '3000', 'Una reamara muy elegante para su comodidad.', 'recamara4.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('5', 'Recamara Par', '3', '2500', 'Una recamara sencilla para usted que es pobre.', 'recamara5.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('6', 'Recamara Sun', '3', '2000', 'Es una recamara solo para dos, cÃ³moda y agradable', 'recamara6.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('7', 'Recamara T', '6', '2500', 'Una recamara elegante para usted y su pareja.', 'recamara8.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('8', 'Recamara Se', '15', '1000', 'Una recamara muy sencilla pero agradable.', 'recamara7.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('9', 'Recamara YF', '8', '2000', 'Una recamara muy apta para usted y su pareja.', 'recamara9.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('10', 'Recamara G', '5', '4000', 'La mejor recamara para su pareja, muy elegante.', 'recamara10.jpg', 'Recamara');
INSERT INTO `muebles` VALUES ('11', 'BaÃ±o', '20', '2000', 'Un baÃ±o es insuficiente para una gran familia. Compre 2.', 'banio.jpg', 'Banos');
INSERT INTO `muebles` VALUES ('12', 'Sala 1', '9', '2000', 'Sala 1 para usted y su familia, y por si hay visita.', 'sala1.jpg', 'Salas');
INSERT INTO `muebles` VALUES ('13', 'Sala 2', '8', '3000', 'Una sala digna de su hogar y de usted.', 'sala2.jpg', 'Salas');
INSERT INTO `muebles` VALUES ('14', 'Oficina che', '8', '3000', 'Oficina de madera de cedros de los arboles de tangamandapio.', 'oficina1.jpg', 'Oficinas');
INSERT INTO `muebles` VALUES ('15', 'Oficina chegoro', '4', '2000', 'Oficinas chegoro, las mejores para sus despachos y demas.', 'oficina2.jpg', 'Oficinas');
INSERT INTO `muebles` VALUES ('16', 'Oficina chema', '9', '2000', 'Oficinas de consultoria para atencion de cliente y demas.', 'oficina3.jpg', 'Oficinas');
INSERT INTO `muebles` VALUES ('17', 'Oficina pro', '9', '4000', 'Oficina para ejecutivos de la mas alta calidad y durabilidad.', 'oficina4.jpg', 'Oficinas');
INSERT INTO `muebles` VALUES ('18', 'Oficina Postal', '15', '1200', 'Una oficina estandar para las pequeÃ±as empresas de cervicios', 'oficina10.jpg', 'Oficinas');
INSERT INTO `muebles` VALUES ('19', 'Oficina multiple', '12', '5000', 'Oficina para trabajadores de empresas, con 4 seperadores.', 'oficina9.jpg', 'Oficinas');
INSERT INTO `muebles` VALUES ('20', 'Casa Dog', '20', '500', 'Casa para mascotas estandar. para cualquier animal.', 'mascota2.jpg', 'Mascotas');
INSERT INTO `muebles` VALUES ('21', 'Casa cat', '15', '500', 'Casa para sus gatos, para que se sienta comodo, y a gusto.', 'mascota1.jpg', 'Mascotas');
INSERT INTO `muebles` VALUES ('22', 'Comedor el', '8', '2000', 'Un comedor para usted y para toda su familia, en un acabado impresionante.', 'comedor1.jpg', 'Comedor');

-- ----------------------------
-- Table structure for opciones
-- ----------------------------
DROP TABLE IF EXISTS `opciones`;
CREATE TABLE `opciones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `opcion` varchar(20) DEFAULT NULL,
  `idencuesta` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of opciones
-- ----------------------------

-- ----------------------------
-- Table structure for pedido
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idusuario` int(10) DEFAULT NULL,
  `idcomprobante` int(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `fechainicio` timestamp NULL DEFAULT NULL,
  `fechaexpiracion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido
-- ----------------------------

-- ----------------------------
-- Table structure for pregunta
-- ----------------------------
DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE `pregunta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(200) DEFAULT NULL,
  `idencuesta` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pregunta
-- ----------------------------

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idpedido` int(10) DEFAULT NULL,
  `idproducto` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producto
-- ----------------------------

-- ----------------------------
-- View structure for pedidos_pendiente
-- ----------------------------
DROP VIEW IF EXISTS `pedidos_pendiente`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `pedidos_pendiente` AS SELECT co.idpedido,nombre,mu.mueble,fa.cantidad,co.id,fechainicio,nombre_foto,mu.precio FROM 
cliente AS cl join pedido AS pe ON 
cl.id=pe.idusuario join comprobante AS co ON pe.id=co.idpedido 
join factura AS fa ON co.idpedido=fa.idpedido join muebles
 AS mu ON fa.idproducto=mu.id ;
