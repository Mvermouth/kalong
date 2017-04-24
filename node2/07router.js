const http=require('http');
const url=require('ulr');
http.createServer((req,res)=>{
	res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'})
	var urlS=url.parse(req.url);
	if(urlS.substr(0,9)=='/student/'){
		if(/^\d{10}$/.test(urlS.substr(9))){
			res.end('id:'+urlS.substr(9));
		}
	}else if(urlS.substr(0,9)=='/teacher/'){

	}
}).listen(3000,'127.0.0.1');