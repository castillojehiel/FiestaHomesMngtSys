<?php
    require '../../Connection.php';
    $ID = $_GET["ID"];

    $query = "SELECT 
                    annT.ATID,
                    annT.Description,
                    annT.isActive, 
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    annT.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    annT.UpdatedDateTime
                FROM announcementtypes annT
                LEFT JOIN useraccount cb
                    ON annT.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON annT.UpdatedBy = ub.UserID
                WHERE ATID = '$ID'
            ";

    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();

    echo json_encode($data);

    $conn -> close();