<?php
    require '../Connection.php';
    $ID = $_POST["txtID"];
    $FirstName = $_POST["txtFirstName"];
    $MiddleName = $_POST["txtMiddleName"];
    $LastName = $_POST["txtLastName"];
    $Suffix = $_POST["txtSuffix"];
    $Birthdate = $_POST["txtBirthdate"];
    $ContactNo = $_POST["txtContactNo"];
    $EmailAddress = $_POST["txtEmailAddress"];
    $Gender = $_POST["txtGender"];
    $UpdatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$UpdatedBy = $_SESSION["UserID"];
    }
    $isActive = false;
    if(isset($_POST["chkIsActive"])){
		$isActive = $_POST["chkIsActive"];
	}

    $query = "UPDATE datacenter 
                SET
                    FirstName = '$FirstName', 
                    MiddleName = '$MiddleName', 
                    LastName = '$LastName', 
                    Suffix = '$Suffix', 
                    Gender = '$Gender', 
                    Birthdate = '$Birthdate',  
                    ContactNo = '$ContactNo',  
                    EmailAddress = '$EmailAddress', 
                    isActive = '$isActive',  
                    UpdatedBy = '$UpdatedBy',  
                    UpdatedDateTime = CURRENT_TIMESTAMP
                WHERE DataCenterID = '$ID'
            ";

    $sql = $conn -> query($query);

    echo json_encode(array("result" => $sql));

	$conn -> close();