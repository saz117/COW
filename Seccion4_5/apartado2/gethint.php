<?php
	require("data_base_connect.php");
	// Fill up array with names, technically the array will be each row of the query
	$a = $dbFirst_names->query("SELECT * FROM actors LIMIT 100");
	
	// get the q parameter from URL
	$q=$_REQUEST["q"]; $hint="";
	// lookup all hints from array if $q is different from ""
	if ($q !== ""){ 
		$q=strtolower($q); $len=strlen($q);
		foreach($a as $row){ 
			$name = $row["first_name"];
			$lastName = $row["last_name"];
			if (stristr($q, substr($name,0,$len))){ 
				if ($hint==""){ 
					$hint= "$name $lastName"; 
				}
				else{ //in case there is more than one suggestion
					$hint .= ", $name $lastName";
				}
			}
		}
	}
	// Output "no suggestion" if no hint were found
	// or output the correct values
	echo $hint==="" ? "no suggestion" : $hint;
?>