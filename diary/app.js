const express=require("express");
const router=require("./router/router.js");
const cors=require("cors");
const session = require('express-session');
const app=express();

app.use(cors({//跨域
    origin:['http://localhost:8080','http://localhost:58555'],
    methods:['GET','POST'],
    alloweHeaders:['Conten-Type', 'Authorization']
}));

//session
app.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true
}))

//api接口
//all
app.get("/",router.showAll);
//one
app.get("/one/:id",router.showOne);
//allNum
app.get("/allNum",router.showAllNum);
//page
app.post("/page/:page",router.showPage);
//返回最新的
app.get("/last",router.showLast);
//接收写的东西
app.post("/doWrite",router.doWrite)

app.listen(80);