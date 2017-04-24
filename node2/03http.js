const http=require('http');
//创建一个服务气 回调表示接收到请求之后要干的事
var server =http.createServer((req,res)=>{
	//req 请求 res响应
	console.log('请求'+req.url);
	res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'})//返回头
	res.end('<h1>hh</h1>');//必须写 不然一直请求小菊花 后面也不能写语句
})
//监听一个端口
server.listen(3000,'127.0.0.1');