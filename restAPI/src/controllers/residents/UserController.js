const userModel = require("../../models/residents/UserModel");

//get userlist
exports.getUserList = (req, res) =>{
    userModel.getAllUsers((err, users) =>{
        console.log("we are here");
        
        if(err){
            res.send(err);
        }
        else{
            res.send(users);
        }
    });
}