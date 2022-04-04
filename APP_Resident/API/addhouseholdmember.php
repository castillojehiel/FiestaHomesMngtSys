<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $FirstName = $_POST["txtFirstName"];
    $MiddleName = $_POST["txtMiddleName"];
    $LastName = $_POST["txtLastName"];
    $Suffix = $_POST["txtSuffix"];
    $Birthdate = $_POST["txtBirthdate"];
    $ContactNo = $_POST["txtContactNo"];
    $EmailAddress = $_POST["txtEmailAddress"];
    $Gender = $_POST["chkGender"];
    $CreatedBy = $_POST["txtCreatedBy"];
    $HouseHoldID = $_POST["txtHouseHoldID"];

    $query = "INSERT INTO datacenter (FirstName, MiddleName, LastName, Suffix, Gender, Birthdate, ContactNo, EmailAddress, isActive, isResident, CreatedBy, CreatedDateTime, HouseHoldID, UserpPass)
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
                '$HouseHoldID',
                '$UserPass'
        )";

    $sql = $conn -> query($query);
    $id = $conn -> insert_id;
    //build qr code
    $qrCode = "RES" . sprintf('%08d', $id);

    $query = "UPDATE datacenter SET QRCode = '$qrCode' WHERE DataCenterID = '$id'";
    $sql2 = $conn -> query($query);

    echo json_encode(array("result" => $sql));

	$conn -> close();