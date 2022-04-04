<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_GET["DataCenterID"];

    $query = "SELECT
                mem.*,
                CONCAT(mem.FirstName, ' ', mem.MiddleName, ' ', mem.LastName, ' ', mem.Suffix) as HouseHoldMemberName
                FROM datacenter dc
                LEFT JOIN Households hh
                    ON dc.HouseHoldID = hh.HouseHoldID
                LEFT JOIN datacenter mem
                    ON hh.HouseHoldID = mem.HouseHoldID
                WHERE dc.isActive = 1
                        AND dc.DataCenterID = '$ID'
        ";

    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();