<?php
    require '../Connection.php';
    $CreatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$CreatedBy = $_SESSION["UserID"];
    }
    $HouseHoldNo = $conn -> real_escape_string($_POST["txtHouseNo"]);
    $Street = $conn -> real_escape_string($_POST["txtStreet"]);
    $HouseHoldName = $conn -> real_escape_string($_POST["txtHouseHoldName"]);
    $BlockNo = $conn -> real_escape_string($_POST["txtBlockNo"]);
    $isActive = true;
    if(isset($POST["chkIsActive"])){
		$isActive = $POST["chkIsActive"];
	}
    $HouseHoldMembers = json_decode($_POST["HouseHoldMembers"]);

    $query = "INSERT INTO households(HouseHoldName, Street, HouseNo, isActive, CreatedBy, CreatedDateTime, BlockNo)
                VALUES(
                    '$HouseHoldName',
                    '$Street',
                    '$HouseHoldNo',
                    '$isActive',
                    '$CreatedBy',
                    CURRENT_TIMESTAMP(),
                    '$BlockNo'
                )
                ";
    $sql = $conn -> query($query);

    $id = $conn -> insert_id;

    //insert contact persons
    $prepQuery = $conn -> prepare("INSERT INTO householdcontactpersons (HouseHoldID, ResidentID, isActive, CreatedBy)
                    VALUES(?,?,?,?)");
    $prepQuery -> bind_param("iiii", $ID, $DCID, $active, $CBy);
	//insert line
	foreach($HouseHoldMembers as $item){
		$data = get_object_vars($item);
		if(filter_var($data["isContactPerson"], FILTER_VALIDATE_BOOLEAN)){
            $ID = $id;
            $DCID = $data["DataCenterID"];
            $active = intval($isActive);
            $CBy = $CreatedBy;
            $prepQuery -> execute();
        }
	}

    //update member datacenter details
    $prepQuery = $conn -> prepare("UPDATE datacenter SET HouseHoldID = ?, RelationshipToHomeowner = ? WHERE DataCenterID =?");
    $prepQuery -> bind_param("isi", $ID, $Relationship, $DCID);
	foreach($HouseHoldMembers as $item){
		$data = get_object_vars($item);
        $ID = $id;
        $Relationship = $data["Relationship"];
        $DCID = $data["DataCenterID"];
        $prepQuery -> execute();
	}


    echo json_encode(array("result" => $sql));

	$conn -> close();