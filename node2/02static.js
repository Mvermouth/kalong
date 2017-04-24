var http=require('http');//引包
var fs=require('fs');
var server=http.createServer((req,res)=>{//创建服务器 参数是回调函数
	//req =请求 res=响应
	if(req.url=='/jiu'){
		fs.readFile('02.html',(err,data)=>{
			res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'});
			res.end(data);
		})
	}else if(req.url=='/jjj'){
		fs.readFile('002.html',(err,data)=>{
			res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'});
			res.end(data);
		})
	}else if(req.url=='/1.jpg'){	
		fs.readFile('1.jpg',(err,data)=>{
			res.writeHead(200,{'Content-type':'images/jpg'});
			res.end(data);
		})
	}else{
		res.writeHead(404,{'Content-type':'text/html;charset=UTF-8'});
		res.end('404');
	}
	
	
})
//运行服务器
server.listen(3000,'127.0.0.1');