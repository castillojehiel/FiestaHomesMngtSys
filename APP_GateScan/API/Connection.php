<?php
	header("Access-Control-Allow-Origin: *");
	// $servername = "localhost";
	// $username = "root";
	// $password = "";
	// $dbname = "fiestahomesdb_live";

	$servername = "MYSQL5025.site4now.net";
	$username = "a84bb3_fsdb";
	$password = "F19r19d5z";
	$dbname = "db_a84bb3_fsdb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    header("Location:../../index.php");
	} 

	
