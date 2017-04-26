const fs= require('fs');
const http=require('http');

http.createServer((req,res)=>{
	var tree=[];
	if(req.url=='favicon.ico'){
		return
	}
	res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'})
	fs.readdir('./a/',(err,files)=>{//file是数组
		if(err){
			throw err;
		}else{
			(function iteration(i){//强行异步变成同步 成为迭代器
				if(i >= files.length){
					console.log(tree);
					return
				}
				fs.stat('./a/'+files[i],(err,stats)=>{
					if(stats.isDirectory()){
						tree.push(files[i]);
					}
					iteration(i+1);
				})
			})(0)
			
		}
	})
	//console.log(tree);
	res.end();
}).listen(3000,'127.0.0.1');