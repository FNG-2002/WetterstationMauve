
<!--<!DOCTYPE html>-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	<link rel="icon" href="https://lh3.googleusercontent.com/vUVAL5IZJl_9MsS7PQcWotUqinlSEIW_VllIN32y9zZcKH_XVTS1ZtGPgbFRxE42IsSS=w300">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>

    <script type="text/javascript">
		var name = "";
		var lastMessage;
		
    
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();

    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    			  if (e.keyCode == 13) { 

					var helpMessage = "1. !changeUser; 2. !donate";
					var sendText = true;
                    var text = $(this).val().replace("\n", "");
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length;
                    var botName = "RaspBot"; 

                    // send 
				
                    if (length <= maxLength + 1) {

					
						switch (text.toLowerCase()) {
							case "!changeuser":
								name = '';
								sendText = false;								
								break;
							case "!help":
								sendText = false;							
								text=helpMessage;
								chat.send(text, botName);
								break;
							case "!clear":
								chat.update();
								break;
							case "!donate":
								sendText = false;
								text="@"+name+" Your bank account has been cleared and all your money transferred to us by SQL Injecting your message !!1! ";
								chat.send(text, botName);
								break;
							default:
								if(text.substring(0, 1)=="!"){
									text=helpMessage;
									sendText = false;
									chat.send(text, botName);
								}
								break;
						}
						
						

						if(name=='' || !name){
							name = prompt("Dein Name:", "Guest");
							// default name is 'Guest'
							if (!name || name == ' ' || name.replace(/\s+/g, "") == "null" || !name.replace(/\s+/g, "")) {
							name = "Guest";	
							}
							
							// strip tags
							name = name.replace(/(<([^>]+)>)/ig,"");
							name = name.replace("mod", "");
						}
						if(sendText){
						lastMessage = text;
    			        chat.send(text, name);	
						}
    			        $(this).val("");
						
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
				  }else if(e.keyCode == 38){
					  $(this).val(lastMessage);
				  }
             });
            
    	});
		
    </script>


	
		<script type="text/javascript" src="js/fusioncharts.js"></script>
		<script type="text/javascript" src="js/themes/fusioncharts.theme.ocean.js"></script>

    <title>Wetterstation Mauve</title>
	
		<meta name="author" content="Furkan&amp;Johann" />
		<meta name="description" content="Wetterstation - Ein Schulprojekt des CHG mit Unterstützung von Mauve" />
		<meta name="viewport" content="width=device-width, initial-scale=0.75">

		<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 320px) and (max-device-width: 500px)" href="stylesheetmobile.css" />
		<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 501px)" href="stylesheet.css" />	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


		<!-- you should always add your stylesheet (css) in the head tag so that it starts loading before the page html is being displayed -->	
	<!--<link href="stylesheet.css" rel="stylesheet" type="text/css" />-->

<script type='text/javascript'>window.__chat4 = window.__chat4 || {};window.__chat4.client = '9kvjfz7itu';(function() {var chat4 = document.createElement('script');chat4.type = 'text/javascript';chat4.async = true;chat4.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'chat4.website/code/script.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(chat4, s);})();</script>

</head>
<body  onload="setInterval('chat.update()', 1000)">
	<!-- webpage content goes here in the body -->

	<div id="page" class="container-fluid">
		<div id="logo">
            <h1 >Wetterstation Mauve</h1>
		</div>
		<div class="nav" style="margin-top: 10px;">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a target="_blank" href="https://www.mauve.eu/today-is-newsday-01-2018-sch%C3%BCler-messen-feinstaub-mit-selbst-programmierter-wetterstation.html">Über uns</a></li>
				<li><a href="mailto:wetterstationmauve@gmail.de">Kontakt</a></li>
			</ul>	
		</div>
		<div id="content">
			<h2>Home</h2>
			<p>Willkommen auf unserer Website. Hier präsentieren wir Ihnen unsere Ergebnisse zum Projekt <b style="color: #aa0000;">"Wetterstation Mauve"</b>.</p>
			<p>In diesem Projekt haben drei Schüler des CHG eine Wetterstation innerhalb von drei Tagen gebaut und programmiert.</p>
		</div>
    	<div id="megadiv">
			<div id="values" class="column">
				<h2 style"margin-top: 5px;"><u>Aktuelle Werte</u></h2>

				<p>
				<?php

				include 'sql.php';
				include 'curl.php';

				$json = loadJSON('https://api.opensensemap.org/boxes/5a699afe411a790019628c13/sensors');
				$pm10 = $json['sensors'][0]['lastMeasurement']['value'];
				$pm2p5 = $json['sensors'][1]['lastMeasurement']['value'];
				$temperature = $json['sensors'][2]['lastMeasurement']['value'];
				$humidity = $json['sensors'][3]['lastMeasurement']['value'];	

				$oldTimestamp = $timestamp;
				$time = $json['sensors'][0]['lastMeasurement']['createdAt'];
				$time = new \DateTime($time);
				$timestamp = $time->getTimestamp();



				printCurrentData($timestamp, $temperature, $humidity, $pm10, $pm2p5, "<br/>");

				?>
				</p>
			</div> 
      		<div id="graphs" class="column">
				<div class="dropdown">
					<button class="dropbtn">Zeitdauer</button>
					<div class="dropdown-content">
						<form method="post">
						<button type="submit" name="test" value="86400" id="dropdownbutton">1 Tag</button>
						<button type="submit" name="test" value="604800" id="dropdownbutton">1 Woche</button>
						<button type="submit" name="test" value="31536000" id="dropdownbutton">1 Jahr</button>
						<button type="submit" name="test" value="1000000000000000" id="dropdownbutton">Unbegrenzt</button>
						</form>
					</div>
				</div>
				
        		<div id="graphs1"></div>
				<h2>------------------------------------------------------------</h2>
				<div id="graphs2"></div>
				<h2>------------------------------------------------------------</h2>
				<div id="graphs3">
					<div id="graphs31">
					</div>
					<div id="graphs32">
					</div>
				</div>
			</div> 
			
			<div id="page-wrap" class="column">
				<h2 id="chatheader">Chat:</h2>
				<div id="chat-wrap"><div id="chat-area"></div></div>

				<form id="send-message-area">
					
					<textarea placeholder="Schreibe deine Nachricht" id="sendie" maxlength = '240' ></textarea>
				</form>
			</div>
		</div>
			
		<div id="footer">
			<p>Webpage made by <a href="/" target="_blank">Furkan Gedikoglu &amp; Johann Jakob Hellermann</a></p>
		</div>
	</div>
</body>
</html>

<?php

include_once("sql.php");
include_once("graphs.php");

$seconds = 100000000000000000;



if (array_key_exists("test", $_POST)){
     $seconds = $_POST["test"];
}

$conn = connectToDatabase("localhost", "pi", "burgerking", "wetterstation");

graph($conn, "Temperature", "Temperature", "Temperatur", "100%", "300", "graphs1", $seconds);
graph($conn, "Humidity", "Humidity", "rel. Luftfeuchtigkeit", "100%", "300", "graphs2", $seconds);
graph($conn, "Pollutants", "PollutantPM10", "Feinstaub (PM10)", "100%", "300", "graphs32", $seconds);
graph($conn, "Pollutants", "PollutantPM2p5", "Feinstaub (PM2.5)", "100%", "300", "graphs31", $seconds);



?>