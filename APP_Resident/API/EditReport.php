<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $ID = $_POST["txtID"];
    $ReporterID = $_POST["ReporterID"];
    $Type = $_POST["cboTypes"];
    $Details = $_POST["txtReportDetails"];
    $Details = $_POST["txtReportDetails"];
    $isActive = true;
    if(isset($POST["chkIsActive"])){
		$isActive = $POST["chkIsActive"];
	}

    $query = "UPDATE residentreports
                SET
                    ReportTypeID = '$Type',
                    ReportDetails = '$Details',
                    UpdatedBy = '$ReporterID',
                    UpdatedDateTime = CURRENT_TIMESTAMP,
                    isActive = '$isActive'
                WHERE   ReportID = '$ID'
                ";

    $sql = $conn -> query($query);

     //parse return value
     echo json_encode(array("result" => $sql));

     $conn -> close();