<?php
	require("data_base_connect.php");
	
	// Fill up array with names, technically the array will be each row of the query
	
	// get the q parameter from URL
	
	//$q =json_decode(file_get_contents("php://input")); $cities=""; //ajax without prototype
	$q = $_POST['name']; //ajax with prototype
	
	$rows = $db->query("SELECT * FROM cities WHERE country_code LIKE '$q%' LIMIT 6");
	$count = 0;
	foreach ($rows as $row) {
	$opt = $row["name"];
		if($count == 0){
				$cities= "$opt";
		}
		else{ 
			$cities .= ", $opt";
		}
		$count++;
	}
	
	echo $cities==="" ? "no cities" : $cities;

?>