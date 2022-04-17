<?php
    require '../../Connection.php';
    $keyword = $_POST["txtSearch"];
    $isShowAll = true;
    if(isset($_POST["isShowAll"])){
        $isShowAll = $_POST["isShowAll"];
    }

    $query = "SELECT 
                    ann.ReportTypeID,
                    ann.Description,
                    ann.isActive, 
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    ann.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    ann.UpdatedDateTime
                FROM reporttypes ann
                LEFT JOIN useraccount cb
                    ON ann.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON ann.UpdatedBy = ub.UserID
                WHERE Description LIKE '%$keyword%'
                AND ann.isActive = (CASE WHEN '$isShowAll' = true THEN ann.isActive ELSE 1 END)
            ";

    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();