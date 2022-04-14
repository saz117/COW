<?php
$db = new PDO("mysql:dbname=world","root");	
try{
	$db->query("CREATE TABLE `world`.`reservations` ( `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,  `name` VARCHAR(30) NOT NULL ,  `email` VARCHAR(50) NOT NULL ,  `hotel` VARCHAR(30) NOT NULL ,
	`num_guests` INT(1) NOT NULL ,  `date` VARCHAR(10) NOT NULL ,  `country` VARCHAR(3) NOT NULL ,  `city` VARCHAR(20) NOT NULL ) ENGINE = InnoDB;");
	
}
catch(PDOException $e){
}
?>