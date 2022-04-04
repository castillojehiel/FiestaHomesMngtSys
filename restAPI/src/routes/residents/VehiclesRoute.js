const express = require('express');
const router = express.Router();

const VehiclesController = require(`../../controllers/residents/VehiclesController`);

router.get('/:HouseHoldID', VehiclesController.GetHouseHoldVehicles);
router.post('/AddNew', VehiclesController.AddNewVehicle);
router.post('/Remove', VehiclesController.RemoveVehicle);
router.post('/Update', VehiclesController.UpdateVehicle);

module.exports = router;