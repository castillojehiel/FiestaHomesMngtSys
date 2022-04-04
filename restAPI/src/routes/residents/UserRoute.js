const express = require('express');
const router = express.Router();

const UserController = require(`../../controllers/residents/UserController`);

//route test
router.get('/', UserController.getUserList);

module.exports = router;