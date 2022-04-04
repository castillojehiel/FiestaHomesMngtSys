<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $QRCode = $_POST["QRCode"];

    $query = "SELECT 
                    dc.DataCenterID,
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
                    dc.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    dc.UpdatedDateTime,
                    h.HouseHoldName as HouseHold,
                    CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as VisitorCompleteName
                FROM datacenter dc
                LEFT JOIN households h
                    ON dc.HouseHoldID = h.HouseHoldID
                LEFT JOIN useraccount cb
                    ON dc.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON dc.UpdatedBy = ub.UserID
                WHERE   dc.isActive = 1
                        AND dc.QRCode = '$QRCode'
                ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();

    echo json_encode($data); 

    $conn -> close();