<?php
    require '../../Connection.php';

    $Description = $_POST["txtDescription"];
    $ID = $_POST["txtID"];
    $isActive = true;
    if(!isset($_POST["chkIsActive"])){
		$isActive = false;
	}
    $UpdatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$UpdatedBy = $_SESSION["UserID"];
    }

    $query = "UPDATE Announcementtypes 
                SET 
                    Description = '$Description', 
                    isActive = '$isActive', 
                    UpdatedBy = '$UpdatedBy', 
                    UpdatedDateTime = CURRENT_TIMESTAMP
                WHERE ATID = '$ID'
                    ";
    $sql = $conn -> query($query);

    echo json_encode(array("result" => $sql));

    $conn -> close();
