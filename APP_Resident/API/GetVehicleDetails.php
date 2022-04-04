<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_GET["ID"];

    $query = "SELECT * FROM vehicles WHERE VehicleID = '$ID'";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();

    echo json_encode($data);

    $sql -> close();