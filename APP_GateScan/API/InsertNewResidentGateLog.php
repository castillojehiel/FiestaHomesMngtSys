<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $QRCode = $_POST["QRCode"];
    $Scanner = $_POST["ScannedByUser"];

    //check and get datacenter details based on qrcode
    $query = "SELECT * FROM datacenter WHERE  QRCode = '$QRCode'";
    $sql = $conn -> query($query);
    
    if($sql -> num_rows > 0){

        $DCData = $sql -> fetch_assoc();

        $DataCenterID = $DCData["DataCenterID"];

        $query = "INSERT INTO gatepasslogs(
                        DataCenterID,
                        QRCode,
                        ScannedBy,
                        CreatedBy,
                        CreatedDateTime

                    )
                    VALUES (
                        '$DataCenterID',
                        '$QRCode',
                        '$Scanner',
                        '$Scanner',
                        CURRENT_TIMESTAMP
                    )
                ";
        $sql = $conn -> query($query);

        $query1 = "INSERT INTO scannerlogs (Module, UserID, ScanValue, CreatedDateTime) VALUES ('GATEPASS', '$Scanner', '$QRCode', CURRENT_TIMESTAMP)";
        $conn -> query($query1);

        echo json_encode(array("result" => $sql, "message" => ($sql == true ? "Log saved." : "Failed to save log.")));

    }
    else{
        echo json_encode(array("result" => false, "message" => "QRCode could not be found in the database."));
    }

    $conn -> close();