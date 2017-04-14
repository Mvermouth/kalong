古老的ajax
一.http 1.利用204状态码;
二.图片加载的特性;ddd 

现代的ajax
XMLHttpRequest
分析
	1.如何创建对象
		1.new XMLHttpRequest()就可以
		2.低版本的 new window ActiveXObject('Microsoft.XMLHTTP') 很长很长的
	2.如何请求后台资源
		分析http协议，要请求需要明确的因素
		1.什么方法请求
			get post put delete head 
		2.请求资源的url
		3.同步还是异步
	3.请求到的结果如何得到
		xhr本身有属性 responseText 代表返回值
	4.xhr对象请求和响应过程中 状态码会逐步变化
		添加事件监听
		xhr的readystatus 的状态为4则为成功

xhr属性详解

返回值
	1.xml
	2.普通文档
	3.直接大段html代码
	4.json ->其实原来没有这个 只是刚刚好js能很好解释

异步原理 状态码
	0：创建就是0
	1：成功open就1
	2：接收头信息2
	3：接收主体信息就是3
		3出现多次是因为在传输的过程中
	4：成功后就是4

	回调会强行插队在3之后（单线程）
iframe伪装ajax上存文件

file API->大文件切割上存
 		* file API继承自Blob
        * Blob有slice方法，截取二进制一部分
        思路
        	1.截取10M上存，判断有没有截取完毕->while 有就一直切

FormData->new FormData();
	1.可以从表单获得数据，也可以自己写数据
	
进度条
	ev.loaded/ev.total
	ev里面的东西

ajax跨域取决于对方服务器的应答
	对方原意接收远方的ajax请求，可以在header头信息中+head什么什么的

反向ajax
	comet反向ajax
	又叫服务推技术，sever push
	实时聊天
		思路，原理
			1.服务器端不要断开链接，有消息再发送，发完也不断
			http的chunk传输->有切割分块的意思
			服务器端也不知道要传输多少length给浏览器，所以每次传一小块
			2.php用一个死循环始终运行，有相关消息就把消息推倒浏览器上
comet最简单的模型就是利用php
聊天功能，用iframe嵌套，然后使用模型，iframe会不断得到服务器推送的消息


create table msg(
    id int unsigned auto_increment primary key,
    res varchar(100) not null default '',
    pos varchar(100) not null default '',
    is_r tinyint unsigned not null default 0,
    content varchar(100) not null default 0
)engine myisam charset utf8;
