<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $keyword = $_POST["txtSearch"];

    $query = "SELECT 
                    rr.ReportTypeID,
                    rr.Description,
                    rr.isActive, 
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    rr.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    rr.UpdatedDateTime
                FROM reporttypes rr
                LEFT JOIN datacenter cb
                    ON rr.CreatedBy = cb.DataCenterID
                LEFT JOIN datacenter ub
                    ON rr.CreatedBy = ub.DataCenterID
                WHERE   Description LIKE '%$keyword%'
                        AND isActive = 1
            ";

    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();