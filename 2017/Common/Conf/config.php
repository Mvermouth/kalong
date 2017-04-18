<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  '2017',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
//***********************************SESSION设置**********************************
    'SESSION_OPTIONS'         =>  array(
    'name'                =>  'name',                    //设置session名
    'expire'              =>  3600,                      //SESSION保存15天
    'use_trans_sid'       =>  1,                               //跨页传递
    'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
),
);