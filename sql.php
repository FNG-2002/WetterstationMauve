
<?php

function connectToDatabase($servername, $username, $password, $dbname){

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;
}

function insertDataSet($conn, $timestamp, $temperature, $humidity, $pm10, $pm2p5)
{
	$sqltime = sprintf("INSERT INTO Time (Timestamp) VALUES (%s)", $timestamp);
	$id=execSQL($conn, $sqltime);
	$sqltemp = sprintf("INSERT INTO Temperature (ID, Temperature) VALUES (%s, %s)", $id, $temperature);
	execSQL($conn, $sqltemp);
	$sqlhumidity = sprintf("INSERT INTO Humidity (ID, Humidity) VALUES (%s, %s)", $id, $humidity);
	execSQL($conn, $sqlhumidity);
	$sqlpollutants = sprintf("INSERT INTO Pollutants (ID, PollutantPM10, PollutantPM2p5) VALUES (%s, %s, %s)", $id, $pm10 , $pm2p5);
	execSQL($conn, $sqlpollutants);
}


function execSQL($conn, $sql)
{
	if ($conn->query($sql) === TRUE) {
		//echo "Successfully\n";
	} else {
		echo "Error: " . $conn->error;
	}
	return $conn->insert_id;
}

?>
