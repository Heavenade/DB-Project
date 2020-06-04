-- MySQL dump 10.13  Distrib 5.7.25, for Win64 (x86_64)
--
-- Host: localhost    Database: db_project
-- ------------------------------------------------------
-- Server version	5.7.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `creature`
--

DROP TABLE IF EXISTS `creature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creature` (
  `creature_id` int(11) NOT NULL AUTO_INCREMENT,
  `creature_name` char(255) NOT NULL,
  `description` char(255) NOT NULL,
  `creature_type` int(11) NOT NULL,
  `habitation` int(11) NOT NULL,
  PRIMARY KEY (`creature_id`),
  KEY `creature_ibfk_1` (`creature_type`),
  KEY `creature_ibfk_2` (`habitation`),
  CONSTRAINT `creature_ibfk_1` FOREIGN KEY (`creature_type`) REFERENCES `creature_type` (`creature_type`) ON UPDATE CASCADE,
  CONSTRAINT `creature_ibfk_2` FOREIGN KEY (`habitation`) REFERENCES `creature_habitation` (`creature_habitation`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creature`
--

LOCK TABLES `creature` WRITE;
/*!40000 ALTER TABLE `creature` DISABLE KEYS */;
INSERT INTO `creature` VALUES (1,'코르네이우스 리자드','작은 용종. 낮에는 주로 강바닥이나 호수바닥에서 잠을 자고 밤에는 땅으로 올라와서 사냥활동을 한다.',1,3),(2,'탈리스만울프','경화된 돌 혹은 금속으로 둘러싸여진 늑대모습. 몸 곳곳에 금이 가있고 그 부분에 부적이 붙어 있다.',2,2),(3,'실무리','가을 하늘에 떠다니는 가는 실덩어리 같은 벌레들. 덩어리에서 하나를 떼어놓으면 딱딱하게 굳어서 죽는다.',8,2),(4,'육두곰나무','고양이 발바닥 같이 생긴 곰 모양 열매가 열리는 나무다. 열매가 다 익으면 떨어져나와서 걸어다닌다. 먹으면 젤리 같은 식감과 맛이 나 젤리곰이라고도 불린다.',4,2),(5,'아레이넨','늑대의 머리에 턱과 이마에는 산양과 순록의 뿔이 각각 자라나고 있다. 머리에는 세쌍, 뿔과 목과 몸통에는 수십쌍의 크고작은 색색의 눈이 깜빡이고 있으며, 첫번째 다리는 사자, 두번째 다리는 독수리, 세번째 다리는 염소, 네번째 다리는 낙타의 모습이다.',2,2),(6,'세뿔햄쥐','뿔이 세 개 달린 햄스터로 흰 털과 특정 속성에 따른 색을 띠는 털 색을 가지고 있다. 노란색 세뿔햄쥐는 전기 속성으로 작은 전기를 일으켜 불을 붙일 수 있고 검은색 세뿔햄쥐는 금속 속성으로 모래나 흙속에서 뽑아낸 금속질로 바늘을 만들어 내어 도구로 쓴다.',6,2),(7,'외눈먼지','흡사 검은 먼지덩어리가 뭉친듯이 보이기도 하며 짐승털이 뭉친듯한 외형에 커다란 눈이 하나있다. 귀여운 외형과 달리 이 크리쳐는 가까이 다가온 먹이를 입(눈)을 벌려 잡아먹는다.',12,2),(8,'영락한 마법사','이 영락한 마법사는 회색 고양이를 닮았다. 징그러운 엑토플라즘 손으로 구성되어 있으며 만지면 매우 차갑고 시체같다.',10,2),(9,'치아','종유석과 닮았지만 순식간에 불쑥 솟구치거나 내리찍으며 먹잇감을 사냥하는 육식 동물이다.',2,1);
/*!40000 ALTER TABLE `creature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creature_habitation`
--

DROP TABLE IF EXISTS `creature_habitation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creature_habitation` (
  `creature_habitation` int(11) NOT NULL,
  `creature_habitation_char` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`creature_habitation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creature_habitation`
--

LOCK TABLES `creature_habitation` WRITE;
/*!40000 ALTER TABLE `creature_habitation` DISABLE KEYS */;
INSERT INTO `creature_habitation` VALUES (1,'동굴'),(2,'숲'),(3,'물가');
/*!40000 ALTER TABLE `creature_habitation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creature_history`
--

DROP TABLE IF EXISTS `creature_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creature_history` (
  `user_id` char(15) NOT NULL,
  `creature_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `creature_like` int(11) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `creature_history_ibfk_1` (`user_id`),
  CONSTRAINT `creature_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creature_history`
--

LOCK TABLES `creature_history` WRITE;
/*!40000 ALTER TABLE `creature_history` DISABLE KEYS */;
INSERT INTO `creature_history` VALUES ('alley5653',4,402,1458,'2019-06-09 15:18:11',22,1),('alley5653',1,82,45,'2019-06-09 15:18:16',23,5),('alley5653',9,134,3,'2019-06-09 15:18:20',24,1),('alley5653',5,195,143,'2019-06-10 07:17:23',28,4),('alley5653',1,70,39,'2019-06-10 07:17:25',29,4),('alley5653',9,70,20,'2019-06-10 07:17:26',30,3);
/*!40000 ALTER TABLE `creature_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creature_owned`
--

DROP TABLE IF EXISTS `creature_owned`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creature_owned` (
  `user_id` char(15) DEFAULT NULL,
  `creature_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `creature_like` int(11) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `creature_owned_ibfk_1` (`creature_id`),
  KEY `creature_owned_ibfk_2` (`user_id`),
  CONSTRAINT `creature_owned_ibfk_1` FOREIGN KEY (`creature_id`) REFERENCES `creature` (`creature_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `creature_owned_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creature_owned`
--

LOCK TABLES `creature_owned` WRITE;
/*!40000 ALTER TABLE `creature_owned` DISABLE KEYS */;
INSERT INTO `creature_owned` VALUES ('alley5653',4,402,1458,22,1),('alley5653',9,134,3,24,1),('alley5653',5,195,143,28,4),('alley5653',1,70,39,29,4),('alley5653',9,70,20,30,3);
/*!40000 ALTER TABLE `creature_owned` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creature_random`
--

DROP TABLE IF EXISTS `creature_random`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creature_random` (
  `creature_id` int(11) NOT NULL,
  `weight_min` int(11) NOT NULL,
  `weight_max` int(11) NOT NULL,
  `height_min` int(11) NOT NULL,
  `height_max` int(11) NOT NULL,
  PRIMARY KEY (`creature_id`),
  CONSTRAINT `creature_random_ibfk_1` FOREIGN KEY (`creature_id`) REFERENCES `creature` (`creature_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creature_random`
--

LOCK TABLES `creature_random` WRITE;
/*!40000 ALTER TABLE `creature_random` DISABLE KEYS */;
INSERT INTO `creature_random` VALUES (1,50,100,30,50),(2,150,1500,100,250),(3,3,5,10,15),(4,300,2000,1000,1500),(5,150,200,100,150),(6,20,30,5,10),(7,1,2,3,7),(8,150,200,100,180),(9,30,200,1,20);
/*!40000 ALTER TABLE `creature_random` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creature_type`
--

DROP TABLE IF EXISTS `creature_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creature_type` (
  `creature_type` int(11) NOT NULL,
  `creature_type_char` varchar(50) NOT NULL,
  PRIMARY KEY (`creature_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creature_type`
--

LOCK TABLES `creature_type` WRITE;
/*!40000 ALTER TABLE `creature_type` DISABLE KEYS */;
INSERT INTO `creature_type` VALUES (1,'물'),(2,'땅'),(3,'불'),(4,'풀'),(5,'얼음'),(6,'전기'),(7,'독'),(8,'비행'),(9,'초능력'),(10,'어둠'),(11,'빛'),(12,'물리'),(13,'바이러스');
/*!40000 ALTER TABLE `creature_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `item_type` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `item_place` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`item_id`),
  KEY `item_ibfk_1` (`item_type`),
  KEY `item_ibfk_2` (`item_place`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type`) REFERENCES `item_type` (`item_type`),
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`item_place`) REFERENCES `item_place` (`item_place`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'salt',2,15,100,'평범한 소금이다. 매우 짜다.',2),(2,'sugar',2,20,120,'평범한 설탕이다. 매우 달다.',2),(3,'금덩어리',2,500,5000,'커다란 덩어리의 금. 휘황찬란한 빛이 난다. 매우 비싸보인다. 당신은 살 수 없을 것 같다',2),(4,'빛나는 버섯 갓',2,50,500,'이 버섯의 갓은 보랏빛으로 빛나고 있다. 어디에 쓰는 것일까?',1),(5,'하얀 조개껍질',2,5,50,'작고 하얀 조개껍질이다. 그다지 가치있어 보이지 않는다.',1),(6,'티타늄 코어',2,300,3000,'기이한 형태를 띄고 있는 티타늄 코어. 심장이 저렇게 생겼겠지.',3),(7,'연기 한 줌',2,25,250,'작은 유리병에 검은 연기가 한 줌 들어있다. 영원히 흩어지지 않는다.',3),(8,'고무 원액',2,10,105,'조그마한 나무통에 고무 원액이 가득 들어있다. 흔하다.',1),(9,'무지개 조개껍질',1,300,3000,'아름답게 빛나는 조개껍질. 공예용으로 쓰이는 귀한 재료.',0),(10,'생명의 물',1,1000,10000,'???? ???? ???? ????이다. ??? 할 수 있다.',0);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_owned`
--

DROP TABLE IF EXISTS `item_owned`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_owned` (
  `user_id` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_num` int(11) NOT NULL DEFAULT '1',
  `no` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`no`),
  KEY `item_owned_ibfk_1` (`user_id`),
  KEY `item_owned_ibfk_2` (`item_id`),
  CONSTRAINT `item_owned_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_owned_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_owned`
--

LOCK TABLES `item_owned` WRITE;
/*!40000 ALTER TABLE `item_owned` DISABLE KEYS */;
INSERT INTO `item_owned` VALUES ('alley5653',1,64,1),('alley5653',2,69,2),('alley5653',4,4,4),('alley5653',7,16,6),('alley5653',8,3,7),('alley5653',9,6,8),('alley5653',5,1,18),('alley5653',6,1,19);
/*!40000 ALTER TABLE `item_owned` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_place`
--

DROP TABLE IF EXISTS `item_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_place` (
  `item_place` int(11) NOT NULL,
  `item_place_char` varchar(50) NOT NULL,
  PRIMARY KEY (`item_place`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_place`
--

LOCK TABLES `item_place` WRITE;
/*!40000 ALTER TABLE `item_place` DISABLE KEYS */;
INSERT INTO `item_place` VALUES (0,'상점'),(1,'흙'),(2,'강'),(3,'하늘');
/*!40000 ALTER TABLE `item_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_type`
--

DROP TABLE IF EXISTS `item_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_type` (
  `item_type` int(11) NOT NULL,
  `item_type_char` varchar(50) NOT NULL,
  PRIMARY KEY (`item_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_type`
--

LOCK TABLES `item_type` WRITE;
/*!40000 ALTER TABLE `item_type` DISABLE KEYS */;
INSERT INTO `item_type` VALUES (1,'스페셜'),(2,'수집');
/*!40000 ALTER TABLE `item_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `user_id` char(15) NOT NULL,
  `name` char(15) DEFAULT NULL,
  `birth` char(8) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `pw` char(32) DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES ('alley5653','kyuri kim','971128','alley5653@naver.com','8850881ee94a05da665ec43267473ceb',9000),('test','test','1111','alley5653@gmail.com','8850881ee94a05da665ec43267473ceb',0);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-10 17:57:42
