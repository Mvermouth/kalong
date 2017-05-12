/**
 * Created by Administrator on 2017/5/12.
 */
const express=require("express");
const router=require("./router/router.js");
const session = require('express-session');
const app=express();
//session
app.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true
}))
app.set("view engine","ejs");
app.use(express.static("./public"));

app.get("/",router.showIndex);
app.get("/write",router.showWrite);
app.post("/doWrite",router.doWrite);
app.get("/detail",router.showDetail);
app.post("/doComments",router.doComments);
app.get("/login",router.showLogin);
app.post("/dologin",router.doLogin);





app.listen(80);