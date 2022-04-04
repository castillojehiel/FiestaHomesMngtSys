<?php
    require '../Connection.php';
    $UpdatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$UpdatedBy = $_SESSION["UserID"];
    }
    $HouseHoldNo = $_POST["txtHouseNo"];
    $Street = $_POST["txtStreet"];
    $HouseHoldName = $_POST["txtHouseHoldName"];
    $ID = $_POST["txtID"];
    $isActive = true;
    if(isset($POST["chkIsActive"])){
		$isActive = $POST["chkIsActive"];
	}
    $HouseHoldMembers = json_decode($_POST["HouseHoldMembers"]);

    $query = "UPDATE households
                SET
                    HouseHoldName = '$HouseHoldName', 
                    Street = '$Street', 
                    HouseNo = '$HouseHoldNo', 
                    isActive = '$isActive', 
                    UpdatedBy = $UpdatedBy, 
                    UpdatedDateTime = CURRENT_TIMESTAMP()
                WHERE HouseHoldID = '$ID'
                ";
    $sql = $conn -> query($query);

    //delete old contact persons
    $query1 = "DELETE FROM householdcontactpersons WHERE HouseHoldID = '$ID'";
    $conn -> query($query1);

    //insert contact persons
    $prepQuery = $conn -> prepare("INSERT INTO householdcontactpersons (HouseHoldID, ResidentID, isActive, CreatedBy)
                    VALUES(?,?,?,?)");
    $prepQuery -> bind_param("iiii", $ID, $DCID, $active, $CBy);
	//insert line
	foreach($HouseHoldMembers as $item){
		$data = get_object_vars($item);
		if($data["isContactPerson"] == 1){
            $ID = $ID;
            $DCID = $data["DataCenterID"];
            $active = intval($isActive);
            $CBy = $UpdatedBy;
            $prepQuery -> execute();
        }
	}

     //update member datacenter details to reset resident id
     $prepQuery = "UPDATE datacenter SET HouseHoldID = 0 WHERE HouseHoldID ='$ID'";
     $conn -> query($prepQuery);
     

    //update member datacenter details
    $prepQuery = $conn -> prepare("UPDATE datacenter SET HouseHoldID = ? WHERE DataCenterID =?");
    $prepQuery -> bind_param("ii", $ID, $DCID);
	foreach($HouseHoldMembers as $item){
		$data = get_object_vars($item);
        $ID = $ID;
        $DCID = $data["DataCenterID"];
        $prepQuery -> execute();
	}


    echo json_encode(array("result" => $sql));

	$conn -> close();