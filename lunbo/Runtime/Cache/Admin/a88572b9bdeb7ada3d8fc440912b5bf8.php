<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/lunbo/Public/Admin/css/index.css">
</head>
<body>
    <form action="<?php echo U('Admin/Index/picAdd');?>" method="POST" enctype="multipart/form-data" name="theForm">
        <input type="file" name="img_path" size="35"/>
        <input type="submit" value="ok">
    </form>
</body>
</html>