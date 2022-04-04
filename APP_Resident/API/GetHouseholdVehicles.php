<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_GET["ID"];

    $query = "SELECT * FROM vehicles WHERE HouseHoldID = '$ID' AND isActive = 1";

    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();