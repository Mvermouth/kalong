const http=require('http');
const querystring = require('querystring');
http.createServer((req,res)=>{
	if(req.url == '/dupost' && req.method.toLowerCase()=='post'){
		var allData='';
		//接受一小段就可能去服务别人 怕太大阻塞
		req.addListener('data',(chunk)=>{
			allData += chunk;
			console.log(chunk);
		})
		//接收完毕后
		req.addListener('end',()=>{
			//allData += chunk;
			//得到的是字符村，转为obj
			console.log(querystring.parse(allData.toString()));
			res.end('ok');
		})
	}
}).listen(80,'127.0.0.1');