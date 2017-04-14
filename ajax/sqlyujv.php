<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 11:15
 */
create table msg(
    id int unsigned auto_increment primary key,
    res varchar(100) not null default '',
    pos varchar(100) not null default '',
    is tinyint unsigned not null default 0
)engine myisam charset utf8;
       create table comment(
    commit_id int unsigned auto_increment primary key,
   goods_id int unsigned not null default 0,
   use_id int unsigned not null default 0,
   email varchar(50) not null default '',
   content varchar(140) not null default '',
   time int unsigned not null default 0
   )engine myisam charset utf8;