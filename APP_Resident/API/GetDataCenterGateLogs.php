<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';

    $ID = $_POST["DataCenterID"];
    $DateFrom = $_POST["txtDateFrom"];
    $DateTo = $_POST["txtDateTo"];

    $query = "SELECT 
                gpl.CreatedDateTime
                FROM gatepasslogs gpl
                WHERE DataCenterID = '$ID'
                        AND (CONVERT(gpl.CreatedDateTime, DATE) >= '$DateFrom' AND CONVERT(gpl.CreatedDateTime, DATE) <= '$DateTo')
                ORDER BY gpl.CreatedDateTime DESC
                ";

    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();