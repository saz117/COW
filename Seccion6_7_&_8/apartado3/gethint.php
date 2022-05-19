<?php
	require("data_base_connect.php");
	/*
	$q=$_REQUEST["q"];
	$rows = $dbFirst_names->query("SELECT * FROM actors WHERE first_name LIKE '$q%' LIMIT 10");
	$result = array();
	if ($q !== ""){ 
		
		foreach ($rows as $row) {
			array_push($result,$row["first_name"]);
		}
		echo $result;
	}
	*/
	
	$rows = $dbFirst_names->query("SELECT * FROM actors LIMIT 20");
	$result = "";
		
		$count = 0;
		foreach ($rows as $row) {
			$opt = $row["first_name"];
			$opt .= " ";
			$opt .= $row["last_name"];
			
			if($count == 0){
				$result= "$opt";
			}
			else{ 
				$result .= ", $opt";
			}
			$count++;
		}
		echo $result;
		
	
?>