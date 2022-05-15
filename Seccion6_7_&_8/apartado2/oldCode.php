/*
		//ajax without prototype
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
		
		/*
		//ajax with prototype
		function showHint(str){
			if (str.length==0){
				
				$("txtHint").innerHTML="";
				return;
			}
			
			new Ajax.Request("gethint.php?q="+str, {
					method: "GET",
					onSuccess: showHint2,
					onFailure: citiesError,
					onException: citiesError
				});				
		}
		
		function showHint2(response){
			
			if (response.readyState==4 && response.status==200){
				$("txtHint").innerHTML=response.responseText;
			}
		}
		*/