/**
 * Created by Administrator on 2017/5/12.
 */
var mongoose = require('mongoose');
var db = require("./db.js");
//创建了一个schema结构。
var blogSchema = new mongoose.Schema({
    title     :  {type : String},
    content   :  {type : String},
    comments  :  [{ body: String, date: Date }],
});
blogSchema.methods.addComments=function (obj,callback) {
    //自己把评论丢尽自己
    this.comments.push(obj);
    //保存
    this.save();
    console.log("评论陈功");
}
var blogModel = db.model('Blog', blogSchema);
module.exports=blogModel;