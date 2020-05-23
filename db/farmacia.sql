
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: farmacia
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS categoria;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `idcategoria` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `estatus` tinyint NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES categoria WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Pediatrico',1),(2,'Infantil',1),(3,'Adulto',1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas` (
  `idcuentas` int NOT NULL AUTO_INCREMENT,
  `cuenta` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` float NOT NULL,
  `descuento` float NOT NULL,
  `total` float NOT NULL,
  `comentario` varchar(45) NOT NULL,
  `estatus` tinyint NOT NULL,
  `empleado_FK` int NOT NULL,
  PRIMARY KEY (`idcuentas`),
  KEY `empleado_idx` (`empleado_FK`),
  CONSTRAINT `empleado` FOREIGN KEY (`empleado_FK`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,'isaac jimenez','2019-04-03',210.95,14334.5,208.04,'xdxdxd',0,2),(2,'isaac jimenez','2019-04-03',210.95,14334.5,208.04,'xdxdxd',0,2),(3,'Javier Alexis','2020-05-16',200.5,10.5,190,'isaac se las come',1,1),(4,'isaac jimenez','2019-04-03',210.95,14334.5,208.04,'xdxdxd',0,2);
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE empleado (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `tipoUsuario` varchar(15) NOT NULL,
  `Estado` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'Javier Alexis','Mendoza Garcia','JAMG1819','isaac se las come xd','admin',1),(2,'Isaac','Jimenez Juarez','IJJ456','12345','Cajero',1),(3,'jorge luis','flores lorenzana','jbjvjvvbk','jorge123','Admin',1),(4,'jorge luis','flores lorenzana','jbjvjvvbk','jorge123','Admin',1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos`(
  `idproductos` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `precio` float NOT NULL,
	`cantidad` int NOT NULL,
  `imagen` blob,
  `estatus` tinyint NOT NULL,
  `categoria_FK` int NOT NULL,
  PRIMARY KEY (`idproductos`),
  KEY `cat_idx` (`categoria_FK`),
  CONSTRAINT `categoria_FK` FOREIGN KEY (`categoria_FK`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'champussy',60.9,100,NULL,0,1),(2,'toallas sanitarias',100.88,200,NULL,1,2),(3,'Jabon para culo xd',60.9,300,NULL,0,2),(4,'Jabon para culo xd',60.9,400,NULL,0,2);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `idventas` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cantidad` int NOT NULL,
  `precio` float NOT NULL,
  `total` float NOT NULL,
  `estatus` tinyint NOT NULL,
  `producto_FK` int NOT NULL,
  `cuenta_FK` int NOT NULL,
  PRIMARY KEY (`idventas`),
  KEY `preducto_idx` (`producto_FK`),
  KEY `cuenta_idx` (`cuenta_FK`),
  CONSTRAINT `cuenta` FOREIGN KEY (`cuenta_FK`) REFERENCES `cuentas` (`idcuentas`),
  CONSTRAINT `producto` FOREIGN KEY (`producto_FK`) REFERENCES `productos` (`idproductos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2020-05-13',50,55.78,200.56,1,1,1);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'farmacia'
--
/*!50003 DROP PROCEDURE IF EXISTS `saveOrUpdateCategory` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci*/ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveOrUpdateCategory`(
in id_categoria int,
in descripcion varchar(100),
in estatus tinyint
)
BEGIN
	set @var:=0;
	select (idcategoria) into @var from categoria where idcategoria=id_categoria;
    
    if @var>0 then
    begin
		#si entra aqui va a actualizar
        UPDATE `farmacia`.`categoria`
		SET
		`descripcion` = descripcion,
		`estatus` = estatus
		WHERE `idcategoria` = id_categoria;
    end;
    else
    begin
		#si entra aqui va a insertar
        INSERT INTO `farmacia`.`categoria`
		(`idcategoria`,
		`descripcion`,
		`estatus`)
		VALUES
		(null,
		descripcion,
		estatus);
    end;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `saveOrUpdateCuentas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveOrUpdateCuentas`(
in id int,
in _cuenta varchar(25),
in _fecha date,
in _subtotal float,
in _descuento float,
in _total float,
in _comentario varchar(45),
in _estatus tinyint,
in _empleado_FK int
)
BEGIN
	set @var:=0;
	select (idcuentas) into @var from cuentas where idcuentas=id;
    #select @var;
    
    if @var>0 then
		begin
        #si entra aqui va a actualizar
        UPDATE `cuentas`
		SET
		`cuenta` = _cuenta,
		`fecha` = _fecha,
		`subtotal` = _subtotal,
		`descuento` = _descuento,
		`total` = _total,
		`comentario` = _comentario,
		`estatus` = _estatus,
		`empleado_FK` = _empleado_FK
		WHERE `idcuentas` = id;
		end;
    else
		begin
        #si entra aqui va a insertar
        INSERT INTO `cuentas`
		(`idcuentas`,`cuenta`,`fecha`,`subtotal`,`descuento`,`total`,`comentario`,
		`estatus`,`empleado_FK`)VALUES
		(null,_cuenta,_fecha,_subtotal,_descuento,
		_total,_comentario,_estatus,_empleado_FK);
      		SELECT @@identity AS id_cuenta;
		end;

		begin
			SELECT * FROM `cuentas` WHERE `idcuentas` = id_venta;
		end;
		
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `saveOrUpdateProduct` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveOrUpdateProduct`(
in id_producto int,
in descripcion varchar(45),
in precio float,
in imagen blob,
in estatus tinyint,
in categoria int
)
BEGIN
	set @var:=0;
	select (idproductos) into @var from productos where idproductos=id_producto;
	#select @var as 'resultado';
    
    if(@var>0) then
    begin
    # si entra aqui va a actualizar
    UPDATE `farmacia`.`productos`
	SET
	`descripcion` = descripcion,
	`precio` = precio,
	`imagen` = imagen,
	`estatus` = estatus,
	`categoria_FK` = categoria_FK
	WHERE `idproductos` = id_producto;
    end;
    else
    begin
    # si entra aqui va a insertar
    INSERT INTO `farmacia`.`productos`
	(`idproductos`,
	`descripcion`,
	`precio`,
	`imagen`,
	`estatus`,
	`categoria_FK`)
	VALUES
	(null,
	descripcion,
	precio,
	imagen,
	estatus,
	categoria);
    end;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `saveOrUpdateUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveOrUpdateUser`(
in id_empleado int,
in _nombre varchar(45),
in _apellido varchar(45),
in _usuario varchar(20),
in _contraseña varchar(20),
in _tipo_usuario varchar(15),
in _estado tinyint
)
BEGIN
	set @var:=0;
	select (id) into @var from empleado where id=id_empleado;
    
    if @var>0 then
    begin
		#si entra aqui va a actualizar
        UPDATE `empleado`
		SET
		`nombre` = _nombre,
		`apellido` = _apellido,
		`usuario` = _usuario,
		`contraseña` = _contraseña,
		`tipoUsuario` = _tipo_usuario,
		`Estado` = _estado
		WHERE `id` = id_empleado;
    end;
    else
    begin
		#si entra aqui va a insertar
		INSERT INTO `empleado`
		(`id`,
		`nombre`,
		`apellido`,
		`usuario`,
		`contraseña`,
		`tipoUsuario`,
		`Estado`)
		VALUES
		(null,
		_nombre,
		_apellido,
		_usuario,
		_contraseña,
		_tipo_usuario,
		_estado);

    end;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `saveOrUpdateVentas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;

-- CALL saveOrUpdateVentas ('','2020-05-22','1','60.9','60.0','1','1','43')
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveOrUpdateVentas`(
in id int,
in _fecha date,
in _cantidad int,
in _precio float,
in _total float,
in _estatus tinyint,
in _producto_FK int,
in _cuenta_FK int
)
BEGIN
	set @var:=0;
	select (idventas) into @var from ventas where idventas=id;
    
    if @var>0 then
    begin
		#si entra aqui actualiza
        UPDATE `ventas`
		SET
		`fecha` = _fecha,
		`cantidad` = _cantidad,
		`precio` = _precio,
		`total` = _total,
		`estatus` = _estatus,
		`producto_FK` = _producto_FK,
		`cuenta_FK` = _cuenta_FK
		WHERE `idventas` = id;
    end;
    else
    begin
		#si entra aqui inserta
        INSERT INTO `ventas`
		(`idventas`,
		`fecha`,
		`cantidad`,
		`precio`,
		`total`,
		`estatus`,
		`producto_FK`,
		`cuenta_FK`)
		VALUES
		(null,
		_fecha,
		_cantidad,
		_precio,
		_total,
		_estatus,
		_producto_FK,
		_cuenta_FK);
    end;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-16 19:15:18
