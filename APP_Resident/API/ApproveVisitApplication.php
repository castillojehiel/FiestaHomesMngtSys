<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';

    $Approver = $_POST["ApprovedBy"];
    $VLID = $_POST["VLID"];

    $query = "UPDATE    visitorlogs
                SET 
                    isApproved = 1,
                    ApprovedBy = '$Approver',
                    ApprovedDateTime = CURRENT_TIMESTAMP
                WHERE VLID = '$VLID'
                ";
    $sql = $conn -> query($query);

    echo json_encode(
        array(
            "result" => $sql,
            "message" => $conn -> error
        )
    );

    $conn -> close();