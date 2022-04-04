<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_GET["ID"];
    $query = "  SELECT
                    vl.VisitorID ,
                    dc.FirstName,
                    dc.MiddleName,
                    dc.LastName,
                    dc.Suffix,
                    dc.Gender,
                    dc.BirthDate,
                    dc.ContactNo,
                    dc.EmailAddress,
                    dc.HouseHoldID,
                    dc.QRCode,
                    dc.isActive,
                    CASE 
                        WHEN dc.isActive = 1 THEN 'Active'
                        ELSE 'Inactive'
                        END as RecordStatus,
                    dc.isResident,
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    ann.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    ann.UpdatedDateTime,
                    CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as VisitorName,
                    CASE WHEN vw.VWID IS NOT NULL THEN true ELSE false END as isWhiteListed,
                    CASE WHEN vb.VBID IS NOT NULL THEN true ELSE false END as isBlackListed,
                    vw.VWID,
                    vb.VBID
                FROM VisitorLogs vl
                LEFT JOIN datacenter dc
                    ON vl.VisitorID = dc.DataCenterID
                LEFT JOIN visitorwhitelist vw
                    ON vl.VisitorID = vw.VisitorID
                LEFT JOIN visitorblacklist vb
                    ON vl.VisitorID = vb.VisitorID
                LEFT JOIN useraccount cb
                    ON dc.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON dc.UpdatedBy = ub.UserID
                WHERE vl.HouseHoldID = '$ID'
                GROUP BY vl.VisitorID 
                ORDER BY dc.FirstName, dc.MiddleName, dc.LastName ASC          
    ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();