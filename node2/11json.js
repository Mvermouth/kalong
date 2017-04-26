var http =require('http');
var fs =require('fs');

http.createServer((req,res)=>{
	fs.readFile('./Mime.json',(err,file)=>{
		if(err) throw err;
		//console.log(typeof file);
		//Sjson=JSON.parse(file);
		var j=eval('(' + file + ')');
		console.log(typeof file);
		console.log(j.xlw);
		res.end(file);
	})
}).listen(3000,'127.0.0.1');