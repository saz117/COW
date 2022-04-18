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
                    <h2>Reservation</h2>
					
					<form id="reservform" action="http://localhost/xampp/COW/Seccion4_5/apartado2/server.php" method = "post">
						<label for="name">Name & Last Name:</label><br>
						<input type="text" id="name" name="name" placeholder="Name and LastName" minlength="4" maxlength="30" required/><br>
						<p>Suggestions: <span id="txtHint"></span></p>
						
						<label for="mail">Email Address:</label><br>
						<input type="text" id="mail" name="mail" placeholder="example@gmail.com" required/><br>
						
						Select a Country:<br />
						<select name="countrypick" id ="countrypick" >
						<!--<option value="">Select Country</option>-->
						<option value="">Select Country</option>
						<option value="USA">United States</option>
						<option value="ESP">Spain</option>
						<option value="ITA">Italy</option>
						<option value="MEX">Mexico</option>
						</select><br />
						
						Select a City:<br />
						<select name="citypick" id="citypick">
						<option value="">Select City</option>
							
						</select><br />
						
						
						Select a Hotel:<br />
						<select name="hotelpick" id="hotelpick">
						<option value="All-Stars Hotel">All-Stars Hotel</option>
						<option value="Hotel Vela">Hotel Vela</option>
						<option value="Sunny-Sides">Sunny-Sides</option>
						<option value="Megaton">Megaton</option>
						<option value="Galaxy of Adventures">Galaxy of Adventures</option>
						</select><br />
						
						Select the number of guests:
						<select name="nguests">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						</select> <br />
						
						<label for="date">Date:</label>
						<input type="date" id="date" name="date" value=today required/><br>
						
						<input type="submit" value="submit"/>
						
					</form>
					
					
					
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
	
	<script type="text/javascript" src="scriptaculous-js-1.9.0/lib/prototype.js"></script>
	<script type="text/javascript" src="scriptaculous-js-1.9.0/src/scriptaculous.js"></script>
	<script type="text/javascript">
	//alternativa a window.onload
		document.observe("dom:loaded", function() {
			var form = $("reservform"), //document.getElementByID("reservform")
					name = $("name"),
					mail = $("mail"),
					country = $("countrypick");
			
			const regexMail = new RegExp(/^[a-zA-z\d\._]+@[a-zA-z\d\._]+.[a-zA-z\d\.]{2,}$/),
				  regexName = new RegExp(/^[a-zA-z\s]+$/);
			
			name.addEventListener("change", function() { checkName(name, regexName); } ); //to check name
			mail.addEventListener("change", function() { checkMail(mail, regexMail); } ); //to check the mail
			name.addEventListener("keyup", function() { showHint($F("name")); } ); //auto-complete
			country.addEventListener("change", function() { getCities($F("countrypick")); } ); //dynamically select cities
			form.onsubmit = function() { checkForm(regexName, regexMail); }; //to check submission
		});
		
		function checkForm(rn, rm) {
			
			if (rn.test($F("name")) == false || rm.test($F("mail")) == false) { //check if name and email match their regex
				alert("Error, invalid name or email."); // show error message
				event.preventDefault();
				return false; // stop form submission
			}
			if ($F("countrypick") == "" || $F("citypick")){ //check that the city or country choice are not empty
				alert("Error, it seems you didn't pick a city or country. "); // show error message
				event.preventDefault();
				return false; // stop form submission
			}
			
		}
			
		function checkName(name, rn) {
			
			if (rn.test($F("name")) == false) {
				//alert("Error, invalid name."); // show error message
				name.value = ""; //reset value
				name.shake();
				name.highlight({startcolor: "#ff0000", duration: 2 }); //make it red for a momment
				return false; // stop form submission
			}
			//name.highlight({restorecolor: "#00ff00"}); //keep it green
		}
		
		function checkMail(mail, rm) {
			
			if (rm.test($F("mail")) == false) {
				//alert("Error, invalid email."); // show error message
				mail.value = "";
				mail.shake();
				mail.highlight({startcolor: "#ff0000", duration: 2 });
				return false; // stop form submission
			}
		}
		
		function showHint(str){
			if (str.length==0){
				document.getElementById("txtHint").innerHTML="";
				return;
			}
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","gethint.php?q="+str,true);
			xmlhttp.send();
		}

		/*
		//ajax without prototype
		function getCities(country){
			
			if (country){
				$("citypick").innerHTML="";
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
						var val = xmlhttp.responseText;
						val = val.split(",");
						
						for (var i = 0; i < val.length; i += 1) {
							$("citypick").options.add(new Option(val[i], val[i]));
						}
					}
				}
				xmlhttp.open("POST","getCities.php",true);
				xmlhttp.send(JSON.stringify(country));
			
			} else{
				$("citypick").innerHTML="";
				$("citypick").options.add(new Option("Select City", ""));
				return;
			}
			
		}
		*/
		
		//ajax with prototype
		function getCities(country){
			if (country){
				
				new Ajax.Request("getCities.php", {
					method: "POST",
					parameters: {name: country},
					onSuccess: getCities2,
					onFailure: citiesError,
					onException: citiesError
				});	
			}
			else{
				$("citypick").innerHTML="";
				$("citypick").options.add(new Option("Select City", ""));
				return;
			}
		}
		
		function getCities2(response){
			
			$("citypick").innerHTML="";
			if (response.readyState==4 && response.status==200){
				
				var val = response.responseText;
				
				val = val.split(",");
				for (var i = 0; i < val.length; i += 1) {
					$("citypick").options.add(new Option(val[i], val[i]));
				}
			}
		}
		
		function citiesError(response){
			alert("Unexpected error with our DataBase" );
		}
		

	</script>
</html>
<?php?>