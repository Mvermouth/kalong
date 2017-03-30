<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/shop/Public/css/css.css">
</head>
<style>
    p{
        color: red;
    }
    h2{
        color: aqua;
    }
</style>
<body>
    <p><?php echo ($a); ?></p>
    <h1><?php echo ($b); ?></h1>
    <h3>test</h3>
    <h2><?php echo ($rand); ?>,<?php if($rand >= 60): ?>及格<?php else: ?>不及格<?php endif; ?></h2>

    <?php if(is_array($best)): foreach($best as $key=>$g): ?><li><?php echo ($g); ?></li><?php endforeach; endif; ?>
    <!--引入jq！！！-->
    <script type="text/javascript" src="/shop/Public/js/jq.js"></script>
<!--<load href="/shop/Public/js/jq.js"></load>-->
</body>

<script>
    //alert($);
    var title=document.querySelector('h2');
    var t=title.innerHTML;
    var str=t.split(',',[1]).join();
    //console.log(arr);
    function pan(str){
        if(str >= 60){
            title.style.color='green';
        }else{
            title.style.color='red';
        }
    }
    pan(str);
</script>
</html>