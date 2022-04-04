<?php
    require '../Connection.php';
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
    $CreatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$CreatedBy = $_SESSION["UserID"];
    }
    $isActive = false;
    if(isset($_POST["chkIsActive"])){
		$isActive = $_POST["chkIsActive"];
	}

    $query = "INSERT INTO datacenter (FirstName, MiddleName, LastName, Suffix, Gender, Birthdate, ContactNo, EmailAddress, isActive, isResident, CreatedBy, CreatedDateTime, Userpass, DataCenterPhoto, PhotoExt)
        VALUES(
                '$FirstName',
                '$MiddleName',
                '$LastName',
                '$Suffix',
                '$Gender',
                '$Birthdate',
                '$ContactNo',
                '$EmailAddress',
                1,
                1,
                '$CreatedBy',
                CURRENT_TIMESTAMP(),
                '$FirstName',
                '$Photo',
                '$PhotoExt'
        )";

    $sql = $conn -> query($query);
    $id = $conn -> insert_id;
    //build qr code
    $qrCode = "RES" . sprintf('%08d', $id);

    $query = "UPDATE datacenter SET QRCode = '$qrCode' WHERE DataCenterID = '$id'";
    $sql2 = $conn -> query($query);

    echo json_encode(array("result" => $sql));

	$conn -> close();