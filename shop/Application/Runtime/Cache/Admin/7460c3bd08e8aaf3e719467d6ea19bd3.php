<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <!--<h1><?php echo ($num==5 ? $num:'5'); ?></h1>-->
    <table border="1">
        <tr>
            <td>名字</td>
            <td>价格</td>
            <td>id</td>
        </tr>
        <?php if(is_array($goods)): foreach($goods as $key=>$g): ?><tr>
            <td><?php echo ($g["goods_name"]); ?></td>
            <td><?php echo ($g["shop_price"]); ?></td>
            <td><?php echo ($g["goods_id"]); ?></td>
        </tr><?php endforeach; endif; ?>
        <form action="" method="get">
            <input type="text" name="goods_name">
            <input type="text" name="shop_price">
            <input type="submit" valuse="ok">
        </form>
    </table>
</body>
</html>