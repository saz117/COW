<?php


require("data_base_connect.php");
	
	// Fill up array with names, technically the array will be each row of the query
	
	// get the q parameter from URL
	
	//$q =json_decode(file_get_contents("php://input")); $cities=""; //ajax without prototype
	$q = $_POST['hotelpick']; //ajax with prototype
	
	$rows = $db->query("SELECT * FROM hotelInfo WHERE hotel LIKE '$q%'");
	$count = 0;
	foreach ($rows as $row) {
		$img = $row["image"];
		$des = $row["description"];
		$arr = array('image' => $img, 'description' => $des);
		
	}
	echo json_encode($arr);
?>
