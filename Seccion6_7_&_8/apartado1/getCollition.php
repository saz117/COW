<?php
	require("data_base_connect.php");
	
	$mail = $_POST['mail'];
	$date = $_POST['date'];

	
	$rows=$db->query("SELECT * FROM reservations WHERE email LIKE '$mail%'");
	$count = 0;
	
	if ($rows->rowCount()!=0){
		foreach ($rows as $row) {
			$db_date = $row["date"];
			$date2 = date('Y-m-d', strtotime($db_date. ' + 5 days'));
			$date3 = date('Y-m-d', strtotime($db_date. ' - 5 days'));
			
			if($date >= $date3 && $date <= $date2 ){
				$count++;
			}
		}
		if ($count != 0){
			header('HTTP/1.1 400 Bad Request', true, 404); //there is a collition
		}
		
	} else {
		header('HTTP/1.1 200 Good Request', true, 200);
	}

?>