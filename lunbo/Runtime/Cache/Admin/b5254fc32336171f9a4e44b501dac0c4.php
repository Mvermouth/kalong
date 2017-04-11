<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if(is_array($piclist)): foreach($piclist as $key=>$p): ?><p>id:<?php echo ($p['pic_id']); ?>,状态<?php echo ($p['is_on']); ?> <a href="<?php echo U('Admin/Index/picDel',array('pic_id'=>$p['pic_id']));?>">删除</a></p><?php endforeach; endif; ?>
</body>
</html>