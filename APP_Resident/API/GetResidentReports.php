<?php
    header("Access-Control-Allow-Origin: *");
    require 'Connection.php';
    $keyword = $_POST["txtSearch"];
    $ID = $_POST["ResidentID"];
    $DateFrom = $_POST["txtDateStart"];
    $DateTo = $_POST["txtDateEnd"];
    $Type = $_POST["cboTypes"];

    $query = "SELECT
                    rr.ReportID, 
                    CONCAT('REP', rr.ReportID) as ReportNo,
                    rr.ReporterID, 
                    rr.ReportTypeID, 
                    rr.ReportDetails, 
                    rr.ReportStatus, 
                    rr.ReportRemarks, 
                    rr.ReportAcknowledgementRemarks,
                    CONCAT(ab.FirstName, ' ', ab.MiddleName, ' ', ab.LastName) as AcknowledgedBy,
                    rr.AcknowledgedDateTime, 
                    rr.ReportResolveRemarks, 
                    CONCAT(rb.FirstName, ' ', rb.MiddleName, ' ', rb.LastName) as ResolvedBy, 
                    rr.ResolvedDateTime, 
                    rr.RejectionRemarks,
                    CONCAT(rejB.FirstName, ' ', rejB.MiddleName, ' ', rejB.LastName) as RejectedBy, 
                    rr.RejectedDateTime,
                    rr.isActive, 
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    rr.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    rr.UpdatedDateTime,
                    rt.Description as ReportType,
                    CASE 
                        WHEN ReportStatus = 'REJECT' OR ReportStatus = 'RESOLVED' OR ReportStatus = 'ACKNOWLEDGE' THEN false
                        ELSE true
                    END as isAllowUpdateStatus
                FROM residentreports rr
                LEFT JOIN reporttypes rt
                    ON rr.ReportTypeID = rt.ReportTypeID
                LEFT JOIN datacenter cb
                    ON rr.CreatedBy = cb.DataCenterID
                LEFT JOIN datacenter ub
                    ON rr.CreatedBy = ub.DataCenterID
                LEFT JOIN useraccount ab
                    ON rr.AcknowledgedBy = ab.UserID
                LEFT JOIN useraccount rb
                    ON rr.ResolvedBy = rb.UserID
                LEFT JOIN useraccount rejB
                    ON rr.RejectedBy = rejB.UserID
                WHERE   rr.ReporterID = '$ID'
                        AND (
                            CONCAT('REP', rr.ReportID) LIKE '%$keyword%'
                            OR
                            rr.ReportDetails LIKE '%$keyword%'
                        )
                        AND rr.ReportTypeID = (CASE WHEN '$Type' > 0 THEN '$Type' ELSE rr.ReportTypeID END)
                        AND (CONVERT(rr.CreatedDateTime, DATE) >= CONVERT('$DateFrom', DATE) AND CONVERT(rr.CreatedDateTime, DATE) <= CONVERT('$DateTo', DATE) )
                        AND rr.isActive = 1
                ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();