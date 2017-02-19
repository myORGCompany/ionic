CREATE TABLE `android_scheema`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `image_path` VARCHAR(45) NULL,
  `price` VARCHAR(45) NULL,
  `barcode` VARCHAR(45) NULL,
  `is_active` INT NULL DEFAULT '1',
  `status` INT NULL DEFAULT '1',
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`));
  
CREATE TABLE `android_scheema`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `mobile` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `auth` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `is_active` VARCHAR(45) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`));



CREATE TABLE `android_scheema`.`api_users` (
`id` INT NOT NULL AUTO_INCREMENT,
`fullName` VARCHAR(45) NULL ,
`userName` VARCHAR(45) NULL ,
`contact` VARCHAR(45) NULL ,
`email` VARCHAR(45) NULL ,
`password` VARCHAR(45) NULL ,
`userType("retailer,user")` VARCHAR(45) NULL ,
`businessName` VARCHAR(45) NULL ,
`address` VARCHAR(45) NULL ,
`latitude` VARCHAR(45) NULL ,
`longitude` VARCHAR(45) NULL ,
`deviceToken` VARCHAR(45) NULL ,
`deviceType` VARCHAR(45) NULL ,
`profileImage` VARCHAR(45) NULL ,
`auth` VARCHAR(45) NULL,
`status` VARCHAR(45) NULL,
`is_active` VARCHAR(45) NULL,
`created` DATETIME NULL,
`modified` DATETIME NULL,
PRIMARY KEY (`id`));


CREATE TABLE `android_scheema`.`api_users` ( `id` INT NOT NULL AUTO_INCREMENT,`email` VARCHAR(45) NULL ,`fullName` VARCHAR(45) NULL ,`userName` VARCHAR(45) NULL ,`businessName` VARCHAR(45) NULL ,`profileImage` VARCHAR(45) NULL ,`address` VARCHAR(45) NULL ,`latitude` VARCHAR(45) NULL ,`longitude` VARCHAR(45) NULL ,`userType` VARCHAR(45) NULL ,`authToken` VARCHAR(45) NULL ,`qrCodeImage` VARCHAR(45) NULL ,`isApproved` VARCHAR(45) NULL ,`profileImageSmall` VARCHAR(45) NULL ,`profileImageResize` VARCHAR(45) NULL ,`contact` VARCHAR(45) NULL ,`password` VARCHAR(45) NULL ,`deviceToken` VARCHAR(45) NULL ,`deviceType` VARCHAR(45) NULL ,`auth` VARCHAR(45) NULL, `status` VARCHAR(45) NULL, `is_active` VARCHAR(45) NULL, `created` DATETIME NULL, `modified` DATETIME NULL, PRIMARY KEY (`id`));