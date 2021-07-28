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

SELECT * FROM test WHERE col_string = 'Two' OR 1=1 -- AND col_number = 2
