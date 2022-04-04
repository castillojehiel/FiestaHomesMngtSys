<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_POST["ReporterID"];
    $Type = $_POST["cboTypes"];
    $Details = $_POST["txtReportDetails"];

    $query = "INSERT INTO residentreports(
                        ReporterID,
                        ReportTypeID,
                        ReportDetails,
                        ReportStatus,
                        CreatedBy,
                        CreatedDateTime,
                        isActive
                    )
            VALUES(
                        '$ID',
                        '$Type',
                        '$Details',
                        'PENDING',
                        '$ID',
                        CURRENT_TIMESTAMP,
                        1
                )";

    $sql = $conn -> query($query);

     //parse return value
     echo json_encode(array("result" => $sql));

     $conn -> close();