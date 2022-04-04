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
    $Photo = $_POST["txtPhoto"];
    $PhotoExt = $_POST["txtPhotoExt"];
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
                    UpdatedDateTime = CURRENT_TIMESTAMP,
                    DataCenterPhoto = '$Photo',
                    PhotoExt = '$PhotoExt'
                WHERE DataCenterID = '$ID'
            ";
    $sql = $conn -> query($query);
    
    //check if datacenter has user account if yes update user account details
    $query1 = "UPDATE useraccount 
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
    $conn -> query($query1);

    
    //parse return value
    echo json_encode(array("result" => $sql));

	$conn -> close();