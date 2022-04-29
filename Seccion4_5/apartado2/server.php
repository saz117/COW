
<?php 
	require("data_base_connect.php");
	$regexName = "/^[a-zA-z\s]+$/";
	$regexMail = "/^[a-zA-z\d\._]+@[a-zA-z\d\._]+.[a-zA-z\d\.]{2,}+$/";
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$hotelpick = $_POST['hotelpick'];
	$numguests = $_POST['nguests'];
	$date = $_POST['date'];
	$countrypick = $_POST['countrypick'];
	$citypick = $_POST['citypick'];
	

	if(preg_match($regexName,$name) && preg_match($regexMail,$mail)){
					
		echo "CONGRATULATIONS: $name";
		echo "<br>";
		echo "You reserved at $hotelpick for: $date , in $citypick, $countrypick";
		echo "<br>";
		echo "Number of guests: $numguests";
		echo "<br>";
		echo "IF anything happens, we will contact you on: $mail";
		echo "<br>";
		
		$rows = $db->query("INSERT INTO `reservations` (`name`, `email`, `hotel`, `num_guests`, `date`, `country`, `city`) 
		VALUES ('$name', '$mail', '$hotelpick', '$numguests', '$date', '$countrypick', '$citypick')");
	}
	else{
		echo "Error, invalid name or email submitted. <br>";
		echo "Please go back.";
	}
?>