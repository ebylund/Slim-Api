DROP TABLE IF EXISTS `User`;

CREATE TABLE IF NOT EXISTS `User` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Email` VARCHAR(100) NOT NULL,
  `Handle` VARCHAR(64) NOT NULL,
  `FirstName` VARCHAR(100) NULL,
  `LastName` VARCHAR(100) NULL
)
