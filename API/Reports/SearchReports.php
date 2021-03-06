<?php
    require '../Connection.php';
    $keyword = $_POST["txtSearch"];

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
                        WHEN ReportStatus = 'REJECT' OR ReportStatus = 'RESOLVED'  THEN false
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
                WHERE   (
                            CONCAT('REP', ReportID) LIKE '%$keyword%'
                            OR
                            CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) LIKE '%$keyword%'
                        )
                ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();