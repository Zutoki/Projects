<?php
GetAllProject();
//$Id = AddProject();
//echo $Id;

function GetAllProject(){
	$conn = Connect();

	$sql = "SELECT ProjectID, ProjectName, Porcent, LastUpdate FROM Projects WHERE Available=1";
	$result = $conn->query($sql);

	if(mysqli_num_rows($result)>0){
    $fila = $result->fetch_array(MYSQLI_ASSOC);

    foreach ($fila as &$valor) {
	    echo $valor;
		}
  } else {
  	echo "0 results";
	}
	Closed($conn);
}
function AddProject(){
  $conn = Connect();

	$sql = "INSERT INTO Projects (ProjectName, Porcent)
	         VALUES ('Test 1', '70')";

	if ($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is: " . $last_id;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	Closed($conn);
	return $last_id;
}
function Connect(){
	// Configura los datos de tu cuenta
	$dbhost = 'localhost';
	$username = 'id13926055_project';
	$password = 'DataBase123@';
	$dbname = 'id13926055_projects';

	// Create connection
	$conn = new mysqli($dbhost, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
  	die('Connection failed: ' . $conn->connect_error);
	}
	return $conn;
}
function Closed($conn){
  $conn->close();
}
?>