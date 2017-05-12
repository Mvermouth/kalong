/**
 * Created by Administrator on 2017/5/12.
 */
const formidable = require("formidable");
const Blog = require("../models/Blog.js");
const Vip = require("../models/Vip.js");
const mongoose=require("mongoose");
exports.showIndex = function (req, res) {
    // Blog.find({},(err,result)=>{
    //     console.log(result[result.length-1]);
    //     res.render("index",{
    //         "r":result,
    //         "f":result[result.length-1]
    //     });
    // })
    Blog.find().sort({_id:"-1"}).exec((err,result)=>{
        console.log(result);
        res.render("index",{
                    "r":result,
                    "f":result[0]
        })
    })


}
exports.showWrite = function (req, res) {
    if(!req.session.login||req.session.login !="1"){
        res.end("feifa");
        return;
    }
    res.render("write");
}
exports.doWrite = function (req, res) {
    var form = new formidable.IncomingForm();
    form.parse(req, (err, fields) => {
        //console.log(fields.usename+md5(fields.password));
        //写入数据库
       console.log(fields);
       Blog.create(fields,function(err){
           if(err){
               console.log("no");
               return;
           }
           console.log("保存成功");
           res.send("1");
       });
       //res.end();
    })
}
exports.showDetail=function (req, res) {
    console.log(req.query.id);
    var __id = mongoose.Types.ObjectId(req.query.id);
    Blog.find({_id:__id},(err,result)=>{
        //console.log(result);
        res.render("detail",{
            "r":result
        })
    })
}
exports.doComments=function (req, res) {
    var form = new formidable.IncomingForm();
    form.parse(req, (err, fields) => {
        //console.log(fields.usename+md5(fields.password));
        //写入数据库
        console.log(fields);
        var __id = mongoose.Types.ObjectId(fields.id);
        var comment={"body":fields.comments,"date":new Date().toLocaleString()};
        Blog.findOne({_id:__id},(err,Blog)=>{
            console.log(Blog);
            Blog.addComments(comment);
           // Blog.addComments(comment,(err,result)=>{
           //     if(err){
           //         res.end();
           //         return;
           //     }
           //     console.log("评论成功")
           //     res.end();
           // })
        })
        console.log(comment);
        //res.end();
    })
}
exports.showLogin=function (req,res) {
    res.render("login");
}
exports.doLogin=function (req, res) {
    var form = new formidable.IncomingForm();
    form.parse(req, (err, fields) => {
        //console.log(fields.usename);
        Vip.find({usename:fields.usename},(err,result)=>{
            console.log(err);
            console.log(result);
            if(err){
                console.log("sb1");
                res.end();
            }
            if(result == ""){
                console.log("sb");
                res.end();
            }else{
                if(result[0].password === fields.password ){
                    req.session.login="1";
                   console.log("1");
                   res.send("1");
                }else{
                    console.log("2");
                }
            }

            //console.log(fields.password);

            // if(result[0].password === fields.password ){
            //    console.log("1");
            // }
           res.end();
        })
    })
}