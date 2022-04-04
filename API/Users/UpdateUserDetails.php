<?php
    require '../Connection.php';
    $ID = $_POST["txtID"];
    $DCID = $_POST["txtDCID"];
    $FirstName = $_POST["txtFirstName"];
    $MiddleName = $_POST["txtMiddleName"];
    $LastName = $_POST["txtLastName"];
    $Suffix = $_POST["txtSuffix"];
    $Birthdate = $_POST["txtBirthdate"];
    $ContactNo = $_POST["txtContactNo"];
    $EmailAddress = $_POST["txtEmailAddress"];
    $Gender = $_POST["txtGender"];
    $Username = $_POST["txtUsername"];
    $Password = $_POST["txtUserPassword"];
    $UpdatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$UpdatedBy = $_SESSION["UserID"];
    }
    $isActive = true;
    if(isset($POST["chkIsActive"])){
		$isActive = $POST["chkIsActive"];
	}
    
    //check if datacenter has user account if yes update user account details
    $query = "UPDATE useraccount 
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
                    Username = '$Username',
                    Userpass = '$Password'
                WHERE UserID = '$ID'
            ";
    $sql = $conn -> query($query);

    $query1 = "UPDATE datacenter 
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