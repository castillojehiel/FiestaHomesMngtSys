<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $UpdatedBy = $_POST["UpdatedBy"];
    $ID = $_POST["VehicleID"];

    $query = "UPDATE vehicles
                    SET 
                        isActive = 0
                WHERE VehicleID = '$ID'";

    $sql = $conn -> query($query);

    echo json_encode(array("result" => $sql));

    $conn -> close();