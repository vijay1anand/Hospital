<?php
if(isset($_POST['data'])){
$val=json_decode(json_decode($_POST['data']));
$fp = fopen('anand.json', 'w');
fwrite($fp, json_encode($val));
    fclose($fp);
    
}

print_r(json_decode(json_decode($_POST['data'])));

//$var=json_decode(json_decode($_POST['data']));





?>