<?php
if(mt_rand(1,10)<4){
	echo 0;
}else{
	$cnt=file_get_contents('./red.txt');
	$cnt+=1;
	file_put_contents('./red.txt',$cnt);
	echo 1;
}
?>