const express= require('express');
const app=express();
const router=require('./controller')
//const http=require('http');

//模版
app.set('view engine','ejs');
//public公共 中间介
app.use(express.static('./public'));//可以用next
app.use(express.static('./upload'));

app.get('/',router.showIndex);

//上存页面
app.get('/up',router.showUp);
app.post('/up',router.doUp);
//app.get('/',router.showIndex);
app.get('/:photoName',router.showPhoto);



//最后use z中间
app.use((req,res)=>{
	res.render('err',{
		"baseUrl":req.pathname
	});
})
app.listen(80,'127.0.0.1');
