<?php
    require '../Connection.php';
    $keyword = $_POST["txtSearch"];

    $query = "SELECT
                ann.AnnouncementID, 
                ann.ATID, 
                ann.Title, 
                ann.Details, 
                ann.isActive, 
                ann.isPublished, 
                CONCAT(pb.FirstName, ' ', pb.MiddleName, ' ', pb.LastName)  as PublishedBy,
                ann.PublishedDateTime, 
                CASE 
                    WHEN ann.PublishedDateTime IS NOT NULL THEN
                        pb.UserPosition
                    ELSE ''
                END as PublishedByPosition,
                CONCAT(upb.FirstName, ' ', upb.MiddleName, ' ', upb.LastName) as UnpublishedBy,
                ann.UnpublishedDateTime, 
                CASE 
                    WHEN ann.UnpublishedDateTime IS NOT NULL THEN
                        upb.UserPosition
                    ELSE ''
                END as UnpublishedByPosition,
                ann.ExpiryDate,
                CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                ann.CreatedDateTime,
                cb.UserPosition as CreatedByPosition,
                CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                ann.UpdatedDateTime,
                CASE 
                    WHEN ann.UpdatedDateTime IS NOT NULL THEN
                        ub.UserPosition
                    ELSE ''
                END as UpdatedByPosition,
                CASE 
                    WHEN ann.isActive = 0 THEN 'Inactive'
                    WHEN CONVERT(ann.ExpiryDate, DATE) <= CONVERT(CURRENT_TIMESTAMP, DATE) THEN 'Expired'
                    WHEN ann.isActive = 1 AND ann.isPublished = 1 THEN 'Published'
                    WHEN ann.isActive = 1 AND IFNULL(ann.isPublished,0) = 0 THEN 'Active - Pending'
                END as AnnouncementStatus,
                annType.Description as AnnouncementType,
                CASE
                    WHEN    (ann.isActive = 1
                            AND IFNULL(ann.isPublished,0) = 0
                            
                            AND (CONVERT(ann.ExpiryDate, DATE) > CONVERT(CURRENT_TIMESTAMP, DATE)) 
                            )
                                THEN true
                    ELSE false  
                END isAllowPublish,
                CASE
                    WHEN    ann.isActive = 1 
                            AND IFNULL(ann.isPublished,0) = 1
                            AND (CONVERT(ann.ExpiryDate, DATE) > CONVERT(CURRENT_TIMESTAMP, DATE)) 
                                THEN true
                    ELSE false  
                END isAllowUnpublish

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
                WHERE   Title LIKE '%$keyword%'
        ";

    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();