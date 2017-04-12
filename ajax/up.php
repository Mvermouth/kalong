<?php
/**
 * Created by PhpStorm.
 * User: LL
 * Date: 2017/4/12
 * Time: 20:12
 */
sleep(3);
if(empty($_FILES)){
    exit('no0');
}
$res=$_FILES['pic']['error'] == 0 ? 'ok':'no';
echo "<script>parent.document.querySelector('#zhuan').innerHTML='$res'</script>";