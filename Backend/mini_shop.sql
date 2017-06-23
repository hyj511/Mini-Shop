/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.19-MariaDB : Database - mini_shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mini_shop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mini_shop`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(32) DEFAULT NULL,
  `admin_pwd` varchar(64) DEFAULT NULL,
  `admin_email` varchar(32) DEFAULT NULL,
  `admin_role` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `admins` */

insert  into `admins`(`id`,`admin_name`,`admin_pwd`,`admin_email`,`admin_role`) values (4,'admin','dc76e9f0c0006e8f919e0c515c66dbba3982f785','test@email.com',1);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `description` tinytext CHARACTER SET latin1,
  `category` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `classification` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `origin_price` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `promotion_price` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `inventory` int(32) DEFAULT NULL,
  `express_fee` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `products` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) DEFAULT NULL,
  `role_value` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `role` */

insert  into `role`(`id`,`role_name`,`role_value`) values (1,'super_admin',1),(2,'general_admin',2);

/*Table structure for table `shop` */

DROP TABLE IF EXISTS `shop`;

CREATE TABLE `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `shop_address` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `shop` */

insert  into `shop`(`id`,`shop_name`,`shop_address`) values (1,'shop1','hunam'),(2,'shop2','jinlin'),(3,'shop3','shenyang');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
