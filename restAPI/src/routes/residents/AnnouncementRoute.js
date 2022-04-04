const express = require('express');
const router = express.Router();

const AnnouncementController = require(`../../controllers/residents/AnnouncementController`);

//route test
router.get('/GetRecent', AnnouncementController.GetRecentAnnouncements);

module.exports = router;