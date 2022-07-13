<?php
include "../config.php";
date_default_timezone_set('Asia/Shanghai');
$p = $_POST;

//echo $sql;
                            $conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],$config["DB_NAME1"]);
                           mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("连接数据库失败，请配置好config.php文件！！！");
                            }
                            $db_select = mysql_select_db($config["DB_NAME2"]);
                            if(!$db_select){
                               die("连接数据库".$config["DB_NAME2"]."失败！请填写好数据库名~~~~");
                            }
							$p = $_POST;

if($p['t'] == "add"){
  $t = date('Y-m-d H:i:s');
  $psql = "insert into `uw_system_message` (`color`,`serverId`,`message`,`type`,`status`,`times`,`interval`,`expireTime`,`sendTime`,`createTime`) values('#00ff00','{$p['sid']}','{$p['snr']}','{$p['stp']}','0','{$p['st']}','{$p['sjg']}','{$p['sed']}','{$t}','{$t}')";
  $result = mysql_query($psql,$conn);
  if($result){
	 echo '添加公告成功'; 
  }else{
     echo '添加公告失败';
  }
}

if($p['t'] == "xg"){
  $psql = "UPDATE `uw_system_message` SET `serverId`='{$p['sid']}', `message`='{$p['snr']}', `times`='{$p['st']}', `interval`='{$p['sjg']}', `expireTime`='{$p['sed']}' WHERE (`id`='{$p['gid']}')";
  $result = mysql_query($psql,$conn);
  if($result){
	 echo '修改公告成功'; 
  }else{
     echo '修改公告失败';
  }
}

if($p['t'] == "del"){
  $psql = "DELETE FROM `uw_system_message` WHERE (`id`='{$p['gid']}')";
  $result = mysql_query($psql,$conn);
  if($result){
	 echo '删除公告成功'; 
  }else{
     echo '删除公告失败';
  }
}
@mysql_close($conn);
?>