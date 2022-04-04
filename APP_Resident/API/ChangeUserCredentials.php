<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $UserPass = $_POST["txtUserPassConfirm"];
    $UserID = $_POST["DataCenterID"];

    $query = "UPDATE datacenter
                    SET 
                        Userpass = '$UserPass'
                WHERE DataCenterID = '$UserID'
                ";
    $sql = $conn -> query($query);

    echo json_encode(
        array(
            "result" => $sql,
            "message" => $conn -> error
        )
    );

    $conn -> close();