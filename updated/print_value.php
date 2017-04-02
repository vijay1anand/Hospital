<?php
/*$str=file_get_contents('anand.json');
$json =json_decode($str, true);
$temp = $json['name'][0];
echo $temp;*/
$str = file_get_contents('anand.json');
$json = json_decode($str, true);
echo '<pre>' . print_r($json, true) . '</pre>';

/*for($i=0;$i<=2;$i++){*/
foreach($json as $i){
echo $i['name'];
echo $i['cost'];
echo $i['amount'];
 
 }
?>