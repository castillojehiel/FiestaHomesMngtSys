<?php
    header("Access-Control-Allow-Origin: *");
    require '../Connection.php';
    $ID = $_GET["HouseHoldID"];

    $query = "SELECT * FROM vehicles WHERE HouseHoldID = '$ID'";

    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();