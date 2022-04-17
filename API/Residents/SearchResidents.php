<?php
    require '../Connection.php';
    $keyword = $_POST["txtSearch"];
    $isShowAll = true;
    if(isset($_POST["isShowAll"])){
		$isActive = $_POST["isShowAll"];
	}


    $query = "SELECT 
                    dc.DataCenterID,
                    dc.FirstName,
                    dc.MiddleName,
                    dc.LastName,
                    dc.Suffix,
                    dc.Gender,
                    dc.BirthDate,
                    dc.ContactNo,
                    dc.EmailAddress,
                    dc.HouseHoldID,
                    dc.QRCode,
                    CASE WHEN dc.isActive = 1 THEN true ELSE false END as isActive,
                    CASE 
                        WHEN dc.isActive = 1 THEN 'Active'
                        ELSE 'Inactive'
                        END as RecordStatus,
                    dc.isResident,
                    CASE
                        WHEN dc.isNonUserRegistered = 0 THEN
                            CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName)
                        ELSE
                            CONCAT(dccb.FirstName, ' ', dccb.MiddleName, ' ', dccb.LastName)
                    END as CreatedBy,
                    CASE
                        WHEN dc.isNonUserRegistered = 0 THEN
                            cb.UserPosition
                        ELSE
                            'Resident'
                    END as CreatedByPosition,
                    dc.CreatedDateTime,
                    CASE
                        WHEN dc.isNonUserRegistered = 0 THEN
                            CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName)
                        ELSE
                            CONCAT(dcub.FirstName, ' ', dcub.MiddleName, ' ', dcub.LastName)
                    END as UpdatedBy,
                    CASE
                        WHEN dc.isNonUserRegistered = 0 AND dc.UpdatedDateTime IS NOT NULL THEN
                            ub.UserPosition
                        WHEN dc.isNonUserRegistered = 1 AND dc.UpdatedDateTime IS NOT NULL THEN
                            'Resident'
                        ELSE ''
                    END as UpdatedByPosition,
                    dc.UpdatedDateTime,
                    h.HouseHoldName as HouseHold,
                    CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as ResidentName
                FROM datacenter dc
                LEFT JOIN households h
                    ON dc.HouseHoldID = h.HouseHoldID
                LEFT JOIN useraccount cb
                    ON dc.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON dc.UpdatedBy = ub.UserID
                LEFT JOIN datacenter dccb
                    ON dc.CreatedBy = dccb.DataCenterID
                LEFT JOIN datacenter dcub
                    ON dc.UpdatedBy = dcub.DataCenterID
                WHERE   dc.isResident = 1 
                        AND CONCAT(dc.FirstName, ' ', dc.LastName) LIKE '%$keyword%'
                        AND dc.isActive = (CASE WHEN '$isShowAll' = 1 THEN dc.isActive ELSE 1 END)
                ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data); 

    $conn -> close();