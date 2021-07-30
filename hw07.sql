USE donstringham;

CREATE TABLE `donstringham`.`test` (
  `col_number` INT NOT NULL,
  `col_string` VARCHAR(45) NOT NULL,
  `col_dttm` DATETIME NOT NULL);

SELECT * FROM test;
TRUNCATE test;

INSERT INTO test (col_number, col_string, col_dttm) VALUES(1, 'One', now());
INSERT INTO test (col_number, col_string, col_dttm) VALUES(2, 'Two', now());
INSERT INTO test (col_number, col_string, col_dttm) VALUES(3, 'Three', now());

INSERT INTO test (col_number, col_string, col_dttm) VALUES("3", 3, "2022-07-28 00:08:45");
INSERT INTO test (col_number, col_string, col_dttm) VALUES(3, 52, now());

CREATE TABLE `usr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(45) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `passwrd` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

SELECT * FROM usr;
SELECT * FROM usr WHERE full_name='User';

INSERT INTO usr (full_name, email, passwrd) VALUES('User 1', 'one@example.com', 'pass1234');
INSERT INTO usr (full_name, email, passwrd) VALUES('User 2', 'two@example.com', 'pass5678');
INSERT INTO usr (full_name, email, passwrd) VALUES('User 3', 'three@example.com', 'pass9012');

TRUNCATE usr;
