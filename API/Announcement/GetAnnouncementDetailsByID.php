<?php
    require '../Connection.php';
    $ID = $_GET["ID"];

    $query = "SELECT
                ann.AnnouncementID, 
                ann.ATID, 
                ann.Title, 
                ann.Details, 
                ann.isActive, 
                ann.isPublished, 
                CONCAT(pb.FirstName, ' ', pb.MiddleName, ' ', pb.LastName)  as PublishedBy,
                ann.PublishedDateTime, 
                CONCAT(upb.FirstName, ' ', upb.MiddleName, ' ', upb.LastName) as UnpublishedBy,
                ann.UnpublishedDateTime, 
                ann.ExpiryDate,
                CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                ann.CreatedDateTime,
                CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                ann.UpdatedDateTime,
                CASE 
                    WHEN ann.isActive = 0 THEN 'Inactive'
                    WHEN CONVERT(ann.ExpiryDate, DATE) <= CONVERT(CURRENT_TIMESTAMP, DATE) THEN 'Expired'
                    WHEN ann.isActive = 1 AND ann.isPublished = 1 THEN 'Published'
                    WHEN ann.isActive = 1 AND IFNULL(ann.isPublished,0) = 0 THEN 'Active - Pending'
                END as AnnouncementStatus,
                annType.Description as AnnouncementType

                FROM announcements ann
                LEFT JOIN announcementtypes annType
                    ON ann.ATID = annType.ATID
                LEFT JOIN useraccount cb
                    ON ann.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON ann.UpdatedBy = ub.UserID
                LEFT JOIN useraccount pb
                    ON ann.PublishedBy = pb.UserID
                LEFT JOIN useraccount upb
                    ON ann.UnpublishedBy = upb.UserID
                WHERE   AnnouncementID = '$ID'
        ";

    $sql = $conn -> query($query);

    $data = $sql -> fetch_assoc();

    echo json_encode($data);

    $conn -> close();