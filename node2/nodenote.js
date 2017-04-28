1.js执行不是靠浏览器，是靠执行引擎
2.主要看引擎！

使用
	1.先引用需要的模块，他提供了很多！
1.安装express框架

1.留言板
	根目录；留言列表
	/fa  发布
	/msg/x 查看留言
mongodb
安装 cnpm install mongodb --save
启动 D:\mongodb\mongodb\bin>mongod --dbpath=D:\mongodb\db --logpath=D:\mongodb\logs\mongodb.log --install



nodejs学习2
单线程 非阻塞i/o 事件驱动-->其实就是一个整体事件

req =请求 res=响应

//运行服务器
server.listen(3000,'127.0.0.1');
node 运行路径名 光标没返回是挂起状态
nodejs没有根目录 本质上是没有web容器
顶层路由设置 呈递某一个静态文件

http的end和write必须写字符窜

req.url路由重点

识别url
	1.url模块
		url.parse->手册
	2.querystring模块->字符窜查询
fs 文件操作

模块笔记------->就是一个功能的封装
exports 暴露属性
可以 暴露很多 但是用一个文件接收，无形之中形成了一个顶层命名空间
可以暴露 函数 变量 
使用者就只需要require一次
module.exports = 构造函数名  可以用new来实例化

package.json 就是个json文件->有个入口模块->要放到模块文件夹的根目录去->可以用来管理依赖
不写'./' 就是引用node_modules 特殊路径
npm其实也是一个工具名字

绝对路径 __dirname 模块引用尽量用这个
模块引用不需要 但是fs包引用文件需要 __dirname 跨平台兼容

模块就是js与js之间的关系

require()别的js文件的时候，将执行那个js文件

{
	require()中的路径，是从当前这个js文件出发，找到别人。而fs是从命令提示符找到别人。
	所以，桌面上有一个a.js， test文件夹中有b.js、c.js、1.txt
	a要引用b：
	1var b = require("./test/b.js");
	b要引用c：
	1var b = require("./c.js");
	
	但是，fs等其他的模块用到路径的时候，都是相对于cmd命令光标所在位置。
	所以，在 b.js中想读1.txt文件，推荐用绝对路径：
	1fs.readFile(__dirname + "/1.txt",function(err,data){
	2	if(err) { throw err; }
	3	console.log(data.toString());
	4});
}

js别互相引，会死无穷

三、post请求

	1  var alldata = "";
	2        //下面是post请求接收的一个公式
	3        //node为了追求极致，它是一个小段一个小段接收的。
	4        //接受了一小段，可能就给别人去服务了。防止一个过大的表单阻塞了整个进程
	5        req.addListener("data",function(chunk){
	6            alldata += chunk;
	7        });
	8        //全部传输完毕
	9        req.addListener("end",function(){
	10            console.log(alldata.toString());
	11            res.end("success");
	        });

上存文件 formidable->坚信  你需要的功能 前辈们都已经打包好了
util 调试工具