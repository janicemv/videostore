CREATE TABLE IF NOT EXISTS `videotheek_status` (
  `statusId` INT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE = InnoDB
DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `videotheek_films` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titel` VARCHAR(150) NOT NULL,
  `duurtijd` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `videotheek_dvds` (
  `DVD_nummer` INT NOT NULL AUTO_INCREMENT,
  `film_id` INT UNSIGNED NOT NULL,  -- Alterado para UNSIGNED
  `statusId` INT NOT NULL,
  PRIMARY KEY (`DVD_nummer`),
  INDEX `fk_dvds_dvd_aanwezig1_idx` (`statusId` ASC),
  INDEX `fk_dvds_films1_idx` (`films_id` ASC),
  CONSTRAINT `fk_dvds_dvd_aanwezig1`
    FOREIGN KEY (`statusId`)
    REFERENCES `videotheek_status` (`statusId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dvds_films1`
    FOREIGN KEY (`film_id`)
    REFERENCES `videotheek_films` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB
DEFAULT CHARSET = utf8mb4;


INSERT INTO `videotheek_films` (`titel`, `duurtijd`) 
VALUES 
('Godfather, The', '168'), 
('Green Mile, The', '188'), 
('Pulp Fiction', '154'), 
('Lord of the Rings: The Return of the King, The', '201'), 
('Forrest Gump', '143'), 
('Mists of Avalon, The', '180'), 
('Love Actually', '90'), 
('Frozen', '93'), 
('Inside Out', '96'), 
('Frozen 2', '97'), 
('Ratatouille', '94');

INSERT INTO `videotheek_status`(`statusId`, `status`) 
VALUES 
('1', 'aanwezig'), 
('2', 'gehuurd');

INSERT INTO `videotheek_dvds`(`film_id`, `statusId`) VALUES 
('19','1'),
('20','1'),
('24','1'),
('22','1'),
('26','1'),
('27','1'),
('20','1'),
('21','1'),
('23','1'),
('19','1'),
('24','1'),
('26','1'),
('25','1'),
('28','1'),
('29','1'),
('19','1'), 
('19','1'), 
('24','1'), 
('22','1'), 
('21','1'), 
('27','1'), 
('20','1'), 
('21','1'), 
('23','1'), 
('19','1'), 
('22','1'), 
('26','1'), 
('29','1'), 
('28','1'), 
('29','1');

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 16 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(3, 'jmv@gmail.com', '7bWW'),
(4, 'oi@oi.com.br', 'AEhA'),
(5, 'test@test.com', 'gZ0A'),
