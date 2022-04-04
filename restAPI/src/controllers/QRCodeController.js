const qrcode = require('qrcode');

exports.GenerateQRCode = async (req, res) =>{
    try {
        let qrCodeBase64 = await qrcode.toDataURL(req.params.QRCodeText);
        console.log(qrCodeBase64);
        res.send([{QRCodeBase64 : qrCodeBase64}])
    } catch (err) {
        res.send(err)
    }
}

 
// const generateQRCode = async text => {
//   try {
//     console.log(await qrcode.toDataURL(text))
//   } catch (err) {
//     console.error(err)
//   }
// }
 
// generateQRCode("https://arjunphp.com/");