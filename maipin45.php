<?php
include "config.php";

$dblink = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],true);
mysql_query("set names utf8", $dblink);

$db_select = mysql_select_db($config["DB_NAME2"],$dblink);

$name1 = '升星石';
$name2 = '升星石';
$items1 = '{"19":1000}';
$begintime1= '2018-04-01 00:00:00';
$endtime1 = '2022-04-01 00:00:00';

for ($i=1; $i < 20; $i++) { 
	$code1 = GetRandStr(6);

	$sql = "insert into uw_coupon(name, content, items,
	code, startTime, endTime) values('{$name1}', '{$name2}',
	'{$items1}', '{$code1}', '{$begintime1}', '{$endtime1}');";

	var_dump($sql);
	$result = mysql_query($sql,$dblink);
	//var_dump($result);
}


mysql_close($dblink);


function GetRandStr($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
        "3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
}




