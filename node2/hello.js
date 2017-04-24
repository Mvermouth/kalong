var http=require('http');//引包
var server=http.createServer((req,res)=>{//创建服务器 参数是回调函数
	//req =请求 res=响应
	res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'});
	res.end('fuck'+(1+2+3)+'s');
})
//运行服务器
server.listen(3000,'127.0.0.1');