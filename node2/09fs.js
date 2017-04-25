const fs= require('fs');
const http=require('http');

http.createServer((req,res)=>{
	res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'})
	fs.mkdir('./2.txt',()=>{
		console.log('it is ok');
	})
	res.end();
}).listen(3000,'127.0.0.1');