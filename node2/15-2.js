var http=require('http');
var fs=require('fs');
http.createServer((req,res)=>{
	res.end('succ');
}).listen(80,'127.0.0.1');