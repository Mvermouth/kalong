const http=require('http');
http.createServer((req,res)=>{
	console.log(req.url);
	res.end();
}).listen(3000,'127.0.0.1')