<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fiestahomesdb_live";

	// $servername = "sql209.epizy.com";
	// $username = "epiz_31079426";
	// $password = "v6JCVrjRGa0OTn";
	// $dbname = "epiz_31079426_fiestahomesdb_live";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    header("Location:../../index.php");
	} 
