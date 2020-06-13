<?php
$conn = Connect();
Closed($conn);

function Connect(){
	// Configura los datos de tu cuenta
	$dbhost = 'localhost';
	$username = 'id13926055_project';
	$password = 'DataBase123@';
	$dbname = 'id13926055_project';

	// Create connection
	$conn = new mysqli($dbhost, $username, $password);

	// Check connection
	if ($conn->connect_error) {
  	die('Connection failed: ' . $conn->connect_error);
	}
	echo 'Connected successfully';
	return $conn;
}
function Closed($conn){
  $conn->close();
  echo 'Disconnected successfully';
}
?>