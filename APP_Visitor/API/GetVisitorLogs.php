<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_GET["ID"];
    $DateFrom = $_GET["DateFrom"];
    $DateTo = $_GET["DateTo"];
    $HouseHoldID = $_GET["HouseHoldID"];

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
                        AND (CONVERT(vl.RequestDateTime, DATE) >= '$DateFrom' AND CONVERT(vl.RequestDateTime, DATE) <= '$DateTo')
                        AND ((vl.isApproved = 1 AND vl.isActive = 1) OR (vl.isActive = 0))
                        AND vl.HouseHoldID = (CASE WHEN '$HouseHoldID' = 0 THEN vl.HouseHoldID ELSE vl.HouseHoldID END)
                ORDER BY RequestDateTime DESC
                ";
    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();