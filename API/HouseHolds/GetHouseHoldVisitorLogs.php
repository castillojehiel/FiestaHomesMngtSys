<?php
    require '../Connection.php';

    $ID = $_POST["ID"];
    $DateFrom = $_POST["txtDateFrom"];
    $DateTo = $_POST["txtDateTo"];

    $query = "SELECT
                vl.VLID,
                CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as VisitorName,
                vl.RequestDateTime,
                vl.ReasonForVisit,
                CONCAT(app.FirstName, ' ', app.MiddleName, ' ', app.LastName, ' ', app.Suffix) as ApprovedBy,
                vl.ApprovedDateTime
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