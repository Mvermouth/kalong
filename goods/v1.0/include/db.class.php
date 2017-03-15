<?php
//数据库类 目前还不清楚用什么数据库
abstract class db{
	public abstract function connect($h,$u,$p);//连接服务器 return bool值
	//public abstract function choose($dbName);
	//public abstract function setChar($charset);
	public abstract function query($sql);//发送查询   parms $sql 发送sql语句，return mixed bool或者resource
	/*
	 	查询多行数据
	 	$sql select语句
	 	return 数组或者bool
	 * */
	public abstract function getAll($sql);
	/*
	 	查询单行数据
	 * */
	public abstract function getRow($sql);
	//单个数据
	public abstract function getOne($sql);
	//自动执行insert和update语句
	//$this->autoExecute('user',array('usename'=>'kalong','email'=>'498@qq.com'),'insert');
	public abstract function autoExecute($table,$date,$act='insert',$where='');
}

?>