const vehiclesModel = require("../../models/residents/VehiclesModel");


exports.GetHouseHoldVehicles = (req, res) =>{
    vehiclesModel.GetHouseHoldVehicles(req.params.HouseHoldID, (err, visitors) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.send(visitors);
        }
    });
}


exports.AddNewVehicle = (req, res) =>{
    console.log(req.body);
    vehiclesModel.AddNewVehicle(req.body, (err, vehicle) =>{
        if(err){
            res.send(err);
        }
        else{
            vehiclesModel.UpdateQRCode(vehicle.insertId, (err, vehicle) =>{});
            res.json({status: true, message: 'Vehicle Saved', data: vehicle.insertId})
        }
    })
}


exports.RemoveVehicle = (req, res) =>{
    console.log(req.body);
    vehiclesModel.RemoveVehicle(req.body, (err, vehicle) =>{
        if(err){
            res.send(err);
        }
        else{
            res.json({status: true, message: 'Vehicle Removed.', data: vehicle.insertId})
        }
    })
}

exports.UpdateVehicle = (req, res) =>{
    console.log(req.body);
    vehiclesModel.UpdateVehicle(req.body, (err, vehicle) =>{
        if(err){
            res.send(err);
        }
        else{
            res.json({status: true, message: 'Vehicle Updated.', data: vehicle.insertId})
        }
    })
}