/**
 * Created by Administrator on 2017/5/5.
 */
const fs = require("fs");
const gm = require("gm");
//图片缩略
gm('./l.jpg')
    .resize(50, 50,"!")
    .write('./l2.jpg', function (err) {
        if (err) {
            console.log(err);
        }
    });