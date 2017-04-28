var http=require('http');
var url=require('url');
var fs=require('fs');
const path=require('path');

http.createServer((req,res)=>{
	if(req.url =='/favicon.ico'){
		return
	}
	pathName=url.parse(req.url,true).pathname;
	console.log(pathName);
	if(pathName=='/'){
		pathName='/index.html';
	}
	extName=path.extname(pathName);
	console.log(pathName);
	fs.readFile('./static'+pathName,(err,data)=>{
		if(err){
			fs.readFile('./static/404.html',(err,data)=>{
				res.end(data);
			})
			return
		}else{
			var ext=getMine(extName)
			res.writeHead(200,{'Content-type':ext})
			//console.log('dudao');
			res.end(data);
		}
	})

	//res.end();
}).listen(3000,'127.0.0.1');

function getMine(extname){
	// switch(extname){
	// 	case './html':
	// 		return 'text/html;charset=UTF-8';
	// 		break;
	// 	case './jpg':
	// 		return 'image/jpeg';
	// 		break;

	// }
	fs.readFile('./Mime.json',(err,file)=>{
		if(err) throw err;
		//console.log(typeof file);
		//Sjson=JSON.parse(file);
		var j=eval('(' + file + ')');
		console.log(typeof file);
		if(j.extname){
			return j.extname;
		}
		//console.log(j.xlw);
		//res.end(file);
	})
}