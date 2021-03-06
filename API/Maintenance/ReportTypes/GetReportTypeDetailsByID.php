<?php
    require '../../Connection.php';
    $ID = $_GET["ID"];

    $query = "SELECT 
                    ReportTypeID,
                    Description,
                    isActive, 
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    ann.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    ann.UpdatedDateTime
                FROM reporttypes ann
                LEFT JOIN useraccount cb
                    ON ann.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON ann.UpdatedBy = ub.UserID
                WHERE ReportTypeID = '$ID'
            ";

    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();

    echo json_encode($data);

    $conn -> close();