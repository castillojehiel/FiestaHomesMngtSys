<?php
header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $Username = $_POST["txtUserName"];
    $UserPass = $_POST["txtUserPassConfirm"];
    $UserID = $_POST["UserID"];

    $query = "UPDATE useraccount
                    SET 
                        Username = '$Username',
                        Userpass = '$UserPass'
                WHERE UserID = '$UserID'
                ";
    $sql = $conn -> query($query);

    echo json_encode(
        array(
            "result" => $sql,
            "message" => $conn -> error
        )
    );

    $conn -> close();