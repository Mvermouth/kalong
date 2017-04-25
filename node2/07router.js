const http=require('http');
const url=require('url');
http.createServer((req,res)=>{
	res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'})
	var urlS=req.url;
	console.log(urlS);
	if(urlS.substr(0,9)=='/student/'){
		if(/^\d{10}$/.test(urlS.substr(9))){
			res.end('id:'+urlS.substr(9));
		}
	}else if(urlS.substr(0,9)=='/teacher/'){
		if(/^\d{6}$/.test(urlS.substr(9))){
			res.end('teId:'+urlS.substr(9))
		}
	}else{
		res.end('gun');
	}
}).listen(3000,'127.0.0.1');