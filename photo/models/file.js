const fs=require('fs');

exports.getAllPhoto=function(callback){
	//写文件夹
	//
	fs.readdir('./upload',(err,file)=>{
		var box=[];
		if(err){
			callback('目录不存在',null);
			return;
		}
		(function iteration(i){
			if(i >= file.length){
				console.log(box);
				callback(null,box);
				return;
			}
			fs.stat('./upload/'+file[i],(err,stats)=>{
				if(err){
					callback('子目录不存在',null);
					return;
				}
				if(stats.isDirectory()){
					box.push(file[i]);
				}
				iteration(i+1);
			})
		})(0)
		
		//console.log(file);
		
	})
	

	//return ['a','b'];
}
exports.getAllPic=function(albumName,callback){
	fs.readdir('./upload/'+albumName,(err,file)=>{
		var picBox=[];
		if(err){
			callback('目录不存在',null);
			return;
		}
		(function iteration(i){
			if(i >= file.length){
				console.log(picBox);
				callback(null,picBox);
				return;
			}
			fs.stat('./upload/'+albumName+"/"+file[i],(err,stats)=>{
				if(err){
					callback('文件不存在',null);
					return;
				}
				if(stats.isFile()){
					picBox.push(file[i]);
				}
				iteration(i+1);
			})
		})(0)	
	})
	// 同步
	//var a=fs.readdirSync("./upload/"+albumName);
	//console.log(a);
	//callback(null,a);
	
}