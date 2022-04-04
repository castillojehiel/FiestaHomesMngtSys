<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';

    $BlackListID = $_POST["VBID"];

    $query = "DELETE FROM visitorblacklist WHERE VBID = '$BlackListID'";

    $sql = $conn -> query($query);

    //parse return value
    echo json_encode(array("result" => $sql));

    $conn -> close();