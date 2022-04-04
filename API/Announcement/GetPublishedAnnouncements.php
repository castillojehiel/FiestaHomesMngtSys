<?php
    require '../Connection.php';
    $keyword = $_POST["txtSearch"];

    $query = "SELECT
                AnnouncementID, 
                ATID, 
                Title, 
                Details, 
                isActive, 
                isPublished, 
                PublishedBy, 
                PublishedDateTime, 
                UnpublishedBy, 
                UnpublishedDateTime, 
                ExpiryDate,
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
                    WHEN isActive = 0 THEN 'Inactive'
                    WHEN CONVERT(ExpiryDate, DATE) >= CONVERT(CURRENT_TIMESTAMP, DATE) THEN 'Expired'
                    WHEN isActive = 1 AND isPublished = 1 THEN 'Published'
                    WHEN isActive = 1 AND IFNULL(isPublished,0) = 0 THEN 'Active - Pending'
                END as AnnouncementStatus

                FROM announcements ann
                LEFT JOIN useraccount cb
                    ON ann.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON ann.UpdatedBy = ub.UserID
                LEFT JOIN useraccount pb
                    ON ann.PublishedBy = pb.UserID
                LEFT JOIN useraccount upb
                    ON ann.UnpublishedBy = upb.UserID
                WHERE   Title LIKE '%$keyword%'
                        AND     isPublished = 1
                        AND     isActive = 1 
                        AND     (CONVERT(ExpiryDate, DATE) >= CONVERT(CURRENT_TIMESTAMP, DATE))
        ";

    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();