<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $UpdatedBy = $_POST["txtUpdatedBy"];
    $ID = $_POST["txtVehicleID"];
    $Model = $_POST["txtModel"];
    $Color = $_POST["txtColor"];
    $PlateNumber = $_POST["txtPlateNumber"];

    $query = "UPDATE vehicles
                    SET 
                        Model = '$Model',
                        Color = '$Color',
                        PlateNumber = '$PlateNumber',
                        UpdatedBy = '$UpdatedBy',
                        UpdatedDateTime = CURRENT_TIMESTAMP
                WHERE VehicleID = '$ID'";

    $sql = $conn -> query($query);

    echo json_encode(array("result" => $sql));

    $conn -> close();