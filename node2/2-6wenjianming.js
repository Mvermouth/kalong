const http=require('http');
const querystring = require('querystring');
const formidable=require('formidable');
const fs=require('fs');
const path=require('path');

http.createServer((req,res)=>{
	 if (req.url == '/dupost' && req.method.toLowerCase() == 'post') {
    // parse a file upload
	    var form = new formidable.IncomingForm();
	    //设置文件上存路径
	    form.uploadDir = "./upload";
	    //执行的时候说明文件已经全收到了
	    form.parse(req, function(err, fields, files) {

	    	console.log(fields);
	    	console.log('./upload/'+getName()+path.extname(files.fil.name));
	    	console.log(files.fil.type);
	    	console.log(files.fil.name);
	    	console.log('./'+files.fil.path);
	    	fs.rename('./'+files.fil.path,'./upload/'+getName()+path.extname(files.fil.name),()=>{
	    		console.log('gaimingok')
	    	})
		     res.writeHead(200, {'content-type': 'text/plain'});
		     //res.write('received upload:\n\n');
		     //res.end(util.inspect({fields: fields, files: files}));
		     res.end('ok');
	    });

	    return;
	  }
}).listen(80,'127.0.0.1');


function getName(){
	return Math.floor(Math.random(100000,99999)*1000);
}