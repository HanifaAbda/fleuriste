CREATE DATABASE fleuriste;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `category_product` mediumtext NOT NULL,
  `description` text NOT NULL,
  `category` mediumtext NOT NULL,
  `price` DECIMAL(10,2),
  `image` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1027 DEFAULT CHARSET=utf8mb4;


CREATE TABLE `user` (
   `id` INT(11) NOT NULL AUTO_INCREMENT,
   `username` VARCHAR(255) NOT NULL UNIQUE,
   `password` VARCHAR(255) NOT NULL,
   `is_admin` TINYINT(1) DEFAULT 0,  -- 0 pour utilisateur normal, 1 pour administrateur
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1027 DEFAULT CHARSET=utf8mb4;