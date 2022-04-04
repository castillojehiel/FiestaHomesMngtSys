<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $CreatedBy = $_POST["txtCreatedBy"];
    $HouseHoldID = $_POST["txtHouseHoldID"];
    $Model = $_POST["txtModel"];
    $Color = $_POST["txtColor"];
    $PlateNumber = $_POST["txtPlateNumber"];

    $query = "INSERT INTO vehicles (HouseholdID, Model, Color, PlateNumber, CreatedBy, CreatedDateTime)
                VALUES('$HouseHoldID', '$Model', '$Color', '$PlateNumber', '$CreatedBy', CURRENT_TIMESTAMP)";
    $sql = $conn -> query($query);

    $id = $conn -> insert_id;
    //build qr code
    $qrCode = "VEH" . sprintf('%08d', $id);

    $query = "UPDATE vehicles SET QRCode = '$qrCode' WHERE VehicleID = '$id'";

    $sql2 = $conn -> query($query);

    echo json_encode(array("result" => $sql));

    $conn -> close();