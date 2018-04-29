<?php 
	$result = null;
	//save into a DB 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "testingstuff";
	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

/**
CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)

**/


	// Check connection
	if ($conn->connect_error) {
		//die("Connection failed: " . $conn->connect_error);
		$result = $conn->connect_error;
	}
	if( $result == null ){

		$sql = "INSERT INTO users (name, email)
		VALUES ('".$_POST["name"]."','".$_POST["email"]."')";

		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
			$teste = 1;
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
			$teste = 2;
		}$conn->close();


		$result = array(
			"response"=>"sucess", 
			"name" => $_POST['name'],
			"code"=>"200",
			"teste" => $teste,
			"error" => $conn->error
		);
		echo json_encode($result);
	
	}
	else{
		$result = array(
			"response"=>"error", 
			"code"=>"500",
			"error" =>  $conn->connect_error
		);
		echo json_encode($result);
	}
	die();

?>