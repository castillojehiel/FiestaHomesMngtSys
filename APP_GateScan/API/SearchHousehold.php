<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $keyword = $_POST["txtHouseHoldKeyword"];

    $query = "SELECT * FROM households WHERE isActive = 1 AND HouseHoldName LIKE '%$keyword%'";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();


