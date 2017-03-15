<?php

/*
 * 1变量类型：
 * 八种：整形，浮点型，字符窜，布尔，数组，对象，null，资源
 * 2获取变量类型：
 *    1.gettype();
 *    2.is系列:is_int,is_bool,is_object,is_float..
 * 3.变量检测.打印
 * 	 	1.echo 字符窜；
 * 		2.print_r 数组；
 * 		3.var_dump 打印变量的类型以及值		
 * 4.类型转换
 * 		1.数字 字符窜（str）+数字（int）=数字（int）
 * 			字符窜到数字的转换，从左到右截取，碰到非法数字，截取出来的数字部分变成数字
 * 		2.布尔值（非零即真）；
 * 			假："","0",0, 0.0 , null ,false , array()空数组;
 * 5.赋值
 * 		1传递赋值；
 * 		2引用赋值 & 
 * 6.销毁变量 unset
 * 		1.isset 存在
 * 		2.unset 销毁
 * 7.动态变量名
 * 		变量的值可以作为变量名
 * 8.三元运算
 *    ?  :
 * 9.字符窜运算符
 *		1  .   
 * 		2 echo $a ,$b 比 echo $a.$b 运算速度快
 * 10.函数
 * 		跟js差不多;注意作用域不同
 * 11.函数作用域;
 * 		1.在php页面中声明的变量是全局变量
 * 		2.函数里面是局部变量
 * 		3.global 声明全局；
 * 		4.超级全局变量，在页面任何部分包括函数和方法都可直接访问 ($_GET);
 * 12.获取用户提交的数据
 * 		1.$_GET;
 * 		2.$_POST;
 * 		3.获取用户ip地址: $ip = $_SERVER["REMOTE_ADDR"];
 * 13.时间戳函数
 * 		1970.1.1 00.00.00到现在的秒数
 * 		2.strtotime() 获取任何时间
 * 		3.checkdate()
 * 14.数组
 * 		1.索引数组 count()
 * 		2.关联数组
 * 15.数组常用函数
 * 		1.
 * 16.超级全局变量
 * 		1.$_GET()
 * 		2.$_POST()
 * 		3.$_REQUEST()
 * 		4.$_ENV()  服务qi操作环境变量
 * 		5.$_SERVER()
 * 		6.$GLOBALS 可以函数内修改变量，不推荐使用
 * 17.常量
 * 		1.声明后不能修改
 * 		2.命名规范：习惯用全是大写，常量面前不＋$
 * 		3.不能修改，不能销毁，不能重新声明
 * 		4.define
 * 		5.全局有效
 * 		6.检测常量 defined
 * 		7.constant  返回一个常量的值
 * 18.文件包含
 * 		1.代码重用
 * 		2.include('');
 * 		3.include_once 只能生效一次
 * 		4.require 致命错误
 * 		5.require_once
 * 19.进制
 * 20.文件
 * 		1.opendir() 打开
 * 		2.readdir()	读名
 * 		3.地址栏的 ?x=/
 * 		4.$_SERVER[] 服务
 * 21.静态变量
 * 		1.static变量，第一次函数调用之后存在，且不随函数结束而结束，再次调用用上一次保留的结果
 * 22.sql操作
 * 		1.查询表 show table
 * 		2.插入数据 insert into 表名  (字段) values (值)
 * 		3.select *from tableName  查看表内容 
 * 		4.查看表结构 desc tableName
 * 		5.列与值要严格对应
 * 		6.数字不+引号，字符窜要+引号
 * 		7.SELECT COUNT(id) FROM tablename 查询表里有多少条数据
 * 		8.update 更新 =>  update tableName set 字段=? where 字段=?
 * 		9.delete 删除
 * 		10.查 select  *是代表所有列
 * 23.查询模型（重要）
 * 		1.函数	
 * 		2.concat  substring。。。
 * 24.null
 * 		1.is null
 * 		2.is not null
 * 25.group 分组与统计函数=>比较耗资源
 * 		1.max()
 * 		2.min
 * 		3.sum 计算
 * 		4.avg
 * 		5.count 列
 * 26.having
 * 		1.筛选结果，对计算结果操作
 * 		2.having + 条件
 * 27.order by
 * 		1.排序
 * 		2.降序 desc
 * 		3.升序 asc
 * 28.limit  限制取出条目
 * 		1.limit 两个参数
 * 29.查询陷阱 只会读取第一条 不会形容
 * 30.where 子查询 
 * 		1.解决 查询陷阱
 *		2.内层查询结果作为外层查询条件
 * 31.from 子查询
 * 32.exists 
 * 		where跟from都能完成
 * 33.内联查询 
 * 		1.连接起来 inner join
 * 		2.条件 on ??=??
 * 34.左连接
 * 		1.left join
 * 		2.以左边为主 ，右面没有匹配到就null
 * 	35.右连接
 * 		1.right join
 * 		2.………………；
 * 36.两表联查 而且共同用到一个列 要取别名区分，不然模糊错误
 * 37.union查询
 * 		1.把2条或者多条sql查询结果合并成1个结果集
 * 		2.必须满足条件：各语句取出的列数要相同
 * 		3.列名称会使用第一条sql语句的列名称
 * 		4.完全相等的行将会被合并
 * 		5.合并是很耗时的工作
 * 		6.union all将会避免合并
 * 		7.union语句不用写order by
 * 38.建表 ddl
 * 		1.建表就是声明列名的过程
 * 		2.列的类型，属性
 * 39.整形列
 * 		1.tinyint 1字节8位数  -127~-128  0~255
 * 		2.smallint 2字节
 * 		3.mediumint 3字节
 * 		4.int 4字节
 * 		5.bigint 8字节
 * 		6.默认带符号
 * 		7.unsigned 无符号
 * 		8.zerofill 自动补零 多用于规定宽度
 * 		9.zerofill填充宽度 ，自动unsigned
 * 		10.M一定配合zerofill才有意义 不然凉拌
 * 40.浮点列与定点列
 * 		1.float 小浮点 M.D  M是总位数  D标度 代表小数点后面的位数
 * 		2.float 比较小但是比int大，有精度损失
 * 		3.double 比较大，有精度损失
 * 		7.decimal 没精度损失
 * 41.字符型列
 * 		1.char 定长 不够内部空格补位 尾巴空格不见 速度比较快 
 * 		2.varchar 空格都在
 * 		3.限制的是字符
 * 		4.text
 * 		5.blob 二进制  存什么都行
 * 		6.enum（value1，value2） 适合用于性别 只能在给定的范围内选，选1个
 * 		7.set（v1，v2） 可多选
 * 42.日期时间类型
 * 		1.year
 * 		2.date 日期
 * 		3.time
 * 		4.datatime
 * 43.列的默认值
 * 		1.null 查询不方便，索引效率不高
 * 		2.声明列 为not null，default默认值为
 * 44.主键与自增
 * 		1.primary key 此列不重复 区分每一行
 * 		2.AUTO_INCREMENT 只能有一个自增列 且必须加索引
 * 45.建表原则
 * 		1.定长与变长分，常用与不常用分
 * 46.新增一列
 * 		1.alter table 表名 add 列名 （属性什么什么鬼）
 * 		2.默认在最后
 * 		3.有选择位置地放 alter table 表名 add 列名 （属性什么什么鬼） after  列名
 * 		4.改属性 alter table 表名 change 列名 新列明 属性
 * 		5.modify 不能改名
 * 47. 删除列
 * 		1.alter table 表名 drop column 列名
 * 48.view 视图
 * 		1.creates view 表名 as 。。。。
 * 		2.称为虚拟表，是sql的查询结果，结果再作为表
 * 		3权限的管理，用view视图给指定的列
 * 		4.简化复杂的查询
 * 		5.视图修改 原表也会变 函数结果不能修改  即是一对一的能修改
 * 49. 视图的 algorithm
 * 		1.把视图的语句存起来，
 * 		2.查看视图时如果原表更改，视图的数据也会变化，逻辑语句还在。
 * 50.常用表操作
 * 		1.use 库
 * 		2.show tables
 * 		3.desc 表结构
 * 		4.drop 删除
 * 		5.show databases 查看库
 * 		6.set names gbk
 * 		7.查看建表过程的语句 show create table 表名 show create view。。。
 * 		8.清除表数据 truncate 表名
 * 		9.改表名 retuan table 表名 to 表名
 * 		10.查看所有表信息  show table status \G    where 条件单独一个表
 * 51.引擎的存储概念
 * 		Myisam ,批量插入速度快, 不支持事务,锁表 内存中
		Innodb, 批量插入相对较慢,支持事务,锁行. 安全
	52.字符J 乱码
			1.文字本来的字符与展示的字符J不同 所以乱码
			2.选 utf-8 
	53.索引的概念
			1.index 加速查询
 * 			2.降低了增删改的速度
 * 		3.key 普通索引
 * 		4.unique key 唯一
 * 		5.primary key 主索引
 * 		6.全文索引   中文无效
 * 		7.索引长度 例子unique key email(email(10))
 * 54.索引操作
 * 		1.查看 show index from 表名
 * 		2.删除 drop index 索引名 on 表名
 * 		3.    alter table 表名 drop index 索引名
 * 		4.添加alter table t20 add 类型index 索引名
 * 		5.添加主键索引 alter table 表名 add primary key（列名）  删除直接删 因为是唯一的
 * 55.sql函数
 * 		1.php获取数据 mysql_fetch_assoc();
 * 
 * 56.事务
 * 		1.都完成或者都没完成
 * 		1   原子性(Atomicity):事务是一个完整的操作。
		2   一致性（Consistency）：当事务完成时，数据必须处于一致状态。
		3   隔离性(Isolation):对数据进行修改的所有并发事务是彼此隔离的。
		4   持久性(Durability):事务完成后，它对于系统的影响是永久性的。
		5.开始 start transaction
		6.commit 结束
		7.rollback回滚
 */	
 面向对象
 /*
  	1.方法，属性，跟js差不多
  	2.类大写，方法小写，规矩
  * 3.注意写法 跟js不同
  * 4.属性值，可以声明属性并赋值，也可以声明不赋值，只能是一个直接的量 ，不能是过程
  * class Class{
  * 	public $属性=？？;
  * }
  * 实例化 $a= new Class()   跟js差不多
  * $a->age    ->相当于js的 . 注意这里属性不用写$
  * 5.方法
  * 	注意作用域 本身的方法要用$this
  * 	外部方法直接调用
  * 	5.3可以与外部方法重名不冲突
  * 6.构造函数-->初始化函数用的
  * 	1.__construct()
  * 	2.解决模版实例化的对象都是相同的问题
  * 	3.传参
  * 	4.new 创造 跟js
  * 	5.$arg里的格式要一致 不管你传不传
  * 	6.new 对象时申请内存
  * 7.析构函数
  * 	1。__destruct()
  * 	2.构造函数在对象产生的时候自动生成，
  * 	3.销毁对象 
  * 		1.显式销毁 unset或者赋值为null;
  * 		2.php是脚本语言，在执行到最后一行，所有申请的内存都释放掉
  * 	4.回收机制
  * 8.面向对象3大特征
  * 	1.封装，继承，多态
  * 9.封装概念
  * 	1.public 公共的
  * 	2.private 私有的 ，在外部不能被调用 就=把变量封起来了,要用方法把他拿出来,只能在内部操作
  * 		1.权限修饰F,用来说明方法属性的权限特点
  * 	3.protected 保护的
  * 10.继承		
  * 	1.以一个类为父，子有父的属性，方法
  * 	2.extends
  * 	3.只能继承一个父类
  * 	4.parent:: 用父的C有
  * 11.构造方法的继承
  * 12.mysql封装
  * 	1.连接数据库
  * 	2发送查询，对于select查询返回数据
  * 	3.可以关闭sql连接
  * 	4.思路
  * 		1.连接就得有参数 参数如何存
  * 			1.用配置文件 建议
  * 			2.可以在构造函数传参
  * 13.抽象类
  * 	1.无法new实例化
  * 	2.类前+ abstract
  * 	3.不能有方法体
  * 	4.有抽象方法则类必然是抽象类;
  * 	5.意义
  * 		1.facebook多国语言欢迎页面
  * 		2.扩展性强
  * 14.类常量
  * 	1.普通常量define('名'.'值')
  * 	2.专门在类内的常量
  * 	3.不可改的静态属性
  * 	4.类内常量用 const声明
  * 	5.前面不用public、$之类的修饰符,权限是public
  * 	6.self:: 访问常量值
  * 15.魔术常量
  * 	1.无法手动修改他的值，所以叫常量
  * 	2.但是值是随环境变化而变化的，所以叫魔术 		
  * */
 
//php 拿到sql数据
	/*
	$servername="localhost";
	$usename="root";
	$password="root";
	$conn=mysql_connect($servername,$usename,$password); //ip.帐号.密码
	if(!$conn){
		die("connect faile".mysqli_connect_error());
	}
	//echo "it is ok";
	mysql_select_db('test');
	mysql_set_charset('utf-8');
	$sql="SELECT * FROM goods WHERE goods_id=9"; //sql 语句
	$res=mysql_query($sql);
	$data=array();
	//print_r($res);
	if($res&&mysql_num_rows($res)>0){
		while($arr=mysql_fetch_assoc($res)){  // 每查询一次单条语句就用while循环存到进$data数组内
			$data[]=$arr; //结果装起来
		}
	}	

	 * 
	 * 
	 * 
	 * */
	//项目学到的
	/*
	 1.instanceof 这个实例是否这个类的什么什么鬼，返回bool
	 2.self
	 3.单例模式
	 		方法
	 			class A {
				    //静态属性 private    ---可以换protected ?
				    private static $_instance;
				     
				    //空的克隆方法，防止被克隆
				    private function __clone() {}
				     
				    //获取实例
				    public static function getInstance() {
				        if(!(self::$_instance instanceof self)) {
				          self::$_instance = new A();
				        }
				        return self::$_instance;
				    }
				}
 
					//调用
					$obj = A::getInstance();
	 * 4.__get()   __set();要用public
	 * 		1.__get() 可以直接对象用里面的参数，不解；  1个参数
	 * 		2.__set() 两个参数
	 * 5.array_key_exists
	 * 		返回bool，看键在数组里面没，2个参数
	 * 6.final 	
	 * 		如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。
	 * 7.str_replace()
	 * 		1.替换字符窜
	 * 8.substr() 截取字符窜 explode() 分隔	
	 * 9.dirname() 目录
	 * 10.文件目录操作
	 * 		1.目录操作：打开-读取-关闭-创建-命名-删除
	 * 			1.file_get_contents()->简单粗暴,可以读网络文件，封装好了打开关闭，一次全读出来放在内存里，上百M的要慎重->找不到回报错;
	 * 			2.file_put_contents()->简单粗暴，写入文件，封装好了->找不到就会创建
	 * 			3.fopen()打开一个文件返回一个句柄资源,两个参数，第二个是模式,rb模式是2进制不受编码影响
	 * 			4.fread()
	 * 			5.fwrite() 从文件头写入时是覆盖相等字节
	 * 			6.file() 直接读内容并按行拆分为数组; 不能读大 一次读入
	 * 			7.file_exists 是否存在目录
	 * 			8.filemtime返回修改时间
	 * 			9.feof判断是否结尾
	 * 			10.fgetscsv()
	 * 			11.unlink()  删除
	 * 			12.filesize 文件大小
	 * 			13.glob 匹配文件名字
	 * 			14.file_exists 文件是否存在
	 * 			15.rename()  改名
	 * 			16.touch()
	 * 		2.文件操作：打开-读-写-关闭-命名-删除
	 * 		3.目录操作
	 * 			1.opendir 打开
	 * 			2.readdir 读
	 * 			3.closedir 关
	 * 			4.is_dir是否有
	 * 			5.mkdir 创建
	 * 			6.rmdir 删除
	 * 			7.dirname()  父目录
	 * 
	 * 11.
	 * 		int stripos ( string $haystack , string $needle [, int $offset = 0 ] )
	 * 		stripos — 查找字符串首次出现的位置（不区分大小写）
	 * 12.touch()   快速创建文件
	 * 13.clearstatcache()   //清除缓存
	 * 		1.缓存是为了节省性能更快， 
	 * 14.递归
	 * 		1.递归创造目录
	 * 15.str_repeat
	 * 16.addslashes()  转义
	 * 17.无限极分类
	 * 		1.家谱树的应用
	 * 			2.面包屑导航
	 * 18.array_merge — 合并一个或多个数组
	 * 19.mvc
	 * 20.rtrim()删除字符村
	 * 		stripos — 查找字符串首次出现的位置（不区分大小写）
	 * 21.自动加载（类多了）
	 * 		1.__autoload() 需要时才加入！！！
	 * */
	
	//字符串方法
	/*
	 1.随机打乱 str_shuffle 
	 2.分隔字符 explode
	 3.basename( 获取文件名字
	 * 
	 * */

	//gd库
/*
 * 1.gd-info
 * 相关函数特点，学习方法
 *      1.参数特别多，不能死记-》最多11个
 *      2.理解绘图的过程
 *      3.理解屏幕坐标体系
 *  1.创建
 *      imagecreatetruecolor()  返回是资源类型
 *  2.创建颜料
 *      imagecolorallocate()    为一幅图像分配颜色 4个参数  画布资源  三 原 色
 *  相关函数
 *      1.getimagesize
 *      2.imagecopymerge
imagecopymerge — 拷贝并合并图像的一部分
        3.保存
 * */
?>

 create table infor(
 id int unsigned primary key auto_increment,
 usename char(10) not null default '',
 gender tinyint not null default 3,
 weight tinyint unsigned not null default 0,
 brithday Date not null default '0000-00-00',
 salary decimal(8,2) not null default '000000.00',
 lastlogin int unsigned not null default 0
 );


 create table sex(
 id int unsigned primary key auto_increment,
 usename char(10) not null default '',
 intre varchar(1500) not null default ''
 );