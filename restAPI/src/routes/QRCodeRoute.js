const express = require('express');
const router = express.Router();

const qrCodeController = require(`../controllers/QRCodeController`);

router.get('/Generate/:QRCodeText', qrCodeController.GenerateQRCode);

module.exports = router;