<!DOCTYPE html>
<html>
	<?php require("data_base_connect.php")?>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet"
	href="bootstrap-4.3.1_v2\css\bootstrap.min.css">

	<head>
		<title>Hook it</title>
		<style>
		  .sidebar {
			  width: 100%;
			  height: 70%;
			  overflow: auto;
			}

			.sidebar a {
			  display: block;
			  color: black;
			  padding: 16px;
			  text-decoration: none;
			}
			 
			.sidebar a.active {
			  background-color: gray;
			  color: white;
			}

			.sidebar a:hover:not(.active) {
			  background-color: #555;
			  color: white;
			}
		</style>
    <!-- Custom styles for this template -->
	</head>
	
	<body>
		<header>
			<nav class="navbar navbar-expand-sm bg-primary navbar-dark justify-content-end">
				<a href="#" class="navbar-brand d-flex align-items-center">
					<div> <img src="images/hotelLogo.jpg" width="60" height="50" fill="none" > </div>
					<h3>Hook it</h3>
				</a>
				
				<button class="btn btn-dark ml-auto mr-1">Log-in</button>
				<div class="navbar-nav text-right">
						<button class="btn btn-dark ml-auto mr-1">Create Account</button>
				</div>
			</nav>
		</header>	
		
		<div class="container-fluid">
			<div class="row vh-100">
				<nav class="col-2 bg-info text-white">
					<div class="sidebar">
					  <a href="#home">Home</a>
					  <a href="#Top Hotels" class="link-light">Top Hotels</a>
					  <a class="active" href="#Full Package">Full Package</a>
					  <a href="#Hotel + Flight">Hotel + Flight</a>
					  <a href="#Hotel + Flight">Hotel + Tours</a>
					</div>
					<h4>Check our new Website:</h4> 
					<a href="https://www.booking.com" class="text-light"> booking.com</a>

				</nav>
				
				<div class="col-10 bg-light text-white mx-auto text-center form p-4" style="background-image: url('images/background.webp'); background-repeat: no-repeat; background-size: cover; background-position: center;">
                    <h2>Review reservation</h2>
					<?php 
						if(isset($_POST['citypick'])){
							$name = $_POST['name'];
							$mail = $_POST['mail'];
							$hotelpick = $_POST['hotelpick'];
							$numguests = $_POST['nguests'];
							$date = $_POST['date'];
							$countrypick = $_POST['countrypick'];
							$citypick = $_POST['citypick'];
											
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
							
							$regexName = "/^[a-zA-z\s]+$/";
							$regexMail = "/^[a-zA-z\d\._]+@[a-zA-z\d\._]+.[a-zA-z\d\.]{2,}+$/";
						
							$name = $_POST['name'];
							$mail = $_POST['mail'];
							$hotelpick = $_POST['hotelpick'];
							$numguests = $_POST['nguests'];
							$date = $_POST['date'];
							$countrypick = $_POST['countrypick'];
							
							if(preg_match($regexName,$name) && preg_match($regexMail,$mail)){
											
								echo "Name: $name";
								echo "<br>";
								echo "Hotel selected: $hotelpick";
								echo "<br>";
								echo "Date: $date";
								echo "<br>";
								echo "Number of guests: $numguests";
								echo "<br>";
								echo "contact information: $mail";
								echo "<br>";
								
								
								?>	
								<form action="http://localhost/xampp/COW/Seccion4_5/apartado1/server.php" method = "post">
									Select a City:<br />
										<select name="citypick" >
											<?php
											$db = new PDO("mysql:dbname=world","root");	
											$rows = $db->query("SELECT * FROM cities WHERE country_code LIKE '$countrypick%' LIMIT 5");
											foreach ($rows as $row) {
											$opt = $row["name"];
											echo '<option value="' . $opt . '">' . $opt . '</option>';
											}

											?>
										</select><br />
										
										<input type="hidden" name="name" value="<?php echo $name; ?>" />
										<input type="hidden" name="mail" value="<?php echo $mail; ?>" />
										<input type="hidden" name="hotelpick" value="<?php echo $hotelpick; ?>" />
										<input type="hidden" name="nguests" value="<?php echo $numguests; ?>" />
										<input type="hidden" name="date" value="<?php echo $date; ?>" />
										<input type="hidden" name="countrypick" value="<?php echo $countrypick; ?>" />
										
										<br /><input type="submit" value="Confirm reservation"/>
								</form>
								<?php
								
							}else{
								echo "Error, invalid name or email submitted. <br>";
								echo "Please go back.";
							}
					}
					?>
					
                </div>
			</div>
		</div>
			
		<footer class="footer footer-dark bg-primary shadow-sm">
			<div class="container text-white" >
				<h4>Contact: +34 612 345 678</h4>
				<a href="mailto:hook-it-hotels@gmail.com" class="text-light"> hook-it-hotels@gmail.com</a> 		
			</div>
		</footer>
		
	</body>	
</html>