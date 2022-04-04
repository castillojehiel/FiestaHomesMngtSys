const gateLogsModel = require("../../models/residents/GateLogsModel");

exports.GetHouseHoldVisitationForApproval = (req, res) =>{
    gateLogsModel.GetHouseHoldVisitationForApproval(req.params.HouseHoldID, (err, visitors) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.send(visitors);
        }
    });
}

exports.ApproveVisitation = (req, res) =>{
    console.log(req.body);
    gateLogsModel.ApproveVisitation(req.body, (err, visitors) =>{
        console.log("------------Result------------");
        console.log(visitors.affectedRows);
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.json({status: true, message: 'Visitation Approved', data: visitors.insertId})
        }
    })
}

exports.RejectVisitation = (req, res) =>{
    gateLogsModel.RejectVisitation(req.body, (err, visitors) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.send(visitors);
        }
    })
}

exports.GetPersonalGateLogs = (req, res) =>{
    gateLogsModel.GetPersonalGateLogs(req.params, (err, gatelogs) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(gatelogs);
            res.send(gatelogs);
        }
    });
}

exports.GetHouseholdGateLogs = (req, res) =>{
    gateLogsModel.GetHouseholdGateLogs(req.params, (err, gatelogs) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(gatelogs);
            res.send(gatelogs);
        }
    });
}

exports.GetHouseholdVisitorsGateLogs = (req, res) =>{
    gateLogsModel.GetHouseholdVisitorsGateLogs(req.params, (err, gatelogs) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(gatelogs);
            res.send(gatelogs);
        }
    });
}