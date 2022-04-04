<?php
    require '../Connection.php';
    $id = $_GET["ID"];

    $query = "SELECT 
                hh.HouseHoldID, 
                hh.HouseHoldName, 
                hh.HouseNo, 
                hh.Street, 
                hh.isActive, 
                CASE 
                    WHEN hh.isActive = 1 THEN 'Active'
                    ELSE 'Inactive'
                END as RecordStatus,
                CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                hh.CreatedDateTime,
                CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                hh.UpdatedDateTime  
                FROM households hh
                LEFT JOIN useraccount cb
                    ON hh.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON hh.UpdatedBy = ub.UserID
                WHERE hh.HouseHoldID = '$id'
                ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();

    echo json_encode($data); 

    $conn -> close();