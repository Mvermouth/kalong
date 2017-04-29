const fs=require('fs');

exports.getAllPhoto=function(callback){
	//写文件夹
	//
	fs.readdir('./upload',(err,file)=>{
		var box=[];
		(function iteration(i){
			if(i >= file.length){
				console.log(box);
				callback(box);
				return;
			}
			fs.stat('./upload/'+file[i],(err,stats)=>{
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