const express = require('express');
const router = express.Router();

const VisitorsController = require(`../../controllers/residents/VisitorsController`);

//route test
router.get('/Visitors/:HouseHoldID', VisitorsController.GetHouseHoldVisitors);
router.post('/Visitors/AddToWhitelist', VisitorsController.AddVisitorToWhitelist);
router.post('/Visitors/AddToBlocklist', VisitorsController.AddVisitorToBlocklist);
router.post('/Visitors/RemoveFromBlocklist', VisitorsController.RemoveVisitorFromBlocklist);
router.post('/Visitors/RemoveFromWhitelist', VisitorsController.RemoveVisitorFromWhitelist);

module.exports = router;