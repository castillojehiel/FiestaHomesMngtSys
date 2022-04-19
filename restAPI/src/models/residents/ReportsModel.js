const dbConn = require("../../../config/db.config");

const Reports = (report) => {
  this.AcknowledgedBy = residentreports.AcknowledgedBy;
  this.AcknowledgedDateTime = residentreports.AcknowledgedDateTime;
  this.CreatedBy = residentreports.CreatedBy;
  this.CreatedDateTime = residentreports.CreatedDateTime;
  this.isActive = residentreports.isActive;
  this.RejectedBy = residentreports.RejectedBy;
  this.RejectedDateTime = residentreports.RejectedDateTime;
  this.RejectionRemarks = residentreports.RejectionRemarks;
  this.ReportAcknowledgementRemarks =
    residentreports.ReportAcknowledgementRemarks;
  this.ReportDetails = residentreports.ReportDetails;
  this.ReporterID = residentreports.ReporterID;
  this.ReportID = residentreports.ReportID;
  this.ReportRemarks = residentreports.ReportRemarks;
  this.ReportResolveRemarks = residentreports.ReportResolveRemarks;
  this.ReportStatus = residentreports.ReportStatus;
  this.ReportTypeID = residentreports.ReportTypeID;
  this.ResolvedBy = residentreports.ResolvedBy;
  this.ResolvedDateTime = residentreports.ResolvedDateTime;
  this.UpdatedBy = residentreports.UpdatedBy;
  this.UpdatedDateTime = residentreports.UpdatedDateTime;
  this.ComplaintPerson = residentreports.ComplaintPerson;
  this.ComplaintPersonAddress = residentreports.ComplaintPersonAddress;
};

Reports.GetReportTypes = (keyword, result) => {
  console.log(keyword);
  dbConn.query(
    `SELECT 
            ann.ReportTypeID,
            ann.Description,
            ann.isActive, 
            CONCAT(cb.FirstName, ' ', cb.MiddleName, ' ', cb.LastName) as CreatedBy,
            ann.CreatedDateTime,
            CONCAT(ub.FirstName, ' ', ub.MiddleName, ' ', ub.LastName) as UpdatedBy,
            ann.UpdatedDateTime
        FROM reporttypes ann
        LEFT JOIN useraccount cb
            ON ann.CreatedBy = cb.UserID
        LEFT JOIN useraccount ub
            ON ann.UpdatedBy = ub.UserID
        WHERE   Description LIKE '%${keyword == undefined ? "" : keyword}%'
                AND ann.isActive = 1`,
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

Reports.SearchResidentReports = (Reports, result) => {
  console.log(Reports);
  dbConn.query(
    `SELECT
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
                WHEN ReportStatus = 'REJECT' OR ReportStatus = 'RESOLVED' OR ReportStatus = 'ACKNOWLEDGE' THEN false
                ELSE true
            END as isAllowUpdateStatus,
            rr.ComplaintPerson,
            rr.ComplaintPersonAddress
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
        WHERE   rr.ReporterID = '${Reports.DataCenterID}'
                AND (
                    CONCAT('REP', rr.ReportID) LIKE '%${
                      Reports.Keyword == undefined ? "" : Reports.Keyword
                    }%'
                    OR
                    rr.ReportDetails LIKE '%${
                      Reports.Keyword == undefined ? "" : Reports.Keyword
                    }%'
                )
                AND rr.ReportTypeID = (CASE WHEN '${
                  Reports.ReportType
                }' > 0 THEN '${Reports.ReportType}' ELSE rr.ReportTypeID END)
                AND (CONVERT(rr.CreatedDateTime, DATE) >= CONVERT('${
                  Reports.DateFrom
                }', DATE) AND CONVERT(rr.CreatedDateTime, DATE) <= CONVERT('${
      Reports.DateTo
    }', DATE) )
                AND rr.isActive = 1`,
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

Reports.CreateNewReport = (report, result) => {
  dbConn.query(
    `INSERT INTO residentreports(
            ReporterID,
            ReportTypeID,
            ReportDetails,
            ReportStatus,
            CreatedBy,
            CreatedDateTime,
            isActive,
            ComplaintPerson,
            ComplainTPersonAddress
        )
        VALUES(
            '${report.CreatedBy}',
            '${report.ReportTypeID}',
            '${report.ReportDetails}',
            'PENDING',
            '${report.CreatedBy}',
            CURRENT_TIMESTAMP,
            1,
            '${report.ComplaintPerson}',
            '${report.ComplaintPersonAddress}'
        )`,
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

Reports.UpdateReport = (report, result) => {
  console.log("------- params ------");
  console.log(report);
  console.log("------- end params ------");
  dbConn.query(
    `UPDATE residentreports
        SET
            ReportTypeID = '${report.ReportTypeID}',
            ReportDetails = '${report.ReportDetails}',
            UpdatedBy = '${report.UpdatedBy}',
            UpdatedDateTime = CURRENT_TIMESTAMP,
            isActive = '${report.isActive}',
            ComplaintPerson = '${report.ComplaintPerson}',
            ComplaintPersonAddress = '${report.ComplaintPersonAddress}'
        WHERE   ReportID = '${report.ReportID}'`,
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

module.exports = Reports;
