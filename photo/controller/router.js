var file=require('../models/file.js')

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