<?php


require("data_base_connect.php");
	
	// Fill up array with names, technically the array will be each row of the query
	// get the q parameter from URL
	//$q =json_decode(file_get_contents("php://input")); $cities=""; //ajax without prototype
	$q = $_GET['hotelpick'];
	$xmlDoc = new DOMDocument();
	$xmlAllHotels = $xmlDoc->createElement('allHotels');
	$xmlDoc->appendChild($xmlAllHotels);
	
	//$xmlH = $xmlDoc->createElement('hotel');
	//$xmlI = $xmlDoc->createElement('image');
	//$xmlD = $xmlDoc->createElement('description');
	
	$rows = $db->query("SELECT * FROM hotelInfo WHERE hotel LIKE '$q%'");
	$count = 0;
	foreach ($rows as $row) {
		$xmlHotelTag = $xmlDoc->createElement('hotel');
		
		$hname = $row["hotel"];
		$img = $row["image"];
		$des = $row["description"];
		
		$xmlHotelTag->setAttribute("name",$hname);
		$xmlHotelTag->setAttribute("image",$img);
		$xmlHotelTag->setAttribute("description",$des );
		
		$xmlAllHotels->appendChild($xmlHotelTag);
		//$xmlH->setAttribute("hotel",$hname);
		//$xmlI->setAttribute("image",$img);
		//$xmlD->setAttribute("description",$des);
	}
	//$xmlDoc->appendChild($xmlH);
	//$xmlDoc->appendChild($xmlI);
	//$xmlDoc->appendChild($xmlD);
	
	//echo htmlentities($xmlDoc->saveXML());
	echo $xmlDoc->saveXML();
?>
