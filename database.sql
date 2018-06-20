/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.5.5-10.1.28-MariaDB : Database - tst
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`tst` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tst`;

/*Table structure for table `productbrand` */

DROP TABLE IF EXISTS `productbrand`;

CREATE TABLE `productbrand` (
  `companyID` int(10) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(100) NOT NULL,
  `companyDetails` longtext NOT NULL,
  `companyAddress` longtext,
  `companyEmail` varchar(50) DEFAULT NULL,
  `companyContact` varchar(20) DEFAULT NULL,
  `companyImg` longtext,
  PRIMARY KEY (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `productbrand` */

insert  into `productbrand`(`companyID`,`companyName`,`companyDetails`,`companyAddress`,`companyEmail`,`companyContact`,`companyImg`) values (1,'Samsung','The paragraph form refers to a group of sentences focusing on a single topic. There are three main parts of a paragraph: Topic sentence - it has the main idea. Supporting sentences - details that relate to and support the topic sentence.','The paragraph form refers to a group of sentences focusing on a single topic. There are three main parts of a paragraph: Topic sentence - it has the main idea. Supporting sentences - details that relate to and support the topic sentence.','abc@yahoo.com','03004577989','https://mk0valuewalkgcar7lmc.kinstacdn.com/wp-content/uploads/2016/09/Samsung-Logo.jpg'),(2,'Nike','Paragraph\r\n','Address','xyz@yahoo.com','0314544778','https://www.desktopbackground.org/download/800x600/2014/09/19/827405_nike-logo-free-download-image-id-1447-7hdwallpapers_3275x2400_h.jpg'),(3,'Nikon','This is a Paragraph\r\n','Address1\r\n','yz@yahoo.com','0312445557','https://cdn.freebiesupply.com/logos/thumbs/2x/nikon-7-logo.png'),(4,'HP','This is a paragraph\r\n','Address2\r\n','softtrack@gmail.com','0324656546','https://s3.amazonaws.com/freebiesupply/thumbs/2x/hewlett-packard-logo.png'),(5,'Dawlance','This is a Paragraph\r\n','Address3\r\n','dawlence@gmail.com','0321547789','https://c.express.pk/2013/06/133675-Dawlance-1370027132-922-640x480.JPG'),(6,'Garnier','This is a Paragraph\r\n','Address4\r\n','garnier@gmail.com','0322154546','http://www.surisasurisa.com/wp-content/uploads/2016/09/Garnier-Logo.png');

/*Table structure for table `productdetails` */

DROP TABLE IF EXISTS `productdetails`;

CREATE TABLE `productdetails` (
  `productID` int(10) NOT NULL AUTO_INCREMENT,
  `productName` longtext NOT NULL,
  `productActualPrice` int(20) NOT NULL,
  `productPrice` int(20) NOT NULL,
  `productRating` varchar(10) NOT NULL,
  `productDescription` longtext NOT NULL,
  `productOrigin` varchar(100) DEFAULT NULL,
  `productBrand` int(10) DEFAULT NULL,
  `productColors` varchar(100) DEFAULT NULL,
  `productDelivery` longtext NOT NULL,
  `productMinimumQuantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`productID`),
  KEY `productBrand` (`productBrand`),
  CONSTRAINT `productdetails_ibfk_1` FOREIGN KEY (`productBrand`) REFERENCES `productbrand` (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `productdetails` */

insert  into `productdetails`(`productID`,`productName`,`productActualPrice`,`productPrice`,`productRating`,`productDescription`,`productOrigin`,`productBrand`,`productColors`,`productDelivery`,`productMinimumQuantity`) values (1,'Samsung Galaxy S5',1000,1200,'3.5','Here goes description consectetur adipisicing elit,\n			   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n			   Ut enim ad minim veniam, quis nostrud exercitation ullamco','China',1,'Black & White','Pakistan ',NULL),(2,'Nike Black Mens Running Mens XT Air Epic Speed TR II',8200,10000,'4.5','Here goes description consectetur adipisicing elit,\n			   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n			   Ut enim ad minim veniam, quis nostrud exercitation ullamco','Japan',2,'Red','Pakistan ',NULL),(3,'Samsung Fitness Tracker Smart i8-M',5000,2500,'4.0','Here goes description consectetur adipisicing elit,\n			   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n			   Ut enim ad minim veniam, quis nostrud exercitation ullamco','Japan',1,'Black','Pakistan , India , Japan',NULL),(4,'Nikon D750 Body - Black',40000,35000,'4.5','Here goes description consectetur adipisicing elit,\n			   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n			   Ut enim ad minim veniam, quis nostrud exercitation ullamco','Taiwan',3,'Black & White','Pakistan , India , Japan and China ',NULL),(5,'HP Notebook - 15-bs108ne - 15.6 FHD - 8th Gen.',85000,75000,'5.0','Here goes description consectetur adipisicing elit,\n			   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n			   Ut enim ad minim veniam, quis nostrud exercitation ullamco','China',4,'Silver','Pakistan , India , Japan , Bangladesh , Russia',NULL),(6,'Dawlance Fridge - 9122 - MONO',40000,35000,'3.0','Here goes description consectetur adipisicing elit,\n			   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n			   Ut enim ad minim veniam, quis nostrud exercitation ullamco','Japan',5,'Grey','Pakistan',NULL),(7,'Nike Sports Sports Track Suit SB1083',5000,2500,'3.5','Here goes description consectetur adipisicing elit,\n			   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n			   Ut enim ad minim veniam, quis nostrud exercitation ullamco','China',2,'Green','Pakistan and India',NULL),(8,'Garnier Men Face wash Power White Double Action - 50ml',300,250,'4.5','Here goes description consectetur adipisicing elit,\n			   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n			   Ut enim ad minim veniam, quis nostrud exercitation ullamco','Indonesia',6,'None','Pakistan and India',NULL);

/*Table structure for table `productimages` */

DROP TABLE IF EXISTS `productimages`;

CREATE TABLE `productimages` (
  `productID` int(10) DEFAULT NULL,
  `Img_URL` longtext NOT NULL,
  KEY `productID` (`productID`),
  CONSTRAINT `productimages_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `productdetails` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productimages` */

insert  into `productimages`(`productID`,`Img_URL`) values (1,'https://cdn.shopify.com/s/files/1/0259/1735/products/samsung_galaxy_s9_phone_template_2048x.jpg?v=1527584168'),(1,'https://cdn.eglobalcentral.eu/images/detailed/62/samsung-galaxy-s9-plus-g965fd-dual-sim-4g-incajd.jpg'),(1,'https://www.androidcentral.com/sites/androidcentral.com/files/styles/xlarge/public/article_images/2018/04/speck-presidio-clear-galaxy-s9-press.jpg?itok=WgEicU3f'),(1,'https://cdn.shopify.com/s/files/1/0695/3095/products/Perspektive_Studstar_Galaxy-S9.jpg?v=1518567791'),(2,'https://images.champssports.com/is/image/EBFL2/1948600_a1_ven_sc7_rs?hei=1500&wid=1500'),(3,'https://www.dhresource.com/0x0s/f2-albu-g6-M01-F6-8D-rBVaSFpm03uALq9yAAM_OQQamV0963.jpg/bluetooth-smart-watch-dz09-smartwatch-watch.jpg'),(4,'https://www.bhphotovideo.com/images/images1500x1500/nikon_d5600_dslr_camera_body_1308818.jpg'),(5,'https://i5.walmartimages.com/asr/83fce361-1aa5-4dec-8f80-e89aa4a97a2f_1.93e64fec28a9c5a773e8587f056e1785.jpeg'),(6,'http://www.stickpng.com/assets/images/580b57fbd9996e24bc43bfb3.png'),(7,'https://images-na.ssl-images-amazon.com/images/I/811pV3A7gDL._SL1500_.jpg'),(8,'https://sc01.alicdn.com/kf/HTB1BlcHNVXXXXahaFXXq6xXFXXXd.jpg');

/*Table structure for table `productsize` */

DROP TABLE IF EXISTS `productsize`;

CREATE TABLE `productsize` (
  `productID` int(10) DEFAULT NULL,
  `productSize` varchar(100) NOT NULL,
  KEY `productID` (`productID`),
  CONSTRAINT `productsize_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `productdetails` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productsize` */

insert  into `productsize`(`productID`,`productSize`) values (1,'XSM'),(1,'SM'),(1,'MD'),(1,'LG'),(1,'XLG'),(2,'10'),(2,'11'),(2,'12'),(2,'13'),(2,'14'),(2,'15'),(3,'Small'),(3,'Medium'),(3,'Large'),(4,'None'),(5,'None'),(6,'None'),(7,'SM'),(7,'MD'),(7,'LG'),(8,'None');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
