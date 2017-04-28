const fs= require('fs');
const http=require('http');

http.createServer((req,res)=>{
	var num=Math.random();
	res.writeHead(200,{'Content-type':'text/html;charset=UTF-8'})
	fs.writeFile('./1.txt','helo',(err) => {
		if(err){
			 throw err;
		}else{
			console.log('ok'+num);
			
		}
	})
	res.end('ok'+num);
	//console.log(2);
}).listen(3000,'127.0.0.1');
