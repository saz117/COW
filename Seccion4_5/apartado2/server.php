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
						$regexName = "/^[a-zA-z\s]+$/";
						$regexMail = "/^[a-zA-z\d\._]+@[a-zA-z\d\._]+.[a-zA-z\d\.]{2,}+$/";
						$name = $_POST['name'];
						$mail = $_POST['mail'];
						$hotelpick = $_POST['hotelpick'];
						$numguests = $_POST['nguests'];
						$date = $_POST['date'];
						$countrypick = $_POST['countrypick'];
						$citypick = $_POST['citypick'];
						if( $countrypick == "" || $citypick == ""){
							echo "Error, it seems you didn't pick a city or country. <br>";
								echo "Please go back.";
							
						}else {
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