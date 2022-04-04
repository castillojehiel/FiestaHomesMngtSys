<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_GET["ID"];

    $query = "SELECT
                hh.HouseHoldName,
                hh.HouseHoldID
                FROM visitorlogs vl
                LEFT JOIN households hh
                    ON vl.HouseHoldID = hh.HouseHoldID
                WHERE   vl.VisitorID = '$ID'
                GROUP BY hh.HouseHoldID
                ORDER BY hh.HouseHoldName ASC
                ";
    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);
    echo($conn -> error);
    echo json_encode($data);

    $conn -> close();