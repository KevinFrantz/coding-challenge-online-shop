CREATE TABLE `test_db`.`product` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `color` VARCHAR(12) NULL,
  `price` INT NULL,
  `image` VARCHAR(180) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
