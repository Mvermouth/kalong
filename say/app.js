/**
 * Created by Administrator on 2017/5/5.
 */
const express=require("express");
const ejs=require("ejs");
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
app.use("/ava",express.static("./ava"));
//首页
app.get("/",router.showIndex);
//注册
app.get("/reglist",router.showReg);
//处理注册
app.post("/doreglist",router.doReg);
//用户登陆
app.get("/login",router.showLogin);
//处理登陆
app.post("/dologin",router.doLogin);
//上存头像
app.get("/avaup",router.showAvaup);
//处理得到头像页面
app.post("/doava",router.doDoava);
//剪裁
app.get("/cut",router.showCut);
//执行图片
app.get("/docut",router.doCut);
//发说说
app.post("/post",router.doPost);
//得到说说
app.get("/getAll",router.doGetAll);
//得到用户信息
app.get("/useInfo",router.showUseInfo);
//得到说说总条数
app.get("/allSay",router.doAllSay);
//用户说说
app.get("/useSay/:usename",router.doUseSay);
//所有成员
app.get("/allUser",router.showAllUser);

app.listen(80);