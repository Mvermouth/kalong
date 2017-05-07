/**
 * Created by Administrator on 2017/5/5.
 */
const formidable=require("formidable");
const md5=require("md5");
const db=require("../model/db.js");
const fs=require("fs");
const path=require("path");
//首页
exports.showIndex=function (req,res){
    //test
    req.session.login = "1";
    req.session.usename="kalong"

    //查找数据库找数据-->头像
    if(req.session.login == "1") {
        db.find("user", {"usename": req.session.usename}, (err, result) => {
            var avaH=result[0].ava || "y.jpg";
            res.render("index",{
                "login" : req.session.login == "1" ? true : false,
                "usename" : req.session.login == "1" ? req.session.usename : "",
                "active":"index",
                "avaH":avaH
            });
        })
    }else{
        res.render("index",{
            "login" : req.session.login == "1" ? true : false,
            "usename" : req.session.login == "1" ? req.session.usename : "",
            "active":"index"
        });
    }
}
//注册
exports.showReg=function (req,res){
    res.render("reglist",{
        "login" : req.session.login == "1" ? true : false,
        "usename" : req.session.login == "1" ? req.session.usename : "",
        "active":"reglist"
    });
}
//处理注册
exports.doReg=function(req,res,next){
    var form = new formidable.IncomingForm();
    form.parse(req,(err,fields)=>{
        console.log(fields.usename+md5(fields.password));
        //写入数据库
        db.find("user",{"usename":fields.usename},(err,result)=>{
            if(err){
                res.send("-3");//服务器错误
                return;
            }
            if(result.length != 0){
                res.send("-1");//被占用
                return;
            }
            //走到这一步，就是没有被yong
            db.insertOne('user',{
                "usename":fields.usename,
                "password":md5(fields.password),
                "ava":"y.jpg"
            },(err,result)=>{
                console.log("it is ok");
                console.log(result);
                req.session.login="1";
                req.session.usename=fields.usename;
                res.send("1");
            })
        })
    })
}
//用户登陆
exports.showLogin=function(req,res){
    res.render("login",{
        "login" : req.session.login == "1" ? true : false,
        "usename" : req.session.login == "1" ? req.session.usename : "",
        "active":"login"
    });
}
//c处理用户登陆
exports.doLogin=function(req,res){
    var form = new formidable.IncomingForm();
    form.parse(req,(err,fields)=>{
        //console.log(fields.usename+md5(fields.password));
        //写入数据库
        db.find("user",{"usename":fields.usename},(err,result)=>{
            if(err){
                res.send("-3");//服务器错误
                return;
            }
            if(result.length == 0){
                res.send("-1");//no here
                return;
            }
            console.log(result[0].password);

            var staus =result[0].password != md5(fields.password) ? "-2" : "1";
            if(staus== "1"){
                req.session.login="1";
                req.session.usename=fields.usename;
                res.send(staus);
            }else{
                res.send(staus);
            }
            return;

        })
    })
}
//上存头像
exports.showAvaup=function (req,res) {
    res.render("ava");
}
//处理上存头像
exports.doDoava=function (req, res) {
    var form = new formidable.IncomingForm();
    form.uploadDir = "./ava";
    form.parse(req, function(err, fields, files) {
        if(err){
            throw err;
            return;
        }

        fs.rename("./"+files.avaHead.path,"./ava/"+req.session.usename+path.extname(files.avaHead.name),()=>{
            console.log('wan');
        })
        console.log(files);
        res.end("ok");
    });
}