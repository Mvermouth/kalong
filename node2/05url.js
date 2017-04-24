const http=require('http');
const url=require('url');
http.createServer((req,res)=>{
	console.log(url.parse(req.url,true).query.nvshen)
	//console.log(req.url);
	res.end();
}).listen(3000,'127.0.0.1')