/**
 * Created by Administrator on 2017/5/5.
 */
const formidable=require("formidable");
const md5=require("md5");
const db=require("../model/db.js")
//首页
exports.showIndex=function (req,res){
    res.render("index");
}
//注册
exports.showReg=function (req,res){
    res.render("reglist");
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
                "password"
            })
        })
    })
}