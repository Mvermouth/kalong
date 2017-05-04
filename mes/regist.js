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

app.listen(80);