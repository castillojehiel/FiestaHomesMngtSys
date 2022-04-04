<?php
    require '../Connection.php';

    $residentQuery = "SELECT COUNT(*) as resCount FROM datacenter WHERE isResident = 1 AND isActive = 1";
    $residentSql = $conn -> query($residentQuery);
    $residentData = $residentSql -> fetch_assoc();

    $visitorQuery = "SELECT COUNT(*) as visCount FROM datacenter WHERE isResident = 0 AND isActive = 1";
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