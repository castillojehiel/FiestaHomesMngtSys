<?php
    require '../../Connection.php';
    $keyword = $_POST["txtSearch"];

    $query = "SELECT 
                    ann.ATID,
                    ann.Description,
                    ann.isActive, 
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    ann.CreatedDateTime,
                    cb.UserPosition as CreatedByPosition,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    ann.UpdatedDateTime,
                    ub.UserPosition as UpdatedByPosition
                FROM announcementtypes ann
                LEFT JOIN useraccount cb
                    ON ann.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON ann.UpdatedBy = ub.UserID
                WHERE Description LIKE '%$keyword%'
            ";

    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();