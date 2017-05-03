/**
 * Created by Danny on 2015/9/25 11:35.
 */
const express = require("express");
const app = express();
const db = require("./model/db.js");
const formidable = require('formidable');
const ObjectId = require('mongodb').ObjectID;


//设置模板引擎
app.set("view engine", "ejs");
//静态
app.use(express.static("./public"));
//显示留言列表
app.get('/',(req,res)=>{
    res.render("index");
});
//处理留言
app.post('/tijiao',(req,res)=>{
    var form = new formidable.IncomingForm();

    form.parse(req,(err,fields)=>{
        console.log(fields.name+fields.tes);
        //写入数据库
        db.insertOne("mes",{
            "name":fields.name,
            "tes":fields.tes,
            "time": new Date()
        },(err,result)=>{
            if(err){
                console.log("shibai");
                res.json({"res":"-1"});
                return;
            }
            console.log(res);
            res.json({"res":"1"});
            res.end("1");
        })
    })
})
//读取；留言
app.get("/du",(req,res)=>{
    db.find("mes",{},(err,result)=>{
        res.json({"res":result});
    })
})






// //静态
// app.use(express.static("./public"));
// //显示留言列表
// app.get("/", function (req, res, next) {
//     db.getAllCount("liuyanben",function(count){
//         res.render("index",{
//             "pageamount" : Math.ceil(count / 20)
//         });
//     });
// });
//
// //读取所有留言，这个页面是供Ajax使用的
// app.get("/du", function (req, res, next) {
//     //可以接受一个参数
//     var page = parseInt(req.query.page);
//
//     db.find("liuyanben",{},{"sort":{"shijian":-1},"pageamount":20,"page":page},function(err,result){
//         res.json({"result":result});
//     });
// });
//
// //处理留言
// app.post("/tijiao", function (req, res, next) {
//     var form = new formidable.IncomingForm();
//
//     form.parse(req, function (err, fields) {
//         //写入数据库
//         db.insertOne("liuyanben", {
//             "xingming" : fields.xingming,
//             "liuyan" : fields.liuyan,
//             "shijian" : new Date()
//         }, function (err, result) {
//             if(err){
//                 res.send({"result":-1}); //-1是给Ajax看的
//                 return;
//             }
//             res.json({"result":1});
//         });
//     });
// });
//
//
// //删除
// app.get("/shanchu",function(req,res,next){
//     //得到参数
//     var id = req.query.id;
//     db.deleteMany("liuyanben",{"_id":ObjectId(id)},function(err,result){
//
//         res.redirect("/");
//     });
// })

app.listen(80);
