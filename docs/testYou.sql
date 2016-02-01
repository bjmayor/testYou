-- MySQL dump 10.13  Distrib 5.6.24, for osx10.10 (x86_64)
--
-- Host: localhost    Database: testYou
-- ------------------------------------------------------
-- Server version	5.6.24

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
-- Table structure for table `Answer`
--

DROP TABLE IF EXISTS `Answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `label` varchar(45) DEFAULT NULL,
  `answer_text` varchar(45) DEFAULT NULL,
  `answer_img` varchar(45) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `result_id` int(11) DEFAULT NULL,
  `next_question_label` varchar(45) DEFAULT NULL,
  `sub_question_id` int(11) DEFAULT NULL,
  `result_label` varchar(45) DEFAULT NULL,
  `answer_html` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Answer`
--

LOCK TABLES `Answer` WRITE;
/*!40000 ALTER TABLE `Answer` DISABLE KEYS */;
INSERT INTO `Answer` VALUES (1,2,'a','answer1','result/pic.jpg',10,NULL,NULL,4,'',NULL),(2,2,'a','answer2',NULL,10,NULL,NULL,5,'',NULL),(3,2,'a','answer3',NULL,5,NULL,NULL,6,'',NULL),(4,2,'a','answer4',NULL,15,NULL,NULL,6,'',NULL),(5,6,'a','answer5',NULL,NULL,NULL,NULL,NULL,'e',NULL),(6,6,'a','answer1',NULL,NULL,NULL,NULL,NULL,'a',NULL),(7,3,'a','7a',NULL,NULL,NULL,'1',7,'a',NULL),(8,3,'b','7b',NULL,NULL,NULL,NULL,7,'a',NULL),(9,3,'a','8a',NULL,NULL,NULL,'3',8,NULL,NULL),(10,3,'b','8b',NULL,NULL,NULL,'5',8,NULL,NULL),(11,3,'a','9a',NULL,NULL,NULL,'4',9,'b',NULL),(12,3,'b','9b',NULL,NULL,NULL,'2',9,'a',NULL),(13,3,'a','10a',NULL,NULL,NULL,'1',10,'b',NULL),(14,3,'b','10a',NULL,NULL,NULL,'3',10,'a',NULL),(15,3,'a','11a',NULL,NULL,NULL,'4',11,'b',NULL),(16,3,'b','11b',NULL,NULL,NULL,'',11,'a',NULL);
/*!40000 ALTER TABLE `Answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Question`
--

DROP TABLE IF EXISTS `Question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `next_id` int(11) DEFAULT NULL COMMENT '下一个问题\n',
  `pre_id` int(11) DEFAULT NULL COMMENT '上一个问题\n',
  `meta_id` int(11) DEFAULT NULL,
  `question_type` int(11) DEFAULT '1',
  `question_category_id` varchar(45) DEFAULT '1',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `publish_status` int(11) DEFAULT '0',
  `visit_count` int(11) DEFAULT '1',
  `label` int(11) DEFAULT NULL,
  `is_recommend` int(11) DEFAULT '0',
  `update_time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Question`
--

LOCK TABLES `Question` WRITE;
/*!40000 ALTER TABLE `Question` DISABLE KEYS */;
INSERT INTO `Question` VALUES (1,0,'aaa','<p>bbb</p>','question/img.jpg',NULL,NULL,9,1,'2','2016-01-14 21:58:18',0,1,NULL,0,'2016-01-16 20:54:07'),(2,0,'来一发','<p>来一发吧。。</p>','question/img.jpg',NULL,NULL,10,2,'3','2016-01-15 11:25:22',0,1,NULL,1,'2016-01-16 20:54:07'),(3,0,'来一发2','<p>来一发吧。。3</p>','question/img.jpg',NULL,NULL,11,3,'3','2016-01-15 11:32:03',0,1,NULL,0,'2016-01-16 20:54:07'),(4,2,'daa','<p>fdsfasdf</p>','question/img.jpg',NULL,NULL,15,1,'3','2016-01-15 11:32:34',0,1,NULL,0,'2016-01-16 20:54:07'),(5,2,'daa222','<p>fdsfasdf333</p>','question/img.jpg',NULL,NULL,16,1,'3','2016-01-15 11:32:39',0,1,NULL,0,'2016-01-16 20:54:07'),(6,2,'daa222','<p>fdsfasdf333111</p>','question/img.jpg',NULL,NULL,17,1,'1','2016-01-15 11:32:47',0,1,NULL,0,'2016-01-16 20:54:07'),(7,3,'添加','<p>简介</p>','question/img.jpg',NULL,NULL,18,1,'1','2016-01-15 11:32:58',0,1,1,0,'2016-01-16 20:54:07'),(8,3,'真心的','<p>好的。。。人关心什么？</p>','question/img.jpg',NULL,NULL,19,1,'1','2016-01-15 11:33:18',0,1,2,0,'2016-01-16 20:54:07'),(9,3,'冒险','<p>真的好么？</p>','question/img.jpg',NULL,NULL,20,1,'1','2016-01-15 11:33:31',0,1,3,0,'2016-01-16 20:54:07'),(10,3,'不一样的体验','<p>就是这样的。</p>','question/img.jpg',NULL,NULL,21,1,'3','2016-01-15 11:33:48',0,1,4,0,'2016-01-16 20:54:07'),(11,3,'你爱他么？','<p>关你什么事。。。 这表明你们的关系还没好到问这个问题的时候。</p>','question/img.jpg',NULL,NULL,22,1,'1','2016-01-15 11:34:15',0,1,5,0,'2016-01-16 20:54:07'),(12,0,'添加完进入编辑','<p>添加完进入编辑</p>','question/img.jpg',NULL,NULL,23,1,'1','2016-01-16 07:12:18',0,1,6,0,'2016-01-16 20:54:07'),(13,0,'添加完进入编辑','<p>添加完进入编辑</p>','question/img.jpg',NULL,NULL,24,1,'1','2016-01-16 07:12:55',0,1,NULL,0,'2016-01-16 20:54:07');
/*!40000 ALTER TABLE `Question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_preferences`
--

DROP TABLE IF EXISTS `admin_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_preferences` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `user_panel` tinyint(1) NOT NULL DEFAULT '0',
  `sidebar_form` tinyint(1) NOT NULL DEFAULT '0',
  `messages_menu` tinyint(1) NOT NULL DEFAULT '0',
  `notifications_menu` tinyint(1) NOT NULL DEFAULT '0',
  `tasks_menu` tinyint(1) NOT NULL DEFAULT '0',
  `user_menu` tinyint(1) NOT NULL DEFAULT '1',
  `ctrl_sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `transition_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_preferences`
--

LOCK TABLES `admin_preferences` WRITE;
/*!40000 ALTER TABLE `admin_preferences` DISABLE KEYS */;
INSERT INTO `admin_preferences` VALUES (1,0,0,0,0,0,1,0,0);
/*!40000 ALTER TABLE `admin_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `bgcolor` char(7) NOT NULL DEFAULT '#607D8B',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator','#F44336'),(2,'members','General User','#2196F3');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta`
--

DROP TABLE IF EXISTS `meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` tinytext,
  `seo_keywords` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta`
--

LOCK TABLES `meta` WRITE;
/*!40000 ALTER TABLE `meta` DISABLE KEYS */;
INSERT INTO `meta` VALUES (1,'1','1',''),(2,'dfasfas','',''),(3,'dfasfas','<p>fdsfdsf</p>',''),(4,'222','4444','333'),(5,'a','c','b'),(6,'daa222','<p>fdsfasdf333111</p>',NULL),(7,'a','c','b'),(8,'a','c','b'),(9,'aa','cc','bb'),(10,'来一发','<p>来一发吧。。</p>',''),(11,'来一发2','<p>来一发吧。。3</p>',''),(12,'来一发3','<p>来一发4<span style=\"text-decoration:underline;\"></span></p>',''),(13,'来一发3','<p>来一发4<span style=\"text-decoration:underline;\"></span></p>',''),(14,'来一发5','<p>来一发6<span style=\"text-decoration:underline;\"></span></p>',''),(15,'daa','<p>fdsfasdf</p>',''),(16,'daa222','<p>fdsfasdf333</p>',''),(17,'daa222','<p>fdsfasdf333111</p>',''),(18,'添加','<p>简介</p>',''),(19,'真心的','<p>好的。。。人关心什么？</p>',''),(20,'冒险','<p>真的好么？</p>',''),(21,'不一样的体验','<p>就是这样的。</p>',''),(22,'你爱他么？','<p>关你什么事。。。 这表明你们的关系还没好到问这个问题的时候。</p>',''),(23,'添加完进入编辑','<p>添加完进入编辑</p>',''),(24,'添加完进入编辑','<p>添加完进入编辑</p>',''),(25,NULL,NULL,NULL);
/*!40000 ALTER TABLE `meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_preferences`
--

DROP TABLE IF EXISTS `public_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_preferences` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `transition_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_preferences`
--

LOCK TABLES `public_preferences` WRITE;
/*!40000 ALTER TABLE `public_preferences` DISABLE KEYS */;
INSERT INTO `public_preferences` VALUES (1,0);
/*!40000 ALTER TABLE `public_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_category`
--

DROP TABLE IF EXISTS `question_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` tinytext,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_category`
--

LOCK TABLES `question_category` WRITE;
/*!40000 ALTER TABLE `question_category` DISABLE KEYS */;
INSERT INTO `question_category` VALUES (1,'爱情',NULL),(2,'综合',NULL),(3,'性格',NULL);
/*!40000 ALTER TABLE `question_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` varchar(45) DEFAULT NULL,
  `score_start` int(11) DEFAULT NULL,
  `score_end` int(11) DEFAULT NULL,
  `show_text_result` varchar(45) DEFAULT NULL,
  `show_img_result` varchar(45) DEFAULT NULL,
  `show_people_count` int(11) DEFAULT NULL,
  `label` varchar(45) DEFAULT NULL,
  `show_html_result` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `result` (`question_id`,`label`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
INSERT INTO `result` VALUES (1,'2',0,30,'这是30分以内的答案','result/pic.jpg',20,'a','依然如此美丽'),(2,'2',30,60,'这是30分以上的答案','result/pic.jpg',10,'b','哈哈。。。太好了'),(3,'3',NULL,NULL,'问题3的结论1','result/pic.jpg',NULL,'a',NULL),(4,'3',NULL,NULL,'问题3的结论2',NULL,NULL,'b',NULL);
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,NULL,1268889823,1453188505,1,'Admin','istrator','ADMIN','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-19 17:31:41
