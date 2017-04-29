var file=require('../models/file.js')

//暴露中间价

exports.showIndex=function(req,res){
	// res.render('index',{
	// 	'photoBox': file.getAllPhoto()
	// });
	file.getAllPhoto((box)=>{
		res.render('index',{
			'photoBox': box
		});
	})
}

exports.showPhoto=function(req,res){
	res.send('i am photo'+req.params.photoName);
}