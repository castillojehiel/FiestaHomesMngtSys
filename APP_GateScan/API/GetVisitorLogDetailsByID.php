<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $VLID = $_GET["VLID"];
    $query = "SELECT
                    vl.VLID, 
                    vl.VisitorID, 
                    CONCAT(vis.FirstName, ' ', vis.MiddleName, ' ', vis.LastName) as VisitorName, 
                    vl.isApproved, 
                    vl.isActive,
                    vl.RequestDateTime, 
                    vl.ScannedBy, 
                    CONCAT(ua.FirstName, ' ', ua.MiddleName, ' ', ua.LastName) as UserCompleteName, 
                    vl.HouseHoldID, 
                    hh.HouseHoldName,
                    vl.ApprovedBy, 
                    CONCAT(app.FirstName, ' ', app.MiddleName, ' ', app.LastName) as ApprovedByCompleteName, 
                    vl.ApprovedDateTime,
                    CASE 
                        WHEN vl.isApproved = 1 THEN 'APPROVED'
                        WHEN vl.isActive = 0 THEN 'REJECTED'
                        ELSE 'PENDING'
                    END as VisitStatus,
                    vl.ReasonForVisit
                FROM visitorlogs as vl
                LEFT JOIN Useraccount as ua
                    ON vl.ScannedBy = ua.UserID
                LEFT JOIN datacenter as vis
                    ON vl.VisitorID = vis.DataCenterID
                LEFT JOIN datacenter as  app
                    ON vl.ApprovedBy = app.DataCenterID
                LEFT JOIN households as hh
                    ON vl.HouseHoldID = hh.HouseHoldID
                WHERE   vl.VLID = '$VLID'
        ";
    
    $sql = $conn ->query($query);

    $data = $sql -> fetch_assoc();

    echo json_encode($data);

    $conn -> close();