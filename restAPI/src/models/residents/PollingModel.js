const dbConn = require("../../../config/db.config");

exports.VisitationForApproval = (HouseHoldID, result) => {
  dbConn.query(
    `SELECT
                vl.VLID
            FROM VisitorLogs vl
            LEFT JOIN datacenter dc
                ON vl.VisitorID = dc.DataCenterID
            WHERE   vl.HouseHoldID = '${HouseHoldID}'
                    AND IFNULL(isApproved,0) = 0
                    AND vl.isActive = 1
                    AND ( CONVERT(RequestDateTime, DATE) = CONVERT(CURRENT_TIMESTAMP, DATE) )
            GROUP BY vl.VisitorID 
            ORDER BY vl.RequestDateTime ASC 
            LIMIT 1`,
    (err, res) => {
      if (err) {
        console.log("Error...", err);
        result(null, err);
      } else {
        console.log("Success", res);
        result(null, res);
      }
    }
  );
};

exports.WhiteListedVisitations = (HouseHoldID, result) => {
  dbConn.query(
    `SELECT
                MAX(vl.VLID) as VLID
            FROM VisitorLogs vl
            LEFT JOIN datacenter dc
                ON vl.VisitorID = dc.DataCenterID
            WHERE   vl.HouseHoldID = '${HouseHoldID}'
                    AND IFNULL(isApproved,0) = 1
                    AND vl.isActive = 1
                    AND ApprovedBy = 0
                    AND ( CONVERT(RequestDateTime, DATE) = CONVERT(CURRENT_TIMESTAMP, DATE) )
                    AND (DATE_SUB(NOW(),INTERVAL 1 MINUTE) <=  vl.ApprovedDateTime AND NOW() >= vl.ApprovedDateTime)
            GROUP BY vl.VisitorID 
            ORDER BY vl.ApprovedDateTime ASC 
            LIMIT 1`,
    (err, res) => {
      if (err) {
        console.log("Error...", err);
        result(null, err);
      } else {
        console.log("Success", res);
        result(null, res);
      }
    }
  );
};

exports.BlockListedVisitations = (HouseHoldID, result) => {
  dbConn.query(
    `SELECT
                vl.VLID
            FROM VisitorLogs vl
            LEFT JOIN datacenter dc
                ON vl.VisitorID = dc.DataCenterID
            WHERE   vl.HouseHoldID = '${HouseHoldID}'
                    AND IFNULL(isApproved,0) = 0
                    AND vl.isActive = 0
                    AND ( CONVERT(RequestDateTime, DATE) = CONVERT(CURRENT_TIMESTAMP, DATE) )
                    AND (DATE_SUB(NOW(),INTERVAL 1 MINUTE) <=  vl.RequestDateTime AND NOW() >= vl.RequestDateTime)
            GROUP BY vl.VisitorID 
            ORDER BY vl.RequestDateTime ASC 
            LIMIT 1`,
    (err, res) => {
      if (err) {
        console.log("Error...", err);
        result(null, err);
      } else {
        console.log("Success", res);
        result(null, res);
      }
    }
  );
};

exports.GetLastPublishedAnnouncement = (result) => {
  dbConn.query(
    `SELECT
            ann.AnnouncementID,
            ann.Title, 
            ann.Details, 
            ann.isActive, 
            annType.Description as AnnouncementType,
            ann.PublishedDateTime
            FROM announcements ann
            LEFT JOIN announcementtypes annType
                ON ann.ATID = annType.ATID
            WHERE   ann.isActive = 1
                    AND ann.isPublished = 1
                    AND ann.ExpiryDate > CONVERT(CURRENT_TIMESTAMP, DATE)
                    AND (
                            (MONTH(CONVERT(PublishedDateTime, DATE)) = MONTH(CURRENT_TIMESTAMP))
                            AND
                            (YEAR(CONVERT(PublishedDateTime, DATE)) = YEAR(CURRENT_TIMESTAMP))
                        )
                    AND (DATE_SUB(NOW(),INTERVAL 1 MINUTE) <=  ann.PublishedDateTime AND NOW() >= ann.PublishedDateTime)
            ORDER BY ann.PublishedDateTime DESC`,
    (err, res) => {
      if (err) {
        console.log("Error...", err);
        result(null, err);
      } else {
        console.log("Success", res);
        result(null, res);
      }
    }
  );
};
