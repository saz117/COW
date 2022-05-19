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
					  <a href="http://localhost/xampp/COW/Seccion%201/Apartado%202/hotelWebSite.html">Home</a>
					  <a href="#Top Hotels" class="link-light">Top Hotels</a>
					  <a class="active" href="#Full Package">Full Package</a>
					  <a href="#Hotel + Flight">Hotel + Flight</a>
					  <a href="#Hotel + Flight">Hotel + Tours</a>
					</div>
					<h4>Check our new Website:</h4> 
					<a href="https://www.booking.com" class="text-light"> booking.com</a>

				</nav>
				
				<div id= "formdiv" class="col-4 bg-light text-white text-center form p-4" style="background-image: url('images/background.webp'); background-repeat: no-repeat; background-size: cover; background-position: center;">
                    <h2>Reservation</h2>
					
					<!--<form id="reservform" >-->
					
						  <div>
							<label for="name">Name & Last Name:</label><br>
							<input type="text" id="name" name="name" class="ui-widget-content" placeholder="Name and LastName" minlength="4" maxlength="30" required/><br>
							<p>Suggestions: <div id="txtHint" class="ui-widget-content" style="background-color:#33475b"></div></p>
						  </div>
						
						
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
						<select name="nguests" id="nguests">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						</select> <br />
						
						<label for="date">Date:</label>
						<input type="date" id="date" name="date" value=today required/><br>
						
						<input type="submit" id = "subButton"value="submit"/>
						
					<!--</form>-->
                </div>
				
				<table class="col-6 text-black text-center">
				  <tr>
					<td>Hotel</td>
					<td>Image</td>
				  </tr>
				  <tr id="hotels">
					<td>Hotel Name</td>
					<td><img src='images/hotelLogo.jpg' /></td>
				  </tr>
				</table>
				
			</div>
		</div>
			
		<footer class="footer footer-dark bg-primary shadow-sm">
			<div class="container text-white" >
				<h4>Contact: +34 612 345 678</h4>
				<a href="mailto:hook-it-hotels@gmail.com" class="text-light"> hook-it-hotels@gmail.com</a> 		
			</div>
		</footer>
		
	</body>	
	
	<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js"></script>
	<script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js?load = effects,controls"></script>
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

	<script type="text/javascript">
	
	
		
		jQuery(document).ready(function($){
			
			var form = $("#reservform"), //document.getElementByID("reservform")
					name = $("#name"),
					mail = $("#mail"),
					country = $("#countrypick");
			var availableTags = [];
			$.get("gethint.php",
				function(data){
				var val = data.split(",");
				for (var i = 0; i < val.length; i += 1) {
					availableTags.push(val[i]);
				}
				
				});
			
			const regexMail = new RegExp(/^[a-zA-z\d\._]+@[a-zA-z\d\._]+.[a-zA-z\d\.]{2,}$/),
				  regexName = new RegExp(/^[a-zA-z\s]+$/);
			
			name.on("change", function() { checkName(name, regexName); } ); //to check name
			mail.on("change", function() { checkMail(mail, regexMail); } ); //to check the mail
			
			name.on("keyup", function(event) { showHint(availableTags); } ); //auto-complete
			
			country.on("change", function() { getCities($("#countrypick").val()); } ); //dynamically select cities
			$("#subButton").on("click", function() { checkForm(regexName, regexMail); } );
			
			$('#hotelpick').on('change', function(){ updateTable(); } );
		});
		
		function updateTable(){
			
			var info = {
				hotelpick: $("#hotelpick").val()
			}

			$('#target').html('sending..');

			$.ajax({
				url: 'getHotelInfo.php',
				type: 'post',
				dataType: 'json',
				data: info,
				success: function (data) {
					//alert(data.image);
					//alert(data.description);
					
					
					$("#hotels td:first").html(data.description); //maybe add a little description instead
					$("#hotels td:last").html( "<td>"+ "<img src='" + data.image +"' /></td>");
				},
			});
			
			/*
			var img = "<img src='images/hotelLogo.jpg' />";
			
			if($('#hotelpick').val() == "All-Stars Hotel"){
				img = "<img src='images/all-stars.jpg' />";

			}else if($('#hotelpick').val() == "Hotel Vela"){
				img = "<img src='images/vela.jpg' />";
				
			}else if($('#hotelpick').val() == "Sunny-Sides"){
				img = "<img src='images/sunny-sides.jpg' />";
				
			}else if($('#hotelpick').val() == "Megaton"){
				img = "<img src='images/megaton.jpg' />";
				
			}else if($('#hotelpick').val() == "Galaxy of Adventures"){
				img = "<img src='images/galaxy.jpg' />";	
			}
			
			$("#hotels td:first").html($('#hotelpick').val()); //maybe add a little description instead
			$("#hotels td:last").html( "<td>"+ img +"</td>");
			//$("#hotels td:last, #hotels td:first").html( "<td>"+ img +"</td>"); //multiple seleccion, but in this case it doesn't make sense
			*/

		}
				
		function checkForm(rn, rm) {
			
			if (rn.test($("#name").val()) == false || rm.test($("#mail").val()) == false) { //check if name and email match their regex
				alert("Error, invalid name or email."); // show error message
				event.preventDefault();
				return false; // stop form submission
			}
			if ($("#countrypick").val() == "" || $("#citypick").val() == ""){ //check that the city or country choice are not empty
				alert("Error, it seems you didn't pick a city or country. "); // show error message
				event.preventDefault();
				return false; // stop form submission
			}
			
			$.post("getCollition.php",
				{
				mail: $("#mail").val(),
				date: $("#date").val()
				},
				function(data,status){
					if(status="success"){
						submitForm();
					}
					
			}).fail(
				function() {
					  alert("It seems you already have a reservation with us");
			}); 
			
		}
		
		function submitForm(){
			
			$.post("server.php",
				{
				name: $("#name").val(),
				mail: $("#mail").val(),
				hotelpick: $("#hotelpick").val(),
				nguests: $("#nguests").val(),
				date: $("#date").val(),
				countrypick: $("#countrypick").val(),
				citypick: $("#citypick").val()
				},
				function(data,status){
					
					if(status="success"){
						successFunc(data);
					}
					
			}).fail(
				function() {
					  failureFunc();
			}); 
			
		}
		
		function successFunc(response) {
			
			$('#formdiv').empty();
			$('#formdiv').html(response);
			
		}
		function failureFunc(response) {
			alert("Unexpected error with our DataBase" );
		}

			
		function checkName(name, rn) {
			
			if (rn.test(name.val()) == false) {
			
				name.val(""); //reset value
				name.effect("shake");
				//name.highlight({startcolor: "#ff0000", duration: 2 }); //make it red for a momment

				return false; // stop form submission
			}
		}
		
		function checkMail(mail, rm) {
			
			if (rm.test(mail.val()) == false) {
				
				mail.val("");
				mail.effect("shake");
				//mail.highlight({startcolor: "#ff0000", duration: 2 });
				return false; // stop form submission
			}
		}
		
		
		function showHint(availableTags){
				
			$("#name").autocomplete({
				source: availableTags
			});		
		}
		
		
		function getCities(country){
			if (country){
				$.post("getCities.php",
				{
				name:country,
				},
				function(data,status){
					$("#citypick").empty();
					
					if (status=="success"){
						var val = data;
						
						val = val.split(",");
						for (var i = 0; i < val.length; i += 1) {
							
							$('#citypick').append($('<option>', { value: val[i], text: val[i]}));
						}
					}
					//do failure case
				}).fail(
				function() {
					  failureFunc();
			});
			}
			else{
				$("#citypick").empty();
				$('#citypick').append($('<option>', { value: "", text: "Select City"}));
				return;
			}
		}
		

	</script>
</html>
<?php?>