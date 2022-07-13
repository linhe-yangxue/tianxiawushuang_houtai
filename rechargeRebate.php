<?php
include "config.php";

date_default_timezone_set('Asia/Shanghai');

$p = $_POST;
$serverId = $p['serverID'];
$roleID = $p['roleID'];
$amount = $p['amount'];
$roleName = $p['roleName'];

if (empty($serverId) || empty($amount) || empty($roleName)) {
	echo json_encode("FAIL");
	exit(1);
}

// 单位分
$rechargeConfig = array(
	'1000' => 10000,
	'5000' => 50000,
	'10000' => 100000,
	'20000' => 200000,
	'50000' => 500000,
	'100000' => 1000000,
	'200000' => 2000000,
	'300000' => 3000000,
	'500000' => 5000000,
);

// $yb = $rechargeConfig[intval($amount)];
// if (!$yb) {
// 	echo json_encode("FAIL");
// 	exit(1);
// }
$yb = $amount/100*1000;

$dblink = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],true);
mysql_query("set names utf8", $dblink);

if(intval($serverId) >= 10){
 $dbsql = "chuanqi_tanwan" . $serverId;
}else{
 $dbsql = "chuanqi_tanwan0" . $serverId;
}

$db_select = mysql_select_db($dbsql,$dblink);

$sql = "select * from uw_user where nickName = '{$roleName}'";
$result = mysql_query($sql,$dblink);
$row = mysql_fetch_array($result);
if (!$row) {
	echo json_encode("FAIL");
	exit(1);
}

$sql = "update uw_user set diamond = diamond + {$yb} where nickName = '{$roleName}'";
$result2 = mysql_query($sql,$dblink);
if($result2){
	echo json_encode("SUCCESS");
}else{
	echo json_encode("FAIL");
}

mysql_close($dblink);


