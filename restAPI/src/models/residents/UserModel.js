const dbConn = require("../../../config/db.config");

let Users = (users) => {
  this.DataCenterID = user.DataCenterID;
  this.FirstName = user.FirstName;
  this.MiddleName = user.MiddleName;
  this.LastName = user.LastName;
  this.Suffix = user.Suffix;
  this.Gender = user.Gender;
  this.BirthDate = user.BirthDate;
  this.ContactNo = user.ContactNo;
  this.EmailAddress = user.EmailAddress;
  this.HouseHoldID = user.HouseHoldID;
  this.QRCode = user.QRCode;
  this.isActive = user.isActive;
  this.isResident = user.isResident;
  this.Userpass = user.Userpass;
  this.CreatedBy = user.CreatedBy;
  this.CreatedDateTime = user.CreatedDateTime;
  this.UpdatedBy = user.UpdatedBy;
  this.UpdatedDateTime = user.UpdatedDateTime;
  this.ResidentPassword = user.ResidentPassword;
  this.DataCenterPhoto = user.DataCenterPhoto;
  this.PhotoExt = user.PhotoExt;
};

//get UsersList
Users.getAllUsers = (result) => {
  dbConn.query(`SELECT * FROM datacenter`, (err, res) => {
    if (err) {
      console.log("Error...", err);
      result(null, err);
    } else {
      console.log("Success", res);
      result(null, res);
    }
  });
};

module.exports = Users;
