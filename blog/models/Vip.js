/**
 * Created by Administrator on 2017/5/12.
 */
var mongoose = require('mongoose');
var db = require("./db.js");
//创建了一个schema结构。
var vipSchema = new mongoose.Schema({
    usename     :  {type : String},
    password   :  {type : String}
});
var vipModel = db.model('Vip', vipSchema);
module.exports=vipModel;