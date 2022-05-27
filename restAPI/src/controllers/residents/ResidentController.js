const residentModel = require("../../models/residents/ResidentModel");

exports.ResidentLogin = (req, res) => {
  console.log("Resident Login");
  residentModel.residentLogin(req.params, (err, resident) => {
    if (err) {
      res.send(err);
    } else {
      console.log(resident);
      res.send(resident);
    }
  });
};

exports.UpdateProfileImage = (req, res) => {
  residentModel.UpdateProfileImage(req.body, (err, resident) => {
    if (err) {
      res.send(err);
    } else {
      console.log(resident);
      res.json({ status: true, message: "Profile Updated", data: resident });
    }
  });
};

exports.UpdatePassword = (req, res) => {
  residentModel.UpdatePassword(req.body, (err, resident) => {
    if (err) {
      res.send(err);
    } else {
      console.log(resident);
      res.json({ status: true, message: "Password Updated", data: resident });
    }
  });
};

exports.RegisterNewHouseholdMember = (req, res) => {
  residentModel.RegisterNewHouseholdMember(req.body, (err, resident) => {
    if (err) {
      res.send(err);
    } else {
      console.log("------------------controller---------------");
      console.log(resident);
      console.log(resident.insertId);
      residentModel.UpdateNewResidentQRCode(
        resident.insertId,
        (err, qrcode) => {
          //do nothing
        }
      );
      res.json({ status: true, message: "New member added", data: resident });
    }
  });
};

exports.GetHouseHoldMembers = (req, res) => {
  residentModel.GetHouseHoldMembers(
    req.params.DataCenterID,
    (err, resident) => {
      if (err) {
        res.send(err);
      } else {
        console.log(resident);
        res.send(resident);
      }
    }
  );
};

exports.GetHouseHoldVehicles = (req, res) => {
  residentModel.GetHouseHoldVehicles(
    req.params.HouseHoldID,
    (err, vehicles) => {
      if (err) {
        res.send(err);
      } else {
        res.send(vehicles);
      }
    }
  );
};

exports.GetAllResidents = (req, res) => {
  residentModel.GetAllResident((err, resident) => {
    if (err) {
      res.send(err);
    } else {
      console.log(resident);
      res.send(resident);
    }
  });
};
