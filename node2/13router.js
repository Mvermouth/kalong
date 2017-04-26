var http=require('http');
var url=require('url');
var fs=require('fs');

http.createServer((req,res)=>{
	pathName=url.parse(req.url,true).pathname;
	console.log(pathName);
	fs.readdir('.'+pathName,(err,data)=>{
		if(err){
			throw err;
		}else{
			res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'})
			console('dudao');
		}
	})

	//res.end();
}).listen(3000,'127.0.0.1');