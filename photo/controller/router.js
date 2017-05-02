var file=require('../models/file.js');
const formidable=require('formidable');

//暴露中间价

exports.showIndex=function(req,res){
	// res.render('index',{
	// 	'photoBox': file.getAllPhoto()
	// });
	file.getAllPhoto((err,box)=>{
		if(err){
			res.writeHead(404,{'Content-type':'text/html;charset=UTF-8'})
			res.end(err);
			return;
		}
		res.render('index',{
			'photoBox': box
		});
	})
}

exports.showPhoto=function(req,res){
	//res.send('i am photo'+req.params.photoName);
	//遍历相册所有图片
	var albumName=req.params.photoName;
	//res.end();
	// res.render('photo',{
	// 	"albumName":albumName,
	// })
	file.getAllPic(albumName,(err,pic)=>{
		if(err){
			res.writeHead(404,{'Content-type':'text/html;charset=UTF-8'})
			res.end(err);
			return;
		}
		res.render('photo',{
			"albumName":albumName,
			"picArr":pic
		})
		
		//res.end();
	})
	
}

//上存
exports.showUp=function(req,res){
	// res.render('up');
	file.getAllPhoto((err,file)=>{
		if(err){
			res.writeHead(404,{'Content-type':'text/html;charset=UTF-8'})
			res.end(err);
			return;
		}
		res.render('up',{
			'photoBox': file
		});
	})
}
exports.doUp=function(req,res){
	if (req.url == '/up' && req.method.toLowerCase() == 'post') {
    // parse a file upload
	    var form = new formidable.IncomingForm();
	    //设置文件上存路径
	    //form.uploadDir = "./upload";
	    //执行的时候说明文件已经全收到了
	    form.parse(req, function(err, fields, files) {
	    	console.log(fields);
	    	console.log(files);
		    res.end('ok');
	    });

	    return;
	  }
}