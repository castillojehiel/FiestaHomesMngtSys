<?php
    require '../Connection.php';

    $ID = $_POST["ID"];
    $DateFrom = $_POST["txtDateFrom"];
    $DateTo = $_POST["txtDateTo"];

    $query = "SELECT
                gpl.GPLogID,
                CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as MemberName,
                gpl.CreatedDateTime as DateOfLogs 
                FROM gatepasslogs gpl
                LEFT JOIN datacenter dc
                    ON gpl.DataCenterID = dc.DataCenterID
                LEFT JOIN households hh
                    ON dc.HouseHoldID = hh.HouseHoldID
                WHERE   hh.HouseHoldID = '$ID'
                        AND (CONVERT(gpl.CreatedDateTime, DATE) >= '$DateFrom' AND CONVERT(gpl.CreatedDateTime, DATE) <= '$DateTo')
                ORDER BY gpl.CreatedDateTime DESC
            ";
    
    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();