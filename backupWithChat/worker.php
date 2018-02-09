<?php

include 'sql.php';
include 'curl.php';

// report errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//login data to database
$servername = "localhost";
$username = "pi";
$password = "burgerking";
$dbname = "wetterstation";

//create connection
$conn = connectToDatabase($servername, $username, $password, $dbname);

//read and load the JSON file
/*
$json = loadJSON('https://api.opensensemap.org/boxes/5a699afe411a790019628c13/sensors');

$time = $json['sensors'][0]['lastMeasurement']['createdAt'];
$time = new \DateTime($time);
$timestamp = $time->getTimestamp();
$pm10 = $json['sensors'][0]['lastMeasurement']['value'];
$pm2p5 = $json['sensors'][1]['lastMeasurement']['value'];
$temperature = $json['sensors'][2]['lastMeasurement']['value'];
$humidity = $json['sensors'][3]['lastMeasurement']['value'];

insertDataSet($conn, $timestamp, $temperature, $humidity, $pm10, $pm2p5);
printCurrentData($timestamp, $temperature, $humidity, $pm10, $pm2p5);
*/

while(TRUE) {
	$json = loadJSON('https://api.opensensemap.org/boxes/5a699afe411a790019628c13/sensors');
	$pm10 = $json['sensors'][0]['lastMeasurement']['value'];
	$pm2p5 = $json['sensors'][1]['lastMeasurement']['value'];
	$temperature = $json['sensors'][2]['lastMeasurement']['value'];
	$humidity = $json['sensors'][3]['lastMeasurement']['value'];	

	$oldTimestamp = $timestamp;
	$time = $json['sensors'][0]['lastMeasurement']['createdAt'];
	$time = new \DateTime($time);
	$timestamp = $time->getTimestamp();

	if($timestamp != $oldTimestamp){
		echo "updated!\n";
		printCurrentData($timestamp, $temperature, $humidity, $pm10, $pm2p5, "\n");
		insertDataSet($conn, $timestamp, $temperature, $humidity, $pm10, $pm2p5);
	}else{
		echo "wait\n";
		sleep(15);
	}
}

$conn->close();


?>
