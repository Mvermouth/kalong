<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 10:37
 */
print_r($_FILES);
move_uploaded_file($_FILES['pic']['tmp_name'],'./images/'.$_FILES['pic']['name']);