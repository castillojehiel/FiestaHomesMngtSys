<?php
    require '../Connection.php';
    $keyword = $_POST["txtSearch"];

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
                    CASE
                        WHEN dc.isNonUserRegistered = 0 THEN
                            CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName)
                        ELSE
                            CONCAT(dccb.FirstName, ' ', dccb.MiddleName, ' ', dccb.LastName)
                    END as CreatedBy,
                    dc.CreatedDateTime,
                    CASE
                        WHEN dc.isNonUserRegistered = 0 THEN
                            CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName)
                        ELSE
                            CONCAT(dcub.FirstName, ' ', dcub.MiddleName, ' ', dcub.LastName)
                    END as UpdatedBy,
                    dc.UpdatedDateTime,
                    CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as ResidentName,
                    FALSE as isContactPerson,
                    TIMESTAMPDIFF(YEAR, dc.BirthDate, CURDATE()) AS Age
                FROM datacenter dc
                LEFT JOIN households h
                    ON dc.HouseHoldID = h.HouseHoldID
                LEFT JOIN useraccount cb
                    ON dc.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON dc.UpdatedBy = ub.UserID
                LEFT JOIN datacenter dccb
                    ON dc.CreatedBy = dccb.DataCenterID
                LEFT JOIN datacenter dcub
                    ON dc.UpdatedBy = dcub.DataCenterID
                WHERE   dc.isResident = 1 
                        AND dc.isActive = 1
                        AND CONCAT(dc.FirstName, ' ', dc.LastName) LIKE '%$keyword%'
                        AND h.HouseHoldID IS NULL
                ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data); 

    $conn -> close();