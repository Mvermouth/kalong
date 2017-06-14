/**
 * Created by Administrator on 2017/6/12.
 */
const formidable = require("formidable");
const mongoose=require("mongoose");
const Blog = require("../models/Blog.js");

//all
exports.showAll=function (req,res) {
    Blog.find().sort({_id:"-1"}).exec((err,result)=>{
        if(result.length == 0){
            res.send("kong")
        }else{
            res.send(result)
        }
    })
}
// one
exports.showOne=function (req,res) {
    console.log(req.param("id").length)
    if(req.param("id").length !=12 && req.param("id").length !=24){
        res.send("没有这个哦")
    }else{
        var __id = mongoose.Types.ObjectId(req.param("id"));
        console.log(__id);
        Blog.find({_id:__id},(err,result)=>{
            if(err) throw err;
            if(result.length!=0){
                res.send(result);
            }else{
                res.send("没有这个文章哦")
            }
        })
    }
}
//allNum --提供将来翻页功能
exports.showAllNum=function (req,res) {
    Blog.find().sort({_id:"-1"}).exec((err,result)=>{
        if(err) throw err;
        //console.log(result.length);
        res.send(result.length.toString());
    })
}
//页数
exports.showPage=function (req, res) {
    //条数
    var t=3;
    //页数
    var page= req.param("page");
    var skip=page*t;
    Blog.find().sort({_id:"-1"}).limit(t).skip(skip).exec((err,result)=>{
        console.log(result);
        res.send(result);
    })
}
//返回最新
exports.showLast=function (req,res) {
    Blog.find().sort({_id:"-1"}).exec((err,result)=>{
        console.log(result);
        res.send({
            "r":result,
            "f":result[0]
        })
    })
}
//接收写的，写入数据库
exports.doWrite=function (req,res) {
    var form = new formidable.IncomingForm();
    form.parse(req, (err, fields) => {
        //console.log(fields.usename+md5(fields.password));
        //写入数据库
        console.log(fields);
        Blog.create(fields,function(err){
            if(err){
                console.log("no");
                return;
            }
            console.log("保存成功");
            res.send("1");
        });
        //res.send("1")
        //res.end();
    })
}
