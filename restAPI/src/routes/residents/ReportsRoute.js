const express = require('express');
const router = express.Router();

const ReportsController = require(`../../controllers/residents/ReportsController`);

router.get('/Reports/SearchReports/:DataCenterID/:DateFrom/:DateTo/:ReportType/:Keyword?', ReportsController.GetResidentReports);
router.get('/Reports/ReportTypes/:Keyword?', ReportsController.GetReportTypes);
router.post('/Reports/CreateNewReport', ReportsController.CreateNewReport);
router.post('/Reports/UpdateReport', ReportsController.UpdateReport);

module.exports = router;