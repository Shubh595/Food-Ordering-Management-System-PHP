/*
SQLyog Community Edition- MySQL GUI v5.22a
Host - 5.6.12-log : Database - foodcourt
*********************************************************************
Server version : 5.6.12-log
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `foodcourt`;

USE `foodcourt`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `block` */

DROP TABLE IF EXISTS `block`;

CREATE TABLE `block` (
  `blockID` int(11) NOT NULL AUTO_INCREMENT,
  `blockName` varchar(100) DEFAULT NULL,
  `blockImage` text,
  PRIMARY KEY (`blockID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `block` */

insert  into `block`(`blockID`,`blockName`,`blockImage`) values (1,'Block Campus Cafe','images/locationx.png'),(2,'Block Apartment','images/locationx.png'),(3,'Block 34 Food Court','images/locationx.png'),(4,'Block Bh2 Hostal','images/locationx.png'),(5,'Block Bh1 Hostal','images/locationx.png'),(6,'Block 38 Canteen','images/locationx.png'),(7,'Block 26 Canteen','images/locationx.png'),(8,'Block 55 Food Court','images/locationx.png');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

insert  into `customer`(`username`,`fullname`,`email`,`contact`,`address`,`password`) values ('admin','nidha','nidha@gmail.com','998696572','Maharashtra','admin'),('pratheek083','Pratheek Shiri','pratheek@gmail.com','8779546521','Hyderabad','pratheek'),('rakshithk00','Rakshith Kotian','rakshith@gmail.com','9547123658','Gujarath','rakshith');

/*Table structure for table `feedbacks` */

DROP TABLE IF EXISTS `feedbacks`;

CREATE TABLE `feedbacks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileNo` varchar(100) DEFAULT NULL,
  `csubject` varchar(100) DEFAULT NULL,
  `message` text,
  `createDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `feedbacks` */

insert  into `feedbacks`(`ID`,`cName`,`email`,`mobileNo`,`csubject`,`message`,`createDate`) values (1,'rajesh','rajesh24@gmail.com',NULL,'klsklskd','rajesh',NULL),(2,'rajesh','rajesh24@gmail.com',NULL,'klsklskd','rajesh','2019-11-14 01:41:32'),(3,'rajesh','rajesh24@gmail.com',NULL,'klsklskd','rajesh','2019-11-14 01:41:32'),(4,'lksjdfsdjlk','kkk@gmail.com',NULL,'kkllk','klkklk','2019-11-14 01:42:41');

/*Table structure for table `food` */

DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `F_ID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  PRIMARY KEY (`F_ID`,`R_ID`),
  KEY `R_ID` (`R_ID`),
  CONSTRAINT `food_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

/*Data for the table `food` */

insert  into `food`(`F_ID`,`name`,`price`,`description`,`R_ID`,`images_path`) values (58,'Juicy Masala Paneer Kathi Roll',40,'Juicy Masala Paneer Kathi Roll loaded with Masala Paneer chunks, onion & Mayo.',1,'images/Masala_Paneer_Kathi_Roll.jpg'),(59,'Momes ',60,'Try momes- A whole Pomfret momes grilled with tangy marination & served with grilled onions and tomatoes.',2,'images/mo1.jpg'),(60,'Chocolate Hazelnut Truffle',99,'Lose all senses over this very delicious chocolate hazelnut truffle.',3,'images/Chocolate_Hazelnut_Truffle.jpg'),(61,'Happy Happy Choco Chip Shake',80,'Happy Happy Choco Chip Shake - a perfect party sweet treat.',1,'images/Happy_Happy_Choco_Chip_Shake.jpg'),(62,'Spring Rolls',65,'Delicious Spring Rolls by Dragon Hut, Delhi. Order now!!!',2,'images/Spring_Rolls.jpg'),(63,'Baahubali Thali',75,'Baahubali Thali is accompanied by Kattapa Biriyani, Devasena Paratha, Bhalladeva Patiala Lassi',3,'images/Baahubali_Thali.jpg'),(64,'golden',200,'roti, dal',3,'images/Baahubali_Thali.jpg'),(65,'Test',400,'roti chawal sabji',4,'images/chow.jpg');

/*Table structure for table `manager` */

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `manager` */

insert  into `manager`(`username`,`fullname`,`email`,`contact`,`address`,`password`) values ('aditi068','Aditi Naik','aditi@gmail.com','9871568303','Goa','admin'),('aminnikhil073','Nikhil Amin','aminnikhil073@gmail.com','9871568303','Karnataka','nikhil'),('roshanraj07','Roshan Raj','roshan@gmail.com','9871568303','Bihar','roshan'),('suresh','suresh','suresh@gmail.com','9871568303','new Delhi','suresh');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL AUTO_INCREMENT,
  `F_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `TokenNumber` varchar(30) DEFAULT NULL,
  `pickupTime` time DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Booked',
  PRIMARY KEY (`order_ID`),
  KEY `F_ID` (`F_ID`),
  KEY `username` (`username`),
  KEY `R_ID` (`R_ID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `food` (`F_ID`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`order_ID`,`F_ID`,`foodname`,`price`,`quantity`,`order_date`,`username`,`R_ID`,`TokenNumber`,`pickupTime`,`status`) values (1,62,'Spring Rolls',65,1,'2019-11-13','admin',2,'73739198','11:11:00','Booked'),(3,64,'golden',200,1,'2019-11-13','admin',3,'71221750','10:00:00','Booked'),(4,59,'Meurig Fish',60,1,'2019-11-13','admin',2,'71221750','10:00:00','Booked'),(5,65,'Test',400,1,'2019-11-13','admin',4,'30365850','05:06:00','Booked'),(6,63,'Baahubali Thali',75,1,'2019-11-13','admin',3,'38613927','14:02:00','Booked'),(7,59,'Momes ',60,1,'2019-11-14','admin',2,'94916279','10:10:00','Booked');

/*Table structure for table `restaurants` */

DROP TABLE IF EXISTS `restaurants`;

CREATE TABLE `restaurants` (
  `R_ID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `M_ID` varchar(30) NOT NULL,
  `BlockID` varchar(20) DEFAULT '1',
  PRIMARY KEY (`R_ID`),
  UNIQUE KEY `M_ID_2` (`M_ID`),
  KEY `M_ID` (`M_ID`),
  CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`M_ID`) REFERENCES `manager` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `restaurants` */

insert  into `restaurants`(`R_ID`,`name`,`email`,`contact`,`address`,`M_ID`,`BlockID`) values (1,'Nikhil\'s Restaurant','nikhil@restaurant.com','7998562145','Karnataka','aminnikhil073','3'),(2,'Roshan\'s Restaurant','roshan@restaurant.com','9887546821','Bihar','roshanraj07','3'),(3,'Aditi\'s Restaurant','aditi@restaurant.com','7778564231','Goa','aditi068','3'),(4,'Rja court food','rajacourt@gmail.com','9999999999','Punjab','suresh','3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
