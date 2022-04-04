const dbConn = require("../../../config/db.config");

let Vehicle = (vehicles) => {
  this.Color = vehicles.Color;
  this.CreatedBy = vehicles.CreatedBy;
  this.CreatedDateTime = vehicles.CreatedDateTime;
  this.HouseHoldID = vehicles.HouseHoldID;
  this.isActive = vehicles.isActive;
  this.Model = vehicles.Model;
  this.PlateNumber = vehicles.PlateNumber;
  this.QRCode = vehicles.QRCode;
  this.VehicleID = vehicles.VehicleID;
};

Vehicle.GetHouseHoldVehicles = (HouseHoldID, result) => {
  dbConn.query(
    `SELECT * FROM vehicles WHERE HouseHoldID = '${HouseHoldID}' AND isActive = 1`,
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

Vehicle.AddNewVehicle = (params, result) => {
  dbConn.query(
    `INSERT INTO vehicles (HouseholdID, Model, Color, PlateNumber, CreatedBy, CreatedDateTime)
        VALUES('${params.HouseHoldID}', '${params.Model}', '${params.Color}', '${params.PlateNumber}', '${params.CreatedBy}', CURRENT_TIMESTAMP)`,
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

Vehicle.UpdateQRCode = (ID, result) => {
  console.log("-------update QR------------");
  console.log(ID);
  var pad = "00000000";
  var qrcode = "VEH" + (pad + ID).slice(-pad.length);
  dbConn.query(
    `UPDATE vehicles SET QRCode = '${qrcode}' WHERE VehicleID = '${ID}'`,
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

Vehicle.RemoveVehicle = (params, result) => {
  dbConn.query(
    `UPDATE vehicles
            SET 
                isActive = 0
        WHERE VehicleID = '${params.VehicleID}'`,
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

Vehicle.UpdateVehicle = (params, result) => {
  dbConn.query(
    `UPDATE vehicles
            SET 
                Model = '${params.Model}',
                Color = '${params.Color}',
                PlateNumber = '${params.PlateNumber}'
        WHERE VehicleID = '${params.VehicleID}'`,
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

module.exports = Vehicle;
