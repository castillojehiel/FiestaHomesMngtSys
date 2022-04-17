<?php
	header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    include 'sms.php';
    $VisitorID = $_POST["txtVisitorID"];
    $VisitorQRCode = $_POST["txtVisitorQRCode"];
    $HouseholdID = $_POST["txtHouseHoldID"];
    $Reason = $_POST["txtReasonForVisit"];
    $Scanner = $_POST["ScannedByUser"];
    $LogType = $_POST["LogType"];
	$isWhiteListed = false;
	$isBlackListed = false;

    $query = "INSERT INTO 
                VisitorLogs(
                        VisitorID, 
                        isApproved,
                        isActive,
                        RequestDateTime,
                        ScannedBy,
                        HouseHoldID,
                        ReasonForVisit
                        )
                VALUES(
                        '$VisitorID',
                        0,
                        1,
                        CURRENT_TIMESTAMP,
                        '$Scanner',
                        '$HouseholdID',
                        '$Reason'
                    )
            ";

    $sql = $conn -> query($query);

	$VLID = $conn -> insert_id;

	$querya = "INSERT INTO gatepasslogs(
			DataCenterID,
			QRCode,
			ScannedBy,
			CreatedBy,
			CreatedDateTime
			LogType
		)
		VALUES (
			'$DataCenterID',
			'$QRCode',
			'$Scanner',
			'$Scanner',
			CURRENT_TIMESTAMP,
			'$LogType'
		)
	";
	$sql = $conn -> query($querya);


    $query1 = "INSERT INTO scannerlogs (Module, UserID, ScanValue, CreatedDateTime) VALUES ('GATEPASS', '$Scanner', '$VisitorQRCode', CURRENT_TIMESTAMP)";
    $conn -> query($query1);



    $query2 = "SELECT COUNT(*) as isWhiteListed FROM visitorwhitelist WHERE VisitorID = '$VisitorID' AND HouseholdID = '$HouseholdID'";
	$sql2 = $conn -> query($query2);
	$data2 = $sql2 -> fetch_assoc();
	if($sql2 -> num_rows > 0){
		if($data2["isWhiteListed"] > 0)
		{
			$isWhiteListed = true;
			//update approved visitation
			$query2 = "UPDATE    visitorlogs
						SET 
							isApproved = 1,
							ApprovedBy = 0,
							ApprovedDateTime = CURRENT_TIMESTAMP
						WHERE VLID = '$VLID'
			";
			$conn -> query($query2);
		}
	}

	$query2 = "SELECT COUNT(*) as isBlackListed FROM visitorblacklist WHERE VisitorID = '$VisitorID' AND HouseholdID = '$HouseholdID'";
	$sql2 = $conn -> query($query2);
	$data2 = $sql2 -> fetch_assoc();
	if($sql2 -> num_rows > 0){
		if($data2["isBlackListed"] > 0)
		{
			$isBlackListed = true;
			//update reject visitation
			$query2 = "UPDATE    visitorlogs
						SET 
							isActive = 0
						WHERE VLID = '$VLID'
						";
			$conn -> query($query2);
		}
	}

	////send SMS
	if($isWhiteListed){
		SendSMSToHouseHoldContactPersons($HouseholdID, "A visitor you have whitelisted has been allowed access on gate. Check app to see full details.");
	}
	else if($isBlackListed){
		SendSMSToHouseHoldContactPersons($HouseholdID, "A visitor you have blacklisted has been rejected access on gate. Check app to see full details.");
	}
	else if($sql){
		SendSMSToHouseHoldContactPersons($HouseholdID, "A visitor is requiring approval to be allowed gate access. Please check on app to see full details and select appropriate action.");
	}

    echo json_encode(array("result" => $sql, 'isWhiteListed' => $isWhiteListed, 'isBlackListed' => $isBlackListed));

    $conn -> close();