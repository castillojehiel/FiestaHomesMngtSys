const dbConn = require("../../../config/db.config");

let Visitor = (visitor) => {
  this.BirthDate = visitor.BirthDate;
  this.ContactNo = visitor.ContactNo;
  this.CreatedBy = visitor.CreatedBy;
  this.CreatedDateTime = visitor.CreatedDateTime;
  this.DataCenterID = visitor.DataCenterID;
  this.DataCenterPhoto = visitor.DataCenterPhoto;
  this.EmailAddress = visitor.EmailAddress;
  this.FirstName = visitor.FirstName;
  this.Gender = visitor.Gender;
  this.HouseHoldID = visitor.HouseHoldID;
  this.isActive = visitor.isActive;
  this.isResident = visitor.isResident;
  this.LastName = visitor.LastName;
  this.MiddleName = visitor.MiddleName;
  this.PhotoExt = visitor.PhotoExt;
  this.QRCode = visitor.QRCode;
  this.ResidentPassword = visitor.ResidentPassword;
  this.Suffix = visitor.Suffix;
  this.UpdatedBy = visitor.UpdatedBy;
  this.UpdatedDateTime = visitor.UpdatedDateTime;
  this.Userpass = visitor.Userpass;
  this.ResidentName = visitor.ResidentName;
  this.isHouseHoldContactPerson = visitor.isHouseHoldContactPerson;
  this.VisitorName = visitor.VisitorName;
  this.RecordStatus = visitor.RecordStatus;
  this.VisitorID = visitor.VisitorID;
  this.VWID = visitor.VWID;
  this.VBID = visitor.VBID;
  this.isWhiteListed = !!+visitor.isWhiteListed;
  this.isBlackListed = !!+visitor.isBlackListed;
};

Visitor.GetHouseHoldVisitors = (HouseHoldID, result) => {
  dbConn.query(
    `SELECT
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
                    CASE WHEN vw.VWID IS NOT NULL THEN true ELSE false END as isWhiteListed,
                    CASE WHEN vb.VBID IS NOT NULL THEN true ELSE false END as isBlackListed,
                    vw.VWID,
                    vb.VBID,
                    vl.ReasonForVisit
                FROM VisitorLogs vl
                LEFT JOIN datacenter dc
                    ON vl.VisitorID = dc.DataCenterID
                LEFT JOIN visitorwhitelist vw
                    ON vl.VisitorID = vw.VisitorID
                LEFT JOIN visitorblacklist vb
                    ON vl.VisitorID = vb.VisitorID
                LEFT JOIN useraccount cb
                    ON ann.CreatedBy = cb.UserID
                LEFT JOIN useraccount ub
                    ON ann.UpdatedBy = ub.UserID
                WHERE vl.HouseHoldID = '${HouseHoldID}'
                        AND vl.VisitorID > 0
                GROUP BY vl.VisitorID 
                ORDER BY dc.FirstName, dc.MiddleName, dc.LastName ASC`,
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

Visitor.AddToWhitelist = (Visitor, result) => {
  dbConn.query(
    `INSERT INTO visitorwhitelist (VisitorID, HouseHoldID, CreatedBy, CreatedDateTime)
        VALUES ('${Visitor.VisitorID}', '${Visitor.HouseHoldID}', '${Visitor.CreatedBy}', CURRENT_TIMESTAMP)`,
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

Visitor.AddToBlocklist = (Visitor, result) => {
  dbConn.query(
    `INSERT INTO visitorblacklist (VisitorID, HouseHoldID, CreatedBy, CreatedDateTime)
        VALUES ('${Visitor.VisitorID}', '${Visitor.HouseHoldID}', '${Visitor.CreatedBy}', CURRENT_TIMESTAMP)`,
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

Visitor.RemoveFromWhitelist = (Visitor, result) => {
  console.log("-------Param values-------");
  console.log(Visitor);
  console.log("-------END Param values-------");
  dbConn.query(
    `DELETE FROM visitorwhitelist WHERE VWID = '${Visitor.VWID}'`,
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

Visitor.RemoveFromBlocklist = (Visitor, result) => {
  console.log("------------ Start Params --------------");
  console.log(Visitor);
  console.log(Visitor.VBID);
  dbConn.query(
    `DELETE FROM visitorblacklist WHERE VBID = '${Visitor.VBID}'`,
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

module.exports = Visitor;
