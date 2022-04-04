const express = require('express');
const router = express.Router();

const GateLogsController = require(`../../controllers/residents/GateLogsController`);

//route test
router.get('/Visitors/ForApproval/:HouseHoldID', GateLogsController.GetHouseHoldVisitationForApproval);

router.post('/Visitors/ApproveVisitation', GateLogsController.ApproveVisitation);
router.post('/Visitors/RejectVisitation', GateLogsController.RejectVisitation);

router.get('/GateLogs/Personal/:DataCenterID/:DateFrom/:DateTo', GateLogsController.GetPersonalGateLogs);
router.get('/GateLogs/Household/:HouseHoldID/:DateFrom/:DateTo', GateLogsController.GetHouseholdGateLogs);
router.get('/GateLogs/Visitors/:HouseHoldID/:DateFrom/:DateTo', GateLogsController.GetHouseholdVisitorsGateLogs);

module.exports = router;