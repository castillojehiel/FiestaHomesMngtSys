<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_GET["ID"];

    $query = "SELECT
                vl.*,
                hh.HouseHoldName,
                CASE 
                    WHEN vl.isApproved = 1 THEN 'APPROVED'
                    WHEN vl.isActive = 0 THEN 'REJECTED'
                    ELSE 'PENDING'
                END as VisitStatus
                FROM visitorlogs vl
                LEFT JOIN households hh
                    ON vl.HouseHoldID = hh.HouseHoldID
                WHERE   vl.VisitorID = '$ID'
                        AND (CONVERT(vl.RequestDateTime, DATE) >= CONVERT(CURRENT_TIMESTAMP, DATE) AND CONVERT(vl.RequestDateTime, DATE) <= CONVERT(CURRENT_TIMESTAMP, DATE))
                        AND vl.isApproved = 0
                        AND vl.isActive = 1
                GROUP BY hh.HouseHoldID
                ORDER BY RequestDateTime DESC
                ";
    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();