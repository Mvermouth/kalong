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

