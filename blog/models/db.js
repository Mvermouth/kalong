/**
 * Created by Administrator on 2017/5/11.
 */
//引包
var mongoose = require('mongoose');
//创建数据库连接
mongoose.Promise = global.Promise;
var db      = mongoose.createConnection('mongodb://127.0.0.1:27017/blog');
//监听open事件
db.once('open', function (callback) {
    console.log("数据库成功连接");
});
//向外暴露这个db对象
module.exports = db;/**
 * Created by Administrator on 2017/5/12.
 */
