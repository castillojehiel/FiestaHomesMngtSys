<?php
    require '../Connection.php';

    $residentQuery = "SELECT COUNT(*) as resCount FROM datacenter WHERE isResident = 1 AND isActive = 1";
    $residentSql = $conn -> query($residentQuery);
    $residentData = $residentSql -> fetch_assoc();

    $visitorQuery = "SELECT COUNT(DISTINCT dc.DatacenterID) as visCount 
                        FROM datacenter dc
                        LEFT JOIN gatepasslogs gpl  
                            ON dc.DatacenterID = gpl.DatacenterID
                        WHERE   dc.isResident = 0 AND dc.isActive = 1
                                AND (MONTH(gpl.CreatedDateTime) = MONTH(CURRENT_TIMESTAMP()) AND YEAR(gpl.CreatedDateTime) = YEAR(CURRENT_TIMESTAMP()))
                        GROUP BY dc.DatacenterID ";
    $visitorSql = $conn -> query($visitorQuery);
    $visitorData = $visitorSql -> fetch_assoc();

    $hhQuery = "SELECT COUNT(*) as hhCount FROM households WHERE isActive = 1";
    $hhSql = $conn -> query($hhQuery);
    $hhData = $hhSql -> fetch_assoc();


    echo json_encode (
        array(
            "ResidentCount" => $residentData["resCount"],
            "VisitorCount" => $visitorData["visCount"],
            "HouseholdCount" => $hhData["hhCount"]
        )
    );

    $conn -> close();