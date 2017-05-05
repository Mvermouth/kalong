/**
 * Created by Administrator on 2017/5/5.
 */
const express=require("express");
const app=express();
const ejs=require("ejs");
const router=require("./router/router.js");

app.set("view engine","ejs");
app.use(express.static("./public"));
//首页
app.get("/",router.showIndex);
//注册
app.get("/reglist",router.showReg);
//处理注册
app.post("/doreglist",router.doReg);

app.listen(80);