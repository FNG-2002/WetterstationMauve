<?php
date_default_timezone_set('CET');

function loadJSON($url){

	// define the URL to load
	//$url = 'https://api.opensensemap.org/boxes/5a699afe411a790019628c13/sensors';
	// start cURL
	$ch = curl_init(); 
	// tell cURL what the URL is
	curl_setopt($ch, CURLOPT_URL, $url); 
	// tell cURL that you want the data back from that URL
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	// run cURL
	$output = curl_exec($ch); 
	// end the cURL call (this also cleans up memory so it is 
	// important)
	curl_close($ch);
	// display the output
	$json = json_decode($output, true);
	//echo json_encode($json , JSON_PRETTY_PRINT);
	return $json;
}

function printCurrentData($timestamp, $temperature, $humidity, $pm10, $pm2p5, $br){

	echo $br."Zeit: ";
	echo date('Y-m-d H:i:s', $timestamp);
	echo $br."Temperatur: ";
	echo $temperature;
	echo "°C".$br."rel. Luftfeuchtigkeit: ";
	echo $humidity;
	echo "%".$br."PM10: ";
	echo $pm10;
	echo "µg/m³".$br."PM2.5: ";
	echo $pm2p5;
	echo "µg/m³ ".$br;

}


?>
