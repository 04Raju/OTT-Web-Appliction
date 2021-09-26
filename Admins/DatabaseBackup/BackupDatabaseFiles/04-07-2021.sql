-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: ott
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.18-MariaDB
-- Date: Sun, 04 Jul 2021 18:32:38 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artists_db`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artists_db` (
  `artists_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Artists_Name` varchar(55) NOT NULL,
  `Artists_Type` varchar(55) NOT NULL,
  `Artists_Status` varchar(55) NOT NULL,
  `Artists_Poster` varchar(2555) NOT NULL,
  PRIMARY KEY (`artists_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artists_db`
--

LOCK TABLES `artists_db` WRITE;
/*!40000 ALTER TABLE `artists_db` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `artists_db` VALUES (2,'A.R. Rahman','Singer','Active','https://www.filmcompanion.in/wp-content/uploads/2019/05/777993-ar-rahman-03-e1558093802981-1280x720.jpg'),(3,'Neha Kakkar','Singer','Active','https://i.scdn.co/image/d9cf81f26581c55c3ef9aba1acc1332ee915c30a'),(4,'Tonny kakkar','singer','Active','https://www.liveclefs.com/wp-content/uploads/2018/11/B387F883-D037-4A7F-89D4-757B17C138A3.jpeg'),(5,'Arijit Singh','Singer','Active','https://i1.sndcdn.com/avatars-PvmAG48tBSapqaTx-B7eoAg-t240x240.jpg'),(6,'Mangli','singer','Active','https://m.sakshi.com/sites/default/files/styles/storypage_main/public/gallery_images/2020/11/19/Singer%20Mangli%20Photos31.jpg?itok=T4hgWjj1'),(7,'Haricharan','singer','Active','https://upload.wikimedia.org/wikipedia/commons/0/07/Haricharan_Stage.JPG'),(8,'Raju jettappa','DJ','inactive','https://rajujettappa.cf/Images/rj-removebg.png'),(9,'Anurag','singer','Active','https://upload.wikimedia.org/wikipedia/commons/c/cc/Anurag_Kulkarni_at_Idea_Super_Singer_Season_8.jpg'),(10,'Jonita Gandhi','singer','Active','https://i.ytimg.com/vi/TCKDJQ0RN54/maxresdefault.jpg'),(11,'Atul Gogavale','singer','Active','https://mumbaimirror.indiatimes.com/img/78047430/Master.jpg'),(12,'Shreya Ghoshal','singer','Active','https://static.toiimg.com/photo/81450030.cms'),(13,'Santosh Venky','singer','Active','https://yt3.ggpht.com/ytc/AAUvwngJQ3wXcuP6cmsFHflJcTXn4Irtpzickrev_Mql=s900-c-k-c0x00ffffff-no-rj'),(14,'Shankar Mahadevan','singer','Active','https://www.youandi.com/sites/default/files/bootstrap/Musically-Marvellous-Shankar-Mahadevan%20-f.jpg'),(15,'','singer','Inactive',''),(16,'Nakash Aziz','singer','Active','https://soundboxindia.com/sites/default/files/styles/max_width_800px/public/2019-01/nakash-aziz.jpg'),(17,'Shruthi Pradhald','singer','Active','https://www.filmibeat.com/img/popcorn/profile_photos/siri-prahlad-20200107155614-46780.jpg');
/*!40000 ALTER TABLE `artists_db` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `artists_db` with 16 row(s)
--

--
-- Table structure for table `banner_db`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner_db` (
  `Sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `Banner_Link` varchar(2555) NOT NULL,
  `Banner_Type` varchar(35) NOT NULL,
  `Banner_Title` varchar(2555) NOT NULL,
  `Banner_Use` varchar(35) NOT NULL,
  `Banner_Status` varchar(55) NOT NULL,
  PRIMARY KEY (`Sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_db`
--

LOCK TABLES `banner_db` WRITE;
/*!40000 ALTER TABLE `banner_db` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `banner_db` VALUES (1,'https://collider.com/wp-content/uploads/inception_movie_poster_banner_01.jpg','Movie','Unlimited movies, TV shows and more','main','active'),(2,'https://www.tracking-board.com/wp-content/uploads/2016/07/Mr-Robot-Banner.jpg','Movie','Mr Robot','main','active'),(3,'https://photos5.appleinsider.com/gallery/20426-22170-britawardsad-xl.jpg','music','<button class=\"btn btn-success \">Download App now </button>','music','active');
/*!40000 ALTER TABLE `banner_db` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `banner_db` with 3 row(s)
--

--
-- Table structure for table `movies_db`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies_db` (
  `movies_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Movie_Catag` varchar(55) NOT NULL,
  `Movie_Desc` varchar(555) NOT NULL,
  `Movie_Lang` varchar(55) NOT NULL,
  `Movie_ML` varchar(55) NOT NULL,
  `Movie_Name` varchar(55) NOT NULL,
  `Movie_Poster` varchar(2555) NOT NULL,
  `Movie_TL` varchar(55) NOT NULL,
  `Movie_Type` varchar(35) NOT NULL,
  `Status` varchar(35) NOT NULL,
  PRIMARY KEY (`movies_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies_db`
--

LOCK TABLES `movies_db` WRITE;
/*!40000 ALTER TABLE `movies_db` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `movies_db` VALUES (1,'Top Hits','Karna, a first-year engineering student, falls in love with Saanvi, a final-year pupil from his college. However, a tragic event changes his perception towards life and he mends his ways.\r\n','Kannada','1EpQRTa4gXdlhVyKtL84aWKAwz-jS86kc','Kirik Party','https://m.media-amazon.com/images/M/MV5BMjU4MDIyNjctMjRlNy00YmI0LThmNDAtNzhlZjgwMWJhOThiXkEyXkFqcGdeQXVyMzU0ODc1MTQ@._V1_.jpg','www.youtube.com/embed/IfvnbER_6sQ','Family','Active'),(2,'Recommanded','Venom is a 2018 American superhero film based on the Marvel Comics character of the same name, produced by Columbia Pictures in association with Marvel and Tencent Pictures. ... In Venom.','Hindi','10x-rtQQYp7u_WJLMyc-FOafx342CwS0h','Venom','https://m.media-amazon.com/images/M/MV5BNzAwNzUzNjY4MV5BMl5BanBnXkFtZTgwMTQ5MzM0NjM@._V1_UY1200_CR90,0,630,1200_AL_.jpg','www.youtube.com/embed/ISh7OmmhApU','Thriller','Active'),(3,'Top Hits','After the gates of Raigad shut down for the day, Hirkani, a milkmaid, decides to scale down a steep cliff in order to reach her baby back home.','Marathi','1SkeNcn_E4fD410R00lZkcEatsH_IufUD','Hirkani','https://m.media-amazon.com/images/M/MV5BYjcwZjU4YTEtYWFkMi00M2ZiLTkzNTMtYTdlNGZjYjA5ZDA4XkEyXkFqcGdeQXVyNjQxNDg4OTM@._V1_UX180_CR0,0,180,180_AL_.jpg','www.youtube.com/embed/sR_r2d_ns1s','Adventure','Active'),(4,'Recent Relase','Hello Charlie is an Indian Hindi-language comedy film written and directed by Pankaj Saraswat and produced by Farhan Akhtar and Ritesh Sidhwani under the Excel Entertainment banner.\r\n','Hindi','1Nw1FKKQ0VSNIt8AHlcaK_ErDgX1x9wSQ',' Hello Charlie','https://m.media-amazon.com/images/M/MV5BNmNjODA5MjgtZDkyMy00ZmExLTk5N2QtYzIzMzNlNGIyZjZiXkEyXkFqcGdeQXVyMTI1NDAzMzM0._V1_.jpg','www.youtube.com/embed/p0Qr_r1LZ-s','Comdey','Active'),(5,'Best','Nedumaaran Rajangam sets out to make the common man fly and in the process takes on the world most capital intensive industry and several enemies who stand in his way.\r\nDirector: Sudha Kongara\r\nWriters: Sudha Kongara (story),','Hindi','1Cv_s_-cF9BVzuHyJELRZlnCZucyFjQZb','soorarai pottru','https://cdn.lifestyleasia.com/wp-content/uploads/sites/7/2021/04/04115823/167165076_1324413671273713_6654785999233859847_n.jpg','www.youtube.com/embed/-N137wsl3TM','Drama','Active'),(6,'Top Hits','Director: Mohana Krishna Indraganti\r\nProducers: Dil Raju, Harshith Reddy, Sireesh, Lakshman\r\nCast : Nani Sudheer Babu Nivetha Thomas Aditi Rao Hydari','Hindi','1XMVkAlViI9jUSglyKaWq3_lKFS0ZBh87','V (2020)','https://i0.wp.com/www.socialnews.xyz/wp-content/uploads/2020/01/28/Nani-First-Look-Poster-as-Rakshasudu-From-V-Movie-.jpg?fit=914%2C1280&quality=90&zoom=1&ssl=1','www.youtube.com/embed/gC9Dei_YQgU','Action','Active');
/*!40000 ALTER TABLE `movies_db` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `movies_db` with 6 row(s)
--

--
-- Table structure for table `musics_db`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musics_db` (
  `songs_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Song_Artist` int(11) NOT NULL,
  `Song_Album` varchar(50) NOT NULL,
  `Song_Name` varchar(50) NOT NULL,
  `Song_Type` varchar(35) NOT NULL,
  `Song_Lang` varchar(35) NOT NULL,
  `Song_Catag` varchar(35) NOT NULL,
  `Song_Link` varchar(255) NOT NULL,
  `Status` varchar(35) NOT NULL,
  `Song_Poster` varchar(2555) NOT NULL,
  `playlist` int(11) NOT NULL,
  PRIMARY KEY (`songs_Id`),
  KEY `Song_Artist` (`Song_Artist`),
  CONSTRAINT `musics_db_ibfk_1` FOREIGN KEY (`Song_Artist`) REFERENCES `artists_db` (`artists_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musics_db`
--

LOCK TABLES `musics_db` WRITE;
/*!40000 ALTER TABLE `musics_db` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `musics_db` VALUES (5,5,'Chhichore','Woh din bhi kya din the','Indian pop','Hindi','Best','124RAXNGIYZQ9AwqnHak49V2ddgyV8D4r','Active','http://a10.gaanacdn.com/images/song/91/28063591/crop_480x480_1567137553.jpg',3),(9,3,'Baar Baar Bekho ','Kala Chashma','Party','Hindi','Top Hits','19YVs2BRQc7O_39Mqp1wwY2Zqlgnz8ylX','Active','https://a10.gaanacdn.com/gn_img/albums/qa4WEqWP1p/a4WElRV83P/size_xxl.webp',3),(10,3,'pati patni aur woh','tu hi yaar mera','Healing','Hindi','Best','1UtSg2Rh0qFmceHUqkcXenHuX2RI_jTOa','Active','https://i1.sndcdn.com/artworks-000664111747-8kh96i-t500x500.jpg',3),(11,3,'Goa Wale Beach pe','Goa Wale Beach pe','Dance','Hindi','Top Hits','1sbxE1QJOxDgBb5kF_LKdddIXXQN0e0Y0','Active','https://1.bp.blogspot.com/-n9Kb8b_7iM0/XkI-dLk76GI/AAAAAAAAIWI/g13mIZOzgMQsf94lfD3ZvajY9i5PICTVwCNcBGAsYHQ/s1600/Goa%2BBeach%2BLyrics%2BNeha%2BKakkar.jpg',3),(12,3,'Simmba','Aankh Marey','Dance','Hindi','Top Hits','1qqCTY-zbkeKB1DGBef5YvkCe6AcexmIz','Active','https://i1.sndcdn.com/artworks-000454499121-gfyuhp-t500x500.jpg',3),(13,3,'Machine','Cheez Badi','Dance','Hindi','Top Hits','1eCCERVa4G8y_55XeVOt3I7klI-Amb85C','Active','http://a10.gaanacdn.com/images/albums/68/1858468/crop_480x480_1487674439_1858468.jpg',3),(14,3,'2','O Saki Saki ','Dance','Hindi','Top Hits','1TNmMMAB-xTC39pJhIteFPjsHTiFXOIjf','Active','http://a10.gaanacdn.com/images/song/30/27751030/crop_480x480_1563172659.jpg',3),(15,6,'1','Saranga Dariya','Folk','Telegu','Trending Now','106ibjsbKhP1SqxrdexUV3fa10DPC9T3o','Active','https://a10.gaanacdn.com/images/albums/45/3049545/crop_480x480_1616647568_3049545.jpg',0),(16,7,'1','Ay Pilla','Healing','Telegu','New Relase','1ZFhgRAJSfRthWtO2o6PsoXp2rG_lqr8S','Active','https://a10.gaanacdn.com/images/albums/45/3049545/crop_480x480_1616647568_3049545.jpg',0),(17,9,'1','Nee Chitram Choosi','Classical','Telegu','New Relase','1X85DbBC2usmLfqLphGbdj2Rad_4ZW0YJ','Active','https://a10.gaanacdn.com/images/song/29/34704829/crop_175x175_1613271770.jpg',0),(18,10,'1','Evo Evo Kalale ','Classical','Telegu','Top Hits','1Cfnjv8gv1bK8Qai-JMx7rBsG97nQbLXt','Active','https://a10.gaanacdn.com/images/albums/45/3049545/crop_480x480_1616647568_3049545.jpg',0),(19,12,'6','Aatach Baya Ka Baavarla','Classical','Marathi','Best','12LLi0z-kF9HE4kRwblJGVwcg6uYf1lOM','Active','http://a10.gaanacdn.com/images/albums/61/1728261/crop_480x480_1728261.jpg',0),(20,11,'6','Sairat Zaala Ji','Classical','Marathi','Best','1cko4zRjXGn1i8CU6NuAc_26GdTJqXceS','Active','http://a10.gaanacdn.com/images/albums/61/1728261/crop_480x480_1728261.jpg',0),(21,11,'6','Zingaat','Party','Marathi','Top Hits','1fZwovjApS0r9adDnoJPGX6Qe_9onvGrY','Active','http://a10.gaanacdn.com/images/albums/61/1728261/crop_480x480_1728261.jpg',0),(22,11,'6','Yad Lagla','Classical','Marathi','Best','1tHppXZd8kL7juGWuiVKGZPb9FNCmi3fS','Active','http://a10.gaanacdn.com/images/albums/61/1728261/crop_480x480_1728261.jpg',0),(23,13,'7','Ba Ba Ba Na Ready','Folk','Kannada','New Relase','1T3762yBHpGtOwkxVM5FJAiO28BNBY1Ul','Active','https://a10.gaanacdn.com/gn_img/song/Oxd3xP3gVY/d3xA2MxYWg/size_xxl_1583205137.webp',0),(24,14,'7','Jai Sriram','Devotional','Kannada','New Relase','1xo31-JD619UdCmyQVZTvRo1VYNmeyo1X','Active','https://a10.gaanacdn.com/gn_img/song/z8k3yd1Krx/k3yoJjE6br/size_xxl_1583727043.webp',0),(25,13,'7','Dostha Kano','Folk','Kannada','New Relase','1HAkV-2v2RLXdxNjoG3GkQPulv4eU-67c','Active','http://a10.gaanacdn.com/images/song/63/29831563/crop_480x480_1584687580.jpg',0),(26,15,'7','Robert Theme Music','Regional','Kannada','New Relase','1Vo8VOfSbK_dbnNNiqe6vo-4Ym-GcPWvx','Active','https://a10.gaanacdn.com/images/albums/40/2961440/crop_480x480_1614774442_2961440.jpg',0),(27,12,'7','Kannu Hodiyaka','Dance','Kannada','Top Hits','1w4iH2QZ6ZACHwplUqJ7WxrEbwEVVNwjE','Active','http://a10.gaanacdn.com/images/song/72/34876872/crop_480x480_1613819553.jpg',0),(28,16,'7','Baby Dance Floor Ready','Party','Kannada','New Relase','12lsMPmqxOL8EnPzPZ3BA8Y3LYy6vBkih','Active','http://a10.gaanacdn.com/images/song/94/34987694/crop_480x480_1614443520.jpg',0),(29,17,'7','Nin Edurali Naanu','Classical','Kannada','New Relase','1O5KOnUkiCNPfToMiPDEXYa-vHyMw87Qw','Active','http://a10.gaanacdn.com/images/song/5/35487105/crop_480x480_1616415877.jpg',0);
/*!40000 ALTER TABLE `musics_db` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `musics_db` with 22 row(s)
--

--
-- Table structure for table `playlists`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlists` (
  `Sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(55) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `poster_url` varchar(2555) NOT NULL,
  `Status` varchar(35) NOT NULL,
  PRIMARY KEY (`Sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlists`
--

LOCK TABLES `playlists` WRITE;
/*!40000 ALTER TABLE `playlists` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `playlists` VALUES (3,'Hindi Top 30','Top30','https://a10.gaanacdn.com/images/albums/24/3162524/crop_480x480_3162524.jpg','active'),(4,'Punjabi Top 30','Top30','https://c.saavncdn.com/271/Top-30-Punjabi-Hits-Punjabi-2017-500x500.jpg','active');
/*!40000 ALTER TABLE `playlists` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `playlists` with 2 row(s)
--

--
-- Table structure for table `song_albumdb`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `song_albumdb` (
  `Sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `AlbumName` varchar(55) NOT NULL,
  `url` varchar(3555) NOT NULL,
  `Status` varchar(35) NOT NULL,
  PRIMARY KEY (`Sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `song_albumdb`
--

LOCK TABLES `song_albumdb` WRITE;
/*!40000 ALTER TABLE `song_albumdb` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `song_albumdb` VALUES (1,'Love Story','https://a10.gaanacdn.com/images/albums/45/3049545/crop_480x480_1616647568_3049545.jpg','Active'),(2,'Batla House','https://c.saavncdn.com/906/Batla-House-Hindi-2019-20190814231555-500x500.jpg','Active'),(5,'Chhichore','https://m.media-amazon.com/images/M/MV5BNTY2NDIwNWEtODRmNy00MTAxLTkwYjktY2UyZjlhNGY2YTI2XkEyXkFqcGdeQXVyMTA2ODkwNzM5._V1_.jpg','Active'),(6,'Sairat','https://images-na.ssl-images-amazon.com/images/I/51PtN4-m37L.jpg','Active'),(7,'Roberrt','https://upload.wikimedia.org/wikipedia/en/thumb/0/06/Roberrt-movies-poster.jpg/220px-Roberrt-movies-poster.jpg','Active');
/*!40000 ALTER TABLE `song_albumdb` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `song_albumdb` with 5 row(s)
--

--
-- Table structure for table `subscription_db`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_db` (
  `subs_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sub_Amount` int(11) NOT NULL,
  `Sub_Days` int(11) NOT NULL,
  `Sub_Desc` varchar(255) NOT NULL,
  `Sub_Months` int(11) NOT NULL,
  `Sub_Name` varchar(55) NOT NULL,
  `Sub_Poster` varchar(55) NOT NULL,
  `Sub_Type` varchar(55) NOT NULL,
  PRIMARY KEY (`subs_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_db`
--

LOCK TABLES `subscription_db` WRITE;
/*!40000 ALTER TABLE `subscription_db` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `subscription_db` VALUES (1,0,7,'FHD Stremming<Br>\r\nLive Support\r\n',0,'Free','freeplan.jpg','Free_type'),(2,99,30,'Ad free entertainment<br>\r\nFHD Video quality<br>\r\nStereo Audio quality',1,'30 Days','plans1.jpg','Standard'),(3,249,90,'Ad free entertainment<br>\r\nHD Video quality<br>\r\nDolby 5.1. audio quality\r\n\r\n',3,'3 Months','plan2.jpg','Best');
/*!40000 ALTER TABLE `subscription_db` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `subscription_db` with 3 row(s)
--

--
-- Table structure for table `teammembers`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teammembers` (
  `Sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `Full_Name` varchar(55) NOT NULL,
  `DOB` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(55) NOT NULL,
  `City` varchar(55) NOT NULL,
  `Pincode` varchar(55) NOT NULL,
  `Status` varchar(35) NOT NULL,
  PRIMARY KEY (`Sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teammembers`
--

LOCK TABLES `teammembers` WRITE;
/*!40000 ALTER TABLE `teammembers` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `teammembers` VALUES (1,'Raju jettappa','04/10/1999','rajujettappa04@gmail.com ','R@ju@1999','Super Admin','Thane','400606','Active'),(2,'Swapnil Virkar','02/10/2000','Swapnilvirkar02@gmail.com ','Swapnil@2000','Admin','Thane','400606','Active');
/*!40000 ALTER TABLE `teammembers` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `teammembers` with 2 row(s)
--

--
-- Table structure for table `users_db`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_db` (
  `users_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_name` varchar(55) NOT NULL,
  `User_Email` varchar(55) NOT NULL,
  `User_Phone` varchar(20) NOT NULL,
  `User_Password` varchar(155) NOT NULL,
  `User_Plan` varchar(35) NOT NULL,
  `User_Date` varchar(25) NOT NULL,
  `User_PlanExp` varchar(25) NOT NULL,
  `User_Status` varchar(35) NOT NULL,
  `ResponseCode` varchar(10) NOT NULL,
  `User_Payment` varchar(35) NOT NULL,
  `User_Ordid` varchar(155) NOT NULL,
  `last_login` bigint(20) NOT NULL,
  PRIMARY KEY (`users_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_db`
--

LOCK TABLES `users_db` WRITE;
/*!40000 ALTER TABLE `users_db` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users_db` VALUES (1,'Raju Jettappa','Rajujettappa04@gmail.com','8396060978','$2y$10$MkRpcHP4iK2vMdarPXEAgetSayDmNVc/y1jDdNbLgmNmzRvugGT/6','249','04/07/2021','02/10/2021','Active','01','Completed','ORDS40595509',1625416306);
/*!40000 ALTER TABLE `users_db` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users_db` with 1 row(s)
--

--
-- Table structure for table `webepisodes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webepisodes` (
  `Sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `Wid` int(11) NOT NULL,
  `Sid` int(11) NOT NULL,
  `Ename` varchar(255) NOT NULL,
  `Epurl` varchar(255) NOT NULL,
  `Eurl` varchar(2555) NOT NULL,
  `Etimes` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webepisodes`
--

LOCK TABLES `webepisodes` WRITE;
/*!40000 ALTER TABLE `webepisodes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `webepisodes` VALUES (1,1,1,'eps1.0_ hellofriend','RMo6e02hHSP-XQN508vbXGIZObbXHWFn','https://m.media-amazon.com/images/M/MV5BMzgxMmQxZjQtNDdmMC00MjRlLTk1MDEtZDcwNTdmOTg0YzA2XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_.jpg','2021-06-25 18:01:51'),(2,1,1,'Episode 2','1Zl9CtgkFN_x5vjqRUlcTbqlCLfLUJMV8','https://m.media-amazon.com/images/M/MV5BMzgxMmQxZjQtNDdmMC00MjRlLTk1MDEtZDcwNTdmOTg0YzA2XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_.jpg','2021-06-25 18:07:27'),(3,1,1,'Episode 3','12Ro2GKC3uCsqEjDKukAS_ZktS1SNuETR','https://m.media-amazon.com/images/M/MV5BMzgxMmQxZjQtNDdmMC00MjRlLTk1MDEtZDcwNTdmOTg0YzA2XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_.jpg','2021-06-25 18:07:27');
/*!40000 ALTER TABLE `webepisodes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `webepisodes` with 3 row(s)
--

--
-- Table structure for table `webseries`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webseries` (
  `Sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `Wname` varchar(255) NOT NULL,
  `Tsession` int(11) NOT NULL,
  `Wurl` varchar(2555) NOT NULL,
  `Wdesc` varchar(2555) NOT NULL,
  `WTimes` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webseries`
--

LOCK TABLES `webseries` WRITE;
/*!40000 ALTER TABLE `webseries` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `webseries` VALUES (1,'Mr. Robot',4,'https://rukminim1.flixcart.com/image/416/416/jr58l8w0/poster/h/5/h/medium-mr-robot-poster-for-room-office-13-inch-x-19-inch-rolled-original-imafdy8fby9m5gbw.jpeg?','Mr. Robot is an American drama thriller television series created by Sam Esmail for USA Network. It stars Rami Malek as Elliot Alderson, a cybersecurity engineer and hacker with social anxiety disorder and clinical depression.','2021-06-25 17:53:51');
/*!40000 ALTER TABLE `webseries` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `webseries` with 1 row(s)
--

--
-- Table structure for table `websessions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `websessions` (
  `Sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `Wid` int(11) NOT NULL,
  `Tep` int(11) NOT NULL,
  `Surl` varchar(2555) NOT NULL,
  `Sdesc` varchar(255) NOT NULL,
  `Stimes` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websessions`
--

LOCK TABLES `websessions` WRITE;
/*!40000 ALTER TABLE `websessions` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `websessions` VALUES (1,1,10,'https://m.mediaamazon.com/images/M/MV5BMzgxMmQxZjQtNDdmMC00MjRlLTk1MDEtZDcwNTdmOTg0YzA2XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_.jpg','','2021-06-25 17:58:55');
/*!40000 ALTER TABLE `websessions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `websessions` with 1 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sun, 04 Jul 2021 18:32:39 +0200
