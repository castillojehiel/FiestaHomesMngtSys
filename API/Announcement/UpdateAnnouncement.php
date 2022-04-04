<?php
    require '../Connection.php';

    $ID = $_POST["txtID"];
    $AnnouncementType = $_POST["cboAnnouncementType"];
    $Title = $conn -> real_escape_string($_POST["txtTitle"]);
    $ExpiryDate = $_POST["txtExpiryDate"];
    $Details = $conn -> real_escape_string($_POST["txtDetails"]);
    $UpdatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$UpdatedBy = $_SESSION["UserID"];
    }
    $isActive = true;
    if(isset($POST["chkIsActive"])){
		$isActive = $POST["chkIsActive"];
	}

    $query = "UPDATE announcements 
                SET
                    ATID = '$AnnouncementType',
                    Title = '$Title',
                    Details = '$Details',
                    isActive = '$isActive',
                    ExpiryDate = '$ExpiryDate',
                    UpdatedBy = '$UpdatedBy',
                    UpdatedDateTime = CURRENT_TIMESTAMP
                WHERE AnnouncementID = '$ID'
            ";
    $sql = $conn -> query($query);
    
    echo json_encode(array("result" => $sql));

	$conn -> close();
    