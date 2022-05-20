<?php
$db = new PDO("mysql:dbname=world","root");	//create connection with world table
try{
	$db->query("CREATE TABLE `world`.`reservations` ( `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,  `name` VARCHAR(30) NOT NULL ,  `email` VARCHAR(50) NOT NULL ,  `hotel` VARCHAR(30) NOT NULL ,
	`num_guests` INT(1) NOT NULL ,  `date` VARCHAR(10) NOT NULL ,  `country` VARCHAR(3) NOT NULL ,  `city` VARCHAR(20) NOT NULL ) ENGINE = InnoDB;");
	
	$db->query("CREATE TABLE `world`.`hotelInfo` ( `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,  `hotel` VARCHAR(30) NOT NULL , `image` VARCHAR(50) NOT NULL ,  `description` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;");
	
}
catch(PDOException $e){
}

$dbFirst_names = new PDO("mysql:dbname=imdb_small","root"); //create connection for people table

$rows = $db->query("SELECT * FROM hotelInfo"); //fill hotel info table, in case is empty
if($rows->rowCount()==0){
	
	$db->query("INSERT INTO `hotelInfo` (`hotel`, `image`, `description`)
			VALUES ('All-Stars Hotel', 'images/all-stars.jpg', 'Somebody once told me the world is gonna roll me. I aint the sharpest tool in the shed.')");
		
	$db->query("INSERT INTO `hotelInfo` (`hotel`, `image`, `description`)
			VALUES ('Hotel Vela', 'images/vela.jpg', 'The greatest Hotel in Barcelona, with privileged views to the Mediterranean Ocean.')");
			
	$db->query("INSERT INTO `hotelInfo` (`hotel`, `image`, `description`)
			VALUES ('Sunny-Sides', 'images/sunny-sides.jpg', 'The most luxurious place to stay in the Mojave Wasteland')");
			
	$db->query("INSERT INTO `hotelInfo` (`hotel`, `image`, `description`)
			VALUES ('Megaton', 'images/megaton.jpg', 'Located in the Capital Wasteland, Megaton is a fortified settlement housing dozens of survivors.')");
			
	$db->query("INSERT INTO `hotelInfo` (`hotel`, `image`, `description`)
			VALUES ('Galaxy of Adventures', 'images/galaxy.jpg', 'Discover the heart of the Halcyon starcruiser, a welcoming place where crew and passengers gather.')");
}

?>