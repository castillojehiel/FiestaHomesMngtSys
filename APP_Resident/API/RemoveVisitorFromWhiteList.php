<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';

    $WhiteListID = $_POST["VWID"];

    $query = "DELETE FROM visitorwhitelist WHERE VWID = '$WhiteListID'";

    $sql = $conn -> query($query);

    //parse return value
    echo json_encode(array("result" => $sql));

    $conn -> close();