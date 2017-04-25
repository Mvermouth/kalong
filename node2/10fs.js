const fs= require('fs');
const http=require('http');

http.createServer((req,res)=>{
	var tree=[];
	res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'})
	fs.readdir('./',(err,files)=>{
		if(err){
			throw err;
		}else{
			for(var i=0;i<files.length;i++){
				var fname=files[i]
				fs.stat('./'+fname,(err,stats)=>{
					if(stats.isDirectory()){
						tree.push(fname);
					}
					console.log(tree);
				})
			}
		}
	})
	console.log(tree);
	res.end();
}).listen(3000,'127.0.0.1');