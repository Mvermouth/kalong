const express= require('express');
const app=express();
const router=require('./controller')
//const http=require('http');

//模版
app.set('view engine','ejs');
//public公共 中间介
app.use(express.static('./public'));

app.get('/',router.showIndex);
//app.get('/',router.showIndex);
app.get('/:photoName',router.showPhoto);
app.listen(80,'127.0.0.1');
