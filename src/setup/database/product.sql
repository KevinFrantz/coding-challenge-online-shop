CREATE TABLE `test_db`.`product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `color` VARCHAR(45) NULL,
  `price` INT NULL,
  `tax` INT NULL,
  `image` VARCHAR(180) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
