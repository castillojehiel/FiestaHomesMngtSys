const pollingModel = require("../../models/residents/PollingModel");

exports.VisitationForApproval = (req, res) =>{
    pollingModel.VisitationForApproval(req.params.HouseHoldID, (err, visits) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(visits);
            res.send(visits);
        }
    });
}

exports.WhiteListedVisitations = (req, res) =>{
    pollingModel.WhiteListedVisitations(req.params.HouseHoldID, (err, visits) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(visits);
            res.send(visits);
        }
    });
}

exports.BlockListedVisitations = (req, res) =>{
    pollingModel.BlockListedVisitations(req.params.HouseHoldID, (err, visits) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(visits);
            res.send(visits);
        }
    });
}

exports.GetLastPublishedAnnouncement = (req, res) =>{
    pollingModel.GetLastPublishedAnnouncement( (err, visits) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(visits);
            res.send(visits);
        }
    });
}