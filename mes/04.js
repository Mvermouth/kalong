/**
 * Created by Administrator on 2017/5/4.
 */
const express = require("express");
const app=express();
const cookieParser = require('cookie-parser');
app.use(cookieParser());
app.get('/', function(req, res) {
    console.log('Cookies: ', req.cookies);
    res.cookie('rememberme', '1', { maxAge: 900000, httpOnly: true });
    res.end();
})
app.listen(3000,'127.0.0.1');