

CREATE DATABASE IF NOT EXISTS 
	`single30_btr_db` 
DEFAULT CHARACTER SET 
	utf8 
COLLATE 
	utf8_general_ci;


GRANT ALL PRIVILEGES ON
	single30_btr_db.*
TO
	'single30_btrapp'@'localhost'
IDENTIFIED BY
	'BaoChangJi';
	
