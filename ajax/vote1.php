<?php
$cnt=file_get_contents('./red.txt');
$cnt += 1;
file_put_contents('./red.txt', $cnt);
//利用http204
header('HTTP/1.1 204 No Content');
?>