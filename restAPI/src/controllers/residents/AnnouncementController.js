const announcementModel = require("../../models/residents/AnnouncemetModel");

exports.GetRecentAnnouncements = (req, res) =>{
    announcementModel.GetRecentAnnouncements((err, announcements) =>{
        if(err){
            res.send(err);
        }
        else{
            console.log(announcements);
            res.send(announcements);
        }
    });
}