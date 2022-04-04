const express = require('express');
const bodyParser = require('body-parser');

// create express app
const app = express();

// setup the server port
const port = process.env.PORT || 5000;

// parse request data content type application/x-www-form-rulencoded
app.use(bodyParser.urlencoded({limit: '5000mb', extended: false}));

// parse request data content type application/json
app.use(bodyParser.json({limit:'5000mb'}));

// define root route
app.get('/', (req, res)=>{
    res.send('Hello World');
});

//import user route
const userRoute = require('./src/routes/residents/UserRoute');
//create employee route
app.use('/Fs_Resident/api/v1/user', userRoute); 

//import resident route
const residentRoute = require('./src/routes/residents/ResidentRoute');
//create employee route
app.use('/Fs_Resident/api/v1/Resident', residentRoute); 

//import gatelogs route
const gateLogsRoute = require('./src/routes/residents/GateLogsRoute');
//create gatelogs route
app.use('/Fs_Resident/api/v1/Resident', gateLogsRoute); 

//import announcement route
const announcementRoute = require('./src/routes/residents/AnnouncementRoute');
//create gatelogs route
app.use('/Fs_Resident/api/v1/Announcement', announcementRoute); 

//import announcement route
const visitorRoute = require('./src/routes/residents/VisitorsRoute');
//create gatelogs route
app.use('/Fs_Resident/api/v1/Resident', visitorRoute); 

//import reports route
const reportsRoute = require('./src/routes/residents/ReportsRoute');
//create gatelogs route
app.use('/Fs_Resident/api/v1/Resident', reportsRoute); 

//import reports route
const QRCodeRoute = require('./src/routes/QRCodeRoute');
//create gatelogs route
app.use('/QRCode', QRCodeRoute); 

//import polling route
const VehiclesRoute = require('./src/routes/residents/VehiclesRoute');
//create gatelogs route
app.use('/Vehicles', VehiclesRoute); 


//import polling route
const PollingRoute = require('./src/routes/residents/PollingRoute');
//create gatelogs route
app.use('/Polling', PollingRoute); 



// listen to the port
app.listen(port, ()=>{
    console.log(`Server is running at port ${port}`);
});