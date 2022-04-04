const dbConn = require("../../../config/db.config");

let GateLogs = (gatelogs) => {
  this.CreatedBy = gatepasslogs.CreatedBy;
  this.CreatedDateTime = gatepasslogs.CreatedDateTime;
  this.DataCenterID = gatepasslogs.DataCenterID;
  this.GPLogID = gatepasslogs.GPLogID;
  this.isVehicleLog = gatepasslogs.isVehicleLog;
  this.LoggerType = gatepasslogs.LoggerType;
  this.LogType = gatepasslogs.LogType;
  this.PurposeOfLog = gatepasslogs.PurposeOfLog;
  this.QRCode = gatepasslogs.QRCode;
  this.ScannedBy = gatepasslogs.ScannedBy;
  this.TargetHouseHoldID = gatepasslogs.TargetHouseHoldID;
  this.ReasonForVisit = gatepasslogs.ReasonForVisit;
};

GateLogs.GetHouseHoldVisitationForApproval = (HouseHoldID, result) => {
  dbConn.query(
    `SELECT
                    vl.VLID,
                    vl.VisitorID ,
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
                    dc.isActive,
                    CASE 
                        WHEN dc.isActive = 1 THEN 'Active'
                        ELSE 'Inactive'
                        END as RecordStatus,
                    dc.isResident,
                    CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
                    dc.CreatedDateTime,
                    CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
                    dc.UpdatedDateTime,
                    CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as VisitorName,
                    vl.ReasonForVisit
                FROM VisitorLogs vl
                LEFT JOIN datacenter dc
                    ON vl.VisitorID = dc.DataCenterID
                LEFT JOIN useraccount cb
                    ON ann.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON ann.UpdatedBy = ub.UserID
                WHERE   vl.HouseHoldID = '${HouseHoldID}'
                        AND IFNULL(isApproved,0) = 0
                        AND vl.isActive = 1
                        AND ( CONVERT(RequestDateTime, DATE) = CONVERT(CURRENT_TIMESTAMP, DATE) )
                GROUP BY vl.VisitorID 
                ORDER BY vl.RequestDateTime ASC `,
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

GateLogs.ApproveVisitation = (params, result) => {
  dbConn.query(
    `UPDATE    visitorlogs
            SET 
                isApproved = 1,
                ApprovedBy = '${params.ApprovedBy}',
                ApprovedDateTime = CURRENT_TIMESTAMP
            WHERE VLID = '${params.VLID}'`,
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

GateLogs.RejectVisitation = (params, result) => {
  dbConn.query(
    `UPDATE    visitorlogs
            SET 
                isActive = 0
            WHERE VLID = '${params.VLID}'`,
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

GateLogs.GetPersonalGateLogs = (params, result) => {
  dbConn.query(
    `SELECT 
            gpl.CreatedDateTime
            FROM gatepasslogs gpl
            WHERE DataCenterID = '${params.DataCenterID}'
                    AND (CONVERT(gpl.CreatedDateTime, DATE) >= '${params.DateFrom}' AND CONVERT(gpl.CreatedDateTime, DATE) <= '${params.DateTo}')
            ORDER BY gpl.CreatedDateTime DESC`,
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

GateLogs.GetHouseholdGateLogs = (params, result) => {
  dbConn.query(
    `SELECT
            gpl.GPLogID,
            CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as MemberName,
            gpl.CreatedDateTime as DateOfLogs 
            FROM gatepasslogs gpl
            LEFT JOIN datacenter dc
                ON gpl.DataCenterID = dc.DataCenterID
            LEFT JOIN households hh
                ON dc.HouseHoldID = hh.HouseHoldID
            WHERE   hh.HouseHoldID = '${params.HouseHoldID}'
                    AND (CONVERT(gpl.CreatedDateTime, DATE) >= '${params.DateFrom}' AND CONVERT(gpl.CreatedDateTime, DATE) <= '${params.DateTo}')
            ORDER BY gpl.CreatedDateTime DESC`,
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

GateLogs.GetHouseholdVisitorsGateLogs = (params, result) => {
  dbConn.query(
    `SELECT
            vl.VLID,
            CONCAT(dc.FirstName, ' ', dc.MiddleName, ' ', dc.LastName, ' ', dc.Suffix) as VisitorName,
            vl.RequestDateTime,
            vl.ReasonForVisit,
            CASE    
                WHEN vl.isApproved = 1 THEN
                    CASE 
                        WHEN ISNULL(app.DataCenterID) = 1 THEN
                            'WHITELISTED'
                        ELSE 
                            CONCAT(app.FirstName, ' ', app.MiddleName, ' ', app.LastName, ' ', app.Suffix)
                        END
                ELSE ''
                END as ApprovedBy,
            IFNULL(vl.ApprovedDateTime, '') as ApprovedDateTime,
            CASE 
                WHEN vl.isApproved = 1 THEN
                    'APPROVED'
                WHEN vl.isActive = 0 THEN
                    'REJECTED'
                ELSE
                    'PENDING'
                END as VisitStatus
            FROM VisitorLogs vl
                LEFT JOIN datacenter dc
                    ON vl.VisitorID = dc.DataCenterID
                LEFT JOIN datacenter app
                    ON vl.ApprovedBy = app.DataCenterID
            WHERE   vl.HouseHoldID = '${params.HouseHoldID}'
                    AND (CONVERT(vl.RequestDateTime, DATE) >= '${params.DateFrom}' AND CONVERT(vl.RequestDateTime, DATE) <= '${params.DateTo}')
            ORDER BY vl.RequestDateTime DESC`,
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

module.exports = GateLogs;
