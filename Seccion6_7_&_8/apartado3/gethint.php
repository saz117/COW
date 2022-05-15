<?php
	require("data_base_connect.php");
	
	$q=$_REQUEST["q"];
	$rows = $dbFirst_names->query("SELECT * FROM actors WHERE first_name LIKE '$q%' LIMIT 10");
	
	if ($q !== ""){ 
		echo "<ul>\n";
		foreach ($rows as $row) {
			echo "<li>{$row["first_name"]} {$row["last_name"]}</li>\n";
		}
		echo "</ul>\n";
	}
?>