<?php
    header("Access-Control-Allow-Origin: *");
    session_start();
    require '../Connection.php';
    $Username = $_POST["txtUsername"];
    $UserPass = $_POST["txtPassword"];
    $query = "  SELECT
                    u.UserID ,
                    u.DataCenterID,
                    u.FirstName,
                    u.MiddleName,
                    u.LastName,
                    u.Suffix,
                    u.Gender,
                    u.BirthDate,
                    u.ContactNo,
                    u.EmailAddress,
                    u.QRCode,
                    u.isActive,
                    CASE 
                        WHEN u.isActive = 1 THEN 'Active'
                        ELSE 'Inactive'
                        END as RecordStatus,
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    u.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    u.UpdatedDateTime ,
                    CONCAT(u.FirstName, ' ', u.MiddleName, ' ', u.LastName, ' ', u.Suffix) as UserCompleteName
                FROM useraccount u
                LEFT JOIN datacenter dc
                    ON u.DataCenterID = dc.DataCenterID
                LEFT JOIN useraccount cb
                    ON u.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON u.UpdatedBy = ub.UserID
                WHERE   u.isActive = 1  
                        AND u.Username = '$Username'
                        AND u.Userpass = '$UserPass'      
    ";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();

    if($sql -> num_rows > 0)
    {
        $_SESSION["UserID"] = $data["UserID"];
        echo json_encode($data);
    }
    else
        echo json_encode($data);

    $conn -> close();