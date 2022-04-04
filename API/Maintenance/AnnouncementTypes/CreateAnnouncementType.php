<?php
    require '../../Connection.php';

    $Descrpiption = $_POST["txtDescription"];
    $isActive = true;
    if(isset($POST["chkIsActive"])){
		$isActive = $POST["chkIsActive"];
	}
    $CreatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$CreatedBy = $_SESSION["UserID"];
    }

    $query = "INSERT INTO announcementtypes (Description, isActive, CreatedBy, CreatedDateTime)
            VALUES ('$Descrpiption', '$isActive', '$CreatedBy', CURRENT_TIMESTAMP)";
    $sql = $conn -> query($query);

    echo json_encode(array("result" => $sql));

    $conn -> close();
