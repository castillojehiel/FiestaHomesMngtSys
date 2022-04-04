<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';

    $VLID = $_POST["VLID"];

    $query = "UPDATE    visitorlogs
                SET 
                    isActive = 0
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