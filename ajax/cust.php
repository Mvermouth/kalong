<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/15
 * Time: 10:47
 */
if(empty($_COOKIE['use'])){
    setcookie('use','user'.mt_rand(10000,99999));
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<!--    <script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>-->
</head>
<style>
    #room{
        width: 200px;
        height: 200px;
        border:1px solid red;
        overflow: scroll;
    }
</style>
<body>
    <h1>ajax+长连接+长轮询</h1>
    <div id="room">

    </div>
    <textarea name="content" id="" cols="30" rows="10" id="c"></textarea><br>
<!--    回复 <p id="posss"></p>-->
    <input type="button" value="询问" onclick="sendMsg()">

    <script src="./jquery-3.1.0.min.js"></script>
    <script>
        //长轮xun ajax
        //$(function(){
            var setting={
                type: 'GET',
                url:'./cusmsg.php',
                dataType: 'json',
                success:function(res){
                        //console.log(res[pos]);
                        //console.log(typeof res);
                        //console.log(res);
                        $('<p>'+res.pos+'对你说：'+res.content+'</p>').appendTo($('#room'));
                        window.setTimeout(function(){$.ajax(setting)},1000);
                }
            };
            $.ajax(setting);
        //})
        function sendMsg() {
            var cont=$('textarea').val();
            $.post('sendmsg.php',{
                res:'admin',
                content:cont
            },function(res){
                if(res=='ok'){
                    $('<p>'+'u say:'+cont+'<p/>').appendTo($('#room'));
                    $('textarea').val('');
                }
            })
        }
    </script>
</body>
</html>