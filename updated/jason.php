<?php
/**
 * Created by PhpStorm.
 * User: Vishal Raman
 * Date: 14-Nov-16
 * Time: 0:53 AM
 */

print_r(json_decode(json_decode($_POST['data'])));
//$str=json_decode(json_decode($_POST['data']),true);
//print_r(json_decode($_POST['data']));
//$str = file_get_contents('../shopcart.json');
//$str=file_get_contents(localStorage.getItem("shopcart"));
//$str = file_get_contents(localStorage.getItem("data"));

$json = json_decode($str, true);
echo '<pre>' . print_r($json, true) . '</pre>';
//echo reset($json[1]); //chal ra hy
for ($i=0;$i<=5;$i++) {
    //ob_start();
    var_dump($json[$i]['pro_name']);
    //echo reset($json[$i]);
    //echo "<br>";


}
foreach ($json as $entry) {

    echo $entry['pro_name'];
    echo "<br>";
    echo $entry['price'];
    echo "<br>";


}

?>