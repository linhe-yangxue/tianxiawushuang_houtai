<?php
include "config.php";

$dblink = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],true);
mysql_query("set names utf8", $dblink);

$db_select = mysql_select_db($config["DB_NAME2"],$dblink);

$name1 = '至尊礼包';
$name2 = '至尊礼包';
$items1 = '{"200":"4000000","44":"500","1070":"200","1071":"200","1072":"200","1551":"3000","46":"8","3":"200","4":"200","5":"200","6":"100","8":"500","16":"200","10":"200","58":"10000","15":"200","17":"200","700074":"5","112000":"2","30":"5000","56":"88888","113000":"2","19":"88888","38":"20","1509":"5","18":"88888","52":"10000","1607":"2","1625":"2","1555":"2","1550":"2000","1469":"5","57":"1000"}';
$begintime1= '2018-04-01 00:00:00';
$endtime1 = '2019-04-01 00:00:00';


for ($i=1; $i < 2000; $i++) { 
	$code1 = GetRandStr(6);

	$sql = "insert into uw_coupon(name, content, items,
	code, startTime, endTime) values('{$name1}', '{$name2}',
	'{$items1}', '{$code1}', '{$begintime1}', '{$endtime1}');";

	var_dump($sql);
	$result = mysql_query($sql,$dblink);
	var_dump($result);
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




