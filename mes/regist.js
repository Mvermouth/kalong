/**
 * Created by Administrator on 2017/5/4.
 */
const express = require("express");
const app=express();
const db = require("./model/db2.js");
const formidable = require('formidable');
const md5=require("md5");

app.set("view engine","ejs");
app.use(express.static("./public"));
//注册页面
app.get("/regist",(req,res)=>{
    res.render("regist");
})

//执行注册
app.post("/doreg",(req,res)=>{
    var form = new formidable.IncomingForm();

    form.parse(req,(err,fields)=>{
        console.log(fields.name+md5(fields.pass));
        //写入数据库
        db.insertOne("user",{
            "name":fields.name,
            "pass":md5(fields.pass)
        },(err,result)=>{
            res.send(result);
        })
    })
})
//执行登陆
app.get("/login",(req,res)=>{
    res.render("login");
})

app.post("/dologin",(req,res)=>{
    var form = new formidable.IncomingForm();
    form.parse(req,(err,fields)=>{
        console.log(fields.name+fields.pass);
        //数据库比较
        db.find("user",{"name":fields.name},(err,result)=>{
           if(result.length==1){
               //var j=result[0].pass==md5(fields.pass) ? "1" : "-1";
               res.send(result[0].pass==md5(fields.pass) ? "1" : "-1");
           }else{
               res.send("-2");
           }

            // console.log(result);
            // console.log(result[0].pass);

        })
    })
})

app.listen(80);