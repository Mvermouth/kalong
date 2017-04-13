<?php
/**
 * Created by PhpStorm.
 * User: LL
 * Date: 2017/4/12
 * Time: 20:12
 */
//sleep(3);
if(empty($_FILES)){
    exit('no0');
}
$res=$_FILES['pic']['error'] == 0 ? 'ok':'no';
echo "<script>parent.document.querySelector('#zhuan').innerHTML='$res'</script>";
//print_r($_FILES);
/*移动文件*/
//echo move_uploaded_file($_FILES['pic']['tmp_name'],'./images/'.$_FILES['pic']['name']) ? 'ok':'no';