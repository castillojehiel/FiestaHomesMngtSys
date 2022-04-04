<?php
    require '../Connection.php';
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
                    CONCAT(resB.FirstName, ' ', resB.MiddleName, ' ', resB.LastName) as ResolvedBy, 
                    rr.ResolvedDateTime, 
                    rr.RejectionRemarks,
                    CONCAT(rejB.FirstName, ' ', rejB.MiddleName, ' ', rejB.LastName) as RejectedBy, 
                    rr.RejectedDateTime,
                    rr.isActive, 
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    rr.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    rr.UpdatedDateTime ,
                    rt.Description as ReportType,
                    CASE 
                        WHEN ReportStatus = 'REJECT' OR ReportStatus = 'RESOLVED' OR ReportStatus = 'ACKNOWLEDGE' THEN false
                        ELSE true
                    END as isAllowUpdateStatus
                FROM residentreports rr
                LEFT JOIN reporttypes rt
                    ON rr.ReportTypeID = rt.ReportTypeID
                LEFT JOIN useraccount ab
                    ON rr.AcknowledgedBy = ab.UserID
                LEFT JOIN useraccount resB
                    ON rr.ResolvedBy = resb.UserID
                LEFT JOIN useraccount regB
                    ON rr.RejectedBy = regB.UserID
                LEFT JOIN useraccount cb
                    ON rr.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON rr.UpdatedBy = ub.UserID
                WHERE   rr.isActive = 1
                ORDER BY rr.ReportID
                LIMIT 10
                ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();