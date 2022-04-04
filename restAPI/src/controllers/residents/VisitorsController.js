const visitorsModel = require("../../models/residents/VisitorsModel");

exports.GetHouseHoldVisitors = (req, res) =>{
    visitorsModel.GetHouseHoldVisitors(req.params.HouseHoldID, (err, visitors) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.send(visitors);
        }
    });
}

exports.AddVisitorToWhitelist = (req, res) =>{
    visitorsModel.AddToWhitelist(req.body, (err, visitors) =>{
        console.log(req.body);
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.json({status: true, message: 'Added to whitelist', data: visitors.insertId})
        }
    })
}

exports.AddVisitorToBlocklist = (req, res) =>{
    visitorsModel.AddToBlocklist(req.body, (err, visitors) =>{
        console.log(req.body);
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.json({status: true, message: 'Added to blocklist', data: visitors.insertId})
        }
    })
}

exports.RemoveVisitorFromWhitelist = (req, res) =>{
    visitorsModel.RemoveFromWhitelist(req.body, (err, visitors) =>{
        console.log(req.body);
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.json({status: true, message: 'Removed from Whitelist', data: visitors.insertId})
        }
    })
}

exports.RemoveVisitorFromBlocklist = (req, res) =>{
    visitorsModel.RemoveFromBlocklist(req.body, (err, visitors) =>{
        console.log(req.body);
        if(err){
            res.send(err);
        }
        else{
            console.log(visitors);
            res.json({status: true, message: 'Removed from Blocklist', data: visitors.insertId})
        }
    })
}