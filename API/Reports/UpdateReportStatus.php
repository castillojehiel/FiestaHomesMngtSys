<?php
    require '../Connection.php';
    $ID = $_POST["ReportID"];
    $Status = $_POST["cboStatus"];
    $Remarks = $_POST["txtUpdateStatusRemarks"];
    $UpdatedBy = 1;
	if(isset($_SESSION["UserID"])){
		$UpdatedBy = $_SESSION["UserID"];
    }

    $query = "";
    if($Status == "ACKNOWLEDGE"){
        $query = " UPDATE residentreports
                        SET
                        ReportAcknowledgementRemarks = '$Remarks',
                        AcknowledgedBy = '$UpdatedBy',
                        AcknowledgedDateTime = CURRENT_TIMESTAMP,
                        ReportStatus = '$Status'
                    WHERE ReportID = '$ID'
                ";
    }
    else if($Status == "REJECT"){
        $query = " UPDATE residentreports
                        SET
                        RejectionRemarks = '$Remarks',
                        RejectedBy = '$UpdatedBy',
                        RejectedDateTime = CURRENT_TIMESTAMP,
                        ReportStatus = '$Status'
                    WHERE ReportID = '$ID'
                ";
    }
    else if($Status == "RESOLVED"){
        $query = " UPDATE residentreports
                        SET
                        ReportResolveRemarks = '$Remarks',
                        ResolvedBy = '$UpdatedBy',
                        ResolvedDateTime = CURRENT_TIMESTAMP,
                        ReportStatus = '$Status'
                    WHERE ReportID = '$ID'
                ";
    }

    $sql = $conn -> query($query);

    echo json_encode(array("result" => $sql));

    $conn -> close();