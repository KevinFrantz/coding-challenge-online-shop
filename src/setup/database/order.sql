CREATE TABLE `test_db`.`order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
