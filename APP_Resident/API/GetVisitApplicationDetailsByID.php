<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_GET["ID"];

    $query = "SELECT
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
                dc.CreatedDateTime,
                CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                dc.UpdatedDateTime,
                CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as VisitorName,
                vl.ReasonForVisit
            FROM VisitorLogs vl
            LEFT JOIN datacenter dc
                ON vl.VisitorID = dc.DataCenterID
            LEFT JOIN datacenter cb
                ON rr.CreatedBy = cb.DataCenterID
            LEFT JOIN datacenter ub
                ON rr.CreatedBy = ub.DataCenterID
            WHERE   vl.VLID = '$ID'
            ";
    $sql = $conn -> query($query);

    $data = $sql -> fetch_assoc();

    echo json_encode($data);

    $conn -> close();