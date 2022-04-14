<?php 
	$base = $_GET['base'];
	$exp = $_GET['exp'];
	$res = pow($base,$exp);
	echo "$base ^ $exp = $res";
	
?>