<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';

    $ID = $_POST["HouseHoldID"];
    $DateFrom = $_POST["txtDateFrom"];
    $DateTo = $_POST["txtDateTo"];

    $query = "SELECT
                vl.VLID,
                CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as VisitorName,
                vl.RequestDateTime,
                vl.ReasonForVisit,
                CASE    
                    WHEN vl.isApproved = 1 THEN
                        CASE 
                            WHEN ISNULL(app.DataCenterID) = 1 THEN
                                'WHITELISTED'
                            ELSE 
                                CONCAT(app.FirstName, ' ', app.MiddleName, ' ', app.LastName, ' ', app.Suffix)
                            END
                    ELSE ''
                    END as ApprovedBy,
                IFNULL(vl.ApprovedDateTime, '') as ApprovedDateTime,
                CASE 
                    WHEN vl.isApproved = 1 THEN
                        'APPROVED'
                    WHEN vl.isActive = 0 THEN
                        'REJECTED'
                    ELSE
                        'PENDING'
                    END as VisitStatus
                FROM VisitorLogs vl
                    LEFT JOIN datacenter dc
                        ON vl.VisitorID = dc.DataCenterID
                    LEFT JOIN datacenter app
                        ON vl.ApprovedBy = app.DataCenterID
                WHERE   vl.HouseHoldID = '$ID'
                        AND (CONVERT(vl.RequestDateTime, DATE) >= '$DateFrom' AND CONVERT(vl.RequestDateTime, DATE) <= '$DateTo')
                ORDER BY vl.RequestDateTime DESC
            ";
    
    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();