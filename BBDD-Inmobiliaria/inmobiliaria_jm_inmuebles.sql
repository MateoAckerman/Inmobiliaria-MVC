-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: inmobiliaria_jm
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `inmuebles`
--

DROP TABLE IF EXISTS `inmuebles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inmuebles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `baños` int DEFAULT NULL,
  `aparcamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inmuebles_vendedores_idx` (`vendedores_id`),
  CONSTRAINT `fk_inmuebles_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inmuebles`
--

LOCK TABLES `inmuebles` WRITE;
/*!40000 ALTER TABLE `inmuebles` DISABLE KEYS */;
INSERT INTO `inmuebles` VALUES (1,'Casa Minimalista',150000.00,'14e006a228d45a5d6bfdf623d56dcbc6.jpg','Preciosa casa en urbanización en primera línea de playa con piscina.',5,2,1,NULL,2),(2,'Casa  Bosquejo',150000.00,'e53b2bdc63099e32bd8515a704ab98e7.jpg','Una de las casas con mas en canto que tenemos entre nuestra oferta, una barriada completa en el bosque mas maravilloso del sur español.\r\n',6,2,3,'2022-11-10',2),(3,'Casa Abedul hola',435000.00,'28643d031503fc1a30ad3fd2a97ec721.jpg','Una de las casas con mas encanto que tenemos entre nuestra oferta. Quédate con esta casa y no te arrepentirás. ',8,4,6,'2022-11-10',2),(4,'Oficina Espaciosa',650000.00,'bc6ba5a198e07ab8f58588005903b76c.jpg','Oficina a estrenar en edificio de nueva construcción, primeras calidades. \r\nQuédate con esta oficina y no te arrepentirás. ',10,3,9,'2022-11-10',1),(5,'Casa Mariculti',180000.00,'9f60887224fb77ed760f5b9d5fb45a1e.jpg','Esta casa se construyo con estetica minimalista y un toque antiguo.',6,2,1,'2022-11-14',1),(6,'Piso Loft',220000.00,'11b9b51635efe94909a5aa32bca08a88.jpg','Piso en el semicentro de la ciudad, decorado con gran detalle y todas las comodidades.',3,1,1,'2022-11-22',1),(7,'Casa Montaña',165000.00,'f2ad54576940c06cc9414720cf257d55.jpg','Una casa con encanto encanto que tenemos, para vivir de forma tranquila en medio de la naturaleza. Quédate con esta casa y no te arrepentirás.',4,2,3,'2022-11-22',2),(8,' Casa Amanecer',570000.00,'40460f25184f621ed581077405965368.jpg','Ubicado en una zona muy tranquila, a escasos minutos de la Casa de Campo, uno de los pulmones verdes de la ciudad. ',3,1,2,'2022-11-26',1);
/*!40000 ALTER TABLE `inmuebles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-07 15:13:47
