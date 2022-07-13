<?php
include "config.php";

$dblink = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],true);
mysql_query("set names utf8", $dblink);

$db_select = mysql_select_db($config["DB_NAME1"],$dblink);

$list['state'] = 1;
$sql = "select * from uw_server_info order by id desc";
$result = mysql_query($sql,$dblink);

$count = mysql_num_rows($result);
for ($i = 0; $i < $count; $i++) {
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
 	$event['id'] = $row['id'];
 	$event['serverName'] = $row['name'];
 	$event['serverID'] = $row['serverId'];
 	$list['data'][$i] = $event;
}

mysql_close($dblink);

echo json_encode($list);

