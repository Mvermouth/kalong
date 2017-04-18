<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo U('Admin/Login/login');?>" method="post" name="theForm">
    <input type="text" name="u_name">
    <input type="password" name="pass">
    <input type="submit" value="login">
</form>
</body>
</html>