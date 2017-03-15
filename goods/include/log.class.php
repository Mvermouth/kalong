<?php
//记录信息到日记上
//思路
/*
 给定内容，写入文件，如果文件大于1M，重新写一份
 
 * 
 * */
//传给我一个内容，判断当前的大小，is就备份，不是就写
class Log{
	const LOGFILE='curr.log'; //一个常量保存名字，代表日记名字
	//写入日记
	public static function write($cont){
		//判断大小 self 自身静态方法
		//判断是否备份
			$cont .= "\r\n";
			$log=self::isback();
			$dh=fopen($log,'ab');
			fwrite($dh,$cont);
			fclose($dh);
			
	}
	//备份
	public static function back(){
		//把$log文件改个名字存起来
		//改成年月日可直观看得懂的意思  rename()
		$log=ROOT.'data/log/'.self::LOGFILE;
		$baktime=ROOT.'data/log/'.date('ymd').mt_rand(10000,99999).'bak';
		
		//rename(ROOT.'data/log/'.date('j,n,y'),$log);
		return rename($log,$baktime);
		
		
	}
	//读取并判断大小
	public static function isback(){
		//把文件路径存起来
		$log=ROOT.'data/log/'.self::LOGFILE;
		//判断是否存在，没有就创建
		if(!file_exists($log)){
			touch($log);//快速创建文件
			return $log;
		}
		//判断大小
		//清除缓存
		clearstatcache(true,$log);
		$size=filesize($log);
		if($size<1024*1024){
			return $log;
		}
		//大于1M怎么半,zoudao这一步
		if(!self::back()){
			return $log;
		}else{
			touch($log);
			return $log;
		}
	}
}
?>