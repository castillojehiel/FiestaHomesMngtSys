<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $Username = $_POST["txtUsername"];
    $UserPass = $_POST["txtPassword"];
    $query = " SELECT
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
                    dc.isResident,
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    dc.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    dc.UpdatedDateTime,
                    h.HouseHoldName as HouseHold,
                    CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as VisitorName,
                    dc.Userpass
                FROM datacenter dc
                LEFT JOIN households h
                    ON dc.HouseHoldID = h.HouseHoldID
                LEFT JOIN datacenter cb
                    ON dc.CreatedBy = cb.DataCenterID
                LEFT JOIN datacenter ub
                    ON dc.CreatedBy = ub.DataCenterID
                WHERE   dc.isActive = 1
                        AND dc.isResident = 0  
                        AND (dc.QRCode = '$Username' OR dc.EmailAddress = '$Username')
                        AND dc.UserPass = '$UserPass'
    ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();

    echo json_encode($data);

    $conn -> close();