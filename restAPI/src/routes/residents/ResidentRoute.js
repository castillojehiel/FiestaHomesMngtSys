const express = require('express');
const router = express.Router();

const ResidentController = require(`../../controllers/residents/ResidentController`);

//route test
router.get('/Login/:Username/:Password', ResidentController.ResidentLogin);
router.post('/Profile/UpdateProfileImage', ResidentController.UpdateProfileImage);
router.post('/Profile/UpdatePassword', ResidentController.UpdatePassword);
router.post('/HouseHold/NewMember', ResidentController.RegisterNewHouseholdMember);
router.get('/HouseHold/GetMembers/:DataCenterID', ResidentController.GetHouseHoldMembers);
router.get('/HouseHold/Vehicles/:HouseHoldID', ResidentController.GetHouseHoldVehicles);

module.exports = router;