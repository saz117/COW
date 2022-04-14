<?php
	$regexName = "/^[a-zA-z\s]+$/";
	$regexMail = "/^[a-zA-z\d\._]+@[a-zA-z\d\._]+.[a-zA-z\d\.]{2,}+$/";
?>
<form method = "GET">
	<label for="name">Name & Last Name:</label><br>
	<input id="name" name="name" placeholder="Name LastName" maxlength="20" required/><br>
	
	<label for="mail">Email Address:</label><br>
	<input id="mail" name="mail" placeholder="example@gmail.com" required/><br>
	Select a Hotel:
	<select name="hotelpick">
	<option value="All-Stars Hotel">All-Stars Hotel</option>
	<option value="Hotel Vela">Hotel Vela</option>
	<option value="Sunny-Sides">Sunny-Sides</option>
	<option value="Megaton">Megaton</option>
	<option value="Galaxy of Adventures">Galaxy of Adventures</option>
	</select> <br />
	
	<label for="date">Date:</label><br>
	<input type="date" id="date" name="date" value=today required/><br>
	
	<input type="submit" value="submit"/>
						
</form>
<?php
	if(preg_match($regexName,$_GET['name'])){
		header("HTTP header text");
?>