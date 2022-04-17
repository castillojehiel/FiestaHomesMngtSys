<?php
    require '../Connection.php';
    $DataCenterID = $_POST["txtDCID"];
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
    $Position = $_POST["txtPosition"];
    $CreatedBy = 3;
	if(isset($_SESSION["UserID"])){
		$CreatedBy = $_SESSION["UserID"];
    }

    $query = "INSERT INTO useraccount (DataCenterID,FirstName, MiddleName, LastName, Suffix, Gender, Birthdate, 
                                        ContactNo, EmailAddress, isActive, CreatedBy, CreatedDateTime, Username, Userpass, UserPosition)
        VALUES(
                '$DataCenterID',
                '$FirstName',
                '$MiddleName',
                '$LastName',
                '$Suffix',
                '$Gender',
                '$Birthdate',
                '$ContactNo',
                '$EmailAddress',
                1,
                '$CreatedBy',
                CURRENT_TIMESTAMP(),
                '$Username',
                '$Password',
                '$Position'
        )";

    $sql = $conn -> query($query);
    $id = $conn -> insert_id;
    //build qr code
    $qrCode = "STAFF" . sprintf('%08d', $id);

    $query = "UPDATE useraccount SET QRCode = '$qrCode' WHERE UserID = '$id'";
    $sql2 = $conn -> query($query);

    echo json_encode(array("result" => $sql));

	$conn -> close();