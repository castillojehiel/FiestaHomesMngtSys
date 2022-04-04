<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';

    $CreatedBy = $_POST["CreatedBy"];
    $VisitorID = $_POST["VisitorID"];
    $HouseHoldID = $_POST["HouseHoldID"];

    $query = "INSERT INTO visitorwhitelist (VisitorID, HouseHoldID, CreatedBy, CreatedDateTime)
                VALUES ('$VisitorID', '$HouseHoldID', '$CreatedBy', CURRENT_TIMESTAMP)
                ";
    $sql = $conn -> query($query);

    //parse return value
    echo json_encode(array("result" => $sql, "ID" => $conn -> insert_id));

    $conn -> close();