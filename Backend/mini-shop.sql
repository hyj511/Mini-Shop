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
  `shop` int(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `admins` */

insert  into `admins`(`id`,`admin_name`,`admin_pwd`,`admin_email`,`admin_role`,`shop`) values (4,'admin','dc76e9f0c0006e8f919e0c515c66dbba3982f785','test@email.com',1,2),(5,'user1',NULL,'user1@minishop.com',2,1),(6,'user2',NULL,'user2@minishop.com',2,2);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `img_url` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`img_url`) values (1,'food','category.png'),(2,'drink','category.png');

/*Table structure for table `imageofproduct` */

DROP TABLE IF EXISTS `imageofproduct`;

CREATE TABLE `imageofproduct` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(64) DEFAULT NULL,
  `product_id` int(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `imageofproduct` */

insert  into `imageofproduct`(`id`,`img_url`,`product_id`) values (5,'list.png',3),(6,'proto2.png',3),(7,'proto2.png',4);

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `product_id` int(32) DEFAULT NULL,
  `order_amount` int(32) DEFAULT NULL,
  `buyer_name` varchar(32) DEFAULT NULL,
  `buyer_phone` varchar(32) DEFAULT NULL,
  `buy_type` tinyint(4) DEFAULT NULL COMMENT '0-general, 1-group',
  `shop_id` int(32) DEFAULT NULL,
  `pay_state` tinyint(4) DEFAULT NULL,
  `pay_amount` varchar(32) DEFAULT NULL,
  `order_state` tinyint(4) DEFAULT NULL,
  `history_state` varchar(32) DEFAULT NULL,
  `delivery_num` int(32) DEFAULT NULL,
  `delivery_type` tinyint(4) DEFAULT NULL COMMENT '0-self, 1-express',
  `buyer_address` varchar(64) DEFAULT NULL,
  `order_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `order` */

insert  into `order`(`id`,`product_id`,`order_amount`,`buyer_name`,`buyer_phone`,`buy_type`,`shop_id`,`pay_state`,`pay_amount`,`order_state`,`history_state`,`delivery_num`,`delivery_type`,`buyer_address`,`order_time`) values (1,3,1,'lin','235434234',0,1,NULL,'23',NULL,NULL,NULL,0,NULL,NULL),(2,3,2,'lin','235434234',0,1,NULL,'23',NULL,NULL,NULL,0,'shenyand','0000-00-00 00:00:00');

/*Table structure for table `order_history` */

DROP TABLE IF EXISTS `order_history`;

CREATE TABLE `order_history` (
  `id` int(32) NOT NULL,
  `period` varchar(32) DEFAULT NULL,
  `product_id` int(32) DEFAULT NULL,
  `shop_id` int(32) DEFAULT NULL,
  `buy_type` tinyint(4) DEFAULT NULL,
  `buyer_name` varchar(32) DEFAULT NULL,
  `buyer_phone` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `order_history` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `category` int(32) DEFAULT NULL,
  `classification` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `origin_price` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `promotion_price` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `inventory` int(32) DEFAULT NULL,
  `express_fee` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `shop_id` int(32) DEFAULT NULL,
  `group_num` int(32) DEFAULT NULL,
  `group_price` varchar(32) DEFAULT NULL,
  `group_time` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`description`,`category`,`classification`,`origin_price`,`promotion_price`,`inventory`,`express_fee`,`shop_id`,`group_num`,`group_price`,`group_time`) values (3,'product1','First Product',1,'class1','15','5',20,'4',NULL,12,'12','12'),(4,'pro2','second',2,'asd','34','32',23,'4',NULL,12,'34','21');

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
  `shop_phone` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `shop` */

insert  into `shop`(`id`,`shop_name`,`shop_address`,`shop_phone`) values (1,'shop1','yatai','1567890234'),(2,'shop2','liaoning','452677334');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
