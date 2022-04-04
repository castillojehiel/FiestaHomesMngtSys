const reportsModel = require("../../models/residents/ReportsModel.js");

exports.GetReportTypes = (req, res) =>{
    reportsModel.GetReportTypes(req.params.Keyword, (err, reports) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(reports);
            res.send(reports);
        }
    });
}

exports.GetResidentReports = (req, res) =>{
    reportsModel.SearchResidentReports(req.params, (err, reports) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(reports);
            res.send(reports);
        }
    });
}

exports.CreateNewReport = (req, res) =>{
    reportsModel.CreateNewReport(req.body, (err, reports) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(reports);
            res.json({status: true, message: 'Report submitted', data: reports.insertId})
        }
    });
}

exports.UpdateReport = (req, res) =>{
    reportsModel.UpdateReport(req.body, (err, reports) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(reports);
            res.json({status: true, message: 'Report submitted', data: reports.insertId})
        }
    });
}

