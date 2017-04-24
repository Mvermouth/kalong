const http=require('http');
const url=require('url');
http.createServer((req,res)=>{
	var urlObj=url.parse(req.url,true).query;
	var name=urlObj.name;
	var age=urlObj.age;
	res.end('it is ok'+name+age);
}).listen(3000,'127.0.0.1')