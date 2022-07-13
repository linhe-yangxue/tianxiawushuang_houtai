<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;
$roledb = 'chuanqi_main';
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],$config["DB_NAME1"]);
                           	mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
							$db_select = mysql_select_db($roledb);
                            if(!$db_select){
                               die("连接数据库".$roledb."失败！请填写好数据库名~~~~");
                            }

							$tp = $p['tp'];
							$id = isset($p['id']) ? $p['id'] : -1;
							$name = isset($p['name'])?$p['name']:'';
							$type = isset($p['type'])?$p['type']:'';
							$serverArr = isset($p['serverArr'])?$p['serverArr']:'';
							$isDelete = isset($p['isDelete'])?$p['isDelete']:0;
							$case = isset($p['case'])?$p['case']:0;
							
$t = date("y-m-d h:m:s",time());

if($tp == 'edit'){
	$sql ="update uw_servers_group set `name` = '{$name}',`type` = '{$type}',`serverArr` = '{$serverArr}',`isDelete` = '{$isDelete}',`case` = '{$case}' where id = {$id} limit 1";
}else if($tp == 'add'){
	$sql ="insert into uw_servers_group(`name`,`type`,`serverArr`,isDelete,`case`) values('{$name}','{$type}','{$serverArr}','{$isDelete}','{$case}') ";
}else if($tp == 'del'){
	$sql = "delete from uw_servers_group where id = '{$id}'";
}else{
	exit;
}

$result2 = mysql_query($sql,$conn);

if($result2){
  echo '操作成功！';
}else{
  echo '操作失败';
}
@mysql_close($conn);
?>
