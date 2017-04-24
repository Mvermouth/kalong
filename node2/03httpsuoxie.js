const http=require('http');
http.createServer((req,res)=>{
	console.log('it is ok');
	res.write('it is ok2');
	res.end('it is end');
}).listen(3000,'127.0.0.1');