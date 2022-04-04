<?php 
    require '../Connection.php';
    $DateFrom = $_POST["txtDateFrom"];
    $DateTo = $_POST["txtDateTo"];

    $query = "SELECT 
                d.selected_date as x,
                (SELECT COUNT(*) FROM residentreports WHERE CONVERT(CreatedDateTime, DATE) = d.selected_date AND isActive = 1) AllReports,
                (SELECT COUNT(*) FROM residentreports WHERE CONVERT(CreatedDateTime, DATE) = d.selected_date AND isActive = 1 AND ReportStatus='PENDING') PendingReports,
                (SELECT COUNT(*) FROM residentreports WHERE CONVERT(CreatedDateTime, DATE) = d.selected_date AND isActive = 1 AND ReportStatus='RESOLVED') ResolvedReports,
                (SELECT COUNT(*) FROM residentreports WHERE CONVERT(CreatedDateTime, DATE) = d.selected_date AND isActive = 1 AND ReportStatus='ACKNOWLEDGE') AcknowledgedReports,
                (SELECT COUNT(*) FROM residentreports WHERE CONVERT(CreatedDateTime, DATE) = d.selected_date AND isActive = 1 AND ReportStatus='REJECTED') RejectedReports
                FROM
                    (select * from 
                        (select adddate('1970-01-01',t4*10000 + t3*1000 + t2*100 + t1*10 + t0) selected_date 
                            from 
                            (select 0 t0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0, 
                            (select 0 t1 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1, 
                            (select 0 t2 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2, 
                            (select 0 t3 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3, 
                            (select 0 t4 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4
                        ) v 
                        where selected_date between '$DateFrom' and '$DateTo') d
            ";

    $sql = $conn -> query($query);

    $data = $sql -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);

    $conn -> close();