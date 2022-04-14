<?php
//use this address to visualize
//http://localhost/COW/Seccion2y3/apartado2/testing.php

//$db = new PDO("mysql:dbname=world","saz117", "elpepe117");

$db = new PDO("mysql:dbname=world","root");	
$rows = $db->query("SELECT * FROM cities WHERE country_code LIKE 'MEX%'");
foreach ($rows as $row) {
	?>
	<li> City name: <?= $row["name"] ?>,
	City code: <?= $row["country_code"] ?> </li>
	<?php
	}

