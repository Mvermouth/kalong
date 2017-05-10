/**
 * Created by Administrator on 2017/5/5.
 */
const formidable = require("formidable");
const md5 = require("md5");
const db = require("../model/db.js");
const fs = require("fs");
const path = require("path");
const gm = require("gm");
//首页
exports.showIndex = function (req, res) {
    //test
    // req.session.login = "1";
    // req.session.usename = "kalong"

    //查找数据库找数据-->头像
    if (req.session.login == "1") {
        db.find("user", {"usename": req.session.usename}, (err, result) => {
            var avaH = result[0].ava || "y.jpg";
            res.render("index", {
                "login": req.session.login == "1" ? true : false,
                "usename": req.session.login == "1" ? req.session.usename : "",
                "active": "index",
                "avaH": avaH
            });
        })
    } else {
        res.render("index", {
            "login": req.session.login == "1" ? true : false,
            "usename": req.session.login == "1" ? req.session.usename : "",
            "active": "index"
        });
    }
}
//注册
exports.showReg = function (req, res) {
    res.render("reglist", {
        "login": req.session.login == "1" ? true : false,
        "usename": req.session.login == "1" ? req.session.usename : "",
        "active": "reglist"
    });
}
//处理注册
exports.doReg = function (req, res, next) {
    var form = new formidable.IncomingForm();
    form.parse(req, (err, fields) => {
        console.log(fields.usename + md5(fields.password));
        //写入数据库
        db.find("user", {"usename": fields.usename}, (err, result) => {
            if (err) {
                res.send("-3");//服务器错误
                return;
            }
            if (result.length != 0) {
                res.send("-1");//被占用
                return;
            }
            //走到这一步，就是没有被yong
            db.insertOne('user', {
                "usename": fields.usename,
                "password": md5(fields.password),
                "ava": "y.jpg"
            }, (err, result) => {
                console.log("it is ok");
                console.log(result);
                req.session.login = "1";
                req.session.usename = fields.usename;
                res.send("1");
            })
        })
    })
}
//用户登陆
exports.showLogin = function (req, res) {
    res.render("login", {
        "login": req.session.login == "1" ? true : false,
        "usename": req.session.login == "1" ? req.session.usename : "",
        "active": "login"
    });
}
//c处理用户登陆
exports.doLogin = function (req, res) {
    var form = new formidable.IncomingForm();
    form.parse(req, (err, fields) => {
        //console.log(fields.usename+md5(fields.password));
        //写入数据库
        db.find("user", {"usename": fields.usename}, (err, result) => {
            if (err) {
                res.send("-3");//服务器错误
                return;
            }
            if (result.length == 0) {
                res.send("-1");//no here
                return;
            }
            console.log(result[0].password);

            var staus = result[0].password != md5(fields.password) ? "-2" : "1";
            if (staus == "1") {
                req.session.login = "1";
                req.session.usename = fields.usename;
                res.send(staus);
            } else {
                res.send(staus);
            }
            return;

        })
    })
}
//上存头像
exports.showAvaup = function (req, res) {
    if(req.session.login != "1"){
        res.send("非法加载");
        return
    }
    res.render("ava");
}
//处理上存头像
exports.doDoava = function (req, res) {
    if(req.session.login != "1"){
        res.send("非法加载");
        return;
    }
    var form = new formidable.IncomingForm();
    form.uploadDir = "./ava";
    form.parse(req, function (err, fields, files) {
        if (err) {
            throw err;
            return;
        }

        fs.rename("./" + files.avaHead.path, "./ava/" + req.session.usename + path.extname(files.avaHead.name), (err) => {
            if (err) {
                throw err;
            }
            //console.log('wan');
            req.session.avaImg = req.session.usename + path.extname(files.avaHead.name);
            res.redirect("/cut");
            return;
        })
        //console.log(files);

    });
}
//剪裁
exports.showCut = function (req, res) {
    if(req.session.login != "1"){
        res.send("非法加载");
        return;
    }
    res.render("cut", {
        "avaImg": req.session.avaImg,
    });
}
//执行剪裁后的图片
exports.doCut = function (req, res) {
    var filename = req.session.avaImg;
    var w = req.query.w;
    var h = req.query.h;
    var x = req.query.x;
    var y = req.query.y;

    gm("./ava/" + filename)
        .crop(w, h, x, y)
        .resize(100, 100, "!")
        .write("./ava/" + filename, function (err) {
            if (err) {
                res.send("-1");
                return;
            }
            //console.log(err);
            //更改数据库当前用户的avatar这个值
            db.updateMany("user", {"usename": req.session.usename}, {
                $set: {"ava": req.session.avaImg}
            }, function (err, results) {
                res.send("1");
            });
        });
}
//发说说
exports.doPost=function(req,res){
    var form = new formidable.IncomingForm();
    var usename=req.session.usename;
    form.parse(req, (err, fields) => {
        //写入数据库
        db.insertOne("poster",{
            "usename":usename,
            "content":fields.content,
            "time":new Date().toLocaleString()
        },(err,result)=>{
            if(err){
                res.send("-1");
                return;
            }
            res.send("1");
        })
    })
}
//得到说说
exports.doGetAll=function(req,res){
    var page=req.query.page;
    db.find("poster",{},{"pageamount":3,"page":page,"sort":{"time":-1}},function(err,result){

        res.json({"r":result});
    });
}
//得到用户信息
exports.showUseInfo=function(req,res){
    var usename=req.query.usename;
    db.find("user",{"usename":usename},function(err,result){
        // console.log(usename);
        // res.send(result);
        //res.json({"u":result});
        res.json(result);
    });
}
//say num
exports.doAllSay=function (req, res) {
    db.getAllCount("poster",function(count){
        res.send(count.toString());
    });
}
//use say
exports.doUseSay=function(req,res){
    var usename=req.params.usename;
    console.log(usename);
    db.find("poster",{"usename":usename},(err,result)=>{
       console.log(Array.isArray(result));
        res.render("usesay", {
            "login": req.session.login == "1" ? true : false,
            "usename": req.session.login == "1" ? req.session.usename : "",
            "active": "login",
            "useAllsay":result,
            "auther":usename
        });
    })
}
//所有注册用户
exports.showAllUser=function(req,res){
    if(req.session.login != "1"){
        res.send("非法加载");
        return;
    }
    db.find("user",{},(err,result)=>{
        res.render("uselist",{
            "use":result,
            "login": req.session.login == "1" ? true : false,
            "usename": req.session.login == "1" ? req.session.usename : "",
            "active": "All",
        })

        // res.json(result);
        // return;
    })
}