<?php
	require("data_base_connect.php");
	// Fill up array with names, technically the array will be each row of the query
	
	// get the q parameter from URL
	
	$q =$_REQUEST["q"]; $cities="";
	// lookup all hints from array if $q is different from ""
	
	$rows = $db->query("SELECT * FROM cities WHERE country_code LIKE '$q%' LIMIT 6");
	$count = 0;
	foreach ($rows as $row) {
	$opt = $row["name"];
		if($count == 0){
				$cities= "$opt";
		}
		else{ //in case there is more than one suggestion
			$cities .= ", $opt";
		}
		$count++;
	}
	
	echo $cities==="" ? "no cities" : $cities;
?>