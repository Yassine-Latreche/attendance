-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: attendance
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,POSTGRESQL' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table "generated_qr_codes"
--

DROP TABLE IF EXISTS "generated_qr_codes";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "generated_qr_codes" (
  "id" bigint(20) unsigned NOT NULL,
  "session_Id" bigint(20) unsigned NOT NULL,
  "qr_code_string" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "generated_qr_codes"
--

LOCK TABLES "generated_qr_codes" WRITE;
/*!40000 ALTER TABLE "generated_qr_codes" DISABLE KEYS */;
INSERT INTO "generated_qr_codes" VALUES (73,1,'513660576','2021-04-27 08:49:44','2021-04-27 08:49:44'),(74,1,'467161601','2021-04-27 08:49:45','2021-04-27 08:49:45'),(75,1,'238774946','2021-04-27 08:49:46','2021-04-27 08:49:46'),(76,1,'156988867','2021-04-27 08:49:47','2021-04-27 08:49:47'),(77,1,'134451704','2021-04-27 08:49:48','2021-04-27 08:49:48'),(78,1,'988578073','2021-04-27 08:49:49','2021-04-27 08:49:49'),(79,1,'130627425','2021-04-27 08:49:50','2021-04-27 08:49:50'),(80,1,'340868113','2021-04-27 08:49:51','2021-04-27 08:49:51'),(81,1,'979083633','2021-04-27 08:49:52','2021-04-27 08:49:52'),(82,1,'552899885','2021-04-27 08:49:53','2021-04-27 08:49:53'),(83,1,'974970179','2021-04-27 08:49:54','2021-04-27 08:49:54'),(84,1,'239103793','2021-04-27 08:49:55','2021-04-27 08:49:55'),(85,1,'675600170','2021-04-27 08:49:56','2021-04-27 08:49:56'),(86,1,'437758252','2021-04-27 08:49:57','2021-04-27 08:49:57'),(87,1,'992166353','2021-04-27 08:49:58','2021-04-27 08:49:58'),(88,1,'445683300','2021-04-27 08:49:59','2021-04-27 08:49:59'),(89,1,'808519463','2021-04-27 08:50:00','2021-04-27 08:50:00'),(90,1,'479356081','2021-04-27 08:50:01','2021-04-27 08:50:01'),(91,1,'411805302','2021-04-27 08:50:02','2021-04-27 08:50:02'),(92,1,'705630434','2021-04-27 08:50:03','2021-04-27 08:50:03'),(93,1,'153462437','2021-04-27 08:50:04','2021-04-27 08:50:04'),(94,1,'476364204','2021-04-27 08:50:05','2021-04-27 08:50:05'),(95,1,'589231572','2021-04-27 08:50:06','2021-04-27 08:50:06'),(96,1,'670990161','2021-04-27 08:50:07','2021-04-27 08:50:07'),(97,1,'982289543','2021-04-27 08:50:08','2021-04-27 08:50:08'),(98,1,'301026477','2021-04-27 08:50:09','2021-04-27 08:50:09'),(99,1,'850231065','2021-04-27 08:50:10','2021-04-27 08:50:10'),(100,1,'777162140','2021-04-27 08:50:11','2021-04-27 08:50:11'),(101,1,'833707837','2021-04-27 08:50:12','2021-04-27 08:50:12'),(102,1,'807633853','2021-04-27 08:50:13','2021-04-27 08:50:13'),(103,1,'898707670','2021-04-27 08:50:14','2021-04-27 08:50:14'),(104,1,'523599057','2021-04-27 08:50:15','2021-04-27 08:50:15'),(105,1,'336161577','2021-04-27 08:50:16','2021-04-27 08:50:16'),(106,1,'231645922','2021-04-27 08:50:17','2021-04-27 08:50:17'),(107,1,'564898800','2021-04-27 08:50:18','2021-04-27 08:50:18'),(108,1,'255276368','2021-04-27 08:50:19','2021-04-27 08:50:19'),(109,1,'372610120','2021-04-27 08:50:20','2021-04-27 08:50:20'),(110,1,'525218071','2021-04-27 08:50:21','2021-04-27 08:50:21'),(111,1,'805340235','2021-04-27 08:50:22','2021-04-27 08:50:22'),(112,1,'398378206','2021-04-27 08:50:23','2021-04-27 08:50:23'),(113,1,'235116576','2021-04-27 08:50:24','2021-04-27 08:50:24'),(114,1,'905311184','2021-04-27 08:50:25','2021-04-27 08:50:25'),(115,1,'286846284','2021-04-27 08:50:26','2021-04-27 08:50:26'),(116,1,'141822266','2021-04-27 08:50:27','2021-04-27 08:50:27'),(117,1,'625596095','2021-04-27 08:50:28','2021-04-27 08:50:28'),(118,1,'798492168','2021-04-27 08:50:29','2021-04-27 08:50:29'),(119,1,'154688825','2021-04-27 08:50:30','2021-04-27 08:50:30'),(120,1,'882863007','2021-04-27 08:50:31','2021-04-27 08:50:31'),(121,1,'363187105','2021-04-27 08:50:32','2021-04-27 08:50:32'),(122,1,'768413383','2021-04-27 08:50:33','2021-04-27 08:50:33'),(123,1,'225849800','2021-04-27 08:50:34','2021-04-27 08:50:34'),(124,1,'278243395','2021-04-27 08:50:35','2021-04-27 08:50:35'),(125,1,'744339034','2021-04-27 08:50:36','2021-04-27 08:50:36'),(126,1,'782637864','2021-04-27 08:50:37','2021-04-27 08:50:37'),(127,1,'389195716','2021-04-27 08:50:38','2021-04-27 08:50:38'),(128,1,'978821856','2021-04-27 08:50:39','2021-04-27 08:50:39'),(129,1,'281476945','2021-04-27 08:50:40','2021-04-27 08:50:40'),(130,1,'231927526','2021-04-27 08:50:41','2021-04-27 08:50:41'),(131,1,'553122848','2021-04-27 08:50:42','2021-04-27 08:50:42'),(132,1,'523006699','2021-04-27 08:50:43','2021-04-27 08:50:43'),(133,1,'627960048','2021-04-27 08:50:44','2021-04-27 08:50:44'),(134,1,'839276310','2021-04-27 08:50:45','2021-04-27 08:50:45'),(135,1,'316817936','2021-04-27 08:50:46','2021-04-27 08:50:46'),(136,1,'244677678','2021-04-27 08:50:47','2021-04-27 08:50:47'),(137,1,'869814386','2021-04-27 08:50:48','2021-04-27 08:50:48'),(138,1,'819179987','2021-04-27 08:50:49','2021-04-27 08:50:49'),(139,1,'829187656','2021-04-27 08:50:50','2021-04-27 08:50:50'),(140,1,'478498570','2021-04-27 08:50:51','2021-04-27 08:50:51'),(141,1,'339816895','2021-04-27 08:50:52','2021-04-27 08:50:52'),(142,1,'250459132','2021-04-27 08:50:53','2021-04-27 08:50:53'),(143,1,'715466140','2021-04-27 08:50:54','2021-04-27 08:50:54'),(144,1,'725890818','2021-04-27 08:50:55','2021-04-27 08:50:55'),(145,1,'981345725','2021-04-27 08:50:56','2021-04-27 08:50:56'),(146,1,'144805369','2021-04-27 08:50:57','2021-04-27 08:50:57'),(147,1,'648851908','2021-04-27 08:50:58','2021-04-27 08:50:58'),(148,1,'114124359','2021-04-27 08:50:59','2021-04-27 08:50:59'),(149,1,'748035599','2021-04-27 08:51:00','2021-04-27 08:51:00'),(150,1,'606355761','2021-04-27 08:51:01','2021-04-27 08:51:01'),(151,1,'626435605','2021-04-27 08:51:02','2021-04-27 08:51:02'),(152,1,'740541564','2021-04-27 08:51:03','2021-04-27 08:51:03'),(153,1,'349666657','2021-04-27 08:51:04','2021-04-27 08:51:04'),(154,1,'628806111','2021-04-27 08:51:05','2021-04-27 08:51:05'),(155,1,'242952862','2021-04-27 08:51:06','2021-04-27 08:51:06'),(156,1,'212164545','2021-04-27 08:51:07','2021-04-27 08:51:07'),(157,1,'419439593','2021-04-27 08:51:08','2021-04-27 08:51:08'),(158,1,'227988520','2021-04-27 08:51:09','2021-04-27 08:51:09'),(159,1,'445062671','2021-04-27 08:51:10','2021-04-27 08:51:10'),(160,1,'933407752','2021-04-27 08:51:11','2021-04-27 08:51:11'),(161,1,'292665464','2021-04-27 08:51:12','2021-04-27 08:51:12'),(162,1,'134312312','2021-04-27 08:51:13','2021-04-27 08:51:13'),(163,1,'680315166','2021-04-27 08:51:14','2021-04-27 08:51:14'),(164,1,'991648500','2021-04-27 08:51:15','2021-04-27 08:51:15'),(165,1,'216911488','2021-04-27 08:51:16','2021-04-27 08:51:16'),(166,1,'157611852','2021-04-27 08:51:17','2021-04-27 08:51:17'),(167,1,'961023144','2021-04-27 08:51:18','2021-04-27 08:51:18'),(168,1,'141767654','2021-04-27 08:51:19','2021-04-27 08:51:19'),(169,1,'719831519','2021-04-27 08:51:20','2021-04-27 08:51:20'),(170,1,'802850982','2021-04-27 08:51:21','2021-04-27 08:51:21'),(171,1,'546190533','2021-04-27 08:51:22','2021-04-27 08:51:22'),(172,1,'911414029','2021-04-27 08:51:23','2021-04-27 08:51:23'),(173,1,'615300796','2021-04-27 08:51:24','2021-04-27 08:51:24'),(174,1,'176245224','2021-04-27 08:51:25','2021-04-27 08:51:25'),(175,1,'615888361','2021-04-27 08:51:26','2021-04-27 08:51:26'),(176,1,'441618852','2021-04-27 08:51:27','2021-04-27 08:51:27'),(177,1,'323768285','2021-04-27 08:51:28','2021-04-27 08:51:28'),(178,1,'189047020','2021-04-27 08:51:29','2021-04-27 08:51:29'),(179,1,'139555481','2021-04-27 08:51:30','2021-04-27 08:51:30'),(180,1,'912675938','2021-04-27 08:51:31','2021-04-27 08:51:31'),(181,1,'772047484','2021-04-27 08:51:32','2021-04-27 08:51:32'),(182,1,'539438150','2021-04-27 08:51:33','2021-04-27 08:51:33'),(183,1,'815315487','2021-04-27 08:51:34','2021-04-27 08:51:34'),(184,1,'865294360','2021-04-27 08:51:35','2021-04-27 08:51:35'),(185,1,'742568809','2021-04-27 08:51:36','2021-04-27 08:51:36'),(186,1,'477487239','2021-04-27 08:51:37','2021-04-27 08:51:37'),(187,1,'439214603','2021-04-27 08:51:38','2021-04-27 08:51:38'),(188,1,'349684346','2021-04-27 08:51:39','2021-04-27 08:51:39'),(189,1,'298050071','2021-04-27 08:51:40','2021-04-27 08:51:40'),(190,1,'939709223','2021-04-27 08:51:41','2021-04-27 08:51:41'),(191,1,'991806739','2021-04-27 08:51:42','2021-04-27 08:51:42'),(192,1,'424907390','2021-04-27 08:51:43','2021-04-27 08:51:43'),(193,1,'291019707','2021-04-27 08:51:44','2021-04-27 08:51:44'),(194,1,'621729318','2021-04-27 08:51:45','2021-04-27 08:51:45'),(195,1,'112227980','2021-04-27 08:51:46','2021-04-27 08:51:46'),(196,1,'544257296','2021-04-27 08:51:47','2021-04-27 08:51:47'),(197,1,'799791080','2021-04-27 08:51:48','2021-04-27 08:51:48'),(198,1,'340400539','2021-04-27 08:51:49','2021-04-27 08:51:49'),(199,1,'969420955','2021-04-27 08:51:50','2021-04-27 08:51:50'),(200,1,'784741052','2021-04-27 08:51:51','2021-04-27 08:51:51'),(201,1,'601733180','2021-04-27 08:51:52','2021-04-27 08:51:52'),(202,1,'508067204','2021-04-27 08:51:53','2021-04-27 08:51:53'),(203,1,'465590477','2021-04-27 08:51:54','2021-04-27 08:51:54'),(204,1,'772388889','2021-04-27 08:51:55','2021-04-27 08:51:55'),(205,1,'935567220','2021-04-27 08:51:56','2021-04-27 08:51:56'),(206,1,'525818076','2021-04-27 08:51:57','2021-04-27 08:51:57'),(207,1,'602321655','2021-04-27 08:51:58','2021-04-27 08:51:58'),(208,1,'402619582','2021-04-27 08:51:59','2021-04-27 08:51:59'),(209,1,'180548968','2021-04-27 08:52:00','2021-04-27 08:52:00'),(210,1,'637974807','2021-04-27 08:52:01','2021-04-27 08:52:01'),(211,1,'332619847','2021-04-27 08:52:02','2021-04-27 08:52:02'),(212,1,'511610682','2021-04-27 08:52:03','2021-04-27 08:52:03'),(213,1,'968175696','2021-04-27 08:52:04','2021-04-27 08:52:04'),(214,1,'339758351','2021-04-27 08:52:05','2021-04-27 08:52:05'),(215,1,'474037200','2021-04-27 08:52:06','2021-04-27 08:52:06'),(216,1,'180229395','2021-04-27 08:52:07','2021-04-27 08:52:07'),(217,1,'558581629','2021-04-27 08:52:08','2021-04-27 08:52:08'),(218,1,'718498902','2021-04-27 08:52:09','2021-04-27 08:52:09'),(219,1,'332759718','2021-04-27 08:52:10','2021-04-27 08:52:10'),(220,1,'259377043','2021-04-27 08:52:11','2021-04-27 08:52:11'),(221,1,'241245935','2021-04-27 08:52:12','2021-04-27 08:52:12'),(222,1,'911797765','2021-04-27 08:52:13','2021-04-27 08:52:13'),(223,1,'680632546','2021-04-27 08:52:14','2021-04-27 08:52:14'),(224,1,'573986968','2021-04-27 08:52:15','2021-04-27 08:52:15'),(225,1,'707431776','2021-04-27 08:52:16','2021-04-27 08:52:16'),(226,1,'659919245','2021-04-27 08:52:17','2021-04-27 08:52:17'),(227,1,'672804103','2021-04-27 08:52:18','2021-04-27 08:52:18'),(228,1,'402534905','2021-04-27 08:52:19','2021-04-27 08:52:19'),(229,1,'328354471','2021-04-27 08:52:20','2021-04-27 08:52:20'),(230,1,'163305532','2021-04-27 08:52:21','2021-04-27 08:52:21'),(231,1,'310036029','2021-04-27 08:52:22','2021-04-27 08:52:22'),(232,1,'601413061','2021-04-27 08:52:23','2021-04-27 08:52:23'),(233,1,'413948662','2021-04-27 08:52:24','2021-04-27 08:52:24'),(234,1,'474552479','2021-04-27 08:52:25','2021-04-27 08:52:25'),(235,1,'545621599','2021-04-27 08:52:26','2021-04-27 08:52:26'),(236,1,'215884264','2021-04-27 08:52:27','2021-04-27 08:52:27'),(237,1,'263247133','2021-04-27 08:52:28','2021-04-27 08:52:28'),(238,1,'309710341','2021-04-27 08:52:29','2021-04-27 08:52:29'),(239,1,'270262122','2021-04-27 08:52:30','2021-04-27 08:52:30'),(240,1,'814353398','2021-04-27 08:52:31','2021-04-27 08:52:31'),(241,1,'810384084','2021-04-27 08:52:32','2021-04-27 08:52:32'),(242,1,'117374680','2021-04-27 08:52:33','2021-04-27 08:52:33'),(243,1,'315916456','2021-04-27 08:52:34','2021-04-27 08:52:34'),(244,1,'821088006','2021-04-27 08:52:35','2021-04-27 08:52:35'),(245,1,'643906064','2021-04-27 08:52:36','2021-04-27 08:52:36'),(246,1,'311892385','2021-04-27 08:52:37','2021-04-27 08:52:37'),(247,1,'726247177','2021-04-27 08:52:38','2021-04-27 08:52:38'),(248,1,'138112370','2021-04-27 08:52:39','2021-04-27 08:52:39'),(249,1,'968651526','2021-04-27 08:52:40','2021-04-27 08:52:40'),(250,1,'466140401','2021-04-27 08:52:41','2021-04-27 08:52:41'),(251,1,'621125182','2021-04-27 08:52:42','2021-04-27 08:52:42'),(252,1,'496418460','2021-04-27 08:52:43','2021-04-27 08:52:43'),(253,1,'202665262','2021-04-27 08:52:44','2021-04-27 08:52:44'),(254,1,'770578628','2021-04-27 08:52:45','2021-04-27 08:52:45'),(255,1,'882311348','2021-04-27 08:52:46','2021-04-27 08:52:46'),(256,1,'424163092','2021-04-27 08:52:47','2021-04-27 08:52:47'),(257,1,'632233508','2021-04-27 08:52:48','2021-04-27 08:52:48');
/*!40000 ALTER TABLE "generated_qr_codes" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "groups"
--

DROP TABLE IF EXISTS "groups";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "groups" (
  "id" bigint(20) unsigned NOT NULL,
  "section_Id" bigint(20) unsigned NOT NULL,
  "group" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "number_of_students" int(11) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "groups"
--

LOCK TABLES "groups" WRITE;
/*!40000 ALTER TABLE "groups" DISABLE KEYS */;
INSERT INTO "groups" VALUES (1,2,'1',0,'2021-04-24 08:57:55','2021-04-24 08:57:55'),(2,2,'2',0,'2021-04-24 09:27:57','2021-04-24 09:27:57'),(3,2,'3',0,'2021-04-24 09:28:03','2021-04-24 09:28:03'),(4,1,'5',0,'2021-04-24 09:38:11','2021-04-24 09:38:11'),(5,4,'6',0,'2021-04-24 09:40:28','2021-04-24 09:40:28');
/*!40000 ALTER TABLE "groups" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "levels"
--

DROP TABLE IF EXISTS "levels";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "levels" (
  "id" bigint(20) unsigned NOT NULL,
  "level" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "number_of_students" int(11) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "levels"
--

LOCK TABLES "levels" WRITE;
/*!40000 ALTER TABLE "levels" DISABLE KEYS */;
INSERT INTO "levels" VALUES (2,'Premiere Année - CPI',0,'2021-04-23 17:26:56','2021-04-23 17:26:56'),(3,'Deuxième Année - CPI',0,'2021-04-23 17:27:24','2021-04-23 17:27:24'),(4,'Premiere Année - SC',0,'2021-04-23 17:28:15','2021-04-23 17:28:15'),(5,'Deuxieme Année - SC - SIW',0,'2021-04-23 17:28:29','2021-04-23 17:28:29'),(6,'Deuxieme Année - SC - ISI',0,'2021-04-23 17:28:34','2021-04-23 17:28:34'),(7,'Troisième Année - SC - ISI',0,'2021-04-23 17:29:02','2021-04-23 17:29:02'),(8,'Troisième Année - SC - SIW',0,'2021-04-23 17:29:06','2021-04-23 17:29:06');
/*!40000 ALTER TABLE "levels" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "migrations"
--

DROP TABLE IF EXISTS "migrations";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "migrations" (
  "id" int(10) unsigned NOT NULL,
  "migration" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "batch" int(11) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "migrations"
--

LOCK TABLES "migrations" WRITE;
/*!40000 ALTER TABLE "migrations" DISABLE KEYS */;
INSERT INTO "migrations" VALUES (29,'2021_04_23_141153_create_sections_table',1),(30,'2021_04_23_141206_create_groups_table',1),(31,'2021_04_23_141213_create_students_table',1),(32,'2021_04_23_141222_create_levels_table',1),(34,'2021_04_23_141238_create_professors_table',1),(37,'2021_04_24_100101_create_generated_qr_codes_table',3),(38,'2021_04_23_141228_create_rooms_table',4),(39,'2021_04_23_141136_create_sessions_table',5),(41,'2021_04_23_141300_create_records_table',6);
/*!40000 ALTER TABLE "migrations" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "professors"
--

DROP TABLE IF EXISTS "professors";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "professors" (
  "id" bigint(20) unsigned NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "email" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "phone_number" int(11) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "professors_email_unique" ("email"),
  UNIQUE KEY "professors_phone_number_unique" ("phone_number")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "professors"
--

LOCK TABLES "professors" WRITE;
/*!40000 ALTER TABLE "professors" DISABLE KEYS */;
INSERT INTO "professors" VALUES (1,'BADSI Hichem Benaissa Anouar','h.badsi@esi-sba.dz',560346446,'2021-04-24 10:09:04','2021-04-24 10:09:04'),(2,'GHEID Zakaria','z.gheid@esi-sba.dz',987456321,'2021-04-24 10:13:38','2021-04-24 10:13:38');
/*!40000 ALTER TABLE "professors" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "records"
--

DROP TABLE IF EXISTS "records";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "records" (
  "id" bigint(20) unsigned NOT NULL,
  "student_Id" bigint(20) unsigned NOT NULL,
  "session_Id" bigint(20) unsigned NOT NULL,
  "generated_qr_code_Id" bigint(20) unsigned NOT NULL,
  "device_type" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "device_id" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "qr_code_string" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "scanning_time" time DEFAULT NULL,
  "sending_time" time DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "records"
--

LOCK TABLES "records" WRITE;
/*!40000 ALTER TABLE "records" DISABLE KEYS */;
/*!40000 ALTER TABLE "records" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "rooms"
--

DROP TABLE IF EXISTS "rooms";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rooms" (
  "id" bigint(20) unsigned NOT NULL,
  "room" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "place" char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "type" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "number_of_places" int(11) NOT NULL,
  "empty" tinyint(1) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "rooms"
--

LOCK TABLES "rooms" WRITE;
/*!40000 ALTER TABLE "rooms" DISABLE KEYS */;
INSERT INTO "rooms" VALUES (1,'A','p','Amphi',150,0,'2021-04-24 10:19:09','2021-04-24 10:19:09'),(2,'c','s','Amphi',150,0,'2021-04-24 10:19:29','2021-04-24 10:19:29');
/*!40000 ALTER TABLE "rooms" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "sections"
--

DROP TABLE IF EXISTS "sections";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "sections" (
  "id" bigint(20) unsigned NOT NULL,
  "level_Id" bigint(20) unsigned NOT NULL,
  "section" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "number_of_students" int(11) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "sections"
--

LOCK TABLES "sections" WRITE;
/*!40000 ALTER TABLE "sections" DISABLE KEYS */;
INSERT INTO "sections" VALUES (1,3,'A',0,'2021-04-24 08:14:40','2021-04-24 08:14:40'),(2,2,'A',0,'2021-04-24 08:34:05','2021-04-24 08:34:05'),(3,2,'B',0,'2021-04-24 08:44:57','2021-04-24 08:44:57'),(4,3,'B',0,'2021-04-24 09:39:17','2021-04-24 09:39:17');
/*!40000 ALTER TABLE "sections" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "sessions"
--

DROP TABLE IF EXISTS "sessions";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "sessions" (
  "id" bigint(20) unsigned NOT NULL,
  "professor_Id" bigint(20) unsigned NOT NULL,
  "is_in_group" tinyint(1) NOT NULL,
  "group_Id" bigint(20) unsigned DEFAULT NULL,
  "is_in_section" tinyint(1) NOT NULL,
  "section_Id" bigint(20) unsigned DEFAULT NULL,
  "session_type" char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "date" date NOT NULL,
  "starting" time NOT NULL,
  "ending" time NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "sessions"
--

LOCK TABLES "sessions" WRITE;
/*!40000 ALTER TABLE "sessions" DISABLE KEYS */;
INSERT INTO "sessions" VALUES (1,2,0,NULL,1,4,'Cours','2021-01-15','08:00:00','11:00:00','2021-04-24 10:46:50','2021-04-24 10:48:51');
/*!40000 ALTER TABLE "sessions" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "students"
--

DROP TABLE IF EXISTS "students";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "students" (
  "id" bigint(20) unsigned NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "level_Id" bigint(20) unsigned NOT NULL,
  "section_Id" bigint(20) unsigned NOT NULL,
  "group_Id" bigint(20) unsigned NOT NULL,
  "email" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "birthday" date NOT NULL,
  "phone_number" int(11) NOT NULL,
  "living_area" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "willaya_d_origine" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "device_type" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "device_id" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "students_email_unique" ("email"),
  UNIQUE KEY "students_phone_number_unique" ("phone_number"),
  UNIQUE KEY "students_device_id_unique" ("device_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "students"
--

LOCK TABLES "students" WRITE;
/*!40000 ALTER TABLE "students" DISABLE KEYS */;
INSERT INTO "students" VALUES (2,'Latreche Yassine',3,4,5,'ya.latreche@esi-sba.dz','2001-01-20',798792997,'22','47','android','8975-GBYV-6876-BKHE','2021-04-24 09:50:20','2021-04-24 10:01:17');
/*!40000 ALTER TABLE "students" ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-30 15:10:45
