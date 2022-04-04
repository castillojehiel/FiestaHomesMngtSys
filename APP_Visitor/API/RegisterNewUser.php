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

    $query = "INSERT INTO datacenter (FirstName, MiddleName, LastName, Suffix, Gender, Birthdate, ContactNo, EmailAddress, isActive, isResident, CreatedDateTime, HouseHoldID, UserPass, isNonUserRegistered)
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
                0,
                CURRENT_TIMESTAMP(),
                '0',
                '$FirstName',
                1
        )";

    $sql = $conn -> query($query);
    $id = $conn -> insert_id;
    //build qr code
    $qrCode = "VIS" . sprintf('%08d', $id);

    $query = "UPDATE datacenter SET QRCode = '$qrCode', CreatedBy = '$id' WHERE DataCenterID = '$id'";
    $sql2 = $conn -> query($query);

    echo json_encode(array("result" => $sql));

	$conn -> close();