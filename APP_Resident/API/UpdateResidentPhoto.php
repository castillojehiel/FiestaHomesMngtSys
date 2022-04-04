<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';

    $Base64 = $_POST["Base64"];
    $ExtName = $_POST["ExtName"];
    $DataCenterID = $_POST["DataCenterID"];

    $query = "UPDATE datacenter
                    SET
                        DataCenterPhoto = '$Base64',
                        PhotoExt = '$ExtName'
                WHERE DataCenterID = '$DataCenterID'
                ";
    $sql = $conn -> query($query);

    //parse return value
    echo json_encode(array("result" => $sql));

    $conn -> close();