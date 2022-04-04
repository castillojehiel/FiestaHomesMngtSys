<?php
    require '../Connection.php';

    $ID = $_POST["ID"];
    $UpdatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$UpdatedBy = $_SESSION["UserID"];
    }
    

    $query = "UPDATE announcements 
                SET
                    isPublished = 1,
                    PublishedBy = '$UpdatedBy',
                    PublishedDateTime = CURRENT_TIMESTAMP
                WHERE AnnouncementID = '$ID'
            ";
    $sql = $conn -> query($query);
    
    echo json_encode(array("result" => $sql));

	$conn -> close();
    